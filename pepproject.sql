-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2018 at 07:12 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pepproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `conversations`
--

CREATE TABLE `conversations` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) DEFAULT NULL,
  `recipient_id` int(11) DEFAULT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `conversations`
--

INSERT INTO `conversations` (`id`, `sender_id`, `recipient_id`, `date`) VALUES
(1, 9, 10, '2018-03-29 13:45:12'),
(2, 9, 1, '2018-03-29 17:55:27'),
(3, 9, 1, '2018-03-29 17:56:43'),
(4, 9, 10, '2018-03-29 17:57:46'),
(5, 9, 10, '2018-03-29 17:58:18'),
(6, 9, 10, '2018-03-29 18:00:43'),
(7, 9, 10, '2018-03-29 18:01:31'),
(8, 9, 10, '2018-03-29 18:05:56'),
(9, 9, 1, '2018-03-29 18:06:24'),
(10, 9, 1, '2018-03-29 18:09:13'),
(11, 9, 1, '2018-03-29 18:11:52'),
(12, 9, 1, '2018-03-29 18:12:37'),
(13, 9, 1, '2018-03-29 18:12:56'),
(14, 9, 1, '2018-03-29 18:13:53'),
(15, 9, 1, '2018-03-29 18:14:06'),
(16, 9, 1, '2018-03-29 18:17:02'),
(17, 9, 1, '2018-03-29 18:18:54'),
(18, 9, 1, '2018-03-29 18:20:46'),
(19, 9, 1, '2018-03-29 18:21:26'),
(20, 9, 1, '2018-03-29 18:22:13');

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE `currency` (
  `id` int(11) NOT NULL,
  `currency` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `abbrevation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Table structure for table `kyc`
--

CREATE TABLE `kyc` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `idCard` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `picture` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `comment` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `kyc`
--

INSERT INTO `kyc` (`id`, `user_id`, `idCard`, `picture`, `comment`, `status`, `created`, `updated`) VALUES
(6, 10, 'uploads/images/kyc/1522253618635.jpg', 'uploads/images/kyc/1522253029322.PNG', NULL, 0, '2018-03-28 17:27:42', '2018-03-28 18:13:38'),
(14, NULL, NULL, 'uploads/images/kyc/1522251681575.jpg', NULL, 0, '2018-03-28 17:41:21', NULL),
(17, 9, 'uploads/images/kyc/1522254409548.PNG', 'uploads/images/kyc/1522254363578.jpg', NULL, 1, '2018-03-28 18:26:03', '2018-03-28 18:26:49');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `message` longtext COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `video` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `document` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` datetime NOT NULL,
  `is_broadcast` int(11) NOT NULL DEFAULT '0',
  `subject` longtext COLLATE utf8_unicode_ci NOT NULL,
  `conversation_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `user_id`, `message`, `image`, `video`, `document`, `date`, `is_broadcast`, `subject`, `conversation_id`) VALUES
(1, NULL, '<p>dfdfdfdfd</p>', NULL, NULL, NULL, '2018-03-29 13:40:51', 0, 'dfdff', NULL),
(2, NULL, '<p>dfdfdd</p>', NULL, NULL, NULL, '2018-03-29 13:42:30', 0, 'rtrtrtt', NULL),
(3, NULL, '<p>sddsdsds</p>', NULL, NULL, NULL, '2018-03-29 13:45:12', 0, 'dfddf', NULL),
(4, NULL, '<p style=\"\">kjkjkjkjkjkjk</p>', NULL, NULL, NULL, '2018-03-29 17:49:15', 0, 'gffhghghffhgg', NULL),
(5, NULL, '<p style=\"\">ddkfdjhdjhfjdff</p>', NULL, NULL, NULL, '2018-03-29 17:56:43', 0, 'dfddfdfdf', 3),
(6, 9, '<p style=\"\">dfdfgfgfgfg</p>', NULL, NULL, NULL, '2018-03-29 18:05:56', 0, 'fgfgfgfgfgfgfg', 8),
(7, 9, '<p style=\"\">fgfggfgfgfgfg</p>', NULL, NULL, NULL, '2018-03-29 18:06:24', 0, 'lfkgkgfkkfg', 9),
(8, 9, '<p style=\"\">ddggdgdg</p>', NULL, NULL, NULL, '2018-03-29 18:09:13', 0, 'ggdgfgdg', 10),
(9, 9, '<p style=\"\">dfdfdfdf</p>', NULL, NULL, NULL, '2018-03-29 18:11:52', 0, 'dfdfdfdff', 11),
(10, 9, '<p style=\"\">dfdfddddf</p>', NULL, NULL, NULL, '2018-03-29 18:12:37', 1, 'sfsfsfsf', 12),
(11, 9, '<p style=\"\">sfdsfsfsdf</p>', NULL, NULL, NULL, '2018-03-29 18:12:56', 1, 'sfdsfsfs', 13),
(12, 9, '<p style=\"\">sfsdfsdfs</p>', NULL, NULL, NULL, '2018-03-29 18:13:53', 0, 'sfssf', 14),
(13, 9, '<p style=\"\">sfdsfdsfs</p>', NULL, NULL, NULL, '2018-03-29 18:14:06', 0, 'sfdsfsf', 15),
(14, 9, '<p style=\"\">ssfsfsfds</p>', NULL, NULL, NULL, '2018-03-29 18:17:02', 0, 'sdfggd', 16),
(15, 9, '<p style=\"\">sfdsfdfdgfgf</p>', NULL, NULL, NULL, '2018-03-29 18:18:54', 0, 'dfdfd', 17),
(16, 9, '<p style=\"\">dgdgfgdgdg</p>', NULL, NULL, NULL, '2018-03-29 18:20:46', 0, 'dffdgddg', 18),
(17, 9, '<p style=\"\">dgdfgfdgdg</p>', NULL, NULL, NULL, '2018-03-29 18:21:26', 0, 'fsdfsdfggd', 19),
(18, 9, '<p style=\"\">dfgdgdgdfg</p>', NULL, NULL, NULL, '2018-03-29 18:22:13', 0, 'ddfgdff', 20);

-- --------------------------------------------------------

--
-- Table structure for table `trade`
--

CREATE TABLE `trade` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `transactionId` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `amount` double NOT NULL,
  `rate` double NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT NULL,
  `buyCurrency_id` int(11) DEFAULT NULL,
  `sellCurrency_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `trade_id` int(11) DEFAULT NULL,
  `currency_id` int(11) DEFAULT NULL,
  `transactionId` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `amount` double NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `company` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_on` datetime DEFAULT CURRENT_TIMESTAMP,
  `last_login` datetime DEFAULT NULL,
  `referral_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `active` int(11) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `activation_code` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_code` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `forgotten_password_code` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `forgotten_password_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `first_name`, `last_name`, `company`, `phone`, `password`, `created_on`, `last_login`, `referral_id`, `active`, `ip_address`, `salt`, `activation_code`, `remember_code`, `forgotten_password_code`, `forgotten_password_time`) VALUES
