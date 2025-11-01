-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2025 at 04:46 AM
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
-- Database: `as_crm`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `document_id` int(11) NOT NULL DEFAULT 0,
  `name` varchar(191) DEFAULT NULL,
  `email` varchar(191) DEFAULT NULL,
  `phone` varchar(191) DEFAULT NULL,
  `website` varchar(191) DEFAULT NULL,
  `billing_address` text DEFAULT NULL,
  `billing_city` varchar(191) DEFAULT NULL,
  `billing_state` varchar(191) DEFAULT NULL,
  `billing_country` varchar(191) DEFAULT NULL,
  `billing_postalcode` varchar(191) DEFAULT '0',
  `shipping_address` text DEFAULT NULL,
  `shipping_city` varchar(191) DEFAULT NULL,
  `shipping_state` varchar(191) DEFAULT NULL,
  `shipping_country` varchar(191) DEFAULT NULL,
  `shipping_postalcode` varchar(191) DEFAULT '0',
  `type` varchar(20) DEFAULT NULL,
  `industry` varchar(191) DEFAULT NULL,
  `description` varchar(191) DEFAULT NULL,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `user_id`, `document_id`, `name`, `email`, `phone`, `website`, `billing_address`, `billing_city`, `billing_state`, `billing_country`, `billing_postalcode`, `shipping_address`, `shipping_city`, `shipping_state`, `shipping_country`, `shipping_postalcode`, `type`, `industry`, `description`, `created_by`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 0, 0, 'Sales Department', NULL, '6565656565', 'https://live.extraaazpos.com/', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '1', NULL, 3, 1, '2025-10-06 03:41:19', '2025-10-09 04:28:19');

-- --------------------------------------------------------

--
-- Table structure for table `account_industries`
--

CREATE TABLE `account_industries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `account_industries`
--

INSERT INTO `account_industries` (`id`, `name`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Sales', 3, '2024-04-07 15:41:32', '2024-04-07 15:41:32');

-- --------------------------------------------------------

--
-- Table structure for table `account_types`
--

CREATE TABLE `account_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `account_types`
--

