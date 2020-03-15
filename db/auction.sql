-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 29, 2020 at 06:22 AM
-- Server version: 5.7.26
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `auction`
--

-- --------------------------------------------------------

--
-- Table structure for table `card_detail`
--

DROP TABLE IF EXISTS `card_detail`;
CREATE TABLE IF NOT EXISTS `card_detail` (
  `cd_id` int(11) NOT NULL AUTO_INCREMENT,
  `c_id` int(11) DEFAULT NULL,
  `card_number` varchar(16) DEFAULT NULL,
  `card_exp_month` varchar(2) DEFAULT NULL,
  `card_exp_year` varchar(4) DEFAULT NULL,
  `card_cvc` varchar(3) DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  PRIMARY KEY (`cd_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `card_detail`
--

INSERT INTO `card_detail` (`cd_id`, `c_id`, `card_number`, `card_exp_month`, `card_exp_year`, `card_cvc`, `datetime`) VALUES
(1, 9, '4242424242424242', '5', '2022', '123', '2020-01-28 14:19:41');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(512) DEFAULT NULL,
  `lname` varchar(512) DEFAULT NULL,
  `username` varchar(512) DEFAULT NULL,
  `password` varchar(512) DEFAULT NULL,
  `email` varchar(512) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `shipping_address` varchar(1024) DEFAULT NULL,
  `bids` int(11) DEFAULT '0',
  `img` varchar(512) DEFAULT 'default.png',
  PRIMARY KEY (`c_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`c_id`, `fname`, `lname`, `username`, `password`, `email`, `mobile`, `shipping_address`, `bids`, `img`) VALUES
(2, NULL, NULL, 'ashish7730', '20c7d6ba920dca730ee107dd9c698870', 'ashish7730@gmail.com', NULL, NULL, 0, 'default.png'),
(9, NULL, NULL, 'vijay', '712510e5e21b29abc4f5b26bf0c6dfa1', 'vijay@gmail.com', NULL, NULL, 450, 'default.png');

-- --------------------------------------------------------

--
-- Table structure for table `package_bids`
--

DROP TABLE IF EXISTS `package_bids`;
CREATE TABLE IF NOT EXISTS `package_bids` (
  `pb_id` int(11) NOT NULL AUTO_INCREMENT,
  `num_bids` int(11) DEFAULT '0',
  PRIMARY KEY (`pb_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `package_bids`
--

INSERT INTO `package_bids` (`pb_id`, `num_bids`) VALUES
(1, 150);

-- --------------------------------------------------------

--
-- Table structure for table `package_bid_rate`
--

DROP TABLE IF EXISTS `package_bid_rate`;
CREATE TABLE IF NOT EXISTS `package_bid_rate` (
  `pbr_id` int(11) NOT NULL AUTO_INCREMENT,
  `bid_rate` int(11) DEFAULT '0',
  PRIMARY KEY (`pbr_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `package_bid_rate`
--

INSERT INTO `package_bid_rate` (`pbr_id`, `bid_rate`) VALUES
(1, 60);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

DROP TABLE IF EXISTS `transaction`;
CREATE TABLE IF NOT EXISTS `transaction` (
  `t_id` int(11) NOT NULL AUTO_INCREMENT,
  `c_id` int(11) DEFAULT NULL,
  `trans_id` varchar(512) DEFAULT NULL,
  `amount` varchar(512) DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  PRIMARY KEY (`t_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`t_id`, `c_id`, `trans_id`, `amount`, `datetime`) VALUES
(1, 9, 'txn_1G5plUHwUbW8VrG5Hiuj4D5u', '6000', '2020-01-28 14:19:41'),
(2, 9, 'txn_1G5pmPHwUbW8VrG5DJIQ2iHt', '6000', '2020-01-28 14:20:38'),
(3, 9, 'txn_1G5qU9HwUbW8VrG5g1q6oFTZ', '6000', '2020-01-28 15:05:50');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
