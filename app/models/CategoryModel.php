<?php
class CategoryModel extends Model
{
    // Lấy tất cả thể loại
    public function getAllCategories()
    {
        $sql = "SELECT * FROM theloai ORDER BY TenTheLoai ASC";
        $this->db->query($sql);
        return $this->db->fetchAll();
    }

    // Lấy thể loại theo ID
    public function getCategoryById($categoryId)
    {
        $sql = "SELECT * FROM theloai WHERE MaTL = :categoryId";
        $this->db->query($sql);
        $this->db->bind(':categoryId', $categoryId);
        return $this->db->fetch();
    }

    // Tìm kiếm thể loại
    public function searchCategories($keyword)
    {
        $keyword = "%$keyword%";
        $sql = "SELECT * FROM theloai WHERE TenTheLoai LIKE :keyword OR MoTa LIKE :keyword ORDER BY TenTheLoai ASC";
        $this->db->query($sql);
        $this->db->bind(':keyword', $keyword);
        return $this->db->fetchAll();
    }

    // Tạo thể loại mới
    public function createCategory($data)
    {
        $sql = "INSERT INTO theloai (MaTL, TenTheLoai, MoTa) VALUES (:maTL, :tenTheLoai, :moTa)";
        $this->db->query($sql);
        $this->db->bind(':maTL', $data['MaTL']);
        $this->db->bind(':tenTheLoai', $data['TenTheLoai']);
        $this->db->bind(':moTa', $data['MoTa']);
        return $this->db->execute();
    }

    // Cập nhật thể loại
    public function updateCategory($categoryId, $data)
    {
        $sql = "UPDATE theloai SET TenTheLoai = :tenTheLoai, MoTa = :moTa WHERE MaTL = :maTL";
        $this->db->query($sql);
        $this->db->bind(':tenTheLoai', $data['TenTheLoai']);
        $this->db->bind(':moTa', $data['MoTa']);
        $this->db->bind(':maTL', $categoryId);
        return $this->db->execute();
    }

    // Xóa thể loại
    public function deleteCategory($categoryId)
    {
        $sql = "DELETE FROM theloai WHERE MaTL = :categoryId";
        $this->db->query($sql);
        $this->db->bind(':categoryId', $categoryId);
        return $this->db->execute();
    }

    // Lấy số lượng thể loại
    public function getCategoryCount()
    {
        $sql = "SELECT COUNT(*) as total FROM theloai";
        $result = $this->db->query($sql);
        $result = $this->db->fetch();
        return $result->total ?? 0;
    }

    // Lấy số sách theo thể loại
    public function getBooksCountByCategory($categoryId)
    {
        $sql = "SELECT COUNT(*) as total FROM sach WHERE MaTL = :categoryId";
        $this->db->query($sql);
        $this->db->bind(':categoryId', $categoryId);
        $result = $this->db->fetch();
        return $result->total ?? 0;
    }
}
?>