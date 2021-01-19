-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2021 at 10:27 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `filingsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `downloaded`
--

CREATE TABLE `downloaded` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `file_id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_type` varchar(100) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `downloaded`
--

INSERT INTO `downloaded` (`id`, `user_id`, `file_id`, `file_name`, `file_type`, `date`) VALUES
(1, 5, 41, '', '', '2020-12-26 15:11:46'),
(2, 5, 40, '', '', '2020-12-26 15:12:50'),
(3, 5, 41, '', '', '2020-12-26 15:16:38'),
(4, 5, 40, '', '', '2020-12-28 15:21:37'),
(5, 5, 40, '', '', '2020-12-28 15:39:11'),
(6, 5, 40, 'ISS-Final-Documentation.docx', 'Document', '2020-12-28 15:42:07'),
(7, 5, 50, 'iss-system.docx', 'Document', '2020-12-28 16:39:43'),
(8, 5, 51, 'iss-system.docx', 'Document', '2020-12-28 16:57:24');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `file_type_id` int(11) NOT NULL,
  `directory` varchar(255) NOT NULL,
  `month` varchar(20) NOT NULL,
  `day` int(11) NOT NULL,
  `year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `name`, `file_type_id`, `directory`, `month`, `day`, `year`) VALUES
(49, 'Approval Letters 1.docx', 11, 'file-storage/approval letters', 'December', 28, 2020),
(50, 'Faculty Load 1.docx', 12, 'file-storage/faculty load', 'December', 28, 2020),
(51, 'MEMO 1.docx', 13, 'file-storage/memorandum', 'December', 28, 2020),
(52, 'ROG 1.docx', 14, 'file-storage/reports of grades', 'December', 28, 2020),
(53, 'Class Records.docx', 15, 'file-storage/class records', 'December', 28, 2020),
(54, 'ISO 1.docx', 16, 'file-storage/iso files', 'December', 28, 2020),
(55, 'Monitoring 1.docx', 17, 'file-storage/monitoring letters', 'December', 28, 2020),
(56, 'Request Letters.docx', 18, 'file-storage/request letters', 'December', 28, 2020),
(57, 'ROL 1.docx', 19, 'file-storage/receive & ongoing letters', 'December', 28, 2020),
(58, 'RFU 1.docx', 20, 'file-storage/rfu', 'December', 28, 2020),
(59, 'RFU 2.docx', 20, 'file-storage/rfu', 'December', 28, 2020),
(61, 'RFU 3.docx', 20, 'file-storage/rfu', 'December', 28, 2020),
(62, 'RFU 4.docx', 20, 'file-storage/rfu', 'December', 28, 2020),
(63, 'RFU 6.docx', 20, 'file-storage/rfu', 'December', 28, 2020),
(64, 'RFU 5.docx', 20, 'file-storage/rfu', 'December', 28, 2020),
(67, 'AL_1_2ND.docx', 11, 'file-storage/approval letters', 'January', 3, 2021),
(68, 'FL_1_2ND.docx', 12, 'file-storage/faculty load', 'January', 3, 2021),
(69, 'MEMO_1_2ND.docx', 13, 'file-storage/memorandum', 'January', 3, 2021),
(70, 'MEMO_2_2ND.docx', 13, 'file-storage/memorandum', 'January', 3, 2021),
(71, 'ROG_2_2ND.docx', 14, 'file-storage/reports of grades', 'January', 3, 2021),
(72, 'ROG_3_2ND.docx', 14, 'file-storage/reports of grades', 'January', 3, 2021),
(73, 'ROG_4_2ND.docx', 14, 'file-storage/reports of grades', 'January', 3, 2021),
(74, 'CR_1_2ND.docx', 15, 'file-storage/class records', 'January', 3, 2021),
(75, 'CR_2_2ND.docx', 15, 'file-storage/class records', 'January', 3, 2021),
(76, 'CR_3_2ND.docx', 15, 'file-storage/class records', 'January', 3, 2021),
(77, 'CP_1_2ND.docx', 27, 'file-storage/class program', 'January', 3, 2021),
(78, 'CR_4_2ND.docx', 15, 'file-storage/class records', 'January', 3, 2021),
(79, 'ISO_1_2ND.docx', 16, 'file-storage/iso files', 'January', 3, 2021),
(80, 'ISO_2_2ND.docx', 16, 'file-storage/iso files', 'January', 3, 2021),
(81, 'ISO_3_2ND.docx', 16, 'file-storage/iso files', 'January', 3, 2021),
(82, 'ISO_4_2ND.docx', 16, 'file-storage/iso files', 'January', 3, 2021),
(83, 'ISO_6_2ND.docx', 16, 'file-storage/iso files', 'January', 3, 2021),
(84, 'ISO_7_2ND.docx', 16, 'file-storage/iso files', 'January', 3, 2021),
(85, 'ISO_5_2ND.docx', 16, 'file-storage/iso files', 'January', 3, 2021),
(86, 'ISO_8_2ND.docx', 16, 'file-storage/iso files', 'January', 3, 2021),
(87, 'MON_1_2ND.docx', 17, 'file-storage/monitoring letters', 'January', 3, 2021),
(88, 'MON_2_2ND.docx', 17, 'file-storage/monitoring letters', 'January', 3, 2021),
(89, 'MON_3_2ND.docx', 17, 'file-storage/monitoring letters', 'January', 3, 2021),
(90, 'MON_4_2ND.docx', 17, 'file-storage/monitoring letters', 'January', 3, 2021),
(91, 'MON_5_2ND.docx', 17, 'file-storage/monitoring letters', 'January', 3, 2021),
(92, 'RL_1_2ND.docx', 18, 'file-storage/request letters', 'January', 3, 2021),
(93, 'RL_2_2ND.docx', 18, 'file-storage/request letters', 'January', 3, 2021),
(94, 'RL_3_2ND.docx', 18, 'file-storage/request letters', 'January', 3, 2021),
(95, 'ROL_1_2ND.docx', 19, 'file-storage/receive & ongoing letters', 'January', 3, 2021),
(96, 'ROL_2_2ND.docx', 19, 'file-storage/receive & ongoing letters', 'January', 3, 2021),
(97, 'ROL_3_2ND.docx', 19, 'file-storage/receive & ongoing letters', 'January', 3, 2021),
(98, 'ROL_4_2ND.docx', 19, 'file-storage/receive & ongoing letters', 'January', 3, 2021),
(99, 'ROL_5_2ND.docx', 19, 'file-storage/receive & ongoing letters', 'January', 3, 2021),
(100, 'ROL_6_2ND.docx', 19, 'file-storage/receive & ongoing letters', 'January', 3, 2021),
(101, 'ROL_7_2ND.docx', 19, 'file-storage/receive & ongoing letters', 'January', 3, 2021),
(102, 'ROL_8_2ND.docx', 19, 'file-storage/receive & ongoing letters', 'January', 3, 2021),
(103, 'ROL_9_2ND.docx', 19, 'file-storage/receive & ongoing letters', 'January', 3, 2021),
(104, 'ROL_10_2ND.docx', 19, 'file-storage/receive & ongoing letters', 'January', 3, 2021),
(105, 'ROL_11_2ND.docx', 19, 'file-storage/receive & ongoing letters', 'January', 3, 2021),
(106, 'RFU_1_2ND.docx', 20, 'file-storage/rfu', 'January', 3, 2021),
(107, 'RFU_2_2ND.docx', 20, 'file-storage/rfu', 'January', 3, 2021),
(108, 'RFU_3_2ND.docx', 20, 'file-storage/rfu', 'January', 3, 2021),
(109, 'RFU_4_2ND.docx', 20, 'file-storage/rfu', 'January', 3, 2021),
(110, 'RFU_5_2ND.docx', 20, 'file-storage/rfu', 'January', 3, 2021),
(111, 'RFU_6_2ND.docx', 20, 'file-storage/rfu', 'January', 3, 2021),
(112, 'DTR_1_2ND.docx', 21, 'file-storage/dtr', 'January', 3, 2021),
(113, 'DTR_2_2ND.docx', 21, 'file-storage/dtr', 'January', 3, 2021),
(114, 'DTR_3_2ND - Copy.docx', 21, 'file-storage/dtr', 'January', 3, 2021),
(115, 'DTR_3_2ND.docx', 21, 'file-storage/dtr', 'January', 3, 2021),
(116, 'DTR_4_2ND - Copy (2).docx', 21, 'file-storage/dtr', 'January', 3, 2021),
(117, 'DTR_5_2ND .docx', 21, 'file-storage/dtr', 'January', 3, 2021),
(118, 'DTR_7_2ND.docx', 21, 'file-storage/dtr', 'January', 3, 2021),
(119, 'DTR_8_2ND.docx', 21, 'file-storage/dtr', 'January', 3, 2021),
(120, 'DTR_6_2ND.docx', 21, 'file-storage/dtr', 'January', 3, 2021),
(121, 'DTR_9_2ND.docx', 21, 'file-storage/dtr', 'January', 3, 2021),
(122, 'DTR_10_2ND.docx', 21, 'file-storage/dtr', 'January', 3, 2021),
(123, 'DTR_11_2ND.docx', 21, 'file-storage/dtr', 'January', 3, 2021),
(124, 'DTR_12_2ND.docx', 21, 'file-storage/dtr', 'January', 3, 2021),
(125, 'DTR_13_2ND.docx', 21, 'file-storage/dtr', 'January', 3, 2021),
(126, 'DTR_143_2ND.docx', 21, 'file-storage/dtr', 'January', 3, 2021),
(127, 'VOU_1_2ND.docx', 22, 'file-storage/voucher', 'January', 3, 2021),
(128, 'VOU_2_2ND.docx', 22, 'file-storage/voucher', 'January', 3, 2021),
(129, 'VOU_3_2ND.docx', 22, 'file-storage/voucher', 'January', 3, 2021),
(130, 'VOU_4_2ND.docx', 22, 'file-storage/voucher', 'January', 3, 2021),
(131, 'VOU_5_2ND.docx', 22, 'file-storage/voucher', 'January', 3, 2021),
(132, 'VOU_6_2ND.docx', 22, 'file-storage/voucher', 'January', 3, 2021),
(133, 'VOU_7_2ND.docx', 22, 'file-storage/voucher', 'January', 3, 2021),
(134, 'OP_1_2ND.docx', 23, 'file-storage/overload payment', 'January', 3, 2021),
(135, 'OP_2_2ND.docx', 23, 'file-storage/overload payment', 'January', 3, 2021),
(136, 'OP_3_2ND.docx', 23, 'file-storage/overload payment', 'January', 3, 2021),
(137, 'OP_4_2ND.docx', 23, 'file-storage/overload payment', 'January', 3, 2021),
(138, 'TOS_1_2ND.docx', 24, 'file-storage/t.o.s', 'January', 3, 2021),
(139, 'TOS_2_2ND.docx', 24, 'file-storage/t.o.s', 'January', 3, 2021),
(140, 'TOS_3_2ND.docx', 24, 'file-storage/t.o.s', 'January', 3, 2021),
(141, 'SY_1_2ND.docx', 26, 'file-storage/syllabus', 'January', 3, 2021),
(142, 'Monitoring Letter _ 2ND Sem.docx', 28, 'file-storage/monitoring reports', 'January', 5, 2021),
(144, 'AL_2_2ND - Copy.docx', 11, 'file-storage/approval letters', 'January', 5, 2021);

