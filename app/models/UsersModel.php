<?php
class UsersModel extends Model
{
    public function getAllUsers()
    {
        $sql = "SELECT * FROM docgia";
        $this->db->query($sql);
        return $this->db->fetchAll();
    }

    public function getAllAccounts()
    {
        $sql = "SELECT * FROM nguoidung";
        $this->db->query($sql);
        return $this->db->fetchAll();
    }

    public function getUserById($userId)
    {
        $sql = "SELECT * FROM docgia WHERE MaDG = :userId";
        $this->db->query($sql);
        $this->db->bind(':userId', $userId);
        return $this->db->fetch();
    }

    public function createUser($data)
    {
        $sql = "INSERT INTO docgia (MaDG, MaND, HoTen, NgaySinh, GioiTinh, SDT, Email, DiaChi, NgayDangKy) VALUES (:ma_dg, :ma_nd, :ho_ten, :ngay_sinh, :gioi_tinh, :sdt, :email, :dia_chi, :ngay_dang_ky)";
        $this->db->query($sql);
        $this->db->bind(':ma_dg', $data['MaDG']);
        $this->db->bind(':ma_nd', $data['MaND']);
        $this->db->bind(':ho_ten', $data['HoTen']);
        $this->db->bind(':ngay_sinh', $data['NgaySinh']);
        $this->db->bind(':gioi_tinh', $data['GioiTinh']);
        $this->db->bind(':sdt', $data['SDT']);
        $this->db->bind(':email', $data['Email']);
        $this->db->bind(':dia_chi', $data['DiaChi']);
        $this->db->bind(':ngay_dang_ky', date('Y-m-d'));
        return $this->db->execute();
    }

    public function updateUser($userId, $data)
    {
        $sql = "UPDATE docgia
            SET
                MaND = :ma_nd,
                HoTen = :ho_ten,
                NgaySinh = :ngay_sinh,
                GioiTinh = :gioi_tinh,
                SDT = :sdt,
                Email = :email,
                DiaChi = :dia_chi
            WHERE MaDG = :userId";

        $this->db->query($sql);
        $this->db->bind(':ma_nd', $data['MaND']);
        $this->db->bind(':ho_ten', $data['HoTen']);
        $this->db->bind(':ngay_sinh', $data['NgaySinh']);
        $this->db->bind(':gioi_tinh', $data['GioiTinh']);
        $this->db->bind(':sdt', $data['SDT']);
        $this->db->bind(':email', $data['Email']);
        $this->db->bind(':dia_chi', $data['DiaChi']);
        $this->db->bind(':userId', $userId);

        return $this->db->execute();
    }

    public function deleteUser($userId)
    {
        $sql = "DELETE FROM docgia WHERE MaDG = :userId";
        $this->db->query($sql);
        $this->db->bind(':userId', $userId);
        return $this->db->execute();
    }

    public function getUserCount()
    {
        $sql = "SELECT COUNT(*) as count FROM docgia";
        $this->db->query($sql);
        $result = $this->db->fetch();
        return $result['count'] ?? 0;
    }
}
?>