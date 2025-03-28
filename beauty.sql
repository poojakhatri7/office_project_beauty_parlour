-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Mar 25, 2025 at 12:45 PM
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
-- Database: `beauty`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login_details`
--

CREATE TABLE `admin_login_details` (
  `id` int(40) NOT NULL,
  `name` varchar(200) NOT NULL,
  `mobile` bigint(10) NOT NULL,
  `email` varchar(40) NOT NULL,
  `address` varchar(40) DEFAULT NULL,
  `password` varchar(40) NOT NULL,
  `role` int(10) DEFAULT NULL,
  `file` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_login_details`
--

INSERT INTO `admin_login_details` (`id`, `name`, `mobile`, `email`, `address`, `password`, `role`, `file`) VALUES
(9, 'pooja khatri', 8707858421, 'Priyanka@gmail.com', 'rjpm1', '123', 1, 'upload-images/team-9.jpg'),
(11, 'payal malhotra', 8709875671, 'payal@gmail.com', 'cp', '123', 2, 'upload-images/avatar2.png'),
(12, 'anushka sharma ', 8685904894, 'anushka@gmail.com', 'kakori road', '123', 2, 'upload-images/avatar2.png');

-- --------------------------------------------------------

--
-- Table structure for table `all_services`
--

CREATE TABLE `all_services` (
  `a_id` int(40) NOT NULL,
  `all_service` varchar(200) NOT NULL,
  `price` int(50) NOT NULL,
  `description` varchar(200) DEFAULT NULL,
  `service_number` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `all_services`
--

INSERT INTO `all_services` (`a_id`, `all_service`, `price`, `description`, `service_number`) VALUES
(2, 'Mens haircut', 50, '', 1),
(3, 'blow dry', 44, NULL, 1),
(4, 'updo style', 80, '(shampoo not included)', 1),
(5, 'Child Hair cut ', 100, '(12 years old + under)', 1),
(6, 'brazillan blow out', 180, '(Includes KC MAX Treatment Spray)', 2),
(7, 'Keratin Complex Express', 210, NULL, 2),
(8, 'Keratin Complex', 300, NULL, 2),
(9, 'Keratin Complex Max', 350, '(Service length 60 minutes)', 2),
(10, 'Permanent Wave', 185, NULL, 2),
(11, 'Hair Gloss', 55, NULL, 2),
(12, 'Safe Color Treatment\r\n\r\n', 95, NULL, 2),
(13, 'Hair & Scalp Treatments\r\n\r\n', 240, NULL, 2),
(14, 'Single Process\r\n\r\n', 130, '(gloss not included)\r\n\r\n', 3),
(15, 'Double Process', 375, NULL, 3),
(16, 'Full Head Highlights', 380, NULL, 3),
(17, 'Half Head Highlights', 290, NULL, 3),
(18, 'Balayage', 220, NULL, 3),
(19, 'Color Refresh', 130, NULL, 3),
(20, 'Blowdry with Extensions', 95, NULL, 4),
(21, 'Extensions Service', 110, NULL, 4),
(22, 'Keratin Hair Extensions', 860, NULL, 4),
(23, 'Hair Extension Removal', 275, NULL, 4),
(24, 'Herbal Facial', 67, 'Service length 1 hour', 5),
(25, 'Deep Cleaning Facial', 130, 'Service length 55 minutes', 5),
(26, 'Organic Facial', 185, 'Service length 1,5 hours', 5),
(27, 'Four Layer Facial', 140, 'Service length 1,5 hours', 5),
(28, 'Biolight Facial', 165, 'Service length 1,5 hours', 5),
(32, 'Anti-Ageing Facial', 175, 'Service length 50 minutes\r\n\r\n', 5),
(33, 'Gentleman’s Facial\r\n\r\n', 60, 'Service length 50 minutes\r\n\r\n', 5),
(34, 'Teen Facial', 45, 'Service length 45 minutes', 5),
(35, 'Facial Add-ons', 85, 'Service length 30 - 55 minutes\r\n\r\n', 5),
(36, 'Eyebrow Waxing\r\n\r\n', 15, 'Service length 45 minutes\r\n\r\n', 6),
(37, 'Bikini Waxing', 30, 'Service length 1,5 hours', 6),
(38, 'Lip Waxing\r\n\r\n', 12, 'Service length 40 minutes', 6),
(39, 'Half Arm Waxing\r\n\r\n', 30, 'Service length 1,5 hours', 6),
(40, 'Cheeks Waxing\r\n\r\n', 15, 'Service length 2 hours', 6),
(41, 'Full Arm Waxing\r\n\r\n', 45, 'Service length 1,5 hours', 6),
(42, 'Full Face Waxing\r\n\r\n', 46, 'Service length 4 hours', 6),
(43, 'Half Leg Waxing\r\n\r\n', 30, 'Service length 1 hour', 6),
(44, 'Under Arm Waxing', 20, 'Service length 40 mins', 6),
(45, 'Full Leg Waxing\r\n\r\n', 50, 'Service length 1,5 hours', 6),
(46, 'Full Application\r\n\r\n', 165, 'Service length 45 minutes', 7),
(47, 'Eyebrow Shaping\r\n\r\n', 97, 'Service length 20 minutes', 7),
(48, 'Fast Face', 75, 'Service length 30 minutes', 7),
(49, 'Brow Tint', 50, 'Service length 20 minutes', 7),
(50, 'Eyebrow Tinting', 50, 'Service length 45 minutes', 7),
(51, 'Eyebrow Tinting', 15, 'Service length 25 minutes', 7),
(52, 'Lash Tint', 50, 'Service length 27 minutes', 7),
(53, 'Eyelash Tinting\r\n\r\n', 25, 'Service length 20 minutes', 7),
(54, 'Lash Lift\r\n\r\n', 175, 'Service length 40 minutes', 7),
(55, 'Lash Application\r\n\r\n', 45, 'Service length 45 minutes', 7),
(56, 'Eyelash Extensions\r\n\r\n', 155, NULL, 7),
(57, 'Classic Manicure\r\n\r\n', 19, 'Service length 40 minutes', 8),
(58, 'Spa Manicure\r\n\r\n', 30, 'Service length 1 hour', 8),
(59, 'Signature Gel Manicure', 50, 'Service length 30 minutes', 8),
(60, 'Hard Gel Full Set\r\n\r\n', 85, 'Service length 30 - 55 minutes', 8),
(61, 'Nail Art\r\n\r\n', 20, 'Service length 30 minutes', 9),
(62, 'Callus Treatment\r\n\r\n', 29, 'Service length 45 minutes', 9),
(63, 'French Polish\r\n\r\n', 32, 'Service length 1 hour', 9),
(64, 'Collagen Mask', 25, 'Service length 45 minutes', 9),
(65, 'Organic Express Pedi\r\n\r\n', 76, 'Service length 30 - 55 minutes', 8),
(66, 'Aloe Vera Manicure\r\n\r\n', 55, 'Service length 45 minutes', 8),
(67, 'French Manicure\r\n\r\n', 100, 'Service length 25-35 minutes', 8),
(68, 'Callus Treatment\r\n\r\n', 50, 'Service length 30 minutes', 9),
(69, 'Collagen Mask\r\n\r\n', 45, 'Service length 20-30 minutes\r\n\r\n', 9),
(79, 'clean up', 66, 'good', 1),
(84, 'clean up', 70, 'good', 16);

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `Sno` bigint(50) NOT NULL,
  `appointment_id` int(50) NOT NULL,
  `bill_amount` bigint(50) NOT NULL,
  `discount_percent` int(20) NOT NULL,
  `bill_after_discount` int(20) NOT NULL,
  `adding_gst` int(50) NOT NULL,
  `round_off_bill` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`Sno`, `appointment_id`, `bill_amount`, `discount_percent`, `bill_after_discount`, `adding_gst`, `round_off_bill`) VALUES
