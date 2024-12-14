-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2024 at 08:57 PM
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
-- Database: `useradmin`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `profile_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `role`, `name`, `birth_date`, `profile_image`) VALUES
(69, 'khaled@gmail.com', '$2y$10$7uG4aMIO5.u0nOAXdHe7NefrUHqBaAu/cuK61pJ6xTffY2I29OvhC', 1, 'Khaled', '2024-12-02', NULL),
(80, 'bou7mid2@gmail.com', '$2y$10$57A/PX1pUCmTXrZ1f/hEbuIUZDks9/xYNlvaBSm/UwjPJvaJtJ1EC', 0, 'Bouhmid', '2024-12-01', '../uploads/ala.jpg'),
(84, 'hedi@gmail.com', '$2y$10$6EUWCFvLustMWOnFxSmMuuzEYbXc3Om4q2ahIibrPdnOViM/r6PPO', 1, 'hedi trabelsi', '2025-01-01', NULL),
(86, 'alabenhssine6@gmail.com', '$2y$10$VHMtOwgRe6In.k3Q3aGOgu0RnxkD7vGAa9oeNFosETT4Id5NOdJyq', 0, 'Ala Eddine', '2024-11-30', '../uploads/circle silhouette.png'),
(88, 'alaeddine.benhssine@esprit.tn', '$2y$10$Tit3Q9FLE0EW6QU.rep5NetxvJ6Bn.8kXI5VDVZo7rkKzE/K/jX5S', 1, 'Aladin', '2024-11-28', NULL),
(89, 'aaa@gmail.com', '$2y$10$CoVGZDEFqgipHBA.xhvUtOSRSM9OFJzsHYRD3awrR4tUtae/reYWW', 0, 'aaa', '2024-11-29', '../uploads/ala.jpg'),
(90, 'bbb@gmail.com', '$2y$10$x/MIHjfQujIJ/jTjehfwyeZocA2bsX62piW7qKV2jG.rO8jKdjQvm', 1, 'Ala', '2024-12-04', NULL),
(92, 'aziz2@gmail.com', '$2y$10$yrZFuUN.8k0cIxfUaWicCuCKHJ38m9V1w12T80rcd26bFqVLP7FmS', 1, 'calypso', '2024-12-22', NULL),
(94, 'ccc@gmail.com', '$2y$10$/iNpeHG.ibvCtkEP12Bfp.0AIstq6sva18oi9yCPm8V98c1z24DLu', 0, 'ccc', '2024-12-07', '../uploads/bg.png'),
(95, 'admin@gmail.com', '$2y$10$8hLJGYV/G.oIFCHcNQE1quvML4s9sAABD1oI0jp0fAboCxxpUW.HC', 1, 'admin123', '2024-12-07', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
