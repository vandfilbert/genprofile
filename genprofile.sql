-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2019 at 12:10 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `genprofile`
--

-- --------------------------------------------------------

--
-- Table structure for table `access_menu`
--

CREATE TABLE `access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `access_menu`
--

INSERT INTO `access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(6, 2, 2),
(8, 1, 3),
(9, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `department` varchar(252) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `department`) VALUES
(1, 'Print Reporter'),
(2, 'Online Reporter'),
(3, 'Print Photographer'),
(4, 'Online Photographer'),
(5, 'Layout and Illustrator'),
(6, 'IT'),
(7, 'Research and Development'),
(8, 'Sponsorship'),
(9, 'Creative Content'),
(10, 'BPH');

-- --------------------------------------------------------

--
-- Table structure for table `fungsionaris`
--

CREATE TABLE `fungsionaris` (
  `id_fungsio` int(11) NOT NULL,
  `name` varchar(252) NOT NULL,
  `nrp` varchar(252) NOT NULL,
  `gender` varchar(252) NOT NULL,
  `address` varchar(252) NOT NULL,
  `birthplace` varchar(252) NOT NULL,
  `date_of_birth` text NOT NULL,
  `fungsio_picture` varchar(252) NOT NULL,
  `period_join` varchar(252) NOT NULL,
  `id_position` int(11) NOT NULL,
  `id_department` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fungsionaris`
--

INSERT INTO `fungsionaris` (`id_fungsio`, `name`, `nrp`, `gender`, `address`, `birthplace`, `date_of_birth`, `fungsio_picture`, `period_join`, `id_position`, `id_department`) VALUES
(1, 'Ultraman Baja Putih Sekali', 'c14170031', 'Female', 'Petemon 30 no.189-A', 'Surabaya', '02 August 2019', 'Logo_petra_lowres.jpg', '2017/2018', 2, 10),
(2, 'BoiBoiBoi', 'c14180058', 'Female', 'Pentol Dangsir', 'Surabaya', '15 February 2001', 'bongoCat.png', '2019/2020', 5, 2),
(3, 'Lalaaaaa', 'c14120036', 'Male', 'Pentol Swalayan', 'Surabaya', '01 January 1970', 'Online_Photographer2.png', '2019/2020', 5, 7),
(4, 'Lulu', 'c14120036', 'Female', 'Pentol Swalayan', 'Surabaya', '01 January 1970', 'Capture2.PNG', '2019/2020', 3, 10),
(5, 'Alex', 'b11170001', 'Male', 'Pentol Swalayan', 'Surabaya', '01 January 2015', 'Petra.png', '2019/2020', 1, 10),
(6, 'Coba', 'c14120036', 'Male', 'Pentol Swalayan', 'Surabaya', '08 August 2019', 'Petra1.png', '2019/2020', 5, 7),
(9, 'coba4', 'c14120036', 'Male', 'Pentol Swalayan', 'Surabaya', '01 August 2019', 'bongoCat.png', '2019/2020', 4, 7),
(11, 'coba10', 'c1417880', 'Male', 'dangsir', 'Malang', '01 April 2019', 'Capture21.PNG', '2017/2018', 5, 5),
(12, 'cobacoba', 'c12121212', 'Female', 'Gang Pentol', 'Magelang', '02 August 2019', 'Capture22.PNG', '2018/2019', 6, 5);

-- --------------------------------------------------------

--
-- Table structure for table `jabatan_fungsio`
--

CREATE TABLE `jabatan_fungsio` (
  `id` int(11) NOT NULL,
  `position` varchar(252) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan_fungsio`
--

INSERT INTO `jabatan_fungsio` (`id`, `position`) VALUES
(1, 'Chairman '),
(2, 'Chief Editor'),
(3, 'Secretary'),
(4, '\r\nTreasurer'),
(5, 'Head of Department'),
(6, 'Vice Head of Department');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `picture` text NOT NULL,
  `role_id` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `name`, `email`, `password`, `picture`, `role_id`, `active`) VALUES
(1, 'Admin', 'vand.filbert@gmail.com', '$2y$10$aDrOFcQPxgxKVEUhmPteIe/SaydEupAPMI3SSTW9NDdKkyRzCSc32', 'Capture21.PNG', 1, 1),
(2, 'Evandruce Filbert Foto', 'member@mail.com', '$2y$10$3/E6XZkmTBsoCD17UNgt8Ou9Y2uJJnIaogdDfS5QRcSoYojUdnKwO', 'Capture2.PNG', 2, 1),
(3, 'Online Photographer', 'member2@mail.com', '$2y$10$cNl3z30UMihCDnKFuslQpO8P0PZZXNESCCXqxhpoLvJS9ZugIqu66', 'Online_Photographer.png', 2, 1),
(4, 'coba', 'coba@mail.com', '$2y$10$t5en46xkNkUOlcfUwkBJKOqrrAz8Jr6TZv.90JLw3bW5BiUldFGlC', 'bongoCat.png', 2, 1),
(5, 'coba2', 'coba2@mail.com', '$2y$10$DorxoJvD/morGWsIvzpok.Wq9P1OaBak9mbrkXP91TJgefIQ/T/ci', 'bongoCat.png', 2, 1),
(6, 'coba3', 'coba3@mail.com', '$2y$10$TmTxFs/exAQZEUabvctEBeub4CGI1/6HTewL5V10W8FKVUsBM115K', 'bongoCat.png', 2, 1),
(7, 'membercoba', 'member@gmail.com', '$2y$10$kWW1mb9df3ljzvlRCD9WFe.eyo7q/Z75YNOW6d7YNRTyKczLNZiO2', 'bongoCat.png', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'Member'),
(3, 'addMenu');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Member'),
(4, 'cobahayooo'),
(5, 'coba lagi ah');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `url` varchar(250) NOT NULL,
  `icon` varchar(250) NOT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'GENTA Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'Profile', 'member', 'fas fa-fw fa-user', 1),
(3, 2, 'Edit Profile', 'member/editProfile', 'fas fa-fw fa-edit', 1),
(4, 3, 'Manage Menu', 'addMenu', 'fas fa-fw fa-list-ul', 1),
(5, 3, 'Manage Submenu', 'addMenu/subMenu', 'far fa-fw fa-caret-square-down', 1),
(8, 1, 'Role Management', 'admin/userRole', 'fas fa-fw fa-pencil-ruler', 1),
(10, 2, 'Change Password', 'member/changePassword', 'fab fa-fw fa-500px', 1),
(11, 1, 'Registration', 'admin/registration', 'fas fa-fw fa-cash-register', 1),
(13, 2, 'GENTA Data', 'member/fungsio', 'fas fa-fw fa-database', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access_menu`
--
ALTER TABLE `access_menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `role_id_2` (`role_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fungsionaris`
--
ALTER TABLE `fungsionaris`
  ADD PRIMARY KEY (`id_fungsio`),
  ADD KEY `nrp` (`nrp`);

--
-- Indexes for table `jabatan_fungsio`
--
ALTER TABLE `jabatan_fungsio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `access_menu`
--
ALTER TABLE `access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `fungsionaris`
--
ALTER TABLE `fungsionaris`
  MODIFY `id_fungsio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `jabatan_fungsio`
--
ALTER TABLE `jabatan_fungsio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `user_role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
