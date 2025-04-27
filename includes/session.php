<?php
session_start();

function checkRememberMe() {
    global $conn;
    
    if (isset($_COOKIE['remember_token']) && !isset($_SESSION['user_id'])) {
        $token = mysqli_real_escape_string($conn, $_COOKIE['remember_token']);
        
        $query = "SELECT id FROM users WHERE remember_token = '$token'";
        $result = mysqli_query($conn, $query);
        
        if (!$result) {
            error_log("Query failed: " . mysqli_error($conn));
            return;
        }
        
        $user = mysqli_fetch_assoc($result);
        
        if ($user) {
            $_SESSION['user_id'] = $user['id'];
        }
    }
}

function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

function requireLogin() {
    if (!isLoggedIn()) {
        $current_path = $_SERVER['PHP_SELF'];
        $is_in_pages = strpos($current_path, '/pages/') !== false;
        $redirect_path = $is_in_pages ? '../pages/login.php' : 'pages/login.php';
        
        if (headers_sent()) {
            echo "<script>window.location.href = '$redirect_path';</script>";
            exit();
        } else {
            header('Location: ' . $redirect_path);
            exit();
        }
    }
}

function loginUser($user_id) {
    $_SESSION['user_id'] = $user_id;
}

function logout() {
    if (isset($_COOKIE['remember_token'])) {
        setcookie('remember_token', '', time() - 3600, '/');
    }
    
    session_destroy();
    
    if (headers_sent()) {
        echo "<script>window.location.href = '/pages/login.php';</script>";
        exit();
    } else {
        header('Location: /pages/login.php');
        exit();
    }
}

// Check remember me cookie on every page load
checkRememberMe();
?> 