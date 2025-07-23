-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8111
-- Waktu pembuatan: 23 Jul 2025 pada 11.33
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cepuin_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_lengkap` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `status` enum('Aktif','Nonaktif') DEFAULT 'Aktif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`, `nama_lengkap`, `email`, `status`) VALUES
(1, 'alex', '$2y$10$1XY8qc5rM19VoHL3/P7rveU.CT4OSDC6j3qTIZFiOMgTDF4g626LC', 'Alex Admin', 'alex@cepuin.com', 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan`
--

CREATE TABLE `laporan` (
  `id` int(11) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `tanggal` date NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `tujuan` varchar(100) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `privasi` enum('Anonim','Rahasia') NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `selesai` tinyint(1) DEFAULT 0,
  `tanggapan` text DEFAULT NULL,
  `dibuat_pada` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `laporan`
--

INSERT INTO `laporan` (`id`, `jenis`, `judul`, `isi`, `tanggal`, `lokasi`, `tujuan`, `kategori`, `privasi`, `foto`, `selesai`, `tanggapan`, `dibuat_pada`, `user_id`) VALUES
(1, 'Pengaduan', 'parkir sembarangan', 'parkir liar', '2025-07-16', 'Jakarta Barat', 'dishub', 'Kementrian', 'Anonim', 'uploads/1752641709_6396c82b990e5.jpeg', 1, 'sudah terlaksanakan', '2025-07-16 04:55:09', NULL),
(2, 'Pengaduan', 'parkir sembarangan', 'parkir liar nih', '2025-07-16', 'Jakarta Pusat', 'dishub', 'Kementrian', 'Anonim', 'uploads/1752683543_6396c82b990e5.jpeg', 1, 'kurang lengkap alamat nya', '2025-07-16 16:32:23', NULL),
(3, 'Pengaduan', 'sampah menumpuk', 'terlihat sampah menumpuk dikali dijl.xxxx', '2025-07-16', 'Jakarta Barat', 'dinas kebersihan', 'Kementrian', 'Anonim', 'uploads/1752684592_5fbf7b8e5fb54.jpg', 1, 'sudah dilaksanakan', '2025-07-16 16:49:52', NULL),
(4, 'Pengaduan', 'sampah berserakan', 'sampah menumpuk di kali xxx', '2025-07-17', 'Jakarta Pusat', 'kementrian lingkungan', 'Kementrian', 'Anonim', 'uploads/1752764821_5fbf7b8e5fb54.jpg', 0, NULL, '2025-07-17 15:07:01', NULL),
(8, 'Pengaduan', 'sampah berserakan', 'sampah kali banyak bambu', '2025-07-18', 'Jakarta Pusat', 'kementrian lingkungan', 'Kementerian', 'Anonim', 'uploads/1752772596_5fbf7b8e5fb54.jpg', 0, NULL, '2025-07-17 17:16:36', 6),
(9, 'Pengaduan', 'sampah berserakan', 'awsawdad', '2025-07-18', 'Jakarta Pusat', 'dishub', 'Infrastruktur', 'Anonim', 'uploads/1752772803_activity fix.png', 0, NULL, '2025-07-17 17:20:03', 11),
(10, 'Pengaduan', 'sampah berserakan', 'sampah berserakan depan monas', '2025-07-20', 'Jakarta Pusat', 'kementrian lingkungan', 'Lingkungan Hidup & Kebersihan', 'Anonim', 'uploads/1753008730_2761859796.jpg', 1, 'sudah dibersihkan', '2025-07-20 10:52:10', 11),
(11, 'Pengaduan', 'sampah berserakan', 'sampah berserak dikali', '2025-07-20', 'Jakarta Pusat', 'kementrian lingkungan', 'Lingkungan Hidup & Kebersihan', '', 'uploads/1753024182_5fbf7b8e5fb54.jpg', 1, 'sudah dibersihkan', '2025-07-20 15:09:42', 11),
(12, 'Pengaduan', 'sampah berserakan', 'sampah banyak banget di.jl.sudirman', '2025-07-22', 'Jakarta Pusat', 'kementrian lingkungan', 'Lingkungan Hidup & Kebersihan', 'Anonim', 'uploads/1753177054_2761859796.jpg', 1, 'amannn', '2025-07-22 09:37:34', 11),
(18, 'Pengaduan', 'sampah berserakan', 'sampah dikali', '2025-07-22', 'Jakarta Pusat', 'kementrian lingkungan', 'Lingkungan Hidup & Kebersihan', 'Anonim', 'uploads/1753179496_5fbf7b8e5fb54.jpg', 1, 'sudah', '2025-07-22 10:18:16', 18),
(19, 'Pengaduan', 'Parkir sembarangan', 'Parkir sembarangan depan rumah saya nih', '2025-07-22', 'Jakarta Pusat', 'Dishub', 'Perhubungan & Transportasi', 'Anonim', 'uploads/1753189926_1000225150.jpg', 0, NULL, '2025-07-22 13:12:06', 19),
(20, 'Pengaduan', 'parkir sembarangan', 'terjadi parkir sembarangan depan rumah jl.lontar bawah no.26', '2025-07-22', 'Jakarta Pusat', 'dishub', 'Perhubungan & Transportasi', 'Anonim', 'uploads/1753191019_test.jpeg', 0, NULL, '2025-07-22 13:30:19', 20),
(21, 'Pengaduan', 'parkir sembarangan', 'parkir sembarangan', '2025-07-22', 'Jakarta Pusat', 'dishub', 'Perhubungan & Transportasi', 'Rahasia', 'uploads/1753191390_test.jpeg', 0, NULL, '2025-07-22 13:36:30', 20);

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_lengkap` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `status` enum('Aktif','Nonaktif') DEFAULT 'Aktif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`id`, `username`, `password`, `nama_lengkap`, `email`, `status`) VALUES
(1, 'jack', '$2y$10$2/tfa/ui2O0UuaiUjrFHFO5YZq/Ig8cxqQA97Hsuq2Pwo35iZ1zDK', 'Jack Petugas', 'jack@cepuin.com', 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_lengkap` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `role` enum('admin','petugas','masyarakat') DEFAULT 'masyarakat',
  `status` enum('Aktif','Nonaktif') DEFAULT 'Aktif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `nama_lengkap`, `email`, `role`, `status`) VALUES
(3, 'alex', '$2y$10$LxO.3NvwL0JckS/jOYaqPucnYuyl6sraBX83ej9B9VdO/G3qBkVJu', 'Alex Admin', 'alex@cepuin.com', 'admin', 'Aktif'),
(4, 'jack', '$2y$10$snvK7m9ezmvRX/T3eBSP8OHloJQTx5G66AlXxQxyGM73bqbLNz7XS', 'Jack Petugas', 'jack@cepuin.com', 'petugas', 'Aktif'),
(5, 'ibi', '$2y$10$keWRfHru9DsLTEZUEXkHc.lFS1kfYkE.ZzjMKRK2U9FI/BRgXgoia', 'nurman', 'nurman@gmail.com', 'masyarakat', 'Aktif'),
(6, 'reza', '$2y$10$9NiMqF3Fxkkl9KhtZakF9ev9IDIVJd1Tq4moPaRmXljVTUnqT9Asu', 'reza januar', 'reza@gmail.com', 'masyarakat', 'Aktif'),
(7, 'matew', '$2y$10$5xGJjrk3yBXvdhJGqIp3QOBEJk5Y44zbLJJKwMy.FreOIpkixv39i', 'koh matew', 'matew@gmail.com', 'masyarakat', 'Aktif'),
(8, 'edo', '$2y$10$N6nJSu9jjbaFJsTAK3UI9.sBJhZuH/hQ6tQTzvRm6tNN5z.dFJNr2', 'edo teta', 'edo@gmail.com', 'masyarakat', 'Aktif'),
(11, 'rehan', '$2y$10$6P4nCMcDJ4S9/usjm8thS.tZSkU6sGZWNPZAw0MkZjvDUrQlEL5hq', 'rehan aja', 'rehan@gmail.com', 'masyarakat', 'Aktif'),
(12, 'jabran', '$2y$10$/4Juel6.P4gASGcekoc./.s6YPQv.wjI8yTKIFMhTMQZjmdcW1wNq', 'jabran aja', 'jabran@gmail.com', 'masyarakat', 'Aktif'),
(13, 'bryan', '$2y$10$UHMJnVJwE0L3vFBrwA2PLu7vVP9FsLr7yx0G956ye8pdiQv/glwrW', 'bryan aja', 'bryan@gmail.com', 'masyarakat', 'Aktif'),
(14, 'aril', '$2y$10$zGDcIpoNGqYffKTBdc5jD.OhHPDFp3Pvij6hNA46hAT7uSPsTvR2e', 'aril aja', 'aril@gmail.com', 'masyarakat', 'Aktif'),
(15, 'asu', '$2y$10$dm1iAJ3Y0VDXi2FfbQ3K1u54nm3IhyU1fhTE9.AKXHt01SA6KYIei', 'asu', '2e2e@gamil.com', 'masyarakat', 'Aktif'),
(16, 'api', '$2y$10$74MjT8pzfHOyllmY1w5BqeIKGIjiPkAFvpUi1hJ2kzMiBdleFC6SO', 'api', '23232@gmail.cp', 'masyarakat', 'Aktif'),
(17, 'ada', '$2y$10$jiRm4L0uVwtTkhGnrvUj/ebmttll06TBUZI/T/JcUvqjmeWSvon/G', 'ada', 'ekal@gmail.com', 'masyarakat', 'Aktif'),
(18, 'al', '$2y$10$27cvXDNFF/oeoGThgyi0Z.ZSt6q4KtLGpRRXKt1rn4DdcgWqLzEES', 'algozali', 'algozali@gmail.com', 'masyarakat', 'Aktif'),
(19, 'hasan', '$2y$10$PgbUIP.S6nr1tueRrlGxNuYaN1DW3AsUWShkhyA2lyouwUTSfAZ/a', 'Hasan Zub', 'haeqalhasan@gmail.com', 'masyarakat', 'Aktif'),
(20, 'dedy', '$2y$10$5o7GrTuPT.t.KTF2NSmEe.hRP1BOUxX/hcfl/MgLatbfHnptQVzty', 'dedy fahrudin', 'arayyan1306@gmail.com', 'masyarakat', 'Aktif');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indeks untuk tabel `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_laporan_user` (`user_id`);

--
-- Indeks untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `laporan`
--
ALTER TABLE `laporan`
  ADD CONSTRAINT `fk_laporan_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
