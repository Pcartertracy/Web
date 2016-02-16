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
-- Table structure for table `songs`
--

CREATE TABLE IF NOT EXISTS `songs` (
  `song_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `duration` varchar(25) NOT NULL,
  `artist` varchar(100) NOT NULL,
  `album` varchar(100) NOT NULL,
  `genre` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `songs`
--

INSERT INTO `songs` (`song_id`, `name`, `duration`, `artist`, `album`, `genre`) VALUES
(1, 'lithium', '5:04', 'gogogo', 'lolololol', 'blaw blaw'),
(2, 'lum', '5:04', 'fefwefgo', 'lowefwefl', 'bwefwefwef'),
(3, 'lwrium', '5:04', 'qwqwrqwero', 'loqreqwerl', 'blaqwerwqer'),
(4, 'lasdasdium', '5:04', 'gasdasdasdogo', 'lqweqwelol', 'blaw qweqweqweblaw');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `songs`
--
ALTER TABLE `songs`
  ADD PRIMARY KEY (`song_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `songs`
--
ALTER TABLE `songs`
  MODIFY `song_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
