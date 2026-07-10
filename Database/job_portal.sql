-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2026 at 01:33 PM
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
-- Database: `job_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `job_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `expected_salary` decimal(10,2) NOT NULL DEFAULT 0.00,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `choice_order` int(11) DEFAULT NULL,
  `is_shortlisted` tinyint(1) NOT NULL DEFAULT 0,
  `interview_message` text DEFAULT NULL,
  `interview_sent` tinyint(1) NOT NULL DEFAULT 0,
  `interview_date` date DEFAULT NULL,
  `interview_time` time DEFAULT NULL,
  `interview_location` varchar(255) DEFAULT NULL,
  `interview_mail_sent` tinyint(1) NOT NULL DEFAULT 0,
  `final_status` enum('pending','joined','rejected') NOT NULL DEFAULT 'pending',
  `appointment_mail_sent` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `job_id`, `user_id`, `expected_salary`, `status`, `created_at`, `updated_at`, `choice_order`, `is_shortlisted`, `interview_message`, `interview_sent`, `interview_date`, `interview_time`, `interview_location`, `interview_mail_sent`, `final_status`, `appointment_mail_sent`) VALUES
(4, 2, 4, 25000.00, 'shortlisted', '2026-05-22 22:43:36', '2026-06-01 22:55:41', 1, 1, NULL, 0, '2026-05-29', '16:00:00', 'Deffodil Institute of IT, Sheik Mujib Road, Agrabad, Chattogram', 1, 'joined', 0),
(6, 1, 4, 40000.00, 'shortlisted', '2026-05-23 21:32:39', '2026-06-01 22:56:19', 1, 1, NULL, 0, NULL, NULL, NULL, 0, 'joined', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `candidate_documents`
--

CREATE TABLE `candidate_documents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `candidate_profile_id` bigint(20) UNSIGNED NOT NULL,
  `document_name` varchar(255) DEFAULT NULL,
  `document_file` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `candidate_educations`
--

CREATE TABLE `candidate_educations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `candidate_profile_id` bigint(20) UNSIGNED NOT NULL,
  `qualification_level` varchar(255) DEFAULT NULL,
  `group_subject` varchar(255) DEFAULT NULL,
  `institution_name` varchar(255) DEFAULT NULL,
  `board_university` varchar(255) DEFAULT NULL,
  `passing_year` varchar(255) DEFAULT NULL,
  `roll_registration` varchar(255) DEFAULT NULL,
  `cgpa_grade` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `candidate_educations`
--

INSERT INTO `candidate_educations` (`id`, `candidate_profile_id`, `qualification_level`, `group_subject`, `institution_name`, `board_university`, `passing_year`, `roll_registration`, `cgpa_grade`, `created_at`, `updated_at`) VALUES
(53, 2, 'SSC', 'business studies', 'abdul hamid high school', NULL, '2017', NULL, '4.55', '2026-05-22 22:55:17', '2026-05-22 22:55:17'),
(54, 2, 'HSC', 'business studies', 'll colege', NULL, '2019', NULL, '4.78', '2026-05-22 22:55:17', '2026-05-22 22:55:17'),
(55, 2, 'Honors', 'Accounting', 'kk university', NULL, '2024', NULL, '3.45', '2026-05-22 22:55:17', '2026-05-22 22:55:17'),
(56, 2, 'Masters', 'Accounting', 'hjh University', NULL, '2025', NULL, '3.74', '2026-05-22 22:55:17', '2026-05-22 22:55:17'),
(57, 2, 'Others', 'wdpf', 'idb', NULL, '2026', NULL, '5', '2026-05-22 22:55:17', '2026-05-22 22:55:17');

-- --------------------------------------------------------

--
-- Table structure for table `candidate_experiences`
--

CREATE TABLE `candidate_experiences` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `candidate_profile_id` bigint(20) UNSIGNED NOT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `job_title` varchar(255) DEFAULT NULL,
  `employment_type` varchar(255) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `currently_working` tinyint(1) NOT NULL DEFAULT 0,
  `responsibilities` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `candidate_experiences`
--

INSERT INTO `candidate_experiences` (`id`, `candidate_profile_id`, `company_name`, `job_title`, `employment_type`, `start_date`, `end_date`, `currently_working`, `responsibilities`, `created_at`, `updated_at`) VALUES
(33, 2, 'XYZ company', 'Accounts Manager', NULL, '2026-05-01', NULL, 0, 'rgwej dherwj whyurije', '2026-05-22 22:55:18', '2026-05-22 22:55:18');

-- --------------------------------------------------------

--
-- Table structure for table `candidate_profiles`
--

CREATE TABLE `candidate_profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `district` varchar(255) DEFAULT NULL,
  `thana` varchar(255) DEFAULT NULL,
  `post_office` varchar(255) DEFAULT NULL,
  `present_address` text DEFAULT NULL,
  `alternate_mobile` varchar(255) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `skills` text DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `nationality` varchar(255) DEFAULT NULL,
  `marital_status` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `current_location` varchar(255) DEFAULT NULL,
  `permanent_address` varchar(255) DEFAULT NULL,
  `father_name` varchar(255) DEFAULT NULL,
  `mother_name` varchar(255) DEFAULT NULL,
  `resume` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `candidate_profiles`
--

INSERT INTO `candidate_profiles` (`id`, `user_id`, `district`, `thana`, `post_office`, `present_address`, `alternate_mobile`, `age`, `skills`, `photo`, `created_at`, `updated_at`, `date_of_birth`, `gender`, `nationality`, `marital_status`, `phone`, `current_location`, `permanent_address`, `father_name`, `mother_name`, `resume`) VALUES
(2, 4, 'Chittagong', 'HATHAZARI', 'HATHAZARI', 'HATHAZARI, CTG', '01834376883', NULL, NULL, 'candidate/photos/qVWt7tOzVM4K8ealSNJ8zvBkT7oj1VtjGIKO2JlL.jpg', '2026-05-22 22:43:47', '2026-05-22 22:55:15', '1997-05-01', 'Male', 'Bangladeshi', 'Married', '01834376883', NULL, NULL, 'SAHAB UDDIN', 'FERUTAJ BEGUM', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `candidate_trainings`
--

CREATE TABLE `candidate_trainings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `candidate_profile_id` bigint(20) UNSIGNED NOT NULL,
  `training_title` varchar(255) NOT NULL,
  `institution` varchar(255) NOT NULL,
  `duration` varchar(255) NOT NULL,
  `passing_year` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `candidate_trainings`
--

INSERT INTO `candidate_trainings` (`id`, `candidate_profile_id`, `training_title`, `institution`, `duration`, `passing_year`, `created_at`, `updated_at`) VALUES
(7, 2, 'WDPF', 'IDB', '8.5 months', '2025', '2026-05-22 22:55:19', '2026-05-22 22:55:19');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `icon`, `created_at`, `updated_at`) VALUES
(1, 'Accounting/Finance', 'accountingfinance', 'fas fa-calculator', '2026-05-06 21:17:17', '2026-05-06 21:17:17'),
(2, 'Production/Operation', 'productionoperation', 'fas fa-cogs', '2026-05-06 21:17:17', '2026-05-06 21:17:17'),
(3, 'Agro (Plant/Animal/Fisheries)', 'agro-plantanimalfisheries', 'fas fa-seedling', '2026-05-06 21:17:17', '2026-05-06 21:17:17'),
(4, 'Bank/Non-Bank Fin. Institution', 'banknon-bank-fin-institution', 'fas fa-university', '2026-05-06 21:17:17', '2026-05-06 21:17:17'),
(5, 'Hospitality/ Travel/ Tourism', 'hospitality-travel-tourism', 'fas fa-plane', '2026-05-06 21:17:17', '2026-05-06 21:17:17'),
(6, 'NGO/Development', 'ngodevelopment', 'fas fa-hands-helping', '2026-05-06 21:17:18', '2026-05-06 21:17:18'),
(7, 'Supply Chain/Procurement', 'supply-chainprocurement', 'fas fa-truck', '2026-05-06 21:17:18', '2026-05-06 21:17:18'),
(8, 'Commercial', 'commercial', 'fas fa-store', '2026-05-06 21:17:18', '2026-05-06 21:17:18'),
(9, 'Research/Consultancy', 'researchconsultancy', 'fas fa-search', '2026-05-06 21:17:18', '2026-05-06 21:17:18'),
(10, 'Education/Training', 'educationtraining', 'fas fa-graduation-cap', '2026-05-06 21:17:18', '2026-05-06 21:17:18'),
(11, 'IT/Telecommunication', 'ittelecommunication', 'fas fa-laptop-code', '2026-05-06 21:17:18', '2026-05-06 21:17:18'),
(12, 'Receptionist/ PS', 'receptionist-ps', 'fas fa-user-tie', '2026-05-06 21:17:18', '2026-05-06 21:17:18'),
(13, 'Engineer/Architect', 'engineerarchitect', 'fas fa-drafting-compass', '2026-05-06 21:17:18', '2026-05-06 21:17:18'),
(14, 'Marketing/Sales', 'marketingsales', 'fas fa-chart-line', '2026-05-06 21:17:18', '2026-05-06 21:17:18'),
(15, 'Data Entry/Operator/BPO', 'data-entryoperatorbpo', 'fas fa-keyboard', '2026-05-06 21:17:18', '2026-05-06 21:17:18'),
(16, 'Garments/Textile', 'garmentstextile', 'fas fa-tshirt', '2026-05-06 21:17:18', '2026-05-06 21:17:18'),
(17, 'Customer Service/Call Centre', 'customer-servicecall-centre', 'fas fa-headset', '2026-05-06 21:17:18', '2026-05-06 21:17:18'),
(18, 'Design/Creative', 'designcreative', 'fas fa-paint-brush', '2026-05-06 21:17:18', '2026-05-06 21:17:18'),
(19, 'HR/Org. Development', 'hrorg-development', 'fas fa-users-cog', '2026-05-06 21:17:18', '2026-05-06 21:17:18'),
(20, 'Media/Advertisement/Event Mgt.', 'mediaadvertisementevent-mgt', 'fas fa-bullhorn', '2026-05-06 21:17:18', '2026-05-06 21:17:18'),
(21, 'Security/Support Service', 'securitysupport-service', 'fas fa-shield-alt', '2026-05-06 21:17:18', '2026-05-06 21:17:18'),
(22, 'General Management/Admin', 'general-managementadmin', 'fas fa-briefcase', '2026-05-06 21:17:18', '2026-05-06 21:17:18'),
(23, 'Pharmaceutical', 'pharmaceutical', 'fas fa-pills', '2026-05-06 21:17:18', '2026-05-06 21:17:18'),
(24, 'Law/Legal', 'lawlegal', 'fas fa-gavel', '2026-05-06 21:17:18', '2026-05-06 21:17:18'),
(25, 'Healthcare/Medical', 'healthcaremedical', 'fas fa-heartbeat', '2026-05-06 21:17:18', '2026-05-06 21:17:18'),
(26, 'Electrician/Electronics Technician', 'electricianelectronics-technician', 'fas fa-bolt', '2026-05-06 21:17:18', '2026-05-06 21:17:18'),
(27, 'Company Secretary/Regulatory affairs', 'company-secretaryregulatory-affairs', 'fas fa-file-contract', '2026-05-06 21:17:18', '2026-05-06 21:17:18'),
(28, 'Data Entry/Computer Operator', 'data-entrycomputer-operator', 'fas fa-desktop', '2026-05-06 21:17:18', '2026-05-06 21:17:18'),
(29, 'Driver', 'driver', 'fas fa-car', '2026-05-06 21:17:18', '2026-05-06 21:17:18'),
(30, 'Pathologist/ Lab Assistant', 'pathologist-lab-assistant', 'fas fa-flask', '2026-05-06 21:17:18', '2026-05-06 21:17:18'),
(31, 'Mechanic/Technician', 'mechanictechnician', 'fas fa-wrench', '2026-05-06 21:17:18', '2026-05-06 21:17:18'),
(32, 'Chef/Cook', 'chefcook', 'fas fa-utensils', '2026-05-06 21:17:18', '2026-05-06 21:17:18'),
(33, 'Security Guard', 'security-guard', 'fas fa-user-shield', '2026-05-06 21:17:18', '2026-05-06 21:17:18'),
(34, 'Nurse', 'nurse', 'fas fa-user-md', '2026-05-06 21:17:18', '2026-05-06 21:17:18'),
(35, 'Peon', 'peon', 'fas fa-hands', '2026-05-06 21:17:18', '2026-05-06 21:17:18'),
(36, 'Waiter/Waitress', 'waiterwaitress', 'fas fa-concierge-bell', '2026-05-06 21:17:18', '2026-05-06 21:17:18'),
(37, 'Delivery Man', 'delivery-man', 'fas fa-motorcycle', '2026-05-06 21:17:18', '2026-05-06 21:17:18'),
(38, 'Sales Representative (SR)', 'sales-representative-sr', 'fas fa-shopping-bag', '2026-05-06 21:17:18', '2026-05-06 21:17:18'),
(39, 'Showroom Assistant/Salesman', 'showroom-assistantsalesman', 'fas fa-user-tag', '2026-05-06 21:17:18', '2026-05-06 21:17:18'),
(40, 'Graphic Designer', 'graphic-designer', 'fas fa-bezier-curve', '2026-05-06 21:17:18', '2026-05-06 21:17:18'),
(41, 'Caregiver/Nanny', 'caregivernanny', 'fas fa-baby', '2026-05-06 21:17:18', '2026-05-06 21:17:18'),
(42, 'Garments technician/Machine operator', 'garments-technicianmachine-operator', 'fas fa-industry', '2026-05-06 21:17:18', '2026-05-06 21:17:18'),
(43, 'CAD Operator', 'cad-operator', 'fas fa-pencil-ruler', '2026-05-06 21:17:18', '2026-05-06 21:17:18'),
(44, 'Housekeeper', 'housekeeper', 'fas fa-broom', '2026-05-06 21:17:18', '2026-05-06 21:17:18'),
(45, 'Welder', 'welder', 'fas fa-tools', '2026-05-06 21:17:18', '2026-05-06 21:17:18'),
(46, 'Plumber/Pipe fitting', 'plumberpipe-fitting', 'fas fa-water', '2026-05-06 21:17:18', '2026-05-06 21:17:18'),
(47, 'Sewing machine operator', 'sewing-machine-operator', 'fas fa-cut', '2026-05-06 21:17:18', '2026-05-06 21:17:18'),
(48, 'Cleaner', 'cleaner', 'fas fa-soap', '2026-05-06 21:17:18', '2026-05-06 21:17:18'),
(49, 'Mason/ Construction worker', 'mason-construction-worker', 'fas fa-hard-hat', '2026-05-06 21:17:18', '2026-05-06 21:17:18'),
(50, 'Gym/ Fitness Trainer', 'gym-fitness-trainer', 'fas fa-dumbbell', '2026-05-06 21:17:18', '2026-05-06 21:17:18'),
(51, 'Beautician/ Salon worker', 'beautician-salon-worker', 'fas fa-magic', '2026-05-06 21:17:18', '2026-05-06 21:17:18'),
(52, 'Gardener', 'gardener', 'fas fa-leaf', '2026-05-06 21:17:18', '2026-05-06 21:17:18'),
(53, 'Interpreter', 'interpreter', 'fas fa-language', '2026-05-06 21:17:18', '2026-05-06 21:17:18'),
(54, 'Fire Safety/ Firefighter', 'fire-safety-firefighter', 'fas fa-fire-extinguisher', '2026-05-06 21:17:18', '2026-05-06 21:17:18'),
(55, 'Imam/ Khatib/ Muezzin', 'imam-khatib-muezzin', 'fas fa-place-of-worship', '2026-05-06 21:17:18', '2026-05-06 21:17:18'),
(56, 'Carpenter', 'carpenter', 'fas fa-hammer', '2026-05-06 21:17:18', '2026-05-06 21:17:18'),
(57, 'Physiotherapist', 'physiotherapist', 'fas fa-walking', '2026-05-06 21:17:18', '2026-05-06 21:17:18'),
(58, 'Boiler Operator', 'boiler-operator', 'fas fa-hot-tub', '2026-05-06 21:17:18', '2026-05-06 21:17:18'),
(59, 'Others', 'others', 'fas fa-th-list', '2026-05-06 21:17:18', '2026-05-06 21:17:18');

