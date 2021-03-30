-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2021 at 04:39 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_hrms`
--

-- --------------------------------------------------------

--
-- Table structure for table `accesses`
--

CREATE TABLE `accesses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `menu_id` bigint(20) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accesses`
--

INSERT INTO `accesses` (`id`, `role_id`, `menu_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 2, '2021-03-09 03:55:25', '2021-03-09 03:55:25'),
(2, 1, 2, 2, '2021-03-09 03:55:25', '2021-03-09 03:55:25'),
(3, 1, 3, 2, '2021-03-09 03:55:25', '2021-03-09 03:55:25'),
(4, 1, 4, 2, '2021-03-09 03:55:25', '2021-03-09 03:55:25'),
(5, 1, 5, 2, '2021-03-09 03:55:25', '2021-03-09 03:55:25'),
(6, 1, 6, 2, '2021-03-09 03:55:25', '2021-03-09 03:55:25'),
(7, 1, 7, 2, '2021-03-09 03:55:25', '2021-03-09 03:55:25'),
(8, 1, 8, 2, '2021-03-09 03:55:25', '2021-03-09 03:55:25'),
(9, 1, 9, 2, '2021-03-09 03:55:25', '2021-03-09 03:55:25'),
(10, 1, 10, 2, '2021-03-09 03:55:25', '2021-03-09 03:55:25'),
(11, 1, 11, 2, '2021-03-09 03:55:25', '2021-03-09 03:55:25');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2021-03-09 03:55:25', '2021-03-09 03:55:25');

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `department_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `attachment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id`, `department_id`, `title`, `description`, `attachment`, `created_by`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Sapiente excepturi suscipit sequi sequi numquam rerum.', 'Hic aliquid qui consectetur placeat rerum quasi eius. Quia aliquid culpa consequatur eos velit repudiandae et. Dolorum dolor deleniti architecto doloremque blanditiis nihil totam.', NULL, 1, '2021-03-09 03:55:21', '2021-03-09 03:55:21'),
(2, NULL, 'Et quam quas facilis veniam repudiandae ratione.', 'Animi voluptas assumenda cupiditate commodi corrupti et eum. Alias quia minus in aut similique quis quis perspiciatis. Voluptatibus tempore dolores quia in temporibus nemo.', NULL, 1, '2021-03-09 03:55:21', '2021-03-09 03:55:21'),
(3, NULL, 'Ex quia ut mollitia suscipit doloribus quae.', 'Deserunt possimus sequi temporibus beatae. Dignissimos eos magni magnam cupiditate dicta et sunt. Consequatur voluptatem et facere harum adipisci ad officiis officia. Necessitatibus veritatis et repellat quo maiores fugiat qui.', NULL, 1, '2021-03-09 03:55:21', '2021-03-09 03:55:21'),
(4, NULL, 'Mollitia ad nam voluptatem nobis debitis dolore dolorum.', 'Dolorum quaerat delectus velit dolorum. Molestiae deleniti est perspiciatis. Sed error ut modi incidunt et voluptatem commodi.', NULL, 1, '2021-03-09 03:55:21', '2021-03-09 03:55:21'),
(5, NULL, 'Labore dolores minus autem molestiae qui tempora quam.', 'Officia magni et quia. Doloribus et nisi fuga suscipit deleniti. Sunt quos quo sed necessitatibus. In dolores aut ab enim perferendis.', NULL, 1, '2021-03-09 03:55:21', '2021-03-09 03:55:21'),
(6, NULL, 'Reiciendis distinctio ratione qui sit officia tenetur aut possimus.', 'Animi et excepturi id illum. Odio eveniet eum minima sit a.', NULL, 1, '2021-03-09 03:55:21', '2021-03-09 03:55:21'),
(7, NULL, 'Qui illum quis aut sit.', 'Doloremque quo rerum et vitae dicta. Laboriosam error aperiam tempore nostrum unde. Eius quo hic qui repellat. Et nisi quos aliquid quia.', NULL, 1, '2021-03-09 03:55:21', '2021-03-09 03:55:21'),
(8, NULL, 'Ipsum id officia voluptas necessitatibus ut sit.', 'Officia pariatur fuga libero dolor. Consequuntur inventore molestiae harum minima dicta. Eum sit facere voluptatibus autem aliquam velit praesentium. Enim ut et nihil magni rerum adipisci id.', NULL, 1, '2021-03-09 03:55:21', '2021-03-09 03:55:21'),
(9, NULL, 'Libero ut nostrum perspiciatis vel.', 'Illo eveniet alias ullam dolorem perferendis. Tempore et natus tempora veniam. Saepe suscipit odio quaerat molestias. Esse et illo ducimus velit temporibus quas saepe dolores.', NULL, 1, '2021-03-09 03:55:22', '2021-03-09 03:55:22'),
(10, NULL, 'Quis dolores est dolorem sit illo.', 'Aspernatur commodi id et at officia. Enim quo nesciunt in molestiae rem voluptas maxime. Aut voluptatibus amet officiis qui sapiente est voluptate. Incidunt est voluptas autem aut.', NULL, 1, '2021-03-09 03:55:22', '2021-03-09 03:55:22');

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `attendance_time_id` bigint(20) UNSIGNED DEFAULT NULL,
  `attendance_type_id` bigint(20) UNSIGNED DEFAULT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `attendance_times`
--

CREATE TABLE `attendance_times` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendance_times`
--

