-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 14, 2023 at 07:15 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fairvote`
--

DELIMITER $$
--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `reset_data` () RETURNS TINYINT(1) BEGIN
    -- Menghapus semua data dari tabel 'histori'
    DELETE FROM history;

    -- Mengatur nilai semua kolom 'voting' pada tabel 'option' menjadi 0
    UPDATE option SET voting = 0;

    -- Mengatur nilai semua kolom 'voting_count' pada tabel 'vote' menjadi 0
    UPDATE vote SET voting_count = 0;

    RETURN TRUE;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id_history` int(11) NOT NULL,
  `username_history` varchar(24) NOT NULL,
  `share_code_history` varchar(8) NOT NULL,
  `id_option` int(1) NOT NULL,
  `datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id_history`, `username_history`, `share_code_history`, `id_option`, `datetime`) VALUES
(42, 'admin', '3mfgx4', 9, '2023-08-11 11:48:55'),
(43, 'admin', '416277', 8, '2023-08-11 11:49:27'),
(45, 'admin', 'vkqgs1', 16, '2023-08-11 11:49:55'),
(46, 'admin', 'vxpmf2', 5, '2023-08-11 11:50:08'),
(47, 'admin', 'y1zr7m', 11, '2023-08-11 11:50:21'),
(48, 'admin1', 'y1zr7m', 12, '2023-08-11 11:52:52'),
(49, 'admin1', 'vxpmf2', 5, '2023-08-11 11:53:18'),
(50, 'admin1', 'vkqgs1', 14, '2023-08-11 11:53:33'),
(52, 'admin1', '416277', 8, '2023-08-11 11:54:20'),
(53, 'admin1', '3mfgx4', 9, '2023-08-11 11:54:36'),
(54, 'admin2', '3mfgx4', 10, '2023-08-11 11:54:52'),
(55, 'admin2', '416277', 7, '2023-08-11 11:55:03'),
(57, 'admin2', 'vkqgs1', 19, '2023-08-11 11:55:39'),
(58, 'admin2', 'vxpmf2', 5, '2023-08-11 11:55:52'),
(59, 'admin2', 'y1zr7m', 12, '2023-08-11 11:56:04'),
(60, 'fariski', '3mfgx4', 10, '2023-08-12 06:12:21'),
(61, 'fariski', '416277', 7, '2023-08-12 06:12:59'),
(63, 'fariski', 'vkqgs1', 14, '2023-08-12 06:13:31'),
(64, 'fariski', 'vxpmf2', 5, '2023-08-12 06:13:54'),
(65, 'fariski', 'y1zr7m', 12, '2023-08-12 06:14:12'),
(66, 'pandji', 'vxpmf2', 6, '2023-08-12 15:27:49');

--
-- Triggers `history`
--
DELIMITER $$
CREATE TRIGGER `after_delete_history` AFTER DELETE ON `history` FOR EACH ROW BEGIN
    DECLARE option_id INT;
    DECLARE share_code VARCHAR(8);
    
    -- Ambil nilai id_option dan share_code_history sebelum data dihapus
    SET option_id = OLD.id_option;
    SET share_code = OLD.share_code_history;
    
    -- Kurangi nilai voting pada table option
    UPDATE option SET voting = voting - 1 WHERE id_option = option_id;
    
    -- Kurangi nilai voting_count pada table vote
    UPDATE vote SET voting_count = voting_count - 1 WHERE share_code = share_code;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `option`
--

