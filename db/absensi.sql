-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 31, 2018 at 05:28 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `absensi`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `id_absensi` int(50) NOT NULL,
  `nip` varchar(100) NOT NULL,
  `tgl_absen` date NOT NULL,
  `absen_pagi` varchar(11) DEFAULT NULL,
  `absen_sore` varchar(11) DEFAULT NULL,
  `absen_lembur` varchar(11) DEFAULT NULL,
  `pulang_lembur` varchar(11) DEFAULT NULL,
  `jml_lembur` int(11) DEFAULT NULL,
  `status_pagi` enum('H','A','I','S') NOT NULL DEFAULT 'A',
  `status_sore` enum('H','A','I','S') NOT NULL DEFAULT 'A',
  `status_lembur` enum('H','A','I','S') NOT NULL DEFAULT 'A',
  `verifikasi_lembur` enum('Ya','Tidak') NOT NULL DEFAULT 'Tidak',
  `uang_lembur` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`id_absensi`, `nip`, `tgl_absen`, `absen_pagi`, `absen_sore`, `absen_lembur`, `pulang_lembur`, `jml_lembur`, `status_pagi`, `status_sore`, `status_lembur`, `verifikasi_lembur`, `uang_lembur`) VALUES
(91, '15110134', '2018-12-28', NULL, NULL, NULL, NULL, NULL, 'A', 'A', 'A', 'Tidak', '0'),
(92, '15110135', '2018-12-28', NULL, NULL, NULL, NULL, NULL, 'A', 'A', 'A', 'Tidak', '0'),
(93, '15110136', '2018-12-28', NULL, NULL, NULL, NULL, NULL, 'A', 'A', 'A', 'Tidak', '0'),
(94, '15110137', '2018-12-28', NULL, NULL, NULL, NULL, NULL, 'A', 'A', 'A', 'Tidak', '0'),
(95, '15110139', '2018-12-28', NULL, NULL, NULL, NULL, NULL, 'A', 'A', 'A', 'Tidak', '0'),
(96, '17021991063', '2018-12-28', NULL, NULL, NULL, NULL, NULL, 'A', 'A', 'A', 'Tidak', '0'),
(97, '15110134', '2018-12-29', NULL, NULL, NULL, NULL, NULL, 'A', 'A', 'A', 'Tidak', '0'),
(98, '15110135', '2018-12-29', NULL, NULL, NULL, NULL, NULL, 'A', 'A', 'A', 'Tidak', '0'),
(99, '15110136', '2018-12-29', NULL, NULL, NULL, NULL, NULL, 'A', 'A', 'A', 'Tidak', '0'),
(100, '15110137', '2018-12-29', NULL, NULL, NULL, NULL, NULL, 'A', 'A', 'A', 'Tidak', '0'),
(101, '15110139', '2018-12-29', NULL, NULL, NULL, NULL, NULL, 'A', 'A', 'A', 'Tidak', '0'),
(102, '17021991063', '2018-12-29', NULL, NULL, NULL, NULL, NULL, 'A', 'A', 'A', 'Tidak', '0'),
(103, '15110134', '2018-12-30', NULL, NULL, NULL, NULL, NULL, 'A', 'A', 'A', 'Tidak', '0'),
(104, '15110135', '2018-12-30', '11:20', '16:17', NULL, '18:01', 1, 'H', 'H', 'A', 'Tidak', '50000'),
(105, '15110136', '2018-12-30', NULL, NULL, NULL, NULL, NULL, 'A', 'A', 'A', 'Tidak', '0'),
(106, '15110137', '2018-12-30', NULL, NULL, NULL, NULL, NULL, 'A', 'A', 'A', 'Tidak', '0'),
(107, '15110139', '2018-12-30', NULL, NULL, NULL, NULL, NULL, 'A', 'A', 'A', 'Tidak', '0'),
(108, '17021991063', '2018-12-30', NULL, NULL, NULL, NULL, NULL, 'A', 'A', 'A', 'Tidak', '0'),
(109, '15110134', '2018-12-30', NULL, NULL, NULL, NULL, NULL, 'A', 'A', 'A', 'Tidak', '0'),
(110, '15110135', '2018-12-30', NULL, NULL, NULL, NULL, NULL, 'A', 'A', 'A', 'Tidak', '0'),
(111, '15110136', '2018-12-30', NULL, NULL, NULL, NULL, NULL, 'A', 'A', 'A', 'Tidak', '0'),
(112, '15110137', '2018-12-30', NULL, NULL, NULL, NULL, NULL, 'A', 'A', 'A', 'Tidak', '0'),
(113, '15110139', '2018-12-30', NULL, NULL, NULL, NULL, NULL, 'A', 'A', 'A', 'Tidak', '0'),
(114, '17021991063', '2018-12-30', NULL, NULL, NULL, NULL, NULL, 'A', 'A', 'A', 'Tidak', '0'),
(115, '15110134', '2018-12-31', '07:33', '14:40', '17:06', '21:07', 4, 'H', 'H', 'H', 'Tidak', '200000'),
(116, '15110135', '2018-12-31', NULL, NULL, NULL, NULL, NULL, 'A', 'A', 'A', 'Tidak', '0'),
(117, '15110136', '2018-12-31', '07:53', NULL, NULL, NULL, NULL, 'H', 'A', 'A', 'Tidak', '0'),
(118, '15110137', '2018-12-31', NULL, NULL, NULL, NULL, NULL, 'A', 'A', 'A', 'Tidak', '0'),
(119, '15110139', '2018-12-31', NULL, NULL, NULL, NULL, NULL, 'A', 'A', 'A', 'Tidak', '0'),
(120, '17021991063', '2018-12-31', NULL, NULL, NULL, NULL, NULL, 'A', 'A', 'A', 'Tidak', '0'),
(121, '15110134', '2018-12-31', NULL, NULL, NULL, NULL, NULL, 'A', 'A', 'A', 'Tidak', '0'),
(122, '15110135', '2018-12-31', NULL, NULL, NULL, NULL, NULL, 'A', 'A', 'A', 'Tidak', '0'),
(123, '15110136', '2018-12-31', NULL, NULL, NULL, NULL, NULL, 'A', 'A', 'A', 'Tidak', '0'),
(124, '15110137', '2018-12-31', NULL, NULL, NULL, NULL, NULL, 'A', 'A', 'A', 'Tidak', '0'),
(125, '15110139', '2018-12-31', NULL, NULL, NULL, NULL, NULL, 'A', 'A', 'A', 'Tidak', '0'),
(126, '17021991063', '2018-12-31', NULL, NULL, NULL, NULL, NULL, 'A', 'A', 'A', 'Tidak', '0');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` varchar(11) NOT NULL,
  `nama_jabatan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`) VALUES
('', ''),
('BW0001', 'Manager'),
('BW0002', 'Supervisor'),
('BW0003', 'Admin'),
('BW0004', 'Teller'),
('BW0005', 'Acount Officer'),
('BW0006', 'Karyawan');

-- --------------------------------------------------------

--
-- Table structure for table `jam`
--

CREATE TABLE `jam` (
  `id_jam` int(11) NOT NULL,
  `awalabsen_pagi` varchar(11) NOT NULL,
  `awalabsen_sore` varchar(11) NOT NULL,
  `akhirabsen_pagi` varchar(11) NOT NULL,
  `akhirabsen_sore` varchar(11) NOT NULL,
  `awalabsen_lembur` varchar(11) NOT NULL,
  `akhirabsen_lembur` varchar(11) NOT NULL,
  `batasjam_lembur` varchar(11) NOT NULL,
  `uang_lembur` decimal(10,0) NOT NULL,
  `uang_makan` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jam`
