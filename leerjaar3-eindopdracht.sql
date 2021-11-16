-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 16 nov 2021 om 12:56
-- Serverversie: 10.4.19-MariaDB
-- PHP-versie: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `leerjaar3-eindopdracht`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `admin_login`
--

CREATE TABLE `admin_login` (
  `ID` int(11) NOT NULL,
  `user_email` varchar(75) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `admin_login`
--

INSERT INTO `admin_login` (`ID`, `user_email`, `user_password`, `time`) VALUES
(1, 'admin@admin.com', 'admin', '00:00:00');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `all_houses`
--

CREATE TABLE `all_houses` (
  `ID` int(11) NOT NULL,
  `Straat` varchar(75) NOT NULL,
  `Plaats` varchar(75) NOT NULL,
  `PostCode` varchar(6) NOT NULL,
  `Provincie` varchar(75) NOT NULL,
  `Nummer` varchar(10) NOT NULL,
  `Kamers` varchar(10) NOT NULL,
  `Slaapkamers` varchar(10) NOT NULL,
  `Bouwjaar` varchar(10) NOT NULL,
  `Ligging` varchar(25) NOT NULL,
  `Oppervlakte` varchar(50) NOT NULL,
  `Type` varchar(25) NOT NULL,
  `Datum` date NOT NULL,
  `Verkocht` varchar(25) NOT NULL,
  `Prijs` varchar(25) NOT NULL,
  `img` text NOT NULL,
  `ProvincieID` int(5) NOT NULL,
  `Provincie_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `all_houses`
--

INSERT INTO `all_houses` (`ID`, `Straat`, `Plaats`, `PostCode`, `Provincie`, `Nummer`, `Kamers`, `Slaapkamers`, `Bouwjaar`, `Ligging`, `Oppervlakte`, `Type`, `Datum`, `Verkocht`, `Prijs`, `img`, `ProvincieID`, `Provincie_name`) VALUES
(1, 'Kapittellaan', 'Maastricht', '6229TS', 'Limburg', '133', '3', '5', '1901', 'rural', '50m2 or more', 'house', '2020-09-06', 'Yup', '512102', '0', 1, 'Limburg'),
(2, 'Bleistraat', 'Ooij', '6576CA', 'Gelderland', '66', '1', '3', '2004', 'quiet area', '100m2 or more', 'house', '2019-04-15', 'Nope', '538967', '0', 2, 'Gelderland'),
(3, 'Moerseweg', 'Hooge Zwaluwe', '4927SJ', 'Noord-Brabant', '42', '2', '3', '1894', 'rural', '150m2 or more', 'house', '2017-12-11', 'Yup', '588248', '0', 3, 'Noord_Brabant'),
(4, 'Bulten', 'Groenlo', '7141NC', 'Gelderland', '196', '5', '6', '1998', 'near sea', '250m2 or more', 'house', '2018-03-03', 'Nope', '586296', '0', 2, 'Gelderland'),
(6, 'Hein Burgersstraat', 'Deventer	', '7416CB', 'Overijssel	', '103	', '1', '3', '1976', 'near school', '250m2 or more', 'house', '2022-03-11', 'Nope', '482365', '0', 4, 'Overrijssel'),
(7, 'Duinkerker							', 'Landsmeer	', '1121JJ', 'Noord-Holland	', '175	', '2', '2', '1935', 'rural', '100m2 ore more', 'house	', '2019-11-22', 'Nope', '246582', '0', 5, 'Noord_Holland'),
(8, 'Het Roege Pad	', 'Groningen	', '9745DT', 'Groningen	', '135	', '4	', '5	', '1920	', 'near water', '100m2 ore more', 'Apartement	', '2019-12-13', 'Nope', '463061', '0', 6, 'Groningen	'),
(9, 'Holterveste									', '\'s-Hertogenbosch', '5221KJ', 'Noord-Brabant', '126	', '5', '5', '1964	', 'near water', '75m2 ore more', 'house	', '2021-05-21', 'Nope', '385959', '0', 3, 'Noord_Brabant'),
(10, 'J d Bosch Kemperplnts				', 'Coevorden	', '7741ZV', 'Drenthe	', '104	', '1', '2', '1991	', 'near sea', '150m2 ore more', 'apartement	', '2018-03-08', 'Nope', '583587', '0', 7, 'Drenthe'),
(11, 'Johan Pieter van den Brandestraat		', 'Middelburg	', '4336BB', 'Zeeland	', '120	', '5', '2', '1929', 'near water', '100m2 or more', 'apartement	', '2021-06-14', 'Nope', '292370', '0', 8, 'Zeeland	'),
(12, 'Broersblok				', 'Bergen op Zoom', '4613GT', 'Noord-Brabant', '158	', '4', '5', '1965	', 'near sea', '150m2 or more', 'house', '2019-04-09', 'Nope', '371553', '0', 3, 'Noord_Brabant'),
(13, 'Kluithoekweg	', 'Biggekerke	', '4373SG', 'Zeeland	', '183	', '1', '5', '1922	', 'near water', '100m2 or more', 'house	', '2018-05-28', 'Nope', '184991', '0', 8, 'Zeeland'),
(14, 'Terentiuslaan		', 'Utrecht	', '3584AR', 'Utrecht	', '85', '2', '3', '1966		', 'quiet area', '50m2 or more', 'house	', '2017-02-19', 'Nope', '535317', '0', 10, 'Utrecht	'),
(15, 'KipCurryLaan', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', 1, 'Limburg');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `all_provincies`
--

CREATE TABLE `all_provincies` (
  `ID` int(5) NOT NULL,
  `ProvincieID` int(2) NOT NULL,
  `Provincie_name` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `all_provincies`
--

INSERT INTO `all_provincies` (`ID`, `ProvincieID`, `Provincie_name`) VALUES
(1, 1, 'Limburg'),
(2, 2, 'Gelderland'),
(3, 3, 'Noord_Brabant'),
(4, 4, 'Overijssel'),
(5, 5, 'Noord_Holland'),
(6, 6, 'Groningen'),
(7, 7, 'Drenthe'),
(8, 8, 'Zeeland'),
(9, 9, 'Zuid_Holland'),
(10, 10, 'Utrecht');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`ID`);

--
-- Indexen voor tabel `all_houses`
--
ALTER TABLE `all_houses`
  ADD PRIMARY KEY (`ID`);

--
-- Indexen voor tabel `all_provincies`
--
ALTER TABLE `all_provincies`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT voor een tabel `all_houses`
--
ALTER TABLE `all_houses`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT voor een tabel `all_provincies`
--
ALTER TABLE `all_provincies`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
