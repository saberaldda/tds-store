<?php

namespace App\Http\Controllers\Front;

use App\Events\OrderCreated;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItem;
use App\Repositories\Cart\CartRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Intl\Countries;
use Throwable;

class CheckoutController extends Controller
{
    /**
     * @var \App\Repositories\Cart\CartRepository
     */
    protected $cart;

    public function __construct(CartRepository $cart)
    {
        $this->cart = $cart;
    }

    public function create()
    {
        if (!count($this->cart->all()) > 0) {
            return redirect()->route('cart')->with('error', __('Your Cart Is Empty'));
        }

        $categories = Category::with(['products'])->withCount('products')->get();

        return view('front.checkout', [
            'categories' => $categories,
            'cart'      => $this->cart,
            'user'      => Auth::user(),
            'countries' => Countries::getNames(App::currentLocale()),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'billing_name'      => ['required', 'string'],
            'billing_phone'     => 'required',
            'billing_email'     => 'required|email',
            'billing_address'   => 'required',
            'billing_city'      => 'required',
            'billing_country'   => 'required',
        ]);

        DB::beginTransaction();
        try {
            $request->merge([
                'total' => $this->cart->total(),
                'user_id'    => Auth::id(),
            ]);
            $order = Order::create($request->all());

            $item = [];
            foreach ($this->cart->all() as $item) {  // 4  // for better performance (multi insert)
                $items[] = [
                    'order_id'   =>$order->id,
                    'product_id' => $item->product_id,
                    'quantity'   => $item->quantity,
                    'price'      => $item->product->price,
                ];
            }
            DB::table('order_items')->insert($items);

            DB::commit();

            event(new OrderCreated($order));
            // delete cart
            // send invoice
            // send notification to admin
            // Deduct Product Quantity

            return redirect()->route('orders.payments.create', $order->id)->with('success', __('Order Created.'));

        } catch (Throwable $th) {
            DB::rollBack();
            throw $th;
        }
        
    }
}
