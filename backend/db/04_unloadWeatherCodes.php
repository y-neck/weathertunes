<?php
// Import db config and current weatherdata
require_once '../db/db.config.php';
require_once '../db/04_unloadCurrentWeather.php';

// print_r($weatherdata);

// Extract weatherCode from $weatherdata
$weatherCodeValue = isset($weatherCode) ? $weatherCode : null;


try {
    // Connect to database
    $pdo = new PDO('mysql:host=' . $servername . ';dbname=' . $dbname, $username, $password);
    // Set PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Get data from database using parameterized query
    $stmt = $pdo->prepare("SELECT weather_description FROM Weather_code_description WHERE weather_code = :weatherCode");
    $stmt->bindParam(':weatherCode', $weatherCodeValue, PDO::PARAM_INT); // Assuming weather_code is an integer
    $stmt->execute();
    $weatherCodeData = $stmt->fetchAll(PDO::FETCH_ASSOC);   // Fetch data from database table Weather_code_description

    // Control current weatherCode read from weather db
    // print_r('WeatherCodeValue: ' . $weatherCodeValue);

    // Add error handling
    if (empty($weatherCodeData)) {
        http_response_code(404);
        echo json_encode(['error' => "WeatherDescription not found"]);
        return;
    }

    // Initialize array to hold weatherCodeDescription value
    // Initialize array to hold weatherCodeDescription value
    $weatherCodeDescription = [];

    // Loop through the data and assign to variables
    foreach ($weatherCodeData as $row) {
        $weatherCodeDescription = $row['weather_description'];
    }

    // Array structure
    $weatherCode_result = [
        'weatherCodeDescription' => $weatherCodeDescription
    ];
    print_r($weatherCode_result);
    // Return the array as JSON
    // header('Content-Type: application/json');
    // echo json_encode($weather_result);
} catch (PDOException $e) {
    // Log error and throw exception
    error_log("Error connecting to database: " . $e->getMessage());
    throw new Exception("Error connecting to database: " . $e->getMessage());
}
