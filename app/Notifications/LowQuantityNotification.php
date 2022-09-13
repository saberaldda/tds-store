<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class LowQuantityNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $product;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($product)
    {
        $this->product = $product;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject( __('Low Quantity Product #:id.',['id' => $this->product->id]))
                    ->from('info@TDS', 'TDS AI')
                    ->greeting( __('Hello, :name', ['name'=> $notifiable->name ?? '']) )
                    ->line(__('Low Quantity in Stock. (Product #:id)',['id' => $this->product->id]))
                        // __('New Order #:number', ['number' => $this->order->number])
                    ->action('Notification Action', route('products.edit', $this->product->id))
                    ->line('Thank you for using our application!');
    }

    public function toDatabase($notifiable)
    {
        return [
            'title' => __('Low Quantity Product #:id.',['id' => $this->product->id]),
            'body' => __('Low Quantity in Stock. (Product #:id)',['id' => $this->product->id]),
            'icon' => '',
            'url' => url('/'),
        ];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
