<?php
class AuthorModel extends Model
{
    // Lấy tất cả tác giả
    public function getAllAuthors()
    {
        $sql = "SELECT * FROM tacgia ORDER BY TenTacGia ASC";
        $this->db->query($sql);
        return $this->db->fetchAll();
    }

    // Lấy tác giả theo ID
    public function getAuthorById($authorId)
    {
        $sql = "SELECT * FROM tacgia WHERE MaTG = :authorId";
        $this->db->query($sql);
        $this->db->bind(':authorId', $authorId);
        return $this->db->fetch();
    }

    // Tìm kiếm tác giả
    public function searchAuthors($keyword)
    {
        $keyword = "%$keyword%";
        $sql = "SELECT * FROM tacgia WHERE TenTacGia LIKE :keyword OR QuocTich LIKE :keyword ORDER BY TenTacGia ASC";
        $this->db->query($sql);
        $this->db->bind(':keyword', $keyword);
        return $this->db->fetchAll();
    }

    // Tạo tác giả mới
    public function createAuthor($data)
    {
        $sql = "INSERT INTO tacgia (MaTG, TenTacGia, QuocTich, NamSinh, GhiChu) 
                VALUES (:maTG, :tenTacGia, :quocTich, :namSinh, :ghiChu)";
        $this->db->query($sql);
        $this->db->bind(':maTG', $data['MaTG']);
        $this->db->bind(':tenTacGia', $data['TenTacGia']);
        $this->db->bind(':quocTich', $data['QuocTich']);
        $this->db->bind(':namSinh', $data['NamSinh']);
        $this->db->bind(':ghiChu', $data['GhiChu']);
        return $this->db->execute();
    }

    // Cập nhật tác giả
    public function updateAuthor($authorId, $data)
    {
        $sql = "UPDATE tacgia SET TenTacGia = :tenTacGia, QuocTich = :quocTich, NamSinh = :namSinh, GhiChu = :ghiChu 
                WHERE MaTG = :maTG";
        $this->db->query($sql);
        $this->db->bind(':tenTacGia', $data['TenTacGia']);
        $this->db->bind(':quocTich', $data['QuocTich']);
        $this->db->bind(':namSinh', $data['NamSinh']);
        $this->db->bind(':ghiChu', $data['GhiChu']);
        $this->db->bind(':maTG', $authorId);
        return $this->db->execute();
    }

    // Xóa tác giả
    public function deleteAuthor($authorId)
    {
        // Xóa liên kết sách-tác giả trước
        $sqlDelete1 = "DELETE FROM sach_tacgia WHERE MaTG = :authorId";
        $this->db->query($sqlDelete1);
        $this->db->bind(':authorId', $authorId);
        $this->db->execute();

        // Xóa tác giả
        $sqlDelete2 = "DELETE FROM tacgia WHERE MaTG = :authorId";
        $this->db->query($sqlDelete2);
        $this->db->bind(':authorId', $authorId);
        return $this->db->execute();
    }

    // Lấy số lượng tác giả
    public function getAuthorCount()
    {
        $sql = "SELECT COUNT(*) as total FROM tacgia";
        $result = $this->db->query($sql);
        $result = $this->db->fetch();
        return $result->total ?? 0;
    }

    // Lấy số sách của tác giả
    public function getBooksCountByAuthor($authorId)
    {
        $sql = "SELECT COUNT(DISTINCT MaSach) as total FROM sach_tacgia WHERE MaTG = :authorId";
        $this->db->query($sql);
        $this->db->bind(':authorId', $authorId);
        $result = $this->db->fetch();
        return $result->total ?? 0;
    }
}
?>