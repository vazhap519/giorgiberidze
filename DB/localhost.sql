-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 13, 2026 at 12:03 AM
-- Server version: 10.11.16-MariaDB
-- PHP Version: 8.4.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eyenetge_eyenetge`
--
CREATE DATABASE IF NOT EXISTS `eyenetge_eyenetge` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `eyenetge_eyenetge`;

-- --------------------------------------------------------

--
-- Table structure for table `about_features`
--

CREATE TABLE `about_features` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `about_section_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `bg_color` varchar(255) NOT NULL DEFAULT '#ffffff',
  `title_color` varchar(255) NOT NULL DEFAULT '#111827',
  `description_color` varchar(255) NOT NULL DEFAULT '#4b5563',
  `card_bg` varchar(255) NOT NULL DEFAULT '#ffffff',
  `card_border` varchar(255) NOT NULL DEFAULT '#e5e7eb',
  `card_hover_color` varchar(255) NOT NULL DEFAULT '#2563eb',
  `experience_bg` varchar(255) NOT NULL DEFAULT '#ffffff',
  `experience_text_color` varchar(255) NOT NULL DEFAULT '#2563eb',
  `title_size` int(11) NOT NULL DEFAULT 48,
  `description_size` int(11) NOT NULL DEFAULT 18,
  `card_radius` int(11) NOT NULL DEFAULT 16,
  `blur` int(11) NOT NULL DEFAULT 0,
  `opacity` double NOT NULL DEFAULT 1,
  `padding_top` int(11) NOT NULL DEFAULT 120,
  `padding_bottom` int(11) NOT NULL DEFAULT 120,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `about_sections`
--

CREATE TABLE `about_sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `experience_years` varchar(255) DEFAULT NULL,
  `experience_label` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `bg_color` varchar(255) NOT NULL DEFAULT '#ffffff',
  `title_color` varchar(255) NOT NULL DEFAULT '#111827',
  `description_color` varchar(255) NOT NULL DEFAULT '#4b5563',
  `card_bg` varchar(255) NOT NULL DEFAULT '#ffffff',
  `card_border` varchar(255) NOT NULL DEFAULT '#e5e7eb',
  `card_hover_color` varchar(255) NOT NULL DEFAULT '#2563eb',
  `experience_bg` varchar(255) NOT NULL DEFAULT '#ffffff',
  `experience_text_color` varchar(255) NOT NULL DEFAULT '#2563eb',
  `title_size` int(11) NOT NULL DEFAULT 48,
  `description_size` int(11) NOT NULL DEFAULT 18,
  `card_radius` int(11) NOT NULL DEFAULT 16,
  `blur` int(11) NOT NULL DEFAULT 0,
  `opacity` double NOT NULL DEFAULT 1,
  `padding_top` int(11) NOT NULL DEFAULT 120,
  `padding_bottom` int(11) NOT NULL DEFAULT 120,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_sections`
--

INSERT INTO `about_sections` (`id`, `title`, `description`, `experience_years`, `experience_label`, `is_active`, `bg_color`, `title_color`, `description_color`, `card_bg`, `card_border`, `card_hover_color`, `experience_bg`, `experience_text_color`, `title_size`, `description_size`, `card_radius`, `blur`, `opacity`, `padding_top`, `padding_bottom`, `created_at`, `updated_at`) VALUES
(1, 'გიორგი ბერიძე', 'სამეთვალყურეო კამერების ექსპერტი', NULL, 'სერტიფიცირებული სამეთვალყურეო სისტემების ექსპერტი მწარმოებლების მიერ', 1, '#ffffff', '#111827', '#4b5563', '#ffffff', '#e5e7eb', '#2563eb', '#ffffff', '#2563eb', 48, 18, 16, 0, 1, 120, 120, '2026-03-12 14:53:17', '2026-03-12 14:54:22');

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
-- Table structure for table `carousel_slides`
--

CREATE TABLE `carousel_slides` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(255) NOT NULL,
  `button_text` varchar(255) NOT NULL,
  `button_url` varchar(255) DEFAULT NULL,
  `button2_text` varchar(255) DEFAULT NULL,
  `button2_url` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `styles` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`styles`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carousel_slides`
--

INSERT INTO `carousel_slides` (`id`, `title`, `subtitle`, `button_text`, `button_url`, `button2_text`, `button2_url`, `is_active`, `styles`, `created_at`, `updated_at`) VALUES
(1, 'TD-9846SP1-A(BA/G4/WR2) 4MP Solar-powered 4G  Full-Color Network Camera', 'კამერა მზის პანელზე 4G მხარდაჭეროთ', 'პროდუქტის დეტალები', 'https://www.tvt.net.cn/products/1914.html', NULL, NULL, 1, '{\"section_bg\":null,\"padding\":null,\"opacity\":null,\"gradient_from\":null,\"gradient_to\":null,\"title_color\":null,\"title_size\":null,\"subtitle_color\":null,\"button_bg\":null,\"button_text\":null,\"button_border_color\":null,\"button_border_width\":0,\"button_radius\":12,\"button_font_size\":16,\"button_opacity\":100,\"button2_bg\":null,\"button2_text\":null,\"button2_border\":null}', '2026-03-12 13:31:13', '2026-03-12 13:32:28'),
(2, 'Video Intercom Indoor Station', 'ვიდეო ზარი და IP დომოფონია', 'პროდუქტის დეტალები', 'https://www.tvt.net.cn/products/1388.html', NULL, NULL, 1, '{\"section_bg\":null,\"padding\":null,\"opacity\":null,\"gradient_from\":null,\"gradient_to\":null,\"title_color\":null,\"title_size\":null,\"subtitle_color\":null,\"button_bg\":null,\"button_text\":null,\"button_border_color\":null,\"button_border_width\":0,\"button_radius\":12,\"button_font_size\":16,\"button_opacity\":100,\"button2_bg\":null,\"button2_text\":null,\"button2_border\":null}', '2026-03-12 13:52:31', '2026-03-12 13:52:31'),
(3, 'თერმული (სითბური) ცილინდრული IP კამერა', 'სითბური ცილინდრული IP კამერა გარჩევადობით 5MP (2592×1944) @30fps და 4 მმ', 'პროდუქტის დეტალები', NULL, NULL, NULL, 1, '{\"section_bg\":null,\"padding\":null,\"opacity\":null,\"gradient_from\":null,\"gradient_to\":null,\"title_color\":null,\"title_size\":null,\"subtitle_color\":null,\"button_bg\":null,\"button_text\":null,\"button_border_color\":null,\"button_border_width\":0,\"button_radius\":12,\"button_font_size\":16,\"button_opacity\":100,\"button2_bg\":null,\"button2_text\":null,\"button2_border\":null}', '2026-03-12 15:34:24', '2026-03-12 15:34:24');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_options` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`service_options`)),
  `section_bg` varchar(255) NOT NULL DEFAULT '#f8fafc',
  `section_opacity` int(11) NOT NULL DEFAULT 100,
  `section_padding` int(11) NOT NULL DEFAULT 96,
  `section_gradient_from` varchar(255) DEFAULT NULL,
  `section_gradient_to` varchar(255) DEFAULT NULL,
  `card_bg` varchar(255) DEFAULT '#ffffff',
  `card_border` varchar(255) DEFAULT '#e5e7eb',
  `card_border_width` int(11) DEFAULT 1,
  `card_radius` int(11) DEFAULT 16,
  `card_shadow` varchar(255) DEFAULT 'lg',
  `card_opacity` int(11) DEFAULT 100,
  `input_bg` varchar(255) NOT NULL DEFAULT '#ffffff',
  `input_border` varchar(255) NOT NULL DEFAULT '#e5e7eb',
  `input_border_width` int(11) NOT NULL DEFAULT 1,
  `input_radius` int(11) NOT NULL DEFAULT 12,
  `input_focus_color` varchar(255) NOT NULL DEFAULT '#3b82f6',
  `input_text_color` varchar(255) NOT NULL DEFAULT '#111827',
  `input_placeholder_color` varchar(255) NOT NULL DEFAULT '#9ca3af',
  `button_bg_from` varchar(255) NOT NULL DEFAULT '#2563eb',
  `button_bg_to` varchar(255) NOT NULL DEFAULT '#1d4ed8',
  `button_text_color` varchar(255) NOT NULL DEFAULT '#ffffff',
  `button_radius` int(11) NOT NULL DEFAULT 12,
  `button_shadow` varchar(255) NOT NULL DEFAULT 'md',
  `button_opacity` int(11) NOT NULL DEFAULT 100,
  `button_hover_from` varchar(255) DEFAULT NULL,
  `button_hover_to` varchar(255) DEFAULT NULL,
  `title_color` varchar(255) NOT NULL DEFAULT '#1f2937',
  `title_size` int(11) NOT NULL DEFAULT 20,
  `title_weight` varchar(255) NOT NULL DEFAULT '600',
  `title_opacity` int(11) NOT NULL DEFAULT 100,
  `text_color` varchar(255) NOT NULL DEFAULT '#6b7280',
  `text_size` int(11) NOT NULL DEFAULT 14,
  `text_opacity` int(11) NOT NULL DEFAULT 100,
  `animation` varchar(255) DEFAULT NULL,
  `animation_duration` int(11) NOT NULL DEFAULT 300,
  `transition` varchar(255) NOT NULL DEFAULT 'ease',
  `contact_form_title` varchar(255) NOT NULL DEFAULT 'მოგვწერეთ',
  `contact_form_button` varchar(255) NOT NULL DEFAULT 'გაგზავნა',
  `service_form_title` varchar(255) NOT NULL DEFAULT 'სერვისის მოთხოვნა',
  `service_form_button` varchar(255) NOT NULL DEFAULT 'მოთხოვნის გაგზავნა',
  `name_placeholder` varchar(255) NOT NULL DEFAULT 'სახელი',
  `email_placeholder` varchar(255) NOT NULL DEFAULT 'იმეილი',
  `phone_placeholder` varchar(255) NOT NULL DEFAULT 'ტელეფონი',
  `message_placeholder` varchar(255) NOT NULL DEFAULT 'ტექსტი',
  `address_placeholder` varchar(255) NOT NULL DEFAULT 'მისამართი',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `service_options`, `section_bg`, `section_opacity`, `section_padding`, `section_gradient_from`, `section_gradient_to`, `card_bg`, `card_border`, `card_border_width`, `card_radius`, `card_shadow`, `card_opacity`, `input_bg`, `input_border`, `input_border_width`, `input_radius`, `input_focus_color`, `input_text_color`, `input_placeholder_color`, `button_bg_from`, `button_bg_to`, `button_text_color`, `button_radius`, `button_shadow`, `button_opacity`, `button_hover_from`, `button_hover_to`, `title_color`, `title_size`, `title_weight`, `title_opacity`, `text_color`, `text_size`, `text_opacity`, `animation`, `animation_duration`, `transition`, `contact_form_title`, `contact_form_button`, `service_form_title`, `service_form_button`, `name_placeholder`, `email_placeholder`, `phone_placeholder`, `message_placeholder`, `address_placeholder`, `created_at`, `updated_at`) VALUES
(1, '[{\"title\":\"\\u10d9\\u10d0\\u10db\\u10d4\\u10e0\\u10d4\\u10d1\\u10d8\\u10e1 \\u10db\\u10dd\\u10dc\\u10e2\\u10d0\\u10df\\u10d8\"},{\"title\":\"\\u10e3\\u10e1\\u10d0\\u10e4\\u10e0\\u10d7\\u10ee\\u10dd\\u10d4\\u10d1\\u10d8\\u10e1 \\u10e1\\u10d8\\u10e1\\u10e2\\u10d4\\u10db\\u10d4\\u10d1\\u10d8\"},{\"title\":\"\\u10e5\\u10e1\\u10d4\\u10da\\u10e3\\u10e0\\u10d8 \\u10db\\u10dd\\u10db\\u10e1\\u10d0\\u10ee\\u10e3\\u10e0\\u10d1\\u10d4\\u10d1\\u10d8\"},{\"title\":\"IP \\u10d3\\u10dd\\u10db\\u10dd\\u10e4\\u10dd\\u10dc\\u10d8\\u10d0\"},{\"title\":\"\\u10de\\u10e0\\u10dd\\u10d2\\u10e0\\u10d0\\u10db\\u10e3\\u10da\\u10d8 \\u10e3\\u10d6\\u10e0\\u10e3\\u10dc\\u10d5\\u10d4\\u10e7\\u10dd\\u10e4\\u10d0\"},{\"title\":\"\\u10d3\\u10d0\\u10e8\\u10d5\\u10d4\\u10d1\\u10d8\\u10e1 \\u10e1\\u10d8\\u10e1\\u10e2\\u10d4\\u10db\\u10d4\\u10d1\\u10d8 (\\u10e2\\u10e3\\u10e0\\u10dc\\u10d8\\u10d9\\u10d4\\u10e2\\u10d8 \\/ \\u10e8\\u10da\\u10d0\\u10dc\\u10d2\\u10d1\\u10d0\\u10e3\\u10db\\u10d8)\"}]', '#ffffff', 100, 20, NULL, NULL, '#de8311', '#e5e7eb', 1, 16, 'lg', 100, '#bab0b0', '#e5e7eb', 1, 12, '#3b82f6', '#111827', '#9ca3af', '#09245e', '#02113b', '#de8311', 12, 'md', 100, NULL, NULL, '#1f2937', 20, '600', 100, '#000000', 14, 100, NULL, 300, 'ease', 'მოგვწერეთ', 'გაგზავნა', 'სერვისის მოთხოვნა', 'მოთხოვნის გაგზავნა', 'სახელი', 'იმეილი', 'ტელეფონი', 'ტექსტი', 'მისამართი', '2026-03-12 14:10:47', '2026-03-12 14:17:05');

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
-- Table structure for table `filters`
--

