-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2014 at 06:49 AM
-- Server version: 5.6.11
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `iau`
--
CREATE DATABASE IF NOT EXISTS `iau` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `iau`;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE IF NOT EXISTS `menus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `position` tinyint(4) NOT NULL,
  `visible` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `page_id`, `title`, `position`, `visible`) VALUES
(1, 1, 'Top Menu', 0, 1),
(2, 1, 'Side Menu 1', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `menu_items`
--

CREATE TABLE IF NOT EXISTS `menu_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `link` varchar(250) NOT NULL,
  `position` tinyint(4) NOT NULL,
  `visible` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `menu_items`
--

INSERT INTO `menu_items` (`id`, `menu_id`, `parent_id`, `name`, `link`, `position`, `visible`) VALUES
(1, 1, 0, 'Home', '?id=1', 1, 1),
(2, 1, 0, 'Pepole', '', 1, 1),
(3, 1, 0, 'Calender', '', 1, 1),
(4, 1, 0, 'Forms', '', 1, 1),
(5, 1, 0, 'About Us', '', 1, 1),
(7, 1, 4, 'Probloms', '', 1, 1),
(8, 1, 4, 'Project', '', 1, 1),
(9, 2, 0, 'Art', '', 1, 1),
(10, 2, 0, 'Poet', '', 1, 1),
(11, 2, 9, 'Ejucation Office', '', 1, 1),
(12, 2, 9, 'Students', '', 1, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
