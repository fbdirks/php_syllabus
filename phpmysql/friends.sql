-- phpMyAdmin SQL Dump
-- version 4.4.14.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Gegenereerd op: 05 nov 2015 om 20:45
-- Serverversie: 5.5.36-log
-- PHP-versie: 5.5.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `H5`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `friends`
--

CREATE TABLE IF NOT EXISTS `friends` (
  `id` int(11) NOT NULL,
  `voornaam` varchar(100) NOT NULL,
  `tussenvoegsel` varchar(20) DEFAULT NULL,
  `achternaam` varchar(100) NOT NULL,
  `bijnaam` varchar(100) DEFAULT NULL,
  `email` varchar(120) DEFAULT NULL,
  `telefoon` varchar(15) NOT NULL,
  `straat` varchar(120) DEFAULT NULL,
  `postcode` varchar(6) DEFAULT NULL,
  `plaats` varchar(120) DEFAULT NULL,
  `opmerking` varchar(250) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `friends`
--

INSERT INTO `friends` (`id`, `voornaam`, `tussenvoegsel`, `achternaam`, `bijnaam`, `email`, `telefoon`, `straat`, `postcode`, `plaats`, `opmerking`) VALUES
(1, 'Teunis', NULL, 'Tester', 'Kneuzis', 'teunis@test.nl', '06-12345678', 'Testplein 30', '1234AB', 'Testvliet', 'Geen kerstkaart sturen!');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `friends`
--
ALTER TABLE `friends`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
