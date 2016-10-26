-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2015 at 09:55 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `badapurchase`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank_details`
--

CREATE TABLE IF NOT EXISTS `bank_details` (
  `user_id` int(11) NOT NULL,
`bank_id` int(11) NOT NULL,
  `bank_name` int(11) NOT NULL,
  `ean` text NOT NULL,
  `ahn` varchar(20) NOT NULL,
  `ifc` varchar(8) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `bank_details`
--

INSERT INTO `bank_details` (`user_id`, `bank_id`, `bank_name`, `ean`, `ahn`, `ifc`) VALUES
(8, 14, 1, '11654807219101', 'praveen', '12345'),
(10, 15, 5, '9876543', 'dfgh', '3456789'),
(13, 16, 1, '12345', 'qwdfv', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `bank_table`
--

CREATE TABLE IF NOT EXISTS `bank_table` (
`bank_id` int(11) NOT NULL,
  `bank_name` varchar(20) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `bank_table`
--

INSERT INTO `bank_table` (`bank_id`, `bank_name`) VALUES
(1, 'State Bank Of India'),
(2, 'Axis Bank'),
(3, 'Punjab National Bank'),
(4, 'State Bank Of Vodhra'),
(5, 'ICICI Bank');

-- --------------------------------------------------------

--
-- Table structure for table `brand_table`
--

CREATE TABLE IF NOT EXISTS `brand_table` (
  `producttype_id` int(20) NOT NULL,
`brand_id` int(11) NOT NULL,
  `brand_name` varchar(20) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `brand_table`
--

INSERT INTO `brand_table` (`producttype_id`, `brand_id`, `brand_name`) VALUES
(8, 6, 'hello'),
(12, 7, 'affu'),
(7, 8, 'hiwee'),
(21, 9, 'Peter England'),
(33, 10, 'superbrand'),
(30, 11, '1222'),
(23, 12, 'Lewis');

-- --------------------------------------------------------

--
-- Table structure for table `category_table`
--

CREATE TABLE IF NOT EXISTS `category_table` (
`category_id` int(11) NOT NULL,
  `category_name` varchar(20) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `category_table`
--

INSERT INTO `category_table` (`category_id`, `category_name`) VALUES
(1, 'Agriculture & Foods'),
(2, 'Clothing'),
(3, 'Electronics'),
(4, 'Sports & Gifts'),
(5, 'Plastics'),
(6, 'Bags & Accessories'),
(7, 'Furniture');

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `contact_table`
--

CREATE TABLE IF NOT EXISTS `contact_table` (
`contact_id` int(11) NOT NULL,
  `email` varchar(20) NOT NULL,
  `contact_no` varchar(10) NOT NULL,
  `message` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `contact_table`
--

INSERT INTO `contact_table` (`contact_id`, `email`, `contact_no`, `message`) VALUES
(1, 'raj@gmail.com', '32456', 'fgh'),
(2, 'raj@gmail.com', 'hj', 'ghj'),
(3, 'raj@gmail.com', '32456', 'fgh'),
(4, 'sagar@gmail.com', 'ghj', 'gbhnm'),
(5, 'pk@gmail', '32456', 'fghjk'),
(6, 'raj@gmail.com', '32456', 'vbnm'),
(7, 'praveen18.786@gmail.', '9992317661', '12'),
(8, 'xyz@gmail.com', '9992317661', 'ghjk'),
(9, 'raj@gmail.com', '9992317661', 'hello');

-- --------------------------------------------------------

--
-- Table structure for table `district_table`
--

CREATE TABLE IF NOT EXISTS `district_table` (
  `state_id` int(11) NOT NULL,
`district_id` int(11) NOT NULL,
  `district_name` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `district_table`
--

INSERT INTO `district_table` (`state_id`, `district_id`, `district_name`) VALUES
(1, 1, 'chandigarh'),
(3, 2, 'jaipur');

-- --------------------------------------------------------

--
-- Table structure for table `notification_table`
--

CREATE TABLE IF NOT EXISTS `notification_table` (
`notification_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` varchar(150) NOT NULL,
  `is_seen` int(2) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=579 ;

--
-- Dumping data for table `notification_table`
--

INSERT INTO `notification_table` (`notification_id`, `user_id`, `message`, `is_seen`) VALUES
(571, 10, 'Congrulation!! your product details are successfully verified,', 1),
(572, 10, 'Congrulation!! your product details are successfully verified,', 1),
(573, 10, 'Congrulation!! your product details are successfully verified,', 1),
(574, 10, 'Congrulation!! your product details are successfully verified,', 1),
(575, 10, 'Congrulation!! your product details are successfully verified, ', 1),
(576, 10, 'Congrulation!! your product details are successfully verified, ', 1),
(577, 10, 'product details are not trusted, sorry!! uploading not possible', 1),
(578, 10, 'Congrulation!! your product details are successfully verified,', 1);

-- --------------------------------------------------------

--
-- Table structure for table `payment_table`
--

CREATE TABLE IF NOT EXISTS `payment_table` (
`payment_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `payment_mode` text NOT NULL,
  `gatway_status` varchar(100) NOT NULL,
  `total_order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pincode_table`
