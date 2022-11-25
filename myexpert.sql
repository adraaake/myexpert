-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2022 at 10:47 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myexpert`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(6) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`) VALUES
(1, 'admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `gps_track`
--

CREATE TABLE `gps_track` (
  `rider_id` bigint(20) NOT NULL,
  `track_time` datetime NOT NULL DEFAULT current_timestamp(),
  `track_lng` decimal(11,7) NOT NULL,
  `track_lat` decimal(11,7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `login_sp`
--

CREATE TABLE `login_sp` (
  `sp_id` int(6) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `service_package`
--

CREATE TABLE `service_package` (
  `s_id` int(6) NOT NULL,
  `s_name` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `service_package`
--

INSERT INTO `service_package` (`s_id`, `s_name`, `category`, `description`, `price`) VALUES
(3, 'Deep Cleaning 2', 'Car Cleaning', 'Vacuum, wash etc', 'RM80');

-- --------------------------------------------------------

--
-- Table structure for table `sp_members`
--

CREATE TABLE `sp_members` (
  `sp_id` int(6) NOT NULL,
  `f_name` varchar(255) NOT NULL,
  `l_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `ic_num` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobilehp` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `c_name` varchar(255) NOT NULL,
  `service` varchar(255) NOT NULL,
  `w_exp` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `prof_image` varchar(100) NOT NULL,
  `city` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sp_members`
--

INSERT INTO `sp_members` (`sp_id`, `f_name`, `l_name`, `username`, `password`, `ic_num`, `email`, `mobilehp`, `address`, `c_name`, `service`, `w_exp`, `status`, `prof_image`, `city`) VALUES
(11, 'Adriana Farhana', 'Abd Talib', 'ady', 'ady123', '000227020584', 'ady@gmail.com', '0198379802', 'itaewon korea', 'Ady Hebat', 'Home Cleaning', 'None', 'Pending', 'siti.jpeg', ''),
(12, 'Muhammad Faris', 'Abd Talib', 'qwerty123', 'qwerty123', '009222029', 'qwerty@gmail.com', '02928292', 'ahssdabsj', 'sss', 'carcleaning', 'sss', 'Pending', 'arfah.jpeg', 'Ahmednagar'),
(13, 'Muhammad Faris', 'Abd Talib', 'faris', 'faris123', '00098227722929', 'faris@yahoo.com', '0192838392', 'das', 'sss', 'Home Cleaning', 'sss', 'Pending', 'WhatsApp Image 2022-10-31 at 11.26.05 AM.jpeg', 'Ahmednagar'),
(17, 'Muhammad Faris', 'Abd Talib', 'qwerty123', 'qwerty123', '8971926249', 'qwerty@gmail.com', '0139788093', 'kubang kerian', 'gabang', 'Car Cleaning', '3 Years Repairing', 'Pending', 'arfah.jpeg', 'Ahmednagar'),
(18, 'Muhammad Faris', 'Abd Talib', 'qwerty123', 'qwerty123', '8971926249', 'qwerty@gmail.com', '0139788093', 'kubang kerian', 'gabang', 'Car Cleaning', '3 Years Repairing', 'Pending', 'arfah.jpeg', 'Ahmednagar'),
(19, 'adriana', 'farhana', 'ady123', 'ady123', '016354785269', 'ady123@gmail.com', '0189563254', 'jalan kuchking', 'anterps', 'Beauty Treatment', '5 years in makeup artist', 'Pending', 'WhatsApp Image 2022-10-31 at 11.26.05 AM.jpeg', 'Ahmednagar'),
(20, 'acop', 'ka', 'acopka', 'acop123', '1234567890', 'acopka@gmail.com', '01236547898', 'jalan teman', 'barstuck', 'Appliance Repair', '5 yers', 'Pending', 'WhatsApp Image 2022-10-31 at 11.24.57 AM.jpeg', 'Ahmednagar'),
(21, 'asyrof', 'khairul anuar', 'asyrofka', 'acop1234', '013265478951', 'acopkai@gmail.com', '0145896325', 'jalan teman', 'bekars', 'Home Cleaning', 'Takde', 'Pending', 'siti.jpeg', 'Ahmednagar'),
(22, 'acopkaweawe', 'aoddahskd', 'soaijdbawuif', '0123456789', '012563478951', 'asdop@gmail.com', '019-25459632', 'asdowjndahos', 'flourasldas', 'Appliance Repair', 'Takde', 'Pending', 'arfah.jpeg', 'Ahmednagar'),
(23, 'Muhammad Faris', 'farhana', 'adinladen', '21341234', '123421341234', '123421342@112342134', '1234234213412324', 'asdnkwaodnas', 'bluererasd', 'Car Cleaning', 'sss', 'Pending', 'siti.jpeg', 'Ahmednagar');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `gps_track`
--
ALTER TABLE `gps_track`
  ADD PRIMARY KEY (`rider_id`),
  ADD KEY `track_time` (`track_time`);

--
-- Indexes for table `login_sp`
--
ALTER TABLE `login_sp`
  ADD PRIMARY KEY (`sp_id`);

--
-- Indexes for table `service_package`
--
ALTER TABLE `service_package`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `sp_members`
--
ALTER TABLE `sp_members`
  ADD PRIMARY KEY (`sp_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `login_sp`
--
ALTER TABLE `login_sp`
  MODIFY `sp_id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `service_package`
--
ALTER TABLE `service_package`
  MODIFY `s_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sp_members`
--
ALTER TABLE `sp_members`
  MODIFY `sp_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
