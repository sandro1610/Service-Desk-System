-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 17 Feb 2021 pada 08.11
-- Versi Server: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `isds`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_item`
--

CREATE TABLE `tb_item` (
  `id_item` int(11) NOT NULL,
  `name_item` text NOT NULL,
  `type_item` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_item`
--

INSERT INTO `tb_item` (`id_item`, `name_item`, `type_item`) VALUES
(1, 'Aplikasi', 'Software'),
(2, 'E-mail', 'Software');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kind_req`
--

CREATE TABLE `tb_kind_req` (
  `id_request` int(11) NOT NULL,
  `name_request` text NOT NULL,
  `type_request` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kind_req`
--

INSERT INTO `tb_kind_req` (`id_request`, `name_request`, `type_request`) VALUES
(1, 'Pembuatan Aplikasi', 'Software'),
(2, 'Pengembangan Aplikasi', 'Software'),
(3, 'Pengadaan Barang', 'Hardware');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_problem`
--

CREATE TABLE `tb_problem` (
  `no_ticket` int(11) NOT NULL,
  `tgl_prob` date NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_section` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `id_service` int(11) NOT NULL,
  `problem` text NOT NULL,
  `id_item` int(11) NOT NULL,
  `attachment` text NOT NULL,
  `v_key` text NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_problem`
--

INSERT INTO `tb_problem` (`no_ticket`, `tgl_prob`, `id_user`, `id_section`, `status`, `id_service`, `problem`, `id_item`, `attachment`, `v_key`, `email`) VALUES
(1, '2020-08-13', 16, 3, 3, 1, 'Laptop Rusak', 1, 'SES 13-Aug-2020 07-30-06.docx', '7043e2b17b3631d2c69fa521701fbee0', 'monica@gmail.com'),
(2, '2021-02-11', 16, 3, 3, 1, 'komputer nlue screen', 1, 'SES 11-Feb-2021 05-54-56.docx', '998de0cdd5c0bdd9e3b78cec6415ea1c', 'monica@gmail.com'),
(3, '2021-02-12', 20, 1, 3, 1, 'perbaiki bug aplikasi ', 1, 'SIT 12-Feb-2021 07-43-46.docx', '96441bbeab1bdc26d85a54004b0e9c26', 'hafisibrahim@gmail.com'),
(4, '2021-02-13', 20, 1, 3, 1, 'Printer tidak bisa ngeprint', 1, 'SIT 13-Feb-2021 09-18-20.docx', '49d848f2e2734b8c94c2b5baf31d6401', 'hafisibrahim@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_request`
--

