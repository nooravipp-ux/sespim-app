-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2023 at 12:36 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_serdik_sespim`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `m_dikbang`
--

CREATE TABLE `m_dikbang` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `m_dikbang`
--

INSERT INTO `m_dikbang` (`id`, `name`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'SESPIMA', '2023-03-11 03:30:13', 'admin', NULL, NULL),
(2, 'SESPIMEN', '2023-03-11 03:30:13', 'admin', NULL, NULL),
(3, 'SESPIMTI', '2023-03-11 03:31:01', 'admin', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `m_role`
--

CREATE TABLE `m_role` (
  `id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `description` varchar(225) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` varchar(100) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `m_role`
--

INSERT INTO `m_role` (`id`, `name`, `description`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'Admin', 'Admin', '2023-03-09 07:59:01', 'admin', '2023-03-09 08:23:06', 'admin'),
(2, 'SESPIMA', 'SESPIMA', '2023-03-09 10:22:53', 'admin', '2023-03-11 20:35:20', 'admin'),
(3, 'SESPIMEN', 'SESPIMEN', '2023-03-11 14:40:12', 'admin', NULL, NULL),
(4, 'SESPIMTI', 'SESPIMTI', '2023-03-11 14:40:23', 'admin', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `m_visitor`
--

CREATE TABLE `m_visitor` (
  `id` int(11) NOT NULL,
  `ip` text DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_anak`
--

CREATE TABLE `t_anak` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `jenis_kelamin` varchar(100) DEFAULT NULL,
  `umur` int(11) NOT NULL,
  `pendidikan_terakhir` int(11) NOT NULL,
  `kelas` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_anak`
--

INSERT INTO `t_anak` (`id`, `user_id`, `nama`, `jenis_kelamin`, `umur`, `pendidikan_terakhir`, `kelas`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 6, 'Nurapip', '1', 25, 3, '4', '2023-03-11 08:27:34', 'admin', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `t_identitas`
--

CREATE TABLE `t_identitas` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `dikbang` int(11) NOT NULL COMMENT '(SESPIMEN, SESPIMA, SESPIMTI)',
  `nama_lengkap` varchar(100) DEFAULT NULL,
  `nama_panggilan` varchar(100) DEFAULT NULL,
  `pangkat` varchar(100) DEFAULT NULL,
  `nrp` varchar(100) DEFAULT NULL,
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `agama` varchar(100) DEFAULT NULL,
  `jabatan` varchar(100) DEFAULT NULL,
  `kesatuan` varchar(100) DEFAULT NULL,
  `tanggal_masuk_polri` date DEFAULT NULL,
  `suku` varchar(100) DEFAULT NULL,
  `alamat_kantor` text DEFAULT NULL,
  `alamat_rumah` text DEFAULT NULL,
  `no_ktp` varchar(100) DEFAULT NULL,
  `no_bpjs` varchar(100) DEFAULT NULL,
  `no_npwp` varchar(100) DEFAULT NULL,
  `no_telp` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `nama_ayah` varchar(100) DEFAULT NULL,
  `pekerjaan_ayah` varchar(100) DEFAULT NULL,
  `nama_ibu` varchar(100) DEFAULT NULL,
  `pekerjaan_ibu` varchar(100) DEFAULT NULL,
  `alamat_orang_tua` text DEFAULT NULL,
  `berat_badan` int(11) DEFAULT NULL,
  `tinggi_badan` int(11) DEFAULT NULL,
  `gol_darah` varchar(50) DEFAULT NULL,
  `penyakit_sering_diderita` varchar(100) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` varchar(100) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_identitas`
--

INSERT INTO `t_identitas` (`id`, `user_id`, `dikbang`, `nama_lengkap`, `nama_panggilan`, `pangkat`, `nrp`, `tempat_lahir`, `tanggal_lahir`, `agama`, `jabatan`, `kesatuan`, `tanggal_masuk_polri`, `suku`, `alamat_kantor`, `alamat_rumah`, `no_ktp`, `no_bpjs`, `no_npwp`, `no_telp`, `email`, `nama_ayah`, `pekerjaan_ayah`, `nama_ibu`, `pekerjaan_ibu`, `alamat_orang_tua`, `berat_badan`, `tinggi_badan`, `gol_darah`, `penyakit_sering_diderita`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 5, 1, 'Nurapip Nurapip', NULL, NULL, '11223344', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '56565656', NULL, NULL, 'noora@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-10 09:23:04', 'admin', '2023-03-11 04:50:34', 'admin'),
(2, 6, 2, 'Jhonson', 'Jhon', 'Jendral', '33224451', 'Bandung', '2023-03-07', 'ISLAM', 'KEPALA', 'KESATUAN', '2023-03-08', 'SUNDA', 'Kp. Sunda', 'Kp. Sunda', '1122334455', '1122334455', '1122334455', '0891232112', 'febriansyah@gmail.com', 'Jhon Due', 'PNS', 'Yasmin', 'PNS', 'Bandung', 65, 175, 'O', 'Asma', '2023-03-11 04:20:17', 'admin', '2023-03-11 06:59:01', 'admin'),
(3, 7, 1, 'Dena Mulyani', 'dhjsd', NULL, '99887766', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'dena@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'A', NULL, '2023-03-11 13:34:13', 'admin', '2023-03-15 06:20:12', '99887766'),
(4, 8, 1, 'Jhon DUe', NULL, NULL, '6677534', NULL, NULL, NULL, NULL, NULL, '2023-03-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'jhon@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-11 14:34:49', 'admin', '2023-03-11 20:34:49', 'admin'),
(5, 17, 1, 'jajang mustofa', NULL, NULL, '7564478', NULL, '2023-03-06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'jajang@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'A', NULL, '2023-03-14 18:12:55', 'admin', '2023-03-15 03:31:09', 'admin'),
(6, 18, 1, 'Nurapip', NULL, NULL, 'noorav@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12345', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'O', NULL, '2023-03-15 03:09:44', 'admin', '2023-03-15 03:21:27', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `t_jadwal`
--

CREATE TABLE `t_jadwal` (
  `id` int(11) NOT NULL,
  `kategori` int(11) NOT NULL,
  `file` text NOT NULL,
  `publish` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_jadwal`
