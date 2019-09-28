-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 28, 2019 at 08:42 PM
-- Server version: 10.2.3-MariaDB-log
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lastdirv_lokerja`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `ads_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `show` enum('sidebar','content','front','bottom') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id_setting` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `tag_line` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `tag_manager` varchar(255) DEFAULT NULL,
  `adsense` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `td_lowongan`
--

CREATE TABLE `td_lowongan` (
  `id_lowongan` int(11) NOT NULL,
  `judul` varchar(500) NOT NULL DEFAULT '0',
  `long_desc` text NOT NULL,
  `short_desc` text NOT NULL,
  `gambaran_pers` text NOT NULL,
  `tentang_pers` text NOT NULL,
  `mengapa` text NOT NULL,
  `logo` text NOT NULL,
  `kategori` varchar(100) NOT NULL DEFAULT '0',
  `kategori_parent` varchar(100) NOT NULL DEFAULT '0',
  `industri` varchar(100) NOT NULL DEFAULT '0',
  `lokasi` varchar(100) NOT NULL DEFAULT '0',
  `perusahaan` varchar(100) NOT NULL DEFAULT '0',
  `dibuka` varchar(50) NOT NULL DEFAULT '0',
  `ditutup` varchar(50) NOT NULL DEFAULT '0',
  `date_tutup` date DEFAULT NULL,
  `date_buka` date DEFAULT NULL,
  `url` varchar(500) NOT NULL DEFAULT '0',
  `alamat` varchar(500) NOT NULL DEFAULT '0',
  `permalink` varchar(500) NOT NULL DEFAULT '0',
  `kota` varchar(255) NOT NULL,
  `status` enum('active','expired') NOT NULL DEFAULT 'active'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` varchar(32) NOT NULL,
  `id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(200) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `email` varchar(254) DEFAULT NULL,
  `level_id` int(11) DEFAULT NULL,
  `level_name` varchar(255) DEFAULT NULL,
  `wallPaper` varchar(45) DEFAULT 'Desk',
  `theme` varchar(45) DEFAULT 'blue',
  `wpStretch` tinyint(1) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `param01` varchar(255) DEFAULT NULL,
  `param02` varchar(255) DEFAULT NULL,
  `param03` varchar(255) DEFAULT NULL,
  `param04` varchar(255) DEFAULT NULL,
  `param05` varchar(255) DEFAULT NULL,
  `param06` varchar(255) DEFAULT NULL,
  `param07` varchar(255) DEFAULT NULL,
  `param08` varchar(255) DEFAULT NULL,
  `param09` varchar(255) DEFAULT NULL,
  `param10` varchar(255) DEFAULT NULL,
  `isadmin` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`ads_id`);

--
-- Indexes for table `td_lowongan`
--
ALTER TABLE `td_lowongan`
  ADD PRIMARY KEY (`id_lowongan`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `ads_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `td_lowongan`
--
ALTER TABLE `td_lowongan`
  MODIFY `id_lowongan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
