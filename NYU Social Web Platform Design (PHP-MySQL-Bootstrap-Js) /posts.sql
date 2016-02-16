-- phpMyAdmin SQL Dump
-- version 4.4.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 16, 2016 at 11:19 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `DSP`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL,
  `category_id` tinyint(4) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `post_creator` int(11) NOT NULL,
  `post_content` text NOT NULL,
  `post_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `category_id`, `topic_id`, `post_creator`, `post_content`, `post_date`) VALUES
(14, 2, 0, 1, 'uuuu', '2015-08-13 23:14:58'),
(15, 2, 23, 0, 'qweqweqwe', '2015-08-13 23:54:35'),
(16, 2, 23, 1, 'qweqweqwe', '2015-08-13 23:54:58'),
(17, 2, 23, 1, 'test', '2015-08-13 23:57:09'),
(18, 2, 23, 1, 'test 2', '2015-08-13 23:59:43'),
(19, 2, 23, 1, 'test 3', '2015-08-14 00:01:04'),
(20, 2, 23, 1, '', '2015-08-14 10:25:34'),
(21, 2, 18, 1, '', '2015-08-14 10:56:53'),
(22, 2, 18, 1, '', '2015-08-14 11:00:05'),
(23, 2, 19, 1, '', '2015-08-14 11:50:25'),
(24, 1, 0, 1, '<p>123123123123123123123123</p>', '2015-08-14 15:53:41'),
(25, 1, 24, 1, '<p>qweqweqweqweqwe</p>', '2015-08-14 16:11:21'),
(26, 1, 0, 1, '<p>werwqrqwrqrqwr</p>', '2015-08-14 16:54:24'),
(27, 2, 19, 1, '<p>qwrqwqwrqwr</p>', '2015-08-14 16:54:56'),
(28, 1, 25, 2, '<p>qweqweqweqweqwe</p>', '2015-08-18 10:47:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