INSERT INTO `attendance_times` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'IN', '2021-03-09 03:55:23', '2021-03-09 03:55:23'),
(2, 'OUT', '2021-03-09 03:55:23', '2021-03-09 03:55:23'),
(3, 'OTHER', '2021-03-09 03:55:23', '2021-03-09 03:55:23');

-- --------------------------------------------------------

--
-- Table structure for table `attendance_types`
--

CREATE TABLE `attendance_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendance_types`
--

INSERT INTO `attendance_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'ONTIME', '2021-03-09 03:55:23', '2021-03-09 03:55:23'),
(2, 'LATE', '2021-03-09 03:55:23', '2021-03-09 03:55:23'),
(3, 'OVERTIME', '2021-03-09 03:55:23', '2021-03-09 03:55:23'),
(4, 'SICK', '2021-03-09 03:55:23', '2021-03-09 03:55:23'),
(5, 'ABSENT', '2021-03-09 03:55:23', '2021-03-09 03:55:23'),
(6, 'ON_LEAVE_DAYS', '2021-03-09 03:55:24', '2021-03-09 03:55:24');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` char(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `code`, `address`, `created_at`, `updated_at`) VALUES
(1, 'sit', 'sit', 'Shanny Plains', '2021-03-09 03:55:20', '2021-03-09 03:55:20');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_of_contract` date NOT NULL,
  `end_of_contract` date NOT NULL,
  `department_id` bigint(20) UNSIGNED DEFAULT NULL,
  `position_id` bigint(20) UNSIGNED DEFAULT NULL,
  `head_of` bigint(20) UNSIGNED DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `user_id`, `name`, `start_of_contract`, `end_of_contract`, `department_id`, `position_id`, `head_of`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 1, 'Administrator', '2009-05-12', '2018-01-23', 1, 1, NULL, 1, '2021-03-09 03:55:20', '2021-03-09 03:55:20');

-- --------------------------------------------------------

--
-- Table structure for table `employee_details`
--

CREATE TABLE `employee_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `identity_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` date NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cv` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_education` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gpa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `work_experience_in_years` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_details`
--

INSERT INTO `employee_details` (`id`, `employee_id`, `identity_number`, `name`, `gender`, `date_of_birth`, `email`, `phone`, `address`, `photo`, `cv`, `last_education`, `gpa`, `work_experience_in_years`, `created_at`, `updated_at`) VALUES
(1, 1, '7', 'Administrator', 'L', '2003-07-02', 'admin@gmail.com', '660-908-0041', 'Daugherty Roads', 'profile-picture.jpg', 'cv.jpg', 'SMA', '4', 0, '2021-03-09 03:55:20', '2021-03-09 03:55:20');

-- --------------------------------------------------------

--
-- Table structure for table `employee_leaves`
--

CREATE TABLE `employee_leaves` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `leaves_quota` int(11) NOT NULL,
  `used_leaves` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_leaves`
