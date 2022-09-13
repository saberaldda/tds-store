<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    
    public function index(Request $request)
    {
        // for filter
        $request = request();
        $query = Product::query();

        if ($category = $request->query('category')) {
            $query->where('category_id', '=', $category);
        }

        $products =  $query->active();

        if ('name' == $request->query('filter')) {
            $products->orderBy('name');
        }
        if ('pricea-z' == $request->query('filter')) {
            $products->orderBy('price', 'asc');
        }
        if ('pricez-a' == $request->query('filter')) {
            $products->orderBy('price', 'desc');
        }
        if ($search = $request->query('search')) {
            $query->where('name', 'LIKE', "%{$search}%");
        }

        $categories = Category::active()->with(['products'])->withCount('products')->get();
        
        return view('front.products.index', [
            'title'       => __('Products'),
            'products'    => $products->activeCategory()->paginate(),
            'categories'  => $categories,
        ]);
    }
    
    public function show($slug)
    {
        $product = Product::where('slug', '=', $slug)->firstOrFail()->load('ratings');
        $categories = Category::with(['products'])->withCount('products')->get();
        $rel_products = Product::where('category_id', '=', $product->category_id)->get();

        return view('front.products.show', [
            'product' => $product,
            'categories'  => $categories,
            'rel_products' => $rel_products,
        ]);
    }
}
