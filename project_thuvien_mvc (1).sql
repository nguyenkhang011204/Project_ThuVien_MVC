-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2026 at 09:43 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_thuvien_mvc`
--

-- --------------------------------------------------------

--
-- Table structure for table `chitietphieumuon`
--

CREATE TABLE `chitietphieumuon` (
  `MaPM` varchar(10) NOT NULL,
  `MaSach` varchar(10) NOT NULL,
  `SoLuong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chitietphieunhap`
--

CREATE TABLE `chitietphieunhap` (
  `MaCT` varchar(10) NOT NULL,
  `MaPN` varchar(10) DEFAULT NULL,
  `MaSach` varchar(10) DEFAULT NULL,
  `SoLuong` int(11) NOT NULL,
  `DonGia` decimal(12,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `docgia`
--

CREATE TABLE `docgia` (
  `MaDG` varchar(10) NOT NULL,
  `MaND` varchar(10) DEFAULT NULL,
  `HoTen` varchar(100) NOT NULL,
  `NgaySinh` date DEFAULT NULL,
  `GioiTinh` enum('Nam','Nu') DEFAULT NULL,
  `SDT` varchar(15) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `DiaChi` varchar(255) DEFAULT NULL,
  `NgayDangKy` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `docgia`
--

INSERT INTO `docgia` (`MaDG`, `MaND`, `HoTen`, `NgaySinh`, `GioiTinh`, `SDT`, `Email`, `DiaChi`, `NgayDangKy`) VALUES
('DG001', 'ND004', 'Nguyễn Văn An', '2002-03-15', 'Nam', '0912345678', 'an@gmail.com', 'Quận 1, TP.HCM', '2025-01-10'),
('DG002', 'ND005', 'Trần Thị Bình', '2001-08-22', 'Nu', '0912345679', 'binh@gmail.com', 'Thủ Đức, TP.HCM', '2025-01-15'),
('DG003', 'ND006', 'Lê Minh Châu', '2003-12-10', 'Nam', '0912345680', 'chau@gmail.com', 'Biên Hòa, Đồng Nai', '2025-02-01'),
('DG004', 'ND007', 'Phạm Ngọc Dung', '2002-07-08', 'Nu', '0912345681', 'dung@gmail.com', 'Dĩ An, Bình Dương', '2025-02-15'),
('DG005', 'ND008', 'Hoàng Gia Huy', '2004-11-19', 'Nam', '0912345682', 'huy@gmail.com', 'Nha Trang, Khánh Hòa', '2025-03-01'),
('DG006', 'ND009', 'Võ Thị Lan', '2001-01-12', 'Nu', '0912345683', 'lan@gmail.com', 'Đà Nẵng', '2025-03-10'),
('DG007', 'ND010', 'Nguyễn Thành Nam', '2000-09-05', 'Nam', '0912345684', 'nam@gmail.com', 'Huế', '2025-04-01'),
('DG008', 'ND011', 'Đặng Thu Trang', '2003-05-27', 'Nu', '0912345685', 'trang@gmail.com', 'Cần Thơ', '2025-04-15');

-- --------------------------------------------------------

--
-- Table structure for table `nguoidung`
--

CREATE TABLE `nguoidung` (
  `MaND` varchar(10) NOT NULL,
  `TenDangNhap` varchar(50) NOT NULL,
  `MatKhau` varchar(255) NOT NULL,
  `VaiTro` enum('ADMIN','THUTHU','DOCGIA') NOT NULL,
  `TrangThai` tinyint(1) DEFAULT 1,
  `NgayTao` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nguoidung`
--

