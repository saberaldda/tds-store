<?php

namespace App\Http\Controllers\Api;

use App\Events\OrderCreated;
use App\Http\Controllers\Controller;
use App\Mail\OrderInvoice;
use App\Models\Order;
use App\Repositories\Cart\CartRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Throwable;

class OrdersController extends Controller
{
    /**
     * @var \App\Repositories\Cart\CartRepository
     */
    protected $cart;

    public function __construct(CartRepository $cart)
    {
        $this->cart = $cart;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::with('user')->paginate();

        return response()->json([
            'message'   => 'OK',
            'status'    => 200,
            'data'      => $orders,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

            return response()->json([
                'message'   => 'Order Created',
                'status'    => 201,
                'location'      => route('orders.payments.create', $order->id),
                'data'      => $order->refresh(),
            ],201);

        } catch (Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::findOrFail($id)->load('user', 'products');

        return response()->json([
            'message'   => 'OK',
            'status'    => 200,
            'data'      => $order,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
