-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2024 at 07:22 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `selaras`
--

-- --------------------------------------------------------

--
-- Table structure for table `custom`
--

CREATE TABLE `custom` (
  `id_custom` int(11) NOT NULL,
  `id_kain` int(11) NOT NULL,
  `id_transaksi` varchar(20) NOT NULL,
  `pjng_baju` varchar(10) NOT NULL,
  `pjng_lengan` varchar(10) NOT NULL,
  `bahu` varchar(10) NOT NULL,
  `pundak` varchar(10) NOT NULL,
  `pinggang` varchar(5) NOT NULL,
  `gambar_model` varchar(125) NOT NULL,
  `qty_custom` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `custom`
--

INSERT INTO `custom` (`id_custom`, `id_kain`, `id_transaksi`, `pjng_baju`, `pjng_lengan`, `bahu`, `pundak`, `pinggang`, `gambar_model`, `qty_custom`) VALUES
(2, 3, '20241017UGESTPAK', '12', '12', '12', '12', '12', 'baju_belakang2.png', 1),
(3, 3, '20241017QYYEMZUJ', '15', '15', '15', '15', '15', 'baju_depan21.png', 15);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id_customer` int(11) NOT NULL,
  `nama_customer` varchar(50) NOT NULL,
  `alamat_customer` varchar(50) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id_customer`, `nama_customer`, `alamat_customer`, `no_hp`, `username`, `password`, `create_time`) VALUES
(11, 'azzam', 'cigugur', '082115649049', 'azzam', 'azzam', '2024-10-07 12:04:54'),
(12, 'agung', 'kadugede', '082115649047', 'agung', 'agung', '2024-10-07 12:36:32'),
(13, 'angga', 'cijoho', '082115649041', 'angga', 'angga', '2024-10-07 12:56:12'),
(14, 'fauzi', 'cisantana', '082115649042', 'fauzi', 'fauzi', '2024-10-07 14:12:34'),
(15, 'dini', 'cigugur', '082115649046', 'dini', 'dini', '2024-10-08 00:29:46'),
(18, 'Lala', 'cigugur', '082321319009', 'lala', 'lala', '2024-10-14 12:27:28'),
(19, 'suci', 'cisantana', '082115649040', 'suci', 'suci', '2024-10-14 12:50:36'),
(20, 'alif', 'cigugur', '082321319000', 'alif', 'alif', '2024-10-17 02:48:18'),
(21, 'ripal', 'cigugur', '082115649054', 'ripal', 'ripal', '2024-10-17 03:45:00'),
(22, 'ares', 'cigugur', '082115649052', 'ares', 'ares', '2024-10-17 03:49:48');

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id_detail` int(11) NOT NULL,
  `id_transaksi` varchar(20) NOT NULL,
  `id_size` int(11) NOT NULL,
  `qty` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id_detail`, `id_transaksi`, `id_size`, `qty`) VALUES
(18, '20241007XMDGIJOC', 74, '1'),
(19, '20241007MUFFHUSR', 62, '1'),
(20, '20241007ITH0WFJZ', 64, '1'),
(21, '202410071VU4Y5G0', 61, '1'),
(22, '202410079HKHE3F2', 68, '1'),
(24, '20241008YZIRDN2T', 69, '1'),
(25, '202410145APHL8GW', 68, '1'),
(26, '20241014RUW3FDRJ', 69, '1'),
(27, '20241014PLNDHBQ1', 69, '1'),
(28, '20241014GYK6PLUV', 68, '1'),
(29, '20241017DOV6IWZX', 67, '1'),
(30, '20241017DOV6IWZX', 62, '1'),
(31, '20241017WLKSKCVI', 67, '1'),
(32, '20241017DK6YSMNO', 62, '1'),
(33, '20241017V4LEMC2U', 62, '1');

-- --------------------------------------------------------

--
-- Table structure for table `diskon`
--

