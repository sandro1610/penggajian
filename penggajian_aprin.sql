-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2021 at 03:43 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penggajian_aprin`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_absen`
--

CREATE TABLE `tb_absen` (
  `id_absen` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `datang` time NOT NULL,
  `transport` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_absen`
--

INSERT INTO `tb_absen` (`id_absen`, `user_id`, `tanggal`, `datang`, `transport`, `status`) VALUES
(1, 10, '2021-12-08', '09:23:02', 10000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_gaji`
--

CREATE TABLE `tb_gaji` (
  `id_gaji` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pinjaman` int(11) NOT NULL DEFAULT 0,
  `iuran` int(11) NOT NULL DEFAULT 0,
  `tunjangan_jabatan` int(11) NOT NULL DEFAULT 0,
  `transport` int(11) NOT NULL DEFAULT 0,
  `honor_ngajar` int(11) NOT NULL,
  `honor_lainnya` int(11) NOT NULL DEFAULT 0,
  `total_gaji` int(11) NOT NULL,
  `periode` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_gaji`
--

INSERT INTO `tb_gaji` (`id_gaji`, `user_id`, `pinjaman`, `iuran`, `tunjangan_jabatan`, `transport`, `honor_ngajar`, `honor_lainnya`, `total_gaji`, `periode`) VALUES
(1, 10, 0, 0, 0, 10000, 0, 0, 1200000, '2022-01-08');

-- --------------------------------------------------------

--
-- Table structure for table `tb_izin`
--

CREATE TABLE `tb_izin` (
  `id_izin` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` text NOT NULL,
  `status` varchar(30) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `email` varchar(35) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `no_rek` varchar(17) NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `tgl_masuk` date DEFAULT NULL,
  `transport_hari` int(11) NOT NULL DEFAULT 10000,
  `gaji` int(11) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `email`, `password`, `nama`, `alamat`, `no_rek`, `jabatan`, `tgl_masuk`, `transport_hari`, `gaji`, `level`) VALUES
(1, 'mikhaelsandro82@gmail.com', '$2y$10$/M2XlJQyLXSEA4Y3jsS1K.R/a2dRZmX1EmKehYcYHGT.0ZOVCwjxS', 'Mikhael Sandro', 'Perumahan Bukit Sejahtera Blok BS No.3', '0809283443', 'Staff IT', '2021-11-25', 10000, 1200000, 'Admin'),
(2, 'kurniarizkiki@gmail.com', '$2y$10$TPeBjXzJyGfPOal277R/x.GSmPSLqDAmw7MoBiG5C.C3WAFaH.NNe', 'Kurnia Rizkiki, A.Md', 'JL.Silaberanti No. 768 Palembang', '112-00-1671966-3', 'PU Pasca Sarjana', '2021-11-24', 10000, 1200000, 'User'),
(3, 'aldiseptian@gmail.com', '$2y$10$u6vgyF/gt5UKRu8b8UCLO.YPoGpzbu1zjER3WXqltoXzVVBPt0GUq', 'Aldi Pratama', 'KOMP.BOSTER BLOK 23 PALEMBANG', '113-00-1579531-7', 'Staff PDPT S1', '2021-11-24', 10000, 1200000, 'User'),
(4, 'nozylianty@gmail.com', '$2y$10$obG7.H37/WmSGGJKJrqLI.hXBuPUIxwxXkqaxPJpB5poO2wObAJt2', 'Nozylianty', 'Perumahan Jaya Raya Indonesia Blok C No.12', '112-00-1812689-1', 'Dosen', '2021-11-24', 10000, 1700000, 'User'),
(5, 'alisadikin@gmail.com', '$2y$10$ccDX2oDrwv62V.OS1uk/i.oDVAm6lSpF1TlRrHCZv82vVInSpxPlK', 'Dr. Drs. Ali Sadikin., M.Si', 'KOMP.MEGA ASRI BLOK A3 PALEMBANG', '0809283443', 'Dosen', '2021-11-24', 10000, 2100000, 'User'),
(6, 'zulkipli@gmail.com', '$2y$10$9GQoF600jSHmfUqZnK0UFuEu19M7GcrlwGOXY5VeCCo9Bf7lMS/9W', 'Dr. Zukipli Djamin,MM', 'JL.RAMA 8 RT.003/001 NO.43 PALEMBANG', '4543532342', 'Dosen', '2021-11-30', 10000, 2100000, 'User'),
(7, 'hendri@gmail.com', '$2y$10$ywd5.PZ/dcn7s7.fSglSLOyqa37k.Z2PIIB.wapn.5wn8wmierh.C', 'Dr. Hendri Wijaya., SE.,M.Si', 'Perumahan Bukit Sejahtera Blok BS No.3', '0809283443', 'Dosen', '2021-11-16', 10000, 1700000, 'User'),
(8, 'jafrizal@gmail.com', '$2y$10$I80eiQ9eZXcHDyiQfCiEaOTMEVBMUno5VYyvmrd2KfUgIuAc3wWSO', 'Dr. Jafrizal., MM', 'JL.RIMBA KEMUNING NO.3456 PALEMBANG', '113-00-1565953-9', 'Dosen', '2021-11-16', 10000, 1700000, 'User'),
(9, 'saiful@gmail.com', '$2y$10$.EL9XpkfIlPgYol8mpMaWePvBVuEyhCVaTGWvrKllBkZRZMjkCvka', 'Saiful', 'KOMP.MEGA ASRI BLOK A3 PALEMBANG', '0809283443', 'Officeboy', '2021-11-24', 10000, 1000000, 'User'),
(10, 'msandro1610@gmail.com', '$2y$10$/aO8ZqYP3vREwS4NuFqRWuALjxe22RFghAhz1s6cSouJZFglk3bTW', 'Mikhael Sandro', 'Perumahan Bukit Sejahtera Blok BS No.3', '0809283443', 'Staff IT', '2021-11-24', 10000, 1200000, 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_absen`
--
ALTER TABLE `tb_absen`
  ADD PRIMARY KEY (`id_absen`);

--
-- Indexes for table `tb_gaji`
--
ALTER TABLE `tb_gaji`
  ADD PRIMARY KEY (`id_gaji`);

--
-- Indexes for table `tb_izin`
--
ALTER TABLE `tb_izin`
  ADD PRIMARY KEY (`id_izin`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_absen`
--
ALTER TABLE `tb_absen`
  MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_gaji`
--
ALTER TABLE `tb_gaji`
  MODIFY `id_gaji` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_izin`
--
ALTER TABLE `tb_izin`
  MODIFY `id_izin` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
