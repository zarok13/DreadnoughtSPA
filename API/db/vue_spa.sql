-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 19, 2021 at 09:21 PM
-- Server version: 8.0.22-0ubuntu0.20.04.3
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vue_spa`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int UNSIGNED NOT NULL,
  `lang` char(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang_id` smallint UNSIGNED DEFAULT NULL,
  `slug` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `text` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `meta_desc` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `pin` tinyint(1) DEFAULT NULL,
  `visible` tinyint UNSIGNED DEFAULT NULL,
  `page_id` tinyint UNSIGNED DEFAULT NULL,
  `user_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `lang`, `lang_id`, `slug`, `title`, `image`, `sub_title`, `desc`, `text`, `meta_desc`, `pin`, `visible`, `page_id`, `user_id`, `created_at`, `updated_at`) VALUES
(14, 'en', 1, 'blog-1', 'Blog 1', 'images/blog-01.jpg', NULL, NULL, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis ut ornare risus. Sed condimentum elit lorem, ac varius lacus tincidunt sit amet. Morbi maximus tortor diam, id maximus enim tempus volutpat. Nullam quis ligula condimentum dui convallis accumsan. Cras consequat, sapien sit amet auctor rhoncus, orci nisi posuere velit, in aliquet ipsum dolor eu lorem. Sed in sagittis libero. Quisque a arcu quis lacus mattis dignissim eget id tellus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. In id velit scelerisque, fermentum enim eget, congue nisl. Nunc tempor nisl nibh, eget ultricies nulla egestas eget. Mauris sit amet vestibulum urna. Praesent mollis scelerisque gravida.</p>\r\n<p>Mauris sapien nulla, dictum et hendrerit a, tincidunt eget nisi. Maecenas eget purus enim. Morbi faucibus elit arcu, vel lobortis sapien eleifend in. Suspendisse non vehicula mi, at tempus velit. In sed ex suscipit, consectetur turpis et, maximus ante. Mauris eu mi quis ante hendrerit ultrices. Nullam semper, magna quis eleifend malesuada, magna sem commodo turpis, vel bibendum ligula neque ut augue. Morbi quis nibh sit amet dolor pellentesque pharetra. Donec bibendum mollis mi, euismod lacinia libero aliquet id. Duis commodo lectus non nulla consequat pretium. Phasellus tristique facilisis ipsum, sed dignissim mi dictum eu. Sed semper, enim quis posuere interdum, velit urna laoreet odio, quis dignissim leo sapien sit amet dui.</p>', NULL, NULL, NULL, 6, 1, '2020-05-08 06:06:49', NULL),
(16, 'en', 15, 'blog-2', 'Blog 2', 'images/blog-02.jpg', NULL, NULL, '<p>Phasellus pulvinar lectus ullamcorper aliquet iaculis. Nam porttitor sagittis orci, vel ultrices purus finibus quis. Vivamus et magna semper, molestie ipsum ut, semper lectus. Integer bibendum malesuada odio, sed consectetur nisi porta id. Suspendisse quis mattis erat, a pulvinar lectus. Ut sit amet scelerisque magna, quis porta diam. Aliquam erat volutpat. Etiam laoreet nulla non diam gravida, vel accumsan justo tempus. Vestibulum eu convallis libero. Nam et metus orci. Vestibulum accumsan fringilla lorem fringilla viverra. Nam aliquet consequat quam, sit amet aliquam urna viverra sit amet.</p>\r\n<p>Cras bibendum vulputate gravida. Quisque euismod massa vitae est aliquet egestas. Vestibulum eget massa vulputate, blandit metus et, varius urna. Ut semper euismod ipsum, vitae tincidunt felis laoreet eu. Sed in fringilla lacus, ac semper justo. Integer sodales neque imperdiet, dictum dolor sit amet, finibus risus. Fusce a eleifend nulla. Sed in orci vitae neque viverra iaculis ac nec elit. Integer et turpis egestas tellus consequat gravida eu id dui. Curabitur quam augue, accumsan quis laoreet nec, imperdiet id quam. Donec sollicitudin sem purus, et iaculis turpis suscipit sit amet. Duis vel venenatis mauris. In hac habitasse platea dictumst.</p>', NULL, NULL, NULL, 6, 1, '2020-05-08 08:26:02', NULL),
(17, 'en', 17, 'blog-3', 'Blog 3', 'images/blog-03.jpg', NULL, NULL, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ut efficitur enim. Donec ac eleifend ante. Nunc volutpat porttitor mauris vel pulvinar. Nunc porta facilisis blandit. Mauris in ipsum nisl. Proin convallis lorem et sem tristique, ac ullamcorper lorem posuere. Nullam a erat eleifend, feugiat tortor sit amet, ornare quam. Aliquam vehicula et neque eu elementum.</p>\r\n<p>Etiam non mi ac urna finibus venenatis. Phasellus odio tellus, maximus et mi nec, suscipit volutpat massa. Curabitur sed dui lobortis sem vehicula egestas. Suspendisse in diam felis. Nulla facilisi. Nullam vitae consequat ex. Etiam interdum id arcu eu sodales. Cras in tellus id erat fermentum commodo nec eget diam. Proin enim orci, varius at diam vitae, tempus tincidunt mauris. Aliquam commodo id nulla nec varius.</p>', NULL, NULL, NULL, 6, 1, '2020-05-08 12:04:41', '2020-05-08 13:55:25'),
(18, 'en', 18, 'blog-4', 'Blog 4', 'images/blog-04.jpg', NULL, NULL, 'Phasellus quis tincidunt odio, quis fringilla dui. Nunc lacus dolor, interdum a imperdiet ac, blandit vitae odio. Proin fermentum purus id velit posuere viverra. In quis sollicitudin ante. Maecenas eu egestas leo. Proin turpis nulla, placerat sit amet purus a, efficitur commodo urna. Sed accumsan vel nisl vitae elementum. Mauris nisi sapien, accumsan fringilla placerat eu, viverra ut ex. Pellentesque porttitor, ipsum volutpat sodales placerat, lacus odio efficitur nunc, eget fermentum elit nisl sit amet magna. Mauris porttitor sagittis euismod. Praesent porta sagittis est. Aenean tempus pretium pharetra. Suspendisse at erat ac erat malesuada pellentesque vel vitae purus.', NULL, NULL, NULL, 6, 1, '2020-05-08 14:19:07', NULL),
(19, 'en', 19, 'blog-5', 'Blog 5', 'images/blog-05.jpg', NULL, NULL, 'Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Phasellus gravida pretium ipsum at euismod. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis quis urna lacinia, ultricies nisl vel, pellentesque ante. Nunc semper dui non ornare tincidunt. Curabitur sapien felis, imperdiet sit amet euismod ut, hendrerit sit amet leo. Morbi et fringilla justo. Mauris condimentum, risus ac posuere rutrum, sem ligula vulputate sem, ut ornare augue massa sit amet augue. Quisque commodo ultricies nunc nec iaculis. Morbi sagittis augue vel dictum venenatis. In eu lacus urna. Nunc convallis justo a velit fringilla vehicula. Morbi lobortis nibh nec est tempus ullamcorper.', NULL, NULL, NULL, 6, 1, '2020-05-08 14:20:10', NULL),
(20, 'en', 20, 'blog-6', 'Blog 6', 'images/blog-06.jpg', NULL, NULL, '<p>Duis non facilisis urna. Ut ultrices enim non purus consectetur consectetur. Etiam venenatis dolor dolor, id sodales nunc pharetra tincidunt. Phasellus eget tellus tincidunt, suscipit tortor in, efficitur lacus. Maecenas et orci neque. Aliquam at enim pulvinar, suscipit sapien dapibus, rhoncus sem. Donec posuere leo sed mattis hendrerit. Integer mi tortor, vehicula nec elit sed, dignissim lacinia ante. In hac habitasse platea dictumst. Vestibulum rhoncus rhoncus dui, sollicitudin viverra arcu viverra eu. Phasellus pulvinar ac dolor vel vulputate. Fusce accumsan consectetur diam eget sodales. Curabitur id nisl ac libero bibendum dapibus et eu eros. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aliquam viverra dictum euismod.</p>', NULL, NULL, NULL, 6, 1, '2020-05-08 14:20:35', '2020-12-24 05:05:06'),
(21, 'en', 21, 'lightweight', 'Lightweight', 'fa-align-left', NULL, 'Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis', '<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; background-color: #ffffff;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla facilisis dapibus efficitur. Praesent rhoncus lobortis varius. Aliquam eget ultrices odio. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque pulvinar a quam in pulvinar. Fusce ultrices imperdiet neque, vel convallis nulla elementum non. Pellentesque a vulputate orci. Nullam egestas placerat enim, sit amet tincidunt arcu. Proin sed eros odio.</p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; background-color: #ffffff;\">Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean consequat mollis pellentesque. Etiam sed libero lorem. Sed eros leo, dictum eu sollicitudin at, aliquet vulputate urna. Ut nec sodales leo. Cras non lacus enim. Pellentesque non sollicitudin ex, sit amet sollicitudin eros. Ut lacinia, diam eu placerat feugiat, augue odio cursus est, a sollicitudin tortor nulla sed arcu.</p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; background-color: #ffffff;\">Maecenas eget pharetra tortor. Integer viverra hendrerit tincidunt. Phasellus ex quam, tristique vel ante id, rhoncus tempor est. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Sed tincidunt, nunc nec semper ornare, arcu sem dapibus purus, et tristique velit velit quis quam. Praesent in tellus et ante tristique facilisis. Duis quis pharetra arcu, id commodo risus. Mauris pharetra nisi vitae dictum gravida. Cras quis magna justo. Vestibulum ac diam justo. Fusce ipsum lorem, elementum id tempor in, euismod eget mi.</p>\r\n<p>&nbsp;</p>', NULL, NULL, NULL, 2, 1, '2020-12-06 16:06:40', '2020-12-20 17:20:05'),
(22, 'en', 22, 'product-2', 'Product 2', 'fa-balance-scale', NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In molestie, odio ac auctor feugiat, turpis magna suscipit ante, a accumsan nisi eros vel erat.', '<p>[content image=\"lake_forest_landscape_79459_1920x1080.jpg\" title=\"title\" desc=\"description\"]</p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; background-color: #ffffff;\"><strong>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In molestie, odio ac auctor feugiat, turpis magna suscipit ante, a accumsan nisi eros vel erat. Sed feugiat neque sed mi interdum, id fermentum magna vulputate. Morbi non dignissim tellus. Nam porttitor dapibus nulla vel tristique. Nunc nulla dolor, posuere eu nulla ac, lobortis congue nulla. Morbi leo justo, efficitur id eros in, pretium semper sapien. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Cras tristique lorem odio, vitae lobortis est mollis bibendum. Nam finibus eros dolor. Vestibulum tristique dui in dapibus gravida.</strong></p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; background-color: #ffffff;\"><strong>Fusce mollis mauris cursus sapien vehicula, nec luctus velit euismod. Aliquam volutpat congue euismod. Nulla nisi dui, mattis vel iaculis finibus, cursus eget justo. Praesent feugiat erat nec nulla viverra tristique. Praesent egestas ante maximus massa finibus, vitae dapibus sapien vulputate. Aenean nibh magna, feugiat nec odio nec, feugiat tincidunt tellus. Duis hendrerit lobortis pulvinar. Sed ut viverra magna.</strong></p>\r\n<p>[/content]</p>\r\n<hr />\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; background-color: #ffffff;\">Vestibulum sit amet purus augue. Vivamus et nibh et turpis sagittis auctor. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Curabitur eget dolor eu neque tincidunt dapibus nec auctor sapien. Phasellus et varius libero, eu dignissim felis. Duis nec arcu leo. In scelerisque, felis non cursus ornare, velit tortor lobortis turpis, ut iaculis ipsum arcu non lectus. Duis odio odio, lacinia egestas ligula nec, gravida bibendum ex. Suspendisse orci metus, ullamcorper non suscipit id, commodo at erat. Etiam sed purus imperdiet, ultrices lorem id, porta turpis. Curabitur accumsan massa turpis, eu convallis sapien semper et. Etiam cursus erat lacus, id interdum neque maximus vitae. Sed ultricies feugiat urna, congue dapibus ante feugiat mollis. Sed viverra libero ac ultricies porta.</p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; background-color: #ffffff;\">Aenean convallis vehicula ornare. Fusce blandit odio in pulvinar luctus. Sed at tempus urna. Etiam laoreet lacinia nunc at consectetur. Etiam venenatis ex ac erat egestas convallis. Aliquam lacinia venenatis sapien, tempor rhoncus eros suscipit id. Integer vehicula, metus condimentum rutrum vestibulum, nisl massa hendrerit mauris, a fringilla lectus quam et diam. Sed semper sodales ante quis hendrerit. Ut dictum augue vel ex facilisis dictum. Ut blandit nulla mi, in congue mi consequat a. Aenean vel ipsum et est facilisis dictum. Morbi imperdiet, nunc non luctus ultrices, arcu velit dictum turpis, quis pellentesque elit massa mattis quam.</p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; background-color: #ffffff;\">Donec tincidunt dui lectus, a cursus ipsum iaculis ut. Ut vehicula in libero vel vestibulum. Duis sit amet elit ac felis suscipit ullamcorper. Curabitur non commodo lorem. Nulla tincidunt justo lacinia, vehicula neque a, efficitur nulla. Nam sed tempus justo. Duis neque lorem, tincidunt eu lacinia et, aliquam vel nulla. Donec ornare enim sit amet dictum ullamcorper. Quisque at ultricies purus, id scelerisque nisl. Suspendisse vestibulum mauris urna, eu aliquet turpis aliquet nec.</p>', NULL, NULL, NULL, 2, 1, '2020-12-23 10:40:28', '2020-12-24 04:23:27'),
(23, 'en', 23, 'product-3', 'Product 3', 'fa-battery-full', NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed magna libero, tristique auctor luctus dictum, sodales non arcu. Nullam eget lacus rhoncus, aliquam massa nec, ornare magna.', '<p>[content image=\"lake_forest_trees_188315_1920x1080.jpg\"]</p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; background-color: #ffffff;\"><em><strong>Pellentesque sit amet commodo mauris. Vestibulum pulvinar mi ut elit laoreet suscipit. Suspendisse erat ipsum, lobortis non tellus sed, gravida porta mi. Praesent faucibus ullamcorper arcu, non porttitor velit viverra et. Morbi tempus vestibulum orci, id molestie nisi efficitur nec. Aliquam dictum leo risus, in congue augue commodo quis. Suspendisse vulputate in ipsum commodo tempus. In fermentum felis cursus sem pretium mollis.</strong></em></p>\r\n<p>[/content]</p>\r\n<hr />\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; background-color: #ffffff;\">Etiam auctor aliquet velit, a varius arcu blandit in. Phasellus id erat justo. Aenean suscipit lectus eget tincidunt varius. In erat tortor, vestibulum ut iaculis quis, blandit quis ex. Praesent auctor pellentesque arcu, a aliquet lectus maximus vel. Aenean venenatis nisl bibendum, malesuada lorem eget, ornare magna. Duis egestas nulla non arcu tempor rutrum. Nunc pellentesque tristique neque ut lacinia.</p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; background-color: #ffffff;\">Quisque justo ante, lobortis et vehicula sit amet, finibus sed leo. Maecenas commodo tempor purus at porta. Morbi rhoncus ligula non neque egestas vulputate. Fusce posuere ligula in tortor lacinia volutpat. Morbi dapibus tincidunt erat sed rutrum. Nam id pharetra leo. Aliquam vulputate nunc eget consectetur condimentum. Nulla molestie, augue a tempus porttitor, est erat pharetra velit, at aliquet mi ex ut eros. Nunc ligula diam, viverra sed laoreet in, gravida sit amet metus. Nullam consectetur est sed magna convallis sodales a eget nisl. Morbi lacinia orci rhoncus, elementum dui quis, mollis tellus. Proin id tellus imperdiet, consequat nisi ut, pretium purus. Phasellus nec leo vitae elit accumsan elementum. Proin accumsan erat nec nulla fringilla, ac maximus enim fermentum. Donec mi est, viverra sed nisl consectetur, luctus convallis magna. Suspendisse hendrerit dolor ut ligula consectetur pretium nec at metus.</p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; background-color: #ffffff;\">Ut pharetra leo quis nibh fringilla cursus. Integer non sodales risus. Aliquam nulla dolor, consequat in augue sed, facilisis lobortis risus. Phasellus et nisi mattis, vehicula arcu nec, semper ex. Fusce ut ultricies purus. Maecenas quis vestibulum lectus. Nulla facilisi. Ut tempor varius tincidunt. Vivamus gravida sit amet lorem in mattis. Praesent volutpat nulla et risus pellentesque, nec maximus nulla dapibus.</p>', NULL, NULL, NULL, 2, 1, '2020-12-24 04:27:09', '2020-12-24 04:27:32');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int UNSIGNED NOT NULL,
  `lang` char(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang_id` int UNSIGNED NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` int DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci,
  `sort` smallint UNSIGNED NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `lang`, `lang_id`, `url`, `product_id`, `image`, `title`, `desc`, `sort`, `created_at`, `updated_at`) VALUES
(1, 'en', 1, NULL, 23, 'images/lake_forest_landscape_79459_1920x1080(1).jpg', 'Clean Design', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 1, NULL, '2020-12-27 12:18:16'),
(2, 'en', 2, 'http://google.com', NULL, 'images/nebula_space_stars_171352_1920x1080.jpg', 'Search', 'Cras mattis feugiat pellentesque. Curabitur vitae justo massa.', 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `file_store`
--

CREATE TABLE `file_store` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `src` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` smallint UNSIGNED NOT NULL,
  `sort` smallint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `file_store`
