-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2017 at 08:04 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `auto_like`
--

-- --------------------------------------------------------

--
-- Table structure for table `accountfb`
--

CREATE TABLE `accountfb` (
  `id` int(10) NOT NULL,
  `acc_id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `cookie` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `accountfb`
--

INSERT INTO `accountfb` (`id`, `acc_id`, `cookie`) VALUES
(1, '100010870926400', 'sb=_kaZWIWExv1aHhZCW9b_9_dM; lu=ggZLmHdGsFf8w88siUieBAxA; datr=30aZWOItpZg0a-aoA9EWk1U6; c_user=100010870926400; xs=143%3A93xIkUEAEWZUeQ%3A2%3A1486440190%3A14187%3A179; fr=0K9Qq0nN84fpgfqNB.AWX-rePOrwQoFneA_cWLrnxIANo.BYmUbf.cI.Flf.0.0.BZXyjd.AWXZLCnI; presence=EDvF3EtimeF1499383415EuserFA21B10870926400A2EstateFDutF1499383415747CEchFDp_5f1B10870926400F8CC; act=1499383450664%2F4; wd=1422x813; dpr=0.8999999761581421');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accountfb`
--
ALTER TABLE `accountfb`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `acc_id` (`acc_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accountfb`
--
ALTER TABLE `accountfb`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
