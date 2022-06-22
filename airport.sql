-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2022 at 04:14 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `airport`
--

-- --------------------------------------------------------

--
-- Table structure for table `airport`
--

CREATE TABLE `airport` (
  `p_capacity` int(11) DEFAULT NULL,
  `address` char(50) DEFAULT NULL,
  `name` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `airport`
--

INSERT INTO `airport` (`p_capacity`, `address`, `name`) VALUES
(125, 'Muratpaşa,Antalya', 'Antalya'),
(170, 'Bakırköy,İstanbul', 'Atatürk'),
(250, 'Tayakadın,Arnavutköy', 'İstanbul'),
(150, 'Dalaman,Muğla', 'Dalaman'),
(50, 'Bağlar,Diyarbakır', 'Diyarbakır'),
(40, 'Yazıkonak,Elazığ', 'Elazığ'),
(65, 'Kocasinan,Kayseri', 'Erkilet'),
(45, 'Çiftlikköy,Erzurum', 'Erzurum'),
(75, 'Akyurt,Ankara', 'Esenboğa'),
(100, 'Selçuklu,Konya', 'Konya');

-- --------------------------------------------------------

--
-- Table structure for table `buys`
--

CREATE TABLE `buys` (
  `id` int(11) NOT NULL,
  `name` char(50) NOT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `buys`
--

INSERT INTO `buys` (`id`, `name`, `quantity`) VALUES
(2, 'Water', 14),
(4, 'Breakfast', 1),
(7, 'Breakfast', 3),
(11, 'Pringles', 3);

-- --------------------------------------------------------

--
-- Table structure for table `flies`
--

CREATE TABLE `flies` (
  `id` int(11) NOT NULL,
  `plane_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `flies`
--

INSERT INTO `flies` (`id`, `plane_id`) VALUES
(6, 1),
(7, 1),
(2, 4),
(1, 6),
(11, 7);

-- --------------------------------------------------------

--
-- Table structure for table `flies_to`
--

CREATE TABLE `flies_to` (
  `name` char(50) DEFAULT NULL,
  `plane_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `flies_to`
--

INSERT INTO `flies_to` (`name`, `plane_id`) VALUES
('İstanbul', 3),
('İstanbul', 8),
('Dalaman', 7),
('Esenboğa', 10);

-- --------------------------------------------------------

--
-- Table structure for table `flight_attendant`
--

CREATE TABLE `flight_attendant` (
  `fa_id` int(11) NOT NULL,
  `name` char(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `flight_attendant`
--

INSERT INTO `flight_attendant` (`fa_id`, `name`) VALUES
(1, 'Boztaş Akçay'),
(2, 'İldem Sezgin'),
(3, 'Erik Mansız'),
(4, 'Neptün İnönü'),
(5, 'Polat Alemdar');

-- --------------------------------------------------------

--
-- Table structure for table `hosts`
--

CREATE TABLE `hosts` (
  `fa_id` int(11) NOT NULL,
  `plane_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hosts`
--

INSERT INTO `hosts` (`fa_id`, `plane_id`) VALUES
(1, 1),
(2, 1),
(4, 9);

-- --------------------------------------------------------

--
-- Table structure for table `in_flight_purchasables`
--

CREATE TABLE `in_flight_purchasables` (
  `name` char(50) NOT NULL,
  `price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `in_flight_purchasables`
--

INSERT INTO `in_flight_purchasables` (`name`, `price`) VALUES
('Breakfast', 22),
('Coca-Cola', 9),
('Fanta', 9),
('Indomie Noodle', 15),
('Pringles', 40),
('Sprite', 9),
('Water', 6);

-- --------------------------------------------------------

--
-- Table structure for table `operates`
--

CREATE TABLE `operates` (
  `p_id` int(11) NOT NULL,
  `plane_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `operates`
--

INSERT INTO `operates` (`p_id`, `plane_id`) VALUES
(1, 1),
(3, 1),
(4, 2),
(2, 5),
(5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `parks_at`
--

CREATE TABLE `parks_at` (
  `name` char(50) DEFAULT NULL,
  `plane_id` int(11) NOT NULL,
  `parking_lot` char(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `parks_at`
--

INSERT INTO `parks_at` (`name`, `plane_id`, `parking_lot`) VALUES
('Atatürk', 6, '3'),
('İstanbul', 4, '12'),
('Dalaman', 2, '1');

-- --------------------------------------------------------

--
-- Table structure for table `passenger`
--

CREATE TABLE `passenger` (
  `id` int(11) NOT NULL,
  `name` char(50) DEFAULT NULL,
  `age` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `passenger`
--

INSERT INTO `passenger` (`id`, `name`, `age`) VALUES
(1, 'Aleyna Özsoy', 18),
(2, 'Şemsettin Bilgin', 43),
(3, 'Gencaslan Şener', 32),
(4, 'Ulu Duran', 25),
(6, 'Barış Akarsu', 28),
(7, 'Barış Özcan', 39),
(8, 'Ethem Doğan', 90),
(11, 'Sertaç İvacık', 20);

-- --------------------------------------------------------

--
-- Table structure for table `pilot`
--

CREATE TABLE `pilot` (
  `p_id` int(11) NOT NULL,
  `name` char(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pilot`
--

INSERT INTO `pilot` (`p_id`, `name`) VALUES
(1, 'Bartu Doğan'),
(2, 'Lider Büyükçanak'),
(3, 'Azize Zorlu Durdu'),
(4, 'Yaşar Sezer'),
(5, 'Eraslan Şensoy'),
(6, 'Ömer Sercan İpekçioğlu'),
(7, 'Ege Cinel'),
(8, 'Egemen İhsanoğlu'),
(9, 'Elijah Wood');

-- --------------------------------------------------------

--
-- Table structure for table `plane`
--

CREATE TABLE `plane` (
  `plane_id` int(11) NOT NULL,
  `s_capacity` int(11) DEFAULT NULL,
  `model` char(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `plane`
--

INSERT INTO `plane` (`plane_id`, `s_capacity`, `model`) VALUES
(1, 140, 'Airbus A220'),
(2, 180, 'Airbus A320'),
(3, 150, 'Boeing 737'),
(4, 320, 'Boeing 787'),
(5, 350, 'Airbus A350'),
(6, 140, 'Boeing 737'),
(7, 125, 'Airbus A220'),
(8, 200, 'Airbus A320'),
(9, 410, 'Boeing 747'),
(10, 190, 'Airbus A320');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `airport`
--
ALTER TABLE `airport`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `buys`
--
ALTER TABLE `buys`
  ADD PRIMARY KEY (`id`,`name`),
  ADD KEY `name` (`name`);

--
-- Indexes for table `flies`
--
ALTER TABLE `flies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `plane_id` (`plane_id`);

--
-- Indexes for table `flies_to`
--
ALTER TABLE `flies_to`
  ADD PRIMARY KEY (`plane_id`),
  ADD KEY `name` (`name`);

--
-- Indexes for table `flight_attendant`
--
ALTER TABLE `flight_attendant`
  ADD PRIMARY KEY (`fa_id`);

--
-- Indexes for table `hosts`
--
ALTER TABLE `hosts`
  ADD PRIMARY KEY (`fa_id`),
  ADD KEY `plane_id` (`plane_id`);

--
-- Indexes for table `in_flight_purchasables`
--
ALTER TABLE `in_flight_purchasables`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `operates`
--
ALTER TABLE `operates`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `plane_id` (`plane_id`);

--
-- Indexes for table `parks_at`
--
ALTER TABLE `parks_at`
  ADD PRIMARY KEY (`plane_id`),
  ADD UNIQUE KEY `parks_at_ibfk_3` (`name`,`parking_lot`),
  ADD KEY `name` (`name`);

--
-- Indexes for table `passenger`
--
ALTER TABLE `passenger`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pilot`
--
ALTER TABLE `pilot`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `plane`
--
ALTER TABLE `plane`
  ADD PRIMARY KEY (`plane_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buys`
--
ALTER TABLE `buys`
  ADD CONSTRAINT `buys_ibfk_1` FOREIGN KEY (`id`) REFERENCES `passenger` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `buys_ibfk_2` FOREIGN KEY (`name`) REFERENCES `in_flight_purchasables` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `flies`
--
ALTER TABLE `flies`
  ADD CONSTRAINT `flies_ibfk_1` FOREIGN KEY (`id`) REFERENCES `passenger` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `flies_ibfk_2` FOREIGN KEY (`plane_id`) REFERENCES `plane` (`plane_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `flies_to`
--
ALTER TABLE `flies_to`
  ADD CONSTRAINT `flies_to_ibfk_1` FOREIGN KEY (`name`) REFERENCES `airport` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `flies_to_ibfk_2` FOREIGN KEY (`plane_id`) REFERENCES `plane` (`plane_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hosts`
--
ALTER TABLE `hosts`
  ADD CONSTRAINT `hosts_ibfk_1` FOREIGN KEY (`fa_id`) REFERENCES `flight_attendant` (`fa_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hosts_ibfk_2` FOREIGN KEY (`plane_id`) REFERENCES `plane` (`plane_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `operates`
--
ALTER TABLE `operates`
  ADD CONSTRAINT `operates_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `pilot` (`p_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `operates_ibfk_2` FOREIGN KEY (`plane_id`) REFERENCES `plane` (`plane_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `parks_at`
--
ALTER TABLE `parks_at`
  ADD CONSTRAINT `parks_at_ibfk_1` FOREIGN KEY (`name`) REFERENCES `airport` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `parks_at_ibfk_2` FOREIGN KEY (`plane_id`) REFERENCES `plane` (`plane_id`) ON DELETE CASCADE ON UPDATE CASCADE;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;