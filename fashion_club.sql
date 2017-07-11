-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 11, 2017 at 02:01 PM
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
  `image` text NOT NULL,
  `optional_image_2` text NOT NULL,
  `optional_image_3` text NOT NULL,
  `optional_image_4` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_template`
--

INSERT INTO `product_template` (`id`, `create_uid`, `create_date`, `write_uid`, `write_date`, `name`, `display_name`, `list_price`, `standard_price`, `categ_id`, `sale_ok`, `purchase_ok`, `description_sale`, `product_type_id`, `uom_id`, `active`, `website_published`, `default_code`, `image`, `optional_image_2`, `optional_image_3`, `optional_image_4`) VALUES
(1, 1, '2017-07-04 22:45:06', 1, '2017-07-04 22:45:06', 'Pink Dress', 'Pink Dress', 187000, 125000, 2, 1, 1, '', 1, NULL, 1, 1, 'B71C3AA523F13FG', 'wanita1.jpg', 'wanita1_1.jpg', 'wanita1_2.jpg', 'wanita1_3.jpg'),
(2, 1, '2017-07-04 22:45:06', NULL, '2017-07-04 22:45:06', 'Simple Elegant Dress', NULL, 245000, 200000, 2, 1, 1, '', 1, NULL, 1, 1, 'B71C3AA523F14HZ', 'wanita5.jpg', 'wanita5_1.jpg', 'wanita5_2.jpg', 'wanita5_3.jpg'),
(3, 1, '2017-07-05 09:03:59', NULL, '2017-07-05 09:03:59', 'Perfect Blue Boutique', NULL, 175000, 150000, 2, 1, 1, '', 1, NULL, 1, 1, 'B71C3AA523F14MG', 'wanita4.jpg', 'wanita4_1.jpg', 'wanita4_2.jpg', 'wanita4_3.jpg'),
(4, 1, '2017-07-05 09:05:20', NULL, '2017-07-05 09:05:20', 'Blue Strip Dress', NULL, 167000, 125000, 2, 1, 1, '', 1, NULL, 1, 1, 'B71C3AA523F14TY', 'wanita3.jpg', 'wanita3_1.jpg', 'wanita3_2.jpg', 'wanita3_3.jpg'),
(5, 1, '2017-07-11 18:11:54', NULL, '2017-07-11 18:11:54', 'Red Shiny Dress', NULL, 150000, 120000, 2, 1, 1, '', 1, NULL, 1, 1, 'B71C3AA523FR321', 'wanita6.jpg', 'wanita6_1.jpg', 'wanita6_2.jpg', 'wanita6_3.jpg');

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

-- --------------------------------------------------------

--
-- Table structure for table `sale_order`
--

CREATE TABLE `sale_order` (
  `id` int(5) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `order_date` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `partner_name` varchar(15) NOT NULL,
  `partner_address` varchar(50) NOT NULL,
  `partner_phone` varchar(12) NOT NULL,
  `partner_email` varchar(35) NOT NULL,
  `amount_untaxed` float NOT NULL,
  `amount_tax` float NOT NULL,
  `amount_total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sale_order`
--

INSERT INTO `sale_order` (`id`, `name`, `order_date`, `partner_name`, `partner_address`, `partner_phone`, `partner_email`, `amount_untaxed`, `amount_tax`, `amount_total`) VALUES
(1, 'SO/17/0001', '2017-07-05 10:00:00', 'Testing', 'Testing Address', '0123456789', 'testing@email.com', 510000, 51000, 561000),
(2, 'SO/17/0002', '2017-07-11 18:07:56', 'Rizka Fitriani ', 'Pandana Merdeka', '0987654321', 'rizkahadiii@gmail.com', 159091, 15909.1, 175000),
(3, 'SO/17/0003', '2017-07-11 18:07:10', 'Sojoyenjoy', 'Plamongan Indah Blok I8/6 Semarang', '085726984041', 'sojoy.enjoyaja@gmail.com', 288182, 28818.2, 317000),
(4, 'SO/17/0004', '2017-07-11 11:48:55', 'Kresna', 'Tuku', '0123456789', 'kresna@email.com', 374545, 37454.5, 657000),
(5, 'SO/17/0005', '2017-07-11 18:07:19', 'Adham Hayukalbu', 'Plamongan Indah Blok I8/6 Semarang', '085726984041', 'adham@idealisconsulting.com', 392727, 39272.7, 619000);

-- --------------------------------------------------------

--
-- Table structure for table `sale_order_line`
--

CREATE TABLE `sale_order_line` (
  `id` int(5) NOT NULL,
  `order_id` int(5) NOT NULL,
  `product_id` int(5) NOT NULL,
  `qty_ordered` float NOT NULL,
  `price_unit` float NOT NULL,
  `amount_untaxed` float NOT NULL,
  `amount_tax` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sale_order_line`
--

INSERT INTO `sale_order_line` (`id`, `order_id`, `product_id`, `qty_ordered`, `price_unit`, `amount_untaxed`, `amount_tax`) VALUES
(1, 1, 1, 3, 187000, 510000, 51000),
(2, 2, 3, 1, 175000, 159091, 15909.1),
(6, 3, 5, 1, 150000, 136364, 13636.4),
(7, 3, 4, 1, 167000, 151818, 15181.8),
(8, 4, 4, 1, 167000, 151818, 15181.8),
(9, 4, 2, 2, 245000, 222727, 22272.7),
(10, 5, 2, 1, 245000, 222727, 22272.7),
(11, 5, 1, 2, 187000, 170000, 17000);

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
-- Indexes for table `sale_order`
--
ALTER TABLE `sale_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale_order_line`
--
ALTER TABLE `sale_order_line`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sale_order_line_ibfk_1` (`order_id`),
  ADD KEY `sale_order_line_ibfk_2` (`product_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
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
-- AUTO_INCREMENT for table `sale_order`
--
ALTER TABLE `sale_order`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `sale_order_line`
--
ALTER TABLE `sale_order_line`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
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

--
-- Constraints for table `sale_order_line`
--
ALTER TABLE `sale_order_line`
  ADD CONSTRAINT `sale_order_line_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `sale_order` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `sale_order_line_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product_template` (`id`) ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
