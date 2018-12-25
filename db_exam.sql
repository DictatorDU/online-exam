-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 31, 2018 at 11:34 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_exam`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `email`, `password`) VALUES
(1, 'admin@gmail.com', 'zxcvbnm');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ans`
--

CREATE TABLE `tbl_ans` (
  `ans_id` int(11) NOT NULL,
  `question_no` int(11) NOT NULL,
  `right_ans` int(11) NOT NULL DEFAULT '0',
  `option` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ans`
--

INSERT INTO `tbl_ans` (`ans_id`, `question_no`, `right_ans`, `option`) VALUES
(42, 1, 1, 'Al amin'),
(43, 1, 0, 'Jamal'),
(44, 1, 0, 'khalid'),
(45, 1, 0, 'Nepal'),
(46, 2, 0, 'HTML'),
(47, 2, 0, 'Javascript'),
(48, 2, 1, 'PHP'),
(49, 2, 0, 'Ajax'),
(50, 3, 0, '2'),
(51, 3, 1, '3'),
(52, 3, 0, '4'),
(53, 3, 0, '5'),
(54, 4, 0, 'CSS'),
(55, 4, 0, 'PHP'),
(56, 4, 0, 'Python'),
(57, 4, 1, 'Javascript'),
(58, 5, 0, 'Dream Weaver'),
(59, 5, 0, 'Sublime text'),
(60, 5, 0, 'Notpad++'),
(61, 5, 1, 'Atom');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_question`
--

CREATE TABLE `tbl_question` (
  `ques_id` int(11) NOT NULL,
  `question_no` int(11) NOT NULL,
  `question` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_question`
--

INSERT INTO `tbl_question` (`ques_id`, `question_no`, `question`) VALUES
(21, 1, 'What is your name?'),
(22, 2, 'What is server side scripting language??'),
(23, 3, 'How many kind of access modifier??'),
(24, 4, 'What is client side scripting language?'),
(25, 5, 'What is the best code editors??');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `name`, `email`, `password`, `status`) VALUES
(7, 'Abdullah Al amin', 'abdullah@gmail.com', 'zz', 0),
(8, 'Khalid bin Walid', 'khalid@gmail.com', 'zz', 0),
(9, 'Nahid', 'nahid@gmail.com', 'nahid', 0),
(12, 'Osman', 'osman@gmail.com', 'osman', 0),
(13, 'Imran', 'imran@gmail.com', 'imran', 0),
(14, 'Raihan', 'raihan@gmail.com', 'raihan', 0),
(16, 'Rakib', 'rakib@gmail.com', 'zz', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_ans`
--
ALTER TABLE `tbl_ans`
  ADD PRIMARY KEY (`ans_id`);

--
-- Indexes for table `tbl_question`
--
ALTER TABLE `tbl_question`
  ADD PRIMARY KEY (`ques_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_ans`
--
ALTER TABLE `tbl_ans`
  MODIFY `ans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `tbl_question`
--
ALTER TABLE `tbl_question`
  MODIFY `ques_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
