-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2022 at 09:04 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `conferencems`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendanceregister`
--

CREATE TABLE `attendanceregister` (
  `id` int(100) NOT NULL,
  `userID` varchar(100) NOT NULL,
  `conferenceID` varchar(100) NOT NULL,
  `sessionID` varchar(100) NOT NULL,
  `sessionTitle` varchar(250) NOT NULL,
  `sessionStartTime` varchar(100) NOT NULL,
  `presenter` varchar(100) NOT NULL,
  `presentationTitle` varchar(250) NOT NULL,
  `sessionEndTime` varchar(100) NOT NULL,
  `roomID` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `timeIn` varchar(100) NOT NULL,
  `timeOut` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendanceregister`
--

INSERT INTO `attendanceregister` (`id`, `userID`, `conferenceID`, `sessionID`, `sessionTitle`, `sessionStartTime`, `presenter`, `presentationTitle`, `sessionEndTime`, `roomID`, `date`, `timeIn`, `timeOut`, `location`, `status`) VALUES
(4, 'A000Z', 'CONF00', 'SSN00', '', '', '', '', '', '', '', '', '', '', ''),
(6, 'ezekiel_kikoh@yahoo.com', 'AIE223', 'AIE223-1', 'Opening ceremony', '00:00:00', '', '', '05:00:00', 'AMPHI200', '2022-04-25', '05:50:07', '05:52:45', 'In Room', '0.59'),
(7, 'PP204568', 'AIE223', 'AIE223-1', 'Opening ceremony', '00:00:00', '', '', '05:00:00', 'AMPHI200', '2022-04-25', '05:54:40', '05:54:50', 'In Room', '0.02'),
(10, 'AA000371', 'AIE223', 'AIE223-2', 'Recent trends in blochchain', '14:00:00', '', '', '20:00:00', 'AMPHI200', '2022-04-30', '18:34:23', '06:35:29', 'In Room', '200.28');

-- --------------------------------------------------------

--
-- Table structure for table `awards`
--

