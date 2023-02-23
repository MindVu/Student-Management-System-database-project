-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2023 at 02:01 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dtb_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `id` int(11) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `day` varchar(20) DEFAULT NULL,
  `id_teacher` int(11) DEFAULT NULL,
  `credit` int(11) DEFAULT NULL,
  `start_time` int(11) DEFAULT NULL,
  `end_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `name`, `day`, `id_teacher`, `credit`, `start_time`, `end_time`) VALUES
(1, 'Calculus', 'hai', 11, 3, 6, 8),
(2, 'Algebruh', 'tư', 10, 3, 8, 10),
(3, 'Physics', 'sáu', 10, 4, 10, 12),
(4, 'Chủ nghĩa Xã hội Khoa học', 'năm', 12, 3, 8, 9),
(5, 'Database', 'ba', 11, 3, 1, 3),
(7, 'Discrete Math', 'ba', 12, 2, 5, 8),
(8, 'Database lab', 'hai', 11, 2, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `id_old` int(11) DEFAULT NULL,
  `id_new` int(11) DEFAULT NULL,
  `id_class` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`id_old`, `id_new`, `id_class`) VALUES
(12, 11, 7);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `gender` char(1) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `gpa` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `gender`, `dob`, `phone`, `gpa`) VALUES
(1, 'Nam', 'M', '2003-12-01', '31688329', '2.75'),
(2, 'Quỳnh', 'F', '2003-07-01', '00094243', '2.00'),
(3, 'Hương', 'F', '2003-04-02', '36027899', '3.36'),
(4, 'Hùng', 'M', '2003-12-08', '46373763', '3.20'),
(5, 'Giang', 'F', '2003-02-04', '60248311', '1.83'),
(6, 'Yến', 'F', '2003-08-12', '20844687', '1.80'),
(7, 'Nguyệt', 'F', '2003-10-03', '90658030', '2.23'),
(8, 'Minh', 'M', '2003-04-12', '55592239', '3.84'),
(9, 'Thi', 'F', '2003-03-10', '24977376', '1.40'),
(10, 'Thanh', 'M', '2003-04-18', '70701013', '3.00'),
(11, 'Hảo', 'M', '2003-10-20', '65108775', '2.80'),
(12, 'Hường', 'M', '2003-06-01', '89784878', '4.00'),
(16, 'Vinh', 'M', '2004-02-18', '1088195', '4.00'),
(17, 'Phương', 'F', '2003-01-08', '50777225', '1.20'),
(18, 'Đình', 'M', '2004-02-05', '38861343', '1.94'),
(19, 'Quyền', 'M', '2002-08-11', '47276347', '1.60'),
(20, 'Quý ', 'M', '2002-11-25', '85659818', '2.80'),
(21, 'Ngọc', 'F', '2003-07-07', '97967385', '1.60'),
(22, 'Thảo', 'F', '2004-11-30', '83009641', '2.53'),
(23, 'Thuần', 'M', '2003-05-31', '83761157', '2.40'),
(24, 'Giang', 'F', '2003-09-18', '92568025', '2.56'),
(25, 'Bích', 'F', '2002-10-06', '76246365', '1.68'),
(26, 'Bình', 'M', '2004-01-08', '35250867', '3.49'),
(27, 'Hải', 'M', '2003-08-08', '5625582', NULL),
(28, 'Lan', 'F', '2002-07-27', '91378856', '2.80'),
(29, 'Đạt', 'M', '2003-12-01', '98652364', NULL),
(30, 'Hồng', 'F', '2002-09-24', '63352562', NULL),
(31, 'Hải', 'M', '2004-07-24', '73972779', NULL),
(32, 'Lionel Messi', 'M', '1987-05-16', '12132132', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student_class`
--

