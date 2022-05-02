-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2021 at 06:49 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `machbarot`
--

-- --------------------------------------------------------

--
-- Table structure for table `authorized_user`
--

CREATE TABLE `authorized_user` (
  `USER_ID` int(11) NOT NULL,
  `USER_NAME` varchar(255) NOT NULL,
  `USER_EMAIL` varchar(255) NOT NULL,
  `USER_USERNAME` varchar(255) NOT NULL,
  `USER_PASSWORD` varchar(255) NOT NULL,
  `USER_TYPE_ID` int(11) NOT NULL,
  `SUBSCP_FLG` varchar(255) DEFAULT NULL,
  `CREATED_AT` timestamp NOT NULL DEFAULT current_timestamp(),
  `REFERRAL_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `authorized_user`
--

INSERT INTO `authorized_user` (`USER_ID`, `USER_NAME`, `USER_EMAIL`, `USER_USERNAME`, `USER_PASSWORD`, `USER_TYPE_ID`, `SUBSCP_FLG`, `CREATED_AT`, `REFERRAL_ID`) VALUES
(1, 'Atara Linn', 'ataralinn@gmail.com', 'alinn', 'A12345', 1, 'Y', '2021-10-24 01:18:32', 1),
(4, 'James Monroe', 'james.monroe@gmail.com', 'jmonroe', '$2y$10$IW6ksiThgDQ/yimiBwSzEuHkAhazFC.7X', 2, 'subscp', '2021-10-25 18:12:01', 2),
(5, 'Vered Raful', 'traful@student.touro.edu', 'vraful', '$2y$10$T7gpmpS2SHixl467.QCqdOHcdNSZIyIj5', 2, NULL, '2021-10-25 18:13:35', 2),
(6, 'Nechama Skorski ', 'nskorski@gmail.com', 'nskorski', '$2y$10$unO7V4IOK.fuFPyhhWCBNePsxi2xGPaRrNP6Pomk7c/spgnzp1Zfy', 2, 'subscp', '2021-10-25 19:44:39', 2),
(7, 'Tehila Raful', 'tehilaraful@gmail.com', 'traful', '$2y$10$nPHomlY.9EFhwZqMMJSQs.fp1W4HzHvOaHouPXrqCBbvvjz1len7O', 2, NULL, '2021-10-25 20:27:01', 5),
(8, 'John Doe', 'john.doe@gmail.com', 'jdoe', '$2y$10$XJ6veplzZy6C12BTOkZl8.be2ZSma1jcKYPYpTXD40Wyc81qYHQF.', 2, 'subscp', '2021-10-25 21:43:09', 7),
(9, 'John Doe', 'john.doe@gmail.com', 'johndoe', '$2y$10$JGNG0M0NEOc38zJDRJ8Zg.Ae1tuTVpFUyFYbtvFWZMXv4XpaRv2va', 2, 'subscp', '2021-10-25 21:43:56', 5),
(28, 'tehilaraful', 'tehilaraful@gmail.com', 'ttrafulhj', '$2y$10$DHiIP4NQqEiaVLC2DAoRNemeVJjwHw8AfnBgAr5SbZWsUBr2BYGhq', 2, 'subscp', '2021-11-03 02:01:44', 5),
(29, 'Ahuva', 'hoover41@gmail.com', 'ahuva1', '$2y$10$DgYVZBM2b72nPaUdziltuelBFLRJp1mFzSfkhvCEBUX5HSqKCPymW', 2, 'subscp', '2021-11-03 02:05:10', 5),
(30, 'David', 'david@gmail.com', 'David', '$2y$10$p4xbhlCiDRGqcuspWtu5HOEEOO1K3leO.d7Pd0.TWxDCzQsVX85QK', 2, 'subscp', '2021-11-03 02:08:38', 5),
(33, 'Rery Feldmous', 'Rerf@gmail.com', 'rery', '$2y$10$/e2dliLi5rwBSqlmXBBQm.76/pbiPTJr8tI0kP/NqDN8JWo1L4om6', 2, 'subscp', '2021-11-04 23:41:30', 3),
(35, 'Vered Raful', 'traful@student.touro.edu', 'efratrr', '1234', 2, 'subscp', '2021-12-01 18:26:25', 1),
(42, 'Yitzchak Dror', 'traful678@gmail.com', 'efrat', '123', 2, 'subscp', '2021-12-01 18:52:21', 5),
(43, 'Yitzchak Dror', 'traful678@gmail.com', 'efrat', '123', 2, 'subscp', '2021-12-01 18:52:28', 5),
(44, 'Tehila Raful', 'tehilaraful@gmail.com', 'jmonroeee', '$2y$10$CUvRKLG3u6/bxgNvn3CK9u1xJ7OfbYEcPLEo0otdbHLwnu6Q7AxXu', 2, 'subscp', '2021-12-24 03:03:45', 4),
(47, 'Ayelet Raful', 'traful@student.touro.edu', 'ay', '$2y$10$08wNyie8tl3TwM7qk97iqufJw6bY1AsaHs4rSIZHpsPrpcyFeXPxK', 2, 'subscp', '2021-12-24 03:51:19', 5);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `MESSAGE_ID` int(11) NOT NULL,
  `MESSAGE_EMAIL` varchar(225) NOT NULL,
  `MESSAGE_TOPIC_ID` int(11) NOT NULL,
  `MESSAGE_BODY` text NOT NULL,
  `MESSAGE_CREATED_AT` timestamp NOT NULL DEFAULT current_timestamp(),
  `Message_Name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`MESSAGE_ID`, `MESSAGE_EMAIL`, `MESSAGE_TOPIC_ID`, `MESSAGE_BODY`, `MESSAGE_CREATED_AT`, `Message_Name`) VALUES
