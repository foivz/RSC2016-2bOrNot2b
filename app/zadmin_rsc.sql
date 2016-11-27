-- phpMyAdmin SQL Dump
-- version 4.1.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 27, 2016 at 07:01 AM
-- Server version: 5.5.44
-- PHP Version: 5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `zadmin_rsc`
--

-- --------------------------------------------------------

--
-- Table structure for table `rsc_answer`
--

CREATE TABLE IF NOT EXISTS `rsc_answer` (
  `answer_id` int(11) NOT NULL AUTO_INCREMENT,
  `answer_value` text NOT NULL,
  `answer_userdefine` tinyint(1) DEFAULT '0',
  `answer_question` int(11) NOT NULL,
  `answer_correctpoints` int(11) NOT NULL DEFAULT '1',
  `answer_wrongpoints` int(11) NOT NULL DEFAULT '0',
  `answer_correct` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`answer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `rsc_attendance`
--

CREATE TABLE IF NOT EXISTS `rsc_attendance` (
  `attendance_id` int(11) NOT NULL AUTO_INCREMENT,
  `attendance_user` int(11) NOT NULL,
  `attendance_event` int(11) NOT NULL,
  `attendance_submitted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `attendance_team` int(11) NOT NULL,
  PRIMARY KEY (`attendance_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `rsc_cache`
--

CREATE TABLE IF NOT EXISTS `rsc_cache` (
  `cache_id` int(11) NOT NULL AUTO_INCREMENT,
  `cache_active` int(11) NOT NULL DEFAULT '1',
  `cache_path` text NOT NULL,
  `cache_cmd` varchar(50) NOT NULL,
  `cache_rank` int(11) NOT NULL,
  `cache_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`cache_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `rsc_cache`
--

INSERT INTO `rsc_cache` (`cache_id`, `cache_active`, `cache_path`, `cache_cmd`, `cache_rank`, `cache_added`) VALUES
(1, 1, 'commands/user/list_all_users', 'list_all_users', 1, '2016-11-26 15:37:59'),
(2, 1, 'commands/user/get_self_info', 'get_self_info', 1, '2016-11-26 16:52:26'),
(3, 1, 'commands/user/add_quiz', 'add_quiz', 1, '2016-11-26 21:58:47'),
(4, 1, 'commands/user/list_categories', 'list_categories', 1, '2016-11-26 22:25:48'),
(5, 1, 'commands/user/list_quizes', 'list_quizes', 1, '2016-11-26 23:35:59'),
(6, 1, 'commands/user/add_event', 'add_event', 1, '2016-11-26 23:38:28'),
(7, 1, 'commands/user/homepage_stat', 'homepage_stat', 1, '2016-11-27 00:27:05'),
(8, 1, 'commands/user/home_list_quiz', 'home_list_quiz', 1, '2016-11-27 00:53:50'),
(9, 1, 'commands/user/home_list_events', 'home_list_events', 1, '2016-11-27 01:21:04');

-- --------------------------------------------------------

--
-- Table structure for table `rsc_category`
--

CREATE TABLE IF NOT EXISTS `rsc_category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(50) NOT NULL,
  `category_owner` int(11) NOT NULL,
  `category_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `rsc_category`
--

INSERT INTO `rsc_category` (`category_id`, `category_name`, `category_owner`, `category_created`) VALUES
(1, 'Sport', 1, '2016-11-26 22:28:23'),
(2, 'Music', 1, '2016-11-26 22:28:23'),
(3, 'Technology', 1, '2016-11-26 22:28:27'),
(4, 'Movies', 1, '2016-11-26 22:28:27');

-- --------------------------------------------------------

--
-- Table structure for table `rsc_events`
--

CREATE TABLE IF NOT EXISTS `rsc_events` (
  `event_id` int(11) NOT NULL AUTO_INCREMENT,
  `event_name` varchar(150) NOT NULL,
  `event_description` text NOT NULL,
  `event_host` int(11) NOT NULL,
  `event_public` tinyint(1) NOT NULL,
  `event_quiz` int(11) NOT NULL,
  `event_teams` tinyint(1) NOT NULL,
  `event_type` enum('pfe','wta') NOT NULL,
  `event_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `event_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`event_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `rsc_events`
--

INSERT INTO `rsc_events` (`event_id`, `event_name`, `event_description`, `event_host`, `event_public`, `event_quiz`, `event_teams`, `event_type`, `event_created`, `event_date`) VALUES
(1, 'Ready, Steady, Code!', 'This is a sample Event', 1, 0, 1, 1, 'wta', '2016-11-27 00:15:12', '2016-11-27 10:39:00');

-- --------------------------------------------------------

--
-- Table structure for table `rsc_question`
--

CREATE TABLE IF NOT EXISTS `rsc_question` (
  `question_id` int(11) NOT NULL AUTO_INCREMENT,
  `question_type` enum('single-choice','multiple-choice','textual') NOT NULL DEFAULT 'textual',
  `question_text` text NOT NULL,
  `question_quiz` int(11) NOT NULL,
  `question_after` int(11) NOT NULL,
  `question_author` int(11) NOT NULL,
  `question_time` int(11) NOT NULL DEFAULT '30',
  PRIMARY KEY (`question_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `rsc_quiz`
--

CREATE TABLE IF NOT EXISTS `rsc_quiz` (
  `quiz_id` int(11) NOT NULL AUTO_INCREMENT,
  `quiz_title` varchar(150) NOT NULL,
  `quiz_author` int(11) NOT NULL,
  `quiz_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `quiz_category` int(11) NOT NULL,
  PRIMARY KEY (`quiz_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `rsc_quiz`
--

INSERT INTO `rsc_quiz` (`quiz_id`, `quiz_title`, `quiz_author`, `quiz_created`, `quiz_category`) VALUES
(1, 'Testni kviz 1', 1, '2016-11-26 21:58:47', 1),
(2, 'Testni kviz 2', 1, '2016-11-26 22:03:47', 1),
(3, 'Testni kviz 3', 1, '2016-11-26 22:16:37', 1);

-- --------------------------------------------------------

--
-- Table structure for table `rsc_selection`
--

CREATE TABLE IF NOT EXISTS `rsc_selection` (
  `selection_id` int(11) NOT NULL AUTO_INCREMENT,
  `selection_user` int(11) NOT NULL,
  `selection_quiz` int(11) NOT NULL,
  `selection_answer` int(11) NOT NULL,
  `selection_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `selection_ip` int(11) NOT NULL,
  PRIMARY KEY (`selection_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `rsc_session`
--

CREATE TABLE IF NOT EXISTS `rsc_session` (
  `session_id` int(11) NOT NULL AUTO_INCREMENT,
  `session_key` varchar(16) NOT NULL,
  `session_user` int(11) NOT NULL,
  `session_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `session_ip` int(11) NOT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=181 ;

--
-- Dumping data for table `rsc_session`
--

INSERT INTO `rsc_session` (`session_id`, `session_key`, `session_user`, `session_created`, `session_ip`) VALUES
(3, '9f4eb888761204', 1, '2016-11-26 15:11:07', 784135647),
(4, '3175972c072af9', 5, '2016-11-26 15:13:10', 2147483647),
(5, '7086cdac5fd403', 1, '2016-11-26 15:36:52', 784135647),
(6, 'fbc3aaea9038ae', 1, '2016-11-26 16:00:45', 2147483647),
(7, 'da84651c7c956a', 1, '2016-11-26 16:50:42', 784135647),
(8, '2e3c83d2664baa', 1, '2016-11-26 18:11:28', 784135647),
(9, 'ccb01b379d59a8', 1, '2016-11-26 19:33:15', 784135647),
(10, '482d523195e3fe', 7, '2016-11-26 19:35:27', 2147483647),
(11, 'd56f410a26eacb', 8, '2016-11-26 19:44:23', 2147483647),
(12, '2ca8c1ab866d76', 1, '2016-11-26 20:13:29', 2147483647),
(13, '18ce2f097d3ec6', 1, '2016-11-26 20:13:47', 2147483647),
(14, '78b638eebae1b4', 8, '2016-11-26 20:14:42', 2147483647),
(15, '4f9acb3b410694', 1, '2016-11-26 20:15:08', 784135647),
(16, 'da64ade6c58f3d', 1, '2016-11-26 20:15:23', 784135647),
(17, '1a3cf56cbc4e0c', 8, '2016-11-26 20:28:26', 2147483647),
(18, 'e8e9ef63a3cb66', 8, '2016-11-26 20:34:15', 2147483647),
(19, '96036c8659495a', 8, '2016-11-26 20:35:41', 2147483647),
(20, '16b0f425549b80', 8, '2016-11-26 20:35:46', 2147483647),
(21, '30c0f13a20e120', 8, '2016-11-26 20:37:27', 2147483647),
(22, '5819bdd8a339a1', 8, '2016-11-26 20:41:08', 2147483647),
(23, '9fa196f692e5c5', 8, '2016-11-26 20:41:13', 2147483647),
(24, 'c688e4a4279e77', 8, '2016-11-26 20:41:19', 2147483647),
(25, 'd4b4c467f1856f', 8, '2016-11-26 20:41:27', 2147483647),
(26, 'ff19a375920f29', 8, '2016-11-26 20:41:33', 2147483647),
(27, '9a65fa92b78aa0', 8, '2016-11-26 20:45:42', 2147483647),
(28, 'c41e33076708cb', 8, '2016-11-26 20:46:52', 2147483647),
(29, '11c69e6d5e8f62', 8, '2016-11-26 20:47:00', 2147483647),
(30, '4ae10274a8545e', 8, '2016-11-26 20:47:02', 2147483647),
(31, '5750e9c408be8a', 8, '2016-11-26 20:47:04', 2147483647),
(32, '909c77d7503001', 8, '2016-11-26 20:49:12', 2147483647),
(33, 'de5dbddcce68cb', 8, '2016-11-26 20:50:11', 2147483647),
(34, 'c953052b18fde7', 8, '2016-11-26 20:51:53', 2147483647),
(35, 'b49beb0cc6dc34', 8, '2016-11-26 20:53:00', 2147483647),
(36, 'eefd213ad79005', 8, '2016-11-26 20:53:03', 2147483647),
(37, 'ef5e6f84a39062', 8, '2016-11-26 20:53:06', 2147483647),
(38, '2a85dd59ebefcf', 8, '2016-11-26 20:53:13', 2147483647),
(39, '0998d7d7b53afd', 8, '2016-11-26 20:53:16', 2147483647),
(40, 'fe40525ba5a1e9', 8, '2016-11-26 20:53:17', 2147483647),
(41, 'a9f2c00a588ada', 8, '2016-11-26 20:53:20', 2147483647),
(42, '6394891600f030', 8, '2016-11-26 20:53:20', 2147483647),
(43, '9aa8eacefd5ea4', 1, '2016-11-26 20:53:55', 784135647),
(44, 'ea3be56a332f77', 8, '2016-11-26 20:54:14', 2147483647),
(45, 'b7c65500b3a8fc', 8, '2016-11-26 20:54:25', 2147483647),
(46, 'd8f087647812dc', 1, '2016-11-26 20:54:32', 784135647),
(47, '1107a9ef817739', 1, '2016-11-26 20:55:12', 784135647),
(48, 'a9cca75fcda4aa', 8, '2016-11-26 20:55:16', 2147483647),
(49, 'bd7fa7c1b59a77', 8, '2016-11-26 20:55:37', 2147483647),
(50, '022ddc35643aa1', 8, '2016-11-26 20:55:40', 2147483647),
(51, '47a9e712ebc2fc', 8, '2016-11-26 20:55:41', 2147483647),
(52, '54166f28e62a6b', 8, '2016-11-26 20:55:41', 2147483647),
(53, 'e96e1d31cf596a', 8, '2016-11-26 20:55:42', 2147483647),
(54, '1499e9c6cbdb5a', 1, '2016-11-26 20:56:06', 784135647),
(55, 'f5232f127d5e1a', 1, '2016-11-26 20:56:14', 784135647),
(56, 'b006b7748b9648', 8, '2016-11-26 20:56:29', 2147483647),
(57, '3727ef6d6c69fa', 1, '2016-11-26 20:56:48', 784135647),
(58, '01901d42d904fc', 8, '2016-11-26 20:56:49', 2147483647),
(59, '79b871b616a5c6', 1, '2016-11-26 20:57:50', 784135647),
(60, '4c13d59426d3b7', 8, '2016-11-26 20:59:38', 2147483647),
(61, '13c037089016d2', 8, '2016-11-26 20:59:42', 2147483647),
(62, '431383500eb37e', 8, '2016-11-26 20:59:44', 2147483647),
(63, 'e17ebdb5a15ce9', 8, '2016-11-26 20:59:45', 2147483647),
(64, 'bd00b2d510f34d', 8, '2016-11-26 21:00:41', 2147483647),
(65, '1f083abf962f6c', 8, '2016-11-26 21:00:56', 2147483647),
(66, '56021dd4d032ed', 1, '2016-11-26 21:01:02', 784135647),
(67, '513b3c6bf10544', 8, '2016-11-26 21:01:07', 2147483647),
(68, '71a91c29b0dced', 1, '2016-11-26 21:02:39', 784135647),
(69, '7abd80fbb41099', 8, '2016-11-26 21:08:35', 784135647),
(70, '5ba90be7d3cc97', 8, '2016-11-26 21:11:30', 784135647),
(71, 'c49d08f281a665', 8, '2016-11-26 21:11:35', 784135647),
(72, 'f974a895c22776', 8, '2016-11-26 21:17:55', 784135647),
(73, '2985b156ba3373', 8, '2016-11-26 21:38:32', 784135647),
(74, '8866807bede0f7', 8, '2016-11-26 21:51:13', 784135647),
(75, 'dfd3a46c6709c3', 8, '2016-11-26 21:56:07', 784135647),
(76, '41f16d57020b71', 8, '2016-11-26 21:56:51', 784135647),
(77, '54c7898da0d6f1', 8, '2016-11-26 21:59:08', 784135647),
(78, 'a15700e7590afb', 8, '2016-11-26 22:01:39', 784135647),
(79, 'cbcf5b2c660bca', 8, '2016-11-26 22:05:30', 2147483647),
(80, '72c0d74b71b749', 8, '2016-11-26 22:15:30', 2147483647),
(81, 'de03fc4eeef5cd', 8, '2016-11-26 22:15:33', 2147483647),
(82, '1f06813b4170e7', 8, '2016-11-26 22:17:51', 2147483647),
(83, '3ac4418aae455b', 8, '2016-11-26 22:18:04', 2147483647),
(84, '365c1fb564e811', 8, '2016-11-26 22:25:20', 2147483647),
(85, 'cc4c3655133fdb', 8, '2016-11-26 22:26:00', 2147483647),
(86, '7758501f4e6130', 8, '2016-11-26 22:27:31', 2147483647),
(87, '7af2bba6dbed5c', 8, '2016-11-26 22:30:39', 2147483647),
(88, 'e6e14dd4d71575', 8, '2016-11-26 22:30:42', 2147483647),
(89, '5742cccf841751', 8, '2016-11-26 22:33:22', 2147483647),
(90, 'd7dc13e0259adb', 8, '2016-11-26 22:33:30', 2147483647),
(91, 'ff66835f7f9de5', 8, '2016-11-26 22:34:14', 2147483647),
(92, '91542d1b401e72', 8, '2016-11-26 22:35:50', 2147483647),
(93, '2077090bc079c3', 8, '2016-11-26 22:37:53', 2147483647),
(94, '046311231e3d92', 5, '2016-11-26 22:38:30', 2147483647),
(95, 'b179f22ea32c1f', 5, '2016-11-26 22:42:22', 534330501),
(96, '73135bea613333', 8, '2016-11-26 22:43:37', 2147483647),
(97, '2781de63b1b9bf', 8, '2016-11-26 22:45:06', 2147483647),
(98, '0ff625fe54558e', 8, '2016-11-26 22:52:24', 2147483647),
(99, '76c9891a10b5ec', 8, '2016-11-26 23:09:03', 2147483647),
(100, 'd25dfbc1ad6a2c', 8, '2016-11-26 23:10:09', 2147483647),
(101, '62b7881550a259', 8, '2016-11-26 23:14:00', 2147483647),
(102, '1ef96c06b0e406', 8, '2016-11-26 23:25:35', 2147483647),
(103, '3dc1e10e3c52dd', 8, '2016-11-26 23:25:43', 2147483647),
(104, '9b4273f70c092b', 8, '2016-11-26 23:26:06', 2147483647),
(105, '339ae9c5443eb5', 5, '2016-11-27 00:14:31', 2147483647),
(106, '97585e069546e4', 7, '2016-11-27 00:16:27', 2147483647),
(107, '8cbf5e135ab26e', 5, '2016-11-27 00:19:59', 2147483647),
(108, '9ef5821b2cc65d', 8, '2016-11-27 00:21:20', 2147483647),
(109, 'aa5a13c6ab00be', 8, '2016-11-27 00:21:56', 2147483647),
(110, '92b8bebfb57bac', 8, '2016-11-27 00:22:01', 2147483647),
(111, '7f5c0e11897c0f', 8, '2016-11-27 00:23:05', 2147483647),
(112, '84f6fd60ace977', 5, '2016-11-27 00:29:45', 2147483647),
(113, '1a7be633ad0b15', 8, '2016-11-27 00:32:22', 2147483647),
(114, '9b02b281a86cf8', 8, '2016-11-27 00:32:31', 2147483647),
(115, '8e1fa6827ce83d', 8, '2016-11-27 00:32:34', 2147483647),
(116, 'ee3d2bb5d2cdac', 8, '2016-11-27 00:33:03', 2147483647),
(117, '2a87c32c3571a0', 8, '2016-11-27 00:42:10', 2147483647),
(118, '2d4935c4a43bc4', 8, '2016-11-27 00:42:13', 2147483647),
(119, 'f54d36f0ff7d45', 7, '2016-11-27 00:42:41', 2147483647),
(120, 'a8b183205146af', 8, '2016-11-27 00:44:27', 2147483647),
(121, '7568ca90b6fecc', 8, '2016-11-27 00:53:20', 2147483647),
(122, '43e69729ba8d75', 8, '2016-11-27 00:53:23', 2147483647),
(123, 'c4fd6cdc8de624', 8, '2016-11-27 00:56:45', 2147483647),
(124, '8aa12029f1f670', 8, '2016-11-27 01:05:47', 2147483647),
(125, '9330332b26ec44', 8, '2016-11-27 01:05:52', 2147483647),
(126, '16484915d09410', 8, '2016-11-27 01:08:46', 2147483647),
(127, '58e4c533d36b72', 8, '2016-11-27 01:10:09', 2147483647),
(128, 'fb36649c7ec0dc', 8, '2016-11-27 01:27:37', 2147483647),
(129, '881cada9651ef8', 8, '2016-11-27 01:31:39', 2147483647),
(130, '59285c3b4cfc91', 8, '2016-11-27 01:37:37', 2147483647),
(131, '50800d0daa968a', 8, '2016-11-27 02:03:51', 2147483647),
(132, 'eff70e2d6b4cbd', 8, '2016-11-27 02:05:50', 2147483647),
(133, 'f98d84bd0ae845', 8, '2016-11-27 02:18:35', 2147483647),
(134, '50fc72d28ffffd', 8, '2016-11-27 02:24:27', 2147483647),
(135, 'fd58fbbf675928', 8, '2016-11-27 02:39:02', 2147483647),
(136, 'fd5c7f6b307ac3', 1, '2016-11-27 03:17:40', 784135647),
(137, 'b88a7e913291af', 8, '2016-11-27 03:33:40', 2147483647),
(138, '2637aeba72d5ac', 8, '2016-11-27 03:34:16', 2147483647),
(139, '4c25cc4d750fcb', 8, '2016-11-27 03:35:10', 2147483647),
(140, 'c902a95934d252', 8, '2016-11-27 03:36:21', 2147483647),
(141, 'b44d4e8b4c4c2c', 8, '2016-11-27 03:36:28', 2147483647),
(142, '736e7788b78a56', 7, '2016-11-27 03:37:00', 2147483647),
(143, '26b5973f37ed55', 8, '2016-11-27 03:37:10', 2147483647),
(144, '8f10951a26225b', 1, '2016-11-27 03:37:51', 784135647),
(145, 'abedd563d9c552', 8, '2016-11-27 03:38:28', 2147483647),
(146, '1ba8ba11278123', 8, '2016-11-27 03:38:28', 2147483647),
(147, '8f690825aa11b9', 8, '2016-11-27 03:40:01', 2147483647),
(148, '778729f4df4030', 8, '2016-11-27 03:40:17', 2147483647),
(149, '30d50f6f9fa982', 8, '2016-11-27 04:02:51', 2147483647),
(150, 'd32fc30745177f', 8, '2016-11-27 04:02:53', 2147483647),
(151, '68c5852a37198b', 8, '2016-11-27 04:07:19', 2147483647),
(152, '95523a21929454', 8, '2016-11-27 04:07:55', 2147483647),
(153, '2bdaa835a33478', 8, '2016-11-27 04:08:42', 2147483647),
(154, 'ac9e62fba23716', 8, '2016-11-27 04:11:09', 2147483647),
(155, '598e4b3dcf7668', 8, '2016-11-27 04:13:37', 2147483647),
(156, 'd445352793bc87', 8, '2016-11-27 04:14:48', 2147483647),
(157, '1f537c2345bcfe', 8, '2016-11-27 04:15:27', 2147483647),
(158, 'c3ac94e1bd1aeb', 8, '2016-11-27 04:15:49', 2147483647),
(159, '2e33b4a6945d33', 8, '2016-11-27 04:16:07', 2147483647),
(160, '468e18809cd922', 8, '2016-11-27 04:17:06', 2147483647),
(161, '49f1ff74dad04a', 8, '2016-11-27 04:22:02', 2147483647),
(162, '9ffbb4209af2b7', 8, '2016-11-27 04:22:03', 2147483647),
(163, '0cbe8ec449a1cf', 8, '2016-11-27 04:27:03', 2147483647),
(164, '842e0e74ec88c3', 8, '2016-11-27 04:27:56', 2147483647),
(165, '300ec0a2406100', 8, '2016-11-27 04:29:37', 2147483647),
(166, 'ac8784c3d5f262', 8, '2016-11-27 04:30:31', 2147483647),
(167, '0a50c40203f9fa', 8, '2016-11-27 04:31:00', 2147483647),
(168, 'a85f8b3bcc0524', 8, '2016-11-27 04:42:36', 2147483647),
(169, '810d491437c64d', 8, '2016-11-27 04:42:50', 2147483647),
(170, '6a5a97da5e5860', 8, '2016-11-27 04:43:26', 2147483647),
(171, 'eaeea7f2bf9489', 8, '2016-11-27 04:43:45', 2147483647),
(172, 'c905437e63357f', 8, '2016-11-27 04:43:52', 2147483647),
(173, '832da459959976', 8, '2016-11-27 04:44:23', 2147483647),
(174, '653283986ca98c', 8, '2016-11-27 04:44:47', 2147483647),
(175, '63d4c7e4142cc1', 8, '2016-11-27 05:28:31', 2147483647),
(176, 'c0d53d9423e518', 8, '2016-11-27 05:28:41', 2147483647),
(177, '269bbbe16560fb', 8, '2016-11-27 05:33:47', 2147483647),
(178, 'f538362ba9528e', 1, '2016-11-27 05:47:34', 2147483647),
(179, '6810e129b3cea2', 8, '2016-11-27 05:48:04', 2147483647),
(180, '0365a4a746a169', 8, '2016-11-27 05:54:33', 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `rsc_team`
--

CREATE TABLE IF NOT EXISTS `rsc_team` (
  `team_id` int(11) NOT NULL AUTO_INCREMENT,
  `team_name` varchar(150) NOT NULL,
  `team_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `team_leader` int(11) NOT NULL,
  `team_quiz` int(11) NOT NULL,
  PRIMARY KEY (`team_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `rsc_user`
--

CREATE TABLE IF NOT EXISTS `rsc_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_oid` varchar(20) NOT NULL,
  `user_name` varchar(25) NOT NULL,
  `user_email` varchar(25) NOT NULL,
  `user_rank` int(11) NOT NULL DEFAULT '1',
  `user_url` varchar(250) NOT NULL,
  `user_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_picture` varchar(250) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `rsc_user`
--

INSERT INTO `rsc_user` (`user_id`, `user_oid`, `user_name`, `user_email`, `user_rank`, `user_url`, `user_created`, `user_picture`) VALUES
(1, '1377585585585614', 'Filip Meštrić', 'filip@enytstudio.com', 1, 'https://www.facebook.com/app_scoped_user_id/1377585585585614/', '2016-11-26 14:50:17', 'https://scontent.xx.fbcdn.net/v/t1.0-1/c0.2.50.50/p50x50/11102717_996015763742600_2942686405177297252_n.jpg?oh=35583969cce4bf284b73ebf92ea2c5c1&oe=58BEF01D'),
(5, '1300597906626906', 'Robert Langus', 'ro.langus@gmail.com', 1, 'https://www.facebook.com/app_scoped_user_id/1300597906626906/', '2016-11-26 15:10:28', 'https://scontent.xx.fbcdn.net/v/t1.0-1/p50x50/12310685_1053099148043451_4435058948651714163_n.jpg?oh=8be4aea2077cb3dfc1c030ec00b858ea&oe=58CE0FCF'),
(7, '10208502358464754', 'Tomislav Novak', 'tupactomi@hotmail.com', 1, 'https://www.facebook.com/app_scoped_user_id/10208502358464754/', '2016-11-26 15:12:25', 'https://scontent.xx.fbcdn.net/v/t1.0-1/c0.0.50.50/p50x50/14237607_10207816841687263_240642552572868775_n.jpg?oh=48030bb658123af24317e45a8c1c018d&oe=58C40B28'),
(8, '1122776014507409', 'Filip Kukovec', 'filip.kukovec@gmail.com', 1, 'https://www.facebook.com/app_scoped_user_id/1122776014507409/ ', '2016-11-26 19:43:53', 'https://scontent.xx.fbcdn.net/v/t1.0-1/p50x50/13331034_976812555770423_5371448632874792848_n.jpg?oh=0d84bda439dd1e337801424280afa6fc&oe=58CCEE06');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
