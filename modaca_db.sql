-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 27, 2014 at 08:44 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `modaca_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrators`
--

CREATE TABLE IF NOT EXISTS `administrators` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact_no` varchar(12) NOT NULL,
  `address` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `profile_photo` varchar(255) DEFAULT NULL,
  `bio` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `administrators`
--

INSERT INTO `administrators` (`id`, `user_id`, `first_name`, `last_name`, `gender`, `email`, `contact_no`, `address`, `designation`, `username`, `password`, `profile_photo`, `bio`, `created`, `modified`) VALUES
(1, NULL, 'Kasun', 'Kodagoda', 'Male', 'kvkrusl@gmail.com', '0717673839', '153/C, Ihalayagoda, Gampaha.', 'Demo', 'kvk', '7e9e2eee3b6db1b90b2402b1fa31df69bc2f0fed', NULL, 'Test bio', '2014-08-05 12:20:36', '2014-08-05 12:20:39'),
(2, NULL, 'Oreliya', 'Fernando', 'Female', 'ict009@gmail.com', '0717584586', 'Negombo', 'Demo', 'oreliya', '7e9e2eee3b6db1b90b2402b1fa31df69bc2f0fed', NULL, 'Test Bio', '2014-08-05 12:37:46', '2014-08-05 12:37:49'),
(3, NULL, 'Nadeesha', 'Thilakarathne', 'Female', 'nadeesha@gmail.com', '0711231234', 'Kurunagala', 'Demo', 'nadeesha', '7e9e2eee3b6db1b90b2402b1fa31df69bc2f0fed', NULL, 'Test Bio', '2014-08-05 12:39:45', '2014-08-05 12:39:47');

-- --------------------------------------------------------

--
-- Table structure for table `babies`
--

CREATE TABLE IF NOT EXISTS `babies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `household_id` int(11) NOT NULL,
  `baby_name` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `no_of_sibiling` int(11) DEFAULT NULL,
  `profile_photo` varchar(255) DEFAULT NULL,
  `health_issue_id` int(11) DEFAULT NULL,
  `weight` float DEFAULT NULL,
  `height` float DEFAULT NULL,
  `note` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_babies_households` (`household_id`),
  KEY `FK_babies_health_issues` (`health_issue_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `b_m_is`
--

