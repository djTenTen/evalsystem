-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2023 at 03:48 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eval`
--

-- --------------------------------------------------------

--
-- Table structure for table `assign_section`
--

CREATE TABLE `assign_section` (
  `AssignID` int(11) NOT NULL,
  `teacherID` varchar(20) DEFAULT NULL,
  `SectionID` varchar(20) DEFAULT NULL,
  `SY` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `CourseID` int(11) NOT NULL,
  `CourseCode` varchar(30) DEFAULT NULL,
  `CourseDesc` varchar(100) DEFAULT NULL,
  `CollegeDPT` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`CourseID`, `CourseCode`, `CourseDesc`, `CollegeDPT`) VALUES
(1, 'BSCPE', 'BACHELOR OF SCIENCE IN COMPUTER ENGINEERING', 'SCLS'),
(2, 'BSIT', 'BACHELOR OF SCIENCE IN INFORMATION TECHNOLOGY', 'SCLS'),
(3, 'BSCE', 'BACHELOR OF SCIENCE IN CIVIL ENGINEERING', 'SCLS'),
(4, 'BEED', 'BACHELOR IN ELEMENTARY EDUCATION', 'CASED'),
(5, 'BSCS', 'BACHELOR OF SCIENCE IN COMPUTER SCIENCE', 'SCLS'),
(6, 'BSCRIM', 'BACHELOR OF SCIENCE IN CRIMINOLOGY', 'SCJ'),
(7, 'BSA', 'BACHELOR OF SCIENCE IN ACCOUNTANCY', 'CBAH'),
(8, 'BSBA-FM', 'BACHELOR OF SCIENCE IN BUSINESS ADMINISTRATION MAJOR IN FINANCIAL MANAGEMENT', 'CBAH'),
(10, 'BSBA-MM', 'BACHELOR OF SCIENCE IN BUSINESS ADMINISTRATION MAJOR IN MARKETING MANAGEMENT', 'CBAH'),
(11, 'BS-DEVCOM', 'BACHELOR OF SCIENCE IN  DEVELOPMENT COMMUNICATION', 'CASED'),
(12, 'BSED-FILIPINO', 'BACHELOR OF SECONDARY EDUCATION MAJOR IN FILIPINO', 'CASED'),
(13, 'BSED-MATH', 'BACHELOR OF SECONDARY EDUCATION MAJOR IN MATHEMATICS', 'CASED'),
(14, 'BSED-SCIENCE', 'BACHELOR OF SECONDARY EDUCATION MAJOR IN SCIENCE', 'CASED'),
(15, 'BSED-ENGLISH', 'BACHELOR OF SECONDARY EDUCATION MAJOR IN ENGLISH', 'CASED'),
(16, 'BSHM', 'BACHELOR OF SCIENCE IN HOSPITALITY MANAGEMENT', 'CBAH'),
(17, 'ACT', 'ASSOCIATE COMPUTER TECHNOLOGY', 'SCLS'),
(18, 'BLIS', 'BACHELOR OF SCIENCE IN LIBRARY AND INFORMATION SCIENCE', 'SCLS'),
(19, 'BSPSYCH', 'BACHELOR OF SCIENCE IN PSYCHOLOGY', 'CASED'),
(20, 'METHODS', 'TEACHING METHODS', 'CASED'),
(21, 'CITS', 'CERTIFICATE IN TEACHING SCIENCE', 'CASED'),
(22, 'CITM', 'CERTIFICATE IN TEACHING MATHEMATICS', 'CASED'),
(23, 'CITE', 'CERTIFICATE IN TEACHING ENGLISH', 'CASED'),
(24, 'CITF', 'CERTIFICATE IN TEACHING FILIPINO', 'CASED'),
(25, 'LPT', 'LICENSURE EXAMINATION FOR TEACHERS', 'CASED');

-- --------------------------------------------------------

--
-- Table structure for table `evaluations`
--

CREATE TABLE `evaluations` (
  `resultID` int(11) NOT NULL,
  `QuestionID` varchar(20) DEFAULT NULL,
  `Teacher` varchar(20) DEFAULT NULL,
  `Section` varchar(50) NOT NULL DEFAULT 'none',
  `Department` varchar(20) DEFAULT NULL,
  `Set` varchar(100) DEFAULT NULL,
  `sdisagree` varchar(20) NOT NULL DEFAULT '0',
  `disagree` varchar(20) NOT NULL DEFAULT '0',
  `agree` varchar(20) NOT NULL DEFAULT '0',
  `sagree` varchar(20) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `evaluation_transaction`
--

CREATE TABLE `evaluation_transaction` (
  `evalID` int(11) NOT NULL,
  `evaluator` varchar(20) DEFAULT NULL,
  `section` varchar(20) DEFAULT NULL,
  `teacher` varchar(20) DEFAULT NULL,
  `pos` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `QuestionID` int(11) NOT NULL,
  `QuestionName` varchar(100) DEFAULT NULL,
  `Question` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `SectionID` int(11) NOT NULL,
  `Year` varchar(30) DEFAULT NULL,
  `Section` varchar(30) DEFAULT NULL,
  `strand` varchar(20) NOT NULL DEFAULT 'none',
  `Department` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`SectionID`, `Year`, `Section`, `strand`, `Department`) VALUES
(1, '1', 'A', 'none', 'College'),
(2, '1', 'B', 'none', 'College'),
(3, '1', 'C', 'none', 'College'),
(4, '1', 'D', 'none', 'College'),
(5, '2', 'A', 'none', 'College'),
(6, '2', 'B', 'none', 'College'),
(7, '2', 'C', 'none', 'College'),
(8, '2', 'D', 'none', 'College'),
(9, '3', 'A', 'none', 'College'),
(10, '3', 'B', 'none', 'College'),
(11, '3', 'C', 'none', 'College'),
(12, '3', 'D', 'none', 'College'),
(13, '4', 'A', 'none', 'College'),
(14, '4', 'B', 'none', 'College'),
(15, '4', 'C', 'none', 'College'),
(16, '4', 'D', 'none', 'College'),
(17, '5', 'A', 'none', 'College'),
(18, '5', 'B', 'none', 'College'),
(19, '5', 'C', 'none', 'College'),
(20, '5', 'D', 'none', 'College'),
(24, '11', 'ST. ANTHONY MARY CLARET', 'ABM', 'Seniorhigh'),
(25, '11', 'ST. JOSAPHAT', 'ABM', 'Seniorhigh'),
(26, '11', 'ST. LUCY OF SYRACUSE', 'ABM', 'Seniorhigh'),
(27, '11', 'ST. MARGARET CLITHEROW', 'ABM', 'Seniorhigh'),
(28, '11', 'ST. CECILIA', 'HUMSS', 'Seniorhigh'),
(29, '11', 'ST. GENESIUS OF ARLES', 'HUMSS', 'Seniorhighssss'),
(30, '11', 'ST. GREGORY THE GREAT', 'HUMSS', 'Seniorhigh'),
(31, '11', 'ST. IRENEUS', 'HUMSS', 'Seniorhigh'),
(32, '11', 'ST. PEDRO CALUNGSOD', 'HUMSS', 'Seniorhigh'),
(33, '11', 'ST. SOPHIA', 'HUMSS', 'Seniorhigh'),
(34, '11', 'ST. THOMAS AQUINAS', 'HUMSS', 'Seniorhigh'),
(35, '11', 'ST. YVES', 'HUMSS', 'Seniorhigh'),
(36, '11', 'ST. ALBERT THE GREAT', 'STEM', 'Seniorhigh'),
(37, '11', 'ST. BENEDICT', 'STEM', 'Seniorhigh'),
(38, '11', 'ST. CAMILLUS DE LELLIS', 'STEM', 'Seniorhigh'),
(39, '11', 'ST. FERDINAND', 'STEM', 'Seniorhigh'),
(40, '11', 'ST. LUKE', 'STEM', 'Seniorhigh'),
(41, '11', 'ST. PATRICK', 'STEM', 'Seniorhigh'),
(42, '11', 'ST. VINCENT DE PAUL', 'STEM', 'Seniorhigh'),
(43, '11', 'ST. VERONICA', 'TVL-HE', 'Seniorhigh'),
(44, '11', 'ST. EPHREM', 'TVL-ICT', 'Seniorhigh'),
(45, '11', 'ST. ISIDORE OF SEVILLE', 'TVL-ICT', 'Seniorhigh'),
(46, '12', 'ST. JOHN BOSCO', 'ABM', 'Seniorhigh'),
(47, '12', 'ST. LAWRENCE', 'ABM', 'Seniorhigh'),
(48, '12', 'ST. LOUIS IX', 'ABM', 'Seniorhigh'),
(49, '12', 'ST. MAXIMILIAN KOLBE', 'ABM', 'Seniorhigh'),
(50, '12', 'ST. ANSELM', 'HUMSS', 'Seniorhigh'),
(51, '12', 'ST. CHRISTOPHER', 'HUMSS', 'Seniorhigh'),
(52, '12', 'ST. HILARY', 'HUMSS', 'Seniorhigh'),
(53, '12', 'ST. LORENZO RUIZ', 'HUMSS', 'Seniorhigh'),
(54, '12', 'ST. BLAISE', 'STEM', 'Seniorhigh'),
(55, '12', 'ST. FOILAN OF FOSSES', 'STEM', 'Seniorhigh'),
(56, '12', 'ST. AGATHA OF SICILY', 'STEM', 'Seniorhigh'),
(57, '12', 'ST. MARTHA', 'TVL-HE', 'Seniorhigh'),
(58, '12', 'ST. CLAIRE OF ASISI', 'TVL-ICT', 'Seniorhigh'),
(59, '12', 'ST. JEROME', 'TVL-ICT', 'Seniorhigh'),
(60, '7', 'JEREMIAH', 'none', 'Juniorhigh'),
(61, '7', 'JONAH', 'none', 'Juniorhigh'),
(62, '7', 'MALACHI', 'none', 'Juniorhigh'),
(63, '7', 'ZECHARIAH', 'none', 'Juniorhigh'),
(64, '7', 'EZEKIEL', 'none', 'Juniorhigh'),
(65, '8', 'ABRAHAM', 'none', 'Juniorhigh'),
(66, '8', 'DAVID', 'none', 'Juniorhigh'),
(67, '8', 'ISAIAH', 'none', 'Juniorhigh'),
(68, '8', 'JOSHUA', 'none', 'Juniorhigh'),
(69, '8', 'MOSES', 'none', 'Juniorhigh'),
(70, '9', 'COLOSSIANS', 'none', 'Juniorhigh'),
(71, '9', 'CORINTHIANS', 'none', 'Juniorhigh'),
(72, '9', 'EPHESIANS', 'none', 'Juniorhigh'),
(73, '9', 'GALATIANS', 'none', 'Juniorhigh'),
(74, '9', 'ROMANS', 'none', 'Juniorhigh'),
(75, '10', 'ST. GABRIEL', 'none', 'Juniorhigh'),
(76, '10', 'ST. JEREMIEL', 'none', 'Juniorhigh'),
(77, '10', 'ST. MICHAEL', 'none', 'Juniorhigh'),
(78, '10', 'ST. RAPHAEL', 'none', 'Juniorhigh'),
(79, '12', 'ST. SEBASTIAN', 'HUMSS', 'Seniorhigh'),
(80, '1', 'MARY HELP OF CHRISTIAN', 'none', 'Gradeschool'),
(81, '1', 'ST. JOSEPH', 'none', 'Gradeschool'),
(82, '2', 'ST. DOMINIC SAVIO', 'none', 'Gradeschool'),
(83, '2', 'ST. LUCY', 'none', 'Gradeschool'),
(84, '3', 'ST. BARTHOLOMEW', 'none', 'Gradeschool'),
(85, '3', 'ST. CATHERINE', 'none', 'Gradeschool'),
(86, '4', 'ST. ISIDORE', 'none', 'Gradeschool'),
(87, '4', 'ST. JOHN THE BELOVED', 'none', 'Gradeschool'),
(88, '5', 'ST. FRANCIS OF ASSISI', 'none', 'Gradeschool'),
(89, '5', 'ST. PETER', 'none', 'Gradeschool'),
(90, '6', 'ST. ANNE', 'none', 'Gradeschool'),
(91, '6', 'ST. JOACHIM', 'none', 'Gradeschool'),
(92, 'I', 'ST. AUGUSTINE', 'none', 'Gradeschool'),
(93, 'II', 'ST. LORENZO', 'none', 'Gradeschool'),
(94, 'II', 'ST. MONICA', 'none', 'Gradeschool'),
(95, 'I', 'ST. JUDE', 'none', 'Gradeschool'),
(96, '7', 'AMOS', 'none', 'Juniorhigh'),
(97, '10', 'ST. URIEL', 'none', 'Juniorhigh'),
(98, '12', 'ST. AMAND', 'HUMSS', 'Seniorhigh'),
(99, '12', 'ST. ALPHONSUS', 'STEM', 'Seniorhigh'),
(100, '11', 'GAS11', 'GAS', 'Seniorhigh'),
(101, '12', 'GAS12', 'GAS', 'Seniorhigh'),
(103, '1', 'E', 'none', 'College'),
(104, '2', 'E', 'none', 'College'),
(105, '3', 'E', 'none', 'College'),
(106, '4', 'E', 'none', 'College'),
(107, '5', 'E', 'none', 'College'),
(108, '1', 'F', 'none', 'College'),
(109, '2', 'F', 'none', 'College'),
(110, '3', 'F', 'none', 'College'),
(111, '4', 'F', 'none', 'College'),
(112, '5', 'F', 'none', 'College'),
(113, '12', 'ST. DOMINIC OF OSMA', 'STEM', 'Seniorhigh');

-- --------------------------------------------------------

--
-- Table structure for table `setquestions`
--

CREATE TABLE `setquestions` (
  `setquesiontID` int(11) NOT NULL,
  `Setname` varchar(100) DEFAULT NULL,
  `Question` varchar(20) DEFAULT NULL,
  `dpt` varchar(20) DEFAULT NULL,
  `sy` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `studentID` int(11) NOT NULL,
  `FullName` varchar(200) DEFAULT NULL,
  `Address` varchar(100) DEFAULT NULL,
  `Level` varchar(20) DEFAULT NULL,
  `Course` varchar(20) DEFAULT NULL,
  `Section` varchar(100) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `pass` varchar(50) DEFAULT NULL,
  `dpt` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`studentID`, `FullName`, `Address`, `Level`, `Course`, `Section`, `email`, `pass`, `dpt`) VALUES
(5978, 'PEñARANDA, LOUISE BALANO ', 'GATIAWIN, ARAYAT, PAMPANGA', 'GRADE 11', 'TVL-ICT', 'ST. MARGARET CLITHEROW', 'gwenpenaranda.18@gmail.com', 'PEñARANDA', 'Seniorhigh'),
(5979, 'ALCARAZ, LOVELY CARMONA ', 'GULAP, CANDABA, PAMPANGA', 'GRADE 11', 'HUMSS', 'ST. ANTHONY MARY CLARET', 'kiarapauleen@gmail.com', 'ALCARAZ', 'Seniorhigh'),
(5980, 'CARMONA, KRISTAN PASCUA ', 'GULAP, CANDABA, PAMPANGA', 'GRADE 11', 'HUMSS', 'ST. ANTHONY MARY CLARET', 'kiarapauleen1908@gmail.com', 'CARMONA', 'Seniorhigh'),
(5981, 'MAGPAYO, JAYDELYN DE ALA ', 'SAN NICOLAS, ARAYAT, PAMPANGA', 'GRADE 11', 'HUMSS', 'ST. THOMAS AQUINAS', 'jaydelynmagpayo@gmail.com', 'MAGPAYO', 'Seniorhigh'),
(6921, 'MESINA, AKEISHA LEI LAPENING ', 'SAN NICOLAS, ARAYAT, PAMPANGA', 'GRADE 7', NULL, 'ZECHARIAH', 'analynmesina04261984@gmail.com', 'MESINA', 'Juniorhigh'),
(6922, 'MESINA, AKEISHA LAPENING ', 'SA NICOLAS, ARAYAT, PAMPANGA', 'GRADE 7', NULL, 'EZEKIEL', '', 'MESINA', 'Juniorhigh'),
(6923, 'PINEDA, NIñO ALEXIE VINUYA ', 'STA.LUCIA, STA.ANA, PAMPANGA', 'GRADE 7', NULL, 'ABRAHAM', '', 'PINEDA', 'Juniorhigh'),
(6924, 'MANGUNE, RISH MATTI GAMBA ', 'SAN JOAQUIN, STA ANA, PAMPANGA', 'GRADE 7', NULL, 'DAVID', 'ashleeguinto@gmail.com', 'MANGUNE', 'Juniorhigh'),
(7166, 'CUNANAN, JOHN LENARD MALLARI ', 'SAN ROQUE STA ANA PAM., STA ANA PAM., PAMPANGGA', 'GRADE 6', NULL, 'ST. ANNE', 'johnlenardcunanan@gmail.com', 'CUNANAN', 'Gradeschool'),
(7167, 'PALO, JIAN RHAYNE LAPIRA ', 'DUNGAN, DEL CARMEN, SAN FERNANDO, PAMPANGA', 'GRADE 1', NULL, 'ST. JOSEPH', 'Jianpalo75@gmail.com', 'PALO', 'Gradeschool'),
(7168, 'MONTANO, MARKLEIN CASTRO ', '119 SAN PEDRO STA. ANA PAMPANGA, STA. ANA, PAMPANGA', 'GRADE 6', NULL, 'ST. ANNE', 'markmontano678@gmail.com', '', 'Gradeschool'),
(7169, 'CULALA, NASH JACOB DELA PEñA ', 'SAN AGUSTIN, CANDABA, PAMPANGA', 'GRADE 6', NULL, 'ST. ANNE', 'f.culala@yahoo.com', 'CULALA', 'Gradeschool'),
(7370, 'MARTINEZ, JUANN JACOB CUNANAN ', 'SAN JOSE, SANTA ANA, PAMPANGA', 'GRADE 2', NULL, 'ST. LUCY', 'amaliamartinez.uae@gmail.com', 'MARTINEZ', 'Gradeschool'),
(7371, 'OCAMPO, SAKURA LLAIME MAGAT ', 'SAN JOAQUIN, SANTA ANA, PAMPANGA', 'GRADE 4', NULL, 'ST. ISIDORE', 'ocampoarlenemarie@gmail.com', 'OCAMPO', 'Gradeschool'),
(7372, 'CANLAS, ANGEAL KYLE SANTOS ', 'SAN NICOLAS, STA.ANA, PAMPANGA', 'GRADE 2', NULL, 'ST. LUCY', 'karlyn.canlas001@deped.gov.ph', 'CANLAS', 'Gradeschool'),
(7373, 'MADLA, KENZEI NUCUM ', 'SAN ISIDRO, STA.ANA, PAMPANGA', 'GRADE 4', NULL, 'ST. ISIDORE', 'kenzeirenegadekyle@yahoo.com', 'MADLA', 'Gradeschool');

-- --------------------------------------------------------

--
-- Table structure for table `summary`
--

CREATE TABLE `summary` (
  `SummaryID` int(11) NOT NULL,
  `Teacher` varchar(20) DEFAULT NULL,
  `Summ` varchar(20) DEFAULT NULL,
  `dpt` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `TeacherID` int(11) NOT NULL,
  `Fullname` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `pass` varchar(100) DEFAULT NULL,
  `Position` varchar(50) DEFAULT NULL,
  `dpt` varchar(20) DEFAULT NULL,
  `College` varchar(20) DEFAULT 'No',
  `Seniorhigh` varchar(20) DEFAULT 'No',
  `Juniorhigh` varchar(20) DEFAULT 'No',
  `Gradeschool` varchar(20) DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `temp_question`
--

CREATE TABLE `temp_question` (
  `tempquestionID` int(11) NOT NULL,
  `Question` varchar(20) DEFAULT NULL,
  `userID` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `temp_section`
--

CREATE TABLE `temp_section` (
  `SectionID` int(11) NOT NULL,
  `Section` varchar(20) DEFAULT NULL,
  `UserID` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `Fname` varchar(20) DEFAULT NULL,
  `Lname` varchar(20) DEFAULT NULL,
  `Mname` varchar(20) DEFAULT NULL,
  `Position` varchar(20) DEFAULT NULL,
  `un` varchar(50) DEFAULT NULL,
  `pss` varchar(50) DEFAULT NULL,
  `Lastlogin` varchar(20) DEFAULT NULL,
  `College` varchar(20) DEFAULT 'No',
  `Seniorhigh` varchar(20) DEFAULT 'No',
  `Juniorhigh` varchar(20) DEFAULT 'No',
  `Gradeschool` varchar(20) DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `Fname`, `Lname`, `Mname`, `Position`, `un`, `pss`, `Lastlogin`, `College`, `Seniorhigh`, `Juniorhigh`, `Gradeschool`) VALUES
(1, 'Juan', 'Dela Cruz', 'Lopez', 'Admin', 'admin', 'pass', NULL, 'Yes', 'Yes', 'Yes', 'Yes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assign_section`
--
ALTER TABLE `assign_section`
  ADD PRIMARY KEY (`AssignID`),
  ADD UNIQUE KEY `AssignID` (`AssignID`);

