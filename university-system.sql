-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 08, 2020 at 01:35 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `university-system`
--
CREATE DATABASE IF NOT EXISTS `university-system` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `university-system`;

-- --------------------------------------------------------

--
-- Table structure for table `academic_advisors`
--

CREATE TABLE `academic_advisors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `academic_advisors`
--

INSERT INTO `academic_advisors` (`id`, `user_id`, `department_id`, `created_at`, `updated_at`) VALUES
(2, 10, 1, '2020-06-07 22:50:29', '2020-06-07 22:50:29');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `alerts`
--

CREATE TABLE `alerts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `publish_date` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `isApproved` tinyint(1) NOT NULL DEFAULT '0',
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `classrooms`
--

CREATE TABLE `classrooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `faculty_id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `capacity` int(11) NOT NULL,
  `floor` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `classrooms`
--

INSERT INTO `classrooms` (`id`, `faculty_id`, `code`, `capacity`, `floor`, `created_at`, `updated_at`) VALUES
(1, 1, '618', 35, 6, '2020-06-07 20:56:55', '2020-06-07 20:56:55'),
(2, 1, '614', 50, 6, '2020-06-07 20:57:01', '2020-06-07 20:57:01'),
(3, 1, '318', 35, 3, '2020-06-07 20:58:07', '2020-06-07 20:58:07'),
(4, 1, '018', 65, 0, '2020-06-07 20:58:18', '2020-06-07 20:58:18'),
(5, 1, '127', 250, 1, '2020-06-07 20:58:32', '2020-06-07 20:58:32'),
(6, 1, '124', 250, 1, '2020-06-07 20:58:40', '2020-06-07 20:58:40');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `credit_hours` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `department_id`, `name`, `code`, `credit_hours`, `created_at`, `updated_at`) VALUES
(1, 1, 'Data Structer', '101', 4, '2020-06-07 22:38:50', '2020-06-07 22:38:50'),
(2, 1, 'Discrete Mathematics', '102', 3, '2020-06-07 22:39:16', '2020-06-07 22:39:16'),
(3, 1, 'Advanced Data Structure', '201', 4, '2020-06-07 22:39:37', '2020-06-07 22:39:37');

-- --------------------------------------------------------

--
-- Table structure for table `course_classroom`
--

CREATE TABLE `course_classroom` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `classroom_id` bigint(20) UNSIGNED NOT NULL,
  `term_id` bigint(20) UNSIGNED NOT NULL,
  `day_number` int(11) NOT NULL,
  `from_time` time DEFAULT NULL,
  `to_time` time DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_classroom`
--

INSERT INTO `course_classroom` (`id`, `course_id`, `classroom_id`, `term_id`, `day_number`, `from_time`, `to_time`, `created_at`, `updated_at`) VALUES
(2, 2, 1, 1, 1, '08:30:00', '10:30:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `course_prerequisites`
--

CREATE TABLE `course_prerequisites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `prerequisite_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_prerequisites`
--

