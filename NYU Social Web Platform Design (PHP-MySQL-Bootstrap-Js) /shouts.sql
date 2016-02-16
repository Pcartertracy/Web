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
-- Table structure for table `shouts`
--

CREATE TABLE IF NOT EXISTS `shouts` (
  `shout_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `shout` text NOT NULL,
  `shout_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shouts`
--

INSERT INTO `shouts` (`shout_id`, `user_id`, `shout`, `shout_date`) VALUES
(1, 0, 'qweqweqwe', '2015-07-21 17:15:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `shouts`
--
ALTER TABLE `shouts`
  ADD PRIMARY KEY (`shout_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `shouts`
--
ALTER TABLE `shouts`
  MODIFY `shout_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
