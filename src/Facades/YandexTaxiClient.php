<?php

namespace IPinchuk\LaravelYandexTaxi\Facades;

use Illuminate\Support\Facades\Facade;

class YandexTaxiClient extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'yandex_taxi';
    }
}