--

INSERT INTO `t_jadwal` (`id`, `kategori`, `file`, `publish`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 1, '1678544127_Jadwal Minggu 1 Sespimti (2).pdf', 1, '2023-03-11 14:15:27', 'admin', '2023-03-15 08:29:58', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `t_kontak_darurat`
--

CREATE TABLE `t_kontak_darurat` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `no_telepon` varchar(100) NOT NULL,
  `alasan` text NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_kontak_darurat`
--

INSERT INTO `t_kontak_darurat` (`id`, `user_id`, `nama`, `alamat`, `no_telepon`, `alasan`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 6, 'Nurapip', 'Cimahi', '08991848066', 'Alasan', '2023-03-11 08:38:15', 'admin', NULL, NULL),
(2, 8, 'jhon due', 'Bandung', '0892123453', 'Bagus', '2023-03-11 20:34:34', 'admin', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `t_pasangan`
--

CREATE TABLE `t_pasangan` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `nama_panggilan` varchar(100) DEFAULT NULL,
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_kelamin` int(11) DEFAULT NULL,
  `tempat_nikah` varchar(100) DEFAULT NULL,
  `tanggal_nikah` date DEFAULT NULL,
  `agama` varchar(100) DEFAULT NULL,
  `pekerjaan` varchar(100) DEFAULT NULL,
  `pendidikan_terakhir` varchar(100) DEFAULT NULL,
  `alamat_rumah` text DEFAULT NULL,
  `nama_ibu_pasangan` varchar(100) DEFAULT NULL,
  `nama_ayah_pasangan` varchar(100) DEFAULT NULL,
  `alamat_orang_tua_pasangan` text DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_pasangan`
--

INSERT INTO `t_pasangan` (`id`, `user_id`, `nama`, `nama_panggilan`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `tempat_nikah`, `tanggal_nikah`, `agama`, `pekerjaan`, `pendidikan_terakhir`, `alamat_rumah`, `nama_ibu_pasangan`, `nama_ayah_pasangan`, `alamat_orang_tua_pasangan`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(10, 6, 'apip', 'Nurapip', 'Bandung', '2023-03-07', 1, NULL, NULL, 'Islam', NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-11 11:58:06', 'admin', '2023-03-11 12:03:07', 'admin'),
(11, 8, 'Saritem', 'Sari', 'Bandung', '2023-03-08', 1, NULL, NULL, NULL, NULL, NULL, 'Bandung', 'Jojon', NULL, NULL, '2023-03-11 15:14:44', 'admin', '2023-03-14 15:37:09', 'admin'),
(12, 17, NULL, NULL, NULL, '2023-03-17', 1, NULL, NULL, 'Islam', NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-14 18:16:09', 'admin', '2023-03-14 18:16:27', 'admin'),
(13, 18, 'Maemunnah', NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-15 07:34:16', 'admin', '2023-03-15 07:34:22', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `t_pendidikan`
--

CREATE TABLE `t_pendidikan` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `kategori` varchar(100) NOT NULL COMMENT '(UMUM, POLRI, KURSUS)',
  `jenis` varchar(100) NOT NULL,
  `tahun_lulus` int(11) NOT NULL,
  `tempat_pend` varchar(100) NOT NULL,
  `ranking` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_pendidikan`
--

INSERT INTO `t_pendidikan` (`id`, `user_id`, `kategori`, `jenis`, `tahun_lulus`, `tempat_pend`, `ranking`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 6, 'UMUM', 'SD', 2006, 'SDN Sindang Kerta', 10, '2023-03-11 06:53:44', 'admin', NULL, NULL),
(2, 6, 'POLRI', 'SESPIM', 2010, 'LEMDIKLAT POLRI', 10, '2023-03-11 06:54:42', 'admin', NULL, NULL),
(3, 6, 'KURSUS', 'Kursus Mejahit', 2022, 'Lembaga Kursus', 10, '2023-03-11 06:55:14', 'admin', NULL, NULL),
(4, 17, 'UMUM', 'SD', 2012, 'SDN Sindang Kerta', NULL, '2023-03-15 03:54:19', 'admin', NULL, NULL),
(5, 18, 'UMUM', 'SD', 2008, 'SDN Sindang Kerta edit', NULL, '2023-03-15 04:10:02', 'admin', '2023-03-15 05:07:52', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `t_pengetahuan_bahasa`
--

CREATE TABLE `t_pengetahuan_bahasa` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `jenis_bahasa` varchar(100) NOT NULL COMMENT '(Asing, Daerah)',
  `nama_bahasa` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_pengetahuan_bahasa`
--

INSERT INTO `t_pengetahuan_bahasa` (`id`, `user_id`, `jenis_bahasa`, `nama_bahasa`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 6, 'ASING', 'Francis', '2023-03-11 08:06:44', 'admin', NULL, NULL),
(2, 7, 'DAERAH', 'Bahasa Sunda', '2023-03-11 13:44:31', 'admin', NULL, NULL),
(4, 18, 'ASING', 'Indonesia Merdeka', '2023-03-15 07:33:55', 'admin', '2023-03-15 07:34:05', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `t_penghargaan`
--

CREATE TABLE `t_penghargaan` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `penghargaan` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_penghargaan`
--

INSERT INTO `t_penghargaan` (`id`, `user_id`, `penghargaan`, `deskripsi`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 5, 'Penghargaan Bintara', 'Deskripsi Penghargaan', '2023-03-11 07:54:22', 'admin', NULL, NULL),
(2, 6, 'Penghargaan Bintara', '-', '2023-03-11 11:10:54', 'admin', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `t_riwayat_jabatan`
--

CREATE TABLE `t_riwayat_jabatan` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `kesatuan` varchar(100) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_berakhir` date NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_riwayat_jabatan`
--

INSERT INTO `t_riwayat_jabatan` (`id`, `user_id`, `jabatan`, `kesatuan`, `tanggal_mulai`, `tanggal_berakhir`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 6, 'Jendral', 'Kesatuan', '2023-03-01', '2023-03-30', '2023-03-11 07:27:52', 'admin', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `t_riwayat_kepangkatan`
--

CREATE TABLE `t_riwayat_kepangkatan` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pangkat` varchar(100) NOT NULL,
  `terhitung_mulai_tanggal` date NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` varchar(100) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_riwayat_kepangkatan`
--

INSERT INTO `t_riwayat_kepangkatan` (`id`, `user_id`, `pangkat`, `terhitung_mulai_tanggal`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 6, 'Jendral', '2023-03-08', '2023-03-11 07:14:42', 'admin', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `t_status_vaksin`
--

CREATE TABLE `t_status_vaksin` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status_vaksin` varchar(100) NOT NULL,
  `jenis_vaksin` int(11) NOT NULL,
  `tanggal_vaksin` date NOT NULL,
  `alasan` text NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `role_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$QL8omkA/JuhnqKg4Ptu2yuWrMrD3EWJJPyX5YQ9X1xgYRgg89IHsi', NULL, 1, '2023-03-03 18:38:27', '2023-03-03 18:38:27'),
(5, '11223344', 'noora@gmail.com', NULL, '$2y$10$FnVxBMsL3nendJgYFYiItuCkCqNzvWWuMr6p.xz8QMLtMxsYvXJdu', NULL, 2, NULL, NULL),
(6, '33224451', 'febriansyah@gmail.com', NULL, '$2y$10$5ObeipbUCFTdMmeAFd88/e5fKeD1pCqx3mBwFwxtco91OJFqmvAWG', NULL, 2, NULL, NULL),
(7, '99887766', 'dena@gmail.com', NULL, '$2y$10$pcQdWCLcInOLeThxTQ.eo.XHsnOhlGb3JYLlE68Q.tZctOpFVzdpm', NULL, 2, NULL, NULL),
(8, '6677534', 'jhon@gmail.com', NULL, '$2y$10$zXSx901ZGKE803rWALzj7u2UnnWAJHKgEIrfp6YqU.gGwvGL7aMEy', NULL, 2, NULL, NULL),
(17, '7564478', 'jajang@gmail.com', NULL, '$2y$10$HRByShKnXMWzoWlrouObTuTNuovxst4gDUoQdaH8FEN6aaV7MPvR.', NULL, 2, NULL, NULL),
(18, 'noorav@gmail.com', '12345', NULL, '$2y$10$Fpb8mpcfbZMk/.Xixd.UMeeYyMdH75heeCTEXygwB4ZvhRhgpQe7S', NULL, 2, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_dikbang`
--
ALTER TABLE `m_dikbang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_role`
--
ALTER TABLE `m_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `t_anak`
--
ALTER TABLE `t_anak`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_identitas`
--
ALTER TABLE `t_identitas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_jadwal`
--
ALTER TABLE `t_jadwal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_kontak_darurat`
--
ALTER TABLE `t_kontak_darurat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_pasangan`
--
ALTER TABLE `t_pasangan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_pendidikan`
--
ALTER TABLE `t_pendidikan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_pengetahuan_bahasa`
--
ALTER TABLE `t_pengetahuan_bahasa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_penghargaan`
--
ALTER TABLE `t_penghargaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_riwayat_jabatan`
--
ALTER TABLE `t_riwayat_jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_riwayat_kepangkatan`
--
ALTER TABLE `t_riwayat_kepangkatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_status_vaksin`
--
ALTER TABLE `t_status_vaksin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `m_dikbang`
--
ALTER TABLE `m_dikbang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `m_role`
--
ALTER TABLE `m_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_anak`
--
ALTER TABLE `t_anak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `t_identitas`
--
ALTER TABLE `t_identitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `t_jadwal`
--
ALTER TABLE `t_jadwal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `t_kontak_darurat`
--
ALTER TABLE `t_kontak_darurat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `t_pasangan`
--
ALTER TABLE `t_pasangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `t_pendidikan`
--
ALTER TABLE `t_pendidikan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `t_pengetahuan_bahasa`
--
ALTER TABLE `t_pengetahuan_bahasa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `t_penghargaan`
--
ALTER TABLE `t_penghargaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `t_riwayat_jabatan`
--
ALTER TABLE `t_riwayat_jabatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `t_riwayat_kepangkatan`
--
ALTER TABLE `t_riwayat_kepangkatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `t_status_vaksin`
--
ALTER TABLE `t_status_vaksin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
