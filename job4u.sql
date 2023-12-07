-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2022 at 04:46 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `job4u`
--

-- --------------------------------------------------------

--
-- Table structure for table `user_entry`
--

CREATE TABLE `user_entry` (
  `entry_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `entry_title` text NOT NULL,
  `entry_description` text NOT NULL,
  `entry_location` varchar(500) NOT NULL,
  `entry_employer` varchar(200) NOT NULL,
  `entry_contact_no` varchar(100) NOT NULL,
  `entry_date` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_entry`
--

INSERT INTO `user_entry` (`entry_id`, `user_id`, `entry_title`, `entry_description`, `entry_location`, `entry_employer`, `entry_contact_no`, `entry_date`) VALUES
(13, 7, 'ali testing Title is here', '                    testing here is 2 desciption    \r\n\r\nLorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.\r\n\r\nStet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.                ', 'sargodha', 'facebook', 'saqikhankmt@gmail.com', '07 Nov. 2022'),
(16, 7, 'This is just for the testing title 06-11-2022 2nd', '                     2nd This is just for the testing description   \r\n\r\nLorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.\r\n\r\nStet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.                ', 'sargodha', 'microsoft', 'alihumdard125@gmail.com', '07 Nov. 2022'),
(17, 7, 'ali testing Title is here 3rd', '                    testing here is 2 desciption    \r\n\r\nLorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.\r\n\r\nStet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.                ', 'sargodha', 'facebook', 'saqikhankmt@gmail.com', '07 Nov. 2022'),
(18, 7, 'This is just for the testing title 06-11-2022', '                    This is just for the testing description   \r\n\r\nLorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.\r\n\r\nStet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.                ', 'sargodha', 'microsoft', 'alihumdard125@gmail.com', '07 Nov. 2022'),
(19, 7, 'ali testing Title is here', '                    testing here is 2 desciption    \r\n\r\nLorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.\r\n\r\nStet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.                ', 'sargodha', 'facebook', 'saqikhankmt@gmail.com', '07 Nov. 2022'),
(22, 7, 'this is for testing', '                    testing here  new desiiLorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.\r\n\r\nStet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.  ', 'pakistan', 'facebook', 'alihumdard125@gmail.com', '07 Nov. 2022'),
(27, 24, 'date test', '               sdkljsdkflaflsk                     ', 'dskdfl', 'kldksjflk', 'lalal@gmail.com', '07 Nov. 2022');

-- --------------------------------------------------------

--
-- Table structure for table `user_registration`
--

CREATE TABLE `user_registration` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(250) NOT NULL,
  `user_surname` varchar(250) NOT NULL,
  `user_email` varchar(300) NOT NULL,
  `user_password` text NOT NULL,
  `user_ph_no` varchar(100) NOT NULL,
  `user_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_registration`
--

INSERT INTO `user_registration` (`user_id`, `user_name`, `user_surname`, `user_email`, `user_password`, `user_ph_no`, `user_status`) VALUES
(7, 'ali', 'ali', 'admin@gmail.com', '1234', '22222', 1),
(18, 'Ali', 'humdard', 'admin@gmail.com', '1234', '03040404040', 1),
(19, 'ali', 'humdard2', 'admin@gmail.com', '1234', '03040404040', 1),
(20, 'ali', 'alia', 'admin@gmail.com', '1234', '03040404004', 1),
(21, 'ali', 'ali234', 'admin@gmail.com', '1234', '03040404040', 1),
(22, 'ali', 'test', 'alihumdard@gmail.com', '1234', '0304040404', 1),
(23, 'ali', 'test2', 'alihumdard@gmail.com', '1234', '0304040404', 1),
(24, 'ali', 'sdg2', 'admin2@gmail.com', '1234', '03040404040', 1),
(25, 'final ', 'testing', 'finaltest@gmail.com', '1234', '030400602398', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user_entry`
--
ALTER TABLE `user_entry`
  ADD PRIMARY KEY (`entry_id`);

--
-- Indexes for table `user_registration`
--
ALTER TABLE `user_registration`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_entry`
--
ALTER TABLE `user_entry`
  MODIFY `entry_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `user_registration`
--
ALTER TABLE `user_registration`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
