-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Machine: localhost
-- Genereertijd: 03 Jun 2010 om 11:03
-- Serverversie: 5.1.41
-- PHP-Versie: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `poll`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `poll`
--

CREATE TABLE IF NOT EXISTS `poll` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vraag` varchar(255) DEFAULT NULL,
  `antwoord1` varchar(256) DEFAULT NULL,
  `antwoord2` varchar(256) DEFAULT NULL,
  `antwoord3` varchar(256) DEFAULT NULL,
  `antwoord4` varchar(256) DEFAULT NULL,
  `score1` int(11) DEFAULT NULL,
  `score2` int(11) DEFAULT NULL,
  `score3` int(11) DEFAULT NULL,
  `score4` int(11) DEFAULT NULL,
  `stemmen` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=58 ;

--
-- Gegevens worden uitgevoerd voor tabel `poll`
--

INSERT INTO `poll` (`id`, `vraag`, `antwoord1`, `antwoord2`, `antwoord3`, `antwoord4`, `score1`, `score2`, `score3`, `score4`, `stemmen`) VALUES
(1, 'Je moet kiezen:', 'Schopenhauer', 'Sting', 'Schubert', 'Schneider', 21, 22, 22, 22, 87),
(2, 'Favoriete Premier?', 'Arnold The Governator', 'Hugo Chavez', 'Desi Bouterse', 'Oom Henk', NULL, NULL, NULL, NULL, NULL),
(37, 'Je moet kiezen:', 'Amsterdam', '|Zwolle', 'Hasselt', 'Heerde', NULL, NULL, NULL, NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
