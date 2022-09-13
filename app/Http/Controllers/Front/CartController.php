<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Repositories\Cart\CartRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * @var \App\Repositories\Cart\CartRepository
     */
    protected $cart;

    public function __construct(CartRepository $cart)
    {
        $this->cart = $cart;
    }

    public function index()
    {
        $cart = $this->cart->all();
        $categories = Category::with(['products'])->withCount('products')->get();

        return view('front.cart', [
            'cart' => $cart,
            'total' => $this->cart->total(),
            'categories' => $categories,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => ['required', 'exists:products,id'],
            'quantity' => ['int', 'min:1', function ($attr, $value, $fail) {
                $id = request()->input('product_id');
                $product = Product::find($id);
                if ($value > $product->quantity) {
                    $fail(__('Quantity grateer than stock.'));
                }
            }],
        ]);

        $cart = $this->cart->add($request->post('product_id'), $request->post('quantity', 1));

        if ($request->expectsJson()) {
            // return $cart->refresh();
            return $cart->all();
        }

        return redirect()->back()->with('success', __('Item added to cart'));
    }

    public function clear(Request $request)
    {
        $item = Cart::Where([
            'user_id' => Auth::id(),
            'product_id' => $request->post('product_id')
        ]);
        // dd($item->get());
        $item->delete();
        
        return redirect()->back();
    }

    public function quantity(Request $request)
    {
        $item = Cart::Where(['user_id' => Auth::id(), 'product_id' => $request->post('product_id')])->first();

        if ($request->post('quantity') == -1) {
            $item->update(['quantity'=> $item->quantity -1]);
        }
        if ($request->post('quantity') == 1) {
            $item->update(['quantity'=> $item->quantity +1]);
        }

        return redirect()->back();
    }
}
