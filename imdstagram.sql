SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;


CREATE TABLE IF NOT EXISTS `comments` (
  `commentID` int(10) NOT NULL,
  `postID` int(10) NOT NULL,
  `userID` int(10) NOT NULL,
  `description` varchar(128) NOT NULL,
  `createdon` datetime NOT NULL,
  `createdby` varchar(64) NOT NULL,
  `lastupdatedon` datetime NOT NULL,
  `lastupdatedby` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `follows` (
  `followID` int(10) NOT NULL AUTO_INCREMENT,
  `userID` int(10) NOT NULL,
  `foloowerID` int(10) NOT NULL,
  PRIMARY KEY (`followID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `languages` (
  `langID` varchar(2) NOT NULL,
  `language` varchar(64) NOT NULL,
  PRIMARY KEY (`langID`),
  UNIQUE KEY `langID` (`langID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `posts` (
  `postID` int(11) NOT NULL AUTO_INCREMENT,
  `userID` int(11) NOT NULL,
  `description` varchar(250) NOT NULL,
  `picture` varchar(50) NOT NULL,
  `uploaddate` datetime NOT NULL,
  `createdon` datetime NOT NULL,
  `createdby` varchar(64) NOT NULL,
  `lastupdatedon` datetime NOT NULL,
  `lastupdatedby` varchar(64) NOT NULL,
  PRIMARY KEY (`postID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `users` (
  `userID` int(11) NOT NULL AUTO_INCREMENT,
  `langID` varchar(2) NOT NULL,
  `firstname` varchar(64) NOT NULL,
  `lastname` varchar(64) NOT NULL,
  `gender` char(1) NOT NULL,
  `birthday` date NOT NULL,
  `email` varchar(64) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `profilepict` varchar(50) NOT NULL,
  `createdon` datetime NOT NULL,
  `createdby` varchar(64) NOT NULL,
  `lastupdateon` datetime NOT NULL,
  `lastupdateby` varchar(64) NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
