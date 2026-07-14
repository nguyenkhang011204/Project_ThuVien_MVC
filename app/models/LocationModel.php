<?php
class LocationModel extends Model
{
    // Lấy tất cả vị trí sách
    public function getAllLocations()
    {
        $sql = "SELECT * FROM vitrisach ORDER BY KeSach, Tang, Ngan ASC";
        $this->db->query($sql);
        return $this->db->fetchAll();
    }

    // Lấy vị trí theo ID
    public function getLocationById($locationId)
    {
        $sql = "SELECT * FROM vitrisach WHERE MaVT = :locationId";
        $this->db->query($sql);
        $this->db->bind(':locationId', $locationId);
        return $this->db->fetch();
    }

    // Tìm kiếm vị trí
    public function searchLocations($keyword)
    {
        $keyword = "%$keyword%";
        $sql = "SELECT * FROM vitrisach WHERE KeSach LIKE :keyword OR Tang LIKE :keyword OR Ngan LIKE :keyword 
                ORDER BY KeSach, Tang, Ngan ASC";
        $this->db->query($sql);
        $this->db->bind(':keyword', $keyword);
        return $this->db->fetchAll();
    }

    // Tạo vị trí mới
    public function createLocation($data)
    {
        $sql = "INSERT INTO vitrisach (MaVT, KeSach, Tang, Ngan) VALUES (:maVT, :keSach, :tang, :ngan)";
        $this->db->query($sql);
        $this->db->bind(':maVT', $data['MaVT']);
        $this->db->bind(':keSach', $data['KeSach']);
        $this->db->bind(':tang', $data['Tang']);
        $this->db->bind(':ngan', $data['Ngan']);
        return $this->db->execute();
    }

    // Cập nhật vị trí
    public function updateLocation($locationId, $data)
    {
        $sql = "UPDATE vitrisach SET KeSach = :keSach, Tang = :tang, Ngan = :ngan WHERE MaVT = :maVT";
        $this->db->query($sql);
        $this->db->bind(':keSach', $data['KeSach']);
        $this->db->bind(':tang', $data['Tang']);
        $this->db->bind(':ngan', $data['Ngan']);
        $this->db->bind(':maVT', $locationId);
        return $this->db->execute();
    }

    // Xóa vị trí
    public function deleteLocation($locationId)
    {
        $sql = "DELETE FROM vitrisach WHERE MaVT = :locationId";
        $this->db->query($sql);
        $this->db->bind(':locationId', $locationId);
        return $this->db->execute();
    }

    // Lấy số lượng vị trí
    public function getLocationCount()
    {
        $sql = "SELECT COUNT(*) as total FROM vitrisach";
        $result = $this->db->query($sql);
        $result = $this->db->fetch();
        return $result->total ?? 0;
    }

    // Lấy số sách tại vị trí
    public function getBooksCountByLocation($locationId)
    {
        $sql = "SELECT COUNT(*) as total FROM sach WHERE MaVT = :locationId";
        $this->db->query($sql);
        $this->db->bind(':locationId', $locationId);
        $result = $this->db->fetch();
        return $result->total ?? 0;
    }
}
?>