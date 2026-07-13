-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2026 at 09:47 AM
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

-- --------------------------------------------------------

--
-- Table structure for table `sach_tacgia`
--

CREATE TABLE `sach_tacgia` (
  `MaSach` varchar(10) NOT NULL,
  `MaTG` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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

-- --------------------------------------------------------

--
-- Table structure for table `theloai`
--

CREATE TABLE `theloai` (
  `MaTL` varchar(10) NOT NULL,
  `TenTheLoai` varchar(100) NOT NULL,
  `MoTa` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
