-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2015 at 09:55 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `wolserver`
--

-- --------------------------------------------------------

--
-- Table structure for table `devices`
--

CREATE TABLE IF NOT EXISTS `devices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `devicename` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `macaddress` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ipaddress` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `devicename` (`devicename`,`macaddress`,`ipaddress`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `devices`
--

INSERT INTO `devices` (`id`, `devicename`, `macaddress`, `ipaddress`) VALUES
(5, 'Hal 9000', '00:00:00:00:00', '0.0.0.0');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` char(64) COLLATE utf8_unicode_ci NOT NULL,
  `salt` char(16) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`,`password`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `salt`, `email`) VALUES
(2, 'admin', 'd40b41204ae825f499d44f4071786b0c3e0d53ffea9931f72b87dea72e5c7b05', '7d08ad29520e3e56', 'admin@whatever.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
