-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2020 at 01:21 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pharmacy`
--

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bank_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ac_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ac_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_sing` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `balance` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`id`, `bank_name`, `ac_name`, `ac_no`, `branch_name`, `bank_sing`, `balance`, `created_at`, `updated_at`) VALUES
(2, 'Brac Bank', 'K.H. Hirok', '11322325364758585r', 'Mirpur', '1575792924.PNG', '10000', '2019-10-27 04:52:52', '2019-12-08 16:15:24'),
(3, 'islami bank', 'helal', '7418', 'mohakhali', '1575758285.PNG', '2580', '2019-12-08 06:38:05', '2019-12-08 06:38:05'),
(4, 'Dhaka bank', 'helal', '741858754', 'mohakhali', '1577131992.PNG', '15870', '2019-12-24 04:13:12', '2019-12-24 04:13:12');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tag` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone2` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email2` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(210) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `cname`, `phone`, `tag`, `phone2`, `logo`, `email1`, `email2`, `address`, `created_at`, `updated_at`) VALUES
(46, 'Mohammad Pharma', '01832311954', 'Medicine and Department Store', '01752415325', '1576802986.jpg', 'hasan@gmail.com', 'mahmud@gmail.com', 'Alekharchor , Cumilla', '2019-12-20 08:49:46', '2019-12-20 08:49:46');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_address` text COLLATE utf8mb4_unicode_ci,
  `customer_balance` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `customer_name`, `customer_email`, `customer_phone`, `customer_address`, `customer_balance`, `created_at`, `updated_at`) VALUES
(1, 'Monir Hossain rana', 'mdibrahim@gmail.com', '01885398804', 'Mirpur', 1000, '2019-10-24 04:01:06', '2019-12-08 15:41:31'),
(3, 'Ahmed', 'shohan@gmail.com', '01532465877', 'SHASAN GASA', 4534532, '2019-12-08 04:17:34', '2019-12-08 04:17:34'),
(4, 'shohan', 'foysal5918@gmail.com', '01832147856', 'Motijhel, Dhaka', 6500, '2019-12-18 04:54:34', '2019-12-18 04:54:34'),
(5, 'ritik', NULL, NULL, NULL, NULL, '2020-03-12 05:36:13', '2020-03-12 05:36:13');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `exp_id` int(10) UNSIGNED NOT NULL,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `exp_id`, `amount`, `date`, `created_at`, `updated_at`) VALUES
(3, 10, '500', '01-01-2020', '2020-01-12 06:17:38', '2020-01-12 06:17:38'),
(4, 9, '500', '02-01-2020', '2020-01-12 09:39:07', '2020-01-12 09:39:07'),
(5, 11, '256', '03-01-2020', '2020-01-12 09:46:33', '2020-01-12 09:46:33');

-- --------------------------------------------------------

--
-- Table structure for table `expense_names`
--

CREATE TABLE `expense_names` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `exp_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expense_names`
--

INSERT INTO `expense_names` (`id`, `exp_name`, `created_at`, `updated_at`) VALUES
(9, 'net bill', '2020-01-12 01:16:00', '2020-01-12 01:16:00'),
(10, 'domain cost', '2020-01-12 04:46:31', '2020-01-12 04:46:31'),
(11, 'office clean', '2020-01-12 09:46:06', '2020-01-12 09:46:06');

-- --------------------------------------------------------

--
-- Table structure for table `manufacturers`
--

CREATE TABLE `manufacturers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `manufacturer_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `manufacturer_mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `manufacturer_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `manufacturer_details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `manufacturer_balance` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `manufacturers`
--

INSERT INTO `manufacturers` (`id`, `manufacturer_name`, `manufacturer_mobile`, `manufacturer_address`, `manufacturer_details`, `manufacturer_balance`, `created_at`, `updated_at`) VALUES
(1, 'Base IT', '01815000000', 'Mirpur, Dhaka', 'Software Comapny', 100, '2019-10-24 04:05:08', '2019-10-26 03:55:01'),
(2, 'Mother IT', '01815000022', 'Mirpur, Dhaka', 'Software Company in Bangladesh', 50000, '2019-10-26 04:36:18', '2019-10-26 04:36:18');

-- --------------------------------------------------------

--
-- Table structure for table `medicines`
--

CREATE TABLE `medicines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `generic_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `box_size` int(11) NOT NULL,
  `unit_id` int(10) UNSIGNED NOT NULL,
  `shelf` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_id` int(10) UNSIGNED NOT NULL,
  `images` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_id` int(10) UNSIGNED NOT NULL,
  `sell_price` int(11) NOT NULL,
  `vat` int(11) NOT NULL,
  `tax` int(11) NOT NULL,
  `igst` int(11) NOT NULL,
  `barcode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `manufacturer_id` int(10) UNSIGNED NOT NULL,
  `manufacturer_price` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1' COMMENT 'Active=1, Inactive=0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `medicines`
