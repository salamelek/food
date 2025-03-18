<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$databasePath = "../food.db";

try {
    $pdo = new PDO("sqlite:$databasePath");

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
