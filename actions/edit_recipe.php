<?php
require 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);
    $id = intval($data['id']);
    $name = htmlspecialchars($data['name']);
    $description = htmlspecialchars($data['description']);

    $stmt = $pdo->prepare("
        UPDATE Recipes SET name = :name, description = :description
        WHERE id = :id
    ");

    if ($stmt->execute([
        "id" => $id,
        "name" => $name,
        "description" => $description,
    ])) {
        http_response_code(200);
        echo json_encode(["success" => true]);
    } else {
        http_response_code(500);
        echo json_encode(["success" => false, "error" => "Failed to update record"]);
    }
}
