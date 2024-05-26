<?php

require_once '../db/db.config.php';

print_r('CRON delete past weather');

// DB connection

try {
    // Connect to database
    $pdo = new PDO('mysql:host=' . $servername . ';dbname=' . $dbname, $username, $password);
    // Set PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Prepare and execute SQL statement
    $stmt = $pdo->prepare("DELETE FROM Weather
WHERE id NOT IN (SELECT id FROM (SELECT id FROM Weather ORDER BY id DESC LIMIT 10))");
    $stmt->execute();
    print_r('Successfully deleted past weather except last 10 entries');
} catch (PDOException $e) {
    // Log error and throw exception
    error_log("Error connecting to database: " . $e->getMessage());
    throw new Exception("Error connecting to database: " . $e->getMessage());
}
