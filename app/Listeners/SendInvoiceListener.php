<?php

namespace App\Listeners;

use App\Events\OrderCreated;
use App\Mail\OrderInvoice;
use App\Models\User;
use App\Notifications\OrderCreatedNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

class SendInvoiceListener implements ShouldQueue
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

        // $user = User::where('type', 'super-admin')->first();
        // $user->notify( new OrderCreatedNotification($order));

        $users = User::whereIn('type', ['super-admin', 'admin'])->get();
        Notification::send($users, new OrderCreatedNotification($order));
        
        Mail::to($order->billing_email)->send(new OrderInvoice($order));

    }
}
