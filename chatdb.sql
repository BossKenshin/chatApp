-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2022 at 08:28 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chatdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `chatmember`
--

CREATE TABLE `chatmember` (
  `chatMemberID` int(11) NOT NULL,
  `roomID` varchar(244) NOT NULL,
  `userid` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chatmember`
--

INSERT INTO `chatmember` (`chatMemberID`, `roomID`, `userid`) VALUES
(1, 'Bn3pEhlK', '1'),
(2, 'Bn3pEhlK', '2');

-- --------------------------------------------------------

--
-- Table structure for table `chatroom`
--

CREATE TABLE `chatroom` (
  `chatRoomID` int(11) NOT NULL,
  `roomType` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chatroom`
--

INSERT INTO `chatroom` (`chatRoomID`, `roomType`) VALUES
(1, 'Bn3pEhlK');

-- --------------------------------------------------------

--
-- Table structure for table `messages_conversation`
--

CREATE TABLE `messages_conversation` (
  `messageid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `roomid` varchar(244) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages_conversation`
--

INSERT INTO `messages_conversation` (`messageid`, `userid`, `roomid`, `message`) VALUES
(1, 2, 'Bn3pEhlK', 'HI BRO'),
(2, 1, 'Bn3pEhlK', 'WAZZUP BRO'),
(3, 1, 'Bn3pEhlK', 'KAMUSTA KA BRO'),
(4, 2, 'Bn3pEhlK', 'OKS LANG BRO'),
(5, 1, 'Bn3pEhlK', 'Good morning'),
(6, 1, 'Bn3pEhlK', 'fdgdfsgdfghsdfgsdfgsdfg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `profile` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `fullname`, `email`, `password`, `profile`) VALUES
(1, 'Luke Kyle', 'kyle13@gmail.com', 'buyer', 'fashion.jpg'),
(2, 'Jusko Loyd', 'loyd@gmail.com', 'loyd', 'sports.jpg'),
(3, 'Jojo Adventure', 'adven@gmail.com', 'jojo', 'handsbg1.png'),
(4, 'Its me Mario', 'mario@gmail.com', 'mario', 'bggray.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chatmember`
--
ALTER TABLE `chatmember`
  ADD PRIMARY KEY (`chatMemberID`);

--
-- Indexes for table `chatroom`
--
ALTER TABLE `chatroom`
  ADD PRIMARY KEY (`chatRoomID`);

--
-- Indexes for table `messages_conversation`
--
ALTER TABLE `messages_conversation`
  ADD PRIMARY KEY (`messageid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chatmember`
--
ALTER TABLE `chatmember`
  MODIFY `chatMemberID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `chatroom`
--
ALTER TABLE `chatroom`
  MODIFY `chatRoomID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `messages_conversation`
--
ALTER TABLE `messages_conversation`
  MODIFY `messageid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