--

INSERT INTO `employee_leaves` (`id`, `employee_id`, `leaves_quota`, `used_leaves`, `created_at`, `updated_at`) VALUES
(1, 1, 12, 0, '2021-03-09 03:55:21', '2021-03-09 03:55:21');

-- --------------------------------------------------------

--
-- Table structure for table `employee_leave_requests`
--

CREATE TABLE `employee_leave_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from` date NOT NULL,
  `to` date NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'WAITING_FOR_APPROVAL',
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `checked_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee_scores`
--

CREATE TABLE `employee_scores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `group_id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `score_category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `score` int(11) NOT NULL,
  `scored_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'dashboard', 1, '2021-03-09 03:55:24', '2021-03-09 03:55:24'),
(2, 'data', 1, '2021-03-09 03:55:24', '2021-03-09 03:55:24'),
(3, 'performance', 1, '2021-03-09 03:55:24', '2021-03-09 03:55:24'),
(4, 'leave-request', 1, '2021-03-09 03:55:24', '2021-03-09 03:55:24'),
(5, 'attendances', 1, '2021-03-09 03:55:24', '2021-03-09 03:55:24'),
(6, 'announcements', 1, '2021-03-09 03:55:24', '2021-03-09 03:55:24'),
(7, 'recruitments', 1, '2021-03-09 03:55:24', '2021-03-09 03:55:24'),
(8, 'score-category', 1, '2021-03-09 03:55:24', '2021-03-09 03:55:24'),
(9, 'logs', 1, '2021-03-09 03:55:24', '2021-03-09 03:55:24'),
(10, 'accounts', 1, '2021-03-09 03:55:25', '2021-03-09 03:55:25'),
(11, 'user', 1, '2021-03-09 03:55:25', '2021-03-09 03:55:25');

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
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2021_01_22_014110_create_roles_table', 1),
(4, '2021_01_22_015000_create_users_table', 1),
(5, '2021_01_22_020025_create_departments_table', 1),
(6, '2021_01_22_020227_create_positions_table', 1),
(7, '2021_01_22_020333_create_employees_table', 1),
(8, '2021_01_22_020849_create_employee_details_table', 1),
(9, '2021_01_22_021315_create_recruitments_table', 1),
(10, '2021_01_22_021525_create_recruitment_candidates_table', 1),
(11, '2021_01_22_021903_create_employee_leaves_table', 1),
(12, '2021_01_22_021938_create_employee_leave_requests_table', 1),
(13, '2021_01_22_022307_create_attendance_types_table', 1),
(14, '2021_01_22_022331_create_attendance_times_table', 1),
(15, '2021_01_22_022350_create_attendances_table', 1),
(16, '2021_01_22_022708_create_score_categories_table', 1),
(17, '2021_01_22_022742_create_employee_scores_table', 1),
(18, '2021_01_22_023023_create_menus_table', 1),
(19, '2021_01_22_023200_create_accesses_table', 1),
(20, '2021_01_22_023415_create_announcements_table', 1),
(21, '2021_02_18_135127_create_admins_table', 1),
(22, '2021_02_22_090601_create_logs_table', 1);

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
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `min_year_exp_required` int(11) NOT NULL,
  `salary` int(11) NOT NULL,
  `open_for_recruitment` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`id`, `name`, `description`, `min_year_exp_required`, `salary`, `open_for_recruitment`, `created_at`, `updated_at`) VALUES
