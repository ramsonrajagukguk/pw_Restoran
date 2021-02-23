-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Bulan Mei 2019 pada 19.49
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uas_kasir`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id_menu` varchar(20) NOT NULL,
  `nama_menu` varchar(80) NOT NULL,
  `kategori` varchar(80) NOT NULL,
  `harga` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id_menu`, `nama_menu`, `kategori`, `harga`) VALUES
('MN001', 'Ice Tea', 'Minuman', 3000),
('MN002', 'Milk Tea', 'Minuman', 6000),
('MN003', 'Strawberry Milkshake', 'Minuman', 8000),
('MN004', 'Chocolate Milkshake', 'Minuman', 8000),
('MN005', 'Banana Milkshake', 'Minuman', 8000),
('MN006', 'Lemon Tea', 'Minuman', 5000),
('MN007', 'Orange Juice', 'Minuman', 7000),
('MN008', 'Tomato Juice', 'Minuman', 7000),
('MN009', 'Avocado Juice', 'Minuman', 7000),
('MN010', 'Guava Juice', 'Minuman', 7000),
('MN011', 'Orange Soda', 'Minuman', 7000),
('MN012', 'Caffe Latte', 'Minuman', 6000),
('MN013', 'Vanilla Latte', 'Minuman', 6000),
('MN014', 'Matcha Green Tea Latte', 'Minuman', 6000),
('MN015', 'Original Black  Coffe', 'Minuman', 5000),
('MN016', 'Coffe Milk', 'Minuman', 6000),
('MN017', 'Cappuccino', 'Minuman', 6000),
('MN018', 'Fresh Milk', 'Minuman', 8000),
('MN019', 'Pisang Goreng', 'Snack', 8000),
('MN020', 'Roti Bakar', 'Snack', 7000),
('MN021', 'Onion Ring', 'Snack', 7000),
('MN022', 'French Fries', 'Snack', 8000),
('MN023', 'Tahu Petis', 'Snack', 8000),
('MN024', 'Siomay', 'Makanan', 8000),
('MN025', 'Mie Goreng Indomie', 'Makanan', 5000),
('MN026', 'Mie Kuah Indomie', 'Makanan', 6000),
('MN027', 'Seblak Sosis', 'Makanan', 7000),
('MN028', 'Seblak Ceker Ayam', 'Makanan', 7000),
('MN029', 'Nasi Goreng Ayam', 'Makanan', 10000),
('MN030', 'Nasi Goreng Special', 'Makanan', 15000),
('MN031', 'Sate Taichan', 'Makanan', 11000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_detailpenjualan`
--

CREATE TABLE `tbl_detailpenjualan` (
  `kode_penjualan` varchar(15) NOT NULL,
  `kode_menu` varchar(15) NOT NULL,
  `jumlah_jual` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_penjualan`
--

CREATE TABLE `tbl_penjualan` (
  `kode_penjualan` varchar(15) NOT NULL,
  `kode_petugas` varchar(50) NOT NULL,
  `tgl_penjualan` date NOT NULL,
  `nama_pembeli` varchar(35) NOT NULL,
  `Total_penjualan` int(11) NOT NULL,
  `Bayar` int(11) NOT NULL,
  `Kembali` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `display_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`username`, `password`, `user_id`, `display_name`) VALUES
('admin', 'admin', 'adminmasuk', 'adminmasuk');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indeks untuk tabel `tbl_detailpenjualan`
--
ALTER TABLE `tbl_detailpenjualan`
  ADD PRIMARY KEY (`kode_penjualan`,`kode_menu`);

--
-- Indeks untuk tabel `tbl_penjualan`
--
ALTER TABLE `tbl_penjualan`
  ADD PRIMARY KEY (`kode_penjualan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
