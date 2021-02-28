-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2021 at 06:08 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydata`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `date`) VALUES
(7, 'admin', 'admin', '2021-02-08 03:25:37');

-- --------------------------------------------------------

--
-- Table structure for table `hasiltembak`
--

CREATE TABLE `hasiltembak` (
  `id` int(11) NOT NULL,
  `joki` varchar(255) NOT NULL,
  `nmalamat` varchar(255) NOT NULL,
  `merchant` varchar(255) NOT NULL,
  `barang` varchar(255) NOT NULL,
  `jumlah` varchar(255) NOT NULL,
  `harga` varchar(255) NOT NULL,
  `fee` varchar(250) NOT NULL,
  `resi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hasiltembak`
--

INSERT INTO `hasiltembak` (`id`, `joki`, `nmalamat`, `merchant`, `barang`, `jumlah`, `harga`, `fee`, `resi`) VALUES
(103, 'Surati', 'Vila Dago', 'Lazada', 'Renot', '2', '1,200,000', '12,000', '41243213412123'),
(107, 'Kuroni', 'Demak', 'Lazada', 'Infinix ', '1', '1,800,200', '12,000', '213242424242'),
(115, 'Nurul', 'Bandung', 'Lazada', 'Renot', '1', '1,200,000', '0', '3213123421421'),
(116, 'Weni', 'Bandung', 'Lazada', 'Renot', '1', '1,200,000', '0', '4124123123122'),
(117, 'Reno', 'Bandung', 'Lazada', 'Renot', '1', '1,200,000', '0', '31232131231232'),
(205, 'Surya', 'Vila Dago', 'Lazada', 'Renot', '1', '1,200,222', '0', '4321543615243'),
(206, 'Surya', 'Vila Dago', 'Lazada', 'Renot', '1', '1,200,222', '0', '231234214123'),
(207, 'Surya', 'Petompon', 'Lazada', 'Renot ', '1', '1,999,000', '0', '321321421412'),
(208, 'Surya', 'Petompon', 'Lazada', 'Renot ', '1', '1,999,000', '0', '212312312424'),
(209, 'Surya', 'Bandung', 'Lazada', 'Renot', '1', '2,100,000', '0', '231234124213'),
(210, 'Surya', 'Bandung', 'Lazada', 'Renot', '1', '2,100,000', '0', '4232131231231'),
(211, 'Surya', 'Bandung', 'Lazada', 'Renot ', '1', '1,333,222', '0', '213213123421'),
(212, 'Surya', 'Bandung', 'Lazada', 'Renot ', '1', '1,333,222', '0', '243243123124');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` bigint(20) NOT NULL,
  `nama_lengkap` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `bank` varchar(255) DEFAULT NULL,
  `no_akun` text DEFAULT NULL,
  `nm_akun` varchar(255) DEFAULT NULL,
  `ovo` text DEFAULT NULL,
  `gopay` text DEFAULT NULL,
  `dana` text DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `nama_lengkap`, `email`, `password`, `bank`, `no_akun`, `nm_akun`, `ovo`, `gopay`, `dana`, `date`) VALUES
(1254052994557, 'Kurnia', 'jiwas@gmail.com', 'radeakui', NULL, NULL, NULL, NULL, NULL, NULL, '2021-02-04 04:30:59'),
(47756845024, 'Surya', 'radea.surya1@gmail.com', 'radea', 'Mandiri', '', '', '', '', '', '2021-02-15 04:07:42'),
(2669116, 'Aras', 'qwerty@gmail.com', 'radeakui12', NULL, NULL, NULL, NULL, NULL, NULL, '2021-02-15 04:09:46'),
(17297462, 'Mojang Popandan', 'mojang@gmail.com', 'iloveyou', 'BCA', '0987', 'Radea Surya', '087574367425754', '087574367425754', '087574367425754', '2021-02-15 08:44:45'),
(15746029824136, 'Adit Muna', 'muna@gmail.com', 'radea123', NULL, NULL, NULL, NULL, NULL, NULL, '2021-02-15 08:45:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hasiltembak`
--
ALTER TABLE `hasiltembak`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD KEY `user_id` (`user_id`),
  ADD KEY `date` (`date`),
  ADD KEY `user_name` (`nama_lengkap`(768)),
  ADD KEY `password` (`password`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `hasiltembak`
--
ALTER TABLE `hasiltembak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=213;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
