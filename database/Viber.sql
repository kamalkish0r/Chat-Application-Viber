-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 17, 2021 at 10:39 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Viber`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(7) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email_id` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `login` int(1) DEFAULT NULL,
  `bio` varchar(1023) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `user_profile` varchar(255) NOT NULL DEFAULT 'default_pic.svg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email_id`, `password`, `login`, `bio`, `dob`, `gender`, `country`, `user_profile`) VALUES
(12, 'black', 'black@gmail.com', '$2y$10$/TDOA6iQu0bmv5ONHE8h1.0ltEJl7JEncloDD4lb7djvdCg7oD6pC', 0, NULL, '2021-11-16', 'Male', NULL, 'profile12.jpg'),
(13, 'red', 'red@gmail.com', '$2y$10$eq9UQY7fR1qQSVgJiXkQbOmcT14fmj0ms6QsW1ALJEHeIYzFhELxe', 0, NULL, '2021-11-16', NULL, NULL, 'profile13.jpeg'),
(14, 'blue', 'blue@gmail.com', '$2y$10$SEIZz/.w8IovT.1Q0mOBkenx.FwmvZ/5dl4pDg0l0J3F1HeYqBWay', 0, NULL, '2021-11-16', NULL, NULL, 'default_pic.svg'),
(15, 'green', 'green@gmail.com', '$2y$10$yjIqEXneMMkxL8q2QASRXOLWmtNWf5rk/vbPtFRbmR3xcSa2UsnKy', 0, NULL, '2021-11-16', NULL, NULL, 'profile15.jpeg'),
(16, 'white', 'white@gmail.com', '$2y$10$sJmeeAdGxkint..w9GrKTuXyHrPb8iHClNJ00rrt8XyhkOwQeOSaO', 0, NULL, '2021-11-16', 'Male', NULL, 'profile16.jpeg'),
(17, 'kamal', 'kamal@gmail.com', '$2y$10$GSePPo2KTDsjG2iftTes0upnGTo.FLAuQxfBXRuecNLndYpfPZpMu', 0, NULL, '2000-02-05', 'Male', NULL, 'profile17.jpeg'),
(18, 'kanha tiwari', 'kanha@gmail.com', '$2y$10$kimgKNj9aLdqB0pzr4v2JOp.aSZjPh8/ILVOPBMHfzFSDre8DKD.e', 0, NULL, '2021-11-16', NULL, NULL, 'default_pic.svg'),
(19, 'karanveer singh', 'karan@gmail.com', '$2y$10$hDCGATbJB4PpmSmbWJ3PE.4VekehaXFtSFGTULGcyl2uVHuuQ/.Fy', 0, NULL, '2021-11-16', NULL, NULL, 'default_pic.svg'),
(20, 'john doe', 'johndoe@gmail.com', '$2y$10$jfZTr9wEaTVF8f4z08dbY.P6DIOvBVrWI3zEKNlRQqdCq1nwm8oPq', 0, NULL, '2021-11-16', NULL, NULL, 'default_pic.svg'),
(21, 'michael', 'michael@gmail.com', '$2y$10$ZdMrVKCYqVXxINUB6KIhL.TKa9udnFBhkdjJ1T7SB01obchNQOBpG', 0, NULL, '2021-11-16', 'Male', 'italy', 'profile21.jpeg'),
(22, 'red black', 'redblack@gmail.com', '$2y$10$ze1EMvkPHW0TOvA26oUFfOnbd7mu.U1y0xzJQY/aPrAKyVyp4C/0m', 0, NULL, '2021-11-16', NULL, NULL, 'default_pic.svg'),
(23, 'loki', 'loki@gmail.com', '$2y$10$qgvpUosN0JALCtmPbDwpqu4cJ/8oPmWJbp8SPNLV4yPfkmc/437om', 0, NULL, '2021-11-16', NULL, NULL, 'profile23.jpeg'),
(24, 'thor', 'thor@gmail.com', '$2y$10$sCDu.Cf1vHnv/XrAXIOJcu62mTupQ7.xSTgvPAMb6rukTmw16bN/K', 0, NULL, '2021-11-16', NULL, NULL, 'profile24.jpeg'),
(25, 'tony stark', 'tony@gmail.com', '$2y$10$/HwNnyCgTDB7pw2DWmMBY.m6LSw76GUazZ55xlix6MLDksritNagG', 0, NULL, '2021-11-16', 'Male', NULL, 'profile25.png'),
(26, 'joker', 'joker@gmail.com', '$2y$10$wjx/y4XIvHqPQYe2vyFxKuQKAAsdlji0QPFUHoMunQBiiDbKbDv1m', 0, NULL, '2021-11-16', 'Male', NULL, 'profile26.jpeg'),
(27, 'jessica', 'jessica@gmail.com', '$2y$10$Nz6F2DOaBL85rE7COujRluq8zk7J/NALytFdj5E66TSmaYjFfgImm', 0, NULL, '2021-11-16', 'Female', NULL, 'profile27.jpeg'),
(28, 'anne', 'anne@gmail.com', '$2y$10$0kv1DnAVBAUKv6GVY4Lq3OKLNRrg20aRnO0Tga2t3fkEVvclQ2pwa', 0, NULL, '2021-11-16', 'Female', 'united states', 'profile28.jpeg'),
(29, 'susan', 'susan@gmail.com', '$2y$10$La1JPZT1q1aozpRZgIixS.kbTXxRlHyYn5SRpVagYTjJU0s1q.dQW', 0, NULL, '2021-11-16', 'Female', NULL, 'profile29.jpeg'),
(30, 'brad', 'brad@gmail.com', '$2y$10$dBlt0c3j3qUaN6zvKBTequCrp2S41zz1MIyI62W2p9XkZSQjGMQ4e', 0, NULL, '2021-11-16', 'Male', NULL, 'profile30.jpeg'),
(31, 'shubham', 'shubham@gmail.com', '$2y$10$5fH67yOkKBEefL5LFOq.RuMPzfQoisO/Px5nKTuJZqiZHrATWRPH2', 0, 'Kind\r\nHumble\r\n', '2021-11-16', 'Female', 'India', 'profile31.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `users_chat`
--

CREATE TABLE `users_chat` (
  `msg_id` int(11) NOT NULL,
  `sender_id` int(10) NOT NULL,
  `receiver_id` int(10) NOT NULL,
  `msg_content` varchar(1023) NOT NULL,
  `msg_status` text NOT NULL,
  `msg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_chat`
--

INSERT INTO `users_chat` (`msg_id`, `sender_id`, `receiver_id`, `msg_content`, `msg_status`, `msg_date`) VALUES
(217, 13, 12, 'Hi black!', 'READ', '2021-11-16 09:00:37'),
(218, 12, 13, 'Hello Red', 'READ', '2021-11-16 09:00:55'),
(219, 13, 14, 'Hello Blue', 'UNREAD', '2021-11-16 09:01:27'),
(220, 12, 13, 'how you doin', 'READ', '2021-11-16 09:04:42'),
(221, 13, 12, 'am doing fine', 'READ', '2021-11-16 09:05:38'),
(222, 13, 12, 'wbu', 'READ', '2021-11-16 09:05:38'),
(223, 14, 25, 'hey tony!', 'READ', '2021-11-16 09:35:34'),
(224, 25, 14, 'hey blue!', 'READ', '2021-11-16 09:35:49'),
(225, 25, 15, 'hey green', 'READ', '2021-11-16 09:38:21'),
(226, 15, 25, 'heyy tony', 'READ', '2021-11-16 09:38:42'),
(227, 25, 15, 'how you doing', 'READ', '2021-11-16 09:39:24'),
(228, 15, 25, 'not bad', 'READ', '2021-11-16 09:39:57'),
(229, 15, 25, 'shfksdhfj', 'READ', '2021-11-16 09:41:31'),
(230, 15, 25, 'fsfadsfsadfsadfds', 'READ', '2021-11-16 09:41:31'),
(231, 15, 25, 'fsdafasbdbasdggsadgf fds. f sd f sdf', 'READ', '2021-11-16 09:41:31'),
(232, 25, 15, 'fnsklflsdh', 'READ', '2021-11-16 09:41:48'),
(233, 15, 25, 'fdsfasdfgdfbdfvdsvadsdv.  fd fds. fd. fd f', 'READ', '2021-11-16 09:42:01'),
(234, 25, 15, 'hflskhkfds', 'READ', '2021-11-16 09:43:00'),
(235, 25, 15, 'fdsf', 'READ', '2021-11-16 09:43:00'),
(236, 25, 15, 'Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.', 'READ', '2021-11-16 09:43:00'),
(237, 15, 25, 'Lorem ipsum is placeholder text commonly used in the graphic', 'READ', '2021-11-16 09:43:29'),
(238, 25, 13, 'hey red', 'UNREAD', '2021-11-16 09:44:02'),
(239, 25, 26, 'oye joker!', 'READ', '2021-11-16 09:46:55'),
(240, 26, 25, 'Tony!', 'READ', '2021-11-16 09:47:21'),
(241, 26, 25, 'These are my politics: to change what we can; to better what we can; ', 'READ', '2021-11-16 09:50:50'),
(242, 25, 26, 'but still to bear in mind that man is but a devil weakly fettered by some generous beliefs and impositions; ', 'READ', '2021-11-16 09:51:14'),
(243, 26, 25, ' and for no word however sounding, and no cause however just and pious, to relax the stricture on these bonds.', 'READ', '2021-11-16 10:27:38'),
(244, 25, 23, 'The first half of our lives are ruined by our parents and the second half by our children.', 'READ', '2021-11-16 09:53:43'),
(245, 23, 25, 'Than catch and hold while I may, fast binde, fast finde.\r\n', 'READ', '2021-11-16 09:54:13'),
(246, 25, 23, 'hi', 'READ', '2021-11-16 09:58:34'),
(247, 23, 25, 'The future is an opaque mirror.', 'READ', '2021-11-16 09:59:14'),
(248, 25, 23, 'Anyone who tries to look into it sees nothing but the dim outlines of an old and worried face.', 'READ', '2021-11-16 09:59:27'),
(249, 23, 25, 'Say what you want about long dresses, but they cover a multitude of shins.', 'READ', '2021-11-16 10:00:00'),
(250, 25, 30, 'A good mathematical joke is better, and better mathematics, than a dozen mediocre papers.', 'READ', '2021-11-16 10:22:31'),
(251, 30, 25, 'Life is short; to prove it, criminals sentenced to life get out in ten years.', 'READ', '2021-11-16 10:23:00'),
(252, 25, 27, 'There is nobody as enslaved as the fanatic, the person in whom one impulse, one value, has assumed ascendancy over all others.', 'UNREAD', '2021-11-16 10:23:52'),
(253, 25, 13, 'Say what you want about long dresses, but they cover a multitude of shins', 'UNREAD', '2021-11-16 10:24:26'),
(254, 25, 28, 'Men seldom give pleasure when they are not pleased themselves', 'READ', '2021-11-16 10:25:39'),
(255, 28, 25, 'To think too long about doing a thing often becomes its undoing.', 'READ', '2021-11-16 10:25:53'),
(256, 25, 28, 'What the public wants is the image of passion, not passion itself.', 'READ', '2021-11-16 10:26:46'),
(257, 25, 28, 'To think too long about doing a thing often becomes its undoing.', 'READ', '2021-11-16 10:27:22'),
(258, 31, 28, 'hi', 'READ', '2021-11-16 11:11:15'),
(259, 31, 28, 'hello', 'READ', '2021-11-16 11:11:41'),
(260, 25, 28, 'hi', 'READ', '2021-11-16 11:13:55'),
(261, 31, 28, 'hello \r\nanne', 'READ', '2021-11-16 15:33:02'),
(262, 31, 28, 'Hello \r\nAnne!', 'READ', '2021-11-16 15:33:02'),
(263, 31, 28, 'hey\r\nthere', 'READ', '2021-11-16 15:33:02'),
(264, 31, 28, 'Hello \r\nAnne!', 'READ', '2021-11-16 15:33:02'),
(265, 28, 31, 'hello \r\nshubham!', 'READ', '2021-11-16 15:33:40'),
(266, 31, 28, '  white-space: pre-wrap;', 'READ', '2021-11-16 15:46:22'),
(267, 31, 28, 'hi', 'READ', '2021-11-16 15:46:22'),
(268, 31, 28, '  white-space: \r\npre-wrap;\r\n', 'READ', '2021-11-16 15:46:22'),
(269, 31, 28, 'hi\r\nhi', 'UNREAD', '2021-11-16 15:47:27'),
(270, 31, 28, '  white-space: pre;\r\n  white-space: pre;\r\n  white-space: pre;\r\n', 'UNREAD', '2021-11-16 15:58:54'),
(271, 31, 28, '  white-space: pre;\r\n  white-space: pre;\r\n  white-space: pre;\r\n  white-space: pre;\r\n  white-space: pre;\r\nv  white-space: pre;\r\n  white-space: pre;\r\n  white-space: pre;\r\n', 'UNREAD', '2021-11-16 15:59:38'),
(272, 31, 28, '  white-space: pre;\r\n  white-space: pre;\r\n  white-space: pre;\r\n', 'UNREAD', '2021-11-16 16:16:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `users_chat`
--
ALTER TABLE `users_chat`
  ADD PRIMARY KEY (`msg_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `users_chat`
--
ALTER TABLE `users_chat`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=273;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
