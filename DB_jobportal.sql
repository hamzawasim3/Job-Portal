-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2022 at 02:33 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `job_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `apply_job`
--

CREATE TABLE `apply_job` (
  `id` int(255) NOT NULL,
  `user_id` varchar(999) NOT NULL,
  `job_id` varchar(999) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `candidate_data`
--

CREATE TABLE `candidate_data` (
  `id` int(255) NOT NULL,
  `user_id` varchar(999) NOT NULL,
  `image_url` varchar(999) NOT NULL,
  `resume_url` varchar(999) NOT NULL,
  `name` varchar(999) NOT NULL,
  `phone` bigint(255) NOT NULL,
  `role` varchar(999) NOT NULL,
  `location` varchar(999) NOT NULL,
  `experience` int(255) NOT NULL,
  `linkedin` varchar(999) DEFAULT NULL,
  `company` varchar(999) DEFAULT NULL,
  `current_role` varchar(999) DEFAULT NULL,
  `current_company_type` varchar(999) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(255) NOT NULL,
  `user_id` varchar(999) NOT NULL,
  `job_id` varchar(999) NOT NULL,
  `job_title` varchar(999) NOT NULL,
  `location` varchar(999) NOT NULL,
  `experience` int(255) NOT NULL,
  `skills` varchar(999) NOT NULL,
  `job_type` varchar(999) NOT NULL,
  `job_description` text NOT NULL,
  `posted_on` bigint(255) NOT NULL,
  `application_deadline` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pending_verify`
--

CREATE TABLE `pending_verify` (
  `id` int(11) NOT NULL,
  `user_type` varchar(999) NOT NULL,
  `email` varchar(999) NOT NULL,
  `code` varchar(999) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `recruiter_data`
--

CREATE TABLE `recruiter_data` (
  `id` int(255) NOT NULL,
  `user_id` varchar(999) NOT NULL,
  `image_url` varchar(999) NOT NULL,
  `name` varchar(999) NOT NULL,
  `phone` bigint(255) NOT NULL,
  `company_name` varchar(999) NOT NULL,
  `company_type` varchar(999) NOT NULL,
  `company_url` varchar(999) NOT NULL,
  `company_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_login_data`
--

CREATE TABLE `user_login_data` (
  `id` int(255) NOT NULL,
  `user_id` varchar(999) NOT NULL,
  `user_type` varchar(999) NOT NULL,
  `email` varchar(999) NOT NULL,
  `password` varchar(999) NOT NULL,
  `last_activity` bigint(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apply_job`
--
ALTER TABLE `apply_job`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `candidate_data`
--
ALTER TABLE `candidate_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pending_verify`
--
ALTER TABLE `pending_verify`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recruiter_data`
--
ALTER TABLE `recruiter_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_login_data`
--
ALTER TABLE `user_login_data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apply_job`
--
ALTER TABLE `apply_job`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `candidate_data`
--
ALTER TABLE `candidate_data`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `pending_verify`
--
ALTER TABLE `pending_verify`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `recruiter_data`
--
ALTER TABLE `recruiter_data`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_login_data`
--
ALTER TABLE `user_login_data`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