--
-- Indexes for table `evaluations`
--
ALTER TABLE `evaluations`
  ADD PRIMARY KEY (`resultID`),
  ADD UNIQUE KEY `resultID` (`resultID`);

--
-- Indexes for table `evaluation_transaction`
--
ALTER TABLE `evaluation_transaction`
  ADD PRIMARY KEY (`evalID`),
  ADD UNIQUE KEY `evalID` (`evalID`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`QuestionID`),
  ADD UNIQUE KEY `QuestionID` (`QuestionID`);

--
-- Indexes for table `setquestions`
--
ALTER TABLE `setquestions`
  ADD PRIMARY KEY (`setquesiontID`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`studentID`),
  ADD UNIQUE KEY `studentID` (`studentID`);

--
-- Indexes for table `summary`
--
ALTER TABLE `summary`
  ADD PRIMARY KEY (`SummaryID`),
  ADD UNIQUE KEY `SummaryID` (`SummaryID`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`TeacherID`),
  ADD UNIQUE KEY `TeacherID` (`TeacherID`);

--
-- Indexes for table `temp_question`
--
ALTER TABLE `temp_question`
  ADD PRIMARY KEY (`tempquestionID`),
  ADD UNIQUE KEY `tempquestionID` (`tempquestionID`);

--
-- Indexes for table `temp_section`
--
ALTER TABLE `temp_section`
  ADD PRIMARY KEY (`SectionID`),
  ADD UNIQUE KEY `SectionID` (`SectionID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `UserID` (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assign_section`
--
ALTER TABLE `assign_section`
  MODIFY `AssignID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `evaluations`
--
ALTER TABLE `evaluations`
  MODIFY `resultID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `evaluation_transaction`
--
ALTER TABLE `evaluation_transaction`
  MODIFY `evalID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `QuestionID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `setquestions`
--
ALTER TABLE `setquestions`
  MODIFY `setquesiontID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `studentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7393;

--
-- AUTO_INCREMENT for table `summary`
--
ALTER TABLE `summary`
  MODIFY `SummaryID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `TeacherID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `temp_question`
--
ALTER TABLE `temp_question`
  MODIFY `tempquestionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `temp_section`
--
ALTER TABLE `temp_section`
  MODIFY `SectionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
