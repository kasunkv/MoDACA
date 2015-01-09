-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2014 at 07:32 AM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `administrators`
--

INSERT INTO `administrators` (`id`, `user_id`, `first_name`, `last_name`, `gender`, `email`, `contact_no`, `address`, `designation`, `username`, `password`, `profile_photo`, `bio`, `created`, `modified`) VALUES
(1, 4, 'Kasun', 'Kodagoda Vitharanage', '', 'kvkrusl@gmail.com', '0717673839', '153/c, Ihalayagoda, Gampaha.', 'Demonstrator', 'admin', '2d3b7f86848715061bb6c1d3d9781f73', '', 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. \r\n\r\nEt harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis.\r\n\r\n aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.', '2014-08-28 15:53:12', '2014-11-19 10:51:19'),
(2, 8, 'Oreliya', 'Fernando', 'Female', 'oreliya@gmail.com', '0717676868', 'Negombo', 'Demo', 'admin2', '2d3b7f86848715061bb6c1d3d9781f73', '', 'Good Girl', '2014-11-18 21:11:18', '2014-11-18 21:11:21');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `b_m_is`
--

INSERT INTO `b_m_is` (`id`, `family_member_id`, `date`, `value`, `created`, `modified`) VALUES
(1, 1, '2014-11-22', 27.5, '2014-11-22 21:49:01', '2014-11-22 21:49:06'),
(2, 1, '2014-11-29', 27.3, '2014-11-23 18:47:36', '2014-11-23 18:47:38'),
(3, 1, '2014-12-06', 27.2, '2014-11-23 18:48:31', '2014-11-23 18:48:35'),
(4, 1, '2014-12-13', 26.3, '2014-11-23 18:49:14', '2014-11-23 18:49:17'),
(5, 1, '2014-12-20', 25.1, '2014-11-23 18:51:39', '2014-11-23 18:51:46'),
(6, 1, '2014-12-27', 24.7, '2014-11-23 18:52:18', '2014-11-23 18:52:21'),
(7, 1, '2015-01-04', 22.1, '2014-11-23 18:52:49', '2014-11-23 18:52:52');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `family_members`
--

INSERT INTO `family_members` (`id`, `household_id`, `first_name`, `last_name`, `age`, `gender`, `occupation`, `profile_photo`, `decease`, `health_issue_id`, `sleeping_hour`, `exercise_hour`, `educational_level`, `bmi`, `whr`, `note`, `created`, `modified`) VALUES
(1, 1, 'John', 'Doe', 25, 'Male', 'Labor', '', 'Heart Attack', 1, 6, 1, 'Ordinary', 25.14, 0.92, 'Good Man', '2014-11-22 21:42:26', '2014-11-22 21:42:28'),
(2, 1, 'Saman', 'Kumara', 21, 'Male', 'Carpenter', NULL, 'High Blood Pressure', 2, 5, 1.5, 'Ordinary', 27.31, 0.81, 'Normal', '2014-11-23 10:01:13', '2014-11-23 10:05:31'),
(3, 2, 'Chamari', 'Perera', 19, 'Female', 'HouseWife', NULL, 'Diabets', 3, 4, 1, 'Ordinary', 23.24, 0.86, 'Normal', '2014-11-23 11:21:08', '2014-11-23 11:22:09');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `health_issues`
--

INSERT INTO `health_issues` (`id`, `issue_name`, `description`, `created`, `modified`) VALUES
(1, 'Smoking', 'Excessive smoking', '2014-11-22 21:46:35', '2014-11-22 21:46:37'),
(2, 'Destrupt Blood Vessels', 'Excessive Salt Consumption', '2014-11-23 10:22:33', '2014-11-23 10:22:49'),
(3, 'Faint', 'Excessive Sugar Consumption', '2014-11-23 10:27:00', '2014-11-23 10:29:10');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `households`
--

INSERT INTO `households` (`id`, `field_community_id`, `household_identifier`, `leader_name`, `address`, `contact_no`, `gps_latitude`, `gps_longitude`, `race`, `no_of_members`, `no_of_babies`, `no_of_pregnant_mothers`, `income`, `ranking`, `note`, `created`, `modified`) VALUES
(1, 1, 'H1', 'J.K. Karunadasa', 'Mihintale', '0712345678', 8.35576, 80.4988, 'Sinhala', 3, 1, 0, 50000, NULL, 'House', '2014-08-05 13:24:26', '2014-11-23 13:47:47'),
(2, 2, 'H2', 'K.B. Karunarathna', 'Mihintale ', '0712345678', 8.35574, 80.4991, 'Sinhala', 4, 1, 1, 5000, NULL, 'House', '2014-08-05 13:25:37', '2014-08-05 13:25:40'),
(3, 3, 'H3', 'D.B. Jayasumana', 'Mihintale', '0712345678', 8.35591, 80.4993, 'Sinhala', 2, 0, 0, 45000, NULL, 'House', '2014-08-05 13:26:47', '2014-08-05 13:26:50'),
(4, 2, 'H4', 'Sudu Banda', 'Mihintale', '0712345678', 8.3542, 80.498, 'Sinhala', 5, 1, 0, 48000, NULL, 'House', '2014-08-05 13:27:50', '2014-08-05 13:27:52'),
(5, 0, '', '', '', NULL, 0, 0, '', 0, 0, 0, 0, NULL, NULL, '2014-11-23 13:56:29', '2014-11-23 13:56:29'),
(6, 0, '', '', '', NULL, 0, 0, '', 0, 0, 0, 0, NULL, NULL, '2014-11-23 14:25:48', '2014-11-23 14:25:48');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `pregnant_mothers`
--

INSERT INTO `pregnant_mothers` (`id`, `household_id`, `family_member_id`, `note`, `fetus_age`, `no_of_children`, `weight`, `created`, `modified`) VALUES
(1, 2, 0, 'Good', 6, 1, 60, '2014-11-22 21:47:48', '2014-11-22 21:47:51');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `staffs`
--

INSERT INTO `staffs` (`id`, `user_id`, `first_name`, `last_name`, `gender`, `email`, `contact_no`, `address`, `designation`, `username`, `password`, `profile_photo`, `bio`, `approved`, `created`, `modified`) VALUES
(1, 5, 'Oreliya', 'Fernando', 'Female', 'oreliya@gmail.com', '0711234567', 'Negombo', 'Demo', 'staff_ore', '2d3b7f86848715061bb6c1d3d9781f73', NULL, 'Great', 0, '2014-08-28 15:54:59', '2014-08-28 15:55:03');

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
  `bio` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_students_field_groups` (`field_group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `user_id`, `field_group_id`, `index_no`, `reg_no`, `first_name`, `last_name`, `gender`, `email`, `contact_no`, `address`, `username`, `password`, `profile_photo`, `bio`, `created`, `modified`) VALUES
