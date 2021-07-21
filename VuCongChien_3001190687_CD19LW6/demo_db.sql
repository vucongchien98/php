-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th7 21, 2021 lúc 03:38 PM
-- Phiên bản máy phục vụ: 5.7.24
-- Phiên bản PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `demo_db`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `content`
--

CREATE TABLE `content` (
  `mssv` int(11) NOT NULL,
  `hoten` varchar(200) NOT NULL,
  `hinhanh` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `content`
--

INSERT INTO `content` (`mssv`, `hoten`, `hinhanh`) VALUES
(2, ' mèo vàng 1', './assets/meo2.jpg'),
(7, ' mèo chạy', './assets/meo4.jpg'),
(18, 'mèo cute', './assets/meo1.png'),
(19, 'mèo cute 1', './assets/meo2.jpg'),
(23, ' abc xyz', './assets/meo1.png'),
(123, 'Linh mieu', './assets/meo1.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(150) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `birthday` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `create_time` int(11) DEFAULT NULL,
  `last_updated` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `fullname`, `birthday`, `status`, `create_time`, `last_updated`) VALUES
(26, 'a', 'e10adc3949ba59abbe56e057f20f883e', 'v', 913654800, 1, 1625659766, 1625815790),
(23, 'chien', 'c4ca4238a0b923820dcc509a6f75849b', 'vũ', 913654800, 1, 1625152204, 1626387299),
(29, 'cc', 'c4ca4238a0b923820dcc509a6f75849b', 'Vũ Công Chiến', 913654800, 1, 1626388521, 1626771210);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_client`
--

CREATE TABLE `user_client` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(150) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `birthday` int(11) DEFAULT NULL,
  `create_time` int(11) DEFAULT NULL,
  `last_updated` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `user_client`
--

INSERT INTO `user_client` (`id`, `username`, `password`, `fullname`, `birthday`, `create_time`, `last_updated`) VALUES
(2, 'chien', 'c4ca4238a0b923820dcc509a6f75849b', 'Vũ Công Chiến', 913654800, 1624248087, 1624248087),
(11, 'ccc', 'c4ca4238a0b923820dcc509a6f75849b', 'vcc', 661194000, 1626394925, 1626394925),
(4, 'chien2', 'e10adc3949ba59abbe56e057f20f883e', 'Vũ Công Chiến', 913654800, 1625127652, 1625127652),
(6, 'chien123', 'c4ca4238a0b923820dcc509a6f75849b', 'vũ ', 913654800, 1625152091, 1625152091),
(8, 'a1', 'c81e728d9d4c2f636f067f89cc14862c', 'aa', 913654800, 1625648609, 1625648609),
(10, 'c', 'c4ca4238a0b923820dcc509a6f75849b', 'vu', 913654800, 1625660339, 1625660339);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `content`
--
ALTER TABLE `content`
  ADD UNIQUE KEY `mssv` (`mssv`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Chỉ mục cho bảng `user_client`
--
ALTER TABLE `user_client`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `user_client`
--
ALTER TABLE `user_client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
