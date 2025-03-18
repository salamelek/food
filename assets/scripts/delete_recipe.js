function deleteRecipe(recipeId) {
    if (confirm("Are you sure you want to delete this recipe?")) {
        fetch("delete_recipe.php", {
            method: "POST",
            headers: { "Content-Type": "application/x-www-form-urlencoded" },
            body: "id=" + recipeId
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    document.querySelector(`.delete-btn[onclick="deleteRecipe(${recipeId})"]`).closest(".recipe-list-preview").remove();
                } else {
                    alert("Error deleting recipe.");
                }
            })
            .catch(error => console.error("Error:", error));
    }
}