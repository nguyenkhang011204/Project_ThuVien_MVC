<?php
class AccountController extends Controller
{
    public function index()
    {
        $accounts = [
            (object) ['id' => 1, 'ten_tai_khoan' => 'admin', 'email' => 'admin@thuvien.com', 'vai_tro' => 'Quản trị viên', 'trang_thai' => 'Hoạt động', 'lan_dang_nhap_cuoi' => '2024-07-14 10:30'],
            (object) ['id' => 2, 'ten_tai_khoan' => 'editor', 'email' => 'editor@thuvien.com', 'vai_tro' => 'Biên tập viên', 'trang_thai' => 'Hoạt động', 'lan_dang_nhap_cuoi' => '2024-07-13 15:20'],
            (object) ['id' => 3, 'ten_tai_khoan' => 'staff1', 'email' => 'staff1@thuvien.com', 'vai_tro' => 'Nhân viên', 'trang_thai' => 'Hoạt động', 'lan_dang_nhap_cuoi' => '2024-07-14 08:15'],
            (object) ['id' => 4, 'ten_tai_khoan' => 'guest', 'email' => 'guest@thuvien.com', 'vai_tro' => 'Khách', 'trang_thai' => 'Khóa', 'lan_dang_nhap_cuoi' => '2024-07-01 14:00'],
        ];

        $this->view('Accounts/index', [
            'pageTitle' => 'Quản lý tài khoản',
            'pageSubtitle' => 'Quản lý tài khoản người dùng và phân quyền',
            'accounts' => $accounts,
            'accountCount' => count($accounts),
        ], 'admin_Layout');
    }
}
?>