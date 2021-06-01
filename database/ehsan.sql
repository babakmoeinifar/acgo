-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 01, 2021 at 06:31 AM
-- Server version: 8.0.25-0ubuntu0.21.04.1
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ehsan`
--

-- --------------------------------------------------------

--
-- Table structure for table `assets`
--

CREATE TABLE `assets` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purchase_date` date NOT NULL,
  `supported_date` date NOT NULL,
  `amount` double(8,2) NOT NULL DEFAULT '0.00',
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_by` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bank_accounts`
--

CREATE TABLE `bank_accounts` (
  `id` bigint UNSIGNED NOT NULL,
  `holder_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `opening_balance` double(15,2) NOT NULL DEFAULT '0.00',
  `contact_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `id` bigint UNSIGNED NOT NULL,
  `bill_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `vender_id` int NOT NULL,
  `bill_date` date NOT NULL,
  `due_date` date NOT NULL,
  `order_number` int NOT NULL DEFAULT '0',
  `status` int NOT NULL DEFAULT '0',
  `shipping_display` int NOT NULL DEFAULT '1',
  `send_date` date DEFAULT NULL,
  `discount_apply` int NOT NULL DEFAULT '0',
  `category_id` int NOT NULL,
  `created_by` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bill_payments`
--

CREATE TABLE `bill_payments` (
  `id` bigint UNSIGNED NOT NULL,
  `bill_id` int NOT NULL,
  `date` date NOT NULL,
  `amount` double(8,2) NOT NULL DEFAULT '0.00',
  `account_id` int NOT NULL,
  `payment_method` int NOT NULL,
  `reference` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bill_products`
--

CREATE TABLE `bill_products` (
  `id` bigint UNSIGNED NOT NULL,
  `bill_id` int NOT NULL,
  `product_id` int NOT NULL,
  `quantity` int NOT NULL,
  `tax` double(8,2) NOT NULL DEFAULT '0.00',
  `discount` double(8,2) NOT NULL DEFAULT '0.00',
  `price` double(8,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` double(8,2) NOT NULL DEFAULT '0.00',
  `limit` int NOT NULL DEFAULT '0',
  `description` text COLLATE utf8mb4_unicode_ci,
  `is_active` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `credit_notes`
--

CREATE TABLE `credit_notes` (
  `id` bigint UNSIGNED NOT NULL,
  `invoice` int NOT NULL DEFAULT '0',
  `customer` int NOT NULL DEFAULT '0',
  `amount` double(15,2) NOT NULL DEFAULT '0.00',
  `date` date NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint UNSIGNED NOT NULL,
  `customer_id` int NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `created_by` int NOT NULL DEFAULT '0',
  `is_active` int NOT NULL DEFAULT '1',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `billing_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `billing_country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `billing_state` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `billing_city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `billing_phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `billing_zip` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `billing_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_state` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_zip` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'en',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `customer_id`, `name`, `email`, `password`, `contact`, `avatar`, `created_by`, `is_active`, `email_verified_at`, `billing_name`, `billing_country`, `billing_state`, `billing_city`, `billing_phone`, `billing_zip`, `billing_address`, `shipping_name`, `shipping_country`, `shipping_state`, `shipping_city`, `shipping_phone`, `shipping_zip`, `shipping_address`, `lang`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'بابک معینی فر', 'babakus7@gmail.com', '$2y$10$ws8fexOzPqFwkBkpdLUJ/OfxqnnnLg6sNlUGChIkd6qTW0yVEHHMe', '9187643303', '', 3, 1, NULL, 'اراک', 'ایران', 'مرکزی', 'اراک', '9187643303', '3817797777', 'تست آدرس', 'اراک', 'ایران', 'مرکزی', 'اراک', '9187643303', '3817797777', 'تست آدرس', 'fa', NULL, '2021-06-01 04:29:41', '2021-06-01 06:13:10');

-- --------------------------------------------------------

--
-- Table structure for table `custom_fields`
--

CREATE TABLE `custom_fields` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `module` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `custom_field_values`
--

CREATE TABLE `custom_field_values` (
  `id` bigint UNSIGNED NOT NULL,
  `record_id` bigint UNSIGNED NOT NULL,
  `field_id` bigint UNSIGNED NOT NULL,
  `value` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `debit_notes`
--

CREATE TABLE `debit_notes` (
  `id` bigint UNSIGNED NOT NULL,
  `bill` int NOT NULL DEFAULT '0',
  `vendor` int NOT NULL DEFAULT '0',
  `amount` double(15,2) NOT NULL DEFAULT '0.00',
  `date` date NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` bigint UNSIGNED NOT NULL,
  `category_id` int NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `amount` double(20,2) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `project` bigint UNSIGNED NOT NULL DEFAULT '0',
  `user_id` bigint UNSIGNED NOT NULL DEFAULT '0',
  `attachment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `goals`
--

CREATE TABLE `goals` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `to` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` double(8,2) NOT NULL DEFAULT '0.00',
  `is_display` int NOT NULL DEFAULT '1',
  `created_by` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint UNSIGNED NOT NULL,
  `invoice_id` bigint UNSIGNED NOT NULL,
  `customer_id` bigint UNSIGNED NOT NULL,
  `issue_date` date NOT NULL,
  `due_date` date NOT NULL,
  `send_date` date DEFAULT NULL,
  `category_id` int NOT NULL,
  `ref_number` text COLLATE utf8mb4_unicode_ci,
  `status` int NOT NULL DEFAULT '0',
  `shipping_display` int NOT NULL DEFAULT '1',
  `discount_apply` int NOT NULL DEFAULT '0',
  `created_by` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `invoice_id`, `customer_id`, `issue_date`, `due_date`, `send_date`, `category_id`, `ref_number`, `status`, `shipping_display`, `discount_apply`, `created_by`, `created_at`, `updated_at`) VALUES
(2, 2, 1, '2021-09-06', '2021-06-01', NULL, 3, '', 0, 1, 0, 3, '2021-06-01 05:37:23', '2021-06-01 05:37:23'),
(3, 3, 1, '2021-09-06', '2021-06-01', NULL, 3, '', 0, 1, 0, 3, '2021-06-01 05:37:58', '2021-06-01 05:37:58');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_payments`
--

CREATE TABLE `invoice_payments` (
  `id` bigint UNSIGNED NOT NULL,
  `invoice_id` int NOT NULL,
  `date` date NOT NULL,
  `amount` double(8,2) NOT NULL DEFAULT '0.00',
  `account_id` int NOT NULL,
  `payment_method` int NOT NULL,
  `reference` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoice_products`
--

CREATE TABLE `invoice_products` (
  `id` bigint UNSIGNED NOT NULL,
  `invoice_id` int NOT NULL,
  `product_id` int NOT NULL,
  `quantity` int NOT NULL,
  `tax` double(8,2) NOT NULL DEFAULT '0.00',
  `discount` double(8,2) NOT NULL DEFAULT '0.00',
  `price` double(20,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoice_products`
--

INSERT INTO `invoice_products` (`id`, `invoice_id`, `product_id`, `quantity`, `tax`, `discount`, `price`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 1, 9.00, 0.00, 20000000.00, '2021-06-01 05:37:58', '2021-06-01 05:37:58');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_10_18_120310_create_permission_tables', 1),
(4, '2019_10_23_095428_create_settings_table', 1),
(5, '2019_11_13_051828_create_taxes_table', 1),
(6, '2019_11_13_055026_create_invoices_table', 1),
(7, '2019_11_13_072623_create_expenses_table', 1),
(8, '2019_11_21_090403_create_plans_table', 1),
(9, '2020_01_08_063207_create_product_services_table', 1),
(10, '2020_01_08_084029_create_product_service_categories_table', 1),
(11, '2020_01_08_092717_create_product_service_units_table', 1),
(12, '2020_01_08_121541_create_customers_table', 1),
(13, '2020_01_09_104945_create_venders_table', 1),
(14, '2020_01_09_113852_create_bank_accounts_table', 1),
(15, '2020_01_09_124222_create_transfers_table', 1),
(16, '2020_01_10_043412_create_payment_methods_table', 1),
(17, '2020_01_10_064723_create_transactions_table', 1),
(18, '2020_01_13_072608_create_invoice_products_table', 1),
(19, '2020_01_15_034438_create_revenues_table', 1),
(20, '2020_01_15_051228_create_bills_table', 1),
(21, '2020_01_15_060859_create_bill_products_table', 1),
(22, '2020_01_15_073237_create_payments_table', 1),
(23, '2020_01_16_043907_create_orders_table', 1),
(24, '2020_01_18_051650_create_invoice_payments_table', 1),
(25, '2020_01_20_091035_create_bill_payments_table', 1),
(26, '2020_02_25_052356_create_credit_notes_table', 1),
(27, '2020_02_26_033827_create_debit_notes_table', 1),
(28, '2020_03_12_095629_create_coupons_table', 1),
(29, '2020_03_12_120749_create_user_coupons_table', 1),
(30, '2020_04_02_045834_create_proposals_table', 1),
(31, '2020_04_02_055706_create_proposal_products_table', 1),
(32, '2020_04_18_035141_create_goals_table', 1),
(33, '2020_04_21_115823_create_assets_table', 1),
(34, '2020_04_24_023732_create_custom_fields_table', 1),
(35, '2020_04_24_024217_create_custom_field_values_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(2, 'App\\Customer', 1),
(1, 'App\\User', 1),
(3, 'App\\Vender', 1),
(4, 'App\\User', 2),
(4, 'App\\User', 3);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `order_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_number` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_exp_month` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_exp_year` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plan_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plan_id` int NOT NULL,
  `price` double(20,2) NOT NULL,
  `price_currency` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `txn_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_status` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `receipt` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_id`, `name`, `email`, `card_number`, `card_exp_month`, `card_exp_year`, `plan_name`, `plan_id`, `price`, `price_currency`, `txn_id`, `payment_status`, `receipt`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '60B48C8EDF695632344366', NULL, NULL, NULL, NULL, NULL, 'Free Plan', 1, 0.00, '', '', 'succeeded', NULL, 2, '2021-05-31 02:43:18', '2021-05-31 02:43:18');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `amount` double(20,2) NOT NULL DEFAULT '0.00',
  `account_id` int NOT NULL,
  `vender_id` int NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int NOT NULL,
  `recurring` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_method` int NOT NULL,
  `reference` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_methods`
--

CREATE TABLE `payment_methods` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'manage user', 'web', '2021-05-24 13:39:42', '2021-05-24 13:39:42'),
(2, 'create user', 'web', '2021-05-24 13:39:42', '2021-05-24 13:39:42'),
(3, 'edit user', 'web', '2021-05-24 13:39:42', '2021-05-24 13:39:42'),
(4, 'delete user', 'web', '2021-05-24 13:39:42', '2021-05-24 13:39:42'),
(5, 'manage language', 'web', '2021-05-24 13:39:42', '2021-05-24 13:39:42'),
(6, 'create language', 'web', '2021-05-24 13:39:42', '2021-05-24 13:39:42'),
(7, 'manage account', 'web', '2021-05-24 13:39:42', '2021-05-24 13:39:42'),
(8, 'edit account', 'web', '2021-05-24 13:39:42', '2021-05-24 13:39:42'),
(9, 'change password account', 'web', '2021-05-24 13:39:42', '2021-05-24 13:39:42'),
(10, 'manage system settings', 'web', '2021-05-24 13:39:42', '2021-05-24 13:39:42'),
(11, 'manage role', 'web', '2021-05-24 13:39:42', '2021-05-24 13:39:42'),
(12, 'create role', 'web', '2021-05-24 13:39:43', '2021-05-24 13:39:43'),
(13, 'edit role', 'web', '2021-05-24 13:39:43', '2021-05-24 13:39:43'),
(14, 'delete role', 'web', '2021-05-24 13:39:43', '2021-05-24 13:39:43'),
(15, 'manage permission', 'web', '2021-05-24 13:39:43', '2021-05-24 13:39:43'),
(16, 'create permission', 'web', '2021-05-24 13:39:43', '2021-05-24 13:39:43'),
(17, 'edit permission', 'web', '2021-05-24 13:39:43', '2021-05-24 13:39:43'),
(18, 'delete permission', 'web', '2021-05-24 13:39:43', '2021-05-24 13:39:43'),
(19, 'manage company settings', 'web', '2021-05-24 13:39:43', '2021-05-24 13:39:43'),
(20, 'manage business settings', 'web', '2021-05-24 13:39:43', '2021-05-24 13:39:43'),
(21, 'manage stripe settings', 'web', '2021-05-24 13:39:43', '2021-05-24 13:39:43'),
(22, 'manage expense', 'web', '2021-05-24 13:39:43', '2021-05-24 13:39:43'),
(23, 'create expense', 'web', '2021-05-24 13:39:43', '2021-05-24 13:39:43'),
(24, 'edit expense', 'web', '2021-05-24 13:39:43', '2021-05-24 13:39:43'),
(25, 'delete expense', 'web', '2021-05-24 13:39:43', '2021-05-24 13:39:43'),
(26, 'manage invoice', 'web', '2021-05-24 13:39:43', '2021-05-24 13:39:43'),
(27, 'create invoice', 'web', '2021-05-24 13:39:43', '2021-05-24 13:39:43'),
(28, 'edit invoice', 'web', '2021-05-24 13:39:43', '2021-05-24 13:39:43'),
(29, 'delete invoice', 'web', '2021-05-24 13:39:43', '2021-05-24 13:39:43'),
(30, 'show invoice', 'web', '2021-05-24 13:39:43', '2021-05-24 13:39:43'),
(31, 'create payment invoice', 'web', '2021-05-24 13:39:43', '2021-05-24 13:39:43'),
(32, 'delete payment invoice', 'web', '2021-05-24 13:39:43', '2021-05-24 13:39:43'),
(33, 'send invoice', 'web', '2021-05-24 13:39:43', '2021-05-24 13:39:43'),
(34, 'delete invoice product', 'web', '2021-05-24 13:39:43', '2021-05-24 13:39:43'),
(35, 'convert invoice', 'web', '2021-05-24 13:39:44', '2021-05-24 13:39:44'),
(36, 'manage change password', 'web', '2021-05-24 13:39:44', '2021-05-24 13:39:44'),
(37, 'manage plan', 'web', '2021-05-24 13:39:44', '2021-05-24 13:39:44'),
(38, 'create plan', 'web', '2021-05-24 13:39:44', '2021-05-24 13:39:44'),
(39, 'edit plan', 'web', '2021-05-24 13:39:44', '2021-05-24 13:39:44'),
(40, 'manage constant unit', 'web', '2021-05-24 13:39:44', '2021-05-24 13:39:44'),
(41, 'create constant unit', 'web', '2021-05-24 13:39:44', '2021-05-24 13:39:44'),
(42, 'edit constant unit', 'web', '2021-05-24 13:39:44', '2021-05-24 13:39:44'),
(43, 'delete constant unit', 'web', '2021-05-24 13:39:44', '2021-05-24 13:39:44'),
(44, 'manage constant tax', 'web', '2021-05-24 13:39:44', '2021-05-24 13:39:44'),
(45, 'create constant tax', 'web', '2021-05-24 13:39:44', '2021-05-24 13:39:44'),
(46, 'edit constant tax', 'web', '2021-05-24 13:39:44', '2021-05-24 13:39:44'),
(47, 'delete constant tax', 'web', '2021-05-24 13:39:44', '2021-05-24 13:39:44'),
(48, 'manage constant category', 'web', '2021-05-24 13:39:44', '2021-05-24 13:39:44'),
(49, 'create constant category', 'web', '2021-05-24 13:39:44', '2021-05-24 13:39:44'),
(50, 'edit constant category', 'web', '2021-05-24 13:39:44', '2021-05-24 13:39:44'),
(51, 'delete constant category', 'web', '2021-05-24 13:39:45', '2021-05-24 13:39:45'),
(52, 'manage product & service', 'web', '2021-05-24 13:39:45', '2021-05-24 13:39:45'),
(53, 'create product & service', 'web', '2021-05-24 13:39:45', '2021-05-24 13:39:45'),
(54, 'edit product & service', 'web', '2021-05-24 13:39:45', '2021-05-24 13:39:45'),
(55, 'delete product & service', 'web', '2021-05-24 13:39:45', '2021-05-24 13:39:45'),
(56, 'manage customer', 'web', '2021-05-24 13:39:45', '2021-05-24 13:39:45'),
(57, 'create customer', 'web', '2021-05-24 13:39:45', '2021-05-24 13:39:45'),
(58, 'edit customer', 'web', '2021-05-24 13:39:45', '2021-05-24 13:39:45'),
(59, 'delete customer', 'web', '2021-05-24 13:39:45', '2021-05-24 13:39:45'),
(60, 'manage vender', 'web', '2021-05-24 13:39:45', '2021-05-24 13:39:45'),
(61, 'create vender', 'web', '2021-05-24 13:39:45', '2021-05-24 13:39:45'),
(62, 'edit vender', 'web', '2021-05-24 13:39:45', '2021-05-24 13:39:45'),
(63, 'delete vender', 'web', '2021-05-24 13:39:45', '2021-05-24 13:39:45'),
(64, 'manage bank account', 'web', '2021-05-24 13:39:45', '2021-05-24 13:39:45'),
(65, 'create bank account', 'web', '2021-05-24 13:39:46', '2021-05-24 13:39:46'),
(66, 'edit bank account', 'web', '2021-05-24 13:39:46', '2021-05-24 13:39:46'),
(67, 'delete bank account', 'web', '2021-05-24 13:39:46', '2021-05-24 13:39:46'),
(68, 'manage transfer', 'web', '2021-05-24 13:39:46', '2021-05-24 13:39:46'),
(69, 'create transfer', 'web', '2021-05-24 13:39:46', '2021-05-24 13:39:46'),
(70, 'edit transfer', 'web', '2021-05-24 13:39:46', '2021-05-24 13:39:46'),
(71, 'delete transfer', 'web', '2021-05-24 13:39:46', '2021-05-24 13:39:46'),
(72, 'manage constant payment method', 'web', '2021-05-24 13:39:46', '2021-05-24 13:39:46'),
(73, 'create constant payment method', 'web', '2021-05-24 13:39:46', '2021-05-24 13:39:46'),
(74, 'edit constant payment method', 'web', '2021-05-24 13:39:46', '2021-05-24 13:39:46'),
(75, 'delete constant payment method', 'web', '2021-05-24 13:39:46', '2021-05-24 13:39:46'),
(76, 'manage transaction', 'web', '2021-05-24 13:39:46', '2021-05-24 13:39:46'),
(77, 'manage revenue', 'web', '2021-05-24 13:39:46', '2021-05-24 13:39:46'),
(78, 'create revenue', 'web', '2021-05-24 13:39:47', '2021-05-24 13:39:47'),
(79, 'edit revenue', 'web', '2021-05-24 13:39:47', '2021-05-24 13:39:47'),
(80, 'delete revenue', 'web', '2021-05-24 13:39:47', '2021-05-24 13:39:47'),
(81, 'manage bill', 'web', '2021-05-24 13:39:47', '2021-05-24 13:39:47'),
(82, 'create bill', 'web', '2021-05-24 13:39:47', '2021-05-24 13:39:47'),
(83, 'edit bill', 'web', '2021-05-24 13:39:47', '2021-05-24 13:39:47'),
(84, 'delete bill', 'web', '2021-05-24 13:39:47', '2021-05-24 13:39:47'),
(85, 'show bill', 'web', '2021-05-24 13:39:47', '2021-05-24 13:39:47'),
(86, 'manage payment', 'web', '2021-05-24 13:39:47', '2021-05-24 13:39:47'),
(87, 'create payment', 'web', '2021-05-24 13:39:47', '2021-05-24 13:39:47'),
(88, 'edit payment', 'web', '2021-05-24 13:39:47', '2021-05-24 13:39:47'),
(89, 'delete payment', 'web', '2021-05-24 13:39:48', '2021-05-24 13:39:48'),
(90, 'delete bill product', 'web', '2021-05-24 13:39:48', '2021-05-24 13:39:48'),
(91, 'buy plan', 'web', '2021-05-24 13:39:48', '2021-05-24 13:39:48'),
(92, 'send bill', 'web', '2021-05-24 13:39:48', '2021-05-24 13:39:48'),
(93, 'create payment bill', 'web', '2021-05-24 13:39:48', '2021-05-24 13:39:48'),
(94, 'delete payment bill', 'web', '2021-05-24 13:39:48', '2021-05-24 13:39:48'),
(95, 'manage order', 'web', '2021-05-24 13:39:48', '2021-05-24 13:39:48'),
(96, 'income report', 'web', '2021-05-24 13:39:48', '2021-05-24 13:39:48'),
(97, 'expense report', 'web', '2021-05-24 13:39:48', '2021-05-24 13:39:48'),
(98, 'income vs expense report', 'web', '2021-05-24 13:39:48', '2021-05-24 13:39:48'),
(99, 'tax report', 'web', '2021-05-24 13:39:49', '2021-05-24 13:39:49'),
(100, 'loss & profit report', 'web', '2021-05-24 13:39:49', '2021-05-24 13:39:49'),
(101, 'manage customer payment', 'web', '2021-05-24 13:39:49', '2021-05-24 13:39:49'),
(102, 'manage customer transaction', 'web', '2021-05-24 13:39:49', '2021-05-24 13:39:49'),
(103, 'manage customer invoice', 'web', '2021-05-24 13:39:49', '2021-05-24 13:39:49'),
(104, 'vender manage bill', 'web', '2021-05-24 13:39:49', '2021-05-24 13:39:49'),
(105, 'manage vender bill', 'web', '2021-05-24 13:39:49', '2021-05-24 13:39:49'),
(106, 'manage vender payment', 'web', '2021-05-24 13:39:49', '2021-05-24 13:39:49'),
(107, 'manage vender transaction', 'web', '2021-05-24 13:39:49', '2021-05-24 13:39:49'),
(108, 'manage credit note', 'web', '2021-05-24 13:39:49', '2021-05-24 13:39:49'),
(109, 'create credit note', 'web', '2021-05-24 13:39:50', '2021-05-24 13:39:50'),
(110, 'edit credit note', 'web', '2021-05-24 13:39:50', '2021-05-24 13:39:50'),
(111, 'delete credit note', 'web', '2021-05-24 13:39:50', '2021-05-24 13:39:50'),
(112, 'manage debit note', 'web', '2021-05-24 13:39:50', '2021-05-24 13:39:50'),
(113, 'create debit note', 'web', '2021-05-24 13:39:50', '2021-05-24 13:39:50'),
(114, 'edit debit note', 'web', '2021-05-24 13:39:50', '2021-05-24 13:39:50'),
(115, 'delete debit note', 'web', '2021-05-24 13:39:50', '2021-05-24 13:39:50'),
(116, 'duplicate invoice', 'web', '2021-05-24 13:39:50', '2021-05-24 13:39:50'),
(117, 'duplicate bill', 'web', '2021-05-24 13:39:50', '2021-05-24 13:39:50'),
(118, 'manage coupon', 'web', '2021-05-24 13:39:51', '2021-05-24 13:39:51'),
(119, 'create coupon', 'web', '2021-05-24 13:39:51', '2021-05-24 13:39:51'),
(120, 'edit coupon', 'web', '2021-05-24 13:39:51', '2021-05-24 13:39:51'),
(121, 'delete coupon', 'web', '2021-05-24 13:39:51', '2021-05-24 13:39:51'),
(122, 'manage proposal', 'web', '2021-05-24 13:39:51', '2021-05-24 13:39:51'),
(123, 'create proposal', 'web', '2021-05-24 13:39:51', '2021-05-24 13:39:51'),
(124, 'edit proposal', 'web', '2021-05-24 13:39:51', '2021-05-24 13:39:51'),
(125, 'delete proposal', 'web', '2021-05-24 13:39:51', '2021-05-24 13:39:51'),
(126, 'duplicate proposal', 'web', '2021-05-24 13:39:52', '2021-05-24 13:39:52'),
(127, 'show proposal', 'web', '2021-05-24 13:39:52', '2021-05-24 13:39:52'),
(128, 'send proposal', 'web', '2021-05-24 13:39:52', '2021-05-24 13:39:52'),
(129, 'delete proposal product', 'web', '2021-05-24 13:39:52', '2021-05-24 13:39:52'),
(130, 'manage customer proposal', 'web', '2021-05-24 13:39:52', '2021-05-24 13:39:52'),
(131, 'manage goal', 'web', '2021-05-24 13:39:52', '2021-05-24 13:39:52'),
(132, 'create goal', 'web', '2021-05-24 13:39:52', '2021-05-24 13:39:52'),
(133, 'edit goal', 'web', '2021-05-24 13:39:52', '2021-05-24 13:39:52'),
(134, 'delete goal', 'web', '2021-05-24 13:39:53', '2021-05-24 13:39:53'),
(135, 'manage assets', 'web', '2021-05-24 13:39:53', '2021-05-24 13:39:53'),
(136, 'create assets', 'web', '2021-05-24 13:39:53', '2021-05-24 13:39:53'),
(137, 'edit assets', 'web', '2021-05-24 13:39:53', '2021-05-24 13:39:53'),
(138, 'delete assets', 'web', '2021-05-24 13:39:53', '2021-05-24 13:39:53'),
(139, 'statement report', 'web', '2021-05-24 13:39:53', '2021-05-24 13:39:53'),
(140, 'manage constant custom field', 'web', '2021-05-24 13:39:53', '2021-05-24 13:39:53'),
(141, 'create constant custom field', 'web', '2021-05-24 13:39:54', '2021-05-24 13:39:54'),
(142, 'edit constant custom field', 'web', '2021-05-24 13:39:54', '2021-05-24 13:39:54'),
(143, 'delete constant custom field', 'web', '2021-05-24 13:39:54', '2021-05-24 13:39:54');

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE `plans` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(20,2) NOT NULL DEFAULT '0.00',
  `duration` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `max_users` int NOT NULL DEFAULT '0',
  `max_customers` int NOT NULL DEFAULT '0',
  `max_venders` int NOT NULL DEFAULT '0',
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`id`, `name`, `price`, `duration`, `max_users`, `max_customers`, `max_venders`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Free Plan', 0.00, 'Unlimited', 5, 5, 5, NULL, 'free_plan.png', '2021-05-24 13:39:42', '2021-05-24 13:39:42'),
(3, 'نقره ای', 2000000.00, 'year', 1000, 1000, 1000, '', 'plan_1622528769.png', '2021-06-01 06:26:09', '2021-06-01 06:26:09');

-- --------------------------------------------------------

--
-- Table structure for table `product_services`
--

CREATE TABLE `product_services` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sku` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sale_price` double(20,2) NOT NULL DEFAULT '0.00',
  `purchase_price` double(20,2) NOT NULL DEFAULT '0.00',
  `quantity` int NOT NULL DEFAULT '0',
  `tax_id` int NOT NULL DEFAULT '0',
  `category_id` int NOT NULL DEFAULT '0',
  `unit_id` int NOT NULL DEFAULT '0',
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_by` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_services`
--

INSERT INTO `product_services` (`id`, `name`, `sku`, `sale_price`, `purchase_price`, `quantity`, `tax_id`, `category_id`, `unit_id`, `type`, `description`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'دوچرخه', 'عدد', 20000000.00, 18000000.00, 0, 1, 1, 2, 'product', '', 3, '2021-06-01 04:23:11', '2021-06-01 05:27:22');

-- --------------------------------------------------------

--
-- Table structure for table `product_service_categories`
--

CREATE TABLE `product_service_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `color` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#fc544b',
  `created_by` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_service_categories`
--

INSERT INTO `product_service_categories` (`id`, `name`, `type`, `color`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'تست', '0', 'FFFFFF', 3, '2021-06-01 04:20:29', '2021-06-01 04:20:29'),
(2, 'دسته هزینه', '2', 'FF4D40', 3, '2021-06-01 04:41:09', '2021-06-01 04:41:09'),
(3, 'دسته درامد', '1', 'FFFFFF', 3, '2021-06-01 04:41:20', '2021-06-01 04:41:20');

-- --------------------------------------------------------

--
-- Table structure for table `product_service_units`
--

CREATE TABLE `product_service_units` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_service_units`
--

INSERT INTO `product_service_units` (`id`, `name`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'ریال', 3, '2021-06-01 04:20:49', '2021-06-01 04:20:49'),
(2, 'عدد', 3, '2021-06-01 05:27:10', '2021-06-01 05:27:10');

-- --------------------------------------------------------

--
-- Table structure for table `proposals`
--

CREATE TABLE `proposals` (
  `id` bigint UNSIGNED NOT NULL,
  `proposal_id` bigint UNSIGNED NOT NULL,
  `customer_id` bigint UNSIGNED NOT NULL,
  `issue_date` date NOT NULL,
  `send_date` date DEFAULT NULL,
  `category_id` int NOT NULL,
  `status` int NOT NULL DEFAULT '0',
  `discount_apply` int NOT NULL DEFAULT '0',
  `created_by` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `proposal_products`
--

CREATE TABLE `proposal_products` (
  `id` bigint UNSIGNED NOT NULL,
  `proposal_id` int NOT NULL,
  `product_id` int NOT NULL,
  `quantity` int NOT NULL,
  `tax` double(8,2) NOT NULL DEFAULT '0.00',
  `discount` double(8,2) NOT NULL DEFAULT '0.00',
  `price` double(20,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `revenues`
--

CREATE TABLE `revenues` (
  `id` bigint UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `amount` double(15,2) NOT NULL DEFAULT '0.00',
  `account_id` int NOT NULL,
  `customer_id` int NOT NULL,
  `category_id` int NOT NULL,
  `payment_method` int NOT NULL,
  `reference` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'super admin', 'web', 0, '2021-05-24 13:39:54', '2021-05-24 13:39:54'),
(2, 'customer', 'web', 0, '2021-05-24 13:39:59', '2021-05-24 13:39:59'),
(3, 'vender', 'web', 0, '2021-05-24 13:40:01', '2021-05-24 13:40:01'),
(4, 'company', 'web', 1, '2021-05-24 13:40:02', '2021-05-24 13:40:02');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(21, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(95, 1),
(118, 1),
(119, 1),
(120, 1),
(121, 1),
(5, 2),
(7, 2),
(8, 2),
(9, 2),
(30, 2),
(101, 2),
(102, 2),
(103, 2),
(127, 2),
(130, 2),
(5, 3),
(7, 3),
(8, 3),
(9, 3),
(85, 3),
(104, 3),
(105, 3),
(106, 3),
(107, 3),
(1, 4),
(2, 4),
(3, 4),
(4, 4),
(5, 4),
(7, 4),
(8, 4),
(9, 4),
(11, 4),
(12, 4),
(13, 4),
(14, 4),
(15, 4),
(16, 4),
(17, 4),
(18, 4),
(19, 4),
(20, 4),
(22, 4),
(23, 4),
(24, 4),
(25, 4),
(26, 4),
(27, 4),
(28, 4),
(29, 4),
(30, 4),
(36, 4),
(37, 4),
(40, 4),
(41, 4),
(42, 4),
(43, 4),
(44, 4),
(45, 4),
(46, 4),
(47, 4),
(48, 4),
(49, 4),
(50, 4),
(51, 4),
(52, 4),
(53, 4),
(54, 4),
(55, 4),
(56, 4),
(57, 4),
(58, 4),
(59, 4),
(60, 4),
(61, 4),
(91, 4);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `value`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'title_text', 'سامانه حسابداری', 1, NULL, NULL),
(2, 'footer_text', 'سامانه شخصی', 1, NULL, NULL),
(5, 'logo', '/tmp/php5M1PRa', 1, NULL, NULL),
(6, 'small_logo', '/tmp/phpMURHLN', 1, NULL, NULL),
(7, 'favicon', '/tmp/phpHsAP1a', 1, NULL, NULL),
(8, 'title_text', 'سامانه حسابداری من', 3, NULL, NULL),
(9, 'site_currency', 'ریال', 3, '2021-06-01 04:34:54', '2021-06-01 04:34:54'),
(10, 'site_currency_symbol', 'ریال', 3, '2021-06-01 04:34:54', '2021-06-01 04:34:54'),
(11, 'site_currency_symbol_position', 'post', 3, '2021-06-01 04:34:54', '2021-06-01 04:34:54'),
(12, 'site_date_format', 'M j, Y', 3, '2021-06-01 04:34:54', '2021-06-01 04:34:54'),
(13, 'site_time_format', 'g:i A', 3, '2021-06-01 04:34:54', '2021-06-01 04:34:54'),
(14, 'invoice_prefix', '#INVO', 3, '2021-06-01 04:34:54', '2021-06-01 04:34:54'),
(15, 'proposal_prefix', '#PROP', 3, '2021-06-01 04:34:54', '2021-06-01 04:34:54'),
(16, 'bill_prefix', '#BILL', 3, '2021-06-01 04:34:54', '2021-06-01 04:34:54'),
(17, 'customer_prefix', '#CUST', 3, '2021-06-01 04:34:54', '2021-06-01 04:34:54'),
(18, 'vender_prefix', '#VEND', 3, '2021-06-01 04:34:54', '2021-06-01 04:34:54'),
(19, 'invoice_color', '2B9115', 3, '2021-06-01 04:34:54', '2021-06-01 04:34:54'),
(20, 'footer_title', 'شرکت فلان', 3, '2021-06-01 04:34:54', '2021-06-01 04:34:54'),
(21, 'footer_notes', 'برکت دار باشه', 3, '2021-06-01 04:34:54', '2021-06-01 04:34:54'),
(35, 'stripe_currency_symbol', 'ریال', 1, '2021-06-01 06:29:23', '2021-06-01 06:29:23'),
(36, 'stripe_currency', 'ریال', 1, '2021-06-01 06:29:23', '2021-06-01 06:29:23');

-- --------------------------------------------------------

--
-- Table structure for table `taxes`
--

CREATE TABLE `taxes` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `taxes`
--

INSERT INTO `taxes` (`id`, `name`, `rate`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'ارزش افزوده', '9', 3, '2021-06-01 04:20:02', '2021-06-01 04:20:02');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` int NOT NULL,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account` int NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double(8,2) NOT NULL DEFAULT '0.00',
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `created_by` int NOT NULL DEFAULT '0',
  `payment_id` int NOT NULL DEFAULT '0',
  `category` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transfers`
--

CREATE TABLE `transfers` (
  `id` bigint UNSIGNED NOT NULL,
  `from_account` int NOT NULL DEFAULT '0',
  `to_account` int NOT NULL DEFAULT '0',
  `amount` double(15,2) NOT NULL DEFAULT '0.00',
  `date` date NOT NULL,
  `payment_method` int NOT NULL DEFAULT '0',
  `reference` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lang` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int NOT NULL DEFAULT '0',
  `plan` int DEFAULT NULL,
  `plan_expire_date` date DEFAULT NULL,
  `delete_status` int NOT NULL DEFAULT '1',
  `is_active` int NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `type`, `avatar`, `lang`, `created_by`, `plan`, `plan_expire_date`, `delete_status`, `is_active`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'ادمین', 'superadmin@example.com', NULL, '$2y$10$KfPfClEPLp6Tp0BC.3Wln.jwDscVbzFiBANkq5dAdDf68eItvG9fC', 'super admin', '', 'fa', 0, NULL, NULL, 1, 1, NULL, '2021-05-24 13:39:59', '2021-05-31 02:45:09'),
(2, 'بابک معینی فر', 'superadmin4@example.com', NULL, '$2y$10$2tl1nW.vlIRUOlgUzowRi.o0IOa/BWd5zyoNZu4U5e2/J0nd1jf3a', 'company', NULL, 'en', 1, 1, NULL, 1, 1, NULL, '2021-05-24 13:42:32', '2021-05-31 02:43:18'),
(3, 'بابک معینی فر', 'babakus7@gmail.com', NULL, '$2y$10$wfRN0/8/wdzzpE0pl6w7gu89mz1RDTFtdQ3Y5.8HcGu8.vNcx3oRa', 'company', NULL, 'fa', 1, NULL, NULL, 1, 1, NULL, '2021-05-31 23:46:37', '2021-05-31 23:46:44');

-- --------------------------------------------------------

--
-- Table structure for table `user_coupons`
--

CREATE TABLE `user_coupons` (
  `id` bigint UNSIGNED NOT NULL,
  `user` int NOT NULL,
  `coupon` int NOT NULL,
  `order` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `venders`
--

CREATE TABLE `venders` (
  `id` bigint UNSIGNED NOT NULL,
  `vender_id` int NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `created_by` int NOT NULL DEFAULT '0',
  `is_active` int NOT NULL DEFAULT '1',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `billing_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `billing_country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `billing_state` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `billing_city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `billing_phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `billing_zip` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `billing_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_state` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_zip` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'en',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `venders`
--

INSERT INTO `venders` (`id`, `vender_id`, `name`, `email`, `password`, `contact`, `avatar`, `created_by`, `is_active`, `email_verified_at`, `billing_name`, `billing_country`, `billing_state`, `billing_city`, `billing_phone`, `billing_zip`, `billing_address`, `shipping_name`, `shipping_country`, `shipping_state`, `shipping_city`, `shipping_phone`, `shipping_zip`, `shipping_address`, `lang`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'بابک معینی فر', 'babakus7@gmail.com', '$2y$10$832EaibS8bV.EdMdU8jy6uyYJneBEL9GkAaMq9UxLnD6t2Bo61H/i', '9187643303', '', 3, 1, NULL, 'اراک', 'Iran', 'مرکزی', 'اراک', '9187643303', '3817797777', 'تتتتسسستتت', 'اراک', 'Iran', 'مرکزی', 'اراک', '9187643303', '3817797777', 'تتتتسسستتت', 'fa', NULL, '2021-06-01 04:31:17', '2021-06-01 06:02:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assets`
--
ALTER TABLE `assets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank_accounts`
--
ALTER TABLE `bank_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bill_payments`
--
ALTER TABLE `bill_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bill_products`
--
ALTER TABLE `bill_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `credit_notes`
--
ALTER TABLE `credit_notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_email_unique` (`email`);

--
-- Indexes for table `custom_fields`
--
ALTER TABLE `custom_fields`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `custom_field_values`
--
ALTER TABLE `custom_field_values`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `custom_field_values_record_id_field_id_unique` (`record_id`,`field_id`),
  ADD KEY `custom_field_values_field_id_foreign` (`field_id`);

--
-- Indexes for table `debit_notes`
--
ALTER TABLE `debit_notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `goals`
--
ALTER TABLE `goals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_payments`
--
ALTER TABLE `invoice_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_products`
--
ALTER TABLE `invoice_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orders_order_id_unique` (`order_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `plans_name_unique` (`name`);

--
-- Indexes for table `product_services`
--
ALTER TABLE `product_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_service_categories`
--
ALTER TABLE `product_service_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_service_units`
--
ALTER TABLE `product_service_units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `proposals`
--
ALTER TABLE `proposals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `proposal_products`
--
ALTER TABLE `proposal_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `revenues`
--
ALTER TABLE `revenues`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_name_created_by_unique` (`name`,`created_by`);

--
-- Indexes for table `taxes`
--
ALTER TABLE `taxes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transfers`
--
ALTER TABLE `transfers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_coupons`
--
ALTER TABLE `user_coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `venders`
--
ALTER TABLE `venders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `venders_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assets`
--
ALTER TABLE `assets`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bank_accounts`
--
ALTER TABLE `bank_accounts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bill_payments`
--
ALTER TABLE `bill_payments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bill_products`
--
ALTER TABLE `bill_products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `credit_notes`
--
ALTER TABLE `credit_notes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `custom_fields`
--
ALTER TABLE `custom_fields`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `custom_field_values`
--
ALTER TABLE `custom_field_values`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `debit_notes`
--
ALTER TABLE `debit_notes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `goals`
--
ALTER TABLE `goals`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `invoice_payments`
--
ALTER TABLE `invoice_payments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoice_products`
--
ALTER TABLE `invoice_products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product_services`
--
ALTER TABLE `product_services`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product_service_categories`
--
ALTER TABLE `product_service_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product_service_units`
--
ALTER TABLE `product_service_units`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `proposals`
--
ALTER TABLE `proposals`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `proposal_products`
--
ALTER TABLE `proposal_products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `revenues`
--
ALTER TABLE `revenues`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `taxes`
--
ALTER TABLE `taxes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transfers`
--
ALTER TABLE `transfers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_coupons`
--
ALTER TABLE `user_coupons`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `venders`
--
ALTER TABLE `venders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `custom_field_values`
--
ALTER TABLE `custom_field_values`
  ADD CONSTRAINT `custom_field_values_field_id_foreign` FOREIGN KEY (`field_id`) REFERENCES `custom_fields` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
