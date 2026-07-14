<?php
class StaffController extends Controller
{
    public function index()
    {
        $staff = [
            (object) ['ma_nv' => 'NV001', 'ten_nv' => 'Trần Minh Tuấn', 'email' => 'tuan@thuvien.com', 'dien_thoai' => '0123456789', 'chuc_vu' => 'Giám đốc', 'phong_ban' => 'Ban điều hành', 'trang_thai' => 'Hoạt động'],
            (object) ['ma_nv' => 'NV002', 'ten_nv' => 'Nguyễn Thị Linh', 'email' => 'linh@thuvien.com', 'dien_thoai' => '0987654321', 'chuc_vu' => 'Thủ thư', 'phong_ban' => 'Phòng tư liệu', 'trang_thai' => 'Hoạt động'],
            (object) ['ma_nv' => 'NV003', 'ten_nv' => 'Lê Văn Hùng', 'email' => 'hung@thuvien.com', 'dien_thoai' => '0912345678', 'chuc_vu' => 'Nhân viên kho', 'phong_ban' => 'Phòng quản lý kho', 'trang_thai' => 'Hoạt động'],
            (object) ['ma_nv' => 'NV004', 'ten_nv' => 'Phạm Thị Hương', 'email' => 'huong@thuvien.com', 'dien_thoai' => '0934567890', 'chuc_vu' => 'Nhân viên phục vụ', 'phong_ban' => 'Phòng phục vụ', 'trang_thai' => 'Nghỉ phép'],
        ];

        $this->view('Staff/index', [
            'pageTitle' => 'Quản lý nhân viên',
            'pageSubtitle' => 'Quản lý thông tin và phân công nhân viên thư viện',
            'staff' => $staff,
            'staffCount' => count($staff),
        ], 'admin_Layout');
    }
}
?>