-- --------------------------------------------------------

--
-- Table structure for table `file_requests`
--

CREATE TABLE `file_requests` (
  `id` int(11) NOT NULL,
  `file_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `month` varchar(15) NOT NULL,
  `day` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `status` int(11) NOT NULL COMMENT '0 - Pending, 1 - Approved, 2 - Downloaded, 3 - Declined'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `file_types`
--

CREATE TABLE `file_types` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `file_types`
--

INSERT INTO `file_types` (`id`, `name`, `description`) VALUES
(1, 'Document', 'sample document'),
(11, 'Approval Letters', ''),
(12, 'Faculty Load', ''),
(13, 'Memorandum', ''),
(14, 'Reports of Grades', ''),
(15, 'Class Records', ''),
(16, 'ISO Files', ''),
(17, 'Monitoring Letters', ''),
(18, 'Request Letters', ''),
(19, 'Receive & Ongoing Letters', ''),
(20, 'RFU', ''),
(21, 'DTR', ''),
(22, 'Voucher', ''),
(23, 'Overload Payment', ''),
(24, 'T.O.S', ''),
(26, 'Syllabus', ''),
(27, 'Class Program', ''),
(28, 'Monitoring Reports', '1st Semester');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `file_id` int(11) NOT NULL,
  `action` varchar(255) NOT NULL,
  `month` varchar(50) NOT NULL,
  `day` varchar(50) NOT NULL,
  `year` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_type_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_type_id`, `name`, `username`, `password`) VALUES
