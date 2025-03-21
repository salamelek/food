<?php
include "../actions/db_connect.php";
include "../actions/fetch_recipe_by_id.php";
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
    <?php if (!$recipeSet): ?>
        <h3>
            No recipe with that ID!
        </h3>
    <?php else: ?>
        <div class="container">
            <h3>
                <?= $recipeName ?>
            </h3>
            <p>
                <?= $recipeDescription ?>
            </p>
        </div>
    <?php endif; ?>
</main>
<?php require "../modules/footer.php"; ?>
</body>

<script src=""></script>

</html>