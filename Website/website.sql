-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2020 at 09:01 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `website`
--

-- --------------------------------------------------------

--
-- Table structure for table `journeys`
--

CREATE TABLE `journeys` (
  `id` int(11) NOT NULL,
  `origin` varchar(50) NOT NULL,
  `destination` varchar(50) NOT NULL,
  `distance` varchar(10) NOT NULL,
  `duration` varchar(30) NOT NULL,
  `carbon_output` varchar(30) NOT NULL,
  `vehicle` varchar(30) NOT NULL,
  `userid` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `journeys`
--

INSERT INTO `journeys` (`id`, `origin`, `destination`, `distance`, `duration`, `carbon_output`, `vehicle`, `userid`, `date`, `time`) VALUES
(20, '151 Lightfoot Ln, Higher Bartle, Preston PR4 0LA, ', '32 Golgotha Rd, Lancaster LA1 3AA, UK', '31.9 km', '30 mins', '4991', 'Delivery Van', 6, '2020-02-11', '00:00:00'),
(23, '151 Lightfoot Ln, Higher Bartle, Preston PR4 0LA, ', '65 St Oswald St, Lancaster LA1 3AS, UK', '32.6 km', '40 mins', '5440', 'Medium Van', 6, '2020-02-21', '02:15:46'),
(24, '124 Christchurch Rd, Streatham Hill, London SW2 3D', 'Bailrigg, Lancaster LA1 4YW, UK', '406 km', '4 hours 34 mins', '56840', 'Sedan', 6, '2020-02-21', '02:38:10'),
(25, 'Bailrigg, Lancaster LA1 4YW, UK', '32 Golgotha Rd, Lancaster LA1 3AA, UK', '4.7 km', '8 mins', '920', 'Coupe', 6, '2020-02-21', '02:38:11'),
(26, 'St Oswald St, Lancaster LA1, UK', 'Golgotha Rd, Lancaster LA1, UK', '0.7 km', '2 mins', '0', 'Large Van', 6, '2020-02-21', '02:38:15'),
(27, 'King St, Lancaster LA1 1RE, UK', 'Cable St, Lancaster LA1 1HH, UK', '1.0 km', '3 mins', '161', 'Delivery Van', 6, '2020-02-21', '12:22:04'),
(28, 'King St, Lancaster LA1 1RE, UK', 'Albany St, Newport NP20 5NJ, UK', '364 km', '3 hours 52 mins', '58604', 'Delivery Van', 6, '2020-02-21', '12:22:05');

-- --------------------------------------------------------

--
-- Table structure for table `shops`
--

CREATE TABLE `shops` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `street` varchar(30) NOT NULL,
  `city` varchar(30) NOT NULL,
  `postcode` varchar(15) NOT NULL,
  `country` varchar(30) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shops`
--

INSERT INTO `shops` (`id`, `name`, `street`, `city`, `postcode`, `country`, `userid`) VALUES
(9, 'Tesco Express', 'King St', 'Lancaster', 'LA1 1RE', ' United Kingdom', 6),
(10, 'Sainsbury\'s', 'Cable St', 'Lancaster', 'LA1 1HH', ' United Kingdom', 6),
(12, 'Sainsbury\'s', 'Albany St', 'Newport', 'NP20 5NJ', ' United Kingdom', 6),
(14, 'Tesco Extra', 'Spytty Rd', 'Newport', 'NP19 4TX', ' United Kingdom', 6);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(6, 'terraformz', 'wkddchelsea'),
(7, 'yhboii', 'wkddchelsea'),
(8, 'yhboiiiiii', 'wkddchelsea');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `journeys`
--
ALTER TABLE `journeys`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `shops`
--
ALTER TABLE `shops`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `journeys`
--
ALTER TABLE `journeys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `shops`
--
ALTER TABLE `shops`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `journeys`
--
ALTER TABLE `journeys`
  ADD CONSTRAINT `userid` FOREIGN KEY (`userid`) REFERENCES `users` (`id`);

--
-- Constraints for table `shops`
--
ALTER TABLE `shops`
  ADD CONSTRAINT `shops_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
