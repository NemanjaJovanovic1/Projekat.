-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 18, 2024 at 07:16 PM
-- Server version: 8.3.0
-- PHP Version: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fudbal`
--

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

DROP TABLE IF EXISTS `korisnici`;
CREATE TABLE IF NOT EXISTS `korisnici` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lozinka` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`id`, `email`, `lozinka`) VALUES
(1, 'nemanja56@gmail.com', '$2y$10$qwD8X1nik5KWBQGIHh5cqeyE8vBflhKgHGSGfL7JPZ3MzYEYBtyIm');

-- --------------------------------------------------------

--
-- Table structure for table `tabele`
--

DROP TABLE IF EXISTS `tabele`;
CREATE TABLE IF NOT EXISTS `tabele` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pozicija` int NOT NULL,
  `naziv` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grad` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slika` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `utakmice` int DEFAULT '0',
  `pobede` int DEFAULT '0',
  `neresene` int DEFAULT '0',
  `porazi` int DEFAULT '0',
  `dati_golovi` int DEFAULT '0',
  `primljeni_golovi` int DEFAULT '0',
  `bodovi` int DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tabele`
--

INSERT INTO `tabele` (`id`, `pozicija`, `naziv`, `grad`, `slika`, `utakmice`, `pobede`, `neresene`, `porazi`, `dati_golovi`, `primljeni_golovi`, `bodovi`) VALUES
(1, 1, 'Kolubara', 'Lazarevac', 'Grb1.png', 2, 2, 0, 0, 3, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `timovi`
--

DROP TABLE IF EXISTS `timovi`;
CREATE TABLE IF NOT EXISTS `timovi` (
  `id` int NOT NULL AUTO_INCREMENT,
  `naziv` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grad` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pozicija` int NOT NULL,
  `slika` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `timovi`
--

INSERT INTO `timovi` (`id`, `naziv`, `grad`, `pozicija`, `slika`) VALUES
(1, 'Kolubara', 'Lazarevac', 1, 'Grb1.png'),
(2, 'Teleoptik', 'Zemun', 3, 'Grb2.png'),
(3, 'Radnički (NB)', 'Novi Beograd', 2, 'Grb3.png');

-- --------------------------------------------------------

--
-- Table structure for table `transferi`
--

DROP TABLE IF EXISTS `transferi`;
CREATE TABLE IF NOT EXISTS `transferi` (
  `transfer_id` int NOT NULL AUTO_INCREMENT,
  `ime_igraca` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stari_tim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `novi_tim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datum` date NOT NULL,
  `cena` decimal(10,2) NOT NULL,
  PRIMARY KEY (`transfer_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transferi`
--

INSERT INTO `transferi` (`transfer_id`, `ime_igraca`, `stari_tim`, `novi_tim`, `datum`, `cena`) VALUES
(1, 'Ognjen', 'Kolubara', 'Radnički (NB)', '2024-07-18', 1000.00);

-- --------------------------------------------------------

--
-- Table structure for table `utakmice`
--

DROP TABLE IF EXISTS `utakmice`;
CREATE TABLE IF NOT EXISTS `utakmice` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tim1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tim2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datum` date NOT NULL,
  `slika` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rezultat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `utakmice`
--

INSERT INTO `utakmice` (`id`, `tim1`, `tim2`, `datum`, `slika`, `rezultat`) VALUES
(1, ' Kolubara', 'Radnički (NB)', '2024-07-18', 'Grb1.png', '1-0');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
