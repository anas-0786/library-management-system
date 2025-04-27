<?php
require_once 'session.php';

$current_page = basename($_SERVER['PHP_SELF']);
$is_in_pages = strpos($_SERVER['PHP_SELF'], '/pages/') !== false;
$base_path = $is_in_pages ? '../' : '';

$query = "SELECT * FROM courses ORDER BY `name` ASC";
$result = mysqli_query($conn, $query);
$courses = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <!-- Navbar CSS -->
    <link rel="stylesheet" href="<?php echo $base_path; ?>includes/css/navbar.css">
</head>
<body>
<nav class="navbar">
    <div class="nav-container">
        <a href="<?php echo $base_path; ?>index.php" class="logo-container">
            <div class="logo-icon">
                <i class="fas fa-book-reader"></i>
            </div>
            <div class="header-text">
                <div class="system-name">E-Ramdoot Library</div>
                <div class="tagline">Your Gateway to Digital Knowledge</div>
            </div>
        </a>
        <div class="hamburger">
            <div></div>
            <div></div>
            <div></div>
        </div>
        <ul class="nav-links">
            <li class="nav-item">
                <a href="<?php echo $base_path; ?>index.php" class="nav-link <?php echo $current_page == 'index.php' ? 'active' : ''; ?>">Home</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">Courses</a>
                <div class="dropdown-content">
                    <?php if ($courses): ?>
                        <?php foreach ($courses as $course): ?>
                            <a href="<?php echo $base_path; ?>pages/course.php?id=<?php echo $course['id']; ?>">
                                <?php echo htmlspecialchars($course['name']); ?>
                            </a>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <a href="#">No courses available</a>
                    <?php endif; ?>
                </div>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">Previous Exams</a>
                <div class="dropdown-content">
                    <a target="_blank" href="https://drive.google.com/file/d/1CmoDPGH_AcnObL971Xi1K3TcaaR5XOMj/view">2024 Sem. 5</a>
                </div>
            </li>
            <li class="nav-item">
                <a href="<?php echo $base_path; ?>pages/magazines.php" class="nav-link <?php echo $current_page == 'magazines.php' ? 'active' : ''; ?>">Magazines</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">Newspaper</a>
                <div class="dropdown-content">
                    <a target="_blank" href="https://www.thetimes.com/">The Times</a>
                    <a target="_blank" href="https://www.theguardian.com/international">The Guardian</a>
                    <a target="_blank" href="https://www.bbc.com/news">BBC News</a>
                    <a target="_blank" href="https://www.cnn.com/">CNN</a>
                </div>
            </li>
            <li class="nav-item">
                <a href="<?php echo $base_path; ?>pages/logout.php" class="nav-link logout-btn">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </li>
        </ul>
    </div>
</nav>
<!-- Navbar JavaScript -->
<script src="<?php echo $base_path; ?>includes/js/navbar.js"></script>
</body>
</html> 