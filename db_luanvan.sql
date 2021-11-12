-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th10 12, 2021 lúc 02:05 PM
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
-- Cơ sở dữ liệu: `db_luanvan`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `baohanhsp`
--

CREATE TABLE `baohanhsp` (
  `id_baohanhsp` int(11) NOT NULL,
  `baohanhsp_ngay_bao_hanh` date NOT NULL,
  `baohanhsp_noi_dung_bao_hanh` longtext NOT NULL,
  `baohanhsp_han_bao_hanh` int(1) NOT NULL,
  `baohanhsp_chi_phi_phat_sinh` int(11) NOT NULL,
  `id_chittietdonhang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhluan`
--

CREATE TABLE `binhluan` (
  `id_binhluan` int(11) NOT NULL,
  `binhluan_ten` varchar(100) NOT NULL,
  `binhluan_email` varchar(100) NOT NULL,
  `binhluan_noi_dung` longtext NOT NULL,
  `binhluan_trang_thai` int(11) NOT NULL,
  `id_sanpham` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chittietdonhang`
--

CREATE TABLE `chittietdonhang` (
  `id_chittietdonhang` int(11) NOT NULL,
  `chittietdonhang_so_luong` int(11) NOT NULL,
  `chittietdonhang_tong_tien` int(11) NOT NULL,
  `chitietdonhang_ngay_mua` date NOT NULL,
  `id_donhang` int(11) NOT NULL,
  `id_sanpham` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `id_donhang` int(11) NOT NULL,
  `donhang_nguoi_nhan` varchar(100) NOT NULL,
  `donhang_nguoi_nhan_sdt` int(12) NOT NULL,
  `donhang_nguoi_nhan_dia_chi` varchar(100) NOT NULL,
  `donhang_ghi_chu` longtext,
  `donhang_tong_tien` int(10) NOT NULL,
  `id_khachhang` int(11) NOT NULL,
  `id_tinhtrangdh` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hinhsanpham`
--

CREATE TABLE `hinhsanpham` (
  `id_hinhsanpham` int(11) NOT NULL,
  `hinhsanpham_ten` varchar(100) NOT NULL,
  `id_sanpham` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `hinhsanpham`
--

INSERT INTO `hinhsanpham` (`id_hinhsanpham`, `hinhsanpham_ten`, `id_sanpham`) VALUES
(1, 'iphone.jpg', 2),
(2, 'iphone123.jpg', 2),
(3, 'iphon23.jpg', 3),
(4, 'iphone123.jpg', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `id_khachhang` int(11) NOT NULL,
  `khachhang_ten` varchar(100) NOT NULL,
  `khachhang_sdt` int(12) NOT NULL,
  `khachhang_dia_chi` varchar(200) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khuyenmai`
--

CREATE TABLE `khuyenmai` (
  `id_khuyenmai` int(11) NOT NULL,
  `khuyenmai_ten` varchar(100) NOT NULL,
  `khuyenmai_loai` varchar(100) NOT NULL,
  `khuyenmai_gia_tri` int(11) NOT NULL,
  `khuyenmai_ngay_bat_dau` date NOT NULL,
  `khuyenmai_ngay_ket_thuc` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `khuyenmai`
--

INSERT INTO `khuyenmai` (`id_khuyenmai`, `khuyenmai_ten`, `khuyenmai_loai`, `khuyenmai_gia_tri`, `khuyenmai_ngay_bat_dau`, `khuyenmai_ngay_ket_thuc`) VALUES
(1, 'không khuyến mãi', 'không', 0, '2021-11-12', '2021-11-12');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loainguoidung`
--

CREATE TABLE `loainguoidung` (
  `id_loainguoidung` int(11) NOT NULL,
  `loainguoidung_ten` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaisp`
--

CREATE TABLE `loaisp` (
  `id_loaisp` int(11) NOT NULL,
  `loaisp_ten` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `loaisp`
--

INSERT INTO `loaisp` (`id_loaisp`, `loaisp_ten`) VALUES
(1, 'điện thoại');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `id_nhanvien` int(11) NOT NULL,
  `nhanvien_ten` int(100) NOT NULL,
  `nhanvien_cccd` int(20) NOT NULL,
  `nhanvien_sdt` int(12) NOT NULL,
  `nhanvien_gioi_tinh` tinyint(1) NOT NULL,
  `nhanvien_ngay_vao_lam` date NOT NULL,
  `nhanvien_dia_chi` varchar(200) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhasanxuat`
--

CREATE TABLE `nhasanxuat` (
  `id_nhasanxuat` int(11) NOT NULL,
  `nhasanxuat_ten` varchar(100) NOT NULL,
  `nhasanxuat_chi_tiet` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `nhasanxuat`
--

INSERT INTO `nhasanxuat` (`id_nhasanxuat`, `nhasanxuat_ten`, `nhasanxuat_chi_tiet`) VALUES
(1, 'apple', 'rất đẹp');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `id_sanpham` int(11) NOT NULL,
  `sanpham_ten` varchar(100) NOT NULL,
  `sanpham_thoi_gian_bao_hanh` varchar(100) NOT NULL,
  `sanpham_mo_ta` longtext NOT NULL,
  `sanpham_hinhanh` varchar(100) NOT NULL,
  `sanpham_gia` int(10) NOT NULL,
  `sanpham_trang_thai` int(11) NOT NULL,
  `sanpham_luot_xem` int(11) NOT NULL,
  `sanpham_so_luong` int(11) NOT NULL,
  `sanpham_mau` varchar(100) NOT NULL,
  `sanpham_dung_luong` varchar(100) NOT NULL,
  `sanpham_noi_bat` int(2) NOT NULL,
  `id_nhasanxuat` int(11) NOT NULL,
  `id_khuyenmai` int(11) NOT NULL,
  `id_loaisp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`id_sanpham`, `sanpham_ten`, `sanpham_thoi_gian_bao_hanh`, `sanpham_mo_ta`, `sanpham_hinhanh`, `sanpham_gia`, `sanpham_trang_thai`, `sanpham_luot_xem`, `sanpham_so_luong`, `sanpham_mau`, `sanpham_dung_luong`, `sanpham_noi_bat`, `id_nhasanxuat`, `id_khuyenmai`, `id_loaisp`) VALUES
(2, 'Iphone X', '36 tháng', 'đep', 'iphone.jpg', 12000000, 1, 0, 10, 'đen', '256GB', 0, 1, 1, 1),
(3, 'Iphone X', '36 tháng', 'đep', 'hinhanh.png', 12000000, 1, 0, 10, 'trắng', '256GB', 0, 1, 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slidershow`
--

CREATE TABLE `slidershow` (
  `id_slider` int(11) NOT NULL,
  `slider_hinh_anh` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tinhtrangdh`
--

CREATE TABLE `tinhtrangdh` (
  `id_tinhtrangdh` int(11) NOT NULL,
  `tinhtrangdh_ten` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tintuc`
--

CREATE TABLE `tintuc` (
  `id_tintuc` int(11) NOT NULL,
  `tintuc_tieu_de` varchar(100) NOT NULL,
  `tintuc_hinh_anh` varchar(100) NOT NULL,
  `tintuc_noi_dung` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tuyendung`
--

CREATE TABLE `tuyendung` (
  `id_tuyendung` int(11) NOT NULL,
  `tuyendung_tieu_de` varchar(100) NOT NULL,
  `tuyendung_anh` varchar(100) NOT NULL,
  `tuyendung_mo_ta` longtext NOT NULL,
  `tuyendung_lien_he` int(11) NOT NULL,
  `tuyendung_thoi_gian` date NOT NULL,
  `tuyendung_tinh_trang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `users_trang_thai` int(2) NOT NULL,
  `id_loainguoidung` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `baohanhsp`
--
ALTER TABLE `baohanhsp`
  ADD PRIMARY KEY (`id_baohanhsp`),
  ADD KEY `id_chittietdonhang` (`id_chittietdonhang`);

--
-- Chỉ mục cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`id_binhluan`),
  ADD KEY `id_sanpham` (`id_sanpham`);

--
-- Chỉ mục cho bảng `chittietdonhang`
--
ALTER TABLE `chittietdonhang`
  ADD PRIMARY KEY (`id_chittietdonhang`),
  ADD KEY `id_donhang` (`id_donhang`),
  ADD KEY `chittietdonhang_ibfk_1` (`id_sanpham`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`id_donhang`),
  ADD KEY `id_khachhang` (`id_khachhang`),
  ADD KEY `id_tinhtrangdh` (`id_tinhtrangdh`);

--
-- Chỉ mục cho bảng `hinhsanpham`
--
ALTER TABLE `hinhsanpham`
  ADD PRIMARY KEY (`id_hinhsanpham`),
  ADD KEY `hinhsanpham_ibfk_1` (`id_sanpham`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`id_khachhang`),
  ADD KEY `id_user` (`id_user`);

--
-- Chỉ mục cho bảng `khuyenmai`
--
ALTER TABLE `khuyenmai`
  ADD PRIMARY KEY (`id_khuyenmai`);

--
-- Chỉ mục cho bảng `loainguoidung`
--
ALTER TABLE `loainguoidung`
  ADD PRIMARY KEY (`id_loainguoidung`);

--
-- Chỉ mục cho bảng `loaisp`
--
ALTER TABLE `loaisp`
  ADD PRIMARY KEY (`id_loaisp`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`id_nhanvien`),
  ADD KEY `id_user` (`id_user`);

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
  ADD KEY `id_khuyenmai` (`id_khuyenmai`),
  ADD KEY `id_loaisp` (`id_loaisp`),
  ADD KEY `id_nhasanxuat` (`id_nhasanxuat`);

--
-- Chỉ mục cho bảng `slidershow`
--
ALTER TABLE `slidershow`
  ADD PRIMARY KEY (`id_slider`);

--
-- Chỉ mục cho bảng `tinhtrangdh`
--
ALTER TABLE `tinhtrangdh`
  ADD PRIMARY KEY (`id_tinhtrangdh`);

--
-- Chỉ mục cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  ADD PRIMARY KEY (`id_tintuc`);

--
-- Chỉ mục cho bảng `tuyendung`
--
ALTER TABLE `tuyendung`
  ADD PRIMARY KEY (`id_tuyendung`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_loainguoidung` (`id_loainguoidung`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `baohanhsp`
--
ALTER TABLE `baohanhsp`
  MODIFY `id_baohanhsp` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `id_binhluan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `chittietdonhang`
--
ALTER TABLE `chittietdonhang`
  MODIFY `id_chittietdonhang` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `id_donhang` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `hinhsanpham`
--
ALTER TABLE `hinhsanpham`
  MODIFY `id_hinhsanpham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `id_khachhang` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `khuyenmai`
--
ALTER TABLE `khuyenmai`
  MODIFY `id_khuyenmai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `loainguoidung`
--
ALTER TABLE `loainguoidung`
  MODIFY `id_loainguoidung` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `loaisp`
--
ALTER TABLE `loaisp`
  MODIFY `id_loaisp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `id_nhanvien` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `nhasanxuat`
--
ALTER TABLE `nhasanxuat`
  MODIFY `id_nhasanxuat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id_sanpham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `slidershow`
--
ALTER TABLE `slidershow`
  MODIFY `id_slider` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tinhtrangdh`
--
ALTER TABLE `tinhtrangdh`
  MODIFY `id_tinhtrangdh` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  MODIFY `id_tintuc` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tuyendung`
--
ALTER TABLE `tuyendung`
  MODIFY `id_tuyendung` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `baohanhsp`
--
ALTER TABLE `baohanhsp`
  ADD CONSTRAINT `baohanhsp_ibfk_1` FOREIGN KEY (`id_chittietdonhang`) REFERENCES `chittietdonhang` (`id_chittietdonhang`);

--
-- Các ràng buộc cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD CONSTRAINT `binhluan_ibfk_1` FOREIGN KEY (`id_sanpham`) REFERENCES `sanpham` (`id_sanpham`);

--
-- Các ràng buộc cho bảng `chittietdonhang`
--
ALTER TABLE `chittietdonhang`
  ADD CONSTRAINT `chittietdonhang_ibfk_1` FOREIGN KEY (`id_sanpham`) REFERENCES `sanpham` (`id_sanpham`),
  ADD CONSTRAINT `chittietdonhang_ibfk_2` FOREIGN KEY (`id_donhang`) REFERENCES `donhang` (`id_donhang`);

--
-- Các ràng buộc cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `donhang_ibfk_1` FOREIGN KEY (`id_khachhang`) REFERENCES `khachhang` (`id_khachhang`),
  ADD CONSTRAINT `donhang_ibfk_2` FOREIGN KEY (`id_tinhtrangdh`) REFERENCES `tinhtrangdh` (`id_tinhtrangdh`);

--
-- Các ràng buộc cho bảng `hinhsanpham`
--
ALTER TABLE `hinhsanpham`
  ADD CONSTRAINT `hinhsanpham_ibfk_1` FOREIGN KEY (`id_sanpham`) REFERENCES `sanpham` (`id_sanpham`);

--
-- Các ràng buộc cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD CONSTRAINT `khachhang_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Các ràng buộc cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD CONSTRAINT `nhanvien_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`id_khuyenmai`) REFERENCES `khuyenmai` (`id_khuyenmai`),
  ADD CONSTRAINT `sanpham_ibfk_2` FOREIGN KEY (`id_loaisp`) REFERENCES `loaisp` (`id_loaisp`),
  ADD CONSTRAINT `sanpham_ibfk_3` FOREIGN KEY (`id_nhasanxuat`) REFERENCES `nhasanxuat` (`id_nhasanxuat`);

--
-- Các ràng buộc cho bảng `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_loainguoidung`) REFERENCES `loainguoidung` (`id_loainguoidung`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
