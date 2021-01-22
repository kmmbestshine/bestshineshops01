-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2020 at 01:33 AM
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
-- Database: `kmmsupermarket001`
--

-- --------------------------------------------------------

--
-- Table structure for table `advanced_salaries`
--

CREATE TABLE `advanced_salaries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL,
  `month` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `advanced_salary` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `advanced_salaries`
--

INSERT INTO `advanced_salaries` (`id`, `employee_id`, `month`, `year`, `advanced_salary`, `created_at`, `updated_at`) VALUES
(3, 3, 'november', '2020', '100', '2020-11-29 15:09:54', '2020-11-29 15:09:54'),
(4, 1, 'october', '2020', '100', '2020-11-29 15:13:21', '2020-11-29 15:13:21');

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `attendance` tinyint(4) NOT NULL,
  `date` date NOT NULL,
  `month` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendances`
--

INSERT INTO `attendances` (`id`, `employee_id`, `attendance`, `date`, `month`, `year`, `created_at`, `updated_at`) VALUES
(4, 1, 1, '2020-11-29', 'november', '2020', '2020-11-29 12:59:22', '2020-11-29 12:59:22'),
(5, 2, 0, '2020-11-29', 'november', '2020', '2020-11-29 12:59:22', '2020-11-29 12:59:22'),
(6, 3, 1, '2020-11-29', 'november', '2020', '2020-11-29 12:59:22', '2020-11-29 12:59:22');

-- --------------------------------------------------------

--
-- Table structure for table `companyprofiles`
--

