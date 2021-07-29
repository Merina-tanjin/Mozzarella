-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2020 at 10:53 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `addons`
--

CREATE TABLE `addons` (
  `id` int(1) NOT NULL,
  `addon_name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `addons`
--

INSERT INTO `addons` (`id`, `addon_name`, `price`) VALUES
(1, 'Garlic Sauce', 60),
(2, 'BBQ Sauce', 80),
(3, 'Extra Cheese', 100);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(5) NOT NULL,
  `cus_name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cus_phone_number` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cus_password` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cus_email` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cus_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cus_total_spending` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `cus_name`, `cus_phone_number`, `cus_password`, `cus_email`, `cus_address`, `cus_total_spending`) VALUES
(2, 'zxc', '1234', '$2y$10$n7cu82.DCTbYRDTEGvks8utgQ5kz3w0aPvt4wIk/sM8BEv5LoCE7a', 'zxc@zxc.com', 'zxcvb', NULL),
(3, 'customer3', '054321', '$2y$10$Pu1p7r027fbQpnj8z8kvNOl4MiElJQzIRFL5JUvyq1Eddvx5ZX1hi', 'bing@wing.com', 'batashe', NULL),
(4, 'customer4', '0004', '$2y$10$k/YLtgNBH.a3nDKdZLXAkOtUaqbH86SWF6/k4RQzS.CuDFpZw/c6.', 'bing@wing.com', 'batashe', 350),
(5, 'customer5', '0005', '$2y$10$lIoTb9csebUiPEc1EXNZ.eVBND7xeF0QWGdzgHPs..GFr4lCXLOhW', 'bing@wing.com', 'batashe', NULL),
(6, 'customer6', '0006', '$2y$10$P9Mm4F4l8m3UlrzI1oPEuO1uZCz4v6EFKvEQ.FpDvtLLCknW32Crq', 'bing@wing.com', 'batashe', NULL),
(7, 'customer7', '0007', '$2y$10$muiCnz/e4LE0JRUnqdkJzeQfeIOPFyVAc3l8Tga0rIsA/gtpHnltK', 'bing@wing.com', 'batashe', NULL),
(8, 'customer8', '0008', '$2y$10$nGfofXJfjQ2VZR5k.sBibuy5erTL6ubMQn7MGkZ/55vae4QTqiuse', 'bing@wing.com', 'batashe', NULL),
(9, 'customer9', '0009', '$2y$10$DaTz.w5vgo8j93AeedVaVeTXOfnK8XZh4AM6yO/.bDDzLszauVZqa', 'bing@wing.com', 'batashe', NULL),
(10, 'customer10', '0010', '$2y$10$sft23k9PZmKavTv/zyMuqO.le8FN3m3Wfem1EsQfiEY85RBQunIXK', 'bing@wing.com', 'batashe', NULL),
(11, 'customer11', '0011', '$2y$10$lPNf/kVht6MxT/9brcMB6.z.oo4yCpSJSRROy2gwYHHC08H/5SdbO', 'bing@wing.com', 'pahare', NULL),
(12, 'customer12', '0012', '$2y$10$Yh2sNXYKZ90UZobd2cnWZ.rto245fX43MBMfy0mg7nhK0fJSf/tLK', 'bing@wing.com', 'pahare', NULL),
(13, 'customer13', '0013', '$2y$10$Fb/xzLFdkO5SmN/oHAkaO.aWGflMPddMPsD.UZoXB7fEhDiPAjxB6', 'bing@wing.com', 'pahare', NULL),
(14, 'customer14', '0014', '$2y$10$FrpyRE6zfBLAXzMeyO2/aOmSCGBQKyJlbgByMzksgqMcsb/8wJZgW', 'bing@wing.com', 'pahare', NULL),
(15, 'customer15', '0015', '$2y$10$SZN6yU6JeS3wJYD.AGmTSOCt2FA8D2NeWcnYqU2zCHZRK0oYJziTG', 'bing@wing.com', 'pahare', NULL),
(16, 'customer16', '0016', '$2y$10$FFPtsLJfZvb2lMl3MyjYw.WcRZvGRg1LfMylt7aggoGWRbgvzVPTi', 'bing@wing.com', 'pahare', NULL),
(17, 'customer17', '0017', '$2y$10$u39VrSU/ynWItzMQhHK23uknZ3XHQlLClcg6IN2mW3m86PNiJG04K', 'bing@wing.com', 'pahare', NULL),
(18, 'customer18', '0018', '$2y$10$E.ObOBAuxFH6SrG4YQn5gOE0Yw8uNEV9Lh/YbHrZ.MG71sKB6kMYi', 'bing@wing.com', 'pahare', NULL),
(19, 'customer19', '0019', '$2y$10$G7AmFP1cUB4JVmy/.Ih8W.0aq4QcTId/TEdE91KGoTIIxXCZnQQgW', 'bing@wing.com', 'pahare', NULL),
(20, 'SHAH', '017570000000', '$2y$10$R08CNWRN5KsY4nXU6KEKme15dJPFIr2tHo.0g6X8N1HWu2CvjqMbi', 'mfshahriarx@protonmail.com', 'kuril', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `emp_name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emp_username` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emp_password` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emp_phone_number` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emp_email` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emp_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `emp_type` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `emp_name`, `emp_username`, `emp_password`, `emp_phone_number`, `emp_email`, `emp_address`, `emp_type`) VALUES
(1, 'asdf', 'asdf', '$2y$10$i//4xOzL3BuvTHmMYD1vcum8iyAFq7c3edodvkbaGLmOp367LMQGy', '0123', 'asdf@asdf.com', 'aassddff', 'admin'),
(2, 'qqwweerr', 'qwer', '$2y$10$xVmcliPPH7apVehZGnB8w.votFLx/K6GueZu1joU2gkN8SsrGto1K', '1234', 'qwer@qwer.com', 'qwerty', 'cashier'),
(3, 'alpha1', 'admin1', '$2y$10$FqQkBnuTfYtTT.NBXbnnDezRz79ifY1fBjHNsQdnsJtiHEJM4sg7e', '01234567', 'bing@wing.com', 'north point', 'admin'),
(5, 'alpha2', 'admin2', '$2y$10$UMt2QLDsiI.I7X8YSxHSZOGYl52q.fln8gs40o9r87MVe6EAqBKrW', '0321321', 'bing@wing.com', 'akashe', 'admin'),
(6, 'alpha3', 'admin3', '$2y$10$v5HDSx.XgHbIS2nCEqLjWOIE/tQDy3n3L1jKsaqZeLXWFMa5EpYja', '0321321', 'bing@wing.com', 'akashe', 'admin'),
(7, 'alpha4', 'admin4', '$2y$10$v8q3EuT1ha.FNv54PZRDOOOzzkrmqsjOFzaVNpyi7ga8G165yRiw6', '0321321', 'bing@wing.com', 'akashe', 'admin'),
(8, 'beta1', 'cashier1', '$2y$10$euFyCPJsCcs.qNzpw5XtoOcGG9raKKNB.syksYkOpx2e.bgssimaq', '25235235', 'mfshahriarx@protonmail.com', 'rockport', 'cashier'),
(9, 'beta2', 'cashier2', '$2y$10$LWrXlWV6takWsvsbPMhWku77lViuKXL.o7NUoXOGXzeoVH/3ekovW', '25235235', 'mfshahriarx@protonmail.com', 'rockport hill', 'cashier'),
(10, 'beta3', 'cashier3', '$2y$10$ZPAcB4Iv3AZlrBihE3cYHu5zkqeAmiuaOKAMDU2mtM2UZPbwMCk.u', '25235235', 'mfshahriarx@protonmail.com', 'rockport hill', 'cashier'),
(11, 'beta4', 'cashier4', '$2y$10$OTJGLlFlzpF/uN3ArpLq4efDH4zKANHFqbIUjoKa3NEx2imq4ZlXW', '25235235', 'mfshahriarx@protonmail.com', 'rockport hill', 'cashier'),
(12, 'gama1', 'controller1', '$2y$10$C1L9FtT5wV5b8ujgvsZmY.SYi/nJ8e5QwUGdnGLcdVfCK7WCfIKrO', '0321321', 'bing@wing.com', 'akasher pare', 'controller'),
(13, 'gama2', 'controller2', '$2y$10$LeXP/Ym4kcpQjMJfBCGfDekDNW6DMEx6BtGbHQZ0uac4d2ckQJkey', '0321321', 'bing@wing.com', 'akasher pare', 'controller'),
(14, 'gama3', 'controller3', '$2y$10$2phbLJcGzaMt.rVf/mgva.woo.WOPa2sXCWQY3Jt3cdR50R021IXe', '03213213', 'bing@wing.com', 'akasher pare', 'controller'),
(15, 'gama4', 'controller4', '$2y$10$YJxf8diCnQ5FxgOyV/QaSeYwqgB/KVMmTbUMcHVqhNJdXLn2Wk4VK', '0321321312', 'bing@wing.com', 'akasher pare', 'controller'),
(16, 'delta1', 'delivery1', '$2y$10$6Du5Az3f9.D7YpSR/Dr7OePyXw5maNXFbEx98Sq0b5csmAznoKATK', '09876', 'bing@wing.com', 'akashe', 'deliveryma'),
(17, 'delta2', 'delivery2', '$2y$10$cbNOqlbFy9AlkKMKJtIoxuR8XtPnLCTR9hBVTHqBsPWnGMoWYGgZy', '09876', 'bing@wing.com', 'akashe', 'deliveryma'),
(18, 'delta3', 'delivery3', '$2y$10$f9WaBOjBnouObg0RnYZED.0xP7gPT2fu197a2x2YXH0jTjTjIX7We', '09876123', 'bing@wing.com', 'akashe pashe', 'deliveryma'),
(19, 'delta4', 'delivery4', '$2y$10$AWMBWDWIl1e63qSzQlBlSeCK4.F2rpmW3ksz1FbKdbjWvMRYDW4AS', '09876123', 'bing@wing.com', 'akashe pashe', 'deliveryma'),
(20, 'Shahriar', 'SHAH', '$2y$10$pJuTAzAQ4OXnIQkzJiyB3.NC424h6NiWbO9.j4bNLm5nKoieNSo5K', '017654321', 'mfshahriarx@protonmail.com', 'comilla', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `id` int(2) NOT NULL,
  `ing_name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity(KG)` int(3) NOT NULL,
  `cost_per_kg` int(4) NOT NULL,
  `last_resupply` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `ing_name`, `quantity(KG)`, `cost_per_kg`, `last_resupply`) VALUES
(1, 'sugar', 80, 40, '2020-09-21 09:02:00'),
(2, 'Salt', 60, 15, '2020-09-21 09:02:00'),
(3, 'chicken', 50, 100, '2020-09-21 09:04:44'),
(4, 'beef', 50, 300, '2020-09-21 09:04:44'),
(5, 'mutton', 50, 350, '2020-09-21 09:06:11'),
(6, 'rice', 150, 40, '2020-09-21 09:06:11'),
(7, 'flour', 50, 20, '2020-09-21 09:10:10'),
(8, 'Soybean Oil', 50, 100, '2020-09-21 09:10:10'),
(9, 'rui fish', 50, 70, '2020-09-21 09:11:24'),
(10, 'katla fish', 50, 70, '2020-09-21 09:11:24'),
(11, 'milk', 20, 40, '2020-09-21 09:13:45'),
(12, 'tomato', 30, 30, '2020-09-21 09:13:45'),
(13, 'cheese', 20, 100, '2020-09-21 09:14:59'),
(14, 'coco powder', 20, 100, '2020-09-21 09:14:59'),
(15, 'vegetable oil', 20, 70, '2020-09-21 09:16:26'),
(16, 'spinach', 20, 10, '2020-09-21 09:16:26'),
(17, 'tomato sauce', 20, 70, '2020-09-21 09:21:19'),
(18, 'mayonese', 20, 100, '2020-09-21 09:21:19'),
(19, 'bun', 20, 40, '2020-09-21 09:27:03'),
(20, 'capsicum', 20, 100, '2020-09-21 09:27:03'),
(21, 'latus', 10, 20, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(3) NOT NULL,
  `f_name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `f_type` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(4) NOT NULL,
  `review` float NOT NULL,
  `image` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `f_name`, `f_type`, `price`, `review`, `image`) VALUES
