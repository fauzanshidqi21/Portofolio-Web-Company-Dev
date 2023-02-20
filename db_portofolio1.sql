-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2023 at 08:33 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_portofolio1`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_about`
--

CREATE TABLE `tb_about` (
  `id_about` int(2) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_about`
--

INSERT INTO `tb_about` (`id_about`, `description`) VALUES
(1, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa, animi. Cumque molestias voluptate, iste fuga tempore corrupti atque accusantium vitae eligendi, natus nisi labore deserunt temporibus sit illum, incidunt id! Lorem ipsum dolor sit amet consectetur adipisicing elit. Est quis, esse nostrum dolores possimus ut blanditiis placeat alias ab earum a accusantium aspernatur commodi vel, officia ea harum dolorem dignissimos.\n\nLorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa, animi. Cumque molestias voluptate, iste fuga tempore corrupti atque accusantium vitae eligendi, natus nisi labore deserunt temporibus sit illum, incidunt id! Lorem ipsum dolor sit amet consectetur adipisicing elit. Est quis, esse nostrum dolores possimus ut blanditiis placeat alias ab earum a accusantium aspernatur commodi vel, officia ea harum dolorem dignissimos.\n\n');

-- --------------------------------------------------------

--
-- Table structure for table `tb_login`
--

CREATE TABLE `tb_login` (
  `id_login` int(5) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `jenis_kelamin` enum('Pria','Wanita') NOT NULL,
  `alamat` text NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` enum('Aktif','Tidak Aktif') NOT NULL,
  `photo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_login`
--

INSERT INTO `tb_login` (`id_login`, `nama_lengkap`, `email`, `no_hp`, `jenis_kelamin`, `alamat`, `username`, `password`, `status`, `photo`) VALUES
(19, 'safira', 'safira@gmail.com', '02151554', 'Wanita', 'Jakarta', 'safira', 'b04284069ddd397ed8298738d3005532', 'Aktif', 'bg-1.jpg.jpg'),
(20, 'zano', 'zano@gmail.com', '02151554', 'Pria', 'Jakarta', 'admin', '0192023a7bbd73250516f069df18b500', 'Aktif', 'bg-1.jpg.jpg'),
(21, 'naji', 'naji@gmail.com', '02151554', 'Pria', 'Bekasi', 'naji', '827ccb0eea8a706c4c34a16891f84e7b', 'Tidak Aktif', 'bg-1.jpg.jpg'),
(29, 'tukul', 'tukul@gmail.com', '0215155401', 'Pria', 'Bekasi', 'tukul', '827ccb0eea8a706c4c34a16891f84e7b', 'Aktif', 'bg-1.jpg.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_news`
--

CREATE TABLE `tb_news` (
  `id_news` int(5) NOT NULL,
  `judul` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `permalink` varchar(150) NOT NULL,
  `gambar` text NOT NULL,
  `created` datetime NOT NULL,
  `id_login` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_news`
--

INSERT INTO `tb_news` (`id_news`, `judul`, `description`, `permalink`, `gambar`, `created`, `id_login`) VALUES
(1, 'Judul1', 'Isi Berita', 'judul-1', '', '2022-08-13 15:54:02', 19),
(2, 'Judul2', 'Isi Berita', 'judul-2', '', '2022-08-13 15:54:02', 20),
(3, 'Judul3', 'Isi Berita', 'judul-3', '', '2022-08-13 15:54:02', 21),
(4, 'Belajar Prog', 'Belajar Prog', 'Belajar-Prog', 'bg-1.jpg.jpg', '2022-08-27 16:19:35', 20);

-- --------------------------------------------------------

--
-- Table structure for table `tb_product`
--

CREATE TABLE `tb_product` (
  `id_product` int(5) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` double NOT NULL,
  `gambar` text NOT NULL,
  `created` date NOT NULL,
  `updated` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_product`
--

INSERT INTO `tb_product` (`id_product`, `product_name`, `description`, `price`, `gambar`, `created`, `updated`) VALUES
(2, 'milk tea 1', 'milk', 35000, 'milk.png.png', '2022-08-28', '2022-08-28');

-- --------------------------------------------------------

--
-- Table structure for table `tb_slider`
--

CREATE TABLE `tb_slider` (
  `id_slider` int(5) NOT NULL,
  `judul` varchar(130) NOT NULL,
  `subjudul` text NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_about`
--
ALTER TABLE `tb_about`
  ADD PRIMARY KEY (`id_about`);

--
-- Indexes for table `tb_login`
--
ALTER TABLE `tb_login`
  ADD PRIMARY KEY (`id_login`);

--
-- Indexes for table `tb_news`
--
ALTER TABLE `tb_news`
  ADD PRIMARY KEY (`id_news`);

--
-- Indexes for table `tb_product`
--
ALTER TABLE `tb_product`
  ADD PRIMARY KEY (`id_product`);

--
-- Indexes for table `tb_slider`
--
ALTER TABLE `tb_slider`
  ADD PRIMARY KEY (`id_slider`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_login`
--
ALTER TABLE `tb_login`
  MODIFY `id_login` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tb_news`
--
ALTER TABLE `tb_news`
  MODIFY `id_news` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_product`
--
ALTER TABLE `tb_product`
  MODIFY `id_product` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_slider`
--
ALTER TABLE `tb_slider`
  MODIFY `id_slider` int(5) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
