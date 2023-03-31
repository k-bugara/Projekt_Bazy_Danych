-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 26 Sie 2020, 22:11
-- Wersja serwera: 10.4.10-MariaDB
-- Wersja PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `bug-trans`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ciezarowki`
--

CREATE TABLE `ciezarowki` (
  `id_ciezarowki` int(11) NOT NULL,
  `marka` varchar(20) NOT NULL,
  `model` varchar(20) NOT NULL,
  `nr_rejestracyjny` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `ciezarowki`
--

INSERT INTO `ciezarowki` (`id_ciezarowki`, `marka`, `model`, `nr_rejestracyjny`) VALUES
(1, 'IVECO', 'Acco', 'KNS 13214'),
(2, 'KAMAZ', '5320', 'KN 42151');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kierowcy`
--

CREATE TABLE `kierowcy` (
  `id_kierowcy` int(11) NOT NULL,
  `imie` varchar(20) NOT NULL,
  `nazwisko` varchar(20) NOT NULL,
  `id_ciezarowki` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `kierowcy`
--

INSERT INTO `kierowcy` (`id_kierowcy`, `imie`, `nazwisko`, `id_ciezarowki`) VALUES
(1, '', '', NULL),
(2, 'Jan', 'Kowalski', 2),
(3, 'Adam', 'Nowak', 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `konta`
--

CREATE TABLE `konta` (
  `id_konta` int(11) NOT NULL,
  `login` varchar(20) NOT NULL,
  `haslo` varchar(255) NOT NULL,
  `email` varchar(20) NOT NULL,
  `typ` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `konta`
--

INSERT INTO `konta` (`id_konta`, `login`, `haslo`, `email`, `typ`) VALUES
(11, 'admin', '$2y$12$vFnrfAmxU9d8sy6j3dUH4uJk3Nm.46eoMuUvoLW9XoslZ2ARz6nVe', 'admin@admin.com', 1),
(12, 'sklep', '$2y$12$z68bz4YsfjaBEhyt.xNnIecyhyUp.0zzgPIciFYfBF7JGEt.QWyyu', 'sklep@sklep.sklep', 0),
(13, 'sklepdwa', '$2y$12$RAptv2.oNSaDA4mV6i4byOTDhCecetc/4mbXNYVioD.xvB9SAXqI2', 'sklepdwa@sklepdwa.co', 0),
(14, 'sklep2', '$2y$12$sLYr5bZZ2owa/0v6o98xR.4204JhFV0IeSIH.5YbysfzR6BdCtY8W', 'sklep2@gmail.com', 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `sklepy`
--

CREATE TABLE `sklepy` (
  `id_sklepu` int(11) NOT NULL,
  `id_konta` int(11) NOT NULL,
  `nazwa` varchar(20) NOT NULL,
  `miasto` varchar(20) NOT NULL,
  `ulica` varchar(20) NOT NULL,
  `kod_pocztowy` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `sklepy`
--

INSERT INTO `sklepy` (`id_sklepu`, `id_konta`, `nazwa`, `miasto`, `ulica`, `kod_pocztowy`) VALUES
(1, 12, 'Biedronka', 'Nowy Sącz', '1 Brygady 4A', '30-300'),
(2, 12, 'Kaufland', 'Nowy Sącz', 'Bulwarowa', '30-300'),
(3, 14, 'asd', 'asd', 'asd', 'asd');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `statusy`
--

CREATE TABLE `statusy` (
  `id_statusu` int(11) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `statusy`
--

INSERT INTO `statusy` (`id_statusu`, `status`) VALUES
(1, 'Oczekujące'),
(2, 'W trakcie realizacji'),
(3, 'Zrealizowane');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zamowienia`
--

CREATE TABLE `zamowienia` (
  `id_zamowienia` int(11) NOT NULL,
  `id_sklepu` int(11) NOT NULL,
  `id_statusu` int(11) NOT NULL DEFAULT 1,
  `id_kierowcy` int(11) DEFAULT 1,
  `id_zestawu` int(11) NOT NULL,
  `data` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `zamowienia`
--

INSERT INTO `zamowienia` (`id_zamowienia`, `id_sklepu`, `id_statusu`, `id_kierowcy`, `id_zestawu`, `data`) VALUES
(7, 1, 2, 3, 2, '2020-08-25 08:46:01'),
(8, 1, 3, 2, 2, '2020-08-25 08:46:07'),
(9, 1, 3, 2, 2, '2020-08-25 08:47:48'),
(10, 1, 1, 1, 2, '2020-08-25 08:48:55'),
(11, 3, 1, 1, 1, '2020-08-25 19:43:01');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zestawy`
--

CREATE TABLE `zestawy` (
  `id_zestawu` int(11) NOT NULL,
  `zestaw` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `zestawy`
--

INSERT INTO `zestawy` (`id_zestawu`, `zestaw`) VALUES
(1, 'Zestaw nr 1'),
(2, 'Zestaw nr 2'),
(3, 'Zestaw nr 3');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `ciezarowki`
--
ALTER TABLE `ciezarowki`
  ADD PRIMARY KEY (`id_ciezarowki`);

--
-- Indeksy dla tabeli `kierowcy`
--
ALTER TABLE `kierowcy`
  ADD PRIMARY KEY (`id_kierowcy`),
  ADD KEY `id_ciezarowki` (`id_ciezarowki`);

--
-- Indeksy dla tabeli `konta`
--
ALTER TABLE `konta`
  ADD PRIMARY KEY (`id_konta`);

--
-- Indeksy dla tabeli `sklepy`
--
ALTER TABLE `sklepy`
  ADD PRIMARY KEY (`id_sklepu`),
  ADD KEY `id_konta` (`id_konta`);

--
-- Indeksy dla tabeli `statusy`
--
ALTER TABLE `statusy`
  ADD PRIMARY KEY (`id_statusu`);

--
-- Indeksy dla tabeli `zamowienia`
--
ALTER TABLE `zamowienia`
  ADD PRIMARY KEY (`id_zamowienia`),
  ADD KEY `id_sklepu` (`id_sklepu`),
  ADD KEY `id_statusu` (`id_statusu`),
  ADD KEY `id_kierowcy` (`id_kierowcy`),
  ADD KEY `id_zestawu` (`id_zestawu`);

--
-- Indeksy dla tabeli `zestawy`
--
ALTER TABLE `zestawy`
  ADD PRIMARY KEY (`id_zestawu`);

--
-- AUTO_INCREMENT dla tabel zrzutów
--

--
-- AUTO_INCREMENT dla tabeli `ciezarowki`
--
ALTER TABLE `ciezarowki`
  MODIFY `id_ciezarowki` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `kierowcy`
--
ALTER TABLE `kierowcy`
  MODIFY `id_kierowcy` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `konta`
--
ALTER TABLE `konta`
  MODIFY `id_konta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT dla tabeli `sklepy`
--
ALTER TABLE `sklepy`
  MODIFY `id_sklepu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `statusy`
--
ALTER TABLE `statusy`
  MODIFY `id_statusu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `zamowienia`
--
ALTER TABLE `zamowienia`
  MODIFY `id_zamowienia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT dla tabeli `zestawy`
--
ALTER TABLE `zestawy`
  MODIFY `id_zestawu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `kierowcy`
--
ALTER TABLE `kierowcy`
  ADD CONSTRAINT `kierowcy_ibfk_1` FOREIGN KEY (`id_ciezarowki`) REFERENCES `ciezarowki` (`id_ciezarowki`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ograniczenia dla tabeli `sklepy`
--
ALTER TABLE `sklepy`
  ADD CONSTRAINT `sklepy_ibfk_1` FOREIGN KEY (`id_konta`) REFERENCES `konta` (`id_konta`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ograniczenia dla tabeli `zamowienia`
--
ALTER TABLE `zamowienia`
  ADD CONSTRAINT `zamowienia_ibfk_1` FOREIGN KEY (`id_sklepu`) REFERENCES `sklepy` (`id_sklepu`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `zamowienia_ibfk_2` FOREIGN KEY (`id_zestawu`) REFERENCES `zestawy` (`id_zestawu`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `zamowienia_ibfk_3` FOREIGN KEY (`id_kierowcy`) REFERENCES `kierowcy` (`id_kierowcy`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `zamowienia_ibfk_4` FOREIGN KEY (`id_statusu`) REFERENCES `statusy` (`id_statusu`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
