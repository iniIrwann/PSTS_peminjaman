-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2024 at 01:19 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `peminjaman`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(225) NOT NULL,
  `kode_brg` varchar(225) NOT NULL,
  `nama_brg` varchar(225) NOT NULL,
  `kategori` varchar(225) NOT NULL,
  `merk` varchar(225) NOT NULL,
  `jumlah` int(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `kode_brg`, `nama_brg`, `kategori`, `merk`, `jumlah`) VALUES
(5, '12345', 'Piring Kaca', 'Benda', 'Adidas', 1),
(9, '233', 'Gelas Kayu', 'barang', 'toyota', 1002),
(10, 'KD001', 'Kursi', 'Alat Belajar', 'Mercedes', 13);

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id` int(225) NOT NULL,
  `tgl_pinjam` datetime NOT NULL,
  `tgl_kembail` datetime NOT NULL,
  `no_identitas` varchar(225) NOT NULL,
  `kode_brg` varchar(225) NOT NULL,
  `jumlah` int(225) NOT NULL,
  `keperluan` varchar(225) NOT NULL,
  `status` varchar(225) NOT NULL,
  `id_login` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id`, `tgl_pinjam`, `tgl_kembail`, `no_identitas`, `kode_brg`, `jumlah`, `keperluan`, `status`, `id_login`) VALUES
(2, '2024-03-06 19:25:00', '2024-03-07 19:25:00', '32010990', '232312', 2, 'Belajar MTK', 'belum kembali', '12345');

--
-- Triggers `peminjaman`
--
DELIMITER $$
CREATE TRIGGER `kurangi_jml` AFTER INSERT ON `peminjaman` FOR EACH ROW BEGIN

UPDATE barang SET jumlah = jumlah - NEW.jumlah WHERE kode_brg = NEW.kode_brg;

END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `mengembalikan_jml` AFTER DELETE ON `peminjaman` FOR EACH ROW BEGIN
   
    UPDATE barang
    SET jumlah = jumlah + OLD.jumlah
    WHERE kode_brg = OLD.kode_brg;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(225) NOT NULL,
  `no_identitas` varchar(225) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `status` varchar(225) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `role` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `no_identitas`, `nama`, `status`, `username`, `password`, `role`) VALUES
(1, '12', 'Irwan Tampan', 'pelajar', 'ass', 'assdd', 'Member'),
(11, '23875356', 'uyab', 'asdsa', 'tas', 'asd', 'Member'),
(13, 'asdasdasdas', 'asdasd', 'dasdas', 'hlj', 'asdr', 'Admin'),
(15, 'asdas', 'dsad', 'sad', 'asdsa', 'dsad', 'Admin'),
(17, 'asd', 'asdas', 'dasd', 'asd', 'asda', 'Member'),
(18, '132566', 'Udin Slayer', 'pelajar', 'udin', '123', 'Member'),
(19, '2313445', 'Udin Tampan', 'Pelajar', 'udin12', '123', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
