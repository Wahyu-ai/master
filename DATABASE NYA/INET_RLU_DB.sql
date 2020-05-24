-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 24, 2020 at 10:44 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `INET_RLU_DB`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_akun`
--

CREATE TABLE `tbl_akun` (
  `ak_id` int(11) NOT NULL,
  `ak_nama` varchar(100) CHARACTER SET utf8 NOT NULL,
  `ak_username` varchar(20) NOT NULL,
  `ak_password` varchar(100) NOT NULL,
  `ak_level` int(1) NOT NULL COMMENT '1: administrator, 2 : Manager, 3: KTU',
  `ak_site_id` int(10) NOT NULL,
  `ak_status` int(1) NOT NULL DEFAULT 1 COMMENT '0 : not, 1 : active',
  `ak_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `ak_updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_akun`
--

INSERT INTO `tbl_akun` (`ak_id`, `ak_nama`, `ak_username`, `ak_password`, `ak_level`, `ak_site_id`, `ak_status`, `ak_created`, `ak_updated`) VALUES
(1, 'Rean Andrean', 'rean_andrean', 'e10adc3949ba59abbe56e057f20f883e', 1, 1, 1, '2020-05-22 15:08:49', '2020-05-24 06:22:08'),
(2, 'Nama Manager', 'manager', 'e10adc3949ba59abbe56e057f20f883e', 2, 1, 1, '2020-05-23 16:52:33', '2020-05-23 17:21:03'),
(3, 'Marapul', 'marapul', 'e10adc3949ba59abbe56e057f20f883e', 3, 1, 1, '2020-05-23 16:52:33', '2020-05-23 17:21:03');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_site`
--

CREATE TABLE `tbl_site` (
  `st_id` int(11) NOT NULL,
  `st_nama_site` varchar(100) NOT NULL,
  `st_bgcolor` varchar(10) NOT NULL COMMENT 'warna hexa',
  `st_bgcolor_hover` varchar(10) NOT NULL COMMENT 'warna hexa'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_site`
--

INSERT INTO `tbl_site` (`st_id`, `st_nama_site`, `st_bgcolor`, `st_bgcolor_hover`) VALUES
(1, 'Jambi', '#4e73df', '#2e59d9'),
(2, 'Riau', '#36b9cc', '#2c9faf'),
(3, 'Kalimantan Timur', '#1cc88a', '#17a673');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users_inet`
--

CREATE TABLE `tbl_users_inet` (
  `ui_id` int(11) NOT NULL,
  `ui_nama_user` varchar(100) NOT NULL,
  `ui_mac_address` varchar(50) NOT NULL,
  `ui_site_id` int(10) NOT NULL,
  `ui_atasan_id` int(10) NOT NULL,
  `ui_status` int(1) NOT NULL COMMENT '0 : not, 1 : approved',
  `ui_tgl_terdaftar` datetime DEFAULT current_timestamp(),
  `ui_tgl_approved` datetime DEFAULT NULL,
  `ui_manager_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_users_inet`
--

INSERT INTO `tbl_users_inet` (`ui_id`, `ui_nama_user`, `ui_mac_address`, `ui_site_id`, `ui_atasan_id`, `ui_status`, `ui_tgl_terdaftar`, `ui_tgl_approved`, `ui_manager_id`) VALUES
(1, 'Jumani', '11:22:33:44', 2, 1, 1, '2020-05-23 15:27:23', '2020-05-23 15:12:29', 2),
(2, 'Bagus Sadewo', '10-11-22-33-44-55', 1, 1, 0, '2020-05-13 04:08:10', '2020-05-24 00:26:51', 2),
(3, 'Monos Bakoto', '10-11-22-33-44-55', 1, 1, 1, '2020-05-24 00:00:00', '2020-05-24 13:22:24', 2),
(4, 'Jamiko', '10-11-22-33-44-55', 1, 1, 1, '2020-05-23 11:05:23', '2020-05-24 00:21:23', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_akun`
--
ALTER TABLE `tbl_akun`
  ADD PRIMARY KEY (`ak_id`);

--
-- Indexes for table `tbl_site`
--
ALTER TABLE `tbl_site`
  ADD PRIMARY KEY (`st_id`);

--
-- Indexes for table `tbl_users_inet`
--
ALTER TABLE `tbl_users_inet`
  ADD PRIMARY KEY (`ui_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_akun`
--
ALTER TABLE `tbl_akun`
  MODIFY `ak_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_site`
--
ALTER TABLE `tbl_site`
  MODIFY `st_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_users_inet`
--
ALTER TABLE `tbl_users_inet`
  MODIFY `ui_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