(2, 'tehilaraful@gmail.com', 1, 'I love it!', '2021-11-25 23:25:08', 'Rose'),
(25, 'tehilaraful@gmail.com', 1, 'I love it!', '2021-12-13 02:29:42', 'Rose'),
(36, 'ataralinn@gmail.com', 1, 'So excited to see this work!', '2021-12-26 05:38:23', 'Atara Linn'),
(37, 'js@gmail.com', 1, 'Thank you for your help', '2021-12-26 05:43:41', 'James Sardar');

-- --------------------------------------------------------

--
-- Table structure for table `message_topic`
--

CREATE TABLE `message_topic` (
  `TOPIC_ID` int(11) NOT NULL,
  `TOPIC_DESC` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message_topic`
--

INSERT INTO `message_topic` (`TOPIC_ID`, `TOPIC_DESC`) VALUES
(1, 'General Questions'),
(2, 'Tech Support'),
(3, 'Feedback'),
(4, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `referral_option`
--

CREATE TABLE `referral_option` (
  `REFERRAL_ID` int(11) NOT NULL,
  `REFERRAL_DESC` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `referral_option`
--

INSERT INTO `referral_option` (`REFERRAL_ID`, `REFERRAL_DESC`) VALUES
(1, 'School/Yeshiva'),
(2, 'Family'),
(3, 'Local Newspaper'),
(4, 'Shul'),
(5, 'LinkedIn'),
(6, 'Advertisment'),
(7, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `USER_TYPE_ID` int(11) NOT NULL,
  `USER_TYPE_DESC` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`USER_TYPE_ID`, `USER_TYPE_DESC`) VALUES
(1, 'Administrator'),
(2, 'Regular');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authorized_user`
--
ALTER TABLE `authorized_user`
  ADD PRIMARY KEY (`USER_ID`),
  ADD KEY `FK_REFERRAL` (`REFERRAL_ID`),
  ADD KEY `FK_USER_TYPE` (`USER_TYPE_ID`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`MESSAGE_ID`),
  ADD KEY `FK_TOPIC_ID` (`MESSAGE_TOPIC_ID`);

--
-- Indexes for table `message_topic`
--
ALTER TABLE `message_topic`
  ADD PRIMARY KEY (`TOPIC_ID`);

--
-- Indexes for table `referral_option`
--
ALTER TABLE `referral_option`
  ADD PRIMARY KEY (`REFERRAL_ID`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`USER_TYPE_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authorized_user`
--
ALTER TABLE `authorized_user`
  MODIFY `USER_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `MESSAGE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `message_topic`
--
ALTER TABLE `message_topic`
  MODIFY `TOPIC_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `referral_option`
--
ALTER TABLE `referral_option`
  MODIFY `REFERRAL_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `USER_TYPE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `authorized_user`
--
ALTER TABLE `authorized_user`
  ADD CONSTRAINT `FK_REFERRAL` FOREIGN KEY (`REFERRAL_ID`) REFERENCES `referral_option` (`REFERRAL_ID`),
  ADD CONSTRAINT `FK_USER_TYPE` FOREIGN KEY (`USER_TYPE_ID`) REFERENCES `user_type` (`USER_TYPE_ID`);

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `FK_TOPIC_ID` FOREIGN KEY (`MESSAGE_TOPIC_ID`) REFERENCES `message_topic` (`TOPIC_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
