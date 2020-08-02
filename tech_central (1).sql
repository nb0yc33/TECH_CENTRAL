-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2020 at 05:39 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tech_central`
--

-- --------------------------------------------------------

--
-- Table structure for table `profilepics`
--

CREATE TABLE `profilepics` (
  `pic_id` int(15) NOT NULL,
  `pic_filename` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profilepics`
--

INSERT INTO `profilepics` (`pic_id`, `pic_filename`, `username`) VALUES
(1, 'apple_macbook_13_inch_w_touch_bar_2.png', 'nb0yc33');

-- --------------------------------------------------------

--
-- Table structure for table `thumbnails`
--

CREATE TABLE `thumbnails` (
  `thumbnail_id` int(50) NOT NULL,
  `thumbnails_filename` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `video_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `thumbnails`
--

INSERT INTO `thumbnails` (`thumbnail_id`, `thumbnails_filename`, `username`, `video_title`) VALUES
(4, 'wsb_13_macbookpro_thumbnail.jpg', 'nb0yc33', ''),
(5, 'wsb_13_macbookpro_thumbnail1.jpg', 'nb0yc33', ''),
(6, '08d4fe82a8ff0677d931c7e9c78fddfd.png', 'nb0yc33', 'boi'),
(7, '08d4fe82a8ff0677d931c7e9c78fddfd1.png', 'nb0yc33', 'boi'),
(8, '08d4fe82a8ff0677d931c7e9c78fddfd2.png', 'nb0yc33', 'boi'),
(9, '2093136-1173456361.png', 'nb0yc33', 'Apple'),
(10, '2093136-11734563611.png', 'nb0yc33', 'Apple'),
(11, '2093136-11734563612.png', 'nb0yc33', 'Apple');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(15) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `q1` varchar(50) NOT NULL,
  `q2` varchar(50) NOT NULL,
  `q3` varchar(50) NOT NULL,
  `hash_code` varchar(50) NOT NULL,
  `verified` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `q1`, `q2`, `q3`, `hash_code`, `verified`) VALUES
(1, 'nb0yc33', 'nb0yc33@gmail.com', 'BOOgie1!', 'Smith', 'Indooroopilly State School', 'Toyota Echo', '142949df56ea8ae0be8b5306971900a4', 'VERIFIED');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `video_id` int(50) NOT NULL,
  `video_filename` varchar(100) NOT NULL,
  `video_title` varchar(100) NOT NULL,
  `video_tag` varchar(50) NOT NULL,
  `video_desc` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `thumb_filename` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`video_id`, `video_filename`, `video_title`, `video_tag`, `video_desc`, `username`, `thumb_filename`) VALUES
(6, 'iPhone_SE_-_WSB.mp4', 'iPhone SE review', '', '', 'nb0yc33', ''),
(7, 'Switch_Lite_-_WSB.mp4', 'Switch Lite Review', '', '', 'nb0yc33', ''),
(13, 'Google_Pixel_4_Review__Inside_the_Hype_Machine!.mp4', 'Pixel 4 review ', 'google', 'Check out this review of the Pixel 4!', 'nb0yc33', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `profilepics`
--
ALTER TABLE `profilepics`
  ADD PRIMARY KEY (`pic_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `thumbnails`
--
ALTER TABLE `thumbnails`
  ADD PRIMARY KEY (`thumbnail_id`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`video_id`),
  ADD KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `profilepics`
--
ALTER TABLE `profilepics`
  MODIFY `pic_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `thumbnails`
--
ALTER TABLE `thumbnails`
  MODIFY `thumbnail_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `video_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `profilepics`
--
ALTER TABLE `profilepics`
  ADD CONSTRAINT `username_constraint3` FOREIGN KEY (`username`) REFERENCES `users` (`username`);

--
-- Constraints for table `thumbnails`
--
ALTER TABLE `thumbnails`
  ADD CONSTRAINT `username_constraint2` FOREIGN KEY (`username`) REFERENCES `users` (`username`);

--
-- Constraints for table `videos`
--
ALTER TABLE `videos`
  ADD CONSTRAINT `username_constraint1` FOREIGN KEY (`username`) REFERENCES `users` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