CREATE TABLE `diskon` (
  `id_diskon` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `nama_diskon` varchar(50) NOT NULL,
  `besar_diskon` int(11) NOT NULL,
  `tgl_selesai` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `diskon`
--

INSERT INTO `diskon` (`id_diskon`, `id_produk`, `nama_diskon`, `besar_diskon`, `tgl_selesai`) VALUES
(35, 38, '0', 0, '0'),
(36, 39, '0', 0, '0'),
(37, 40, '0', 0, '0'),
(38, 41, '0', 0, '0'),
(39, 42, 'jas', 10, '2024-10-27'),
(40, 43, '0', 0, '0'),
(41, 44, 'gaun', 10, '2024-10-17');

-- --------------------------------------------------------

--
-- Table structure for table `kain`
--

CREATE TABLE `kain` (
  `id_kain` int(11) NOT NULL,
  `nama_kain` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kain`
--

INSERT INTO `kain` (`id_kain`, `nama_kain`) VALUES
(3, 'Katun'),
(4, 'Linen'),
(5, 'Denim'),
(6, 'Organza'),
(7, 'Spandeks'),
(8, 'Sifon');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(2, 'Celana'),
(3, 'Baju'),
(4, 'Jas'),
(5, 'Dress');

-- --------------------------------------------------------

--
-- Table structure for table `pengembalian`
--

CREATE TABLE `pengembalian` (
  `id_return` int(11) NOT NULL,
  `id_transaksi` varchar(30) NOT NULL,
  `tgl_return` varchar(15) NOT NULL,
  `alasan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengembalian`
--

INSERT INTO `pengembalian` (`id_return`, `id_transaksi`, `tgl_return`, `alasan`) VALUES
(1, '20220529EVYBRXJU', '2022-06-17', 'salah warna');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(125) NOT NULL,
  `berat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `id_kategori`, `nama_produk`, `deskripsi`, `gambar`, `berat`) VALUES
(38, 4, 'Jas Vest Motif Kotak Warna Abu-abu', '<div>-Jas Formal bermotif kotak kotak tipis dengan warna abu-abu menimbulkan kesan yang formal dan sangat stylish untuk kerja kantoran, ke kondangan maupun untuk acara wedding.</div>\r\n<div>- Bahan : Semi Wool (berkualitas) dengan furing di bagian dalam, sehingga lebih tebal dan nyaman di gunakan</div>\r\n<div>- Sizing : SLIM FIT</div>\r\n<div>- Model 2 kancing bagian depan</div>\r\n<div>- 1 kantong di bagian bawah</div>\r\n<div>- 1 kantong di bagian dalam dada</div>\r\n<div>- Setiap pembelian mendapatkan&nbsp;</div>\r\n<div>Note :</div>\r\n<div>- Produk yang kami foto adalah asli produk kami, sehingga kami sudah usahakan agar warna, bentuk produk terlihat jelas. toleransi perbedaan warna disebabkan kamera, layar hape, cahaya 3 - 6%.</div>', 'Jas_Celana_Vest_Rompi_Motif_Kotak2.jpg', 360),
(39, 4, 'Jas Bellmore-T1 Warna Biru Gelap', '<div>-Jas Formal bermotif kotak kotak tipis dengan warna abu-abu menimbulkan kesan yang formal dan sangat stylish untuk kerja kantoran, ke kondangan maupun untuk acara wedding.</div>\r\n<div>- Bahan : Semi Wool (premium) dengan furing di bagian dalam, sehingga lebih tebal dan nyaman di gunakan</div>\r\n<div>- Sizing : SLIM FIT</div>\r\n<div>- Model 1 kancing bagian depan</div>\r\n<div>- 2 kantong di bagian bawah</div>\r\n<div>- 1 kantong di bagian dalam dada</div>\r\n<div>- Setiap pembelian mendapatkan&nbsp;</div>\r\n<div>Note :</div>\r\n<div>- Produk yang kami foto adalah asli produk kami, sehingga kami sudah usahakan agar warna, bentuk produk terlihat jelas. toleransi perbedaan warna disebabkan kamera, layar hape, cahaya 3 - 6%.</div>', 'Jas_Bellmore-T1_Dark_Blue2.jpg', 600),
(40, 4, 'Jas Suit Blazer Hitam', '<div>- Bahan : Semi Wool (berkualitas) dengan furing di bagian dalam, sehingga lebih tebal dan nyaman di gunakan</div>\r\n<div>- Sizing : SLIM FIT</div>\r\n<div>- Model 2 kancing bagian depan</div>\r\n<div>- 1 kantong bagian dada sebelah</div>\r\n<div>- 2 kantong di bagian bawah</div>\r\n<div>- 1 kantong di bagian dalam dada</div>\r\n<div>- Setiap pembelian mendapatkan cover jas berwarna hitam, agar anda dapat menyimpan jas dengan baik dan tidak kotor</div>\r\n<div>Note :</div>\r\n<div>- Produk yang kami foto adalah asli produk kami, sehingga kami sudah usahakan agar warna, bentuk produk terlihat jelas. toleransi perbedaan warna disebabkan kamera, layar hape, cahaya 3 - 6%.</div>', 'Jas_Suit_Blazer_Houseofcuf2.jpg', 360),
(41, 5, 'Gaun Wanita Warna Hijau Motif Bunga', '<p>Gaun wanita motif bunga&nbsp;</p>\r\n<p>-Warna Hijau</p>\r\n<p>-Motif bunga warna Kuning Putih</p>\r\n<p>BAHAN : SIFON<br />ADEM DAN NYAMAN<br />*ADA FURING/LINING<br />*PINGGANG KARET<br /><br />UKURAN :<br />-BUST/LD : 108cm<br />-PANJANG : 128cm</p>', 'gaun_wanita_motif_bunga_hijau3.jpg', 260),
(42, 5, 'Gaun Wanita Model Korea Cream', '<p>Gaun wanita kekinian gaya korea&nbsp;</p>\r\n<p>-Warna Cream</p>\r\n<p>-Size fit to L</p>\r\n<p>BAHAN : SIFON<br />ADEM DAN NYAMAN<br />*ADA FURING/LINING<br />*PINGGANG KARET</p>\r\n<p>Deskripsi DRESS UK L :<br />LD ( Lebar Dada ) &plusmn; 106cm<br />PJ Baju &plusmn; 140 cm</p>\r\n<p><br />Deskripsi DRESS UK XL<br />LD ( Lebar Dada ) &plusmn; 110 cm<br />PJ Baju &plusmn; 140</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>', 'gaun_wanita_modern_gaya_korea3.jpg', 260),
(43, 2, 'Celana Pria Bahan Slim Fit Hitam', '<p>DESKRIPSI PRODUK:</p>\r\n<p>Bahan nyaman dan adem saat digunakan</p>\r\n<p>cocok digunakan untuk bekerja, ataupun acara</p>\r\n<p>- Slim Fit<br />- Bahan semi wool<br />- Model Celana Panjang diatas mata kaki<br />- Ada kantong samping dan belakang kanan kiri</p>', 'celana_bahan_wol_pria2.jpg', 260),
(44, 2, 'Celana Pria Formal Lentur SlimFit Abu', '<p>DESKRIPSI PRODUK :<br />- Slim Fit<br />- Bahan semi wool<br />- Model Celana Panjang diatas mata kaki<br />- Ada kantong samping dan belakang kanan kiri</p>\r\n<p>-Kemiripan warna 95% dengan foto disebabkan oleh lighting saat pengambilan foto produk dan kecerahan pada ponsel masing-masing<br />-Hati-hati dalam pemilihan size karena kita tidak dapat menerima retur akibat kesalahan dalam pemilihan size<br />-Tulis warna dan size cadangan pada catatan (mengantisipasi jika warna dan size sold out)</p>', 'celana_formal_lentur_slimfit1.jpg', 260);

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE `size` (
  `id_size` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `size` varchar(50) NOT NULL,
  `stok` varchar(15) NOT NULL,
  `harga` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`id_size`, `id_produk`, `size`, `stok`, `harga`) VALUES
(60, 38, 'M', '20', '230000'),
(61, 38, 'L', '19', '260000'),
(62, 38, 'XL', '16', '285000'),
(63, 39, 'L', '20', '965000'),
(64, 39, 'XL', '18', '1000000'),
(65, 40, 'M', '20', '230000'),
(66, 40, 'L', '20', '250000'),
(67, 40, 'XL', '17', '265000'),
(68, 41, 'L', '26', '169000'),
(69, 42, 'L', '27', '199000'),
(70, 42, 'XL', '30', '219000'),
(71, 43, '39', '19', '170000'),
(72, 43, '40', '19', '200000'),
(73, 44, '39', '18', '150000'),
(74, 44, '40', '19', '170000');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` varchar(20) NOT NULL,
  `id_customer` int(11) DEFAULT NULL,
  `tgl_transaksi` varchar(11) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `provinsi` varchar(50) DEFAULT NULL,
  `kota` varchar(50) DEFAULT NULL,
  `ekspedisi` varchar(50) DEFAULT NULL,
  `estimasi` varchar(50) DEFAULT NULL,
  `ongkir` varchar(15) DEFAULT NULL,
  `status_order` int(11) DEFAULT NULL,
  `status_pesan` int(11) DEFAULT NULL,
  `update_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `total_bayar` varchar(50) DEFAULT NULL,
  `bukti_pembayaran` text DEFAULT NULL,
  `type_transaksi` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_customer`, `tgl_transaksi`, `alamat`, `provinsi`, `kota`, `ekspedisi`, `estimasi`, `ongkir`, `status_order`, `status_pesan`, `update_at`, `total_bayar`, `bukti_pembayaran`, `type_transaksi`) VALUES
('202410071VU4Y5G0', 13, '2024-10-07', 'cijoho', 'Jawa Barat', 'Kuningan', 'tiki', 'SDS', '14000', 4, 2, '2024-10-07 12:59:56', '274000', 'bukti_bayar_brimo3.jpg', 1),
('202410079HKHE3F2', 14, '2024-10-07', 'cisantana', 'Jawa Barat', 'Kuningan', 'pos', 'SDS', '14000', 4, 2, '2024-10-07 14:13:28', '183000', 'bukti_bayar_brimo4.jpg', 1),
('20241007ITH0WFJZ', 13, '2024-10-07', 'cijoho', 'Jawa Barat', 'Kuningan', 'tiki', 'SDS', '14000', 4, 2, '2024-10-07 12:57:21', '1014000', 'bukti_bayar_brimo2.jpg', 1),
('20241007MUFFHUSR', 12, '2024-10-07', 'kadugede', 'Jawa Barat', 'Kuningan', 'pos', 'Pos Sameday', '16000', 4, 2, '2024-10-07 12:37:12', '301000', 'bukti_bayar_brimo1.jpg', 1),
('20241007XMDGIJOC', 11, '2024-10-07', 'cigugur', 'Jawa Barat', 'Kuningan', 'pos', 'Pos Sameday', '16000', 4, 2, '2024-10-07 12:05:59', '169000', 'bukti_bayar_brimo.jpg', 1),
('20241008YZIRDN2T', 15, '2024-10-08', 'cigugur', 'Jawa Barat', 'Kuningan', 'pos', 'Pos Sameday', '16000', 4, 2, '2024-10-08 00:30:33', '215000', 'bukti_bayar_brimo5.jpg', 1),
('202410145APHL8GW', 16, '2024-10-14', 'Kadugede dekat terminal sebelah masjid', 'Jawa Barat', 'Kuningan', 'pos', 'Pos Sameday', '16000', 4, 2, '2024-10-14 12:22:33', '185000', 'bukti_bayar_brimo6.jpg', 1),
('20241014GYK6PLUV', 19, '2024-10-14', 'cisantana', 'Jawa Barat', 'Kuningan', 'pos', 'Pos Sameday', '16000', 4, 2, '2024-10-14 12:51:29', '185000', 'bukti_bayar_brimo9.jpg', 1),
('20241014PLNDHBQ1', 18, '2024-10-14', 'cigugur, cipager sebelah utara bank BRI', 'Jawa Barat', 'Kuningan', 'tiki', 'SDS', '14000', 4, 2, '2024-10-14 12:28:29', '183150', 'bukti_bayar_brimo8.jpg', 1),
('20241014RUW3FDRJ', 17, '2024-10-14', 'Cibingbin dekat balai desa ada rumah pagar hijau', 'Jawa Barat', 'Kuningan', 'tiki', 'SDS', '14000', 4, 2, '2024-10-14 12:25:46', '183150', 'bukti_bayar_brimo7.jpg', 1),
('20241017DK6YSMNO', 21, '2024-10-17', 'cigugur', 'Jawa Barat', 'Kuningan', 'tiki', 'SDS', '14000', 4, 2, '2024-10-17 03:45:50', '299000', 'bukti_bayar_brimo14.jpg', 1),
('20241017DOV6IWZX', 13, '2024-10-17', 'cijoho', 'Jawa Barat', 'Kuningan', 'pos', 'Pos Sameday', '16000', 4, 2, '2024-10-17 02:55:19', '566000', 'bukti_bayar_brimo10.jpg', 1),
('20241017QYYEMZUJ', 14, '2024-10-17', 'cisantana', 'Jawa Barat', 'Kuningan', 'tiki', '0 Hari', '14000', 4, 1, '2024-10-17 03:35:33', '164000', 'bukti_bayar_brimo13.jpg', 1),
('20241017UGESTPAK', 20, '2024-10-17', 'cigugur', 'Jawa Barat', 'Kuningan', 'pos', '0 HARI Hari', '16000', 4, 1, '2024-10-17 02:49:58', '166000', 'bukti_bayar_brimo11.jpg', 1),
('20241017V4LEMC2U', 22, '2024-10-17', 'cigugur', 'Jawa Barat', 'Kuningan', 'pos', 'Pos Sameday', '16000', 4, 2, '2024-10-17 03:50:33', '301000', 'bukti_bayar_brimo15.jpg', 1),
('20241017WLKSKCVI', 20, '2024-10-17', 'cigugur', 'Jawa Barat', 'Kuningan', 'pos', 'Pos Sameday', '16000', 4, 2, '2024-10-17 03:31:50', '281000', 'bukti_bayar_brimo12.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `alamat_user` varchar(50) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `alamat_user`, `no_hp`, `username`, `password`, `level_user`) VALUES
(4, 'Selaras', 'Cigugur', '085698745236', 'pemilik', 'pemilik', 2),
(5, 'Azzam', 'Cigugur', '08563214569', 'admin', 'admin', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `custom`
--
ALTER TABLE `custom`
  ADD PRIMARY KEY (`id_custom`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `diskon`
--
ALTER TABLE `diskon`
  ADD PRIMARY KEY (`id_diskon`);

--
-- Indexes for table `kain`
--
ALTER TABLE `kain`
  ADD PRIMARY KEY (`id_kain`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD PRIMARY KEY (`id_return`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`id_size`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `custom`
--
ALTER TABLE `custom`
  MODIFY `id_custom` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `diskon`
--
ALTER TABLE `diskon`
  MODIFY `id_diskon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `kain`
--
ALTER TABLE `kain`
  MODIFY `id_kain` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pengembalian`
--
ALTER TABLE `pengembalian`
  MODIFY `id_return` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `size`
--
ALTER TABLE `size`
  MODIFY `id_size` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
