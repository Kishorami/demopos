-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 11, 2020 at 08:19 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demopos`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `Category` text NOT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `Category`, `Date`) VALUES
(1, 'ELECTROMECHANICAL EQUIPMENT', '2020-08-11 07:08:27'),
(2, 'DRILLS', '2020-08-11 07:08:44'),
(3, 'SCAFFOLDING', '2020-08-11 07:09:00'),
(4, 'POWER GENERATORS', '2020-08-11 07:09:16'),
(5, 'CONSTRUCTION EQUIPMENT', '2020-08-11 07:09:42'),
(8, 'Demo', '2020-08-14 07:46:05');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `idDocument` int(11) NOT NULL,
  `email` text NOT NULL,
  `phone` text NOT NULL,
  `address` text NOT NULL,
  `birthdate` date NOT NULL,
  `purchases` int(11) NOT NULL,
  `lustpurchase` datetime NOT NULL DEFAULT current_timestamp(),
  `registerDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `idDocument`, `email`, `phone`, `address`, `birthdate`, `purchases`, `lustpurchase`, `registerDate`) VALUES
(1, 'kishorami', 1, 'kishorami@gmail.com', '(0088) 01737-897397', 'Chelopara, Bogura', '1992-09-29', 18, '2020-08-22 16:10:38', '2020-09-26 12:01:58'),
(2, 'polu', 2, 'polu@gmail.com', '(0088) 01737-737737', 'Chelopara, Bogura', '1992-09-29', 47, '2020-08-22 16:10:38', '2020-09-02 10:45:42'),
(3, 'Yasir', 420, 'badhon@gmail.com', '(0088) 01747-772211', 'Bogura', '1992-01-07', 7, '2020-08-22 16:10:38', '2020-09-18 16:02:50'),
(5, 'Panchi', 505, 'panchi@gmail.com', '(0088) 01711-070707', 'Bogura', '1993-08-18', 4, '2020-08-22 16:10:38', '2020-08-24 14:29:32'),
(6, 'Biku', 37, 'Biku@gmail.com', '(0091) 94339-729520', 'Kalkata, India', '1984-04-17', 2, '2020-08-02 16:10:38', '2020-09-01 10:02:03'),
(7, 'shajib', 324, 'golperhari@gmail.com', '(018) 840-8230', 'Bogura', '1994-02-22', 1, '2020-08-30 00:25:18', '2020-08-29 18:26:28');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `idCategory` int(11) NOT NULL,
  `code` text NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL,
  `stock` int(11) NOT NULL,
  `buyingPrice` float NOT NULL,
  `sellingPrice` float NOT NULL,
  `sales` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `idCategory`, `code`, `description`, `image`, `stock`, `buyingPrice`, `sellingPrice`, `sales`, `date`) VALUES