INSERT INTO `course_prerequisites` (`id`, `course_id`, `prerequisite_id`, `created_at`, `updated_at`) VALUES
(1, 1, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `course_students`
--

CREATE TABLE `course_students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `term_id` bigint(20) UNSIGNED NOT NULL,
  `passed` tinyint(1) NOT NULL DEFAULT '0',
  `cgpa` double NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `isPaid` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `course_teacher`
--

CREATE TABLE `course_teacher` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `teacher_id` bigint(20) UNSIGNED NOT NULL,
  `term_id` bigint(20) UNSIGNED NOT NULL,
  `course_classroom_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_teacher`
--

INSERT INTO `course_teacher` (`id`, `course_id`, `teacher_id`, `term_id`, `course_classroom_id`) VALUES
(2, 2, 2, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `course_teacher_assistant`
--

CREATE TABLE `course_teacher_assistant` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `teacher_assistant_id` bigint(20) UNSIGNED NOT NULL,
  `term_id` bigint(20) UNSIGNED NOT NULL,
  `course_classroom_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `faculty_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `floor` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `faculty_id`, `name`, `code`, `floor`, `created_at`, `updated_at`) VALUES
(1, 1, 'Computer', 'CE', 6, '2020-06-07 20:55:08', '2020-06-07 20:55:08'),
(2, 1, 'Civil', 'ES', 3, '2020-06-07 20:55:21', '2020-06-07 20:55:21'),
(3, 1, 'Basic', 'EB', 0, '2020-06-07 20:55:33', '2020-06-07 20:55:33'),
(4, 1, 'Petro', 'EP', 1, '2020-06-07 20:55:45', '2020-06-07 20:55:45'),
(5, 2, 'Graphics', 'G', 5, '2020-06-07 21:41:57', '2020-06-07 21:41:57'),
(6, 2, 'Decor', 'D', 6, '2020-06-07 21:42:05', '2020-06-07 21:42:05'),
(7, 2, 'Sculpture', 'S', 4, '2020-06-07 21:42:40', '2020-06-07 21:42:40');

-- --------------------------------------------------------

--
-- Table structure for table `faculties`
--

CREATE TABLE `faculties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faculties`
--

INSERT INTO `faculties` (`id`, `name`, `code`, `created_at`, `updated_at`) VALUES
(1, 'Engineering', 'E', '2020-06-07 20:54:46', '2020-06-07 20:54:46'),
(2, 'Fine Art', 'F', '2020-06-07 21:03:15', '2020-06-07 21:03:15');

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `head_departments`
--

CREATE TABLE `head_departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `head_departments`
--

INSERT INTO `head_departments` (`id`, `user_id`, `department_id`, `created_at`, `updated_at`) VALUES
(1, 3, 1, '2020-06-07 21:52:38', '2020-06-07 21:52:38');

-- --------------------------------------------------------

--
-- Table structure for table `head_faculties`
--

CREATE TABLE `head_faculties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `faculty_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `head_faculties`
--

INSERT INTO `head_faculties` (`id`, `user_id`, `faculty_id`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '2020-06-07 21:45:36', '2020-06-07 21:45:36'),
(2, 20, 2, '2020-06-07 21:45:51', '2020-06-07 21:45:51');

-- --------------------------------------------------------

--
-- Table structure for table `head_universities`
--

CREATE TABLE `head_universities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

CREATE TABLE `materials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `term_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2014_10_11_093845_create_faculties_table', 1),
(2, '2014_10_11_093850_create_departments_table', 1),
(3, '2014_10_12_000000_create_users_table', 1),
(4, '2014_10_12_100000_create_password_resets_table', 1),
(5, '2019_08_19_000000_create_failed_jobs_table', 1),
(6, '2020_05_02_042232_laratrust_setup_tables', 1),
(7, '2020_05_03_060248_create_academic_advisors_table', 1),
(8, '2020_05_03_092916_create_terms_table', 1),
(9, '2020_05_03_093916_create_classrooms_table', 1),
(10, '2020_05_03_093953_create_courses_table', 1),
(11, '2020_05_03_094023_create_materials_table', 1),
(12, '2020_05_03_094032_create_students_table', 1),
(13, '2020_05_03_094042_create_alerts_table', 1),
(14, '2020_05_03_094140_create_notifications_table', 1),
(15, '2020_05_03_094250_create_course_classroom_table', 1),
(16, '2020_05_03_094349_create_course_prerequisites_table', 1),
(17, '2020_05_04_055914_create_teacher_assistants_table', 1),
(18, '2020_05_04_055945_create_teachers_table', 1),
(19, '2020_05_04_060017_create_head_departments_table', 1),
(20, '2020_05_04_060043_create_head_universities_table', 1),
(21, '2020_05_04_060104_create_head_faculties_table', 1),
(22, '2020_05_04_061515_create_admins_table', 1),
(23, '2020_05_15_040453_add_is_approved_to_alerts_table', 1),
(24, '2020_05_28_021216_add_body_to_alerts_table', 1),
(25, '2020_05_28_202959_create_pending_courses_table', 1),
(26, '2020_05_29_005559_create_course_students_table', 1),
(27, '2020_05_31_090816_add_unique_to_head_departments_table', 1),
(28, '2020_05_31_090857_add_unique_to_head_faculties_table', 1),
(29, '2020_06_03_133521_create_course_teacher_table', 1),
(30, '2020_06_03_135224_create_course_teacher_assistant_table', 1),
(31, '2020_06_05_140943_add_can_register_column_to_terms_table', 1),
(32, '2020_06_05_222713_add_approved_columns_to_alerts_table', 1),
(33, '2020_06_06_132142_update_academic_advisor_id_in_students_table', 1),
(34, '2020_06_07_015610_add_uploader_id_to_materials_table', 1),
(35, '2020_06_07_053944_add_is_paid_to_course_students_table', 1),
(36, '2020_06_07_140717_add_course_classroom_id_to_course_teacher_assistant_table', 1),
(37, '2020_06_07_224642_change_publish_date_column_in_alerts_table', 2),
(38, '2020_06_08_004322_add_course_classroom_id_to_course_teacher_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `pending_courses`
--

CREATE TABLE `pending_courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `term_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `isApproved` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permission_user`
--

CREATE TABLE `permission_user` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Admin', 'Admin', '2020-06-07 20:54:19', '2020-06-07 20:54:19'),
(2, 'teacher', 'Teacher', 'Teacher', '2020-06-07 20:54:19', '2020-06-07 20:54:19'),
(3, 'teacher_assistant', 'Teacher Assistant', 'Teacher Assistant', '2020-06-07 20:54:19', '2020-06-07 20:54:19'),
(4, 'student', 'Student', 'Student', '2020-06-07 20:54:19', '2020-06-07 20:54:19'),
(5, 'academic_advisor', 'Academic Advisor', 'Academic Advisor', '2020-06-07 20:54:19', '2020-06-07 20:54:19'),
(6, 'head_department', 'Head Department', 'Head Department', '2020-06-07 20:54:19', '2020-06-07 20:54:19'),
(7, 'head_faculty', 'Head Faculty', 'Head Faculty', '2020-06-07 20:54:19', '2020-06-07 20:54:19'),
(8, 'head_university', 'Head University', 'Head University', '2020-06-07 20:54:19', '2020-06-07 20:54:19');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`role_id`, `user_id`, `user_type`) VALUES
(1, 1, 'App\\User'),
(2, 2, 'App\\User'),
(2, 3, 'App\\User'),
(2, 4, 'App\\User'),
(2, 5, 'App\\User'),
(2, 6, 'App\\User'),
(2, 7, 'App\\User'),
(2, 8, 'App\\User'),
(2, 9, 'App\\User'),
(2, 20, 'App\\User'),
(3, 10, 'App\\User'),
(3, 11, 'App\\User'),
(3, 12, 'App\\User'),
(3, 13, 'App\\User'),
(3, 14, 'App\\User'),
(3, 16, 'App\\User'),
(3, 17, 'App\\User'),
(3, 18, 'App\\User'),
(4, 19, 'App\\User'),
(5, 10, 'App\\User'),
(6, 3, 'App\\User'),
(7, 2, 'App\\User'),
(7, 20, 'App\\User');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `academic_advisor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `student_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cgpa` double NOT NULL DEFAULT '0',
  `graduated` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `user_id`, `department_id`, `academic_advisor_id`, `student_id`, `cgpa`, `graduated`, `created_at`, `updated_at`) VALUES
(1, 19, 1, 2, '1591573174', 0, 0, '2020-06-07 21:39:34', '2020-06-07 22:53:41');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `user_id`, `department_id`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '2020-06-07 21:00:45', '2020-06-07 21:00:45'),
(2, 3, 1, '2020-06-07 21:02:54', '2020-06-07 21:02:54'),
(3, 4, 2, '2020-06-07 21:04:05', '2020-06-07 21:04:05'),
(4, 5, 4, '2020-06-07 21:09:14', '2020-06-07 21:09:49'),
(5, 6, 2, '2020-06-07 21:11:13', '2020-06-07 21:11:13'),
(6, 7, 4, '2020-06-07 21:12:56', '2020-06-07 21:12:56'),
(7, 8, 3, '2020-06-07 21:14:06', '2020-06-07 21:14:06'),
(8, 9, 3, '2020-06-07 21:15:33', '2020-06-07 21:15:33'),
(10, 20, 6, '2020-06-07 21:45:17', '2020-06-07 21:45:17');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_assistants`
--

