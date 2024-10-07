-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2024 at 09:04 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pets_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_pet`
--

CREATE TABLE `data_pet` (
  `id_pet` int(11) NOT NULL,
  `name_pet` varchar(50) NOT NULL,
  `jenis` enum('Anjing','Kucing','Bebek','Ular','Kura-kura','Unggas','Hamster','Kadal','Kapibara') NOT NULL,
  `jenis_kelamin` enum('Jantan','Betina') NOT NULL,
  `berat` decimal(10,2) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `path_poto` varchar(255) NOT NULL,
  `harga` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_pet`
--

INSERT INTO `data_pet` (`id_pet`, `name_pet`, `jenis`, `jenis_kelamin`, `berat`, `tanggal_lahir`, `path_poto`, `harga`) VALUES
(6, 'Jamaludin', 'Kucing', 'Jantan', 200.00, '2024-10-06', 'img/2.jpeg', 10000.00),
(7, 'Ahmad Sisya', 'Kucing', 'Jantan', 5.12, '2024-08-23', 'img/1.jpeg', 1240000.00),
(8, 'Sumbul', 'Kucing', 'Jantan', 12.50, '2024-01-06', 'img/gal-13.jpeg', 4000000.00),
(9, 'Nardon', 'Anjing', 'Jantan', 12.50, '2024-10-06', 'img/gal-7.jpeg', 1000000.00),
(10, 'Konderjoy', 'Kapibara', 'Jantan', 19.50, '2024-10-06', 'img/gal-2.jpeg', 200000.00);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_pet`
--
ALTER TABLE `data_pet`
  ADD PRIMARY KEY (`id_pet`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_pet`
--
ALTER TABLE `data_pet`
  MODIFY `id_pet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