-- --------------------------------------------------------

--
-- Table structure for table `company_profiles`
--

CREATE TABLE `company_profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `company_logo` varchar(255) DEFAULT NULL,
  `company_email` varchar(255) DEFAULT NULL,
  `company_phone` varchar(255) DEFAULT NULL,
  `industry_type` varchar(255) DEFAULT NULL,
  `company_size` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `founded_year` varchar(255) DEFAULT NULL,
  `division` varchar(255) DEFAULT NULL,
  `district` varchar(255) DEFAULT NULL,
  `thana` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `mission` text DEFAULT NULL,
  `vision` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `total_employees` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company_profiles`
--

INSERT INTO `company_profiles` (`id`, `user_id`, `company_name`, `company_logo`, `company_email`, `company_phone`, `industry_type`, `company_size`, `website`, `founded_year`, `division`, `district`, `thana`, `address`, `mission`, `vision`, `description`, `facebook`, `linkedin`, `youtube`, `total_employees`, `created_at`, `updated_at`) VALUES
(1, 3, 'Sabuj Suto Textile', 'company-logos/DSnC0z7W6C0mOY2hbr06S1196ETYmXgojnbh3dhG.png', 'hr@sabujsutotextile.com', '+880 2-XXXXXXX', 'Textiles or Apparel & Fashion', '500+', 'https://www.sabujsutotextile.com', '2006', 'Chattogram', 'Chattogram', 'Agrabad', 'Agrabad commercial aria, Double mooring, Chattogram.', 'To manufacture and deliver world-class apparel by utilizing sustainable practices, cutting-edge technology, and skilled craftsmanship, ensuring maximum value for our global clients while empowering our community.', 'To become a global pioneer in eco-friendly garment manufacturing, recognized worldwide for setting new benchmarks in sustainable fashion, quality innovation, and ethical workplace culture by 2030.', 'Sabuj Suto Textile is a premier, full-service garment manufacturing and textile corporation. We specialize in producing a diverse range of high-quality apparel, catering to international brands, retailers, and corporate clients. Our state-of-the-art facilities handle everything from fabric sourcing and design conceptualization to cutting, sewing, rigorous quality control, and packaging.\r\n\r\nWhat sets us apart is our vertical integration and dedication to \"green\" textile solutions. By investing in energy-efficient machinery and ethical waste management, we ensure that our production lines are both high-yielding and environmentally responsible. Backed by a dedicated team of designers, engineers, and skilled artisans, Sabuj Suto Textile is uniquely positioned to handle bulk global orders while maintaining the flexibility required for bespoke, high-fashion collections. We don\'t just manufacture clothes; we weave trust, quality, and sustainability into every thread.', 'https://www.facebook.com/sabujsutotextile', 'https://linkedin.com/company/sabuj-suto-textile', 'https://www.youtube.com/@sabujsutotextile', 1400, '2026-05-18 21:31:31', '2026-05-18 22:12:49');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `division_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `division_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Dhaka', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(2, 1, 'Faridpur', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(3, 1, 'Gazipur', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(4, 1, 'Gopalganj', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(5, 1, 'Kishoreganj', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(6, 1, 'Madaripur', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(7, 1, 'Manikganj', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(8, 1, 'Munshiganj', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(9, 1, 'Narayanganj', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(10, 1, 'Narsingdi', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(11, 1, 'Rajbari', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(12, 1, 'Shariatpur', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(13, 1, 'Tangail', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(14, 2, 'Bagerhat', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(15, 2, 'Chuadanga', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(16, 2, 'Jessore', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(17, 2, 'Jhenaidah', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(18, 2, 'Khulna', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(19, 2, 'Kushtia', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(20, 2, 'Magura', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(21, 2, 'Meherpur', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(22, 2, 'Narail', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(23, 2, 'Satkhira', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(24, 3, 'Bandarban', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(25, 3, 'Brahmanbaria', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(26, 3, 'Chandpur', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(27, 3, 'Chittagong', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(28, 3, 'Comilla', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(29, 3, 'Coxs Bazar', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(30, 3, 'Feni', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(31, 3, 'Khagrachhari', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(32, 3, 'Lakshmipur', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(33, 3, 'Noakhali', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(34, 3, 'Rangamati', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(35, 4, 'Bogura', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(36, 4, 'Joypurhat', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(37, 4, 'Naogaon', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(38, 4, 'Natore', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(39, 4, 'Chapainawabganj', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(40, 4, 'Pabna', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(41, 4, 'Rajshahi', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(42, 4, 'Sirajganj', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(43, 5, 'Habiganj', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(44, 5, 'Moulvibazar', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(45, 5, 'Sunamganj', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(46, 5, 'Sylhet', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(47, 6, 'Dinajpur', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(48, 6, 'Gaibandha', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(49, 6, 'Kurigram', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(50, 6, 'Lalmonirhat', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(51, 6, 'Nilphamari', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(52, 6, 'Panchagarh', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(53, 6, 'Rangpur', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(54, 6, 'Thakurgaon', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(55, 7, 'Jamalpur', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(56, 7, 'Mymensingh', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(57, 7, 'Netrokona', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(58, 7, 'Sherpur', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(59, 8, 'Jhalokati', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(60, 8, 'Barguna', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(61, 8, 'Barisal', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(62, 8, 'Bhola', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(63, 8, 'Patuakhali', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(64, 8, 'Pirojpur', '2026-05-06 00:39:38', '2026-05-06 00:39:38');

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE `divisions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Dhaka', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(2, 'Khulna', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(3, 'Chittagong', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(4, 'Rajshahi', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(5, 'Sylhet', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(6, 'Rongpur', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(7, 'Mymensingh', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(8, 'Barisal', '2026-05-06 00:39:38', '2026-05-06 00:39:38');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_listings`
--

