-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 25, 2019 at 08:52 AM
-- Server version: 5.6.38
-- PHP Version: 7.1.12

SET SQL_MODE
= "NO_AUTO_VALUE_ON_ZERO";
SET time_zone
= "+00:00";

--
-- Database: `swift`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users`
(
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `package` text NOT NULL,
  `plan` text NOT NULL,
  `upay` text NOT NULL,
  `dpay1` text NOT NULL,
  `dpay2` text NOT NULL,
  `dpay3` text,
  `dpay4` text,
  `acno` text NOT NULL,
  `bankname` text NOT NULL,
  `accname` text NOT NULL,
  `phone` text NOT NULL,
  `upayv` text NOT NULL,
  `dpay1v` text NOT NULL,
  `dpay2v` text NOT NULL,
  `dpay3v` text NOT NULL,
  `dpay4v` text NOT NULL,
  `acctype` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`firstname`,
`lastname`, `email`, `password`, `package`, `plan`, `upay`, `dpay1`, `dpay2`, `dpay3`, `dpay4`, `acno`, `bankname`, `accname`, `phone`, `upayv`, `dpay1v`, `dpay2v`, `dpay3v`, `dpay4v`, `acctype`) VALUES
('Joshua', 'Samuel', 'joshuaoluikpe@gmail.com', 'kidkid007', '2k', '2', '', '', '', NULL, NULL, '433', 'Access', 'Joshua Oluikpe', '08103737002', '11', '', '', '', '', ''),
('Jo', 'Sho', 'joshua@astract.com', 'kidkid', '2k', '2', '', '', '', NULL, NULL, '0167805509', 'Access', 'Joshua Oluikpe', '08103737003', '', '', '', '', '', 'savings');
