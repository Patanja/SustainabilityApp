-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2024 at 12:35 AM
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
-- Database: `susapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `business_registrations`
--

CREATE TABLE `business_registrations` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `company_logo` text DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `business_registrations`
--

INSERT INTO `business_registrations` (`user_id`, `name`, `surname`, `company_name`, `company_logo`, `email`, `password`) VALUES
(5, 'Alberto', 'Contreras', 'Edinburgh College', 'http://localhost/SustainabilityApp/registration/logos_images_uploaded/edinbughcollege.png', 'sanelcontreras@gmail.com', 'TESTtest1!'),
(6, 'Sanel', 'Contreras', 'College', 'http://localhost/SustainabilityApp/registration/logos_images_uploaded/edinbughcollege.png', 'College@college.com', 'TESTtest1!'),
(7, 'victoria', 'hernandez', 'Victoria Phycology', 'http://localhost/SustainabilityApp/registration/logos_images_uploaded/edinbughcollege.png', 'vi@vi.com', 'TESTtest1!'),
(8, 'Sanel', 'Contreras', 'Scottish Power', 'http://localhost/SustainabilityApp/registration/logos_images_uploaded/edinbughcollege.png', 'sanelcontreras@gmail.com', 'TESTtest1!');

-- --------------------------------------------------------

--
-- Table structure for table `certificates`
--

CREATE TABLE `certificates` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `award` varchar(255) DEFAULT NULL,
  `donation_amount` double DEFAULT NULL,
  `issued_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `certificates`
--

INSERT INTO `certificates` (`id`, `user_id`, `award`, `donation_amount`, `issued_date`) VALUES
(298, 6, 'Gold', 15, '2024-04-30'),
(299, 7, 'Silver', 40, '2024-04-30'),
(300, 6, 'Gold', 30, '2024-05-01'),
(301, 7, 'Gold', 25, '2024-05-02'),
(302, 6, 'Silver', 55, '2024-05-03'),
(303, 6, 'Bronze', 100, '2024-05-03'),
(304, 6, 'Gold', 0, '2024-05-03'),
(305, 6, 'Silver', 55, '2024-05-03'),
(306, 6, 'Silver', 45, '2024-05-03');

-- --------------------------------------------------------

--
-- Table structure for table `credit_card_details`
--

CREATE TABLE `credit_card_details` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `card_number` varchar(16) NOT NULL,
  `expiry_date` date NOT NULL,
  `cvv` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `credit_card_details`
--

INSERT INTO `credit_card_details` (`id`, `user_id`, `card_number`, `expiry_date`, `cvv`) VALUES
(15, 5, '123', '2024-04-29', 123),
(16, 6, '12345678912345', '2024-04-29', 123),
(19, 7, '123456789123456', '2024-05-02', 123);

-- --------------------------------------------------------

--
-- Table structure for table `memberships`
--

CREATE TABLE `memberships` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `memberships`
--

INSERT INTO `memberships` (`id`, `user_id`, `start_date`, `end_date`) VALUES
(15, 5, '2024-04-29', '2025-04-29'),
(16, 6, '2024-04-29', '2025-04-29'),
(19, 7, '2024-05-02', '2025-05-02');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `donation_amount` double DEFAULT NULL,
  `donation_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `user_id`, `donation_amount`, `donation_date`) VALUES
(75, 5, 45, '2024-04-29'),
(76, 6, 35, '2024-04-29'),
(77, 6, 25, '2024-04-29'),
(78, 6, 15, '2024-04-30'),
(79, 7, 40, '2024-04-30'),
(80, 6, 30, '2024-05-01'),
(81, 7, 25, '2024-05-02'),
(82, 6, 55, '2024-05-03'),
(83, 6, 100, '2024-05-03'),
(84, 6, 55, '2024-05-03'),
(85, 6, 45, '2024-05-03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `business_registrations`
--
ALTER TABLE `business_registrations`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `certificates`
--
ALTER TABLE `certificates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_certificates_user_id` (`user_id`);

--
-- Indexes for table `credit_card_details`
--
ALTER TABLE `credit_card_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_credit_card_details_user_id` (`user_id`);

--
-- Indexes for table `memberships`
--
ALTER TABLE `memberships`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_memberships_user_id` (`user_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_payments_user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `business_registrations`
--
ALTER TABLE `business_registrations`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `certificates`
--
ALTER TABLE `certificates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=307;

--
-- AUTO_INCREMENT for table `credit_card_details`
--
ALTER TABLE `credit_card_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `memberships`
--
ALTER TABLE `memberships`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `certificates`
--
ALTER TABLE `certificates`
  ADD CONSTRAINT `fk_certificates_user_id` FOREIGN KEY (`user_id`) REFERENCES `business_registrations` (`user_id`);

--
-- Constraints for table `credit_card_details`
--
ALTER TABLE `credit_card_details`
  ADD CONSTRAINT `credit_card_details_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `business_registrations` (`user_id`),
  ADD CONSTRAINT `fk_credit_card_details_user_id` FOREIGN KEY (`user_id`) REFERENCES `business_registrations` (`user_id`);

--
-- Constraints for table `memberships`
--
ALTER TABLE `memberships`
  ADD CONSTRAINT `fk_memberships_user_id` FOREIGN KEY (`user_id`) REFERENCES `business_registrations` (`user_id`),
  ADD CONSTRAINT `memberships_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `business_registrations` (`user_id`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `fk_payments_user_id` FOREIGN KEY (`user_id`) REFERENCES `business_registrations` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