CREATE TABLE `student_class` (
  `id_student` int(11) DEFAULT NULL,
  `id_class` int(11) DEFAULT NULL,
  `mark` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_class`
--

INSERT INTO `student_class` (`id_student`, `id_class`, `mark`) VALUES
(19, 1, '5.00'),
(9, 1, '3.00'),
(20, 1, '5.00'),
(21, 1, '4.00'),
(10, 1, '5.00'),
(3, 1, '8.00'),
(24, 1, '4.00'),
(18, 1, '6.00'),
(9, 2, '4.00'),
(21, 2, '4.00'),
(8, 2, '10.00'),
(6, 2, '3.00'),
(5, 2, '4.00'),
(17, 2, '3.00'),
(25, 2, '5.00'),
(19, 2, '3.00'),
(11, 2, '6.00'),
(5, 3, '5.00'),
(10, 3, '9.00'),
(22, 3, '7.00'),
(26, 3, '10.00'),
(7, 3, '6.00'),
(18, 3, '4.00'),
(12, 3, '10.00'),
(4, 3, '8.00'),
(1, 4, '10.00'),
(10, 4, '8.00'),
(26, 4, '7.00'),
(28, 4, '7.00'),
(11, 4, '8.00'),
(7, 4, '5.00'),
(23, 4, '6.00'),
(6, 5, '6.00'),
(17, 5, '3.00'),
(1, 5, '3.00'),
(16, 5, '10.00'),
(22, 7, '5.00'),
(8, 7, '9.00'),
(20, 7, '10.00'),
(3, 7, '9.00'),
(25, 7, '3.00'),
(24, 7, '10.00'),
(1, 8, '8.00'),
(2, 8, '5.00'),
(3, 8, NULL),
(4, 8, NULL),
(6, 8, NULL),
(12, 8, NULL),
(11, 8, NULL);

--
-- Triggers `student_class`
--
DELIMITER $$
CREATE TRIGGER `trg_gpa` AFTER UPDATE ON `student_class` FOR EACH ROW UPDATE student
    SET gpa = ( 
				SELECT ROUND(sum(sc.mark*c.credit)/sum(c.credit)/10*4,2)
				FROM student s JOIN student_class sc ON s.id=sc.id_student
			 				   JOIN class c ON c.id=sc.id_class
        		WHERE s.id= old.id_student)
     WHERE id=old.id_student
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` int(6) NOT NULL,
  `name` varchar(20) NOT NULL,
  `pwd` varchar(70) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `name`, `pwd`) VALUES
(10, 'Nguyễn Đức Anh', '$2y$15$YxPAkRjG5dh5eZp//Tj/6uPzdt08jyR7Hw2B8v0c..ox67Zi.wwPy'),
(11, 'Vũ Đức Minh', '$2y$15$4N7C7x5aUjAUIO1gLyGAXOf.CPSQ9RaLeWjXzknq6oyo4cuN7kOEa'),
(12, 'Nguyễn Thành Đạt', '$2y$15$Ge376lB4JIKEcxjf1VO/HuVC3HckRcWNzHaCwDRLrnm0Ad5pFv6jy'),
(14, 'Lê Văn Luyện', '$2y$15$RJc7QqsJ.yjyWdIDPHLkLeBZOfnfSZXe37DumirmvtHc7biZe5klO');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_teacher` (`id_teacher`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id_class`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_class`
--
ALTER TABLE `student_class`
  ADD KEY `id_student` (`id_student`),
  ADD KEY `id_class` (`id_class`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `class`
--
ALTER TABLE `class`
  ADD CONSTRAINT `class_ibfk_1` FOREIGN KEY (`id_teacher`) REFERENCES `teacher` (`id`);

--
-- Constraints for table `student_class`
--
ALTER TABLE `student_class`
  ADD CONSTRAINT `student_class_ibfk_1` FOREIGN KEY (`id_student`) REFERENCES `student` (`id`),
  ADD CONSTRAINT `student_class_ibfk_2` FOREIGN KEY (`id_class`) REFERENCES `class` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
