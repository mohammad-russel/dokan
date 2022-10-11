-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 11, 2022 at 01:20 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dokan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `num` int(255) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `num`, `pass`) VALUES
(1, 'rasel', 123, '123');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `rid` int(250) NOT NULL,
  `pid` int(255) NOT NULL,
  `sr` int(255) NOT NULL,
  `price` int(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  `time` varchar(2551) NOT NULL,
  `status` varchar(255) NOT NULL,
  `discount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `rid`, `pid`, `sr`, `price`, `quantity`, `time`, `status`, `discount`) VALUES
(1, 2, 3, 1, 54, 5, '2022/10/06 || 04/57/32', 'complete', 0),
(2, 1, 3, 1, 54, 7, '2022/10/04 || 10/02/41', 'complete', 23),
(3, 1, 3, 1, 54, 1, '2022/10/04 || 10/08/19', 'complete', 27),
(4, 1, 3, 1, 54, 3, '2022/10/04 || 10/08/26', 'complete', 27),
(6, 1, 4, 2, 70, 5, '2022/10/05 || 03/16/52', 'complete', 6),
(7, 1, 2, 2, 56, 5, '2022/10/05 || 03/16/52', 'complete', 6),
(10, 1, 4, 2, 70, 4, '2022/10/05 || 08/57/03', 'complete', 0),
(11, 1, 2, 2, 56, 13, '2022/10/05 || 09/10/55', 'complete', 50),
(13, 1, 3, 1, 54, 3, '2022/10/06 || 12/41/28', 'complete', 0),
(14, 1, 4, 2, 70, 4, '2022/10/06 || 03/23/51', 'complete', 50),
(15, 1, 2, 2, 56, 1, '2022/10/06 || 04/56/17', 'complete', 80),
(16, 1, 4, 2, 70, 1, '2022/10/06 || 05/01/00', 'complete', 80),
(17, 1, 3, 1, 54, 1, '2022/10/06 || 04/57/51', 'complete', 23),
(18, 1, 3, 1, 54, 1, '2022/10/06 || 04/57/51', 'complete', 23),
(19, 1, 3, 1, 54, 1, '2022/10/06 || 05/05/23', 'complete', 23),
(20, 2, 3, 1, 54, 1, '2022/10/06 || 05/06/28', 'complete', 7),
(21, 2, 3, 1, 54, 1, '2022/10/06 || 05/06/50', 'complete', 7),
(22, 2, 3, 1, 54, 1, '2022/10/06 || 05/07/44', 'complete', 7),
(23, 2, 3, 1, 54, 1, '2022/10/06 || 05/06/28', 'complete', 7),
(24, 2, 3, 1, 54, 1, '2022/10/06 || 05/06/28', 'complete', 7),
(25, 2, 3, 1, 54, 1, '2022/10/06 || 05/06/28', 'complete', 7),
(26, 2, 3, 1, 54, 1, '2022/10/06 || 05/06/28', 'complete', 7),
(27, 1, 3, 1, 54, 1, '2022/10/06 || 08/04/38', 'complete', 0),
(28, 1, 3, 1, 54, 1, '2022/10/06 || 08/04/38', 'complete', 0),
(29, 1, 3, 1, 54, 1, '2022/10/06 || 08/04/38', 'complete', 0),
(30, 1, 3, 1, 54, 1, '2022/10/06 || 08/04/38', 'complete', 0),
(31, 1, 3, 1, 54, 1, '2022/10/06 || 08/04/38', 'complete', 0),
(32, 1, 3, 1, 54, 1, '2022/10/06 || 08/04/38', 'complete', 0),
(33, 1, 3, 1, 54, 1, '2022/10/06 || 08/04/38', 'complete', 0),
(34, 1, 3, 1, 54, 1, '2022/10/06 || 08/04/38', 'complete', 0),
(35, 2, 3, 1, 54, 5, '2022/10/06 || 08/12/15', 'complete', 70),
(36, 2, 3, 1, 54, 5, '2022/10/06 || 08/12/15', 'complete', 70),
(37, 2, 3, 1, 54, 5, '2022/10/06 || 08/12/15', 'complete', 70),
(39, 1, 3, 1, 54, 6, '2022/10/06 || 08/17/07', 'complete', 0),
(40, 1, 3, 1, 54, 6, '2022/10/06 || 08/17/07', 'complete', 0),
(41, 1, 3, 1, 54, 6, '2022/10/06 || 08/17/07', 'complete', 0),
(42, 1, 3, 1, 54, 6, '2022/10/06 || 08/17/07', 'complete', 0),
(43, 1, 3, 1, 54, 6, '2022/10/06 || 08/17/07', 'complete', 0),
(44, 1, 3, 1, 54, 1, '2022/10/06 || 08/33/57', 'complete', 0),
(46, 1, 3, 1, 54, 1, '2022/10/06 || 08/33/57', 'complete', 0),
(47, 1, 3, 1, 54, 1, '2022/10/06 || 08/33/57', 'complete', 0),
(48, 1, 3, 1, 54, 5, '2022/10/06 || 10/08/58', 'complete', 0),
(49, 1, 3, 1, 54, 5, '2022/10/06 || 10/08/58', 'complete', 0),
(50, 1, 3, 1, 54, 5, '2022/10/06 || 10/08/58', 'complete', 0),
(51, 1, 3, 1, 54, 5, '2022/10/06 || 10/08/58', 'complete', 0),
(52, 2, 4, 2, 70, 5, '2022/10/06 || 10/19/58', 'complete', 50),
(53, 2, 2, 2, 56, 5, '2022/10/06 || 10/19/58', 'complete', 50),
(54, 1, 2, 2, 56, 1, '2022/10/06 || 11/18/39', 'complete', 40),
(55, 1, 4, 2, 70, 1, '2022/10/06 || 11/18/39', 'complete', 40),
(56, 1, 2, 2, 56, 5, '2022/10/07 || 08/53/47', 'complete', 0),
(57, 1, 3, 1, 54, 10, '2022/10/07 || 08/53/47', 'complete', 0),
(58, 1, 4, 2, 70, 5, '2022/10/07 || 08/53/47', 'complete', 0),
(60, 1, 2, 2, 56, 1, '2022/10/07 || 10/35/34', 'complete', 0),
(65, 1, 2, 2, 56, 1, '2022/10/07 || 07/55/55', 'complete', 82),
(66, 1, 4, 2, 70, 14, '2022/10/07 || 07/55/55', 'complete', 82),
(67, 1, 5, 2, 46, 1, '2022/10/07 || 07/55/55', 'complete', 82),
(68, 1, 2, 2, 56, 1, '2022/10/07 || 08/03/32', 'complete', 90),
(70, 1, 5, 2, 46, 1, '2022/10/07 || 08/03/32', 'complete', 90),
(71, 1, 2, 2, 56, 1, '2022/10/07 || 08/06/23', 'complete', 0),
(72, 1, 4, 2, 70, 1, '2022/10/07 || 08/06/23', 'complete', 0),
(73, 1, 5, 2, 46, 1, '2022/10/07 || 08/06/23', 'complete', 0),
(74, 1, 3, 1, 54, 12, '2022/10/07 || 08/24/55', 'baki', 0),
(95, 1, 3, 1, 54, 4, '2022/10/08 || 08/17/22', 'cart', 0),
(96, 1, 2, 2, 56, 1, '2022/10/08 || 08/17/22', 'cart', 0),
(97, 1, 3, 1, 54, 1, '2022/10/08 || 08/17/43', 'cart', 0),
(98, 1, 2, 2, 56, 1, '2022/10/08 || 08/17/43', 'cart', 0),
(99, 4, 3, 1, 54, 123, '2022/10/08 || 10/56/01', 'order', 222),
(100, 2, 3, 1, 54, 1, '2022/10/08 || 10/56/19', 'order', 0),
(101, 3, 3, 1, 54, 1, '2022/10/08 || 10/56/23', 'order', 0),
(102, 1, 2, 2, 56, 1, '2022/10/10 || 07/35/55', 'cart', 0),
(103, 1, 3, 1, 54, 1, '2022/10/10 || 07/35/55', 'cart', 0),
(104, 1, 4, 2, 70, 1, '2022/10/10 || 07/35/55', 'cart', 0);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `cat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `cat`) VALUES
(1, 'drinks'),
(2, 'chips'),
(3, 'Snacks'),
(4, 'masala'),
(5, 'cleaner');

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `id` int(11) NOT NULL,
  `village` varchar(255) NOT NULL,
  `day` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`id`, `village`, `day`) VALUES
