<?php
// Load routes configuration
require_once __DIR__ . '/routes/web.php';

// Get the requested URL
$requestedUri = $_SERVER['REQUEST_URI'];

// Remove any query string
$requestedUri = strtok($requestedUri, '?');

// Route the request based on URI
if (array_key_exists($requestedUri, $routes)) {
    include __DIR__ . '/views/' . $routes[$requestedUri];
} else {
    include __DIR__ . '/views/404.php';
}