CREATE TABLE `filters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `sort` int(11) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `styles` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT '{"title_color":"#111827","title_size":16,"title_weight":600,"item_color":"#374151","item_size":14,"item_hover_color":"#2563eb","bg_color":"#ffffff","border_color":"#e5e7eb","border_radius":8,"active_color":"#2563eb","active_bg":"#eff6ff","padding_x":12,"padding_y":6,"gap":6}' CHECK (json_valid(`styles`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `filters`
--

INSERT INTO `filters` (`id`, `name`, `slug`, `sort`, `is_active`, `styles`, `created_at`, `updated_at`) VALUES
(1, 'უსაფრთხოების სისტემები', 'usafrtkhoebis-sistemebi', 0, 1, '{\"title_color\":\"#111827\",\"title_size\":16,\"title_weight\":600,\"item_color\":\"#374151\",\"item_size\":14,\"item_hover_color\":\"#2563eb\",\"bg_color\":\"#ffffff\",\"border_color\":\"#e5e7eb\",\"border_radius\":8,\"active_color\":\"#2563eb\",\"active_bg\":\"#eff6ff\",\"padding_x\":12,\"padding_y\":6,\"gap\":6}', '2026-03-12 13:57:32', '2026-03-12 13:57:32'),
(2, 'Image Sensor', 'image-sensor', 0, 1, '{\"title_color\":\"#111827\",\"title_size\":16,\"title_weight\":600,\"item_color\":\"#374151\",\"item_size\":14,\"item_hover_color\":\"#2563eb\",\"bg_color\":\"#ffffff\",\"border_color\":\"#e5e7eb\",\"border_radius\":8,\"active_color\":\"#2563eb\",\"active_bg\":\"#eff6ff\",\"padding_x\":12,\"padding_y\":6,\"gap\":6}', '2026-03-12 14:00:12', '2026-03-12 14:00:12'),
(3, 'Max. Resolution', 'max-resolution', 0, 1, '{\"title_color\":\"#111827\",\"title_size\":16,\"title_weight\":600,\"item_color\":\"#374151\",\"item_size\":14,\"item_hover_color\":\"#2563eb\",\"bg_color\":\"#ffffff\",\"border_color\":\"#e5e7eb\",\"border_radius\":8,\"active_color\":\"#2563eb\",\"active_bg\":\"#eff6ff\",\"padding_x\":12,\"padding_y\":6,\"gap\":6}', '2026-03-12 14:00:28', '2026-03-12 14:00:28'),
(4, 'Min. Illumination', 'min-illumination', 0, 1, '{\"title_color\":\"#111827\",\"title_size\":16,\"title_weight\":600,\"item_color\":\"#374151\",\"item_size\":14,\"item_hover_color\":\"#2563eb\",\"bg_color\":\"#ffffff\",\"border_color\":\"#e5e7eb\",\"border_radius\":8,\"active_color\":\"#2563eb\",\"active_bg\":\"#eff6ff\",\"padding_x\":12,\"padding_y\":6,\"gap\":6}', '2026-03-12 14:00:54', '2026-03-12 14:00:54'),
(5, 'Lens Type', 'lens-type', 0, 1, '{\"title_color\":\"#111827\",\"title_size\":16,\"title_weight\":600,\"item_color\":\"#374151\",\"item_size\":14,\"item_hover_color\":\"#2563eb\",\"bg_color\":\"#ffffff\",\"border_color\":\"#e5e7eb\",\"border_radius\":8,\"active_color\":\"#2563eb\",\"active_bg\":\"#eff6ff\",\"padding_x\":12,\"padding_y\":6,\"gap\":6}', '2026-03-12 14:01:16', '2026-03-12 14:01:16');

-- --------------------------------------------------------

--
-- Table structure for table `footers`
--

CREATE TABLE `footers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `footer_description` text DEFAULT NULL,
  `contact_items` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT '[{"type":"email","value":"needhelp@company.com"},{"type":"phone","value":"+995 555 000 000"},{"type":"address","value":"Tbilisi, Georgia"}]' CHECK (json_valid(`contact_items`)),
  `footer_contact_styles` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT '{"icon_color":"#3b82f6","icon_hover_color":"#2563eb","text_color":"#cbd5f5","text_hover_color":"#ffffff","icon_size":16,"text_size":14,"gap":12,"item_spacing":16,"icon_background":"transparent","icon_border_radius":6,"padding_y":4,"padding_x":0,"opacity":0.8000000000000000444089209850062616169452667236328125,"hover_opacity":1}' CHECK (json_valid(`footer_contact_styles`)),
  `footer_navigation_title` varchar(255) DEFAULT NULL,
  `footer_contact_title` varchar(255) DEFAULT NULL,
  `footer_social_title` varchar(255) DEFAULT NULL,
  `footer_follow_text` varchar(255) DEFAULT NULL,
  `footer_copyright` varchar(255) DEFAULT NULL,
  `footer_social_links` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`footer_social_links`)),
  `footer_bg_color` varchar(255) NOT NULL DEFAULT '#0f172a',
  `footer_text_color` varchar(255) NOT NULL DEFAULT '#cbd5f5',
  `footer_link_color` varchar(255) NOT NULL DEFAULT '#94a3b8',
  `footer_hover_color` varchar(255) NOT NULL DEFAULT '#ffffff',
  `footer_follow_color` varchar(255) DEFAULT '#94a3b8',
  `footer_follow_size` int(11) DEFAULT 14,
  `footer_follow_opacity` double DEFAULT 0.8,
  `footer_follow_weight` varchar(255) DEFAULT '400',
  `footer_social_bg` varchar(255) NOT NULL DEFAULT '#1e293b',
  `footer_social_color` varchar(255) NOT NULL DEFAULT '#cbd5f5',
  `footer_social_hover_bg` varchar(255) NOT NULL DEFAULT '#2563eb',
  `footer_social_hover_color` varchar(255) NOT NULL DEFAULT '#ffffff',
  `footer_title_size` int(11) NOT NULL DEFAULT 18,
  `footer_text_size` int(11) NOT NULL DEFAULT 14,
  `footer_blur` int(11) NOT NULL DEFAULT 0,
  `footer_opacity` double NOT NULL DEFAULT 1,
  `footer_position` varchar(255) NOT NULL DEFAULT 'relative',
  `footer_z_index` int(11) NOT NULL DEFAULT 10,
  `footer_padding_top` int(11) NOT NULL DEFAULT 80,
  `footer_padding_bottom` int(11) NOT NULL DEFAULT 40,
  `footer_logo_size` int(11) NOT NULL DEFAULT 48,
  `footer_logo_text_color` varchar(255) NOT NULL DEFAULT '#ffffff',
  `footer_logo_text_size` int(11) NOT NULL DEFAULT 18,
  `footer_logo_text_weight` varchar(255) NOT NULL DEFAULT '600',
  `footer_description_color` varchar(255) NOT NULL DEFAULT '#94a3b8',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `footers`
--