(1, 1, 2, 2465, 'ICT/09/10/024', 'Kasun', 'Kodagoda Vitharanage', 'Male', 'kvkrusl@gmail.com', '0717673839', '153/C, Ihalayagoda, Gampaha.', 'kasun', '5824247e92d2b71a5f971a2f43885fb7', '546dc71c-66d4-4382-9c5b-2574dc306535', 'Lorem ipsum dolor sit amet, his dolorum vituperata scribentur te. Postea consulatu nec at. Ne primis meliore lobortis eam, in sea viris sensibus adolescens. Et nec commune disputando, eos eu adipisci evertitur. Ea cibo persius splendide sit.\r\n\r\n\r\nVel munere adolescens an. No has etiam alienum suscipit, atqui harum eu per. Tale decore bonorum vel ea. Ex errem scaevola repudiandae eum, liber soluta vel te. Veritus verterem singulis sea ad.\r\n\r\nTe odio regione delicatissimi eum, ei has vide illum temporibus, nulla atomorum ius ut. Eos dignissim intellegebat ex. Causae feugiat expetendis no has, sea consequat similique definitionem ne, convenire comprehensam vis et. Modo singulis at quo, ius convenire ocurreret definitionem no.\r\n\r\n\r\nAn pri sententiae definitiones, ferri nostrud ut sed, sea tota movet referrentur in. Usu dolore dolorem dolores at, te sea ubique euismod convenire, an causae oblique qualisque nam. Nam no odio clita phaedrum. Ex est delenit vivendum, vocibus reprimique ne vim, tempor everti recusabo mel ad.', '2014-08-28 10:44:29', '2014-11-20 14:23:17'),
(2, 2, 2, 2452, 'ICT/09/10/009', 'Oreliya', 'Fernando', 'Female', 'ict10009@gmail.com', '0712345678', 'Periyamulla, Negombo', 'oreliya', '2d3b7f86848715061bb6c1d3d9781f73', '546dcd75-a6f4-42f5-a4b2-2574dc306535', 'Lorem ipsum dolor sit amet, his dolorum vituperata scribentur te. Postea consulatu nec at. Ne primis meliore lobortis eam, in sea viris sensibus adolescens. Et nec commune disputando, eos eu adipisci evertitur. Ea cibo persius splendide sit.\r\n\r\nVel munere adolescens an. No has etiam alienum suscipit, atqui harum eu per. Tale decore bonorum vel ea. Ex errem scaevola repudiandae eum, liber soluta vel te. Veritus verterem singulis sea ad.\r\n\r\nTe odio regione delicatissimi eum, ei has vide illum temporibus, nulla atomorum ius ut. Eos dignissim intellegebat ex. Causae feugiat expetendis no has, sea consequat similique definitionem ne, convenire comprehensam vis et. Modo singulis at quo, ius convenire ocurreret definitionem no.\r\n\r\nAn pri sententiae definitiones, ferri nostrud ut sed, sea tota movet referrentur in. Usu dolore dolorem dolores at, te sea ubique euismod convenire, an causae oblique qualisque nam. Nam no odio clita phaedrum. Ex est delenit vivendum, vocibus reprimique ne vim, tempor everti recusabo mel ad.', '2014-08-28 10:47:07', '2014-11-20 12:16:05'),
(3, 3, 2, 2458, 'ICT/09/10/022', 'Kaushal', 'Nihathamana', 'Male', 'kaushalnihathamana@gmail.com', '0712345678', 'Galle, South Province.', 'kaushal', '2d3b7f86848715061bb6c1d3d9781f73', '546dcdae-df10-4a9a-8a42-2574dc306535', 'Lorem ipsum dolor sit amet, his dolorum vituperata scribentur te. Postea consulatu nec at. Ne primis meliore lobortis eam, in sea viris sensibus adolescens. Et nec commune disputando, eos eu adipisci evertitur. Ea cibo persius splendide sit.\r\n\r\nVel munere adolescens an. No has etiam alienum suscipit, atqui harum eu per. Tale decore bonorum vel ea. Ex errem scaevola repudiandae eum, liber soluta vel te. Veritus verterem singulis sea ad.\r\n\r\nTe odio regione delicatissimi eum, ei has vide illum temporibus, nulla atomorum ius ut. Eos dignissim intellegebat ex. Causae feugiat expetendis no has, sea consequat similique definitionem ne, convenire comprehensam vis et. Modo singulis at quo, ius convenire ocurreret definitionem no.\r\n\r\nAn pri sententiae definitiones, ferri nostrud ut sed, sea tota movet referrentur in. Usu dolore dolorem dolores at, te sea ubique euismod convenire, an causae oblique qualisque nam. Nam no odio clita phaedrum. Ex est delenit vivendum, vocibus reprimique ne vim, tempor everti recusabo mel ad.', '2014-08-28 10:49:01', '2014-11-20 12:17:02'),
(4, 6, 2, 2458, 'ICT/09/10/048', 'Shifan', 'Mohamed', 'Male', 'imshifan@gmail.com', '0717673839', 'Kurunagala', 'shifan', '2d3b7f86848715061bb6c1d3d9781f73', '546dce01-0d64-4927-9114-2574dc306535', 'TestLorem ipsum dolor sit amet, his dolorum vituperata scribentur te. Postea consulatu nec at. Ne primis meliore lobortis eam, in sea viris sensibus adolescens. Et nec commune disputando, eos eu adipisci evertitur. Ea cibo persius splendide sit.\r\n\r\nVel munere adolescens an. No has etiam alienum suscipit, atqui harum eu per. Tale decore bonorum vel ea. Ex errem scaevola repudiandae eum, liber soluta vel te. Veritus verterem singulis sea ad.\r\n\r\nTe odio regione delicatissimi eum, ei has vide illum temporibus, nulla atomorum ius ut. Eos dignissim intellegebat ex. Causae feugiat expetendis no has, sea consequat similique definitionem ne, convenire comprehensam vis et. Modo singulis at quo, ius convenire ocurreret definitionem no.\r\n\r\nAn pri sententiae definitiones, ferri nostrud ut sed, sea tota movet referrentur in. Usu dolore dolorem dolores at, te sea ubique euismod convenire, an causae oblique qualisque nam. Nam no odio clita phaedrum. Ex est delenit vivendum, vocibus reprimique ne vim, tempor everti recusabo mel ad.', '2014-08-28 13:42:43', '2014-11-20 12:18:25'),
(5, 7, 2, 2569, 'ICT/09/10/042', 'Nadeesha', 'Thilakarathne', 'Female', 'nadeesha9090@gmail.com', '0717676869', 'Kurunagala', 'nadeesha', '2d3b7f86848715061bb6c1d3d9781f73', '546dce60-25f4-4d92-b135-2574dc306535', 'Lorem ipsum dolor sit amet, his dolorum vituperata scribentur te. Postea consulatu nec at. Ne primis meliore lobortis eam, in sea viris sensibus adolescens. Et nec commune disputando, eos eu adipisci evertitur. Ea cibo persius splendide sit.\r\n\r\nVel munere adolescens an. No has etiam alienum suscipit, atqui harum eu per. Tale decore bonorum vel ea. Ex errem scaevola repudiandae eum, liber soluta vel te. Veritus verterem singulis sea ad.\r\n\r\nTe odio regione delicatissimi eum, ei has vide illum temporibus, nulla atomorum ius ut. Eos dignissim intellegebat ex. Causae feugiat expetendis no has, sea consequat similique definitionem ne, convenire comprehensam vis et. Modo singulis at quo, ius convenire ocurreret definitionem no.\r\n\r\nAn pri sententiae definitiones, ferri nostrud ut sed, sea tota movet referrentur in. Usu dolore dolorem dolores at, te sea ubique euismod convenire, an causae oblique qualisque nam. Nam no odio clita phaedrum. Ex est delenit vivendum, vocibus reprimique ne vim, tempor everti recusabo mel ad.', '2014-11-18 07:40:16', '2014-11-20 12:20:00'),
(6, 11, 3, 2401, 'ICT/09/10/001', 'Gayan', 'Buddika', 'Male', 'kvkrusl@gmail.com', '0717683839', '190/F, Ihalayagoda, Gampaha.', 'gayan', '2d3b7f86848715061bb6c1d3d9781f73', '546dcec4-dd18-47f3-829b-2574dc306535', 'Lorem ipsum dolor sit amet, eu modo diceret quaerendum mea. Sea novum melius in. Eam probo movet viderer te. Iisque theophrastus no mei. Vel reque facilisis rationibus id, solum repudiandae vim no.\r\n\r\nLorem ipsum dolor sit amet, his dolorum vituperata scribentur te. Postea consulatu nec at. Ne primis meliore lobortis eam, in sea viris sensibus adolescens. Et nec commune disputando, eos eu adipisci evertitur. Ea cibo persius splendide sit.\r\n\r\nVel munere adolescens an. No has etiam alienum suscipit, atqui harum eu per. Tale decore bonorum vel ea. Ex errem scaevola repudiandae eum, liber soluta vel te. Veritus verterem singulis sea ad.\r\n\r\nTe odio regione delicatissimi eum, ei has vide illum temporibus, nulla atomorum ius ut. Eos dignissim intellegebat ex. Causae feugiat expetendis no has, sea consequat similique definitionem ne, convenire comprehensam vis et. Modo singulis at quo, ius convenire ocurreret definitionem no.\r\n\r\nAn pri sententiae definitiones, ferri nostrud ut sed, sea tota movet referrentur in. Usu dolore dolorem dolores at, te sea ubique euismod convenire, an causae oblique qualisque nam. Nam no odio clita phaedrum. Ex est delenit vivendum, vocibus reprimique ne vim, tempor everti recusabo mel ad.\r\n\r\nVim nobis dolores gloriatur at, vim minim nonumes eu, primis ancillae epicurei vix ea. Mea principes assentior theophrastus ad. Quot nemore malorum ad est, at harum senserit periculis mei, autem molestie detraxit vel ea. Ea has nonumes disputationi, an epicurei conclusionemque has. Eu modus impedit mea, sale habeo evertitur vim cu. Nusquam insolens hendrerit sea ea, molestie pericula cu mei.', '2014-11-19 17:45:23', '2014-11-20 12:46:11'),
(7, 12, 3, 2484, 'ICT/09/10/065', 'Manjula', 'Susil', 'Male', 'kvkrusl@gmail.com', '0717224585', 'Pahalayagoda, Gampaha.', 'manjula', '2d3b7f86848715061bb6c1d3d9781f73', '546dcf37-da08-40e1-b72f-2574dc306535', 'Lorem ipsum dolor sit amet, his dolorum vituperata scribentur te. Postea consulatu nec at. Ne primis meliore lobortis eam, in sea viris sensibus adolescens. Et nec commune disputando, eos eu adipisci evertitur. Ea cibo persius splendide sit.\r\n\r\nVel munere adolescens an. No has etiam alienum suscipit, atqui harum eu per. Tale decore bonorum vel ea. Ex errem scaevola repudiandae eum, liber soluta vel te. Veritus verterem singulis sea ad.\r\n\r\nTe odio regione delicatissimi eum, ei has vide illum temporibus, nulla atomorum ius ut. Eos dignissim intellegebat ex. Causae feugiat expetendis no has, sea consequat similique definitionem ne, convenire comprehensam vis et. Modo singulis at quo, ius convenire ocurreret definitionem no.\r\n\r\nAn pri sententiae definitiones, ferri nostrud ut sed, sea tota movet referrentur in. Usu dolore dolorem dolores at, te sea ubique euismod convenire, an causae oblique qualisque nam. Nam no odio clita phaedrum. Ex est delenit vivendum, vocibus reprimique ne vim, tempor everti recusabo mel ad.', '2014-11-20 12:23:35', '2014-11-20 12:45:31'),
(8, 13, 3, 2447, 'ICT/09/10/047', 'Sameera', 'Siyambalapitiya', 'Male', 'kvkrusl@gmail.com', '0717557874', 'Imbulgoda, Balummahara.', 'sameera', '2d3b7f86848715061bb6c1d3d9781f73', '546dd0e5-72fc-47c2-9e20-2574dc306535', 'Lorem ipsum dolor sit amet, his dolorum vituperata scribentur te. Postea consulatu nec at. Ne primis meliore lobortis eam, in sea viris sensibus adolescens. Et nec commune disputando, eos eu adipisci evertitur. Ea cibo persius splendide sit.\r\n\r\nVel munere adolescens an. No has etiam alienum suscipit, atqui harum eu per. Tale decore bonorum vel ea. Ex errem scaevola repudiandae eum, liber soluta vel te. Veritus verterem singulis sea ad.\r\n\r\nTe odio regione delicatissimi eum, ei has vide illum temporibus, nulla atomorum ius ut. Eos dignissim intellegebat ex. Causae feugiat expetendis no has, sea consequat similique definitionem ne, convenire comprehensam vis et. Modo singulis at quo, ius convenire ocurreret definitionem no.\r\n\r\nAn pri sententiae definitiones, ferri nostrud ut sed, sea tota movet referrentur in. Usu dolore dolorem dolores at, te sea ubique euismod convenire, an causae oblique qualisque nam. Nam no odio clita phaedrum. Ex est delenit vivendum, vocibus reprimique ne vim, tempor everti recusabo mel ad.', '2014-11-20 12:30:45', '2014-11-20 12:45:49');

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
  `approved` tinyint(1) DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `username`, `password`, `approved`, `created`, `modified`) VALUES
