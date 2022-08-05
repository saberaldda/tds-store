<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::withoutGlobalScopes([ActiveStatusScope::class])
            ->with('category.parent')
            ->select(['products.*',])
            ->paginate();

        $options = ['ative', 'draft'];

        return view('admin.products.index', [
            'products' => $products,
            'title'    => 'Products List',
            'options'   => $options,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id');
        return view('admin.products.create', [
            'categories' => $categories,
            'product' => new Product(),
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
        $request->merge([
            'slug' => Str::slug($request->post('name'))
        ]);

        $request->validate(Product::validateRules());

        $product = Product::create($request->all());

        return redirect()->route('products.index')
            ->with('success', "Product ($product->name) CREATED.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::withoutGlobalScope('')->findOrFail($id);

        // SELECT * FROM ratings WHERE rateable_id = ? AND rateable_type = 'App\Models\Product';
        return $product->ratings;
        
        return view('admin.products.show', [
            'product' => $product,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::withoutGlobalScope('active')->findOrFail($id);

        return view('admin.products.edit', [
            'product'    => $product,
            // 'categories' => Category::all(),
            'categories' => Category::withTrashed()->pluck('name', 'id'),
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
        $product = Product::withoutGlobalScope('active')->findOrFail($id);

        $request->validate(Product::validateRules());

        if ($request->hasFile('image')) {
            $file = $request->file('image'); // UplodedFile Object

            $image_path = $file->store('uploads', [
                'disk' => 'public',
            ]);
            $request->merge([
                'image_path' => $image_path,
            ]);
        }

        $product->update($request->all());

        return redirect()->route('products.index')
            ->with('success', "Product ($product->name) UPDATED.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::withoutGlobalScope('active')->findOrFail($id);

        $product->delete();

        return redirect()->route('products.index')
            ->with('success', "Product ($product->name) DELETED.");
    }

    public function trash()
    {
        $products = Product::withoutGlobalScope('active')->onlyTrashed()->paginate();
        return view('admin.products.trash', [
            'products' => $products,
        ]);
    }

    public function restore(Request $request, $id = null)
    {
        if ($id) {
            $product = Product::withoutGlobalScope('active')->onlyTrashed()->findOrFail($id);
            $product->restore();

            return redirect()->route('products.trash')
                ->with('success', "Product ($product->name) RESTORED.");
        }

        Product::onlyTrashed()->restore();
        return redirect()->route('products.index')
            ->with('success', "All Products RESTORED.");
    }

    public function forceDelete($id = null)
    {
        if ($id) {
            $product = Product::withoutGlobalScope('active')->onlyTrashed()->findOrFail($id);
            $product->forceDelete();

            return redirect()->route('products.trash')
                ->with('success', "Product ($product->name) DELETED FOREVER.");
        }

        Product::onlyTrashed()->forceDelete();
        return redirect()->route('products.index')
            ->with('success', "All Trashed Products DELETED.");
    }
}
