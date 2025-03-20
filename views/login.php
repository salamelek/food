<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="../assets/styles/style.css">
</head>
<body>
<?php require "../modules/navigation.php"; ?>
<main>
    <form onsubmit="return login(event, this)">
        <label for="username-input">Username:</label>
        <input
            type="text"
            id="username-input"
            placeholder="username"
            name="username"
            required
        ><br>

        <label for="password-input">Password:</label>
        <input
            type="password"
            id="password-input"
            placeholder="password"
            name="password"
            required
        ><br>

        <input type="submit" value="Submit and login">
    </form>
    <div>
        <h5 id="feedback-msg">
        </h5>
    </div>
</main>
<?php require "../modules/footer.php"; ?>
</body>

<script src="../assets/scripts/login.js"></script>

</html>
