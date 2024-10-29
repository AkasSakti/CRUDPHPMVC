-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 29, 2024 at 04:34 AM
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
-- Database: `cobaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `pemakai`
--

CREATE TABLE `pemakai` (
  `id_user` int NOT NULL,
  `nim` varchar(30) NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pemakai`
--

INSERT INTO `pemakai` (`id_user`, `nim`, `password`, `nama`, `email`) VALUES
(1, '30109156', 'polije1234', 'Akas Bagus Sekali', 'akas.setiawan@gmail.com'),
(3, '30109157', '$2y$10$EPgkBW7wh3ZB47woQtjBSegpynS42f2mOK8HFh7uiDSEuM8wXxXDu', 'Meilina lope', 'aniani@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pemakai`
--
ALTER TABLE `pemakai`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pemakai`
--
ALTER TABLE `pemakai`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
