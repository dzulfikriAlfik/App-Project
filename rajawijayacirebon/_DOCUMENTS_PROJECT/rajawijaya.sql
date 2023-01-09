-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 09, 2023 at 01:40 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

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

CREATE TABLE `chat` (
  `id_chat` bigint(20) NOT NULL,
  `id_admin` int(11) DEFAULT NULL,
  `id_mitra` int(11) NOT NULL,
  `chat` text NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id_chat`, `id_admin`, `id_mitra`, `chat`, `tanggal`) VALUES
(22, NULL, 18, 'mnc', '2023-01-08 20:57:04');

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
  `misi` text NOT NULL,
  `instagram` varchar(128) DEFAULT NULL,
  `facebook` varchar(128) DEFAULT NULL,
  `twitter` varchar(128) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `company_profile`
--

INSERT INTO `company_profile` (`id_company`, `company_name`, `address`, `telp`, `email`, `logo`, `sejarah`, `visi`, `misi`, `instagram`, `facebook`, `twitter`) VALUES
(1, 'Raja Wijaya Cirebon', 'Cirebon, Sunyaragi, Kesambi, Cirebon City, West Java 45131', '082260067171', 'rajawijayacrb31@gmail.com', '63bad0f92e311.png', 'RAJA WIJAYA CIREBON adalah perusahaan yang Berdiri pada Tahun 2016.  Raja wijaya Cirebon merupakan perusahaan swasta yang bergerak dibidang Pemborong, Sipil, Perdagangan Umum, dan kontraktor, khususnya bidang pembangunan sarana dan prasarana jaringan kabel telekomunikasi maupun pemeliharaannya. Berdiri pada Tahun 2016', 'Mampu menjadi Perusahaan yang berkontribusi bagi anggota , negara dan masyarakat Indonesia.', '1. Komitmen dalam kualitas dan layanan terhadap pelanggan. <br>2. Memiliki kinerja yang baik dan menyediakan SDM yang handal dan peralatan kerja yang memadai sesuai persyaratan', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `nama_kegiatan` varchar(128) NOT NULL,
  `keterangan` text NOT NULL,
  `tanggal` date NOT NULL,
  `foto` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `nama_kegiatan`, `keterangan`, `tanggal`, `foto`) VALUES
(27, 'nama kegiatan', 'Ini adalah kegiatan yang sangat panjang kalimatnya, saya seharusnya menyusu kalimat yang sangat panjang agar bisa terlihat bagaimana respon text pada style di card dan di halaman utama', '2022-02-01', '1673176868.jpg');

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
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
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `role`, `username`, `password`, `alamat`, `telp`, `email`, `logo_mitra`, `status_mitra`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'admin', 'admin', '$2y$10$mVkQ1k2kgVvRI4005QqFgu6Dxdiz/V1R5azkCWxdhgDF1ZdYlPLeK', 'Cirebon', '089676444980', 'superadmin@gmail.com', NULL, NULL, NULL, '2023-01-07 21:40:45', '2023-01-07 21:40:56'),
(13, 'Dzulfikri Alfik', 'admin', 'dzulfikri', '$2y$10$FamlhCEC9P2aZbjPqCrON.ZZgQf6Lj/8wlw44NrCh3L4DzL6/cn3a', 'Cikijing, Majalengka Selatan', '082121884879', 'dzulfikrialfik@gmail.com', NULL, NULL, NULL, '2023-01-08 11:08:43', '2023-01-08 12:09:58'),
(18, 'PT. MNC', 'mitra', 'mncmnc', '$2y$10$fmbRB75c0hBDROPsgEoEjuhF3t3lRK.zt6pn1EAG3kUx0AQ.VokIO', 'Bandung', '09182734', 'mnc@gmail.com', '1673171405.jpg', 'active', NULL, '2023-01-08 16:50:05', '2023-01-08 17:00:32'),
(17, 'PT. Dasena Prima', 'mitra', 'dasena', '$2y$10$WxurZNjMmA9TVqnPkGayBeqSbpMbyIw0oNawqveq88g2/O8FJriXe', 'Bandung', '1234', 'dasena@gmail.com', '1673168110.png', 'active', NULL, '2023-01-08 15:55:10', '2023-01-08 15:55:10');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id_service`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id_chat` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `company_profile`
--
ALTER TABLE `company_profile`
  MODIFY `id_company` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id_service` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
