-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 14 Ian 2018 la 23:02
-- Versiune server: 10.1.28-MariaDB
-- PHP Version: 7.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `todo`
--

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `to_do_data`
--

CREATE TABLE `to_do_data` (
  `id` int(15) NOT NULL,
  `user_id` int(15) NOT NULL,
  `text_todo` varchar(255) NOT NULL,
  `is_done` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Salvarea datelor din tabel `to_do_data`
--

INSERT INTO `to_do_data` (`id`, `user_id`, `text_todo`, `is_done`) VALUES
(33, 7, 'dgf', NULL),
(34, 7, 'dgfe1211', NULL),
(50, 5, '', NULL),
(51, 5, 'sfasa asfqeqw  44', NULL),
(54, 7, 'qqq', NULL),
(56, 5, 'asd121212 qqq', NULL),
(58, 5, 'dwqeqw 111', NULL);

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  `created_at` datetime NOT NULL,
  `token` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Salvarea datelor din tabel `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `created_at`, `token`) VALUES
(4, 'marius', 'marius.ioance95@gmail.com', '$2y$10$w6okIVroekM6xmuk1xfWouqaJP03KHf2E3EK9kR6JU3xbZpHUlgx.', '2017-12-09 15:41:15', ''),
(5, 'admin', 'admin@admin.com', '$2y$10$0SUMggMlFz1ffKwRz9v5wOmBg06ERyrgA9MNafO1NDGUbWZjHnWlW', '2017-12-17 09:38:39', '6b798c69e1f7b9a55ffe'),
(6, 'sadasdasdasda', 'asdas@asd.com', '$2y$10$HZk/2wzasV2bTDGCWrD18OtcZ2Xwt14rSG0.hkSTS415QVFyzi4D6', '2018-01-01 14:57:19', ''),
(7, 'ceva', 'ceav@ceva.com', '$2y$10$dCIvXghOhAfAIgW1enOvVOywDi8TlE2C9N/somohn5ODU1R1emhmm', '2018-01-01 16:39:33', 'dd127171a93179850464'),
(8, 'qwewqeqw', 'qweqwe@asd.com', '$2y$10$Dhl5vXvvs/ExVuIHm0mRmelOJATqR/T8lSVz3BX3LbyVPQRIcLlcG', '2018-01-01 16:42:00', ''),
(9, '213123', 'aweqw@sad.co', '$2y$10$zzWEGLsfh29GgTAZphc4g.iRr09onXsgFef9A.ey64ToXtrG1bPLy', '2018-01-01 16:42:30', ''),
(10, 'qwe12', '12312@sadq.caa', '$2y$10$2e9kRusqSLuI0Q.KNwEuD.OnaQ2kCnV4sNtupWlGqkAwjnocKj/z.', '2018-01-01 16:45:21', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `to_do_data`
--
ALTER TABLE `to_do_data`
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
-- AUTO_INCREMENT for table `to_do_data`
--
ALTER TABLE `to_do_data`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
