-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 10, 2018 at 11:54 AM
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
-- Database: `alumni_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `badges`
--

CREATE TABLE `badges` (
  `badgeID` int(11) NOT NULL,
  `badge_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `badge_image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `commentID` int(11) NOT NULL,
  `comment` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sender` int(11) DEFAULT NULL,
  `receiver` int(11) DEFAULT NULL,
  `comment_subject` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `company_id` int(11) NOT NULL,
  `company_name` varchar(55) COLLATE utf8_unicode_ci DEFAULT NULL,
  `company_address` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fk_userID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `course_description` text COLLATE utf8_unicode_ci,
  `courseID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `enrollment_table`
--

CREATE TABLE `enrollment_table` (
  `fk_student_profileID` int(11) DEFAULT NULL,
  `fk_courseID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `eventID` int(11) NOT NULL,
  `event_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `cost` float DEFAULT NULL,
  `fk_locationID` int(11) DEFAULT NULL,
  `event_category` enum('meetup','party') COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `image_id` int(11) NOT NULL,
  `image_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fk_eventID` int(11) DEFAULT NULL,
  `fk_storiesID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`image_id`, `image_url`, `fk_eventID`, `fk_storiesID`) VALUES
(1, '/Applications/XAMPP/xamppfiles/htdocs/Final-Project/inc/img/safe_prefix_secure_infodada.jpg', NULL, NULL),
(2, '/Applications/XAMPP/xamppfiles/htdocs/Final-Project/inc/img/safe_prefix_secure_infodada.jpg', NULL, NULL),
(3, '/Applications/XAMPP/xamppfiles/htdocs/Final-Project/inc/img/safe_prefix_secure_infoex.jpg', NULL, NULL),
(4, '/Applications/XAMPP/xamppfiles/htdocs/Final-Project/inc/img/safe_prefix_secure_infodada.jpg', NULL, NULL),
(5, '/Applications/XAMPP/xamppfiles/htdocs/Final-Project/assets/img/safe_prefix_secure_infodada.jpg', NULL, NULL),
(6, '/Applications/XAMPP/xamppfiles/htdocs/Final-Project/assets/img/safe_prefix_secure_infoex.jpg', NULL, NULL),
(7, '/Applications/XAMPP/xamppfiles/htdocs/Final-Project/assets/img/safe_prefix_secure_infodada.jpg', NULL, NULL),
(8, '/Applications/XAMPP/xamppfiles/htdocs/Final-Project/assets/img/safe_prefix_secure_infodada.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `locationID` int(11) NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `projectID` int(11) NOT NULL,
  `project_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `project_description` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `skillsID` int(11) NOT NULL,
  `skill` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stories`
--

CREATE TABLE `stories` (
  `storyID` int(11) NOT NULL,
  `fk_profileID` int(11) DEFAULT NULL,
  `story_content` text COLLATE utf8_unicode_ci,
  `story_teaser` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `students_results`
--

CREATE TABLE `students_results` (
  `fk_student_profileID` int(11) NOT NULL,
  `fk_badgeID` int(11) DEFAULT NULL,
  `fk_projectID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_profile`
--

CREATE TABLE `student_profile` (
  `profile_id` int(11) NOT NULL,
  `first_name` varchar(55) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(55) COLLATE utf8_unicode_ci DEFAULT NULL,
  `jobs_status` enum('available','employed','','') COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `portfolio` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone_number` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fk_userID` int(11) DEFAULT NULL,
  `profile_picture` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_skills`
--

CREATE TABLE `student_skills` (
  `fk_student_profileID` int(11) NOT NULL,
  `fk_skillsID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(55) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_role` enum('student','company','admin','super_admin') COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `badges`
--
ALTER TABLE `badges`
  ADD PRIMARY KEY (`badgeID`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`commentID`),
  ADD KEY `sender` (`sender`),
  ADD KEY `receiver` (`receiver`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`company_id`),
  ADD KEY `fk_userID` (`fk_userID`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`courseID`);

--
-- Indexes for table `enrollment_table`
--
ALTER TABLE `enrollment_table`
  ADD KEY `fk_student_profileID` (`fk_student_profileID`),
  ADD KEY `fk_courseID` (`fk_courseID`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`eventID`),
  ADD KEY `fk_locationID` (`fk_locationID`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`image_id`),
  ADD KEY `fk_eventID` (`fk_eventID`),
  ADD KEY `fk_storiesID` (`fk_storiesID`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`locationID`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`projectID`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`skillsID`);

--
-- Indexes for table `stories`
--
ALTER TABLE `stories`
  ADD PRIMARY KEY (`storyID`),
  ADD KEY `fk_profileID` (`fk_profileID`);

--
-- Indexes for table `students_results`
--
ALTER TABLE `students_results`
  ADD KEY `fk_student_profileID` (`fk_student_profileID`),
  ADD KEY `fk_badgeID` (`fk_badgeID`),
  ADD KEY `fk_projectID` (`fk_projectID`);

--
-- Indexes for table `student_profile`
--
ALTER TABLE `student_profile`
  ADD PRIMARY KEY (`profile_id`),
  ADD KEY `student_profile_ibfk_1` (`fk_userID`);

--
-- Indexes for table `student_skills`
--
ALTER TABLE `student_skills`
  ADD KEY `fk_student_profileID` (`fk_student_profileID`),
  ADD KEY `fk_skillsID` (`fk_skillsID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `badges`
--
ALTER TABLE `badges`
  MODIFY `badgeID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `commentID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `courseID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `eventID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `locationID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `projectID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `skillsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `stories`
--
ALTER TABLE `stories`
  MODIFY `storyID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_profile`
--
ALTER TABLE `student_profile`
  MODIFY `profile_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`sender`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`receiver`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `companies`
--
ALTER TABLE `companies`
  ADD CONSTRAINT `companies_ibfk_1` FOREIGN KEY (`fk_userID`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `enrollment_table`
--
ALTER TABLE `enrollment_table`
  ADD CONSTRAINT `enrollment_table_ibfk_2` FOREIGN KEY (`fk_courseID`) REFERENCES `courses` (`courseID`);

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`fk_locationID`) REFERENCES `location` (`locationID`);

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_2` FOREIGN KEY (`fk_eventID`) REFERENCES `events` (`eventID`),
  ADD CONSTRAINT `images_ibfk_3` FOREIGN KEY (`fk_storiesID`) REFERENCES `stories` (`storyID`);

--
-- Constraints for table `stories`
--
ALTER TABLE `stories`
  ADD CONSTRAINT `stories_ibfk_1` FOREIGN KEY (`fk_profileID`) REFERENCES `student_profile` (`profile_id`);

--
-- Constraints for table `students_results`
--
ALTER TABLE `students_results`
  ADD CONSTRAINT `students_results_ibfk_1` FOREIGN KEY (`fk_student_profileID`) REFERENCES `student_profile` (`profile_id`),
  ADD CONSTRAINT `students_results_ibfk_2` FOREIGN KEY (`fk_badgeID`) REFERENCES `badges` (`badgeID`),
  ADD CONSTRAINT `students_results_ibfk_3` FOREIGN KEY (`fk_projectID`) REFERENCES `projects` (`projectID`);

--
-- Constraints for table `student_profile`
--
ALTER TABLE `student_profile`
  ADD CONSTRAINT `student_profile_ibfk_1` FOREIGN KEY (`fk_userID`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `student_skills`
--
ALTER TABLE `student_skills`
  ADD CONSTRAINT `student_skills_ibfk_1` FOREIGN KEY (`fk_student_profileID`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `student_skills_ibfk_2` FOREIGN KEY (`fk_skillsID`) REFERENCES `skills` (`skillsID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
