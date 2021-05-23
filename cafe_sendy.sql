-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2021 at 12:13 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cafe_sendy`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_laporan`
--

CREATE TABLE `tabel_laporan` (
  `id_laporan` int(2) NOT NULL,
  `tanggal_penjualan` date DEFAULT NULL,
  `jumlah_pesanan` int(5) DEFAULT NULL,
  `username` varchar(15) DEFAULT NULL,
  `id_menu` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabel_laporan`
--

INSERT INTO `tabel_laporan` (`id_laporan`, `tanggal_penjualan`, `jumlah_pesanan`, `username`, `id_menu`) VALUES
(3, '2021-05-14', 5, 'ariska123', 15),
(5, '2021-05-29', 2, 'ariska123', 18);

-- --------------------------------------------------------

--
-- Table structure for table `tabel_menu`
--

CREATE TABLE `tabel_menu` (
  `id_menu` int(2) NOT NULL,
  `nama_menu` varchar(50) DEFAULT NULL,
  `kategori_menu` varchar(7) DEFAULT NULL,
  `jenis_menu` varchar(15) DEFAULT NULL,
  `harga_menu` int(9) DEFAULT NULL,
  `gambar_menu` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabel_menu`
--

INSERT INTO `tabel_menu` (`id_menu`, `nama_menu`, `kategori_menu`, `jenis_menu`, `harga_menu`, `gambar_menu`) VALUES
(1, 'Ice Blend', 'Minuman', 'Ice', 18000, '102-ice-blend-coffee-bean.jpg'),
(2, 'Ice Drink', 'Minuman', 'Ice', 10000, '809-ice-drink-4.jpg'),
(10, 'Milk Shake', 'Minuman', 'Susu', 25000, '147-milkshake-4.jpg'),
(13, 'Flavoured Tea', 'Minuman', 'Tea', 8000, '953-hot-tea1.jpg'),
(15, 'Onion Ring', 'Makanan', 'Ice', 9000, '706-bigstock-onion-rings-48385277.jpg'),
(16, 'Roti Panggang', 'Makanan', 'Sweet', 19000, '719-roti-panggang-coklat-keju-malang.jpg'),
(17, 'Coconut Ice', 'Makanan', 'Ice', 25000, '161-coconut.jpg'),
(18, 'Pisang Goreng', 'Makanan', 'Fried', 16000, '791-170710_pisang-goreng-restoran-senayan-cafe_641_452.jpg'),
(22, 'Chicken Fingers', 'Makanan', 'Fried', 22000, '577-vbrgvcdmuczb9g_2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_pengguna`
--

CREATE TABLE `tabel_pengguna` (
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `nama_pengguna` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabel_pengguna`
--

INSERT INTO `tabel_pengguna` (`username`, `password`, `nama_pengguna`) VALUES
('ariska123', 'ariska123', 'Ariska'),
('sendy123', 'sendy123', 'Sendy');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_profil`
--

CREATE TABLE `tabel_profil` (
  `id_profil` int(2) NOT NULL,
  `nama_pemilik` varchar(50) DEFAULT NULL,
  `no_hp` varchar(13) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `deskripsi` varchar(300) DEFAULT NULL,
  `gambar_cafe` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabel_profil`
--

INSERT INTO `tabel_profil` (`id_profil`, `nama_pemilik`, `no_hp`, `alamat`, `deskripsi`, `gambar_cafe`) VALUES
(1, 'Sendy ', '082149369984', 'Jl. Yos Sudarso No.083, Menteng, Kec. Jekan Raya, Kota Palangka Raya, Kalimantan Tengah 73112', 'Salah satu coffeeshop di palangkaraya yang menyediakan fasilitas tempat nongkrong yang paling nyaman dan terbaik di kota palangkaraya', 'asdasd');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_laporan`
--
ALTER TABLE `tabel_laporan`
  ADD PRIMARY KEY (`id_laporan`),
  ADD KEY `fk_menu` (`id_menu`),
  ADD KEY `fk_pengguna` (`username`);

--
-- Indexes for table `tabel_menu`
--
ALTER TABLE `tabel_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `tabel_pengguna`
--
ALTER TABLE `tabel_pengguna`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `tabel_profil`
--
ALTER TABLE `tabel_profil`
  ADD PRIMARY KEY (`id_profil`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_laporan`
--
ALTER TABLE `tabel_laporan`
  MODIFY `id_laporan` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tabel_menu`
--
ALTER TABLE `tabel_menu`
  MODIFY `id_menu` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tabel_profil`
--
ALTER TABLE `tabel_profil`
  MODIFY `id_profil` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tabel_laporan`
--
ALTER TABLE `tabel_laporan`
  ADD CONSTRAINT `fk_menu` FOREIGN KEY (`id_menu`) REFERENCES `tabel_menu` (`id_menu`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pengguna` FOREIGN KEY (`username`) REFERENCES `tabel_pengguna` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
