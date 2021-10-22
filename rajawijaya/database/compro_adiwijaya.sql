-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 14, 2021 at 10:04 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `compro_adiwijaya`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `nama_admin` varchar(128) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `telp` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `foto_admin` text NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `company_profile`
--

DROP TABLE IF EXISTS `company_profile`;
CREATE TABLE IF NOT EXISTS `company_profile` (
  `id_company` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(128) NOT NULL,
  `address` text NOT NULL,
  `telp` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `logo` text NOT NULL,
  `sejarah` text NOT NULL,
  `visi` text NOT NULL,
  `misi` text NOT NULL,
  PRIMARY KEY (`id_company`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `company_profile`
--

INSERT INTO `company_profile` (`id_company`, `company_name`, `address`, `telp`, `email`, `logo`, `sejarah`, `visi`, `misi`) VALUES
(1, 'Raja Wijaya Cirebon', 'Cirebon', '082121884879', 'rajawijaya@gmail.com', 'rjw-logo-01.png', 'RAJA WIJAYA CIREBON adalah perusahaan yang Berdiri pada Tahun 2019.  Raja wijaya Cirebon merupakan perusahaan swasta yang bergerak dibidang Pemborong, Sipil, Perdagangan Umum, dan kontraktor, khususnya bidang pembangunan sarana dan prasarana jaringan kabel telekomunikasi maupun pemeliharaannya. Berdiri pada Tahun 2019 ', 'Mampu menjadi Perusahaan yang berkontribusi bagi anggota , negara dan masyarakat Indonesia.', '1. Komitmen dalam kualitas dan layanan terhadap pelanggan. <br>2. Memiliki kinerja yang baik dan menyediakan SDM yang handal dan peralatan kerja yang memadai sesuai persyaratan');

-- --------------------------------------------------------

--
-- Table structure for table `galery_kegiatan`
--

DROP TABLE IF EXISTS `galery_kegiatan`;
CREATE TABLE IF NOT EXISTS `galery_kegiatan` (
  `id_galery_kegiatan` int(11) NOT NULL AUTO_INCREMENT,
  `id_kegiatan` int(11) NOT NULL,
  `foto` text NOT NULL,
  PRIMARY KEY (`id_galery_kegiatan`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `galery_kegiatan`
--

INSERT INTO `galery_kegiatan` (`id_galery_kegiatan`, `id_kegiatan`, `foto`) VALUES
(1, 1, '1.jpg'),
(2, 1, '2.jpg'),
(3, 1, '3.jpg'),
(4, 2, '4.jpg'),
(5, 2, '5.jpg'),
(6, 2, '6.jpg'),
(7, 2, '7.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

DROP TABLE IF EXISTS `kegiatan`;
CREATE TABLE IF NOT EXISTS `kegiatan` (
  `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kegiatan` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `tanggal` date NOT NULL,
  PRIMARY KEY (`id_kegiatan`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`id_kegiatan`, `nama_kegiatan`, `keterangan`, `tanggal`) VALUES
(1, 'Galian Telkom', 'Project Galian Telkom Segmen Cirebon - Majalengka Ring 9', '2021-07-01'),
(2, 'Tanam tiang 7m', 'Project Telkom Segmen Cirebon - Indramayu Ring 9', '2021-08-01');

-- --------------------------------------------------------

--
-- Table structure for table `mitra`
--

DROP TABLE IF EXISTS `mitra`;
CREATE TABLE IF NOT EXISTS `mitra` (
  `id_mitra` int(11) NOT NULL AUTO_INCREMENT,
  `mitra` varchar(128) NOT NULL,
  `logo` text NOT NULL,
  PRIMARY KEY (`id_mitra`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mitra`
--

INSERT INTO `mitra` (`id_mitra`, `mitra`, `logo`) VALUES
(1, 'PT. Telkom Indonesia TBK', 'telkom.png'),
(2, 'PT. Trias Mitra', 'ims.jpg'),
(3, 'PT. Inti Bangun Sejahtera', 'ibs.png'),
(4, 'PT. Indosat M2', 'im2.png');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
CREATE TABLE IF NOT EXISTS `services` (
  `id_service` int(11) NOT NULL AUTO_INCREMENT,
  `service` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id_service`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id_service`, `service`, `keterangan`) VALUES
(1, 'Pemborong', 'Memborong Proyek untuk dilaksanakan secara lapangan'),
(2, 'Sipil', 'Mengerjakan proyek bangunan'),
(3, 'Perdagangan Umum', 'Mengerjakan perdagangan umum dan memasuki pasar tradisional yang terletak di cirebon'),
(4, 'kontraktor', 'Kami juga menjadi pihak kontraktor kepada pihak pemberi kerja');

-- --------------------------------------------------------

--
-- Table structure for table `socmed`
--

DROP TABLE IF EXISTS `socmed`;
CREATE TABLE IF NOT EXISTS `socmed` (
  `id_socmed` int(11) NOT NULL AUTO_INCREMENT,
  `instagram` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_socmed`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `socmed`
--

INSERT INTO `socmed` (`id_socmed`, `instagram`, `facebook`, `twitter`) VALUES
(1, 'rajawijaya_crb', '', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
