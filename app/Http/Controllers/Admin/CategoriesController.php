<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
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
        $category = Category::create($request->all());

        return redirect()->route('categories.index')
            ->with('success', 'Category Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return $category->products()
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

        $rules = [
            // 'name'        => 'required|string|max:255|min:3',
            'name'        => ['required', 'string', 'max:255', 'min:3', 'unique:categories,id,' . $id],
            'parent_id'   => 'nullable|int|exists:categories,id|',
            'description' => 'nullable|min:5',
            'status'      => 'required|in:active,draft',
            'image'       => 'image|max:512000|dimensions:min_width=300,min_height=300',
        ];

        $request->validate($rules);

        $category = Category::find($id);
        $category->update( $request->all() );

        return redirect()->route('categories.index')
            ->with('success', 'Category Updated');
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
            ->with('success', "Category ($category->name) DELETED.");
    }

    public function trash()
    {
        $categories = Category::withoutGlobalScope('active')->onlyTrashed()->paginate();
        return view('admin.categories.trash', [
            'categories' => $categories,
        ]);
    }

    public function restore(Request $request, $id = null)
    {
        if ($id) {
            $category = Category::withoutGlobalScope('active')->onlyTrashed()->findOrFail($id);
            $category->restore();

            return redirect()->route('categories.trash')
                ->with('success', "Category ($category->name) RESTORED.");
        }

        Category::onlyTrashed()->restore();
        return redirect()->route('categories.index')
            ->with('success', "All Categories RESTORED.");
    }

    public function forceDelete($id = null)
    {
        if ($id) {
            $category = Category::withoutGlobalScope('active')->onlyTrashed()->findOrFail($id);
            $category->forceDelete();

            return redirect()->route('categories.trash')
                ->with('success', "Category ($category->name) DELETED FOREVER.");
        }

        Category::onlyTrashed()->forceDelete();
        return redirect()->route('categories.index')
            ->with('success', "All Trashed Categories DELETED.");
    }
}