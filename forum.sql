-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2023 at 05:32 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `forum`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `posted` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `isEncrypted` tinyint(1) NOT NULL,
  `user` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `keyText` varchar(255) DEFAULT NULL,
  `post` int(11) NOT NULL,
  `keyImage` varchar(255) DEFAULT NULL,
  `isEncrypted2` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comment`, `posted`, `isEncrypted`, `user`, `image`, `keyText`, `post`, `keyImage`, `isEncrypted2`) VALUES
(1, 'hello gaes, infokan', '2023-11-21 16:36:02', 1, 'baru', 'http://localhost/forum1/html/diskusi/php/images/dekrip.jpg', 'pesut', 1, NULL, 0),
(2, 'As you can understand by its name itself, PHP Script is way too easy to use & implement on any kind of website. Even a guy who has no technical knowledge can also use it without any hindrance.', '2023-11-21 16:25:42', 0, 'ucok', NULL, NULL, 1, NULL, 0),
(24, 'qwe', '2023-11-21 12:16:52', 0, 'ucok', NULL, '', 1, NULL, 0),
(26, '161e84b658a2157663153c4e2a', '2023-11-21 12:37:09', 1, 'ucok', NULL, 'ok', 1, NULL, 0),
(27, '0c94a76a5ef047db8d0df07d', '2023-11-21 12:47:17', 1, 'ucok', NULL, 'yupi', 1, NULL, 0),
(57, '96c88388541fab1b56bf6fbb09f1ad019d7d', '2023-11-21 22:55:33', 1, 'ceksonn5', 'images/', '', 1, '', 0),
(58, 'komentar tanpa enkripsi', '2023-11-21 22:56:09', 0, 'ceksonn5', 'images/369249109_278704491545355_240417135141642331_n.jpg', '', 1, '', 0),
(59, 'komentar dengan enkripsi gambar', '2023-11-21 22:57:14', 0, 'ceksonn5', 'images/20231020.jpg', '', 1, 'ok', 0),
(90, 'coba teks only non ekripsi', '2023-11-22 16:24:11', 0, 'ceksonn5', '', '', 2, '', 0),
(91, '1377f9b07d045def9119b9225ca060dbbce1ebcd545a', '2023-11-22 16:24:21', 1, 'ceksonn5', '', 'tes', 2, '', 0),
(92, 'coba gambar non enkripsi', '2023-11-22 16:24:36', 0, 'ceksonn5', 'images/78.jpeg', '', 2, '', 0),
(93, 'coba gambar enkripsi', '2023-11-22 16:25:29', 0, 'ceksonn5', 'images/398304760_727647946058901_989926059254281932_n.jpg', '', 2, 'ok', 1);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `postTitle` varchar(255) NOT NULL,
  `posted` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user` varchar(255) NOT NULL,
  `postContent` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `postTitle`, `posted`, `user`, `postContent`) VALUES
(1, 'Cara buat forum pake bahasa PHP?', '2023-11-21 18:36:29', 'baru', 'Saya lagi dapet tugas mata kuliah Kripto, rencananya mau buat website forum pake bahasa PHP. Saya lagi dapet tugas mata kuliah Kripto, rencananya mau buat website forum pake bahasa PHP. Saya lagi dapet tugas mata kuliah Kripto, rencananya mau buat website'),
(2, 'Cara cepat paham ngoding?', '2023-11-21 16:35:48', 'baru', NULL),
(3, 'Coba title', '2023-11-21 22:37:58', 'lama', 'Coba konten coa coba coba ');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `joined` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `name`, `password`, `email`, `phone`, `country`, `photo`, `joined`) VALUES
('aa', 'a', '64af94d38821f79dea6b9a0e14ade533ebe2ad3fe4195c1bb3fd983bbce43a39', 'a@a.a', '321', '321', 'http://localhost/forum1/html/diskusi/php/images/78.jpeg', '2023-11-19'),
('baru', 'Baru Baru', '64af94d38821f79dea6b9a0e14ade533ebe2ad3fe4195c1bb3fd983bbce43a39', 'baru@gmail.com', '12345', 'Irlandia', 'http://localhost/forum1/html/diskusi/php/images/tes.jpg', '2023-11-21'),
('ceksonn4', 'cek', '64af94d38821f79dea6b9a0e14ade533ebe2ad3fe4195c1bb3fd983bbce43a39', 'cek@cek.com', '123', 'cek', 'images/static-assets-upload2047742424656749219.webp', '2023-11-21'),
('ceksonn5', 'cek', '64af94d38821f79dea6b9a0e14ade533ebe2ad3fe4195c1bb3fd983bbce43a39', 'cek@cek.com', '123', 'cek', 'images/293300825_3321065261503214_7741975884398133213_n.jpg', '2023-11-21'),
('lama', 'Ucup', '0d6e4079e36703ebd37c00722f5891d28b0e2811dc114b129215123adcce3605', 'ucup@gmail.com', '12345', 'Antartika', 'http://localhost/forum1/html/diskusi/php/images/78.jpeg', '2023-11-21'),
('ucok', 'ucok baba', '64af94d38821f79dea6b9a0e14ade533ebe2ad3fe4195c1bb3fd983bbce43a39', 'ucok@baba.com', '09123123', 'Indonesia', 'http://localhost/forum1/html/diskusi/php/images/tes.jpg', '2023-11-08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comment_user` (`user`),
  ADD KEY `comment_post` (`post`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_user` (`user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comment_post` FOREIGN KEY (`post`) REFERENCES `posts` (`id`),
  ADD CONSTRAINT `comment_user` FOREIGN KEY (`user`) REFERENCES `users` (`username`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `post_user` FOREIGN KEY (`user`) REFERENCES `users` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