--

INSERT INTO `file_store` (`id`, `title`, `src`, `type`, `user_id`, `sort`, `created_at`, `updated_at`) VALUES
(6, NULL, 'images/lake_forest_landscape_79459_1920x1080.jpg', 'image', 1, 1, '2020-12-01 17:03:40', '2020-12-01 17:03:40'),
(7, NULL, 'images/lake_forest_trees_183884_1920x1080.jpg', 'image', 1, 1, '2020-12-01 17:03:40', '2020-12-01 17:03:40'),
(8, NULL, 'images/lake_forest_trees_188315_1920x1080.jpg', 'image', 1, 1, '2020-12-01 17:03:40', '2020-12-01 17:03:40'),
(9, NULL, 'images/lake_forest_landscape_79459_1920x1080(1).jpg', 'image', 1, 1, '2020-12-05 11:42:13', '2020-12-05 11:42:13'),
(10, NULL, 'images/nebula_space_stars_171352_1920x1080.jpg', 'image', 1, 1, '2020-12-27 06:15:01', '2020-12-27 06:15:01');

-- --------------------------------------------------------

--
-- Table structure for table `file_store_refs`
--

CREATE TABLE `file_store_refs` (
  `id` int UNSIGNED NOT NULL,
  `lang` char(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_id` bigint UNSIGNED NOT NULL,
  `reference_id` int NOT NULL,
  `reference_type` tinyint UNSIGNED NOT NULL,
  `sort` smallint NOT NULL DEFAULT '1',
  `pin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `file_store_refs`
--

INSERT INTO `file_store_refs` (`id`, `lang`, `file_id`, `reference_id`, `reference_type`, `sort`, `pin`) VALUES
(1, 'en', 6, 9, 3, 1, 0),
(2, 'en', 7, 9, 3, 1, 0),
(3, 'en', 9, 9, 3, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `helper_fields`
--

CREATE TABLE `helper_fields` (
  `id` int UNSIGNED NOT NULL,
  `lang` char(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang_id` smallint UNSIGNED NOT NULL,
  `keyword` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `type` tinyint UNSIGNED NOT NULL,
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
(8, 'en', 8, 'main_title', 'Test Title', 'Project main title', 1, '2020-04-01 15:37:40', NULL),
(10, 'en', 10, 'intro2', '[intro2 title=\"We are Web Design Heroes`\" desc=\"Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis\"][/intro2]', 'Home page intro section 2', 3, '2020-05-07 08:23:14', '2020-05-07 08:25:33'),
(11, 'en', 11, 'intro3', '[intro3 image=\"bio.png\" title_part1=\"Fully\" title_highlighted=\"Responsive\" title_part2=\"HTML5 Template\" desc=\"Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis\"][/intro3]', 'Home page intro section 3', 3, '2020-05-07 08:43:20', '2020-05-08 08:10:58'),
(12, 'en', 12, 'blog_page_id', '6', 'Blog page ID', 1, '2020-05-08 07:06:39', NULL),
(13, 'en', 13, 'facebook_url', 'http://www.facebook.com/Google', 'facebook url', 1, '2020-05-29 07:06:49', '2020-05-29 08:53:53'),
(14, 'en', 14, 'twitter_url', 'http://twitter.com', 'twitter url', 1, '2020-05-29 07:07:49', '2020-05-29 08:55:29'),
(15, 'en', 15, 'instagram_url', 'instagram.com', 'instagram url', 1, '2020-05-29 07:17:08', NULL),
(16, 'en', 16, 'footer_quote', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt.', 'footer quote', 2, '2020-05-29 07:28:35', NULL),
(17, 'en', 17, 'footer_desc', 'Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat.', 'footer description', 2, '2020-05-29 07:30:30', NULL),
(18, 'en', 18, 'footer_image', 'images/blog-04.jpg', 'footer image', 4, '2020-05-29 08:25:42', NULL),
(19, 'en', 19, 'contact_id', '5', 'Contact page id', 1, '2020-06-07 08:17:52', NULL),
(20, 'en', 20, 'premium_features', '/products/product-2', 'Premium Features', 1, '2020-12-24 05:21:15', '2020-12-24 05:21:32');

-- --------------------------------------------------------

--
-- Table structure for table `map_coordinates`
--

CREATE TABLE `map_coordinates` (
  `id` smallint UNSIGNED NOT NULL,
  `lat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lng` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `zoom` decimal(8,2) NOT NULL,
  `template_type` tinyint NOT NULL,
  `page_id` int UNSIGNED NOT NULL
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
  `id` smallint UNSIGNED NOT NULL,
  `lang` char(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang_id` smallint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lng` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `page_id` int UNSIGNED NOT NULL,
  `sort` smallint UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `markers`
--

INSERT INTO `markers` (`id`, `lang`, `lang_id`, `title`, `desc`, `lat`, `lng`, `page_id`, `sort`) VALUES
(1, 'en', 1, 'test', 'test', '41.729552407870614', '44.75445207548097', 5, 2),
(2, 'de', 1, 'de_test', NULL, '41.719378', '44.792526', 5, 1),
(3, 'en', 3, 'test2', 'test2', '41.72385692311951', '44.72950994411195', 5, 1),
(4, 'de', 3, 'de_test2', NULL, '41.719378', '44.792526', 5, 2),
(6, 'de', 5, 'de_fsf', NULL, '41.719378', '44.792526', 5, 3);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` bigint UNSIGNED NOT NULL,
  `lang` char(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang_id` smallint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `main` tinyint(1) NOT NULL DEFAULT '0',
  `page_id` int UNSIGNED DEFAULT NULL,
  `parent_id` smallint DEFAULT NULL,
  `hidden` tinyint UNSIGNED NOT NULL DEFAULT '0',
  `sort` smallint UNSIGNED NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `lang`, `lang_id`, `title`, `main`, `page_id`, `parent_id`, `hidden`, `sort`, `created_at`, `updated_at`) VALUES
(18, 'en', 18, 'Products', 0, 2, NULL, 0, 6, NULL, '2020-03-19 04:43:21'),
(20, 'en', 20, 'Contacts', 0, 5, NULL, 0, 8, NULL, '2020-03-25 08:00:02'),
(23, 'en', 23, 'Home', 1, NULL, NULL, 0, 1, NULL, NULL),
(25, 'en', 25, 'About Us', 0, 1, NULL, 0, 9, NULL, '2020-06-08 02:25:00'),
(26, 'en', 26, 'Parent', 0, NULL, NULL, 0, 2, NULL, NULL),
(27, 'en', 27, 'test', 0, NULL, 26, 0, 3, NULL, NULL),
(28, 'en', 28, 'test2', 0, NULL, 26, 0, 4, NULL, NULL),
(29, 'en', 29, 'Service 1', 0, NULL, 27, 0, 5, NULL, '2020-06-10 17:04:14'),
(31, 'en', 31, 'Gallery', 0, 9, NULL, 0, 7, NULL, '2020-12-01 17:04:15');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
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
(24, '2019_10_03_184118_create_translates_table', 6),
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
(47, '2020_04_12_184223_create_reviews_table', 19),
(48, '2019_08_19_000000_create_failed_jobs_table', 20),
(50, '2020_09_06_202520_create_file_store_refs_table', 21),
(54, '2020_12_26_215123_create_banners_table', 22);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int UNSIGNED NOT NULL,
  `lang` char(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang_id` smallint UNSIGNED NOT NULL,
  `slug` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `text` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `main_image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hidden` tinyint DEFAULT '0',
  `sort` smallint UNSIGNED NOT NULL DEFAULT '1',
  `user_id` smallint UNSIGNED NOT NULL,
  `page_type_id` tinyint UNSIGNED DEFAULT NULL,
  `page_template_id` tinyint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `lang`, `lang_id`, `slug`, `title`, `desc`, `text`, `main_image`, `hidden`, `sort`, `user_id`, `page_type_id`, `page_template_id`, `created_at`, `updated_at`) VALUES
(1, 'en', 1, 'about_us', 'About Us', NULL, '<h2 style=\"text-align: left;\">Investigationes demonstraverunt lectores</h2>\r\n<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.<br />Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>\r\n<p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.<br /><br /></p>\r\n<blockquote>Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima.</blockquote>\r\n<p><br />Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum.</p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; background-color: #ffffff;\">&nbsp;</p>', 'images/Penguins.jpg', 0, 5, 1, 0, 0, NULL, '2020-06-14 10:33:33'),
(2, 'en', 2, 'products', 'Products', NULL, NULL, NULL, 0, 2, 1, 1, 1, NULL, '2020-03-22 15:07:10'),
(5, 'en', 5, 'contacts', 'Contacts', NULL, NULL, NULL, 0, 4, 1, 2, 0, NULL, NULL),
(7, 'en', 6, 'blog', 'Blog', NULL, NULL, NULL, 0, 1, 1, 1, 0, NULL, '2020-12-12 11:47:26'),
(9, 'en', 9, 'gallery', 'Gallery', NULL, NULL, NULL, 0, 3, 1, 3, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int UNSIGNED NOT NULL,
  `title` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `permissions` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `title`, `permissions`, `created_at`, `updated_at`) VALUES
(1, 'administrator', '{\"menu\":{\"read\":\"1\",\"write\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"sort\":\"1\"},\"pages\":{\"read\":\"1\",\"write\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"sort\":\"1\",\"editPage\":\"1\"},\"sliders\":{\"read\":\"1\",\"write\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"sort\":\"1\"},\"reviews\":{\"read\":\"1\",\"write\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"sort\":\"1\"},\"articles\":{\"read\":\"1\",\"write\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"contact\":{\"read\":\"1\",\"write\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"sort\":\"1\"},\"file_store\":{\"read\":\"1\",\"write\":\"1\",\"delete\":\"1\"},\"languages\":{\"read\":\"1\",\"write\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"helper_fields\":{\"read\":\"1\",\"write\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"gallery\":{\"read\":\"1\"},\"banners\":{\"read\":\"1\",\"write\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"sort\":\"1\"},\"translates\":{\"read\":\"1\",\"write\":\"1\",\"edit\":\"1\",\"delete\":\"1\"}}', '2019-08-07 16:06:20', '2021-01-19 08:52:39');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` int UNSIGNED NOT NULL,
  `lang` char(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang_id` int UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `src` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` tinyint UNSIGNED NOT NULL DEFAULT '1',
  `visible` tinyint UNSIGNED NOT NULL DEFAULT '1',
  `sort` smallint UNSIGNED NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `lang`, `lang_id`, `title`, `sub_title`, `desc`, `src`, `url`, `position`, `visible`, `sort`, `created_at`, `updated_at`) VALUES
(1, 'en', 1, 'Slider one', 'Slider sub title one', '<p>Slider description one ...</p>', 'images/beaches_panoramic2.jpg', 'http://google.com', 1, 1, 1, NULL, '2020-05-05 11:01:20'),
(2, 'en', 2, 'Lorem Ipsum', 'Slider sub title two', '<h3>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h3>', 'images/01-boxed.jpg', 'http://google.com', 1, 1, 2, NULL, '2020-05-05 10:39:16');

-- --------------------------------------------------------

--
-- Table structure for table `translates`
--

CREATE TABLE `translates` (
  `id` int UNSIGNED NOT NULL,
  `lang` char(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang_id` smallint UNSIGNED NOT NULL,
  `keyword` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `hidden` tinyint UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `translates`
--

INSERT INTO `translates` (`id`, `lang`, `lang_id`, `keyword`, `value`, `hidden`, `created_at`, `updated_at`) VALUES
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
(20, 'en', 20, 'reviews', 'Reviews', 0, '2020-04-12 14:37:07', NULL),
(21, 'en', 21, 'intro_section3_bottom_text', 'Try resize your browser window', 0, '2020-05-07 08:48:34', NULL),
(22, 'en', 22, 'footer_our_philosophy', 'OUR PHILOSOPHY', 0, '2020-05-29 07:25:23', NULL),
(23, 'en', 23, 'about_our_company', 'ABOUT OUR COMPANY', 0, '2020-05-29 07:27:23', NULL),
(24, 'en', 24, 'contact_us', 'Contact Us', 0, '2020-05-29 08:44:48', NULL),
(25, 'en', 25, 'phone', 'Phone', 0, '2020-05-29 08:47:48', '2021-01-19 08:55:58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` smallint UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int UNSIGNED NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`),
  ADD KEY `banners_sort_index` (`sort`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `file_store`
--
ALTER TABLE `file_store`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `file_store_refs`
--
ALTER TABLE `file_store_refs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `file_store_refs_lang_file_id_reference_id_reference_type_unique` (`lang`,`file_id`,`reference_id`,`reference_type`),
  ADD KEY `file_store_refs_file_id_foreign` (`file_id`),
  ADD KEY `file_store_refs_sort_index` (`sort`);

--
-- Indexes for table `helper_fields`
--
ALTER TABLE `helper_fields`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `helper_fields_lang_lang_id_unique` (`lang`,`lang_id`),
  ADD UNIQUE KEY `helper_fields_lang_keyword_unique` (`lang`,`keyword`),
  ADD KEY `helper_fields_type_index` (`type`);

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
-- Indexes for table `translates`
--
ALTER TABLE `translates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `languages_lang_lang_id_unique` (`lang`,`lang_id`),
  ADD KEY `languages_hidden_index` (`hidden`);

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
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `file_store`
--
ALTER TABLE `file_store`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `file_store_refs`
--
ALTER TABLE `file_store_refs`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `helper_fields`
--
ALTER TABLE `helper_fields`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `map_coordinates`
--
ALTER TABLE `map_coordinates`
  MODIFY `id` smallint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `markers`
--
ALTER TABLE `markers`
  MODIFY `id` smallint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `translates`
--
ALTER TABLE `translates`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` smallint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `file_store_refs`
--
ALTER TABLE `file_store_refs`
  ADD CONSTRAINT `file_store_refs_file_id_foreign` FOREIGN KEY (`file_id`) REFERENCES `file_store` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