--

INSERT INTO `medicines` (`id`, `product_name`, `generic_name`, `box_size`, `unit_id`, `shelf`, `details`, `type_id`, `images`, `cat_id`, `sell_price`, `vat`, `tax`, `igst`, `barcode`, `manufacturer_id`, `manufacturer_price`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Test333', 'test443434333', 36, 2, 'top', '', 5, '1572160278.png', 3, 1300, 2, 3, 4, '241q51', 2, 1000, 1, '2019-10-27 01:11:18', '2019-10-27 01:11:18'),
(4, 'cvsgfcv', 'cvzsxv', 400, 1, 'middle', 'sdgvasdg aersdfwaes 34wetsfdc 34wesfdzc4awtesf', 8, '1572160616.png', 3, 3000, 3, 4, 2, 'sgasdgcasdg', 1, 2000, 1, '2019-10-27 01:16:56', '2019-10-27 01:16:56'),
(5, 'mhashfhsdaf', 'efsdsgdergs', 2, 1, '34345', 'sdzxfasdgvdfgcvs', 3, '1575438614.png', 3, 1200, 1, 1, 2, '63q4q', 1, 1000, 1, '2019-12-03 23:50:14', '2019-12-03 23:50:14'),
(6, 'Ad - All(50 mg + 47 mg + 500 mcg + 10 mg + 1 mg + 2 mg + 2 mg + 22.5 mg)', '52', 50, 2, '52', 'oijij', 5, '1575872017.PNG', 3, 50, 56, 20, 20, '8451651', 1, 25, 1, '2019-12-09 14:13:37', '2019-12-09 14:13:37'),
(9, 'nispron', 'acyclovir capsule', 50, 1, '20', 'nothing', 3, '1577142292.PNG', 1, 50, 5, 20, 50, '785545985', 2, 500, 0, '2019-12-24 07:01:21', '2019-12-24 07:04:52');

-- --------------------------------------------------------

--
-- Table structure for table `medicine_cats`
--

CREATE TABLE `medicine_cats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1' COMMENT 'Active =1,Inactive=0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `medicine_cats`
--

INSERT INTO `medicine_cats` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'ANTI-ANXIETY AGENTS', 1, '2019-10-25 22:54:47', '2019-10-26 02:44:27'),
(2, 'ANTI-HIV AGENTS', 1, '2019-10-25 23:22:14', '2019-10-25 23:22:14'),
(3, 'ANTIHYPERTENSIVE AGENTS', 1, '2019-10-25 23:22:38', '2019-10-25 23:22:38'),
(5, 'General', 1, '2019-10-25 23:23:27', '2019-10-25 23:23:27');

-- --------------------------------------------------------

--
-- Table structure for table `medicine_types`
--

CREATE TABLE `medicine_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1' COMMENT 'Active =1,Inactive=0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `medicine_types`
--

INSERT INTO `medicine_types` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Tablet', 1, '2019-10-25 23:41:51', '2019-10-25 23:41:51'),
(2, 'Liquid', 1, '2019-10-25 23:42:08', '2019-10-25 23:42:08'),
(3, 'Capsules', 1, '2019-10-25 23:42:16', '2019-10-25 23:42:16'),
(4, 'Suppositories', 1, '2019-10-25 23:42:27', '2019-10-25 23:42:27'),
(5, 'Drops', 0, '2019-10-25 23:42:35', '2019-10-26 02:48:27'),
(6, 'Inhalers', 1, '2019-10-25 23:42:42', '2019-10-26 02:48:16'),
(8, 'Injections', 1, '2019-10-25 23:45:50', '2019-10-25 23:45:50');

-- --------------------------------------------------------

--
-- Table structure for table `medicine_units`
--

CREATE TABLE `medicine_units` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1' COMMENT 'Active =1,Inactive=0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `medicine_units`
--

INSERT INTO `medicine_units` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Box', 1, '2019-10-25 23:57:34', '2019-10-25 23:57:34'),
(2, 'Pieces', 1, '2019-10-25 23:57:46', '2019-10-26 02:49:30');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(9, '2014_10_12_000000_create_users_table', 1),
(10, '2014_10_12_100000_create_password_resets_table', 1),
(11, '2019_10_23_065434_create_manufacturers_table', 1),
(12, '2019_10_24_044323_create_customers_table', 1),
(13, '2019_10_24_103658_create_medicine_cats_table', 2),
(14, '2019_10_24_103826_create_medicine_types_table', 2),
(15, '2019_10_24_103912_create_medicine_units_table', 2),
(19, '2019_10_26_062809_create_medicines_table', 3),
(20, '2019_10_27_092903_create_banks_table', 4),
(21, '2019_10_27_105626_create_suppliers_table', 5),
(27, '2019_10_31_111744_create_purchaseinfos_table', 7),
(28, '2019_11_03_093531_create_purchases_table', 8),
(35, '2019_11_04_081019_create_sales_table', 9),
(36, '2019_11_04_084334_create_salesinfos_table', 9),
(37, '2019_12_07_184741_create_companies_table', 10),
(38, '2019_12_23_211218_add_bkash_to_sales_table', 11),
(39, '2020_01_10_000620_create_expenses_table', 12),
(40, '2020_01_10_000703_create_expense_names_table', 12),
(41, '2020_01_10_000832_create_purchase_dues_table', 12),
(42, '2020_01_10_001053_create_sales_dues_table', 12),
(43, '2020_01_11_211425_create_expense_table', 13),
(44, '2020_01_11_221554_create_expenses_table', 14),
(45, '2020_01_14_205912_create_purchase_dues_table', 15),
(46, '2020_01_14_210902_create_purchase_dues_table', 16);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('hirok.bd2015@gmail.com', '$2y$10$lFDDNzjMePWGxcVvBTrHqOpvG.i72n8.YGqPRQuaMtfJ7lm5sFqGu', '2019-11-24 22:23:10');

-- --------------------------------------------------------

--
-- Table structure for table `purchaseinfos`
--

CREATE TABLE `purchaseinfos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `purchase_id` int(10) UNSIGNED NOT NULL,
  `medicine_id` int(10) UNSIGNED NOT NULL,
  `batch_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expired_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock_id` int(10) UNSIGNED DEFAULT NULL,
  `quantity` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchaseinfos`
--

INSERT INTO `purchaseinfos` (`id`, `purchase_id`, `medicine_id`, `batch_id`, `expired_date`, `stock_id`, `quantity`, `rate`, `total_price`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'efwesf', '0000-00-00', 5, '3', '1100', '3300', NULL, NULL),
(2, 1, 4, 'cggvd', '0000-00-00', 5, '2', '2000', '4000', NULL, NULL),
(3, 1, 1, 'hjhgdhmg', '0000-00-00', 5, '6', '1100', '6600', NULL, NULL),
(4, 1, 4, 'fkjjvjh', '0000-00-00', 5, '4', '2000', '8000', NULL, NULL),
(5, 1, 2, 'efwesf', '0000-00-00', 66, '4', '1000', '4000', NULL, NULL),
(6, 4, 1, 'sdcgvsdc', '0000-00-00', 5, '5', '1100', '5500', NULL, NULL),
(7, 4, 4, 'rdfcvzrgcv', '0000-00-00', 55, '4', '2000', '8000', NULL, NULL),
(8, 5, 1, 'sdgersg', '0000-00-00', 4, '2', '1100', '2200', NULL, NULL),
(9, 5, 4, 'ersgerg', '0000-00-00', 3, '2', '2000', '4000', NULL, NULL),
(10, 7, 1, 'sdvsdx', '0000-00-00', 5, '3', '1100', '3300', NULL, NULL),
(11, 7, 4, 'rsdsd', '0000-00-00', 4, '2', '2000', '4000', NULL, NULL),
(12, 8, 1, 'dzxv', '26/11/2019', 5, '3', '1100', '3300', NULL, NULL),
(13, 8, 4, 'sdzx', '11/27/2019', 4, '4', '2000', '8000', NULL, NULL),
(14, 10, 5, '589647', '31-12-2019', 10, '5', '1000', '5000', NULL, NULL),
(15, 11, 6, '65895', '31-12-2019', 5, '10', '25', '250', NULL, NULL),
(16, 12, 5, '6542', '31-01-2020', 100, '5', '1000', '5000', NULL, NULL),
(17, 14, 9, '5418941984', '31-01-2020', 10, '50', '500', '25000', NULL, NULL),
(18, 15, 9, '5418941984', '31-01-2020', 10, '50', '500', '25000', NULL, NULL),
(19, 16, 5, '92448', '30-01-2020', 50, '500', '1000', '500000', NULL, NULL),
(20, 17, 5, '46456', '31-01-2020', 10, '50', '1000', '50000', NULL, NULL),
(21, 18, 4, '545634', '31-01-2020', 5, '1000', '2000', '2000000', NULL, NULL),
(22, 19, 4, '48656', '31-01-2020', 5, '100', '2000', '200000', NULL, NULL),
(23, 20, 5, '354215', '31-01-2020', 104, '65', '1000', '65000', NULL, NULL),
(24, 21, 9, '695', '31-01-2020', 50, '1000', '500', '500000', NULL, NULL),
(25, 23, 2, NULL, '19-03-2020', NULL, '100', '1000', '100000', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `manufacturer_id` int(10) UNSIGNED NOT NULL,
  `purchase_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoice_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci,
  `payment_type` int(11) NOT NULL DEFAULT '0' COMMENT 'cash=0,bank=1,due=2',
  `bank_id` int(10) UNSIGNED NOT NULL,
  `grand_total` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `manufacturer_id`, `purchase_date`, `invoice_no`, `details`, `payment_type`, `bank_id`, `grand_total`, `created_at`, `updated_at`) VALUES
(9, 2, '23/12/2019', 'INV-P-1002', 'null', 0, 2, '5000', '2019-12-24 07:30:11', '2019-12-24 07:30:11'),
(11, 1, '23/12/2019', 'INV-P-1003', 'notjing', 0, 2, '250', '2019-12-24 07:39:14', '2019-12-24 07:39:14'),
(12, 1, '13/01/2020', 'INV-P-1004', 'null', 0, 0, '5000', '2020-01-14 08:58:31', '2020-01-14 08:58:31'),
(13, 2, '14/01/2020', 'INV-P-1005', 'nothing', 1, 0, '25000', '2020-01-15 02:47:10', '2020-01-15 02:47:10'),
(14, 2, '14/01/2020', 'INV-P-1006', 'null', 1, 0, '25000', '2020-01-15 02:47:53', '2020-01-15 02:47:53'),
(15, 2, '14/01/2020', 'INV-P-1006', 'null', 1, 0, '25000', '2020-01-15 02:48:32', '2020-01-15 02:48:32'),
(16, 1, '14/01/2020', 'INV-P-1007', 'null', 0, 0, '500000', '2020-01-15 02:51:10', '2020-01-15 02:51:10'),
(17, 1, '14/01/2020', 'INV-P-1008', 'null', 0, 0, '50000', '2020-01-15 05:02:21', '2020-01-15 05:02:21'),
(18, 1, '14/01/2020', 'INV-P-1009', 'null', 0, 0, '2000000', '2020-01-15 05:05:24', '2020-01-15 05:05:24'),
(19, 1, '14/01/2020', 'INV-P-1010', 'null', 0, 0, '200000', '2020-01-15 05:11:42', '2020-01-15 05:11:42'),
(20, 1, '14/01/2020', 'INV-P-1011', 'null', 0, 0, '65000', '2020-01-15 05:18:27', '2020-01-15 05:18:27'),
(21, 2, '15/01/2020', 'INV-P-1012', NULL, 1, 0, '500000', '2020-01-16 09:11:00', '2020-01-16 09:11:00'),
(22, 2, '12/03/2020', 'INV-P-1013', NULL, 0, 0, '135000', '2020-03-12 04:43:59', '2020-03-12 04:43:59'),
(23, 2, '12/03/2020', 'INV-P-1013', NULL, 0, 0, '100000', '2020-03-12 04:50:13', '2020-03-12 04:50:13');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_dues`
--

CREATE TABLE `purchase_dues` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `manufacturer_id` int(10) UNSIGNED NOT NULL,
  `invoice_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `due_amount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_dues`
--

INSERT INTO `purchase_dues` (`id`, `manufacturer_id`, `invoice_no`, `due_amount`, `created_at`, `updated_at`) VALUES
(1, 1, 'INV-P-1010', '100000', '2020-01-15 05:11:42', '2020-01-15 05:11:42'),
(2, 1, '', '-599', '2020-01-15 05:12:23', '2020-01-15 05:12:23'),
(3, 1, 'INV-P-1011', '5000', '2020-01-15 05:18:27', '2020-01-15 05:18:27'),
(4, 2, 'INV-P-1012', '9998', '2020-01-16 09:11:00', '2020-01-16 09:11:00');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `invoice_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_type` int(11) NOT NULL DEFAULT '0' COMMENT 'cash=0, bank=1',
  `sale_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_id` int(10) UNSIGNED NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci,
  `sub_total` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoice_discount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_discount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `igst` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_tax` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `grand_total` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paid_amount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `due_amount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `change_amount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `bkash` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `customer_id`, `invoice_no`, `payment_type`, `sale_date`, `bank_id`, `details`, `sub_total`, `invoice_discount`, `total_discount`, `vat`, `tax`, `igst`, `total_tax`, `grand_total`, `paid_amount`, `due_amount`, `change_amount`, `created_at`, `updated_at`, `bkash`) VALUES
(14, 3, 'INV-1001', 0, '22/12/2019', 0, NULL, '15000', '500', '500', '450', '600', '300', '1350', '16350', '16350', '0', NULL, '2019-12-23 10:06:22', '2019-12-23 10:06:22', NULL),
(16, 4, 'INV-1003', 1, '23/12/2019', 4, NULL, '6500', '100', '100', '130', '195', '260', '585', '7085', '7085', '0', NULL, '2019-12-24 04:25:54', '2019-12-24 04:25:54', NULL),
(19, 1, 'INV-1004', 2, '23/12/2019', 0, NULL, '15000', '100', '100', '450', '600', '300', '1350', '16350', '16350', '0', NULL, '2019-12-24 04:39:39', '2019-12-24 04:39:39', NULL),
(20, 3, 'INV-1005', 2, '23/12/2019', 0, NULL, '15000', '100', '100', '450', '600', '300', '1350', '16350', '16350', '0', NULL, '2019-12-24 05:20:48', '2019-12-24 05:20:48', '01682786501'),
(27, 3, 'INV-1006', 1, '23/12/2019', 4, 'abcd', '6500', NULL, '0', '130', '195', '260', '585', '7085', '7085', '0', '63765', '2019-12-24 07:52:37', '2019-12-24 07:52:37', NULL),
(33, 3, 'INV-1008', 1, '23/12/2019', 4, 'kkk', '6500', NULL, '0', '130', '195', '260', '585', '7085', '7085', '0', NULL, '2019-12-24 08:39:38', '2019-12-24 08:39:38', NULL),
(34, 1, 'INV-1009', 1, '23/12/2019', 2, NULL, '6000', NULL, '0', '60', '60', '120', '240', '6240', '6240', '0', NULL, '2019-12-24 08:40:20', '2019-12-24 08:40:20', NULL),
(35, 3, 'INV-1010', 0, '23/12/2019', 0, NULL, '15000', NULL, '0', '450', '600', '300', '1350', '16350', '16350', '0', NULL, '2019-12-24 08:40:47', '2019-12-24 08:40:47', NULL),
(36, 3, 'INV-1011', 2, '23/12/2019', 0, NULL, '21000', NULL, '0', '630', '840', '420', '1890', '22890', '22890', '0', NULL, '2019-12-24 09:08:59', '2019-12-24 09:08:59', '01682786501'),
(38, 1, 'INV-1012', 0, '24/12/2019', 0, NULL, '15000', NULL, '0', '450', '600', '300', '1350', '16350', '16350', '0', NULL, '2019-12-25 08:02:41', '2019-12-25 08:02:41', NULL),
(39, 4, 'INV-1013', 2, '24/12/2019', 0, NULL, '24400', NULL, '0', '536', '708', '592', '1836', '26236', '26236', '0', NULL, '2019-12-25 09:00:37', '2019-12-25 09:00:37', '01682786501'),
(45, 3, 'INV-1017', 0, '12/01/2020', 0, NULL, '15000', NULL, '0', '450', '600', '300', '1350', '16350', '16300', '50', NULL, '2020-01-13 02:33:15', '2020-01-13 02:33:15', NULL),
(46, 1, 'INV-1018', 0, '12/01/2020', 0, NULL, '15000', NULL, '0', '450', '600', '300', '1350', '16350', '16350', '0', NULL, '2020-01-13 02:34:44', '2020-01-13 02:34:44', NULL),
(47, 4, 'INV-1019', 2, '12/01/2020', 0, NULL, '9000', NULL, '0', '270', '360', '180', '810', '9810', '5000', '4810', NULL, '2020-01-13 05:04:39', '2020-01-13 05:04:39', '01682786501'),
(50, 3, 'INV-1020', 1, '12/01/2020', 2, NULL, '9000', NULL, '0', '270', '360', '180', '810', '9810', '5000', '4810', NULL, '2020-01-13 05:08:21', '2020-01-13 05:08:21', NULL),
(51, 1, 'INV-1021', 0, '12/01/2020', 0, NULL, '12000', NULL, '0', '360', '480', '240', '1080', '13080', '10000', '3080', NULL, '2020-01-13 07:04:03', '2020-01-13 07:04:03', NULL),
(52, 1, 'INV-1022', 1, '13/01/2020', 4, NULL, '2400', NULL, '0', '24', '24', '48', '96', '2496', '1000', '1496', NULL, '2020-01-14 01:44:37', '2020-01-14 01:44:37', NULL),
(54, 3, 'INV-1023', 0, '15/01/2020', 0, NULL, '15000', NULL, '0', '450', '600', '300', '1350', '16350', '15000', '1350', NULL, '2020-01-16 07:33:48', '2020-01-16 07:33:48', NULL),
(55, 4, 'INV-1024', 0, '15/01/2020', 0, NULL, '14400', NULL, '0', '144', '144', '288', '576', '14976', '14000', '976', NULL, '2020-01-16 07:40:07', '2020-01-16 07:40:07', NULL),
(56, 3, 'INV-1025', 0, '12/03/2020', 0, NULL, '66000', NULL, '0', '660', '660', '1320', '2640', '68640', NULL, NULL, NULL, '2020-03-12 05:16:49', '2020-03-12 05:16:49', NULL),
(57, 3, 'INV-1025', 0, '12/03/2020', 0, NULL, '66000', NULL, '0', '660', '660', '1320', '2640', '68640', NULL, NULL, NULL, '2020-03-12 05:18:10', '2020-03-12 05:18:10', NULL),
(58, 4, 'INV-1026', 0, '12/03/2020', 0, NULL, '250', NULL, '0', '12.5', '50', '125', '187.5', '437.5', NULL, NULL, NULL, '2020-03-12 05:18:54', '2020-03-12 05:18:54', NULL),
(59, 5, 'INV-1027', 0, '12/03/2020', 0, NULL, '3075000', NULL, '0', '92250', '123000', '61500', '276750', '3351750', NULL, NULL, NULL, '2020-03-12 05:55:20', '2020-03-12 05:55:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `salesinfos`
--

CREATE TABLE `salesinfos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sales_id` int(10) UNSIGNED NOT NULL,
  `medicine_id` int(10) UNSIGNED NOT NULL,
  `batch_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `available_qty` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expired_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit_id` int(10) UNSIGNED NOT NULL,
  `quantity` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `salesinfos`
--

INSERT INTO `salesinfos` (`id`, `sales_id`, `medicine_id`, `batch_id`, `available_qty`, `expired_date`, `unit_id`, `quantity`, `price`, `discount`, `total_amount`, `created_at`, `updated_at`) VALUES
(15, 13, 4, '4', NULL, '0000-00-00', 1, '5', '3000', NULL, '15000', NULL, NULL),
(16, 14, 4, '4', NULL, '0000-00-00', 1, '5', '3000', NULL, '15000', NULL, NULL),
(18, 16, 2, '5', NULL, '0000-00-00', 2, '5', '1300', NULL, '6500', NULL, NULL),
(21, 19, 4, '4', NULL, '0000-00-00', 1, '5', '3000', NULL, '15000', NULL, NULL),
(22, 20, 4, '4', NULL, '0000-00-00', 1, '5', '3000', NULL, '15000', NULL, NULL),
(28, 27, 2, '5', NULL, '0000-00-00', 2, '5', '1300', NULL, '6500', NULL, NULL),
(32, 33, 2, '5', NULL, '0000-00-00', 2, '5', '1300', NULL, '6500', NULL, NULL),
(33, 34, 5, '14', NULL, '31-12-2019', 1, '5', '1200', NULL, '6000', NULL, NULL),
(34, 35, 4, '4', NULL, '0000-00-00', 1, '5', '3000', NULL, '15000', NULL, NULL),
(37, 38, 4, '7', NULL, '0000-00-00', 1, '5', '3000', NULL, '15000', NULL, NULL),
(38, 39, 2, '5', NULL, '0000-00-00', 2, '4', '1300', NULL, '5200', NULL, NULL),
(39, 39, 4, '13', NULL, '11/27/2019', 1, '4', '3000', NULL, '12000', NULL, NULL),
(40, 39, 5, '14', NULL, '31-12-2019', 1, '6', '1200', NULL, '7200', NULL, NULL),
(41, 40, 5, '14', NULL, '31-12-2019', 1, '5', '1200', NULL, '6000', NULL, NULL),
(43, 42, 4, '4', NULL, '0000-00-00', 1, '5', '3000', NULL, '15000', NULL, NULL),
(46, 45, 4, '7', NULL, '0000-00-00', 1, '5', '3000', NULL, '15000', NULL, NULL),
(47, 46, 4, '11', NULL, '0000-00-00', 1, '5', '3000', NULL, '15000', NULL, NULL),
(50, 50, 4, '7', NULL, '0000-00-00', 1, '3', '3000', NULL, '9000', NULL, NULL),
(51, 51, 4, '9', NULL, '0000-00-00', 1, '4', '3000', NULL, '12000', NULL, NULL),
(52, 52, 5, '14', NULL, '31-12-2019', 1, '2', '1200', NULL, '2400', NULL, NULL),
(54, 54, 4, '9', NULL, '0000-00-00', 1, '5', '3000', NULL, '15000', NULL, NULL),
(55, 55, 5, '19', NULL, '30-01-2020', 1, '12', '1200', NULL, '14400', NULL, NULL),
(56, 57, 5, 'Select', NULL, NULL, 1, '55', '1200', NULL, '66000', NULL, NULL),
(57, 58, 9, 'Select', NULL, NULL, 1, '5', '50', NULL, '250', NULL, NULL),
(58, 59, 4, '4', NULL, '0000-00-00', 1, '1025', '3000', NULL, '3075000', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sales_dues`
--

CREATE TABLE `sales_dues` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `due_amount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales_dues`
--

INSERT INTO `sales_dues` (`id`, `customer_id`, `due_amount`, `created_at`, `updated_at`) VALUES
(2, 3, '50', '2020-01-13 02:33:15', '2020-01-13 02:33:15'),
(5, 3, '4810', '2020-01-13 05:08:21', '2020-01-13 05:08:21'),
(6, 1, '3080', '2020-01-13 07:04:03', '2020-01-13 07:04:03'),
(7, 3, '-10', '2020-01-13 09:28:52', '2020-01-13 09:28:52'),
(8, 3, '-10', '2020-01-13 09:29:53', '2020-01-13 09:29:53'),
(9, 3, '-5', '2020-01-13 09:30:07', '2020-01-13 09:30:07'),
(10, 3, '-5', '2020-01-13 09:30:55', '2020-01-13 09:30:55'),
(11, 1, '-80', '2020-01-13 09:31:54', '2020-01-13 09:31:54'),
(12, 1, '-3000', '2020-01-13 09:38:09', '2020-01-13 09:38:09'),
(13, 1, '1496', '2020-01-14 01:44:37', '2020-01-14 01:44:37'),
(14, 1, '-500', '2020-01-14 08:14:27', '2020-01-14 08:14:27'),
(15, 0, '3500', '2020-01-16 06:53:31', '2020-01-16 06:53:31'),
(16, 3, '1350', '2020-01-16 07:33:48', '2020-01-16 07:33:48'),
(17, 4, '976', '2020-01-16 07:40:07', '2020-01-16 07:40:07'),
(18, 1, '-496', '2020-03-12 05:11:18', '2020-03-12 05:11:18');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sup_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sup_phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sup_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sup_details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sup_balance` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `sup_name`, `sup_phone`, `sup_address`, `sup_details`, `sup_balance`, `created_at`, `updated_at`) VALUES
(1, 'BK Pharmaceuticals', '01823787878', 'Mirpur, Dhaka', 'Our Best Supplier', '10000', '2019-10-27 05:29:46', '2019-10-27 05:35:47');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Khandoker Hirok', 'hirok.bd2015@gmail.com', NULL, '$2y$10$ewU9MDSlI4bClOYuDpLCQudZ6y9QYovy29QlXA4Uj1zzxhbE09pP.', NULL, '2019-10-24 03:38:09', '2019-10-24 03:38:09'),
(2, 'Hirok BD', 'hirok_bsu@yahoo.com', NULL, '$2y$10$ewU9MDSlI4bClOYuDpLCQudZ6y9QYovy29QlXA4Uj1zzxhbE09pP.', NULL, '2019-11-24 22:25:14', '2019-11-24 22:25:14'),
(3, 'Ahmed', 'admin@gmail.com', NULL, '$2y$10$VLAX9N4bMOFJw3.mGOPewerJSJ6SJhxrkwTYAGxU1Ey2KZceJSfqK', NULL, '2019-12-06 07:16:07', '2019-12-06 07:16:07'),
(4, 'Ahmed', 'admin00@gmail.com', NULL, '$2y$10$VSppOmk3.FI3mtGXOiMiG.zbv3SuZoJcJdFTfyV7t9aWAPZzf5mvq', NULL, '2019-12-07 14:21:52', '2019-12-07 14:21:52'),
(5, 'Ahmed', 'admin123@gmail.com', NULL, '$2y$10$IYP50LbnfPnIRk5yQtH6Au4zuQTIIvEnKXETdEGBgdWWD6tlqg89W', NULL, '2019-12-22 09:44:05', '2019-12-22 09:44:05'),
(6, 'Ahmed', 'admin5918@gmail.com', NULL, '$2y$10$sADaKK5SJHGta9V6feR8zO1qm6r/scUefafpj4fVmPbcQP/SQEQTy', NULL, '2020-01-02 09:46:56', '2020-01-02 09:46:56'),
(7, 'Foysal Ahmed', 'foysal@gmail.com', NULL, '$2y$10$3C8r2QxmPujffy3jLEpUd.YrK99xgZePypZJdFJlTRyKTEqR0xvy.', NULL, '2020-03-06 12:21:44', '2020-03-06 12:21:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expense_names`
--
ALTER TABLE `expense_names`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manufacturers`
--
ALTER TABLE `manufacturers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicines`
--
ALTER TABLE `medicines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicine_cats`
--
ALTER TABLE `medicine_cats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicine_types`
--
ALTER TABLE `medicine_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicine_units`
--
ALTER TABLE `medicine_units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `purchaseinfos`
--
ALTER TABLE `purchaseinfos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_dues`
--
ALTER TABLE `purchase_dues`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salesinfos`
--
ALTER TABLE `salesinfos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_dues`
--
ALTER TABLE `sales_dues`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `expense_names`
--
ALTER TABLE `expense_names`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `manufacturers`
--
ALTER TABLE `manufacturers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `medicines`
--
ALTER TABLE `medicines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `medicine_cats`
--
ALTER TABLE `medicine_cats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `medicine_types`
--
ALTER TABLE `medicine_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `medicine_units`
--
ALTER TABLE `medicine_units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `purchaseinfos`
--
ALTER TABLE `purchaseinfos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `purchase_dues`
--
ALTER TABLE `purchase_dues`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `salesinfos`
--
ALTER TABLE `salesinfos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `sales_dues`
--
ALTER TABLE `sales_dues`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
