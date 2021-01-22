-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2020 at 05:42 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kmmpudukottai`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `landmark` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gst_tin` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `client_name`, `customer_id`, `phone`, `address`, `email`, `landmark`, `description`, `gst_tin`, `created_at`, `updated_at`, `status`) VALUES
(2, 'Service Order', '111', '323333333333', 'gggggggg', 'pksgroups005@gmail.com', 'ssssss', NULL, 11111, '2020-12-24 03:31:43', NULL, 1),
(3, 'hhhhh', '1112', '9999333322', 'fffff', 'pks@gmail.com', 'sssss', NULL, 444, '2020-12-24 05:24:21', NULL, 1),
(4, 'hhhhh', '111', '99993333', 'fffff', 'pks@gmail.com', 'sssss', NULL, 444, '2020-12-24 12:13:41', NULL, 1),
(5, 'hhhhh', '111', '99993333222', 'fffff', 'pks@gmail.com', 'sssss', NULL, 444, '2020-12-24 12:17:05', NULL, 1),
(6, 'hhhhh', '111', '99993333', 'fffff', 'pks@gmail.com', 'sssss', NULL, 444, '2020-12-24 13:15:13', NULL, 1),
(7, 'hhhhh', '1112113', '9999333355', 'fffff', 'pks@gmail.com', 'sssss', NULL, 444, '2020-12-24 14:21:26', NULL, 1),
(8, 'hhhhh', '1112123', '9999333322', 'fffff', 'pks@gmail.com', 'sssss', NULL, 444, '2020-12-24 14:22:19', NULL, 1),
(9, 'hhhhh', '1112144', '9999333322', 'fffff', 'pks@gmail.com', 'sssss', NULL, 444, '2020-12-24 15:30:34', NULL, 1),
(10, 'hhhhh', '1112199', '9999333322', 'fffff', 'pks@gmail.com', 'sssss', NULL, 444, '2020-12-24 16:25:16', NULL, 1),
(11, 'hhhhh', '1112100', '9999333322', 'fffff', 'pks@gmail.com', 'sssss', NULL, 444, '2020-12-24 16:26:16', NULL, 1),
(12, 'hhhhh', '1112110', '9999333322', 'fffff', 'pks@gmail.com', 'sssss', NULL, 444, '2020-12-24 16:30:22', NULL, 1),
(13, 'hhhhh', '2222', '9999333322', 'fffff', 'pks@gmail.com', 'sssss', NULL, 444, '2020-12-24 16:31:35', NULL, 1),
(14, 'hhhhh', '333', '9999333322', 'fffff', 'pks@gmail.com', 'sssss', NULL, 444, '2020-12-24 16:32:41', NULL, 1),
(15, 'hhhhh', '111cc', '9999333322', 'fffff', 'pks@gmail.com', 'sssss', NULL, 444, '2020-12-25 02:42:26', NULL, 1),
(16, 'hhhhh', '11121009', '9999333322', 'fffff', 'pks@gmail.com', 'sssss', NULL, 444, '2020-12-25 02:46:51', NULL, 1),
(17, 'kmm', '334', '9999333322', 'fffff', 'pks@gmail.com', 'sssss', NULL, 444, '2020-12-26 14:19:39', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` int(10) UNSIGNED NOT NULL,
  `expenses_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `party_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `totalamount` double NOT NULL,
  `paidamount` double NOT NULL,
  `dueamount` double NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `modified_by` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `expenses_name`, `party_name`, `totalamount`, `paidamount`, `dueamount`, `product_name`, `created_by`, `modified_by`, `created_at`, `updated_at`) VALUES
(1, 'Rent Expenses', 'House Owner', 50000, 5000, 45000, 'home', 'admin', 'admin', '2017-07-20 09:01:44', '2017-07-20 09:01:57'),
(2, 'Bill payment', 'Subusu', 4000, 4000, 0, 'Internet', 'admin', 'admin', '2017-10-28 14:52:48', '2017-10-28 15:43:32');

-- --------------------------------------------------------

--
-- Table structure for table `expensestitles`
--

CREATE TABLE `expensestitles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expensestitles`
--

INSERT INTO `expensestitles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Consumable Expenses', '2017-07-20 09:00:46', '2017-07-20 09:00:46'),
(2, 'Rent Expenses', '2017-07-20 09:00:58', '2017-07-20 09:00:58'),
(3, 'Bill payment', '2017-10-28 14:52:16', '2017-10-28 14:52:16');

-- --------------------------------------------------------

--
-- Table structure for table `gst`
--

CREATE TABLE `gst` (
  `id` int(10) UNSIGNED NOT NULL,
  `gst` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gst`
--

INSERT INTO `gst` (`id`, `gst`, `status`, `created_at`, `updated_at`) VALUES
(1, '2', 1, '2020-12-24 17:41:04', '2020-12-24 17:44:24'),
(2, '5', 1, '2020-12-24 17:44:40', '2020-12-24 17:44:40');

-- --------------------------------------------------------

--
-- Table structure for table `invoicenos`
--

CREATE TABLE `invoicenos` (
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoice_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtotal` double NOT NULL,
  `gst_total` double NOT NULL,
  `grand_total` double NOT NULL,
  `discount_amt` double NOT NULL,
  `paid_amt` double NOT NULL,
  `due_amt` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoicenos`
--

INSERT INTO `invoicenos` (`product_id`, `customer_id`, `invoice_id`, `subtotal`, `gst_total`, `grand_total`, `discount_amt`, `paid_amt`, `due_amt`, `created_at`, `updated_at`) VALUES
(NULL, '333', 'INV-001', 300132, 15002.64, 315134.64, 500, 50000, 264634.64, '2020-12-25 17:50:59', '2020-12-25 17:50:59'),
(NULL, '333', 'INV-002', 300132, 15002.64, 315134.64, 422, 50000, 264712.64, '2020-12-26 14:09:16', '2020-12-26 14:09:16'),
(NULL, '334', 'INV-003', 100000, 5000, 105000, 2000, 100000, 3000, '2020-12-26 14:21:11', '2020-12-26 14:21:11'),
(NULL, '334', 'INV-004', 100000, 5000, 105000, 0, 105000, 0, '2020-12-26 16:36:21', '2020-12-26 16:36:21');

-- --------------------------------------------------------

--
-- Table structure for table `invoiceprofiles`
--

CREATE TABLE `invoiceprofiles` (
  `id` int(10) UNSIGNED NOT NULL,
  `serialPrefix` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `serialNumberStart` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoiceNotes` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoiceTerms` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoiceprofiles`
--

INSERT INTO `invoiceprofiles` (`id`, `serialPrefix`, `serialNumberStart`, `invoiceNotes`, `invoiceTerms`, `created_at`, `updated_at`) VALUES
(1, 'INV-', '001', 'pppppppppppppppp', 'ppppppffffffffffffffff', NULL, '2020-11-26 08:27:06');

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

CREATE TABLE `materials` (
  `id` int(10) UNSIGNED NOT NULL,
  `material_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `materials`
--

INSERT INTO `materials` (`id`, `material_name`, `order_id`, `qty`, `price`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
(11, 'filter', 'WO-20201229002', '2', '1000', '2020-12-01', '2020-12-31', '2020-12-29 01:28:25', NULL),
(12, 'bolt', 'WO-20201229002', '4', '500', NULL, NULL, '2020-12-29 01:28:25', NULL),
(13, NULL, 'WO-20201229003', NULL, NULL, NULL, NULL, '2020-12-29 01:36:44', NULL),
(14, NULL, 'WO-20201229001', NULL, NULL, NULL, NULL, '2020-12-29 03:10:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 2),
(3, '2017_05_28_124228_create_roles_table', 3),
(4, '2017_05_28_124417_create_user_roles_table', 4),
(5, '2017_05_28_124654_create_permissions_table', 5),
(6, '2017_05_28_124806_create_role_permissions_table', 6),
(7, '2017_05_28_125406_create_modules_table', 7),
(8, '2017_05_28_125428_create_role_modules_table', 8),
(9, '2017_06_07_103849_create_productcategories_table', 9),
(10, '2017_06_07_103917_create_products_table', 10),
(11, '2017_06_09_071114_create_sales_table', 11),
(12, '2017_06_26_093722_create_expenses_table', 12),
(13, '2017_07_06_132245_create_salescarts_table', 13),
(14, '2017_07_06_141913_create_expensestitles_table', 14),
(15, '2017_07_07_125933_create_purchases_table', 15),
(17, '2017_07_17_084213_create_transactions_table', 16),
(18, '2020_12_23_202925_create_Servicetypes_table', 17),
(19, '2020_12_23_215804_create_clients_table', 18),
(20, '2020_12_23_222549_create_customers_table', 19),
(21, '2020_12_24_084635_add_status_to_customers_table', 20),
(22, '2020_12_24_221516_add_gst_and_customer_id_to_salescarts_table', 21),
(23, '2020_12_03_180128_create_gst_table', 22),
(24, '2020_12_24_232842_add_gst_percent_to_products_table', 23),
(25, '2020_12_25_225520_create_invoicenos_table', 24),
(26, '2020_12_25_232853_add_customer_id_to_sales_table', 25),
(27, '2020_12_26_213846_add_warenty_end_to_salescarts_table', 26),
(28, '2020_12_26_213939_add_warenty_end_to_sales_table', 26),
(29, '2020_12_27_155851_create_serviceorders_table', 27),
(30, '2020_12_28_055528_add_product_id_to_serviceorders_table', 28),
(31, '2020_12_29_045005_create_materials_table', 29),
(32, '2020_12_29_010151_create_serviceorders_table', 30);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `module_key` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `module_url` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `module_icon` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `module_rank` int(11) NOT NULL,
  `view_sidebar` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `name`, `module_key`, `module_url`, `module_icon`, `module_rank`, `view_sidebar`, `created_at`, `updated_at`) VALUES
(1, 'Dashboard', 'dashboard', 'dashboard-panel', 'fa fa-home', 1, 1, '2017-06-21 12:30:00', '2020-12-29 04:53:09'),
(2, 'User Management', 'user_management', 'user-list', 'fa fa-user', 2, 1, '2017-06-05 22:44:05', '2020-12-29 05:02:35'),
(3, 'Module Management', 'module_management', 'module-list', 'fa fa-signal', 3, 1, '2017-06-06 19:38:48', '2017-06-06 19:38:48'),
(4, 'Role Management', 'role_management', 'role-list', 'fa fa-eye', 5, 1, '2017-06-06 19:55:09', '2017-06-06 19:55:09'),
(5, 'Permission Management', 'permission_management', 'permission-list', 'fa fa-refresh', 4, 1, '2017-06-06 22:27:01', '2017-06-06 22:27:01'),
(6, 'Productcategory MGMT', 'productcategory_mgmt', 'productcategory-list', 'fa fa-flag', 6, 1, '2017-06-07 18:09:49', '2017-06-07 18:09:49'),
(7, 'Product Management', 'product_management', 'product-list', 'fa fa-product-hunt', 7, 1, '2017-06-07 18:11:25', '2017-06-07 18:11:25'),
(8, 'Sales Management', 'sales_management', 'sales-create', 'fa fa-shopping-cart', 8, 1, '2017-06-08 19:37:53', '2017-06-08 19:37:53'),
(10, 'Expenses Management', 'expenses_management', 'expenses-list', 'fa fa-usd', 10, 1, '2017-06-22 18:52:09', '2017-06-22 18:52:09'),
(14, 'Purchase Management', 'purchase_management', 'purchase-list', 'fa fa-list', 15, 1, '2017-07-07 01:23:47', '2017-07-07 01:23:47'),
(15, 'Bank Transaction', 'bank_transaction', 'transaction-list', 'fa fa-list', 17, 1, '2017-07-15 23:41:04', '2020-12-29 04:08:38'),
(16, 'Service Order', 'service_order', 'serviceorder-list', 'fa fa-dashboard', 8, 1, '2020-12-23 10:17:04', '2020-12-23 10:17:04'),
(17, 'Customer Management', 'customer_key', 'customer-list', 'fa fa-dashboard', 8, 1, '2020-12-23 16:48:05', '2020-12-29 04:10:48'),
(18, 'Setting', 'setting_key', 'setting-create', 'fa fa-dashboard', 15, 1, '2020-12-25 16:45:50', '2020-12-25 16:45:50'),
(19, 'Service Order Task', 'order-task', 'order_task', 'fa fa-dashboard', 10, 1, '2020-12-28 02:43:34', '2020-12-28 02:43:34');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permission_key` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `permission_key`, `created_at`, `updated_at`) VALUES
(1, 'Create New User', 'user-register', '2017-06-06 21:12:20', '2017-06-06 21:12:20'),
(2, 'Module Create', 'module-create', '2017-06-07 23:18:50', '2017-06-07 23:18:50'),
(3, 'Module View', 'module-list', '2017-06-07 23:19:11', '2017-06-07 23:19:11'),
(4, 'Module Delete', 'module-delete', '2017-06-07 23:19:26', '2017-06-07 23:19:26'),
(5, 'Module Edit', 'module-edit', '2017-06-07 23:19:43', '2017-06-07 23:19:43'),
(6, 'Role View', 'role-list', '2017-06-07 23:20:39', '2017-06-07 23:20:39'),
(7, 'Role Create', 'role-create', '2017-06-07 23:20:52', '2017-06-07 23:20:52'),
(8, 'Permission Asign', 'permission-asign', '2017-06-07 23:21:16', '2017-06-07 23:32:14'),
(9, 'Permission Create', 'permission-create', '2017-06-07 23:21:48', '2017-06-07 23:21:48'),
(10, 'Permission Views', 'permission-list', '2017-06-07 23:22:07', '2017-06-07 23:22:07'),
(11, 'Permission Edit', 'permission-edit', '2017-06-07 23:22:46', '2017-06-07 23:22:46'),
(12, 'Permission Delete', 'permission-delete', '2017-06-07 23:23:18', '2017-06-07 23:23:18'),
(13, 'Productcategory View', 'productcategory-list', '2017-06-07 23:33:40', '2017-06-07 23:33:40'),
(14, 'Product Category Create', 'productcategory-create', '2017-06-07 23:34:38', '2017-06-07 23:34:38'),
(15, 'Product Category Edit', 'productcategory-edit', '2017-06-07 23:35:00', '2017-06-07 23:35:00'),
(16, 'Product Category Delete', 'productcategory-delete', '2017-06-07 23:35:21', '2017-06-07 23:35:21'),
(17, 'Product View', 'product-list', '2017-06-07 23:39:33', '2017-06-07 23:39:33'),
(18, 'Product Create', 'product-create', '2017-06-07 23:39:50', '2017-06-07 23:39:50'),
(19, 'Product Edit', 'product-edit', '2017-06-07 23:40:06', '2017-06-07 23:40:06'),
(20, 'Product Delete', 'product-delete', '2017-06-07 23:40:45', '2017-06-07 23:40:45'),
(25, 'Sales view', 'sales-list', '2017-07-16 23:57:39', '2017-07-16 23:57:39'),
(26, 'Make/Create Sales', 'sales-create', '2017-07-16 23:59:43', '2017-07-16 23:59:43'),
(30, 'Purchase view', 'purchase-list', '2017-07-17 00:24:38', '2017-07-17 00:24:38'),
(31, 'Make new Purchase', 'purchase-create', '2017-07-17 00:25:03', '2017-07-17 00:25:03'),
(32, 'purchase Update/Confirm Dueamount', 'purchase-update', '2017-07-17 00:25:41', '2017-07-17 00:25:41'),
(33, 'Expenses View', 'expenses-list', '2017-07-17 00:30:32', '2017-07-17 00:30:32'),
(34, 'Expenses Create', 'expenses-create', '2017-07-17 00:31:24', '2017-07-17 00:31:24'),
(35, 'Expenses Edit', 'expenses-edit', '2017-07-17 00:31:43', '2017-07-17 00:31:43'),
(36, 'Expenses Delete', 'expenses-delete', '2017-07-17 00:32:04', '2017-07-17 00:32:04'),
(37, 'Expenses Heading Create', 'expenses-heading', '2017-07-17 00:33:34', '2017-07-17 00:33:34'),
(45, 'User Password Change', 'password-change', '2017-07-17 00:54:08', '2017-07-17 00:54:08'),
(46, 'Transcation/Bank view', 'transaction-list', '2017-07-17 22:30:39', '2017-07-17 22:30:39'),
(47, 'Transaction remaining Deposite update', 'transaction-update', '2017-07-17 22:31:56', '2017-07-17 22:31:56'),
(48, 'Transaction Entry', 'transaction-create', '2017-07-17 22:32:23', '2017-07-17 22:32:23'),
(49, 'Serviceorder-create', 'serviceorder-create', '2020-12-26 14:29:02', '2020-12-26 14:29:02');

-- --------------------------------------------------------

--
-- Table structure for table `productcategories`
--

CREATE TABLE `productcategories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_by` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `modified_by` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `productcategories`
--

INSERT INTO `productcategories` (`id`, `name`, `slug`, `status`, `created_by`, `modified_by`, `created_at`, `updated_at`) VALUES
(3, 'Food Items', 'food-items', 1, 'admin', NULL, '2017-10-28 12:15:46', '2017-10-28 12:15:46'),
(4, 'Beverages', 'beverages', 1, 'user', NULL, '2017-10-28 15:06:02', '2017-10-28 15:06:02'),
(5, 'Personal Care', 'personal-care', 1, 'admin', 'admin', '2017-10-28 15:25:40', '2017-10-28 15:32:48'),
(6, 'Bread and Bakery', 'bread-and-bakery', 1, 'admin', NULL, '2017-10-28 15:25:54', '2017-10-28 15:25:54'),
(7, 'Baby Product', 'baby-product', 1, 'admin', NULL, '2017-10-28 15:26:52', '2017-10-28 15:26:52'),
(8, 'cvsdfsdf', 'cvsdfsdf', 1, 'admin', NULL, '2017-12-21 15:38:54', '2017-12-21 15:38:54');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `productcategory_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `stock` int(11) DEFAULT NULL,
  `price` double NOT NULL,
  `gst_percent` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_by` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `modified_by` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `productcategory_id`, `name`, `code`, `quantity`, `stock`, `price`, `gst_percent`, `status`, `created_by`, `modified_by`, `created_at`, `updated_at`) VALUES
(19, 3, 'hhhhh', '11', 12, 11, 132, '2', 1, 'admin', NULL, '2020-12-25 03:07:17', '2020-12-25 15:47:15'),
(20, 5, 'kkkkkkkkkkkkkkkk mmmmmmmmmm', '112', 10, 5, 100000, '5', 1, 'admin', NULL, '2020-12-25 06:25:35', '2020-12-26 16:26:07');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` int(10) UNSIGNED NOT NULL,
  `goods_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `party_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `totalamount` double NOT NULL,
  `paidamount` double NOT NULL,
  `dueamount` double NOT NULL,
  `status` enum('vat','pan','normal') COLLATE utf8mb4_unicode_ci NOT NULL,
  `purchase_date` date NOT NULL,
  `created_by` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `modified_by` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `goods_name`, `party_name`, `totalamount`, `paidamount`, `dueamount`, `status`, `purchase_date`, `created_by`, `modified_by`, `created_at`, `updated_at`) VALUES
(1, 'Software', 'Cheetahwebtech', 500000, 500000, 0, 'vat', '2017-07-20', 'admin', NULL, '2017-07-20 09:03:02', '2017-07-20 09:03:02'),
(2, 'Other Purchase', 'Some Other', 50000, 50000, 0, 'pan', '2017-07-20', 'admin', NULL, '2017-07-20 09:03:41', '2017-10-28 14:46:18'),
(3, 'Furniture', 'Thapa furniture', 4000, 30000, -26000, 'pan', '2017-10-28', 'admin', NULL, '2017-10-28 14:50:57', '2017-10-28 14:50:57'),
(4, 'Baby Product 1 Bundel', 'Gupta wholeSell', 5000, 5000, 0, 'pan', '2017-10-28', 'admin', NULL, '2017-10-28 15:46:07', '2017-10-28 15:46:07');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', '2017-07-19 18:15:00', '2017-07-20 18:15:00'),
(2, 'Admin', '2017-07-19 18:15:00', '2017-07-20 18:15:00');

-- --------------------------------------------------------

--
-- Table structure for table `role_modules`
--

CREATE TABLE `role_modules` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `module_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_modules`
--

INSERT INTO `role_modules` (`id`, `role_id`, `module_id`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '2017-06-06 12:30:00', NULL),
(2, 2, 2, '2017-06-20 12:30:00', NULL),
(4, 1, 3, '2017-06-06 19:38:48', '2017-06-06 19:38:48'),
(5, 1, 4, '2017-06-06 19:55:09', '2017-06-06 19:55:09'),
(6, 1, 5, '2017-06-06 22:27:01', '2017-06-06 22:27:01'),
(7, 1, 6, '2017-06-07 18:09:49', '2017-06-07 18:09:49'),
(8, 2, 6, '2017-06-07 18:09:49', '2017-06-07 18:09:49'),
(9, 1, 7, '2017-06-07 18:11:25', '2017-06-07 18:11:25'),
(10, 2, 7, '2017-06-07 18:11:25', '2017-06-07 18:11:25'),
(11, 1, 8, '2017-06-08 19:37:53', '2017-06-08 19:37:53'),
(12, 2, 8, '2017-06-08 19:37:53', '2017-06-08 19:37:53'),
(15, 1, 10, '2017-06-22 18:52:09', '2017-06-22 18:52:09'),
(16, 2, 10, '2017-06-22 18:52:09', '2017-06-22 18:52:09'),
(21, 1, 14, '2017-07-07 01:23:47', '2017-07-07 01:23:47'),
(22, 2, 14, '2017-07-07 01:23:47', '2017-07-07 01:23:47'),
(23, 1, 15, '2017-07-15 23:41:04', '2017-07-15 23:41:04'),
(24, 2, 15, '2017-07-15 23:41:04', '2017-07-15 23:41:04'),
(25, 1, 16, '2020-12-23 10:17:04', '2020-12-23 10:17:04'),
(26, 2, 16, '2020-12-23 10:17:04', '2020-12-23 10:17:04'),
(27, 1, 17, '2020-12-23 16:48:05', '2020-12-23 16:48:05'),
(28, 2, 17, '2020-12-23 16:48:05', '2020-12-23 16:48:05'),
(29, 1, 18, '2020-12-25 16:45:50', '2020-12-25 16:45:50'),
(30, 2, 18, '2020-12-25 16:45:50', '2020-12-25 16:45:50'),
(31, 1, 19, '2020-12-28 02:43:34', '2020-12-28 02:43:34'),
(32, 2, 19, '2020-12-28 02:43:34', '2020-12-28 02:43:34');

-- --------------------------------------------------------

--
-- Table structure for table `role_permissions`
--

CREATE TABLE `role_permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `permission_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_permissions`
--

INSERT INTO `role_permissions` (`id`, `role_id`, `permission_id`, `created_at`, `updated_at`) VALUES
(817, 1, 1, '2017-07-17 22:32:41', '2017-07-17 22:32:41'),
(818, 1, 2, '2017-07-17 22:32:41', '2017-07-17 22:32:41'),
(819, 1, 3, '2017-07-17 22:32:41', '2017-07-17 22:32:41'),
(820, 1, 4, '2017-07-17 22:32:41', '2017-07-17 22:32:41'),
(821, 1, 5, '2017-07-17 22:32:41', '2017-07-17 22:32:41'),
(822, 1, 6, '2017-07-17 22:32:41', '2017-07-17 22:32:41'),
(823, 1, 7, '2017-07-17 22:32:41', '2017-07-17 22:32:41'),
(824, 1, 8, '2017-07-17 22:32:41', '2017-07-17 22:32:41'),
(825, 1, 9, '2017-07-17 22:32:41', '2017-07-17 22:32:41'),
(826, 1, 10, '2017-07-17 22:32:41', '2017-07-17 22:32:41'),
(827, 1, 11, '2017-07-17 22:32:41', '2017-07-17 22:32:41'),
(828, 1, 12, '2017-07-17 22:32:41', '2017-07-17 22:32:41'),
(829, 1, 13, '2017-07-17 22:32:42', '2017-07-17 22:32:42'),
(830, 1, 14, '2017-07-17 22:32:42', '2017-07-17 22:32:42'),
(831, 1, 15, '2017-07-17 22:32:42', '2017-07-17 22:32:42'),
(832, 1, 16, '2017-07-17 22:32:42', '2017-07-17 22:32:42'),
(833, 1, 17, '2017-07-17 22:32:42', '2017-07-17 22:32:42'),
(834, 1, 18, '2017-07-17 22:32:42', '2017-07-17 22:32:42'),
(835, 1, 19, '2017-07-17 22:32:42', '2017-07-17 22:32:42'),
(836, 1, 20, '2017-07-17 22:32:42', '2017-07-17 22:32:42'),
(841, 1, 25, '2017-07-17 22:32:42', '2017-07-17 22:32:42'),
(842, 1, 26, '2017-07-17 22:32:42', '2017-07-17 22:32:42'),
(846, 1, 30, '2017-07-17 22:32:42', '2017-07-17 22:32:42'),
(847, 1, 31, '2017-07-17 22:32:42', '2017-07-17 22:32:42'),
(848, 1, 32, '2017-07-17 22:32:42', '2017-07-17 22:32:42'),
(849, 1, 33, '2017-07-17 22:32:42', '2017-07-17 22:32:42'),
(850, 1, 34, '2017-07-17 22:32:42', '2017-07-17 22:32:42'),
(851, 1, 35, '2017-07-17 22:32:42', '2017-07-17 22:32:42'),
(852, 1, 36, '2017-07-17 22:32:42', '2017-07-17 22:32:42'),
(853, 1, 37, '2017-07-17 22:32:42', '2017-07-17 22:32:42'),
(861, 1, 45, '2017-07-17 22:32:42', '2017-07-17 22:32:42'),
(862, 1, 46, '2017-07-17 22:32:42', '2017-07-17 22:32:42'),
(863, 1, 47, '2017-07-17 22:32:42', '2017-07-17 22:32:42'),
(864, 1, 48, '2017-07-17 22:32:42', '2017-07-17 22:32:42'),
(894, 2, 13, '2020-12-29 03:17:49', '2020-12-29 03:17:49'),
(895, 2, 17, '2020-12-29 03:17:49', '2020-12-29 03:17:49'),
(896, 2, 18, '2020-12-29 03:17:49', '2020-12-29 03:17:49'),
(897, 2, 19, '2020-12-29 03:17:49', '2020-12-29 03:17:49'),
(898, 2, 20, '2020-12-29 03:17:49', '2020-12-29 03:17:49'),
(899, 2, 25, '2020-12-29 03:17:49', '2020-12-29 03:17:49'),
(900, 2, 26, '2020-12-29 03:17:49', '2020-12-29 03:17:49'),
(901, 2, 30, '2020-12-29 03:17:49', '2020-12-29 03:17:49'),
(902, 2, 31, '2020-12-29 03:17:50', '2020-12-29 03:17:50'),
(903, 2, 32, '2020-12-29 03:17:50', '2020-12-29 03:17:50'),
(904, 2, 33, '2020-12-29 03:17:50', '2020-12-29 03:17:50'),
(905, 2, 34, '2020-12-29 03:17:50', '2020-12-29 03:17:50'),
(906, 2, 35, '2020-12-29 03:17:50', '2020-12-29 03:17:50'),
(907, 2, 36, '2020-12-29 03:17:50', '2020-12-29 03:17:50'),
(908, 2, 37, '2020-12-29 03:17:50', '2020-12-29 03:17:50'),
(909, 2, 45, '2020-12-29 03:17:50', '2020-12-29 03:17:50');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `customer_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoice_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gst_rate` double DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `price` double NOT NULL,
  `saller_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sales_status` tinyint(1) NOT NULL DEFAULT '1',
  `sales_date` date NOT NULL,
  `warenty_end` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `product_id`, `customer_id`, `invoice_id`, `gst_rate`, `quantity`, `price`, `saller_name`, `sales_status`, `sales_date`, `warenty_end`, `created_at`, `updated_at`) VALUES