CREATE TABLE IF NOT EXISTS `b_m_is` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `family_member_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `value` float NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_bmis_family_members` (`family_member_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `child_growths`
--

CREATE TABLE IF NOT EXISTS `child_growths` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `household_id` int(11) NOT NULL,
  `baby_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `weight` float NOT NULL,
  `height` float NOT NULL,
  `age_year` int(11) DEFAULT NULL,
  `age_month` int(11) DEFAULT NULL,
  `vision` tinyint(4) DEFAULT NULL,
  `hearing` tinyint(4) DEFAULT NULL,
  `sensitivity` tinyint(4) DEFAULT NULL,
  `smell` tinyint(4) DEFAULT NULL,
  `taste` tinyint(4) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_child_growths_households` (`household_id`),
  KEY `FK_child_growths_babies` (`baby_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `determinants`
--

CREATE TABLE IF NOT EXISTS `determinants` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `health_issue_id` int(11) NOT NULL,
  `questionnaire_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_determinants_health_issues` (`health_issue_id`),
  KEY `FK_determinants_questionnaires` (`questionnaire_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `family_members`
--

CREATE TABLE IF NOT EXISTS `family_members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `household_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `occupation` varchar(255) DEFAULT NULL,
  `profile_photo` varchar(255) DEFAULT NULL,
  `decease` text,
  `health_issue_id` int(11) DEFAULT NULL,
  `sleeping_hour` float DEFAULT NULL,
  `exercise_hour` float DEFAULT NULL,
  `educational_level` varchar(255) DEFAULT NULL,
  `bmi` float DEFAULT NULL,
  `whr` float DEFAULT NULL,
  `note` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_family_members_households` (`household_id`),
  KEY `FK_family_members_health_issues` (`health_issue_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `family_member_knowledges`
--

CREATE TABLE IF NOT EXISTS `family_member_knowledges` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `family_member_id` int(11) NOT NULL,
  `questionnaire_id` int(11) NOT NULL,
  `marks_percent` float NOT NULL,
  `date` date NOT NULL,
  `note` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_family_member_knowledges_family_members` (`family_member_id`),
  KEY `FK_family_member_knowledges_questionnaires` (`questionnaire_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `field_communities`
--

CREATE TABLE IF NOT EXISTS `field_communities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(40) DEFAULT NULL,
  `gn_area` varchar(255) NOT NULL,
  `moh_area` varchar(255) NOT NULL,
  `phi_area` varchar(255) NOT NULL,
  `phm_are` varchar(255) NOT NULL,
  `village_name` varchar(255) NOT NULL,
  `no_of_families` int(11) NOT NULL,
  `population` int(11) NOT NULL,
  `field_map` varchar(255) DEFAULT NULL,
  `field_group_id` int(11) DEFAULT NULL,
  `no_of_formal_settings` int(11) DEFAULT NULL,
  `no_of_informal_settings` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_field_communities_field_groups` (`field_group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `field_communities`
--

INSERT INTO `field_communities` (`id`, `title`, `gn_area`, `moh_area`, `phi_area`, `phm_are`, `village_name`, `no_of_families`, `population`, `field_map`, `field_group_id`, `no_of_formal_settings`, `no_of_informal_settings`, `created`, `modified`) VALUES
(1, 'Mihintale North', 'Mihintale North', 'Mihintale', 'Mihintale', 'Mihintale', 'Kannatiya', 500, 1800, NULL, 1, 5, 8, '2014-07-16 11:46:21', '2014-07-16 11:46:28'),
(2, 'Mihintale South', 'Mihintale South', 'Mihintale', 'Mihintale', 'Mihintale', 'Gewal 20', 20, 120, NULL, 2, 4, 5, '2014-08-05 12:42:45', '2014-08-05 12:42:48'),
(3, 'Mihintale West', 'Mihintale West', 'Mihintale', 'Mihintale', 'Mihintale', 'Gewal 100', 100, 450, NULL, 3, 5, 7, '2014-08-05 12:45:21', '2014-08-05 12:45:24');

-- --------------------------------------------------------

--
-- Table structure for table `field_groups`
--

CREATE TABLE IF NOT EXISTS `field_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(12) NOT NULL,
  `no_of_members` int(11) NOT NULL,
  `field_community_id` int(11) NOT NULL,
  `task_assigner_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_field_groups_field_communities` (`field_community_id`),
  KEY `FK_field_groups_task_assigners` (`task_assigner_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `field_groups`
--

INSERT INTO `field_groups` (`id`, `name`, `no_of_members`, `field_community_id`, `task_assigner_id`, `created`, `modified`) VALUES
(1, 'Group A', 5, 1, 1, '2014-07-16 11:58:12', '2014-07-16 11:58:15'),
(2, 'Group B', 4, 3, 2, '2014-07-16 11:59:13', '2014-07-16 11:59:18'),
(3, 'Group C', 4, 2, 3, '2014-08-05 12:46:28', '2014-08-05 12:46:30');

-- --------------------------------------------------------

--
-- Table structure for table `field_group_progresses`
--

CREATE TABLE IF NOT EXISTS `field_group_progresses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `field_group_id` int(11) NOT NULL,
  `no_of_field_visits` int(11) DEFAULT NULL,
  `community_feedback` varchar(255) DEFAULT NULL,
  `mark` float DEFAULT NULL,
  `note` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_field_group_progresses__field_groups` (`field_group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `flour_usages`
--

CREATE TABLE IF NOT EXISTS `flour_usages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `household_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `value` float NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_flour_usages_households` (`household_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `health_issues`
--

CREATE TABLE IF NOT EXISTS `health_issues` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `issue_name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `health_issue_communities`
--

CREATE TABLE IF NOT EXISTS `health_issue_communities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `field_community_id` int(11) NOT NULL,
  `health_issue_id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_health_issue_communities_field_communities` (`field_community_id`),
  KEY `FK_health_issue_communities_health_issues` (`health_issue_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `health_issue_groups`
--

CREATE TABLE IF NOT EXISTS `health_issue_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `field_community_id` int(11) NOT NULL,
  `health_issue_id` int(11) NOT NULL,
  `group_title` varchar(255) NOT NULL,
  `no_of_members` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_health_issue_groups_field_communities` (`field_community_id`),
  KEY `FK_health_issue_groups_health_issues` (`health_issue_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `health_issue_group_progresses`
--

CREATE TABLE IF NOT EXISTS `health_issue_group_progresses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `health_issue_group_id` int(11) NOT NULL,
  `indicator_id` int(11) NOT NULL,
  `description` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_health_issue_group_progresses_health_issue_groups` (`health_issue_group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `households`
--

CREATE TABLE IF NOT EXISTS `households` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `field_community_id` int(11) NOT NULL,
  `household_identifier` varchar(40) NOT NULL,
  `leader_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact_no` varchar(12) DEFAULT NULL,
  `gps_latitude` float NOT NULL,
  `gps_longitude` float NOT NULL,
  `race` varchar(255) NOT NULL,
  `no_of_members` int(11) NOT NULL,
  `no_of_babies` int(11) NOT NULL,
  `no_of_pregnant_mothers` int(11) NOT NULL,
  `income` float NOT NULL,
  `ranking` float DEFAULT NULL,
  `note` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_households_field_communities` (`field_community_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `households`
--

INSERT INTO `households` (`id`, `field_community_id`, `household_identifier`, `leader_name`, `address`, `contact_no`, `gps_latitude`, `gps_longitude`, `race`, `no_of_members`, `no_of_babies`, `no_of_pregnant_mothers`, `income`, `ranking`, `note`, `created`, `modified`) VALUES
(1, 1, 'H1', 'J.K. Karunadasa', 'Mihintale', '0712345678', 8.35576, 80.4988, 'Sinhala', 3, 1, 0, 50000, NULL, 'House', '2014-08-05 13:24:26', '2014-08-05 13:24:30'),
(2, 2, 'H2', 'K.B. Karunarathna', 'Mihintale ', '0712345678', 8.35574, 80.4991, 'Sinhala', 4, 1, 1, 5000, NULL, 'HOuse', '2014-08-05 13:25:37', '2014-08-05 13:25:40'),
(3, 3, 'H3', 'D.B. Jayasumana', 'Mihintale', '0712345678', 8.35591, 80.4993, 'Sinhala', 2, 0, 0, 45000, NULL, 'House', '2014-08-05 13:26:47', '2014-08-05 13:26:50'),
(4, 2, 'H4', 'Sudu Banda', 'Mihintale', '0712345678', 8.3542, 80.498, 'Sinhala', 5, 1, 0, 48000, NULL, 'House', '2014-08-05 13:27:50', '2014-08-05 13:27:52');

-- --------------------------------------------------------

--
-- Table structure for table `indicators`
--

CREATE TABLE IF NOT EXISTS `indicators` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(40) DEFAULT NULL,
  `health_issue_id` int(11) NOT NULL,
  `indicator_type` varchar(40) NOT NULL,
  `description` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_indicators_health_issues` (`health_issue_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `legends`
--

CREATE TABLE IF NOT EXISTS `legends` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(40) DEFAULT NULL,
  `questionnaire_id` int(11) NOT NULL,
  `entry_no` varchar(40) NOT NULL,
  `entry` text,
  `lower_range_value` int(11) NOT NULL,
  `upper_range_value` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_legends_questionnaires` (`questionnaire_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `navigation_details`
--

CREATE TABLE IF NOT EXISTS `navigation_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `household_id` int(11) NOT NULL,
  `latitude` float NOT NULL,
  `longitude` float NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_navigation_details_households` (`household_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `oil_usages`
--

CREATE TABLE IF NOT EXISTS `oil_usages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `household_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `value` float NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_oil_usages_households` (`household_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pregnant_mothers`
--

CREATE TABLE IF NOT EXISTS `pregnant_mothers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `household_id` int(11) NOT NULL,
  `family_member_id` int(11) NOT NULL,
  `note` text,
  `fetus_age` int(11) NOT NULL,
  `no_of_children` int(11) NOT NULL,
  `weight` float NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_pregnant_mothers_households` (`household_id`),
  KEY `FK_pregnant_mothers_family_members` (`family_member_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pregnant_mother_knowledges`
--

CREATE TABLE IF NOT EXISTS `pregnant_mother_knowledges` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pregnant_mother_id` int(11) NOT NULL,
  `questionnaire_id` int(11) NOT NULL,
  `marks_percent` float NOT NULL,
  `date` date NOT NULL,
  `note` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_pregnant_mother_knowledges_pregnant_mothers` (`pregnant_mother_id`),
  KEY `FK_pregnant_mother_knowledges_questionnaires` (`questionnaire_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `questionnaires`
--

CREATE TABLE IF NOT EXISTS `questionnaires` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `legend_id` int(11) DEFAULT NULL,
  `health_issue_id` int(11) DEFAULT NULL,
  `no_of_questions` int(11) NOT NULL,
  `description` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_questionnaires_legends` (`legend_id`),
  KEY `FK_questionnaires_health_issues` (`health_issue_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `questionnaire_id` int(11) NOT NULL,
  `question_no` int(11) NOT NULL,
  `question` text NOT NULL,
  `no_of_responses` int(11) NOT NULL,
  `weight_of_response1` int(11) DEFAULT NULL,
  `weight_of_response2` int(11) DEFAULT NULL,
  `weight_of_response3` int(11) DEFAULT NULL,
  `weight_of_response4` int(11) DEFAULT NULL,
  `weight_of_response5` int(11) DEFAULT NULL,
  `weight_of_response6` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_questions_questionnaires` (`questionnaire_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `salt_usages`
--

CREATE TABLE IF NOT EXISTS `salt_usages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `household_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `value` float NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_salt_usages_households` (`household_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `staffs`
--

CREATE TABLE IF NOT EXISTS `staffs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact_no` varchar(12) NOT NULL,
  `address` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `profile_photo` varchar(255) DEFAULT NULL,
  `bio` varchar(255) DEFAULT NULL,
  `approved` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `field_group_id` int(11) NOT NULL,
  `index_no` int(11) NOT NULL,
  `reg_no` varchar(20) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact_no` varchar(12) NOT NULL,
  `address` varchar(255) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `profile_photo` varchar(255) DEFAULT NULL,
  `bio` varchar(255) DEFAULT NULL,
  `approved` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_students_field_groups` (`field_group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `user_id`, `field_group_id`, `index_no`, `reg_no`, `first_name`, `last_name`, `gender`, `email`, `contact_no`, `address`, `username`, `password`, `profile_photo`, `bio`, `approved`, `created`, `modified`) VALUES
(1, NULL, 1, 2465, 'ICT/09/10/024', 'Kasun', 'Kodagoda', 'Male', 'kvkrusl@gmail.com', '0717673839', '153/C, Ihalayagoda, Gampaha', 'kvk', '7e9e2eee3b6db1b90b2402b1fa31df69bc2f0fed', '', 'Test bio', 1, '2014-08-05 09:05:59', '2014-08-05 09:05:59'),
(2, NULL, 2, 2466, 'ICT/09/10/025', 'Nadeesha', 'Thilakarathne', 'Female', 'nadeesha@gmail.com', '0711234567', 'Kurunagala', 'nadeesha', '7e9e2eee3b6db1b90b2402b1fa31df69bc2f0fed', NULL, 'Test Bio', 1, '2014-08-05 12:48:27', '2014-08-05 12:48:30'),
(3, NULL, 3, 2467, 'ICT/09/10/009', 'Oreliya', 'Fernando', 'Female', 'oreliya@gmail.com', '0711234567', 'Negombo', 'oreliya', '7e9e2eee3b6db1b90b2402b1fa31df69bc2f0fed', NULL, 'Test Bio', 1, '2014-08-05 12:49:47', '2014-08-05 12:49:49'),
(4, NULL, 1, 2468, 'ICT/09/10/021', 'Kaushal', 'Nihathamana', 'Male', 'kaushal@gmail.com', '0711234567', 'Galle', 'kaushal', '7e9e2eee3b6db1b90b2402b1fa31df69bc2f0fed', NULL, 'Test Bio', 1, '2014-08-05 13:09:12', '2014-08-05 13:09:15'),
(5, NULL, 2, 2469, 'ICT/09/10/069', 'Shifan', 'Mohemad', 'Male', 'shifan@gmail.com', '0711234567', 'Kurunagala', 'shifan', '7e9e2eee3b6db1b90b2402b1fa31df69bc2f0fed', NULL, 'Test Bio', 1, '2014-08-05 13:10:25', '2014-08-05 13:10:28'),
(6, NULL, 3, 2470, 'ICT/09/10/070', 'Gayan', 'Buddika', 'Male', 'gayan@gmail.com', '0711234567', 'Gampaha', 'gayan', '7e9e2eee3b6db1b90b2402b1fa31df69bc2f0fed', NULL, 'Test Bio', 1, '2014-08-05 13:14:22', '2014-08-05 13:14:24'),
(7, NULL, 2, 2471, 'ICT/09/10/071', 'Nayana', 'Udesh', 'Male', 'nayana@gmail.com', '0711234567', 'Gampaha', 'nayana', '7e9e2eee3b6db1b90b2402b1fa31df69bc2f0fed', NULL, 'Test Bio', 0, '2014-08-05 13:15:37', '2014-08-05 13:15:39'),
(8, NULL, 2, 2464, 'ICT/09/10/022', 'Kasun', 'Kodagoda', 'Male', 'kvkrusl@gmail.com', '0717673839', '153/C, Ihalayagoda, Gampaha', 'kvk', 'd90d2295142ada7d690549eb9f9c2c9901bfcf96', '', 'Test biography', 0, '2014-08-17 10:23:10', '2014-08-17 10:23:10'),
(9, NULL, 2, 2464, 'ICT/09/10/022', 'Kasun KAsun', 'Kodagoda', 'Male', 'kvkrusl@gmail.com', '0717673839', '153/C, Ihalayagoda, Gampaha', 'kvk', 'd90d2295142ada7d690549eb9f9c2c9901bfcf96', '', 'Test biography', 0, '2014-08-17 10:24:28', '2014-08-17 10:24:28'),
(10, NULL, 2, 2456, 'ICT/09/10/024', 'Test User', 'user', 'Male', 'user@gmail.com', '0717673839', 'Gampaha', 'user', '7e9e2eee3b6db1b90b2402b1fa31df69bc2f0fed', '', 'Profile', 0, '2014-08-18 09:46:33', '2014-08-18 09:46:33');

-- --------------------------------------------------------

--
-- Table structure for table `student_progresses`
--

CREATE TABLE IF NOT EXISTS `student_progresses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `attendance` tinyint(1) NOT NULL,
  `date` date NOT NULL,
  `start_time` datetime DEFAULT NULL,
  `end_time` datetime DEFAULT NULL,
  `mark` float DEFAULT NULL,
  `note` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_student_progresses_students` (`student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sugar_usages`
--

CREATE TABLE IF NOT EXISTS `sugar_usages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `household_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `value` float NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_sugar_usages_households` (`household_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `task_assigners`
--

CREATE TABLE IF NOT EXISTS `task_assigners` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `field_group_id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_task_assigners_students` (`student_id`),
  KEY `FK_task_assigners_field_groups` (`field_group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `task_assigners`
--

INSERT INTO `task_assigners` (`id`, `student_id`, `field_group_id`, `created`, `modified`) VALUES
(1, 1, 1, '2014-08-05 13:19:11', '2014-08-05 13:19:15'),
(2, 2, 2, '2014-08-05 13:19:25', '2014-08-05 13:19:28'),
(3, 3, 3, '2014-08-05 13:19:37', '2014-08-05 13:19:40');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(20) DEFAULT NULL,
  `username` varchar(40) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `w_h_rs`
--

CREATE TABLE IF NOT EXISTS `w_h_rs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `family_member_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `value` float NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_whrs_family_members` (`family_member_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
