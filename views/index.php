<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


session_start();

if (isset($_SESSION['user_id'])) {
    $username = $_SESSION['username'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food site</title>
    <link rel="stylesheet" href="../assets/styles/style.css">
</head>
<body>
<?php require "../modules/navigation.php"; ?>
<main>
    <?php require "../modules/myRecipes.php"; ?>
</main>
<?php require '../modules/footer.php'; ?>
</body>
</html>
