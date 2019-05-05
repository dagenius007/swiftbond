-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2017 at 02:34 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `swift`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `Firstname` text NOT NULL,
  `Lastname` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `package` text NOT NULL,
  `upay1` text NOT NULL,
  `upay2` text NOT NULL,
  `dpay1` text NOT NULL,
  `dpay2` text NOT NULL,
  `dpay3` text NOT NULL,
  `acno` text NOT NULL,
  `bankname` text NOT NULL,
  `accname` text NOT NULL,
  `phone` text NOT NULL,
  `upay1v` text NOT NULL,
  `upay2v` text NOT NULL,
  `dpay1v` text NOT NULL,
  `dpay2v` text NOT NULL,
  `dpay3v` text NOT NULL,
  `acctype` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Firstname`, `Lastname`, `email`, `password`, `package`, `upay1`, `upay2`, `dpay1`, `dpay2`, `dpay3`, `acno`, `bankname`, `accname`, `phone`, `upay1v`, `upay2v`, `dpay1v`, `dpay2v`, `dpay3v`, `acctype`) VALUES
('Kiu', 'hjih', 'philip1@gmail.com', 'kid', '12k', '', '', 'pobioha1@gmail.com', 'pobioha1@gmail.com', 'pobioha1@gmail.com', '88y', 'acess', '677', '8989', '11', '11', '', '', '', ''),
('Josh', 'Popoola', 'pobioha1@gmail.com', 'kid', '12k', '', '', '', '', '', 'hvh', 'gtdf', '67', '97', '1', '1', '', '', '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
