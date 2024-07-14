-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2024 at 02:26 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sekolah`
--

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id` int(11) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jabatan` varchar(50) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `telepon` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id`, `nip`, `nama`, `jabatan`, `alamat`, `telepon`) VALUES
(1, '198752324568', 'Andi Kurniawan, M.Pd', 'Guru Matematika', 'Solok', '082145683666'),
(2, '198752324655', 'Widya Andaini, S.Kom', 'Guru TIK', 'Payakumbuh', '084569852154'),
(4, '198752324652', 'Budi Santoso, MA', 'Guru Agama', 'Padang Luar', '081256478954');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`id`, `judul`) VALUES
(8, 'Terlambat Datang'),
(9, 'Absen Sementara'),
(10, 'Keluar Kelas'),
(11, 'Ambil Rapot'),
(12, 'Konsultasi Guru'),
(13, 'Menghadiri Acara Sekolah'),
(14, 'Menghadiri Acara Keluarga'),
(15, 'Ikut Tes/Ujian Tambahan'),
(17, 'Kunjungan Belajar Luar Kelas');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan_guru`
--

CREATE TABLE `kegiatan_guru` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kegiatan_guru`
--

INSERT INTO `kegiatan_guru` (`id`, `judul`) VALUES
(1, 'Rapat/Pertemuan Guru'),
(2, 'Pembinaan/Konseling Siswa'),
(3, 'Pelatihan/Workshop'),
(4, 'Tugas Administratif'),
(5, 'Pengembangan Kurikulum'),
(6, 'Koordinasi dengan Orang Tua/Wali Siswa'),
(7, 'Menghadiri Seminar'),
(8, 'Pemeliharaan Fasilitas Sekolah');

-- --------------------------------------------------------

--
-- Table structure for table `laporan_siswa`
--

CREATE TABLE `laporan_siswa` (
  `id` int(11) NOT NULL,
  `nis` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `kelas` varchar(50) NOT NULL,
  `kegiatan` varchar(200) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `laporan_siswa`
--

INSERT INTO `laporan_siswa` (`id`, `nis`, `nama`, `kelas`, `kegiatan`, `keterangan`) VALUES
(10, 31607, 'Budiono Siregar', 'X Multimedia C', '5', 'ssss');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin'),
(2, 'rizko777', 'rizko777'),
(3, 'admin', 'pass'),
(4, 'sekolah', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id` int(11) NOT NULL,
  `nis` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `kelas` varchar(50) NOT NULL,
  `alamat` text DEFAULT NULL,
  `telepon` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `nis`, `nama`, `kelas`, `alamat`, `telepon`) VALUES
(5, '0031601', 'Wilson Papero', 'XI Hotel C', 'Padang Luar', '082515247896'),
(6, '0031602', 'Rizko Imsar', 'XII OTKP A', 'Balingka', '083192577224'),
(7, '0031603', 'Budiono Siregar', 'XII Boga D', 'Medan', '08524687525'),
(8, '0031604', 'Anjas Maharani', 'XI Akuntansi A', 'Padang panjang', '083245845669'),
(9, '0031605', 'Hary Candra', 'X Pemasaran B', 'Bukittinggi', '081256478954'),
(10, '0031606', 'Hari Perkasa', 'XI Akuntansi B', 'Sijunjung', '083192575245');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kegiatan_guru`
--
ALTER TABLE `kegiatan_guru`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laporan_siswa`
--
ALTER TABLE `laporan_siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `kegiatan_guru`
--
ALTER TABLE `kegiatan_guru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `laporan_siswa`
--
ALTER TABLE `laporan_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
