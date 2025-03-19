<?php
require "db_connect.php";

// Check if the request is a POST
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    http_response_code(405);
    echo json_encode(["success" => false, "message" => "Method not allowed."]);
    exit;
}

$username = htmlspecialchars($_POST["username"]);
$password = htmlspecialchars($_POST["password"]);

// Fetch the password hash
$stmt = $pdo->prepare("
    SELECT password FROM users
    WHERE username = :username
");

if ($stmt->execute(["username" => $username])) {
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row && password_verify($password, $row["pswHash"])) {
        // login the user
        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['user_id'] = $pdo->lastInsertId();

        echo json_encode(["success" => true, "redirect" => "/"]);
    } else {
        echo json_encode(["success" => false, "message" => "Invalid username or password."]);
    }
    exit;
} else {
    http_response_code(500);
    echo json_encode(["success" => false, "message" => "Failed to create user."]);
}
