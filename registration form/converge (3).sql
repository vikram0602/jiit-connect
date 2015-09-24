-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 13, 2013 at 11:23 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `converge`
--
CREATE DATABASE IF NOT EXISTS `converge` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `converge`;

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE IF NOT EXISTS `event` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `no_of_participants` enum('1','2','3','4','5','6','7','8','9','10') NOT NULL,
  `img-url` varchar(1000) NOT NULL,
  `society` enum('Technical','Cultural','Literary','Sports','Others') NOT NULL,
  `category` varchar(20) NOT NULL,
  `Rules` varchar(2000) NOT NULL,
  `r_fee` bigint(5) NOT NULL,
  `organizers` varchar(2000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `name`, `description`, `no_of_participants`, `img-url`, `society`, `category`, `Rules`, `r_fee`, `organizers`) VALUES
(1, 'Robowars', 'Robowars Xxxxxxxxxxxxxxxxxxxxxxxxxxxxx', '4', 'images/event01.png', 'Technical', 'Robotics', '', 0, ''),
(2, 'RoboManual', 'Robmanual Xxxxxxxxxxxxxxxxxxxxxxxxxxxxx', '8', 'images/event02.png', 'Technical', 'Robotics', '', 0, ''),
(3, 'autonomous', 'autonomousxxxxxxxxxxxxxxxxxxxxxxxxxxxxx', '4', 'images/event02.png', 'Technical', 'Robotics', '', 0, ''),
(4, 'CS', 'autonomousxxxxxxxxxxxxxxxxxxxxxxxxxxxxx', '1', 'images/event01.png', 'Technical', 'Robotics', '', 0, ''),
(5, 'Quiz', 'Which brand derives its name from a Japanese word for ''Sound''? Mind boggling? Get ready to compete with the sharpest and fastest minds with a passion for the business world. With the likes of quiz masters like Arul Mani and Barry O Brien firing a volley of questions, only lightning fast responses and out of the box thinking can sail you through the tough competition. Do you have the mettle to battle it out at the quiz- essential zone of KSHITIJ 2014?', '2', 'images/quiz.png', 'Technical', 'Quiz', 'The quiz will be held in two rounds - both these rounds will be held back to back at IIT Kharagpur during Kshitij.\r\nThere will initially be a written elimination round, with the top teams getting to participate in the finals.\r\nThe decision of the quizmaster will be final and binding.', 500, 'Arnav Sharma(+919873101423)<br>Parth Gargava(+917838741142)');

-- --------------------------------------------------------

--
-- Table structure for table `participant`
--

CREATE TABLE IF NOT EXISTS `participant` (
  `p_id` varchar(20) NOT NULL,
  `name` varchar(30) NOT NULL,
  `dob` date NOT NULL,
  `contact` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `gender` enum('male','female','','') NOT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `participant`
--

INSERT INTO `participant` (`p_id`, `name`, `dob`, `contact`, `email`, `gender`) VALUES
('aksjdaksjdkasjdd', 'aksjdhaskdj', '0000-00-00', 'aksjdkasjdd', 'jsahdkdja@gmail.com', 'male'),
('aksjdkjasdh', 'aksjdsa', '2013-11-30', 'kjasdh', 'kjadwshk@gmail.com', 'female'),
('alksd000123765', 'alksdjalksjd', '2012-10-31', '000123765', 'lkjad@gmail.com', 'female'),
('asdfgkjhgfd', 'asdfghjkl', '2011-11-29', 'kjhgfd', 'abc@gmail.com', 'female'),
('bnv85', 'bnvnksaj', '2005-05-23', '91102546985', 'gd.jiit@gmail.com', 'female'),
('dub00', 'dubey', '2010-10-28', '9524647000', 'gd.jiit@gmail.com', 'female'),
('gau88', 'gaurav', '2010-10-26', '321465888', 'gd.jiit@gmail.com', 'male'),
('gaura852639979', 'gaurav', '2010-10-28', '852639979', 'gd.jiit@gmail.com', 'female'),
('tyuio852369632', 'tyuiop', '2010-11-29', '852369632', 'gd.jiit@gmail.com', 'male');

-- --------------------------------------------------------

--
-- Table structure for table `register_event`
--

CREATE TABLE IF NOT EXISTS `register_event` (
  `team_id` varchar(20) NOT NULL,
  `event` varchar(50) NOT NULL,
  `college` varchar(500) NOT NULL,
  `accomodation` varchar(3) NOT NULL,
  `transportation` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register_event`
--

INSERT INTO `register_event` (`team_id`, `event`, `college`, `accomodation`, `transportation`) VALUES
('aksjdaksjdkasjdd', '04', 'kajsdkasjdhk', 'yes', 'yes'),
('tyuio852369632', '02', 'oiuytrertyui', 'yes', 'yes'),
('asdfgkjhgfd', '02', 'dfghjkl;', 'yes', 'yes'),
('', '', '', 'yes', 'yes'),
('aksjdkjasdh', '03', 'kjashd', 'yes', 'yes'),
('gaura852639979', '4', 'jiit', 'yes', 'yes'),
('alksd000123765', '2', ',amnsd,amsn', 'yes', 'yes'),
('', '', '', 'yes', 'yes'),
('3985', '3', 'lkasdjlaj', 'yes', 'yes'),
('05888', '05', 'jiit', 'yes', 'yes'),
('05000', '05', 'jiit', 'yes', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `register_participant`
--

CREATE TABLE IF NOT EXISTS `register_participant` (
  `team_id` varchar(20) NOT NULL,
  `participant_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register_participant`
--

INSERT INTO `register_participant` (`team_id`, `participant_id`) VALUES
('aksjdaksjdkasjdd', 'aksjdaksjdkasjdd'),
('tyuio852369632', 'tyuio852369632'),
('asdfgkjhgfd', 'asdfgkjhgfd'),
('aksjdkjasdh', 'aksjdkjasdh'),
('gaura852639979', 'gaura852639979'),
('alksd000123765', 'alksd000123765'),
('3985', 'bnv85'),
('05888', 'gau88'),
('05000', 'dub00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