(1, 'badlapur', 'friday'),
(2, 'vola', 'friday'),
(3, 'rampura', 'saturday'),
(4, 'mongla', 'sunday'),
(5, 'mandari', 'wednesday'),
(6, 'mirgonje', 'thursday'),
(7, 'kaligonje', 'monday');

-- --------------------------------------------------------

--
-- Table structure for table `deller`
--

CREATE TABLE `deller` (
  `id` int(11) NOT NULL,
  `nam` varchar(255) NOT NULL,
  `num` int(11) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `deller_pic` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `deller`
--

INSERT INTO `deller` (`id`, `nam`, `num`, `pass`, `deller_pic`, `company`) VALUES
(1, 'morjina', 123, '123', 'images (9).jpeg', 'pran'),
(2, 'ranveer', 456, '456', 'images (7).jpeg', 'bomby');

-- --------------------------------------------------------

--
-- Table structure for table `d_m`
--

CREATE TABLE `d_m` (
  `id` int(11) NOT NULL,
  `number` int(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `d_m`
--

INSERT INTO `d_m` (`id`, `number`, `password`) VALUES
(1, 123, '123');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `item` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `products` varchar(2000) NOT NULL,
  `time` varchar(2550) NOT NULL,
  `retailer` int(11) NOT NULL,
  `signature` varchar(2551) NOT NULL,
  `status` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `item`, `total`, `discount`, `products`, `time`, `retailer`, `signature`, `status`) VALUES
(1, 5, 263, 7, '(<span>লিবু ড্রিংক||price: 54 || Quantity: 1 ||Total:54</span><br>)(<span>লিবু ড্রিংক||price: 54 || Quantity: 1 ||Total:54</span><br>)(<span>লিবু ড্রিংক||price: 54 || Quantity: 1 ||Total:54</span><br>)(<span>লিবু ড্রিংক||price: 54 || Quantity: 1 ||Total:54</span><br>)(<span>লিবু ড্রিংক||price: 54 || Quantity: 1 ||Total:54</span><br>)', '2022/10/06 || 07/47/38', 2, 'signature_074738.png', 'complete'),
(2, 5, 263, 7, '(<span>লিবু ড্রিংক||price: 54 || Quantity: 1 ||Total:54</span><br>)(<span>লিবু ড্রিংক||price: 54 || Quantity: 1 ||Total:54</span><br>)(<span>লিবু ড্রিংক||price: 54 || Quantity: 1 ||Total:54</span><br>)(<span>লিবু ড্রিংক||price: 54 || Quantity: 1 ||Total:54</span><br>)(<span>লিবু ড্রিংক||price: 54 || Quantity: 1 ||Total:54</span><br>)', '2022/10/06 || 07/58/18', 2, 'signature_075818.png', 'complete'),
(3, 5, 263, 7, '(<span>লিবু ড্রিংক||price: 54 || Quantity: 1 ||Total:54</span><br>)(<span>লিবু ড্রিংক||price: 54 || Quantity: 1 ||Total:54</span><br>)(<span>লিবু ড্রিংক||price: 54 || Quantity: 1 ||Total:54</span><br>)(<span>লিবু ড্রিংক||price: 54 || Quantity: 1 ||Total:54</span><br>)(<span>লিবু ড্রিংক||price: 54 || Quantity: 1 ||Total:54</span><br>)', '2022/10/06 || 07/58/18', 2, 'signature_075818.png', 'complete'),
(4, 5, 263, 7, '(<span>লিবু ড্রিংক||price: 54 || Quantity: 1 ||Total:54</span><br>)(<span>লিবু ড্রিংক||price: 54 || Quantity: 1 ||Total:54</span><br>)(<span>লিবু ড্রিংক||price: 54 || Quantity: 1 ||Total:54</span><br>)(<span>লিবু ড্রিংক||price: 54 || Quantity: 1 ||Total:54</span><br>)(<span>লিবু ড্রিংক||price: 54 || Quantity: 1 ||Total:54</span><br>)', '2022/10/06 || 07/58/18', 2, 'signature_075818.png', 'complete'),
(5, 5, 263, 7, '(<span>লিবু ড্রিংক||price: 54 || Quantity: 1 ||Total:54</span><br>)(<span>লিবু ড্রিংক||price: 54 || Quantity: 1 ||Total:54</span><br>)(<span>লিবু ড্রিংক||price: 54 || Quantity: 1 ||Total:54</span><br>)(<span>লিবু ড্রিংক||price: 54 || Quantity: 1 ||Total:54</span><br>)(<span>লিবু ড্রিংক||price: 54 || Quantity: 1 ||Total:54</span><br>)', '2022/10/06 || 08/01/10', 2, 'signature_080110.png', 'complete'),
(6, 5, 263, 7, '(<span>লিবু ড্রিংক||price: 54 || Quantity: 1 ||Total:54</span><br>)(<span>লিবু ড্রিংক||price: 54 || Quantity: 1 ||Total:54</span><br>)(<span>লিবু ড্রিংক||price: 54 || Quantity: 1 ||Total:54</span><br>)(<span>লিবু ড্রিংক||price: 54 || Quantity: 1 ||Total:54</span><br>)(<span>লিবু ড্রিংক||price: 54 || Quantity: 1 ||Total:54</span><br>)', '2022/10/06 || 08/01/37', 2, 'signature_080137.png', 'complete'),
(7, 8, 432, 0, '(<span>লিবু ড্রিংক||price: 54 || Quantity: 1 ||Total:54</span><br>)(<span>লিবু ড্রিংক||price: 54 || Quantity: 1 ||Total:54</span><br>)(<span>লিবু ড্রিংক||price: 54 || Quantity: 1 ||Total:54</span><br>)(<span>লিবু ড্রিংক||price: 54 || Quantity: 1 ||Total:54</span><br>)(<span>লিবু ড্রিংক||price: 54 || Quantity: 1 ||Total:54</span><br>)(<span>লিবু ড্রিংক||price: 54 || Quantity: 1 ||Total:54</span><br>)(<span>লিবু ড্রিংক||price: 54 || Quantity: 1 ||Total:54</span><br>)(<span>লিবু ড্রিংক||price: 54 || Quantity: 1 ||Total:54</span><br>)', '2022/10/06 || 08/11/34', 1, 'signature_081134.png', 'complete'),
(8, 3, 740, 70, '(<span>লিবু ড্রিংক||price: 54 || Quantity: 5 ||Total:270</span><br>)(<span>লিবু ড্রিংক||price: 54 || Quantity: 5 ||Total:270</span><br>)(<span>লিবু ড্রিংক||price: 54 || Quantity: 5 ||Total:270</span><br>)', '2022/10/06 || 08/13/06', 2, 'signature_081306.png', 'complete'),
(9, 5, 1620, 0, '(<span>লিবু ড্রিংক||price: 54 || Quantity: 6 ||Total:324</span><br>)(<span>লিবু ড্রিংক||price: 54 || Quantity: 6 ||Total:324</span><br>)(<span>লিবু ড্রিংক||price: 54 || Quantity: 6 ||Total:324</span><br>)(<span>লিবু ড্রিংক||price: 54 || Quantity: 6 ||Total:324</span><br>)(<span>লিবু ড্রিংক||price: 54 || Quantity: 6 ||Total:324</span><br>)', '2022/10/06 || 08/33/43', 1, 'signature_083343.png', 'complete'),
(10, 4, 216, 0, '(<span>লিবু ড্রিংক||price: 54 || Quantity: 1 ||Total:54</span><br>)(<span>লিবু ড্রিংক||price: 54 || Quantity: 1 ||Total:54</span><br>)(<span>লিবু ড্রিংক||price: 54 || Quantity: 1 ||Total:54</span><br>)(<span>লিবু ড্রিংক||price: 54 || Quantity: 1 ||Total:54</span><br>)', '2022/10/06 || 08/45/40', 1, 'signature_084540.png', 'complete'),
(11, 3, 162, 0, '(<span>লিবু ড্রিংক||price: 54 || Quantity: 1 ||Total:54</span><br>)(<span>লিবু ড্রিংক||price: 54 || Quantity: 1 ||Total:54</span><br>)(<span>লিবু ড্রিংক||price: 54 || Quantity: 1 ||Total:54</span><br>)', '2022/10/06 || 10/05/27', 1, 'signature_100527.png', 'baki'),
(12, 4, 1080, 0, '(<span>লিবু ড্রিংক||price: 54 || Quantity: 5 ||Total:270</span><br>)(<span>লিবু ড্রিংক||price: 54 || Quantity: 5 ||Total:270</span><br>)(<span>লিবু ড্রিংক||price: 54 || Quantity: 5 ||Total:270</span><br>)(<span>লিবু ড্রিংক||price: 54 || Quantity: 5 ||Total:270</span><br>)', '2022/10/06 || 10/17/09', 1, 'signature_101709.png', 'baki'),
(13, 2, 580, 50, '(<span>প্রান ঝাল আচার ||price: 70 || Quantity: 5 ||Total:350</span><br>)(<span>বাংলা চিপস ||price: 56 || Quantity: 5 ||Total:280</span><br>)', '2022/10/06 || 10/28/42', 2, 'signature_102842.png', 'baki'),
(14, 2, 86, 40, '(<span>বাংলা চিপস ||price: 56 || Quantity: 1 ||Total:56</span><br>)(<span>প্রান ঝাল আচার ||price: 70 || Quantity: 1 ||Total:70</span><br>)', '2022/10/06 || 11/19/41', 1, 'signature_111941.png', 'baki'),
(15, 4, 1226, 0, '(<span>বাংলা চিপস ||price: 56 || Quantity: 5 ||Total:280</span><br>)(<span>লিবু ড্রিংক||price: 54 || Quantity: 10 ||Total:540</span><br>)(<span>প্রান ঝাল আচার ||price: 70 || Quantity: 5 ||Total:350</span><br>)(<span>বাংলা চিপস ||price: 56 || Quantity: 1 ||Total:56</span><br>)', '2022/10/07 || 04/34/30', 1, 'signature_043430.png', 'baki'),
(16, 3, 1000, 82, '(<span>বাংলা চিপস ||price: 56 || Quantity: 1 ||Total:56</span><br>)(<span>প্রান ঝাল আচার ||price: 70 || Quantity: 14 ||Total:980</span><br>)(<span>ikigai bangla||price: 46 || Quantity: 1 ||Total:46</span><br>)', '2022/10/07 || 08/02/18', 1, 'signature_080218.png', 'complete'),
(17, 2, 12, 90, '(<span>বাংলা চিপস ||price: 56 || Quantity: 1 ||Total:56</span><br>)(<span>ikigai bangla||price: 46 || Quantity: 1 ||Total:46</span><br>)', '2022/10/07 || 08/05/18', 1, 'signature_080518.png', 'baki'),
(18, 3, 172, 0, '(<span>বাংলা চিপস ||price: 56 || Quantity: 1 ||Total:56</span><br>)(<span>প্রান ঝাল আচার ||price: 70 || Quantity: 1 ||Total:70</span><br>)(<span>ikigai bangla||price: 46 || Quantity: 1 ||Total:46</span><br>)', '2022/10/07 || 08/06/39', 1, 'signature_080639.png', 'baki'),
(19, 1, 648, 0, '(<span>লিবু ড্রিংক||price: 54 || Quantity: 12 ||Total:648</span><br>)', '2022/10/08 || 09/27/56', 1, 'signature_092756.png', 'baki');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `nam` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `sr` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `discription` varchar(255) NOT NULL,
  `pic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `nam`, `category`, `time`, `company`, `sr`, `price`, `stock`, `discription`, `pic`) VALUES
(2, 'বাংলা চিপস ', 'chips', '2022/10/04 || 09/55/37', 'pran', 'sr_pran_virat kohli', 56, 500, '123', 'ecf98c05d96afd2b12e27ff33f74f43a.jpg'),
(3, 'লিবু ড্রিংক kala', 'chips', '2022/10/04 || 09/58/13', 'bomby', 'sr_bomby_milon khan', 54, 344, 'w  erwe ewr wefd gfg hhhh', 'olive-garden-italian-dressing.jpg'),
(4, 'প্রান ঝাল আচার ', 'masala', '2022/10/04 || 10/14/01', 'pran', 'sr_pran_virat kohli', 70, 500, '234', 'images (2).jpeg'),
(5, 'ikigai bangla', 'masala', '2022/10/07 || 07/48/27', 'pran', 'sr_pran_virat kohli', 46, 677, '213', 'IKIGAI1_1024x1024.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `retailer`
--

CREATE TABLE `retailer` (
  `id` int(11) NOT NULL,
  `nam` varchar(255) NOT NULL,
  `num` int(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `shoppic` varchar(255) NOT NULL,
  `retailerpic` varchar(255) NOT NULL,
  `openersr` varchar(255) NOT NULL,
  `zila` varchar(255) NOT NULL,
  `village` varchar(255) NOT NULL,
  `area` varchar(255) NOT NULL,
  `shopname` varchar(242) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `retailer`
--

INSERT INTO `retailer` (`id`, `nam`, `num`, `pass`, `shoppic`, `retailerpic`, `openersr`, `zila`, `village`, `area`, `shopname`) VALUES
(1, 'anime khan', 123, '123', 'panera-broccoli-cheddar-soup.jpg', 'EBWoFInXoAAIBPg.jpg', '1', 'ronipur', 'rampura', 'school para', 'bhai bhai'),
(2, 'pagol mia', 456, '456', 'tata-premium-800g-jar.jpg', 'IMG20210306170213.jpg', '1', 'madaripur', 'badlapur', 'moni bazar', 'pagol store'),
(3, 'mamir khalr rabbi hosen', 342342323, '23423423', '', 'images (9).jpeg', '2', 'madaripur', 'mongla', 'piparia', 'muraad alikhan store bhai'),
(4, 'ranveer kapur', 1234, '1234', 'Untitled (5).jpg', 'vegeta-2020_3840x2160_xtrafondos.com.jpg', '1', 'madaripur', 'rampura', '12312', 'qew2');

-- --------------------------------------------------------

--
-- Table structure for table `sr`
--

CREATE TABLE `sr` (
  `id` int(11) NOT NULL,
  `nam` varchar(255) NOT NULL,
  `num` int(11) NOT NULL,
  `srpic` varchar(255) NOT NULL,
  `deller` int(11) NOT NULL,
  `company` varchar(255) NOT NULL,
  `srnum` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sr`
--

INSERT INTO `sr` (`id`, `nam`, `num`, `srpic`, `deller`, `company`, `srnum`, `pass`) VALUES
(1, 'milon khan', 123, 'images (5).jpeg', 2, 'bomby', 'sr_bomby_milon khan', '123'),
(2, 'virat kohli', 456, 'images (8).jpeg', 1, 'pran', 'sr_pran_virat kohli', '456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deller`
--
ALTER TABLE `deller`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `d_m`
--
ALTER TABLE `d_m`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `retailer`
--
ALTER TABLE `retailer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sr`
--
ALTER TABLE `sr`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `delivery`
--
ALTER TABLE `delivery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `deller`
--
ALTER TABLE `deller`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `d_m`
--
ALTER TABLE `d_m`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `retailer`
--
ALTER TABLE `retailer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sr`
--
ALTER TABLE `sr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
