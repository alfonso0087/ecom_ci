-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2020 at 11:33 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ecomm`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` int(2) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(128) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `username`, `password`, `nama`, `email`) VALUES
(1, 'admin', '$2y$10$2oG0UT4JTAyX6jAaF97d9uFOmC9.81tmwDzZ7XpCdnPhPuWwPW5PO', 'Admin Osnofla', 'admin@osnofla.tech');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_biaya_kirim`
--

CREATE TABLE `tbl_biaya_kirim` (
  `id_biaya_kirim` int(10) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `biaya` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_biaya_kirim`
--

INSERT INTO `tbl_biaya_kirim` (`id_biaya_kirim`, `kota`, `biaya`) VALUES
(1, 'Yogyakarta', 35000),
(2, 'Jakarta', 80000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detail_order`
--

CREATE TABLE `tbl_detail_order` (
  `id_detail_order` int(11) NOT NULL,
  `id_order` int(5) NOT NULL,
  `id_produk` int(5) NOT NULL,
  `jumlah` int(5) NOT NULL,
  `harga` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id_kategori_produk` int(3) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id_kategori_produk`, `nama_kategori`) VALUES
(1, 'Sepatu'),
(2, 'Jam Tangan'),
(3, 'Tas');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_member`
--

CREATE TABLE `tbl_member` (
  `id_member` int(10) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `alamat` varchar(250) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `no_hp` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_merek`
--

CREATE TABLE `tbl_merek` (
  `id_merek` int(3) NOT NULL,
  `nama_merek` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_merek`
--

INSERT INTO `tbl_merek` (`id_merek`, `nama_merek`) VALUES
(1, 'Converse'),
(2, 'Adidas'),
(6, 'Fossil'),
(8, 'Alba'),
(9, 'Gucci'),
(11, 'Hermes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id_order` int(5) NOT NULL,
  `status_order` char(1) NOT NULL,
  `id_produk` int(5) DEFAULT NULL,
  `jumlah` int(3) DEFAULT NULL,
  `harga` int(10) DEFAULT NULL,
  `id_session` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id_order`, `status_order`, `id_produk`, `jumlah`, `harga`, `id_session`) VALUES
(1, 'P', 1, 1, 650000, '5l3a3qtqu4fj9t4vua0jac88r2hstf21');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pembelian`
--

CREATE TABLE `tbl_pembelian` (
  `id_order` int(10) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `alamat` varchar(200) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `no_telp` varchar(20) DEFAULT NULL,
  `tanggal_beli` varchar(30) DEFAULT NULL,
  `status_order` char(1) DEFAULT NULL,
  `biaya_kirim` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pembelian`
--

INSERT INTO `tbl_pembelian` (`id_order`, `nama`, `alamat`, `email`, `no_telp`, `tanggal_beli`, `status_order`, `biaya_kirim`) VALUES
(1, 'Battery tidak bisa dicas', 'redu', 'alfonso@email.com', 'aa', '22-05-2020', 'P', 80000),
(2, 'Battery tidak bisa dicas', 'redu', 'alfonso@email.com', 'aa', '22-05-2020', 'P', 80000),
(3, 'Battery tidak bisa dicas', 'redu', 'alfonso@email.com', 'aa', '22-05-2020', 'P', 80000),
(4, 'Alfonso Aryando S', 'alamat', 'alfonso@amikom.ac.id', '0898908079', '22-05-2020', 'P', 35000),
(5, 'Alfonso Aryando S', 'alamat', 'alfonso@amikom.ac.id', '0898908079', '22-05-2020', 'P', 35000),
(6, 'Alfonso Aryando S', 'alamat', 'alfonso@amikom.ac.id', '0898908079', '22-05-2020', 'P', 35000),
(7, 'Alfonso Aryando S', 'alamat', 'alfonso@amikom.ac.id', '0898908079', '22-05-2020', 'P', 35000),
(8, 'Alfonso Aryando S', 'alamat', 'alfonso@amikom.ac.id', '0898908079', '22-05-2020', 'P', 35000),
(9, 'Alfonso Aryando S', 'alamat', 'alfonso@amikom.ac.id', '0898908079', '22-05-2020', 'P', 35000),
(10, 'Alfonso Aryando S', 'alamat', 'alfonso@amikom.ac.id', '0898908079', '22-05-2020', 'P', 35000),
(11, 'Alfonso Aryando S', 'alamat', 'alfonso@amikom.ac.id', '0898908079', '22-05-2020', 'P', 35000),
(12, 'aldo', 'sdisdas', 'alfonso@email.com', '0898908079', '22-05-2020', 'P', 80000),
(13, 'aldo', 'sdisdas', 'alfonso@email.com', '0898908079', '22-05-2020', 'P', 80000),
(14, 'aldo', 'sdisdas', 'alfonso@email.com', '0898908079', '22-05-2020', 'P', 80000),
(15, 'aldo', 'sdisdas', 'alfonso@email.com', '0898908079', '22-05-2020', 'P', 80000),
(16, 'aldo', 'sdisdas', 'alfonso@email.com', '0898908079', '22-05-2020', 'P', 80000),
(17, 'aldo', 'sdisdas', 'alfonso@email.com', '0898908079', '22-05-2020', 'P', 80000),
(18, 'Alfonso Aryando', 'fy', 'alfonso@amikom.ac.id', '0898908079', '22-05-2020', 'P', 35000),
(19, 'Alfonso Aryando', 'fy', 'alfonso@amikom.ac.id', '0898908079', '22-05-2020', 'P', 35000),
(20, 'Alfonso Aryando', 'tgp', 'alfonso@amikom.ac.id', '0898908079', '22-05-2020', 'P', 35000),
(21, 'Alfonso Aryando', 'tgp', 'alfonso@amikom.ac.id', '0898908079', '22-05-2020', 'P', 35000),
(22, 'Gejala 2', 'a', 'hesti.a@students.amikom.ac.id', '111', '22-05-2020', 'P', 80000),
(23, 'Gejala 2', 'a', 'hesti.a@students.amikom.ac.id', '111', '22-05-2020', 'P', 80000),
(24, 'Alfonso Aryando', 'aa', 'alfonso@amikom.ac.id', 'a', '22-05-2020', 'P', 80000),
(25, 'Alfonso Aryando', 'aa', 'alfonso@amikom.ac.id', 'a', '22-05-2020', 'P', 80000),
(26, 'Alfonso Aryando', 'aa', 'alfonso@amikom.ac.id', 'a', '22-05-2020', 'P', 80000),
(27, 'Alfonso Aryando', 'aa', 'alfonso@amikom.ac.id', 'a', '22-05-2020', 'P', 80000),
(28, 'Alfonso Aryando', 'a', 'alfonso@amikom.ac.id', '0898908079', '22-05-2020', 'P', 35000),
(29, 'Alfonso Aryando', 'a', 'alfonso@amikom.ac.id', '0898908079', '22-05-2020', 'P', 35000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_produk`
--

CREATE TABLE `tbl_produk` (
  `id_produk` int(10) NOT NULL,
  `id_kategori_produk` int(3) NOT NULL,
  `id_merek` int(3) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `harga` int(20) NOT NULL,
  `gambar` varchar(100) DEFAULT NULL,
  `slide` char(1) DEFAULT NULL,
  `rekomendasi` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_produk`
--

INSERT INTO `tbl_produk` (`id_produk`, `id_kategori_produk`, `id_merek`, `nama_produk`, `deskripsi`, `harga`, `gambar`, `slide`, `rekomendasi`) VALUES
(1, 1, 1, 'Converse One Star', 'Sepatu Converse One Star', 650000, '165022C-1.jpg', 'N', 'Y'),
(3, 1, 2, 'Adidas Neo', 'Sepatu Adidas Neo', 500000, 'SEPATU_ADIDAS_NEO_ZOOM.jpg', 'N', 'Y'),
(4, 1, 2, 'Adidas NMD', 'Sepatu Adidas NMD', 600000, 'Sepatu_Adidas_NMD_R1.jpg', 'Y', 'N'),
(5, 2, 6, 'Fossil Cecile Chronograph', 'Jam Tangan Fossil Cecile Chronograph', 950000, '3552b3fff9fe142f4ff50df20146ae28.jpg', 'Y', 'N'),
(7, 2, 8, 'Alba AS9F25X1', 'Jam Tangan Alba AS9F25X1', 780000, 'Alba_AS9F25X1_Jam_Tangan_Pria_ALBA_Tali_Rantai_Logam_Stainle.jpg', 'Y', 'N'),
(8, 2, 8, 'Alba ARSY10X1', 'Jam Tangan Alba ARSY10X1 Man 5 Bar Stainless Steel Gold', 430000, '1l.jpg', 'N', 'Y'),
(9, 3, 9, 'Gucci GG Marmont', 'Tas Gucci GG Marmont Matelasse Shoulder Bag B1811 Platinum', 350000, 'EB50A1BF-5CA3-4145-A6BC-E27F572835CD_jpeg.png', 'Y', 'N'),
(11, 3, 11, 'Tas H E R M E S Constance Croco', 'Tas H E R M E S Constance Croco', 350000, 'Tas_H_E_R_M_E_S_Constance_Croco_8176_1.jpg', 'N', 'N'),
(12, 3, 11, 'HERMES KELLY', 'TAS WANITA IMPORT /TAS HERMES KELLY,', 300000, '8db91279fce06ce52cf6e6f796351242.jpg', 'Y', 'Y');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tbl_biaya_kirim`
--
ALTER TABLE `tbl_biaya_kirim`
  ADD PRIMARY KEY (`id_biaya_kirim`);

--
-- Indexes for table `tbl_detail_order`
--
ALTER TABLE `tbl_detail_order`
  ADD PRIMARY KEY (`id_detail_order`);

--
-- Indexes for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id_kategori_produk`);

--
-- Indexes for table `tbl_member`
--
ALTER TABLE `tbl_member`
  ADD PRIMARY KEY (`id_member`);

--
-- Indexes for table `tbl_merek`
--
ALTER TABLE `tbl_merek`
  ADD PRIMARY KEY (`id_merek`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id_order`);

--
-- Indexes for table `tbl_pembelian`
--
ALTER TABLE `tbl_pembelian`
  ADD PRIMARY KEY (`id_order`);

--
-- Indexes for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_admin` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_biaya_kirim`
--
ALTER TABLE `tbl_biaya_kirim`
  MODIFY `id_biaya_kirim` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_detail_order`
--
ALTER TABLE `tbl_detail_order`
  MODIFY `id_detail_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id_kategori_produk` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_member`
--
ALTER TABLE `tbl_member`
  MODIFY `id_member` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_merek`
--
ALTER TABLE `tbl_merek`
  MODIFY `id_merek` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id_order` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_pembelian`
--
ALTER TABLE `tbl_pembelian`
  MODIFY `id_order` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
  MODIFY `id_produk` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