(1, 'Student', 'kasun', '2d3b7f86848715061bb6c1d3d9781f73', 1, '2014-08-28 10:44:29', '2014-08-28 10:44:29'),
(2, 'Student', 'oreliya', '2d3b7f86848715061bb6c1d3d9781f73', 0, '2014-08-28 10:47:07', '2014-08-28 10:47:07'),
(3, 'Student', 'kaushal', '2d3b7f86848715061bb6c1d3d9781f73', 1, '2014-08-28 10:49:01', '2014-08-28 10:49:01'),
(4, 'Admin', 'admin', '2d3b7f86848715061bb6c1d3d9781f73', 1, '2014-08-28 15:53:36', '2014-08-28 15:53:40'),
(5, 'Staff', 'staff_ore', '2d3b7f86848715061bb6c1d3d9781f73', 1, '2014-08-28 15:55:22', '2014-08-28 15:55:26'),
(6, 'Student', 'shifan', '2d3b7f86848715061bb6c1d3d9781f73', 1, '2014-08-28 13:42:43', '2014-08-28 13:42:43'),
(7, 'Student', 'nadeesha', '2d3b7f86848715061bb6c1d3d9781f73', 1, '2014-11-18 07:40:16', '2014-11-18 07:40:16'),
(8, 'Admin', 'admin2', '2d3b7f86848715061bb6c1d3d9781f73', 1, '2014-11-18 00:00:00', '2014-11-18 00:00:00'),
(11, 'Student', 'gayan', '2d3b7f86848715061bb6c1d3d9781f73', 0, '2014-11-19 17:45:23', '2014-11-19 17:45:23'),
(12, 'Student', 'manjula', '2d3b7f86848715061bb6c1d3d9781f73', 0, '2014-11-20 12:23:35', '2014-11-20 12:23:35'),
(13, 'Student', 'sameera', '2d3b7f86848715061bb6c1d3d9781f73', 0, '2014-11-20 12:30:45', '2014-11-20 12:30:45');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `w_h_rs`
--

INSERT INTO `w_h_rs` (`id`, `family_member_id`, `date`, `value`, `created`, `modified`) VALUES
(1, 1, '2014-11-22', 0.76, '2014-11-22 21:48:34', '2014-11-22 21:48:37'),
(2, 1, '2014-11-29', 0.80, '2014-11-22 22:45:40', '2014-11-22 22:55:42'),
(3, 1, '2014-12-06', 0.85, '2014-11-22 23:10:49', '2014-11-22 23:18:30'),
(4, 1, '2014-12-13', 0.86, '2014-11-23 08:40:14', '2014-11-23 08:50:38'),
(5, 1, '2014-12-20', 0.88, '2014-11-23 09:41:53', '2014-11-23 09:45:06'),
(6, 1, '2014-12-27', 0.84, '2014-11-23 10:43:52', '2014-11-23 10:50:34'),
(7, 1, '2014-01-04', 0.82, '2014-11-23 11:20:57', '2014-11-23 11:26:18');


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
