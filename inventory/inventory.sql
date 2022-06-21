-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 21, 2022 at 02:39 PM
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
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

DROP TABLE IF EXISTS `pembelian`;
CREATE TABLE IF NOT EXISTS `pembelian` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tanggal_po` datetime NOT NULL,
  `no_po` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_barang` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_barang` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `satuan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty_beli` int(11) NOT NULL,
  `qty_sisa` int(11) NOT NULL,
  `harga_satuan` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id`, `tanggal_po`, `no_po`, `supplier_name`, `kode_barang`, `nama_barang`, `satuan`, `qty_beli`, `qty_sisa`, `harga_satuan`, `created_at`, `updated_at`) VALUES
(1, '2022-06-23 00:00:00', 'PO-001', 'Toko Komputer Aceng', 'sp-laptop-01', 'Spare Part Laptop', 'Pcs', 110, 10, 50000, '2022-06-19 06:10:32', '2022-06-21 06:06:40'),
(2, '2022-06-30 00:00:00', 'PO-002', 'Mall Mangga Dua AD5', 'pelindung-hp', 'Pelindung Handphone', 'Pcs', 30, 0, 20000, '2022-06-20 05:45:59', '2022-06-20 07:29:35'),
(3, '2022-06-20 00:00:00', 'PO-003', 'Toko Aksesoris PC - Bang Jono', 'mouse-gaming', 'Mouse Gaming Logitech', 'Pcs', 15, 0, 125000, '2022-06-20 06:53:46', '2022-06-20 07:15:59'),
(4, '2022-06-20 00:00:00', 'PO-004', 'Toko Komputer Aceng', 'rokok-elektrik', 'Rokok Elektrik', 'Unit', 10, 3, 300000, '2022-06-21 05:19:04', '2022-06-21 05:19:26');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

DROP TABLE IF EXISTS `produk`;
CREATE TABLE IF NOT EXISTS `produk` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `pembelian_id` int(11) NOT NULL,
  `kode_barang` varchar(50) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `harga_satuan` bigint(20) NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `pembelian_id`, `kode_barang`, `nama_barang`, `satuan`, `harga_satuan`, `jumlah_barang`, `created_at`, `updated_at`) VALUES
(1, 1, 'sp-laptop-01', 'Spare Part Laptop', 'Pcs', 50000, 0, '2022-06-20 14:15:03', '2022-06-21 13:11:06'),
(2, 2, 'pelindung-hp', 'Pelindung Handphone', 'Pcs', 20000, 0, '2022-06-20 14:15:32', '2022-06-20 15:03:19'),
(3, 3, 'mouse-gaming', 'Mouse Gaming Logitech', 'Pcs', 125000, 5, '2022-06-20 14:15:59', '2022-06-21 13:23:28'),
(4, 4, 'rokok-elektrik', 'Rokok Elektrik', 'Unit', 300000, 7, '2022-06-21 12:19:26', '2022-06-21 12:19:26');

-- --------------------------------------------------------

--
-- Table structure for table `produk_keluar`
--

DROP TABLE IF EXISTS `produk_keluar`;
CREATE TABLE IF NOT EXISTS `produk_keluar` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tanggal_keluar` datetime NOT NULL,
  `produk_id` int(11) NOT NULL,
  `kode_barang` varchar(50) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `qty_kirim` int(11) NOT NULL,
  `qty_sisa` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk_keluar`
--

INSERT INTO `produk_keluar` (`id`, `tanggal_keluar`, `produk_id`, `kode_barang`, `nama_barang`, `qty_kirim`, `qty_sisa`, `created_at`, `updated_at`) VALUES
(27, '2022-07-06 00:00:00', 2, 'pelindung-hp', 'Pelindung Handphone', 30, 0, '2022-06-20 15:03:19', '2022-06-20 15:03:19'),
(28, '2022-06-20 00:00:00', 1, 'sp-laptop-01', 'Spare Part Laptop', 45, 15, '2022-06-20 15:04:50', '2022-06-20 15:04:50'),
(29, '2022-06-21 00:00:00', 1, 'sp-laptop-01', 'Spare Part Laptop', 10, 5, '2022-06-21 13:10:44', '2022-06-21 13:10:44'),
(30, '2022-06-21 00:00:00', 1, 'sp-laptop-01', 'Spare Part Laptop', 5, 0, '2022-06-21 13:11:06', '2022-06-21 13:11:06'),
(31, '2022-06-21 00:00:00', 3, 'mouse-gaming', 'Mouse Gaming Logitech', 5, 5, '2022-06-21 13:23:28', '2022-06-21 13:23:28');

