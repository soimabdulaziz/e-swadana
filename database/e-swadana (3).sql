-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Jan 2021 pada 14.22
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.3.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-swadana`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` int(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(200) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `passconf` varchar(50) NOT NULL,
  `JK` int(1) NOT NULL COMMENT '1:Laki-laki, 2:Perempuan',
  `new` varchar(1) NOT NULL,
  `Level` int(1) NOT NULL COMMENT '1:admin, 2:user'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `nama`, `alamat`, `username`, `pass`, `passconf`, `JK`, `new`, `Level`) VALUES
(50, 'admin', 'admin', 'admin', 'bfbde8e129701fe87e5e2b6e10a93101f3e3267e', 'bfbde8e129701fe87e5e2b6e10a93101f3e3267e', 1, '', 1),
(51, 'admin1', 'admin1', 'admin1', '664819d8c5343676c9225b5ed00a5cdc6f3a1ff3', '664819d8c5343676c9225b5ed00a5cdc6f3a1ff3', 2, 'Y', 1),
(52, 'test01', '111', 'test01', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', 1, 'Y', 2),
(53, 'test02', '11', 'test02', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', 2, 'Y', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dana_cadangan_sosial`
--

CREATE TABLE `dana_cadangan_sosial` (
  `id` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `ket` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dana_cadangan_sosial`
--

INSERT INTO `dana_cadangan_sosial` (`id`, `jumlah`, `ket`) VALUES
(1, 899100, 'dana_cadangan'),
(2, 999100, 'dana_sosial');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jasa`
--

CREATE TABLE `jasa` (
  `id_jasa` int(11) NOT NULL,
  `id_anggota` int(10) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `saldo_jasa` int(20) NOT NULL,
  `jasa_perbulan` int(20) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jasa`
--

INSERT INTO `jasa` (`id_jasa`, `id_anggota`, `jumlah`, `status`, `saldo_jasa`, `jasa_perbulan`, `tanggal`) VALUES
(312, 52, 0, '', 0, 0, '2020-12-10'),
(313, 53, 0, '', 0, 0, '2020-12-10'),
(314, 53, 200000, 'Penambahan', 0, 0, '2020-12-10'),
(315, 52, 100000, 'Penambahan', 0, 0, '2020-12-10'),
(316, 53, 200000, 'Pembayaran', 0, 0, '2021-01-10'),
(317, 52, 100000, 'Pembayaran', 0, 0, '2021-01-10'),
(318, 53, 2400000, 'Pembayaran', 0, 0, '2022-01-10'),
(319, 52, 1200000, 'Pembayaran', 0, 0, '2022-01-10'),
(320, 53, 2400000, 'Pembayaran', 0, 0, '2022-01-10'),
(321, 53, 2400000, 'Pembayaran', 0, 0, '2022-01-10'),
(322, 53, 2400000, 'Pembayaran', 0, 0, '2023-01-10'),
(323, 52, 1200000, 'Pembayaran', 0, 0, '2023-01-10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `maseter_data`
--

CREATE TABLE `maseter_data` (
  `id_master` int(5) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `jumlah` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `maseter_data`
--

INSERT INTO `maseter_data` (`id_master`, `keterangan`, `jumlah`) VALUES
(1, 'Simpanan Pokok', 100000),
(2, 'Simpanan Wajib', 100000),
(3, 'presentase', 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `id_pengeluaran` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` int(20) NOT NULL,
  `Keterangan` varchar(20) NOT NULL,
  `sisa_dana_cadangan` int(12) DEFAULT NULL,
  `sisa_dana_sosial` int(12) DEFAULT NULL,
  `sumber_pengeluaran` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengeluaran`
--

INSERT INTO `pengeluaran` (`id_pengeluaran`, `tanggal`, `jumlah`, `Keterangan`, `sisa_dana_cadangan`, `sisa_dana_sosial`, `sumber_pengeluaran`) VALUES
(18, '2021-01-08', 100000, 's', 1099100, 599550, 'Dana Cadangan'),
(19, '2021-01-08', 100000, 'q', 999100, 1099100, 'Dana Cadangan'),
(20, '2021-01-08', 100000, 'e', 899100, 999100, 'Dana Cadangan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `piutang`
--

CREATE TABLE `piutang` (
  `id_piutang` int(11) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `status` enum('Penambahan','Pembayaran') NOT NULL,
  `saldo_piutang` int(20) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `piutang`
--

INSERT INTO `piutang` (`id_piutang`, `id_anggota`, `jumlah`, `status`, `saldo_piutang`, `tanggal`) VALUES
(1, 52, 0, 'Penambahan', 0, '2020-12-10'),
(2, 53, 0, 'Penambahan', 0, '2020-12-10'),
(3, 53, 2000000, 'Penambahan', 2000000, '2020-12-10'),
(4, 52, 1000000, 'Penambahan', 1000000, '2020-12-10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `saldo_jasa`
--

CREATE TABLE `saldo_jasa` (
  `id_saldo_jasa` int(10) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `saldo_jasa` int(11) NOT NULL,
  `jasa_perbulan` int(50) NOT NULL,
  `sts` varchar(1) NOT NULL DEFAULT 'Y',
  `tempo` date NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `saldo_jasa`
--

INSERT INTO `saldo_jasa` (`id_saldo_jasa`, `id_anggota`, `saldo_jasa`, `jasa_perbulan`, `sts`, `tempo`, `tanggal`) VALUES
(80, 52, 100000, 0, 'N', '2023-02-01', '2020-12-10'),
(81, 53, 200000, 0, 'N', '2023-02-01', '2020-12-10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `saldo_piutang`
--

CREATE TABLE `saldo_piutang` (
  `id_saldo_p` int(11) NOT NULL,
  `id_anggota` int(10) NOT NULL,
  `saldo_piutang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `saldo_piutang`
--

INSERT INTO `saldo_piutang` (`id_saldo_p`, `id_anggota`, `saldo_piutang`) VALUES
(80, 52, 1000000),
(81, 53, 2000000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `saldo_sim_suk`
--

CREATE TABLE `saldo_sim_suk` (
  `id_sim_suk` int(11) NOT NULL,
  `id_anggota` int(10) NOT NULL,
  `saldo_sukarela` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `saldo_sim_suk`
--

INSERT INTO `saldo_sim_suk` (`id_sim_suk`, `id_anggota`, `saldo_sukarela`) VALUES
(80, 52, 0),
(81, 53, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `saldo_sim_w`
--

CREATE TABLE `saldo_sim_w` (
  `id_saldo` int(10) NOT NULL,
  `id_anggota` int(10) NOT NULL,
  `saldo_wajib` int(20) NOT NULL,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `saldo_sim_w`
--

INSERT INTO `saldo_sim_w` (`id_saldo`, `id_anggota`, `saldo_wajib`, `tanggal`) VALUES
(94, 52, 0, NULL),
(95, 53, 0, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `shu`
--

CREATE TABLE `shu` (
  `tahun` int(10) NOT NULL,
  `shu_takdibagi` int(20) NOT NULL,
  `shu_dibagi` int(20) NOT NULL,
  `cadangan` int(20) NOT NULL,
  `jasa_simpanan` int(20) NOT NULL,
  `jasa_anggota` int(20) NOT NULL,
  `jasa_pengurus` int(20) NOT NULL,
  `dana_sosial` int(20) NOT NULL,
  `total_shu` int(20) NOT NULL,
  `total_dana_cadangan` int(20) NOT NULL,
  `total_jasa_simpanan` int(20) NOT NULL,
  `total_jasa_anggota` int(20) NOT NULL,
  `total_jasa_pengurus` int(20) NOT NULL,
  `total_dana_sosial` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `shu`
--

INSERT INTO `shu` (`tahun`, `shu_takdibagi`, `shu_dibagi`, `cadangan`, `jasa_simpanan`, `jasa_anggota`, `jasa_pengurus`, `dana_sosial`, `total_shu`, `total_dana_cadangan`, `total_jasa_simpanan`, `total_jasa_anggota`, `total_jasa_pengurus`, `total_dana_sosial`) VALUES
(2022, 9000, 8391000, 839100, 2936850, 3356400, 839100, 419550, 8400000, 839100, 2936850, 3356400, 839100, 419550),
(2023, 9000, 3600000, 360000, 1260000, 1440000, 360000, 180000, 3609000, 1199100, 4196850, 4796400, 1199100, 599550);

-- --------------------------------------------------------

--
-- Struktur dari tabel `simpanan_pokok`
--

CREATE TABLE `simpanan_pokok` (
  `id_anggota` int(10) NOT NULL,
  `id_sim_p` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `simpanan_pokok`
--

INSERT INTO `simpanan_pokok` (`id_anggota`, `id_sim_p`, `jumlah`, `tanggal`) VALUES
(52, 125, 100000, '2020-12-10 00:57:22'),
(53, 126, 100000, '2020-12-10 00:57:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `simpanan_sukarela`
--

CREATE TABLE `simpanan_sukarela` (
  `id_sukarela` int(11) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `status` varchar(11) NOT NULL,
  `saldo_sukarela` int(20) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `simpanan_sukarela`
--

INSERT INTO `simpanan_sukarela` (`id_sukarela`, `id_anggota`, `jumlah`, `status`, `saldo_sukarela`, `tanggal`) VALUES
(181, 52, 0, '', 0, '2020-12-10'),
(182, 53, 0, '', 0, '2020-12-10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `simpanan_wajib`
--

CREATE TABLE `simpanan_wajib` (
  `id_simjib` int(11) NOT NULL,
  `id_anggota` int(10) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `saldo` int(11) NOT NULL,
  `status` enum('Pemasukan','Penarikan') DEFAULT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `simpanan_wajib`
--

INSERT INTO `simpanan_wajib` (`id_simjib`, `id_anggota`, `jumlah`, `saldo`, `status`, `tanggal`) VALUES
(333, 52, 0, 0, NULL, '2020-12-10'),
(334, 53, 0, 0, NULL, '2020-12-10');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indeks untuk tabel `dana_cadangan_sosial`
--
ALTER TABLE `dana_cadangan_sosial`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jasa`
--
ALTER TABLE `jasa`
  ADD PRIMARY KEY (`id_jasa`),
  ADD KEY `id_anggota` (`id_anggota`);

--
-- Indeks untuk tabel `maseter_data`
--
ALTER TABLE `maseter_data`
  ADD PRIMARY KEY (`id_master`);

--
-- Indeks untuk tabel `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`id_pengeluaran`);

--
-- Indeks untuk tabel `piutang`
--
ALTER TABLE `piutang`
  ADD PRIMARY KEY (`id_piutang`),
  ADD KEY `id_anggota` (`id_anggota`);

--
-- Indeks untuk tabel `saldo_jasa`
--
ALTER TABLE `saldo_jasa`
  ADD PRIMARY KEY (`id_saldo_jasa`),
  ADD UNIQUE KEY `id_anggota` (`id_anggota`);

--
-- Indeks untuk tabel `saldo_piutang`
--
ALTER TABLE `saldo_piutang`
  ADD PRIMARY KEY (`id_saldo_p`),
  ADD UNIQUE KEY `id_anggota` (`id_anggota`);

--
-- Indeks untuk tabel `saldo_sim_suk`
--
ALTER TABLE `saldo_sim_suk`
  ADD PRIMARY KEY (`id_sim_suk`),
  ADD KEY `id_anggota` (`id_anggota`);

--
-- Indeks untuk tabel `saldo_sim_w`
--
ALTER TABLE `saldo_sim_w`
  ADD PRIMARY KEY (`id_saldo`),
  ADD UNIQUE KEY `id_anggota` (`id_anggota`);

--
-- Indeks untuk tabel `shu`
--
ALTER TABLE `shu`
  ADD PRIMARY KEY (`tahun`);

--
-- Indeks untuk tabel `simpanan_pokok`
--
ALTER TABLE `simpanan_pokok`
  ADD PRIMARY KEY (`id_sim_p`),
  ADD UNIQUE KEY `id_anggota` (`id_anggota`),
  ADD KEY `id_anggota_2` (`id_anggota`);

--
-- Indeks untuk tabel `simpanan_sukarela`
--
ALTER TABLE `simpanan_sukarela`
  ADD PRIMARY KEY (`id_sukarela`),
  ADD KEY `id_anggota` (`id_anggota`);

--
-- Indeks untuk tabel `simpanan_wajib`
--
ALTER TABLE `simpanan_wajib`
  ADD PRIMARY KEY (`id_simjib`),
  ADD KEY `id_anggota` (`id_anggota`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id_anggota` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT untuk tabel `dana_cadangan_sosial`
--
ALTER TABLE `dana_cadangan_sosial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `jasa`
--
ALTER TABLE `jasa`
  MODIFY `id_jasa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=324;

--
-- AUTO_INCREMENT untuk tabel `maseter_data`
--
ALTER TABLE `maseter_data`
  MODIFY `id_master` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `id_pengeluaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `saldo_jasa`
--
ALTER TABLE `saldo_jasa`
  MODIFY `id_saldo_jasa` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT untuk tabel `saldo_piutang`
--
ALTER TABLE `saldo_piutang`
  MODIFY `id_saldo_p` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT untuk tabel `saldo_sim_suk`
--
ALTER TABLE `saldo_sim_suk`
  MODIFY `id_sim_suk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT untuk tabel `saldo_sim_w`
--
ALTER TABLE `saldo_sim_w`
  MODIFY `id_saldo` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT untuk tabel `simpanan_pokok`
--
ALTER TABLE `simpanan_pokok`
  MODIFY `id_sim_p` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT untuk tabel `simpanan_sukarela`
--
ALTER TABLE `simpanan_sukarela`
  MODIFY `id_sukarela` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=183;

--
-- AUTO_INCREMENT untuk tabel `simpanan_wajib`
--
ALTER TABLE `simpanan_wajib`
  MODIFY `id_simjib` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=335;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `jasa`
--
ALTER TABLE `jasa`
  ADD CONSTRAINT `jasa_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `anggota` (`id_anggota`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `piutang`
--
ALTER TABLE `piutang`
  ADD CONSTRAINT `piutang_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `anggota` (`id_anggota`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `saldo_jasa`
--
ALTER TABLE `saldo_jasa`
  ADD CONSTRAINT `saldo_jasa_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `anggota` (`id_anggota`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `saldo_piutang`
--
ALTER TABLE `saldo_piutang`
  ADD CONSTRAINT `saldo_piutang_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `anggota` (`id_anggota`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `saldo_sim_suk`
--
ALTER TABLE `saldo_sim_suk`
  ADD CONSTRAINT `saldo_sim_suk_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `anggota` (`id_anggota`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `saldo_sim_w`
--
ALTER TABLE `saldo_sim_w`
  ADD CONSTRAINT `saldo_sim_w_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `anggota` (`id_anggota`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `simpanan_pokok`
--
ALTER TABLE `simpanan_pokok`
  ADD CONSTRAINT `simpanan_pokok_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `anggota` (`id_anggota`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `simpanan_sukarela`
--
ALTER TABLE `simpanan_sukarela`
  ADD CONSTRAINT `simpanan_sukarela_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `anggota` (`id_anggota`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `simpanan_wajib`
--
ALTER TABLE `simpanan_wajib`
  ADD CONSTRAINT `simpanan_wajib_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `anggota` (`id_anggota`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
