-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- 主機: sophia
-- 建立日期: 2018 年 02 月 13 日 17:11
-- 伺服器版本: 5.1.35
-- PHP 版本: 5.5.9-1ubuntu4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 資料庫: `yckau`
--

-- --------------------------------------------------------

--
-- 資料表結構 `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `commentID` int(11) NOT NULL,
  `postID` int(11) NOT NULL,
  `time` varchar(20) NOT NULL,
  `commContent` longtext NOT NULL,
  PRIMARY KEY (`commentID`),
  KEY `postID` (`postID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 資料表結構 `friends`
--

CREATE TABLE IF NOT EXISTS `friends` (
  `friendID` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `starred` varchar(1) DEFAULT 'N',
  PRIMARY KEY (`friendID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 資料表結構 `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `postID` int(11) NOT NULL,
  `friendID` int(11) NOT NULL,
  `time` varchar(20) NOT NULL,
  `location` varchar(20) NOT NULL,
  `content` longtext NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`postID`),
  UNIQUE KEY `postID` (`postID`),
  KEY `friendID` (`friendID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
