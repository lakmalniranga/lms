-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 25, 2016 at 04:55 PM
-- Server version: 5.7.13-0ubuntu0.16.04.2
-- PHP Version: 7.0.11-1+deb.sury.org~xenial+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms4`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` char(15) NOT NULL,
  `password` text NOT NULL,
  `salt` varchar(32) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(60) NOT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `faculty_id` int(11) DEFAULT NULL,
  `joined` datetime NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `salt`, `name`, `email`, `mobile`, `faculty_id`, `joined`, `role`) VALUES
(6, 'admin', 'b534f214aa2b2530b151059db2a6536582df8ba013b6e91046267e0d2725c6f4', 'Ô‰yBdbS\ZmÔø½é:p0\r›ï Â;¤2B', 'Bandusena Somapala', 'admin@admin.com', '711071851', 0, '2016-10-25 16:53:37', 2),
(13, 'stu-001', '67497439f6ea098aba9b3c1530a20e8dc4b9bc7ce22f9510c5f90a9020964974', '§äeJE™9³Ïë‡Xú‰\ZkŸî»x­è·××', 'Sirisena Rajapaksha', 'stu-001@lms.com', '711071851', 1, '2016-10-25 16:46:44', 1),
(15, 'lec-001', '13fc5e78731f90543d10d1686ba1d0f9ca50e862a53d1264ffe96222cc8512ce', 'Ž.zéôÑ5aJkêßÎ*Dîu|ìj…ô³\0xÿ†-â±', 'Sirisena Rajapaksha', 'lec-001@lms.com', '711071851', NULL, '2016-10-25 16:53:10', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
