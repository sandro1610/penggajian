-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2021 at 07:18 AM
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
(2, 3, '2021-07-18', '19:20:58', 0, 1),
(6, 3, '2021-07-19', '08:00:00', 270000, 1),
(7, 2, '2021-07-18', '08:00:00', 225000, 1),
(8, 4, '2021-07-18', '08:00:00', 243000, 1),
(11, 2, '2021-07-26', '23:28:31', 0, 1),
(13, 8, '2021-09-14', '09:44:01', 0, 1),
(14, 3, '2021-09-14', '09:44:35', 0, 1),
(15, 3, '2021-09-23', '18:37:53', 0, 0),
(16, 2, '2021-11-24', '08:50:24', 0, 1),
(23, 2, '2021-11-27', '13:45:20', 25000, 1),
(24, 3, '2021-11-27', '14:33:04', 30000, 1),
(25, 2, '2021-11-30', '15:37:05', 25000, 1),
(26, 2, '2021-12-03', '10:57:36', 25000, 1),
(27, 2, '2021-12-04', '08:55:19', 25000, 1),
(30, 7, '2021-12-04', '13:02:46', 20000, 1);

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
(2, 2, 100000, 20000, 200000, 0, 0, 0, 675000, '0000-00-00'),
(3, 4, 0, 0, 0, 0, 0, 0, 243000, '0000-00-00'),
(4, 8, 0, 0, 0, 0, 0, 0, 0, '0000-00-00'),
(5, 3, 0, 0, 0, 0, 0, 0, 0, '0000-00-00'),
(9, 2, 0, 0, 200000, 50000, 0, 0, 1750000, '0000-00-00'),
(10, 3, 0, 0, 0, 30000, 0, 0, 1750000, '0000-00-00'),
(11, 2, 0, 0, 0, 50000, 0, 0, 1750000, '2022-01-01'),
(14, 7, 0, 0, 0, 20000, 0, 0, 1000000, '2022-01-08');

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

--
-- Dumping data for table `tb_izin`
--

INSERT INTO `tb_izin` (`id_izin`, `user_id`, `tanggal`, `keterangan`, `status`) VALUES
(2, 3, '2021-07-19', 'Mudik', '2'),
(3, 2, '2021-07-18', 'Makan', '2'),
(5, 4, '2021-07-18', 'Masuk', '2'),
(6, 2, '2021-07-29', 'Mudik', '2');

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
  `transport_hari` int(11) NOT NULL,
  `gaji` int(11) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `email`, `password`, `nama`, `alamat`, `no_rek`, `jabatan`, `tgl_masuk`, `transport_hari`, `gaji`, `level`) VALUES
(1, 'wahyu@gmail.com', '$2y$10$A/z/xrp5dk5PPNt4GTrEb.W10QIySKD.jxk3oZBvKKYAiikiVSp7W', 'Wahyu Akbar', 'Jalan Sama Kamu', '231322191', 'Manager', '2021-01-18', 100000, 1750000, 'Admin'),
(2, 'mikhaelsandro82@gmail.com', '$2y$10$8tGZjmb0tp7TmK8yYtCPXur8hY39/wiN95nTYoXkQ4yiVD3whpmIW', 'Mikhael Sandro', 'Jalan Pelita Kencana', '443322321', 'Staf Keuangan', '2021-02-18', 25000, 1750000, 'User'),
(3, 'hafiz@gmail.com', '$2y$10$i3v5gaFgWZfCxw9DZeAgqOOARLkT9jw.2kleNmj1.ppstS/tRz.fW', 'Hafiz Ibrahim', 'Jalan Harapan Abadi', '99098098098', 'Staf Agensi', '2021-02-18', 30000, 1750000, 'User'),
(5, 'rizkioktalia@gmail.com', '$2y$10$/7Y71sXu9Ps3N3JGKgWOdO5zCEVTpteaMR9b/UG.F7CD2VI4QjZ0C', 'Rizki Oktalia', 'JL.RAMA 8 RT.003/001 NO.43 PALEMBANG', '0809283443', 'Administrasi', '2020-06-17', 25000, 2000000, 'User'),
(6, 'DWIIKAANGGRAINI@gmail.com', '$2y$10$EbeOGj/VHxPkgIsBlmDLKOU41/Dg9nJq4wPmpjm8ZIcA5oh4qcRFi', 'DWI IKA ANGGRAINI', 'KOMP.MEGA ASRI BLOK A3 PALEMBANG', '12943324484922', 'KEUANGAN', '2019-06-20', 30000, 2300000, 'User'),
(7, 'RESIJATRI@gmail.com', '$2y$10$G7X/PEVcHvfuCmTePUQN..w9AqD5tr9E8zhSKAHQU20zer8kLrViK', 'RESI  JATRI', 'KOMP.PEMDA BLOK 34 PALEMBANG', '433482821', 'Administrasi', '2021-09-13', 20000, 1000000, 'User'),
(10, 'TOMJAKA@gmail.com', '$2y$10$mhpANPk7rTskSgz3eHCpd.J7n2N8qqujozEsxkVD8YV5IrxhkxP7e', 'TOM JAKA', 'KOMP.MULTIWAHANA SAKO PALEMBANG', '4543532342', 'MARKETING', '2020-06-14', 30000, 2300000, 'User'),
(11, 'IDILFITRISYAH@gmail.com', '$2y$10$pKLno5fRCb9s0xWG1cT8N.62Oz88QZ3orFjujcN.sdQ75JQQMNfKq', 'IDIL FITRISYAH', 'KOMP.BOSTER BLOK 23 PALEMBANG', '90909890', 'SIPIL', '2020-05-05', 35000, 1400000, 'User');

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
  MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tb_gaji`
--
ALTER TABLE `tb_gaji`
  MODIFY `id_gaji` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_izin`
--
ALTER TABLE `tb_izin`
  MODIFY `id_izin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
