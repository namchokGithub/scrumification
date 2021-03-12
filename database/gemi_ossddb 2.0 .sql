-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2021 at 06:38 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gemi_ossddb`
--

-- --------------------------------------------------------

--
-- Table structure for table `achievement`
--

CREATE TABLE `achievement` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `detail` text DEFAULT NULL,
  `point` int(11) NOT NULL,
  `target_activity` int(11) DEFAULT NULL COMMENT '0 = เป็นรางวัลพิเศษไม่ได้เกี่ยวกับกิจกรรม'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `achievement`
--

INSERT INTO `achievement` (`id`, `name`, `detail`, `point`, `target_activity`) VALUES
(2, 'ช่วยสาวน้อยจากการหาของ', 'มอบโดยตรงจากอาจารย์ว่าน', 1000, 0),
(3, 'ยอดนักเต้นรำ', 'ได้จากการเข้าร่วมการเต้นรำ', 1000, 0),
(32, 'คนเก่งของหมี', 'คนเก่งของหมี', 999, 0),
(34, 'ทดสอบ', '123456', 1000, 2),
(35, 'SP', 'Sprint Planning ', 50, 2),
(36, 'SR', 'SR', 1000, 3);

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `id` int(11) NOT NULL,
  `name` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `time_start` time NOT NULL,
  `time_end` time NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `status` tinyint(3) DEFAULT 1 COMMENT '0 = "ไม่ใช่งาน"  1 = "ใช่งาน"',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`id`, `name`, `time_start`, `time_end`, `date_start`, `date_end`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'Sprint Planning ', '10:30:00', '16:30:00', '2020-02-03', '2021-04-04', 1, '2021-01-21 17:00:00', '2021-01-21 17:00:00', NULL),
(3, 'Sprint Review', '10:00:00', '13:00:00', '2021-03-09', '2021-03-09', 1, '2021-01-21 17:00:00', '2021-01-21 17:00:00', NULL),
(4, 'Sprint Retrospect', '13:45:00', '18:00:00', '2020-03-03', '2022-12-03', 1, '2021-01-21 17:00:00', '2021-01-21 17:00:00', NULL),
(17, 'Daily Scrum', '05:00:00', '23:30:00', '2021-03-07', '2021-03-09', 1, '2021-01-21 17:00:00', '2021-01-21 17:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `activity_checkin`
--

CREATE TABLE `activity_checkin` (
  `id` int(11) NOT NULL,
  `activity_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `activity_checkin`
--