CREATE TABLE `companyprofiles` (
  `id` int(10) UNSIGNED NOT NULL,
  `businessName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gstin` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `panNumber` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `placeOfOrigin` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bankName` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bankAccount` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bankIfsc` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bankBranch` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logoPath` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companyprofiles`
--

INSERT INTO `companyprofiles` (`id`, `businessName`, `address`, `gstin`, `panNumber`, `placeOfOrigin`, `bankName`, `bankAccount`, `bankIfsc`, `bankBranch`, `logoPath`, `created_at`, `updated_at`) VALUES
(1, 'kmm company', 'suraikayur', '12345678', 'PAN1234', 'SURAIKAYUR', 'IOB BANK', '123456789', 'iob12345', 'NAKKAMBADI', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gstin` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `person` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pan` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pincode` varchar(6) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `gstin`, `country`, `state`, `person`, `mobile`, `pan`, `address`, `pincode`, `city`, `email`, `created_at`, `updated_at`) VALUES
(1, 'kmm customer', '5555555555', 'india', 'Kerala', 'ggggg', '09000033333', 'aa111111', 'ddddddd', '612203', 'suraikayur', 'kmm@gmail.com', '2020-11-26 17:32:57', '2020-11-26 17:32:57'),
(2, 'jjj', 'sss2222', 'india', 'ttt', 'sss', '9999992222', 'dd111', 'kkk', NULL, 'jj', NULL, '2020-11-29 02:31:42', '2020-11-29 02:31:42'),
(3, 'jjj', 'sss2222', 'india', 'ttt', 'sss', '9999992222', 'dd111', 'kkk', NULL, 'jj', NULL, '2020-11-29 02:35:51', '2020-11-29 02:35:51'),
(4, 'jjj1111', 'sss2222', 'india', 'ttt', 'sss', '9999992223', 'dd111', 'kkk', NULL, 'jj', NULL, '2020-11-29 02:42:40', '2020-11-29 02:42:40'),
(5, 'jjjnew', 'sss2222', 'india', 'ttt', 'sss', '9999992222', 'dd111', 'kkk', NULL, 'jj', NULL, '2020-11-29 02:54:08', '2020-11-29 02:54:08'),
(6, 'jjjnew', 'sss2222', 'india', 'ttt', 'sss', '9999992222', 'dd111', 'kkk', NULL, 'jj', NULL, '2020-11-29 03:06:09', '2020-11-29 03:06:09'),
(7, 'jjj1111', 'sss2222', 'india', 'ttt', 'sss', '9999992222', 'dd111', 'kkk', NULL, 'jj', NULL, '2020-11-29 03:09:02', '2020-11-29 03:09:02'),
(8, 'kmm', 'oooo', 'india', 'yy', 'pp', '5555522222', 'oooo', 'iiiiiii', NULL, 'uu', NULL, '2020-11-29 03:18:14', '2020-11-29 03:18:14'),
(9, 'kmm1', 'kkkk', 'india', 'jjj', 'll', '8888855555', 'jjj', 'hhhh', NULL, 'lll', NULL, '2020-11-29 03:20:28', '2020-11-29 03:20:28'),
(10, 'kmm1', 'kkkk', 'india', 'jjj', 'll', '8888855555', 'jjj', 'hhhh', NULL, 'lll', NULL, '2020-11-29 03:20:55', '2020-11-29 03:20:55'),
(11, 'jjjnew', 'oooo', 'india', 'ttt', 'sss', '9999992222', 'jjj', 'kkk', NULL, 'jj', NULL, '2020-11-29 03:27:13', '2020-11-29 03:27:13'),
(12, 'kmm1', 'kkkk', 'india', 'ttt', 'sss', '9999992222', 'oooo', 'kkk', NULL, 'jj', NULL, '2020-11-29 03:30:48', '2020-11-29 03:30:48'),
(13, 'kmm1', 'kkkk', 'india', 'ttt', 'sss', '9999992222', 'oooo', 'kkk', NULL, 'jj', NULL, '2020-11-29 03:31:37', '2020-11-29 03:31:37'),
(14, 'jjj1111', 'sss2222', 'india', 'ttt', 'sss', '9999992222', 'dd111', 'kkk', NULL, 'jj', NULL, '2020-11-29 03:32:43', '2020-11-29 03:32:43'),
(15, 'kmm1', 'kkkk', 'india', 'ttt', 'sss', '9999992222', 'jjj', 'kkk', NULL, 'jj', NULL, '2020-11-29 03:44:58', '2020-11-29 03:44:58'),
(16, 'kmm1', 'kkkk', 'india', 'ttt', 'sss', '9999992222', 'jjj', 'kkk', NULL, 'jj', NULL, '2020-11-29 03:45:54', '2020-11-29 03:45:54'),
(17, 'kmm', 'kkkk', 'india', 'ttt', 'sss', '9999992222', 'oooo', 'kkk', NULL, 'jj', NULL, '2020-11-29 03:46:24', '2020-11-29 03:46:24'),
(18, 'kmm', 'kkkk', 'india', 'ttt', 'sss', '9999992222', 'oooo', 'kkk', NULL, 'jj', NULL, '2020-11-29 03:48:19', '2020-11-29 03:48:19'),
(19, 'kmm', 'kkkk', 'india', 'ttt', 'sss', '9999992222', 'oooo', 'kkk', NULL, 'jj', NULL, '2020-11-29 03:49:44', '2020-11-29 03:49:44'),
(20, 'jjj1111', 'sss2222', 'india', 'ttt', 'sss', '9999992222', 'dd111', 'kkk', NULL, 'jj', NULL, '2020-11-29 04:40:40', '2020-11-29 04:40:40');

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
(1, 'Rent Expenses', 'House Owner', 50000, 5000, 45000, 'home', 'Superadmin', 'Superadmin', '2017-07-20 09:01:44', '2017-07-20 09:01:57'),
(2, 'Bill payment', 'Subusu', 4000, 4000, 0, 'Internet', 'Superadmin', 'Superadmin', '2017-10-28 14:52:48', '2017-10-28 15:43:32');

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
(1, 'INV-', '001', 'pppppppppppppppp', 'ppppppffffffffffffffff', NULL, '2020-11-26 13:57:06');

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
(18, '2020_11_24_175022_add_type_and_unit_to_products_table', 17),
(19, '2020_11_25_151505_add_taxrate_and_unit_to_salescarts_table', 18),
(20, '2020_11_25_164210_add_taxRate_and_unit_to_sales_table', 19),
(21, '2020_11_25_174348_add_salevalue_to_salescarts_table', 19),
(22, '2020_11_26_115144_create_profile_setts_table', 20),
(23, '2020_11_26_142222_create_companyprofiles_table', 21),
(24, '2020_11_26_194615_create_customers_table', 22),
(25, '2020_11_29_082648_add_customer_id_to_sales_table', 23),
(26, '2020_11_29_192146_create_advanced_salaries_table', 24);

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
(1, 'Dashboard', 'dashboard', 'dashboard-panel', 'fa fa-home', 1, 1, '2017-06-21 12:30:00', NULL),
(3, 'Module Management', 'module_management', 'module-list', 'fa fa-signal', 3, 1, '2017-06-06 19:38:48', '2017-06-06 19:38:48'),
(4, 'Role Management', 'role_management', 'role-list', 'fa fa-eye', 5, 1, '2017-06-06 19:55:09', '2017-06-06 19:55:09'),
(5, 'Permission Management', 'permission_management', 'permission-list', 'fa fa-refresh', 4, 1, '2017-06-06 22:27:01', '2017-06-06 22:27:01'),
(6, 'Productcategory MGMT', 'productcategory_mgmt', 'productcategory-list', 'fa fa-flag', 6, 1, '2017-06-07 18:09:49', '2017-06-07 18:09:49'),
(7, 'Product Management', 'product_management', 'product-list', 'fa fa-product-hunt', 7, 1, '2017-06-07 18:11:25', '2017-06-07 18:11:25'),
(8, 'Sales Management', 'sales_management', 'sales-create', 'fa fa-shopping-cart', 8, 1, '2017-06-08 19:37:53', '2017-06-08 19:37:53'),
(10, 'Expenses Management', 'expenses_management', 'expenses-list', 'fa fa-usd', 10, 1, '2017-06-22 18:52:09', '2017-06-22 18:52:09'),
(14, 'Purchase Management', 'purchase_management', 'purchase-list', 'fa fa-list', 15, 1, '2017-07-07 01:23:47', '2017-07-07 01:23:47'),
(15, 'Bank Transaction', 'bank_transaction', 'transaction-list', 'fa fa-list', 17, 1, '2017-07-15 23:41:04', '2020-11-29 07:02:05'),
(18, 'Customer Management', 'customer_key', 'customer-list', 'fa fa-dashboard', 9, 1, '2020-11-26 14:23:58', '2020-11-26 14:23:58'),
(19, 'User Management', 'user_management', 'user-list', 'fa fa-dashboard', 2, 1, '2020-11-29 06:11:55', '2020-11-29 06:11:55'),
(20, 'Employee Attendance', 'attendance_key', 'attendance_create', 'fa fa-dashboard', 21, 1, '2020-11-29 10:58:48', '2020-11-29 10:58:48'),
(21, 'Advanced Salary', 'advanced_salary', 'advsalary-create', 'fa fa-dashboard', 22, 1, '2020-11-29 13:41:32', '2020-11-29 13:41:32'),
(22, 'Salary', 'salary-create', 'salary-create', 'fa fa-dashboard', 24, 1, '2020-11-29 15:32:56', '2020-11-29 15:32:56');

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
(50, 'Create Customer', 'customer-create', '2020-11-29 04:28:33', '2020-11-29 04:28:33'),
(51, 'List Customer', 'customer-list', '2020-11-29 04:30:59', '2020-11-29 04:30:59'),
(52, 'View Customer', 'customer-show', '2020-11-29 04:31:31', '2020-11-29 04:31:31'),
(53, 'Edit Customer', 'customer-edit', '2020-11-29 04:32:04', '2020-11-29 04:32:04'),
(54, 'Users List', 'user-list', '2020-11-29 06:13:24', '2020-11-29 06:13:24'),
(55, 'Create User', 'user-register', '2020-11-29 06:15:02', '2020-11-29 06:15:02'),
(56, 'User Edit', 'user-edit', '2020-11-29 06:15:40', '2020-11-29 06:15:40'),
(57, 'User Delete', 'user-delete', '2020-11-29 06:16:08', '2020-11-29 06:16:08');

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
(3, 'Food Items', 'food-items', 1, 'Superadmin', NULL, '2017-10-28 12:15:46', '2017-10-28 12:15:46'),
(4, 'Beverages', 'beverages', 1, 'user', NULL, '2017-10-28 15:06:02', '2017-10-28 15:06:02'),
(5, 'Personal Care', 'personal-care', 1, 'Superadmin', 'Superadmin', '2017-10-28 15:25:40', '2017-10-28 15:32:48'),
(6, 'Bread and Bakery', 'bread-and-bakery', 1, 'Superadmin', NULL, '2017-10-28 15:25:54', '2017-10-28 15:25:54'),
(7, 'Baby Product', 'baby-product', 1, 'Superadmin', NULL, '2017-10-28 15:26:52', '2017-10-28 15:26:52'),
(8, 'cvsdfsdf', 'cvsdfsdf', 1, 'Superadmin', NULL, '2017-12-21 15:38:54', '2017-12-21 15:38:54');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `productcategory_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('goods','service') COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit` char(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discountRate` decimal(4,2) NOT NULL,
  `taxRate` decimal(4,2) NOT NULL,
  `cessValue` decimal(10,2) NOT NULL,
  `code` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `stock` int(11) DEFAULT NULL,
  `price` double NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_by` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `modified_by` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `productcategory_id`, `name`, `type`, `unit`, `discountRate`, `taxRate`, `cessValue`, `code`, `quantity`, `stock`, `price`, `status`, `created_by`, `modified_by`, `created_at`, `updated_at`) VALUES
(13, 3, 'kmm good', 'goods', 'GMS', '0.00', '0.00', '0.00', 'kmm001', 50, 42, 50, 1, 'Superadmin', NULL, '2020-11-24 12:33:34', '2020-11-28 16:58:14'),
(14, 3, 'kmm good1', 'goods', 'GMS', '0.00', '3.00', '0.00', 'kmm002', 100, 74, 10, 1, 'Superadmin', NULL, '2020-11-24 12:35:25', '2020-11-29 03:50:01'),
(15, 3, 'hhhhhhhhhhhhhh hhhhhhhhhhhhhhhhh', 'goods', 'GMS', '0.00', '18.00', '0.00', 'kmm003', 30, 15, 10, 1, 'Superadmin', NULL, '2020-11-24 15:26:22', '2020-11-29 03:35:31');

-- --------------------------------------------------------

--
-- Table structure for table `profile_setts`
--

CREATE TABLE `profile_setts` (
  `id` int(10) UNSIGNED NOT NULL,
  `businessName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gstin` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `panNumber` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `placeOfOrigin` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bankName` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bankAccount` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bankIfsc` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bankBranch` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logoPath` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, 'Software', 'Cheetahwebtech', 500000, 500000, 0, 'vat', '2017-07-20', 'Superadmin', NULL, '2017-07-20 09:03:02', '2017-07-20 09:03:02'),
(2, 'Other Purchase', 'Some Other', 50000, 50000, 0, 'pan', '2017-07-20', 'Superadmin', NULL, '2017-07-20 09:03:41', '2017-10-28 14:46:18'),
(3, 'Furniture', 'Thapa furniture', 4000, 30000, -26000, 'pan', '2017-10-28', 'Superadmin', NULL, '2017-10-28 14:50:57', '2017-10-28 14:50:57'),
(4, 'Baby Product 1 Bundel', 'Gupta wholeSell', 5000, 5000, 0, 'pan', '2017-10-28', 'Superadmin', NULL, '2017-10-28 15:46:07', '2017-10-28 15:46:07');

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
(2, 'Admin', '2017-07-19 18:15:00', '2017-07-20 18:15:00'),
(3, 'user', '2020-11-29 04:32:29', '2020-11-29 04:32:29');

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
(1, 1, 1, '2017-06-06 12:30:00', NULL),
(2, 2, 1, '2017-06-20 12:30:00', NULL),
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
(23, 3, 15, '2017-07-15 23:41:04', '2020-11-29 07:02:06'),
(24, 2, 15, '2017-07-15 23:41:04', '2017-07-15 23:41:04'),
(29, 1, 18, '2020-11-26 14:23:58', '2020-11-26 14:23:58'),
(30, 2, 18, '2020-11-26 14:23:59', '2020-11-26 14:23:59'),
(31, 1, 19, '2020-11-29 06:11:55', '2020-11-29 06:11:55'),
(32, 2, 19, '2020-11-29 06:11:55', '2020-11-29 06:11:55'),
(33, 3, 19, '2020-11-29 06:11:55', '2020-11-29 06:11:55'),
(34, 1, 20, '2020-11-29 10:58:48', '2020-11-29 10:58:48'),
(35, 2, 20, '2020-11-29 10:58:48', '2020-11-29 10:58:48'),
(36, 3, 20, '2020-11-29 10:58:48', '2020-11-29 10:58:48'),
(37, 1, 21, '2020-11-29 13:41:32', '2020-11-29 13:41:32'),
(38, 2, 21, '2020-11-29 13:41:33', '2020-11-29 13:41:33'),
(39, 3, 21, '2020-11-29 13:41:33', '2020-11-29 13:41:33'),
(40, 1, 22, '2020-11-29 15:32:56', '2020-11-29 15:32:56'),
(41, 2, 22, '2020-11-29 15:32:56', '2020-11-29 15:32:56'),
(42, 3, 22, '2020-11-29 15:32:56', '2020-11-29 15:32:56');

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
(875, 2, 13, '2017-10-28 14:45:43', '2017-10-28 14:45:43'),
(876, 2, 14, '2017-10-28 14:45:43', '2017-10-28 14:45:43'),
(877, 2, 15, '2017-10-28 14:45:43', '2017-10-28 14:45:43'),
(878, 2, 16, '2017-10-28 14:45:43', '2017-10-28 14:45:43'),
(879, 2, 17, '2017-10-28 14:45:43', '2017-10-28 14:45:43'),
(880, 2, 18, '2017-10-28 14:45:43', '2017-10-28 14:45:43'),
(881, 2, 19, '2017-10-28 14:45:43', '2017-10-28 14:45:43'),
(882, 2, 20, '2017-10-28 14:45:43', '2017-10-28 14:45:43'),
(883, 2, 25, '2017-10-28 14:45:43', '2017-10-28 14:45:43'),
(884, 2, 26, '2017-10-28 14:45:43', '2017-10-28 14:45:43'),
(885, 2, 30, '2017-10-28 14:45:43', '2017-10-28 14:45:43'),
(886, 2, 31, '2017-10-28 14:45:43', '2017-10-28 14:45:43'),
(887, 2, 32, '2017-10-28 14:45:43', '2017-10-28 14:45:43'),
(888, 2, 33, '2017-10-28 14:45:43', '2017-10-28 14:45:43'),
(889, 2, 34, '2017-10-28 14:45:43', '2017-10-28 14:45:43'),
(890, 2, 35, '2017-10-28 14:45:43', '2017-10-28 14:45:43'),
(891, 2, 36, '2017-10-28 14:45:43', '2017-10-28 14:45:43'),
(892, 2, 37, '2017-10-28 14:45:43', '2017-10-28 14:45:43'),
(893, 2, 45, '2017-10-28 14:45:43', '2017-10-28 14:45:43'),
(916, 1, 2, '2020-11-29 06:16:45', '2020-11-29 06:16:45'),
(917, 1, 3, '2020-11-29 06:16:45', '2020-11-29 06:16:45'),
(918, 1, 4, '2020-11-29 06:16:46', '2020-11-29 06:16:46'),
(919, 1, 5, '2020-11-29 06:16:46', '2020-11-29 06:16:46'),
(920, 1, 6, '2020-11-29 06:16:46', '2020-11-29 06:16:46'),
(921, 1, 7, '2020-11-29 06:16:46', '2020-11-29 06:16:46'),
(922, 1, 8, '2020-11-29 06:16:46', '2020-11-29 06:16:46'),
(923, 1, 9, '2020-11-29 06:16:46', '2020-11-29 06:16:46'),
(924, 1, 10, '2020-11-29 06:16:46', '2020-11-29 06:16:46'),
(925, 1, 11, '2020-11-29 06:16:46', '2020-11-29 06:16:46'),
(926, 1, 12, '2020-11-29 06:16:46', '2020-11-29 06:16:46'),
(927, 1, 13, '2020-11-29 06:16:46', '2020-11-29 06:16:46'),
(928, 1, 14, '2020-11-29 06:16:46', '2020-11-29 06:16:46'),
(929, 1, 15, '2020-11-29 06:16:46', '2020-11-29 06:16:46'),
(930, 1, 16, '2020-11-29 06:16:46', '2020-11-29 06:16:46'),
(931, 1, 17, '2020-11-29 06:16:46', '2020-11-29 06:16:46'),
(932, 1, 18, '2020-11-29 06:16:46', '2020-11-29 06:16:46'),
(933, 1, 19, '2020-11-29 06:16:46', '2020-11-29 06:16:46'),
(934, 1, 20, '2020-11-29 06:16:46', '2020-11-29 06:16:46'),
(935, 1, 25, '2020-11-29 06:16:46', '2020-11-29 06:16:46'),
(936, 1, 26, '2020-11-29 06:16:46', '2020-11-29 06:16:46'),
(937, 1, 30, '2020-11-29 06:16:46', '2020-11-29 06:16:46'),
(938, 1, 31, '2020-11-29 06:16:46', '2020-11-29 06:16:46'),
(939, 1, 32, '2020-11-29 06:16:46', '2020-11-29 06:16:46'),
(940, 1, 33, '2020-11-29 06:16:46', '2020-11-29 06:16:46'),
(941, 1, 34, '2020-11-29 06:16:46', '2020-11-29 06:16:46'),
(942, 1, 35, '2020-11-29 06:16:47', '2020-11-29 06:16:47'),
(943, 1, 36, '2020-11-29 06:16:47', '2020-11-29 06:16:47'),
(944, 1, 37, '2020-11-29 06:16:47', '2020-11-29 06:16:47'),
(945, 1, 45, '2020-11-29 06:16:47', '2020-11-29 06:16:47'),
(946, 1, 46, '2020-11-29 06:16:47', '2020-11-29 06:16:47'),
(947, 1, 47, '2020-11-29 06:16:47', '2020-11-29 06:16:47'),
(948, 1, 48, '2020-11-29 06:16:47', '2020-11-29 06:16:47'),
(949, 1, 50, '2020-11-29 06:16:47', '2020-11-29 06:16:47'),
(950, 1, 51, '2020-11-29 06:16:47', '2020-11-29 06:16:47'),
(951, 1, 52, '2020-11-29 06:16:47', '2020-11-29 06:16:47'),
(952, 1, 53, '2020-11-29 06:16:47', '2020-11-29 06:16:47'),
(953, 1, 54, '2020-11-29 06:16:47', '2020-11-29 06:16:47'),
(954, 1, 55, '2020-11-29 06:16:47', '2020-11-29 06:16:47'),
(955, 1, 56, '2020-11-29 06:16:47', '2020-11-29 06:16:47'),
(956, 1, 57, '2020-11-29 06:16:47', '2020-11-29 06:16:47'),
(957, 3, 25, '2020-11-29 06:19:27', '2020-11-29 06:19:27'),
(958, 3, 26, '2020-11-29 06:19:27', '2020-11-29 06:19:27'),
(959, 3, 30, '2020-11-29 06:19:27', '2020-11-29 06:19:27'),
(960, 3, 32, '2020-11-29 06:19:27', '2020-11-29 06:19:27'),
(961, 3, 33, '2020-11-29 06:19:27', '2020-11-29 06:19:27'),
(962, 3, 34, '2020-11-29 06:19:27', '2020-11-29 06:19:27'),
(963, 3, 50, '2020-11-29 06:19:28', '2020-11-29 06:19:28'),
(964, 3, 51, '2020-11-29 06:19:28', '2020-11-29 06:19:28'),
(965, 3, 52, '2020-11-29 06:19:28', '2020-11-29 06:19:28'),
(966, 3, 53, '2020-11-29 06:19:28', '2020-11-29 06:19:28'),
(967, 3, 54, '2020-11-29 06:19:28', '2020-11-29 06:19:28'),
(968, 3, 55, '2020-11-29 06:19:28', '2020-11-29 06:19:28'),
(969, 3, 56, '2020-11-29 06:19:28', '2020-11-29 06:19:28'),
(970, 3, 57, '2020-11-29 06:19:28', '2020-11-29 06:19:28');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `pro_value` decimal(10,2) DEFAULT NULL,
  `price` double NOT NULL,
  `unit` char(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gstvalue` decimal(4,2) NOT NULL,
  `saleValue` decimal(10,2) NOT NULL,
  `grossvalue` decimal(10,2) DEFAULT NULL,
  `saller_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sales_status` tinyint(1) NOT NULL DEFAULT '1',
  `sales_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `customer_id`, `product_id`, `quantity`, `pro_value`, `price`, `unit`, `gstvalue`, `saleValue`, `grossvalue`, `saller_name`, `sales_status`, `sales_date`, `created_at`, `updated_at`) VALUES
(28, NULL, 14, 1, NULL, 10, 'GMS', '0.30', '10.30', NULL, 'admin', 1, '2020-11-29', '2020-11-29 03:32:43', '2020-11-29 03:32:43'),
(29, '18', 14, 1, NULL, 10, 'GMS', '0.30', '10.30', NULL, 'admin', 1, '2020-11-29', NULL, NULL),
(30, '18', 15, 5, NULL, 50, 'GMS', '9.00', '59.00', NULL, 'admin', 1, '2020-11-29', NULL, NULL),
(31, '18', 14, 1, NULL, 10, 'GMS', '0.30', '10.30', NULL, 'admin', 1, '2020-11-29', NULL, NULL),
(32, '18', 14, 1, NULL, 10, 'GMS', '0.30', '10.30', NULL, 'admin', 1, '2020-11-29', NULL, NULL),
(33, '19', 14, 1, NULL, 10, 'GMS', '0.30', '10.30', NULL, 'admin', 1, '2020-11-29', NULL, NULL),
(34, '19', 15, 5, NULL, 50, 'GMS', '9.00', '59.00', NULL, 'admin', 1, '2020-11-29', NULL, NULL),
(35, '19', 14, 1, NULL, 10, 'GMS', '0.30', '10.30', NULL, 'admin', 1, '2020-11-29', NULL, NULL),
(36, '19', 14, 1, NULL, 10, 'GMS', '0.30', '10.30', NULL, 'admin', 1, '2020-11-29', NULL, NULL),
(37, 'Nil', 14, 1, NULL, 10, 'GMS', '0.30', '10.30', NULL, 'admin', 1, '2020-11-29', NULL, NULL),
(38, '20', 14, 1, NULL, 10, 'GMS', '0.30', '10.30', NULL, 'admin', 1, '2020-11-29', NULL, NULL),
(39, '20', 15, 5, NULL, 50, 'GMS', '9.00', '59.00', NULL, 'admin', 1, '2020-11-29', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `salescarts`
--

CREATE TABLE `salescarts` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double NOT NULL,
  `unit` char(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `taxRate` decimal(4,2) NOT NULL,
  `saleValue` decimal(10,2) NOT NULL,
  `saller_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sales_status` tinyint(1) NOT NULL DEFAULT '1',
  `sales_date` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, 'BSS Bazar', 'Superadmin', 'nagarikbazar@gmail.com', '$2y$10$T/AO49e7BmIC9aUG/33mAOdy9yDm/SUGUZC5zU.3Gtj4Lvvf.27My', '2020-11-30 05:22:43', 1, 'RBlCH2vA4rWcMHFjYKll3dhSiGbiFB2EWKzC5IryaXrDfpYfUQKcz0hRHQED', '2017-06-05 21:35:29', '2020-11-29 23:52:43'),
(2, 'User Admin', 'user', 'nagarikbazar1@testtest.com', '$2y$10$T/AO49e7BmIC9aUG/33mAOdy9yDm/SUGUZC5zU.3Gtj4Lvvf.27My', '2020-11-29 10:35:14', 1, 't4d8hhkDCOcbq3ASUlkwEHtPb69jZoq16Kl53SpfR9CkHxQd8HW8NwcyghQu', '2017-06-06 19:47:19', '2020-11-29 05:05:14'),
(3, 'kmm user', 'kmmuser', 'kmm@gmail.com', '$2y$10$GWz9QLjbZeWO0tpFWt27ze1aqT7D17BZqXsu6Dkd8wTd8S1EkjNZm', '2020-11-29 12:32:34', 1, 'qdJojgjHLePJTDzL5pl7C4WSdmxkT000mjq9eXT7dJ7PHBuHRnLoXavf7sEJ', '2020-11-29 04:38:33', '2020-11-29 07:02:34');

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
(3, 3, 3, '2020-11-29 04:38:33', '2020-11-29 04:38:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advanced_salaries`
--
ALTER TABLE `advanced_salaries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companyprofiles`
--
ALTER TABLE `companyprofiles`
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
  ADD PRIMARY KEY (`id`),
  ADD KEY `expenses_created_by_foreign` (`created_by`),
  ADD KEY `expenses_modified_by_foreign` (`modified_by`);

--
-- Indexes for table `expensestitles`
--
ALTER TABLE `expensestitles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoiceprofiles`
--
ALTER TABLE `invoiceprofiles`
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
-- Indexes for table `profile_setts`
--
ALTER TABLE `profile_setts`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `advanced_salaries`
--
ALTER TABLE `advanced_salaries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `companyprofiles`
--
ALTER TABLE `companyprofiles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

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
-- AUTO_INCREMENT for table `invoiceprofiles`
--
ALTER TABLE `invoiceprofiles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `productcategories`
--
ALTER TABLE `productcategories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `profile_setts`
--
ALTER TABLE `profile_setts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `role_modules`
--
ALTER TABLE `role_modules`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `role_permissions`
--
ALTER TABLE `role_permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=971;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `salescarts`
--
ALTER TABLE `salescarts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