INSERT INTO `nguoidung` (`MaND`, `TenDangNhap`, `MatKhau`, `VaiTro`, `TrangThai`, `NgayTao`) VALUES
('ND001', 'admin', '123456', 'ADMIN', 1, '2026-07-14 13:31:26'),
('ND002', 'thuthu01', '123456', 'THUTHU', 1, '2026-07-14 13:31:26'),
('ND003', 'thuthu02', '123456', 'THUTHU', 1, '2026-07-14 13:31:26'),
('ND004', 'docgia01', '123456', 'DOCGIA', 1, '2026-07-14 13:31:26'),
('ND005', 'docgia02', '123456', 'DOCGIA', 1, '2026-07-14 13:31:26'),
('ND006', 'docgia03', '123456', 'DOCGIA', 1, '2026-07-14 13:31:26'),
('ND007', 'docgia04', '123456', 'DOCGIA', 1, '2026-07-14 13:31:26'),
('ND008', 'docgia05', '123456', 'DOCGIA', 1, '2026-07-14 13:31:26'),
('ND009', 'docgia06', '123456', 'DOCGIA', 1, '2026-07-14 13:31:26'),
('ND010', 'docgia07', '123456', 'DOCGIA', 1, '2026-07-14 13:31:26'),
('ND011', 'docgia08', '123456', 'DOCGIA', 1, '2026-07-14 13:31:26');

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien`
--

CREATE TABLE `nhanvien` (
  `MaNV` varchar(10) NOT NULL,
  `MaND` varchar(10) DEFAULT NULL,
  `HoTen` varchar(100) NOT NULL,
  `NgaySinh` date DEFAULT NULL,
  `GioiTinh` enum('Nam','Nu') DEFAULT NULL,
  `SDT` varchar(15) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `DiaChi` varchar(255) DEFAULT NULL,
  `ChucVu` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nhanvien`
--

INSERT INTO `nhanvien` (`MaNV`, `MaND`, `HoTen`, `NgaySinh`, `GioiTinh`, `SDT`, `Email`, `DiaChi`, `ChucVu`) VALUES
('NV001', 'ND001', 'Nguyễn Văn Quản', '1985-10-15', 'Nam', '0901111111', 'admin@library.com', 'TP.HCM', 'Quản trị viên'),
('NV002', 'ND002', 'Lê Thị Thu', '1993-05-12', 'Nu', '0902222222', 'thuthu01@library.com', 'TP.HCM', 'Thủ thư'),
('NV003', 'ND003', 'Trần Minh Đức', '1990-09-25', 'Nam', '0903333333', 'thuthu02@library.com', 'Bình Dương', 'Thủ thư');

-- --------------------------------------------------------

--
-- Table structure for table `nhaxuatban`
--

