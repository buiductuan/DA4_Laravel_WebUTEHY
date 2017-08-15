-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 18, 2017 at 05:37 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `utehy_edu`
--

-- --------------------------------------------------------

--
-- Table structure for table `album_file`
--

CREATE TABLE `album_file` (
  `id` int(10) UNSIGNED NOT NULL,
  `orderBy` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'none.png',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `album_file`
--

INSERT INTO `album_file` (`id`, `orderBy`, `name`, `alias`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 0, 'Album file 1', 'album-file-1', 'none.png', 1, '2017-05-06 19:25:12', '2017-05-06 19:25:12'),
(3, 0, 'Album file 3898989', 'album-file-3898989', 'none.png', 0, '2017-05-06 19:28:43', '2017-05-06 19:43:50');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `parentID` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `orderBy` int(10) NOT NULL DEFAULT '0',
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'none.png',
  `desc` text COLLATE utf8_unicode_ci NOT NULL,
  `meta_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta_desc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `isShowNav` tinyint(1) NOT NULL DEFAULT '0',
  `isShowContent` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parentID`, `name`, `alias`, `orderBy`, `image`, `desc`, `meta_key`, `meta_desc`, `user_id`, `status`, `isShowNav`, `isShowContent`, `created_at`, `updated_at`) VALUES
(1, 0, 'Tuyển sinh', 'tuyen-sinh', 0, 'none.png', '<p>Fuga totam reiciendis qui architecto fugiat nemo. Consequatur recusandae qui cupiditate eos quod.</p>\r\n', 'tuyển sinh', 'tuyển sinh', 1, 1, 0, 1, '2017-04-16 17:00:00', '2017-04-24 19:47:56'),
(2, 0, 'Khoa học và công nghệ', 'khoa-hoc-va-cong-nghe', 0, 'none.png', '<p>Fuga totam reiciendis qui architecto fugiat nemo. Consequatur recusandae qui cupiditate eos quod.</p>\r\n', 'Khoa học và công nghệ', 'khoa học và công nghệ', 1, 1, 0, 1, '2017-04-16 17:00:00', '2017-04-24 19:48:33'),
(3, 0, 'Việc làm', 'viec-lam', 0, 'none.png', '<p>Việc làm</p>\r\n', 'Việc làm', 'Việc làm', 1, 1, 0, 1, '2017-04-23 18:17:40', '2017-04-24 19:47:19'),
(11, 1, 'Tuyển sinh đại học', 'tuyen-sinh-dai-hoc', 0, 'none.png', 'Tuyển sinh đại học', 'Tuyển sinh đại học', 'Tuyển sinh đại học', 1, 1, 0, 0, '2017-04-24 00:02:11', '2017-04-24 00:02:11'),
(12, 1, 'Điểm chuẩn', 'diem-chuan', 0, 'none.png', 'Điểm chuẩn', 'Điểm chuẩn', 'Điểm chuẩn', 1, 1, 0, 0, '2017-04-24 00:03:36', '2017-04-24 00:03:36'),
(13, 1, 'Danh sách trúng tuyển', 'danh-sach-trung-tuyen', 0, 'none.png', 'Danh sách trúng tuyển', 'Danh sách trúng tuyển', 'Danh sách trúng tuyển', 1, 1, 0, 0, '2017-04-24 00:03:52', '2017-04-24 00:03:52'),
(14, 1, 'Tuyển sinh sau đại học', 'tuyen-sinh-sau-dai-hoc', 0, 'none.png', 'Tuyển sinh sau đại học', 'Tuyển sinh sau đại học', 'Tuyển sinh sau đại học', 1, 1, 0, 0, '2017-04-24 00:04:14', '2017-04-24 00:04:14'),
(15, 0, 'Đào tạo', 'dao-tao', 2, 'none.png', '<p>Đào tạo</p>\r\n', 'Đào tạo', 'Đào tạo', 1, 1, 1, 1, '2017-04-24 00:05:59', '2017-04-24 19:48:05'),
(17, 0, 'Tin tức', 'tin-tuc', 4, 'none.png', '<p>Tin tức</p>\r\n', 'Tin tức', 'Tin tức', 1, 1, 1, 1, '2017-04-24 00:06:27', '2017-04-24 19:48:15'),
(18, 0, 'Sinh viên', 'sinh-vien', 0, 'none.png', '<p>Sinh viên</p>\r\n', 'Sinh viên', 'Sinh viên', 1, 1, 0, 1, '2017-04-24 00:06:40', '2017-04-24 19:48:43'),
(19, 15, 'Quy mô đào tạo', 'quy-mo-dao-tao', 0, 'none.png', 'Quy mô đào tạo', 'Quy mô đào tạo', 'Quy mô đào tạo', 1, 1, 0, 0, '2017-04-24 06:14:56', '2017-04-24 06:14:56'),
(20, 15, 'Đào tạo sau đại học', 'dao-tao-sau-dai-hoc', 0, 'none.png', 'Đào tạo sau đại học', 'Đào tạo sau đại học', 'Đào tạo sau đại học', 1, 1, 0, 0, '2017-04-24 06:15:25', '2017-04-24 06:15:25'),
(21, 15, 'Đào tạo Đại học - Cao đẳng', 'dao-tao-dai-hoc-cao-dang', 0, 'none.png', 'Đào tạo Đại học - Cao đẳng', 'Đào tạo Đại học - Cao đẳng', 'Đào tạo Đại học - Cao đẳng', 1, 1, 0, 0, '2017-04-24 06:15:47', '2017-04-24 06:15:47'),
(22, 15, 'Đào tạo Đại học VHVL', 'dao-tao-dai-hoc-vhvl', 0, 'none.png', 'Đào tạo Đại học VHVL', 'Đào tạo Đại học VHVL', 'Đào tạo Đại học VHVL', 1, 1, 0, 0, '2017-04-24 06:16:17', '2017-04-24 06:16:17'),
(23, 15, 'Hợp tác đào tạo', 'hop-tac-dao-tao', 0, 'none.png', 'Hợp tác đào tạo', 'Hợp tác đào tạo', 'Hợp tác đào tạo', 1, 1, 0, 0, '2017-04-24 06:16:39', '2017-04-24 06:16:39'),
(25, 15, 'Cơ hội việc làm', 'co-hoi-viec-lam', 0, 'none.png', 'Cơ hội việc làm', 'Cơ hội việc làm', 'Cơ hội việc làm', 1, 1, 0, 0, '2017-04-24 06:19:46', '2017-04-24 06:19:46'),
(26, 17, 'Tin tức trong trường', 'tin-tuc-trong-truong', 0, 'none.png', 'Tin tức trong trường', 'Tin tức trong trường', 'Tin tức trong trường', 1, 1, 0, 0, '2017-04-24 06:20:32', '2017-04-24 06:20:32'),
(27, 17, 'Tin tức ngoài trường', 'tin-tuc-ngoai-truong', 0, 'none.png', 'Tin tức ngoài trường', 'Tin tức ngoài trường', 'Tin tức ngoài trường', 1, 1, 0, 0, '2017-04-24 06:21:50', '2017-04-24 06:21:50'),
(28, 2, 'Định hướng NCKH', 'dinh-huong-nckh', 0, 'none.png', '<p>Định hướng NCKH</p>\r\n', 'Định hướng NCKH', 'Định hướng NCKH', 1, 1, 0, 0, '2017-04-24 06:22:47', '2017-04-24 06:47:54'),
(29, 2, 'Danh sách đề tài', 'danh-sach-de-tai', 0, 'none.png', 'Danh sách đề tài', 'Danh sách đề tài', 'Danh sách đề tài', 1, 1, 0, 0, '2017-04-24 06:48:48', '2017-04-24 06:48:48'),
(30, 2, 'Kết quả', 'ket-qua', 0, 'none.png', 'Kết quả', 'Kết quả', 'Kết quả', 1, 1, 0, 0, '2017-04-24 06:49:05', '2017-04-24 06:49:05'),
(31, 2, 'Tin tức NCKH', 'tin-tuc-nckh', 0, 'none.png', 'Tin tức NCKH', 'Tin tức NCKH', 'Tin tức NCKH', 1, 1, 0, 0, '2017-04-24 06:49:24', '2017-04-24 06:49:24'),
(32, 2, 'Tạp chí NCKH', 'tap-chi-nckh', 0, 'none.png', 'Tạp chí NCKH', 'Tạp chí NCKH', 'Tạp chí NCKH', 1, 1, 0, 0, '2017-04-24 06:49:41', '2017-04-24 06:49:41'),
(33, 18, 'Thông tin học tập', 'thong-tin-hoc-tap', 0, 'none.png', 'Thông tin học tập', 'Thông tin học tập', 'Thông tin học tập', 1, 1, 0, 0, '2017-04-24 06:50:49', '2017-04-24 06:50:49'),
(34, 18, 'Thông tin du học', 'thong-tin-du-hoc', 0, 'none.png', 'Thông tin du học', 'Thông tin du học', 'Thông tin du học', 1, 1, 0, 0, '2017-04-24 06:51:07', '2017-04-24 06:51:07'),
(35, 18, 'Đoàn thanh niên', 'doan-thanh-nien', 0, 'none.png', 'Đoàn thanh niên', 'Đoàn thanh niên', 'Đoàn thanh niên', 1, 1, 0, 0, '2017-04-24 06:51:17', '2017-04-24 06:51:17'),
(36, 18, 'Hội sinh viên', 'hoi-sinh-vien', 0, 'none.png', 'Hội sinh viên', 'Hội sinh viên', 'Hội sinh viên', 1, 1, 0, 0, '2017-04-24 06:51:32', '2017-04-24 06:51:32'),
(37, 18, 'Câu lạc bộ', 'cau-lac-bo', 0, 'none.png', 'Câu lạc bộ', 'Câu lạc bộ', 'Câu lạc bộ', 1, 1, 0, 0, '2017-04-24 06:51:51', '2017-04-24 06:51:51'),
(38, 18, 'Ký túc xá', 'ky-tuc-xa', 0, 'none.png', 'Ký túc xá', 'Ký túc xá', 'Ký túc xá', 1, 1, 0, 0, '2017-04-24 06:52:04', '2017-04-24 06:52:04'),
(39, 18, 'Học bổng', 'hoc-bong', 0, 'none.png', 'Học bổng', 'Học bổng', 'Học bổng', 1, 1, 0, 0, '2017-04-24 06:52:17', '2017-04-24 06:52:17'),
(40, 3, 'Tư vấn việc làm', 'tu-van-viec-lam', 0, 'none.png', 'Tư vấn việc làm', 'Tư vấn việc làm', 'Tư vấn việc làm', 1, 1, 0, 0, '2017-04-24 06:52:53', '2017-04-24 06:52:53'),
(41, 3, 'Thông tin tuyển dụng', 'thong-tin-tuyen-dung', 0, 'none.png', 'Thông tin tuyển dụng', 'Thông tin tuyển dụng', 'Thông tin tuyển dụng', 1, 1, 0, 0, '2017-04-24 06:53:10', '2017-04-24 06:53:10'),
(42, 0, 'Giới thiệu', 'gioi-thieu', 0, 'none.png', '<p>Giới thiệu</p>\r\n', 'Giới thiệu', 'Giới thiệu', 1, 1, 1, 0, '2017-04-24 18:36:05', '2017-04-24 18:37:57'),
(43, 42, 'Lời giới thiệu', 'loi-gioi-thieu', 0, 'none.png', 'Lời giới thiệu', 'Lời giới thiệu', 'Lời giới thiệu', 1, 1, 0, 0, '2017-04-24 19:00:34', '2017-04-24 19:00:34'),
(44, 42, 'Đội ngũ cán bộ', 'doi-ngu-can-bo', 0, 'none.png', 'Đội ngũ cán bộ', 'Đội ngũ cán bộ', 'Đội ngũ cán bộ', 1, 1, 0, 0, '2017-04-24 19:00:54', '2017-04-24 19:00:54'),
(45, 42, 'Lịch sử phát triển', 'lich-su-phat-trien', 0, 'none.png', 'Lịch sử phát triển', 'Lịch sử phát triển', 'Lịch sử phát triển', 1, 1, 0, 0, '2017-04-24 19:01:17', '2017-04-24 19:01:17'),
(46, 42, 'Tầm nhìn & sứ mạng', 'tam-nhin-su-mang', 0, 'none.png', '<p>Tầm nhìn &amp; Sứ mạng</p>\r\n', 'Tầm nhìn & Sứ mạng', 'Tầm nhìn & Sứ mạng', 1, 1, 0, 0, '2017-04-24 19:01:41', '2017-04-24 19:05:40'),
(47, 42, 'Chiến lược phát triển', 'chien-luoc-phat-trien', 0, 'none.png', 'Chiến lược phát triển', 'Chiến lược phát triển', 'Chiến lược phát triển', 1, 1, 0, 0, '2017-04-24 19:02:04', '2017-04-24 19:02:04'),
(48, 42, 'Cơ cấu tổ chức', 'co-cau-to-chuc', 0, 'none.png', 'Cơ cấu tổ chức', 'Cơ cấu tổ chức', 'Cơ cấu tổ chức', 1, 1, 0, 0, '2017-04-24 19:02:21', '2017-04-24 19:02:21'),
(49, 42, 'Ban giám hiệu', 'ban-giam-hieu', 0, 'none.png', 'Ban giám hiệu', 'Ban giám hiệu', 'Ban giám hiệu', 1, 1, 0, 0, '2017-04-24 19:03:02', '2017-04-24 19:03:02'),
(50, 42, 'Ba công khai', 'ba-cong-khai', 0, 'none.png', 'Ba công khai', 'Ba công khai', 'Ba công khai', 1, 1, 0, 0, '2017-04-24 19:03:17', '2017-04-24 19:03:17'),
(51, 0, 'Các đơn vị', 'cac-don-vi', 1, 'none.png', '<p>Các đơn vị</p>\r\n', 'Các đơn vị', 'Các đơn vị', 1, 1, 1, 0, '2017-04-24 19:06:13', '2017-04-24 19:06:25'),
(52, 51, 'Phòng - Ban chức năng', 'phong-ban-chuc-nang', 0, 'none.png', 'Phòng - Ban chức năng', 'Phòng - Ban chức năng', 'Phòng - Ban chức năng', 1, 1, 0, 0, '2017-04-24 19:08:04', '2017-04-24 19:08:04'),
(53, 51, 'Khoa - Bộ môn', 'khoa-bo-mon', 0, 'none.png', 'Khoa - Bộ môn', 'Khoa - Bộ môn', 'Khoa - Bộ môn', 1, 1, 0, 0, '2017-04-24 19:08:20', '2017-04-24 19:08:20'),
(54, 51, 'Cơ sở 2', 'co-so-2', 0, 'none.png', 'Cơ sở 2', 'Cơ sở 2', 'Cơ sở 2', 1, 1, 0, 0, '2017-04-24 19:08:33', '2017-04-24 19:08:33'),
(55, 51, 'Cơ sở 3', 'co-so-3', 0, 'none.png', 'Cơ sở 3', 'Cơ sở 3', 'Cơ sở 3', 1, 1, 0, 0, '2017-04-24 19:08:48', '2017-04-24 19:08:48'),
(56, 0, 'Nghiên cứu khoa học', 'nghien-cuu-khoa-hoc', 3, 'none.png', '<p>Nghiên cứu khoa học</p>\r\n', 'Nghiên cứu khoa học', 'Nghiên cứu khoa học', 1, 1, 1, 0, '2017-04-24 19:21:48', '2017-04-24 19:23:55'),
(57, 56, 'Các công trình khoa học', 'cac-cong-trinh-khoa-hoc', 0, 'none.png', 'Các công trình khoa học', 'Các công trình khoa học', 'Các công trình khoa học', 1, 1, 0, 0, '2017-04-24 19:22:19', '2017-04-24 19:22:19'),
(58, 56, 'Các nhóm nghiên cứu', 'cac-nhom-nghien-cuu', 0, 'none.png', 'Các nhóm nghiên cứu', 'Các nhóm nghiên cứu', 'Các nhóm nghiên cứu', 1, 1, 0, 0, '2017-04-24 19:22:36', '2017-04-24 19:22:36'),
(59, 56, 'Các đề tài - dự án', 'cac-de-tai-du-an', 0, 'none.png', '<p>Các công trình - dự án</p>\r\n', 'Các công trình - dự án', 'Các công trình - dự án', 1, 1, 0, 0, '2017-04-24 19:22:52', '2017-04-24 19:23:41'),
(60, 56, 'Tạp chí KH & CN', 'tap-chi-kh-cn', 0, 'none.png', 'Tạp chí KH & CN', 'Tạp chí KH & CN', 'Tạp chí KH & CN', 1, 1, 0, 0, '2017-04-24 19:23:21', '2017-04-24 19:23:21'),
(61, 0, 'POHE UTEHY', 'pohe-utehy', 5, 'none.png', '<p>POHE UTEHY</p>\r\n', 'POHE UTEHY', 'POHE UTEHY', 1, 1, 1, 0, '2017-04-24 19:26:18', '2017-04-24 19:31:15'),
(62, 61, 'Giới thiệu chung', 'gioi-thieu-chung', 0, 'none.png', 'Giới thiệu chung', 'Giới thiệu chung', 'Giới thiệu chung', 1, 1, 0, 0, '2017-04-24 19:28:20', '2017-04-24 19:28:20'),
(63, 61, 'Chương trình đào tạo', 'chuong-trinh-dao-tao', 0, 'none.png', 'Chương trình đào tạo', 'Chương trình đào tạo', 'Chương trình đào tạo', 1, 1, 0, 0, '2017-04-24 19:28:37', '2017-04-24 19:28:37'),
(64, 61, 'Tin tức & sự kiện', 'tin-tuc-su-kien', 0, 'none.png', 'Tin tức & sự kiện', 'Tin tức & sự kiện', 'Tin tức & sự kiện', 1, 1, 0, 0, '2017-04-24 19:29:00', '2017-04-24 19:29:00'),
(65, 61, 'POHE & Khoa Điện - Điện tử', 'pohe-khoa-dien-dien-tu', 0, 'none.png', 'POHE & Khoa Điện - Điện tử', 'POHE & Khoa Điện - Điện tử', 'POHE & Khoa Điện - Điện tử', 1, 1, 0, 0, '2017-04-24 19:29:26', '2017-04-24 19:29:26'),
(66, 61, 'POHE & Khoa CNTT', 'pohe-khoa-cntt', 0, 'none.png', 'POHE & Khoa CNTT', 'POHE & Khoa CNTT', 'POHE & Khoa CNTT', 1, 1, 0, 0, '2017-04-24 19:29:45', '2017-04-24 19:29:45'),
(67, 61, 'Đối tác liên kết', 'doi-tac-lien-ket', 0, 'none.png', 'Đối tác liên kết', 'Đối tác liên kết', 'Đối tác liên kết', 1, 1, 0, 0, '2017-04-24 19:30:02', '2017-04-24 19:30:02'),
(68, 61, 'Góc sinh viên', 'goc-sinh-vien', 0, 'none.png', 'Góc sinh viên', 'Góc sinh viên', 'Góc sinh viên', 1, 1, 0, 0, '2017-04-24 19:30:13', '2017-04-24 19:30:13'),
(69, 61, 'Tài liệu tham khảo', 'tai-lieu-tham-khao', 0, 'none.png', 'Tài liệu tham khảo', 'Tài liệu tham khảo', 'Tài liệu tham khảo', 1, 1, 0, 0, '2017-04-24 19:30:33', '2017-04-24 19:30:33'),
(70, 61, 'Ảnh hoạt động', 'anh-hoat-dong', 0, 'none.png', 'Ảnh hoạt động', 'Ảnh hoạt động', 'Ảnh hoạt động', 1, 1, 0, 0, '2017-04-24 19:30:48', '2017-04-24 19:30:48'),
(71, 61, 'Hỏi đáp', 'hoi-dap', 0, 'none.png', 'Hỏi đáp', 'Hỏi đáp', 'Hỏi đáp', 1, 1, 0, 0, '2017-04-24 19:30:59', '2017-04-24 19:30:59'),
(72, 0, 'Các văn bản', 'cac-van-ban', 6, 'none.png', 'Các văn bản', 'Các văn bản', 'Các văn bản', 1, 1, 1, 0, '2017-04-24 19:33:14', '2017-04-24 19:33:14'),
(73, 0, 'Hỏi đáp', 'hoi-dap', 7, 'none.png', 'Hỏi đáp', 'Hỏi đáp', 'Hỏi đáp', 1, 1, 1, 0, '2017-04-24 19:33:27', '2017-04-24 19:33:27'),
(74, 0, 'Liên hệ', 'lien-he', 8, 'none.png', 'Liên hệ', 'Liên hệ', 'Liên hệ', 1, 1, 1, 0, '2017-04-24 19:33:38', '2017-04-24 19:33:38');