--

INSERT INTO `jam` (`id_jam`, `awalabsen_pagi`, `awalabsen_sore`, `akhirabsen_pagi`, `akhirabsen_sore`, `awalabsen_lembur`, `akhirabsen_lembur`, `batasjam_lembur`, `uang_lembur`, `uang_makan`) VALUES
(1, '07:30', '14:00', '08:00', '16:30', '17:00', '18:00', '23:00', '50000', '0');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `nip` varchar(100) NOT NULL,
  `nama_pegawai` varchar(100) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `jk` enum('Laki-laki','Perempuan') NOT NULL,
  `tmp_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `foto` varchar(100) NOT NULL,
  `jabatan` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`nip`, `nama_pegawai`, `alamat`, `jk`, `tmp_lahir`, `tgl_lahir`, `foto`, `jabatan`) VALUES
('15110134', 'Sefi Khasanah', 'JL. LETJEND POL SOEMARTO, Watumas, Purwanegara,Purwokerto Utara, Banyumas, Jawa Tengah 53126', 'Perempuan', 'Purwokerto', '1995-01-10', 'face2.jpg', 'BW0003'),
('15110135', 'Faisal Nur Faiz', 'JL. LETJEND POL SOEMARTO, Watumas, Purwanegara,Purwokerto Utara, Banyumas, Jawa Tengah 53126', 'Laki-laki', 'Purwokerto', '1995-01-10', 'face21.jpg', 'BW0001'),
('15110136', 'Dimas Wahyu R', 'JL. LETJEND POL SOEMARTO, Watumas, Purwanegara,Purwokerto Utara, Banyumas, Jawa Tengah 53126', 'Laki-laki', 'Purwokerto', '1995-01-10', 'face12.jpg', 'BW0004'),
('15110137', 'Fauzan', 'JL. LETJEND POL SOEMARTO, Watumas, Purwanegara,Purwokerto Utara, Banyumas, Jawa Tengah 53126', 'Laki-laki', 'Purwokerto', '1995-01-10', 'foto.jpg', 'BW0003'),
('15110139', 'Nawasena', 'Negoro Ngamarto', 'Laki-laki', 'Amarta', '2018-01-02', 'phone.png', 'BW0004'),
('17021991063', 'Uswatun Nur Jannah', 'Cilacap, Maos', 'Perempuan', 'Cilacap', '1991-04-03', '', 'BW0006');

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan_lembur`
--

