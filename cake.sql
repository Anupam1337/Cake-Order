-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2019 at 09:15 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cake`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbcak`
--

CREATE TABLE `tbcak` (
  `id` int(11) NOT NULL,
  `cakcod` int(11) NOT NULL,
  `caknam` varchar(100) NOT NULL,
  `sizcat` varchar(50) NOT NULL,
  `caking` varchar(500) NOT NULL,
  `cakpic` varchar(50) NOT NULL,
  `cakvegsts` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbcak`
--

INSERT INTO `tbcak` (`id`, `cakcod`, `caknam`, `sizcat`, `caking`, `cakpic`, `cakvegsts`) VALUES
(1, 1, 'Chacolate', 'Half Kg', 'Chocolate', 'img/img1.jpeg', '0'),
(2, 2, 'Vanilla', '1 KG', 'Vanilla', 'img/img2.jpeg', '0'),
(3, 3, 'StrawBerry Chocolate', '2 KG', 'StrawBerry, Chocolate, Vanilla', 'img/img3.jpg', '0'),
(4, 4, 'Vanilla', 'Half Kg', 'Vanilla, egg', 'img/img4.jpg', '1'),
(5, 5, 'Strawberry', '1 KG', 'Straberry, egg', 'img/img5.jpg', '1'),
(6, 6, 'Cherry Vanilla', '2 KG', 'Cherry, Vanilla, egg', 'img/img6.jpg', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbord`
--

CREATE TABLE `tbord` (
  `id` int(11) NOT NULL,
  `ordcak` int(11) NOT NULL,
  `orddat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ordsizcod` int(11) NOT NULL,
  `ordphnno` varchar(50) NOT NULL,
  `ordqty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbord`
--

INSERT INTO `tbord` (`id`, `ordcak`, `orddat`, `ordsizcod`, `ordphnno`, `ordqty`) VALUES
(1, 1, '2019-03-24 20:09:11', 3, '8829287927', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbsiz`
--

CREATE TABLE `tbsiz` (
  `id` int(11) NOT NULL,
  `sizcod` int(11) NOT NULL,
  `sizcakcod` int(11) NOT NULL,
  `cakvegsts` char(5) NOT NULL,
  `sizcat` varchar(50) NOT NULL,
  `sizprc` int(11) NOT NULL,
  `sizqty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbsiz`
--

INSERT INTO `tbsiz` (`id`, `sizcod`, `sizcakcod`, `cakvegsts`, `sizcat`, `sizprc`, `sizqty`) VALUES
(1, 1, 1, 'veg', 'Half Kg', 150, 0),
(2, 2, 2, 'veg', '1 KG', 300, 30),
(3, 3, 3, 'veg', '2 KG', 500, 18),
(4, 4, 4, 'nveg', 'Half KG', 140, 50),
(5, 5, 5, 'nveg', '1 KG', 280, 20),
(6, 6, 6, 'nveg', '2 KG', 450, 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbcak`
--
ALTER TABLE `tbcak`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbord`
--
ALTER TABLE `tbord`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbsiz`
--
ALTER TABLE `tbsiz`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbcak`
--
ALTER TABLE `tbcak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbord`
--
ALTER TABLE `tbord`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbsiz`
--
ALTER TABLE `tbsiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
