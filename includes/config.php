<?php
// Define the base URL
define('BASE_URL', '/');

// Function to include navbar
function includeNavbar() {
    include __DIR__ . '/navbar.php';
}

// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?> 