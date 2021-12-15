-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 15 dec 2021 om 13:12
-- Serverversie: 10.4.20-MariaDB
-- PHP-versie: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bugreporter`
--
CREATE DATABASE IF NOT EXISTS `bugreporter` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `bugreporter`;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `bug`
--

CREATE TABLE `bug` (
  `ID` int(8) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `version` double NOT NULL,
  `hardware_type` varchar(255) NOT NULL,
  `os` varchar(255) NOT NULL,
  `frequency` varchar(255) NOT NULL,
  `solution` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `bug`
--

INSERT INTO `bug` (`ID`, `product_name`, `version`, `hardware_type`, `os`, `frequency`, `solution`) VALUES
(1, 'Sony Experia', 5, 'Phone', 'AndroidOS', 'weekly', 'Firmware Restore'),
(2, 'Samsung S3', 4.6, 'Tablet', 'Custom Firmware', 'After booting up', 'Recycle');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `bug`
--
ALTER TABLE `bug`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `bug`
--
ALTER TABLE `bug`
  MODIFY `ID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
