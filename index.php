<?php 
require_once 'includes/header.php';
require_once 'includes/footer.php';
includeNavbar();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Ramdoot Library</title>
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        body {
            padding-top: 80px;
            background-color: #f5f6fa;
            font-family: 'Poppins', sans-serif;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }

        .welcome-section {
            text-align: center;
            padding: 2rem;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .welcome-title {
            color: #2c3e50;
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }

        .welcome-text {
            color: #34495e;
            font-size: 1.1rem;
            line-height: 1.6;
        }

        .gallery-section {
            margin-top: 3rem;
            padding: 2rem;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .gallery-title {
            color: #2c3e50;
            font-size: 2rem;
            text-align: center;
            margin-bottom: 2rem;
        }

        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            padding: 1rem;
        }

        .gallery-item {
            position: relative;
            overflow: hidden;
            border-radius: 8px;
            aspect-ratio: 16/9;
            cursor: pointer;
        }

        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .gallery-item:hover img {
            transform: scale(1.05);
        }

        .gallery-item::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.2);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .gallery-item:hover::after {
            opacity: 1;
        }

        @media (max-width: 768px) {
            .gallery-grid {
                grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            }
        }

        .contact-section {
            margin-top: 3rem;
            padding: 3rem;
            background: white;
            border-radius: 16px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
            position: relative;
            overflow: hidden;
        }

        .contact-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, #3498db, #2ecc71, #3498db);
            background-size: 200% 100%;
            animation: gradient 3s linear infinite;
        }

        @keyframes gradient {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .contact-title {
            color: #2c3e50;
            font-size: 2.5rem;
            text-align: center;
            margin-bottom: 3rem;
            position: relative;
            display: inline-block;
            left: 50%;
            transform: translateX(-50%);
        }

        .contact-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 100%;
            height: 3px;
            background: linear-gradient(90deg, transparent, #3498db, transparent);
        }

        .contact-form {
            max-width: 600px;
            margin: 0 auto;
            position: relative;
        }

        .form-group {
            margin-bottom: 2rem;
            position: relative;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.75rem;
            color: #2c3e50;
            font-weight: 500;
            font-size: 1.1rem;
            transition: all 0.3s ease;
        }

        .form-control {
            width: 100%;
            padding: 1rem;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-family: 'Poppins', sans-serif;
            font-size: 1rem;
            transition: all 0.3s ease;
            background-color: #f8f9fa;
        }

        .form-control:focus {
            outline: none;
            border-color: #3498db;
            background-color: white;
            box-shadow: 0 0 0 4px rgba(52, 152, 219, 0.1);
        }

        .form-control:focus + .floating-label {
            transform: translateY(-120%) scale(0.8);
            color: #3498db;
        }

        textarea.form-control {
            min-height: 150px;
            resize: vertical;
            line-height: 1.5;
        }

        .submit-btn {
            background: linear-gradient(135deg, #3498db, #2ecc71);
            color: white;
            padding: 1rem 2.5rem;
            border: none;
            border-radius: 8px;
            font-family: 'Poppins', sans-serif;
            font-size: 1.1rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            display: block;
            margin: 2rem auto 0;
            position: relative;
            overflow: hidden;
        }

        .submit-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: 0.5s;
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(52, 152, 219, 0.3);
        }

        .submit-btn:hover::before {
            left: 100%;
        }

        .submit-btn:active {
            transform: translateY(0);
        }

        .form-group small {
            color: #e74c3c;
            display: none;
            margin-top: 0.5rem;
            font-size: 0.9rem;
            animation: shake 0.5s ease-in-out;
        }

        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-5px); }
            75% { transform: translateX(5px); }
        }

        .form-group.error small {
            display: block;
        }

        .form-group.error .form-control {
            border-color: #e74c3c;
            animation: shake 0.5s ease-in-out;
        }

        .success-message {
            display: none;
            text-align: center;
            color: #27ae60;
            margin-top: 2rem;
            padding: 1.5rem;
            background-color: rgba(39, 174, 96, 0.1);
            border-radius: 8px;
            animation: fadeIn 0.5s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .contact-info {
            margin-top: 3rem;
            text-align: center;
            color: #7f8c8d;
        }

        .contact-info p {
            margin: 0.5rem 0;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .contact-info i {
            color: #3498db;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="welcome-section">
            <h1 class="welcome-title">Welcome to E-Ramdoot Library</h1>
            <p class="welcome-text">
                Your one-stop destination for digital learning resources. Explore our vast collection of courses, 
                previous exam papers, magazines, and newspapers. Start your journey to knowledge today!
            </p>
        </div>

        <div class="gallery-section">
            <h2 class="gallery-title">Explore Our Library</h2>
            <div class="gallery-grid">
                <div class="gallery-item">
                    <img src="https://images.unsplash.com/photo-1524995997946-a1c2e315a42f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" alt="Library Interior">
                </div>
                <div class="gallery-item">
                    <img src="https://images.unsplash.com/photo-1524578271613-d550eacf6090?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" alt="Reading Area">
                </div>
                <div class="gallery-item">
                    <img src="https://images.unsplash.com/photo-1507842217343-583bb7270b66?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1453&q=80" alt="Books Collection">
                </div>
                <div class="gallery-item">
                    <img src="https://images.unsplash.com/photo-1521587760476-6c12a4b040da?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" alt="Study Space">
                </div>
            </div>
        </div>

        <div class="contact-section">
            <h2 class="contact-title">Get in Touch</h2>
            <form class="contact-form" id="contactForm">
                <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                    <small>Please enter your full name</small>
                </div>
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                    <small>Please enter a valid email address</small>
                </div>
                <div class="form-group">
                    <label for="subject">Subject</label>
                    <input type="text" class="form-control" id="subject" name="subject" required>
                    <small>Please enter a subject</small>
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea class="form-control" id="message" name="message" required></textarea>
                    <small>Please enter your message</small>
                </div>
                <button type="submit" class="submit-btn">
                    <i class="fas fa-paper-plane"></i> Send Message
                </button>
                <div class="success-message">
                    <i class="fas fa-check-circle"></i> Thank you for your message! We'll get back to you soon.
                </div>
            </form>
            <div class="contact-info">
                <p><i class="fas fa-envelope"></i> contact@eramdootlibrary.com</p>
                <p><i class="fas fa-phone"></i> +1 (555) 123-4567</p>
                <p><i class="fas fa-map-marker-alt"></i> 123 Library Street, Knowledge City</p>
            </div>
        </div>
    </div>

    <?php includeFooter(); ?>

    <script>
        document.getElementById('contactForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Reset all error states
            const formGroups = document.querySelectorAll('.form-group');
            formGroups.forEach(group => group.classList.remove('error'));
            
            let isValid = true;
            
            // Validate name
            const name = document.getElementById('name').value.trim();
            if (name === '') {
                document.querySelector('#name').parentElement.classList.add('error');
                isValid = false;
            }
            
            // Validate email
            const email = document.getElementById('email').value.trim();
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                document.querySelector('#email').parentElement.classList.add('error');
                isValid = false;
            }
            
            // Validate subject
            const subject = document.getElementById('subject').value.trim();
            if (subject === '') {
                document.querySelector('#subject').parentElement.classList.add('error');
                isValid = false;
            }
            
            // Validate message
            const message = document.getElementById('message').value.trim();
            if (message === '') {
                document.querySelector('#message').parentElement.classList.add('error');
                isValid = false;
            }
            
            if (isValid) {
                // Show success message
                document.querySelector('.success-message').style.display = 'block';
                // Reset form
                this.reset();
                // Hide success message after 5 seconds
                setTimeout(() => {
                    document.querySelector('.success-message').style.display = 'none';
                }, 5000);
            }
        });
    </script>
</body>
</html> 