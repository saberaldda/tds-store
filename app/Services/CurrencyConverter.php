<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use AmrShawky\LaravelCurrency\Facade\Currency;

class CurrencyConverter
{
    public function convert(string $from, string $to, float $amount = 1): float
    {

        // $q = "{$from}_{$to}";
        // $response = Http::baseUrl($this->baseUrl)
        //     ->get('/convert', [
        //         'q' => $q,
        //         'compact' => 'y',
        //         'apiKey' => $this->apiKey,
        //     ]);

        // $result = $response->json();
        // dd($result);
        // return $result[$q]['val'] * $amount;

        $currency = Currency::convert()
                ->from($from)
                ->to($to)
                ->amount($amount)
                ->round(2)
                ->get();
        return $currency;
        // dd($currency);
    }
}