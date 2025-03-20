<?php
include "../actions/db_connect.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add recipe</title>
    <link rel="stylesheet" href="../assets/styles/style.css">
</head>
<body>
<?php require "../modules/navigation.php"; ?>
<main>
    <div class="container">
        <h3>
            Add a new recipe
        </h3>
        <form onsubmit="add_recipe(event, this)">
            <label for="recipe-name">Name:</label><br>
            <input
                type="text"
                id="recipe-name"
                name="name"
            ><br>

            <label for="recipe-description">Description:</label><br>
            <textarea
                name="description"
                id="recipe-description"
                cols="30"
                rows="10"
            ></textarea><br>

            <input type="submit" value="Done">
        </form>
        <p id="feedback-msg"></p>
    </div>
</main>
<?php require "../modules/footer.php"; ?>
</body>

<script src="../assets/scripts/edit_recipe.js"></script>

</html>
