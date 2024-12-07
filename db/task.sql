-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2024 at 11:36 AM
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
-- Database: `task`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(255) NOT NULL,
  `title` text NOT NULL,
  `short_description` text NOT NULL,
  `image` text NOT NULL,
  `publish_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `title`, `short_description`, `image`, `publish_date`, `update_at`) VALUES
(7, 'natural2', 'natural b2 fdsafkljaslkffjlksqajdflkajfjkfdsajjf', '2.jpg', '2024-12-07 05:48:14', '2024-12-07 05:48:14'),
(8, 'natural3', 'A paragraph is a group of sentences that develops a single idea. Paragraphs are a fundamental part of any piece of writing that is longer than a few sentences. They help the reader understand the structure of the writing and grasp its', '3.jpg', '2024-12-07 05:48:55', '2024-12-07 05:48:55'),
(9, 'natural  4', 'A paragraph is a group of sentences that develops a single idea. Paragraphs are a fundamental part of any piece of writing that is longer than a few sentences. They help the reader understand the structure of the writing and grasp its', '4.jpg', '2024-12-07 05:49:10', '2024-12-07 05:49:10'),
(10, 'natural 5', 'A paragraph is a group of sentences that develops a single idea. Paragraphs are a fundamental part of any piece of writing that is longer than a few sentences. They help the reader understand the structure of the writing and grasp its', '5.jpg', '2024-12-07 05:49:25', '2024-12-07 05:49:25'),
(11, 'Natural 6', 'A paragraph is a group of sentences that develops a single idea. Paragraphs are a fundamental part of any piece of writing that is longer than a few sentences. They help the reader understand the structure of the writing and grasp its', '6.jpg', '2024-12-07 05:49:40', '2024-12-07 05:49:40'),
(12, 'Natural 7', 'A paragraph is a group of sentences that develops a single idea. Paragraphs are a fundamental part of any piece of writing that is longer than a few sentences. They help the reader understand the structure of the writing and grasp its', '7.jpg', '2024-12-07 05:49:53', '2024-12-07 05:49:53'),
(13, 'Natural 8', 'A paragraph is a group of sentences that develops a single idea. Paragraphs are a fundamental part of any piece of writing that is longer than a few sentences. They help the reader understand the structure of the writing and grasp its', '8.jpg', '2024-12-07 05:50:07', '2024-12-07 05:50:07'),
(14, 'Natural 9', 'A paragraph is a group of sentences that develops a single idea. Paragraphs are a fundamental part of any piece of writing that is longer than a few sentences. They help the reader understand the structure of the writing and grasp its', '9.jpg', '2024-12-07 05:50:23', '2024-12-07 05:50:23'),
(15, 'Natural 10', 'A paragraph is a group of sentences that develops a single idea. Paragraphs are a fundamental part of any piece of writing that is longer than a few sentences. They help the reader understand the structure of the writing and grasp its', '10.jpg', '2024-12-07 05:50:40', '2024-12-07 05:50:40'),
(17, 'natural 12', 'A paragraph is a group of sentences that develops a single idea. Paragraphs are a fundamental part of any piece of writing that is longer than a few sentences. They help the reader understand the structure of the writing and grasp its', '12.jpg', '2024-12-07 05:51:17', '2024-12-07 05:51:17'),
(18, 'natural 13', 'A paragraph is a group of sentences that develops a single idea. Paragraphs are a fundamental part of any piece of writing that is longer than a few sentences. They help the reader understand the structure of the writing and grasp its', '13.jpg', '2024-12-07 05:51:34', '2024-12-07 05:51:34'),
(19, 'natural 14', 'A paragraph is a group of sentences that develops a single idea. Paragraphs are a fundamental part of any piece of writing that is longer than a few sentences. They help the reader understand the structure of the writing and grasp its', '14.jpg', '2024-12-07 05:51:51', '2024-12-07 05:51:51'),
(20, 'natural 15', 'A paragraph is a group of sentences that develops a single idea. Paragraphs are a fundamental part of any piece of writing that is longer than a few sentences. They help the reader understand the structure of the writing and grasp its', '15.jpg', '2024-12-07 05:52:09', '2024-12-07 05:52:09'),
(21, 'natural 16', 'A paragraph is a group of sentences that develops a single idea. Paragraphs are a fundamental part of any piece of writing that is longer than a few sentences. They help the reader understand the structure of the writing and grasp its', '16.jpg', '2024-12-07 05:52:28', '2024-12-07 05:52:28'),
(22, 'natural 17', 'A paragraph is a group of sentences that develops a single idea. Paragraphs are a fundamental part of any piece of writing that is longer than a few sentences. They help the reader understand the structure of the writing and grasp its', '17.jpg', '2024-12-07 05:52:54', '2024-12-07 05:52:54'),
(23, '', '', '', '2024-12-07 08:56:31', '2024-12-07 08:56:31');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(255) NOT NULL,
  `comment` text NOT NULL,
  `blogid` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `commet_by` int(11) NOT NULL,
  `comment_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `comment`, `blogid`, `status`, `commet_by`, `comment_on`) VALUES
(1, 'hi  This is good blog', 7, 1, 2, '2024-12-07 09:05:16'),
(3, 'best article on nature', 7, 1, 2, '2024-12-07 09:57:06'),
(4, 'good ...', 7, 0, 2, '2024-12-07 09:57:28'),
(5, 'nice', 9, 1, 2, '2024-12-07 09:57:38');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `role` enum('user','admin') NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `username`, `password`, `name`) VALUES
(1, 'admin', 'admin', 'e2fc714c4727ee9395f324cd2e7f331f', 'ali Doe'),
(2, 'user', 'user1', 'e2fc714c4727ee9395f324cd2e7f331f', 'muema Doe');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
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
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
