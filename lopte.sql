-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2023 at 02:07 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lopte`
--

-- --------------------------------------------------------

--
-- Table structure for table `drzava`
--

CREATE TABLE `drzava` (
  `id` bigint(20) NOT NULL,
  `naziv` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `drzava`
--

INSERT INTO `drzava` (`id`, `naziv`) VALUES
(1, 'SAD'),
(2, 'Italija'),
(3, 'Nemacka');

-- --------------------------------------------------------

--
-- Table structure for table `marka`
--

CREATE TABLE `marka` (
  `id` bigint(20) NOT NULL,
  `naziv` varchar(30) NOT NULL,
  `drzava` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `marka`
--

INSERT INTO `marka` (`id`, `naziv`, `drzava`) VALUES
(1, 'Spalding', 1),
(2, 'Kappa', 2),
(3, 'Adidas', 3),
(4, 'Mikasa', 1),
(5, 'Puma', 3),
(13, 'Fila', 2);

-- --------------------------------------------------------

--
-- Table structure for table `model`
--

CREATE TABLE `model` (
  `id` bigint(20) NOT NULL,
  `marka` bigint(20) NOT NULL,
  `naziv` varchar(30) NOT NULL,
  `tip` varchar(30) NOT NULL,
  `velicina` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `model`
--

INSERT INTO `model` (`id`, `marka`, `naziv`, `tip`, `velicina`) VALUES
(1, 1, 'OFICIJALNA KOŠARKAŠKA LOPTA EU', 'kosarka', 7),
(2, 3, 'LOPTA UCL LGE J350 IS-HT9008', 'fudbal', 5),
(3, 2, 'LOPTA 2000 THB FA-3031K70-ATL', 'fudbal', 5),
(4, 4, 'Lopta za odbojku Mikasa MVA 33', 'odbojka', 5),
(5, 5, 'LOPTA PUMA ORBITA 2 TB (FIFA Q', 'fudbal', 5),
(7, 3, 'LOPTA EPP CLB-IA0917', 'fudbal', 0),
(9, 3, 'LOPTA STARLANCER PLUS-IA0967', 'fudbal', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `drzava`
--
ALTER TABLE `drzava`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marka`
--
ALTER TABLE `marka`
  ADD PRIMARY KEY (`id`),
  ADD KEY `drzava` (`drzava`);

--
-- Indexes for table `model`
--
ALTER TABLE `model`
  ADD PRIMARY KEY (`id`),
  ADD KEY `model` (`marka`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `drzava`
--
ALTER TABLE `drzava`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `marka`
--
ALTER TABLE `marka`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `model`
--
ALTER TABLE `model`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `marka`
--
ALTER TABLE `marka`
  ADD CONSTRAINT `drzava` FOREIGN KEY (`drzava`) REFERENCES `drzava` (`id`);

--
-- Constraints for table `model`
--
ALTER TABLE `model`
  ADD CONSTRAINT `model` FOREIGN KEY (`marka`) REFERENCES `marka` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
