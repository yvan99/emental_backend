-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2020 at 05:41 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `emental`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adm_id` int(11) NOT NULL,
  `adm_firstname` varchar(255) NOT NULL,
  `adm_lastname` varchar(255) NOT NULL,
  `adm_email` varchar(255) NOT NULL,
  `adm_phone` varchar(255) NOT NULL,
  `adm_password` varchar(255) NOT NULL,
  `adm_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adm_id`, `adm_firstname`, `adm_lastname`, `adm_email`, `adm_phone`, `adm_password`, `adm_status`) VALUES
(1, 'murenzi ', 'Elie', 'admin@emental.com', '0788440810', '$2y$10$YgmIIuvczkWre6W2ys3unOGezsfAgTCv/MqBVACO2DK5H94LWa2OO', 0);

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `blo_id` int(11) NOT NULL,
  `blo_title` varchar(255) NOT NULL,
  `blo_content` varchar(255) NOT NULL,
  `blo_date` datetime NOT NULL,
  `blo_status` int(11) NOT NULL,
  `blo_image` varchar(255) NOT NULL,
  `blo_video` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`blo_id`, `blo_title`, `blo_content`, `blo_date`, `blo_status`, `blo_image`, `blo_video`) VALUES
(7, 'nwfknsskl', 'mfknclknsvncslknlkvnwlks', '2020-12-21 00:00:00', 1, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `medics`
--

CREATE TABLE `medics` (
  `med_id` int(11) NOT NULL,
  `med_firstname` varchar(255) NOT NULL,
  `med_lastname` varchar(255) NOT NULL,
  `med_email` varchar(255) NOT NULL,
  `med_phone` varchar(255) NOT NULL,
  `med_password` varchar(255) NOT NULL,
  `med_joindate` datetime NOT NULL,
  `med_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `pat_id` int(11) NOT NULL,
  `pat_firstname` varchar(255) NOT NULL,
  `pat_lastname` varchar(255) NOT NULL,
  `pat_sex` varchar(20) NOT NULL,
  `pat_email` varchar(255) NOT NULL,
  `pat_phone` varchar(255) NOT NULL,
  `pat_password` varchar(255) NOT NULL,
  `pat_jondate` datetime NOT NULL,
  `pat_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`pat_id`, `pat_firstname`, `pat_lastname`, `pat_sex`, `pat_email`, `pat_phone`, `pat_password`, `pat_jondate`, `pat_status`) VALUES
(2, 'rukundo', 'janvier', 'male', 'rukundojanvier250@gmail.com', '0780520823', '$2y$10$YgmIIuvczkWre6W2ys3unOGezsfAgTCv/MqBVACO2DK5H94LWa2OO', '2020-12-21 00:00:00', '0');

-- --------------------------------------------------------

--
-- Table structure for table `testimonies`
--

CREATE TABLE `testimonies` (
  `tes_id` int(11) NOT NULL,
  `tes_title` varchar(255) NOT NULL,
  `tes_content` varchar(255) NOT NULL,
  `tes_joindate` datetime NOT NULL,
  `tes_status` int(11) NOT NULL,
  `tes_video` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testimonies`
--

INSERT INTO `testimonies` (`tes_id`, `tes_title`, `tes_content`, `tes_joindate`, `tes_status`, `tes_video`) VALUES
(1, 'klvnld', 'mclndlx', '2020-12-21 00:00:00', 1, 0),
(2, 'yvan azuka', 'lkjkfclknklesnlkn3lef', '2020-12-21 00:00:00', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adm_id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`blo_id`);

--
-- Indexes for table `medics`
--
ALTER TABLE `medics`
  ADD PRIMARY KEY (`med_id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`pat_id`);

--
-- Indexes for table `testimonies`
--
ALTER TABLE `testimonies`
  ADD PRIMARY KEY (`tes_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `blo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `medics`
--
ALTER TABLE `medics`
  MODIFY `med_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `pat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `testimonies`
--
ALTER TABLE `testimonies`
  MODIFY `tes_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
