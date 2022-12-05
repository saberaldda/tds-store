<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RatingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.ratings.index', [
            'title'     => __('Ratings'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($type)
    {
        if ($type == 'product') {
            $model = new Product();
            $entries = Product::all('id','name');
        }elseif ($type == 'profile'){
            $model = new Profile();
            $entries = User::all('id','name');
        }

        return view('admin.ratings.create', [
            'title'     => "Rating $type",
            'model'     => $model,
            'type'      => $type,
            'entries'  => $entries,
        ]);
    }

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

        return redirect()->route('ratings.index')
        ->with('success', __('Rating Complete.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
