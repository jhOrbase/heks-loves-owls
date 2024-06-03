-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2024 at 09:13 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wristiquedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_ref_no` varchar(9) DEFAULT NULL,
  `pdt_id` int(11) DEFAULT NULL,
  `pdt_qty` int(11) NOT NULL,
  `order_phase_status` int(1) NOT NULL DEFAULT 1 COMMENT '1 - Cart\r\n2 - Checkout\r\n3 - Pending\r\n4 - Confirmed\r\n5 - Delivered\r\n0 - Cancelled',
  `shipping_id` int(11) DEFAULT NULL,
  `shipping_fee` decimal(10,2) NOT NULL DEFAULT 0.00,
  `user_id` int(11) NOT NULL,
  `alternate_address` varchar(150) DEFAULT NULL,
  `payment_method` int(11) DEFAULT NULL,
  `gcash_ref_no` varchar(20) DEFAULT NULL,
  `gcash_account_name` varchar(55) DEFAULT NULL,
  `gcash_account_no` varchar(20) DEFAULT NULL,
  `gcash_amount_sent` double(8,2) DEFAULT NULL,
  `orders_date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_ref_no`, `pdt_id`, `pdt_qty`, `order_phase_status`, `shipping_id`, `shipping_fee`, `user_id`, `alternate_address`, `payment_method`, `gcash_ref_no`, `gcash_account_name`, `gcash_account_no`, `gcash_amount_sent`, `orders_date_added`) VALUES
(1, '83M2L3N2', 6, 1, 5, 1, 0.00, 1, '', 1, NULL, NULL, NULL, NULL, '2023-05-25 17:02:29'),
(2, '83M2L3N2', 3, 1, 5, 1, 0.00, 1, '', 1, NULL, NULL, NULL, NULL, '2023-05-25 17:02:31'),
(3, '80K4M0A7', 5, 1, 5, 2, 0.00, 1, 'Calzada, Guinobatan, Albay', 2, '7217281221', 'Jan Hericka Orbase', '09886352189', 22000.00, '2024-05-25 17:12:01'),
(4, '80K4M0A7', 2, 1, 5, 2, 0.00, 1, 'Calzada, Guinobatan, Albay', 2, '7217281221', 'Jan Hericka Orbase', '09886352189', 22000.00, '2024-05-25 17:12:03'),
(5, '99O2P4C6', 6, 1, 5, 2, 0.00, 1, '', 2, '7217281273', 'Jan Hericka Orbase', '09886352189', 27000.00, '2024-05-25 19:13:41'),
(6, '99O2P4C6', 7, 1, 5, 2, 0.00, 1, '', 2, '7217281273', 'Jan Hericka Orbase', '09886352189', 27000.00, '2024-05-25 19:13:43'),
(8, '54R3B5T3', 5, 1, 5, 1, 0.00, 1, '', 1, NULL, NULL, NULL, NULL, '2024-05-26 14:29:33'),
(9, '54R3B5T3', 1, 1, 5, 1, 0.00, 1, '', 1, NULL, NULL, NULL, NULL, '2024-05-26 14:41:57'),
(10, '54R3B5T3', 6, 2, 5, 1, 0.00, 1, '', 1, NULL, NULL, NULL, NULL, '2024-05-26 14:42:03'),
(11, '31W0R8X0', 5, 1, 0, 1, 0.00, 1, '', 1, NULL, NULL, NULL, NULL, '2024-05-28 14:50:45'),
(12, '17L7Y1G5', 2, 1, 4, 1, 0.00, 1, '', 1, NULL, NULL, NULL, NULL, '2024-05-29 15:01:04'),
(13, '17L7Y1G5', 3, 1, 4, 1, 0.00, 1, '', 1, NULL, NULL, NULL, NULL, '2024-05-29 15:01:07'),
(14, '17L7Y1G5', 6, 1, 4, 1, 0.00, 1, '', 1, NULL, NULL, NULL, NULL, '2024-05-29 15:01:09'),
(15, '19M8M3Y4', 4, 1, 3, 1, 0.00, 1, '', 1, NULL, NULL, NULL, NULL, '2024-05-29 15:01:23'),
(16, '19M8M3Y4', 8, 1, 3, 1, 0.00, 1, '', 1, NULL, NULL, NULL, NULL, '2024-05-29 15:01:26'),
(17, '19M8M3Y4', 3, 1, 3, 1, 0.00, 1, '', 1, NULL, NULL, NULL, NULL, '2024-05-29 15:01:28'),
(20, '73J1R7R3', 8, 1, 5, 1, 0.00, 2, '', 1, NULL, NULL, NULL, NULL, '2024-05-29 15:14:02'),
(21, '53E0M8W5', 1, 1, 5, 1, 0.00, 2, '', 1, NULL, NULL, NULL, NULL, '2024-05-29 15:14:17'),
(22, '56N2T1G7', 5, 1, 4, 1, 0.00, 2, '', 1, NULL, NULL, NULL, NULL, '2024-05-30 01:12:40'),
(23, '45Y7C1K8', 6, 1, 5, 1, 0.00, 6, '', 1, NULL, NULL, NULL, NULL, '2024-05-30 04:19:02'),
(24, '45Y7C1K8', 7, 1, 5, 1, 0.00, 6, '', 1, NULL, NULL, NULL, NULL, '2024-05-30 04:19:04'),
(25, '64M1V0E1', 1, 1, 2, 1, 0.00, 1, '', 1, NULL, NULL, NULL, NULL, '2025-05-30 07:35:51'),
(27, '88Y0L7F0', 12, 1, 2, 1, 0.00, 1, '', 2, '7217281221', 'Jan Hericka Orbase', '09886352189', 46000.00, '2024-06-01 09:26:43'),
(28, '88Y0L7F0', 12, 1, 2, 1, 0.00, 1, '', 2, '7217281221', 'Jan Hericka Orbase', '09886352189', 46000.00, '2024-06-01 09:27:55'),
(29, '88Y0L7F0', 12, 1, 2, 1, 0.00, 1, '', 2, '7217281221', 'Jan Hericka Orbase', '09886352189', 46000.00, '2024-06-01 09:28:03'),
(30, '88Y0L7F0', 20, 1, 2, 1, 0.00, 1, '', 2, '7217281221', 'Jan Hericka Orbase', '09886352189', 46000.00, '2024-06-01 09:28:38'),
(31, '81N8N9I3', 13, 1, 2, 1, 0.00, 1, '', 2, '7217281227', 'Jan Hericka Orbase', '09886352189', 999999.99, '2024-06-01 22:22:37'),
(32, '00R8A0S6', 14, 1, 2, 1, 0.00, 1, '', 1, NULL, NULL, NULL, NULL, '2024-06-01 22:24:29'),
(33, '92B8Z9O1', 12, 1, 2, 1, 0.00, 1, '', 1, NULL, NULL, NULL, NULL, '2024-06-01 22:24:57'),
(34, '01Q1R0L1', 12, 1, 2, 1, 0.00, 1, '', 1, NULL, NULL, NULL, NULL, '2024-06-01 22:25:31'),
(35, '94R3I3X6', 13, 1, 2, 1, 0.00, 1, '', 2, '7217281229', 'Jan Hericka Orbase', '09886352189', 999999.99, '2024-06-01 22:27:00'),
(36, '62F9S7I5', 13, 1, 2, 1, 0.00, 1, '', 1, NULL, NULL, NULL, NULL, '2024-06-01 22:28:02'),
(37, '62F9S7I5', 13, 1, 2, 1, 0.00, 1, '', 1, NULL, NULL, NULL, NULL, '2024-06-01 22:31:38'),
(38, '45H1D0D2', 13, 1, 2, 1, 50.00, 2, '', 1, NULL, NULL, NULL, NULL, '2024-06-02 21:48:01'),
(41, '21Y7Z7F6', 13, 1, 2, 1, 50.00, 2, '', 1, NULL, NULL, NULL, NULL, '2024-06-02 21:57:06'),
(42, '21Y7Z7F6', 12, 1, 2, 1, 0.00, 2, '', 1, NULL, NULL, NULL, NULL, '2024-06-02 21:57:17'),
(43, '00S2N7B2', 13, 1, 2, 1, 50.00, 2, '', 2, '7217281290', 'Jan Hericka Orbase', '09886352189', 30050.00, '2024-06-02 21:59:27'),
(45, '00S2N7B2', 22, 1, 2, 1, 0.00, 2, '', 2, '7217281290', 'Jan Hericka Orbase', '09886352189', 30050.00, '2024-06-02 21:59:46'),
(46, '56J3U1S9', 13, 1, 2, 1, 50.00, 2, '', 1, NULL, NULL, NULL, NULL, '2024-06-02 22:16:13'),
(47, '56J3U1S9', 14, 1, 2, 1, 0.00, 2, '', 1, NULL, NULL, NULL, NULL, '2024-06-02 22:16:22'),
(49, '53T4P7U0', 15, 1, 2, 1, 50.00, 1, '', 1, NULL, NULL, NULL, NULL, '2024-06-03 06:23:30'),
(53, '97L9F9Q2', 17, 1, 2, 1, 50.00, 1, '', 1, NULL, NULL, NULL, NULL, '2024-06-03 06:37:47'),
(54, '97L9F9Q2', 15, 2, 2, 1, 0.00, 1, '', 1, NULL, NULL, NULL, NULL, '2024-06-03 06:37:59');

-- --------------------------------------------------------

--
-- Table structure for table `order_phase_status`
--

CREATE TABLE `order_phase_status` (
  `order_phase_id` int(11) NOT NULL,
  `order_phase_desc` varchar(30) NOT NULL,
  `order_phase_admin` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_phase_status`
