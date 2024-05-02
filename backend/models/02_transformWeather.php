<?php
require_once '../models/01_extractWeather.php';

// print_r($weatherdata);
reduceWeatherData($weatherdata);
print_r($weatherdata);


function reduceWeatherData(&$data)
{
    // Create a new array to store reduced data
    $reducedData = [];

    // Extract value dimensions from current data
    $reducedData['temperature'] = $data['current']['temperature_2m'];
    $reducedData['isDay'] = $data['current']['is_day'];
    $reducedData['weatherCode'] = $data['current']['weather_code'];
    $reducedData['windSpeed'] = $data['current']['wind_speed_10m'];

    // Replace the original data with reduced data
    $data = $reducedData;
}