CREATE TABLE `awards` (
  `id` int(50) NOT NULL,
  `userID` varchar(100) NOT NULL,
  `conferenceID` varchar(100) NOT NULL,
  `awardType` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `awards`
--

INSERT INTO `awards` (`id`, `userID`, `conferenceID`, `awardType`) VALUES
(1, 'AA000371', 'AIE223', 'Best presenter');

-- --------------------------------------------------------

--
-- Table structure for table `conferences`
--

CREATE TABLE `conferences` (
  `cid` int(11) NOT NULL,
  `conferenceID` varchar(50) NOT NULL,
  `conferenceTitle` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `conferenceStartDate` varchar(100) NOT NULL,
  `conferenceEndDate` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `conferences`
--

INSERT INTO `conferences` (`cid`, `conferenceID`, `conferenceTitle`, `location`, `conferenceStartDate`, `conferenceEndDate`) VALUES
(1, 'AIE223', 'Current Advances in Blockchain and IoT Technologies', 'Nicosia', '2022-04-20', '2035-04-26'),
(2, 'CONF00', 'Data Not Available. Please Register in a Conference', '', '', ''),
(3, 'CCTE', 'Challenges in compuational Intelligence', 'TRNC', '2022-05-19', '2022-06-20');

-- --------------------------------------------------------

--
-- Table structure for table `conferencesessions`
--

CREATE TABLE `conferencesessions` (
  `id` int(100) NOT NULL,
  `conferenceID` varchar(100) NOT NULL,
  `sessionID` varchar(250) NOT NULL,
  `sessionName` varchar(250) NOT NULL,
  `sessionTitle` varchar(250) NOT NULL,
  `sessionDate` varchar(100) NOT NULL,
  `sessionStartTime` varchar(100) NOT NULL,
  `sessionEndTime` varchar(100) NOT NULL,
  `room` varchar(100) NOT NULL,
  `presenter` varchar(250) NOT NULL,
  `stats` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `conferencesessions`
--

INSERT INTO `conferencesessions` (`id`, `conferenceID`, `sessionID`, `sessionName`, `sessionTitle`, `sessionDate`, `sessionStartTime`, `sessionEndTime`, `room`, `presenter`, `stats`) VALUES
(1, 'AIE223', 'AIE223-1', 'Opening', 'Opening ceremony', '2022-04-30', '04:00:00', '07:00:00', 'AMPHI200', 'Greg Hartman', ''),
(2, 'AIE223', 'AIE223-2', 'Morning', 'Recent trends in blochchain', '2022-04-30', '16:00:00', '18:00:00', 'AMPHI200', 'Aldin Mayer', ''),
(3, 'AIE223', 'AIE223-3', 'Afternoon', 'Application of blockchain in supply chain management', '2022-04-30', '18:00:00', '20:00:00', 'AMPHI200', 'Mercel Vubangsi', '');

-- --------------------------------------------------------

--
-- Table structure for table `ocbt_admin_tbl`
--

CREATE TABLE `ocbt_admin_tbl` (
  `id` int(100) NOT NULL,
  `user_name` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `last_login` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ocbt_admin_tbl`
--

INSERT INTO `ocbt_admin_tbl` (`id`, `user_name`, `password`, `email`, `last_login`) VALUES
(1, 'vmercel', 'marvel', '12345671@std.neu.edu.tr', '');

-- --------------------------------------------------------

--
-- Table structure for table `presentations`
--

CREATE TABLE `presentations` (
  `id` int(100) NOT NULL,
  `userID` varchar(100) NOT NULL,
  `sessionID` varchar(250) NOT NULL,
  `presentationTitle` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `presentations`
--

INSERT INTO `presentations` (`id`, `userID`, `sessionID`, `presentationTitle`) VALUES
(1, 'AA000371', 'AIE223-1', 'SYBIL attacks in the blockchain: Methods of mitigation.');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(100) NOT NULL,
  `roomID` varchar(100) NOT NULL,
  `roomName` varchar(100) NOT NULL,
  `latitude` varchar(100) NOT NULL,
  `longitude` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `roomID`, `roomName`, `latitude`, `longitude`) VALUES
(1, 'AMPHI200', 'Pedagogic Block A', '35.1949085', '33.3568951');

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` int(50) NOT NULL,
  `userID` varchar(100) NOT NULL,
  `conferenceID` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `userID`, `conferenceID`) VALUES
(1, 'AA000371', 'AIE223'),
(2, 'PP204568', 'AIE223'),
(3, 'ezekiel_kikoh@yahoo.com', 'AIE223');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `1d` int(11) NOT NULL,
  `userID` varchar(100) NOT NULL,
  `userName` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phoneNumber` varchar(100) NOT NULL,
  `specialty` varchar(100) NOT NULL,
  `userQualification` varchar(100) NOT NULL,
  `userPhoto` varchar(250) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`1d`, `userID`, `userName`, `email`, `password`, `phoneNumber`, `specialty`, `userQualification`, `userPhoto`, `status`) VALUES
(11, 'ezekiel_kikoh@yahoo.com', 'EZEKIEL KIKOH', 'ezekiel_kikoh@yahoo.com', 'marvel', '+237694374085', 'Philosophy', 'PhD', 'images/lady1.jpg', ''),
(12, 'AA000371', 'vubangsi mercel', '12345671@std.neu.edu.tr', 'marvel', '0533876913', 'Computational Materials Science', 'Ph.D', 'images/mercel2.jpg', 'admin'),
(13, 'PP23456', 'laura', 'lau@ra.yiky', 'marvel', '237677068763', 'Chemistry', 'DIPES I', 'images/profile.jpg', ''),
(14, 'PP204567', 'laura', 'donatus@fossung.com', 'marvel', '677036861', 'Chemistry', 'DIPES I', 'images/lady1.jpg', ''),
(20, 'PP204568', 'Vubangsi Mercel', 'vmercel@gmail.com', 'marvel', '+237677761884', 'Computational Materials Science', 'MSc', 'images/mercel_sig.png', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendanceregister`
--
ALTER TABLE `attendanceregister`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `awards`
--
ALTER TABLE `awards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `conferences`
--
ALTER TABLE `conferences`
  ADD PRIMARY KEY (`cid`),
  ADD UNIQUE KEY `conferenceID` (`conferenceID`),
  ADD UNIQUE KEY `conferenceID_2` (`conferenceID`);

--
-- Indexes for table `conferencesessions`
--
ALTER TABLE `conferencesessions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sessionID` (`sessionID`);

--
-- Indexes for table `ocbt_admin_tbl`
--
ALTER TABLE `ocbt_admin_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `presentations`
--
ALTER TABLE `presentations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roomID` (`roomID`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`1d`),
  ADD UNIQUE KEY `userID` (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendanceregister`
--
ALTER TABLE `attendanceregister`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `awards`
--
ALTER TABLE `awards`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `conferences`
--
ALTER TABLE `conferences`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `conferencesessions`
--
ALTER TABLE `conferencesessions`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ocbt_admin_tbl`
--
ALTER TABLE `ocbt_admin_tbl`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `presentations`
--
ALTER TABLE `presentations`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `1d` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
