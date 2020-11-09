-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2020 at 04:54 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-library`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` varchar(10) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `jk` enum('LK','PR') NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_hp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `nama`, `jk`, `alamat`, `no_hp`) VALUES
('A007', 'Iqbal', 'LK', 'Jl. Permadi no.118', '0812-9100-8260'),
('A008', 'Bram Adl', 'LK', 'Perumahan Aneka Elok, Blok GXI no 2, Penggilingan', '0812-8370-9830');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` varchar(10) NOT NULL,
  `judul_buku` varchar(30) NOT NULL,
  `pengarang` varchar(30) NOT NULL,
  `penerbit` varchar(30) NOT NULL,
  `th_terbit` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `judul_buku`, `pengarang`, `penerbit`, `th_terbit`) VALUES
('B002', 'Fisika', 'Iqbal', 'Ariyan', 2011),
('B006', 'Informatika', 'Bram', 'Al Adli', 2012),
('B008', 'Bahasa Inggris', 'Achmand', 'Lingga', 2013),
('B009', 'Algoritma', 'Fahmi', 'Kendall', 2019);

-- --------------------------------------------------------

--
-- Table structure for table `log_pinjam`
--

CREATE TABLE `log_pinjam` (
  `id_log` int(11) NOT NULL,
  `id_buku` varchar(10) NOT NULL,
  `id_anggota` varchar(10) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `tanggal_dikembalikan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `log_pinjam`
--

INSERT INTO `log_pinjam` (`id_log`, `id_buku`, `id_anggota`, `tanggal_pinjam`, `tanggal_kembali`, `tanggal_dikembalikan`) VALUES
(1, 'B002', 'A007', '2020-11-07', '2020-11-14', '2020-11-07'),
(2, 'B008', 'A008', '2020-11-08', '2020-11-18', '2020-11-08'),
(3, 'B002', 'A007', '2020-11-07', '2020-11-14', '2020-11-08'),
(4, 'B006', 'A001', '2020-11-28', '2020-12-05', '2020-11-08'),
(5, 'B008', 'A001', '2020-11-14', '2020-11-24', '2020-11-08'),
(6, 'B006', 'A007', '2020-11-12', '2020-11-19', '2020-11-08');

-- --------------------------------------------------------

--
-- Table structure for table `sirkulasi`
--

CREATE TABLE `sirkulasi` (
  `id_sirkulasi` varchar(20) NOT NULL,
  `id_buku` varchar(10) NOT NULL,
  `id_anggota` varchar(10) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Triggers `sirkulasi`
--
DELIMITER $$
CREATE TRIGGER `insert_log_pinjam` AFTER DELETE ON `sirkulasi` FOR EACH ROW BEGIN
INSERT INTO log_pinjam
VALUES ('', old.id_buku, old.id_anggota, old.tanggal_pinjam, old.tanggal_kembali, NOW());
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('superadmin','admin') NOT NULL,
  `foto` varchar(255) DEFAULT 'avatar.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `email`, `password`, `level`, `foto`) VALUES
(1, 'Iqbal Maulana', 'Masadepansilauu@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'superadmin', '1604749257.png'),
(2, 'Mita Khairunisa', 'Mitakhairunisa@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'admin', '1604779729.jpeg'),
(6, 'Nizar Umar', 'Nizarumar@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'admin', '1604779746.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `log_pinjam`
--
ALTER TABLE `log_pinjam`
  ADD PRIMARY KEY (`id_log`),
  ADD KEY `id_buku` (`id_buku`),
  ADD KEY `id_anggota` (`id_anggota`);

--
-- Indexes for table `sirkulasi`
--
ALTER TABLE `sirkulasi`
  ADD KEY `id_buku` (`id_buku`),
  ADD KEY `id_anggota` (`id_anggota`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `log_pinjam`
--
ALTER TABLE `log_pinjam`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sirkulasi`
--
ALTER TABLE `sirkulasi`
  ADD CONSTRAINT `sirkulasi_ibfk_1` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`),
  ADD CONSTRAINT `sirkulasi_ibfk_2` FOREIGN KEY (`id_anggota`) REFERENCES `anggota` (`id_anggota`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
