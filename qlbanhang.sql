-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2022 at 12:59 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qlbanhang`
--

-- --------------------------------------------------------

--
-- Table structure for table `chitietsp`
--

CREATE TABLE `chitietsp` (
  `idchitiet` int(11) NOT NULL,
  `xuatxu` varchar(150) DEFAULT NULL,
  `doituongsudung` varchar(150) DEFAULT NULL,
  `hdsd` varchar(150) DEFAULT NULL,
  `mota` text DEFAULT NULL,
  `tinhtrang` varchar(50) DEFAULT NULL,
  `idsanpham` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chitietsp`
--

INSERT INTO `chitietsp` (`idchitiet`, `xuatxu`, `doituongsudung`, `hdsd`, `mota`, `tinhtrang`, `idsanpham`) VALUES
(1, 'Hoa Kì', 'Trẻ em bị còi xương, chậm lớn, gãy xương, hư hỏng răng.', 'Uống sau ăn. Để đạt kết quả tốt cần kết hợp với việc ăn uống đủ dưỡng chất, sinh hoạt điều độ, tập thể dục đều đặn và ngủ đủ giấc.', 'Bổ sung Nano Canxi và các dưỡng chất thiết yếu giúp hỗ trợ phát triển chiều cao và trí não cho thanh thiếu niên và trẻ đang phát triển.', 'Còn hàng', 1),
(2, 'Hoa Kỳ', 'Thanh thiếu niên và trẻ em từ 5 tuổi trở lên, đặc biệt là giai đoạn dậy thì. Trẻ bị còi xương, chậm lớn.', 'Uống Nubest Tall trước bữa ăn khoảng 30 phút. Nên sử dụng liên tục để đạt hiệu quả tối ưu. Để đạt kết quả tốt cần kết hợp với việc ăn uống đủ dưỡng ch', 'Bổ sung Nano canxi và các dưỡng chất hỗ trợ phát triển chiều cao và trí não cho trẻ và thanh, thiếu niên đang tuổi phát triển.\r\n\r\n', 'Còn hàng', 2),
(3, 'New Zealand', 'Người trên 20 tuổi', 'Uống 1 - 2 viên mỗi ngày dưới dạng thực phẩm bổ sung hoặc theo hướng dẫn của chuyên gia.', 'Viên uống Wheat Grass Deep Blue Health chiết xuất từ cỏ lúa mì rất giàu axit amin, enzym, vitamin, khoáng chất, chất diệp lục và chất xơ tốt cho cơ thể, giúp giải quyết vấn đề thiếu hụt dinh dưỡng cho cơ thể, hỗ trợ tăng cường năng lượng, nâng cao hệ miễn dịch và hệ tiêu hóa khỏe mạnh...', 'Còn hàng', 3),
(4, 'Hoa Kì', 'Người trên 18 tuổi', 'Liều dùng: Mỗi ngày 1 viên, dùng trong và sau bữa ăn. ', 'Viên uống tinh chất nghệ vàng Curcumin Puritan\'s Pride 500mg Mỹ là sản phẩm hỗ trợ sức khỏe được tinh chế từ củ nghệ vàng dưới dạng viên uống tiện dụng. Mỗi viên Tinh chất nghệ vàng Curcumin 500mg chứa tới 95% tinh chất Curcumin hỗ trợ tốt với những người có vấn đề liên quan tới dạ dày.', 'Còn hàng', 4),
(5, 'Hoa Kỳ', 'Trẻ em, người lớn', 'Đối với người lớn, uống 1 viên/ lần, 1-3 lần/ ngày cùng bữa ăn.\r\nTrẻ em từ 6 tuổi trở lên: 1 viên/ lần/ ngày cùng bữa ăn.', 'Men vi sinh Probiotic Acidophilus Puritan\'s Pride bổ sung hơn 100 triệu hoạt khuẩn Lactobacillus Acidophulus hỗ trợ cân bằng hệ vi sinh đường ruột. Sản phẩm thích hợp với trẻ em và người lớn gặp vấn đề về tiêu hóa, người đang dùng kháng sinh dài ngày, khó tiêu, trướng bụng...', 'Còn hàng', 5);

-- --------------------------------------------------------

--
-- Table structure for table `ctdonhang`
--

