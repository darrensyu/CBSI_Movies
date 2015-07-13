-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2015 at 07:46 AM
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
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `actors`
--

INSERT INTO `actors` (`id`, `fullName`) VALUES
(1, 'Darren Syu'),
(4, 'Robyn Battle'),
(6, 'Oliver Dario'),
(7, 'Gustavo Figueroa'),
(8, 'Keith Koski'),
(9, 'James Peng'),
(10, 'Tom Hanks'),
(30, 'Jackie Chan'),
(31, 'Sam Worthington'),
(32, 'Zoe Saldana'),
(33, 'Stephen Lang'),
(34, 'Michelle Rodriguez'),
(35, 'Leonardo DiCaprio'),
(36, 'Seth Rogan'),
(37, 'Chris Pratt'),
(38, 'Kristen Bell'),
(39, 'Johnny Depp'),
(40, 'Kevin Bacon');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE IF NOT EXISTS `companies` (
  `id` int(11) NOT NULL,
  `companyName` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `companyName`) VALUES
(4, 'Walt Disney Productions'),
(5, 'Pixar Animation Studios'),
(6, 'Warner Bros. Entertainment Inc.');

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE IF NOT EXISTS `movies` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL COMMENT 'Title of Movie',
  `companyName` varchar(50) NOT NULL COMMENT 'Name of Production Company',
  `revenue` decimal(20,2) NOT NULL,
  `cost` decimal(20,2) NOT NULL,
  `actor1` varchar(50) NOT NULL COMMENT 'Name of Actor 1',
  `base1` decimal(15,2) NOT NULL DEFAULT '0.00',
  `rev1` decimal(10,2) NOT NULL COMMENT 'Revenue Share of Actor 1',
  `actor2` varchar(50) NOT NULL COMMENT 'Name of Actor 2',
  `base2` decimal(15,2) NOT NULL DEFAULT '0.00',
  `rev2` decimal(10,2) NOT NULL COMMENT 'Revenue Share of Actor 2',
  `actor3` varchar(50) NOT NULL COMMENT 'Name of Actor 3',
  `base3` decimal(15,2) NOT NULL DEFAULT '0.00',
  `rev3` decimal(10,2) NOT NULL COMMENT 'Revenue Share of Actor 3',
  `actor4` varchar(50) NOT NULL COMMENT 'Name of Actor 4',
  `base4` decimal(15,2) NOT NULL DEFAULT '0.00',
  `rev4` decimal(10,2) NOT NULL COMMENT 'Revenue Share of Actor 4'
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `title`, `companyName`, `revenue`, `cost`, `actor1`, `base1`, `rev1`, `actor2`, `base2`, `rev2`, `actor3`, `base3`, `rev3`, `actor4`, `base4`, `rev4`) VALUES
(14, 'Inside Out', 'Pixar Animation Studios', '12312456.00', '9876235.00', 'Darren Syu', '1000.00', '10.00', 'Robyn Battle', '2500.88', '16.00', 'Oliver Dario', '1234.00', '11.00', 'James Peng', '1250.14', '10.50'),
(15, 'The Hobbit', 'Walt Disney Productions', '24213521.00', '11234512.00', 'Jackie Chan', '5326.00', '12.00', 'Tom Hanks', '5478.00', '11.00', 'Darren Syu', '1487.00', '15.00', 'Keith Koski', '1242.00', '22.00'),
(16, 'The Dark Knight Rises', 'Warner Bros. Entertainment Inc.', '1584632915.00', '250000000.00', 'Oliver Dario', '2503648.00', '15.00', 'Robyn Battle', '5698431.00', '20.00', 'James Peng', '1489793.00', '12.00', 'Keith Koski', '785695.00', '14.00'),
(17, 'The Book of Life', 'Pixar Animation Studios', '1123548652.00', '3455161231.00', 'Gustavo Figueroa', '54489566.00', '12.00', 'Tom Hanks', '1156385.00', '25.00', 'Robyn Battle', '9846308.00', '16.00', 'Darren Syu', '51038545.00', '5.00'),
(18, 'Avatar', 'Walt Disney Productions', '2787965087.00', '237165849.00', 'Sam Worthington', '56875963.00', '12.00', 'Zoe Saldana', '68912355.00', '16.00', 'Stephen Lang', '78412685.00', '15.00', 'Michelle Rodriguez', '7786134.00', '19.00'),
(19, 'Titanic', 'Warner Bros. Entertainment Inc.', '2186772302.00', '516324894.00', 'Leonardo DiCaprio', '45846354.00', '16.00', 'Robyn Battle', '7781295.00', '12.00', 'Oliver Dario', '5484568.00', '9.00', 'Jackie Chan', '89863486.00', '15.00'),
(20, 'The Avengers', 'Walt Disney Productions', '1518594910.00', '926538587.00', 'Seth Rogan', '85686946.00', '16.00', 'Darren Syu', '485163.00', '9.00', 'James Peng', '8548559.00', '15.00', 'Keith Koski', '4685325.00', '14.00'),
(21, 'Jurassic World', 'Pixar Animation Studios', '1465838000.00', '456581562.00', 'Chris Pratt', '84163522.00', '22.00', 'Robyn Battle', '65482157.00', '18.00', 'Gustavo Figueroa', '54313258.00', '14.00', 'Keith Koski', '61578953.00', '12.00'),
(22, 'Frozen', 'Walt Disney Productions', '1279852693.00', '1865813448.00', 'Jackie Chan', '84633574.00', '11.00', 'Kristen Bell', '56132568.00', '14.00', 'James Peng', '96341522.00', '15.00', 'Robyn Battle', '58138555.00', '19.00'),
(23, 'Forrest Gump', 'Pixar Animation Studios', '5187562451.00', '125884685.00', 'Oliver Dario', '8561385.00', '11.00', 'Gustavo Figueroa', '8146534.00', '15.00', 'Darren Syu', '14456305.00', '12.00', 'Tom Hanks', '96243215.00', '17.00'),
(24, 'Iron Man 3', 'Walt Disney Productions', '1215439994.00', '513256596.00', 'James Peng', '81635856.00', '14.00', 'Robyn Battle', '96314565.00', '15.00', 'Oliver Dario', '55623145.00', '11.00', 'Chris Pratt', '85632145.00', '19.00'),
(25, 'The Lion King', 'Walt Disney Productions', '987483777.00', '563119944.00', 'Tom Hanks', '1565225.00', '12.00', 'Darren Syu', '7853513.00', '11.00', 'Oliver Dario', '89525124.00', '15.00', 'Keith Koski', '85263521.00', '16.00'),
(26, 'Harry Potter and the Philosopher''s Stone', 'Walt Disney Productions', '947755371.00', '12548963.00', 'Robyn Battle', '83415166.00', '16.00', 'Gustavo Figueroa', '58726623.00', '11.00', 'Keith Koski', '7643282.00', '12.00', 'James Peng', '6523154.00', '15.00'),
(27, 'Transformers: Dark of the Moon', 'Pixar Animation Studios', '1123794079.00', '655328212.00', 'Darren Syu', '46131384.00', '11.00', 'James Peng', '95653228.00', '17.00', 'Tom Hanks', '82169435.00', '15.00', 'Leonardo DiCaprio', '4475135.00', '12.00'),
(28, 'Skyfall', 'Pixar Animation Studios', '1108531013.00', '834512586.00', 'Seth Rogan', '84335539.00', '7.00', 'Jackie Chan', '54151251.00', '9.00', 'Robyn Battle', '81235805.00', '21.00', 'Keith Koski', '91350758.00', '14.00'),
(29, 'The Lord of the Rings: The Return of the King', 'Pixar Animation Studios', '1119929521.00', '564852978.00', 'Seth Rogan', '8979566.00', '11.00', 'Jackie Chan', '8984524.00', '13.00', 'Zoe Saldana', '5612784.00', '8.00', 'Kristen Bell', '8974523.00', '17.00'),
(30, 'Ocean''s Eleven', 'Pixar Animation Studios', '855621479.00', '12358563.00', 'Sam Worthington', '2517456.00', '16.00', 'Michelle Rodriguez', '65232741.00', '18.00', 'Kristen Bell', '8529417.00', '7.00', 'Robyn Battle', '9696951.00', '11.00'),
(31, 'Pirates of the Caribbean: Dead Man''s Chest', 'Warner Bros. Entertainment Inc.', '1066179725.00', '267300000.00', 'Kristen Bell', '85416385.00', '14.00', 'Johnny Depp', '1325428.00', '15.00', 'Stephen Lang', '85224325.00', '11.00', 'Kevin Bacon', '8513325.00', '12.00'),
(32, 'X-Men: Days of Future Past', 'Warner Bros. Entertainment Inc.', '1045743805.00', '565271859.00', 'Kevin Bacon', '51254768.00', '11.00', 'Keith Koski', '54185188.00', '12.00', 'Oliver Dario', '96528456.00', '16.00', 'Stephen Lang', '8787515.00', '18.00'),
(33, 'Mad Max: Fury Road', 'Warner Bros. Entertainment Inc.', '1029936965.00', '485151812.00', 'Robyn Battle', '99568555.00', '19.00', 'Darren Syu', '51325842.00', '11.00', 'Oliver Dario', '89656554.00', '17.00', 'James Peng', '72828838.00', '15.00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actors`
--
ALTER TABLE `actors`
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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `actors`
--
ALTER TABLE `actors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
