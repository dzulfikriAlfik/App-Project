-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Agu 2021 pada 01.37
-- Versi server: 10.4.19-MariaDB
-- Versi PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uas_web`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
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
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `pegawai_id` int(11) NOT NULL,
  `pegawai_nama` varchar(50) NOT NULL,
  `pegawai_jabatan` varchar(50) NOT NULL,
  `pegawai_umur` int(11) NOT NULL,
  `pegawai_alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`pegawai_id`, `pegawai_nama`, `pegawai_jabatan`, `pegawai_umur`, `pegawai_alamat`) VALUES
(0, 'haryadi', 'it support', 18, 'bddjd');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelians`
--

CREATE TABLE `pembelians` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `No_po` date NOT NULL,
  `Suplier` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Kode` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Nama_Barang` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Satuan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Qty` int(11) NOT NULL,
  `Harga_Satuan` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pembelians`
--

INSERT INTO `pembelians` (`id`, `created_at`, `updated_at`, `No_po`, `Suplier`, `Kode`, `Nama_Barang`, `Satuan`, `Qty`, `Harga_Satuan`) VALUES
(9, '2021-08-13 22:43:17', '2021-08-14 02:08:50', '2021-01-21', 'jakrta', 'ST', 'Semen tiga roda', 'kg', 200, 100),
(10, '2021-08-14 02:10:32', '2021-08-14 02:10:32', '2021-01-22', 'jakartaaaaa', 'BM', 'Bata Merah', 'PCS', 1000, 1300),
(11, '2021-08-14 02:18:27', '2021-08-14 02:18:27', '2021-01-23', 'JATIWANGI', 'GTJ', 'Genting', 'PCS', 2000, 8000),
(12, '2021-08-14 02:20:27', '2021-08-14 02:20:55', '2021-01-24', 'JAKARTA', 'BS10', 'Besi Beton', 'PCS', 100, 120000),
(13, '2021-08-14 02:23:14', '2021-08-14 02:23:14', '2021-01-25', 'JAKARTA', 'BS12', 'Besi Beton', 'PCS', 34, 150000),
(14, '2021-08-14 02:25:52', '2021-08-14 02:25:52', '2021-01-26', 'BANDUNG', 'SL', 'Selang 10', 'ROLL', 25, 80000),
(15, '2021-08-14 02:27:45', '2021-08-14 02:27:45', '2021-01-27', 'JAKARTA', 'BTC', 'Batu Cor', 'coll', 5, 5000000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengeluarans`
--

CREATE TABLE `pengeluarans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `Nama_Toko` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `No_Surat_jalan` int(11) NOT NULL,
  `Alamat_Toko` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Nama_Barang` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Qty` int(11) NOT NULL,
  `Keterangan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Harga_Satuan` double NOT NULL,
  `Jumlah_Total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pengeluarans`
--

INSERT INTO `pengeluarans` (`id`, `created_at`, `updated_at`, `Nama_Toko`, `No_Surat_jalan`, `Alamat_Toko`, `Nama_Barang`, `Qty`, `Keterangan`, `Harga_Satuan`, `Jumlah_Total`) VALUES
(16, '2021-08-14 03:56:18', '2021-08-14 03:56:18', 'Toko Surya', 1, 'bandung', 'Sementigaroda', 5, '5 @ 50 KG', 55000, 275000),
(17, '2021-08-14 04:36:16', '2021-08-14 04:36:16', 'Toko Surya', 2, 'Toko Surya', 'BataMerah', 500, '500 PCS', 1800, 900000),
(18, '2021-08-14 05:53:03', '2021-08-14 05:53:03', 'tb', 5, 'tb', 'Sementigaroda', 5, '100000', 5, 25),
(19, '2021-08-14 05:53:05', '2021-08-14 05:53:05', 'tb', 5, 'tb', 'Sementigaroda', 5, '100000', 5, 25);

-- --------------------------------------------------------

--
-- Struktur dari tabel `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `No_Penerimaan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Kode` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Suplier` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Nama_Barang` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Satuan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Qty_Po` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Qty_Penerimaan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Keterangan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `No_po` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `posts`
--

INSERT INTO `posts` (`id`, `created_at`, `updated_at`, `No_Penerimaan`, `Kode`, `Suplier`, `Nama_Barang`, `Satuan`, `Qty_Po`, `Qty_Penerimaan`, `Keterangan`, `No_po`) VALUES
(16, '2021-08-14 03:39:41', '2021-08-14 03:39:41', 'M00021', 'ST', 'JAKARTA', 'Semen tiga roda', 'KG', '200', '100', '100 @ 50 kg', '2021-01-21'),
(17, '2021-08-14 03:41:26', '2021-08-14 03:41:26', 'M0002', 'BM', 'JAKARTA', 'Bata Merah', 'PCS', '1000', '500', '500 PCS', '2021-01-22'),
(18, '2021-08-14 03:42:47', '2021-08-14 03:42:47', 'M0003', 'GTJ', 'JATIWANGI', 'Genteng', 'PCS', '2000', '1500', '1500 PCS', '2021-01-23'),
(19, '2021-08-14 03:45:13', '2021-08-14 03:45:13', 'M0004', 'BS10', 'JAKARTA', 'Besi Beton', 'OCS', '100', '50', '50 PCS', '2021-01-24'),
(20, '2021-08-14 03:47:37', '2021-08-14 03:47:37', 'M0006', 'SL', 'BANDUNG', 'Selang 10', 'ROLL', '25', '25', '25 ROLL', '2021-01-26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD UNIQUE KEY `pegawai_id` (`pegawai_id`);

--
-- Indeks untuk tabel `pembelians`
--
ALTER TABLE `pembelians`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengeluarans`
--
ALTER TABLE `pengeluarans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `pembelians`
--
ALTER TABLE `pembelians`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `pengeluarans`
--
ALTER TABLE `pengeluarans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
