<?php
class AuthorModel extends Model
{
    // Đăng nhập: kiểm tra tài khoản
    public function login($tenDangNhap, $matKhau)
    {
        $sql = "SELECT * FROM nguoidung WHERE TenDangNhap = :tenDangNhap AND TrangThai = 1";
        $this->db->query($sql);
        $this->db->bind(':tenDangNhap', $tenDangNhap);
        $user = $this->db->fetch();

        if (!$user) {
            return false;
        }

        // Mật khẩu trong DB hiện đang lưu dạng plain-text ('123456'...)
        // Nếu sau này bạn hash mật khẩu, thay dòng dưới bằng password_verify()
        if ($user['MatKhau'] !== $matKhau) {
            return false;
        }

        return $user;
    }

    // Kiểm tra tên đăng nhập đã tồn tại chưa
    public function usernameExists($tenDangNhap)
    {
        $sql = "SELECT COUNT(*) as total FROM nguoidung WHERE TenDangNhap = :tenDangNhap";
        $this->db->query($sql);
        $this->db->bind(':tenDangNhap', $tenDangNhap);
        $result = $this->db->fetch();
        return ($result['total'] ?? 0) > 0;
    }

    // Kiểm tra email đã tồn tại chưa (bảng docgia)
    public function emailExists($email)
    {
        $sql = "SELECT COUNT(*) as total FROM docgia WHERE Email = :email";
        $this->db->query($sql);
        $this->db->bind(':email', $email);
        $result = $this->db->fetch();
        return ($result['total'] ?? 0) > 0;
    }

    // Sinh mã người dùng mới (ND012, ND013...)
    public function generateNextMaND()
    {
        $sql = "SELECT MaND FROM nguoidung ORDER BY MaND DESC LIMIT 1";
        $this->db->query($sql);
        $last = $this->db->fetch();

        $number = $last ? ((int) substr($last['MaND'], 2)) + 1 : 1;
        return 'ND' . str_pad($number, 3, '0', STR_PAD_LEFT);
    }

    // Sinh mã độc giả mới (DG009, DG010...)
    public function generateNextMaDG()
    {
        $sql = "SELECT MaDG FROM docgia ORDER BY MaDG DESC LIMIT 1";
        $this->db->query($sql);
        $last = $this->db->fetch();

        $number = $last ? ((int) substr($last['MaDG'], 2)) + 1 : 1;
        return 'DG' . str_pad($number, 3, '0', STR_PAD_LEFT);
    }

    // Đăng ký độc giả mới — tạo cả nguoidung + docgia
    public function register($data)
    {
        try {
            $this->db->beginTransaction();

            $maND = $this->generateNextMaND();
            $maDG = $this->generateNextMaDG();

            // 1. Tạo tài khoản đăng nhập
            $sql1 = "INSERT INTO nguoidung (MaND, TenDangNhap, MatKhau, VaiTro, TrangThai)
                     VALUES (:maND, :tenDangNhap, :matKhau, 'DOCGIA', 1)";
            $this->db->query($sql1);
            $this->db->bind(':maND', $maND);
            $this->db->bind(':tenDangNhap', $data['TenDangNhap']);
            $this->db->bind(':matKhau', $data['MatKhau']);
            $this->db->execute();

            // 2. Tạo hồ sơ độc giả
            $sql2 = "INSERT INTO docgia (MaDG, MaND, HoTen, SDT, Email, NgayDangKy)
                     VALUES (:maDG, :maND, :hoTen, :sdt, :email, :ngayDangKy)";
            $this->db->query($sql2);
            $this->db->bind(':maDG', $maDG);
            $this->db->bind(':maND', $maND);
            $this->db->bind(':hoTen', $data['HoTen']);
            $this->db->bind(':sdt', $data['SDT']);
            $this->db->bind(':email', $data['Email']);
            $this->db->bind(':ngayDangKy', date('Y-m-d'));
            $this->db->execute();

            $this->db->commit();
            return true;
        } catch (Exception $e) {
            $this->db->rollback();
            return false;
        }
    }
}
?>