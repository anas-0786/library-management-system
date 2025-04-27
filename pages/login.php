<?php
require_once '../includes/header.php';

// Check if user is already logged in
if (isLoggedIn()) {
    header('Location: ../index.php');
    exit();
}

$error = '';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    $remember = isset($_POST['remember']);

    // Validate input
    if (empty($username) || empty($password)) {
        $error = 'Please enter both username and password';
    } else {
        // Connect to database
        require_once '../includes/db.php';
        
        // Prepare statement to prevent SQL injection
        $stmt = $conn->prepare("SELECT id, password FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();
            
            // Verify password
            if (password_verify($password, $user['password'])) {
                // Login successful
                loginUser($user['id']);
                
                // Set remember me cookie if requested
                if ($remember) {
                    $token = bin2hex(random_bytes(32));
                    $expires = time() + (30 * 24 * 60 * 60); // 30 days
                    
                    $update = $conn->prepare("UPDATE users SET remember_token = ? WHERE id = ?");
                    $update->bind_param("si", $token, $user['id']);
                    $update->execute();
                    
                    setcookie('remember_token', $token, $expires, '/');
                }
                
                // Use JavaScript redirect if headers are already sent
                if (headers_sent()) {
                    echo "<script>window.location.href = '../index.php';</script>";
                } else {
                    header('Location: ../index.php');
                }
                exit();
            } else {
                $error = 'Invalid username or password';
            }
        } else {
            $error = 'Invalid username or password';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login - E-Ramdoot Library</title>
    <!-- Bootstrap 5 CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <!-- Font Awesome for icons -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),
            url('https://images.unsplash.com/photo-1507842217343-583bb7270b66?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
            padding: 20px;
            font-family: 'Poppins', sans-serif;
        }
        .login-container {
            max-width: 500px;
            width: 100%;
            padding: 40px;
            background: rgba(255, 255, 255, 0.95);
            border-radius: 15px;
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.2);
            backdrop-filter: blur(5px);
            margin: 20px;
        }
        .login-header {
            display: flex;
            align-items: center;
            margin-bottom: 40px;
            gap: 20px;
            flex-wrap: wrap;
        }
        .logo-container {
            width: 80px;
            height: 80px;
            background: #3498db;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 15px rgba(52, 152, 219, 0.3);
            flex-shrink: 0;
        }
        .logo-icon {
            font-size: 40px;
            color: white;
        }
        .system-name {
            font-size: 24px;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 8px;
        }
        .tagline {
            font-size: 14px;
            color: #7f8c8d;
            font-weight: 500;
            margin-bottom: 0;
        }
        .form-control {
            border-radius: 8px;
            padding: 12px;
            border: 1px solid #e0e0e0;
            transition: all 0.3s ease;
        }
        .form-control:focus {
            border-color: #3498db;
            box-shadow: 0 0 0 0.2rem rgba(52, 152, 219, 0.25);
        }
        .btn-login {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            font-weight: 600;
            border-radius: 8px;
            background: #3498db;
            border: none;
            transition: all 0.3s ease;
            margin-top: 10px;
        }
        .btn-login:hover {
            background: #2980b9;
            transform: translateY(-2px);
        }
        .remember-forgot {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            flex-wrap: wrap;
            gap: 10px;
        }
        .form-check-input:checked {
            background-color: #3498db;
            border-color: #3498db;
        }
        .forgot-password {
            color: #3498db;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        .forgot-password:hover {
            color: #2980b9;
            text-decoration: underline;
        }
        .alert {
            margin-bottom: 20px;
        }

        @media (max-width: 768px) {
            .login-container {
                padding: 30px;
                margin: 15px;
            }
            
            .login-header {
                margin-bottom: 30px;
                gap: 15px;
            }
            
            .logo-container {
                width: 70px;
                height: 70px;
            }
            
            .logo-icon {
                font-size: 35px;
            }
            
            .system-name {
                font-size: 20px;
            }
            
            .form-control {
                padding: 10px;
            }
        }

        @media (max-width: 480px) {
            .login-container {
                padding: 20px;
                margin: 10px;
            }
            
            .login-header {
                margin-bottom: 20px;
                gap: 10px;
            }
            
            .logo-container {
                width: 60px;
                height: 60px;
            }
            
            .logo-icon {
                font-size: 30px;
            }
            
            .system-name {
                font-size: 18px;
            }
            
            .tagline {
                font-size: 12px;
            }
            
            .remember-forgot {
                flex-direction: column;
                align-items: flex-start;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-header">
            <div class="logo-container">
                <i class="fas fa-book-reader logo-icon"></i>
            </div>
            <div class="header-text">
                <h1 class="system-name">E-Ramdoot Library</h1>
                <p class="tagline">Your Gateway to Digital Knowledge</p>
            </div>
        </div>
        
        <?php if ($error): ?>
            <div class="alert alert-danger">
                <?php echo htmlspecialchars($error); ?>
            </div>
        <?php endif; ?>

        <form method="POST" action="">
            <div class="mb-3">
                <label for="username" class="form-label">Username or Email</label>
                <input
                    type="text"
                    class="form-control"
                    id="username"
                    name="username"
                    placeholder="Enter your username or email"
                    required
                    value="<?php echo isset($_POST['username']) ? htmlspecialchars($_POST['username']) : ''; ?>"
                />
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input
                    type="password"
                    class="form-control"
                    id="password"
                    name="password"
                    placeholder="Enter your password"
                    required
                />
            </div>
            <div class="remember-forgot">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="remember" name="remember" />
                    <label class="form-check-label" for="remember">
                        Remember me
                    </label>
                </div>
                <a href="#" class="forgot-password">Forgot password?</a>
            </div>
            <button type="submit" class="btn btn-primary btn-login">
                Sign in
            </button>
        </form>
    </div>

    <!-- Bootstrap 5 JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 