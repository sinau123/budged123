-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2016 at 09:42 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pengeluaran`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail`
--

CREATE TABLE IF NOT EXISTS `detail` (
  `id` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `jenis` varchar(25) NOT NULL,
  `jml` int(11) NOT NULL,
  `data_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `hidden` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1:tampil;2:hidden'
) ENGINE=MyISAM AUTO_INCREMENT=92 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail`
--

INSERT INTO `detail` (`id`, `tgl`, `jenis`, `jml`, `data_time`, `hidden`) VALUES
(1, '2015-10-12', 'Sarapan', 5000, '2015-10-13 23:31:49', 1),
(2, '2015-10-12', 'Makan Siang', 6000, '2015-10-13 23:31:49', 1),
(21, '2015-10-13', 'Beli Semangka', 13000, '2015-10-13 23:31:49', 1),
(20, '2015-10-13', 'bensin', 8000, '2015-10-13 23:31:49', 1),
(19, '2015-10-13', 'Belanja', 37000, '2015-10-13 23:31:49', 1),
(18, '2015-10-13', 'Makan Malam', 30000, '2015-10-13 23:31:49', 1),
(17, '2015-10-13', 'Makan Siang', 6000, '2015-10-13 23:31:49', 1),
(16, '2015-10-13', 'Sarapan', 5000, '2015-10-13 23:31:49', 1),
(15, '2015-10-12', 'Makan Malam', 10000, '2015-10-13 23:31:49', 1),
(26, '2015-10-14', 'Beli magiccom', 336000, '2016-01-04 07:24:18', 1),
(31, '2015-10-14', 'Bayar listrik', 35000, '2015-10-14 11:52:22', 1),
(30, '2015-10-13', 'tes', 120000, '2015-10-14 09:24:19', 2),
(32, '2015-10-15', 'sfs', 325345346, '2015-10-14 13:14:47', 2),
(33, '2015-10-15', 'erter', 34333, '2015-10-14 13:14:49', 2),
(34, '2015-10-14', 'makan', 12000, '2015-10-14 14:12:13', 1),
(35, '2015-10-14', 'jajan', 14000, '2015-10-14 15:09:08', 1),
(36, '2015-10-15', 'makan siang', 9000, '2015-10-15 10:02:21', 1),
(37, '2015-10-15', 'makan malam', 4500, '2015-10-15 22:16:40', 1),
(38, '2015-10-17', 'makan pagi', 3000, '2015-10-15 23:06:45', 2),
(39, '2015-10-31', 'grgrgg', 100000, '2015-10-15 23:17:57', 2),
(40, '2015-10-19', 'makan siang', 5000, '2015-10-19 23:00:23', 1),
(41, '2015-10-18', 'bensin', 20000, '2015-10-19 23:00:39', 1),
(42, '2015-10-16', 'makan pagi', 3000, '2015-10-19 23:01:32', 1),
(43, '2015-10-16', 'makan siang', 10500, '2015-10-19 23:01:46', 1),
(44, '2015-10-16', 'makan malam', 10000, '2015-10-19 23:01:55', 1),
(45, '2015-10-17', 'makan pagi', 14000, '2015-10-19 23:02:37', 1),
(46, '2015-10-17', 'makan siang', 10500, '2015-10-19 23:02:46', 1),
(47, '2015-10-17', 'bensin', 20000, '2015-10-19 23:02:55', 1),
(48, '2015-10-17', 'pulsa', 12000, '2015-10-19 23:05:18', 1),
(49, '2015-10-20', 'makan siang', 5000, '2015-10-22 12:12:28', 1),
(50, '2015-10-21', 'sarapan', 3000, '2015-10-22 12:13:02', 1),
(51, '2015-10-21', 'makan siang', 5000, '2015-10-22 12:13:14', 1),
(52, '2015-10-21', 'makan malam', 10000, '2015-10-22 12:13:30', 1),
(53, '2015-10-22', 'makan siang', 5000, '2015-10-22 12:13:47', 1),
(54, '2015-10-22', 'makan malam', 12000, '2015-10-22 12:13:55', 1),
(55, '2015-10-23', 'makan pagi', 4000, '2015-10-24 05:42:58', 1),
(56, '2015-10-23', 'makan siang', 7000, '2015-10-24 05:42:21', 1),
(57, '2015-10-23', 'makan malam', 10000, '2015-10-24 05:42:58', 1),
(58, '2015-10-23', 'pulsa', 12000, '2015-10-24 05:42:58', 1),
(59, '2015-10-24', 'makan pagi', 4000, '2015-10-25 11:03:19', 1),
(60, '2015-10-24', 'semangka', 18000, '2015-10-25 11:03:33', 1),
(61, '2015-10-24', 'galon', 16000, '2015-10-25 11:03:48', 1),
(62, '2015-10-24', 'makan malam', 5000, '2015-10-25 11:04:49', 2),
(63, '2015-10-24', 'makan malam', 5000, '2015-10-25 11:04:50', 2),
(64, '2015-10-24', 'makan malam', 5000, '2015-10-25 11:04:51', 2),
(65, '2015-10-24', 'makan malam', 5000, '2015-10-25 11:04:51', 2),
(66, '2015-10-24', 'makan malam', 5000, '2015-10-25 11:04:52', 2),
(67, '2015-10-24', 'makan malam', 5000, '2015-10-25 11:04:29', 1),
(68, '2015-10-25', 'makan pagi', 4000, '2015-10-25 11:06:16', 1),
(69, '2015-10-25', 'beli mouse', 15000, '2015-10-26 14:50:06', 1),
(70, '2015-10-25', 'makan malam', 11000, '2015-10-26 14:50:30', 1),
(71, '2015-10-26', 'makan malam', 13000, '2015-10-26 14:50:44', 1),
(72, '2015-10-26', 'makan siang', 11000, '2015-10-26 14:50:55', 1),
(73, '2015-10-26', 'makan pagi', 7000, '2015-10-26 14:51:07', 1),
(74, '2015-10-27', 'Makan siang', 6000, '2015-10-27 23:29:34', 1),
(75, '2015-10-27', 'Makan malam', 9000, '2015-10-27 23:29:43', 1),
(76, '2015-10-28', 'belanja', 12000, '2015-10-27 23:30:26', 2),
(77, '2015-10-27', 'belanja', 12000, '2015-10-27 23:30:54', 1),
(78, '2015-10-28', 'makan siang', 6000, '2015-10-28 23:01:11', 1),
(79, '2015-10-28', 'makan malam', 12000, '2015-10-28 23:01:20', 1),
(80, '2015-10-29', 'Makan siang', 7000, '2015-10-30 00:02:06', 1),
(81, '2015-10-29', 'Makan malam', 12000, '2015-10-30 00:02:14', 1),
(82, '2015-10-30', 'makan siang', 11000, '2015-10-30 14:06:08', 1),
(83, '2015-10-30', 'makan malam', 27000, '2015-10-30 14:06:28', 1),
(84, '2015-10-30', 'beli mouse', 35000, '2015-10-30 14:06:40', 1),
(85, '2015-10-30', 'beli mouse', 35000, '2015-10-30 14:06:52', 2),
(86, '2015-10-31', 'makan siang', 9000, '2015-11-03 03:41:34', 1),
(87, '2015-10-31', 'makan malam', 12000, '2015-11-03 03:41:53', 1),
(88, '2015-11-01', 'bensin', 20000, '2015-11-03 03:42:24', 1),
(89, '2015-11-02', 'sarapan', 9000, '2015-11-03 03:42:45', 1),
(90, '2015-11-02', 'makan siang', 6000, '2015-11-03 03:42:58', 1),
(91, '2015-11-02', 'makan malams', 10000, '2016-01-04 06:44:36', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail`
--
ALTER TABLE `detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail`
--
ALTER TABLE `detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=92;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
