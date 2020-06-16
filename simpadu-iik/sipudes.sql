-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2016 at 04:17 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sipudes`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` text,
  `status` int(1) DEFAULT NULL,
  `id_penduduk` varchar(50) DEFAULT NULL,
  `akses` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `status`, `id_penduduk`, `akses`) VALUES
(1, 'superadmin', '17c4520f6cfd1ab53d8745e84681eb49', 1, '9879878978', 1),
(3, 'adm', 'b09c600fddc573f117449b3723f23d64', 1, '879678676', 2),
(4, 'ahmad', '61243c7b9a4022cb3f8dc3106767ed12', 1, '897980798', 1);

-- --------------------------------------------------------

--
-- Table structure for table `agama`
--

CREATE TABLE `agama` (
  `id_agama` varchar(10) NOT NULL,
  `agama` varchar(30) DEFAULT NULL,
  `status` int(1) DEFAULT NULL
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

CREATE TABLE `desa` (
  `desa` varchar(50) NOT NULL,
  `kecamatan` varchar(50) NOT NULL,
  `kabupaten` varchar(50) NOT NULL,
  `kepala_desa` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `desa`
--

INSERT INTO `desa` (`desa`, `kecamatan`, `kabupaten`, `kepala_desa`) VALUES
('MOJOMALANG', 'PARENGAN', 'TUBAN', 'KEPALA DESA SP.D');

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE `file` (
  `id_kategori` varchar(30) DEFAULT NULL,
  `nik` varchar(30) DEFAULT NULL,
  `file` text,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `file`
--

INSERT INTO `file` (`id_kategori`, `nik`, `file`, `status`) VALUES
('000000001', '9879878978', 'update201608280143400000000019879878978.pdf', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` varchar(30) NOT NULL,
  `kategori` varchar(50) DEFAULT NULL,
  `status` int(1) DEFAULT NULL
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

CREATE TABLE `kategori_klasifikasi` (
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
('000000001', '000000003', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kk`
--

CREATE TABLE `kk` (
  `id_kk` varchar(20) NOT NULL,
  `no_kk` varchar(50) DEFAULT NULL,
  `rt` varchar(5) DEFAULT NULL,
  `rw` varchar(5) DEFAULT NULL,
  `kk` varchar(30) DEFAULT NULL,
  `status` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kk`
--

INSERT INTO `kk` (`id_kk`, `no_kk`, `rt`, `rw`, `kk`, `status`) VALUES
('000000001', '76986987687687', '01', '02', '9879878978', '1'),
('000000002', '786978698768768', '09', '09', '879678676', '1'),
('000000003', '8907987897', '09', '08', '769878767', '1'),
('000000004', '89798787', '08', '09', '897980798', '1'),
('000000005', '7698687967', '07', '08', '67575577667', '1');

-- --------------------------------------------------------

--
-- Table structure for table `klasifikasi`
--

CREATE TABLE `klasifikasi` (
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

CREATE TABLE `klasifikasi_penduduk` (
  `nik` varchar(50) DEFAULT NULL,
  `id_klasifikasi` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `klasifikasi_penduduk`
--

INSERT INTO `klasifikasi_penduduk` (`nik`, `id_klasifikasi`) VALUES
('9879878978', '000000002'),
('879678676', '000000002'),
('76798697786767', '000000002'),
('769878767', '000000002'),
('897980798', '000000003'),
('67575577667', '000000003');

-- --------------------------------------------------------

--
-- Table structure for table `penduduk`
--

CREATE TABLE `penduduk` (
  `nik` varchar(100) NOT NULL,
  `nama` varchar(150) DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` varchar(10) DEFAULT NULL,
  `jk` varchar(10) DEFAULT NULL,
  `golongan_darah` varchar(5) DEFAULT NULL,
  `alamat` text,
  `pekerjaan` text,
  `kewarganegaraan` varchar(50) DEFAULT NULL,
  `id_agama` varchar(30) DEFAULT NULL,
  `id_kk` varchar(50) DEFAULT NULL,
  `foto` varchar(50) DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penduduk`
--

INSERT INTO `penduduk` (`nik`, `nama`, `tempat_lahir`, `tanggal_lahir`, `jk`, `golongan_darah`, `alamat`, `pekerjaan`, `kewarganegaraan`, `id_agama`, `id_kk`, `foto`, `status`) VALUES
('67575577667', 'SURYA DINATA', 'TUBAN', '12/09/1998', 'Laki-laki', 'AB', 'DSN ALASTUWO ', 'PNS', 'INDONESIA', '000000001', '000000005', 'uploadfoto2016083006161467575577667.jpeg', 1),
('76798697786767', 'CAMELIA', 'TUBAN', '12/09/1998', 'Perempuan', 'A', 'JALAN AHMAD YANI', 'IBU RUMAH TANGGA', 'INDONESIA', '000000001', '000000002', 'uploadfoto2016083006100676798697786767.jpeg', 1),
('769878767', 'FANA MAYA', 'BOJONEGORO', '12/08/1997', 'Laki-laki', 'AB', 'JALAN SUROYO DINO', 'PNS', 'INDONESIA', '000000001', '000000003', 'uploadfoto20160830061254769878767.jpeg', 1),
('879678676', 'ASAL COBA', 'TEMPAT LAHIR', '01/08/2016', 'Laki-laki', 'A', 'JALAN JALAN KE KOTA', 'PETANI', 'INDONESIA', '000000001', '000000002', 'uploadfoto20160829182418879678676.jpeg', 1),
('897980798', 'MUHAMMAD ROIISUL ABIDIN', 'TUBAN', '12/07/1998', 'Laki-laki', 'B', 'JALAN AHMAD YANI', '-', 'INDONESIA', '000000001', '000000004', 'uploadfoto20160830061438897980798.jpeg', 1),
('9879878978', 'TEJA PAKU ALAM', 'TUBAN', '01/08/1998', 'Laki-laki', 'A', 'JALAN BUNTU', 'PETANI', 'INDONESIA', '000000001', '000000001', 'uploadfoto201608280140499879878978.jpeg', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `agama`
--
ALTER TABLE `agama`
  ADD PRIMARY KEY (`id_agama`);

--
-- Indexes for table `desa`
--
ALTER TABLE `desa`
  ADD PRIMARY KEY (`desa`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `kk`
--
ALTER TABLE `kk`
  ADD PRIMARY KEY (`id_kk`);

--
-- Indexes for table `penduduk`
--
ALTER TABLE `penduduk`
  ADD PRIMARY KEY (`nik`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
