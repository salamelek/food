function deleteRecipe(recipeId, elToDelete) {
    fetch("/actions/delete_recipe.php", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: "id=" + recipeId
    }).then(response => {
        if (response.ok) {
            makeItDisappearNicely(elToDelete);
        } else {
            console.error("Failed to delete recipe.");
        }
    }).catch(error => console.error("Error:", error));
}

function makeItDisappearNicely(element) {
    element.style.transition = "0.5s ease-out";
    element.style.transform = "scale(0) translateY(-100%)";
    element.style.opacity = "0";

    // reload after the animation ends
    setTimeout(() => {
        location.reload();
    }, 500);
}
