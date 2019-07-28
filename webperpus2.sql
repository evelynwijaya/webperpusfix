-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2019 at 04:03 PM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webperpus2`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` varchar(60) NOT NULL,
  `judul_buku` varchar(50) NOT NULL,
  `id_penerbit` varchar(15) NOT NULL,
  `isbn` char(17) NOT NULL,
  `eksemplar` int(3) NOT NULL,
  `thn_terbit` int(4) NOT NULL,
  `deskripsi` text NOT NULL,
  `status` char(1) NOT NULL COMMENT '1 = "available", 2 = "not available"',
  `kode_ddc` int(10) NOT NULL,
  `request` varchar(9) NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `tanggal` datetime NOT NULL,
  `views` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `judul_buku`, `id_penerbit`, `isbn`, `eksemplar`, `thn_terbit`, `deskripsi`, `status`, `kode_ddc`, `request`, `gambar`, `tanggal`, `views`) VALUES
('Tut201915608655351', 'Tutorial Visual Studio', 'T-Add1558181408', '12121212', 1, 2018, 'aaaaaa apa lah', '2', 12345, 'none', '', '2019-06-18 21:45:35', 7),
('Tut201915608655352', 'Tutorial Visual Studio', 'T-Add1558181408', '12121212', 1, 2018, 'aaaaaa apa lah', '1', 12345, 'none', '', '2019-06-18 21:45:35', 0),
('Tut201915608686911', 'Tutorial Java', 'T-Gra1560868599', '12121212', 1, 2019, 'asasasas', '1', 2, 'none', '', '2019-06-18 22:38:11', 6),
('Tut201915608686912', 'Tutorial Java', 'T-Gra1560868599', '12121212', 1, 2019, 'asasasas', '1', 2, 'none', '', '2019-06-18 22:38:11', 0),
('Tut201915611234481', 'Tutorial Pascal', 'T-Gra1558181419', '12121212', 1, 2019, 'APa saja tang penting pelajari pascal', '1', 12345, 'none', '', '2019-06-21 21:24:08', 0),
('Tut201915611234482', 'Tutorial Pascal', 'T-Gra1558181419', '12121212', 1, 2019, 'APa saja tang penting pelajari pascal', '1', 12345, 'none', '', '2019-06-21 21:24:08', 0),
('Tut201915611234483', 'Tutorial Pascal', 'T-Gra1558181419', '12121212', 1, 2019, 'APa saja tang penting pelajari pascal', '1', 12345, 'none', '', '2019-06-21 21:24:09', 0),
('Tut201915611235251', 'Tutorial Phyton', 'T-Gra1558181419', '12121212', 1, 2019, 'aaaa', '1', 2, 'none', '', '2019-06-21 21:25:25', 57),
('Tut201915611320641', 'Tutorial Word', 'T-Gra1558181419', '12121212', 1, 2019, '', '1', 2, 'none', '', '2019-06-21 23:47:44', 14),
('Tut201915611320642', 'Tutorial Word', 'T-Gra1558181419', '12121212', 1, 2019, '', '1', 2, 'none', '', '2019-06-21 23:47:44', 0);

-- --------------------------------------------------------

--
-- Table structure for table `bukupengarang`
--