(1, 'laborum', 'Animi iste enim facere accusantium. Doloremque aperiam cumque enim eos.', 4, 6113, 0, '2021-03-09 03:55:20', '2021-03-09 03:55:20'),
(2, 'ut', 'Eaque architecto et tempore perferendis. Laborum et assumenda ut hic vel ut omnis. Aut natus est laborum repellendus nostrum voluptas sunt. Sapiente fugiat assumenda rerum in pariatur optio est.', 3, 8144, 1, '2021-03-09 03:55:22', '2021-03-09 03:55:22'),
(3, 'culpa', 'Modi quaerat eum accusantium. Explicabo dolores aspernatur sunt et rerum nobis aut. Dicta quia accusantium nihil ut. Dolores doloribus dolores possimus magni.', 5, 4637, 0, '2021-03-09 03:55:22', '2021-03-09 03:55:22'),
(4, 'dolor', 'Praesentium consequuntur voluptatem optio ex alias. Quo ut praesentium sequi molestiae. Doloribus harum repellat quis molestiae.', 1, 6519, 0, '2021-03-09 03:55:22', '2021-03-09 03:55:22'),
(5, 'praesentium', 'Est quam et et dolorem ut qui et. Et sapiente amet consequatur a animi. Vero amet voluptatem nisi ad officia aut. Voluptas consectetur aperiam ut et.', 5, 8307, 0, '2021-03-09 03:55:22', '2021-03-09 03:55:22'),
(6, 'sit', 'Non et sed quia ullam maiores mollitia sit. Exercitationem ad voluptatem tempora vel ut. Vitae non in possimus voluptatem. Harum aut quas placeat.', 3, 3986, 0, '2021-03-09 03:55:22', '2021-03-09 03:55:22'),
(7, 'inventore', 'Ut rerum est repellendus quisquam rerum. Corporis incidunt quo quasi enim odio et.', 0, 3858, 1, '2021-03-09 03:55:22', '2021-03-09 03:55:22'),
(8, 'rerum', 'Voluptatem sed iste odio delectus rerum iure. Nobis a delectus accusamus ea ad. Tempore dolorem ullam id rerum repellat deserunt.', 3, 6152, 0, '2021-03-09 03:55:22', '2021-03-09 03:55:22'),
(9, 'harum', 'Ut cumque sit quod. Quod minus tempora sit repellendus. Sit laudantium nihil soluta.', 9, 3034, 1, '2021-03-09 03:55:22', '2021-03-09 03:55:22'),
(10, 'fuga', 'Commodi et esse officiis consequatur rerum quidem ipsum. Et tempore dolor earum. Nobis consequuntur error illo. Accusantium quis qui quis laudantium.', 1, 7981, 0, '2021-03-09 03:55:22', '2021-03-09 03:55:22'),
(11, 'non', 'Exercitationem ratione itaque ut nobis. Doloremque aut ut itaque perspiciatis et. Necessitatibus sunt labore omnis aut. Voluptas recusandae voluptatibus ut unde.', 2, 8011, 0, '2021-03-09 03:55:22', '2021-03-09 03:55:22');

-- --------------------------------------------------------

--
-- Table structure for table `recruitments`
--

CREATE TABLE `recruitments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `position_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attachment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `recruitments`
--

