<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{
    public function getWeather($city1 = 'London', $city2 = null, $city3 = null)
    {
        $cities = array_filter([$city1, $city2, $city3]);
        $weatherData = [];

        foreach ($cities as $city) {
            $weatherData[] = $this->fetchWeather($city);
        }

        return view('weather', ['weatherData' => $weatherData]);
    }

    private function fetchWeather($city)
    {
        $response = Http::get('https://api.openweathermap.org/data/2.5/weather', [
            'q' => $city,
            'appid' => env('OPENWEATHER_API_KEY'),
            'units' => 'metric'
        ]);

        if ($response->successful()) {
            $data = $response->json();
            return [
                'city' => $city,
                'temperature' => $data['main']['temp'],
                'description' => $data['weather'][0]['description'],
                'humidity' => $data['main']['humidity'],
            ];
        }

        return [
            'city' => $city,
            'error' => 'City not found or API error'
        ];
    }
}