(1, 'administrator', 'admin@admin.com', 'Admin', 'istrator', 'ADMIN', '0', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'a2wh97mnkjg', 1, '127.0.0.1', '', '', NULL, NULL, NULL),
(9, 'neontetras', 'swiftbird000@gmail.com', 'Kingsley', 'Anokam', NULL, '07063834927', '$2y$08$mbYMS9m1BI8h88OOrwujp.qm6EeTSK8EQyclcjanpKjilL52CtfMG', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'a2wh97mnkjg', 1, '::1', '', NULL, 'DWe4t93dY5TuS2l6JHxEr.', 'Fa63TXTMQppRzzfCfnbeju8d13f05ba3917b4a6c', 1522239819),
(10, 'oweowe', 'wew@oeor.com', 'Chima', 'Chima', NULL, '08093434423', '$2y$08$3OabJeQ032tGdBPoFM.M.e8I4oScFjT93NEC4jKPJ56LJ26ia2XWO', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'ceQUaJVwsrdlo', 1, '::1', '', NULL, '8ta.WjxHaGtew1xXFL6wou', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`user_id`, `group_id`) VALUES
(9, 2),
(10, 2);

-- --------------------------------------------------------

--
-- Table structure for table `wallet`
--

CREATE TABLE `wallet` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `currency` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `walletId` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `balance` double NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `conversations`
--
ALTER TABLE `conversations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_C2521BF1F624B39D` (`sender_id`),
  ADD KEY `IDX_C2521BF1E92F8F78` (`recipient_id`);

