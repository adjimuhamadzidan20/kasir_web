-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Des 2023 pada 15.19
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kasir_web`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(20) NOT NULL,
  `nama_admin` varchar(150) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `nama_admin`, `username`, `password`) VALUES
(1, 'Adji Muhamad Zidan', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(2, 'Admin Toko', 'admintoko', 'd4818174dc063ea1496f2196d85f8bb6');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_kategori`
--

CREATE TABLE `data_kategori` (
  `id_kategori` int(20) NOT NULL,
  `kode` varchar(50) NOT NULL,
  `kategori` varchar(120) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_kategori`
--

INSERT INTO `data_kategori` (`id_kategori`, `kode`, `kategori`, `created_at`, `updated_at`) VALUES
(1, 'KAT0', 'Makanan Ringan', '2023-11-16 02:23:40', '2023-12-23 10:02:22'),
(2, 'KAT0', 'Minuman Ringan', '2023-11-16 02:26:46', '2023-12-23 04:34:06'),
(3, 'KAT0', 'Peralatan Rumah', '2023-11-16 05:38:11', '2023-11-16 05:38:11'),
(4, 'KAT0', 'Sabun / Detergen ', '2023-11-18 14:32:04', '2023-11-18 14:32:04'),
(11, 'KAT0', 'Peralatan Tulis', '2023-12-23 10:02:45', '2023-12-23 10:02:45'),
(12, 'KAT0', 'Aksesoris', '2023-12-23 10:03:06', '2023-12-23 10:03:06'),
(13, 'KAT0', 'Elektronik', '2023-12-23 10:03:20', '2023-12-23 10:03:20'),
(14, 'KAT0', 'Peralatan Elektronik', '2023-12-23 10:03:43', '2023-12-23 10:03:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_produk`
--

CREATE TABLE `data_produk` (
  `id_produk` int(20) NOT NULL,
  `kode_produk` varchar(50) NOT NULL,
  `nama_produk` varchar(120) NOT NULL,
  `id_kategori` int(20) NOT NULL,
  `harga_satuan` int(50) NOT NULL,
  `jumlah_stok` int(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_produk`
--

INSERT INTO `data_produk` (`id_produk`, `kode_produk`, `nama_produk`, `id_kategori`, `harga_satuan`, `jumlah_stok`, `created_at`, `updated_at`) VALUES
(1, 'PR0', 'Tango', 1, 10000, 50, '2023-11-16 06:17:34', '2023-11-16 06:17:34'),
(2, 'PR0', 'Milo', 2, 10000, 40, '2023-11-16 06:32:52', '2023-11-16 06:32:52'),
(3, 'PR0', 'Rinso Cair', 4, 25000, 80, '2023-11-18 14:45:36', '2023-11-19 15:17:41'),
(4, 'PR0', 'Ultramilk Coklat', 2, 15000, 150, '2023-11-18 14:46:09', '2023-12-20 03:26:23'),
(59, 'PR0', 'Schoen Group', 2, 25000, 220, '1988-08-31 20:13:22', '2023-12-23 06:54:49'),
(60, 'PR0', 'Kuhlman-Kohler', 1, 25000, 220, '2005-10-27 09:38:09', '2023-12-23 06:54:50'),
(61, 'PR0', 'Haley, Haag and Hyatt', 3, 22000, 40, '1977-11-06 19:12:07', '2023-12-23 06:54:50'),
(62, 'PR0', 'Simonis-Sanford', 2, 12000, 40, '1978-12-12 20:51:04', '2023-12-23 06:54:50'),
(63, 'PR0', 'Rippin, Waters and Gislason', 1, 22000, 500, '2019-07-25 22:19:11', '2023-12-23 06:54:50'),
(64, 'PR0', 'Denesik-Kohler', 1, 15000, 150, '2009-09-21 00:29:11', '2023-12-23 06:54:50'),
(65, 'PR0', 'Hauck-Ryan', 3, 22000, 150, '2021-12-20 06:30:39', '2023-12-23 06:54:50'),
(66, 'PR0', 'Bartell LLC', 3, 25000, 500, '2019-02-20 03:40:18', '2023-12-23 06:54:50'),
(67, 'PR0', 'Schmidt, Schroeder and Ryan', 4, 10000, 180, '2008-06-24 22:27:02', '2023-12-23 06:54:50'),
(68, 'PR0', 'Quitzon Ltd', 1, 15000, 40, '2002-08-18 03:14:40', '2023-12-23 06:54:50'),
(69, 'PR0', 'Von, Nikolaus and O\'Connell', 1, 12000, 150, '2005-11-16 02:57:59', '2023-12-23 06:54:50'),
(70, 'PR0', 'Kutch and Sons', 3, 12000, 200, '2021-03-21 04:29:57', '2023-12-23 06:55:31'),
(71, 'PR0', 'McKenzie-Klein', 2, 15000, 200, '1992-05-06 02:41:11', '2023-12-23 06:55:32'),
(72, 'PR0', 'Skiles PLC', 1, 22000, 40, '2020-07-22 08:02:33', '2023-12-23 06:55:32'),
(73, 'PR0', 'Bednar and Sons', 2, 10000, 20, '2018-02-17 05:21:41', '2023-12-23 06:55:32'),
(74, 'PR0', 'Sawayn, Kulas and Franecki', 4, 15000, 40, '1993-08-22 08:51:22', '2023-12-23 06:55:32'),
(75, 'PR0', 'Rohan, Bechtelar and Gleason', 2, 22000, 150, '1997-02-05 22:14:24', '2023-12-23 06:55:32'),
(76, 'PR0', 'Weimann, Oberbrunner and Shanahan', 2, 22000, 220, '2016-09-06 18:53:37', '2023-12-23 06:55:32'),
(77, 'PR0', 'Wintheiser Ltd', 1, 12000, 150, '1981-03-24 02:26:08', '2023-12-23 06:55:32'),
(78, 'PR0', 'Ziemann Inc', 4, 22000, 40, '2011-06-25 21:43:43', '2023-12-23 06:55:32'),
(79, 'PR0', 'O\'Kon and Sons', 3, 12000, 40, '1994-02-06 04:16:11', '2023-12-23 06:55:32'),
(80, 'PR0', 'Jakubowski PLC', 4, 22000, 180, '2012-10-21 08:41:42', '2023-12-23 06:55:32'),
(81, 'PR0', 'Jenkins, Beer and Langworth', 3, 22000, 180, '1980-09-06 00:00:38', '2023-12-23 06:55:32'),
(82, 'PR0', 'Cronin-Schmidt', 1, 12000, 20, '1975-01-25 07:04:11', '2023-12-23 06:55:33'),
(83, 'PR0', 'Christiansen, Harber and Kassulke', 3, 25000, 200, '2019-10-06 15:21:56', '2023-12-23 06:55:33'),
(84, 'PR0', 'Klein, Schultz and Paucek', 2, 15000, 180, '2020-03-17 04:52:08', '2023-12-23 06:55:33'),
(85, 'PR0', 'Purdy, Bartell and McGlynn', 2, 15000, 220, '1983-12-31 12:15:23', '2023-12-23 06:55:33'),
(86, 'PR0', 'Morissette-Brakus', 4, 10000, 220, '1981-04-02 21:04:32', '2023-12-23 06:55:33'),
(87, 'PR0', 'Altenwerth-Kassulke', 3, 10000, 200, '2015-10-25 04:13:50', '2023-12-23 06:55:33'),
(88, 'PR0', 'Nolan Inc', 1, 25000, 20, '2023-10-14 19:30:44', '2023-12-23 06:55:33'),
(89, 'PR0', 'Feil-Metz', 2, 10000, 500, '1992-08-03 05:03:33', '2023-12-23 06:55:33'),
(90, 'PR0', 'Cole Inc', 3, 25000, 500, '1972-12-11 12:41:59', '2023-12-23 06:55:34'),
(91, 'PR0', 'DuBuque-Cummerata', 2, 12000, 20, '2023-02-16 20:26:43', '2023-12-23 06:55:34'),
(92, 'PR0', 'Hermiston-Corwin', 3, 22000, 200, '1976-06-09 20:16:22', '2023-12-23 06:55:34'),
(93, 'PR0', 'Bosco PLC', 3, 25000, 180, '2008-04-02 06:50:37', '2023-12-23 06:55:34'),
(94, 'PR0', 'Smitham, Ledner and Ritchie', 4, 12000, 500, '2018-07-14 05:41:24', '2023-12-23 06:55:34'),
(95, 'PR0', 'Kshlerin Group', 4, 10000, 220, '2006-07-15 19:56:34', '2023-12-23 06:55:34'),
(96, 'PR0', 'Welch Ltd', 4, 15000, 220, '1988-12-13 22:01:12', '2023-12-23 06:55:34'),
(97, 'PR0', 'Runte-Bosco', 4, 12000, 500, '1985-02-14 00:17:04', '2023-12-23 06:55:34'),
(98, 'PR0', 'Kris PLC', 2, 10000, 40, '1973-10-25 15:03:22', '2023-12-23 06:55:35'),
(99, 'PR0', 'Raynor LLC', 1, 10000, 220, '2018-04-12 03:38:57', '2023-12-23 06:55:35'),
(100, 'PR0', 'Funk-Lynch', 4, 25000, 500, '1987-04-27 17:59:04', '2023-12-23 06:55:35'),
(101, 'PR0', 'Schmeler-Reinger', 4, 22000, 20, '2021-02-21 21:57:07', '2023-12-23 06:55:35'),
(102, 'PR0', 'Russel, McClure and Herzog', 2, 12000, 500, '1997-09-04 22:52:03', '2023-12-23 06:55:35'),
(103, 'PR0', 'Balistreri, Torphy and Thiel', 3, 25000, 200, '2017-12-26 09:19:04', '2023-12-23 06:55:35'),
(104, 'PR0', 'Berge, Muller and Metz', 3, 12000, 500, '2013-03-28 20:04:21', '2023-12-23 06:55:35'),
(105, 'PR0', 'Lindgren-Kutch', 2, 15000, 500, '2016-07-10 03:24:19', '2023-12-23 06:55:35'),
(106, 'PR0', 'Heathcote-Bailey', 3, 10000, 200, '1997-03-06 20:04:53', '2023-12-23 06:55:35'),
(107, 'PR0', 'Ward-Jacobi', 4, 15000, 500, '2021-01-24 15:30:47', '2023-12-23 06:55:35'),
(108, 'PR0', 'Walsh Group', 4, 12000, 20, '1971-04-25 21:46:10', '2023-12-23 06:55:35'),
(109, 'PR0', 'Kris PLC', 4, 22000, 150, '2010-12-31 14:16:55', '2023-12-23 06:55:35'),
(110, 'PR0', 'Frami, Gorczany and Bahringer', 2, 12000, 40, '2009-01-08 09:22:02', '2023-12-23 06:55:35'),
(111, 'PR0', 'Senger, Mann and Padberg', 2, 12000, 150, '1975-03-05 00:52:16', '2023-12-23 06:55:35'),
(112, 'PR0', 'Mueller-Homenick', 4, 22000, 220, '1975-10-26 19:33:51', '2023-12-23 06:55:36'),
(113, 'PR0', 'Kris Inc', 1, 25000, 500, '1991-10-21 21:37:52', '2023-12-23 06:55:36'),
(114, 'PR0', 'Rowe, Denesik and Boyle', 3, 22000, 40, '2015-05-26 21:57:54', '2023-12-23 06:55:36'),
(115, 'PR0', 'Conroy, Mraz and Hickle', 3, 15000, 180, '1984-05-18 08:36:53', '2023-12-23 06:55:36'),
(116, 'PR0', 'Herzog Group', 4, 12000, 40, '1971-05-04 23:01:38', '2023-12-23 06:55:36'),
(117, 'PR0', 'Gibson, Hilpert and Bergstrom', 1, 22000, 180, '1972-10-25 19:29:51', '2023-12-23 06:55:36'),
(118, 'PR0', 'Hintz, Schultz and Bradtke', 3, 15000, 220, '1981-01-28 11:46:13', '2023-12-23 06:55:36'),
(119, 'PR0', 'Prohaska, Boyer and Heathcote', 1, 22000, 500, '1975-09-14 17:08:00', '2023-12-23 06:55:36'),
(120, 'PR0', 'Schamberger-Thompson', 2, 15000, 500, '1998-08-04 09:01:28', '2023-12-23 06:55:36'),
(121, 'PR0', 'Pulpen Joyko 1 packs', 11, 15000, 100, '2023-12-23 10:05:13', '2023-12-23 10:05:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemasukan`
--

CREATE TABLE `pemasukan` (
  `id_pemasukan` int(50) NOT NULL,
  `tanggal_pemasukan` datetime NOT NULL,
  `bulan_pemasukan` varchar(100) NOT NULL,
  `jumlah_nominal` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pemasukan`
--

INSERT INTO `pemasukan` (`id_pemasukan`, `tanggal_pemasukan`, `bulan_pemasukan`, `jumlah_nominal`) VALUES
(2, '2023-11-29 10:39:14', 'Nov', 12000),
(3, '2023-11-29 10:41:08', 'Nov', 52000),
(4, '2023-11-29 11:09:57', 'Nov', 45000),
(5, '2023-12-01 10:14:11', 'Dec', 200000),
(6, '2023-12-01 10:14:55', 'Dec', 20000),
(7, '2023-12-02 04:52:43', 'Dec', 125000),
(8, '2023-12-09 08:15:25', 'Dec', 45000),
(9, '2023-12-20 03:13:46', 'Dec', 150000),
(10, '2023-12-23 02:39:54', 'Dec', 260000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(20) NOT NULL,
  `id_produk` int(20) NOT NULL,
  `harga` int(100) NOT NULL,
  `qty` int(100) NOT NULL,
  `total` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_kategori`
--
ALTER TABLE `data_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `data_produk`
--
ALTER TABLE `data_produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indeks untuk tabel `pemasukan`
--
ALTER TABLE `pemasukan`
  ADD PRIMARY KEY (`id_pemasukan`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_produk` (`id_produk`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `data_kategori`
--
ALTER TABLE `data_kategori`
  MODIFY `id_kategori` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `data_produk`
--
ALTER TABLE `data_produk`
  MODIFY `id_produk` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT untuk tabel `pemasukan`
--
ALTER TABLE `pemasukan`
  MODIFY `id_pemasukan` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(20) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `data_produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
