-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2024 at 06:08 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `latihan`
--

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(3) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `asal` varchar(50) NOT NULL,
  `tujuan` enum('jakarta','bandung','surabaya','') NOT NULL,
  `class` enum('vip','panoramic','ekonomi','') NOT NULL,
  `jumlah` int(3) NOT NULL,
  `bagasi` enum('yes','tidak') NOT NULL,
  `total` int(7) NOT NULL,
  `tgl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `nama`, `asal`, `tujuan`, `class`, `jumlah`, `bagasi`, `total`, `tgl`) VALUES
(39, 'budi', 'bandung', 'surabaya', 'vip', 5, 'yes', 5050000, '2024-10-26'),
(41, 'reifan', 'bandung', 'jakarta', 'panoramic', 7, 'yes', 14050000, '2024-10-23'),
(42, 'nanda hanif', 'semarang', 'bandung', 'vip', 2, 'yes', 1850000, '2024-10-23'),
(43, 'Juliann', 'Tegalrejo', 'surabaya', 'panoramic', 5, 'tidak', 7500000, '2024-10-23'),
(44, 'reifan ahmad muhidin', 'semarang', 'jakarta', 'vip', 2, 'yes', 3050000, '2024-10-23'),
(45, 'hanif', 'semarang', 'bandung', 'vip', 2, 'yes', 1850000, '2024-10-23'),
(48, 'nanda hanif abyan bromo putra', 'magelang', 'surabaya', 'ekonomi', 2, 'tidak', 400000, '2024-10-23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