CREATE TABLE `ctdonhang` (
  `iddonhang` int(11) NOT NULL,
  `idsanpham` int(11) NOT NULL,
  `soluong` int(11) DEFAULT NULL,
  `thanhtien` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ctdonhang`
--

INSERT INTO `ctdonhang` (`iddonhang`, `idsanpham`, `soluong`, `thanhtien`) VALUES
(8, 3, 1, 300),
(9, 5, 1, 100),
(9, 6, 1, 200);

-- --------------------------------------------------------

--
-- Table structure for table `danhmucsp`
--

CREATE TABLE `danhmucsp` (
  `iddanhmuc` int(11) NOT NULL,
  `tendanhmuc` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `danhmucsp`
--

INSERT INTO `danhmucsp` (`iddanhmuc`, `tendanhmuc`) VALUES
(1, 'Bổ Sung Vitamin'),
(2, 'Bổ Sung Acid Béo'),
(3, 'Bổ Sung Lợi Khuẩn'),
(4, 'Bổ Sung Sắt'),
(5, 'Bổ Sung Chất Xơ'),
(6, 'Phát Triển Chiều Cao'),
(14, 'abc');

-- --------------------------------------------------------

--
-- Table structure for table `dondathang`
--

CREATE TABLE `dondathang` (
  `iddonhang` int(11) NOT NULL,
  `ngaydathang` date DEFAULT current_timestamp(),
  `diachi` varchar(150) DEFAULT NULL,
  `nguoinhan` varchar(150) DEFAULT NULL,
  `sdt` varchar(10) DEFAULT NULL,
  `ghichu` text DEFAULT NULL,
  `idtaikhoan` int(11) DEFAULT NULL,
  `tongtien` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dondathang`
--

INSERT INTO `dondathang` (`iddonhang`, `ngaydathang`, `diachi`, `nguoinhan`, `sdt`, `ghichu`, `idtaikhoan`, `tongtien`) VALUES
(1, '2022-07-20', 'An Giang', 'phantabnduy', '886514681', '', 14, NULL),
(2, '2022-07-20', 'An Giang', 'phantabnduy', '886514681', '', 14, NULL),
(3, '2022-07-20', 'An Giang', 'phantabnduy', '886514681', '', 14, NULL),
(4, '2022-07-20', 'An Giang', 'phantabnduy', '886514681', '', 14, NULL),
(5, '2022-07-20', 'An Giang', 'phantabnduy', '886514681', '', 14, NULL),
(6, '2022-07-20', 'An Giang', 'phantabnduy', '886514681', '', 14, 200),
(7, '2022-07-20', 'An Giang', 'phantabnduy', '886514681', '', 14, NULL),
(8, '2022-07-20', 'An Giang', 'phantabnduy', '886514681', '', 14, 300),
(9, '2022-07-20', 'An Giang', 'phantabnduy', '886514681', '', 14, 300);

-- --------------------------------------------------------

--
-- Table structure for table `loaitaikhoan`
--

CREATE TABLE `loaitaikhoan` (
  `idloaitk` int(11) NOT NULL,
  `tenloai` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loaitaikhoan`
--

INSERT INTO `loaitaikhoan` (`idloaitk`, `tenloai`) VALUES
(1, 'admin'),
(2, 'khách hàng');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `idsanpham` int(11) NOT NULL,
  `tensanpham` varchar(150) DEFAULT NULL,
  `gia` int(11) DEFAULT NULL,
  `hinhanh` varchar(100) DEFAULT NULL,
  `iddanhmuc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`idsanpham`, `tensanpham`, `gia`, `hinhanh`, `iddanhmuc`) VALUES
(1, 'DOCTOR PLUS - TPBVSK hỗ trợ phát triển chiều cao', 130, 'doctorplus-bottle-front-removebg-preview.png', 6),
(2, 'NUBEST TALL - TPBVSK hỗ trợ phát triển chiều cao', 130, 'nubesttall-bottle-01-removebg-preview.png', 6),
(3, 'Viên Uống Bổ Sung Chất Xơ Wheat Grass Deep Blue Health', 300, 'xo.png', 5),
(4, 'Tinh Chất Nghệ Vàng Curcumin Puritan Pride 500mg', 200, 'tinh-chat-nghe-vang-curcumin-puritan-s-pride-500mg-cua-my-6073b6279e7ce-1204202109532.png', 5),
(5, 'Men Vi Sinh Probiotic Acidophilus Puritan Pride 100 viên', 100, 'men-vi-sinh-uc-cho-nguoi-lon-life-space-probiotic-61c04c671c351-20122021162703.png', 3),
(6, 'Puritan’s Pride One Daily Women’s Multivitamin 100 viên', 200, 'thuoc-bo-cho-phu-nu-puritans-pride-one-daily-womens-multivitamin.png', 1),
(7, 'Vitamin dành cho phụ nữ Centrum Women 200 viên', 150, 'vitamin-danh-cho-phu-nu-centrum-women-200-vien-k-510x627-removebg-preview.png', 1),
(8, 'Vitamin Tổng Hợp Dành Cho Nam Vitaform Allmax Hộp 60 Viên', 50, 'vitamin-tong-hop-cho-nam-swisse-men-s-ultivite-50-61a59f3bbd528-30112021104915-removebg-preview.png', 1),
(9, 'OstroVit Omega 3 Ultra 90 viên', 100, '6.png', 2),
(10, 'Now Omega-3 (500 viên)', 50, 'FILE-GỐC-ẢNH-WEB-MỚI--removebg-preview.png', 2),
(11, 'Viên Uống Hỗ Trợ Bổ Sung Sắt DHC', 300, 'vien-uong-ho-tro-bo-sung-sat-dhc-nhat-ban-60-ngay-617f854b19745-01112021131227-removebg-preview.png', 4),
(12, 'Viên Uống Hỗ Trợ Bổ Sung Sắt Swisse Ultiboost Iron', 200, 'vien-uong-bo-sung-sat-swisse-ultiboost-iron-30-vien-5f0bda80e3283-13072020105232.png', 4),
(18, 'abc', 12, 'dhc-bifido-fast-active-bo-sung-loi-khuan-ho-tro-dieu-tri-roi-loan-tieu-hoa-dai-trang-1644803090.png', 14);

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
--

CREATE TABLE `taikhoan` (
  `idtaikhoan` int(11) NOT NULL,
  `hoten` varchar(150) DEFAULT NULL,
  `gioitinh` varchar(5) DEFAULT NULL,
  `diachi` text DEFAULT NULL,
  `sdt` char(10) DEFAULT NULL,
  `username` varchar(150) DEFAULT NULL,
  `pass` varchar(400) DEFAULT NULL,
  `idloaitk` int(11) DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`idtaikhoan`, `hoten`, `gioitinh`, `diachi`, `sdt`, `username`, `pass`, `idloaitk`) VALUES
(14, 'phantabnduy', 'Nam', 'An Giang', '886514681', 'duy123', '202cb962ac59075b964b07152d234b70', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chitietsp`
--
ALTER TABLE `chitietsp`
  ADD PRIMARY KEY (`idchitiet`),
  ADD UNIQUE KEY `idsanpham` (`idsanpham`);

--
-- Indexes for table `ctdonhang`
--
ALTER TABLE `ctdonhang`
  ADD PRIMARY KEY (`iddonhang`,`idsanpham`),
  ADD KEY `idsanpham` (`idsanpham`);

--
-- Indexes for table `danhmucsp`
--
ALTER TABLE `danhmucsp`
  ADD PRIMARY KEY (`iddanhmuc`);

--
-- Indexes for table `dondathang`
--
ALTER TABLE `dondathang`
  ADD PRIMARY KEY (`iddonhang`),
  ADD KEY `fk_idtaikhoan` (`idtaikhoan`);

--
-- Indexes for table `loaitaikhoan`
--
ALTER TABLE `loaitaikhoan`
  ADD PRIMARY KEY (`idloaitk`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`idsanpham`),
  ADD KEY `sanpham_ibfk_1` (`iddanhmuc`);

--
-- Indexes for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`idtaikhoan`),
  ADD KEY `idloaitk` (`idloaitk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chitietsp`
--
ALTER TABLE `chitietsp`
  MODIFY `idchitiet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `danhmucsp`
--
ALTER TABLE `danhmucsp`
  MODIFY `iddanhmuc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `dondathang`
--
ALTER TABLE `dondathang`
  MODIFY `iddonhang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `loaitaikhoan`
--
ALTER TABLE `loaitaikhoan`
  MODIFY `idloaitk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `idsanpham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `idtaikhoan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chitietsp`
--
ALTER TABLE `chitietsp`
  ADD CONSTRAINT `chitietsp_ibfk_1` FOREIGN KEY (`idsanpham`) REFERENCES `sanpham` (`idsanpham`);

--
-- Constraints for table `ctdonhang`
--
ALTER TABLE `ctdonhang`
  ADD CONSTRAINT `ctdonhang_ibfk_1` FOREIGN KEY (`iddonhang`) REFERENCES `dondathang` (`iddonhang`),
  ADD CONSTRAINT `ctdonhang_ibfk_2` FOREIGN KEY (`idsanpham`) REFERENCES `sanpham` (`idsanpham`);

--
-- Constraints for table `dondathang`
--
ALTER TABLE `dondathang`
  ADD CONSTRAINT `fk_idtaikhoan` FOREIGN KEY (`idtaikhoan`) REFERENCES `taikhoan` (`idtaikhoan`);

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`iddanhmuc`) REFERENCES `danhmucsp` (`iddanhmuc`);

--
-- Constraints for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD CONSTRAINT `taikhoan_ibfk_1` FOREIGN KEY (`idloaitk`) REFERENCES `loaitaikhoan` (`idloaitk`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
