-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2022 at 01:48 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpus`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(2) NOT NULL,
  `penulis` varchar(50) NOT NULL,
  `tahun` year(4) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `penerbit` varchar(50) NOT NULL,
  `cover` varchar(255) NOT NULL,
  `sinopsis` text NOT NULL,
  `stok` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `penulis`, `tahun`, `judul`, `kota`, `penerbit`, `cover`, `sinopsis`, `stok`) VALUES
(1, 'Puan Maharani', 2000, 'Godain aku', 'malang', 'dpr', 'char.png', 'aaa', 12),
(2, 'Plate', 2001, 'Tutorial bernafas', 'malang', 'menteri', 'ufo.png', 'bbb', 2),
(3, 'Liam Niskala', 2022, 'Hidup Seperti Ulat', 'Bandung', 'Alix Med', 'bintang.png', 'cobss', 2),
(4, 'nui', 2022, 'sdsdsd', 'rrw', 'wewf', 'liam.png', 'dfdfdf', 1),
(5, 'adam', 2000, 'hawa', 'pasuruan', 'PT menc', 'logo-dummies.jpg', 'pada suatu hari...', 10),
(7, 'koboo', 2021, 'Kanaeru', 'Bekasi', 'PT. LKOIJMM', 'Asal-Lo-Tau-Ya-Dek-1024x1024.webp', 'Tutorial Jadi Pawang Hujan', 1),
(8, 'koboo', 1999, 'hawa', 'surabaya', 'PT menc', 'kisspng-thumb-signal-ok-clip-art-thumb-up-5abd750f7e1ca6.3364692815223657115166.png', 'dsdsd', 4),
(9, 'sdd', 0000, 'ffghfsg', 'feeegef', 'sdsdvvs', 'avatars-f1UVztRIUtm6jUpS-fuzn2g-t500x500.jpg', 'cdfsdsfsf', 0);

-- --------------------------------------------------------

--
-- Table structure for table `detail_peminjaman`
--

CREATE TABLE `detail_peminjaman` (
  `id_detail_peminjaman` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `id_peminjaman` int(11) NOT NULL,
  `kuantitas` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_peminjaman`
--

INSERT INTO `detail_peminjaman` (`id_detail_peminjaman`, `id_buku`, `id_peminjaman`, `kuantitas`) VALUES
(6, 1, 6, 1),
(7, 2, 7, 12),
(8, 3, 7, 1),
(9, 2, 8, 2),
(10, 1, 8, 4),
(11, 3, 9, 1),
(12, 4, 9, 1),
(13, 9, 11, 1),
(14, 9, 12, 1),
(15, 1, 13, 1),
(16, 8, 13, 1),
(17, 3, 14, 1),
(18, 1, 14, 1),
(19, 5, 15, 1),
(20, 8, 15, 1),
(21, 4, 17, 1),
(22, 7, 17, 1),
(23, 9, 17, 1),
(24, 4, 18, 1),
(25, 7, 18, 1),
(26, 9, 18, 1),
(27, 2, 19, 1),
(28, 5, 19, 1),
(29, 4, 20, 1),
(30, 5, 20, 1),
(31, 7, 21, 1),
(32, 9, 21, 1);

-- --------------------------------------------------------

--
-- Table structure for table `detail_pengembalian`
--

CREATE TABLE `detail_pengembalian` (
  `id_detail_pengembalian` int(11) NOT NULL,
  `id_pengembalian` int(11) NOT NULL,
  `ada` int(2) NOT NULL,
  `hilang` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_pengembalian`
--

INSERT INTO `detail_pengembalian` (`id_detail_pengembalian`, `id_pengembalian`, `ada`, `hilang`) VALUES
(4, 4, 1, 0),
(7, 7, 1, 0),
(8, 8, 1, 0),
(9, 9, 1, 0),
(10, 10, 1, 0),
(11, 11, 1, 0),
(12, 12, 1, 0),
(13, 13, 1, 0),
(14, 14, 1, 0),
(15, 15, 1, 0),
(16, 16, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(2) NOT NULL,
  `nama_kelas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`) VALUES
(1, '10'),
(2, '11'),
(3, '12');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id_level` int(1) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id_level`, `level`) VALUES
(1, 'admin'),
(2, 'petugas');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` int(11) NOT NULL,
  `nis` int(11) NOT NULL,
  `nip` int(11) NOT NULL,
  `tgl_peminjaman` date NOT NULL,
  `tgl_pemgembalian` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `nis`, `nip`, `tgl_peminjaman`, `tgl_pemgembalian`) VALUES
(6, 1, 3, '2022-10-01', '2022-10-04'),
(7, 2, 3, '2022-10-01', '2022-10-04'),
(8, 1, 1, '2022-09-22', '2022-09-24'),
(9, 4, 3, '2022-10-03', '2022-10-06'),
(11, 1, 3, '2022-10-03', '2022-10-06'),
(12, 2, 3, '2022-10-03', '2022-10-06'),
(13, 4, 2, '2022-09-01', '2022-09-02'),
(14, 4, 1, '2022-09-29', '2022-09-30'),
(15, 4, 5, '2022-09-29', '2022-09-30'),
(16, 1, 3, '2022-10-03', '2022-10-06'),
(17, 1, 3, '2022-10-03', '2022-10-06'),
(18, 5, 3, '2022-10-03', '2022-10-06'),
(19, 4, 3, '2022-10-03', '2022-10-06'),
(20, 4, 3, '2022-10-03', '2022-10-06'),
(21, 6, 3, '2022-10-03', '2022-10-06');