CREATE TABLE `teacher_assistants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teacher_assistants`
--

INSERT INTO `teacher_assistants` (`id`, `user_id`, `department_id`, `created_at`, `updated_at`) VALUES
(1, 10, 1, '2020-06-07 21:18:42', '2020-06-07 21:18:42'),
(2, 11, 1, '2020-06-07 21:19:47', '2020-06-07 21:19:47'),
(3, 12, 2, '2020-06-07 21:20:57', '2020-06-07 21:20:57'),
(4, 13, 2, '2020-06-07 21:22:26', '2020-06-07 21:22:26'),
(5, 14, 3, '2020-06-07 21:23:42', '2020-06-07 21:23:42'),
(6, 16, 3, '2020-06-07 21:26:40', '2020-06-07 21:26:40'),
(7, 17, 4, '2020-06-07 21:27:38', '2020-06-07 21:27:38'),
(8, 18, 4, '2020-06-07 21:29:53', '2020-06-07 21:29:53');

-- --------------------------------------------------------

--
-- Table structure for table `terms`
--

CREATE TABLE `terms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `can_register` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `terms`
--

INSERT INTO `terms` (`id`, `name`, `start`, `end`, `created_at`, `updated_at`, `can_register`) VALUES
(1, 'Spring 2020', '2020-01-15', '2020-06-15', '2020-06-07 20:56:20', '2020-06-07 20:56:20', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nationality` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth_date` date NOT NULL,
  `national_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `religion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `gender`, `mobile`, `nationality`, `birth_date`, `national_id`, `religion`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@app.com', 'male', '01113060202', 'Egyptian', '1996-08-10', '12345678910569', 'muslim', NULL, '$2y$10$Ir03f/LNWgsUPZspgP7x..k797bBhhQnaKRDCN5GdmNwAy8QVrvEC', NULL, '2020-06-07 20:54:19', '2020-06-07 20:54:19'),
(2, 'Mohamed ElKhouly', 'elkhouly@app.com', 'male', '12345678932', 'egyptian', '1973-08-01', '96325874132145', 'muslim', NULL, '$2y$10$yo9JV.ocpOLEC8dTIa5kieXrpXznqSLio9SwVsm7fM0oZsuMa13h2', NULL, '2020-06-07 21:00:45', '2020-06-07 21:00:45'),
(3, 'Amr El Saadany', 'amr.elsaadany@app.com', 'male', '01234567891', 'egyptian', '1978-02-23', '74123658963257', 'muslim', NULL, '$2y$10$m.IswikP3DcusZHdMFKzD.xwAf5CFxuTiG51oLogAFAnOGeNfdOFO', NULL, '2020-06-07 21:02:54', '2020-06-07 21:02:54'),
(4, 'Wegdan Wagdy', 'wegdan@app.com', 'female', '01239637852', 'egyptian', '1989-05-08', '32147856942365', 'muslim', NULL, '$2y$10$6b/0PyvQ4aUDmLvRKKUFsu2dqi4MgOOdotVOb2wriOCpg9QTgN9PC', NULL, '2020-06-07 21:04:05', '2020-06-07 21:04:05'),
(5, 'Fathy Shokry', 'fathy@app.com', 'male', '01123654785', 'egyptian', '1991-06-17', '36874863403864', 'muslim', NULL, '$2y$10$Pp1bofrnF5HkS48sumipC.YnXvcdCNKU1kcpayHT2sc3zO74c8lqe', NULL, '2020-06-07 21:09:14', '2020-06-07 21:09:14'),
(6, 'Ahmed Said', 'ahmed.said@app.com', 'male', '01136878673', 'egyptian', '1990-01-16', '36181783647180', 'muslim', NULL, '$2y$10$MWSf10acR3kJhJaHSq3gNuLeDvypC1GPsPczF4sqhel6LVw5cB4pW', NULL, '2020-06-07 21:11:13', '2020-06-07 21:11:13'),
(7, 'Marwa', 'marwa@app.com', 'female', '01063877686', 'egyptian', '1985-05-20', '63478008674804', 'muslim', NULL, '$2y$10$qfGjXxJfDPHe4qctqZIGE.yYrxRsJYry.SR6UNXvCqczMjRNKD97G', NULL, '2020-06-07 21:12:56', '2020-06-07 21:12:56'),
(8, 'Fayroz el rawy', 'fayroz@app.com', 'male', '01064387874', 'egyptian', '1987-12-25', '34578613046847', 'muslim', NULL, '$2y$10$qI6KI6zZWxmPdZ/tQdeWkuu.3dciqYVAZ68Tp0z46Z/bq08t44Rte', NULL, '2020-06-07 21:14:06', '2020-06-07 21:14:06'),
(9, 'mostafa', 'mostafa@app.com', 'male', '01225647852', 'egyptian', '1981-10-10', '30684780178640', 'muslim', NULL, '$2y$10$DnrAFoNT1.joyYxLWBPa/OCc3R3.INdXDCZIGSOnfOhxFA3J/bP2S', NULL, '2020-06-07 21:15:33', '2020-06-07 21:15:33'),
(10, 'Rana Salem', 'rana@app.com', 'female', '01243867174', 'egyptian', '1990-02-14', '52547608716856', 'muslim', NULL, '$2y$10$0vDtyseS4v/FyPaj.lzy9OV/fJLbycoJyJmiYqwNLUpX7AjcWi9Pi', NULL, '2020-06-07 21:18:42', '2020-06-07 21:19:59'),
(11, 'Nehal Fathy', 'nehal@app.com', 'female', '01254456584', 'egyptian', '1989-09-23', '74804001740641', 'muslim', NULL, '$2y$10$09Ij8r1RM1V2xPqSBgOF7unLzKFsBSm5Mos0RjszkUCA1NepQmQQi', NULL, '2020-06-07 21:19:47', '2020-06-07 21:19:47'),
(12, 'Gamal Mohamed', 'gamal@app.com', 'male', '01038472764', 'egyptian', '1993-08-09', '64977791864154', 'muslim', NULL, '$2y$10$EnY/wztXF9bfgcjqrByN3OvkJOr2qynSHR7QEar3xpmJThSUp.TIS', NULL, '2020-06-07 21:20:57', '2020-06-07 21:20:57'),
(13, 'Ibrahem Mostafa', 'ibrahem@app.com', 'male', '01556765456', 'egyptian', '1994-04-20', '86476754168789', 'muslim', NULL, '$2y$10$1b0mi1EAybxBc76CRTyxNOjzK/vDSDaZZ0AFRNTc/AJk7Hty62O2m', NULL, '2020-06-07 21:22:26', '2020-06-07 21:22:26'),
(14, 'Omar Saad', 'omar@app.com', 'male', '01006582159', 'egyptian', '1993-10-10', '83647836748674', 'muslim', NULL, '$2y$10$g4itttI92c2UY7o/36ZSmuZrF9je1xGoD3cSXbrO.WIVmbih1lLz2', NULL, '2020-06-07 21:23:42', '2020-06-07 21:23:42'),
(16, 'Manal Ahmed', 'manal@app.com', 'female', '01003584784', 'egyptian', '1993-10-10', '84786486718786', 'muslim', NULL, '$2y$10$.HUwy1IvPkwC7f5DKq84NOP6zg/TdsWbzSnSMxpHvLHAR5gI6CEs.', NULL, '2020-06-07 21:26:40', '2020-06-07 21:26:40'),
(17, 'Radwa mohamed', 'radwa@app.com', 'female', '01116384787', 'egyptian', '1989-08-16', '63874869187871', 'muslim', NULL, '$2y$10$mvEQqRtnLQkFP5e/z1PGFeVUnD4JTmY4W/6l4WPtyxb5uy9Mi0vZe', NULL, '2020-06-07 21:27:38', '2020-06-07 21:27:38'),
(18, 'Elhawary', 'elhawary@app.com', 'male', '01004768437', 'egyptian', '1992-10-01', '68471874641167', 'muslim', NULL, '$2y$10$tPUhPkcmw0ofeEbbpi3y4O4EHclOahAtrm9z6fBYXf2yEZWujoUla', NULL, '2020-06-07 21:29:53', '2020-06-07 21:29:53'),
(19, 'Omar Ehab', 'omar.ehab@app.com', 'male', '01113060202', 'egyptian', '1996-08-10', '68786347681746', 'muslim', NULL, '$2y$10$NLGIGBEp/G9gPXBnCzA3IuJC2XC8FJl7/Ht7NFfgc4PQLJ0Eou0xO', NULL, '2020-06-07 21:39:34', '2020-06-07 21:39:34'),
(20, 'Sahar  Ramadan', 'sahar@app.com', 'female', '01552365785', 'egyptian', '1980-05-25', '53478668178676', 'muslim', NULL, '$2y$10$jMXeaSscGY8UhAKllps.hOebCGXuO5QxXHUL0snUjI4hMiWRFqXDa', NULL, '2020-06-07 21:45:17', '2020-06-07 21:45:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academic_advisors`
--
ALTER TABLE `academic_advisors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `academic_advisors_user_id_foreign` (`user_id`),
  ADD KEY `academic_advisors_department_id_foreign` (`department_id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admins_user_id_foreign` (`user_id`);

--
-- Indexes for table `alerts`
--
ALTER TABLE `alerts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alerts_course_id_foreign` (`course_id`),
  ADD KEY `alerts_student_id_foreign` (`student_id`);

--
-- Indexes for table `classrooms`
--
ALTER TABLE `classrooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `classrooms_faculty_id_foreign` (`faculty_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `courses_code_unique` (`code`),
  ADD KEY `courses_department_id_foreign` (`department_id`);

--
-- Indexes for table `course_classroom`
--
ALTER TABLE `course_classroom`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_classroom_course_id_foreign` (`course_id`),
  ADD KEY `course_classroom_classroom_id_foreign` (`classroom_id`),
  ADD KEY `course_classroom_term_id_foreign` (`term_id`);

--
-- Indexes for table `course_prerequisites`
--
ALTER TABLE `course_prerequisites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_prerequisites_course_id_foreign` (`course_id`),
  ADD KEY `course_prerequisites_prerequisite_id_foreign` (`prerequisite_id`);

--
-- Indexes for table `course_students`
--
ALTER TABLE `course_students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_students_course_id_foreign` (`course_id`),
  ADD KEY `course_students_student_id_foreign` (`student_id`),
  ADD KEY `course_students_term_id_foreign` (`term_id`);

--
-- Indexes for table `course_teacher`
--
ALTER TABLE `course_teacher`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_teacher_course_id_foreign` (`course_id`),
  ADD KEY `course_teacher_teacher_id_foreign` (`teacher_id`),
  ADD KEY `course_teacher_term_id_foreign` (`term_id`),
  ADD KEY `course_teacher_course_classroom_id_foreign` (`course_classroom_id`);

--
-- Indexes for table `course_teacher_assistant`
--
ALTER TABLE `course_teacher_assistant`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_teacher_assistant_course_id_foreign` (`course_id`),
  ADD KEY `course_teacher_assistant_teacher_assistant_id_foreign` (`teacher_assistant_id`),
  ADD KEY `course_teacher_assistant_term_id_foreign` (`term_id`),
  ADD KEY `course_teacher_assistant_course_classroom_id_foreign` (`course_classroom_id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `departments_faculty_id_foreign` (`faculty_id`);

--
-- Indexes for table `faculties`
--
ALTER TABLE `faculties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `head_departments`
--
ALTER TABLE `head_departments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `head_departments_user_id_department_id_unique` (`user_id`,`department_id`),
  ADD KEY `head_departments_department_id_foreign` (`department_id`);

--
-- Indexes for table `head_faculties`
--
ALTER TABLE `head_faculties`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `head_faculties_user_id_faculty_id_unique` (`user_id`,`faculty_id`),
  ADD KEY `head_faculties_faculty_id_foreign` (`faculty_id`);

--
-- Indexes for table `head_universities`
--
ALTER TABLE `head_universities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `head_universities_user_id_foreign` (`user_id`);

--
-- Indexes for table `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `materials_course_id_foreign` (`course_id`),
  ADD KEY `materials_term_id_foreign` (`term_id`),
  ADD KEY `materials_user_id_foreign` (`user_id`);

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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pending_courses`
--
ALTER TABLE `pending_courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pending_courses_course_id_foreign` (`course_id`),
  ADD KEY `pending_courses_student_id_foreign` (`student_id`),
  ADD KEY `pending_courses_term_id_foreign` (`term_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD PRIMARY KEY (`user_id`,`permission_id`,`user_type`),
  ADD KEY `permission_user_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`,`user_type`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `students_student_id_unique` (`student_id`),
  ADD KEY `students_user_id_foreign` (`user_id`),
  ADD KEY `students_department_id_foreign` (`department_id`),
  ADD KEY `students_academic_advisor_id_foreign` (`academic_advisor_id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teachers_user_id_foreign` (`user_id`),
  ADD KEY `teachers_department_id_foreign` (`department_id`);

--
-- Indexes for table `teacher_assistants`
--
ALTER TABLE `teacher_assistants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teacher_assistants_user_id_foreign` (`user_id`),
  ADD KEY `teacher_assistants_department_id_foreign` (`department_id`);

--
-- Indexes for table `terms`
--
ALTER TABLE `terms`
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
-- AUTO_INCREMENT for table `academic_advisors`
--
ALTER TABLE `academic_advisors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `alerts`
--
ALTER TABLE `alerts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `classrooms`
--
ALTER TABLE `classrooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `course_classroom`
--
ALTER TABLE `course_classroom`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `course_prerequisites`
--
ALTER TABLE `course_prerequisites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `course_students`
--
ALTER TABLE `course_students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course_teacher`
--
ALTER TABLE `course_teacher`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `course_teacher_assistant`
--
ALTER TABLE `course_teacher_assistant`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `faculties`
--
ALTER TABLE `faculties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `head_departments`
--
ALTER TABLE `head_departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `head_faculties`
--
ALTER TABLE `head_faculties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `head_universities`
--
ALTER TABLE `head_universities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `materials`
--
ALTER TABLE `materials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `pending_courses`
--
ALTER TABLE `pending_courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `teacher_assistants`
--
ALTER TABLE `teacher_assistants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `terms`
--
ALTER TABLE `terms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `academic_advisors`
--
ALTER TABLE `academic_advisors`
  ADD CONSTRAINT `academic_advisors_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`),
  ADD CONSTRAINT `academic_advisors_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `admins`
--
ALTER TABLE `admins`
  ADD CONSTRAINT `admins_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `alerts`
--
ALTER TABLE `alerts`
  ADD CONSTRAINT `alerts_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`),
  ADD CONSTRAINT `alerts_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`);

--
-- Constraints for table `classrooms`
--
ALTER TABLE `classrooms`
  ADD CONSTRAINT `classrooms_faculty_id_foreign` FOREIGN KEY (`faculty_id`) REFERENCES `faculties` (`id`);

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`);

--
-- Constraints for table `course_classroom`
--
ALTER TABLE `course_classroom`
  ADD CONSTRAINT `course_classroom_classroom_id_foreign` FOREIGN KEY (`classroom_id`) REFERENCES `classrooms` (`id`),
  ADD CONSTRAINT `course_classroom_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`),
  ADD CONSTRAINT `course_classroom_term_id_foreign` FOREIGN KEY (`term_id`) REFERENCES `terms` (`id`);

--
-- Constraints for table `course_prerequisites`
--
ALTER TABLE `course_prerequisites`
  ADD CONSTRAINT `course_prerequisites_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`),
  ADD CONSTRAINT `course_prerequisites_prerequisite_id_foreign` FOREIGN KEY (`prerequisite_id`) REFERENCES `courses` (`id`);

