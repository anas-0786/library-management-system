-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Apr 27, 2025 at 09:38 AM
-- Server version: 8.0.42
-- PHP Version: 8.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `course_id` int DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `course_id`, `url`, `created_at`, `updated_at`) VALUES
(1, 'C Programming', 1, 'https://www.cimat.mx/ciencia_para_jovenes/bachillerato/libros/%5BKernighan-Ritchie%5DThe_C_Programming_Language.pdf', '2025-04-27 08:16:01', '2025-04-27 08:39:22'),
(12, 'Think Python: How to Think Like a Computer Scientist', 1, 'https://greenteapress.com/thinkpython2/thinkpython2.pdf', '2025-04-27 09:13:10', '2025-04-27 09:13:10'),
(13, 'Structure and Interpretation of Computer Programs', 1, 'https://mitpress.mit.edu/sites/default/files/sicp/full-text/book/book.html', '2025-04-27 09:13:10', '2025-04-27 09:13:10'),
(14, 'Introduction to Algorithms', 1, 'https://edutechlearners.com/download/Introduction_to_algorithms-3rd%20Edition.pdf', '2025-04-27 09:13:10', '2025-04-27 09:13:10'),
(15, 'Database Design - 2nd Edition', 1, 'https://opentextbc.ca/dbdesign01/', '2025-04-27 09:13:10', '2025-04-27 09:13:10'),
(16, 'Computer Networks: A Systems Approach', 1, 'https://book.systemsapproach.org/', '2025-04-27 09:13:10', '2025-04-27 09:13:10'),
(17, 'Operating Systems: Three Easy Pieces', 1, 'https://techiefood4u.wordpress.com/wp-content/uploads/2020/02/operating_systems_three_easy_pieces.pdf', '2025-04-27 09:13:10', '2025-04-27 09:18:00'),
(18, 'Computer Organization and Design', 1, 'http://ia601209.us.archive.org/24/items/ComputerOrganizationAndDesign3rdEdition/-computer%20organization%20and%20design%203rd%20edition.pdf', '2025-04-27 09:13:10', '2025-04-27 09:15:53'),
(19, 'Programming Languages: Application and Interpretation', 1, 'https://www.plai.org/', '2025-04-27 09:13:10', '2025-04-27 09:13:10'),
(20, 'Computer Science Distilled', 1, 'https://code.energy/wp-content/uploads/computer-science-distilled-sample.pdf', '2025-04-27 09:13:10', '2025-04-27 09:17:08'),
(21, 'The Art of Computer Programming', 1, 'https://www-cs-faculty.stanford.edu/~knuth/taocp.html', '2025-04-27 09:13:10', '2025-04-27 09:13:10');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'BCA', '2025-04-27 07:50:41', '2025-04-27 07:50:41'),
(2, 'BBA', '2025-04-27 07:51:14', '2025-04-27 07:51:14'),
(3, 'MBA', '2025-04-27 07:51:33', '2025-04-27 07:51:33');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@library.com', '$2y$10$oz6CtEW3cset0HZzWSJju.KGq6xUcRY3cynfW0.npgxHoH9VdNRTe', NULL, '2025-04-27 07:35:53', '2025-04-27 07:39:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
