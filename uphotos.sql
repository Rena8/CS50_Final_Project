-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2015 at 05:12 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `uphotos`
--

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE IF NOT EXISTS `photos` (
  `number` int(10) NOT NULL,
  `id` int(10) NOT NULL,
  `title` varchar(45) NOT NULL,
  `filename` varchar(100) NOT NULL,
  `votes` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) NOT NULL,
  `username` varchar(45) NOT NULL,
  `hash` varchar(45) NOT NULL,
  `votes` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 COMMENT='store user info';

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `hash`, `votes`) VALUES
(1, 'nick', '$1$tw..yZ..$gO3q.nPYVvqE6iWqeMWZa.', 1),
(2, 'admin', '$1$Tv/.gQ2.$IMGBj81z86eBxwN0zW3U6.', 4),
(3, 'bob', '$1$Lf..2z2.$TZQ7wpfUyAolrLkG0wlNt1', 0),
(4, 'my name', '$1$xx..mt3.$QlRdSCTyXFZYz5bbqkppe1', 0),
(5, 'Werian', '$1$vG0.Mr2.$/KUijmPh5CXBRYKDKdYiP0', 0),
(6, 'nick1', '$1$232.h61.$VvDEeIdyG1kju0pT8HcyS0', 2),
(7, 'random', '$1$cy5./f1.$LKMFU0BKFhbBldWsVyThB0', 0),
(8, 'random account', '$1$Zb5.um3.$xzXlHKmGGNAn5pe/alZNH.', 1),
(9, 'account', '$1$eV4.P35.$1ZpO9j2r14Ydde8YeObzJ1', 0),
(10, 'account1', '$1$7g..C20.$PoEhP463y2PeBHUjIK9le0', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`number`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `number` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
