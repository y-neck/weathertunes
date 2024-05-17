<?php
//echo "unload";

require_once '../db/db.config.php';

try {
    // Connect to database
    $pdo = new PDO('mysql:host=' . $servername . ';dbname=' . $dbname, $username, $password);
    // Set PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Get data from database
    $stmt = $pdo->prepare("SELECT weather_code FROM Weather ORDER BY id DESC LIMIT 3");
    $stmt->execute();
    $pastWeatherdata = $stmt->fetchAll(PDO::FETCH_ASSOC); // fetch data from database table Weather

    // Add error handling
    if (empty($pastWeatherdata)) {
        http_response_code(404);
        echo json_encode(['error' => "Past Weatherdata not found"]);
        return;
    }

    // Initialize arrays to hold the values
    $weatherCode = [];

    // Loop through the data and add it to the arrays
    foreach ($pastWeatherdata as $row) {
        $weatherCode[] = (int)$row['weather_code'];
    }

    // Prepare array structure
    $past_weather_result = [
        'weatherCode' => $weatherCode
    ];

    // Return the array as JSON
    header('Content-Type: application/json');
    echo json_encode($past_weather_result);
} catch (PDOException $e) {
    // Log error and throw exception
    error_log("Error connecting to database: " . $e->getMessage());
    throw new Exception("Error connecting to database: " . $e->getMessage());
}
