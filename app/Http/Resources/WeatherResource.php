<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WeatherResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        if (!isset($this->coord) || !isset($this->main)) {
            return [];
        }

        return [
            'lat' => $this->coord->lat,
            'lon' => $this->coord->lon,
            'timezone' => $this->timezone,
            'current_weather' => [
                'datetime' => $this->dt,
                'temp' => $this->main->temp,
                'feels_like' => $this->main->feels_like
            ],
            "daily_forecast" => [
                "datetime" => $this->dt,
                "sunrise" => $this->sys->sunrise,
                "sunset" => $this->sys->sunset,
                "summary" => $this->weather[0]->description,
                "temp" => [
                    "day" => $this->main->temp,
                    "min" => $this->main->temp_min,
                    "max" => $this->main->temp_max,
                ]
            ]
        ];
    }
}
