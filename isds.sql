-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 13 Agu 2020 pada 08.33
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
(1, '2020-08-13', 16, 3, 4, 1, 'Laptop Rusak', 1, 'SES 13-Aug-2020 07-30-06.docx', '7043e2b17b3631d2c69fa521701fbee0', 'monica@gmail.com');

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
(6, 'SRO');

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
(19, '$2y$10$l2ggZTT4yTZfpiSzUsJqyOI7j7IaoUi4B6pzRoryOjdLoFTgCJ11K', 'Ramanda Sari Sinabang', 'ramanda@gmail.com', 'admin', 1);

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
  MODIFY `no_ticket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_request`
--
ALTER TABLE `tb_request`
  MODIFY `no_ticket` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_section`
--
ALTER TABLE `tb_section`
  MODIFY `id_section` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tb_service`
--
ALTER TABLE `tb_service`
  MODIFY `id_service` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
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
