-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 21, 2022 at 08:38 PM
-- Server version: 10.5.16-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u811705500_dokan`
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
(166, 7, 11, 5, 40, 1, '2022/10/22 || 01/24/57', 'complete', 0),
(167, 7, 12, 5, 75, 1, '2022/10/22 || 01/24/57', 'complete', 0);

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
(10, 'Chips'),
(11, 'drinks'),
(12, 'cleaner'),
(13, 'Snacks'),
(14, 'masala');

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
(12, 'moni para', 'saturday'),
(13, 'bogirpara', 'friday'),
(14, 'dalakhala', 'tuesday'),
(15, 'rabi gao', 'wednesday');

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
(5, 'monira khan', 123, '123', 'images (9).jpeg', 'pran'),
(6, 'Rasel khan', 456, '456', 'IMG-20220718-WA0001 (2).jpg', 'bomby');

-- --------------------------------------------------------

--
-- Table structure for table `d_m`
--

CREATE TABLE `d_m` (
  `id` int(11) NOT NULL,
  `number` int(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(35, 2, 115, 0, '<span>coca cola mini 50ml || price: 40 || Quantity: 1 || Total:40 </span><br><span>harpic big size  || price: 75 || Quantity: 1 || Total:75 </span><br>', '2022/10/22 || 01/27/21', 7, 'signature_012721.png', 'complete');

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
(10, 'Kurkure 120 ml ', 'Chips', '2022/10/22 || 01/18/16', 'bomby', 'sr_bomby_rakib mila', 25, 0, '234', '71cw9tyLmPL._SX425_.jpg'),
(11, 'coca cola mini 50ml', 'drinks', '2022/10/22 || 01/18/49', 'pran', 'sr_pran_arjun kamal', 40, 0, '213', '112-1122699_coca-cola-png-picture-soda-clipart-transparent-background.png'),
(12, 'harpic big size ', 'cleaner', '2022/10/22 || 01/19/25', 'pran', 'sr_pran_arjun kamal', 75, 0, '23', 'IMG_20190512_212238-removebg.png'),
(13, 'frezz up mini 140ml', 'drinks', '2022/10/22 || 01/20/07', 'bomby', 'sr_bomby_rakib mila', 25, 0, '23', 'resized_250ml.png');

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
(7, 'anime khan', 123, '123', '', 'EBWoFInXoAAIBPg.jpg', '5', '', 'dalakhala', 'piparia', 'bhai bhai'),
(8, 'chul wala', 456, '456', '', 'IMG20210306170213.jpg', '5', 'madaripur', 'moni para', 'chipagoli', 'moger store');

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
(5, 'arjun kamal', 123, 'images (6).jpeg', 5, 'pran', 'sr_pran_arjun kamal', '123'),
(6, 'rakib mila', 456, 'images (5).jpeg', 6, 'bomby', 'sr_bomby_rakib mila', '456');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=168;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `delivery`
--
ALTER TABLE `delivery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `deller`
--
ALTER TABLE `deller`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `d_m`
--
ALTER TABLE `d_m`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `retailer`
--
ALTER TABLE `retailer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sr`
--
ALTER TABLE `sr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
