-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 21, 2017 at 05:56 PM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fashion_club`
--

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `id` int(11) NOT NULL,
  `create_uid` int(11) NOT NULL DEFAULT '1',
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `write_uid` int(11) NOT NULL DEFAULT '1',
  `write_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `name` varchar(50) NOT NULL,
  `display_name` varchar(100) NOT NULL,
  `parent_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`id`, `create_uid`, `create_date`, `write_uid`, `write_date`, `name`, `display_name`, `parent_id`) VALUES
(1, 1, '2017-06-13 20:58:11', 1, '2017-06-13 20:58:11', 'Wanita', 'Wanita', NULL),
(2, 1, '2017-06-13 00:20:03', 1, '2017-06-13 00:20:03', 'Pakaian', 'Wanita / Pakaian', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_template`
--

CREATE TABLE `product_template` (
  `id` int(11) NOT NULL,
  `create_uid` int(11) DEFAULT '1',
  `create_date` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `write_uid` int(11) DEFAULT '1',
  `write_date` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `name` varchar(100) NOT NULL,
  `display_name` text,
  `list_price` float DEFAULT NULL,
  `standard_price` float DEFAULT NULL,
  `categ_id` int(11) NOT NULL,
  `sale_ok` tinyint(1) DEFAULT '1',
  `purchase_ok` tinyint(1) DEFAULT '0',
  `description_sale` text,
  `product_type_id` int(11) NOT NULL,
  `uom_id` int(11) DEFAULT NULL,
  `active` tinyint(1) DEFAULT '1',
  `website_published` tinyint(1) DEFAULT '0',
  `default_code` varchar(15) DEFAULT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_template`
--

INSERT INTO `product_template` (`id`, `create_uid`, `create_date`, `write_uid`, `write_date`, `name`, `display_name`, `list_price`, `standard_price`, `categ_id`, `sale_ok`, `purchase_ok`, `description_sale`, `product_type_id`, `uom_id`, `active`, `website_published`, `default_code`, `image`) VALUES
(1, 1, '2017-06-21 21:54:52', 1, '2017-06-21 21:54:52', 'Pink Dress', 'Pink Dress', 187000, 125000, 1, 1, 1, '', 1, NULL, 1, 1, 'B71C3AA523F13FG', 'wanita1.jpg'),
(2, 1, '2017-06-21 21:55:27', NULL, '2017-06-21 21:55:27', 'Simple Elegant Dress', NULL, 245000, 200000, 1, 1, 1, '', 1, NULL, 1, 1, 'B71C3AA523F14HZ', 'wanita5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `product_type`
--

CREATE TABLE `product_type` (
  `id` int(11) NOT NULL,
  `create_uid` int(11) NOT NULL DEFAULT '1',
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `write_uid` int(11) NOT NULL DEFAULT '1',
  `write_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_type`
--

INSERT INTO `product_type` (`id`, `create_uid`, `create_date`, `write_uid`, `write_date`, `name`) VALUES
(1, 1, '2017-06-13 00:17:26', 1, '2017-06-13 00:17:26', 'Stockable'),
(2, 1, '2017-06-13 00:17:26', 1, '2017-06-13 00:17:26', 'Consumeable'),
(3, 1, '2017-06-13 00:17:41', 1, '2017-06-13 00:17:41', 'Service');

-- --------------------------------------------------------

--
-- Table structure for table `res_user`
--

CREATE TABLE `res_user` (
  `id` int(11) NOT NULL,
  `login` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `is_public` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `res_user`
--

INSERT INTO `res_user` (`id`, `login`, `password`, `is_public`) VALUES
(1, 'admin@fashion_club.com', '1', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_category_ibfk_1` (`parent_id`),
  ADD KEY `create_uid` (`create_uid`),
  ADD KEY `write_uid` (`write_uid`);

--
-- Indexes for table `product_template`
--
ALTER TABLE `product_template`
  ADD PRIMARY KEY (`id`),
  ADD KEY `create_uid` (`create_uid`),
  ADD KEY `write_uid` (`write_uid`),
  ADD KEY `product_template_ibfk_1` (`product_type_id`),
  ADD KEY `product_template_ibfk_2` (`categ_id`);

--
-- Indexes for table `product_type`
--
ALTER TABLE `product_type`
  ADD PRIMARY KEY (`id`),
  ADD KEY `create_uid` (`create_uid`),
  ADD KEY `write_uid` (`write_uid`);

--
-- Indexes for table `res_user`
--
ALTER TABLE `res_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `product_template`
--
ALTER TABLE `product_template`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `product_type`
--
ALTER TABLE `product_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `res_user`
--
ALTER TABLE `res_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `product_category`
--
ALTER TABLE `product_category`
  ADD CONSTRAINT `product_category_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `product_category` (`id`),
  ADD CONSTRAINT `product_category_ibfk_2` FOREIGN KEY (`create_uid`) REFERENCES `res_user` (`id`),
  ADD CONSTRAINT `product_category_ibfk_3` FOREIGN KEY (`write_uid`) REFERENCES `res_user` (`id`);

--
-- Constraints for table `product_type`
--
ALTER TABLE `product_type`
  ADD CONSTRAINT `product_type_ibfk_1` FOREIGN KEY (`create_uid`) REFERENCES `res_user` (`id`),
  ADD CONSTRAINT `product_type_ibfk_2` FOREIGN KEY (`write_uid`) REFERENCES `res_user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
