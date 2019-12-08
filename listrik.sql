-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Des 2019 pada 15.10
-- Versi server: 10.1.32-MariaDB
-- Versi PHP: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `listrik`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` int(11) NOT NULL,
  `nama` varchar(125) NOT NULL,
  `alamat` varchar(125) NOT NULL,
  `kode` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kode`) VALUES
(1, 'febri', 'rembang, lasem babagan', 'TR001'),
(2, 'anto', 'Reambang, Lasem Babagan', 'TR001'),
(3, 'febrian', 'Reambang, Sluke Sluke', 'TR004'),
(4, 'Eskan', 'Reambang, Sluke Babagan', 'TR004'),
(5, 'yty', 'Reambang, Lasem Babagan', 'TR003'),
(6, 'fauzi', 'Reambang, Lasem Babagan', 'TR001'),
(7, 'sulastri', 'Reambang, Lasem Babagan', 'TR002'),
(8, 'anto', 'Reambang, Sluke Sluke', 'TR003');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(11) NOT NULL,
  `tanggal_bayar` date NOT NULL,
  `id_tagihan` int(11) NOT NULL,
  `jumlah_tagihan` varchar(258) NOT NULL,
  `biaya_denda` varchar(258) NOT NULL,
  `biaya_admin` varchar(258) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `tanggal_bayar`, `id_tagihan`, `jumlah_tagihan`, `biaya_denda`, `biaya_admin`, `status`) VALUES
(5, '2019-11-23', 2, '16000', '1', '15', 'sudah  di bayar'),
(6, '2019-11-23', 1, '16', '1', '15', 'sudah  di bayar'),
(8, '2019-11-23', 6, '16.000', '1.000', '15.000', 'sudah  di bayar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tagihan`
--

CREATE TABLE `tagihan` (
  `id` int(11) NOT NULL,
  `tahun_tagih` int(11) NOT NULL,
  `bulan_tagih` varchar(50) NOT NULL,
  `pemakaian` varchar(125) NOT NULL,
  `status` varchar(50) NOT NULL,
  `id_pelanggan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tagihan`
--

INSERT INTO `tagihan` (`id`, `tahun_tagih`, `bulan_tagih`, `pemakaian`, `status`, `id_pelanggan`) VALUES
(1, 2019, 'Nov', '1500', 'sudah  di bayar', 1),
(2, 2019, 'NOV', '1500', 'sudah  di bayar', 2),
(3, 2019, 'Nov', '20000', 'belum bayar', 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tarif`
--

CREATE TABLE `tarif` (
  `id` int(11) NOT NULL,
  `kode` varchar(125) NOT NULL,
  `daya` varchar(125) NOT NULL,
  `tarif_perkwh` int(11) NOT NULL,
  `beban` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tarif`
--

INSERT INTO `tarif` (`id`, `kode`, `daya`, `tarif_perkwh`, `beban`) VALUES
(1, 'TR001', '1500', 2000, 1000),
(2, 'TR002', '1500', 2000, 1000),
(3, 'TR003', '1500', 2000, 1000),
(4, 'TR004', '1500', 2000, 1000),
(5, 'TR005', '1500', 5000, 1000),
(6, 'TR006', '1500', 7000, 1000);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tagihan`
--
ALTER TABLE `tagihan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tarif`
--
ALTER TABLE `tarif`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tagihan`
--
ALTER TABLE `tagihan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tarif`
--
ALTER TABLE `tarif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
