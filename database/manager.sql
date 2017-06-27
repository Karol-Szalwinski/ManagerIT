-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 27, 2017 at 04:00 PM
-- Server version: 5.5.50-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `manager`
--

-- --------------------------------------------------------

--
-- Table structure for table `computer`
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
  `powerSupply` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ipAddress` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `macAddress` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `purchaseDate` datetime DEFAULT NULL,
  `addDate` datetime NOT NULL,
  `battery` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `screenSize` double DEFAULT NULL,
  `screenType` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_A298A7A6ACDB8124` (`computercpu_id`),
  KEY `IDX_A298A7A6529427D2` (`computerformfactor_id`),
  KEY `IDX_A298A7A67D207878` (`computeros_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `computer`
--

INSERT INTO `computer` (`id`, `computercpu_id`, `computerformfactor_id`, `computeros_id`, `name`, `model`, `formFactor`, `brand`, `series`, `powerSupply`, `ipAddress`, `macAddress`, `price`, `purchaseDate`, `addDate`, `battery`, `screenSize`, `screenType`) VALUES
(1, 2, 2, 2, 'Komp testowy 3', 'dell optiplex', 'desktop', 'dell', 'optiplex', '320w', '192.168.2.3', 'aa:aa:aa:aa:ff:ac', 2000.34, '2017-06-20 00:00:00', '2017-06-22 00:00:00', NULL, NULL, NULL),
(2, 5, 3, 2, 'Komp testowy 1', 'dell optiplex', 'desktop', 'dell', 'optiplex', '320w', '192.168.2.3', 'aa:aa:aa:aa:ff:ac', 2000.34, '2017-06-20 00:00:00', '2017-06-22 00:00:00', NULL, NULL, NULL),
(3, 2, 3, 2, 'Komp testowy', 'dell optiplex', 'laptop', 'dell', 'optiplex', '320w', '192.168.2.3', 'aa:aa:aa:aa:ff:ac', 2000.34, '2017-06-20 00:00:00', '2017-06-22 00:00:00', NULL, NULL, NULL),
(4, 3, 4, 2, 'Komp testowy 2', 'model s', 'desktop', 'dell', 'seria a', '300w', '192.122.212.122', 'aa:bb:23:32:23:33', 1000, '2017-06-19 00:00:00', '2017-06-13 23:28:16', NULL, NULL, NULL),
(7, NULL, 2, 1, 'OPTIPLEX 7030', 'OPTIPLEX', 'desktop', 'dell', '7030', '300w', '192.168.4.3', 'aa:bb:23:32:23:33', 2500, '2017-06-26 00:00:00', '2017-06-16 20:12:27', NULL, NULL, NULL),
(8, NULL, 2, 1, 'Komputer 133', 'Optiplex', 'desktop', 'DELL', '7030', '439Watt', '192.122.212.123', 'aa:bb:23:32:23:33', 1223, '2017-06-12 00:00:00', '2017-06-16 23:14:47', NULL, NULL, NULL),
(9, 1, 2, 1, 'Z_SR_BIURO', 'OPTIPLEX', 'desktop', 'DELL', '9010', '350W', '192.122.212.122', 'aa:bb:23:32:23:33', 123789, '2017-06-20 00:00:00', '2017-06-17 18:56:35', NULL, NULL, NULL),
(10, 3, NULL, 1, 'LAP-OFFICE', 'INTERNOS', 'laptop', 'DELL', '344', '35W', '192.168.3.4', 'ee:ss:ss:dd:sd:cc', 1400, '2017-06-18 00:00:00', '2017-06-18 16:13:04', 'ROAD34', 19, 'led');

-- --------------------------------------------------------

--
-- Table structure for table `computers_licenses`
--

CREATE TABLE IF NOT EXISTS `computers_licenses` (
  `computer_id` int(11) NOT NULL,
  `license_id` int(11) NOT NULL,
  PRIMARY KEY (`computer_id`,`license_id`),
  KEY `IDX_41DDF0ACA426D518` (`computer_id`),
  KEY `IDX_41DDF0AC460F904B` (`license_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `computers_licenses`
--

INSERT INTO `computers_licenses` (`computer_id`, `license_id`) VALUES
(2, 4),
(3, 2),
(4, 5);

-- --------------------------------------------------------

--
-- Table structure for table `computers_pictures`
--

CREATE TABLE IF NOT EXISTS `computers_pictures` (
  `computer_id` int(11) NOT NULL,
  `picture_id` int(11) NOT NULL,
  PRIMARY KEY (`computer_id`,`picture_id`),
  KEY `IDX_B193D053A426D518` (`computer_id`),
  KEY `IDX_B193D053EE45BDBF` (`picture_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `computers_pictures`
--

INSERT INTO `computers_pictures` (`computer_id`, `picture_id`) VALUES
(2, 15),
(2, 16),
(3, 20),
(4, 18),
(10, 19);

-- --------------------------------------------------------

--
-- Table structure for table `computer_form_factor`
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
-- Dumping data for table `computer_form_factor`
--

INSERT INTO `computer_form_factor` (`id`, `name`, `model`, `seria`, `brand`, `dedicatedForModel`) VALUES
(2, 'Mini tower', 'Optiplex', '7XX', 'DELL', 0),
(3, 'Big Tower', 'Silent', '800', 'Be Quiet!', 1),
(4, 'SFF', 'Optiplex', '7XX', 'DELL', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cpmputers_pictures`
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
-- Table structure for table `departament`
--

CREATE TABLE IF NOT EXISTS `departament` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `addDate` datetime NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `departament`
--

INSERT INTO `departament` (`id`, `addDate`, `name`) VALUES
(1, '2017-02-09 00:00:00', 'Dział Handlowy'),
(2, '2017-02-22 15:12:30', 'Dział IT'),
(3, '2017-02-22 15:20:36', 'Biuro'),
(4, '2017-02-24 12:43:02', 'Dział Niczego');

-- --------------------------------------------------------

--
-- Table structure for table `desktop`
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
-- Dumping data for table `desktop`
--

INSERT INTO `desktop` (`id`, `name`, `model`, `type`, `manufacturer`, `powerSupply`, `ipAddress`, `macAddress`, `price`, `purchaseDate`, `addDate`, `desktopcpu_id`, `desktopformfactor_id`, `desktopos_id`) VALUES
(12, 'OPTIPLEX 703', 'OPTIPLEX 55', '7010', 'DELL', '300', '123.344.3434.3', 'a2:22:33:33:ab:45', '12222', '2017-05-24 00:00:00', '2017-05-12 16:15:00', 3, 2, 1),
(13, 'MSI POWER', 'GE72 Titan', 'TITAN', 'MSI', '300', '192.122.212.122', 'aa:bb:23:32:23:33', '4334', '2017-05-09 00:00:00', '2017-05-15 22:24:58', 3, 3, 1),
(14, 'OPTIPLEXTRON', 'OPTIPLEX', '455', 'DELL', '300', '192.168.2.44', 'ab:01:20:12:12:12', '1234', '2017-05-31 00:00:00', '2017-05-16 14:11:38', 3, 3, 1),
(15, 'MSI DRAGON FORCE', 'DRAGON FORCE', '987', 'MSI', '344', '192.168.2.44', 'a2:22:33:33:ab:45', '1233', '2017-05-02 00:00:00', '2017-05-23 13:54:45', 1, 3, 1),
(16, 'OPTIPLEX 7030 ROBOCZY', 'OPTIPLEX 7030', '7030', 'DELL', '345', '123.344.3434.3', '1212', '4566', '2017-05-23 00:00:00', '2017-05-24 16:34:59', 3, 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `desktops_licenses`
--

CREATE TABLE IF NOT EXISTS `desktops_licenses` (
  `desktop_id` int(11) NOT NULL,
  `license_id` int(11) NOT NULL,
  PRIMARY KEY (`desktop_id`,`license_id`),
  KEY `IDX_2AF2020EFFF2950E` (`desktop_id`),
  KEY `IDX_2AF2020E460F904B` (`license_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `desktops_licenses`
--

INSERT INTO `desktops_licenses` (`desktop_id`, `license_id`) VALUES
(12, 1),
(13, 2),
(14, 2),
(14, 3),
(15, 3);

-- --------------------------------------------------------

--
-- Table structure for table `desktops_pictures`
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
-- Table structure for table `desktop_c_p_u`
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `desktop_c_p_u`
--

INSERT INTO `desktop_c_p_u` (`id`, `name`, `Manufacturer`, `baseFrequency`, `maxTurboFrequency`, `numberOfCores`, `numberOfThreads`, `casheMB`, `TDP`, `GPU`, `LithographyNM`, `launchDate`, `sockets`, `generation`) VALUES
(1, 'Core™2 Duo Processor E8200', 'Intel', 2.66, 2.66, 2, 2, 6, '65', NULL, 45, '2008-01-01', 'LGA 775', 'Wolfdale'),
(2, 'Core™ i7-4770K Processor', 'Intel', 3.5, 3.9, 4, 8, 8, '84', 'Intel® HD Graphics 4600', 22, '2013-01-04', 'LGA 1150', 'Haswell'),
(3, 'CORE™ i7-7920HQ', 'Intel', 3.1, 4.1, 4, 8, 8, '45', 'Intel® HD Graphics 630', 14, '2017-01-01', 'brak', 'Siódma generacja'),
(4, 'AMD Ryzen 7 1700X, 3,4 GHz AM4', 'AMD', 3.4, 3.8, 8, 16, 20, '95', NULL, 14, '2017-01-01', 'AM4', 'Ryzen 7'),
(5, 'INTEL® CORE™ i3-7320', 'Intel', 4.1, 4.1, 2, 3, 4, '51', 'tak', 14, '2017-01-01', 'FCLGA1151', 'generacja  7');

-- --------------------------------------------------------

--
-- Table structure for table `desktop_desktopram`
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
-- Table structure for table `desktop_ram`
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
-- Dumping data for table `desktop_ram`
--

INSERT INTO `desktop_ram` (`id`, `name`, `model`, `series`, `brand`, `capacity`, `type`, `busSpeed`, `casLatency`, `numberOfPins`) VALUES
(1, 'Ballistix Elite 8GB Single DDR4 3000 MT/s (PC4-24000) DIMM 288-Pin Memory', 'BLE8G4D30AEEA', 'Elite', 'Ballistix ', 8, 'DDR4 DIMM', 'PC4-24000', 15, 288),
(2, 'RAm testowy', 'HP', 'złom', 'HP', 4, 'DDR4', '233', 32, 254),
(3, 'testowy ram', '123', '22', 'HP', 2, 'DDR4', '1234', 12, 255),
(4, 'PAMIĘĆ RAM 16 GB DDR3 GOODRAM PLAY CL 10', 'GYS1866D364L10/16GDC', 'PLAY', 'GOODRAM', 16, 'DDR3', '1866 MHz', 10, 230);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `departament_id`, `name`, `surname`, `sex`, `phone`, `email`, `job`) VALUES
(4, 1, 'Janina Julia', 'Pilko', 'Female', '123 334 444', 'julka@wp.pl', 'Analityczka IT'),
(5, 2, 'Anna', 'Polska', 'Female', '7898 8997 99', 'anna@wp.pl', 'Kierownik IT'),
(6, 2, 'Iwona', 'Latoks', 'Female', '789-788-888', 'iwona@op.pl', 'Konsultant techniczny'),
(7, 2, 'Karol', 'Szałwiński', 'Male', '603-233-000', 'szalwinski@organizacja.pl', 'Local Hero');

-- --------------------------------------------------------

--
-- Table structure for table `employees_computers`
--

CREATE TABLE IF NOT EXISTS `employees_computers` (
  `computer_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  PRIMARY KEY (`computer_id`,`employee_id`),
  KEY `IDX_7DD45DA8A426D518` (`computer_id`),
  KEY `IDX_7DD45DA88C03F15C` (`employee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `employees_computers`
--

INSERT INTO `employees_computers` (`computer_id`, `employee_id`) VALUES
(1, 6),
(2, 6),
(3, 4),
(3, 5),
(3, 6),
(8, 7),
(10, 6);

-- --------------------------------------------------------

--
-- Table structure for table `employees_desktops`
--

CREATE TABLE IF NOT EXISTS `employees_desktops` (
  `employee_id` int(11) NOT NULL,
  `desktop_id` int(11) NOT NULL,
  PRIMARY KEY (`desktop_id`,`employee_id`),
  KEY `IDX_B48D07838C03F15C` (`employee_id`),
  KEY `IDX_B48D0783FFF2950E` (`desktop_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `employees_desktops`
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
-- Table structure for table `employees_laptops`
--

CREATE TABLE IF NOT EXISTS `employees_laptops` (
  `employee_id` int(11) NOT NULL,
  `laptop_id` int(11) NOT NULL,
  PRIMARY KEY (`laptop_id`,`employee_id`),
  KEY `IDX_2A57E6748C03F15C` (`employee_id`),
  KEY `IDX_2A57E674D59905E5` (`laptop_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `employees_laptops`
--

INSERT INTO `employees_laptops` (`employee_id`, `laptop_id`) VALUES
(4, 1),
(5, 1),
(5, 4),
(6, 2),
(6, 4);

-- --------------------------------------------------------

--
-- Table structure for table `employees_licenses`
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
-- Table structure for table `fos_user`
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
-- Dumping data for table `fos_user`
--

INSERT INTO `fos_user` (`id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `confirmation_token`, `password_requested_at`, `roles`) VALUES
(1, 'admin', 'admin', 'admin@admin.pl', 'admin@admin.pl', 1, NULL, '$2y$13$cXhKqC9AwgFN1SYnyIG.Luhe55ujkyL/YzXQf8E.5rwJnvtjUhqJ6', '2017-06-27 14:53:17', NULL, NULL, 'a:0:{}'),
(2, 'Janek', 'janek', 'jam@jam.pl', 'jam@jam.pl', 0, NULL, '$2y$13$otms8EkVthxQyxGZ2HD7EeqNB9e6wuBmQz/LaqA.KYMMEm4RVPwy6', NULL, NULL, NULL, 'a:0:{}');

-- --------------------------------------------------------

--
-- Table structure for table `gpu`
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
-- Dumping data for table `gpu`
--

INSERT INTO `gpu` (`id`, `name`, `chipset`, `series`, `brand`, `memorySize`, `memoryType`, `compatiableSlot`, `cooling`, `monitorConnectors`, `powerConnectors`, `formFactor`) VALUES
(1, 'ASUS Radeon RX 460 2GB DUAL GAMING', 'RX 460', 'Gaming', 'ASUS', 2048, 'DDR5', 'PCI-Express x16', 'Aktywne', 'HDMI, DVI', 'nie', 'karta desktopowa'),
(2, 'MSI GTX 960 2GB GLOBAL', 'GTX 960', 'GTX 960 2GB GLOBAL', 'MSI', 2048, 'DDR5', 'PCI Express x16', 'Aktywne', 'HDMI ', 'PCIe 6 + 8 pin', 'karta  pci desktop');

-- --------------------------------------------------------

--
-- Table structure for table `hdd`
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
-- Dumping data for table `hdd`
--

INSERT INTO `hdd` (`id`, `name`, `model`, `series`, `brand`, `capacity`, `formFactor`, `interface`, `rotationSpeedRpm`, `cache`) VALUES
(1, 'Seagate IronWolf 1TB', 'ST1000VN002', 'IronWolf', 'Seagate', 1000, '3.5', 'SATA III', 7200, 64),
(2, 'Seagate IronWolf 1TB', 'ST1000VN002', 'IronWolf', 'Seagate', 2048, '3,5"', 'SATA III', 7200, 64),
(3, 'Western Digital WD Red 1 TB WD10JFCX', 'WD10JFCX', 'Red', 'WD', 1024, '3,5"', 'SATA III', 7200, 16);

-- --------------------------------------------------------

--
-- Table structure for table `interface_pci`
--

CREATE TABLE IF NOT EXISTS `interface_pci` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `computer_id` int(11) DEFAULT NULL,
  `$cardGpu_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_B9C7D1ACA426D518` (`computer_id`),
  KEY `IDX_B9C7D1AC93E80FA1` (`$cardGpu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `laptop`
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
-- Dumping data for table `laptop`
--

INSERT INTO `laptop` (`id`, `name`, `model`, `type`, `manufacturer`, `cpu`, `ram`, `hdd`, `ssd`, `drive`, `powerSupply`, `battery`, `screen`, `os`, `ipAddress`, `macAddress`, `picture`, `price`, `purchaseDate`, `addDate`) VALUES
(1, 'LAP-345-R3', 'YOGA', '100', 'LENOVO', '4,0 GHz', '8 GB', '100 GB', '-', '-', '80W', '14,6 ORGINAL', '15,6"', 'Windows 10', '192.168.2.5', '00:00:FA:42:12:01', '', '1800 ', '2017-02-16 00:00:00', '0000-00-00 00:00:00'),
(2, 'LAP-345-R4', 'YOGA', '103', 'LENOVO', '4,0 GHz', '8 GB', '100 GB', '-', '-', '80W', '14,6 ORGINAL', '15,6"', 'Windows 10', '192.168.2.4', '00:00:FA:42:12:01', '', '1800 ', '2017-02-16 00:00:00', '0000-00-00 00:00:00'),
(3, 'LAP-345-T4', 'YOGA', '103', 'LENOVO', '4,0 GHz', '8 GB', '100 GB', '-', '-', '80W', '14,6 ORGINAL', '15,6"', 'Windows 10', '192.168.2.9', '00:00:FA:42:12:0F', '', '1800 ', '2017-02-16 00:00:00', '0000-00-00 00:00:00'),
(4, 'LAP-345-R4', 'YOGA', '103', 'LENOVO', '4,0 GHz', '8 GB', '100 GB', '-', '-', '80W', '14,6 ORGINAL', '15,6"', 'Windows 10', '192.168.2.4', '00:00:FA:42:12:01', '', '1800 ', '2017-02-16 00:00:00', '0000-00-00 00:00:00'),
(5, 'LAP-345-R4', 'YOGA', '103', 'LENOVO', '4,0 GHz', '8 GB', '100 GB', '-', '-', '80W', '14,6 ORGINAL', '15,6"', 'Windows 10', '192.168.2.4', '00:00:FA:42:12:01', '', '1800 ', '2017-02-16 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `laptops_licenses`
--

CREATE TABLE IF NOT EXISTS `laptops_licenses` (
  `laptop_id` int(11) NOT NULL,
  `license_id` int(11) NOT NULL,
  PRIMARY KEY (`laptop_id`,`license_id`),
  KEY `IDX_175EEFA6D59905E5` (`laptop_id`),
  KEY `IDX_175EEFA6460F904B` (`license_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `laptops_licenses`
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
-- Table structure for table `license`
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
-- Dumping data for table `license`
--

INSERT INTO `license` (`id`, `name`, `licenseKey`, `type`, `price`, `purchaseDate`, `addDate`, `expireDate`) VALUES
(1, 'Office 365', 'dsffds- fsdfs-fdsfsdf-sfs-fs', 'Roczna', 500, '2017-02-01 00:00:00', '2017-02-22 00:00:00', '2018-02-21 00:00:00'),
(2, 'Office 365 Lite', 'dsffds- fsdfs-f-sfs-fs', 'Roczna', 500, '2017-02-01 00:00:00', '2017-02-22 00:00:00', '2018-02-21 00:00:00'),
(3, 'Office 365 Pro', 'dsffds- fsdfs-ffsdf-sfs-fs', 'Roczna', 500, '2017-02-01 00:00:00', '2017-02-22 00:00:00', '2018-02-21 00:00:00'),
(4, 'Windows 10', '123-23-dkdd-3d3', 'OEM', 100, '2017-09-12 00:00:00', '2017-02-24 15:37:28', '2018-09-23 00:00:00'),
(5, 'Office 365 Full', '1234-3434-43433-fff', 'OEM', 1000, '2017-09-12 00:00:00', '2017-02-24 15:44:19', '2018-09-12 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `network_interface_card`
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `network_interface_card`
--

INSERT INTO `network_interface_card` (`id`, `computer_id`, `name`, `model`, `series`, `brand`, `standard`, `interface`, `ipv4`, `macAddress`) VALUES
(1, 4, 'Karta 145', 'MSI CARD', '34', 'MSI', 'Ethernet', 'PCIMCIA', '132.222.22.22', 'AC:BB:Da:DD:33:33'),
(2, 4, 'Karta 1', 'MSI CARD', '34', 'MSI', 'Ethernet', 'USB', '132.222.22.22', 'AC:BB:Da:DD:33:33'),
(3, 4, 'KArciocha WIFIs', 'WIRELESS', 'SL4', 'IBM', 'Wi-Fi', 'Zintegrowana', '123.212.222.222', 'AC:BB:Da:DD:33:32');

-- --------------------------------------------------------

--
-- Table structure for table `optical_drive`
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `optical_drive`
--

INSERT INTO `optical_drive` (`id`, `name`, `model`, `series`, `brand`, `type`, `interface`, `factoryFormat`) VALUES
(1, 'Napęd LG SuperMulti GH24NSD1 RBBB', 'GH24NSD1 RBBB', 'SuperMulti', 'LG', 'DVD-ROM', 'SATA III', 'standard'),
(2, 'Napęd DVD-SDRAM', 'HILTI', 'KORSARZ', 'CHINA', 'CD-RW', 'SATA III', 'slim'),
(3, 'Napęd DVD-SDRAM', 'HILTI', 'KORSARZ', 'CHINA', 'CD-RW', 'SATA III', 'slim'),
(4, 'Napęd DVD-SDRAM', 'HILTI', 'KORSARZ', 'CHINA', 'CD-RW', 'SATA III', 'slim');

-- --------------------------------------------------------

--
-- Table structure for table `os`
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
-- Dumping data for table `os`
--

INSERT INTO `os` (`id`, `name`, `series`, `edition`, `language`, `architecture`, `brand`, `format`, `license`) VALUES
(1, 'Windows 10 Home PL', 'Windows 10', 'Home', 'pl', '32-bit', 'Microsoft', 'CD', 'OEM'),
(2, 'Windows 7 Professional', 'Windows 7', 'Proffesional', 'pl', '64-bit', 'Microsoft', 'USB', 'OEM');

-- --------------------------------------------------------

--
-- Table structure for table `picture`
--

CREATE TABLE IF NOT EXISTS `picture` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=21 ;

--
-- Dumping data for table `picture`
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
(20, '1d421590e02d216a60484ca5744379d8.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `printer`
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
-- Dumping data for table `printer`
--

INSERT INTO `printer` (`id`, `name`, `model`, `type`, `manufacturer`, `powerSupply`, `price`, `addDate`, `purchaseDate`, `macAddress`, `ipAddress`, `picture`) VALUES
(1, 'HP Deskjet nr 2', 'DeskJet 3200', 'Laser', 'HP', '300W', '340 PLN', '2017-03-23 00:00:00', '2017-03-23 00:00:00', '-', '-', ''),
(2, 'HP Deskjet nr 3', 'DeskJet 3200', 'Laser', 'HP', '300W', '340 PLN', '2017-03-23 00:00:00', '2017-03-23 00:00:00', '-', '-', '');

-- --------------------------------------------------------

--
-- Table structure for table `ramslot_desktopram`
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
-- Table structure for table `ram_slot`
--

CREATE TABLE IF NOT EXISTS `ram_slot` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `computer_id` int(11) DEFAULT NULL,
  `desktop_ram_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_25F5B530C076F052` (`desktop_ram_id`),
  KEY `IDX_25F5B530A426D518` (`computer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `ram_slot`
--

INSERT INTO `ram_slot` (`id`, `computer_id`, `desktop_ram_id`) VALUES
(2, 9, 1),
(3, 9, 2),
(4, 4, 2),
(5, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sdd`
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
-- Dumping data for table `sdd`
--

INSERT INTO `sdd` (`id`, `name`, `model`, `series`, `brand`, `capacity`, `formFactor`, `interface`) VALUES
(1, 'Kingston V300 120GB SATA3', 'SV300S37A/120G', 'V300', 'Kingston', 160, '2,5"', 'SATA III');

-- --------------------------------------------------------

--
-- Table structure for table `ssd`
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
-- Dumping data for table `ssd`
--

INSERT INTO `ssd` (`id`, `name`, `model`, `series`, `brand`, `capacity`, `formFactor`, `interface`) VALUES
(1, 'vfg', 'ffg', 'gfgf', 'gfgf', 160, '2,5"', 'SAS');

-- --------------------------------------------------------

--
-- Table structure for table `storage_controller`
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=50 ;

--
-- Dumping data for table `storage_controller`
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
(49, 10, NULL, NULL, 2);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `computer`
--
ALTER TABLE `computer`
  ADD CONSTRAINT `FK_A298A7A6529427D2` FOREIGN KEY (`computerformfactor_id`) REFERENCES `computer_form_factor` (`id`),
  ADD CONSTRAINT `FK_A298A7A67D207878` FOREIGN KEY (`computeros_id`) REFERENCES `os` (`id`),
  ADD CONSTRAINT `FK_A298A7A6ACDB8124` FOREIGN KEY (`computercpu_id`) REFERENCES `desktop_c_p_u` (`id`);

--
-- Constraints for table `computers_licenses`
--
ALTER TABLE `computers_licenses`
  ADD CONSTRAINT `FK_41DDF0AC460F904B` FOREIGN KEY (`license_id`) REFERENCES `license` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_41DDF0ACA426D518` FOREIGN KEY (`computer_id`) REFERENCES `computer` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `computers_pictures`
--
ALTER TABLE `computers_pictures`
  ADD CONSTRAINT `FK_B193D053A426D518` FOREIGN KEY (`computer_id`) REFERENCES `computer` (`id`),
  ADD CONSTRAINT `FK_B193D053EE45BDBF` FOREIGN KEY (`picture_id`) REFERENCES `picture` (`id`);

--
-- Constraints for table `cpmputers_pictures`
--
ALTER TABLE `cpmputers_pictures`
  ADD CONSTRAINT `FK_60407AFBA426D518` FOREIGN KEY (`computer_id`) REFERENCES `computer` (`id`),
  ADD CONSTRAINT `FK_60407AFBEE45BDBF` FOREIGN KEY (`picture_id`) REFERENCES `picture` (`id`);

--
-- Constraints for table `desktop`
--
ALTER TABLE `desktop`
  ADD CONSTRAINT `FK_96105A41764D7EB` FOREIGN KEY (`desktopos_id`) REFERENCES `os` (`id`),
  ADD CONSTRAINT `FK_96105A453310D1` FOREIGN KEY (`desktopformfactor_id`) REFERENCES `computer_form_factor` (`id`),
  ADD CONSTRAINT `FK_96105A4C5B70775` FOREIGN KEY (`desktopcpu_id`) REFERENCES `desktop_c_p_u` (`id`);

--
-- Constraints for table `desktops_licenses`
--
ALTER TABLE `desktops_licenses`
  ADD CONSTRAINT `FK_2AF2020E460F904B` FOREIGN KEY (`license_id`) REFERENCES `license` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_2AF2020EFFF2950E` FOREIGN KEY (`desktop_id`) REFERENCES `desktop` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `desktops_pictures`
--
ALTER TABLE `desktops_pictures`
  ADD CONSTRAINT `FK_DABC22F1EE45BDBF` FOREIGN KEY (`picture_id`) REFERENCES `picture` (`id`),
  ADD CONSTRAINT `FK_DABC22F1FFF2950E` FOREIGN KEY (`desktop_id`) REFERENCES `desktop` (`id`);

--
-- Constraints for table `desktop_desktopram`
--
ALTER TABLE `desktop_desktopram`
  ADD CONSTRAINT `FK_EEF30E2BC5101709` FOREIGN KEY (`desktopram_id`) REFERENCES `desktop_ram` (`id`),
  ADD CONSTRAINT `FK_EEF30E2BFFF2950E` FOREIGN KEY (`desktop_id`) REFERENCES `desktop` (`id`);

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `FK_5D9F75A148B3EEE4` FOREIGN KEY (`departament_id`) REFERENCES `departament` (`id`);

--
-- Constraints for table `employees_computers`
--
ALTER TABLE `employees_computers`
  ADD CONSTRAINT `FK_7DD45DA88C03F15C` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_7DD45DA8A426D518` FOREIGN KEY (`computer_id`) REFERENCES `computer` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `employees_desktops`
--
ALTER TABLE `employees_desktops`
  ADD CONSTRAINT `FK_B48D07838C03F15C` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_B48D0783FFF2950E` FOREIGN KEY (`desktop_id`) REFERENCES `desktop` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `employees_laptops`
--
ALTER TABLE `employees_laptops`
  ADD CONSTRAINT `FK_2A57E6748C03F15C` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_2A57E674D59905E5` FOREIGN KEY (`laptop_id`) REFERENCES `laptop` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `employees_licenses`
--
ALTER TABLE `employees_licenses`
  ADD CONSTRAINT `FK_103C143460F904B` FOREIGN KEY (`license_id`) REFERENCES `license` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_103C1438C03F15C` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `interface_pci`
--
ALTER TABLE `interface_pci`
  ADD CONSTRAINT `FK_B9C7D1AC93E80FA1` FOREIGN KEY (`$cardGpu_id`) REFERENCES `gpu` (`id`),
  ADD CONSTRAINT `FK_B9C7D1ACA426D518` FOREIGN KEY (`computer_id`) REFERENCES `computer` (`id`);

--
-- Constraints for table `laptops_licenses`
--
ALTER TABLE `laptops_licenses`
  ADD CONSTRAINT `FK_175EEFA6460F904B` FOREIGN KEY (`license_id`) REFERENCES `license` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_175EEFA6D59905E5` FOREIGN KEY (`laptop_id`) REFERENCES `laptop` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `network_interface_card`
--
ALTER TABLE `network_interface_card`
  ADD CONSTRAINT `FK_1A8946F1A426D518` FOREIGN KEY (`computer_id`) REFERENCES `computer` (`id`);

--
-- Constraints for table `ramslot_desktopram`
--
ALTER TABLE `ramslot_desktopram`
  ADD CONSTRAINT `FK_A6874BA1C5101709` FOREIGN KEY (`desktopram_id`) REFERENCES `desktop_ram` (`id`),
  ADD CONSTRAINT `FK_A6874BA1D549D3BC` FOREIGN KEY (`ramslot_id`) REFERENCES `ram_slot` (`id`);

--
-- Constraints for table `ram_slot`
--
ALTER TABLE `ram_slot`
  ADD CONSTRAINT `FK_25F5B530A426D518` FOREIGN KEY (`computer_id`) REFERENCES `computer` (`id`),
  ADD CONSTRAINT `FK_25F5B530C076F052` FOREIGN KEY (`desktop_ram_id`) REFERENCES `desktop_ram` (`id`);

--
-- Constraints for table `storage_controller`
--
ALTER TABLE `storage_controller`
  ADD CONSTRAINT `FK_DCA560141493816F` FOREIGN KEY (`hdd_id`) REFERENCES `hdd` (`id`),
  ADD CONSTRAINT `FK_DCA560146C883558` FOREIGN KEY (`optical_drive_id`) REFERENCES `optical_drive` (`id`),
  ADD CONSTRAINT `FK_DCA56014A426D518` FOREIGN KEY (`computer_id`) REFERENCES `computer` (`id`),
  ADD CONSTRAINT `FK_DCA56014AF4238A5` FOREIGN KEY (`ssd_id`) REFERENCES `ssd` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