INSERT INTO `footers` (`id`, `footer_description`, `contact_items`, `footer_contact_styles`, `footer_navigation_title`, `footer_contact_title`, `footer_social_title`, `footer_follow_text`, `footer_copyright`, `footer_social_links`, `footer_bg_color`, `footer_text_color`, `footer_link_color`, `footer_hover_color`, `footer_follow_color`, `footer_follow_size`, `footer_follow_opacity`, `footer_follow_weight`, `footer_social_bg`, `footer_social_color`, `footer_social_hover_bg`, `footer_social_hover_color`, `footer_title_size`, `footer_text_size`, `footer_blur`, `footer_opacity`, `footer_position`, `footer_z_index`, `footer_padding_top`, `footer_padding_bottom`, `footer_logo_size`, `footer_logo_text_color`, `footer_logo_text_size`, `footer_logo_text_weight`, `footer_description_color`, `created_at`, `updated_at`) VALUES
(1, 'EyeNet - აინეტი', '[{\"type\":\"phone\",\"value\":\"551701005\"},{\"type\":\"phone\",\"value\":\"551701006\"},{\"type\":\"email\",\"value\":\"contact@eyenet.ge\"},{\"type\":\"address\",\"value\":\"\\u10d7\\u10d1\\u10d8\\u10da\\u10d8\\u10e1\\u10d8, \\u10e8\\u10d0\\u10da\\u10d5\\u10d0 \\u10dc\\u10e3\\u10ea\\u10e3\\u10d1\\u10d8\\u10eb\\u10d8\\u10e1 \\u10e5.215\"}]', '{\"icon_color\":\"#3b82f6\",\"icon_hover_color\":\"#2563eb\",\"text_color\":\"#cbd5f5\",\"text_hover_color\":\"#ffffff\",\"icon_size\":16,\"text_size\":14,\"gap\":12,\"item_spacing\":16,\"icon_background\":\"transparent\",\"icon_border_radius\":6,\"padding_y\":4,\"padding_x\":0,\"opacity\":0.8000000000000000444089209850062616169452667236328125,\"hover_opacity\":1}', 'ნავიგაცია', 'დაგვიკავშირდით', 'Follow Us', NULL, NULL, '[{\"platform\":\"facebook\",\"url\":\"\\u10e4\\u10d1.\\u10ea\\u10dd\\u10db\"},{\"platform\":\"instagram\",\"url\":\"\\u10d8\\u10dc\\u10e1\\u10e2\\u10d0\"},{\"platform\":\"youtube\",\"url\":\"\\u10e7\\u10dd\\u10e3\\u10d7\\u10e3\"}]', '#0a053b', '#de8311', '#94a3b8', '#ffffff', '#de8311', 16, 1, '700', '#1e293b', '#cbd5f5', '#2563eb', '#ffffff', 18, 14, 0, 1, 'relative', 10, 80, 40, 48, '#ffffff', 18, '600', '#94a3b8', '2026-03-12 14:42:40', '2026-03-12 15:27:55');

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
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) DEFAULT NULL,
  `collection_name` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `mime_type` varchar(255) DEFAULT NULL,
  `disk` varchar(255) NOT NULL,
  `conversions_disk` varchar(255) DEFAULT NULL,
  `size` bigint(20) UNSIGNED NOT NULL,
  `manipulations` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`manipulations`)),
  `custom_properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`custom_properties`)),
  `generated_conversions` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`generated_conversions`)),
  `responsive_images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`responsive_images`)),
  `order_column` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `model_type`, `model_id`, `uuid`, `collection_name`, `name`, `file_name`, `mime_type`, `disk`, `conversions_disk`, `size`, `manipulations`, `custom_properties`, `generated_conversions`, `responsive_images`, `order_column`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\CarouselSlide', 1, '54fce0fd-5c5a-40e2-aeac-9deb37cff2ef', 'background', 'pexels-david-537925-1277181', '01KKHHMF4RCVPF2BGXHHNHWA2M.jpg', 'image/jpeg', 'public', 'public', 2602794, '[]', '{\"custom_headers\":{\"ContentType\":\"image\\/jpeg\"}}', '{\"webp\":true}', '{\"media_library_original\":{\"urls\":[\"01KKHHMF4RCVPF2BGXHHNHWA2M___media_library_original_6000_4000.jpg\",\"01KKHHMF4RCVPF2BGXHHNHWA2M___media_library_original_5019_3346.jpg\",\"01KKHHMF4RCVPF2BGXHHNHWA2M___media_library_original_4200_2800.jpg\",\"01KKHHMF4RCVPF2BGXHHNHWA2M___media_library_original_3513_2342.jpg\",\"01KKHHMF4RCVPF2BGXHHNHWA2M___media_library_original_2939_1959.jpg\",\"01KKHHMF4RCVPF2BGXHHNHWA2M___media_library_original_2459_1639.jpg\",\"01KKHHMF4RCVPF2BGXHHNHWA2M___media_library_original_2058_1372.jpg\",\"01KKHHMF4RCVPF2BGXHHNHWA2M___media_library_original_1721_1147.jpg\",\"01KKHHMF4RCVPF2BGXHHNHWA2M___media_library_original_1440_960.jpg\",\"01KKHHMF4RCVPF2BGXHHNHWA2M___media_library_original_1205_803.jpg\",\"01KKHHMF4RCVPF2BGXHHNHWA2M___media_library_original_1008_672.jpg\",\"01KKHHMF4RCVPF2BGXHHNHWA2M___media_library_original_843_562.jpg\",\"01KKHHMF4RCVPF2BGXHHNHWA2M___media_library_original_705_470.jpg\",\"01KKHHMF4RCVPF2BGXHHNHWA2M___media_library_original_590_393.jpg\",\"01KKHHMF4RCVPF2BGXHHNHWA2M___media_library_original_494_329.jpg\",\"01KKHHMF4RCVPF2BGXHHNHWA2M___media_library_original_413_275.jpg\"],\"base64svg\":\"data:image\\/svg+xml;base64,PCFET0NUWVBFIHN2ZyBQVUJMSUMgIi0vL1czQy8vRFREIFNWRyAxLjEvL0VOIiAiaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkIj4KPHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHhtbDpzcGFjZT0icHJlc2VydmUiIHg9IjAiCiB5PSIwIiB2aWV3Qm94PSIwIDAgNjAwMCA0MDAwIj4KCTxpbWFnZSB3aWR0aD0iNjAwMCIgaGVpZ2h0PSI0MDAwIiB4bGluazpocmVmPSJkYXRhOmltYWdlL2pwZWc7YmFzZTY0LC85ai80QUFRU2taSlJnQUJBUUVBWUFCZ0FBRC8vZ0ErUTFKRlFWUlBVam9nWjJRdGFuQmxaeUIyTVM0d0lDaDFjMmx1WnlCSlNrY2dTbEJGUnlCMk5qSXBMQ0JrWldaaGRXeDBJSEYxWVd4cGRIa0svOXNBUXdBSUJnWUhCZ1VJQndjSENRa0lDZ3dVRFF3TEN3d1pFaE1QRkIwYUh4NGRHaHdjSUNRdUp5QWlMQ01jSENnM0tTd3dNVFEwTkI4bk9UMDRNand1TXpReS85c0FRd0VKQ1FrTUN3d1lEUTBZTWlFY0lUSXlNakl5TWpJeU1qSXlNakl5TWpJeU1qSXlNakl5TWpJeU1qSXlNakl5TWpJeU1qSXlNakl5TWpJeU1qSXlNakl5LzhBQUVRZ0FGUUFnQXdFaUFBSVJBUU1SQWYvRUFCOEFBQUVGQVFFQkFRRUJBQUFBQUFBQUFBQUJBZ01FQlFZSENBa0tDLy9FQUxVUUFBSUJBd01DQkFNRkJRUUVBQUFCZlFFQ0F3QUVFUVVTSVRGQkJoTlJZUWNpY1JReWdaR2hDQ05Dc2NFVlV0SHdKRE5pY29JSkNoWVhHQmthSlNZbktDa3FORFUyTnpnNU9rTkVSVVpIU0VsS1UxUlZWbGRZV1ZwalpHVm1aMmhwYW5OMGRYWjNlSGw2ZzRTRmhvZUlpWXFTazVTVmxwZVltWnFpbzZTbHBxZW9xYXF5czdTMXRyZTR1YnJDdzhURnhzZkl5Y3JTMDlUVjF0ZlkyZHJoNHVQazVlYm42T25xOGZMejlQWDI5L2o1K3YvRUFCOEJBQU1CQVFFQkFRRUJBUUVBQUFBQUFBQUJBZ01FQlFZSENBa0tDLy9FQUxVUkFBSUJBZ1FFQXdRSEJRUUVBQUVDZHdBQkFnTVJCQVVoTVFZU1FWRUhZWEVUSWpLQkNCUkNrYUd4d1Frak0xTHdGV0p5MFFvV0pEVGhKZkVYR0JrYUppY29LU28xTmpjNE9UcERSRVZHUjBoSlNsTlVWVlpYV0ZsYVkyUmxabWRvYVdwemRIVjJkM2g1ZW9LRGhJV0doNGlKaXBLVGxKV1dsNWlabXFLanBLV21wNmlwcXJLenRMVzJ0N2k1dXNMRHhNWEd4OGpKeXRMVDFOWFcxOWpaMnVMajVPWG01K2pwNnZMejlQWDI5L2o1K3YvYUFBd0RBUUFDRVFNUkFEOEF1NmZwTnhMTUpINjEyR24yTXU1ZHg2VjUvcDNqVGFtRGpkbXV3MHp4aGJ0R1BNSUJyaXE0dURkbWEwNmZZNnE1c2wremNqSnhYRGF2cEtUekVaeFczZGVOTE5JeUN3TmMxZWVMckV1U1JVTEVLOTRsOHF0cWVTMnJrS0RXb3R4S29YRGtVVVZ5VlZxWXhiUTY2bmsyTGx5YzFrM2swZy9pTkZGVFI2RnRuLy9aIj4KCTwvaW1hZ2U+Cjwvc3ZnPg==\"}}', 1, '2026-03-12 13:31:13', '2026-03-12 13:31:35'),
(2, 'App\\Models\\CarouselSlide', 1, 'c51f78c3-5e50-46b2-9cda-c5beed399252', 'image', 'f7421b91dd0f71a910977fcfc720dbb1', '01KKHHN4RSER46E92WYK69DNXF.png', 'image/png', 'public', 'public', 73406, '[]', '{\"custom_headers\":{\"ContentType\":\"image\\/png\"}}', '{\"webp\":true}', '{\"media_library_original\":{\"urls\":[\"01KKHHN4RSER46E92WYK69DNXF___media_library_original_400_310.png\",\"01KKHHN4RSER46E92WYK69DNXF___media_library_original_334_259.png\",\"01KKHHN4RSER46E92WYK69DNXF___media_library_original_280_217.png\",\"01KKHHN4RSER46E92WYK69DNXF___media_library_original_234_181.png\",\"01KKHHN4RSER46E92WYK69DNXF___media_library_original_195_151.png\",\"01KKHHN4RSER46E92WYK69DNXF___media_library_original_163_126.png\"],\"base64svg\":\"data:image\\/svg+xml;base64,PCFET0NUWVBFIHN2ZyBQVUJMSUMgIi0vL1czQy8vRFREIFNWRyAxLjEvL0VOIiAiaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkIj4KPHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHhtbDpzcGFjZT0icHJlc2VydmUiIHg9IjAiCiB5PSIwIiB2aWV3Qm94PSIwIDAgNDAwIDMxMCI+Cgk8aW1hZ2Ugd2lkdGg9IjQwMCIgaGVpZ2h0PSIzMTAiIHhsaW5rOmhyZWY9ImRhdGE6aW1hZ2UvanBlZztiYXNlNjQsLzlqLzRBQVFTa1pKUmdBQkFRRUFZQUJnQUFELy9nQStRMUpGUVZSUFVqb2daMlF0YW5CbFp5QjJNUzR3SUNoMWMybHVaeUJKU2tjZ1NsQkZSeUIyTmpJcExDQmtaV1poZFd4MElIRjFZV3hwZEhrSy85c0FRd0FJQmdZSEJnVUlCd2NIQ1FrSUNnd1VEUXdMQ3d3WkVoTVBGQjBhSHg0ZEdod2NJQ1F1SnlBaUxDTWNIQ2czS1N3d01UUTBOQjhuT1QwNE1qd3VNelF5LzlzQVF3RUpDUWtNQ3d3WURRMFlNaUVjSVRJeU1qSXlNakl5TWpJeU1qSXlNakl5TWpJeU1qSXlNakl5TWpJeU1qSXlNakl5TWpJeU1qSXlNakl5TWpJeU1qSXkvOEFBRVFnQUdRQWdBd0VpQUFJUkFRTVJBZi9FQUI4QUFBRUZBUUVCQVFFQkFBQUFBQUFBQUFBQkFnTUVCUVlIQ0FrS0MvL0VBTFVRQUFJQkF3TUNCQU1GQlFRRUFBQUJmUUVDQXdBRUVRVVNJVEZCQmhOUllRY2ljUlF5Z1pHaENDTkNzY0VWVXRId0pETmljb0lKQ2hZWEdCa2FKU1luS0NrcU5EVTJOemc1T2tORVJVWkhTRWxLVTFSVlZsZFlXVnBqWkdWbVoyaHBhbk4wZFhaM2VIbDZnNFNGaG9lSWlZcVNrNVNWbHBlWW1acWlvNlNscHFlb3FhcXlzN1MxdHJlNHVickN3OFRGeHNmSXljclMwOVRWMXRmWTJkcmg0dVBrNWVibjZPbnE4Zkx6OVBYMjkvajUrdi9FQUI4QkFBTUJBUUVCQVFFQkFRRUFBQUFBQUFBQkFnTUVCUVlIQ0FrS0MvL0VBTFVSQUFJQkFnUUVBd1FIQlFRRUFBRUNkd0FCQWdNUkJBVWhNUVlTUVZFSFlYRVRJaktCQ0JSQ2thR3h3UWtqTTFMd0ZXSnkwUW9XSkRUaEpmRVhHQmthSmljb0tTbzFOamM0T1RwRFJFVkdSMGhKU2xOVVZWWlhXRmxhWTJSbFptZG9hV3B6ZEhWMmQzaDVlb0tEaElXR2g0aUppcEtUbEpXV2w1aVptcUtqcEtXbXA2aXBxckt6dExXMnQ3aTV1c0xEeE1YR3g4akp5dExUMU5YVzE5aloydUxqNU9YbTUranA2dkx6OVBYMjkvajUrdi9hQUF3REFRQUNFUU1SQUQ4QThBQUpPQU1tdG13OE9YTjNINWtoOHBlMlIxcXBwV29SNmRjK2M5dXN4eHdHN1YwVVBqVU5NaXZaSUVKQU9EVlJ0MUU3OUI4Zmc2MjJlWkxjTXNZKzh4NEZjM3E0c1V1ekhZZ21OT0N4UFUxNmpjMkgvQ1MyVTluRXB0NG9rRGhsYmx6anBYazE3YVNXVjA4RWdJWlRqbWlUVDJCWDZsZXREUklyT1hWSVJmU2JJQXdMR3MraXBHZHI0cDFlMnNOVEQrSDcxd2tzWUVtRHhYR3l5eVR5RjVYTE1lcE5Nb29BLzlrPSI+Cgk8L2ltYWdlPgo8L3N2Zz4=\"}}', 2, '2026-03-12 13:31:35', '2026-03-12 13:31:35'),
(3, 'App\\Models\\CarouselSlide', 2, '75c294b7-b21a-4bef-a753-8545a585e40d', 'background', 'pexels-artbovich-8134762', '01KKHJVFQN8G119BZZ2BMFQW17.jpg', 'image/jpeg', 'public', 'public', 1739440, '[]', '{\"custom_headers\":{\"ContentType\":\"image\\/jpeg\"}}', '{\"webp\":true}', '{\"media_library_original\":{\"urls\":[\"01KKHJVFQN8G119BZZ2BMFQW17___media_library_original_6665_4558.jpg\",\"01KKHJVFQN8G119BZZ2BMFQW17___media_library_original_5576_3813.jpg\",\"01KKHJVFQN8G119BZZ2BMFQW17___media_library_original_4665_3190.jpg\",\"01KKHJVFQN8G119BZZ2BMFQW17___media_library_original_3903_2669.jpg\",\"01KKHJVFQN8G119BZZ2BMFQW17___media_library_original_3265_2233.jpg\",\"01KKHJVFQN8G119BZZ2BMFQW17___media_library_original_2732_1868.jpg\",\"01KKHJVFQN8G119BZZ2BMFQW17___media_library_original_2286_1563.jpg\",\"01KKHJVFQN8G119BZZ2BMFQW17___media_library_original_1912_1308.jpg\",\"01KKHJVFQN8G119BZZ2BMFQW17___media_library_original_1600_1094.jpg\",\"01KKHJVFQN8G119BZZ2BMFQW17___media_library_original_1338_915.jpg\",\"01KKHJVFQN8G119BZZ2BMFQW17___media_library_original_1120_766.jpg\",\"01KKHJVFQN8G119BZZ2BMFQW17___media_library_original_937_641.jpg\",\"01KKHJVFQN8G119BZZ2BMFQW17___media_library_original_784_536.jpg\",\"01KKHJVFQN8G119BZZ2BMFQW17___media_library_original_656_449.jpg\",\"01KKHJVFQN8G119BZZ2BMFQW17___media_library_original_548_375.jpg\"],\"base64svg\":\"data:image\\/svg+xml;base64,PCFET0NUWVBFIHN2ZyBQVUJMSUMgIi0vL1czQy8vRFREIFNWRyAxLjEvL0VOIiAiaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkIj4KPHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHhtbDpzcGFjZT0icHJlc2VydmUiIHg9IjAiCiB5PSIwIiB2aWV3Qm94PSIwIDAgNjY2NSA0NTU4Ij4KCTxpbWFnZSB3aWR0aD0iNjY2NSIgaGVpZ2h0PSI0NTU4IiB4bGluazpocmVmPSJkYXRhOmltYWdlL2pwZWc7YmFzZTY0LC85ai80QUFRU2taSlJnQUJBUUVBWUFCZ0FBRC8vZ0ErUTFKRlFWUlBVam9nWjJRdGFuQmxaeUIyTVM0d0lDaDFjMmx1WnlCSlNrY2dTbEJGUnlCMk5qSXBMQ0JrWldaaGRXeDBJSEYxWVd4cGRIa0svOXNBUXdBSUJnWUhCZ1VJQndjSENRa0lDZ3dVRFF3TEN3d1pFaE1QRkIwYUh4NGRHaHdjSUNRdUp5QWlMQ01jSENnM0tTd3dNVFEwTkI4bk9UMDRNand1TXpReS85c0FRd0VKQ1FrTUN3d1lEUTBZTWlFY0lUSXlNakl5TWpJeU1qSXlNakl5TWpJeU1qSXlNakl5TWpJeU1qSXlNakl5TWpJeU1qSXlNakl5TWpJeU1qSXlNakl5LzhBQUVRZ0FGZ0FnQXdFaUFBSVJBUU1SQWYvRUFCOEFBQUVGQVFFQkFRRUJBQUFBQUFBQUFBQUJBZ01FQlFZSENBa0tDLy9FQUxVUUFBSUJBd01DQkFNRkJRUUVBQUFCZlFFQ0F3QUVFUVVTSVRGQkJoTlJZUWNpY1JReWdaR2hDQ05Dc2NFVlV0SHdKRE5pY29JSkNoWVhHQmthSlNZbktDa3FORFUyTnpnNU9rTkVSVVpIU0VsS1UxUlZWbGRZV1ZwalpHVm1aMmhwYW5OMGRYWjNlSGw2ZzRTRmhvZUlpWXFTazVTVmxwZVltWnFpbzZTbHBxZW9xYXF5czdTMXRyZTR1YnJDdzhURnhzZkl5Y3JTMDlUVjF0ZlkyZHJoNHVQazVlYm42T25xOGZMejlQWDI5L2o1K3YvRUFCOEJBQU1CQVFFQkFRRUJBUUVBQUFBQUFBQUJBZ01FQlFZSENBa0tDLy9FQUxVUkFBSUJBZ1FFQXdRSEJRUUVBQUVDZHdBQkFnTVJCQVVoTVFZU1FWRUhZWEVUSWpLQkNCUkNrYUd4d1Frak0xTHdGV0p5MFFvV0pEVGhKZkVYR0JrYUppY29LU28xTmpjNE9UcERSRVZHUjBoSlNsTlVWVlpYV0ZsYVkyUmxabWRvYVdwemRIVjJkM2g1ZW9LRGhJV0doNGlKaXBLVGxKV1dsNWlabXFLanBLV21wNmlwcXJLenRMVzJ0N2k1dXNMRHhNWEd4OGpKeXRMVDFOWFcxOWpaMnVMajVPWG01K2pwNnZMejlQWDI5L2o1K3YvYUFBd0RBUUFDRVFNUkFEOEE2cVNXV05EOW9qT0JYTzNGNVlTWEJMdDM2VjAydmFna0VER1FBQWpwWG5EdERjenN5a0Q1cTgrcytWM1NPdWl1YmRuZDZQcU5xTUxHdkFycExmV1lJbUhHSzRmUjVMU0IwVjNBSnJYMUNhRlNySXd4WFJRazNDK3pNYXlTbmJvWTNpWlhubUtseml1U2xzZ2grVmlLS0s0cWs1YzcxUFFoQ1BLdEI4U3VIQjNuaWx1NzZjSi9yRGdlOUZGT0U1VzNDVUk5ai8vWiI+Cgk8L2ltYWdlPgo8L3N2Zz4=\"}}', 1, '2026-03-12 13:52:32', '2026-03-12 13:52:56'),
(5, 'App\\Models\\CarouselSlide', 2, '49e995e6-3075-4975-adcf-ac8b80d35ddc', 'image', '92328427-removebg-preview', '01KKHJYGKZS62GQH86EBHMJ04E.png', 'image/png', 'public', 'public', 53559, '[]', '{\"custom_headers\":{\"ContentType\":\"image\\/png\"}}', '{\"webp\":true}', '{\"media_library_original\":{\"urls\":[\"01KKHJYGKZS62GQH86EBHMJ04E___media_library_original_500_500.png\",\"01KKHJYGKZS62GQH86EBHMJ04E___media_library_original_418_418.png\",\"01KKHJYGKZS62GQH86EBHMJ04E___media_library_original_349_349.png\",\"01KKHJYGKZS62GQH86EBHMJ04E___media_library_original_292_292.png\",\"01KKHJYGKZS62GQH86EBHMJ04E___media_library_original_244_244.png\"],\"base64svg\":\"data:image\\/svg+xml;base64,PCFET0NUWVBFIHN2ZyBQVUJMSUMgIi0vL1czQy8vRFREIFNWRyAxLjEvL0VOIiAiaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkIj4KPHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHhtbDpzcGFjZT0icHJlc2VydmUiIHg9IjAiCiB5PSIwIiB2aWV3Qm94PSIwIDAgNTAwIDUwMCI+Cgk8aW1hZ2Ugd2lkdGg9IjUwMCIgaGVpZ2h0PSI1MDAiIHhsaW5rOmhyZWY9ImRhdGE6aW1hZ2UvanBlZztiYXNlNjQsLzlqLzRBQVFTa1pKUmdBQkFRRUFZQUJnQUFELy9nQStRMUpGUVZSUFVqb2daMlF0YW5CbFp5QjJNUzR3SUNoMWMybHVaeUJKU2tjZ1NsQkZSeUIyTmpJcExDQmtaV1poZFd4MElIRjFZV3hwZEhrSy85c0FRd0FJQmdZSEJnVUlCd2NIQ1FrSUNnd1VEUXdMQ3d3WkVoTVBGQjBhSHg0ZEdod2NJQ1F1SnlBaUxDTWNIQ2czS1N3d01UUTBOQjhuT1QwNE1qd3VNelF5LzlzQVF3RUpDUWtNQ3d3WURRMFlNaUVjSVRJeU1qSXlNakl5TWpJeU1qSXlNakl5TWpJeU1qSXlNakl5TWpJeU1qSXlNakl5TWpJeU1qSXlNakl5TWpJeU1qSXkvOEFBRVFnQUlBQWdBd0VpQUFJUkFRTVJBZi9FQUI4QUFBRUZBUUVCQVFFQkFBQUFBQUFBQUFBQkFnTUVCUVlIQ0FrS0MvL0VBTFVRQUFJQkF3TUNCQU1GQlFRRUFBQUJmUUVDQXdBRUVRVVNJVEZCQmhOUllRY2ljUlF5Z1pHaENDTkNzY0VWVXRId0pETmljb0lKQ2hZWEdCa2FKU1luS0NrcU5EVTJOemc1T2tORVJVWkhTRWxLVTFSVlZsZFlXVnBqWkdWbVoyaHBhbk4wZFhaM2VIbDZnNFNGaG9lSWlZcVNrNVNWbHBlWW1acWlvNlNscHFlb3FhcXlzN1MxdHJlNHVickN3OFRGeHNmSXljclMwOVRWMXRmWTJkcmg0dVBrNWVibjZPbnE4Zkx6OVBYMjkvajUrdi9FQUI4QkFBTUJBUUVCQVFFQkFRRUFBQUFBQUFBQkFnTUVCUVlIQ0FrS0MvL0VBTFVSQUFJQkFnUUVBd1FIQlFRRUFBRUNkd0FCQWdNUkJBVWhNUVlTUVZFSFlYRVRJaktCQ0JSQ2thR3h3UWtqTTFMd0ZXSnkwUW9XSkRUaEpmRVhHQmthSmljb0tTbzFOamM0T1RwRFJFVkdSMGhKU2xOVVZWWlhXRmxhWTJSbFptZG9hV3B6ZEhWMmQzaDVlb0tEaElXR2g0aUppcEtUbEpXV2w1aVptcUtqcEtXbXA2aXBxckt6dExXMnQ3aTV1c0xEeE1YR3g4akp5dExUMU5YVzE5aloydUxqNU9YbTUranA2dkx6OVBYMjkvajUrdi9hQUF3REFRQUNFUU1SQUQ4QStmNks2Ync3cDF0ZFdOeExOR0daVGdacXROWndpVWdJQU0wQVlWS1FSMUJGYldueFFSK0liWlpFRFJaR1ZyVDhkdzJrZDdidmF4Q05XWGtDZ0NUd1pmNlpCYlhGdmZ6ZVdXNUJQU2k4azByN1EzbDNLbGM5YTQyaWdEWjg2Rk5iaWtSd1l3ZXRXUEZOOUZlVFFDTmdkaTRPSzU2aWdELy8yUT09Ij4KCTwvaW1hZ2U+Cjwvc3ZnPg==\"}}', 2, '2026-03-12 13:54:11', '2026-03-12 13:54:11'),
(6, 'App\\Models\\Product', 1, 'be3b8643-481e-4752-a5c8-3955d86a222c', 'image', 'f7421b91dd0f71a910977fcfc720dbb1', '01KKHK69SM40HGST5HNSJF6DB6.png', 'image/png', 'public', 'public', 73406, '[]', '{\"custom_headers\":{\"ContentType\":\"image\\/png\"}}', '{\"webp\":true}', '{\"media_library_original\":{\"urls\":[\"01KKHK69SM40HGST5HNSJF6DB6___media_library_original_400_310.png\",\"01KKHK69SM40HGST5HNSJF6DB6___media_library_original_334_259.png\",\"01KKHK69SM40HGST5HNSJF6DB6___media_library_original_280_217.png\",\"01KKHK69SM40HGST5HNSJF6DB6___media_library_original_234_181.png\",\"01KKHK69SM40HGST5HNSJF6DB6___media_library_original_195_151.png\",\"01KKHK69SM40HGST5HNSJF6DB6___media_library_original_163_126.png\"],\"base64svg\":\"data:image\\/svg+xml;base64,PCFET0NUWVBFIHN2ZyBQVUJMSUMgIi0vL1czQy8vRFREIFNWRyAxLjEvL0VOIiAiaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkIj4KPHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHhtbDpzcGFjZT0icHJlc2VydmUiIHg9IjAiCiB5PSIwIiB2aWV3Qm94PSIwIDAgNDAwIDMxMCI+Cgk8aW1hZ2Ugd2lkdGg9IjQwMCIgaGVpZ2h0PSIzMTAiIHhsaW5rOmhyZWY9ImRhdGE6aW1hZ2UvanBlZztiYXNlNjQsLzlqLzRBQVFTa1pKUmdBQkFRRUFZQUJnQUFELy9nQStRMUpGUVZSUFVqb2daMlF0YW5CbFp5QjJNUzR3SUNoMWMybHVaeUJKU2tjZ1NsQkZSeUIyTmpJcExDQmtaV1poZFd4MElIRjFZV3hwZEhrSy85c0FRd0FJQmdZSEJnVUlCd2NIQ1FrSUNnd1VEUXdMQ3d3WkVoTVBGQjBhSHg0ZEdod2NJQ1F1SnlBaUxDTWNIQ2czS1N3d01UUTBOQjhuT1QwNE1qd3VNelF5LzlzQVF3RUpDUWtNQ3d3WURRMFlNaUVjSVRJeU1qSXlNakl5TWpJeU1qSXlNakl5TWpJeU1qSXlNakl5TWpJeU1qSXlNakl5TWpJeU1qSXlNakl5TWpJeU1qSXkvOEFBRVFnQUdRQWdBd0VpQUFJUkFRTVJBZi9FQUI4QUFBRUZBUUVCQVFFQkFBQUFBQUFBQUFBQkFnTUVCUVlIQ0FrS0MvL0VBTFVRQUFJQkF3TUNCQU1GQlFRRUFBQUJmUUVDQXdBRUVRVVNJVEZCQmhOUllRY2ljUlF5Z1pHaENDTkNzY0VWVXRId0pETmljb0lKQ2hZWEdCa2FKU1luS0NrcU5EVTJOemc1T2tORVJVWkhTRWxLVTFSVlZsZFlXVnBqWkdWbVoyaHBhbk4wZFhaM2VIbDZnNFNGaG9lSWlZcVNrNVNWbHBlWW1acWlvNlNscHFlb3FhcXlzN1MxdHJlNHVickN3OFRGeHNmSXljclMwOVRWMXRmWTJkcmg0dVBrNWVibjZPbnE4Zkx6OVBYMjkvajUrdi9FQUI4QkFBTUJBUUVCQVFFQkFRRUFBQUFBQUFBQkFnTUVCUVlIQ0FrS0MvL0VBTFVSQUFJQkFnUUVBd1FIQlFRRUFBRUNkd0FCQWdNUkJBVWhNUVlTUVZFSFlYRVRJaktCQ0JSQ2thR3h3UWtqTTFMd0ZXSnkwUW9XSkRUaEpmRVhHQmthSmljb0tTbzFOamM0T1RwRFJFVkdSMGhKU2xOVVZWWlhXRmxhWTJSbFptZG9hV3B6ZEhWMmQzaDVlb0tEaElXR2g0aUppcEtUbEpXV2w1aVptcUtqcEtXbXA2aXBxckt6dExXMnQ3aTV1c0xEeE1YR3g4akp5dExUMU5YVzE5aloydUxqNU9YbTUranA2dkx6OVBYMjkvajUrdi9hQUF3REFRQUNFUU1SQUQ4QThBQUpPQU1tdG13OE9YTjNINWtoOHBlMlIxcXBwV29SNmRjK2M5dXN4eHdHN1YwVVBqVU5NaXZaSUVKQU9EVlJ0MUU3OUI4Zmc2MjJlWkxjTXNZKzh4NEZjM3E0c1V1ekhZZ21OT0N4UFUxNmpjMkgvQ1MyVTluRXB0NG9rRGhsYmx6anBYazE3YVNXVjA4RWdJWlRqbWlUVDJCWDZsZXREUklyT1hWSVJmU2JJQXdMR3MraXBHZHI0cDFlMnNOVEQrSDcxd2tzWUVtRHhYR3l5eVR5RjVYTE1lcE5Nb29BLzlrPSI+Cgk8L2ltYWdlPgo8L3N2Zz4=\"}}', 1, '2026-03-12 13:58:26', '2026-03-12 13:58:26'),
(7, 'App\\Models\\Product', 1, '3cb029d5-df58-4b70-b27a-e1b7edd09d1c', 'downloads', 'ტესტ', '92328427-removebg-preview.png', 'image/png', 'public', 'public', 53559, '[]', '[]', '{\"webp\":true}', '[]', 2, '2026-03-12 13:58:26', '2026-03-12 13:58:26'),
(8, 'App\\Models\\Product', 1, 'f512de6a-c926-4058-8603-ea4c862ce71b', 'downloads', 'ტესტ', '92328427-removebg-preview.png', 'image/png', 'public', 'public', 53559, '[]', '[]', '{\"webp\":true}', '[]', 3, '2026-03-12 14:01:55', '2026-03-12 14:01:55'),
(9, 'App\\Models\\Product', 1, 'f30bdaca-9859-4ed8-82d0-969316c38412', 'downloads', 'ტესტ', '92328427.webp', 'image/webp', 'public', 'public', 8912, '[]', '[]', '{\"webp\":true}', '[]', 4, '2026-03-12 14:03:22', '2026-03-12 14:03:22'),
(10, 'App\\Models\\Product', 1, 'c412dbcc-eca6-4c84-b6d5-cfc5dfc74138', 'downloads', 'ტესტ', '92328427-removebg-preview.png', 'image/png', 'public', 'public', 53559, '[]', '[]', '{\"webp\":true}', '[]', 5, '2026-03-12 14:07:49', '2026-03-12 14:07:50'),
(13, 'App\\Models\\SiteSetting', 1, 'a4cedfae-e659-4d80-b823-801fbc7321c3', 'favicon', 'logo', '01KKHMXFZSHQP5PFRS9QKFVEDM.png', 'image/png', 'public', 'public', 124015, '[]', '{\"custom_headers\":{\"ContentType\":\"image\\/png\"}}', '{\"webp\":true}', '{\"media_library_original\":{\"urls\":[\"01KKHMXFZSHQP5PFRS9QKFVEDM___media_library_original_500_500.png\",\"01KKHMXFZSHQP5PFRS9QKFVEDM___media_library_original_418_418.png\",\"01KKHMXFZSHQP5PFRS9QKFVEDM___media_library_original_350_350.png\",\"01KKHMXFZSHQP5PFRS9QKFVEDM___media_library_original_292_292.png\",\"01KKHMXFZSHQP5PFRS9QKFVEDM___media_library_original_244_244.png\",\"01KKHMXFZSHQP5PFRS9QKFVEDM___media_library_original_204_204.png\",\"01KKHMXFZSHQP5PFRS9QKFVEDM___media_library_original_171_171.png\"],\"base64svg\":\"data:image\\/svg+xml;base64,PCFET0NUWVBFIHN2ZyBQVUJMSUMgIi0vL1czQy8vRFREIFNWRyAxLjEvL0VOIiAiaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkIj4KPHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHhtbDpzcGFjZT0icHJlc2VydmUiIHg9IjAiCiB5PSIwIiB2aWV3Qm94PSIwIDAgNTAwIDUwMCI+Cgk8aW1hZ2Ugd2lkdGg9IjUwMCIgaGVpZ2h0PSI1MDAiIHhsaW5rOmhyZWY9ImRhdGE6aW1hZ2UvanBlZztiYXNlNjQsLzlqLzRBQVFTa1pKUmdBQkFRRUFZQUJnQUFELy9nQStRMUpGUVZSUFVqb2daMlF0YW5CbFp5QjJNUzR3SUNoMWMybHVaeUJKU2tjZ1NsQkZSeUIyTmpJcExDQmtaV1poZFd4MElIRjFZV3hwZEhrSy85c0FRd0FJQmdZSEJnVUlCd2NIQ1FrSUNnd1VEUXdMQ3d3WkVoTVBGQjBhSHg0ZEdod2NJQ1F1SnlBaUxDTWNIQ2czS1N3d01UUTBOQjhuT1QwNE1qd3VNelF5LzlzQVF3RUpDUWtNQ3d3WURRMFlNaUVjSVRJeU1qSXlNakl5TWpJeU1qSXlNakl5TWpJeU1qSXlNakl5TWpJeU1qSXlNakl5TWpJeU1qSXlNakl5TWpJeU1qSXkvOEFBRVFnQUlBQWdBd0VpQUFJUkFRTVJBZi9FQUI4QUFBRUZBUUVCQVFFQkFBQUFBQUFBQUFBQkFnTUVCUVlIQ0FrS0MvL0VBTFVRQUFJQkF3TUNCQU1GQlFRRUFBQUJmUUVDQXdBRUVRVVNJVEZCQmhOUllRY2ljUlF5Z1pHaENDTkNzY0VWVXRId0pETmljb0lKQ2hZWEdCa2FKU1luS0NrcU5EVTJOemc1T2tORVJVWkhTRWxLVTFSVlZsZFlXVnBqWkdWbVoyaHBhbk4wZFhaM2VIbDZnNFNGaG9lSWlZcVNrNVNWbHBlWW1acWlvNlNscHFlb3FhcXlzN1MxdHJlNHVickN3OFRGeHNmSXljclMwOVRWMXRmWTJkcmg0dVBrNWVibjZPbnE4Zkx6OVBYMjkvajUrdi9FQUI4QkFBTUJBUUVCQVFFQkFRRUFBQUFBQUFBQkFnTUVCUVlIQ0FrS0MvL0VBTFVSQUFJQkFnUUVBd1FIQlFRRUFBRUNkd0FCQWdNUkJBVWhNUVlTUVZFSFlYRVRJaktCQ0JSQ2thR3h3UWtqTTFMd0ZXSnkwUW9XSkRUaEpmRVhHQmthSmljb0tTbzFOamM0T1RwRFJFVkdSMGhKU2xOVVZWWlhXRmxhWTJSbFptZG9hV3B6ZEhWMmQzaDVlb0tEaElXR2g0aUppcEtUbEpXV2w1aVptcUtqcEtXbXA2aXBxckt6dExXMnQ3aTV1c0xEeE1YR3g4akp5dExUMU5YVzE5aloydUxqNU9YbTUranA2dkx6OVBYMjkvajUrdi9hQUF3REFRQUNFUU1SQUQ4QStmNmtTRm42VTFIMkhwbXJWcTYrWU1uQTc1cHBKaWJGR21Ua0RiaG1QUlIxTlZaSW5pY3JJaFZoMklycUxhNHRJSklybnpsQ0p5dzduMnJMMXZXVjFTZk1jQ29nNkhITlpPVFUrVmFvcFdjYnN5VklEY2pOU282TElDeWdqMHFHaXRMaU4yUFVOSUtGSnJFa1k2ZzFuNmpMWnlPdjJPSm8xQTV5YXBVVm1xYVR1aW5LNnNmLzJRPT0iPgoJPC9pbWFnZT4KPC9zdmc+\"}}', 3, '2026-03-12 14:28:34', '2026-03-12 14:28:35'),
(15, 'App\\Models\\Service', 1, '0fa6a328-3084-4358-920e-6718177a660a', 'image', 'install', '01KKHN9NWN545NVKAZSRC3PB76.jpg', 'image/jpeg', 'public', 'public', 41803, '[]', '{\"custom_headers\":{\"ContentType\":\"image\\/jpeg\"}}', '{\"webp\":true}', '[]', 1, '2026-03-12 14:35:14', '2026-03-12 14:35:14'),
(16, 'App\\Models\\AboutSection', 1, '86dc7038-6a02-498d-a38d-b9a20c5f9686', 'about_image', '503754099_715740500825324_6702817420279259120_n', '01KKHPAQG2YNF567FACC7W5HCS.jpg', 'image/jpeg', 'public', 'public', 133943, '[]', '{\"custom_headers\":{\"ContentType\":\"image\\/jpeg\"}}', '{\"webp\":true}', '{\"media_library_original\":{\"urls\":[\"01KKHPAQG2YNF567FACC7W5HCS___media_library_original_1440_945.jpg\",\"01KKHPAQG2YNF567FACC7W5HCS___media_library_original_1204_790.jpg\",\"01KKHPAQG2YNF567FACC7W5HCS___media_library_original_1007_661.jpg\",\"01KKHPAQG2YNF567FACC7W5HCS___media_library_original_843_553.jpg\",\"01KKHPAQG2YNF567FACC7W5HCS___media_library_original_705_463.jpg\",\"01KKHPAQG2YNF567FACC7W5HCS___media_library_original_590_387.jpg\",\"01KKHPAQG2YNF567FACC7W5HCS___media_library_original_493_324.jpg\",\"01KKHPAQG2YNF567FACC7W5HCS___media_library_original_413_271.jpg\"],\"base64svg\":\"data:image\\/svg+xml;base64,PCFET0NUWVBFIHN2ZyBQVUJMSUMgIi0vL1czQy8vRFREIFNWRyAxLjEvL0VOIiAiaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkIj4KPHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHhtbDpzcGFjZT0icHJlc2VydmUiIHg9IjAiCiB5PSIwIiB2aWV3Qm94PSIwIDAgMTQ0MCA5NDUiPgoJPGltYWdlIHdpZHRoPSIxNDQwIiBoZWlnaHQ9Ijk0NSIgeGxpbms6aHJlZj0iZGF0YTppbWFnZS9qcGVnO2Jhc2U2NCwvOWovNEFBUVNrWkpSZ0FCQVFFQVlBQmdBQUQvL2dBK1ExSkZRVlJQVWpvZ1oyUXRhbkJsWnlCMk1TNHdJQ2gxYzJsdVp5QkpTa2NnU2xCRlJ5QjJOaklwTENCa1pXWmhkV3gwSUhGMVlXeHBkSGtLLzlzQVF3QUlCZ1lIQmdVSUJ3Y0hDUWtJQ2d3VURRd0xDd3daRWhNUEZCMGFIeDRkR2h3Y0lDUXVKeUFpTENNY0hDZzNLU3d3TVRRME5COG5PVDA0TWp3dU16UXkvOXNBUXdFSkNRa01Dd3dZRFEwWU1pRWNJVEl5TWpJeU1qSXlNakl5TWpJeU1qSXlNakl5TWpJeU1qSXlNakl5TWpJeU1qSXlNakl5TWpJeU1qSXlNakl5TWpJeS84QUFFUWdBRlFBZ0F3RWlBQUlSQVFNUkFmL0VBQjhBQUFFRkFRRUJBUUVCQUFBQUFBQUFBQUFCQWdNRUJRWUhDQWtLQy8vRUFMVVFBQUlCQXdNQ0JBTUZCUVFFQUFBQmZRRUNBd0FFRVFVU0lURkJCaE5SWVFjaWNSUXlnWkdoQ0NOQ3NjRVZVdEh3SkROaWNvSUpDaFlYR0JrYUpTWW5LQ2txTkRVMk56ZzVPa05FUlVaSFNFbEtVMVJWVmxkWVdWcGpaR1ZtWjJocGFuTjBkWFozZUhsNmc0U0Zob2VJaVlxU2s1U1ZscGVZbVpxaW82U2xwcWVvcWFxeXM3UzF0cmU0dWJyQ3c4VEZ4c2ZJeWNyUzA5VFYxdGZZMmRyaDR1UGs1ZWJuNk9ucThmTHo5UFgyOS9qNSt2L0VBQjhCQUFNQkFRRUJBUUVCQVFFQUFBQUFBQUFCQWdNRUJRWUhDQWtLQy8vRUFMVVJBQUlCQWdRRUF3UUhCUVFFQUFFQ2R3QUJBZ01SQkFVaE1RWVNRVkVIWVhFVElqS0JDQlJDa2FHeHdRa2pNMUx3RldKeTBRb1dKRFRoSmZFWEdCa2FKaWNvS1NvMU5qYzRPVHBEUkVWR1IwaEpTbE5VVlZaWFdGbGFZMlJsWm1kb2FXcHpkSFYyZDNoNWVvS0RoSVdHaDRpSmlwS1RsSldXbDVpWm1xS2pwS1dtcDZpcHFyS3p0TFcydDdpNXVzTER4TVhHeDhqSnl0TFQxTlhXMTlqWjJ1TGo1T1htNStqcDZ2THo5UFgyOS9qNSt2L2FBQXdEQVFBQ0VRTVJBRDhBOWdzYkxmYks0cGtrY3ZtRWJjQVZvYVkyTEZhaWxFcGM0SEZFdFFqb1ZZa2xFZ0JYSXF6cVZ1aTJSYkhOT2lFb2NFamluNm1jMkxVSldCdTVTc1ozVzJVQ3JrYzdkd0RSUlRFSzl3Mk9BS3AzMDdHMFlHaWlnRC8vMlE9PSI+Cgk8L2ltYWdlPgo8L3N2Zz4=\"}}', 1, '2026-03-12 14:53:17', '2026-03-12 14:53:17'),
(22, 'App\\Models\\Product', 2, '5f88ed89-fb42-4d3c-8ea4-e0a6333bb3c0', 'image', 'komplekt-ip-videonabljudenija-na-4-kamery-s-monitorom-tvt-ip-video-kit-4x5mp-b-wifi-monitor-4-cilindricheskie-5mp-wifi-videokamery-4-kanal-nyj-8mp-videoregistrator-fullhd-monitor', '01KKHQRH36J7HZ1PA0J69811K8.jpg', 'image/jpeg', 'public', 'public', 92159, '[]', '{\"custom_headers\":{\"ContentType\":\"image\\/jpeg\"}}', '{\"webp\":true}', '{\"media_library_original\":{\"urls\":[\"01KKHQRH36J7HZ1PA0J69811K8___media_library_original_1000_1000.jpg\",\"01KKHQRH36J7HZ1PA0J69811K8___media_library_original_836_836.jpg\",\"01KKHQRH36J7HZ1PA0J69811K8___media_library_original_700_700.jpg\",\"01KKHQRH36J7HZ1PA0J69811K8___media_library_original_585_585.jpg\",\"01KKHQRH36J7HZ1PA0J69811K8___media_library_original_489_489.jpg\",\"01KKHQRH36J7HZ1PA0J69811K8___media_library_original_409_409.jpg\",\"01KKHQRH36J7HZ1PA0J69811K8___media_library_original_342_342.jpg\"],\"base64svg\":\"data:image\\/svg+xml;base64,PCFET0NUWVBFIHN2ZyBQVUJMSUMgIi0vL1czQy8vRFREIFNWRyAxLjEvL0VOIiAiaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkIj4KPHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHhtbDpzcGFjZT0icHJlc2VydmUiIHg9IjAiCiB5PSIwIiB2aWV3Qm94PSIwIDAgMTAwMCAxMDAwIj4KCTxpbWFnZSB3aWR0aD0iMTAwMCIgaGVpZ2h0PSIxMDAwIiB4bGluazpocmVmPSJkYXRhOmltYWdlL2pwZWc7YmFzZTY0LC85ai80QUFRU2taSlJnQUJBUUVBWUFCZ0FBRC8vZ0ErUTFKRlFWUlBVam9nWjJRdGFuQmxaeUIyTVM0d0lDaDFjMmx1WnlCSlNrY2dTbEJGUnlCMk5qSXBMQ0JrWldaaGRXeDBJSEYxWVd4cGRIa0svOXNBUXdBSUJnWUhCZ1VJQndjSENRa0lDZ3dVRFF3TEN3d1pFaE1QRkIwYUh4NGRHaHdjSUNRdUp5QWlMQ01jSENnM0tTd3dNVFEwTkI4bk9UMDRNand1TXpReS85c0FRd0VKQ1FrTUN3d1lEUTBZTWlFY0lUSXlNakl5TWpJeU1qSXlNakl5TWpJeU1qSXlNakl5TWpJeU1qSXlNakl5TWpJeU1qSXlNakl5TWpJeU1qSXlNakl5LzhBQUVRZ0FJQUFnQXdFaUFBSVJBUU1SQWYvRUFCOEFBQUVGQVFFQkFRRUJBQUFBQUFBQUFBQUJBZ01FQlFZSENBa0tDLy9FQUxVUUFBSUJBd01DQkFNRkJRUUVBQUFCZlFFQ0F3QUVFUVVTSVRGQkJoTlJZUWNpY1JReWdaR2hDQ05Dc2NFVlV0SHdKRE5pY29JSkNoWVhHQmthSlNZbktDa3FORFUyTnpnNU9rTkVSVVpIU0VsS1UxUlZWbGRZV1ZwalpHVm1aMmhwYW5OMGRYWjNlSGw2ZzRTRmhvZUlpWXFTazVTVmxwZVltWnFpbzZTbHBxZW9xYXF5czdTMXRyZTR1YnJDdzhURnhzZkl5Y3JTMDlUVjF0ZlkyZHJoNHVQazVlYm42T25xOGZMejlQWDI5L2o1K3YvRUFCOEJBQU1CQVFFQkFRRUJBUUVBQUFBQUFBQUJBZ01FQlFZSENBa0tDLy9FQUxVUkFBSUJBZ1FFQXdRSEJRUUVBQUVDZHdBQkFnTVJCQVVoTVFZU1FWRUhZWEVUSWpLQkNCUkNrYUd4d1Frak0xTHdGV0p5MFFvV0pEVGhKZkVYR0JrYUppY29LU28xTmpjNE9UcERSRVZHUjBoSlNsTlVWVlpYV0ZsYVkyUmxabWRvYVdwemRIVjJkM2g1ZW9LRGhJV0doNGlKaXBLVGxKV1dsNWlabXFLanBLV21wNmlwcXJLenRMVzJ0N2k1dXNMRHhNWEd4OGpKeXRMVDFOWFcxOWpaMnVMajVPWG01K2pwNnZMejlQWDI5L2o1K3YvYUFBd0RBUUFDRVFNUkFEOEE5ZDF6eFBCb3poSmdlYXdmK0ZoMlpQQjcxYjFtSzExTzc4bTVVWkhUTlpjUGdXQ2FYN2cyRTlSV3JwU1N1eUZOUFkyTER4amJYOXg1TWJmTlhRMmQyMDdFRVl4WFA2ZDRLdExLOEU2ZFJYVnhRSkdQbEdLeUxQT2ZFemZaN3NzWjFqSTVITlU5TThmUjJUZVhjVEJnT001cmE4VitCWDEyZnprblpENkExd2Q3OEtkUmp5WTVTMzQxdkt2S1VlVm1hcHBPNlBSTFQ0ZzZUSU10TW9QMXJhMC94UHAycFNlWGJ6S3plZ05lRVQrQTlYdGhqbjg2OUQrSG5neWZUQjlydW5KYzlpYXdORC8vMlE9PSI+Cgk8L2ltYWdlPgo8L3N2Zz4=\"}}', 1, '2026-03-12 15:18:17', '2026-03-12 15:18:18'),
(23, 'App\\Models\\SiteSetting', 1, '22cd4d56-305c-43b9-92ff-d87de15e40b9', 'logo', 'Adobe Express - file', '01KKHR7Q8HHWG59DNJCGNQCQJX.png', 'image/png', 'public', 'public', 291894, '[]', '{\"custom_headers\":{\"ContentType\":\"image\\/png\"}}', '{\"webp\":true}', '{\"media_library_original\":{\"urls\":[\"01KKHR7Q8HHWG59DNJCGNQCQJX___media_library_original_1024_1024.png\",\"01KKHR7Q8HHWG59DNJCGNQCQJX___media_library_original_856_856.png\",\"01KKHR7Q8HHWG59DNJCGNQCQJX___media_library_original_716_716.png\",\"01KKHR7Q8HHWG59DNJCGNQCQJX___media_library_original_599_599.png\",\"01KKHR7Q8HHWG59DNJCGNQCQJX___media_library_original_501_501.png\",\"01KKHR7Q8HHWG59DNJCGNQCQJX___media_library_original_419_419.png\",\"01KKHR7Q8HHWG59DNJCGNQCQJX___media_library_original_351_351.png\",\"01KKHR7Q8HHWG59DNJCGNQCQJX___media_library_original_293_293.png\",\"01KKHR7Q8HHWG59DNJCGNQCQJX___media_library_original_245_245.png\",\"01KKHR7Q8HHWG59DNJCGNQCQJX___media_library_original_205_205.png\"],\"base64svg\":\"data:image\\/svg+xml;base64,PCFET0NUWVBFIHN2ZyBQVUJMSUMgIi0vL1czQy8vRFREIFNWRyAxLjEvL0VOIiAiaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkIj4KPHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHhtbDpzcGFjZT0icHJlc2VydmUiIHg9IjAiCiB5PSIwIiB2aWV3Qm94PSIwIDAgMTAyNCAxMDI0Ij4KCTxpbWFnZSB3aWR0aD0iMTAyNCIgaGVpZ2h0PSIxMDI0IiB4bGluazpocmVmPSJkYXRhOmltYWdlL2pwZWc7YmFzZTY0LC85ai80QUFRU2taSlJnQUJBUUVBWUFCZ0FBRC8vZ0ErUTFKRlFWUlBVam9nWjJRdGFuQmxaeUIyTVM0d0lDaDFjMmx1WnlCSlNrY2dTbEJGUnlCMk5qSXBMQ0JrWldaaGRXeDBJSEYxWVd4cGRIa0svOXNBUXdBSUJnWUhCZ1VJQndjSENRa0lDZ3dVRFF3TEN3d1pFaE1QRkIwYUh4NGRHaHdjSUNRdUp5QWlMQ01jSENnM0tTd3dNVFEwTkI4bk9UMDRNand1TXpReS85c0FRd0VKQ1FrTUN3d1lEUTBZTWlFY0lUSXlNakl5TWpJeU1qSXlNakl5TWpJeU1qSXlNakl5TWpJeU1qSXlNakl5TWpJeU1qSXlNakl5TWpJeU1qSXlNakl5LzhBQUVRZ0FJQUFnQXdFaUFBSVJBUU1SQWYvRUFCOEFBQUVGQVFFQkFRRUJBQUFBQUFBQUFBQUJBZ01FQlFZSENBa0tDLy9FQUxVUUFBSUJBd01DQkFNRkJRUUVBQUFCZlFFQ0F3QUVFUVVTSVRGQkJoTlJZUWNpY1JReWdaR2hDQ05Dc2NFVlV0SHdKRE5pY29JSkNoWVhHQmthSlNZbktDa3FORFUyTnpnNU9rTkVSVVpIU0VsS1UxUlZWbGRZV1ZwalpHVm1aMmhwYW5OMGRYWjNlSGw2ZzRTRmhvZUlpWXFTazVTVmxwZVltWnFpbzZTbHBxZW9xYXF5czdTMXRyZTR1YnJDdzhURnhzZkl5Y3JTMDlUVjF0ZlkyZHJoNHVQazVlYm42T25xOGZMejlQWDI5L2o1K3YvRUFCOEJBQU1CQVFFQkFRRUJBUUVBQUFBQUFBQUJBZ01FQlFZSENBa0tDLy9FQUxVUkFBSUJBZ1FFQXdRSEJRUUVBQUVDZHdBQkFnTVJCQVVoTVFZU1FWRUhZWEVUSWpLQkNCUkNrYUd4d1Frak0xTHdGV0p5MFFvV0pEVGhKZkVYR0JrYUppY29LU28xTmpjNE9UcERSRVZHUjBoSlNsTlVWVlpYV0ZsYVkyUmxabWRvYVdwemRIVjJkM2g1ZW9LRGhJV0doNGlKaXBLVGxKV1dsNWlabXFLanBLV21wNmlwcXJLenRMVzJ0N2k1dXNMRHhNWEd4OGpKeXRMVDFOWFcxOWpaMnVMajVPWG01K2pwNnZMejlQWDI5L2o1K3YvYUFBd0RBUUFDRVFNUkFEOEErZjhBclU2V2tycnVBR0tqams4czV3RFY2MW5Rc0F6N1ZIVVZjRW51VEp0YkFOR3VUQVpSdHdPMmVhb3lSUEV4VjBLa2VvcnE0TDIwZ2VLVHoxOHBPV1h1YXlkYjFwZFRsSWpnVkl4MDQ1ckNVcEtweXBYWGN1T3Nic3g2S0tLMEVGRkZGQUgvMlE9PSI+Cgk8L2ltYWdlPgo8L3N2Zz4=\"}}', 4, '2026-03-12 15:26:35', '2026-03-12 15:26:37'),
(24, 'App\\Models\\CarouselSlide', 3, 'b9a135da-a059-4c28-98c3-e2f63ee87fc4', 'background', 'ChatGPT Image 12 мар. 2026 г., 23_28_51', '01KKHRP15XAD0T792BDVNRVARE.png', 'image/png', 'public', 'public', 2725204, '[]', '{\"custom_headers\":{\"ContentType\":\"image\\/png\"}}', '{\"webp\":true}', '{\"media_library_original\":{\"urls\":[\"01KKHRP15XAD0T792BDVNRVARE___media_library_original_1536_1024.png\",\"01KKHRP15XAD0T792BDVNRVARE___media_library_original_1285_857.png\",\"01KKHRP15XAD0T792BDVNRVARE___media_library_original_1075_717.png\",\"01KKHRP15XAD0T792BDVNRVARE___media_library_original_899_599.png\",\"01KKHRP15XAD0T792BDVNRVARE___media_library_original_752_501.png\",\"01KKHRP15XAD0T792BDVNRVARE___media_library_original_629_419.png\",\"01KKHRP15XAD0T792BDVNRVARE___media_library_original_526_351.png\",\"01KKHRP15XAD0T792BDVNRVARE___media_library_original_440_293.png\",\"01KKHRP15XAD0T792BDVNRVARE___media_library_original_368_245.png\",\"01KKHRP15XAD0T792BDVNRVARE___media_library_original_308_205.png\",\"01KKHRP15XAD0T792BDVNRVARE___media_library_original_258_172.png\",\"01KKHRP15XAD0T792BDVNRVARE___media_library_original_215_143.png\",\"01KKHRP15XAD0T792BDVNRVARE___media_library_original_180_120.png\",\"01KKHRP15XAD0T792BDVNRVARE___media_library_original_151_101.png\",\"01KKHRP15XAD0T792BDVNRVARE___media_library_original_126_84.png\",\"01KKHRP15XAD0T792BDVNRVARE___media_library_original_105_70.png\"],\"base64svg\":\"data:image\\/svg+xml;base64,PCFET0NUWVBFIHN2ZyBQVUJMSUMgIi0vL1czQy8vRFREIFNWRyAxLjEvL0VOIiAiaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkIj4KPHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHhtbDpzcGFjZT0icHJlc2VydmUiIHg9IjAiCiB5PSIwIiB2aWV3Qm94PSIwIDAgMTUzNiAxMDI0Ij4KCTxpbWFnZSB3aWR0aD0iMTUzNiIgaGVpZ2h0PSIxMDI0IiB4bGluazpocmVmPSJkYXRhOmltYWdlL2pwZWc7YmFzZTY0LC85ai80QUFRU2taSlJnQUJBUUVBWUFCZ0FBRC8vZ0ErUTFKRlFWUlBVam9nWjJRdGFuQmxaeUIyTVM0d0lDaDFjMmx1WnlCSlNrY2dTbEJGUnlCMk5qSXBMQ0JrWldaaGRXeDBJSEYxWVd4cGRIa0svOXNBUXdBSUJnWUhCZ1VJQndjSENRa0lDZ3dVRFF3TEN3d1pFaE1QRkIwYUh4NGRHaHdjSUNRdUp5QWlMQ01jSENnM0tTd3dNVFEwTkI4bk9UMDRNand1TXpReS85c0FRd0VKQ1FrTUN3d1lEUTBZTWlFY0lUSXlNakl5TWpJeU1qSXlNakl5TWpJeU1qSXlNakl5TWpJeU1qSXlNakl5TWpJeU1qSXlNakl5TWpJeU1qSXlNakl5LzhBQUVRZ0FGUUFnQXdFaUFBSVJBUU1SQWYvRUFCOEFBQUVGQVFFQkFRRUJBQUFBQUFBQUFBQUJBZ01FQlFZSENBa0tDLy9FQUxVUUFBSUJBd01DQkFNRkJRUUVBQUFCZlFFQ0F3QUVFUVVTSVRGQkJoTlJZUWNpY1JReWdaR2hDQ05Dc2NFVlV0SHdKRE5pY29JSkNoWVhHQmthSlNZbktDa3FORFUyTnpnNU9rTkVSVVpIU0VsS1UxUlZWbGRZV1ZwalpHVm1aMmhwYW5OMGRYWjNlSGw2ZzRTRmhvZUlpWXFTazVTVmxwZVltWnFpbzZTbHBxZW9xYXF5czdTMXRyZTR1YnJDdzhURnhzZkl5Y3JTMDlUVjF0ZlkyZHJoNHVQazVlYm42T25xOGZMejlQWDI5L2o1K3YvRUFCOEJBQU1CQVFFQkFRRUJBUUVBQUFBQUFBQUJBZ01FQlFZSENBa0tDLy9FQUxVUkFBSUJBZ1FFQXdRSEJRUUVBQUVDZHdBQkFnTVJCQVVoTVFZU1FWRUhZWEVUSWpLQkNCUkNrYUd4d1Frak0xTHdGV0p5MFFvV0pEVGhKZkVYR0JrYUppY29LU28xTmpjNE9UcERSRVZHUjBoSlNsTlVWVlpYV0ZsYVkyUmxabWRvYVdwemRIVjJkM2g1ZW9LRGhJV0doNGlKaXBLVGxKV1dsNWlabXFLanBLV21wNmlwcXJLenRMVzJ0N2k1dXNMRHhNWEd4OGpKeXRMVDFOWFcxOWpaMnVMajVPWG01K2pwNnZMejlQWDI5L2o1K3YvYUFBd0RBUUFDRVFNUkFEOEE0M1E5SlZKdzBuUVZTMXpTVHFPcGxMZFNjVmZzTC96V09QdTFjdDlhczdhL1JGUUZtT0NUV0dLeFVrbkdtcnM2c0xoWTNVcWowT0ZmUTdoTHp5ZGg0TldyalJtalQzcjBqVTNzSXRzNVZRV0dhNVBWTDJBb1hVakdhZUJ4S25HMDl4WTdET011YUd4eGRycVZ6QU1JNXExRmRTTktKQ2ZtejFvb3EzRlhNb1RsM0xsNXExMU1nVjN5QU9LeHA3eVpodExjVVVVUWlrdEVGU2NtOVdmLzJRPT0iPgoJPC9pbWFnZT4KPC9zdmc+\"}}', 1, '2026-03-12 15:34:24', '2026-03-12 15:34:28'),
(25, 'App\\Models\\CarouselSlide', 3, '7a0cc2fe-c102-44fd-ad12-dae1e6a636b8', 'image', 'teplovizionnaja-ip-videokamera-tvt-td-5422e1-vt-3-pe-thermal-256x192-f-3-2mm-optical-5mp-f-4mm', '01KKHRP4NT0CEB0KEYFVPTG2YS.png', 'image/png', 'public', 'public', 218110, '[]', '{\"custom_headers\":{\"ContentType\":\"image\\/png\"}}', '{\"webp\":true}', '{\"media_library_original\":{\"urls\":[\"01KKHRP4NT0CEB0KEYFVPTG2YS___media_library_original_1000_1000.png\",\"01KKHRP4NT0CEB0KEYFVPTG2YS___media_library_original_836_836.png\",\"01KKHRP4NT0CEB0KEYFVPTG2YS___media_library_original_700_700.png\",\"01KKHRP4NT0CEB0KEYFVPTG2YS___media_library_original_585_585.png\",\"01KKHRP4NT0CEB0KEYFVPTG2YS___media_library_original_489_489.png\",\"01KKHRP4NT0CEB0KEYFVPTG2YS___media_library_original_409_409.png\",\"01KKHRP4NT0CEB0KEYFVPTG2YS___media_library_original_342_342.png\",\"01KKHRP4NT0CEB0KEYFVPTG2YS___media_library_original_286_286.png\",\"01KKHRP4NT0CEB0KEYFVPTG2YS___media_library_original_240_240.png\"],\"base64svg\":\"data:image\\/svg+xml;base64,PCFET0NUWVBFIHN2ZyBQVUJMSUMgIi0vL1czQy8vRFREIFNWRyAxLjEvL0VOIiAiaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkIj4KPHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHhtbDpzcGFjZT0icHJlc2VydmUiIHg9IjAiCiB5PSIwIiB2aWV3Qm94PSIwIDAgMTAwMCAxMDAwIj4KCTxpbWFnZSB3aWR0aD0iMTAwMCIgaGVpZ2h0PSIxMDAwIiB4bGluazpocmVmPSJkYXRhOmltYWdlL2pwZWc7YmFzZTY0LC85ai80QUFRU2taSlJnQUJBUUVBWUFCZ0FBRC8vZ0ErUTFKRlFWUlBVam9nWjJRdGFuQmxaeUIyTVM0d0lDaDFjMmx1WnlCSlNrY2dTbEJGUnlCMk5qSXBMQ0JrWldaaGRXeDBJSEYxWVd4cGRIa0svOXNBUXdBSUJnWUhCZ1VJQndjSENRa0lDZ3dVRFF3TEN3d1pFaE1QRkIwYUh4NGRHaHdjSUNRdUp5QWlMQ01jSENnM0tTd3dNVFEwTkI4bk9UMDRNand1TXpReS85c0FRd0VKQ1FrTUN3d1lEUTBZTWlFY0lUSXlNakl5TWpJeU1qSXlNakl5TWpJeU1qSXlNakl5TWpJeU1qSXlNakl5TWpJeU1qSXlNakl5TWpJeU1qSXlNakl5LzhBQUVRZ0FJQUFnQXdFaUFBSVJBUU1SQWYvRUFCOEFBQUVGQVFFQkFRRUJBQUFBQUFBQUFBQUJBZ01FQlFZSENBa0tDLy9FQUxVUUFBSUJBd01DQkFNRkJRUUVBQUFCZlFFQ0F3QUVFUVVTSVRGQkJoTlJZUWNpY1JReWdaR2hDQ05Dc2NFVlV0SHdKRE5pY29JSkNoWVhHQmthSlNZbktDa3FORFUyTnpnNU9rTkVSVVpIU0VsS1UxUlZWbGRZV1ZwalpHVm1aMmhwYW5OMGRYWjNlSGw2ZzRTRmhvZUlpWXFTazVTVmxwZVltWnFpbzZTbHBxZW9xYXF5czdTMXRyZTR1YnJDdzhURnhzZkl5Y3JTMDlUVjF0ZlkyZHJoNHVQazVlYm42T25xOGZMejlQWDI5L2o1K3YvRUFCOEJBQU1CQVFFQkFRRUJBUUVBQUFBQUFBQUJBZ01FQlFZSENBa0tDLy9FQUxVUkFBSUJBZ1FFQXdRSEJRUUVBQUVDZHdBQkFnTVJCQVVoTVFZU1FWRUhZWEVUSWpLQkNCUkNrYUd4d1Frak0xTHdGV0p5MFFvV0pEVGhKZkVYR0JrYUppY29LU28xTmpjNE9UcERSRVZHUjBoSlNsTlVWVlpYV0ZsYVkyUmxabWRvYVdwemRIVjJkM2g1ZW9LRGhJV0doNGlKaXBLVGxKV1dsNWlabXFLanBLV21wNmlwcXJLenRMVzJ0N2k1dXNMRHhNWEd4OGpKeXRMVDFOWFcxOWpaMnVMajVPWG01K2pwNnZMejlQWDI5L2o1K3YvYUFBd0RBUUFDRVFNUkFEOEErZjZLMWRKMDJDOWJNOHBWYzQrV3ZaZkNmd244TjZ4cHl5dks4ajl6bWdEd1lLV09GQko5cVZrZFB2S3crb3I2bTA3NFNlR2RFdVB0UVRjUVA0emtWd1h4bXN0RnRkTXR2c01jYXk3L0FQbG1CK3RBcm5rMmp6aUs0S2xzWjlhOWk4Q2VKNGRKUnpkenJIQ296eWE4TEJ4MHFScDVXWGFaR0srbWFUVjNjWjZuNDgrTFYzcXJTMkdsT1k3Zk9ES0R5ZnBYbUZ6ZjNkNEFMaTRrbEE2YjJ6VmVpbUIvLzlrPSI+Cgk8L2ltYWdlPgo8L3N2Zz4=\"}}', 2, '2026-03-12 15:34:28', '2026-03-12 15:34:29');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `route` varchar(255) DEFAULT NULL,
  `section` varchar(255) DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `nav_bg_color` varchar(255) DEFAULT '#d0d1d5',
  `nav_link_color` varchar(255) DEFAULT '#9ba4b1',
  `nav_hover_color` varchar(255) DEFAULT '#475569',
  `nav_blur` int(11) DEFAULT 20,
  `nav_opacity` double DEFAULT 0.6,
  `nav_z_index` int(11) DEFAULT 50,
  `cta_text` varchar(255) DEFAULT 'დაგვიკავშირდი',
  `cta_link` varchar(255) DEFAULT '#contact',
  `cta_bg_color` varchar(255) DEFAULT '#2563eb',
  `cta_text_color` varchar(255) DEFAULT '#ffffff',
  `cta_hover_color` varchar(255) DEFAULT '#1d4ed8',
  `cta_radius` int(11) DEFAULT 12,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `title`, `route`, `section`, `order`, `nav_bg_color`, `nav_link_color`, `nav_hover_color`, `nav_blur`, `nav_opacity`, `nav_z_index`, `cta_text`, `cta_link`, `cta_bg_color`, `cta_text_color`, `cta_hover_color`, `cta_radius`, `created_at`, `updated_at`) VALUES