INSERT INTO `recruitments` (`id`, `position_id`, `title`, `description`, `attachment`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 1, 'ut', 'Ipsum facilis architecto rerum non. Fugiat perferendis deleniti quasi corporis.', NULL, 0, '2021-03-09 03:55:22', '2021-03-09 03:55:22'),
(2, 1, 'culpa', 'Et quos exercitationem ipsum iure quod deleniti. Iusto necessitatibus libero commodi nihil necessitatibus voluptatem ut. Impedit in deserunt qui laboriosam. Sit vitae eum omnis voluptas qui. Fugiat quis voluptas eligendi sint tempora.', NULL, 0, '2021-03-09 03:55:22', '2021-03-09 03:55:22'),
(3, 1, 'dolor', 'Ducimus laborum placeat laboriosam laborum eligendi. Non fugiat ut sit qui. Soluta maxime possimus fugiat sunt. Qui dolorem commodi aliquid temporibus est.', NULL, 0, '2021-03-09 03:55:22', '2021-03-09 03:55:22'),
(4, 1, 'praesentium', 'Voluptatem rem quaerat consequatur nobis sunt molestias cupiditate. In non quos quasi nemo nostrum aut inventore. Voluptas aut non libero vel repellendus accusamus. Est quis id mollitia inventore accusamus numquam.', NULL, 0, '2021-03-09 03:55:22', '2021-03-09 03:55:22'),
(5, 1, 'sit', 'Rerum dolorem ex autem. Ducimus ut voluptatem inventore quae quasi. Ut pariatur perferendis quibusdam vel vel et.', NULL, 0, '2021-03-09 03:55:22', '2021-03-09 03:55:22'),
(6, 1, 'inventore', 'Quia magnam dignissimos qui ipsum hic et quod. Earum molestiae nostrum minima aperiam veniam. Et amet sunt suscipit qui iusto.', NULL, 0, '2021-03-09 03:55:22', '2021-03-09 03:55:22'),
(7, 1, 'rerum', 'Voluptas vero sunt numquam facilis asperiores. Quas et facere odit amet aut deserunt impedit. Inventore laudantium nostrum perspiciatis cupiditate suscipit et iusto.', NULL, 0, '2021-03-09 03:55:23', '2021-03-09 03:55:23'),
(8, 1, 'harum', 'Eos earum dolores non vero dolores aut dolor. Sed cum sed sed sequi accusamus. Et culpa iusto est ab saepe.', NULL, 0, '2021-03-09 03:55:23', '2021-03-09 03:55:23'),
(9, 1, 'fuga', 'Distinctio unde excepturi animi sed accusamus. Accusamus et sed velit doloribus qui eveniet nemo. Nobis suscipit ex amet expedita sapiente aliquam vero. Delectus consequatur rerum rerum corporis id voluptatem praesentium.', NULL, 0, '2021-03-09 03:55:23', '2021-03-09 03:55:23'),
(10, 1, 'non', 'Dolores nihil aliquam ut cum cupiditate quidem atque. Voluptatem reiciendis et aut a quod ad iusto. Quos omnis velit amet in mollitia. Maiores omnis et est.', NULL, 0, '2021-03-09 03:55:23', '2021-03-09 03:55:23');

-- --------------------------------------------------------

--
-- Table structure for table `recruitment_candidates`
--

CREATE TABLE `recruitment_candidates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `recruitment_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cv` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_super_user` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `is_super_user`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 1, '2021-03-09 03:55:20', '2021-03-09 03:55:20');

-- --------------------------------------------------------

--
-- Table structure for table `score_categories`
--