CREATE TABLE `bukupengarang` (
  `id_buku` varchar(60) NOT NULL,
  `id_pengarang` varchar(100) NOT NULL,
  `urutan` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `bukupengarang`
--

INSERT INTO `bukupengarang` (`id_buku`, `id_pengarang`, `urutan`) VALUES
('Tut20191560865535', 'P-JP1559703116', 1),
('Tut20191560868691', 'P-WE1560824997', 1),
('Tut20191561123448', '', 1),
('Tut20191561123448', 'P-JC1560827084', 2),
('Tut20191561123448', 'P-HP1558175903', 3),
('Tut20191561123525', 'P-EW1560825199', 1),
('Tut20191561132064', 'P-JP1559703116', 1);

-- --------------------------------------------------------

--
-- Table structure for table `jurnal`
--

CREATE TABLE `jurnal` (
  `id_jurnal` varchar(15) NOT NULL,
  `judul_jurnal` varchar(200) NOT NULL,
  `volume` int(2) NOT NULL,
  `nomor` int(3) NOT NULL,
  `halaman` int(4) NOT NULL,
  `tgl_terbit` date NOT NULL,
  `id_penerbit` varchar(15) NOT NULL,
  `issn` int(8) NOT NULL,
  `gambar` varchar(200) NOT NULL,
  `tanggal` datetime NOT NULL,
  `views` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `jurnal`
--

INSERT INTO `jurnal` (`id_jurnal`, `judul_jurnal`, `volume`, `nomor`, `halaman`, `tgl_terbit`, `id_penerbit`, `issn`, `gambar`, `tanggal`, `views`) VALUES
('Ana1558416974', 'Analisis dan perancangan desain sistem informasi perpustakaan sekolah  berdasarkan kebutuhan sistem', 14, 1, 100, '2019-05-21', 'T-Gra1558181419', 2477, 'Ana1558416974.jpg', '2019-06-07 14:30:43', 0),
('Apa1559882318', 'Apa lah gitu jurnal', 121, 1, 2, '2019-06-08', 'T-Gra1558181419', 121212120, 'Apa1559882318.jpg', '2019-06-07 14:30:20', 0),
('Apa1559888687', 'Apa lah gitu jurnal tes', 1, 2, 3, '2019-06-07', 'T-Jas1559719347', 1121212, 'Apa1559888687.jpg', '2019-06-07 14:30:03', 0),
('Apa1560081904', 'Apa lah gitu jurnal tess', 123, 1, 2, '2019-06-09', 'T-Gra1558181419', 12121210, 'Apa1560081904.jpg', '2019-06-09 20:12:28', 0);

-- --------------------------------------------------------

--
-- Table structure for table `paper`
--

CREATE TABLE `paper` (
  `id_paper` varchar(15) NOT NULL,
  `judul_paper` varchar(200) NOT NULL,
  `id_jurnal` varchar(15) NOT NULL,
  `halaman` int(7) NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `paper`
--

INSERT INTO `paper` (`id_paper`, `judul_paper`, `id_jurnal`, `halaman`, `tanggal`) VALUES
('apa1559881601', 'apa saja kah yang penting 3', 'Ana1558416974', 123, '2019-06-07 13:29:53'),
('apa1559889219', 'apa saja kah yang penting 3', 'Apa1559882318', 3, '2019-06-07 14:40:26'),
('apa1559891848', 'apa saja kah yang penting 3', 'Apa1559888687', 1212, '2019-06-07 15:17:28'),
('apa1560827152', 'apa saja kah yang penting terbary', 'Apa1559888687', 121212, '2019-06-18 11:05:52');

-- --------------------------------------------------------

--
-- Table structure for table `paperpengarang`
--

CREATE TABLE `paperpengarang` (
  `id_paper` varchar(15) NOT NULL,
  `id_pengarang` varchar(100) NOT NULL,
  `urutan` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `paperpengarang`
--

INSERT INTO `paperpengarang` (`id_paper`, `id_pengarang`, `urutan`) VALUES
('apa1559881601', 'P-AP1559803475', 1),
('apa1559889219', 'P-HP1558175903', 1),
('apa1559889219', 'P-AS1558175854', 2),
('apa1559891848', 'P-AP1559803475', 1),
('apa1560827152', 'P-JC1560827084', 1),
('apa1560827152', 'P-EW1560825199', 2);

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` varchar(30) NOT NULL,
  `id_anggota` varchar(30) NOT NULL,
  `id_admin` varchar(30) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `status_peminjaman` char(1) NOT NULL COMMENT 'Y = "Pinjam", N = "Kembali"'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `id_anggota`, `id_admin`, `tgl_pinjam`, `tgl_kembali`, `jumlah`, `status_peminjaman`) VALUES
('1561124545', '51015006', '52015022', '2019-06-21', '2019-06-24', 0, 'N'),
('1561131975', '51015002', '52015022', '2019-06-21', '2019-06-24', 0, 'N'),
('1561174570', '51015006', '52015022', '2019-06-22', '2019-06-25', 0, 'N'),
('1561175599', '51015005', '52015022', '2019-06-22', '2019-06-25', 0, 'N'),
('1561176263', '51015004', '52015022', '2019-06-22', '2019-06-25', 0, 'N'),
('1561176912', '51015004', '52015022', '2019-06-22', '2019-06-25', 0, 'N'),
('1561177443', '51015004', '52015022', '2019-06-22', '2019-06-25', 0, 'N'),
('1561182414', '51015003', '52015022', '2019-06-22', '2019-06-25', 0, 'N'),
('1561374678', '51015005', '52015022', '2019-06-24', '2019-06-27', 0, 'N'),
('1561376564', '51015005', '52015022', '2019-06-24', '2019-06-27', 0, 'N'),
('1561377529', '51015004', '52015022', '2019-06-24', '2019-06-27', 1, 'Y'),
('1561707318', '51015006', '52015022', '2019-06-28', '2019-07-01', 0, 'N'),
('1561727821', '51015006', '52015022', '2019-06-28', '2019-07-01', 0, 'N'),
('1561728415', '51015006', '52015022', '2019-06-28', '2019-07-01', 0, 'N');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman_detail`
--

CREATE TABLE `peminjaman_detail` (
  `id_peminjaman` varchar(30) NOT NULL,
  `id_buku` varchar(30) NOT NULL,
  `batas_kembali` date NOT NULL,
  `status_kembali` char(1) NOT NULL COMMENT 'Y = "Pinjam", N = "Kembali"'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `peminjaman_detail`
--

INSERT INTO `peminjaman_detail` (`id_peminjaman`, `id_buku`, `batas_kembali`, `status_kembali`) VALUES
('1561124545', 'Tut201915608686911', '2019-06-24', 'N'),
('1561124545', 'Tut201915611235251', '2019-06-24', 'N'),
('1561124545', 'Tut201915608655351', '2019-06-24', 'N'),
('1561131975', 'Tut201915608686912', '2019-06-24', 'N'),
('1561131975', 'Tut201915611234481', '2019-06-24', 'N'),
('1561174570', 'Tut201915608655351', '2019-06-25', 'N'),
('1561174570', 'Tut201915608686911', '2019-06-25', 'N'),
('1561174570', 'Tut201915611234481', '2019-06-25', 'N'),
('1561175599', 'Tut201915608655351', '2019-06-25', 'N'),
('1561175599', 'Tut201915608686911', '2019-06-25', 'N'),
('1561175599', 'Tut201915611234481', '2019-06-25', 'N'),
('1561176263', 'Tut201915608655351', '2019-06-25', 'N'),
('1561176912', 'Tut201915608655351', '2019-06-21', 'N'),
('1561177443', 'Tut201915608655352', '2019-06-28', 'N'),
('1561182414', 'Tut201915611235251', '2019-06-21', 'N'),
('1561374678', 'Tut201915608655351', '2019-06-27', 'N'),
('1561374678', 'Tut201915608686911', '2019-06-27', 'N'),
('1561374678', 'Tut201915611234481', '2019-06-27', 'N'),
('1561376564', 'Tut201915608655351', '2019-06-27', 'N'),
('1561376564', 'Tut201915608686911', '2019-06-27', 'N'),
('1561376564', 'Tut201915611234481', '2019-06-27', 'N'),
('1561377529', 'Tut201915608655351', '2019-06-27', 'Y'),
('1561707318', 'Tut201915611235251', '2019-07-01', 'N'),
('1561727821', 'Tut201915611235251', '2019-07-01', 'N'),
('1561728415', 'Tut201915611235251', '2019-07-01', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `penerbit`
--

CREATE TABLE `penerbit` (
  `id_penerbit` varchar(15) NOT NULL,
  `nama_penerbit` varchar(20) NOT NULL,
  `tempat_terbit` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `penerbit`
--

INSERT INTO `penerbit` (`id_penerbit`, `nama_penerbit`, `tempat_terbit`) VALUES
('T-Add1558181408', 'Addison Wesley', 'New York'),
('T-Eve1560867254', 'Evelyn Percetakan', ''),
('T-Gra1558181419', 'Gramedia', 'Jakarta'),
('T-Gra1560867618', 'Gramedia 2', ''),
('T-Gra1560868483', 'Gramedia 3', 'makassar'),
('T-Gra1560868599', 'Gramedia 4', ''),
('T-Gra1560868621', 'Gramedia 5', 'makassar'),
('T-Jas1559719347', 'Jason', 'Pratama'),
('T-Lin1558181430', 'Lingga Jaya', 'Yogyakarta'),
('T-Pus1560866361', 'Pusat Cetak', 'Indonesia');

-- --------------------------------------------------------

--
-- Table structure for table `pengarang`
--

CREATE TABLE `pengarang` (
  `id_pengarang` varchar(15) NOT NULL,
  `nama_depan` varchar(20) NOT NULL,
  `nama_belakang` varchar(20) NOT NULL,
  `institusi` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `pengarang`
--

INSERT INTO `pengarang` (`id_pengarang`, `nama_depan`, `nama_belakang`, `institusi`) VALUES
('P-AP1559803475', 'Anto', 'Pratama', 'STMIK Kharisma'),
('P-AP1559803658', 'Anto2', 'Pratama2', 'STMIK Kharisma'),
('P-AP1559803677', 'Anto3', 'Pratama3', 'STMIK Kharisma'),
('P-AS1558175665', 'Azhar', 'Susanto', NULL),
('P-AS1558175854', 'Azhar', 'Suparno', NULL),
('P-AS1559987387', 'Agus', 'Salim', 'STMIK Kharisma'),
('P-DA1558175893', 'Dimitri', 'Aivaliotis', NULL),
('P-EW1560825199', 'Evelyn 3', 'Wijaya', 'Indonesia'),
('P-HP1558175903', 'Howard', 'Posdewa', NULL),
('P-J1560824924', 'Jason', '', ''),
('P-JC1560826937', 'Jesslyn', 'Chandra', ''),
('P-JC1560827084', 'Jesslyn 2', 'Chandra', ''),
('P-JP1559703116', 'Jason', 'Pratama', 'stmik kharisma'),
('P-JP1559703141', 'Jason', 'Pratama', 'stmik kharisma'),
('P-LT1558175912', 'Laura', 'Thomson', NULL),
('P-LW1558175921', 'Luke ', 'Welling', NULL),
('P-MI1558175938', 'Mahfud', 'Ikhwan', NULL),
('P-MK1558175947', 'Michael', 'Kofler', NULL),
('P-PA1559987415', 'Panji', 'Asmoro', 'Indonesia'),
('P-RS1558175963', 'Roger', 'S.Pressman', NULL),
('P-RS1558441543', 'Roger', 'Susanto', ''),
('P-S1560819810', 'Supriadi', '', ''),
('P-SA1560819730', 'Supriadi', 'Anto', ''),
('P-WE1560824972', 'Wijaya', 'Evelyn', ''),
('P-WE1560824997', 'Wijaya 2', 'Evelyn', 'STMIK Kharisma'),
('S-EvelynW156082', 'Evelyn', 'W', NULL),
('S-EvelynWijaya1', 'Evelyn', 'Wijaya', NULL),
('S-JasonP1559730', 'Jason Pratama', 'Sunarji', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pengembalian`
--

CREATE TABLE `pengembalian` (
  `id_pengembalian` int(11) NOT NULL,
  `id_peminjaman` varchar(30) NOT NULL,
  `tgl_kembali` date NOT NULL,
  `telat` int(11) NOT NULL,
  `jmh_kembali` int(11) NOT NULL,
  `sisa` int(11) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `pengembalian`
--

INSERT INTO `pengembalian` (`id_pengembalian`, `id_peminjaman`, `tgl_kembali`, `telat`, `jmh_kembali`, `sisa`, `status`) VALUES
(1, '20190608001', '2019-06-08', 0, 0, 0, 'Y'),
(2, '20190608002', '2019-06-21', 11, 0, 0, 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `pengembalian_detail`
--

CREATE TABLE `pengembalian_detail` (
  `id_buku` varchar(30) NOT NULL,
  `id_peminjaman` varchar(30) NOT NULL,
  `tgl_kembali` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `pengembalian_detail`
--

INSERT INTO `pengembalian_detail` (`id_buku`, `id_peminjaman`, `tgl_kembali`) VALUES
('PHP1559987489', '20190608001', '2019-06-08'),
('Res1559987532', '20190608001', '2019-06-08');

-- --------------------------------------------------------

--
-- Table structure for table `request_buku`
--

CREATE TABLE `request_buku` (
  `id_buku` varchar(30) NOT NULL,
  `id_anggota` varchar(30) NOT NULL,
  `tgl_request` datetime NOT NULL,
  `status` varchar(3) NOT NULL COMMENT '1=request 2=ambil 3=tersedia 9=batal request',
  `tgl_ready` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `request_buku`
--

INSERT INTO `request_buku` (`id_buku`, `id_anggota`, `tgl_request`, `status`, `tgl_ready`) VALUES
('Tut20191561123525', '52015022', '2019-06-28 15:40:01', '9', '2019-06-27'),
('Tut20191561123525', '51015006', '2019-06-28 15:40:38', '1', '2019-07-01'),
('Tut20191561123525', '51015005', '2019-06-28 16:08:10', '1', '2019-07-01');

-- --------------------------------------------------------

--
-- Table structure for table `skripsi`
--

CREATE TABLE `skripsi` (
  `id_skripsi` varchar(20) NOT NULL,
  `judul_skripsi` varchar(200) NOT NULL,
  `thn_terbit` int(4) NOT NULL,
  `jurusan` varchar(40) NOT NULL,
  `lulusan` varchar(40) NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `skripsi`
--

INSERT INTO `skripsi` (`id_skripsi`, `judul_skripsi`, `thn_terbit`, `jurusan`, `lulusan`, `tanggal`) VALUES
('Imp20191559730888', 'Implementasi Design Patter', 2019, 'Informatika (TI)', 'Strata Satu (S1)', '2019-06-05 18:34:48'),
('Imp20191559730943', 'Implementasi Design Pattern Android', 2018, 'Informatika (TI)', 'Diploma Tiga (D3)', '2019-06-07 10:30:35'),
('Imp20191560823354', 'Implementasi Design Pattern Android versi 2', 2019, 'Sistem Informasi (SI)', 'Strata Satu (S1)', '2019-06-18 10:02:34'),
('Imp20191560823399', 'Implementasi Design Pattern Android versi 2 MVC', 2019, 'Sistem Informasi (SI)', 'Strata Satu (S1)', '2019-06-18 10:03:19');

-- --------------------------------------------------------

--
-- Table structure for table `skripsipengarang`
--

CREATE TABLE `skripsipengarang` (
  `id_pengarang` varchar(15) NOT NULL,
  `id_skripsi` varchar(20) NOT NULL,
  `pembimbing1` varchar(100) NOT NULL,
  `pembimbing2` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `skripsipengarang`
--

INSERT INTO `skripsipengarang` (`id_pengarang`, `id_skripsi`, `pembimbing1`, `pembimbing2`) VALUES
('S-JasonP1559730', 'Imp20191559730943', 'Aco 2', 'Anto 2'),
('S-EvelynW156082', 'Imp20191560823354', 'Jaosn', 'Pratama'),
('S-EvelynWijaya1', 'Imp20191560823399', 'Pak Sofyan', 'Ibu Sukma');

-- --------------------------------------------------------

--
-- Table structure for table `temp_peminjaman`
--

CREATE TABLE `temp_peminjaman` (
  `id_buku` varchar(30) NOT NULL,
  `judul_buku` varchar(80) NOT NULL,
  `pengarang` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `nim` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(300) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`nim`, `nama`, `password`, `status`) VALUES
(51015001, 'AGUNG ASHARI AR', 'e10adc3949ba59abbe56e057f20f883e', 'User'),
(51015002, 'AHMAD ERIL', 'e10adc3949ba59abbe56e057f20f883e', 'User'),
(51015003, 'APRIANTO', 'e10adc3949ba59abbe56e057f20f883e', 'User'),
(51015004, 'BILLY TANYAWAN', 'e10adc3949ba59abbe56e057f20f883e', 'User'),
(51015005, 'CALVIN THOUW', 'e10adc3949ba59abbe56e057f20f883e', 'User'),
(51015006, 'EVELYN WILBERT WIJAYA', 'e10adc3949ba59abbe56e057f20f883e', 'User'),
(51015007, 'FELISCA JIERETNO', 'e10adc3949ba59abbe56e057f20f883e', 'User'),
(51015008, 'FLORENCIA IRENA', 'e10adc3949ba59abbe56e057f20f883e', 'User'),
(51015009, 'HARIYONO HONORIS', 'e10adc3949ba59abbe56e057f20f883e', 'User'),
(51015010, 'IVAN DARMAWAN', 'e10adc3949ba59abbe56e057f20f883e', 'User'),
(51015011, 'JESSICA CHANDRA', 'e10adc3949ba59abbe56e057f20f883e', 'User'),
(51015012, 'KENNY', 'e10adc3949ba59abbe56e057f20f883e', 'User'),
(51015013, 'MESA', 'e10adc3949ba59abbe56e057f20f883e', 'User'),
(51015014, 'MICHAEL C. UMBOH', 'e10adc3949ba59abbe56e057f20f883e', 'User'),
(51015015, 'REGINA LORDIANTO', 'e10adc3949ba59abbe56e057f20f883e', 'User'),
(51015016, 'WINNY CLAUDIA WATULINGAS', 'e10adc3949ba59abbe56e057f20f883e', 'User'),
(51015017, 'YANORIS ARNOLD NIGGA', 'e10adc3949ba59abbe56e057f20f883e', 'User'),
(51015018, 'YELISHIA TANDILISAN', 'e10adc3949ba59abbe56e057f20f883e', 'User'),
(51015019, 'ALFREDO HIDAYAH TUWLLAH', 'e10adc3949ba59abbe56e057f20f883e', 'User'),
(51015901, 'WIDYARTO S THAYF', 'e10adc3949ba59abbe56e057f20f883e', 'User'),
(52015022, 'Jason P', 'e10adc3949ba59abbe56e057f20f883e', 'Admin'),
(52015442, 'MAHASISWA SAMPLE TEST', 'e10adc3949ba59abbe56e057f20f883e', 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`) USING BTREE;

--
-- Indexes for table `jurnal`
--
ALTER TABLE `jurnal`
  ADD PRIMARY KEY (`id_jurnal`) USING BTREE;

--
-- Indexes for table `paper`
--
ALTER TABLE `paper`
  ADD PRIMARY KEY (`id_paper`) USING BTREE;

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`) USING BTREE;

--
-- Indexes for table `penerbit`
--
ALTER TABLE `penerbit`
  ADD PRIMARY KEY (`id_penerbit`) USING BTREE;

--
-- Indexes for table `pengarang`
--
ALTER TABLE `pengarang`
  ADD PRIMARY KEY (`id_pengarang`) USING BTREE;

--
-- Indexes for table `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD PRIMARY KEY (`id_pengembalian`) USING BTREE;

--
-- Indexes for table `skripsi`
--
ALTER TABLE `skripsi`
  ADD PRIMARY KEY (`id_skripsi`) USING BTREE;

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`nim`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pengembalian`
--
ALTER TABLE `pengembalian`
  MODIFY `id_pengembalian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `nim` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52015443;

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `my_event` ON SCHEDULE EVERY 1 MINUTE STARTS '2019-06-28 16:42:00' ON COMPLETION PRESERVE ENABLE DO UPDATE `request_buku` SET `request_buku`.`status` = 9 WHERE `request_buku`.`tgl_ready` < CURDATE()$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