(1, 'სერვისები', NULL, 'services', 0, '#14427d', '#fff8f8', '#fa8300', 20, 1, 50, NULL, NULL, NULL, NULL, NULL, 12, '2026-03-12 15:14:30', '2026-03-12 15:17:17'),
(2, 'პროდუქტები', NULL, 'products', 0, NULL, NULL, NULL, 20, 1, 50, NULL, NULL, NULL, NULL, NULL, 12, '2026-03-12 15:18:45', '2026-03-12 15:18:45'),
(3, 'ჩვენ', NULL, 'about', 0, NULL, NULL, NULL, 20, 1, 50, NULL, NULL, NULL, NULL, NULL, 12, '2026-03-12 15:20:24', '2026-03-12 15:20:51');

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
(4, '2026_03_05_111534_create_media_table', 1),
(5, '2026_03_05_111605_create_site_settings_table', 1),
(6, '2026_03_05_115907_create_seos_table', 1),
(7, '2026_03_05_131040_create_carousel_slides_table', 1),
(8, '2026_03_05_150654_create_products_table', 1),
(9, '2026_03_05_174620_create_services_table', 1),
(10, '2026_03_05_194412_create_contacts_table', 1),
(11, '2026_03_07_033209_create_projects_table', 1),
(12, '2026_03_08_102247_create_about_sections_table', 1),
(13, '2026_03_08_102417_create_about_features_table', 1),
(14, '2026_03_09_114246_create_menus_table', 1),
(15, '2026_03_09_130421_create_footers_table', 1),
(16, '2026_03_10_101939_add_styles_to_carousel_slides_table', 1),
(17, '2026_03_10_113915_add_extra_seo_fields_to_seos_table', 1),
(18, '2026_03_11_134324_add_contactinfo_to_footers_table', 1),
(19, '2026_03_11_165722_create_filters_table', 1),
(20, '2026_03_11_204253_add_tabs_to_products_table', 1);

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `features` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`features`)),
  `card_bg` varchar(255) NOT NULL DEFAULT '#ffffff',
  `card_border` varchar(255) NOT NULL DEFAULT '#e5e7eb',
  `card_radius` int(11) NOT NULL DEFAULT 16,
  `card_shadow` varchar(255) NOT NULL DEFAULT 'lg',
  `card_hover_effect` varchar(255) NOT NULL DEFAULT 'lift',
  `image_bg` varchar(255) NOT NULL DEFAULT '#ffffff',
  `title_color` varchar(255) NOT NULL DEFAULT '#1f2937',
  `title_size` int(11) NOT NULL DEFAULT 18,
  `title_weight` varchar(255) NOT NULL DEFAULT '600',
  `description_color` varchar(255) NOT NULL DEFAULT '#6b7280',
  `description_size` int(11) NOT NULL DEFAULT 14,
  `overlay_bg_from` varchar(255) NOT NULL DEFAULT '#1d4ed8',
  `overlay_bg_via` varchar(255) NOT NULL DEFAULT '#2563eb',
  `overlay_bg_to` varchar(255) NOT NULL DEFAULT '#3b82f6',
  `overlay_text_color` varchar(255) NOT NULL DEFAULT '#ffffff',
  `overlay_title_size` int(11) NOT NULL DEFAULT 22,
  `overlay_title_weight` varchar(255) NOT NULL DEFAULT '700',
  `feature_icon_color` varchar(255) NOT NULL DEFAULT '#86efac',
  `feature_text_color` varchar(255) NOT NULL DEFAULT '#ffffff',
  `feature_icon_size` int(11) NOT NULL DEFAULT 18,
  `feature_text_size` int(11) NOT NULL DEFAULT 14,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `specs` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`specs`)),
  `downloads` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`downloads`)),
  `download_btn_bg` varchar(255) NOT NULL DEFAULT '#ef4444',
  `download_btn_hover` varchar(255) NOT NULL DEFAULT '#dc2626',
  `download_btn_text` varchar(255) NOT NULL DEFAULT '#ffffff',
  `download_btn_radius` int(11) NOT NULL DEFAULT 6,
  `download_btn_size` int(11) NOT NULL DEFAULT 14
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `slug`, `description`, `features`, `card_bg`, `card_border`, `card_radius`, `card_shadow`, `card_hover_effect`, `image_bg`, `title_color`, `title_size`, `title_weight`, `description_color`, `description_size`, `overlay_bg_from`, `overlay_bg_via`, `overlay_bg_to`, `overlay_text_color`, `overlay_title_size`, `overlay_title_weight`, `feature_icon_color`, `feature_text_color`, `feature_icon_size`, `feature_text_size`, `created_at`, `updated_at`, `specs`, `downloads`, `download_btn_bg`, `download_btn_hover`, `download_btn_text`, `download_btn_radius`, `download_btn_size`) VALUES
(1, 'TD-9846SP1-A(BA/G4/WR2) 4MP Solar-powered 4G  Full-Color Network Camera', 'td-9846sp1-abag4wr2-4mp-solar-powered-4g-full-color-network-camera', '\n24/7 ფერადი გამოსახულება\n\nდამოუკიდებელი მზის პანელით და Li- ბატარეით\n\nბატარეის მართვის მხარდაჭერა, ბატარეის დისპლეი, ბატარეის მაღალი დაბალი ტემპერატურის დაცვა, დატენვისგან დაცვა, დაბალი ბატარეის ძილის დაცვა და PIR გაღვიძება\n\nLTE-TDD/LTE-FDD/WCDMA/GSM 4G უკაბელო ქსელის გადაცემა  \n\nმიკრო SIM ბარათის მხარდაჭერა\n\nჩაშენებული მიკრო SD ბარათის სლოტი, 256 გბ-მდე \n\nმხარი დაუჭირეთ სამ ნაკადს\n\nინტელექტუალური ანალიტიკა\n\nსტაბილურობა მე-12 კატეგორიის ტაიფუნის წინააღმდეგ\n\nკამერა: წყლისა და მტვრის რეზისტენტული (IP67)', '[{\"filter\":\"image-sensor\",\"value\":\"1\\/1.8\\\" Progressive Scan CMOS\"},{\"filter\":\"max-resolution\",\"value\":\"2560 \\u00d7 1440\"},{\"filter\":\"min-illumination\",\"value\":\"0.000625 lux@F1.0, AGC ON; 0 lux with LED ON\"},{\"filter\":\"lens-type\",\"value\":\"Fixed focal lens, 2.8mm and 3.6 mm optional\"}]', '#ffffff', '#e5e7eb', 16, 'lg', 'lift', '#ffffff', '#1f2937', 18, '600', '#6b7280', 14, '#1d4ed8', '#2563eb', '#3b82f6', '#ffffff', 22, '700', '#86efac', '#ffffff', 18, 14, '2026-03-12 13:58:26', '2026-03-12 14:07:50', '[{\"label\":\"\\u10db\\u10d0\\u10ee\\u10d0\\u10e1\\u10d8\\u10d0\\u10d7\\u10d4\\u10d1\\u10da\\u10d4\\u10d1\\u10d8\",\"value\":\"\\u10db\\u10d0\\u10e6\\u10d0\\u10da\\u10d8 \\u10ee\\u10d0\\u10e0\\u10d8\\u10e1\\u10ee\\u10d8\\u10e1 \\u10d2\\u10d0\\u10db\\u10dd\\u10e1\\u10d0\\u10ee\\u10e3\\u10da\\u10d4\\u10d1\\u10d0 4 MP \\u10d2\\u10d0\\u10e0\\u10e9\\u10d4\\u10d5\\u10d0\\u10d3\\u10dd\\u10d1\\u10d8\\u10d7\"},{\"label\":\"\\u10db\\u10d0\\u10ee\\u10d0\\u10e1\\u10d8\\u10d0\\u10d7\\u10d4\\u10d1\\u10da\\u10d4\\u10d1\\u10d8\",\"value\":\"24\\/7 \\u10e4\\u10d4\\u10e0\\u10d0\\u10d3\\u10d8 \\u10d2\\u10d0\\u10db\\u10dd\\u10e1\\u10d0\\u10ee\\u10e3\\u10da\\u10d4\\u10d1\\u10d0\"},{\"label\":\"\\u10db\\u10d0\\u10ee\\u10d0\\u10e1\\u10d8\\u10d0\\u10d7\\u10d4\\u10d1\\u10da\\u10d4\\u10d1\\u10d8\",\"value\":\"\\u10d3\\u10d0\\u10db\\u10dd\\u10e3\\u10d9\\u10d8\\u10d3\\u10d4\\u10d1\\u10d4\\u10da\\u10d8 \\u10db\\u10d6\\u10d8\\u10e1 \\u10de\\u10d0\\u10dc\\u10d4\\u10da\\u10d8\\u10d7 \\u10d3\\u10d0 Li- \\u10d1\\u10d0\\u10e2\\u10d0\\u10e0\\u10d4\\u10d8\\u10d7\"},{\"label\":\"\\u10db\\u10d0\\u10ee\\u10d0\\u10e1\\u10d8\\u10d0\\u10d7\\u10d4\\u10d1\\u10da\\u10d4\\u10d1\\u10d8\",\"value\":\"\\u10d1\\u10d0\\u10e2\\u10d0\\u10e0\\u10d4\\u10d8\\u10e1 \\u10db\\u10d0\\u10e0\\u10d7\\u10d5\\u10d8\\u10e1 \\u10db\\u10ee\\u10d0\\u10e0\\u10d3\\u10d0\\u10ed\\u10d4\\u10e0\\u10d0, \\u10d1\\u10d0\\u10e2\\u10d0\\u10e0\\u10d4\\u10d8\\u10e1 \\u10d3\\u10d8\\u10e1\\u10de\\u10da\\u10d4\\u10d8, \\u10d1\\u10d0\\u10e2\\u10d0\\u10e0\\u10d4\\u10d8\\u10e1 \\u10db\\u10d0\\u10e6\\u10d0\\u10da\\u10d8 \\u10d3\\u10d0\\u10d1\\u10d0\\u10da\\u10d8 \\u10e2\\u10d4\\u10db\\u10de\\u10d4\\u10e0\\u10d0\\u10e2\\u10e3\\u10e0\\u10d8\\u10e1 \\u10d3\\u10d0\\u10ea\\u10d5\\u10d0, \\u10d3\\u10d0\\u10e2\\u10d4\\u10dc\\u10d5\\u10d8\\u10e1\\u10d2\\u10d0\\u10dc \\u10d3\\u10d0\\u10ea\\u10d5\\u10d0, \\u10d3\\u10d0\\u10d1\\u10d0\\u10da\\u10d8 \\u10d1\\u10d0\\u10e2\\u10d0\\u10e0\\u10d4\\u10d8\\u10e1 \\u10eb\\u10d8\\u10da\\u10d8\\u10e1 \\u10d3\\u10d0\\u10ea\\u10d5\\u10d0 \\u10d3\\u10d0 PIR \\u10d2\\u10d0\\u10e6\\u10d5\\u10d8\\u10eb\\u10d4\\u10d1\\u10d0\"},{\"label\":\"\\u10db\\u10d0\\u10ee\\u10d0\\u10e1\\u10d8\\u10d0\\u10d7\\u10d4\\u10d1\\u10da\\u10d4\\u10d1\\u10d8\",\"value\":\"LTE-TDD\\/LTE-FDD\\/WCDMA\\/GSM 4G \\u10e3\\u10d9\\u10d0\\u10d1\\u10d4\\u10da\\u10dd \\u10e5\\u10e1\\u10d4\\u10da\\u10d8\\u10e1 \\u10d2\\u10d0\\u10d3\\u10d0\\u10ea\\u10d4\\u10db\\u10d0  \"},{\"label\":\"\\u10db\\u10d0\\u10ee\\u10d0\\u10e1\\u10d8\\u10d0\\u10d7\\u10d4\\u10d1\\u10da\\u10d4\\u10d1\\u10d8\",\"value\":\"\\u10db\\u10d8\\u10d9\\u10e0\\u10dd SIM \\u10d1\\u10d0\\u10e0\\u10d0\\u10d7\\u10d8\\u10e1 \\u10db\\u10ee\\u10d0\\u10e0\\u10d3\\u10d0\\u10ed\\u10d4\\u10e0\\u10d0\"},{\"label\":\"\\u10db\\u10d0\\u10ee\\u10d0\\u10e1\\u10d8\\u10d0\\u10d7\\u10d4\\u10d1\\u10da\\u10d4\\u10d1\\u10d8\",\"value\":\"\\u10e9\\u10d0\\u10e8\\u10d4\\u10dc\\u10d4\\u10d1\\u10e3\\u10da\\u10d8 \\u10db\\u10d8\\u10d9\\u10e0\\u10dd SD \\u10d1\\u10d0\\u10e0\\u10d0\\u10d7\\u10d8\\u10e1 \\u10e1\\u10da\\u10dd\\u10e2\\u10d8, 256 \\u10d2\\u10d1-\\u10db\\u10d3\\u10d4 \"},{\"label\":\"\\u10db\\u10d0\\u10ee\\u10d0\\u10e1\\u10d8\\u10d0\\u10d7\\u10d4\\u10d1\\u10da\\u10d4\\u10d1\\u10d8\",\"value\":\"\\u10d9\\u10d0\\u10db\\u10d4\\u10e0\\u10d0: \\u10ec\\u10e7\\u10da\\u10d8\\u10e1\\u10d0 \\u10d3\\u10d0 \\u10db\\u10e2\\u10d5\\u10e0\\u10d8\\u10e1 \\u10e0\\u10d4\\u10d6\\u10d8\\u10e1\\u10e2\\u10d4\\u10dc\\u10e2\\u10e3\\u10da\\u10d8 (IP67)\"},{\"label\":\"\\u10db\\u10d0\\u10ee\\u10d0\\u10e1\\u10d8\\u10d0\\u10d7\\u10d4\\u10d1\\u10da\\u10d4\\u10d1\\u10d8\",\"value\":\"\\u10d8\\u10dc\\u10e2\\u10d4\\u10da\\u10d4\\u10e5\\u10e2\\u10e3\\u10d0\\u10da\\u10e3\\u10e0\\u10d8 \\u10d0\\u10dc\\u10d0\\u10da\\u10d8\\u10e2\\u10d8\\u10d9\\u10d0\"},{\"label\":\"\\u10db\\u10d0\\u10ee\\u10d0\\u10e1\\u10d8\\u10d0\\u10d7\\u10d4\\u10d1\\u10da\\u10d4\\u10d1\\u10d8\",\"value\":\"\\u10e1\\u10e2\\u10d0\\u10d1\\u10d8\\u10da\\u10e3\\u10e0\\u10dd\\u10d1\\u10d0 \\u10db\\u10d4-12 \\u10d9\\u10d0\\u10e2\\u10d4\\u10d2\\u10dd\\u10e0\\u10d8\\u10d8\\u10e1 \\u10e2\\u10d0\\u10d8\\u10e4\\u10e3\\u10dc\\u10d8\\u10e1 \\u10ec\\u10d8\\u10dc\\u10d0\\u10d0\\u10e6\\u10db\\u10d3\\u10d4\\u10d2\"}]', NULL, '#ef4444', '#dc2626', '#ffffff', 6, 14),
(2, 'TVT IP-Video Kit 4x5Mp', 'tvt-ip-video-kit-4x5mp', '5MP IP ვიდეოკამერა Wi-Fi 6 მხარდაჭერით, ანალიტიკური ფუნქციებით.\nსენსორი: 1/2.7″ CMOS\nგარჩევადობა: 5MP (2880×1620)\nობიექტივი: ფიქსირებული f=2.8 მმ\nხედვის კუთხე:\nჰორიზონტალური 110°\nვერტიკალური 61°\nგანათება: IR + LED განათება 30 მ-მდე.', '[]', '#ffffff', '#e5e7eb', 16, 'lg', 'lift', '#ffffff', '#1f2937', 18, '600', '#6b7280', 14, '#1d4ed8', '#2563eb', '#3b82f6', '#ffffff', 22, '700', '#86efac', '#ffffff', 18, 14, '2026-03-12 15:18:17', '2026-03-12 15:21:37', '[]', NULL, '#ef4444', '#dc2626', '#ffffff', 6, 14);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` longtext DEFAULT NULL,
  `project_overview_title` varchar(255) DEFAULT NULL,
  `project_gallery_title` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `card_bg` varchar(255) NOT NULL DEFAULT '#ffffff',
  `card_border` varchar(255) NOT NULL DEFAULT '#e5e7eb',
  `card_radius` int(11) NOT NULL DEFAULT 16,
  `card_shadow` varchar(255) NOT NULL DEFAULT 'lg',
  `title_color` varchar(255) NOT NULL DEFAULT '#111827',
  `title_size` int(11) NOT NULL DEFAULT 20,
  `title_weight` varchar(255) NOT NULL DEFAULT '600',
  `description_color` varchar(255) NOT NULL DEFAULT '#6b7280',
  `description_size` int(11) NOT NULL DEFAULT 16,
  `overlay_bg_from` varchar(255) NOT NULL DEFAULT '#1d4ed8',
  `overlay_bg_via` varchar(255) NOT NULL DEFAULT '#2563eb',
  `overlay_bg_to` varchar(255) NOT NULL DEFAULT '#3b82f6',
  `overlay_text_color` varchar(255) NOT NULL DEFAULT '#ffffff',
  `icon_color` varchar(255) NOT NULL DEFAULT '#22c55e',
  `icon_size` int(11) NOT NULL DEFAULT 18,
  `project_label` varchar(255) NOT NULL DEFAULT 'პროექტი',
  `cta_text` varchar(255) NOT NULL DEFAULT 'დეტალურად',
  `video_section_title` varchar(255) NOT NULL DEFAULT 'ვიდეო',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `seos`
--

CREATE TABLE `seos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page` varchar(255) NOT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `canonical_url` varchar(255) DEFAULT NULL,
  `og_title` varchar(255) DEFAULT NULL,
  `og_description` text DEFAULT NULL,
  `twitter_title` varchar(255) DEFAULT NULL,
  `twitter_description` text DEFAULT NULL,
  `robots` varchar(255) DEFAULT NULL,
  `twitter_card` varchar(255) NOT NULL DEFAULT 'summary_large_image',
  `schema_type` varchar(255) DEFAULT NULL,
  `indexable` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `read_more_text` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `card_bg` varchar(255) NOT NULL DEFAULT '#ffffff',
  `card_border` varchar(255) NOT NULL DEFAULT '#e5e7eb',
  `card_hover_shadow` varchar(255) NOT NULL DEFAULT '2xl',
  `card_radius` int(11) NOT NULL DEFAULT 16,
  `card_padding` int(11) NOT NULL DEFAULT 24,
  `title_color` varchar(255) NOT NULL DEFAULT '#111827',
  `title_hover_color` varchar(255) NOT NULL DEFAULT '#2563eb',
  `description_color` varchar(255) NOT NULL DEFAULT '#4b5563',
  `image_bg` varchar(255) NOT NULL DEFAULT '#f9fafb',
  `button_bg` varchar(255) NOT NULL DEFAULT '#2563eb',
  `button_hover_bg` varchar(255) NOT NULL DEFAULT '#1d4ed8',
  `button_text_color` varchar(255) NOT NULL DEFAULT '#ffffff',
  `cards_per_row` int(11) NOT NULL DEFAULT 3,
  `section_bg` varchar(255) NOT NULL DEFAULT '#ffffff',
  `section_padding_top` int(11) NOT NULL DEFAULT 120,
  `section_padding_bottom` int(11) NOT NULL DEFAULT 120,
  `section_blur` int(11) NOT NULL DEFAULT 0,
  `section_opacity` double NOT NULL DEFAULT 1,
  `animation` varchar(255) NOT NULL DEFAULT 'fade-up',
  `card_hover_effect` varchar(255) NOT NULL DEFAULT 'lift',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `read_more_text`, `description`, `card_bg`, `card_border`, `card_hover_shadow`, `card_radius`, `card_padding`, `title_color`, `title_hover_color`, `description_color`, `image_bg`, `button_bg`, `button_hover_bg`, `button_text_color`, `cards_per_row`, `section_bg`, `section_padding_top`, `section_padding_bottom`, `section_blur`, `section_opacity`, `animation`, `card_hover_effect`, `created_at`, `updated_at`) VALUES
(1, 'კამერების მონტაჟი', NULL, 'სამეთვალყურეო სისტემების დაგეგმარება და მონტაჟი.', '#ffffff', '#e5e7eb', '2xl', 16, 24, '#111827', '#2563eb', '#4b5563', '#f9fafb', '#02113b', '#02113b', '#de7400', 3, '#ffffff', 120, 120, 0, 1, 'fade-up', 'shadow', '2026-03-12 14:35:14', '2026-03-12 14:40:56');

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

-- --------------------------------------------------------

--
-- Table structure for table `site_settings`
--

CREATE TABLE `site_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `site_name` varchar(255) DEFAULT NULL,
  `products_title` varchar(255) DEFAULT NULL,
  `services_header` varchar(255) DEFAULT NULL,
  `about_header` varchar(255) DEFAULT NULL,
  `project_header` varchar(255) DEFAULT NULL,
  `contact_header` varchar(255) DEFAULT NULL,
  `contact_form_title` varchar(255) DEFAULT NULL,
  `contact_service_title` varchar(255) DEFAULT NULL,
  `contact_form_button` varchar(255) DEFAULT NULL,
  `contact_service_button` varchar(255) DEFAULT NULL,
  `footer_description` text DEFAULT NULL,
  `footer_navigation_title` varchar(255) DEFAULT NULL,
  `footer_contact_title` varchar(255) DEFAULT NULL,
  `footer_social_title` varchar(255) DEFAULT NULL,
  `footer_copyright` varchar(255) DEFAULT NULL,
  `products_page_title` varchar(255) NOT NULL DEFAULT 'IP Cameras',
  `filter_title` varchar(255) NOT NULL DEFAULT 'Filter by Features',
  `clear_filters_text` varchar(255) NOT NULL DEFAULT 'Clear Filters',
  `accent_color` varchar(255) NOT NULL DEFAULT '#dc2626',
  `dark_color` varchar(255) NOT NULL DEFAULT '#111827',
  `product_overview` varchar(255) DEFAULT NULL,
  `product_Features` varchar(255) DEFAULT NULL,
  `Downloads_Features` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `site_settings`
