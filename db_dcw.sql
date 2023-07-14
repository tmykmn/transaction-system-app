-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2021 at 05:32 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_dcw`
--

-- --------------------------------------------------------

--
-- Table structure for table `databiaya`
--

CREATE TABLE `databiaya` (
  `id_biaya` int(10) NOT NULL,
  `jenis_kendaraan` varchar(50) NOT NULL,
  `gol_kendaraan` varchar(50) NOT NULL,
  `biaya` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `databiaya`
--

INSERT INTO `databiaya` (`id_biaya`, `jenis_kendaraan`, `gol_kendaraan`, `biaya`) VALUES
(5, 'Motor', 'Gede', 20000),
(6, 'Motor', 'Standar', 15000),
(7, 'Motor', 'Ojol', 13000),
(8, 'Mobil', 'Besar', 45000),
(9, 'Mobil', 'Biasa', 40000),
(10, 'Mobil', 'Taxi Online', 35000),
(11, 'Mobil', 'Truk', 70000),
(12, 'motor', 'bebek', 120000);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `no_nota` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis_kendaraan` varchar(50) NOT NULL,
  `gol_kendaraan` varchar(50) NOT NULL,
  `biaya` int(11) NOT NULL,
  `bayar` int(10) NOT NULL,
  `kembalian` int(10) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`no_nota`, `nama`, `jenis_kendaraan`, `gol_kendaraan`, `biaya`, `bayar`, `kembalian`, `tanggal`) VALUES
