<?php

namespace App\Mail;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderInvoice extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    protected $order;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->subject('Invoice #' . $this->order->number);
        $this->from('billing@TDS', 'Billing Account');
        // $this->to($this->order->billing_email, $this->order->billing_name);
        
        return $this->view('mails.mail', [
            'order' => $this->order,
        ]);
    }
}
