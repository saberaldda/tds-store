<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    
    public function index(Request $request)
    {
                            // where('status', 'active')->
        // return Product::active()->price(200, 500)->paginate();
        $products =  Product::active()->paginate();
        return view('front.products.index', [
            'products' => $products,
        ]);
    }
    
    public function show($slug)
    {
        $product = Product::where('slug', '=', $slug)->firstOrFail();
        return view('front.products.show', [
            'product' => $product,
        ]);
    }
}
