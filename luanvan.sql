-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 29, 2021 at 07:10 PM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `luanvan`
--

-- --------------------------------------------------------

--
-- Table structure for table `bophan`
--

CREATE TABLE `bophan` (
  `id_bophan` int(10) NOT NULL,
  `bophan_ten` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bophan`
--

INSERT INTO `bophan` (`id_bophan`, `bophan_ten`) VALUES
(1, 'Quản lý'),
(2, 'Kỹ thuật'),
(3, 'Tư vấn'),
(4, 'Thu ngân'),
(5, 'Kho');

-- --------------------------------------------------------

--
-- Table structure for table `chitietdonhang`
--

CREATE TABLE `chitietdonhang` (
  `id_thuoctinh` int(10) NOT NULL,
  `id_donhang` int(10) NOT NULL,
  `gia` int(11) NOT NULL,
  `soluong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chitietdonhang`
--

INSERT INTO `chitietdonhang` (`id_thuoctinh`, `id_donhang`, `gia`, `soluong`) VALUES
(1, 2, 14600000, 3),
(3, 1, 1000000, 2);

-- --------------------------------------------------------

--
-- Table structure for table `chitietthuoctinh`
--

CREATE TABLE `chitietthuoctinh` (
  `id_thuoctinh` int(10) NOT NULL,
  `id_sanpham` int(10) NOT NULL,
  `thuoctinh_mo_ta` varchar(255) CHARACTER SET utf8 NOT NULL,
  `thuoctinh_gia` int(11) NOT NULL,
  `thuoctinh_trang_thai` int(11) NOT NULL,
  `thuoctinh_luot_xem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chitietthuoctinh`
--

INSERT INTO `chitietthuoctinh` (`id_thuoctinh`, `id_sanpham`, `thuoctinh_mo_ta`, `thuoctinh_gia`, `thuoctinh_trang_thai`, `thuoctinh_luot_xem`) VALUES
(1, 6, 'Điện thoại iPhone 13 Pro Max 512GB với bộ nhớ lưu trữ ấn tượng cùng dung lượng pin cao góp phần mang đến những trải nghiệm vượt trội cho người dùng. ', 36900000, 1, 1),
(2, 6, 'Điện thoại iPhone 13 Pro Max 512GB với bộ nhớ lưu trữ ấn tượng cùng dung lượng pin cao góp phần mang đến những trải nghiệm vượt trội cho người dùng. ', 42490000, 0, 1),
(3, 7, 'Laptop Asus Rog Zephyrus Duo 15 S45E GX551QR - HB120T độc đáo với 2 màn hình\r\n\r\n\r\n', 80990000, 1, 1),
(4, 8, 'Samsung Galaxy Tab S7+ : Màn hình rộng sắc nét, pin khủng 10.090mAh\r\n\r\n\r\n', 21000000, 1, 1),
(5, 9, 'Đồng hồ Xiaomi Mi Watch Lite - sang trọng, độc đáo, tính năng vượt trội\r\n', 1190000, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `danhgia`
--

CREATE TABLE `danhgia` (
  `id_danhgia` int(10) NOT NULL,
  `id_sanpham` int(10) NOT NULL,
  `danhgia_binh_luan` varchar(255) NOT NULL,
  `danhgia_ngay` date NOT NULL,
  `danhgia_hinh_anh` varchar(255) DEFAULT NULL,
  `danhgia_sao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `danhgia`
--

INSERT INTO `danhgia` (`id_danhgia`, `id_sanpham`, `danhgia_binh_luan`, `danhgia_ngay`, `danhgia_hinh_anh`, `danhgia_sao`) VALUES
(1, 7, 'Lap top xin', '2021-10-14', '', 5),
(2, 6, 'Dien thoai ngon', '2021-10-21', '', 4);

-- --------------------------------------------------------

--
-- Table structure for table `donhang`
--

CREATE TABLE `donhang` (
  `id_donhang` int(10) NOT NULL,
  `donhang_ngay_giao` date NOT NULL,
  `donhang_ngay_dat` date NOT NULL,
  `donhang_sdt_nguoi_nhan` int(11) NOT NULL,
  `donhang_dia_chi_nguoi_nhan` varchar(255) NOT NULL,
  `donhang_ten_nguoi_nhan` varchar(255) NOT NULL,
  `donhang_trang_thai` int(11) NOT NULL,
  `tong_tien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donhang`
--

INSERT INTO `donhang` (`id_donhang`, `donhang_ngay_giao`, `donhang_ngay_dat`, `donhang_sdt_nguoi_nhan`, `donhang_dia_chi_nguoi_nhan`, `donhang_ten_nguoi_nhan`, `donhang_trang_thai`, `tong_tien`) VALUES
(1, '2021-10-01', '2021-10-15', 974429917, '72 Pham Thi Tanh', 'Quoc Son', 1, 1000000),
(2, '2021-10-12', '2021-10-14', 95818841, '180 Cao Lo', 'Tran Van A', 1, 13500000);

-- --------------------------------------------------------

--
-- Table structure for table `khuyenmai`
--

CREATE TABLE `khuyenmai` (
  `id_khuyenmai` int(10) NOT NULL,
  `khuyenmai_ten` varchar(50) CHARACTER SET utf8 NOT NULL,
  `khuyenmai_loai` varchar(50) CHARACTER SET utf8 NOT NULL,
  `khuyenmai_gia_tri` int(11) NOT NULL,
  `khuyenmai_ngay_bat_dau` date NOT NULL,
  `khuyenmai_ngay_ket_thuc` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `khuyenmai`
--

INSERT INTO `khuyenmai` (`id_khuyenmai`, `khuyenmai_ten`, `khuyenmai_loai`, `khuyenmai_gia_tri`, `khuyenmai_ngay_bat_dau`, `khuyenmai_ngay_ket_thuc`) VALUES
(1, 'KHUYENMAI1', 'GIAM200', 200000, '2021-10-01', '2022-01-01'),
(2, 'KHUYENMAI2', 'GIAM300', 300000, '2021-10-08', '2021-12-10');

-- --------------------------------------------------------

--
-- Table structure for table `loaisanpham`
--

CREATE TABLE `loaisanpham` (
  `id_loai` int(10) NOT NULL,
  `loai_ten` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loaisanpham`
--

INSERT INTO `loaisanpham` (`id_loai`, `loai_ten`) VALUES
(1, 'Điện thoại'),
(2, 'Máy tính bảng'),
(3, 'Laptop'),
(4, 'Âm thanh'),
(5, 'Đồng hồ thông minh');

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien`
--

CREATE TABLE `nhanvien` (
  `id_nhanvien` int(10) NOT NULL,
  `id_bophan` int(10) NOT NULL,
  `nhanvien_ten` varchar(255) NOT NULL,
  `nhanvien_sdt` int(50) NOT NULL,
  `nhanvien_gioi_tinh` varchar(50) NOT NULL,
  `nhanvien_dia_chi` varchar(50) NOT NULL,
  `nhanvien_email` varchar(50) NOT NULL,
  `nhanvien_mat_khau` varchar(50) NOT NULL,
  `nhanvien_trang_thai` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nhanvien`
--

INSERT INTO `nhanvien` (`id_nhanvien`, `id_bophan`, `nhanvien_ten`, `nhanvien_sdt`, `nhanvien_gioi_tinh`, `nhanvien_dia_chi`, `nhanvien_email`, `nhanvien_mat_khau`, `nhanvien_trang_thai`) VALUES
(3, 1, 'Tran Quoc Son', 915133, '1', '180 Cao Lo', 'quocson2521@gmail.com', '202cb962ac59075b964b07152d234b70', 1),
(4, 3, 'Van', 9351355, '2', '180 Cao Lo', 'test@gmail.com', '202cb962ac59075b964b07152d234b70', 0);

-- --------------------------------------------------------

--
-- Table structure for table `nhasanxuat`
--

CREATE TABLE `nhasanxuat` (
  `id_nhasanxuat` int(10) NOT NULL,
  `nhasanxuat_ten` varchar(255) CHARACTER SET utf8 NOT NULL,
  `nhasanxuat_chi_tiet` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nhasanxuat`
--

INSERT INTO `nhasanxuat` (`id_nhasanxuat`, `nhasanxuat_ten`, `nhasanxuat_chi_tiet`) VALUES
(1, 'Asus', ''),
(2, 'Sony', ''),
(3, 'Samsum', ''),
(4, 'Apple', ''),
(5, 'Xiaomi', '');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `id_sanpham` int(10) NOT NULL,
  `id_loai` int(10) NOT NULL,
  `id_nhasanxuat` int(10) NOT NULL,
  `id_khuyenmai` int(10) NOT NULL,
  `sanpham_ten` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`id_sanpham`, `id_loai`, `id_nhasanxuat`, `id_khuyenmai`, `sanpham_ten`) VALUES
(6, 1, 4, 1, 'iPhone 13 Pro Max 256GB'),
(7, 3, 1, 2, 'Laptop ASUS Zephyrus Duo 15 SE GX551QR-HB120T'),
(8, 2, 3, 1, 'Samsung Galaxy Tab S7 Plus'),
(9, 5, 5, 2, 'Xiaomi Mi Watch Lite'),
(10, 4, 2, 1, 'Sony WF-1000XM3');

-- --------------------------------------------------------

--
-- Table structure for table `slider_show`
--

CREATE TABLE `slider_show` (
  `id_slider` int(10) NOT NULL,
  `slider_hinh_anh` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `thuoctinhsanpham`
--

CREATE TABLE `thuoctinhsanpham` (
  `id_thuoctinh` int(10) NOT NULL,
  `thuoctinh_mau` varchar(50) CHARACTER SET utf8 NOT NULL,
  `thuoctinh_dung_luong` varchar(50) CHARACTER SET utf8 NOT NULL,
  `thuoctinh_so_luong` int(10) NOT NULL,
  `thuoctinh_hinh_anh` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `thuoctinhsanpham`
--

INSERT INTO `thuoctinhsanpham` (`id_thuoctinh`, `thuoctinh_mau`, `thuoctinh_dung_luong`, `thuoctinh_so_luong`, `thuoctinh_hinh_anh`) VALUES
(1, 'Bạc', '256GB', 10, 'iphone_13-_pro-5_4_1.jpg'),
(2, 'Vàng', '512GB', 10, 'iphone_13-_pro-2_2_1.jpg'),
(3, 'Đen', '8 RAM/32GB ROM', 10, 'laptop-asus-rog-zephyrus-duo-15-se-gx551qr-hb120t-1-ksp.jpg'),
(4, 'Vàng Đồng', '128G ROM', 10, 'samsung-galaxy-tab-s7-plus-3.jpg'),
(5, 'Đen', '0', 10, 'mi-watch-lite_1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tintuc`
--

CREATE TABLE `tintuc` (
  `id_tintuc` int(10) NOT NULL,
  `tintuc_tieu_de` varchar(255) NOT NULL,
  `tintuc_hinh_anh` varchar(255) NOT NULL,
  `tintuc_noi_dung` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bophan`
--
ALTER TABLE `bophan`
  ADD PRIMARY KEY (`id_bophan`);

--
-- Indexes for table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD PRIMARY KEY (`id_thuoctinh`,`id_donhang`),
  ADD KEY `id_donhang` (`id_donhang`);

--
-- Indexes for table `chitietthuoctinh`
--
ALTER TABLE `chitietthuoctinh`
  ADD PRIMARY KEY (`id_thuoctinh`,`id_sanpham`),
  ADD KEY `id_sanpham` (`id_sanpham`);

--
-- Indexes for table `danhgia`
--
ALTER TABLE `danhgia`
  ADD PRIMARY KEY (`id_danhgia`),
  ADD KEY `id_sanpham` (`id_sanpham`);

--
-- Indexes for table `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`id_donhang`);

--
-- Indexes for table `khuyenmai`
--
ALTER TABLE `khuyenmai`
  ADD PRIMARY KEY (`id_khuyenmai`);

--
-- Indexes for table `loaisanpham`
--
ALTER TABLE `loaisanpham`
  ADD PRIMARY KEY (`id_loai`);

--
-- Indexes for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`id_nhanvien`),
  ADD KEY `id_bophan` (`id_bophan`);

--
-- Indexes for table `nhasanxuat`
--
ALTER TABLE `nhasanxuat`
  ADD PRIMARY KEY (`id_nhasanxuat`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id_sanpham`),
  ADD KEY `id_loai` (`id_loai`),
  ADD KEY `id_nhasanxuat` (`id_nhasanxuat`),
  ADD KEY `id_khuyenmai` (`id_khuyenmai`);

--
-- Indexes for table `slider_show`
--
ALTER TABLE `slider_show`
  ADD PRIMARY KEY (`id_slider`);

--
-- Indexes for table `thuoctinhsanpham`
--
ALTER TABLE `thuoctinhsanpham`
  ADD PRIMARY KEY (`id_thuoctinh`);

--
-- Indexes for table `tintuc`
--
ALTER TABLE `tintuc`
  ADD PRIMARY KEY (`id_tintuc`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bophan`
--
ALTER TABLE `bophan`
  MODIFY `id_bophan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `danhgia`
--
ALTER TABLE `danhgia`
  MODIFY `id_danhgia` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `donhang`
--
ALTER TABLE `donhang`
  MODIFY `id_donhang` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `khuyenmai`
--
ALTER TABLE `khuyenmai`
  MODIFY `id_khuyenmai` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `loaisanpham`
--
ALTER TABLE `loaisanpham`
  MODIFY `id_loai` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `id_nhanvien` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `nhasanxuat`
--
ALTER TABLE `nhasanxuat`
  MODIFY `id_nhasanxuat` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id_sanpham` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `slider_show`
--
ALTER TABLE `slider_show`
  MODIFY `id_slider` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `thuoctinhsanpham`
--
ALTER TABLE `thuoctinhsanpham`
  MODIFY `id_thuoctinh` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tintuc`
--
ALTER TABLE `tintuc`
  MODIFY `id_tintuc` int(10) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD CONSTRAINT `chitietdonhang_ibfk_1` FOREIGN KEY (`id_donhang`) REFERENCES `donhang` (`id_donhang`),
  ADD CONSTRAINT `chitietdonhang_ibfk_2` FOREIGN KEY (`id_thuoctinh`) REFERENCES `chitietthuoctinh` (`id_thuoctinh`);

--
-- Constraints for table `chitietthuoctinh`
--
ALTER TABLE `chitietthuoctinh`
  ADD CONSTRAINT `chitietthuoctinh_ibfk_1` FOREIGN KEY (`id_sanpham`) REFERENCES `sanpham` (`id_sanpham`),
  ADD CONSTRAINT `chitietthuoctinh_ibfk_2` FOREIGN KEY (`id_thuoctinh`) REFERENCES `thuoctinhsanpham` (`id_thuoctinh`);

--
-- Constraints for table `danhgia`
--
ALTER TABLE `danhgia`
  ADD CONSTRAINT `danhgia_ibfk_1` FOREIGN KEY (`id_sanpham`) REFERENCES `sanpham` (`id_sanpham`);

--
-- Constraints for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD CONSTRAINT `nhanvien_ibfk_1` FOREIGN KEY (`id_bophan`) REFERENCES `bophan` (`id_bophan`);

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`id_loai`) REFERENCES `loaisanpham` (`id_loai`),
  ADD CONSTRAINT `sanpham_ibfk_2` FOREIGN KEY (`id_nhasanxuat`) REFERENCES `nhasanxuat` (`id_nhasanxuat`),
  ADD CONSTRAINT `sanpham_ibfk_3` FOREIGN KEY (`id_khuyenmai`) REFERENCES `khuyenmai` (`id_khuyenmai`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
