-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2019 at 04:30 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `transaksi`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `jumlah_barang` int(10) NOT NULL,
  `harga_barang` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `jumlah_barang`, `harga_barang`) VALUES
(1, 'coca cola', 20, 4000),
(2, 'sabun nuvo', 18, 3500),
(3, 'permen yupi', 29, 4500),
(4, 'indomie goreng', 30, 2500),
(5, 'dairy milk 10gr', 29, 4000),
(6, 'dairy milk 30gr', 18, 8500);

-- --------------------------------------------------------

--
-- Table structure for table `sub_transaksi`
--

CREATE TABLE `sub_transaksi` (
  `id_subtransaksi` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `jumlah_beli` int(11) NOT NULL,
  `total_harga` varchar(20) NOT NULL,
  `no_invoice` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_transaksi`
--

INSERT INTO `sub_transaksi` (`id_subtransaksi`, `id_barang`, `id_transaksi`, `jumlah_beli`, `total_harga`, `no_invoice`) VALUES
(10, 4, 5, 2, '5000', '29/AD/dinda_petugas/18/11/43/25'),
(11, 1, 5, 2, '8000', '29/AD/dinda_petugas/18/11/43/25'),
(12, 3, 5, 5, '22500', '29/AD/dinda_petugas/18/11/43/25'),
(13, 5, 6, 5, '20000', '29/AD/dinda_petugas/18/11/45/07'),
(14, 3, 7, 10, '45000', '29/AD/dinda_petugas/18/12/20/35'),
(15, 6, 8, 2, '17000', '29/AD/dinda_petugas/18/12/33/15');

-- --------------------------------------------------------

--
-- Table structure for table `tempo`
--

CREATE TABLE `tempo` (
  `id_subtransaksi` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah_beli` int(11) NOT NULL,
  `total_harga` varchar(30) NOT NULL,
  `trx` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tempo`
--

INSERT INTO `tempo` (`id_subtransaksi`, `id_barang`, `jumlah_beli`, `total_harga`, `trx`) VALUES
(3, 2, 1, '3500', '02/AD/dinda_petugas/19'),
(4, 1, 1, '4000', '03/AD/dinda_petugas/19');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `tgl_transaksi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `kode_kasir` int(11) NOT NULL,
  `total_bayar` varchar(20) NOT NULL,
  `no_invoice` varchar(50) NOT NULL,
  `nama_pembeli` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `tgl_transaksi`, `kode_kasir`, `total_bayar`, `no_invoice`, `nama_pembeli`) VALUES
(5, '2018-11-29 10:43:25', 0, '35500', '29/AD/dinda_petugas/18/11/43/25', 'Dinda'),
(6, '2018-11-29 10:45:07', 0, '20000', '29/AD/dinda_petugas/18/11/45/07', 'Dindot'),
(7, '2018-11-29 11:20:35', 0, '45000', '29/AD/dinda_petugas/18/12/20/35', 'Kenny'),
(8, '2018-11-29 11:33:15', 0, '17000', '29/AD/dinda_petugas/18/12/33/15', 'S1mple');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `jenis_user` enum('admin','petugas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `password`, `jenis_user`) VALUES
(1, 'admin', '123', 'admin'),
(4, 'petugas_1', '123', 'petugas'),
(5, 'petugas_2', '123', 'petugas'),
(6, 'petugas_3', '123', 'petugas');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `sub_transaksi`
--
ALTER TABLE `sub_transaksi`
  ADD PRIMARY KEY (`id_subtransaksi`);

--
-- Indexes for table `tempo`
--
ALTER TABLE `tempo`
  ADD PRIMARY KEY (`id_subtransaksi`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sub_transaksi`
--
ALTER TABLE `sub_transaksi`
  MODIFY `id_subtransaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tempo`
--
ALTER TABLE `tempo`
  MODIFY `id_subtransaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
