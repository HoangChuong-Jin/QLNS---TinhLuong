-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2022 at 12:08 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qlns2`
--
CREATE DATABASE IF NOT EXISTS `qlns2` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `qlns2`;

-- --------------------------------------------------------

--
-- Table structure for table `bangcap`
--

CREATE TABLE `bangcap` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mabangcap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tenbangcap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bangcap`
--

INSERT INTO `bangcap` (`id`, `mabangcap`, `tenbangcap`, `created_at`, `updated_at`) VALUES
(1, 'MBC094201', 'Thạc sĩ quản trị kinh doanh', NULL, '2022-04-17 15:34:09'),
(2, 'MBC094202', 'Thạc sĩ công nghệ thông tin', NULL, '2022-04-15 18:35:49'),
(3, 'MBC094203', 'Cử nhân quản trị kinh doanh', NULL, '2022-04-15 18:35:52'),
(4, 'MBC094204', 'Cử nhân kế toán', NULL, '2022-04-15 18:35:55'),
(5, 'MBC094205', 'Không', NULL, '2022-04-15 18:35:57');

-- --------------------------------------------------------

--
-- Table structure for table `bangluong`
--

CREATE TABLE `bangluong` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tenbangluong` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngaybatdau` date NOT NULL,
  `ngayketthuc` date NOT NULL,
  `ghichu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bangluong`
--