(1, 20, '333', 'INV-002', NULL, 3, 300000, 'admin', 1, '2020-12-26', '0000-00-00', '2020-12-26 14:09:16', NULL),
(2, 19, '333', 'INV-002', NULL, 1, 132, 'admin', 1, '2020-12-26', '0000-00-00', '2020-12-26 14:09:16', NULL),
(3, 20, '334', 'INV-003', NULL, 1, 100000, 'admin', 1, '2020-12-26', '0000-00-00', '2020-12-26 14:21:11', NULL),
(4, 20, '334', 'INV-004', NULL, 1, 100000, 'admin', 1, '2020-12-26', '2020-12-31', '2020-12-26 16:36:21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `salescarts`
--

CREATE TABLE `salescarts` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `customer_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `price` double NOT NULL,
  `gst` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `saller_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sales_status` tinyint(1) NOT NULL DEFAULT '1',
  `sales_date` datetime NOT NULL,
  `warenty_end` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `serviceorders`
--

CREATE TABLE `serviceorders` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoice_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `servicetype_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `technician` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_charge` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_date` date DEFAULT NULL,
  `next_servicedate` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `serviceorders`
--

INSERT INTO `serviceorders` (`id`, `customer_id`, `invoice_id`, `order_id`, `product_id`, `servicetype_id`, `description`, `contact_no`, `status`, `technician`, `service_charge`, `service_date`, `next_servicedate`, `created_at`, `updated_at`) VALUES
(1, '334', 'INV-003', 'WO-20201229001', '20', '1', 'gggggggggggggggggggggggg', '900000000', 0, 'Grocery System', '500', '2020-12-29', '2020-12-31', '2020-12-29 01:24:49', NULL),
(2, '333', 'INV-002', 'WO-20201229002', '20', '3', 'lllllllllllllllllllllllll', '900000000', 0, 'User Admin', '1000', '2020-12-29', '2020-12-31', '2020-12-29 01:25:30', NULL),
(3, '333', 'INV-002', 'WO-20201229003', '20', '1', 'jjjjjjjjjjj', '900000000', 2, 'Grocery System', NULL, '2020-12-29', NULL, '2020-12-29 01:33:05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `servicetypes`
--

CREATE TABLE `servicetypes` (
  `id` int(10) UNSIGNED NOT NULL,
  `type_name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_by` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `modified_by` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `servicetypes`
--

INSERT INTO `servicetypes` (`id`, `type_name`, `slug`, `status`, `created_by`, `modified_by`, `created_at`, `updated_at`) VALUES
(1, 'Service Order1', 'service-order1', 1, 'admin', NULL, '2020-12-23 15:29:06', NULL),
(3, 'Service Order2', 'service-order2', 1, 'admin', NULL, '2020-12-23 15:29:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(10) UNSIGNED NOT NULL,
  `totalamount` double NOT NULL,
  `depositeamount` double NOT NULL,
  `remainingamount` double NOT NULL,
  `deposite_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deposite_date` date NOT NULL,
  `bank_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `modified_by` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `last_login`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Grocery System', 'admin', 'nagarikbazar@gmail.com', '$2y$10$T/AO49e7BmIC9aUG/33mAOdy9yDm/SUGUZC5zU.3Gtj4Lvvf.27My', '2020-12-29 10:33:00', 1, '12345678', '2017-06-05 21:35:29', '2020-12-29 05:03:00'),
(2, 'User Admin', 'user', 'nagarikbazar1@testtest.com', '$2y$10$T/AO49e7BmIC9aUG/33mAOdy9yDm/SUGUZC5zU.3Gtj4Lvvf.27My', '2020-12-29 06:57:01', 1, '12345678', '2017-06-06 19:47:19', '2020-12-29 01:27:01'),
(3, 'kmm', '123456789', 'kmmadmin@app.com', '$2y$10$CCEq3nWq3XO4U7jYEuf2COJ4P.XIZQckRW1Tpwy1/2y2TexkgaKGa', NULL, 1, NULL, '2020-12-29 05:25:01', '2020-12-29 05:25:01'),
(4, 'kmm1', 'admin1', 'kmmadmi1n@app.com', '$2y$10$zw5aHu0tap7P9G3DvEbbQOyvcKdxjg0cX92BK/bNnuntPG2h99hrC', NULL, 1, '1234567890', '2020-12-29 05:27:46', '2020-12-29 05:27:46');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`id`, `role_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2017-06-05 21:35:29', '2017-06-05 21:35:29'),
(2, 2, 2, '2017-06-06 19:47:19', '2017-06-06 19:47:19'),
(3, 2, 3, '2020-12-29 05:25:01', '2020-12-29 05:25:01'),
(4, 2, 4, '2020-12-29 05:27:46', '2020-12-29 05:27:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `expenses_created_by_foreign` (`created_by`),
  ADD KEY `expenses_modified_by_foreign` (`modified_by`);

--
-- Indexes for table `expensestitles`
--
ALTER TABLE `expensestitles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gst`
--
ALTER TABLE `gst`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `modules_name_unique` (`name`),
  ADD UNIQUE KEY `modules_module_key_unique` (`module_key`),
  ADD UNIQUE KEY `modules_module_url_unique` (`module_url`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`(191));

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`),
  ADD UNIQUE KEY `permissions_permission_key_unique` (`permission_key`);

--
-- Indexes for table `productcategories`
--
ALTER TABLE `productcategories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `productcategories_slug_unique` (`slug`),
  ADD KEY `productcategories_created_by_foreign` (`created_by`),
  ADD KEY `productcategories_modified_by_foreign` (`modified_by`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_code_unique` (`code`),
  ADD KEY `products_productcategory_id_foreign` (`productcategory_id`),
  ADD KEY `products_created_by_foreign` (`created_by`),
  ADD KEY `products_modified_by_foreign` (`modified_by`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchases_created_by_foreign` (`created_by`),
  ADD KEY `purchases_modified_by_foreign` (`modified_by`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_modules`
--
ALTER TABLE `role_modules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_modules_role_id_foreign` (`role_id`),
  ADD KEY `role_modules_module_id_foreign` (`module_id`);

--
-- Indexes for table `role_permissions`
--
ALTER TABLE `role_permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_permissions_role_id_foreign` (`role_id`),
  ADD KEY `role_permissions_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sales_product_id_foreign` (`product_id`);

--
-- Indexes for table `salescarts`
--
ALTER TABLE `salescarts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `salescarts_product_id_foreign` (`product_id`);

--
-- Indexes for table `serviceorders`
--
ALTER TABLE `serviceorders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `servicetypes`
--
ALTER TABLE `servicetypes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `servicetypes_slug_unique` (`slug`),
  ADD KEY `servicetypes_created_by_foreign` (`created_by`),
  ADD KEY `servicetypes_modified_by_foreign` (`modified_by`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_created_by_foreign` (`created_by`),
  ADD KEY `transactions_modified_by_foreign` (`modified_by`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_roles_role_id_foreign` (`role_id`),
  ADD KEY `user_roles_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `expensestitles`
--
ALTER TABLE `expensestitles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `gst`
--
ALTER TABLE `gst`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `materials`
--
ALTER TABLE `materials`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `productcategories`
--
ALTER TABLE `productcategories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `role_modules`
--
ALTER TABLE `role_modules`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `role_permissions`
--
ALTER TABLE `role_permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=910;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `salescarts`
--
ALTER TABLE `salescarts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `serviceorders`
--
ALTER TABLE `serviceorders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `servicetypes`
--
ALTER TABLE `servicetypes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `expenses`
--
ALTER TABLE `expenses`
  ADD CONSTRAINT `expenses_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`username`) ON UPDATE CASCADE,
  ADD CONSTRAINT `expenses_modified_by_foreign` FOREIGN KEY (`modified_by`) REFERENCES `users` (`username`) ON UPDATE CASCADE;

--
-- Constraints for table `productcategories`
--
ALTER TABLE `productcategories`
  ADD CONSTRAINT `productcategories_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`username`) ON UPDATE CASCADE,
  ADD CONSTRAINT `productcategories_modified_by_foreign` FOREIGN KEY (`modified_by`) REFERENCES `users` (`username`) ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`username`) ON UPDATE CASCADE,
  ADD CONSTRAINT `products_modified_by_foreign` FOREIGN KEY (`modified_by`) REFERENCES `users` (`username`) ON UPDATE CASCADE,
  ADD CONSTRAINT `products_productcategory_id_foreign` FOREIGN KEY (`productcategory_id`) REFERENCES `productcategories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `purchases`
--
ALTER TABLE `purchases`
  ADD CONSTRAINT `purchases_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`username`) ON UPDATE CASCADE,
  ADD CONSTRAINT `purchases_modified_by_foreign` FOREIGN KEY (`modified_by`) REFERENCES `users` (`username`) ON UPDATE CASCADE;

--
-- Constraints for table `role_modules`
--
ALTER TABLE `role_modules`
  ADD CONSTRAINT `role_modules_module_id_foreign` FOREIGN KEY (`module_id`) REFERENCES `modules` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_modules_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_permissions`
--
ALTER TABLE `role_permissions`
  ADD CONSTRAINT `role_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `salescarts`
--
ALTER TABLE `salescarts`
  ADD CONSTRAINT `salescarts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `servicetypes`
--
ALTER TABLE `servicetypes`
  ADD CONSTRAINT `servicetypes_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`username`) ON UPDATE CASCADE,
  ADD CONSTRAINT `servicetypes_modified_by_foreign` FOREIGN KEY (`modified_by`) REFERENCES `users` (`username`) ON UPDATE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`username`) ON UPDATE CASCADE,
  ADD CONSTRAINT `transactions_modified_by_foreign` FOREIGN KEY (`modified_by`) REFERENCES `users` (`username`) ON UPDATE CASCADE;

--
-- Constraints for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD CONSTRAINT `user_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
