-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th10 05, 2021 lúc 03:39 PM
-- Phiên bản máy phục vụ: 5.7.33
-- Phiên bản PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `luanvan`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bophan`
--

CREATE TABLE `bophan` (
  `id_bophan` int(10) NOT NULL,
  `bophan_ten` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `bophan`
--

INSERT INTO `bophan` (`id_bophan`, `bophan_ten`) VALUES
(1, 'admin');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdonhang`
--

CREATE TABLE `chitietdonhang` (
  `id_thuoctinh` int(10) NOT NULL,
  `id_donhang` int(10) NOT NULL,
  `gia` int(11) NOT NULL,
  `soluong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietthuoctinh`
--

CREATE TABLE `chitietthuoctinh` (
  `id_thuoctinh` int(10) NOT NULL,
  `id_sanpham` int(10) NOT NULL,
  `thuoctinh_mo_ta` varchar(255) NOT NULL,
  `thuoctinh_gia` int(11) NOT NULL,
  `thuoctinh_trang_thai` int(11) NOT NULL,
  `thuoctinh_luot_xem` int(11) NOT NULL,
  `thuoctinh_so_luong` int(11) NOT NULL,
  `thuoctinh_hinh_anh` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhgia`
--

CREATE TABLE `danhgia` (
  `id_danhgia` int(10) NOT NULL,
  `id_sanpham` int(10) NOT NULL,
  `danhgia_binh_luan` varchar(255) NOT NULL,
  `danhgia_ngay` date NOT NULL,
  `danhgia_hinh_anh` varchar(255) NOT NULL,
  `danhgia_sao` int(11) NOT NULL,
  `danhgia_ten_kh` int(11) NOT NULL,
  `danhgia_sdt_kh` int(11) NOT NULL,
  `danhgia_email_kh` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `id_donhang` int(10) NOT NULL,
  `donhang_ngay_giao` date NOT NULL,
  `donhang_ngay_dat` date NOT NULL,
  `donhang_sdt_nguoi_nhan` int(11) NOT NULL,
  `donhang_dia_chi_nguoi_nhan` varchar(255) NOT NULL,
  `donhang_ten_nguoi_nhan` varchar(255) NOT NULL,
  `donhang_trang_thai` int(11) NOT NULL,
  `tong_tien` int(11) NOT NULL,
  `khachhang_sdt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `khachhang_sdt` int(11) NOT NULL,
  `khachhang_ten` varchar(255) NOT NULL,
  `khachhang_diachi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khuyenmai`
--

CREATE TABLE `khuyenmai` (
  `id_khuyenmai` int(10) NOT NULL,
  `khuyenmai_ten` varchar(50) CHARACTER SET utf8 NOT NULL,
  `khuyenmai_loai` varchar(50) CHARACTER SET utf8 NOT NULL,
  `khuyenmai_gia_tri` int(11) NOT NULL,
  `khuyenmai_ngay_bat_dau` date NOT NULL,
  `khuyenmai_ngay_ket_thuc` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaisanpham`
--

CREATE TABLE `loaisanpham` (
  `id_loai` int(10) NOT NULL,
  `loai_ten` varchar(255) CHARACTER SET utf32 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhasanxuat`
--

CREATE TABLE `nhasanxuat` (
  `id_nhasanxuat` int(10) NOT NULL,
  `nhasanxuat_ten` varchar(255) CHARACTER SET utf8 NOT NULL,
  `nhasanxuat_chi_tiet` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `id_sanpham` int(10) NOT NULL,
  `id_loai` int(10) NOT NULL,
  `id_nhasanxuat` int(10) NOT NULL,
  `id_khuyenmai` int(10) NOT NULL,
  `sanpham_ten` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slider_show`
--

CREATE TABLE `slider_show` (
  `id_slider` int(10) NOT NULL,
  `slider_hinh_anh` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thuoctinhsanpham`
--

CREATE TABLE `thuoctinhsanpham` (
  `id_thuoctinh` int(10) NOT NULL,
  `thuoctinh_mau` varchar(50) NOT NULL,
  `thuoctinh_dung_luong` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tintuc`
--

CREATE TABLE `tintuc` (
  `id_tintuc` int(10) NOT NULL,
  `tintuc_tieu_de` varchar(255) NOT NULL,
  `tintuc_hinh_anh` varchar(255) NOT NULL,
  `tintuc_noi_dung` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id_nhanvien` int(10) NOT NULL,
  `id_bophan` int(10) NOT NULL,
  `nhanvien_ten` varchar(255) NOT NULL,
  `nhanvien_sdt` int(50) NOT NULL,
  `nhanvien_gioi_tinh` varchar(50) NOT NULL,
  `nhanvien_dia_chi` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nhanvien_trang_thai` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id_nhanvien`, `id_bophan`, `nhanvien_ten`, `nhanvien_sdt`, `nhanvien_gioi_tinh`, `nhanvien_dia_chi`, `email`, `password`, `nhanvien_trang_thai`) VALUES
(7, 1, 'aa', 113, 'nam', '23 chan hung', 'b@gmail.com', '$2y$10$9E2CvwiizehiM7uvPXWWzOa7WKdoDyzp8BkyT2n8jrLHOLJmcu..u', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bophan`
--
ALTER TABLE `bophan`
  ADD PRIMARY KEY (`id_bophan`);

--
-- Chỉ mục cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD PRIMARY KEY (`id_thuoctinh`,`id_donhang`),
  ADD KEY `id_donhang` (`id_donhang`);

--
-- Chỉ mục cho bảng `chitietthuoctinh`
--
ALTER TABLE `chitietthuoctinh`
  ADD PRIMARY KEY (`id_thuoctinh`,`id_sanpham`),
  ADD KEY `id_sanpham` (`id_sanpham`);

--
-- Chỉ mục cho bảng `danhgia`
--
ALTER TABLE `danhgia`
  ADD PRIMARY KEY (`id_danhgia`),
  ADD KEY `id_sanpham` (`id_sanpham`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`id_donhang`),
  ADD KEY `khachhang_sdt` (`khachhang_sdt`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`khachhang_sdt`);

--
-- Chỉ mục cho bảng `khuyenmai`
--
ALTER TABLE `khuyenmai`
  ADD PRIMARY KEY (`id_khuyenmai`);

--
-- Chỉ mục cho bảng `loaisanpham`
--
ALTER TABLE `loaisanpham`
  ADD PRIMARY KEY (`id_loai`);

--
-- Chỉ mục cho bảng `nhasanxuat`
--
ALTER TABLE `nhasanxuat`
  ADD PRIMARY KEY (`id_nhasanxuat`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id_sanpham`),
  ADD KEY `id_loai` (`id_loai`),
  ADD KEY `id_nhasanxuat` (`id_nhasanxuat`),
  ADD KEY `id_khuyenmai` (`id_khuyenmai`);

--
-- Chỉ mục cho bảng `slider_show`
--
ALTER TABLE `slider_show`
  ADD PRIMARY KEY (`id_slider`);

--
-- Chỉ mục cho bảng `thuoctinhsanpham`
--
ALTER TABLE `thuoctinhsanpham`
  ADD PRIMARY KEY (`id_thuoctinh`);

--
-- Chỉ mục cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  ADD PRIMARY KEY (`id_tintuc`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_nhanvien`),
  ADD KEY `id_bophan` (`id_bophan`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bophan`
--
ALTER TABLE `bophan`
  MODIFY `id_bophan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `danhgia`
--
ALTER TABLE `danhgia`
  MODIFY `id_danhgia` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `id_donhang` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `khuyenmai`
--
ALTER TABLE `khuyenmai`
  MODIFY `id_khuyenmai` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `loaisanpham`
--
ALTER TABLE `loaisanpham`
  MODIFY `id_loai` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `nhasanxuat`
--
ALTER TABLE `nhasanxuat`
  MODIFY `id_nhasanxuat` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id_sanpham` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `slider_show`
--
ALTER TABLE `slider_show`
  MODIFY `id_slider` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `thuoctinhsanpham`
--
ALTER TABLE `thuoctinhsanpham`
  MODIFY `id_thuoctinh` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  MODIFY `id_tintuc` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id_nhanvien` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD CONSTRAINT `chitietdonhang_ibfk_1` FOREIGN KEY (`id_donhang`) REFERENCES `donhang` (`id_donhang`),
  ADD CONSTRAINT `chitietdonhang_ibfk_2` FOREIGN KEY (`id_thuoctinh`) REFERENCES `chitietthuoctinh` (`id_thuoctinh`);

--
-- Các ràng buộc cho bảng `chitietthuoctinh`
--
ALTER TABLE `chitietthuoctinh`
  ADD CONSTRAINT `chitietthuoctinh_ibfk_1` FOREIGN KEY (`id_sanpham`) REFERENCES `sanpham` (`id_sanpham`),
  ADD CONSTRAINT `chitietthuoctinh_ibfk_2` FOREIGN KEY (`id_thuoctinh`) REFERENCES `thuoctinhsanpham` (`id_thuoctinh`);

--
-- Các ràng buộc cho bảng `danhgia`
--
ALTER TABLE `danhgia`
  ADD CONSTRAINT `danhgia_ibfk_1` FOREIGN KEY (`id_sanpham`) REFERENCES `sanpham` (`id_sanpham`);

--
-- Các ràng buộc cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `donhang_ibfk_1` FOREIGN KEY (`khachhang_sdt`) REFERENCES `khachhang` (`khachhang_sdt`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`id_loai`) REFERENCES `loaisanpham` (`id_loai`),
  ADD CONSTRAINT `sanpham_ibfk_2` FOREIGN KEY (`id_nhasanxuat`) REFERENCES `nhasanxuat` (`id_nhasanxuat`),
  ADD CONSTRAINT `sanpham_ibfk_3` FOREIGN KEY (`id_khuyenmai`) REFERENCES `khuyenmai` (`id_khuyenmai`);

--
-- Các ràng buộc cho bảng `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_bophan`) REFERENCES `bophan` (`id_bophan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
