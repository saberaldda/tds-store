<?php

namespace App\Observers;

use App\Models\Product;
use Illuminate\Support\Str;

class ProductsObserver
{
    /**
     * Handle the Product "created" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function created(Product $product)
    {
        //
    }

    public function creating(Product $product)
    {
        $slug = Str::slug($product->name);

            $count = Product::where('slug', 'LIKE', "{$slug}%")->count();
            if ($count) {
                $slug.= '-' . ($count + 1);
            }
            $product->slug = $slug;

            // change status if quantity = 0
            if($product->quantity == 0) {
                $product->status = 'draft';
            }
    }

    /**
     * Handle the Product "updated" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function updated(Product $product)
    {
        //
    }

    public function updating(Product $product)
    {
        $slug = Str::slug($product->name);

            $count = Product::where('slug', 'LIKE', "{$slug}%")->count();
            if ($count) {
                $slug.= '-' . ($count + 1);
            }
            $product->slug = $slug;

            // change status if quantity = 0
            if($product->quantity == 0) {
                $product->status = 'draft';
            }
    }

    /**
     * Handle the Product "deleted" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function deleted(Product $product)
    {
        //
    }

    /**
     * Handle the Product "restored" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function restored(Product $product)
    {
        //
    }

    /**
     * Handle the Product "force deleted" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function forceDeleted(Product $product)
    {
        //
    }
}