(6, 25, 130, 7, 121, 143, 143);

-- --------------------------------------------------------

--
-- Table structure for table `business_hours`
--

CREATE TABLE `business_hours` (
  `id` int(11) NOT NULL,
  `day` varchar(20) NOT NULL,
  `open_time` time NOT NULL,
  `close_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `business_hours`
--

INSERT INTO `business_hours` (`id`, `day`, `open_time`, `close_time`) VALUES
(1, 'Monday', '10:00:00', '21:00:00'),
(2, 'Tuesday', '10:00:00', '21:00:00'),
(3, 'Wednesday', '10:00:00', '21:00:00'),
(4, 'Thursday', '10:00:00', '19:30:00'),
(5, 'Friday', '10:00:00', '21:00:00'),
(6, 'Saturday', '11:00:00', '17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `category_service`
--

CREATE TABLE `category_service` (
  `c_id` int(40) NOT NULL,
  `c_service` varchar(200) NOT NULL,
  `description` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category_service`
--

INSERT INTO `category_service` (`c_id`, `c_service`, `description`) VALUES
(1, 'Hair Services', 'It’s time to give your hair some love'),
(2, 'Beauty Services', 'Unleash your beauty with Reine Studio'),
(3, 'Hand & Feet services', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `enquiry_message`
--

CREATE TABLE `enquiry_message` (
  `id` int(35) NOT NULL,
  `name` varchar(35) NOT NULL,
  `email` varchar(200) NOT NULL,
  `about` varchar(35) NOT NULL,
  `message` varchar(40) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enquiry_message`
--

INSERT INTO `enquiry_message` (`id`, `name`, `email`, `about`, `message`, `created_at`) VALUES
(14, 'POOJA KHATRI', 'ananya@gmail.com', 'about timing', 'let me know about the timing', '2025-03-06 09:24:19'),
(15, 'Pari Kapoor', 'khatri@gmail.com', 'about timming', 'hello', '2025-03-11 11:00:12');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `appointment_id` int(11) NOT NULL,
  `totalPrice` decimal(10,2) NOT NULL,
  `discount` decimal(5,2) NOT NULL,
  `billing_number` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `appointment_id`, `totalPrice`, `discount`, `billing_number`, `created_at`) VALUES
(1, 1, 360.90, 10.00, '988167', '2025-03-25 06:42:37'),
(2, 1, 401.00, 10.00, '987517', '2025-03-25 06:49:01'),
(3, 1, 516.00, 10.00, '982058', '2025-03-25 06:52:59');

-- --------------------------------------------------------

--
-- Table structure for table `portfolio`
--

CREATE TABLE `portfolio` (
  `id` int(60) NOT NULL,
  `file` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `portfolio`
--

INSERT INTO `portfolio` (`id`, `file`) VALUES
(16, 'upload-images/bg-01.jpg'),
(19, 'upload-images/bg-02.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `comment` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `name`, `comment`) VALUES
(8, 'TARA', ' Absolutely loved my experience here! The staff is incredibly friendly, and the ambience is so relaxing. My facial left my skin glowing, and the haircut was just perfect. Highly recommended for anyone'),
(9, 'SHIKHA', ' This beauty parlour is a hidden gem! The hairstylists are experts, and the skincare treatments are amazing. My manicure and pedicure were done with great precision. I always leave feeling refreshed a'),
(10, 'Kavya ', ' Had a fantastic makeover session! The staff took great care in understanding my skin type and recommended the perfect treatment. The results were beyond my expectations. The hygiene standards are exc'),
(11, 'Pari Kapoor', ' I got my bridal makeup done here, and it was absolutely stunning! The makeup artists are professionals who know exactly how to enhance natural beauty. The products used were of high quality, and my l'),
(12, 'DIYA', ' Best beauty parlour I’ve ever visited! The waxing service was painless, and the massage was so relaxing. The atmosphere is clean and soothing. The team is professional and ensures you get the best ca'),
(17, 'POOJA KHATRI', ' service is nice'),
(18, 'divya singh', ' nice ');

-- --------------------------------------------------------

--
-- Table structure for table `staff_gallery`
--

CREATE TABLE `staff_gallery` (
  `id` int(60) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `designation` varchar(200) DEFAULT NULL,
  `file` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff_gallery`
--

INSERT INTO `staff_gallery` (`id`, `name`, `designation`, `file`) VALUES
(2, 'Pari Kapoor', 'Hair stylist', 'upload-images/hair_02.jpg'),
(3, 'shikha', 'Make up artist', 'upload-images/woman_08.jpg'),
(4, 'divya', 'nail artist', 'upload-images/nail_10.jpg'),
(6, 'pooja', 'Make up artist', 'upload-images/hair_11.jpg'),
(8, 'Pari Kapoor', 'Management ', 'upload-images/team-2.jpg'),
(9, 'shikha srivastava ', 'Management ', 'upload-images/team-5.jpg'),
(10, 'kavya singh', 'Hair Stylists', 'upload-images/team-6.jpg'),
(11, 'Nancy Verma', 'Hair Stylists', 'upload-images/team-3.jpg'),
(13, 'Diyva Kapoor', 'Hair Stylists', 'upload-images/team-8.jpg'),
(15, 'Avni', 'Hair Stylists', 'upload-images/team-10.jpg'),
(19, 'bhawna', 'Makeup Artists', 'upload-images/woman_05.jpg'),
(21, 'Pratigya Singh', 'Nail Artists', 'upload-images/team-9.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sub_category_service`
--

CREATE TABLE `sub_category_service` (
  `s_id` int(40) NOT NULL,
  `s_name` varchar(200) NOT NULL,
  `description` varchar(200) DEFAULT NULL,
  `sub_service` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sub_category_service`
--

INSERT INTO `sub_category_service` (`s_id`, `s_name`, `description`, `sub_service`) VALUES
(1, 'Cutting and Styling', NULL, 1),
(2, 'Hair treatment', NULL, 1),
(3, 'Hair Coloring', NULL, 1),
(4, 'Hair extension', NULL, 1),
(5, 'Skin Care and facial', NULL, 2),
(6, 'Body Waxing ', NULL, 2),
(7, 'Make up & Eyebrow', NULL, 2),
(8, 'Hand & feet', NULL, 3),
(9, 'Add on services', NULL, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_about`
--

CREATE TABLE `tb_about` (
  `id` int(40) NOT NULL,
  `page_title` varchar(35) NOT NULL,
  `page_description` varchar(400) NOT NULL,
  `page_content` varchar(400) DEFAULT NULL,
  `page_text` varchar(400) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_about`
--

INSERT INTO `tb_about` (`id`, `page_title`, `page_description`, `page_content`, `page_text`) VALUES
(1, '', '<p>hello hy</p>\r\n', NULL, NULL),
(2, 'Mind, Body and Soul', 'Demo salon where you will feel unique', 'Welcome to our Demo salon, where you’ll experience personalized beauty treatments in a sophisticated and relaxing atmosphere. Our expert team ensures that every visit leaves you feeling unique, pamper', 'Step into our luxury salon, where every detail is crafted to make you feel unique. Experience personalized beauty treatments in an elegant, serene environment. Our expert stylists and beauticians are '),
(3, 'Our Services', 'Feel Yourself More Beautiful', 'Embrace your beauty with our expert treatments, designed to enhance your natural features and make you feel radiant. Rediscover your confidence and step out looking and feeling your absolute best with', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_about_us`
--

CREATE TABLE `tb_about_us` (
  `id` int(200) NOT NULL,
  `page_title` varchar(200) DEFAULT NULL,
  `heading` varchar(200) DEFAULT NULL,
  `text_area` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_about_us`
--

INSERT INTO `tb_about_us` (`id`, `page_title`, `heading`, `text_area`) VALUES
(1, 'About Demo Studio', 'Demo salon where you will feel unique', '<p>Welcome to our Demo salon, where you&rsquo;ll experience personalized beauty treatments in a sophisticated and relaxing atmosphere. Our expert team ensures that every visit leaves you feeling unique, pampered, and confident with exceptional service tailored just for you.Step into our luxury salon, where every detail is crafted to make you feel unique. Experience personalized beauty treatments in an elegant, serene environment. Our expert stylists and beauticians are dedicated to providing you with exceptional service, ensuring that you leave feeling refreshed, rejuvenated, and truly one-of-a-kind.</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `tb_appointment`
--

CREATE TABLE `tb_appointment` (
  `id` int(35) NOT NULL,
  `name` varchar(35) NOT NULL,
  `email` varchar(35) NOT NULL,
  `mobile` bigint(35) NOT NULL,
  `address` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `prefered_time` varchar(35) NOT NULL,
  `appointment_for` varchar(35) NOT NULL,
  `staff` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_appointment`
--

INSERT INTO `tb_appointment` (`id`, `name`, `email`, `mobile`, `address`, `date`, `prefered_time`, `appointment_for`, `staff`) VALUES
(1, 'POOJA KHATRI', 'khatri@gmail.com', 8907843126, 'Hazratganj', '2025-03-10', '12:11:00', 'Hair Services', 'Kristin Cortes'),
(2, 'POOJA ', 'khatri@gmail.com', 8907843126, 'Hazratganj', '2025-03-10', '14:09:00', 'Hair Services', 'Kristin Cortes');

-- --------------------------------------------------------

--
-- Table structure for table `tb_contact_us`
--

CREATE TABLE `tb_contact_us` (
  `id` int(11) NOT NULL,
  `mobile_number` bigint(10) NOT NULL,
  `address` varchar(200) NOT NULL,
  `email_us` varchar(35) NOT NULL,
  `time` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_contact_us`
--

INSERT INTO `tb_contact_us` (`id`, `mobile_number`, `address`, `email_us`, `time`) VALUES
(1, 8907843120, '8721 M Central Avenue, Los Angeles, CA 90036', 'hello@yourdomain.com', '20:09');

-- --------------------------------------------------------

--
-- Table structure for table `tb_selected_services`
--

CREATE TABLE `tb_selected_services` (
  `id` int(11) NOT NULL,
  `appointment_id` int(35) NOT NULL,
  `service_name` varchar(255) NOT NULL,
  `service_price` decimal(10,2) NOT NULL,
  `billing_number` varchar(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `time` time DEFAULT curtime()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_selected_services`
--

INSERT INTO `tb_selected_services` (`id`, `appointment_id`, `service_name`, `service_price`, `billing_number`, `created_at`, `time`) VALUES
(1, 1, 'clean up', 66.00, '988167', '2025-03-25 06:42:37', '12:12:37'),
(2, 1, 'Hair & Scalp Treatments\r\n\r\n', 240.00, '988167', '2025-03-25 06:42:37', '12:12:37'),
(3, 1, 'Safe Color Treatment\r\n\r\n', 95.00, '988167', '2025-03-25 06:42:37', '12:12:37'),
(4, 1, 'clean up', 66.00, '987517', '2025-03-25 06:49:00', '12:19:00'),
(5, 1, 'Hair & Scalp Treatments\r\n\r\n', 240.00, '987517', '2025-03-25 06:49:00', '12:19:00'),
(6, 1, 'Safe Color Treatment\r\n\r\n', 95.00, '987517', '2025-03-25 06:49:01', '12:19:01'),
(7, 1, 'clean up', 66.00, '982058', '2025-03-25 06:52:59', '12:22:59'),
(8, 1, 'Child Hair cut ', 100.00, '982058', '2025-03-25 06:52:59', '12:22:59'),
(9, 1, 'Color Refresh', 130.00, '982058', '2025-03-25 06:52:59', '12:22:59'),
(10, 1, 'Balayage', 220.00, '982058', '2025-03-25 06:52:59', '12:22:59');

-- --------------------------------------------------------

--
-- Table structure for table `tb_services`
--

CREATE TABLE `tb_services` (
  `id` int(35) NOT NULL,
  `service_name` varchar(35) NOT NULL,
  `service_price` bigint(35) NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_services`
--

INSERT INTO `tb_services` (`id`, `service_name`, `service_price`, `creation_date`) VALUES
(30, 'WOMENS HAIR CUT', 3000, '2025-01-09 08:56:11'),
(31, 'CLEAN UP', 200, '2025-03-06 06:00:36'),
(32, 'MANICURE', 3000, '2025-02-15 07:01:40'),
(33, 'LASH APPLICATION', 20, '0000-00-00 00:00:00'),
(34, 'MENS HAIRCUT', 200, '0000-00-00 00:00:00'),
(35, 'FACIAL ', 200, '0000-00-00 00:00:00'),
(36, 'WAXING', 40000, '2025-02-17 06:44:47'),
(37, 'MANICURE', 3000, '2025-02-15 07:01:40'),
(84, 'spa6', 200, '2025-03-06 11:23:41'),
(86, 'spa', 200, '2025-03-10 08:31:39'),
(87, 'spa', 200, '2025-03-10 08:32:08');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(35) NOT NULL,
  `name` varchar(35) NOT NULL,
  `mobile` bigint(10) NOT NULL,
  `email` varchar(35) NOT NULL,
  `address` varchar(200) NOT NULL,
  `password` varchar(35) NOT NULL,
  `file` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `mobile`, `email`, `address`, `password`, `file`) VALUES
(3, 'pooja', 8707858421, 'info@demo.com', '321 , Location,City, State-222333', '123', 'upload-images/woman_05.jpg'),
(6, 'Sneha', 8907843117, 'Malhotra@gmail.com', ' RAJAJIPURAM', '123', 'upload-images/avatar2.png'),
(7, 'khanna', 8907843128, 'khanna@gmail.com', 'Alambhag', '123', 'upload-images/avatar3.png'),
(8, 'Angel ', 1234456789, 'john@gmail.com', 'Goa', '123', 'upload-images/avatar5.png'),
(18, 'kajol', 8907843126, 'kajol@gmail.com', 'alambhag', '123', ''),
(19, 'pooja', 8907843123, 'khatri@gmail.com', 'Hazratganj', '123', ''),
(20, 'sidhart', 8719858421, 'sidhart@gmail.com', 'Goa', '123', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login_details`
--
ALTER TABLE `admin_login_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `all_services`
--
ALTER TABLE `all_services`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`Sno`),
  ADD UNIQUE KEY `appointment_id` (`appointment_id`);

--
-- Indexes for table `business_hours`
--
ALTER TABLE `business_hours`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_service`
--
ALTER TABLE `category_service`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `enquiry_message`
--
ALTER TABLE `enquiry_message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portfolio`
--
ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff_gallery`
--
ALTER TABLE `staff_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_category_service`
--
ALTER TABLE `sub_category_service`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `tb_about`
--
ALTER TABLE `tb_about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_about_us`
--
ALTER TABLE `tb_about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_appointment`
--
ALTER TABLE `tb_appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_contact_us`
--
ALTER TABLE `tb_contact_us`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `tb_selected_services`
--
ALTER TABLE `tb_selected_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_services`
--
ALTER TABLE `tb_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login_details`
--
ALTER TABLE `admin_login_details`
  MODIFY `id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `all_services`
--
ALTER TABLE `all_services`
  MODIFY `a_id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `Sno` bigint(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `business_hours`
--
ALTER TABLE `business_hours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `category_service`
--
ALTER TABLE `category_service`
  MODIFY `c_id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `enquiry_message`
--
ALTER TABLE `enquiry_message`
  MODIFY `id` int(35) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `id` int(60) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `staff_gallery`
--
ALTER TABLE `staff_gallery`
  MODIFY `id` int(60) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `sub_category_service`
--
ALTER TABLE `sub_category_service`
  MODIFY `s_id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tb_about`
--
ALTER TABLE `tb_about`
  MODIFY `id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_about_us`
--
ALTER TABLE `tb_about_us`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_appointment`
--
ALTER TABLE `tb_appointment`
  MODIFY `id` int(35) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_selected_services`
--
ALTER TABLE `tb_selected_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_services`
--
ALTER TABLE `tb_services`
  MODIFY `id` int(35) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(35) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
