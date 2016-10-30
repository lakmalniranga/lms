-- phpMyAdmin SQL Dump
-- version 4.6.3deb1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 25, 2016 at 12:05 PM
-- Server version: 5.6.27-2
-- PHP Version: 5.6.22-2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `batch`
--

CREATE TABLE `batch` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `start_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `batch`
--

INSERT INTO `batch` (`id`, `course_id`, `name`, `start_date`) VALUES
(7, 1, 'Year 1 ', '2016-10-25 08:30:16'),
(8, 2, 'Year 1', '2016-10-25 08:31:00');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `faculty_id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `faculty_id`, `name`, `date`) VALUES
(1, 1, 'Plymouth Newtorking', '2016-10-25 02:45:51'),
(2, 2, 'Managment Informatoion Technology BSC hons', '2016-10-25 02:46:18');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`id`, `name`, `date`) VALUES
(1, 'SCHOOL OF COMPUTING', '2016-10-24 23:25:52'),
(2, 'SCHOOL OF MANAGMENT', '2016-10-24 23:26:44'),
(4, 'SCHOOL OF ENGINERING', '2016-10-24 23:31:46');

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

CREATE TABLE `module` (
  `id` int(11) NOT NULL,
  `module_code` varchar(50) NOT NULL,
  `course_id` int(11) NOT NULL,
  `batch_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `publish` int(11) NOT NULL DEFAULT '1',
  `public` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `module`
--

INSERT INTO `module` (`id`, `module_code`, `course_id`, `batch_id`, `name`, `publish`, `public`, `date`) VALUES
(4, '', 2, 7, 'Database Design', 1, 0, '2016-10-25 09:13:43');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `notice` text NOT NULL,
  `default` int(11) NOT NULL DEFAULT '0',
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`id`, `title`, `notice`, `default`, `date`) VALUES
(1, 'Test Notice edited', 'This is a test notice edited', 1, '2016-10-24 21:36:20');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(15) NOT NULL,
  `permissions` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `permissions`) VALUES
(1, 'Student', '{"student": 1}'),
(2, 'Administrator', '{"admin": 1}'),
(3, 'Teacher', '{"teacher": 1}');

-- --------------------------------------------------------

--
-- Table structure for table `sub_module`
--

CREATE TABLE `sub_module` (
  `id` int(11) NOT NULL,
  `module_id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `file` varchar(250) NOT NULL,
  `publish` int(11) NOT NULL DEFAULT '1',
  `public` int(11) NOT NULL DEFAULT '1',
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_module`
--

INSERT INTO `sub_module` (`id`, `module_id`, `name`, `description`, `file`, `publish`, `public`, `date`) VALUES
(1, 4, 'Test Module ', 'This is a Test Module', '580ee28c76b00_rsz_me.jpg', 1, 1, '2016-10-25 10:02:30');

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
  `mobile` int(15) DEFAULT NULL,
  `faculty_id` int(11) NOT NULL,
  `joined` datetime NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `salt`, `name`, `email`, `mobile`, `faculty_id`, `joined`, `role`) VALUES
(6, 'admin', 'ca93ed2df2ad82f39de74eaa681dc61c2e46b2f42eacde9092e955f98035364d', '‰í{£Î–Èá•ÈdiËq!»rÿú¡U¹q]•Þ.', 'lakmal nirangana', 'lakmal@lakma.com', 0, 0, '2016-10-11 22:44:00', 2),
(7, 'kavindya', 'c646a97311b8c5a6c1489df6fc0f11f8839c22d2638d23ceed1e8da2d4efc2c2', 'Šñ%›OóQ!H›Šy±}Å|~H.žDÌÝßqº', 'lakmal', 'nirangana@gmail.com', 0, 0, '2016-10-11 22:48:13', 2),
(8, 'absjkas', '6c159ac061831f4ca2a5eabf5b5ec5a98fb12f52aad44f9acb1d4811a964cfdd', '¢ •ô,:èn´ \ZƒZ|·cê‘HÄÅ#—1„©K‰', 'gacajk', 'chandani@ga.com', 0, 0, '2016-10-11 22:55:39', 2),
(9, 'testuser', 'b528fdfbde3fa0c12a8cd122318c7cd444acdeb950e15fd17596119c68ea7f69', 'nR  Ò±ðÒZ\'à£¿YƒF™ëé‰ºÐ ¬A³äXb', 'testuser', 'test@tes.com', 0, 0, '2016-10-12 10:04:23', 2),
(10, '123456', '331832ff83fc4fae358978d57d12a46bd962755ba0574490f25ea1332333b9a8', 'îo5nz\Zê.´‹àÚkk¹¸5>ÿ‰ÝÜNÐOeÖ', '123456123456', '123123@123.com', 0, 0, '2016-10-12 10:09:47', 3),
(11, 'lakmal', 'cae0b434fbb49ecf11320a03c0f17b20d675f7f523e0c4d0379a22c8412a85a5', 'ã.le%žØ9‘`–æb äÔåI°\n‚´ŸºY2CY}', 'lakmal', 'lakmal@lakmal.com', 0, 0, '2016-10-14 11:40:11', 3),
(12, 'student', '88e84ee9e14711b98163d44f7e74c627eae10a3c2e3af30a77739843ccd83206', 'ê&©_vN–˜·\nçâù^á°©_[Æ¨`cf:E', 'lakmal', 'lakmal@lakmal.com', 0, 0, '2016-10-24 12:09:45', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_session`
--

CREATE TABLE `user_session` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `hash` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_session`
--

INSERT INTO `user_session` (`id`, `user_id`, `hash`) VALUES
(3, 6, '33327896a55e8f1ec325e17696093abe11c20b5b17ba70a23e47d44c0292d5be');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `batch`
--
ALTER TABLE `batch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_module`
--
ALTER TABLE `sub_module`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_session`
--
ALTER TABLE `user_session`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `batch`
--
ALTER TABLE `batch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `module`
--
ALTER TABLE `module`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `sub_module`
--
ALTER TABLE `sub_module`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `user_session`
--
ALTER TABLE `user_session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;