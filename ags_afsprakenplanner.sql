-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 28 nov 2024 om 22:18
-- Serverversie: 10.4.32-MariaDB
-- PHP-versie: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ags_afsprakenplanner`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `papierformaten`
--

CREATE TABLE `papierformaten` (
  `id` int(11) NOT NULL,
  `papierformaat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `papierformaten`
--

INSERT INTO `papierformaten` (`id`, `papierformaat`) VALUES
(1, 'A4'),
(2, 'SRA4'),
(3, 'A3'),
(4, 'SRA3'),
(5, 'Groot formaat printer tot 160cm breed en 30meter lang');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `status`
--

INSERT INTO `status` (`id`, `status`) VALUES
(1, 'Goedgekeurd'),
(2, 'Afgekeurd'),
(3, 'Nog niet bekeken');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tijdsloten`
--

CREATE TABLE `tijdsloten` (
  `id` int(11) NOT NULL,
  `user-id` int(11) NOT NULL,
  `dag` text NOT NULL,
  `tijdstip-id` int(11) NOT NULL,
  `papiersoorten-id` int(11) DEFAULT NULL,
  `papiermaten-id` int(11) NOT NULL,
  `extrainfo` text NOT NULL,
  `status` int(11) NOT NULL,
  `adminbewerkt-id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tijdstip`
--

CREATE TABLE `tijdstip` (
  `id` int(11) NOT NULL,
  `tijdstip` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `tijdstip`
--

INSERT INTO `tijdstip` (`id`, `tijdstip`) VALUES
(1, '8.30'),
(2, '9.00'),
(3, '9.30'),
(4, '10.00'),
(5, '10.30'),
(6, '11.00'),
(7, '11.30'),
(8, '12.00'),
(9, '12.30'),
(10, '13.00'),
(11, '13.30'),
(12, '14.00'),
(13, '14.30'),
(14, '15.00'),
(15, '15.30'),
(16, '16.00'),
(17, '16.30'),
(18, '17.00'),
(19, '17.30'),
(20, '18.00');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `naam` text NOT NULL,
  `gebruikersnaam` text NOT NULL,
  `wachtwoord` text NOT NULL,
  `email` text NOT NULL,
  `studentcode` text NOT NULL,
  `role` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `papierformaten`
--
ALTER TABLE `papierformaten`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `tijdsloten`
--
ALTER TABLE `tijdsloten`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `tijdstip`
--
ALTER TABLE `tijdstip`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `papierformaten`
--
ALTER TABLE `papierformaten`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT voor een tabel `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT voor een tabel `tijdsloten`
--
ALTER TABLE `tijdsloten`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `tijdstip`
--
ALTER TABLE `tijdstip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
