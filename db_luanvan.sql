-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 20, 2021 at 02:54 PM
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
-- Database: `luanvan1`
--

-- --------------------------------------------------------

--
-- Table structure for table `baohanhsp`
--

CREATE TABLE `baohanhsp` (
  `id` int(11) NOT NULL,
  `baohanhsp_ngay_bao_hanh` date NOT NULL,
  `baohanhsp_noi_dung_bao_hanh` longtext NOT NULL,
  `baohanhsp_han_bao_hanh` int(1) NOT NULL,
  `baohanhsp_chi_phi_phat_sinh` int(11) NOT NULL,
  `id_chittietdonhang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `binhluan`
--

CREATE TABLE `binhluan` (
  `id` int(11) NOT NULL,
  `binhluan_ten` varchar(100) NOT NULL,
  `binhluan_email` varchar(100) NOT NULL,
  `binhluan_noi_dung` longtext NOT NULL,
  `binhluan_trang_thai` int(11) NOT NULL,
  `id_sanpham` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `chitietdonhang`
--

CREATE TABLE `chitietdonhang` (
  `id` int(11) NOT NULL,
  `chittietdonhang_so_luong` int(11) NOT NULL,
  `chittietdonhang_tong_tien` int(11) NOT NULL,
  `chitietdonhang_ngay_mua` date NOT NULL,
  `id_donhang` int(11) NOT NULL,
  `id_sanpham` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `donhang`
--

CREATE TABLE `donhang` (
  `id` int(11) NOT NULL,
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
-- Table structure for table `hinhsanpham`
--

CREATE TABLE `hinhsanpham` (
  `id` int(11) NOT NULL,
  `hinhsanpham_ten` varchar(100) NOT NULL,
  `id_sanpham` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hinhsanpham`
--

INSERT INTO `hinhsanpham` (`id`, `hinhsanpham_ten`, `id_sanpham`) VALUES
(3, 'iphon23.jpg', 3),
(4, 'iphone123.jpg', 3),
(89, 'C:\\Users\\duc le\\AppData\\Local\\Temp\\phpD90F.tmp', 21),
(90, 'C:\\Users\\duc le\\AppData\\Local\\Temp\\phpD910.tmp', 21),
(91, 'C:\\Users\\duc le\\AppData\\Local\\Temp\\phpD911.tmp', 21),
(92, 'C:\\Users\\duc le\\AppData\\Local\\Temp\\phpD912.tmp', 21),
(93, 'C:\\Users\\duc le\\AppData\\Local\\Temp\\phpD913.tmp', 21),
(94, 'C:\\Users\\duc le\\AppData\\Local\\Temp\\phpD914.tmp', 21),
(95, 'Capture.PNG', 20),
(96, 'Capture.PNG', 2);

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `id` int(11) NOT NULL,
  `khachhang_ten` varchar(100) NOT NULL,
  `khachhang_sdt` int(12) NOT NULL,
  `khachhang_dia_chi` varchar(200) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `khuyenmai`
--

CREATE TABLE `khuyenmai` (
  `id` int(11) NOT NULL,
  `khuyenmai_ten` varchar(100) NOT NULL,
  `khuyenmai_loai` varchar(100) NOT NULL,
  `khuyenmai_gia_tri` int(11) NOT NULL,
  `khuyenmai_ngay_bat_dau` date NOT NULL,
  `khuyenmai_ngay_ket_thuc` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `khuyenmai`
--

INSERT INTO `khuyenmai` (`id`, `khuyenmai_ten`, `khuyenmai_loai`, `khuyenmai_gia_tri`, `khuyenmai_ngay_bat_dau`, `khuyenmai_ngay_ket_thuc`) VALUES
(1, 'không khuyến mãi', 'không', 0, '2021-11-12', '2021-11-12');

-- --------------------------------------------------------

--
-- Table structure for table `loainguoidung`
--

CREATE TABLE `loainguoidung` (
  `id` int(11) NOT NULL,
  `loainguoidung_ten` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `loaisp`
--

CREATE TABLE `loaisp` (
  `id` int(11) NOT NULL,
  `loaisp_ten` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loaisp`
--

INSERT INTO `loaisp` (`id`, `loaisp_ten`) VALUES
(1, 'Điện thoại'),
(2, 'Laptop'),
(3, 'Máy tính bảng'),
(4, 'Tai nghe');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien`
--

CREATE TABLE `nhanvien` (
  `id` int(11) NOT NULL,
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
-- Table structure for table `nhasanxuat`
--

CREATE TABLE `nhasanxuat` (
  `id` int(11) NOT NULL,
  `nhasanxuat_ten` varchar(100) NOT NULL,
  `nhasanxuat_chi_tiet` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nhasanxuat`
--

INSERT INTO `nhasanxuat` (`id`, `nhasanxuat_ten`, `nhasanxuat_chi_tiet`) VALUES
(1, 'apple', 'rất đẹp');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `id` int(11) NOT NULL,
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
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`id`, `sanpham_ten`, `sanpham_thoi_gian_bao_hanh`, `sanpham_mo_ta`, `sanpham_hinhanh`, `sanpham_gia`, `sanpham_trang_thai`, `sanpham_luot_xem`, `sanpham_so_luong`, `sanpham_mau`, `sanpham_dung_luong`, `sanpham_noi_bat`, `id_nhasanxuat`, `id_khuyenmai`, `id_loaisp`) VALUES
(2, 'Iphone X', '36 tháng', 'Thiết kế mang tính đột phá\r\nNhư các bạn cũng đã biết thì đã 4 năm kể từ chiếc điện thoại iPhone 6 và iPhone 6 Plus thì Apple vẫn chưa có thay đổi nào đáng kể trong thiết kế của mình.\r\n\r\nThiết kế đột phá của điện thoại iPhone X\r\n\r\nNhưng với iPhone X thì đó lại là 1 câu chuyện hoàn toàn khác, máy chuyển qua sử dụng màn hình tỉ lệ 19.5:9 mới mẻ với phần diện tích hiển thị mặt trước cực lớn.\r\n\r\nThiết kế đột phá của điện thoại iPhone X\r\n\r\nMặt lưng kính hỗ trợ sạc nhanh không dây cũng như phần camera kép đặt dọc cũng là những thứ đầu tiên xuất hiện trên 1 chiếc iPhone.\r\n\r\nMàn hình với tai thỏ\r\nĐiểm khiến iPhone X bị chê nhiều nhất đó chính là phần \"tai thỏ\" phía trên màn hình, Apple đã chấp nhận điều này để đặt cụm camera TrueDepth mới của hãng.\r\n\r\nMàn hình tai thỏ của điện thoại iPhone X\r\n\r\nMàn hình kích thước 5.8 inch độ phân giải 1125 x 2436 pixels đem đến khả năng hiển thị xuất sắc.\r\n\r\nMàn hình tai thỏ của điện thoại iPhone X\r\n\r\niPhone X sử dụng tấm nền OLED (được tinh chỉnh bởi Apple) thay vì LCD như những chiếc iPhone trước đây và điều này đem lại cho máy 1 màu đen thể hiện rất sâu cùng khả năng tái tạo màu sắc không kém phần chính xác.\r\n\r\nXem thêm: Trải nghiệm giao diện iPhone X: Xem phim, chơi game có sướng?\r\n\r\nFace ID tạo nên đột phá\r\nTouch ID trên iPhone X đã bị loại bỏ, thay vào đó là bạn sẽ chuyển qua sử dụng Face ID, một phương thức bảo mật sinh trắc học mới của Apple.\r\n\r\nFace ID tạo nên đột phá trên điện thoại iPhone X\r\n\r\nVới sự trợ giúp của cụm camera TrueDept thì iPhone X có khả năng nhận diện khuôn mặt 3D của người dùng từ đó mở khóa chiếc iPhone một cách nhanh chóng.', 'Capture.PNG', 12000000, 1, 0, 100, 'đen nhám', '128GB', 0, 1, 1, 2),
(3, 'Iphone X', '36 tháng', 'đep', 'iphone_13-_pro-5_4_1.jpg', 12000000, 1, 0, 10, 'trắng', '256GB', 0, 1, 1, 1),
(20, 'Iphone X', '36thang', 'sadasdas', 'Capture.PNG', 12000, 1, 0, 10, 'hồng cánh sen', '32gb', 1, 1, 1, 1),
(21, 'Iphone X', '36thang', 'aaaa', 'C:\\Users\\duc le\\AppData\\Local\\Temp\\phpD90E.tmp', 12000, 1, 0, 10, 'hồng cánh sen', '32gb', 1, 1, 1, 1),
(23, 'Iphone X', '36thang', 'aaaa', 'Capture.PNG', 12000, 1, 0, 10, 'hồng cánh sen', '32gb', 1, 1, 1, 1),
(24, 'Iphone X', '36thang', 'aaaa', 'Capture.PNG', 12000, 1, 0, 10, 'hồng cánh sen', '32gb', 1, 1, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `slidershow`
--

CREATE TABLE `slidershow` (
  `id` int(11) NOT NULL,
  `slider_hinh_anh` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tinhtrangdh`
--

CREATE TABLE `tinhtrangdh` (
  `id` int(11) NOT NULL,
  `tinhtrangdh_ten` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tintuc`
--

CREATE TABLE `tintuc` (
  `id` int(11) NOT NULL,
  `tintuc_tieu_de` varchar(100) NOT NULL,
  `tintuc_hinh_anh` varchar(100) NOT NULL,
  `tintuc_noi_dung` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tuyendung`
--

CREATE TABLE `tuyendung` (
  `id` int(11) NOT NULL,
  `tuyendung_tieu_de` varchar(100) NOT NULL,
  `tuyendung_anh` varchar(100) NOT NULL,
  `tuyendung_mo_ta` longtext NOT NULL,
  `tuyendung_lien_he` int(11) NOT NULL,
  `tuyendung_thoi_gian` date NOT NULL,
  `tuyendung_tinh_trang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL,
  `time_code` date DEFAULT NULL,
  `users_trang_thai` int(2) DEFAULT NULL,
  `id_loainguoidung` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `code`, `updated_at`, `created_at`, `time_code`, `users_trang_thai`, `id_loainguoidung`) VALUES
(15, 'Son', 'quocson2521@gmail.com', '$2y$10$n9oSV6e0tWq7pq0Fk6qEOOqkJLrnHRRKerY5MVqmK/TX2jSZqGHIS', '$2y$10$sXaz95VE1RcK.O9.YMeCxuvhrz5qEvvnMgG69/xXPFt8jek/9NdBy', '2021-11-20', '2021-11-20', '2021-11-20', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `baohanhsp`
--
ALTER TABLE `baohanhsp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_chittietdonhang` (`id_chittietdonhang`);

--
-- Indexes for table `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_sanpham` (`id_sanpham`);

--
-- Indexes for table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_donhang` (`id_donhang`),
  ADD KEY `chittietdonhang_ibfk_1` (`id_sanpham`);

--
-- Indexes for table `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_khachhang` (`id_khachhang`),
  ADD KEY `id_tinhtrangdh` (`id_tinhtrangdh`);

--
-- Indexes for table `hinhsanpham`
--
ALTER TABLE `hinhsanpham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hinhsanpham_ibfk_1` (`id_sanpham`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `khuyenmai`
--
ALTER TABLE `khuyenmai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loainguoidung`
--
ALTER TABLE `loainguoidung`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loaisp`
--
ALTER TABLE `loaisp`
  ADD PRIMARY KEY (`id`);

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
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `nhasanxuat`
--
ALTER TABLE `nhasanxuat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_khuyenmai` (`id_khuyenmai`),
  ADD KEY `id_loaisp` (`id_loaisp`),
  ADD KEY `id_nhasanxuat` (`id_nhasanxuat`);

--
-- Indexes for table `slidershow`
--
ALTER TABLE `slidershow`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tinhtrangdh`
--
ALTER TABLE `tinhtrangdh`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tintuc`
--
ALTER TABLE `tintuc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tuyendung`
--
ALTER TABLE `tuyendung`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_loainguoidung` (`id_loainguoidung`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `baohanhsp`
--
ALTER TABLE `baohanhsp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `donhang`
--
ALTER TABLE `donhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hinhsanpham`
--
ALTER TABLE `hinhsanpham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `khuyenmai`
--
ALTER TABLE `khuyenmai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `loainguoidung`
--
ALTER TABLE `loainguoidung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loaisp`
--
ALTER TABLE `loaisp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nhasanxuat`
--
ALTER TABLE `nhasanxuat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `slidershow`
--
ALTER TABLE `slidershow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tinhtrangdh`
--
ALTER TABLE `tinhtrangdh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tintuc`
--
ALTER TABLE `tintuc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tuyendung`
--
ALTER TABLE `tuyendung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `baohanhsp`
--
ALTER TABLE `baohanhsp`
  ADD CONSTRAINT `baohanhsp_ibfk_1` FOREIGN KEY (`id_chittietdonhang`) REFERENCES `chitietdonhang` (`id`);

--
-- Constraints for table `binhluan`
--
ALTER TABLE `binhluan`
  ADD CONSTRAINT `binhluan_ibfk_1` FOREIGN KEY (`id_sanpham`) REFERENCES `sanpham` (`id`);

--
-- Constraints for table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD CONSTRAINT `chitietdonhang_ibfk_1` FOREIGN KEY (`id_sanpham`) REFERENCES `sanpham` (`id`),
  ADD CONSTRAINT `chitietdonhang_ibfk_2` FOREIGN KEY (`id_donhang`) REFERENCES `donhang` (`id`);

--
-- Constraints for table `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `donhang_ibfk_1` FOREIGN KEY (`id_khachhang`) REFERENCES `khachhang` (`id`),
  ADD CONSTRAINT `donhang_ibfk_2` FOREIGN KEY (`id_tinhtrangdh`) REFERENCES `tinhtrangdh` (`id`);

--
-- Constraints for table `hinhsanpham`
--
ALTER TABLE `hinhsanpham`
  ADD CONSTRAINT `hinhsanpham_ibfk_1` FOREIGN KEY (`id_sanpham`) REFERENCES `sanpham` (`id`);

--
-- Constraints for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD CONSTRAINT `khachhang_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD CONSTRAINT `nhanvien_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`id_khuyenmai`) REFERENCES `khuyenmai` (`id`),
  ADD CONSTRAINT `sanpham_ibfk_2` FOREIGN KEY (`id_loaisp`) REFERENCES `loaisp` (`id`),
  ADD CONSTRAINT `sanpham_ibfk_3` FOREIGN KEY (`id_nhasanxuat`) REFERENCES `nhasanxuat` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_loainguoidung`) REFERENCES `loainguoidung` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
