-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2020 at 09:14 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dreadnought`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(10) UNSIGNED NOT NULL,
  `lang` char(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang_id` smallint(5) UNSIGNED DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci,
  `text` longtext COLLATE utf8mb4_unicode_ci,
  `meta_desc` longtext COLLATE utf8mb4_unicode_ci,
  `pin` tinyint(1) DEFAULT NULL,
  `visible` tinyint(3) UNSIGNED DEFAULT NULL,
  `page_id` tinyint(3) UNSIGNED DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `lang`, `lang_id`, `slug`, `title`, `image`, `sub_title`, `desc`, `text`, `meta_desc`, `pin`, `visible`, `page_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'en', 1, 'test', 'Test', 'images/eARWFP-LTbg.jpg', NULL, NULL, '<h3>hfhdfdfhgfgh df hfg hdf</h3>\r\n<ul>\r\n<li>dasdasd&nbsp;</li>\r\n<li>sgdfgsdfgd sdf gdsfg</li>\r\n<li>sdfgdfgdfg</li>\r\n<li>hfghfghghfg</li>\r\n</ul>', NULL, NULL, NULL, 2, 1, '2020-03-16 05:29:40', '2020-03-22 13:58:47'),
(2, 'en', 2, 'dfgdfg2', 'te', 'images/product4.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, '2020-03-16 05:30:21', '2020-03-19 04:44:20'),
(3, 'en', 3, 'ert2', 'yrty', 'images/product3.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, '2020-03-16 05:34:00', '2020-03-19 04:41:33'),
(4, 'en', 4, 'asdfdf', 'fasdf', 'images/product2.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, '2020-03-16 06:20:19', '2020-03-22 14:59:43'),
(6, 'en', 5, 'sdfa-sdfasdfdfg-dfgfd-1', 'sdfa sdfasdfdfg dfgfd', 'images/product1.jpg', NULL, NULL, '<p>fsdfsdfg</p>', NULL, NULL, NULL, 2, 1, '2020-03-16 06:28:07', '2020-03-22 16:44:08'),
(7, 'en', 7, 'service-1', 'Service 1', 'images/service1.jpg', NULL, NULL, '<p>safsadfsdfgsdfgsdfg</p>\r\n<ul>\r\n<li>gsdfgsd dsfg&nbsp;</li>\r\n<li>df gsdg sdf sdfgsdfg</li>\r\n<li>gjghjghj</li>\r\n</ul>', NULL, NULL, NULL, 3, 1, '2020-03-22 14:54:26', NULL),
(8, 'en', 8, 'service-2', 'Service 2', 'images/service2.jpg', NULL, NULL, '<h3>gsdfg dg dfg fdgsdfgsd</h3>\r\n<ul>\r\n<li>gsdfgdsfg sd&nbsp;</li>\r\n<li>dsg sdfg sdg&nbsp;</li>\r\n</ul>', NULL, NULL, NULL, 3, 1, '2020-03-22 14:55:04', NULL),
(9, 'en', 9, 'service-3', 'Service 3', 'images/service3.jpg', NULL, 'Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test', '<h3>dfgsdfgsdfgsdfgsdfsgdf gsdf</h3>\r\n<p>dfgsdfgfdgsdf</p>', NULL, NULL, NULL, 3, 1, '2020-03-22 14:55:46', '2020-03-22 16:38:46');

-- --------------------------------------------------------

--
-- Table structure for table `file_store`
--

CREATE TABLE `file_store` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lang` char(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `src` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` smallint(5) UNSIGNED NOT NULL,
  `sort` smallint(5) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `file_store`
--

INSERT INTO `file_store` (`id`, `lang`, `title`, `src`, `type`, `user_id`, `sort`, `created_at`, `updated_at`) VALUES
(1, 'en', NULL, 'images/9wlIcX6z3Fc.jpg', 'image', 1, 1, '2020-03-11 07:59:38', '2020-03-11 07:59:38'),
(2, 'en', NULL, 'images/eARWFP-LTbg.jpg', 'image', 1, 1, '2020-03-11 08:00:49', '2020-03-11 08:00:49'),
(4, 'en', NULL, 'images/product1.jpg', 'image', 1, 1, '2020-03-16 09:18:37', '2020-03-16 09:18:37'),
(5, 'en', NULL, 'images/product2.jpg', 'image', 1, 1, '2020-03-19 04:31:28', '2020-03-19 04:31:28'),
(6, 'en', NULL, 'images/product3.jpg', 'image', 1, 1, '2020-03-19 04:41:19', '2020-03-19 04:41:19'),
(7, 'en', NULL, 'images/product4.jpg', 'image', 1, 1, '2020-03-19 04:44:15', '2020-03-19 04:44:15'),
(8, 'en', NULL, 'images/service1.jpg', 'image', 1, 1, '2020-03-22 14:54:07', '2020-03-22 14:54:07'),
(9, 'en', NULL, 'images/service2.jpg', 'image', 1, 1, '2020-03-22 14:54:07', '2020-03-22 14:54:07'),
(10, 'en', NULL, 'images/service3.jpg', 'image', 1, 1, '2020-03-22 14:54:07', '2020-03-22 14:54:07'),
(12, 'en', NULL, 'images/Penguins.jpg', 'image', 1, 1, '2020-03-22 16:50:44', '2020-03-22 16:50:44'),
(13, 'en', NULL, 'images/slide1.png', 'image', 1, 1, '2020-04-12 13:58:30', '2020-04-12 13:58:30'),
(14, 'en', NULL, 'images/testimonial1.jpg', 'image', 1, 1, '2020-04-12 14:58:17', '2020-04-12 14:58:17'),
(15, 'en', NULL, 'images/testimonial2.jpg', 'image', 1, 1, '2020-04-12 14:58:21', '2020-04-12 14:58:21');

-- --------------------------------------------------------

--
-- Table structure for table `helper_fields`
--

CREATE TABLE `helper_fields` (
  `id` int(10) UNSIGNED NOT NULL,
  `lang` char(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang_id` smallint(5) UNSIGNED NOT NULL,
  `keyword` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci,
  `type` tinyint(3) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `helper_fields`
--

INSERT INTO `helper_fields` (`id`, `lang`, `lang_id`, `keyword`, `value`, `description`, `type`, `created_at`, `updated_at`) VALUES
(2, 'en', 1, 'about_us', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s. Dummy text is text that is used in the publishing industry or by web designers to occupy the space which will later be filled with ‘real’ content. This is required when, for example, the final text is not yet available.', 'About us in footer', 2, '2020-03-14 12:22:01', NULL),
(3, 'en', 3, 'address', 'Example address, st. 32', 'Contact\'s address', 1, '2020-03-14 13:07:31', '2020-03-14 13:16:06'),
(4, 'en', 4, 'phone', '+999 179805475', 'Contact\' s phone', 1, '2020-03-14 13:08:46', NULL),
(5, 'en', 5, 'email', 'test@test.com', 'Contact\'s Email address', 1, '2020-03-14 13:16:53', NULL),
(6, 'en', 6, 'products_page_id', '2', 'Products page id', 1, '2020-03-16 06:57:22', NULL),
(7, 'en', 7, 'services_page_id', '3', 'Services page ID', 1, '2020-03-22 16:11:20', NULL),
(8, 'en', 8, 'main_title', 'Test Title', 'Project main title', 1, '2020-04-01 15:37:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int(10) UNSIGNED NOT NULL,
  `lang` char(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang_id` smallint(5) UNSIGNED NOT NULL,
  `keyword` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  `hidden` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `lang`, `lang_id`, `keyword`, `value`, `hidden`, `created_at`, `updated_at`) VALUES
(7, 'en', 7, 'contacts', 'Contacts', 0, '2020-01-04 07:11:59', '2020-02-05 07:11:59'),
(8, 'en', 8, 'about_us', 'About Us', 1, '2020-01-10 07:11:59', '2020-02-05 07:11:59'),
(9, 'en', 9, 'copyright', '© 2019 - All rights reserved', 0, '2020-01-31 07:11:59', '2020-02-05 07:11:59'),
(10, 'en', 10, 'address', 'Address', 0, '2020-03-14 13:03:03', '2020-03-19 04:43:35'),
(11, 'en', 11, 'other_products', 'Other Products', 0, '2020-03-22 14:08:01', NULL),
(12, 'en', 12, 'products', 'products', 0, '2020-03-22 16:56:04', NULL),
(13, 'en', 13, 'services', 'services', 0, '2020-03-22 16:57:53', NULL),
(14, 'en', 14, 'know_more', 'know more', 0, '2020-03-22 16:58:49', NULL),
(15, 'en', 15, 'text', 'type here...', 0, '2020-04-01 15:50:40', NULL),
(16, 'en', 16, 'send', 'Send', 0, '2020-04-01 15:50:49', NULL),
(17, 'en', 17, 'name', 'Name', 0, '2020-04-05 05:09:36', NULL),
(18, 'en', 18, 'email', 'Email', 0, '2020-04-05 05:09:44', NULL),
(19, 'en', 19, 'mail_sent', 'Mail sent successfully', 0, '2020-04-05 05:14:36', NULL),
(20, 'en', 20, 'reviews', 'Reviews', 0, '2020-04-12 14:37:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `map_coordinates`
--

CREATE TABLE `map_coordinates` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `lat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lng` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zoom` decimal(8,2) NOT NULL,
  `template_type` tinyint(4) NOT NULL,
  `page_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `map_coordinates`
--

INSERT INTO `map_coordinates` (`id`, `lat`, `lng`, `zoom`, `template_type`, `page_id`) VALUES
(12, '41.72274112926465', '44.73454774572588', '13.15', 0, 5);

-- --------------------------------------------------------

--
-- Table structure for table `markers`
--

CREATE TABLE `markers` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `lang` char(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang_id` smallint(5) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lng` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `page_id` int(10) UNSIGNED NOT NULL,
  `sort` smallint(5) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `markers`
--

INSERT INTO `markers` (`id`, `lang`, `lang_id`, `title`, `desc`, `lat`, `lng`, `page_id`, `sort`) VALUES
(1, 'en', 1, 'test', 'test', '41.729552407870614', '44.75445207548097', 5, 1),
(2, 'de', 1, 'de_test', NULL, '41.719378', '44.792526', 5, 1),
(3, 'en', 3, 'test2', 'test2', '41.72385692311951', '44.72950994411195', 5, 2),
(4, 'de', 3, 'de_test2', NULL, '41.719378', '44.792526', 5, 2);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lang` char(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang_id` smallint(5) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `main` tinyint(1) NOT NULL DEFAULT '0',
  `page_id` int(10) UNSIGNED DEFAULT NULL,
  `parent_id` smallint(6) DEFAULT NULL,
  `hidden` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `sort` smallint(5) UNSIGNED NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `lang`, `lang_id`, `title`, `main`, `page_id`, `parent_id`, `hidden`, `sort`, `created_at`, `updated_at`) VALUES
(17, 'en', 16, 'Services', 0, 3, NULL, 0, 3, NULL, '2020-03-22 15:52:42'),
(18, 'en', 18, 'Products', 0, 2, NULL, 0, 2, NULL, '2020-03-19 04:43:21'),
(20, 'en', 20, 'Contacts', 0, 5, NULL, 0, 4, NULL, '2020-03-25 08:00:02'),
(23, 'en', 23, 'Home', 1, NULL, NULL, 0, 1, NULL, NULL),
(25, 'en', 24, 'About Us', 0, 1, NULL, 0, 5, NULL, '2020-04-07 16:36:40');

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
(5, '2019_08_07_181617_create_roles_table', 1),
(8, '2019_08_08_000000_create_users_table', 2),
(9, '2019_08_08_100000_create_password_resets_table', 2),
(10, '2019_08_18_070827_create_pages_table', 3),
(23, '2019_09_12_071610_create_validation_forms_table', 5),
(24, '2019_10_03_184118_create_languages_table', 6),
(25, '2019_10_04_145647_add_hidden_to_forms', 7),
(29, '2019_11_04_102238_add_standart_columns_to_pages', 9),
(30, '2019_11_10_204945_add_page_template_id_to_pages', 10),
(32, '2020_01_21_203202_add_main_image_to_pages', 11),
(34, '2020_01_25_113936_create_file_store_table', 12),
(35, '2019_08_22_094707_create_menu_table', 13),
(36, '2020_03_12_061142_create_helper_fields_table', 14),
(37, '2020_03_15_180413_create_articles_table', 15),
(40, '2020_03_23_205743_create_markers_table', 16),
(43, '2020_03_29_162657_create_map_coordinates_table', 17),
(46, '2020_04_11_211225_create_sliders_table', 18),
(47, '2020_04_12_184223_create_reviews_table', 19);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `lang` char(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang_id` smallint(5) UNSIGNED NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci,
  `text` longtext COLLATE utf8mb4_unicode_ci,
  `main_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hidden` tinyint(4) DEFAULT '0',
  `sort` smallint(5) UNSIGNED NOT NULL DEFAULT '1',
  `user_id` smallint(5) UNSIGNED NOT NULL,
  `page_type_id` tinyint(3) UNSIGNED DEFAULT NULL,
  `page_template_id` tinyint(3) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `lang`, `lang_id`, `slug`, `title`, `desc`, `text`, `main_image`, `hidden`, `sort`, `user_id`, `page_type_id`, `page_template_id`, `created_at`, `updated_at`) VALUES
(1, 'en', 1, 'about_us', 'About', NULL, '<h3 style=\"text-align: left;\"><span style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; text-align: justify; background-color: #ffffff;\">&nbsp; &nbsp; &nbsp;Sed id lacinia nibh. Maecenas sit amet venenatis dolor. Curabitur congue consectetur tellus in fermentum. Cras ac aliquet sem, vitae dapibus quam. Sed ultricies fermentum leo vitae volutpat. Vivamus condimentum, purus vel maximus fringilla, lacus lorem posuere orci, in dapibus ipsum diam eu eros. Proin velit orci, congue ac tincidunt a, bibendum et libero.</span></h3>\r\n<p style=\"text-align: left;\">&nbsp; &nbsp; &nbsp; Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sollicitudin gravida tellus, vel hendrerit lectus sagittis semper. Nunc vitae rutrum tortor. Maecenas sollicitudin varius mauris, nec commodo ipsum mattis vitae. Curabitur efficitur nulla at scelerisque iaculis. Mauris id urna neque. Nullam eget placerat ante. In tempus felis at dapibus molestie. Duis porta, urna non mattis vestibulum, nulla quam auctor nibh, in sagittis ipsum lectus vel ligula. Ut mi quam, ullamcorper vel nisl sed, iaculis varius lectus. Maecenas posuere, enim finibus fermentum ornare, eros ligula ornare libero, vel interdum odio dui non eros. Proin feugiat nunc at est auctor feugiat.</p>\r\n<ul>\r\n<li style=\"text-align: left;\">one</li>\r\n<li style=\"text-align: left;\">two</li>\r\n<li style=\"text-align: left;\">three</li>\r\n</ul>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; background-color: #ffffff;\">&nbsp;</p>', 'images/Penguins.jpg', 0, 4, 1, 0, 0, NULL, '2020-03-22 16:50:49'),
(2, 'en', 2, 'products', 'Products', NULL, NULL, NULL, 0, 1, 1, 1, 1, NULL, '2020-03-22 15:07:10'),
(4, 'en', 3, 'services', 'Services', NULL, NULL, NULL, 0, 2, 1, 1, 2, NULL, NULL),
(5, 'en', 5, 'contacts', 'Contacts', NULL, NULL, NULL, 0, 3, 1, 2, 0, NULL, NULL);

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
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(10) UNSIGNED NOT NULL,
  `lang` char(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `review` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `visible` tinyint(3) UNSIGNED NOT NULL DEFAULT '1',
  `sort` smallint(5) UNSIGNED NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `lang`, `lang_id`, `name`, `image`, `review`, `visible`, `sort`, `created_at`, `updated_at`) VALUES
(1, 'en', 1, 'First Name', 'images/testimonial1.jpg', 'Duis gravida ligula ut purus semper, sed volutpat nisl cursus. Sed orci nisl, pellentesque et sodales a, blandit ut ipsum. Proin non lorem velit. Integer rutrum odio vitae tellus ullamcorper, id elementum mi euismod. In hac habitasse platea dictumst. Maecenas scelerisque erat vel semper rutrum. Integer lorem eros, volutpat et ligula at.', 1, 1, NULL, NULL),
(2, 'en', 2, 'Second Name', 'images/testimonial2.jpg', 'Etiam sed magna nec purus egestas mattis. Maecenas sagittis id diam quis condimentum. Vestibulum sodales magna ac interdum pharetra. Sed eu dignissim augue, eget dignissim nisl. Donec semper interdum feugiat. Aenean quis tempus ligula. Donec sed elementum eros, id volutpat nisl. Aliquam erat volutpat. Integer sem tortor.', 1, 1, NULL, NULL),
(3, 'en', 3, 'Third Name', 'images/testimonial1.jpg', 'Nulla a orci ipsum. Nullam id dui ut risus ornare feugiat ut vitae neque. Nulla facilisi. Sed finibus nisl quis tortor sagittis dictum. Sed ornare ornare diam, ac hendrerit felis. Nunc imperdiet sagittis mattis. Vivamus a consectetur odio. Vestibulum a odio dignissim, ornare dui quis, porta magna. Suspendisse cursus in diam eu semper. Duis felis elit, semper et facilisis ut, rutrum quis arcu. Aliquam in ligula et eros varius feugiat sed vitae ex. Fusce tempus efficitur mauris non imperdiet. Aenean nec posuere ex, nec finibus sapien. Vestibulum nec egestas lorem, at tincidunt nisl. Sed quis posuere ligula. Etiam a sodales ante.', 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `title`, `permissions`, `created_at`, `updated_at`) VALUES
(1, 'administrator', '{\"menu\":{\"1\":\"1\",\"2\":\"1\",\"3\":\"1\",\"4\":\"1\",\"5\":\"1\",\"6\":\"1\",\"7\":\"1\",\"8\":\"1\"},\"pages\":{\"1\":\"1\",\"2\":\"1\",\"3\":\"1\",\"4\":\"1\",\"5\":\"1\",\"6\":\"1\",\"7\":\"1\",\"8\":\"1\",\"9\":\"1\",\"10\":\"1\"},\"sliders\":{\"1\":\"1\",\"2\":\"1\",\"3\":\"1\",\"4\":\"1\",\"5\":\"1\",\"6\":\"1\",\"7\":\"1\",\"8\":\"1\"},\"reviews\":{\"1\":\"1\",\"2\":\"1\",\"3\":\"1\",\"4\":\"1\",\"5\":\"1\",\"6\":\"1\",\"7\":\"1\",\"8\":\"1\"},\"articles\":{\"1\":\"1\",\"2\":\"1\",\"3\":\"1\",\"4\":\"1\",\"5\":\"1\",\"6\":\"1\",\"7\":\"1\"},\"contact\":{\"1\":\"1\",\"2\":\"1\",\"3\":\"1\",\"4\":\"1\",\"5\":\"1\"},\"file_store\":{\"1\":\"1\",\"2\":\"1\",\"3\":\"1\"},\"languages\":{\"1\":\"1\",\"2\":\"1\",\"3\":\"1\",\"4\":\"1\",\"5\":\"1\",\"6\":\"1\",\"7\":\"1\"},\"helper_fields\":{\"1\":\"1\",\"2\":\"1\",\"3\":\"1\",\"4\":\"1\",\"5\":\"1\",\"6\":\"1\",\"7\":\"1\"}}', '2019-08-07 16:06:20', '2020-04-12 14:54:06');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` int(10) UNSIGNED NOT NULL,
  `lang` char(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci,
  `src` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` tinyint(3) UNSIGNED NOT NULL DEFAULT '1',
  `visible` tinyint(3) UNSIGNED NOT NULL DEFAULT '1',
  `sort` smallint(5) UNSIGNED NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `lang`, `lang_id`, `title`, `sub_title`, `desc`, `src`, `url`, `position`, `visible`, `sort`, `created_at`, `updated_at`) VALUES
(1, 'en', 1, 'Slider one', 'Slider sub title one', 'Slider description one ...', 'images/slide1.png', 'http://google.com', 1, 1, 2, NULL, NULL),
(2, 'en', 2, 'Lorem Ipsum', NULL, '<h3>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h3>\r\n<ul>\r\n<li>- sdf sd sdf;</li>\r\n<li>- sdgdfgdf gdf g;</li>\r\n<li>- gsdfgsdfgdf gdf d dsf gdfg df;</li>\r\n<li>- sahdsf&nbsp; sdfgsdf&nbsp; &nbsp;sdhfsdfsddfgfdg;</li>\r\n<li>- fsdf fdgfdg dgf gf hgfh fghdgh;</li>\r\n</ul>', 'images/slide1.png', 'http://google.com', 1, 1, 1, NULL, '2020-04-12 14:33:17');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `image`, `password`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Zarok13', 'zarok@dreadnought.com', NULL, NULL, '$2y$10$C90TfQLEQ1.X1MpAlXT/1.wEf3sdGJoiIheU5QINk2rdo1BniMgN2', 1, NULL, '2019-08-07 16:09:38', '2019-08-07 16:09:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `articles_lang_slug_unique` (`lang`,`slug`),
  ADD UNIQUE KEY `articles_lang_lang_id_unique` (`lang`,`lang_id`),
  ADD KEY `articles_visible_index` (`visible`),
  ADD KEY `articles_page_id_index` (`page_id`);

--
-- Indexes for table `file_store`
--
ALTER TABLE `file_store`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `helper_fields`
--
ALTER TABLE `helper_fields`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `helper_fields_lang_lang_id_unique` (`lang`,`lang_id`),
  ADD UNIQUE KEY `helper_fields_lang_keyword_unique` (`lang`,`keyword`),
  ADD KEY `helper_fields_type_index` (`type`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `languages_lang_lang_id_unique` (`lang`,`lang_id`),
  ADD KEY `languages_hidden_index` (`hidden`);

--
-- Indexes for table `map_coordinates`
--
ALTER TABLE `map_coordinates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `map_coordinates_page_id_unique` (`page_id`);

--
-- Indexes for table `markers`
--
ALTER TABLE `markers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `markers_lang_lang_id_unique` (`lang`,`lang_id`),
  ADD KEY `markers_page_id_foreign` (`page_id`),
  ADD KEY `markers_sort_index` (`sort`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `menu_lang_lang_id_unique` (`lang`,`lang_id`),
  ADD KEY `menu_page_id_index` (`page_id`),
  ADD KEY `menu_parent_id_index` (`parent_id`),
  ADD KEY `menu_hidden_index` (`hidden`),
  ADD KEY `menu_sort_index` (`sort`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pages_lang_lang_id_unique` (`lang`,`lang_id`),
  ADD KEY `pages_hidden_index` (`hidden`),
  ADD KEY `pages_page_type_id_index` (`page_type_id`),
  ADD KEY `pages_sort_index` (`sort`),
  ADD KEY `pages_page_template_id_index` (`page_template_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `reviews_lang_lang_id_unique` (`lang`,`lang_id`),
  ADD KEY `reviews_visible_index` (`visible`),
  ADD KEY `reviews_sort_index` (`sort`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sliders_lang_lang_id_unique` (`lang`,`lang_id`),
  ADD KEY `sliders_position_index` (`position`),
  ADD KEY `sliders_visible_index` (`visible`),
  ADD KEY `sliders_sort_index` (`sort`);

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
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `file_store`
--
ALTER TABLE `file_store`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `helper_fields`
--
ALTER TABLE `helper_fields`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `map_coordinates`
--
ALTER TABLE `map_coordinates`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `markers`
--
ALTER TABLE `markers`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `map_coordinates`
--
ALTER TABLE `map_coordinates`
  ADD CONSTRAINT `map_coordinates_page_id_foreign` FOREIGN KEY (`page_id`) REFERENCES `pages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `markers`
--
ALTER TABLE `markers`
  ADD CONSTRAINT `markers_page_id_foreign` FOREIGN KEY (`page_id`) REFERENCES `pages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