-- --------------------------------------------------------

--
-- Table structure for table `categories_trash`
--

CREATE TABLE `categories_trash` (
  `id` int(11) NOT NULL,
  `parentID` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `orderBy` int(10) NOT NULL DEFAULT '0',
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'none.png',
  `desc` text COLLATE utf8_unicode_ci NOT NULL,
  `meta_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta_desc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories_trash`
--

INSERT INTO `categories_trash` (`id`, `parentID`, `name`, `alias`, `orderBy`, `image`, `desc`, `meta_key`, `meta_desc`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(4, 0, 'Chuyên mục 1', 'chuyen-muc-1', 0, 'none.png', 'Chuyên mục 1', 'Chuyên mục 1', 'Chuyên mục 1', 1, 1, '2017-04-23 19:53:31', '2017-04-23 19:53:31'),
(5, 0, 'Chuyên mục 2', 'chuyen-muc-2', 0, 'none.png', 'Chuyên mục 2', 'Chuyên mục 2', 'Chuyên mục 2', 1, 1, '2017-04-23 18:46:13', '2017-04-23 18:46:13'),
(6, 0, 'Chuyên mục 3', 'chuyen-muc-3', 0, 'none.png', 'Chuyên mục 3', 'Chuyên mục 3', 'Chuyên mục 3', 1, 1, '2017-04-23 23:27:17', '2017-04-23 23:27:17'),
(7, 0, 'Chuyên mục VIP', 'chuyen-muc-vip', 0, 'OUqUAH1MNheu1ZeO2rGB8caW826zMwJJroXlzP34RWQiRUeRh2_bradley-martyn.jpg', 'Chuyên mục VIP', 'Chuyên mục VIP', 'Chuyên mục VIP', 1, 1, '2017-04-24 00:01:29', '2017-04-24 00:01:29'),
(16, 0, 'Tin tức', 'tin-tuc', 0, 'none.png', 'Tin tức', 'Tin tức', 'Tin tức', 1, 1, '2017-04-24 00:07:03', '2017-04-24 00:07:03'),
(24, 0, 'Hợp tác đào tạo', 'hop-tac-dao-tao', 0, 'none.png', 'Hợp tác đào tạo', 'Hợp tác đào tạo', 'Hợp tác đào tạo', 1, 1, '2017-04-24 06:19:10', '2017-04-24 06:19:10');

-- --------------------------------------------------------

--
-- Table structure for table `document`
--

CREATE TABLE `document` (
  `id` int(10) UNSIGNED NOT NULL,
  `documentTypeID` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `document`
--

INSERT INTO `document` (`id`, `documentTypeID`, `name`, `link`, `created_at`, `updated_at`) VALUES
(2, 1, 'Mẫu văn bản', 'admin_assets/upload/documents/nxxQNTj7IUu6ve5FT62z_Mau BBNT-BG.doc', '2017-05-05 06:39:50', '2017-05-05 17:53:20');

-- --------------------------------------------------------

--
-- Table structure for table `document_type`
--

CREATE TABLE `document_type` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `document_type`
--

INSERT INTO `document_type` (`id`, `name`, `alias`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Văn bản hành chính', 'van-ban-hanh-chinh', 1, '2017-05-04 19:21:20', '2017-05-04 19:21:20'),
(2, 'Mẫu văn bản NCKH', 'mau-van-ban-nckh', 1, '2017-05-04 19:22:52', '2017-05-04 19:22:52'),
(3, 'Biểu mẫu cho HSSV', 'bieu-mau-cho-hssv', 1, '2017-05-04 19:23:36', '2017-05-04 19:23:36'),
(4, 'Thông tin tuyển dụng', 'thong-tin-tuyen-dung', 1, '2017-05-04 19:24:03', '2017-05-04 20:26:41');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(10) UNSIGNED NOT NULL,
  `facultyID` int(11) NOT NULL,
  `subjectID` int(11) NOT NULL,
  `orderBy` int(10) NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `desc` text COLLATE utf8_unicode_ci,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'none.png',
  `dob` datetime DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobilephone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `homephone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fax` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `department` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `education` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `office` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `room_work` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `research_area` text COLLATE utf8_unicode_ci,
  `scientific_research` text COLLATE utf8_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `link` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `facultyID`, `subjectID`, `orderBy`, `name`, `fullname`, `desc`, `image`, `dob`, `gender`, `address`, `email`, `mobilephone`, `homephone`, `fax`, `department`, `education`, `office`, `website`, `room_work`, `research_area`, `scientific_research`, `status`, `link`, `created_at`, `updated_at`) VALUES
(1, 101, 8, 0, 'Anh', 'Nguyễn Văn', '', 'siTPEeApQ96GNZeyr34dBiHjXmspyYPCI7AApMcmX4rQqQp7Y1_bradley-martyn.jpg', '1990-01-01 00:00:00', '0', '130 Cinema Street', 'micaela77@example.org', '5074275845', '5074275845', '0192309120', 'Nhân viên', 'Thạc sĩ', 'Nhân viên', 'nguyenvananhcntt.com', 'HD201', '', '', 1, 'https://nguyenvananhcntt.com', '2017-05-03 18:46:46', '2017-05-03 20:50:00'),
(3, 101, 1, 0, 'test2', 'test2', '', 'none.png', '2017-05-04 00:00:00', '0', 'test2', 'test2', '', '', '', '', 'test2', '', '', '', '', '', 1, '', '2017-05-04 06:44:19', '2017-05-04 06:44:19');

-- --------------------------------------------------------

--
-- Table structure for table `employee_trash`
--

CREATE TABLE `employee_trash` (
  `id` int(11) NOT NULL,
  `facultyID` int(11) NOT NULL,
  `subjectID` int(11) NOT NULL,
  `orderBy` int(10) NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `desc` text COLLATE utf8_unicode_ci,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'none.png',
  `dob` date DEFAULT NULL,
  `gender` tinyint(1) DEFAULT '1',
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobilephone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `homephone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fax` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `department` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `education` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `office` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `room_work` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `research_area` text COLLATE utf8_unicode_ci,
  `scientific_research` text COLLATE utf8_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `link` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `desc` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `website` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`id`, `name`, `desc`, `phone`, `website`, `link`, `created_at`, `updated_at`) VALUES
('101', 'Công nghệ thông tin', 'Khoa công nghệ thông tin trường Đại học sư phạm kỹ thuật Hưng Yên\r\n									', '01683081609', 'fit.utehy.edu.vn', 'https://www.fit.utehy.edu.vn', '2017-05-01 22:54:02', '2017-05-01 23:16:34'),
('103', 'Khoa May', 'Khoa may', '0921901294', 'khoamay.utehy.edu.vn', 'https://khoamay.utehy.edu.vn', '2017-05-02 17:59:32', '2017-05-02 17:59:32');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_trash`
--

CREATE TABLE `faculty_trash` (
  `id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `desc` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `website` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE `file` (
  `id` int(10) UNSIGNED NOT NULL,
  `albumID` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `file`
--

INSERT INTO `file` (`id`, `albumID`, `name`, `alias`, `link`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 'abc', 'abc', 'admin_assets/upload/files/nWrlGxF7JpuBnKcuXGHr_ma mới bắt nạt ma cũ.docx', 1, '2017-05-09 23:55:17', '2017-05-09 23:55:17');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_04_17_002400_create_news_table', 2),
(4, '2017_04_17_002417_create_categories_table', 2),
(5, '2017_04_17_002430_create_tags_table', 6),
(9, '2017_04_17_002521_create_new__trashes_table', 5),
(11, '2017_04_19_011938_create_new_tags_table', 7),
(12, '2017_04_24_012145_create_category__trashes_table', 8),
(13, '2017_04_28_015512_create_employees_table', 9),
(14, '2017_04_28_020021_create_faculties_table', 9),
(15, '2017_04_30_052620_create_b_m-_b-_ps_table', 9),
(16, '2017_05_02_061807_create_faculty_trashes_table', 10),
(17, '2017_05_02_120426_create_subject_trashes_table', 11),
(18, '2017_05_03_022213_create_employee_trashes_table', 12),
(19, '2017_05_04_140942_create_sciencestudies_table', 13),
(20, '2017_05_05_015253_create_document_types_table', 14),
(21, '2017_05_05_124907_create_documents_table', 15),
(22, '2017_05_06_005817_create_files_table', 16),
(23, '2017_05_07_013331_create_album_files_table', 16);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(10) UNSIGNED NOT NULL,
  `cate_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'none.png',
  `desc` text COLLATE utf8_unicode_ci,
  `detail` text COLLATE utf8_unicode_ci,
  `meta_key` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_desc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `isDraft` tinyint(1) NOT NULL DEFAULT '0',
  `isBrowse` tinyint(1) NOT NULL DEFAULT '1',
  `isPublish` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `tags` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `cate_id`, `name`, `alias`, `image`, `desc`, `detail`, `meta_key`, `meta_desc`, `user_id`, `isDraft`, `isBrowse`, `isPublish`, `status`, `tags`, `created_at`, `updated_at`) VALUES
(215, 2, ' Những chàng trai \'chân đất\' vô địch Robocon châu Á - Thái Bình Dương', 'nhung-chang-trai-chan-dat-vo-dich-robocon-chau-a-thai-binh-duong', 'none.png', 'Những chàng trai \'chân đất\' vô địch Robocon châu Á - Thái Bình Dương', '<div style=\"color: rgb(34, 34, 34); font-family: Tahoma, &quot;Times New Roman&quot;, Times, serif; font-size: 14px; text-align: justify;\"><span style=\"color:rgb(51, 51, 51); font-family:arial\">Chiều 26/8, đoàn dự thi Robocon Hungyen Techedu (Đại học Sư phạm kỹ thuật Hưng Yên) về đến sân bay Nội Bài trong sự chào đón của thầy cô, người thân, bạn bè.</span><span style=\"color:rgb(51, 51, 51); font-family:arial\">&nbsp;</span><span style=\"color:rgb(51, 51, 51); font-family:arial\">Ai cũng hân hoan niềm vui chiến thắng xen lẫn những giọt nước mắt hạnh phúc.</span></div>\n\n<div style=\"color: rgb(34, 34, 34); font-family: Tahoma, &quot;Times New Roman&quot;, Times, serif; font-size: 14px;\">&nbsp;\n<p style=\"text-align:justify\">Bốn ngày trước, đại diện của Việt Nam đã&nbsp;đánh bại Hong Kong (Trung Quốc) với tỷ số 5 -1, giành ngôi vô địch trong cuộc tranh tài ABU Robocon 2015 tại Indonesia. Ba&nbsp;thành viên trong đoàn gồm Lê Văn Chính, Phạm Văn Bắc, Trần Văn Mạnh, cùng 22 tuổi, đều là sinh viên năm cuối khoa Điện - Điện tử, Đại học Sư phạm kỹ thuật Hưng Yên.</p>\n\n<table align=\"center\" border=\"0\" cellpadding=\"3\" cellspacing=\"0\" class=\"tplCaption\" style=\"border-collapse:collapse; border-spacing:0pt; color:rgb(51, 51, 51); font-family:arial; margin:0px auto 10px; max-width:100%; padding:0px; width:470px\">\n	<tbody>\n		<tr>\n			<td><img alt=\"IMG-0770-2418-1440600703.jpg\" src=\"http://m.f29.img.vnecdn.net/2015/08/26/IMG-0770-2418-1440600703.jpg\" style=\"border:0px; font-size:0px; line-height:0; margin:0px; max-width:100%; padding:0px; width:470px\" /></td>\n		</tr>\n		<tr>\n			<td>\n			<p>Các thành viên trong đội tuyển Robocon vô địch về tới Hà Nội chiều nay. Ảnh:&nbsp;<em>H.P.</em></p>\n			</td>\n		</tr>\n	</tbody>\n</table>\n\n<p style=\"text-align:justify\">Lần đầu tiên xuất ngoại đã mang về ngôi vô địch, Lê Văn Chính (sinh viên lớp Tự động hóa K9) chia sẻ em có cảm giác hạnh phúc xen lẫn tự hào. Chính nhận thấy trong cuộc thi này, mỗi đối thủ đều có điểm mạnh riêng. Hong Kong rất tự tin vì họ là đội mạnh, chiến thắng tất cả các trận trước đó và tiến thẳng vào chung kết. Nhật Bản thi đấu kiên cường, có tinh thần đồng đội cực kỳ cao. Trung Quốc&nbsp;có cách đấu bất ngờ, khó phán đoán, robot&nbsp;của họ tự động hoàn toàn, công nghệ vượt trội hẳn so với các đội khác.</p>\n\n<p style=\"text-align:justify\">\"Bọn em đã tranh thủ thời gian để xem qua trận đấu trước đó của từng đội để đưa ra chiến thuật hợp lý, hạn chế những điểm mạnh, lợi dụng tối đa điểm yếu của đối thủ. Đấu với mỗi đội tuyển lại có chiến thuật khác nhau\", Chính nói và cho biết robot của Việt Nam mạnh nhất ở&nbsp;những quả phát cầu với tốc độ nhanh, đường phát ngắn nên đối thủ khó định hướng để đỡ lại. Vì vậy, các em liên tục giành chiến thắng khi lọt qua bảng C cho đến khi vào chung kết,&nbsp;chiến thắng Hong Kong.</p>\n\n<p style=\"text-align:justify\">Chính chia sẻ ngôi vô địch là thành quả, công sức của rất nhiều người. Bắt đầu từ sự định hướng của thầy cô giáo khi tư vấn cho các em chế tạo một con robot \"biết đánh cầu lông\". Nhiều đêm các thành viên trong đội thức ngủ để mày mò chế tạo từng bộ phận, luyện tập các bài thi đấu.&nbsp;Đội tuyển Robocon Hungyen Techedu có 9 người nhưng chỉ có 3 thành viên đi thi. Khi đội tuyển thi đấu ở Indonesia, các thành viên còn lại ở trong nước vẫn dõi theo từng trận đấu và góp ý.&nbsp;</p>\n\n<p style=\"text-align:justify\">Trong đội tuyển, Chính là người đến với robot sớm nhất. Khi là sinh viên năm thứ hai, cậu mày mò đi theo đàn anh để làm robot và say mê từ đó. Hoàn cảnh gia đình em khó khăn, bố mẹ không có nghề phụ mà chỉ trông chờ vào nghề nông. Đi học cuối tuần về, Chính thường giúp đỡ bố mẹ làm việc nhà, còn lại dành thời gian cho robot.&nbsp;Trong quá trình học, em cũng tự mình làm được một số đồ dùng trong nhà như quạt, hệ thống điện hoàn chỉnh cho một căn phòng.</p>\n\n<table align=\"center\" border=\"0\" cellpadding=\"3\" cellspacing=\"0\" class=\"tplCaption\" style=\"border-collapse:collapse; border-spacing:0pt; color:rgb(51, 51, 51); font-family:arial; margin:0px auto 10px; max-width:100%; padding:0px; width:470px\">\n	<tbody>\n		<tr>\n			<td><img alt=\"IMG-0784-9363-1440600703.jpg\" src=\"http://m.f29.img.vnecdn.net/2015/08/26/IMG-0784-9363-1440600703.jpg\" style=\"border:0px; font-size:0px; line-height:0; margin:0px; max-width:100%; padding:0px; width:470px\" /></td>\n		</tr>\n		<tr>\n			<td>\n			<p>Hai mẹ con&nbsp;Mạnh không giấu được nước mắt hạnh phúc tại sân bay. Ảnh:&nbsp;<em>H.P.</em></p>\n			</td>\n		</tr>\n	</tbody>\n</table>\n\n<p style=\"text-align:justify\">Trong số 3 thành viên, Trần Văn Mạnh (Nam Sách, Hải Dương) có vẻ ngoài thư sinh nhất. Bước ra khỏi sân bay, Mạnh cũng là người rơi nước mắt nhiều nhất khi nhìn thấy cha mẹ. Chàng sinh viên lớp Điện tử công nghiệp cho hay không kìm nén được vì thấy quá hạnh phúc.</p>\n\n<p style=\"text-align:justify\">Học năm cuối Mạnh mới tham gia chế tạo robot nhưng đã mê ngay. \"Mỗi lần nhìn thấy con robot làm ra hoạt động được, em lại thấy mê thêm, cố gắng hoàn thiện với mức độ tốt nhất có thể\", Mạnh nói. Ở nhà, Mạnh thường tự làm một số sản phẩm phục vụ cho sinh hoạt của gia đình như thiết kế mạch điều khiển từ xa, tự nâng cấp đồ điện.</p>\n\n<p style=\"text-align:justify\">Biết tin sáng nay con trai Phạm Văn Bắc cùng đội tuyển về tới Hà Nội, ông Phạm Văn Lý đang lái tàu trên sông Thái Bình cũng vội ra sân bay. Ông bảo hôm nhận được tin các con chiến thắng, ông mừng cả đêm không ngủ. Vợ ông đang bán cá ở chợ cũng nghỉ để về báo tin mừng với người thân. Đón con trai ở sân bay, hai vợ chồng không kìm được nước mắt vì vui mừng.</p>\n\n<p style=\"text-align:justify\">Chia sẻ cảm giác chiến thắng, Bắc nói&nbsp;\"giống như một chiến binh đi vào trận đấu, cứ chiến đấu hết mình là được\".&nbsp;Cũng như Mạnh, Bắc mới tham gia chế tạo robot gần một năm nay, ngay từ khi chạm tay vào robot em đã có niềm yêu thích đặc biệt.</p>\n\n<table align=\"center\" border=\"0\" cellpadding=\"3\" cellspacing=\"0\" class=\"tplCaption\" style=\"border-collapse:collapse; border-spacing:0pt; color:rgb(51, 51, 51); font-family:arial; margin:0px auto 10px; max-width:100%; padding:0px; width:470px\">\n	<tbody>\n		<tr>\n			<td><img alt=\"IMG-0800-1333-1440600703.jpg\" src=\"http://m.f29.img.vnecdn.net/2015/08/26/IMG-0800-1333-1440600703.jpg\" style=\"border:0px; font-size:0px; line-height:0; margin:0px; max-width:100%; padding:0px; width:470px\" /></td>\n		</tr>\n		<tr>\n			<td>\n			<p>Đội tuyển Robocon của trường Đại học Sư phạm kỹ thuật Hưng Yên có 9 thành viên. Trong đó, có 3 thành viên (mặc áo đỏ sao vàng) đi thi đấu. Ảnh:&nbsp;<em>H.P.</em></p>\n			</td>\n		</tr>\n	</tbody>\n</table>\n\n<p style=\"text-align:justify\">Về nước nghỉ ngơi một ngày, 3 chàng sinh viên sẽ bước vào lễ bảo vệ đồ án tốt nghiệp vào ngày 28/8. Dù đã có nơi để nộp hồ sơ tuyển dụng nhưng Chính muốn học thêm ngoại ngữ, một số kỹ năng để chuẩn bị cho cho phỏng vấn thuận lợi nhất. Bắc muốn nghỉ ngơi ít ngày sau lễ tốt nghiệp rồi mới nộp hồ sơ đi làm; còn Mạnh sẽ học thêm, tiếp tục niềm đam mê với những con robot.</p>\n\n<p style=\"text-align:justify\">Thầy&nbsp;Nguyễn Văn Tuấn, Trưởng đoàn, đồng hành với các thành viên của đội Robocon&nbsp;chia sẻ: \"Các em giành được ngôi vô địch hoàn toàn xứng đáng\".&nbsp;Cô Trần Thị Ngoạt, giảng viên khoa Điện - Điện tử cho hay trước khi các thành viên lên đường thi đấu, cả thầy và trò đều chuẩn bị một kế hoạch rõ ràng về nâng cấp, cải tiến, tập luyện robot. Đội tuyển có những bài tập chi tiết và các em đều tuân theo hướng dẫn của chỉ đạo viên.</p>\n\n<p style=\"text-align:justify\">\"Robocon là sân chơi của sinh viên. Các em là nhân vật chính đưa ra những ý tưởng và thực hiện, thầy cô chỉ tư vấn. Người trẻ luôn có nhiều sáng kiến không bao giờ cạn nên hãy cứ tin tưởng và cho các em có cơ hội được thể hiện mình\", cô Ngoạt nói.</p>\n</div>\n', 'Qui expedita ab omnis cumque architecto. Voluptatem fugit qui delectus dolores. Ea laborum quis iure consequuntur ut fuga.', 'Aut maiores aut doloribus. Totam id aut at voluptatem. Eos voluptatem est quisquam inventore. Tempore aperiam enim molestiae eum aut eligendi voluptatem.', 16, 0, 0, 0, 1, NULL, '2017-04-21 19:26:10', '2017-04-21 19:38:18'),
(306, 3, 'Thông báo V/v cử sinh viên tham dự \"Hội thảo tuyển dụng Samsung\"', NULL, '6PTW4IxtyyPhUaq3wFtylEkfqjQPyMi4ZJVqrH4MueFPpyF1un_github.jpg', '<p><a href=\"http://localhost:8000/Newsletters/NewsDetail/6004\" style=\"color: rgb(34, 43, 71); background-image: none; background-position: 0px 0px; background-size: initial; background-repeat: repeat; background-attachment: scroll; background-origin: initial; background-clip: initial; margin: 0px; outline: none; padding: 0px; vertical-align: baseline; text-decoration-line: none; font-family: Tahoma, &quot;Times New Roman&quot;, Times, serif;\">Thông báo V/v cử sinh viên tham dự \"Hội thảo tuyển dụng Samsung\"</a></p>\r\n', '<p><a href=\"http://localhost:8000/Newsletters/NewsDetail/6004\" style=\"color: rgb(34, 43, 71); background-image: none; background-position: 0px 0px; background-size: initial; background-repeat: repeat; background-attachment: scroll; background-origin: initial; background-clip: initial; margin: 0px; outline: none; padding: 0px; vertical-align: baseline; text-decoration-line: none; font-family: Tahoma, &quot;Times New Roman&quot;, Times, serif;\">Thông báo V/v cử sinh viên tham dự \"Hội thảo tuyển dụng Samsung\"</a></p>\r\n', NULL, NULL, 1, 0, 0, 0, 1, NULL, '2017-04-23 19:36:26', '2017-04-26 03:12:18'),
(307, 1, 'Thông tin cựu học viên cao học', 'thong-tin-cuu-hoc-vien-cao-hoc', 'none.png', '<p>Thông tin cựu học viên cao học</p>\r\n', '<p><iframe height=\"650px\" src=\"https://drive.google.com/file/d/0B9o7jgx8RLx7cVZ6OHNtXzQtWTM0Z0RIQ0tuMlhMTDdnOU1F/preview\" style=\"color: rgb(34, 34, 34); font-family: Tahoma, &quot;Times New Roman&quot;, Times, serif; font-size: 14px; text-align: center;\" width=\"650px\"></iframe></p>\r\n', NULL, NULL, 1, 0, 0, 0, 1, NULL, '2017-04-24 00:17:17', '2017-04-24 00:23:48'),
(308, 1, 'Thông báo tuyển sinh trình độ Tiến sỹ năm 2017', 'thong-bao-tuyen-sinh-trinh-do-tien-si-nam-2017', 'none.png', '<p><strong>Thông báo tuyển sinh trình độ Tiến sỹ năm 2017</strong></p>\r\n', '<p><iframe height=\"650px\" src=\"https://drive.google.com/file/d/0B9o7jgx8RLx7ejFfRHdaWUlQcFg1VjZLZUdYcW5oRHBrcnNB/preview\" style=\"color: rgb(34, 34, 34); font-family: Tahoma, &quot;Times New Roman&quot;, Times, serif; font-size: 14px; text-align: center;\" width=\"650px\"></iframe></p>\r\n', NULL, NULL, 1, 0, 0, 0, 1, NULL, '2017-04-24 00:19:38', '2017-04-24 00:23:48'),
(309, 1, 'THÔNG BÁO SỐ 1: V/V Tuyển sinh Đại học chính quy năm 2017', 'thong-bao-so-1-tuyen-sinh-dai-hoc-chinh-quy-nam-2017', 'none.png', '<p><strong>THÔNG BÁO SỐ 1: V/V Tuyển sinh Đại học chính quy năm 2017</strong></p>\r\n', '<p><iframe height=\"600px\" src=\"https://drive.google.com/file/d/0B8ImJFPkn3MVYk0yOWx2XzlRUDA/preview\" style=\"color: rgb(34, 34, 34); font-family: Tahoma, &quot;Times New Roman&quot;, Times, serif; font-size: 14px;\" width=\"680px\"></iframe></p>\r\n', NULL, NULL, 1, 0, 0, 0, 1, NULL, '2017-04-24 00:23:09', '2017-04-24 00:23:48'),
(310, 3, 'Công ty CPSX phụ tùng ô tô và thiết bị công nghiệp JAT tuyển dụng', 'cong-ty-cpsx-phu-tung-o-to-va-thiet-bi-cong-nghiep-jat-tuyen-dung', 'none.png', '<p>Công ty CPSX phụ tùng ô tô và thiết bị công nghiệp JAT tuyển dụng</p>\r\n', '<p><iframe height=\"650px\" src=\"https://drive.google.com/file/d/0B9o7jgx8RLx7QmhvYWphTGhHUkJmZ2M3OVhIbFhTbVlKZzhz/preview\" style=\"color: rgb(34, 34, 34); font-family: Tahoma, &quot;Times New Roman&quot;, Times, serif; font-size: 14px; text-align: center;\" width=\"650px\"></iframe></p>\r\n', NULL, NULL, 1, 0, 0, 0, 1, NULL, '2017-04-25 07:02:17', '2017-04-25 07:05:42'),
(311, 3, 'Công ty Cổ phần Thép Hòa Phát tuyển dụng', 'cong-ty-co-phan-thep-hoa-phat-tuyen-dung', 'none.png', '<p>Công ty Cổ phần Thép Hòa Phát tuyển dụng</p>\r\n', '<div class=\"entry\" style=\"border-top: 1px solid rgb(221, 221, 221); color: rgb(34, 34, 34); font-size: 14px; line-height: 1.4em; padding: 15px 0px 10px; font-family: Tahoma, &quot;Times New Roman&quot;, Times, serif;\">\r\n<p style=\"text-align:center\"><iframe height=\"650px\" src=\"https://drive.google.com/file/d/0B9o7jgx8RLx7amxzRllNOWVDZHhfMk5GNV9nSHNYSGdZdDgw/preview\" width=\"650px\"></iframe></p>\r\n</div>\r\n\r\n<div class=\"clear\" style=\"clear: both; float: none; background-image: none; background-position: 0px 0px; background-size: initial; background-repeat: repeat; background-attachment: scroll; background-origin: initial; background-clip: initial; border: 0px none; font-size: 0px; height: 0px; list-style: none outside none; margin: 0px; overflow: hidden; padding: 0px; visibility: hidden; width: 0px; color: rgb(0, 0, 0); font-family: Tahoma, &quot;Times New Roman&quot;, Times, serif;\">&nbsp;</div>\r\n\r\n<h1>&nbsp;</h1>\r\n', NULL, NULL, 1, 0, 0, 0, 1, NULL, '2017-04-25 07:05:20', '2017-04-25 07:05:43'),
(312, 3, 'Công ty điện tử Annex tuyển dụng', 'cong-ty-dien-tu-annex-tuyen-dung', 'none.png', '<p><span style=\"font-size:16px\">Công ty điện tử Annex tuyển dụng</span></p>\r\n', '<p><iframe height=\"650px\" src=\"https://drive.google.com/file/d/0B9o7jgx8RLx7QVA2UWFRRUJkanY2MGZkSnR6VW9PdmRESzdB/preview\" style=\"color: rgb(34, 34, 34); font-family: Tahoma, \" width=\"650px\"></iframe></p>\r\n', NULL, NULL, 1, 0, 0, 0, 1, NULL, '2017-04-25 07:14:28', '2017-04-25 17:23:42'),
(313, 1, 'Đề án tuyển sinh Đại học chính quy năm 2017', 'de-an-tuyen-sinh-dai-hoc-chinh-quy-nam-2017', 'none.png', '<p>Đề án tuyển sinh Đại học chính quy năm 2017</p>\r\n', '<p><iframe height=\"500px\" src=\"https://drive.google.com/file/d/0B5CcLp0mBvYqV1RhZXZoUjBmSlk/preview\" width=\"680px\"></iframe></p>\r\n', NULL, NULL, 1, 0, 0, 0, 1, NULL, '2017-04-25 18:14:46', '2017-04-26 03:12:18'),
(314, 2, ' Đại học SPKT Hưng Yên liên tiếp giành chiến thắng tuyệt đối APPARE\r\n', '-dai-hoc-spkt-hung-yen-lien-tiep-gianh-chien-thang-tuyet-doi-appare-', 'none.png', '<p>&nbsp;Đại học SPKT Hưng Yên liên tiếp giành chiến thắng tuyệt đối APPARE</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<div class=\"clear\" style=\"clear: both; float: none; background-image: none; background-position: 0px 0px; background-size: initial; background-repeat: repeat; background-attachment: scroll; background-origin: initial; background-clip: initial; border: 0px none; font-size: 0px; height: 0px; list-style: none outside none; margin: 0px; overflow: hidden; padding: 0px; visibility: hidden; width: 0px; color: rgb(0, 0, 0); font-family: Tahoma, \">&nbsp;</div>\r\n\r\n<p>&nbsp;</p>\r\n', '<div class=\"entry\" style=\"border-top: 1px solid rgb(221, 221, 221); color: rgb(34, 34, 34); font-size: 14px; line-height: 1.4em; padding: 15px 0px 10px; font-family: Tahoma, \"><span style=\"font-size:14px\"><span style=\"font-family:georgia,serif\"><span style=\"color:rgb(86, 86, 86)\">Ngay từ trận thi đấu đầu tiên ở vòng loại&nbsp;</span><em><a href=\"http://vtv.vn/robocon-viet-nam-2017.html\" style=\"text-decoration-line: none; outline: none; color: rgb(26, 76, 144); margin: 0px; padding: 0px; list-style: none; border: none; font-weight: inherit;\" target=\"_blank\" title=\"Robocon Việt Nam 2017\">Robocon Việt Nam 2017</a></em><span style=\"color:rgb(86, 86, 86)\">&nbsp;khu vực phía Bắc gặp đội tuyển Sao Đỏ - CK Lightning của Đại học Sao Đỏ, đội tuyển SKH - 1 của Đại học&nbsp;</span></span></span><span style=\"font-size:12px\"><span style=\"font-family:georgia,serif\"><a href=\"http://vtv.vn/dh-su-pham-ky-thuat-hung-yen.html\" style=\"text-decoration-line: none; outline: none; color: rgb(26, 76, 144); font-size: 19px; text-align: justify; margin: 0px; padding: 0px; list-style: none; border: none; font-weight: inherit;\" target=\"_blank\" title=\"ĐH Sư phạm kỹ thuật Hưng Yên \">Sư Phạm Kỹ thuật Hưng Yên</a></span></span><span style=\"font-size:14px\"><span style=\"font-family:georgia,serif\"><span style=\"color:rgb(86, 86, 86)\">&nbsp;đã ghi điểm ở toàn bộ các cột trụ và giành chiến thắng tuyệt đối APPARE chỉ trong khoảng hơn 30 giây, khi đối thủ mới chỉ ghi được 3 điểm. Không dừng lại ở đó, trong các lượt trận gặp BKSTAR M của Đại học Bách khoa Hà Nội và PDU - 02 của Đại học Phương Đông, SKH - 1 cũng đều không cho đối thủ có cơ hội ghi điểm và giành chiến thắng tuyệt đối&nbsp;</span><a href=\"http://vtv.vn/appare.html\" style=\"text-decoration-line: none; outline: none; color: rgb(26, 76, 144); font-size: 19px; text-align: justify; margin: 0px; padding: 0px; list-style: none; border: none; font-weight: inherit;\" target=\"_blank\" title=\"APPARE \">APPARE</a><span style=\"color:rgb(86, 86, 86)\">&nbsp;chỉ trong nửa thời gian của trận đấu.</span></span></span>\r\n<div style=\"margin: 21px 0px; padding: 0px; list-style: none; border: none; font-size: 19px; color: rgb(86, 86, 86); line-height: 26px; text-align: justify;\"><span style=\"font-size:14px\"><span style=\"font-family:georgia,serif\">Tương tự như SKH - 1, đội tuyển SKH - 05 của Đại học SPKT Hưng Yên cũng hạ gục hoàn toàn các đối thủ như NN01 đến từ Đại học Công nghiệp Hà Nội, Sao Đỏ HLC của Đại học Sao Đỏ hay CĐHN-01 của Cao đẳng nghề Cơ điện Hà Nội với chiến thắng tuyệt đối APPARE.</span></span></div>\r\n\r\n<div style=\"margin: 21px 0px; padding: 0px; list-style: none; border: none; font-size: 19px; color: rgb(86, 86, 86); line-height: 26px; text-align: justify;\"><span style=\"font-size:14px\"><span style=\"font-family:georgia,serif\">Tại lượt trận thi đấu thứ 4 của vòng I, dù cả 2 đội đều không giành được điểm nào sau 3 phút thi đấu, tuy nhiên, đội tuyển BKSTAR M của Đại học Bách khoa Hà Nội có phần kém may mắn khi thua đội tuyển PDU-02 đến từ Đại học Phương Đông trong phần bốc thăm. Trước các đối thủ mạnh như SKH - 1 của Đại học SPKT Hưng Yên hay Sao Đỏ - CK Lightning của Đại học Sao Đỏ, BKSTAR M đã cố gắng hết sức nhưng vẫn phải chấp nhận thất bại.</span></span></div>\r\n\r\n<div style=\"margin: 21px 0px; padding: 0px; list-style: none; border: none; font-size: 19px; color: rgb(86, 86, 86); line-height: 26px; text-align: justify;\"><span style=\"font-size:14px\"><span style=\"font-family:georgia,serif\">Dù đã ghi điểm trong trận đấu, tuy nhiên, do&nbsp;<a href=\"http://vtv.vn/robot.html\" style=\"text-decoration-line: none; outline: none; color: rgb(26, 76, 144); margin: 0px; padding: 0px; list-style: none; border: none; font-weight: inherit;\" target=\"_blank\" title=\"robot\">robot</a>&nbsp;bắn đĩa thiếu độ chính xác nên đội tuyển BK GALAXY của Đại học Bách khoa Hà Nội cũng phải dừng bước trước các đối thủ là XTH-Power của Đại học Điện lực, Battleship của Cao đẳng Công nghiệp Quốc phòng và ĐT1 của Đại học Công nghiệp Hà Nội.</span></span></div>\r\n\r\n<div style=\"margin: 21px 0px; padding: 0px; list-style: none; border: none; font-size: 19px; color: rgb(86, 86, 86); line-height: 26px; text-align: justify;\"><span style=\"font-size:14px\"><span style=\"font-family:georgia,serif\">Là tân binh của mùa&nbsp;<em><a href=\"http://vtv.vn/robocon.html\" style=\"text-decoration-line: none; outline: none; color: rgb(26, 76, 144); margin: 0px; padding: 0px; list-style: none; border: none; font-weight: inherit;\" target=\"_blank\" title=\"robocon\">Robocon</a>&nbsp;</em>năm nay, tuy nhiên, Cao đẳng Công nghiệp Quốc phòng không hề kém cạnh các đội mạnh khác tại vòng loại phía Bắc. Robot của đội tuyển Battleship thi đấu rất ổn định, giành điểm cao liên tiếp trong các trận đấu, giành chiến thắng trước cả đội tuyển được đánh giá cao như ĐT1 đến từ Đại học Công nghiệp Hà Nội.</span></span></div>\r\n\r\n<div style=\"margin: 21px 0px; padding: 0px; list-style: none; border: none; font-size: 19px; color: rgb(86, 86, 86); line-height: 26px; text-align: justify;\"><span style=\"font-size:14px\"><span style=\"font-family:georgia,serif\"><strong><em>Dưới đây là một số hình ảnh trong các trận thi đấu tại Bảng 1, 2 và 3 của vòng loại Robocon Việt Nam 2017 khu vực phía Bắc:</em></strong></span></span></div>\r\n\r\n<div style=\"margin: auto auto 12.75px; padding: 0px; list-style: none; border: none; font-size: 19px; color: rgb(51, 51, 51); text-align: justify; width: 639px;\">\r\n<div style=\"margin: auto; padding: 0px; list-style: none; border: none;\"><span style=\"font-size:14px\"><span style=\"font-family:georgia,serif\"><img alt=\"Robocon 2017: Đại học SPKT Hưng Yên liên tiếp giành chiến thắng tuyệt đối APPARE - Ảnh 1.\" id=\"img_5f2d0b60-16c7-11e7-b5ec-9f5916ac76b9\" src=\"https://vtv1.mediacdn.vn/thumb_w/640/2017/tsss9732-1491043104051.jpg\" style=\"border:none; display:block; list-style:none; margin:auto; max-width:100%; padding:0px; vertical-align:top; width:639px\" title=\"Robocon 2017: Đại học SPKT Hưng Yên liên tiếp giành chiến thắng tuyệt đối APPARE - Ảnh 1.\" /></span></span></div>\r\n</div>\r\n\r\n<div style=\"margin: auto auto 12.75px; padding: 0px; list-style: none; border: none; font-size: 19px; color: rgb(51, 51, 51); text-align: justify; width: 639px;\">\r\n<div style=\"margin: auto; padding: 0px; list-style: none; border: none;\"><span style=\"font-size:14px\"><span style=\"font-family:georgia,serif\"><img alt=\"Robocon 2017: Đại học SPKT Hưng Yên liên tiếp giành chiến thắng tuyệt đối APPARE - Ảnh 2.\" id=\"img_5f472310-16c7-11e7-b74b-e16047f42402\" src=\"https://vtv1.mediacdn.vn/thumb_w/640/2017/tsss9733-1491043104055.jpg\" style=\"border:none; display:block; list-style:none; margin:auto; max-width:100%; padding:0px; vertical-align:top; width:639px\" title=\"Robocon 2017: Đại học SPKT Hưng Yên liên tiếp giành chiến thắng tuyệt đối APPARE - Ảnh 2.\" /></span></span></div>\r\n</div>\r\n\r\n<div style=\"margin: auto auto 12.75px; padding: 0px; list-style: none; border: none; font-size: 19px; color: rgb(51, 51, 51); text-align: justify; width: 639px;\">\r\n<div style=\"margin: auto; padding: 0px; list-style: none; border: none;\"><span style=\"font-size:14px\"><span style=\"font-family:georgia,serif\"><img alt=\"Robocon 2017: Đại học SPKT Hưng Yên liên tiếp giành chiến thắng tuyệt đối APPARE - Ảnh 3.\" id=\"img_da349980-16c8-11e7-b5ec-9f5916ac76b9\" src=\"https://vtv1.mediacdn.vn/thumb_w/640/2017/sss9676-1491043744510.jpg\" style=\"border:none; display:block; list-style:none; margin:auto; max-width:100%; padding:0px; vertical-align:top; width:639px\" title=\"Robocon 2017: Đại học SPKT Hưng Yên liên tiếp giành chiến thắng tuyệt đối APPARE - Ảnh 3.\" /></span></span></div>\r\n</div>\r\n\r\n<div style=\"margin: auto auto 12.75px; padding: 0px; list-style: none; border: none; font-size: 19px; color: rgb(51, 51, 51); text-align: justify; width: 639px;\">\r\n<div style=\"margin: auto; padding: 0px; list-style: none; border: none;\"><span style=\"font-size:14px\"><span style=\"font-family:georgia,serif\"><img alt=\"Robocon 2017: Đại học SPKT Hưng Yên liên tiếp giành chiến thắng tuyệt đối APPARE - Ảnh 4.\" id=\"img_534cdac0-16ca-11e7-aaa9-f5f848e7397b\" src=\"https://vtv1.mediacdn.vn/thumb_w/640/2017/sss9746-1491044374428.jpg\" style=\"border:none; display:block; list-style:none; margin:auto; max-width:100%; padding:0px; vertical-align:top; width:639px\" title=\"Robocon 2017: Đại học SPKT Hưng Yên liên tiếp giành chiến thắng tuyệt đối APPARE - Ảnh 4.\" /></span></span></div>\r\n</div>\r\n\r\n<div style=\"margin: auto auto 12.75px; padding: 0px; list-style: none; border: none; font-size: 19px; color: rgb(51, 51, 51); text-align: justify; width: 639px;\">\r\n<div style=\"margin: auto; padding: 0px; list-style: none; border: none;\"><span style=\"font-size:14px\"><span style=\"font-family:georgia,serif\"><img alt=\"Robocon 2017: Đại học SPKT Hưng Yên liên tiếp giành chiến thắng tuyệt đối APPARE - Ảnh 5.\" id=\"img_d9c2c4e0-16c8-11e7-b74b-e16047f42402\" src=\"https://vtv1.mediacdn.vn/thumb_w/640/2017/sss9665-1491043744494.jpg\" style=\"border:none; display:block; list-style:none; margin:auto; max-width:100%; padding:0px; vertical-align:top; width:639px\" title=\"Robocon 2017: Đại học SPKT Hưng Yên liên tiếp giành chiến thắng tuyệt đối APPARE - Ảnh 5.\" /></span></span></div>\r\n</div>\r\n\r\n<div style=\"margin: auto auto 12.75px; padding: 0px; list-style: none; border: none; font-size: 19px; color: rgb(51, 51, 51); text-align: justify; width: 639px;\">\r\n<div style=\"margin: auto; padding: 0px; list-style: none; border: none;\"><span style=\"font-size:14px\"><span style=\"font-family:georgia,serif\"><img alt=\"Robocon 2017: Đại học SPKT Hưng Yên liên tiếp giành chiến thắng tuyệt đối APPARE - Ảnh 6.\" id=\"img_5d616130-16c9-11e7-8f54-4d73ad404e6a\" src=\"https://vtv1.mediacdn.vn/thumb_w/640/2017/sss9779-1491043964372.jpg\" style=\"border:none; display:block; list-style:none; margin:auto; max-width:100%; padding:0px; vertical-align:top; width:639px\" title=\"Robocon 2017: Đại học SPKT Hưng Yên liên tiếp giành chiến thắng tuyệt đối APPARE - Ảnh 6.\" /></span></span></div>\r\n</div>\r\n\r\n<div style=\"margin: auto auto 12.75px; padding: 0px; list-style: none; border: none; font-size: 19px; color: rgb(51, 51, 51); text-align: justify; width: 639px;\">\r\n<div style=\"margin: auto; padding: 0px; list-style: none; border: none;\"><span style=\"font-size:14px\"><span style=\"font-family:georgia,serif\"><img alt=\"Robocon 2017: Đại học SPKT Hưng Yên liên tiếp giành chiến thắng tuyệt đối APPARE - Ảnh 7.\" id=\"img_02037220-16c8-11e7-aaa9-f5f848e7397b\" src=\"https://vtv1.mediacdn.vn/thumb_w/640/2017/sss9618-1491043379261.jpg\" style=\"border:none; display:block; list-style:none; margin:auto; max-width:100%; padding:0px; vertical-align:top; width:639px\" title=\"Robocon 2017: Đại học SPKT Hưng Yên liên tiếp giành chiến thắng tuyệt đối APPARE - Ảnh 7.\" /></span></span></div>\r\n</div>\r\n\r\n<div style=\"margin: auto auto 12.75px; padding: 0px; list-style: none; border: none; font-size: 19px; color: rgb(51, 51, 51); text-align: justify; width: 639px;\">\r\n<div style=\"margin: auto; padding: 0px; list-style: none; border: none;\"><span style=\"font-size:14px\"><span style=\"font-family:georgia,serif\"><img alt=\"Robocon 2017: Đại học SPKT Hưng Yên liên tiếp giành chiến thắng tuyệt đối APPARE - Ảnh 8.\" id=\"img_5ce4de30-16c9-11e7-b74b-e16047f42402\" src=\"https://vtv1.mediacdn.vn/thumb_w/640/2017/sss9763-1491043964372.jpg\" style=\"border:none; display:block; list-style:none; margin:auto; max-width:100%; padding:0px; vertical-align:top; width:639px\" title=\"Robocon 2017: Đại học SPKT Hưng Yên liên tiếp giành chiến thắng tuyệt đối APPARE - Ảnh 8.\" /></span></span></div>\r\n</div>\r\n\r\n<div style=\"margin: auto auto 12.75px; padding: 0px; list-style: none; border: none; font-size: 19px; color: rgb(51, 51, 51); text-align: justify; width: 639px;\">\r\n<div style=\"margin: auto; padding: 0px; list-style: none; border: none;\"><span style=\"font-size:14px\"><span style=\"font-family:georgia,serif\"><img alt=\"Robocon 2017: Đại học SPKT Hưng Yên liên tiếp giành chiến thắng tuyệt đối APPARE - Ảnh 9.\" id=\"img_5d90fcb0-16c9-11e7-b74b-e16047f42402\" src=\"https://vtv1.mediacdn.vn/thumb_w/640/2017/sss9787-1491043964372.jpg\" style=\"border:none; display:block; list-style:none; margin:auto; max-width:100%; padding:0px; vertical-align:top; width:639px\" title=\"Robocon 2017: Đại học SPKT Hưng Yên liên tiếp giành chiến thắng tuyệt đối APPARE - Ảnh 9.\" /></span></span></div>\r\n</div>\r\n\r\n<div style=\"margin: auto auto 12.75px; padding: 0px; list-style: none; border: none; font-size: 19px; color: rgb(51, 51, 51); text-align: justify; width: 639px;\">\r\n<div style=\"margin: auto; padding: 0px; list-style: none; border: none;\"><span style=\"font-size:14px\"><span style=\"font-family:georgia,serif\"><img alt=\"Robocon 2017: Đại học SPKT Hưng Yên liên tiếp giành chiến thắng tuyệt đối APPARE - Ảnh 10.\" id=\"img_da918690-16c8-11e7-8f54-4d73ad404e6a\" src=\"https://vtv1.mediacdn.vn/thumb_w/640/2017/sss9695-1491043744510.jpg\" style=\"border:none; display:block; list-style:none; margin:auto; max-width:100%; padding:0px; vertical-align:top; width:639px\" title=\"Robocon 2017: Đại học SPKT Hưng Yên liên tiếp giành chiến thắng tuyệt đối APPARE - Ảnh 10.\" /></span></span></div>\r\n</div>\r\n\r\n<div style=\"margin: auto auto 12.75px; padding: 0px; list-style: none; border: none; font-size: 19px; color: rgb(51, 51, 51); text-align: justify; width: 639px;\">\r\n<div style=\"margin: auto; padding: 0px; list-style: none; border: none;\"><span style=\"font-size:14px\"><span style=\"font-family:georgia,serif\"><img alt=\"Robocon 2017: Đại học SPKT Hưng Yên liên tiếp giành chiến thắng tuyệt đối APPARE - Ảnh 11.\" id=\"img_da6a4f80-16c8-11e7-aaa9-f5f848e7397b\" src=\"https://vtv1.mediacdn.vn/thumb_w/640/2017/sss9684-1491043744510.jpg\" style=\"border:none; display:block; list-style:none; margin:auto; max-width:100%; padding:0px; vertical-align:top; width:639px\" title=\"Robocon 2017: Đại học SPKT Hưng Yên liên tiếp giành chiến thắng tuyệt đối APPARE - Ảnh 11.\" /></span></span></div>\r\n</div>\r\n\r\n<div style=\"margin: auto auto 12.75px; padding: 0px; list-style: none; border: none; font-size: 19px; color: rgb(51, 51, 51); text-align: justify; width: 639px;\">\r\n<div style=\"margin: auto; padding: 0px; list-style: none; border: none;\"><span style=\"font-size:14px\"><span style=\"font-family:georgia,serif\"><img alt=\"Robocon 2017: Đại học SPKT Hưng Yên liên tiếp giành chiến thắng tuyệt đối APPARE - Ảnh 12.\" id=\"img_5d33c180-16c9-11e7-b5ec-9f5916ac76b9\" src=\"https://vtv1.mediacdn.vn/thumb_w/640/2017/sss9774-1491043964372.jpg\" style=\"border:none; display:block; list-style:none; margin:auto; max-width:100%; padding:0px; vertical-align:top; width:639px\" title=\"Robocon 2017: Đại học SPKT Hưng Yên liên tiếp giành chiến thắng tuyệt đối APPARE - Ảnh 12.\" /></span></span></div>\r\n</div>\r\n\r\n<div style=\"margin: auto auto 12.75px; padding: 0px; list-style: none; border: none; font-size: 19px; color: rgb(51, 51, 51); text-align: justify; width: 639px;\">\r\n<div style=\"margin: auto; padding: 0px; list-style: none; border: none;\"><span style=\"font-size:14px\"><span style=\"font-family:georgia,serif\"><img alt=\"Robocon 2017: Đại học SPKT Hưng Yên liên tiếp giành chiến thắng tuyệt đối APPARE - Ảnh 13.\" id=\"img_53732770-16ca-11e7-b74b-e16047f42402\" src=\"https://vtv1.mediacdn.vn/thumb_w/640/2017/sss9755-1491044374435.jpg\" style=\"border:none; display:block; list-style:none; margin:auto; max-width:100%; padding:0px; vertical-align:top; width:639px\" title=\"Robocon 2017: Đại học SPKT Hưng Yên liên tiếp giành chiến thắng tuyệt đối APPARE - Ảnh 13.\" /></span></span></div>\r\n</div>\r\n\r\n<div style=\"margin: auto auto 12.75px; padding: 0px; list-style: none; border: none; font-size: 19px; color: rgb(51, 51, 51); text-align: justify; width: 639px;\">\r\n<div style=\"margin: auto; padding: 0px; list-style: none; border: none;\"><span style=\"font-size:14px\"><span style=\"font-family:georgia,serif\"><img alt=\"Robocon 2017: Đại học SPKT Hưng Yên liên tiếp giành chiến thắng tuyệt đối APPARE - Ảnh 14.\" id=\"img_022949a0-16c8-11e7-b5ec-9f5916ac76b9\" src=\"https://vtv1.mediacdn.vn/thumb_w/640/2017/sss9622-1491043379261.jpg\" style=\"border:none; display:block; list-style:none; margin:auto; max-width:100%; padding:0px; vertical-align:top; width:639px\" title=\"Robocon 2017: Đại học SPKT Hưng Yên liên tiếp giành chiến thắng tuyệt đối APPARE - Ảnh 14.\" /></span></span></div>\r\n</div>\r\n\r\n<div style=\"margin: auto auto 12.75px; padding: 0px; list-style: none; border: none; font-size: 19px; color: rgb(51, 51, 51); text-align: justify; width: 639px;\">\r\n<div style=\"margin: auto; padding: 0px; list-style: none; border: none;\"><span style=\"font-size:14px\"><span style=\"font-family:georgia,serif\"><img alt=\"Robocon 2017: Đại học SPKT Hưng Yên liên tiếp giành chiến thắng tuyệt đối APPARE - Ảnh 15.\" id=\"img_01b48ed0-16c8-11e7-b74b-e16047f42402\" src=\"https://vtv1.mediacdn.vn/thumb_w/640/2017/sss9613-1491043379261.jpg\" style=\"border:none; display:block; list-style:none; margin:auto; max-width:100%; padding:0px; vertical-align:top; width:639px\" title=\"Robocon 2017: Đại học SPKT Hưng Yên liên tiếp giành chiến thắng tuyệt đối APPARE - Ảnh 15.\" /></span></span></div>\r\n</div>\r\n\r\n<div style=\"margin: auto auto 12.75px; padding: 0px; list-style: none; border: none; font-size: 19px; color: rgb(51, 51, 51); text-align: justify; width: 639px;\">\r\n<div style=\"margin: auto; padding: 0px; list-style: none; border: none;\"><span style=\"font-size:14px\"><span style=\"font-family:georgia,serif\"><img alt=\"Robocon 2017: Đại học SPKT Hưng Yên liên tiếp giành chiến thắng tuyệt đối APPARE - Ảnh 16.\" id=\"img_5ecb3c50-16c7-11e7-b74b-e16047f42402\" src=\"https://vtv1.mediacdn.vn/thumb_w/640/2017/sss9877-1491043104033.jpg\" style=\"border:none; display:block; list-style:none; margin:auto; max-width:100%; padding:0px; vertical-align:top; width:639px\" title=\"Robocon 2017: Đại học SPKT Hưng Yên liên tiếp giành chiến thắng tuyệt đối APPARE - Ảnh 16.\" /></span></span></div>\r\n</div>\r\n\r\n<div style=\"margin: auto auto 12.75px; padding: 0px; list-style: none; border: none; font-size: 19px; color: rgb(51, 51, 51); text-align: justify; width: 639px;\">\r\n<div style=\"margin: auto; padding: 0px; list-style: none; border: none;\"><span style=\"font-size:14px\"><span style=\"font-family:georgia,serif\"><img alt=\"Robocon 2017: Đại học SPKT Hưng Yên liên tiếp giành chiến thắng tuyệt đối APPARE - Ảnh 17.\" id=\"img_d9e84e40-16c8-11e7-b74b-e16047f42402\" src=\"https://vtv1.mediacdn.vn/thumb_w/640/2017/sss9674-1491043744510.jpg\" style=\"border:none; display:block; list-style:none; margin:auto; max-width:100%; padding:0px; vertical-align:top; width:639px\" title=\"Robocon 2017: Đại học SPKT Hưng Yên liên tiếp giành chiến thắng tuyệt đối APPARE - Ảnh 17.\" /></span></span></div>\r\n</div>\r\n\r\n<div style=\"margin: auto auto 12.75px; padding: 0px; list-style: none; border: none; font-size: 19px; color: rgb(51, 51, 51); text-align: justify; width: 639px;\">\r\n<div style=\"margin: auto; padding: 0px; list-style: none; border: none;\"><span style=\"font-size:14px\"><span style=\"font-family:georgia,serif\"><img alt=\"Robocon 2017: Đại học SPKT Hưng Yên liên tiếp giành chiến thắng tuyệt đối APPARE - Ảnh 18.\" id=\"img_e43a5a40-16c4-11e7-b74b-e16047f42402\" src=\"https://vtv1.mediacdn.vn/thumb_w/640/2017/sss9851-1491041927443.jpg\" style=\"border:none; display:block; list-style:none; margin:auto; max-width:100%; padding:0px; vertical-align:top; width:639px\" title=\"Robocon 2017: Đại học SPKT Hưng Yên liên tiếp giành chiến thắng tuyệt đối APPARE - Ảnh 18.\" /></span></span></div>\r\n</div>\r\n\r\n<div style=\"margin: auto auto 12.75px; padding: 0px; list-style: none; border: none; font-size: 19px; color: rgb(51, 51, 51); text-align: justify; width: 639px;\">\r\n<div style=\"margin: auto; padding: 0px; list-style: none; border: none;\"><span style=\"font-size:14px\"><span style=\"font-family:georgia,serif\"><img alt=\"Robocon 2017: Đại học SPKT Hưng Yên liên tiếp giành chiến thắng tuyệt đối APPARE - Ảnh 19.\" id=\"img_02a24a30-16c8-11e7-b74b-e16047f42402\" src=\"https://vtv1.mediacdn.vn/thumb_w/640/2017/sss9632-1491043379261.jpg\" style=\"border:none; display:block; list-style:none; margin:auto; max-width:100%; padding:0px; vertical-align:top; width:639px\" title=\"Robocon 2017: Đại học SPKT Hưng Yên liên tiếp giành chiến thắng tuyệt đối APPARE - Ảnh 19.\" /></span></span></div>\r\n</div>\r\n\r\n<div style=\"margin: auto auto 12.75px; padding: 0px; list-style: none; border: none; font-size: 19px; color: rgb(51, 51, 51); text-align: justify; width: 639px;\">\r\n<div style=\"margin: auto; padding: 0px; list-style: none; border: none;\"><span style=\"font-size:14px\"><span style=\"font-family:georgia,serif\"><img alt=\"Robocon 2017: Đại học SPKT Hưng Yên liên tiếp giành chiến thắng tuyệt đối APPARE - Ảnh 20.\" id=\"img_5f0cd930-16c7-11e7-aaa9-f5f848e7397b\" src=\"https://vtv1.mediacdn.vn/thumb_w/640/2017/tsss9596-1491043104046.jpg\" style=\"border:none; display:block; list-style:none; margin:auto; max-width:100%; padding:0px; vertical-align:top; width:639px\" title=\"Robocon 2017: Đại học SPKT Hưng Yên liên tiếp giành chiến thắng tuyệt đối APPARE - Ảnh 20.\" /></span></span></div>\r\n</div>\r\n\r\n<div style=\"margin: auto auto 12.75px; padding: 0px; list-style: none; border: none; font-size: 19px; color: rgb(51, 51, 51); text-align: justify; width: 639px;\">\r\n<div style=\"margin: auto; padding: 0px; list-style: none; border: none;\"><span style=\"font-size:14px\"><span style=\"font-family:georgia,serif\"><img alt=\"Robocon 2017: Đại học SPKT Hưng Yên liên tiếp giành chiến thắng tuyệt đối APPARE - Ảnh 21.\" id=\"img_5d0a4080-16c9-11e7-aaa9-f5f848e7397b\" src=\"https://vtv1.mediacdn.vn/thumb_w/640/2017/sss9767-1491043964372.jpg\" style=\"border:none; display:block; list-style:none; margin:auto; max-width:100%; padding:0px; vertical-align:top; width:639px\" title=\"Robocon 2017: Đại học SPKT Hưng Yên liên tiếp giành chiến thắng tuyệt đối APPARE - Ảnh 21.\" /></span></span></div>\r\n</div>\r\n\r\n<div style=\"margin: auto auto 12.75px; padding: 0px; list-style: none; border: none; font-size: 19px; color: rgb(51, 51, 51); text-align: justify; width: 639px;\">\r\n<div style=\"margin: auto; padding: 0px; list-style: none; border: none;\"><span style=\"font-size:14px\"><span style=\"font-family:georgia,serif\"><img alt=\"Robocon 2017: Đại học SPKT Hưng Yên liên tiếp giành chiến thắng tuyệt đối APPARE - Ảnh 22.\" id=\"img_0257fac0-16c8-11e7-b74b-e16047f42402\" src=\"https://vtv1.mediacdn.vn/thumb_w/640/2017/sss9628-1491043379261.jpg\" style=\"border:none; display:block; list-style:none; margin:auto; max-width:100%; padding:0px; vertical-align:top; width:639px\" title=\"Robocon 2017: Đại học SPKT Hưng Yên liên tiếp giành chiến thắng tuyệt đối APPARE - Ảnh 22.\" /></span></span></div>\r\n</div>\r\n\r\n<div style=\"margin: auto auto 12.75px; padding: 0px; list-style: none; border: none; font-size: 19px; color: rgb(51, 51, 51); text-align: justify; width: 639px;\">\r\n<div style=\"margin: auto; padding: 0px; list-style: none; border: none;\"><span style=\"font-size:14px\"><span style=\"font-family:georgia,serif\"><img alt=\"Robocon 2017: Đại học SPKT Hưng Yên liên tiếp giành chiến thắng tuyệt đối APPARE - Ảnh 23.\" id=\"img_5eed1c30-16c7-11e7-8f54-4d73ad404e6a\" src=\"https://vtv1.mediacdn.vn/thumb_w/640/2017/tsss9583-1491043104041.jpg\" style=\"border:none; display:block; list-style:none; margin:auto; max-width:100%; padding:0px; vertical-align:top; width:639px\" title=\"Robocon 2017: Đại học SPKT Hưng Yên liên tiếp giành chiến thắng tuyệt đối APPARE - Ảnh 23.\" /></span></span></div>\r\n</div>\r\n\r\n<div style=\"margin: auto auto 12.75px; padding: 0px; list-style: none; border: none; font-size: 19px; color: rgb(51, 51, 51); text-align: justify; width: 639px;\">\r\n<div style=\"margin: auto; padding: 0px; list-style: none; border: none;\"><span style=\"font-size:14px\"><span style=\"font-family:georgia,serif\"><img alt=\"Robocon 2017: Đại học SPKT Hưng Yên liên tiếp giành chiến thắng tuyệt đối APPARE - Ảnh 24.\" id=\"img_e47b5ae0-16c4-11e7-b5ec-9f5916ac76b9\" src=\"https://vtv1.mediacdn.vn/thumb_w/640/2017/sss9858-1491041927447.jpg\" style=\"border:none; display:block; list-style:none; margin:auto; max-width:100%; padding:0px; vertical-align:top; width:639px\" title=\"Robocon 2017: Đại học SPKT Hưng Yên liên tiếp giành chiến thắng tuyệt đối APPARE - Ảnh 24.\" /></span></span></div>\r\n</div>\r\n\r\n<div style=\"margin: auto auto 12.75px; padding: 0px; list-style: none; border: none; font-size: 19px; color: rgb(51, 51, 51); text-align: justify; width: 639px;\">\r\n<div style=\"margin: auto; padding: 0px; list-style: none; border: none;\"><span style=\"font-size:14px\"><span style=\"font-family:georgia,serif\"><img alt=\"Robocon 2017: Đại học SPKT Hưng Yên liên tiếp giành chiến thắng tuyệt đối APPARE - Ảnh 25.\" id=\"img_e41a4f20-16c4-11e7-8f54-4d73ad404e6a\" src=\"https://vtv1.mediacdn.vn/thumb_w/640/2017/sss9849-1491041927440.jpg\" style=\"border:none; display:block; list-style:none; margin:auto; max-width:100%; padding:0px; vertical-align:top; width:639px\" title=\"Robocon 2017: Đại học SPKT Hưng Yên liên tiếp giành chiến thắng tuyệt đối APPARE - Ảnh 25.\" /></span></span></div>\r\n</div>\r\n\r\n<div style=\"margin: auto auto 12.75px; padding: 0px; list-style: none; border: none; font-size: 19px; color: rgb(51, 51, 51); text-align: justify; width: 639px;\">\r\n<div style=\"margin: auto; padding: 0px; list-style: none; border: none;\"><span style=\"font-size:14px\"><span style=\"font-family:georgia,serif\"><img alt=\"Robocon 2017: Đại học SPKT Hưng Yên liên tiếp giành chiến thắng tuyệt đối APPARE - Ảnh 26.\" id=\"img_02a24a30-16c8-11e7-b74b-e16047f42402\" src=\"https://vtv1.mediacdn.vn/thumb_w/640/2017/sss9632-1491043379261.jpg\" style=\"border:none; display:block; list-style:none; margin:auto; max-width:100%; padding:0px; vertical-align:top; width:639px\" title=\"Robocon 2017: Đại học SPKT Hưng Yên liên tiếp giành chiến thắng tuyệt đối APPARE - Ảnh 26.\" /></span></span></div>\r\n</div>\r\n\r\n<div style=\"margin: auto auto 12.75px; padding: 0px; list-style: none; border: none; font-size: 19px; color: rgb(51, 51, 51); text-align: justify; width: 639px;\">\r\n<div style=\"margin: auto; padding: 0px; list-style: none; border: none;\"><span style=\"font-size:14px\"><span style=\"font-family:georgia,serif\"><img alt=\"Robocon 2017: Đại học SPKT Hưng Yên liên tiếp giành chiến thắng tuyệt đối APPARE - Ảnh 27.\" id=\"img_e3b5e800-16c4-11e7-b74b-e16047f42402\" src=\"https://vtv1.mediacdn.vn/thumb_w/640/2017/sss9830-1491041927434.jpg\" style=\"border:none; display:block; list-style:none; margin:auto; max-width:100%; padding:0px; vertical-align:top; width:639px\" title=\"Robocon 2017: Đại học SPKT Hưng Yên liên tiếp giành chiến thắng tuyệt đối APPARE - Ảnh 27.\" /></span></span></div>\r\n</div>\r\n\r\n<div style=\"margin: auto auto 12.75px; padding: 0px; list-style: none; border: none; font-size: 19px; color: rgb(51, 51, 51); text-align: justify; width: 639px;\">\r\n<div style=\"margin: auto; padding: 0px; list-style: none; border: none;\"><span style=\"font-size:14px\"><span style=\"font-family:georgia,serif\"><img alt=\"Robocon 2017: Đại học SPKT Hưng Yên liên tiếp giành chiến thắng tuyệt đối APPARE - Ảnh 28.\" id=\"img_d4c26540-16b9-11e7-b5ec-9f5916ac76b9\" src=\"https://vtv1.mediacdn.vn/thumb_w/640/2017/sss9536-1491036841797.jpg\" style=\"border:none; display:block; list-style:none; margin:auto; max-width:100%; padding:0px; vertical-align:top; width:639px\" title=\"Robocon 2017: Đại học SPKT Hưng Yên liên tiếp giành chiến thắng tuyệt đối APPARE - Ảnh 28.\" /></span></span></div>\r\n</div>\r\n\r\n<div style=\"margin: auto auto 12.75px; padding: 0px; list-style: none; border: none; font-size: 19px; color: rgb(51, 51, 51); text-align: justify; width: 639px;\">\r\n<div style=\"margin: auto; padding: 0px; list-style: none; border: none;\"><span style=\"font-size:14px\"><span style=\"font-family:georgia,serif\"><img alt=\"Robocon 2017: Đại học SPKT Hưng Yên liên tiếp giành chiến thắng tuyệt đối APPARE - Ảnh 29.\" id=\"img_d8b6f800-16b9-11e7-b5ec-9f5916ac76b9\" src=\"https://vtv1.mediacdn.vn/thumb_w/640/2017/sss9544-1491036841807.jpg\" style=\"border:none; display:block; list-style:none; margin:auto; max-width:100%; padding:0px; vertical-align:top; width:639px\" title=\"Robocon 2017: Đại học SPKT Hưng Yên liên tiếp giành chiến thắng tuyệt đối APPARE - Ảnh 29.\" /></span></span></div>\r\n</div>\r\n\r\n<div style=\"margin: auto auto 12.75px; padding: 0px; list-style: none; border: none; font-size: 19px; color: rgb(51, 51, 51); text-align: justify; width: 639px;\">\r\n<div style=\"margin: auto; padding: 0px; list-style: none; border: none;\"><span style=\"font-size:14px\"><span style=\"font-family:georgia,serif\"><img alt=\"Robocon 2017: Đại học SPKT Hưng Yên liên tiếp giành chiến thắng tuyệt đối APPARE - Ảnh 30.\" id=\"img_e336f400-16c4-11e7-b74b-e16047f42402\" src=\"https://vtv1.mediacdn.vn/thumb_w/640/2017/sss9801-1491041927420.jpg\" style=\"border:none; display:block; list-style:none; margin:auto; max-width:100%; padding:0px; vertical-align:top; width:639px\" title=\"Robocon 2017: Đại học SPKT Hưng Yên liên tiếp giành chiến thắng tuyệt đối APPARE - Ảnh 30.\" /></span></span></div>\r\n</div>\r\n\r\n<div style=\"margin: auto auto 12.75px; padding: 0px; list-style: none; border: none; font-size: 19px; color: rgb(51, 51, 51); text-align: justify; width: 639px;\">\r\n<div style=\"margin: auto; padding: 0px; list-style: none; border: none;\"><span style=\"font-size:14px\"><span style=\"font-family:georgia,serif\"><img alt=\"Robocon 2017: Đại học SPKT Hưng Yên liên tiếp giành chiến thắng tuyệt đối APPARE - Ảnh 31.\" id=\"img_e3e2eb70-16c4-11e7-aaa9-f5f848e7397b\" src=\"https://vtv1.mediacdn.vn/thumb_w/640/2017/sss9838-1491041927437.jpg\" style=\"border:none; display:block; list-style:none; margin:auto; max-width:100%; padding:0px; vertical-align:top; width:639px\" title=\"Robocon 2017: Đại học SPKT Hưng Yên liên tiếp giành chiến thắng tuyệt đối APPARE - Ảnh 31.\" /></span></span></div>\r\n\r\n<div style=\"margin: auto; padding: 0px; list-style: none; border: none; text-align: left;\"><br />\r\n&nbsp;</div>\r\n\r\n<div style=\"margin: auto; padding: 0px; list-style: none; border: none; text-align: left;\"><span style=\"font-size:14px\"><span style=\"font-family:georgia,serif\">Một số video thi đấu của đội tuyển ĐH SPKT Hưng Yên:</span></span></div>\r\n\r\n<div style=\"margin: auto; padding: 0px; list-style: none; border: none;\">&nbsp;</div>\r\n\r\n<div style=\"margin: auto; padding: 0px; list-style: none; border: none; text-align: left;\"><span style=\"font-size:14px\"><span style=\"font-family:georgia,serif\"><iframe frameborder=\"0\" height=\"315\" src=\"https://www.youtube.com/embed/kyT_2qQlghs\" width=\"560\"></iframe></span></span></div>\r\n\r\n<div style=\"margin: auto; padding: 0px; list-style: none; border: none; text-align: right;\">&nbsp;</div>\r\n\r\n<div style=\"margin: auto; padding: 0px; list-style: none; border: none; text-align: left;\"><span style=\"font-size:14px\"><span style=\"font-family:georgia,serif\"><iframe frameborder=\"0\" height=\"315\" src=\"https://www.youtube.com/embed/NFf2z_WPs44\" width=\"560\"></iframe></span></span><br />\r\n&nbsp;</div>\r\n\r\n<div style=\"margin: auto; padding: 0px; list-style: none; border: none; text-align: right;\"><strong><span style=\"font-size:16px\"><span style=\"font-family:georgia,serif\"><em>-----Theo vtv.vn-----</em></span></span></strong></div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"clear\" style=\"clear: both; float: none; background-image: none; background-position: 0px 0px; background-size: initial; background-repeat: repeat; background-attachment: scroll; background-origin: initial; background-clip: initial; border: 0px none; font-size: 0px; height: 0px; list-style: none outside none; margin: 0px; overflow: hidden; padding: 0px; visibility: hidden; width: 0px; color: rgb(0, 0, 0); font-family: Tahoma, \">&nbsp;</div>\r\n\r\n<h1>&nbsp;</h1>\r\n', NULL, NULL, 1, 0, 0, 0, 1, NULL, '2017-04-25 19:08:07', '2017-04-26 03:12:18'),
(315, 15, ' Thông báo về việc điều chỉnh kế hoạch thi tuyển sinh cao học đợt 1 năm 2017', '-thong-bao-ve-viec-dieu-chinh-ke-hoach-thi-tuyen-sinh-cao-hoc-dot-1-nam-2017', 'none.png', '<p><span style=\"font-size:16px\"><span style=\"font-family:tahoma,geneva,sans-serif\">&nbsp;Thông báo về việc điều chỉnh kế hoạch thi tuyển sinh cao học đợt 1 năm 2017</span></span></p>\r\n', '<p><iframe height=\"650px\" src=\"https://drive.google.com/file/d/0B9o7jgx8RLx7MFRnT0Jpc3FqUlFucl9CTy1BNS05aTNXU3Zr/preview\" style=\"color: rgb(34, 34, 34); font-family: Tahoma, \" width=\"650px\"></iframe></p>\r\n', ' Thông báo về việc điều chỉnh kế hoạch thi tuyển sinh cao học đợt 1 năm 2017', ' Thông báo về việc điều chỉnh kế hoạch thi tuyển sinh cao học đợt 1 năm 2017', 1, 0, 0, 0, 1, NULL, '2017-04-26 03:02:31', '2017-04-26 03:04:52'),
(317, 17, 'Thông báo tuyển dụng giảng viên năm 2017', 'thong-bao-tuyen-dung-giang-vien-nam-2017', 'none.png', '<p><span style=\"font-size:16px\"><span style=\"font-family:tahoma,geneva,sans-serif\">Thông báo tuyển dụng giảng viên năm 2017</span></span></p>\r\n', '<p style=\"text-align:center\"><iframe height=\"650px\" src=\"https://drive.google.com/file/d/0B9o7jgx8RLx7QWtkUUJiMEpCRWlnUTZqOGJHczE4bmY4UHBr/preview\" width=\"650px\"></iframe></p>\r\n', 'Thông báo tuyển dụng giảng viên năm 2017', 'Thông báo tuyển dụng giảng viên năm 2017', 1, 0, 0, 0, 1, NULL, '2017-04-26 03:11:33', '2017-04-26 03:13:57'),
(318, 1, 'Thông báo tuyển sinh Cao học đợt 1 năm 2017', 'thong-bao-tuyen-sinh-cao-hoc-dot-1-nam-2017', 'none.png', '<p><span style=\"font-size:14px\"><span style=\"font-family:tahoma,geneva,sans-serif\">Thông báo tuyển sinh Cao học đợt 1 năm 2017</span></span></p>\r\n', '<p style=\"text-align: center;\"><iframe height=\"650px\" src=\"https://drive.google.com/file/d/0B9o7jgx8RLx7UjBJR0RObWZBa05UbWFrdnBKMjBzS2ZEOF9J/preview\" style=\"color: rgb(34, 34, 34); font-family: Tahoma, &quot;Times New Roman&quot;, Times, serif; font-size: 14px; text-align: center;\" width=\"650px\"></iframe></p>\r\n', 'Thông báo tuyển sinh Cao học đợt 1 năm 2017', 'Thông báo tuyển sinh Cao học đợt 1 năm 2017', 1, 0, 0, 0, 1, NULL, '2017-04-26 03:20:52', '2017-04-26 03:21:06');
INSERT INTO `news` (`id`, `cate_id`, `name`, `alias`, `image`, `desc`, `detail`, `meta_key`, `meta_desc`, `user_id`, `isDraft`, `isBrowse`, `isPublish`, `status`, `tags`, `created_at`, `updated_at`) VALUES
(319, 1, 'Thông báo số 5: V/v công bố điểm trúng tuyển nguyện vọng bổ sung đợt 1 và nhận hồ sơ xét tuyển nguyện vọng bổ sung đợt 2 năm 2016', 'thong-bao-so-5-v-v-cong-bo-diem-trung-tuyen-nguyen-vong-bo-sung-dot-1-va-nhan-ho-so-xet-tuyen-nguyen-vong-bo-sung-dot-2-nam-2016', 'none.png', '<p><span style=\"font-size:14px\">Thông báo số 5: V/v công bố điểm trúng tuyển nguyện vọng bổ sung đợt 1 và nhận hồ sơ xét tuyển nguyện vọng bổ sung đợt 2 năm 2016</span></p>\r\n', '<p><iframe height=\"400px\" src=\"https://drive.google.com/file/d/0B8ImJFPkn3MVMVUwRm56dFNySE0/preview\" width=\"680px\"></iframe></p>\r\n', 'Thông báo số 5: V/v công bố điểm trúng tuyển nguyện vọng bổ sung đợt 1 và nhận hồ sơ xét tuyển nguyện vọng bổ sung đợt 2 năm 2016', 'Thông báo số 5: V/v công bố điểm trúng tuyển nguyện vọng bổ sung đợt 1 và nhận hồ sơ xét tuyển nguyện vọng bổ sung đợt 2 năm 2016', 1, 0, 0, 0, 1, NULL, '2017-04-26 03:43:16', '2017-04-26 03:43:35'),
(320, 18, 'Thông báo số 1 cuộc thi Olympic Tin học trường ĐH SPKT Hưng Yên', 'thong-bao-so-1-cuoc-thi-olympic-tin-hoc-truong-dh-spkt-hung-yen', 'rwvBHQ5EMWCQD84nC3T02BZzrr881gbcpkm10YvdK9dOcSao0K_18_41_19_acmlogo.jpg', '<p><span style=\"font-size:14px\">Thông báo số 1 cuộc thi Olympic Tin học trường ĐH SPKT Hưng Yên</span></p>\r\n', '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse:collapse; border-spacing:0pt; color:rgb(34, 34, 34); font-family:tahoma,times new roman,times,serif; font-size:14px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<div style=\"text-align: center;\"><span style=\"font-size:17px\"><span style=\"font-family:times new roman\">BỘ GIÁO DỤC VÀ ĐÀO TẠO</span></span></div>\r\n\r\n			<div style=\"text-align: center;\"><span style=\"font-size:17px\"><span style=\"font-family:times new roman\">TRƯỜNG ĐHSPKT HƯNG YÊN</span></span></div>\r\n			</td>\r\n			<td>\r\n			<div style=\"text-align: center;\"><span style=\"font-size:17px\"><span style=\"font-family:times new roman\">CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</span></span></div>\r\n\r\n			<div style=\"text-align: center;\"><span style=\"font-size:17px\"><span style=\"font-family:times new roman\">&nbsp;Độc lập - Tự do - Hạnh phúc</span></span></div>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<div style=\"color: rgb(34, 34, 34); font-family: Tahoma, \"><span style=\"font-size:17px\"><span style=\"font-family:times new roman\"><em>Hưng Yên, ngày 01 tháng 12 năm 2014</em></span></span></div>\r\n\r\n<div style=\"color: rgb(34, 34, 34); font-family: Tahoma, \"><span style=\"font-size:17px\"><span style=\"font-family:times new roman\"><strong>THÔNG BÁO SỐ 1</strong></span></span></div>\r\n\r\n<div style=\"color: rgb(34, 34, 34); font-family: Tahoma, \"><span style=\"font-size:17px\"><span style=\"font-family:times new roman\"><em>V/v tổ chức Hội thi Olympic Tin học Sinh viên Trường ĐHSPKT Hưng Yên lần thứ 15</em></span></span></div>\r\n\r\n<div style=\"color: rgb(34, 34, 34); font-family: Tahoma, \"><span style=\"font-size:17px\"><span style=\"font-family:times new roman\">- Nhằm động viên phong trào giao lưu học tập, nghiên cứu, ứng dụng Công nghệ Thông tin của học sinh, sinh viên trong trường, khuyến khích các tài năng tin học trẻ;</span></span></div>\r\n\r\n<div style=\"color: rgb(34, 34, 34); font-family: Tahoma, \"><span style=\"font-size:17px\"><span style=\"font-family:times new roman\">- Để chuẩn bị cho công tác lựa chọn sinh viên, thành lập đội tuyển tham dự Olympic Tin học Sinh viên toàn quốc năm 2015;</span></span></div>\r\n\r\n<div style=\"color: rgb(34, 34, 34); font-family: Tahoma, \"><span style=\"font-size:17px\"><span style=\"font-family:times new roman\">Được sự cho phép của lãnh đạo Nhà trường và sự hỗ trợ của các đơn vị liên quan, Khoa Công nghệ Thông tin phối hợp với Đoàn thanh niên tổ chức Hội thi Olympic Tin học Sinh viên Trường ĐHSPKT Hưng Yên lần thứ 15 từ ngày&nbsp;<strong>20</strong><strong>/12/2014 đến 23/12/2014</strong>.</span></span></div>\r\n\r\n<div style=\"color: rgb(34, 34, 34); font-family: Tahoma, \"><span style=\"font-size:17px\"><span style=\"font-family:times new roman\">Ban tổ chức xin trân trọng thông báo tới các lớp trong toàn trường lựa chọn, cử đội tuyển tham dự các khối thi:</span></span></div>\r\n\r\n<div style=\"color: rgb(34, 34, 34); font-family: Tahoma, \"><span style=\"font-size:17px\"><span style=\"font-family:times new roman\">o&nbsp;<strong>Khối thi A:</strong>&nbsp;Cá nhân chuyên tin&nbsp;<em>(sinh viên Đại học CNTT &gt; năm 2)</em></span></span></div>\r\n\r\n<div style=\"color: rgb(34, 34, 34); font-family: Tahoma, \"><span style=\"font-size:17px\"><span style=\"font-family:times new roman\">o&nbsp;<strong>Khối thi B:</strong>&nbsp;Cá nhân không chuyên tin&nbsp;<em>(sinh viên Đại học CNTT &lt;= năm 2 và sinh ĐH, CĐ toàn trường ngoài CNTT)</em></span></span></div>\r\n\r\n<div style=\"color: rgb(34, 34, 34); font-family: Tahoma, \"><span style=\"font-size:17px\"><span style=\"font-family:times new roman\">o&nbsp;<strong>Khối thi C:</strong>&nbsp;Đồng đội chuyên tin&nbsp;<em>(đội sinh viên Đại học CNTT &gt; năm 2)</em></span></span></div>\r\n\r\n<div style=\"color: rgb(34, 34, 34); font-family: Tahoma, \"><span style=\"font-size:17px\"><span style=\"font-family:times new roman\">o&nbsp;<strong>Khối thi D:</strong>&nbsp;Đồng đội không chuyên tin&nbsp;<em>(đội sinh viên Đại học CNTT &lt;= năm 2 và sinh ĐH, CĐ toàn trường ngoài CNTT)</em></span></span></div>\r\n\r\n<div style=\"color: rgb(34, 34, 34); font-family: Tahoma, \"><span style=\"font-size:17px\"><span style=\"font-family:times new roman\">o&nbsp;<strong>Khối thi E:</strong>&nbsp;Thiết kế giao diện website&nbsp;<em>(sinh viên toàn trường)</em></span></span></div>\r\n\r\n<div style=\"color: rgb(34, 34, 34); font-family: Tahoma, \"><span style=\"font-size:17px\"><span style=\"font-family:times new roman\">Kính đề nghị các Đoàn thanh niên, Hội sinh viên cùng các Khoa, Bộ môn, Trung tâm và các thầy cô giáo trong toàn trường, tạo điều kiện để hội thi thành công và đạt kết quả cao nhất.</span></span></div>\r\n\r\n<div style=\"color: rgb(34, 34, 34); font-family: Tahoma, \"><span style=\"font-size:17px\"><span style=\"font-family:times new roman\">&nbsp;</span></span></div>\r\n\r\n<table align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse:collapse; border-spacing:0pt; color:rgb(34, 34, 34); font-family:tahoma,times new roman,times,serif; font-size:14px; width:669px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<div style=\"text-align: center;\"><span style=\"font-size:17px\"><span style=\"font-family:times new roman\"><em><u>Nơi nhận:</u></em>&nbsp;</span></span></div>\r\n\r\n			<div style=\"text-align: center;\"><span style=\"font-size:17px\"><span style=\"font-family:times new roman\"><em>- Các Khoa, Bộ môn, Trung tâm</em></span></span></div>\r\n\r\n			<div style=\"text-align: center;\"><span style=\"font-size:17px\"><span style=\"font-family:times new roman\"><em>- Đoàn Thanh niên, Hội Sinh viên</em>&nbsp;</span></span></div>\r\n\r\n			<div style=\"text-align: center;\"><span style=\"font-size:17px\"><span style=\"font-family:times new roman\"><em>- Các lớp sinh viên (để thực hiện)&nbsp;</em></span></span></div>\r\n			</td>\r\n			<td>\r\n			<div style=\"text-align: center;\"><span style=\"font-size:17px\"><span style=\"font-family:times new roman\"><strong>TRƯỞNG BAN TỔ CHỨC</strong></span></span></div>\r\n\r\n			<div style=\"text-align: center;\"><span style=\"font-size:17px\"><span style=\"font-family:times new roman\"><strong>&nbsp;</strong>&nbsp;</span></span></div>\r\n\r\n			<div style=\"text-align: center;\"><span style=\"font-size:17px\"><span style=\"font-family:times new roman\">&nbsp;</span></span></div>\r\n\r\n			<div style=\"text-align: center;\"><span style=\"font-size:17px\"><span style=\"font-family:times new roman\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Th.S Nguyễn Văn Quyết</strong></span></span></div>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<div style=\"color: rgb(34, 34, 34); font-family: Tahoma, \"><span style=\"font-size:17px\"><span style=\"font-family:times new roman\">&nbsp;</span></span></div>\r\n\r\n<div style=\"color: rgb(34, 34, 34); font-family: Tahoma, \"><br />\r\n<br />\r\n<br />\r\n<br />\r\n<span style=\"font-size:17px\"><span style=\"font-family:times new roman\">Thông tin chi tiết xem tại website:&nbsp;</span></span><a href=\"http://olp.utehy.edu.vn/\" style=\"text-decoration-line: none; outline: none; color: rgb(87, 21, 134);\"><span style=\"font-size:17px\"><span style=\"font-family:times new roman\">http://olp.utehy.edu.vn</span></span></a><span style=\"font-size:17px\"><span style=\"font-family:times new roman\">&nbsp;hoặc&nbsp;</span></span><a href=\"http://fit.utehy.edu.vn/\" style=\"text-decoration-line: none; outline: none; color: rgb(87, 21, 134);\"><span style=\"font-size:17px\"><span style=\"font-family:times new roman\">http://fit.utehy.edu.vn</span></span></a><span style=\"font-size:17px\"><span style=\"font-family:times new roman\">&nbsp;<strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</strong></span></span></div>\r\n', 'Thông báo số 1 cuộc thi Olympic Tin học trường ĐH SPKT Hưng Yên', 'Thông báo số 1 cuộc thi Olympic Tin học trường ĐH SPKT Hưng Yên', 1, 0, 1, 0, 1, 'olympic tin học , sinh viên ', '2017-04-26 04:44:27', '2017-04-26 06:19:53'),
(321, 17, 'Quyết định miễn giảm học phí cho sinh viên', 'quyet-dinh-mien-giam-hoc-phi-cho-sinh-vien', 'none.png', '<p><span style=\"font-size:14px\">Quyết định miễn giảm học phí cho sinh viên</span></p>\r\n', '<p style=\"text-align:center\"><iframe height=\"650px\" src=\"https://drive.google.com/file/d/0B9o7jgx8RLx7OUFjSTJhU3pkNlU/preview\" width=\"650px\"></iframe></p>\r\n\r\n<p style=\"text-align:center\"><iframe height=\"650px\" src=\"https://drive.google.com/file/d/0B9o7jgx8RLx7a1ZPazhQeGJWZGs/preview\" style=\"color: rgb(34, 34, 34); font-family: Tahoma, \" width=\"650px\"></iframe></p>\r\n', 'Quyết định miễn giảm học phí cho sinh viên', 'Quyết định miễn giảm học phí cho sinh viên', 1, 0, 0, 0, 1, 'sinh viên , học phí', '2017-04-26 05:58:27', '2017-04-26 06:23:27');

-- --------------------------------------------------------

--
-- Table structure for table `new_tags`
--

CREATE TABLE `new_tags` (
  `tag_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `new_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `new_tags`
--

INSERT INTO `new_tags` (`tag_id`, `new_id`, `created_at`, `updated_at`) VALUES
('olympic-tin-hoc', 320, '2017-04-26 06:19:54', '2017-04-26 06:19:54'),
('sinh-vien', 320, '2017-04-26 06:19:54', '2017-04-26 06:19:54'),
('sinh-vien', 321, '2017-04-26 06:21:18', '2017-04-26 06:21:18'),
('hoc-phi', 321, '2017-04-26 06:21:18', '2017-04-26 06:21:18');

-- --------------------------------------------------------

--
-- Table structure for table `new_trashes`
--

CREATE TABLE `new_trashes` (
  `id` int(11) NOT NULL,
  `cate_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'none.png',
  `desc` text COLLATE utf8_unicode_ci,
  `detail` text COLLATE utf8_unicode_ci,
  `meta_key` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_desc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `isDraft` tinyint(1) NOT NULL DEFAULT '0',
  `isBrowse` tinyint(1) NOT NULL DEFAULT '0',
  `isPublish` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `new_trashes`
--

INSERT INTO `new_trashes` (`id`, `cate_id`, `name`, `image`, `desc`, `detail`, `meta_key`, `meta_desc`, `user_id`, `isDraft`, `isBrowse`, `isPublish`, `status`, `created_at`, `updated_at`) VALUES
(316, 1, 'Thông báo tuyển dụng giảng viên năm 2017', 'none.png', '<p><span style=\"font-size:16px\"><span style=\"font-family:tahoma,geneva,sans-serif\">Thông báo tuyển dụng giảng viên năm 2017</span></span></p>\r\n', '<p style=\"text-align: center;\"><iframe height=\"650px\" src=\"https://drive.google.com/file/d/0B9o7jgx8RLx7QWtkUUJiMEpCRWlnUTZqOGJHczE4bmY4UHBr/preview\" width=\"650px\"></iframe></p>\r\n', 'Thông báo tuyển dụng giảng viên năm 2017', 'Thông báo tuyển dụng giảng viên năm 2017', 1, 0, 1, 0, 1, '2017-04-26 03:11:32', '2017-04-26 03:11:32');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sciencestudy`
--

CREATE TABLE `sciencestudy` (
  `id` int(10) UNSIGNED NOT NULL,
  `level` int(11) NOT NULL DEFAULT '0',
  `orderBy` int(10) NOT NULL DEFAULT '0',
  `sciencestudy_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `desc` text COLLATE utf8_unicode_ci NOT NULL,
  `detail` text COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `begin` date NOT NULL,
  `end` date NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sciencestudy`
--

INSERT INTO `sciencestudy` (`id`, `level`, `orderBy`, `sciencestudy_id`, `name`, `desc`, `detail`, `author`, `begin`, `end`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 0, 'NC012-00-NBD', 'Nghiên cứu và chế tạo bộ thu thập tự động dữ liệu thời tiết ứng dụng cho các tram quan trắc khí tượng', '<p><span style=\"color:rgb(70, 70, 70); font-family:arial,tahoma,verdana,sans-serif\">Nghiên cứu và chế tạo bộ thu thập tự động dữ liệu thời tiết ứng dụng cho các tram quan trắc khí tượng</span></p>\r\n', '<p><span style=\"color:rgb(70, 70, 70); font-family:arial,tahoma,verdana,sans-serif\">Nghiên cứu và chế tạo bộ thu thập tự động dữ liệu thời tiết ứng dụng cho các tram quan trắc khí tượng</span></p>\r\n', 'Vũ Huy Thế', '2003-01-02', '2004-01-02', 1, '2017-05-04 18:14:15', '2017-05-04 18:30:59');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'none.png',
  `desc` text COLLATE utf8_unicode_ci NOT NULL,
  `facultyID` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `name`, `image`, `desc`, `facultyID`, `created_at`, `updated_at`) VALUES
(1, 'Bộ môn công nghệ phầm mềm', 'none.png', 'Bộ môn công nghệ phầm mềm', '101', '2017-05-02 05:49:57', '2017-05-02 05:49:57'),
(4, 'Bộ môn Công nghệ may', 'none.png', 'Bộ môn Công nghệ may', '103', '2017-05-02 18:00:20', '2017-05-02 18:00:20'),
(8, 'Bộ môn kỹ thuật máy tính', 'none.png', 'Bộ môn kỹ thuật máy tính', '101', '2017-05-03 06:21:25', '2017-05-03 06:21:25'),
(9, 'Bộ môn mạng máy tính và truyền thông', 'none.png', 'Bộ môn mạng máy tính và truyền thông', '101', '2017-05-03 06:22:05', '2017-05-03 06:22:05');

-- --------------------------------------------------------

--
-- Table structure for table `subject_trash`
--

CREATE TABLE `subject_trash` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'none.png',
  `desc` text COLLATE utf8_unicode_ci NOT NULL,
  `facultyID` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `subject_trash`
--

INSERT INTO `subject_trash` (`id`, `name`, `image`, `desc`, `facultyID`, `created_at`, `updated_at`) VALUES
(6, 'test 2', 'none.png', 'test 2', '0', '2017-05-02 18:03:14', '2017-05-02 18:03:14');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `tag_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`tag_id`, `name`, `created_at`, `updated_at`) VALUES
('olympic-tin-hoc', 'olympic tin học ', '2017-04-26 06:19:54', '2017-04-26 06:19:54'),
('sinh-vien', ' sinh viên ', '2017-04-26 06:19:54', '2017-04-26 06:19:54'),
('hoc-phi', ' học phí', '2017-04-26 06:21:18', '2017-04-26 06:21:18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` int(11) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'TuanBuiDev', 'tuanbuidev@gmail.com', '$2y$10$9ezVFDo2AYxtn.qtYoOxs.PeBez1AJTcroH.dl6NvW1W8htKYd2K.', 0, 'GrdtSYbHeXTSRyQVt0wstDIWgFkrYhfsFNPuUUCtAv38apiCfU6rbDKofOiB', '2017-04-16 06:46:04', '2017-05-02 04:55:37'),
(2, 'Mrs. Carmela Pfannerstill DVM', 'tyrel59@example.org', '$2y$10$9ezVFDo2AYxtn.qtYoOxs.PeBez1AJTcroH.dl6NvW1W8htKYd2K.', 0, 'R3JCEcfcLR', '2017-04-16 06:46:04', '2017-04-16 06:46:04'),
(3, 'Lee Grant III', 'ondricka.andrew@example.com', '$2y$10$9ezVFDo2AYxtn.qtYoOxs.PeBez1AJTcroH.dl6NvW1W8htKYd2K.', 0, 'SQK4upYuPb', '2017-04-16 06:46:04', '2017-04-16 06:46:04'),
(4, 'Zoie Lakin', 'larkin.christop@example.com', '$2y$10$9ezVFDo2AYxtn.qtYoOxs.PeBez1AJTcroH.dl6NvW1W8htKYd2K.', 0, '5bNbo1lw0C', '2017-04-16 06:46:04', '2017-04-16 06:46:04'),
(5, 'Addison Schmidt DDS', 'hintz.caroline@example.com', '$2y$10$9ezVFDo2AYxtn.qtYoOxs.PeBez1AJTcroH.dl6NvW1W8htKYd2K.', 0, 'EABVpQ156Q', '2017-04-16 06:46:04', '2017-04-16 06:46:04'),
(6, 'Mrs. Nichole Altenwerth PhD', 'xmacejkovic@example.com', '$2y$10$9ezVFDo2AYxtn.qtYoOxs.PeBez1AJTcroH.dl6NvW1W8htKYd2K.', 0, 'WbqAFsBW0V', '2017-04-16 06:46:04', '2017-04-16 06:46:04'),
(7, 'Shyann O\'Kon', 'qcole@example.net', '$2y$10$9ezVFDo2AYxtn.qtYoOxs.PeBez1AJTcroH.dl6NvW1W8htKYd2K.', 0, 'yr3eipQd7j', '2017-04-16 06:46:05', '2017-04-16 06:46:05'),
(8, 'Albin Hermiston', 'kessler.odie@example.net', '$2y$10$9ezVFDo2AYxtn.qtYoOxs.PeBez1AJTcroH.dl6NvW1W8htKYd2K.', 0, 'P5RQHTdGJg', '2017-04-16 06:46:05', '2017-04-16 06:46:05'),
(9, 'Mr. Chaim Becker PhD', 'qrunte@example.org', '$2y$10$9ezVFDo2AYxtn.qtYoOxs.PeBez1AJTcroH.dl6NvW1W8htKYd2K.', 0, 'LfyZWWMOdc', '2017-04-16 06:46:05', '2017-04-16 06:46:05'),
(10, 'Prof. Keyon Langosh', 'herman.jayson@example.org', '$2y$10$9ezVFDo2AYxtn.qtYoOxs.PeBez1AJTcroH.dl6NvW1W8htKYd2K.', 0, 'lE0GPdNMhx', '2017-04-16 06:46:05', '2017-04-16 06:46:05'),
(11, 'Jennings Simonis', 'abby53@example.net', '$2y$10$9ezVFDo2AYxtn.qtYoOxs.PeBez1AJTcroH.dl6NvW1W8htKYd2K.', 0, 'rGoK9A679J', '2017-04-16 06:46:05', '2017-04-16 06:46:05'),
(12, 'Dr. Shea Skiles Sr.', 'nedra.donnelly@example.com', '$2y$10$9ezVFDo2AYxtn.qtYoOxs.PeBez1AJTcroH.dl6NvW1W8htKYd2K.', 0, 'FjS9fVjgbD', '2017-04-16 06:46:05', '2017-04-16 06:46:05'),
(13, 'Janessa DuBuque', 'vincenza.abshire@example.net', '$2y$10$9ezVFDo2AYxtn.qtYoOxs.PeBez1AJTcroH.dl6NvW1W8htKYd2K.', 0, '2GIBWJ4CxG', '2017-04-16 06:46:05', '2017-04-16 06:46:05'),
(14, 'Dr. Aniyah Bailey', 'berge.amelie@example.net', '$2y$10$9ezVFDo2AYxtn.qtYoOxs.PeBez1AJTcroH.dl6NvW1W8htKYd2K.', 0, 'RnXrYrONL2', '2017-04-16 06:46:05', '2017-04-16 06:46:05'),
(15, 'Prof. Reyna Koch IV', 'hberge@example.net', '$2y$10$9ezVFDo2AYxtn.qtYoOxs.PeBez1AJTcroH.dl6NvW1W8htKYd2K.', 0, '1Ydus1WgO9', '2017-04-16 06:46:05', '2017-04-16 06:46:05'),
(16, 'Mr. Bernhard Kovacek', 'gage89@example.com', '$2y$10$9ezVFDo2AYxtn.qtYoOxs.PeBez1AJTcroH.dl6NvW1W8htKYd2K.', 0, 'pe6IsQcICo', '2017-04-16 06:46:05', '2017-04-16 06:46:05'),
(17, 'Dr. Conrad Spencer', 'scarlett.weber@example.org', '$2y$10$9ezVFDo2AYxtn.qtYoOxs.PeBez1AJTcroH.dl6NvW1W8htKYd2K.', 0, '6Kfb0o01ww', '2017-04-16 06:46:05', '2017-04-16 06:46:05'),
(18, 'Kali Mraz', 'lgoyette@example.net', '$2y$10$9ezVFDo2AYxtn.qtYoOxs.PeBez1AJTcroH.dl6NvW1W8htKYd2K.', 0, 'p5Pth7iwE9', '2017-04-16 06:46:05', '2017-04-16 06:46:05'),
(19, 'Mr. Noah Bergnaum MD', 'leonora44@example.org', '$2y$10$9ezVFDo2AYxtn.qtYoOxs.PeBez1AJTcroH.dl6NvW1W8htKYd2K.', 0, 'paPwxfASRg', '2017-04-16 06:46:05', '2017-04-16 06:46:05'),
(20, 'Kenyatta Nikolaus', 'smitchell@example.org', '$2y$10$9ezVFDo2AYxtn.qtYoOxs.PeBez1AJTcroH.dl6NvW1W8htKYd2K.', 0, 'x3durOVj1m', '2017-04-16 06:46:05', '2017-04-16 06:46:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `album_file`
--
ALTER TABLE `album_file`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories_trash`
--
ALTER TABLE `categories_trash`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `document_type`
--
ALTER TABLE `document_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_trash`
--
ALTER TABLE `employee_trash`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculty_trash`
--
ALTER TABLE `faculty_trash`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `new_trashes`
--
ALTER TABLE `new_trashes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `sciencestudy`
--
ALTER TABLE `sciencestudy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject_trash`
--
ALTER TABLE `subject_trash`
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
-- AUTO_INCREMENT for table `album_file`
--
ALTER TABLE `album_file`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;
--
-- AUTO_INCREMENT for table `document`
--
ALTER TABLE `document`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `document_type`
--
ALTER TABLE `document_type`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `file`
--
ALTER TABLE `file`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=322;
--
-- AUTO_INCREMENT for table `sciencestudy`
--
ALTER TABLE `sciencestudy`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
