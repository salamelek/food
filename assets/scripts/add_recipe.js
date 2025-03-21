async function add_recipe(event, form) {
    event.preventDefault();

    let formData = new FormData(form);

    try {
        let response = await fetch("../../actions/add_recipe.php", {
            method: "POST",
            body: formData
        });

        if (!response.ok) {
            throw new Error("Request failed with status " + response.status);
        }

        let data = await response.json();
        let messageElement = document.getElementById("feedback-msg");

        if (data.success) {
            messageElement.textContent = "Recipe created successfully :D";
            messageElement.style.color = "green";

            window.location.href = data.redirect;
        } else {
            messageElement.textContent = "Failed to create recipe: " + data.message;
            messageElement.style.color = "red";
        }
    } catch (error) {
        console.error("Error:", error);
        document.getElementById("feedback-msg").textContent = "An error occurred.";
    }
}