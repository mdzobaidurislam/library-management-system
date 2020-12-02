-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 02, 2020 at 04:56 AM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
CREATE TABLE IF NOT EXISTS `books` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `book_name` varchar(225) DEFAULT NULL,
  `book_image` varchar(225) DEFAULT NULL,
  `book_author_name` varchar(225) DEFAULT NULL,
  `book_publication_name` varchar(225) DEFAULT NULL,
  `book_purchase_date` varchar(225) DEFAULT NULL,
  `book_price` varchar(225) DEFAULT NULL,
  `book_qty` varchar(225) DEFAULT NULL,
  `available_qty` int(225) DEFAULT NULL,
  `libraian_username` varchar(225) DEFAULT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `book_name`, `book_image`, `book_author_name`, `book_publication_name`, `book_purchase_date`, `book_price`, `book_qty`, `available_qty`, `libraian_username`, `datetime`) VALUES
(15, 'Web Design Programming', '20200428072726.jpg', 'Jami', 'Freelancer Jami', '2020-04-29', '260', '190', 179, 'admin', '2020-04-28 19:27:26'),
(14, 'Web Design', '20200428072706.jpg', 'Jami', 'Freelancer Jami', '2020-04-29', '260', '190', 180, 'admin', '2020-04-28 19:27:06'),
(13, 'Php Programming', '20200428070211.jpg', 'Jami', 'Freelancer Jami', '2020-04-29', '400', '300', 249, 'admin', '2020-04-28 19:02:11'),
(12, 'বাংলা লিখুন মোবাইল এবং কম্পিউটারে', '20200428094458.jpg', 'Jami', 'Freelancer Jami', '2020-05-28', '91', '57', 58, 'admin', '2020-04-28 09:44:58'),
(11, 'বাংলা লিখুন মোবাইল এবং কম্পিউটারে', '20200427073118.jpg', 'Jami', 'Freelancer Jami', '2020-04-28', '55', '43', 43, 'admin', '2020-04-27 19:31:18'),
(10, 'Web Design Programming', '20200427072613.jpg', 'Jami', 'Freelancer Jami', '2020-04-28', '55', '33', 33, 'admin', '2020-04-27 19:26:13'),
(16, 'Python', '20201124054532.jpg', 'jami', 'Jami ', '2020-11-24', '43', '34', 33, 'admin', '2020-11-24 05:45:32');

-- --------------------------------------------------------

--
-- Table structure for table `issue_book`
--

DROP TABLE IF EXISTS `issue_book`;
CREATE TABLE IF NOT EXISTS `issue_book` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `student_id` varchar(255) NOT NULL,
  `book_id` varchar(255) NOT NULL,
  `book_issue_date` varchar(255) NOT NULL,
  `book_issue_return_date` varchar(255) NOT NULL DEFAULT '',
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `issue_book`
--

INSERT INTO `issue_book` (`id`, `student_id`, `book_id`, `book_issue_date`, `book_issue_return_date`, `datetime`) VALUES
(1, '1', '10', '28-04-2020', ' 20-28-20', '2020-04-28 09:39:24'),
(2, '2', '11', '28-04-2020', ' 20-28-20', '2020-04-28 09:41:34'),
(3, '1', '10', '28-04-2020', ' 20-28-20', '2020-04-28 09:42:51'),
(4, '2', '12', '28-04-2020', ' 20-28-20', '2020-04-28 09:45:12'),
(5, '1', '12', '28-04-2020', ' 20-28-20', '2020-04-28 09:52:28'),
(6, '1', '12', '28-04-2020', ' 20-28-20', '2020-04-28 12:07:45'),
(7, '1', '11', '28-04-2020', ' 20-28-20', '2020-04-28 12:10:40'),
(8, '1', '12', '28-04-2020', ' 20-28-20', '2020-04-28 13:33:32'),
(9, '2', '12', '28-04-2020', ' 20-28-20', '2020-04-28 14:32:13'),
(10, '1', '11', '28-04-2020', ' 20-28-20', '2020-04-28 14:34:28'),
(11, '1', '10', '28-04-2020', ' 20-28-20', '2020-04-28 16:56:18'),
(12, '1', '10', '28-04-2020', ' 20-28-20', '2020-04-28 16:57:02'),
(13, '1', '10', '28-04-2020', ' 20-28-20', '2020-04-28 17:00:50'),
(14, '1', '10', '28-04-2020', ' 20-28-20', '2020-04-28 17:00:59'),
(15, '1', '10', '28-04-2020', ' 20-28-20', '2020-04-28 17:01:07'),
(16, '1', '12', '28-04-2020', ' 20-24-20', '2020-04-28 17:08:22'),
(17, '1', '13', '28-04-2020', '', '2020-04-28 20:04:31'),
(18, '2', '15', '24-11-2020', '', '2020-11-24 05:45:50');

