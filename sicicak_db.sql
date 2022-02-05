-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 11, 2021 at 04:08 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sicicak_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `absen_masuk` varchar(30) NOT NULL,
  `absen_keluar` varchar(30) NOT NULL,
  `izin` varchar(30) NOT NULL,
  `alasan_izin` varchar(5000) NOT NULL,
  `waktu` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`id`, `nama`, `absen_masuk`, `absen_keluar`, `izin`, `alasan_izin`, `waktu`) VALUES
(73, 'ruber', '1631320212', '', '', '', '1631320212'),
(74, 'Rimba Dirgantara', '1631322505', '', '', '', '1631322505');

-- --------------------------------------------------------

--
-- Table structure for table `absensi_backup`
--

CREATE TABLE `absensi_backup` (
  `id` int(11) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `absen_masuk` varchar(100) NOT NULL,
  `absen_keluar` varchar(100) NOT NULL,
  `izin` varchar(100) NOT NULL,
  `alasan_izin` text NOT NULL,
  `waktu` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `absensi_backup`
--

INSERT INTO `absensi_backup` (`id`, `nama`, `absen_masuk`, `absen_keluar`, `izin`, `alasan_izin`, `waktu`) VALUES
(40, 'ruber', '1630905389', '1631245243', '', '', '1630905389'),
(41, 'Rimba Dirgantara', '1631003596', '', '', '', '1631003596'),
(42, 'ruber', '1631235130', '1631245243', '', '', '1631235130'),
(43, 'ruber', '1631320212', '', '', '', '1631320212'),
(44, 'Rimba Dirgantara', '1631322505', '', '', '', '1631322505');

-- --------------------------------------------------------

--
-- Table structure for table `porto`
--

CREATE TABLE `porto` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `token` varchar(6) NOT NULL,
  `hoby` text NOT NULL,
  `about` text NOT NULL,
  `pict_1` varchar(255) NOT NULL,
  `pict_2` varchar(255) NOT NULL,
  `pict_3` varchar(255) NOT NULL,
  `pict_4` varchar(255) NOT NULL,
  `pict_5` varchar(255) NOT NULL,
  `your_pict` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `porto`
--

INSERT INTO `porto` (`id`, `nama`, `token`, `hoby`, `about`, `pict_1`, `pict_2`, `pict_3`, `pict_4`, `pict_5`, `your_pict`, `time`) VALUES
(1, 'ruber ', 'I%2FWL', 'testing', 'testing', '613bfd46d1353.jpg', '613bfd46d1596.jpg', '613bfd46d1704.jpg', '613bfd46d184d.jpg', '613bfd46d19c7.jpg', '613bfd46d1b4f.jpg', '1631321414'),
(2, 'Rimba Dirgantara ', 'N4Updd', 'Programming | Muaythai | Game | Vector Artist', 'hi, my name is rimba, everyone calls me cicak, iam 18 y.o, i life at rusunawa polbeng, iam a student in Politeknik Negeri Bengkalis, i major Informatics Engineering and my study program is System Information Security', '613c0326a1fdf.jpg', '613c0326a250e.jpg', '613c0326a27ca.jpg', '613c0326a298f.jpg', '613c0326a2b4e.jpg', '613c0326a2cfc.jpg', '1631322918');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(25) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(20) NOT NULL,
  `waktu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `nama`, `password`, `level`, `waktu`) VALUES
(15, 'admin@sicicak.com', 'Sicicak gans', '$2y$10$yXP3WXqlPS/wYuS113HiU.ZUUu9L9iBWI9M3RT72IYU2PLCAettx6', 'admin', '1630454683'),
(16, 'ime12@gmail.com', 'Ime Yang', '$2y$10$QWdxod5oTxPBLHQ4oqmbJuI31Nvb5GMm7mdMEiPKdjItZW3Ktacjy', 'user', '1630477616'),
(20, 'ruber@gmail.com', 'ruber', '$2y$10$rQe5rAEFq88g1OEsRu6afOqK.W9NAa/aHyMVZQC49Ez5GPK/B8LQO', 'user', '1630504793'),
(25, 'mcsegypt17@gmail.com', 'Rimba Dirgantara', '$2y$10$aecWvEYj2eulMTPgeOpAg.GbG2NG0F/pJWpPoSPikwVlLtOt0xnFG', 'user', '1631003578'),
(26, 'rimba@gmail.com', 'Rimba Dirgantara', '$2y$10$eSUvms3ntFO6M7fNrlfyMuSZjZuvtdB.zchXrBvV1x2lGXTF9AvSO', 'user', '1631322490');

-- --------------------------------------------------------

--
-- Table structure for table `user_tokens`
--

CREATE TABLE `user_tokens` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `token` varchar(200) NOT NULL,
  `waktu` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `absensi_backup`
--
ALTER TABLE `absensi_backup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `porto`
--
ALTER TABLE `porto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_tokens`
--
ALTER TABLE `user_tokens`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `absensi_backup`
--
ALTER TABLE `absensi_backup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `porto`
--
ALTER TABLE `porto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `user_tokens`
--
ALTER TABLE `user_tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
