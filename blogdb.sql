-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2024 at 02:18 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blogdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `created_at`) VALUES
(3, 'ttitle up', 'Content up', '2024-05-15 23:59:59');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `regDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `name` varchar(50) NOT NULL,
  `userName` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL,
  `role` enum('user','admin') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `regDate`, `name`, `userName`, `email`, `password`, `role`) VALUES
(1, '2024-05-15 23:20:59', 'sos', 'soha', 'soha@gmail.com', '$2y$10$/avv5Zw/blhRlo4uTbcYnOt15W0eSfrBnEmGO0rh3yoLU4Zli4AL6', 'admin'),
(2, '2024-05-15 22:38:50', 'Menna', 'mm', 'mennaemad6kk196@gmail.com', '123456789', 'admin'),
(3, '2024-05-15 22:53:38', 'Remy Ahmad', 'mennat1996', 'ahmad@gmail.com', '$2y$10$IthltN4wuMbq4XQ8nCgx3ea68/KCBRCA08CT.EvkCXMrkci75Mtlm', 'admin'),
(4, '2024-05-15 22:54:05', 'try', 'm', 'ahmad@gmail.com', '$2y$10$9JAiYJ.YJKLoKBTMbRtVhuSBjynfZChzXQ2ndUdF5R9xNl/99Kzrq', 'user'),
(5, '2024-05-15 22:55:30', 'Omar Emad', 'username', 'jacinto.cummings@example.com', '$2y$10$58cVRCV7QpjKsYDSmNmm8.HyIxn6XwDdDZ5RfFxxsWjgqOYgy/vE.', ''),
(6, '2024-05-15 23:00:54', 'try', 'kkjj', 'kk@gmail.com', '$2y$10$zrmxLV9g/m41LmFfzD/9k.FjNmQb7ZTrTjyhNVn0VsRwkREfBrs62', ''),
(7, '2024-05-15 23:03:52', 'full', 'u', 'u@gmail.com', '$2y$10$B4SnqWEYi8pam7dRhWKOku5.1zf1aWNK5iAhjMaVHqK32.jrSBtA6', ''),
(8, '2024-05-15 23:09:35', 'Omar Emad', 'username', 'mennaemad6196@gmail.com', '$2y$10$hF13aFON7bAktd4Aasg.zuaqNNRv9CsgSsWrfpFKHSnPVu6yK/WDW', 'admin'),
(9, '2024-05-15 23:49:04', 'Remy Ahmad', 'remyahmad2021', 'remy@gmail.com', '$2y$10$AP3suYOwtiBVQYj0rEMVfOPzJeHBh/4NWrdiaNWxEZteXMmo3DQIW', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
