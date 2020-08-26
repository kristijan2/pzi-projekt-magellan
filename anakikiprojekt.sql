-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2020 at 02:53 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `anakikiprojekt`
--

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `id` int(8) NOT NULL,
  `email` varchar(100) NOT NULL,
  `lozinka` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`id`, `email`, `lozinka`) VALUES
(26, 'kristijan.mihaljevic@gmail.com', '79617f547b0cc538ff8a5afd350a7913'),
(27, 'admin@gmail.com', 'b4c1a06cf6bed13788fd5878bf738998'),
(28, 'anabarac12@gmail.com', '71c29fe3c63040ec2e8171f5b924e9b4');

-- --------------------------------------------------------

--
-- Table structure for table `prijava`
--

CREATE TABLE `prijava` (
  `id_prijava` int(8) NOT NULL,
  `korisnik_email` varchar(100) NOT NULL,
  `odredistee` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prijava`
--

INSERT INTO `prijava` (`id_prijava`, `korisnik_email`, `odredistee`) VALUES
(32, 'anabarac12@gmail.com', 'london'),
(33, 'anabarac12@gmail.com', 'atena');

-- --------------------------------------------------------

--
-- Table structure for table `putovanje`
--

CREATE TABLE `putovanje` (
  `id_putovanje` int(8) NOT NULL,
  `odrediste` varchar(30) NOT NULL,
  `cijena` varchar(15) NOT NULL,
  `datum` varchar(30) NOT NULL,
  `opis` varchar(255) NOT NULL,
  `slika` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `putovanje`
--

INSERT INTO `putovanje` (`id_putovanje`, `odrediste`, `cijena`, `datum`, `opis`, `slika`) VALUES
(22, 'London', '510,00KM', '10.10.2020.-15.10.2020.', 'Unatoč tomu što se smatra gradom kiše, London je omiljeni grad turista diljem svijeta. Uvjerite se i zašto.', 'london.jpg'),
(24, 'Rim', '480,00KM', '6.9.2020.-15.9.2020.', 'Za 7 dana u hotelu sa 4 zvijezdice iskusi sve ljepote Rima!', 'rim.jpg'),
(25, 'Atena', '250,00KM', '11.11.2020.-15.11.2020.', 'Mjesto gdje su bogovi i ljudi najbliže jedni drugima.', 'atena.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prijava`
--
ALTER TABLE `prijava`
  ADD PRIMARY KEY (`id_prijava`),
  ADD KEY `korisnik_id` (`korisnik_email`);

--
-- Indexes for table `putovanje`
--
ALTER TABLE `putovanje`
  ADD PRIMARY KEY (`id_putovanje`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `prijava`
--
ALTER TABLE `prijava`
  MODIFY `id_prijava` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `putovanje`
--
ALTER TABLE `putovanje`
  MODIFY `id_putovanje` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
