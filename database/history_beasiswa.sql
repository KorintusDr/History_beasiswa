-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2024 at 03:32 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `history_beasiswa`
--

-- --------------------------------------------------------

--
-- Table structure for table `agama`
--

CREATE TABLE `agama` (
  `id_agama` int(11) NOT NULL,
  `nama_agama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `agama`
--

INSERT INTO `agama` (`id_agama`, `nama_agama`) VALUES
(1, 'Kristen'),
(2, 'Islam'),
(3, 'Kristen Katolik');

-- --------------------------------------------------------

--
-- Table structure for table `beasiswa`
--

CREATE TABLE `beasiswa` (
  `id_beasiswa` int(11) NOT NULL,
  `nama_beasiswa` varchar(255) NOT NULL,
  `penyedia_beasiswa` varchar(255) NOT NULL,
  `jenis_beasiswa` varchar(100) NOT NULL,
  `jumlah_beasiswa` varchar(100) NOT NULL,
  `status_beasiswa` enum('Aktif','Tidak Aktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `beasiswa`
--

INSERT INTO `beasiswa` (`id_beasiswa`, `nama_beasiswa`, `penyedia_beasiswa`, `jenis_beasiswa`, `jumlah_beasiswa`, `status_beasiswa`) VALUES
(2, 'beasiswa a', 'dinsos', 'prestasi', 'Rp.3000.000', 'Aktif'),
(3, 'beasiswa aw', 'dinsos', 'prestasi', 'Rp.8000.000', 'Tidak Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `fakultas`
--

CREATE TABLE `fakultas` (
  `id_fakultas` int(11) NOT NULL,
  `nama_fakultas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fakultas`
--

INSERT INTO `fakultas` (`id_fakultas`, `nama_fakultas`) VALUES
(1, 'Teknik Informatika');

-- --------------------------------------------------------

--
-- Table structure for table `pekerjaan`
--

CREATE TABLE `pekerjaan` (
  `id_pekerjaan` int(11) NOT NULL,
  `nama_pekerjaan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pekerjaan`
--

INSERT INTO `pekerjaan` (`id_pekerjaan`, `nama_pekerjaan`) VALUES
(1, 'Tidak Bekerja'),
(2, 'PNS/TNI/POLRI');

-- --------------------------------------------------------

--
-- Table structure for table `pencairan_dana_beasiswa`
--

CREATE TABLE `pencairan_dana_beasiswa` (
  `id_pencairan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_pengajuan` int(11) NOT NULL,
  `tanggal_pencairan` date NOT NULL,
  `status` enum('Menunggu Konfirmasi','Disetujui','Ditolak','Diberhentikan') NOT NULL DEFAULT 'Menunggu Konfirmasi',
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pencairan_dana_beasiswa`
--

INSERT INTO `pencairan_dana_beasiswa` (`id_pencairan`, `id_user`, `id_pengajuan`, `tanggal_pencairan`, `status`, `keterangan`) VALUES
(23, 1, 15, '2024-11-06', 'Disetujui', 'GUNAKAN DENGAN BIJAK'),
(24, 1, 15, '2024-11-06', 'Menunggu Konfirmasi', 'TES');

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan`
--

CREATE TABLE `pengajuan` (
  `id_pengajuan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `alamat_ortu` varchar(255) NOT NULL,
  `kode_pos` varchar(10) NOT NULL,
  `no_telepon` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_ktp` varchar(20) NOT NULL,
  `id_agama` int(11) NOT NULL,
  `id_universitas` int(11) NOT NULL,
  `id_fakultas` int(11) NOT NULL,
  `id_program_studi` int(11) NOT NULL,
  `id_beasiswa` int(11) NOT NULL,
  `semester` varchar(15) NOT NULL,
  `ipk` decimal(3,2) NOT NULL,
  `nama_ayah` varchar(100) NOT NULL,
  `nama_ibu` varchar(100) NOT NULL,
  `pekerjaan_ayah` int(11) NOT NULL,
  `pekerjaan_ibu` int(11) NOT NULL,
  `notlp_ortu` varchar(20) NOT NULL,
  `id_penghasilan` int(11) NOT NULL,
  `ktp` varchar(255) NOT NULL,
  `kk` varchar(255) NOT NULL,
  `kpm` varchar(255) NOT NULL,
  `krs` varchar(255) NOT NULL,
  `transkip_nilai` varchar(255) NOT NULL,
  `surat_aktif_kuliah` varchar(255) NOT NULL,
  `surat_rekomendasi` varchar(255) NOT NULL,
  `surat_pernyataan` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `status_pendaftaran` enum('Diterima','Ditolak','Menunggu Konfirmasi') DEFAULT 'Menunggu Konfirmasi',
  `tanggal_pendaftaran` date DEFAULT curdate()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengajuan`
--

INSERT INTO `pengajuan` (`id_pengajuan`, `id_user`, `nama_lengkap`, `nim`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `alamat_ortu`, `kode_pos`, `no_telepon`, `email`, `no_ktp`, `id_agama`, `id_universitas`, `id_fakultas`, `id_program_studi`, `id_beasiswa`, `semester`, `ipk`, `nama_ayah`, `nama_ibu`, `pekerjaan_ayah`, `pekerjaan_ibu`, `notlp_ortu`, `id_penghasilan`, `ktp`, `kk`, `kpm`, `krs`, `transkip_nilai`, `surat_aktif_kuliah`, `surat_rekomendasi`, `surat_pernyataan`, `foto`, `status_pendaftaran`, `tanggal_pendaftaran`) VALUES
(15, 4, 'Korintus Datu Rapang, S.Kom., M.Kom.', '2024130031', 'Laki-laki', 'Jayapura', '2001-10-10', 'CV', 'TUT', '90231', '085340444261', 'ANU@example.com', '1010103330402', 1, 1, 1, 1, 2, '4', 6.60, 'Sanji', 'Nami', 2, 1, '899', 2, 'batu.png', 'download_(1)1.jpg', 'effd55cb4eb52f14c3467cbe4712d9e3.jpg', 'mySiakad___Mahasiswa.pdf', 'mySiakad___Mahasiswa.pdf', 'mySiakad___Mahasiswa.pdf', 'mySiakad___Mahasiswa.pdf', 'mySiakad___Mahasiswa.pdf', 'tut1.jpg', 'Diterima', '2024-11-06');

-- --------------------------------------------------------

--
-- Table structure for table `penggunaan_beasiswa`
--

CREATE TABLE `penggunaan_beasiswa` (
  `id_penggunaan` int(11) NOT NULL,
  `id_pengajuan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal_penggunaan` date NOT NULL,
  `keterangan_penggunaan` text DEFAULT NULL,
  `bukti_penggunaan` varchar(255) DEFAULT NULL,
  `status` enum('Menunggu Konfirmasi','Disetujui','Ditolak') DEFAULT 'Menunggu Konfirmasi'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penggunaan_beasiswa`
--

INSERT INTO `penggunaan_beasiswa` (`id_penggunaan`, `id_pengajuan`, `id_user`, `tanggal_penggunaan`, `keterangan_penggunaan`, `bukti_penggunaan`, `status`) VALUES
(13, 15, 4, '2024-11-06', 'TS', 'kertas.png', 'Disetujui'),
(14, 15, 4, '2024-11-07', 'TS', 'mySiakad___Mahasiswa.pdf', 'Menunggu Konfirmasi');

-- --------------------------------------------------------

--
-- Table structure for table `penghasilan`
--

CREATE TABLE `penghasilan` (
  `id_penghasilan` int(11) NOT NULL,
  `rentang_penghasilan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penghasilan`
--

INSERT INTO `penghasilan` (`id_penghasilan`, `rentang_penghasilan`) VALUES
(1, '< 2 juta'),
(2, '2 - 5 juta'),
(3, '> 10 juta');

-- --------------------------------------------------------

--
-- Table structure for table `program_studi`
--

CREATE TABLE `program_studi` (
  `id_program_studi` int(11) NOT NULL,
  `nama_program_studi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `program_studi`
--

INSERT INTO `program_studi` (`id_program_studi`, `nama_program_studi`) VALUES
(1, 'Ilmu Komputer'),
(3, 'Sistem Informasi');

-- --------------------------------------------------------

--
-- Table structure for table `universitas`
--

CREATE TABLE `universitas` (
  `id_universitas` int(11) NOT NULL,
  `nama_universitas` varchar(100) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nomor_telepon` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `universitas`
--

INSERT INTO `universitas` (`id_universitas`, `nama_universitas`, `alamat`, `email`, `nomor_telepon`) VALUES
(1, 'Universitas Handayani Makassar', 'Makassar- Jl. Pettarani 04 ', 'anunya@gmail.com', '465465656'),
(3, 'Universitas Doktor Husni Ingratubun Papua', 'gfgfg', 'tes@example.com', '4646');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `nomor_hp` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('petugas','pimpinan','mahasiswa') NOT NULL,
  `created_at` date DEFAULT curdate()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `nama_lengkap`, `alamat`, `nomor_hp`, `email`, `password`, `role`, `created_at`) VALUES
(1, 'petugas', 'Petugas', 'Jl. Petugas No. 11', '081234567890', 'petugasA@example.com', '$2y$10$/5uJmjNqLVpme.znV4A9VuwZJFA3PnL0b5Ur47JEpmPyF51QFyHI6', 'petugas', '2024-10-09'),
(2, 'pimpinan', 'Pimpinan', 'Jl. Pimpinan No. 2', '081234567891', 'pimpinanB@example.com', '$2y$10$0PNsKQdEupQXkSExESQvJ.KbFD97VXvXYvYYjsKLlyecIqzOfxJNq', 'pimpinan', '2024-10-09'),
(3, 'mahasiswa1', 'Mahasiswa ', 'Jl. Mahasiswa No. 3', '081234567892', 'mahasiswaC@example.com', '$2y$10$H5cmu811tUEV3O.7i34t2ufqCV.FNc4k0CoHyRAIuDXWWuRj1S.W.', 'mahasiswa', '2024-10-09'),
(4, 'mahasiswa2', 'yonki', 'kotaraja', '0797876799', 'peserta@example.com', '$2y$10$u9tAUbuK58ronHH6ZgLe2OsGZsYQsfg14BdSiDTMa/mbzaIq6G5xO', 'mahasiswa', '2024-10-15'),
(15, 'tes', 'tes', 'bjb', '868', 'ts@gmail.com', '$2y$10$5lbbO7elLa42N9SdRZhTjOD.YwmGdH8YKwqbr2WI43OVzcO1suyXS', 'mahasiswa', '2024-10-21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agama`
--
ALTER TABLE `agama`
  ADD PRIMARY KEY (`id_agama`);

--
-- Indexes for table `beasiswa`
--
ALTER TABLE `beasiswa`
  ADD PRIMARY KEY (`id_beasiswa`);

--
-- Indexes for table `fakultas`
--
ALTER TABLE `fakultas`
  ADD PRIMARY KEY (`id_fakultas`);

--
-- Indexes for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
  ADD PRIMARY KEY (`id_pekerjaan`);

--
-- Indexes for table `pencairan_dana_beasiswa`
--
ALTER TABLE `pencairan_dana_beasiswa`
  ADD PRIMARY KEY (`id_pencairan`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_pengajuan` (`id_pengajuan`);

--
-- Indexes for table `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD PRIMARY KEY (`id_pengajuan`),
  ADD UNIQUE KEY `id_user` (`id_user`),
  ADD KEY `id_agama` (`id_agama`),
  ADD KEY `id_universitas` (`id_universitas`),
  ADD KEY `id_fakultas` (`id_fakultas`),
  ADD KEY `id_program_studi` (`id_program_studi`),
  ADD KEY `id_beasiswa` (`id_beasiswa`),
  ADD KEY `pekerjaan_ayah` (`pekerjaan_ayah`),
  ADD KEY `pekerjaan_ibu` (`pekerjaan_ibu`),
  ADD KEY `id_penghasilan` (`id_penghasilan`);

--
-- Indexes for table `penggunaan_beasiswa`
--
ALTER TABLE `penggunaan_beasiswa`
  ADD PRIMARY KEY (`id_penggunaan`),
  ADD KEY `id_pengajuan` (`id_pengajuan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `penghasilan`
--
ALTER TABLE `penghasilan`
  ADD PRIMARY KEY (`id_penghasilan`);

--
-- Indexes for table `program_studi`
--
ALTER TABLE `program_studi`
  ADD PRIMARY KEY (`id_program_studi`);

--
-- Indexes for table `universitas`
--
ALTER TABLE `universitas`
  ADD PRIMARY KEY (`id_universitas`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agama`
--
ALTER TABLE `agama`
  MODIFY `id_agama` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `beasiswa`
--
ALTER TABLE `beasiswa`
  MODIFY `id_beasiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `fakultas`
--
ALTER TABLE `fakultas`
  MODIFY `id_fakultas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
  MODIFY `id_pekerjaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pencairan_dana_beasiswa`
--
ALTER TABLE `pencairan_dana_beasiswa`
  MODIFY `id_pencairan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `pengajuan`
--
ALTER TABLE `pengajuan`
  MODIFY `id_pengajuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `penggunaan_beasiswa`
--
ALTER TABLE `penggunaan_beasiswa`
  MODIFY `id_penggunaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `penghasilan`
--
ALTER TABLE `penghasilan`
  MODIFY `id_penghasilan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `program_studi`
--
ALTER TABLE `program_studi`
  MODIFY `id_program_studi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `universitas`
--
ALTER TABLE `universitas`
  MODIFY `id_universitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pencairan_dana_beasiswa`
--
ALTER TABLE `pencairan_dana_beasiswa`
  ADD CONSTRAINT `fk_pengajuan` FOREIGN KEY (`id_pengajuan`) REFERENCES `pengajuan` (`id_pengajuan`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE;

--
-- Constraints for table `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD CONSTRAINT `pengajuan_ibfk_1` FOREIGN KEY (`id_agama`) REFERENCES `agama` (`id_agama`) ON DELETE CASCADE,
  ADD CONSTRAINT `pengajuan_ibfk_2` FOREIGN KEY (`id_universitas`) REFERENCES `universitas` (`id_universitas`) ON DELETE CASCADE,
  ADD CONSTRAINT `pengajuan_ibfk_3` FOREIGN KEY (`id_fakultas`) REFERENCES `fakultas` (`id_fakultas`) ON DELETE CASCADE,
  ADD CONSTRAINT `pengajuan_ibfk_4` FOREIGN KEY (`id_program_studi`) REFERENCES `program_studi` (`id_program_studi`) ON DELETE CASCADE,
  ADD CONSTRAINT `pengajuan_ibfk_5` FOREIGN KEY (`id_beasiswa`) REFERENCES `beasiswa` (`id_beasiswa`) ON DELETE CASCADE,
  ADD CONSTRAINT `pengajuan_ibfk_6` FOREIGN KEY (`pekerjaan_ayah`) REFERENCES `pekerjaan` (`id_pekerjaan`) ON DELETE CASCADE,
  ADD CONSTRAINT `pengajuan_ibfk_7` FOREIGN KEY (`pekerjaan_ibu`) REFERENCES `pekerjaan` (`id_pekerjaan`) ON DELETE CASCADE,
  ADD CONSTRAINT `pengajuan_ibfk_8` FOREIGN KEY (`id_penghasilan`) REFERENCES `penghasilan` (`id_penghasilan`) ON DELETE CASCADE;

--
-- Constraints for table `penggunaan_beasiswa`
--
ALTER TABLE `penggunaan_beasiswa`
  ADD CONSTRAINT `penggunaan_beasiswa_ibfk_1` FOREIGN KEY (`id_pengajuan`) REFERENCES `pengajuan` (`id_pengajuan`),
  ADD CONSTRAINT `penggunaan_beasiswa_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
