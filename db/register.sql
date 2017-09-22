-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2017 at 12:03 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `register`
--

-- --------------------------------------------------------

--
-- Table structure for table `meal`
--

CREATE TABLE IF NOT EXISTS `meal` (
  `id` int(100) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `fromm` varchar(100) NOT NULL,
  `too` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meal`
--

INSERT INTO `meal` (`id`, `name`, `fromm`, `too`, `type`) VALUES
(1, 'shawon', '2017-08-29', '2017-09-09', 'off'),
(2, 'shawon', '2017-09-10', '2017-09-30', 'on'),
(3, 'shawon', '2017-10-01', '2017-10-31', 'on'),
(4, 'shawon', '2017-11-01', '2017-11-10', 'off'),
(5, 'shawon', '2017-11-11', '2017-11-30', 'on'),
(6, 'shawon', '2017-12-01', '2017-12-12', 'off'),
(7, 'shawon10', '2017-08-30', '2017-09-09', 'off');

-- --------------------------------------------------------

--
-- Table structure for table `payment_info`
--

CREATE TABLE IF NOT EXISTS `payment_info` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `roll` varchar(8) NOT NULL,
  `hall` varchar(100) NOT NULL,
  `room` varchar(10) NOT NULL,
  `ammount` varchar(6) NOT NULL,
  `payment_by` varchar(50) NOT NULL,
  `tran_id` varchar(20) NOT NULL,
  `name` varchar(100) DEFAULT 'name'
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_info`
--

INSERT INTO `payment_info` (`id`, `date`, `time`, `roll`, `hall`, `room`, `ammount`, `payment_by`, `tran_id`, `name`) VALUES
(1, '2017-07-14', '03:20:42', 'test1', 'Shahid Abdul Hamid Hall', '001', '1025', 'Via Bank', '12364', 'name'),
(2, '2017-07-14', '03:23:56', 'test1', 'Shahid Abdul Hamid Hall', '001', '1025', 'Via Bank', '12364', 'name'),
(3, '2017-07-14', '03:25:57', 'test1', 'Shahid Abdul Hamid Hall', '001', '1025', 'Via Bank', '12364', 'name'),
(4, '2017-07-14', '03:26:23', 'rf', 'Bangabondhu Sheikh Mujibur Rahman Hall', 'ff', '3e', 'Bkash Mobile banking', 'cfx', 'name'),
(5, '2017-07-14', '03:32:22', 'dd', 'Shahid Lieutenant Salim hall', 'dgd', 'gdg', 'Bkash Mobile banking', 'dgdg', 'name'),
(6, '2017-07-14', '04:27:20', 'dd', 'Bangabondhu Sheikh Mujibur Rahman Hall', 'dfdf', '111', 'Via Bank', '132434', 'name'),
(7, '2017-07-14', '04:23:41', 'ewe', 'Bangabondhu Sheikh Mujibur Rahman Hall', 'rer', '111', 'Via Bank', 'er', 'name'),
(8, '2017-07-14', '04:24:02', 'wewe', 'Bangabondhu Sheikh Mujibur Rahman Hall', 'wrwrwew', 'ee', 'Via Bank', 'we', 'name'),
(9, '2017-07-14', '05:03:49', 'test', 'Bangabondhu Sheikh Mujibur Rahman Hall', '1265', '2123', 'Bkash Mobile banking', '545s545', 'name'),
(10, '2017-07-14', '05:06:42', 'test', 'Bangabondhu Sheikh Mujibur Rahman Hall', '1265', '2123', 'Bkash Mobile banking', '545s545', 'name'),
(11, '2017-07-14', '05:07:53', '22', 'Bangabondhu Sheikh Mujibur Rahman Hall', '2', '2123', 'Via Bank', '232323', 'name'),
(12, '2017-07-14', '05:42:14', '1503089', 'Shahid President Ziaur Rahman Hall', '111', '400', 'DBBL Mobile banking', '21598888', 'name'),
(13, '2017-07-14', '05:43:16', '1503085', 'Deshratna Sheikh Hasina Hall', '111', '1', 'Via Bank', '1', 'name'),
(14, '2017-07-15', '11:28:41', '1503089', 'Bangabondhu Sheikh Mujibur Rahman Hall', '121', '400', 'Bkash Mobile banking', '12354', 'name'),
(15, '2017-08-20', '05:54:44', '1503101', 'Bangabondhu Sheikh Mujibur Rahman Hall', '805', '100000', 'Bkash Mobile banking', 'TCKI845ASH', 'name'),
(16, '2017-08-27', '10:43:21', '133009', 'Shahid Lieutenant Salim hall', '334', '1000', 'Bkash Mobile banking', '2333', 'shawon'),
(17, '2017-08-28', '02:39:58', '133009', 'Shahid Lieutenant Salim hall', '334', '350', 'Via Bank', '235566', 'shawon'),
(18, '2017-08-28', '04:00:44', '133010', 'Shahid Lieutenant Salim hall', '222', '370', 'Via Bank', '34455', 'shawon10');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `trn_date` datetime NOT NULL,
  `photo` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `trn_date`, `photo`) VALUES
(1, 'Shuvo', 'shuvo@ruet.com', '81dc9bdb52d04dc20036dbd8313ed055', '2017-07-13 20:18:20', NULL),
(2, 'Shuvo', 'shuvo@ruet.com', '81dc9bdb52d04dc20036dbd8313ed055', '2017-07-13 22:17:46', NULL),
(3, 'Shuvo', 'shuvo@ruet.com', '07d0e40dff0ffcc610dbb5f3ed2b2414', '2017-07-14 00:02:28', NULL),
(4, 'mehedi', 'mehedi@ruet.com', '81dc9bdb52d04dc20036dbd8313ed055', '2017-07-14 13:20:43', NULL),
(5, 'Mehedi', 'mehedi@ruet.com', 'e10adc3949ba59abbe56e057f20f883e', '2017-07-14 13:24:15', NULL),
(6, 'Rahim', 'rahim@ruet.com', '81dc9bdb52d04dc20036dbd8313ed055', '2017-07-15 07:27:42', NULL),
(7, 'anonna', 'anonna@ruet.com', '81dc9bdb52d04dc20036dbd8313ed055', '2017-07-15 07:57:36', NULL),
(8, 'Nawmee', 'nawmee@ruet.com', '81dc9bdb52d04dc20036dbd8313ed055', '2017-08-20 09:42:22', NULL),
(9, 'Shuvo', 'rahim@ruet.com', '81dc9bdb52d04dc20036dbd8313ed055', '2017-08-20 13:33:39', NULL),
(10, 'Rahim', 'srahim@ruet.com', 'e10adc3949ba59abbe56e057f20f883e', '2017-08-20 13:35:16', NULL),
(11, 'Karim', 'karim@ruet.com', '858915f1d2d425959fd4da867ba6b599', '2017-08-20 13:36:05', NULL),
(12, 'Nayeem', 'nayeem.ruet.cse@gmail.com', 'fc3f318fba8b3c1502bece62a27712df', '2017-08-20 13:53:18', NULL),
(13, 'shawon', 'shawonashadullah@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2017-08-27 18:34:46', NULL),
(16, 'shawon10', 'shawon10@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2017-08-28 11:45:12', 'images/11244901_656728847792002_4129954970845423763_n.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `meal`
--
ALTER TABLE `meal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_info`
--
ALTER TABLE `payment_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `meal`
--
ALTER TABLE `meal`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `payment_info`
--
ALTER TABLE `payment_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
