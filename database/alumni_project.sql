-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2018 at 03:22 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

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
(9, 'serri.jpg', NULL, 1),
(10, 'cat_lady.png', NULL, 2);

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

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`skillsID`, `skill`) VALUES
(133, 'JavaScript'),
(134, 'HTML'),
(135, 'PHP'),
(136, 'CSS'),
(137, 'Angular'),
(138, 'jQuery'),
(139, 'Symfony'),
(140, 'Ajax'),
(141, 'Wordpress'),
(142, 'mySQL'),
(143, 'Bootstrap');

-- --------------------------------------------------------

--
-- Table structure for table `stories`
--

CREATE TABLE `stories` (
  `storyID` int(11) NOT NULL,
  `fk_profileID` int(11) DEFAULT NULL,
  `story_content` text COLLATE utf8_unicode_ci,
  `story_teaser` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `stories`
--

INSERT INTO `stories` (`storyID`, `fk_profileID`, `story_content`, `story_teaser`) VALUES
(1, 9, 'Trainer at CodeFactory\r\n\r\nPerception about weekly projects and group projects: It is really interesting and challenging in the same time, and during the project week I learned a lot of things, how to work with the team, how to debug the code, how I can serve and problem.\r\n\r\nBiggest challenges: Symfony framework because it looks a bit complicated but I spent a lot of time to study it and now I like to use it to do my projects.\r\n\r\nJob search after the course: It was easy because the CodeFactory team asked me to be a trainer :P, just have confidence and take it seriously, and hard work makes the dream work.', '\"I studied computer engineering and I was a C++ and C# programming. I like to know how the webpage built and I was having a lot of questions about that, that\'s why I joined CodeFactory.\"'),
(2, 8, 'Trainer at CodeFactory\r\n\r\nPerception about weekly projects and group projects: I loved the group projects, it gave me the opportunity to work in bigger teams and to see how it would really be working in a team using technologies. I was very lucky because within all projects, my teams had a lot of fun and communicated well with each other, which in all made it successful. The weekly CodeReviews were a different experience to that, I enjoyed the challenge and being left fully alone to find solutions to the weekly task.\r\n\r\nBiggest challenges: I would say staying motivated around the halfway point when everybody was starting to feel tired because of the intensity of the course. This was a slight dipping point, but I\'d say we overcame it soon enough.\r\n\r\nJob search after the course: I started working for CodeFactory almost immediately, so I did not really begin with a job search.', '\"I worked as a tour guide and wanted to leave tourism and start a new career path. I was curious to learn new languages and technologies. Programming united both the creative and the logical, that made it very appealing.\" Decided to take a Full-Stack Course at CodeFactory because \"it was hands-on and intense, a format that really worked for me. CodeFactory offered a programme that fully fitted my needs.\"');

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
  `description` text COLLATE utf8_unicode_ci,
  `portfolio` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone_number` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fk_userID` int(11) DEFAULT NULL,
  `profile_picture` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `student_profile`
--

INSERT INTO `student_profile` (`profile_id`, `first_name`, `last_name`, `jobs_status`, `description`, `portfolio`, `phone_number`, `fk_userID`, `profile_picture`) VALUES
(8, 'Theodora', 'Patkos', 'employed', 'Theodora Patkos, geboren und aufgewachsen in Südafrika, ist Assistant Trainer bei Codefactory. Nach 10 jähriger Berufstätigkeit im Tourismus als Reiseleiterin und im Front Office von Hotels in Wien, hat sich Theodora entschieden, beruflich neue Wege zu ge', 'https://blablal.at', '02 2343234', 9, '\\assets\\img\\cat_lady.png'),
(9, 'Ghiath', 'Serri', 'employed', 'Geboren in Mai 1990. Nach erfolgreichem Abschluss von der Damascus Technische Institut der Computertechnik, hat Ghiath in Damascus, Syrien und in Wien als Computer Techniker gearbeitet. Ghiath wollte sein Wissen erweitern und hat sich für das Web Development entschieden und nahm an die Full Stack Web Development Ausbildung bei der CodeFactory teil. Zusätzlich hat Ghiath Erfahrung in C++ und C#. Er sieht das Programmieren wie ein Kunst, wo er sich ganz entfalten kann.', '###', '02 42343214', 10, 'assets\\img\\serri.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `student_skills`
--

CREATE TABLE `student_skills` (
  `fk_student_profileID` int(11) NOT NULL,
  `fk_skillsID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `student_skills`
--

INSERT INTO `student_skills` (`fk_student_profileID`, `fk_skillsID`) VALUES
(9, 142),
(10, 143);

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
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `user_role`) VALUES
(9, 'theopatkos', 'theodora.patkos@codefactory.wien ', '123456', 'student'),
(10, 'serri', 'serri@cf.live', '123456', 'student');

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
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
  MODIFY `skillsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT for table `stories`
--
ALTER TABLE `stories`
  MODIFY `storyID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student_profile`
--
ALTER TABLE `student_profile`
  MODIFY `profile_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
