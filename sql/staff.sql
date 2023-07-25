-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 25, 2023 at 09:08 AM
-- Server version: 8.0.17
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `salary` double(8,2) DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `created_at`, `updated_at`, `title`, `birthdate`, `salary`, `photo`, `phone`) VALUES
(1, NULL, NULL, 'Qui tempore pariatur.', '2000-01-01', 2000.00, 'https://raw.githubusercontent.com/arc6828/laravel8/main/public/img/book-1.png', '099-999-9999'),
(2, NULL, NULL, 'Corporis voluptatem dicta.', '2000-01-01', 2000.00, 'https://raw.githubusercontent.com/arc6828/laravel8/main/public/img/book-2.png', '099-999-9999'),
(3, NULL, NULL, 'Tempora qui maxime odit.', '2000-01-01', 2000.00, 'https://raw.githubusercontent.com/arc6828/laravel8/main/public/img/book-3.png', '099-999-9999'),
(4, NULL, NULL, 'Corrupti deleniti minus natus.', '2000-01-01', 2000.00, 'https://raw.githubusercontent.com/arc6828/laravel8/main/public/img/book-4.png', '099-999-9999'),
(5, NULL, NULL, 'Omnis quos tempore.', '2000-01-01', 2000.00, 'https://raw.githubusercontent.com/arc6828/laravel8/main/public/img/book-5.png', '099-999-9999'),
(6, NULL, NULL, 'Eaque ullam totam.', '2000-01-01', 2000.00, 'https://raw.githubusercontent.com/arc6828/laravel8/main/public/img/book-6.png', '099-999-9999'),
(7, NULL, NULL, 'Voluptas deserunt.', '2000-01-01', 2000.00, 'https://raw.githubusercontent.com/arc6828/laravel8/main/public/img/book-7.png', '099-999-9999'),
(8, NULL, NULL, 'Expedita sed quasi.', '2000-01-01', 2000.00, 'https://raw.githubusercontent.com/arc6828/laravel8/main/public/img/book-8.png', '099-999-9999'),
(9, NULL, NULL, 'Hic est qui.', '2000-01-01', 2000.00, 'https://raw.githubusercontent.com/arc6828/laravel8/main/public/img/book-9.png', '099-999-9999'),
(10, NULL, NULL, 'Quidem maiores rerum quis.', '2000-01-01', 2000.00, 'https://raw.githubusercontent.com/arc6828/laravel8/main/public/img/book-10.png', '099-999-9999'),
(11, NULL, NULL, 'Perspiciatis velit est.', '2000-01-01', 2000.00, 'https://raw.githubusercontent.com/arc6828/laravel8/main/public/img/book-11.png', '099-999-9999'),
(12, NULL, NULL, 'Ut eaque ut.', '2000-01-01', 2000.00, 'https://raw.githubusercontent.com/arc6828/laravel8/main/public/img/book-12.png', '099-999-9999'),
(13, NULL, NULL, 'Et ut odit.', '2000-01-01', 2000.00, 'https://raw.githubusercontent.com/arc6828/laravel8/main/public/img/book-13.png', '099-999-9999');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
