<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
        $request = request();
        $query = Category::query();

        if ($name = $request->query('name')) {
            $query->where('name', 'LIKE', "%{$name}%");
        }
        if ($status = $request->query('status')) {
            $query->where('status', '=', $status);
        }

        $entries = $query->Paginate();

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
        $parents = Category::all();
        $category = new Category();

        return view('admin.Categories.create', [
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
    public function store(Request $request)
    {
        $request->merge([
            //                    $clean['name']
            'slug'   => Str::slug($request->name),
            'status' => 'active',
        ]);

        $request->validate(Category::validateRules());

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
        return $category->Categories()
                        ->with('category:id,name,status')
                        ->where('price', '>', 150)
                        ->orderBy('price', 'ASC')
                        ->get();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        if (!$category) {
            abort(404);
        }
        $parents = Category::withTrashed()->where('id', '<>', $category->id)->get() ;

        return view('admin.categories.edit', compact('category', 'parents'));
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
        $request->route('id');
        $request->merge([
            'slug' => Str::slug($request->name)
        ]);

        $request->validate(Category::validateRules());

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

        $category = Category::find($id);
        $category->update( $request->all() );

        return redirect()->route('categories.index')
            ->with('success', __('app.categories_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::withoutGlobalScope('active')->findOrFail($id);

        $category->delete();

        return redirect()->route('categories.index')
            ->with('success', __('app.categories_delete', ['name' => $category->name]));
    }

    public function trash()
    {
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
            'categories' => $categories,
            'options'    => $options,
        ]);
    }

    public function restore(Request $request, $id = null)
    {
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
        if ($id) {
            $category = Category::withoutGlobalScope('active')->onlyTrashed()->findOrFail($id);
            $category->forceDelete();

            // delete image
            Storage::disk('public')->delete($category->image_path);
            
            return redirect()->route('categories.trash')
                ->with('success', __('app.categories_forcedelete', ['name' => $category->name]));
        }

        // get all images for trashed Categories in array
        $trashedCategories = Category::onlyTrashed()->get();
        foreach ($trashedCategories as $trashedCategory) {
            $arr[] = $trashedCategory->image_path;
        }
        // delete the images in the array
        Storage::disk('public')->delete($arr);

        Category::onlyTrashed()->forceDelete();
        return redirect()->route('categories.index')
            ->with('success', __('app.categories_forcedelete_all'));
    }
}