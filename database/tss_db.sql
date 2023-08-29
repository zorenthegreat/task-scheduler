-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2023 at 08:22 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tss_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `category_list`
--

CREATE TABLE `category_list` (
  `id` int(30) NOT NULL,
  `user_id` int(30) NOT NULL,
  `name` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `delete_flag` tinyint(1) NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category_list`
--

INSERT INTO `category_list` (`id`, `user_id`, `name`, `status`, `delete_flag`, `date_created`, `date_updated`) VALUES
(10, 1, 'Webinar Meeting', 1, 1, '2023-05-02 14:12:29', '2023-05-02 14:35:49'),
(11, 1, 'Zoom Meeting', 1, 0, '2023-05-02 14:38:03', '2023-05-09 21:24:39'),
(12, 1, 'Webinar Meeting', 1, 0, '2023-05-02 14:42:07', '2023-05-09 21:24:33'),
(15, 1, 'Hybrid', 1, 0, '2023-05-10 02:42:21', '2023-05-10 02:42:21');

-- --------------------------------------------------------

--
-- Table structure for table `schedule_list`
--

CREATE TABLE `schedule_list` (
  `id` int(30) NOT NULL,
  `user_id` int(30) DEFAULT NULL,
  `category_id` varchar(60) DEFAULT NULL,
  `title` text DEFAULT NULL,
  `live` varchar(1000) DEFAULT NULL,
  `panel` varchar(50) DEFAULT NULL,
  `record` text DEFAULT NULL,
  `image` longblob DEFAULT NULL,
  `dry_run` datetime DEFAULT NULL,
  `description` text DEFAULT NULL,
  `schedule_from` datetime DEFAULT NULL,
  `schedule_to` datetime DEFAULT NULL,
  `is_whole` tinyint(4) DEFAULT 0,
  `date_created` datetime DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ass` text DEFAULT NULL,
  `host` varchar(50) DEFAULT NULL,
  `setup_type` varchar(100) DEFAULT NULL,
  `names` varchar(100) DEFAULT NULL,
  `emails` varchar(100) DEFAULT NULL,
  `college` text DEFAULT NULL,
  `venue` varchar(100) DEFAULT NULL,
  `Break_out_room` varchar(100) DEFAULT NULL,
  `services` text DEFAULT NULL,
  `title2` text NOT NULL,
  `dry_run2` datetime NOT NULL DEFAULT current_timestamp(),
  `live2` varchar(1000) NOT NULL,
  `record2` text NOT NULL,
  `ass2` text NOT NULL,
  `host2` text NOT NULL,
  `panel2` varchar(100) NOT NULL,
  `contact_person` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schedule_list`
--

INSERT INTO `schedule_list` (`id`, `user_id`, `category_id`, `title`, `live`, `panel`, `record`, `image`, `dry_run`, `description`, `schedule_from`, `schedule_to`, `is_whole`, `date_created`, `date_updated`, `ass`, `host`, `setup_type`, `names`, `emails`, `college`, `venue`, `Break_out_room`, `services`, `title2`, `dry_run2`, `live2`, `record2`, `ass2`, `host2`, `panel2`, `contact_person`) VALUES
(13, 1, 'Zoom', 'hhhh', '', ' ', '', NULL, '2023-05-18 20:58:00', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '2023-05-16 20:58:37', '2023-05-16 20:58:37', '', '', 'Conference Type', '', '', NULL, '', '', NULL, '', '2023-06-04 11:21:03', '', '', '', '', '', ''),
(15, 1, 'Hyplex-setup', 'asasasa', 'Facebook', ' ', '', NULL, '2023-05-18 21:45:00', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '2023-05-16 09:42:45', '2023-05-16 09:42:45', '', '', 'Seminar Type', 'asasasa', 'asasasa', NULL, '', 'Yes', NULL, '', '2023-06-04 11:21:03', '', '', '', '', '', ''),
(16, 1, 'Zoom', 'mnmnmnmnmn', '', ' ', '', NULL, '2023-05-22 21:45:00', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '2023-05-16 09:43:19', '2023-05-16 09:43:19', '', '', 'Conference Type', '', '', NULL, '', '', NULL, '', '2023-06-04 11:21:03', '', '', '', '', '', ''),
(17, 1, 'Hyplex-setup', 'hlll', '', ' ', '', NULL, '2023-05-17 21:48:00', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '2023-05-16 09:45:46', '2023-05-16 09:45:46', '', '', 'Conference Type', 'jljljlj', 'j;j;j;', NULL, '', '', NULL, '', '2023-06-04 11:21:03', '', '', '', '', '', ''),
(19, 1, 'Zoom', 'asasasa', 'Facebook', ' ', '', NULL, '2023-05-19 21:56:00', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '2023-05-16 09:52:29', '2023-05-16 09:52:29', '', '', 'Conference Type', '', '', NULL, '', '', NULL, '', '2023-06-04 11:21:03', '', '', '', '', '', ''),
(29, 19, 'Hyplex-setup', 'Sample Title', '', ' ', '', NULL, '2023-05-17 12:00:00', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '2023-05-16 22:49:31', '2023-05-16 22:49:31', '', '', 'Social Event Type', 'Kyle', 'jssaballa@tua.edu.ph', NULL, '', '', NULL, '', '2023-06-04 11:21:03', '', '', '', '', '', ''),
(42, 1, 'Zoom', 'Sampleaaa', '', '     ', '', NULL, '2023-05-31 11:19:00', NULL, '2023-06-09 11:20:00', '2023-05-30 03:20:00', 0, '2023-05-30 11:20:15', '2023-06-03 15:38:18', 'sample', 'sample', 'Conference Type', '', '', NULL, '', '', 'zoom', '', '2023-06-04 11:21:03', '', '', '', '', '', ''),
(43, 9, 'Webinar', 'sample', 'Facebook', ' sample', 'yes', NULL, '2023-05-30 11:21:00', NULL, '2023-05-31 11:22:00', '2023-05-31 11:22:00', 0, '2023-05-30 11:22:19', '2023-05-30 11:22:19', 'sample', 'sample', 'Conference Type', '', '', NULL, '', '', NULL, '', '2023-06-04 11:21:03', '', '', '', '', '', ''),
(53, 22, 'Zoom', 'Zoom sample', '', '   ', '', NULL, '2023-05-30 19:17:00', NULL, '2023-05-31 19:17:00', '2023-05-31 23:17:00', 0, '2023-05-30 19:17:30', '2023-05-30 19:37:57', '', '', 'Conference Type', '', '', NULL, '', '', NULL, '', '2023-06-04 11:21:03', '', '', '', '', '', ''),
(55, 22, 'Zoom', 'webinar sample', '', '   sample', '', NULL, '2023-05-31 19:27:00', NULL, '2023-05-31 20:27:00', '2023-05-31 22:27:00', 0, '2023-05-30 19:28:03', '2023-05-30 19:38:14', 'sample', 'sample', 'Conference Type', '', '', NULL, '', '', NULL, '', '2023-06-04 11:21:03', '', '', '', '', '', ''),
(56, 1, 'Zoom', 'ewq', 'Facebook', ' ', 'yes', NULL, '2023-06-09 08:19:00', NULL, '2023-06-09 08:19:00', '2023-06-09 08:19:00', 0, '2023-06-04 08:19:33', '2023-06-04 08:19:33', 'eqwewq', 'ewqe', 'Conference Type', '', '', NULL, '', '', 'zoom', '', '2023-06-04 11:21:03', '', '', '', '', '', ''),
(58, 1, 'Webinar', '123123', 'Facebook', ' 12312', 'yes', NULL, '0000-00-00 00:00:00', NULL, '2023-06-13 08:20:00', '2023-06-14 08:20:00', 0, '2023-06-04 08:20:28', '2023-06-04 08:20:28', '32131', '3131', 'Conference Type', '', '', NULL, '', '', 'zoom', '', '2023-06-04 11:21:03', '', '', '', '', '', ''),
(59, 1, 'Zoom', 'asdasd', 'Facebook', ' ', 'yes', NULL, '2023-06-05 08:33:00', NULL, '2023-06-05 08:33:00', '2023-06-05 08:33:00', 0, '2023-06-04 08:33:49', '2023-06-04 08:33:49', 'asdad', 'sadsa', 'Conference Type', '', '', NULL, '', '', 'zoom', '', '2023-06-04 11:21:03', '', '', '', '', '', ''),
(60, 1, 'Zoom', 'ewqewq', '', '  ', '', NULL, '2023-06-06 08:37:00', NULL, '2023-06-06 08:37:00', '2023-06-06 08:37:00', 0, '2023-06-04 08:37:52', '2023-06-06 19:03:01', 'ewqewq', 'ewqewq', 'Conference Type', 'zoren ', 'zoren', NULL, '', '', 'zoom', '', '2023-06-06 08:37:00', '', '', 'ewqewq', 'ewqewq', '  ', ''),
(61, 1, 'Hyflex-setup', 'testasd', 'Facebook', ' ', 'yes', NULL, '0000-00-00 00:00:00', NULL, '2023-06-22 11:21:00', '2023-06-22 11:21:00', 0, '2023-06-04 11:21:53', '2023-06-04 11:21:53', '', '', 'Conference Type', 'testasd', 'testasd', NULL, 'testasd', 'Yes', 'zoom', 'testasdtestasd', '2023-06-22 11:21:00', '', '', 'testasd', 'testasd', '', ''),
(62, 1, 'Hyflex-setup', 'eeeeeeee', 'Facebook', ' ', 'yes', NULL, '2023-06-04 11:26:00', NULL, '2023-06-05 11:26:00', '2023-06-04 11:26:00', 0, '2023-06-04 11:26:33', '2023-06-04 11:26:33', '', '', 'Seminar Type', 'eeeeeeee', 'eeeeeeee', NULL, 'eeeeeeee', 'Yes', 'webinar', 'eeeeeeee', '2023-06-04 11:26:00', '', '', 'eeeeeeeeeeeeeeee', 'eeeeeeeeeeeeeeee', ' eeeeeeeeeeeeeeeeeeeeeeee', ''),
(63, 1, 'Webinar', 'wews', '', '  ', '', NULL, '2023-06-06 13:21:00', NULL, '2023-06-05 13:21:00', '2023-06-05 13:21:00', 0, '2023-06-05 13:21:55', '2023-06-05 13:22:40', '', '', 'Conference Type', 'asdsd', 'asdsd', 'asdsd', '', '', NULL, '', '2023-06-06 13:21:00', '', '', '', '', '  ', ''),
(64, 1, 'Zoom', 'HYFLEX MOTOs', '', '         ', '', NULL, '2023-06-07 13:46:00', NULL, '2023-06-10 13:46:00', '0000-00-00 00:00:00', 0, '2023-06-05 13:46:48', '2023-06-06 21:22:55', 'asdsd', 'asdsd', 'Conference Type', 'HYFLEX MOTO', 'HYFLEX MOTO', '', '', '', 'webinar', '', '2023-06-07 13:46:00', '', '', 'asdsd', 'asdsd', '         ', ''),
(68, 1, 'Hyflex-setup', 'test', 'FACEBOOK', ' ', '', NULL, '2023-06-11 14:19:00', NULL, '2023-06-11 14:19:00', '2023-06-11 14:19:00', 0, '2023-06-08 14:19:46', '2023-06-08 14:22:25', '', '', 'Seminar Type', NULL, 'test', 'test', '06/11/2023 02:19 PM', 'Yes', 'none', '', '0000-00-00 00:00:00', '', '', '', '', ' ', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `system_info`
--

CREATE TABLE `system_info` (
  `id` int(30) NOT NULL,
  `meta_field` text NOT NULL,
  `meta_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `system_info`
--

INSERT INTO `system_info` (`id`, `meta_field`, `meta_value`) VALUES
(1, 'name', 'TCET  Calendar Scheduling System'),
(6, 'short_name', 'TCSS'),
(11, 'logo', 'uploads/logo.png?v=1683424330'),
(13, 'user_avatar', 'uploads/user_avatar.jpg'),
(14, 'cover', 'uploads/cover.png?v=1683424468');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(50) NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `middlename` text DEFAULT NULL,
  `lastname` varchar(250) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `avatar` text DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 0,
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `middlename`, `lastname`, `username`, `password`, `avatar`, `last_login`, `type`, `date_added`, `date_updated`) VALUES
(1, 'Adminstrator', '', 'Admin', 'admin', '0192023a7bbd73250516f069df18b500', 'uploads/avatars/1.png?v=1683424127', NULL, 1, '2021-01-20 14:02:37', '2023-05-07 09:48:47'),
(9, 'zoren', 'billones', 'aguilar', 'ren', '202cb962ac59075b964b07152d234b70', NULL, NULL, 1, '2023-04-24 14:04:03', '2023-05-09 21:32:25'),
(13, 'kyle', '', '', '', '202cb962ac59075b964b07152d234b70', NULL, NULL, 2, '2023-05-10 03:14:38', '2023-05-10 03:14:38'),
(15, 'Kate', 'S', 'Bronola', 'kate', '202cb962ac59075b964b07152d234b70', NULL, NULL, 1, '2023-05-16 00:20:25', '2023-05-16 00:26:50'),
(16, 'asasa', 'asasa', 'aasasas', 'gerson', '2e3746e131d178d04609038957bfa567', NULL, NULL, 2, '2023-05-16 02:15:01', '2023-05-16 02:15:01'),
(17, 'asas', 'asasa', 'asasa', 'user', 'ee11cbb19052e40b07aac0ca060c23ee', NULL, NULL, 2, '2023-05-16 07:14:28', '2023-05-16 07:14:28'),
(18, 'Alyana Jean', 'Antonio', 'Paggabao', 'ajpaggabao', '4297f44b13955235245b2497399d7a93', NULL, NULL, 2, '2023-05-16 22:30:32', '2023-05-16 22:30:32'),
(19, 'KYLE', 'S.', 'SABALLA', 'KyleSaballa', 'dc24d3c10358a1ae0d18d18da49b9eda', NULL, NULL, 2, '2023-05-16 22:47:33', '2023-05-16 22:47:33'),
(20, 'Test', 'Test', 'Test', 'test', '098f6bcd4621d373cade4e832627b4f6', 'uploads/avatars/20.png?v=1684406970', NULL, 2, '2023-05-18 06:49:30', '2023-05-18 06:49:30'),
(21, 'Juan', 'Luna', 'Cruz', 'juan', 'a94652aa97c7211ba8954dd15a3cf838', NULL, NULL, 2, '2023-05-18 22:09:36', '2023-05-18 22:09:36'),
(22, 'johny', 'a', 'sins', 'sins', '202cb962ac59075b964b07152d234b70', NULL, NULL, 2, '2023-05-30 11:50:36', '2023-05-30 11:50:36'),
(23, 'jhon ', 't', 'snow', 'jonsnow', '202cb962ac59075b964b07152d234b70', NULL, NULL, 2, '2023-05-31 05:15:52', '2023-05-31 05:15:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category_list`
--
ALTER TABLE `category_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `schedule_list`
--
ALTER TABLE `schedule_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `system_info`
--
ALTER TABLE `system_info`
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
-- AUTO_INCREMENT for table `category_list`
--
ALTER TABLE `category_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `schedule_list`
--
ALTER TABLE `schedule_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `system_info`
--
ALTER TABLE `system_info`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
