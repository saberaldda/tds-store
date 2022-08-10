<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // for search
        $request = request();
        $query = Product::query();

        if ($name = $request->query('name')) {
            $query->where('name', 'LIKE', "%{$name}%");
        }
        if ($status = $request->query('status')) {
            $query->where('status', '=', $status);
        }

        $products = $query->withoutGlobalScopes([ActiveStatusScope::class])
            ->with('category.parent')
            ->select(['products.*',])
            ->paginate();

        // for select menu (search)
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
            'title'     => 'Create Product',
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

        // sheck if image in request
        if ($request->hasFile('image')) {
            $file = $request->file('image'); // UplodedFile Object

            $image_path = $file->storeAs('uploads',
            time() . $file->getClientOriginalName(),
            'public');
            
            // merge image to the request
            $request->merge([
                'image_path' => $image_path,
            ]);
        }

        $product = Product::create($request->all());

        return redirect()->route('products.index')
            ->with('success', __('app.products_store'));
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
            'title'     => 'Show Product',
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
            'title'     => 'Edit Product',
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

        // sheck if image in request
        if ($request->hasFile('image')) {
            $file = $request->file('image'); // UplodedFile Object

            $image_path = $file->storeAs('uploads',
            time() . $file->getClientOriginalName(),
            'public');
            
            // merge image to the request
            $request->merge([
                'image_path' => $image_path,
            ]);
        }

        $product->update($request->all());

        return redirect()->route('products.index')
            ->with('success', __('app.products_update'));
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

        return redirect()->route('products.index')
            ->with('success', __('app.products_delete', ['name' => $product->name]));
    }

    public function trash()
    {
        // for search
        $request = request();
        $query = Product::query();

        if ($name = $request->query('name')) {
            $query->where('name', 'LIKE', "%{$name}%");
        }
        if ($status = $request->query('status')) {
            $query->where('status', '=', $status);
        }

        // for select menu (search)
        $options = ['ative', 'draft'];

        $products = $query->withoutGlobalScope('active')->onlyTrashed()->paginate();
        return view('admin.products.trash', [
            'title'     => 'Products Trash',
            'products' => $products,
            'options'  => $options,
        ]);
    }

    public function restore(Request $request, $id = null)
    {
        if ($id) {
            $product = Product::withoutGlobalScope('active')->onlyTrashed()->findOrFail($id);
            $product->restore();

            return redirect()->route('products.trash')
                ->with('success', __('app.products_restore', ['name' => $product->name]));
        }

        Product::onlyTrashed()->restore();
        return redirect()->route('products.index')
            ->with('success', __('app.products_restore_all'));
    }

    public function forceDelete($id = null)
    {
        if ($id) {
            $product = Product::withoutGlobalScope('active')->onlyTrashed()->findOrFail($id);
            $product->forceDelete();

            // delete image
            Storage::disk('public')->delete($product->image_path);

            return redirect()->route('products.trash')
                ->with('success', __('app.products_forcedelete', ['name' => $product->name]));
        }
        
        // get all images for trashed products in array
        $trashedProducts = Product::onlyTrashed()->get();
        foreach ($trashedProducts as $trashedProduct) {
            $arr[] = $trashedProduct->image_path;
        }
        // delete the images in the array
        Storage::disk('public')->delete($arr);

        Product::onlyTrashed()->forceDelete();
        return redirect()->route('products.index')
            ->with('success', __('app.products_forcedelete_all'));
    }
}
