-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Värd: localhost
-- Tid vid skapande: 02 okt 2017 kl 13:37
-- Serverversion: 10.1.26-MariaDB
-- PHP-version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databas: `BookButler`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `books`
--

CREATE TABLE `books` (
  `bookid` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL,
  `onloan` tinyint(1) DEFAULT '0',
  `duedate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `books`
--

INSERT INTO `books` (`bookid`, `title`, `author`, `onloan`, `duedate`) VALUES
(1, 'The Lord Of The Rings', 'JRR Tolkien', 0, NULL),
(2, 'Silmarillion', 'JRR Tolkien', 0, NULL),
(3, 'Nausea', 'Jean Paul Sartre', 0, NULL),
(4, 'Thinking With Type', 'Ellen Lupton', 0, NULL),
(5, 'It', 'Stephen King', 0, NULL),
(6, 'Grid Systems', 'Josef Muller Brockmann', 0, NULL),
(7, 'Shutter Island', 'Dennis Lehane', 1, NULL),
(8, 'Gone Girl', 'Gillian Flynn', 0, NULL),
(9, 'Wind In The Willows', 'Kenneth Grahame', 0, NULL),
(10, 'The Hobbit', 'JRR Tolkien', 0, NULL),
(11, 'Tales From The Perilous Realm', 'JRR Tolkien', 0, NULL),
(12, 'The Evolution Of Type', 'Tony Seddon', 1, NULL),
(13, 'Graphic Design Theory', 'Helen Armstrong', 0, NULL),
(14, 'New Perspectives In Typography', 'Scott Williams & Henrik Kubel', 0, NULL),
(15, 'Logo Design Love', 'David Airey', 0, NULL),
(16, 'Zelda vs Patriarkatet', 'Lina Neidestam', 0, NULL),
(17, 'Logo Modernism', 'Jens Muller', 0, NULL);

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`bookid`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `books`
--
ALTER TABLE `books`
  MODIFY `bookid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
