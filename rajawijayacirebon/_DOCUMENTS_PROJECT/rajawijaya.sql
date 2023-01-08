-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 08, 2023 at 02:06 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rajawijaya`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

DROP TABLE IF EXISTS `chat`;
CREATE TABLE IF NOT EXISTS `chat` (
  `id_chat` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_admin` int(11) DEFAULT NULL,
  `id_mitra` int(11) NOT NULL,
  `chat` text NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_chat`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id_chat`, `id_admin`, `id_mitra`, `chat`, `tanggal`) VALUES
(14, 1, 18, 'test', '2023-01-08 20:00:55'),
(15, 1, 18, 'testing maning', '2023-01-08 20:01:03'),
(19, 1, 17, 'test', '2023-01-08 20:31:42'),
(22, NULL, 18, 'mnc', '2023-01-08 20:57:04'),
(23, NULL, 17, 'admin kontol', '2023-01-08 21:05:57');

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
  `instagram` varchar(128) DEFAULT NULL,
  `facebook` varchar(128) DEFAULT NULL,
  `twitter` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id_company`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `company_profile`
--

INSERT INTO `company_profile` (`id_company`, `company_name`, `address`, `telp`, `email`, `logo`, `sejarah`, `visi`, `misi`, `instagram`, `facebook`, `twitter`) VALUES
(1, 'Raja Wijaya Cirebon', 'Cirebon, Sunyaragi, Kesambi, Cirebon City, West Java 45131', '082260067171', 'rajawijayacrb31@gmail.com', '63ba5afdd1bca.png', 'RAJA WIJAYA CIREBON adalah perusahaan yang Berdiri pada Tahun 2016.  Raja wijaya Cirebon merupakan perusahaan swasta yang bergerak dibidang Pemborong, Sipil, Perdagangan Umum, dan kontraktor, khususnya bidang pembangunan sarana dan prasarana jaringan kabel telekomunikasi maupun pemeliharaannya. Berdiri pada Tahun 2016', 'Mampu menjadi Perusahaan yang berkontribusi bagi anggota , negara dan masyarakat Indonesia.', '1. Komitmen dalam kualitas dan layanan terhadap pelanggan. <br>2. Memiliki kinerja yang baik dan menyediakan SDM yang handal dan peralatan kerja yang memadai sesuai persyaratan', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

DROP TABLE IF EXISTS `gallery`;
CREATE TABLE IF NOT EXISTS `gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kegiatan` varchar(128) NOT NULL,
  `keterangan` text NOT NULL,
  `tanggal` date NOT NULL,
  `foto` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `nama_kegiatan`, `keterangan`, `tanggal`, `foto`) VALUES
(27, 'nama kegiatan', 'Ini adalah kegiatan yang sangat panjang kalimatnya, saya seharusnya menyusu kalimat yang sangat panjang agar bisa terlihat bagaimana respon text pada style di card dan di halaman utama', '2022-12-31', '1673176868.jpg'),
(28, 'Bermain', 'Kegiatan Bermainadalah kegiatan yang sangat enak sekali, apalagi ketika kepala mengeluarkan benih kenikmatan didalam fikiran seorang wanita yang sangat harum dan cantik', '2023-01-02', '1673177351.jpg');

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
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(128) NOT NULL,
  `role` varchar(128) NOT NULL DEFAULT 'mitra',
  `username` varchar(128) NOT NULL,
  `password` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `telp` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `logo_mitra` varchar(255) DEFAULT NULL,
  `status_mitra` varchar(128) DEFAULT NULL,
  `created_by` varchar(128) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `role`, `username`, `password`, `alamat`, `telp`, `email`, `logo_mitra`, `status_mitra`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'admin', 'admin', '$2y$10$mVkQ1k2kgVvRI4005QqFgu6Dxdiz/V1R5azkCWxdhgDF1ZdYlPLeK', 'Cirebon', '089676444980', 'superadmin@gmail.com', NULL, NULL, NULL, '2023-01-07 21:40:45', '2023-01-07 21:40:56'),
(13, 'Dzulfikri Alfik', 'admin', 'dzulfikri', '$2y$10$FamlhCEC9P2aZbjPqCrON.ZZgQf6Lj/8wlw44NrCh3L4DzL6/cn3a', 'Cikijing, Majalengka Selatan', '082121884879', 'dzulfikrialfik@gmail.com', NULL, NULL, NULL, '2023-01-08 11:08:43', '2023-01-08 12:09:58'),
(18, 'PT. MNC', 'mitra', 'mncmnc', '$2y$10$fmbRB75c0hBDROPsgEoEjuhF3t3lRK.zt6pn1EAG3kUx0AQ.VokIO', 'Bandung', '09182734', 'mnc@gmail.com', '1673171405.jpg', 'active', NULL, '2023-01-08 16:50:05', '2023-01-08 17:00:32'),
(17, 'PT. Dasena Prima', 'mitra', 'dasena', '$2y$10$WxurZNjMmA9TVqnPkGayBeqSbpMbyIw0oNawqveq88g2/O8FJriXe', 'Bandung', '1234', 'dasena@gmail.com', '1673168110.png', 'active', NULL, '2023-01-08 15:55:10', '2023-01-08 15:55:10');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
