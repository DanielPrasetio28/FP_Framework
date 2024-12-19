-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2024 at 12:05 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sifoakademik`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `id` int(11) NOT NULL,
  `siswa_nisn` varchar(20) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `status` enum('hadir','izin','alpha') NOT NULL DEFAULT 'alpha'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`id`, `siswa_nisn`, `kelas_id`, `tanggal`, `status`) VALUES
(1, '1122334458', 1, '2024-12-19', 'hadir'),
(3, '1122334458', 1, '2024-12-18', 'alpha'),
(4, '1122334456', 20, '2024-12-18', 'hadir'),
(5, '12345671', 20, '2024-12-18', 'hadir'),
(6, '1122334456', 20, '2024-12-19', 'hadir'),
(7, '12345671', 20, '2024-12-19', 'hadir'),
(8, '1122334456', 20, '2024-12-20', 'izin'),
(9, '12345671', 20, '2024-12-20', 'hadir'),
(10, '1122334456', 20, '2024-12-23', 'alpha'),
(11, '12345671', 20, '2024-12-23', 'hadir');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `telepon` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `nama`, `jabatan`, `telepon`) VALUES
(4, 'cicicantiik', '200403', 'Vazcha Tezza Lonica Raynegha', 'Guru Ekonomi', '082232351664'),
(5, 'adlein82', 'pinang03', 'Daniel Prasetio Budiman Raynegha', 'Guru Informatika', '082119278213');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` int(11) NOT NULL,
  `nama_kelas` varchar(50) NOT NULL,
  `jurusan` enum('MIPA','IPS') NOT NULL,
  `tingkat` enum('X','XI','XII') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `nama_kelas`, `jurusan`, `tingkat`) VALUES
(1, '1', 'MIPA', 'X'),
(7, '4', 'MIPA', 'X'),
(9, '3', 'MIPA', 'X'),
(10, '3', 'IPS', 'X'),
(11, '1', 'IPS', 'XII'),
(19, '2', 'IPS', 'XII'),
(20, '10', 'MIPA', 'XII'),
(21, '4', 'IPS', 'X');

-- --------------------------------------------------------

--
-- Table structure for table `kelas_mata_pelajaran`
--

CREATE TABLE `kelas_mata_pelajaran` (
  `id` int(11) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `mata_pelajaran_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kepsek`
--

CREATE TABLE `kepsek` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kepsek`
--

INSERT INTO `kepsek` (`id`, `username`, `password`) VALUES
(1, 'Daniel123', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `mata_pelajaran`
--

CREATE TABLE `mata_pelajaran` (
  `id_mata_pelajaran` int(11) NOT NULL,
  `nama_mata_pelajaran` varchar(100) NOT NULL,
  `tingkat` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mata_pelajaran`
--

INSERT INTO `mata_pelajaran` (`id_mata_pelajaran`, `nama_mata_pelajaran`, `tingkat`) VALUES
(61, 'Pendidikan Agama dan Budi Pekerti', 'X'),
(62, 'Pendidikan Pancasila dan Kewarganegaraan', 'X'),
(63, 'Bahasa Indonesia', 'X'),
(64, 'Matematika', 'X'),
(65, 'Sejarah Indonesia', 'X'),
(66, 'Bahasa Inggris', 'X'),
(67, 'Seni Budaya', 'X'),
(68, 'Pendidikan Jasmani, Olahraga, dan Kesehatan', 'X'),
(69, 'Informatika', 'X'),
(70, 'Fisika', 'X'),
(71, 'Kimia', 'X'),
(72, 'Biologi', 'X'),
(73, 'Geografi', 'X'),
(74, 'Ekonomi', 'X'),
(75, 'Sosiologi', 'X'),
(76, 'Pendidikan Agama dan Budi Pekerti', 'XI'),
(77, 'Pendidikan Pancasila dan Kewarganegaraan', 'XI'),
(78, 'Bahasa Indonesia', 'XI'),
(79, 'Matematika', 'XI'),
(80, 'Sejarah Indonesia', 'XI'),
(81, 'Bahasa Inggris', 'XI'),
(82, 'Seni Budaya', 'XI'),
(83, 'Pendidikan Jasmani, Olahraga, dan Kesehatan', 'XI'),
(84, 'Fisika', 'XI'),
(85, 'Kimia', 'XI'),
(86, 'Biologi', 'XI'),
(87, 'Geografi', 'XI'),
(88, 'Ekonomi', 'XI'),
(89, 'Sosiologi', 'XI'),
(90, 'Pendidikan Agama dan Budi Pekerti', 'XII'),
(91, 'Pendidikan Pancasila dan Kewarganegaraan', 'XII'),
(92, 'Bahasa Indonesia', 'XII'),
(93, 'Matematika', 'XII'),
(94, 'Bahasa Inggris', 'XII'),
(95, 'Seni Budaya', 'XII'),
(96, 'Pendidikan Jasmani, Olahraga, dan Kesehatan', 'XII'),
(97, 'Fisika', 'XII'),
(98, 'Kimia', 'XII'),
(99, 'Biologi', 'XII'),
(100, 'Geografi', 'XII'),
(101, 'Ekonomi', 'XII'),
(102, 'Sosiologi', 'XII');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(11) NOT NULL,
  `siswa_nisn` varchar(20) NOT NULL,
  `bukti_transfer` varchar(255) NOT NULL,
  `status` enum('pending','approved','rejected') DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `siswa_nisn`, `bukti_transfer`, `status`, `created_at`) VALUES
