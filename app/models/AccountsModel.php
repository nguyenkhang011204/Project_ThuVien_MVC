<?php
class AccountsModel extends Model
{
    public function getAllAccounts()
    {
        $sql = "SELECT * FROM nguoidung";
        $this->db->query($sql);
        return $this->db->fetchAll();
    }

    public function getAccountById($accountId)
    {
        $sql = "SELECT * FROM nguoidung WHERE MaND = :accountId";
        $this->db->query($sql);
        $this->db->bind(':accountId', $accountId);
        return $this->db->fetch();
    }

    public function createAccount($data)
    {
        $sql = "INSERT INTO nguoidung (MaND, TenDangNhap, MatKhau, VaiTro, TrangThai) VALUES (:ma_nd, :ten_dang_nhap, :mat_khau, :vai_tro, :trang_thai)";
        $this->db->query($sql);
        $this->db->bind(':ma_nd', $data['MaND']);
        $this->db->bind(':ten_dang_nhap', $data['TenDangNhap']);
        $this->db->bind(':mat_khau', $data['MatKhau']);
        $this->db->bind(':vai_tro', $data['VaiTro']);
        $this->db->bind(':trang_thai', $data['TrangThai']);
        return $this->db->execute();
    }

    public function updateAccount($accountId, $data)
    {
        $sql = "UPDATE nguoidung
            SET
                TenDangNhap = :ten_dang_nhap,
                MatKhau = :mat_khau,
                VaiTro = :vai_tro,
                TrangThai = :trang_thai
            WHERE MaND = :accountId";

        $this->db->query($sql);

        $this->db->bind(':ten_dang_nhap', $data['TenDangNhap']);
        $this->db->bind(':mat_khau', $data['MatKhau']);
        $this->db->bind(':vai_tro', $data['VaiTro']);
        $this->db->bind(':trang_thai', $data['TrangThai']);
        $this->db->bind(':accountId', $accountId);

        return $this->db->execute();
    }

    public function deleteAccount($accountId)
    {
        $sql = "DELETE FROM nguoidung WHERE MaND = :accountId";
        $this->db->query($sql);
        $this->db->bind(':accountId', $accountId);
        return $this->db->execute();
    }

    public function getAccountCount()
    {
        $sql = "SELECT COUNT(*) AS total FROM nguoidung";
        $this->db->query($sql);
        $result = $this->db->fetch();
        return $result['total'] ?? 0;
    }

    public function getAccountsByRole($role)
    {
        $sql = "SELECT COUNT(*) AS total FROM nguoidung WHERE VaiTro = :role";
        $this->db->query($sql);
        $this->db->bind(':role', $role);
        $result = $this->db->fetch();
        return $result['total'] ?? 0;
    }

    public function getAccountByStatus($status)
    {
        $sql = "SELECT COUNT(*) AS total FROM nguoidung WHERE TrangThai = :status";
        $this->db->query($sql);
        $this->db->bind(':status', $status);
        $result = $this->db->fetch();
        return $result['total'] ?? 0;
    }

    public function isAccountInUse($maND)
    {
        $this->db->query("
        SELECT COUNT(*) AS total
        FROM docgia
        WHERE MaND = :maND
    ");

        $this->db->bind(':maND', $maND);

        $result = $this->db->fetch();

        return ($result['total'] ?? 0) > 0;
    }
}
?>