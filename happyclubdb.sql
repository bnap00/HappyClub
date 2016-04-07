-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2015 at 06:51 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `happyclubdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `AdminID` int(11) NOT NULL AUTO_INCREMENT,
  `AdminName` varchar(32) NOT NULL,
  `AdminType` int(1) NOT NULL,
  `Password` varchar(32) NOT NULL,
  `newsPrivilages` tinyint(1) NOT NULL,
  `eventPrivilages` tinyint(1) NOT NULL,
  `forumPrivilages` tinyint(1) NOT NULL,
  PRIMARY KEY (`AdminID`),
  UNIQUE KEY `AdminName` (`AdminName`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`AdminID`, `AdminName`, `AdminType`, `Password`, `newsPrivilages`, `eventPrivilages`, `forumPrivilages`) VALUES
(1, 'bnap', 1, '21232f297a57a5a743894a0e4a801fc3', 0, 0, 0),
(4, 'admin', 1, 'e00cf25ad42683b3df678c61f42c6bda', 0, 0, 0),
(6, 'jerril', 0, '21232f297a57a5a743894a0e4a801fc3', 0, 1, 0),
(8, 'ankit ', 1, '21232f297a57a5a743894a0e4a801fc3', 1, 0, 0),
(9, 'hc', 0, '21232f297a57a5a743894a0e4a801fc3', 1, 0, 1),
(10, 'ronak', 0, '21232f297a57a5a743894a0e4a801fc3', 1, 1, 0),
(11, 'prc', 0, '21232f297a57a5a743894a0e4a801fc3', 0, 1, 1),
(12, 'surve', 1, '21232f297a57a5a743894a0e4a801fc3', 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE IF NOT EXISTS `event` (
  `EventID` int(11) NOT NULL AUTO_INCREMENT,
  `EventName` varchar(100) NOT NULL,
  `StartDate` date NOT NULL,
  `EndDate` date NOT NULL,
  `Title` varchar(100) NOT NULL,
  `Description` varchar(500) NOT NULL,
  `image` tinyint(1) NOT NULL,
  PRIMARY KEY (`EventID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`EventID`, `EventName`, `StartDate`, `EndDate`, `Title`, `Description`, `image`) VALUES
(10, 'Cyberia 2k16', '2015-05-23', '2015-05-24', 'Cyberia Is Back', 'The State level I.T Festival named "Cyberia 2k14" ....!\r\nAll the tech geeks , get ready for the event in November at \r\nThe Maharaja Sayajirao University of Baroda .... !! \r\nComing Soon .. !', 1),
(11, 'New Event ', '2015-05-12', '2015-05-13', 'New Event With Notification Testing', 'New Event Desc', 0);

-- --------------------------------------------------------

--
-- Table structure for table `forumpost`
--

