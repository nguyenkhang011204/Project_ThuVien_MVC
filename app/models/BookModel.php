<?php
class BookModel extends Model
{
    // Lấy tất cả sách
    public function getAllBooks()
    {
        $sql = "SELECT s.*, tl.TenTheLoai, nxb.TenNXB, vt.KeSach, vt.Tang, vt.Ngan
                FROM sach s
                LEFT JOIN theloai tl ON s.MaTL = tl.MaTL
                LEFT JOIN nhaxuatban nxb ON s.MaNXB = nxb.MaNXB
                LEFT JOIN vitrisach vt ON s.MaVT = vt.MaVT
                ORDER BY s.NgayTao DESC";

        $this->db->query($sql);
        return $this->db->fetchAll();
    }

    // Lấy sách theo ID
    public function getBookById($bookId)
    {
        $sql = "SELECT s.*, tl.TenTheLoai, nxb.TenNXB, vt.KeSach, vt.Tang, vt.Ngan
                FROM sach s
                LEFT JOIN theloai tl ON s.MaTL = tl.MaTL
                LEFT JOIN nhaxuatban nxb ON s.MaNXB = nxb.MaNXB
                LEFT JOIN vitrisach vt ON s.MaVT = vt.MaVT
                WHERE s.MaSach = :bookId";

        $this->db->query($sql);
        $this->db->bind(':bookId', $bookId);
        return $this->db->fetch();
    }

    // Tìm kiếm sách
    public function searchBooks($keyword)
    {
        $keyword = "%$keyword%";
        $sql = "SELECT s.*, tl.TenTheLoai, nxb.TenNXB, vt.KeSach, vt.Tang, vt.Ngan
                FROM sach s
                LEFT JOIN theloai tl ON s.MaTL = tl.MaTL
                LEFT JOIN nhaxuatban nxb ON s.MaNXB = nxb.MaNXB
                LEFT JOIN vitrisach vt ON s.MaVT = vt.MaVT
                WHERE s.TenSach LIKE :keyword OR s.ISBN LIKE :keyword OR nxb.TenNXB LIKE :keyword
                ORDER BY s.NgayTao DESC";

        $this->db->query($sql);
        $this->db->bind(':keyword', $keyword);
        return $this->db->fetchAll();
    }

    // Tìm kiếm sách theo danh mục
    public function searchBooksByCategory($categoryId)
    {
        $sql = "SELECT s.*, tl.TenTheLoai, nxb.TenNXB, vt.KeSach, vt.Tang, vt.Ngan
                FROM sach s
                LEFT JOIN theloai tl ON s.MaTL = tl.MaTL
                LEFT JOIN nhaxuatban nxb ON s.MaNXB = nxb.MaNXB
                LEFT JOIN vitrisach vt ON s.MaVT = vt.MaVT
                WHERE s.MaTL = :categoryId
                ORDER BY s.NgayTao DESC";

        $this->db->query($sql);
        $this->db->bind(':categoryId', $categoryId);
        return $this->db->fetchAll();
    }

    // Tạo sách mới
    public function createBook($data)
    {
        $sql = "INSERT INTO sach (MaSach, MaTL, MaNXB, MaVT, TenSach, NamXuatBan, Gia, SoLuong, SoLuongCon, NgonNgu, MoTa, HinhAnh, TinhTrang, ISBN, NgayTao, NgayCapNhat)
                VALUES (:maSach, :maTL, :maNXB, :maVT, :tenSach, :namXuatBan, :gia, :soLuong, :soLuongCon, :ngonNgu, :moTa, :hinhAnh, :tinhTrang, :isbn, NOW(), NOW())";

        $this->db->query($sql);
        $this->db->bind(':maSach', $data['MaSach']);
        $this->db->bind(':maTL', $data['MaTL']);
        $this->db->bind(':maNXB', $data['MaNXB']);
        $this->db->bind(':maVT', $data['MaVT']);
        $this->db->bind(':tenSach', $data['TenSach']);
        $this->db->bind(':namXuatBan', $data['NamXuatBan']);
        $this->db->bind(':gia', $data['Gia']);
        $this->db->bind(':soLuong', $data['SoLuong']);
        $this->db->bind(':soLuongCon', $data['SoLuongCon']);
        $this->db->bind(':ngonNgu', $data['NgonNgu']);
        $this->db->bind(':moTa', $data['MoTa']);
        $this->db->bind(':hinhAnh', $data['HinhAnh']);
        $this->db->bind(':tinhTrang', $data['TinhTrang']);
        $this->db->bind(':isbn', $data['ISBN']);

        return $this->db->execute();
    }

