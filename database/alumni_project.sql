-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2018 at 06:42 PM
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
  `badge_image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `color` enum('gold','silver','bronze') COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `badges`
--

INSERT INTO `badges` (`badgeID`, `badge_name`, `badge_image`, `color`) VALUES
(1, 'Silver', '/Applications/XAMPP/xamppfiles/htdocs/Project_alumni_page/Final-Project/assets/img/safe_prefix_secure_info1st_badge_bronze.png', 'gold'),
(2, 'Bronze', '/Applications/XAMPP/xamppfiles/htdocs/Project_alumni_page/Final-Project/assets/img/safe_prefix_secure_info1st_badge_bronze.png', 'gold'),
(3, 'Gold', '/Applications/XAMPP/xamppfiles/htdocs/Project_alumni_page/Final-Project/assets/img/safe_prefix_secure_info2nd_badge_gold.png', 'gold');

-- --------------------------------------------------------

--
-- Table structure for table `career`
--

CREATE TABLE `career` (
  `career_id` int(11) NOT NULL,
  `career_title` varchar(255) NOT NULL,
  `career_teaser` text NOT NULL,
  `career_content` text NOT NULL,
  `career_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `career`
--

INSERT INTO `career` (`career_id`, `career_title`, `career_teaser`, `career_content`, `career_image`) VALUES
(2, 'dsadsadadwdq', 'dsdsdaFUCKJCUFJCKa', 'dsadsa', '#');

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

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_name`, `course_description`, `courseID`) VALUES
('Course1', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede ', 1),
('Course2', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede ', 2),
('Course3', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede ', 4);

-- --------------------------------------------------------

--
-- Table structure for table `enrollment_table`
--

CREATE TABLE `enrollment_table` (
  `fk_student_profileID` int(11) DEFAULT NULL,
  `fk_courseID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `enrollment_table`
--

INSERT INTO `enrollment_table` (`fk_student_profileID`, `fk_courseID`) VALUES
(11, 1),
(11, 2),
(11, 1),
(11, 2),
(9, 1),
(8, 2),
(8, 1);

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

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`eventID`, `event_name`, `start_date`, `cost`, `fk_locationID`, `event_category`) VALUES
(3, 'fuck this 21', '0000-00-00 00:00:00', 12431, 1, 'meetup'),
(4, 'fcdsfs', '2018-12-20 00:00:00', 12, 1, NULL);

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
(10, 'cat_lady.png', NULL, 2),
(11, '/Applications/XAMPP/xamppfiles/htdocs/Project_alumni_page/Final-Project/assets/img/safe_prefix_secure_info1st_badge_gold.png', 3, NULL);

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

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`locationID`, `address`, `city`, `country`) VALUES
(1, 'dsa', 'dsa', '');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `projectID` int(11) NOT NULL,
  `project_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `project_description` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`projectID`, `project_name`, `project_description`) VALUES
(1, 'Project1', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede '),
(2, 'Project2', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede ');

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
(143, 'Bootstrap'),
(144, 'djsdjhsdj');

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
(2, 8, 'Trainer at CodeFactory\r\n\r\nPerception about weekly projects and group projects: I loved the group projects, it gave me the opportunity to work in bigger teams and to see how it would really be working in a team using technologies. I was very lucky because within all projects, my teams had a lot of fun and communicated well with each other, which in all made it successful. The weekly CodeReviews were a different experience to that, I enjoyed the challenge and being left fully alone to find solutions to the weekly task.\r\n\r\nBiggest challenges: I would say staying motivated around the halfway point when everybody was starting to feel tired because of the intensity of the course. This was a slight dipping point, but I\'d say we overcame it soon enough.\r\n\r\nJob search after the course: I started working for CodeFactory almost immediately, so I did not really begin with a job search.', '\"I worked as a tour guide and wanted to leave tourism and start a new career path. I was curious to learn new languages and technologies. Programming united both the creative and the logical, that made it very appealing.\" Decided to take a Full-Stack Course at CodeFactory because \"it was hands-on and intense, a format that really worked for me. CodeFactory offered a programme that fully fitted my needs.\"'),
(3, NULL, 'dwqdwq', 'dwq');

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
(8, 'Theodora', 'Patkos', 'employed', 'Theodora Patkos, geboren und aufgewachsen in Südafrika, ist Assistant Trainer bei Codefactory. Nach 10 jähriger Berufstätigkeit im Tourismus als Reiseleiterin und im Front Office von Hotels in Wien, hat sich Theodora entschieden, beruflich neue Wege zu ge', 'https://blablal.at', '02 2343234', 9, 'assets\\img\\cat_lady.png'),
(9, 'Ghiath', 'Serri', 'employed', 'Geboren in Mai 1990. Nach erfolgreichem Abschluss von der Damascus Technische Institut der Computertechnik, hat Ghiath in Damascus, Syrien und in Wien als Computer Techniker gearbeitet. Ghiath wollte sein Wissen erweitern und hat sich für das Web Development entschieden und nahm an die Full Stack Web Development Ausbildung bei der CodeFactory teil. Zusätzlich hat Ghiath Erfahrung in C++ und C#. Er sieht das Programmieren wie ein Kunst, wo er sich ganz entfalten kann.', '###', '02 42343214', 10, 'assets\\img\\serri.jpg'),
(10, 'fsfsfsf', 'fsfsf', 'employed', 'fsfsfsf', 'sfsfsf', 'fsfsf', 14, NULL),
(11, 'Delia', 'Alina', 'available', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut ', 'www.fshfsh.com', '32786386', 11, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student_skills`
--

