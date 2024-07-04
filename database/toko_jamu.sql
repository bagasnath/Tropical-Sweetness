-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Jul 2020 pada 00.45
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko_jamu`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_admin`
--

CREATE TABLE `tabel_admin` (
  `idAdmin` varchar(11) NOT NULL,
  `namaAdmin` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tabel_admin`
--

INSERT INTO `tabel_admin` (`idAdmin`, `namaAdmin`, `email`, `password`) VALUES
('1', 'admin', 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_produk`
--

CREATE TABLE `tabel_produk` (
  `idProduk` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `gambar` text NOT NULL,
  `keterangan` text NOT NULL,
  `harga` int(11) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tabel_produk`
--

INSERT INTO `tabel_produk` (`idProduk`, `nama`, `gambar`, `keterangan`, `harga`, `stock`) VALUES
(32, 'Beras Kencur', '12ef56156ecbb719ec352f0c802b5052', '500 ml', 20000, 12),
(34, 'Pahitan', '969946e719d89dacd0ad75c06af36a9a', '500 ml', 25000, 7),
(35, 'Sinom', 'ace99807b5bfd7083105afa7fbc5b899', '500 ml', 20000, 12),
(36, 'Sirih', 'e151adc513a4814c7663b3551dbdf5dc', '500 ml', 20000, 5),
(37, 'Temulawak', 'c9c79243a04588dbe51373830d013a62', '500 ml', 17000, 12);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_transaksi`
--

CREATE TABLE `tabel_transaksi` (
  `idTransaksi` int(11) NOT NULL,
  `idUser` varchar(11) NOT NULL,
  `daftarBarang` text NOT NULL,
  `tanggal` date NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tabel_transaksi`
--

INSERT INTO `tabel_transaksi` (`idTransaksi`, `idUser`, `daftarBarang`, `tanggal`, `total`) VALUES
(144, '5', 'Sinom, Jumlah : 5 <br> Sinom, Jumlah : 4 <br> ', '2020-07-11', 0),
(145, '5', '', '2020-07-11', 0),
(146, '5', 'Sinom, Jumlah : 3 <br> ', '2020-07-11', 0),
(147, '5', '', '2020-07-11', 0),
(148, '5', 'Sirih, Jumlah : 5 <br> ', '2020-07-11', 0),
(149, '5', 'Sirih, Jumlah : 1 <br> ', '0000-00-00', 0),
(150, '5', 'Pahitan, Jumlah : 25000 <br> ', '0000-00-00', 25000),
(151, '5', 'Beras Kencur, Jumlah : 20000 <br> ', '0000-00-00', 20000),
(152, '5', 'Pahitan, Jumlah : 1 <br> ', '0000-00-00', 25000),
(153, '5', 'Pahitan, Jumlah : 1 <br> ', '0000-00-00', 25000),
(154, '5', '', '0000-00-00', 0),
(155, '5', 'Pahitan, Jumlah : 5 <br> ', '0000-00-00', 125000),
(156, '5', 'Pahitan, Jumlah : 1 <br> ', '0000-00-00', 25000),
(157, '5', 'Pahitan, Jumlah : 1 <br> ', '0000-00-00', 25000),
(158, '5', '', '0000-00-00', 0),
(159, '5', 'Pahitan, Jumlah : 1 <br> ', '0000-00-00', 25000),
(160, '5', '', '2020-07-12', 0),
(161, '5', 'Pahitan, Jumlah : 1 <br> ', '2020-07-12', 25000),
(162, '5', '', '2020-07-12', 0),
(163, '5', '', '2020-07-12', 0),
(164, '5', '', '2020-07-12', 0),
(165, '5', '', '2020-07-12', 0),
(166, '5', '', '2020-07-12', 0),
(167, '5', 'Pahitan, Jumlah : 1 <br> ', '2020-07-12', 25000),
(168, '5', '', '2020-07-12', 0),
(169, '5', '', '2020-07-12', 0),
(170, '5', '', '2020-07-12', 0),
(171, '5', 'Pahitan, Jumlah : 1 <br> ', '2020-07-12', 25000),
(172, '5', '', '2020-07-12', 0),
(173, '5', '', '2020-07-12', 0),
(174, '5', '', '2020-07-12', 0),
(175, '5', '', '2020-07-12', 0),
(176, '5', '', '2020-07-12', 0),
(177, '5', '', '2020-07-12', 0),
(178, '5', '', '2020-07-12', 0),
(179, '5', 'Pahitan, Jumlah : 1 <br> ', '2020-07-12', 25000),
(180, '5', '', '2020-07-12', 0),
(181, '5', 'Pahitan, Jumlah : 1 <br> ', '2020-07-12', 25000),
(182, '5', '', '2020-07-12', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_trolly`
--

CREATE TABLE `tabel_trolly` (
  `idTrolly` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `idProduk` int(11) NOT NULL,
  `jumlah` int(12) NOT NULL,
  `harga` int(11) NOT NULL,
  `total` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_user`
--

CREATE TABLE `tabel_user` (
  `idUser` int(11) NOT NULL,
  `namaUser` varchar(50) NOT NULL,
  `email` varchar(70) NOT NULL,
  `password` varchar(40) NOT NULL,
  `alamat` text NOT NULL,
  `telpon` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tabel_user`
--

INSERT INTO `tabel_user` (`idUser`, `namaUser`, `email`, `password`, `alamat`, `telpon`) VALUES
(5, 'user', 'user@user.com', 'ee11cbb19052e40b07aac0ca060c23ee', 'Malang', '0897666555');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tabel_admin`
--
ALTER TABLE `tabel_admin`
  ADD PRIMARY KEY (`idAdmin`);

--
-- Indeks untuk tabel `tabel_produk`
--
ALTER TABLE `tabel_produk`
  ADD PRIMARY KEY (`idProduk`);

--
-- Indeks untuk tabel `tabel_transaksi`
--
ALTER TABLE `tabel_transaksi`
  ADD PRIMARY KEY (`idTransaksi`);

--
-- Indeks untuk tabel `tabel_trolly`
--
ALTER TABLE `tabel_trolly`
  ADD PRIMARY KEY (`idTrolly`);

--
-- Indeks untuk tabel `tabel_user`
--
ALTER TABLE `tabel_user`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tabel_produk`
--
ALTER TABLE `tabel_produk`
  MODIFY `idProduk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `tabel_transaksi`
--
ALTER TABLE `tabel_transaksi`
  MODIFY `idTransaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=183;

--
-- AUTO_INCREMENT untuk tabel `tabel_trolly`
--
ALTER TABLE `tabel_trolly`
  MODIFY `idTrolly` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=204;

--
-- AUTO_INCREMENT untuk tabel `tabel_user`
--
ALTER TABLE `tabel_user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
