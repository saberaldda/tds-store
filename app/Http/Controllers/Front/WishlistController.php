<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::active()->with(['products'])->withCount('products')->get();
        $wishlist = Wishlist::where('user_id', '=', Auth::id())->with('product')->get();

        return view('front.wishlist', [
            'categories'    => $categories,
            'wishlist'      => $wishlist,
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
        wishlist::updateOrCreate([
            'user_id'       => Auth::id(),
            'product_id'    => $request->post('product_id'),
        ]);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $item = wishlist::where([
            'user_id'       => Auth::id(),
            'product_id'    => $request->post('product_id')
        ]);
        $item->delete();
        
        return redirect()->back();
    }
}
