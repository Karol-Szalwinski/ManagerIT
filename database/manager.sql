-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Czas wygenerowania: 18 Lut 2018, 14:25
-- Wersja serwera: 5.5.55-0ubuntu0.14.04.1
-- Wersja PHP: 5.5.9-1ubuntu4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Baza danych: `manager`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `application`
--

CREATE TABLE IF NOT EXISTS `application` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `licenseType` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `developer` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `webpage` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci,
  `addDate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Zrzut danych tabeli `application`
--

INSERT INTO `application` (`id`, `name`, `type`, `licenseType`, `developer`, `webpage`, `description`, `addDate`) VALUES
(1, 'Chrome', 'office', 'free', 'Google', 'chrome.pl', 'Przeglądarka na wypasie', '2017-09-03 00:00:00'),
(2, 'Opera', 'webbrowser', 'free', 'Opera', 'opera.pl', 'Przeglądarka na wypasie też', '2017-09-03 00:00:00'),
(3, 'Killer 450', 'office', 'spokod z dupy', 'Kill Soft', 'www.kill.pl', 'Program, zę hej\r\njek\r\njkd,\r\nddd\r\ni lipa!!!!!!!!!!!!!!!!!!!!!!!!\r\n!!!', '2017-09-07 14:23:03'),
(4, 'Linux', 'os', 'free', 'Ubuntu', 'ubuntu.pl', 'System operacyjny', '2017-09-07 15:12:28'),
(5, 'Thunderbird', 'office', 'Free', 'Mozilla', 'www.mozilla.pl', 'Program pocztowy', '2017-11-08 13:53:21'),
(6, 'Adobe Acrobat', 'os', 'free', 'Adobe', 'adobe', NULL, '2018-02-13 10:52:45'),
(7, 'Stacja Allegro Darsoft', 'office', 'Umowa', 'Darsoft.pl', 'darsoft.pl', 'Program biurowy', '2018-02-13 14:23:00');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `computer`
--

CREATE TABLE IF NOT EXISTS `computer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `computercpu_id` int(11) DEFAULT NULL,
  `computerformfactor_id` int(11) DEFAULT NULL,
  `computeros_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `formFactor` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `brand` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `series` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ipAddress` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `macAddress` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` double NOT NULL,
  `purchaseDate` datetime DEFAULT NULL,
  `addDate` datetime NOT NULL,
  `battery` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `screenSize` double DEFAULT NULL,
  `screenType` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `powersupply_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_A298A7A6ACDB8124` (`computercpu_id`),
  KEY `IDX_A298A7A6529427D2` (`computerformfactor_id`),
  KEY `IDX_A298A7A67D207878` (`computeros_id`),
  KEY `IDX_A298A7A6889B163B` (`powersupply_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=16 ;

--
-- Zrzut danych tabeli `computer`
--