(1, 1, '101', 'Industrial vacuum cleaner', 'views/img/products/101/622.png', 18, 1500, 2100, 2, '2020-08-23 07:45:15'),
(2, 1, '102', 'Float Plate for Palletizer', 'views/img/products/102/495.jpg', 19, 4500, 6300, 1, '2020-08-23 07:45:15'),
(3, 1, '103', 'Air Compressor for painting', 'views/img/products/103/712.jpg', 17, 3000, 4200, 3, '2020-08-24 17:32:56'),
(4, 1, '104', 'Adobe Cutter without Disk', 'views/img/products/104/188.jpg', 20, 4000, 5600, 0, '0000-00-00 00:00:00'),
(5, 1, '105', 'Floor Cutter without Disk', 'views/img/products/105/970.jpg', 23, 1540, 2156, -1, '2020-09-01 10:02:03'),
(6, 1, '106', 'Diamond Tip Disk', 'views/img/products/106/129.jpg', 19, 1100, 1540, 1, '2020-09-01 10:02:03'),
(7, 1, '107', 'Air extractor', 'views/img/products/107/871.jpg', 19, 1540, 2156, 1, '2020-08-22 09:52:02'),
(8, 1, '108', 'Mower', 'views/img/products/108/484.jpg', 19, 1540, 2156, 1, '2020-08-24 14:29:32'),
(9, 1, '109', 'Electric Water Washer', 'views/img/products/109/332.jpg', 19, 2600, 3640, 1, '2020-08-22 09:52:02'),
(10, 1, '110', 'Petrol pressure washer', 'views/img/products/110/424.jpg', 19, 2210, 3094, 1, '2020-08-24 10:35:09'),
(11, 1, '111', 'Gasoline motor pump', 'views/img/products/default/anonymous.png', 20, 2860, 4004, 0, '0000-00-00 00:00:00'),
(12, 1, '112', 'Electric motor pump', 'views/img/products/default/anonymous.png', 20, 2400, 3360, 0, '0000-00-00 00:00:00'),
(13, 1, '113', 'Circular saw', 'views/img/products/default/anonymous.png', 20, 1100, 1540, 0, '0000-00-00 00:00:00'),
(14, 1, '114', 'Tungsten disc for circular saw', 'views/img/products/default/anonymous.png', 20, 4500, 6300, 0, '0000-00-00 00:00:00'),
(15, 1, '115', 'Electric welder', 'views/img/products/default/anonymous.png', 20, 1980, 2772, 0, '0000-00-00 00:00:00'),
(16, 1, '116', 'Welders face', 'views/img/products/default/anonymous.png', 20, 4200, 5880, 0, '0000-00-00 00:00:00'),
(17, 1, '117', 'Illumination tower', 'views/img/products/default/anonymous.png', 20, 1800, 2520, 0, '0000-00-00 00:00:00'),
(18, 2, '201', 'Floor Demolishing Hammer 110V', 'views/img/products/default/anonymous.png', 20, 5600, 7840, 0, '0000-00-00 00:00:00'),
(19, 2, '202', 'Muela or chisel hammer demolishing floor', 'views/img/products/default/anonymous.png', 20, 9600, 13440, 0, '0000-00-00 00:00:00'),
(20, 2, '203', 'Wall Wrecking Drill 110V', 'views/img/products/default/anonymous.png', 20, 3850, 5390, 0, '0000-00-00 00:00:00'),
(21, 2, '204', 'Muela or chisel hammer demolition wall', 'views/img/products/default/anonymous.png', 20, 9600, 13440, 0, '0000-00-00 00:00:00'),
(22, 2, '205', '1/2 Hammer Drill Wood and Metal', 'views/img/products/default/anonymous.png', 20, 8000, 11200, 0, '0000-00-00 00:00:00'),
(23, 2, '206', 'Drill Percussion SDS Plus 110V', 'views/img/products/default/anonymous.png', 20, 3900, 5460, 0, '0000-00-00 00:00:00'),
(24, 2, '207', 'Drill Percussion SDS Max 110V (Mining)', 'views/img/products/default/anonymous.png', 20, 4600, 6440, 0, '0000-00-00 00:00:00'),
(25, 3, '301', 'Hanging scaffolding', 'views/img/products/default/anonymous.png', 20, 1440, 2016, 0, '0000-00-00 00:00:00'),
(26, 3, '302', 'Scaffolding hanging spacer', 'views/img/products/default/anonymous.png', 20, 1600, 2240, 0, '0000-00-00 00:00:00'),
(27, 3, '303', 'Modular scaffolding frame', 'views/img/products/default/anonymous.png', 20, 900, 1260, 0, '0000-00-00 00:00:00'),
(28, 3, '304', 'Frame scaffolding scissors', 'views/img/products/default/anonymous.png', 20, 100, 140, 0, '0000-00-00 00:00:00'),
(29, 3, '305', 'Scaffolding scissors', 'views/img/products/default/anonymous.png', 20, 162, 226, 0, '0000-00-00 00:00:00'),
(30, 3, '306', 'Internal ladder for scaffolding', 'views/img/products/default/anonymous.png', 20, 270, 378, 0, '0000-00-00 00:00:00'),
(31, 3, '307', 'Security handrails', 'views/img/products/default/anonymous.png', 20, 75, 105, 0, '0000-00-00 00:00:00'),
(32, 3, '308', 'Rotating wheel for scaffolding', 'views/img/products/default/anonymous.png', 20, 168, 235, 0, '0000-00-00 00:00:00'),
(33, 3, '309', 'safety harness', 'views/img/products/default/anonymous.png', 20, 1750, 2450, 0, '0000-00-00 00:00:00'),
(34, 3, '310', 'Sling for harness', 'views/img/products/default/anonymous.png', 20, 175, 245, 0, '0000-00-00 00:00:00'),
(35, 3, '311', 'Metallic Platform', 'views/img/products/default/anonymous.png', 20, 420, 588, 0, '0000-00-00 00:00:00'),
(36, 4, '401', '6 Kva Diesel Power Plant', 'views/img/products/default/anonymous.png', 20, 3500, 4900, 0, '0000-00-00 00:00:00'),
(37, 4, '402', '10 Kva Diesel Power Plant', 'views/img/products/default/anonymous.png', 20, 3550, 4970, 0, '0000-00-00 00:00:00'),
(38, 4, '403', '20 Kva Diesel Power Plant', 'views/img/products/default/anonymous.png', 20, 3600, 5040, 0, '0000-00-00 00:00:00'),
(39, 4, '404', '30 Kva Diesel Power Plant', 'views/img/products/default/anonymous.png', 20, 3650, 5110, 0, '0000-00-00 00:00:00'),
(40, 4, '405', '60 Kva Diesel Power Plant', 'views/img/products/default/anonymous.png', 20, 3700, 5180, 0, '0000-00-00 00:00:00'),
(41, 4, '406', '75 Kva Diesel Power Plant', 'views/img/products/default/anonymous.png', 20, 3750, 5250, 0, '0000-00-00 00:00:00'),
(42, 4, '407', '100 Kva Diesel Power Plant', 'views/img/products/default/anonymous.png', 20, 3800, 5320, 0, '0000-00-00 00:00:00'),
(43, 4, '408', '120 Kva Diesel Power Plant', 'views/img/products/default/anonymous.png', 20, 3850, 5390, 0, '0000-00-00 00:00:00'),
(44, 5, '501', 'Aluminum Scissor Ladder', 'views/img/products/default/anonymous.png', 20, 350, 490, 0, '0000-00-00 00:00:00'),
(45, 5, '502', 'Electric extension', 'views/img/products/default/anonymous.png', 20, 370, 518, 0, '0000-00-00 00:00:00'),
(46, 5, '503', 'Tensioner cat', 'views/img/products/default/anonymous.png', 20, 380, 532, 0, '0000-00-00 00:00:00'),
(47, 5, '504', 'Lamina Covers Gap', 'views/img/products/default/anonymous.png', 20, 380, 532, 0, '0000-00-00 00:00:00'),
(48, 5, '505', 'Pipe wrench', 'views/img/products/default/anonymous.png', 20, 480, 672, 0, '0000-00-00 00:00:00'),
(49, 5, '506', 'Manila by Metro', 'views/img/products/default/anonymous.png', 20, 600, 840, 0, '0000-00-00 00:00:00'),
(50, 5, '507', '2-channel pulley', 'views/img/products/default/anonymous.png', 20, 900, 1260, 0, '0000-00-00 00:00:00'),
(51, 5, '508', 'Tensor', 'views/img/products/default/anonymous.png', 20, 100, 140, 0, '0000-00-00 00:00:00'),
(52, 5, '509', 'Weighing machine', 'views/img/products/default/anonymous.png', 20, 130, 182, 0, '0000-00-00 00:00:00'),
(53, 5, '510', 'Hydrostatic pump', 'views/img/products/default/anonymous.png', 20, 770, 1078, 0, '0000-00-00 00:00:00'),
(54, 5, '511', 'Chapeta', 'views/img/products/default/anonymous.png', 20, 660, 924, 0, '0000-00-00 00:00:00'),
(55, 5, '512', 'Concrete sample cylinder', 'views/img/products/default/anonymous.png', 20, 400, 560, 0, '0000-00-00 00:00:00'),
(56, 5, '513', 'Lever Shear', 'views/img/products/default/anonymous.png', 19, 450, 630, 1, '2020-08-29 18:18:44'),
(57, 5, '514', 'Scissor Shear', 'views/img/products/default/anonymous.png', 20, 580, 812, 0, '0000-00-00 00:00:00'),
(58, 5, '515', 'Pneumatic tire car', 'views/img/products/default/anonymous.png', 19, 420, 588, 1, '2020-08-31 20:05:28'),
(59, 5, '516', 'Cone slump', 'views/img/products/default/anonymous.png', 19, 140, 196, 1, '2020-08-31 20:05:28'),
(60, 5, '517', 'Baldosin cutter', 'views/img/products/default/anonymous.png', 17, 930, 1302, 3, '2020-09-18 16:02:50'),
(62, 8, '801', 'this is a demo product', 'views/img/products/801/693.jpg', 1, 100, 125, 11, '2020-09-18 16:02:50'),
(63, 8, '802', 'demo sakib', 'views/img/products/802/556.jpg', 78, 1.99, 2.32, 48, '2020-09-26 12:01:58');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `code` int(11) NOT NULL,
  `idCustomer` int(11) NOT NULL,
  `idSeller` int(11) NOT NULL,
  `products` text NOT NULL,
  `tax` float NOT NULL,
  `netPrice` float NOT NULL,
  `totalPrice` float NOT NULL,
  `paymentMethod` text NOT NULL,
  `saledate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `code`, `idCustomer`, `idSeller`, `products`, `tax`, `netPrice`, `totalPrice`, `paymentMethod`, `saledate`) VALUES
(2, 10002, 6, 6, '[{\"id\":\"9\",\"description\":\"Electric Water Washer\",\"quantity\":\"1\",\"stock\":\"19\",\"price\":\"3640\",\"totalPrice\":\"3640\"},{\"id\":\"7\",\"description\":\"Air extractor\",\"quantity\":\"1\",\"stock\":\"19\",\"price\":\"2156\",\"totalPrice\":\"2156\"}]', 57.96, 5796, 5853.96, 'cash', '2016-08-22 09:52:02'),
(3, 10003, 1, 6, '[{\"id\":\"1\",\"description\":\"Industrial vacuum cleaner\",\"quantity\":\"1\",\"stock\":\"18\",\"price\":\"2100\",\"totalPrice\":\"2100\"}]', 21, 2100, 2121, 'cash', '2020-08-22 10:16:52'),
(4, 10004, 3, 1, '[{\"id\":\"1\",\"description\":\"Industrial vacuum cleaner\",\"quantity\":\"1\",\"stock\":\"18\",\"price\":\"2100\",\"totalPrice\":\"2100\"},{\"id\":\"2\",\"description\":\"Float Plate for Palletizer\",\"quantity\":\"1\",\"stock\":\"19\",\"price\":\"6300\",\"totalPrice\":\"6300\"},{\"id\":\"3\",\"description\":\"Air Compressor for painting\",\"quantity\":\"2\",\"stock\":\"18\",\"price\":\"4200\",\"totalPrice\":\"8400\"}]', 2520, 16800, 19320, 'cash', '2020-08-23 07:45:15'),
(5, 10005, 2, 1, '[{\"id\":\"10\",\"description\":\"Petrol pressure washer\",\"quantity\":\"1\",\"stock\":\"19\",\"price\":\"3094\",\"totalPrice\":\"3094\"}]', 464.1, 3094, 3558.1, 'cash', '2018-05-24 10:35:09'),
(6, 10006, 5, 1, '[{\"id\":\"8\",\"description\":\"Mower\",\"quantity\":\"1\",\"stock\":\"19\",\"price\":\"2156\",\"totalPrice\":\"2156\"},{\"id\":\"6\",\"description\":\"Diamond Tip Disk\",\"quantity\":\"1\",\"stock\":\"19\",\"price\":\"1540\",\"totalPrice\":\"1540\"},{\"id\":\"5\",\"description\":\"Floor Cutter without Disk\",\"quantity\":\"2\",\"stock\":\"18\",\"price\":\"2156\",\"totalPrice\":\"4312\"}]', 1201.2, 8008, 9209.2, 'cash', '2020-08-24 14:29:32'),
(7, 10007, 2, 1, '[{\"id\":\"5\",\"description\":\"Floor Cutter without Disk\",\"quantity\":\"1\",\"stock\":\"17\",\"price\":\"2156\",\"totalPrice\":\"2156\"},{\"id\":\"3\",\"description\":\"Air Compressor for painting\",\"quantity\":\"1\",\"stock\":\"17\",\"price\":\"4200\",\"totalPrice\":\"4200\"}]', 953.4, 6356, 7309.4, 'cash', '2020-08-24 17:32:57'),
(8, 10008, 1, 1, '[{\"id\":\"63\",\"description\":\"demo sakib\",\"quantity\":\"5\",\"stock\":\"96\",\"price\":\"2.32\",\"totalPrice\":\"11.6\"}]', 0.58, 11.6, 12.18, 'cash', '2020-08-29 14:51:34'),
(9, 10009, 1, 1, '[{\"id\":\"63\",\"description\":\"demo sakib\",\"quantity\":\"2\",\"stock\":\"94\",\"price\":\"2.32\",\"totalPrice\":\"4.64\"},{\"id\":\"60\",\"description\":\"Baldosin cutter\",\"quantity\":\"1\",\"stock\":\"19\",\"price\":\"1302\",\"totalPrice\":\"1302\"},{\"id\":\"56\",\"description\":\"Lever Shear\",\"quantity\":\"1\",\"stock\":\"19\",\"price\":\"630\",\"totalPrice\":\"630\"}]', 290.496, 1936.64, 2227.14, 'cash', '2020-08-29 18:18:44'),
(10, 10010, 7, 1, '[{\"id\":\"63\",\"description\":\"demo sakib\",\"quantity\":\"1\",\"stock\":\"93\",\"price\":\"2.32\",\"totalPrice\":\"2.32\"}]', 0.348, 2.32, 2.668, 'cash', '2020-08-29 18:26:28'),
(11, 10011, 1, 1, '[{\"id\":\"62\",\"description\":\"this is a demo product\",\"quantity\":\"2\",\"stock\":\"8\",\"price\":\"125\",\"totalPrice\":\"250\"}]', 37.5, 250, 287.5, 'cash', '2020-08-31 20:03:47'),
(12, 10012, 1, 1, '[{\"id\":\"63\",\"description\":\"demo sakib\",\"quantity\":\"1\",\"stock\":\"92\",\"price\":\"2.32\",\"totalPrice\":\"2.32\"},{\"id\":\"62\",\"description\":\"this is a demo product\",\"quantity\":\"1\",\"stock\":\"7\",\"price\":\"125\",\"totalPrice\":\"125\"},{\"id\":\"60\",\"description\":\"Baldosin cutter\",\"quantity\":\"1\",\"stock\":\"18\",\"price\":\"1302\",\"totalPrice\":\"1302\"},{\"id\":\"59\",\"description\":\"Cone slump\",\"quantity\":\"1\",\"stock\":\"19\",\"price\":\"196\",\"totalPrice\":\"196\"},{\"id\":\"58\",\"description\":\"Pneumatic tire car\",\"quantity\":\"1\",\"stock\":\"19\",\"price\":\"588\",\"totalPrice\":\"588\"}]', 0, 2213.32, 2213.32, 'cash', '2020-08-31 20:05:28'),
(14, 10013, 2, 1, '[{\"id\":\"63\",\"description\":\"demo sakib\",\"quantity\":\"1\",\"stock\":\"91\",\"price\":\"2.32\",\"totalPrice\":\"2.32\"},{\"id\":\"63\",\"description\":\"demo sakib\",\"quantity\":\"1\",\"stock\":\"91\",\"price\":\"2.32\",\"totalPrice\":\"2.32\"},{\"id\":\"62\",\"description\":\"this is a demo product\",\"quantity\":\"1\",\"stock\":\"6\",\"price\":\"125\",\"totalPrice\":\"125\"}]', 19.446, 129.64, 149.086, 'cash', '2020-09-01 13:32:34'),
(15, 10014, 2, 1, '[{\"id\":\"63\",\"description\":\"demo sakib\",\"quantity\":\"1\",\"stock\":\"90\",\"price\":\"2.32\",\"totalPrice\":\"2.32\"},{\"id\":\"63\",\"description\":\"demo sakib\",\"quantity\":\"1\",\"stock\":\"90\",\"price\":\"2.32\",\"totalPrice\":\"2.32\"}]', 0.464, 4.64, 5.104, 'cash', '2020-09-01 13:42:18'),
(16, 10015, 2, 1, '[{\"id\":\"63\",\"description\":\"demo sakib\",\"quantity\":\"1\",\"stock\":\"89\",\"price\":\"2.32\",\"totalPrice\":\"2.32\"},{\"id\":\"63\",\"description\":\"demo sakib\",\"quantity\":\"1\",\"stock\":\"89\",\"price\":\"2.32\",\"totalPrice\":\"2.32\"}]', 0.464, 4.64, 5.104, 'cash', '2020-09-01 13:43:35'),
(17, 10015, 2, 1, '[{\"id\":\"63\",\"description\":\"demo sakib\",\"quantity\":\"1\",\"stock\":\"88\",\"price\":\"2.32\",\"totalPrice\":\"2.32\"},{\"id\":\"63\",\"description\":\"demo sakib\",\"quantity\":\"1\",\"stock\":\"88\",\"price\":\"2.32\",\"totalPrice\":\"2.32\"}]', 0.464, 4.64, 5.104, 'cash', '2020-09-01 13:52:41'),
(18, 10016, 2, 1, '[{\"id\":\"63\",\"description\":\"demo sakib\",\"quantity\":\"1\",\"stock\":\"87\",\"price\":\"2.32\",\"totalPrice\":\"2.32\"},{\"id\":\"63\",\"description\":\"demo sakib\",\"quantity\":\"1\",\"stock\":\"87\",\"price\":\"2.32\",\"totalPrice\":\"2.32\"}]', 0.464, 4.64, 5.104, 'cash', '2020-09-01 13:59:24'),
(19, 10016, 2, 1, '[{\"id\":\"63\",\"description\":\"demo sakib\",\"quantity\":\"1\",\"stock\":\"86\",\"price\":\"2.32\",\"totalPrice\":\"2.32\"},{\"id\":\"63\",\"description\":\"demo sakib\",\"quantity\":\"1\",\"stock\":\"86\",\"price\":\"2.32\",\"totalPrice\":\"2.32\"}]', 0.464, 4.64, 5.104, 'cash', '2020-09-01 14:01:12'),
(20, 10017, 2, 1, '[{\"id\":\"63\",\"description\":\"demo sakib\",\"quantity\":\"1\",\"stock\":\"85\",\"price\":\"2.32\",\"totalPrice\":\"2.32\"},{\"id\":\"63\",\"description\":\"demo sakib\",\"quantity\":\"1\",\"stock\":\"85\",\"price\":\"2.32\",\"totalPrice\":\"2.32\"}]', 0.464, 4.64, 5.104, 'cash', '2020-09-01 14:06:29'),
(21, 10018, 2, 1, '[{\"id\":\"63\",\"description\":\"demo sakib\",\"quantity\":\"1\",\"stock\":\"84\",\"price\":\"2.32\",\"totalPrice\":\"2.32\"},{\"id\":\"63\",\"description\":\"demo sakib\",\"quantity\":\"1\",\"stock\":\"84\",\"price\":\"2.32\",\"totalPrice\":\"2.32\"},{\"id\":\"62\",\"description\":\"this is a demo product\",\"quantity\":\"1\",\"stock\":\"5\",\"price\":\"125\",\"totalPrice\":\"125\"}]', 19.446, 129.64, 149.086, 'cash', '2020-09-01 18:13:32'),
(22, 10018, 2, 1, '[{\"id\":\"63\",\"description\":\"demo sakib\",\"quantity\":\"1\",\"stock\":\"84\",\"price\":\"2.32\",\"totalPrice\":\"2.32\"},{\"id\":\"63\",\"description\":\"demo sakib\",\"quantity\":\"1\",\"stock\":\"84\",\"price\":\"2.32\",\"totalPrice\":\"2.32\"},{\"id\":\"62\",\"description\":\"this is a demo product\",\"quantity\":\"1\",\"stock\":\"5\",\"price\":\"125\",\"totalPrice\":\"125\"}]', 19.446, 129.64, 149.086, 'cash', '2020-09-01 18:15:13'),
(23, 10019, 2, 1, '[{\"id\":\"63\",\"description\":\"demo sakib\",\"quantity\":\"3\",\"stock\":\"81\",\"price\":\"2.32\",\"totalPrice\":\"6.96\"},{\"id\":\"63\",\"description\":\"demo sakib\",\"quantity\":\"1\",\"stock\":\"83\",\"price\":\"2.32\",\"totalPrice\":\"2.32\"}]', 0.928, 9.28, 10.208, 'cash', '2020-09-01 18:22:00'),
(24, 10020, 2, 1, '[{\"id\":\"63\",\"description\":\"demo sakib\",\"quantity\":3,\"stock\":\"82\",\"price\":\"2.32\",\"totalPrice\":\"2.32\"},{\"id\":\"63\",\"description\":\"demo sakib\",\"quantity\":3,\"stock\":\"82\",\"price\":\"2.32\",\"totalPrice\":\"2.32\"},{\"id\":\"63\",\"description\":\"demo sakib\",\"quantity\":3,\"stock\":\"82\",\"price\":\"2.32\",\"totalPrice\":\"2.32\"}]', 0.696, 6.96, 7.656, 'cash', '2020-09-02 08:13:21'),
(27, 10021, 2, 1, '[{\"id\":\"63\",\"description\":\"demo sakib\",\"quantity\":3,\"stock\":85,\"price\":\"2.32\",\"totalPrice\":\"2.32\"},{\"id\":\"62\",\"description\":\"this is a demo product\",\"quantity\":2,\"stock\":5,\"price\":\"125\",\"totalPrice\":\"125\"}]', 38.544, 256.96, 295.504, 'cash', '2020-09-02 08:55:14'),
(28, 10022, 2, 1, '[{\"id\":\"63\",\"description\":\"demo sakib\",\"quantity\":3,\"stock\":82,\"price\":\"2.32\",\"totalPrice\":6.959999999999999},{\"id\":\"62\",\"description\":\"this is a demo product\",\"quantity\":2,\"stock\":3,\"price\":\"125\",\"totalPrice\":250}]', 38.544, 256.96, 295.504, 'cash', '2020-09-02 10:12:35'),
(32, 10023, 3, 1, '[{\"id\":\"63\",\"description\":\"demo sakib\",\"quantity\":\"1\",\"stock\":\"79\",\"price\":\"2.32\",\"totalPrice\":\"2.32\"},{\"id\":\"62\",\"description\":\"this is a demo product\",\"quantity\":\"1\",\"stock\":\"1\",\"price\":\"125\",\"totalPrice\":\"125\"},{\"id\":\"60\",\"description\":\"Baldosin cutter\",\"quantity\":\"1\",\"stock\":\"17\",\"price\":\"1302\",\"totalPrice\":\"1302\"}]', 28.5864, 1429.32, 1457.91, 'cash', '2020-09-18 16:02:50'),
(33, 10024, 1, 1, '[{\"id\":\"63\",\"description\":\"demo sakib\",\"quantity\":\"1\",\"stock\":\"78\",\"price\":\"2.32\",\"totalPrice\":\"2.32\"}]', 0.0464, 2.32, 2.3664, 'cash', '2020-09-26 12:01:58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `userName` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `role` text NOT NULL,
  `photo` text NOT NULL,
  `status` int(1) NOT NULL,
  `lastLogin` datetime NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `userName`, `email`, `password`, `role`, `photo`, `status`, `lastLogin`, `date`) VALUES
(1, 'Kishor', 'kishor', 'kishor@gmail.com', '$2a$07$asxx54ahjppf45sd87a5auJRR6foEJ7ynpjisKtbiKJbvJsoQ8VPS', 'admin', 'views/img/users/kishor/308.png', 1, '2020-10-04 20:30:54', '2020-10-04 14:30:54'),
(6, 'Sakib', 'sakib', 'sakib@gmail.com', '$2a$07$asxx54ahjppf45sd87a5auJRR6foEJ7ynpjisKtbiKJbvJsoQ8VPS', 'saller', 'views/img/users/sakib/556.jpg', 1, '2020-08-25 23:23:33', '2020-08-25 18:09:29'),
(8, 'Kaka', 'kaka', 'kaka@gmail.com', '$2a$07$asxx54ahjppf45sd87a5auJRR6foEJ7ynpjisKtbiKJbvJsoQ8VPS', 'special', 'views/img/users/kaka/705.png', 1, '2020-08-25 23:19:24', '2020-08-25 17:19:24'),
(9, 'Polu', 'polu', 'polu@gmail.com', '$2a$07$asxx54ahjppf45sd87a5auJRR6foEJ7ynpjisKtbiKJbvJsoQ8VPS', 'saller', 'views/img/users/polu/248.png', 1, '2020-08-25 23:07:40', '2020-08-25 18:09:23'),
(10, 'KA', 'ka', 'ka@gmail.com', '$2a$07$asxx54ahjppf45sd87a5auJRR6foEJ7ynpjisKtbiKJbvJsoQ8VPS', 'admin', 'views/img/users/ka/635.png', 1, '2020-08-01 17:39:59', '2020-08-01 11:39:59'),
(12, 'DCO', 'dco', 'dco@gmail.com', '$2a$07$asxx54ahjppf45sd87a5auJRR6foEJ7ynpjisKtbiKJbvJsoQ8VPS', 'saller', 'views/img/users/dco/151.png', 0, '0000-00-00 00:00:00', '2020-08-25 18:09:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
