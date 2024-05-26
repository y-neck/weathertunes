<?php
require_once '../db/02_transformWeather.php';
require_once '../db/db.config.php';

$data = [
    'temperature' => $weatherdata['temperature'],
    'isDay' => $weatherdata['isDay'],
    'weatherCode' => $weatherdata['weatherCode'],
    'windSpeed' => $weatherdata['windSpeed'],
];

try {
    // Transform weather data if necessary
    // Assuming $weatherdata is properly populated before this point
    $data = [
        'temperature' => $weatherdata['temperature'],
        'isDay' => $weatherdata['isDay'],
        'weatherCode' => $weatherdata['weatherCode'],
        'windSpeed' => $weatherdata['windSpeed'],
    ];

    // Debug:
    print_r($data);

    // connect to database
    $pdo = new PDO('mysql:host=' . $servername . ';dbname=' . $dbname, $username, $password);

    // Set PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Save data to database
    $stmt = $pdo->prepare("INSERT INTO Weather (temperature, is_day, weather_code, wind_speed) VALUES (:temperature, :isDay, :weatherCode, :windSpeed)");
    $stmt->execute([
        'temperature' => $data['temperature'],
        'isDay' => $data['isDay'],
        'weatherCode' => $data['weatherCode'],
        'windSpeed' => $data['windSpeed'],
    ]);

    echo "Weather data stored to database.";
} catch (PDOException $e) {
    // Log error and throw exception
    error_log("Error storing weather data to database: " . $e->getMessage());
    throw new Exception("Error storing weather data to database: " . $e->getMessage());
}
