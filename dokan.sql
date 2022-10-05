-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2022 at 08:31 PM
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
  `time` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `discount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `rid`, `pid`, `sr`, `price`, `quantity`, `time`, `status`, `discount`) VALUES
(1, 2, 3, 1, 54, 5, '2022/10/04 || 09/59/14', 'cart', 0),
(2, 1, 3, 1, 54, 7, '2022/10/04 || 10/02/41', 'complete', 23),
(3, 1, 3, 1, 54, 1, '2022/10/04 || 10/08/19', 'complete', 27),
(4, 1, 3, 1, 54, 3, '2022/10/04 || 10/08/26', 'complete', 27),
(5, 1, 3, 1, 54, 10, '2022/10/04 || 10/08/22', 'baki', 0),
(6, 1, 4, 2, 70, 5, '2022/10/04 || 10/15/06', 'cart', 0),
(7, 1, 2, 2, 56, 5, '2022/10/04 || 10/15/06', 'cart', 0);

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
(5, 'mandari', 'wednesday');

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
(3, 'লিবু ড্রিংক', 'drinks', '2022/10/04 || 09/58/13', 'bomby', 'sr_bomby_milon khan', 54, 344, 'w  erwe ewr wefd gfg hhhh', 'olive-garden-italian-dressing.jpg'),
(4, 'প্রান ঝাল আচার ', 'masala', '2022/10/04 || 10/14/01', 'pran', 'sr_pran_virat kohli', 70, 500, '234', 'images (2).jpeg');

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
(2, 'pagol mia', 456, '456', 'tata-premium-800g-jar.jpg', 'IMG20210306170213.jpg', '1', 'madaripur', 'badlapur', 'moni bazar', 'pagol store');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `delivery`
--
ALTER TABLE `delivery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `retailer`
--
ALTER TABLE `retailer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sr`
--
ALTER TABLE `sr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