--
-- Constraints for table `course_students`
--
ALTER TABLE `course_students`
  ADD CONSTRAINT `course_students_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`),
  ADD CONSTRAINT `course_students_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`),
  ADD CONSTRAINT `course_students_term_id_foreign` FOREIGN KEY (`term_id`) REFERENCES `terms` (`id`);

--
-- Constraints for table `course_teacher`
--
ALTER TABLE `course_teacher`
  ADD CONSTRAINT `course_teacher_course_classroom_id_foreign` FOREIGN KEY (`course_classroom_id`) REFERENCES `course_classroom` (`id`),
  ADD CONSTRAINT `course_teacher_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`),
  ADD CONSTRAINT `course_teacher_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`),
  ADD CONSTRAINT `course_teacher_term_id_foreign` FOREIGN KEY (`term_id`) REFERENCES `terms` (`id`);

--
-- Constraints for table `course_teacher_assistant`
--
ALTER TABLE `course_teacher_assistant`
  ADD CONSTRAINT `course_teacher_assistant_course_classroom_id_foreign` FOREIGN KEY (`course_classroom_id`) REFERENCES `course_classroom` (`id`),
  ADD CONSTRAINT `course_teacher_assistant_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`),
  ADD CONSTRAINT `course_teacher_assistant_teacher_assistant_id_foreign` FOREIGN KEY (`teacher_assistant_id`) REFERENCES `teacher_assistants` (`id`),
  ADD CONSTRAINT `course_teacher_assistant_term_id_foreign` FOREIGN KEY (`term_id`) REFERENCES `terms` (`id`);

