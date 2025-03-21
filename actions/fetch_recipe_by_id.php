<?php
include "db_connect.php";

$recipeName = "";
$recipeDescription = "";
$recipeSet = false;

if (!isset($_GET["id"])) {
    return;
}

$recipeId = $_GET["id"];

$stmt = $pdo->prepare("
    SELECT name, description
    FROM Recipes
    WHERE id = :id
");

if (!$stmt->execute(["id" => $recipeId])) {
    echo "Couldn't retrieve recipe details.";
    exit;
}

$row = $stmt->fetch(PDO::FETCH_ASSOC);

if ($row) {
    $recipeSet = true;
    $recipeName = htmlspecialchars($row["name"]);
    $recipeDescription = htmlspecialchars($row["description"]);
}