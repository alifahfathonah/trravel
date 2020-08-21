-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2020 at 04:50 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `armada`
--

CREATE TABLE `armada` (
  `no_kendaraan` char(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `merk` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipe` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jumlah_kursi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `armada`
--

INSERT INTO `armada` (`no_kendaraan`, `merk`, `tipe`, `jumlah_kursi`) VALUES
('AG 1235 A', 'Nissan', 'X1', 15),
('AG 6714 XY', 'Honda', 'F5', 15),
('B 1112 RG', 'Daihatsu', 'XXX', 15),
('N 15 A', 'Yamaha', 'Y07', 15);

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas`
--

CREATE TABLE `fasilitas` (
  `kodef` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `namaf` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hargaf` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fasilitas`
--

INSERT INTO `fasilitas` (`kodef`, `namaf`, `hargaf`) VALUES
('F000', 'NOT ORDER', 0),
('F001', 'Soft Drink', 15000),
('F002', 'Snack', 30000);

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `kode_operasi` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_operasi` date NOT NULL,
  `waktumulai_operasi` time NOT NULL,
  `waktuselesai_operasi` time NOT NULL,
  `tarif_operasi` bigint(20) NOT NULL,
  `nik` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_kendaraan` char(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_rute` char(10) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`kode_operasi`, `tgl_operasi`, `waktumulai_operasi`, `waktuselesai_operasi`, `tarif_operasi`, `nik`, `no_kendaraan`, `kode_rute`) VALUES
('J001', '2017-01-01', '07:00:00', '17:00:00', 100000, '1541720003', 'AG 6714 XY', 'R001'),
('J002', '2017-01-02', '08:00:00', '19:00:00', 150000, '1541720002', 'AG 6714 XY', 'R002'),
('J003', '2017-01-03', '09:00:00', '21:00:00', 150000, '1541720003', 'AG 6714 XY', 'R001'),
('J004', '2017-01-04', '06:00:00', '18:00:00', 80000, '1541720003', 'AG 1235 A', 'R003'),
('J005', '2017-01-05', '05:00:00', '19:00:00', 70000, '1541720002', 'N 15 A', 'R001');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `nik` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_kelamin` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_hp` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_karyawan` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`nik`, `nama`, `jenis_kelamin`, `no_hp`, `jenis_karyawan`) VALUES
('1541720001', 'Tahta Reza', 'perempuan', '081291634919', 'administrator'),
('1541720002', 'Pairi', 'laki-laki', '081335682502', 'sopir'),
('1541720003', 'Kartono', 'laki-laki', '081122223333', 'sopir'),
('1541720004', 'Kintan', 'perempuan', '085649129416', 'sopir');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id_member` char(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_member` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jk_member` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nohp_member` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id_member`, `nama_member`, `jk_member`, `nohp_member`, `foto`) VALUES
('M0001', 'Adinda Dwi', 'perempuan', '083834282968', 'WIN_20170615_14_19_14_Pro.jpg'),
('M0002', 'Clara Nadya', 'perempuan', '089531026477', 'WIN_20170615_14_31_32_Pro.jpg'),
('M0003', 'Kendal Jenner', 'perempuan', '081291634919', 'WIN_20170615_12_17_54_Pro.jpg'),
('M0004', 'Gigi Hadid', 'perempuan', '089679521269', 'Slider_1_-_Gigi_Hadid.jpg'),
('M0005', 'Chloe Moretz', 'perempuan', '085123456789', '');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` char(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `peran` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`username`, `password`, `nama`, `peran`) VALUES
('adinda', 'adinda', 'Adinda Dwi', 'member'),
('admin', 'admin', 'Tahta Reza', 'administrator'),
('chloe', 'chloe', 'Chloe Moretz', 'member'),
('clara', 'clara', 'Clara Nadya', 'member'),
('gigi', 'gigi', 'Gigi Hadid', 'member'),
('kartono', 'kartono', 'Kartono', 'sopir'),
('kendal', 'kendal', 'Kendal Jenner', 'member'),
('pairi', 'pairi', 'Pairi', 'sopir');

-- --------------------------------------------------------

--
-- Table structure for table `promo`
--

CREATE TABLE `promo` (
  `kodep` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `namap` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `potongan` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `promo`
--

INSERT INTO `promo` (`kodep`, `namap`, `potongan`) VALUES
('P001', 'Lebaran', 10000);

-- --------------------------------------------------------

--
-- Table structure for table `rute`
--

CREATE TABLE `rute` (
  `kode_rute` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_rute` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rute`
--

INSERT INTO `rute` (`kode_rute`, `nama_rute`) VALUES
('R001', 'Malang - Kediri'),
('R002', 'Malang - Jombang'),
('R003', 'Malang - Bali');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `kodet` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idm` char(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kodeo` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kodef` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `depart` time NOT NULL,
  `tarif` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`kodet`, `idm`, `kodeo`, `kodef`, `depart`, `tarif`) VALUES
('T0001', 'M0001', 'J001', 'F000', '13:00:00', 100000),
('T0002', 'M0002', 'J001', 'F001', '12:00:00', 115000),
('T0003', 'M0003', 'J003', 'F002', '09:00:00', 180000),
('T0004', 'M0004', 'J004', 'F000', '11:00:00', 85000),
('T0005', 'M0005', 'J001', 'F000', '10:00:00', 100000),
('T0006', 'M0004', 'J001', 'F000', '09:00:00', 100000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `armada`
--
ALTER TABLE `armada`
  ADD PRIMARY KEY (`no_kendaraan`);

--
-- Indexes for table `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`kodef`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`kode_operasi`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id_member`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `promo`
--
ALTER TABLE `promo`
  ADD PRIMARY KEY (`kodep`);

--
-- Indexes for table `rute`
--
ALTER TABLE `rute`
  ADD PRIMARY KEY (`kode_rute`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`kodet`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
