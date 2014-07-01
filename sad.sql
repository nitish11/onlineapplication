-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 26, 2011 at 05:13 PM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sad`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `aid` varchar(20) NOT NULL,
  `aname` varchar(30) NOT NULL,
  `apass` varchar(36) NOT NULL,
  `email` varchar(20) NOT NULL,
  `desig` varchar(30) NOT NULL,
  PRIMARY KEY (`aid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aid`, `aname`, `apass`, `email`, `desig`) VALUES
('A10', 'Dr. Xyz', '123', 'abc@gmail.com', 'Assistant Registrar');

-- --------------------------------------------------------

--
-- Table structure for table `aid_fid`
--

CREATE TABLE IF NOT EXISTS `aid_fid` (
  `aid` varchar(20) NOT NULL,
  `fid` varchar(20) NOT NULL,
  PRIMARY KEY (`fid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aid_fid`
--

INSERT INTO `aid_fid` (`aid`, `fid`) VALUES
('A10', '1');

-- --------------------------------------------------------

--
-- Table structure for table `appid_fid`
--

CREATE TABLE IF NOT EXISTS `appid_fid` (
  `appid` varchar(20) NOT NULL,
  `fid` varchar(20) NOT NULL,
  PRIMARY KEY (`appid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appid_fid`
--

INSERT INTO `appid_fid` (`appid`, `fid`) VALUES
('7', '3'),
('6', '3'),
('5', '3'),
('4', '2'),
('3', '2'),
('2', '1'),
('1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `data1`
--

CREATE TABLE IF NOT EXISTS `data1` (
  `no_of_days` int(2) NOT NULL,
  `reason` varchar(70) NOT NULL,
  `group` varchar(50) DEFAULT NULL,
  `sex` varchar(50) DEFAULT NULL,
  `uid` varchar(30) NOT NULL,
  `appid` int(30) NOT NULL,
  `result` int(30) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data1`
--

INSERT INTO `data1` (`no_of_days`, `reason`, `group`, `sex`, `uid`, `appid`, `result`) VALUES
(6, 'Vacation', 'Faculty', ' Male', 'V100', 1, 1),
(9, 'Marriage attending', 'Faculty', ' Male', 'V101', 2, -1);

-- --------------------------------------------------------

--
-- Table structure for table `data2`
--

