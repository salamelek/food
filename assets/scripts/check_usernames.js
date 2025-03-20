function check_usernames(username, usernames) {
    let feedbackElement = document.getElementById("username-feedback");

    if (username === "") {
        feedbackElement.style.display = "none";
    } else {
        feedbackElement.style.display = "block";
    }

    if (usernames.includes(username)) {
        feedbackElement.style.color = "red";
        feedbackElement.textContent = "Username already taken!";
    } else {
        feedbackElement.style.color = "green";
        feedbackElement.textContent = "Username available!";
    }
}