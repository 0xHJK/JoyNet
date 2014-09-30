-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2014-09-23 17:18:11
-- 服务器版本： 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `joynet`
--

-- --------------------------------------------------------

--
-- 表的结构 `jh_event`
--

CREATE TABLE IF NOT EXISTS `jh_event` (
  `eid` int(11) NOT NULL AUTO_INCREMENT,
  `econtent` text,
  `etime` date DEFAULT NULL,
  `create_time` date DEFAULT NULL,
  `ephoto_url` text,
  `etitle` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`eid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=73 ;

--
-- 转存表中的数据 `jh_event`
--

INSERT INTO `jh_event` (`eid`, `econtent`, `etime`, `create_time`, `ephoto_url`, `etitle`) VALUES
(69, NULL, NULL, '2014-09-23', NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `jh_navigator`
--

CREATE TABLE IF NOT EXISTS `jh_navigator` (
  `naid` int(11) NOT NULL AUTO_INCREMENT,
  `naname` varchar(10) NOT NULL,
  `destination_url` text,
  `weight` int(3) DEFAULT NULL,
  PRIMARY KEY (`naid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=40 ;

--
-- 转存表中的数据 `jh_navigator`
--

INSERT INTO `jh_navigator` (`naid`, `naname`, `destination_url`, `weight`) VALUES
(25, 'bbs', 'hjk.im', 0),
(24, 'HJKsa', 'hjk.im', 0),
(14, 'HJKsa', 'hjk.im', 0),
(21, 'HJKsa', 'hjk.im', 0),
(23, 'HJKsa', 'hjk.im', 0),
(26, 'HJKsa', 'hjk.im', 0),
(32, 'HJKsa', 'hjk.im', 0),
(34, 'HJKsa', 'hjk.im', 0);

-- --------------------------------------------------------

--
-- 表的结构 `jh_notice`
--

CREATE TABLE IF NOT EXISTS `jh_notice` (
  `nid` int(11) NOT NULL AUTO_INCREMENT,
  `ncontent` varchar(100) DEFAULT NULL,
  `destination_url` text,
  `create_time` date DEFAULT NULL,
  `nphoto_url` text,
  PRIMARY KEY (`nid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=52 ;

--
-- 转存表中的数据 `jh_notice`
--

INSERT INTO `jh_notice` (`nid`, `ncontent`, `destination_url`, `create_time`, `nphoto_url`) VALUES
(50, 'HJK', 'www.hjk.im', '2014-09-23', NULL);

-- --------------------------------------------------------

--
-- 表的结构 `jh_user`
--

CREATE TABLE IF NOT EXISTS `jh_user` (
  `stu_id` varchar(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `pwd` varchar(255) NOT NULL,
  `flag` int(1) DEFAULT NULL,
  PRIMARY KEY (`stu_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `jh_user`
--

INSERT INTO `jh_user` (`stu_id`, `username`, `pwd`, `flag`) VALUES
('201226630218', 'westion', 'westion717', 1),
('admin', 'admin', 'admin', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
