<?php
require_once '../includes/header.php';
includeNavbar();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Magazines - E-Ramdoot Library</title>
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
            padding: 1rem;
        }

        .magazines-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-top: 1.5rem;
        }

        .magazine-card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s ease;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .magazine-card:hover {
            transform: translateY(-5px);
        }

        .magazine-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
            background-color: #e0e0e0;
        }

        .magazine-info {
            padding: 1.25rem;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .magazine-title {
            color: #2c3e50;
            font-size: 1.1rem;
            margin-bottom: 0.5rem;
        }

        .magazine-description {
            color: #7f8c8d;
            font-size: 0.9rem;
            margin-bottom: 1rem;
            flex-grow: 1;
        }

        .read-btn {
            display: inline-block;
            padding: 0.5rem 1rem;
            background-color: #3498db;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            text-align: center;
        }

        .read-btn:hover {
            background-color: #2980b9;
        }

        @media (max-width: 768px) {
            .container {
                padding: 0.5rem;
            }
            
            .magazines-grid {
                grid-template-columns: 1fr;
                gap: 1rem;
            }

            .magazine-image {
                height: 180px;
            }

            .magazine-info {
                padding: 1rem;
            }
        }

        @media (max-width: 480px) {
            .magazine-image {
                height: 160px;
            }

            .magazine-title {
                font-size: 1rem;
            }

            .magazine-description {
                font-size: 0.85rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 style="text-align: center;">Magazines</h1>
        <div class="magazines-grid">
            <div class="magazine-card">
                <img src="https://media.timeout.com/images/105240246/image.jpg" alt="National Geographic Magazine" class="magazine-image">
                <div class="magazine-info">
                    <h3 class="magazine-title">National Geographic</h3>
                    <p class="magazine-description">Exploring the wonders of our world</p>
                    <a href="https://www.nationalgeographic.com/magazine" target="_blank" class="read-btn">Read Now</a>
                </div>
            </div>
            <div class="magazine-card">
                <img src="https://media.timeout.com/images/105240244/image.jpg" alt="Time Magazine" class="magazine-image">
                <div class="magazine-info">
                    <h3 class="magazine-title">Time</h3>
                    <p class="magazine-description">Current affairs and global news</p>
                    <a href="https://time.com/magazine/" target="_blank" class="read-btn">Read Now</a>
                </div>
            </div>
            <div class="magazine-card">
                <img src="https://media.timeout.com/images/105240245/image.jpg" alt="The Economist Magazine" class="magazine-image">
                <div class="magazine-info">
                    <h3 class="magazine-title">The Economist</h3>
                    <p class="magazine-description">Business and economic insights</p>
                    <a href="https://www.economist.com/the-economist" target="_blank" class="read-btn">Read Now</a>
                </div>
            </div>
            <div class="magazine-card">
                <img src="https://images.unsplash.com/photo-1532094349884-543bc11b234d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" alt="Science Magazine" class="magazine-image">
                <div class="magazine-info">
                    <h3 class="magazine-title">Science Today</h3>
                    <p class="magazine-description">Exploring the frontiers of scientific discovery</p>
                    <a href="https://www.science.org/journal/science" target="_blank" class="read-btn">Read Now</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html> 