CREATE TABLE IF NOT EXISTS `data2` (
  `name_of_book` varchar(30) NOT NULL,
  `no_of_days_of_issue` int(30) NOT NULL,
  `charge_to_be_deducted_from_` varchar(50) NOT NULL,
  `uid` varchar(30) NOT NULL,
  `appid` int(30) NOT NULL,
  `result` int(30) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data2`
--

INSERT INTO `data2` (`name_of_book`, `no_of_days_of_issue`, `charge_to_be_deducted_from_`, `uid`, `appid`, `result`) VALUES
('', 3, '', 'v100', 3, 0),
('', 3, '', 'v100', 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `data3`
--

CREATE TABLE IF NOT EXISTS `data3` (
  `purpose` varchar(21) NOT NULL,
  `method` varchar(50) NOT NULL,
  `amount` int(4) NOT NULL,
  `uid` varchar(30) NOT NULL,
  `appid` int(30) NOT NULL,
  `result` int(30) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data3`
--

INSERT INTO `data3` (`purpose`, `method`, `amount`, `uid`, `appid`, `result`) VALUES
('Foreing Study', '', 377, 'v100', 5, 1),
('Extra course', 'Extra course Advance', 12, 'v100', 6, 0),
('TEST', 'Defficit', 123, 'v100', 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `data4`
--

CREATE TABLE IF NOT EXISTS `data4` (
  `for` varchar(50) DEFAULT NULL,
  `scholarships` varchar(50) NOT NULL,
  `age` int(2) NOT NULL,
  `uid` varchar(30) NOT NULL,
  `appid` int(30) NOT NULL,
  `result` int(30) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data4`
--


-- --------------------------------------------------------

--
-- Table structure for table `data5`
--

CREATE TABLE IF NOT EXISTS `data5` (
  `radio` varchar(50) DEFAULT NULL,
  `check` int(2) NOT NULL,
  `uid` varchar(30) NOT NULL,
  `appid` int(30) NOT NULL,
  `result` int(30) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data5`
--


-- --------------------------------------------------------

--
-- Table structure for table `data6`
--

CREATE TABLE IF NOT EXISTS `data6` (
  `rad` varchar(50) DEFAULT NULL,
  `number` int(2) NOT NULL,
  `uyg` varchar(42) NOT NULL,
  `uid` varchar(30) NOT NULL,
  `appid` int(30) NOT NULL,
  `result` int(30) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data6`
--


-- --------------------------------------------------------

--
-- Table structure for table `data7`
--

CREATE TABLE IF NOT EXISTS `data7` (
  `rad` varchar(50) DEFAULT NULL,
  `number` int(2) NOT NULL,
  `uyg` varchar(42) NOT NULL,
  `uid` varchar(30) NOT NULL,
  `appid` int(30) NOT NULL,
  `result` int(30) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data7`
--


-- --------------------------------------------------------

--
-- Table structure for table `data8`
--

CREATE TABLE IF NOT EXISTS `data8` (
  `radio` varchar(50) DEFAULT NULL,
  `hg` int(2) NOT NULL,
  `uid` varchar(30) NOT NULL,
  `appid` int(30) NOT NULL,
  `result` int(30) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data8`
--


-- --------------------------------------------------------

--
-- Table structure for table `det1`
--

CREATE TABLE IF NOT EXISTS `det1` (
  `label` varchar(30) NOT NULL,
  `type` varchar(20) NOT NULL,
  `man` int(1) DEFAULT '0',
  `maxlen` int(3) DEFAULT '0',
  `content` varchar(500) NOT NULL,
  `analyze` int(1) DEFAULT '0',
  `maxval` int(11) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `det1`
--

INSERT INTO `det1` (`label`, `type`, `man`, `maxlen`, `content`, `analyze`, `maxval`) VALUES
('no_of_days', 'number', 0, 2, ' ', 1, 50),
('reason', 'text', 1, 70, ' ', 0, 0),
('group', 'dropdown', 0, 0, ' Staff+Faculty++', 0, 0),
('sex', 'radio', 0, 0, ' Male+Female+', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `det2`
--

CREATE TABLE IF NOT EXISTS `det2` (
  `label` varchar(30) NOT NULL,
  `type` varchar(20) NOT NULL,
  `man` int(1) DEFAULT '0',
  `maxlen` int(3) DEFAULT '0',
  `content` varchar(500) NOT NULL,
  `analyze` int(1) DEFAULT '0',
  `maxval` int(11) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `det2`
--

INSERT INTO `det2` (`label`, `type`, `man`, `maxlen`, `content`, `analyze`, `maxval`) VALUES
('name_of_book', 'text', 0, 30, ' ', 0, 0),
('no_of_days_of_issue', 'number', 1, 30, ' ', 1, 4),
('charge_to_be_deducted_from_', 'checkbox', 1, 0, ' Institute acc+Security deposit+', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `det3`
--

CREATE TABLE IF NOT EXISTS `det3` (
  `label` varchar(30) NOT NULL,
  `type` varchar(20) NOT NULL,
  `man` int(1) DEFAULT '0',
  `maxlen` int(3) DEFAULT '0',
  `content` varchar(500) NOT NULL,
  `analyze` int(1) DEFAULT '0',
  `maxval` int(11) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `det3`
--

INSERT INTO `det3` (`label`, `type`, `man`, `maxlen`, `content`, `analyze`, `maxval`) VALUES
('purpose', 'text', 1, 21, ' ', 0, 0),
('method', 'checkbox', 1, 0, ' Advance+Defficit+', 0, 0),
('amount', 'number', 1, 4, ' ', 1, 3000);

-- --------------------------------------------------------

--
-- Table structure for table `det4`
--

CREATE TABLE IF NOT EXISTS `det4` (
  `label` varchar(30) NOT NULL,
  `type` varchar(20) NOT NULL,
  `man` int(1) DEFAULT '0',
  `maxlen` int(3) DEFAULT '0',
  `content` varchar(500) NOT NULL,
  `analyze` int(1) DEFAULT '0',
  `maxval` int(11) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `det4`
--

INSERT INTO `det4` (`label`, `type`, `man`, `maxlen`, `content`, `analyze`, `maxval`) VALUES
('for', 'radio', 0, 0, ' Daughter+Son++', 0, 0),
('scholarships', 'checkbox', 1, 0, ' State+National++', 0, 0),
('age', 'number', 1, 2, ' ', 1, 20);

-- --------------------------------------------------------

--
-- Table structure for table `det5`
--

CREATE TABLE IF NOT EXISTS `det5` (
  `label` varchar(30) NOT NULL,
  `type` varchar(20) NOT NULL,
  `man` int(1) DEFAULT '0',
  `maxlen` int(3) DEFAULT '0',
  `content` varchar(500) NOT NULL,
  `analyze` int(1) DEFAULT '0',
  `maxval` int(11) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `det5`
--

INSERT INTO `det5` (`label`, `type`, `man`, `maxlen`, `content`, `analyze`, `maxval`) VALUES
('radio', 'radio', 0, 0, ' 1+2++', 0, 0),
('check', 'number', 1, 2, ' ', 1, 10);

-- --------------------------------------------------------

--
-- Table structure for table `det6`
--

CREATE TABLE IF NOT EXISTS `det6` (
  `label` varchar(30) NOT NULL,
  `type` varchar(20) NOT NULL,
  `man` int(1) DEFAULT '0',
  `maxlen` int(3) DEFAULT '0',
  `content` varchar(500) NOT NULL,
  `analyze` int(1) DEFAULT '0',
  `maxval` int(11) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `det6`
--

INSERT INTO `det6` (`label`, `type`, `man`, `maxlen`, `content`, `analyze`, `maxval`) VALUES
('rad', 'radio', 0, 0, ' 1+2+++', 0, 0),
('number', 'number', 1, 2, ' ', 1, 12),
('uyg', 'text', 1, 42, ' ', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `det7`
--

CREATE TABLE IF NOT EXISTS `det7` (
  `label` varchar(30) NOT NULL,
  `type` varchar(20) NOT NULL,
  `man` int(1) DEFAULT '0',
  `maxlen` int(3) DEFAULT '0',
  `content` varchar(500) NOT NULL,
  `analyze` int(1) DEFAULT '0',
  `maxval` int(11) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `det7`
--

INSERT INTO `det7` (`label`, `type`, `man`, `maxlen`, `content`, `analyze`, `maxval`) VALUES
('rad', 'radio', 0, 0, ' 1+2+++', 0, 0),
('number', 'number', 1, 2, ' ', 1, 12),
('uyg', 'text', 1, 42, ' ', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `det8`
--

CREATE TABLE IF NOT EXISTS `det8` (
  `label` varchar(30) NOT NULL,
  `type` varchar(20) NOT NULL,
  `man` int(1) DEFAULT '0',
  `maxlen` int(3) DEFAULT '0',
  `content` varchar(500) NOT NULL,
  `analyze` int(1) DEFAULT '0',
  `maxval` int(11) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `det8`
--

INSERT INTO `det8` (`label`, `type`, `man`, `maxlen`, `content`, `analyze`, `maxval`) VALUES
('radio', 'radio', 0, 0, ' 1+2+3+4+', 0, 0),
('hg', 'number', 1, 2, ' ', 1, 23);

-- --------------------------------------------------------

--
-- Table structure for table `fid_fname`
--

CREATE TABLE IF NOT EXISTS `fid_fname` (
  `fname` varchar(50) NOT NULL,
  `fid` varchar(20) NOT NULL,
  `aid` varchar(50) NOT NULL,
  PRIMARY KEY (`fid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fid_fname`
--

INSERT INTO `fid_fname` (`fname`, `fid`, `aid`) VALUES
('Admission Form', '4', 'A10'),
('Scholarship Form', '3', 'A10'),
('Book issue', '2', 'A10'),
('Leave Application', '1', 'A10'),
('test', '5', 'A10'),
('TEST', '6', 'A10'),
('TEST', '7', 'A10'),
('test', '8', 'A10');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `uid` varchar(20) NOT NULL,
  `upass` varchar(50) NOT NULL,
  `mail` varchar(70) NOT NULL,
  `name` varchar(50) NOT NULL,
  `age` int(5) NOT NULL,
  `designation` varchar(20) NOT NULL,
  `fs` int(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `upass`, `mail`, `name`, `age`, `designation`, `fs`) VALUES
('V100', '123', 'abc@gmail.com', 'Dr. A.B.', 30, 'Associate Proffesor', 1),
('V101', '123', 'abc@gmail.com', 'Dr. B.C', 40, 'Professor', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