CREATE TABLE `score_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `score_categories`
--

INSERT INTO `score_categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Discipline', '2021-03-09 03:55:25', '2021-03-09 03:55:25'),
(2, 'Hardworking', '2021-03-09 03:55:26', '2021-03-09 03:55:26');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `is_active`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin@gmail.com', '2021-03-09 03:55:20', '$2y$10$.l6nAxxUdU2gayAYkQW9T.6d/35KCHr.eX3qdN9OrVt5xjX/Skwwu', 1, 1, 'gcNbZ8Bzod', '2021-03-09 03:55:20', '2021-03-09 03:55:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accesses`
--
ALTER TABLE `accesses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `accesses_role_id_foreign` (`role_id`),
  ADD KEY `accesses_menu_id_foreign` (`menu_id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admins_role_id_foreign` (`role_id`);

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `announcements_department_id_foreign` (`department_id`),
  ADD KEY `announcements_created_by_foreign` (`created_by`);

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attendances_employee_id_foreign` (`employee_id`),
  ADD KEY `attendances_attendance_time_id_foreign` (`attendance_time_id`),
  ADD KEY `attendances_attendance_type_id_foreign` (`attendance_type_id`);

--
-- Indexes for table `attendance_times`
--
ALTER TABLE `attendance_times`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance_types`
--
ALTER TABLE `attendance_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employees_user_id_foreign` (`user_id`),
  ADD KEY `employees_department_id_foreign` (`department_id`),
  ADD KEY `employees_position_id_foreign` (`position_id`),
  ADD KEY `employees_head_of_foreign` (`head_of`);

--
-- Indexes for table `employee_details`
--
ALTER TABLE `employee_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_details_employee_id_foreign` (`employee_id`);

--
-- Indexes for table `employee_leaves`
--
ALTER TABLE `employee_leaves`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_leaves_employee_id_foreign` (`employee_id`);

--
-- Indexes for table `employee_leave_requests`
--
ALTER TABLE `employee_leave_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_leave_requests_employee_id_foreign` (`employee_id`),
  ADD KEY `employee_leave_requests_checked_by_foreign` (`checked_by`);

--
-- Indexes for table `employee_scores`
--
ALTER TABLE `employee_scores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_scores_employee_id_foreign` (`employee_id`),
  ADD KEY `employee_scores_score_category_id_foreign` (`score_category_id`),
  ADD KEY `employee_scores_scored_by_foreign` (`scored_by`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
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
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recruitments`
--
ALTER TABLE `recruitments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `recruitments_position_id_foreign` (`position_id`);

--
-- Indexes for table `recruitment_candidates`
--
ALTER TABLE `recruitment_candidates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `recruitment_candidates_recruitment_id_foreign` (`recruitment_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `score_categories`
--
ALTER TABLE `score_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accesses`
--
ALTER TABLE `accesses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attendance_times`
--
ALTER TABLE `attendance_times`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `attendance_types`
--
ALTER TABLE `attendance_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employee_details`
--
ALTER TABLE `employee_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employee_leaves`
--
ALTER TABLE `employee_leaves`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employee_leave_requests`
--
ALTER TABLE `employee_leave_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee_scores`
--
ALTER TABLE `employee_scores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `recruitments`
--
ALTER TABLE `recruitments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `recruitment_candidates`
--
ALTER TABLE `recruitment_candidates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `score_categories`
--
ALTER TABLE `score_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accesses`
--
ALTER TABLE `accesses`
  ADD CONSTRAINT `accesses_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `accesses_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `admins`
--
ALTER TABLE `admins`
  ADD CONSTRAINT `admins_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `announcements`
--
ALTER TABLE `announcements`
  ADD CONSTRAINT `announcements_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `employees` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `announcements_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `attendances`
--
ALTER TABLE `attendances`
  ADD CONSTRAINT `attendances_attendance_time_id_foreign` FOREIGN KEY (`attendance_time_id`) REFERENCES `attendance_times` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `attendances_attendance_type_id_foreign` FOREIGN KEY (`attendance_type_id`) REFERENCES `attendance_types` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `attendances_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `employees_head_of_foreign` FOREIGN KEY (`head_of`) REFERENCES `departments` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `employees_position_id_foreign` FOREIGN KEY (`position_id`) REFERENCES `positions` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `employees_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `employee_details`
--
ALTER TABLE `employee_details`
  ADD CONSTRAINT `employee_details_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `employee_leaves`
--
ALTER TABLE `employee_leaves`
  ADD CONSTRAINT `employee_leaves_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `employee_leave_requests`
--
ALTER TABLE `employee_leave_requests`
  ADD CONSTRAINT `employee_leave_requests_checked_by_foreign` FOREIGN KEY (`checked_by`) REFERENCES `employees` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `employee_leave_requests_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `employee_scores`
--
ALTER TABLE `employee_scores`
  ADD CONSTRAINT `employee_scores_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `employee_scores_score_category_id_foreign` FOREIGN KEY (`score_category_id`) REFERENCES `score_categories` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `employee_scores_scored_by_foreign` FOREIGN KEY (`scored_by`) REFERENCES `employees` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `recruitments`
--
ALTER TABLE `recruitments`
  ADD CONSTRAINT `recruitments_position_id_foreign` FOREIGN KEY (`position_id`) REFERENCES `positions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `recruitment_candidates`
--
ALTER TABLE `recruitment_candidates`
  ADD CONSTRAINT `recruitment_candidates_recruitment_id_foreign` FOREIGN KEY (`recruitment_id`) REFERENCES `recruitments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