INSERT INTO `bangluong` (`id`, `tenbangluong`, `ngaybatdau`, `ngayketthuc`, `ghichu`, `created_at`, `updated_at`) VALUES
(1, 'tháng 04 năm 2022', '2022-04-01', '2022-04-30', NULL, NULL, NULL),
(2, 'tháng 03 năm 2022', '2022-03-01', '2022-03-31', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `chucvu`
--

CREATE TABLE `chucvu` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `machucvu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tenchucvu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mucluong` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chucvu`
--

INSERT INTO `chucvu` (`id`, `machucvu`, `tenchucvu`, `mucluong`, `created_at`, `updated_at`) VALUES
(1, 'MCV094201', 'Giám đốc', 0, '2022-04-15 14:26:23', '2022-04-15 18:02:02'),
(2, 'MCV094202', 'Phóng giám đốc', 0, NULL, '2022-04-15 17:35:17'),
(3, 'MCV094203', 'Trưởng phòng', 0, NULL, '2022-04-15 17:35:20'),
(4, 'MCV094204', 'Phó phòng', 0, NULL, '2022-04-15 17:35:23'),
(5, 'MCV094205', 'Nhân viên', 200000, NULL, '2022-04-15 17:31:25');

-- --------------------------------------------------------

--
-- Table structure for table `chuyenmon`
--

CREATE TABLE `chuyenmon` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `machuyenmon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tenchuyenmon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chuyenmon`
--

INSERT INTO `chuyenmon` (`id`, `machuyenmon`, `tenchuyenmon`, `created_at`, `updated_at`) VALUES
(1, 'MCM094201', 'Quản trị kinh doanh', NULL, '2022-04-15 18:18:13'),
(2, 'MCM094202', 'Công nghệ thông tin', NULL, '2022-04-15 18:18:15'),
(3, 'MCM094203', 'Kế toán', NULL, '2022-04-15 18:18:17'),
(4, 'MCM094204', 'Maketing', NULL, '2022-04-15 18:18:18');

-- --------------------------------------------------------

--
-- Table structure for table `dantoc`
--

CREATE TABLE `dantoc` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tendantoc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dantoc`
--

INSERT INTO `dantoc` (`id`, `tendantoc`, `created_at`, `updated_at`) VALUES
(1, 'Kinh', NULL, NULL),
(2, 'Khmer', NULL, NULL),
(3, 'Hoa', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `khoantru`
--

CREATE TABLE `khoantru` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `makhoantru` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tenkhoantru` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `giatri` double NOT NULL,
  `ghichu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `khoantru`
--

INSERT INTO `khoantru` (`id`, `makhoantru`, `tenkhoantru`, `giatri`, `ghichu`, `created_at`, `updated_at`) VALUES
(1, 'MKT001', 'Bảo Hiểm Y Tế', 8, '8% giá trị tiền lương cơ bản của nhân viên', NULL, NULL),
(2, 'MKT002', 'Bảo Hiểm Thất Nghiệp', 1, '1% giá trị tiền lương cơ bản của nhân viên\r\n', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `loainhanvien`
--

CREATE TABLE `loainhanvien` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `maloainv` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tenloainv` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `loainhanvien`
--

INSERT INTO `loainhanvien` (`id`, `maloainv`, `tenloainv`, `created_at`, `updated_at`) VALUES
(1, 'MLV094201', 'Nhân viên chính thức', NULL, '2022-04-17 20:58:54'),
(2, 'MLN094202', 'Nhân viên thời vụ', NULL, '2022-04-17 20:58:56'),
(3, 'MLV094203', 'Nhân viên thực tập', NULL, '2022-04-17 20:58:58');

-- --------------------------------------------------------

--
-- Table structure for table `loai_san_phams`
--

CREATE TABLE `loai_san_phams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tenloai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tenloai_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `luong`
--

CREATE TABLE `luong` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `maluong` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nhanvien_id` bigint(20) UNSIGNED NOT NULL,
  `chucvu_id` bigint(20) UNSIGNED NOT NULL,
  `bangluong_id` bigint(20) UNSIGNED NOT NULL,
  `ngaycong` int(50) NOT NULL,
  `luongthang` double NOT NULL,
  `phucap` double NOT NULL,
  `khoantru` double NOT NULL,
  `tamung` double DEFAULT NULL,
  `thuclanh` double NOT NULL,
  `ngaycham` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_04_11_165959_create_loai_san_phams_table', 1),
(6, '2022_04_14_134139_create_chuc_vus_table', 2),
(7, '2022_04_14_135028_create_phong_bans_table', 3),
(8, '2022_04_14_135229_create_chuyen_mons_table', 4),
(9, '2022_04_14_135351_create_bang_caps_table', 5),
(10, '2022_04_14_135547_create_loai_nhan_viens_table', 6),
(11, '2022_04_14_140101_create_dan_tocs_table', 7),
(12, '2022_04_14_140211_create_quoc_tiches_table', 8),
(13, '2022_04_14_140333_create_ton_giaos_table', 9),
(14, '2022_04_14_140439_create_trinh_dos_table', 10),
(15, '2022_04_14_140547_create_tinh_trang_hon_nhans_table', 11),
(16, '2022_04_14_140818_create_nhan_viens_table', 12),
(17, '2022_04_19_085350_create_nhom_luongs_table', 13),
(18, '2022_04_19_085651_create_luongs_table', 14),
(19, '2022_04_19_090710_create_phu_caps_table', 15),
(20, '2022_04_19_090913_create_khoan_trus_table', 16),
(21, '2022_04_19_113022_create_luongs_table', 17);

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien`
--

CREATE TABLE `nhanvien` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `manv` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tennv` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sdt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gmail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hinhanh` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gioitinh` tinyint(4) NOT NULL,
  `ngaysinh` date NOT NULL,
  `noisinh` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cmnd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `noicap_cmnd` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ngaycap_cmnd` date DEFAULT NULL,
  `hokhau` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tamtru` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trangthai` tinyint(4) NOT NULL DEFAULT 1,
  `honnhan_id` bigint(20) UNSIGNED DEFAULT NULL,
  `quoctich_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tongiao_id` bigint(20) UNSIGNED DEFAULT NULL,
  `dantoc_id` bigint(20) UNSIGNED DEFAULT NULL,
  `loainv_id` bigint(20) UNSIGNED NOT NULL,
  `chuyenmon_id` bigint(20) UNSIGNED NOT NULL,
  `trinhdo_id` bigint(20) UNSIGNED NOT NULL,
  `bangcap_id` bigint(20) UNSIGNED NOT NULL,
  `chucvu_id` bigint(20) UNSIGNED NOT NULL,
  `phongban_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nhanvien`
--

INSERT INTO `nhanvien` (`id`, `manv`, `tennv`, `sdt`, `gmail`, `hinhanh`, `gioitinh`, `ngaysinh`, `noisinh`, `cmnd`, `noicap_cmnd`, `ngaycap_cmnd`, `hokhau`, `tamtru`, `trangthai`, `honnhan_id`, `quoctich_id`, `tongiao_id`, `dantoc_id`, `loainv_id`, `chuyenmon_id`, `trinhdo_id`, `bangcap_id`, `chucvu_id`, `phongban_id`, `created_at`, `updated_at`) VALUES
(8, 'MNV094201', 'Nguyễn Hoàng Chương', '0942074741', 'hosonhc@gmail.com', 'UIMG_2022042462650904d1c67.jpg', 1, '2000-12-08', 'An Giang, hhhhh', '352606563', 'An Giang', NULL, 'Vĩnh Phú, Thoại Sơn, An Giang, lx', 'Đông Thanh, Mỹ Thạnh, Long Xuyên, An Giang, hhhh', 1, 1, 1, 1, 1, 3, 2, 5, 1, 4, 6, NULL, '2022-04-24 08:23:32'),
(9, 'MNV094202', 'Nguyễn Thị Huỳnh Anh', '0389545641', 'nthanh@gmail.com', 'UIMG_20220418625c6d53175cb.jpg', 0, '2000-03-11', NULL, '352606563', 'An Giang', NULL, 'Mỹ Bình, Long Xuyên, An Giang', 'Mỹ Bình, Long Xuyên, An Giang', 0, 1, 1, 1, 1, 3, 2, 5, 5, 5, 6, NULL, '2022-04-24 08:23:40'),
(10, 'MNV094203', 'Nguyễn Mai Hương', '0123456789', 'nmhuong@gmail.com', 'UIMG_20220418625c72e31ae9a.jpg', 0, '2000-03-27', NULL, '352606563', NULL, NULL, 'Mỹ Thạnh, Long Xuyên, An Giang', 'Mỹ Thạnh, Long Xuyên, An Giang', 1, 1, 1, 1, 1, 3, 1, 5, 5, 5, 2, NULL, '2022-04-17 20:04:51'),
(11, 'MNV0942015', 'Nguyễn Mai Hương', '022155', 'hosonhc222@gmail.com', 'UIMG_202204246264dff196041.jpg', 1, '2000-12-08', NULL, '56265', NULL, NULL, 'ag', 'ag', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, NULL, '2022-04-24 05:28:17'),
(12, 'MNV0942020', 'Nguyễn Mai Hương', '022155', 'nmhuong2222@gmail.com', 'UIMG_202204246264e36134460.jpg', 1, '2000-12-08', NULL, '56265', NULL, NULL, 'ag', 'ag', 1, NULL, NULL, NULL, NULL, 2, 1, 1, 1, 2, 1, '2022-04-24 05:42:57', '2022-04-24 05:42:57'),
(13, 'MNV09420222', 'Nguyễn Mai Hương', '022155', 'nmhuong333@gmail.com', 'UIMG_20220424626509213ffbd.jpg', 1, '2000-12-08', NULL, '56265', NULL, NULL, 'ag', 'ag', 1, NULL, NULL, NULL, NULL, 1, 1, 1, 1, 1, 1, '2022-04-24 05:48:13', '2022-04-24 08:24:01');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `phongban`
--

CREATE TABLE `phongban` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `maphongban` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tenphongban` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `phongban`
--

INSERT INTO `phongban` (`id`, `maphongban`, `tenphongban`, `created_at`, `updated_at`) VALUES
(1, 'MPB094201', 'Phòng giám đốc', NULL, '2022-04-15 18:01:52'),
(2, 'MPB094202', 'Phòng kế toán', NULL, '2022-04-15 18:01:55'),
(6, 'MPB094203', 'Phòng kỹ thuật', NULL, '2022-04-15 18:20:13');

-- --------------------------------------------------------

--
-- Table structure for table `phucap`
--

CREATE TABLE `phucap` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `maphucap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tenphucap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sotien` double NOT NULL,
  `ghichu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `chucvu_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `phucap`
--

INSERT INTO `phucap` (`id`, `maphucap`, `tenphucap`, `sotien`, `ghichu`, `chucvu_id`, `created_at`, `updated_at`) VALUES
(1, 'MPC001', 'Phụ cấp nhân viên', 20000, NULL, 5, NULL, NULL),
(2, 'MCV002', 'Phụ cấp p.trưởng phòng', 50000, NULL, 4, NULL, NULL),
(3, 'MVC004', 'Phụ cấp trưởng phòng', 100000, NULL, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `quoctich`
--

CREATE TABLE `quoctich` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tenquoctich` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quoctich`
--

INSERT INTO `quoctich` (`id`, `tenquoctich`, `created_at`, `updated_at`) VALUES
(1, 'Việt Nam', NULL, NULL),
(2, 'Campuchia', NULL, NULL),
(3, 'Lào', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tinhtranghonnhan`
--

CREATE TABLE `tinhtranghonnhan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tthonnhan` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tinhtranghonnhan`
--

INSERT INTO `tinhtranghonnhan` (`id`, `tthonnhan`, `created_at`, `updated_at`) VALUES
(1, 0, NULL, NULL),
(2, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tongiao`
--

CREATE TABLE `tongiao` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tentongiao` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tongiao`
--

INSERT INTO `tongiao` (`id`, `tentongiao`, `created_at`, `updated_at`) VALUES
(1, 'Phật giáo', NULL, NULL),
(2, 'Thiên chúa giáo', NULL, NULL),
(3, 'Đạo tinh lành', NULL, NULL),
(4, 'Hồi giáo', NULL, NULL),
(5, 'Hồi giáo', NULL, NULL),
(6, 'Không', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `trinhdo`
--

CREATE TABLE `trinhdo` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tentrinhdo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trinhdo`
--

INSERT INTO `trinhdo` (`id`, `tentrinhdo`, `created_at`, `updated_at`) VALUES
(1, 'Không', NULL, NULL),
(2, '12/12', NULL, NULL),
(3, 'Trung cấp', NULL, NULL),
(4, 'Cao đẳng', NULL, NULL),
(5, 'Đại học', NULL, NULL),
(6, 'Cao học', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nhanvien_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` tinyint(4) NOT NULL DEFAULT 2,
  `lock` tinyint(4) NOT NULL DEFAULT 1,
  `avatar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nhanvien_id`, `name`, `email`, `email_verified_at`, `password`, `level`, `lock`, `avatar`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 8, 'chuong', 'admin@gmail.com', NULL, '$2y$10$VoEGIzN1eM71RDLyyyR.9urbMe83Jqm4FC19eGx0j37boWZt8ZUz6', 1, 1, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bangcap`
--
ALTER TABLE `bangcap`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `bangcap_mabangcap_unique` (`mabangcap`);

--
-- Indexes for table `bangluong`
--
ALTER TABLE `bangluong`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `bangluong_tenbangluong_unique` (`tenbangluong`);

--
-- Indexes for table `chucvu`
--
ALTER TABLE `chucvu`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `chucvu_machucvu_unique` (`machucvu`);

--
-- Indexes for table `chuyenmon`
--
ALTER TABLE `chuyenmon`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `chuyenmon_machuyenmon_unique` (`machuyenmon`);

--
-- Indexes for table `dantoc`
--
ALTER TABLE `dantoc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `khoantru`
--
ALTER TABLE `khoantru`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `khoantru_makhoantru_unique` (`makhoantru`);

--
-- Indexes for table `loainhanvien`
--
ALTER TABLE `loainhanvien`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `loainhanvien_maloainv_unique` (`maloainv`);

--
-- Indexes for table `loai_san_phams`
--
ALTER TABLE `loai_san_phams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `luong`
--
ALTER TABLE `luong`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `luong_maluong_unique` (`maluong`),
  ADD KEY `luong_nhanvien_id_foreign` (`nhanvien_id`),
  ADD KEY `luong_chucvu_id_foreign` (`chucvu_id`),
  ADD KEY `luong_bangluong_id_foreign` (`bangluong_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nhanvien_manv_unique` (`manv`),
  ADD KEY `nhanvien_honnhan_id_foreign` (`honnhan_id`),
  ADD KEY `nhanvien_quoctich_id_foreign` (`quoctich_id`),
  ADD KEY `nhanvien_tongiao_id_foreign` (`tongiao_id`),
  ADD KEY `nhanvien_dantoc_id_foreign` (`dantoc_id`),
  ADD KEY `nhanvien_loainv_id_foreign` (`loainv_id`),
  ADD KEY `nhanvien_chuyenmon_id_foreign` (`chuyenmon_id`),
  ADD KEY `nhanvien_trinhdo_id_foreign` (`trinhdo_id`),
  ADD KEY `nhanvien_bangcap_id_foreign` (`bangcap_id`),
  ADD KEY `nhanvien_chucvu_id_foreign` (`chucvu_id`),
  ADD KEY `nhanvien_phongban_id_foreign` (`phongban_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `phongban`
--
ALTER TABLE `phongban`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `phongban_maphongban_unique` (`maphongban`);

--
-- Indexes for table `phucap`
--
ALTER TABLE `phucap`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `phucap_maphucap_unique` (`maphucap`),
  ADD KEY `phucap_chucvu_id_foreign` (`chucvu_id`);

--
-- Indexes for table `quoctich`
--
ALTER TABLE `quoctich`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tinhtranghonnhan`
--
ALTER TABLE `tinhtranghonnhan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tongiao`
--
ALTER TABLE `tongiao`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trinhdo`
--
ALTER TABLE `trinhdo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_nhanvien_id_foreign` (`nhanvien_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bangcap`
--
ALTER TABLE `bangcap`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `bangluong`
--
ALTER TABLE `bangluong`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `chucvu`
--
ALTER TABLE `chucvu`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `chuyenmon`
--
ALTER TABLE `chuyenmon`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `dantoc`
--
ALTER TABLE `dantoc`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `khoantru`
--
ALTER TABLE `khoantru`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `loainhanvien`
--
ALTER TABLE `loainhanvien`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `loai_san_phams`
--
ALTER TABLE `loai_san_phams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `luong`
--
ALTER TABLE `luong`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phongban`
--
ALTER TABLE `phongban`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `phucap`
--
ALTER TABLE `phucap`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `quoctich`
--
ALTER TABLE `quoctich`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tinhtranghonnhan`
--
ALTER TABLE `tinhtranghonnhan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tongiao`
--
ALTER TABLE `tongiao`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `trinhdo`
--
ALTER TABLE `trinhdo`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `luong`
--
ALTER TABLE `luong`
  ADD CONSTRAINT `luong_bangluong_id_foreign` FOREIGN KEY (`bangluong_id`) REFERENCES `bangluong` (`id`),
  ADD CONSTRAINT `luong_chucvu_id_foreign` FOREIGN KEY (`chucvu_id`) REFERENCES `chucvu` (`id`),
  ADD CONSTRAINT `luong_nhanvien_id_foreign` FOREIGN KEY (`nhanvien_id`) REFERENCES `nhanvien` (`id`);

--
-- Constraints for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD CONSTRAINT `nhanvien_bangcap_id_foreign` FOREIGN KEY (`bangcap_id`) REFERENCES `bangcap` (`id`),
  ADD CONSTRAINT `nhanvien_chucvu_id_foreign` FOREIGN KEY (`chucvu_id`) REFERENCES `chucvu` (`id`),
  ADD CONSTRAINT `nhanvien_chuyenmon_id_foreign` FOREIGN KEY (`chuyenmon_id`) REFERENCES `chuyenmon` (`id`),
  ADD CONSTRAINT `nhanvien_dantoc_id_foreign` FOREIGN KEY (`dantoc_id`) REFERENCES `dantoc` (`id`),
  ADD CONSTRAINT `nhanvien_honnhan_id_foreign` FOREIGN KEY (`honnhan_id`) REFERENCES `tinhtranghonnhan` (`id`),
  ADD CONSTRAINT `nhanvien_loainv_id_foreign` FOREIGN KEY (`loainv_id`) REFERENCES `loainhanvien` (`id`),
  ADD CONSTRAINT `nhanvien_phongban_id_foreign` FOREIGN KEY (`phongban_id`) REFERENCES `phongban` (`id`),
  ADD CONSTRAINT `nhanvien_quoctich_id_foreign` FOREIGN KEY (`quoctich_id`) REFERENCES `quoctich` (`id`),
  ADD CONSTRAINT `nhanvien_tongiao_id_foreign` FOREIGN KEY (`tongiao_id`) REFERENCES `tongiao` (`id`),
  ADD CONSTRAINT `nhanvien_trinhdo_id_foreign` FOREIGN KEY (`trinhdo_id`) REFERENCES `trinhdo` (`id`);

--
-- Constraints for table `phucap`
--
ALTER TABLE `phucap`
  ADD CONSTRAINT `phucap_chucvu_id_foreign` FOREIGN KEY (`chucvu_id`) REFERENCES `chucvu` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_nhanvien_id_foreign` FOREIGN KEY (`nhanvien_id`) REFERENCES `nhanvien` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
