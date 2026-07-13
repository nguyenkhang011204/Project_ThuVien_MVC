<?php
class CategoryController extends Controller
{
    public function index()
    {
        $categorySets = [
            'the-loai' => [
                'title' => 'Thể loại',
                'button' => 'Thể loại',
                'addLabel' => '+ Thêm thể loại',
                'records' => [
                    ['code' => 'TL001', 'name' => 'Công nghệ thông tin', 'description' => 'Sách về lập trình, phần mềm và hệ thống'],
                    ['code' => 'TL002', 'name' => 'Văn học', 'description' => 'Tác phẩm văn học trong và ngoài nước'],
                    ['code' => 'TL003', 'name' => 'Kinh tế', 'description' => 'Sách về quản trị, kinh doanh, tài chính'],
                ],
            ],
            'tac-gia' => [
                'title' => 'Tác giả',
                'button' => 'Tác giả',
                'addLabel' => '+ Thêm tác giả',
                'records' => [
                    ['code' => 'TG001', 'name' => 'Nguyễn Nhật Ánh', 'description' => 'Văn học thiếu nhi và tuổi mới lớn'],
                    ['code' => 'TG002', 'name' => 'Martin Fowler', 'description' => 'Chuyên gia phần mềm và refactoring'],
                    ['code' => 'TG003', 'name' => 'Robert C. Martin', 'description' => 'Tác giả Clean Code'],
                ],
            ],
            'nxb' => [
                'title' => 'Nhà xuất bản',
                'button' => 'NXB',
                'addLabel' => '+ Thêm nhà xuất bản',
                'records' => [
                    ['code' => 'NXB001', 'name' => 'NXB Trẻ', 'description' => 'Đơn vị phát hành nhiều đầu sách phổ biến'],
                    ['code' => 'NXB002', 'name' => 'NXB Kim Đồng', 'description' => 'Ấn phẩm thiếu nhi và giáo dục'],
                    ['code' => 'NXB003', 'name' => 'NXB Thống Kê', 'description' => 'Sách chuyên khảo và nghiên cứu'],
                ],
            ],
            'vi-tri' => [
                'title' => 'Vị trí',
                'button' => 'Vị trí',
                'addLabel' => '+ Thêm vị trí',
                'records' => [
                    ['code' => 'VT001', 'name' => 'Tầng 1 - Khu A', 'description' => 'Khu vực trưng bày sách mới'],
                    ['code' => 'VT002', 'name' => 'Tầng 2 - Khu B', 'description' => 'Khu vực sách tham khảo'],
                    ['code' => 'VT003', 'name' => 'Kho lưu trữ', 'description' => 'Lưu sách ít sử dụng'],
                ],
            ],
        ];

        $summaryCards = [
            ['label' => 'Thể loại', 'value' => count($categorySets['the-loai']['records']), 'icon' => '📚'],
            ['label' => 'Tác giả', 'value' => count($categorySets['tac-gia']['records']), 'icon' => '✍️'],
            ['label' => 'NXB', 'value' => count($categorySets['nxb']['records']), 'icon' => '🏢'],
            ['label' => 'Vị trí', 'value' => count($categorySets['vi-tri']['records']), 'icon' => '📍'],
        ];

        $this->view('Category/index', [
            'pageTitle' => 'Quản lý danh mục',
            'pageSubtitle' => 'Quản lý các dữ liệu nền của hệ thống thư viện',
            'categories' => $categorySets,
            'categoryCount' => count($categorySets),
            'categorySets' => $categorySets,
            'summaryCards' => $summaryCards,
        ], 'admin_Layout');
    }
}
?>