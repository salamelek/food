<?php
require "db_connect.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    http_response_code(405);
    echo json_encode(["success" => false, "message" => "Method not allowed."]);
    exit;
}

$data = json_decode(file_get_contents("php://input"), true);
$id = intval($data["id"]);

$stmt = $pdo->prepare("
        UPDATE Recipes SET deleted = 1 WHERE id = ?
    ");

if ($stmt->execute([$id])) {
    http_response_code(200);
    echo json_encode(["success" => true]);
} else {
    http_response_code(500);
    echo json_encode(["success" => false, "error" => "Failed to delete record"]);
}
