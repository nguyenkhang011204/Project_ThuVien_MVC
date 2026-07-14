<?php
class PublisherModel extends Model
{
    // Lấy tất cả nhà xuất bản
    public function getAllPublishers()
    {
        $sql = "SELECT * FROM nhaxuatban ORDER BY TenNXB ASC";
        $this->db->query($sql);
        return $this->db->fetchAll();
    }

    // Lấy nhà xuất bản theo ID
    public function getPublisherById($publisherId)
    {
        $sql = "SELECT * FROM nhaxuatban WHERE MaNXB = :publisherId";
        $this->db->query($sql);
        $this->db->bind(':publisherId', $publisherId);
        return $this->db->fetch();
    }

    // Tìm kiếm nhà xuất bản
    public function searchPublishers($keyword)
    {
        $keyword = "%$keyword%";
        $sql = "SELECT * FROM nhaxuatban WHERE TenNXB LIKE :keyword OR DiaChi LIKE :keyword OR Email LIKE :keyword 
                ORDER BY TenNXB ASC";
        $this->db->query($sql);
        $this->db->bind(':keyword', $keyword);
        return $this->db->fetchAll();
    }

    // Tạo nhà xuất bản mới
    public function createPublisher($data)
    {
        $sql = "INSERT INTO nhaxuatban (MaNXB, TenNXB, DiaChi, SDT, Email) 
                VALUES (:maNXB, :tenNXB, :diaChi, :sdt, :email)";
        $this->db->query($sql);
        $this->db->bind(':maNXB', $data['MaNXB']);
        $this->db->bind(':tenNXB', $data['TenNXB']);
        $this->db->bind(':diaChi', $data['DiaChi']);
        $this->db->bind(':sdt', $data['SDT']);
        $this->db->bind(':email', $data['Email']);
        return $this->db->execute();
    }

    // Cập nhật nhà xuất bản
    public function updatePublisher($publisherId, $data)
    {
        $sql = "UPDATE nhaxuatban SET TenNXB = :tenNXB, DiaChi = :diaChi, SDT = :sdt, Email = :email 
                WHERE MaNXB = :maNXB";
        $this->db->query($sql);
        $this->db->bind(':tenNXB', $data['TenNXB']);
        $this->db->bind(':diaChi', $data['DiaChi']);
        $this->db->bind(':sdt', $data['SDT']);
        $this->db->bind(':email', $data['Email']);
        $this->db->bind(':maNXB', $publisherId);
        return $this->db->execute();
    }

    // Xóa nhà xuất bản
    public function deletePublisher($publisherId)
    {
        $sql = "DELETE FROM nhaxuatban WHERE MaNXB = :publisherId";
        $this->db->query($sql);
        $this->db->bind(':publisherId', $publisherId);
        return $this->db->execute();
    }

    // Lấy số lượng nhà xuất bản
    public function getPublisherCount()
    {
        $sql = "SELECT COUNT(*) as total FROM nhaxuatban";
        $result = $this->db->query($sql);
        $result = $this->db->fetch();
        return $result->total ?? 0;
    }

    // Lấy số sách của nhà xuất bản
    public function getBooksCountByPublisher($publisherId)
    {
        $sql = "SELECT COUNT(*) as total FROM sach WHERE MaNXB = :publisherId";
        $this->db->query($sql);
        $this->db->bind(':publisherId', $publisherId);
        $result = $this->db->fetch();
        return $result->total ?? 0;
    }
}
?>