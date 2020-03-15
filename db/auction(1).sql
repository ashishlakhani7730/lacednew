-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 13, 2020 at 02:40 PM
-- Server version: 5.7.26
-- PHP Version: 5.6.40

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
-- Table structure for table `about_us`
--

DROP TABLE IF EXISTS `about_us`;
CREATE TABLE IF NOT EXISTS `about_us` (
  `a_id` int(11) NOT NULL AUTO_INCREMENT,
  `about_content` text,
  PRIMARY KEY (`a_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`a_id`, `about_content`) VALUES
(1, 'To edit this text, simply enter your own text into the content area when editing this page.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent tempus eleifend risus ut congue. Pellentesque nec lacus elit. Pellentesque convallis nisi ac augue pharetra eu tristique neque consequat. Mauris ornare tempor nulla, vel sagittis diam convallis eget.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent tempus eleifend risus ut congue. Pellentesque nec lacus elit. Pellentesque convallis nisi ac augue pharetra eu tristique neque consequat. Mauris ornare tempor nulla, vel sagittis diam convallis eget.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent tempus eleifend risus ut congue. Pellentesque nec lacus elit. Pellentesque convallis nisi ac augue pharetra eu tristique neque consequat. Mauris ornare tempor nulla, vel sagittis diam convallis eget.');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `a_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(512) DEFAULT NULL,
  `password` varchar(512) DEFAULT NULL,
  PRIMARY KEY (`a_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `auction_bid`
--

DROP TABLE IF EXISTS `auction_bid`;
CREATE TABLE IF NOT EXISTS `auction_bid` (
  `bid_id` int(11) NOT NULL AUTO_INCREMENT,
  `c_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `bid_price` bigint(20) NOT NULL,
  `bid_active` datetime DEFAULT NULL,
  `completeauction` int(11) DEFAULT '0',
  `winner` int(11) NOT NULL DEFAULT '0',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified1` datetime DEFAULT NULL,
  `modified2` datetime DEFAULT NULL,
  `modified3` datetime DEFAULT NULL,
  PRIMARY KEY (`bid_id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auction_bid`
--

INSERT INTO `auction_bid` (`bid_id`, `c_id`, `p_id`, `bid_price`, `bid_active`, `completeauction`, `winner`, `created`, `modified1`, `modified2`, `modified3`) VALUES
(1, 9, 10, 100, NULL, 0, 0, '2020-02-07 10:31:09', NULL, NULL, NULL),
(3, 9, 10, 250, NULL, 0, 0, '2020-02-07 10:59:55', NULL, NULL, NULL),
(18, 9, 10, 251, NULL, 0, 0, '2020-02-08 05:21:46', NULL, NULL, NULL),
(19, 9, 10, 252, NULL, 0, 0, '2020-02-08 05:22:45', NULL, NULL, NULL),
(20, 2, 10, 260, NULL, 0, 0, '2020-02-08 05:36:00', NULL, NULL, NULL),
(21, 2, 15, 1, NULL, 0, 0, '2020-02-08 05:43:17', NULL, NULL, NULL),
(22, 2, 15, 100, NULL, 0, 0, '2020-02-08 05:43:42', NULL, NULL, NULL),
(23, 9, 10, 270, NULL, 0, 0, '2020-02-10 06:43:28', NULL, NULL, NULL),
(24, 9, 10, 280, NULL, 0, 0, '2020-02-10 06:45:31', NULL, NULL, NULL),
(25, 9, 10, 290, NULL, 0, 0, '2020-02-10 06:47:07', NULL, NULL, NULL),
(26, 2, 1, 100, NULL, 0, 0, '2020-02-10 08:24:38', NULL, NULL, NULL),
(27, 9, 1, 150, NULL, 0, 0, '2020-02-10 10:34:20', NULL, NULL, NULL),
(28, 9, 18, 200, NULL, 0, 0, '2020-02-10 11:06:43', NULL, NULL, NULL),
(29, 9, 1, 160, NULL, 0, 0, '2020-02-11 04:53:52', NULL, NULL, NULL),
(30, 0, 0, 0, NULL, 0, 0, '2020-02-12 05:48:39', NULL, NULL, NULL),
(31, 9, 10, 300, NULL, 0, 0, '2020-02-12 09:46:08', NULL, NULL, NULL);

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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `card_detail`
--

INSERT INTO `card_detail` (`cd_id`, `c_id`, `card_number`, `card_exp_month`, `card_exp_year`, `card_cvc`, `datetime`) VALUES
(1, 9, '4242424242424242', '5', '2022', '123', '2020-01-28 14:19:41'),
(2, 2, '4242424242424242', '05', '2022', '123', '2020-02-08 11:04:11');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

DROP TABLE IF EXISTS `contact_us`;
CREATE TABLE IF NOT EXISTS `contact_us` (
  `cu_id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(256) DEFAULT NULL,
  `lname` varchar(256) DEFAULT NULL,
  `email` varchar(256) DEFAULT NULL,
  `mobile` varchar(256) DEFAULT NULL,
  `message` text,
  `created` datetime DEFAULT NULL,
  `modify` datetime DEFAULT NULL,
  PRIMARY KEY (`cu_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`cu_id`, `fname`, `lname`, `email`, `mobile`, `message`, `created`, `modify`) VALUES
(1, 'ashish', 'lakhani', 'ashish7730@gmail.com', '9737134341', 'test message', '2020-02-12 14:56:00', NULL);

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
  `created` datetime DEFAULT NULL,
  `modify` datetime DEFAULT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`c_id`, `fname`, `lname`, `username`, `password`, `email`, `mobile`, `shipping_address`, `bids`, `img`, `created`, `modify`) VALUES
(2, 'ashish', 'lakhani', 'ashish7730', '712510e5e21b29abc4f5b26bf0c6dfa1', 'ashish7730@gmail.com', '9737134341', 'plot no9,shiv om nagar rto road bhavnagar.364001.', 146, 'default.png', '2020-01-25 10:49:59', '2020-02-08 11:05:23'),
(9, 'vijay', 'malani', 'vijay', '712510e5e21b29abc4f5b26bf0c6dfa1', 'vijay@gmail.com', '9737134342', 'plot no 9,shiv om nagar , rto road bhavnagar', 439, 'cad2158b542b214213ca7fb322742751.png', '2020-01-25 11:01:38', '2020-02-07 15:43:51');

-- --------------------------------------------------------

--
-- Table structure for table `main_category`
--

DROP TABLE IF EXISTS `main_category`;
CREATE TABLE IF NOT EXISTS `main_category` (
  `mc_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(512) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  PRIMARY KEY (`mc_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `main_category`
--

INSERT INTO `main_category` (`mc_id`, `cat_name`, `sort`, `datetime`) VALUES
(1, 'Music', NULL, '2020-01-30 12:13:53'),
(2, 'Books', NULL, '2020-01-30 12:14:02'),
(3, 'Fashion', NULL, '2020-01-30 12:14:11'),
(4, 'Electric', NULL, '2020-01-30 12:14:19'),
(5, 'men', NULL, '2020-02-05 11:29:18');

-- --------------------------------------------------------

--
-- Table structure for table `news_feed`
--

DROP TABLE IF EXISTS `news_feed`;
CREATE TABLE IF NOT EXISTS `news_feed` (
  `n_id` int(11) NOT NULL AUTO_INCREMENT,
  `image` text,
  `news_line` text,
  `creadted` datetime DEFAULT NULL,
  `modify` datetime DEFAULT NULL,
  PRIMARY KEY (`n_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news_feed`
--

INSERT INTO `news_feed` (`n_id`, `image`, `news_line`, `creadted`, `modify`) VALUES
(1, 'www.premiumpress.com/_demoimages/blog/blog6.jpg', 'product nike sell statr from jan - march.', '2020-02-11 14:34:37', NULL),
(2, 'www.premiumpress.com/_demoimages/blog/blog6.jpg', 'product nike sell statr from jan - march.', '2020-02-11 14:34:37', NULL),
(3, 'www.premiumpress.com/_demoimages/blog/blog5.jpg', 'product nike sell statr from jan - march.', '2020-02-11 14:34:37', NULL),
(4, 'www.premiumpress.com/_demoimages/blog/blog4.jpg', 'product nike sell statr from jan - march.', '2020-02-11 14:34:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `news_letter`
--

DROP TABLE IF EXISTS `news_letter`;
CREATE TABLE IF NOT EXISTS `news_letter` (
  `nl_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(512) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`nl_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news_letter`
--

INSERT INTO `news_letter` (`nl_id`, `email`, `created`) VALUES
(1, 'ashish7730@gmail.com', '2020-02-12 11:19:19');

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
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `mc_id` int(11) DEFAULT NULL,
  `sc_id` int(11) DEFAULT NULL,
  `pro_type` int(11) DEFAULT NULL COMMENT '1-live auction,2-simple auction',
  `pro_image1` varchar(512) DEFAULT NULL,
  `pro_image2` varchar(512) DEFAULT NULL,
  `pro_image3` varchar(512) DEFAULT NULL,
  `pro_image4` varchar(512) DEFAULT NULL,
  `pro_image5` varchar(512) DEFAULT NULL,
  `pro_name` varchar(512) DEFAULT NULL,
  `pro_des` text,
  `pro_price` varchar(512) DEFAULT NULL,
  `start_time` datetime DEFAULT NULL,
  `end_time` datetime DEFAULT NULL,
  `pro_sold` int(11) DEFAULT NULL,
  `noofbids` int(11) DEFAULT '0',
  `auction_end` int(11) DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modify` datetime DEFAULT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`p_id`, `mc_id`, `sc_id`, `pro_type`, `pro_image1`, `pro_image2`, `pro_image3`, `pro_image4`, `pro_image5`, `pro_name`, `pro_des`, `pro_price`, `start_time`, `end_time`, `pro_sold`, `noofbids`, `auction_end`, `created`, `modify`) VALUES
(1, 2, 2, 1, '719562f5b2941d310a6a5af1d4abbfb1.png', 'f27bb37708c9cc022dc88fcc7b10da95.png', '8be892703f514013fb64de1b60e69cb4.png', 'ec5db1c7ab059ecdd74c3e3e19030d5d.png', '8022076281b894db5c4b3037acb65259.png', 'nike', '<p>nike shoes is very good condition<br></p>', '120', '2020-02-05 12:00:00', '2020-02-15 11:00:00', NULL, 0, 0, '2020-02-04 03:16:39', NULL),
(2, 5, 6, 1, '0ebb39934adb38c561328f7e0175e043.jpg', '24500b0e908adb571052611a65ded039.jpg', '9dde09794ed96a8ba521bc50f58b60d8.jpg', 'a08876d36051912b2c0c29dc4d554b9b.jpg', '8f5eecc321f1472a496a13950a1d5d58.jpg', 'fila', '<p>fila shoes nice one shoes<br></p><p>fila shoes nice one shoes<br></p><p>fila shoes nice one shoes</p><p>fila shoes nice one shoes</p><p>fila shoes nice one shoes</p><p>fila shoes nice one shoes</p><p>fila shoes nice one shoes</p><p>fila shoes nice one shoes<br></p>', '200', '2020-02-06 12:00:00', '2020-02-15 11:00:00', NULL, 0, 0, '2020-02-05 06:00:48', NULL),
(3, 5, 6, 1, '453f3ebff8374b33b1aa71bd5be92c89.jpg', '7145707e9bcbef35283aca51bdb9fa53.jpg', '87c6a098946a943df9b71236919ee320.jpg', 'fdf9eeb152669723590dea729f0221f6.jpg', '3eaecab447856698fdd87c751c7ee5f3.jpg', 'nike', '<p>nike shoes<br></p>&nbsp;<p>nike shoes<br></p><p>nike shoes<br></p><p>nike shoes<br></p><p>nike shoes<br></p><p>nike shoes<br></p><p>nike shoes<br></p><p>nike shoes<br></p>', '150', '2020-02-06 12:00:00', '2020-02-15 11:00:00', NULL, 0, 0, '2020-02-05 06:01:34', NULL),
(4, 5, 6, 1, '19bf335d915eae6327ee1b8d69e16f5d.jpg', 'b1a75104fcd0375d8b70f43d5ad18eb3.jpg', '19bffdf2443a65f7c2f96b09da266b97.jpg', 'a7db6111abb204ab1869a689b96ef0d9.jpg', 'ea0a104cff71bc9f52befe607d429520.jpg', 'nike', '<p>nike shoes<br></p>', '180', '2020-02-06 12:00:00', '2020-02-15 11:00:00', NULL, 0, 0, '2020-02-05 06:02:19', NULL),
(5, 5, 6, 1, '3dcbf6019035985563ac7eb4325fc49e.jpg', '78830a77fa81013f9c68ccdb2edfa4f6.jpg', '0d7d9703a91c1dbded833e01805d38b1.jpg', '0acb0a53dd161dc7eee230bf9b79c42b.jpg', '2e59ce8dc15505b2b4a25f1df55b341c.jpg', 'reebok', '<p>reebok shoes<br></p>', '190', '2020-02-06 12:00:00', '2020-02-15 11:00:00', NULL, 0, 0, '2020-02-05 06:03:17', NULL),
(6, 5, 6, 1, '00337bba392541e9c65744b1340247bd.jpg', '8f4d71e55084a35de56bc9cc4b7ed9b4.jpg', '5d93747dc4ae3df8664b0123ac1e7cb5.jpg', 'cfdb00eaed7abc716eff4ef2de9ff78f.jpg', '0563d8942da92bcc881066bdb8905dca.jpg', 'reebok', '<p>reebok shoes<br></p>', '250', '2020-02-05 12:00:00', '2020-02-15 11:59:00', NULL, 0, 0, '2020-02-05 06:04:00', NULL),
(7, 5, 6, 1, '3d708ee416ab3e85440c874c84781791.jpg', 'eec12114560e0bb1f8d3345575376d79.jpg', '474992148e6a4e4eabac86dc03833662.jpg', '77bd4a23d33987464a1e4e65dc65a883.jpg', 'bb17363a428a12c066c246cc7bcaabcf.jpg', 'nike', '<p>nike shoes<br></p>', '500', '2020-02-05 12:00:00', '2020-02-15 11:59:00', NULL, 0, 0, '2020-02-05 06:04:41', NULL),
(8, 5, 6, 1, '133493eff5f201631b7a75fa30a1262c.jpg', '032e0c2294ef1ff2b17a0b90a312a991.jpg', 'eae7152e0a412b9ebf539408c4329cf7.jpg', 'db122c89a89d24fb1fcb0578ddf01cd1.jpg', '736f244aea3753739e8d59d2c02653fa.jpg', 'nike', '<p>nike shoes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br></p>', '600', '2020-02-06 12:00:00', '2020-02-15 11:00:00', NULL, 0, 0, '2020-02-05 06:05:24', NULL),
(9, 5, 6, 1, 'ec427d2704f80ff81f921bb61db5c0ef.jpg', '8a268fca83a0585a40304028d3ed5649.jpg', '251c0ba8de29d7b24561829c1738003c.jpg', '84843dc88aefc692c9b03d3adf6eb59d.jpg', '57e08162ad7b615e8fe56d227961adfa.jpg', 'nike', '<p>nike shoes<br></p>', '250', '2020-02-05 12:00:00', '2020-02-15 11:00:00', NULL, 0, 0, '2020-02-05 06:06:28', NULL),
(10, 5, 6, 1, '68c6b4838d0ba9d043ebb41abed1b37f.jpg', 'dc866e92f00e4fe477c9143e6c6cfe9b.jpg', '2e660b13b9acfe35deb8dbd3f752b3a2.jpg', 'a7c01ea283f60268a0e95221ae097f98.jpg', 'ab7d01bebef583ca170a5bb90bdbd344.jpg', 'woodland', '<p>woodland shoes<br></p>', '1000', '2020-02-05 12:00:00', '2020-02-15 11:00:00', NULL, 0, 0, '2020-02-05 06:07:39', NULL),
(11, 5, 6, 1, 'b85cde33c77ef76763de5eb800a127f9.jpg', '7a74df56a9c698f6b1af5186d9d87802.jpg', 'bac8fad7b863567e4cf5d825c7bd67f2.jpg', '9564dfb18802e553adba9b476df9a31e.jpg', 'e4c2a55619b5526cf0c8674bf4d41d37.jpg', 'woodland', '<p>woodland shoes<br></p>', '300', '2020-02-05 10:00:00', '2020-02-15 07:00:00', NULL, 0, 0, '2020-02-05 06:08:41', NULL),
(12, 5, 6, 1, '7dbf80f97d441e0aced8fc032ced8f66.jpg', '7199af58da3af0bdbaf4dba0fb057521.jpg', '4c19ac7ba5599347735d0199daa2f55b.jpg', '7c65aa86a6f4d224f1a8eb4480450e52.jpg', '808b1903461f756b9b45e01a8daa097e.jpg', 'mens shoes', '<p>mens shoes<br></p>', '300', '2020-02-05 09:00:00', '2020-02-15 02:00:00', NULL, 0, 0, '2020-02-05 06:09:46', NULL),
(13, 5, 6, 1, '287e5282083ef93487dfa7a80652ad7a.jpg', 'f1f8b4449b96b63d5e7d75d7e1270865.jpg', '55d2e918e2f9ed60b91c3e0be8a922e9.jpg', 'a3081ed4283e6a4b5fc0a14f183f84f2.jpg', 'f82ec39ac4d44e9277e5423c557555ce.jpg', 'loffer shoes', '<p>loffer shoes&nbsp;&nbsp;&nbsp;&nbsp;<br></p>', '700', '2020-02-05 11:00:00', '2020-02-15 05:00:00', NULL, 0, 0, '2020-02-05 06:10:54', NULL),
(14, 5, 6, 1, '719e8ea017a6e5892aac0971fa1d78f0.jpg', '5b8de4ccc0eed85da4de5827f92952b4.jpg', '3b4b18ca27be7a8c2c33784cd56e2a2c.jpg', 'e5aa05efd3f0eca40598df92994dbff4.jpg', 'befee369fb0e70c39111fcfee4a6f304.jpg', 'mens wear', '<p>mens shoes nice product</p><p>mens shoes nice product</p><p>mens shoes nice product</p><p>mens shoes nice product</p><p>mens shoes nice product</p><p>mens shoes nice product</p><p>mens shoes nice product</p><p>mens shoes nice product</p><p><br></p>', '350', '2020-02-05 12:00:00', '2020-02-15 12:00:00', NULL, 0, 0, '2020-02-05 06:12:05', NULL),
(15, 5, 6, 1, '7fa76a400fc5ec4911ee49bfb834f4eb.jpg', '7a105c222cf8114850cf95f1ddf6637c.jpg', '4882762bc9b8fb0793f94996e63a0641.jpg', '930b291db203fe95845f1461fa185fe2.jpg', '1ca8d6aa466256fa120d1efcecec6fbd.jpg', 'nike', '<p>nike shoes<br></p>', '350', '2020-02-05 12:00:00', '2020-02-15 11:00:00', NULL, 0, 0, '2020-02-05 06:13:02', NULL),
(16, 5, 6, 1, '7bef3102518e6b8575f8dd711b60e4dd.jpg', '1967cb3c391b0c9cf1d21ee4a47845ad.jpg', 'e4d3b3ae6f99ffc369a5a03d9a27d785.jpg', 'fc7094c872d7a45725f813004bac332a.jpg', 'f730b9dadebde38e5cd99d376a02346b.jpg', 'hil shoes', '<p>hil shoes<br></p>', '1500', '2020-02-05 12:00:00', '2020-02-15 11:59:00', NULL, 0, 0, '2020-02-05 06:13:49', NULL),
(17, 5, 6, 1, 'a6de24288c014ec04c757aa8468486ea.jpg', 'd0e0609a40dead7e287d33da0ce20c69.jpg', '5797a5df587c3c2ed4fad78ddc1f8e6e.jpg', '54355b84fc5ec79443d7d1d0158a7160.jpg', '5c3dab1d65625d47bf3e427b016884b9.jpg', 'loffer shoes', '<p>loffer shoes<br></p>', '200', '2020-02-05 09:00:00', '2020-02-15 09:00:00', NULL, 0, 0, '2020-02-05 06:14:52', NULL),
(18, 5, 6, 1, '9bc5607e2ea7a6686d4ce9d2b0bae5f1.jpg', '07e8dd899d3be2a6d492381d0d70196a.jpg', '5e0aff4d764cb052187bb9cea04638b1.jpg', 'ad5e1ba56591d9a580397d74ca567c6a.jpg', '3114f1a039c7274f65462546d5ea0186.jpg', 'party ware', '<p>party ware&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br></p>', '400', '2020-02-05 09:00:00', '2020-02-15 09:00:00', NULL, 0, 0, '2020-02-05 06:17:21', NULL),
(19, 5, 6, 1, 'fc7ef74585d9bf800d0e156c39780614.jpg', '2a12446839d336215bac0bd5068d9113.jpg', 'af3ad6ab89eaf36dd1568d55ed12cd27.jpg', 'e12e4d33f72ae2721b7b7c5903f32f9f.jpg', '77f81230ff42bd85fa55b26bf42a3d49.jpg', 'party ware', '<p>party ware&nbsp;&nbsp;&nbsp;&nbsp;<br></p>', '500', '2020-02-06 12:00:00', '2020-02-13 16:47:49', NULL, 0, 0, '2020-02-05 06:18:39', NULL),
(22, 5, 6, 1, 'cf8a62a0b51f6eeff9e643813180374b.jpg', '42f5f9fab635bff950c0d9ab6ce5fbdb.jpg', 'aedae2802da62d9770b74d4fecf2321d.jpg', '41b68a0d544fb5869a876261b06df1d9.jpg', '0400800af2fd184bf0b7ee5bd2e553ec.jpg', 'adidas', '<p><img style=\"width: 227px;\" src=\"data:image/png;base64,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\" data-filename=\"index.png\"></p><p><br></p><p>adidas product very good condition.<br></p>', '500', '2020-02-13 12:00:00', '2020-02-13 17:00:00', NULL, 0, 0, '2020-02-13 08:09:26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

DROP TABLE IF EXISTS `sub_category`;
CREATE TABLE IF NOT EXISTS `sub_category` (
  `sc_id` int(11) NOT NULL AUTO_INCREMENT,
  `mc_id` int(11) DEFAULT NULL,
  `sub_cat_name` varchar(512) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  PRIMARY KEY (`sc_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`sc_id`, `mc_id`, `sub_cat_name`, `sort`, `datetime`) VALUES
(1, 1, 'tsearice', NULL, '2020-01-30 12:14:37'),
(2, 2, 'harry potter', NULL, '2020-01-30 12:14:49'),
(3, 2, 'genral knowledge', NULL, '2020-02-03 17:17:54'),
(4, 3, 'T-shirts', NULL, '2020-01-30 12:15:21'),
(5, 4, 'Mobile', NULL, '2020-01-30 12:15:31'),
(6, 5, 'shoes', NULL, '2020-02-05 11:29:30');

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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`t_id`, `c_id`, `trans_id`, `amount`, `datetime`) VALUES
(1, 9, 'txn_1G5plUHwUbW8VrG5Hiuj4D5u', '60', '2020-01-28 14:19:41'),
(2, 9, 'txn_1G5pmPHwUbW8VrG5DJIQ2iHt', '60', '2020-01-28 14:20:38'),
(3, 9, 'txn_1G5qU9HwUbW8VrG5g1q6oFTZ', '60', '2020-01-28 15:05:50'),
(4, 2, 'txn_1G9lxJHwUbW8VrG5TolkcKT8', '60', '2020-02-08 11:04:11');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