CREATE TABLE `student_skills` (
  `student_skills_id` int(11) NOT NULL,
  `fk_student_profileID` int(11) DEFAULT NULL,
  `fk_skillsID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `student_skills`
--

INSERT INTO `student_skills` (`student_skills_id`, `fk_student_profileID`, `fk_skillsID`) VALUES
(9, 11, 140),
(10, 9, 133),
(11, 9, 139),
(12, 8, 143),
(13, 8, 135),
(14, 8, 141),
(15, 11, 134);

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
(10, 'serri', 'serri@cf.live', '123456', 'student'),
(11, 'delia', 'delia@gmail.com', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', 'student'),
(12, 'roman', 'roman@gmail.com', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', 'company'),
(13, 'tina', 'tina@gmail.com', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', 'admin'),
(14, 'deczczc', 'dadad@jgkdafj.com', '6125249fa1e03a66186611ed6b3b0b359f467b612cefe92e0c3d4853b60a6a8c', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `badges`
--
ALTER TABLE `badges`
  ADD PRIMARY KEY (`badgeID`);

--
-- Indexes for table `career`
--
ALTER TABLE `career`
  ADD PRIMARY KEY (`career_id`);

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
  ADD PRIMARY KEY (`student_skills_id`),
  ADD KEY `fk_skillsID` (`fk_skillsID`),
  ADD KEY `fk_student_profileID` (`fk_student_profileID`);

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
  MODIFY `badgeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `career`
--
ALTER TABLE `career`
  MODIFY `career_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `courseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `eventID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `locationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `projectID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `skillsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- AUTO_INCREMENT for table `stories`
--
ALTER TABLE `stories`
  MODIFY `storyID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student_profile`
--
ALTER TABLE `student_profile`
  MODIFY `profile_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `student_skills`
--
ALTER TABLE `student_skills`
  MODIFY `student_skills_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`sender`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`receiver`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `companies`
--
ALTER TABLE `companies`
  ADD CONSTRAINT `companies_ibfk_1` FOREIGN KEY (`fk_userID`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `enrollment_table`
--
ALTER TABLE `enrollment_table`
  ADD CONSTRAINT `enrollment_table_ibfk_2` FOREIGN KEY (`fk_courseID`) REFERENCES `courses` (`courseID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `enrollment_table_ibfk_3` FOREIGN KEY (`fk_student_profileID`) REFERENCES `student_profile` (`profile_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`fk_locationID`) REFERENCES `location` (`locationID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_2` FOREIGN KEY (`fk_eventID`) REFERENCES `events` (`eventID`) ON DELETE CASCADE,
  ADD CONSTRAINT `images_ibfk_3` FOREIGN KEY (`fk_storiesID`) REFERENCES `stories` (`storyID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stories`
--
ALTER TABLE `stories`
  ADD CONSTRAINT `stories_ibfk_1` FOREIGN KEY (`fk_profileID`) REFERENCES `student_profile` (`profile_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `students_results`
--
ALTER TABLE `students_results`
  ADD CONSTRAINT `students_results_ibfk_1` FOREIGN KEY (`fk_student_profileID`) REFERENCES `student_profile` (`profile_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `students_results_ibfk_2` FOREIGN KEY (`fk_badgeID`) REFERENCES `badges` (`badgeID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `students_results_ibfk_3` FOREIGN KEY (`fk_projectID`) REFERENCES `projects` (`projectID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_profile`
--
ALTER TABLE `student_profile`
  ADD CONSTRAINT `student_profile_ibfk_1` FOREIGN KEY (`fk_userID`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_skills`
--
ALTER TABLE `student_skills`
  ADD CONSTRAINT `fk_student_profileID` FOREIGN KEY (`fk_student_profileID`) REFERENCES `student_profile` (`profile_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_skills_ibfk_2` FOREIGN KEY (`fk_skillsID`) REFERENCES `skills` (`skillsID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
