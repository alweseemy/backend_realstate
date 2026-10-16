-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2025 at 06:44 PM
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
-- Database: `rent_eimrat`
--

-- --------------------------------------------------------

--
-- Table structure for table `agreements`
--

CREATE TABLE `agreements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `manger_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `fee` int(11) NOT NULL,
  `images` text DEFAULT NULL,
  `bank_account` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'بنك أبوظبي التجاري - Abu Dhabi Commercial', NULL, NULL),
(2, 'مصرف أبو ظبي الإسلامي - Abu Dhabi Islamic Bank', NULL, NULL),
(3, 'بنك أبوظبي التجاري -ADCB ', NULL, NULL),
(4, 'بنك عجمان - Ajman Bank ', NULL, NULL),
(5, 'البنك الأهلي الكويتي -Al Ahli of Kuwait', NULL, NULL),
(6, 'مصرف الرافدين - Al Rafidain', NULL, NULL),
(7, 'مصرف الهلال - Al Hilal Bank', NULL, NULL),
(8, 'البنك العربي الإفريقي الدولي', NULL, NULL),
(9, 'بنك برودا -Bank of Baroda', NULL, NULL),
(10, 'بنك الشارقة -Bank of Sharjah', NULL, NULL),
(11, 'Blom Bank France SA', NULL, NULL),
(12, 'Calyon Bank', NULL, NULL),
(13, 'الخليجي فرنسا -Al Khaliji France', NULL, NULL),
(14, 'بي إن بي باريبا -BNP Paribas Bank', NULL, NULL),
(15, 'إتش إس بي سي -HSBC', NULL, NULL),
(16, 'سيتي بنك -CitiBank ', NULL, NULL),
(17, 'البنك التجاري الدولي', NULL, NULL),
(18, ' دبي التجاري -Commercial Dubai', NULL, NULL),
(19, 'بنك دبي الإسلامي -Emirates NBD', NULL, NULL),
(20, 'الإمارات الإسلامي -Emirates Islamic', NULL, NULL),
(21, 'بنك أبوظبي الأول -First Abu Dhabi ', NULL, NULL),
(22, 'بنك الحبيب المحدود -Habib Limited', NULL, NULL),
(23, 'حبيب بنك إيه جي زيوريخ -AG Zurich', NULL, NULL),
(24, 'بنك الإستثمار -Invest Bank', NULL, NULL),
(25, 'بنك جاناتا -Janata Bank', NULL, NULL),
(26, 'Lloyds Bank TSB', NULL, NULL),
(27, 'بنك المشرق -Mashreq Bank', NULL, NULL),
(28, 'أبو ظبي الوطني -National Abu Dhabi', NULL, NULL),
(29, 'البحرين الوطني -National Bahrain', NULL, NULL),
(30, ' الفجيرة الوطني -Fujairah', NULL, NULL),
(31, 'الوطني العماني - National of Oman', NULL, NULL),
(32, 'راك بنك -RAK Bank', NULL, NULL),
(33, 'أم القيوين الوطني - Bank of UAQ', NULL, NULL),
(34, ' نور الإسلامي -Noor Islamic PJSC', NULL, NULL),
(35, 'الشارقة الإسلامي -Sharjah Islamic', NULL, NULL),
(36, 'ستاندرد تشارترد -Standard Chartered ', NULL, NULL),
(37, 'بنك الاتحاد الوطني -Union National ', NULL, NULL),
(38, '‎البنك العربي المتحد - United Arab ', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bank_checks`
--

CREATE TABLE `bank_checks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `number` varchar(255) NOT NULL,
  `amount` float DEFAULT NULL,
  `bank_id` int(11) NOT NULL,
  `from_date` date DEFAULT NULL,
  `to_date` date DEFAULT NULL,
  `details` text DEFAULT NULL,
  `invoice_id` int(11) DEFAULT NULL,
  `unit_id` int(11) DEFAULT NULL,
  `contract_id` int(11) DEFAULT NULL,
  `flat_id` int(11) DEFAULT NULL,
  `status` enum('not_received','received') NOT NULL DEFAULT 'not_received',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bank_checks`
--

INSERT INTO `bank_checks` (`id`, `user_id`, `number`, `amount`, `bank_id`, `from_date`, `to_date`, `details`, `invoice_id`, `unit_id`, `contract_id`, `flat_id`, `status`, `created_at`, `updated_at`) VALUES
(16, 138, '156465466', 3000, 19, '2023-01-01', '2023-03-31', NULL, 68, 34, 55, 353, 'received', '2023-04-18 12:31:58', '2025-09-04 16:59:05'),
(17, 138, '2', 3000, 19, '2023-04-01', '2023-06-30', NULL, 68, 34, 55, 353, 'not_received', '2023-04-18 12:31:58', '2023-04-18 12:31:58'),
(18, 138, '3', 3000, 19, '2023-07-01', '2023-09-30', NULL, 68, 34, 55, 353, 'not_received', '2023-04-18 12:31:58', '2023-04-18 12:31:58'),
(19, 138, '4', 3000, 19, '2023-10-01', '2023-12-31', NULL, 68, 34, 55, 353, 'not_received', '2023-04-18 12:31:58', '2023-04-18 12:31:58');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 'Ajman عجمان', 'active', '2023-02-19 12:58:24', '2023-02-24 12:59:14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contracts`
--

CREATE TABLE `contracts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `manger_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `owner_id` int(11) DEFAULT NULL,
  `contract_number` int(11) DEFAULT NULL,
  `unit_id` int(11) NOT NULL,
  `flat_id` int(11) DEFAULT NULL,
  `month` int(11) DEFAULT NULL,
  `price` double(8,2) NOT NULL,
  `amount` double NOT NULL,
  `credit_amount` float DEFAULT NULL,
  `insurance_credit` float DEFAULT NULL,
  `electricity_fee` float DEFAULT NULL,
  `water_fee` float DEFAULT NULL,
  `gas_fee` float DEFAULT NULL,
  `other_fees` float DEFAULT NULL,
  `insurance` int(11) DEFAULT NULL,
  `period` enum('monthly','quarterly','biannual','yearly') NOT NULL,
  `period_months` int(11) DEFAULT NULL,
  `details` text DEFAULT NULL,
  `start_date` int(11) NOT NULL,
  `end_date` int(11) DEFAULT NULL,
  `status` enum('progress','done','canceled','renew') NOT NULL DEFAULT 'progress',
  `unit_insurance_type` enum('bank_receipt','cash_money') DEFAULT NULL,
  `bank_id` int(11) DEFAULT NULL,
  `amount_bank` varchar(50) DEFAULT NULL,
  `unit_insurance_value` varchar(99) DEFAULT NULL,
  `garage_rent_amount` float DEFAULT NULL,
  `garage_id` int(11) DEFAULT NULL,
  `cnaceled_details` text DEFAULT NULL,
  `canceled_images` text DEFAULT NULL,
  `images` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contracts`
--

INSERT INTO `contracts` (`id`, `manger_id`, `user_id`, `owner_id`, `contract_number`, `unit_id`, `flat_id`, `month`, `price`, `amount`, `credit_amount`, `insurance_credit`, `electricity_fee`, `water_fee`, `gas_fee`, `other_fees`, `insurance`, `period`, `period_months`, `details`, `start_date`, `end_date`, `status`, `unit_insurance_type`, `bank_id`, `amount_bank`, `unit_insurance_value`, `garage_rent_amount`, `garage_id`, `cnaceled_details`, `canceled_images`, `images`, `created_at`, `updated_at`, `deleted_at`) VALUES
(55, 90, 138, 137, 1045, 34, 353, NULL, 12000.00, 12000, 0, 0, NULL, NULL, NULL, NULL, 0, 'quarterly', NULL, NULL, 1672531200, 1703980800, 'progress', 'bank_receipt', 4, '3000', '10', 0, NULL, NULL, NULL, 'contract/62301681799018.pdf', '2023-04-18 12:23:38', '2023-04-18 12:23:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `deportations`
--

CREATE TABLE `deportations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `report_id` int(11) NOT NULL,
  `amount` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `deportations`
--

INSERT INTO `deportations` (`id`, `invoice_id`, `unit_id`, `report_id`, `amount`, `created_at`, `updated_at`) VALUES
(13, 16, 1, 6920, 455.32, '2022-03-30 16:35:36', '2022-03-30 16:35:36'),
(14, 19, 1, 6920, 455.32, '2022-03-30 16:35:37', '2022-03-30 16:35:37'),
(15, 21, 1, 6920, 455.32, '2022-03-30 16:35:37', '2022-03-30 16:35:37'),
(16, 17, 17, 3261, 97.00, '2022-03-30 17:08:03', '2022-03-30 17:08:03');

-- --------------------------------------------------------

--
-- Table structure for table `flats`
--

CREATE TABLE `flats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `unit_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `flat_type_id` int(11) NOT NULL,
  `unit_number` varchar(255) NOT NULL,
  `area` varchar(50) DEFAULT NULL,
  `electric` varchar(255) DEFAULT NULL,
  `water` varchar(255) DEFAULT NULL,
  `room` varchar(50) DEFAULT NULL,
  `hall` varchar(50) DEFAULT NULL,
  `bathroom` varchar(50) DEFAULT NULL,
  `services` varchar(255) DEFAULT NULL,
  `floor` varchar(50) DEFAULT NULL,
  `speci_unit` int(11) DEFAULT NULL,
  `balcony` enum('available','unavailable') DEFAULT NULL,
  `sewage_meter` varchar(199) DEFAULT NULL,
  `images` text DEFAULT NULL,
  `status` enum('notrent','rented') NOT NULL DEFAULT 'notrent',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `flats`
--

INSERT INTO `flats` (`id`, `user_id`, `unit_id`, `name`, `flat_type_id`, `unit_number`, `area`, `electric`, `water`, `room`, `hall`, `bathroom`, `services`, `floor`, `speci_unit`, `balcony`, `sewage_meter`, `images`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(353, 90, 34, NULL, 1, '1', '850', NULL, NULL, '2', '1', '2', NULL, NULL, NULL, 'available', NULL, NULL, 'rented', '2023-04-03 13:16:28', '2023-04-18 12:23:38', NULL),
(354, 90, 34, NULL, 1, '2', '850', NULL, NULL, '2', '1', '2', NULL, NULL, NULL, 'available', NULL, NULL, 'notrent', '2023-04-03 13:16:28', '2023-04-18 12:11:14', NULL),
(355, 90, 34, NULL, 1, '3', '850', NULL, NULL, '2', '1', '2', NULL, NULL, NULL, 'available', NULL, NULL, 'notrent', '2023-04-03 13:16:28', '2023-04-18 12:11:14', NULL),
(356, 90, 34, NULL, 1, '4', '850', NULL, NULL, '2', '1', '2', NULL, NULL, NULL, 'available', NULL, NULL, 'notrent', '2023-04-03 13:16:28', '2023-04-18 12:11:14', NULL),
(357, 90, 34, NULL, 1, '5', '850', NULL, NULL, '2', '1', '2', NULL, NULL, NULL, 'available', NULL, NULL, 'notrent', '2023-04-03 13:16:28', '2023-04-18 12:11:14', NULL),
(358, 90, 34, NULL, 1, '6', '850', NULL, NULL, '2', '1', '2', NULL, NULL, NULL, 'available', NULL, NULL, 'notrent', '2023-04-03 13:16:28', '2023-04-18 12:11:14', NULL),
(359, 90, 34, NULL, 1, '7', '850', NULL, NULL, '2', '1', '2', NULL, NULL, NULL, 'available', NULL, NULL, 'notrent', '2023-04-03 13:16:28', '2023-04-18 12:11:14', NULL),
(360, 90, 34, NULL, 1, '8', '850', NULL, NULL, '2', '1', '2', NULL, NULL, NULL, 'available', NULL, NULL, 'notrent', '2023-04-03 13:16:28', '2023-04-18 12:11:14', NULL),
(361, 90, 34, NULL, 1, '9', '850', NULL, NULL, '2', '1', '2', NULL, NULL, NULL, 'available', NULL, NULL, 'notrent', '2023-04-03 13:16:28', '2023-04-18 12:11:14', NULL),
(362, 90, 34, NULL, 1, '10', '850', NULL, NULL, '2', '1', '2', NULL, NULL, NULL, 'available', NULL, NULL, 'notrent', '2023-04-03 13:16:28', '2023-04-18 12:11:14', NULL),
(363, 90, 34, NULL, 1, '11', '850', NULL, NULL, '2', '1', '2', NULL, NULL, NULL, 'available', NULL, NULL, 'notrent', '2023-04-03 13:16:28', '2023-04-18 12:12:17', NULL),
(364, 90, 34, NULL, 1, '12', '850', NULL, NULL, '2', '1', '2', NULL, NULL, NULL, 'available', NULL, NULL, 'notrent', '2023-04-03 13:16:28', '2023-04-18 12:12:17', NULL),
(365, 90, 34, NULL, 1, '13', '850', NULL, NULL, '2', '1', '2', NULL, NULL, NULL, 'available', NULL, NULL, 'notrent', '2023-04-03 13:16:28', '2023-04-18 12:12:17', NULL),
(366, 90, 34, NULL, 1, '14', '850', NULL, NULL, '2', '1', '2', NULL, NULL, NULL, 'available', NULL, NULL, 'notrent', '2023-04-03 13:16:28', '2023-04-18 12:12:17', NULL),
(367, 90, 34, NULL, 1, '15', '800', NULL, NULL, '1', '1', '3', NULL, NULL, NULL, 'available', NULL, NULL, 'notrent', '2023-04-03 13:16:28', '2023-04-18 12:12:17', NULL),
(368, 90, 34, NULL, 1, '16', '800', NULL, NULL, '1', '1', '3', NULL, NULL, NULL, 'available', NULL, NULL, 'notrent', '2023-04-03 13:16:28', '2023-04-18 12:12:17', NULL),
(369, 90, 34, NULL, 1, '17', '800', NULL, NULL, '1', '1', '3', NULL, NULL, NULL, 'available', NULL, NULL, 'notrent', '2023-04-03 13:16:28', '2023-04-18 12:12:17', NULL),
(370, 90, 34, NULL, 6, '1', '200', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, '', 'notrent', '2023-04-03 13:16:28', '2023-04-18 12:00:37', NULL),
(371, 90, 34, NULL, 6, '2', '200', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-03 13:16:28', '2023-04-18 12:09:22', NULL),
(372, 90, 34, NULL, 6, '3', '200', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-03 13:16:28', '2023-04-18 12:09:22', NULL),
(373, 90, 34, NULL, 6, '4', '200', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-03 13:16:28', '2023-04-18 12:16:06', NULL),
(374, 90, 34, NULL, 6, '5', '200', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-03 13:16:28', '2023-04-18 12:16:06', NULL),
(375, 90, 34, NULL, 6, '6', '200', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-03 13:16:28', '2023-04-18 12:07:48', NULL),
(376, 90, 34, NULL, 6, '7', '200', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, '', 'notrent', '2023-04-03 13:16:28', '2023-04-18 12:16:06', NULL),
(377, 90, 34, NULL, 6, '8', '200', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-03 13:16:28', '2023-04-18 12:16:06', NULL),
(378, 90, 34, NULL, 6, '9', '200', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-03 13:16:28', '2023-04-18 12:16:06', NULL),
(379, 90, 34, NULL, 6, '10', '200', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-03 13:16:28', '2023-04-18 12:16:06', NULL),
(380, 90, 34, NULL, 6, '11', '200', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-03 13:16:28', '2023-04-18 12:16:06', NULL),
(381, NULL, 35, NULL, 1, '1', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(382, NULL, 35, NULL, 1, '2', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(383, NULL, 35, NULL, 1, '3', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(384, NULL, 35, NULL, 1, '4', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(385, NULL, 35, NULL, 1, '5', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(386, NULL, 35, NULL, 1, '7', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(387, NULL, 35, NULL, 1, '8', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(388, NULL, 35, NULL, 1, '9', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(389, NULL, 35, NULL, 1, '10', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(390, NULL, 35, NULL, 1, '11', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(391, NULL, 35, NULL, 1, '12', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(392, NULL, 35, NULL, 1, '13', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(393, NULL, 35, NULL, 1, '14', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(394, NULL, 35, NULL, 1, '15', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(395, NULL, 35, NULL, 1, '16', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(396, NULL, 35, NULL, 1, '17', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(397, NULL, 35, NULL, 6, 'S 1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(398, NULL, 35, NULL, 6, 'S 2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(399, NULL, 35, NULL, 6, 'S 3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(400, NULL, 35, NULL, 6, 'S 4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(401, NULL, 35, NULL, 6, 'S 5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(402, NULL, 35, NULL, 6, 'S 6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(403, NULL, 35, NULL, 6, 'S 7', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(404, NULL, 35, NULL, 6, 'S 8', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(405, NULL, 35, NULL, 6, 'S 9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(406, NULL, 35, NULL, 6, 'S 10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(407, NULL, 35, NULL, 6, 'S 11', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(408, NULL, 36, NULL, 2, 'G1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(409, NULL, 36, NULL, 1, 'G2', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(410, NULL, 36, NULL, 1, '101', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(411, NULL, 36, NULL, 1, '102', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(412, NULL, 36, NULL, 1, '103', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(413, NULL, 36, NULL, 1, '104', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(414, NULL, 36, NULL, 1, '201', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(415, NULL, 36, NULL, 1, '202', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(416, NULL, 36, NULL, 1, '203', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(417, NULL, 36, NULL, 1, '204', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(418, NULL, 36, NULL, 1, '301', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(419, NULL, 36, NULL, 1, '302', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(420, NULL, 36, NULL, 1, '303', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(421, NULL, 36, NULL, 1, '304', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(422, NULL, 36, NULL, 1, '401', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(423, NULL, 36, NULL, 1, '402', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(424, NULL, 36, NULL, 1, '403', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(425, NULL, 36, NULL, 1, '404', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(426, NULL, 36, NULL, 6, 'S 1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(427, NULL, 36, NULL, 6, 'S 3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(428, NULL, 36, NULL, 6, 'S 4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(429, NULL, 37, NULL, 1, 'G 1', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(430, NULL, 37, NULL, 1, 'G 2', NULL, NULL, NULL, '3', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(431, NULL, 37, NULL, 1, '2', NULL, NULL, NULL, '3', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(432, NULL, 37, NULL, 1, '3', NULL, NULL, NULL, '3', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(433, NULL, 37, NULL, 1, '4', NULL, NULL, NULL, '3', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(434, NULL, 37, NULL, 1, '5', NULL, NULL, NULL, '3', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(435, NULL, 37, NULL, 1, '7', NULL, NULL, NULL, '3', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(436, NULL, 37, NULL, 1, '8', NULL, NULL, NULL, '3', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(437, NULL, 38, NULL, 1, '9', NULL, NULL, NULL, '3', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(438, NULL, 37, NULL, 1, 'R 1', NULL, NULL, NULL, '3', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(439, NULL, 37, NULL, 6, 'S 1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(440, NULL, 37, NULL, 6, 'S 2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(441, NULL, 37, NULL, 6, 'S 3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(442, NULL, 37, NULL, 6, 'S 4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(443, NULL, 37, NULL, 6, 'S 5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(444, NULL, 37, NULL, 6, 'S 6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(445, NULL, 39, NULL, 2, 'G 1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(446, NULL, 39, NULL, 1, '1', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(447, NULL, 39, NULL, 1, '2', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(448, NULL, 39, NULL, 1, '4', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(449, NULL, 39, NULL, 1, '5', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(450, NULL, 39, NULL, 1, '6', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(451, NULL, 39, NULL, 1, '7', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(452, NULL, 39, NULL, 1, '8', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(453, NULL, 39, NULL, 1, '9', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(454, NULL, 39, NULL, 1, '10', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(455, NULL, 39, NULL, 1, '11', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(456, NULL, 39, NULL, 1, '12', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(457, NULL, 39, NULL, 1, '13', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(458, NULL, 39, NULL, 6, 'S 1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(459, NULL, 39, NULL, 6, 'S 2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(460, NULL, 39, NULL, 6, 'S 3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(461, NULL, 39, NULL, 6, 'S 4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(462, NULL, 39, NULL, 6, 'S 5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(463, NULL, 40, NULL, 1, 'g 1', NULL, NULL, NULL, '3', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(464, NULL, 40, NULL, 1, '2', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(465, NULL, 40, NULL, 1, '3', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(466, NULL, 40, NULL, 1, '4', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(467, NULL, 40, NULL, 1, '5', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(468, NULL, 40, NULL, 1, '6', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(469, NULL, 40, NULL, 1, '7', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(470, NULL, 40, NULL, 6, 'S 1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(471, NULL, 40, NULL, 6, 'S 2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(472, NULL, 40, NULL, 6, 'S 3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(473, NULL, 41, NULL, 2, 'G 1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(474, NULL, 41, NULL, 1, '1', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(475, NULL, 41, NULL, 1, '2', NULL, NULL, NULL, '3', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(476, NULL, 41, NULL, 1, '3', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(477, NULL, 41, NULL, 1, '4', NULL, NULL, NULL, '3', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(478, NULL, 41, NULL, 6, 'S 1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(479, NULL, 41, NULL, 6, 'S 2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(480, NULL, 41, NULL, 6, 'S 3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(481, NULL, 41, NULL, 6, 'S 4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(482, NULL, 42, NULL, 1, '1', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(483, NULL, 42, NULL, 1, '2', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(484, NULL, 42, NULL, 1, '3', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(485, NULL, 42, NULL, 1, '4', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(486, NULL, 42, NULL, 1, '5', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(487, NULL, 42, NULL, 1, '6', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(488, NULL, 43, NULL, 1, 'G 1', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(489, NULL, 43, NULL, 1, 'G 2', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(490, NULL, 43, NULL, 1, 'G 3', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(491, NULL, 43, NULL, 1, '4', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(492, NULL, 43, NULL, 1, '5', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(493, NULL, 43, NULL, 1, '6', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(494, NULL, 43, NULL, 1, '7', NULL, NULL, NULL, '3', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(495, NULL, 43, NULL, 2, 'g1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(496, NULL, 43, NULL, 6, 'S 1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(497, NULL, 43, NULL, 6, 'S 2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(498, NULL, 43, NULL, 6, 'S 3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(499, NULL, 43, NULL, 6, 'S 5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(500, NULL, 43, NULL, 6, 'S 6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(501, NULL, 44, NULL, 1, 'G 2', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(502, NULL, 44, NULL, 1, '1', NULL, NULL, NULL, '3', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(503, NULL, 44, NULL, 1, '2', NULL, NULL, NULL, '3', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(504, NULL, 44, NULL, 1, '3', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(505, NULL, 44, NULL, 1, '4', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(506, NULL, 44, NULL, 1, '5', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(507, NULL, 44, NULL, 6, 'S 1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(508, NULL, 44, NULL, 6, 'S 2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(509, NULL, 44, NULL, 6, 'S 3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(510, NULL, 44, NULL, 6, 'S 4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(511, NULL, 44, NULL, 6, 'S 5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(512, NULL, 45, NULL, 1, 'G 1', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(513, NULL, 45, NULL, 2, 'G 2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(514, NULL, 45, NULL, 2, 'G 3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(515, NULL, 45, NULL, 1, 'G 4', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(516, NULL, 45, NULL, 1, 'G 6', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(517, NULL, 45, NULL, 1, '101', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(518, NULL, 45, NULL, 1, '102', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(519, NULL, 45, NULL, 1, '103', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(520, NULL, 45, NULL, 1, '104', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(521, NULL, 45, NULL, 2, '105', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(522, NULL, 45, NULL, 1, '106', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(523, NULL, 45, NULL, 1, '108', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(524, NULL, 45, NULL, 1, '109', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(525, NULL, 45, NULL, 2, '110', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(526, NULL, 45, NULL, 1, '201', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(527, NULL, 45, NULL, 1, '202', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(528, NULL, 45, NULL, 1, '203', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(529, NULL, 45, NULL, 1, '204', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(530, NULL, 45, NULL, 2, '205', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(531, NULL, 45, NULL, 1, '206', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(532, NULL, 45, NULL, 1, '207', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(533, NULL, 45, NULL, 1, '208', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(534, NULL, 45, NULL, 1, '301', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(535, NULL, 45, NULL, 1, '302', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(536, NULL, 45, NULL, 1, '303', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(537, NULL, 45, NULL, 1, '304', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(538, NULL, 45, NULL, 1, '306', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(539, NULL, 45, NULL, 1, '307', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(540, NULL, 45, NULL, 1, '308', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(541, NULL, 45, NULL, 1, '309', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(542, NULL, 45, NULL, 1, '401', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(543, NULL, 45, NULL, 1, '402', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(544, NULL, 45, NULL, 1, '403', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(545, NULL, 45, NULL, 1, '404', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(546, NULL, 45, NULL, 2, '405', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(547, NULL, 45, NULL, 1, '406', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(548, NULL, 45, NULL, 1, '408', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(549, NULL, 45, NULL, 1, '409', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(550, NULL, 45, NULL, 2, '410', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(551, NULL, 46, NULL, 1, '1', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(552, NULL, 46, NULL, 1, '2', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(553, NULL, 46, NULL, 1, '3', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(554, NULL, 46, NULL, 1, '4', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(555, NULL, 46, NULL, 1, '5', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(556, NULL, 46, NULL, 1, '6', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(557, NULL, 46, NULL, 1, '7', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(558, NULL, 46, NULL, 1, '8', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(559, NULL, 46, NULL, 1, '9', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(560, NULL, 46, NULL, 1, '10', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(561, NULL, 46, NULL, 1, '11', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(562, NULL, 46, NULL, 1, '12', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(563, NULL, 46, NULL, 1, '13', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(564, NULL, 46, NULL, 1, '14', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(565, NULL, 46, NULL, 1, '15', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(566, NULL, 46, NULL, 1, '16', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(567, NULL, 46, NULL, 1, '17', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(568, NULL, 46, NULL, 2, 'R1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(569, NULL, 46, NULL, 6, 'S 1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(570, NULL, 46, NULL, 6, 'S 2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(571, NULL, 46, NULL, 6, 'S 3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(572, NULL, 46, NULL, 6, 'S 4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(573, NULL, 46, NULL, 6, 'S 5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(574, NULL, 46, NULL, 6, 'S 6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(575, NULL, 46, NULL, 6, 'S 8', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(576, NULL, 46, NULL, 6, 'S 9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(577, NULL, 46, NULL, 6, 'S 10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(578, NULL, 46, NULL, 6, 'S 12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(579, NULL, 46, NULL, 6, 'S 13', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(580, NULL, 46, NULL, 6, 'S 14', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(581, NULL, 46, NULL, 6, 'S 15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(582, NULL, 46, NULL, 1, '18', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(583, NULL, 46, NULL, 6, 'S 16', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(584, NULL, 46, NULL, 6, 'S 17', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(585, NULL, 46, NULL, 6, 'S 18', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(586, NULL, 46, NULL, 6, 'S 19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(587, NULL, 46, NULL, 6, 'S 20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(588, NULL, 46, NULL, 6, 'S 22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(589, NULL, 47, NULL, 1, '101', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(590, NULL, 47, NULL, 1, '102', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(591, NULL, 47, NULL, 1, '104', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(592, NULL, 47, NULL, 1, '105', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(593, NULL, 47, NULL, 1, '106', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(594, NULL, 47, NULL, 1, '107', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(595, NULL, 47, NULL, 1, '108', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(596, NULL, 47, NULL, 1, '201', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(597, NULL, 47, NULL, 1, '202', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(598, NULL, 47, NULL, 1, '203', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(599, NULL, 47, NULL, 1, '204', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(600, NULL, 47, NULL, 1, '205', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(601, NULL, 47, NULL, 1, '206', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(602, NULL, 47, NULL, 1, '207', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(603, NULL, 47, NULL, 1, '208', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(604, NULL, 47, NULL, 1, '301', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(605, NULL, 47, NULL, 1, '302', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(606, NULL, 47, NULL, 1, '304', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(607, NULL, 47, NULL, 1, '305', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(608, NULL, 47, NULL, 1, '306', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(609, NULL, 47, NULL, 1, '307', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(610, NULL, 47, NULL, 1, '308', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(611, NULL, 47, NULL, 1, '401', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(612, NULL, 47, NULL, 1, '402', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(613, NULL, 47, NULL, 1, '403', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(614, NULL, 47, NULL, 1, '404', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(615, NULL, 47, NULL, 1, '405', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(616, NULL, 47, NULL, 1, '406', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(617, NULL, 47, NULL, 1, '407', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(618, NULL, 47, NULL, 1, '408', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(619, NULL, 47, NULL, 1, '501', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(620, NULL, 47, NULL, 1, '502', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(621, NULL, 47, NULL, 1, '503', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(622, NULL, 47, NULL, 1, '504', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(623, NULL, 47, NULL, 1, '505', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(624, NULL, 47, NULL, 1, '506', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(625, NULL, 47, NULL, 1, '507', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(626, NULL, 47, NULL, 1, '508', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(627, NULL, 47, NULL, 1, '601', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(628, NULL, 47, NULL, 1, '602', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(629, NULL, 47, NULL, 1, '603', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(630, NULL, 47, NULL, 1, '604', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(631, NULL, 47, NULL, 1, '605', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(632, NULL, 47, NULL, 1, '606', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(633, NULL, 47, NULL, 1, '607', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(634, NULL, 47, NULL, 1, '608', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(635, NULL, 47, NULL, 1, '701', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(636, NULL, 47, NULL, 1, '703', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(637, NULL, 47, NULL, 1, '706', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(638, NULL, 47, NULL, 1, '707', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(639, NULL, 47, NULL, 1, '708', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(640, NULL, 47, NULL, 1, '801', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(641, NULL, 47, NULL, 1, '802', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(642, NULL, 47, NULL, 1, '803', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(643, NULL, 47, NULL, 1, '804', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(644, NULL, 47, NULL, 1, '805', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(645, NULL, 47, NULL, 1, '806', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(646, NULL, 47, NULL, 1, '807', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(647, NULL, 47, NULL, 1, '808', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(648, NULL, 47, NULL, 1, 'S 1', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(649, NULL, 47, NULL, 1, 'S 2', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(650, NULL, 47, NULL, 6, 'S 3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(651, NULL, 47, NULL, 6, 's 4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(652, NULL, 48, NULL, 1, 'G 1', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(653, NULL, 48, NULL, 1, 'G 2', NULL, NULL, NULL, '3', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(654, NULL, 48, NULL, 1, 'G 3', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(655, NULL, 48, NULL, 1, 'G 4', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(656, NULL, 48, NULL, 1, 'G 5', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL);
INSERT INTO `flats` (`id`, `user_id`, `unit_id`, `name`, `flat_type_id`, `unit_number`, `area`, `electric`, `water`, `room`, `hall`, `bathroom`, `services`, `floor`, `speci_unit`, `balcony`, `sewage_meter`, `images`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(657, NULL, 48, NULL, 1, 'G 6', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(658, NULL, 48, NULL, 1, 'F 5', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(659, NULL, 48, NULL, 1, 'F 6', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(660, NULL, 48, NULL, 1, 'F 7', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(661, NULL, 48, NULL, 1, 'F 8', NULL, NULL, NULL, '3', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(662, NULL, 48, NULL, 1, 'F 9', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(663, NULL, 48, NULL, 1, 'F 10', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(664, NULL, 48, NULL, 1, 'F 11', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(665, NULL, 48, NULL, 1, 'F 12', NULL, NULL, NULL, '3', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(666, NULL, 48, NULL, 1, 'F 13', NULL, NULL, NULL, '3', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(667, NULL, 48, NULL, 6, 'S 1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(668, NULL, 48, NULL, 6, 'S 2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(669, NULL, 48, NULL, 6, 'S 3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(670, NULL, 48, NULL, 6, 'S 4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(671, NULL, 48, NULL, 6, 'S 5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(672, NULL, 48, NULL, 6, 'S 6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(673, NULL, 48, NULL, 6, 'S 7', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(674, NULL, 48, NULL, 6, 'S 10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(675, NULL, 48, NULL, 6, 'S 11', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(676, NULL, 48, NULL, 6, 'S12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(677, NULL, 49, NULL, 1, '1', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(678, NULL, 49, NULL, 1, '3', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(679, NULL, 49, NULL, 1, '4', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(680, NULL, 49, NULL, 1, '5', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(681, NULL, 49, NULL, 1, '6', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(682, NULL, 50, NULL, 1, 'G 1', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(683, NULL, 50, NULL, 1, 'G 2', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(684, NULL, 50, NULL, 1, 'G 3', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(685, NULL, 50, NULL, 2, 'G 4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(686, NULL, 50, NULL, 1, '101', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(687, NULL, 50, NULL, 1, '102', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(688, NULL, 50, NULL, 1, '103', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(689, NULL, 50, NULL, 1, '104', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(690, NULL, 50, NULL, 1, '105', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(691, NULL, 50, NULL, 1, '106', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(692, NULL, 50, NULL, 1, '201', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(693, NULL, 50, NULL, 1, '202', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(694, NULL, 50, NULL, 1, '203', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(695, NULL, 50, NULL, 6, 'S 1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(696, NULL, 50, NULL, 6, 'S 2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(697, NULL, 50, NULL, 6, 'S 3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(698, NULL, 50, NULL, 6, 'S 4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(699, NULL, 50, NULL, 6, 'S 5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(700, NULL, 50, NULL, 6, 'S 6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(701, NULL, 50, NULL, 6, 'S 7', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(702, NULL, 51, NULL, 6, 'S 1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(703, NULL, 51, NULL, 6, 'S 2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(704, NULL, 51, NULL, 6, 'S 3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(705, NULL, 51, NULL, 6, 'S 4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(706, NULL, 51, NULL, 6, 'S 5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(707, NULL, 51, NULL, 6, 'S 6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(708, NULL, 51, NULL, 6, 'S 7', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(709, NULL, 51, NULL, 6, 'S 8', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(710, NULL, 51, NULL, 1, 'R 1', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(711, NULL, 51, NULL, 1, 'R 2', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(712, NULL, 51, NULL, 1, 'R 3', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(713, NULL, 51, NULL, 1, 'R 5', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(714, NULL, 51, NULL, 1, 'R 6', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(715, NULL, 51, NULL, 1, 'R 7', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(716, NULL, 51, NULL, 4, 'SHED 1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(717, NULL, 51, NULL, 4, 'SHED 2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(718, NULL, 51, NULL, 4, 'SHED 3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(719, NULL, 52, NULL, 2, 'G 1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(720, NULL, 52, NULL, 1, '101', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(721, NULL, 52, NULL, 1, '102', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(722, NULL, 52, NULL, 1, '103', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(723, NULL, 52, NULL, 1, '104', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(724, NULL, 52, NULL, 1, '105', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(725, NULL, 52, NULL, 1, '106', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(726, NULL, 52, NULL, 1, '107', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(727, NULL, 52, NULL, 1, '108', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(728, NULL, 52, NULL, 1, '109', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(729, NULL, 52, NULL, 1, '201', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(730, NULL, 52, NULL, 1, '202', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(731, NULL, 52, NULL, 1, '203', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(732, NULL, 52, NULL, 1, '204', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(733, NULL, 52, NULL, 1, '205', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(734, NULL, 52, NULL, 1, '206', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(735, NULL, 52, NULL, 1, '207', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(736, NULL, 52, NULL, 1, '208', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(737, NULL, 52, NULL, 1, '209', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(738, NULL, 52, NULL, 1, '301', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(739, NULL, 52, NULL, 1, '302', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(740, NULL, 52, NULL, 1, '303', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(741, NULL, 52, NULL, 1, '304', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(742, NULL, 52, NULL, 1, '305', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(743, NULL, 52, NULL, 1, '306', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(744, NULL, 52, NULL, 1, '307', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(745, NULL, 52, NULL, 1, '308', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(746, NULL, 52, NULL, 1, '309', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(747, NULL, 52, NULL, 1, '401', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(748, NULL, 52, NULL, 1, '402', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(749, NULL, 52, NULL, 1, '403', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(750, NULL, 52, NULL, 1, '404', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(751, NULL, 52, NULL, 1, '405', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(752, NULL, 52, NULL, 1, '406', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(753, NULL, 52, NULL, 1, '407', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(754, NULL, 52, NULL, 1, '408', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(755, NULL, 52, NULL, 1, '409', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(756, NULL, 52, NULL, 1, '501', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(757, NULL, 52, NULL, 1, '502', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(758, NULL, 52, NULL, 1, '503', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(759, NULL, 52, NULL, 2, '504', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(760, NULL, 52, NULL, 6, 'S 1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(761, NULL, 52, NULL, 6, 'S 2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(762, NULL, 53, NULL, 2, 'G 1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(763, NULL, 53, NULL, 1, '101', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(764, NULL, 53, NULL, 1, '102', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(765, NULL, 53, NULL, 1, '103', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(766, NULL, 53, NULL, 1, '104', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(767, NULL, 53, NULL, 1, '105', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(768, NULL, 53, NULL, 1, '106', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(769, NULL, 53, NULL, 2, '107', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(770, NULL, 53, NULL, 2, '108', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(771, NULL, 53, NULL, 1, '109', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(772, NULL, 53, NULL, 1, '110', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(773, NULL, 53, NULL, 1, '201', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(774, NULL, 53, NULL, 1, '202', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(775, NULL, 53, NULL, 1, '203', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(776, NULL, 53, NULL, 1, '204', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(777, NULL, 53, NULL, 1, '205', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(778, NULL, 53, NULL, 1, '206', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(779, NULL, 53, NULL, 2, '207', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(780, NULL, 53, NULL, 2, '208', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(781, NULL, 53, NULL, 1, '209', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(782, NULL, 53, NULL, 1, '210', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(783, NULL, 53, NULL, 1, '301', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(784, NULL, 53, NULL, 1, '302', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(785, NULL, 53, NULL, 1, '303', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(786, NULL, 53, NULL, 1, '304', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(787, NULL, 53, NULL, 1, '305', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(788, NULL, 53, NULL, 1, '306', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(789, NULL, 53, NULL, 2, '307', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(790, NULL, 53, NULL, 2, '308', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(791, NULL, 53, NULL, 1, '309', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(792, NULL, 53, NULL, 1, '310', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(793, NULL, 53, NULL, 1, '401', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(794, NULL, 53, NULL, 1, '402', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(795, NULL, 53, NULL, 1, '403', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(796, NULL, 53, NULL, 1, '404', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(797, NULL, 53, NULL, 1, '405', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(798, NULL, 53, NULL, 1, '406', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(799, NULL, 53, NULL, 2, '407', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(800, NULL, 53, NULL, 2, '408', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(801, NULL, 53, NULL, 1, '409', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(802, NULL, 53, NULL, 1, '410', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(803, NULL, 53, NULL, 1, '501', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(804, NULL, 53, NULL, 1, '502', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(805, NULL, 53, NULL, 1, '503', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(806, NULL, 53, NULL, 1, '504', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(807, NULL, 53, NULL, 6, 'S 1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(808, NULL, 53, NULL, 6, 'S 2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(809, NULL, 53, NULL, 6, 'S 3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(810, NULL, 53, NULL, 6, 'S 4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(811, NULL, 53, NULL, 6, 'S 5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(812, NULL, 53, NULL, 6, 'S 6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(813, NULL, 53, NULL, 6, 'S 7', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(814, NULL, 53, NULL, 6, 'S 8', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(815, NULL, 54, NULL, 1, 'G 1', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(816, NULL, 54, NULL, 1, 'G 2', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(817, NULL, 54, NULL, 1, 'G  3', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(818, NULL, 54, NULL, 1, 'G 4', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(819, NULL, 54, NULL, 1, 'G 5', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(820, NULL, 54, NULL, 1, 'G 7', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(821, NULL, 54, NULL, 1, 'G 8', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(822, NULL, 54, NULL, 1, '101', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(823, NULL, 54, NULL, 1, '102', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(824, NULL, 54, NULL, 1, '103', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(825, NULL, 54, NULL, 1, '104', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(826, NULL, 54, NULL, 1, '105', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(827, NULL, 54, NULL, 1, '107', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(828, NULL, 54, NULL, 1, '108', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(829, NULL, 54, NULL, 1, '109', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(830, NULL, 54, NULL, 1, '110', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(831, NULL, 55, NULL, 1, 'G 1', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(832, NULL, 55, NULL, 1, 'G 2', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(833, NULL, 55, NULL, 1, 'G 3', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(834, NULL, 55, NULL, 1, 'G 4', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(835, NULL, 55, NULL, 1, 'G 5', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(836, NULL, 55, NULL, 1, 'G 8', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(837, NULL, 55, NULL, 1, '101', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(838, NULL, 55, NULL, 1, '102', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(839, NULL, 55, NULL, 1, '103', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(840, NULL, 55, NULL, 1, '104', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(841, NULL, 55, NULL, 1, '105', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(842, NULL, 55, NULL, 1, '106', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(843, NULL, 55, NULL, 1, '107', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(844, NULL, 55, NULL, 1, '108', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(845, NULL, 55, NULL, 1, '109', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(846, NULL, 55, NULL, 1, '110', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(847, NULL, 56, NULL, 1, 'G 2', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(848, NULL, 56, NULL, 2, 'G 3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(849, NULL, 56, NULL, 1, '101', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(850, NULL, 56, NULL, 1, '102', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(851, NULL, 56, NULL, 1, '103', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(852, NULL, 56, NULL, 1, '104', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(853, NULL, 56, NULL, 1, '105', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(854, NULL, 56, NULL, 1, '106', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(855, NULL, 56, NULL, 1, '107', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(856, NULL, 56, NULL, 1, '108', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(857, NULL, 56, NULL, 1, '109', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(858, NULL, 56, NULL, 1, '201', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(859, NULL, 56, NULL, 1, '202', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(860, NULL, 56, NULL, 1, '203', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(861, NULL, 56, NULL, 1, '204', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(862, NULL, 56, NULL, 1, '205', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(863, NULL, 56, NULL, 1, '206', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(864, NULL, 56, NULL, 1, '207', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(865, NULL, 56, NULL, 1, '208', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(866, NULL, 56, NULL, 1, '209', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(867, NULL, 56, NULL, 6, 'S 1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(868, NULL, 56, NULL, 6, 'S 3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(869, NULL, 56, NULL, 6, 'S 6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(870, NULL, 56, NULL, 6, 'S 7', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(871, NULL, 57, NULL, 2, 'G 1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(872, NULL, 57, NULL, 2, 'G 2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(873, NULL, 57, NULL, 1, '101', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(874, NULL, 57, NULL, 1, '102', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(875, NULL, 57, NULL, 1, '103', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:06', '2023-04-18 17:12:06', NULL),
(876, NULL, 57, NULL, 2, '104', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(877, NULL, 57, NULL, 1, '105', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(878, NULL, 57, NULL, 1, '201', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(879, NULL, 57, NULL, 1, '202', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(880, NULL, 57, NULL, 1, '203', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(881, NULL, 57, NULL, 2, '204', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(882, NULL, 57, NULL, 1, '205', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(883, NULL, 57, NULL, 1, '301', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(884, NULL, 57, NULL, 1, '302', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(885, NULL, 57, NULL, 1, '303', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(886, NULL, 57, NULL, 2, '304', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(887, NULL, 57, NULL, 1, '305', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(888, NULL, 57, NULL, 1, '401', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(889, NULL, 57, NULL, 1, '402', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(890, NULL, 57, NULL, 1, '403', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(891, NULL, 57, NULL, 2, '404', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(892, NULL, 57, NULL, 1, '405', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(893, NULL, 58, NULL, 1, 'G 1', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(894, NULL, 58, NULL, 1, 'G 2', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(895, NULL, 58, NULL, 2, 'G 3 (g7)', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(896, NULL, 58, NULL, 1, 'G 4', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(897, NULL, 58, NULL, 1, '101', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(898, NULL, 58, NULL, 1, '102', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(899, NULL, 58, NULL, 1, '103', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(900, NULL, 58, NULL, 1, '104', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(901, NULL, 58, NULL, 2, '105', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(902, NULL, 58, NULL, 1, '106', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(903, NULL, 58, NULL, 1, '201', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(904, NULL, 58, NULL, 1, '202', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(905, NULL, 58, NULL, 1, '203', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(906, NULL, 58, NULL, 1, '204', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(907, NULL, 58, NULL, 1, '206', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(908, NULL, 58, NULL, 1, '301', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(909, NULL, 58, NULL, 1, '302', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(910, NULL, 58, NULL, 6, 'S 1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(911, NULL, 58, NULL, 6, 'S 2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(912, NULL, 58, NULL, 6, 'S 3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(913, NULL, 58, NULL, 6, 'S 4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(914, NULL, 59, NULL, 1, '101', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(915, NULL, 59, NULL, 1, '102', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(916, NULL, 59, NULL, 1, '103', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(917, NULL, 59, NULL, 1, '104', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(918, NULL, 59, NULL, 1, '201', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(919, NULL, 59, NULL, 1, '202', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(920, NULL, 59, NULL, 1, '203', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(921, NULL, 59, NULL, 1, '204', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(922, NULL, 59, NULL, 1, '301', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(923, NULL, 59, NULL, 1, '302', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(924, NULL, 59, NULL, 1, '303', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(925, NULL, 59, NULL, 1, '304', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(926, NULL, 59, NULL, 1, '401', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(927, NULL, 59, NULL, 1, '402', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(928, NULL, 59, NULL, 1, '403', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(929, NULL, 59, NULL, 1, '404', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(930, NULL, 59, NULL, 6, 'S 1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(931, NULL, 59, NULL, 6, 'S 2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(932, NULL, 59, NULL, 6, 'S 3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(933, NULL, 60, NULL, 6, 'S 1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(934, NULL, 60, NULL, 6, 'S 2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(935, NULL, 60, NULL, 6, 'S 3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(936, NULL, 60, NULL, 6, 'S 4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(937, NULL, 61, NULL, 1, 'g 1', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(938, NULL, 61, NULL, 1, 'g 2+nb', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(939, NULL, 61, NULL, 1, 'g 4', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(940, NULL, 61, NULL, 1, 'g 5', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(941, NULL, 61, NULL, 1, '101', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(942, NULL, 61, NULL, 1, '102', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(943, NULL, 61, NULL, 1, '103', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(944, NULL, 61, NULL, 1, '104', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(945, NULL, 61, NULL, 1, '105', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(946, NULL, 61, NULL, 1, '107', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(947, NULL, 61, NULL, 1, '108', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(948, NULL, 61, NULL, 2, '109', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(949, NULL, 61, NULL, 1, '201', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(950, NULL, 61, NULL, 1, '202', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(951, NULL, 61, NULL, 1, '203', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(952, NULL, 61, NULL, 1, '204', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(953, NULL, 61, NULL, 1, '205', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(954, NULL, 61, NULL, 1, '206', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(955, NULL, 61, NULL, 1, '207', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(956, NULL, 61, NULL, 1, '208', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(957, NULL, 61, NULL, 2, '209', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(958, NULL, 61, NULL, 6, 'S 1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(959, NULL, 61, NULL, 6, 'S 2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL);
INSERT INTO `flats` (`id`, `user_id`, `unit_id`, `name`, `flat_type_id`, `unit_number`, `area`, `electric`, `water`, `room`, `hall`, `bathroom`, `services`, `floor`, `speci_unit`, `balcony`, `sewage_meter`, `images`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(960, NULL, 61, NULL, 6, 'S 3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(961, NULL, 61, NULL, 6, 'S 4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(962, NULL, 61, NULL, 6, 'S 5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(963, NULL, 62, NULL, 2, 'G1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(964, NULL, 62, NULL, 1, 'G2', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(965, NULL, 62, NULL, 1, 'G3', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(966, NULL, 62, NULL, 2, 'G4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(967, NULL, 62, NULL, 2, 'G5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(968, NULL, 62, NULL, 1, 'G6', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(969, NULL, 62, NULL, 1, '102', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(970, NULL, 62, NULL, 1, '104', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(971, NULL, 62, NULL, 2, '105', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(972, NULL, 62, NULL, 1, '106', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(973, NULL, 62, NULL, 1, '107', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(974, NULL, 62, NULL, 1, '201', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(975, NULL, 62, NULL, 1, '202', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(976, NULL, 62, NULL, 1, '203', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(977, NULL, 62, NULL, 1, '204', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(978, NULL, 62, NULL, 2, '205', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(979, NULL, 62, NULL, 1, '206', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(980, NULL, 62, NULL, 1, '207', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(981, NULL, 63, NULL, 1, '102', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(982, NULL, 63, NULL, 1, '103', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(983, NULL, 63, NULL, 1, '104', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(984, NULL, 63, NULL, 1, '105', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(985, NULL, 63, NULL, 1, '106', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(986, NULL, 63, NULL, 1, '107', NULL, NULL, NULL, '3', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(987, NULL, 63, NULL, 1, '108', NULL, NULL, NULL, '3', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(988, NULL, 63, NULL, 1, '201', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(989, NULL, 63, NULL, 1, '202', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(990, NULL, 63, NULL, 1, '203', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(991, NULL, 63, NULL, 1, '204', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(992, NULL, 63, NULL, 1, '205', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(993, NULL, 63, NULL, 1, '206', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(994, NULL, 63, NULL, 1, '207', NULL, NULL, NULL, '3', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(995, NULL, 63, NULL, 1, '208', NULL, NULL, NULL, '3', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(996, NULL, 63, NULL, 1, '209', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(997, NULL, 63, NULL, 1, '301', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(998, NULL, 63, NULL, 1, '302', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(999, NULL, 63, NULL, 1, '303', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1000, NULL, 63, NULL, 1, '304', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1001, NULL, 63, NULL, 1, '305', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1002, NULL, 63, NULL, 1, '306', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1003, NULL, 63, NULL, 1, '307', NULL, NULL, NULL, '3', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1004, NULL, 63, NULL, 1, '308', NULL, NULL, NULL, '3', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1005, NULL, 63, NULL, 1, '309', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1006, NULL, 63, NULL, 1, '401', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1007, NULL, 63, NULL, 1, '402', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1008, NULL, 63, NULL, 1, '403', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1009, NULL, 63, NULL, 1, '404', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1010, NULL, 63, NULL, 1, '405', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1011, NULL, 63, NULL, 1, '406', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1012, NULL, 63, NULL, 1, '407', NULL, NULL, NULL, '3', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1013, NULL, 63, NULL, 1, '408', NULL, NULL, NULL, '3', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1014, NULL, 63, NULL, 1, '409', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1015, NULL, 63, NULL, 1, '502', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1016, NULL, 63, NULL, 1, '503', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1017, NULL, 63, NULL, 1, '504', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1018, NULL, 63, NULL, 1, '505', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1019, NULL, 63, NULL, 1, '506', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1020, NULL, 63, NULL, 1, '507', NULL, NULL, NULL, '3', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1021, NULL, 63, NULL, 1, '508', NULL, NULL, NULL, '3', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1022, NULL, 63, NULL, 1, '509', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1023, NULL, 63, NULL, 1, '601', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1024, NULL, 63, NULL, 1, '602', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1025, NULL, 63, NULL, 1, '603', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1026, NULL, 63, NULL, 1, '604', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1027, NULL, 63, NULL, 1, '605', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1028, NULL, 63, NULL, 1, '606', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1029, NULL, 63, NULL, 1, '607', NULL, NULL, NULL, '3', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1030, NULL, 63, NULL, 1, '608', NULL, NULL, NULL, '3', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1031, NULL, 63, NULL, 1, '609', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1032, NULL, 63, NULL, 1, '701', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1033, NULL, 63, NULL, 1, '702', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1034, NULL, 63, NULL, 1, '703', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1035, NULL, 63, NULL, 1, '704', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1036, NULL, 63, NULL, 1, '705', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1037, NULL, 63, NULL, 1, '706', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1038, NULL, 63, NULL, 1, '707', NULL, NULL, NULL, '3', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1039, NULL, 63, NULL, 1, '708', NULL, NULL, NULL, '3', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1040, NULL, 63, NULL, 1, '709', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1041, NULL, 63, NULL, 1, '801', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1042, NULL, 63, NULL, 1, '805', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1043, NULL, 63, NULL, 1, '806', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1044, NULL, 63, NULL, 1, '807', NULL, NULL, NULL, '3', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1045, NULL, 63, NULL, 1, '808', NULL, NULL, NULL, '3', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1046, NULL, 63, NULL, 1, '809', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1047, NULL, 63, NULL, 6, 's 1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1048, NULL, 63, NULL, 6, 's 3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1049, NULL, 63, NULL, 6, 's 4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1050, NULL, 63, NULL, 6, 's 5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1051, NULL, 63, NULL, 6, 's 6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1052, NULL, 63, NULL, 6, 's 8', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1053, NULL, 63, NULL, 6, 's 9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1054, NULL, 64, NULL, 2, '101', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1055, NULL, 64, NULL, 1, '102', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1056, NULL, 64, NULL, 1, '103', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1057, NULL, 64, NULL, 1, '104', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1058, NULL, 64, NULL, 1, '105', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1059, NULL, 64, NULL, 1, '106', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1060, NULL, 64, NULL, 2, '201', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1061, NULL, 64, NULL, 1, '202', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1062, NULL, 64, NULL, 1, '203', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1063, NULL, 64, NULL, 1, '204', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1064, NULL, 64, NULL, 1, '205', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1065, NULL, 64, NULL, 1, '206', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1066, NULL, 64, NULL, 2, '301', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1067, NULL, 64, NULL, 1, '302', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1068, NULL, 64, NULL, 1, '303', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1069, NULL, 64, NULL, 1, '304', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1070, NULL, 64, NULL, 1, '305', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1071, NULL, 64, NULL, 1, '306', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1072, NULL, 64, NULL, 1, '402', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1073, NULL, 64, NULL, 1, '403', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1074, NULL, 64, NULL, 1, '404', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1075, NULL, 64, NULL, 1, '405', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1076, NULL, 64, NULL, 1, '406', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1077, NULL, 64, NULL, 6, 'S 1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1078, NULL, 64, NULL, 6, 'S 2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1079, NULL, 64, NULL, 6, 'S 3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1080, NULL, 64, NULL, 6, 'S 4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1081, NULL, 64, NULL, 6, 'S 5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1082, NULL, 64, NULL, 6, 'S 6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1083, NULL, 65, NULL, 1, '101', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1084, NULL, 65, NULL, 1, '102', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1085, NULL, 65, NULL, 1, '103', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1086, NULL, 65, NULL, 2, '104', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1087, NULL, 65, NULL, 1, '105', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1088, NULL, 65, NULL, 1, '106', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1089, NULL, 65, NULL, 1, '107', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1090, NULL, 65, NULL, 1, '201', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1091, NULL, 65, NULL, 1, '202', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1092, NULL, 65, NULL, 1, '203', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1093, NULL, 65, NULL, 2, '204', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1094, NULL, 65, NULL, 1, '205', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1095, NULL, 65, NULL, 1, '206', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1096, NULL, 65, NULL, 1, '207', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1097, NULL, 65, NULL, 6, 's 1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1098, NULL, 65, NULL, 6, 's 2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1099, NULL, 65, NULL, 6, 's 3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1100, NULL, 65, NULL, 6, 's 4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1101, NULL, 65, NULL, 6, 's 6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1102, NULL, 65, NULL, 6, 's 8', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1103, NULL, 65, NULL, 6, 's 9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1104, NULL, 65, NULL, 6, 's 10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1105, NULL, 66, NULL, 1, 'G 1', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1106, NULL, 66, NULL, 1, 'G 2', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1107, NULL, 66, NULL, 2, 'G 3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1108, NULL, 66, NULL, 2, '101', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1109, NULL, 66, NULL, 1, '102', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1110, NULL, 66, NULL, 1, '103', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1111, NULL, 66, NULL, 2, '104', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1112, NULL, 67, NULL, 1, '101', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1113, NULL, 67, NULL, 1, '102', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1114, NULL, 67, NULL, 1, '103', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1115, NULL, 67, NULL, 1, '104', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1116, NULL, 67, NULL, 1, '201', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1117, NULL, 67, NULL, 1, '202', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1118, NULL, 67, NULL, 1, '203', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1119, NULL, 67, NULL, 1, '204', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1120, NULL, 67, NULL, 1, '301', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1121, NULL, 67, NULL, 1, '302', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1122, NULL, 67, NULL, 1, '304', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1123, NULL, 67, NULL, 1, '401', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1124, NULL, 67, NULL, 1, '402', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1125, NULL, 67, NULL, 1, '403', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1126, NULL, 67, NULL, 1, '404', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1127, NULL, 67, NULL, 6, 'S 3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1128, NULL, 68, NULL, 1, 'w1', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1129, NULL, 68, NULL, 1, 'g 1', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1130, NULL, 68, NULL, 1, 'G2', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1131, NULL, 68, NULL, 2, 'G3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1132, NULL, 68, NULL, 2, 'G 4 watch', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1133, NULL, 68, NULL, 1, '101', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1134, NULL, 68, NULL, 1, '102', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1135, NULL, 68, NULL, 2, '103', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1136, NULL, 68, NULL, 1, '104', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1137, NULL, 68, NULL, 1, '105', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1138, NULL, 68, NULL, 1, '201', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1139, NULL, 68, NULL, 1, '202', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1140, NULL, 68, NULL, 2, '203', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1141, NULL, 68, NULL, 1, '204', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1142, NULL, 68, NULL, 1, '205', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1143, NULL, 68, NULL, 1, '301', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1144, NULL, 68, NULL, 1, '302', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1145, NULL, 68, NULL, 2, '303', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1146, NULL, 68, NULL, 1, '304', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1147, NULL, 68, NULL, 1, '305', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1148, NULL, 68, NULL, 1, '401', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1149, NULL, 68, NULL, 1, '402', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1150, NULL, 68, NULL, 2, '403', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1151, NULL, 68, NULL, 1, '404', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1152, NULL, 68, NULL, 1, '405', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1153, NULL, 69, NULL, 2, 'G 1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1154, NULL, 69, NULL, 1, '101', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1155, NULL, 69, NULL, 1, '102', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1156, NULL, 69, NULL, 1, '104', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1157, NULL, 69, NULL, 1, '105', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1158, NULL, 69, NULL, 1, '106', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1159, NULL, 69, NULL, 2, '107', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1160, NULL, 69, NULL, 2, '108', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1161, NULL, 69, NULL, 1, '109', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1162, NULL, 69, NULL, 1, '110', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1163, NULL, 69, NULL, 1, '201', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1164, NULL, 69, NULL, 1, '202', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1165, NULL, 69, NULL, 1, '203', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1166, NULL, 69, NULL, 1, '204', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1167, NULL, 69, NULL, 1, '205', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1168, NULL, 69, NULL, 1, '206', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1169, NULL, 69, NULL, 2, '207', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1170, NULL, 69, NULL, 2, '208', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1171, NULL, 69, NULL, 1, '209', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1172, NULL, 69, NULL, 1, '210', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1173, NULL, 69, NULL, 1, '301', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1174, NULL, 69, NULL, 1, '302', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1175, NULL, 69, NULL, 1, '303', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1176, NULL, 69, NULL, 1, '304', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1177, NULL, 69, NULL, 1, '305', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1178, NULL, 69, NULL, 1, '306', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1179, NULL, 69, NULL, 2, '307', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1180, NULL, 69, NULL, 2, '308', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1181, NULL, 69, NULL, 1, '309', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1182, NULL, 69, NULL, 1, '310', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1183, NULL, 69, NULL, 1, '401', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1184, NULL, 69, NULL, 1, '402', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1185, NULL, 69, NULL, 1, '403', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1186, NULL, 69, NULL, 1, '404', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1187, NULL, 69, NULL, 1, '405', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1188, NULL, 69, NULL, 1, '406', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1189, NULL, 69, NULL, 2, '407', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1190, NULL, 69, NULL, 2, '408', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1191, NULL, 69, NULL, 1, '409', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1192, NULL, 69, NULL, 1, '410', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1193, NULL, 69, NULL, 1, '501', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1194, NULL, 69, NULL, 1, '503', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1195, NULL, 69, NULL, 1, '504', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1196, NULL, 69, NULL, 6, 'S 1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1197, NULL, 69, NULL, 6, 'S 2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1198, NULL, 69, NULL, 6, 'S 3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1199, NULL, 69, NULL, 6, 'S 4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1200, NULL, 69, NULL, 6, 'S 5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1201, NULL, 69, NULL, 6, 'S 6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1202, NULL, 69, NULL, 6, 'S 7', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1203, NULL, 69, NULL, 6, 'S 8', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1204, NULL, 70, NULL, 1, '101', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1205, NULL, 70, NULL, 1, '102', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1206, NULL, 70, NULL, 1, '201', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1207, NULL, 70, NULL, 1, '202', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1208, NULL, 70, NULL, 1, '302', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1209, NULL, 70, NULL, 1, '401', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1210, NULL, 70, NULL, 1, '402', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1211, NULL, 70, NULL, 6, 'S 2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1212, NULL, 70, NULL, 6, 'S 3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1213, NULL, 71, NULL, 1, '101', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1214, NULL, 71, NULL, 1, '102', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1215, NULL, 71, NULL, 1, '103', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1216, NULL, 71, NULL, 1, '104', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1217, NULL, 71, NULL, 1, '105', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1218, NULL, 71, NULL, 1, '106', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1219, NULL, 71, NULL, 1, '107', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1220, NULL, 71, NULL, 1, '108', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1221, NULL, 71, NULL, 1, '201', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1222, NULL, 71, NULL, 1, '202', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1223, NULL, 71, NULL, 1, '203', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1224, NULL, 71, NULL, 1, '204', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1225, NULL, 71, NULL, 1, '205', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1226, NULL, 71, NULL, 1, '206', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1227, NULL, 71, NULL, 1, '207', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1228, NULL, 71, NULL, 1, '208', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1229, NULL, 71, NULL, 1, '301', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1230, NULL, 71, NULL, 1, '302', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1231, NULL, 71, NULL, 1, '303', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1232, NULL, 71, NULL, 1, '304', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1233, NULL, 71, NULL, 1, '305', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1234, NULL, 71, NULL, 1, '306', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1235, NULL, 71, NULL, 1, '307', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1236, NULL, 71, NULL, 1, '308', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1237, NULL, 71, NULL, 1, '401', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1238, NULL, 71, NULL, 1, '402', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1239, NULL, 71, NULL, 1, '403', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1240, NULL, 71, NULL, 1, '404', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1241, NULL, 71, NULL, 1, '405', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1242, NULL, 71, NULL, 1, '406', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1243, NULL, 71, NULL, 1, '408', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1244, NULL, 71, NULL, 6, 'S 1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1245, NULL, 71, NULL, 6, 'S 3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1246, NULL, 71, NULL, 6, 'S 6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1247, NULL, 72, NULL, 1, 'G 1', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1248, NULL, 72, NULL, 1, ' G 2', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1249, NULL, 72, NULL, 1, '101', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1250, NULL, 72, NULL, 1, '102', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1251, NULL, 72, NULL, 1, '103', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1252, NULL, 72, NULL, 1, '104', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1253, NULL, 72, NULL, 1, '106', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1254, NULL, 72, NULL, 1, '107', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1255, NULL, 72, NULL, 1, '108', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1256, NULL, 72, NULL, 1, '109', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1257, NULL, 72, NULL, 6, 'S 1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1258, NULL, 72, NULL, 6, 'S 4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1259, NULL, 72, NULL, 4, 'Shed', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1260, NULL, 73, NULL, 1, '101', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1261, NULL, 73, NULL, 1, '102', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL);
INSERT INTO `flats` (`id`, `user_id`, `unit_id`, `name`, `flat_type_id`, `unit_number`, `area`, `electric`, `water`, `room`, `hall`, `bathroom`, `services`, `floor`, `speci_unit`, `balcony`, `sewage_meter`, `images`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1262, NULL, 73, NULL, 2, '103', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1263, NULL, 73, NULL, 1, '201', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1264, NULL, 73, NULL, 1, '202', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1265, NULL, 73, NULL, 2, '203', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1266, NULL, 73, NULL, 1, '301', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1267, NULL, 73, NULL, 1, '302', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1268, NULL, 73, NULL, 2, '303', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1269, NULL, 73, NULL, 6, 'S 2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1270, NULL, 73, NULL, 6, 'S 3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1271, NULL, 74, NULL, 1, '101', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1272, NULL, 74, NULL, 1, '102', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1273, NULL, 74, NULL, 1, '103', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1274, NULL, 74, NULL, 1, '104', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1275, NULL, 74, NULL, 1, '201', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1276, NULL, 74, NULL, 1, '202', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1277, NULL, 74, NULL, 1, '203', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1278, NULL, 74, NULL, 1, '204', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1279, NULL, 74, NULL, 1, '301', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1280, NULL, 74, NULL, 1, '302', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1281, NULL, 74, NULL, 1, '303', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1282, NULL, 74, NULL, 1, '304', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1283, NULL, 74, NULL, 1, '401', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1284, NULL, 74, NULL, 1, '402', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1285, NULL, 74, NULL, 1, '403', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1286, NULL, 74, NULL, 1, '404', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1287, NULL, 74, NULL, 6, 's 1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1288, NULL, 74, NULL, 6, 's 2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1289, NULL, 74, NULL, 6, 's 3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1290, NULL, 74, NULL, 6, 's4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1291, NULL, 75, NULL, 1, 'G 1', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1292, NULL, 75, NULL, 2, 'G 2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1293, NULL, 75, NULL, 2, '101', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1294, NULL, 75, NULL, 1, '103', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1295, NULL, 75, NULL, 1, '104', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1296, NULL, 75, NULL, 2, '201', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1297, NULL, 75, NULL, 1, '202', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1298, NULL, 75, NULL, 1, '203', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1299, NULL, 75, NULL, 1, '204', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1300, NULL, 75, NULL, 2, '301', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1301, NULL, 75, NULL, 1, '302', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1302, NULL, 75, NULL, 1, '303', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1303, NULL, 75, NULL, 1, '304', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1304, NULL, 75, NULL, 2, '401', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1305, NULL, 75, NULL, 1, '402', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1306, NULL, 75, NULL, 1, '403', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1307, NULL, 75, NULL, 1, '404', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1308, NULL, 75, NULL, 6, 's 1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1309, NULL, 75, NULL, 6, 's 2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1310, NULL, 76, NULL, 2, 'F G1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1311, NULL, 76, NULL, 1, '101', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1312, NULL, 76, NULL, 1, '102', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1313, NULL, 76, NULL, 1, '103', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1314, NULL, 76, NULL, 1, '104', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1315, NULL, 76, NULL, 1, '201', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1316, NULL, 76, NULL, 1, '202', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1317, NULL, 76, NULL, 1, '203', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1318, NULL, 76, NULL, 1, '204', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1319, NULL, 76, NULL, 1, '301', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1320, NULL, 76, NULL, 1, '302', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1321, NULL, 76, NULL, 1, '304', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1322, NULL, 76, NULL, 1, '403', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1323, NULL, 76, NULL, 1, '404', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1324, NULL, 77, NULL, 2, '101', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1325, NULL, 77, NULL, 1, '102', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1326, NULL, 77, NULL, 1, '103', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1327, NULL, 77, NULL, 1, '104', NULL, NULL, NULL, '3', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1328, NULL, 77, NULL, 2, '201', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1329, NULL, 77, NULL, 1, '202', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1330, NULL, 77, NULL, 1, '203', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1331, NULL, 77, NULL, 1, '204', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1332, NULL, 77, NULL, 2, '301', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1333, NULL, 77, NULL, 1, '302', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1334, NULL, 77, NULL, 1, '303', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1335, NULL, 77, NULL, 1, '304', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1336, NULL, 77, NULL, 1, '401', NULL, NULL, NULL, '3', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1337, NULL, 77, NULL, 1, '402', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1338, NULL, 77, NULL, 1, '403', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1339, NULL, 77, NULL, 1, '404', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1340, NULL, 77, NULL, 6, 'S 1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1341, NULL, 77, NULL, 6, 'S 2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1342, NULL, 77, NULL, 6, 'S 3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1343, NULL, 78, NULL, 1, 'G6', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1344, NULL, 78, NULL, 1, 'G7', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1345, NULL, 78, NULL, 2, 'G8', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1346, NULL, 78, NULL, 1, '101', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1347, NULL, 78, NULL, 1, '102', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1348, NULL, 78, NULL, 1, '103', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1349, NULL, 78, NULL, 1, '104', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1350, NULL, 78, NULL, 1, '105', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1351, NULL, 78, NULL, 1, '106', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1352, NULL, 78, NULL, 2, '107', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1353, NULL, 78, NULL, 2, '108', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1354, NULL, 78, NULL, 6, 'S 3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1355, NULL, 78, NULL, 6, 'S 4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1356, NULL, 79, NULL, 2, 'G1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1357, NULL, 79, NULL, 1, '102', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1358, NULL, 79, NULL, 2, '103', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1359, NULL, 79, NULL, 1, '104', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1360, NULL, 79, NULL, 1, '105', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1361, NULL, 79, NULL, 1, '202', NULL, NULL, NULL, '2', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1362, NULL, 79, NULL, 6, 'S 3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1363, NULL, 80, NULL, 2, 'G 4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1364, NULL, 80, NULL, 2, 'G 5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1365, NULL, 80, NULL, 2, '101', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1366, NULL, 80, NULL, 2, '102', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1367, NULL, 80, NULL, 2, '201', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1368, NULL, 80, NULL, 2, '202', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1369, NULL, 80, NULL, 2, '203', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1370, NULL, 80, NULL, 1, '301', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1371, NULL, 80, NULL, 6, 'S 1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1372, NULL, 80, NULL, 6, 'S 2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1373, NULL, 80, NULL, 6, 'S 3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrent', '2023-04-18 17:12:07', '2023-04-18 17:12:07', NULL),
(1374, 90, 81, NULL, 1, '1', '50', NULL, NULL, '3', '1', '4', NULL, NULL, NULL, 'available', NULL, NULL, 'notrent', '2025-09-03 22:23:02', '2025-09-03 22:23:02', NULL),
(1375, 90, 81, NULL, 1, '1', '50', NULL, NULL, '4', '1', '4', NULL, NULL, NULL, 'available', NULL, NULL, 'notrent', '2025-09-03 22:23:02', '2025-09-03 22:23:02', NULL),
(1376, 90, 81, NULL, 1, '1', '50', NULL, NULL, '4', '1', '5', NULL, NULL, NULL, 'available', NULL, NULL, 'notrent', '2025-09-03 22:23:02', '2025-09-03 22:23:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `flat_types`
--

CREATE TABLE `flat_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `flat_types`
--

INSERT INTO `flat_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'شقة -apartment', '2023-02-18 12:03:43', '2023-02-24 13:08:25'),
(2, 'استوديو - studio', '2023-02-18 12:03:53', '2023-02-24 13:07:59'),
(3, 'موقف سيارات - parking', '2023-02-18 12:04:05', '2023-02-24 13:09:25'),
(4, 'مستودع - storehouse', '2023-02-18 12:04:20', '2023-02-24 13:09:15'),
(5, 'مكتب - office', '2023-02-18 12:04:29', '2023-02-24 13:09:03'),
(6, 'محل - Shop', '2023-02-18 12:04:36', '2023-02-24 13:08:33');

-- --------------------------------------------------------

--
-- Table structure for table `hoods`
--

CREATE TABLE `hoods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `city_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hoods`
--

INSERT INTO `hoods` (`id`, `name`, `city_id`, `created_at`, `updated_at`) VALUES
(1, 'حي زايد - zaied', 3, '2023-02-19 12:59:25', '2023-02-19 12:59:25'),
(2, 'الاوسط Al Awsat', 3, '2023-03-22 19:36:40', '2023-03-22 19:36:40'),
(4, 'العالية Al Aliyah', 3, '2023-03-22 19:36:40', '2023-03-22 19:36:40'),
(5, 'الحميدية Al Hamaidiyah 1 1', 3, '2023-03-22 19:36:40', '2023-03-22 19:36:40'),
(6, 'الحميدية Al Hamaidiyah 2 2', 3, '2023-03-22 19:36:40', '2023-03-22 19:36:40'),
(7, 'الجرف1 1 Al Jurf', 3, '2023-03-22 19:36:40', '2023-03-22 19:36:40'),
(8, 'الجرف Al Jurf 2 2', 3, '2023-03-22 19:36:40', '2023-03-22 19:36:40'),
(9, 'الرقايب Al Raqayib 1 1', 3, '2023-03-22 19:36:40', '2023-03-22 19:36:40'),
(10, 'الرقايب 2 2 Al Raqayib', 3, '2023-03-22 19:36:40', '2023-03-22 19:36:40'),
(11, 'الجنوبي Al Janubi', 3, '2023-03-22 19:36:40', '2023-03-22 19:36:40'),
(12, 'عجمان الصناعية 1 Ajman IND1', 3, '2023-03-22 19:36:40', '2023-03-22 19:36:40'),
(13, 'عجمان الصناعية 2 Ajman IND2', 3, '2023-03-22 19:36:40', '2023-03-22 19:36:40'),
(14, 'المويهات 1 Al Muwaihat 1', 3, '2023-03-22 19:36:40', '2023-03-22 19:36:40'),
(15, 'المويهات 2 Al Muwaihat 2', 3, '2023-03-22 19:36:40', '2023-03-22 19:36:40'),
(16, 'المويهات 3 Al Muwaihat 3', 3, '2023-03-22 19:36:40', '2023-03-22 19:36:40'),
(17, 'الروضة 1 Rawdha 1', 3, '2023-03-22 19:36:40', '2023-03-22 19:36:40'),
(18, 'الروضة 2 Rawdha 2', 3, '2023-03-22 19:36:40', '2023-03-22 19:36:40'),
(19, 'الروضة 3 Rawdha 3', 3, '2023-03-22 19:36:40', '2023-03-22 19:36:40'),
(20, 'التلة 1 Al Talah 1', 3, '2023-03-22 19:36:40', '2023-03-22 19:36:40'),
(21, 'التلة 2 Al Talah 2', 3, '2023-03-22 19:36:40', '2023-03-22 19:36:40'),
(22, 'مدينة محمد بن زايد 1 Mohamed Bin Zayed City 1', 3, '2023-03-22 19:36:40', '2023-03-22 19:36:40'),
(23, 'مدينة محمد بن زايد 2 Mohamed Bin Zayed City 1', 3, '2023-03-22 19:36:40', '2023-03-22 19:36:40'),
(24, 'المنامة Manama', 3, '2023-03-22 19:36:40', '2023-03-22 19:36:40'),
(25, 'الباهية Bahya', 3, '2023-03-22 19:36:40', '2023-03-22 19:36:40'),
(26, 'الجرف الصناعية 1 Jurf Industrial 1', 3, '2023-03-22 19:36:40', '2023-03-22 19:36:40'),
(27, 'الجرف الصناعية 2 Jurf Industrial 2', 3, '2023-03-22 19:36:40', '2023-03-22 19:36:40'),
(28, 'الجرف الصناعية 3 Jurf Industrial 3', 3, '2023-03-22 19:36:40', '2023-03-22 19:36:40'),
(29, 'العامرة Aamra', 3, '2023-03-22 19:36:40', '2023-03-22 19:36:40'),
(30, 'الحليو 1 Al Heliw 1', 3, '2023-03-22 19:36:40', '2023-03-22 19:36:40'),
(31, 'الحليو 2 Al Heliw 2', 3, '2023-03-22 19:36:40', '2023-03-22 19:36:40'),
(32, 'الياسمين Yasmeen', 3, '2023-03-22 19:36:40', '2023-03-22 19:36:40'),
(33, 'الزاهية Zahya', 3, '2023-03-22 19:36:40', '2023-03-22 19:36:40'),
(34, 'الزورا Al Zorah', 3, '2023-03-22 19:36:40', '2023-03-22 19:36:40'),
(35, 'النخيل 1 Nakheel 1', 3, '2023-03-22 19:36:40', '2023-03-22 19:36:40'),
(36, 'النخيل 2 Nakheel 2', 3, '2023-03-22 19:36:40', '2023-03-22 19:36:40'),
(37, 'النعيمية 1 Nuaimeya 1', 3, '2023-03-22 19:36:40', '2023-03-22 19:36:40'),
(38, 'النعيمية 2 Nuaimeya 2', 3, '2023-03-22 19:36:40', '2023-03-22 19:36:40'),
(39, 'النعيمية 3 Nuaimeya 3', 3, '2023-03-22 19:36:40', '2023-03-22 19:36:40'),
(40, 'الراشدية 1 Rashideya 1', 3, '2023-03-22 19:36:40', '2023-03-22 19:36:40'),
(41, 'الراشدية 2 Rashideya 2', 3, '2023-03-22 19:36:40', '2023-03-22 19:36:40'),
(42, 'الراشدية 3 Rashideya 3', 3, '2023-03-22 19:36:40', '2023-03-22 19:36:40'),
(43, 'الرميلة 1 Rumaila 1', 3, '2023-03-22 19:36:40', '2023-03-22 19:36:40'),
(44, 'الرميلة 2 Rumaila 1', 3, '2023-03-22 19:36:40', '2023-03-22 19:36:40'),
(45, 'الرميلة 3 Rumaila 3', 3, '2023-03-22 19:36:40', '2023-03-22 19:36:40'),
(46, 'الصفيا Safia', 3, '2023-03-22 19:36:40', '2023-03-22 19:36:40'),
(47, 'ليوارة 1 Liwara 1', 3, '2023-03-22 19:36:40', '2023-03-22 19:36:40'),
(48, 'ليوارة 2 Liwara 2', 3, '2023-03-22 19:36:40', '2023-03-22 19:36:40'),
(49, 'مشيرف Musharif', 3, '2023-03-22 19:36:40', '2023-03-22 19:36:40'),
(50, 'مصفوت Massfout', 3, '2023-03-22 19:36:40', '2023-03-22 19:36:40');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `manger_id` int(11) DEFAULT NULL,
  `owner_id` int(11) DEFAULT NULL,
  `type` int(11) NOT NULL,
  `withdrawl` enum('yes','no') NOT NULL DEFAULT 'no',
  `date` date NOT NULL,
  `amount` double(8,2) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `flat_id` int(11) DEFAULT NULL,
  `details` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `contract_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `maintenance_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `manger_id`, `owner_id`, `type`, `withdrawl`, `date`, `amount`, `unit_id`, `flat_id`, `details`, `image`, `contract_id`, `created_at`, `updated_at`, `deleted_at`, `maintenance_id`) VALUES
(68, 90, 137, 1, 'no', '2023-04-18', 12000.00, 34, 353, 'for rent 01.01.2023 to 31.12.2032 Express Building Rumailah', NULL, 55, '2023-04-18 12:31:58', '2023-04-18 12:31:58', NULL, NULL),
(69, 90, 137, 1, 'no', '2023-04-18', 3000.00, 34, 353, 'for rent 01.01.23 to 31.03.23', NULL, 55, '2023-04-18 13:49:41', '2023-04-18 13:49:41', NULL, NULL),
(70, NULL, 137, 1, 'no', '2025-09-04', 3000.00, 34, 353, NULL, NULL, 55, '2025-09-04 16:59:05', '2025-09-04 16:59:05', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `invoicetypes`
--

CREATE TABLE `invoicetypes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` enum('income','outcome') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoicetypes`
--

INSERT INTO `invoicetypes` (`id`, `name`, `type`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'تحصيل الإيجار  - Rent collection', 'income', '2022-02-13 09:37:31', '2023-02-20 12:22:31', NULL),
(2, 'مصاريف صيانة - maintenance', 'outcome', '2022-02-13 10:38:02', '2023-02-20 12:22:37', NULL),
(4, 'رسوم مياه - Water fees', 'outcome', '2022-04-02 13:09:37', '2023-02-24 13:24:00', NULL),
(5, 'رسوم كهرباء - Electricity fees', 'outcome', '2022-04-02 13:10:05', '2023-02-24 13:24:02', NULL),
(6, 'رسوم غاز - Gas fees', 'outcome', '2022-04-02 13:10:18', '2023-02-24 13:24:06', NULL),
(8, 'مصاريف اخري - Other expenses', 'outcome', '2023-02-09 10:05:40', '2023-02-24 13:24:16', NULL),
(9, 'test', 'income', '2023-03-29 19:00:46', '2023-03-29 19:00:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `maintenance_forms`
--

CREATE TABLE `maintenance_forms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `unit` varchar(255) DEFAULT NULL,
  `apartment` varchar(255) DEFAULT NULL,
  `maintenance_type` varchar(255) DEFAULT NULL,
  `details` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `maintenance_forms`
--

INSERT INTO `maintenance_forms` (`id`, `name`, `phone`, `unit`, `apartment`, `maintenance_type`, `details`, `created_at`, `updated_at`) VALUES
(3, 'محمود احمد', '01099608016', 'عقار الازهار', 'رقم 3553', 'مشكلة المياه', 'مشكلة المياه مشكلة المياه مشكلة المياه مشكلة المياه مشكلة المياه مشكلة المياه مشكلة المياه', '2023-02-25 11:53:08', '2023-02-25 11:53:08'),
(4, 'ghanem', '01099608016', 'عقار الازهار', '42578', 'مشكلة المياه', 'dqwdwqd', '2023-02-27 11:02:59', '2023-02-27 11:02:59');

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
(4, '2021_06_07_163709_create_articles_table', 1),
(5, '2016_06_01_000001_create_oauth_auth_codes_table', 2),
(6, '2016_06_01_000002_create_oauth_access_tokens_table', 2),
(7, '2016_06_01_000003_create_oauth_refresh_tokens_table', 2),
(8, '2016_06_01_000004_create_oauth_clients_table', 2),
(9, '2016_06_01_000005_create_oauth_personal_access_clients_table', 2),
(11, '2021_06_08_183730_create_permission_tables', 3),
(12, '2020_09_21_000000_create_canvas_tables', 4),
(13, '2021_06_17_140411_create_teams_table', 5),
(14, '2021_06_18_234531_create_events_table', 6),
(15, '2021_07_03_140428_create_services_table', 7),
(16, '2022_01_25_130101_create_order_types_table', 8),
(17, '2022_01_27_140526_create_units_table', 9),
(18, '2022_01_27_185136_create_flats_table', 10),
(19, '2022_01_29_170820_create_agreements_table', 11),
(20, '2022_01_29_195816_create_contracts_table', 12),
(21, '2022_02_05_180854_create_orders_table', 13),
(22, '2022_02_07_112026_create_invoices_table', 14),
(23, '2022_02_13_112807_create_invoicetypes_table', 15),
(24, '2022_02_20_171328_create_payments_table', 16),
(25, '2022_03_30_154541_create_deportations_table', 17),
(26, '2023_02_17_121014_create_hoods_table', 18),
(27, '2023_02_18_132327_create_flat_types_table', 19),
(28, '2023_02_24_171403_create_maintenance_forms_table', 20),
(29, '2023_03_05_144545_create_service_contracts_table', 21),
(30, '2023_03_11_150430_create_owner_bank_accounts_table', 22),
(31, '2023_03_11_170831_create_banks_table', 23),
(32, '2023_03_11_180615_create_bank_checks_table', 24),
(33, '2023_03_22_145247_create_transfers_table', 25);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\User', 1),
(1, 'App\\Models\\User', 90),
(2, 'App\\Models\\User', 89),
(2, 'App\\Models\\User', 105),
(2, 'App\\Models\\User', 106),
(2, 'App\\Models\\User', 115),
(1, 'App\\Models\\User', 106),
(2, 'App\\Models\\User', 1111);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `manger_id` int(11) NOT NULL,
  `owner_id` int(11) DEFAULT NULL,
  `order_type` int(11) NOT NULL,
  `date` date NOT NULL,
  `close_date` date DEFAULT NULL,
  `unit_id` int(11) NOT NULL,
  `flat_id` int(11) DEFAULT NULL,
  `applicant` varchar(40) NOT NULL,
  `maintenance_attachments` text DEFAULT NULL,
  `invoice_attachments` text DEFAULT NULL,
  `status` enum('new','progress','done','canceled') NOT NULL DEFAULT 'new',
  `amount` varchar(30) DEFAULT NULL,
  `details` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_types`
--

CREATE TABLE `order_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_types`
--

INSERT INTO `order_types` (`id`, `name`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'جميع الأبواب - All Doors', 'active', '2023-02-20 10:51:33', '2023-03-14 06:48:11', NULL),
(3, 'بلاط الأرضيات -Floor Tiles', 'active', NULL, NULL, NULL),
(4, 'طلاء الجدران -Wall paintin', 'active', NULL, NULL, NULL),
(5, 'سقف -Ceiling', 'active', NULL, NULL, NULL),
(6, 'نوافذ -Windows', 'active', NULL, NULL, NULL),
(7, 'إطار شبكي ذبابة و شبكة -Flymesh frame & net', 'active', NULL, NULL, NULL),
(8, 'تركيبات إضاءة -Light Fixtures', 'active', NULL, NULL, NULL),
(9, 'جميع المصابيح الكهربائية / أنبوبة -All Light Bulbs/Tube', 'active', NULL, NULL, NULL),
(10, 'هاتف بصري -Telephone Optical', 'active', NULL, NULL, NULL),
(11, 'مرحاض - مقعد WC - Seat', 'active', NULL, NULL, NULL),
(12, 'مرحاض - دافق WC - Flush', 'active', NULL, NULL, NULL),
(13, 'مرحاض - وعاء WC - Bowl', 'active', NULL, NULL, NULL),
(14, 'مرحاض - بخاخ يدوي WC - Hand Sprayer', 'active', NULL, NULL, NULL),
(15, 'مكيفات وتجهيزات AC & FITTINGS', 'active', NULL, NULL, NULL),
(16, 'أرضية المرحاض والجدار Toilet Floor & Wall', 'active', NULL, NULL, NULL),
(17, 'مغسلة وملحقاتها Washbasin & Accessories', 'active', NULL, NULL, NULL),
(18, 'دش , حوض استحمام Shower Try, Bathtub', 'active', NULL, NULL, NULL),
(19, 'خلاط دش Shower Mixer', 'active', NULL, NULL, NULL),
(20, 'مروحة عادم المرحاض Toilet Exhaust Fan', 'active', NULL, NULL, NULL),
(21, 'خزانة مطبخ Kitchen Cabinet', 'active', NULL, NULL, NULL),
(22, 'مروحة عادم المطبخ Kitchen Exhaust Fan', 'active', NULL, NULL, NULL),
(23, 'بالوعة وخلاط Sink & Mixer', 'active', NULL, NULL, NULL),
(24, 'لوحة DB الكهربائية  Electrical DB Panel', 'active', NULL, NULL, NULL),
(25, 'شرفة Balcony', 'active', NULL, NULL, NULL),
(26, 'أي أعمال تجهيز Any Fitout Works', 'active', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `owner_bank_accounts`
--

CREATE TABLE `owner_bank_accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `owner_id` int(11) NOT NULL,
  `bank_id` int(11) DEFAULT NULL,
  `bank_account` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `owner_bank_accounts`
--

INSERT INTO `owner_bank_accounts` (`id`, `owner_id`, `bank_id`, `bank_account`, `created_at`, `updated_at`) VALUES
(7, 117, 1, '2312321312321', '2023-03-11 15:17:55', '2023-03-11 15:17:55'),
(8, 118, 2, '4234234', '2023-03-11 15:19:41', '2023-03-11 15:19:41'),
(9, 119, 1, '552321312321', '2023-03-11 15:24:04', '2023-03-11 15:24:04'),
(10, 119, 2, '23432', '2023-03-11 15:24:04', '2023-03-11 15:24:04'),
(11, 119, 1, '42534534', '2023-03-11 15:24:48', '2023-03-11 15:24:48'),
(12, 120, NULL, NULL, '2023-03-11 15:27:26', '2023-03-11 15:27:26'),
(13, 91, 19, '2312321312321', '2023-03-22 14:14:57', '2023-03-22 14:14:57'),
(14, 91, 20, '552321312321', '2023-03-22 14:14:57', '2023-03-22 14:14:57'),
(15, 97, 20, '2312321312321', '2023-03-22 14:15:28', '2023-03-22 14:15:28'),
(16, 121, NULL, NULL, '2023-03-23 14:37:18', '2023-03-23 14:37:18'),
(17, 122, NULL, NULL, '2023-03-25 21:01:05', '2023-03-25 21:01:05'),
(18, 123, NULL, NULL, '2023-03-28 14:06:23', '2023-03-28 14:06:23'),
(19, 124, NULL, NULL, '2023-03-28 14:14:26', '2023-03-28 14:14:26'),
(20, 125, NULL, NULL, '2023-03-29 12:04:57', '2023-03-29 12:04:57'),
(21, 137, NULL, NULL, '2023-04-03 13:12:10', '2023-04-03 13:12:10');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `contract_id` int(11) NOT NULL,
  `manger_id` int(11) NOT NULL,
  `invoce_number` varchar(99) DEFAULT NULL,
  `invoice_id` int(11) DEFAULT NULL,
  `date` date NOT NULL,
  `amount` double NOT NULL DEFAULT 0,
  `rent_payment` float DEFAULT NULL,
  `water_payment` float DEFAULT NULL,
  `gas_payment` float DEFAULT NULL,
  `electricity_payment` float DEFAULT NULL,
  `others_payment` float DEFAULT NULL,
  `gas_fee` float NOT NULL DEFAULT 0,
  `water_fee` float NOT NULL DEFAULT 0,
  `electricity_fee` float NOT NULL DEFAULT 0,
  `other_fees` float NOT NULL DEFAULT 0,
  `unit_id` int(11) NOT NULL,
  `flat_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `owner_id` int(11) DEFAULT NULL,
  `type` enum('yes','no') NOT NULL DEFAULT 'no',
  `details` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(4, 'Rent', 'web', '2022-01-31 20:49:01', '2022-01-31 20:49:01'),
(5, 'Settings', 'web', '2021-06-09 17:48:14', '2021-06-09 17:48:14'),
(7, 'Roles', 'web', '2021-06-09 18:36:30', '2021-06-09 18:36:30');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', '2021-06-09 16:55:27', '2021-06-09 16:55:27'),
(2, 'مدير عقارات', 'web', '2021-06-09 18:12:27', '2022-01-31 20:49:49');

-- --------------------------------------------------------

--
-- Table structure for table `roles_permissions`
--

CREATE TABLE `roles_permissions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles_permissions`
--

INSERT INTO `roles_permissions` (`id`, `user_id`, `permission_id`) VALUES
(1, 1, 5);

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
(5, 1),
(7, 1),
(4, 1),
(4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `created_at`, `updated_at`) VALUES
(4, 'مطبخ - kitchen', '2022-01-27 17:40:13', '2023-02-24 13:17:00'),
(5, 'مبرد هواء - air conditioner', '2022-01-27 17:40:23', '2023-02-24 13:16:22'),
(6, 'غاز - Gas', '2022-01-27 17:40:44', '2023-02-24 13:16:52');

-- --------------------------------------------------------

--
-- Table structure for table `service_contracts`
--

CREATE TABLE `service_contracts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `unit_id` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `service_type` varchar(255) DEFAULT NULL,
  `amount` double(8,2) DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) DEFAULT NULL,
  `phone` varchar(191) DEFAULT NULL,
  `mobile` varchar(191) DEFAULT NULL,
  `color` varchar(191) DEFAULT NULL,
  `login_color` varchar(200) DEFAULT NULL,
  `logo` varchar(191) DEFAULT NULL,
  `icon` varchar(191) DEFAULT NULL,
  `keywords` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `admin_path` varchar(191) DEFAULT NULL,
  `admin_theme` varchar(191) DEFAULT NULL,
  `website_theme` varchar(191) DEFAULT NULL,
  `language` enum('en','ar') DEFAULT NULL,
  `multi_lang` enum('yes','no') DEFAULT NULL,
  `website_status` enum('open','closed') DEFAULT NULL,
  `allow_admin_theme` enum('yes','no') DEFAULT NULL,
  `allow_website_theme` enum('yes','no') DEFAULT NULL,
  `close_message` longtext DEFAULT NULL,
  `allow_register` enum('yes','no') DEFAULT NULL,
  `welcome_message` text DEFAULT NULL,
  `session_timeout` varchar(50) DEFAULT NULL,
  `homepageImage` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `googleplus` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `footer_desc` text DEFAULT NULL,
  `sender_name` varchar(99) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `email`, `phone`, `mobile`, `color`, `login_color`, `logo`, `icon`, `keywords`, `description`, `address`, `admin_path`, `admin_theme`, `website_theme`, `language`, `multi_lang`, `website_status`, `allow_admin_theme`, `allow_website_theme`, `close_message`, `allow_register`, `welcome_message`, `session_timeout`, `homepageImage`, `facebook`, `twitter`, `googleplus`, `linkedin`, `footer_desc`, `sender_name`, `created_at`, `updated_at`) VALUES
(1, 'اكسبرس للعقارات', 'test@test.com', '01099608016', '01099608016', NULL, '#529398', 'images/36691678288414.jpeg', 'images/8431623799840.jpg', '{\"ar\":\"تاجير العقارات, انظمة تاجير العقارات\",\"en\":\"تاجير العقارات, انظمة تاجير العقارات\"}', NULL, 'السعودية', 'admin', 'layout1', 'layout1', 'ar', NULL, 'open', 'yes', 'no', 'bn', 'yes', NULL, '2800', 'images/53661601203779.png', NULL, 'https://twitter.com/', 'https://www.instagram.com//', 'https://www.facebook.com/', NULL, NULL, '2017-06-17 19:41:22', '2023-03-08 13:13:34');

-- --------------------------------------------------------

--
-- Table structure for table `transfers`
--

CREATE TABLE `transfers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `owner_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `owner_account_id` int(11) NOT NULL,
  `amount` double(8,2) NOT NULL,
  `date` date DEFAULT NULL,
  `images` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `unittype_id` int(11) NOT NULL,
  `uses` varchar(225) DEFAULT NULL,
  `floors_number` varchar(50) DEFAULT NULL,
  `city_id` int(11) NOT NULL,
  `hood_id` int(199) DEFAULT NULL,
  `postal_code` varchar(50) DEFAULT NULL,
  `unites_number` varchar(50) DEFAULT NULL,
  `owner_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `extra_number` varchar(50) DEFAULT NULL,
  `building_number` varchar(50) DEFAULT NULL,
  `deed_number` varchar(255) DEFAULT NULL,
  `electric_meter` varchar(99) DEFAULT NULL,
  `sewage_meter` varchar(99) DEFAULT NULL,
  `water_meter` varchar(99) DEFAULT NULL,
  `guard_id` int(11) DEFAULT NULL,
  `files` text DEFAULT NULL,
  `address` varchar(199) DEFAULT NULL,
  `latitude` varchar(99) DEFAULT NULL,
  `longitude` varchar(99) DEFAULT NULL,
  `zoom` varchar(10) DEFAULT '7',
  `location_number` varchar(199) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `name`, `unittype_id`, `uses`, `floors_number`, `city_id`, `hood_id`, `postal_code`, `unites_number`, `owner_id`, `user_id`, `extra_number`, `building_number`, `deed_number`, `electric_meter`, `sewage_meter`, `water_meter`, `guard_id`, `files`, `address`, `latitude`, `longitude`, `zoom`, `location_number`, `created_at`, `updated_at`, `deleted_at`) VALUES
(34, 'Hassan A Rahman & Mohamed A Rahman', 6, 'commercial|residential', '2', 3, 43, '28', NULL, 137, 90, '1', '1', '102050357', '211000022235', NULL, '221000309019', 125, NULL, 'Ajman - United Arab Emirates', '25.4052165', '55.5136433', '8', '42546 10748', '2023-04-03 13:16:28', '2023-04-03 13:16:28', NULL),
(35, 'Express Building', 6, 'residential', NULL, 3, 43, NULL, NULL, 1072, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7', NULL, '2023-04-16 20:37:23', '2023-04-16 20:37:23', NULL),
(36, 'A:kareem Rumailah', 6, 'residential', NULL, 3, 43, NULL, NULL, 1073, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7', NULL, '2023-04-16 20:37:23', '2023-04-16 20:37:23', NULL),
(37, 'Kamali Karama Bldg', 6, 'residential', NULL, 3, 35, NULL, NULL, 1074, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7', NULL, '2023-04-16 20:37:23', '2023-04-16 20:37:23', NULL),
(38, '054-7268034', 6, 'residential', NULL, 3, 35, NULL, NULL, 1074, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7', NULL, '2023-04-16 20:37:23', '2023-04-16 20:37:23', NULL),
(39, 'Hassan Ali 1 Bldg', 6, 'residential', NULL, 3, 36, NULL, NULL, 1075, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7', NULL, '2023-04-16 20:37:23', '2023-04-16 20:37:23', NULL),
(40, 'M:Hassan Bldg', 6, 'residential', NULL, 3, 36, NULL, NULL, 1076, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7', NULL, '2023-04-16 20:37:23', '2023-04-16 20:37:23', NULL),
(41, 'M&G Bldg', 6, 'residential', NULL, 3, 35, NULL, NULL, 1077, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7', NULL, '2023-04-16 20:37:23', '2023-04-16 20:37:23', NULL),
(42, 'Near Choithram Bldg', 6, 'residential', NULL, 3, 35, NULL, NULL, 1078, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7', NULL, '2023-04-16 20:37:23', '2023-04-16 20:37:23', NULL),
(43, 'Al Quds Bldg', 6, 'residential', NULL, 3, 42, NULL, NULL, 1078, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7', NULL, '2023-04-16 20:37:23', '2023-04-16 20:37:23', NULL),
(44, 'Kamali Rashidiya Bldg', 6, 'residential', NULL, 3, 41, NULL, NULL, 1079, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7', NULL, '2023-04-16 20:37:23', '2023-04-16 20:37:23', NULL),
(45, 'Abu fahad Bldg', 6, 'residential', NULL, 3, 42, NULL, NULL, 1080, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7', NULL, '2023-04-16 20:37:23', '2023-04-16 20:37:23', NULL),
(46, 'Salam Obaid Bldg', 6, 'residential', NULL, 3, 47, NULL, NULL, 1081, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7', NULL, '2023-04-16 20:37:23', '2023-04-16 20:37:23', NULL),
(47, 'Jawad Nuaimiya', 6, 'residential', NULL, 3, 38, NULL, NULL, 1082, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7', NULL, '2023-04-16 20:37:23', '2023-04-16 20:37:23', NULL),
(48, 'qawam 1 Bldg', 6, 'residential', NULL, 3, 38, NULL, NULL, 1083, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7', NULL, '2023-04-16 20:37:23', '2023-04-16 20:37:23', NULL),
(49, 'S Ibrahim Bldg', 6, 'residential', NULL, 3, 38, NULL, NULL, 1084, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7', NULL, '2023-04-16 20:37:23', '2023-04-16 20:37:23', NULL),
(50, 'Qawam 2 bldg', 6, 'residential', NULL, 3, 37, NULL, NULL, 1083, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7', NULL, '2023-04-16 20:37:23', '2023-04-16 20:37:23', NULL),
(51, 'Abu Ali Sanayeh', 6, 'residential', NULL, 3, 13, NULL, NULL, 1085, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7', NULL, '2023-04-16 20:37:23', '2023-04-16 20:37:23', NULL),
(52, 'Al Noof Bldg', 6, 'residential', NULL, 3, 18, NULL, NULL, 1086, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7', NULL, '2023-04-16 20:37:23', '2023-04-16 20:37:23', NULL),
(53, 'Bahar 1 Bldg', 6, 'residential', NULL, 3, 5, NULL, NULL, 1087, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7', NULL, '2023-04-16 20:37:23', '2023-04-16 20:37:23', NULL),
(54, 'Bahar 3 Bldg', 6, 'residential', NULL, 3, 18, NULL, NULL, 1088, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7', NULL, '2023-04-16 20:37:23', '2023-04-16 20:37:23', NULL),
(55, 'Al Bahar 4 Bldg', 6, 'residential', NULL, 3, 18, NULL, NULL, 1089, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7', NULL, '2023-04-16 20:37:23', '2023-04-16 20:37:23', NULL),
(56, 'Al Hashim Bldg', 6, 'residential', NULL, 3, 15, NULL, NULL, 1090, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7', NULL, '2023-04-16 20:37:23', '2023-04-16 20:37:23', NULL),
(57, 'Barkook Bldg', 6, 'residential', NULL, 3, 43, NULL, NULL, 1091, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7', NULL, '2023-04-16 20:37:23', '2023-04-16 20:37:23', NULL),
(58, 'Maff Bldg', 6, 'residential', NULL, 3, 16, NULL, NULL, 1092, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7', NULL, '2023-04-16 20:37:23', '2023-04-16 20:37:23', NULL),
(59, 'Happiness Bldg', 6, 'residential', NULL, 3, 43, NULL, NULL, 1093, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7', NULL, '2023-04-16 20:37:23', '2023-04-16 20:37:23', NULL),
(60, 'Sedra Rumailah', 6, 'residential', NULL, 3, 36, NULL, NULL, 1094, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7', NULL, '2023-04-16 20:37:23', '2023-04-16 20:37:23', NULL),
(61, 'Diamond Bldg', 6, 'residential', NULL, 3, 14, NULL, NULL, 1095, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7', NULL, '2023-04-16 20:37:23', '2023-04-16 20:37:23', NULL),
(62, 'Reem Bldg', 6, 'residential', NULL, 3, 42, NULL, NULL, 1096, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7', NULL, '2023-04-16 20:37:23', '2023-04-16 20:37:23', NULL),
(63, 'Ezza Bldg', 6, 'residential', NULL, 3, 43, NULL, NULL, 1097, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7', NULL, '2023-04-16 20:37:23', '2023-04-16 20:37:23', NULL),
(64, 'Fr1 Bldg', 6, 'residential', NULL, 3, 37, NULL, NULL, 1098, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7', NULL, '2023-04-16 20:37:23', '2023-04-16 20:37:23', NULL),
(65, 'Fr2 Bldg', 6, 'residential', NULL, 3, 13, NULL, NULL, 1099, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7', NULL, '2023-04-16 20:37:23', '2023-04-16 20:37:23', NULL),
(66, 'Family Bldg', 6, 'residential', NULL, 3, 19, NULL, NULL, 1099, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7', NULL, '2023-04-16 20:37:23', '2023-04-16 20:37:23', NULL),
(67, 'Al sayed Bldg', 6, 'residential', NULL, 3, 5, NULL, NULL, 1100, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7', NULL, '2023-04-16 20:37:23', '2023-04-16 20:37:23', NULL),
(68, 'Ameera Bldg', 6, 'residential', NULL, 3, 43, NULL, NULL, 1101, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7', NULL, '2023-04-16 20:37:23', '2023-04-16 20:37:23', NULL),
(69, 'Bahar 2 bldg', 6, 'residential', NULL, 3, 5, NULL, NULL, 1102, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7', NULL, '2023-04-16 20:37:23', '2023-04-16 20:37:23', NULL),
(70, 'Al wasel Busthan', 6, 'residential', NULL, 3, 48, NULL, NULL, 1103, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7', NULL, '2023-04-16 20:37:23', '2023-04-16 20:37:23', NULL),
(71, 'Qawam 3 Bldg', 6, 'residential', NULL, 3, 35, NULL, NULL, 1083, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7', NULL, '2023-04-16 20:37:23', '2023-04-16 20:37:23', NULL),
(72, 'A:kareem sanayeh', 6, 'residential', NULL, 3, 13, NULL, NULL, 1073, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7', NULL, '2023-04-16 20:37:23', '2023-04-16 20:37:23', NULL),
(73, 'Wasl Bldg', 6, 'residential', NULL, 3, 4, NULL, NULL, 1104, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7', NULL, '2023-04-16 20:37:23', '2023-04-16 20:37:23', NULL),
(74, 'Paradaise 2', 6, 'residential', NULL, 3, 35, NULL, NULL, 1105, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7', NULL, '2023-04-16 20:37:23', '2023-04-16 20:37:23', NULL),
(75, 'sohail bldg', 6, 'residential', NULL, 3, 5, NULL, NULL, 1106, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7', NULL, '2023-04-16 20:37:23', '2023-04-16 20:37:23', NULL),
(76, 'Rahma Bldg', 6, 'residential', NULL, 3, 43, NULL, NULL, 1098, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7', NULL, '2023-04-16 20:37:23', '2023-04-16 20:37:23', NULL),
(77, 'Al Salaam Bldg', 6, 'residential', NULL, 3, 43, NULL, NULL, 1096, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7', NULL, '2023-04-16 20:37:23', '2023-04-16 20:37:23', NULL),
(78, 'SEDRA JURF', 6, 'residential', NULL, 3, 28, NULL, NULL, 1107, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7', NULL, '2023-04-16 20:37:23', '2023-04-16 20:37:23', NULL),
(79, 'Nadiah Al Maqhawi', 6, 'residential', NULL, 3, 14, NULL, NULL, 1108, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7', NULL, '2023-04-16 20:37:23', '2023-04-16 20:37:23', NULL),
(80, 'Al Dhana Building', 6, 'residential', NULL, 3, 35, NULL, NULL, 1109, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7', NULL, '2023-04-16 20:37:23', '2023-04-16 20:37:23', NULL),
(81, 'العقيلة', 6, 'residential', '3', 3, 1, '4', NULL, 1110, 90, NULL, '1541', NULL, NULL, NULL, NULL, 125, NULL, '10', '24.1302', '55.8023', '7', NULL, '2025-09-03 22:23:02', '2025-09-03 22:23:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `unit_types`
--

CREATE TABLE `unit_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `unit_types`
--

INSERT INTO `unit_types` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(6, 'بناية-Residential Building', '2022-01-25 11:32:47', '2023-03-22 12:01:51', NULL),
(7, 'سكن عمال - Workers\' accommodation', '2023-02-17 10:13:56', '2023-02-24 13:04:39', NULL),
(8, 'مستودع - storehouse', '2023-02-17 10:14:16', '2023-02-24 13:06:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) DEFAULT NULL,
  `password` varchar(191) DEFAULT NULL,
  `email_verified_at` datetime DEFAULT NULL,
  `phone` varchar(225) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `lang` varchar(191) DEFAULT NULL,
  `admin_theme` varchar(191) DEFAULT NULL,
  `status` enum('inactive','active') NOT NULL DEFAULT 'active',
  `remember_token` varchar(100) DEFAULT NULL,
  `type` varchar(99) NOT NULL DEFAULT 'editor',
  `birth_date` varchar(99) DEFAULT NULL,
  `passport_image` varchar(199) DEFAULT NULL,
  `passport_id` varchar(100) DEFAULT NULL,
  `nationality` varchar(50) DEFAULT NULL,
  `iban_number` varchar(99) DEFAULT NULL,
  `id_image` varchar(199) DEFAULT NULL,
  `id_number` varchar(20) DEFAULT NULL,
  `id_expiration_date` date DEFAULT NULL,
  `passport_expiration_date` date DEFAULT NULL,
  `manger_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `email_verified_at`, `phone`, `lang`, `admin_theme`, `status`, `remember_token`, `type`, `birth_date`, `passport_image`, `passport_id`, `nationality`, `iban_number`, `id_image`, `id_number`, `id_expiration_date`, `passport_expiration_date`, `manger_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(90, 'admin', 'admin@gmail.com', '$2y$10$e/gr2EmB6fwOrHZmnX0GmuwcYjz441lviLno5CWdM8WKDArRpCN..', NULL, '00201099608016', 'ar', NULL, 'active', NULL, 'admin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-06-09 18:34:39', '2023-04-19 17:09:26', NULL),
(92, 'ghanem', 'mahmoud@gmail.com', '$2y$10$5x2woh15d0Y11d73FbBJKuOaSPbIg/FowkZCFS8Dp6Ttda7A2sPOS', NULL, '01099603016', NULL, NULL, 'active', NULL, 'agent', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-01-29 12:23:37', '2022-01-29 12:29:30', NULL),
(93, 'ali', 'user@gmail.com', '$2y$10$rpsdE2Ltfrm1VTdVc75xxOo/coQEK0gU4GkgRsfD2v0QgyCsexvFu', NULL, '0501234537', NULL, NULL, 'active', NULL, 'user', '1992-01-18', NULL, NULL, NULL, NULL, 'customers/84641643490676.jpg', '423423434', NULL, NULL, 92, '2022-01-29 19:11:16', '2022-03-09 13:10:03', NULL),
(101, 'محمد', 'testing@gmail.com', '$2y$10$J7OOQR1lem9MV.KnOK7TAu8UNXa90NM0eQhZlDCSUyIfqsoPbPGcu', NULL, '3456789012', NULL, NULL, 'active', NULL, 'agent', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-02-22 15:32:58', '2022-02-22 15:32:58', NULL),
(105, 'ahmedww', 'admin@admin.com', '$2y$10$r6IezmW7yYyG6f7heDFhD.IDDIv9x9TCc2k4ITAAlUIudNTJmlyk.', NULL, '4356789234', NULL, NULL, 'active', NULL, 'agent', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-03-07 16:46:16', '2022-03-07 16:46:16', NULL),
(107, 'fegver', 'm@gmail', NULL, NULL, '0153829104', NULL, NULL, 'active', NULL, 'owner', '2022-03-28', NULL, NULL, NULL, '32131232', NULL, '3424176893', NULL, NULL, 105, '2022-03-10 08:19:10', '2022-12-11 14:29:20', NULL),
(112, 'mahmoud alweseemy', 'mfdsf4@gmail.com', NULL, NULL, '0105460801', NULL, NULL, 'active', NULL, 'owner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 90, '2023-02-19 11:23:04', '2023-02-19 11:23:04', NULL),
(124, 'Zafar Iqbal Rehmat Ali', 'alqazigm@gmail.com', NULL, NULL, '0552712636', NULL, NULL, 'active', NULL, 'user', '1966-01-01', NULL, 'DQ1336623', 'Islamic Republic of Pakistan', NULL, NULL, '784-1966-3102472-4', '2023-12-03', '2022-09-06', 90, '2023-03-28 14:14:26', '2023-03-28 14:14:26', NULL),
(125, 'Mohamed Salah', 'ere.ccare@gmail.com', NULL, NULL, '0581037878', NULL, NULL, 'active', NULL, 'guard', '1966-07-01', NULL, '1', 'comoros', NULL, NULL, '784196680805163', '2020-04-22', '2023-03-31', 90, '2023-03-29 12:04:57', '2023-03-29 12:04:57', NULL),
(137, 'Hassan A Rahman & Mohamed A Rahman', 'are.ajman@gmail.com', NULL, NULL, '0504400233', NULL, NULL, 'active', NULL, 'owner', NULL, NULL, 'YN2Y42829', 'UAE', NULL, NULL, '784194896987172', '2028-05-03', '2026-12-05', 90, '2023-04-03 13:12:10', '2023-04-03 13:12:10', NULL),
(138, 'Ashik', NULL, NULL, NULL, '0552532500', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(139, 'Haris', NULL, NULL, NULL, '0558531011', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(140, 'Ranjith', NULL, NULL, NULL, '0506327278', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(141, 'Global Diamond General Trdg', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(142, 'Zafar Iqbal', NULL, NULL, NULL, '0552712636', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(143, 'Manoj Madhusudhanan Nair ', NULL, NULL, NULL, '0502038385', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(144, 'Prasad ', NULL, NULL, NULL, '0554709011', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(145, 'Muhammed Hareed Noufal', NULL, NULL, NULL, '0555227413', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(146, 'Reda Mohamed', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(147, 'M:Faizal', NULL, NULL, NULL, '0501620225', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(148, 'Erfan Omer', NULL, NULL, NULL, '0553044123', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(149, 'Abdul Gafoor', NULL, NULL, NULL, '0504827864', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(150, 'Taghreed', NULL, NULL, NULL, '0526372111', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(151, 'Jitty Rani', NULL, NULL, NULL, '0558761267', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(152, 'Nizamudheen Umar', NULL, NULL, NULL, '0508597560', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(153, 'Miss Blessy Buenafe', NULL, NULL, NULL, '0505376064', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(154, 'Express Real Estate', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(155, 'Safa Computer', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(156, 'Rafa Saloon', NULL, NULL, NULL, '0553831233', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(157, 'Hussain Ahmed Calligrapher and Paint', NULL, NULL, NULL, '0529129614', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(158, 'Wafa studio', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(159, 'Thankachan Thomas', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(160, 'Tokyo Electro Mechanical Cont', NULL, NULL, NULL, '0505784470', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(161, 'M.K. Muhammed Star Tiles And Marble Fixing', NULL, NULL, NULL, '0504970136', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(162, 'Varun Narayan Nair', NULL, NULL, NULL, '0529056877', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(163, 'Mark General Maint.', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(164, 'Zahrat Al Gadeed Technical Services LLC', NULL, NULL, NULL, '0521929112', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(165, 'Shaju Keecherikullath', NULL, NULL, NULL, '0503098538', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(166, 'Dhanya Stephen', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(167, 'Rahul Sivan', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(168, 'Shahul Hameed', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(169, 'Rehna Varghese', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(170, 'Kollannoor Devassy Kutty', NULL, NULL, NULL, '0508568983', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(171, 'Kumar', NULL, NULL, NULL, '0559141676', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(172, 'Al Nadeem Hardware Tradinng', NULL, NULL, NULL, '0504997015', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(173, 'Noushad Lafir', NULL, NULL, NULL, '0509614202', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(174, 'Prakash', NULL, NULL, NULL, '0554689046', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(175, 'Zahrat Al Alandalous ', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(176, 'Jagjeet Sing', NULL, NULL, NULL, '0567370812', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(177, 'Al Mamzar Travel', NULL, NULL, NULL, '0568779627', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(178, 'Al Faya Hair Cutting Saloon', NULL, NULL, NULL, '0501654224', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(179, 'Shalena Flowers', NULL, NULL, NULL, '0506774272', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(180, 'Liwa Electromechanical', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(181, 'Matrcik', NULL, NULL, NULL, '0564412001', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(182, 'Matrick', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(183, 'Suguthewan', NULL, NULL, NULL, '0527458106', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(184, 'K 2 Building Contracting', NULL, NULL, NULL, '0502051595', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(185, 'Hassan Decoration Work', NULL, NULL, NULL, '0553609261', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(186, 'Jelson', NULL, NULL, NULL, '0509325881', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(187, 'Kumar Prakash', NULL, NULL, NULL, '0529843100', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(188, 'Al Tafif Supermarcket ', NULL, NULL, NULL, '0559733039', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(189, 'Arifa Traders ', NULL, NULL, NULL, '0502231108', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(190, 'Al Hemaya General Maint. Cont.', NULL, NULL, NULL, '0504994087', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(191, 'Issa Establishment Typing and Businessmen services', NULL, NULL, NULL, '0507990806', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(192, 'Soji Chakko Joseph', NULL, NULL, NULL, '0508942423', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(193, 'Amrith International Trading LLC', NULL, NULL, NULL, '0501975040', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(194, 'Muhammed Adnan', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(195, 'Al Sabiqoon Technical Services', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(196, 'Celine Mary', NULL, NULL, NULL, '0553214656', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(197, 'Tamjeed Techncial services', NULL, NULL, NULL, '0508984660', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(198, 'Joby Abraham', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(199, 'Sigma General Maint', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(200, 'Burj Al Mubarak Technical Services', NULL, NULL, NULL, '0502098327', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(201, 'Sujith', NULL, NULL, NULL, '0553886274', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(202, 'Franklin', NULL, NULL, NULL, '0503609534', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(203, 'Akram Khan', NULL, NULL, NULL, '0562762459', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(204, 'Mohamed Musthaq', NULL, NULL, NULL, '0582276164', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(205, 'Al Sadh Decoration', NULL, NULL, NULL, '0503610150', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(206, 'JALAL CARS AUTO ACCESSORIES', NULL, NULL, NULL, '0543562898', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(207, 'Bakery Darwish', NULL, NULL, NULL, '0555146651', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(208, 'TAHIYA TYPING CENTER', NULL, NULL, NULL, '0054464734', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(209, 'Sumesh Perekodakkat Methil', NULL, NULL, NULL, '0508602697', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(210, 'Simon Titus Konnakottu', NULL, NULL, NULL, '0559376637', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(211, 'Mubarak Choondaparambil', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(212, 'Mohamed Omer Ali', NULL, NULL, NULL, '0507580035', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(213, 'Aziza Naz', NULL, NULL, NULL, '0501482229', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(214, 'Mohammed Harun', NULL, NULL, NULL, '0553226880', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(215, 'Zafar Ali', NULL, NULL, NULL, '0564416181', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(216, 'Al Naseema Tailoring', NULL, NULL, NULL, '0505489967', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(217, 'Arzaq Foodstuff Trading', NULL, NULL, NULL, '0503728193', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(218, 'Abdulla', NULL, NULL, NULL, '0509406030', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(219, 'Simon ', NULL, NULL, NULL, '0559376637', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(220, 'Nasir Khan', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(221, 'Ayoob', NULL, NULL, NULL, '0502214340', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(222, 'Ranganathan', NULL, NULL, NULL, '0501975040', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(223, 'Neil Palace Jwellery', NULL, NULL, NULL, '0506345783', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(224, 'Al Mohber Tailoring', NULL, NULL, NULL, '0559795419', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(225, 'Al Aseel Jwellers', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(226, 'Al Kuthubi Jwellers', NULL, NULL, NULL, '0558877536', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(227, 'basheer', NULL, NULL, NULL, '0559965216', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(228, 'Rajesh', NULL, NULL, NULL, '0504624388', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(229, 'Meera Sahib Laiju', NULL, NULL, NULL, '0558993291', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(230, 'Abdo Mosaed', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(231, 'Mohamed Braima', NULL, NULL, NULL, '0508051433', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(232, 'Januka Nirmal', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(233, 'Sulaimanka', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(234, 'Silvestre Cirlo', NULL, NULL, NULL, '0505295415', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(235, 'Raju', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(236, 'Mohammed Asif', NULL, NULL, NULL, '0566287288', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(237, 'Hamed Ezat', NULL, NULL, NULL, '0527040061', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(238, 'Siraj Babu', NULL, NULL, NULL, '0524637788', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(239, 'Sheebu kunjikannan', NULL, NULL, NULL, '0508451314', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(240, 'Subair', NULL, NULL, NULL, '0503073430', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(241, 'Enamul Haque Office Mat.', NULL, NULL, NULL, '0509599981', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(242, 'Al Deriya Tailoring', NULL, NULL, NULL, '0504795804', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(243, 'Al Khaleej Electronis Trad.', NULL, NULL, NULL, '0585852777', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(244, 'BUSTHAN AL SHARQ TAILORING', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(245, 'Taj Tailoring', NULL, NULL, NULL, '0503653107', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(246, 'Tajdid Typing and photocopying services', NULL, NULL, NULL, '0543670234', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(247, 'Musthafa', NULL, NULL, NULL, '0508946867', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(248, 'Sulaiman Aboobacker', NULL, NULL, NULL, '0565985475', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(249, 'Figen Survery', NULL, NULL, NULL, '0553480040', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(250, 'Laly Kodayan', NULL, NULL, NULL, '0558730811', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(251, 'Rani', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(252, 'Qatifa Tailoring Women Clothes LLC', NULL, NULL, NULL, '0525133409', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(253, 'Marhaba Printing', NULL, NULL, NULL, '0555863175', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(254, 'Victory Electro Mechanical', NULL, NULL, NULL, '0504942952', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(255, 'Al Sholey Printing', NULL, NULL, NULL, '0502147858', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(256, 'Juice Page Advertaisment', NULL, NULL, NULL, '0508051433', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(257, 'Najeeb Rahman', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(258, 'Eurotech Technical Cont  Co LLc', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(259, 'Rajesh Kumar', NULL, NULL, NULL, '0554321906', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(260, 'Al Soor Al Zahahbi Bldg Maint', NULL, NULL, NULL, '0509537224', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(261, 'Muhammed Ayyub', NULL, NULL, NULL, '0585668060', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(262, 'Sulaiman ', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(263, 'Deega Abdullahi', NULL, NULL, NULL, '0522893560', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(264, 'Bahadoor Mohamed', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(265, 'Al Ithifaq Electromechanical Contracting ', NULL, NULL, NULL, '0554913874', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(266, 'Chinnu Chiramel', NULL, NULL, NULL, '0543331641', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(267, 'Fazal Razak Juma Khan', NULL, NULL, NULL, '0508920096', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(268, 'Multazmon General Maint.', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(269, 'Shihab Ariparath', NULL, NULL, NULL, '0529115177', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(270, 'Omar Abdul Hameed', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(271, 'Mohammed Manar', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(272, 'Samira Saeed', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(273, 'Mohammad Nadeem Akhtar', NULL, NULL, NULL, '0552806898', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(274, 'Sadik Nalakath Pallath', NULL, NULL, NULL, '0552314004', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(275, 'Hazar Ali Bilal ', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(276, 'Sadikali Noor Muhammed', NULL, NULL, NULL, '0562280440', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(277, 'Shahbaz Khalid', NULL, NULL, NULL, '0503979912', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(278, 'Nimi Shiyas', NULL, NULL, NULL, '0527827128', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(279, 'Shana Abdul Nazer', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(280, 'Firosh Sherief', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(281, 'Jisha John', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(282, 'Tarek Rajab Sayed', NULL, NULL, NULL, '0503042090', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(283, 'Syamnath Sassidharan', NULL, NULL, NULL, '0509182319', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(284, 'Ibrahim Sirajul', NULL, NULL, NULL, '0558133661', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(285, 'Mohammed Suhail Mohammed Salim', NULL, NULL, NULL, '0505576456', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(286, 'Fadi Thaher', NULL, NULL, NULL, '0501634598', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(287, 'Solico Contr Co', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(288, 'Noushad  Thyi Valappil', NULL, NULL, NULL, '0553404855', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(289, 'Muhammed Inshad Ibrahim', NULL, NULL, NULL, '0557766124', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(290, 'Sherif', NULL, NULL, NULL, '0551877142', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(291, 'Sher Afsar Sher Bahadar', NULL, NULL, NULL, '0507188226', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(292, 'Famida farooque', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(293, 'Muhammed Iqbal Umer', NULL, NULL, NULL, '0554744531', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(294, 'Khalid Noor Mohammed', NULL, NULL, NULL, '0545553557', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(295, 'Majid Ajmal', NULL, NULL, NULL, '0554237352', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(296, 'Faisal', NULL, NULL, NULL, '0557022706', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(297, 'Shammy Gopinath', NULL, NULL, NULL, '0503233978', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(298, 'Khaled Serajul', NULL, NULL, NULL, '0508995517', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(299, 'Aji Joseph Abraham', NULL, NULL, NULL, '0559212684', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(300, 'Umair', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(301, 'Prasoon Kollanur', NULL, NULL, NULL, '0553756163', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(302, 'Moulavi Ahmed Syed', NULL, NULL, NULL, '0504859102', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(303, 'Sijio Palakalody George', NULL, NULL, NULL, '0508775316', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(304, 'Asik', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(305, 'Shaheer Mamasrayillath', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(306, 'Ghulam Safeer', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(307, 'Saleem', NULL, NULL, NULL, '0505292347', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(308, 'Byju', NULL, NULL, NULL, '0559380840', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(309, 'Aboobacker', NULL, NULL, NULL, '0505815658', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(310, 'Shajudheen', NULL, NULL, NULL, '0504961246', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(311, 'Shankar', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(312, 'Nabeel Chollapara', NULL, NULL, NULL, '0569865995', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(313, 'Al Zuhoor Ladies Tailoring and Embroidery', NULL, NULL, NULL, '0563612819', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(314, 'AL DHAHABI FOODSTUFF TRADING', NULL, NULL, NULL, '0561084963', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(315, 'Star Of Nation', NULL, NULL, NULL, '0505810158', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(316, 'Al Meshal General Trading LLC', NULL, NULL, NULL, '0559455100', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(317, 'Arabian Star Readymade Garments', NULL, NULL, NULL, '0502158325', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(318, 'Alandalous cars & buses Rental', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(319, 'AL ASEEL READYMADE GARMENTS', NULL, NULL, NULL, '0507475631', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(320, 'Professional  Heaters Trading L.L.C', NULL, NULL, NULL, '0504625156', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(321, 'Al Mahroof', NULL, NULL, NULL, '0067425271', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(322, 'Alpha Automatic Door', NULL, NULL, NULL, '0503233978', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(323, 'Abdul Rahman', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(324, 'Ali Youssef ALI', NULL, NULL, NULL, '0567068238', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(325, 'Altibia elebtikar and technologia llc', NULL, NULL, NULL, '0565766527', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(326, 'Mohammed hassan', NULL, NULL, NULL, '0561032234', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(327, 'Sandra Sahr', NULL, NULL, NULL, '0528686742', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(328, 'Elsayed  badran', NULL, NULL, NULL, '0545418871', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(329, 'Mohammed Ali Zaidan', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(330, 'Zenab Zakariya', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(331, 'Mohammed Yaslam Abdul Qader', NULL, NULL, NULL, '0505090445', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(332, 'Nino Miranda', NULL, NULL, NULL, '0563990197', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(333, 'Mohamed Ahmed', NULL, NULL, NULL, '0507761309', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(334, 'Indus Metel llc', NULL, NULL, NULL, '0559787567', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(335, 'Mohamed Sami Mohamed', NULL, NULL, NULL, '0558406362', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(336, 'Ahmed Abdel Hazim', NULL, NULL, NULL, '0504074677', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(337, 'Mohammed Galal', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(338, 'Jefferey Alba', NULL, NULL, NULL, '0561158827', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(339, 'Abdallah Sobhy Abdallah', NULL, NULL, NULL, '0589369168', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(340, 'Shahid Iqbal', NULL, NULL, NULL, '0556328797', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(341, 'Yared Yegenew', NULL, NULL, NULL, '0529021585', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(342, 'Salah Eldeen A S Sadek', NULL, NULL, NULL, '0559474700', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(343, 'Ali Ibrahim', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(344, 'Musbah Mohamad', NULL, NULL, NULL, '0558107974', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(345, 'Mohamed Ismayil ali', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(346, 'Islam elsayed Abdul hameed', NULL, NULL, NULL, '0567449593', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(347, 'Ibrahim Ibrahim Ahmed', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(348, 'Mohammed Ismael', NULL, NULL, NULL, '0552482683', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(349, 'Mohammed Adghir', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(350, 'Shereef Hassan Thaher', NULL, NULL, NULL, '0503580281', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(351, 'Ahmed Shehata', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(352, 'Mohamoud Gamaledin', NULL, NULL, NULL, '0508546506', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(353, 'Issa Abdel Fattah ', NULL, NULL, NULL, '0568636531', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(354, 'Hamid Halim', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(355, 'Nasar Abou el fetouh', NULL, NULL, NULL, '0561031225', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(356, 'Muhammed Saleem', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(357, 'Jelyn Taquin', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(358, 'Moustafa Fathi', NULL, NULL, NULL, '0529305525', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(359, 'Atif Abdulhamid Ahmed', NULL, NULL, NULL, '0527670028', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(360, 'Mohammed Mahmoud', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(361, 'Nabil Joseph', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(362, 'Ismail Rabie', NULL, NULL, NULL, '0545180122', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(363, 'Sameh Elsayed', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(364, 'Denna Liza', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(365, 'Ma Casandra', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(366, 'Valery Bondra Renko', NULL, NULL, NULL, '0504629234', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(367, 'Moussa Ahmed Musthafa', NULL, NULL, NULL, '0503651546', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL);
INSERT INTO `users` (`id`, `name`, `email`, `password`, `email_verified_at`, `phone`, `lang`, `admin_theme`, `status`, `remember_token`, `type`, `birth_date`, `passport_image`, `passport_id`, `nationality`, `iban_number`, `id_image`, `id_number`, `id_expiration_date`, `passport_expiration_date`, `manger_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(368, 'Jehad Hakam Nemer ', NULL, NULL, NULL, '0503454590', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(369, 'Karm Othaman', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(370, 'Samah Ahmed', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(371, 'Go gul  Spin', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(372, 'Ayman Abdel', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(373, 'Salvacion Indoma', NULL, NULL, NULL, '0556109539', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(374, 'Sayed Anfas ', NULL, NULL, NULL, '0507844063', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(375, 'Fazel Hassan', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(376, 'Hesham Muhammed', NULL, NULL, NULL, '0503562585', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(377, 'S M Firoz Kabeer', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(378, 'Shierly Cruz', NULL, NULL, NULL, '0543784128', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(379, 'Walaa Elawady', NULL, NULL, NULL, '0521494262', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(380, 'Ahmed Abdalla', NULL, NULL, NULL, '0526596120', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(381, 'Prestige Real Estate', NULL, NULL, NULL, '0502001248', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(382, 'Zezo Restaurant', NULL, NULL, NULL, '0503677225', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(383, 'MD Farooq', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(384, 'Aisha Azam', NULL, NULL, NULL, '0529806335', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(385, 'Prajith', NULL, NULL, NULL, '0554551201', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(386, 'Abdul Latheef Khan', NULL, NULL, NULL, '0557667846', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(387, 'Mohammed Ismail', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(388, 'Mohamed Ali', NULL, NULL, NULL, '0067466297', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(389, 'Yousef Abdolrahman', NULL, NULL, NULL, '0558338177', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(390, 'Mahmud Haji Mohammed Kashem', NULL, NULL, NULL, '0508806889', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(391, 'Khaled Syed Alam', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(392, 'Atef Mohsen', NULL, NULL, NULL, '0504999591', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(393, 'Fathy A A Abuisa', NULL, NULL, NULL, '0507972404', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(394, 'Mohamed Abdul kader', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(395, 'Ruhul Amin Abdul Kashem', NULL, NULL, NULL, '0581346777', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(396, 'Muhammed Waqas ', NULL, NULL, NULL, '0523595536', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(397, 'Salem Almuhtaj Al Makhmari', NULL, NULL, NULL, '0501877721', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(398, 'Seha Wafiya', NULL, NULL, NULL, '0544368493', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(399, 'Al Yousefi auto seats upholstery trading', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(400, 'Ice cream faloda shirazi for the sale ice cream', NULL, NULL, NULL, '0507558837', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(401, 'Al wadi garments trading', NULL, NULL, NULL, '0529732424', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(402, 'Noor Hussain A/c Repairing workshop', NULL, NULL, NULL, '0547255095', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(403, 'Al Deeb Laundry-L.L.C', NULL, NULL, NULL, '0501513025', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(404, 'Super tech metal industry llc', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(405, 'Fareed Haji Amir Hussain', NULL, NULL, NULL, '0506787868', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(406, 'Rafeeq Alungal', NULL, NULL, NULL, '0556406531', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(407, 'Shahin Kacheri Vallapil', NULL, NULL, NULL, '0508095335', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(408, 'Jaswinder ', NULL, NULL, NULL, '0506783326', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(409, 'Muhammad Mursal', NULL, NULL, NULL, '0555498963', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(410, 'Rashid Ishaq Muhammad', NULL, NULL, NULL, '0552626780', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(411, 'Abdul Salam Abdo Saeed', NULL, NULL, NULL, '0503404553', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(412, 'Noor Muhammed', NULL, NULL, NULL, '0554233386', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(413, 'Mohammed Khaled', NULL, NULL, NULL, '0552846100', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(414, 'Mohamed Faisal', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(415, 'Ansar Mahmoud', NULL, NULL, NULL, '0504974898', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(416, 'Qaid Ahmed Musaed Saled', NULL, NULL, NULL, '0557997395', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(417, 'Gubran Naji', NULL, NULL, NULL, '0529008570', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(418, 'Fadhl Taher Hussein', NULL, NULL, NULL, '0508691551', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(419, 'Amear Ali', NULL, NULL, NULL, '0506758550', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(420, 'Ahmed Abdo Ali', NULL, NULL, NULL, '0505671253', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(421, 'Allaaeldin A A Wafi', NULL, NULL, NULL, '0506361088', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(422, 'Arham Tailoring and sewing women clothes l.l.c', NULL, NULL, NULL, '0569258310', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(423, 'Al Austath Laundry', NULL, NULL, NULL, '0563605232', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(424, 'Al Muntakab Gents Tailoring', NULL, NULL, NULL, '0525591533', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(425, 'ARD BAWADINA', NULL, NULL, NULL, '0523939384', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(426, 'Bwadeena Salon Hair Cutting Saloon', NULL, NULL, NULL, '0566484639', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(427, 'Al Pravi Meat Trading LLC', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(428, 'Bawadeena Cafteeria', NULL, NULL, NULL, '0505022760', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(429, 'Modern Workshop Smithery llc', NULL, NULL, NULL, '0505375137', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(430, 'Karim Steel Work Shop', NULL, NULL, NULL, '0588839100', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(431, 'Kattara Steel Lath', NULL, NULL, NULL, '0508856790', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(432, 'Al Qas Bldg Maintanance', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(433, 'Dharwish Steek Turning Work Shop', NULL, NULL, NULL, '0507294088', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(434, 'Mizan Steel Work Shop', NULL, NULL, NULL, '0507572396', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(435, 'River Steel Work Shop', NULL, NULL, NULL, '0508632682', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(436, 'Al Freez Steel Work Shop', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(437, 'Modern Steel Work Shop', NULL, NULL, NULL, '0505375137', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(438, 'Mohamed Hashim', NULL, NULL, NULL, '0508697677', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(439, 'Muhammed Areef', NULL, NULL, NULL, '0556804618', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(440, 'Dharwish Steel', NULL, NULL, NULL, '0507294088', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(441, 'Jazim', NULL, NULL, NULL, '0508603749', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(442, 'Bombay Electrical & Wedding Decoration LLC', NULL, NULL, NULL, '0558372427', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(443, 'Saeed Garage', NULL, NULL, NULL, '0508010050', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(444, 'Siraj Mohammed Afire', NULL, NULL, NULL, '0556577222', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(445, 'Vaseequr Rahman Khan', NULL, NULL, NULL, '0564940916', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(446, 'Abdullah Ahmed Sheikh', NULL, NULL, NULL, '0506446779', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(447, 'Abdulla Hyder', NULL, NULL, NULL, '0556992958', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(448, 'Mohammed Fairoos', NULL, NULL, NULL, '0563413866', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(449, 'Muhammed Muhammed', NULL, NULL, NULL, '0529711811', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(450, 'Najeeb Quresh', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(451, 'Muhammed Hiruy', NULL, NULL, NULL, '0557936371', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(452, 'Muhammad Hamid', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(453, 'Sidique Abdullah', NULL, NULL, NULL, '0507946293', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(454, 'Umer Farooq Pokakilath', NULL, NULL, NULL, '0504091123', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(455, 'Shahbaz Malik', NULL, NULL, NULL, '0509683403', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(456, 'Alyaa Abdalgani', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(457, 'Babar Wasim ', NULL, NULL, NULL, '0556665338', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(458, 'Humaid Ahmed Muhammed', NULL, NULL, NULL, '0508668861', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(459, 'Basem Noman Mohammed', NULL, NULL, NULL, '0529002068', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(460, 'Mostafa Abdul Monem', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(461, 'Moulay El Musthafa Nabaous', NULL, NULL, NULL, '0509812592', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(462, 'Ahmed Mohamed Ismail', NULL, NULL, NULL, '0504773488', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(463, 'Nabeel Ibrahim', NULL, NULL, NULL, '0558952752', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(464, 'Sajath Syed', NULL, NULL, NULL, '0504577367', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(465, 'Sulthan Marakar', NULL, NULL, NULL, '0556983683', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(466, 'Ansari', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(467, 'Ali Muhammed', NULL, NULL, NULL, '0555992254', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(468, 'Mohammad ebrahim kamel', NULL, NULL, NULL, '0507690494', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(469, 'Khalid Ahmed', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(470, 'Thameeem Ansari', NULL, NULL, NULL, '0554393175', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(471, 'Syed Shamil', NULL, NULL, NULL, '0529236536', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(472, 'Muhammed Salman Mohammed', NULL, NULL, NULL, '0526866347', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(473, 'Ahmad Abdul Hamid', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(474, 'Ahmed Hussain', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(475, 'Safwat Hani Alshater', NULL, NULL, NULL, '0522717383', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(476, 'Mutilaa Salem Salem', NULL, NULL, NULL, '0567340614', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(477, 'Tareq Ahmad', NULL, NULL, NULL, '0508552256', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(478, 'Jasim Mohamed', NULL, NULL, NULL, '0504949895', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(479, 'Elmoddather Mohamed', NULL, NULL, NULL, '0529708371', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(480, 'Shaiju Kalathiparambil', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(481, 'Abdul Wahid', NULL, NULL, NULL, '0503670593', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(482, 'Najib Fayez', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(483, 'Mahmoud Magddy', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(484, 'Nidal Ahmad', NULL, NULL, NULL, '0502540808', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(485, 'Al Soury mart LLC', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(486, 'Bayt Al Hoor Installation Of\nFurniture Works', NULL, NULL, NULL, '0509506691', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(487, 'Al Zahed Electrical Inst.Cont', NULL, NULL, NULL, '0566320527', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(488, 'Abdulla Rasfan', NULL, NULL, NULL, '0506318560', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(489, 'Ahmed Eisa Hassan ', NULL, NULL, NULL, '0545552600', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(490, 'Yemsheer Kurungodan', NULL, NULL, NULL, '0507273900', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(491, 'Ahmed Mohammed Al Balooshi', NULL, NULL, NULL, '0505999335', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(492, 'Ce Cai', NULL, NULL, NULL, '0551842139', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(493, 'Jamsheer Mohammed', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(494, 'Muhammed Zahibullah', NULL, NULL, NULL, '0507854349', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(495, 'kamal Ramal', NULL, NULL, NULL, '0509666864', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(496, 'Matar Ali Muhammed', NULL, NULL, NULL, '0553330105', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(497, 'Abdul Hameed Ibrahim', NULL, NULL, NULL, '0505629890', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(498, 'Husain Ali Ahmed Alzeera Alshamsi', NULL, NULL, NULL, '0553666677', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(499, 'Punit Kumar ', NULL, NULL, NULL, '0568673140', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(500, 'Mahmoud Mohd Saeed ( P )', NULL, NULL, NULL, '0566028638', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(501, 'Rafat Muhammed', NULL, NULL, NULL, '0509940006', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(502, 'Nizar Ahamad', NULL, NULL, NULL, '0527986889', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(503, 'Aziza Bouilla', NULL, NULL, NULL, '0527373899', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(504, 'Yuvaraj', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(505, 'Mohammed Mohammed', NULL, NULL, NULL, '0502687661', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(506, 'Asim Abrar', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(507, 'Reda Awad', NULL, NULL, NULL, '0567610670', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(508, 'Mahmoud Abdallathif ( W P )', NULL, NULL, NULL, '0503170222', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(509, 'Osama Omar Musthafa', NULL, NULL, NULL, '0582063540', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(510, 'Abdul Hamid Ahmed', NULL, NULL, NULL, '0566030990', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(511, 'Sabin Hassan', NULL, NULL, NULL, '0554930471', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(512, 'Bibin Joseph', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(513, 'Rashid Ali Chaudhari', NULL, NULL, NULL, '0529914222', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(514, 'Sajna Appu', NULL, NULL, NULL, '0561856101', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(515, 'Abdul Rahman Imran', NULL, NULL, NULL, '0566061212', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(516, 'Wajeed Muhammed', NULL, NULL, NULL, '0569968300', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(517, 'Mohammed Attia SAYED', NULL, NULL, NULL, '0549942191', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(518, 'Rizwan Khalil', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(519, 'Khansa Hussain', NULL, NULL, NULL, '0525602630', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(520, 'Hayder Hussain', NULL, NULL, NULL, '0552424009', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(521, 'Sari Mohammed', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(522, 'Sassidharan (P)', NULL, NULL, NULL, '0552216737', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(523, 'Muthu Jay Chandra', NULL, NULL, NULL, '0504953518', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(524, 'Technical steel metal Contracting', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(525, 'Anto George', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(526, 'Kun Wang ( Parking )', NULL, NULL, NULL, '0563567711', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(527, 'Taysser Abdulhadi', NULL, NULL, NULL, '0545755679', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(528, 'Muhammed Rafi', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(529, 'Fathima Suhra', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(530, 'Sabeesh Chali', NULL, NULL, NULL, '0551237395', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(531, 'Aref Mohammed', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(532, 'Al Hooth Hair Cutting Saloon', NULL, NULL, NULL, '0504914549', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(533, 'Flash Cell Trading Moble', NULL, NULL, NULL, '0557510099', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(534, 'Al Tharkiz Studio', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(535, 'AL MANARA GENERAL TRADING - L.L.C', NULL, NULL, NULL, '0565529391', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(536, 'Travel World LLC', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(537, 'ALSAQER CAR ACCESSORIES L.L.C', NULL, NULL, NULL, '0504817133', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(538, 'Du Tower', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(539, 'Renjith Raju', NULL, NULL, NULL, '0528337165', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(540, 'Mini Mathew', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(541, 'Ibrahim Backer', NULL, NULL, NULL, '0503872525', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(542, 'Irene Ayaquil Igarta', NULL, NULL, NULL, '0506982212', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(543, 'Muhammed Nisham', NULL, NULL, NULL, '0505501415', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(544, 'Khalid Hamad', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(545, 'Wassim Soudani', NULL, NULL, NULL, '0507695279', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(546, 'Rafeek Ismayil', NULL, NULL, NULL, '0529125200', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(547, 'Gajini Muhammed', NULL, NULL, NULL, '0507356116', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(548, 'Sebin Babu', NULL, NULL, NULL, '0555740119', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(549, 'Shiron Shajahan', NULL, NULL, NULL, '0502945053', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(550, 'Mohamed Rubin', NULL, NULL, NULL, '0527820069', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(551, 'Biju Puthan Veetil', NULL, NULL, NULL, '0508265316', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(552, 'Jojo Alex', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(553, 'Muhammed Shafir ', NULL, NULL, NULL, '0507276414', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(554, 'Shejith Nalakath', NULL, NULL, NULL, '0559282682', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(555, 'Rajeev Rajendranpillai', NULL, NULL, NULL, '0504626414', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(556, 'Anwar Sadique', NULL, NULL, NULL, '0589907969', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(557, 'Minhas', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(558, 'Muhammad Suleman', NULL, NULL, NULL, '0555757330', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(559, 'Shabeebudheen', NULL, NULL, NULL, '0559705755', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(560, 'Jamsheer', NULL, NULL, NULL, '0554495377', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(561, 'Shine Sageer', NULL, NULL, NULL, '0526622432', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(562, 'Nasib Mepurath', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(563, 'Abdel aziz Yousif Abdelrahman', NULL, NULL, NULL, '0529607010', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(564, 'Ashraf Pandikasala', NULL, NULL, NULL, '0558163123', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(565, 'Theparambil Abdul Rahman', NULL, NULL, NULL, '0559662099', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(566, 'Arakal Kumaran', NULL, NULL, NULL, '0505242794', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(567, 'Javid Abdurahman ', NULL, NULL, NULL, '0561756170', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(568, 'Yousef Ahmed Nafis', NULL, NULL, NULL, '0506619447', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(569, 'Mazen  Abdul Haji', NULL, NULL, NULL, '0506852270', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(570, 'Wadea Abdulmalek', NULL, NULL, NULL, '0506835522', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(571, 'Omar Ahmed', NULL, NULL, NULL, '0558772929', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(572, 'Sharon Chacko', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(573, 'Muhammad Zubair Muhammad', NULL, NULL, NULL, '0523121785', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(574, 'Sheby wasil', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(575, 'Mohammed Yousuf', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(576, 'Wissan Hassan', NULL, NULL, NULL, '0505103509', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(577, 'Shalik Abdul Rameez', NULL, NULL, NULL, '0509209829', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(578, 'Amal Hussain Yousef', NULL, NULL, NULL, '0503811705', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(579, 'Zakariya', NULL, NULL, NULL, '0556038510', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(580, 'Yousef Mahmoud', NULL, NULL, NULL, '0507077355', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(581, 'Fawaz Muhammed', NULL, NULL, NULL, '0558751127', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(582, 'Sarhan Ahmed Saleem Abubaker', NULL, NULL, NULL, '0555959115', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(583, 'Jassim Hassan', NULL, NULL, NULL, '0501870987', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(584, 'Abdul Haq Muhammad Karim', NULL, NULL, NULL, '0504284110', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(585, 'Bara Iyad Jehad Issa', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(586, 'Sreekanth Parayath', NULL, NULL, NULL, '0558267026', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(587, 'Khaled Samir', NULL, NULL, NULL, '0509652010', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(588, 'Davood Abdulla Tab', NULL, NULL, NULL, '0505293916', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(589, 'Aref Mohamed Abdo', NULL, NULL, NULL, '0555991091', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(590, 'Ali Abdullah', NULL, NULL, NULL, '0508287153', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(591, 'Kashkool stationary', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(592, 'Look for less collection llc', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(593, 'Al Yasmeen sale of Building Equipments LLC', NULL, NULL, NULL, '0507291991', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(594, 'Al Kuthub business information systems', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(595, 'Sujeeth', NULL, NULL, NULL, '0554332198', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(596, 'Srikanth', NULL, NULL, NULL, '0551228321', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(597, 'Krishna Chandran', NULL, NULL, NULL, '0553559197', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(598, 'Waleed Raza', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(599, 'Wilfred Alfred', NULL, NULL, NULL, '0503451341', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(600, 'Sawsan Ali Abdo', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(601, 'Rajesh Pathalil', NULL, NULL, NULL, '0586405802', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(602, 'Mohamed Saber Alsayed', NULL, NULL, NULL, '0529296504', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(603, 'Abdulla Abukar', NULL, NULL, NULL, '0509894472', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(604, 'Antony Paravan Parambil', NULL, NULL, NULL, '0506316880', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(605, 'Amro Ismail', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(606, 'Yaghoub Mohammad', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(607, 'Raganadh', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(608, 'Mathwe Varghese', NULL, NULL, NULL, '0505048279', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(609, 'Narayanan Shiju', NULL, NULL, NULL, '0589745412', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(610, 'Ahmed Mohamed Ibrahim Aly', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL);
INSERT INTO `users` (`id`, `name`, `email`, `password`, `email_verified_at`, `phone`, `lang`, `admin_theme`, `status`, `remember_token`, `type`, `birth_date`, `passport_image`, `passport_id`, `nationality`, `iban_number`, `id_image`, `id_number`, `id_expiration_date`, `passport_expiration_date`, `manger_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(611, 'Suhaib Ibrahim', NULL, NULL, NULL, '0582233011', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(612, 'Ali Juma', NULL, NULL, NULL, '0547890115', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(613, 'Mohammed Ashraf', NULL, NULL, NULL, '0505765758', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(614, 'Abdulla Hassan', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(615, 'Wahiba', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(616, 'Majo Jose', NULL, NULL, NULL, '0551422880', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(617, 'Jithin Peringad', NULL, NULL, NULL, '0505099646', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(618, 'Akbar Ali Mohammed', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(619, 'Ghulam Rasool', NULL, NULL, NULL, '0554066261', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(620, 'Shan Masoonathu', NULL, NULL, NULL, '0507366447', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(621, 'Rashid Ungungal', NULL, NULL, NULL, '0525811727', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(622, 'Jintu', NULL, NULL, NULL, '0508872453', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(623, 'Mohammed Shafi', NULL, NULL, NULL, '0526991373', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(624, 'Abey Babu', NULL, NULL, NULL, '0505798449', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(625, 'Sravan', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(626, 'Suji George', NULL, NULL, NULL, '0507182252', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(627, 'Sayed Basil', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(628, 'Mohammed Safwan', NULL, NULL, NULL, '0544304419', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(629, 'Dileepa Shyamal', NULL, NULL, NULL, '0558677167', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(630, 'Mohammad Nematollah', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(631, 'Syed Abdul Hadi ( 4971288876 ) 360', NULL, NULL, NULL, '0503119452', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(632, 'Nayana Bhadran', NULL, NULL, NULL, '0528228216', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(633, 'Siji Shanthammal Sasi', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(634, 'Al Rayhan Al Malika Clothes', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(635, 'Al Kanz.Kitchen Equip Trd', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(636, 'AL SHAZA HARDWARE TRADING ESTABLISHMENT', NULL, NULL, NULL, '0557868797', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(637, 'Al Afiya Foodstuff', NULL, NULL, NULL, '0509406435', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(638, 'Khadija Mahmud', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(639, 'Bashr Mahmood', NULL, NULL, NULL, '0547065324', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(640, 'Raji Yohannan', NULL, NULL, NULL, '0559924753', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(641, 'Elham Muhammad', NULL, NULL, NULL, '0501905997', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(642, 'Moussa', NULL, NULL, NULL, '0503237504', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(643, 'Zineb Soukrati', NULL, NULL, NULL, '0544819455', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(644, 'Abdul Majeed', NULL, NULL, NULL, '0521302609', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(645, 'Rajasundaram', NULL, NULL, NULL, '0524619400', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(646, 'Balasubramunyan', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(647, 'Ahmed Amin', NULL, NULL, NULL, '0567811468', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(648, 'Ahmed Mohyadeen', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(649, 'Mohamed Ali Farag', NULL, NULL, NULL, '0581548403', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(650, 'Muhammed Shoaib ', NULL, NULL, NULL, '0522252780', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(651, 'Rabie Ahmed Saleh', NULL, NULL, NULL, '0555489800', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(652, 'Islam Gaber Mahmoud', NULL, NULL, NULL, '0568700255', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(653, 'Eswar Prabu', NULL, NULL, NULL, '0559718101', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(654, 'Dream General Trading', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(655, 'Khalifa Air Conditioning', NULL, NULL, NULL, '0506535721', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(656, 'GERARD PATISSERIE', NULL, NULL, NULL, '0505373119', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(657, 'SBK REAL ESTATE', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(658, 'Talaa Ladies Garments', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(659, 'Al Dhoha Rostery', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(660, 'Abdeirahman Al Jasmi Clothes', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(661, 'Binu Valayil', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(662, 'Omran', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(663, 'Nizam Ud Din Mustafa', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(664, 'Shahab Ahmed Abbas', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(665, 'Rashna Ahmad Khader', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(666, 'Ali Ahmed', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(667, 'Abdul Muneer', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(668, 'Saliha Idrissi ', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(669, 'Mamdouh Khaled Kalo', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(670, 'Khaled Mohamemd Hassan', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(671, 'Saranraj Pandiyan', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(672, 'Arif Hisham', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(673, 'Rafik Nashaat Naguib', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(674, 'Riyas', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(675, 'Siham Elrazi', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(676, 'Muhamemd Rashid', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(677, 'Afshin Shahmorad Bazdar', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(678, 'Amir Ebrahim', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(679, 'Mohammed Abdurabbu saleh', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(680, 'Hisham Mohamed', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(681, 'Al Alfayida Ladies Gowns Tailoring', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(682, 'Fares Al Madina Saloon', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(683, 'Al Waqt Fashion LLC', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(684, 'Shekat Abaya', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(685, 'Arif Foodstuff LLC', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(686, 'Shameem Ahammed', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(687, 'baiju Gafoor', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(688, 'Biju', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(689, 'Michael Ullila', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(690, 'Naziya Abu sufyan', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(691, 'Yesudhas', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(692, 'Madhu thomas', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(693, 'Bright Savariar', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(694, 'Minimol Thomas', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(695, 'Abdul Rauf', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(696, 'Rajesh Polamuri', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(697, 'afrah mohamoud', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(698, 'Bavin varakkol', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(699, 'Musthaq', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(700, 'Deepak Paul', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(701, 'Ebtasem Khalaf', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(702, 'Abdul Ghani ', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(703, 'KALPESH RAMESHCHANDRA', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(704, 'Karim Mohsen Mohamed', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(705, 'REZAUL HASSAN', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(706, 'Manal Mahmoud', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(707, 'Megen Ahmed', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(708, 'Mohammad Mahmoud', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(709, 'Bahaa A M Alashi', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(710, 'Sahra Jama Abdi', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(711, 'Flytech Air Craft Recycling', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(712, 'Hussain H S Jarada', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(713, 'Vijeesh', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(714, 'Faisal Muhammed', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(715, 'Iqbal Ahmed Alamir Hasan', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(716, 'Abdulla Ali Humaid', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(717, 'Hossam Farouk', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(718, 'Awil Eissa Awaleh', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(719, 'Adam Abaker Mohamed', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(720, 'Sneju Sajan', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(721, 'Mohammed Abukar', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(722, 'Sijil Peedigavallapil ( P )', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(723, 'Abdul Kader Osman', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(724, 'Mohamed Mohamed Issa', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(725, 'Tag Elkhatim', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(726, 'Mohammed Koranii', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(727, 'Shahab Saleh', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(728, 'ALLOLOH ALSWDA GENENRAL', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(729, 'Mahmoud Walid', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(730, 'Anisa Yusuf Amir', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(731, 'Sushanta Biswas', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(732, 'Arif Siddiqui Mohammed', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(733, 'Kashif Hussain', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(734, 'Mohamed Hadi Radwan', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(735, 'Samah Abdelhamid Ibrahim', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(736, 'WALEED', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(737, 'Aileen Flojo', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(738, 'Hussain Elbaioumy', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(739, 'Mahmood Hussain', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(740, 'Haweya', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(741, 'Mohamed Ahmed Abdullahi', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(742, 'Naseem Anwer Muhammed', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(743, 'Fowzla Barre Mohamoud', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(744, 'MD MizaurRahman', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(745, 'Amina Hassan', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(746, 'Elsayed Abdelaziz ', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(747, 'Abdul Ghani', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(748, 'Abdul Qadir', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(749, 'Marat Talipov', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(750, 'Soju Parackal', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(751, 'Khalifa Mohammed', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(752, 'Abrar Ahmed Sideeqi', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(753, 'Mohammed Bashir', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(754, 'Ahmed Mahmoud Hassan Ibrahim', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(755, 'Medhahat ', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(756, 'Ammar Abdulhadi', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(757, 'Abdel Zaher', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(758, 'Dhahir Hagi', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(759, 'Muhammed Esan', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(760, 'Ahmed Hussein Ali', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(761, 'Ibrahim Ahmad', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(762, 'Mohammad Rabi', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(763, 'Muhubo Abdirahman', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(764, 'Saif Ur Rehman Abdul Rasool', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(765, 'Mojahed Mohd', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(766, 'Nafisa Hassan Haji', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(767, 'Farouq Mewed', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(768, 'Sana Zohaib Hair cutting saloon', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(769, 'Shan Travel llc', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(770, 'Al Mayas Laundry LLC', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(771, 'Sultan Al Madina supermarcket', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(772, 'Ameer Khan', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(773, 'Altaf Abbas Khan', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(774, 'Shihab ', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(775, 'Manjit Sing', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(776, 'Jaseena Beegam', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(777, 'Mohammed Mosharaf', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(778, 'Jeena Varghese', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(779, 'Mejbah Uddin', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(780, 'Suresh Kumar', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(781, 'Sneha Sunil', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(782, 'Abdul Nayeem', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(783, 'Sabir Hossain', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(784, 'Vishal Dagadu Sawanta', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(785, 'Askarali', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(786, 'Saran', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(787, 'Praveen Kumar', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(788, 'Majid Ali', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(789, 'Anija Joseph', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(790, 'Rahul Mohanan', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(791, 'Neeraj Sassidharan', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:49', '2023-04-16 16:52:49', NULL),
(792, 'Shailendra', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(793, 'Prince Jose', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(794, 'Ramesh Mohan', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(795, 'Evaya Tailoring llc', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(796, 'Al Burj Tailoring', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(797, 'Kuldip Singh Transport llc', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(798, 'Mazaya Saloon', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(799, 'Khurshid Alam Management and Marcketing', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(800, 'Abdunissam', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(801, 'Onur Baycan', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(802, 'Yahiya Eissa Marzooq', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(803, 'Nadia Khairat', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(804, 'Mohammad Ezzaldin ', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(805, 'Meryem EL', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(806, 'Mohammed Kashif', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(807, 'Puruthothaman Ganesan', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(808, 'Abdul Waheed', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(809, 'Eslamuddin Hossain', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(810, 'Abdul aleem', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(811, 'Fathih Kalender', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(812, 'Eman Mohammed Ali', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(813, 'Mohammad Nasar Khan', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(814, 'IIRSAL CARGO', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(815, 'Adwa Jedah BuildinG Materials', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(816, 'Al Afkaar Technical Services', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(817, 'DISH MASTER ELECTRONICS', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(818, 'ALTASAMOH BUILDING CONTRACTING - L.L.C', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(819, 'Al Tawakul Laundry', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(820, 'Abdulla Ali', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(821, 'Priya Kurunappiliyil', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(822, 'Obaid Muhammed', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(823, 'Islam Ahmed', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(824, 'Abdulla Mohammed', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(825, 'Farooq', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(826, 'Grince John ', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(827, 'Nithin John (P)', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(828, 'Faisal Valappipadath', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(829, 'Faisal Mahmood', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(830, 'Amal Mohamed', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(831, 'Bahaa Mofid', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(832, 'Gokul', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(833, 'Abdelaziz Yousry Abdelaziz', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(834, 'Sindan For Lubricants trading', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(835, 'Janette Villa De Vera', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(836, 'Zakariya Mohammed', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(837, 'Mohannad Sameh', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(838, 'Mohammad Nezar Moosa', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(839, 'Lihui Wang', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(840, 'Alaa m thoufiq', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(841, 'Ahmed Hamed Abdulla', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(842, 'Al Aeidy Al Baraa Hair Cutting Saloon', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(843, 'Elsayed Hassan', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(844, 'Ahemd Ilyas', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(845, 'MD Mahbub Alom', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(846, 'Tanveer Ahmad Chaudhary', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(847, 'Zeeshan', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(848, 'jayakumar', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(849, 'Mazar Bashir', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(850, 'Mohamed Mahad Dagane', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(851, 'Mohamed Gamal', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(852, 'Noor Alam Sona Miah', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(853, 'Naveen Hallalah', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(854, 'Abu baker Mohammed', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(855, 'Abdul Rauf Chathoth Vannantavida', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(856, 'Shahira Abdunoor', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(857, 'Muhammed Hamoud Sulaiman', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(858, 'Obaid Humaid Al Zari', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(859, 'Zainab', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(860, 'Amit Kumar', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(861, 'Manish Gupta', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(862, 'Amr Mohammed Ali', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL);
INSERT INTO `users` (`id`, `name`, `email`, `password`, `email_verified_at`, `phone`, `lang`, `admin_theme`, `status`, `remember_token`, `type`, `birth_date`, `passport_image`, `passport_id`, `nationality`, `iban_number`, `id_image`, `id_number`, `id_expiration_date`, `passport_expiration_date`, `manger_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(863, 'Mohammed Ali', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(864, 'Mounia', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(865, 'Raji Rajeev', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(866, 'Alaa Ghareeb', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(867, 'Majid Abdulla Abdul Rahman', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(868, 'Sara Ali Abdullah Al Balushi', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(869, 'Hamza Sufi', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(870, 'Marwan Mohammed', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(871, 'Yahia Ahmad ', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(872, 'Imran Aziz', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(873, 'Amr Abelfetoh Mohamed', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(874, 'Zahid Mohamed', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(875, 'Mohammed Hassan Mohammed Haj', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(876, 'Aisha Ali Abdullah', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(877, 'Ramesh Gadarla', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(878, 'Khalil Alrahman ( P )', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(879, 'Samy Sobhy', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(880, 'Yousaf Mohammad Fakhari', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(881, 'Maher Noufal', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(882, 'Abdulrahman Ali Saeed', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(883, 'Firras Kissam Abdullah', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(884, 'Saif Abdullah Ali', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(885, 'Faheema Bdulqadeer Sayid', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(886, 'Qazi Muhammed', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(887, 'Rami Basim Abdelhadi', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(888, 'Hassan Osman Babiker', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(889, 'Ahmad Ebrahim Rahimi', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(890, 'Nabeel Mohammed', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(891, 'Raneem Mouhamad Fawaz ', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(892, 'Maxwell Alloysius Hadi', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(893, 'Faizan Sattar', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(894, 'Alaa Tagelsir', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(895, 'Abdulmanaf Mahamood ', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(896, 'Aiman Mahmoud', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(897, 'Premkumar Meedidoddi', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(898, 'Nermeen Hesham', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(899, 'Basil Azzam Mohammad Ali ', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(900, 'Khawaja Amer Anees', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(901, 'Noorah Saleh', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(902, 'Jithu jayan', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(903, 'Khaled JT', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(904, 'AL HASNA ESTABLISHMENT AC SYSTEM MAINTENANCE', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(905, 'Hany Gaber Tawfik', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(906, 'Mohammed Abdalla', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(907, 'Abdel Rahman Hisham Ahmad', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(908, 'Seena Sadasivan', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(909, 'Homayong', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(910, 'Al Maliki Diary Products Trading', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(911, 'SALE SUCRE SWEETS', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(912, 'Jabal Arafat Tailors', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(913, 'Bait Al Milkyaj Trading', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(914, 'Le Macaron Sweets LLC', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(915, 'Maahir Perfumes', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(916, 'Ahmed Awel', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(917, 'Amin Nurhusen Mohamed', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(918, 'Muhammed Kemal Argo', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(919, 'Entisar Mohammed', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(920, 'Zemzem Yesuf Mohammed', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(921, 'Praveen Muhammed', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(922, 'Joel Thomas', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(923, 'Almizan Foodstuff Trading ', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(924, 'Wilson Pezhumpara', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(925, 'Kunhimoideen Arimbrathodi', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(926, 'Raji Manoj', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(927, 'Shibu George', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(928, 'Sasirajkumar', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(929, 'Safeer ( p )', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(930, 'Nikesh ', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(931, 'Nazer', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(932, 'Ragesh', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(933, 'Sunil Shankaran', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(934, 'Muhammad Rafi', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(935, 'Al Hail Electromechanical Works', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(936, 'Shihad', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(937, 'Thomas David', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(938, 'Manikandan ', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(939, 'Santheep', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(940, 'Mansoor Ali Moideen (P)', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(941, 'Muhammed Sali Maheen ', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(942, 'Bipin Vijayn ', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(943, 'Santhosh Saraswathy  (P)', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(944, 'Abdulwehab Muhammed', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(945, 'Joyce Samuel Kunju', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(946, 'Mohammed Rafi', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(947, 'Santhosh Kumar', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(948, 'Abdul sukur', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(949, 'Abdulla Abdul Salam (P)', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(950, 'Khaleel Ahmed Sheik', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(951, 'Aneesh Anirudhan', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(952, 'Sreelal Sreekumar', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(953, 'Anita Giastuti Bt', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(954, 'MD Rezaul Karim', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(955, 'Shater Arts', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(956, 'Abraj Al Maali Bldg Contracting', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(957, 'Prime Printing Material Trading LLC', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(958, 'CHAACHA', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(959, 'Jonathan Kilyoowa', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(960, 'Zubair Yahya', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(961, 'Regram Sunder', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(962, 'Julius Ssemwanga', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(963, 'Diaa Mohamed Safar', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(964, 'Ebrahim Kutty', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(965, 'Mathias', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(966, 'Sabah Al Madeena Super Marcket', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(967, 'Al Rifa Garments', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(968, 'Royal Dates Factory / l.l.c', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(969, 'Shanim', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(970, 'chinoso daniel', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(971, 'Mithun Kunhangadan', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(972, 'Nawas Ahamed Jabar Ali', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(973, 'Novelyn Manatad Cuarenta', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(974, 'Wael mahmoud', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(975, 'Omina Hashim', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(976, 'Manea Jumah', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(977, 'Nafih Elamilat', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(978, 'Syed Irfan', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(979, 'BLACK SEVEN DESIGNS FASHION', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(980, 'Al Khanz Al Dhahabi General Maint', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(981, 'Max General Maintanance', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(982, 'Saifudheen', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(983, 'Dhou Al Shams Building Maint & Clening Services', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(984, 'Sukunathan Biju', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(985, 'Fariz Fazil', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(986, 'Zubeer Bin ', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(987, 'Arun Vamadevan', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(988, 'Muhammed Jasim', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(989, 'Tihtina Abebe', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(990, 'Al Hussain Bldg. Maint.', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(991, 'Theeb Abdelkarim', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(992, 'Segu Ismail', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(993, 'Hisar Aboobacker', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(994, 'Subair Thottiyil', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(995, 'Khalil Ibrahim', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(996, 'Seiko Commercial Information Services', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(997, 'BASHEER BUILDING MATERIALS TRADING L.L.C', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(998, 'Al wahid Mobile Phone', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(999, 'Al Zaibak Minimart', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(1000, 'Tamim Gazi', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(1001, 'Nassar Pooka purath', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(1002, 'Mukesh Kumar', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(1003, 'RABIE ALI RABIE ALI', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(1004, 'Elenita Plamio', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(1005, 'Ali Saeed Salem Saeed Alsuwaidi', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(1006, 'Muhammad Sohaib Muhammad', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(1007, 'Mahmoud Mohamad', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(1008, 'Jith Ram', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(1009, 'Mohmoud Mosthafa', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(1010, 'Uzair Khan', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(1011, 'Mohammed Shabin', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(1012, 'Jinshan Sun', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(1013, 'M:Yasser', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(1014, 'Reda Abdou', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(1015, 'Sujithra', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(1016, 'Arun Kumar', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(1017, 'Al Nashar Hair Cutting Saloon', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(1018, 'Al Hafil Laundry', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(1019, 'Abdulgader', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(1020, 'Abdul Jewad', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(1021, 'Abdulla Muhammed Ilyas', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(1022, 'Iqra Abdilqadir', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(1023, 'Saeed Abdo Hussein', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(1024, 'Rawan Abd Alaziz', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(1025, 'Emteyaz Tharwar', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(1026, 'Ahmed Garuta', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(1027, 'Ahmad Nawaf', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(1028, 'Mohammed Kamal', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(1029, 'Manuel Joseph', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(1030, 'Mohammed Mohim', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(1031, 'Chaus Umermia', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(1032, 'Jacob Mathew', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(1033, 'Eldo Musthafa', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(1034, 'M:Neymat', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(1035, 'Ibrahim', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(1036, 'Reda Ibrahim Ali', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(1037, 'MAJIDA RAITEB', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(1038, 'Mayan Ponnambath Malickal', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(1039, 'Liftech Technical Services L.L.C Br', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(1040, 'Sameer Kottaparambil', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(1041, 'Xiong Xuezhi', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(1042, 'Mohammed Monju', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(1043, 'Ayman Momtaz', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(1044, 'Mohammed Abd', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(1045, 'Fate Akil Redi', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(1046, 'Mohammad Abdallah', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(1047, 'Zaytoon Al Madeena', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(1048, 'Sinke oromo traditional fashion retailer collection', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(1049, 'BaytAlearabi Sale Of Women Ready Made Clothes LLC ( Sole Proprietorship ', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(1050, 'ALORA NURSERY', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(1051, 'Akhil Sisikumar', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(1052, 'Muhamemd Ameer', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(1053, 'Abdul Hamid Mohammed', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(1054, 'ALMINNA FUEL TRADING L.L.C', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(1055, 'Jennifer Aldea', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(1056, 'Abeer Khalid', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(1057, 'Hamdhy Zakariya', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(1058, 'Kakanin Express Delivery Services', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(1059, 'Ahmed Saif', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(1060, 'Ahmed Abdullah', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(1061, 'Ripijith', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(1062, 'Kaveettil Uthaman Krishnan', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(1063, 'Habiba Basheer Khan', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(1064, 'Al Omair Elect. & Sanitery Cont', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(1065, 'Omer Farooqui Mohammed', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(1066, 'Abdul Goni Kabir Ahmed', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(1067, 'Balwinder Singh Shokian Singh', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(1068, 'Mohammad Amin Ghulam Jan', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(1069, 'Al Manhal Tailoring and Embr. LLC', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(1070, 'Mohammad Sorif Ladies Gowns Tailoring', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(1071, 'Shahenaz Ladies Gowns Taloring', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(1072, 'Hassan A Rahman & Mohammed A Rahman ', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'owner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(1073, 'Abdul Karim Abdulla Ahmed Abdool', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'owner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(1074, 'Fatima Mohamed Toufiq Al Muwaffq', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'owner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(1075, 'Hassan Ali Mohammed Falamarzy', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'owner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(1076, 'Mohamed  Hasan Mohamed Al Marzooqi', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'owner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(1077, 'Abdulwahed Abdulla Hassan Abdulla Galadari & Mohamed Ameen H M Mubasheri Almarzooqi', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'owner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(1078, 'Abdulrahman Mohamed Ali MahmoodJ anahi', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'owner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(1079, 'Ahmed Mohamed Ahmed Kamli', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'owner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(1080, 'Abdulhamid E T A Yousef', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'owner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(1081, 'Salem Obaid Saif Weldsaif Alaleeli', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'owner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(1082, 'Nimatollah Hossein Zadeh & Jawad Hussain ', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'owner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(1083, 'Abdulla Mohamed Abdulla Qawam Alblooshi', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'owner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(1084, 'Srunaz Abulhassan Fath Ali Ibrahimi', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'owner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(1085, 'Yousaf Ali Ahmed Almulla', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'owner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(1086, 'Hasan Abdulrahman Hasan Aljanahi & Khalid Hassan Abdulrahman Hassan Aljanaahi', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'owner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(1087, 'Abdulla Hussain M Z Al-Emadi & Abdulla Mohammed H Janahi & Mohammed Abdulla M H Janahi & Ahmed Abdulla M H Janahi', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'owner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(1088, 'Abdulla Mohammed H Janahi', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'owner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(1089, 'Mohammed Abdulla M H Janahi and Ahmed Abdulla M H Janahi', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'owner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(1090, 'Amna Abdulla MohammadAlhashimi S', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'owner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(1091, 'Abdulla Ahmad Mohammed Alraees Janahi', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'owner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(1092, 'Mohammad Amin Mohammad Saleh Fikree', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'owner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(1093, 'Nayef Hasan Abdulrahman Hasan Aljanahi', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'owner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(1094, 'Imad Hachim Abbas', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'owner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(1095, 'Abdulrahman Mohamed Abdulrahman Ahmed Alawadhi', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'owner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(1096, 'Khalid Ahmed Abdulla Abdulrahman Alhashmi', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'owner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(1097, 'Sultan Al Ghashmi and  Ameen Abdul Azeez Hussain Al Ghashmi', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'owner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(1098, 'Hassan Abdulrahman Hassan Aljanahi', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'owner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(1099, 'Khadeeja abdulraheem Ashkar', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'owner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(1100, 'Sayed Khalil Sayed Mohammad Mousavi', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'owner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(1101, 'Ameera Mohamede Neamat Alkhoori', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'owner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(1102, 'Abdulla Hussain M Z Al-Emadi.  Abdulla Mohammed H Janahi.  Mohammed A M H Janahi  Ahmed A M H Janahi', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'owner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(1103, 'Ahmad Mohammed Ahmad Kamali', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'owner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(1104, 'Abdulrahman Ahmed Mohamed Ali Bastaki', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'owner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(1105, 'Hassan Ali Mohammad Falamrzi', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'owner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(1106, 'Khalid Hassan Abdulrahman Janahi', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'owner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(1107, 'Abdulwahhab meer ahmed Abdool', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'owner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(1108, 'Nadiah H A A Almaqhawi', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'owner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL);
INSERT INTO `users` (`id`, `name`, `email`, `password`, `email_verified_at`, `phone`, `lang`, `admin_theme`, `status`, `remember_token`, `type`, `birth_date`, `passport_image`, `passport_id`, `nationality`, `iban_number`, `id_image`, `id_number`, `id_expiration_date`, `passport_expiration_date`, `manger_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1109, 'Sanaa Abdulqader Abdulla Abdool Alawadhi', NULL, NULL, NULL, '0', NULL, NULL, 'active', NULL, 'owner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-16 16:52:50', '2023-04-16 16:52:50', NULL),
(1110, 'محمد', 'jasemalbanoun@gmail.com', NULL, NULL, '99079919', NULL, NULL, 'active', NULL, 'owner', NULL, NULL, '15447', 'كويتي', NULL, NULL, '287100601778', '2025-11-28', '2025-11-18', 90, '2025-09-03 22:23:02', '2025-09-03 22:23:02', NULL),
(1111, 'Nooh', 'walidsniper778@gmail.com', '$2y$10$Tg6U3VJgX1HwD6pbCUc8AuTmBPcDFTr2c3NuNA6.yBMhkz0RIc1Em', NULL, '97728922', NULL, NULL, 'active', NULL, 'agent', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-24 15:50:01', '2025-11-24 15:50:01', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agreements`
--
ALTER TABLE `agreements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank_checks`
--
ALTER TABLE `bank_checks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contracts`
--
ALTER TABLE `contracts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deportations`
--
ALTER TABLE `deportations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `flats`
--
ALTER TABLE `flats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `flat_types`
--
ALTER TABLE `flat_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hoods`
--
ALTER TABLE `hoods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoicetypes`
--
ALTER TABLE `invoicetypes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `maintenance_forms`
--
ALTER TABLE `maintenance_forms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_types`
--
ALTER TABLE `order_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `owner_bank_accounts`
--
ALTER TABLE `owner_bank_accounts`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_contracts`
--
ALTER TABLE `service_contracts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transfers`
--
ALTER TABLE `transfers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unit_types`
--
ALTER TABLE `unit_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agreements`
--
ALTER TABLE `agreements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `bank_checks`
--
ALTER TABLE `bank_checks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contracts`
--
ALTER TABLE `contracts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `deportations`
--
ALTER TABLE `deportations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `flats`
--
ALTER TABLE `flats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1377;

--
-- AUTO_INCREMENT for table `flat_types`
--
ALTER TABLE `flat_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `hoods`
--
ALTER TABLE `hoods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `invoicetypes`
--
ALTER TABLE `invoicetypes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `maintenance_forms`
--
ALTER TABLE `maintenance_forms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_types`
--
ALTER TABLE `order_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `owner_bank_accounts`
--
ALTER TABLE `owner_bank_accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `service_contracts`
--
ALTER TABLE `service_contracts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transfers`
--
ALTER TABLE `transfers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `unit_types`
--
ALTER TABLE `unit_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1112;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
