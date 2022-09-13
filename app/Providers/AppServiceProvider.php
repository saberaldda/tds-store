<?php

namespace App\Providers;

use App\Services\CurrencyConverter;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use PayPalCheckoutSdk\Core\PayPalHttpClient;
use PayPalCheckoutSdk\Core\ProductionEnvironment;
use PayPalCheckoutSdk\Core\SandboxEnvironment;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Currency Converter
        $this->app->bind('currency.converter', function () {
            return new CurrencyConverter(config('services.currency_converter.api_key'));
        });

        // PayPal
        $this->app->singleton('paypal.client', function($app) {

            $config = config('services.paypal');
                $clientId = $config['client_id'];
                $clientSecret = $config['client_secret'];

            if ($config['mode'] == 'sandbox') {
                $environment = new SandboxEnvironment($clientId, $clientSecret);
            }else{
                $environment = new ProductionEnvironment($clientId, $clientSecret);
            }
            $client = new PayPalHttpClient($environment);
            return $client;
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
    }
}
