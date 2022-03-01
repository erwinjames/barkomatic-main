-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2022 at 02:03 AM
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
  `id` int(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

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
(1, 'lapu-lapu', 'olango');

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
(1, 'test', 'test', 'Male', '1996-02-29', 'manugasewinjames@gmail.com', '09062419916', 'Lapu Lapu City');

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
(1, '2604932', 'test', 'test test', 'lapu-lapu', 'olango', '2022-02-23', '04:52 PM', 'sample', '2022-01-28', '2022-01-30', 'Expired'),
(49, '4657525', 'test', 'test test', 'lapu-lapu', 'olango', '2022-02-23', '04:52 PM', 'sample', '2022-02-02', '2022-02-04', 'Expired'),
(50, '7769979', 'test', 'test test', 'lapu-lapu', 'olango', '2022-02-23', '04:52 PM', 'sample', '2022-02-02', '2022-02-04', 'Expired'),
(51, '7636884', 'test', 'test test', 'lapu-lapu', 'olango', '2022-02-23', '04:52 PM', 'sample', '2022-02-02', '2022-02-04', 'Expired'),
(52, '9554564', 'test', 'test test', 'lapu-lapu', 'olango', '2022-02-23', '04:52 PM', 'sample', '2022-02-02', '2022-02-04', 'Expired'),
(53, '5658508', 'test', 'test test', 'lapu-lapu', 'olango', '2022-02-23', '04:52 PM', 'sample', '2022-02-02', '2022-02-04', 'Expired'),
(54, '1776924', 'test', 'test test', 'lapu-lapu', 'olango', '2022-02-23', '04:52 PM', 'No Aircon', '2022-02-02', '2022-02-04', 'Expired'),
(55, '4194290', 'test', 'test test', 'lapu-lapu', 'olango', '2022-02-23', '04:52 PM', 'sample', '2022-02-03', '2022-02-05', 'Expired'),
(56, '1084510', 'test', 'test test', 'lapu-lapu', 'olango', '2022-02-23', '04:52 PM', 'sample', '2022-02-03', '2022-02-05', 'Expired'),
(57, '8203255', 'test', 'test test', 'lapu-lapu', 'olango', '2022-02-23', '04:52 PM', 'No Aircon', '2022-02-03', '2022-02-05', 'Expired'),
(58, '7644710', 'test', 'test test', 'lapu-lapu', 'olango', '2022-02-23', '04:52 PM', 'sample', '2022-02-05', '2022-02-07', 'Expired'),
(59, '2438192', 'test', 'test test', 'lapu-lapu', 'olango', '2022-02-23', '04:52 PM', 'No Aircon', '2022-02-06', '2022-02-08', 'Expired'),
(60, '5863491', 'test', 'test test', 'lapu-lapu', 'olango', '2022-02-23', '04:52 PM', 'sample', '2022-02-07', '2022-02-09', 'Expired'),
(61, '1421288', 'test', 'test test', 'lapu-lapu', 'olango', '2022-02-23', '04:52 PM', 'sample', '2022-02-09', '2022-02-11', 'Expired'),
(62, '9057281', 'test', 'test test', 'lapu-lapu', 'olango', '2022-02-23', '04:52 PM', 'No Aircon', '2022-02-25', '2022-02-27', 'Expired'),
(63, '7181409', 'test', 'test test', 'lapu-lapu', 'olango', '2022-02-23', '04:52 PM', 'No Aircon', '2022-02-25', '2022-02-27', 'Expired'),
(64, '9174785', 'test', 'test test', 'lapu-lapu', 'olango', '2022-02-23', '04:52 PM', 'No Aircon', '2022-02-25', '2022-02-27', 'Expired'),
(65, '1846388', 'test', 'test test', 'lapu-lapu', 'olango', '2022-02-23', '04:52 PM', 'No Aircon', '2022-02-25', '2022-02-27', 'Expired'),
(66, '1676736', 'test', 'test test', 'lapu-lapu', 'olango', '2022-02-23', '04:52 PM', 'No Aircon', '2022-02-25', '2022-02-27', 'Expired'),
(67, '9527128', 'test', 'test test', 'lapu-lapu', 'olango', '2022-02-23', '04:52 PM', 'No Aircon', '2022-02-25', '2022-02-27', 'Expired'),
(68, '5932472', 'test', 'test test', 'lapu-lapu', 'olango', '2022-02-23', '04:52 PM', 'No Aircon', '2022-02-28', '2022-03-02', 'Expired'),
(69, '5386540', 'test', 'test test', 'lapu-lapu', 'olango', '2022-02-23', '04:52 PM', 'No Aircon', '2022-02-28', '2022-03-02', 'Expired'),
(70, '5381289', 'test', 'test test', 'lapu-lapu', 'olango', '2022-02-23', '04:52 PM', 'No Aircon', '2022-02-28', '2022-03-02', 'Expired'),
(71, '7285796', 'test', 'test test', 'lapu-lapu', 'olango', '2022-02-23', '04:52 PM', 'No Aircon', '2022-02-28', '2022-03-02', 'Expired'),
(72, '5184937', 'test', 'test test', 'lapu-lapu', 'olango', '2022-02-23', '04:52 PM', 'No Aircon', '2022-02-28', '2022-03-02', 'Expired'),
(73, '6486826', 'test', 'test test', 'lapu-lapu', 'olango', '2022-02-23', '04:52 PM', 'No Aircon', '2022-02-28', '2022-03-02', 'Expired'),
(74, '5774985', 'test', 'test test', 'lapu-lapu', 'olango', '2022-02-23', '04:52 PM', 'No Aircon', '2022-02-28', '2022-03-02', 'Expired'),
(75, '5568149', 'test', 'test test', 'lapu-lapu', 'olango', '2022-02-23', '04:52 PM', 'No Aircon', '2022-02-28', '2022-03-02', 'Expired'),
(76, '7562471', 'test', 'test test', 'lapu-lapu', 'olango', '2022-02-23', '04:52 PM', 'No Aircon', '2022-02-28', '2022-03-02', 'Expired'),
(77, '2729257', 'test', 'test test', 'lapu-lapu', 'olango', '2022-02-23', '04:52 PM', 'No Aircon', '2022-02-28', '2022-03-02', 'Expired'),
(78, '1033192', 'test', 'test test', 'lapu-lapu', 'olango', '2022-02-23', '04:52 PM', 'No Aircon', '2022-02-28', '2022-03-02', 'Expired'),
(79, '5954494', 'test', 'test test', 'lapu-lapu', 'olango', '2022-02-23', '04:52 PM', 'No Aircon', '2022-02-28', '2022-03-02', 'Expired'),
(80, '4863221', 'test', 'test test', 'lapu-lapu', 'olango', '2022-02-23', '04:52 PM', 'No Aircon', '2022-02-28', '2022-03-02', 'Expired'),
(81, '8023207', 'test', 'test test', 'lapu-lapu', 'olango', '2022-02-23', '04:52 PM', 'No Aircon', '2022-02-28', '2022-03-02', 'Expired'),
(82, '6362798', 'test', 'test test', 'lapu-lapu', 'olango', '2022-02-23', '04:52 PM', 'No Aircon', '2022-02-28', '2022-03-02', 'Expired'),
(83, '5661168', 'test', 'test test', 'lapu-lapu', 'olango', '2022-02-23', '04:52 PM', 'No Aircon', '2022-02-28', '2022-03-02', 'Expired'),
(84, '9318845', 'test', 'test test', 'lapu-lapu', 'olango', '2022-02-23', '04:52 PM', 'No Aircon', '2022-02-28', '2022-03-02', 'Expired'),
(85, '8140692', 'test', 'test test', 'lapu-lapu', 'olango', '2022-02-23', '04:52 PM', 'No Aircon', '2022-02-28', '2022-03-02', 'Expired'),
(86, '6116494', 'test', 'test test', 'lapu-lapu', 'olango', '2022-02-23', '04:52 PM', 'No Aircon', '2022-02-28', '2022-03-02', 'Expired'),
(87, '5336970', 'test', 'test test', 'lapu-lapu', 'olango', '2022-02-23', '04:52 PM', 'No Aircon', '2022-02-28', '2022-03-02', 'Expired'),
(88, '8012376', 'test', 'test test', 'lapu-lapu', 'olango', '2022-02-23', '04:52 PM', 'No Aircon', '2022-02-28', '2022-03-02', 'Expired'),
(89, '5574084', 'test', 'test test', 'lapu-lapu', 'olango', '2022-02-23', '04:52 PM', 'No Aircon', '2022-03-01', '2022-03-03', NULL);

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
(1, NULL, '2022-01-23 01:51:45');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_psnger_pymnt`
--

CREATE TABLE `tbl_psnger_pymnt` (
  `id` int(11) NOT NULL,
  `reservation_number` int(30) NOT NULL,
  `txn_id` varchar(255) NOT NULL,
  `payer_email` varchar(100) NOT NULL,
  `currency` varchar(30) NOT NULL,
  `gross_income` varchar(30) NOT NULL,
  `payment_status` varchar(30) NOT NULL,
  `dates` datetime NOT NULL,
  `payer_type` varchar(30) NOT NULL,
  `ship_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_psnger_pymnt`
--

INSERT INTO `tbl_psnger_pymnt` (`id`, `reservation_number`, `txn_id`, `payer_email`, `currency`, `gross_income`, `payment_status`, `dates`, `payer_type`, `ship_name`) VALUES
(1, 1421288, '', 'sb-f9srf9117280@personal.example.com', 'PHP', '', '', '2022-02-09 12:27:24', '', ''),
(1, 1421288, '9EF20470AX2517517', 'sb-f9srf9117280@personal.example.com', 'PHP', '5300.00', 'Completed', '2022-02-09 12:28:16', '', ''),
(1, 1421288, '8LG493828F316381T', 'sb-f9srf9117280@personal.example.com', 'PHP', '5300.00', 'Completed', '2022-02-09 12:48:16', '', ''),
(1, 7181409, '87Y821002U221852U', 'Johndoe@personalemail.com', 'PHP', '300.00', 'Completed', '2022-02-25 11:39:48', '', 'test'),
(1, 9174785, '7825472119760052C', 'Johndoe@personalemail.com', 'PHP', '300.00', 'Completed', '2022-02-25 12:00:18', '', 'test'),
(1, 1846388, '32L38894DJ065591P', 'Johndoe@personalemail.com', 'PHP', '300.00', 'Completed', '2022-02-25 13:49:30', '', 'test'),
(1, 1676736, '35W74869RY584312U', 'Johndoe@personalemail.com', 'PHP', '300.00', 'Completed', '2022-02-25 14:09:18', '', 'test'),
(1, 9527128, '4P16845411298345R', 'Johndoe@personalemail.com', 'PHP', '300.00', 'Completed', '2022-02-25 15:48:48', '', 'test'),
(1, 5954494, '9YT09683EV596783B', 'Johndoe@personalemail.com', 'PHP', '300.00', 'Completed', '2022-02-28 14:59:34', 'avail', 'test'),
(1, 4863221, '1H326320UD4053729', 'Johndoe@personalemail.com', 'PHP', '300.00', 'Completed', '2022-02-28 15:07:09', 'avail', 'test');

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
(1, 'test', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3'),
(4, 'airline', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3');

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
(1, 'test'),
(2, 'test'),
(3, 'test'),
(4, 'test');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ship_detail`
--

CREATE TABLE `tbl_ship_detail` (
  `id` int(11) NOT NULL,
  `subscription_id` int(30) NOT NULL,
  `ship_name` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `ship_logo` longblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_ship_detail`
--

INSERT INTO `tbl_ship_detail` (`id`, `subscription_id`, `ship_name`, `email`, `ship_logo`) VALUES
(1, 1, 'test', 'manugasewinjames@gmail.com', NULL),
(3, 0, 'sample2', 'erwinjamesmanugas@gmail.com', NULL),
(4, 0, 'airline', 'erwinjamesmanugas@gmail.com', NULL);

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
(1, 'sample', 'sample', 'YES', '5000'),
(2, 'With Aircone', 'Higda', 'YES', '5000');

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
(1, 'lapu-lapu', 'lapu-lapu', 'olango', 'olango port');

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
(1, NULL, '2021-12-04 19:10:53'),
(2, NULL, '2021-12-04 19:12:32'),
(3, NULL, '2022-01-29 04:28:36'),
(4, NULL, '2022-02-12 04:58:29');

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
(1, '2022-02-23', '04:52 PM', 'lapu-lapu', 'lapu-lapu', 'olango', 'olango port');

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
(1, 'test', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3');

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
(1, 'test', 'test2@testing.com', 'test');

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
(1, NULL, '2021-12-10 06:12:22');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tckt`
--

CREATE TABLE `tbl_tckt` (
  `id` int(11) NOT NULL,
  `tckt_qty` varchar(100) NOT NULL,
  `tckt_stats` varchar(100) NOT NULL,
  `tckt_promo` text NOT NULL,
  `tckt_dscnt` text NOT NULL,
  `tckt_owner` text NOT NULL,
  `tckt_price` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_tckt`
--

INSERT INTO `tbl_tckt` (`id`, `tckt_qty`, `tckt_stats`, `tckt_promo`, `tckt_dscnt`, `tckt_owner`, `tckt_price`) VALUES
(4, '32', 'Open for Avail', '', '', 'test', 300),
(6, '2', 'open_fr_avail', 'h', 'd', 'test', 300),
(7, '2', 'open_fr_avail', '', '', 'test', 300),
(8, '8', 'Open For Reservation', 'd', 'a', 'test', 300),
(9, '6', 'Open For Reservation', 'l', 'h', 'test', 300);

-- --------------------------------------------------------

--
-- Table structure for table `user_subscriptions`
--

CREATE TABLE `user_subscriptions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 0,
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
  `payment_status` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `dates` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_subscriptions`
--

INSERT INTO `user_subscriptions` (`id`, `user_id`, `payment_method`, `validity`, `valid_from`, `valid_to`, `item_number`, `txn_id`, `payment_gross`, `currency_code`, `subscr_id`, `payer_email`, `payment_status`, `dates`) VALUES
(1, 0, 'paypal', 1, '2021-12-15 15:53:50', '2022-01-14 15:53:50', 'MS123456', '3BM06405GD8690126', 25.00, 'USD', 'I-44JBV7VDT0S1', 'sb-f9srf9117280@personal.example.com', 'Completed', '2022-02-13 20:16:54'),
(4, 0, 'paypal', 360, '2022-02-13 12:33:06', '2051-09-09 12:33:06', 'MS123456', '5G751735193990033', 9000.00, 'PHP', '', 'sb-f9srf9117280@personal.example.com', 'Completed', '2022-02-13 20:16:54');

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
-- Indexes for table `user_subscriptions`
--
ALTER TABLE `user_subscriptions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `tbl_passenger_reset_password`
--
ALTER TABLE `tbl_passenger_reset_password`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_ship_account`
--
ALTER TABLE `tbl_ship_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_ship_belong`
--
ALTER TABLE `tbl_ship_belong`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_ship_detail`
--
ALTER TABLE `tbl_ship_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_ship_schedule`
--
ALTER TABLE `tbl_ship_schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_staff_account`
--
ALTER TABLE `tbl_staff_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_staff_detail`
--
ALTER TABLE `tbl_staff_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_staff_reset_password`
--
ALTER TABLE `tbl_staff_reset_password`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_tckt`
--
ALTER TABLE `tbl_tckt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_subscriptions`
--
ALTER TABLE `user_subscriptions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
