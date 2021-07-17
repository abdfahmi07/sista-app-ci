-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Jul 2021 pada 16.49
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sista`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_penilaian`
--

CREATE TABLE `detail_penilaian` (
  `id` int(11) NOT NULL,
  `penilaian_id` int(11) NOT NULL,
  `dosen_id` int(11) NOT NULL,
  `seminar_id` int(11) DEFAULT NULL,
  `nilai` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `id` int(11) NOT NULL,
  `nidn` varchar(10) DEFAULT NULL,
  `nama` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`id`, `nidn`, `nama`) VALUES
(1, '084020211', 'AMALIA RAHMAH, S.T, S.T, M.T'),
(2, '084040200', 'BACHTIAR FIRDAUS, S.T, M.P'),
(3, '084151108', 'KURNIAWAN DWI PRASETYO, S.T, M.T'),
(4, '084201001', 'MUHAMMAD BINTANG, S.Kom'),
(5, '084310911', 'NUGROHO DWI SAPUTRA, S.Kom, M.Ti'),
(6, '084290607', 'REZA ALDIANSYAH, S.T, M.Ti'),
(7, '084230787', 'RUSMANTO, M.M., Drs'),
(8, '084260989', 'SAPTO WALUYO, S.Sos, M.Sc.'),
(9, '0860696', 'SUHENDI, M.M.S.I, S.T'),
(10, '084010195', 'WARSONO, S.Kom, M.Ti'),
(11, '084241010', 'YEKTI WIRANI, S.T, M.Ti'),
(12, '084080200', 'DEDY ACHMADI, S.T, M.T'),
(13, '084071314', 'MISNA ASQIA, S.Kom, M.Kom'),
(14, '084050315', 'NURUL JANAH, S.IIP, M.HUM'),
(15, '084300500', 'EDI WIBOWO, S.E, M.M'),
(16, '084131310', 'AHMAD RIO ADRIANSYAH, S.Si, M.Si'),
(17, '084260511', 'APRIL RUSTIANTO, S.Kom, M.T'),
(18, '084070998', 'HENRY SAPTONO, S.Si, M.Kom'),
(19, '084111208', 'HILMY ABIDZAR TAWAKAL, S.T, M.Kom'),
(20, '084211202', 'LUKMAN ROSYIDI, S.T, M.M., M.T'),
(21, '084270601', 'REZA PRIMARDIANSYAH, S.T, M.Kom'),
(22, '084240913', 'SALMAN EL FARISI, S.Kom, M.Kom'),
(23, '084290398', 'SIGIT PUSPITO WIGATI JAROT,PhD'),
(24, '084140495', 'SIROJUL MUNIR, S.Si, M.Kom'),
(25, '084100915', 'TUBAGUS RIZKY DHARMAWAN, S.T, M.Sc.'),
(26, '084260907', 'ZAKI IMADUDDIN, S.T, M.Kom'),
(27, '084281214', 'ADITYA PUTRA, S.T, M.T'),
(28, '084101104', 'NASRUL, S.Kom, M.Kom'),
(29, '084200914', 'TIFANI NABARIAN, S.Kom, M.T.I'),
(30, '084301213', 'PUDY PRIMA, S.T, M.Kom'),
(31, '084240795', 'EFRIZAL ZAIDA, S.KOM, M.M, M.KOM'),
(32, '0899902010', 'TEGUH RAHARJO, S.Kom, M.Kom'),
(33, '084290906', 'ISHOM MUHAMMAD DREHEM,S.Kom, M.Kom'),
(34, '084141310', 'IMAM HAROMAIN, S.Si, M.Kom');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_seminar`
--

CREATE TABLE `kategori_seminar` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `kategori_seminar`
--

INSERT INTO `kategori_seminar` (`id`, `nama`) VALUES
(1, 'Seminar Proposal'),
(2, 'Seminar Hasil'),
(3, 'Sidang Skripsi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penilaian`
--

CREATE TABLE `penilaian` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penilaian`
--

INSERT INTO `penilaian` (`id`, `nama`, `keterangan`) VALUES
(1, 'Presentasi', 'pembukaan, intonasi, kesopanan, kerapihan pakaian'),
(2, 'Penguasaan Materi', 'cukup jelas'),
(3, 'Penulisan Dokumen', 'cukup jelas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peserta_seminar`
--

