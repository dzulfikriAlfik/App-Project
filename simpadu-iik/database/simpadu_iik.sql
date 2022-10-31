-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 26, 2020 at 08:52 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simpadu_iik`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `id_penduduk` varchar(50) DEFAULT NULL,
  `akses` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `status`, `id_penduduk`, `akses`) VALUES
(5, 'dzulfikri', '21232f297a57a5a743894a0e4a801fc3', 1, '3210032911950021', 1);

-- --------------------------------------------------------

--
-- Table structure for table `agama`
--

DROP TABLE IF EXISTS `agama`;
CREATE TABLE IF NOT EXISTS `agama` (
  `id_agama` varchar(10) NOT NULL,
  `agama` varchar(30) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`id_agama`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agama`
--

INSERT INTO `agama` (`id_agama`, `agama`, `status`) VALUES
('000000001', 'Islam', 1),
('000000002', 'Kristen', 1),
('000000003', 'Katholik', 1),
('000000004', 'Hindu', 1),
('000000005', 'Budha', 1),
('000000006', 'Khonghucu', 1);

-- --------------------------------------------------------

--
-- Table structure for table `desa`
--

DROP TABLE IF EXISTS `desa`;
CREATE TABLE IF NOT EXISTS `desa` (
  `desa` varchar(50) NOT NULL,
  `kecamatan` varchar(50) NOT NULL,
  `kabupaten` varchar(50) NOT NULL,
  `kepala_desa` varchar(50) DEFAULT NULL,
  `alamat_desa` text DEFAULT NULL,
  `telp` varchar(15) DEFAULT NULL,
  `kode_pos` int(6) DEFAULT NULL,
  PRIMARY KEY (`desa`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `desa`
--

INSERT INTO `desa` (`desa`, `kecamatan`, `kabupaten`, `kepala_desa`, `alamat_desa`, `telp`, `kode_pos`) VALUES
('CENGAL', 'MAJA', 'MAJALENGKA', 'IIK MUSPIK AMRULLOH', 'JL. DESA CENGAL NO.05 BLOK PACENGALAN DUSUN RAWA PUNTANG', '(0221) 318459', 45461);

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

DROP TABLE IF EXISTS `file`;
CREATE TABLE IF NOT EXISTS `file` (
  `id_kategori` varchar(30) DEFAULT NULL,
  `nik` varchar(30) DEFAULT NULL,
  `file` text DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

DROP TABLE IF EXISTS `kategori`;
CREATE TABLE IF NOT EXISTS `kategori` (
  `id_kategori` varchar(30) NOT NULL,
  `kategori` varchar(50) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`, `status`) VALUES
('000000001', 'KTP', 1),
('000000002', 'Akte', 1),
('000000003', 'Surat Nikah', 1),
('000000004', 'Dokumen Penting Lainnya', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kategori_klasifikasi`
--

DROP TABLE IF EXISTS `kategori_klasifikasi`;
CREATE TABLE IF NOT EXISTS `kategori_klasifikasi` (
  `id_kategori` varchar(20) DEFAULT NULL,
  `id_klasifikasi` varchar(10) DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_klasifikasi`
--

INSERT INTO `kategori_klasifikasi` (`id_kategori`, `id_klasifikasi`, `status`) VALUES
('000000001', '000000002', 1),
('000000004', '000000002', 1),
('000000002', '000000003', 1),
('000000003', '000000002', 1),
('000000002', '000000002', 1),
('000000003', '000000003', 1),
('000000004', '000000003', 1),
('000000001', '000000003', 1),
('000000002', '000000001', 1),
('000000002', '000000004', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kk`
--

DROP TABLE IF EXISTS `kk`;
CREATE TABLE IF NOT EXISTS `kk` (
  `id_kk` varchar(20) NOT NULL,
  `no_kk` varchar(50) DEFAULT NULL,
  `rt` varchar(5) DEFAULT NULL,
  `rw` varchar(5) DEFAULT NULL,
  `kk` varchar(30) DEFAULT NULL,
  `status` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`id_kk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kk`
--

INSERT INTO `kk` (`id_kk`, `no_kk`, `rt`, `rw`, `kk`, `status`) VALUES
('000000006', '3210011129950020', '02', '05', '3210032911950021', '1'),
('000000007', '3210122311970032', '01', '01', '3210011509960012', NULL),
('000000008', '03210012005980012', '01', '02', '3210011211950011', NULL),
('000000009', '3210010908950022', '03', '02', '3210050306960029', NULL),
('000000010', '3210061122950021', '06', '04', '3210092911950052', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `klasifikasi`
--

DROP TABLE IF EXISTS `klasifikasi`;
CREATE TABLE IF NOT EXISTS `klasifikasi` (
  `id_klasifikasi` varchar(10) DEFAULT NULL,
  `klasifikasi` varchar(50) DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `klasifikasi`
--

INSERT INTO `klasifikasi` (`id_klasifikasi`, `klasifikasi`, `status`) VALUES
('000000001', 'Anak-anak', 1),
('000000002', 'Dewasa', 1),
('000000003', 'Orang Tua', 1),
('000000004', 'Remaja', 1);

-- --------------------------------------------------------

--
-- Table structure for table `klasifikasi_penduduk`
--

DROP TABLE IF EXISTS `klasifikasi_penduduk`;
CREATE TABLE IF NOT EXISTS `klasifikasi_penduduk` (
  `nik` varchar(50) DEFAULT NULL,
  `id_klasifikasi` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `klasifikasi_penduduk`
--

INSERT INTO `klasifikasi_penduduk` (`nik`, `id_klasifikasi`) VALUES
('67575577667', '000000003'),
('23212321', '000000002'),
('333111234', '000000002'),
('12332111111', '000000002'),
('76798697786767', '000000002'),
('879678676', '000000002'),
('769878767', '000000002'),
('897980798', '000000003'),
('3210011509960012', '000000002'),
('3210011211950011', '000000002'),
('3210050306960029', '000000002'),
('3210011511970050', '000000002'),
('3210042505990023', '000000002'),
('3210092911950021', '000000001'),
('3210051129980015', '000000002'),
('3210051129960045', '000000002'),
('3210032911950021', '000000002'),
('3210092911950052', '000000002');

-- --------------------------------------------------------

--
-- Table structure for table `mutasi`
--

DROP TABLE IF EXISTS `mutasi`;
CREATE TABLE IF NOT EXISTS `mutasi` (
  `id_mutasi` int(11) NOT NULL AUTO_INCREMENT,
  `mutasi` varchar(32) NOT NULL,
  PRIMARY KEY (`id_mutasi`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mutasi`
--

INSERT INTO `mutasi` (`id_mutasi`, `mutasi`) VALUES
(1, 'Masuk'),
(2, 'Keluar'),
(3, 'Warga Asli');

-- --------------------------------------------------------

--
-- Table structure for table `penduduk`
--

DROP TABLE IF EXISTS `penduduk`;
CREATE TABLE IF NOT EXISTS `penduduk` (
  `nik` varchar(100) NOT NULL,
  `nama` varchar(150) DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` varchar(10) DEFAULT NULL,
  `jk` varchar(10) DEFAULT NULL,
  `golongan_darah` varchar(5) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `alamat_sesudah` text DEFAULT NULL,
  `pekerjaan` text DEFAULT NULL,
  `kewarganegaraan` varchar(50) DEFAULT NULL,
  `id_agama` varchar(30) DEFAULT NULL,
  `id_kk` varchar(50) DEFAULT NULL,
  `foto` varchar(50) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `mutasi` int(11) NOT NULL,
  PRIMARY KEY (`nik`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penduduk`
--

INSERT INTO `penduduk` (`nik`, `nama`, `tempat_lahir`, `tanggal_lahir`, `jk`, `golongan_darah`, `alamat`, `alamat_sesudah`, `pekerjaan`, `kewarganegaraan`, `id_agama`, `id_kk`, `foto`, `status`, `mutasi`) VALUES
('3210011211950011', 'IKBAL FIRDAUS MAHENDRA', 'MAJALENGKA', '10/02/1995', 'Laki-laki', 'AB', 'SUKARAJA WETAN', 'CENGAL KULON', 'FREELANCER', 'INDONESIA', '000000001', '000000008', '', 1, 1),
('3210011509960012', 'IIK MUSPIK AMRULLOH', 'MAJALENGKA', '15/05/1996', 'Laki-laki', 'A', 'CENGAL', '', 'APARATUR DESA', 'INDONESIA', '000000001', '000000007', '', 1, 3),
('3210011511970050', 'NISA CAHYA AKMALIA', 'MAJALENGKA', '10/09/1997', 'Perempuan', 'O', 'MAJALENGKA', 'CENGAL', 'IBU RUMAH TANGGA', 'INDONESIA', '000000001', '000000007', '', 1, 1),
('3210032911950021', 'DZULFIKRI ALKAUTSARI', 'MAJALENGKA', '29/11/1995', 'Laki-laki', 'O', 'CENGAL', '', 'FREELANCER PROGRAMMING', 'INDONESIA', '000000001', '000000006', '', 1, 3),
('3210042505990023', 'ADE MUHAMMAD RAHMATILLAH', 'CIREBON', '10/06/1999', 'Laki-laki', 'B', 'CENGAL', 'JAKARTA', 'KARYAWAN SWASTA', 'INDONESIA', '000000001', '000000007', '', 1, 2),
('3210050306960029', 'INTAN SHOLIHAT', 'MAJALENGKA', '08/08/1996', 'Perempuan', 'O', 'CENGAL', 'MAJALENGKA KULON', 'MAHASISWI', 'INDONESIA', '000000001', '000000009', '', 1, 2),
('3210051129960045', 'LUSI INDRIANI', 'MAJALENGKA', '11/01/1996', 'Perempuan', 'AB', 'CENGAL', 'SUKARAJA', 'IBU RUMAH TANGGA', 'INDONESIA', '000000001', '000000008', '', 1, 3),
('3210051129980015', 'ANNISA NOVITRI', 'BEKASI', '25/11/1995', 'Perempuan', 'B', 'BEKASI', 'CENGAL', 'KARYAWAN SWASTA', 'INDONESIA', '000000001', '000000006', '', 1, 1),
('3210092911950021', 'ANDINI MUSPIK ', 'CIREBON', '14/01/2015', 'Perempuan', 'A', 'CENGAL', '', 'PELAJAR', 'INDONESIA', '000000001', '000000007', '', 1, 3),
('3210092911950052', 'ANDI HIKMAYADI', 'BANDUNG', '13/04/1995', 'Laki-laki', 'B', 'BANDUNG', 'CENGAL', 'APARATUR DESA', 'INDONESIA', '000000001', '000000010', '', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

DROP TABLE IF EXISTS `status`;
CREATE TABLE IF NOT EXISTS `status` (
  `id_status` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(32) NOT NULL,
  PRIMARY KEY (`id_status`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id_status`, `status`) VALUES
(1, 'Hidup'),
(2, 'Meninggal');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
