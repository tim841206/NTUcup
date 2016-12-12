-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- 主機: localhost
-- 產生時間： 2016 年 11 月 10 日 17:53
-- 伺服器版本: 10.1.13-MariaDB
-- PHP 版本： 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `NEWcup`
--

-- --------------------------------------------------------

--
-- 資料表結構 `MD`
--

CREATE TABLE `MD` (
  `NUM` smallint(6) NOT NULL,
  `ID_1` varchar(9) COLLATE utf8_bin NOT NULL,
  `ID_2` varchar(9) COLLATE utf8_bin NOT NULL,
  `NAME_1` varchar(20) COLLATE utf8_bin NOT NULL,
  `NAME_2` varchar(20) COLLATE utf8_bin NOT NULL,
  `MAJOR_1` varchar(20) COLLATE utf8_bin NOT NULL,
  `MAJOR_2` varchar(20) COLLATE utf8_bin NOT NULL,
  `GRADE_1` varchar(2) COLLATE utf8_bin NOT NULL,
  `GRADE_2` varchar(2) COLLATE utf8_bin NOT NULL,
  `PHONE_1` varchar(10) COLLATE utf8_bin NOT NULL,
  `PHONE_2` varchar(10) COLLATE utf8_bin NOT NULL,
  `BIRTH_1` date NOT NULL,
  `BIRTH_2` date NOT NULL,
  `IDENTITY_1` varchar(10) COLLATE utf8_bin NOT NULL,
  `IDENTITY_2` varchar(10) COLLATE utf8_bin NOT NULL,
  `SIGN_TIME` datetime NOT NULL,
  `PAYSTAT` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='男雙';

-- --------------------------------------------------------

--
-- 資料表結構 `MS`
--

CREATE TABLE `MS` (
  `NUM` smallint(6) NOT NULL,
  `ID` varchar(9) COLLATE utf8_bin NOT NULL,
  `NAME` varchar(20) COLLATE utf8_bin NOT NULL,
  `MAJOR` varchar(20) COLLATE utf8_bin NOT NULL,
  `GRADE` varchar(2) COLLATE utf8_bin NOT NULL,
  `PHONE` varchar(10) COLLATE utf8_bin NOT NULL,
  `BIRTH` date NOT NULL,
  `IDENTITY` varchar(10) COLLATE utf8_bin NOT NULL,
  `SIGN_TIME` datetime NOT NULL,
  `PAYSTAT` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='男單';

-- --------------------------------------------------------

--
-- 資料表結構 `setup`
--

CREATE TABLE `setup` (
  `MS_NUM` smallint(6) NOT NULL,
  `WS_NUM` smallint(6) NOT NULL,
  `MD_NUM` smallint(6) NOT NULL,
  `WD_NUM` smallint(6) NOT NULL,
  `XD_NUM` smallint(6) NOT NULL,
  `G_NUM` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='設定檔';

--
-- 資料表的匯出資料 `setup`
--

INSERT INTO `setup` (`MS_NUM`, `WS_NUM`, `MD_NUM`, `WD_NUM`, `XD_NUM`, `G_NUM`) VALUES
(1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- 資料表結構 `WD`
--

CREATE TABLE `WD` (
  `NUM` smallint(6) NOT NULL,
  `ID_1` varchar(9) COLLATE utf8_bin NOT NULL,
  `ID_2` varchar(9) COLLATE utf8_bin NOT NULL,
  `NAME_1` varchar(20) COLLATE utf8_bin NOT NULL,
  `NAME_2` varchar(20) COLLATE utf8_bin NOT NULL,
  `MAJOR_1` varchar(20) COLLATE utf8_bin NOT NULL,
  `MAJOR_2` varchar(20) COLLATE utf8_bin NOT NULL,
  `GRADE_1` varchar(2) COLLATE utf8_bin NOT NULL,
  `GRADE_2` varchar(2) COLLATE utf8_bin NOT NULL,
  `PHONE_1` varchar(10) COLLATE utf8_bin NOT NULL,
  `PHONE_2` varchar(10) COLLATE utf8_bin NOT NULL,
  `BIRTH_1` date NOT NULL,
  `BIRTH_2` date NOT NULL,
  `IDENTITY_1` varchar(10) COLLATE utf8_bin NOT NULL,
  `IDENTITY_2` varchar(10) COLLATE utf8_bin NOT NULL,
  `SIGN_TIME` datetime NOT NULL,
  `PAYSTAT` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='女雙';

-- --------------------------------------------------------

--
-- 資料表結構 `WS`
--

CREATE TABLE `WS` (
  `NUM` smallint(6) NOT NULL,
  `ID` varchar(9) COLLATE utf8_bin NOT NULL,
  `NAME` varchar(20) COLLATE utf8_bin NOT NULL,
  `MAJOR` varchar(20) COLLATE utf8_bin NOT NULL,
  `GRADE` varchar(2) COLLATE utf8_bin NOT NULL,
  `PHONE` varchar(10) COLLATE utf8_bin NOT NULL,
  `BIRTH` date NOT NULL,
  `IDENTITY` varchar(10) COLLATE utf8_bin NOT NULL,
  `SIGN_TIME` datetime NOT NULL,
  `PAYSTAT` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='女單';

-- --------------------------------------------------------

--
-- 資料表結構 `XD`
--

CREATE TABLE `XD` (
  `NUM` smallint(6) NOT NULL,
  `ID_1` varchar(9) COLLATE utf8_bin NOT NULL,
  `ID_2` varchar(9) COLLATE utf8_bin NOT NULL,
  `NAME_1` varchar(20) COLLATE utf8_bin NOT NULL,
  `NAME_2` varchar(20) COLLATE utf8_bin NOT NULL,
  `MAJOR_1` varchar(20) COLLATE utf8_bin NOT NULL,
  `MAJOR_2` varchar(20) COLLATE utf8_bin NOT NULL,
  `GRADE_1` varchar(2) COLLATE utf8_bin NOT NULL,
  `GRADE_2` varchar(2) COLLATE utf8_bin NOT NULL,
  `PHONE_1` varchar(10) COLLATE utf8_bin NOT NULL,
  `PHONE_2` varchar(10) COLLATE utf8_bin NOT NULL,
  `BIRTH_1` date NOT NULL,
  `BIRTH_2` date NOT NULL,
  `IDENTITY_1` varchar(10) COLLATE utf8_bin NOT NULL,
  `IDENTITY_2` varchar(10) COLLATE utf8_bin NOT NULL,
  `SIGN_TIME` datetime NOT NULL,
  `PAYSTAT` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='混雙';

-- --------------------------------------------------------

--
-- 資料表結構 `G`
--

CREATE TABLE `G` (
  `NUM` smallint(6) NOT NULL,
  `Gmajor` varchar(20) COLLATE utf8_bin NOT NULL,
  `Gname` varchar(20) COLLATE utf8_bin NOT NULL,
  `ID_1` varchar(9) COLLATE utf8_bin NOT NULL,
  `ID_2` varchar(9) COLLATE utf8_bin NOT NULL,
  `ID_3` varchar(9) COLLATE utf8_bin NOT NULL,
  `ID_4` varchar(9) COLLATE utf8_bin NOT NULL,
  `ID_5` varchar(9) COLLATE utf8_bin NOT NULL,
  `ID_6` varchar(9) COLLATE utf8_bin NOT NULL,
  `ID_7` varchar(9) COLLATE utf8_bin NOT NULL,
  `ID_8` varchar(9) COLLATE utf8_bin NOT NULL,
  `ID_9` varchar(9) COLLATE utf8_bin DEFAULT NULL,
  `ID_10` varchar(9) COLLATE utf8_bin DEFAULT NULL,
  `ID_11` varchar(9) COLLATE utf8_bin DEFAULT NULL,
  `ID_12` varchar(9) COLLATE utf8_bin DEFAULT NULL,
  `NAME_1` varchar(20) COLLATE utf8_bin NOT NULL,
  `NAME_2` varchar(20) COLLATE utf8_bin NOT NULL,
  `NAME_3` varchar(20) COLLATE utf8_bin NOT NULL,
  `NAME_4` varchar(20) COLLATE utf8_bin NOT NULL,
  `NAME_5` varchar(20) COLLATE utf8_bin NOT NULL,
  `NAME_6` varchar(20) COLLATE utf8_bin NOT NULL,
  `NAME_7` varchar(20) COLLATE utf8_bin NOT NULL,
  `NAME_8` varchar(20) COLLATE utf8_bin NOT NULL,
  `NAME_9` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `NAME_10` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `NAME_11` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `NAME_12` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `MAJOR_1` varchar(20) COLLATE utf8_bin NOT NULL,
  `MAJOR_2` varchar(20) COLLATE utf8_bin NOT NULL,
  `MAJOR_3` varchar(20) COLLATE utf8_bin NOT NULL,
  `MAJOR_4` varchar(20) COLLATE utf8_bin NOT NULL,
  `MAJOR_5` varchar(20) COLLATE utf8_bin NOT NULL,
  `MAJOR_6` varchar(20) COLLATE utf8_bin NOT NULL,
  `MAJOR_7` varchar(20) COLLATE utf8_bin NOT NULL,
  `MAJOR_8` varchar(20) COLLATE utf8_bin NOT NULL,
  `MAJOR_9` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `MAJOR_10` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `MAJOR_11` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `MAJOR_12` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `GRADE_1` varchar(2) COLLATE utf8_bin NOT NULL,
  `GRADE_2` varchar(2) COLLATE utf8_bin NOT NULL,
  `GRADE_3` varchar(2) COLLATE utf8_bin NOT NULL,
  `GRADE_4` varchar(2) COLLATE utf8_bin NOT NULL,
  `GRADE_5` varchar(2) COLLATE utf8_bin NOT NULL,
  `GRADE_6` varchar(2) COLLATE utf8_bin NOT NULL,
  `GRADE_7` varchar(2) COLLATE utf8_bin NOT NULL,
  `GRADE_8` varchar(2) COLLATE utf8_bin NOT NULL,
  `GRADE_9` varchar(2) COLLATE utf8_bin DEFAULT NULL,
  `GRADE_10` varchar(2) COLLATE utf8_bin DEFAULT NULL,
  `GRADE_11` varchar(2) COLLATE utf8_bin DEFAULT NULL,
  `GRADE_12` varchar(2) COLLATE utf8_bin DEFAULT NULL,
  `PHONE_1` varchar(10) COLLATE utf8_bin NOT NULL,
  `PHONE_2` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `PHONE_3` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `PHONE_4` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `PHONE_5` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `PHONE_6` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `PHONE_7` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `PHONE_8` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `PHONE_9` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `PHONE_10` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `PHONE_11` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `PHONE_12` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `BIRTH_1` date NOT NULL,
  `BIRTH_2` date NOT NULL,
  `BIRTH_3` date NOT NULL,
  `BIRTH_4` date NOT NULL,
  `BIRTH_5` date NOT NULL,
  `BIRTH_6` date NOT NULL,
  `BIRTH_7` date NOT NULL,
  `BIRTH_8` date NOT NULL,
  `BIRTH_9` date DEFAULT NULL,
  `BIRTH_10` date DEFAULT NULL,
  `BIRTH_11` date DEFAULT NULL,
  `BIRTH_12` date DEFAULT NULL,
  `IDENTITY_1` varchar(10) COLLATE utf8_bin NOT NULL,
  `IDENTITY_2` varchar(10) COLLATE utf8_bin NOT NULL,
  `IDENTITY_3` varchar(10) COLLATE utf8_bin NOT NULL,
  `IDENTITY_4` varchar(10) COLLATE utf8_bin NOT NULL,
  `IDENTITY_5` varchar(10) COLLATE utf8_bin NOT NULL,
  `IDENTITY_6` varchar(10) COLLATE utf8_bin NOT NULL,
  `IDENTITY_7` varchar(10) COLLATE utf8_bin NOT NULL,
  `IDENTITY_8` varchar(10) COLLATE utf8_bin NOT NULL,
  `IDENTITY_9` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `IDENTITY_10` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `IDENTITY_11` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `IDENTITY_12` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `SIGN_TIME` datetime NOT NULL,
  `PAYSTAT` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='團體';

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `MD`
--
ALTER TABLE `MD`
  ADD PRIMARY KEY (`NUM`);

--
-- 資料表索引 `MS`
--
ALTER TABLE `MS`
  ADD PRIMARY KEY (`NUM`);

--
-- 資料表索引 `WD`
--
ALTER TABLE `WD`
  ADD PRIMARY KEY (`NUM`);

--
-- 資料表索引 `WS`
--
ALTER TABLE `WS`
  ADD PRIMARY KEY (`NUM`);

--
-- 資料表索引 `XD`
--
ALTER TABLE `XD`
  ADD PRIMARY KEY (`NUM`);

--
-- 資料表索引 `XD`
--
ALTER TABLE `G`
  ADD PRIMARY KEY (`NUM`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
