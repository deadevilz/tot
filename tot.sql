-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2013 at 03:09 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tot`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_path`
--

CREATE TABLE IF NOT EXISTS `add_path` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `date_add` date NOT NULL,
  `time_add` time NOT NULL,
  `seq` int(20) NOT NULL,
  `prefix` varchar(20) NOT NULL,
  `as_path` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `add_path`
--

INSERT INTO `add_path` (`id`, `date_add`, `time_add`, `seq`, `prefix`, `as_path`, `status`, `username`) VALUES
(1, '2013-05-01', '17:27:00', 0, '', '', '', ''),
(2, '2001-05-13', '17:54:54', 100, 'fafa', 'afafa', 'Requested', ''),
(3, '2001-05-13', '17:55:19', 200, 'fafa', 'afafa', 'Requested', ''),
(4, '2001-05-13', '18:21:22', 300, '200.25.125.0/24', '^(3405_)+(32850_)+$', 'Requested', '1'),
(5, '2001-05-13', '18:21:22', 400, ' 202.25.178.0/24', '^(3405_)+(32850_)+$', 'Requested', '1'),
(6, '2001-05-13', '18:21:22', 500, ' 202.25.178.0/24', '^(3405_)+(32850_)+$', 'Requested', '1'),
(7, '2001-05-13', '18:21:22', 600, ' 202.25.178.0/24', '^(3405_)+(32850_)+$', 'Requested', '2'),
(8, '2001-05-13', '18:21:54', 700, '200.25.125.0/24', '^(3405_)+(32850_)+$', 'Requested', '2'),
(9, '2001-05-13', '18:21:54', 800, ' 202.25.178.0/24', '^(3405_)+(32850_)+$', 'Requested', '2'),
(10, '2001-05-13', '18:21:54', 900, ' 202.25.178.0/24', '^(3405_)+(32850_)+$', 'Requested', '3'),
(11, '2001-05-13', '18:21:54', 1000, ' 202.25.178.0/24', '^(3405_)+(32850_)+$', 'Requested', '3'),
(12, '2001-05-13', '20:07:06', 1100, '200.25.125.0/24', ' ^(3405_)+(32850_)+$', 'Requested', '1'),
(13, '2001-05-13', '20:07:06', 1200, '200.25.125.0/24', ' ^(3405_)+(32850_)+$', 'Requested', '1'),
(14, '2001-05-13', '20:07:06', 1300, '200.25.125.0/24', ' ^(3405_)+(32850_)+$', 'Requested', '1'),
(15, '2001-05-13', '20:07:06', 1400, '200.25.125.0/24', ' ^(3405_)+(32850_)+$', 'Requested', '1');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `type` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `type`) VALUES
(1, 'admin', '1', 1),
(2, '1', '1', 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
