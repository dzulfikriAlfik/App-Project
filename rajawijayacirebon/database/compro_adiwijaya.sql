-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 22, 2021 at 10:01 AM
-- Server version: 10.3.31-MariaDB-cll-lve
-- PHP Version: 7.3.30

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

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(128) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `telp` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `username`, `password`, `alamat`, `telp`, `email`) VALUES
(1, 'Super Admin', 'admin', '$2y$10$mVkQ1k2kgVvRI4005QqFgu6Dxdiz/V1R5azkCWxdhgDF1ZdYlPLeK', 'Cirebon', '089676444980', 'superadmin@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id_chat` int(11) NOT NULL,
  `id_mitra` int(11) NOT NULL,
  `chat` text NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id_chat`, `id_mitra`, `chat`, `tanggal`) VALUES
(1, 9, 'Test yang mengirim pesan ini adalah mitra 1', '2021-10-21 00:00:00'),
(2, 10, 'Test dikirim dari mitra 2', '2021-10-21 00:00:00'),
(3, 12, 'test dari mitra 3', '2021-10-21 22:07:02'),
(4, 10, 'test kirim pesan ke database, apakah work?', '2021-10-21 16:18:20'),
(5, 9, 'test mengirim pesan lagi ke database, ini melalui form ', '2021-10-21 16:19:06'),
(7, 10, 'Test', '2021-10-21 23:26:47'),
(8, 10, 'Admin : Test mengirim pesan dari admin', '2021-10-21 23:40:32'),
(9, 10, 'makasih masukannya admin', '2021-10-21 23:56:05'),
(10, 14, 'Test, wahai admin yang budiman saya ngetest fitur chat.\r\noke cuk?', '2021-10-22 05:51:37'),
(11, 14, 'Admin : siap cuk, saya pun ingin ngetest.\r\nbango', '2021-10-22 05:52:16');

-- --------------------------------------------------------

--
-- Table structure for table `company_profile`
--

CREATE TABLE `company_profile` (
  `id_company` int(11) NOT NULL,
  `company_name` varchar(128) NOT NULL,
  `address` text NOT NULL,
  `telp` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `logo` text NOT NULL,
  `sejarah` text NOT NULL,
  `visi` text NOT NULL,
  `misi` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `company_profile`
--

INSERT INTO `company_profile` (`id_company`, `company_name`, `address`, `telp`, `email`, `logo`, `sejarah`, `visi`, `misi`) VALUES
(1, 'Raja Wijaya Cirebon', 'Cirebon, Sunyaragi, Kesambi, Cirebon City, West Java 45131', '082260067171', 'rajawijayacrb31@gmail.com', '616f838de8360.png', 'RAJA WIJAYA CIREBON adalah perusahaan yang Berdiri pada Tahun 2016.  Raja wijaya Cirebon merupakan perusahaan swasta yang bergerak dibidang Pemborong, Sipil, Perdagangan Umum, dan kontraktor, khususnya bidang pembangunan sarana dan prasarana jaringan kabel telekomunikasi maupun pemeliharaannya. Berdiri pada Tahun 2016 ', 'Mampu menjadi Perusahaan yang berkontribusi bagi anggota , negara dan masyarakat Indonesia.', '1. Komitmen dalam kualitas dan layanan terhadap pelanggan. <br>2. Memiliki kinerja yang baik dan menyediakan SDM yang handal dan peralatan kerja yang memadai sesuai persyaratan');

-- --------------------------------------------------------

--
-- Table structure for table `galery_kegiatan`
--

CREATE TABLE `galery_kegiatan` (
  `id_galery_kegiatan` int(11) NOT NULL,
  `id_kegiatan` int(11) NOT NULL,
  `foto` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id_kegiatan` int(11) NOT NULL,
  `nama_kegiatan` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mitra`
--

CREATE TABLE `mitra` (
  `id_mitra` int(11) NOT NULL,
  `mitra` varchar(128) NOT NULL,
  `logo` text NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(128) NOT NULL,
  `telp` varchar(128) NOT NULL,
  `approve` enum('yes','no') NOT NULL,
  `status` varchar(10) NOT NULL,
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id_service` int(11) NOT NULL,
  `service` varchar(255) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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

CREATE TABLE `socmed` (
  `id_socmed` int(11) NOT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `socmed`
--

INSERT INTO `socmed` (`id_socmed`, `instagram`, `facebook`, `twitter`) VALUES
(1, 'rajawijaya_crb', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id_chat`);

--
-- Indexes for table `company_profile`
--
ALTER TABLE `company_profile`
  ADD PRIMARY KEY (`id_company`);

--
-- Indexes for table `galery_kegiatan`
--
ALTER TABLE `galery_kegiatan`
  ADD PRIMARY KEY (`id_galery_kegiatan`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`);

--
-- Indexes for table `mitra`
--
ALTER TABLE `mitra`
  ADD PRIMARY KEY (`id_mitra`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id_service`);

--
-- Indexes for table `socmed`
--
ALTER TABLE `socmed`
  ADD PRIMARY KEY (`id_socmed`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id_chat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `company_profile`
--
ALTER TABLE `company_profile`
  MODIFY `id_company` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `galery_kegiatan`
--
ALTER TABLE `galery_kegiatan`
  MODIFY `id_galery_kegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `mitra`
--
ALTER TABLE `mitra`
  MODIFY `id_mitra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id_service` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `socmed`
--
ALTER TABLE `socmed`
  MODIFY `id_socmed` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
