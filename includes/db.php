<?php
$host = 'db';
$dbname = 'library_db';
$username = 'library_user';
$password = 'library_password';

// Create connection
$conn = mysqli_connect($host, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}