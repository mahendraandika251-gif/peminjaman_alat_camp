-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2026 at 12:32 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `peminjaman_alat`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Tenda'),
(2, 'Matras'),
(4, 'Sleeping Bag '),
(5, 'alat makan');

-- --------------------------------------------------------

--
-- Table structure for table `log_aktivitas`
--

CREATE TABLE `log_aktivitas` (
  `id_log` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `aktivitas` varchar(255) NOT NULL,
  `waktu` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `log_aktivitas`
--

INSERT INTO `log_aktivitas` (`id_log`, `id_user`, `aktivitas`, `waktu`) VALUES
(4, 1, 'Login', '2026-04-19 17:43:35');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman_alat`
--

CREATE TABLE `peminjaman_alat` (
  `id_user` int(11) NOT NULL,
  `id_alat` int(20) NOT NULL,
  `kode_pinjam` int(10) NOT NULL,
  `nama_peminjam` varchar(200) NOT NULL,
  `tanggal_meminjam` date NOT NULL,
  `batas_pengembalian` date NOT NULL,
  `jumlah` int(20) NOT NULL,
  `status` enum('Menunggu','Disetujui','Ditolak','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `peminjaman_alat`
--

INSERT INTO `peminjaman_alat` (`id_user`, `id_alat`, `kode_pinjam`, `nama_peminjam`, `tanggal_meminjam`, `batas_pengembalian`, `jumlah`, `status`) VALUES
(3, 1, 1, 'udin', '2026-04-19', '2026-04-25', 3, 'Disetujui'),
(3, 7, 79, 'udin', '2026-04-30', '0000-00-00', 1, 'Menunggu'),
(5, 4, 80, 'anies', '2026-04-28', '0000-00-00', 1, 'Menunggu');

-- --------------------------------------------------------

--
-- Table structure for table `pengembalian`
--

CREATE TABLE `pengembalian` (
  `id_user` int(11) NOT NULL,
  `Id_sewa` int(11) NOT NULL,
  `kode_pinjam` int(20) NOT NULL,
  `status` enum('Menunggu Pengembalian','Barang Dikembalikan','Barang Hilang','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pengembalian`
--

INSERT INTO `pengembalian` (`id_user`, `Id_sewa`, `kode_pinjam`, `status`) VALUES
(3, 1, 1, 'Menunggu Pengembalian');

-- --------------------------------------------------------

--
-- Table structure for table `peralatan`
--

CREATE TABLE `peralatan` (
  `id_alat` int(20) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_alat` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `foto_alat` varchar(255) NOT NULL,
  `harga` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `peralatan`
--

INSERT INTO `peralatan` (`id_alat`, `id_kategori`, `nama_alat`, `jumlah`, `foto_alat`, `harga`) VALUES
(1, 1, 'Tenda Dome', 10, '../asset/tenda_1.jpeg', '145000'),
(2, 1, 'Tenda Mom', 3, '../asset/tenda_3.jpeg', '145000'),
(3, 1, 'Tenda', 12, '../asset/tenda_5.jpeg', '130000'),
(4, 2, 'matras', 50, '../asset/matras_1.jpeg', '100000'),
(5, 2, 'matras', 30, '../asset/matras_2.jpeg', '70000'),
(7, 2, 'matras', 60, '../asset/matras_4.jpeg', '80000'),
(8, 2, 'matras', 40, '../asset/matras_5.jpeg', '50000'),
(9, 4, 'sleeping-bag', 30, '../asset/sleeping-bag_1.jpeg', '70000'),
(10, 4, 'sleeping-bag', 40, '../asset/sleeping-bag_2.jpeg', '30000');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_peminjaman`
--

CREATE TABLE `riwayat_peminjaman` (
  `id_user` int(11) NOT NULL,
  `Id_sewa` int(11) NOT NULL,
  `nama_peminjam` varchar(255) NOT NULL,
  `tanggal_peminjaman` date NOT NULL,
  `tanggal_pengembalian` date NOT NULL,
  `id_riwayat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `riwayat_peminjaman`
--

INSERT INTO `riwayat_peminjaman` (`id_user`, `Id_sewa`, `nama_peminjam`, `tanggal_peminjaman`, `tanggal_pengembalian`, `id_riwayat`) VALUES
(3, 1, 'udin', '2026-04-05', '2026-04-19', 1),
(4, 11, 'gary', '2026-04-19', '2026-04-22', 22),
(3, 12, 'udin', '2026-03-25', '2026-04-22', 23),
(3, 13, 'udin', '2026-04-27', '2026-04-24', 24),
(5, 14, 'anies', '2026-04-25', '2026-04-24', 25),
(5, 15, 'anies', '2026-05-19', '2026-04-24', 26),
(3, 16, 'udin', '2026-04-28', '2026-04-24', 27);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `email`, `password`, `role`) VALUES
(1, 'ADMIN_BESAR', 'reza.hernanda@example.com', '$2y$10$ERZZ71X1OdN5XRsPTR2dkeEHGaQKnq6mpksYrA9kNw.9X/ofJaVVi', 'admin'),
(2, 'Heru', 'reza.hernanda@example.com', '$2y$10$KkrtoDOpYBZTNh2DwwvdEuTh4P3aqtrcIvrqzJpAzGoAqzpIFupZ.', 'petugas'),
(3, 'udin', 'reza.hernanda@example.com', '$2y$10$aVeoWNeX.1shIrlVOGsXF.wtydw0L/aUKbwi6kIzcgoqMDNt/NKiW', 'user'),
(4, 'gary', 'emu@gmail.com', '$2y$10$noDORHqhnRZrBFJcCjY76O5jdPN90MWFR9lpo.EoVX3Q.eDojpq66', 'user'),
(5, 'anies', 'anieshebat11@gmail.com', '$2y$10$VBPW/2kYkDhKnQC0UAK/2eLbzGaDoI1tQjULoD2CrHeFcl8tQtesm', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `log_aktivitas`
--
ALTER TABLE `log_aktivitas`
  ADD PRIMARY KEY (`id_log`),
  ADD KEY `fk_user_log` (`id_user`);

--
-- Indexes for table `peminjaman_alat`
--
ALTER TABLE `peminjaman_alat`
  ADD PRIMARY KEY (`kode_pinjam`),
  ADD KEY `ID` (`id_user`) USING BTREE,
  ADD KEY `kode_alat` (`id_alat`) USING BTREE;

--
-- Indexes for table `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD PRIMARY KEY (`Id_sewa`),
  ADD KEY `ID` (`id_user`) USING BTREE,
  ADD KEY `id_alat` (`kode_pinjam`) USING BTREE;

--
-- Indexes for table `peralatan`
--
ALTER TABLE `peralatan`
  ADD PRIMARY KEY (`id_alat`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `riwayat_peminjaman`
--
ALTER TABLE `riwayat_peminjaman`
  ADD PRIMARY KEY (`id_riwayat`),
  ADD KEY `id_user` (`id_user`) USING BTREE,
  ADD KEY `Id_sewa` (`Id_sewa`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `log_aktivitas`
--
ALTER TABLE `log_aktivitas`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `peminjaman_alat`
--
ALTER TABLE `peminjaman_alat`
  MODIFY `kode_pinjam` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `pengembalian`
--
ALTER TABLE `pengembalian`
  MODIFY `Id_sewa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `peralatan`
--
ALTER TABLE `peralatan`
  MODIFY `id_alat` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `riwayat_peminjaman`
--
ALTER TABLE `riwayat_peminjaman`
  MODIFY `id_riwayat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `log_aktivitas`
--
ALTER TABLE `log_aktivitas`
  ADD CONSTRAINT `fk_user_log` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `peminjaman_alat`
--
ALTER TABLE `peminjaman_alat`
  ADD CONSTRAINT `peminjaman_alat_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `peminjaman_alat_ibfk_2` FOREIGN KEY (`id_alat`) REFERENCES `peralatan` (`id_alat`);

--
-- Constraints for table `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD CONSTRAINT `pengembalian_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `pengembalian_ibfk_2` FOREIGN KEY (`kode_pinjam`) REFERENCES `peminjaman_alat` (`kode_pinjam`) ON DELETE CASCADE;

--
-- Constraints for table `peralatan`
--
ALTER TABLE `peralatan`
  ADD CONSTRAINT `peralatan_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
