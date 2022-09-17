<?php

namespace App\Observers;

use App\Models\Category;
use Illuminate\Support\Str;

class CategoriesObserver
{
    /**
     * Handle the Category "created" event.
     *
     * @param  \App\Models\Category  $category
     * @return void
     */
    public function created(Category $category)
    {
        //
    }

    public function creating(Category $category)
    {
            $slug = Str::slug($category->name);

            $count = Category::withTrashed()->where('slug', 'LIKE', "{$slug}%")->count();
            if ($count) {
                $slug.= '-' . ($count + 1);
            }
            $category->slug = $slug;
    }

    /**
     * Handle the Category "updated" event.
     *
     * @param  \App\Models\Category  $category
     * @return void
     */
    public function updated(Category $category)
    {
        //
    }

    public function updating(Category $category)
    {
        $slug = Str::slug($category->name);

            $count = Category::withTrashed()->where('slug', 'LIKE', "{$slug}%")->count();
            if ($count) {
                $slug.= '-' . ($count + 1);
            }
            $category->slug = $slug;
    }

    /**
     * Handle the Category "deleted" event.
     *
     * @param  \App\Models\Category  $category
     * @return void
     */
    public function deleted(Category $category)
    {
        //
    }

    /**
     * Handle the Category "restored" event.
     *
     * @param  \App\Models\Category  $category
     * @return void
     */
    public function restored(Category $category)
    {
        //
    }

    /**
     * Handle the Category "force deleted" event.
     *
     * @param  \App\Models\Category  $category
     * @return void
     */
    public function forceDeleted(Category $category)
    {
        //
    }
}