INSERT INTO `activity_checkin` (`id`, `activity_id`, `user_id`, `time`) VALUES
(15, 1, 419, '2020-03-17 08:19:34'),
(20, 1, 383, '2020-03-17 10:02:18'),
(21, 1, 384, '2020-03-17 10:02:38'),
(22, 1, 382, '2020-03-17 10:02:39'),
(23, 1, 381, '2020-03-17 10:02:40'),
(26, 2, 384, '2020-03-17 10:03:57'),
(27, 2, 382, '2020-03-17 10:03:58'),
(28, 2, 383, '2020-03-17 10:04:00'),
(29, 2, 385, '2020-03-17 10:04:02'),
(30, 2, 386, '2020-03-17 10:04:02'),
(31, 2, 387, '2020-03-17 10:04:03'),
(32, 1, 385, '2020-03-17 10:37:04'),
(33, 1, 386, '2020-03-17 10:37:05'),
(34, 1, 387, '2020-03-17 10:37:06'),
(35, 1, 403, '2020-03-17 10:37:13'),
(36, 1, 404, '2020-03-17 10:37:13'),
(37, 1, 405, '2020-03-17 10:37:14'),
(38, 2, 381, '2020-03-17 10:56:40'),
(39, 2, 411, '2020-03-17 10:56:58'),
(42, 12, 411, '2020-03-17 10:57:02'),
(49, 2, 412, '2020-03-17 10:58:12'),
(50, 2, 413, '2020-03-17 10:58:13'),
(52, 5, 411, '2020-03-17 10:58:41'),
(53, 5, 410, '2020-03-17 10:58:41'),
(54, 2, 381, '2020-03-19 02:51:22'),
(65, 17, 388, '2020-04-06 23:12:54'),
(66, 17, 389, '2020-04-06 23:12:55'),
(67, 17, 390, '2020-04-06 23:12:55'),
(68, 17, 391, '2020-04-06 23:12:56'),
(69, 17, 392, '2020-04-06 23:12:56'),
(70, 17, 393, '2020-04-06 23:13:19'),
(71, 17, 394, '2020-04-06 23:13:19'),
(72, 17, 395, '2020-04-06 23:13:20'),
(73, 17, 470, '2020-04-06 23:13:20'),
(74, 17, 477, '2020-04-06 23:13:21'),
(75, 17, 381, '2020-09-20 22:35:07'),
(76, 17, 382, '2020-09-20 22:35:08'),
(77, 17, 383, '2020-09-20 22:35:10'),
(78, 2, 381, '2020-09-20 22:35:15'),
(79, 17, 384, '2020-09-20 22:35:59'),
(80, 17, 385, '2020-09-20 22:35:59'),
(81, 17, 386, '2020-09-20 22:35:59'),
(82, 17, 387, '2020-09-20 22:36:00'),
(86, 3, 382, '2020-10-20 16:31:22'),
(87, 3, 383, '2020-10-20 16:31:23'),
(88, 3, 384, '2020-10-20 16:31:23'),
(89, 3, 385, '2020-10-20 16:31:24'),
(90, 3, 386, '2020-10-20 16:31:24'),
(91, 3, 387, '2020-10-20 16:31:24'),
(94, 3, 381, '2020-10-20 16:52:38'),
(106, 17, 383, '2020-11-23 14:26:06'),
(107, 17, 384, '2020-11-23 14:26:06'),
(108, 17, 385, '2020-11-23 14:26:07'),
(109, 17, 386, '2020-11-23 14:26:07'),
(110, 17, 387, '2020-11-23 14:26:09'),
(112, 17, 382, '2020-11-23 15:03:52'),
(126, 17, 388, '2020-11-23 15:49:44'),
(127, 17, 389, '2020-11-23 15:49:46'),
(128, 17, 390, '2020-11-23 15:49:47'),
(129, 17, 391, '2020-11-23 15:50:06'),
(130, 17, 392, '2020-11-23 15:50:07'),
(131, 17, 393, '2020-11-23 15:50:09'),
(132, 17, 394, '2020-11-23 15:50:10'),
(133, 17, 395, '2020-11-23 15:50:12'),
(134, 17, 470, '2020-11-23 15:50:13'),
(135, 17, 381, '2020-11-23 15:50:32'),
(137, 17, 382, '2020-11-24 10:04:09'),
(138, 17, 383, '2020-11-24 10:04:11'),
(139, 17, 385, '2020-11-24 10:04:14'),
(140, 17, 384, '2020-11-24 10:04:15'),
(141, 17, 386, '2020-11-24 10:04:17'),
(142, 17, 387, '2020-11-24 10:04:18'),
(143, 17, 381, '2020-11-24 10:05:55'),
(144, 2, 381, '2020-11-24 10:11:20'),
(145, 2, 382, '2020-11-24 10:11:22'),
(146, 2, 383, '2020-11-24 10:11:26'),
(147, 2, 384, '2020-11-24 10:11:28'),
(148, 2, 385, '2020-11-24 10:11:38'),
(149, 2, 386, '2020-11-24 10:11:40'),
(150, 2, 387, '2020-11-24 10:11:42'),
(151, 3, 381, '2020-11-24 10:11:54'),
(152, 3, 382, '2020-11-24 10:11:55'),
(153, 3, 383, '2020-11-24 10:11:57'),
(154, 3, 384, '2020-11-24 10:11:59'),
(155, 3, 385, '2020-11-24 10:12:00'),
(156, 3, 386, '2020-11-24 10:12:01'),
(157, 3, 387, '2020-11-24 10:12:03'),
(158, 4, 381, '2020-11-24 10:12:15'),
(159, 4, 382, '2020-11-24 10:12:16'),
(160, 4, 383, '2020-11-24 10:12:17'),
(161, 4, 384, '2020-11-24 10:12:19'),
(162, 4, 385, '2020-11-24 10:12:25'),
(163, 4, 386, '2020-11-24 10:12:27'),
(164, 4, 387, '2020-11-24 10:12:28'),
(165, 3, 381, '2020-11-25 09:20:34'),
(166, 3, 382, '2020-11-25 09:20:34'),
(167, 3, 383, '2020-11-25 09:20:35'),
(168, 3, 384, '2020-11-25 09:20:36'),
(169, 3, 385, '2020-11-25 09:20:36'),
(172, 2, 383, '2020-11-25 09:21:28'),
(174, 2, 385, '2020-11-25 09:21:31'),
(175, 2, 386, '2020-11-25 09:21:32'),
(176, 2, 384, '2020-11-25 09:21:32'),
(184, 3, 381, '2020-11-26 14:00:05'),
(213, 4, 381, '2020-12-01 11:20:01'),
(214, 4, 382, '2020-12-01 11:20:01'),
(215, 4, 383, '2020-12-01 11:20:02'),
(216, 4, 384, '2020-12-01 11:20:02'),
(217, 4, 385, '2020-12-01 11:20:03'),
(218, 4, 386, '2020-12-01 11:20:03'),
(219, 4, 387, '2020-12-01 11:20:04'),
(220, 2, 381, '2020-12-01 11:27:33'),
(221, 2, 382, '2020-12-01 11:27:34'),
(222, 2, 383, '2020-12-01 11:27:35'),
(223, 2, 384, '2020-12-01 11:27:35'),
(224, 2, 385, '2020-12-01 11:27:36'),
(225, 2, 386, '2020-12-01 11:27:36'),
(227, 3, 418, '2020-12-01 11:28:29'),
(228, 3, 419, '2020-12-01 11:28:29'),
(229, 3, 420, '2020-12-01 11:28:30'),
(230, 3, 421, '2020-12-01 11:29:43'),
(231, 3, 422, '2020-12-01 11:29:43'),
(232, 3, 423, '2020-12-01 11:29:44'),
(233, 3, 424, '2020-12-01 11:29:45'),
(234, 3, 403, '2020-12-01 11:42:10'),
(235, 3, 404, '2020-12-01 11:42:10'),
(236, 3, 406, '2020-12-01 11:42:11'),
(237, 3, 407, '2020-12-01 11:42:12'),
(238, 3, 408, '2020-12-01 11:42:12'),
(239, 3, 409, '2020-12-01 11:42:13'),
(240, 3, 405, '2020-12-01 11:42:13'),
(252, 3, 381, '2020-12-04 21:32:07'),
(254, 3, 383, '2021-01-14 10:06:48'),
(255, 3, 384, '2021-01-14 10:11:51'),
(256, 3, 385, '2021-01-14 10:11:52'),
(257, 3, 386, '2021-01-14 10:11:53'),
(258, 3, 387, '2021-01-14 10:11:58'),
(261, 3, 383, '2021-01-22 13:50:17'),
(263, 3, 385, '2021-01-22 13:50:35'),
(264, 3, 386, '2021-01-22 13:50:37'),
(266, 2, 387, '2021-01-22 13:51:36'),
(272, 2, 381, '2021-01-22 14:05:00'),
(274, 3, 381, '2021-01-22 14:11:56'),
(275, 3, 388, '2021-01-22 14:31:17'),
(276, 3, 389, '2021-01-22 14:31:25'),
(277, 3, 425, '2021-01-24 20:48:27'),
(278, 3, 426, '2021-01-24 20:58:28'),
(279, 3, 427, '2021-01-24 20:58:28'),
(280, 3, 428, '2021-01-24 20:58:29'),
(281, 3, 429, '2021-01-24 20:58:29'),
(283, 3, 426, '2021-01-25 12:20:22'),
(284, 3, 428, '2021-01-25 12:20:23'),
(285, 3, 429, '2021-01-25 12:20:23'),
(288, 3, 427, '2021-01-25 12:26:23'),
(291, 3, 425, '2021-01-25 13:08:40'),
(295, 3, 382, '2021-01-25 13:43:47'),
(296, 3, 383, '2021-01-25 13:43:47'),
(297, 3, 384, '2021-01-25 13:43:47'),
(298, 3, 385, '2021-01-25 13:43:48'),
(299, 3, 410, '2021-02-23 15:22:12'),
(300, 3, 411, '2021-02-23 15:22:13'),
(301, 3, 412, '2021-02-23 15:22:15'),
(302, 3, 402, '2021-02-23 15:45:04'),
(303, 3, 401, '2021-02-23 15:45:05'),
(304, 3, 400, '2021-02-23 15:45:07'),
(305, 3, 399, '2021-02-23 15:45:07'),
(306, 3, 398, '2021-02-23 15:45:08'),
(307, 3, 397, '2021-02-23 15:45:08'),
(308, 3, 396, '2021-02-23 15:45:08'),
(309, 3, 413, '2021-02-24 13:59:17'),
(310, 3, 410, '2021-02-24 13:59:24'),
(311, 3, 415, '2021-02-24 13:59:25'),
(313, 3, 396, '2021-02-24 13:59:45'),
(314, 3, 397, '2021-02-24 13:59:48'),
(315, 3, 429, '2021-02-24 13:59:59'),
(316, 3, 428, '2021-02-24 13:59:59'),
(317, 3, 427, '2021-02-24 14:00:00'),
(318, 3, 425, '2021-02-24 14:00:01'),
(319, 3, 426, '2021-02-24 14:00:04'),
(320, 3, 418, '2021-02-24 14:00:43'),
(321, 3, 419, '2021-02-24 14:00:44'),
(322, 3, 420, '2021-02-24 14:00:46'),
(323, 3, 421, '2021-02-24 14:00:46'),
(324, 3, 422, '2021-02-24 14:00:47'),
(325, 3, 423, '2021-02-24 14:01:04'),
(326, 3, 424, '2021-02-24 14:01:05'),
(328, 3, 383, '2021-03-02 10:41:07'),
(329, 3, 384, '2021-03-02 10:41:07'),
(330, 3, 385, '2021-03-02 10:41:08'),
(332, 3, 386, '2021-03-02 10:41:10'),
(334, 2, 384, '2021-03-02 10:41:16'),
(335, 2, 386, '2021-03-02 10:41:17'),
(336, 2, 382, '2021-03-02 10:41:18'),
(337, 2, 381, '2021-03-02 10:41:18'),
(338, 2, 383, '2021-03-02 10:41:20'),
(339, 3, 425, '2021-03-02 10:41:34'),
(340, 3, 426, '2021-03-02 10:41:34'),
(341, 3, 427, '2021-03-02 10:41:34'),
(343, 3, 429, '2021-03-02 10:41:35'),
(344, 2, 425, '2021-03-02 10:41:41'),
(345, 2, 426, '2021-03-02 10:41:42'),
(346, 2, 427, '2021-03-02 10:41:42'),
(347, 2, 428, '2021-03-02 10:41:42'),
(348, 2, 429, '2021-03-02 10:41:43'),
(366, 3, 396, '2021-03-03 15:09:04'),
(367, 3, 397, '2021-03-03 15:09:05'),
(368, 3, 398, '2021-03-03 15:09:06'),
(369, 3, 399, '2021-03-03 15:09:06'),
(370, 3, 400, '2021-03-03 15:09:07'),
(371, 3, 401, '2021-03-03 15:09:07'),
(372, 3, 402, '2021-03-03 15:09:08'),
(384, 2, 381, '2021-03-04 13:27:14'),
(385, 2, 382, '2021-03-04 13:27:16'),
(386, 2, 383, '2021-03-04 13:27:20'),
(388, 2, 429, '2021-03-04 13:28:13'),
(391, 17, 425, '2021-03-04 14:00:59'),
(393, 17, 427, '2021-03-04 14:01:02'),
(394, 17, 428, '2021-03-04 14:01:04'),
(395, 17, 429, '2021-03-04 14:01:26'),
(396, 17, 426, '2021-03-04 14:02:32'),
(398, 17, 392, '2021-03-04 14:14:30'),
(404, 2, 389, '2021-03-06 15:05:05'),
(405, 2, 390, '2021-03-06 15:05:07'),
(406, 17, 436, '2021-03-07 22:28:26'),
(407, 17, 433, '2021-03-07 22:28:26'),
(408, 17, 431, '2021-03-07 22:28:27'),
(409, 17, 437, '2021-03-07 22:28:32');

