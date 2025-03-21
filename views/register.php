<?php
require "../actions/db_connect.php";
require "../actions/fetch_usernames.php";

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
    <div class="container">
        <form onsubmit="return create_new_user(event, this)">
            <label for="username-input">Username:</label>
            <input
                    type="text"
                    id="username-input"
                    placeholder="username"
                    name="username"
                    required
                    autocomplete="off"
                    oninput='check_usernames(this.value, <?= json_encode($usernames) ?>)'
            ><br>
            <p id="username-feedback"></p>

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
    </div>
</main>
<?php require "../modules/footer.php"; ?>
</body>

<script src="../assets/scripts/create_new_user.js"></script>
<script src="../assets/scripts/check_usernames.js"></script>

</html>
