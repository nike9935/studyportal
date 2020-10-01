-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2020 at 10:57 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testing`
--

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `erp` varchar(20) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `pswd` varchar(30) NOT NULL,
  `verify` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`erp`, `name`, `email`, `pswd`, `verify`) VALUES
('', '', '', '', 1),
('11663', 'krishnam', 'krishnam3999', '1234', 1),
('12345', 'Krishnam2', 'krissssssss2@sdf', '123456', 1),
('12389', 'Aman Mishra', 'amanadsdlvhb', '1234', 1),
('52465', 'dfljhsd', 'sljbvnd', 'dkjfnkj', 1),
('695869', 'testing faculty', 'test@faculty.com', '1234', 1),
('696969', 'admin', 'admin@admin.com', 'admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE `file` (
  `sid` varchar(7) NOT NULL,
  `year` int(1) NOT NULL,
  `psno` int(1) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `uname` varchar(30) NOT NULL,
  `utno` int(1) NOT NULL,
  `esyr` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `file`
--

INSERT INTO `file` (`sid`, `year`, `psno`, `fname`, `uname`, `utno`, `esyr`) VALUES
('BCS5002', 1, 0, 'BCS5002es2017-18.pdf', 'admin', 0, '2017-18'),
('BCS5002', 1, 2, 'BCS5002ps2.pdf', 'krishnam', 0, '0'),
('BCS5002', 2, 0, 'BCS5002ut2.pdf', 'krishnam', 2, '0'),
('BCS5002', 6, 0, 'BCS5002es2017-19.pdf', 'admin', 0, '2017-19'),
('BCS5004', 1, 0, 'BCS5004es2017-18.pdf', 'krr', 0, '2017-18'),
('BMG5006', 3, 3, 'BMG5006ps3.txt', 'Aman Mishra', 0, ''),
('ikfs', 1, 0, 'ikfses2018-19.pdf', 'admin', 0, '2018-19'),
('ikfs', 6, 0, 'ikfses2017-19.pdf', 'admin', 0, '2017-19'),
('TES6969', 2, 0, 'TES6969es2017-19.pdf', 'admin', 0, '2017-19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`erp`);

--
-- Indexes for table `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`sid`,`year`,`psno`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
