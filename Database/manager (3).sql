-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Czas wygenerowania: 15 Maj 2017, 20:54
-- Wersja serwera: 5.5.50-0ubuntu0.14.04.1
-- Wersja PHP: 5.5.9-1ubuntu4.17

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
  `picture` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `purchaseDate` datetime NOT NULL,
  `addDate` datetime NOT NULL,
  `desktopcpu_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_96105A4C5B70775` (`desktopcpu_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Zrzut danych tabeli `desktop`
--

INSERT INTO `desktop` (`id`, `name`, `model`, `type`, `manufacturer`, `powerSupply`, `ipAddress`, `macAddress`, `picture`, `price`, `purchaseDate`, `addDate`, `desktopcpu_id`) VALUES
(12, 'OPTIPLEX 703e', 'OPTIPLEX 55', '7010', 'DELL', '300', '123.344.3434.3', 'a2:22:33:33:ab:45', '9394329228aa728483f8aee9eca3aa47.jpeg', '12222', '2017-05-24 00:00:00', '2017-05-12 16:15:00', 2);

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
(12, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Zrzut danych tabeli `desktop_c_p_u`
--

INSERT INTO `desktop_c_p_u` (`id`, `name`, `Manufacturer`, `baseFrequency`, `maxTurboFrequency`, `numberOfCores`, `numberOfThreads`, `casheMB`, `TDP`, `GPU`, `LithographyNM`, `launchDate`, `sockets`, `generation`) VALUES
(1, 'Core™2 Duo Processor E8200', 'Intel', 2.66, 2.66, 2, 2, 6, '65', NULL, 45, '2008-01-01', 'LGA 775', 'Wolfdale'),
(2, 'Core™ i7-4770K Processor', 'Intel', 3.5, 3.9, 4, 8, 8, '84', 'Intel® HD Graphics 4600', 22, '2013-01-04', 'LGA 1150', 'Haswell'),
(3, 'CORE™ i7-7920HQ', 'Intel', 3.1, 4.1, 4, 8, 8, '45', 'Intel® HD Graphics 630', 14, '2017-01-01', 'brak', 'Siódma generacja'),
(4, 'AMD Ryzen 7 1700X, 3,4 GHz AM4', 'AMD', 3.4, 3.8, 8, 16, 20, '95', NULL, 14, '2017-01-01', 'AM4', 'Ryzen 7');

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

--
-- Zrzut danych tabeli `desktop_desktopram`
--

INSERT INTO `desktop_desktopram` (`desktop_id`, `desktopram_id`) VALUES
(12, 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `desktop_hdd`
--

CREATE TABLE IF NOT EXISTS `desktop_hdd` (
  `desktop_id` int(11) NOT NULL,
  `hdd_id` int(11) NOT NULL,
  PRIMARY KEY (`desktop_id`,`hdd_id`),
  KEY `IDX_7E58FF69FFF2950E` (`desktop_id`),
  KEY `IDX_7E58FF691493816F` (`hdd_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `desktop_hdd`
--

INSERT INTO `desktop_hdd` (`desktop_id`, `hdd_id`) VALUES
(12, 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `desktop_opticaldrive`
--

CREATE TABLE IF NOT EXISTS `desktop_opticaldrive` (
  `desktop_id` int(11) NOT NULL,
  `opticaldrive_id` int(11) NOT NULL,
  PRIMARY KEY (`desktop_id`,`opticaldrive_id`),
  KEY `IDX_EE52BBDFFF2950E` (`desktop_id`),
  KEY `IDX_EE52BBD4A3FA43D` (`opticaldrive_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `desktop_opticaldrive`
--

INSERT INTO `desktop_opticaldrive` (`desktop_id`, `opticaldrive_id`) VALUES
(12, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Zrzut danych tabeli `desktop_ram`
--

INSERT INTO `desktop_ram` (`id`, `name`, `model`, `series`, `brand`, `capacity`, `type`, `busSpeed`, `casLatency`, `numberOfPins`) VALUES
(1, 'Ballistix Elite 8GB Single DDR4 3000 MT/s (PC4-24000) DIMM 288-Pin Memory', 'BLE8G4D30AEEA', 'Elite', 'Ballistix ', 8, 'DDR4 DIMM', 'PC4-24000', 15, 288),
(2, 'RAm testowy', 'HP', 'złom', 'HP', 4, 'DDR4', '233', 32, 254),
(3, 'testowy ram', '123', '22', 'HP', 2, 'DDR4', '1234', 12, 255);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `desktop_sdd`
--

CREATE TABLE IF NOT EXISTS `desktop_sdd` (
  `desktop_id` int(11) NOT NULL,
  `sdd_id` int(11) NOT NULL,
  PRIMARY KEY (`desktop_id`,`sdd_id`),
  KEY `IDX_6E2BB3F8FFF2950E` (`desktop_id`),
  KEY `IDX_6E2BB3F87D827337` (`sdd_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `desktop_ssd`
--

CREATE TABLE IF NOT EXISTS `desktop_ssd` (
  `desktop_id` int(11) NOT NULL,
  `ssd_id` int(11) NOT NULL,
  PRIMARY KEY (`desktop_id`,`ssd_id`),
  KEY `IDX_6BA8376EFFF2950E` (`desktop_id`),
  KEY `IDX_6BA8376EAF4238A5` (`ssd_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `desktop_ssd`
--

INSERT INTO `desktop_ssd` (`desktop_id`, `ssd_id`) VALUES
(12, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Zrzut danych tabeli `employee`
--

INSERT INTO `employee` (`id`, `departament_id`, `name`, `surname`, `sex`, `phone`, `email`, `job`) VALUES
(4, 3, 'Janina Julia', 'Pilko', 'Female', '123 334 444', 'julka@wp.pl', 'Analityczka IT'),
(5, 2, 'Anna', 'Polska', 'Female', '7898 8997 99', 'anna@wp.pl', 'Kierownik IT'),
(6, 2, 'Iwona', 'Latoks', 'Female', '789-788-888', 'iwona@op.pl', 'Konsultant techniczny');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Zrzut danych tabeli `fos_user`
--

INSERT INTO `fos_user` (`id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `confirmation_token`, `password_requested_at`, `roles`) VALUES
(1, 'admin', 'admin', 'admin@admin.pl', 'admin@admin.pl', 1, NULL, '$2y$13$cXhKqC9AwgFN1SYnyIG.Luhe55ujkyL/YzXQf8E.5rwJnvtjUhqJ6', '2017-05-12 15:14:40', NULL, NULL, 'a:0:{}'),
(2, 'Janek', 'janek', 'jam@jam.pl', 'jam@jam.pl', 0, NULL, '$2y$13$otms8EkVthxQyxGZ2HD7EeqNB9e6wuBmQz/LaqA.KYMMEm4RVPwy6', NULL, NULL, NULL, 'a:0:{}');

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
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `licenseKey` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `purchaseDate` datetime NOT NULL,
  `addDate` datetime NOT NULL,
  `expireDate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_5768F4199293B832` (`licenseKey`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Zrzut danych tabeli `license`
--

INSERT INTO `license` (`id`, `name`, `licenseKey`, `type`, `price`, `purchaseDate`, `addDate`, `expireDate`) VALUES
(1, 'Office 365', 'dsffds- fsdfs-fdsfsdf-sfs-fs', 'Roczna', 500, '2017-02-01 00:00:00', '2017-02-22 00:00:00', '2018-02-21 00:00:00'),
(2, 'Office 365 Lite', 'dsffds- fsdfs-f-sfs-fs', 'Roczna', 500, '2017-02-01 00:00:00', '2017-02-22 00:00:00', '2018-02-21 00:00:00'),
(3, 'Office 365 Pro', 'dsffds- fsdfs-ffsdf-sfs-fs', 'Roczna', 500, '2017-02-01 00:00:00', '2017-02-22 00:00:00', '2018-02-21 00:00:00'),
(4, 'Windows 10', '123-23-dkdd-3d3', 'OEM', 100, '2017-09-12 00:00:00', '2017-02-24 15:37:28', '2018-09-23 00:00:00'),
(5, 'Office 365 Full', '1234-3434-43433-fff', 'OEM', 1000, '2017-09-12 00:00:00', '2017-02-24 15:44:19', '2018-09-12 00:00:00');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Zrzut danych tabeli `optical_drive`
--

INSERT INTO `optical_drive` (`id`, `name`, `model`, `series`, `brand`, `type`, `interface`, `factoryFormat`) VALUES
(1, 'Napęd LG SuperMulti GH24NSD1 RBBB', 'GH24NSD1 RBBB', 'SuperMulti', 'LG', 'DVD-ROM', 'SATA III', 'standard');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Zrzut danych tabeli `os`
--

INSERT INTO `os` (`id`, `name`, `series`, `edition`, `language`, `architecture`, `brand`, `format`, `license`) VALUES
(1, 'Windows 10 Home PL', 'Windows 10', 'Home', 'pl', '32-bit', 'Microsoft', 'CD', 'OEM'),
(2, 'Windows 7 Professional', 'Windows 7', 'Proffesional', 'pl', '64-bit', 'Microsoft', 'USB', 'OEM');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `printer`
--

CREATE TABLE IF NOT EXISTS `printer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `manufacturer` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `powerSupply` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `addDate` datetime NOT NULL,
  `purchaseDate` datetime NOT NULL,
  `macAddress` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ipAddress` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Zrzut danych tabeli `printer`
--

INSERT INTO `printer` (`id`, `name`, `model`, `type`, `manufacturer`, `powerSupply`, `price`, `addDate`, `purchaseDate`, `macAddress`, `ipAddress`, `picture`) VALUES
(1, 'HP Deskjet nr 2', 'DeskJet 3200', 'Laser', 'HP', '300W', '340 PLN', '2017-03-23 00:00:00', '2017-03-23 00:00:00', '-', '-', ''),
(2, 'HP Deskjet nr 3', 'DeskJet 3200', 'Laser', 'HP', '300W', '340 PLN', '2017-03-23 00:00:00', '2017-03-23 00:00:00', '-', '-', '');

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

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `desktops_licenses`
--
ALTER TABLE `desktops_licenses`
  ADD CONSTRAINT `FK_2AF2020E460F904B` FOREIGN KEY (`license_id`) REFERENCES `license` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_2AF2020EFFF2950E` FOREIGN KEY (`desktop_id`) REFERENCES `desktop` (`id`) ON DELETE CASCADE;

--
-- Ograniczenia dla tabeli `desktop_desktopram`
--
ALTER TABLE `desktop_desktopram`
  ADD CONSTRAINT `FK_EEF30E2BC5101709` FOREIGN KEY (`desktopram_id`) REFERENCES `desktop_ram` (`id`),
  ADD CONSTRAINT `FK_EEF30E2BFFF2950E` FOREIGN KEY (`desktop_id`) REFERENCES `desktop` (`id`);

--
-- Ograniczenia dla tabeli `desktop_hdd`
--
ALTER TABLE `desktop_hdd`
  ADD CONSTRAINT `FK_7E58FF691493816F` FOREIGN KEY (`hdd_id`) REFERENCES `hdd` (`id`),
  ADD CONSTRAINT `FK_7E58FF69FFF2950E` FOREIGN KEY (`desktop_id`) REFERENCES `desktop` (`id`);

--
-- Ograniczenia dla tabeli `desktop_opticaldrive`
--
ALTER TABLE `desktop_opticaldrive`
  ADD CONSTRAINT `FK_EE52BBD4A3FA43D` FOREIGN KEY (`opticaldrive_id`) REFERENCES `optical_drive` (`id`),
  ADD CONSTRAINT `FK_EE52BBDFFF2950E` FOREIGN KEY (`desktop_id`) REFERENCES `desktop` (`id`);

--
-- Ograniczenia dla tabeli `desktop_sdd`
--
ALTER TABLE `desktop_sdd`
  ADD CONSTRAINT `FK_6E2BB3F87D827337` FOREIGN KEY (`sdd_id`) REFERENCES `sdd` (`id`),
  ADD CONSTRAINT `FK_6E2BB3F8FFF2950E` FOREIGN KEY (`desktop_id`) REFERENCES `desktop` (`id`);

--
-- Ograniczenia dla tabeli `desktop_ssd`
--
ALTER TABLE `desktop_ssd`
  ADD CONSTRAINT `FK_6BA8376EAF4238A5` FOREIGN KEY (`ssd_id`) REFERENCES `ssd` (`id`),
  ADD CONSTRAINT `FK_6BA8376EFFF2950E` FOREIGN KEY (`desktop_id`) REFERENCES `desktop` (`id`);

--
-- Ograniczenia dla tabeli `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `FK_5D9F75A148B3EEE4` FOREIGN KEY (`departament_id`) REFERENCES `departament` (`id`);

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
-- Ograniczenia dla tabeli `laptops_licenses`
--
ALTER TABLE `laptops_licenses`
  ADD CONSTRAINT `FK_175EEFA6460F904B` FOREIGN KEY (`license_id`) REFERENCES `license` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_175EEFA6D59905E5` FOREIGN KEY (`laptop_id`) REFERENCES `laptop` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