(1, 'Chicken Burger', '1', 210, 5, '1'),
(2, 'Beef Burger', '1', 220, 5, '2'),
(3, 'Chicken Cheese Burger', '1', 240, 5, '3'),
(4, 'Beef Cheese Burger', '1', 280, 5, '4'),
(5, 'Chicken Pizza', '2', 600, 5, '5'),
(6, 'Mushroom Pizza', '2', 660, 5, '6'),
(7, 'Beef Pizza', '2', 680, 5, '7'),
(8, 'Tuna Pizza', '2', 650, 5, '8'),
(9, 'VeggiePizza', '2', 580, 5, '9'),
(10, 'Chicken Sub', '3', 140, 5, '10'),
(11, 'Beef Sub', '3', 160, 5, '11'),
(12, 'Vegan Sub', '3', 120, 5, '12'),
(13, 'Oreo Milkshake', '4', 150, 5, '13'),
(14, 'Cold Coffee', '4', 140, 5, '14'),
(15, 'Chocolate Shake', '4', 160, 5, '15'),
(16, 'Tea', '4', 40, 5, '16');

-- --------------------------------------------------------

--
-- Table structure for table `queue`
--

CREATE TABLE `queue` (
  `id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `totalCost` int(11) DEFAULT NULL,
  `orderTime` varchar(255) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `queue`
--

INSERT INTO `queue` (`id`, `description`, `totalCost`, `orderTime`, `customer_id`) VALUES
(41, 'total cost:600;Chicken Pizza(1); \n', 600, '10:49:33', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addons`
--
ALTER TABLE `addons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `queue`
--
ALTER TABLE `queue`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addons`
--
ALTER TABLE `addons`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `queue`
--
ALTER TABLE `queue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
