<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('viewAny', Category::class);

        $categories = Category::withCount('products')
            ->when($request->query('name'), function($query, $value) { $query->where('name', 'LIKE', "%{$value}%"); })
            ->when($request->query('status'), function($query, $value) { $query->where('status', '=', $value); })
            ->paginate();

        return response()->json([
            'message'   => 'OK',
            'status'    => 200,
            'data'      => $categories,
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
        $category->refresh();

        return response()->json([
            'message'   => 'Category Created',
            'status'    => 201,
            'data'      => $category,
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
        $category = Category::findOrFail($id)->load('products');

        $this->authorize('view', $category);

        return response()->json([
            'message'   => 'OK',
            'status'    => 200,
            'data'      => $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {

        $category = Category::findOrFail($id);
        
        $this->authorize('update', $category);
        
        $category->update($request->all());
        // $category->refresh();

        return response()->json([
            'message'   => 'Category Updated',
            'status'    => 201,
            'data'      => $category,
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
        $category = Category::findOrFail($id);
        
        $this->authorize('delete', $category);

        $category->delete();

        return response()->json([
            'message'   => 'Category Trashed',
            'status'    => 200,
        ]);
    }

    public function restore(Request $request, $id = null)
    {
        $this->authorize('restore', Category::class);

        if ($id) {
            $category = Category::withoutGlobalScope('active')->onlyTrashed()->findOrFail($id);
            $category->restore();

            return response()->json([
                'message'   => 'Category Restore',
                'status'    => 200,
                'data'      => $category,
            ]);
        }

        Category::onlyTrashed()->restore();

        return response()->json([
            'message'   => 'All Trashed Categories Restored',
            'status'    => 200,
        ]);
    }

    public function forceDelete($id = null)
    {
        $this->authorize('forceDelete', Category::class);
        
        if ($id) {
            $category = Category::withoutGlobalScope('active')->onlyTrashed()->findOrFail($id);
            $category->forceDelete();

            return response()->json([
                'message'   => 'Category Permanent Deleted',
                'status'    => 200,
            ]);
        }

        Category::onlyTrashed()->forceDelete();

        return response()->json([
            'message'   => 'All Trash Categories Permanent Deleted',
            'status'    => 200,
        ]);
    }
}
