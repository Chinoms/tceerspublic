-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2019 at 10:50 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ukwuoma`
--

-- --------------------------------------------------------

--
-- Table structure for table `journals`
--

CREATE TABLE `journals` (
  `id` int(3) NOT NULL,
  `journal_name` varchar(255) NOT NULL,
  `journal_descr` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `journals`
--

INSERT INTO `journals` (`id`, `journal_name`, `journal_descr`) VALUES
(1, 'Centre for Education, Enhancement and Research', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(2, 'Unknown Journal', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.');

-- --------------------------------------------------------

--
-- Table structure for table `journal_items`
--

CREATE TABLE `journal_items` (
  `id` int(11) NOT NULL,
  `item_name` varchar(45) NOT NULL,
  `item_author` varchar(30) NOT NULL,
  `item_author_id` varchar(3) NOT NULL,
  `parent_journal` int(11) NOT NULL,
  `file_url` varchar(64) NOT NULL,
  `keywords` varchar(255) NOT NULL,
  `item_desc` longtext NOT NULL,
  `item_date` datetime NOT NULL,
  `approval_status` int(1) NOT NULL,
  `approval_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `journal_items`
--

INSERT INTO `journal_items` (`id`, `item_name`, `item_author`, `item_author_id`, `parent_journal`, `file_url`, `keywords`, `item_desc`, `item_date`, `approval_status`, `approval_date`) VALUES
(1, 'Yello', 'Tester Testing', '18', 1, '../res/journals/63421423web_design_proposal_template.pdf', 'uhhu', 'jbjbj yuhg yhfg yukf\n', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(2, 'Identifying Obstacles to Research in Nigeria', 'Tester Testing', '18', 1, '../res/journals/52842459web_design_proposal_template.pdf', 'uhhu', '<p>\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(3, 'Yello', 'Tester Testing', '18', 1, '../res/journals/93222541bro._john\'s_talk_2.pdf', 'uhhu', 'jbjbj yuhg yhfg yukf\n', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(4, 'If I Were A Carpenter', 'Tester Testing', '19', 1, '../res/journals/71692954web_design_proposal_template.pdf', 'and, you, were, a, lady', '\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(5, 'Unknown Journal', 'Tester Testing', '18', 2, '../res/journals/38960501web_design_proposal_template.pdf', 'unknown, journal, keywords', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `paiditems`
--

CREATE TABLE `paiditems` (
  `id` int(3) NOT NULL,
  `item_id` int(3) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `payer_id` int(3) NOT NULL,
  `pay_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `item_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paiditems`
--

INSERT INTO `paiditems` (`id`, `item_id`, `item_name`, `payer_id`, `pay_date`, `item_type`) VALUES
(1, 4, 'If I Were A Carpenter', 18, '2019-02-11 14:05:38', 'journal_items'),
(2, 1, 'Introduction to Principles of Research', 18, '2019-02-11 14:06:40', 'seers');

-- --------------------------------------------------------

--
-- Table structure for table `scholars`
--

CREATE TABLE `scholars` (
  `id` int(3) NOT NULL,
  `fname` varchar(25) NOT NULL,
  `lname` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `pword` varchar(65) NOT NULL,
  `ispaid` int(1) NOT NULL DEFAULT '0',
  `regdate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `scholars`
--

INSERT INTO `scholars` (`id`, `fname`, `lname`, `email`, `phone`, `pword`, `ispaid`, `regdate`) VALUES
(1, 'John', 'Doe', 'john.doe@johndoe.com', '08167318389', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 0, '0000-00-00 00:00:00'),
(2, 'John', 'Doe', 'chinoms925@gmail.com', '', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 0, '0000-00-00 00:00:00'),
(3, 'Jane', 'Doe', 'jane.doe@janedoe.com', '', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 0, '0000-00-00 00:00:00'),
(4, 'Jane', 'Didi', 'jane.doe@janedoe.tk', '', '$2y$10$h0BZgnrByzUA1qFaMJ1czehcLtlXwHHiroc9477MzsI7P4.7giWS2', 0, '2018-12-25 09:19:51'),
(5, 'Tom', 'Doe', 'tom.doe@janedoe.tk', '', '$2y$10$h0BZgnrByzUA1qFaMJ1czehcLtlXwHHiroc9477MzsI7P4.7giWS2', 0, '2018-12-31 12:25:20'),
(6, 'Test', '', '', '', '$2y$10$Wkpz.jpIevO3FyXpVDP.wOx5MmDYUYJrqNv2DPGFQ3ivaxRtS2vbi', 0, '2019-01-10 00:07:35'),
(7, 'Chinoms', 'Ugwuanya', 'testrr@test.io', '', '$2y$10$sdSJqw82vLEEPH.ZjkJY9OVMChmON5C1uZLn.LpMC3YaRK6w2HuCm', 0, '2019-01-10 00:20:06'),
(8, 'Chinoms', 'Ugwuanya', 'testt@trr.ii', '', '$2y$10$57EiNs0TlbFGq8GYnHq6Z.DQXuUI.4EgJ28CpYk2MKDgV9S2rs0G.', 0, '2019-01-10 00:21:21'),
(9, 'Jerry', 'Yango', 'tyuii@yyu.ii', '', '$2y$10$Gn8qD7YXGDlvcI5d2mtY9ObBTjvowq9LHejoK78adsIJ4yzcnYWrO', 0, '2019-01-10 06:48:56'),
(10, 'ygyg', 'hghghj', 'hghbhb@bnb.nn', '', '$2y$10$GwVEpJpF9BPPzc.F6h0KoupNB4O1WVCfXHK3OxS6IG2OOmKU.0vfK', 0, '2019-01-10 07:13:47'),
(11, 'Hello', 'Hi', 'hi@hello.com', '', '$2y$10$/6GjNRcNDPorYHnY1jMF4.iwd4jBJxxHocundWqAGkBpBoBM1K5.W', 0, '2019-01-10 07:21:58'),
(12, 'Hello', 'Hi', 'hi@helllo.com', '', '$2y$10$Rs4GgxzS88.9WBbkdha05O.ndo1Vi4WG2cr1ibIQdP5ANFLVVAEG2', 0, '2019-01-10 07:22:21'),
(13, 'Chizaram', 'Ugwuanya', 'asdf@uiop.op', '', '$2y$10$oP6j39xLZqOP7/9HGMZNT.glpLCTYioF2UB97Gq//FEgM6/u5u8Ca', 0, '2019-01-10 07:49:52'),
(14, 'Hello', 'Hala', 'chinoms925@gmail.cc', '', '$2y$10$1MxMn8Y6uRX95iNNXXX6eO848yoqU29d4w9AzzN06hSw6V/3oVq5m', 0, '2019-01-13 11:34:28'),
(15, 'Testmaster', 'Holla', 'asdf@zxcvb.nm', '', '$2y$10$1jsUfhWpEzMcS/7PKLFZ.ul6sIA0i8vdZD5uzZ6JqwLXRJRF94kba', 0, '2019-01-13 11:48:46'),
(16, 'Asdf', 'Qwerty', 'Asdf.qwerty@uiop.pp', '', '$2y$10$3MUoMMh30LyPqgg1NXdJ7ONfODS/QyxYli560c7pvLZQXoBN.8t92', 0, '2019-01-13 12:55:46'),
(17, 'Andrew', 'Holmes', 'andrew.holmes@seers.com', '', '$2y$10$zvyfhiokWz/AdBOoarSYl.xQCVQxF.FYcwHY57afOlLCWbopifg8i', 0, '2019-01-14 10:26:16'),
(18, 'Tester', 'Testing', 'admin@admin.com', '', '$2y$10$Y1X1f/WbNOn8vqPpvN.f2O8HE8mbcY3/WHsUgvnA1XdqjJ4A/BTQO', 0, '2019-01-15 12:00:14');

-- --------------------------------------------------------

--
-- Table structure for table `seers`
--

CREATE TABLE `seers` (
  `id` int(3) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author_id` int(3) NOT NULL,
  `keywords` varchar(255) NOT NULL,
  `descr` longtext NOT NULL,
  `file_url` varchar(64) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_approved` datetime NOT NULL,
  `author_name` varchar(51) NOT NULL,
  `approved_status` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seers`
--

INSERT INTO `seers` (`id`, `title`, `author_id`, `keywords`, `descr`, `file_url`, `date_added`, `date_approved`, `author_name`, `approved_status`) VALUES
(1, 'Introduction to Principles of Research', 20, 'Introduction, Jason, Ukwuoma, Principles of research', '<p>Type your description here.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>', '../res/ceers/14743300web_design_proposal_template.pdf', '2019-01-21 16:33:00', '0000-00-00 00:00:00', 'Tester Testing', 0),
(2, 'Introduction to Principles of Research - Part 2', 18, 'kjhhijhui', '</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>\r\n<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>', '../res/ceers/21443438easylaravel-sample.pdf', '2019-01-21 16:34:38', '0000-00-00 00:00:00', 'Tester Testing', 0),
(3, 'Testing', 18, '', 'Type your description here.', '../res/ceers/81484200the_bees_letterhead.pdf', '2019-01-21 18:42:00', '0000-00-00 00:00:00', 'Tester Testing', 1),
(4, 'testttt', 18, 'yfyut', 'Type your description here.', '../res/ceers/1091346pyes_guarantor_form.pdf', '2019-02-15 19:13:46', '0000-00-00 00:00:00', 'Tester Testing', 0),
(5, 'testin gjhjkh hg jhfgjhfgjhk fhk', 18, 'gvgh tyfgf yuf yu', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur', '../res/ceers/71782231pyes_guarantor_form.pdf', '2019-02-15 19:22:31', '0000-00-00 00:00:00', 'Tester Testing', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `journals`
--
ALTER TABLE `journals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `journal_items`
--
ALTER TABLE `journal_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paiditems`
--
ALTER TABLE `paiditems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scholars`
--
ALTER TABLE `scholars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seers`
--
ALTER TABLE `seers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `journals`
--
ALTER TABLE `journals`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `journal_items`
--
ALTER TABLE `journal_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `paiditems`
--
ALTER TABLE `paiditems`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `scholars`
--
ALTER TABLE `scholars`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `seers`
--
ALTER TABLE `seers`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
