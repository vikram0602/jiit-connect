-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 16, 2014 at 08:03 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `crawler`
--
CREATE DATABASE IF NOT EXISTS `crawler` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `crawler`;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `c_id` varchar(20) NOT NULL,
  `keyword` varchar(50) NOT NULL,
  `waitage` int(11) NOT NULL,
  PRIMARY KEY (`c_id`,`keyword`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`c_id`, `keyword`, `waitage`) VALUES
('10B11CI411', 'algorithm', 5),
('10B11CI411', 'computer', 1),
('10B11CI411', 'introduction', 2);

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE IF NOT EXISTS `result` (
  `c_id` varchar(20) NOT NULL,
  `link` varchar(1000) NOT NULL,
  `waitage` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sites`
--

CREATE TABLE IF NOT EXISTS `sites` (
  `site_id` varchar(10) NOT NULL,
  `url` varchar(500) NOT NULL,
  `waitage` int(11) NOT NULL,
  `c_id` varchar(20) NOT NULL,
  PRIMARY KEY (`site_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sites`
--

INSERT INTO `sites` (`site_id`, `url`, `waitage`, `c_id`) VALUES
('1', 'http://ocw.mit.edu/courses/', 8, '10B11CI411'),
('2', 'http://geeksquiz.com/', 6, '10B11CI411');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
