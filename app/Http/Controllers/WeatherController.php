<?php

namespace App\Http\Controllers;

use App\Http\Requests\LocationRequest;
use App\Http\Resources\WeatherResource;
use App\Service\WeatherApiService;

class WeatherController extends Controller
{
    public function index(LocationRequest $request, WeatherApiService $weatherApiService): WeatherResource
    {
        $data = $request->validated();

        return $weatherApiService->getWeather($data['lat'],$data['long']);
    }
}