--
-- Indexes for table `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kyc`
--
ALTER TABLE `kyc`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_91850F8EA76ED395` (`user_id`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_DB021E96A76ED395` (`user_id`),
  ADD KEY `IDX_DB021E969AC0396` (`conversation_id`);

--
-- Indexes for table `trade`
--
ALTER TABLE `trade`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_7E1A4366A76ED395` (`user_id`),
  ADD KEY `IDX_7E1A4366770FF9FC` (`buyCurrency_id`),
  ADD KEY `IDX_7E1A4366A4A2AF17` (`sellCurrency_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_EAA81A4CA76ED395` (`user_id`),
  ADD KEY `IDX_EAA81A4CC2D9760` (`trade_id`),
  ADD KEY `IDX_EAA81A4C38248176` (`currency_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_1483A5E9F85E0677` (`username`),
  ADD UNIQUE KEY `UNIQ_1483A5E9E7927C74` (`email`),
  ADD UNIQUE KEY `UNIQ_1483A5E9444F97DD` (`phone`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`user_id`,`group_id`),
  ADD KEY `IDX_FF8AB7E0A76ED395` (`user_id`),
  ADD KEY `IDX_FF8AB7E0FE54D947` (`group_id`);

--
-- Indexes for table `wallet`
--
ALTER TABLE `wallet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_7C68921FA76ED395` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `conversations`
--
ALTER TABLE `conversations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `currency`
--
ALTER TABLE `currency`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `kyc`
--
ALTER TABLE `kyc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `trade`
--
ALTER TABLE `trade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `wallet`
--
ALTER TABLE `wallet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `conversations`
--
ALTER TABLE `conversations`
  ADD CONSTRAINT `FK_C2521BF1E92F8F78` FOREIGN KEY (`recipient_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `FK_C2521BF1F624B39D` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `kyc`
--
ALTER TABLE `kyc`
  ADD CONSTRAINT `FK_91850F8EA76ED395` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `FK_DB021E969AC0396` FOREIGN KEY (`conversation_id`) REFERENCES `conversations` (`id`),
  ADD CONSTRAINT `FK_DB021E96A76ED395` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `trade`
--
ALTER TABLE `trade`
  ADD CONSTRAINT `FK_7E1A4366770FF9FC` FOREIGN KEY (`buyCurrency_id`) REFERENCES `currency` (`id`),
  ADD CONSTRAINT `FK_7E1A4366A4A2AF17` FOREIGN KEY (`sellCurrency_id`) REFERENCES `currency` (`id`),
  ADD CONSTRAINT `FK_7E1A4366A76ED395` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `FK_EAA81A4C38248176` FOREIGN KEY (`currency_id`) REFERENCES `currency` (`id`),
  ADD CONSTRAINT `FK_EAA81A4CA76ED395` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `FK_EAA81A4CC2D9760` FOREIGN KEY (`trade_id`) REFERENCES `trade` (`id`);

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `FK_FF8AB7E0A76ED395` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `FK_FF8AB7E0FE54D947` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`);

--
-- Constraints for table `wallet`
--
ALTER TABLE `wallet`
  ADD CONSTRAINT `FK_7C68921FA76ED395` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
