<?php
require_once '../db/db.config.php';

// define API URL
$url = 'https://api.open-meteo.com/v1/forecast?latitude=46.9481&longitude=7.4474&current=temperature_2m,is_day,weather_code,wind_speed_10m';

// initiate cURL as curlHandle
$ch = curl_init($url);

try {
    // fetch data from $url
    curl_setopt($ch, CURLOPT_URL, $url);    // set url to fetch from
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // return data as a string, do not echo; https://www.php.net/manual/en/function.curl-setopt.php
    $weatherdata = curl_exec($ch);                  // execute the request
    curl_close($ch);                               // close the curl resource, freeing up system resources
    // echo $weatherdata;

    // save data to as json to $weatherdata
    if ($weatherdata === false) {
        error_log("Error fetching weather data: " . curl_error($ch) . "\n"); # log error message
    } else {
        $weatherdata = json_decode($weatherdata, true); # decode json response to array
    }
    if ($weatherdata === null) {
        echo "JSON error: " . json_last_error();  // Display error if any during json decoding
    } else {
        return ($weatherdata);  // Display decoded JSON response
    }
} catch (\Exception $e) { # catch exceptions that occur during data fetch
    error_log("Error fetching weather data: " . $e->getMessage() . "\n"); # log error message
}
