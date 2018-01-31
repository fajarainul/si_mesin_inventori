-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 31, 2018 at 01:31 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `si_mesin_inventori`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_jenis_mesin`
--

CREATE TABLE `tb_jenis_mesin` (
  `id_jenis_mesin` int(11) NOT NULL,
  `nama_jenis_mesin` varchar(64) NOT NULL,
  `kode_jenis_mesin` varchar(8) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_jenis_mesin`
--

INSERT INTO `tb_jenis_mesin` (`id_jenis_mesin`, `nama_jenis_mesin`, `kode_jenis_mesin`, `date_created`) VALUES
(17, 'Single Needle', 'SN', '2018-01-24 22:40:19'),
(18, 'Double Needle', 'DN', '2018-01-24 22:40:31');

-- --------------------------------------------------------

--
-- Table structure for table `tb_mesin_inventori`
--

CREATE TABLE `tb_mesin_inventori` (
  `id_mesin_inventori` int(11) NOT NULL,
  `nomor_mesin_inventori` varchar(32) NOT NULL,
  `id_jenis_mesin` int(4) NOT NULL,
  `lokasi_mesin_inventori` varchar(8) NOT NULL,
  `status_mesin_inventori` varchar(8) NOT NULL COMMENT 'status = 1 jika kondisi baik, status = 2 jika mesin perlu pebaikan, status = 3 jika mesin sedang diperbaiki, status = 4 jika mesin selesai diperbaiki, status = 5 jika mesin rusak total',
  `tanggal_masuk_mesin_inventori` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_mesin_inventori`
--

INSERT INTO `tb_mesin_inventori` (`id_mesin_inventori`, `nomor_mesin_inventori`, `id_jenis_mesin`, `lokasi_mesin_inventori`, `status_mesin_inventori`, `tanggal_masuk_mesin_inventori`) VALUES
(8, 'SN-02-2019', 17, 'Line 3', '4', '2018-02-02 00:00:00'),
(10, 'DN-02-2018', 18, 'Line 5', '3', '2018-04-01 00:00:00'),
(11, 'SN-03-201900', 17, 'Line 400', '1', '2018-01-31 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_mesin_sewa`
--

CREATE TABLE `tb_mesin_sewa` (
  `id_mesin_sewa` int(11) NOT NULL,
  `nomor_mesin_sewa` varchar(32) NOT NULL,
  `id_jenis_mesin` int(4) NOT NULL,
  `lokasi_mesin_sewa` varchar(8) NOT NULL,
  `status_mesin_sewa` varchar(8) NOT NULL COMMENT 'status = 1 jika kondisi baik, status = 2 jika mesin perlu pebaikan, status = 3 jika mesin sedang diperbaiki, status = 4 jika mesin selesai diperbaiki, status = 5 jika mesin rusak total ',
  `tanggal_masuk_mesin_sewa` datetime NOT NULL,
  `tanggal_keluar_mesin_sewa` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_mesin_sewa`
--

INSERT INTO `tb_mesin_sewa` (`id_mesin_sewa`, `nomor_mesin_sewa`, `id_jenis_mesin`, `lokasi_mesin_sewa`, `status_mesin_sewa`, `tanggal_masuk_mesin_sewa`, `tanggal_keluar_mesin_sewa`) VALUES
(14, 'SN-12345', 17, 'Line 99', '1', '1970-01-01 00:00:00', NULL),
(15, 'SN-789000', 17, 'Line 888', '3', '2018-02-01 00:00:00', '2018-02-28 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_jenis_mesin`
--
ALTER TABLE `tb_jenis_mesin`
  ADD PRIMARY KEY (`id_jenis_mesin`);

--
-- Indexes for table `tb_mesin_inventori`
--
ALTER TABLE `tb_mesin_inventori`
  ADD PRIMARY KEY (`id_mesin_inventori`);

--
-- Indexes for table `tb_mesin_sewa`
--
ALTER TABLE `tb_mesin_sewa`
  ADD PRIMARY KEY (`id_mesin_sewa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_jenis_mesin`
--
ALTER TABLE `tb_jenis_mesin`
  MODIFY `id_jenis_mesin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tb_mesin_inventori`
--
ALTER TABLE `tb_mesin_inventori`
  MODIFY `id_mesin_inventori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_mesin_sewa`
--
ALTER TABLE `tb_mesin_sewa`
  MODIFY `id_mesin_sewa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
