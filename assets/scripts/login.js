async function login(event, form) {
    event.preventDefault(); // Prevent default form submission

    let formData = new FormData(form);

    try {
        let response = await fetch("../../actions/login.php", {
            method: "POST",
            body: formData
        });

        if (!response.ok) {
            throw new Error("Request failed with status " + response.status);
        }

        let data = await response.json();
        let messageElement = document.getElementById("feedback-msg");

        if (data.success) {
            messageElement.textContent = "Logged in successfully :>";
            messageElement.style.color = "green";

            // Redirect to the index page if the user is successfully created
            window.location.href = data.redirect;
        } else {
            messageElement.textContent = "Failed to login: " + data.message;
            messageElement.style.color = "red";
        }
    } catch (error) {
        console.error("Error:", error);
        document.getElementById("feedback-msg").textContent = "An error occurred.";
    }
}
