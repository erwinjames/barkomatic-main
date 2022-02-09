-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2022 at 09:41 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `barkomatic`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `username`, `password`, `email`) VALUES
(1, 'admin', 'admin', 'admin@barkomatic.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_all_ship_port_location`
--

CREATE TABLE `tbl_all_ship_port_location` (
  `id` int(11) NOT NULL,
  `location_from` varchar(75) NOT NULL,
  `location_to` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_all_ship_port_location`
--

INSERT INTO `tbl_all_ship_port_location` (`id`, `location_from`, `location_to`) VALUES
(1, 'test', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_passenger_account`
--

CREATE TABLE `tbl_passenger_account` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_passenger_account`
--

INSERT INTO `tbl_passenger_account` (`id`, `username`, `password`) VALUES
(1, 'test', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_passenger_detail`
--

CREATE TABLE `tbl_passenger_detail` (
  `id` int(11) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `lastname` varchar(25) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(45) NOT NULL,
  `phone_number` varchar(30) NOT NULL,
  `Address` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_passenger_detail`
--

INSERT INTO `tbl_passenger_detail` (`id`, `first_name`, `lastname`, `gender`, `dob`, `email`, `phone_number`, `Address`) VALUES
(1, 'test', 'test', 'Female', '1996-02-29', 'it@tamiyachuo.com', '09062419916', 'Lapu Lapu City');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_passenger_reservation`
--

CREATE TABLE `tbl_passenger_reservation` (
  `id` int(11) NOT NULL,
  `reservation_number` varchar(7) NOT NULL,
  `ship_name` varchar(45) NOT NULL,
  `passenger_name` varchar(45) NOT NULL,
  `location_from` varchar(75) NOT NULL,
  `location_to` varchar(75) NOT NULL,
  `depart_date` date NOT NULL,
  `depart_time` varchar(15) NOT NULL,
  `accomodation` varchar(45) NOT NULL,
  `reservation_date` date NOT NULL,
  `expiration` date NOT NULL,
  `status` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_passenger_reservation`
--

INSERT INTO `tbl_passenger_reservation` (`id`, `reservation_number`, `ship_name`, `passenger_name`, `location_from`, `location_to`, `depart_date`, `depart_time`, `accomodation`, `reservation_date`, `expiration`, `status`) VALUES
(1, '8172818', '2go', 'test test', 'test', 'test', '2022-02-23', '08:56 PM', 'test', '2022-01-05', '2022-01-07', 'Expired'),
(3, '9179680', '2go', 'test test', 'test', 'test', '2022-02-23', '08:56 PM', 'test', '2022-01-28', '2022-01-30', 'Expired'),
(4, '3000655', '2go', 'test test', 'test', 'test', '2022-02-23', '08:56 PM', 'test', '2022-01-28', '2022-01-30', 'Expired'),
(5, '3962974', '2go', 'test test', 'test', 'test', '2022-02-23', '08:56 PM', 'test', '2022-01-28', '2022-01-30', 'Expired'),
(6, '1178900', '2go', 'test test', 'test', 'test', '2022-02-23', '08:56 PM', 'No Aircon', '2022-01-28', '2022-01-30', 'Expired'),
(7, '8985094', '2go', 'test test', 'test', 'test', '2022-02-23', '08:56 PM', 'No Aircon', '2022-01-28', '2022-01-30', 'Expired'),
(8, '1867546', '2go', 'test test', 'test', 'test', '2022-02-23', '08:56 PM', 'test', '2022-01-28', '2022-01-30', 'Expired'),
(9, '1581477', '2go', 'test test', 'test', 'test', '2022-02-23', '08:56 PM', 'test', '2022-01-28', '2022-01-30', 'Expired'),
(10, '5957285', '2go', 'test test', 'test', 'test', '2022-02-23', '08:56 PM', 'test', '2022-01-28', '2022-01-30', 'Expired'),
(11, '8694362', '2go', 'test test', 'test', 'test', '2022-02-23', '08:56 PM', 'test', '2022-01-28', '2022-01-30', 'Expired'),
(12, '9846360', '2go', 'test test', 'test', 'test', '2022-02-23', '08:56 PM', 'test', '2022-01-28', '2022-01-30', 'Expired'),
(13, '4369524', '2go', 'test test', 'test', 'test', '2022-02-23', '08:56 PM', 'test', '2022-01-28', '2022-01-30', 'Expired'),
(14, '7128929', '2go', 'test test', 'test', 'test', '2022-02-23', '08:56 PM', 'test', '2022-01-28', '2022-01-30', 'Expired'),
(15, '8326750', '2go', 'test test', 'test', 'test', '2022-02-23', '08:56 PM', 'No Aircon', '2022-01-28', '2022-01-30', NULL),
(16, '2614109', '2go', 'test test', 'test', 'test', '2022-02-23', '08:56 PM', 'test', '2022-01-28', '2022-01-30', NULL),
(17, '4396016', '2go', 'test test', 'test', 'test', '2022-02-23', '08:56 PM', 'No Aircon', '2022-02-01', '2022-02-03', NULL),
(18, '1003964', '2go', 'test test', 'test', 'test', '2022-02-23', '08:56 PM', 'No Aircon', '2022-02-01', '2022-02-03', NULL),
(19, '5920135', '2go', 'test test', 'test', 'test', '2022-02-23', '08:56 PM', 'test', '2022-02-01', '2022-02-03', NULL),
(20, '6589309', '2go', 'test test', 'test', 'test', '2022-02-23', '08:56 PM', 'test', '2022-02-01', '2022-02-03', NULL),
(21, '6305377', '2go', 'test test', 'test', 'test', '2022-02-23', '08:56 PM', 'No Aircon', '2022-02-01', '2022-02-03', NULL),
(22, '9281136', '2go', 'test test', 'test', 'test', '2022-02-23', '08:56 PM', 'No Aircon', '2022-02-01', '2022-02-03', NULL),
(23, '3552080', '2go', 'test test', 'test', 'test', '2022-02-23', '08:56 PM', 'test', '2022-02-03', '2022-02-05', NULL),
(24, '8473788', '2go', 'test test', 'test', 'test', '2022-02-23', '08:56 PM', 'No Aircon', '2022-02-03', '2022-02-05', NULL),
(25, '5110287', '2go', 'test test', 'test', 'test', '2022-02-23', '08:56 PM', 'No Aircon', '2022-02-04', '2022-02-06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_passenger_reset_password`
--

CREATE TABLE `tbl_passenger_reset_password` (
  `id` int(11) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `token_expire` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_passenger_reset_password`
--

INSERT INTO `tbl_passenger_reset_password` (`id`, `token`, `token_expire`) VALUES
(1, NULL, '2022-01-04 01:11:25');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_psnger_pymnt`
--

CREATE TABLE `tbl_psnger_pymnt` (
  `id` int(11) NOT NULL,
  `reservation_number` int(30) NOT NULL,
  `txn_id` int(30) NOT NULL,
  `payer_email` varchar(100) NOT NULL,
  `currency` varchar(30) NOT NULL,
  `gross_income` varchar(30) NOT NULL,
  `payment_status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ship_accomodation_type`
--

CREATE TABLE `tbl_ship_accomodation_type` (
  `id` int(11) NOT NULL,
  `ship_accomodation_name` varchar(50) DEFAULT NULL,
  `seat_type` varchar(45) DEFAULT NULL,
  `aircon` varchar(45) DEFAULT NULL,
  `price` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ship_account`
--

CREATE TABLE `tbl_ship_account` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_ship_account`
--

INSERT INTO `tbl_ship_account` (`id`, `username`, `password`) VALUES
(1, 'test', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ship_belong`
--

CREATE TABLE `tbl_ship_belong` (
  `id` int(11) NOT NULL,
  `ship` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_ship_belong`
--

INSERT INTO `tbl_ship_belong` (`id`, `ship`) VALUES
(1, '2go'),
(3, '2go'),
(4, '2go');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ship_detail`
--

CREATE TABLE `tbl_ship_detail` (
  `id` int(11) NOT NULL,
  `subscription_id` int(30) NOT NULL,
  `ship_name` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `ship_logo` longblob DEFAULT NULL,
  `subs_stats` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_ship_detail`
--

INSERT INTO `tbl_ship_detail` (`id`, `subscription_id`, `ship_name`, `email`, `ship_logo`, `subs_stats`) VALUES
(1, 0, '2go', 'test@2go.com', NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ship_has_accomodation_type`
--

CREATE TABLE `tbl_ship_has_accomodation_type` (
  `id` int(11) NOT NULL,
  `accomodation_name` varchar(45) NOT NULL,
  `seat_type` varchar(20) NOT NULL,
  `aircon` varchar(20) NOT NULL,
  `price` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_ship_has_accomodation_type`
--

INSERT INTO `tbl_ship_has_accomodation_type` (`id`, `accomodation_name`, `seat_type`, `aircon`, `price`) VALUES
(1, 'test', 'test', 'YES', '10000');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ship_port`
--

CREATE TABLE `tbl_ship_port` (
  `id` int(11) NOT NULL,
  `location_from` varchar(75) NOT NULL,
  `port_from` varchar(75) NOT NULL,
  `location_to` varchar(75) NOT NULL,
  `port_to` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_ship_port`
--

INSERT INTO `tbl_ship_port` (`id`, `location_from`, `port_from`, `location_to`, `port_to`) VALUES
(1, 'test', 'test', 'test', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ship_reset_password`
--

CREATE TABLE `tbl_ship_reset_password` (
  `id` int(11) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `token_expire` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_ship_reset_password`
--

INSERT INTO `tbl_ship_reset_password` (`id`, `token`, `token_expire`) VALUES
(1, NULL, '2021-12-08 19:08:17');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ship_schedule`
--

CREATE TABLE `tbl_ship_schedule` (
  `id` int(11) NOT NULL,
  `depart_date` date NOT NULL,
  `depart_time` varchar(15) NOT NULL,
  `location_from` varchar(75) NOT NULL,
  `port_from` varchar(75) NOT NULL,
  `location_to` varchar(75) NOT NULL,
  `port_to` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_ship_schedule`
--

INSERT INTO `tbl_ship_schedule` (`id`, `depart_date`, `depart_time`, `location_from`, `port_from`, `location_to`, `port_to`) VALUES
(1, '2022-02-23', '08:56 PM', 'test', 'test', 'test', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_staff_account`
--

CREATE TABLE `tbl_staff_account` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_staff_account`
--

INSERT INTO `tbl_staff_account` (`id`, `username`, `password`) VALUES
(1, 'test', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3'),
(2, 'testing', 'dc724af18fbdd4e59189f5fe768a5f8311527050');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_staff_detail`
--

CREATE TABLE `tbl_staff_detail` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `ship_reside` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_staff_detail`
--

INSERT INTO `tbl_staff_detail` (`id`, `name`, `email`, `ship_reside`) VALUES
(1, 'test', 'manugasewinjames@gmail.com', '2go'),
(2, 'testing', 'testing@gmail.com', '2go');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_staff_reset_password`
--

CREATE TABLE `tbl_staff_reset_password` (
  `id` int(11) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `token_expire` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_staff_reset_password`
--

INSERT INTO `tbl_staff_reset_password` (`id`, `token`, `token_expire`) VALUES
(1, NULL, '2021-12-08 19:11:06'),
(2, NULL, '2021-12-09 23:03:33'),
(3, NULL, '2021-12-09 23:04:13');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tckt`
--

CREATE TABLE `tbl_tckt` (
  `id` int(11) NOT NULL,
  `tckt_qty` int(100) NOT NULL,
  `tckt_stats` varchar(100) NOT NULL,
  `tckt_promo` text NOT NULL,
  `tckt_dscnt` text NOT NULL,
  `tckt_owner` varchar(100) NOT NULL,
  `tckt_price` int(30) NOT NULL,
  `tbl_time_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_tckt`
--

INSERT INTO `tbl_tckt` (`id`, `tckt_qty`, `tckt_stats`, `tckt_promo`, `tckt_dscnt`, `tckt_owner`, `tckt_price`, `tbl_time_created`) VALUES
(1, 2, 'Open For Avail', '', '', '2go', 300, '2021-12-10 03:26:18'),
(2, 5, 'Open For Reservation', 'testing', 'testing', '2go', 300, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `subscription_id` int(11) NOT NULL DEFAULT 0,
  `first_name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` enum('Male','Female') COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_subscriptions`
--

CREATE TABLE `user_subscriptions` (
  `id` int(11) NOT NULL,
  `user_email` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `payment_method` enum('paypal') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'paypal',
  `validity` int(5) NOT NULL COMMENT 'in month(s)',
  `valid_from` datetime NOT NULL,
  `valid_to` datetime NOT NULL,
  `item_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `txn_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `payment_gross` float(10,2) NOT NULL,
  `currency_code` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `subscr_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `payer_email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `payment_status` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_subscriptions`
--

INSERT INTO `user_subscriptions` (`id`, `user_email`, `payment_method`, `validity`, `valid_from`, `valid_to`, `item_number`, `txn_id`, `payment_gross`, `currency_code`, `subscr_id`, `payer_email`, `payment_status`) VALUES
(0, 'test@2go.com', 'paypal', 3, '2021-12-16 04:58:05', '2022-03-16 04:58:05', 'MS123456', '4FR08602LF594633W', 75.00, 'USD', 'I-RJ9T7J2CRJFB', 'sb-f9srf9117280@personal.example.com', 'Completed');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_all_ship_port_location`
--
ALTER TABLE `tbl_all_ship_port_location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_passenger_account`
--
ALTER TABLE `tbl_passenger_account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_passenger_detail`
--
ALTER TABLE `tbl_passenger_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_passenger_reservation`
--
ALTER TABLE `tbl_passenger_reservation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_passenger_reset_password`
--
ALTER TABLE `tbl_passenger_reset_password`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_ship_accomodation_type`
--
ALTER TABLE `tbl_ship_accomodation_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_ship_account`
--
ALTER TABLE `tbl_ship_account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_ship_belong`
--
ALTER TABLE `tbl_ship_belong`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_ship_detail`
--
ALTER TABLE `tbl_ship_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_ship_has_accomodation_type`
--
ALTER TABLE `tbl_ship_has_accomodation_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_ship_port`
--
ALTER TABLE `tbl_ship_port`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_ship_reset_password`
--
ALTER TABLE `tbl_ship_reset_password`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_ship_schedule`
--
ALTER TABLE `tbl_ship_schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_staff_account`
--
ALTER TABLE `tbl_staff_account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_staff_detail`
--
ALTER TABLE `tbl_staff_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_staff_reset_password`
--
ALTER TABLE `tbl_staff_reset_password`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_tckt`
--
ALTER TABLE `tbl_tckt`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_all_ship_port_location`
--
ALTER TABLE `tbl_all_ship_port_location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_passenger_account`
--
ALTER TABLE `tbl_passenger_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_passenger_detail`
--
ALTER TABLE `tbl_passenger_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_passenger_reservation`
--
ALTER TABLE `tbl_passenger_reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbl_passenger_reset_password`
--
ALTER TABLE `tbl_passenger_reset_password`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_ship_account`
--
ALTER TABLE `tbl_ship_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_ship_belong`
--
ALTER TABLE `tbl_ship_belong`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_ship_detail`
--
ALTER TABLE `tbl_ship_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_ship_has_accomodation_type`
--
ALTER TABLE `tbl_ship_has_accomodation_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_ship_port`
--
ALTER TABLE `tbl_ship_port`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_ship_reset_password`
--
ALTER TABLE `tbl_ship_reset_password`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_ship_schedule`
--
ALTER TABLE `tbl_ship_schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_staff_account`
--
ALTER TABLE `tbl_staff_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_staff_detail`
--
ALTER TABLE `tbl_staff_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_staff_reset_password`
--
ALTER TABLE `tbl_staff_reset_password`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_tckt`
--
ALTER TABLE `tbl_tckt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
