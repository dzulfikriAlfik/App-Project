-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 18, 2022 at 06:23 AM
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
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_07_10_181705_create_posts_table', 1),
(5, '2021_07_22_133128_create_barang_keluars_table', 2),
(6, '2021_07_22_134754_barang_keluar', 2),
(7, '2021_07_22_135503_creat_barangkeluat_table', 2),
(8, '2021_07_27_154019_create_barang_keluars_table', 3),
(9, '2021_07_27_160725_create_pengeluarans_table', 4),
(10, '2021_08_10_134758_create_pembelians_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

DROP TABLE IF EXISTS `pegawai`;
CREATE TABLE IF NOT EXISTS `pegawai` (
  `pegawai_id` int(11) NOT NULL,
  `pegawai_nama` varchar(50) NOT NULL,
  `pegawai_jabatan` varchar(50) NOT NULL,
  `pegawai_umur` int(11) NOT NULL,
  `pegawai_alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`pegawai_id`, `pegawai_nama`, `pegawai_jabatan`, `pegawai_umur`, `pegawai_alamat`) VALUES
(0, 'haryadi', 'it support', 18, 'bddjd');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

DROP TABLE IF EXISTS `pembelian`;
CREATE TABLE IF NOT EXISTS `pembelian` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `no_po` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `produk_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id`, `no_po`, `supplier_id`, `produk_id`, `qty`, `created_at`, `updated_at`) VALUES
(6, 'PO-001', 9, 1, 1, '2022-06-17 21:02:08', '2022-06-17 22:55:24'),
(8, 'PO-002', 7, 1, 1, '2022-06-17 21:10:55', '2022-06-17 22:55:53'),
(10, 'asdf', 7, 2, 10, '2022-06-17 22:25:45', '2022-06-17 22:25:45');

-- --------------------------------------------------------

--
-- Table structure for table `pengeluaran`
--

DROP TABLE IF EXISTS `pengeluaran`;
CREATE TABLE IF NOT EXISTS `pengeluaran` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_toko` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_surat_jalan` int(11) NOT NULL,
  `alamat_toko` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_barang` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` int(11) NOT NULL,
  `keterangan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_satuan` double NOT NULL,
  `jumlah_total` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengeluaran`
--

INSERT INTO `pengeluaran` (`id`, `nama_toko`, `no_surat_jalan`, `alamat_toko`, `nama_barang`, `qty`, `keterangan`, `harga_satuan`, `jumlah_total`, `created_at`, `updated_at`) VALUES
(16, 'Toko Surya', 1, 'bandung', 'Sementigaroda', 5, '5 @ 50 KG', 55000, 275000, '2021-08-14 03:56:18', '2021-08-14 03:56:18'),
(17, 'Toko Surya', 2, 'Toko Surya', 'BataMerah', 500, '500 PCS', 1800, 900000, '2021-08-14 04:36:16', '2021-08-14 04:36:16'),
(18, 'tb', 5, 'tb', 'Sementigaroda', 5, '100000', 5, 25, '2021-08-14 05:53:03', '2021-08-14 05:53:03'),
(19, 'tb', 5, 'tb', 'Sementigaroda', 5, '100000', 5, 25, '2021-08-14 05:53:05', '2021-08-14 05:53:05');

-- --------------------------------------------------------

--
-- Table structure for table `permintaan_produk`
--

DROP TABLE IF EXISTS `permintaan_produk`;
CREATE TABLE IF NOT EXISTS `permintaan_produk` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `kode_barang` varchar(50) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `harga_barang` int(11) NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `no_penerimaan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_barang` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `satuan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty_po` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty_penerimaan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_po` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `no_penerimaan`, `kode`, `supplier_id`, `nama_barang`, `satuan`, `qty_po`, `qty_penerimaan`, `keterangan`, `no_po`, `created_at`, `updated_at`) VALUES
(16, 'M00021', 'ST', 'JAKARTA', 'Semen tiga roda', 'KG', '200', '100', '100 @ 50 kg', '2021-01-21', '2021-08-14 03:39:41', '2021-08-14 03:39:41'),
(17, 'M0002', 'BM', 'JAKARTA', 'Bata Merah', 'PCS', '1000', '500', '500 PCS', '2021-01-22', '2021-08-14 03:41:26', '2021-08-14 03:41:26'),
(18, 'M0003', 'GTJ', 'JATIWANGI', 'Genteng', 'PCS', '2000', '1500', '1500 PCS', '2021-01-23', '2021-08-14 03:42:47', '2021-08-14 03:42:47'),
(19, 'M0004', 'BS10', 'JAKARTA', 'Besi Beton', 'OCS', '100', '50', '50 PCS', '2021-01-24', '2021-08-14 03:45:13', '2021-08-14 03:45:13'),
(20, 'M0006', 'SL', 'BANDUNG', 'Selang 10', 'ROLL', '25', '25', '25 ROLL', '2021-01-26', '2021-08-14 03:47:37', '2021-08-14 03:47:37');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

DROP TABLE IF EXISTS `produk`;
CREATE TABLE IF NOT EXISTS `produk` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
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

INSERT INTO `produk` (`id`, `kode_barang`, `nama_barang`, `satuan`, `harga_satuan`, `jumlah_barang`, `created_at`, `updated_at`) VALUES
(1, 'laptop-01', 'Laptop', 'Pcs', 10000000, 12, '2022-06-18 02:50:59', '2022-06-18 05:55:53'),
(2, 'mouse-01', 'Mouse', 'Pcs', 250000, 11, '2022-06-18 02:53:52', '2022-06-18 05:53:36');

-- --------------------------------------------------------

--
-- Table structure for table `produk_keluar`
--

DROP TABLE IF EXISTS `produk_keluar`;
CREATE TABLE IF NOT EXISTS `produk_keluar` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `kode_barang` varchar(50) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `harga_barang` int(11) NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `produk_masuk`
--

DROP TABLE IF EXISTS `produk_masuk`;
CREATE TABLE IF NOT EXISTS `produk_masuk` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `kode_barang` varchar(50) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `harga_barang` int(11) NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplier_id`, `supplier_name`, `supplier_phone`, `supplier_address`, `created_at`, `updated_at`) VALUES
(7, 'PT. Tjiwi Kimia Farma', '081325890111', 'Sumedang', '2022-06-17 14:22:48', '2022-06-17 14:36:27'),
(8, 'PT. ABC', '082121885834', 'Jalan Cibiru Bandung', '2022-06-18 03:25:43', '2022-06-18 03:25:43'),
(9, 'PT. Anugerah Perkasa', '081320477567', 'Rawamangung, Jakarta', '2022-06-18 03:26:07', '2022-06-18 03:26:07');

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
  `phone` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