(2, 1, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(4, 1, 'admin1', 'admin1', 'e00cf25ad42683b3df678c61f42c6bda'),
(5, 3, 'kent', 'kent', '564f10260067a9b0c8d8e206ecdb49c6'),
(6, 3, 'adrian', 'adrian', '8c4205ec33d8f6caeaaaa0c10a14138c');

-- --------------------------------------------------------

--
-- Table structure for table `user_types`
--

CREATE TABLE `user_types` (
  `id` int(11) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_types`
--

INSERT INTO `user_types` (`id`, `description`) VALUES
(1, 'Admin'),
(3, 'Student'),
(6, 'Librarian');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `downloaded`
--
ALTER TABLE `downloaded`
  ADD PRIMARY KEY (`id`),
  ADD KEY `file_id` (`file_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `file_type_id` (`file_type_id`);

--
-- Indexes for table `file_requests`
--
ALTER TABLE `file_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `file_id` (`file_id`);

--
-- Indexes for table `file_types`
--
ALTER TABLE `file_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `file_id` (`file_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_type_id` (`user_type_id`);

--
-- Indexes for table `user_types`
--
ALTER TABLE `user_types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `downloaded`
--
ALTER TABLE `downloaded`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- AUTO_INCREMENT for table `file_requests`
--
ALTER TABLE `file_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `file_types`
--
ALTER TABLE `file_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_types`
--
ALTER TABLE `user_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `files`
--
ALTER TABLE `files`
  ADD CONSTRAINT `files_ibfk_1` FOREIGN KEY (`file_type_id`) REFERENCES `file_types` (`id`);

--
-- Constraints for table `file_requests`
--
ALTER TABLE `file_requests`
  ADD CONSTRAINT `file_requests_ibfk_1` FOREIGN KEY (`file_id`) REFERENCES `files` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `file_requests_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`file_id`) REFERENCES `files` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `notifications_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`user_type_id`) REFERENCES `user_types` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
