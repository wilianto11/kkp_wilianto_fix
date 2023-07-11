-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 11, 2023 at 07:51 AM
-- Server version: 10.5.20-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id19193318_perda`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(10) NOT NULL,
  `nama_admin` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('admin','petugas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `username`, `password`, `level`) VALUES
(1, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(3, 'wili', 'wili', '202cb962ac59075b964b07152d234b70', 'petugas'),
(5, 'admin2', 'admin2', '21232f297a57a5a743894a0e4a801fc3', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `opd`
--

CREATE TABLE `opd` (
  `id_opd` int(10) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `opd`
--

INSERT INTO `opd` (`id_opd`, `nama`, `username`, `password`) VALUES
(2, 'dinas pendidikan', 'disdik', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan`
--

CREATE TABLE `pengajuan` (
  `id_pengajuan` varchar(10) NOT NULL,
  `kategori` enum('Perubahan Rancangan Peraturan Daerah','Rancangan Peraturan Daerah Baru') NOT NULL,
  `tgl_pengajuan` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_opd` int(10) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `materi` text NOT NULL,
  `file_docx` varchar(255) DEFAULT NULL,
  `file_pdf` varchar(255) DEFAULT NULL,
  `target_tw` enum('TW.1','TW.2','TW.3','TW.4') NOT NULL,
  `keterangan` enum('Baru','Rutin','Usulan Sebelumnya') NOT NULL,
  `status` enum('proses','terima','tolak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pengajuan`
--

INSERT INTO `pengajuan` (`id_pengajuan`, `kategori`, `tgl_pengajuan`, `id_opd`, `judul`, `materi`, `file_docx`, `file_pdf`, `target_tw`, `keterangan`, `status`) VALUES
('NID0010', 'Perubahan Rancangan Peraturan Daerah', '2022-04-18 16:43:52', 2, 'wefwfewfewf', 'fewfwfwefewfwef', NULL, NULL, 'TW.1', 'Baru', 'terima'),
('NID0011', 'Perubahan Rancangan Peraturan Daerah', '2022-04-18 16:52:07', 2, 'gyvfucyuctyucucuyc', 'gesegsrgrdgrdgrdg', NULL, NULL, 'TW.1', 'Rutin', 'terima'),
('NID0012', 'Perubahan Rancangan Peraturan Daerah', '2022-04-18 16:49:09', 2, 'jjhvjvjvjvjhvjhvjvj', 'drrgrdgrdgrdgrd', NULL, NULL, 'TW.3', 'Baru', 'terima'),
('NID004', 'Perubahan Rancangan Peraturan Daerah', '2022-04-17 15:14:28', 2, 'materi', 'SA,DNASKJBDKASJ', '', '', 'TW.1', 'Baru', ''),
('NID005', 'Perubahan Rancangan Peraturan Daerah', '2022-04-18 15:59:39', 2, 'jhhffgfhsajgdjagsjd', 'SADNASKJBDKASJ', '', '', 'TW.1', 'Baru', 'tolak'),
('NID006', 'Perubahan Rancangan Peraturan Daerah', '2022-04-18 15:58:19', 2, 'jhhffgfhsajgdjagsjd', 'sfsfsdfsfs', '1650087337670_Pengumuman+Yudisium+Mei+Genap+2021-2022+%282%29.pdf', '1650087337670_Pengumuman+Yudisium+Mei+Genap+2021-2022+%282%29.pdf', 'TW.1', 'Baru', 'tolak'),
('NID007', 'Perubahan Rancangan Peraturan Daerah', '2022-04-18 15:55:27', 2, 'jhhffgfhsajgdjagsjd', 'SADNASKJBDKASJ', '1650087337670_Pengumuman+Yudisium+Mei+Genap+2021-2022+%282%29.pdf', '1650087337670_Pengumuman+Yudisium+Mei+Genap+2021-2022+%282%29.pdf', 'TW.1', 'Baru', 'terima'),
('NID008', 'Perubahan Rancangan Peraturan Daerah', '2022-04-18 16:43:18', 2, 'jhhffgfhsajgdjagsjd', 'SA,DNASKJBDKASJ', '', '', 'TW.1', 'Baru', 'terima'),
('NID009', 'Perubahan Rancangan Peraturan Daerah', '2022-05-03 12:00:40', 2, 'bjguvyyvyv', 'yfguyfufugu', 'Bab_2.docx', 'BAB I.pdf', 'TW.1', 'Usulan Sebelumnya', 'tolak'),
('NID010', 'Perubahan Rancangan Peraturan Daerah', '2022-05-18 04:42:00', 2, 'test', 'test', 'Propemperda Th 2022.pdf', '', 'TW.1', 'Baru', 'tolak'),
('NID011', 'Perubahan Rancangan Peraturan Daerah', '2022-05-18 04:43:20', 2, '', '', 'WhatsApp Image 2022-05-12 at 11.31.42.jpeg', '', 'TW.1', 'Baru', 'proses'),
('NID012', 'Perubahan Rancangan Peraturan Daerah', '2022-05-18 04:44:16', 2, 'test', 'rancangan', 'proposal-pemrograman-mobile.pdf', '', 'TW.1', 'Baru', 'proses'),
('NID013', 'Perubahan Rancangan Peraturan Daerah', '2022-05-18 04:48:04', 2, 'trdtrstststdy', 'dtrdtdtdrt', 'pemda.jpg', '44772_kkp (1).pdf', 'TW.1', 'Baru', 'proses'),
('NID014', 'Perubahan Rancangan Peraturan Daerah', '2022-05-23 08:17:15', 2, '3454354', 'rtddgdgfd', 'dimah 17 mei.pdf', '', 'TW.1', 'Baru', 'proses'),
('NID015', 'Perubahan Rancangan Peraturan Daerah', '2022-05-23 08:17:39', 2, 'ytrymbmhvhjvhjvhjvjhvjhvjyguy', 'jgjgjghfhgfgdfdrsreyygj', 'kabag ,supiyadi 20 mei.pdf', '', 'TW.1', 'Baru', 'proses'),
('NID016', 'Perubahan Rancangan Peraturan Daerah', '2022-05-23 08:20:50', 2, 'gjgjgjhfgfdsfsdsgdhjgjkhjhlk', 'tfytryfhgfgdgffdsdae', 'kabag ,supiyadi 20 mei.pdf', 'dimah 17 mei.pdf', 'TW.1', 'Baru', 'proses'),
('NID017', 'Perubahan Rancangan Peraturan Daerah', '2022-05-23 08:24:49', 2, 'yuqwyeqweuyvqwuyvqwu', 'aknibduwgdywgdwtey', 'download.png', 'download.png', 'TW.1', 'Baru', 'proses'),
('NID018', 'Perubahan Rancangan Peraturan Daerah', '2022-05-23 08:27:43', 2, '54345243234132', '76576576576576', 'laporan kkp bab 1 (koreksi 14-5-22).pdf', 'BAB I.pdf', 'TW.1', 'Baru', 'proses'),
('NID019', 'Perubahan Rancangan Peraturan Daerah', '2022-05-24 04:25:09', 2, 'wkdwajdbvwjbdwakjbdk', 'wkqhdiuwdbwiadouawnd', '2020perbup32160002.pdf', '2020perbup32160004.pdf', 'TW.1', 'Baru', 'proses'),
('NID020', 'Perubahan Rancangan Peraturan Daerah', '2022-05-24 06:24:42', 2, 'disdik', 'hakjdhaskjdhakj', '2020perbup32160015.pdf', '2020perbup32160018.pdf', 'TW.1', 'Rutin', 'proses');

-- --------------------------------------------------------

--
-- Table structure for table `tanggapan`
--

CREATE TABLE `tanggapan` (
  `id_tanggapan` int(10) NOT NULL,
  `id_pengajuan` varchar(10) NOT NULL,
  `tgl_tanggapan` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tanggapan` text NOT NULL,
  `id_admin` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tanggapan`
--

INSERT INTO `tanggapan` (`id_tanggapan`, `id_pengajuan`, `tgl_tanggapan`, `tanggapan`, `id_admin`) VALUES
(3, 'NID007', '2022-04-17 17:00:00', '', 3),
(4, 'NID006', '0000-00-00 00:00:00', '', 3),
(5, 'NID005', '0000-00-00 00:00:00', '', 3),
(6, 'NID0010', '0000-00-00 00:00:00', '', 3),
(7, 'NID0011', '0000-00-00 00:00:00', '', 3),
(8, 'NID0012', '0000-00-00 00:00:00', '', 3),
(9, 'NID008', '2022-04-17 23:43:18', '', 3),
(10, 'NID0010', '2022-04-17 23:43:52', '', 3),
(11, 'NID0012', '2022-04-18 04:49:09', '', 3),
(12, 'NID0011', '2022-04-18 16:52:07', '', 3),
(13, 'NID009', '2022-05-03 12:00:40', 'file terlalu besar', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `opd`
--
ALTER TABLE `opd`
  ADD PRIMARY KEY (`id_opd`);

--
-- Indexes for table `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD PRIMARY KEY (`id_pengajuan`),
  ADD KEY `pengajuan` (`id_opd`);

--
-- Indexes for table `tanggapan`
--
ALTER TABLE `tanggapan`
  ADD PRIMARY KEY (`id_tanggapan`),
  ADD KEY `tanggapan_ibfk_1` (`id_pengajuan`),
  ADD KEY `tanggapan_ibfk_2` (`id_admin`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `opd`
--
ALTER TABLE `opd`
  MODIFY `id_opd` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tanggapan`
--
ALTER TABLE `tanggapan`
  MODIFY `id_tanggapan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD CONSTRAINT `pengajuan` FOREIGN KEY (`id_opd`) REFERENCES `opd` (`id_opd`);

--
-- Constraints for table `tanggapan`
--
ALTER TABLE `tanggapan`
  ADD CONSTRAINT `tanggapan_ibfk_1` FOREIGN KEY (`id_pengajuan`) REFERENCES `pengajuan` (`id_pengajuan`),
  ADD CONSTRAINT `tanggapan_ibfk_2` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
