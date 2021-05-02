-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2021 at 09:22 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `searchmahasiswa`
--

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `photo` text NOT NULL DEFAULT 'avatar.png',
  `nim` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `angkatan` year(4) NOT NULL,
  `fakultas` varchar(100) NOT NULL,
  `program_studi` varchar(100) NOT NULL,
  `semester_terdaftar` varchar(6) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `fullname`, `photo`, `nim`, `email`, `angkatan`, `fakultas`, `program_studi`, `semester_terdaftar`, `status`, `created_at`) VALUES
(1, 'Bintang', 'avatar.png', '191402016', 'bintang@gmail.com', 2019, 'ILMU KOMPUTER DAN TEKNOLOGI INFORMASI', 'Teknologi Informasi (S1)', '20191', 0, '2021-05-02 08:24:31'),
(2, 'Awan', 'avatar.png', '191402017', 'awan@gmail.com', 2019, 'ILMU KOMPUTER DAN TEKNOLOGI INFORMASI', 'Teknologi Informasi (S1)', '20191', 1, '2021-05-02 08:24:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