-- --------------------------------------------------------

--
-- Table structure for table `libraian`
--

DROP TABLE IF EXISTS `libraian`;
CREATE TABLE IF NOT EXISTS `libraian` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `libraian`
--

INSERT INTO `libraian` (`id`, `fname`, `lname`, `email`, `username`, `password`, `datetime`) VALUES
(1, 'Jami', 'Islam', 'admin@gmail.com', 'admin', '1234', '2020-04-26 11:28:24');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE IF NOT EXISTS `students` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `roll` varchar(11) NOT NULL,
  `reg` varchar(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `fname`, `lname`, `roll`, `reg`, `email`, `username`, `password`, `phone`, `photo`, `status`, `datetime`) VALUES
(1, 'nazim', 'Uddin', '123456', '123456', 'jami1234@gmail.com', 'jami1234', '$2y$10$/ssFuI03hSzxSAvPQueP6uRZStuDDU3y5SxQG2gSrnVF2hy5AgGEq', '12345678', NULL, 1, '2020-04-26 08:27:28'),
(2, 'Jami', 'Islam', '123456', '123456', 'jami@gmail.com', 'jami12345', '$2y$10$pTulb3VRhXrEPQGL9e3Nk.H4BEn8b4mEIzU4D12Wx/eCockpa3Ree', '12345678', NULL, 1, '2020-04-26 17:20:26'),
(4, 'Nazim', 'Uddin', '123456', '123456', 'jami123456@gmail.com', 'jami123456', '$2y$10$4QZwiXQA44CP.yD4m0srcOQNGvIduC7PuKdTOWkuPNdfCcQ6mbS5u', '12345678', NULL, 1, '2020-04-29 08:37:34'),
(5, 'Nazim', 'Uddin', '123456', '123456', 'jami123457@gmail.com', 'jami123457', '$2y$10$ewspYjtTxX0lRPD8sFAAK.sBCsmJKrGd/VpFYr5sf/QASn4VOQfcu', '12345678', NULL, 1, '2020-04-29 08:37:55'),
(6, 'Nazim', 'Uddin', '123456', '123456', 'jami123458@gmail.com', 'jami123458', '$2y$10$ZY1fVCYQwgM8hzwZK0OLWO.mSnKZ9Mg6bzofge0Ba9Jf4F44fDv0i', '12345678', NULL, 1, '2020-04-29 08:38:09'),
(7, 'Nazim', 'Uddin', '123456', '123456', 'jami123459@gmail.com', 'jami123459', '$2y$10$OAA8QMrfDgfztFrVjCztKeKDzQeDJFtDrXVUE6ybFnGQluVJIP4by', '12345678', NULL, 1, '2020-04-29 08:38:19'),
(8, 'Nazim', 'Uddin', '123456', '123456', 'jami123410@gmail.com', 'jami123410', '$2y$10$/WY1OHxyHtFCr9haNRbDkORYlVB/yK.07M3SxXKJ.DzGv502b0dOK', '12345678', NULL, 1, '2020-04-29 08:38:31'),
(9, 'Nazim', 'Uddin', '123456', '123456', 'jami123411@gmail.com', 'jami123411', '$2y$10$wXegtQphAj3BKVc1J54vfOwEe9b9fNJEdCyWQTC.kPG9WDoRo9vee', '12345678', NULL, 1, '2020-04-29 08:38:39'),
(10, 'Nazim', 'Uddin', '123456', '123456', 'jami123412@gmail.com', 'jami123412', '$2y$10$g1BRq.O/TUlS4AJ/1cSleu33/tMh4qQF23nKUNTWzyNMxyMjiZqUe', '12345678', NULL, 1, '2020-04-29 08:38:48'),
(11, 'Nazim', 'Uddin', '123456', '123456', 'jami123413@gmail.com', 'jami123413', '$2y$10$f2OnESXcRXuqtiUSxxc9e.g4Ezv1GxKM8k1q0QGi0kXoubAdVZPXa', '12345678', NULL, 1, '2020-04-29 08:38:56'),
(12, 'Nazim', 'Uddin', '123456', '123456', 'jami123414@gmail.com', 'jami123414', '$2y$10$DpJkKjeGv.Mtt2m5Vz0xXuUIh7f9LrRoXWR612Lp8cGjzzXywY5wO', '12345678', NULL, 1, '2020-04-29 08:39:04'),
(13, 'Nazim', 'Uddin', '123456', '123456', 'jami123415@gmail.com', 'jami123415', '$2y$10$Lim7lEpvK2IWALU1PbjlEOUt9C/uG02L5te5k5T4kOm2qvb.SguiG', '12345678', NULL, 0, '2020-04-29 08:39:11'),
(14, 'Nazim', 'Uddin', '123456', '123456', 'jami123416@gmail.com', 'jami123416', '$2y$10$5qV8MgeMWm0mlI30tI20BuoK6KmvduWFtq/6DPPS4ah3dH0YE3vCy', '12345678', NULL, 0, '2020-04-29 08:39:21'),
(15, 'Nazim', 'Uddin', '123456', '123456', 'jami123417@gmail.com', 'jami123417', '$2y$10$esgE8npbWFS/1HaA9VjqguYTBHCeDUOQwh0tQfPYQxsbNGh/EJr8.', '12345678', NULL, 0, '2020-04-29 08:39:30'),
(16, 'Nazim', 'Uddin', '123456', '123456', 'jami123418@gmail.com', 'jami123418', '$2y$10$4gE9GyqF9eWfzsPvS753T.JitW331CInBDrkapOSCW70nQ2Hq0F1G', '12345678', NULL, 1, '2020-04-29 08:39:38'),
(17, 'Nazim', 'Uddin', '123456', '123456', 'jami123419@gmail.com', 'jami123419', '$2y$10$v2eyhm0dM/WP80J3P6gybOM/fT9hJ2vRlfOdj3N8pzkZky0w9WK1G', '12345678', NULL, 1, '2020-04-29 08:39:46'),
(18, 'Nazim', 'Uddin', '123456', '123456', 'jami123420@gmail.com', 'jami123420', '$2y$10$KVRHYObEcGj4fdOpl/CVceKS7Vt4TUf2sA/Ikq8zgB2h7ZE7JoF22', '12345678', NULL, 1, '2020-04-29 08:39:58'),
(19, 'Nazim', 'Uddin', '123456', '123456', 'jami123421@gmail.com', 'jami123421', '$2y$10$9F1UzaT0oaSSXBGUtvGiiOBGDI2bSyurE5O89LTMxyAPxa/kgosLK', '12345678', NULL, 1, '2020-04-29 08:40:05'),
(20, 'Nazim', 'Uddin', '123456', '123456', 'jami123422@gmail.com', 'jami123422', '$2y$10$wa4C9V58mqEbLzQnfib73.OPMrlhKbOpS96sVS/KQo2gIzMKPF3wi', '12345678', NULL, 1, '2020-04-29 08:40:12'),
(21, 'Nazim', 'Uddin', '123456', '123456', 'jami123423@gmail.com', 'jami123423', '$2y$10$pu9bGZsNFqv3GTm4UxDJL.ZIQWUWD3dZ.Mp7o5BhvStOCp9pha8ze', '12345678', NULL, 1, '2020-04-29 08:40:20'),
(22, 'Nazim', 'Uddin', '123456', '123456', 'jami123424@gmail.com', 'jami123424', '$2y$10$QZNiUAwdTbnYPocCB2mEk.jPP.5vlFwsIi8cO/C2mqC0ID672jN4.', '12345678', NULL, 0, '2020-04-29 08:40:27'),
(23, 'Nazim', 'Uddin', '123456', '123456', 'jami123425@gmail.com', 'jami123425', '$2y$10$2WoV5SzSAtC3FLtDGmQRQukAL8PzVlIf4F7DOno0qHZjdhQwlYjXy', '12345678', NULL, 0, '2020-04-29 08:40:37'),
(24, 'Nazim', 'Uddin', '123456', '123456', 'jami123426@gmail.com', 'jami1234256', '$2y$10$f8x4LSwbdy6fQ9BZIDNINer7uJIBWiyMT7R8FcyNb9R/kO8nww4zO', '12345678', NULL, 0, '2020-04-29 08:40:48'),
(25, 'Nazim', 'Uddin', '123456', '123456', 'jami123427@gmail.com', 'jami1234257', '$2y$10$i8jbNj1vNBgQJAMvjAVLeO9PgcioUY2dXZ3vixqSLQ53WVhdedzZK', '12345678', NULL, 1, '2020-04-29 08:40:57'),
(26, 'Nazim', 'Uddin', '123456', '123456', 'jami123428@gmail.com', 'jami123428', '$2y$10$JOViQ0qID/CWdMjTOQPAB.CAKV4UrbVgLckf3STBYF4CQtf.vmwI6', '12345678', NULL, 1, '2020-04-29 08:41:10'),
(27, 'Nazim', 'Uddin', '123456', '123456', 'jami123429@gmail.com', 'jami123429', '$2y$10$SrkIzw6GWatOvse9PAxWwujcuImiMSjzQKuIEZk19hgSPU3vCivey', '12345678', NULL, 1, '2020-04-29 08:41:18'),
(28, 'Nazim', 'Uddin', '123456', '123456', 'jami123430@gmail.com', 'jami123430', '$2y$10$laganPkiX0/pH1HWvrUc8u4JUoNPQzWwEsKdMjg0sBSuP1CJEQeUu', '12345678', NULL, 1, '2020-04-29 08:41:28');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
