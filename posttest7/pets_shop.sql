-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 20, 2024 at 03:23 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

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
  `id_pet` int NOT NULL,
  `name_pet` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `jenis` enum('Anjing','Kucing','Bebek','Ular','Kura-kura','Unggas','Hamster','Kadal','Kapibara') COLLATE utf8mb4_general_ci NOT NULL,
  `jenis_kelamin` enum('Jantan','Betina') COLLATE utf8mb4_general_ci NOT NULL,
  `berat` decimal(10,2) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `path_poto` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `harga` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_pet`
--

INSERT INTO `data_pet` (`id_pet`, `name_pet`, `jenis`, `jenis_kelamin`, `berat`, `tanggal_lahir`, `path_poto`, `harga`) VALUES
(38, 'Zamsul', 'Kucing', 'Jantan', '2.00', '2024-09-16', 'C:/laragon/www/posttest7/img/2024-10-20 10-02-24.jpeg', '2000000.00'),
(39, 'Gondrong Bandol', 'Anjing', 'Betina', '12.00', '2024-01-20', 'C:/laragon/www/posttest7/img/2024-10-20 10-55-29.jpeg', '9000000.00'),
(41, 'Laksamana', 'Anjing', 'Jantan', '16.00', '2023-10-20', 'C:/laragon/www/posttest7/img/2024-10-20 11-01-55.jpeg', '1000000.00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` enum('admin','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$meJ74nNeUyckeOXNhnDGo.Uf3kMmNI3a.zPDHdA4322ntr/WnAPQm', 'admin'),
(3, 'ifnu', 'ifnu@gmail.com', '$2y$10$9HRbbdVFDpGNzV.rV55lw.7qSjDX0KvtGjCQzUnytmtps7cM4qXYW', 'user'),
(4, 'ucup', 'ucup2@gmail.com', '$2y$10$uXlINu7Ms/Tq/58GVzYVX.HIXWJonYc8MNI78nb3S3c150FOeQQye', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_pet`
--
ALTER TABLE `data_pet`
  ADD PRIMARY KEY (`id_pet`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_pet`
--
ALTER TABLE `data_pet`
  MODIFY `id_pet` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
