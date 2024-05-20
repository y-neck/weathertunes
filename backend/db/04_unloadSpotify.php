<?php
require_once '../db/db.config.php';
require '../db/04_unloadCurrentWeather.php';

// Control weatherCode for debugging
//Debug:
$weatherCode = 0;
// print_r('Current weatherCode:' . $weatherCode);

try {
    // Connect to database
    $pdo = new PDO('mysql:host=' . $servername . ';dbname=' . $dbname, $username, $password);
    // Set PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Get data from database using parameterized query
    $stmt = $pdo->prepare("SELECT seed_genre, min_acousticness, max_acousticness, min_danceability, max_danceability, min_energy, max_energy, max_speechyness, min_valence, max_valence, fallback_playlist FROM Spotify WHERE weather_id = :weatherCode");
    $stmt->bindParam(':weatherCode', $weatherCode, PDO::PARAM_INT);  // Assuming weather_id is an integer, bind php var to sql var
    $stmt->execute();
    $spotifyParameters = $stmt->fetchAll(PDO::FETCH_ASSOC);   // Fetch data from database table Weather_code_description

    // Add error handling
    if (empty($spotifyParameters)) {
        http_response_code(404);
        echo json_encode(['error' => "Spotify Parameters not found"]);
        return;
    }

    // Return the data as JSON
    echo json_encode([
        'seedGenre' => $spotifyParameters[0]['seed_genre'],
        'minAcousticness' => (float)$spotifyParameters[0]['min_acousticness'],
        'maxAcousticness' => (float)$spotifyParameters[0]['max_acousticness'],
        'minDanceability' => (float)$spotifyParameters[0]['min_danceability'],
        'maxDanceability' => (float)$spotifyParameters[0]['max_danceability'],
        'minEnergy' => (float)$spotifyParameters[0]['min_energy'],
        'maxEnergy' => (float)$spotifyParameters[0]['max_energy'],
        'maxSpeechyness' => (float)$spotifyParameters[0]['max_speechyness'],
        'minValence' => (float)$spotifyParameters[0]['min_valence'],
        'maxValence' => (float)$spotifyParameters[0]['max_valence'],
        'fallbackPlaylist' => (string)$spotifyParameters[0]['fallback_playlist'],
    ]);

    // Return the array as JSON
    header('Content-Type: application/json');
    //echo json_encode($spotifyParameters);
} catch (PDOException $e) {
    // Log error and throw exception
    error_log("Error connecting to database: " . $e->getMessage());
    throw new Exception("Error connecting to database: " . $e->getMessage());
}