-- --------------------------------------------------------

--
-- Table structure for table `pengembalian`
--

CREATE TABLE `pengembalian` (
  `id_pengembalian` int(11) NOT NULL,
  `id_peminjaman` int(11) NOT NULL,
  `tanggal_pengembalian` date NOT NULL,
  `denda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengembalian`
--

INSERT INTO `pengembalian` (`id_pengembalian`, `id_peminjaman`, `tanggal_pengembalian`, `denda`) VALUES
(4, 8, '2022-10-01', 40000),
(7, 6, '2022-10-02', 0),
(8, 12, '2022-10-03', 0),
(9, 9, '2022-10-03', 0),
(10, 13, '2022-10-03', 320000),
(11, 14, '2022-10-03', 40000),
(12, 15, '2022-10-03', 30000),
(13, 11, '2022-10-03', 0),
(14, 7, '2022-10-03', 0),
(15, 16, '2022-10-03', 0),
(16, 17, '2022-10-03', 0);

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `nip` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `id_level` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`nip`, `nama`, `jenis_kelamin`, `alamat`, `password`, `id_level`) VALUES
(1, 'Nana', 'P', 'jalan doang makan kagak', '202cb962ac59075b964b07152d234b70', 1),
(2, 'Mino', 'L', 'jalan doang jadian kagak', 'caf1a3dfb505ffed0d024130f58c5cfa', 2),
(3, 'ilham', 'L', 'tes', '12345678', 1),
(4, 'coba', 'P', 'tes', 'coba', 2),
(5, 'Niskala Liam', 'L', 'weewi', 'asdfg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `nis` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `id_kelas` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nis`, `nama`, `jenis_kelamin`, `alamat`, `id_kelas`) VALUES
(1, 'Brian', 'L', 'jalan doang gandengan kagak', 1),
(2, 'Bjorka', 'L', 'jalan doang nikah kagak', 2),
(4, 'J', 'P', 'dimana mana12', 3),
(5, 'ilham alfa', 'L', 'dimana mana12', 1),
(6, 'Nova Green and Red', 'L', 'jalan doang makan', 1);

-- --------------------------------------------------------

--
-- Table structure for table `usersiswa`
--

CREATE TABLE `usersiswa` (
  `id_user` int(11) NOT NULL,
  `nis` int(11) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usersiswa`
--

INSERT INTO `usersiswa` (`id_user`, `nis`, `password`) VALUES
(1, 2, '123'),
(2, 1, '123'),
(4, 4, 'qwerty'),
(5, 5, '123'),
(6, 6, 'tyu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `detail_peminjaman`
--
ALTER TABLE `detail_peminjaman`
  ADD PRIMARY KEY (`id_detail_peminjaman`),
  ADD KEY `fk_buku` (`id_buku`),
  ADD KEY `fk_peminjam` (`id_peminjaman`);

--
-- Indexes for table `detail_pengembalian`
--
ALTER TABLE `detail_pengembalian`
  ADD PRIMARY KEY (`id_detail_pengembalian`),
  ADD KEY `fk_pengembalian` (`id_pengembalian`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD KEY `fk_nis` (`nis`),
  ADD KEY `fk_nip` (`nip`);

--
-- Indexes for table `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD PRIMARY KEY (`id_pengembalian`),
  ADD KEY `fk_peminjaman` (`id_peminjaman`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`nip`),
  ADD KEY `fk_level` (`id_level`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nis`),
  ADD KEY `fk_kelas` (`id_kelas`);

--
-- Indexes for table `usersiswa`
--
ALTER TABLE `usersiswa`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `fk_user` (`nis`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `detail_peminjaman`
--
ALTER TABLE `detail_peminjaman`
  MODIFY `id_detail_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `detail_pengembalian`
--
ALTER TABLE `detail_pengembalian`
  MODIFY `id_detail_pengembalian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `pengembalian`
--
ALTER TABLE `pengembalian`
  MODIFY `id_pengembalian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `nip` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `nis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `usersiswa`
--
ALTER TABLE `usersiswa`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_peminjaman`
--
ALTER TABLE `detail_peminjaman`
  ADD CONSTRAINT `fk_buku` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`),
  ADD CONSTRAINT `fk_peminjam` FOREIGN KEY (`id_peminjaman`) REFERENCES `peminjaman` (`id_peminjaman`);

--
-- Constraints for table `detail_pengembalian`
--
ALTER TABLE `detail_pengembalian`
  ADD CONSTRAINT `fk_pengembalian` FOREIGN KEY (`id_pengembalian`) REFERENCES `pengembalian` (`id_pengembalian`);

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `fk_nip` FOREIGN KEY (`nip`) REFERENCES `petugas` (`nip`),
  ADD CONSTRAINT `fk_nis` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`);

--
-- Constraints for table `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD CONSTRAINT `fk_peminjaman` FOREIGN KEY (`id_peminjaman`) REFERENCES `peminjaman` (`id_peminjaman`);

--
-- Constraints for table `petugas`
--
ALTER TABLE `petugas`
  ADD CONSTRAINT `fk_level` FOREIGN KEY (`id_level`) REFERENCES `level` (`id_level`);

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `fk_kelas` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`);

--
-- Constraints for table `usersiswa`
--
ALTER TABLE `usersiswa`
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
