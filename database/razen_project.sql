-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 14 Mar 2023 pada 13.13
-- Versi server: 5.7.33
-- Versi PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `razen_project`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `item_virtual_tours`
--

CREATE TABLE `item_virtual_tours` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumb` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` text COLLATE utf8mb4_unicode_ci,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `master_kategori_project_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `kode_embed` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `item_virtual_tours`
--

INSERT INTO `item_virtual_tours` (`id`, `nama`, `thumb`, `link`, `deskripsi`, `master_kategori_project_id`, `created_at`, `updated_at`, `kode_embed`) VALUES
(1, 'a', '6407a3341bc4c.jpg', 'https://razenproject.com/virtual/viewer/index.php?code=c4ca4238a0b923820dcc509a6f75849b', 'a', 5, '2023-03-07 20:48:52', '2023-03-07 22:44:48', '<iframe id=\"svt_iframe_c4ca4238a0b923820dcc509a6f75849b\" allow=\"accelerometer; camera; display-capture; fullscreen; geolocation; gyroscope; magnetometer; microphone; midi; xr-spatial-tracking;\" width=\"100%\" height=\"400px\" frameborder=\"0\" scrolling=\"no\" marginheight=\"0\" marginwidth=\"0\" src=\"https://razenproject.com/virtual/viewer/index.php?code=c4ca4238a0b923820dcc509a6f75849b\"></iframe>');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_jabatan_tims`
--

CREATE TABLE `master_jabatan_tims` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `master_jabatan_tims`
--