--

INSERT INTO `site_settings` (`id`, `site_name`, `products_title`, `services_header`, `about_header`, `project_header`, `contact_header`, `contact_form_title`, `contact_service_title`, `contact_form_button`, `contact_service_button`, `footer_description`, `footer_navigation_title`, `footer_contact_title`, `footer_social_title`, `footer_copyright`, `products_page_title`, `filter_title`, `clear_filters_text`, `accent_color`, `dark_color`, `product_overview`, `product_Features`, `Downloads_Features`, `created_at`, `updated_at`) VALUES
(1, '.', NULL, 'სერვისები', 'ჩვენს შესახებ', 'შესრულებული პროექტები', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'IP Cameras', 'Filter by Features', 'Clear Filters', '#dc2626', '#111827', NULL, NULL, NULL, '2026-03-12 14:26:53', '2026-03-12 15:30:31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `is_admin`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Sandro', 'sanny090293@gmail.com', NULL, '$2y$12$Sai1Y23zoDjbVjW1a7p.FeJyTZ6bWcB47ioBBAyfXCpfyHcWt8BIm', 1, 'FSw87hqqLhgTy0cAHSuyDuPLdHksoeJXftO7sqRvDiJY9AL5RzJVQThinyFc', '2026-03-11 22:30:38', '2026-03-11 22:30:38'),
(2, 'SafeTech', 'safetechcomge@gmail.com', NULL, '$2y$12$2luBzmEOlH2gPCCv8eJ63uEjT6leX4T/nlJz2s4QDqmnTkHXQR1/S', 1, NULL, '2026-03-11 22:30:38', '2026-03-11 22:30:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_features`
--
ALTER TABLE `about_features`
  ADD PRIMARY KEY (`id`),
  ADD KEY `about_features_about_section_id_foreign` (`about_section_id`);

--
-- Indexes for table `about_sections`
--
ALTER TABLE `about_sections`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `carousel_slides`
--
ALTER TABLE `carousel_slides`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `filters`
--
ALTER TABLE `filters`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `filters_slug_unique` (`slug`);

--
-- Indexes for table `footers`
--
ALTER TABLE `footers`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `media_uuid_unique` (`uuid`),
  ADD KEY `media_model_type_model_id_index` (`model_type`,`model_id`),
  ADD KEY `media_order_column_index` (`order_column`);

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
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `projects_slug_unique` (`slug`);

--
-- Indexes for table `seos`
--
ALTER TABLE `seos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `seos_page_unique` (`page`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `site_settings`
--
ALTER TABLE `site_settings`
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
-- AUTO_INCREMENT for table `about_features`
--
ALTER TABLE `about_features`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `about_sections`
--
ALTER TABLE `about_sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `carousel_slides`
--
ALTER TABLE `carousel_slides`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `filters`
--
ALTER TABLE `filters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `footers`
--
ALTER TABLE `footers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `seos`
--
ALTER TABLE `seos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `site_settings`
--
ALTER TABLE `site_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `about_features`
--
ALTER TABLE `about_features`
  ADD CONSTRAINT `about_features_about_section_id_foreign` FOREIGN KEY (`about_section_id`) REFERENCES `about_sections` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