-- --------------------------------------------------------

--
-- Table structure for table `individual`
--

CREATE TABLE `individual` (
  `id` int(11) NOT NULL,
  `name_indi` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `detail_indi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `individual`
--

INSERT INTO `individual` (`id`, `name_indi`, `detail_indi`) VALUES
(1, 'Task Killer', 'นักจัดการงานยอดเยี่ยม'),
(2, 'God of HTML', 'สุดยอดนักสร้าง HTML'),
(3, 'God of PHP', 'สุดยอดนักจัดการตัวควบคุมระบบ'),
(4, 'God of SQL', 'สุดยอดนักจัดการฐานข้อมูล'),
(5, 'God of CSS', 'สุดยอดนักตกแต่ง'),
(6, 'God of Java Script', 'สุดยอดนักจัดองค์ประกอบ'),
(7, 'God of Document', 'สุดยอดนักทำเอกสารประกอบซอฟต์แวร์'),
(9, 'God of Helper', 'สุดยอดนักช่วยเหลือหรือ Support'),
(10, 'God of Tester', 'สุดยอดนักทดสอบระบบ');

-- --------------------------------------------------------

--
-- Table structure for table `log_achievement`
--

CREATE TABLE `log_achievement` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `achievement_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `log_achievement`
--

INSERT INTO `log_achievement` (`id`, `role_id`, `achievement_id`, `created_at`) VALUES
(1, 3, 32, '2020-11-30 17:00:00'),
(2, 8, 3, '2021-01-04 17:00:00'),
(3, 8, 2, '2021-03-01 17:00:00'),
(12, 8, 32, '2021-01-10 20:21:17'),
(16, 7, 3, '2021-01-26 02:08:31'),
(19, 7, 32, '2021-01-03 17:00:00'),
(20, 7, 32, '2020-12-08 23:34:17');

-- --------------------------------------------------------

--
-- Table structure for table `log_shop`
--

CREATE TABLE `log_shop` (
  `role_id` int(11) NOT NULL,
  `shop_id` int(11) NOT NULL,
  `total` int(11) NOT NULL DEFAULT 1,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '-1 =  "ไม่มีไอเทม" 0 = "ห้ามใช้งาน"  1 = "ใช้งานได้" 2 = "ร้องขอการใช้งาน"',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `log_shop`
--

INSERT INTO `log_shop` (`role_id`, `shop_id`, `total`, `status`, `created_at`, `updated_at`) VALUES
(1, 26, 6, 1, NULL, '2021-03-09 03:28:28'),
(1, 27, 4, 0, '2021-03-05 15:35:36', '2021-03-09 03:25:02'),
(2, 1, 0, -1, NULL, NULL),
(2, 5, 0, -1, NULL, NULL),
(2, 25, 0, -1, NULL, NULL),
(2, 26, 1, 0, NULL, NULL),
(3, 1, 14, 0, NULL, '2021-03-09 03:31:47'),
(3, 25, 3, 0, NULL, NULL),
(3, 26, 0, 1, '2021-03-04 13:41:36', '2021-03-09 03:33:59'),
(4, 26, 2, 1, '2021-03-05 15:23:45', '2021-03-05 16:21:47'),
(4, 27, 1, 0, '2021-03-05 15:48:45', '2021-03-05 15:48:45'),
(5, 26, 1, 0, '2021-03-11 14:07:04', '2021-03-11 14:14:56'),
(5, 27, 1, 0, '2021-03-11 14:09:10', '2021-03-11 14:09:10'),
(7, 25, 1, 0, NULL, NULL),
(7, 26, 4, 1, '2021-03-09 03:13:36', '2021-03-09 03:15:01'),
(7, 27, 5, 0, '2021-03-09 03:13:40', '2021-03-09 03:13:40'),
(8, 26, 2, 0, NULL, NULL),
(8, 27, 1, 0, '2021-03-11 13:58:07', '2021-03-11 13:58:07'),
(9, 2, 3, 0, NULL, NULL),
(10, 26, 3, 0, '2021-03-06 05:56:16', '2021-03-08 18:47:56');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `display_name` varchar(100) DEFAULT NULL,
  `description` tinytext DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `permission_roles`
--

CREATE TABLE `permission_roles` (
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `relation_role`
--

CREATE TABLE `relation_role` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `target_role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `relation_role`
--

INSERT INTO `relation_role` (`id`, `role_id`, `target_role_id`) VALUES
(1, 1, 14),
(2, 2, 15),
(3, 3, 16),
(4, 4, 17),
(5, 5, 18),
(6, 6, 19),
(7, 7, 20),
(8, 8, 21),
(9, 9, 22),
(10, 10, 23);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `name` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1 COMMENT '0 = "ไม่ใช้งาน"  1 = "ใช้งาน"',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `image_path` text DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `status`, `created_at`, `updated_at`, `deleted_at`, `image_path`, `color`) VALUES
(1, 'มกุล 0', 'สมาชิกมกุล 0', 'C-Student00 Role', 1, NULL, '2021-03-11 15:26:56', NULL, 'assets/dist/img/cluster/cluster0.png', '#f50049'),
(2, 'มกุล 1', 'สมาชิกมกุล 1', 'C-Student01 Role', 1, NULL, '2021-03-07 15:39:25', NULL, 'assets/dist/img/cluster/cluster1.png', '#00ff01'),
(3, 'มกุล 2', 'สมาชิกมกุล 2', 'C-Student02 Role', 1, NULL, '2021-03-07 14:49:07', NULL, 'assets/dist/img/cluster/cluster2.png', '#191971'),
(4, 'มกุล 3', 'สมาชิกมกุล 3', 'C-Student03 Role', 1, NULL, NULL, NULL, 'assets/dist/img/cluster/cluster3.png', '#9282c9'),
(5, 'มกุล 4', 'สมาชิกมกุล 4', 'C-Student04 Role', 1, NULL, NULL, NULL, 'assets/dist/img/cluster/cluster4.png', '#ff4500'),
(6, 'มกุล 5', 'สมาชิกมกุล 5', 'C-Student05 Role', 1, NULL, NULL, NULL, 'assets/dist/img/cluster/cluster5.png', '#6796b4'),
(7, 'มกุล 6', 'สมาชิกมกุล 6', 'C-Student06 Role', 1, NULL, NULL, NULL, 'assets/dist/img/cluster/cluster6.png', '#ff841a'),
(8, 'มกุล 7', 'สมาชิกมกุล 7', 'C-Student07 Role', 1, NULL, NULL, NULL, 'assets/dist/img/cluster/cluster7.png', '#bf1441'),
(9, 'มกุล 8', 'สมาชิกมกุล 8', 'C-Student08 Role', 1, NULL, NULL, NULL, 'assets/dist/img/cluster/cluster8.png', '#ffc59d'),
(10, 'มกุล 9', 'สมาชิกมกุล 9', 'C-Student09 Role', 1, NULL, NULL, NULL, 'assets/dist/img/cluster/cluster9.png', '#ef3536'),
(11, 'ProductOwener', 'ProductOwener', 'ProductOwener Role', 1, NULL, NULL, NULL, NULL, NULL),
(12, 'ScrumMaster', 'ScrumMaster', 'ScrumMaster Role', 1, NULL, NULL, NULL, NULL, NULL),
(13, 'Administrator', 'Administrator', 'Administrator', 1, NULL, NULL, NULL, NULL, NULL),
(14, 'พี่เลี้ยงมกุล 0', 'พี่เลี้ยงมกุล 0', 'พี่เลี้ยงมกุล 0', 1, NULL, NULL, NULL, NULL, NULL),
(15, 'พี่เลี้ยงมกุล 1', 'พี่เลี้ยงมกุล 1', 'พี่เลี้ยงมกุล 1', 1, NULL, NULL, NULL, NULL, NULL),
(16, 'พี่เลี้ยงมกุล 2', 'พี่เลี้ยงมกุล 2', 'พี่เลี้ยงมกุล2 role', 1, NULL, NULL, NULL, NULL, NULL),
(17, 'พี่เลี้ยงมกุล 3', 'พี่เลี้ยงมกุล 3', 'พี่เลี้ยงมกุล3 role', 1, NULL, NULL, NULL, NULL, NULL),
(18, 'พี่เลี้ยงมกุล 4', 'พี่เลี้ยงมกุล 4', 'พี่เลี้ยงมกุล4 role', 1, NULL, NULL, NULL, NULL, NULL),
(19, 'พี่เลี้ยงมกุล 5', 'พี่เลี้ยงมกุล 5', 'พี่เลี้ยงมกุล5 role', 1, NULL, NULL, NULL, NULL, NULL),
(20, 'พี่เลี้ยงมกุล 6', 'พี่เลี้ยงมกุล 6', 'พี่เลี้ยงมกุล6 role', 1, NULL, NULL, NULL, NULL, NULL),
(21, 'พี่เลี้ยงมกุล 7', 'พี่เลี้ยงมกุล 7', 'พี่เลี้ยงมกุล7 role', 1, NULL, NULL, NULL, NULL, NULL),
(22, 'พี่เลี้ยงมกุล 8', 'พี่เลี้ยงมกุล 8', 'พี่เลี้ยงมกุล8 role', 1, NULL, NULL, NULL, NULL, NULL),
(23, 'พี่เลี้ยงมกุล 9', 'พี่เลี้ยงมกุล 9', 'พี่เลี้ยงมกุล9 role', 1, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles_point`
--

CREATE TABLE `roles_point` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `raw_point` int(11) NOT NULL DEFAULT 0,
  `used_point` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles_point`
--

INSERT INTO `roles_point` (`id`, `role_id`, `raw_point`, `used_point`) VALUES
(1, 1, 10829, 2017),
(2, 2, 456, 2),
(3, 3, 3285, 8),
(4, 4, 778, 5),
(5, 5, 1144, 4),
(6, 6, 2000, 2000),
(7, 7, 8058, 17),
(8, 8, 2999, 2),
(9, 9, 750, 0),
(10, 10, 1939, 4);

-- --------------------------------------------------------

--
-- Table structure for table `roles_users`
--

CREATE TABLE `roles_users` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles_users`
--

INSERT INTO `roles_users` (`id`, `user_id`, `role_id`) VALUES
(2, 10, 12),
(3, 381, 1),
(4, 382, 1),
(5, 383, 1),
(6, 384, 1),
(7, 385, 1),
(8, 386, 1),
(9, 387, 1),
(10, 388, 2),
(11, 389, 2),
(12, 390, 2),
(13, 391, 2),
(14, 392, 2),
(15, 393, 2),
(16, 394, 2),
(17, 395, 2),
(18, 396, 3),
(19, 397, 3),
(20, 398, 3),
(21, 399, 3),
(22, 400, 3),
(23, 401, 3),
(24, 402, 3),
(25, 403, 4),
(26, 404, 4),
(27, 405, 4),
(28, 406, 4),
(29, 407, 4),
(30, 408, 4),
(31, 409, 4),
(32, 410, 5),
(33, 411, 5),
(34, 412, 5),
(35, 413, 5),
(36, 414, 5),
(37, 415, 5),
(38, 416, 5),
(39, 417, 5),
(40, 418, 6),
(41, 419, 6),
(42, 420, 6),
(43, 421, 6),
(44, 422, 6),
(45, 423, 6),
(46, 424, 6),
(47, 425, 7),
(48, 426, 7),
(49, 427, 7),
(50, 428, 7),
(51, 429, 7),
(52, 430, 8),
(53, 431, 8),
(54, 432, 8),
(55, 433, 8),
(56, 434, 8),
(57, 435, 8),
(58, 436, 8),
(59, 437, 8),
(77, 455, 18),
(79, 457, 20),
(80, 458, 21),
(85, 463, 4),
(86, 464, 4),
(90, 470, 2),
(93, 480, 13),
(95, 10, 13),
(96, 483, 13),
(97, 484, 21),
(98, 486, 13),
(99, 486, 12);

-- --------------------------------------------------------

--
-- Table structure for table `shop`
--

CREATE TABLE `shop` (
  `id` int(11) NOT NULL,
  `name` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `point` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `total` int(11) DEFAULT NULL,
  `time_start` datetime DEFAULT NULL,
  `time_end` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `shop`
--

INSERT INTO `shop` (`id`, `name`, `point`, `type`, `total`, `time_start`, `time_end`) VALUES
(1, 'บัตรจองตัวพี่', 5000, 1, 10, '2021-03-08 03:23:00', '2021-06-11 03:24:00'),
(4, 'บัตรหนีงานเต้นรำ', 15000, 2, 2, '2020-01-01 00:00:00', '2020-03-20 00:00:00'),
(5, 'บัตรต่อเวลาเครื่อง Server', 1000, 3, 4, '2020-03-04 19:00:00', '2020-03-05 00:00:00'),
(23, 'บัตรคอนเสิร์ต', 5000, 2, 2, '2020-03-03 09:00:00', '2020-03-03 18:00:00'),
(24, 'บัตรคนมีสิทธิ์มาสาย', 10000, 3, 4, '2020-03-18 22:00:00', '2020-03-18 23:00:00'),
(25, 'รับฟังบทเพลงกล่อมใจ', 2000, 3, 9, '2020-03-19 11:00:00', '2020-03-19 14:00:00'),
(26, 'รางวัล 1 บาท', 1, 1, 100, '2020-07-01 10:13:00', '2020-11-30 10:11:00'),
(27, 'เพิ่มเวลา Code', 2, 1, 10, '2020-11-26 00:00:00', '2025-05-02 22:28:00');

-- --------------------------------------------------------

--
-- Table structure for table `show_topic`
--

CREATE TABLE `show_topic` (
  `id` int(11) NOT NULL,
  `page` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `show_topic`
--

INSERT INTO `show_topic` (`id`, `page`, `status`) VALUES
(1, 'LeaderBoard', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `code` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `code`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(10, 'Jiranuwat Jaiyen', '59160161', '$2y$10$44DyGHpzfWCdYovSRkybWexGOACdHzyVVLYEQpmDvcpC6THNPWg8i', NULL, 1, NULL, NULL, NULL),
(381, 'นางสาวอภิชญา ขวัญจังหวัด (ป๊อปอาย)', '61160080', '$2y$10$cCYawFwaMTcq8bw2BSSVzut5wl4KkAHM2X8fBaG8x2RbDoOSwioBW', 'ประธานมกุล', 1, NULL, NULL, NULL),
(382, 'นายสรวิชญ์ มากศิริ (ปลื้ม)', '61160075', '$2y$10$ks/A9.a8qRNR.7lhwHCF.OHS2eucIOC42wyiEu/HVICkhNb9/tCbS', 'รองประธานมกุล', 1, NULL, NULL, NULL),
(383, 'นายธณัช จินตกานนท์ (เอิร์ธ)', '61160060', '$2y$10$Crirh5etr42uyHbJPeLfy.CD4pKT3Avfgt9geVY7Eho1wJaK2xdpa', NULL, 1, NULL, NULL, NULL),
(384, 'นางสาวหทัยกาญจน์ หิรัญนาค (ชะเอม)', '61160078', '$2y$10$ovZnXQ3kKJHq92fuYdteBOfCkI81Qj1t7mIMnO/j/1xc4z1JzQ/dq', NULL, 1, NULL, NULL, NULL),
(385, 'นายธนาดล ตั้งใจมงคล (โอ๊ด)', '61160178', '$2y$10$DH5pyRUiObjqnONNTeq0ue1Gv2FAhXha5zTjhDw7EaIXdJ3jqfb0q', NULL, 1, NULL, NULL, NULL),
(386, 'นายวิทยา เทพนวน (เป้)', '61160193', '$2y$10$y2VNOKVcFxInNv6q47lBR.vR98qIP1C/dA1aVttTGXnNSFaK1pYY6', NULL, 1, NULL, NULL, NULL),
(387, 'นางสาวกาญจนพิชชา มีสุข (เตย)', '61160276', '$2y$10$/akzoRq9QwhK7WyI72gYj.NmNMDeNVG3gewNqYEZRM2t7/CQHIDcK', NULL, 1, NULL, NULL, NULL),
(388, 'นางสาวสมฤทัย เกษฎา (นินิว)', '61160295', '$2y$10$wK/FJ38Sf2nQB.NZT/o2fuIsOBb20IErAbAZ6RMlnfWEqU/ycepB6', 'ประธานมกุล', 1, NULL, NULL, NULL),
(389, 'นายทิวา สิงหไพศาล (อั้น)', '61160059', '$2y$10$fpx/4GouglXRl7i4OiQ0.uIY6jnAdWQsbISBh0a3NFwX5P89GntJi', 'รองประธานมกุล', 1, NULL, NULL, NULL),
(390, 'นางสาวลภัสรดา พุทธมงคล (ฝ้าย)', '61160071', '$2y$10$HDJAEsIyQe/u2kGAeU4zfOSbIZVTXSfPM3ZRV14BuR3kPXQYK3DL.', NULL, 1, NULL, NULL, NULL),
(391, 'นายวิชภัทร์ หาญเหี้ยม (อาร์ม)', '61160074', '$2y$10$TzT.sPDlagZyzyFKq/zque6MbhvMTcK.uLJMHbVsjkgGgJYXkKjyC', NULL, 1, NULL, NULL, NULL),
(392, 'นายธณัท วงษ์โมฬี (กล้า)', '61160177', '$2y$10$E6GecLRUqHoIjumTpYkiZuXbQLTa6dBIsUrswdr9kcFwq1OBLrG4q', NULL, 1, NULL, NULL, NULL),
(393, 'นางสาวรตนพร บุญธรรม (ใบตอง)', '61160191', '$2y$10$sgbLzpX0qWFf4VMaVwWFMu/v9PznjymfqPzd.w1nJlgKqCTeXso8S', NULL, 1, NULL, NULL, NULL),
(394, 'นายวศิน ชาญชัยสวัสดิ์ (หย่ง)', '61160192', '$2y$10$o0i6Cua/YikHnDoX1HaCeew6V1NQZDemOfo8I55zfp/ETdjYpx8SG', NULL, 1, NULL, NULL, NULL),
(395, 'นายธิติพงศ์ พัทธเจริญพงศ์ (โอ๊ต)', '61160289', '$2y$10$ErXvMNLdttL.u6YeBjNvTuSWpl6KVQ5DI6bqq00JP2.kbCEhQqpsa', NULL, 1, NULL, NULL, NULL),
(396, 'นายวัชรพล วิเชียรฉาย (โอม)', '61160073', '$2y$10$WpSrSYHVE2bsT47YcrAyHe.jaoojkIGy.1dl1rAi6jTM8r9MmMIXK', 'ประธานมกุล', 1, NULL, NULL, NULL),
(397, 'นายณัฐปคัลภ์ ลิลา (เพจ)', '61160176', '$2y$10$Auti/NUhfpmylCZ43rWOdeq1Kh0qi4NLrE5Gzy4C1MdSCNNPLw/6i', 'รองประธานมกุล', 1, NULL, NULL, NULL),
(398, 'นายณัฐวุติ เจริญศิริ (ชิ)', '61160058', '$2y$10$dZK3fGEJO4tMUVQ3pCPWDeM9jYqq8EffnnQK0DwHNinwbC7xZMbXK', NULL, 1, NULL, NULL, NULL),
(399, 'นางสาวพิชญาภา เปี่ยมปฐม (แตงกวา)', '61160188', '$2y$10$x0do7Eq5PbuFXhTfTJEROeFvZ4/0Ac7g5avXv1pvvGJloTM.BA85m', NULL, 1, NULL, NULL, NULL),
(400, 'นายภานุวัฒน์ พันแพง (ตูน)', '61160190', '$2y$10$dVmYlVYhvdSEml6/OvDc1OYWyZrqEkzMbEVqUhZy9KWZ04nz3PCnO', NULL, 1, NULL, NULL, NULL),
(401, 'นายธนธรณ์ มงคลมะไฟ (ธาม)', '61160288', '$2y$10$JnutwpUyA/6bKMGVdfFf.uVFGqsTXgsxKKYviFPw2PMrFDneX.046', NULL, 1, NULL, NULL, NULL),
(402, 'นางสาวพีรณัฐ เพชรพลอย (เนม)', '61160292', '$2y$10$G8HsRCDpcPQlOzBCI/DHCOuOBMwVtFRhlnTlHewriN2WaeQp31zke', NULL, 1, NULL, NULL, NULL),
(403, 'นายวงศธร มาเอื้อย (เนิส)', '61160072', '$2y$10$nEsEJufutkaREjV/9XHyv.4v/momMF3X3sE29Ws9Kl5n3SZKRelf.', 'ประธานมกุล', 1, NULL, NULL, NULL),
(404, 'นายณัฐพัชญ์ สกุลสันติพร (กานต์)', '61160057', '$2y$10$.1aU8avyLacfwcSPkoROw.u2dsZjD/0rFLjdOk1wiw4UnlOHbUh6a', 'รองประธานมกุล', 1, NULL, NULL, NULL),
(405, 'นางสาวนราพร พงษ์ศิริ (ตาล)', '61160064', '$2y$10$MUmjhDlwSriEZLjZtzraVuU2YRoenw4TMOJUY5Mss8BhF59eMVKGW', NULL, 1, NULL, NULL, NULL),
(406, 'นายชัยชนะ ทองนุช (ลีโอ)', '61160175', '$2y$10$4I36doquB25MDzRoFatule2/Cv7cEJsPJc1QaBvMN/v01HtpiwP.S', NULL, 1, NULL, NULL, NULL),
(407, 'นางสาวพิชชาภัช ยุทธวิธี (เชอร์รี่)', '61160187', '$2y$10$2sOVVAO1/dS.aFZ05uhUS.b8Myhwk/Ks.en7CjWoDyI/M0M9vnHnS', NULL, 1, NULL, NULL, NULL),
(408, 'นายภาคภูมิ ชุ่มกมล (กาย)', '61160189', '$2y$10$MvNsnQ7JjE1yvbnRw5ApJOgHH2/nwBPNxh2cp2HrDAplODs34WZn2', NULL, 1, NULL, NULL, NULL),
(409, 'นายทัพปกรณ์ ปัญยาง (คูก้า)', '61160286', '$2y$10$D6XQAdsd1pegWs.rt3XJy.cBxC3vhhsum6hhZsxv815/LHACfsN8.', NULL, 1, NULL, NULL, NULL),
(410, 'นางสาวพรฤทัย ฤกษ์งาม (ปอ)', '61160186', '$2y$10$pm3K/zlcSTLB2HaW98IIRuK8rwcZtJ2H7N.MeT.MzuCBYwEIEfC4G', 'ประธานมกุล', 1, NULL, NULL, NULL),
(411, 'นายชัยภวัฒน์ จาตุภัทร์ธรานันท์ (ริว)', '61160054', '$2y$10$ofvc5mH0xPibD09t4cRB.uCwQmcOahI.IAJzYtZU9WSr3qZ7VAwMi', 'รองประธานมกุล', 1, NULL, NULL, NULL),
(412, 'นางสาวนภัสสร แสงเรือง (นาร์นิว)', '61160063', '$2y$10$qhYmZrfJZVr5StYOPrF0u.oWLC68Ev.fBYsKeyEEE6yd1GD6ovGtS', NULL, 1, NULL, NULL, NULL),
(413, 'นายพัชรพงศ์ ดำรงพานิชชัย (เจ)', '61160069', '$2y$10$KhSWpv9sEld11/xvZ.lIKe9YjpuKc1J4BRRiED9CPwX0YazL/g3bu', NULL, 1, NULL, NULL, NULL),
(414, 'นายจิราวัฒน์ ยื่นแก้ว (เต้ย)', '61160173', '$2y$10$IPKCR2GGRI0QS.leY9m8cehvzfUk/yNjEWgtP6pK4nmlESC.gaqPS', NULL, 1, NULL, NULL, NULL),
(415, 'นายปิยะศักดิ์ ศรีจันทร์ (พี)', '61160185', '$2y$10$jzCkpLmUzWcDFMWNOGwhTO2VRuHKoXqi5Szr2H50eT32xmIuFkkwC', NULL, 1, NULL, NULL, NULL),
(416, 'นายณพนรรจ์ ยุคุณธร (ลาน)', '61160282', '$2y$10$MunO3sJNmoKgI3v0F9E1QO9p9QAydv7TVopkOWzS2S36N3PY5T0Ce', NULL, 1, NULL, NULL, NULL),
(417, 'นางสาวทิพวรรณ เอี่ยมสอาด (แนน)', '61160287', '$2y$10$5vutKcR3G9DSp73mY62GhOMwan.avinoAfk4ANOoa6HfdVXJlq3ZW', NULL, 1, NULL, NULL, NULL),
(418, 'นายคุณัญญา สิงห์มี (อ๊อฟ ลี่)', '61160278', '$2y$10$r6a16PcIyW1MKh1guPi1le/x6r2/pVufn456qkP.HvQUTJtGz9b3u', 'ประธานมกุล', 1, NULL, NULL, NULL),
(419, 'นางสาวธันย์ชนก ชมภูทอง (เฟิร์น)', '61160062', '$2y$10$wwd6.bqyD/6Ey9dhsRZkoOEqAmBIVfFJvEWLhU1fmLUiq6EkHvQLi', 'รองประธานมกุล', 1, NULL, NULL, NULL),
(420, 'นายจิรายุ จารวิจิต (เคน)', '61160053', '$2y$10$9nuex0qGH0.ymsXHbsAzkutYuych6tB.FQH4iyCLuLiJgOqsFQzHy', NULL, 1, NULL, NULL, NULL),
(421, 'นายพชรพล ประเสริฐสม (แตง)', '61160068', '$2y$10$Ab1lLRsxl8n1J0l3Oaj69el463OQxXv45VHqt.xa2W/Vb2XnvZQq2', NULL, 1, NULL, NULL, NULL),
(422, 'นายจักรรินทร์ ปิมแปง (น็อต)', '61160172', '$2y$10$LYSxNLarZNEhaK57jzNVu.j.ErDKxLhp/z1MYc7quqz/LOeLFusee', NULL, 1, NULL, NULL, NULL),
(423, 'นางสาวนวรัตน์ นามบุญศรี (ออน)', '61160182', '$2y$10$UB/BZnAe6tR3GVy7Qb6ecOV3f0la0Xuwx6nmxHrUhjO77nRE8uqSC', NULL, 1, NULL, NULL, NULL),
(424, 'นางสาวเตชินี ตึกโพธิ์ (แนน)', '61160285', '$2y$10$mM6EhqGRv1DwWB74u8dI.OqDTjo6nvNg34n6BQ2L62wW9sMrP47mK', NULL, 1, NULL, NULL, NULL),
(425, 'นายนิธิกร ผิวอ่อน (ตั้ม)', '61160183', '$2y$10$CiE6f7yZRjQyE27sozNyHuWLw7XR.6nbsuRpTzQ2LCer.r4hinAp2', 'ประธานมกุล', 1, NULL, NULL, NULL),
(426, 'นางสาวจีวัสสา ประสิทธิเวช (กิม)', '61160174', '$2y$10$XQgzJnRWNuY30EYDCMAVsOLd3XBpV.XiKl.nP2WBG9QPcKvMk3UG.', 'รองประธานมกุล', 1, NULL, NULL, NULL),
(427, 'นายอลงกรณ์ ทวีวงค์ (อุ้ม)', '61160006', '$2y$10$CnglU6rwMqZinQF/ouwDtOGEjxI7/2gKlsMxWwQMAyuTDCboixsOS', NULL, 1, NULL, NULL, NULL),
(428, 'นางสาวณัฐธิดา ปุษรังสรรค์ (วา)', '61160056', '$2y$10$GdReV2SCZRqooMM6ZXnJ/O2Ctsd8mLx6ijpB/O3wEy4attycZ21yC', NULL, 1, NULL, NULL, NULL),
(429, 'นายกิตติไชย ทานะมัย (โชโดะ)', '61160277', '', '', 1, NULL, '2021-03-08 11:32:09', NULL),
(430, 'นายนฤชา นารินทร์ (อาร์ม)', '61160181', '$2y$10$z7mvjYNq3FriyoCznVwa/eSLnrlyYChGrxK8PdfTzqldV.pSC/xeq', 'ประธานมกุล', 1, NULL, NULL, NULL),
(431, 'นายกันตินันท์ วิจิตรพันธุ์ (มิก)', '61160005', '$2y$10$INrjkyhm2lKyGknYJgE1BeoGFElP/TcmIe.jDnBCOA0ZdPDX70iDy', 'รองประธานมกุล', 1, NULL, NULL, NULL),
(432, 'นางสาวญาณิศา บานทรงกิจ (หมิว)', '61160055', '$2y$10$1u9e3K4p/uZ8.T3is4R6Iuuv00nSnQmAFIdI7X/BCW.a0UHqmdTdS', NULL, 1, NULL, NULL, NULL),
(433, 'นายปณิธาน ทองคำสุขราช (ปอ)', '61160066', '$2y$10$N4xnWcI3UU0.oOlMptkA9O4RdZ97btNvnkZ6.AYVFjMkV8OaMZRRu', NULL, 1, NULL, NULL, NULL),
(434, 'นายอดิเทพ พรหมพา (บิ๊ก)', '61160079', '$2y$10$RZRCwbsVX1TRlJERVwZ1mORj40p01fJHUyGCMMLBHhfTjCIIjRO9W', NULL, 1, NULL, NULL, NULL),
(435, 'นางสาวกันต์สินี ศักดิ์ทองสุข (มายด์)', '61160171', '$2y$10$pudDDLvguoV1aP23eNlvXee.5vJkCkK0XA8NHHCxKzyfiLofqMNlq', NULL, 1, NULL, NULL, NULL),
(436, 'นายอนิวัตติ์ ปานแดง (ไนน์)', '61160196', '$2y$10$f69WDrSrf.tV1YLWhCbFPOU3RhsNiwu4gJzojPtx5jcEP03Q7IDj2', NULL, 1, NULL, NULL, NULL),
(437, 'นางสาวชินานันท์ ทองโสม (จี้)', '61160281', '$2y$10$vp748suJmwi54sZVHJFxPui2EkK2uPaj/DtwtIuic6zaG7wsk0Lty', NULL, 1, NULL, NULL, NULL),
(455, 'นางสาวอภิชญา ขวัญจังหวัด (ป๊อปอาย)', 'Mentor0', '$2y$10$.62QI0VZ4xMjHQZAkGPcOOTOkRL2PJMHjpItehaT6haNEANF9szVG', NULL, 1, NULL, NULL, NULL),
(456, 'นายสรวิชญ์ มากศิริ (ปลื้ม)', 'Mentor1', '$2y$10$RTul0dgI0nZ1n1kcCVm/VuN6bxAqg/KN5XFvh11/CoQPyO3iz2AMO', NULL, 1, NULL, NULL, NULL),
(457, 'นายธณัช จินตกานนท์ (เอิร์ธ)', 'Mentor2', '$2y$10$EP/50mwcUiXH0.6OTwalF.k2A5Kt0/JsYVdLHiUpwHfA5Eyz6.hDO', NULL, 1, NULL, NULL, NULL),
(458, 'นางสาวหทัยกาญจน์ หิรัญนาค (ชะเอม)', 'Mentor3', '$2y$10$fhhNIhfMSTqdpEjKQacSQOvSg.R9kVrHVIcvnLe33JXuZLyRTmNI2', NULL, 1, NULL, NULL, NULL),
(460, 'นายวิทยา เทพนวน (เป้)', 'Mentor5', '$2y$10$xbkGWLtnCbkmXghYSrDJOeEwBQtnPbKB44pCdvZIkkA7xaNYn5xvW', NULL, 1, NULL, NULL, NULL),
(461, 'นางสาวกาญจนพิชชา มีสุข (เตย)', 'Mentor6', '$2y$10$HSRpeTioVK2MaeAjUIb00OiPSOrWHFEODx8W3zpT.Zox34f3ojsAG', NULL, 1, NULL, NULL, NULL),
(462, 'นางสาวสมฤทัย เกษฎา (นินิว)', 'Mentor7', '$2y$10$GLYaxaK72MK2PyYIrVP5WOWKjra.htoNFDmYGVcjeYvhX.LjF9nIG', NULL, 1, NULL, NULL, NULL),
(463, 'นายทิวา สิงหไพศาล (อั้น)', 'Mentor8', '$2y$10$/uOnQVa4.feu6n4E8apO3u2lxjUNKZdS/dgqC9XhwjcvY4RJGJJOm', NULL, 1, NULL, NULL, NULL),
(464, 'นายนพกร ภิลัยวัลย์ (น้ำ)', 'Mentor9', '$2y$10$gvaRygO7SLaqF7DETXo/8uM63N10hrsBf9BoK0q0fCCmNlKEeHuiG', NULL, 1, NULL, NULL, NULL),
(470, 'นางสาวรชุดา เสนีวงษ์', '59160212', '$2y$10$ayoqLOCtrMZNsE8ENCdtTOIxQX4VUwrXQk6D5C59DlArCcX1gPxSi', 'สมาชิกมกุล 1', 1, NULL, NULL, NULL),
(480, 'patiya', 'patiya', '$2y$10$a7dokcKHduGeekea/CsGrOYJfZJS4YXmjdDIKBsV6NTdNibAw0ewq', 'admin', 1, NULL, NULL, NULL),
(483, 'นายอธิรุจน์  ภูษิตาภรณ์', '60160116', '$2y$10$d.iqpO/LwOesiGO/wlR2YeRDRUyiYNwVHc8QTr3cTohz3poW2kfZ2', 'Scrum Master', 1, NULL, NULL, NULL),
(484, 'นายฉัตรเฉลิม วสุอนันต์กุล', '60160159', '$2y$10$fMiLwhoyY.DK4QJSZDABAuLdDEFlnP1g4uaYO4atq/mt/7Dim54S.', 'พี่เลี้ยงมกุล 7', 1, NULL, NULL, NULL),
(485, 'นางสาววาทินี แตงทอง', '60160350', '$2y$10$e8Z17DAf96U1wit9N77OW.6dxMd34ASELMxV9pNeIrntlyiIX2ZwO', 'พี่เลี้ยง', 1, NULL, NULL, NULL),
(486, 'นายนำโชค สิงหะชัย', '60160169', '$2y$10$vOmL1ft.5TbRF03ScEBXFuRXjE/nJE2TNbbVkzSUGtpmQmOuRZly.', NULL, 1, NULL, '2021-03-08 15:17:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_individual`
--

CREATE TABLE `user_individual` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `individual_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_individual`
--

INSERT INTO `user_individual` (`id`, `user_id`, `individual_id`) VALUES
(1, 383, 6),
(2, 410, 3),
(3, 419, 1),
(6, 400, 5),
(7, 383, 4),
(8, 381, 1),
(11, 382, 3),
(12, 383, 5),
(13, 381, 6);

-- --------------------------------------------------------

--
-- Table structure for table `work`
--

CREATE TABLE `work` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_thai_520_w2 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `work`
--

INSERT INTO `work` (`id`, `name`) VALUES
(1, 'ระบบจัดการผู้ใช้งานเว็บไซต์'),
(2, 'ระบบทำข้อสอบออนไลน์'),
(3, 'ระบบสร้างข้อสอบออนไลน์');

-- --------------------------------------------------------

--
-- Table structure for table `work_assign`
--

CREATE TABLE `work_assign` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `work_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `achievement`
--
ALTER TABLE `achievement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `activity_checkin`
--
ALTER TABLE `activity_checkin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `individual`
--
ALTER TABLE `individual`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_achievement`
--
ALTER TABLE `log_achievement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_shop`
--
ALTER TABLE `log_shop`
  ADD PRIMARY KEY (`role_id`,`shop_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `permission_roles`
--
ALTER TABLE `permission_roles`
  ADD PRIMARY KEY (`role_id`,`permission_id`);

--
-- Indexes for table `relation_role`
--
ALTER TABLE `relation_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UK_user_roles_role_Name` (`name`);

--
-- Indexes for table `roles_point`
--
ALTER TABLE `roles_point`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles_users`
--
ALTER TABLE `roles_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `show_topic`
--
ALTER TABLE `show_topic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_individual`
--
ALTER TABLE `user_individual`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `work`
--
ALTER TABLE `work`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `work_assign`
--
ALTER TABLE `work_assign`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `achievement`
--
ALTER TABLE `achievement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `activity_checkin`
--
ALTER TABLE `activity_checkin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=410;

--
-- AUTO_INCREMENT for table `individual`
--
ALTER TABLE `individual`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `log_achievement`
--
ALTER TABLE `log_achievement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `relation_role`
--
ALTER TABLE `relation_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `roles_point`
--
ALTER TABLE `roles_point`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `roles_users`
--
ALTER TABLE `roles_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `shop`
--
ALTER TABLE `shop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `show_topic`
--
ALTER TABLE `show_topic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=488;

--
-- AUTO_INCREMENT for table `user_individual`
--
ALTER TABLE `user_individual`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `work`
--
ALTER TABLE `work`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `work_assign`
--
ALTER TABLE `work_assign`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
