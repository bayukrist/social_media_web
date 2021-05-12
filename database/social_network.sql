-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Bulan Mei 2021 pada 05.50
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `social_network`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `comments`
--

CREATE TABLE `comments` (
  `com_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `comments`
--

INSERT INTO `comments` (`com_id`, `post_id`, `user_id`, `comment`, `comment_author`, `date`) VALUES
(1, 11, 1, 'hi', 'daniel_adi setiawan_950485', '2020-11-28 15:00:01'),
(2, 11, 1, 'hi', 'daniel_adi setiawan_950485', '2020-11-28 15:22:59'),
(3, 17, 6, 'Jaketnya muius', 'magatsu_ooyodo_953441', '2020-12-02 07:43:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `friends`
--

CREATE TABLE `friends` (
  `id` int(11) NOT NULL,
  `user_one` int(11) NOT NULL,
  `user_two` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `friend_request`
--

CREATE TABLE `friend_request` (
  `id` int(11) NOT NULL,
  `sender` int(11) NOT NULL,
  `receiver` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_content` text NOT NULL,
  `upload_image` varchar(50) NOT NULL,
  `post_date` datetime NOT NULL,
  `post_like` text,
  `post_check` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `posts`
--

INSERT INTO `posts` (`post_id`, `user_id`, `post_content`, `upload_image`, `post_date`, `post_like`, `post_check`) VALUES
(16, 1, 'No', '2019-08-07_15h47_56.png.63', '2020-11-29 12:28:51', NULL, NULL),
(17, 6, 'MMMMMMMMMMMMMMMMMMMMMMM', 'PITS.PNG.95', '2020-12-02 14:42:46', NULL, NULL),
(18, 6, 'cek, mulus, ludah, lalapan, lele bakar', '', '2020-12-02 14:44:26', NULL, NULL),
(19, 1, 'coba', '', '2020-12-14 19:04:56', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `relation`
--

CREATE TABLE `relation` (
  `froms` int(11) NOT NULL,
  `tos` int(11) NOT NULL,
  `status` varchar(1) NOT NULL,
  `since` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `relation`
--

INSERT INTO `relation` (`froms`, `tos`, `status`, `since`) VALUES
(1, 6, 'F', '2020-12-14 11:14:33'),
(6, 1, 'F', '2020-12-14 11:14:50'),
(11, 6, 'F', '2020-12-14 12:56:49'),
(6, 11, 'F', '2020-12-14 12:57:07'),
(11, 1, 'F', '2020-12-14 18:44:10'),
(1, 11, 'F', '2020-12-14 18:44:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `f_name` text NOT NULL,
  `l_name` text NOT NULL,
  `user_name` text NOT NULL,
  `describe_user` varchar(255) NOT NULL,
  `Relationship` text NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_country` text NOT NULL,
  `user_gender` text NOT NULL,
  `user_birthday` text NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `user_cover` varchar(255) NOT NULL,
  `user_reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` text NOT NULL,
  `posts` text NOT NULL,
  `recovery_account` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`user_id`, `f_name`, `l_name`, `user_name`, `describe_user`, `Relationship`, `user_pass`, `user_email`, `user_country`, `user_gender`, `user_birthday`, `user_image`, `user_cover`, `user_reg_date`, `status`, `posts`, `recovery_account`) VALUES
(1, 'Daniel', 'Adi Setiawan', 'daniel_adi setiawan_950485', 'hai semua', 'In a relationship', '123456789', '672018001@student.uksw.edu', 'Indonesia', 'Male', '2000-11-15', 'eden pp.jpg.59', 'default_cover.png', '2020-11-26 18:59:01', 'verified', 'yes', 'budu'),
(6, 'Magatsu', 'Ooyodo', 'magatsu_ooyodo_953441', 'Hayohaa, selamat datang di profil ku', 'Single', '123456789', '672018002@student.uksw.edu', 'Indonesia', 'Male', '2000-08-20', 'Tokino.Sora.600.2688089.jpg.29', 'b6782580-3deb-4e53-8a72-37fc1815543c.jfif.54', '2020-12-02 07:37:25', 'verified', 'yes', 'Iwanttoputading intheuniverse.'),
(11, 'Bayu', 'Kristian', 'bayu_kristian_332580', 'Hello Social Media.This is my default status!', '...', '123456789', '672018005@student.uksw.edu', 'Indonesia', 'Male', '2000-07-10', 'def_dp.png', 'deff.png', '2020-12-14 04:02:46', 'verified', 'no', 'Iwanttoputading intheuniverse.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_messages`
--

CREATE TABLE `user_messages` (
  `id` int(11) NOT NULL,
  `user_to` int(11) NOT NULL,
  `user_from` int(11) NOT NULL,
  `msg_body` varchar(200) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `msg_seen` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_messages`
--

INSERT INTO `user_messages` (`id`, `user_to`, `user_from`, `msg_body`, `date`, `msg_seen`) VALUES
(1, 1, 6, 'tes', '2020-12-04 07:39:56', 'no'),
(2, 1, 6, 'hei, bales hei', '2020-12-08 03:07:08', 'no'),
(3, 1, 6, 'dih sombong amat', '2020-12-08 03:07:21', 'no');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`com_id`);

--
-- Indeks untuk tabel `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `friend_request`
--
ALTER TABLE `friend_request`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indeks untuk tabel `relation`
--
ALTER TABLE `relation`
  ADD PRIMARY KEY (`froms`,`tos`,`status`),
  ADD KEY `since` (`since`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indeks untuk tabel `user_messages`
--
ALTER TABLE `user_messages`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `comments`
--
ALTER TABLE `comments`
  MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `user_messages`
--
ALTER TABLE `user_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
