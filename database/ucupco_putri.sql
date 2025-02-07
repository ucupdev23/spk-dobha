-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 07, 2025 at 06:51 AM
-- Server version: 8.0.40-cll-lve
-- PHP Version: 8.3.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ucupco_putri`
--

-- --------------------------------------------------------

--
-- Table structure for table `alternatif_value`
--

CREATE TABLE `alternatif_value` (
  `id` int UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `value` int NOT NULL,
  `category_id` int NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `deleted` enum('yes','no') COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `alternatif_value`
--

INSERT INTO `alternatif_value` (`id`, `code`, `name`, `value`, `category_id`, `label`, `deleted`) VALUES
(1, 'c1', 'Penguasaan Jobdesk', 5, 1, 'Core Factor', 'no'),
(2, 'c2', 'Penguasaan Product Knowledge', 4, 1, 'Core Factor', 'no'),
(3, 'c3', 'Kreatif', 3, 1, 'Secondary Factor', 'no'),
(4, 'c4', 'Inovatif', 3, 1, 'Secondary Factor', 'no'),
(5, 'k1', 'Teliti', 4, 2, 'Core Factor', 'no'),
(6, 'k2', 'Disiplin', 3, 2, 'Core Factor', 'no'),
(7, 'k3', 'Bertanggung Jawab', 3, 2, 'Secondary Factor', 'no'),
(8, 'k4', 'Cepat dan Tepat', 3, 2, 'Core Factor', 'no'),
(9, 's1', 'Kejujuran', 4, 3, 'Core Factor', 'no'),
(10, 's2', 'Karakter', 4, 3, 'Secondary Factor', 'no'),
(11, 's3', 'Inisiatif', 3, 3, 'Core Factor', 'no'),
(12, 's4', 'Komunikasi', 4, 3, 'Core Factor', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `calculations`
--

CREATE TABLE `calculations` (
  `id` int UNSIGNED NOT NULL,
  `employee_id` int NOT NULL,
  `cf1` decimal(5,2) NOT NULL,
  `sf1` decimal(5,2) NOT NULL,
  `nkc` decimal(5,2) NOT NULL,
  `cf2` decimal(5,2) NOT NULL,
  `sf2` decimal(5,2) NOT NULL,
  `nk` decimal(5,2) NOT NULL,
  `cf3` decimal(5,2) NOT NULL,
  `sf3` decimal(5,2) NOT NULL,
  `nsk` decimal(5,2) NOT NULL,
  `ha` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `calculations`
--

INSERT INTO `calculations` (`id`, `employee_id`, `cf1`, `sf1`, `nkc`, `cf2`, `sf2`, `nk`, `cf3`, `sf3`, `nsk`, `ha`) VALUES
(1, 3, 4.50, 4.50, 4.50, 4.67, 4.50, 4.60, 4.83, 5.00, 4.90, 4.65),
(2, 5, 4.50, 4.00, 4.30, 4.83, 4.50, 4.70, 4.67, 3.00, 4.00, 4.33);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`) VALUES
(1, 'Aspek Kecerdasan'),
(2, 'Aspek Kinerja'),
(3, 'Aspek Sikap Kerja');

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE `divisions` (
  `division_id` int NOT NULL,
  `division_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `deleted` enum('yes','no') COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`division_id`, `division_name`, `deleted`) VALUES
(7, 'Manajemen', 'no'),
(8, 'Keuangan', 'no'),
(9, 'IT Dev', 'no'),
(10, 'Dobha Sales', 'no'),
(11, 'Marhaban Perfume', 'no'),
(12, 'Advertising', 'no'),
(13, 'Content Marketing', 'no'),
(14, 'Grase Perfumery', 'no'),
(15, 'Marhaban Store', 'no'),
(16, 'Nuansa Wangi', 'no'),
(17, 'Percetakan', 'no'),
(18, 'Produksi', 'no'),
(19, 'Salam Perfume', 'no'),
(20, 'Gelora Dobha', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `final_results`
--

CREATE TABLE `final_results` (
  `id` int UNSIGNED NOT NULL,
  `employee_id` int NOT NULL,
  `value` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gap_mappings`
--

CREATE TABLE `gap_mappings` (
  `id` int UNSIGNED NOT NULL,
  `employee_id` int NOT NULL,
  `ch1` int NOT NULL,
  `ch2` int NOT NULL,
  `ch3` int NOT NULL,
  `ch4` int NOT NULL,
  `kh1` int NOT NULL,
  `kh2` int NOT NULL,
  `kh3` int NOT NULL,
  `kh4` int NOT NULL,
  `sh1` int NOT NULL,
  `sh2` int NOT NULL,
  `sh3` int NOT NULL,
  `sh4` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gap_mappings`
--

INSERT INTO `gap_mappings` (`id`, `employee_id`, `ch1`, `ch2`, `ch3`, `ch4`, `kh1`, `kh2`, `kh3`, `kh4`, `sh1`, `sh2`, `sh3`, `sh4`) VALUES
(1, 3, -1, 0, 1, 1, 0, 1, 1, 1, 0, 0, 1, 0),
(2, 5, 0, -1, -1, -1, 0, 1, 1, 0, 0, -2, 0, -1),
(3, 17, 1, 0, 2, 2, 0, 2, 2, 1, 1, -1, 1, 0),
(4, 18, 2, 1, 1, 1, 1, 2, 2, 0, 1, -1, 1, -1),
(5, 20, -1, -1, 0, 0, -1, 1, 0, 0, -1, -1, 0, -3),
(6, 19, 1, 0, 0, 0, -3, -1, 0, -1, 0, -1, 0, -2),
(7, 8, 2, 1, 2, 2, 1, 1, 2, 2, 1, 0, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `log_login`
--

CREATE TABLE `log_login` (
  `id` int NOT NULL,
  `owner_id` bigint NOT NULL,
  `user_id` int NOT NULL,
  `pelanggan_id` int NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `otp` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `log_login`
--

INSERT INTO `log_login` (`id`, `owner_id`, `user_id`, `pelanggan_id`, `email`, `otp`, `created_at`, `updated_at`) VALUES
(1, 0, 1, 0, 'yusufapdil53@gmail.com', '254984', '2024-07-30 02:13:31', '2024-07-30 02:13:31'),
(2, 0, 1, 0, 'yusufapdil53@gmail.com', '744707', '2024-07-30 02:26:52', '2024-07-30 02:26:52'),
(3, 0, 1, 0, 'yusufapdil53@gmail.com', '268891', '2024-07-30 06:23:36', '2024-07-30 06:23:36'),
(4, 0, 1, 0, 'yusufapdil53@gmail.com', '149893', '2024-07-30 06:26:20', '2024-07-30 06:26:20'),
(5, 0, 1, 0, 'yusufapdil53@gmail.com', '192541', '2024-07-30 12:06:55', '2024-07-30 12:06:55');

-- --------------------------------------------------------

--
-- Table structure for table `mappings`
--

CREATE TABLE `mappings` (
  `id` int UNSIGNED NOT NULL,
  `employee_id` int NOT NULL,
  `c1` int NOT NULL,
  `c2` int NOT NULL,
  `c3` int NOT NULL,
  `c4` int NOT NULL,
  `k1` int NOT NULL,
  `k2` int NOT NULL,
  `k3` int NOT NULL,
  `k4` int NOT NULL,
  `s1` int NOT NULL,
  `s2` int NOT NULL,
  `s3` int NOT NULL,
  `s4` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mappings`
--

INSERT INTO `mappings` (`id`, `employee_id`, `c1`, `c2`, `c3`, `c4`, `k1`, `k2`, `k3`, `k4`, `s1`, `s2`, `s3`, `s4`) VALUES
(1, 3, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4),
(2, 5, 3, 3, 2, 2, 4, 4, 4, 3, 4, 2, 3, 3),
(3, 17, 4, 4, 5, 5, 4, 5, 5, 4, 5, 3, 4, 4),
(4, 18, 5, 5, 4, 4, 5, 5, 5, 3, 5, 3, 4, 3),
(5, 20, 2, 3, 3, 3, 3, 4, 3, 3, 3, 3, 3, 1),
(6, 19, 4, 4, 3, 3, 1, 2, 3, 2, 4, 3, 3, 2),
(7, 8, 5, 5, 5, 5, 5, 4, 5, 5, 5, 4, 5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `position_id` int NOT NULL,
  `division_id` int NOT NULL,
  `position_name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `deleted` enum('yes','no') COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`position_id`, `division_id`, `position_name`, `deleted`) VALUES
(1, 7, 'General Manager', 'no'),
(7, 8, 'Staff', 'no'),
(9, 9, 'Supervisor', 'no'),
(10, 9, 'Staff', 'no'),
(11, 10, 'Manager', 'no'),
(12, 10, 'Supervisor', 'no'),
(13, 10, 'CS / Sales Online', 'no'),
(14, 11, 'Manager', 'no'),
(15, 11, 'Supervisor', 'no'),
(17, 12, 'Advertiser & Web Dev', 'no'),
(18, 13, 'Supervisor', 'no'),
(19, 13, 'Staff Marketing', 'no'),
(20, 8, 'Supervisor', 'no'),
(21, 10, 'Staff Gudang', 'no'),
(22, 10, 'Staff Umum', 'no'),
(23, 20, 'Supervisor', 'no'),
(24, 20, 'Staff Umum', 'no'),
(25, 10, 'Staff Toko', 'no'),
(26, 11, 'Staff  Toko', 'no'),
(27, 11, 'Staff Gudang', 'no'),
(28, 11, 'Staff Umum', 'no'),
(29, 16, 'Supervisor', 'no'),
(30, 16, 'CS / Sales Online', 'no'),
(31, 16, 'Staff Umum', 'no'),
(32, 16, 'Staff Toko', 'no'),
(33, 19, 'Supervisor', 'no'),
(34, 19, 'CS / Sales Online', 'no'),
(35, 19, 'Staff Toko', 'no'),
(36, 17, 'Manager', 'no'),
(37, 17, 'Operator Mesin', 'no'),
(38, 17, 'Staff Operasional', 'no'),
(39, 17, 'Staff Desain', 'no'),
(40, 17, 'Ass. Operator Mesin', 'no'),
(41, 15, 'Supervisor', 'no'),
(42, 15, 'CS / Sales Online', 'no'),
(43, 15, 'Staff Toko', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `nip` int NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `division_id` int NOT NULL,
  `position_id` int NOT NULL,
  `supervisor_id` int NOT NULL,
  `deleted` enum('yes','no') COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `nip`, `image`, `email`, `password`, `division_id`, `position_id`, `supervisor_id`, `deleted`) VALUES
(1, 'Teh Putri', 65194066, '', 'putridanty14@gmail.com', '751cb3f4aa17c36186f4856c8982bf27', 7, 1, 0, 'no'),
(2, 'Deni Muharam', 61068397, '', 'denimuharam87@gmail.com', '040b7cf4a55014e185813e0644502ea9', 7, 1, 0, 'no'),
(3, 'Arif Rahman Hakim', 40442634, '', 'ar.rahman2292@gmail.com', '751cb3f4aa17c36186f4856c8982bf27', 9, 9, 2, 'no'),
(4, 'Ihkam Hashfi Rasyidin', 15206159, '', 'hashfieihkam07@gmail.com', 'tidak ada password', 9, 10, 1, 'no'),
(5, 'Didin Muhidin', 37097542, '', 'dmuhidin49@gmail.com', '751cb3f4aa17c36186f4856c8982bf27', 10, 11, 2, 'no'),
(6, 'Irman Hermawan', 90467601, '', 'hrstore00@gmail.com', 'tidak ada password', 10, 12, 1, 'no'),
(7, 'Emat Suhermat', 18509897, '', 'emat.suhermat090820@gmail.com', 'tidak ada password', 10, 13, 1, 'no'),
(8, 'M. Arif Firmansyah', 89260111, '', 'm.ariffirmansyah90@gmail.com', '751cb3f4aa17c36186f4856c8982bf27', 11, 14, 2, 'no'),
(9, 'Isep Parhan', 30192011, '', 'isepparhan@gmail.com', 'tidak ada password', 11, 15, 1, 'no'),
(10, 'Afryan Muhammad Ramdhan', 99135241, '', 'grabzulfa@gmail.com', 'tidak ada password', 10, 13, 1, 'no'),
(11, 'Agus Ilham', 29715946, '', 'agusannaba78@gmail.com', 'tidak ada password', 10, 21, 1, 'no'),
(12, 'Alviansyah Suryadi', 70868290, '', 'alsuryadialpin@gmail.com', 'tidak ada password', 10, 22, 1, 'no'),
(13, 'Alwi M. Alaydrus', 41017710, '', 'weiemocore1603@gmail.com', 'tidak ada password', 10, 25, 1, 'no'),
(14, 'Syamil Alimuddin Fatkhan', 90578771, '', 'syamilalimudin99@gmail.com', 'tidak ada password', 10, 13, 1, 'no'),
(15, 'Ikra Jaya', 28663785, '', 'ikrajaya15@gmail.com', 'tidak ada password', 10, 25, 1, 'no'),
(16, 'M. Shafwan Zaky', 58819435, '', 'zakyshafwan21@gmail.com', 'tidak ada password', 10, 13, 1, 'no'),
(17, 'Uswatun Hasanah Makkulawu', 69958680, '', 'uh7271062@gmail.com', '751cb3f4aa17c36186f4856c8982bf27', 13, 18, 2, 'no'),
(18, 'Abdul Halim Arrifai', 74634258, '', 'halimabdul708@gmail.com', '751cb3f4aa17c36186f4856c8982bf27', 8, 20, 2, 'no'),
(19, 'Syafiq', 52399071, '', 'syafiqdobha16@gmail.com', '751cb3f4aa17c36186f4856c8982bf27', 15, 41, 2, 'no'),
(20, 'Asep Radistya', 64332279, '', 'asepradistya07@gmail.com', '751cb3f4aa17c36186f4856c8982bf27', 20, 23, 2, 'no'),
(21, 'Halo Guys', 38535662, '', 'test@gmail.com', 'tidak ada password', 17, 39, 1, 'no');

-- --------------------------------------------------------

--
-- Table structure for table `weight_values`
--

CREATE TABLE `weight_values` (
  `id` int UNSIGNED NOT NULL,
  `employee_id` int NOT NULL,
  `ck1` decimal(3,1) NOT NULL,
  `ck2` decimal(3,1) NOT NULL,
  `ck3` decimal(3,1) NOT NULL,
  `ck4` decimal(3,1) NOT NULL,
  `kk1` decimal(3,1) NOT NULL,
  `kk2` decimal(3,1) NOT NULL,
  `kk3` decimal(3,1) NOT NULL,
  `kk4` decimal(3,1) NOT NULL,
  `sk1` decimal(3,1) NOT NULL,
  `sk2` decimal(3,1) NOT NULL,
  `sk3` decimal(3,1) NOT NULL,
  `sk4` decimal(3,1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `weight_values`
--

INSERT INTO `weight_values` (`id`, `employee_id`, `ck1`, `ck2`, `ck3`, `ck4`, `kk1`, `kk2`, `kk3`, `kk4`, `sk1`, `sk2`, `sk3`, `sk4`) VALUES
(1, 3, 4.0, 5.0, 4.5, 4.5, 5.0, 4.5, 4.5, 4.5, 5.0, 5.0, 4.5, 5.0),
(2, 5, 5.0, 4.0, 4.0, 4.0, 5.0, 4.5, 4.5, 5.0, 5.0, 3.0, 5.0, 4.0),
(3, 17, 4.5, 5.0, 3.5, 3.5, 5.0, 3.5, 3.5, 4.5, 4.5, 4.0, 4.5, 5.0),
(4, 18, 3.5, 4.5, 4.5, 4.5, 4.5, 3.5, 3.5, 5.0, 4.5, 4.0, 4.5, 4.0),
(5, 20, 4.0, 4.0, 5.0, 5.0, 4.0, 4.5, 5.0, 5.0, 4.0, 4.0, 5.0, 2.0),
(6, 19, 4.5, 5.0, 5.0, 5.0, 2.0, 4.0, 5.0, 4.0, 5.0, 4.0, 5.0, 3.0),
(7, 8, 3.5, 4.5, 3.5, 3.5, 4.5, 4.5, 3.5, 3.5, 4.5, 5.0, 3.5, 4.5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternatif_value`
--
ALTER TABLE `alternatif_value`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `calculations`
--
ALTER TABLE `calculations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `divisions`
--
ALTER TABLE `divisions`
  ADD PRIMARY KEY (`division_id`);

--
-- Indexes for table `final_results`
--
ALTER TABLE `final_results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gap_mappings`
--
ALTER TABLE `gap_mappings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_login`
--
ALTER TABLE `log_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mappings`
--
ALTER TABLE `mappings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`position_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `weight_values`
--
ALTER TABLE `weight_values`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alternatif_value`
--
ALTER TABLE `alternatif_value`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `calculations`
--
ALTER TABLE `calculations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `divisions`
--
ALTER TABLE `divisions`
  MODIFY `division_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `final_results`
--
ALTER TABLE `final_results`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gap_mappings`
--
ALTER TABLE `gap_mappings`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `log_login`
--
ALTER TABLE `log_login`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `mappings`
--
ALTER TABLE `mappings`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `position_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `weight_values`
--
ALTER TABLE `weight_values`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
