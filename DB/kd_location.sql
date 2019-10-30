-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               10.2.3-MariaDB-log - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table lastdirv_lokerja.kd_location
CREATE TABLE IF NOT EXISTS `kd_location` (
  `id_location` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `kode` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_location`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

-- Dumping data for table lastdirv_lokerja.kd_location: ~33 rows (approximately)
/*!40000 ALTER TABLE `kd_location` DISABLE KEYS */;
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
/*!40000 ALTER TABLE `kd_location` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
