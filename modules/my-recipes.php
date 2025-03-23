<?php
require "../actions/db_connect.php";

try {
    $stmt = $pdo->query("
        SELECT id, name, description FROM Recipes
        WHERE deleted = 0
    ");
    $recipes = $stmt->fetchAll();
} catch (PDOException $e) {
    echo "Error fetching recipes: " . $e->getMessage();
    exit();
}
?>

<link rel="stylesheet" href="../assets/styles/style.css">
<section id="myRecipes" class="container">
    <div class="recipe-list-container">
        <h3>
            My recipes
        </h3>

        <?php foreach($recipes as $key => $recipe): ?>
        <div
            class="recipe-list-preview border"
            onclick="view_recipe(event, <?= $recipe["id"] ?>)"
        >
            <p class="m-0">
                <?= htmlspecialchars($recipe["name"]) ?>
            </p>
            <div class="options-container">
                <div class="icon" title="Edit recipe">
                    <a href="/edit-recipe?id=<?= $recipe["id"] ?>">
                        <img src="../assets/icons/pencil_icon.png" alt="pencil icon">
                    </a>
                </div>
                <div class="icon" title="Delete recipe" onclick="deleteRecipe(<?= $recipe["id"] ?>, this.closest('.recipe-list-preview'))">
                    <img src="../assets/icons/trashcan_icon.png" alt="trashcan icon">
                </div>
            </div>
        </div>
        <?php endforeach; ?>

        <?php if (count($recipes) == 0): ?>
        <p>No recipes yet! Click the button below to add some :></p>
        <?php endif; ?>

        <a href="/add-recipe">
            <div class="add-recipe-button icon border" title="Add recipe">
                <img src="../assets/icons/add_icon.png" alt="add icon">
            </div>
        </a>
    </div>
</section>

<script src="../assets/scripts/delete_recipe.js"></script>
<script src="../assets/scripts/view_recipe.js"></script>