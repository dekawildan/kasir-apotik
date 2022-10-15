-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2021 at 01:00 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apotik_12345`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE `tbl_login` (
  `user_id` int(11) NOT NULL,
  `nama_petugas` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`user_id`, `nama_petugas`, `username`, `password`) VALUES
(1, 'Deka Mukhamad Wildan', 'deka', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_obat`
--

CREATE TABLE `tbl_obat` (
  `obat_id` int(11) NOT NULL,
  `kode_obat` varchar(20) NOT NULL,
  `nama_obat` varchar(50) NOT NULL,
  `harga_obat` bigint(25) NOT NULL,
  `jumlah_obat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_obat`
--

INSERT INTO `tbl_obat` (`obat_id`, `kode_obat`, `nama_obat`, `harga_obat`, `jumlah_obat`) VALUES
(1, 'B-01', 'Ampetamin', 6000, 13),
(4, 'B-02', 'Fluemin', 4000, 20);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pelanggan`
--

CREATE TABLE `tbl_pelanggan` (
  `pelanggan_id` int(11) NOT NULL,
  `kode_pelanggan` varchar(20) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pelanggan`
--

INSERT INTO `tbl_pelanggan` (`pelanggan_id`, `kode_pelanggan`, `nama_pelanggan`, `alamat`) VALUES
(1, 'PL-01', 'Putri Laila', 'Desa Bebengan, Boja'),
(2, 'PL-02', 'Aji Syahputra', 'Desa Bebengan Boja');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaksi`
--

CREATE TABLE `tbl_transaksi` (
  `transaksi_id` int(11) NOT NULL,
  `obat_id` int(11) NOT NULL,
  `pelanggan_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tanggal_transaksi` date NOT NULL,
  `jumlah_beli` int(11) NOT NULL,
  `jumlah_harga` bigint(20) NOT NULL,
  `diskon` bigint(20) NOT NULL,
  `harga_setelah_diskon` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_transaksi`
--

INSERT INTO `tbl_transaksi` (`transaksi_id`, `obat_id`, `pelanggan_id`, `user_id`, `tanggal_transaksi`, `jumlah_beli`, `jumlah_harga`, `diskon`, `harga_setelah_diskon`) VALUES
(1, 1, 1, 1, '2021-04-01', 2, 7000, 1000, 13000);

--
-- Triggers `tbl_transaksi`
--
DELIMITER $$
CREATE TRIGGER `trigger_edit_stok` AFTER UPDATE ON `tbl_transaksi` FOR EACH ROW BEGIN
UPDATE tbl_obat SET tbl_obat.jumlah_obat=tbl_obat.jumlah_obat+OLD.jumlah_beli WHERE tbl_obat.obat_id=OLD.obat_id;
UPDATE tbl_obat SET tbl_obat.jumlah_obat=tbl_obat.jumlah_obat-NEW.jumlah_beli WHERE tbl_obat.obat_id=NEW.obat_id;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `trigger_hapus_stok` BEFORE DELETE ON `tbl_transaksi` FOR EACH ROW UPDATE tbl_obat SET tbl_obat.jumlah_obat=tbl_obat.jumlah_obat+OLD.jumlah_beli WHERE tbl_obat.obat_id=OLD.obat_id
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `trigger_stok_berkurang` AFTER INSERT ON `tbl_transaksi` FOR EACH ROW UPDATE tbl_obat SET tbl_obat.jumlah_obat=tbl_obat.jumlah_obat-NEW.jumlah_beli WHERE tbl_obat.obat_id=NEW.obat_id
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tbl_obat`
--
ALTER TABLE `tbl_obat`
  ADD PRIMARY KEY (`obat_id`);

--
-- Indexes for table `tbl_pelanggan`
--
ALTER TABLE `tbl_pelanggan`
  ADD PRIMARY KEY (`pelanggan_id`);

--
-- Indexes for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  ADD PRIMARY KEY (`transaksi_id`),
  ADD KEY `obat_id` (`obat_id`),
  ADD KEY `pelanggan_id` (`pelanggan_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_obat`
--
ALTER TABLE `tbl_obat`
  MODIFY `obat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_pelanggan`
--
ALTER TABLE `tbl_pelanggan`
  MODIFY `pelanggan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  MODIFY `transaksi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  ADD CONSTRAINT `tbl_transaksi_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_login` (`user_id`),
  ADD CONSTRAINT `tbl_transaksi_ibfk_2` FOREIGN KEY (`pelanggan_id`) REFERENCES `tbl_pelanggan` (`pelanggan_id`),
  ADD CONSTRAINT `tbl_transaksi_ibfk_3` FOREIGN KEY (`obat_id`) REFERENCES `tbl_obat` (`obat_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
