-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Jul 2021 pada 17.58
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sewa_buku`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_buku`
--

CREATE TABLE `data_buku` (
  `id` int(11) NOT NULL,
  `kode_buku` varchar(30) CHARACTER SET latin1 NOT NULL,
  `judul_buku` varchar(100) NOT NULL,
  `kode_pengarang` varchar(100) CHARACTER SET latin1 NOT NULL,
  `kode_jenis_buku` varchar(30) CHARACTER SET latin1 NOT NULL,
  `kode_penerbit` varchar(30) CHARACTER SET latin1 NOT NULL,
  `isbn` varchar(30) CHARACTER SET latin1 NOT NULL,
  `tahun` year(4) NOT NULL,
  `deskripsi` varchar(100) CHARACTER SET latin1 NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_buku`
--

INSERT INTO `data_buku` (`id`, `kode_buku`, `judul_buku`, `kode_pengarang`, `kode_jenis_buku`, `kode_penerbit`, `isbn`, `tahun`, `deskripsi`, `jumlah`) VALUES
(4, 'B10003', 'A History of Modern Indonesia ', 'PG10006', 'A10002', 'P10001', '10239938 ', 2014, 'Buku Sejarah', 9),
(5, 'B10002', 'Pemrograman Web Dinamis dengan PHP', 'PG10001', 'A10001', 'P10003', '19292883', 2018, 'Buku Pemrograman Web', 18),
(6, 'B10001', 'Negeri Para Bedebah', 'PG10004', 'A10003', 'P10004', '1029901992', 2019, 'Buku Fiksi', 18),
(7, 'B10004', 'Milea : Suara dari Dilan', 'PG10002', 'A10003', 'P10004', '10239938', 2016, 'Buku Fiksi', 10),
(8, 'B10005', 'This Earth of Mankind', 'PG10005', 'A10003', 'P10006', '0140256350', 2010, 'Buku Sejarah Fiksi', 4),
(10, 'B10006', 'About You', 'PG10004', 'A10003', 'P10004', '8219478192', 2016, 'Buku Fiksi', 5),
(11, 'B10007', 'Insecurity', 'PG10002', 'A10004', 'P10002', '140256350', 2012, 'Cintailah diri sendiri', 21);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_jenis_buku`
--

CREATE TABLE `data_jenis_buku` (
  `id` int(11) NOT NULL,
  `kode_jenis_buku` varchar(30) NOT NULL,
  `nama_jenis_buku` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_jenis_buku`
--

INSERT INTO `data_jenis_buku` (`id`, `kode_jenis_buku`, `nama_jenis_buku`) VALUES
(1, 'A10001', 'Komputer'),
(2, 'A10002', 'Sejarah'),
(3, 'A10003', 'Hiburan'),
(4, 'A10004', 'Ensiklopedia'),
(5, 'A10005', 'Kuliner'),
(8, 'A10006', 'Kesehatan'),
(9, 'A10008', 'Parody'),
(10, 'A10011', 'Thriller');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_peminjam`
--

CREATE TABLE `data_peminjam` (
  `id` int(11) NOT NULL,
  `kode_peminjam` varchar(20) CHARACTER SET latin1 NOT NULL,
  `nama_peminjam` varchar(100) CHARACTER SET latin1 NOT NULL,
  `jenis_kelamin` enum('P','L') CHARACTER SET latin1 NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(100) CHARACTER SET latin1 NOT NULL,
  `pekerjaan` varchar(100) CHARACTER SET latin1 NOT NULL,
  `user_id` int(11) NOT NULL,
  `foto` varchar(100) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_peminjam`
--

INSERT INTO `data_peminjam` (`id`, `kode_peminjam`, `nama_peminjam`, `jenis_kelamin`, `tanggal_lahir`, `alamat`, `pekerjaan`, `user_id`, `foto`) VALUES
(1, 'KHVTS', 'Kai Havertz', 'L', '2000-01-01', 'KHVTS', 'KHVTS', 0, 'foto_peminjam/lani.jpg'),
(2, 'NODATA', 'NODATA', 'L', '2000-01-01', 'NODATA', 'NODATA', 0, 'foto_peminjam/dababy.jpg'),
(3, 'NIBROS', 'NIBROS', 'L', '2000-01-01', 'NIBROS', 'NIBROS', 0, 'foto_peminjam/ketua kelas.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_penerbit`
--

CREATE TABLE `data_penerbit` (
  `id` int(11) NOT NULL,
  `kode_penerbit` varchar(30) NOT NULL,
  `nama_penerbit` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_penerbit`
--

INSERT INTO `data_penerbit` (`id`, `kode_penerbit`, `nama_penerbit`) VALUES
(1, 'P10001', 'Lokomedia'),
(2, 'P10003', 'Penerbit Andi'),
(3, 'P10002', 'Erlangga'),
(4, 'P10004', 'Gagas Media'),
(5, 'P10005', 'Penerbit Informatika'),
(6, 'P10006', 'Hasta Mitra'),
(7, 'P10007', 'Gramedia Widiasarana Indonesia'),
(8, 'P10008', 'Willy co.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_pengarang`
--

CREATE TABLE `data_pengarang` (
  `id` int(11) NOT NULL,
  `kode_pengarang` varchar(30) NOT NULL,
  `nama_pengarang` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_pengarang`
--

INSERT INTO `data_pengarang` (`id`, `kode_pengarang`, `nama_pengarang`) VALUES
(1, 'PG10001', 'Abdul Kadir'),
(2, 'PG10002', 'Pidi Baiq'),
(3, 'PG10003', 'Suyanto'),
(4, 'PG10004', 'Tere Liye'),
(5, 'PG10005', 'Pramoedya Ananta Noer'),
(7, 'PG10006', 'Adrian Vickres'),
(9, 'PG10007', 'Hajime Isayama'),
(10, 'PG10008', 'Mark Mason'),
(11, 'PG10009', 'Timo Werner');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_kelamin`
--

CREATE TABLE `jenis_kelamin` (
  `id` int(11) NOT NULL,
  `kode_jk` varchar(5) CHARACTER SET latin1 NOT NULL,
  `keterangan_jk` varchar(20) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jenis_kelamin`
--

INSERT INTO `jenis_kelamin` (`id`, `kode_jk`, `keterangan_jk`) VALUES
(1, 'P', 'Perempuan'),
(2, 'L', 'Laki-laki');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id` int(11) NOT NULL,
  `kode_buku` varchar(30) NOT NULL,
  `kode_peminjam` varchar(30) NOT NULL,
  `tanggal_pinjam` datetime NOT NULL,
  `tanggal_kembali` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `peminjaman`
--

INSERT INTO `peminjaman` (`id`, `kode_buku`, `kode_peminjam`, `tanggal_pinjam`, `tanggal_kembali`, `status`) VALUES
(1, 'B10007', 'KHVTS', '2021-07-24 00:00:00', '2021-07-31 00:00:00', 1),
(2, 'B10006', 'KHVTS', '2021-07-24 00:00:00', '2021-07-31 00:00:00', 1),
(3, 'B10002', 'NIBROS', '2021-07-24 00:00:00', '2021-07-31 00:00:00', 1),
(4, 'B10005', 'KHVTS', '2021-07-24 00:00:00', '2021-07-31 00:00:00', 1),
(5, 'B10006', 'KHVTS', '2021-07-24 00:00:00', '2021-07-31 00:00:00', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `akses_id` int(11) NOT NULL,
  `data_peminjam_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `akses_id`, `data_peminjam_id`) VALUES
(1, 'admin', 'admin123', 1, 0),
(2, 'KHVTS', 'KHVTS', 2, 1),
(3, 'NODATA', 'NODATA', 2, 2),
(4, 'NIBROS', 'NIBROS', 2, 3);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_buku`
--
ALTER TABLE `data_buku`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_buku` (`kode_buku`),
  ADD KEY `kode_buku_2` (`kode_buku`);

--
-- Indeks untuk tabel `data_jenis_buku`
--
ALTER TABLE `data_jenis_buku`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_jenis_buku` (`kode_jenis_buku`);

--
-- Indeks untuk tabel `data_peminjam`
--
ALTER TABLE `data_peminjam`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_penerbit`
--
ALTER TABLE `data_penerbit`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`,`kode_penerbit`);

--
-- Indeks untuk tabel `data_pengarang`
--
ALTER TABLE `data_pengarang`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_pengarang` (`kode_pengarang`);

--
-- Indeks untuk tabel `jenis_kelamin`
--
ALTER TABLE `jenis_kelamin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_buku`
--
ALTER TABLE `data_buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `data_jenis_buku`
--
ALTER TABLE `data_jenis_buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `data_peminjam`
--
ALTER TABLE `data_peminjam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `data_penerbit`
--
ALTER TABLE `data_penerbit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `data_pengarang`
--
ALTER TABLE `data_pengarang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `jenis_kelamin`
--
ALTER TABLE `jenis_kelamin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
