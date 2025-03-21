<?php
include "../actions/db_connect.php";

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

$recipe = $stmt->fetch(PDO::FETCH_ASSOC);

$recipeName = "";
$recipeDescription = "";

if ($recipe) {
    $recipeName = htmlspecialchars($recipe["name"]);
    $recipeDescription = htmlspecialchars($recipe["description"]);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit recipe</title>
    <link rel="stylesheet" href="../assets/styles/style.css">
</head>
<body>
<?php require "../modules/navigation.php"; ?>
<main>
    <?php if (!$recipe): ?>
    <h3>
        No recipe with that ID!
    </h3>
    <?php else: ?>
    <h3>
        Editing: <?= $recipeName ?>
    </h3>
    <form onsubmit="edit_recipe(event, this)">
        <input type="hidden" name="id" value="<?= $recipeId ?>">

        <label for="recipe-name">Name:</label><br>
        <input
            type="text"
            id="recipe-name"
            name="name"
            value="<?= $recipeName ?>"
            required
        ><br>

        <label for="recipe-description">Description:</label><br>
        <textarea
            name="description"
            id="recipe-description"
            cols="30"
            rows="10"
            required
        ><?= $recipeDescription ?></textarea><br>

        <input type="submit" value="Done">
    </form>
    <p id="feedback-msg"></p>
    <?php endif; ?>
</main>
<?php require "../modules/footer.php"; ?>
</body>

<script src="../assets/scripts/edit_recipe.js"></script>

</html>
