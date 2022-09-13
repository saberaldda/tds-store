<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::active()->activeCategory()->limit(12)->get();
        $categories = Category::active()->with(['products'])->withCount('products')->get();

        return view('front.home', [
            'products'   => $products,
            
            'categories' => $categories,
        ]);
    }

    public function rate(Request $request)
    {
        if(!Auth::check()){
            return redirect()->route('login');
        }
        $request->validate([
            'rating' => 'required|int|min:1|max:5',
            'id'     => 'required|int|exists:products,id',
        ]);
        
        $model = Product::find($request->post('id'));

        $rating = $model->ratings()->create([
            'rating' => $request->post('rating'),
            'user_id' => Auth::id(),
        ]);

        return redirect()->back()
        ->with('success', __('Rating Complete.'));
    }
}
