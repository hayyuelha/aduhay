-- phpMyAdmin SQL Dump
-- version 4.3.5
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2015 at 03:50 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `aduhay_db`
--

USE `aduhay_db`;
-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL,
  `nama` varchar(256) NOT NULL,
  `username` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `aduan`
--

CREATE TABLE IF NOT EXISTS `aduan` (
  `id` int(11) NOT NULL,
  `waktu` datetime NOT NULL,
  `deskripsi` text NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_status` int(11) NOT NULL,
  `id_taman` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `id` int(11) NOT NULL,
  `nama_kategori` varchar(65) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama_kategori`) VALUES
(1, 'Infrastruktur'),
(2, 'Kebersihan'),
(3, 'Keamanan'),
(4, 'Lingkungan Hidup'),
(5, 'Lain-lain');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `id` int(11) NOT NULL,
  `nama_status` varchar(65) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `nama_status`) VALUES
(1, 'Menunggu konfirmasi'),
(2, 'Ditolak'),
(3, 'Sedang ditanggapi'),
(4, 'Sudah ditanggulangi');

-- --------------------------------------------------------

--
-- Table structure for table `taman`
--

CREATE TABLE IF NOT EXISTS `taman` (
  `id` int(11) NOT NULL,
  `nama` varchar(256) NOT NULL,
  `lokasi` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `taman`
--

INSERT INTO `taman` (`id`, `nama`, `lokasi`) VALUES
(1, 'Taman Maluku', 'Jalan Maluku'),
(2, 'Taman Ganesha', 'Jalan Ganesha'),
(3, 'Taman Jomblo', 'Jalan layang Pasupati, Tamansari'),
(4, 'Taman Persib', 'Jalan W.R Supratman'),
(5, 'Taman Vanda', 'Jalan Merdeka bawah'),
(6, 'Taman Pustaka Bunga Cilaki', 'Jalan Diponegoro'),
(7, 'Taman Fotografi', 'Jalan Anggrek'),
(8, 'Taman Film', 'Jalan layang Pasupati, Tamansari'),
(9, 'Taman Musik', 'Jalan Belitung'),
(10, 'Taman Lansia', 'Jalan Cisangkuy'),
(11, 'Taman Superhero', 'Jalan Anggrek'),
(12, 'Taman Alun-Alun', ''),
(13, 'Taman Badak Putih', ''),
(14, 'Taman Pramuka', ''),
(15, 'Taman Cibeunying', ''),
(16, 'Taman Dewi Sartika', 'Balai Kota'),
(17, 'Taman Anak Tongkeng', 'Jalan Tongkeng'),
(18, 'Taman Hutan Raya Ir. H. Djuanda', 'Kampung Pakar, Desa Ciburial, Kecamatan Cimenyan'),
(19, 'Taman Fitness', 'Jalan Imam Bonjol'),
(20, 'Skate Park', 'Jalan Layang Pasupati Bandung'),
(21, 'Taman Piknik', ''),
(22, 'Taman Caang Baranang', ''),
(23, 'Study Park', '');

-- --------------------------------------------------------

--
-- Table structure for table `ubah_status`
--

CREATE TABLE IF NOT EXISTS `ubah_status` (
  `id` int(11) NOT NULL,
  `id_aduan` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `id_status` int(11) NOT NULL,
  `waktu` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aduan`
--
ALTER TABLE `aduan`
  ADD PRIMARY KEY (`id`), ADD KEY `id_taman` (`id_taman`), ADD KEY `id_kategori` (`id_kategori`), ADD KEY `id_status` (`id_status`), ADD KEY `id_taman_2` (`id_taman`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `taman`
--
ALTER TABLE `taman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ubah_status`
--
ALTER TABLE `ubah_status`
  ADD PRIMARY KEY (`id`), ADD KEY `id_aduan` (`id_aduan`,`id_admin`), ADD KEY `id_admin` (`id_admin`), ADD KEY `id_status` (`id_status`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `aduan`
--
ALTER TABLE `aduan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `taman`
--
ALTER TABLE `taman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `ubah_status`
--
ALTER TABLE `ubah_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `aduan`
--
ALTER TABLE `aduan`
ADD CONSTRAINT `aduan_ibfk_1` FOREIGN KEY (`id_taman`) REFERENCES `taman` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `aduan_ibfk_2` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `aduan_ibfk_3` FOREIGN KEY (`id_status`) REFERENCES `status` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ubah_status`
--
ALTER TABLE `ubah_status`
ADD CONSTRAINT `ubah_status_ibfk_1` FOREIGN KEY (`id_aduan`) REFERENCES `aduan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `ubah_status_ibfk_2` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `ubah_status_ibfk_3` FOREIGN KEY (`id_status`) REFERENCES `status` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
