<?php

namespace App\Service;

use App\Http\Resources\WeatherResource;
use Illuminate\Support\Facades\Http;

class WeatherApiService
{
    protected string $apiUrl;
    protected string $apiKey;
    protected string $units = 'metric';

    public function __construct()
    {
        $this->apiUrl = config('services.openweather.url');
        $this->apiKey = config('services.openweather.key');
    }

    public function getWeather($lat, $long): WeatherResource
    {
        $res = Http::get($this->apiUrl, [
                'appid' => $this->apiKey,
                'lat' => $lat,
                'lon' => $long,
                'units' => $this->units
            ]);

        return new WeatherResource($res->object());
    }

}
