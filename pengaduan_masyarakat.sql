-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Mar 2022 pada 20.08
-- Versi server: 10.4.10-MariaDB
-- Versi PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pengaduan_masyarakat`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `table_jenis_pengaduan`
--

CREATE TABLE `table_jenis_pengaduan` (
  `id_jenis_pengaduan` int(11) NOT NULL,
  `jenis` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `table_jk`
--

CREATE TABLE `table_jk` (
  `id_jk` int(2) NOT NULL,
  `jk` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `table_jk`
--

INSERT INTO `table_jk` (`id_jk`, `jk`) VALUES
(1, 'Laki-Laki'),
(2, 'Perempaun');

-- --------------------------------------------------------

--
-- Struktur dari tabel `table_role`
--

CREATE TABLE `table_role` (
  `id_role` int(2) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `table_role`
--

INSERT INTO `table_role` (`id_role`, `role`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Struktur dari tabel `table_status`
--

CREATE TABLE `table_status` (
  `id_status` int(2) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `table_status`
--

INSERT INTO `table_status` (`id_status`, `status`) VALUES
(1, 'Proses'),
(2, 'Diterima'),
(3, 'Ditolak');

-- --------------------------------------------------------

--
-- Struktur dari tabel `table_tiket`
--

CREATE TABLE `table_tiket` (
  `id_tiket` int(11) NOT NULL,
  `no_tiket` int(6) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_jenis_pengaduan` int(11) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `tgl_tiket` date NOT NULL,
  `id_status` int(2) NOT NULL,
  `isian_laporan` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `table_user`
--

CREATE TABLE `table_user` (
  `id_user` bigint(16) NOT NULL,
  `nama` varchar(127) NOT NULL,
  `id_jk` int(2) NOT NULL,
  `email` varchar(127) NOT NULL,
  `password` varchar(127) NOT NULL,
  `alamat` varchar(127) NOT NULL,
  `telp` varchar(15) NOT NULL,
  `id_role` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `table_user`
--

INSERT INTO `table_user` (`id_user`, `nama`, `id_jk`, `email`, `password`, `alamat`, `telp`, `id_role`) VALUES
(3525010510930001, 'Kharisma Dharma Putra', 1, 'kharisma@gmail.com', '$2y$10$4JURKm60GhaaBsdKzh.ceeLygXCT9SrZ/I5sehRpg5nksufIx6gGK', 'Jln Raya Bokor', '057887654532', 2),
(3525015201880002, 'Feri Yulianto', 1, 'feri@gmail.com', '$2y$10$WdIfBTfD7WB2//4Bnz1p8ua4yTLci55H42Z0prkOX.shvkMzkfZli', 'Jln Raya Bokor', '123456789012', 2),
(3525017006650074, 'Dewi Fatmasari', 2, 'dewi@gmail.com', '$2y$10$KYGQYKu74PcKIwrScGvjbuNhPtS9Jn8V42bvdK8YXbeujbVHCQus.', 'Jln Raya Bokokl', '876545677654', 2),
(3525017006650078, 'Pratama', 1, 'pratama@gmail.com', '$2y$10$2ZxoetbExCQGoYHVx7GVxuutiFCm8YY/YTHsFMR6/9lKCJGvyZOv.', 'Jln Raya BOkor', '876556788789', 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `table_jenis_pengaduan`
--
ALTER TABLE `table_jenis_pengaduan`
  ADD PRIMARY KEY (`id_jenis_pengaduan`);

--
-- Indeks untuk tabel `table_jk`
--
ALTER TABLE `table_jk`
  ADD PRIMARY KEY (`id_jk`);

--
-- Indeks untuk tabel `table_role`
--
ALTER TABLE `table_role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indeks untuk tabel `table_status`
--
ALTER TABLE `table_status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indeks untuk tabel `table_tiket`
--
ALTER TABLE `table_tiket`
  ADD PRIMARY KEY (`id_tiket`);

--
-- Indeks untuk tabel `table_user`
--
ALTER TABLE `table_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `table_jenis_pengaduan`
--
ALTER TABLE `table_jenis_pengaduan`
  MODIFY `id_jenis_pengaduan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `table_jk`
--
ALTER TABLE `table_jk`
  MODIFY `id_jk` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `table_role`
--
ALTER TABLE `table_role`
  MODIFY `id_role` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `table_status`
--
ALTER TABLE `table_status`
  MODIFY `id_status` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `table_tiket`
--
ALTER TABLE `table_tiket`
  MODIFY `id_tiket` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
