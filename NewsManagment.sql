-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 23, 2025 at 12:21 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `NewsManagment`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `categoryName` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `categoryName`, `description`) VALUES
(3, 'Art news', 'To display news of art and celebrities'),
(2, 'Fashion News', 'Follow the latest fashion trends in the world of fashion and follow fashion trends'),
(4, 'Social News', 'all news about world collected by social media and the newest of these apps\r\n'),
(1, 'Sport News', 'Everything new in the world of sports and what concerns players'),
(5, 'Weather News', 'all news about the weather and the prediction of experts from it\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `categoryName` varchar(100) NOT NULL,
  `details` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `is_deleted` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `categoryName`, `details`, `image`, `user_id`, `is_deleted`) VALUES
(22, 'Huge competition for the fall collection', 'Fashion News', 'The first collection of the fall season of Elly-Saab arrive to the market but other Fashioners still keep of there in secret	', 'uploads/1758607616_images.jpeg', 4, 0),
(23, 'Ramadan season 2026', 'Art news', 'Preparations have begun for filming the Ramadan 2026 series, with the participation of a large number of major art stars.	', 'uploads/1758607677_images-2.jpeg', 4, 1),
(24, 'Instagram Updates	', 'Social News', 'Meta company make anew version from instagram where the follower of the user can see posts and reels which he watched it	', 'uploads/1758607899_image3.jpg', 4, 1),
(25, 'Champions League starts	', 'Sport News', 'The first collection of the fall season of Elly-Saab arrive to the market but other Fashioners still keep of there in secret	', 'uploads/1758607933_1758402375_images-2.jpeg', 4, 0),
(26, 'Wednesday weather	', 'Weather News', 'Wednesday will witness a significant rise in temperatures despite the start of autumn and the high humidity.	', 'uploads/1758611551_636543689783396308-weather-news.jpg.webp', 4, 0),
(27, 'Mission Impossible Broadcasting', 'Art news', 'The company responsible for filming the movie announced the date of the movie\'s first showing and invited a large number of international celebrities.', 'uploads/1758612934_MissionImpossiblePoster.jpg', 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(2, 'Ali Hassan', 'ali@gmail.com', '$2y$10$muMnyKM8SxjVurJlAnIlQO0eV1ocXDU8FeZhCMDqhY3c9AhAsyOei'),
(3, 'Nour Sami', 'nou@gmail.com', '$2y$10$0k9OTEPuxJJD4WPPcYnbLOs1lWnBVT1o0hYq.2uWNFuZU3extAqS2'),
(4, 'Ahlam Abu Diab', 'ahlamdyab@gmail.com', '$2y$10$jCeF.ZFKI7ZpqkExqQzDmeUmlA0GAk8Qmmd.5159CWEWMHo2gno.y'),
(5, 'Sara Rajab', 'sara@gmail.com', '$2y$10$fZ5DwPY0fafDd/WcnWdWnerMwy/pK/t.T0UoOubpYptQFwp0.6HlK');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categoryName`),
  ADD UNIQUE KEY `id` (`id`) USING BTREE;

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_category` (`categoryName`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `fk_category` FOREIGN KEY (`categoryName`) REFERENCES `categories` (`categoryName`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