CREATE TABLE `option` (
  `id_option` int(8) NOT NULL,
  `share_code_option` varchar(8) NOT NULL,
  `option` varchar(32) NOT NULL,
  `description` text NOT NULL,
  `voting` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `option`
--

INSERT INTO `option` (`id_option`, `share_code_option`, `option`, `description`, `voting`) VALUES
(4, 'vxpmf2', 'Senja', '', 0),
(5, 'vxpmf2', 'Kopi', '', 4),
(6, 'vxpmf2', 'Gedang Goreng', '', 1),
(7, '416277', 'Diaduk', '', 2),
(8, '416277', 'Gak diaduk', '', 2),
(9, '3mfgx4', 'Kuah', '', 2),
(10, '3mfgx4', 'Goreng', '', 2),
(11, 'y1zr7m', 'Gajah Duduk', '', 1),
(12, 'y1zr7m', 'Wadimor', '', 3),
(13, 'y1zr7m', 'Atlas', '', 0),
(14, 'vkqgs1', 'Lengkap Full Combo', 'Include gorengan dan sate-satean', 2),
(15, 'vkqgs1', 'Lengkap Tanpa Jeruk', '', 0),
(16, 'vkqgs1', 'LENGKAP TANPA KECAP', '', 1),
(17, 'vkqgs1', 'Micin Only', '', 0),
(18, 'vkqgs1', 'Kecap & Saos only', '', 0),
(19, 'vkqgs1', 'Sambal Only', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(24) NOT NULL,
  `password` varchar(16) NOT NULL,
  `email` varchar(32) NOT NULL,
  `photos` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `email`, `photos`) VALUES
('admin', 'admin', '', ''),
('admin1', 'admin', '', ''),
('admin2', 'admin', '', ''),
('fariski', 'admin', '', ''),
('Pandji', 'admin', 'anjayman9945@gmail.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `vote`
--

CREATE TABLE `vote` (
  `user_name_vote` varchar(24) NOT NULL,
  `vote_name` varchar(24) NOT NULL,
  `share_code` varchar(8) NOT NULL,
  `voting_count` int(11) NOT NULL,
  `datetime_start` datetime NOT NULL,
  `datetime_end` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vote`
--

INSERT INTO `vote` (`user_name_vote`, `vote_name`, `share_code`, `voting_count`, `datetime_start`, `datetime_end`) VALUES
('admin1', 'Tim Indomie', '3mfgx4', 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('admin', 'Tim makan bubur', '416277', 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('admin1', 'Cara terbaik makan soto', 'vkqgs1', 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('admin', 'The best konco ngudut', 'vxpmf2', 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('admin', 'Best Sarung Damage', 'y1zr7m', 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id_history`),
  ADD KEY `history_ibfk_1` (`id_option`),
  ADD KEY `history_ibfk_2` (`share_code_history`),
  ADD KEY `history_ibfk_3` (`username_history`);

--
-- Indexes for table `option`
--
ALTER TABLE `option`
  ADD PRIMARY KEY (`id_option`),
  ADD KEY `option_ibfk_1` (`share_code_option`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `vote`
--
ALTER TABLE `vote`
  ADD PRIMARY KEY (`share_code`),
  ADD KEY `vote_ibfk_1` (`user_name_vote`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id_history` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `option`
--
ALTER TABLE `option`
  MODIFY `id_option` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `history`
--
ALTER TABLE `history`
  ADD CONSTRAINT `history_ibfk_1` FOREIGN KEY (`id_option`) REFERENCES `option` (`id_option`) ON DELETE CASCADE,
  ADD CONSTRAINT `history_ibfk_2` FOREIGN KEY (`share_code_history`) REFERENCES `vote` (`share_code`) ON DELETE CASCADE,
  ADD CONSTRAINT `history_ibfk_3` FOREIGN KEY (`username_history`) REFERENCES `user` (`username`) ON DELETE CASCADE;

--
-- Constraints for table `option`
--
ALTER TABLE `option`
  ADD CONSTRAINT `option_ibfk_1` FOREIGN KEY (`share_code_option`) REFERENCES `vote` (`share_code`) ON DELETE CASCADE;

--
-- Constraints for table `vote`
--
ALTER TABLE `vote`
  ADD CONSTRAINT `vote_ibfk_1` FOREIGN KEY (`user_name_vote`) REFERENCES `user` (`username`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