INSERT INTO `computer` (`id`, `computercpu_id`, `computerformfactor_id`, `computeros_id`, `name`, `model`, `formFactor`, `brand`, `series`, `ipAddress`, `macAddress`, `price`, `purchaseDate`, `addDate`, `battery`, `screenSize`, `screenType`, `powersupply_id`) VALUES
(1, 2, 2, 2, 'Komp testowy 3', 'dell optiplex', 'desktop', 'dell', 'optiplex', '192.168.2.3', 'aa:aa:aa:aa:ff:ac', 2000.34, '2017-06-20 00:00:00', '2017-06-22 00:00:00', NULL, NULL, NULL, 1),
(2, 5, 3, 2, 'Komp testowy 1', 'dell optiplex', 'desktop', 'dell', 'optiplex', '192.168.2.3', 'aa:aa:aa:aa:ff:ac', 2000.34, '2017-06-20 00:00:00', '2017-06-22 00:00:00', NULL, NULL, NULL, NULL),
(3, 2, 3, 2, 'Komp testowy', 'dell optiplex', 'laptop', 'dell', 'optiplex', '192.168.2.3', 'aa:aa:aa:aa:ff:ac', 2000.34, '2017-06-20 00:00:00', '2017-06-22 00:00:00', NULL, NULL, NULL, 1),
(4, 3, 4, 2, 'Komp testowy 2', 'model s', 'desktop', 'dell', 'seria a', '192.122.212.122', 'aa:bb:23:32:23:33', 1000, '2017-06-19 00:00:00', '2017-06-13 23:28:16', NULL, NULL, NULL, NULL),
(7, NULL, 2, 1, 'OPTIPLEX 7030', 'OPTIPLEX', 'desktop', 'dell', '7030', '192.168.4.3', 'aa:bb:23:32:23:33', 2500, '2017-06-26 00:00:00', '2017-06-16 20:12:27', NULL, NULL, NULL, NULL),
(8, NULL, 2, 1, 'Komputer 133', 'Optiplex', 'desktop', 'DELL', '7030', '192.122.212.123', 'aa:bb:23:32:23:33', 1223, '2017-06-12 00:00:00', '2017-06-16 23:14:47', NULL, NULL, NULL, NULL),
(9, 1, 2, 1, 'Z_SR_BIURO', 'OPTIPLEX', 'desktop', 'DELL', '9010', '192.122.212.122', 'aa:bb:23:32:23:33', 123789, '2017-06-20 00:00:00', '2017-06-17 18:56:35', NULL, NULL, NULL, NULL),
(10, 3, NULL, 1, 'LAP-OFFICE', 'INTERNOS', 'laptop', 'DELL', '344', '192.168.3.4', 'ee:ss:ss:dd:sd:cc', 1400, '2017-06-18 00:00:00', '2017-06-18 16:13:04', 'ROAD34', 19, 'led', NULL),
(11, 3, 2, 1, 'Komp', 'jj', 'desktop', 'jj', 'j', NULL, NULL, 1225, '2017-09-26 00:00:00', '2017-09-26 16:46:09', NULL, NULL, NULL, NULL),
(12, NULL, 2, 1, 'ffddfdfdffd', 'fd', 'desktop', 'ff', 'f', NULL, NULL, 233, '2017-09-26 00:00:00', '2017-09-26 16:56:27', NULL, NULL, NULL, NULL),
(13, NULL, 3, 2, 'D-103-S-119', 'SXYU', 'desktop', 'DELL', 'sddd', NULL, NULL, 100, '2017-11-08 00:00:00', '2017-11-08 16:24:16', NULL, NULL, NULL, NULL),
(14, 6, 2, 1, 'Pendros', 'Optiplex 1030', 'desktop', 'DELL', '343443', NULL, NULL, 1000, '2018-02-13 00:00:00', '2018-02-13 10:55:36', NULL, NULL, NULL, 1),
(15, NULL, 2, 2, 'D-103-MAG', 'OPTIPLEX 309', 'desktop', 'DELL', 'fdfdf-d-df-fd-', NULL, NULL, 1234, '2018-02-20 00:00:00', '2018-02-14 17:23:40', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `computers_licenses`
--

CREATE TABLE IF NOT EXISTS `computers_licenses` (
  `computer_id` int(11) NOT NULL,
  `license_id` int(11) NOT NULL,
  PRIMARY KEY (`computer_id`,`license_id`),
  KEY `IDX_41DDF0ACA426D518` (`computer_id`),
  KEY `IDX_41DDF0AC460F904B` (`license_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `computers_licenses`
--

INSERT INTO `computers_licenses` (`computer_id`, `license_id`) VALUES
(2, 4),
(3, 2),
(4, 5),
(11, 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `computers_pictures`
--

CREATE TABLE IF NOT EXISTS `computers_pictures` (
  `computer_id` int(11) NOT NULL,
  `picture_id` int(11) NOT NULL,
  PRIMARY KEY (`computer_id`,`picture_id`),
  KEY `IDX_B193D053A426D518` (`computer_id`),
  KEY `IDX_B193D053EE45BDBF` (`picture_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `computers_pictures`
--

INSERT INTO `computers_pictures` (`computer_id`, `picture_id`) VALUES
(2, 15),
(2, 16),
(3, 29),
(4, 18),
(10, 19),
(11, 21),
(12, 22);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `computer_form_factor`
--

CREATE TABLE IF NOT EXISTS `computer_form_factor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `seria` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `brand` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dedicatedForModel` smallint(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Zrzut danych tabeli `computer_form_factor`
--

INSERT INTO `computer_form_factor` (`id`, `name`, `model`, `seria`, `brand`, `dedicatedForModel`) VALUES
(2, 'Mini tower', 'Optiplex', '7XX', 'DELL', 0),
(3, 'Big Tower', 'Silent', '800', 'Be Quiet!', 1),
(4, 'SFF', 'Optiplex', '7XX', 'DELL', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `cpmputers_pictures`
--

CREATE TABLE IF NOT EXISTS `cpmputers_pictures` (
  `computer_id` int(11) NOT NULL,
  `picture_id` int(11) NOT NULL,
  PRIMARY KEY (`computer_id`,`picture_id`),
  KEY `IDX_60407AFBA426D518` (`computer_id`),
  KEY `IDX_60407AFBEE45BDBF` (`picture_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `departament`
--

CREATE TABLE IF NOT EXISTS `departament` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `addDate` datetime NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Zrzut danych tabeli `departament`
--

INSERT INTO `departament` (`id`, `addDate`, `name`) VALUES
(1, '2017-02-09 00:00:00', 'Dział Handlowy'),
(2, '2017-02-22 15:12:30', 'Dział IT'),
(3, '2017-02-22 15:20:36', 'Biuro'),
(4, '2017-02-24 12:43:02', 'Dział Niczego');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `desktop`
--

CREATE TABLE IF NOT EXISTS `desktop` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `manufacturer` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `powerSupply` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ipAddress` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `macAddress` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `purchaseDate` datetime NOT NULL,
  `addDate` datetime NOT NULL,
  `desktopcpu_id` int(11) DEFAULT NULL,
  `desktopformfactor_id` int(11) DEFAULT NULL,
  `desktopos_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_96105A4C5B70775` (`desktopcpu_id`),
  KEY `IDX_96105A453310D1` (`desktopformfactor_id`),
  KEY `IDX_96105A41764D7EB` (`desktopos_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=17 ;

--
-- Zrzut danych tabeli `desktop`
--

INSERT INTO `desktop` (`id`, `name`, `model`, `type`, `manufacturer`, `powerSupply`, `ipAddress`, `macAddress`, `price`, `purchaseDate`, `addDate`, `desktopcpu_id`, `desktopformfactor_id`, `desktopos_id`) VALUES
(12, 'OPTIPLEX 703', 'OPTIPLEX 55', '7010', 'DELL', '300', '123.344.3434.3', 'a2:22:33:33:ab:45', '12222', '2017-05-24 00:00:00', '2017-05-12 16:15:00', 3, 2, 1),
(13, 'MSI POWER', 'GE72 Titan', 'TITAN', 'MSI', '300', '192.122.212.122', 'aa:bb:23:32:23:33', '4334', '2017-05-09 00:00:00', '2017-05-15 22:24:58', 3, 3, 1),
(14, 'OPTIPLEXTRON', 'OPTIPLEX', '455', 'DELL', '300', '192.168.2.44', 'ab:01:20:12:12:12', '1234', '2017-05-31 00:00:00', '2017-05-16 14:11:38', 3, 3, 1),
(15, 'MSI DRAGON FORCE', 'DRAGON FORCE', '987', 'MSI', '344', '192.168.2.44', 'a2:22:33:33:ab:45', '1233', '2017-05-02 00:00:00', '2017-05-23 13:54:45', 1, 3, 1),
(16, 'OPTIPLEX 7030 ROBOCZY', 'OPTIPLEX 7030', '7030', 'DELL', '345', '123.344.3434.3', '1212', '4566', '2017-05-23 00:00:00', '2017-05-24 16:34:59', 3, 3, 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `desktops_licenses`
--

CREATE TABLE IF NOT EXISTS `desktops_licenses` (
  `desktop_id` int(11) NOT NULL,
  `license_id` int(11) NOT NULL,
  PRIMARY KEY (`desktop_id`,`license_id`),
  KEY `IDX_2AF2020EFFF2950E` (`desktop_id`),
  KEY `IDX_2AF2020E460F904B` (`license_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `desktops_licenses`
--

INSERT INTO `desktops_licenses` (`desktop_id`, `license_id`) VALUES
(12, 1),
(13, 2),
(14, 2),
(14, 3),
(15, 3);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `desktops_pictures`
--

CREATE TABLE IF NOT EXISTS `desktops_pictures` (
  `desktop_id` int(11) NOT NULL,
  `picture_id` int(11) NOT NULL,
  PRIMARY KEY (`desktop_id`,`picture_id`),
  KEY `IDX_DABC22F1FFF2950E` (`desktop_id`),
  KEY `IDX_DABC22F1EE45BDBF` (`picture_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `desktop_c_p_u`
--

CREATE TABLE IF NOT EXISTS `desktop_c_p_u` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Manufacturer` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `baseFrequency` double NOT NULL,
  `maxTurboFrequency` double DEFAULT NULL,
  `numberOfCores` smallint(6) NOT NULL,
  `numberOfThreads` smallint(6) NOT NULL,
  `casheMB` double NOT NULL,
  `TDP` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `GPU` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `LithographyNM` smallint(6) NOT NULL,
  `launchDate` date DEFAULT NULL,
  `sockets` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `generation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Zrzut danych tabeli `desktop_c_p_u`
--

INSERT INTO `desktop_c_p_u` (`id`, `name`, `Manufacturer`, `baseFrequency`, `maxTurboFrequency`, `numberOfCores`, `numberOfThreads`, `casheMB`, `TDP`, `GPU`, `LithographyNM`, `launchDate`, `sockets`, `generation`) VALUES
(1, 'Core™2 Duo Processor E8200', 'Intel', 2.66, 2.66, 2, 2, 6, '65', NULL, 45, '2008-01-01', 'LGA 775', 'Wolfdale'),
(2, 'Core™ i7-4770K Processor', 'Intel', 3.5, 3.9, 4, 8, 8, '84', 'Intel® HD Graphics 4600', 22, '2013-01-04', 'LGA 1150', 'Haswell'),
(3, 'CORE™ i7-7920HQ', 'Intel', 3.1, 4.1, 4, 8, 8, '45', 'Intel® HD Graphics 630', 14, '2017-01-01', 'brak', 'Siódma generacja'),
(4, 'AMD Ryzen 7 1700X, 3,4 GHz AM4', 'AMD', 3.4, 3.8, 8, 16, 20, '95', NULL, 14, '2017-01-01', 'AM4', 'Ryzen 7'),
(5, 'INTEL® CORE™ i3-7320', 'Intel', 4.1, 4.1, 2, 3, 4, '51', 'tak', 14, '2017-01-01', 'FCLGA1151', 'generacja  7'),
(6, 'E8700', 'Intel', 5.65, 7.56, 6, 12, 6, '34', 'brak', 45, '2018-11-22', 'LGA 1050', 'Wolfdale');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `desktop_desktopram`
--

CREATE TABLE IF NOT EXISTS `desktop_desktopram` (
  `desktop_id` int(11) NOT NULL,
  `desktopram_id` int(11) NOT NULL,
  PRIMARY KEY (`desktop_id`,`desktopram_id`),
  KEY `IDX_EEF30E2BFFF2950E` (`desktop_id`),
  KEY `IDX_EEF30E2BC5101709` (`desktopram_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `desktop_ram`
--

CREATE TABLE IF NOT EXISTS `desktop_ram` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `series` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `brand` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `capacity` double NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `busSpeed` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `casLatency` int(11) DEFAULT NULL,
  `numberOfPins` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Zrzut danych tabeli `desktop_ram`
--

INSERT INTO `desktop_ram` (`id`, `name`, `model`, `series`, `brand`, `capacity`, `type`, `busSpeed`, `casLatency`, `numberOfPins`) VALUES
(1, 'Ballistix Elite 8GB Single DDR4 3000 MT/s (PC4-24000) DIMM 288-Pin Memory', 'BLE8G4D30AEEA', 'Elite', 'Ballistix ', 8, 'DDR4 DIMM', 'PC4-24000', 15, 288),
(2, 'RAm testowy', 'HP', 'złom', 'HP', 4, 'DDR4', '233', 32, 254),
(3, 'testowy ram', '123', '22', 'HP', 2, 'DDR4', '1234', 12, 255),
(4, 'PAMIĘĆ RAM 16 GB DDR3 GOODRAM PLAY CL 10', 'GYS1866D364L10/16GDC', 'PLAY', 'GOODRAM', 16, 'DDR3', '1866 MHz', 10, 230);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `document`
--

CREATE TABLE IF NOT EXISTS `document` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `computer_id` int(11) DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sellerName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sellerPhoneNumber` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `purchaseDate` datetime NOT NULL,
  `addDate` datetime NOT NULL,
  `tablet_id` int(11) DEFAULT NULL,
  `phone_id` int(11) DEFAULT NULL,
  `subject` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `printer_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_D8698A76A426D518` (`computer_id`),
  KEY `IDX_D8698A761897676B` (`tablet_id`),
  KEY `IDX_D8698A763B7323CB` (`phone_id`),
  KEY `IDX_D8698A7646EC494A` (`printer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=24 ;

--
-- Zrzut danych tabeli `document`
--

INSERT INTO `document` (`id`, `computer_id`, `type`, `number`, `sellerName`, `sellerPhoneNumber`, `price`, `purchaseDate`, `addDate`, `tablet_id`, `phone_id`, `subject`, `printer_id`) VALUES
(1, 10, 'faktura', '344', 'IT BRAINs', '343 434 43', '3233', '2017-08-16 00:00:00', '2017-08-09 00:00:00', NULL, NULL, '', NULL),
(5, 4, 'Faktura', '33', 'MAST', '3334434', '333', '2017-08-29 00:00:00', '2017-08-14 17:02:05', NULL, NULL, '', NULL),
(6, 2, 'Faktura', '33', 'MAST', '53234523552452', '3344', '2017-08-28 00:00:00', '2017-08-14 17:13:46', NULL, NULL, '', NULL),
(7, 2, 'Faktura', 'rrr', 'ffdf', '3333', '333', '2017-08-22 00:00:00', '2017-08-15 09:10:47', NULL, NULL, '', NULL),
(8, 1, 'Faktura', '33', 'vfdf', '333333', '332', '2017-08-28 00:00:00', '2017-08-15 09:28:59', NULL, NULL, '', NULL),
(9, 13, 'fsd', 'fs', 'dfs', '3434', '222', '2017-11-27 00:00:00', '2017-11-15 23:15:54', NULL, NULL, '', NULL),
(10, 14, 'Faktura', '123/22', 'Polmos', '344 323 322', '1200', '2018-02-12 00:00:00', '2018-02-13 11:00:04', NULL, NULL, '', NULL),
(11, 12, 'Faktura', '123/22', 'asd', '324324234342', '123', '2018-02-13 00:00:00', '2018-02-14 13:16:27', NULL, NULL, '', NULL),
(13, 11, 'Faktura', '33', 'Janols', '343443', '3434', '2018-02-19 00:00:00', '2018-02-14 13:47:56', NULL, NULL, '', NULL),
(14, 12, 'Paragon', '3434', 'Jurta', '334-344-433', '34', '2018-02-26 00:00:00', '2018-02-14 13:54:59', NULL, NULL, '', NULL),
(15, NULL, 'Paragon', '3434', 'Kolos', '3434', '4343', '2018-02-28 00:00:00', '2018-02-14 15:45:51', 2, NULL, '', NULL),
(16, 15, 'Faktura', '345/444/d', 'Polcomh', '43334344', '344', '2018-02-26 00:00:00', '2018-02-14 17:36:58', NULL, NULL, '', NULL),
(17, NULL, 'Faktura', '123/444', 'Polik', '343-344-3443', '2344', '2018-02-19 00:00:00', '2018-02-14 17:54:10', NULL, 1, 'Naprawa', NULL),
(18, NULL, 'eef', 'eee', 'ee', 'eee', '444', '2018-02-26 00:00:00', '2018-02-14 17:56:30', 3, NULL, '', NULL),
(20, NULL, 'Paragon', '345/334/2015', 'Polk', '343-35-53', '323', '2018-02-12 00:00:00', '2018-02-14 18:00:06', 3, NULL, '', NULL),
(21, NULL, 'dff', 'fdfd', 'dfdf', 'dfdf', '454', '2018-02-26 00:00:00', '2018-02-14 18:06:56', NULL, 1, '', NULL),
(22, NULL, 'Faktura', '3433', 'MAST', '34343', '344', '2018-02-12 00:00:00', '2018-02-14 18:30:35', NULL, 1, 'Zakup', NULL),
(23, NULL, 'Faktura', '4343', 'dffsd', '43343443', '34', '2018-02-26 00:00:00', '2018-02-15 13:55:32', NULL, NULL, 'Naprawa', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `documents_pdfs`
--

CREATE TABLE IF NOT EXISTS `documents_pdfs` (
  `document_id` int(11) NOT NULL,
  `pdf_id` int(11) NOT NULL,
  PRIMARY KEY (`document_id`,`pdf_id`),
  KEY `IDX_BBE433FFC33F7837` (`document_id`),
  KEY `IDX_BBE433FF511FC912` (`pdf_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `documents_pdfs`
--

INSERT INTO `documents_pdfs` (`document_id`, `pdf_id`) VALUES
(5, 7),
(5, 8),
(8, 6),
(8, 9),
(9, 15),
(14, 10),
(16, 13),
(18, 16),
(22, 17);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `departament_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sex` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `job` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_5D9F75A148B3EEE4` (`departament_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Zrzut danych tabeli `employee`
--

INSERT INTO `employee` (`id`, `departament_id`, `name`, `surname`, `sex`, `phone`, `email`, `job`) VALUES
(4, 1, 'Janina Julia', 'Pilko', 'Female', '123 334 444', 'julka@wp.pl', 'Analityczka IT'),
(5, 2, 'Anna', 'Polska', 'Female', '7898 8997 99', 'anna@wp.pl', 'Kierownik IT'),
(6, 2, 'Iwona', 'Latoks', 'Female', '789-788-888', 'iwona@op.pl', 'Konsultant techniczny'),
(8, 2, 'Dominik', 'Budzeń', 'Male', '345-233-223', 'budzen@stal-car.pl', 'Informatyk');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `employees_computers`
--

CREATE TABLE IF NOT EXISTS `employees_computers` (
  `computer_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  PRIMARY KEY (`computer_id`,`employee_id`),
  KEY `IDX_7DD45DA8A426D518` (`computer_id`),
  KEY `IDX_7DD45DA88C03F15C` (`employee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `employees_computers`
--

INSERT INTO `employees_computers` (`computer_id`, `employee_id`) VALUES
(1, 6);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `employees_desktops`
--

CREATE TABLE IF NOT EXISTS `employees_desktops` (
  `employee_id` int(11) NOT NULL,
  `desktop_id` int(11) NOT NULL,
  PRIMARY KEY (`desktop_id`,`employee_id`),
  KEY `IDX_B48D07838C03F15C` (`employee_id`),
  KEY `IDX_B48D0783FFF2950E` (`desktop_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `employees_desktops`
--

INSERT INTO `employees_desktops` (`employee_id`, `desktop_id`) VALUES
(4, 12),
(4, 13),
(4, 14),
(5, 14),
(5, 15),
(6, 12),
(6, 13);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `employees_laptops`
--

CREATE TABLE IF NOT EXISTS `employees_laptops` (
  `employee_id` int(11) NOT NULL,
  `laptop_id` int(11) NOT NULL,
  PRIMARY KEY (`laptop_id`,`employee_id`),
  KEY `IDX_2A57E6748C03F15C` (`employee_id`),
  KEY `IDX_2A57E674D59905E5` (`laptop_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `employees_laptops`
--

INSERT INTO `employees_laptops` (`employee_id`, `laptop_id`) VALUES
(4, 1),
(5, 1),
(5, 4),
(6, 2),
(6, 4);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `employees_licenses`
--

CREATE TABLE IF NOT EXISTS `employees_licenses` (
  `employee_id` int(11) NOT NULL,
  `license_id` int(11) NOT NULL,
  PRIMARY KEY (`employee_id`,`license_id`),
  KEY `IDX_103C1438C03F15C` (`employee_id`),
  KEY `IDX_103C143460F904B` (`license_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `employees_phones`
--

CREATE TABLE IF NOT EXISTS `employees_phones` (
  `phone_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  PRIMARY KEY (`phone_id`,`employee_id`),
  KEY `IDX_348EE8603B7323CB` (`phone_id`),
  KEY `IDX_348EE8608C03F15C` (`employee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `employees_printers`
--

CREATE TABLE IF NOT EXISTS `employees_printers` (
  `printer_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  PRIMARY KEY (`printer_id`,`employee_id`),
  KEY `IDX_BB09D3CB46EC494A` (`printer_id`),
  KEY `IDX_BB09D3CB8C03F15C` (`employee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `employees_printers`
--

INSERT INTO `employees_printers` (`printer_id`, `employee_id`) VALUES
(1, 4),
(1, 6),
(1, 8),
(3, 4);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `employees_tablets`
--

CREATE TABLE IF NOT EXISTS `employees_tablets` (
  `tablet_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  PRIMARY KEY (`tablet_id`,`employee_id`),
  KEY `IDX_9810CF9D1897676B` (`tablet_id`),
  KEY `IDX_9810CF9D8C03F15C` (`employee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `employees_tablets`
--

INSERT INTO `employees_tablets` (`tablet_id`, `employee_id`) VALUES
(1, 5),
(2, 8),
(3, 8);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `fos_user`
--

CREATE TABLE IF NOT EXISTS `fos_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `confirmation_token` varchar(180) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_957A647992FC23A8` (`username_canonical`),
  UNIQUE KEY `UNIQ_957A6479A0D96FBF` (`email_canonical`),
  UNIQUE KEY `UNIQ_957A6479C05FB297` (`confirmation_token`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Zrzut danych tabeli `fos_user`
--

INSERT INTO `fos_user` (`id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `confirmation_token`, `password_requested_at`, `roles`) VALUES
(1, 'admin', 'admin', 'admin@admin.pl', 'admin@admin.pl', 1, NULL, '$2y$13$aNeuhUOwF6hOh/bRw.obyuNXUXgEZJhQ0N.ad3Ateu8xXihC.G/ha', '2018-02-16 13:42:03', NULL, NULL, 'a:1:{i:0;s:10:"ROLE_ADMIN";}'),
(2, 'Jan', 'jan', 'jam@jam.pl', 'jam@jam.pl', 1, NULL, '$2y$13$3Q4mM5Jso/PLHjDdXszBCOFDPhDHMxcGjHxVPD/GYhTrIGGIoJDUa', '2018-02-16 13:41:24', NULL, NULL, 'a:1:{i:0;s:9:"ROLE_BOSS";}'),
(3, 'ada', 'ada', 'ada@stal-car.pl', 'ada@stal-car.pl', 1, NULL, '$2y$13$aNeuhUOwF6hOh/bRw.obyuNXUXgEZJhQ0N.ad3Ateu8xXihC.G/ha', '2018-02-14 20:15:29', NULL, NULL, 'a:1:{i:0;s:10:"ROLE_ADMIN";}'),
(4, 'john', 'john', 'john@wp.pl', 'john@wp.pl', 1, NULL, '$2y$13$V8I9DhR6bGJiWr48INPn2uRNqN.EpFccp6i6HyihwmtF/e.4TWpQS', '2018-02-16 11:07:51', NULL, NULL, 'a:0:{}');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `gpu`
--

CREATE TABLE IF NOT EXISTS `gpu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `chipset` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `series` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `brand` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `memorySize` int(11) NOT NULL,
  `memoryType` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `compatiableSlot` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cooling` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `monitorConnectors` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `powerConnectors` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `formFactor` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Zrzut danych tabeli `gpu`
--

INSERT INTO `gpu` (`id`, `name`, `chipset`, `series`, `brand`, `memorySize`, `memoryType`, `compatiableSlot`, `cooling`, `monitorConnectors`, `powerConnectors`, `formFactor`) VALUES
(1, 'ASUS Radeon RX 460 2GB DUAL GAMING', 'RX 460', 'Gaming', 'ASUS', 2048, 'DDR5', 'PCI-Express x16', 'Aktywne', 'HDMI, DVI', 'nie', 'karta desktopowa'),
(2, 'MSI GTX 960 2GB GLOBAL', 'GTX 960', 'GTX 960 2GB GLOBAL', 'MSI', 2048, 'DDR5', 'PCI Express x16', 'Aktywne', 'HDMI ', 'PCIe 6 + 8 pin', 'karta  pci desktop');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `hdd`
--

CREATE TABLE IF NOT EXISTS `hdd` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `series` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `brand` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `capacity` int(11) NOT NULL,
  `formFactor` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `interface` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rotationSpeedRpm` int(11) NOT NULL,
  `cache` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Zrzut danych tabeli `hdd`
--

INSERT INTO `hdd` (`id`, `name`, `model`, `series`, `brand`, `capacity`, `formFactor`, `interface`, `rotationSpeedRpm`, `cache`) VALUES
(1, 'Seagate IronWolf 1TB', 'ST1000VN002', 'IronWolf', 'Seagate', 1000, '3.5', 'SATA III', 7200, 64),
(2, 'Seagate IronWolf 1TB', 'ST1000VN002', 'IronWolf', 'Seagate', 2048, '3,5"', 'SATA III', 7200, 64),
(3, 'Western Digital WD Red 1 TB WD10JFCX', 'WD10JFCX', 'Red', 'WD', 1024, '3,5"', 'SATA III', 7200, 16);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `installed_application`
--

CREATE TABLE IF NOT EXISTS `installed_application` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `version` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `application_id` int(11) DEFAULT NULL,
  `computer_id` int(11) DEFAULT NULL,
  `license_id` int(11) DEFAULT NULL,
  `installation_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_9D4D2E383E030ACD` (`application_id`),
  KEY `IDX_9D4D2E38A426D518` (`computer_id`),
  KEY `IDX_9D4D2E38460F904B` (`license_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=23 ;

--
-- Zrzut danych tabeli `installed_application`
--

INSERT INTO `installed_application` (`id`, `version`, `application_id`, `computer_id`, `license_id`, `installation_date`) VALUES
(2, NULL, 1, 13, NULL, NULL),
(3, NULL, 2, 13, NULL, NULL),
(4, NULL, 4, 13, NULL, NULL),
(5, NULL, 6, 12, 4, NULL),
(6, NULL, 4, 12, NULL, NULL),
(7, NULL, 4, 14, NULL, NULL),
(9, NULL, 4, 1, NULL, NULL),
(10, NULL, 4, 1, NULL, NULL),
(11, NULL, 3, 11, NULL, NULL),
(12, NULL, 6, 11, NULL, NULL),
(13, NULL, 5, 11, 2, NULL),
(14, NULL, 1, 12, 3, NULL),
(15, NULL, 3, 12, 6, NULL),
(16, NULL, 5, 12, 2, NULL),
(17, NULL, 4, 12, NULL, NULL),
(18, NULL, 7, 11, 8, NULL),
(19, NULL, 3, 7, NULL, NULL),
(20, NULL, 4, 7, NULL, NULL),
(21, NULL, 7, 7, 8, NULL),
(22, NULL, 7, 14, 8, '2018-02-13 15:21:43');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `interface_pci`
--

CREATE TABLE IF NOT EXISTS `interface_pci` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `computer_id` int(11) DEFAULT NULL,
  `cardGpu_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_B9C7D1ACA426D518` (`computer_id`),
  KEY `IDX_B9C7D1AC2DA02A6E` (`cardGpu_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Zrzut danych tabeli `interface_pci`
--

INSERT INTO `interface_pci` (`id`, `computer_id`, `cardGpu_id`) VALUES
(1, 14, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `laptop`
--

CREATE TABLE IF NOT EXISTS `laptop` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `manufacturer` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cpu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ram` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hdd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ssd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `drive` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `powerSupply` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `battery` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `screen` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `os` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ipAddress` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `macAddress` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `purchaseDate` datetime NOT NULL,
  `addDate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Zrzut danych tabeli `laptop`
--

INSERT INTO `laptop` (`id`, `name`, `model`, `type`, `manufacturer`, `cpu`, `ram`, `hdd`, `ssd`, `drive`, `powerSupply`, `battery`, `screen`, `os`, `ipAddress`, `macAddress`, `picture`, `price`, `purchaseDate`, `addDate`) VALUES
(1, 'LAP-345-R3', 'YOGA', '100', 'LENOVO', '4,0 GHz', '8 GB', '100 GB', '-', '-', '80W', '14,6 ORGINAL', '15,6"', 'Windows 10', '192.168.2.5', '00:00:FA:42:12:01', '', '1800 ', '2017-02-16 00:00:00', '0000-00-00 00:00:00'),
(2, 'LAP-345-R4', 'YOGA', '103', 'LENOVO', '4,0 GHz', '8 GB', '100 GB', '-', '-', '80W', '14,6 ORGINAL', '15,6"', 'Windows 10', '192.168.2.4', '00:00:FA:42:12:01', '', '1800 ', '2017-02-16 00:00:00', '0000-00-00 00:00:00'),
(3, 'LAP-345-T4', 'YOGA', '103', 'LENOVO', '4,0 GHz', '8 GB', '100 GB', '-', '-', '80W', '14,6 ORGINAL', '15,6"', 'Windows 10', '192.168.2.9', '00:00:FA:42:12:0F', '', '1800 ', '2017-02-16 00:00:00', '0000-00-00 00:00:00'),
(4, 'LAP-345-R4', 'YOGA', '103', 'LENOVO', '4,0 GHz', '8 GB', '100 GB', '-', '-', '80W', '14,6 ORGINAL', '15,6"', 'Windows 10', '192.168.2.4', '00:00:FA:42:12:01', '', '1800 ', '2017-02-16 00:00:00', '0000-00-00 00:00:00'),
(5, 'LAP-345-R4', 'YOGA', '103', 'LENOVO', '4,0 GHz', '8 GB', '100 GB', '-', '-', '80W', '14,6 ORGINAL', '15,6"', 'Windows 10', '192.168.2.4', '00:00:FA:42:12:01', '', '1800 ', '2017-02-16 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `laptops_licenses`
--

CREATE TABLE IF NOT EXISTS `laptops_licenses` (
  `laptop_id` int(11) NOT NULL,
  `license_id` int(11) NOT NULL,
  PRIMARY KEY (`laptop_id`,`license_id`),
  KEY `IDX_175EEFA6D59905E5` (`laptop_id`),
  KEY `IDX_175EEFA6460F904B` (`license_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `laptops_licenses`
--

INSERT INTO `laptops_licenses` (`laptop_id`, `license_id`) VALUES
(1, 3),
(1, 4),
(1, 5),
(4, 3),
(4, 4),
(5, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `license`
--

CREATE TABLE IF NOT EXISTS `license` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `licenseKey` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` double DEFAULT NULL,
  `purchaseDate` datetime NOT NULL,
  `addDate` datetime NOT NULL,
  `expireDate` datetime DEFAULT NULL,
  `format` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lifetime` tinyint(1) NOT NULL,
  `free` tinyint(1) NOT NULL,
  `numberOfSites` int(11) DEFAULT NULL,
  `comment` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `application_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_5768F4199293B832` (`licenseKey`),
  KEY `IDX_5768F4193E030ACD` (`application_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Zrzut danych tabeli `license`
--

INSERT INTO `license` (`id`, `name`, `licenseKey`, `type`, `price`, `purchaseDate`, `addDate`, `expireDate`, `format`, `lifetime`, `free`, `numberOfSites`, `comment`, `application_id`) VALUES
(1, 'Office 365', 'dsffds- fsdfs-fdsfsdf-sfs-fs', 'Roczna', 500, '2017-02-01 00:00:00', '2017-02-22 00:00:00', '2018-02-21 00:00:00', '', 0, 0, NULL, NULL, 3),
(2, 'Office 365 Lite', 'dsffds- fsdfs-f-sfs-fs', 'Roczna', 500, '2017-02-01 00:00:00', '2017-02-22 00:00:00', '2018-02-21 00:00:00', '', 0, 0, NULL, NULL, 5),
(3, 'Office 365 Pro', 'dsffds- fsdfs-ffsdf-sfs-fs', 'Roczna', 500, '2017-02-01 00:00:00', '2017-02-22 00:00:00', '2018-02-21 00:00:00', '', 0, 0, NULL, NULL, 1),
(4, 'Windows 10', '123-23-dkdd-3d3', 'OEM', 100, '2017-09-12 00:00:00', '2017-02-24 15:37:28', '2018-09-23 00:00:00', '', 0, 0, NULL, NULL, 6),
(5, 'Office 365 Full', '1234-3434-43433-fff', 'OEM', 1000, '2017-09-12 00:00:00', '2017-02-24 15:44:19', '2018-09-12 00:00:00', '', 0, 0, NULL, NULL, 6),
(6, NULL, 'refdfdfdfeffd', 'standard site license', NULL, '2018-02-20 00:00:00', '2018-02-13 12:07:27', '2018-02-15 00:00:00', 'usb', 0, 1, 2, NULL, 3),
(7, 'chromowa licencja darmowa', '343eerew', 'other', NULL, '2018-02-19 00:00:00', '2018-02-13 12:24:26', NULL, 'download', 0, 1, 1, NULL, 1),
(8, 'Licencja roczna darsoft', 'brak', 'standard site license', NULL, '2018-02-20 00:00:00', '2018-02-13 14:23:51', NULL, 'download', 0, 0, 20, NULL, 7);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `network_interface_card`
--

CREATE TABLE IF NOT EXISTS `network_interface_card` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `computer_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `series` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `brand` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `standard` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `interface` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ipv4` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `macAddress` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_1A8946F1A426D518` (`computer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Zrzut danych tabeli `network_interface_card`
--

INSERT INTO `network_interface_card` (`id`, `computer_id`, `name`, `model`, `series`, `brand`, `standard`, `interface`, `ipv4`, `macAddress`) VALUES
(1, 4, 'Karta 145', 'MSI CARD', '34', 'MSI', 'Ethernet', 'PCIMCIA', '132.222.22.22', 'AC:BB:Da:DD:33:33'),
(2, 4, 'Karta 1', 'MSI CARD', '34', 'MSI', 'Ethernet', 'USB', '132.222.22.22', 'AC:BB:Da:DD:33:33'),
(3, 4, 'KArciocha WIFIs', 'WIRELESS', 'SL4', 'IBM', 'Wi-Fi', 'Zintegrowana', '123.212.222.222', 'AC:BB:Da:DD:33:32'),
(4, 12, 'Sieciowa Kosa', 'Asterd', '37894793', 'MSI HACL', 'Wi-Fi', 'Zintegrowana', '192.168.2.3', 'AA:45:34:32:23:23'),
(5, 11, 'Sieciowa KArtochA', 'PNM', '4949', 'KILL', 'Ethernet', 'Zintegrowana', '192.168.2.33', '78:43:AA:00:33:23'),
(6, 14, 'Atheros 1021', 'Atheros 13', 'Stla 12', 'Heros', 'Ethernet', 'Zintegrowana', '192.168.2.6', 'AA:12:21:AB:23:56'),
(7, 3, 'sda', 'dasasd', 'asd', 'asd', 'Ethernet', 'Zintegrowana', '192.168.2.', 'dsdsd');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `optical_drive`
--

CREATE TABLE IF NOT EXISTS `optical_drive` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `series` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `brand` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `interface` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `factoryFormat` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Zrzut danych tabeli `optical_drive`
--

INSERT INTO `optical_drive` (`id`, `name`, `model`, `series`, `brand`, `type`, `interface`, `factoryFormat`) VALUES
(1, 'Napęd LG SuperMulti GH24NSD1 RBBB', 'GH24NSD1 RBBB', 'SuperMulti', 'LG', 'DVD-ROM', 'SATA III', 'standard'),
(2, 'Napęd DVD-SDRAM', 'HILTI', 'KORSARZ', 'CHINA', 'CD-RW', 'SATA III', 'slim'),
(3, 'Napęd DVD-SDRAM', 'HILTI', 'KORSARZ', 'CHINA', 'CD-RW', 'SATA III', 'slim'),
(4, 'Napęd DVD-SDRAM', 'HILTI', 'KORSARZ', 'CHINA', 'CD-RW', 'SATA III', 'slim'),
(5, 'DVD ROM', '3898', 'jdf3', 'hITACHI', 'DVD-ROM', 'SATA III', 'slim');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `os`
--

CREATE TABLE IF NOT EXISTS `os` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `series` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `edition` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `language` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `architecture` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `brand` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `format` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `license` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Zrzut danych tabeli `os`
--

INSERT INTO `os` (`id`, `name`, `series`, `edition`, `language`, `architecture`, `brand`, `format`, `license`) VALUES
(1, 'Windows 10 Home PL', 'Windows 10', 'Home', 'pl', '32-bit', 'Microsoft', 'CD', 'OEM'),
(2, 'Windows 7 Professional', 'Windows 7', 'Proffesional', 'pl', '64-bit', 'Microsoft', 'USB', 'OEM'),
(3, 'Linux', 'Linux Ubuntu 12', 'Ubuntu', 'pl', '64', 'None', 'usb', 'free');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pdf`
--

CREATE TABLE IF NOT EXISTS `pdf` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=18 ;

--
-- Zrzut danych tabeli `pdf`
--

INSERT INTO `pdf` (`id`, `file`) VALUES
(1, 'fca8457c2b25a17051ab06acf2993c68.png'),
(6, '0a0e935b03d5f8d92e6b88744f9bf73e.pdf'),
(7, 'fde0bc9e6cd2f3892036d40c9aaf82fd.pdf'),
(8, '055827b53621ee82abe3efe5bfffa7f2.pdf'),
(9, '2443e49a0a7d6ac2fca124a137d2f576.pdf'),
(10, '9f8a53477c4f594959bc9ecd3bf28e5b.pdf'),
(11, '4ceb34bb3760a0d03771117c113f9cb2.pdf'),
(12, '26922aac5cfd878e3ffe0c6e7a82af67.pdf'),
(13, 'c6a5b3469d9b2817c38077fdfcbfc997.pdf'),
(15, '3614438491b0ec48280d3686f02cee8d.pdf'),
(16, 'ebe0bdab003816c487abed218b2e8333.pdf'),
(17, 'fbf0e4062be42da4db15aa1dc46b999b.pdf');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `phone`
--

CREATE TABLE IF NOT EXISTS `phone` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `brand` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `serial` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cpu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ram` int(11) DEFAULT NULL,
  `rom` int(11) DEFAULT NULL,
  `modem` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `screenSize` int(11) DEFAULT NULL,
  `os` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pin` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pinScreen` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci,
  `addDate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Zrzut danych tabeli `phone`
--

INSERT INTO `phone` (`id`, `name`, `brand`, `model`, `serial`, `cpu`, `ram`, `rom`, `modem`, `screenSize`, `os`, `pin`, `pinScreen`, `color`, `description`, `addDate`) VALUES
(1, 'Tel-3435', 'IPHONE', '6s', '343df34', 'ARSa', 2, 33, 'LTE5', 5, 'other', NULL, NULL, 'Biały', 'Brak', '2018-02-14 16:48:09'),
(2, 'trre', 'tr', 're', 'trter', 'ter', 4, 22, 'drd', 1, 'Windows', NULL, NULL, 'd', 'fdf', '2018-02-14 23:48:17'),
(3, 'IPONE 45', 'Apple', 'IPHONE 6', 'ddfdf', 'df', 3, 3, 'df', 4, 'other', NULL, NULL, 'biały', 'brak', '2018-02-16 12:16:49');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `phones_pictures`
--

CREATE TABLE IF NOT EXISTS `phones_pictures` (
  `phone_id` int(11) NOT NULL,
  `picture_id` int(11) NOT NULL,
  PRIMARY KEY (`phone_id`,`picture_id`),
  KEY `IDX_FDA382C63B7323CB` (`phone_id`),
  KEY `IDX_FDA382C6EE45BDBF` (`picture_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `phones_pictures`
--

INSERT INTO `phones_pictures` (`phone_id`, `picture_id`) VALUES
(1, 26);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `picture`
--

CREATE TABLE IF NOT EXISTS `picture` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=30 ;

--
-- Zrzut danych tabeli `picture`
--

INSERT INTO `picture` (`id`, `file`) VALUES
(3, '16fceee52bab6f0ef44a49b5207a8553.jpeg'),
(6, 'db16947da7cd775a11dd908a8cddeeb5.jpeg'),
(7, '38cd90b432b312ab3e6d9e57f356e39a.jpeg'),
(8, 'cd5631051a956ebf10a33fecaf568b35.jpeg'),
(12, '1bc472c48ce9c8e8639150867d403cc4.png'),
(13, 'd6a17df0bdaced344cffdfab8bb815ce.jpeg'),
(14, 'd3071e1bb71167d897085eda05410175.png'),
(15, '87c9ad8553337686064f046856168c66.jpeg'),
(16, '6791bf251ffabad0116b28b0ad5a929a.jpeg'),
(18, 'f1b895c5c7d5837a162a521b6a450df0.jpeg'),
(19, 'b1cad6ae4a66e698ba2f07d4d7f1cf11.jpeg'),
(21, 'd4036261cf633e73a31261f863e9ffc2.jpeg'),
(22, '902cc198f2ade473dc642e8f36b8c188.jpeg'),
(23, '2cb72f164d38bdfa4ca6f727faed7ece.jpeg'),
(24, '3abbb504c5855b952f85fb63fca3d2d8.jpeg'),
(26, '8c602807c17b8ef6dd35bb27ad2a9102.jpeg'),
(27, '09c1cd18109fb7d7eec5ec42013ca242.jpeg'),
(28, 'e11beaa0e302a66a93ba5df9eb52912e.jpeg'),
(29, '41ac75dbedcc6f076d68583e0aa34c25.jpeg');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `power_supply`
--

CREATE TABLE IF NOT EXISTS `power_supply` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `series` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `brand` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cooling` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `powerInWatt` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Zrzut danych tabeli `power_supply`
--

INSERT INTO `power_supply` (`id`, `name`, `model`, `series`, `brand`, `type`, `cooling`, `powerInWatt`) VALUES
(1, 'Zasilacz MSI', 'MSI 897', '89', 'MSI', 'outside', 'none', 258);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `printer`
--

CREATE TABLE IF NOT EXISTS `printer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `powerSupply` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `addDate` datetime NOT NULL,
  `macAddress` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ipAddress` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `brand` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `series` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `factor` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Zrzut danych tabeli `printer`
--

INSERT INTO `printer` (`id`, `name`, `model`, `type`, `powerSupply`, `addDate`, `macAddress`, `ipAddress`, `brand`, `series`, `factor`, `description`) VALUES
(1, 'HP Deskjet nr 2', 'DeskJet 3200', 'Laserowa', '300W', '2017-03-23 00:00:00', '-', '-', 'Brother', 'dfsfs', 'Mobilna', NULL),
(2, 'HP Deskjet nr 3', 'DeskJet 3200', 'Atramentowa', '300W', '2017-03-23 00:00:00', '-', '10.10.0.1', 'Ricoh', '464-43-354-e', 'Wielofunkcyjny kombajn', NULL),
(3, 'DRO-332', 'DeskJet 1022', 'Laserowa', '345W', '2018-02-15 12:46:15', '34', NULL, 'Brother', 'df-df-fd-df', 'Sieciowa', 'brak\r\ni\r\nto\r\nJAk');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `printers_pictures`
--

CREATE TABLE IF NOT EXISTS `printers_pictures` (
  `printer_id` int(11) NOT NULL,
  `picture_id` int(11) NOT NULL,
  PRIMARY KEY (`printer_id`,`picture_id`),
  KEY `IDX_B0AE873C46EC494A` (`printer_id`),
  KEY `IDX_B0AE873CEE45BDBF` (`picture_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `printers_pictures`
--

INSERT INTO `printers_pictures` (`printer_id`, `picture_id`) VALUES
(1, 28);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ramslot_desktopram`
--

CREATE TABLE IF NOT EXISTS `ramslot_desktopram` (
  `ramslot_id` int(11) NOT NULL,
  `desktopram_id` int(11) NOT NULL,
  PRIMARY KEY (`ramslot_id`,`desktopram_id`),
  UNIQUE KEY `UNIQ_A6874BA1C5101709` (`desktopram_id`),
  KEY `IDX_A6874BA1D549D3BC` (`ramslot_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ram_slot`
--

CREATE TABLE IF NOT EXISTS `ram_slot` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `computer_id` int(11) DEFAULT NULL,
  `desktop_ram_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_25F5B530C076F052` (`desktop_ram_id`),
  KEY `IDX_25F5B530A426D518` (`computer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Zrzut danych tabeli `ram_slot`
--

INSERT INTO `ram_slot` (`id`, `computer_id`, `desktop_ram_id`) VALUES
(2, 9, 1),
(3, 9, 2),
(4, 4, 2),
(5, 3, 1),
(6, 1, 4),
(7, 1, 4),
(8, 14, 1),
(9, 10, 2),
(10, 10, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `sdd`
--

CREATE TABLE IF NOT EXISTS `sdd` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `series` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `brand` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `capacity` int(11) NOT NULL,
  `formFactor` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `interface` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Zrzut danych tabeli `sdd`
--

INSERT INTO `sdd` (`id`, `name`, `model`, `series`, `brand`, `capacity`, `formFactor`, `interface`) VALUES
(1, 'Kingston V300 120GB SATA3', 'SV300S37A/120G', 'V300', 'Kingston', 160, '2,5"', 'SATA III');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `sim`
--

CREATE TABLE IF NOT EXISTS `sim` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pin` int(11) DEFAULT NULL,
  `pin2` int(11) DEFAULT NULL,
  `puk` int(11) DEFAULT NULL,
  `puk2` int(11) DEFAULT NULL,
  `operator` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone_id` int(11) DEFAULT NULL,
  `tablet_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_2ECAC2103B7323CB` (`phone_id`),
  KEY `IDX_2ECAC2101897676B` (`tablet_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Zrzut danych tabeli `sim`
--

INSERT INTO `sim` (`id`, `number`, `pin`, `pin2`, `puk`, `puk2`, `operator`, `phone_id`, `tablet_id`) VALUES
(1, '123-232-22', 1234, 12, 12, 12, 'Orange', NULL, NULL),
(2, '435-232-525', 45, 5435, 45, 53, 'T-mobile', NULL, 1),
(3, '34343', 12, 323, 23, 23, 'Orange', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ssd`
--

CREATE TABLE IF NOT EXISTS `ssd` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `series` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `brand` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `capacity` int(11) NOT NULL,
  `formFactor` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `interface` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Zrzut danych tabeli `ssd`
--

INSERT INTO `ssd` (`id`, `name`, `model`, `series`, `brand`, `capacity`, `formFactor`, `interface`) VALUES
(1, 'vfg', 'ffg', 'gfgf', 'gfgf', 160, '2,5"', 'SAS');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `storage_controller`
--

CREATE TABLE IF NOT EXISTS `storage_controller` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `computer_id` int(11) DEFAULT NULL,
  `hdd_id` int(11) DEFAULT NULL,
  `ssd_id` int(11) DEFAULT NULL,
  `optical_drive_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_DCA560141493816F` (`hdd_id`),
  KEY `IDX_DCA56014AF4238A5` (`ssd_id`),
  KEY `IDX_DCA560146C883558` (`optical_drive_id`),
  KEY `IDX_DCA56014A426D518` (`computer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=55 ;

--
-- Zrzut danych tabeli `storage_controller`
--

INSERT INTO `storage_controller` (`id`, `computer_id`, `hdd_id`, `ssd_id`, `optical_drive_id`) VALUES
(32, 2, 3, NULL, NULL),
(33, 2, NULL, 1, NULL),
(34, 2, NULL, NULL, 1),
(35, 2, NULL, NULL, 3),
(39, 9, 3, NULL, NULL),
(40, 9, NULL, 1, NULL),
(41, 9, NULL, NULL, 3),
(42, 9, NULL, 1, NULL),
(44, 4, 2, NULL, NULL),
(45, 4, NULL, 1, NULL),
(47, 10, 2, NULL, NULL),
(48, 10, NULL, 1, NULL),
(49, 10, NULL, NULL, 2),
(50, 11, NULL, NULL, 5),
(51, 14, 2, NULL, NULL),
(52, 14, 2, NULL, NULL),
(53, 14, NULL, 1, NULL),
(54, 14, NULL, NULL, 3);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `tablet`
--

CREATE TABLE IF NOT EXISTS `tablet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `brand` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `serial` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cpu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ram` int(11) DEFAULT NULL,
  `rom` int(11) DEFAULT NULL,
  `modem` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `screenSize` int(11) DEFAULT NULL,
  `os` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pin` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pinScreen` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci,
  `addDate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Zrzut danych tabeli `tablet`
--

INSERT INTO `tablet` (`id`, `name`, `brand`, `model`, `serial`, `cpu`, `ram`, `rom`, `modem`, `screenSize`, `os`, `pin`, `pinScreen`, `color`, `description`, `addDate`) VALUES
(1, 'TAB-S07', 'Lenovo', 'Tab 4', 'abcd-ertw-23er', 'ARM 5', 2, 534, 'LTE 4', 14, 'Android', NULL, NULL, 'Biały', 'brak', '2018-02-13 18:29:15'),
(2, 'TAB-56', 'Samsung', 'S3', '4554-343-3c-4', 'Cortex3', 2, 256, 'LTE 3', 8, 'Android', NULL, NULL, 'Biały', 'Brak uwag.\r\nAle chodzi jak szalony.\r\nPrrr.......................', '2018-02-14 08:51:46'),
(3, 'TAB-453', 'IBM', 'R45', 'dfg-sdds-sd', '1.5 RTG', 3, 22, 'GPRS', 10, 'Windows', NULL, NULL, 'Biały', NULL, '2018-02-14 17:56:15');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `tablets_pictures`
--

CREATE TABLE IF NOT EXISTS `tablets_pictures` (
  `tablet_id` int(11) NOT NULL,
  `picture_id` int(11) NOT NULL,
  PRIMARY KEY (`tablet_id`,`picture_id`),
  KEY `IDX_4112781D1897676B` (`tablet_id`),
  KEY `IDX_4112781DEE45BDBF` (`picture_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `tablets_pictures`
--

INSERT INTO `tablets_pictures` (`tablet_id`, `picture_id`) VALUES
(1, 24),
(2, 23),
(3, 27);

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `computer`
--
ALTER TABLE `computer`
  ADD CONSTRAINT `FK_A298A7A6529427D2` FOREIGN KEY (`computerformfactor_id`) REFERENCES `computer_form_factor` (`id`),
  ADD CONSTRAINT `FK_A298A7A67D207878` FOREIGN KEY (`computeros_id`) REFERENCES `os` (`id`),
  ADD CONSTRAINT `FK_A298A7A6889B163B` FOREIGN KEY (`powersupply_id`) REFERENCES `power_supply` (`id`),
  ADD CONSTRAINT `FK_A298A7A6ACDB8124` FOREIGN KEY (`computercpu_id`) REFERENCES `desktop_c_p_u` (`id`);

--
-- Ograniczenia dla tabeli `computers_licenses`
--
ALTER TABLE `computers_licenses`
  ADD CONSTRAINT `FK_41DDF0AC460F904B` FOREIGN KEY (`license_id`) REFERENCES `license` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_41DDF0ACA426D518` FOREIGN KEY (`computer_id`) REFERENCES `computer` (`id`) ON DELETE CASCADE;

--
-- Ograniczenia dla tabeli `computers_pictures`
--
ALTER TABLE `computers_pictures`
  ADD CONSTRAINT `FK_B193D053A426D518` FOREIGN KEY (`computer_id`) REFERENCES `computer` (`id`),
  ADD CONSTRAINT `FK_B193D053EE45BDBF` FOREIGN KEY (`picture_id`) REFERENCES `picture` (`id`);

--
-- Ograniczenia dla tabeli `cpmputers_pictures`
--
ALTER TABLE `cpmputers_pictures`
  ADD CONSTRAINT `FK_60407AFBA426D518` FOREIGN KEY (`computer_id`) REFERENCES `computer` (`id`),
  ADD CONSTRAINT `FK_60407AFBEE45BDBF` FOREIGN KEY (`picture_id`) REFERENCES `picture` (`id`);

--
-- Ograniczenia dla tabeli `desktop`
--
ALTER TABLE `desktop`
  ADD CONSTRAINT `FK_96105A41764D7EB` FOREIGN KEY (`desktopos_id`) REFERENCES `os` (`id`),
  ADD CONSTRAINT `FK_96105A453310D1` FOREIGN KEY (`desktopformfactor_id`) REFERENCES `computer_form_factor` (`id`),
  ADD CONSTRAINT `FK_96105A4C5B70775` FOREIGN KEY (`desktopcpu_id`) REFERENCES `desktop_c_p_u` (`id`);

--
-- Ograniczenia dla tabeli `desktops_licenses`
--
ALTER TABLE `desktops_licenses`
  ADD CONSTRAINT `FK_2AF2020E460F904B` FOREIGN KEY (`license_id`) REFERENCES `license` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_2AF2020EFFF2950E` FOREIGN KEY (`desktop_id`) REFERENCES `desktop` (`id`) ON DELETE CASCADE;

--
-- Ograniczenia dla tabeli `desktops_pictures`
--
ALTER TABLE `desktops_pictures`
  ADD CONSTRAINT `FK_DABC22F1EE45BDBF` FOREIGN KEY (`picture_id`) REFERENCES `picture` (`id`),
  ADD CONSTRAINT `FK_DABC22F1FFF2950E` FOREIGN KEY (`desktop_id`) REFERENCES `desktop` (`id`);

--
-- Ograniczenia dla tabeli `desktop_desktopram`
--
ALTER TABLE `desktop_desktopram`
  ADD CONSTRAINT `FK_EEF30E2BC5101709` FOREIGN KEY (`desktopram_id`) REFERENCES `desktop_ram` (`id`),
  ADD CONSTRAINT `FK_EEF30E2BFFF2950E` FOREIGN KEY (`desktop_id`) REFERENCES `desktop` (`id`);

--
-- Ograniczenia dla tabeli `document`
--
ALTER TABLE `document`
  ADD CONSTRAINT `FK_D8698A761897676B` FOREIGN KEY (`tablet_id`) REFERENCES `tablet` (`id`),
  ADD CONSTRAINT `FK_D8698A763B7323CB` FOREIGN KEY (`phone_id`) REFERENCES `phone` (`id`),
  ADD CONSTRAINT `FK_D8698A7646EC494A` FOREIGN KEY (`printer_id`) REFERENCES `printer` (`id`),
  ADD CONSTRAINT `FK_D8698A76A426D518` FOREIGN KEY (`computer_id`) REFERENCES `computer` (`id`);

--
-- Ograniczenia dla tabeli `documents_pdfs`
--
ALTER TABLE `documents_pdfs`
  ADD CONSTRAINT `FK_BBE433FF511FC912` FOREIGN KEY (`pdf_id`) REFERENCES `pdf` (`id`),
  ADD CONSTRAINT `FK_BBE433FFC33F7837` FOREIGN KEY (`document_id`) REFERENCES `document` (`id`);

--
-- Ograniczenia dla tabeli `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `FK_5D9F75A148B3EEE4` FOREIGN KEY (`departament_id`) REFERENCES `departament` (`id`);

--
-- Ograniczenia dla tabeli `employees_computers`
--
ALTER TABLE `employees_computers`
  ADD CONSTRAINT `FK_7DD45DA88C03F15C` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_7DD45DA8A426D518` FOREIGN KEY (`computer_id`) REFERENCES `computer` (`id`) ON DELETE CASCADE;

--
-- Ograniczenia dla tabeli `employees_desktops`
--
ALTER TABLE `employees_desktops`
  ADD CONSTRAINT `FK_B48D07838C03F15C` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_B48D0783FFF2950E` FOREIGN KEY (`desktop_id`) REFERENCES `desktop` (`id`) ON DELETE CASCADE;

--
-- Ograniczenia dla tabeli `employees_laptops`
--
ALTER TABLE `employees_laptops`
  ADD CONSTRAINT `FK_2A57E6748C03F15C` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_2A57E674D59905E5` FOREIGN KEY (`laptop_id`) REFERENCES `laptop` (`id`) ON DELETE CASCADE;

--
-- Ograniczenia dla tabeli `employees_licenses`
--
ALTER TABLE `employees_licenses`
  ADD CONSTRAINT `FK_103C143460F904B` FOREIGN KEY (`license_id`) REFERENCES `license` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_103C1438C03F15C` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`id`) ON DELETE CASCADE;

--
-- Ograniczenia dla tabeli `employees_phones`
--
ALTER TABLE `employees_phones`
  ADD CONSTRAINT `FK_348EE8603B7323CB` FOREIGN KEY (`phone_id`) REFERENCES `phone` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_348EE8608C03F15C` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`id`) ON DELETE CASCADE;

--
-- Ograniczenia dla tabeli `employees_printers`
--
ALTER TABLE `employees_printers`
  ADD CONSTRAINT `FK_BB09D3CB46EC494A` FOREIGN KEY (`printer_id`) REFERENCES `printer` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_BB09D3CB8C03F15C` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`id`) ON DELETE CASCADE;

--
-- Ograniczenia dla tabeli `employees_tablets`
--
ALTER TABLE `employees_tablets`
  ADD CONSTRAINT `FK_9810CF9D1897676B` FOREIGN KEY (`tablet_id`) REFERENCES `tablet` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_9810CF9D8C03F15C` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`id`) ON DELETE CASCADE;

--
-- Ograniczenia dla tabeli `installed_application`
--
ALTER TABLE `installed_application`
  ADD CONSTRAINT `FK_9D4D2E383E030ACD` FOREIGN KEY (`application_id`) REFERENCES `application` (`id`),
  ADD CONSTRAINT `FK_9D4D2E38460F904B` FOREIGN KEY (`license_id`) REFERENCES `license` (`id`),
  ADD CONSTRAINT `FK_9D4D2E38A426D518` FOREIGN KEY (`computer_id`) REFERENCES `computer` (`id`);

--
-- Ograniczenia dla tabeli `interface_pci`
--
ALTER TABLE `interface_pci`
  ADD CONSTRAINT `FK_B9C7D1AC2DA02A6E` FOREIGN KEY (`cardGpu_id`) REFERENCES `gpu` (`id`),
  ADD CONSTRAINT `FK_B9C7D1ACA426D518` FOREIGN KEY (`computer_id`) REFERENCES `computer` (`id`);

--
-- Ograniczenia dla tabeli `laptops_licenses`
--
ALTER TABLE `laptops_licenses`
  ADD CONSTRAINT `FK_175EEFA6460F904B` FOREIGN KEY (`license_id`) REFERENCES `license` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_175EEFA6D59905E5` FOREIGN KEY (`laptop_id`) REFERENCES `laptop` (`id`) ON DELETE CASCADE;

--
-- Ograniczenia dla tabeli `license`
--
ALTER TABLE `license`
  ADD CONSTRAINT `FK_5768F4193E030ACD` FOREIGN KEY (`application_id`) REFERENCES `application` (`id`);

--
-- Ograniczenia dla tabeli `network_interface_card`
--
ALTER TABLE `network_interface_card`
  ADD CONSTRAINT `FK_1A8946F1A426D518` FOREIGN KEY (`computer_id`) REFERENCES `computer` (`id`);

--
-- Ograniczenia dla tabeli `phones_pictures`
--
ALTER TABLE `phones_pictures`
  ADD CONSTRAINT `FK_FDA382C63B7323CB` FOREIGN KEY (`phone_id`) REFERENCES `phone` (`id`),
  ADD CONSTRAINT `FK_FDA382C6EE45BDBF` FOREIGN KEY (`picture_id`) REFERENCES `picture` (`id`);

--
-- Ograniczenia dla tabeli `printers_pictures`
--
ALTER TABLE `printers_pictures`
  ADD CONSTRAINT `FK_B0AE873C46EC494A` FOREIGN KEY (`printer_id`) REFERENCES `printer` (`id`),
  ADD CONSTRAINT `FK_B0AE873CEE45BDBF` FOREIGN KEY (`picture_id`) REFERENCES `picture` (`id`);

--
-- Ograniczenia dla tabeli `ramslot_desktopram`
--
ALTER TABLE `ramslot_desktopram`
  ADD CONSTRAINT `FK_A6874BA1C5101709` FOREIGN KEY (`desktopram_id`) REFERENCES `desktop_ram` (`id`),
  ADD CONSTRAINT `FK_A6874BA1D549D3BC` FOREIGN KEY (`ramslot_id`) REFERENCES `ram_slot` (`id`);

--
-- Ograniczenia dla tabeli `ram_slot`
--
ALTER TABLE `ram_slot`
  ADD CONSTRAINT `FK_25F5B530A426D518` FOREIGN KEY (`computer_id`) REFERENCES `computer` (`id`),
  ADD CONSTRAINT `FK_25F5B530C076F052` FOREIGN KEY (`desktop_ram_id`) REFERENCES `desktop_ram` (`id`);

--
-- Ograniczenia dla tabeli `sim`
--
ALTER TABLE `sim`
  ADD CONSTRAINT `FK_2ECAC2101897676B` FOREIGN KEY (`tablet_id`) REFERENCES `tablet` (`id`),
  ADD CONSTRAINT `FK_2ECAC2103B7323CB` FOREIGN KEY (`phone_id`) REFERENCES `phone` (`id`);

--
-- Ograniczenia dla tabeli `storage_controller`
--
ALTER TABLE `storage_controller`
  ADD CONSTRAINT `FK_DCA560141493816F` FOREIGN KEY (`hdd_id`) REFERENCES `hdd` (`id`),
  ADD CONSTRAINT `FK_DCA560146C883558` FOREIGN KEY (`optical_drive_id`) REFERENCES `optical_drive` (`id`),
  ADD CONSTRAINT `FK_DCA56014A426D518` FOREIGN KEY (`computer_id`) REFERENCES `computer` (`id`),
  ADD CONSTRAINT `FK_DCA56014AF4238A5` FOREIGN KEY (`ssd_id`) REFERENCES `ssd` (`id`);

--
-- Ograniczenia dla tabeli `tablets_pictures`
--
ALTER TABLE `tablets_pictures`
  ADD CONSTRAINT `FK_4112781D1897676B` FOREIGN KEY (`tablet_id`) REFERENCES `tablet` (`id`),
  ADD CONSTRAINT `FK_4112781DEE45BDBF` FOREIGN KEY (`picture_id`) REFERENCES `picture` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
