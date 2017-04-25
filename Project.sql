-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2017 at 07:56 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cbo`
--
CREATE DATABASE IF NOT EXISTS `cbo` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;

USE `cho`;
-- --------------------------------------------------------

CREATE USER 'cbo'@'localhost' IDENTIFIED BY 'cho';

GRANT USAGE ON *.* TO 'cho'@'%';  
GRANT ALL PRIVILEGES ON `cho`.* TO 'cho'@'%';
GRANT ALL PRIVILEGES ON `cho\_%`.* TO 'cho'@'%';

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `sex` set('Male','Female') NOT NULL,
  `number` int(7) NOT NULL,
  `address` varchar(255) NOT NULL,
  `organization` set('Game Fish Association','Angling Society','Oceana Foundation') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `fname`, `lname`, `dob`, `sex`, `number`, `address`, `organization`) VALUES
(1, 'Steve', 'Gonzalez', '1970-01-01', 'Male', 6789045, '#70, 20th Street, Garnet Ville', 'Game Fish Association'),
(2, 'Glenda', 'Gay', '1971-02-02', 'Female', 2139078, '#71, 19th Street, Onyx Ville', 'Game Fish Association'),
(3, 'Roland', 'Blades', '1973-03-03', 'Male', 7236789, '#72, 18th Street, Aquamarine Ville', 'Game Fish Association'),
(4, 'Allan', 'Sieupersad', '1974-04-04', 'Male', 6511222, '#73, 16th Street, Diamond Town', 'Game Fish Association'),
(5, 'Paula', 'Beashel', '1975-05-05', 'Female', 3231769, '#75, 15th Street, Emerald Town', 'Angling Society'),
(6, 'Andy', 'Sibson', '1976-06-06', 'Male', 3909090, '#76, 14th Street, Pearl Ville', 'Angling Society'),
(7, 'Kelly', 'Taylor', '2017-04-24', 'Female', 5550123, '#77, 13th Street, Ruby Town', 'Angling Society'),
(8, 'Roy', 'Bridal', '1978-08-08', 'Male', 6559723, '#78, 12th Street, Peridot Town', 'Angling Society'),
(9, 'Roland', 'Birbal', '1979-09-09', 'Male', 6110909, '#79, 11th Street, Sapphire Ville', 'Oceana Foundation'),
(10, 'Michele', 'Taylor', '1980-10-10', 'Female', 6768888, '#80, 10th Street, Aquamarine Ville', 'Oceana Foundation'),
(11, 'Jenny', 'Nimmo', '1981-11-11', 'Female', 6517845, '#81, 9th Street, Topaz Town', 'Oceana Foundation'),
(12, 'Cecil', 'Layne', '1982-12-12', 'Male', 6344567, '#82, 8th Street, Zircon Ville', 'Oceana Foundation');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `organization` set('Game Fish Association','Angling Society','Oceana Foundation') NOT NULL,
  `type` set('Administrator','Editor','Viewer') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `organization`, `type`) VALUES
(1, 'jaden.lalla', '7208bcc4f12c41467b136eb782bc3636dfbd3adf', 'Game Fish Association', 'Administrator'),
(2, 'shanice', '2b22f352f04959e2f7cc63370baa27dd10dfbd16', 'Angling Society', 'Editor'),
(3, 'sarafina', 'dea04453c249149b5fc772d9528fe61afaf7441c', 'Oceana Foundation', 'Viewer'),
(4, 'Kelly.Ann', '088c5ab360928b33e94f3c22406ad4df52e0303c', 'Angling Society', 'Viewer'),
(5, 'bobby.brown', '89ed0e962e8187ae95803d09082c07fb6db709ae', 'Game Fish Association', 'Editor'),
(7, 'Kim Etwaru', 'abce48b74bd7f5ae3a30c4430ee45ffdd5f17722', 'Oceana Foundation', 'Viewer'),
(8, 'Test User', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'Angling Society', 'Viewer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