CREATE TABLE `job_listings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `vacancy` int(11) NOT NULL DEFAULT 1,
  `category` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `salary_range` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `type` varchar(255) NOT NULL DEFAULT 'Full-time',
  `deadline` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_listings`
--

INSERT INTO `job_listings` (`id`, `user_id`, `title`, `description`, `vacancy`, `category`, `location`, `salary_range`, `status`, `type`, `deadline`, `created_at`, `updated_at`) VALUES
(1, 3, 'Account Officer', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 1, '1', 'Chattogram,Bangladesh', '15000-20000', 'active', 'Full-time', '2026-05-31', '2026-05-06 22:26:11', '2026-05-06 22:26:11'),
(2, 3, 'Production Manager', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 1, '2', 'Chattogram,Bangladesh', '40000-50000', 'active', 'Full-time', '2026-05-31', '2026-05-06 22:28:28', '2026-05-06 22:28:28'),
(3, 3, 'Production Officer', 'Ha-Meem GroupEstablished in 1984, Ha-Meem is one of the largest and most influential garment manufacturers in Bangladesh.Core Products: Denim, knitwear, and woven garments.Clients: Supplies to major global retailers and fast-fashion brands.Key Operations: Operates multiple factories, advanced denim washing plants, and packaging units.Website: Ha-Meem Group', 1, '2', 'Chattogram,Bangladesh', '25000-30000', 'active', 'Full-time', '2026-05-31', '2026-05-16 23:49:18', '2026-05-16 23:49:18');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_05_02_044112_create_jobs_table', 1),
(5, '2026_05_02_063542_create_applications_table', 1),
(6, '2026_05_04_044634_create_categories_table', 1),
(7, '2026_05_06_050921_create_candidate_profiles_table', 1),
(8, '2026_05_06_062824_create_divisions_table', 1),
(9, '2026_05_06_062825_create_districts_table', 1),
(10, '2026_05_06_062825_create_upazilas_table', 1),
(11, '2026_05_10_034655_add_new_fields_to_candidate_profiles_table', 2),
(12, '2026_05_10_035523_create_candidate_resumes_table', 2),
(13, '2026_05_10_064455_create_candidate_education_table', 3),
(14, '2026_05_10_065910_add_education_fields_to_candidate_profiles', 4),
(15, '2026_05_11_035747_create_candidate_educations_table', 5),
(16, '2026_05_11_042018_create_candidate_educations_table', 6),
(17, '2026_05_11_042018_create_candidate_experiences_table', 6),
(18, '2026_05_11_042019_create_candidate_documents_table', 6),
(19, '2026_05_12_055314_create_candidate_trainings_table', 7),
(20, '2026_05_16_042806_create_saved_jobs_table', 8),
(21, '2026_05_18_031115_add_deadline_to_job_listings_table', 9),
(22, '2026_05_18_040300_add_choice_and_shortlist_to_applications_table', 10),
(23, '2026_05_18_042639_add_resume_to_candidate_profiles_table', 11),
(24, '2026_05_18_055834_add_interview_fields_to_applications_table', 12),
(25, '2026_05_19_031926_create_company_profiles_table', 13),
(26, '2026_05_20_045944_create_notifications_table', 14),
(27, '2026_05_23_040443_add_status_to_job_listings_table', 15),
(28, '2026_05_23_042756_rename_message_to_expected_salary_in_applications_table', 16),
(29, '2026_06_02_034408_add_final_status_to_applications_table', 17),
(30, '2026_06_03_063554_add_vacancy_to_job_listings_table', 18),
(31, '2026_06_06_044437_add_image_to_users_table', 19);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) NOT NULL,
  `type` varchar(255) NOT NULL,
  `notifiable_type` varchar(255) NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('058bd494-9807-41f4-8077-76b8c6959d7e', 'App\\Notifications\\CandidateNotification', 'App\\Models\\User', 4, '{\"title\":\"Interview Scheduled\",\"message\":\"Employer scheduled your interview.\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/candidate\\/interview-schedule\"}', NULL, '2026-05-22 22:57:53', '2026-05-22 22:57:53'),