    // Cập nhật sách
    public function updateBook($bookId, $data)
    {
        $sql = "UPDATE sach SET
                MaTL = :maTL, MaNXB = :maNXB, MaVT = :maVT, TenSach = :tenSach, NamXuatBan = :namXuatBan,
                Gia = :gia, SoLuong = :soLuong, SoLuongCon = :soLuongCon, NgonNgu = :ngonNgu, MoTa = :moTa,
                HinhAnh = :hinhAnh, TinhTrang = :tinhTrang, ISBN = :isbn, NgayCapNhat = NOW()
                WHERE MaSach = :maSach";

        $this->db->query($sql);
        $this->db->bind(':maTL', $data['MaTL']);
        $this->db->bind(':maNXB', $data['MaNXB']);
        $this->db->bind(':maVT', $data['MaVT']);
        $this->db->bind(':tenSach', $data['TenSach']);
        $this->db->bind(':namXuatBan', $data['NamXuatBan']);
        $this->db->bind(':gia', $data['Gia']);
        $this->db->bind(':soLuong', $data['SoLuong']);
        $this->db->bind(':soLuongCon', $data['SoLuongCon']);
        $this->db->bind(':ngonNgu', $data['NgonNgu']);
        $this->db->bind(':moTa', $data['MoTa']);
        $this->db->bind(':hinhAnh', $data['HinhAnh']);
        $this->db->bind(':tinhTrang', $data['TinhTrang']);
        $this->db->bind(':isbn', $data['ISBN']);
        $this->db->bind(':maSach', $bookId);

        return $this->db->execute();
    }

    // Xóa sách
    public function deleteBook($bookId)
    {
        // Xóa liên kết sách-tác giả trước
        $sqlDelete1 = "DELETE FROM sach_tacgia WHERE MaSach = :bookId";
        $this->db->query($sqlDelete1);
        $this->db->bind(':bookId', $bookId);
        $this->db->execute();

        // Xóa sách
        $sqlDelete2 = "DELETE FROM sach WHERE MaSach = :bookId";
        $this->db->query($sqlDelete2);
        $this->db->bind(':bookId', $bookId);
        return $this->db->execute();
    }

    // Lấy tác giả của sách
    public function getAuthorsOfBook($bookId)
    {
        $sql = "SELECT tg.* FROM tacgia tg
                INNER JOIN sach_tacgia st ON tg.MaTG = st.MaTG
                WHERE st.MaSach = :bookId";

        $this->db->query($sql);
        $this->db->bind(':bookId', $bookId);
        return $this->db->fetchAll();
    }

    // Thêm tác giả cho sách
    public function addAuthorToBook($bookId, $authorId)
    {
        $sql = "INSERT INTO sach_tacgia (MaSach, MaTG) VALUES (:bookId, :authorId)";
        $this->db->query($sql);
        $this->db->bind(':bookId', $bookId);
        $this->db->bind(':authorId', $authorId);
        return $this->db->execute();
    }

    // Xóa tác giả khỏi sách
    public function removeAuthorFromBook($bookId, $authorId)
    {
        $sql = "DELETE FROM sach_tacgia WHERE MaSach = :bookId AND MaTG = :authorId";
        $this->db->query($sql);
        $this->db->bind(':bookId', $bookId);
        $this->db->bind(':authorId', $authorId);
        return $this->db->execute();
    }

    // Lấy tất cả danh mục
    public function getAllCategories()
    {
        $sql = "SELECT * FROM theloai ORDER BY TenTheLoai ASC";
        $this->db->query($sql);
        return $this->db->fetchAll();
    }

