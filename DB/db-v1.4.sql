-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 04, 2020 at 01:54 PM
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
  `fullname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `fullname`, `email`, `password`) VALUES
(1, 'Administrator', '0xd3vs.id@gmail.com', '62b80d2828397d9a5a3145879413765f'),
(2, 'Irwan Antonio', 'irwan@gmail.com', 'b783bbcb3eff7cfaac147220ba7f9c25');

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `ads_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `source_code` text DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `show_in` enum('sidebar','front','job','detail-top','detail-bottom') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`ads_id`, `name`, `source_code`, `description`, `show_in`) VALUES
(1, 'Iklan Adsense', 'Test', 'Test', 'sidebar'),
(2, NULL, NULL, NULL, 'front'),
(3, NULL, NULL, NULL, 'job'),
(4, NULL, NULL, NULL, 'detail-top'),
(5, NULL, '<script></script>', NULL, 'detail-bottom');

-- --------------------------------------------------------

--
-- Table structure for table `kd_location`
--

CREATE TABLE `kd_location` (
  `id_location` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `kode` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kd_location`
--

INSERT INTO `kd_location` (`id_location`, `name`, `kode`) VALUES
(1, 'Bali', '30200'),
(2, 'Bangka Belitung', '32800'),
(3, 'Banten', '32900'),
(4, 'Bengkulu', '30300'),
(5, 'Gorontalo', '33000'),
(8, 'Jakarta Raya', '30500'),
(9, 'Jambi', '30600'),
(10, 'Jawa Barat', '30700'),
(11, 'Jawa Tengah', '30800'),
(12, 'Jawa Timur', '30900'),
(13, 'Kalimantan Barat', '31000'),
(14, 'Kalimantan Selatan', '31100'),
(15, 'Kalimantan Tengah', '31200'),
(16, 'Kalimantan Timur', '31300'),
(17, 'Kalimantan Utara', '33500'),
(18, 'Kepulauan Riau', '33200'),
(19, 'Lampung', '31400'),
(20, 'Maluku', '31500'),
(21, 'Maluku Utara', '33100'),
(22, 'Nusa Tenggara Barat', '31600'),
(23, 'Nusa Tenggara Timur', '31700'),
(24, 'Papua', '30400'),
(25, 'Papua Barat', '33300'),
(26, 'Riau', '31800'),
(27, 'Sulawesi Barat', '33400'),
(28, 'Sulawesi Selatan', '31900'),
(29, 'Sulawesi Tengah', '32000'),
(30, 'Sulawesi Tenggara', '32100'),
(31, 'Sulawesi Utara', '32200'),
(32, 'Sumatera Barat', '32300'),
(33, 'Sumatera Selatan', '32400'),
(34, 'Sumatera Utara', '32500'),
(35, 'Yogyakarta', '32700');

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE `page` (
  `id_page` int(11) NOT NULL,
  `type` enum('about','faq','contact','privacy-policy') DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`id_page`, `type`, `title`, `content`, `updated_at`) VALUES
(1, 'about', 'Tentang Lowongankerja.id', '<p><span style=\"font-family: Tahoma;\">ï»¿<b>LowonganKerja.id </b>adalah lorem ipsum</span><br></p>', '2020-01-07'),
(2, 'faq', 'FAQ', '<h1>FAQ<br></h1>', '2020-01-06'),
(3, 'contact', NULL, NULL, '2020-01-06'),
(4, 'privacy-policy', NULL, NULL, '2020-01-06');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id_setting` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `base_url` varchar(255) DEFAULT NULL,
  `tag_line` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `tag_manager` varchar(255) DEFAULT NULL,
  `adsense` varchar(255) DEFAULT NULL,
  `kd_location` varchar(255) DEFAULT NULL,
  `auto_grab` enum('on','off') DEFAULT 'on'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id_setting`, `title`, `base_url`, `tag_line`, `description`, `keywords`, `tag_manager`, `adsense`, `kd_location`, `auto_grab`) VALUES
(1, 'Lowongan-kerja.id', 'http://job-fix.ant/', 'Situs Lowongan Kerja Terpercaya', '<meta>', '<meta>', '<script></script>', '<script></script>', '32700', 'off');

-- --------------------------------------------------------

--
-- Table structure for table `td_lowongan`
--

CREATE TABLE `td_lowongan` (
  `id_lowongan` int(11) NOT NULL,
  `judul` varchar(500) DEFAULT '0',
  `long_desc` text DEFAULT NULL,
  `gambaran_pers` text DEFAULT NULL,
  `tentang_pers` text DEFAULT NULL,
  `mengapa` text DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `kategori` varchar(255) DEFAULT '0',
  `industri` varchar(255) DEFAULT '0',
  `lokasi` varchar(255) DEFAULT '0',
  `kota` varchar(255) DEFAULT NULL,
  `perusahaan` varchar(255) DEFAULT '0',
  `alamat` text DEFAULT '0',
  `url` varchar(255) DEFAULT '0',
  `permalink` varchar(255) DEFAULT '0',
  `date_buka` date DEFAULT NULL,
  `date_tutup` date DEFAULT NULL,
  `status` enum('active','expired') DEFAULT 'active'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
-- Indexes for table `kd_location`
--
ALTER TABLE `kd_location`
  ADD PRIMARY KEY (`id_location`);

--
-- Indexes for table `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id_page`);

--
-- Indexes for table `td_lowongan`
--
ALTER TABLE `td_lowongan`
  ADD PRIMARY KEY (`id_lowongan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `ads_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kd_location`
--
ALTER TABLE `kd_location`
  MODIFY `id_location` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `page`
--
ALTER TABLE `page`
  MODIFY `id_page` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `td_lowongan`
--
ALTER TABLE `td_lowongan`
  MODIFY `id_lowongan` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
