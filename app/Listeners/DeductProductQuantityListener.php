<?php

namespace App\Listeners;

use App\Events\OrderCreated;
use App\Models\OrderItem;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Throwable;

class DeductProductQuantityListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(OrderCreated $event)
    {
        $order = $event->order;
        $order_items = OrderItem::where('order_id', $order->id)->get();

        // UPDATE products SET quantity = quantity - 1
        try {
            foreach ($order->products as $product) {
                
                $order_item = $order_items->where('product_id'   , $product->id)->first();

                $product->decrement('quantity', $order_item->quantity);
            }
            
        } catch (Throwable $e) {
            throw $e;
        }
    }
}
