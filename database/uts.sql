-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Apr 2021 pada 10.36
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uts`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `telepon` bigint(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tgl` date NOT NULL,
  `agama` varchar(20) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `nim`, `nama`, `jurusan`, `jenis_kelamin`, `alamat`, `telepon`, `email`, `tgl`, `agama`, `foto`) VALUES
(1, 'kemal', '$2y$10$zGhFGgxZtoMQKp4oSG9XQuOm8JdCkszF51E69kB9K5K/8qfnqzyY6', '1900000', 'Kemal Yazid Fauzi', 'Pendidikan Ilmu Komputer', 'Laki-laki', 'Sukabumi', 812345, 'kemal@gmail.com', '2000-10-01', 'Islam', '6081325731838.jpg'),
(2, 'karim', '$2y$10$wULrip519m83V00zOX8bKeELhbfiUcutxwstO2aVQJw4tZIYeFbiW', '19023233', 'Karim Fadhilah', 'Ilmu Komputer', 'Laki-laki', 'Bandung', 81812345, 'karim@gmail.com', '2000-04-06', 'Islam', '608133c485488.jpg'),
(3, 'kemal2', '$2y$10$GcBg2q3QYS9NC5eCNG2qFeuwcThK7MAL.fVQScsdLHZWppimH2NZy', '11111111', 'Kemal', 'Teknik Elelktro', 'Laki-laki', 'Ujung Genteng', 12345678, 'kemal2@gmail.com', '2002-04-03', 'Islam', ''),
(4, 'karim2', '$2y$10$KARxWOcucDlTubHpoSgFuODHdW9SmhDg7ye5SVrF0yUhYXoB7TYw6', '1234567', 'Karim Boong', 'Teknik Elelktro', 'Laki-laki', 'jakarata', 12345678, 'karim2@gmail.com', '2001-03-01', 'Kristen', '6081328b91d3f.jpg'),
(6, 'umaru', '$2y$10$WsrQgC1RY.qaqhnFTfRWyObZN5gXL.Fw4FhrFjWtEAsBrhBPirFd6', '1903333', 'Umaru', 'Matematika', 'Perempuan', 'Cimahi', 1111111123, 'umaru@gmail.com', '2000-02-03', 'Kristen', '608135749d43d.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
