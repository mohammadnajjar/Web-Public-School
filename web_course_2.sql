-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2020 at 11:27 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `web_course_2`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `courseName` varchar(45) DEFAULT NULL,
  `sessionCount` int(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf32 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `courseName`, `sessionCount`) VALUES
(1, 'Web development', 15),
(2, 'C++', 10),
(3, 'Android', 15),
(4, 'C#', 16),
(5, 'PLC', 7),
(6, 'JAVA', 16),
(7, 'SQL', 4),
(8, 'js', 10);

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE IF NOT EXISTS `session` (
  `s_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(45) DEFAULT NULL,
  `rank` int(4) DEFAULT NULL,
  `c_Id` int(11) NOT NULL,
  PRIMARY KEY (`s_Id`),
  KEY `c_Id` (`c_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf32 AUTO_INCREMENT=47 ;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`s_Id`, `Title`, `rank`, `c_Id`) VALUES
(1, 'Intro. to SQL', 1, 7),
(4, 'Deal with Table', 2, 7),
(5, 'Manipulate Data', 3, 7),
(6, 'Advanced Queries', 4, 7),
(7, 'Intro. to web development', 1, 1),
(8, 'HTML5 Elem.', 2, 1),
(9, 'Build website with HTML', 3, 1),
(10, 'CSS cascading style sheet', 4, 1),
(11, 'Html with Css', 5, 1),
(12, 'JS', 6, 1),
(13, 'JQuery', 7, 1),
(14, 'HTML - CSS - JS website', 8, 1),
(15, 'Responsive Website with Bootstrap', 9, 1),
(16, 'Static Website', 10, 1),
(17, 'ERM', 11, 1),
(18, 'MYSQL DB', 12, 1),
(19, 'PHP', 13, 1),
(20, 'AJAX Tech.', 14, 1),
(21, 'Dynamic Website', 14, 1),
(25, 'intro to java', 1, 6),
(26, 'intro to cpp', 1, 2),
(27, 'Operation and logic in cpp', 2, 2),
(28, 'What is PLC!', 1, 5),
(29, 'start with CSharp ', 1, 4),
(30, 'loop in cpp', 4, 2),
(41, 'First Program in plc', 2, 5),
(43, 'Operation and logic in cpp1', 3, 2),
(45, 'project for(if - loop)', 5, 2),
(46, 'into to js', 1, 8);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `lastname` varchar(10) NOT NULL,
  `birthdate` date NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `address` varchar(100) NOT NULL,
  `password` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `lastname`, `birthdate`, `mobile`, `address`, `password`) VALUES
(1, 'Najlaa', 'Haffar', '1995-06-27', '0900000', 'aleppo, one area, two street..', 'najlaa'),
(2, 'Amira', 'Mlays', '1996-05-04', '0900000', 'aleppo, two area, one street', 'amira');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `session`
--
ALTER TABLE `session`
  ADD CONSTRAINT `session_ibfk_1` FOREIGN KEY (`c_Id`) REFERENCES `course` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