('2a9113ba-5f63-437b-9c44-2a9d1d24fae1', 'App\\Notifications\\CandidateNotification', 'App\\Models\\User', 4, '{\"title\":\"Application Shortlisted\",\"message\":\"Congratulations! Your application has been shortlisted.\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/candidate\\/interview-schedule\"}', NULL, '2026-05-24 00:56:40', '2026-05-24 00:56:40'),
('2ec39664-bbd0-44f6-b545-b093e4bbb55b', 'App\\Notifications\\CandidateNotification', 'App\\Models\\User', 4, '{\"title\":\"Employer Viewed Your CV\",\"message\":\"An employer viewed your profile.\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/candidate\\/applied-jobs\"}', NULL, '2026-05-23 00:44:08', '2026-05-23 00:44:08'),
('314e3701-e136-4702-95f1-1e7131def855', 'App\\Notifications\\CandidateNotification', 'App\\Models\\User', 4, '{\"title\":\"Employer Viewed Your CV\",\"message\":\"An employer viewed your profile.\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/candidate\\/applied-jobs\"}', NULL, '2026-05-23 00:43:59', '2026-05-23 00:43:59'),
('332d09e2-64ea-49ba-998b-eb0db7d2978d', 'App\\Notifications\\SystemNotification', 'App\\Models\\User', 6, '{\"title\":\"New Job Posted\",\"message\":\"Security Guard\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/jobs\"}', NULL, '2026-06-07 21:20:59', '2026-06-07 21:20:59'),
('64c05cfc-770d-4421-ba47-871cd8fa4720', 'App\\Notifications\\CandidateNotification', 'App\\Models\\User', 4, '{\"title\":\"Employer Viewed Your CV\",\"message\":\"An employer viewed your profile.\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/candidate\\/applied-jobs\"}', NULL, '2026-05-23 00:40:14', '2026-05-23 00:40:14'),
('71f49d82-77e2-4e83-aead-7f31d5f8ea38', 'App\\Notifications\\CandidateNotification', 'App\\Models\\User', 4, '{\"title\":\"Application Shortlisted\",\"message\":\"Congratulations! Your application has been shortlisted.\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/candidate\\/interview-schedule\"}', NULL, '2026-05-23 21:46:45', '2026-05-23 21:46:45'),
('86b2ed5e-71cc-4c4b-95cb-b60f4a2f5682', 'App\\Notifications\\CandidateNotification', 'App\\Models\\User', 4, '{\"title\":\"Employer Viewed Your CV\",\"message\":\"An employer viewed your profile.\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/candidate\\/applied-jobs\"}', NULL, '2026-06-07 21:31:08', '2026-06-07 21:31:08'),
('90037e3a-b3eb-4091-80f8-dcb007070b98', 'App\\Notifications\\CandidateNotification', 'App\\Models\\User', 4, '{\"title\":\"Application Shortlisted\",\"message\":\"Congratulations! Your application has been shortlisted.\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/candidate\\/interview-schedule\"}', NULL, '2026-05-22 22:57:09', '2026-05-22 22:57:09'),
('91dac215-199d-4e2f-9eba-e605e5cedde2', 'App\\Notifications\\CandidateNotification', 'App\\Models\\User', 4, '{\"title\":\"Application Shortlisted\",\"message\":\"Congratulations! Your application has been shortlisted.\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/candidate\\/interview-schedule\"}', NULL, '2026-06-07 21:32:40', '2026-06-07 21:32:40'),
('9357692c-d186-4c48-b8d9-dca514019507', 'App\\Notifications\\CandidateNotification', 'App\\Models\\User', 1, '{\"title\":\"Employer Viewed Your CV\",\"message\":\"An employer viewed your profile.\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/candidate\\/applied-jobs\"}', NULL, '2026-05-20 21:43:40', '2026-05-20 21:43:40'),
('9c7c0152-0e86-4f8b-8d68-4bc8fb5992ab', 'App\\Notifications\\CandidateNotification', 'App\\Models\\User', 4, '{\"title\":\"Employer Viewed Your CV\",\"message\":\"An employer viewed your profile.\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/candidate\\/applied-jobs\"}', NULL, '2026-05-22 22:56:09', '2026-05-22 22:56:09'),
('b8df2356-c6fb-4eec-994c-ed69cb658e49', 'App\\Notifications\\CandidateNotification', 'App\\Models\\User', 4, '{\"title\":\"Employer Viewed Your CV\",\"message\":\"An employer viewed your profile.\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/candidate\\/applied-jobs\"}', NULL, '2026-05-23 00:44:07', '2026-05-23 00:44:07'),
('ba857e46-5036-419c-a454-240669b5e684', 'App\\Notifications\\CandidateNotification', 'App\\Models\\User', 1, '{\"title\":\"Employer Viewed Your CV\",\"message\":\"An employer viewed your profile.\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/candidate\\/applied-jobs\"}', NULL, '2026-05-22 22:55:53', '2026-05-22 22:55:53'),
('cfe2a4b2-4cde-4545-b88a-d44e44124d6f', 'App\\Notifications\\CandidateNotification', 'App\\Models\\User', 4, '{\"title\":\"Employer Viewed Your CV\",\"message\":\"An employer viewed your profile.\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/candidate\\/applied-jobs\"}', NULL, '2026-05-23 21:40:13', '2026-05-23 21:40:13'),
('f9c2bfd5-e9d1-4f47-86aa-96858e33fd52', 'App\\Notifications\\CandidateNotification', 'App\\Models\\User', 4, '{\"title\":\"Interview Scheduled\",\"message\":\"Employer scheduled your interview.\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/candidate\\/interview-schedule\"}', NULL, '2026-06-07 21:34:00', '2026-06-07 21:34:00');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `saved_jobs`
--