(8, '1122334456', 'WhatsApp_Image_2024-12-11_at_09_44_59_1ff053511.jpg', 'approved', '2024-12-18 15:38:48'),
(9, '1122334456', 'Desain_tanpa_judul.png', 'approved', '2024-12-18 15:42:51');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `nisn` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `angkatan` year(4) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nisn`, `nama`, `angkatan`, `kelas_id`, `password`) VALUES
('1122334450', 'Reno', '2022', 20, ''),
('1122334451', 'Keke', '2022', 20, ''),
('1122334456', 'Daniel Prasetio Budiman', '2024', 20, '123456'),
('1122334458', 'Marvel', '2021', 1, ''),
('1122334459', 'Vazcha Tezza Lonica Raynegha', '2022', 9, ''),
('12345671', 'Gabriel Prasetio Budiman', '2024', 20, ''),
('1234567122', 'Eddy Budiman', '2022', 19, '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('siswa','admin','kepsek') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `created_at`, `updated_at`) VALUES
(7, 'Eddy', '123456', 'admin', '2024-12-10 19:18:33', '2024-12-10 19:18:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `siswa_nisn` (`siswa_nisn`),
  ADD KEY `kelas_id` (`kelas_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelas_mata_pelajaran`
--
ALTER TABLE `kelas_mata_pelajaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kelas_id` (`kelas_id`),
  ADD KEY `mata_pelajaran_id` (`mata_pelajaran_id`);

--
-- Indexes for table `kepsek`
--
ALTER TABLE `kepsek`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  ADD PRIMARY KEY (`id_mata_pelajaran`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `siswa_nisn` (`siswa_nisn`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nisn`),
  ADD UNIQUE KEY `nisn` (`nisn`),
  ADD KEY `kelas_id` (`kelas_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `kelas_mata_pelajaran`
--
ALTER TABLE `kelas_mata_pelajaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kepsek`
--
ALTER TABLE `kepsek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  MODIFY `id_mata_pelajaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `absensi`
--
ALTER TABLE `absensi`
  ADD CONSTRAINT `absensi_kelas_fk` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `absensi_siswa_fk` FOREIGN KEY (`siswa_nisn`) REFERENCES `siswa` (`nisn`) ON DELETE CASCADE;

--
-- Constraints for table `kelas_mata_pelajaran`
--
ALTER TABLE `kelas_mata_pelajaran`
  ADD CONSTRAINT `kelas_mata_pelajaran_ibfk_1` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `kelas_mata_pelajaran_ibfk_2` FOREIGN KEY (`mata_pelajaran_id`) REFERENCES `mata_pelajaran` (`id_mata_pelajaran`) ON DELETE CASCADE;

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`siswa_nisn`) REFERENCES `siswa` (`nisn`);

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
