<?php
/*
 * This is the header file that gets included at the top of every page
 * It handles important things like:
 * - Starting the session
 * - Checking if user is logged in
 * - Setting up correct paths for including other files
 */

// First, include the database connection
require_once 'db.php';

// Then include the session management file
// This file contains functions for handling user login/logout
require_once 'session.php';

// Let's find out which page we're currently on
// $_SERVER['PHP_SELF'] gives us the current file name
// basename() gets just the file name without the full path
$current_page = basename($_SERVER['PHP_SELF']);

// We need to figure out if we're in the 'pages' directory
// This helps us set the correct path for including other files
$is_in_pages = strpos($_SERVER['PHP_SELF'], '/pages/') !== false;

// Set up the base path for including other files
// If we're in the pages directory, we need to go up one level (../)
// If we're not in pages directory, we can use the current directory
if ($is_in_pages) {
    $base_path = '../';  // Go up one level
} else {
    $base_path = '';     // Stay in current directory
}

// Check if user needs to be logged in
// We don't require login on the login page itself
if ($current_page !== 'login.php') {
    // This function checks if user is logged in
    // If not, it will redirect to login page
    requireLogin();
}

/*
 * This function includes the navigation bar
 * It uses the correct path we set up earlier
 */
function includeNavbar() {
    // Use the global variable we set up earlier
    global $base_path, $conn;
    
    // Include the navbar file from the correct location
    require $base_path . 'includes/navbar.php';
}
?> 