CREATE TABLE IF NOT EXISTS `forumpost` (
  `PostID` int(11) NOT NULL AUTO_INCREMENT,
  `ParentID` int(11) DEFAULT NULL,
  `Post` varchar(255) NOT NULL,
  `UserID` int(11) NOT NULL,
  `TimeStamp` timestamp NOT NULL,
  `Visibility` varchar(1) NOT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`PostID`),
  KEY `UserID` (`UserID`),
  KEY `ParentID` (`ParentID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `forumpost`
--

INSERT INTO `forumpost` (`PostID`, `ParentID`, `Post`, `UserID`, `TimeStamp`, `Visibility`, `verified`) VALUES
(15, NULL, 'what is the admission process of BBA? ', 1, '2015-05-04 08:58:30', '1', 1),
(17, 15, 'Go and fill the form ', 1, '2015-05-04 09:02:46', '1', 1),
(19, NULL, 'Yehshsh', 1, '2015-05-11 07:39:10', '1', 0),
(20, NULL, 'Ddddddd', 1, '2015-05-11 09:38:52', '1', 0),
(21, 15, 'Good question\r\n', 13, '2015-05-11 09:39:54', '1', 0),
(22, NULL, 'Abc', 13, '2015-05-11 09:41:18', '1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `gcm_users`
--

CREATE TABLE IF NOT EXISTS `gcm_users` (
  `UID` int(11) NOT NULL AUTO_INCREMENT,
  `gcm_regid` varchar(255) NOT NULL,
  PRIMARY KEY (`UID`),
  UNIQUE KEY `gcm_regid` (`gcm_regid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `gcm_users`
--

INSERT INTO `gcm_users` (`UID`, `gcm_regid`) VALUES
(38, 'APA91bEwDgy4_S9OLBuWWrduVwrtMKocfU86KLy22pLmowhWaOewXDGJAAZ4edle1r6mBPzWQGBLi2qLFs825vABRi8G5kVirceXoYjL8LL5ShU5kQv4cToIuJKTGpT3pySZPsLoNZS8JxNsmpleePcouvay6Oz5xA'),
(15, 'APA91bFi2Uj6N97TdRFxDGjfRmVa9Y4npekCV_wLzNr2tlA6BNLjsuRmV1Y8TCx4VMu_COB6-QEBA7Rb8cmzlViDCogcvP6u4U4HamUKSe6gw3vCT5okYkHZtl22mRz7xI6MRMl1Potpyrt85oOzurXqZXHxK_yLrQ'),
(14, 'APA91bGptra41KVOZIORn5MBjrcTKQIKu8QBbN_eteUOjTNNrN44Ks2MA21OVW585IQRj5qjJfFcIKV_0XvAYXvX0DnIz2m0x2ViIJXCvbOj5AKVKoVdZJyYdYlquVOjddUxBASt6V0Rt2Av-qQCZLcACtFde1HvDw'),
(39, 'APA91bH7zJAMLEQ6auhH4rMAnwVAyJU6pBvS1RmMXHU022t09zLuRU3-bVsNJGUcP8WN9y6OrP_zWvBzhbAkwEFYJyn9ccUn2O6j6oXDwC4vHlYr2zvwKlq1u3DWLNH1ga50sJsybF1YiBaIIN9BDck3sOyi7GLVVg'),
(16, 'APA91bHsgqRppSZId1sFyBzVsUuB45YueuqWy-LfhaR814go0NBcLOs0rxaEtG6UwcVZ8wyh2yDJUmRL7ENiQiB7vKHHeY55XwUvgFz5ihdw5jfYVw0hYC8q8Z4IxI3NJXe-s8PMfz2P6UB45Nm4Xxm3lbelFdZgyQ');

-- --------------------------------------------------------

--
-- Table structure for table `newslist`
--

CREATE TABLE IF NOT EXISTS `newslist` (
  `NewsID` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(100) NOT NULL,
  `shortDesc` varchar(50) NOT NULL,
  `Content` varchar(500) NOT NULL,
  `TimeStamp` timestamp NOT NULL,
  `image` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`NewsID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `newslist`
--

INSERT INTO `newslist` (`NewsID`, `Title`, `shortDesc`, `Content`, `TimeStamp`, `image`) VALUES
(7, 'Exams Getting Over', 'Students Goes Crazy', 'Closer are the dates of vacation, students are going to university pavilion to play games, railways are full, and buses have increase the fares to get benifit of the season', '2015-05-04 08:37:16', 1),
(8, 'Testing Phase is on', 'Testing phase of mobile application has started', 'After All This Mess The Mobile is live', '2015-05-10 08:02:52', 0),
(14, 'demoqwe', 'news', 'description short', '2015-05-11 07:40:35', 0),
(16, 'New News ', 'New News Short Discription', 'New News Descriptoion', '2015-05-11 09:35:19', 0),
(17, 'New News ', 'New News Short Discription', 'New News Descriptoion', '2015-05-11 09:36:12', 0),
(18, 'New News Title', 'New News SD', 'asdasdas', '2015-07-09 07:52:31', 0);

-- --------------------------------------------------------

--
-- Table structure for table `notification_queue`
--

CREATE TABLE IF NOT EXISTS `notification_queue` (
  `NID` int(11) NOT NULL AUTO_INCREMENT,
  `UserID` int(11) NOT NULL,
  `Notification` varchar(250) NOT NULL,
  `userChecked` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`NID`),
  KEY `UserID` (`UserID`),
  KEY `UserID_2` (`UserID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `notification_queue`
--

INSERT INTO `notification_queue` (`NID`, `UserID`, `Notification`, `userChecked`) VALUES
(1, 1, ' One Of Your Report Was marked fake by the Admin, Please Take Care Of Things You Report on Forum, or else you would get banned from posting in the forum', 1),
(2, 1, ' One Of Your Post Was Reported Positivly by the Admin, Please Take Care Of Things You Say on Forum, or else you would get banned from posting in the forum', 1),
(3, 1, ' One Of Your Post Was Reported Positivly by the Admin, Please Take Care Of Things You Say on Forum, or else you would get banned from posting in the forum', 1),
(4, 1, ' One Of Your Post Was Reported Positivly by the Admin, Please Take Care Of Things You Say on Forum, or else you would get banned from posting in the forum', 1),
(5, 1, ' One Of Your Report Was marked fake by the Admin, Please Take Care Of Things You Report on Forum, or else you would get banned from posting in the forum', 1),
(6, 1, ' One Of Your Post Was Reported Positivly by the Admin, Please Take Care Of Things You Say on Forum, or else you would get banned from posting in the forum', 1),
(7, 13, ' Your Poll Request Has been disapproved by the admin, <br/> Reasoned by the admin as follows:not Valid', 0);

-- --------------------------------------------------------

--
-- Table structure for table `poll`
--

CREATE TABLE IF NOT EXISTS `poll` (
  `PollID` int(11) NOT NULL AUTO_INCREMENT,
  `UserID` int(11) NOT NULL,
  `Title` varchar(100) NOT NULL,
  `Description` varchar(500) NOT NULL,
  `Options` varchar(255) NOT NULL COMMENT 'Options For Poll In Comma Separated Values',
  `StartTimeStamp` timestamp NOT NULL,
  `EndTimeStamp` timestamp NOT NULL,
  `Status` varchar(1) NOT NULL,
  PRIMARY KEY (`PollID`),
  KEY `UserID` (`UserID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `poll`
--

INSERT INTO `poll` (`PollID`, `UserID`, `Title`, `Description`, `Options`, `StartTimeStamp`, `EndTimeStamp`, `Status`) VALUES
(5, 1, 'who will win the IPL this year ', 'IPL is trending these days \r\nGive your opinion on who wins it ', 'csk ,mi ,kxip,srh', '2015-05-03 18:30:00', '2015-05-05 18:29:59', '1'),
(6, 1, 'poll', 'Poll title', 'abc,abc,abc', '2015-05-10 18:30:00', '2015-05-11 18:29:59', '1'),
(7, 1, 'hello', 'Hello', 'yes ,no', '2015-05-11 18:30:00', '2015-05-13 18:29:59', '0'),
(8, 13, 'gh', 'Gg', 'yes,no,neither', '2015-05-10 18:30:00', '2015-05-11 18:29:59', '2'),
(9, 13, 'a ', 'Bjfmf', 'a,b,x,d', '2015-05-10 18:30:00', '2015-05-12 18:29:59', '1');

-- --------------------------------------------------------

--
-- Table structure for table `pollvotes`
--

CREATE TABLE IF NOT EXISTS `pollvotes` (
  `VoteID` int(11) NOT NULL AUTO_INCREMENT,
  `PollID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `Vote` int(2) NOT NULL,
  PRIMARY KEY (`VoteID`),
  KEY `PollID` (`PollID`,`UserID`),
  KEY `UserID` (`UserID`),
  KEY `UserID_2` (`UserID`),
  KEY `PollID_2` (`PollID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `pollvotes`
--

INSERT INTO `pollvotes` (`VoteID`, `PollID`, `UserID`, `Vote`) VALUES
(2, 5, 1, 1),
(3, 6, 1, 0),
(4, 6, 13, 1),
(5, 9, 13, 2);

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE IF NOT EXISTS `reports` (
  `ReportID` int(11) NOT NULL AUTO_INCREMENT,
  `PostID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  PRIMARY KEY (`ReportID`),
  KEY `PostID` (`PostID`,`UserID`),
  KEY `UserID` (`UserID`),
  KEY `PostID_2` (`PostID`),
  KEY `UserID_2` (`UserID`),
  KEY `PostID_3` (`PostID`),
  KEY `UserID_3` (`UserID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`ReportID`, `PostID`, `UserID`) VALUES
(1, 19, 1),
(2, 21, 13);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `UserID` int(11) NOT NULL AUTO_INCREMENT,
  `Email` varchar(255) NOT NULL,
  `password` varchar(32) NOT NULL,
  `FirstName` varchar(32) NOT NULL,
  `LastName` varchar(32) NOT NULL,
  `Gender` varchar(6) NOT NULL,
  `SuccessfullReports` int(11) NOT NULL,
  `activeStatus` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`UserID`),
  UNIQUE KEY `Email` (`Email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `Email`, `password`, `FirstName`, `LastName`, `Gender`, `SuccessfullReports`, `activeStatus`) VALUES
(1, 'bnap00@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'Bharat', 'Parsiya', 'Male', 0, 1),
(2, 'bnap00@live.com', '21232f297a57a5a743894a0e4a801fc3', 'Happy', 'Club', 'Male', 0, 1),
(8, 'bnap@mailinator.com', 'f6fdffe48c908deb0f4c3bd36c032e72', 'first', 'last', 'Male', 0, 1),
(13, 'ankit@hc.com', '21232f297a57a5a743894a0e4a801fc3', 'Ankit', 'Chaudhary', 'male', 1, 1),
(14, 'prince9725@gmail.com', 'f6fdffe48c908deb0f4c3bd36c032e72', 'prince', 'sharma', 'Male', 0, 0),
(15, 'aakash.surve@yahoo.in', '395a95ab753685453694eccc3e365fd8', 'aakash', 'surve', 'Male', 0, 0),
(20, 'hetathakkar@gmail.com', '0659c7992e268962384eb17fafe88364', 'heta', 'thakkar', 'Female', 0, 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `forumpost`
--
ALTER TABLE `forumpost`
  ADD CONSTRAINT `forumpost_ibfk_1` FOREIGN KEY (`ParentID`) REFERENCES `forumpost` (`PostID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `forumpost_ibfk_2` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`) ON DELETE CASCADE;

--
-- Constraints for table `notification_queue`
--
ALTER TABLE `notification_queue`
  ADD CONSTRAINT `notification_queue_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `poll`
--
ALTER TABLE `poll`
  ADD CONSTRAINT `poll_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pollvotes`
--
ALTER TABLE `pollvotes`
  ADD CONSTRAINT `pollvotes_ibfk_1` FOREIGN KEY (`PollID`) REFERENCES `poll` (`PollID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pollvotes_ibfk_2` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reports`
--
ALTER TABLE `reports`
  ADD CONSTRAINT `reports_ibfk_1` FOREIGN KEY (`PostID`) REFERENCES `forumpost` (`PostID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reports_ibfk_2` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
