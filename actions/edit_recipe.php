<?php
require "db_connect.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    http_response_code(405); // Method Not Allowed
    echo json_encode(["success" => false, "message" => "Invalid request method"]);
    exit;
}

$id = intval($_POST["id"]);
$name = htmlspecialchars($_POST["name"]);
$description = htmlspecialchars($_POST["description"]);

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
