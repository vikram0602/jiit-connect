-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 16, 2014 at 08:04 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `minor`
--
CREATE DATABASE IF NOT EXISTS `minor` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `minor`;

-- --------------------------------------------------------

--
-- Table structure for table `admin_details`
--

CREATE TABLE IF NOT EXISTS `admin_details` (
  `Username` varchar(10) NOT NULL,
  `Firstname` varchar(20) NOT NULL,
  `Middlename` varchar(20) NOT NULL,
  `Lastname` varchar(20) NOT NULL,
  `emailid` varchar(50) NOT NULL,
  `Contact` varchar(10) NOT NULL,
  `Gender` enum('Male','Female','','') NOT NULL,
  `imgurl` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`Username`),
  UNIQUE KEY `emailid` (`emailid`,`Contact`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_details`
--

INSERT INTO `admin_details` (`Username`, `Firstname`, `Middlename`, `Lastname`, `emailid`, `Contact`, `Gender`, `imgurl`) VALUES
('admin', 'Administrator', 'gaurav', 'dubey', 'admin123456@jiitconnect.com', '123456', 'Male', 'http://localhost/minor/stud_accnt/usersimg/Penguins.jpg'),
('admin1', 'vikram', 'kumar', 'khurana', 'vikram0602@gmail.com', '8527177601', 'Male', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `c_id` varchar(20) NOT NULL,
  `c_name` varchar(100) NOT NULL,
  `credit` int(1) NOT NULL,
  `dept_id` enum('cse','ece','','') NOT NULL,
  `description` varchar(5000) NOT NULL,
  `shortcode` varchar(10) NOT NULL,
  `imgurl` varchar(500) NOT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`c_id`, `c_name`, `credit`, `dept_id`, `description`, `shortcode`, `imgurl`) VALUES
('10B11CI411', 'Fundamentals of Algorithms', 4, 'cse', 'Review of Set theory,Induction,Series evaluation and Data Structure.Asymptotic analysis.Growth of functions.Recurrences.Divide and conquer algorithms.Dynamic programming. Greedy algorithm. Backtracking. Decision tree. Game tree.Index trees -IBST, TBST. Balanced Tree - AVL, and B Trees.Splay Tree. Heap.Graph algorithms - minimum spanning tree, shortest path, Hamiltonian cycle. String matching. Basic computational geometry. Introduction to kinetic data structures. ', 'foa', 'img/foa.jpg'),
('10B11CI512', 'Software Engineering', 4, 'cse', 'Interactive Systems. Usability. Software process models. Personal software process, Team software process. Requirement engineering, Software requirement specifications. Formal system development techniques. Analysis and modeling. Software architecture and design. UML. Design patterns. Software estimation - COCOMO model, Putnam model. Software metrics. Coding standard and practices. Software testing. Software maintenance. CASE Tools. Introduction to software engineering for web and mobile applications.', 'se', 'img/se.jpg'),
('10B11EC111', ' Electrical Circuit Analysis ', 4, 'ece', 'Electrical sources – DC, AC, Voltage, current and power sources, Electrical components -passive and active. Basic circuit laws, Network Theorems (DC circuits), AC waveforms-frequency, phase, amplitude, peak, rms, calculation of power, response of passive components on AC waveforms- impedance, RLC circuit, Transient analysis of  electric circuits, steady state analysis of circuits, network theorems(ac circuits), two port networks, resonance.', 'eca', 'img/eca.jpg'),
('10B11EC211', 'Basic Electronic Devices and Circuits ', 4, 'ece', 'Semiconductor basic theory, PN junctions, transistor theory, PN junction diodes, BJTs, FETs:- characteristics, biasing, different configuration. Review of two port network theory – h and other parameters, Equivalent circuits, BJT, FET amplifiers-frequency response, negative and positive feedback, operational amplifiers and their applications. Oscillators. Boolean algebra, logic circuits and gates, FLIP FLOPS, shift registers, counters, timers.', 'bedc', 'img/bedc.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `course_student`
--

CREATE TABLE IF NOT EXISTS `course_student` (
  `c_id` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  PRIMARY KEY (`c_id`,`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_student`
--

INSERT INTO `course_student` (`c_id`, `username`) VALUES
('10B11CI411', '9911103459'),
('10B11CI411', 'admin'),
('none', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_course`
--

CREATE TABLE IF NOT EXISTS `faculty_course` (
  `username` varchar(20) NOT NULL,
  `c_id` varchar(20) NOT NULL,
  PRIMARY KEY (`username`,`c_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty_course`
--

INSERT INTO `faculty_course` (`username`, `c_id`) VALUES
('9999999900', '10B11CI411'),
('9999999912', '10B11CI512'),
('gs', '10B11CI512');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_details`
--

CREATE TABLE IF NOT EXISTS `faculty_details` (
  `username` varchar(20) NOT NULL,
  `Firstname` varchar(25) NOT NULL,
  `middle_name` varchar(20) NOT NULL,
  `Lastname` varchar(25) NOT NULL,
  `department` enum('CSE','ECE','HSS','') NOT NULL,
  `email_id` varchar(50) DEFAULT NULL,
  `contact_no` bigint(15) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `description` varchar(50) DEFAULT NULL,
  `designation` varchar(30) DEFAULT NULL,
  `imgurl` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`username`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email_id` (`email_id`),
  UNIQUE KEY `contact_no` (`contact_no`),
  KEY `department_id` (`department`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty_details`
--

INSERT INTO `faculty_details` (`username`, `Firstname`, `middle_name`, `Lastname`, `department`, `email_id`, `contact_no`, `dob`, `gender`, `description`, `designation`, `imgurl`) VALUES
('9999999900', 'sandeep', '', 'jain', 'CSE', 'sandeep.jain@jiit.ac.in', 9990723695, '1988-04-21', 'male', 'programming,web technology', 'senior lecturer', '/minor/faculty/usersimg/san.jpg'),
('9999999901', 'shipra ', '', 'kapoor', 'ECE', 'shipra.kapoor@jiit.ac.in', 9555278930, '1991-09-23', 'female', 'communication', 'senior lecturer', ''),
('9999999912', 'vartika', '', 'sri', 'CSE', 'vartika.srivastava@jiit.ac.in', 9785895252, '1990-02-27', 'female', 'se teacher', 'senior lecturer', '/minor/faculty/usersimg/var.jpg'),
('gs', 'gaurav', '', 'saxena', 'CSE', 'gaurav.saxena@jiit.ac.in', 2147483647, '1970-07-15', 'male', NULL, 'Senior Lecturer', NULL);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `forum_answer`
--

INSERT INTO `forum_answer` (`question_id`, `a_id`, `a_name`, `a_enroll`, `a_answer`, `a_datetime`) VALUES
(22, 4, 'yutyu', 453, 'f u', '23/11/13 13:45:53'),
(15, 5, 'gaurav1 dubey', 9911103459, 'programming langauage', '26/11/13 20:48:42'),
(20, 6, 'sandeep jain', 9999999900, 'alsdm', '26/11/13 21:41:07'),
(23, 7, 'sandeep jain', 9999999900, 'hurrah', '26/11/13 21:47:06'),
(25, 8, 'sandeep jain', 9999999900, 'sdlfjksf', '26/11/13 21:47:41'),
(25, 9, 'sandeep jain', 9999999900, 'yipppeee', '26/11/13 21:49:20'),
(19, 10, 'gaurav1 dubey', 9911103459, 'kjjhlkjhlk', '27/11/13 06:52:39'),
(13, 11, 'gaurav1 dubey', 9911103459, 'fgnhynhy', '27/11/13 10:03:19');

-- --------------------------------------------------------

--
-- Table structure for table `forum_question`
--

CREATE TABLE IF NOT EXISTS `forum_question` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `topic` varchar(255) NOT NULL,
  `detail` longtext NOT NULL,
  `name` varchar(65) NOT NULL,
  `username` varchar(11) NOT NULL,
  `datetime` varchar(25) NOT NULL,
  `view` int(4) NOT NULL,
  `reply` int(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `forum_question`
--

INSERT INTO `forum_question` (`id`, `topic`, `detail`, `name`, `username`, `datetime`, `view`, `reply`) VALUES
(13, 'android', 'how to parse data using JSON??', 'shubham gupta', '9911103564', '11/11/13 07:04:20', 6, 1),
(14, 'project', 'how tomake a project', 'upaang', '0', '11/11/13 07:37:38', 3, 0),
(15, 'java', 'what is java', 'vikram', '9911103564', '20/11/13 02:09:17', 5, 1),
(16, 'sadjksh', 'sjdjakshadkj', 'sjdhas', '348573489', '20/11/13 02:35:39', 2, 0),
(17, 'shubham', 'who is shubham', 'shubham', '9990723695', '20/11/13 05:08:16', 3, 0),
(18, 'shubham', 'shubham', 'shubham', '943853894', '20/11/13 05:20:06', 6, 1),
(19, 'what do you want', 'what do you want', 'shubham', '9911103564', '20/11/13 05:26:19', 4, 1),
(20, 'upaang', 'who is', 'shubham', '98347987', '20/11/13 05:31:10', 9, 1),
(21, 'shubham', 'who is mani', 'shubham', '98098', '20/11/13 05:52:52', 5, 2),
(22, 'hoqdy', 'yippeeee', 'vikram0602', '121212', '23/11/13 01:45:17', 6, 1),
(23, '64646', '64646321', 'gaurav1 dubey', '9911103459', '26/11/13 08:51:03', 8, 1),
(24, 'xxxxxxxxxxx', 'askdjaskdj', 'sandeep jain', '0', '26/11/13 09:44:44', 3, 0),
(25, 'kyoki', 'dim', 'sandeep jain', 'root', '26/11/13 09:47:30', 4, 2),
(26, 'jksjfkdj', 'sdfsdfsdf', 'sandeep jain', '9999999900', '26/11/13 09:49:45', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `username` varchar(11) NOT NULL,
  `usertype` enum('student','faculty','admin','') NOT NULL,
  `password` varchar(30) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `usertype`, `password`) VALUES
('9911103459', 'student', 'gaurav06#'),
('9999999900', 'faculty', 'sandeep'),
('9999999912', 'faculty', 'vartika'),
('admin', 'admin', 'admin06#'),
('admin1', 'admin', '32127'),
('gs', 'faculty', '22004');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `username` varchar(20) NOT NULL,
  `post` varchar(20000) NOT NULL,
  `date` date NOT NULL,
  `name` varchar(50) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`username`, `post`, `date`, `name`, `timestamp`) VALUES
('9999999900', 'this is a new post', '2013-11-06', 'sandeep jain', '2013-11-23 17:31:15'),
('9999999900', 'this is a new post2 for sachinthis is a new post2 for sachinthis is a new post2 for sachinthis is a new post2 for sachinthis is a new post2 for sachinthis is a new post2 for sachinthis is a new post2 ', '2013-11-17', 'sandeep jain', '2013-11-23 17:31:15'),
('9999999900', 'adadasdasdas', '2013-11-22', 'sandeep jain', '2013-11-23 17:31:15'),
('9999999912', 'i m mentor', '2013-11-22', 'vartika sri', '2013-11-23 17:31:15'),
('9999999900', 'aksdhaksdhalksdhlaksdh', '2013-11-06', 'sandeep jain', '2013-11-23 17:34:04'),
('admin', 'This is to notify that Study material is updated<br>eca_2010new.pdfFile Uploaded folder is <a href=''>sm/Study Material/alskdjas</a>', '0000-00-00', 'Administrator dubey', '2013-11-24 15:15:18'),
('admin', 'This is to notify that Study material is updated<br>JYC SELECTION 2013.pdfFile Uploaded folder is <a href=''>sm/Study Material/alskdjas</a>', '0000-00-00', 'Administrator dubey', '2013-11-24 15:22:14'),
('admin', 'This is to notify that Study material is updated<br>winner.pdfFile Uploaded in sm</a>', '0000-00-00', 'Administrator dubey', '2013-11-24 16:12:01'),
('admin', 'abara', '0000-00-00', 'AdminDubey', '2013-11-24 16:30:23'),
('admin', 'abcdefg', '2013-11-24', 'Administrator dubey', '2013-11-24 16:39:39'),
('admin', 'This is to notify that Study material is updated<br><a href="$file"> Book12345.pdf</a> File Uploaded in sm</a>', '2013-11-24', 'Administrator dubey', '2013-11-24 16:45:38'),
('admin', 'This is to notify that Study material is updated<br><a href=sm/winner.pdf> winner.pdf</a> File Uploaded in sm</a>', '2013-11-24', 'Administrator dubey', '2013-11-24 16:46:51'),
('admin', 'This is to notify that Study material is updated<br><a href=../fms/sm/eca_2011.pdf> eca_2011.pdf</a> File Uploaded in sm</a>', '2013-11-24', 'Administrator dubey', '2013-11-24 16:49:17'),
('admin', 'lsakdjlksjd;laskjd;lks', '2013-11-24', 'Administrator dubey', '2013-11-24 19:27:16'),
('admin', 'This is to notify that Study material is updated<br><a href=../fms/sm/test/Book12345.pdf> Book12345.pdf</a> File Uploaded in sm/test</a>', '2013-11-25', 'Administrator dubey', '2013-11-25 07:12:51'),
('9999999900', 'askjdhkasjdhjsdkahsdlkhlk', '2013-11-26', 'sandeep jain', '2013-11-26 21:19:52'),
('admin', 'This is to notify that Study material is updated<br><a href=../fms/sm/cse/foa/studymaterial/report minor1.pdf> report minor1.pdf</a> File Uploaded in sm/cse/foa/studymaterial</a>', '2013-11-27', 'Administrator dubey', '2013-11-27 09:25:09'),
('admin', 'This is to notify that Study material is updated<br><a href=../fms/sm/cse/foa/report minor1hgfhg.pdf> report minor1hgfhg.pdf</a> File Uploaded in sm/cse/foa</a>', '2013-11-27', 'Administrator dubey', '2013-11-27 09:45:19');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE IF NOT EXISTS `notice` (
  `username` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `subject` varchar(30) NOT NULL,
  `year` int(1) NOT NULL,
  `batch` varchar(2) NOT NULL,
  `message` varchar(500) NOT NULL,
  PRIMARY KEY (`username`,`date`,`batch`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`username`, `date`, `subject`, `year`, `batch`, `message`) VALUES
('9999999900', '2013-10-02', 'sdsadasd', 2001, 'f3', 'hello'),
('9999999900', '2013-10-02', 'class shift', 2003, 'f6', 'tomorow at 12'),
('9999999900', '2013-10-02', 'asdadsad', 2003, 'f7', 'hiiiii'),
('9999999900', '2013-11-06', 'yooooo', 2002, 'Al', 'dakdsadkand'),
('9999999900', '2013-11-26', 'hooooo', 1, 'f1', 'hip hip');

-- --------------------------------------------------------

--
-- Table structure for table `student_details`
--

CREATE TABLE IF NOT EXISTS `student_details` (
  `username` varchar(20) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `middlename` varchar(30) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `emailid` varchar(50) NOT NULL,
  `contact` bigint(20) unsigned NOT NULL,
  `branch` enum('cse','ece','','') NOT NULL,
  `year` enum('Ist','IInd','IIIrd','IVth') NOT NULL,
  `batch` varchar(2) NOT NULL,
  `imgurl` varchar(500) NOT NULL,
  `gender` enum('male','female','','') NOT NULL,
  PRIMARY KEY (`username`),
  UNIQUE KEY `emailid` (`emailid`,`contact`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_details`
--

INSERT INTO `student_details` (`username`, `firstname`, `middlename`, `lastname`, `emailid`, `contact`, `branch`, `year`, `batch`, `imgurl`, `gender`) VALUES
('9911103459', 'gaurav1', 'kumar', 'dubey', 'gd.jiit@gmail.com', 2147483647, 'cse', 'IIIrd', 'f1', 'usersimg/Penguins.jpg', 'male');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
