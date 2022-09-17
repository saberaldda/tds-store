<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RatingsController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $type)
    {
        if ($type == 'product') {
            $val = 'required|int|exists:products,id';
            $model = Product::find($request->post('id'));
        }elseif ($type == 'profile'){
            $val = 'required|int|exists:profiles,id';
            $model = Profile::find($request->post('id'));
        }

        $request->validate([
            'rating' => 'required|int|min:1|max:5',
            'id'     => $val,
        ]);

        $rating = $model->ratings()->updateOrCreate([
            'rating' => $request->post('rating'),
            'user_id' => Auth::id(),
        ]);
        $rating->refresh();

        return response()->json([
            'message'   => 'Rating Done',
            'status'    => 201,
            'data'      => $rating,
        ]);
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
