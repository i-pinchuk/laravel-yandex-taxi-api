<?php

namespace IPinchuk\LaravelYandexTaxi;

use Illuminate\Support\ServiceProvider;
use IPinchuk\YandexTaxi\Client;

class YandexTaxiServiceProvider extends ServiceProvider {

    /**
     * Boot the service provider.
     *
     * @return void
     */
    public function boot()
    {
        $source = __DIR__ . '/../config/yandex_taxi.php';

        $this->publishes([$source => config_path('yandex_taxi.php')]);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('yandex_taxi', function() {
            $client_id = config('yandex_taxi.client_id');
            $api_key = config('yandex_taxi.api_key');
            $park_id = config('yandex_taxi.park_id');
            $proxy = config('yandex_taxi.proxy');

            $client = new Client($client_id, $api_key, $park_id);

            if ($proxy) {
                $client->setProxy($proxy);
            }

            return $client;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['yandex_taxi'];
    }

}