INSERT INTO `master_jabatan_tims` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'CEO & Founder', '2023-03-09 12:19:04', '2023-03-09 12:19:04'),
(2, 'Machine Engineer', '2023-03-09 12:19:24', '2023-03-09 12:19:24'),
(3, 'Civil Engineer', '2023-03-09 12:19:32', '2023-03-09 12:19:32'),
(4, 'Project Manager', '2023-03-09 12:19:41', '2023-03-09 12:20:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_media_sosials`
--

CREATE TABLE `master_media_sosials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `master_media_sosials`
--

INSERT INTO `master_media_sosials` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Youtube', '2023-03-07 20:41:11', '2023-03-07 20:41:11'),
(2, 'Instagram', '2023-03-07 20:41:15', '2023-03-07 20:41:15'),
(3, 'Twitter', '2023-03-07 20:41:19', '2023-03-07 20:41:19'),
(4, 'Facebook', '2023-03-07 20:41:24', '2023-03-07 20:41:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2023_03_07_134948_create_item_virtual_tours_table', 1),
(5, '2023_03_07_135220_create_razen_project_master_kategori_projects_table', 1),
(6, '2023_03_07_135358_create_master_media_sosials_table', 1),
(7, '2023_03_07_135441_create_pivot_profil_razen_project_media_sosials_table', 1),
(8, '2023_03_07_135544_create_profil_razen_projects_table', 1),
(9, '2023_03_07_135921_create_razen_project_testimonials_table', 1),
(10, '2023_03_07_140048_create_razen_project_clients_table', 1),
(11, '2023_03_07_140230_create_razen_project_hero_sliders_table', 1),
(12, '2023_03_08_041950_add_collumn_kode_embed_to_item_virtual_tours', 2),
(13, '2023_03_08_174306_create_razen_project_layanans_table', 3),
(14, '2023_03_08_193812_create_razen_project_abouts_table', 4),
(15, '2023_03_08_194044_create_pivot_razen_project_abouts_table', 4),
(16, '2023_03_09_135453_drop_column_raze_project_about_id_to_pivot_razen_project_abouts', 5),
(17, '2023_03_09_135623_add_column_razen_project_about_id_to_pivot_razen_project_abouts', 5),
(18, '2023_03_09_155748_create_master_jabatan_tims_table', 6),
(19, '2023_03_09_160039_create_razen_project_section_tims_table', 6),
(20, '2023_03_09_160411_create_pivot_razen_project_section_tim_media_sosials_table', 6),
(22, '2023_03_14_191800_create_pivot_fitur_razen_project_fitur_perusahaans_table', 7),
(23, '2023_03_14_194127_drop_razen_project_fitur_perusahaans_table', 8),
(25, '2023_03_14_191517_create_razen_project_fitur_perusahaans_table', 9),
(26, '2023_03_14_194538_add_column_gambar_to_razen_project_fitur_perusahaans', 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pivot_fitur_razen_project_fitur_perusahaans`
--

CREATE TABLE `pivot_fitur_razen_project_fitur_perusahaans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `razen_project_fitur_perusahaan_id` bigint(20) UNSIGNED DEFAULT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pivot_fitur_razen_project_fitur_perusahaans`
--

INSERT INTO `pivot_fitur_razen_project_fitur_perusahaans` (`id`, `razen_project_fitur_perusahaan_id`, `judul`, `deskripsi`, `created_at`, `updated_at`) VALUES
(2, 1, 'ALWAYS AVAILABLE', 'all construction sites open for visitors, with 24/7 video surveillance being conducted at all objects', '2023-03-14 13:02:48', '2023-03-14 13:02:48'),
(3, 1, 'QUALIFIED AGENTS', 'We have a team of specialists capable of maximizing the result and delivering the projects', '2023-03-14 13:02:48', '2023-03-14 13:02:48'),
(4, 1, 'FAIR PRICES', 'you can be 100% sure that it will be delivered right on time, within the set budget limits', '2023-03-14 13:02:48', '2023-03-14 13:02:48'),
(5, 1, 'BEST OFFERS', 'All aspects of the operations being transparent and clear for clients and partners', '2023-03-14 13:02:48', '2023-03-14 13:02:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pivot_profil_razen_project_media_sosials`
--

CREATE TABLE `pivot_profil_razen_project_media_sosials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `master_media_sosial_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profil_razen_project_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tautan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pivot_razen_project_abouts`
--

CREATE TABLE `pivot_razen_project_abouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `razen_project_about_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pivot_razen_project_abouts`
--

INSERT INTO `pivot_razen_project_abouts` (`id`, `judul`, `deskripsi`, `created_at`, `updated_at`, `razen_project_about_id`) VALUES
(1, 'RELIABILITY', 'Razen Project has a cutting edge quality management system which ensures high quality standards at all sites.', '2023-03-09 07:09:05', '2023-03-09 07:09:05', 1),
(2, 'EXPERTISE', 'We have a team of specialists capable of maximizing the result and delivering the projects of any complexity.\r\n\r\nQUALITY', '2023-03-09 07:09:05', '2023-03-09 07:09:05', 1),
(3, 'QUALITY', 'The control mechanism allows secure & integrated monitoring of all stages of the works.', '2023-03-09 07:09:05', '2023-03-09 07:09:05', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pivot_razen_project_section_tim_media_sosials`
--

CREATE TABLE `pivot_razen_project_section_tim_media_sosials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `master_media_sosial_id` bigint(20) UNSIGNED DEFAULT NULL,
  `razen_project_section_tim_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tautan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pivot_razen_project_section_tim_media_sosials`
--

INSERT INTO `pivot_razen_project_section_tim_media_sosials` (`id`, `master_media_sosial_id`, `razen_project_section_tim_id`, `tautan`, `created_at`, `updated_at`) VALUES
(3, 1, 3, 'Razen Project', '2023-03-11 06:33:42', '2023-03-11 06:33:42'),
(4, 2, 3, 'Razen Project', '2023-03-11 06:33:42', '2023-03-11 06:33:42'),
(5, 2, 4, 'Razen Project', '2023-03-11 06:39:12', '2023-03-11 06:39:12'),
(6, 1, 4, 'Razen Project', '2023-03-11 06:39:12', '2023-03-11 06:39:12'),
(7, 1, 5, 'Razen Project', '2023-03-11 06:39:42', '2023-03-11 06:39:42'),
(8, 2, 5, 'Razen Project', '2023-03-11 06:39:42', '2023-03-11 06:39:42'),
(9, 2, 6, 'Razen Project', '2023-03-11 06:40:29', '2023-03-11 06:40:29'),
(10, 1, 6, 'Razen Project', '2023-03-11 06:40:29', '2023-03-11 06:40:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `profil_razen_projects`
--

CREATE TABLE `profil_razen_projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `profil_razen_projects`
--

INSERT INTO `profil_razen_projects` (`id`, `nama`, `pt`, `no_hp`, `email`, `logo`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 'Razen Project | Desain Arsitektur, Konstruksi & Renovasi', 'PT Razen Teknologi Indonesia', '082299449494', 'project@razen.co.id', '63ffd6d2b1155-230302.png', 'Yogyakarta', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `razen_project_abouts`
--

CREATE TABLE `razen_project_abouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `about` text COLLATE utf8mb4_unicode_ci,
  `misi` text COLLATE utf8mb4_unicode_ci,
  `tujuan` text COLLATE utf8mb4_unicode_ci,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `razen_project_abouts`
--

INSERT INTO `razen_project_abouts` (`id`, `about`, `misi`, `tujuan`, `gambar`, `created_at`, `updated_at`) VALUES
(1, 'Since its foundation the company has doubled its turnover year on year, with its staff numbers swelling accordingly.Today Razen Project has over 4,000 professionals.Razen Project has a team of specialists capable of maximizing the result.', 'We do only what we are great on. If we tackle a project you can be 100% sure that it will be delivered right on time, within the set budget limits and at the top level. We get all our liabilities insured, including third-party liabilities, thus indemnifying our clients against all risks.', 'Razen Project is a leading developer of A-grade commercial,its foundation the company has doubled its turnover year on year industrial and residential projects in USA. Since its foundation the company has doubled its turnover year on year, with its staff numbers swelling accordingly.', '64097c2969c17-230309.jpg', '2023-03-09 06:26:49', '2023-03-09 06:26:49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `razen_project_clients`
--

CREATE TABLE `razen_project_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `razen_project_clients`
--

INSERT INTO `razen_project_clients` (`id`, `nama`, `foto`, `created_at`, `updated_at`) VALUES
(1, 'Dilly', '6407a24ad7924-230308.png', '2023-03-07 20:44:58', '2023-03-07 20:44:58'),
(2, 'Amelie', '6407a25972663-230308.png', '2023-03-07 20:45:13', '2023-03-07 20:45:13'),
(3, 'Walkers', '6407a264cb0ca-230308.png', '2023-03-07 20:45:24', '2023-03-07 20:45:24'),
(4, 'Great Village', '6407a293a6399-230308.png', '2023-03-07 20:46:11', '2023-03-07 20:46:11'),
(5, 'Brand Binge', '6407a2a9845c2-230308.png', '2023-03-07 20:46:33', '2023-03-07 20:46:33'),
(6, 'Bortolini', '6407a2b5cc033-230308.png', '2023-03-07 20:46:45', '2023-03-07 20:46:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `razen_project_fitur_perusahaans`
--

CREATE TABLE `razen_project_fitur_perusahaans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul_pendek` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `razen_project_fitur_perusahaans`
--

INSERT INTO `razen_project_fitur_perusahaans` (`id`, `judul_pendek`, `judul`, `created_at`, `updated_at`, `gambar`) VALUES
(1, 'We Are Yellow Hats', 'WE INNOVATE & DESIGN', '2023-03-14 12:45:49', '2023-03-14 12:45:49', '64106c7d12a5d-230314.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `razen_project_hero_sliders`
--

CREATE TABLE `razen_project_hero_sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `heading` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` text COLLATE utf8mb4_unicode_ci,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `razen_project_hero_sliders`
--

INSERT INTO `razen_project_hero_sliders` (`id`, `heading`, `title`, `gambar`, `created_at`, `updated_at`) VALUES
(1, 'we innovate & design', 'We have a team capable of maximizing the result', '6407a2045263c-230308.jpg', '2023-03-07 20:43:48', '2023-03-07 20:43:48'),
(2, 'delivering professional expertise', 'Our promise is to build value into every project', '6407a2155140f-230308.jpg', '2023-03-07 20:44:05', '2023-03-07 20:44:05'),
(3, 'we innovate & design', 'We have a team capable of maximizing the result', '6407a2247869a-230308.jpg', '2023-03-07 20:44:20', '2023-03-07 20:44:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `razen_project_layanans`
--

CREATE TABLE `razen_project_layanans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `razen_project_layanans`
--

INSERT INTO `razen_project_layanans` (`id`, `judul`, `deskripsi`, `gambar`, `created_at`, `updated_at`) VALUES
(1, 'MEMPESONA & EFEKTIF', 'Desain rumah kami lebih mempesona, sehingga selain nyaman, juga membuat bangga. Penggambaran layout kami sangat efektif dan flow arsitekturnya bagus, sehingga nyaman untuk istana keluarga Anda.', '64086bb148296-230308.jpg', '2023-03-08 11:04:17', '2023-03-08 11:04:17'),
(2, 'PILIHAN MATERIAL', 'Material berkualitas tidak akan menampilkan kesempurnaannya, apabila tidak dipasang dengan baik. Kami paham Anda sudah menginvestasikan budget cukup tinggi untuk memilih material berkualitas bagi istana Anda.', '64086be8ac183-230308.jpg', '2023-03-08 11:05:12', '2023-03-08 11:05:12'),
(3, 'BEBAS BOCOR', 'Razen Project juga mempertimbangkan konstruksi jangka panjang, BEBAS BOCOR, BEBAS KORSLETING DAN BEBAS RETAK RAMBUT.', '64086bfa028d8-230308.jpg', '2023-03-08 11:05:30', '2023-03-08 11:05:30'),
(4, 'TILING & PAINTING', 'Tiling is an effective way to add elegance & style to any bath or kitchen Yellow Hats Remodeling specializes in tile installation and works directly with each homeowner.', '64086c1cddc55-230308.jpg', '2023-03-08 11:06:04', '2023-03-08 11:06:04'),
(5, 'RENOVATIONS', 'Yellow Hats has full service renovation expertise, we are equipped with the right tools and people to handle projects of all sizes & provide high quality renovation works.', '64086c2bb184c-230308.jpg', '2023-03-08 11:06:19', '2023-03-08 11:06:19'),
(6, 'DESIGN & BUILD', 'Yellow Hats aim to eliminate the task of dividing your project between different architecture and construction company as we offers design and build services for you.', '64086c389fd2c-230308.jpg', '2023-03-08 11:06:32', '2023-03-08 11:06:32'),
(7, 'CONSULTING', 'Whether you know exactly how really you want your new home to be or just looking for new ideas to build your new house, offers priceless resources to help bring those ideas to life.', '64086c487ddd6-230308.jpg', '2023-03-08 11:06:48', '2023-03-08 11:06:48'),
(8, 'MANAGEMENT', 'Yellow Hats has full service renovation expertise, we are equipped with the right tools and people to handle projects of all sizes & provide high quality renovation works.', '64086c550e91a-230308.jpg', '2023-03-08 11:07:01', '2023-03-08 11:07:01'),
(9, 'HARDWOOD FLOORING', 'Yellow Hats aim to eliminate the task of dividing your project between different architecture and construction company as we offers design and build services for you.', '64086c6307aa7-230308.jpg', '2023-03-08 11:07:15', '2023-03-08 11:07:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `razen_project_master_kategori_projects`
--

CREATE TABLE `razen_project_master_kategori_projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `razen_project_master_kategori_projects`
--

INSERT INTO `razen_project_master_kategori_projects` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Gardening', '2023-03-07 20:41:58', '2023-03-07 20:41:58'),
(2, 'LANDSCAPING', '2023-03-07 20:42:03', '2023-03-07 20:42:03'),
(3, 'ARCHITECTURE', '2023-03-07 20:42:16', '2023-03-07 20:42:16'),
(4, 'RENOVATION', '2023-03-07 20:42:24', '2023-03-07 20:42:24'),
(5, 'INTERIOR', '2023-03-07 20:42:38', '2023-03-07 20:42:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `razen_project_section_tims`
--

CREATE TABLE `razen_project_section_tims` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `master_jabatan_tim_id` bigint(20) UNSIGNED DEFAULT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `razen_project_section_tims`
--

INSERT INTO `razen_project_section_tims` (`id`, `master_jabatan_tim_id`, `nama`, `gambar`, `created_at`, `updated_at`) VALUES
(3, 1, 'Mahmoud Baghagho', '640c20c60b356-230311.jpg', '2023-03-11 06:33:42', '2023-03-11 06:33:42'),
(4, 2, 'Mohamed Habaza', '640c22106048e-230311.jpg', '2023-03-11 06:39:12', '2023-03-11 06:39:12'),
(5, 3, 'Ahmed Hassan', '640c222ee7eb2-230311.jpg', '2023-03-11 06:39:42', '2023-03-11 06:39:42'),
(6, 4, 'Fouad Badawy', '640c225d49bfd-230311.jpg', '2023-03-11 06:40:29', '2023-03-11 06:40:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `razen_project_testimonials`
--

CREATE TABLE `razen_project_testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `testimonial` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `razen_project_testimonials`
--

INSERT INTO `razen_project_testimonials` (`id`, `nama`, `jabatan`, `foto`, `testimonial`, `created_at`, `updated_at`) VALUES
(1, 'Begha', 'Art Director', '6407a2df1c976-230308.png', 'The company’s experts have accumulated valuable experience in green development, being savvy to all aspects of the certification process and requirements.', '2023-03-07 20:47:27', '2023-03-07 20:47:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color_layout` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nav_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `placement` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `behaviour` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `layout` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `radius` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `color_layout`, `nav_color`, `placement`, `behaviour`, `layout`, `radius`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Razen Project', 'razen_project@razen.com', NULL, '$2y$10$vUlaHLsUBySNV17OB4bA0OgYjwnU1ThdLwFcLlbghO900K8Jz.1f.', 'light-blue', 'default', 'vertical', 'pinned', 'fluid', 'rounded', NULL, NULL, '2023-03-10 04:23:21');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `item_virtual_tours`
--
ALTER TABLE `item_virtual_tours`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `master_jabatan_tims`
--
ALTER TABLE `master_jabatan_tims`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `master_media_sosials`
--
ALTER TABLE `master_media_sosials`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `pivot_fitur_razen_project_fitur_perusahaans`
--
ALTER TABLE `pivot_fitur_razen_project_fitur_perusahaans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pivot_profil_razen_project_media_sosials`
--
ALTER TABLE `pivot_profil_razen_project_media_sosials`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pivot_razen_project_abouts`
--
ALTER TABLE `pivot_razen_project_abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pivot_razen_project_section_tim_media_sosials`
--
ALTER TABLE `pivot_razen_project_section_tim_media_sosials`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `profil_razen_projects`
--
ALTER TABLE `profil_razen_projects`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `razen_project_abouts`
--
ALTER TABLE `razen_project_abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `razen_project_clients`
--
ALTER TABLE `razen_project_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `razen_project_fitur_perusahaans`
--
ALTER TABLE `razen_project_fitur_perusahaans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `razen_project_hero_sliders`
--
ALTER TABLE `razen_project_hero_sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `razen_project_layanans`
--
ALTER TABLE `razen_project_layanans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `razen_project_master_kategori_projects`
--
ALTER TABLE `razen_project_master_kategori_projects`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `razen_project_section_tims`
--
ALTER TABLE `razen_project_section_tims`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `razen_project_testimonials`
--
ALTER TABLE `razen_project_testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `item_virtual_tours`
--
ALTER TABLE `item_virtual_tours`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `master_jabatan_tims`
--
ALTER TABLE `master_jabatan_tims`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `master_media_sosials`
--
ALTER TABLE `master_media_sosials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `pivot_fitur_razen_project_fitur_perusahaans`
--
ALTER TABLE `pivot_fitur_razen_project_fitur_perusahaans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `pivot_profil_razen_project_media_sosials`
--
ALTER TABLE `pivot_profil_razen_project_media_sosials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pivot_razen_project_abouts`
--
ALTER TABLE `pivot_razen_project_abouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pivot_razen_project_section_tim_media_sosials`
--
ALTER TABLE `pivot_razen_project_section_tim_media_sosials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `profil_razen_projects`
--
ALTER TABLE `profil_razen_projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `razen_project_abouts`
--
ALTER TABLE `razen_project_abouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `razen_project_clients`
--
ALTER TABLE `razen_project_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `razen_project_fitur_perusahaans`
--
ALTER TABLE `razen_project_fitur_perusahaans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `razen_project_hero_sliders`
--
ALTER TABLE `razen_project_hero_sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `razen_project_layanans`
--
ALTER TABLE `razen_project_layanans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `razen_project_master_kategori_projects`
--
ALTER TABLE `razen_project_master_kategori_projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `razen_project_section_tims`
--
ALTER TABLE `razen_project_section_tims`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `razen_project_testimonials`
--
ALTER TABLE `razen_project_testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
