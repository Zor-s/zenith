-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2024 at 07:20 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zenith`
--
CREATE DATABASE IF NOT EXISTS `zenith` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `zenith`;

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `add_task` (IN `p_users_id` INT, IN `p_task_name` VARCHAR(100), IN `p_task_description` TEXT, IN `p_priority` VARCHAR(10), IN `p_date_start` DATETIME, IN `p_date_due` DATETIME)   BEGIN
    INSERT INTO tasks (
        users_id, 
        task_name, 
        task_description, 
        priority, 
        date_start, 
        date_due
    ) 
    VALUES (
        p_users_id, 
        p_task_name, 
        p_task_description, 
        p_priority, 
        p_date_start, 
        p_date_due
    );
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `add_user` (IN `p_username` VARCHAR(50), IN `p_password` VARCHAR(255))   BEGIN
    INSERT INTO users (username, password) 
    VALUES (p_username, p_password);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_task` (IN `p_task_id` INT)   BEGIN
    DELETE FROM tasks
    WHERE tasks_id = p_task_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_task` (IN `p_tasks_id` INT, IN `p_task_name` VARCHAR(100), IN `p_task_description` TEXT, IN `p_priority` VARCHAR(10), IN `p_date_start` DATE, IN `p_date_due` DATE)   BEGIN
    UPDATE tasks
    SET 
        task_name = COALESCE(p_task_name, task_name),
        task_description = COALESCE(p_task_description, task_description),
        priority = COALESCE(p_priority, priority),
        date_start = COALESCE(p_date_start, date_start),
        date_due = COALESCE(p_date_due, date_due)
    WHERE tasks_id = p_tasks_id;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `tasks_id` int(11) NOT NULL,
  `users_id` int(11) DEFAULT NULL,
  `task_name` varchar(100) NOT NULL,
  `task_description` text DEFAULT NULL,
  `priority` varchar(10) DEFAULT NULL,
  `date_start` datetime DEFAULT NULL,
  `date_due` datetime DEFAULT NULL,
  `is_finished` tinyint(1) NOT NULL DEFAULT 0,
  `is_overdue` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `users_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_darkmode` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`tasks_id`),
  ADD KEY `users_id` (`users_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`users_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `tasks_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`users_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
