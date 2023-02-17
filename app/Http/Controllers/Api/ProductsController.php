<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = Product::with('category.parent','user', 'ratings')
            ->when($request->query('name'), function($query, $value) { $query->where('name', 'LIKE', "%{$value}%"); })
            ->when($request->query('status'), function($query, $value) { $query->where('status', '=', $value); })
            ->paginate();

        return response()->json([
            'message'   => 'OK',
            'status'    => 200,
            'data'      => $products,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {

        // sheck if image in request
        if ($request->hasFile('image')) {
            $file = $request->file('image'); // UplodedFile Object

            $image_path = $file->storeAs('uploads',
                time() . '_' . preg_replace('/\s+/', '_', $file->getClientOriginalName()),
                'public');
            
            // merge image to the request
            $request->merge([
                'image_path' => $image_path,
            ]);
        }

        // merge user_id to the request
        $user_id = Auth::user()->id;
        $request->merge([
            'user_id' => $user_id,
        ]);

        $product = Product::create($request->all());
        $product->refresh();

        return response()->json([
            'message'   => 'Product Created',
            'status'    => 201,
            'data'      => $product,
        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id)->load('category', 'ratings');

        return response()->json([
            'message'   => 'OK',
            'status'    => 200,
            'data'      => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        $product = Product::findOrFail($id);

        //]]// sheck if image in request
        if ($request->hasFile('image')) {
            $file = $request->file('image'); // UplodedFile Object

            // delete old image
            if ($product->image_path) {
                Storage::disk('public')->delete($product->image_path);
            }

            $image_path = $file->storeAs('uploads',
                time() . '_' . preg_replace('/\s+/', '_', $file->getClientOriginalName()),
                'public');
            
            // merge image to the request
            $request->merge([
                'image_path' => $image_path,
            ]);
        }

        $product->update($request->all());

        return response()->json([
            'message'   => 'Product Updated',
            'status'    => 201,
            'data'      => $product,
        ],201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return response()->json([
            'message'   => 'Product Trashed',
            'code'      => 200,
            'data'      => $product,
        ]);
    }

    public function restore(Request $request, $id = null)
    {
        if ($id) {
            $product = Product::onlyTrashed()->findOrFail($id);
            $product->restore();

            return response()->json([
                'message'   => 'Product Restore',
                'status'    => 200,
                'data'      => $product,
            ]);
        }

        Product::onlyTrashed()->restore();
        return response()->json([
            'message'   => 'All Trashed Categories Restored',
            'status'    => 200,
        ]);
    }

    public function forceDelete($id = null)
    {
        if ($id) {
            $product = Product::onlyTrashed()->findOrFail($id);
            $product->forceDelete();

            // delete image
            if($product->image_path){
                Storage::disk('public')->delete($product->image_path);
            }

            return response()->json([
                'message'   => 'Product Permanent Deleted',
                'status'    => 200,
            ]);
        }
        
        // get all images for trashed products in array
        $trashedProducts = Product::onlyTrashed()->get();
        foreach ($trashedProducts as $trashedProduct) {
            $arr[] = $trashedProduct->image_path;
        }
        // delete the images in the array
        Storage::disk('public')->delete(array_filter($arr));

        Product::onlyTrashed()->forceDelete();
        return response()->json([
            'message'   => 'All Trash Categories Permanent Deleted',
            'status'    => 200,
        ]);
    }
}
