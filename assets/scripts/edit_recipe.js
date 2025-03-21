async function edit_recipe(event, form) {
    event.preventDefault();

    let formData = new FormData(form);

    try {
        let response = await fetch("../../actions/edit_recipe.php", {
            method: "POST",
            body: formData
        });

        if (!response.ok) {
            throw new Error("Request failed with status " + response.status);
        }

        let data = await response.json();
        let messageElement = document.getElementById("feedback-msg");

        if (data.success) {
            messageElement.textContent = "Recipe updated successfully";
            messageElement.style.color = "green";

            window.location.href = data.redirect;
        } else {
            messageElement.textContent = "Failed to update recipe: " + data.message;
            messageElement.style.color = "red";
        }
    } catch (error) {
        console.error("Error:", error);
        document.getElementById("feedback-msg").textContent = "An error occurred.";
    }
}