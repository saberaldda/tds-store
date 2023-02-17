<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', Category::class);

        $request = request();
        $query = Category::query();

        if ($name = $request->query('name')) {
            $query->where('name', 'LIKE', "%{$name}%");
        }
        if ($status = $request->query('status')) {
            $query->where('status', '=', $status);
        }

        $entries = $query->withCount('products')->Paginate();

        $success = session()->get('success');

        $options = ['active', 'archived'];

        // dd($entries);
        return view('admin.categories.index', [
            'categories'=> $entries,
            'title'     => 'Categories List',
            'success'   => $success,
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
        $this->authorize('create', Category::class);

        $parents = Category::all();
        $category = new Category();

        return view('admin.Categories.create', [
            'title'     => 'Create Category',
            'category'  => $category,
            'parents'   => $parents,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $this->authorize('create', Category::class);

        // merge slug in model

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

        $category = Category::create($request->all());

        return redirect()->route('categories.index')
            ->with('success', __('app.categories_store'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $this->authorize('view', $category);

        // return $category->Products()
        //                 // ->with('category:id,name,status')
        //                 // ->where('price', '>', 150)
        //                 // ->has('products)
        //                 ->orderBy('price', 'ASC')
        //                 ->get();

        return redirect()->route('products',['category' => $category->id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $this->authorize('update', $category);

        // $category = Category::findOrFail($id);
        // if (!$category) {
        //     abort(404);
        // }
        $parents = Category::withTrashed()->where('id', '<>', $category->id)->get() ;

        $title = 'Edit Category';

        return view('admin.categories.edit', compact('category', 'parents', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $this->authorize('update', $category);

        // $category = Category::find($id);

        $request->route('id');
        $request->merge([
            'slug' => Str::slug($request->name)
        ]);

        // sheck if image in request
        if ($request->hasFile('image')) {
            $file = $request->file('image'); // UplodedFile Object

            // delete old image
            if ($category->image_path) {
                Storage::disk('public')->delete($category->image_path);
            }

            $image_path = $file->storeAs('uploads',
                time() . '_' . preg_replace('/\s+/', '_', $file->getClientOriginalName()),
                'public');
            
            // merge image to the request
            $request->merge([
                'image_path' => $image_path,
            ]);
        }

        $category->update( $request->all() );

        return redirect()->route('categories.index')
            ->with('success', __('app.categories_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $this->authorize('delete', $category);

        // $category = Category::withoutGlobalScope('active')->findOrFail($id);

        $category->delete();

        return redirect()->route('categories.index')
            ->with('success', __('app.categories_delete', ['name' => $category->name]));
    }

    public function changeStatus(Category $category)
    {
        $this->authorize('update', $category);

        if ($category->status == 'active') {
            $status = 'archived';
        }else if ($category->status == 'archived') {
            $status = 'active';
        }
        $category->update(
            ['status' => $status]
        );

        return redirect()->back();
    }

    public function trash()
    {
        $this->authorize('restore', Category::class);

        $request = request();
        $query = Category::query();

        if ($name = $request->query('name')) {
            $query->where('name', 'LIKE', "%{$name}%");
        }
        if ($status = $request->query('status')) {
            $query->where('status', '=', $status);
        }

        $options = ['active', 'archived'];
        
        $categories = $query->withoutGlobalScope('active')->onlyTrashed()->paginate();
        return view('admin.categories.trash', [
            'title'     => 'Categories Trash',
            'categories' => $categories,
            'options'    => $options,
        ]);
    }

    public function restore(Request $request, $id = null)
    {
        $this->authorize('restore', Category::class);

        if ($id) {
            $category = Category::withoutGlobalScope('active')->onlyTrashed()->findOrFail($id);
            $category->restore();

            return redirect()->route('categories.trash')
                ->with('success', __('app.categories_restore', ['name' => $category->name]));
        }

        Category::onlyTrashed()->restore();
        return redirect()->route('categories.index')
            ->with('success', __('app.categories_restore_all'));
    }

    public function forceDelete($id = null)
    {
        $this->authorize('forceDelete', Category::class);

        if ($id) {
            $category = Category::withoutGlobalScope('active')->onlyTrashed()->findOrFail($id);
            $category->forceDelete();

            // delete image
            if($category->image_path){
                Storage::disk('public')->delete($category->image_path);
            }
            
            return redirect()->route('categories.trash')
                ->with('success', __('app.categories_forcedelete', ['name' => $category->name]));
        }

        // get all images for trashed Categories in array
        $trashedCategories = Category::onlyTrashed()->get();
        foreach ($trashedCategories as $trashedCategory) {
            $arr[] = $trashedCategory->image_path;
        }
        // delete the images in the array
        Storage::disk('public')->delete(array_filter($arr));

        Category::onlyTrashed()->forceDelete();
        return redirect()->route('categories.index')
            ->with('success', __('app.categories_forcedelete_all'));
    }
}