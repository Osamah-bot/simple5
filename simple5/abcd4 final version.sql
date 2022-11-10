-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 31, 2022 at 10:14 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `abcd4`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `account_id` int(11) NOT NULL,
  `account_type` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_signed_on` datetime DEFAULT NULL,
  `last_signed_out` datetime DEFAULT NULL,
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `account_state` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`account_id`, `account_type`, `email`, `password`, `last_signed_on`, `last_signed_out`, `remember_token`, `created_at`, `updated_at`, `account_state`) VALUES
(1, 'Admin', 'admin@gmail.com', '$2y$10$7uOYHK6GHsDjL3u0mu1Ul.HEJclgFqQNrQbuXcCqxqoFiTw1CnJ8e', NULL, NULL, NULL, '2022-08-30 11:54:19', '2022-08-30 11:54:19', NULL),
(2, 'Patient', 'patient@gmail.com', '$2y$10$pQ4ZAyWHvjXiOBeBMT4IbuHKgViFVeKCh2lYqNehWihjxZz.nUsnC', NULL, NULL, NULL, '2022-08-30 11:54:19', '2022-08-30 11:54:19', NULL),
(3, 'Patient', 'oosama770@gmail.com', '$2y$10$eLREYzNCtcSZR2P.iFfrXeBW5U0u8tzPMua7S2TPysSQYMdiSt552', NULL, NULL, NULL, '2022-08-30 12:00:30', '2022-08-30 12:22:23', NULL),
(4, 'Docor', 'ghaz@gmail.com', '$2y$10$H5CFNHsiiAOCi1BvO86UZ.GoKo4J8QlyCiFcurGsb24Unnp/qRwgi', NULL, NULL, NULL, '2022-08-30 13:38:48', '2022-08-30 13:38:48', NULL),
(5, 'Docor', 'amir.salam@gmail.com', '$2y$10$hWYpVIItySyBlr4CN3bmiuhGh6l7KiHR80yncSXsuZdAoKFOuo6RW', NULL, NULL, NULL, '2022-08-30 14:32:06', '2022-08-30 14:32:06', NULL),
(6, 'Patient', 'mohammed97.aljafary@gmail.com', '$2y$10$eLREYzNCtcSZR2P.iFfrXeBW5U0u8tzPMua7S2TPysSQYMdiSt552', NULL, NULL, NULL, '2022-08-30 15:04:38', '2022-08-30 15:04:38', NULL),
(7, 'Doctor', 'ahmedshdi@gmail.com', '$2y$10$iJVA3y/CSja6Tuy1JqRKou850e4NgYGoePQTTcJZHlYYvrjMyrJ6K', NULL, NULL, NULL, '2022-08-30 15:59:27', '2022-08-30 15:59:27', NULL),
(8, 'Patient', 'auyoubshdi@gmail.com', '$2y$10$KvullS74wT4589Pnacwzyu.LOgG0wWBjrOXszk9Gv1bevxtt2CsMu', NULL, NULL, NULL, '2022-08-30 16:59:54', '2022-08-30 16:59:54', NULL),
(9, 'Patient', 'auyoubshdi2@gmail.com', '$2y$10$Z7e1uA6FJp3LxW7.vupk8OOgGv5spACNeIY8uqUfQUKOgMAjcyxpW', NULL, NULL, NULL, '2022-08-30 17:08:20', '2022-08-30 17:08:20', NULL),
(11, 'Accountant', 'receptionist@gmail.com', '$2y$10$Z7e1uA6FJp3LxW7.vupk8OOgGv5spACNeIY8uqUfQUKOgMAjcyxpW', NULL, NULL, NULL, NULL, NULL, 'Active'),
(12, 'Patient', 'ayoub@gmail.com', '$2y$10$4DPvmAiWB/AOpIhxFfP2n.gjdK3bI0f//CcQUbD.7/UQwt3Iv848e', NULL, NULL, NULL, '2022-08-31 12:15:18', '2022-08-31 12:15:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `accountant`
--

CREATE TABLE `accountant` (
  `accountant_id` int(11) NOT NULL,
  `account_id` int(11) DEFAULT NULL,
  `fname` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lname` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` decimal(13,0) DEFAULT NULL,
  `email` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth` date DEFAULT NULL,
  `country` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zone` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img_url` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `monthly_sal` decimal(9,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accountant`
--

INSERT INTO `accountant` (`accountant_id`, `account_id`, `fname`, `lname`, `mobile`, `email`, `birth`, `country`, `city`, `zone`, `img_url`, `monthly_sal`) VALUES
(1, 11, 'شذى ', 'العماد', '71234567', 'receptionist@gmail.com', '1996-12-12', 'YE', 'Taiz', 'Alashbat', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `account_id` int(11) DEFAULT NULL,
  `fname` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lname` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` decimal(13,0) DEFAULT NULL,
  `email` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth` date DEFAULT NULL,
  `country` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zone` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img_url` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `alert`
--

CREATE TABLE `alert` (
  `alert_id` int(11) NOT NULL,
  `review_id` int(11) NOT NULL,
  `alert_message` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alert_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `appo_id` int(11) NOT NULL,
  `doctor_id` int(11) DEFAULT NULL,
  `patient_id` int(11) NOT NULL,
  `reason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`appo_id`, `doctor_id`, `patient_id`, `reason`, `created_at`, `updated_at`, `status`) VALUES
(1, 1, 1, 'يعاني من الام الراس في أيام الحر', '2022-08-30 12:18:49', '2022-08-30 12:18:49', 'Pending'),
(2, 1, 2, 'يعاني من هشاشة العظام', '2022-08-30 12:42:09', '2022-08-30 12:42:09', 'Pending'),
(3, 2, 5, 'يعاني من مرض الخمي', '2022-08-30 14:46:42', '2022-08-30 14:46:42', 'Pending'),
(4, 1, 1, 'يعاني من الام في عظام القفص الصدري', '2022-08-31 13:57:40', '2022-08-31 13:57:40', 'Pending'),
(5, 1, 1, 'يعاني من الام عظام القفص الصدري', '2022-08-31 15:57:16', '2022-08-31 15:57:16', 'Pending'),
(6, 1, 2, 'يعاني من الام عظام الصدر في ايام الشتاء', '2022-08-31 16:13:19', '2022-08-31 16:13:19', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `billingid` int(11) NOT NULL,
  `accountant_id` int(11) NOT NULL,
  `review_id` int(11) NOT NULL,
  `billing_date` date NOT NULL,
  `billing_time` time NOT NULL,
  `discount` double NOT NULL,
  `tax_amount` double NOT NULL,
  `discount_reason` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `discharge_time` time NOT NULL,
  `discharge_date` date NOT NULL,
  `billing_state` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `doctor_id` int(11) NOT NULL,
  `account_id` int(11) DEFAULT NULL,
  `specialty_id` int(11) DEFAULT NULL,
  `fname` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lname` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` decimal(13,0) DEFAULT NULL,
  `email` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth` date DEFAULT NULL,
  `gender` varchar(6) COLLATE utf8mb4_unicode_ci DEFAULT 'none',
  `boodGroup` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
  `country` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zone` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img_url` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `monthly_sal` decimal(9,0) DEFAULT NULL,
  `doctor_rate_salary` decimal(4,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`doctor_id`, `account_id`, `specialty_id`, `fname`, `lname`, `mobile`, `email`, `birth`, `gender`, `boodGroup`, `country`, `city`, `zone`, `img_url`, `monthly_sal`, `doctor_rate_salary`) VALUES
(1, 4, NULL, 'غازي', 'الصلوي', '736814258', 'ghaz@gmail.com', '1984-08-30', NULL, 'none', 'YE', 'تعز', 'حازة مستشفي الثوزة', '1661866728.jpg', NULL, NULL),
(2, 5, NULL, 'عامر ', 'سلام', '776775774', 'amir.salam@gmail.com', '1982-01-30', NULL, 'none', 'YE', 'تعز', 'بيزباشا', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `doctor_schedule`
--

CREATE TABLE `doctor_schedule` (
  `doctor_schedule_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `chedule_id` int(11) NOT NULL,
  `review_id` int(11) DEFAULT NULL,
  `book_available` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `laboratory_sheet`
--

CREATE TABLE `laboratory_sheet` (
  `treatmentid` int(11) NOT NULL,
  `lab_technician_id` int(11) DEFAULT NULL,
  `laboratory_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lab_technician`
--

CREATE TABLE `lab_technician` (
  `lab_technician_id` int(11) NOT NULL,
  `account_id` int(11) DEFAULT NULL,
  `fname` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lname` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` decimal(13,0) DEFAULT NULL,
  `email` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth` date DEFAULT NULL,
  `country` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zone` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img_url` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `monthly_sal` decimal(9,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `medicineid` int(11) NOT NULL,
  `medicinename` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `medicinecost` double NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `medicine_img_url` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `patient_id` int(11) NOT NULL,
  `patient_wait_code` int(11) DEFAULT NULL,
  `patient_bar_code` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_id` int(11) DEFAULT NULL,
  `fname` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lname` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` decimal(13,0) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth` date DEFAULT NULL,
  `gender` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT 'Male',
  `country` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zone` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img_url` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `boodGroup` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`patient_id`, `patient_wait_code`, `patient_bar_code`, `account_id`, `fname`, `lname`, `mobile`, `email`, `birth`, `gender`, `country`, `city`, `zone`, `img_url`, `boodGroup`) VALUES
(1, NULL, NULL, 3, 'اسامه', 'سنان', '770579376', 'oosama770@gmail.com', '1996-12-12', 'Male', NULL, 'إب', 'القاعدة شارع الثورة', '1661861925.jpg', 'none'),
(2, NULL, NULL, 6, 'محمد عبدالواسع', 'علي', '770186920', 'mohammed97.aljafary@gmail.com', '1996-06-30', 'Male', 'YE', 'تعز', 'وادي القاظي', '1661871878.jpg', 'none'),
(5, NULL, NULL, 9, 'ايوب محمد', 'الشمبرى', '771246172', 'auyoubshdi2@gmail.com', '1995-08-30', 'Male', 'YE', 'تعز', 'الاشبط', '1661879300.jpg', 'none'),
(6, NULL, NULL, 12, 'ايوب', 'محمد', '774704612', 'ayoub@gmail.com', '1999-02-05', 'Male', 'YE', 'TAIZ', 'الاشبط', NULL, 'none');

-- --------------------------------------------------------

--
-- Table structure for table `pharmacist`
--

CREATE TABLE `pharmacist` (
  `pharmacist_id` int(11) NOT NULL,
  `account_id` int(11) DEFAULT NULL,
  `fname` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lname` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` decimal(13,0) DEFAULT NULL,
  `email` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth` date DEFAULT NULL,
  `country` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zone` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img_url` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `monthly_sal` decimal(9,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE `prescription` (
  `treatmentid` int(11) NOT NULL,
  `pharmacist_id` int(11) NOT NULL,
  `prescription_date` date NOT NULL,
  `status` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prescription_medcine`
--

CREATE TABLE `prescription_medcine` (
  `prescription_medcine_id` int(11) NOT NULL,
  `medicineid` int(11) NOT NULL,
  `treatmentid` int(11) NOT NULL,
  `notes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

CREATE TABLE `property` (
  `property_id` int(11) NOT NULL,
  `servive_id` int(11) NOT NULL,
  `property_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reset_password`
--

CREATE TABLE `reset_password` (
  `reset_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `result_id` int(11) NOT NULL,
  `test_id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `result_value` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `review_id` int(11) NOT NULL,
  `room_id` int(11) DEFAULT NULL,
  `appo_id` int(11) DEFAULT NULL,
  `review_reason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `review_state` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `review_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`review_id`, `room_id`, `appo_id`, `review_reason`, `review_state`, `review_date`) VALUES
(1, NULL, 1, 'يعاني من الام الراس في أيام الحر', 'Accepted', '2022-09-01 12:18:00'),
(2, NULL, 2, 'يعاني من هشاشة العظام', 'Accepted', '2022-09-02 12:41:00'),
(3, NULL, 3, 'يعاني من نقص الكالسيوم في العظام', 'Pending', '2022-04-30 14:42:00'),
(4, NULL, 4, 'يعاني من الام في عظام القفص الصدري', 'Pending', '2022-12-12 05:00:00'),
(5, NULL, 5, 'يعاني من الام عظام القفص الصدري', 'Pending', '2022-09-01 17:00:00'),
(6, NULL, 6, 'يعاني من الام عظام الصدر في ايام الشتاء', 'Pending', '2022-09-01 05:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `room_id` int(11) NOT NULL,
  `roomtype` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `roomno` int(11) DEFAULT NULL,
  `noofbeds` int(11) DEFAULT NULL,
  `room_tariff` double DEFAULT NULL,
  `status` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `chedule_id` int(11) NOT NULL,
  `day_` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_` date DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `service_type`
--

CREATE TABLE `service_type` (
  `servive_id` int(11) NOT NULL,
  `service_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_notes` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_cost` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `specialty`
--

CREATE TABLE `specialty` (
  `specialty_id` int(11) NOT NULL,
  `specialty_address_id` int(11) DEFAULT NULL,
  `specialty_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `specialty_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `specialty_create_date` date DEFAULT NULL,
  `specialty_img` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `specialty`
--

INSERT INTO `specialty` (`specialty_id`, `specialty_address_id`, `specialty_name`, `specialty_description`, `specialty_create_date`, `specialty_img`, `status`) VALUES
(1, NULL, 'قسم العظام', 'يهتم هذا القسم بالعظام والعمليات التعلقه به', NULL, '1661962711.png', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `specialty_address`
--

CREATE TABLE `specialty_address` (
  `specialty_address_id` int(11) NOT NULL,
  `specialty_country` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `specialty_city` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `specialty_zone` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `specialty_building` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `specialty_floor_no` decimal(4,0) DEFAULT NULL,
  `specialty_apartment_no` decimal(3,0) DEFAULT NULL,
  `specialty_description` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `test_id` int(11) NOT NULL,
  `servive_id` int(11) NOT NULL,
  `treatmentid` int(11) NOT NULL,
  `test_day` char(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `test_start_date` datetime DEFAULT NULL,
  `test_end_date` datetime DEFAULT NULL,
  `test_status` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `test_note` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `treatment`
--

CREATE TABLE `treatment` (
  `treatmentid` int(11) NOT NULL,
  `review_id` int(11) NOT NULL,
  `treatmenttype` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`account_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `accountant`
--
ALTER TABLE `accountant`
  ADD PRIMARY KEY (`accountant_id`),
  ADD KEY `fk_accounta_must_has_account` (`account_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD KEY `fk_admin_must_has_account` (`account_id`);

--
-- Indexes for table `alert`
--
ALTER TABLE `alert`
  ADD PRIMARY KEY (`alert_id`),
  ADD KEY `fk_alert_relations_review` (`review_id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appo_id`),
  ADD KEY `fk_appointm_relations_doctor` (`doctor_id`),
  ADD KEY `fk_appointm_relations_patient` (`patient_id`);

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`billingid`),
  ADD KEY `fk_bill_relations_accounta` (`accountant_id`),
  ADD KEY `fk_bill_relations_review` (`review_id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`doctor_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `fk_doctor_must_has_account` (`account_id`),
  ADD KEY `fk_doctor_works_at_specialt` (`specialty_id`);

--
-- Indexes for table `doctor_schedule`
--
ALTER TABLE `doctor_schedule`
  ADD PRIMARY KEY (`doctor_schedule_id`),
  ADD KEY `fk_doctor_s_relations_doctor` (`doctor_id`),
  ADD KEY `fk_doctor_s_relations_schedule` (`chedule_id`),
  ADD KEY `fk_doctor_s_done_at_review` (`review_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laboratory_sheet`
--
ALTER TABLE `laboratory_sheet`
  ADD PRIMARY KEY (`treatmentid`),
  ADD KEY `fk_laborato_relations_lab_tech` (`lab_technician_id`);

--
-- Indexes for table `lab_technician`
--
ALTER TABLE `lab_technician`
  ADD PRIMARY KEY (`lab_technician_id`),
  ADD KEY `fk_lab_tech_must_has_account` (`account_id`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`medicineid`);

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
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`patient_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `fk_patient_must_has_account` (`account_id`);

--
-- Indexes for table `pharmacist`
--
ALTER TABLE `pharmacist`
  ADD PRIMARY KEY (`pharmacist_id`),
  ADD KEY `fk_pharmaci_must_has_account` (`account_id`);

--
-- Indexes for table `prescription`
--
ALTER TABLE `prescription`
  ADD PRIMARY KEY (`treatmentid`),
  ADD KEY `fk_prescrip_relations_pharmaci` (`pharmacist_id`);

--
-- Indexes for table `prescription_medcine`
--
ALTER TABLE `prescription_medcine`
  ADD PRIMARY KEY (`prescription_medcine_id`),
  ADD KEY `fk_prescrip_relations_medicine` (`medicineid`),
  ADD KEY `fk_prescrip_relations_prescrip` (`treatmentid`);

--
-- Indexes for table `property`
--
ALTER TABLE `property`
  ADD PRIMARY KEY (`property_id`),
  ADD KEY `fk_property_relations_service_` (`servive_id`);

--
-- Indexes for table `reset_password`
--
ALTER TABLE `reset_password`
  ADD PRIMARY KEY (`reset_id`),
  ADD KEY `fk_reset_pa_relations_account` (`account_id`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`result_id`),
  ADD KEY `fk_result_relations_test` (`test_id`),
  ADD KEY `fk_result_relations_property` (`property_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `room_id` (`room_id`),
  ADD KEY `fk_review_relations_appointm` (`appo_id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`chedule_id`);

--
-- Indexes for table `service_type`
--
ALTER TABLE `service_type`
  ADD PRIMARY KEY (`servive_id`);

--
-- Indexes for table `specialty`
--
ALTER TABLE `specialty`
  ADD PRIMARY KEY (`specialty_id`),
  ADD KEY `fk_specialt_belong_to_specialt` (`specialty_address_id`);

--
-- Indexes for table `specialty_address`
--
ALTER TABLE `specialty_address`
  ADD PRIMARY KEY (`specialty_address_id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`test_id`),
  ADD KEY `fk_test_relations_service_` (`servive_id`),
  ADD KEY `fk_test_relations_laborato` (`treatmentid`);

--
-- Indexes for table `treatment`
--
ALTER TABLE `treatment`
  ADD PRIMARY KEY (`treatmentid`),
  ADD KEY `fk_treatmen_contain_review` (`review_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `accountant`
--
ALTER TABLE `accountant`
  MODIFY `accountant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `alert`
--
ALTER TABLE `alert`
  MODIFY `alert_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `appo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `billingid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `doctor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `doctor_schedule`
--
ALTER TABLE `doctor_schedule`
  MODIFY `doctor_schedule_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `laboratory_sheet`
--
ALTER TABLE `laboratory_sheet`
  MODIFY `treatmentid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lab_technician`
--
ALTER TABLE `lab_technician`
  MODIFY `lab_technician_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `medicineid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pharmacist`
--
ALTER TABLE `pharmacist`
  MODIFY `pharmacist_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prescription`
--
ALTER TABLE `prescription`
  MODIFY `treatmentid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prescription_medcine`
--
ALTER TABLE `prescription_medcine`
  MODIFY `prescription_medcine_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `property`
--
ALTER TABLE `property`
  MODIFY `property_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reset_password`
--
ALTER TABLE `reset_password`
  MODIFY `reset_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `result_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `chedule_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `service_type`
--
ALTER TABLE `service_type`
  MODIFY `servive_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `specialty`
--
ALTER TABLE `specialty`
  MODIFY `specialty_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `specialty_address`
--
ALTER TABLE `specialty_address`
  MODIFY `specialty_address_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `test_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `treatment`
--
ALTER TABLE `treatment`
  MODIFY `treatmentid` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accountant`
--
ALTER TABLE `accountant`
  ADD CONSTRAINT `fk_accounta_must_has_account` FOREIGN KEY (`account_id`) REFERENCES `account` (`account_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `fk_admin_must_has_account` FOREIGN KEY (`account_id`) REFERENCES `account` (`account_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `alert`
--
ALTER TABLE `alert`
  ADD CONSTRAINT `fk_alert_relations_review` FOREIGN KEY (`review_id`) REFERENCES `review` (`review_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `fk_appointm_relations_doctor` FOREIGN KEY (`doctor_id`) REFERENCES `doctor` (`doctor_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_appointm_relations_patient` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `fk_bill_relations_accounta` FOREIGN KEY (`accountant_id`) REFERENCES `accountant` (`accountant_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_bill_relations_review` FOREIGN KEY (`review_id`) REFERENCES `review` (`review_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `doctor`
--
ALTER TABLE `doctor`
  ADD CONSTRAINT `fk_doctor_must_has_account` FOREIGN KEY (`account_id`) REFERENCES `account` (`account_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_doctor_works_at_specialt` FOREIGN KEY (`specialty_id`) REFERENCES `specialty` (`specialty_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `doctor_schedule`
--
ALTER TABLE `doctor_schedule`
  ADD CONSTRAINT `fk_doctor_s_done_at_review` FOREIGN KEY (`review_id`) REFERENCES `review` (`review_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_doctor_s_relations_doctor` FOREIGN KEY (`doctor_id`) REFERENCES `doctor` (`doctor_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_doctor_s_relations_schedule` FOREIGN KEY (`chedule_id`) REFERENCES `schedule` (`chedule_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `laboratory_sheet`
--
ALTER TABLE `laboratory_sheet`
  ADD CONSTRAINT `fk_laborato_inheritan_treatmen` FOREIGN KEY (`treatmentid`) REFERENCES `treatment` (`treatmentid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_laborato_relations_lab_tech` FOREIGN KEY (`lab_technician_id`) REFERENCES `lab_technician` (`lab_technician_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lab_technician`
--
ALTER TABLE `lab_technician`
  ADD CONSTRAINT `fk_lab_tech_must_has_account` FOREIGN KEY (`account_id`) REFERENCES `account` (`account_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `patient`
--
ALTER TABLE `patient`
  ADD CONSTRAINT `fk_patient_must_has_account` FOREIGN KEY (`account_id`) REFERENCES `account` (`account_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pharmacist`
--
ALTER TABLE `pharmacist`
  ADD CONSTRAINT `fk_pharmaci_must_has_account` FOREIGN KEY (`account_id`) REFERENCES `account` (`account_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `prescription`
--
ALTER TABLE `prescription`
  ADD CONSTRAINT `fk_prescrip_inheritan_treatmen` FOREIGN KEY (`treatmentid`) REFERENCES `treatment` (`treatmentid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_prescrip_relations_pharmaci` FOREIGN KEY (`pharmacist_id`) REFERENCES `pharmacist` (`pharmacist_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `prescription_medcine`
--
ALTER TABLE `prescription_medcine`
  ADD CONSTRAINT `fk_prescrip_relations_medicine` FOREIGN KEY (`medicineid`) REFERENCES `medicine` (`medicineid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_prescrip_relations_prescrip` FOREIGN KEY (`treatmentid`) REFERENCES `prescription` (`treatmentid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `property`
--
ALTER TABLE `property`
  ADD CONSTRAINT `fk_property_relations_service_` FOREIGN KEY (`servive_id`) REFERENCES `service_type` (`servive_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reset_password`
--
ALTER TABLE `reset_password`
  ADD CONSTRAINT `fk_reset_pa_relations_account` FOREIGN KEY (`account_id`) REFERENCES `account` (`account_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `result`
--
ALTER TABLE `result`
  ADD CONSTRAINT `fk_result_relations_property` FOREIGN KEY (`property_id`) REFERENCES `property` (`property_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_result_relations_test` FOREIGN KEY (`test_id`) REFERENCES `test` (`test_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `fk_review_relations_appointm` FOREIGN KEY (`appo_id`) REFERENCES `appointment` (`appo_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `room` (`room_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `specialty`
--
ALTER TABLE `specialty`
  ADD CONSTRAINT `fk_specialt_belong_to_specialt` FOREIGN KEY (`specialty_address_id`) REFERENCES `specialty_address` (`specialty_address_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `test`
--
ALTER TABLE `test`
  ADD CONSTRAINT `fk_test_relations_laborato` FOREIGN KEY (`treatmentid`) REFERENCES `laboratory_sheet` (`treatmentid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_test_relations_service_` FOREIGN KEY (`servive_id`) REFERENCES `service_type` (`servive_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `treatment`
--
ALTER TABLE `treatment`
  ADD CONSTRAINT `fk_treatmen_contain_review` FOREIGN KEY (`review_id`) REFERENCES `review` (`review_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
