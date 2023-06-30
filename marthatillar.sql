-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2023 at 07:46 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `marthatillar`
--

-- --------------------------------------------------------

--
-- Table structure for table `master_item`
--

CREATE TABLE `master_item` (
  `id` int(11) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `kode_barang` varchar(255) NOT NULL,
  `status` tinyint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_item`
--

INSERT INTO `master_item` (`id`, `nama_barang`, `kode_barang`, `status`) VALUES
(2, 'barang 2', 'b002', 1),
(3, 'Barang A', 'c002', 3),
(5, 'Barang C', 'C003', 8);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `kode_barang` varchar(255) NOT NULL,
  `qty` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `kode_barang`, `qty`) VALUES
(1, 'a001', 20),
(3, 'a001', 2),
(5, 'a001', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `master_item`
--
ALTER TABLE `master_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `master_item`
--
ALTER TABLE `master_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
