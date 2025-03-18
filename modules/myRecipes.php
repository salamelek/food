<?php
// a nice temporary array :>
// $recipes = ["Toast s pašteto", "Pašta carbonara"];
$recipes = [];
?>

<link rel="stylesheet" href="../styles/style.css">
<section id="myRecipes" class="border textbox-padding">
    <div class="recipe-list-container">
        <h3>
            My recipes
        </h3>

        <?php foreach($recipes as $recipe): ?>
        <div class="recipe-list-preview border textbox-padding-small">
            <p class="no-margin">
                <?= htmlspecialchars($recipe) ?>
            </p>
            <div class="options-container">
                <div class="icon" title="Edit recipe" onclick="">
                    <img src="../assets/icons/pencil_icon.png" alt="pencil icon">
                </div>
                <div class="icon" title="Delete recipe" onclick="">
                    <img src="../assets/icons/trashcan_icon.png" alt="trashcan icon">
                </div>
            </div>
        </div>
        <?php endforeach; ?>

        <?php if (count($recipes) == 0): ?>
        <p>No recipes yet! Click the button below to add some :></p>
        <?php endif; ?>

        <div class="add-recipe-button icon border" title="Add recipe" onclick="">
            <img src="../assets/icons/add_icon.png" alt="add icon">
        </div>
    </div>
</section>
