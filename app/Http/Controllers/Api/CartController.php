<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Repositories\Cart\CartRepository;
use Illuminate\Http\Request;
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
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carts = $this->cart->all();

        return response()->json([
            'message'   => 'OK',
            'status'    => 200,
            'data'      => [
                'total' => $this->cart->total(),
                'carts' => $carts,
            ],
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
            'product_id' => ['required', 'exists:products,id'],
            'quantity' => ['int', 'min:1', function ($attr, $value, $fail) {
                $id = request()->input('product_id');
                $product = Product::find($id);
                if ($value > $product->quantity) {
                    $fail(__('Quantity grateer than stock.'));
                }
            }],
        ]);

        $cart = $this->cart->add($request->post('product_id'), $request->post('quantity', 1),);
        $cart->refresh();

        return response()->json([
            'message'   => 'Item Added',
            'status'    => 201,
            'data'      => [
                'total' => $this->cart->total(),
                'cart' => $cart,
            ],
        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $cart = $this->cart->all();
        
        return response()->json([
            'message'   => 'OK',
            'status'    => 200,
            'data'      => [
                'total' => $this->cart->total(),
                'cart' => $cart,
            ],
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function clear(Request $request)
    {
        $request->validate([
            'product_id' => 'nullable'
        ]);
        if (!$request->post('product_id')) {
            $this->cart->clear();
        }
        $item = Cart::Where([
            'user_id' => Auth::id(),
            'product_id' => $request->post('product_id')
        ]);
        // dd($item->get());
        $item->delete();


        return response()->json([
            'message'   => 'Item Deleted',
            'status'    => 200,
            'data'      => $this->cart->all(),
        ]);
    }
}