    // Lấy tất cả nhà xuất bản
    public function getAllPublishers()
    {
        $sql = "SELECT * FROM nhaxuatban ORDER BY TenNXB ASC";
        $this->db->query($sql);
        return $this->db->fetchAll();
    }

    // Lấy tất cả vị trí sách
    public function getAllLocations()
    {
        $sql = "SELECT * FROM vitrisach ORDER BY KeSach, Tang, Ngan ASC";
        $this->db->query($sql);
        return $this->db->fetchAll();
    }

    // Lấy tất cả tác giả
    public function getAllAuthors()
    {
        $sql = "SELECT * FROM tacgia ORDER BY TenTacGia ASC";
        $this->db->query($sql);
        return $this->db->fetchAll();
    }

    // Lấy số lượng sách
    public function getBookCount()
    {
        $sql = "SELECT COUNT(*) as total FROM sach";
        $result = $this->db->query($sql);
        $result = $this->db->fetch();
        return $result->total ?? 0;
    }

    // Lấy số lượng sách còn
    public function getAvailableBooksCount()
    {
        $sql = "SELECT COUNT(*) as total FROM sach WHERE SoLuongCon > 0";
        $result = $this->db->query($sql);
        $result = $this->db->fetch();
        return $result->total ?? 0;
    }

    // Lấy số lượng sách hết
    public function getUnavailableBooksCount()
    {
        $sql = "SELECT COUNT(*) as total FROM sach WHERE SoLuongCon = 0";
        $result = $this->db->query($sql);
        $result = $this->db->fetch();
        return $result->total ?? 0;
    }

    // Cập nhật số lượng sách
    public function updateBookQuantity($bookId, $quantity)
    {
        $sql = "UPDATE sach SET SoLuongCon = SoLuongCon + :quantity, NgayCapNhat = NOW() WHERE MaSach = :bookId";
        $this->db->query($sql);
        $this->db->bind(':quantity', $quantity);
        $this->db->bind(':bookId', $bookId);
        return $this->db->execute();
    }

    // Lấy sách nổi bật (sách có giá cao, số lượng nhiều và còn hàng)
    public function getFeaturedBooks($limit = 5)
    {
        $sql = "SELECT s.*, tl.TenTheLoai, nxb.TenNXB, vt.KeSach, vt.Tang, vt.Ngan
                FROM sach s
                LEFT JOIN theloai tl ON s.MaTL = tl.MaTL
                LEFT JOIN nhaxuatban nxb ON s.MaNXB = nxb.MaNXB
                LEFT JOIN vitrisach vt ON s.MaVT = vt.MaVT
                WHERE s.TinhTrang = 'Còn' AND s.SoLuongCon > 0
                ORDER BY s.Gia DESC, s.SoLuong DESC
                LIMIT :limit";

        $this->db->query($sql);
        $this->db->bind(':limit', $limit);
        return $this->db->fetchAll();
    }

    // Lấy sách theo năm xuất bản
    public function getBooksByYear($year)
    {
        $sql = "SELECT s.*, tl.TenTheLoai, nxb.TenNXB, vt.KeSach
                FROM sach s
                LEFT JOIN theloai tl ON s.MaTL = tl.MaTL
                LEFT JOIN nhaxuatban nxb ON s.MaNXB = nxb.MaNXB
                LEFT JOIN vitrisach vt ON s.MaVT = vt.MaVT
                WHERE s.NamXuatBan = :year
                ORDER BY s.TenSach";

        $this->db->query($sql);
        $this->db->bind(':year', $year);
        return $this->db->fetchAll();
    }

    // Kiểm tra ISBN có tồn tại không
    public function checkISBNExists($isbn, $excludeId = null)
    {
        if ($excludeId) {
            $sql = "SELECT COUNT(*) as count FROM sach WHERE ISBN = :isbn AND MaSach != :excludeId";
            $this->db->query($sql);
            $this->db->bind(':excludeId', $excludeId);
        } else {
            $sql = "SELECT COUNT(*) as count FROM sach WHERE ISBN = :isbn";
            $this->db->query($sql);
        }

        $this->db->bind(':isbn', $isbn);
        $result = $this->db->fetch();
        return $result->count > 0;
    }
}
?>