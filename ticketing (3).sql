-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2023 at 03:07 AM
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
-- Database: `ticketing`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `email` varchar(35) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `password` text NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`email`, `nama`, `password`, `status`) VALUES
('12@gmail.com', 'renaldi', '73a40756c1123f635caef25da2954de3', 'mahasiswa'),
('a@gmail.com', 'renaldi', '73a40756c1123f635caef25da2954de3', 'mahasiswa'),
('aku@gmail.com', 'saka', 'e10adc3949ba59abbe56e057f20f883e', 'mahasiswa'),
('aq@gmail.com', 'renal', '4297f44b13955235245b2497399d7a93', 'dosen'),
('budi@gmail.com', 'rafli', '46f94c8de14fb36680850768ff1b7f2a', 'mahasiswa'),
('labkom01@ui.ac.id', 'labkom01', 'e3fbd29d593c7d3c0490e6fa59bd1f9e', 'pegawai'),
('ren@gmail.com', 'ren', '73a40756c1123f635caef25da2954de3', 'mahasiswa'),
('rena@gmail.com', 'renal', '73a40756c1123f635caef25da2954de3', 'mahasiswa'),
('renaldi@gmail.com', 'adit', '73a40756c1123f635caef25da2954de3', 'admin'),
('renaldiaditya857@gmail.com', 'ren', '4297f44b13955235245b2497399d7a93', 'mahasiswa'),
('renaldiadtya23@gmail.com', 'renaldi', '4297f44b13955235245b2497399d7a93', 'mahasiswa'),
('sak@gmail.com', 'saka', 'e10adc3949ba59abbe56e057f20f883e', 'mahasiswa'),
('tes@gmail.com', 'saka', 'e10adc3949ba59abbe56e057f20f883e', 'mahasiswa'),
('vmediox@gmail.com', 'Rafly', 'c0fb399a13cbb807e0417b93b2b00527', 'mahasiswa');

-- --------------------------------------------------------

--
-- Table structure for table `ruangan`
--

CREATE TABLE `ruangan` (
  `id_ruang` int(2) NOT NULL,
  `nama_ruangan` varchar(50) NOT NULL,
  `gedung` varchar(15) NOT NULL,
  `lantai` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ruangan`
--

INSERT INTO `ruangan` (`id_ruang`, `nama_ruangan`, `gedung`, `lantai`) VALUES
(1, 'B-009', 'Gedung B', 'Ground'),
(2, 'B-109', 'Gedung B', 'Lantai 1');

-- --------------------------------------------------------

--
-- Table structure for table `thistori`
--

CREATE TABLE `thistori` (
  `id_history` int(11) NOT NULL,
  `report_id` int(11) NOT NULL,
  `solusi` varchar(10) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tnotifikasi`
--

CREATE TABLE `tnotifikasi` (
  `idnotif` int(11) NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tnotifikasi`
--

INSERT INTO `tnotifikasi` (`idnotif`, `status`) VALUES
(1, 'belum'),
(2, 'sedang dalam pengerjaan'),
(3, 'pending'),
(4, 'selesai');

-- --------------------------------------------------------

--
-- Table structure for table `treport`
--

CREATE TABLE `treport` (
  `id_report` varchar(10) NOT NULL,
  `email` varchar(35) NOT NULL,
  `pelapor` varchar(25) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `id_ruang` int(11) NOT NULL,
  `jenis` varchar(35) NOT NULL,
  `deskripsi` text NOT NULL,
  `idnotif` int(11) NOT NULL,
  `tenagakerja` varchar(35) NOT NULL,
  `tanggal` datetime NOT NULL,
  `pesan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `treport`
--

INSERT INTO `treport` (`id_report`, `email`, `pelapor`, `nama`, `id_ruang`, `jenis`, `deskripsi`, `idnotif`, `tenagakerja`, `tanggal`, `pesan`) VALUES
('1', 'renaldiaditya857@gmail.com', 'mahasiswa', 'ren', 1, 'Device Mati', 'awwdad', 4, 'vidhan', '2023-09-25 09:15:00', ''),
('2', '12@gmail.com', 'mahasiswa', 'renaldi', 2, 'Masalah Perangkat', 'dadawdwa', 2, 'adit', '2023-09-27 08:40:50', ''),
('3', '12@gmail.com', 'mahasiswa', 'renaldi', 2, 'Masalah Device Non PC', 'fwsfwefwe', 2, '-', '2023-10-06 11:36:45', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`id_ruang`);

--
-- Indexes for table `thistori`
--
ALTER TABLE `thistori`
  ADD PRIMARY KEY (`id_history`);

--
-- Indexes for table `tnotifikasi`
--
ALTER TABLE `tnotifikasi`
  ADD PRIMARY KEY (`idnotif`);

--
-- Indexes for table `treport`
--
ALTER TABLE `treport`
  ADD PRIMARY KEY (`id_report`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ruangan`
--
ALTER TABLE `ruangan`
  MODIFY `id_ruang` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `thistori`
--
ALTER TABLE `thistori`
  MODIFY `id_history` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tnotifikasi`
--
ALTER TABLE `tnotifikasi`
  MODIFY `idnotif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
