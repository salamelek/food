async function create_new_user(event, form) {
    event.preventDefault(); // Prevent default form submission

    let formData = new FormData(form);

    try {
        let response = await fetch("../../actions/create_new_user.php", {
            method: "POST",
            body: formData
        });

        if (!response.ok) {
            throw new Error("Request failed with status " + response.status);
        }

        let data = await response.json();
        let messageElement = document.getElementById("feedback-msg");

        if (data.success) {
            messageElement.textContent = "User created successfully!";
            messageElement.style.color = "green";

            // Redirect to the index page if the user is successfully created
            window.location.href = data.redirect;
        } else {
            messageElement.textContent = "Failed to create user: " + data.message;
            messageElement.style.color = "red";
        }
    } catch (error) {
        console.error("Error:", error);
        document.getElementById("feedback-msg").textContent = "An error occurred.";
    }
}
