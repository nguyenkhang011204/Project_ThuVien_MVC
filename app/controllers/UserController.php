<?php
class UserController extends Controller
{
    public function index()
    {
        $readers = [
            (object) ['ma_doc_gia' => 'DG001', 'ten_doc_gia' => 'Nguyễn Văn A', 'email' => 'vana@email.com', 'dien_thoai' => '0123456789', 'trang_thai' => 'Hoạt động', 'so_luong_dang_muon' => 3],
            (object) ['ma_doc_gia' => 'DG002', 'ten_doc_gia' => 'Trần Thị B', 'email' => 'thib@email.com', 'dien_thoai' => '0987654321', 'trang_thai' => 'Hoạt động', 'so_luong_dang_muon' => 1],
            (object) ['ma_doc_gia' => 'DG003', 'ten_doc_gia' => 'Lê Văn C', 'email' => 'vanc@email.com', 'dien_thoai' => '0912345678', 'trang_thai' => 'Tạm dừng', 'so_luong_dang_muon' => 0],
            (object) ['ma_doc_gia' => 'DG004', 'ten_doc_gia' => 'Phạm Thị D', 'email' => 'thid@email.com', 'dien_thoai' => '0934567890', 'trang_thai' => 'Hoạt động', 'so_luong_dang_muon' => 2],
        ];

        $this->view('Users/index', [
            'pageTitle' => 'Quản lý độc giả',
            'pageSubtitle' => 'Quản lý thông tin và hoạt động của các độc giả',
            'readers' => $readers,
            'readerCount' => count($readers),
        ], 'admin_Layout');
    }
}
?>