CREATE TABLE `peserta_seminar` (
  `id` int(11) NOT NULL,
  `nim` varchar(10) DEFAULT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `prodi` varchar(125) NOT NULL,
  `seminar_id` int(11) NOT NULL,
  `kehadiran` smallint(6) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `seminar_ta`
--

CREATE TABLE `seminar_ta` (
  `id` int(11) NOT NULL,
  `semester` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `jam` time DEFAULT NULL,
  `kategori_seminar_id` int(11) NOT NULL,
  `nim` varchar(10) DEFAULT NULL,
  `nama_mahasiswa` varchar(45) DEFAULT NULL,
  `prodi` varchar(125) NOT NULL,
  `judul` text DEFAULT NULL,
  `ruangan` varchar(125) NOT NULL,
  `pembimbing_id` int(11) NOT NULL,
  `penguji1_id` int(11) DEFAULT NULL,
  `penguji2_id` int(11) DEFAULT NULL,
  `nilai_pembimbing` double DEFAULT NULL,
  `nilai_penguji1` double DEFAULT NULL,
  `nilai_penguji2` double DEFAULT NULL,
  `nilai_akhir` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `nim` varchar(50) NOT NULL,
  `image_url` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `nim`, `image_url`, `email`, `password`, `role_id`, `date_created`) VALUES
(10, 'Admin', '0', 'default.jpg', 'admin@gmail.com', '$2y$10$/H2BX87J5fdGGBuDk.qyyOFJ4.LTNnM6E6YozQG8TGPhCziJFD4Me', 1, '2021-07-11 09:40:03'),
(15, 'Abdulloh Fahmi', '0110220071', 'default.jpg', 'abdullohfahmi45@gmail.com', '$2y$10$m5D7zG1x2RGGe0g28Auy7O1voCg0Hedk2DnFWEZ.xBK4Gntzeq2VO', 3, '2021-07-12 04:52:48'),
(17, 'Wahyu Adi Pramudya', '0110220072', 'default.jpg', 'wahyu@gmail.com', '$2y$10$992lOjo3DoDhyaAcq.1nEe.o9j//gZVc3xfMsWXaIaE6/hBq97dd2', 2, '2021-07-15 08:46:20'),
(18, 'Muhammad Nasuha', '011022008', 'default.jpg', 'nasuha@gmail.com', '$2y$10$KdmFk91szGRxD20sKlzEMezElr.Aagm2sJYg8XmGCQiw/rtRdySJi', 3, '2021-07-16 11:55:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_role`
--

CREATE TABLE `users_role` (
  `id` int(11) NOT NULL,
  `role` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users_role`
--

INSERT INTO `users_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Facilitator'),
(3, 'Student');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detail_penilaian`
--
ALTER TABLE `detail_penilaian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_detail_penilaian_penilaian1_idx` (`penilaian_id`),
  ADD KEY `fk_detail_penilaian_dosen1_idx` (`dosen_id`);

--
-- Indeks untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori_seminar`
--
ALTER TABLE `kategori_seminar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `peserta_seminar`
--
ALTER TABLE `peserta_seminar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_peserta_seminar_mahasiswa_seminar1_idx` (`seminar_id`);

--
-- Indeks untuk tabel `seminar_ta`
--
ALTER TABLE `seminar_ta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_mahasiswa_seminar_kategori_seminar_idx` (`kategori_seminar_id`),
  ADD KEY `fk_mahasiswa_seminar_dosen1_idx` (`pembimbing_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indeks untuk tabel `users_role`
--
ALTER TABLE `users_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detail_penilaian`
--
ALTER TABLE `detail_penilaian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT untuk tabel `kategori_seminar`
--
ALTER TABLE `kategori_seminar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `peserta_seminar`
--
ALTER TABLE `peserta_seminar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `seminar_ta`
--
ALTER TABLE `seminar_ta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `users_role`
--
ALTER TABLE `users_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_penilaian`
--
ALTER TABLE `detail_penilaian`
  ADD CONSTRAINT `fk_detail_penilaian_dosen1` FOREIGN KEY (`dosen_id`) REFERENCES `dosen` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_detail_penilaian_penilaian1` FOREIGN KEY (`penilaian_id`) REFERENCES `penilaian` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `peserta_seminar`
--
ALTER TABLE `peserta_seminar`
  ADD CONSTRAINT `peserta_seminar_ibfk_1` FOREIGN KEY (`seminar_id`) REFERENCES `seminar_ta` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `seminar_ta`
--
ALTER TABLE `seminar_ta`
  ADD CONSTRAINT `fk_mahasiswa_seminar_dosen1` FOREIGN KEY (`pembimbing_id`) REFERENCES `dosen` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_mahasiswa_seminar_kategori_seminar` FOREIGN KEY (`kategori_seminar_id`) REFERENCES `kategori_seminar` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