CREATE TABLE `nhaxuatban` (
  `MaNXB` varchar(10) NOT NULL,
  `TenNXB` varchar(150) NOT NULL,
  `DiaChi` varchar(255) DEFAULT NULL,
  `SDT` varchar(15) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nhaxuatban`
--

INSERT INTO `nhaxuatban` (`MaNXB`, `TenNXB`, `DiaChi`, `SDT`, `Email`) VALUES
('NXB001', 'Nhà Xuất Bản Trẻ', '161B Lý Chính Thắng, Quận 3, TP. Hồ Chí Minh', '02839316289', 'contact@nxbtre.com.vn'),
('NXB002', 'Nhà Xuất Bản Kim Đồng', '55 Quang Trung, Quận Hai Bà Trưng, Hà Nội', '02439434730', 'info@nxbkimdong.com.vn'),
('NXB003', 'Nhà Xuất Bản Giáo Dục Việt Nam', '81 Trần Hưng Đạo, Quận Hoàn Kiếm, Hà Nội', '02438222086', 'contact@nxbgd.vn'),
('NXB004', 'Nhà Xuất Bản Lao Động', '175 Giảng Võ, Quận Đống Đa, Hà Nội', '02438515380', 'info@nxblaodong.vn'),
('NXB005', 'Nhà Xuất Bản Tổng Hợp TP. Hồ Chí Minh', '62 Nguyễn Thị Minh Khai, Quận 1, TP. Hồ Chí Minh', '02838296764', 'contact@nxbth.com.vn'),
('NXB006', 'Nhà Xuất Bản Văn Học', '18 Nguyễn Trường Tộ, Quận Ba Đình, Hà Nội', '02438438215', 'info@nxbvanhoc.vn'),
('NXB007', 'Nhà Xuất Bản Thanh Niên', '64 Bà Triệu, Quận Hoàn Kiếm, Hà Nội', '02439437563', 'contact@nxbthanhnien.vn'),
('NXB008', 'Nhà Xuất Bản Thế Giới', '46 Trần Hưng Đạo, Quận Hoàn Kiếm, Hà Nội', '02438253841', 'info@nxbthegioi.vn'),
('NXB009', 'Nhà Xuất Bản Đại Học Quốc Gia TP. Hồ Chí Minh', 'Khu phố 6, Phường Linh Trung, TP. Thủ Đức, TP. Hồ Chí Minh', '02837244270', 'contact@vnuhcmpress.edu.vn'),
('NXB010', 'Nhà Xuất Bản Hồng Đức', '65 Tràng Thi, Quận Hoàn Kiếm, Hà Nội', '02439260024', 'info@nxbhongduc.vn');

-- --------------------------------------------------------

--
-- Table structure for table `phieumuon`
--

CREATE TABLE `phieumuon` (
  `MaPM` varchar(10) NOT NULL,
  `MaDG` varchar(10) NOT NULL,
  `MaNV` varchar(10) NOT NULL,
  `NgayMuon` date NOT NULL,
  `HanTra` date NOT NULL,
  `NgayTra` date DEFAULT NULL,
  `TinhTrang` enum('Đang mượn','Đang trả','Quá hạn') NOT NULL DEFAULT 'Đang mượn'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `phieunhap`
--

CREATE TABLE `phieunhap` (
  `MaPN` varchar(10) NOT NULL,
  `MaNV` varchar(10) NOT NULL,
  `NgayNhap` date NOT NULL,
  `GhiChu` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `phieuphat`
--

CREATE TABLE `phieuphat` (
  `MaPP` varchar(10) NOT NULL,
  `MaPM` varchar(10) NOT NULL,
  `NgayLap` date NOT NULL,
  `LyDo` varchar(255) NOT NULL,
  `SoTien` decimal(12,2) NOT NULL,
  `DaThanhToan` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sach`
--

CREATE TABLE `sach` (
  `MaSach` varchar(10) NOT NULL,
  `MaTL` varchar(10) DEFAULT NULL,
  `MaNXB` varchar(10) DEFAULT NULL,
  `MaVT` varchar(10) DEFAULT NULL,
  `TenSach` varchar(255) NOT NULL,
  `NamXuatBan` int(11) DEFAULT NULL,
  `Gia` decimal(12,2) DEFAULT NULL,
  `SoLuong` int(11) NOT NULL DEFAULT 0,
  `SoLuongCon` int(11) NOT NULL DEFAULT 0,
  `NgonNgu` varchar(50) DEFAULT NULL,
  `MoTa` text DEFAULT NULL,
  `HinhAnh` varchar(255) DEFAULT NULL,
  `TinhTrang` enum('Còn','Hết','Ngừng phát hành') NOT NULL DEFAULT 'Còn',
  `NgayTao` datetime NOT NULL,
  `NgayCapNhat` datetime NOT NULL,
  `ISBN` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sach`
--

INSERT INTO `sach` (`MaSach`, `MaTL`, `MaNXB`, `MaVT`, `TenSach`, `NamXuatBan`, `Gia`, `SoLuong`, `SoLuongCon`, `NgonNgu`, `MoTa`, `HinhAnh`, `TinhTrang`, `NgayTao`, `NgayCapNhat`, `ISBN`) VALUES
('S001', 'TL001', 'NXB001', 'VT001', 'Lập trình C căn bản', 2022, 85000.00, 15, 15, 'Tiếng Việt', 'Sách dành cho người mới học lập trình C', 'laptrinh_c.jpg', 'Còn', '2026-07-14 13:23:08', '2026-07-14 13:23:08', '9786041000001'),
('S002', 'TL001', 'NXB002', 'VT001', 'Lập trình C nâng cao', 2023, 120000.00, 12, 12, 'Tiếng Việt', 'Kiến thức nâng cao về ngôn ngữ C', 'laptrinh_cnangcao.jpg', 'Còn', '2026-07-14 13:23:08', '2026-07-14 13:23:08', '9786041000002'),
('S003', 'TL001', 'NXB003', 'VT002', 'Java Programming', 2021, 180000.00, 10, 10, 'Tiếng Anh', 'Lập trình Java từ cơ bản đến nâng cao', 'java.jpg', 'Còn', '2026-07-14 13:23:08', '2026-07-14 13:23:08', '9786041000003'),
('S004', 'TL001', 'NXB004', 'VT002', 'Python cho người mới bắt đầu', 2024, 165000.00, 18, 18, 'Tiếng Việt', 'Hướng dẫn học Python', 'python.jpg', 'Còn', '2026-07-14 13:23:08', '2026-07-14 13:23:08', '9786041000004'),
('S005', 'TL002', 'NXB005', 'VT003', 'Đắc Nhân Tâm', 2019, 95000.00, 20, 20, 'Tiếng Việt', 'Tác phẩm nổi tiếng của Dale Carnegie', 'dacnhantam.jpg', 'Còn', '2026-07-14 13:23:08', '2026-07-14 13:23:08', '9786041000005'),
('S006', 'TL002', 'NXB006', 'VT003', 'Nhà Giả Kim', 2020, 99000.00, 16, 16, 'Tiếng Việt', 'Tiểu thuyết của Paulo Coelho', 'nhagiakim.jpg', 'Còn', '2026-07-14 13:23:08', '2026-07-14 13:23:08', '9786041000006'),
('S007', 'TL003', 'NXB001', 'VT004', 'Toán cao cấp A1', 2021, 135000.00, 14, 14, 'Tiếng Việt', 'Giáo trình Toán cao cấp', 'toancaocap.jpg', 'Còn', '2026-07-14 13:23:08', '2026-07-14 13:23:08', '9786041000007'),
('S008', 'TL003', 'NXB002', 'VT004', 'Giải tích 1', 2020, 125000.00, 12, 12, 'Tiếng Việt', 'Giáo trình Giải tích', 'giai_tich.jpg', 'Còn', '2026-07-14 13:23:08', '2026-07-14 13:23:08', '9786041000008'),
('S009', 'TL004', 'NXB003', 'VT005', 'Vật lý đại cương', 2022, 145000.00, 10, 10, 'Tiếng Việt', 'Kiến thức cơ bản về vật lý', 'vatly.jpg', 'Còn', '2026-07-14 13:23:08', '2026-07-14 13:23:08', '9786041000009'),
('S010', 'TL005', 'NXB004', 'VT006', 'Hóa học đại cương', 2023, 155000.00, 11, 11, 'Tiếng Việt', 'Giáo trình Hóa học', 'hoahoc.jpg', 'Còn', '2026-07-14 13:23:08', '2026-07-14 13:23:08', '9786041000010'),
('S011', 'TL006', 'NXB005', 'VT007', 'Tiếng Anh giao tiếp', 2022, 130000.00, 17, 17, 'Tiếng Việt', 'Học giao tiếp tiếng Anh', 'tienganh.jpg', 'Còn', '2026-07-14 13:23:08', '2026-07-14 13:23:08', '9786041000011'),
('S012', 'TL007', 'NXB006', 'VT008', 'Marketing căn bản', 2021, 170000.00, 9, 9, 'Tiếng Việt', 'Kiến thức Marketing', 'marketing.jpg', 'Còn', '2026-07-14 13:23:08', '2026-07-14 13:23:08', '9786041000012'),
('S013', 'TL008', 'NXB007', 'VT009', 'Quản trị doanh nghiệp', 2020, 185000.00, 8, 8, 'Tiếng Việt', 'Quản trị doanh nghiệp hiện đại', 'quantri.jpg', 'Còn', '2026-07-14 13:23:08', '2026-07-14 13:23:08', '9786041000013'),
('S014', 'TL009', 'NXB008', 'VT010', 'Lịch sử Việt Nam', 2018, 110000.00, 15, 15, 'Tiếng Việt', 'Lịch sử Việt Nam qua các thời kỳ', 'lichsu.jpg', 'Còn', '2026-07-14 13:23:08', '2026-07-14 13:23:08', '9786041000014'),
('S015', 'TL010', 'NXB009', 'VT011', 'Địa lý Việt Nam', 2020, 120000.00, 13, 13, 'Tiếng Việt', 'Sách Địa lý Việt Nam', 'dialy.jpg', 'Còn', '2026-07-14 13:23:08', '2026-07-14 13:23:08', '9786041000015'),
('S016', 'TL010', 'NXB010', 'VT012', 'Thiết kế đồ họa với Photoshop', 2024, 250000.00, 10, 10, 'Tiếng Việt', 'Hướng dẫn Photoshop', 'photoshop.jpg', 'Còn', '2026-07-14 13:23:08', '2026-07-14 13:23:08', '9786041000016'),
('S017', 'TL010', 'NXB001', 'VT001', 'Truyện Kiều', 2019, 90000.00, 20, 20, 'Tiếng Việt', 'Tác phẩm của Nguyễn Du', 'truyenkieu.jpg', 'Còn', '2026-07-14 13:23:08', '2026-07-14 13:23:08', '9786041000017'),
('S018', 'TL002', 'NXB002', 'VT003', 'Tuổi trẻ đáng giá bao nhiêu', 2021, 105000.00, 18, 18, 'Tiếng Việt', 'Sách kỹ năng sống', 'tuoitre.jpg', 'Còn', '2026-07-14 13:23:08', '2026-07-14 13:23:08', '9786041000018'),
('S019', 'TL001', 'NXB003', 'VT002', 'Clean Code', 2018, 320000.00, 6, 6, 'Tiếng Anh', 'Cuốn sách nổi tiếng về lập trình sạch', 'cleancode.jpg', 'Còn', '2026-07-14 13:23:08', '2026-07-14 13:23:08', '9786041000019'),
('S020', 'TL001', 'NXB004', 'VT002', 'Design Patterns', 2017, 350000.00, 5, 5, 'Tiếng Anh', '23 mẫu thiết kế trong lập trình hướng đối tượng', 'designpatterns.jpg', 'Còn', '2026-07-14 13:23:08', '2026-07-14 13:23:08', '9786041000020');

-- --------------------------------------------------------

--
-- Table structure for table `sach_tacgia`
--

CREATE TABLE `sach_tacgia` (
  `MaSach` varchar(10) NOT NULL,
  `MaTG` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sach_tacgia`
--

INSERT INTO `sach_tacgia` (`MaSach`, `MaTG`) VALUES
('S001', 'TG001'),
('S001', 'TG005'),
('S002', 'TG002'),
('S003', 'TG003');

-- --------------------------------------------------------

--
-- Table structure for table `tacgia`
--

CREATE TABLE `tacgia` (
  `MaTG` varchar(10) NOT NULL,
  `TenTacGia` varchar(100) NOT NULL,
  `QuocTich` varchar(100) DEFAULT NULL,
  `NamSinh` int(11) DEFAULT NULL,
  `GhiChu` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tacgia`
--

INSERT INTO `tacgia` (`MaTG`, `TenTacGia`, `QuocTich`, `NamSinh`, `GhiChu`) VALUES
('TG001', 'Nguyễn Nhật Ánh', 'Việt Nam', 1955, NULL),
('TG002', 'Tô Hoài', 'Việt Nam', 1920, NULL),
('TG003', 'Nam Cao', 'Việt Nam', 1915, NULL),
('TG004', 'Nguyễn Du', 'Việt Nam', 1765, NULL),
('TG005', 'Xuân Diệu', 'Việt Nam', 1916, NULL),
('TG006', 'Paulo Coelho', 'Brazil', 1947, NULL),
('TG007', 'Dale Carnegie', 'Hoa Kỳ', 1888, NULL),
('TG008', 'Robert C. Martin', 'Hoa Kỳ', 1952, NULL),
('TG009', 'Martin Fowler', 'Anh', 1963, NULL),
('TG010', 'Erich Gamma', 'Thụy Sĩ', 1961, NULL),
('TG011', 'Andrew Hunt', 'Hoa Kỳ', 1964, NULL),
('TG012', 'David Thomas', 'Hoa Kỳ', 1956, NULL),
('TG013', 'J.K. Rowling', 'Anh', 1965, NULL),
('TG014', 'Haruki Murakami', 'Nhật Bản', 1949, NULL),
('TG015', 'Yuval Noah Harari', 'Israel', 1976, NULL),
('TG016', 'Stephen Hawking', 'Anh', 1942, NULL),
('TG017', 'Robert Kiyosaki', 'Hoa Kỳ', 1947, NULL),
('TG018', 'Brian Tracy', 'Canada', 1944, NULL),
('TG019', 'James Clear', 'Hoa Kỳ', 1986, NULL),
('TG020', 'George Orwell', 'Anh', 1903, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `theloai`
--

CREATE TABLE `theloai` (
  `MaTL` varchar(10) NOT NULL,
  `TenTheLoai` varchar(100) NOT NULL,
  `MoTa` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `theloai`
--

INSERT INTO `theloai` (`MaTL`, `TenTheLoai`, `MoTa`) VALUES
('TL001', 'Công nghệ thông tin', 'Sách về lập trình, mạng máy tính, trí tuệ nhân tạo và công nghệ.'),
('TL002', 'Văn học', 'Tiểu thuyết, truyện ngắn, thơ và các tác phẩm văn học.'),
('TL003', 'Kinh tế', 'Sách về kinh doanh, tài chính, quản trị và đầu tư.'),
('TL004', 'Khoa học', 'Sách nghiên cứu khoa học tự nhiên và ứng dụng.'),
('TL005', 'Giáo dục', 'Giáo trình, tài liệu học tập và tham khảo.'),
('TL006', 'Ngoại ngữ', 'Sách học tiếng Anh, tiếng Nhật, tiếng Hàn và các ngoại ngữ khác.'),
('TL007', 'Tâm lý - Kỹ năng sống', 'Sách phát triển bản thân, giao tiếp và kỹ năng mềm.'),
('TL008', 'Lịch sử', 'Sách về lịch sử Việt Nam và thế giới.'),
('TL009', 'Thiếu nhi', 'Truyện tranh, truyện cổ tích và sách dành cho trẻ em.'),
('TL010', 'Truyện tranh', 'Manga, comic và các loại truyện tranh.');

-- --------------------------------------------------------

--
-- Table structure for table `vitrisach`
--

CREATE TABLE `vitrisach` (
  `MaVT` varchar(10) NOT NULL,
  `KeSach` varchar(20) DEFAULT NULL,
  `Tang` varchar(20) DEFAULT NULL,
  `Ngan` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `vitrisach`
--

INSERT INTO `vitrisach` (`MaVT`, `KeSach`, `Tang`, `Ngan`) VALUES
('VT001', 'A', '1', '1'),
('VT002', 'A', '1', '2'),
('VT003', 'A', '1', '3'),
('VT004', 'A', '2', '1'),
('VT005', 'A', '2', '2'),
('VT006', 'B', '1', '1'),
('VT007', 'B', '1', '2'),
('VT008', 'B', '1', '3'),
('VT009', 'B', '2', '1'),
('VT010', 'B', '2', '2'),
('VT011', 'C', '1', '1'),
('VT012', 'C', '1', '2'),
('VT013', 'C', '1', '3'),
('VT014', 'C', '2', '1'),
('VT015', 'C', '2', '2'),
('VT016', 'D', '1', '1'),
('VT017', 'D', '1', '2'),
('VT018', 'D', '2', '1'),
('VT019', 'D', '2', '2'),
('VT020', 'D', '2', '3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chitietphieumuon`
--
ALTER TABLE `chitietphieumuon`
  ADD PRIMARY KEY (`MaPM`,`MaSach`),
  ADD KEY `MaSach` (`MaSach`);

--
-- Indexes for table `chitietphieunhap`
--
ALTER TABLE `chitietphieunhap`
  ADD PRIMARY KEY (`MaCT`),
  ADD KEY `MaPN` (`MaPN`),
  ADD KEY `MaSach` (`MaSach`);

--
-- Indexes for table `docgia`
--
ALTER TABLE `docgia`
  ADD PRIMARY KEY (`MaDG`),
  ADD UNIQUE KEY `MaND` (`MaND`);

--
-- Indexes for table `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD PRIMARY KEY (`MaND`),
  ADD UNIQUE KEY `TenDangNhap` (`TenDangNhap`);

--
-- Indexes for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`MaNV`),
  ADD UNIQUE KEY `MaND` (`MaND`);

--
-- Indexes for table `nhaxuatban`
--
ALTER TABLE `nhaxuatban`
  ADD PRIMARY KEY (`MaNXB`);

--
-- Indexes for table `phieumuon`
--
ALTER TABLE `phieumuon`
  ADD PRIMARY KEY (`MaPM`),
  ADD KEY `MaDG` (`MaDG`),
  ADD KEY `MaNV` (`MaNV`);

--
-- Indexes for table `phieunhap`
--
ALTER TABLE `phieunhap`
  ADD PRIMARY KEY (`MaPN`),
  ADD KEY `MaNV` (`MaNV`);

--
-- Indexes for table `phieuphat`
--
ALTER TABLE `phieuphat`
  ADD PRIMARY KEY (`MaPP`),
  ADD UNIQUE KEY `MaPM` (`MaPM`);

--
-- Indexes for table `sach`
--
ALTER TABLE `sach`
  ADD PRIMARY KEY (`MaSach`),
  ADD KEY `MaTL` (`MaTL`),
  ADD KEY `MaNXB` (`MaNXB`),
  ADD KEY `MaVT` (`MaVT`);

--
-- Indexes for table `sach_tacgia`
--
ALTER TABLE `sach_tacgia`
  ADD PRIMARY KEY (`MaSach`,`MaTG`),
  ADD KEY `MaTG` (`MaTG`);

--
-- Indexes for table `tacgia`
--
ALTER TABLE `tacgia`
  ADD PRIMARY KEY (`MaTG`);

--
-- Indexes for table `theloai`
--
ALTER TABLE `theloai`
  ADD PRIMARY KEY (`MaTL`),
  ADD UNIQUE KEY `TenTheLoai` (`TenTheLoai`);

--
-- Indexes for table `vitrisach`
--
ALTER TABLE `vitrisach`
  ADD PRIMARY KEY (`MaVT`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chitietphieumuon`
--
ALTER TABLE `chitietphieumuon`
  ADD CONSTRAINT `chitietphieumuon_ibfk_1` FOREIGN KEY (`MaPM`) REFERENCES `phieumuon` (`MaPM`),
  ADD CONSTRAINT `chitietphieumuon_ibfk_2` FOREIGN KEY (`MaSach`) REFERENCES `sach` (`MaSach`);

--
-- Constraints for table `chitietphieunhap`
--
ALTER TABLE `chitietphieunhap`
  ADD CONSTRAINT `chitietphieunhap_ibfk_1` FOREIGN KEY (`MaPN`) REFERENCES `phieunhap` (`MaPN`),
  ADD CONSTRAINT `chitietphieunhap_ibfk_2` FOREIGN KEY (`MaSach`) REFERENCES `sach` (`MaSach`);

--
-- Constraints for table `docgia`
--
ALTER TABLE `docgia`
  ADD CONSTRAINT `docgia_ibfk_1` FOREIGN KEY (`MaND`) REFERENCES `nguoidung` (`MaND`);

--
-- Constraints for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD CONSTRAINT `nhanvien_ibfk_1` FOREIGN KEY (`MaND`) REFERENCES `nguoidung` (`MaND`);

--
-- Constraints for table `phieumuon`
--
ALTER TABLE `phieumuon`
  ADD CONSTRAINT `phieumuon_ibfk_1` FOREIGN KEY (`MaDG`) REFERENCES `docgia` (`MaDG`),
  ADD CONSTRAINT `phieumuon_ibfk_2` FOREIGN KEY (`MaNV`) REFERENCES `nhanvien` (`MaNV`);

--
-- Constraints for table `phieunhap`
--
ALTER TABLE `phieunhap`
  ADD CONSTRAINT `phieunhap_ibfk_1` FOREIGN KEY (`MaNV`) REFERENCES `nhanvien` (`MaNV`) ON UPDATE CASCADE;

--
-- Constraints for table `phieuphat`
--
ALTER TABLE `phieuphat`
  ADD CONSTRAINT `phieuphat_ibfk_1` FOREIGN KEY (`MaPM`) REFERENCES `phieumuon` (`MaPM`);

--
-- Constraints for table `sach`
--
ALTER TABLE `sach`
  ADD CONSTRAINT `sach_ibfk_1` FOREIGN KEY (`MaTL`) REFERENCES `theloai` (`MaTL`),
  ADD CONSTRAINT `sach_ibfk_2` FOREIGN KEY (`MaNXB`) REFERENCES `nhaxuatban` (`MaNXB`),
  ADD CONSTRAINT `sach_ibfk_3` FOREIGN KEY (`MaVT`) REFERENCES `vitrisach` (`MaVT`);

--
-- Constraints for table `sach_tacgia`
--
ALTER TABLE `sach_tacgia`
  ADD CONSTRAINT `sach_tacgia_ibfk_1` FOREIGN KEY (`MaSach`) REFERENCES `sach` (`MaSach`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sach_tacgia_ibfk_2` FOREIGN KEY (`MaTG`) REFERENCES `tacgia` (`MaTG`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
