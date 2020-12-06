-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2020 at 05:57 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `codesmode`
--

-- --------------------------------------------------------

--
-- Table structure for table `overview`
--

CREATE TABLE `overview` (
  `uid` int(11) NOT NULL,
  `qid` int(11) NOT NULL,
  `num_test_case_passed` int(11) NOT NULL,
  `num_test_case_present` int(11) NOT NULL,
  `isCompleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `overview`
--

INSERT INTO `overview` (`uid`, `qid`, `num_test_case_passed`, `num_test_case_present`, `isCompleted`) VALUES
(4, 43, 3, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `qid` int(100) NOT NULL,
  `qname` varchar(500) NOT NULL,
  `question` varchar(1000) NOT NULL,
  `ccode` varchar(1000) NOT NULL,
  `constraints` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`qid`, `qname`, `question`, `ccode`, `constraints`) VALUES
(42, 'A', 'aa', 's', 's'),
(43, 'testq', 'this', '#include<stdio.h>\r\nvoid main(){\r\nint a,b;\r\nscanf(\"%d%d\", &a,&b);\r\nprintf(\"%d\", a+b);\r\n}', 'None');

-- --------------------------------------------------------

--
-- Table structure for table `testcases`
--

CREATE TABLE `testcases` (
  `qid` int(11) DEFAULT NULL,
  `testcase` varchar(5000) DEFAULT NULL,
  `testcaseop` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `testcases`
--

INSERT INTO `testcases` (`qid`, `testcase`, `testcaseop`) VALUES
(43, '2 3', '5'),
(43, '4 5', '9'),
(43, '5 6', '11');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phoneNo` char(10) NOT NULL,
  `organisation` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `name`, `email`, `phoneNo`, `organisation`, `password`) VALUES
(1, 'Aayush', 'roy.a2yush@cmrit.ac.in', '9931837670', 'CMRIT', '7da70a24ff2c3ff3cbdae659248647d8'),
(2, 'Aayush', 'roy.a2yush@zephyr.com', '9931837670', 'Zephyr', '7da70a24ff2c3ff3cbdae659248647d8'),
(3, 'Test', 'test@test.test', '9931837670', 'Test', 'dd46a756faad4727fb679320751f6dea'),
(4, 'vishwa', 'nkvi17is@cmrit.ac.in', '7904171559', 'cmrit', '6ae4412564234926f32555e7dd3a619f');

-- --------------------------------------------------------

--
-- Table structure for table `usercodes`
--

CREATE TABLE `usercodes` (
  `uid` int(11) NOT NULL,
  `qid` int(11) NOT NULL,
  `ccode` longtext NOT NULL,
  `javacode` longtext NOT NULL,
  `cppcode` longtext NOT NULL,
  `pycode` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usercodes`
--

INSERT INTO `usercodes` (`uid`, `qid`, `ccode`, `javacode`, `cppcode`, `pycode`) VALUES
(1, 43, '#include<stdio.h>\nvoid main(){\n	\n}', 'class Main{\n	public static void main(String[] args){\n		\n	}\n}', '#include<iostream>\nusing namespace std;\nint main(){\n	\n	return 0;\n}', '#code in python'),
(4, 43, '#include<stdio.h>\nvoid main(){\n    printf(\"5\");\n}', 'class Main{\n	public static void main(String[] args){\n		\n	}\n}', '#include<iostream>\nusing namespace std;\nint main(){\n	\n	return 0;\n}', '#code in python');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `overview`
--
ALTER TABLE `overview`
  ADD KEY `fquid` (`uid`),
  ADD KEY `fqqid` (`qid`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`qid`);

--
-- Indexes for table `testcases`
--
ALTER TABLE `testcases`
  ADD KEY `qid` (`qid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `usercodes`
--
ALTER TABLE `usercodes`
  ADD KEY `fk_touser` (`uid`),
  ADD KEY `fk_toquestions` (`qid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `qid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `overview`
--
ALTER TABLE `overview`
  ADD CONSTRAINT `fqqid` FOREIGN KEY (`qid`) REFERENCES `questions` (`qid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fquid` FOREIGN KEY (`uid`) REFERENCES `user` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `testcases`
--
ALTER TABLE `testcases`
  ADD CONSTRAINT `testcases_ibfk_1` FOREIGN KEY (`qid`) REFERENCES `questions` (`qid`);

--
-- Constraints for table `usercodes`
--
ALTER TABLE `usercodes`
  ADD CONSTRAINT `fk_toquestions` FOREIGN KEY (`qid`) REFERENCES `questions` (`qid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_touser` FOREIGN KEY (`uid`) REFERENCES `user` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