INSERT INTO `account_types` (`id`, `name`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Tech Team', 3, '2024-04-06 05:44:04', '2024-04-06 05:44:04'),
(2, 'Sales Team', 3, '2024-04-07 15:41:20', '2024-04-07 15:41:20');

-- --------------------------------------------------------

--
-- Table structure for table `admin_payment_settings`
--

CREATE TABLE `admin_payment_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL DEFAULT '0',
  `value` varchar(191) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_payment_settings`
--

INSERT INTO `admin_payment_settings` (`id`, `name`, `value`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'currency_symbol', '₹', 3, NULL, NULL),
(2, 'currency', 'INR', 3, NULL, NULL),
(3, 'is_manually_enabled', 'off', 3, NULL, NULL),
(4, 'is_bank_enabled', 'on', 3, NULL, NULL),
(5, 'bank_details', 'EXTRAAAZ INNOVATIVE TECH SOLUTIONS PVT LTD.\r\nHDFC BANK, \r\nBadlapur West Branch.\r\nCurrent Account No. \r\n99997709040699\r\nIFSC Code - HDFC0008382', 3, NULL, NULL),
(6, 'is_stripe_enabled', 'off', 3, NULL, NULL),
(7, 'is_paypal_enabled', 'off', 3, NULL, NULL),
(8, 'is_paystack_enabled', 'off', 3, NULL, NULL),
(9, 'is_paymentwall_enabled', 'off', 3, NULL, NULL),
(10, 'is_flutterwave_enabled', 'off', 3, NULL, NULL),
(11, 'is_razorpay_enabled', 'off', 3, NULL, NULL),
(12, 'is_mercado_enabled', 'off', 3, NULL, NULL),
(13, 'is_paytm_enabled', 'off', 3, NULL, NULL),
(14, 'is_mollie_enabled', 'off', 3, NULL, NULL),
(15, 'is_skrill_enabled', 'off', 3, NULL, NULL),
(16, 'is_coingate_enabled', 'off', 3, NULL, NULL),
(17, 'is_toyyibpay_enabled', 'off', 3, NULL, NULL),
(18, 'is_payfast_enabled', 'off', 3, NULL, NULL),
(19, 'is_iyzipay_enabled', 'off', 3, NULL, NULL),
(20, 'is_sspay_enabled', 'off', 3, NULL, NULL),
(21, 'is_paytab_enabled', 'off', 3, NULL, NULL),
(22, 'is_benefit_enabled', 'off', 3, NULL, NULL),
(23, 'is_cashfree_enabled', 'off', 3, NULL, NULL),
(24, 'is_aamarpay_enabled', 'off', 3, NULL, NULL),
(25, 'is_paytr_enabled', 'off', 3, NULL, NULL),
(26, 'is_yookassa_enabled', 'off', 3, NULL, NULL),
(27, 'is_midtrans_enabled', 'off', 3, NULL, NULL),
(28, 'is_xendit_enabled', 'off', 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bank_transfers`
--

CREATE TABLE `bank_transfers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_id` int(11) NOT NULL DEFAULT 0,
  `order_id` int(11) NOT NULL DEFAULT 0,
  `amount` decimal(30,2) NOT NULL DEFAULT 0.00,
  `status` varchar(191) DEFAULT NULL,
  `receipt` varchar(191) DEFAULT NULL,
  `date` date NOT NULL,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `calls`
--

CREATE TABLE `calls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `direction` int(11) NOT NULL DEFAULT 0,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `parent` varchar(191) DEFAULT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `account` int(11) NOT NULL DEFAULT 0,
  `description` varchar(191) DEFAULT NULL,
  `attendees_user` int(11) NOT NULL DEFAULT 0,
  `attendees_contact` int(11) NOT NULL DEFAULT 0,
  `attendees_lead` int(11) NOT NULL DEFAULT 0,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `calls`
--

INSERT INTO `calls` (`id`, `user_id`, `name`, `status`, `direction`, `start_date`, `end_date`, `parent`, `parent_id`, `account`, `description`, `attendees_user`, `attendees_contact`, `attendees_lead`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 0, 'Test Call', 0, 0, '2025-10-08', '2025-10-08', 'case', 1, 1, NULL, 0, 0, 0, 3, '2025-10-08 06:32:58', '2025-10-08 06:32:58');

-- --------------------------------------------------------

--
-- Table structure for table `campaigns`
--

CREATE TABLE `campaigns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `budget` int(11) DEFAULT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `target_list` int(11) DEFAULT NULL,
  `excluding_list` int(11) DEFAULT NULL,
  `description` varchar(191) DEFAULT NULL,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `campaigns`
--

INSERT INTO `campaigns` (`id`, `user_id`, `name`, `status`, `type`, `budget`, `start_date`, `end_date`, `target_list`, `excluding_list`, `description`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 6, 'Test Campaign', 0, 1, 1000, '2025-10-09', '2025-10-09', 1, 1, 'rertte', 3, '2025-10-08 23:39:00', '2025-10-08 23:39:00');

-- --------------------------------------------------------

--
-- Table structure for table `campaign_types`
--

CREATE TABLE `campaign_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `campaign_types`
--

INSERT INTO `campaign_types` (`id`, `name`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Campaigns Type', 3, '2025-10-08 23:37:38', '2025-10-08 23:37:38');

-- --------------------------------------------------------

--
-- Table structure for table `case_types`
--

CREATE TABLE `case_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `case_types`
--

INSERT INTO `case_types` (`id`, `name`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'technical issues', 3, '2024-04-07 15:54:11', '2024-04-07 15:54:11'),
(2, 'feature requests', 3, '2024-04-07 15:54:26', '2024-04-07 15:54:26'),
(3, 'billing inquiries', 3, '2024-04-07 15:54:42', '2024-04-07 15:54:42'),
(4, 'Account management', 3, '2024-04-07 15:55:03', '2024-04-07 15:55:03');

-- --------------------------------------------------------

--
-- Table structure for table `ch_favorites`
--

CREATE TABLE `ch_favorites` (
  `id` char(36) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `favorite_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ch_favorites`
--

INSERT INTO `ch_favorites` (`id`, `user_id`, `favorite_id`, `created_at`, `updated_at`) VALUES
('', 3, 7, '2025-10-08 00:39:41', '2025-10-08 00:39:41');

-- --------------------------------------------------------

--
-- Table structure for table `ch_messages`
--

CREATE TABLE `ch_messages` (
  `id` char(36) NOT NULL,
  `from_id` bigint(20) NOT NULL,
  `to_id` bigint(20) NOT NULL,
  `body` varchar(5000) DEFAULT NULL,
  `attachment` varchar(191) DEFAULT NULL,
  `seen` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ch_messages`
--

INSERT INTO `ch_messages` (`id`, `from_id`, `to_id`, `body`, `attachment`, `seen`, `created_at`, `updated_at`) VALUES
('2153469133', 3, 4, 'hi', NULL, 0, '2024-04-04 14:16:02', '2024-04-04 14:16:02'),
('2262580820', 3, 5, 'hii', NULL, 0, '2025-08-11 13:57:19', '2025-08-11 13:57:19'),
('2263016537', 3, 5, 'hi', NULL, 0, '2024-04-04 14:16:07', '2024-04-04 14:16:07'),
('2548758850', 3, 7, 'hii', NULL, 0, '2025-10-08 00:38:15', '2025-10-08 00:38:15');

-- --------------------------------------------------------

--
-- Table structure for table `common_cases`
--

CREATE TABLE `common_cases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `number` varchar(191) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `account` int(11) NOT NULL DEFAULT 0,
  `priority` int(11) NOT NULL DEFAULT 0,
  `contact` int(11) NOT NULL DEFAULT 0,
  `type` int(11) NOT NULL DEFAULT 0,
  `description` varchar(191) DEFAULT NULL,
  `attachments` varchar(191) DEFAULT NULL,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `common_cases`
--

INSERT INTO `common_cases` (`id`, `user_id`, `name`, `number`, `status`, `account`, `priority`, `contact`, `type`, `description`, `attachments`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 0, 'Ela', '1', 0, 1, 0, 0, 3, NULL, '', 3, '2025-10-08 06:07:18', '2025-10-08 06:07:18');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `name` varchar(191) DEFAULT NULL,
  `account` int(11) NOT NULL DEFAULT 0,
  `email` varchar(191) DEFAULT NULL,
  `phone` varchar(191) NOT NULL DEFAULT '0',
  `contact_address` text DEFAULT NULL,
  `contact_city` varchar(191) DEFAULT NULL,
  `contact_state` varchar(191) DEFAULT NULL,
  `contact_country` varchar(191) DEFAULT NULL,
  `contact_postalcode` varchar(191) DEFAULT NULL,
  `description` varchar(191) DEFAULT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `user_id`, `name`, `account`, `email`, `phone`, `contact_address`, `contact_city`, `contact_state`, `contact_country`, `contact_postalcode`, `description`, `is_active`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 0, 'Mahesh Zemase', 0, 'mahesh.zemase@extraaazpos.com', '8087056234', 'Panvel', 'Panvel', 'Maharashtra', 'India', '421025', NULL, 1, 3, '2024-04-06 05:51:53', '2024-04-06 05:51:53'),
(2, 0, 'Puja Khandagale', 0, NULL, '6565656565', NULL, NULL, NULL, NULL, NULL, NULL, 1, 3, '2025-10-09 05:40:32', '2025-10-09 05:40:32');

-- --------------------------------------------------------

--
-- Table structure for table `contracts`
--

CREATE TABLE `contracts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `client_name` int(11) NOT NULL,
  `subject` varchar(191) DEFAULT NULL,
  `value` varchar(191) DEFAULT NULL,
  `type` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `notes` varchar(191) DEFAULT NULL,
  `description` varchar(191) NOT NULL,
  `owner_signature` longtext DEFAULT NULL,
  `client_signature` longtext DEFAULT NULL,
  `status` varchar(191) NOT NULL DEFAULT 'pending',
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contracts`
--

INSERT INTO `contracts` (`id`, `name`, `client_name`, `subject`, `value`, `type`, `start_date`, `end_date`, `notes`, `description`, `owner_signature`, `client_signature`, `status`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Test Contracts', 4, 'test', '3', 1, '2025-10-08', '2025-10-31', 'rfsdadasdsa', '', NULL, NULL, 'pending', 3, '2025-10-08 06:37:59', '2025-10-08 06:37:59');

-- --------------------------------------------------------

--
-- Table structure for table `contract_attechments`
--

CREATE TABLE `contract_attechments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `contract_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(191) NOT NULL,
  `files` varchar(191) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contract_comments`
--

CREATE TABLE `contract_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `contract_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(191) NOT NULL,
  `comment` varchar(191) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contract_notes`
--

CREATE TABLE `contract_notes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `contract_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `note` varchar(191) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contract_types`
--

CREATE TABLE `contract_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contract_types`
--

INSERT INTO `contract_types` (`id`, `name`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'YEARLY', 3, '2024-04-07 15:45:22', '2024-04-07 15:45:22');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `code` varchar(191) DEFAULT NULL,
  `discount` double(8,2) NOT NULL DEFAULT 0.00,
  `limit` int(11) NOT NULL DEFAULT 0,
  `description` text DEFAULT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `account` int(11) NOT NULL DEFAULT 0,
  `folder` int(11) NOT NULL DEFAULT 0,
  `type` int(11) NOT NULL DEFAULT 0,
  `opportunities` int(11) NOT NULL DEFAULT 0,
  `publish_date` date NOT NULL,
  `expiration_date` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `description` varchar(191) DEFAULT NULL,
  `attachment` varchar(191) DEFAULT NULL,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`id`, `user_id`, `name`, `account`, `folder`, `type`, `opportunities`, `publish_date`, `expiration_date`, `status`, `description`, `attachment`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 0, 'doc 1', 1, 1, 1, 1, '2025-10-08', '2025-10-08', 0, 'test', 'Sales_1_1759925530.pdf', 3, '2025-10-08 06:42:10', '2025-10-08 06:42:10');

-- --------------------------------------------------------

--
-- Table structure for table `document_folders`
--

CREATE TABLE `document_folders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `parent` varchar(191) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `document_folders`
--

INSERT INTO `document_folders` (`id`, `name`, `parent`, `description`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Client Document', '0', NULL, 3, '2024-04-07 15:42:37', '2024-04-07 15:42:37');

-- --------------------------------------------------------

--
-- Table structure for table `document_types`
--

CREATE TABLE `document_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `document_types`
--

INSERT INTO `document_types` (`id`, `name`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'pdf', 3, '2024-04-07 15:42:17', '2024-04-07 15:42:17');

-- --------------------------------------------------------

--
-- Table structure for table `email_templates`
--

CREATE TABLE `email_templates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `from` varchar(191) DEFAULT NULL,
  `slug` varchar(191) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `email_templates`
--

INSERT INTO `email_templates` (`id`, `name`, `from`, `slug`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'New User', 'Extraaaz', 'new_user', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(2, 'Lead Assigned', 'Extraaaz', 'lead_assigned', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(3, 'Task Assigned', 'Extraaaz', 'task_assigned', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(4, 'Quote Created', 'Extraaaz', 'quote_created', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(5, 'New Sales Order', 'Extraaaz', 'new_sales_order', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(6, 'New Invoice', 'Extraaaz', 'new_invoice', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(7, 'Meeting Assigned', 'Extraaaz', 'meeting_assigned', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(8, 'Campaign Assigned', 'Extraaaz', 'campaign_assigned', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(9, 'New Contract', 'Extraaaz', 'new_contract', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47');

-- --------------------------------------------------------

--
-- Table structure for table `email_template_langs`
--

CREATE TABLE `email_template_langs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` int(11) NOT NULL,
  `lang` varchar(100) NOT NULL,
  `subject` varchar(191) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `email_template_langs`
--

INSERT INTO `email_template_langs` (`id`, `parent_id`, `lang`, `subject`, `content`, `created_at`, `updated_at`) VALUES
(1, 1, 'ar', 'Login Detail', '<p>مرحبا ، مرحبا بك في { app_name }.</p>\n                            <p>&nbsp;</p>\n                            <p>البريد الالكتروني : { mail }</p>\n                            <p>كلمة السرية : { password }</p>\n                            <p>{ app_url }</p>\n                            <p>&nbsp;</p>\n                            <p>شكرا</p>\n                            <p>{ app_name }</p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(2, 1, 'da', 'Login Detail', '<p>Hej, velkommen til { app_name }.</p>\n                            <p>&nbsp;</p>\n                            <p>E-mail: { email }-</p>\n                            <p>kodeord: { password }</p>\n                            <p>{ app_url }</p>\n                            <p>&nbsp;</p>\n                            <p>Tak.</p>\n                            <p>{ app_name }</p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(3, 1, 'de', 'Login Detail', '<p>Hallo, Willkommen bei {app_name}.</p>\n                            <p>&nbsp;</p>\n                            <p>E-Mail: {email}</p>\n                            <p>Kennwort: {password}</p>\n                            <p>{app_url}</p>\n                            <p>&nbsp;</p>\n                            <p>Danke,</p>\n                            <p>{Anwendungsname}</p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(4, 1, 'en', 'Login Detail', '<p>Hello,&nbsp;<br>Welcome to {app_name}.</p><p><b>Email </b>: {email}<br><b>Password</b> : {password}</p><p>{app_url}</p><p>Thanks,<br>{app_name}</p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(5, 1, 'es', 'Login Detail', '<p>Hola, Bienvenido a {app_name}.</p>\n                            <p>&nbsp;</p>\n                            <p>Correo electr&oacute;nico: {email}</p>\n                            <p>Contrase&ntilde;a: {password}</p>\n                            <p>&nbsp;</p>\n                            <p>{app_url}</p>\n                            <p>&nbsp;</p>\n                            <p>Gracias,</p>\n                            <p>{app_name}</p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(6, 1, 'fr', 'Login Detail', '<p>Bonjour, Bienvenue dans { app_name }.</p>\n                            <p>&nbsp;</p>\n                            <p>E-mail: { email }</p>\n                            <p>Mot de passe: { password }</p>\n                            <p>{ adresse_url }</p>\n                            <p>&nbsp;</p>\n                            <p>Merci,</p>\n                            <p>{ nom_app }</p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(7, 1, 'it', 'Login Detail', '<p>Ciao, Benvenuti in {app_name}.</p>\n                            <p>&nbsp;</p>\n                            <p>Email: {email} Password: {password}</p>\n                            <p>&nbsp;</p>\n                            <p>{app_url}</p>\n                            <p>&nbsp;</p>\n                            <p>Grazie,</p>\n                            <p>{app_name}</p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(8, 1, 'ja', 'Login Detail', '<p>こんにちは、 {app_name}へようこそ。</p>\n                            <p>&nbsp;</p>\n                            <p>E メール : {email}</p>\n                            <p>パスワード : {password}</p>\n                            <p>{app_url}</p>\n                            <p>&nbsp;</p>\n                            <p>ありがとう。</p>\n                            <p>{app_name}</p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(9, 1, 'nl', 'Login Detail', '<p>Hallo, Welkom bij { app_name }.</p>\n                                <p>&nbsp;</p>\n                                <p>E-mail: { email }</p>\n                                <p>Wachtwoord: { password }</p>\n                                <p>{ app_url }</p>\n                                <p>&nbsp;</p>\n                                <p>Bedankt.</p>\n                                <p>{ app_name }</p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(10, 1, 'pl', 'Login Detail', '<p>Witaj, Witamy w aplikacji {app_name }.</p>\n                            <p>&nbsp;</p>\n                            <p>E-mail: {email }</p>\n                            <p>Hasło: {password }</p>\n                            <p>{app_url }</p>\n                            <p>&nbsp;</p>\n                            <p>Dziękuję,</p>\n                            <p>{app_name }</p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(11, 1, 'ru', 'Login Detail', '<p>Здравствуйте, Добро пожаловать в { app_name }.</p>\n                            <p>&nbsp;</p>\n                            <p>Адрес электронной почты: { email }</p>\n                            <p>Пароль: { password }</p>\n                            <p>&nbsp;</p>\n                            <p>{ app_url }</p>\n                            <p>&nbsp;</p>\n                            <p>Спасибо.</p>\n                            <p>{ имя_программы }</p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(12, 1, 'pt', 'Login Detail', '<p>Ol&aacute;, Bem-vindo a {app_name}.</p>\n                            <p>&nbsp;</p>\n                            <p>E-mail: {email}</p>\n                            <p>Senha: {senha}</p>\n                            <p>{app_url}</p>\n                            <p>&nbsp;</p>\n                            <p>Obrigado,</p>\n                            <p>{app_name}</p>\n                            <p>{ имя_программы }</p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(13, 1, 'tr', 'Login Detail', '<p>Merhaba,&nbsp;<br>{app_name}]e hoş geldiniz.</p>\n                            <p><b>E-posta </b>: {e-posta}<br><b>Şifre</b> : {şifre}</p><p>{uygulama_urlsi}</p><p>Teşekkürler,<br>{uygulama ismi}</p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(14, 1, 'zh', 'Login Detail', '<p>您好，<br>欢迎访问 {app_name}。</p><p><b>电子邮件 </b>: {email}<br><b>密码</b> : {password}</p><p>{app_url}</p><p>谢谢，<br>{app_name}</p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(15, 1, 'he', 'Login Detail', '<p>שלום, &nbsp;<br>ברוכים הבאים אל {app_name}.</p><p><b>דואל </b>: {דואל}<br><b>סיסמה</b> : {password}</p><p>{app_url}</p><p>תודה,<br>{app_name}</p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(16, 1, 'pt-br', 'Login Detail', '<p>Olá,&nbsp;<br>Bem-vindo ao {app_name}.</p><p><b>Email </b>: {email}<b>Senha</b> : {password}{app_url}Obrigado,{app_name}<br></p><p></p><p><br></p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(17, 2, 'ar', 'Lead Assign', '<p>مرحبا ، { lead_assign_user }</p>\n                            <p>&nbsp;</p>\n                            <p>الرصاص الجديد تم تعيينه لك</p>\n                            <p>اسم الرصاص : { lead_name }</p>\n                            <p>البريد الالكتروني الرئيسي : { lead_email }</p>\n                            <p>&nbsp;</p>\n                            <p>Regards نوع ،</p>\n                            <p>{ app_name }</p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(18, 2, 'da', 'Lead Assign', '<p>Hello, { lead_assign_user }</p>\n                            <p>&nbsp;</p>\n                            <p>New Lead er blevet tildelt.</p>\n                            <p>Ledernavn: { lead_name }</p>\n                            <p>Lead-e-mail: { lead_email }</p>\n                            <p>&nbsp;</p>\n                            <p>Kind Hilds,</p>\n                            <p>{ app_name }</p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(19, 2, 'de', 'Lead Assign', '<<p>Hallo, {lead_assign_user}</p>\n                            <p>&nbsp;</p>\n                            <p>Neuer Lead wurde Ihnen zugeordnet.</p>\n                            <p>&nbsp;</p>\n                            <p>Vorf&uuml;hrname: {lead_name}</p>\n                            <p>Lead-E-Mail: {lead_email}</p>\n                            <p>&nbsp;</p>\n                            <p>G&uuml;tige Gr&uuml;&szlig;e,</p>\n                            <p>{Anwendungsname}</p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(20, 2, 'en', 'Lead Assign', '<p>Hello, {lead_assign_user}</p>\n                            <p>New Lead has been Assign to you.</p>\n                            <p><strong>Lead Name</strong> : {lead_name}</p>\n                            <p><strong>Lead Email</strong> : {lead_email}</p>\n                            <p>&nbsp;</p>\n                            <p>Kind Regards,<br />{app_name}</p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(21, 2, 'es', 'Lead Assign', '<p>Hello, {lead_assign_user}</p>\n                            <p>&nbsp;</p>\n                            <p>New Lead ha sido Assign to you.</p>\n                            <p>Nombre de cliente: {lead_name}</p>\n                            <p>Correo electr&oacute;nico principal: {lead_email}</p>\n                            <p>&nbsp;</p>\n                            <p>Bondadoso,</p>\n                            <p>{app_name}</p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(22, 2, 'fr', 'Lead Assign', '<p>Bonjour,</p>\n                            <p>New Lead vous a &eacute;t&eacute; affect&eacute;.</p>\n                            <p>Nom du responsable: { lead_name }</p>\n                            <p>Lead Email: { lead_email }</p>\n                            <p>Lead Stage: { lead_stage }</p>\n                            <p>&nbsp;</p>\n                            <p>Objet responsable: { lead_subject }</p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(23, 2, 'it', 'Lead Assign', '<p>Ciao, {mem_assegna_utente}</p>\n                            <p>New Lead &egrave; stato Assign a te.</p>\n                            <p>Nome lead: {lead_name}</p>\n                            <p>Lead Email: {lead_email}</p>\n                            <p>&nbsp;</p>\n                            <p>Kind Regards,</p>\n                            <p>{app_name}</p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(24, 2, 'ja', 'Lead Assign', '<p>ハロー、 {リード・アシニルユーザー}</p>\n                            <p>新しいリードが割り当てられています。</p>\n                            <p>リード名 : {リード _name}</p>\n                            <p>リード E メール : {リード E メール}</p>\n                            <p>&nbsp;</p>\n                            <p>カンド・リーカード</p>\n                            <p>{app_name}</p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(25, 2, 'nl', 'Lead Assign', '<p>Hallo, { lead_assign_user }</p>\n                            <p>New Lead is aan u toegewezen.</p>\n                            <p>Naam van lead: { lead_name }</p>\n                            <p>E-mail leiden: { lead_email }</p>\n                            <p>&nbsp;</p>\n                            <p>Vriendelijke groeten,</p>\n                            <p>{ app_name }</p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(26, 2, 'pl', 'Lead Assign', '<p>Witaj, {lead_assign_user }</p>\n                            <p>Nowy kierownik został przypisany do Ciebie.</p>\n                            <p>Nazwa wiodła: {lead_name }</p>\n                            <p>Gł&oacute;wny adres e-mail: {lead_email }</p>\n                            <p>&nbsp;</p>\n                            <p>W Odniesieniu Do Rodzaju,</p>\n                            <p>{app_name }</p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(27, 2, 'ru', 'Lead Assign', '<p>Здравствуйте, { lead_assign_user }</p>\n                            <p>Вам назначили нового руководителя.</p>\n                            <p>Имя ведущего: { lead_name }</p>\n                            <p>Электронная почта: { lead_email }</p>\n                            <p>&nbsp;</p>\n                            <p>Привет.</p>\n                            <p>{ имя_программы }</p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(28, 2, 'pt', 'Lead Assign', '<p>Ol&aacute;, {lead_assign_user}</p>\n                            <p>Nova Lideran&ccedil;a foi Assign para voc&ecirc;.</p>\n                            <p>Nome do lead: {lead_name}</p>\n                            <p>Email Principal: {lead_email}</p>\n                            <p>&nbsp;</p>\n                            <p>Esp&eacute;cie Considera,</p>\n                            <p>{app_name}</p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(29, 2, 'tr', 'Lead Assign', '<p>Merhaba, {lead_assign_user}</p>\n                            <p>Yeni Müşteri Adayı size atandı.</p>\n                            <p><strong>Kurşun Adı</strong> : {kurşun_adı}</p>\n                            <p><strong>Potansiyel Müşteri E-postası</strong> : {lead_email}</p>\n                            <p>&nbsp;</p>\n                            <p>Saygılarımla,<br />{uygulama ismi}</p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(30, 2, 'zh', 'Lead Assign', '<p>Hello， {lead_assign_user}</p> <p>新商机已分配给您。</p> <p><strong>商机名称</strong> : {lead_name}</p> <p><strong>商机电子邮件</strong> : {lead_email}</p> <p></p> <p>种类注册，<br />{app_name}</p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(31, 2, 'he', 'Lead Assign', '<p>שלום, {lead_assign_user}</p> <p>ביצוע חדש הוקצתה לכם.</p> <p><strong>שם ביצוע</strong> : {lead_name}</p> <p><strong>דואל מוביל</strong> : {lead_email}</p> <p>&nbsp;</p> <p>סוג בברכה,<br />{app_name}</p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(32, 2, 'pt-br', 'Lead Assign', '<p>Olá, {lead_assign_user}</p>\n                    <p>Novo lead foi atribuído a você.</p>\n                    <p><strong>Nome do lead</strong> : {lead_name}</p>\n                    <p><strong>E-mail do lead</strong> : {lead_email}</p>\n                    <p>&nbsp;</p>\n                    <p>Atenciosamente,<br />{app_name}</p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(33, 3, 'ar', 'Task Assign', '<p>عزيزي ، { task_assign_user }</p>\n                            <p>&nbsp;</p>\n                            <p>تم تخصيصك لمهمة جديدة :</p>\n                            <p>الاسم : { task_name }</p>\n                            <p>تاريخ البدء : { task_start_date }</p>\n                            <p>تاريخ الاستحقاق : { task_due_date }</p>\n                            <p>المرحلة : { task_mattمرحلت }</p>\n                            <p>&nbsp;</p>\n                            <p>Regards نوع ،</p>\n                            <p>{ app_name }</p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(34, 3, 'da', 'Task Assign', '<p>K&aelig;re, { task_assign_user }</p>\n                            <p>&nbsp;</p>\n                            <p>Du er tildelt til en ny opgave:</p>\n                            <p>Navn: { task_name }</p>\n                            <p>Startdato: { task_start_date }</p>\n                            <p>Forfaldsdato: { task_due_date }</p>\n                            <p>Trin: { task_stage }</p>\n                            <p>&nbsp;</p>\n                            <p>Kind Hilds,</p>\n                            <p>{ app_name }</p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(35, 3, 'de', 'Task Assign', '<p>Sehr geehrte Frau, {task_assign_user}</p>\n                            <p>&nbsp;</p>\n                            <p>Sie wurden einer neuen Aufgabe zugeordnet:</p>\n                            <p>Name: {task_name}</p>\n                            <p>Start Date: {task_start_date}</p>\n                            <p>F&auml;lligkeitsdatum: {task_due_date}</p>\n                            <p>Stage: {task_stage}</p>\n                            <p>&nbsp;</p>\n                            <p>&nbsp;</p>\n                            <p>G&uuml;tige Gr&uuml;&szlig;e,</p>\n                            <p>{Anwendungsname}</p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(36, 3, 'en', 'Task Assign', '<p>Dear, {task_assign_user}</p>\n                            <p>You have been assigned to a new task:</p>\n                            <p style=\"text-align: justify;\"><strong>Name</strong>: {task_name}</p>\n                            <p><strong>Start Date</strong>: {task_start_date}<br /><strong>Due date</strong>: {task_due_date}<br /><strong>Stage</strong> : {task_stage}</p>\n                            <p><br />Kind Regards,<br />{app_name}</p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(37, 3, 'es', 'Task Assign', '<p>Estimado, {task_assign_user}</p>\n                            <p>&nbsp;</p>\n                            <p>Se le ha asignado una nueva tarea:</p>\n                            <p>Nombre: {task_name}</p>\n                            <p>Fecha de inicio: {task_start_date}</p>\n                            <p>Fecha de vencimiento: {task_due_date}</p>\n                            <p>Etapa: {task_stage}</p>\n                            <p>&nbsp;</p>\n                            <p>&nbsp;</p>\n                            <p>Bondadoso,</p>\n                            <p>{app_name}</p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(38, 3, 'fr', 'Task Assign', '<p>Cher, { task_assign_user }</p>\n                            <p>&nbsp;</p>\n                            <p>Vous avez &eacute;t&eacute; affect&eacute; &agrave; une nouvelle t&acirc;che:</p>\n                            <p>Nom: { task_name }</p>\n                            <p>Date de d&eacute;but: { task_start_date }</p>\n                            <p>Date d &eacute;ch&eacute;ance: { task_due_date }</p>\n                            <p>Etape: { task_stage }</p>\n                            <p>&nbsp;</p>\n                            <p>&nbsp;</p>\n                            <p>Kind Regards,</p>\n                            <p>{ nom_app }</p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(39, 3, 'it', 'Task Assign', '<p>Caro, {task_assign_user}</p>\n                            <p>&nbsp;</p>\n                            <p>Ti &egrave; stato assegnato un nuovo incarico:</p>\n                            <p>Nome: {task_name}</p>\n                            <p>Data di inizio: {task_start_date}</p>\n                            <p>Data di scadenza: {task_due_date}</p>\n                            <p>Stage: {task_stage}</p>\n                            <p>&nbsp;</p>\n                            <p>&nbsp;</p>\n                            <p>Kind Regards,</p>\n                            <p>{app_name}</p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(40, 3, 'ja', 'Task Assign', '<p>Dear、 {task_assign_user}</p>\n                            <p>&nbsp;</p>\n                            <p>新規タスクに割り当てられました :</p>\n                            <p>名前: {task_name}</p>\n                            <p>開始日: {task_start_date}</p>\n                            <p>予定日: {task_due_date}</p>\n                            <p>ステージ : {task_stage}</p>\n                            <p>&nbsp;</p>\n                            <p>カンド・リーカード</p>\n                            <p>{app_name}</p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(41, 3, 'nl', 'Task Assign', '<p>Geachte, { task_assign_user }</p>\n                            <p>&nbsp;</p>\n                            <p>U bent toegewezen aan een nieuwe taak:</p>\n                            <p>Naam: { task_name }</p>\n                            <p>Begindatum: { task_start_date }</p>\n                            <p>Vervaldatum: { task_due_date }</p>\n                            <p>Stadium: { task_stage }</p>\n                            <p>&nbsp;</p>\n                            <p>Vriendelijke groeten,</p>\n                            <p>{ app_name }</p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(42, 3, 'pl', 'Task Assign', '<p>Szanowny, {task_assign_user }</p>\n                            <p>&nbsp;</p>\n                            <p>Użytkownik został przypisany do nowego zadania:</p>\n                            <p>Nazwa: {task_name }</p>\n                            <p>Data rozpoczęcia: {task_start_date }</p>\n                            <p>Data zakończenia: {task_due_date }</p>\n                            <p>Etap: {task_stage }</p>\n                            <p>&nbsp;</p>\n                            <p>W Odniesieniu Do Rodzaju,</p>\n                            <p>{app_name }</p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(43, 3, 'ru', 'Task Assign', '<p>Уважаемый, { task_assign_user }</p>\n                            <p>&nbsp;</p>\n                            <p>Вы назначены для новой задачи:</p>\n                            <p>Имя: { task_name }</p>\n                            <p>Начальная дата: { task_start_date }</p>\n                            <p>Срок выполнения: { task_due_date }</p>\n                            <p>Этап: { task_stage }</p>\n                            <p>&nbsp;</p>\n                            <p>Привет.</p>\n                            <p>{ имя_программы }</p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(44, 3, 'pt', 'Task Assign', '<p>Querido, {task_assign_user}</p>\n                            <p>&nbsp;</p>\n                            <p>Voc&ecirc; foi designado para uma nova tarefa:</p>\n                            <p>Nome: {task_name}</p>\n                            <p>Data de in&iacute;cio: {task_start_date}</p>\n                            <p>Prazo de vencimento: {task_due_date}</p>\n                            <p>Est&aacute;gio: {task_stage}</p>\n                            <p>&nbsp;</p>\n                            <p>Esp&eacute;cie Considera,</p>\n                            <p>{app_name}</p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(45, 3, 'tr', 'Task Assign', '<p>Sayın {task_assign_user}</p>\n                            <p>Yeni bir göreve atandınız:</p>\n                            <p style=\"text-align: justify;\"><strong>İsim</strong>: {görev adı}</p>\n                            <p><strong>Başlangıç ​​tarihi</strong>: {görev_başlangıç_tarihi}<br /><strong>Bitiş tarihi</strong>: {görev_due_date}<br /><strong>Sahne</strong> : {görev_aşaması}</p>\n                            <p><br />Saygılarımla,<br />{uygulama ismi}</p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(46, 3, 'zh', 'Task Assign', '<p>Hello， {lead_assign_user}</p> <p>新商机已分配给您。</p> <p><strong>商机名称</strong> : {lead_name}</p> <p><strong>商机电子邮件</strong> : {lead_email}</p> <p></p> <p>种类注册，<br />{app_name}</p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(47, 3, 'he', 'Task Assign', '<p>יקירתי, {task_assign_user}</p>\n                             <p>הוקצית למשימה חדשה:</p>\n                             <p style=\"text-align: justify;\"><strong>Name</strong>: {task_name}</p>\n                             תאריך התחלה: {task_start_date}<br /><p><strong>תאריך</strong> <strong>יעד</strong>: {task_due_date}<br /><strong>Stage</strong> : {task_stage}</p>\n                             <p><br />Kind Regards,<br />{app_name}</p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(48, 3, 'pt-br', 'Task Assign', '<p>Prezados, {task_assign_user}</p>\n                             <p>Você foi atribuído a uma nova tarefa:</p>\n                             <p style=\"text-align: justify;\"><strong>Nome</strong>: {task_name}</p>\n                             Data de Início: {task_start_date}<br /><p><strong>Data de</strong> <strong>Vencimento</strong>: {task_due_date}<br /><strong>Etapa</strong> : {task_stage}</p>\n                             <br /><p>Atenciosamente,<br />{app_name}</p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(49, 4, 'ar', 'Quotation Create', '<p>عزيزي ، { quote_assign_user }</p>\n                            <p>&nbsp;</p>\n                            <p>لقد تم تخصيصك لاقتباس جديد : رقم التسعير : { quote_number }</p>\n                            <p>عنوان الفواتير : { billing_address }</p>\n                            <p>عنوان الشحن : { shipping_address }</p>\n                            <p>&nbsp;</p>\n                            <p>Regards نوع ،</p>\n                            <p>{ app_name }</p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(50, 4, 'da', 'Quotation Create', '<p>K&aelig;re, { quote_assign_user }</p>\n                            <p>&nbsp;</p>\n                            <p>Du er blevet tildelt et nyt tilbud:</p>\n                            <p>Tilbudsnummer: { quote_number }</p>\n                            <p>Faktureringsadresse: { billing_address }</p>\n                            <p>Shipping Address: { shipping_address }</p>\n                            <p>&nbsp;</p>\n                            <p>Kind Hilds,</p>\n                            <p>{ app_name }</p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(51, 4, 'de', 'Quotation Create', '<p>Sehr geehrte Frau, {quote_assign_user}</p>\n                            <p>&nbsp;</p>\n                            <p>Sie wurden einem neuen Angebot zugeordnet:</p>\n                            <p>Angebotsnummer: {quote_number}</p>\n                            <p>Rechnungsadresse: {billing_address}</p>\n                            <p>Versandadresse: {shipping_address}</p>\n                            <p>&nbsp;</p>\n                            <p>G&uuml;tige Gr&uuml;&szlig;e,</p>\n                            <p>{Anwendungsname}</p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(52, 4, 'en', 'Quotation Create', '<p>Dear, {quote_assign_user}</p>\n                            <p>You have been assigned to a new quotation:</p>\n                            <p><strong>Quote Number</strong> : {quote_number}</p>\n                            <p><strong>Billing Address</strong> : {billing_address}</p>\n                            <p><strong>Shipping Address</strong> :&nbsp; {shipping_address}</p>\n                            <p><br />Kind Regards,<br />{app_name}</p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(53, 4, 'es', 'Quotation Create', '<p>Estimado, {quote_assign_user}</p>\n                            <p>&nbsp;</p>\n                            <p>Se le ha asignado un nuevo presupuesto:</p>\n                            <p>N&uacute;mero de presupuesto: {quote_number}</p>\n                            <p>Direcci&oacute;n de facturaci&oacute;n: {billing_address}</p>\n                            <p>Direcci&oacute;n de env&iacute;o: {shipping_address}</p>\n                            <p>&nbsp;</p>\n                            <p>Bondadoso,</p>\n                            <p>{app_name}</p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(54, 4, 'fr', 'Quotation Create', '<p>Cher, { quote_utilisateur_quo; }</p>\n                            <p>&nbsp;</p>\n                            <p>Vous avez &eacute;t&eacute; affect&eacute; &agrave; un nouveau devis:</p>\n                            <p>Num&eacute;ro de devis: { quote_number }</p>\n                            <p>Adresse de facturation: { adresse_facturation }</p>\n                            <p>Adresse d exp&eacute;dition: { adresse_livraison }</p>\n                            <p>&nbsp;</p>\n                            <p>Kind Regards,</p>\n                            <p>{ nom_app }</p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(55, 4, 'it', 'Quotation Create', '<p>Caro, {quote_assign_user}</p>\n                            <p>&nbsp;</p>\n                            <p>Sei stato assegnato a una nuova quotazione:</p>\n                            <p>Quote Numero: {quote_numero}</p>\n                            <p>Indirizzo fatturazione: {billing_address}</p>\n                            <p>Shipping Address: {indirizzo_indirizzo}</p>\n                            <p>&nbsp;</p>\n                            <p>Kind Regards,</p>\n                            <p>{app_name}</p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(56, 4, 'ja', 'Quotation Create', '<p>ディア、 {quote_assign_user}</p>\n                            <p>&nbsp;</p>\n                            <p>新規見積に割り当てられています。</p>\n                            <p>見積番号 : {quote_number}</p>\n                            <p>請求先住所 : {billing_address}</p>\n                            <p>出荷先住所 : {shipping_address}</p>\n                            <p>&nbsp;</p>\n                            <p>カンド・リーカード</p>\n                            <p>{app_name}</p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(57, 4, 'nl', 'Quotation Create', '<p>Geachte, { quote_assign_user }</p>\n                            <p>&nbsp;</p>\n                            <p>U bent toegewezen aan een nieuwe prijsopgave:</p>\n                            <p>Quote-nummer: { quote_number }</p>\n                            <p>Factureringsadres: { billing_address }</p>\n                            <p>Verzendadres: { shipping_address }</p>\n                            <p>&nbsp;</p>\n                            <p>Vriendelijke groeten,</p>\n                            <p>{ app_name }</p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(58, 4, 'pl', 'Quotation Create', '<p>Szanowny, {quote_assign_user }</p>\n                            <p>&nbsp;</p>\n                            <p>Użytkownik został przypisany do nowego notowania:</p>\n                            <p>Numer oferty: {numer_cytowania }</p>\n                            <p>Adres do faktury: {adres_faktury }</p>\n                            <p>Adres dostawy: {adres_shipp_}</p>\n                            <p>&nbsp;</p>\n                            <p>W Odniesieniu Do Rodzaju,</p>\n                            <p>{app_name }</p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(59, 4, 'ru', 'Quotation Create', '<p>Уважаемый, { quote_assign_user }</p>\n                            <p>&nbsp;</p>\n                            <p>Вам назначено новое предложение:</p>\n                            <p>Номер предложения: { quote_number }</p>\n                            <p>Адрес выставления счета: { billing_address }</p>\n                            <p>Адрес доставки: { shipping_address }</p>\n                            <p>&nbsp;</p>\n                            <p>Привет.</p>\n                            <p>{ имя_программы }</p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(60, 4, 'pt', 'Quotation Create', '<p>Querido, {quote_assign_user}</p>\n                            <p>&nbsp;</p>\n                            <p>Voc&ecirc; foi designado para uma nova cita&ccedil;&atilde;o:</p>\n                            <p>Quote N&uacute;mero: {quote_number}</p>\n                            <p>Endere&ccedil;o de cobran&ccedil;a: {billing_address}</p>\n                            <p>Endere&ccedil;o de envio: {shipping_address}</p>\n                            <p>&nbsp;</p>\n                            <p>Esp&eacute;cie Considera,</p>\n                            <p>{app_name}</p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(61, 4, 'tr', 'Quotation Create', '<p>Sayın {quote_assign_user}</p>\n                            <p>Yeni bir teklife atandınız:</p>\n                            <p><strong>Alıntı numarası</strong> : {alıntı numarası}</p>\n                            <p><strong> Fatura Adresi</strong> : {Fatura Adresi}</p>\n                            <p><strong>Gönderi Adresi</strong> :&nbsp; {Gönderi Adresi}</p>\n                            <p><br />Saygılarımla,<br />{uygulama ismi}</p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(62, 4, 'zh', 'Quotation Create', '<p>亲爱的， {quote_assign_user}</p>\n                            <p>您已分配到新的报价单：</p>\n                            <p><strong>报价编号</strong> ： {quote_number}</p>\n                            <p><strong>账单地址</strong> ： {billing_address}</p>\n                            <p><strong>送货地址</strong> ：&nbsp; {shipping_address}</p>\n                            <p><br />亲切的问候，<br />{app_name}</p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(63, 4, 'he', 'Quotation Create', '<p>יקירתי, {quote_assign_user}</p>\n                            <p>שובצת להצעת מחיר חדשה:</p>\n                            <p><strong>מספר ציטוט</strong> : {quote_number}</p>\n                            <p><strong>כתובת לחיוב</strong> : {billing_address}</p>\n                            <p><strong>כתובת למשלוח</strong> :&nbsp; {shipping_address}</p>\n                            <p><br />Kind Regards,<br />{app_name}</p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(64, 4, 'pt-br', 'Quotation Create', '<p>Prezados, {quote_assign_user}</p>\n                            <p>Você foi atribuído a uma nova cotação:</p>\n                            <p><strong>Número da cotação</strong> : {quote_number}</p>\n                            <p><strong>Endereço de faturamento</strong> : {billing_address}</p>\n                            <p><strong>Endereço de entrega</strong> :&nbsp; {shipping_address}</p>\n                            <br /><p>Atenciosamente,<br />{app_name}</p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(65, 5, 'ar', 'Sales Order Create', '<p>عزيزي ، { مبيعات البيع _ assign_user }</p>\n                            <p>&nbsp;</p>\n                            <p>تم تخصيصك لعرض أسعار جديد :</p>\n                            <p>رقم التسعير : { quote_number }</p>\n                            <p>عنوان الفواتير : { billing_address }</p>\n                            <p>عنوان الشحن : { shipping_address }</p>\n                            <p>&nbsp;</p>\n                            <p>Regards نوع ،</p>\n                            <p>{ app_name }</p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(66, 5, 'da', 'Sales Order Create', '<p>K&aelig;re, { salesorder_assign_user }</p>\n                            <p>&nbsp;</p>\n                            <p>Du har f&aring;et tildelt et nyt tilbud:</p>\n                            <p>Tilbudsnummer: { quote_number }</p>\n                            <p>Faktureringsadresse: { billing_address }</p>\n                            <p>Shipping Address: { shipping_address }</p>\n                            <p>&nbsp;</p>\n                            <p>Kind Hilds,</p>\n                            <p>{ app_name }</p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(67, 5, 'de', 'Sales Order Create', '<p>Sehr geehrte Frau, {salesorder_assign_user}</p>\n                            <p>&nbsp;</p>\n                            <p>Sie wurden einem neuen Angebot zugeordnet:</p>\n                            <p>Angebotsnummer: {quote_number}</p>\n                            <p>Rechnungsadresse: {billing_address}</p>\n                            <p>Versandadresse: {shipping_address}</p>\n                            <p>&nbsp;</p>\n                            <p>G&uuml;tige Gr&uuml;&szlig;e,</p>\n                            <p>{Anwendungsname}</p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(68, 5, 'en', 'Sales Order Create', '<p>Dear, {salesorder_assign_user}</p>\n                            <p>You have been assigned to a new quotation:</p>\n                            <p><strong>Quote Number</strong>&nbsp;: {quote_number}</p>\n                            <p><strong>Billing Address</strong>&nbsp;: {billing_address}</p>\n                            <p><strong>Shipping Address</strong>&nbsp;:&nbsp; {shipping_address}</p>\n                            <p><br />Kind Regards,<br />{app_name}</p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(69, 5, 'es', 'Sales Order Create', '<p>Estimado, {salesorder_assign_user}</p>\n                            <p>&nbsp;</p>\n                            <p>Se le ha asignado una nueva cotizaci&oacute;n:</p>\n                            <p>N&uacute;mero de presupuesto: {quote_number}</p>\n                            <p>Direcci&oacute;n de facturaci&oacute;n: {billing_address}</p>\n                            <p>Direcci&oacute;n de env&iacute;o: {shipping_address}</p>\n                            <p>&nbsp;</p>\n                            <p>Bondadoso,</p>\n                            <p>{app_name}</p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(70, 5, 'fr', 'Sales Order Create', '<p>Cher, { utilisateur_assignateur_vendeur }</p>\n                            <p>&nbsp;</p>\n                            <p>Vous avez &eacute;t&eacute; affect&eacute; &agrave; une nouvelle offre:</p>\n                            <p>Num&eacute;ro de devis: { quote_number }</p>\n                            <p>Adresse de facturation: { adresse_facturation }</p>\n                            <p>Adresse d exp&eacute;dition: { adresse_livraison }</p>\n                            <p>&nbsp;</p>\n                            <p>Kind Regards,</p>\n                            <p>{ nom_app }</p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(71, 5, 'it', 'Sales Order Create', '<p>Caro, {salesorder_assign_user}</p>\n                            <p>&nbsp;</p>\n                            <p>Ti &egrave; stato assegnato una nuova quotazione:</p>\n                            <p>Numero preventivo: {quote_number}</p>\n                            <p>Billing Address: {billing_address}</p>\n                            <p>Shipping Address: {shipping_address}</p>\n                            <p>&nbsp;</p>\n                            <p>Kind Regards,</p>\n                            <p>{app_name}</p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(72, 5, 'ja', 'Sales Order Create', '<p>Dear、 {salesorder_assign_user}</p>\n                            <p>&nbsp;</p>\n                            <p>新しい引用符が割り当てられています。</p>\n                            <p>見積もり番号 : {quote_number}</p>\n                            <p>請求先住所 : {billing_address}</p>\n                            <p>出荷先住所 : {shipping_address}</p>\n                            <p>&nbsp;</p>\n                            <p>カンド・リーカード</p>\n                            <p>{app_name}</p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(73, 5, 'nl', 'Sales Order Create', '<p>Geachte, { salesorder_assign_user }</p>\n                            <p>&nbsp;</p>\n                            <p>U bent toegewezen aan een nieuwe offerte:</p>\n                            <p>Quote-nummer: { quote_number }</p>\n                            <p>Factureringsadres: { billing_address }</p>\n                            <p>Verzendadres: { shipping_address }</p>\n                            <p>&nbsp;</p>\n                            <p>Vriendelijke groeten,</p>\n                            <p>{ app_name }</p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(74, 5, 'pl', 'Sales Order Create', '<p>Szanowny, {salesorder_assign_user }</p>\n                            <p>&nbsp;</p>\n                            <p>Użytkownik został przypisany do nowego notowania:</p>\n                            <p>Numer oferty: {quote_number }</p>\n                            <p>Adres do faktury: {billing_address }</p>\n                            <p>Adres dostawy: {shipping_address }</p>\n                            <p>&nbsp;</p>\n                            <p>W Odniesieniu Do Rodzaju,</p>\n                            <p>{app_name }</p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(75, 5, 'ru', 'Sales Order Create', '<p>Уважаемый, { salesorder_assign_user }</p>\n                            <p>&nbsp;</p>\n                            <p>Вам назначено новое предложение:</p>\n                            <p>Номер предложения: { quote_number }</p>\n                            <p>Адрес выставления счета: { billing_address }</p>\n                            <p>Адрес доставки: { shipping_address }</p>\n                            <p>&nbsp;</p>\n                            <p>Привет.</p>\n                            <p>{ имя_программы }</p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(76, 5, 'pt', 'Sales Order Create', '<p>Querido, {salesorder_assign_user}</p>\n                            <p>&nbsp;</p>\n                            <p>Voc&ecirc; foi designado para uma nova cita&ccedil;&atilde;o:</p>\n                            <p>N&uacute;mero da Cota&ccedil;&atilde;o: {quote_number}</p>\n                            <p>Endere&ccedil;o de Faturamento: {billing_address}</p>\n                            <p>Endere&ccedil;o de Navega&ccedil;&atilde;o: {shipping_address}</p>\n                            <p>&nbsp;</p>\n                            <p>Esp&eacute;cie Considera,</p>\n                            <p>{app_name}</p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(77, 5, 'tr', 'Sales Order Create', '<p>Sayın {salesorder_assign_user}</p>\n                            <p>Yeni bir teklife atandınız:</p>\n                            <p><strong>Alıntı numarası</strong>&nbsp;: {alıntı numarası}</p>\n                            <p><strong>Fatura Adresi</strong>&nbsp;: {Fatura Adresi}</p>\n                            <p><strong>Gönderi Adresi</strong>&nbsp;:&nbsp; {Gönderi Adresi}</p>\n                            <p><br />Saygılarımla,<br />{uygulama ismi}</p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(78, 5, 'zh', 'Sales Order Create', '<p>亲爱的， {salesorder_assign_user}</p>\n                            <p>您已分配到新的报价单：</p>\n                            <p><strong>报价编号</strong>&nbsp;： {quote_number}</p>\n                            <p><strong>账单地址</strong>&nbsp;： {billing_address}</p>\n                            <p><strong>送货地址</strong>&nbsp;：&nbsp; {shipping_address}</p>\n                            <p><br />亲切的问候，<br />{app_name}</p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(79, 5, 'he', 'Sales Order Create', '<p>יקירתי, {salesorder_assign_user}</p>\n                            <p>שובצת להצעת מחיר חדשה:</p>\n                            <p><strong>מספר</strong>&nbsp;ציטוט : {quote_number}</p>\n                            <p><strong>כתובת</strong>&nbsp;לחיוב : {billing_address}</p>\n                            <p><strong>כתובת</strong>&nbsp;למשלוח :&nbsp; {shipping_address}</p>\n                            <p><br />Kind Regards,<br />{app_name}</p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(80, 5, 'pt-br', 'Sales Order Create', '<p>Prezados, {salesorder_assign_user}</p>\n                            <p>Você foi atribuído a uma nova cotação:</p>\n                            <p>Número&nbsp;<strong>da cotação</strong> : {quote_number}</p>\n                            <p><strong>Endereço</strong>&nbsp;de faturamento : {billing_address}</p>\n                            <p><strong>Endereço</strong>&nbsp;de entrega :&nbsp; {shipping_address}</p>\n                            <br /><p>Atenciosamente,<br />{app_name}</p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(81, 6, 'ar', 'Invoice Create', 'العزيز<span style=\"font-size: 12pt;\">&nbsp;{invoice_client}</span><span style=\"font-size: 12pt;\">,</span><br><br>لقد قمنا بإعداد الفاتورة التالية من أجلك<span style=\"font-size: 12pt;\">: </span><strong style=\"font-size: 12pt;\">&nbsp;{invoice_id}</strong><br><br>حالة الفاتورة<span style=\"font-size: 12pt;\">: {invoice_status}</span><br><br><br>يرجى الاتصال بنا للحصول على مزيد من المعلومات<span style=\"font-size: 12pt;\">.</span><br><br>أطيب التحيات<span style=\"font-size: 12pt;\">,</span><br>{app_name}', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(82, 6, 'da', 'Invoice Create', 'Kære<span style=\"font-size: 12pt;\">&nbsp;{invoice_client}</span><span style=\"font-size: 12pt;\">,</span><br><br>Vi har udarbejdet følgende faktura til dig<span style=\"font-size: 12pt;\">:&nbsp;&nbsp;{invoice_id}</span><br><br>Fakturastatus: {invoice_status}<br><br>Kontakt os for mere information<span style=\"font-size: 12pt;\">.</span><br><br>Med venlig hilsen<span style=\"font-size: 12pt;\">,</span><br>{app_name}', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(83, 6, 'de', 'Invoice Create', '<p><b>sehr geehrter</b><span style=\"font-size: 12pt;\">&nbsp;{invoice_client}</span><br><br>Wir haben die folgende Rechnung für Sie vorbereitet<span style=\"font-size: 12pt;\">: {invoice_id}</span><br><br><b>Rechnungsstatus</b><span style=\"font-size: 12pt;\">: {invoice_status}</span></p><p>Bitte kontaktieren Sie uns für weitere Informationen<span style=\"font-size: 12pt;\">.</span><br><br><b>Mit freundlichen Grüßen</b><span style=\"font-size: 12pt;\">,</span><br>{app_name}</p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(84, 6, 'en', 'Invoice Create', '<p><span style=\"font-size: 12pt;\"><strong>Canım</strong>&nbsp;{fatura_istemcisi}</span><span style=\"font-size: 12pt;\">,</span><p>\n                            <p><span style=\"font-size: 12pt;\">Aşağıdaki faturayı sizin için hazırladık :#{fatura_kimliği}</span></p>\n                            <p><span style=\"font-size: 12pt;\"><strong>Fatura Durumu</strong> : {fatura_durumu}</span></p>\n                            <p>Daha fazla bilgi için lütfen bizimle iletişime geçin.</p>\n                            <p><span style=\"font-size: 12pt;\">&nbsp;</span></p>\n                            <p><strong>Saygılarımla</strong>,<br /><span style=\"font-size: 12pt;\">{uygulama ismi}</span></p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(85, 6, 'es', 'Invoice Create', '<p><b>Querida</b><span style=\"font-size: 12pt;\">&nbsp;{invoice_client}</span><span style=\"font-size: 12pt;\">,</span></p><p>Hemos preparado la siguiente factura para ti<span style=\"font-size: 12pt;\">:&nbsp;&nbsp;{invoice_id}</span></p><p><b>Estado de la factura</b><span style=\"font-size: 12pt;\">: {invoice_status}</span></p><p>Por favor contáctenos para más información<span style=\"font-size: 12pt;\">.</span></p><p><b>Saludos cordiales</b><span style=\"font-size: 12pt;\">,<br></span>{app_name}</p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(86, 6, 'fr', 'Invoice Create', '<p><b>Cher</b><span style=\"font-size: 12pt;\">&nbsp;{invoice_client}</span><span style=\"font-size: 12pt;\">,</span></p><p>Nous avons préparé la facture suivante pour vous<span style=\"font-size: 12pt;\">: {invoice_id}</span></p><p><b>État de la facture</b><span style=\"font-size: 12pt;\">: {invoice_status}</span></p><p>Veuillez nous contacter pour plus d\'informations<span style=\"font-size: 12pt;\">.</span></p><p><b>Sincères amitiés</b><span style=\"font-size: 12pt;\">,<br></span>{app_name}</p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(87, 6, 'it', 'Invoice Create', '<p><b>Caro</b><span style=\"font-size: 12pt;\">&nbsp;{invoice_client}</span><span style=\"font-size: 12pt;\">,</span></p><p>Abbiamo preparato per te la seguente fattura<span style=\"font-size: 12pt;\">:&nbsp;&nbsp;{invoice_id}</span></p><p><b>Stato della fattura</b><span style=\"font-size: 12pt;\">: {invoice_status}</span></p><p>Vi preghiamo di contattarci per ulteriori informazioni<span style=\"font-size: 12pt;\">.</span></p><p><b>Cordiali saluti</b><span style=\"font-size: 12pt;\">,<br></span>{app_name}</p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(88, 6, 'ja', 'Invoice Create', '親愛な<span style=\"font-size: 12pt;\">&nbsp;{invoice_client}</span><span style=\"font-size: 12pt;\">,</span><br><br>以下の請求書をご用意しております。<span style=\"font-size: 12pt;\">: {invoice_client}</span><br><br>請求書のステータス<span style=\"font-size: 12pt;\">: {invoice_status}</span><br><br>詳しくはお問い合わせください<span style=\"font-size: 12pt;\">.</span><br><br>敬具<span style=\"font-size: 12pt;\">,</span><br>{app_name}', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(89, 6, 'nl', 'Invoice Create', '<p><b>Lieve</b><span style=\"font-size: 12pt;\">&nbsp;{invoice_client}</span><span style=\"font-size: 12pt;\">,</span></p><p>We hebben de volgende factuur voor u opgesteld<span style=\"font-size: 12pt;\">: {invoice_id}</span></p><p><b>Factuurstatus</b><span style=\"font-size: 12pt;\">: {invoice_status}</span></p><p>Voor meer informatie kunt u contact met ons opnemen<span style=\"font-size: 12pt;\">.</span></p><p><b>Vriendelijke groeten</b><span style=\"font-size: 12pt;\">,<br></span>{app_name}</p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(90, 6, 'pl', 'Invoice Create', '<p><b>Drogi</b><span style=\"font-size: 12pt;\">&nbsp;{invoice_client}</span><span style=\"font-size: 12pt;\">,</span></p><p>Przygotowaliśmy dla Ciebie następującą fakturę<span style=\"font-size: 12pt;\">: {invoice_id}</span></p><p><b>Status faktury</b><span style=\"font-size: 12pt;\">: {invoice_status}</span></p><p>Skontaktuj się z nami, aby uzyskać więcej informacji<span style=\"font-size: 12pt;\">.</span></p><p><b>Z poważaniem</b><span style=\"font-size: 12pt;\"><b>,</b><br></span>{app_name}</p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(91, 6, 'ru', 'Invoice Create', '<p><b>дорогая</b><span style=\"font-size: 12pt;\">&nbsp;{invoice_client}</span><span style=\"font-size: 12pt;\">,</span></p><p>Мы подготовили для вас следующий счет<span style=\"font-size: 12pt;\">: {invoice_id}</span></p><p><b>Статус счета</b><span style=\"font-size: 12pt;\">: {invoice_status}</span></p><p>Пожалуйста, свяжитесь с нами для получения дополнительной информации<span style=\"font-size: 12pt;\">.</span></p><p><b>С уважением</b><span style=\"font-size: 12pt;\">,<br></span>{app_name}</p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(92, 6, 'pt', 'Invoice Create', '<p><b>Querida</b><span style=\"font-size: 12pt;\">&nbsp;{invoice_client}</span><span style=\"font-size: 12pt;\">,</span></p><p>Preparamos a seguinte fatura para você<span style=\"font-size: 12pt;\">: {invoice_id}</span></p><p><b>Status da fatura</b><span style=\"font-size: 12pt;\">: {invoice_status}</span></p><p>Entre em contato conosco para mais informações.<span style=\"font-size: 12pt;\">.</span></p><p><b>Atenciosamente</b><span style=\"font-size: 12pt;\">,<br></span>{app_name}</p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(93, 6, 'zh', 'Invoice Create', '<p><span style=“font-size： 12pt;”><strong>Dear</strong>&nbsp;{invoice_client}</span><span style=“font-size： 12pt;”>，</span></p>\n                            <p><span style=“font-size： 12pt;”>我们为您准备了以下发票：#{invoice_id}</span></p>\n                            <p><span style=“font-size： 12pt;”><strong>发票状态</strong> ： {invoice_status}</span></p>\n                            <p>请联系我们获取更多信息。</p>\n                            <p><span style=“font-size： 12pt;”>&nbsp;</span></p>\n                            <p><strong>亲切的问候</strong>，<br /><span style=“font-size： 12pt;”>{app_name}</span></p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47');
INSERT INTO `email_template_langs` (`id`, `parent_id`, `lang`, `subject`, `content`, `created_at`, `updated_at`) VALUES
(94, 6, 'he', 'Invoice Create', '<p><span style=\"font-size: 12pt;\"><strong>Dear</strong>&nbsp;{invoice_client}</span><span style=\"font-size: 12pt;\">,</span></p>\n                            <p><span style=\"font-size: 12pt;\">הכנו עבורכם את החשבונית הבאה :#{invoice_id}</span></p>\n                            <p><span style=\"font-size: 12pt;\"><strong>מצב חשבונית</strong> : {invoice_status}</span></p>\n                            <p>אנא צרו איתנו קשר לקבלת מידע נוסף.</p>\n                            <p><span style=\"font-size: 12pt;\">&nbsp;</span></p>\n                            <p><strong>בברכה</strong>,<br /><span style=\"font-size: 12pt;\">{app_name}</span></p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(95, 6, 'pt-br', 'Invoice Create', '<p><span style=\"font-size: 12pt;\"><strong>Caro</strong>&nbsp;{invoice_client}<span style=\"font-size: 12pt;\"></span>,</span></p>\n                            <p><span style=\"font-size: 12pt;\">Preparamos a seguinte fatura para você:#{invoice_id}</span></p>\n                            <p><span style=\"font-size: 12pt;\"><strong>Status da fatura</strong>: {invoice_status}</span></p>\n                            <p>Entre em contato conosco para mais informações.</p>\n                            <p><span style=\"tamanho da fonte: 12pt;\">&nbsp;</span></p>\n                            <p><strong>Atenciosamente</strong>,<br /><span style=\"font-size: 12pt;\">{app_name}</span></p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(96, 7, 'ar', 'Meeting Assign', '<p>عزيزي ، { attasing_assign_user }</p>\n                            <p>&nbsp;</p>\n                            <p>تم تخصيصك لاجتماع جديد :</p>\n                            <p>الاسم : { attabing_name }</p>\n                            <p>تاريخ البدء : { attabing_start_date }</p>\n                            <p>تاريخ الاستحقاق : { batuinging_duse_date }</p>\n                            <p>&nbsp;</p>\n                            <p>Regards نوع ،</p>\n                            <p>{ app_name }</p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(97, 7, 'da', 'Meeting Assign', '<p>K&aelig;re, { meeting_assign_user }</p>\n                            <p>&nbsp;</p>\n                            <p>Du er blevet tildelt til et nyt m&oslash;de:</p>\n                            <p>Navn: { meeting_name }</p>\n                            <p>Startdato: { meeting_start_date }</p>\n                            <p>Forfaldsdato: { meeting_due_date }</p>\n                            <p>&nbsp;</p>\n                            <p>Kind Hilds,</p>\n                            <p>{ app_name }</p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(98, 7, 'de', 'Meeting Assign', '<p>Sehr geehrte Frau, {meeting_assign_user}</p>\n                            <p>&nbsp;</p>\n                            <p>Sie wurden einer neuen Besprechung zugeordnet:</p>\n                            <p>Name: {meeting_name}</p>\n                            <p>Start Date: {meeting_start_date}</p>\n                            <p>F&auml;lligkeitsdatum: {meeting_due_date}</p>\n                            <p>&nbsp;</p>\n                            <p>G&uuml;tige Gr&uuml;&szlig;e,</p>\n                            <p>{Anwendungsname}</p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(99, 7, 'en', 'Meeting Assign', '<p>Dear, {meeting_assign_user}</p>\n                            <p>You have been assigned to a new meeting:</p>\n                            <p><strong>Name</strong>: {meeting_name}<br /><strong>Start Date</strong>: {meeting_start_date}<br /><strong>Due date</strong>: {meeting_due_date}<br /><br /><br />Kind Regards,<br />{app_name}</p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(100, 7, 'es', 'Meeting Assign', '<p>Estimado, {meeting_assign_user}</p>\n                            <p>&nbsp;</p>\n                            <p>Se le ha asignado una nueva reuni&oacute;n:</p>\n                            <p>Nombre: {meeting_name}</p>\n                            <p>Fecha de inicio: {meeting_start_date}</p>\n                            <p>Fecha de vencimiento: {meeting_due_date}</p>\n                            <p>&nbsp;</p>\n                            <p>Bondadoso,</p>\n                            <p>{app_name}</p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(101, 7, 'fr', 'Meeting Assign', '<p>Cher, { meeting_assign_user }</p>\n                            <p>&nbsp;</p>\n                            <p>Vous avez &eacute;t&eacute; affect&eacute; &agrave; une nouvelle r&eacute;union:</p>\n                            <p>Nom: { meeting_name }</p>\n                            <p>Date de d&eacute;but: { meeting_start_date }</p>\n                            <p>Date d &eacute;ch&eacute;ance: { meeting_due_date }</p>\n                            <p>&nbsp;</p>\n                            <p>Kind Regards,</p>\n                            <p>{ nom_app }</p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(102, 7, 'it', 'Meeting Assign', '<p>Caro, {meeting_assign_user}</p>\n                            <p>&nbsp;</p>\n                            <p>Ti &egrave; stato assegnato un nuovo incontro:</p>\n                            <p>Nome: {meeting_name}</p>\n                            <p>Data di inizio: {meeting_start_date}</p>\n                            <p>Data di scadenza: {meeting_due_date}</p>\n                            <p>&nbsp;</p>\n                            <p>Kind Regards,</p>\n                            <p>{app_name}</p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(103, 7, 'ja', 'Meeting Assign', '<p>デッドロック、 {meeting_assign_user}</p>\n                            <p>&nbsp;</p>\n                            <p>新規ミーティングに割り当てられました :</p>\n                            <p>名前: {meeting_name}</p>\n                            <p>開始日: {meeting_start_date}</p>\n                            <p>予定日: {meeting_due_date}</p>\n                            <p>&nbsp;</p>\n                            <p>カンド・リーカード</p>\n                            <p>{app_name}</p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(104, 7, 'nl', 'Meeting Assign', '<p>Dear, { meeting_assign_user }</p>\n                            <p>&nbsp;</p>\n                            <p>U bent toegewezen aan een nieuwe vergadering:</p>\n                            <p>Naam: { meeting_name }</p>\n                            <p>Begindatum: { meeting_start_date }</p>\n                            <p>Vervaldatum: { meeting_due_date }</p>\n                            <p>&nbsp;</p>\n                            <p>Vriendelijke groeten,</p>\n                            <p>{ app_name }</p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(105, 7, 'pl', 'Meeting Assign', '<p>Szanowny, {meeting_assign_user }</p>\n                            <p>&nbsp;</p>\n                            <p>Użytkownik został przypisany do nowego spotkania:</p>\n                            <p>Nazwa: {meeting_name }</p>\n                            <p>Data rozpoczęcia: {meeting_start_date }</p>\n                            <p>Termin realizacji: {meeting_due_date }</p>\n                            <p>&nbsp;</p>\n                            <p>W Odniesieniu Do Rodzaju,</p>\n                            <p>{app_name }</p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(106, 7, 'ru', 'Meeting Assign', '<p>Уважаемый, { meeting_assign_user }</p>\n                            <p>&nbsp;</p>\n                            <p>Вам назначено новое собрание:</p>\n                            <p>Имя: { meeting_name }</p>\n                            <p>Начальная дата: { meeting_start_date }</p>\n                            <p>Дата выполнения: { meeting_due_date }</p>\n                            <p>&nbsp;</p>\n                            <p>Привет.</p>\n                            <p>{ имя_программы }</p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(107, 7, 'pt', 'Meeting Assign', '<p>Querido, {meeting_assign_user}</p>\n                            <p>&nbsp;</p>\n                            <p>Voc&ecirc; foi designado para uma nova reuni&atilde;o:</p>\n                            <p>Nome: {meeting_name}</p>\n                            <p>Data de in&iacute;cio: {meeting_start_date}</p>\n                            <p>Prazo de vencimento: {meeting_due_date}</p>\n                            <p>&nbsp;</p>\n                            <p>Esp&eacute;cie Considera,</p>\n                            <p>{app_name}</p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(108, 7, 'tr', 'Meeting Assign', '<p>Sayın {meeting_assign_user}</p>\n                            <p>Yeni bir toplantıya atandınız:</p>\n                            <p><strong>İsim</strong>: {toplantı_adı}<br /><strong>Başlangıç ​​tarihi</strong>: {toplantı_başlangıç_tarihi}<br /><strong>Bitiş tarihi</strong>: {toplantı_due_date}<br /><br /><br />Saygılarımla,<br />{uygulama ismi}</p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(109, 7, 'zh', 'Meeting Assign', '<p>亲爱的， {meeting_assign_user}</p>\n                            <p>您已分配到新会议：</p>\n                            名称： {meeting_name}<br />开始日期： {meeting_start_date}<br />截止日期： {meeting_due_date}<br /><br /><br /><p><strong></strong>亲切的问候，<br />{app_name}<strong></strong><strong></strong></p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(110, 7, 'he', 'Meeting Assign', '<p>יקירתי, {meeting_assign_user}</p>\n                             <p>שובצת לפגישה חדשה:</p>\n                             שם: {meeting_name}<br />תאריך התחלה: {meeting_start_date}<br />תאריך יעד: {meeting_due_date}<br /><br /><br /><p><strong></strong>Kind Regards,<br />{app_name}<strong></strong><strong></strong></p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(111, 7, 'pt-br', 'Meeting Assign', '<p>Prezados, {meeting_assign_user}</p>\n                            <p>Você foi designado para uma nova reunião:</p>\n                            Nome: {meeting_name}<br />Data de início: {meeting_start_date}<br />Data de vencimento: {meeting_due_date}<br /><br /><br /><p><strong></strong>Atenciosamente,<br />{app_name}<strong></strong><strong></strong></p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(112, 8, 'ar', 'Campaign Assign', '<p>عزيزي { signlign_assign_user }</p>\n                            <p>&nbsp;</p>\n                            <p>لقد تم تعيينك لحملة جديدة</p>\n                            <p>الاسم : { dlralign_title }</p>\n                            <p>تاريخ البدء : { dlignlign_start_date }</p>\n                            <p>تاريخ الاستحقاق : { mievign_due_date }</p>\n                            <p>&nbsp;</p>\n                            <p>Regards نوع ،</p>\n                            <p>{ app_name }</p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(113, 8, 'da', 'Campaign Assign', '<p>K&aelig;re { kampaggn_assign_user }</p>\n                            <p>&nbsp;</p>\n                            <p>Du er tildelt til en ny kampagne:</p>\n                            <p>Navn: { kampaggn_title }</p>\n                            <p>Startdato: { kampaggn_start_date }</p>\n                            <p>Forfaldsdato: { kampaggn_due_date }</p>\n                            <p>&nbsp;</p>\n                            <p>Kind Hilds,</p>\n                            <p>{ app_name }</p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(114, 8, 'de', 'Campaign Assign', '<p>Sehr geehrter {campaign_assign_user}</p>\n                            <p>&nbsp;</p>\n                            <p>Sie wurden einer neuen Kampagne zugeordnet:</p>\n                            <p>Name: {campaign_title}</p>\n                            <p>Anfangsdatum: {campaign_start_date}</p>\n                            <p>F&auml;lligkeitsdatum: {campaign_due_date}</p>\n                            <p>&nbsp;</p>\n                            <p>G&uuml;tige Gr&uuml;&szlig;e,</p>\n                            <p>{Anwendungsname}</p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(115, 8, 'en', 'Campaign Assign', '<p>Dear {campaign_assign_user}</p>\n                            <p>You have been assigned to a new campaign:</p>\n                            <p><strong>Name</strong>: {campaign_title}<br /><strong>Start Date</strong>: {campaign_start_date}<br /><strong>Due date</strong>: {campaign_due_date}<br /><br /><br />Kind Regards,<br />{app_name}</p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(116, 8, 'es', 'Campaign Assign', '<p>Estimado {campaign_assign_user}</p>\n                            <p>&nbsp;</p>\n                            <p>Usted ha sido asignado a una nueva campa&ntilde;a:</p>\n                            <p>Nombre: {campaign_title}</p>\n                            <p>Fecha de inicio: {campaign_start_date}</p>\n                            <p>Fecha de vencimiento: {campaign_due_date}</p>\n                            <p>&nbsp;</p>\n                            <p>Bondadoso,</p>\n                            <p>{app_name}</p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(117, 8, 'fr', 'Campaign Assign', '<p>Cher { milit_assign_utilisateur }</p>\n                            <p>&nbsp;</p>\n                            <p>Vous avez &eacute;t&eacute; affect&eacute; &agrave; une nouvelle campagne:</p>\n                            <p>Nom: { campaign_title }</p>\n                            <p>Date de d&eacute;but: { campaign_start_date }</p>\n                            <p>Date d&eacute;ch&eacute;ance: { milit_due_date }</p>\n                            <p>&nbsp;</p>\n                            <p>Kind Regards,</p>\n                            <p>{ nom_app }</p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(118, 8, 'it', 'Campaign Assign', '<p>Caro {campagne _assign_utente}</p>\n                            <p>&nbsp;</p>\n                            <p>Sei stato assegnato ad una nuova campagna:</p>\n                            <p>Nome: {campagne _title}</p>\n                            <p>Data di inizio: {campagne _start_date}</p>\n                            <p>Data di scadenza: {campagne _due_data}</p>\n                            <p>&nbsp;</p>\n                            <p>Kind Regards,</p>\n                            <p>{app_name}</p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(119, 8, 'ja', 'Campaign Assign', '<p>{campaign_assign_user}</p>\n                            <p>&nbsp;</p>\n                            <p>新規キャンペーンに割り当てられました :</p>\n                            <p>名前: {campaign_title}</p>\n                            <p>開始日: {campaign_start_date}</p>\n                            <p>期限日 : {campaign_due_date}</p>\n                            <p>&nbsp;</p>\n                            <p>カンド・リーカード</p>\n                            <p>{app_name}</p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(120, 8, 'nl', 'Campaign Assign', '<p>Geachte { campingign_assign_user }</p>\n                            <p>&nbsp;</p>\n                            <p>U bent toegewezen aan een nieuwe campagne:</p>\n                            <p>Naam: { campaign_title }</p>\n                            <p>Begindatum: { campaign_start_date }</p>\n                            <p>Vervaldatum: { campaign_due_date }</p>\n                            <p>&nbsp;</p>\n                            <p>Vriendelijke groeten,</p>\n                            <p>{ app_name }</p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(121, 8, 'pl', 'Campaign Assign', '<p>Szanowny użytkowniku {campaign_assign_user }</p>\n                            <p>&nbsp;</p>\n                            <p>Użytkownik został przypisany do nowej kampanii:</p>\n                            <p>Nazwa: {campaign_title }</p>\n                            <p>Data rozpoczęcia: {campaign_start_date }</p>\n                            <p>Termin realizacji: {campaign_due_date }</p>\n                            <p>&nbsp;</p>\n                            <p>W Odniesieniu Do Rodzaju,</p>\n                            <p>{app_name }</p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(122, 8, 'ru', 'Campaign Assign', '<p>Уважаемый { пользователь-ascampaign_user</p>\n                                <p>&nbsp;</p>\n                                <p>Вас назначили для новой кампании:</p>\n                                <p>Имя: { campaign_title }</p>\n                                <p>Начальная дата: { campaign_start_date }</p>\n                                <p>Дата выполнения: { campaign_due_date }</p>\n                                <p>&nbsp;</p>\n                                <p>Привет.</p>\n                                <p>{ имя_программы }</p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(123, 8, 'pt', 'Campaign Assign', '<p>Querido {campaign_assign_user}</p>\n                            <p>&nbsp;</p>\n                            <p>Voc&ecirc; foi designado para uma nova campanha:</p>\n                            <p>Nome: {campaign_title}</p>\n                            <p>Data de in&iacute;cio: {campaign_start_date}</p>\n                            <p>Prazo de vencimento: {campaign_due_date}</p>\n                            <p>&nbsp;</p>\n                            <p>Esp&eacute;cie Considera,</p>\n                            <p>{app_name}</p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(124, 8, 'tr', 'Campaign Assign', '<p>Sayın {campaign_assign_user}</p>\n                            <p>Yeni bir kampanyaya atandınız:</p>\n                            <p><strong>İsim</strong>: {kampanya_başlığı}<br /><strong>Başlangıç ​​tarihi</strong>: {kampanya_başlangıç_tarihi}<br /><strong>Bitiş tarihi</strong>: {kampanya_due_date}<br /><br /><br />Saygılarımla,<br />{uygulama ismi}</p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(125, 8, 'zh', 'Campaign Assign', '<p>亲爱的{campaign_assign_user}</p>\n                            <p>您已分配到新的广告系列：</p>\n                            名称： {campaign_title}<br />开始日期： {campaign_start_date}<br />截止日期： {campaign_due_date}<br /><br /><br /><p><strong></strong>亲切的问候，<br />{app_name}<strong></strong><strong></strong></p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(126, 8, 'he', 'Campaign Assign', '<p>יקר {campaign_assign_user}</p>\n                            <p>שובצת לקמפיין חדש:</p>\n                            שם: {campaign_title}<br />תאריך התחלה: {campaign_start_date}<br />תאריך יעד: {campaign_due_date}<br /><br /><br /><p><strong></strong>Kind Regards,<br />{app_name}<strong></strong><strong></strong></p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(127, 8, 'pt-br', 'Campaign Assign', '<p>Prezado {campaign_assign_user}</p>\n                            <p>Você foi atribuído a uma nova campanha:</p>\n                            Nome: {campaign_title}<br />Data de início: {campaign_start_date}<br />Data de vencimento: {campaign_due_date}<br /><br /><br /><p><strong></strong>Atenciosamente,<br />{app_name}<strong></strong><strong></strong></p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(128, 9, 'ar', 'Contract', '<p>مرحبا { contract_client }</p>\n                    <p>موضوع العقد : { contract_subject }</p>\n                    <p>تاريخ البدء : { contract_start_date }</p>\n                    <p>تاريخ الانتهاء : { contract_end_date } .</p>\n                    <p>أتطلع لسماع منك</p>\n                    <p>&nbsp;</p>\n                    <p>Regards,</p>\n                    <p>{ company_name }</p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(129, 9, 'da', 'Contract', '<p>Hej { contract_client }</p>\n                    <p>Kontraktemne: { contract_subject }</p>\n                    <p>Startdato: { contract_start_date }</p>\n                    <p>Slutdato: { contract_end_date }</p>\n                    <p>Jeg gl&aelig;der mig til at h&oslash;re fra dig.</p>\n                    <p>&nbsp;</p>\n                    <p>Med venlig hilsen</p>\n                    <p>{ company_name }</p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(130, 9, 'de', 'Contract', '<p>Hi {contract_client}</p>\n                    <p>Vertragsgegenstand: {contract_subject}</p>\n                    <p>Startdatum: {contract_start_date}</p>\n                    <p>Enddatum: {contract_end_date}</p>\n                    <p>Freuen Sie sich auf das H&ouml;ren von Ihnen.</p>\n                    <p>&nbsp;</p>\n                    <p>Betrachtet,</p>\n                    <p>{company_name}</p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(131, 9, 'es', 'Contract', '<p>Hi {contract_client}</p>\n                    <p>Asunto del contrato: {contract_subject}</p>\n                    <p>Fecha de inicio: {contract_start_date}</p>\n                    <p>Fecha de finalizaci&oacute;n: {contract_end_date}</p>\n                    <p>Con ganas de escuchar de ti.</p>\n                    <p>&nbsp;</p>\n                    <p>Considerando,</p>\n                    <p>{company_name}</p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(132, 9, 'en', 'Contract', '<p>Hi {contract_client}</p>\n                    <p>Contract Subject: {contract_subject}</p>\n                    <p>Start Date: {contract_start_date}</p>\n                    <p>End Date: {contract_end_date}</p>\n                    <p>Looking forward to hear from you.</p>\n                    <p>&nbsp;</p>\n                    <p>Regards,</p>\n                    <p>{company_name}</p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(133, 9, 'fr', 'Contract', '<p>Bonjour { contract_client }</p>\n                    <p>Objet du contrat: { contract_subject }</p>\n                    <p>Date de d&eacute;but: { contract_start_date }</p>\n                    <p>Date de fin: { contract_end_date }</p>\n                    <p>Vous avez h&acirc;te de vous entendre.</p>\n                    <p>&nbsp;</p>\n                    <p>Regards,</p>\n                    <p>{ company_name }</p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(134, 9, 'it', 'Contract', '<p>Ciao {contract_client}</p>\n                    <p>Oggetto contratto: {contract_subject}</p>\n                    <p>Data inizio: {contract_start_date}</p>\n                    <p>Data di fine: {contract_end_date}</p>\n                    <p>Non vedo lora di sentirti.</p>\n                    <p>&nbsp;</p>\n                    <p>Riguardo,</p>\n                    <p>{company_name}</p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(135, 9, 'ja', 'Contract', '<p>こんにちは {contract_client}</p>\n                    <p>契約件名: {contract_subject}</p>\n                    <p>開始日: {contract_start_date}</p>\n                    <p>終了日: {contract_end_date}</p>\n                    <p>あなたからの便りを楽しみにしています</p>\n                    <p>&nbsp;</p>\n                    <p>よろしく</p>\n                    <p>{ company_name}</p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(136, 9, 'nl', 'Contract', '<p>Hallo { contract_client }</p>\n                    <p>Contractonderwerp: { contract_subject }</p>\n                    <p>Begindatum: { contract_start_date }</p>\n                    <p>Einddatum: { contract_end_date }</p>\n                    <p>Ik kijk ernaar uit om van je te horen.</p>\n                    <p>&nbsp;</p>\n                    <p>Betreft:</p>\n                    <p>{ company_name }</p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(137, 9, 'pl', 'Contract', '<p>Witaj {contract_client }</p>\n                    <p>Temat kontraktu: {contract_subject }</p>\n                    <p>Data rozpoczęcia: {contract_start_date }</p>\n                    <p>Data zakończenia: {contract_end_date }</p>\n                    <p>Nie mogę się doczekać, by usłyszeć od ciebie.</p>\n                    <p>&nbsp;</p>\n                    <p>W odniesieniu do</p>\n                    <p>{company_name }</p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(138, 9, 'pt', 'Contract', '<p>Oi {contract_client}</p>\n                    <p>Assunto do Contrato: {contract_subject}</p>\n                    <p>Data de In&iacute;cio: {contract_start_date}</p>\n                    <p>Data de encerramento: {contract_end_date}</p>\n                    <p>Olhando para a frente para ouvir de voc&ecirc;.</p>\n                    <p>&nbsp;</p>\n                    <p>Considera,</p>\n                    <p>{company_name}</p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(139, 9, 'ru', 'Contract', '<p>Здравствуйте { contract_client }</p>\n                    <p>Тема договора: { contract_subject }</p>\n                    <p>Дата начала: { contract_start_date }</p>\n                    <p>Дата окончания: { contract_end_date }</p>\n                    <p>С нетерпением жду услышать от тебя.</p>\n                    <p>&nbsp;</p>\n                    <p>С уважением,</p>\n                    <p>{ company_name }</p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(140, 9, 'tr', 'Contract', '<p>Merhaba {sözleşme_istemcisi}</p>\n                    <p>Sözleşme Konusu: {contract_subject}</p>\n                    <p>Başlangıç ​​Tarihi: {contract_start_date}</p>\n                    <p>Bitiş Tarihi: {contract_end_date}</p>\n                    <p>senden haber bekliyorum.</p>\n                    <p>&nbsp;</p>\n                    <p>Saygılarımızla,</p>\n                    <p>{Firma Adı}</p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(141, 9, 'zh', 'Contract', '<p>嗨{contract_client}</p>\n                    <p>合同标的： {contract_subject}</p>\n                    <p>开始日期：{contract_start_date}</p>\n                    <p>结束日期：{contract_end_date}</p>\n                    <p>期待您的来信。</p>\n                    <p>&nbsp;</p>\n                    <p>问候</p>\n                    <p>{company_name}</p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(142, 9, 'he', 'Contract', '<p>היי {contract_client}</p>\n                    <p>נושא החוזה: {contract_subject}</p>\n                    <p>תאריך התחלה: {contract_start_date}</p>\n                    <p>תאריך סיום: {contract_end_date}</p>\n                    <p>מצפה לשמוע ממך.</p>\n                    <p>&nbsp;</p>\n                    <p>ברכות</p>\n                    <p>{company_name}</p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(143, 9, 'pt-br', 'Contract', '<p>Oi {contract_client}</p>\n                    <p>Objeto do contrato: {contract_subject}</p>\n                    <p>Data de início: {contract_start_date}</p>\n                    <p>Data de fim: {contract_end_date}</p>\n                    <p>Ansioso para ouvir de você.</p>\n                    <p>&nbsp;</p>\n                    <p>Relação</p>\n                    <p>{company_name}</p>', '2024-04-04 13:40:47', '2024-04-04 13:40:47');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text DEFAULT NULL,
  `queue` text DEFAULT NULL,
  `payload` longtext DEFAULT NULL,
  `exception` longtext DEFAULT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `form_builders`
--

CREATE TABLE `form_builders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `code` varchar(191) NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `is_lead_active` int(11) NOT NULL DEFAULT 0,
  `is_account_active` int(11) NOT NULL DEFAULT 0,
  `is_contact_active` int(11) NOT NULL DEFAULT 0,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `form_builders`
--

INSERT INTO `form_builders` (`id`, `name`, `code`, `is_active`, `is_lead_active`, `is_account_active`, `is_contact_active`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Sales Tracker', '6612c6cddfb821712506573', 1, 1, 0, 0, 3, '2024-04-07 16:16:13', '2024-04-07 16:18:09'),
(2, 'Sales', '6683e004f29011719918596', 1, 0, 0, 0, 3, '2024-07-02 11:09:56', '2024-07-02 11:09:56');

-- --------------------------------------------------------

--
-- Table structure for table `form_fields`
--

CREATE TABLE `form_fields` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `form_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `name` varchar(191) DEFAULT NULL,
  `type` varchar(191) DEFAULT NULL,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `form_fields`
--

INSERT INTO `form_fields` (`id`, `form_id`, `name`, `type`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 1, 'Name', 'text', 3, '2024-04-07 16:16:43', '2024-04-07 16:16:43'),
(2, 1, 'Visit Address', 'text', 3, '2025-09-20 08:55:35', '2025-09-20 08:55:35'),
(3, 2, 'Sales Price', 'text', 3, '2025-10-08 01:24:28', '2025-10-08 01:24:28');

-- --------------------------------------------------------

--
-- Table structure for table `form_field_responses`
--

CREATE TABLE `form_field_responses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `form_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `name_id` int(11) NOT NULL DEFAULT 0,
  `email_id` int(11) NOT NULL DEFAULT 0,
  `phone_id` int(11) NOT NULL DEFAULT 0,
  `address_id` int(11) NOT NULL DEFAULT 0,
  `city_id` int(11) NOT NULL DEFAULT 0,
  `state_id` int(11) NOT NULL DEFAULT 0,
  `country_id` int(11) NOT NULL DEFAULT 0,
  `postal_code` int(11) NOT NULL DEFAULT 0,
  `description_id` int(11) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `type` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `form_field_responses`
--

INSERT INTO `form_field_responses` (`id`, `form_id`, `name_id`, `email_id`, `phone_id`, `address_id`, `city_id`, `state_id`, `country_id`, `postal_code`, `description_id`, `user_id`, `type`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, NULL, '2024-04-07 16:18:09', '2024-04-07 16:18:09');

-- --------------------------------------------------------

--
-- Table structure for table `form_responses`
--

CREATE TABLE `form_responses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `form_id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(191) DEFAULT NULL,
  `response` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `form_responses`
--

INSERT INTO `form_responses` (`id`, `form_id`, `type`, `response`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, '{\"Name\":\"Sachin Dhayalkar\"}', '2024-04-07 16:26:56', '2024-04-07 16:26:56'),
(2, 1, NULL, '{\"Name\":\"Yogesh Salve\"}', '2024-06-18 06:59:12', '2024-06-18 06:59:12');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `quote_id` int(11) NOT NULL DEFAULT 0,
  `invoice_id` int(11) NOT NULL DEFAULT 0,
  `name` varchar(191) DEFAULT NULL,
  `salesorder` int(11) NOT NULL DEFAULT 0,
  `quote` int(11) NOT NULL DEFAULT 0,
  `opportunity` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0,
  `account` int(11) NOT NULL DEFAULT 0,
  `amount` decimal(30,2) NOT NULL DEFAULT 0.00,
  `date_quoted` date NOT NULL,
  `quote_number` int(11) NOT NULL DEFAULT 0,
  `billing_address` text DEFAULT NULL,
  `billing_city` varchar(191) DEFAULT NULL,
  `billing_state` varchar(191) DEFAULT NULL,
  `billing_country` varchar(191) DEFAULT NULL,
  `billing_postalcode` varchar(191) DEFAULT '0',
  `shipping_address` text DEFAULT NULL,
  `shipping_city` varchar(191) DEFAULT NULL,
  `shipping_state` varchar(191) DEFAULT NULL,
  `shipping_country` varchar(191) DEFAULT NULL,
  `shipping_postalcode` varchar(191) DEFAULT '0',
  `billing_contact` int(11) DEFAULT NULL,
  `shipping_contact` int(11) DEFAULT NULL,
  `tax` varchar(191) DEFAULT NULL,
  `shipping_provider` varchar(191) DEFAULT NULL,
  `description` varchar(191) DEFAULT NULL,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `user_id`, `quote_id`, `invoice_id`, `name`, `salesorder`, `quote`, `opportunity`, `status`, `account`, `amount`, `date_quoted`, `quote_number`, `billing_address`, `billing_city`, `billing_state`, `billing_country`, `billing_postalcode`, `shipping_address`, `shipping_city`, `shipping_state`, `shipping_country`, `shipping_postalcode`, `billing_contact`, `shipping_contact`, `tax`, `shipping_provider`, `description`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 0, 0, 1, 'Rahul', 1, 1, 1, 0, 1, 0.00, '2025-10-08', 3, 'Pune', 'Pune', 'Pune', 'Pune', 'Pune', 'Pune', 'Pune', 'Pune', 'Pune', '32', 0, 0, NULL, '1', NULL, 3, '2025-10-08 05:59:47', '2025-10-08 05:59:47'),
(2, 0, 0, 2, 'Rahul', 1, 1, 1, 0, 1, 0.00, '2025-10-08', 3, 'Pune', 'Pune', 'Pune', 'Pune', 'Pune', 'Pune', 'Pune', 'Pune', 'Pune', '32', 0, 0, NULL, '1', NULL, 3, '2025-10-08 06:02:17', '2025-10-08 06:02:17'),
(3, 0, 0, 3, 'Test Quote', 2, 4, 0, 0, 0, 0.00, '2025-10-11', 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, '1', NULL, 3, '2025-10-11 01:12:44', '2025-10-11 01:12:44');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_items`
--

CREATE TABLE `invoice_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_id` int(11) NOT NULL DEFAULT 0,
  `item` varchar(191) DEFAULT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `price` decimal(30,2) NOT NULL DEFAULT 0.00,
  `discount` double(8,2) NOT NULL DEFAULT 0.00,
  `tax` varchar(191) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoice_payments`
--

CREATE TABLE `invoice_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transaction_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `client_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `invoice_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `amount` decimal(30,2) NOT NULL DEFAULT 0.00,
  `date` date NOT NULL,
  `payment_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `payment_type` varchar(100) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `receipt` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `join_us`
--

CREATE TABLE `join_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `landing_page_sections`
--

CREATE TABLE `landing_page_sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `section_name` varchar(191) DEFAULT NULL,
  `section_order` int(11) NOT NULL DEFAULT 0,
  `content` text DEFAULT NULL,
  `section_type` enum('section-1','section-2','section-3','section-4','section-5','section-6','section-7','section-8','section-9','section-10','section-plan') NOT NULL,
  `default_content` text DEFAULT NULL,
  `section_demo_image` text DEFAULT NULL,
  `section_blade_file_name` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `landing_page_settings`
--

CREATE TABLE `landing_page_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `value` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `landing_page_settings`
--

INSERT INTO `landing_page_settings` (`id`, `name`, `value`, `created_at`, `updated_at`) VALUES
(1, 'topbar_status', 'off', '2024-04-04 13:40:47', '2024-04-04 13:45:43'),
(2, 'topbar_notification_msg', '70% Special Offer. Don’t Miss it. The offer ends in 72 hours.', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(3, 'menubar_status', 'on', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(4, 'menubar_page', '[{\"menubar_page_name\": \"About Us\",\"template_name\": \"page_content\",\"page_url\": \"\",\"menubar_page_contant\": \"Welcome to the Salesy website. By accessing this website, you agree to comply with and be bound by the following terms and conditions of use. If you disagree with any part of these terms, please do not use our website. The content of the pages of this website is for your general information and use only. It is subject to change without notice. This website uses cookies to monitor browsing preferences. If you do allow cookies to be used, personal information may be stored by us for use by third parties. Neither we nor any third parties provide any warranty or guarantee as to the accuracy, timeliness, performance, completeness, or suitability of the information and materials found or offered on this website for any particular purpose. You acknowledge that such information and materials may contain inaccuracies or errors, and we expressly exclude liability for any such inaccuracies or errors to the fullest extent permitted by law. Your use of any information or materials on this website is entirely at your own risk, for which we shall not be liable. It shall be your own responsibility to ensure that any products, services, or information available through this website meet your specific requirements. This website contains material that is owned by or licensed to us. This material includes, but is not limited to, the design, layout, look, appearance, and graphics. Reproduction is prohibited other than in accordance with the copyright notice, which forms part of these terms and conditions. Unauthorized use of this website may give rise to a claim for damages and\\/or be a criminal offense. From time to time, this website may also include links to other websites. These links are provided for your convenience to provide further information. They do not signify that we endorse the website(s). We have no responsibility for the content of the linked website(s\",\"page_slug\": \"about_us\",\"header\": \"on\",\"footer\": \"on\",\"login\": \"on\"},{\"menubar_page_name\": \"Terms and Conditions\",\"template_name\": \"page_content\",\"page_url\": \"\",\"menubar_page_contant\": \"Welcome to the Salesy website. By accessing this website, you agree to comply with and be bound by the following terms and conditions of use. If you disagree with any part of these terms, please do not use our website.\\r\\n\\r\\nThe content of the pages of this website is for your general information and use only. It is subject to change without notice.\\r\\n\\r\\nThis website uses cookies to monitor browsing preferences. If you do allow cookies to be used, personal information may be stored by us for use by third parties.\\r\\n\\r\\nNeither we nor any third parties provide any warranty or guarantee as to the accuracy, timeliness, performance, completeness, or suitability of the information and materials found or offered on this website for any particular purpose. You acknowledge that such information and materials may contain inaccuracies or errors, and we expressly exclude liability for any such inaccuracies or errors to the fullest extent permitted by law.\\r\\n\\r\\nYour use of any information or materials on this website is entirely at your own risk, for which we shall not be liable. It shall be your own responsibility to ensure that any products, services, or information available through this website meet your specific requirements.\\r\\n\\r\\nThis website contains material that is owned by or licensed to us. This material includes, but is not limited to, the design, layout, look, appearance, and graphics. Reproduction is prohibited other than in accordance with the copyright notice, which forms part of these terms and conditions.\\r\\n\\r\\nUnauthorized use of this website may give rise to a claim for damages and\\/or be a criminal offense.\\r\\n\\r\\nFrom time to time, this website may also include links to other websites. These links are provided for your convenience to provide further information. They do not signify that we endorse the website(s). We have no responsibility for the content of the linked website(s).\",\"page_slug\": \"terms_and_conditions\",\"header\": \"off\",\"footer\": \"on\",\"login\": \"on\"},{\"menubar_page_name\": \"Privacy Policy\",\"template_name\": \"page_content\",\"page_url\": \"\",\"menubar_page_contant\": \"Introduction: An overview of the privacy policy, including the purpose and scope of the policy. Information Collection: Details about the types of information collected from users\\/customers, such as personal information (name, address, email), device information, usage data, and any other relevant data. Data Usage: An explanation of how the collected data will be used, including providing services, improving products, personalization, analytics, and any other legitimate business purposes. Data Sharing: Information about whether and how the company shares user data with third parties, such as partners, service providers, or affiliates, along with the purposes of such sharing. Data Security: Details about the measures taken to protect user data from unauthorized access, loss, or misuse, including encryption, secure protocols, access controls, and data breach notification procedures. User Choices: Information on the choices available to users regarding the collection, use, and sharing of their personal data, including opt-out mechanisms and account settings. Cookies and Tracking Technologies: Explanation of the use of cookies, web beacons, and similar technologies for tracking user activity and collecting information for analytics and advertising purposes. Third-Party Links: Clarification that the companys website or services may contain links to third-party websites or services and that the privacy policy does not extend to those external sites. Data Retention: Details about the retention period for user data and how long it will be stored by the company. Legal Basis and Compliance: Information about the legal basis for processing personal data, compliance with applicable data protection laws, and the rights of users under relevant privacy regulations (e.g., GDPR, CCPA). Updates to the Privacy Policy: Notification that the privacy policy may be updated from time to time, and how users will be informed of any material changes. Contact Information: How users can contact the company regarding privacy-related concerns or inquiries.\",\"page_slug\": \"privacy_policy\",\"header\": \"off\",\"footer\": \"on\",\"login\": \"on\"}]', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(5, 'site_logo', 'site_logo.png', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(6, 'site_description', 'We build modern web tools to help you jump-start your daily business work.', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(7, 'home_status', 'on', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(8, 'home_offer_text', '70% Special Offer', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(9, 'home_title', 'Home', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(10, 'home_heading', 'Salesy SaaS Business Sales CRM', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(11, 'home_description', 'Use these awesome forms to login or create new account in your project for free.', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(12, 'home_trusted_by', '1000+ Customer', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(13, 'home_live_demo_link', 'https://demo.rajodiya.com/salesy-saas/login', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(14, 'home_buy_now_link', 'https://codecanyon.net/item/salesy-saas-business-sales-crm/30241292', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(15, 'home_banner', 'home_banner.png', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(16, 'home_logo', 'home_logo.png,home_logo.png,home_logo.png,home_logo.png,home_logo.png,home_logo.png,home_logo.png', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(17, 'feature_status', 'on', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(18, 'feature_title', 'Features', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(19, 'feature_heading', 'All In One Place CRM System', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(20, 'feature_description', 'Use these awesome forms to login or create new account in your project for free. Use these awesome forms to login or create new account in your project for free.', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(21, 'feature_buy_now_link', 'https://codecanyon.net/item/salesy-saas-business-sales-crm/30241292', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(22, 'feature_of_features', '[{\"feature_logo\":\"1688098315-feature_logo.png\",\"feature_heading\":\"Feature\",\"feature_description\":\"<p>Use these awesome forms to login or create new account in your project for free.Use these awesome forms to login or create new account in your project for free.<\\/p>\"},{\"feature_logo\":\"1688098341-feature_logo.png\",\"feature_heading\":\"Support\",\"feature_description\":\"<p>Use these awesome forms to login or create new account in your project for free.Use these awesome forms to login or create new account in your project for free.<\\/p>\"},{\"feature_logo\":\"1688098361-feature_logo.png\",\"feature_heading\":\"Integration\",\"feature_description\":\"<p>Use these awesome forms to login or create new account in your project for free.Use these awesome forms to login or create new account in your project for free.<\\/p>\"}]', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(23, 'highlight_feature_heading', 'Salesy SaaS Business Sales CRM', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(24, 'highlight_feature_description', 'Use these awesome forms to login or create new account in your project for free.', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(25, 'highlight_feature_image', 'highlight_feature_image.png', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(26, 'other_features', '[{\"other_features_image\":\"1688099489-other_features_image.png\",\"other_features_heading\":\"Salesy SaaS Business Sales CRM\",\"other_featured_description\":\"<p>Use these awesome forms to login or create new account in your project for free.<\\/p>\",\"other_feature_buy_now_link\":\"https://codecanyon.net/item/salesy-saas-business-sales-crm/30241292\"},{\"other_features_image\":\"1688099498-other_features_image.png\",\"other_features_heading\":\"Salesy SaaS Business Sales CRM\",\"other_featured_description\":\"<p>Use these awesome forms to login or create new account in your project for free.<\\/p>\",\"other_feature_buy_now_link\":\"https://codecanyon.net/item/salesy-saas-business-sales-crm/30241292\"},{\"other_features_image\":\"1688099511-other_features_image.png\",\"other_features_heading\":\"Salesy SaaS Business Sales CRM\",\"other_featured_description\":\"<p>Use these awesome forms to login or create new account in your project for free.<\\/p>\",\"other_feature_buy_now_link\":\"https://codecanyon.net/item/salesy-saas-business-sales-crm/30241292\"},{\"other_features_image\":\"1688099560-other_features_image.png\",\"other_features_heading\":\"Salesy SaaS Business Sales CRM\",\"other_featured_description\":\"<p>Use these awesome forms to login or create new account in your project for free.<\\/p>\",\"other_feature_buy_now_link\":\"https://codecanyon.net/item/salesy-saas-business-sales-crm/30241292\"}]', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(27, 'discover_status', 'on', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(28, 'discover_heading', 'Salesy SaaS Business Sales CRM', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(29, 'discover_description', 'Use these awesome forms to login or create new account in your project for free.', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(30, 'discover_live_demo_link', 'https://demo.rajodiya.com/salesy-saas/login', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(31, 'discover_buy_now_link', 'https://codecanyon.net/item/salesy-saas-business-sales-crm/30241292', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(32, 'discover_of_features', '[{\"discover_logo\":\"1688098424-discover_logo.png\",\"discover_heading\":\"Feature\",\"discover_description\":\"<p>Use these awesome forms to login or create new account in your project for free.Use these awesome forms to login or create new account in your project for free.<\\/p>\"},{\"discover_logo\":\"1688098461-discover_logo.png\",\"discover_heading\":\"Feature\",\"discover_description\":\"<p>Use these awesome forms to login or create new account in your project for free.Use these awesome forms to login or create new account in your project for free.<\\/p>\"},{\"discover_logo\":\"1688098477-discover_logo.png\",\"discover_heading\":\"Feature\",\"discover_description\":\"<p>Use these awesome forms to login or create new account in your project for free.Use these awesome forms to login or create new account in your project for free.<\\/p>\"},{\"discover_logo\":\"1688098488-discover_logo.png\",\"discover_heading\":\"Feature\",\"discover_description\":\"<p>Use these awesome forms to login or create new account in your project for free.Use these awesome forms to login or create new account in your project for free.<\\/p>\"},{\"discover_logo\":\"1688098497-discover_logo.png\",\"discover_heading\":\"Feature\",\"discover_description\":\"<p>Use these awesome forms to login or create new account in your project for free.Use these awesome forms to login or create new account in your project for free.<\\/p>\"},{\"discover_logo\":\"1688098507-discover_logo.png\",\"discover_heading\":\"Feature\",\"discover_description\":\"<p>Use these awesome forms to login or create new account in your project for free.Use these awesome forms to login or create new account in your project for free.<\\/p>\"},{\"discover_logo\":\"1688098516-discover_logo.png\",\"discover_heading\":\"Feature\",\"discover_description\":\"<p>Use these awesome forms to login or create new account in your project for free.Use these awesome forms to login or create new account in your project for free.<\\/p>\"},{\"discover_logo\":\"1688098526-discover_logo.png\",\"discover_heading\":\"Feature\",\"discover_description\":\"<p>Use these awesome forms to login or create new account in your project for free.Use these awesome forms to login or create new account in your project for free.<\\/p>\"}]', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(33, 'screenshots_status', 'on', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(34, 'screenshots_heading', 'Salesy SaaS Business Sales CRM', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(35, 'screenshots_description', 'Use these awesome forms to login or create new account in your project for free.', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(36, 'screenshots', '[{\"screenshots\":\"1688098566-screenshots.png\",\"screenshots_heading\":\"Salesy Dashboard\"},{\"screenshots\":\"1688099065-screenshots.png\",\"screenshots_heading\":\"Grid View Page\"},{\"screenshots\":\"1688098863-screenshots.png\",\"screenshots_heading\":\"Profile Overview\"},{\"screenshots\":\"1688098948-screenshots.png\",\"screenshots_heading\":\"Dashboard\"},{\"screenshots\":\"1688098996-screenshots.png\",\"screenshots_heading\":\"Kanban Page\"},{\"screenshots\":\"1688099209-screenshots.png\",\"screenshots_heading\":\"Product Overview\"}]', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(37, 'plan_status', 'on', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(38, 'plan_title', 'Plan', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(39, 'plan_heading', 'Salesy SaaS Business Sales CRM', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(40, 'plan_description', 'Use these awesome forms to login or create new account in your project for free.', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(41, 'faq_status', 'on', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(42, 'faq_title', 'Faq', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(43, 'faq_heading', 'Salesy SaaS Business Sales CRM', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(44, 'faq_description', 'Use these awesome forms to login or create new account in your project for free.', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(45, 'faqs', '[{\"faq_questions\":\"#What does \\\"Theme\\/Package Installation\\\" mean?\",\"faq_answer\":\"For an easy-to-install theme\\/package, we have included step-by-step detailed documentation (in English). However, if it is not done perfectly, please feel free to contact the support team at support@workdo.io\"},{\"faq_questions\":\"#What does \\\"Theme\\/Package Installation\\\" mean?\",\"faq_answer\":\"For an easy-to-install theme\\/package, we have included step-by-step detailed documentation (in English). However, if it is not done perfectly, please feel free to contact the support team at support@workdo.io\"},{\"faq_questions\":\"#What does \\\"Lifetime updates\\\" mean?\",\"faq_answer\":\"For an easy-to-install theme\\/package, we have included step-by-step detailed documentation (in English). However, if it is not done perfectly, please feel free to contact the support team at support@workdo.io\"},{\"faq_questions\":\"#What does \\\"Lifetime updates\\\" mean?\",\"faq_answer\":\"For an easy-to-install theme\\/package, we have included step-by-step detailed documentation (in English). However, if it is not done perfectly, please feel free to contact the support team at support@workdo.io\"},{\"faq_questions\":\"# What does \\\"6 months of support\\\" mean?\",\"faq_answer\":\"Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa\\r\\n                                    nesciunt\\r\\n                                    laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt\\r\\n                                    sapiente ea\\r\\n                                    proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven heard of them accusamus labore sustainable VHS.\"},{\"faq_questions\":\"# What does \\\"6 months of support\\\" mean?\",\"faq_answer\":\"Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa\\r\\n                                    nesciunt\\r\\n                                    laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt\\r\\n                                    sapiente ea\\r\\n                                    proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven heard of them accusamus labore sustainable VHS.\"}]', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(46, 'testimonials_status', 'on', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(47, 'testimonials_heading', 'From our Clients', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(48, 'testimonials_description', 'Use these awesome forms to login or create new account in your project for free.', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(49, 'testimonials_long_description', 'WorkDo seCommerce package offers you a “sales-ready.”secure online store. The package puts all the key pieces together, from design to payment processing. This gives you a headstart in your eCommerce venture. Every store is built using a reliable PHP framework -laravel. Thisspeeds up the development process while increasing the store’s security and performance.Additionally, thanks to the accompanying mobile app, you and your team can manage the store on the go. What’s more, because the app works both for you and your customers, you can use it to reach a wider audience.And, unlike popular eCommerce platforms, it doesn’t bind you to any terms and conditions or recurring fees. You get to choose where you host it or which payment gateway you use. Lastly, you getcomplete control over the looks of the store. And if it lacks any functionalities that you need, just reach out, and let’s discuss customization possibilities', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(50, 'testimonials', '[{\"testimonials_user_avtar\":\"1688099358-testimonials_user_avtar.jpg\",\"testimonials_title\":\"Tbistone\",\"testimonials_description\":\"Very quick customer support, installing this application on my machine locally, within 5 minutes of creating a ticket, the developer was able to fix the issue I had within 10 minutes. EXCELLENT! Thank you very much\",\"testimonials_user\":\"Chordsnstrings\",\"testimonials_designation\":\"from codecanyon\",\"testimonials_star\":\"4\"},{\"testimonials_user_avtar\":\"1688099364-testimonials_user_avtar.jpg\",\"testimonials_title\":\"Tbistone\",\"testimonials_description\":\"Very quick customer support, installing this application on my machine locally, within 5 minutes of creating a ticket, the developer was able to fix the issue I had within 10 minutes. EXCELLENT! Thank you very much\",\"testimonials_user\":\"Chordsnstrings\",\"testimonials_designation\":\"from codecanyon\",\"testimonials_star\":\"4\"},{\"testimonials_user_avtar\":\"1688099371-testimonials_user_avtar.jpg\",\"testimonials_title\":\"Tbistone\",\"testimonials_description\":\"Very quick customer support, installing this application on my machine locally, within 5 minutes of creating a ticket, the developer was able to fix the issue I had within 10 minutes. EXCELLENT! Thank you very much\",\"testimonials_user\":\"Chordsnstrings\",\"testimonials_designation\":\"from codecanyon\",\"testimonials_star\":\"4\"}]', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(51, 'footer_status', 'on', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(52, 'joinus_status', 'on', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(53, 'joinus_heading', 'Join Our Community', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(54, 'joinus_description', 'We build modern web tools to help you jump-start your daily business work.', '2024-04-04 13:40:47', '2024-04-04 13:40:47');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(191) NOT NULL,
  `fullName` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `code`, `fullName`, `created_at`, `updated_at`) VALUES
(1, 'ar', 'Arabic', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(2, 'zh', 'Chinese', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(3, 'da', 'Danish', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(4, 'de', 'German', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(5, 'en', 'English', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(6, 'es', 'Spanish', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(7, 'fr', 'French', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(8, 'he', 'Hebrew', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(9, 'it', 'Italian', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(10, 'ja', 'Japanese', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(11, 'nl', 'Dutch', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(12, 'pl', 'Polish', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(13, 'pt', 'Portuguese', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(14, 'ru', 'Russian', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(15, 'tr', 'Turkish', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(16, 'pt-br', 'Portuguese(Brazil)', '2024-04-04 13:40:47', '2024-04-04 13:40:47');

-- --------------------------------------------------------

--
-- Table structure for table `leads`
--

CREATE TABLE `leads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date DEFAULT NULL,
  `cust_name` varchar(191) DEFAULT NULL,
  `contact` varchar(191) DEFAULT NULL,
  `email` varchar(191) DEFAULT NULL,
  `lead_type_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `disposition` varchar(191) DEFAULT '0',
  `note` text DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leads`
--

INSERT INTO `leads` (`id`, `date`, `cust_name`, `contact`, `email`, `lead_type_id`, `product_id`, `disposition`, `note`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '2025-10-20', 'Puja', '9552212556', NULL, 1, 1, '1', 'erwerwer', 10, NULL, '2025-10-20 07:36:35');

-- --------------------------------------------------------

--
-- Table structure for table `lead_sources`
--

CREATE TABLE `lead_sources` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lead_sources`
--

INSERT INTO `lead_sources` (`id`, `name`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Cold Calling', 3, '2024-04-07 15:46:46', '2024-04-07 15:46:46'),
(2, 'Referral', 3, '2024-04-07 15:47:07', '2024-04-07 15:47:07'),
(3, 'contact', 3, '2025-09-11 21:35:59', '2025-09-11 21:35:59'),
(4, 'Ebay', 3, '2025-09-11 21:36:14', '2025-10-20 16:38:43'),
(5, 'Yard', 3, '2025-09-11 21:36:32', '2025-10-20 16:38:31');

-- --------------------------------------------------------

--
-- Table structure for table `lead_statuses`
--

CREATE TABLE `lead_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `lead_id` bigint(20) UNSIGNED NOT NULL,
  `lead_status` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lead_statuses`
--

INSERT INTO `lead_statuses` (`id`, `created_by`, `lead_id`, `lead_status`, `created_at`, `updated_at`) VALUES
(1, NULL, 1, '3', '2025-10-20 07:35:42', '2025-10-20 07:35:42'),
(2, NULL, 1, '4', '2025-10-20 07:36:18', '2025-10-20 07:36:18'),
(3, NULL, 1, '1', '2025-10-20 07:39:39', '2025-10-20 07:39:39');

-- --------------------------------------------------------

--
-- Table structure for table `lead_type`
--

CREATE TABLE `lead_type` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lead_type`
--

INSERT INTO `lead_type` (`id`, `name`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Inbound Call', 0, '2025-10-16 05:06:46', '2025-10-16 05:06:46'),
(2, 'Form Lead', 0, '2025-10-16 05:06:46', '2025-10-16 05:06:46'),
(3, 'Email Lead', 0, '2025-10-16 05:06:46', '2025-10-16 05:06:46'),
(4, 'Form Call', 0, '2025-10-16 05:06:46', '2025-10-16 05:06:46');

-- --------------------------------------------------------

--
-- Table structure for table `login_details`
--

CREATE TABLE `login_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `ip` varchar(191) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `details` longtext DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `login_details`
--

INSERT INTO `login_details` (`id`, `user_id`, `ip`, `date`, `details`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 6, '103.147.176.215', '2024-04-04 19:48:46', '{\"status\":\"success\",\"country\":\"India\",\"countryCode\":\"IN\",\"region\":\"MH\",\"regionName\":\"Maharashtra\",\"city\":\"Badlapur\",\"zip\":\"421503\",\"lat\":19.1573,\"lon\":73.2631,\"timezone\":\"Asia\\/Kolkata\",\"isp\":\"Abis Badlapur Network Private Limited\",\"org\":\"Abis Badlapur Network Private Limited\",\"as\":\"AS139557 Abis Badlapur Network Private Limited\",\"query\":\"103.147.176.215\",\"browser_name\":\"Chrome\",\"os_name\":\"Windows\",\"browser_language\":\"en\",\"device_type\":\"desktop\",\"referrer_host\":true,\"referrer_path\":true}', 3, '2024-04-04 19:48:46', '2024-04-04 19:48:46'),
(2, 6, '103.147.176.215', '2024-04-05 13:15:47', '{\"status\":\"success\",\"country\":\"India\",\"countryCode\":\"IN\",\"region\":\"MH\",\"regionName\":\"Maharashtra\",\"city\":\"Badlapur\",\"zip\":\"421503\",\"lat\":19.1573,\"lon\":73.2631,\"timezone\":\"Asia\\/Kolkata\",\"isp\":\"Abis Badlapur Network Private Limited\",\"org\":\"Abis Badlapur Network Private Limited\",\"as\":\"AS139557 Abis Badlapur Network Private Limited\",\"query\":\"103.147.176.215\",\"browser_name\":\"Chrome\",\"os_name\":\"Windows\",\"browser_language\":\"en\",\"device_type\":\"desktop\",\"referrer_host\":true,\"referrer_path\":true}', 3, '2024-04-05 13:15:47', '2024-04-05 13:15:47'),
(3, 6, '103.147.176.215', '2024-04-06 11:05:55', '{\"status\":\"success\",\"country\":\"India\",\"countryCode\":\"IN\",\"region\":\"MH\",\"regionName\":\"Maharashtra\",\"city\":\"Badlapur\",\"zip\":\"421503\",\"lat\":19.1573,\"lon\":73.2631,\"timezone\":\"Asia\\/Kolkata\",\"isp\":\"Abis Badlapur Network Private Limited\",\"org\":\"Abis Badlapur Network Private Limited\",\"as\":\"AS139557 Abis Badlapur Network Private Limited\",\"query\":\"103.147.176.215\",\"browser_name\":\"Chrome\",\"os_name\":\"Windows\",\"browser_language\":\"en\",\"device_type\":\"desktop\",\"referrer_host\":true,\"referrer_path\":true}', 3, '2024-04-06 11:05:55', '2024-04-06 11:05:55'),
(4, 7, '103.49.255.187', '2025-08-17 13:02:02', '{\"status\":\"success\",\"country\":\"India\",\"countryCode\":\"IN\",\"region\":\"MH\",\"regionName\":\"Maharashtra\",\"city\":\"Kaly\\u0101n\",\"zip\":\"421301\",\"lat\":19.2463,\"lon\":73.1315,\"timezone\":\"Asia\\/Kolkata\",\"isp\":\"Nextra\",\"org\":\"\",\"as\":\"AS132784 Ski Network Services Private Limited\",\"query\":\"103.49.255.187\",\"browser_name\":\"Firefox\",\"os_name\":\"Windows\",\"browser_language\":\"en\",\"device_type\":\"desktop\",\"referrer_host\":true,\"referrer_path\":true}', 3, '2025-08-17 13:02:02', '2025-08-17 13:02:02'),
(5, 7, '171.50.223.56', '2025-08-17 22:35:20', '{\"status\":\"success\",\"country\":\"India\",\"countryCode\":\"IN\",\"region\":\"MH\",\"regionName\":\"Maharashtra\",\"city\":\"Pune\",\"zip\":\"411019\",\"lat\":18.5211,\"lon\":73.8502,\"timezone\":\"Asia\\/Kolkata\",\"isp\":\"Bharti Airtel Limited\",\"org\":\"Bharti Airtel Ltd.\",\"as\":\"AS24560 Bharti Airtel Ltd., Telemedia Services\",\"query\":\"171.50.223.56\",\"browser_name\":\"Chrome\",\"os_name\":\"Windows\",\"browser_language\":\"en\",\"device_type\":\"desktop\",\"referrer_host\":true,\"referrer_path\":true}', 3, '2025-08-17 22:35:20', '2025-08-17 22:35:20'),
(6, 7, '59.95.99.187', '2025-08-18 12:35:56', '{\"status\":\"success\",\"country\":\"India\",\"countryCode\":\"IN\",\"region\":\"MH\",\"regionName\":\"Maharashtra\",\"city\":\"Mumbai\",\"zip\":\"400017\",\"lat\":19.0748,\"lon\":72.8856,\"timezone\":\"Asia\\/Kolkata\",\"isp\":\"BSNL Internet\",\"org\":\"NIB\",\"as\":\"AS9829 National Internet Backbone\",\"query\":\"59.95.99.187\",\"browser_name\":\"Edge\",\"os_name\":\"Windows\",\"browser_language\":\"en\",\"device_type\":\"desktop\",\"referrer_host\":true,\"referrer_path\":true}', 3, '2025-08-18 12:35:56', '2025-08-18 12:35:56'),
(7, 8, '103.26.57.98', '2025-08-23 14:11:53', '{\"status\":\"success\",\"country\":\"India\",\"countryCode\":\"IN\",\"region\":\"MH\",\"regionName\":\"Maharashtra\",\"city\":\"Mumbai\",\"zip\":\"400022\",\"lat\":19.0748,\"lon\":72.8856,\"timezone\":\"Asia\\/Kolkata\",\"isp\":\"Intech Telecom\",\"org\":\"\",\"as\":\"AS58678 Intech Online Private Limited\",\"query\":\"103.26.57.98\",\"browser_name\":\"Firefox\",\"os_name\":\"Windows\",\"browser_language\":\"en\",\"device_type\":\"desktop\",\"referrer_host\":true,\"referrer_path\":true}', 3, '2025-08-23 14:11:53', '2025-08-23 14:11:53'),
(8, 8, '2405:201:3022:6057:5910:900f:3c40:98d', '2025-08-23 18:07:39', '{\"status\":\"success\",\"country\":\"India\",\"countryCode\":\"IN\",\"region\":\"MP\",\"regionName\":\"Madhya Pradesh\",\"city\":\"Indore\",\"zip\":\"452001\",\"lat\":22.717,\"lon\":75.8337,\"timezone\":\"Asia\\/Kolkata\",\"isp\":\"Reliance Jio Infocomm Limited\",\"org\":\"Reliance Jio Infocomm Limited\",\"as\":\"AS55836 Reliance Jio Infocomm Limited\",\"query\":\"2405:201:3022:6057:5910:900f:3c40:98d\",\"browser_name\":\"Chrome\",\"os_name\":\"Windows\",\"browser_language\":\"en\",\"device_type\":\"desktop\",\"referrer_host\":true,\"referrer_path\":true}', 3, '2025-08-23 18:07:39', '2025-08-23 18:07:39'),
(9, 9, '115.98.233.160', '2025-09-23 00:43:19', '{\"status\":\"success\",\"country\":\"India\",\"countryCode\":\"IN\",\"region\":\"MH\",\"regionName\":\"Maharashtra\",\"city\":\"Mumbai\",\"zip\":\"400034\",\"lat\":19.0748,\"lon\":72.8856,\"timezone\":\"Asia\\/Kolkata\",\"isp\":\"Hathway IP over Cable Internet Access\",\"org\":\"Hathway Cable and Datacom Limited\",\"as\":\"AS17488 Hathway IP Over Cable Internet\",\"query\":\"115.98.233.160\",\"browser_name\":\"Chrome\",\"os_name\":\"Windows\",\"browser_language\":\"en\",\"device_type\":\"desktop\",\"referrer_host\":true,\"referrer_path\":true}', 3, '2025-09-23 00:43:19', '2025-09-23 00:43:19'),
(10, 10, '::1', '2025-10-14 11:16:42', '{\"status\":\"fail\",\"message\":\"reserved range\",\"query\":\"::1\",\"browser_name\":\"Chrome\",\"os_name\":\"Windows\",\"browser_language\":\"en\",\"device_type\":\"desktop\",\"referrer_host\":true,\"referrer_path\":true}', 3, '2025-10-14 05:46:42', '2025-10-14 05:46:42'),
(11, 10, '::1', '2025-10-14 11:16:42', '{\"status\":\"fail\",\"message\":\"reserved range\",\"query\":\"::1\",\"browser_name\":\"Chrome\",\"os_name\":\"Windows\",\"browser_language\":\"en\",\"device_type\":\"desktop\",\"referrer_host\":true,\"referrer_path\":true}', 3, '2025-10-14 05:46:42', '2025-10-14 05:46:42'),
(12, 10, '::1', '2025-10-15 06:28:58', '{\"status\":\"fail\",\"message\":\"reserved range\",\"query\":\"::1\",\"browser_name\":\"Chrome\",\"os_name\":\"Windows\",\"browser_language\":\"en\",\"device_type\":\"desktop\",\"referrer_host\":true,\"referrer_path\":true}', 3, '2025-10-15 00:58:58', '2025-10-15 00:58:58'),
(13, 10, '::1', '2025-10-15 10:46:57', '{\"status\":\"fail\",\"message\":\"reserved range\",\"query\":\"::1\",\"browser_name\":\"Chrome\",\"os_name\":\"Windows\",\"browser_language\":\"en\",\"device_type\":\"desktop\",\"referrer_host\":true,\"referrer_path\":true}', 3, '2025-10-15 05:16:57', '2025-10-15 05:16:57'),
(14, 10, '::1', '2025-10-16 13:41:38', '{\"status\":\"fail\",\"message\":\"reserved range\",\"query\":\"::1\",\"browser_name\":\"Chrome\",\"os_name\":\"Windows\",\"browser_language\":\"en\",\"device_type\":\"desktop\",\"referrer_host\":true,\"referrer_path\":true}', 3, '2025-10-16 08:11:38', '2025-10-16 08:11:38'),
(15, 10, '::1', '2025-10-18 19:06:08', '{\"status\":\"fail\",\"message\":\"reserved range\",\"query\":\"::1\",\"browser_name\":\"Chrome\",\"os_name\":\"Windows\",\"browser_language\":\"en\",\"device_type\":\"desktop\",\"referrer_host\":true,\"referrer_path\":true}', 3, '2025-10-18 13:36:08', '2025-10-18 13:36:08'),
(16, 10, '::1', '2025-10-18 21:37:12', '{\"status\":\"fail\",\"message\":\"reserved range\",\"query\":\"::1\",\"browser_name\":\"Chrome\",\"os_name\":\"Windows\",\"browser_language\":\"en\",\"device_type\":\"desktop\",\"referrer_host\":true,\"referrer_path\":true}', 3, '2025-10-18 16:07:12', '2025-10-18 16:07:12'),
(17, 10, '::1', '2025-10-18 21:40:23', '{\"status\":\"fail\",\"message\":\"reserved range\",\"query\":\"::1\",\"browser_name\":\"Chrome\",\"os_name\":\"Windows\",\"browser_language\":\"en\",\"device_type\":\"desktop\",\"referrer_host\":true,\"referrer_path\":true}', 3, '2025-10-18 16:10:23', '2025-10-18 16:10:23'),
(18, 10, '::1', '2025-10-18 22:04:46', '{\"status\":\"fail\",\"message\":\"reserved range\",\"query\":\"::1\",\"browser_name\":\"Chrome\",\"os_name\":\"Windows\",\"browser_language\":\"en\",\"device_type\":\"desktop\",\"referrer_host\":true,\"referrer_path\":true}', 3, '2025-10-18 16:34:46', '2025-10-18 16:34:46'),
(19, 10, '::1', '2025-10-20 11:08:22', '{\"status\":\"fail\",\"message\":\"reserved range\",\"query\":\"::1\",\"browser_name\":\"Chrome\",\"os_name\":\"Windows\",\"browser_language\":\"en\",\"device_type\":\"desktop\",\"referrer_host\":true,\"referrer_path\":true}', 3, '2025-10-20 05:38:22', '2025-10-20 05:38:22'),
(20, 10, '::1', '2025-10-20 12:12:50', '{\"status\":\"fail\",\"message\":\"reserved range\",\"query\":\"::1\",\"browser_name\":\"Chrome\",\"os_name\":\"Windows\",\"browser_language\":\"en\",\"device_type\":\"desktop\",\"referrer_host\":true,\"referrer_path\":true}', 3, '2025-10-20 06:42:50', '2025-10-20 06:42:50'),
(21, 10, '::1', '2025-10-20 18:20:19', '{\"browser_name\":\"Chrome\",\"os_name\":\"Windows\",\"browser_language\":\"en\",\"device_type\":\"desktop\",\"referrer_host\":true,\"referrer_path\":true}', 3, '2025-10-20 12:50:19', '2025-10-20 12:50:19'),
(22, 11, '::1', '2025-10-21 00:36:44', '{\"browser_name\":\"Chrome\",\"os_name\":\"Windows\",\"browser_language\":\"en\",\"device_type\":\"desktop\",\"referrer_host\":true,\"referrer_path\":true}', 3, '2025-10-20 19:06:44', '2025-10-20 19:06:44');

-- --------------------------------------------------------

--
-- Table structure for table `meetings`
--

CREATE TABLE `meetings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `parent` varchar(191) DEFAULT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `account` int(11) NOT NULL DEFAULT 0,
  `description` varchar(191) DEFAULT NULL,
  `attendees_user` int(11) NOT NULL DEFAULT 0,
  `attendees_contact` int(11) NOT NULL DEFAULT 0,
  `attendees_lead` int(11) NOT NULL DEFAULT 0,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `meetings`
--

INSERT INTO `meetings` (`id`, `user_id`, `name`, `status`, `start_date`, `end_date`, `parent`, `parent_id`, `account`, `description`, `attendees_user`, `attendees_contact`, `attendees_lead`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 0, 'Test Meeting', 0, '2025-10-08', '2025-10-08', 'case', 1, 1, 'test', 0, 0, 0, 3, '2025-10-08 06:27:41', '2025-10-08 06:32:07');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_09_28_102009_create_settings_table', 1),
(5, '2020_05_21_065337_create_permission_tables', 1),
(6, '2020_07_28_100808_create_plans_table', 1),
(7, '2020_07_29_035024_create_orders_table', 1),
(8, '2020_07_29_052408_create_coupons_table', 1),
(9, '2020_07_29_052610_create_user_coupons_table', 1),
(10, '2020_11_25_061116_create_accounts_table', 1),
(11, '2020_11_28_055255_create_account_types_table', 1),
(12, '2020_11_28_065124_create_account_industries_table', 1),
(13, '2020_11_30_104701_create_contacts_table', 1),
(14, '2020_12_01_060219_create_leads_table', 1),
(15, '2020_12_01_064750_create_lead_sources_table', 1),
(16, '2020_12_14_051346_create_opportunities_table', 1),
(17, '2020_12_14_065942_create_opportunities_stages_table', 1),
(18, '2020_12_14_111453_create_common_cases_table', 1),
(19, '2020_12_15_033841_create_case_types_table', 1),
(20, '2020_12_15_091500_create_meetings_table', 1),
(21, '2020_12_16_035941_create_calls_table', 1),
(22, '2020_12_16_051431_create_tasks_table', 1),
(23, '2020_12_16_063441_create_document_folders_table', 1),
(24, '2020_12_16_084540_create_documents_table', 1),
(25, '2020_12_16_091750_create_document_types_table', 1),
(26, '2020_12_16_110906_create_campaigns_table', 1),
(27, '2020_12_16_112119_create_target_lists_table', 1),
(28, '2020_12_16_115624_create_campaign_types_table', 1),
(29, '2020_12_17_050858_create_quotes_table', 1),
(30, '2020_12_17_052303_create_quote_items_table', 1),
(31, '2020_12_17_052928_create_products_table', 1),
(32, '2020_12_17_054729_create_product_categories_table', 1),
(33, '2020_12_17_061010_create_product_brands_table', 1),
(34, '2020_12_17_063605_create_product_taxes_table', 1),
(35, '2020_12_17_100229_create_shipping_providers_table', 1),
(36, '2020_12_19_055255_create_sales_orders_table', 1),
(37, '2020_12_19_064642_create_sales_order_items_table', 1),
(38, '2020_12_21_055319_create_invoices_table', 1),
(39, '2020_12_21_055332_create_invoice_items_table', 1),
(40, '2020_12_22_064917_create_streams_table', 1),
(41, '2020_12_31_113539_create_reports_table', 1),
(42, '2021_01_08_034927_create_task_stages_table', 1),
(43, '2021_02_23_083349_create_user_defualt_views_table', 1),
(44, '2021_04_12_102140_change_postal_code_type', 1),
(45, '2021_04_13_035851_create_form_builders_table', 1),
(46, '2021_04_13_060711_create_form_fields_table', 1),
(47, '2021_04_13_073341_create_form_responses_table', 1),
(48, '2021_04_13_095457_create_form_field_responses_table', 1),
(49, '2021_07_15_114035_create_email_templates_table', 1),
(50, '2021_07_23_112036_create_admin_payment_settings_table', 1),
(51, '2021_07_23_112610_create_invoice_payments_table', 1),
(52, '2021_07_23_112654_create_payments_table', 1),
(53, '2021_07_28_042428_create_landing_page_sections_table', 1),
(54, '2021_11_17_054343_create_plan_requests_table', 1),
(55, '2022_07_15_113851_create_email_template_langs', 1),
(56, '2022_07_15_113905_create_user_email_templates', 1),
(57, '2022_07_26_044437_create_contracts_table', 1),
(58, '2022_07_26_050332_create_contract_types_table', 1),
(59, '2022_07_26_050355_create_contract_attechments_table', 1),
(60, '2022_07_26_050410_create_contract_comments_table', 1),
(61, '2022_07_26_050426_create_contract_notes_table', 1),
(62, '2023_04_20_091255_create_login_details_table', 1),
(63, '2023_04_24_060403_create_webhooks_table', 1),
(64, '2023_05_03_030332_create_notification_templates_table', 1),
(65, '2023_05_03_030503_create_notification_template_langs_table', 1),
(66, '2023_05_30_064702_create_bank_transfer_table', 1),
(67, '2023_06_05_043450_create_landing_page_settings_table', 1),
(68, '2023_06_08_063930_create_template_table', 1),
(69, '2023_06_10_114031_create_join_us_table', 1),
(70, '2023_06_22_999999_add_avatar_to_users', 1),
(71, '2023_06_22_999999_add_dark_mode_to_users', 1),
(72, '2023_06_22_999999_add_messenger_color_to_users', 1),
(73, '2023_06_22_999999_create_chatify_favorites_table', 1),
(74, '2023_06_22_999999_create_chatify_messages_table', 1),
(75, '2023_06_28_062224_create_languages_table', 1),
(76, '2023_12_12_112341_add_is_disable_to_users_table', 1),
(77, '2023_12_29_111111_add_trial_days_to_plans', 1),
(78, '2024_01_01_120241_add_trial_plan_to_users', 1),
(79, '2024_01_12_110125_add_is_enable_login_to_users', 1),
(80, '2024_01_27_034059_add_is_refund_to_orders', 1),
(81, '2024_02_05_044123_add_status_to_plans_table', 1),
(89, '2025_10_03_092035_create_user_checkin_checkout_details_table', 2),
(92, '2025_10_04_055916_create_users_location_logs_table', 3),
(95, '2025_10_04_114347_create_user_visit_details_table', 4),
(96, '2019_12_14_000001_create_personal_access_tokens_table', 5),
(97, '2025_10_09_121156_add_col_leads_table', 6),
(98, '2025_10_10_095105_add_col_lead_quotes_table', 7),
(99, '2025_10_07_052856_add_column_lead_table', 8),
(100, '2025_10_07_075806_add_col_user_checkin_checkout_details_table', 8),
(109, '2025_10_16_102858_create_lead_type_table', 9),
(112, '2025_10_16_103732_create_warehouses_table', 10),
(113, '2025_10_16_105109_add_lead_type_id_in_leads_table', 11),
(114, '2025_10_16_105905_add_col_products_table', 12),
(117, '2025_10_16_111138_add_sales_invoice_table', 13),
(119, '2025_10_16_130945_add_col_part_type_in_leads_table', 14),
(120, '2025_10_16_071550_create_sales_return_table', 15),
(121, '2025_10_17_065609_recreate_products_table', 16),
(122, '2025_10_17_072029_recreate_leads_table', 17),
(123, '2025_10_17_073250_create_lead_statuses_table', 18),
(124, '2025_10_17_080105_create_yards_table', 19),
(138, '2025_10_17_094814_recreate_sales_order_table', 20),
(139, '2025_10_19_105321_create_yard_logs_table', 20),
(140, '2025_10_20_105122_add_created_by_to_lead_statuses_table', 20),
(141, '2025_10_20_193423_add_col_source_date_in__sales_order__table', 20);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(2, 'App\\Models\\User', 3),
(3, 'App\\Models\\User', 4),
(3, 'App\\Models\\User', 5),
(3, 'App\\Models\\User', 10),
(4, 'App\\Models\\User', 6),
(5, 'App\\Models\\User', 7),
(5, 'App\\Models\\User', 8),
(5, 'App\\Models\\User', 9),
(6, 'App\\Models\\User', 10),
(7, 'App\\Models\\User', 11);

-- --------------------------------------------------------

--
-- Table structure for table `notification_templates`
--

CREATE TABLE `notification_templates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `slug` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notification_templates`
--

INSERT INTO `notification_templates` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'New User', 'new_user', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(2, 'New Lead', 'new_lead', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(3, 'New Task', 'new_task', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(4, 'New Quotes', 'new_quotes', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(5, 'New Sales Order', 'new_salesorder', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(6, 'New Invoice', 'new_invoice', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(7, 'New Invoice Payment', 'new_invoice_payment', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(8, 'New Meeting', 'new_meeting', '2024-04-04 13:40:47', '2024-04-04 13:40:47');

-- --------------------------------------------------------

--
-- Table structure for table `notification_template_langs`
--

CREATE TABLE `notification_template_langs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` int(11) NOT NULL,
  `lang` varchar(100) NOT NULL,
  `content` longtext NOT NULL,
  `variables` longtext NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notification_template_langs`
--

INSERT INTO `notification_template_langs` (`id`, `parent_id`, `lang`, `content`, `variables`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 1, 'ar', 'تم تكوين مستخدم جديد بواسطة {user_name}', '{\n                    \"Email\": \"email\",\n                    \"Password\": \"password\",\n                    \"Company Name\": \"user_name\",\n                    \"App Name\": \"app_name\"\n                    }', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(2, 1, 'da', 'Ny bruger oprettet af {bruger_navn}.', '{\n                    \"Email\": \"email\",\n                    \"Password\": \"password\",\n                    \"Company Name\": \"user_name\",\n                    \"App Name\": \"app_name\"\n                    }', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(3, 1, 'de', 'Neuer Benutzer erstellt von {Benutzername}.', '{\n                    \"Email\": \"email\",\n                    \"Password\": \"password\",\n                    \"Company Name\": \"user_name\",\n                    \"App Name\": \"app_name\"\n                    }', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(4, 1, 'en', 'New User created by {user_name}.', '{\n                    \"Email\": \"email\",\n                    \"Password\": \"password\",\n                    \"Company Name\": \"user_name\",\n                    \"App Name\": \"app_name\"\n                    }', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(5, 1, 'es', 'Nueva usuario creada por {nombre_usuario}.', '{\n                    \"Email\": \"email\",\n                    \"Password\": \"password\",\n                    \"Company Name\": \"user_name\",\n                    \"App Name\": \"app_name\"\n                    }', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(6, 1, 'fr', 'Nouvel utilisateur créé par {Nom_utilisateur}.', '{\n                    \"Email\": \"email\",\n                    \"Password\": \"password\",\n                    \"Company Name\": \"user_name\",\n                    \"App Name\": \"app_name\"\n                    }', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(7, 1, 'it', 'Nuovo utente creato da {user_name}.', '{\n                    \"Email\": \"email\",\n                    \"Password\": \"password\",\n                    \"Company Name\": \"user_name\",\n                    \"App Name\": \"app_name\"\n                    }', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(8, 1, 'ja', 'によって作成された新しいユーザー{ユーザー名}.', '{\n                    \"Email\": \"email\",\n                    \"Password\": \"password\",\n                    \"Company Name\": \"user_name\",\n                    \"App Name\": \"app_name\"\n                    }', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(9, 1, 'nl', 'Nieuwe gebruiker gemaakt door {gebruikersnaam}.', '{\n                    \"Email\": \"email\",\n                    \"Password\": \"password\",\n                    \"Company Name\": \"user_name\",\n                    \"App Name\": \"app_name\"\n                    }', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(10, 1, 'pl', 'Nowy użytkownik utworzony przez {nazwa_użytkownika}.', '{\n                    \"Email\": \"email\",\n                    \"Password\": \"password\",\n                    \"Company Name\": \"user_name\",\n                    \"App Name\": \"app_name\"\n                    }', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(11, 1, 'ru', 'Новый пользователь, созданный {имя_пользователя}.', '{\n                    \"Email\": \"email\",\n                    \"Password\": \"password\",\n                    \"Company Name\": \"user_name\",\n                    \"App Name\": \"app_name\"\n                    }', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(12, 1, 'pt', 'Novo Usuário criado por {user_name}.', '{\n                    \"Email\": \"email\",\n                    \"Password\": \"password\",\n                    \"Company Name\": \"user_name\",\n                    \"App Name\": \"app_name\"\n                    }', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(13, 1, 'tr', '{user_name} tarafından oluşturulan Yeni Kullanıcı.', '{\n                    \"Email\": \"email\",\n                    \"Password\": \"password\",\n                    \"Company Name\": \"user_name\",\n                    \"App Name\": \"app_name\"\n                    }', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(14, 1, 'zh', '由 {user_name} 创建的新用户。', '{\n                    \"Email\": \"email\",\n                    \"Password\": \"password\",\n                    \"Company Name\": \"user_name\",\n                    \"App Name\": \"app_name\"\n                    }', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(15, 1, 'he', 'משתמש חדש נוצר על ידי {user_name}.', '{\n                    \"Email\": \"email\",\n                    \"Password\": \"password\",\n                    \"Company Name\": \"user_name\",\n                    \"App Name\": \"app_name\"\n                    }', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(16, 1, 'pt-br', 'Novo usuário criado por {user_name}.', '{\n                    \"Email\": \"email\",\n                    \"Password\": \"password\",\n                    \"Company Name\": \"user_name\",\n                    \"App Name\": \"app_name\"\n                    }', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(17, 2, 'ar', 'جديد تم تكوينه بواسطة {ليللي_name}.', '{\n                    \"Lead Name\":\"lead_name\",\n                    \"Lead Email\": \"lead_email\",\n                    \"Company Name\":\"company_name\",\n                    \"App Name\": \"app_name\"\n                    }', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(18, 2, 'da', 'Ny ledelse oprettet af {lead_navn}.', '{\n                    \"Lead Name\":\"lead_name\",\n                    \"Lead Email\": \"lead_email\",\n                    \"Company Name\":\"company_name\",\n                    \"App Name\": \"app_name\"\n                    }', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(19, 2, 'de', 'Neuer Lead erstellt von {Lead_name}.', '{\n                    \"Lead Name\":\"lead_name\",\n                    \"Lead Email\": \"lead_email\",\n                    \"Company Name\":\"company_name\",\n                    \"App Name\": \"app_name\"\n                    }', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(20, 2, 'en', 'New Lead created by {lead_name}.', '{\n                    \"Lead Name\":\"lead_name\",\n                    \"Lead Email\": \"lead_email\",\n                    \"Company Name\":\"company_name\",\n                    \"App Name\": \"app_name\"\n                    }', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(21, 2, 'es', 'Nuevo cliente potencial creado por {nombre_tabla}.', '{\n                    \"Lead Name\":\"lead_name\",\n                    \"Lead Email\": \"lead_email\",\n                    \"Company Name\":\"company_name\",\n                    \"App Name\": \"app_name\"\n                    }', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(22, 2, 'fr', 'Nouvelle opportunité créée par {Nom_chef}.', '{\n                    \"Lead Name\":\"lead_name\",\n                    \"Lead Email\": \"lead_email\",\n                    \"Company Name\":\"company_name\",\n                    \"App Name\": \"app_name\"\n                    }', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(23, 2, 'it', 'Nuovo Lead creato da {lead_name}.', '{\n                    \"Lead Name\":\"lead_name\",\n                    \"Lead Email\": \"lead_email\",\n                    \"Company Name\":\"company_name\",\n                    \"App Name\": \"app_name\"\n                    }', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(24, 2, 'ja', '新規リードの作成者 {先頭名}.', '{\n                    \"Lead Name\":\"lead_name\",\n                    \"Lead Email\": \"lead_email\",\n                    \"Company Name\":\"company_name\",\n                    \"App Name\": \"app_name\"\n                    }', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(25, 2, 'nl', 'Nieuwe leider gemaakt door {naam_item}.', '{\n                    \"Lead Name\":\"lead_name\",\n                    \"Lead Email\": \"lead_email\",\n                    \"Company Name\":\"company_name\",\n                    \"App Name\": \"app_name\"\n                    }', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(26, 2, 'pl', 'Nowy kierownik utworzony przez {nazwa_przywódcy}.', '{\n                    \"Lead Name\":\"lead_name\",\n                    \"Lead Email\": \"lead_email\",\n                    \"Company Name\":\"company_name\",\n                    \"App Name\": \"app_name\"\n                    }', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(27, 2, 'ru', 'Новый руководитель, созданный {имя_руководства}.', '{\n                    \"Lead Name\":\"lead_name\",\n                    \"Lead Email\": \"lead_email\",\n                    \"Company Name\":\"company_name\",\n                    \"App Name\": \"app_name\"\n                    }', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(28, 2, 'pt', 'Novo Lead criado por {lead_name}.', '{\n                    \"Lead Name\":\"lead_name\",\n                    \"Lead Email\": \"lead_email\",\n                    \"Company Name\":\"company_name\",\n                    \"App Name\": \"app_name\"\n                    }', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(29, 2, 'tr', '{lead_name} tarafından oluşturulan yeni Potansiyel Müşteri.', '{\n                    \"Lead Name\":\"lead_name\",\n                    \"Lead Email\": \"lead_email\",\n                    \"Company Name\":\"company_name\",\n                    \"App Name\": \"app_name\"\n                    }', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(30, 2, 'zh', '由 {lead_name} 创建的新商机。', '{\n                    \"Lead Name\":\"lead_name\",\n                    \"Lead Email\": \"lead_email\",\n                    \"Company Name\":\"company_name\",\n                    \"App Name\": \"app_name\"\n                    }', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(31, 2, 'he', 'ביצוע חדש שנוצר על-ידי {lead_name}.', '{\n                    \"Lead Name\":\"lead_name\",\n                    \"Lead Email\": \"lead_email\",\n                    \"Company Name\":\"company_name\",\n                    \"App Name\": \"app_name\"\n                    }', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(32, 2, 'pt-br', 'Novo Lead criado por {lead_name}.', '{\n                    \"Lead Name\":\"lead_name\",\n                    \"Lead Email\": \"lead_email\",\n                    \"Company Name\":\"company_name\",\n                    \"App Name\": \"app_name\"\n                    }', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(33, 3, 'ar', 'مهمة جديدة {اسم المهمة} تكوين بواسطة {user_name}', '{\n                    \"Task Name\":\"task_name\",\n                    \"Task Start Date\": \"task_start_date\",\n                    \"Task Due Date\":\"task_due_date\",\n                    \"Company Name\":\"user_name\",\n                    \"App Name\": \"app_name\"\n                    }', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(34, 3, 'da', 'Ny opgave {opgaveravn} oprettet af {bruger_navn}', '{\n                    \"Task Name\":\"task_name\",\n                    \"Task Start Date\": \"task_start_date\",\n                    \"Task Due Date\":\"task_due_date\",\n                    \"Company Name\":\"user_name\",\n                    \"App Name\": \"app_name\"\n                    }', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(35, 3, 'de', 'Neue Aufgabe {Taskname} erstellt von {Benutzername}', '{\n                    \"Task Name\":\"task_name\",\n                    \"Task Start Date\": \"task_start_date\",\n                    \"Task Due Date\":\"task_due_date\",\n                    \"Company Name\":\"user_name\",\n                    \"App Name\": \"app_name\"\n                    }', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(36, 3, 'en', 'New Task {task_name} created by {user_name}', '{\n                    \"Task Name\":\"task_name\",\n                    \"Task Start Date\": \"task_start_date\",\n                    \"Task Due Date\":\"task_due_date\",\n                    \"Company Name\":\"user_name\",\n                    \"App Name\": \"app_name\"\n                    }', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(37, 3, 'es', 'Nueva tarea {nombre_tarea} creado por {nombre_usuario}', '{\n                    \"Task Name\":\"task_name\",\n                    \"Task Start Date\": \"task_start_date\",\n                    \"Task Due Date\":\"task_due_date\",\n                    \"Company Name\":\"user_name\",\n                    \"App Name\": \"app_name\"\n                    }', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(38, 3, 'fr', 'Nouvelle tâche {Nom_tâche} Créé par {Nom_utilisateur}', '{\n                    \"Task Name\":\"task_name\",\n                    \"Task Start Date\": \"task_start_date\",\n                    \"Task Due Date\":\"task_due_date\",\n                    \"Company Name\":\"user_name\",\n                    \"App Name\": \"app_name\"\n                    }', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(39, 3, 'it', 'Nuova attività {task_name} creato da {user_name}', '{\n                    \"Task Name\":\"task_name\",\n                    \"Task Start Date\": \"task_start_date\",\n                    \"Task Due Date\":\"task_due_date\",\n                    \"Company Name\":\"user_name\",\n                    \"App Name\": \"app_name\"\n                    }', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(40, 3, 'ja', '新規タスク {タスク名名} 作成者 {ユーザー名}', '{\n                    \"Task Name\":\"task_name\",\n                    \"Task Start Date\": \"task_start_date\",\n                    \"Task Due Date\":\"task_due_date\",\n                    \"Company Name\":\"user_name\",\n                    \"App Name\": \"app_name\"\n                    }', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(41, 3, 'nl', 'Nieuwe taak {taaknaam} gemaakt door {gebruikersnaam}', '{\n                    \"Task Name\":\"task_name\",\n                    \"Task Start Date\": \"task_start_date\",\n                    \"Task Due Date\":\"task_due_date\",\n                    \"Company Name\":\"user_name\",\n                    \"App Name\": \"app_name\"\n                    }', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(42, 3, 'pl', 'Nowe zadanie {nazwa_zadania} utworzone przez {nazwa_użytkownika}', '{\n                    \"Task Name\":\"task_name\",\n                    \"Task Start Date\": \"task_start_date\",\n                    \"Task Due Date\":\"task_due_date\",\n                    \"Company Name\":\"user_name\",\n                    \"App Name\": \"app_name\"\n                    }', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(43, 3, 'ru', 'Создать задачу {имя_задачи} кем создано {имя_пользователя}', '{\n                    \"Task Name\":\"task_name\",\n                    \"Task Start Date\": \"task_start_date\",\n                    \"Task Due Date\":\"task_due_date\",\n                    \"Company Name\":\"user_name\",\n                    \"App Name\": \"app_name\"\n                    }', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(44, 3, 'pt', 'Nova Tarefa {task_name} criado por {user_name}', '{\n                    \"Task Name\":\"task_name\",\n                    \"Task Start Date\": \"task_start_date\",\n                    \"Task Due Date\":\"task_due_date\",\n                    \"Company Name\":\"user_name\",\n                    \"App Name\": \"app_name\"\n                    }', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(45, 3, 'tr', '{user_name} tarafından oluşturulan {task_name} adlı yeni Görev', '{\n                    \"Task Name\":\"task_name\",\n                    \"Task Start Date\": \"task_start_date\",\n                    \"Task Due Date\":\"task_due_date\",\n                    \"Company Name\":\"user_name\",\n                    \"App Name\": \"app_name\"\n                    }', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(46, 3, 'zh', '{user_name} 创建的新任务 {task_name}', '{\n                    \"Task Name\":\"task_name\",\n                    \"Task Start Date\": \"task_start_date\",\n                    \"Task Due Date\":\"task_due_date\",\n                    \"Company Name\":\"user_name\",\n                    \"App Name\": \"app_name\"\n                    }', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(47, 3, 'he', 'משימה חדשה {task_name} נוצרה על-ידי {user_name}', '{\n                    \"Task Name\":\"task_name\",\n                    \"Task Start Date\": \"task_start_date\",\n                    \"Task Due Date\":\"task_due_date\",\n                    \"Company Name\":\"user_name\",\n                    \"App Name\": \"app_name\"\n                    }', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(48, 3, 'pt-br', 'Nova tarefa {task_name} criada por {user_name}', '{\n                    \"Task Name\":\"task_name\",\n                    \"Task Start Date\": \"task_start_date\",\n                    \"Task Due Date\":\"task_due_date\",\n                    \"Company Name\":\"user_name\",\n                    \"App Name\": \"app_name\"\n                    }', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(49, 4, 'ar', 'تم تكوين علامة تنصيص جديدة بواسطة {user_name}.', '{\n                    \"Quote Number\":\"quote_number\",\n                    \"Billing Address\": \"billing_address\",\n                    \"Shipping Address\":\"shipping_address\",\n                    \"Quoted Date\":\"date_quoted\",\n                    \"Company Name\":\"user_name\",\n                    \"App Name\": \"app_name\"\n                    }', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(50, 4, 'da', 'Nyt tilbud oprettet af {bruger_navn}.', '{\n                    \"Quote Number\":\"quote_number\",\n                    \"Billing Address\": \"billing_address\",\n                    \"Shipping Address\":\"shipping_address\",\n                    \"Quoted Date\":\"date_quoted\",\n                    \"Company Name\":\"user_name\",\n                    \"App Name\": \"app_name\"\n                    }', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(51, 4, 'de', 'Neues Angebot erstellt von {Benutzername}.', '{\n                    \"Quote Number\":\"quote_number\",\n                    \"Billing Address\": \"billing_address\",\n                    \"Shipping Address\":\"shipping_address\",\n                    \"Quoted Date\":\"date_quoted\",\n                    \"Company Name\":\"user_name\",\n                    \"App Name\": \"app_name\"\n                    }', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(52, 4, 'en', 'New Quote created by {user_name}.', '{\n                    \"Quote Number\":\"quote_number\",\n                    \"Billing Address\": \"billing_address\",\n                    \"Shipping Address\":\"shipping_address\",\n                    \"Quoted Date\":\"date_quoted\",\n                    \"Company Name\":\"user_name\",\n                    \"App Name\": \"app_name\"\n                    }', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(53, 4, 'es', 'Nuevo presupuesto creado por {nombre_usuario}.', '{\n                    \"Quote Number\":\"quote_number\",\n                    \"Billing Address\": \"billing_address\",\n                    \"Shipping Address\":\"shipping_address\",\n                    \"Quoted Date\":\"date_quoted\",\n                    \"Company Name\":\"user_name\",\n                    \"App Name\": \"app_name\"\n                    }', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(54, 4, 'fr', 'Nouveau devis créé par {Nom_utilisateur}.', '{\n                    \"Quote Number\":\"quote_number\",\n                    \"Billing Address\": \"billing_address\",\n                    \"Shipping Address\":\"shipping_address\",\n                    \"Quoted Date\":\"date_quoted\",\n                    \"Company Name\":\"user_name\",\n                    \"App Name\": \"app_name\"\n                    }', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(55, 4, 'it', 'Nuovo Preventivo creato da {user_name}.', '{\n                    \"Quote Number\":\"quote_number\",\n                    \"Billing Address\": \"billing_address\",\n                    \"Shipping Address\":\"shipping_address\",\n                    \"Quoted Date\":\"date_quoted\",\n                    \"Company Name\":\"user_name\",\n                    \"App Name\": \"app_name\"\n                    }', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(56, 4, 'ja', '新規見積作成者 {ユーザー名}.', '{\n                    \"Quote Number\":\"quote_number\",\n                    \"Billing Address\": \"billing_address\",\n                    \"Shipping Address\":\"shipping_address\",\n                    \"Quoted Date\":\"date_quoted\",\n                    \"Company Name\":\"user_name\",\n                    \"App Name\": \"app_name\"\n                    }', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(57, 4, 'nl', 'Nieuwe prijsopgave gemaakt door {gebruikersnaam}.', '{\n                    \"Quote Number\":\"quote_number\",\n                    \"Billing Address\": \"billing_address\",\n                    \"Shipping Address\":\"shipping_address\",\n                    \"Quoted Date\":\"date_quoted\",\n                    \"Company Name\":\"user_name\",\n                    \"App Name\": \"app_name\"\n                    }', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(58, 4, 'pl', 'Nowa oferta utworzona przez {nazwa_użytkownika}.', '{\n                    \"Quote Number\":\"quote_number\",\n                    \"Billing Address\": \"billing_address\",\n                    \"Shipping Address\":\"shipping_address\",\n                    \"Quoted Date\":\"date_quoted\",\n                    \"Company Name\":\"user_name\",\n                    \"App Name\": \"app_name\"\n                    }', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(59, 4, 'ru', 'Создать расценку, созданную {имя_пользователя}.', '{\n                    \"Quote Number\":\"quote_number\",\n                    \"Billing Address\": \"billing_address\",\n                    \"Shipping Address\":\"shipping_address\",\n                    \"Quoted Date\":\"date_quoted\",\n                    \"Company Name\":\"user_name\",\n                    \"App Name\": \"app_name\"\n                    }', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(60, 4, 'pt', 'Nova Cotação criada por {user_name}.', '{\n                    \"Quote Number\":\"quote_number\",\n                    \"Billing Address\": \"billing_address\",\n                    \"Shipping Address\":\"shipping_address\",\n                    \"Quoted Date\":\"date_quoted\",\n                    \"Company Name\":\"user_name\",\n                    \"App Name\": \"app_name\"\n                    }', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(61, 4, 'tr', '{user_name} tarafından oluşturulan yeni Fiyat Teklifi.', '{\n                    \"Quote Number\":\"quote_number\",\n                    \"Billing Address\": \"billing_address\",\n                    \"Shipping Address\":\"shipping_address\",\n                    \"Quoted Date\":\"date_quoted\",\n                    \"Company Name\":\"user_name\",\n                    \"App Name\": \"app_name\"\n                    }', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(62, 4, 'zh', '{ user_name} 创建的新报价。', '{\n                    \"Quote Number\":\"quote_number\",\n                    \"Billing Address\": \"billing_address\",\n                    \"Shipping Address\":\"shipping_address\",\n                    \"Quoted Date\":\"date_quoted\",\n                    \"Company Name\":\"user_name\",\n                    \"App Name\": \"app_name\"\n                    }', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(63, 4, 'he', 'הצעת מחיר חדשה שנוצרה על-ידי {user_name}.', '{\n                    \"Quote Number\":\"quote_number\",\n                    \"Billing Address\": \"billing_address\",\n                    \"Shipping Address\":\"shipping_address\",\n                    \"Quoted Date\":\"date_quoted\",\n                    \"Company Name\":\"user_name\",\n                    \"App Name\": \"app_name\"\n                    }', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(64, 4, 'pt-br', 'Nova Citação criada por {user_name}.', '{\n                    \"Quote Number\":\"quote_number\",\n                    \"Billing Address\": \"billing_address\",\n                    \"Shipping Address\":\"shipping_address\",\n                    \"Quoted Date\":\"date_quoted\",\n                    \"Company Name\":\"user_name\",\n                    \"App Name\": \"app_name\"\n                    }', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(65, 5, 'ar', 'نظام سلطة جديد {رقم _ quote_number}  تكوين بواسطة {user_name}.', '{\n                    \"Quote Number\":\"quote_number\",\n                    \"Billing Address\": \"billing_address\",\n                    \"Shipping Address\":\"shipping_address\",\n                    \"Company Name\":\"user_name\",\n                    \"App Name\": \"app_name\"\n                    }', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(66, 5, 'da', 'Ny Salesorder {cik_nummer} oprettet af {bruger_navn}.', '{\n                    \"Quote Number\":\"quote_number\",\n                    \"Billing Address\": \"billing_address\",\n                    \"Shipping Address\":\"shipping_address\",\n                    \"Company Name\":\"user_name\",\n                    \"App Name\": \"app_name\"\n                    }', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(67, 5, 'de', 'Neuer Salesorder {quote_nummer} erstellt von {Benutzername}.', '{\n                    \"Quote Number\":\"quote_number\",\n                    \"Billing Address\": \"billing_address\",\n                    \"Shipping Address\":\"shipping_address\",\n                    \"Company Name\":\"user_name\",\n                    \"App Name\": \"app_name\"\n                    }', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(68, 5, 'en', 'New Salesorder {quote_number} created by {user_name}.', '{\n                    \"Quote Number\":\"quote_number\",\n                    \"Billing Address\": \"billing_address\",\n                    \"Shipping Address\":\"shipping_address\",\n                    \"Company Name\":\"user_name\",\n                    \"App Name\": \"app_name\"\n                    }', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(69, 5, 'es', 'New Salesorder {número_cantidad} creado por {nombre_usuario}.', '{\n                    \"Quote Number\":\"quote_number\",\n                    \"Billing Address\": \"billing_address\",\n                    \"Shipping Address\":\"shipping_address\",\n                    \"Company Name\":\"user_name\",\n                    \"App Name\": \"app_name\"\n                    }', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(70, 5, 'fr', 'Nouvelle commande Salesorder {Numéro_quota} Créé par {Nom_utilisateur}.', '{\n                    \"Quote Number\":\"quote_number\",\n                    \"Billing Address\": \"billing_address\",\n                    \"Shipping Address\":\"shipping_address\",\n                    \"Company Name\":\"user_name\",\n                    \"App Name\": \"app_name\"\n                    }', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(71, 5, 'it', 'Nuovo Salesorder {quote_numero} creato da {user_name}.', '{\n                    \"Quote Number\":\"quote_number\",\n                    \"Billing Address\": \"billing_address\",\n                    \"Shipping Address\":\"shipping_address\",\n                    \"Company Name\":\"user_name\",\n                    \"App Name\": \"app_name\"\n                    }', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(72, 5, 'ja', '新規販売オーダー {quote_number} 作成者 {ユーザー名}.', '{\n                    \"Quote Number\":\"quote_number\",\n                    \"Billing Address\": \"billing_address\",\n                    \"Shipping Address\":\"shipping_address\",\n                    \"Company Name\":\"user_name\",\n                    \"App Name\": \"app_name\"\n                    }', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(73, 5, 'nl', 'Nieuwe verkooporder {quote_number} gemaakt door {gebruikersnaam}.', '{\n                    \"Quote Number\":\"quote_number\",\n                    \"Billing Address\": \"billing_address\",\n                    \"Shipping Address\":\"shipping_address\",\n                    \"Company Name\":\"user_name\",\n                    \"App Name\": \"app_name\"\n                    }', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(74, 5, 'pl', 'Nowy porządek Salesorder {quote_number} utworzone przez {nazwa_użytkownika}.', '{\n                    \"Quote Number\":\"quote_number\",\n                    \"Billing Address\": \"billing_address\",\n                    \"Shipping Address\":\"shipping_address\",\n                    \"Company Name\":\"user_name\",\n                    \"App Name\": \"app_name\"\n                    }', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(75, 5, 'ru', 'Новый заказ на продажу {quote_число} кем создано {имя_пользователя}.', '{\n                    \"Quote Number\":\"quote_number\",\n                    \"Billing Address\": \"billing_address\",\n                    \"Shipping Address\":\"shipping_address\",\n                    \"Company Name\":\"user_name\",\n                    \"App Name\": \"app_name\"\n                    }', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(76, 5, 'pt', 'Novo Vendedor {quote_número} criado por {user_name}.', '{\n                    \"Quote Number\":\"quote_number\",\n                    \"Billing Address\": \"billing_address\",\n                    \"Shipping Address\":\"shipping_address\",\n                    \"Company Name\":\"user_name\",\n                    \"App Name\": \"app_name\"\n                    }', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(77, 5, 'tr', '{user_name} tarafından oluşturulan {quote_number} adlı yeni Satış Siparişi.', '{\n                    \"Quote Number\":\"quote_number\",\n                    \"Billing Address\": \"billing_address\",\n                    \"Shipping Address\":\"shipping_address\",\n                    \"Company Name\":\"user_name\",\n                    \"App Name\": \"app_name\"\n                    }', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(78, 5, 'zh', '{ user_name} 已创建新的 Salesorder {quote_number} 。', '{\n                    \"Quote Number\":\"quote_number\",\n                    \"Billing Address\": \"billing_address\",\n                    \"Shipping Address\":\"shipping_address\",\n                    \"Company Name\":\"user_name\",\n                    \"App Name\": \"app_name\"\n                    }', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(79, 5, 'he', 'הזמנת Salesorder חדשה {quote_number} שנוצרה על-ידי {user_name}.', '{\n                    \"Quote Number\":\"quote_number\",\n                    \"Billing Address\": \"billing_address\",\n                    \"Shipping Address\":\"shipping_address\",\n                    \"Company Name\":\"user_name\",\n                    \"App Name\": \"app_name\"\n                    }', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(80, 5, 'pt-br', 'Novo Salesorder {quote_number} criado por {user_name}.', '{\n                    \"Quote Number\":\"quote_number\",\n                    \"Billing Address\": \"billing_address\",\n                    \"Shipping Address\":\"shipping_address\",\n                    \"Company Name\":\"user_name\",\n                    \"App Name\": \"app_name\"\n                    }', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(81, 6, 'ar', 'تم تكوين فاتورة جديدة { invoice_id } بواسطة  {user_name}.', '{\n                    \"Invoice Number\":\"invoice_id\",\n                    \"Invoice Sub Total\":\"invoice_sub_total\",\n                    \"Company Name\":\"user_name\",\n                    \"App Name\": \"app_name\"\n                    }', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(82, 6, 'da', 'Ny faktura { invoice_id } oprettet af  {bruger_navn}.', '{\n                    \"Invoice Number\":\"invoice_id\",\n                    \"Invoice Sub Total\":\"invoice_sub_total\",\n                    \"Company Name\":\"user_name\",\n                    \"App Name\": \"app_name\"\n                    }', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(83, 6, 'de', 'Neue Rechnung {invoice_id} erstellt von  {Benutzername}.', '{\n                    \"Invoice Number\":\"invoice_id\",\n                    \"Invoice Sub Total\":\"invoice_sub_total\",\n                    \"Company Name\":\"user_name\",\n                    \"App Name\": \"app_name\"\n                    }', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(84, 6, 'en', 'New invoice {invoice_id} created by {user_name}.', '{\n                    \"Invoice Number\":\"invoice_id\",\n                    \"Invoice Sub Total\":\"invoice_sub_total\",\n                    \"Company Name\":\"user_name\",\n                    \"App Name\": \"app_name\"\n                    }', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(85, 6, 'es', 'Nueva factura {invoice_id} creada por  {nombre_usuario}.', '{\n                    \"Invoice Number\":\"invoice_id\",\n                    \"Invoice Sub Total\":\"invoice_sub_total\",\n                    \"Company Name\":\"user_name\",\n                    \"App Name\": \"app_name\"\n                    }', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(86, 6, 'fr', 'Nouvelle facture { invoice_id } créée par  {Nom_utilisateur}.', '{\n                    \"Invoice Number\":\"invoice_id\",\n                    \"Invoice Sub Total\":\"invoice_sub_total\",\n                    \"Company Name\":\"user_name\",\n                    \"App Name\": \"app_name\"\n                    }', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(87, 6, 'it', 'Nuova fattura {invoice_id} creata da  {user_name}.', '{\n                    \"Invoice Number\":\"invoice_id\",\n                    \"Invoice Sub Total\":\"invoice_sub_total\",\n                    \"Company Name\":\"user_name\",\n                    \"App Name\": \"app_name\"\n                    }', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(88, 6, 'ja', '新規請求書 {invoice_id} が作成されました  {ユーザー名}.', '{\n                    \"Invoice Number\":\"invoice_id\",\n                    \"Invoice Sub Total\":\"invoice_sub_total\",\n                    \"Company Name\":\"user_name\",\n                    \"App Name\": \"app_name\"\n                    }', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(89, 6, 'nl', 'Nieuwe factuur { invoice_id } gemaakt door  {gebruikersnaam}.', '{\n                    \"Invoice Number\":\"invoice_id\",\n                    \"Invoice Sub Total\":\"invoice_sub_total\",\n                    \"Company Name\":\"user_name\",\n                    \"App Name\": \"app_name\"\n                    }', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(90, 6, 'pl', 'Nowa faktura {invoice_id } utworzona przez  {nazwa_użytkownika}.', '{\n                    \"Invoice Number\":\"invoice_id\",\n                    \"Invoice Sub Total\":\"invoice_sub_total\",\n                    \"Company Name\":\"user_name\",\n                    \"App Name\": \"app_name\"\n                    }', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(91, 6, 'ru', 'Новый инвойс { invoice_id } создан  {имя_пользователя}.', '{\n                    \"Invoice Number\":\"invoice_id\",\n                    \"Invoice Sub Total\":\"invoice_sub_total\",\n                    \"Company Name\":\"user_name\",\n                    \"App Name\": \"app_name\"\n                    }', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(92, 6, 'pt', 'Nova fatura {invoice_id} criada por  {user_name}.', '{\n                    \"Invoice Number\":\"invoice_id\",\n                    \"Invoice Sub Total\":\"invoice_sub_total\",\n                    \"Company Name\":\"user_name\",\n                    \"App Name\": \"app_name\"\n                    }', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(93, 6, 'tr', '{user_name} tarafından oluşturulan yeni fatura {invoice_id}.', '{\n                    \"Invoice Number\":\"invoice_id\",\n                    \"Invoice Sub Total\":\"invoice_sub_total\",\n                    \"Company Name\":\"user_name\",\n                    \"App Name\": \"app_name\"\n                    }', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(94, 6, 'zh', '{user_name} 创建了新的发票 {invoice_id} 。', '{\n                    \"Invoice Number\":\"invoice_id\",\n                    \"Invoice Sub Total\":\"invoice_sub_total\",\n                    \"Company Name\":\"user_name\",\n                    \"App Name\": \"app_name\"\n                    }', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(95, 6, 'he', 'חשבונית חדשה {invoice_id} נוצרה על-ידי {user_name}.', '{\n                    \"Invoice Number\":\"invoice_id\",\n                    \"Invoice Sub Total\":\"invoice_sub_total\",\n                    \"Company Name\":\"user_name\",\n                    \"App Name\": \"app_name\"\n                    }', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(96, 6, 'pt-br', 'Nova fatura {invoice_id} criada por {user_name}.', '{\n                    \"Invoice Number\":\"invoice_id\",\n                    \"Invoice Sub Total\":\"invoice_sub_total\",\n                    \"Company Name\":\"user_name\",\n                    \"App Name\": \"app_name\"\n                    }', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(97, 7, 'ar', 'تم تكوين دفعة جديدة من { كمية } بالنسبة الى { user_name } بواسطة { payment_type }.', '{\n                    \"user\":\"name\",\n                    \"amount\":\"amount\",\n                    \"payment_type\" :\"payment_type\",\n                    \"Company Name\":\"user_name\",\n                    \"App Name\": \"app_name\"\n                    }', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(98, 7, 'da', 'Ny betaling af { amount } oprettet for { user_name } af { payment_type }.', '{\n                    \"user\":\"name\",\n                    \"amount\":\"amount\",\n                    \"payment_type\" :\"payment_type\",\n                    \"Company Name\":\"user_name\",\n                    \"App Name\": \"app_name\"\n                    }', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(99, 7, 'de', 'Neue Zahlung von {amount} erstellt für {user_name} von {payment_type}.', '{\n                    \"user\":\"name\",\n                    \"amount\":\"amount\",\n                    \"payment_type\" :\"payment_type\",\n                    \"Company Name\":\"user_name\",\n                    \"App Name\": \"app_name\"\n                    }', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(100, 7, 'en', 'New payment of {amount} created for {user_name} by {payment_type}.', '{\n                    \"user\":\"name\",\n                    \"amount\":\"amount\",\n                    \"payment_type\" :\"payment_type\",\n                    \"Company Name\":\"user_name\",\n                    \"App Name\": \"app_name\"\n                    }', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(101, 7, 'es', 'Nuevo pago de {amount} creado para {user_name} por {payment_type}.', '{\n                    \"user\":\"name\",\n                    \"amount\":\"amount\",\n                    \"payment_type\" :\"payment_type\",\n                    \"Company Name\":\"user_name\",\n                    \"App Name\": \"app_name\"\n                    }', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(102, 7, 'fr', 'Nouveau paiement de { amount } créé pour { user_name } par { payment_type }.', '{\n                    \"user\":\"name\",\n                    \"amount\":\"amount\",\n                    \"payment_type\" :\"payment_type\",\n                    \"Company Name\":\"user_name\",\n                    \"App Name\": \"app_name\"\n                    }', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(103, 7, 'it', 'Nuovo pagamento di {importo} creato per {user_name} da {payment_type}.', '{\n                    \"user\":\"name\",\n                    \"amount\":\"amount\",\n                    \"payment_type\" :\"payment_type\",\n                    \"Company Name\":\"user_name\",\n                    \"App Name\": \"app_name\"\n                    }', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(104, 7, 'ja', '{ payment_type} によって { user_name} に対して作成された {金額} の新規支払いが発生しました。', '{\n                    \"user\":\"name\",\n                    \"amount\":\"amount\",\n                    \"payment_type\" :\"payment_type\",\n                    \"Company Name\":\"user_name\",\n                    \"App Name\": \"app_name\"\n                    }', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(105, 7, 'nl', 'Nieuwe betaling van { amount } gemaakt voor { user_name } door { payment_type }.', '{\n                    \"user\":\"name\",\n                    \"amount\":\"amount\",\n                    \"payment_type\" :\"payment_type\",\n                    \"Company Name\":\"user_name\",\n                    \"App Name\": \"app_name\"\n                    }', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(106, 7, 'pl', 'Nowa płatność {amount } została utworzona dla użytkownika {user_name } przez użytkownika {payment_type }.', '{\n                    \"user\":\"name\",\n                    \"amount\":\"amount\",\n                    \"payment_type\" :\"payment_type\",\n                    \"Company Name\":\"user_name\",\n                    \"App Name\": \"app_name\"\n                    }', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(107, 7, 'ru', 'Новая оплата { сумма }, созданная для { имя_пользователя }, { payment_type }.', '{\n                    \"user\":\"name\",\n                    \"amount\":\"amount\",\n                    \"payment_type\" :\"payment_type\",\n                    \"Company Name\":\"user_name\",\n                    \"App Name\": \"app_name\"\n                    }', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(108, 7, 'pt', 'Novo pagamento de {amount} criado para {user_name} por {payment_type}.', '{\n                    \"user\":\"name\",\n                    \"amount\":\"amount\",\n                    \"payment_type\" :\"payment_type\",\n                    \"Company Name\":\"user_name\",\n                    \"App Name\": \"app_name\"\n                    }', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(109, 7, 'tr', '{payment_type} tarafından {user_name} için {amount} tutarında yeni ödeme oluşturuldu.', '{\n                    \"user\":\"name\",\n                    \"amount\":\"amount\",\n                    \"payment_type\" :\"payment_type\",\n                    \"Company Name\":\"user_name\",\n                    \"App Name\": \"app_name\"\n                    }', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(110, 7, 'zh', '{payment_type}为 {user_name} 创建了新支付 { 金额} 。', '{\n                    \"user\":\"name\",\n                    \"amount\":\"amount\",\n                    \"payment_type\" :\"payment_type\",\n                    \"Company Name\":\"user_name\",\n                    \"App Name\": \"app_name\"\n                    }', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(111, 7, 'he', 'תשלום חדש של {לסכום} שנוצר עבור {user_name} על-ידי {payment_type}.', '{\n                    \"user\":\"name\",\n                    \"amount\":\"amount\",\n                    \"payment_type\" :\"payment_type\",\n                    \"Company Name\":\"user_name\",\n                    \"App Name\": \"app_name\"\n                    }', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(112, 7, 'pt-br', 'Novo pagamento de {valor} criado para {user_name} por {payment_type}.', '{\n                    \"user\":\"name\",\n                    \"amount\":\"amount\",\n                    \"payment_type\" :\"payment_type\",\n                    \"Company Name\":\"user_name\",\n                    \"App Name\": \"app_name\"\n                    }', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(113, 8, 'ar', 'تم تكوين اجتماع جديد { atteming_name } بواسطة {user_name}.', '{\n                    \"Meeting Title\":\"meeting_name\",\n                    \"Meeting Start Date\":\"meeting_start_date\",\n                    \"Meeting Due Date\":\"meeting_due_date\",\n                    \"Company Name\":\"user_name\",\n                    \"App Name\": \"app_name\"\n                    }', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(114, 8, 'da', 'Nyt møde { meeting_name } oprettet af {bruger_navn}.', '{\n                    \"Meeting Title\":\"meeting_name\",\n                    \"Meeting Start Date\":\"meeting_start_date\",\n                    \"Meeting Due Date\":\"meeting_due_date\",\n                    \"Company Name\":\"user_name\",\n                    \"App Name\": \"app_name\"\n                    }', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(115, 8, 'de', 'Neue Besprechung {meeting_name} erstellt von {Benutzername}.', '{\n                    \"Meeting Title\":\"meeting_name\",\n                    \"Meeting Start Date\":\"meeting_start_date\",\n                    \"Meeting Due Date\":\"meeting_due_date\",\n                    \"Company Name\":\"user_name\",\n                    \"App Name\": \"app_name\"\n                    }', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(116, 8, 'en', 'New Meeting {meeting_name} created by {user_name}.', '{\n                    \"Meeting Title\":\"meeting_name\",\n                    \"Meeting Start Date\":\"meeting_start_date\",\n                    \"Meeting Due Date\":\"meeting_due_date\",\n                    \"Company Name\":\"user_name\",\n                    \"App Name\": \"app_name\"\n                    }', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(117, 8, 'es', 'Se ha creado la nueva reunión {meeting_name} {nombre_usuario}.', '{\n                    \"Meeting Title\":\"meeting_name\",\n                    \"Meeting Start Date\":\"meeting_start_date\",\n                    \"Meeting Due Date\":\"meeting_due_date\",\n                    \"Company Name\":\"user_name\",\n                    \"App Name\": \"app_name\"\n                    }', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(118, 8, 'fr', 'Nouvelle réunion { meeting_name } créée par {Nom_utilisateur}.', '{\n                    \"Meeting Title\":\"meeting_name\",\n                    \"Meeting Start Date\":\"meeting_start_date\",\n                    \"Meeting Due Date\":\"meeting_due_date\",\n                    \"Company Name\":\"user_name\",\n                    \"App Name\": \"app_name\"\n                    }', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(119, 8, 'it', 'Nuova riunione {meeting_name} creata da {user_name}.', '{\n                    \"Meeting Title\":\"meeting_name\",\n                    \"Meeting Start Date\":\"meeting_start_date\",\n                    \"Meeting Due Date\":\"meeting_due_date\",\n                    \"Company Name\":\"user_name\",\n                    \"App Name\": \"app_name\"\n                    }', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(120, 8, 'ja', '新規ミーティング {meeting_name} が作成されました {ユーザー名}.', '{\n                    \"Meeting Title\":\"meeting_name\",\n                    \"Meeting Start Date\":\"meeting_start_date\",\n                    \"Meeting Due Date\":\"meeting_due_date\",\n                    \"Company Name\":\"user_name\",\n                    \"App Name\": \"app_name\"\n                    }', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(121, 8, 'nl', 'Nieuwe vergadering { meeting_naam } gemaakt door {gebruikersnaam}.', '{\n                    \"Meeting Title\":\"meeting_name\",\n                    \"Meeting Start Date\":\"meeting_start_date\",\n                    \"Meeting Due Date\":\"meeting_due_date\",\n                    \"Company Name\":\"user_name\",\n                    \"App Name\": \"app_name\"\n                    }', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(122, 8, 'pl', 'Nowe spotkanie {meeting_name } utworzone przez {nazwa_użytkownika}.', '{\n                    \"Meeting Title\":\"meeting_name\",\n                    \"Meeting Start Date\":\"meeting_start_date\",\n                    \"Meeting Due Date\":\"meeting_due_date\",\n                    \"Company Name\":\"user_name\",\n                    \"App Name\": \"app_name\"\n                    }', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(123, 8, 'ru', 'Создано новое собрание { meeting_name }, созданное {имя_пользователя}.', '{\n                    \"Meeting Title\":\"meeting_name\",\n                    \"Meeting Start Date\":\"meeting_start_date\",\n                    \"Meeting Due Date\":\"meeting_due_date\",\n                    \"Company Name\":\"user_name\",\n                    \"App Name\": \"app_name\"\n                    }', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(124, 8, 'pt', 'Novo Meeting {meeting_name} criado por {user_name}.', '{\n                    \"Meeting Title\":\"meeting_name\",\n                    \"Meeting Start Date\":\"meeting_start_date\",\n                    \"Meeting Due Date\":\"meeting_due_date\",\n                    \"Company Name\":\"user_name\",\n                    \"App Name\": \"app_name\"\n                    }', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47');
INSERT INTO `notification_template_langs` (`id`, `parent_id`, `lang`, `content`, `variables`, `created_by`, `created_at`, `updated_at`) VALUES
(125, 8, 'tr', '{user_name} tarafından oluşturulan {meeting_name} adlı yeni Toplantı.', '{\n                    \"Meeting Title\":\"meeting_name\",\n                    \"Meeting Start Date\":\"meeting_start_date\",\n                    \"Meeting Due Date\":\"meeting_due_date\",\n                    \"Company Name\":\"user_name\",\n                    \"App Name\": \"app_name\"\n                    }', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(126, 8, 'zh', '{user_name} 已创建新的会议 {meeting_name} 。', '{\n                    \"Meeting Title\":\"meeting_name\",\n                    \"Meeting Start Date\":\"meeting_start_date\",\n                    \"Meeting Due Date\":\"meeting_due_date\",\n                    \"Company Name\":\"user_name\",\n                    \"App Name\": \"app_name\"\n                    }', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(127, 8, 'he', 'פגישה חדשה {meeting_name} נוצרה על-ידי {user_name}.', '{\n                    \"Meeting Title\":\"meeting_name\",\n                    \"Meeting Start Date\":\"meeting_start_date\",\n                    \"Meeting Due Date\":\"meeting_due_date\",\n                    \"Company Name\":\"user_name\",\n                    \"App Name\": \"app_name\"\n                    }', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(128, 8, 'pt-br', 'Nova reunião {meeting_name} criada por {user_name}.', '{\n                    \"Meeting Title\":\"meeting_name\",\n                    \"Meeting Start Date\":\"meeting_start_date\",\n                    \"Meeting Due Date\":\"meeting_due_date\",\n                    \"Company Name\":\"user_name\",\n                    \"App Name\": \"app_name\"\n                    }', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47');

-- --------------------------------------------------------

--
-- Table structure for table `opportunities`
--

CREATE TABLE `opportunities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `campaign` int(11) NOT NULL DEFAULT 0,
  `name` varchar(191) DEFAULT NULL,
  `account` int(11) NOT NULL DEFAULT 0,
  `stage` int(11) NOT NULL DEFAULT 0,
  `amount` decimal(30,2) NOT NULL DEFAULT 0.00,
  `probability` varchar(191) DEFAULT NULL,
  `close_date` varchar(191) DEFAULT NULL,
  `contact` int(11) NOT NULL DEFAULT 0,
  `lead_source` varchar(191) DEFAULT NULL,
  `description` varchar(191) DEFAULT NULL,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `opportunities`
--

INSERT INTO `opportunities` (`id`, `user_id`, `campaign`, `name`, `account`, `stage`, `amount`, `probability`, `close_date`, `contact`, `lead_source`, `description`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 5, 1, 'Demo Opportunities', 1, 1, 100.00, '1', '2025-10-10', 1, '1', NULL, 3, '2025-10-08 01:37:19', '2025-10-10 01:34:32');

-- --------------------------------------------------------

--
-- Table structure for table `opportunities_stages`
--

CREATE TABLE `opportunities_stages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `opportunities_stages`
--

INSERT INTO `opportunities_stages` (`id`, `name`, `created_by`, `created_at`, `updated_at`) VALUES
(1, '25%', 3, '2024-04-07 15:47:39', '2024-04-07 15:47:39'),
(2, '50%', 3, '2024-04-07 15:47:47', '2024-04-07 15:47:47'),
(3, '75%', 3, '2024-04-07 15:47:54', '2024-04-07 15:48:01'),
(4, 'Won', 3, '2024-04-07 15:48:11', '2024-04-07 15:48:11');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` varchar(100) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `card_number` varchar(10) DEFAULT NULL,
  `card_exp_month` varchar(10) DEFAULT NULL,
  `card_exp_year` varchar(10) DEFAULT NULL,
  `plan_name` varchar(100) NOT NULL,
  `plan_id` int(11) NOT NULL,
  `price` decimal(30,2) NOT NULL DEFAULT 0.00,
  `price_currency` varchar(10) NOT NULL,
  `txn_id` varchar(100) NOT NULL,
  `payment_status` varchar(100) NOT NULL,
  `payment_type` varchar(100) NOT NULL,
  `receipt` varchar(191) DEFAULT NULL,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `is_refund` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `guard_name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Manage User', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(2, 'Create User', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(3, 'Edit User', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(4, 'Delete User', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(5, 'Show User', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(6, 'Manage Account', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(7, 'Edit Account', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(8, 'Delete Account', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(9, 'Show Account', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(10, 'Create Account', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(11, 'Create Contact', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(12, 'Show Contact', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(13, 'Edit Contact', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(14, 'Manage Contact', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(15, 'Delete Contact', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(16, 'Create Lead', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(17, 'Edit Lead', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(18, 'Show Lead', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(19, 'Manage Lead', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(20, 'Delete Lead', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(21, 'Delete Opportunities', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(22, 'Create Opportunities', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(23, 'Manage Opportunities', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(24, 'Edit Opportunities', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(25, 'Show Opportunities', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(26, 'Show CommonCase', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(27, 'Edit CommonCase', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(28, 'Create CommonCase', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(29, 'Delete CommonCase', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(30, 'Manage CommonCase', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(31, 'Create Meeting', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(32, 'Delete Meeting', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(33, 'Edit Meeting', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(34, 'Manage Meeting', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(35, 'Show Meeting', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(36, 'Show Call', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(37, 'Edit Call', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(38, 'Create Call', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(39, 'Delete Call', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(40, 'Manage Call', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(41, 'Show Task', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(42, 'Edit Task', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(43, 'Create Task', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(44, 'Manage Task', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(45, 'Delete Task', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(46, 'Show Document', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(47, 'Show Document', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(48, 'Edit Document', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(49, 'Create Document', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(50, 'Manage Document', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(51, 'Delete Document', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(52, 'Show Campaign', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(53, 'Edit Campaign', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(54, 'Delete Campaign', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(55, 'Create Campaign', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(56, 'Manage Campaign', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(57, 'Show Quote', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(58, 'Edit Quote', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(59, 'Create Quote', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(60, 'Manage Quote', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(61, 'Delete Quote', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(62, 'Create SalesOrder', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(63, 'Show SalesOrder', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(64, 'Edit SalesOrder', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(65, 'Delete SalesOrder', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(66, 'Manage SalesOrder', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(67, 'Create Invoice', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(68, 'Show Invoice', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(69, 'Edit Invoice', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(70, 'Delete Invoice', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(71, 'Manage Invoice', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(72, 'Create Product', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(73, 'Delete Product', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(74, 'Manage Product', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(75, 'Show Product', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(76, 'Edit Product', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(77, 'Create Report', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(78, 'Delete Report', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(79, 'Manage Report', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(80, 'Show Report', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(81, 'Edit Report', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(82, 'Edit Role', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(83, 'Delete Role', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(84, 'Manage Role', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(85, 'Create Role', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(86, 'Edit AccountType', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(87, 'Delete AccountType', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(88, 'Manage AccountType', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(89, 'Create AccountType', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(90, 'Edit AccountIndustry', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(91, 'Delete AccountIndustry', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(92, 'Manage AccountIndustry', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(93, 'Create AccountIndustry', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(94, 'Edit LeadSource', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(95, 'Delete LeadSource', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(96, 'Manage LeadSource', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(97, 'Create LeadSource', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(98, 'Edit OpportunitiesStage', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(99, 'Delete OpportunitiesStage', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(100, 'Manage OpportunitiesStage', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(101, 'Create OpportunitiesStage', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(102, 'Edit CaseType', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(103, 'Delete CaseType', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(104, 'Manage CaseType', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(105, 'Create CaseType', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(106, 'Edit DocumentType', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(107, 'Delete DocumentType', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(108, 'Manage DocumentType', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(109, 'Create DocumentType', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(110, 'Edit DocumentFolder', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(111, 'Delete DocumentFolder', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(112, 'Manage DocumentFolder', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(113, 'Create DocumentFolder', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(114, 'Edit CampaignType', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(115, 'Delete CampaignType', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(116, 'Manage CampaignType', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(117, 'Create CampaignType', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(118, 'Edit TargetList', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(119, 'Delete TargetList', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(120, 'Manage TargetList', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(121, 'Create TargetList', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(122, 'Edit ProductCategory', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(123, 'Delete ProductCategory', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(124, 'Manage ProductCategory', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(125, 'Create ProductCategory', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(126, 'Edit ProductBrand', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(127, 'Delete ProductBrand', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(128, 'Manage ProductBrand', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(129, 'Create ProductBrand', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(130, 'Edit ProductTax', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(131, 'Delete ProductTax', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(132, 'Manage ProductTax', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(133, 'Create ProductTax', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(134, 'Edit ShippingProvider', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(135, 'Delete ShippingProvider', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(136, 'Manage ShippingProvider', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(137, 'Create ShippingProvider', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(138, 'Edit TaskStage', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(139, 'Delete TaskStage', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(140, 'Manage TaskStage', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(141, 'Create TaskStage', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(142, 'Manage Plan', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(143, 'Create Plan', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(144, 'Edit Plan', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(145, 'Manage Order', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(146, 'Delete Coupon', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(147, 'Manage Coupon', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(148, 'Create Coupon', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(149, 'Edit Coupon', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(150, 'Manage Form Builder', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(151, 'Create Form Builder', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(152, 'Edit Form Builder', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(153, 'Delete Form Builder', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(154, 'Show Form Builder', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(155, 'Manage Form Field', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(156, 'Create Form Field', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(157, 'Edit Form Field', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(158, 'Delete Form Field', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(159, 'Manage ContractType', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(160, 'Create ContractType', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(161, 'Edit ContractType', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(162, 'Delete ContractType', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(163, 'Manage Contract', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(164, 'Create Contract', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(165, 'Edit Contract', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(166, 'Delete Contract', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(167, 'Manage Invoice Payments', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(168, 'copy contract', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(169, 'Show Contract', 'web', '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(170, 'Manage Payment', 'web', '2024-04-04 13:53:54', '2024-04-04 13:53:54'),
(171, 'Create Payment', 'web', '2024-04-04 13:53:54', '2024-04-04 13:53:54'),
(172, 'Edit Payment', 'web', '2024-04-04 13:53:54', '2024-04-04 13:53:54'),
(173, 'Delete Payment', 'web', '2024-04-04 13:53:54', '2024-04-04 13:53:54'),
(174, 'Manage Invoice Payment', 'web', '2024-04-04 13:53:54', '2024-04-04 13:53:54'),
(175, 'Create Invoice Payment', 'web', '2024-04-04 13:53:54', '2024-04-04 13:53:54'),
(176, 'Manage Yard', 'web', '2025-10-20 22:00:42', '2025-10-20 22:00:48'),
(177, 'Create Yard', 'web', '2025-10-20 22:00:52', '2025-10-20 22:00:55'),
(178, 'Edit Yard', 'web', '2025-10-20 22:01:04', '2025-10-20 22:01:04'),
(179, 'Delete Yard', 'web', '2025-10-20 22:01:04', '2025-10-20 22:01:04'),
(180, 'Show Yard', 'web', '2025-10-20 22:05:29', '2025-10-20 22:05:29');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 3, 'auth_token', 'e18fbdae9d6f8d416b7ef997df11f9eaa21f57b1f07fe2765e263f328858e67b', '[\"*\"]', NULL, NULL, '2025-10-03 04:53:08', '2025-10-03 04:53:08');

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE `plans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` decimal(30,2) DEFAULT 0.00,
  `duration` varchar(100) NOT NULL,
  `storage_limit` double(8,2) NOT NULL DEFAULT 0.00,
  `max_user` int(11) NOT NULL DEFAULT 0,
  `max_account` int(11) NOT NULL DEFAULT 0,
  `max_contact` int(11) NOT NULL DEFAULT 0,
  `trial` int(11) NOT NULL DEFAULT 0,
  `trial_days` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `enable_chatgpt` varchar(191) NOT NULL DEFAULT 'off',
  `image` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`id`, `name`, `price`, `duration`, `storage_limit`, `max_user`, `max_account`, `max_contact`, `trial`, `trial_days`, `description`, `status`, `enable_chatgpt`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Free Plan', 0.00, 'lifetime', -1.00, -1, -1, -1, 0, NULL, NULL, 1, 'on', 'free_plan.png', '2024-04-04 13:40:47', '2024-04-04 14:28:43');

-- --------------------------------------------------------

--
-- Table structure for table `plan_requests`
--

CREATE TABLE `plan_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `plan_id` int(11) NOT NULL DEFAULT 0,
  `duration` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `year` varchar(191) NOT NULL DEFAULT '2020',
  `make` varchar(191) DEFAULT NULL,
  `model` varchar(191) DEFAULT NULL,
  `part_name` varchar(191) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `year`, `make`, `model`, `part_name`, `is_active`, `created_at`, `updated_at`) VALUES
(1, '2020', 'Honda', 'M1', 'Engine', 1, '2025-10-20 09:44:19', '2025-10-20 09:44:19'),
(2, '2002', 'Maruti', 'M22', 'Breakk', 1, '2025-10-20 04:34:56', '2025-10-20 04:35:41');

-- --------------------------------------------------------

--
-- Table structure for table `product_brands`
--

CREATE TABLE `product_brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_brands`
--

INSERT INTO `product_brands` (`id`, `name`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'S-POS +', 3, '2024-04-07 15:44:26', '2024-04-07 15:44:26');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `name`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'POS', 3, '2024-04-07 15:44:09', '2024-04-07 15:44:09');

-- --------------------------------------------------------

--
-- Table structure for table `product_taxes`
--

CREATE TABLE `product_taxes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tax_name` varchar(191) DEFAULT NULL,
  `rate` double(8,2) NOT NULL DEFAULT 0.00,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_taxes`
--

INSERT INTO `product_taxes` (`id`, `tax_name`, `rate`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'SPOS +', 18.00, 3, '2024-04-07 15:45:01', '2024-04-07 15:45:01');

-- --------------------------------------------------------

--
-- Table structure for table `quotes`
--

CREATE TABLE `quotes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quote_id` int(11) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `lead_id` int(11) DEFAULT NULL,
  `name` varchar(191) DEFAULT NULL,
  `opportunity` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0,
  `account` int(11) NOT NULL DEFAULT 0,
  `amount` decimal(30,2) NOT NULL DEFAULT 0.00,
  `date_quoted` date NOT NULL,
  `quote_number` int(11) NOT NULL DEFAULT 0,
  `billing_address` text DEFAULT NULL,
  `billing_city` varchar(191) DEFAULT NULL,
  `billing_state` varchar(191) DEFAULT NULL,
  `billing_country` varchar(191) DEFAULT NULL,
  `billing_postalcode` varchar(191) DEFAULT '0',
  `shipping_address` text DEFAULT NULL,
  `shipping_city` varchar(191) DEFAULT NULL,
  `shipping_state` varchar(191) DEFAULT NULL,
  `shipping_country` varchar(191) DEFAULT NULL,
  `shipping_postalcode` varchar(191) DEFAULT '0',
  `billing_contact` int(11) NOT NULL DEFAULT 0,
  `shipping_contact` int(11) NOT NULL DEFAULT 0,
  `tax` varchar(191) NOT NULL DEFAULT '0',
  `shipping_provider` varchar(191) NOT NULL,
  `description` varchar(191) DEFAULT NULL,
  `converted_salesorder_id` int(11) NOT NULL DEFAULT 0,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quotes`
--

INSERT INTO `quotes` (`id`, `quote_id`, `user_id`, `lead_id`, `name`, `opportunity`, `status`, `account`, `amount`, `date_quoted`, `quote_number`, `billing_address`, `billing_city`, `billing_state`, `billing_country`, `billing_postalcode`, `shipping_address`, `shipping_city`, `shipping_state`, `shipping_country`, `shipping_postalcode`, `billing_contact`, `shipping_contact`, `tax`, `shipping_provider`, `description`, `converted_salesorder_id`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 1, 0, NULL, 'Demo Quote', 1, 0, 1, 0.00, '2025-10-08', 10, 'Pune', 'Pune', 'Pune', 'Pune', 'Pune', 'Pune', 'Pune', 'Pune', 'Pune', '32', 0, 0, '0', '1', NULL, 1, 3, '2025-10-08 01:43:31', '2025-10-08 05:42:00'),
(2, 2, 0, NULL, 'Demo Quote', 1, 1, 1, 0.00, '2025-10-08', 10, 'Pune', 'Pune', 'Pune', 'Pune', 'Pune', 'Pune', 'Pune', 'Pune', 'Pune', '32', 0, 0, '0', '1', NULL, 0, 3, '2025-10-08 01:47:13', '2025-10-08 01:47:13'),
(3, 3, 0, NULL, 'Demo Quote', 1, 1, 1, 0.00, '2025-10-08', 10, 'Pune', 'Pune', 'Pune', 'Pune', 'Pune', 'Pune', 'Pune', 'Pune', 'Pune', '32', 0, 0, '0', '1', NULL, 0, 3, '2025-10-08 01:47:35', '2025-10-08 01:47:35'),
(4, 4, 0, NULL, 'Test Quote', 1, 0, 1, 0.00, '2025-10-08', 111, 'Pune', 'Pune', 'Pune', 'Pune', 'Pune', 'Pune', 'Pune', 'Pune', 'Pune', '32', 1, 1, '0', '1', 'test', 0, 3, '2025-10-08 05:32:24', '2025-10-08 05:32:24'),
(5, 5, 0, 12, 'Test Quote Lead', 0, 0, 0, 0.00, '2025-10-10', 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '0', '1', NULL, 0, 3, '2025-10-10 04:41:45', '2025-10-10 05:22:29'),
(6, 6, 0, 12, 'Test Quote Lead', 0, 0, 0, 0.00, '2025-10-10', 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '0', '1', NULL, 0, 3, '2025-10-10 05:25:32', '2025-10-10 05:25:32');

-- --------------------------------------------------------

--
-- Table structure for table `quote_items`
--

CREATE TABLE `quote_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quote_id` int(11) NOT NULL DEFAULT 0,
  `item` varchar(191) DEFAULT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `price` decimal(30,2) NOT NULL DEFAULT 0.00,
  `discount` double(8,2) NOT NULL DEFAULT 0.00,
  `tax` varchar(191) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `name` varchar(191) DEFAULT NULL,
  `entity_type` varchar(191) DEFAULT NULL,
  `group_by` varchar(191) DEFAULT NULL,
  `chart_type` varchar(191) DEFAULT NULL,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `user_id`, `name`, `entity_type`, `group_by`, `chart_type`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 4, 'Test Report', 'leads', 'status', 'pie', 3, '2025-10-08 06:50:02', '2025-10-11 02:03:30'),
(2, 4, 'yyyy', 'products', 'category', 'line', 3, '2025-10-11 02:04:24', '2025-10-11 02:04:24');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `guard_name` varchar(191) NOT NULL,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'super admin', 'web', 0, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(2, 'owner', 'web', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(3, 'User', 'web', 3, '2024-04-04 14:10:47', '2024-04-04 14:10:47'),
(4, 'Admin', 'web', 3, '2024-04-04 14:16:58', '2024-04-04 14:16:58'),
(5, 'Branch Director', 'web', 3, '2025-08-17 07:25:44', '2025-08-17 07:25:44'),
(6, 'Sales Agent', 'web', 3, '2025-10-20 04:23:46', '2025-10-20 04:24:15'),
(7, 'Source Agent', 'web', 3, '2025-10-20 04:25:16', '2025-10-20 04:25:16');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(2, 1),
(2, 2),
(2, 3),
(2, 4),
(3, 1),
(3, 2),
(3, 3),
(3, 4),
(4, 1),
(4, 2),
(4, 4),
(5, 1),
(5, 2),
(5, 3),
(5, 4),
(6, 2),
(6, 4),
(6, 5),
(7, 2),
(7, 4),
(8, 2),
(8, 4),
(9, 2),
(9, 4),
(9, 5),
(10, 2),
(10, 4),
(10, 5),
(11, 2),
(11, 4),
(11, 5),
(12, 2),
(12, 4),
(12, 5),
(13, 2),
(13, 4),
(14, 2),
(14, 4),
(14, 5),
(15, 2),
(15, 4),
(16, 2),
(16, 3),
(16, 4),
(16, 5),
(16, 6),
(17, 2),
(17, 3),
(17, 4),
(17, 6),
(18, 2),
(18, 3),
(18, 4),
(18, 5),
(18, 6),
(19, 2),
(19, 3),
(19, 4),
(19, 5),
(19, 6),
(20, 2),
(20, 3),
(20, 4),
(21, 2),
(21, 4),
(22, 2),
(22, 4),
(22, 5),
(23, 2),
(23, 4),
(23, 5),
(24, 2),
(24, 4),
(25, 2),
(25, 4),
(25, 5),
(26, 2),
(26, 4),
(26, 5),
(27, 2),
(27, 4),
(28, 2),
(28, 4),
(28, 5),
(29, 2),
(29, 4),
(30, 2),
(30, 4),
(30, 5),
(31, 2),
(31, 4),
(31, 5),
(32, 2),
(32, 4),
(33, 2),
(33, 4),
(34, 2),
(34, 4),
(34, 5),
(35, 2),
(35, 4),
(35, 5),
(36, 2),
(36, 4),
(36, 5),
(37, 2),
(37, 4),
(38, 2),
(38, 4),
(38, 5),
(39, 2),
(39, 4),
(40, 2),
(40, 4),
(40, 5),
(41, 2),
(41, 4),
(41, 5),
(42, 2),
(42, 4),
(43, 2),
(43, 4),
(43, 5),
(44, 2),
(44, 4),
(44, 5),
(45, 2),
(45, 4),
(46, 2),
(46, 4),
(46, 5),
(48, 2),
(48, 4),
(49, 2),
(49, 4),
(49, 5),
(50, 2),
(50, 4),
(50, 5),
(51, 2),
(51, 4),
(52, 2),
(52, 4),
(52, 5),
(53, 2),
(53, 4),
(54, 2),
(54, 4),
(55, 2),
(55, 4),
(55, 5),
(56, 2),
(56, 4),
(56, 5),
(57, 2),
(57, 4),
(57, 5),
(58, 2),
(58, 4),
(59, 2),
(59, 4),
(59, 5),
(60, 2),
(60, 4),
(60, 5),
(61, 2),
(61, 4),
(62, 2),
(62, 4),
(62, 5),
(62, 6),
(62, 7),
(63, 2),
(63, 4),
(63, 5),
(63, 6),
(63, 7),
(64, 2),
(64, 4),
(64, 6),
(64, 7),
(65, 2),
(65, 4),
(65, 7),
(66, 2),
(66, 4),
(66, 5),
(66, 6),
(66, 7),
(67, 2),
(67, 4),
(67, 5),
(68, 2),
(68, 4),
(68, 5),
(69, 2),
(69, 4),
(70, 2),
(70, 4),
(71, 2),
(71, 4),
(71, 5),
(72, 2),
(72, 4),
(72, 5),
(72, 6),
(73, 2),
(73, 4),
(73, 6),
(74, 2),
(74, 4),
(74, 5),
(74, 6),
(75, 2),
(75, 4),
(75, 5),
(75, 6),
(76, 2),
(76, 4),
(76, 6),
(77, 2),
(78, 2),
(79, 2),
(80, 2),
(81, 2),
(82, 2),
(82, 4),
(83, 2),
(83, 4),
(84, 2),
(84, 4),
(85, 2),
(85, 4),
(86, 2),
(86, 4),
(87, 2),
(87, 4),
(88, 2),
(88, 4),
(88, 5),
(89, 2),
(89, 4),
(89, 5),
(90, 2),
(90, 4),
(91, 2),
(91, 4),
(92, 2),
(92, 4),
(92, 5),
(93, 2),
(93, 4),
(93, 5),
(94, 2),
(94, 4),
(95, 2),
(95, 4),
(96, 2),
(96, 4),
(96, 5),
(97, 2),
(97, 4),
(97, 5),
(98, 2),
(98, 4),
(99, 2),
(99, 4),
(100, 2),
(100, 4),
(100, 5),
(101, 2),
(101, 4),
(101, 5),
(102, 2),
(102, 4),
(103, 2),
(103, 4),
(104, 2),
(104, 4),
(104, 5),
(105, 2),
(105, 4),
(105, 5),
(106, 2),
(106, 4),
(107, 2),
(107, 4),
(108, 2),
(108, 4),
(108, 5),
(109, 2),
(109, 4),
(109, 5),
(110, 2),
(110, 4),
(111, 2),
(111, 4),
(112, 2),
(112, 4),
(112, 5),
(113, 2),
(113, 4),
(113, 5),
(114, 2),
(114, 4),
(115, 2),
(115, 4),
(116, 2),
(116, 4),
(116, 5),
(117, 2),
(117, 4),
(117, 5),
(118, 2),
(118, 4),
(119, 2),
(119, 4),
(120, 2),
(120, 4),
(120, 5),
(121, 2),
(121, 4),
(121, 5),
(122, 2),
(122, 4),
(123, 2),
(123, 4),
(124, 2),
(124, 4),
(124, 5),
(125, 2),
(125, 4),
(125, 5),
(126, 2),
(126, 4),
(127, 2),
(127, 4),
(128, 2),
(128, 4),
(128, 5),
(129, 2),
(129, 4),
(129, 5),
(130, 2),
(130, 4),
(131, 2),
(131, 4),
(132, 2),
(132, 4),
(132, 5),
(133, 2),
(133, 4),
(133, 5),
(134, 2),
(134, 4),
(135, 2),
(135, 4),
(136, 2),
(136, 4),
(136, 5),
(137, 2),
(137, 4),
(137, 5),
(138, 2),
(138, 4),
(139, 2),
(139, 4),
(140, 2),
(140, 4),
(140, 5),
(141, 2),
(141, 4),
(141, 5),
(142, 1),
(142, 2),
(143, 1),
(144, 1),
(145, 1),
(145, 2),
(147, 1),
(148, 1),
(149, 1),
(150, 2),
(150, 4),
(150, 5),
(151, 2),
(151, 4),
(151, 5),
(152, 2),
(152, 4),
(153, 2),
(153, 4),
(154, 2),
(154, 4),
(154, 5),
(155, 2),
(156, 2),
(157, 2),
(158, 2),
(159, 2),
(159, 4),
(159, 5),
(160, 2),
(160, 4),
(160, 5),
(161, 2),
(161, 4),
(162, 2),
(162, 4),
(163, 2),
(163, 4),
(163, 5),
(164, 2),
(164, 4),
(164, 5),
(165, 2),
(165, 4),
(166, 2),
(166, 4),
(167, 2),
(168, 2),
(169, 2),
(169, 4),
(169, 5),
(170, 2),
(170, 4),
(170, 5),
(171, 2),
(171, 4),
(171, 5),
(172, 2),
(172, 4),
(173, 2),
(173, 4),
(174, 2),
(174, 4),
(174, 5),
(175, 2),
(175, 4),
(175, 5),
(176, 3),
(176, 4),
(176, 5),
(177, 3),
(177, 4),
(177, 5),
(178, 3),
(178, 4),
(178, 5),
(179, 3),
(179, 4),
(179, 5),
(180, 3),
(180, 4),
(180, 5);

-- --------------------------------------------------------

--
-- Table structure for table `sales_orders`
--

CREATE TABLE `sales_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sale_date` date DEFAULT NULL,
  `sale_status` varchar(191) DEFAULT NULL,
  `lead_id` bigint(20) UNSIGNED DEFAULT NULL,
  `yard_id` bigint(20) UNSIGNED DEFAULT NULL,
  `sales_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `source_id` bigint(20) UNSIGNED DEFAULT NULL,
  `source_date` date DEFAULT NULL,
  `vin_number` varchar(191) DEFAULT NULL,
  `part_number` varchar(191) DEFAULT NULL,
  `part_type` varchar(191) DEFAULT NULL,
  `source_type` varchar(191) DEFAULT NULL,
  `billing_address_text` text DEFAULT NULL,
  `billing_country` varchar(191) DEFAULT NULL,
  `billing_state` varchar(191) DEFAULT NULL,
  `billing_city` varchar(191) DEFAULT NULL,
  `shipping_address_text` text DEFAULT NULL,
  `shipping_country` varchar(191) DEFAULT NULL,
  `shipping_state` varchar(191) DEFAULT NULL,
  `shipping_city` varchar(191) DEFAULT NULL,
  `payment_gateway_name` varchar(191) DEFAULT NULL,
  `name_on_card` varchar(191) DEFAULT NULL,
  `card_number` varchar(191) DEFAULT NULL,
  `expiration` varchar(191) DEFAULT NULL,
  `cvv_number` varchar(191) DEFAULT NULL,
  `part_price` decimal(15,2) DEFAULT NULL,
  `shipping_price` decimal(15,2) DEFAULT NULL,
  `gross_profit` decimal(15,2) DEFAULT NULL,
  `charge_amount` decimal(15,2) DEFAULT NULL,
  `total_amount_quoted` decimal(15,2) DEFAULT NULL,
  `agent_note` text DEFAULT NULL,
  `yard_order_date` date DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `card_used` varchar(191) DEFAULT NULL,
  `tracking_no` varchar(191) DEFAULT NULL,
  `delivery_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales_orders`
--

INSERT INTO `sales_orders` (`id`, `sale_date`, `sale_status`, `lead_id`, `yard_id`, `sales_user_id`, `source_id`, `source_date`, `vin_number`, `part_number`, `part_type`, `source_type`, `billing_address_text`, `billing_country`, `billing_state`, `billing_city`, `shipping_address_text`, `shipping_country`, `shipping_state`, `shipping_city`, `payment_gateway_name`, `name_on_card`, `card_number`, `expiration`, `cvv_number`, `part_price`, `shipping_price`, `gross_profit`, `charge_amount`, `total_amount_quoted`, `agent_note`, `yard_order_date`, `comment`, `card_used`, `tracking_no`, `delivery_date`, `created_at`, `updated_at`) VALUES
(1, '2025-10-20', 'Completed', 1, 2, 10, 11, '2025-10-21', '22', '1111', 'electronic', '5', 'Pune', 'India', 'Mahashtra', 'Pune', 'Mumbai', 'India', 'Maharashtra', 'Mumbai', 'card', 'Puja', '1234', '11/29', '101', 1000.00, 100.00, 100.00, 50.00, 1150.00, 'dsfsdfasdf', '2025-10-22', NULL, 'wwwwwwwwwwww', NULL, '2025-10-24', '2025-10-20 07:36:35', '2025-10-20 21:09:23');

-- --------------------------------------------------------

--
-- Table structure for table `sales_order_items`
--

CREATE TABLE `sales_order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_id` int(11) NOT NULL DEFAULT 0,
  `salesorder_id` int(11) NOT NULL DEFAULT 0,
  `item` varchar(191) DEFAULT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `price` decimal(30,2) NOT NULL DEFAULT 0.00,
  `discount` double(8,2) NOT NULL DEFAULT 0.00,
  `tax` varchar(191) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sales_return`
--

CREATE TABLE `sales_return` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT 0,
  `lead_id` int(11) DEFAULT 0,
  `salesorder_id` int(11) DEFAULT 0,
  `salesreturn_id` int(11) DEFAULT 0,
  `request_type` varchar(191) DEFAULT '0',
  `refund_amount` decimal(30,2) DEFAULT NULL,
  `reason` text DEFAULT NULL,
  `return_date` date NOT NULL,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales_return`
--

INSERT INTO `sales_return` (`id`, `user_id`, `lead_id`, `salesorder_id`, `salesreturn_id`, `request_type`, `refund_amount`, `reason`, `return_date`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 3, NULL, 2, 1, '1', 1230.00, 'eteererwe', '2025-10-17', 3, '2025-10-17 05:43:56', '2025-10-17 05:43:56'),
(2, 3, NULL, 3, 2, '2', 4562.00, 'Reason sdfdfsdsdfsdfsd', '2025-10-18', 3, '2025-10-18 04:38:26', '2025-10-18 05:01:20');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `value` varchar(191) DEFAULT NULL,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `value`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'local_storage_validation', 'jpg,jpeg,png,xlsx,xls,csv,pdf', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(2, 'wasabi_storage_validation', 'jpg,jpeg,png,xlsx,xls,csv,pdf', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(3, 's3_storage_validation', 'jpg,jpeg,png,xlsx,xls,csv,pdf', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(4, 'local_storage_max_upload_size', '2048000', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(5, 'wasabi_max_upload_size', '2048000', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(6, 's3_max_upload_size', '2048000', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(7, 'title_text', NULL, 1, NULL, NULL),
(8, 'footer_text', NULL, 1, NULL, NULL),
(9, 'default_language', 'en', 1, NULL, NULL),
(10, 'verified_button', 'off', 1, NULL, NULL),
(11, 'signup_button', 'off', 1, NULL, NULL),
(12, 'color', '#ff9200', 1, NULL, NULL),
(13, 'custom_color', '#ff9200', 1, NULL, NULL),
(14, 'color_flag', 'true', 1, NULL, NULL),
(15, 'cust_theme_bg', 'on', 1, NULL, NULL),
(16, 'display_landing_page', 'off', 1, NULL, NULL),
(17, 'gdpr_cookie', 'off', 1, NULL, NULL),
(18, 'cust_darklayout', 'off', 1, NULL, NULL),
(19, 'SITE_RTL', 'off', 1, NULL, NULL),
(46, 'site_currency', 'INR', 3, '2024-04-07 16:01:03', '2024-04-07 16:01:03'),
(47, 'site_currency_symbol', '₹', 3, '2024-04-07 16:01:03', '2024-04-07 16:01:03'),
(48, 'site_currency_symbol_position', 'pre', 3, '2024-04-07 16:01:03', '2024-04-07 16:01:03'),
(49, 'site_date_format', 'M j, Y', 3, '2024-04-07 16:01:03', '2024-04-07 16:01:03'),
(50, 'site_time_format', 'g:i A', 3, '2024-04-07 16:01:03', '2024-04-07 16:01:03'),
(51, 'quote_prefix', '#QUO', 3, '2024-04-07 16:01:03', '2024-04-07 16:01:03'),
(52, 'salesorder_prefix', '#SOP', 3, '2024-04-07 16:01:03', '2024-04-07 16:01:03'),
(53, 'invoice_prefix', '#INV', 3, '2024-04-07 16:01:03', '2024-04-07 16:01:03'),
(54, 'footer_title', NULL, 3, '2024-04-07 16:01:03', '2024-04-07 16:01:03'),
(55, 'shipping_display', 'on', 3, '2024-04-07 16:01:03', '2024-04-07 16:01:03'),
(56, 'footer_notes', NULL, 3, '2024-04-07 16:01:03', '2024-04-07 16:01:03'),
(68, 'company_logo_light', '3_logo-light.png', 3, NULL, NULL),
(69, 'title_text', NULL, 3, NULL, NULL),
(70, 'default_owner_language', 'en', 3, NULL, NULL),
(71, 'color', '#ff9200', 3, NULL, NULL),
(72, 'custom_color', '#ff9200', 3, NULL, NULL),
(73, 'color_flag', 'true', 3, NULL, NULL),
(74, 'cust_theme_bg', 'on', 3, NULL, NULL),
(75, 'display_landing_page', 'off', 3, NULL, NULL),
(76, 'gdpr_cookie', 'off', 3, NULL, NULL),
(77, 'signup_button', 'off', 3, NULL, NULL),
(78, 'cust_darklayout', 'off', 3, NULL, NULL),
(79, 'SITE_RTL', 'off', 3, NULL, NULL),
(80, 'company_logo_dark', '3_logo-dark.png', 3, NULL, NULL),
(92, 'company_favicon', '3_favicon.png', 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shipping_providers`
--

CREATE TABLE `shipping_providers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `website` varchar(191) DEFAULT NULL,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shipping_providers`
--

INSERT INTO `shipping_providers` (`id`, `name`, `website`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'NA', NULL, 3, '2024-04-07 15:55:26', '2024-04-07 15:55:26');

-- --------------------------------------------------------

--
-- Table structure for table `streams`
--

CREATE TABLE `streams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `log_type` varchar(191) DEFAULT NULL,
  `file_upload` varchar(191) DEFAULT NULL,
  `remark` text DEFAULT NULL,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `streams`
--

INSERT INTO `streams` (`id`, `user_id`, `log_type`, `file_upload`, `remark`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 3, 'created', NULL, '{\"owner_name\":\"shubham@extraaaz.com\",\"title\":\"user\",\"stream_comment\":\"\",\"user_name\":\"Mahesh Zemase\"}', 3, '2024-04-04 14:12:23', '2024-04-04 14:12:23'),
(2, 3, 'created', NULL, '{\"owner_name\":\"shubham@extraaaz.com\",\"title\":\"user\",\"stream_comment\":\"\",\"user_name\":\"Yuvraj Shelke\"}', 3, '2024-04-04 14:14:33', '2024-04-04 14:14:33'),
(3, 3, 'created', NULL, '{\"owner_name\":\"shubham@extraaaz.com\",\"title\":\"user\",\"stream_comment\":\"\",\"user_name\":\"Yogesh Salve\"}', 3, '2024-04-04 14:17:58', '2024-04-04 14:17:58'),
(4, 6, 'created', NULL, '{\"owner_name\":\"Yogesh\",\"title\":\"contact\",\"stream_comment\":\"\",\"user_name\":\"Mahesh Zemase\"}', 3, '2024-04-06 05:51:53', '2024-04-06 05:51:53'),
(5, 3, 'created', NULL, '{\"owner_name\":\"shubham@extraaaz.com\",\"title\":\"user\",\"stream_comment\":\"\",\"user_name\":\"Pallavi Kiran Jagdhane\"}', 3, '2025-08-17 07:31:35', '2025-08-17 07:31:35'),
(6, 3, 'created', NULL, '{\"owner_name\":\"shubham@extraaaz.com\",\"title\":\"user\",\"stream_comment\":\"\",\"user_name\":\"Jagjeet Bhatia\"}', 3, '2025-08-23 08:41:40', '2025-08-23 08:41:40'),
(7, 3, 'created', NULL, '{\"owner_name\":\"shubham@extraaaz.com\",\"title\":\"user\",\"stream_comment\":\"\",\"user_name\":\"Sujata Bhandarkar\"}', 3, '2025-09-08 15:50:59', '2025-09-08 15:50:59'),
(8, 1, 'created', NULL, '{\"owner_name\":\"Website Form\",\"title\":\"lead\",\"stream_comment\":\"Lead created from website form: contact\",\"user_name\":\"Sujata Bhandarkar\"}', 3, '2025-09-11 21:30:50', '2025-09-11 21:30:50'),
(9, 1, 'created', NULL, '{\"owner_name\":\"Website Form\",\"title\":\"lead\",\"stream_comment\":\"Lead created from website form: contact\",\"user_name\":\"Amul Mayo\"}', 3, '2025-09-11 21:31:15', '2025-09-11 21:31:15'),
(10, 1, 'created', NULL, '{\"owner_name\":\"Website Form\",\"title\":\"lead\",\"stream_comment\":\"Lead created from website form: partner\",\"user_name\":\"Shubham\"}', 3, '2025-09-11 21:40:09', '2025-09-11 21:40:09'),
(11, 3, 'created', NULL, '{\"owner_name\":\"shubham@extraaaz.com\",\"title\":\"lead\",\"stream_comment\":\"\",\"user_name\":\"Test Api Lead\"}', 3, '2025-10-06 00:44:52', '2025-10-06 00:44:52'),
(12, 3, 'created', NULL, '{\"owner_name\":\"shubham@extraaaz.com\",\"title\":\"lead\",\"stream_comment\":\"\",\"user_name\":\"Test Api Lead\"}', 3, '2025-10-06 00:45:13', '2025-10-06 00:45:13'),
(13, 3, 'created', NULL, '{\"owner_name\":\"shubham@extraaaz.com\",\"title\":\"lead\",\"stream_comment\":\"\",\"user_name\":\"New Test Api Lead\"}', 3, '2025-10-06 00:46:42', '2025-10-06 00:46:42'),
(14, 3, 'created', NULL, '{\"owner_name\":\"shubham@extraaaz.com\",\"title\":\"lead\",\"stream_comment\":\"\",\"user_name\":\"rrrrrrrrrrr\"}', 3, '2025-10-06 03:06:57', '2025-10-06 03:06:57'),
(15, 3, 'created', NULL, '{\"owner_name\":\"shubham@extraaaz.com\",\"title\":\"lead\",\"stream_comment\":\"\",\"user_name\":\"rrrrrr\"}', 3, '2025-10-06 03:07:36', '2025-10-06 03:07:36'),
(16, 3, 'created', NULL, '{\"owner_name\":\"shubham@extraaaz.com\",\"title\":\"account\",\"stream_comment\":\"\",\"user_name\":\"Test By Puja\"}', 3, '2025-10-06 03:41:19', '2025-10-06 03:41:19'),
(17, 3, 'updated', NULL, '{\"owner_name\":\"shubham@extraaaz.com\",\"title\":\"account\",\"stream_comment\":\"\",\"user_name\":\"Test By Puja\"}', 3, '2025-10-08 01:28:28', '2025-10-08 01:28:28'),
(18, 3, 'created', NULL, '{\"owner_name\":\"shubham@extraaaz.com\",\"title\":\"opportunities\",\"stream_comment\":\"\",\"user_name\":\"Demo Opportunities\"}', 3, '2025-10-08 01:37:19', '2025-10-08 01:37:19'),
(19, 3, 'created', NULL, '{\"owner_name\":\"shubham@extraaaz.com\",\"title\":\"product\",\"stream_comment\":\"\",\"user_name\":\"Printer\"}', 3, '2025-10-08 01:39:54', '2025-10-08 01:39:54'),
(20, 3, 'created', NULL, '{\"owner_name\":\"shubham@extraaaz.com\",\"title\":\"quote\",\"stream_comment\":\"\",\"user_name\":\"Demo Quote\"}', 3, '2025-10-08 01:43:32', '2025-10-08 01:43:32'),
(21, 3, 'created', NULL, '{\"owner_name\":\"shubham@extraaaz.com\",\"title\":\"quote\",\"stream_comment\":\"\",\"user_name\":\"Demo Quote\"}', 3, '2025-10-08 01:47:13', '2025-10-08 01:47:13'),
(22, 3, 'created', NULL, '{\"owner_name\":\"shubham@extraaaz.com\",\"title\":\"quote\",\"stream_comment\":\"\",\"user_name\":\"Demo Quote\"}', 3, '2025-10-08 01:47:35', '2025-10-08 01:47:35'),
(23, 3, 'created', NULL, '{\"owner_name\":\"shubham@extraaaz.com\",\"title\":\"quote\",\"stream_comment\":\"\",\"user_name\":\"Test Quote\"}', 3, '2025-10-08 05:32:25', '2025-10-08 05:32:25'),
(24, 3, 'created', NULL, '{\"owner_name\":\"shubham@extraaaz.com\",\"title\":\"salesorder\",\"stream_comment\":\"\",\"user_name\":\"Demo Quote\"}', 3, '2025-10-08 05:42:00', '2025-10-08 05:42:00'),
(25, 3, 'created', NULL, '{\"owner_name\":\"shubham@extraaaz.com\",\"title\":\"invoice\",\"stream_comment\":\"\",\"user_name\":\"Rahul\"}', 3, '2025-10-08 05:59:47', '2025-10-08 05:59:47'),
(26, 3, 'created', NULL, '{\"owner_name\":\"shubham@extraaaz.com\",\"title\":\"invoice\",\"stream_comment\":\"\",\"user_name\":\"Rahul\"}', 3, '2025-10-08 06:02:17', '2025-10-08 06:02:17'),
(27, 3, 'created', NULL, '{\"owner_name\":\"shubham@extraaaz.com\",\"title\":\"commoncase\",\"stream_comment\":\"\",\"user_name\":\"Ela\"}', 3, '2025-10-08 06:07:18', '2025-10-08 06:07:18'),
(28, 3, 'created', NULL, '{\"owner_name\":\"shubham@extraaaz.com\",\"title\":\"task\",\"stream_comment\":\"\",\"user_name\":\"Task\"}', 3, '2025-10-08 06:12:46', '2025-10-08 06:12:46'),
(29, 3, 'created', NULL, '{\"owner_name\":\"shubham@extraaaz.com\",\"title\":\"task\",\"stream_comment\":\"\",\"user_name\":\"Task\"}', 3, '2025-10-08 06:14:30', '2025-10-08 06:14:30'),
(30, 3, 'created', NULL, '{\"owner_name\":\"shubham@extraaaz.com\",\"title\":\"meeting\",\"stream_comment\":\"\",\"user_name\":\"Test\"}', 3, '2025-10-08 06:27:41', '2025-10-08 06:27:41'),
(31, 3, 'updated', NULL, '{\"owner_name\":\"shubham@extraaaz.com\",\"title\":\"meeting\",\"stream_comment\":\"\",\"user_name\":\"Test Meeting\"}', 3, '2025-10-08 06:32:07', '2025-10-08 06:32:07'),
(32, 3, 'created', NULL, '{\"owner_name\":\"shubham@extraaaz.com\",\"title\":\"call\",\"stream_comment\":\"\",\"user_name\":\"Test Call\"}', 3, '2025-10-08 06:32:58', '2025-10-08 06:32:58'),
(33, 3, 'created', NULL, '{\"owner_name\":\"shubham@extraaaz.com\",\"title\":\"document\",\"stream_comment\":\"\",\"user_name\":\"doc 1\"}', 3, '2025-10-08 06:42:10', '2025-10-08 06:42:10'),
(34, 3, 'created', NULL, '{\"owner_name\":\"shubham@extraaaz.com\",\"title\":\"campaign\",\"stream_comment\":\"\",\"user_name\":\"Test Campaign\"}', 3, '2025-10-08 23:39:00', '2025-10-08 23:39:00'),
(35, 3, 'updated', NULL, '{\"owner_name\":\"shubham@extraaaz.com\",\"title\":\"account\",\"stream_comment\":\"\",\"user_name\":\"Sales Department\"}', 3, '2025-10-09 04:28:19', '2025-10-09 04:28:19'),
(36, 3, 'created', NULL, '{\"owner_name\":\"shubham@extraaaz.com\",\"title\":\"contact\",\"stream_comment\":\"\",\"user_name\":\"Puja Khandagale\"}', 3, '2025-10-09 05:40:32', '2025-10-09 05:40:32'),
(37, 3, 'created', NULL, '{\"owner_name\":\"shubham@extraaaz.com\",\"title\":\"lead\",\"stream_comment\":\"\",\"user_name\":\"Test By Puja Lead 1\"}', 3, '2025-10-09 07:05:09', '2025-10-09 07:05:09'),
(38, 3, 'updated', NULL, '{\"owner_name\":\"shubham@extraaaz.com\",\"title\":\"lead\",\"stream_comment\":\"\",\"user_name\":\"Test By Puja Lead 1\"}', 3, '2025-10-09 07:20:46', '2025-10-09 07:20:46'),
(39, 3, 'updated', NULL, '{\"owner_name\":\"shubham@extraaaz.com\",\"title\":\"lead\",\"stream_comment\":\"\",\"user_name\":\"Test By Puja Lead 1\"}', 3, '2025-10-10 00:01:28', '2025-10-10 00:01:28'),
(40, 3, 'created', NULL, '{\"owner_name\":\"shubham@extraaaz.com\",\"title\":\"product\",\"stream_comment\":\"\",\"user_name\":\"Mobile\"}', 3, '2025-10-10 00:05:08', '2025-10-10 00:05:08'),
(41, 3, 'updated', NULL, '{\"owner_name\":\"shubham@extraaaz.com\",\"title\":\"lead\",\"stream_comment\":\"\",\"user_name\":\"Test By Puja Lead 1\"}', 3, '2025-10-10 00:05:36', '2025-10-10 00:05:36'),
(42, 3, 'updated', NULL, '{\"owner_name\":\"shubham@extraaaz.com\",\"title\":\"opportunities\",\"stream_comment\":\"\",\"user_name\":\"Demo Opportunities\"}', 3, '2025-10-10 01:34:32', '2025-10-10 01:34:32'),
(43, 3, 'updated', NULL, '{\"owner_name\":\"shubham@extraaaz.com\",\"title\":\"product\",\"stream_comment\":\"\",\"user_name\":\"Printer\"}', 3, '2025-10-10 01:35:50', '2025-10-10 01:35:50'),
(44, 3, 'created', NULL, '{\"owner_name\":\"shubham@extraaaz.com\",\"title\":\"lead\",\"stream_comment\":\"\",\"user_name\":\"Test Quote Lead\"}', 3, '2025-10-10 02:08:43', '2025-10-10 02:08:43'),
(45, 3, 'created', NULL, '{\"owner_name\":\"shubham@extraaaz.com\",\"title\":\"quote\",\"stream_comment\":\"\",\"user_name\":null}', 3, '2025-10-10 04:41:45', '2025-10-10 04:41:45'),
(46, 3, 'updated', NULL, '{\"owner_name\":\"shubham@extraaaz.com\",\"title\":\"quote\",\"stream_comment\":\"\",\"user_name\":null}', 3, '2025-10-10 05:11:36', '2025-10-10 05:11:36'),
(47, 3, 'updated', NULL, '{\"owner_name\":\"shubham@extraaaz.com\",\"title\":\"quote\",\"stream_comment\":\"\",\"user_name\":null}', 3, '2025-10-10 05:11:44', '2025-10-10 05:11:44'),
(48, 3, 'updated', NULL, '{\"owner_name\":\"shubham@extraaaz.com\",\"title\":\"quote\",\"stream_comment\":\"\",\"user_name\":null}', 3, '2025-10-10 05:14:43', '2025-10-10 05:14:43'),
(49, 3, 'updated', NULL, '{\"owner_name\":\"shubham@extraaaz.com\",\"title\":\"quote\",\"stream_comment\":\"\",\"user_name\":\"rrrrrr\"}', 3, '2025-10-10 05:22:07', '2025-10-10 05:22:07'),
(50, 3, 'updated', NULL, '{\"owner_name\":\"shubham@extraaaz.com\",\"title\":\"quote\",\"stream_comment\":\"\",\"user_name\":\"Test Quote Lead\"}', 3, '2025-10-10 05:22:29', '2025-10-10 05:22:29'),
(51, 3, 'created', NULL, '{\"owner_name\":\"shubham@extraaaz.com\",\"title\":\"quote\",\"stream_comment\":\"\",\"user_name\":\"Test Quote Lead\"}', 3, '2025-10-10 05:25:32', '2025-10-10 05:25:32'),
(52, 3, 'created', NULL, '{\"owner_name\":\"shubham@extraaaz.com\",\"title\":\"salesorder\",\"stream_comment\":\"\",\"user_name\":null}', 3, '2025-10-10 07:18:03', '2025-10-10 07:18:03'),
(53, 3, 'created', NULL, '{\"owner_name\":\"shubham@extraaaz.com\",\"title\":\"salesorder\",\"stream_comment\":\"\",\"user_name\":null}', 3, '2025-10-10 07:19:44', '2025-10-10 07:19:44'),
(54, 3, 'created', NULL, '{\"owner_name\":\"shubham@extraaaz.com\",\"title\":\"salesorder\",\"stream_comment\":\"\",\"user_name\":null}', 3, '2025-10-10 07:20:55', '2025-10-10 07:20:55'),
(55, 3, 'updated', NULL, '{\"owner_name\":\"shubham@extraaaz.com\",\"title\":\"salesOrder\",\"stream_comment\":\"\",\"user_name\":\"Test Quote\"}', 3, '2025-10-10 11:02:36', '2025-10-10 11:02:36'),
(56, 3, 'created', NULL, '{\"owner_name\":\"shubham@extraaaz.com\",\"title\":\"salesorder\",\"stream_comment\":\"\",\"user_name\":\"Demo Quote\"}', 3, '2025-10-11 01:04:14', '2025-10-11 01:04:14'),
(57, 3, 'created', NULL, '{\"owner_name\":\"shubham@extraaaz.com\",\"title\":\"invoice\",\"stream_comment\":\"\",\"user_name\":\"Test Quote\"}', 3, '2025-10-11 01:12:44', '2025-10-11 01:12:44'),
(58, 3, 'created', NULL, '{\"owner_name\":\"shubham@extraaaz.com\",\"title\":\"user\",\"stream_comment\":\"\",\"user_name\":\"Puja Khandagale\"}', 3, '2025-10-14 05:44:29', '2025-10-14 05:44:29'),
(59, 3, 'created', NULL, '{\"owner_name\":\"shubham@extraaaz.com\",\"title\":\"sales_invoice\",\"stream_comment\":\"\",\"user_name\":\"#SOP00001\"}', 3, '2025-10-16 06:43:10', '2025-10-16 06:43:10'),
(60, 3, 'created', NULL, '{\"owner_name\":\"shubham@extraaaz.com\",\"title\":\"product\",\"stream_comment\":\"\",\"user_name\":\"Auto Engine\"}', 3, '2025-10-16 06:57:01', '2025-10-16 06:57:01'),
(61, 3, 'updated', NULL, '{\"owner_name\":\"shubham@extraaaz.com\",\"title\":\"product\",\"stream_comment\":\"\",\"user_name\":\"Auto Engine\"}', 3, '2025-10-16 06:57:21', '2025-10-16 06:57:21'),
(62, 3, 'updated', NULL, '{\"owner_name\":\"shubham@extraaaz.com\",\"title\":\"lead\",\"stream_comment\":\"\",\"user_name\":\"Test By Puja Lead 1\"}', 3, '2025-10-16 07:43:11', '2025-10-16 07:43:11'),
(63, 3, 'updated', NULL, '{\"owner_name\":\"shubham@extraaaz.com\",\"title\":\"lead\",\"stream_comment\":\"\",\"user_name\":\"Test By Puja Lead 1\"}', 3, '2025-10-16 07:43:25', '2025-10-16 07:43:25'),
(64, 3, 'updated', NULL, '{\"owner_name\":\"shubham@extraaaz.com\",\"title\":\"lead\",\"stream_comment\":\"\",\"user_name\":\"Test By Puja Lead 1\"}', 3, '2025-10-16 07:46:17', '2025-10-16 07:46:17'),
(65, 3, 'created', NULL, '{\"owner_name\":\"shubham@extraaaz.com\",\"title\":\"lead\",\"stream_comment\":\"\",\"user_name\":\"Lead Puja\"}', 3, '2025-10-16 07:47:52', '2025-10-16 07:47:52'),
(66, 3, 'created', NULL, '{\"owner_name\":\"shubham@extraaaz.com\",\"title\":\"lead\",\"stream_comment\":\"\",\"user_name\":\"Puja Khandagale 23\"}', 3, '2025-10-16 08:12:01', '2025-10-16 08:12:01'),
(67, 3, 'updated', NULL, '{\"owner_name\":\"shubham@extraaaz.com\",\"title\":\"lead\",\"stream_comment\":\"\",\"user_name\":\"Test By Puja Lead 1\"}', 3, '2025-10-16 08:16:39', '2025-10-16 08:16:39'),
(68, 3, 'created', NULL, '{\"owner_name\":\"shubham@extraaaz.com\",\"title\":\"salesreturn\",\"stream_comment\":\"\",\"user_name\":\"#SOP00001\"}', 3, '2025-10-17 05:40:27', '2025-10-17 05:40:27'),
(69, 3, 'created', NULL, '{\"owner_name\":\"shubham@extraaaz.com\",\"title\":\"salesreturn\",\"stream_comment\":\"\",\"user_name\":\"#SOR00001\"}', 3, '2025-10-17 05:43:57', '2025-10-17 05:43:57'),
(70, 3, 'created', NULL, '{\"owner_name\":\"shubham@extraaaz.com\",\"title\":\"salesreturn\",\"stream_comment\":\"\",\"user_name\":\"#SOR00002\"}', 3, '2025-10-18 04:38:26', '2025-10-18 04:38:26'),
(71, 3, 'created', NULL, '{\"owner_name\":\"shubham@extraaaz.com\",\"title\":\"salesreturn\",\"stream_comment\":\"\",\"user_name\":\"#SOR00002\"}', 3, '2025-10-18 04:56:00', '2025-10-18 04:56:00'),
(72, 3, 'created', NULL, '{\"owner_name\":\"shubham@extraaaz.com\",\"title\":\"salesreturn\",\"stream_comment\":\"\",\"user_name\":\"#SOR00002\"}', 3, '2025-10-18 05:01:21', '2025-10-18 05:01:21'),
(73, 3, 'created', NULL, '{\"owner_name\":\"shubham@extraaaz.com\",\"title\":\"user\",\"stream_comment\":\"\",\"user_name\":\"Pratiksha\"}', 3, '2025-10-20 04:27:59', '2025-10-20 04:27:59'),
(74, 3, 'updated', NULL, '{\"owner_name\":\"shubham@extraaaz.com\",\"title\":\"user\",\"stream_comment\":\"\",\"user_name\":\"Puja Khandagale\"}', 3, '2025-10-20 04:28:37', '2025-10-20 04:28:37'),
(75, 3, 'created', NULL, '{\"owner_name\":\"shubham@extraaaz.com\",\"title\":\"product\",\"stream_comment\":\"\",\"user_name\":\"Break\"}', 3, '2025-10-20 04:34:56', '2025-10-20 04:34:56'),
(76, 3, 'updated', NULL, '{\"owner_name\":\"shubham@extraaaz.com\",\"title\":\"product\",\"stream_comment\":\"\",\"user_name\":\"Breakk\"}', 3, '2025-10-20 04:35:41', '2025-10-20 04:35:41'),
(77, 10, 'updated', NULL, '{\"owner_name\":\"info@extraaazpos.com\",\"title\":\"lead\",\"stream_comment\":\"\",\"user_name\":\"Puja\"}', 0, '2025-10-20 07:35:42', '2025-10-20 07:35:42'),
(78, 10, 'updated', NULL, '{\"owner_name\":\"info@extraaazpos.com\",\"title\":\"lead\",\"stream_comment\":\"\",\"user_name\":\"Puja\"}', 0, '2025-10-20 07:36:18', '2025-10-20 07:36:18'),
(79, 10, 'updated', NULL, '{\"owner_name\":\"info@extraaazpos.com\",\"title\":\"lead\",\"stream_comment\":\"\",\"user_name\":\"Puja\"}', 0, '2025-10-20 07:36:35', '2025-10-20 07:36:35'),
(80, 10, 'updated', NULL, '{\"owner_name\":\"info@extraaazpos.com\",\"title\":\"lead\",\"stream_comment\":\"\",\"user_name\":\"Puja\"}', 0, '2025-10-20 07:37:29', '2025-10-20 07:37:29'),
(81, 10, 'updated', NULL, '{\"owner_name\":\"info@extraaazpos.com\",\"title\":\"lead\",\"stream_comment\":\"\",\"user_name\":\"Puja\"}', 0, '2025-10-20 07:39:39', '2025-10-20 07:39:39'),
(82, 3, 'updated', NULL, '{\"owner_name\":\"shubham@extraaaz.com\",\"title\":\"salesOrder\",\"stream_comment\":\"\",\"user_name\":\"1111\"}', 3, '2025-10-20 18:36:04', '2025-10-20 18:36:04'),
(83, 11, 'updated', NULL, '{\"owner_name\":\"adikhanofficial@gmail.com\",\"title\":\"salesOrder\",\"stream_comment\":\"\",\"user_name\":\"1111\"}', 3, '2025-10-20 19:37:25', '2025-10-20 19:37:25'),
(84, 11, 'updated', NULL, '{\"owner_name\":\"adikhanofficial@gmail.com\",\"title\":\"salesOrder\",\"stream_comment\":\"\",\"user_name\":\"1111\"}', 3, '2025-10-20 20:02:42', '2025-10-20 20:02:42');

-- --------------------------------------------------------

--
-- Table structure for table `target_lists`
--

CREATE TABLE `target_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `target_lists`
--

INSERT INTO `target_lists` (`id`, `name`, `description`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Test Target', NULL, 3, '2025-10-08 07:02:04', '2025-10-08 07:02:04');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `stage` int(11) NOT NULL DEFAULT 0,
  `priority` int(11) NOT NULL DEFAULT 0,
  `start_date` date NOT NULL,
  `due_date` date NOT NULL,
  `parent` varchar(191) DEFAULT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `account` int(11) NOT NULL DEFAULT 0,
  `description` varchar(191) DEFAULT NULL,
  `attachment` varchar(191) DEFAULT NULL,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `user_id`, `name`, `status`, `stage`, `priority`, `start_date`, `due_date`, `parent`, `parent_id`, `account`, `description`, `attachment`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 0, 'Task', 0, 1, 0, '2025-10-08', '2025-10-08', 'Case', 1, 1, NULL, NULL, 3, '2025-10-08 06:12:46', '2025-10-08 06:12:46'),
(2, 0, 'Task', 0, 1, 0, '2025-10-08', '2025-10-08', 'Case', 1, 1, NULL, NULL, 3, '2025-10-08 06:14:30', '2025-10-08 06:14:30');

-- --------------------------------------------------------

--
-- Table structure for table `task_stages`
--

CREATE TABLE `task_stages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `task_stages`
--

INSERT INTO `task_stages` (`id`, `name`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'ToDo', 3, '2024-04-04 14:30:25', '2024-04-05 07:29:06'),
(2, 'InProgress', 3, '2024-04-05 07:28:55', '2024-04-05 07:28:55'),
(3, 'Local', 3, '2024-04-05 07:30:32', '2024-04-05 07:30:32'),
(4, 'Staging', 3, '2024-04-05 07:30:46', '2024-04-05 07:30:46'),
(5, 'Testing Done', 3, '2024-04-05 07:33:57', '2024-04-05 07:33:57'),
(6, 'Production', 3, '2024-04-05 07:43:29', '2024-04-05 07:43:29');

-- --------------------------------------------------------

--
-- Table structure for table `template`
--

CREATE TABLE `template` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `template_name` varchar(191) NOT NULL,
  `prompt` text NOT NULL,
  `module` varchar(191) NOT NULL,
  `field_json` text NOT NULL,
  `is_tone` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `template`
--

INSERT INTO `template` (`id`, `template_name`, `prompt`, `module`, `field_json`, `is_tone`, `created_at`, `updated_at`) VALUES
(1, 'description', 'Generate a descriptive response for a given ##title##. The response should be detailed, engaging, and informative, providing relevant information and capturing the reader\'s interest', 'account', '{\"field\":[{\"label\":\"Asset name\",\"placeholder\":\"HR may provide some devices \",\"field_type\":\"text_box\",\"field_name\":\"title\"}]}', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(2, 'name', 'Generate a lead subject line for a marketing campaign targeting potential customers for a software development company specializing in web and mobile applications.', 'lead', '{\"field\":[{\"label\":\"Description\",\"placeholder\":\"e.g.\",\"field_type\":\"textarea\",\"field_name\":\"description\"}]}', 0, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(3, 'description', 'Generate a short note summarizing the key points discussed during a lead ##name## call. The purpose of the note is to capture important details and action items discussed with the ##name## lead. Please structure the note in a concise and organized manner.', 'lead', '{\"field\":[{\"label\":\"Lead name\",\"placeholder\":\"e.g. create description for lead user \",\"field_type\":\"textarea\",\"field_name\":\"name\"}]}', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(4, 'description', 'Write a long creative product description for: ##title## \n\nTarget audience is: ##audience## \n\nUse this description: ##description## \n\nTone of generated text must be:\n ##tone_language## \n\n', 'product', '{\"field\":[{\"label\":\"Product name\",\"placeholder\":\"e.g. VR, Honda\",\"field_type\":\"text_box\",\"field_name\":\"title\"},{\"label\":\"Audience\",\"placeholder\":\"e.g. Women, Aliens\",\"field_type\":\"text_box\",\"field_name\":\"audience\"},{\"label\":\"Product Description\",\"placeholder\":\"e.g. VR is an innovative device that can allow you to be part of virtual world\",\"field_type\":\"textarea\",\"field_name\":\"description\"}]}', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(5, 'name', 'Generate a list of Zoom meeting topics for ##description## metting. The purpose of the meeting is to  ##description##. Structure the topics to ensure a productive discussion.', 'meeting', '{\"field\":[{\"label\":\"Meeting description \",\"placeholder\":\"e.g.Remote Collaboration\",\"field_type\":\"textarea\",\"field_name\":\"description\"}]}', 0, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(6, 'name', 'generate contract subject for this contract description ##description##', 'contract', '{\"field\":[{\"label\":\"Proposal Description\",\"placeholder\":\"e.g.Terms and Conditions\",\"field_type\":\"textarea\",\"field_name\":\"description\"}]}', 0, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(7, 'notes', 'generate contract description for this contract subject ##subject##', 'contract', '{\"field\":[{\"label\":\"Contract Subject\",\"placeholder\":\"e.g.Legal Protection,Terms and Conditions\",\"field_type\":\"textarea\",\"field_name\":\"subject\"}]}', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(8, 'description', 'generate contract description for this contract subject ##subject##', 'contract show', '{\"field\":[{\"label\":\"Contract Subject\",\"placeholder\":\"e.g.Legal Protection,Terms and Conditions\",\"field_type\":\"textarea\",\"field_name\":\"subject\"}]}', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(9, 'description', 'Generate a description based on a given document name:##name##. The document name: ##name## represents a specific file or document, and you need a descriptive summary or overview of its contents. Please provide a clear and concise description that captures the main points, purpose, or key information contained within the document. Aim to create a brief but informative description that gives the reader an understanding of what they can expect when accessing or reviewing the document.', 'document', '{\"field\":[{\"label\":\"Document name\",\"placeholder\":\"\",\"field_type\":\"text_box\",\"field_name\":\"name\"}]}', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(10, 'name', 'give 10 catchy only name of Offer or discount Coupon for : ##keywords##', 'coupon', '{\"field\":[{\"label\":\"Seed words\",\"placeholder\":\"e.g.coupon will provide you with a discount on your selected plan\",\"field_type\":\"text_box\",\"field_name\":\"keywords\"}]}', 0, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(11, 'name', 'please suggest subscription plan  name  for this  :  ##description##  for my business', 'plan', '{\"field\":[{\"label\":\"What is your plan about?\",\"placeholder\":\"e.g. Describe your plan details \",\"field_type\":\"textarea\",\"field_name\":\"description\"}]}', 0, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(12, 'description', 'please suggest subscription plan  description  for this  :  ##title##:  for my business', 'plan', '{\"field\":[{\"label\":\"What is your plan title?\",\"placeholder\":\"e.g. Pro Resller,Exclusive Access\",\"field_type\":\"text_box\",\"field_name\":\"title\"}]}', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(13, 'content', 'generate email template for ##type##', 'email template', '{\"field\":[{\"label\":\"Email Type\",\"placeholder\":\"e.g. new user,new client\",\"field_type\":\"text_box\",\"field_name\":\"type\"}]}', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(14, 'content', 'Generate a      notification message for an ##topic## meeting. Include the date, time, location, and a brief agenda with three key discussion points.', 'notification template', '{\"field\":[{\"label\":\"Notification Message\",\"placeholder\":\"e.g.brief explanation of the purpose or background of the notification\",\"field_type\":\"textarea\",\"field_name\":\"topic\"}]}', 0, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(15, 'meta_keywords', 'Write SEO meta title for:\n\n ##description## \n\nWebsite name is:\n ##title## \n\nSeed words:\n ##keywords## \n\n', 'seo', '{\"field\":[{\"label\":\"Website Name\",\"placeholder\":\"e.g. Amazon, Google\",\"field_type\":\"text_box\",\"field_name\":\"title\"},{\"label\":\"Website Description\",\"placeholder\":\"e.g. Describe what your website or business do\",\"field_type\":\"textarea\",\"field_name\":\"description\"},{\"label\":\"Keywords\",\"placeholder\":\"e.g.  cloud services, databases\",\"field_type\":\"text_box\",\"field_name\":\"keywords\"}]}', 0, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(16, 'meta_description', 'Write SEO meta description for:\n\n ##description## \n\nWebsite name is:\n ##title## \n\nSeed words:\n ##keywords## \n\n', 'seo', '{\"field\":[{\"label\":\"Website Name\",\"placeholder\":\"e.g. Amazon, Google\",\"field_type\":\"text_box\",\"field_name\":\"title\"},{\"label\":\"Website Description\",\"placeholder\":\"e.g. Describe what your website or business do\",\"field_type\":\"textarea\",\"field_name\":\"description\"},{\"label\":\"Keywords\",\"placeholder\":\"e.g.  cloud services, databases\",\"field_type\":\"text_box\",\"field_name\":\"keywords\"}]}', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(17, 'cookie_title', 'please suggest me cookie title for this ##description## website which i can use in my website cookie', 'cookie', '{\"field\":[{\"label\":\"Website name or info\",\"placeholder\":\"e.g. example website \",\"field_type\":\"textarea\",\"field_name\":\"title\"}]}', 0, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(18, 'cookie_description', 'please suggest me  Cookie description for this cookie title ##title##  which i can use in my website cookie', 'cookie', '{\"field\":[{\"label\":\"Cookie Title \",\"placeholder\":\"e.g. example website \",\"field_type\":\"text_box\",\"field_name\":\"title\"}]}', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(19, 'strictly_cookie_title', 'please suggest me only Strictly Cookie Title for this ##description## website which i can use in my website cookie', 'cookie', '{\"field\":[{\"label\":\"Website name or info\",\"placeholder\":\"e.g. example website \",\"field_type\":\"textarea\",\"field_name\":\"title\"}]}', 0, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(20, 'strictly_cookie_description', 'please suggest me Strictly Cookie description for this Strictly cookie title ##title##  which i can use in my website cookie', 'cookie', '{\"field\":[{\"label\":\"Strictly Cookie Title \",\"placeholder\":\"e.g. example website \",\"field_type\":\"text_box\",\"field_name\":\"title\"}]}', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(21, 'more_information_description', 'I need assistance in crafting compelling content for my ##web_name## website\'s \'Contact Us\' page of my website. The page should provide relevant information to users, encourage them to reach out for inquiries, support, and feedback, and reflect the unique value proposition of my business.', 'cookie', '{\"field\":[{\"label\":\"Websit Name\",\"placeholder\":\"e.g. example website \",\"field_type\":\"text_box\",\"field_name\":\"web_name\"}]}', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(22, 'description', 'give brief decription of Opportunity detail and cover all point with it\'s importance for this Opportunity \'##name##\'', 'opportunities', '{\"field\":[{\"label\":\"Opportunity name  \",\"placeholder\":\"e.g.Fashion Fusion Frenzy\",\"field_type\":\"text_box\",\"field_name\":\"name\"}]}', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(23, 'description', 'generate a tiny and innovative paragraph note which i can attechted with my contant detail please includes seed word : ##keywords##', 'contact', '{\"field\":[{\"label\":\"Seed words\",\"placeholder\":\"e.g. any time my phone number can be change\",\"field_type\":\"text_box\",\"field_name\":\"keywords\"}]}', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(24, 'name', 'Create creative product names:  ##description## \n\nSeed words: ##keywords## \n\n', 'product', '{\"field\":[{\"label\":\"Seed words\",\"placeholder\":\"e.g.  fast, healthy, compact\",\"field_type\":\"text_box\",\"field_name\":\"keywords\"},{\"label\":\"Product Description\",\"placeholder\":\"e.g. Provide product details\",\"field_type\":\"textarea\",\"field_name\":\"description\"}]}', 0, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(25, 'name', 'generate a name of quotation related product saling  using seed  keywords are : ##keywords##', 'quote', '{\"field\":[{\"label\":\"Seed words\",\"placeholder\":\"e.g.ProQuoteSale\",\"field_type\":\"text_box\",\"field_name\":\"keywords\"}]}', 0, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(26, 'description', 'generate a description of  quotation related product saling please note that description should be justify this title  : ##name##', 'quote', '{\"field\":[{\"label\":\"Quote name\",\"placeholder\":\"e.g.ProQuoteSale\",\"field_type\":\"text_box\",\"field_name\":\"name\"}]}', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(27, 'description', 'generate a description of  Sales Order related product saling please note that description should be justify this name  : ##name##', 'sales order', '{\"field\":[{\"label\":\"Salesorder name\",\"placeholder\":\"e.g.SaleMaster\",\"field_type\":\"text_box\",\"field_name\":\"name\"}]}', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(28, 'name', 'generate a name of Sales Order related saling that saleorder name shoul relate ##name##\'', 'sales order', '{\"field\":[{\"label\":\"Quote name\",\"placeholder\":\"e.g.ProQuoteSale\",\"field_type\":\"text_box\",\"field_name\":\"name\"}]}', 0, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(29, 'name', 'generate innovative name of Invoice for this Sales Orders:##name##.', 'invoice', '{\"field\":[{\"label\":\"Salesorder name\",\"placeholder\":\"e.g.SaleMaster\",\"field_type\":\"text_box\",\"field_name\":\"name\"}]}', 0, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(30, 'description', 'generate a description of invoice related product saling please note that description should be justify this title : ##name##', 'invoice', '{\"field\":[{\"label\":\"Invoice name\",\"placeholder\":\"e.g.Speedy Sales Impact Invoice\",\"field_type\":\"text_box\",\"field_name\":\"name\"}]}', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(31, 'description', 'generate a description of invoice  related this item description should be justify this itme name : ##name##', 'invoice item', '{\"field\":[{\"label\":\"Invoice Item name\",\"placeholder\":\"e.g.name of Invoice item\",\"field_type\":\"text_box\",\"field_name\":\"name\"}]}', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(32, 'name', 'generate name of case for ##resoan##, case should be relate to product saling business', 'case', '{\"field\":[{\"label\":\"Decribe resoan of case\" ,\"placeholder\":\"e.g.name of Invoice item\",\"field_type\":\"textarea\",\"field_name\":\"resoan\"}]}', 0, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(33, 'description', 'generate detail & brief description of this perticular case :##name##', 'case', '{\"field\":[{\"label\":\"Case name\",\"placeholder\":\"e.g.HarmfulGoods Lawsuit\",\"field_type\":\"text_box\",\"field_name\":\"name\"}]}', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(34, 'name', 'Generate a task name for this decription that specifically related to ##instruction##.', 'task', '{\"field\":[{\"label\":\"Task Instruction\",\"placeholder\":\"e.g.\",\"field_type\":\"textarea\",\"field_name\":\"instruction\"}]}', 0, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(35, 'description', 'Generate short task description for a  specifically related  to  this description ##instruction##.', 'task', '{\"field\":[{\"label\":\"Task Instruction\",\"placeholder\":\"e.g.\",\"field_type\":\"textarea\",\"field_name\":\"instruction\"}]}', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(36, 'description', 'Write a short and innovative informable description for meeting which about : #    #title## with includes this special information ##description##', 'meeting', '{\"field\":[{\"label\":\"Meeting topic\",\"placeholder\":\"discuss product sales\",\"field_type\":\"text_box\",\"field_name\":\"title\"},{\"label\":\"Instruction for meeting \",\"placeholder\":\"please come with your presentation\",\"field_type\":\"textarea\",\"field_name\":\"description\"}]}', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(37, 'name', 'generate call for tile that justify this resoan ##description## for the call ', 'call', '{\"field\":[{\"label\":\"Call Resoan\",\"placeholder\":\"e.g.Time Management Strategy Call\",\"field_type\":\"textarea\",\"field_name\":\"description\"}]}', 0, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(38, 'description', 'generate a description of call  related this call description should be justify this call resoan : ##description##', 'call', '{\"field\":[{\"label\":\"Call title\",\"placeholder\":\"e.g.Time Management Strategy Call\",\"field_type\":\"textarea\",\"field_name\":\"description\"}]}', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(39, 'comment', 'generate innovative and descriptive comment of ##title##', 'contract comment', '{\"field\":[{\"label\":\"Contract Name\",\"placeholder\":\"e.g. product return condition \",\"field_type\":\"textarea\",\"field_name\":\"title\"}]}', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(40, 'name', 'generate sutiable and valuable name of document please note name should justify the document description  \'##description##\' .', 'document', '{\"field\":[{\"label\":\"Document Name\",\"placeholder\":\"e.g. verification file \",\"field_type\":\"textarea\",\"field_name\":\"description\"}]}', 0, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(41, 'name', 'suggest innovative and valuable campaign name for this : ##description##', 'campaign', '{\"field\":[{\"label\":\"Campaign Description\",\"placeholder\":\"e.g. Where Style Meets Versatility \",\"field_type\":\"textarea\",\"field_name\":\"description\"}]}', 0, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(42, 'description', 'generate a description of campaign  related this item description should be justify this campaign name : ##name##', 'campaign', '{\"field\":[{\"label\":\"Campaign Name\",\"placeholder\":\"e.g. Fashion Fusion \",\"field_type\":\"textarea\",\"field_name\":\"description\"}]}', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(43, 'description', 'generate contract brief description for title \'##name##\' and cover all point that sutiable to contract title and this contract type is ##type##', 'contract desc', '{\"field\":[{\"label\":\"Contract Name\",\"placeholder\":\"e.g. product return condition \",\"field_type\":\"text_box\",\"field_name\":\"name\"},{\"label\":\"Contract Type\",\"placeholder\":\"e.g. industries \",\"field_type\":\"text_box\",\"field_name\":\"type\"}]}', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(44, 'note', 'generate short and valuable note for contract title \'##name##\'  and this contract type is ##type##', 'contract notes', '{\"field\":[{\"label\":\"Contract Name\",\"placeholder\":\"e.g. product return condition \",\"field_type\":\"textarea\",\"field_name\":\"name\"},{\"label\":\"Contract Type\",\"placeholder\":\"e.g. industries \",\"field_type\":\"text_box\",\"field_name\":\"type\"}]}', 1, '2024-04-04 13:40:47', '2024-04-04 13:40:47');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(191) NOT NULL,
  `name` varchar(191) NOT NULL,
  `title` varchar(191) DEFAULT NULL,
  `plan_is_active` int(11) NOT NULL DEFAULT 1,
  `email` varchar(191) NOT NULL,
  `email_verified_at` varchar(191) DEFAULT NULL,
  `storage_limit` double(8,2) NOT NULL DEFAULT 0.00,
  `phone` varchar(191) DEFAULT NULL,
  `gender` varchar(191) DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `is_enable_login` int(11) NOT NULL DEFAULT 1,
  `user_roles` varchar(191) DEFAULT NULL,
  `lang` varchar(191) NOT NULL DEFAULT 'en',
  `password` varchar(191) NOT NULL,
  `mode` varchar(191) NOT NULL DEFAULT 'light',
  `avatar` varchar(191) DEFAULT NULL,
  `plan` int(11) DEFAULT NULL,
  `plan_expire_date` date DEFAULT NULL,
  `is_trial_done` varchar(191) NOT NULL DEFAULT '0',
  `requested_plan` int(11) NOT NULL DEFAULT 0,
  `trial_expire_date` varchar(191) DEFAULT NULL,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `active_status` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `dark_mode` tinyint(1) NOT NULL DEFAULT 0,
  `messenger_color` varchar(191) DEFAULT NULL,
  `is_disable` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `title`, `plan_is_active`, `email`, `email_verified_at`, `storage_limit`, `phone`, `gender`, `type`, `is_active`, `is_enable_login`, `user_roles`, `lang`, `password`, `mode`, `avatar`, `plan`, `plan_expire_date`, `is_trial_done`, `requested_plan`, `trial_expire_date`, `created_by`, `active_status`, `remember_token`, `created_at`, `updated_at`, `dark_mode`, `messenger_color`, `is_disable`) VALUES
(1, 'Super Admin', 'Super Admin', NULL, 1, 'superadmin@example.com', '2024-04-04 13:40:47', 0.00, NULL, NULL, 'super admin', 1, 1, NULL, 'en', '$2y$10$g5MKdeMyDOQzDrUtZ8b8POA8Yl.30K7qAzHzXohpzcPydVtL41sq.', 'light', 'avatar.png', NULL, NULL, '0', 0, NULL, 0, 0, NULL, '2024-04-04 13:40:47', '2024-04-04 13:40:47', 0, NULL, 1),
(2, 'owner', 'owner', '-', 1, 'company@example.com', '2024-04-04 13:40:47', 0.00, NULL, NULL, 'owner', 1, 1, NULL, 'en', '$2y$10$JRL/AdbjTgXvJ8kjIeyXM.5c14OgQCIJf9HXU7UMi1bvFsPeEKh4u', 'light', 'avatar.png', 1, NULL, '0', 0, NULL, 1, 0, NULL, '2024-04-04 13:40:47', '2024-04-04 13:40:47', 0, NULL, 1),
(3, 'shubham@extraaaz.com', 'Shubham Sachin Dhayalkar', NULL, 1, 'info@extraaazpos.com', '2024-04-04 13:53:47', 0.42, NULL, NULL, 'owner', 1, 1, '4', 'en', '$2y$10$vy6HMNMN6Q2D/rGcfrOzXeTnEllUwen0Op2idQOu5eIouR3lqQd8m', 'light', NULL, 1, NULL, '0', 0, NULL, 1, 0, NULL, '2024-04-04 13:53:47', '2025-10-08 06:42:10', 0, NULL, 1),
(4, 'Mahesh', 'Mahesh Zemase', 'Laravel Developer', 1, 'mahesh.zemase@extraaazpos.com', '2024-04-04 14:12:22', 0.00, '8087780445', 'male', 'User', 1, 1, '3', 'en', '$2y$10$KsxdXtFkiGR8wvjgSm2Ax.FROD16FguozQw3vXyxLlfLQPfROvjji', 'light', NULL, NULL, NULL, '0', 0, NULL, 3, 0, NULL, '2024-04-04 14:12:23', '2024-04-04 14:12:23', 0, NULL, 1),
(5, 'Yuvraj', 'Yuvraj Shelke', 'Front End Developer', 1, 'yuvraj.shelke@extraaazpos.com', '2024-04-04 14:14:33', 0.00, '8459628112', 'male', 'User', 1, 1, '3', 'en', '$2y$10$PFFHYkvt/8OsV435Bo.uw.82MEvYZSnYvLjfNKVlz2Wq/MhA9TMZi', 'light', NULL, NULL, NULL, '0', 0, NULL, 3, 0, NULL, '2024-04-04 14:14:33', '2024-04-04 14:14:33', 0, NULL, 1),
(6, 'Yogesh', 'Yogesh Salve', 'Technical Head', 1, 'yogesh.salve@extraaazpos.com', '2024-04-04 14:17:58', 0.00, '9422082780', 'male', 'Admin', 1, 1, '4', 'en', '$2y$10$4RAOoTI7lSX.FB13Xs5c6e23cwectkSQ/On4v2XdnxO2KLH.3yvs6', 'light', '1604329372224_1712240278.jfif', NULL, NULL, '0', 0, NULL, 3, 0, NULL, '2024-04-04 14:17:58', '2024-04-04 14:17:58', 0, NULL, 1),
(7, 'pallavijagdhane', 'Pallavi Kiran Jagdhane', 'Pune Branch Director', 1, 'pallavi.j@extraaaz.com', '2025-08-17 07:31:35', 0.00, '7722003376', 'female', 'Branch Director', 1, 1, '5', 'en', '$2y$10$9KksMwdydk9eTscLfLccxOijKl0tyJj8SgW6.T/M0s90fY5XSLuuW', 'light', NULL, NULL, NULL, '0', 0, NULL, 3, 0, NULL, '2025-08-17 07:31:35', '2025-08-17 07:31:35', 0, NULL, 1),
(8, 'jagjeet.bhatia@extraaaz.com', 'Jagjeet Bhatia', 'Narisinghpur Branch Director', 1, 'jagjeet.bhatia@extraaaz.com', '2025-08-23 08:41:40', 0.00, '91313 47373', 'male', 'Branch Director', 1, 1, '5', 'en', '$2y$10$SvmsRD8xQa1WmYYlDWRIae7aeHAQRL1LC/Ut0ngKeh47xLX3atVLe', 'light', NULL, NULL, NULL, '0', 0, NULL, 3, 0, NULL, '2025-08-23 08:41:40', '2025-08-23 08:41:40', 0, NULL, 1),
(9, 'sujata.bhandarkar@extraaaz.com', 'Sujata Bhandarkar', 'Borivali Branch Director', 1, 'sujata.bhandarkar@extraaaz.com', '2025-09-08 15:50:59', 0.00, '90293 77301', 'female', 'Branch Director', 1, 1, '5', 'en', '$2y$10$oRQxwwgj6BBUbzpFPbFb.u16XuFOSTXNtFtZDpXWx0S2Jj7SEY3iS', 'light', NULL, NULL, NULL, '0', 0, NULL, 3, 0, NULL, '2025-09-08 15:50:59', '2025-09-22 19:15:09', 0, NULL, 1),
(10, 'info@extraaazpos.com', 'Puja Khandagale', 'Dev Team', 1, 'puja@extraaazpos.com', '2025-10-14 11:14:28', 0.00, '5555555555', 'female', 'Sales Agent', 1, 1, '6', 'en', '$2y$10$2YLYhHW3Ua496Mo69hWv5OS.987tL20Xwa3ZiWKBIFwRkIHCHP0Cu', 'light', 'users_1760440468.jpg', NULL, NULL, '0', 0, NULL, 3, 0, NULL, '2025-10-14 05:44:28', '2025-10-20 04:28:36', 0, NULL, 1),
(11, 'adikhanofficial@gmail.com', 'Pratiksha', 'Pratiksha', 1, 'pratiksha@extraaazpos.com', '2025-10-20 09:57:59', 0.00, '9999999999', 'female', 'Source Agent', 1, 1, '7', 'en', '$2y$10$qk4ileabEpbmlNb3KrRq/eEQ27cTWBWEG.pybxat1ZBhVBIiJjYYG', 'light', NULL, NULL, NULL, '0', 0, NULL, 3, 0, NULL, '2025-10-20 04:27:59', '2025-10-20 04:27:59', 0, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users_location_logs`
--

CREATE TABLE `users_location_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `latitude` varchar(191) DEFAULT NULL,
  `longitude` varchar(191) DEFAULT NULL,
  `accuracy` varchar(191) DEFAULT NULL,
  `battery_percent` varchar(191) DEFAULT NULL,
  `logged_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users_location_logs`
--

INSERT INTO `users_location_logs` (`id`, `user_id`, `latitude`, `longitude`, `accuracy`, `battery_percent`, `logged_at`, `created_at`, `updated_at`) VALUES
(1, 3, '18.5204', '73.8567', '2', '15', '2025-10-03 09:30:00', '2025-10-04 00:52:32', '2025-10-04 00:52:32'),
(2, 3, '20.5204', '35.8567', '2', '63', '2025-10-04 06:30:00', '2025-10-04 01:08:45', '2025-10-04 01:08:45');

-- --------------------------------------------------------

--
-- Table structure for table `user_checkin_checkout_details`
--

CREATE TABLE `user_checkin_checkout_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `user_name` varchar(191) DEFAULT NULL,
  `in_latitude` varchar(191) DEFAULT NULL,
  `in_longitude` varchar(191) DEFAULT NULL,
  `out_latitude` varchar(191) DEFAULT NULL,
  `out_longitude` varchar(191) DEFAULT NULL,
  `in_accuracy` varchar(191) DEFAULT NULL,
  `in_battery_percent` varchar(191) DEFAULT NULL,
  `out_accuracy` varchar(191) DEFAULT NULL,
  `out_battery_percent` varchar(191) DEFAULT NULL,
  `in_notes` longtext DEFAULT NULL,
  `out_notes` longtext DEFAULT NULL,
  `is_checkIn` tinyint(1) NOT NULL DEFAULT 0,
  `is_checkOut` tinyint(1) NOT NULL DEFAULT 0,
  `check_in_time` datetime DEFAULT NULL,
  `check_out_time` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_checkin_checkout_details`
--

INSERT INTO `user_checkin_checkout_details` (`id`, `user_id`, `user_name`, `in_latitude`, `in_longitude`, `out_latitude`, `out_longitude`, `in_accuracy`, `in_battery_percent`, `out_accuracy`, `out_battery_percent`, `in_notes`, `out_notes`, `is_checkIn`, `is_checkOut`, `check_in_time`, `check_out_time`, `created_at`, `updated_at`) VALUES
(1, 3, 'Shubham', '18.5204', '73.8567', '19.5204', '74.8567', '2', '15', '9', '25', 'Demo meeting scheduled', 'Task Completed dfdf', 0, 0, '2025-10-03 09:30:00', '2025-10-03 06:30:00', '2025-10-04 00:05:39', '2025-10-04 00:06:18');

-- --------------------------------------------------------

--
-- Table structure for table `user_coupons`
--

CREATE TABLE `user_coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user` int(11) NOT NULL DEFAULT 0,
  `coupon` int(11) NOT NULL DEFAULT 0,
  `order` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_defualt_views`
--

CREATE TABLE `user_defualt_views` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `module` varchar(191) DEFAULT NULL,
  `route` varchar(191) DEFAULT NULL,
  `view` varchar(191) DEFAULT NULL,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_defualt_views`
--

INSERT INTO `user_defualt_views` (`id`, `module`, `route`, `view`, `user_id`, `created_at`, `updated_at`) VALUES
(0, 'product', 'product.index', 'list', 10, '2025-10-20 06:43:09', '2025-10-20 06:43:09'),
(1, 'user', 'user.index', 'list', 3, '2024-04-04 14:10:53', '2024-04-04 14:10:53'),
(2, 'task', 'task.index', 'list', 3, '2024-04-04 14:23:02', '2024-04-04 14:23:02'),
(3, 'product', 'product.index', 'list', 3, '2024-04-04 14:29:13', '2024-04-04 14:29:13'),
(4, 'contact', 'contact.grid', 'grid', 6, '2024-04-06 05:52:10', '2024-04-06 05:52:10'),
(5, 'account', 'account.index', 'list', 3, '2024-04-06 09:47:32', '2024-04-06 09:47:32'),
(6, 'document', 'document.index', 'list', 3, '2024-04-06 09:47:42', '2024-04-06 09:47:42'),
(7, 'lead', 'lead.index', 'list', 3, '2024-04-07 15:31:58', '2025-08-11 13:39:02'),
(8, 'commoncases', 'commoncases.index', 'list', 3, '2024-04-07 15:32:26', '2024-04-07 15:32:26'),
(9, 'opportunities', 'opportunities.index', 'list', 3, '2024-04-07 15:40:26', '2024-04-07 15:40:26'),
(10, 'call', 'call.index', 'list', 3, '2024-04-07 16:15:39', '2024-04-07 16:15:39'),
(11, 'contact', 'contact.index', 'list', 3, '2024-06-18 06:59:49', '2025-10-08 01:30:46'),
(12, 'campaign', 'campaign.index', 'list', 3, '2024-10-28 13:32:02', '2024-10-28 13:32:02'),
(13, 'meeting', 'meeting.index', 'list', 3, '2025-08-11 13:40:48', '2025-10-08 06:29:00'),
(14, 'yards', 'yards.index', 'list', 3, '2025-08-11 13:40:48', '2025-10-08 06:29:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_email_templates`
--

CREATE TABLE `user_email_templates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `template_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_email_templates`
--

INSERT INTO `user_email_templates` (`id`, `template_id`, `user_id`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 0, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(2, 2, 2, 0, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(3, 3, 2, 0, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(4, 4, 2, 0, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(5, 5, 2, 0, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(6, 6, 2, 0, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(7, 7, 2, 0, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(8, 8, 2, 0, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(9, 9, 2, 0, '2024-04-04 13:40:47', '2024-04-04 13:40:47'),
(10, 1, 3, 1, '2024-04-04 13:53:47', '2024-04-04 14:24:16'),
(11, 2, 3, 1, '2024-04-04 13:53:47', '2024-04-04 14:24:16'),
(12, 3, 3, 1, '2024-04-04 13:53:47', '2024-04-04 14:24:16'),
(13, 4, 3, 0, '2024-04-04 13:53:47', '2024-04-04 14:24:16'),
(14, 5, 3, 0, '2024-04-04 13:53:47', '2024-04-04 14:24:16'),
(15, 6, 3, 0, '2024-04-04 13:53:47', '2024-04-04 14:24:16'),
(16, 7, 3, 1, '2024-04-04 13:53:47', '2024-04-04 14:24:16'),
(17, 8, 3, 0, '2024-04-04 13:53:47', '2024-04-04 14:24:16'),
(18, 9, 3, 0, '2024-04-04 13:53:47', '2024-04-04 14:24:16');

-- --------------------------------------------------------

--
-- Table structure for table `user_visit_details`
--

CREATE TABLE `user_visit_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `lead_id` int(11) DEFAULT NULL,
  `lead_status` varchar(191) DEFAULT NULL,
  `latitude` varchar(191) DEFAULT NULL,
  `longitude` varchar(191) DEFAULT NULL,
  `area_name` varchar(191) DEFAULT NULL,
  `visiting_place` varchar(191) DEFAULT NULL,
  `person_name` varchar(191) DEFAULT NULL,
  `reason` varchar(191) DEFAULT NULL,
  `photo` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_visit_details`
--

INSERT INTO `user_visit_details` (`id`, `user_id`, `lead_id`, `lead_status`, `latitude`, `longitude`, `area_name`, `visiting_place`, `person_name`, `reason`, `photo`, `created_at`, `updated_at`) VALUES
(1, 3, 3, '0', '50.5204', '32.8567', '2', '95', 'Vikas', 'Sales', 'img.png', '2025-10-05 08:28:56', '2025-10-05 08:28:56');

-- --------------------------------------------------------

--
-- Table structure for table `warehouses`
--

CREATE TABLE `warehouses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `address` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `webhooks`
--

CREATE TABLE `webhooks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `module` varchar(191) DEFAULT NULL,
  `method` varchar(191) NOT NULL,
  `url` varchar(191) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `yards`
--

CREATE TABLE `yards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `yard_name` varchar(191) NOT NULL,
  `yard_address` varchar(191) DEFAULT NULL,
  `yard_email` varchar(191) DEFAULT NULL,
  `yard_person_name` varchar(191) DEFAULT NULL,
  `contact` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `yards`
--

INSERT INTO `yards` (`id`, `yard_name`, `yard_address`, `yard_email`, `yard_person_name`, `contact`, `created_at`, `updated_at`) VALUES
(1, 'Pune', 'gdfgdf', 'pune@gmail.com', 'Raj', '8877448855', '2025-10-20 17:22:24', '2025-10-20 17:22:24'),
(2, 'Mumbai', 'dgfsdfsdfsdfsdfsdfsdfsd', 'mumbai@gmail.com', 'Sahil', '7894561230', '2025-10-20 20:40:59', '2025-10-20 20:40:59');

-- --------------------------------------------------------

--
-- Table structure for table `yard_logs`
--

CREATE TABLE `yard_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sales_order_id` bigint(20) UNSIGNED DEFAULT NULL,
  `yard_id` bigint(20) UNSIGNED DEFAULT NULL,
  `comments` text DEFAULT NULL,
  `card_used` varchar(191) DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `yard_order_date` date DEFAULT NULL,
  `delivery_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `yard_logs`
--

INSERT INTO `yard_logs` (`id`, `sales_order_id`, `yard_id`, `comments`, `card_used`, `created_by`, `yard_order_date`, `delivery_date`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'dfsdfsdfdsfsdfiyuiuyiuy', 'efsdfsd', 11, '2025-10-23', '2025-10-25', '2025-10-20 20:46:03', '2025-10-20 20:46:03'),
(2, 1, 2, 'dddddddddddddddddddd', 'wwwwwwwwwwww', 11, '2025-10-22', '2025-10-24', '2025-10-20 20:46:23', '2025-10-20 20:46:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `accounts_email_unique` (`email`);

--
-- Indexes for table `account_industries`
--
ALTER TABLE `account_industries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `account_types`
--
ALTER TABLE `account_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_payment_settings`
--
ALTER TABLE `admin_payment_settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_payment_settings_name_created_by_unique` (`name`,`created_by`);

--
-- Indexes for table `bank_transfers`
--
ALTER TABLE `bank_transfers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `calls`
--
ALTER TABLE `calls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `campaigns`
--
ALTER TABLE `campaigns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `campaign_types`
--
ALTER TABLE `campaign_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `case_types`
--
ALTER TABLE `case_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ch_favorites`
--
ALTER TABLE `ch_favorites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ch_messages`
--
ALTER TABLE `ch_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `common_cases`
--
ALTER TABLE `common_cases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contracts`
--
ALTER TABLE `contracts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contract_attechments`
--
ALTER TABLE `contract_attechments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contract_comments`
--
ALTER TABLE `contract_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contract_notes`
--
ALTER TABLE `contract_notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contract_types`
--
ALTER TABLE `contract_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `document_folders`
--
ALTER TABLE `document_folders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `document_types`
--
ALTER TABLE `document_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_templates`
--
ALTER TABLE `email_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_template_langs`
--
ALTER TABLE `email_template_langs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form_builders`
--
ALTER TABLE `form_builders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `form_builders_code_unique` (`code`);

--
-- Indexes for table `form_fields`
--
ALTER TABLE `form_fields`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form_field_responses`
--
ALTER TABLE `form_field_responses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form_responses`
--
ALTER TABLE `form_responses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_items`
--
ALTER TABLE `invoice_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_payments`
--
ALTER TABLE `invoice_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `join_us`
--
ALTER TABLE `join_us`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `join_us_email_unique` (`email`);

--
-- Indexes for table `landing_page_sections`
--
ALTER TABLE `landing_page_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `landing_page_settings`
--
ALTER TABLE `landing_page_settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `landing_page_settings_name_unique` (`name`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leads`
--
ALTER TABLE `leads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `leads_lead_type_id_foreign` (`lead_type_id`),
  ADD KEY `leads_product_id_foreign` (`product_id`),
  ADD KEY `leads_user_id_foreign` (`user_id`);

--
-- Indexes for table `lead_sources`
--
ALTER TABLE `lead_sources`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lead_statuses`
--
ALTER TABLE `lead_statuses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lead_statuses_lead_id_foreign` (`lead_id`),
  ADD KEY `lead_statuses_created_by_foreign` (`created_by`);

--
-- Indexes for table `lead_type`
--
ALTER TABLE `lead_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_details`
--
ALTER TABLE `login_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meetings`
--
ALTER TABLE `meetings`
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
-- Indexes for table `notification_templates`
--
ALTER TABLE `notification_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification_template_langs`
--
ALTER TABLE `notification_template_langs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `opportunities`
--
ALTER TABLE `opportunities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `opportunities_stages`
--
ALTER TABLE `opportunities_stages`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `plans_name_unique` (`name`);

--
-- Indexes for table `plan_requests`
--
ALTER TABLE `plan_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_brands`
--
ALTER TABLE `product_brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_taxes`
--
ALTER TABLE `product_taxes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quotes`
--
ALTER TABLE `quotes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quote_items`
--
ALTER TABLE `quote_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
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
-- Indexes for table `sales_orders`
--
ALTER TABLE `sales_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sales_orders_lead_id_foreign` (`lead_id`),
  ADD KEY `sales_orders_yard_id_foreign` (`yard_id`),
  ADD KEY `sales_orders_source_id_foreign` (`source_id`),
  ADD KEY `sales_orders_sales_user_id_foreign` (`sales_user_id`);

--
-- Indexes for table `sales_order_items`
--
ALTER TABLE `sales_order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_return`
--
ALTER TABLE `sales_return`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_name_created_by_unique` (`name`,`created_by`);

--
-- Indexes for table `shipping_providers`
--
ALTER TABLE `shipping_providers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `streams`
--
ALTER TABLE `streams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `target_lists`
--
ALTER TABLE `target_lists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task_stages`
--
ALTER TABLE `task_stages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `template`
--
ALTER TABLE `template`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_location_logs`
--
ALTER TABLE `users_location_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_checkin_checkout_details`
--
ALTER TABLE `user_checkin_checkout_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_coupons`
--
ALTER TABLE `user_coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_defualt_views`
--
ALTER TABLE `user_defualt_views`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_email_templates`
--
ALTER TABLE `user_email_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_visit_details`
--
ALTER TABLE `user_visit_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `warehouses`
--
ALTER TABLE `warehouses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `webhooks`
--
ALTER TABLE `webhooks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `yards`
--
ALTER TABLE `yards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `yard_logs`
--
ALTER TABLE `yard_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `yard_logs_sales_order_id_foreign` (`sales_order_id`),
  ADD KEY `yard_logs_yard_id_foreign` (`yard_id`),
  ADD KEY `yard_logs_created_by_foreign` (`created_by`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `account_industries`
--
ALTER TABLE `account_industries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `account_types`
--
ALTER TABLE `account_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admin_payment_settings`
--
ALTER TABLE `admin_payment_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `bank_transfers`
--
ALTER TABLE `bank_transfers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `calls`
--
ALTER TABLE `calls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `campaigns`
--
ALTER TABLE `campaigns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `campaign_types`
--
ALTER TABLE `campaign_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `case_types`
--
ALTER TABLE `case_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `common_cases`
--
ALTER TABLE `common_cases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contracts`
--
ALTER TABLE `contracts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contract_attechments`
--
ALTER TABLE `contract_attechments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contract_comments`
--
ALTER TABLE `contract_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contract_notes`
--
ALTER TABLE `contract_notes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contract_types`
--
ALTER TABLE `contract_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `document_folders`
--
ALTER TABLE `document_folders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `document_types`
--
ALTER TABLE `document_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `email_templates`
--
ALTER TABLE `email_templates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `email_template_langs`
--
ALTER TABLE `email_template_langs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `form_builders`
--
ALTER TABLE `form_builders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `form_fields`
--
ALTER TABLE `form_fields`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `form_field_responses`
--
ALTER TABLE `form_field_responses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `form_responses`
--
ALTER TABLE `form_responses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `invoice_items`
--
ALTER TABLE `invoice_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoice_payments`
--
ALTER TABLE `invoice_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `join_us`
--
ALTER TABLE `join_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `landing_page_sections`
--
ALTER TABLE `landing_page_sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `landing_page_settings`
--
ALTER TABLE `landing_page_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `leads`
--
ALTER TABLE `leads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lead_sources`
--
ALTER TABLE `lead_sources`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `lead_statuses`
--
ALTER TABLE `lead_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `lead_type`
--
ALTER TABLE `lead_type`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `login_details`
--
ALTER TABLE `login_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `meetings`
--
ALTER TABLE `meetings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT for table `notification_templates`
--
ALTER TABLE `notification_templates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `notification_template_langs`
--
ALTER TABLE `notification_template_langs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT for table `opportunities`
--
ALTER TABLE `opportunities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `opportunities_stages`
--
ALTER TABLE `opportunities_stages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=181;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `plan_requests`
--
ALTER TABLE `plan_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product_brands`
--
ALTER TABLE `product_brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product_taxes`
--
ALTER TABLE `product_taxes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `quotes`
--
ALTER TABLE `quotes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `quote_items`
--
ALTER TABLE `quote_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  MODIFY `permission_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=181;

--
-- AUTO_INCREMENT for table `sales_orders`
--
ALTER TABLE `sales_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sales_order_items`
--
ALTER TABLE `sales_order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sales_return`
--
ALTER TABLE `sales_return`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- AUTO_INCREMENT for table `shipping_providers`
--
ALTER TABLE `shipping_providers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `streams`
--
ALTER TABLE `streams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `target_lists`
--
ALTER TABLE `target_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `task_stages`
--
ALTER TABLE `task_stages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `template`
--
ALTER TABLE `template`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users_location_logs`
--
ALTER TABLE `users_location_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_checkin_checkout_details`
--
ALTER TABLE `user_checkin_checkout_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_visit_details`
--
ALTER TABLE `user_visit_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `warehouses`
--
ALTER TABLE `warehouses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `yards`
--
ALTER TABLE `yards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `yard_logs`
--
ALTER TABLE `yard_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `leads`
--
ALTER TABLE `leads`
  ADD CONSTRAINT `leads_lead_type_id_foreign` FOREIGN KEY (`lead_type_id`) REFERENCES `lead_type` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `leads_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `leads_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `lead_statuses`
--
ALTER TABLE `lead_statuses`
  ADD CONSTRAINT `lead_statuses_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `lead_statuses_lead_id_foreign` FOREIGN KEY (`lead_id`) REFERENCES `leads` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sales_orders`
--
ALTER TABLE `sales_orders`
  ADD CONSTRAINT `sales_orders_lead_id_foreign` FOREIGN KEY (`lead_id`) REFERENCES `leads` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `sales_orders_sales_user_id_foreign` FOREIGN KEY (`sales_user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `sales_orders_source_id_foreign` FOREIGN KEY (`source_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `sales_orders_yard_id_foreign` FOREIGN KEY (`yard_id`) REFERENCES `yards` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `yard_logs`
--
ALTER TABLE `yard_logs`
  ADD CONSTRAINT `yard_logs_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `yard_logs_sales_order_id_foreign` FOREIGN KEY (`sales_order_id`) REFERENCES `sales_orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `yard_logs_yard_id_foreign` FOREIGN KEY (`yard_id`) REFERENCES `yards` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