--

INSERT INTO `order_phase_status` (`order_phase_id`, `order_phase_desc`, `order_phase_admin`) VALUES
(0, 'Cancelled', 'Cancelled'),
(1, 'Cart', ''),
(2, 'Checkout', 'New'),
(3, 'Pending', 'Pending'),
(4, 'Confirmed', 'To Ship'),
(5, 'Delivered', 'Completed');

-- --------------------------------------------------------

--
-- Table structure for table `payment_method`
--

CREATE TABLE `payment_method` (
  `payment_method_id` int(11) NOT NULL,
  `payment_method_desc` varchar(255) NOT NULL,
  `payment_method_status` varchar(1) NOT NULL DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment_method`
--

INSERT INTO `payment_method` (`payment_method_id`, `payment_method_desc`, `payment_method_status`) VALUES
(1, 'COD', 'A'),
(2, 'GCASH', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pdt_id` int(11) NOT NULL,
  `pdt_img` varchar(255) DEFAULT NULL,
  `pdt_name` varchar(55) NOT NULL,
  `pdt_description` text NOT NULL,
  `pdt_price` decimal(8,2) NOT NULL,
  `pdt_status` char(1) NOT NULL DEFAULT 'A',
  `pdt_keywords` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pdt_id`, `pdt_img`, `pdt_name`, `pdt_description`, `pdt_price`, `pdt_status`, `pdt_keywords`) VALUES
(1, 'watch(1).png', 'Classic Watch 1', 'Black Premium-black leather', 9000.00, 'I', 'watch'),
(2, 'watch(2).png', 'Classic Watch 2', 'Silver-black leather', 8500.00, 'I', ''),
(3, 'watch(3).png', 'Classic Watch 3', 'Old Silver-brown leather', 7000.00, 'I', ''),
(4, 'watch(4).png', 'Classic Watch 4', 'Old Silver-black leather', 9000.00, 'I', ''),
(5, 'watch(5).png', 'Classic Watch 5', 'Silver Half-Style Premium-black leather', 12500.00, 'I', ''),
(6, 'watch(6).png', 'Classic Watch 6', 'Silver Half-Style Premium-khaki leather', 12000.00, 'I', ''),
(7, 'watch(7).png', 'Classic Watch 7', 'Gold Half-Style Premium-khaki leather', 14000.00, 'I', ''),
(8, 'watch8.png', 'Classic Watch 8', 'Silver, Black-Leather', 11500.00, 'I', ''),
(12, 'watch1.jpg', 'Dusk Aspire AIO', 'Black Premium-black leather', 11000.00, 'A', 'black watch, 	\nwatch'),
(13, 'watch2.jpg', 'Acer Aspire VX 15', 'Old Brown-Red leather', 15000.00, 'A', 'brown watch, old, antique, 	\nwatch'),
(14, 'watch3.jpg', 'Acer Aspire YX 23', 'B&S Premium-black leather', 10000.00, 'A', 'black watch, silver, leather, 	\nwatch'),
(15, 'watch4.jpg', 'Dell Inspiron 24', 'Black Premium', 15000.00, 'A', 'silver, black watch, classic, 	\nwatch'),
(16, 'watch5.jpg', 'Moon Wrist AOI', 'S&W Premium-black leather', 12000.00, 'A', '	 watch, classic, black watch'),
(17, 'watch6.jpg', 'Ocean Wave XV', 'Bck&Bue Premium-black leather', 15000.00, 'A', 'blue watch, blue leather, dark blue, dark blue, blue'),
(18, 'watch7.jpg', 'Glass Wrist AOI', 'S&W Premium-black leather', 13000.00, 'A', '	 watch, white, white watch black leather, black leather'),
(19, 'watch3.jpg', 'Green Forest XV', 'Forest Premium-black leather', 12000.00, 'A', '	 watch, green watch, forest green watch, green dial'),
(20, 'watch9.jpg', 'Antiquet YX 23', 'Old Silver-Coal Black leather', 13000.00, 'A', '	 watch, old, black watch, white dial, red arms, white'),
(21, 'watch10.jpg', 'Ell Inspiron 21', 'Black Premium-black leather', 12000.00, 'A', '	 watch, all black, black watch, sporty, sports watch'),
(22, 'watch12.jpg', 'Classy Ore AX', 'S&G Premium-black leather', 15000.00, 'A', '	 watch, white dial, black watch, silver, white, silver white'),
(23, 'waatch11.jpg', 'Don Wrist AOI', 'Black Premium-black leather', 10000.00, 'A', '	 watch, classic, black watch, black dial, all black, all-black, best-seller, best, best-selling, best seller, best selling');

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE `shipping` (
  `shipping_id` int(11) NOT NULL,
  `shipping_company` varchar(255) NOT NULL,
  `shipping_address` text DEFAULT NULL,
  `shipping_company_cd` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shipping`
--

INSERT INTO `shipping` (`shipping_id`, `shipping_company`, `shipping_address`, `shipping_company_cd`) VALUES
(1, 'J&T Express', NULL, 'JTE'),
(2, 'Flash Express', NULL, 'FX');

-- --------------------------------------------------------

--
-- Table structure for table `total_per_date`
--

CREATE TABLE `total_per_date` (
  `transaction_date_added` date DEFAULT NULL,
  `total_pdt_qty` decimal(32,0) DEFAULT NULL,
  `total_amt` decimal(39,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `total_per_order`
--

CREATE TABLE `total_per_order` (
  `order_ref_no` varchar(9) DEFAULT NULL,
  `total_pdt_qty` decimal(32,0) DEFAULT NULL,
  `total_amt` decimal(39,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `total_per_product`
--

CREATE TABLE `total_per_product` (
  `pdt_name` varchar(55) DEFAULT NULL,
  `pdt_img` varchar(255) DEFAULT NULL,
  `total_pdt_qty` decimal(32,0) DEFAULT NULL,
  `total_amt` decimal(39,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `total_per_user`
--

CREATE TABLE `total_per_user` (
  `fullname` varchar(100) DEFAULT NULL,
  `username` varchar(55) DEFAULT NULL,
  `total_pdt_qty` decimal(32,0) DEFAULT NULL,
  `total_amt` decimal(39,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `total_per_year`
--

CREATE TABLE `total_per_year` (
  `date_year` date DEFAULT NULL,
  `total_pdt_qty_year` decimal(65,0) DEFAULT NULL,
  `total_amt_yearly` decimal(65,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `total_yesterday_today`
--

CREATE TABLE `total_yesterday_today` (
  `total_pdt_qty_yesterday` decimal(32,0) DEFAULT NULL,
  `total_amt_yesterday` decimal(65,2) DEFAULT NULL,
  `total_pdt_qty_today` decimal(32,0) DEFAULT NULL,
  `total_amt_today` decimal(65,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `fullname` varchar(150) NOT NULL,
  `username` varchar(55) NOT NULL,
  `password` varchar(55) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `email` varchar(55) NOT NULL,
  `gender` char(1) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact_number` varchar(11) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_type` char(1) NOT NULL DEFAULT 'C',
  `user_status` char(1) NOT NULL DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `fullname`, `username`, `password`, `email`, `gender`, `address`, `contact_number`, `date_added`, `user_type`, `user_status`) VALUES
(0, '', 'admin', 'websystems', '', '', '', '', '2024-04-29 19:41:39', 'A', 'A'),
(1, 'Jan Hericka Orbase', 'heks', 'heks', 'janhericka@gmail.com', 'F', 'balay', '09526241556', '2024-04-29 20:08:49', 'C', 'A'),
(2, 'Princess Aira Layosa', 'cess', 'cess', 'princessaira@gmail.com', 'F', 'balay', '09526241556', '2024-04-30 10:31:21', 'C', 'A'),
(3, 'jade hugrant orbase', 'jj', 'hello', 'jadehugrant@gmail.com', 'M', 'calzada guinobatan albay', '09526241556', '2024-05-01 13:26:02', 'C', 'A'),
(4, 'John Henrick Orbase', 'JH', 'kuya', 'johnhenrick@gmail.com', 'M', 'calzada guinobatan albay', 'asasasa', '2024-05-01 13:47:25', 'C', 'A'),
(5, 'Janae Henreese A. Orbase', 'bidab', 'bidab', 'janae127@gmail.com', 'F', 'Calzada, Guinobatan, Albay', '09123456009', '2024-05-09 11:06:57', 'C', 'A'),
(6, 'Leander Pines', 'aso', 'aso', 'leanderpines@gmail.com', 'M', 'P-3 Lower Binogsacan Guinobatan Albay', '09663960079', '2024-05-30 04:18:49', 'C', 'A');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `users_id` (`user_id`),
  ADD KEY `pdt_id` (`pdt_id`);

--
-- Indexes for table `order_phase_status`
--
ALTER TABLE `order_phase_status`
  ADD PRIMARY KEY (`order_phase_id`);

--
-- Indexes for table `payment_method`
--
ALTER TABLE `payment_method`
  ADD PRIMARY KEY (`payment_method_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pdt_id`);

--
-- Indexes for table `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`shipping_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pdt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
