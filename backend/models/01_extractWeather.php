<?php
require_once '../db/db.config.php';

// Define API URL
$url = 'https://api.open-meteo.com/v1/forecast?latitude=46.9481&longitude=7.4474&current=temperature_2m,is_day,weather_code,wind_speed_10m';

// Initiate cURL as curlHandle
$ch = curl_init($url);

try {
    // Fetch data from $url
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // return data as a string, do not echo
    $weatherdata = curl_exec($ch);                  // execute the request
    curl_close($ch);                               // close the curl resource, freeing up system resources
    echo $weatherdata;

    // Save data to as json to $weatherdata
    $weatherdata = json_decode($weatherdata, true); # decode json response to array

} catch (\Exception $e) { # catch exceptions that occur during data fetch
    error_log("Error fetching weather data: " . $e->getMessage() . "\n"); # log error message
}
