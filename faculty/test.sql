-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 23, 2013 at 11:39 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;

-- --------------------------------------------------------

--
-- Table structure for table `forum_answer`
--

CREATE TABLE IF NOT EXISTS `forum_answer` (
  `question_id` int(4) NOT NULL,
  `a_id` int(4) NOT NULL AUTO_INCREMENT,
  `a_name` varchar(65) NOT NULL,
  `a_enroll` bigint(11) NOT NULL,
  `a_answer` longtext NOT NULL,
  `a_datetime` varchar(25) NOT NULL,
  PRIMARY KEY (`a_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `forum_question`
--

CREATE TABLE IF NOT EXISTS `forum_question` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `topic` varchar(255) NOT NULL,
  `detail` longtext NOT NULL,
  `name` varchar(65) NOT NULL,
  `enroll` bigint(11) NOT NULL,
  `datetime` varchar(25) NOT NULL,
  `view` int(4) NOT NULL,
  `reply` int(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `forum_question`
--

INSERT INTO `forum_question` (`id`, `topic`, `detail`, `name`, `enroll`, `datetime`, `view`, `reply`) VALUES
(13, 'android', 'how to parse data using JSON??', 'shubham gupta', 9911103564, '11/11/13 07:04:20', 4, 1),
(14, 'project', 'how tomake a project', 'upaang', 0, '11/11/13 07:37:38', 2, 0),
(15, 'java', 'what is java', 'vikram', 9911103564, '20/11/13 02:09:17', 2, 0),
(16, 'sadjksh', 'sjdjakshadkj', 'sjdhas', 348573489, '20/11/13 02:35:39', 2, 0),
(17, 'shubham', 'who is shubham', 'shubham', 9990723695, '20/11/13 05:08:16', 2, 0),
(18, 'shubham', 'shubham', 'shubham', 943853894, '20/11/13 05:20:06', 4, 1),
(19, 'what do you want', 'what do you want', 'shubham', 9911103564, '20/11/13 05:26:19', 2, 0),
(20, 'upaang', 'who is', 'shubham', 98347987, '20/11/13 05:31:10', 6, 2),
(21, 'shubham', 'who is mani', 'shubham', 98098, '20/11/13 05:52:52', 3, 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