--
-- Constraints for table `departments`
--
ALTER TABLE `departments`
  ADD CONSTRAINT `departments_faculty_id_foreign` FOREIGN KEY (`faculty_id`) REFERENCES `faculties` (`id`);

--
-- Constraints for table `head_departments`
--
ALTER TABLE `head_departments`
  ADD CONSTRAINT `head_departments_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`),
  ADD CONSTRAINT `head_departments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `head_faculties`
--
ALTER TABLE `head_faculties`
  ADD CONSTRAINT `head_faculties_faculty_id_foreign` FOREIGN KEY (`faculty_id`) REFERENCES `faculties` (`id`),
  ADD CONSTRAINT `head_faculties_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `head_universities`
--
ALTER TABLE `head_universities`
  ADD CONSTRAINT `head_universities_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `materials`
--
ALTER TABLE `materials`
  ADD CONSTRAINT `materials_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`),
  ADD CONSTRAINT `materials_term_id_foreign` FOREIGN KEY (`term_id`) REFERENCES `terms` (`id`),
  ADD CONSTRAINT `materials_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `pending_courses`
--
ALTER TABLE `pending_courses`
  ADD CONSTRAINT `pending_courses_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`),
  ADD CONSTRAINT `pending_courses_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`),
  ADD CONSTRAINT `pending_courses_term_id_foreign` FOREIGN KEY (`term_id`) REFERENCES `terms` (`id`);

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_academic_advisor_id_foreign` FOREIGN KEY (`academic_advisor_id`) REFERENCES `academic_advisors` (`id`),
  ADD CONSTRAINT `students_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`),
  ADD CONSTRAINT `students_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `teachers`
--
ALTER TABLE `teachers`
  ADD CONSTRAINT `teachers_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`),
  ADD CONSTRAINT `teachers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `teacher_assistants`
--
ALTER TABLE `teacher_assistants`
  ADD CONSTRAINT `teacher_assistants_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`),
  ADD CONSTRAINT `teacher_assistants_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
