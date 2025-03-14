<?php

$routes = [
    '' => 'views/index.php',
    'login' => 'views/login.php',
    'register' => 'views/register.php',
];

$route = $_GET['route'] ?? '';

if (array_key_exists($route, $routes)) {
    require $routes[$route];
} else {
    http_response_code(404);
    require 'views/404.php';
}