('MB001', 'Tama', 'Motor', 'Gede', 20000, 50000, 30000, '2020-11-12'),
('MB002', 'Doni', 'Mobil', 'Besar', 45000, 50000, 5000, '2020-11-12'),
('MB003', 'Riki', 'Mobil', 'Truk', 70000, 100000, 30000, '2020-11-12'),
('MB004', 'taqin', 'Motor', 'Standar', 15000, 20000, 5000, '2020-01-01'),
('MB005', 'onces', 'Mobil', 'Besar', 45000, 50000, 5000, '2020-01-09'),
('MB006', 'adelia', 'Mobil', 'Biasa', 40000, 100000, 60000, '2020-01-21'),
('MB007', 'vivi', 'Mobil', 'Besar', 45000, 100000, 55000, '2020-01-10'),
('MB008', 'paijo', 'Motor', 'Ojol', 13000, 15000, 2000, '2020-01-11'),
('MB009', 'supratno', 'Motor', 'Gede', 20000, 20000, 0, '2020-01-12'),
('MB010', 'sutrisno', 'Mobil', 'Truk', 70000, 100000, 30000, '2020-01-13'),
('MB011', 'surti', 'Motor', 'Standar', 15000, 20000, 5000, '2020-01-13'),
('MB012', 'anto', 'Mobil', 'Taxi Online', 35000, 50000, 15000, '2020-01-14'),
('MB013', 'mina', 'Mobil', 'Biasa', 40000, 50000, 10000, '2020-01-15'),
('MB014', 'mina', 'Mobil', 'Besar', 45000, 50000, 5000, '2020-02-01'),
('MB015', 'razak', 'Mobil', 'Besar', 45000, 100000, 55000, '2020-02-02'),
('MB016', 'ratna', 'Motor', 'Gede', 20000, 100000, 80000, '2020-02-02'),
('MB018', 'juki', 'Motor', 'Ojol', 13000, 50000, 37000, '2020-02-04'),
('MB019', 'basmi', 'Mobil', 'Truk', 70000, 100000, 30000, '2020-02-04'),
('MB020', 'lukman', 'Motor', 'Gede', 20000, 100000, 80000, '2020-02-06'),
('MB021', 'aldi', 'Motor', 'Ojol', 13000, 100000, 87000, '2020-02-07'),
('MB022', 'aldo', 'Motor', 'Ojol', 13000, 20000, 7000, '2020-02-09'),
('MB023', 'aliando', 'Mobil', 'Truk', 70000, 100000, 30000, '2020-02-09'),
('MB024', 'ji chang wook', 'Motor', 'Ojol', 13000, 100000, 87000, '2020-03-01'),
('MB025', 'bradpitt', 'Mobil', 'Truk', 70000, 100000, 30000, '2020-03-03'),
('MB026', 'thor', 'Mobil', 'Taxi Online', 35000, 50000, 15000, '2020-03-04'),
('MB027', 'thor', 'Motor', 'Gede', 20000, 50000, 30000, '2020-03-12'),
('MB028', 'steven roger', 'Mobil', 'Biasa', 40000, 100000, 60000, '2020-03-13'),
('MB029', 'peter', 'Motor', 'Ojol', 13000, 20000, 7000, '2020-03-13'),
('MB030', 'jonathan', 'Mobil', 'Truk', 70000, 100000, 30000, '2020-03-14'),
('MB031', 'ucup', 'Motor', 'Ojol', 13000, 20000, 7000, '2020-04-01'),
('MB032', 'hans', 'Mobil', 'Truk', 70000, 100000, 30000, '2020-04-03'),
('MB033', 'miku', 'Motor', 'Standar', 15000, 50000, 35000, '2020-04-04'),
('MB034', 'arie', 'Mobil', 'Biasa', 40000, 50000, 10000, '2020-04-05'),
('MB035', 'taqin', 'Motor', 'Standar', 15000, 20000, 5000, '2020-04-09'),
('MB036', 'taqin', 'Mobil', 'Besar', 45000, 50000, 5000, '2020-04-10'),
('MB037', 'tama', 'Motor', 'Gede', 20000, 50000, 30000, '2020-05-14'),
('MB038', 'juminten', 'Mobil', 'Taxi Online', 35000, 50000, 15000, '2020-05-15'),
('MB039', 'boni', 'Motor', 'Standar', 15000, 20000, 5000, '2020-05-15'),
('MB040', 'naruto', 'Mobil', 'Truk', 70000, 100000, 30000, '2020-05-16'),
('MB041', 'sasuke', 'Motor', 'Gede', 20000, 100000, 80000, '2020-05-16'),
('MB042', 'asta', 'Mobil', 'Taxi Online', 35000, 100000, 65000, '2020-06-01'),
('MB043', 'yuno', 'Motor', 'Gede', 20000, 100000, 80000, '2020-06-01'),
('MB044', 'yana', 'Mobil', 'Taxi Online', 35000, 100000, 65000, '2020-06-02'),
('MB045', 'yani', 'Motor', 'Standar', 15000, 15000, 0, '2020-06-03'),
('MB046', 'yono', 'Mobil', 'Biasa', 40000, 50000, 10000, '2020-06-03'),
('MB047', 'yolo', 'Mobil', 'Truk', 70000, 100000, 30000, '2020-06-03'),
('MB048', 'yosi', 'Motor', 'Standar', 15000, 15000, 0, '2020-06-04'),
('MB049', 'yondu', 'Mobil', 'Besar', 45000, 100000, 55000, '2020-06-05'),
('MB050', 'kafu', 'Mobil', 'Truk', 70000, 100000, 30000, '2020-07-01'),
('MB051', 'jamet', 'Mobil', 'Truk', 70000, 100000, 30000, '2020-07-01'),
('MB052', 'jamal', 'Mobil', 'Truk', 70000, 100000, 30000, '2020-07-01'),
('MB053', 'jamal', 'Motor', 'Gede', 20000, 100000, 80000, '2020-08-01'),
('MB054', 'amat', 'Mobil', 'Besar', 45000, 100000, 55000, '2020-08-02'),
('MB055', 'amel', 'Mobil', 'Biasa', 40000, 100000, 60000, '2020-08-02'),
('MB056', 'luki', 'Mobil', 'Truk', 70000, 100000, 30000, '2020-08-02'),
('MB057', 'satrio', 'Motor', 'Gede', 20000, 100000, 80000, '2020-09-01'),
('MB058', 'supratman', 'Mobil', 'Truk', 70000, 100000, 30000, '2020-09-03'),
('MB059', 'supratman', 'Motor', 'Gede', 20000, 50000, 30000, '2020-09-04'),
('MB060', 'tukijan', 'Mobil', 'Truk', 70000, 70000, 0, '2020-09-04'),
('MB061', 'tukiman', 'Motor', 'Standar', 15000, 20000, 5000, '2020-09-04'),
('MB062', 'nopal', 'Mobil', 'Besar', 45000, 50000, 5000, '2020-10-01'),
('MB063', 'kumis', 'Mobil', 'Truk', 70000, 100000, 30000, '2020-10-09'),
('MB064', 'firman', 'Mobil', 'Biasa', 40000, 50000, 10000, '2020-10-09'),
('MB065', 'ulil', 'Motor', 'Standar', 15000, 20000, 5000, '2020-10-09'),
('MB066', 'zagi', 'Mobil', 'Besar', 45000, 50000, 5000, '2020-10-09'),
('MB067', 'mina', 'Motor', 'Standar', 15000, 50000, 35000, '2021-01-07');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` tinyint(2) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(35) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama`) VALUES
(1, 'admin', 'admin', 'Pratama Razak Putra'),
(14, 'admin01', 'admin01', 'Admin'),
(15, 'tama', '123', 'tama');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `databiaya`
--
ALTER TABLE `databiaya`
  ADD PRIMARY KEY (`id_biaya`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`no_nota`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `databiaya`
--
ALTER TABLE `databiaya`
  MODIFY `id_biaya` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` tinyint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