CREATE TABLE `saved_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `job_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('3sD2UXLV5GLO0wYdX5SJ8HP1wJtCSeFRYahh5ROC', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36 Edg/146.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiamFjOThPemVabTlpdFVJZVdlZE01cFhWS3BUeUtDNmIyZXZKU3lIUSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9fQ==', 1780891523),
('GwCGK4rIrlhIBztQkJjURcAfgcNyjTLxgOdMoPcv', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQjdxVlVGNW5yWDFJd0pxMFp0ZkhtRHhTbXpSN0ZFSFBIVFpWQVhiZyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7czo1OiJyb3V0ZSI7czo1OiJsb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1780888559),
('uOMElvNsHHXpB9E5vZW5WRtqxjEONGnn3iNmlSJp', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:152.0) Gecko/20100101 Firefox/152.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVDdBbnBrREk2aExxTnNQOUVJcU1MVHRTWXAxUTVTa29xalFnVThVOSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9fQ==', 1783683157);

-- --------------------------------------------------------

--
-- Table structure for table `upazilas`
--

CREATE TABLE `upazilas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `district_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `upazilas`
--

INSERT INTO `upazilas` (`id`, `district_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Dhamrai', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(2, 1, 'Dohar', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(3, 1, 'Keraniganj', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(4, 1, 'Nawabganj', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(5, 1, 'Savar', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(6, 2, 'Alfadanga', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(7, 2, 'Bhanga', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(8, 2, 'Boalmari', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(9, 2, 'Charbhadrasan', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(10, 2, 'Faridpur Sadar', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(11, 2, 'Madhukhali', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(12, 2, 'Nagarkanda', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(13, 2, 'Sadarpur', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(14, 2, 'Saltha', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(15, 3, 'Gazipur Sadar', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(16, 3, 'Kaliakair', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(17, 3, 'Kaliganj', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(18, 3, 'Kapasia', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(19, 3, 'Sreepur', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(20, 4, 'Gopalganj Sadar', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(21, 4, 'Kashiani', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(22, 4, 'Kotalipara', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(23, 4, 'Muksudpur', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(24, 4, 'Tungipara', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(25, 5, 'Austagram', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(26, 5, 'Bajitpur', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(27, 5, 'Bhairab', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(28, 5, 'Hossainpur', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(29, 5, 'Itna', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(30, 5, 'Karimganj', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(31, 5, 'Katiadi', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(32, 5, 'Kishoreganj Sadar', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(33, 5, 'Kuliarchar', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(34, 5, 'Mithamoin', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(35, 5, 'Nikli', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(36, 5, 'Pakundia', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(37, 5, 'Tarail', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(38, 6, 'Kalkini', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(39, 6, 'Madaripur Sadar', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(40, 6, 'Rajoir', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(41, 6, 'Shibchar', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(42, 6, 'Dasar', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(43, 7, 'Daulatpur', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(44, 7, 'Ghior', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(45, 7, 'Harirampur', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(46, 7, 'Manikganj Sadar', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(47, 7, 'Saturia', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(48, 7, 'Shibalaya', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(49, 7, 'Singair', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(50, 8, 'Gazaria', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(51, 8, 'Lohajang', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(52, 8, 'Munshiganj Sadar', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(53, 8, 'Sirajdikhan', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(54, 8, 'Sreenagar', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(55, 8, 'Tongibari', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(56, 9, 'Araihazar', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(57, 9, 'Sonargaon', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(58, 9, 'Narayanganj Sadar', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(59, 9, 'Rupganj', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(60, 9, 'Bandar', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(61, 10, 'Belabo', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(62, 10, 'Monohardi', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(63, 10, 'Narsingdi Sadar', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(64, 10, 'Palash', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(65, 10, 'Raipura', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(66, 10, 'Shibpur', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(67, 11, 'Baliakandi', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(68, 11, 'Goalandaphor', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(69, 11, 'Kalukhali', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(70, 11, 'Pangsha', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(71, 11, 'Rajbari Sadar', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(72, 12, 'Bhedarganj', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(73, 12, 'Damudya', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(74, 12, 'Gosairhat', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(75, 12, 'Naria', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(76, 12, 'Shariatpur Sadar', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(77, 12, 'Zajira', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(78, 13, 'Basail', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(79, 13, 'Bhuanpur', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(80, 13, 'Delduar', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(81, 13, 'Dhanbari', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(82, 13, 'Ghatail', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(83, 13, 'Gopalpur', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(84, 13, 'Kalihati', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(85, 13, 'Madhupur', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(86, 13, 'Mirzapur', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(87, 13, 'Nagarpur', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(88, 13, 'Sakhipur', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(89, 13, 'Tangail Sadar', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(90, 14, 'Chitalmari', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(91, 14, 'Fakirhat', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(92, 14, 'Kachua', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(93, 14, 'Mollahat', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(94, 14, 'Mongla', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(95, 14, 'Morelganj', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(96, 14, 'Rampal', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(97, 14, 'Sarankhola', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(98, 14, 'Bagerhat Sadar', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(99, 15, 'Alamdanga', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(100, 15, 'Chuadanga Sadar', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(101, 15, 'Damurhuda', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(102, 15, 'Jibannagar', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(103, 16, 'Abhaynagar', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(104, 16, 'Bagherpara', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(105, 16, 'Chougachha', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(106, 16, 'Jhikargachha', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(107, 16, 'Keshabpur', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(108, 16, 'Jessore Sadar', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(109, 16, 'Manirampur', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(110, 16, 'Sharsha', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(111, 17, 'Harinakundu', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(112, 17, 'Jhenaidah Sadar', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(113, 17, 'Kaliganj', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(114, 17, 'Kotchandpur', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(115, 17, 'Moheshpur', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(116, 17, 'Shailkupa', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(117, 18, 'Batiaghata', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(118, 18, 'Dacope', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(119, 18, 'Dumuria', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(120, 18, 'Koyra', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(121, 18, 'Paikgachha', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(122, 18, 'Phultala', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(123, 18, 'Rupsha', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(124, 18, 'Terokhada', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(125, 18, 'Dighalia', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(126, 19, 'Bheramara', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(127, 19, 'Daulatpur', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(128, 19, 'Khoksa', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(129, 19, 'Kumarkhali', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(130, 19, 'Kushtia Sadar', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(131, 19, 'Mirpur', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(132, 20, 'Magura Sadar', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(133, 20, 'Mohammadpur', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(134, 20, 'Shalikha', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(135, 20, 'Sreepur', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(136, 21, 'Gangni', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(137, 21, 'Mujibnagar', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(138, 21, 'Meherpur Sadar', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(139, 22, 'Kalia', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(140, 22, 'Lohagara', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(141, 22, 'Narail Sadar', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(142, 23, 'Assasuni', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(143, 23, 'Debhata', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(144, 23, 'Kalaroa', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(145, 23, 'Kaliganj', '2026-05-06 00:39:36', '2026-05-06 00:39:36'),
(146, 23, 'Satkhira Sadar', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(147, 23, 'Shyamnagar', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(148, 23, 'Tala', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(149, 24, 'Alikadam', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(150, 24, 'Bandarban Sadar', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(151, 24, 'Lama', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(152, 24, 'Naikhongchhari', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(153, 24, 'Rowangchhari', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(154, 24, 'Ruma', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(155, 24, 'Thanchi', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(156, 25, 'Akhaura', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(157, 25, 'Bancharampur', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(158, 25, 'Bijoynagar', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(159, 25, 'Brahmanbaria Sadar', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(160, 25, 'Ashuganj', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(161, 25, 'Kasba', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(162, 25, 'Nabinagar', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(163, 25, 'Nasirnagar', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(164, 25, 'Sarail', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(165, 26, 'Chandpur Sadar', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(166, 26, 'Faridganj', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(167, 26, 'Haimchar', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(168, 26, 'Hajiganj', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(169, 26, 'Kachua', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(170, 26, 'Matlob South', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(171, 26, 'Matlob North', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(172, 26, 'Shahrasti', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(173, 27, 'Anwara', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(174, 27, 'Banshkhali', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(175, 27, 'Boalkhali', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(176, 27, 'Chandanaish', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(177, 27, 'Fatikchhari', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(178, 27, 'Hathazari', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(179, 27, 'Lohagara', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(180, 27, 'Mirsharai', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(181, 27, 'Patiya', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(182, 27, 'Rangunia', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(183, 27, 'Raozan', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(184, 27, 'Sandwip', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(185, 27, 'Satkania', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(186, 27, 'Sitakunda', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(187, 27, 'Karnafuli', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(188, 28, 'Barura', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(189, 28, 'Brahmanpara', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(190, 28, 'Burichang', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(191, 28, 'Chandina', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(192, 28, 'Chauddagram', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(193, 28, 'Sadar South', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(194, 28, 'Adarsha Sadar', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(195, 28, 'Daudkandi', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(196, 28, 'Debidwar', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(197, 28, 'Homna', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(198, 28, 'Laksam', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(199, 28, 'Monohorganj', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(200, 28, 'Meghna', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(201, 28, 'Muradnagar', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(202, 28, 'Nangalkot', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(203, 28, 'Titas', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(204, 28, 'Lalmai', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(205, 29, 'Chakaria', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(206, 29, 'Coxs Bazar Sadar', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(207, 29, 'Kutubdia', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(208, 29, 'Moheshkhali', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(209, 29, 'Pekua', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(210, 29, 'Ramu', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(211, 29, 'Teknaf', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(212, 29, 'Ukhia', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(213, 29, 'Eidgaon', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(214, 30, 'Chhagalnaiya', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(215, 30, 'Daganbhuiyan', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(216, 30, 'Feni Sadar', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(217, 30, 'Fulgazi', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(218, 30, 'Parshuram', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(219, 30, 'Sonagazi', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(220, 31, 'Dighinala', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(221, 31, 'Manikchhari', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(222, 31, 'Khagrachhari Sadar', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(223, 31, 'Lakshmichhari', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(224, 31, 'Mahalchhari', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(225, 31, 'Matiranga', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(226, 31, 'Panchhari', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(227, 31, 'Ramgarh', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(228, 31, 'Guimara', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(229, 32, 'Kamalnagar', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(230, 32, 'Lakshmipur Sadar', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(231, 32, 'Raipur', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(232, 32, 'Ramganj', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(233, 32, 'Ramgoti', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(234, 33, 'Begumganj', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(235, 33, 'Chatkhil', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(236, 33, 'Companiganj', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(237, 33, 'Hatiya', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(238, 33, 'Senbagh', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(239, 33, 'Sonaimuri', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(240, 33, 'Subarnachar', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(241, 33, 'Noakhali Sadar', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(242, 33, 'Kabirhat', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(243, 34, 'Baghaichhari', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(244, 34, 'Barkal', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(245, 34, 'Kawkhali', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(246, 34, 'Kaptai', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(247, 34, 'Juraichhari', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(248, 34, 'Langadu', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(249, 34, 'Naniarchar', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(250, 34, 'Rangamati Sadar', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(251, 34, 'Rajasthali', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(252, 34, 'Belaichhari', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(253, 35, 'Adamdighi', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(254, 35, 'Bogura Sadar', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(255, 35, 'Dhunat', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(256, 35, 'Dupchanchia', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(257, 35, 'Gabtali', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(258, 35, 'Kahaloo', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(259, 35, 'Nandigram', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(260, 35, 'Sariakandi', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(261, 35, 'Shajahanpur', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(262, 35, 'Sherpur', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(263, 35, 'Shibganj', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(264, 35, 'Sonatala', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(265, 36, 'Akkelpur', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(266, 36, 'Joypurhat Sadar', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(267, 36, 'Kalai', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(268, 36, 'Panchbibi', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(269, 36, 'Khetlal', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(270, 37, 'Atrai', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(271, 37, 'Dhamoirhat', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(272, 37, 'Manda', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(273, 37, 'Mohadevpur', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(274, 37, 'Naogaon Sadar', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(275, 37, 'Niamatpur', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(276, 37, 'Patnitala', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(277, 37, 'Raninagar', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(278, 37, 'Sapahar', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(279, 37, 'Badalgachhi', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(280, 37, 'Porsha', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(281, 38, 'Bagatipara', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(282, 38, 'Baraigram', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(283, 38, 'Gurudaspur', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(284, 38, 'Lalpur', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(285, 38, 'Natore Sadar', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(286, 38, 'Singra', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(287, 38, 'Naldanga', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(288, 39, 'Shibganj', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(289, 39, 'Bholahat', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(290, 39, 'Gomastapur', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(291, 39, 'Nachole', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(292, 39, 'Chapainawabganj Sadar', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(293, 40, 'Atgharia', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(294, 40, 'Bera', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(295, 40, 'Bhangura', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(296, 40, 'Chatmohar', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(297, 40, 'Faridpur', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(298, 40, 'Ishwardi', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(299, 40, 'Pabna Sadar', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(300, 40, 'Santhia', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(301, 40, 'Sujanagar', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(302, 41, 'Bagha', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(303, 41, 'Bagmara', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(304, 41, 'Charghat', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(305, 41, 'Durgapur', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(306, 41, 'Godagari', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(307, 41, 'Mohanpur', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(308, 41, 'Paba', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(309, 41, 'Puthia', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(310, 41, 'Tanore', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(311, 42, 'Belkuchi', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(312, 42, 'Chauhali', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(313, 42, 'Kamarkhanda', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(314, 42, 'Kazipur', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(315, 42, 'Raiganj', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(316, 42, 'Shahjadpur', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(317, 42, 'Sirajganj Sadar', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(318, 42, 'Tarash', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(319, 42, 'Ullahpara', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(320, 43, 'Ajmeriganj', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(321, 43, 'Bahubal', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(322, 43, 'Baniyachong', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(323, 43, 'Chunarughat', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(324, 43, 'Habiganj Sadar', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(325, 43, 'Lakhai', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(326, 43, 'Madhabpur', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(327, 43, 'Nabiganj', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(328, 43, 'Shaistaganj', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(329, 44, 'Barlekha', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(330, 44, 'Juri', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(331, 44, 'Kamalganj', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(332, 44, 'Kulaura', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(333, 44, 'Moulvibazar Sadar', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(334, 44, 'Rajnagar', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(335, 44, 'Sreemangal', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(336, 45, 'Bishwamandarpur', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(337, 45, 'Chhatak', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(338, 45, 'Derai', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(339, 45, 'Dharampasha', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(340, 45, 'Dowarabazar', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(341, 45, 'Jagannathpur', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(342, 45, 'Jamalganj', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(343, 45, 'Shalla', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(344, 45, 'Sunamganj Sadar', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(345, 45, 'Tahirpur', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(346, 45, 'Shantiganj', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(347, 45, 'Madhyanagar', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(348, 46, 'Balaganj', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(349, 46, 'Beanibazar', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(350, 46, 'Bishwanath', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(351, 46, 'Companiganj', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(352, 46, 'South Surma', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(353, 46, 'Fenchuganj', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(354, 46, 'Golapganj', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(355, 46, 'Gowainghat', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(356, 46, 'Jaintiapur', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(357, 46, 'Kanaighat', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(358, 46, 'Sylhet Sadar', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(359, 46, 'Jakiganj', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(360, 46, 'Osmaninagar', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(361, 47, 'Birampur', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(362, 47, 'Birganj', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(363, 47, 'Birol', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(364, 47, 'Bochaganj', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(365, 47, 'Chirirbandar', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(366, 47, 'Phulbari', '2026-05-06 00:39:37', '2026-05-06 00:39:37'),
(367, 47, 'Ghoraghat', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(368, 47, 'Hakimpur', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(369, 47, 'Kaharole', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(370, 47, 'Khansama', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(371, 47, 'Nawabganj', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(372, 47, 'Parbatipur', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(373, 47, 'Dinajpur Sadar', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(374, 48, 'Fulchhari', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(375, 48, 'Gaibandha Sadar', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(376, 48, 'Gobindaganj', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(377, 48, 'Palashbari', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(378, 48, 'Sadullapur', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(379, 48, 'Saghata', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(380, 48, 'Sundarganj', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(381, 49, 'Phulbari', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(382, 49, 'Bhurungamari', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(383, 49, 'Char Rajibpur', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(384, 49, 'Chilmari', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(385, 49, 'Kurigram Sadar', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(386, 49, 'Nageshwari', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(387, 49, 'Rajarhat', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(388, 49, 'Roumari', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(389, 49, 'Ulipur', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(390, 50, 'Aditmari', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(391, 50, 'Hatibandha', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(392, 50, 'Kaliganj', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(393, 50, 'Lalmonirhat Sadar', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(394, 50, 'Patgram', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(395, 51, 'Domar', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(396, 51, 'Jaldhaka', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(397, 51, 'Kishoreganj', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(398, 51, 'Nilphamari Sadar', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(399, 51, 'Saidpur', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(400, 51, 'Dimla', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(401, 52, 'Atwari', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(402, 52, 'Boda', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(403, 52, 'Debiganj', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(404, 52, 'Panchagarh Sadar', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(405, 52, 'Tetulia', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(406, 53, 'Badarganj', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(407, 53, 'Kaunia', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(408, 53, 'Rangpur Sadar', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(409, 53, 'Mithapukur', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(410, 53, 'Pirgachha', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(411, 53, 'Pirganj', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(412, 53, 'Taraganj', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(413, 53, 'Gangachara', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(414, 54, 'Pirganj', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(415, 54, 'Baliadangi', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(416, 54, 'Haripur', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(417, 54, 'Ranisankail', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(418, 54, 'Thakurgaon Sadar', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(419, 55, 'Bakshiganj', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(420, 55, 'Dewanganj', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(421, 55, 'Isampur', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(422, 55, 'Jamalpur Sadar', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(423, 55, 'Madarganj', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(424, 55, 'Melandaha', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(425, 55, 'Sarishabari', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(426, 56, 'Valuka', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(427, 56, 'Dhobaura', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(428, 56, 'Fulbaria', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(429, 56, 'Gaffargaon', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(430, 56, 'Gouripur', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(431, 56, 'Haluaghat', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(432, 56, 'Ishwarganj', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(433, 56, 'Mymensingh Sadar', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(434, 56, 'Muktagachha', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(435, 56, 'Nandail', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(436, 56, 'Phulpur', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(437, 56, 'Tarakanda', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(438, 56, 'Trishal', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(439, 57, 'Atpara', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(440, 57, 'Barhatta', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(441, 57, 'Durgapur', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(442, 57, 'Khaliajuri', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(443, 57, 'Kalmakanda', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(444, 57, 'Kendua', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(445, 57, 'Madan', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(446, 57, 'Mohanganj', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(447, 57, 'Netrokona Sadar', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(448, 57, 'Purbadhala', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(449, 58, 'Jhenaigati', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(450, 58, 'Nakla', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(451, 58, 'Nalitabari', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(452, 58, 'Sherpur Sadar', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(453, 58, 'Sreebardi', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(454, 59, 'Jhalokati Sadar', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(455, 59, 'Nalchity', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(456, 59, 'Kathalia', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(457, 59, 'Rajapur', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(458, 60, 'Amtali', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(459, 60, 'Bamna', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(460, 60, 'Barguna Sadar', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(461, 60, 'Betagi', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(462, 60, 'Patharghata', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(463, 60, 'Taltali', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(464, 61, 'Agailjhara', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(465, 61, 'Babuganj', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(466, 61, 'Bakerganj', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(467, 61, 'Banaripara', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(468, 61, 'Gournadi', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(469, 61, 'Hijla', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(470, 61, 'Barisal Sadar', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(471, 61, 'Mehendiganj', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(472, 61, 'Muladi', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(473, 61, 'Wazirpur', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(474, 62, 'Bhola Sadar', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(475, 62, 'Burhanuddin', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(476, 62, 'Daulatkhan', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(477, 62, 'Lalmohan', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(478, 62, 'Monpura', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(479, 62, 'Tazumuddin', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(480, 62, 'Char Fasson', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(481, 63, 'Bauphal', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(482, 63, 'Dashmina', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(483, 63, 'Dumki', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(484, 63, 'Kalapara', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(485, 63, 'Mirzaganj', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(486, 63, 'Patuakhali Sadar', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(487, 63, 'Rangabali', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(488, 63, 'Galachipa', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(489, 64, 'Bhandaria', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(490, 64, 'Kawkhali', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(491, 64, 'Mathbaria', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(492, 64, 'Nazirpur', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(493, 64, 'Pirojpur Sadar', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(494, 64, 'Nesarabad', '2026-05-06 00:39:38', '2026-05-06 00:39:38'),
(495, 64, 'Zianagar', '2026-05-06 00:39:38', '2026-05-06 00:39:38');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'candidate',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `image`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'Manirul Islam', 'wdpfmanirul@gmail.com', NULL, NULL, '$2y$12$huKUoX60dKYykuZfYV73oOinK35LricfbOmpuayeOWdI.8TbRfH2e', 'employer', NULL, '2026-05-06 21:40:19', '2026-05-06 21:40:19'),
(4, 'Naim Uddin', 'naimuddin@gmail.com', NULL, NULL, '$2y$12$pVAZIr1j3zz8KK1b3IgXhurSmHtcr7rIY7sJxM56vuiTLP7qck712', 'candidate', NULL, '2026-05-22 22:41:48', '2026-05-22 22:41:48'),
(6, 'MANIRUL ISLAM', 'admin@gmail.com', 'profile_images/mUqIFejViraT56iK3Pxggx4Aza43RGEmKdZJakvu.png', NULL, '$2y$12$kcaeOxwh3K2TCRvoTs8Xwew0Am0Lg0EKz6Ox32Z1OwXCdviAmSoay', 'admin', 'NPy9E0AfBtB5VTvo8S57YQ6hm4QT1OQRpQaru2tMFajQEVhHuAg7svAudLcp', '2026-06-02 05:33:30', '2026-06-05 22:50:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `applications_job_id_foreign` (`job_id`),
  ADD KEY `applications_user_id_foreign` (`user_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indexes for table `candidate_documents`
--
ALTER TABLE `candidate_documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `candidate_documents_candidate_profile_id_foreign` (`candidate_profile_id`);

--
-- Indexes for table `candidate_educations`
--
ALTER TABLE `candidate_educations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `candidate_educations_candidate_profile_id_foreign` (`candidate_profile_id`);

--
-- Indexes for table `candidate_experiences`
--
ALTER TABLE `candidate_experiences`
  ADD PRIMARY KEY (`id`),
  ADD KEY `candidate_experiences_candidate_profile_id_foreign` (`candidate_profile_id`);

--
-- Indexes for table `candidate_profiles`
--
ALTER TABLE `candidate_profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `candidate_profiles_user_id_foreign` (`user_id`);

--
-- Indexes for table `candidate_trainings`
--
ALTER TABLE `candidate_trainings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `candidate_trainings_candidate_profile_id_foreign` (`candidate_profile_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `company_profiles`
--
ALTER TABLE `company_profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `company_profiles_user_id_foreign` (`user_id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `districts_division_id_foreign` (`division_id`);

--
-- Indexes for table `divisions`
--
ALTER TABLE `divisions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `divisions_name_unique` (`name`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_listings`
--
ALTER TABLE `job_listings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `job_listings_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `saved_jobs`
--
ALTER TABLE `saved_jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `saved_jobs_user_id_foreign` (`user_id`),
  ADD KEY `saved_jobs_job_id_foreign` (`job_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `upazilas`
--
ALTER TABLE `upazilas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `upazilas_district_id_foreign` (`district_id`);

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
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `candidate_documents`
--
ALTER TABLE `candidate_documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `candidate_educations`
--
ALTER TABLE `candidate_educations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `candidate_experiences`
--
ALTER TABLE `candidate_experiences`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `candidate_profiles`
--
ALTER TABLE `candidate_profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `candidate_trainings`
--
ALTER TABLE `candidate_trainings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `company_profiles`
--
ALTER TABLE `company_profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `divisions`
--
ALTER TABLE `divisions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job_listings`
--
ALTER TABLE `job_listings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `saved_jobs`
--
ALTER TABLE `saved_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `upazilas`
--
ALTER TABLE `upazilas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=496;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `applications`
--
ALTER TABLE `applications`
  ADD CONSTRAINT `applications_job_id_foreign` FOREIGN KEY (`job_id`) REFERENCES `job_listings` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `applications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `candidate_documents`
--
ALTER TABLE `candidate_documents`
  ADD CONSTRAINT `candidate_documents_candidate_profile_id_foreign` FOREIGN KEY (`candidate_profile_id`) REFERENCES `candidate_profiles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `candidate_educations`
--
ALTER TABLE `candidate_educations`
  ADD CONSTRAINT `candidate_educations_candidate_profile_id_foreign` FOREIGN KEY (`candidate_profile_id`) REFERENCES `candidate_profiles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `candidate_experiences`
--
ALTER TABLE `candidate_experiences`
  ADD CONSTRAINT `candidate_experiences_candidate_profile_id_foreign` FOREIGN KEY (`candidate_profile_id`) REFERENCES `candidate_profiles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `candidate_profiles`
--
ALTER TABLE `candidate_profiles`
  ADD CONSTRAINT `candidate_profiles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `candidate_trainings`
--
ALTER TABLE `candidate_trainings`
  ADD CONSTRAINT `candidate_trainings_candidate_profile_id_foreign` FOREIGN KEY (`candidate_profile_id`) REFERENCES `candidate_profiles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `company_profiles`
--
ALTER TABLE `company_profiles`
  ADD CONSTRAINT `company_profiles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `districts`
--
ALTER TABLE `districts`
  ADD CONSTRAINT `districts_division_id_foreign` FOREIGN KEY (`division_id`) REFERENCES `divisions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `job_listings`
--
ALTER TABLE `job_listings`
  ADD CONSTRAINT `job_listings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `saved_jobs`
--
ALTER TABLE `saved_jobs`
  ADD CONSTRAINT `saved_jobs_job_id_foreign` FOREIGN KEY (`job_id`) REFERENCES `job_listings` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `saved_jobs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `upazilas`
--
ALTER TABLE `upazilas`
  ADD CONSTRAINT `upazilas_district_id_foreign` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
