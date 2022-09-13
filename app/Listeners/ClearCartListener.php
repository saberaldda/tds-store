<?php

namespace App\Listeners;

use App\Models\Cart;
use App\Repositories\Cart\CartRepository;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ClearCartListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(CartRepository $cart)
    {
        $this->cart = $cart;
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $this->cart->clear();
    }
}
