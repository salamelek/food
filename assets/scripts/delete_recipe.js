function deleteRecipe(recipeId, elToDelete) {
    if (!confirm("Are you sure you want to delete this recipe?")) {
        return;
    }

    fetch("/actions/delete_recipe.php", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: "id=" + recipeId
    })
        .then(response => {
            if (response.ok) {
                location.reload();
            } else {
                console.error("Failed to delete recipe.");
            }
        })
        .catch(error => console.error("Error:", error));
}
