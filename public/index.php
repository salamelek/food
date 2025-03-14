<?php
require_once '../routes/web.php';

$route = $_GET['route'] ?? '/';

if (isset($routes[$route])) {
    require_once "../views/{$routes[$route]}";
} else {
    echo "404 Not Found";
}
