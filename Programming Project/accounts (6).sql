-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2017 at 03:34 AM
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
-- Database: `accounts`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `user_id` int(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `billAddress` varchar(100) NOT NULL,
  `ccNo` varchar(100) NOT NULL,
  `ccHolder` varchar(100) NOT NULL,
  `cvv` varchar(100) NOT NULL,
  `msgPlan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`user_id`, `email`, `billAddress`, `ccNo`, `ccHolder`, `cvv`, `msgPlan`) VALUES
(17, 's3538102@student.rmit.edu.au', '23/36 drummond street', '522c88530c38f56f72e6cda1871e04cf', 'Byung Yun', '202cb962ac59075b964b07152d234b70', 6),
(22, 'monicakim123@hotmail.com', '23/36 drummond street', '522c88530c38f56f72e6cda1871e04cf', 'Monica Kim', '202cb962ac59075b964b07152d234b70', 12);

-- --------------------------------------------------------

--
-- Table structure for table `favourites`
--

CREATE TABLE `favourites` (
  `user_id` int(200) NOT NULL,
  `movgenre` varchar(200) NOT NULL,
  `favmovie` varchar(200) NOT NULL,
  `musgenre` varchar(200) NOT NULL,
  `favsong` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `favourites`
--

INSERT INTO `favourites` (`user_id`, `movgenre`, `favmovie`, `musgenre`, `favsong`) VALUES
(16, 'fantasy', 'Lord of The Rings', 'indie', 'The Less I Know the Better'),
(17, 'fantasy', 'Harry Potter', 'rap', 'Congratulations'),
(18, 'romance', 'The Notebook', 'kpop', 'Blue'),
(19, 'comedy', '10 Things I Hate About You', 'regg', 'Is This Love?'),
(20, 'fantasy', 'Harry Potter', 'rap', 'Pony'),
(21, 'adventure', 'Indiana Jones', 'elect', 'Galantis '),
(22, 'thriller', 'IT', 'dance', 'D.A.N.C.E'),
(23, 'thriller', 'Shawshank Redemption ', 'rap', 'King Kunta'),
(24, 'adventure', 'Jumanji', 'elect', 'In the Shadows'),
(25, 'crime', 'The Girl with the Dragon Tattoo', 'kpop', 'Fantastic Baby');

-- --------------------------------------------------------

--
-- Table structure for table `hobby`
--

CREATE TABLE `hobby` (
  `user_id` int(200) NOT NULL,
  `ptype` varchar(100) NOT NULL,
  `personality` varchar(100) NOT NULL,
  `hobby1` varchar(100) NOT NULL,
  `hobby2` varchar(100) NOT NULL,
  `hobby3` varchar(100) NOT NULL,
  `hobby4` varchar(100) NOT NULL,
  `hobby5` varchar(100) NOT NULL,
  `travel` varchar(100) NOT NULL,
  `visit` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hobby`
--

INSERT INTO `hobby` (`user_id`, `ptype`, `personality`, `hobby1`, `hobby2`, `hobby3`, `hobby4`, `hobby5`, `travel`, `visit`) VALUES
(16, 'Introverted', 'Outgoing', 'Gym', 'Fitness', 'Games', 'Hunting', 'Basketball', 'yes', 'Canada'),
(17, 'Extroverted', 'Outgoing', 'Gym', 'Fitness', 'Music', 'Games', 'Rugby', 'yes', 'Jamaica'),
(18, 'Extroverted', 'Friendly', 'Gym', 'Fitness', 'Cooking', 'Cosplay', 'Yoga', 'yes', 'Cambodia'),
(19, 'Extroverted', 'Outgoing', 'Gym', 'Fitness', 'Sewing', 'Tennis', 'Yoga', 'yes', 'Japan'),
(20, 'Extroverted', 'Outgoing', 'Gym', 'Hiking', 'Cooking', 'Music', 'Yoga', 'yes', 'South Korea'),
(21, 'Extroverted', 'Outgoing', 'Gym', 'Fitness', 'MMA', 'Parkour', 'Games', 'yes', 'Japan'),
(22, 'Extroverted', 'Happy', 'Gym', 'Music', 'Iceskating', 'MMA', 'Yoga', 'yes', 'United Arab Emirates'),
(23, 'Introverted', 'Outgoing', 'Cooking', 'Gym', 'Dancing', 'Roleplaying', 'Games', 'yes', 'United Kingdom'),
(24, 'Extroverted', 'Outgoing', 'Gym', 'Games', 'Fitness', 'Singing', 'MMA', 'yes', 'Russia'),
(25, 'Extroverted', 'Outgoing', 'Basketball', 'Gym', 'Fitness', 'Gokart', 'MMA', 'yes', 'Bahamas');

-- --------------------------------------------------------

--
-- Table structure for table `ideal`
--

CREATE TABLE `ideal` (
  `user_id` int(200) NOT NULL,
  `idealgender` varchar(100) NOT NULL,
  `idealage` varchar(100) NOT NULL,
  `idealbtype` varchar(100) NOT NULL,
  `idealeducation` varchar(100) NOT NULL,
  `idealrace` varchar(100) NOT NULL,
  `idealdrink` varchar(100) NOT NULL,
  `idealsmoke` varchar(100) NOT NULL,
  `idealgamble` varchar(100) NOT NULL,
  `idealreligion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ideal`
--

INSERT INTO `ideal` (`user_id`, `idealgender`, `idealage`, `idealbtype`, `idealeducation`, `idealrace`, `idealdrink`, `idealsmoke`, `idealgamble`, `idealreligion`) VALUES
(16, 'female', 'young', 'Slim', 'Bachelor\'s Degree', 'Caucasian', 'Yes', 'No', 'No', 'Atheist'),
(17, 'female', 'middle', 'Average', 'Bachelor\'s Degree', 'Asian', 'No', 'No', 'No', 'Catholic'),
(18, 'male', 'young', 'Athletic', 'Bachelor\'s Degree', 'Asian', 'Yes', 'No', 'No', 'Christianity'),
(19, 'male', 'young', 'Average', 'Bachelor\'s Degree', 'Asian', 'Yes', 'Yes', 'No', 'Atheist'),
(20, 'male', 'young', 'Athletic', 'Bachelor\'s Degree', 'Caucasian', 'Yes', 'No', 'No', 'Atheist'),
(21, 'female', 'young', 'Athletic', 'Bachelor\'s Degree', 'Caucasian', 'Yes', 'No', 'No', 'Catholic'),
(22, 'male', 'young', 'Athletic', 'Bachelor\'s Degree', 'Caucasian', 'Yes', 'No', 'No', 'Buddhism'),
(23, 'male', 'young', 'Average', 'Bachelor\'s Degree', 'Asian', 'Yes', 'Yes', 'No', 'Atheist'),
(24, 'female', 'young', 'Slim', 'Bachelor\'s Degree', 'Asian', 'Yes', 'Yes', 'No', 'Catholic'),
(25, 'female', 'young', 'Athletic', 'Bachelor\'s Degree', 'Asian', 'Yes', 'No', 'No', 'Christianity');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `user_id` int(11) NOT NULL,
  `image` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`user_id`, `image`) VALUES
(0, '../img/default.png'),
(16, '../img/default.png'),
(17, '10537118_676562865758334_7746590882145878239_n.jpg'),
(18, '../img/default.png'),
(19, '../img/default.png'),
(20, '../img/default.png'),
(21, '../img/default.png'),
(22, '../img/default.png'),
(23, '../img/default.png'),
(24, '../img/default.png'),
(25, '../img/default.png'),
(26, '../img/default.png');

-- --------------------------------------------------------

--
-- Table structure for table `information`
--

CREATE TABLE `information` (
  `user_id` int(100) NOT NULL,
  `height` int(100) NOT NULL,
  `jobs` varchar(100) NOT NULL,
  `body` varchar(100) NOT NULL,
  `education` varchar(100) NOT NULL,
  `ethnic` varchar(100) NOT NULL,
  `drink` varchar(100) NOT NULL,
  `smoke` varchar(100) NOT NULL,
  `gamble` varchar(100) NOT NULL,
  `religion` varchar(100) NOT NULL,
  `aboutme` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `information`
--

INSERT INTO `information` (`user_id`, `height`, `jobs`, `body`, `education`, `ethnic`, `drink`, `smoke`, `gamble`, `religion`, `aboutme`) VALUES
(16, 175, 'Consultant', 'Average', 'Bachelor\'s Degree', 'Asian', 'Yes', 'Yes', 'No', 'Atheist', NULL),
(17, 180, 'Accountant', 'Average', 'Certificate Diploma', 'Caucasian', 'No', 'Yes', 'No', 'Agnostic', 'testing testing arnold about me'),
(18, 160, 'Bartender', 'Slim', 'Bachelor\'s Degree', 'Asian', 'Yes', 'Yes', 'Yes', 'Christianity', NULL),
(19, 160, 'Architect', 'Slim', 'Bachelor\'s Degree', 'Asian', 'Yes', 'Yes', 'No', 'Catholic', NULL),
(20, 175, 'Event Planner', 'Athletic', 'Bachelor\'s Degree', 'Caucasian', 'Yes', 'No', 'No', 'Atheist', NULL),
(21, 185, 'Computer Programmer', 'Athletic', 'Bachelor\'s Degree', 'Caucasian', 'Yes', 'No', 'No', 'Catholic', NULL),
(22, 165, 'Business Analyst', 'Athletic', 'Bachelor\'s Degree', 'Asian', 'Yes', 'Yes', 'No', 'Buddhism', 'Im chaning my description to this one'),
(23, 170, 'Secretary', 'Slim', 'Bachelor\'s Degree', 'Caucasian', 'Yes', 'Yes', 'No', 'Atheist', NULL),
(24, 177, 'Graphic Designer', 'Athletic', 'Bachelor\'s Degree', 'Caucasian', 'Yes', 'Yes', 'No', 'Catholic', NULL),
(25, 187, 'Accountant', 'Athletic', 'Bachelor\'s Degree', 'Caucasian', 'Yes', 'No', 'No', 'Christianity', NULL),
(26, 180, 'Advertising Sales Agent', 'Athletic', 'Certificate Diploma', 'African', 'No', 'No', 'Yes', 'Atheist', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `user_id` int(200) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `doby` int(100) NOT NULL,
  `dobm` int(100) NOT NULL,
  `dobd` int(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `msglimit` int(100) NOT NULL,
  `msgQty` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`user_id`, `gender`, `fname`, `lname`, `username`, `email`, `password`, `doby`, `dobm`, `dobd`, `state`, `city`, `msglimit`, `msgQty`) VALUES
(16, 'Male', 'Patrick', 'Tran', 'patricktran93', 's3383247@student.rmit.edu.au', '827ccb0eea8a706c4c34a16891f84e7b', 1993, 10, 1, 'vic', 'melbourne', 0, 3),
(17, 'Male', 'Arnold', 'Yun', 's3538102', 's3538102@student.rmit.edu.au', '827ccb0eea8a706c4c34a16891f84e7b', 1996, 9, 16, 'vic', 'melbourne', 1, NULL),
(18, 'Female', 'Sumie', 'Sagane', 'sumiesagane96', 'sumiesagane123@hotmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 1996, 1, 1, 'qld', 'brisbane', 0, 0),
(19, 'Female', 'Kelly', 'Ly', 'kelly96', 'kelly96@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 1996, 1, 14, 'vic', 'melbourne', 0, 3),
(20, 'Female', 'Katherine', 'Peterensis', 'kathpet94', 'kathpet94@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 1994, 2, 10, 'vic', 'melbourne', 0, 3),
(21, 'Male', 'Edi', 'Bilcevic', 'edibil', 's3544688@student.rmit.edu.au', '827ccb0eea8a706c4c34a16891f84e7b', 1996, 5, 15, 'vic', 'melbourne', 0, 3),
(22, 'Female', 'Monica', 'Kim', 'monicakim96', 'monicakim96@hotmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 1996, 9, 15, 'qld', 'gold coast', 1, NULL),
(23, 'Female', 'Ashley', 'Maddison', 'ashleymad93', 'ashleymaddison93@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 1993, 6, 14, 'vic', 'melbourne', 0, 3),
(24, 'Male', 'Nick', 'Mason', 'nickmason96', 'nickmason96@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 1996, 5, 10, 'vic', 'melbourne', 0, 3),
(25, 'Male', 'Brendon', 'Devine', 'brendondevine96', 'brendondevine96@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 1996, 8, 15, 'vic', 'melbourne', 0, 3);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `user_id` int(200) NOT NULL,
  `friend_id` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `time` time NOT NULL,
  `status` int(100) NOT NULL,
  `id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `user_id` int(100) NOT NULL,
  `partner_id` int(100) NOT NULL,
  `score` int(100) NOT NULL,
  `similarint` int(100) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`user_id`, `partner_id`, `score`, `similarint`, `id`) VALUES
(19, 16, 97, 2, 2617),
(19, 17, 62, 2, 2618),
(20, 16, 56, 1, 2619),
(20, 17, 62, 2, 2620),
(21, 18, 37, 2, 2621),
(21, 19, 57, 2, 2622),
(21, 20, 86, 1, 2623),
(23, 16, 97, 2, 2627),
(23, 17, 62, 2, 2628),
(23, 21, 47, 2, 2629),
(24, 18, 77, 2, 2630),
(24, 19, 97, 2, 2631),
(24, 20, 46, 1, 2632),
(24, 22, 67, 2, 2633),
(24, 23, 67, 2, 2634),
(25, 18, 67, 2, 2635),
(25, 19, 67, 2, 2636),
(25, 20, 66, 1, 2637),
(25, 22, 77, 2, 2638),
(25, 23, 46, 1, 2639),
(22, 16, 41, 1, 2780),
(22, 17, 42, 2, 2781),
(22, 21, 82, 2, 2782),
(22, 24, 77, 2, 2783),
(22, 25, 82, 2, 2784),
(16, 18, 52, 2, 2785),
(16, 19, 62, 2, 2786),
(16, 20, 81, 1, 2787),
(16, 22, 41, 1, 2788),
(16, 23, 92, 2, 2789),
(18, 16, 62, 2, 2885),
(18, 17, 22, 2, 2886),
(18, 21, 62, 2, 2887),
(18, 24, 57, 2, 2888),
(18, 25, 72, 2, 2889),
(17, 18, 42, 2, 2990),
(17, 19, 62, 2, 2991),
(17, 20, 37, 2, 2992),
(17, 22, 47, 2, 2993),
(17, 23, 32, 2, 2994);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `favourites`
--
ALTER TABLE `favourites`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `hobby`
--
ALTER TABLE `hobby`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `ideal`
--
ALTER TABLE `ideal`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `information`
--
ALTER TABLE `information`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `user_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2995;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
