<?php
require "db_connect.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    http_response_code(405);
    echo json_encode(["success" => false, "message" => "Method not allowed."]);
    exit;
}

$username = htmlspecialchars($_POST["username"]);
$password = htmlspecialchars($_POST["password"]);
$pswHash = password_hash($password, PASSWORD_DEFAULT);

// Prepare and execute the SQL to insert a new user
$stmt = $pdo->prepare("
    INSERT INTO Users (username, pswHash)
    VALUES (:username, :pswHash)
");

if ($stmt->execute([
    "username" => $username,
    "pswHash" => $pswHash
])) {
    // login the user
    session_start();
    $_SESSION["username"] = $username;

    echo json_encode(["success" => true, "redirect" => "/"]);
    exit;
} else {
    http_response_code(500);
    echo json_encode(["success" => false, "message" => "Failed to create user."]);
}
