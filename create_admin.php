<?php
require_once 'includes/db.php';

// Admin credentials
$username = 'admin';
$email = 'admin@library.com';
$password = 'Library@123';

// Hash the password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Check if user already exists
$check = $conn->prepare("SELECT id FROM users WHERE username = ?");
$check->bind_param("s", $username);
$check->execute();
$result = $check->get_result();

if ($result->num_rows > 0) {
    echo "User already exists. Updating password...\n";
    
    // Update existing user
    $stmt = $conn->prepare("UPDATE users SET password = ? WHERE username = ?");
    $stmt->bind_param("ss", $hashed_password, $username);
} else {
    echo "Creating new admin user...\n";
    
    // Create new user
    $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $hashed_password);
}

if ($stmt->execute()) {
    echo "Success! You can now login with:\n";
    echo "Username: $username\n";
    echo "Password: $password\n";
} else {
    echo "Error: " . $conn->error . "\n";
}

$stmt->close();
$conn->close();
?> 