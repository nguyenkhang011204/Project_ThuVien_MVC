<?php
$currentRoute = strtolower(trim($_GET['url'] ?? 'home', '/'));
$currentRoute = explode('/', $currentRoute)[0] ?? 'home';

$isActive = function (array $routes) use ($currentRoute): string {
    return in_array($currentRoute, $routes, true)
        ? ' active'
        : '';
};

$currentLabelMap = [
    'home' => 'Tổng quan',
    'dashboard' => 'Tổng quan',
    'book' => 'Quản lý sách',
    'books' => 'Quản lý sách',
    'category' => 'Quản lý danh mục',
    'categories' => 'Quản lý danh mục',
    'reader' => 'Quản lý độc giả',
    'readers' => 'Quản lý độc giả',
    'borrow' => 'Phiếu mượn trả',
    'report' => 'Báo cáo',
    'setting' => 'Cài đặt hệ thống',
    'settings' => 'Cài đặt hệ thống',
];

$currentLabel = $currentLabelMap[$currentRoute] ?? 'Tổng quan';
?>

<aside class="col-12 col-lg-3 col-xl-2 library-sidebar px-0 admin-sidebar">
    <div class="p-4 border-bottom">
        <div class="fw-semibold text-uppercase small text-primary-emphasis">Bảng điều khiển</div>
        <div class="fs-5 fw-bold library-page-title">Thư viện</div>
        <div class="small text-muted mt-1">Quản lý nội dung, độc giả và phiếu mượn</div>
        <div class="mt-3">
            <span class="badge rounded-pill text-bg-primary px-3 py-2">Đang ở trang:
                <?= htmlspecialchars($currentLabel, ENT_QUOTES, 'UTF-8') ?></span>
        </div>
    </div>
    <div class="list-group list-group-flush rounded-0 px-3 py-3 gap-2">
        <a href="?url=home"
            class="list-group-item list-group-item-action rounded-3<?= $isActive(['home', 'dashboard']) ?>">Tổng
            quan</a>
        <a href="?url=book"
            class="list-group-item list-group-item-action rounded-3<?= $isActive(['book', 'books']) ?>">Quản lý sách</a>
        <a href="?url=category"
            class="list-group-item list-group-item-action rounded-3<?= $isActive(['category', 'categories']) ?>">Quản lý
            danh mục</a>
        <a href="?url=reader"
            class="list-group-item list-group-item-action rounded-3<?= $isActive(['reader', 'readers']) ?>">Quản lý độc
            giả</a>
        <a href="?url=borrow" class="list-group-item list-group-item-action rounded-3<?= $isActive(['borrow']) ?>">Phiếu
            mượn trả</a>
        <a href="?url=report" class="list-group-item list-group-item-action rounded-3<?= $isActive(['report']) ?>">Báo
            cáo</a>
        <a href="?url=setting"
            class="list-group-item list-group-item-action rounded-3<?= $isActive(['setting', 'settings']) ?>">Cài đặt hệ
            thống</a>
    </div>
</aside>