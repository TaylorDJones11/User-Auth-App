-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jul 08, 2022 at 08:32 PM
-- Server version: 5.7.34
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `author_id` int(11) NOT NULL,
  `author_name` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `genre` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`author_id`, `author_name`, `age`, `genre`) VALUES
(3, 'Vikram Seth', '68', 'Poetry'),
(4, 'Abu\'l-Fazi ibn Mubarak', 'deceased', 'Biography'),
(5, 'Philip Zimbardo', '87', 'Psychology'),
(6, 'Jane Austen', 'deceased\r\n', 'Novel'),
(7, 'J.M. Coetzee', '81', 'Novel');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `book_id` int(11) NOT NULL,
  `bookname` varchar(255) NOT NULL,
  `author_id` int(11) NOT NULL,
  `year` int(4) DEFAULT NULL,
  `genre` varchar(75) DEFAULT NULL,
  `age_group` varchar(75) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `bookname`, `author_id`, `year`, `genre`, `age_group`) VALUES
(18, 'The Tale of Melon City ', 3, 1981, 'Poetry', '16-year-olds and above'),
(19, 'The Humble Administrator\'s Garden', 3, 1985, 'Poetry', '18-year-olds and above'),
(20, 'All You Who Sleep Tonight', 3, 1990, 'Poetry', '18-year-olds and above'),
(21, 'Akbarnama', 4, 2011, 'Biography ', '18-year-olds and above'),
(22, 'The Cognitive Control of Motivation', 5, 1969, 'Psychology', '18-year-olds and above'),
(23, 'Stanford prison experiment: A simulation study of the psychology of imprisonment', 5, 1972, 'Psychology', '18-year-olds and above'),
(24, 'Influencing Attitudes and Changing Behavior ', 5, 1969, 'Psychology', '18-year-olds and above'),
(25, 'Sense and Sensibility', 6, 1811, 'Novel ', '12-year-olds and above'),
(26, 'Pride and Prejudice', 6, 1813, 'Novel ', '14-year-olds and above'),
(27, 'Mansfield Park ', 6, 1814, 'Novel ', 'Adult Fiction '),
(28, 'Emma', 6, 1815, 'Novel ', 'Children Fiction'),
(29, 'Northanger Abbey', 6, 1818, 'Novel', 'Teenage Fiction'),
(30, 'Persuasion', 6, 1818, 'Novel ', 'Adult Fiction'),
(31, 'Lady Susan ', 6, 1871, 'Novel ', 'Adult Fiction'),
(32, 'The Childhood of Jesus', 7, 2013, 'Novel ', '12 to 15-year-olds '),
(33, 'The Schooldays of Jesus', 7, 2016, 'Novel ', '8 to 10-year-olds'),
(34, 'The Death of Jesus', 7, 2019, 'Novel ', '12 to 17-year-olds');

-- --------------------------------------------------------

--
-- Table structure for table `librarians_loginsystem`
--

CREATE TABLE `librarians_loginsystem` (
  `lib_id` int(11) NOT NULL,
  `lib_email` varchar(255) DEFAULT NULL,
  `lib_password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `librarians_loginsystem`
--

INSERT INTO `librarians_loginsystem` (`lib_id`, `lib_email`, `lib_password`) VALUES
(1, 'librarian1@lib.com', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `users_loginsystem`
--

CREATE TABLE `users_loginsystem` (
  `users_id` int(11) NOT NULL,
  `users_name` varchar(255) DEFAULT NULL,
  `users_password` longtext,
  `users_email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_loginsystem`
--

INSERT INTO `users_loginsystem` (`users_id`, `users_name`, `users_password`, `users_email`) VALUES
(1, 'test', '123456', 'test@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`author_id`),
  ADD UNIQUE KEY `author_name` (`author_name`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`),
  ADD UNIQUE KEY `book_name` (`bookname`),
  ADD KEY `author_id` (`author_id`);

--
-- Indexes for table `librarians_loginsystem`
--
ALTER TABLE `librarians_loginsystem`
  ADD PRIMARY KEY (`lib_id`);

--
-- Indexes for table `users_loginsystem`
--
ALTER TABLE `users_loginsystem`
  ADD PRIMARY KEY (`users_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `author_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `librarians_loginsystem`
--
ALTER TABLE `librarians_loginsystem`
  MODIFY `lib_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users_loginsystem`
--
ALTER TABLE `users_loginsystem`
  MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `authors` (`author_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
