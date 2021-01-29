-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 26, 2021 lúc 03:18 PM
-- Phiên bản máy phục vụ: 10.4.17-MariaDB
-- Phiên bản PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quanlybanhang`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `title`, `price`, `avatar`, `content`, `create_at`) VALUES
(1, 'abvđ', 155, '21292895', 'sssgfcx', '2021-01-26 12:15:31'),
(3, '?sÃ¢s', 2525, '', ' ', '2021-01-26 13:06:17'),
(4, 'đs', 2525, 'sdsd', 'dsdsd', '2021-01-26 13:08:59'),
(5, 'r', 0, '132598778_2870992136474906_5200943793392997487_o.jpg', 'sa', '2021-01-26 13:10:34'),
(6, 'rr', 0, '132598778_2870992136474906_5200943793392997487_o.jpg', ' ', '2021-01-26 13:12:40'),
(7, 'rr', 0, '', '', '2021-01-26 13:15:06'),
(9, '?sÃ¢s', 0, '132598778_2870992136474906_5200943793392997487_o.jpg', ' ', '2021-01-26 13:58:45'),
(10, 'cc', 0, '132598778_2870992136474906_5200943793392997487_o.jpg', ' ', '2021-01-26 14:15:04'),
(11, 'dsc', 0, '132598778_2870992136474906_5200943793392997487_o.jpg', ' ', '2021-01-26 14:17:29');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
