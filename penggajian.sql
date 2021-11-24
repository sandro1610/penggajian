-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2021 at 05:45 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penggajian`
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
  `pulang` time DEFAULT NULL,
  `total_gaji_hari` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_absen`
--

INSERT INTO `tb_absen` (`id_absen`, `user_id`, `tanggal`, `datang`, `pulang`, `total_gaji_hari`, `status`) VALUES
(2, 3, '2021-07-18', '19:20:58', '19:21:54', 0, 1),
(6, 3, '2021-07-19', '08:00:00', '17:00:00', 270000, 1),
(7, 2, '2021-07-18', '08:00:00', '17:00:00', 225000, 1),
(8, 4, '2021-07-18', '08:00:00', '17:00:00', 243000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_gaji`
--

CREATE TABLE `tb_gaji` (
  `id_gaji` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pinjaman` int(11) NOT NULL DEFAULT 0,
  `iuran` int(11) NOT NULL DEFAULT 0,
  `makan` int(11) NOT NULL DEFAULT 0,
  `transport` int(11) NOT NULL DEFAULT 0,
  `operasional` int(11) NOT NULL,
  `total_gaji` int(11) NOT NULL,
  `periode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_gaji`
--

INSERT INTO `tb_gaji` (`id_gaji`, `user_id`, `pinjaman`, `iuran`, `makan`, `transport`, `operasional`, `total_gaji`, `periode`) VALUES
(1, 3, 200000, 0, 0, 0, 0, 470000, 7),
(2, 2, 100000, 0, 200000, 0, 0, 225000, 7),
(3, 4, 0, 0, 0, 0, 0, 243000, 7);

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
(4, 2, '2021-07-19', 'dadawawwadw', '0'),
(5, 4, '2021-07-18', 'Masuk', '2');

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
  `gaji_perjam` int(11) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `email`, `password`, `nama`, `alamat`, `no_rek`, `jabatan`, `tgl_masuk`, `gaji_perjam`, `level`) VALUES
(1, 'wahyu@gmail.com', '$2y$10$A/z/xrp5dk5PPNt4GTrEb.W10QIySKD.jxk3oZBvKKYAiikiVSp7W', 'Wahyu Akbar', 'Jalan Sama Kamu', '231322191', 'Manager', '2021-01-18', 100000, 'Admin'),
(2, 'mikhaelsandro82@gmail.com', '$2y$10$8tGZjmb0tp7TmK8yYtCPXur8hY39/wiN95nTYoXkQ4yiVD3whpmIW', 'Mikhael Sandro', 'Jalan Pelita Kencana', '443322321', 'Staf Keuangan', '2021-02-18', 25000, 'User'),
(3, 'hafiz@gmail.com', '$2y$10$i3v5gaFgWZfCxw9DZeAgqOOARLkT9jw.2kleNmj1.ppstS/tRz.fW', 'Hafiz Ibrahim', 'Jalan Harapan Abadi', '99098098098', 'Staf Agensi', '2021-02-18', 30000, 'User');

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
  MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_gaji`
--
ALTER TABLE `tb_gaji`
  MODIFY `id_gaji` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_izin`
--
ALTER TABLE `tb_izin`
  MODIFY `id_izin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
