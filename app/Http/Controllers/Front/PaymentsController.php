<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Order;
use PayPalHttp\HttpClient;
use Illuminate\Http\Request;
use PayPalHttp\HttpException;
use Illuminate\Support\Facades\App;
use PayPalCheckoutSdk\Orders\OrdersCreateRequest;
use PayPalCheckoutSdk\Orders\OrdersCaptureRequest;

class PaymentsController extends Controller
{
    /**
     * @var \PayPalCheckoutSdk\Core\PayPalHttpClient;
     */
    protected $client;

    public function __construct()
    {
        $this->client = App::make('paypal.client');
    }

    public function create(Order $order)
    {
        if ($order->payment_status == 'paid') {
            return redirect()->route('home')->with('success', __('Payment Complete.'));
        }
            $payment = $order->payments()
            ->where('type', 'payment')
            ->where('status', 'CREATED')
            ->first();
        if ($payment) {
            $links = collect($payment->data['result']['links']);  // the return json return as array and we need object
            $link = $links->where('rel', '=', 'approve')->first();
            return redirect()->away($link->href);
        }

        // Authorize
        $request = new OrdersCreateRequest();
        $request->prefer('return=representation');
        $request->body = [
            "intent" => "CAPTURE",
            "purchase_units" => [[
                "reference_id" => $order->id,
                "amount" => [
                    "value" => $order->total,
                    "currency_code" => "USD",
                ],
            ]],
            "application_context" => [
                "cancel_url" => url(route('orders.payments.cancel', [$order->id])),
                "return_url" => url(route('orders.payments.return', [$order->id])),
            ],
        ];

        try {
            // Call API with your client and get a response for your call
            $response = $this->client->execute($request);

            if ($response && $response->statusCode == 201) {
                $links = collect($response->result->links);
                $link = $links->where('rel', '=', 'approve')->first();  // same 1 best than foreach

                $order->payments()->create([
                    'reference_id' => $response->result->id,
                    'amount' => $order->total,
                    'currency' => 'ILS',
                    'status' => $response->result->status,
                    'data' => $response,
                ]);

                return redirect()->away($link->href);

                // foreach ($links as $link) {  // same 2
                //     if ($link->rel == 'approve') {
                //         return redirect()->away($link->href);
                //     }
                // }
            }

            // If call returns body in response, you can get the deserialized version from the result attribute of the response
            dd($response);
        } catch (HttpException $ex) {
            echo $ex->statusCode;
            dd($ex->getMessage());
        }
    }

    public function callback(Order $order)
    {
        // Capture
        // $pp_order_id = request('token');  // same 1
        // $pp_order_id = request()->token;  // same 2
        $pp_order_id = request()->query('token'); // same 3

        $payment = $order->payments()->where('reference_id', $pp_order_id)->first();
        $payment->status = 'APPROVED';
        $payment->save();

        $request = new OrdersCaptureRequest($pp_order_id);
        $request->prefer('return=representation');
        try {
            // Call API with your client and get a response for your call
            $response = $this->client->execute($request);
            
            if ($response && $response->statusCode == 201) {
                $order->payment_status = 'paid';
                $order->save();

                $payment->status = $response->result->status;
                $payment->save();
            }

            // If call returns body in response, you can get the deserialized version from the result attribute of the response
            // dd($response);
            return redirect()->route('home')->with('success', __('Payment Complete.'));

        } catch (HttpException $ex) {
            echo $ex->statusCode;
            dd($ex->getMessage());
        }
    }

    public function cancel(Order $order)
    {
        
    }
}