-- --------------------------------------------------------

--
-- Table structure for table `produk_masuk`
--

DROP TABLE IF EXISTS `produk_masuk`;
CREATE TABLE IF NOT EXISTS `produk_masuk` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tanggal_masuk` datetime NOT NULL,
  `pembelian_id` int(11) NOT NULL,
  `qty_terima` int(11) NOT NULL,
  `qty_sisa` int(11) DEFAULT NULL,
  `keterangan` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk_masuk`
--

INSERT INTO `produk_masuk` (`id`, `tanggal_masuk`, `pembelian_id`, `qty_terima`, `qty_sisa`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, '2022-06-20 00:00:00', 1, 10, 90, 'Sisa akan dikirim pada penerimaan berikutnya', '2022-06-20 14:15:03', '2022-06-20 14:15:03'),
(2, '2022-06-20 00:00:00', 2, 5, 25, 'Sisa akan dikirim pada penerimaan berikutnya', '2022-06-20 14:15:32', '2022-06-20 14:15:32'),
(3, '2022-06-20 00:00:00', 3, 10, 5, 'Stock supplier tidak memenuhi Qty Order', '2022-06-20 14:15:59', '2022-06-20 14:15:59'),
(4, '2022-06-20 00:00:00', 1, 50, 40, 'Stock supplier tidak memenuhi Qty Order', '2022-06-20 14:17:28', '2022-06-20 14:17:28'),
(5, '2022-06-20 00:00:00', 2, 25, 0, 'Qty order telah terpenuhi', '2022-06-20 14:29:35', '2022-06-20 14:29:35'),
(6, '2022-06-22 00:00:00', 4, 7, 3, 'Sisa akan dikirim pada penerimaan berikutnya', '2022-06-21 12:19:26', '2022-06-21 12:19:26');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

DROP TABLE IF EXISTS `supplier`;
CREATE TABLE IF NOT EXISTS `supplier` (
  `supplier_id` int(11) NOT NULL AUTO_INCREMENT,
  `supplier_name` varchar(128) NOT NULL,
  `supplier_phone` varchar(13) NOT NULL,
  `supplier_address` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`supplier_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplier_id`, `supplier_name`, `supplier_phone`, `supplier_address`, `created_at`, `updated_at`) VALUES
(7, 'Toko Komputer Aceng', '081325890111', 'Sumedang', '2022-06-17 14:22:48', '2022-06-18 12:08:44'),
(8, 'Toko Aksesoris PC - Bang Jono', '082121885834', 'Jalan Cibiru Bandung', '2022-06-18 03:25:43', '2022-06-18 12:09:08'),
(9, 'Toko Anugerah Perkasa', '081320477567', 'Rawamangung, Jakarta', '2022-06-18 03:26:07', '2022-06-18 12:09:20'),
(10, 'Mall Mangga Dua AD5', '089507436785', 'Mangga Dua, Jakarta', '2022-06-18 12:10:02', '2022-06-18 12:10:02');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admin-produksi',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Haryadi', 'haryadi', 'haryadi@gmail.com', '$2y$10$CtFtlhraVMXffRvouUlCN.o238vPMOtwcFjHB1zAtGvXD0Ln/gvb6', 'admin-gudang', '2022-06-21 07:32:42', '2022-06-21 07:32:42'),
(2, 'Deni Sumargo', 'deni', 'deni@gmail.com', '$2y$10$GACngdjlFvOwaHpU.ErgXOTssDWLiuANqUfQ0ET/64g3omZjRXQ1G', 'admin-produksi', '2022-06-21 07:08:09', '2022-06-21 07:08:09');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
