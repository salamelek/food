<?php
require 'db_connect.php'; // Include your DB connection

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = intval($_POST['id']); // Convert to int to prevent injection

    $stmt = $pdo->prepare("
DELETE FROM Recipes WHERE id = $id
");
    if ($stmt->execute([$id])) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["success" => false]);
    }
}
