-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 04, 2015 at 07:09 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cbsi_movies_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `actors`
--

CREATE TABLE IF NOT EXISTS `actors` (
  `id` int(11) NOT NULL,
  `fullName` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `actors`
--

INSERT INTO `actors` (`id`, `fullName`) VALUES
(1, 'Darren Syu'),
(2, 'Robyn Battle'),
(3, 'Oliver Dario'),
(4, 'James Peng'),
(5, 'Chris Pratt'),
(6, 'Keith Koski'),
(7, 'Gustavo Figueroa'),
(8, 'Jackie Chan'),
(9, 'Amy Poehler'),
(10, 'George Clooney'),
(11, 'Brad Pitt');

-- --------------------------------------------------------

--
-- Table structure for table `characters`
--

CREATE TABLE IF NOT EXISTS `characters` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `actorId` int(11) NOT NULL,
  `movieId` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `characters`
--

INSERT INTO `characters` (`id`, `name`, `actorId`, `movieId`) VALUES
(1, 'Joy', 9, 1),
(2, 'Sadness', 1, 1),
(3, 'Disgust', 4, 1),
(4, 'Anger', 3, 1),
(5, 'Dentist', 1, 5),
(6, 'Doctor', 9, 5),
(7, 'Sammie', 5, 5),
(8, 'Ralphie', 10, 5),
(9, 'Sam', 3, 4),
(10, 'Danny', 10, 4),
(11, 'Rusty', 11, 4),
(12, 'Barney', 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE IF NOT EXISTS `companies` (
  `id` int(11) NOT NULL,
  `companyName` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `companyName`) VALUES
(1, 'Walt Disney Productions'),
(2, 'Pixar Animation Studios'),
(3, 'Warner Bros. Entertainment Inc.');

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE IF NOT EXISTS `movies` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL COMMENT 'Title of Movie',
  `companyId` varchar(50) NOT NULL COMMENT 'Name of Production Company',
  `revenue` decimal(20,2) NOT NULL,
  `cost` decimal(20,2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `title`, `companyId`, `revenue`, `cost`) VALUES
(1, 'Inside Out', '2', '123456789.00', '98765432.00'),
(4, 'Ocean''s 11', '1', '855621479.00', '12358563.00'),
(5, 'Jurassic World', '3', '556846789.00', '11254685.00');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE IF NOT EXISTS `payments` (
  `id` int(11) NOT NULL,
  `actorId` varchar(50) NOT NULL,
  `movieId` varchar(50) NOT NULL,
  `basePay` decimal(15,2) NOT NULL,
  `revShare` decimal(4,2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `actorId`, `movieId`, `basePay`, `revShare`) VALUES
(1, '1', '1', '1234567.00', '11.00'),
(2, '9', '1', '12345678.00', '15.00'),
(3, '3', '1', '1234567.00', '12.00'),
(4, '4', '1', '1234567.00', '13.00'),
(13, '10', '4', '83415166.00', '16.00'),
(14, '11', '4', '1565225.00', '12.00'),
(15, '1', '4', '7853513.00', '11.00'),
(16, '3', '4', '3258946.00', '14.00'),
(17, '1', '5', '456561.00', '1.00'),
(18, '9', '5', '8568156.00', '12.00'),
(19, '5', '5', '58789556.00', '15.00'),
(20, '10', '5', '5651235.00', '21.00');

-- --------------------------------------------------------

--
-- Table structure for table `scripts`
--

CREATE TABLE IF NOT EXISTS `scripts` (
  `id` int(11) NOT NULL,
  `movieId` int(11) NOT NULL,
  `characterId` int(11) NOT NULL,
  `lineNum` int(11) NOT NULL,
  `lineText` varchar(80) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `scripts`
--

INSERT INTO `scripts` (`id`, `movieId`, `characterId`, `lineNum`, `lineText`) VALUES
(1, 1, 1, 1, 'My name is Joy! This is my friend Sadness and Danny.'),
(4, 4, 10, 1, 'Barney, Rusty, and Danny should rob a bank!'),
(5, 1, 1, 2, 'One two three four five Sadness.'),
(6, 1, 1, 4, 'HELP I''M STUCK'),
(7, 4, 11, 5, 'What''s the connection'),
(8, 5, 6, 3, 'This better work cause I got a lot riding on this...'),
(9, 1, 2, 15, 'My name is Sadness. Joy is Joy.'),
(10, 4, 11, 46, 'Danny you got this all wrong!'),
(11, 4, 11, 53, 'Barney go handle Danny''s business'),
(12, 4, 11, 54, 'Rusty is my name and Danny is my friend.'),
(13, 5, 9, 85, 'The Dentist is with the Doctor looking at Sammie'),
(14, 5, 8, 74, 'Ralphie killed the Dentist'),
(15, 1, 1, 34, 'This is Anger.'),
(17, 1, 2, 75, 'I''m positive we''ll fail.'),
(18, 1, 4, 85, 'I''m Anger. I guess Joy is okay...'),
(19, 1, 3, 55, 'I''m Disgust. Leave me ALONE.'),
(20, 5, 5, 88, 'Veni, Vidi, Vici'),
(21, 5, 7, 57, 'The Doctor is in.'),
(22, 4, 12, 745, '''Tis a dark road with Rusty at the wheel, but Danny makes it okay.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actors`
--
ALTER TABLE `actors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `characters`
--
ALTER TABLE `characters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scripts`
--
ALTER TABLE `scripts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `actors`
--
ALTER TABLE `actors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `characters`
--
ALTER TABLE `characters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `scripts`
--
ALTER TABLE `scripts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
