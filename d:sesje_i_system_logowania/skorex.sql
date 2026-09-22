-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Paź 31, 2025 at 11:04 AM
-- Wersja serwera: 10.4.32-MariaDB
-- Wersja PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skorex`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `klient`
--

CREATE TABLE `klient` (
  `id_klienta` int(11) NOT NULL,
  `id_logowania` int(11) NOT NULL,
  `nazwisko` varchar(60) NOT NULL,
  `imie` varchar(40) NOT NULL,
  `kod_pocztowy` varchar(6) DEFAULT NULL,
  `miejscowosc` varchar(50) DEFAULT NULL,
  `ulica` varchar(50) DEFAULT NULL,
  `nr_domu` varchar(7) DEFAULT NULL,
  `PESEL` varchar(11) DEFAULT NULL,
  `telefon` varchar(12) DEFAULT NULL,
  `adres_e_mail` varchar(70) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Dumping data for table `klient`
--

INSERT INTO `klient` (`id_klienta`, `id_logowania`, `nazwisko`, `imie`, `kod_pocztowy`, `miejscowosc`, `ulica`, `nr_domu`, `PESEL`, `telefon`, `adres_e_mail`) VALUES
(1, 3, 'Kowalska', 'Anna', '50-345', 'Wrocław', 'Kwiatowa', '7', '07261111142', '600700800', 'ania@ezn.pl'),
(2, 4, 'Abacki', 'Adam', '51-501', 'Wrocław', 'Bajana', '8/4', '04311207222', '601701801', 'adam@ezn.pl'),
(3, 5, 'Boniek', 'Beata', '52-502', 'Wrocław', 'Lipowa', '7/6', '99050601123', '601222333', 'beata@lo16.pl'),
(4, 6, 'Cybuch', 'Cezary', '51-503', 'Wrocław', 'Bajana', '2/18', '96122309345', '601133222', 'czarek@t19.pl\r\n'),
(5, 7, 'Dobek', 'Dariusz', '52-503', 'Wrocław', 'Lipowa', '14/5', '02220288222', '601333444', 'darek@cku.pl\r\n'),
(6, 8, 'Ekiert', 'Edyta', '51-504', 'Wrocław', 'Bajana', '16/2', '01313055666', '601444333', 'edyta@ezn.pl'),
(7, 9, 'Figiel', 'Franciszek', '52-503', 'Wrocław', 'Lipowa', '12/7', '62121212121', '601555333', 'franek@bank.pl'),
(8, 10, 'Grygo', 'Grzegorz', '52-504', 'Wrocław', 'Klonowa', '5', '04232323233', '601555666', 'grzesiu@t19.pl'),
(9, 11, 'Hawrysz', 'Henryk', '52-504', 'Wrocław', 'Klonowa', '12', '08312511111', '601666555', 'henio@lo16.pl'),
(10, 12, 'Inglot', 'Iwona', '52-505', 'Wrocław', 'Sosnowa', '2', '01262677888', '601666111', 'iwona@cku.pl');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `logowanie`
--

CREATE TABLE `logowanie` (
  `id` int(11) NOT NULL,
  `login` varchar(30) NOT NULL,
  `haslo` varchar(30) NOT NULL,
  `regularny` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `logowanie`
--

INSERT INTO `logowanie` (`id`, `login`, `haslo`, `regularny`) VALUES
(1, 'admin', 'zaq1@WSX', 1),
(2, 'sekretariat', 'Sekretariat', 1),
(3, 'kowalska', 'Anna123', 0),
(4, 'abacki', 'Adam123', 0),
(5, 'boniek', 'Beata123', 0),
(6, 'dobek', 'Darek123', 0),
(8, 'ekiert', 'Edyta123', 0),
(9, 'figiel', 'Franek123', 0),
(10, 'grygo', 'Grzes123', 0),
(11, 'hawrysz', 'Heniek123', 0),
(12, 'inglot', 'Iwona123', 0);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `klient`
--
ALTER TABLE `klient`
  ADD PRIMARY KEY (`id_klienta`);

--
-- Indeksy dla tabeli `logowanie`
--
ALTER TABLE `logowanie`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `klient`
--
ALTER TABLE `klient`
  MODIFY `id_klienta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `logowanie`
--
ALTER TABLE `logowanie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
