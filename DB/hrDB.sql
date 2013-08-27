-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 08, 2012 at 03:55 PM
-- Server version: 5.5.25a
-- PHP Version: 5.4.4

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `eedbangla`
--

-- --------------------------------------------------------

--
-- Table structure for table `areas`
--

DROP TABLE IF EXISTS `areas`;
CREATE TABLE IF NOT EXISTS `areas` (
  `id` smallint(4) NOT NULL AUTO_INCREMENT,
  `district_id` smallint(4) NOT NULL,
  `name` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `district_id` (`district_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=692 ;

-- --------------------------------------------------------

--
-- Table structure for table `business_types`
--

DROP TABLE IF EXISTS `business_types`;
CREATE TABLE IF NOT EXISTS `business_types` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `title` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=51 ;

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

DROP TABLE IF EXISTS `companies`;
CREATE TABLE IF NOT EXISTS `companies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(100) NOT NULL,
  `company_address` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `company_profiles`
--

DROP TABLE IF EXISTS `company_profiles`;
CREATE TABLE IF NOT EXISTS `company_profiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `company_name` varchar(150) NOT NULL,
  `logo` varchar(200) DEFAULT NULL,
  `alternative_company_name` varchar(150) DEFAULT NULL,
  `contact_person` varchar(100) NOT NULL,
  `contact_designation` varchar(50) NOT NULL,
  `business_type_id` int(11) NOT NULL,
  `business_description` text,
  `company_address_1` varchar(255) NOT NULL,
  `company_address_2` varchar(255) DEFAULT NULL,
  `country_id` smallint(6) NOT NULL,
  `district_id` smallint(6) DEFAULT NULL,
  `area_id` smallint(6) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `billing_address_1` varchar(255) NOT NULL,
  `billing_address_2` varchar(255) DEFAULT NULL,
  `contact_phone` varchar(100) NOT NULL,
  `contact_email` varchar(150) NOT NULL,
  `website` varchar(200) DEFAULT NULL,
  `accept` tinyint(1) NOT NULL,
  `remarks` varchar(200) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
CREATE TABLE IF NOT EXISTS `countries` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) NOT NULL,
  `code` varchar(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `currency_type`
--

DROP TABLE IF EXISTS `currency_type`;
CREATE TABLE IF NOT EXISTS `currency_type` (
  `code` int(11) NOT NULL DEFAULT '0',
  `currency_id` char(3) NOT NULL DEFAULT '',
  `name` varchar(70) NOT NULL,
  PRIMARY KEY (`currency_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

DROP TABLE IF EXISTS `departments`;
CREATE TABLE IF NOT EXISTS `departments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dept_code` varchar(100) NOT NULL,
  `dept_name` varchar(100) NOT NULL,
  `location` varchar(200) DEFAULT NULL,
  `project` varchar(100) DEFAULT NULL,
  `hod` varchar(100) DEFAULT NULL,
  `remarks` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

DROP TABLE IF EXISTS `designations`;
CREATE TABLE IF NOT EXISTS `designations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `designation` varchar(100) NOT NULL,
  `weight_value` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

DROP TABLE IF EXISTS `districts`;
CREATE TABLE IF NOT EXISTS `districts` (
  `id` smallint(4) NOT NULL AUTO_INCREMENT,
  `division_id` smallint(6) DEFAULT NULL,
  `name` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=65 ;

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

DROP TABLE IF EXISTS `divisions`;
CREATE TABLE IF NOT EXISTS `divisions` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Table structure for table `educational_qualifications`
--

DROP TABLE IF EXISTS `educational_qualifications`;
CREATE TABLE IF NOT EXISTS `educational_qualifications` (
  `educational_qualification_id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL,
  `name_of_degree` varchar(100) NOT NULL,
  `name_of_institution` varchar(100) NOT NULL,
  `board` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `year_of_passing` year(4) NOT NULL,
  `result` varchar(10) NOT NULL,
  PRIMARY KEY (`educational_qualification_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

DROP TABLE IF EXISTS `employees`;
CREATE TABLE IF NOT EXISTS `employees` (
  `employee_id` int(11) NOT NULL AUTO_INCREMENT,
  `comp_id` int(11) DEFAULT NULL,
  `emp_code` varchar(100) DEFAULT NULL,
  `emp_type` varchar(100) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `religion` varchar(100) DEFAULT NULL,
  `marital_status` varchar(50) DEFAULT NULL,
  `freedom_fighter` varchar(50) DEFAULT 'NULL',
  `national_ID` varchar(50) DEFAULT NULL,
  `tin` varchar(50) DEFAULT NULL,
  `present_posting_place` varchar(50) DEFAULT NULL,
  `dept_id` varchar(50) DEFAULT NULL,
  `designation_details` varchar(100) DEFAULT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `father_name` varchar(100) DEFAULT NULL,
  `mother_name` varchar(100) DEFAULT NULL,
  `designation_id` int(11) NOT NULL,
  `nationality` varchar(255) NOT NULL,
  `join_date` date DEFAULT NULL,
  `confirm_date` date DEFAULT NULL,
  `land_phone` varchar(50) DEFAULT NULL,
  `mobile` varchar(50) DEFAULT NULL,
  `fax` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `office_email` varchar(150) DEFAULT NULL,
  `pay_scale` varchar(50) DEFAULT NULL,
  `work_expereince` int(5) DEFAULT NULL,
  `basic_pay` double(15,2) DEFAULT NULL,
  `conveyance` double(15,2) DEFAULT NULL,
  `office_ext` varchar(50) DEFAULT NULL,
  `present_address` text,
  `parmanent_address` text,
  `date_of_birth` date DEFAULT NULL,
  `blood_group` char(5) DEFAULT NULL,
  `gender` enum('Male','Female') DEFAULT NULL,
  `current_employer` varchar(150) DEFAULT NULL,
  `key_skills` varchar(255) DEFAULT NULL,
  `bank_accnt_no` varchar(255) DEFAULT NULL,
  `bank_info` varchar(255) DEFAULT NULL,
  `amnt_to_bank` double(15,2) DEFAULT NULL,
  `discontinution_date` date DEFAULT NULL,
  `retirement_date` date DEFAULT NULL,
  `living_area` varchar(150) DEFAULT NULL,
  `prefecture` varchar(150) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  `present_post` varchar(50) DEFAULT NULL,
  `join_date_in_present_post` date DEFAULT NULL,
  `date_of_increament` date DEFAULT NULL,
  `status` enum('Pending','Published') DEFAULT 'Pending',
  `remarks` text,
  PRIMARY KEY (`employee_id`),
  UNIQUE KEY `id` (`employee_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

-- --------------------------------------------------------

--
-- Table structure for table `employee_advances`
--

DROP TABLE IF EXISTS `employee_advances`;
CREATE TABLE IF NOT EXISTS `employee_advances` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL,
  `dept_id` int(11) DEFAULT NULL,
  `advanced` double(11,2) DEFAULT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `employee_fines`
--

DROP TABLE IF EXISTS `employee_fines`;
CREATE TABLE IF NOT EXISTS `employee_fines` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `fines` double(11,2) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `experiences`
--

DROP TABLE IF EXISTS `experiences`;
CREATE TABLE IF NOT EXISTS `experiences` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL DEFAULT '',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_profile_id` int(11) NOT NULL,
  `category_id` smallint(6) NOT NULL,
  `company_name` varchar(150) DEFAULT NULL,
  `title` varchar(150) NOT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `education` enum('HS','A','BS','BA','BBA','JD','MS','MA','MD','MBA','MFA','B','M','PhD','OTH') DEFAULT NULL COMMENT 'High school,Associates (A),Bachelor of Science (BS),Bachelor of Arts (BA),Bachelor of Business Administration (BBA),Juris Doctorate (JD),Master of Science (MS),Master of Arts(MA),Medical Doctor (MD),Master of Business (MBA),Master of Fine Arts (MFA),Bache',
  `vacancies` smallint(3) DEFAULT NULL,
  `start_date` date NOT NULL,
  `application_deadline` date NOT NULL,
  `gender` enum('Any','Female Only','Male Only') DEFAULT NULL,
  `position_type` enum('Full Time','Part Time','Contract','Any') DEFAULT NULL,
  `level` varchar(50) DEFAULT NULL COMMENT 'internship level,  entry level, middle level, senior level, management level, director level, executive level',
  `hotjob` tinyint(1) DEFAULT '0',
  `rate_count` mediumint(9) DEFAULT '0' COMMENT 'Rate Count',
  `rate_total` mediumint(9) DEFAULT '0' COMMENT 'Sum of total rate',
  `tags` varchar(100) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `active` (`active`),
  KEY `company_profile_id` (`company_profile_id`),
  KEY `category_id` (`category_id`),
  KEY `application_deadline` (`application_deadline`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

-- --------------------------------------------------------

--
-- Table structure for table `job_category`
--

DROP TABLE IF EXISTS `job_category`;
CREATE TABLE IF NOT EXISTS `job_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

-- --------------------------------------------------------

--
-- Table structure for table `job_details`
--

DROP TABLE IF EXISTS `job_details`;
CREATE TABLE IF NOT EXISTS `job_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `job_id` int(11) NOT NULL,
  `instruction` text,
  `location` enum('ANY','IN','INT') NOT NULL COMMENT 'Anywhere, Within or Out side Bangladesh',
  `district` varchar(200) DEFAULT NULL COMMENT 'if location=2 then set division',
  `country` varchar(255) DEFAULT NULL COMMENT 'if location=3 then set division',
  `exp_min` smallint(2) DEFAULT NULL COMMENT 'Minimum Exp',
  `exp_max` smallint(2) DEFAULT NULL COMMENT 'Maximum Exp',
  `experience` varchar(255) DEFAULT NULL,
  `indus_experience` varchar(255) DEFAULT NULL,
  `min_age` smallint(6) DEFAULT NULL,
  `max_age` smallint(6) DEFAULT NULL,
  `salary` enum('NA','NM','RN') NOT NULL COMMENT 'Negotiable, Not mention, Range',
  `min_salary` decimal(10,0) DEFAULT NULL,
  `max_salary` decimal(10,0) DEFAULT NULL,
  `salary_type` enum('monthly','yearly','hourly') DEFAULT NULL,
  `application_format` varchar(100) DEFAULT NULL COMMENT 'Online CV, E-mail , Hard Copy',
  `application_email` varchar(100) DEFAULT NULL,
  `experience_details` text,
  `education_details` text NOT NULL,
  `responsibility` text NOT NULL,
  `add_requirements` text NOT NULL,
  `other_benefits` text,
  `meta_keyword` varchar(200) DEFAULT NULL,
  `meta_description` varchar(200) DEFAULT NULL,
  `impression` mediumint(9) DEFAULT NULL COMMENT 'Hit Count',
  `source_type` enum('SELF','NEWS') DEFAULT NULL COMMENT 'Company or News Paper',
  `job_source_name` varchar(100) DEFAULT NULL,
  `remark` varchar(100) DEFAULT NULL,
  `logo` varchar(200) DEFAULT NULL,
  `company_address_1` varchar(255) DEFAULT NULL,
  `company_address_2` varchar(255) DEFAULT NULL,
  `business_description` text,
  PRIMARY KEY (`id`),
  KEY `job_id` (`job_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

-- --------------------------------------------------------

--
-- Table structure for table `job_interview`
--

DROP TABLE IF EXISTS `job_interview`;
CREATE TABLE IF NOT EXISTS `job_interview` (
  `id` int(13) NOT NULL AUTO_INCREMENT,
  `candidate_vacancy_id` int(13) DEFAULT NULL,
  `candidate_id` int(13) DEFAULT NULL,
  `interview_name` varchar(100) NOT NULL,
  `interview_date` date DEFAULT NULL,
  `interview_time` time DEFAULT NULL,
  `note` text,
  PRIMARY KEY (`id`),
  KEY `candidate_vacancy_id` (`candidate_vacancy_id`),
  KEY `candidate_id` (`candidate_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `leaves`
--

DROP TABLE IF EXISTS `leaves`;
CREATE TABLE IF NOT EXISTS `leaves` (
  `leave_id` int(11) NOT NULL AUTO_INCREMENT,
  `leave_start` date NOT NULL,
  `leave_end` date NOT NULL,
  `leave_length_days` decimal(4,2) unsigned DEFAULT NULL,
  `employee_id` int(7) NOT NULL DEFAULT '0',
  `nature_of_leave` varchar(100) DEFAULT NULL,
  `grounds` varchar(50) DEFAULT NULL,
  `sanction_order_number` int(11) DEFAULT NULL,
  `sanction_order_date` date DEFAULT NULL,
  PRIMARY KEY (`leave_id`,`employee_id`),
  UNIQUE KEY `leave_id` (`leave_id`),
  KEY `leave_request_id` (`employee_id`),
  KEY `employee_id` (`employee_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Table structure for table `leave_periods`
--

DROP TABLE IF EXISTS `leave_periods`;
CREATE TABLE IF NOT EXISTS `leave_periods` (
  `leave_period_id` int(11) NOT NULL AUTO_INCREMENT,
  `leave_period_start_date` date NOT NULL,
  `leave_period_end_date` date NOT NULL,
  PRIMARY KEY (`leave_period_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `leave_requests`
--

DROP TABLE IF EXISTS `leave_requests`;
CREATE TABLE IF NOT EXISTS `leave_requests` (
  `leave_request_id` int(11) NOT NULL,
  `leave_type_id` varchar(13) NOT NULL,
  `leave_period_id` int(7) NOT NULL,
  `leave_type_name` char(50) DEFAULT NULL,
  `date_applied` date NOT NULL,
  `employee_id` int(7) NOT NULL,
  `leave_comments` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`leave_request_id`,`leave_type_id`,`employee_id`),
  KEY `employee_id` (`employee_id`),
  KEY `leave_type_id` (`leave_type_id`),
  KEY `leave_period_id` (`leave_period_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `leave_types`
--

DROP TABLE IF EXISTS `leave_types`;
CREATE TABLE IF NOT EXISTS `leave_types` (
  `leave_type_id` int(13) NOT NULL AUTO_INCREMENT,
  `leave_type_name` varchar(50) DEFAULT NULL,
  `available_flag` smallint(6) DEFAULT NULL,
  `leave_length_days` int(11) NOT NULL,
  PRIMARY KEY (`leave_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Table structure for table `loginlogouts`
--

DROP TABLE IF EXISTS `loginlogouts`;
CREATE TABLE IF NOT EXISTS `loginlogouts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `loginDate` date NOT NULL,
  `loginTime` time NOT NULL DEFAULT '00:00:00',
  `logoutTime` time DEFAULT '00:00:00',
  `duration` time DEFAULT '00:00:00',
  `remoteIP` varchar(20) NOT NULL,
  `status` int(5) NOT NULL,
  `workhour_status` int(5) NOT NULL,
  `UpdateBy` varchar(30) NOT NULL,
  `UpdateDate` datetime NOT NULL,
  `loginmessage` tinytext,
  `logoutmessage` tinytext NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=49 ;

-- --------------------------------------------------------

--
-- Table structure for table `nationality`
--

DROP TABLE IF EXISTS `nationality`;
CREATE TABLE IF NOT EXISTS `nationality` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=194 ;

-- --------------------------------------------------------

--
-- Table structure for table `pay_grade`
--

DROP TABLE IF EXISTS `pay_grade`;
CREATE TABLE IF NOT EXISTS `pay_grade` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) DEFAULT NULL,
  `currency_id` varchar(6) NOT NULL DEFAULT '',
  `existing_basic_pay` double(15,2) DEFAULT NULL,
  `basic_new_scale` double(15,2) DEFAULT NULL,
  PRIMARY KEY (`id`,`currency_id`),
  KEY `currency_id` (`currency_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

DROP TABLE IF EXISTS `projects`;
CREATE TABLE IF NOT EXISTS `projects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `p_code` varchar(100) DEFAULT NULL,
  `p_name` varchar(150) DEFAULT NULL,
  `p_address` varchar(200) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `completion` date DEFAULT NULL,
  `remarks` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Table structure for table `resumes`
--

DROP TABLE IF EXISTS `resumes`;
CREATE TABLE IF NOT EXISTS `resumes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cvdetails` text,
  `keyword` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `resume_title` varchar(255) DEFAULT NULL,
  `firstname` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `gender` enum('Female','Male') DEFAULT NULL,
  `date_birth` date DEFAULT NULL,
  `current_salary` decimal(10,0) DEFAULT NULL,
  `alternate_email` varchar(100) DEFAULT NULL,
  `address_1` varchar(255) DEFAULT NULL,
  `address_2` varchar(255) DEFAULT NULL,
  `country_id` smallint(6) DEFAULT NULL,
  `district_id` smallint(6) DEFAULT NULL,
  `area_id` smallint(6) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `nationality` smallint(6) DEFAULT NULL,
  `zip_code` varchar(10) DEFAULT NULL,
  `primary_phone` varchar(50) DEFAULT NULL,
  `secondary_phone` varchar(50) DEFAULT NULL,
  `experience_year` smallint(2) DEFAULT NULL,
  `experience_month` smallint(2) DEFAULT NULL,
  `preferred_category` varchar(20) DEFAULT NULL,
  `preferred_indus` varchar(20) DEFAULT NULL,
  `key_skills` varchar(100) DEFAULT NULL,
  `recent_employer` varchar(45) DEFAULT NULL,
  `recent_job_title` varchar(100) DEFAULT NULL,
  `education` enum('HS','A','BS','BBA','JD','MS','MA','MD','MBA','MFA','B','M','PhD','OTH') DEFAULT NULL COMMENT 'High school,Associates (A),Bachelor of Science (BS),Bachelor of Arts (BA),Bachelor of Business Administration (BBA),Juris Doctorate (JD),Master of Science (MS),Master of Arts(MA),Medical Doctor (MD),Master of Business (MBA),Master of Fine Arts (MFA),Bache',
  `institute` varchar(100) DEFAULT NULL,
  `year_passing` year(4) DEFAULT NULL,
  `current_employers` varchar(255) DEFAULT NULL,
  `previous_employers` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `init_pass` varchar(200) DEFAULT NULL,
  `resume_document` varchar(200) NOT NULL,
  `subs_newletter` tinyint(1) DEFAULT NULL,
  `subs_offer` tinyint(1) DEFAULT NULL,
  `update_status` enum('1','2','3') NOT NULL DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='CV' AUTO_INCREMENT=37 ;

-- --------------------------------------------------------

--
-- Table structure for table `salaries`
--

DROP TABLE IF EXISTS `salaries`;
CREATE TABLE IF NOT EXISTS `salaries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_no` int(11) NOT NULL,
  `project_code` varchar(100) NOT NULL,
  `emp_name` varchar(150) DEFAULT NULL,
  `start_month` date NOT NULL,
  `end_month` date NOT NULL,
  `work_days` double(15,2) DEFAULT NULL,
  `consolidated_sal` double(15,2) NOT NULL,
  `salary_payable` double(15,2) NOT NULL,
  `deduction` double(15,2) DEFAULT NULL,
  `allowance` double(15,2) DEFAULT NULL,
  `adjustment` double(15,2) DEFAULT NULL,
  `bonus` double(15,2) DEFAULT NULL,
  `net_payable` double(15,2) DEFAULT NULL,
  `bank` double(15,2) DEFAULT NULL,
  `cash` double(15,2) DEFAULT NULL,
  `remarks` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `service_histories`
--

DROP TABLE IF EXISTS `service_histories`;
CREATE TABLE IF NOT EXISTS `service_histories` (
  `service_history_id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL,
  `join_date` date NOT NULL,
  `name_of_post` varchar(50) NOT NULL,
  `name_of_cadre` varchar(50) NOT NULL,
  `date_of_promotion` date NOT NULL,
  `nature_of_appointment` varchar(50) NOT NULL,
  `scale_of_pay` varchar(50) NOT NULL,
  `monthly_pay_date` varchar(50) NOT NULL,
  `monthly_pay` double(15,2) NOT NULL,
  `other_monthly_pay` double(15,2) NOT NULL,
  `remarks` varchar(100) NOT NULL,
  PRIMARY KEY (`service_history_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `timesheets`
--

DROP TABLE IF EXISTS `timesheets`;
CREATE TABLE IF NOT EXISTS `timesheets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `loginDate` date NOT NULL,
  `loginTime` time NOT NULL DEFAULT '00:00:00',
  `logoutTime` time DEFAULT '00:00:00',
  `duration` time DEFAULT '00:00:00',
  `remoteIP` varchar(20) NOT NULL,
  `status` int(5) NOT NULL,
  `workhour_status` int(5) NOT NULL,
  `UpdateBy` varchar(30) NOT NULL,
  `UpdateDate` datetime NOT NULL,
  `loginmessage` tinytext,
  `logoutmessage` tinytext NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=52 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL,
  `firstname` varchar(32) DEFAULT NULL,
  `lastname` varchar(32) DEFAULT NULL,
  `email_address` varchar(96) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL,
  `active` tinyint(1) DEFAULT '1',
  `policy` char(1) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_email_address_zen` (`email_address`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;
SET FOREIGN_KEY_CHECKS=1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
