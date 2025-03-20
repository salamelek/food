<?php
$loggedIn = false;
$username = "";

if (isset($_SESSION['user_id'])) {
    $username = $_SESSION['username'];
    $loggedIn = true;
}
?>

<link rel="stylesheet" href="../assets/styles/navigation.css">
<nav>
    <div class="nav-container">
        <div class="logo-container">
            <a href="/">
                <img src="../assets/images/food_logo.png" alt="logo">
            </a>
        </div>

        <?php if ($loggedIn): ?>
        <div>
            <p class="mt-0">
                Logged in as <?= $username ?>
            </p>
            <form action="../actions/log_out.php" method="POST">
                <button type="submit">
                    Log out
                </button>
            </form>
        </div>
        <?php else: ?>
        <div class="login-logout-container">
            <a href="login" class="border">
                Log in
            </a>
            <a href="register" class="border">
                Register
            </a>
        </div>
        <?php endif; ?>
    </div>
</nav>
