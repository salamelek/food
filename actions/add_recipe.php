<?php
require "db_connect.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    http_response_code(405);
    echo json_encode(["success" => false, "message" => "Method not allowed."]);
    exit;
}

$recipeName = htmlspecialchars($_POST["name"]);
$recipeDescription = htmlspecialchars($_POST["description"]);

$stmt = $pdo->prepare("
    INSERT INTO Recipes (name, description)
    VALUES (:name, :description)
");

if ($stmt->execute([
    "name" => $recipeName,
    "description" => $recipeDescription
])) {
    echo json_encode(["success" => true, "redirect" => "/"]);
    exit;
} else {
    http_response_code(500);
    echo json_encode(["success" => false, "message" => "Failed to add recipe."]);
}
