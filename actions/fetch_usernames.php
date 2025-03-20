<?php
// fetch all usernames
$usernames = [];

$stmt = $pdo->prepare("
    SELECT username
    FROM Users
");

if (!$stmt->execute()) {
    echo "Statement execution failed";
    exit;
}

$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($rows as $row) {
    $usernames[] = $row["username"];
}