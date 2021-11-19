-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 03, 2021 lúc 02:54 PM
-- Phiên bản máy phục vụ: 10.4.17-MariaDB
-- Phiên bản PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `database_web_bangiay`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai_sp`
--

CREATE TABLE `loai_sp` (
  `iddanhmuc` int(11) NOT NULL,
  `ten_loai` varchar(50) COLLATE utf16_unicode_ci NOT NULL,
  `ghi_chu` varchar(155) COLLATE utf16_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loai_sp`
--

INSERT INTO `loai_sp` (`iddanhmuc`, `ten_loai`, `ghi_chu`) VALUES
(1, 'Giày Nike', 'hàng like auth'),
(2, 'Giày Adidas', 'hàng siêu cấp'),
(3, 'Giày Converse', 'hàng siêu cấp'),
(4, 'Giày Vans', 'hàng rep 1:1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `san_pham`
--

CREATE TABLE `san_pham` (
  `ma_sp` int(11) NOT NULL,
  `ten_sp` varchar(30) COLLATE utf16_unicode_ci NOT NULL,
  `so_luong` double NOT NULL,
  `gia` int(11) NOT NULL,
  `anh` varchar(50) COLLATE utf16_unicode_ci NOT NULL,
  `size` double NOT NULL,
  `mau_sac` varchar(20) COLLATE utf16_unicode_ci NOT NULL,
  `noi_dung` varchar(255) COLLATE utf16_unicode_ci NOT NULL,
  `iddanhmuc` int(11) NOT NULL,
  `trang_thai` varchar(30) COLLATE utf16_unicode_ci NOT NULL,
  `viewer` int(11) NOT NULL,
  `dem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `san_pham`
--

INSERT INTO `san_pham` (`ma_sp`, `ten_sp`, `so_luong`, `gia`, `anh`, `size`, `mau_sac`, `noi_dung`, `iddanhmuc`, `trang_thai`, `viewer`, `dem`) VALUES
(94, 'giày NMR_R1', 12, 850000, '/anh/18.jpg', 43, 'trắng', '     \r\nSnug, phù hợp với tất\r\nĐóng ren\r\nadidas Primeknit dệt trên\r\nVị trí sợi quang phù hợp để hỗ trợ chân giữa\r\nGiày chạy bộ hỗ trợ\r\nĐế giữa của Tăng cường đáp ứng\r\nTrọng lượng: 11 ounce\r\nĐộ rơi của đế giữa: 10 mm (gót chân 22 mm / mũi chân trước 12 mm)\r', 2, 'còn hàng', 26, 0),
(95, 'Giày Stansmith 2018', 45, 500000, '/anh/13.jpg', 43, 'trắng', ' \r\nSnug, phù hợp với tất\r\nĐóng ren\r\nadidas Primeknit dệt trên\r\nVị trí sợi quang phù hợp để hỗ trợ chân giữa\r\nGiày chạy bộ hỗ trợ\r\nĐế giữa của Tăng cường đáp ứng\r\nTrọng lượng: 11 ounce\r\nĐộ rơi của đế giữa: 10 mm (gót chân 22 mm / mũi chân trước 12 mm)\r\nỔn ', 2, 'còn hàng', 16, 0),
(96, 'giày Ultraboot 2021 Black', 23, 1000000, '/anh/14.jpg', 44, 'đen', ' \r\n\r\nSnug, phù hợp với tất\r\nĐóng ren\r\nadidas Primeknit dệt trên\r\nVị trí sợi quang phù hợp để hỗ trợ chân giữa\r\nGiày chạy bộ hỗ trợ\r\nĐế giữa của Tăng cường đáp ứng\r\nTrọng lượng: 11 ounce\r\nĐộ rơi của đế giữa: 10 mm (gót chân 22 mm / mũi chân trước 12 mm)\r\nỔ', 2, 'còn hàng', 4, 0),
(97, 'Giày Nike air 2020', 7, 1200000, '/anh/19.png', 45, 'đỏ ', ' \r\nSnug, phù hợp với tất\r\nĐóng ren\r\nadidas Primeknit dệt trên\r\nVị trí sợi quang phù hợp để hỗ trợ chân giữa\r\nGiày chạy bộ hỗ trợ\r\nĐế giữa của Tăng cường đáp ứng\r\nTrọng lượng: 11 ounce\r\nĐộ rơi của đế giữa: 10 mm (gót chân 22 mm / mũi chân trước 12 mm)\r\nỔn ', 1, 'còn hàng', 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slide`
--

CREATE TABLE `slide` (
  `ma_slide` int(11) NOT NULL,
  `name_slide` varchar(50) NOT NULL,
  `anh_slide` varchar(50) NOT NULL,
  `ngay_dang_slide` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `link_slide` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `slide`
--

INSERT INTO `slide` (`ma_slide`, `name_slide`, `anh_slide`, `ngay_dang_slide`, `link_slide`) VALUES
(1, '2', '/anh/x.png', '2021-03-03 02:54:54.687119', 'c:'),
(2, '3', '/anh/adidas.png', '2021-03-03 02:55:21.065834', 'c:');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `ma_user` int(11) NOT NULL,
  `username` char(50) COLLATE utf16_unicode_ci NOT NULL,
  `email` char(30) COLLATE utf16_unicode_ci DEFAULT NULL,
  `pass_word` varchar(30) COLLATE utf16_unicode_ci NOT NULL,
  `ho_ten` varchar(50) COLLATE utf16_unicode_ci NOT NULL,
  `sdt` char(13) COLLATE utf16_unicode_ci NOT NULL,
  `quyen_qtri` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`ma_user`, `username`, `email`, `pass_word`, `ho_ten`, `sdt`, `quyen_qtri`) VALUES
(12, 'tienanh', 'anhltph11790@gmail.com', '1231', 'Lưu Tiến Anh', '1545', 1),
(69, 'anhltph11790', 'anhltph11790@gmail.com', 'tienanh233', 'tanh', '0987233574', 0),
(70, 'annh', 'vip.phamthu@gmail.com', 'tienanh123', 'tanh', '0987233574', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `loai_sp`
--
ALTER TABLE `loai_sp`
  ADD PRIMARY KEY (`iddanhmuc`);

--
-- Chỉ mục cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  ADD PRIMARY KEY (`ma_sp`),
  ADD KEY `fk_sp_lsp` (`iddanhmuc`);

--
-- Chỉ mục cho bảng `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`ma_slide`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ma_user`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `loai_sp`
--
ALTER TABLE `loai_sp`
  MODIFY `iddanhmuc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  MODIFY `ma_sp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT cho bảng `slide`
--
ALTER TABLE `slide`
  MODIFY `ma_slide` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `ma_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  ADD CONSTRAINT `fk_sp_lsp` FOREIGN KEY (`iddanhmuc`) REFERENCES `loai_sp` (`iddanhmuc`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