--

CREATE TABLE IF NOT EXISTS `pincode_table` (
  `district_id` int(11) NOT NULL,
`pincode_id` int(11) NOT NULL,
  `pincode` int(6) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `pincode_table`
--

INSERT INTO `pincode_table` (`district_id`, `pincode_id`, `pincode`) VALUES
(1, 2, 123001),
(2, 3, 203040);

-- --------------------------------------------------------

--
-- Table structure for table `producttype_table`
--

CREATE TABLE IF NOT EXISTS `producttype_table` (
  `subcategory_id` int(11) NOT NULL,
`producttype_id` int(11) NOT NULL,
  `producttype_name` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `producttype_table`
--

INSERT INTO `producttype_table` (`subcategory_id`, `producttype_id`, `producttype_name`) VALUES
(13, 7, 'Beans'),
(13, 8, 'Leafy Vegetables'),
(13, 9, 'Potato, Onion, Tomato'),
(14, 10, 'Papaya'),
(14, 11, 'Dry Fruits'),
(14, 12, 'Apple'),
(14, 13, 'Banana'),
(14, 14, 'Orange'),
(15, 15, 'Kabuli Chana'),
(15, 16, 'Moong'),
(16, 17, 'Wheat'),
(16, 18, 'Rice'),
(17, 19, 'Cold Drinks'),
(17, 20, 'Juices'),
(18, 21, 'Jeans'),
(18, 22, 'Shirts'),
(18, 23, 'T-shirts'),
(20, 24, 'Tops'),
(21, 26, 'kids jeans'),
(21, 27, 'T-shirt'),
(22, 28, 'Television'),
(22, 29, 'Washing Machine'),
(22, 30, 'Air Conditioners'),
(23, 31, 'Microwave Oven'),
(23, 32, 'Chminey'),
(16, 33, 'Rajma');

-- --------------------------------------------------------

--
-- Table structure for table `product_review_table`
--

CREATE TABLE IF NOT EXISTS `product_review_table` (
  `product_id` int(11) NOT NULL,
`review_id` int(11) NOT NULL,
  `review` varchar(200) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `product_review_table`
--

INSERT INTO `product_review_table` (`product_id`, `review_id`, `review`) VALUES
(40, 1, 'nyc product :)'),
(40, 2, 'mast h bhai'),
(40, 3, 'good review'),
(40, 4, 'hello'),
(40, 5, 'nyc '),
(40, 6, 'gud one'),
(40, 7, 'gud '),
(40, 8, 'qwer'),
(40, 9, 'sdfghj'),
(40, 10, 'fghjk'),
(40, 11, 'ghm'),
(64, 12, 'hello nyc');

-- --------------------------------------------------------

--
-- Table structure for table `product_table`
--

CREATE TABLE IF NOT EXISTS `product_table` (
  `userid` int(11) NOT NULL,
`product_id` int(20) NOT NULL,
  `category` int(20) NOT NULL,
  `subcategory` int(20) NOT NULL,
  `producttype` int(11) NOT NULL,
  `brand` int(20) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `bank_id` int(11) NOT NULL,
  `size` int(11) NOT NULL,
  `product_image` varchar(200) NOT NULL,
  `product_name` text NOT NULL,
  `modelno` varchar(20) NOT NULL,
  `price` float NOT NULL,
  `offer` varchar(50) NOT NULL,
  `state` text NOT NULL,
  `district` text NOT NULL,
  `pincode` int(10) NOT NULL,
  `is_verified` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=67 ;

--
-- Dumping data for table `product_table`
--

INSERT INTO `product_table` (`userid`, `product_id`, `category`, `subcategory`, `producttype`, `brand`, `supplier_id`, `bank_id`, `size`, `product_image`, `product_name`, `modelno`, `price`, `offer`, `state`, `district`, `pincode`, `is_verified`) VALUES
(10, 35, 1, 15, 17, 10, 37, 26, 50, 'http://localhost/bada/img//Beauty-Keira-Knightley-Wallpaper.jpg', 'ac 5', '12345', 3000, 'yes', '', '', 0, 1),
(10, 36, 4, 26, 29, 3, 36, 26, 49, 'http://localhost/bada/img//Beauty-Keira-Knightley-Wallpaper.jpg', 'air cooler', '12345', 324, '234', '', '', 0, 1),
(10, 37, 4, 26, 29, 2, 36, 26, 48, 'http://localhost/bada/img//Beauty-Keira-Knightley-Wallpaper.jpg', 'air cooler', '543', 324, 'no', '', '', 0, 1),
(10, 38, 4, 27, 29, 3, 36, 26, 54, 'http://localhost/bada/img//Beauty-Keira-Knightley-Wallpaper.jpg', 'ac 3', '543', 3000, 'yes', '', '', 0, 1),
(10, 39, 4, 26, 29, 4, 36, 26, 55, 'http://localhost/bada/img//Beauty-Keira-Knightley-Wallpaper.jpg', 'ac 3', '123', 3000, 'yes', '', '', 0, 1),
(10, 40, 4, 27, 29, 3, 36, 26, 57, 'http://localhost/bada/img//Beauty-Keira-Knightley-Wallpaper.jpg', 'ac 5', '1000', 324, '234', '', '', 0, 1),
(10, 41, 4, 28, 29, 3, 37, 26, 58, 'http://localhost/bada/img//Beauty-Keira-Knightley-Wallpaper.jpg', 'ac 3', '123', 100, 'yes', '', '', 0, 1),
(10, 42, 4, 29, 29, 1, 36, 14, 62, 'http://localhost/bada/img//Beauty-Keira-Knightley-Wallpaper.jpg', 'lg2', 'h100', 1999, 'yes', '', '', 0, 1),
(10, 43, 4, 30, 29, 3, 36, 14, 63, 'http://localhost/bada/img//Beauty-Keira-Knightley-Wallpaper.jpg', 'h100', 'Q1000', 1000, 'yes', '', '', 0, 1),
(10, 44, 4, 26, 29, 3, 36, 14, 63, 'http://localhost/bada/img//Beauty-Keira-Knightley-Wallpaper.jpg', 'abc', '', 555, '', '', '', 0, 1),
(10, 45, 4, 27, 29, 3, 38, 15, 64, 'http://localhost/bada/img//Beauty-Keira-Knightley-Wallpaper.jpg', 'qwer', 'wer', 123, 'no', '', '', 0, 1),
(10, 46, 4, 26, 29, 5, 38, 15, 65, 'http://localhost/bada/img//Beauty-Keira-Knightley-Wallpaper.jpg', 'njm,', 'jkl', 0, 'fghj', '', '', 0, 1),
(10, 63, 4, 18, 21, 9, 38, 15, 103, 'http://localhost/bada/img//Beauty-Keira-Knightley-Wallpaper.jpg', 'h100', 'Q1000', 333, 'yes', '', '', 0, 1),
(10, 64, 4, 28, 0, 0, 38, 15, 104, 'http://localhost/bada/img//cricket_bat.jpg', 'Smashing Bat', '', 1999, 'fghj', '', '', 0, 1),
(10, 65, 1, 16, 33, 10, 38, 15, 105, 'http://localhost/bada/img//cricket_bat.jpg', 'h100', '1000', 100, 'no', '', '', 0, 1),
(10, 66, 2, 18, 23, 12, 38, 15, 111, 'http://localhost/bada/img/laptops5.jpg', 'awesome shirt', '123w23', 333, 'yes', '', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `role_table`
--

CREATE TABLE IF NOT EXISTS `role_table` (
`role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `shipping_table`
--

CREATE TABLE IF NOT EXISTS `shipping_table` (
  `userid` int(11) NOT NULL,
`shipping_id` int(11) NOT NULL,
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `email` varchar(20) NOT NULL,
  `mno` varchar(10) NOT NULL,
  `altmno` varchar(15) NOT NULL,
  `address1` varchar(100) NOT NULL,
  `address2` varchar(100) NOT NULL,
  `city` text NOT NULL,
  `postcode` int(6) NOT NULL,
  `state` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `shipping_table`
--

INSERT INTO `shipping_table` (`userid`, `shipping_id`, `fname`, `lname`, `email`, `mno`, `altmno`, `address1`, `address2`, `city`, `postcode`, `state`) VALUES
(10, 4, 'pk', 'k', 'raj@gmail.com', '9992317661', '56789', 'mahesh kumar babulal, near water tank, purani sarai, narnaul, haryana', '4567', '345678', 4567, '4567'),
(12, 5, '', '', '', '', '', '', '', '', 0, ''),
(13, 6, 'appu', 'gupta', 'appu@gmail.com', '9992317661', '56789', '3456789', '4567', 'narnaul', 123001, '4567');

-- --------------------------------------------------------

--
-- Table structure for table `shopping_cart_table`
--

CREATE TABLE IF NOT EXISTS `shopping_cart_table` (
  `cart_role` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
`cart_id` int(11) NOT NULL,
  `product_image` varchar(100) NOT NULL,
  `product_name` varchar(20) NOT NULL,
  `modelno` varchar(10) NOT NULL,
  `price` varchar(10) NOT NULL,
  `size` varchar(5) NOT NULL,
  `quantity` varchar(10) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=47 ;

--
-- Dumping data for table `shopping_cart_table`
--

INSERT INTO `shopping_cart_table` (`cart_role`, `user_id`, `product_id`, `cart_id`, `product_image`, `product_name`, `modelno`, `price`, `size`, `quantity`) VALUES
(1, 8, 40, 25, 'http://localhost/bada/img//Beauty-Keira-Knightley-Wallpaper.jpg', 'ac 5', '1000', '324', '0', '10'),
(1, 8, 41, 26, 'http://localhost/bada/img//Beauty-Keira-Knightley-Wallpaper.jpg', 'ac 3', '123', '100', '', '2'),
(1, 8, 28, 27, 'http://localhost/bada/img//Beauty-Keira-Knightley-Wallpaper.jpg', 'ac 5', '12345', '1000', '0', ''),
(3, 10, 29, 37, 'http://localhost/bada/img//Beauty-Keira-Knightley-Wallpaper.jpg', 'megan', '678', '200', '0', '5'),
(1, 12, 28, 38, 'http://localhost/bada/img//Beauty-Keira-Knightley-Wallpaper.jpg', 'ac 5', '12345', '1000', '0', '2'),
(1, 12, 35, 39, 'http://localhost/bada/img//Beauty-Keira-Knightley-Wallpaper.jpg', 'ac 5', '12345', '3000', '0', ''),
(1, 12, 35, 43, 'http://localhost/bada/img//Beauty-Keira-Knightley-Wallpaper.jpg', 'ac 5', '12345', '3000', '0', ''),
(2, 13, 64, 45, 'http://localhost/bada/img//cricket_bat.jpg', 'Smashing Bat', '', '1999', '0', ''),
(3, 10, 66, 46, 'http://localhost/bada/img/laptops5.jpg', 'awesome shirt', '123w23', '333', '0', '');

-- --------------------------------------------------------

--
-- Table structure for table `size_table`
--

CREATE TABLE IF NOT EXISTS `size_table` (
  `supplierid` int(11) NOT NULL,
`size_id` int(11) NOT NULL,
  `size1` varchar(10) NOT NULL,
  `maximumquantity1` varchar(10) NOT NULL,
  `minpurchase1` varchar(10) NOT NULL,
  `size2` varchar(10) NOT NULL,
  `maximumquantity2` varchar(10) NOT NULL,
  `minpurchase2` varchar(10) NOT NULL,
  `size3` varchar(10) NOT NULL,
  `maximumquantity3` varchar(10) NOT NULL,
  `minpurchase3` varchar(10) NOT NULL,
  `size4` varchar(10) NOT NULL,
  `maximumquantity4` varchar(10) NOT NULL,
  `minpurchase4` varchar(10) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=112 ;

--
-- Dumping data for table `size_table`
--

INSERT INTO `size_table` (`supplierid`, `size_id`, `size1`, `maximumquantity1`, `minpurchase1`, `size2`, `maximumquantity2`, `minpurchase2`, `size3`, `maximumquantity3`, `minpurchase3`, `size4`, `maximumquantity4`, `minpurchase4`) VALUES
(37, 46, '1.5 on', '10', '5', '1 ton', '50', '20', '1.2 ton', '30', '10', '2.5 ton', '10', '3'),
(37, 48, '1.5 ton', '10', '10', '1 ton', '50', '20', '', '', '', '', '', ''),
(37, 49, '1.5 ton', '10', '5', '1 ton', '50', '20', '', '', '', '', '', ''),
(37, 50, '1.5 ton', '10', '8', 'narnaul', '50', '20', '', '', '', '', '', ''),
(37, 51, '1.5 ton', '10', '10', '1 ton', '50', '20', '', '', '', '', '', ''),
(37, 52, '100 L', '20', '8', 'narnaul', '50', '20', 'narnaul', '30', '10', '', '', ''),
(37, 53, '100 L', '20', '5', 'narnaul', '50', '20', '', '', '', '', '', ''),
(37, 54, '21 L', '89', '65', '', '', '', '', '', '', '', '', ''),
(37, 55, '21 inches', '54', '13', '', '', '', '', '', '', '', '', ''),
(37, 56, '1.5 on', '10', '10', '1 ton', '50', '20', '', '', '', '', '', ''),
(37, 57, 'narnaul', '10', '10', '', '', '', '', '', '', '', '', ''),
(37, 58, 'M', '50', '20', 'L', '40', '30', 'XL', '30', '20', 'XXL', '67', '21'),
(36, 59, '100 L', '20', '5', '', '', '', '', '', '', '', '', ''),
(36, 60, '100 L', '20', '5', '', '', '', '', '', '', '', '', ''),
(36, 61, '100 L', '20', '5', '', '', '', '', '', '', '', '', ''),
(36, 62, '100 L', '20', '5', '', '', '', '', '', '', '', '', ''),
(36, 63, '1.5 ton', '10', '10', '1 ton', '50', '20', '', '', '', '', '', ''),
(38, 64, 'dfgh', 'fghj', 'fghj', '', '', '', '', '', '', '', '', ''),
(38, 65, 'j', 'b', 'b', '', '', '', '', '', '', '', '', ''),
(38, 66, 'j', '20', '8', '', '', '', '', '', '', '', '', ''),
(38, 67, '', '', '', '', '', '', '', '', '', '', '', ''),
(38, 68, '', '', '', '', '', '', '', '', '', '', '', ''),
(38, 69, '', '', '', '', '', '', '', '', '', '', '', ''),
(38, 70, '', '', '', '', '', '', '', '', '', '', '', ''),
(38, 71, '', '', '', '', '', '', '', '', '', '', '', ''),
(38, 72, '', '', '', '', '', '', '', '', '', '', '', ''),
(38, 73, '', '', '', '', '', '', '', '', '', '', '', ''),
(38, 74, '1.5 on', 'b', '5', '', '', '', '', '', '', '', '', ''),
(38, 75, 'j', 'fghj', 'b', '', '', '', '', '', '', '', '', ''),
(38, 76, 'j', 'fghj', 'b', '', '', '', '', '', '', '', '', ''),
(38, 77, '1.5 ton', '20', 'b', '', '', '', '', '', '', '', '', ''),
(38, 78, 'j', 'b', 'b', '', '', '', '', '', '', '', '', ''),
(38, 79, '', '', '', '', '', '', '', '', '', '', '', ''),
(38, 80, '', '', '', '', '', '', '', '', '', '', '', ''),
(38, 81, '', '', '', '', '', '', '', '', '', '', '', ''),
(38, 82, '', '', '', '', '', '', '', '', '', '', '', ''),
(38, 83, '', '', '', '', '', '', '', '', '', '', '', ''),
(38, 84, '1.5 ton', '20', 'b', '', '', '', '', '', '', '', '', ''),
(38, 85, '', '', '', '', '', '', '', '', '', '', '', ''),
(38, 86, '', '', '', '', '', '', '', '', '', '', '', ''),
(38, 87, '', '', '', '', '', '', '', '', '', '', '', ''),
(38, 88, '', '', '', '', '', '', '', '', '', '', '', ''),
(38, 89, '', '', '', '', '', '', '', '', '', '', '', ''),
(38, 90, '', '', '', '', '', '', '', '', '', '', '', ''),
(38, 91, '', '', '', '', '', '', '', '', '', '', '', ''),
(38, 92, '', '', '', '', '', '', '', '', '', '', '', ''),
(38, 93, '', '', '', '', '', '', '', '', '', '', '', ''),
(38, 94, '', '', '', '', '', '', '', '', '', '', '', ''),
(38, 95, '', '', '', '', '', '', '', '', '', '', '', ''),
(38, 96, '', '', '', '', '', '', '', '', '', '', '', ''),
(38, 97, '', '', '', '', '', '', '', '', '', '', '', ''),
(38, 98, '', '', '', '', '', '', '', '', '', '', '', ''),
(38, 99, '', '', '', '', '', '', '', '', '', '', '', ''),
(38, 100, '', '', '', '', '', '', '', '', '', '', '', ''),
(38, 101, '', '', '', '', '', '', '', '', '', '', '', ''),
(38, 102, 'j', '20', '10', '', '', '', '', '', '', '', '', ''),
(38, 103, 'dfgh', '20', 'b', '', '', '', '', '', '', '', '', ''),
(38, 104, 'small size', '20', '10', '', '', '', '', '', '', '', '', ''),
(38, 105, '100', '20', 'b', '', '', '', '', '', '', '', '', ''),
(38, 106, '', '', '', '', '', '', '', '', '', '', '', ''),
(38, 107, '', '', '', '', '', '', '', '', '', '', '', ''),
(38, 108, '', '', '', '', '', '', '', '', '', '', '', ''),
(38, 109, '100 L', 'b', '5', '', '', '', '', '', '', '', '', ''),
(39, 110, '', '', '', '', '', '', '', '', '', '', '', ''),
(38, 111, 'm', '20', '10', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `state_table`
--

CREATE TABLE IF NOT EXISTS `state_table` (
`state_id` int(11) NOT NULL,
  `state_name` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `state_table`
--

INSERT INTO `state_table` (`state_id`, `state_name`) VALUES
(1, 'haryana'),
(2, 'punjab'),
(3, 'rajasthan'),
(4, 'hyderbad');

-- --------------------------------------------------------

--
-- Table structure for table `subcategory_table`
--

CREATE TABLE IF NOT EXISTS `subcategory_table` (
`subcategory_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_name` varchar(20) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `subcategory_table`
--

INSERT INTO `subcategory_table` (`subcategory_id`, `category_id`, `subcategory_name`) VALUES
(13, 1, 'Vegetables'),
(14, 1, 'Fruits'),
(15, 1, 'Pulses'),
(16, 1, 'Grains'),
(17, 1, 'Beverages'),
(18, 2, 'Mens Wear'),
(20, 2, 'Womens Wear'),
(21, 2, 'Kids Wear'),
(22, 3, 'Home Appliances'),
(23, 3, 'Kitchen Appliances'),
(24, 3, 'Mobiles'),
(25, 3, 'Laptops'),
(26, 4, 'Sports shoes'),
(27, 2, 'sports Appearel'),
(28, 4, 'Sports Accessories'),
(29, 4, 'Fitness Accessories'),
(30, 4, 'Gift Items'),
(31, 5, 'Kitchen Plastics'),
(32, 5, 'plastic Accessories'),
(33, 6, 'Carry Bags'),
(34, 6, 'Mobile Covers'),
(35, 6, 'Wearable Accessories'),
(36, 7, 'Bedroom Furniture'),
(37, 7, 'Office Furniture'),
(38, 7, 'Household Furniture');

-- --------------------------------------------------------

--
-- Table structure for table `supplier_name`
--

CREATE TABLE IF NOT EXISTS `supplier_name` (
  `user_id` int(11) NOT NULL,
`supplier_id` int(11) NOT NULL,
  `firm_name` varchar(50) NOT NULL,
  `owner_name` text NOT NULL,
  `Mobile_no` varchar(10) NOT NULL,
  `landline_no` varchar(15) NOT NULL,
  `firm_address` varchar(200) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `supplier_name`
--

INSERT INTO `supplier_name` (`user_id`, `supplier_id`, `firm_name`, `owner_name`, `Mobile_no`, `landline_no`, `firm_address`) VALUES
(8, 36, 'PK Textile', 'praveen kumar', '9992317661', '01281251520', 'mahesh kumar babulal, near water tank, purani sarai, narnaul, haryana'),
(9, 37, 'MM Computers', 'praveen kumar', '9992317661', '01281251520', 'mahesh kumar babulal, near water tank, purani sarai, narnaul, haryana'),
(10, 38, 'cvb', 'frghj', 'dfgh', 'frghj', 'fghj'),
(13, 39, 'appu', 'ghar', '12345', '34567', 'dfghjk');

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE IF NOT EXISTS `user_table` (
  `role_id` int(11) NOT NULL,
`user_id` int(11) NOT NULL,
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(200) NOT NULL,
  `contact_no` varchar(10) NOT NULL,
  `address` varchar(100) NOT NULL,
  `image` varchar(300) NOT NULL,
  `is_verified` int(5) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`role_id`, `user_id`, `fname`, `lname`, `email`, `password`, `contact_no`, `address`, `image`, `is_verified`) VALUES
(2, 8, 'pk', 'aggarwal', 'raj@gmail.com', '', '9992317661', 'rewari', 'http://localhost/bada/img//Screenshot_(62).png', 2),
(2, 9, 'sagar', 'kumar', 'sagar@gmail.com', 'b706835de79a2b4e80506f582af3676a', '9992317661', 'delhi', 'http://localhost/bada/img//Screenshot_(62).png', 2),
(2, 10, 'praveen', 'kumar', '0', '2db026761969962c71e164bb9b0eac0a', '9991005443', 'mahesh kumar  ', 'http://localhost/bada/img//men_shirt1.jpg', 1),
(2, 11, 'a', 'l', 'ah@gmail', 'c20ad4d76fe97759aa27a0c99bff6710', '9992317661', 'asdfgh', 'http://localhost/bada/img//men_shirt2.jpg', 2),
(1, 12, 'praveen', 'kumar', 'sam@y', '202cb962ac59075b964b07152d234b70', '67890', 'fgn', 'http://localhost/bada/img//men_shirt2.jpg', 1),
(2, 13, 'appu', 'ghar', 'appu@gmail.com', 'a01610228fe998f515a72dd730294d87', '9992317661', 'new delhi', 'http://localhost/bada/img//men_shirt2.jpg', 1),
(2, 14, 'praveen', 'kumar', 'viks@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '9992317661', 'new delhi', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank_details`
--
ALTER TABLE `bank_details`
 ADD PRIMARY KEY (`bank_id`);

--
-- Indexes for table `bank_table`
--
ALTER TABLE `bank_table`
 ADD PRIMARY KEY (`bank_id`);

--
-- Indexes for table `brand_table`
--
ALTER TABLE `brand_table`
 ADD PRIMARY KEY (`brand_id`), ADD KEY `producttype_id` (`producttype_id`);

--
-- Indexes for table `category_table`
--
ALTER TABLE `category_table`
 ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
 ADD PRIMARY KEY (`session_id`), ADD KEY `last_activity_idx` (`last_activity`);

--
-- Indexes for table `contact_table`
--
ALTER TABLE `contact_table`
 ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `district_table`
--
ALTER TABLE `district_table`
 ADD PRIMARY KEY (`district_id`), ADD UNIQUE KEY `state_id` (`state_id`);

--
-- Indexes for table `notification_table`
--
ALTER TABLE `notification_table`
 ADD PRIMARY KEY (`notification_id`);

--
-- Indexes for table `payment_table`
--
ALTER TABLE `payment_table`
 ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `pincode_table`
--
ALTER TABLE `pincode_table`
 ADD PRIMARY KEY (`pincode_id`), ADD KEY `state_id` (`district_id`), ADD KEY `district_id` (`district_id`);

--
-- Indexes for table `producttype_table`
--
ALTER TABLE `producttype_table`
 ADD PRIMARY KEY (`producttype_id`), ADD KEY `subcategory_id` (`subcategory_id`);

--
-- Indexes for table `product_review_table`
--
ALTER TABLE `product_review_table`
 ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `product_table`
--
ALTER TABLE `product_table`
 ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `role_table`
--
ALTER TABLE `role_table`
 ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `shipping_table`
--
ALTER TABLE `shipping_table`
 ADD PRIMARY KEY (`shipping_id`);

--
-- Indexes for table `shopping_cart_table`
--
ALTER TABLE `shopping_cart_table`
 ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `size_table`
--
ALTER TABLE `size_table`
 ADD PRIMARY KEY (`size_id`);

--
-- Indexes for table `state_table`
--
ALTER TABLE `state_table`
 ADD PRIMARY KEY (`state_id`);

--
-- Indexes for table `subcategory_table`
--
ALTER TABLE `subcategory_table`
 ADD PRIMARY KEY (`subcategory_id`), ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `supplier_name`
--
ALTER TABLE `supplier_name`
 ADD PRIMARY KEY (`supplier_id`), ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
 ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bank_details`
--
ALTER TABLE `bank_details`
MODIFY `bank_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `bank_table`
--
ALTER TABLE `bank_table`
MODIFY `bank_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `brand_table`
--
ALTER TABLE `brand_table`
MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `category_table`
--
ALTER TABLE `category_table`
MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `contact_table`
--
ALTER TABLE `contact_table`
MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `district_table`
--
ALTER TABLE `district_table`
MODIFY `district_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `notification_table`
--
ALTER TABLE `notification_table`
MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=579;
--
-- AUTO_INCREMENT for table `payment_table`
--
ALTER TABLE `payment_table`
MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pincode_table`
--
ALTER TABLE `pincode_table`
MODIFY `pincode_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `producttype_table`
--
ALTER TABLE `producttype_table`
MODIFY `producttype_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `product_review_table`
--
ALTER TABLE `product_review_table`
MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `product_table`
--
ALTER TABLE `product_table`
MODIFY `product_id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=67;
--
-- AUTO_INCREMENT for table `role_table`
--
ALTER TABLE `role_table`
MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `shipping_table`
--
ALTER TABLE `shipping_table`
MODIFY `shipping_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `shopping_cart_table`
--
ALTER TABLE `shopping_cart_table`
MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `size_table`
--
ALTER TABLE `size_table`
MODIFY `size_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=112;
--
-- AUTO_INCREMENT for table `state_table`
--
ALTER TABLE `state_table`
MODIFY `state_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `subcategory_table`
--
ALTER TABLE `subcategory_table`
MODIFY `subcategory_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `supplier_name`
--
ALTER TABLE `supplier_name`
MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `district_table`
--
ALTER TABLE `district_table`
ADD CONSTRAINT `district_table_ibfk_1` FOREIGN KEY (`state_id`) REFERENCES `state_table` (`state_id`);

--
-- Constraints for table `pincode_table`
--
ALTER TABLE `pincode_table`
ADD CONSTRAINT `pincode_table_ibfk_2` FOREIGN KEY (`district_id`) REFERENCES `district_table` (`district_id`);

--
-- Constraints for table `producttype_table`
--
ALTER TABLE `producttype_table`
ADD CONSTRAINT `producttype_table_ibfk_1` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategory_table` (`subcategory_id`);

--
-- Constraints for table `subcategory_table`
--
ALTER TABLE `subcategory_table`
ADD CONSTRAINT `subcategory_table_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category_table` (`category_id`);

--
-- Constraints for table `supplier_name`
--
ALTER TABLE `supplier_name`
ADD CONSTRAINT `supplier_name_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_table` (`user_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
