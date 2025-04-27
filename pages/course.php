<?php
// Include the header which contains session management and database connection
require_once '../includes/header.php';

// Get the course ID from the URL
$course_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Fetch course details
$course_query = "SELECT * FROM courses WHERE id = $course_id";
$course_result = mysqli_query($conn, $course_query);
$course = mysqli_fetch_assoc($course_result);

// Fetch books for this course
$books_query = "SELECT * FROM books WHERE course_id = $course_id ORDER BY title ASC";
$books_result = mysqli_query($conn, $books_query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($course['name'] ?? 'Course Books'); ?> - Library Management System</title>
    <link rel="stylesheet" href="<?php echo $base_path; ?>assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding-top: 80px;
            background-color: #f5f6fa;
            font-family: 'Poppins', sans-serif;
        }
        
        .content {
            padding: 2rem 0;
        }
        
        .page-title {
            color: #2c3e50;
            margin-bottom: 2rem;
            text-align: center;
        }
        
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }
        
        .card:hover {
            transform: translateY(-5px);
        }
        
        .resource-icon {
            color: #3498db;
        }
        
        .card-title {
            color: #2c3e50;
            font-size: 1.1rem;
            margin-bottom: 1rem;
        }
        
        .btn-primary {
            background-color: #3498db;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 5px;
        }
        
        .btn-primary:hover {
            background-color: #2980b9;
        }
        
        .alert {
            border-radius: 10px;
            border: none;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        
        @media (max-width: 768px) {
            .content {
                padding: 1.5rem 0;
            }
            
            .page-title {
                font-size: 1.5rem;
                margin-bottom: 1.5rem;
            }
            
            .card-title {
                font-size: 1rem;
            }
        }
        
        @media (max-width: 480px) {
            .content {
                padding: 1rem 0;
            }
            
            .page-title {
                font-size: 1.3rem;
                margin-bottom: 1rem;
            }
            
            .card {
                margin-bottom: 1rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <?php includeNavbar(); ?>

        <div class="content">
            <h1 class="page-title">
                <?php echo htmlspecialchars($course['name'] ?? 'Course Books'); ?>
            </h1>

            <?php if (mysqli_num_rows($books_result) > 0): ?>
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 mt-5">
                    <?php while ($book = mysqli_fetch_assoc($books_result)): ?>
                        <div class="col">
                            <div class="card h-100">
                                <div class="card-body text-center">
                                    <div class="resource-icon mb-3">
                                        <i class="fas fa-book-open fa-3x text-primary"></i>
                                    </div>
                                    <h5 class="card-title"><?php echo htmlspecialchars($book['title']); ?></h5>
                                    <?php if (!empty($book['url'])): ?>
                                        <a href="<?php echo htmlspecialchars($book['url']); ?>" 
                                           target="_blank" 
                                           class="btn btn-primary mt-3">
                                            <i class="fas fa-external-link-alt"></i> Access Resource
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php else: ?>
                <div class="alert alert-info mt-5">
                    <i class="fas fa-info-circle"></i>
                    No books or resources available for this course yet.
                </div>
            <?php endif; ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 