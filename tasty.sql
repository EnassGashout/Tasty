-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2019 at 03:56 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tasty`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `ID` int(11) NOT NULL,
  `blogTitle` varchar(55) NOT NULL,
  `blogDesc` text NOT NULL,
  `blogIMG` varchar(255) NOT NULL,
  `addDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `userID` int(11) NOT NULL,
  `specID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`ID`, `blogTitle`, `blogDesc`, `blogIMG`, `addDate`, `userID`, `specID`) VALUES
(1, 'AL-Madeena Resturant', '<p>\r\nIstanbul is the top visited destination in Turkey ... if you visited it ... you must went to this resturant to try them food ... how Delicious it was!!! it is really a tasty food .</p>', 'r1.png', '2019-02-15 13:51:47', 1, 2),
(2, 'Street food stand in Namdaemun Market, Seoul, South Kor', '<p>I passed by and just had to take a picture. Everything looks so vibrant and fresh! Unfortunately didn\'t have a chance to try anything though, but with ingredients like these, I\'m sure it would have been wonderful!</p>', 's2.png', '2019-02-15 14:08:57', 1, 1),
(3, 'Fried Olives (Olive Ascolana)', '<p> if you went to italy ...In Le Marche, a region that lies between the Apennine Mountains and the Adriatic Sea, Olive Ascolana is the culinary signature. The olives stuffed with ground meat and then lightly breaded and fried originated in Ascoli-Piceno, a town in the southern part of the region, and spread north. The green olive used to make Olive Ascolana are a special variety only grown in this area of Italy.</p>', 's1.jpg', '2019-02-15 14:02:03', 3, 1),
(4, 'Cafe Craft in Paris', '<p> if you went to france .. you must go to this cafe , it\'s one of the best and amaizing coffee shops over the world ...</p>', 'c1.jpg', '2019-02-15 14:28:37', 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `ID` int(11) NOT NULL,
  `catName` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`ID`, `catName`) VALUES
(1, 'Street Food'),
(2, 'Resturant'),
(3, 'Coffe Shop');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `ID` int(11) NOT NULL,
  `comment` text NOT NULL,
  `userID` int(11) NOT NULL,
  `blogID` int(11) NOT NULL,
  `addDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `ID` int(11) NOT NULL,
  `blogID` int(11) NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`ID`, `blogID`, `userID`) VALUES
(1, 2, 1),
(2, 2, 1),
(3, 1, 2),
(4, 1, 2),
(5, 1, 2),
(6, 3, 1),
(7, 4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `FullName` varchar(50) NOT NULL,
  `UserName` varchar(50) NOT NULL,
  `Password` varchar(75) NOT NULL,
  `email` varchar(50) NOT NULL,
  `favoriteQuote` text NOT NULL,
  `workfield` varchar(75) NOT NULL,
  `bio` text NOT NULL,
  `userIMG` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `FullName`, `UserName`, `Password`, `email`, `favoriteQuote`, `workfield`, `bio`, `userIMG`) VALUES
(1, 'Enass Gashout', 'enassgashout', 'password', 'enassgashout@gmail.com', 'create happeness if u can\'t find it', 'still student', 'nothing to be shown', 'enass.jpg'),
(2, 'AnisaAlmejrese', 'anisa99', '123', 'anisa@gmail.com', 'be strong', 'studying', 'nothing', 'defult.jpg'),
(3, 'ReamBenMahmoud', 'ream', '123', 'ream@gmail.com', 'nothing', 'student', 'bio', ''),
(4, 'Rayan', 'Rayan', '123', 'Ranno@gmail.com', 'nothing', 'nothing', 'nothing', ''),
(5, 'Arwa', 'arwa', '123', 'rory@gmail.com', 'nothing', 'student', 'nothing', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `specID` (`specID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `blogID` (`blogID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `blogID` (`blogID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_ibfk_1` FOREIGN KEY (`specID`) REFERENCES `categories` (`ID`),
  ADD CONSTRAINT `blogs_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `users` (`ID`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`blogID`) REFERENCES `blogs` (`ID`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `users` (`ID`);

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`blogID`) REFERENCES `blogs` (`ID`),
  ADD CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `users` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
