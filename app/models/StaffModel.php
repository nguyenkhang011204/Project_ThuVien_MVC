<?php
class StaffModel extends Model
{
    public function getAllStaff()
    {
        $sql = "SELECT * FROM nhanvien";
        $this->db->query($sql);
        return $this->db->fetchAll();
    }

    public function getStaffById($staffId)
    {
        $sql = "SELECT * FROM nhanvien WHERE MaNV = :staffId";
        $this->db->query($sql);
        $this->db->bind(':staffId', $staffId);
        return $this->db->fetch();
    }

    public function createStaff($data)
    {
        $sql = "INSERT INTO nhanvien (MaNV, MaND, HoTen, NgaySinh, GioiTinh, SDT, Email, DiaChi, ChucVu) VALUES (:ma_nv, :ma_nd, :ho_ten, :ngay_sinh, :gioi_tinh, :sdt, :email, :dia_chi, :chuc_vu)";
        $this->db->query($sql);
        $this->db->bind(':ma_nv', $data['MaNV']);
        $this->db->bind(':ma_nd', $data['MaND']);
        $this->db->bind(':ho_ten', $data['HoTen']);
        $this->db->bind(':ngay_sinh', $data['NgaySinh']);
        $this->db->bind(':gioi_tinh', $data['GioiTinh']);
        $this->db->bind(':sdt', $data['SDT']);
        $this->db->bind(':email', $data['Email']);
        $this->db->bind(':dia_chi', $data['DiaChi']);
        $this->db->bind(':chuc_vu', $data['ChucVu']);
        return $this->db->execute();
    }

    public function updateStaff($staffId, $data)
    {
        $sql = "UPDATE nhanvien
            SET
                HoTen = :ho_ten,
                NgaySinh = :ngay_sinh,
                GioiTinh = :gioi_tinh,
                SDT = :sdt,
                Email = :email,
                DiaChi = :dia_chi,
                ChucVu = :chuc_vu
            WHERE MaNV = :staffId";

        $this->db->query($sql);
        $this->db->bind(':ho_ten', $data['HoTen']);
        $this->db->bind(':ngay_sinh', $data['NgaySinh']);
        $this->db->bind(':gioi_tinh', $data['GioiTinh']);
        $this->db->bind(':sdt', $data['SDT']);
        $this->db->bind(':email', $data['Email']);
        $this->db->bind(':dia_chi', $data['DiaChi']);
        $this->db->bind(':chuc_vu', $data['ChucVu']);
        $this->db->bind(':staffId', $staffId);
        return $this->db->execute();
    }

    public function deleteStaff($staffId)
    {
        $sql = "DELETE FROM nhanvien WHERE MaNV = :staffId";
        $this->db->query($sql);
        $this->db->bind(':staffId', $staffId);
        return $this->db->execute();
    }

}