CREATE TABLE `tb_request` (
  `no_ticket` int(11) NOT NULL,
  `tgl_req` date NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_section` int(11) NOT NULL,
  `id_request` int(11) NOT NULL,
  `id_item` int(11) NOT NULL,
  `description` text NOT NULL,
  `attachment` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `v_key` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_request`
--

INSERT INTO `tb_request` (`no_ticket`, `tgl_req`, `id_user`, `id_section`, `id_request`, `id_item`, `description`, `attachment`, `email`, `v_key`, `status`) VALUES
(4, '2021-02-13', 16, 3, 3, 1, 'meja aku rusak njir, ganti yang baru eeh', 'SES 13-Feb-2021 08-00-24.docx', 'monica@gmail.com', 'f865bd3ec21336adec9057c5c9275b9e', 9),
(5, '2021-02-13', 16, 3, 3, 1, 'Meja Rusak tidak bisa digunakan lagi', 'SES 13-Feb-2021 08-13-13.docx', 'monica@gmail.com', '9bb5696326b581e6dfde0835eaee2c60', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_section`
--

CREATE TABLE `tb_section` (
  `id_section` int(11) NOT NULL,
  `section` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_section`
--

INSERT INTO `tb_section` (`id_section`, `section`) VALUES
(1, 'SIT'),
(2, 'SCA'),
(3, 'SES'),
(4, 'SMT'),
(5, 'SQA'),
(6, 'SRO'),
(8, 'DP');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_service`
--

CREATE TABLE `tb_service` (
  `id_service` int(11) NOT NULL,
  `name_service` text NOT NULL,
  `type_service` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_service`
--

INSERT INTO `tb_service` (`id_service`, `name_service`, `type_service`) VALUES
(1, 'Repair', 'Software'),
(2, 'Changing', 'Hardware');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `level` varchar(10) NOT NULL,
  `id_section` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `password`, `nama`, `email`, `level`, `id_section`) VALUES
(15, '$2y$10$EC/oAsPsTjB9Ci4BNsju9e1pV0P5cKjKWOiu5vWI9Ngp44YHAAZrC', 'Geofanny Lorenza', 'geofanny@gmail.com', 'manager', 3),
(16, '$2y$10$ixetkWg/QwvxB/coDE.v7ubbtkXis2QaIb7N.nRP/hqsWAYqXfVB6', 'Monica Angelina Panggabean', 'monica@gmail.com', 'staff', 3),
(18, '$2y$10$cui8/GnUIFnblLry9Xae7unHiGyVw9ECfoZLrtzukOGMet9PiIOz6', 'Mikhael Sandro', 'mkhlsndr@gmail.com', 'admin', 1),
(19, '$2y$10$l2ggZTT4yTZfpiSzUsJqyOI7j7IaoUi4B6pzRoryOjdLoFTgCJ11K', 'Ramanda Sari Sinabang', 'ramanda@gmail.com', 'manager', 8),
(20, '$2y$10$HIPaAAoWXMD.lzz4hgZteOwhv8OXyhV81/gYdUV.zDvVPLENpoaIu', 'Hafiz ibrahim', 'hafisibrahim@gmail.com', 'staff', 1),
(21, '$2y$10$34T0cBK6FG/jGjzIZJhAx.GIJnLduXs2VvGgDVVx1Dm6G7Wj4JhES', 'Jaka', 'jaka@gmail.com', 'engineer', 3),
(26, '$2y$10$TvV.MlWz2k8YswaEn5mSKOccvO2YdbnbBXOkeSzt9LTDoHWkkypR.', 'Harun Santoso', 'harun@gmail.com', 'petugas', 8),
(27, '$2y$10$JQ2mWcvLtc8NR0/g4aheSeN05qZjy/pCDon.SbeMe/NQt7MevDM/e', 'Edwin El Ammar', 'edwin@gmail.com', 'Manager', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_item`
--
ALTER TABLE `tb_item`
  ADD PRIMARY KEY (`id_item`),
  ADD KEY `id_item` (`id_item`);

--
-- Indexes for table `tb_kind_req`
--
ALTER TABLE `tb_kind_req`
  ADD PRIMARY KEY (`id_request`);

--
-- Indexes for table `tb_problem`
--
ALTER TABLE `tb_problem`
  ADD PRIMARY KEY (`no_ticket`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_section` (`id_section`);

--
-- Indexes for table `tb_request`
--
ALTER TABLE `tb_request`
  ADD PRIMARY KEY (`no_ticket`);

--
-- Indexes for table `tb_section`
--
ALTER TABLE `tb_section`
  ADD PRIMARY KEY (`id_section`),
  ADD KEY `id_section` (`id_section`);

--
-- Indexes for table `tb_service`
--
ALTER TABLE `tb_service`
  ADD PRIMARY KEY (`id_service`),
  ADD KEY `id_service` (`id_service`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_section` (`id_section`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_item`
--
ALTER TABLE `tb_item`
  MODIFY `id_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_kind_req`
--
ALTER TABLE `tb_kind_req`
  MODIFY `id_request` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_problem`
--
ALTER TABLE `tb_problem`
  MODIFY `no_ticket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tb_request`
--
ALTER TABLE `tb_request`
  MODIFY `no_ticket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tb_section`
--
ALTER TABLE `tb_section`
  MODIFY `id_section` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tb_service`
--
ALTER TABLE `tb_service`
  MODIFY `id_service` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_problem`
--
ALTER TABLE `tb_problem`
  ADD CONSTRAINT `tb_problem_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD CONSTRAINT `tb_user_ibfk_1` FOREIGN KEY (`id_section`) REFERENCES `tb_section` (`id_section`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
