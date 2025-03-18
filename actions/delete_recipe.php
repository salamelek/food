<?php
require 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = intval($_POST['id']);

    $stmt = $pdo->prepare("
        UPDATE Recipes SET deleted = 1 WHERE id = ?
    ");
    if ($stmt->execute([$id])) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["success" => false]);
    }
}
