<?php
require_once '../models/01_extractWeather.php';

// print_r($weatherdata);
reduceWeatherData($weatherdata);
print_r($weatherdata);


function reduceWeatherData(&$data)
{
    // Create a new array to store reduced data
    // Extract value dimensions from current data
    $data = [
        'temperature' => $data['current']['temperature_2m'],
        'isDay' => $data['current']['is_day'],
        'weatherCode' => $data['current']['weather_code'],
        'windSpeed' => $data['current']['wind_speed_10m'],
    ];
}
