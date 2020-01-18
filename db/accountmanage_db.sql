-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2020 at 05:34 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `accountmanage.db`
--

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` varchar(100) NOT NULL,
  `acl` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`, `acl`) VALUES
(2, 'members', 'Chief Operating Officer (COO)', '3,4'),
(5, 'admin', 'Administrator', '1,2,3,4'),
(6, 'Faruqe Ahammad', 'C.E.O Quiz Hub', NULL),
(7, 'CMO', 'Chief Marketing Officer (CMO)', NULL),
(8, 'QZH', 'RBT', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `menu_list`
--

CREATE TABLE `menu_list` (
  `id` int(11) NOT NULL,
  `group_id` varchar(255) DEFAULT '1' COMMENT 'comaseparate value',
  `menu_order` int(11) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `title` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `link` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `icon` varchar(30) DEFAULT NULL,
  `status` enum('Active','Inactive') DEFAULT 'Active',
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu_list`
--

INSERT INTO `menu_list` (`id`, `group_id`, `menu_order`, `parent_id`, `title`, `link`, `icon`, `status`, `create_at`, `update_at`) VALUES
(1, '5,6', 1, 0, 'Authentication', '#', 'feather icon-lock', 'Active', '2017-09-12 23:00:00', NULL),
(2, '5,6', 2, 0, 'Vendors', '#', 'feather icon-user-minus', 'Active', '2017-12-21 15:24:34', '0000-00-00 00:00:00'),
(3, '5,6', 2, 1, 'Admin Group', 'Auth/group', 'icon-user', 'Active', '2017-09-15 10:51:31', NULL),
(4, '5,6', 1, 1, 'Admin', 'Auth/user', 'icon-user', 'Active', '2017-09-15 16:49:52', NULL),
(5, '5', 1, 2, 'Vendor List', 'Vendor/vendor_list', 'fa fa-file-o', 'Active', '2017-09-15 16:49:52', NULL),
(6, '5', 1, 2, 'New Vendor', 'Vendor/add_vendor', 'fa fa-file-o', 'Active', '2019-12-14 16:49:52', NULL),
(7, '5,6', 3, 0, 'Clients', '#', 'feather icon-user-plus', 'Active', '2020-01-15 15:24:34', '0000-00-00 00:00:00'),
(8, '5', 1, 7, 'Client List', 'Clients/client_list', 'fa fa-file-o', 'Active', '2020-01-15 16:49:52', NULL),
(9, '5', 1, 7, 'New Client', 'Clients/add_client', 'fa fa-file-o', 'Active', '2020-01-15 16:49:52', NULL),
(10, '5,6', 4, 0, 'Settings', '#', 'feather icon-settings', 'Active', '2020-01-15 15:24:34', '0000-00-00 00:00:00'),
(11, '5', 1, 10, 'Account Head', 'Settings/account_head_list', 'fa fa-file-o', 'Active', '2020-01-15 16:49:52', NULL),
(12, '5,6', 5, 0, 'Received', '#', 'feather icon-pocket', 'Active', '2020-01-15 15:24:34', '0000-00-00 00:00:00'),
(13, '5', 1, 12, 'Received List', 'Received/received_list', 'fa fa-file-o', 'Active', '2020-01-15 16:49:52', NULL),
(14, '5', 2, 12, 'Received Info.', 'Received/add_received', 'fa fa-file-o', 'Active', '2020-01-15 16:49:52', NULL),
(15, '5,6', 5, 0, 'Payment', '#', 'feather icon-pocket', 'Active', '2020-01-15 15:24:34', '0000-00-00 00:00:00'),
(16, '5,6', 7, 0, 'Project', '#', 'feather icon-pocket', 'Active', '2020-01-15 15:24:34', '0000-00-00 00:00:00'),
(17, '5', 1, 16, 'Project List', 'Project/project_list', 'fa fa-file-o', 'Active', '2020-01-15 16:49:52', NULL),
(18, '5', 2, 16, 'New Project', 'Project/new_project', 'fa fa-file-o', 'Active', '2020-01-15 16:49:52', NULL),
(19, '5', 1, 15, 'Payment List', 'Payment/payment_list', 'fa fa-file-o', 'Active', '2020-01-15 16:49:52', NULL),
(20, '5', 2, 15, 'Payment Info.', 'Payment/add_payment', 'fa fa-file-o', 'Active', '2020-01-15 16:49:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `group_id` int(11) NOT NULL DEFAULT 2,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(254) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `create_by` int(11) NOT NULL,
  `image` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `group_id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `phone`, `create_by`, `image`) VALUES
(78, 5, '103.15.141.22', 'faruq@quizhub.com', '$2y$08$ubAkdvlyuVOySSc6EsYia.HRI5gDxEDFyJwHtP/PjfQ3lBAmhQftu', NULL, 'mukul@voucher.com', NULL, NULL, NULL, NULL, 1565368160, 1579364948, 1, 'Mizanur', 'Rahman', '+0195221826', 74, '2020011817161478.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(3078, 78, 5);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menus`
--

CREATE TABLE `user_access_menus` (
  `id` int(11) NOT NULL,
  `group_id` int(11) DEFAULT NULL,
  `menu_id` int(11) DEFAULT NULL,
  `can_add` tinyint(1) DEFAULT 0,
  `can_edit` tinyint(1) NOT NULL DEFAULT 0,
  `can_delete` tinyint(1) NOT NULL DEFAULT 0,
  `can_view` tinyint(1) NOT NULL DEFAULT 0,
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_access_menus`
--

INSERT INTO `user_access_menus` (`id`, `group_id`, `menu_id`, `can_add`, `can_edit`, `can_delete`, `can_view`, `create_at`, `update_at`, `created_by`) VALUES
(353396, 5, 1, NULL, 0, 0, 0, '2019-11-24 01:24:42', '0000-00-00 00:00:00', 0),
(353397, 5, 2, NULL, 0, 0, 0, '2019-11-24 01:24:42', '0000-00-00 00:00:00', 0),
(353398, 5, 4, 0, 0, 0, 0, '2019-11-24 01:24:42', '0000-00-00 00:00:00', 0),
(353399, 5, 5, 0, 0, 0, 0, '2019-11-24 01:24:42', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_records`
--

CREATE TABLE `user_access_records` (
  `id` int(10) NOT NULL,
  `user_id` int(11) NOT NULL,
  `login_time` varchar(20) NOT NULL,
  `logout_time` varchar(20) NOT NULL,
  `date` varchar(20) NOT NULL,
  `access_ip` varchar(20) NOT NULL,
  `random_number` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_login_attempt`
--

CREATE TABLE `user_login_attempt` (
  `id` int(11) NOT NULL,
  `ip_address` varchar(20) NOT NULL,
  `attempt_name` varchar(120) NOT NULL,
  `login_status` varchar(10) NOT NULL,
  `attempt_time` varchar(20) NOT NULL,
  `attempt_date` varchar(20) NOT NULL,
  `attempt_day` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_login_attempt`
--

INSERT INTO `user_login_attempt` (`id`, `ip_address`, `attempt_name`, `login_status`, `attempt_time`, `attempt_date`, `attempt_day`) VALUES
(1, '202.191.127.220', 'Not Found', 'Failed', '05:54:05 PM', '2018-10-17', 'Wednesday'),
(2, '202.126.123.153', 'Admin Baliadangi', 'Success', '05:54:35 PM', '2018-10-17', 'Wednesday'),
(3, '202.126.123.153', 'Admin Admin', 'Success', '06:29:24 PM', '2018-10-17', 'Wednesday'),
(4, '202.191.127.220', 'Admin Admin', 'Success', '06:42:39 PM', '2018-10-17', 'Wednesday'),
(5, '202.126.123.153', 'Admin Baliadangi', 'Success', '06:43:17 PM', '2018-10-17', 'Wednesday'),
(6, '202.126.123.153', 'Admin Baliadangi', 'Success', '06:51:50 PM', '2018-10-17', 'Wednesday'),
(7, '202.191.127.220', 'Admin Admin', 'Success', '08:15:10 PM', '2018-10-17', 'Wednesday'),
(8, '202.191.127.220', 'Admin Admin', 'Success', '08:51:31 PM', '2018-10-17', 'Wednesday'),
(9, '202.126.123.153', 'Admin Baliadangi', 'Success', '09:16:33 PM', '2018-10-17', 'Wednesday'),
(10, '202.191.127.220', 'Admin Admin', 'Success', '12:32:11 PM', '2018-10-18', 'Thursday'),
(11, '202.191.127.220', 'Admin Admin', 'Success', '01:13:59 PM', '2018-10-18', 'Thursday'),
(12, '202.191.127.220', 'Raju Ahmed', 'Success', '06:23:34 PM', '2018-10-18', 'Thursday'),
(13, '202.191.127.220', 'Admin Admin', 'Success', '06:43:04 PM', '2018-10-18', 'Thursday'),
(14, '202.191.127.220', 'Thakurgaon District', 'Success', '07:02:50 PM', '2018-10-18', 'Thursday'),
(15, '202.191.127.220', 'Admin Admin', 'Success', '07:03:10 PM', '2018-10-18', 'Thursday'),
(16, '202.191.127.220', 'Md. Liaz Mahamud', 'Success', '07:11:33 PM', '2018-10-18', 'Thursday'),
(17, '202.191.127.220', 'Admin Admin', 'Success', '07:17:49 PM', '2018-10-18', 'Thursday'),
(18, '202.191.127.220', 'Md. Liaz Mahamud', 'Success', '07:18:56 PM', '2018-10-18', 'Thursday'),
(19, '202.191.127.220', 'Admin Admin', 'Success', '07:19:15 PM', '2018-10-18', 'Thursday'),
(20, '202.191.127.220', 'Md. Liaz Mahamud', 'Success', '07:21:07 PM', '2018-10-18', 'Thursday'),
(21, '202.191.127.220', 'Admin Admin', 'Success', '07:22:48 PM', '2018-10-18', 'Thursday'),
(22, '202.191.127.220', 'Thakurgaon District', 'Success', '07:23:27 PM', '2018-10-18', 'Thursday'),
(23, '202.191.127.220', 'Md. Abdul Mannan', 'Success', '07:25:33 PM', '2018-10-18', 'Thursday'),
(24, '202.191.127.220', 'Admin Admin', 'Success', '07:28:18 PM', '2018-10-18', 'Thursday'),
(25, '202.191.127.220', 'Md. Liaz Mahamud', 'Success', '07:28:56 PM', '2018-10-18', 'Thursday'),
(26, '202.191.127.220', 'Admin Admin', 'Success', '07:29:20 PM', '2018-10-18', 'Thursday'),
(27, '202.191.127.220', 'Thakurgaon District', 'Success', '07:29:46 PM', '2018-10-18', 'Thursday'),
(28, '202.191.127.220', 'Admin Admin', 'Success', '07:33:10 PM', '2018-10-18', 'Thursday'),
(29, '103.230.106.45', 'Not Found', 'Failed', '06:22:52 PM', '2018-10-19', 'Friday'),
(30, '103.230.106.45', 'Admin Admin', 'Success', '06:23:11 PM', '2018-10-19', 'Friday'),
(31, '103.77.60.42', 'Admin Baliadangi', 'Success', '06:24:51 PM', '2018-10-19', 'Friday'),
(32, '103.230.104.38', 'Admin Admin', 'Success', '12:17:20 AM', '2018-10-21', 'Sunday'),
(33, '202.126.123.153', 'Not Found', 'Failed', '10:49:23 AM', '2018-10-21', 'Sunday'),
(34, '202.126.123.153', 'Admin Admin', 'Success', '10:49:35 AM', '2018-10-21', 'Sunday'),
(35, '202.191.127.220', 'Admin Admin', 'Success', '10:50:19 AM', '2018-10-21', 'Sunday'),
(36, '202.126.123.153', 'Admin Baliadangi', 'Success', '10:51:24 AM', '2018-10-21', 'Sunday'),
(37, '202.191.127.220', 'Admin Baliadangi', 'Success', '10:56:49 AM', '2018-10-21', 'Sunday'),
(38, '202.126.123.153', 'MD Shafiqul Islam', 'Success', '11:05:02 AM', '2018-10-21', 'Sunday'),
(39, '202.191.127.220', 'MD Shafiqul Islam', 'Success', '11:07:09 AM', '2018-10-21', 'Sunday'),
(40, '202.126.123.153', 'Admin Baliadangi', 'Success', '11:26:24 AM', '2018-10-21', 'Sunday'),
(41, '202.126.123.153', 'MD Shafiqul Islam', 'Success', '11:26:57 AM', '2018-10-21', 'Sunday'),
(42, '202.126.123.153', 'Adesh Roy', 'Success', '11:27:25 AM', '2018-10-21', 'Sunday'),
(43, '202.191.127.220', 'Admin Admin', 'Success', '11:29:12 AM', '2018-10-21', 'Sunday'),
(44, '202.191.127.220', 'MD Shafiqul Islam', 'Success', '11:30:57 AM', '2018-10-21', 'Sunday'),
(45, '202.191.127.220', 'Admin Admin', 'Success', '11:31:09 AM', '2018-10-21', 'Sunday'),
(46, '202.191.127.220', 'MD Shafiqul Islam', 'Success', '11:32:38 AM', '2018-10-21', 'Sunday'),
(47, '202.191.127.220', 'Admin Admin', 'Success', '11:34:59 AM', '2018-10-21', 'Sunday'),
(48, '202.191.127.220', 'Admin Admin', 'Success', '11:35:11 AM', '2018-10-21', 'Sunday'),
(49, '202.191.127.220', 'MD Shafiqul Islam', 'Success', '11:35:29 AM', '2018-10-21', 'Sunday'),
(50, '202.191.127.220', 'Adesh Roy', 'Success', '11:36:27 AM', '2018-10-21', 'Sunday'),
(51, '202.191.127.220', 'Admin Admin', 'Success', '11:36:44 AM', '2018-10-21', 'Sunday'),
(52, '202.191.127.220', 'ABM Sajedul Islam', 'Success', '11:37:12 AM', '2018-10-21', 'Sunday'),
(53, '202.191.127.220', 'Admin Admin', 'Success', '11:45:15 AM', '2018-10-21', 'Sunday'),
(54, '202.191.127.220', 'MD Shafiqul Islam', 'Success', '11:45:31 AM', '2018-10-21', 'Sunday'),
(55, '202.191.127.220', 'MD Shafiqul Islam', 'Success', '12:01:21 PM', '2018-10-21', 'Sunday'),
(56, '202.191.127.220', 'Admin Admin', 'Success', '12:02:09 PM', '2018-10-21', 'Sunday'),
(57, '202.191.127.220', 'ABM Sajedul Islam', 'Success', '12:02:33 PM', '2018-10-21', 'Sunday'),
(58, '202.191.127.220', 'MD Shafiqul Islam', 'Success', '12:02:50 PM', '2018-10-21', 'Sunday'),
(59, '202.126.123.153', 'Adesh Roy', 'Success', '12:04:00 PM', '2018-10-21', 'Sunday'),
(60, '202.126.123.153', 'MD Shafiqul Islam', 'Success', '12:04:57 PM', '2018-10-21', 'Sunday'),
(61, '202.191.127.220', 'Admin Admin', 'Success', '12:05:39 PM', '2018-10-21', 'Sunday'),
(62, '202.126.123.153', 'Admin Baliadangi', 'Success', '12:29:12 PM', '2018-10-21', 'Sunday'),
(63, '202.191.127.220', 'Admin Baliadangi', 'Success', '02:06:30 PM', '2018-10-21', 'Sunday'),
(64, '202.191.127.220', 'Admin Admin', 'Success', '02:09:59 PM', '2018-10-21', 'Sunday'),
(65, '202.191.127.220', 'Admin Baliadangi', 'Success', '02:10:56 PM', '2018-10-21', 'Sunday'),
(66, '202.191.127.220', 'Admin Baliadangi', 'Success', '02:18:29 PM', '2018-10-21', 'Sunday'),
(67, '202.191.127.220', 'Admin Admin', 'Success', '02:19:42 PM', '2018-10-21', 'Sunday'),
(68, '202.191.127.220', 'Admin Admin', 'Success', '02:20:29 PM', '2018-10-21', 'Sunday'),
(69, '202.191.127.220', 'Admin Baliadangi', 'Success', '02:21:17 PM', '2018-10-21', 'Sunday'),
(70, '202.191.127.220', 'Admin Admin', 'Success', '02:22:03 PM', '2018-10-21', 'Sunday'),
(71, '202.191.127.220', 'Admin Baliadangi', 'Success', '02:24:56 PM', '2018-10-21', 'Sunday'),
(72, '202.191.127.220', 'Admin Admin', 'Success', '02:25:38 PM', '2018-10-21', 'Sunday'),
(73, '202.191.127.220', 'Admin Baliadangi', 'Success', '02:30:08 PM', '2018-10-21', 'Sunday'),
(74, '202.191.127.220', 'Admin Admin', 'Success', '02:31:49 PM', '2018-10-21', 'Sunday'),
(75, '202.191.127.220', 'Admin Baliadangi', 'Success', '02:33:50 PM', '2018-10-21', 'Sunday'),
(76, '202.126.123.153', 'Adesh Roy', 'Success', '03:25:54 PM', '2018-10-21', 'Sunday'),
(77, '202.126.123.153', 'MD Shafiqul Islam', 'Success', '03:32:54 PM', '2018-10-21', 'Sunday'),
(78, '202.126.123.153', 'Admin Baliadangi', 'Success', '03:33:41 PM', '2018-10-21', 'Sunday'),
(79, '202.126.123.153', 'Admin Admin', 'Success', '03:37:43 PM', '2018-10-21', 'Sunday'),
(80, '202.126.123.153', 'Md. Liaz Mahamud', 'Success', '04:45:29 PM', '2018-10-21', 'Sunday'),
(81, '202.126.123.153', 'Md. Abdur Rahman', 'Success', '05:15:53 PM', '2018-10-21', 'Sunday'),
(82, '202.126.123.153', 'Md. Liaz Mahamud', 'Success', '05:16:39 PM', '2018-10-21', 'Sunday'),
(83, '202.126.123.153', 'Md. Abu Belal Siddik', 'Success', '06:19:51 PM', '2018-10-21', 'Sunday'),
(84, '202.126.123.153', 'Md. Abdur Rahman', 'Success', '06:21:54 PM', '2018-10-21', 'Sunday'),
(85, '202.126.123.153', 'Md. Abdul Mannan', 'Success', '06:22:36 PM', '2018-10-21', 'Sunday'),
(86, '202.126.123.153', 'Md Shamsul Alam', 'Success', '06:24:20 PM', '2018-10-21', 'Sunday'),
(87, '202.126.123.153', 'Md Masudur Rahman', 'Success', '06:25:06 PM', '2018-10-21', 'Sunday'),
(88, '202.126.123.153', 'Md Abdur Rahim', 'Success', '06:26:40 PM', '2018-10-21', 'Sunday'),
(89, '202.126.123.153', 'Dr. Md. Firoj Zamal', 'Success', '06:28:05 PM', '2018-10-21', 'Sunday'),
(90, '202.126.123.153', 'ABM Sajedul Islam', 'Success', '06:28:50 PM', '2018-10-21', 'Sunday'),
(91, '202.126.123.153', 'Md. Liaz Mahamud', 'Success', '06:48:03 PM', '2018-10-21', 'Sunday'),
(92, '202.126.123.153', 'ABM Sajedul Islam', 'Success', '06:51:29 PM', '2018-10-21', 'Sunday'),
(93, '202.126.123.153', 'Md. Liaz Mahamud', 'Success', '06:53:18 PM', '2018-10-21', 'Sunday'),
(94, '202.126.123.153', 'Md. Liaz Mahamud', 'Success', '06:53:24 PM', '2018-10-21', 'Sunday'),
(95, '202.126.123.153', 'Md. Abdur Rahman', 'Success', '06:55:25 PM', '2018-10-21', 'Sunday'),
(96, '202.126.123.153', 'Admin Baliadangi', 'Success', '07:05:33 PM', '2018-10-21', 'Sunday'),
(97, '202.126.123.153', 'Admin Baliadangi', 'Success', '07:07:26 PM', '2018-10-21', 'Sunday'),
(98, '202.126.123.153', 'Md. Sofiqul Islam', 'Success', '07:13:37 PM', '2018-10-21', 'Sunday'),
(99, '202.126.123.153', 'Admin Admin', 'Success', '07:30:02 PM', '2018-10-21', 'Sunday'),
(100, '202.126.123.153', 'Admin Admin', 'Success', '07:41:24 PM', '2018-10-21', 'Sunday'),
(101, '202.126.123.153', 'Md. Abdur Rahman', 'Success', '07:44:26 PM', '2018-10-21', 'Sunday'),
(102, '202.126.123.153', 'Md. Abdur Rahman', 'Success', '07:44:42 PM', '2018-10-21', 'Sunday'),
(103, '202.126.123.153', 'Admin Admin', 'Success', '08:07:58 PM', '2018-10-21', 'Sunday'),
(104, '202.126.123.153', 'Admin Baliadangi', 'Success', '08:08:15 PM', '2018-10-21', 'Sunday'),
(105, '202.126.123.153', 'ABM Sajedul Islam', 'Success', '08:10:35 PM', '2018-10-21', 'Sunday'),
(106, '202.126.123.153', 'Admin Admin', 'Success', '08:10:50 PM', '2018-10-21', 'Sunday'),
(107, '202.126.123.153', 'Adesh Roy', 'Success', '08:11:36 PM', '2018-10-21', 'Sunday'),
(108, '202.126.123.153', 'Admin Admin', 'Success', '08:11:47 PM', '2018-10-21', 'Sunday'),
(109, '202.126.123.153', 'Md. Sofiqul Islam', 'Success', '08:20:29 PM', '2018-10-21', 'Sunday'),
(110, '202.126.123.153', 'Admin Baliadangi', 'Success', '08:23:08 PM', '2018-10-21', 'Sunday'),
(111, '45.64.132.225', 'Not Found', 'Failed', '09:49:58 AM', '2018-10-22', 'Monday'),
(112, '45.64.132.225', 'Admin Baliadangi', 'Success', '09:50:10 AM', '2018-10-22', 'Monday'),
(113, '45.64.132.225', 'Md. Liaz Mahamud', 'Success', '09:52:11 AM', '2018-10-22', 'Monday'),
(114, '45.64.132.225', 'Not Found', 'Failed', '09:57:25 AM', '2018-10-22', 'Monday'),
(115, '45.64.132.225', 'Not Found', 'Failed', '09:57:42 AM', '2018-10-22', 'Monday'),
(116, '45.64.132.225', 'Not Found', 'Failed', '09:57:53 AM', '2018-10-22', 'Monday'),
(117, '45.64.132.225', 'Not Found', 'Failed', '09:58:18 AM', '2018-10-22', 'Monday'),
(118, '45.64.132.225', 'Not Found', 'Failed', '09:58:39 AM', '2018-10-22', 'Monday'),
(119, '45.64.132.225', 'Not Found', 'Failed', '09:59:08 AM', '2018-10-22', 'Monday'),
(120, '45.64.132.225', 'Not Found', 'Failed', '09:59:29 AM', '2018-10-22', 'Monday'),
(121, '45.64.132.225', 'Not Found', 'Failed', '09:59:56 AM', '2018-10-22', 'Monday'),
(122, '45.64.132.225', 'Not Found', 'Failed', '10:01:18 AM', '2018-10-22', 'Monday'),
(123, '45.64.132.225', 'Not Found', 'Failed', '10:01:43 AM', '2018-10-22', 'Monday'),
(124, '45.64.132.225', 'Md. Liaz Mahamud', 'Success', '10:02:08 AM', '2018-10-22', 'Monday'),
(125, '45.64.132.225', 'Admin Admin', 'Success', '10:06:30 AM', '2018-10-22', 'Monday'),
(126, '45.64.132.225', 'Not Found', 'Failed', '10:07:46 AM', '2018-10-22', 'Monday'),
(127, '45.64.132.225', 'Md. Liaz Mahamud', 'Success', '10:08:02 AM', '2018-10-22', 'Monday'),
(128, '45.64.132.225', 'Md. Liaz Mahamud', 'Failed', '10:14:17 AM', '2018-10-22', 'Monday'),
(129, '45.64.132.225', 'Admin Baliadangi', 'Success', '10:14:39 AM', '2018-10-22', 'Monday'),
(130, '45.64.132.225', 'Md. Liaz Mahamud', 'Success', '10:17:55 AM', '2018-10-22', 'Monday'),
(131, '45.64.132.225', 'Md Masudur Rahman', 'Success', '10:18:51 AM', '2018-10-22', 'Monday'),
(132, '45.64.132.225', 'Md Masudur Rahman', 'Success', '10:18:51 AM', '2018-10-22', 'Monday'),
(133, '45.64.132.225', 'Md. Sofiqul Islam', 'Success', '10:29:19 AM', '2018-10-22', 'Monday'),
(134, '45.64.132.225', 'Md. Abdur Rahman', 'Success', '12:01:05 PM', '2018-10-22', 'Monday'),
(135, '45.64.132.225', 'Md Masudur Rahman', 'Success', '12:47:39 PM', '2018-10-22', 'Monday'),
(136, '45.64.132.225', 'Not Found', 'Failed', '12:52:02 PM', '2018-10-22', 'Monday'),
(137, '45.64.132.225', 'Adesh Roy', 'Success', '12:52:20 PM', '2018-10-22', 'Monday'),
(138, '119.30.39.234', 'Admin Baliadangi', 'Success', '01:10:54 PM', '2018-10-22', 'Monday'),
(139, '103.230.104.49', 'Admin Admin', 'Success', '04:27:05 PM', '2018-10-22', 'Monday'),
(140, '103.230.104.49', 'Md. Abu Taleb', 'Success', '04:34:16 PM', '2018-10-22', 'Monday'),
(141, '103.230.104.49', 'Admin Admin', 'Success', '04:35:21 PM', '2018-10-22', 'Monday'),
(142, '103.230.104.49', 'Admin Admin', 'Success', '04:37:11 PM', '2018-10-22', 'Monday'),
(143, '103.230.104.49', 'Admin Admin', 'Success', '04:38:28 PM', '2018-10-22', 'Monday'),
(144, '103.230.104.49', 'Md. Abu Taleb', 'Success', '04:45:10 PM', '2018-10-22', 'Monday'),
(145, '103.230.104.49', 'Md. Khatibur Rahman', 'Success', '04:46:10 PM', '2018-10-22', 'Monday'),
(146, '103.230.104.49', 'Md. Sofiqul Islam', 'Success', '04:49:47 PM', '2018-10-22', 'Monday'),
(147, '103.230.104.49', 'MD. KUSUM UDDIN', 'Success', '04:53:10 PM', '2018-10-22', 'Monday'),
(148, '103.230.104.49', 'Md. Mosharaf Hossain', 'Success', '05:11:37 PM', '2018-10-22', 'Monday'),
(149, '103.230.104.49', 'Suvas Chandra Ghoosh', 'Success', '05:24:40 PM', '2018-10-22', 'Monday'),
(150, '202.191.127.220', 'Admin Admin', 'Success', '01:33:46 PM', '2018-10-23', 'Tuesday'),
(151, '202.191.127.220', 'Md. Sofiqul Islam', 'Success', '01:35:22 PM', '2018-10-23', 'Tuesday'),
(152, '202.191.127.220', 'Admin Admin', 'Success', '01:30:17 PM', '2018-10-24', 'Wednesday'),
(153, '202.191.127.220', 'Md. Abu Taleb', 'Success', '01:31:14 PM', '2018-10-24', 'Wednesday'),
(154, '202.191.127.220', 'Md. Khatibur Rahman', 'Success', '01:31:55 PM', '2018-10-24', 'Wednesday'),
(155, '202.191.127.220', 'Md. Nazrul Islam', 'Success', '01:32:23 PM', '2018-10-24', 'Wednesday'),
(156, '202.191.127.220', 'MD. FAIZUL ISLAM', 'Success', '01:32:53 PM', '2018-10-24', 'Wednesday'),
(157, '202.191.127.220', 'Md. Amirul Islam', 'Success', '01:33:47 PM', '2018-10-24', 'Wednesday'),
(158, '202.191.127.220', 'MD. MAKHSADUR RAHMAN', 'Success', '01:34:14 PM', '2018-10-24', 'Wednesday'),
(159, '202.191.127.220', 'Md. Abul Kasem', 'Success', '01:34:39 PM', '2018-10-24', 'Wednesday'),
(160, '202.191.127.220', 'Md. Mesbahul Islam', 'Success', '01:35:05 PM', '2018-10-24', 'Wednesday'),
(161, '202.191.127.220', 'Md. Abu Taleb', 'Success', '01:36:01 PM', '2018-10-24', 'Wednesday'),
(162, '202.191.127.220', 'Md. Mesbahul Islam', 'Success', '01:41:06 PM', '2018-10-24', 'Wednesday'),
(163, '202.191.127.220', 'Admin Admin', 'Success', '01:55:01 PM', '2018-10-24', 'Wednesday'),
(164, '202.191.127.220', 'Md. Liaz Mahamud', 'Success', '01:56:13 PM', '2018-10-24', 'Wednesday'),
(165, '202.191.127.220', 'Md. Liaz Mahamud', 'Success', '01:57:50 PM', '2018-10-24', 'Wednesday'),
(166, '202.191.127.220', 'Admin Admin', 'Success', '02:13:43 PM', '2018-10-24', 'Wednesday'),
(167, '202.191.127.220', 'Md. Sofiqul Islam', 'Success', '02:14:53 PM', '2018-10-24', 'Wednesday'),
(168, '202.191.127.220', 'Admin Admin', 'Success', '02:27:45 PM', '2018-10-24', 'Wednesday'),
(169, '202.126.123.153', 'Not Found', 'Failed', '02:55:27 PM', '2018-10-24', 'Wednesday'),
(170, '202.126.123.153', 'Admin Admin', 'Success', '02:55:37 PM', '2018-10-24', 'Wednesday'),
(171, '202.191.127.220', 'Md. Sofiqul Islam', 'Success', '03:14:56 PM', '2018-10-24', 'Wednesday'),
(172, '202.191.127.220', 'Adesh Roy', 'Success', '03:17:38 PM', '2018-10-24', 'Wednesday'),
(173, '202.126.123.153', 'Not Found', 'Failed', '05:36:39 PM', '2018-10-24', 'Wednesday'),
(174, '202.126.123.153', 'Admin Admin', 'Success', '05:36:48 PM', '2018-10-24', 'Wednesday'),
(175, '202.126.123.153', 'Not Found', 'Failed', '06:28:04 PM', '2018-10-24', 'Wednesday'),
(176, '202.126.123.153', 'Admin Admin', 'Success', '06:28:19 PM', '2018-10-24', 'Wednesday'),
(177, '202.126.123.153', 'Not Found', 'Failed', '07:08:05 PM', '2018-10-24', 'Wednesday'),
(178, '202.126.123.153', 'Admin Admin', 'Success', '07:08:16 PM', '2018-10-24', 'Wednesday'),
(179, '202.126.123.153', 'Admin Admin', 'Success', '11:06:17 AM', '2018-10-25', 'Thursday'),
(180, '202.126.123.153', 'Admin Admin', 'Success', '11:14:37 AM', '2018-10-25', 'Thursday'),
(181, '202.126.123.153', 'Md. Sofiqul Islam', 'Success', '11:15:19 AM', '2018-10-25', 'Thursday'),
(182, '202.126.123.153', 'Not Found', 'Failed', '12:24:00 PM', '2018-10-25', 'Thursday'),
(183, '202.126.123.153', 'Md. Sofiqul Islam', 'Success', '12:24:14 PM', '2018-10-25', 'Thursday'),
(184, '202.126.123.153', 'Not Found', 'Failed', '12:33:27 PM', '2018-10-25', 'Thursday'),
(185, '202.126.123.153', 'Admin Admin', 'Success', '12:33:40 PM', '2018-10-25', 'Thursday'),
(186, '202.126.123.153', 'Admin Admin', 'Success', '02:38:32 PM', '2018-10-25', 'Thursday'),
(187, '202.191.127.220', 'Admin Admin', 'Success', '02:40:19 PM', '2018-10-25', 'Thursday'),
(188, '202.191.127.220', 'MD. JAHANGIR ALAM', 'Success', '02:52:00 PM', '2018-10-25', 'Thursday'),
(189, '202.126.123.153', 'Md. Sofiqul Islam', 'Success', '03:15:36 PM', '2018-10-25', 'Thursday'),
(190, '202.191.127.220', 'MD. JAHANGIR ALAM', 'Success', '03:37:48 PM', '2018-10-25', 'Thursday'),
(191, '202.126.123.153', 'Not Found', 'Failed', '07:10:02 PM', '2018-10-25', 'Thursday'),
(192, '202.126.123.153', 'Not Found', 'Failed', '07:10:17 PM', '2018-10-25', 'Thursday'),
(193, '202.126.123.153', 'Admin Admin', 'Success', '07:10:28 PM', '2018-10-25', 'Thursday'),
(194, '202.126.123.153', 'Md. Sofiqul Islam', 'Success', '10:47:19 AM', '2018-10-27', 'Saturday'),
(195, '103.87.212.183', 'Admin Admin', 'Success', '10:51:24 AM', '2018-10-27', 'Saturday'),
(196, '202.126.123.153', 'Md. Sofiqul Islam', 'Success', '10:52:19 AM', '2018-10-27', 'Saturday'),
(197, '202.126.123.153', 'Admin Admin', 'Success', '10:52:43 AM', '2018-10-27', 'Saturday'),
(198, '103.87.212.183', 'Md. Sofiqul Islam', 'Success', '10:53:12 AM', '2018-10-27', 'Saturday'),
(199, '103.87.212.183', 'Md. Liaz Mahamud', 'Success', '11:02:46 AM', '2018-10-27', 'Saturday'),
(200, '202.126.123.153', 'Admin Admin', 'Success', '11:58:02 AM', '2018-10-27', 'Saturday'),
(201, '202.126.123.153', 'Not Found', 'Failed', '02:01:37 PM', '2018-10-27', 'Saturday'),
(202, '202.126.123.153', 'Admin Admin', 'Success', '02:01:47 PM', '2018-10-27', 'Saturday'),
(203, '202.191.127.220', 'Admin Admin', 'Success', '03:20:44 PM', '2018-10-27', 'Saturday'),
(204, '202.191.127.220', 'MD. JAHANGIR ALAM', 'Success', '03:28:56 PM', '2018-10-27', 'Saturday'),
(205, '202.191.127.220', 'MD. JAHANGIR ALAM', 'Success', '03:31:12 PM', '2018-10-27', 'Saturday'),
(206, '202.126.123.153', 'Not Found', 'Failed', '03:32:07 PM', '2018-10-27', 'Saturday'),
(207, '202.126.123.153', 'Admin Admin', 'Success', '04:46:54 PM', '2018-10-27', 'Saturday'),
(208, '202.191.127.220', 'Md. Sofiqul Islam', 'Success', '06:29:29 PM', '2018-10-27', 'Saturday'),
(209, '202.126.123.153', 'Md. Sofiqul Islam', 'Success', '06:30:23 PM', '2018-10-27', 'Saturday'),
(210, '202.191.127.220', 'Md. Sofiqul Islam', 'Success', '06:49:40 PM', '2018-10-27', 'Saturday'),
(211, '202.126.123.153', 'Md. Sofiqul Islam', 'Success', '06:51:27 PM', '2018-10-27', 'Saturday'),
(212, '202.126.123.153', 'Admin Admin', 'Success', '11:56:52 AM', '2018-10-28', 'Sunday'),
(213, '202.126.123.153', 'Admin Admin', 'Success', '01:24:05 PM', '2018-10-28', 'Sunday'),
(214, '202.191.127.220', 'Admin Admin', 'Success', '02:00:29 PM', '2018-10-28', 'Sunday'),
(215, '202.191.127.220', 'Md. Sofiqul Islam', 'Success', '02:05:51 PM', '2018-10-28', 'Sunday'),
(216, '202.126.123.153', 'Admin Admin', 'Success', '02:52:20 PM', '2018-10-28', 'Sunday'),
(217, '202.126.123.153', 'ABM Sajedul Islam', 'Success', '03:15:17 PM', '2018-10-28', 'Sunday'),
(218, '202.126.123.153', 'Not Found', 'Failed', '03:16:38 PM', '2018-10-28', 'Sunday'),
(219, '202.126.123.153', 'Admin Admin', 'Success', '03:18:08 PM', '2018-10-28', 'Sunday'),
(220, '202.126.123.153', 'Md Masudur Rahman', 'Success', '03:19:31 PM', '2018-10-28', 'Sunday'),
(221, '202.191.127.220', 'MD Shafiqul Islam', 'Success', '03:50:44 PM', '2018-10-28', 'Sunday'),
(222, '202.191.127.220', 'Md Shamsul Alam', 'Success', '03:51:21 PM', '2018-10-28', 'Sunday'),
(223, '202.191.127.220', 'Md. Abdur Rahman', 'Success', '03:54:33 PM', '2018-10-28', 'Sunday'),
(224, '202.191.127.220', 'Md. Abu Belal Siddik', 'Success', '03:58:29 PM', '2018-10-28', 'Sunday'),
(225, '202.191.127.220', 'Md. Liaz Mahamud', 'Success', '03:59:39 PM', '2018-10-28', 'Sunday'),
(226, '202.126.123.153', 'Admin Admin', 'Success', '04:09:24 PM', '2018-10-28', 'Sunday'),
(227, '202.126.123.153', 'Md Masudur Rahman', 'Success', '04:39:16 PM', '2018-10-28', 'Sunday'),
(228, '202.126.123.153', 'Md Masudur Rahman', 'Success', '04:43:07 PM', '2018-10-28', 'Sunday'),
(229, '202.126.123.153', 'Admin Admin', 'Success', '05:01:44 PM', '2018-10-28', 'Sunday'),
(230, '202.126.123.153', 'Md Masudur Rahman', 'Success', '05:06:34 PM', '2018-10-28', 'Sunday'),
(231, '202.126.123.153', 'Admin Admin', 'Success', '06:01:17 PM', '2018-10-28', 'Sunday'),
(232, '202.126.123.153', 'Md. Sofiqul Islam', 'Success', '06:30:47 PM', '2018-10-28', 'Sunday'),
(233, '202.191.127.220', 'Md. Sofiqul Islam', 'Success', '06:31:45 PM', '2018-10-28', 'Sunday'),
(234, '202.126.123.153', 'Md. Sofiqul Islam', 'Success', '06:48:52 PM', '2018-10-28', 'Sunday'),
(235, '202.126.123.153', 'Md. Sofiqul Islam', 'Success', '06:50:03 PM', '2018-10-28', 'Sunday'),
(236, '202.126.123.153', 'Md. Sofiqul Islam', 'Success', '07:02:22 PM', '2018-10-28', 'Sunday'),
(237, '202.191.127.220', 'Md Shamsul Alam', 'Success', '07:27:54 PM', '2018-10-28', 'Sunday'),
(238, '202.126.123.153', 'Md Shamsul Alam', 'Success', '07:29:47 PM', '2018-10-28', 'Sunday'),
(239, '119.30.32.128', 'Md. Solaiman Ali', 'Success', '11:36:30 PM', '2018-10-28', 'Sunday'),
(240, '202.126.123.153', 'Md. Sofiqul Islam', 'Success', '10:57:30 AM', '2018-10-29', 'Monday'),
(241, '202.126.123.153', 'Dr. Md. Firoj Zamal', 'Success', '10:58:41 AM', '2018-10-29', 'Monday'),
(242, '202.126.123.153', 'Admin Admin', 'Success', '10:59:16 AM', '2018-10-29', 'Monday'),
(243, '202.126.123.153', 'Md Shamsul Alam', 'Success', '11:01:25 AM', '2018-10-29', 'Monday'),
(244, '202.126.123.153', 'Md. Sofiqul Islam', 'Success', '02:24:04 PM', '2018-10-29', 'Monday'),
(245, '103.87.212.191', 'Admin Admin', 'Success', '02:36:24 PM', '2018-10-29', 'Monday'),
(246, '103.87.212.191', 'Md. Sofiqul Islam', 'Success', '02:39:51 PM', '2018-10-29', 'Monday'),
(247, '202.126.123.153', 'Not Found', 'Failed', '02:51:42 PM', '2018-10-29', 'Monday'),
(248, '202.126.123.153', 'Admin Admin', 'Success', '02:51:52 PM', '2018-10-29', 'Monday'),
(249, '202.126.123.153', 'Dr. Md. Firoj Zamal', 'Success', '02:56:50 PM', '2018-10-29', 'Monday'),
(250, '202.126.123.153', 'Md Masudur Rahman', 'Success', '03:12:20 PM', '2018-10-29', 'Monday'),
(251, '202.126.123.153', 'Admin Admin', 'Success', '04:15:29 PM', '2018-10-29', 'Monday'),
(252, '202.126.123.153', 'Md Masudur Rahman', 'Success', '05:04:10 PM', '2018-10-29', 'Monday'),
(253, '202.126.123.153', 'Md Masudur Rahman', 'Success', '05:26:12 PM', '2018-10-29', 'Monday'),
(254, '202.126.123.153', 'Admin Admin', 'Success', '06:27:56 PM', '2018-10-29', 'Monday'),
(255, '163.47.156.99', 'Not Found', 'Failed', '09:28:30 AM', '2018-10-30', 'Tuesday'),
(256, '163.47.156.99', 'Admin Baliadangi', 'Success', '09:28:39 AM', '2018-10-30', 'Tuesday'),
(257, '202.126.123.153', 'Md Masudur Rahman', 'Success', '11:38:15 AM', '2018-10-30', 'Tuesday'),
(258, '202.191.127.220', 'Admin Admin', 'Success', '02:35:50 PM', '2018-10-30', 'Tuesday'),
(259, '202.191.127.220', 'Md Masudur Rahman', 'Success', '02:37:01 PM', '2018-10-30', 'Tuesday'),
(260, '202.191.127.220', 'Admin Admin', 'Success', '03:27:40 PM', '2018-10-30', 'Tuesday'),
(261, '202.191.127.220', 'Md. Sofiqul Islam', 'Success', '04:11:51 PM', '2018-10-30', 'Tuesday'),
(262, '202.191.127.220', 'Md. Sofiqul Islam', 'Success', '04:21:42 PM', '2018-10-30', 'Tuesday'),
(263, '202.191.127.220', 'Md Shamsul Alam', 'Success', '05:01:55 PM', '2018-10-30', 'Tuesday'),
(264, '202.191.127.220', 'Md. Abdur Rahman', 'Success', '05:05:12 PM', '2018-10-30', 'Tuesday'),
(265, '202.191.127.220', 'Md Masudur Rahman', 'Success', '05:18:31 PM', '2018-10-30', 'Tuesday'),
(266, '202.191.127.220', 'Md. Sofiqul Islam', 'Success', '05:34:54 PM', '2018-10-30', 'Tuesday'),
(267, '202.191.127.220', 'MD. ABDUL QUDDUS', 'Success', '05:40:46 PM', '2018-10-30', 'Tuesday'),
(268, '202.191.127.220', 'MD. JAHANGIR ALAM', 'Success', '06:03:40 PM', '2018-10-30', 'Tuesday'),
(269, '202.191.127.220', 'Dr. T. M. MAHBUBOR RAHMAN', 'Success', '06:08:45 PM', '2018-10-30', 'Tuesday'),
(270, '202.191.127.220', 'SUBODH CHANDRA BARMAN', 'Success', '06:13:58 PM', '2018-10-30', 'Tuesday'),
(271, '202.191.127.220', 'SUBODH CHANDRA BARMAN', 'Success', '06:27:05 PM', '2018-10-30', 'Tuesday'),
(272, '202.191.127.220', 'Md. Liaz Mahamud', 'Success', '06:48:46 PM', '2018-10-30', 'Tuesday'),
(273, '202.191.127.220', 'Md. Abdur Rahman', 'Success', '06:55:52 PM', '2018-10-30', 'Tuesday'),
(274, '202.191.127.220', 'Md Shamsul Alam', 'Success', '06:58:46 PM', '2018-10-30', 'Tuesday'),
(275, '202.191.127.220', 'Ganesh Singha', 'Success', '07:13:05 PM', '2018-10-30', 'Tuesday'),
(276, '202.191.127.220', 'Md. Abdur Rahman', 'Success', '07:22:35 PM', '2018-10-30', 'Tuesday'),
(277, '202.191.127.220', 'Md. Abu Belal Siddik', 'Success', '07:38:06 PM', '2018-10-30', 'Tuesday'),
(278, '202.191.127.220', 'Admin Admin', 'Success', '08:14:00 PM', '2018-10-30', 'Tuesday'),
(279, '202.191.127.220', 'Admin Admin', 'Success', '10:03:13 AM', '2018-10-31', 'Wednesday'),
(280, '202.191.127.220', 'Admin Admin', 'Success', '11:31:25 AM', '2018-10-31', 'Wednesday'),
(281, '202.191.127.220', 'Admin Admin', 'Success', '01:06:42 PM', '2018-10-31', 'Wednesday'),
(282, '202.191.127.220', 'Admin Baliadangi', 'Success', '02:15:23 PM', '2018-10-31', 'Wednesday'),
(283, '202.191.127.220', 'Md Masudur Rahman', 'Success', '02:39:30 PM', '2018-10-31', 'Wednesday'),
(284, '202.191.127.220', 'Admin Baliadangi', 'Success', '03:01:11 PM', '2018-10-31', 'Wednesday'),
(285, '202.191.127.220', 'Admin Admin', 'Success', '03:02:42 PM', '2018-10-31', 'Wednesday'),
(286, '202.191.127.220', 'Md Masudur Rahman', 'Success', '03:29:11 PM', '2018-10-31', 'Wednesday'),
(287, '202.191.127.220', 'Md. Sofiqul Islam', 'Success', '04:38:13 PM', '2018-10-31', 'Wednesday'),
(288, '202.191.127.220', 'Admin Admin', 'Success', '06:15:17 PM', '2018-10-31', 'Wednesday'),
(289, '202.191.127.220', 'Md Shamsul Alam', 'Success', '06:34:12 PM', '2018-10-31', 'Wednesday'),
(290, '202.191.127.220', 'Md. Abu Belal Siddik', 'Success', '06:42:44 PM', '2018-10-31', 'Wednesday'),
(291, '202.191.127.220', 'ABM Sajedul Islam', 'Success', '06:51:56 PM', '2018-10-31', 'Wednesday'),
(292, '202.191.127.220', 'Md Abdur Rahim', 'Success', '06:55:24 PM', '2018-10-31', 'Wednesday'),
(293, '202.191.127.220', 'Md Shamsul Alam', 'Success', '07:31:35 PM', '2018-10-31', 'Wednesday'),
(294, '119.30.32.122', 'Md. Sofiqul Islam', 'Success', '09:40:28 AM', '2018-11-01', 'Thursday'),
(295, '103.87.212.191', 'Admin Admin', 'Success', '01:32:49 PM', '2018-11-01', 'Thursday'),
(296, '163.47.156.99', 'Admin Baliadangi', 'Success', '02:40:49 PM', '2018-11-01', 'Thursday'),
(297, '103.87.212.163', 'Admin Admin', 'Success', '11:05:34 AM', '2018-11-04', 'Sunday'),
(298, '202.126.123.153', 'Not Found', 'Failed', '12:26:37 PM', '2018-11-06', 'Tuesday'),
(299, '202.126.123.153', 'Admin Admin', 'Success', '12:26:47 PM', '2018-11-06', 'Tuesday'),
(300, '202.126.123.153', 'Admin Admin', 'Success', '01:27:06 PM', '2018-11-06', 'Tuesday'),
(301, '119.30.32.175', 'MD. KUSUM UDDIN', 'Success', '01:41:03 PM', '2018-11-06', 'Tuesday'),
(302, '202.126.123.153', 'Admin Admin', 'Success', '01:53:01 PM', '2018-11-06', 'Tuesday'),
(303, '202.126.123.153', 'Admin Admin', 'Success', '02:03:26 PM', '2018-11-06', 'Tuesday'),
(304, '202.126.123.153', 'Md Masudur Rahman', 'Success', '02:25:27 PM', '2018-11-06', 'Tuesday'),
(305, '202.126.123.153', 'Admin Admin', 'Success', '02:26:00 PM', '2018-11-06', 'Tuesday'),
(306, '202.126.123.153', 'Admin Admin', 'Success', '02:30:27 PM', '2018-11-06', 'Tuesday'),
(307, '202.126.123.153', 'Md Masudur Rahman', 'Success', '02:31:44 PM', '2018-11-06', 'Tuesday'),
(308, '202.126.123.153', 'Admin Admin', 'Success', '02:33:20 PM', '2018-11-06', 'Tuesday'),
(309, '202.126.123.153', 'Admin Admin', 'Success', '02:36:36 PM', '2018-11-06', 'Tuesday'),
(310, '202.126.123.153', 'Md Masudur Rahman', 'Success', '02:36:56 PM', '2018-11-06', 'Tuesday'),
(311, '202.126.123.153', 'Admin Admin', 'Success', '02:37:35 PM', '2018-11-06', 'Tuesday'),
(312, '103.77.60.42', 'Md. Abdur Rahman', 'Success', '04:36:10 PM', '2018-11-06', 'Tuesday'),
(313, '202.126.123.153', 'Admin Admin', 'Success', '04:39:04 PM', '2018-11-06', 'Tuesday'),
(314, '103.230.107.15', 'Admin Baliadangi', 'Success', '06:40:25 PM', '2018-11-06', 'Tuesday'),
(315, '103.87.212.163', 'Admin Admin', 'Success', '05:02:54 PM', '2018-11-10', 'Saturday'),
(316, '103.87.212.171', 'Admin Baliadangi', 'Success', '12:03:09 PM', '2018-11-11', 'Sunday'),
(317, '103.87.212.171', 'Admin Baliadangi', 'Success', '12:15:22 PM', '2018-11-11', 'Sunday'),
(318, '103.87.212.171', 'Admin Admin', 'Success', '12:26:58 PM', '2018-11-11', 'Sunday'),
(319, '103.87.212.171', 'Admin Admin', 'Success', '12:29:06 PM', '2018-11-11', 'Sunday'),
(320, '103.87.212.171', 'Admin Baliadangi', 'Success', '12:33:52 PM', '2018-11-11', 'Sunday'),
(321, '202.191.127.220', 'Admin Admin', 'Success', '02:30:08 PM', '2018-11-11', 'Sunday'),
(322, '202.191.127.220', 'Admin Admin', 'Success', '02:32:45 PM', '2018-11-11', 'Sunday'),
(323, '202.191.127.220', 'Admin Baliadangi', 'Success', '02:33:50 PM', '2018-11-11', 'Sunday'),
(324, '103.87.212.171', 'Admin Admin', 'Success', '04:39:41 PM', '2018-11-11', 'Sunday'),
(325, '103.87.212.171', 'MD Shafiqul Islam', 'Success', '04:42:51 PM', '2018-11-11', 'Sunday'),
(326, '103.87.212.171', 'MD Shafiqul Islam', 'Success', '04:55:45 PM', '2018-11-11', 'Sunday'),
(327, '103.87.212.171', 'Md Shamsul Alam', 'Success', '04:59:48 PM', '2018-11-11', 'Sunday'),
(328, '103.87.212.171', 'Md. Abdur Rahman', 'Success', '05:03:26 PM', '2018-11-11', 'Sunday'),
(329, '103.87.212.171', 'Md. Abu Belal Siddik', 'Success', '05:05:04 PM', '2018-11-11', 'Sunday'),
(330, '103.87.212.171', 'ABM Sajedul Islam', 'Success', '05:08:33 PM', '2018-11-11', 'Sunday'),
(331, '103.87.212.171', 'Md. Liaz Mahamud', 'Success', '05:17:13 PM', '2018-11-11', 'Sunday'),
(332, '103.87.212.171', 'Md Shahinur Alam', 'Success', '05:26:00 PM', '2018-11-11', 'Sunday'),
(333, '103.87.212.171', 'Md. Liaz Mahamud', 'Success', '05:26:35 PM', '2018-11-11', 'Sunday'),
(334, '103.87.212.171', 'Md Masudur Rahman', 'Success', '05:27:14 PM', '2018-11-11', 'Sunday'),
(335, '103.87.212.171', 'Thakurgaon District', 'Success', '05:29:13 PM', '2018-11-11', 'Sunday'),
(336, '103.87.212.171', 'Md. Abdul Mannan', 'Success', '05:32:28 PM', '2018-11-11', 'Sunday'),
(337, '103.87.212.171', 'Access to Information Prime Minister\'s Office', 'Success', '05:34:26 PM', '2018-11-11', 'Sunday'),
(338, '103.87.212.171', 'Admin Admin', 'Success', '05:54:23 PM', '2018-11-11', 'Sunday'),
(339, '103.87.212.171', 'Md. Sofiqul Islam', 'Success', '05:55:20 PM', '2018-11-11', 'Sunday'),
(340, '103.87.212.171', 'Md. Abul Kasem', 'Success', '05:56:12 PM', '2018-11-11', 'Sunday'),
(341, '45.114.88.217', 'Md Shahinur Alam', 'Success', '12:34:54 AM', '2018-11-12', 'Monday'),
(342, '45.114.88.217', 'ABM Sajedul Islam', 'Success', '01:00:30 AM', '2018-11-12', 'Monday'),
(343, '45.114.88.217', 'Md. Abdur Rahman', 'Success', '01:06:59 AM', '2018-11-12', 'Monday'),
(344, '45.114.88.217', 'Admin Baliadangi', 'Success', '01:09:17 AM', '2018-11-12', 'Monday'),
(345, '45.114.88.196', 'Not Found', 'Failed', '08:54:38 AM', '2018-11-12', 'Monday'),
(346, '45.114.88.196', 'Md. Sofiqul Islam', 'Success', '08:55:09 AM', '2018-11-12', 'Monday'),
(347, '45.114.88.196', 'Admin Baliadangi', 'Success', '08:55:45 AM', '2018-11-12', 'Monday'),
(348, '45.114.88.196', 'Dr. T. M. MAHBUBOR RAHMAN', 'Success', '08:58:01 AM', '2018-11-12', 'Monday'),
(349, '45.114.88.196', 'Admin Baliadangi', 'Success', '08:59:03 AM', '2018-11-12', 'Monday'),
(350, '45.114.88.196', 'MD. JAHANGIR ALAM', 'Success', '09:01:05 AM', '2018-11-12', 'Monday'),
(351, '45.114.88.196', 'Md Masudur Rahman', 'Success', '09:18:56 AM', '2018-11-12', 'Monday'),
(352, '45.114.88.196', 'Md. Abdur Rahman', 'Success', '09:30:14 AM', '2018-11-12', 'Monday'),
(353, '45.114.88.196', 'Md. Abu Belal Siddik', 'Success', '09:38:31 AM', '2018-11-12', 'Monday'),
(354, '45.114.88.196', 'ABM Sajedul Islam', 'Success', '09:39:37 AM', '2018-11-12', 'Monday'),
(355, '45.114.88.196', 'MD. JAHANGIR ALAM', 'Success', '09:40:56 AM', '2018-11-12', 'Monday'),
(356, '37.111.233.118', 'Not Found', 'Failed', '11:17:08 AM', '2018-11-13', 'Tuesday'),
(357, '37.111.233.118', 'Not Found', 'Failed', '11:18:09 AM', '2018-11-13', 'Tuesday'),
(358, '37.111.233.118', 'Not Found', 'Failed', '11:19:07 AM', '2018-11-13', 'Tuesday'),
(359, '37.111.233.118', 'Not Found', 'Failed', '11:20:54 AM', '2018-11-13', 'Tuesday'),
(360, '37.111.201.248', 'Not Found', 'Failed', '11:22:27 AM', '2018-11-13', 'Tuesday'),
(361, '37.111.201.248', 'Not Found', 'Failed', '11:23:27 AM', '2018-11-13', 'Tuesday'),
(362, '37.111.233.118', 'MD. Khorshed Alam', 'Success', '11:24:16 AM', '2018-11-13', 'Tuesday'),
(363, '37.111.233.118', 'MD. Khorshed Alam', 'Success', '11:27:58 AM', '2018-11-13', 'Tuesday'),
(364, '45.64.132.225', 'Md Masudur Rahman', 'Success', '01:05:34 PM', '2018-11-13', 'Tuesday'),
(365, '103.102.252.230', 'Admin Baliadangi', 'Success', '10:18:47 AM', '2018-11-15', 'Thursday'),
(366, '202.126.123.153', 'Admin Admin', 'Success', '05:13:55 PM', '2018-11-15', 'Thursday'),
(367, '103.87.212.171', 'Admin Admin', 'Success', '06:25:17 PM', '2018-11-15', 'Thursday'),
(368, '103.87.212.171', 'Md. Abdur Rahman', 'Success', '06:28:53 PM', '2018-11-15', 'Thursday'),
(369, '202.126.123.153', 'Admin Admin', 'Success', '06:38:26 PM', '2018-11-15', 'Thursday'),
(370, '202.126.123.153', 'Md. Abdur Rahman', 'Success', '06:38:44 PM', '2018-11-15', 'Thursday'),
(371, '103.87.212.171', 'Admin Admin', 'Success', '06:51:22 PM', '2018-11-15', 'Thursday'),
(372, '103.87.212.171', 'Md. Abdur Rahman', 'Success', '06:52:58 PM', '2018-11-15', 'Thursday'),
(373, '202.126.123.153', 'Admin Admin', 'Success', '06:53:36 PM', '2018-11-15', 'Thursday'),
(374, '119.30.32.199', 'MD. Khorshed Alam', 'Success', '12:54:54 PM', '2018-11-16', 'Friday'),
(375, '27.147.203.22', 'Admin Admin', 'Success', '07:27:17 PM', '2018-11-17', 'Saturday'),
(376, '27.147.203.22', 'Admin Admin', 'Success', '08:56:59 PM', '2018-11-17', 'Saturday'),
(377, '103.230.105.47', 'Md. Abdur Rahman', 'Success', '03:13:56 PM', '2018-11-18', 'Sunday'),
(378, '202.126.123.153', 'Admin Admin', 'Success', '05:12:42 PM', '2018-11-18', 'Sunday'),
(379, '202.126.123.153', 'Admin Admin', 'Success', '05:13:39 PM', '2018-11-18', 'Sunday'),
(380, '103.230.105.47', 'Admin Baliadangi', 'Success', '05:17:47 PM', '2018-11-18', 'Sunday'),
(381, '103.230.105.47', 'Md. Abdur Rahman', 'Success', '05:19:48 PM', '2018-11-18', 'Sunday'),
(382, '103.230.105.47', 'Admin Baliadangi', 'Success', '05:50:06 PM', '2018-11-18', 'Sunday'),
(383, '107.167.108.85', 'Not Found', 'Failed', '11:03:51 AM', '2018-11-19', 'Monday'),
(384, '107.167.108.85', 'Not Found', 'Failed', '11:04:16 AM', '2018-11-19', 'Monday'),
(385, '107.167.108.85', 'Not Found', 'Failed', '11:05:48 AM', '2018-11-19', 'Monday'),
(386, '107.167.108.85', 'Not Found', 'Failed', '11:06:49 AM', '2018-11-19', 'Monday'),
(387, '107.167.108.85', 'Not Found', 'Failed', '11:08:18 AM', '2018-11-19', 'Monday'),
(388, '103.230.104.48', 'Admin Baliadangi', 'Success', '09:02:08 AM', '2018-11-20', 'Tuesday'),
(389, '103.230.104.48', 'Not Found', 'Failed', '09:04:10 AM', '2018-11-20', 'Tuesday'),
(390, '103.230.104.48', 'Not Found', 'Failed', '09:04:51 AM', '2018-11-20', 'Tuesday'),
(391, '103.230.104.48', 'Admin Admin', 'Success', '09:05:22 AM', '2018-11-20', 'Tuesday'),
(392, '103.230.104.48', 'Admin Baliadangi', 'Success', '09:12:41 AM', '2018-11-20', 'Tuesday'),
(393, '119.30.38.74', 'Md. Abdul Ali', 'Success', '11:42:23 AM', '2018-11-20', 'Tuesday'),
(394, '37.111.201.252', 'Not Found', 'Failed', '12:12:19 PM', '2018-11-20', 'Tuesday'),
(395, '37.111.201.252', 'Md. Paygam Ali', 'Success', '12:16:25 PM', '2018-11-20', 'Tuesday'),
(396, '202.126.123.153', 'Admin Admin', 'Success', '07:58:29 PM', '2018-11-20', 'Tuesday'),
(397, '103.230.104.47', 'Not Found', 'Failed', '09:10:15 PM', '2018-11-20', 'Tuesday'),
(398, '103.230.104.47', 'Admin Baliadangi', 'Success', '09:10:33 PM', '2018-11-20', 'Tuesday'),
(399, '119.30.39.192', 'MD. MAKHSADUR RAHMAN', 'Success', '07:29:50 PM', '2018-11-21', 'Wednesday'),
(400, '119.30.35.224', 'Md. Abul Kalam Azad', 'Success', '12:31:01 PM', '2018-11-22', 'Thursday'),
(401, '103.77.60.42', 'Admin Baliadangi', 'Success', '08:31:47 PM', '2018-11-24', 'Saturday'),
(402, '103.77.60.42', 'Admin Baliadangi', 'Success', '08:43:57 PM', '2018-11-24', 'Saturday'),
(403, '103.77.60.42', 'MD. JAHANGIR ALAM', 'Success', '08:46:03 PM', '2018-11-24', 'Saturday'),
(404, '103.77.60.42', 'Md. Abdur Rahman', 'Success', '08:48:23 PM', '2018-11-24', 'Saturday'),
(405, '103.77.60.42', 'Admin Admin', 'Success', '08:51:28 PM', '2018-11-24', 'Saturday'),
(406, '103.96.106.148', 'Admin Admin', 'Success', '09:03:08 PM', '2018-11-24', 'Saturday'),
(407, '103.96.106.148', 'Not Found', 'Failed', '09:04:50 PM', '2018-11-24', 'Saturday'),
(408, '103.96.106.148', 'Md. Abdur Rahman', 'Success', '09:05:02 PM', '2018-11-24', 'Saturday'),
(409, '103.77.60.42', 'Md Masudur Rahman', 'Success', '09:11:48 PM', '2018-11-24', 'Saturday'),
(410, '202.126.123.153', 'Not Found', 'Failed', '12:07:48 PM', '2018-11-25', 'Sunday'),
(411, '202.126.123.153', 'Admin Admin', 'Success', '12:07:55 PM', '2018-11-25', 'Sunday'),
(412, '202.126.123.153', 'Admin Admin', 'Success', '04:43:36 PM', '2018-11-25', 'Sunday'),
(413, '163.47.156.99', 'Admin Baliadangi', 'Success', '10:07:49 AM', '2018-11-26', 'Monday'),
(414, '163.47.156.99', 'Md. Sofiqul Islam', 'Success', '10:13:46 AM', '2018-11-26', 'Monday'),
(415, '163.47.156.99', 'Md. Abdur Rahman', 'Success', '10:16:40 AM', '2018-11-26', 'Monday'),
(416, '103.87.212.181', 'Not Found', 'Failed', '10:17:52 AM', '2018-11-26', 'Monday'),
(417, '103.87.212.181', 'Not Found', 'Failed', '10:18:16 AM', '2018-11-26', 'Monday'),
(418, '163.47.156.99', 'Not Found', 'Failed', '10:18:33 AM', '2018-11-26', 'Monday'),
(419, '103.87.212.181', 'Admin Admin', 'Success', '10:18:37 AM', '2018-11-26', 'Monday'),
(420, '163.47.156.99', 'Admin Baliadangi', 'Success', '10:18:39 AM', '2018-11-26', 'Monday'),
(421, '163.47.156.99', 'Md. Sofiqul Islam', 'Success', '10:19:21 AM', '2018-11-26', 'Monday'),
(422, '163.47.156.99', 'Md. Abdur Rahman', 'Success', '10:19:47 AM', '2018-11-26', 'Monday'),
(423, '163.47.156.99', 'Not Found', 'Failed', '10:28:03 AM', '2018-11-26', 'Monday'),
(424, '163.47.156.99', 'Not Found', 'Failed', '10:28:13 AM', '2018-11-26', 'Monday'),
(425, '163.47.156.99', 'Admin Baliadangi', 'Success', '10:28:20 AM', '2018-11-26', 'Monday'),
(426, '163.47.156.99', 'Md. Sofiqul Islam', 'Success', '10:29:49 AM', '2018-11-26', 'Monday'),
(427, '163.47.156.99', 'Admin Baliadangi', 'Success', '10:45:20 AM', '2018-11-26', 'Monday'),
(428, '180.211.141.6', 'Md Masudur Rahman', 'Success', '09:34:56 AM', '2018-11-27', 'Tuesday'),
(429, '114.130.80.140', 'Not Found', 'Failed', '09:44:08 AM', '2018-11-27', 'Tuesday'),
(430, '114.130.80.140', 'Md Masudur Rahman', 'Success', '09:44:34 AM', '2018-11-27', 'Tuesday'),
(431, '180.211.141.6', 'Md Shahinur Alam', 'Success', '02:18:21 PM', '2018-11-27', 'Tuesday'),
(432, '180.211.141.6', 'Md Masudur Rahman', 'Success', '11:31:59 AM', '2018-11-28', 'Wednesday'),
(433, '180.211.141.6', 'MD. JAHANGIR ALAM', 'Success', '12:00:30 PM', '2018-11-28', 'Wednesday'),
(434, '180.211.141.6', 'Md Masudur Rahman', 'Success', '12:37:33 PM', '2018-11-28', 'Wednesday'),
(435, '180.211.141.6', 'Md Shahinur Alam', 'Success', '12:38:42 PM', '2018-11-28', 'Wednesday'),
(436, '180.211.141.6', 'Not Found', 'Failed', '12:48:03 PM', '2018-11-28', 'Wednesday'),
(437, '180.211.141.6', 'ABM Sajedul Islam', 'Success', '12:48:19 PM', '2018-11-28', 'Wednesday'),
(438, '180.211.141.6', 'Md Shahinur Alam', 'Success', '12:51:41 PM', '2018-11-28', 'Wednesday'),
(439, '180.211.141.6', 'Md. Abdur Rahman', 'Success', '12:52:48 PM', '2018-11-28', 'Wednesday'),
(440, '202.191.127.220', 'Admin Admin', 'Success', '03:27:47 PM', '2018-12-09', 'Sunday'),
(441, '119.30.38.133', 'Amullo Chandro Singha', 'Success', '11:30:06 AM', '2018-12-10', 'Monday'),
(442, '202.191.127.220', 'Admin Admin', 'Success', '04:36:11 PM', '2019-01-02', 'Wednesday'),
(443, '103.77.60.42', 'Not Found', 'Failed', '08:17:29 PM', '2019-01-04', 'Friday'),
(444, '103.77.60.42', 'Md Masudur Rahman', 'Success', '08:18:31 PM', '2019-01-04', 'Friday'),
(445, '103.83.167.254', 'Not Found', 'Failed', '03:52:16 PM', '2019-01-06', 'Sunday'),
(446, '103.83.167.254', 'Not Found', 'Failed', '03:52:40 PM', '2019-01-06', 'Sunday'),
(447, '103.83.167.254', 'Not Found', 'Failed', '03:53:16 PM', '2019-01-06', 'Sunday'),
(448, '103.83.167.254', 'Md Masudur Rahman', 'Success', '03:53:42 PM', '2019-01-06', 'Sunday'),
(449, '103.83.167.254', 'Not Found', 'Failed', '03:55:30 PM', '2019-01-06', 'Sunday'),
(450, '103.83.167.254', 'Md Shahinur Alam', 'Success', '03:55:49 PM', '2019-01-06', 'Sunday'),
(451, '103.230.105.54', 'Not Found', 'Failed', '04:03:56 PM', '2019-01-06', 'Sunday'),
(452, '103.230.105.54', 'Not Found', 'Failed', '04:04:18 PM', '2019-01-06', 'Sunday'),
(453, '103.230.105.54', 'Not Found', 'Failed', '04:04:38 PM', '2019-01-06', 'Sunday'),
(454, '202.191.127.220', 'Admin Admin', 'Success', '04:06:05 PM', '2019-01-06', 'Sunday'),
(455, '103.230.105.54', 'Admin Admin', 'Success', '04:10:12 PM', '2019-01-06', 'Sunday'),
(456, '103.230.105.54', 'Admin Baliadangi', 'Success', '04:15:36 PM', '2019-01-06', 'Sunday'),
(457, '116.58.202.118', 'Not Found', 'Failed', '04:27:39 PM', '2019-01-06', 'Sunday'),
(458, '116.58.202.118', 'Not Found', 'Failed', '04:42:18 PM', '2019-01-06', 'Sunday'),
(459, '116.58.202.118', 'Admin Baliadangi', 'Success', '04:43:36 PM', '2019-01-06', 'Sunday'),
(460, '103.83.167.254', 'Not Found', 'Failed', '06:00:58 PM', '2019-01-06', 'Sunday'),
(461, '103.83.167.254', 'ABM Sajedul Islam', 'Success', '06:01:20 PM', '2019-01-06', 'Sunday'),
(462, '103.83.167.254', 'MD. JAHANGIR ALAM', 'Success', '06:05:57 PM', '2019-01-06', 'Sunday'),
(463, '103.83.167.254', 'Md. Abu Belal Siddik', 'Success', '07:35:37 PM', '2019-01-06', 'Sunday'),
(464, '103.83.167.254', 'Md. Abdur Rahman', 'Success', '07:49:27 PM', '2019-01-06', 'Sunday'),
(465, '103.83.167.254', 'Md Masudur Rahman', 'Success', '08:49:13 PM', '2019-01-06', 'Sunday'),
(466, '116.58.204.200', 'Admin Baliadangi', 'Success', '01:23:42 PM', '2019-01-07', 'Monday'),
(467, '163.47.156.99', 'Admin Baliadangi', 'Success', '10:37:34 AM', '2019-01-08', 'Tuesday'),
(468, '103.77.60.42', 'Admin Baliadangi', 'Success', '12:34:37 PM', '2019-01-08', 'Tuesday'),
(469, '43.229.12.144', 'Admin Baliadangi', 'Success', '06:22:44 PM', '2019-01-08', 'Tuesday'),
(470, '202.191.127.220', 'Admin Admin', 'Success', '07:21:48 PM', '2019-01-13', 'Sunday'),
(471, '202.126.123.153', 'Admin Admin', 'Success', '07:23:31 PM', '2019-01-13', 'Sunday'),
(472, '202.191.127.220', 'Not Found', 'Failed', '07:25:20 PM', '2019-01-13', 'Sunday'),
(473, '202.191.127.220', 'Not Found', 'Failed', '07:25:34 PM', '2019-01-13', 'Sunday'),
(474, '202.191.127.220', 'Not Found', 'Failed', '07:25:39 PM', '2019-01-13', 'Sunday'),
(475, '202.191.127.220', 'Not Found', 'Failed', '07:25:45 PM', '2019-01-13', 'Sunday'),
(476, '202.191.127.220', 'Admin Admin', 'Success', '06:58:26 PM', '2019-01-23', 'Wednesday'),
(477, '202.191.127.220', 'Admin Admin', 'Success', '04:13:34 PM', '2019-01-31', 'Thursday'),
(478, '202.191.127.220', 'Admin Admin', 'Success', '05:15:08 PM', '2019-01-31', 'Thursday'),
(479, '202.191.127.220', 'Admin Admin', 'Success', '12:52:52 PM', '2019-02-05', 'Tuesday'),
(480, '202.191.127.220', 'Admin Admin', 'Success', '01:09:14 PM', '2019-02-05', 'Tuesday'),
(481, '37.111.227.168', 'Not Found', 'Failed', '12:28:43 PM', '2019-02-06', 'Wednesday'),
(482, '37.111.227.168', 'Not Found', 'Failed', '12:30:07 PM', '2019-02-06', 'Wednesday'),
(483, '37.111.227.168', 'Not Found', 'Failed', '12:30:28 PM', '2019-02-06', 'Wednesday'),
(484, '37.111.228.131', 'MD NOWSAD ALI KAJEMI', 'Success', '06:54:31 PM', '2019-02-10', 'Sunday'),
(485, '202.191.127.220', 'Admin Admin', 'Success', '04:50:29 PM', '2019-02-12', 'Tuesday'),
(486, '202.191.127.220', 'Admin Admin', 'Success', '05:56:25 PM', '2019-02-12', 'Tuesday'),
(487, '37.111.201.6', 'MD NOWSAD ALI KAJEMI', 'Success', '12:05:21 PM', '2019-02-13', 'Wednesday'),
(488, '103.77.60.42', 'Md Masudur Rahman', 'Success', '11:18:47 AM', '2019-02-17', 'Sunday'),
(489, '103.77.60.42', 'Admin Baliadangi', 'Success', '02:32:03 PM', '2019-02-17', 'Sunday'),
(490, '123.108.246.220', 'MD NOWSAD ALI KAJEMI', 'Success', '01:42:16 PM', '2019-02-25', 'Monday'),
(491, '202.126.123.153', 'Not Found', 'Failed', '05:42:54 PM', '2019-02-27', 'Wednesday'),
(492, '202.126.123.153', 'Not Found', 'Failed', '05:43:04 PM', '2019-02-27', 'Wednesday'),
(493, '202.126.123.153', 'Admin Admin', 'Success', '05:43:13 PM', '2019-02-27', 'Wednesday'),
(494, '103.96.106.144', 'Admin Admin', 'Success', '01:02:50 PM', '2019-02-28', 'Thursday'),
(495, '103.15.141.19', 'Admin Admin', 'Success', '10:24:10 PM', '2019-03-03', 'Sunday'),
(496, '103.67.159.38', 'Admin Baliadangi', 'Success', '03:15:17 PM', '2019-04-01', 'Monday'),
(497, '180.211.141.6', 'Admin Baliadangi', 'Success', '03:21:00 PM', '2019-04-02', 'Tuesday'),
(498, '180.211.141.6', 'Admin Baliadangi', 'Success', '03:36:59 PM', '2019-04-02', 'Tuesday'),
(499, '180.211.141.6', 'Admin Admin', 'Success', '04:14:33 PM', '2019-04-02', 'Tuesday'),
(500, '180.211.141.6', 'Admin Admin', 'Success', '04:16:09 PM', '2019-04-02', 'Tuesday'),
(501, '163.47.156.110', 'Not Found', 'Failed', '03:47:33 PM', '2019-04-10', 'Wednesday'),
(502, '163.47.156.110', 'Not Found', 'Failed', '03:47:50 PM', '2019-04-10', 'Wednesday'),
(503, '163.47.156.110', 'Not Found', 'Failed', '03:48:17 PM', '2019-04-10', 'Wednesday'),
(504, '163.47.156.110', 'Not Found', 'Failed', '03:51:48 PM', '2019-04-10', 'Wednesday'),
(505, '163.47.156.110', 'Md. Abu Sufian', 'Success', '03:52:30 PM', '2019-04-10', 'Wednesday'),
(506, '163.47.156.110', 'Not Found', 'Failed', '03:54:17 PM', '2019-04-10', 'Wednesday'),
(507, '163.47.156.110', 'Not Found', 'Failed', '03:54:40 PM', '2019-04-10', 'Wednesday'),
(508, '163.47.156.110', 'Not Found', 'Failed', '03:55:10 PM', '2019-04-10', 'Wednesday'),
(509, '163.47.156.110', 'Md. Abdur Rahman', 'Success', '03:55:40 PM', '2019-04-10', 'Wednesday'),
(510, '202.134.9.140', 'Admin Baliadangi', 'Success', '08:06:11 AM', '2019-04-19', 'Friday'),
(511, '103.15.141.22', 'Admin Admin', 'Success', '10:33:33 PM', '2019-04-21', 'Sunday'),
(512, '103.15.141.20', 'Not Found', 'Failed', '11:41:23 PM', '2019-06-15', 'Saturday'),
(513, '103.15.141.20', 'Admin Admin', 'Success', '11:41:33 PM', '2019-06-15', 'Saturday'),
(514, '::1', 'Admin Admin', 'Success', '12:27:39 AM', '2019-06-16', 'Sunday'),
(515, '::1', 'Not Found', 'Failed', '12:04:03 AM', '2019-06-17', 'Monday'),
(516, '::1', 'Admin Admin', 'Success', '12:04:14 AM', '2019-06-17', 'Monday'),
(517, '::1', 'Admin Admin', 'Success', '12:08:34 AM', '2019-06-17', 'Monday'),
(518, '::1', 'Admin Admin', 'Success', '12:17:13 AM', '2019-06-17', 'Monday'),
(519, '::1', 'Admin Admin', 'Success', '12:19:58 AM', '2019-06-17', 'Monday'),
(520, '::1', 'Admin Admin', 'Success', '12:24:14 AM', '2019-06-17', 'Monday');

-- --------------------------------------------------------

--
-- Table structure for table `_007_account_head`
--

CREATE TABLE `_007_account_head` (
  `id` int(11) NOT NULL,
  `head_title` varchar(50) NOT NULL,
  `created_at` varchar(20) NOT NULL,
  `updated_at` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `_007_account_head`
--

INSERT INTO `_007_account_head` (`id`, `head_title`, `created_at`, `updated_at`) VALUES
(1, 'Expense1', '2020-01-15 10:36:50a', '2020-01-15 10:48:56a'),
(2, 'Income', '2020-01-15', '');

-- --------------------------------------------------------

--
-- Table structure for table `_007_clientinfo`
--

CREATE TABLE `_007_clientinfo` (
  `id` int(11) NOT NULL,
  `ccodeNo` varchar(10) NOT NULL,
  `cname` varchar(100) NOT NULL,
  `cphone` varchar(20) NOT NULL,
  `cemail` varchar(50) NOT NULL,
  `caddress` tinytext NOT NULL,
  `image` varchar(100) NOT NULL,
  `created_at` varchar(20) NOT NULL,
  `updated_at` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `_007_clientinfo`
--

INSERT INTO `_007_clientinfo` (`id`, `ccodeNo`, `cname`, `cphone`, `cemail`, `caddress`, `image`, `created_at`, `updated_at`) VALUES
(2, 'v-124', 'Somapon', '01712488651', 'sombor@gmail.com', 'Bheramara', '2020011505465978.jpg', '2020-01-15 05:46:59a', ''),
(3, 'c-1236', 'Sukur', '01712488651', 'sukur@gmail.com', 'Bheramara', '202001150938523.jpg', '2020-01-15 09:27:24a', '2020-01-15 09:38:52a');

-- --------------------------------------------------------

--
-- Table structure for table `_007_projects`
--

CREATE TABLE `_007_projects` (
  `id` int(11) NOT NULL,
  `project_name` varchar(150) NOT NULL,
  `description` mediumtext NOT NULL,
  `start_date` varchar(20) NOT NULL,
  `end_date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `_007_vendorinfo`
--

CREATE TABLE `_007_vendorinfo` (
  `id` int(11) NOT NULL,
  `vcodeNo` varchar(10) NOT NULL,
  `vname` varchar(100) NOT NULL,
  `vphone` varchar(20) NOT NULL,
  `vemail` varchar(50) NOT NULL,
  `vaddress` tinytext NOT NULL,
  `image` varchar(100) NOT NULL,
  `created_at` varchar(20) NOT NULL,
  `updated_at` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `_007_vendorinfo`
--

INSERT INTO `_007_vendorinfo` (`id`, `vcodeNo`, `vname`, `vphone`, `vemail`, `vaddress`, `image`, `created_at`, `updated_at`) VALUES
(1, 'v-1239', 'Sombor', '01712488651', 'sombor@gmail.com', 'Bheramara', '202001150613281.jpg', '2020-01-15 06:13:28a', '2020-01-15 09:09:42a'),
(2, 'v-124', 'Somapon', '01712488651', 'sombor@gmail.com', 'Bheramara', '2020011505465978.jpg', '2020-01-15 05:46:59a', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_list`
--
ALTER TABLE `menu_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menus`
--
ALTER TABLE `user_access_menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_login_attempt`
--
ALTER TABLE `user_login_attempt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `_007_account_head`
--
ALTER TABLE `_007_account_head`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `_007_projects`
--
ALTER TABLE `_007_projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `_007_vendorinfo`
--
ALTER TABLE `_007_vendorinfo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `menu_list`
--
ALTER TABLE `menu_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=189;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3101;

--
-- AUTO_INCREMENT for table `user_access_menus`
--
ALTER TABLE `user_access_menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=353444;

--
-- AUTO_INCREMENT for table `user_login_attempt`
--
ALTER TABLE `user_login_attempt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=521;

--
-- AUTO_INCREMENT for table `_007_account_head`
--
ALTER TABLE `_007_account_head`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `_007_projects`
--
ALTER TABLE `_007_projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `_007_vendorinfo`
--
ALTER TABLE `_007_vendorinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
