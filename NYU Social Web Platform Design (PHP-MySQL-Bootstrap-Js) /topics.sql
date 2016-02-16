-- phpMyAdmin SQL Dump
-- version 4.4.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 16, 2016 at 11:20 PM
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
-- Table structure for table `topics`
--

CREATE TABLE IF NOT EXISTS `topics` (
  `id` int(11) NOT NULL,
  `category_id` tinyint(4) NOT NULL,
  `topic_title` varchar(150) NOT NULL,
  `topic_creator` int(11) NOT NULL,
  `topic_last_user` int(11) DEFAULT NULL,
  `topic_date` datetime NOT NULL,
  `topic_reply_date` datetime NOT NULL,
  `topic_views` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `category_id`, `topic_title`, `topic_creator`, `topic_last_user`, `topic_date`, `topic_reply_date`, `topic_views`) VALUES
(18, 2, 'test', 1, 1, '2015-08-13 20:31:51', '2015-08-14 11:00:05', 18),
(19, 2, '123123', 1, 1, '2015-08-13 21:07:20', '2015-08-14 16:54:56', 28),
(20, 2, 'qweqwe', 1, NULL, '2015-08-13 22:13:01', '2015-08-13 22:13:01', 3),
(21, 2, 'qweqwe', 1, NULL, '2015-08-13 22:13:07', '2015-08-13 22:13:07', 8),
(22, 2, 'qeqweasdasd', 1, NULL, '2015-08-13 22:14:48', '2015-08-13 22:14:48', 15),
(23, 2, 'yyy', 1, 1, '2015-08-13 23:14:58', '2015-08-14 10:25:34', 39),
(24, 1, '<p>123123123123123123</p>', 1, 1, '2015-08-14 15:53:41', '2015-08-14 16:11:21', 13),
(25, 1, '<p>weriweoiroiwerw</p>', 1, 2, '2015-08-14 16:54:24', '2015-08-18 10:47:48', 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