CREATE TABLE `pengajuan_lembur` (
  `id_lembur` int(11) NOT NULL,
  `nip` varchar(100) NOT NULL,
  `kepentingan` varchar(100) NOT NULL,
  `waktu` varchar(11) NOT NULL,
  `tgl` date NOT NULL,
  `id_absensi` int(11) NOT NULL,
  `arsip` enum('Ya','Tidak') NOT NULL DEFAULT 'Tidak'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengajuan_lembur`
--

INSERT INTO `pengajuan_lembur` (`id_lembur`, `nip`, `kepentingan`, `waktu`, `tgl`, `id_absensi`, `arsip`) VALUES
(2, '15110135', 'mengerjakan laporanmengerjakan laporanmengerjakan laporanmengerjakan laporanmengerjakan laporan', '20:21', '2018-12-24', 7, 'Ya'),
(4, '15110136', 'mengerjakan laporan bareng yovie mengerjakan laporan bareng yoviemengerjakan laporan bareng yovie', '23:31', '2018-12-24', 13, 'Ya'),
(5, '15110137', 'mengerjakan laporan bareng yoviemengerjakan laporan bareng yoviemengerjakan laporan bareng yovie', '23:31', '2018-12-24', 14, 'Ya'),
(6, '15110135', 'klklklkl', '23:45', '2018-12-25', 17, 'Ya'),
(7, '15110135', 'klklklklk', '14:20', '2018-12-26', 22, 'Ya'),
(8, '15110134', 'menyelesaikan deadline minggu depan', '12:56', '2018-12-26', 21, 'Ya'),
(9, '15110135', 'deadline', '08:38', '2018-12-27', 0, 'Tidak');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_user` int(100) NOT NULL,
  `nip` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `hak_akses` enum('Admin','Pegawai') NOT NULL DEFAULT 'Pegawai',
  `status` enum('Baru','Lama') NOT NULL,
  `token` varchar(100) NOT NULL,
  `tokenExpire` datetime NOT NULL,
  `kode_qrcode` varchar(100) NOT NULL,
  `device` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_user`, `nip`, `email`, `password`, `hak_akses`, `status`, `token`, `tokenExpire`, `kode_qrcode`, `device`) VALUES
(2, '15110135', 'yoviefp@gmail.com', '9a079c8004162f3e6c38c904b284394a', 'Admin', 'Lama', '', '2018-12-23 21:14:47', 'y4l2r7kagqjts9531u0ehv8don61w11bpxcmzfi', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:60.0) Gecko/20100101 Firefox/60.0'),
(3, '15110134', 'notosetiyo8@gmail.com', '9a079c8004162f3e6c38c904b284394a', 'Pegawai', 'Lama', 'xow784nu3q', '2018-12-27 07:56:04', '5dyq9gjhm1v4wo31skpbie16a8tnucfr210zlx7', 'Mozilla/5.0 (Linux; Android 5.1.1; Lenovo A6020a40) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.99 Mobile Safari/537.36'),
(4, '15110136', '', '9a079c8004162f3e6c38c904b284394a', 'Pegawai', 'Lama', '', '0000-00-00 00:00:00', 'h1f1ne6g7idu9o1r3v2ctas01zljmqwxk4pb5y8', 'Mozilla/5.0 (Linux; Android 5.1.1; Lenovo A6020a40) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71'),
(5, '15110137', '', '9a079c8004162f3e6c38c904b284394a', 'Pegawai', 'Lama', '', '0000-00-00 00:00:00', '71xsqm1i8ha15c60tb1gkj3yupz4don29rwflve', 'Mozilla/5.0 (Linux; Android 5.1.1; Lenovo A6020a40) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71'),
(7, '15110139', '', '9a079c8004162f3e6c38c904b284394a', 'Pegawai', 'Lama', '', '0000-00-00 00:00:00', '', ''),
(8, '17021991063', '', '9a079c8004162f3e6c38c904b284394a', 'Pegawai', 'Lama', '', '0000-00-00 00:00:00', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `recovery_keys`
--

CREATE TABLE `recovery_keys` (
  `rid` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `token` varchar(50) NOT NULL,
  `valid` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id_absensi`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `jam`
--
ALTER TABLE `jam`
  ADD PRIMARY KEY (`id_jam`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`nip`),
  ADD KEY `jabatan` (`jabatan`);

--
-- Indexes for table `pengajuan_lembur`
--
ALTER TABLE `pengajuan_lembur`
  ADD PRIMARY KEY (`id_lembur`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `recovery_keys`
--
ALTER TABLE `recovery_keys`
  ADD PRIMARY KEY (`rid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id_absensi` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;
--
-- AUTO_INCREMENT for table `jam`
--
ALTER TABLE `jam`
  MODIFY `id_jam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pengajuan_lembur`
--
ALTER TABLE `pengajuan_lembur`
  MODIFY `id_lembur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_user` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `recovery_keys`
--
ALTER TABLE `recovery_keys`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD CONSTRAINT `pegawai_ibfk_1` FOREIGN KEY (`jabatan`) REFERENCES `jabatan` (`id_jabatan`) ON DELETE CASCADE ON UPDATE CASCADE;

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `test_event` ON SCHEDULE EVERY '0 8' DAY_HOUR STARTS '2018-09-30 07:14:33' ON COMPLETION NOT PRESERVE ENABLE DO INSERT INTO `absensi` (`id_absensi`) VALUES ('fsfsfsfsf')$$

DELIMITER ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
