<?php
//echo "unload";

require_once '../db/db.config.php';


try {
    // Connect to database
    $pdo = new PDO('mysql:host=' . $servername . ';dbname=' . $dbname, $username, $password);
    // Set PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Get data from database
    // Get data from database
    $stmt = $pdo->prepare("SELECT temperature, is_day, weather_code, wind_speed FROM Weather ORDER BY id DESC LIMIT 1");
    $stmt->execute();
    $weatherdata = $stmt->fetchAll(PDO::FETCH_ASSOC); // fetch data from database table Weather

    // Add error handling
    if (empty($weatherdata)) {
        http_response_code(404);
        echo json_encode(['error' => "Weatherdata not found"]);
        return;
    }

    // Initialize arrays to hold the values
    $temperature = [];
    $isDay = [];
    $weatherCode = [];
    $windSpeed = [];

    // Loop through the data and assign to variables
    foreach ($weatherdata as $row) {
        $temperature = (int)$row['temperature'];    // Convert temperature to integer
        $isDay = (int)$row['is_day'];
        $weatherCode = (int)$row['weather_code'];
        $windSpeed = (int)$row['wind_speed'];
    }

    // Return the array as JSON
    header('Content-Type: application/json');

    // Check
    // echo json_encode($weather_result);
} catch (PDOException $e) {
    // Log error and throw exception
    error_log("Error connecting to database: " . $e->getMessage());
    throw new Exception("Error connecting to database: " . $e->getMessage());
}
