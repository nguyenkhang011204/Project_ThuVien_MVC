<?php
$readers = $readers ?? [];
$readerCount = $readerCount ?? count($readers);

$statCards = [
    ['label' => 'Độc giả', 'value' => $readerCount, 'icon' => '👥', 'class' => 'library-stat-primary'],
    ['label' => 'Đang hoạt động', 'value' => 3, 'icon' => '✅', 'class' => 'library-stat-info'],
    ['label' => 'Tạm dừng', 'value' => 1, 'icon' => '⏸️', 'class' => 'library-stat-secondary'],
    ['label' => 'Phiếu vi phạm', 'value' => 2, 'icon' => '⚠️', 'class' => 'library-stat-primary'],
];
?>

<section class="mb-4">
    <div class="library-hero rounded-4 p-4 p-lg-5 shadow-sm">
        <div class="row align-items-center g-4">
            <div class="col-lg-8">
                <h1 class="display-6 fw-semibold library-page-title mb-2">Quản lý độc giả</h1>
                <p class="lead mb-0 text-light">
                    Quản lý thông tin và hoạt động của các độc giả trong hệ thống.
                </p>
            </div>

        </div>
    </div>
</section>

<div class="row g-3 mb-4">
    <?php foreach ($statCards as $card): ?>
        <div class="col-12 col-md-6 col-xl-3">
            <div class="card <?= $card['class'] ?> h-100 position-relative">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <span class="fs-4"><?= $card['icon'] ?></span>
                        <span class="badge rounded-pill text-bg-light text-primary">Thống kê</span>
                    </div>
                    <div class="small text-light opacity-75 mb-1">
                        <?= htmlspecialchars($card['label'], ENT_QUOTES, 'UTF-8') ?>
                    </div>
                    <div class="display-6 fw-semibold mb-0"><?= (int) $card['value'] ?></div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<div class="card library-card mb-4">
    <div class="card-body p-4 p-lg-5">
        <div class="row g-3 align-items-center">
            <div class="col-12 col-xl-5">
                <label for="readerSearch" class="form-label fw-semibold mb-2">Tìm kiếm nhanh</label>
                <div class="input-group shadow-sm">
                    <span class="input-group-text bg-white text-primary border-end-0">🔎</span>
                    <input type="search" id="readerSearch" class="form-control border-start-0"
                        placeholder="Mã độc giả, tên, email, điện thoại...">
                </div>
            </div>

            <div class="col-12 col-xl-4">
                <label class="form-label fw-semibold mb-2">Bộ lọc</label>
                <div class="d-flex flex-wrap gap-2">
                    <button type="button" class="btn btn-outline-primary rounded-pill btn-sm px-3">Tất cả</button>
                    <button type="button" class="btn btn-outline-primary rounded-pill btn-sm px-3">Hoạt động</button>
                    <button type="button" class="btn btn-outline-primary rounded-pill btn-sm px-3">Tạm dừng</button>
                    <button type="button" class="btn btn-outline-primary rounded-pill btn-sm px-3">Vi phạm</button>
                </div>
            </div>

            <div class="col-12 col-xl-3 text-xl-end">
                <label class="form-label fw-semibold mb-2 d-block">Thao tác</label>
                <div class="d-flex flex-wrap gap-2 justify-content-xl-end">
                    <a href="#" class="btn btn-primary rounded-pill px-4">+ Thêm độc giả</a>
                    <a href="#" class="btn btn-outline-secondary rounded-pill px-4">Xuất Excel</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card library-card overflow-hidden">
    <div class="card-header d-flex flex-wrap justify-content-between align-items-center gap-2 py-3 px-4">
        <div>
            <h2 class="h5 mb-0">Danh sách độc giả</h2>
            <small class="text-muted">Quản lý thông tin và trạng thái độc giả</small>
        </div>
        <span class="badge library-chip rounded-pill px-3 py-2"><?= (int) $readerCount ?> bản ghi</span>
    </div>

    <div class="table-responsive">
        <table class="table align-middle mb-0">
            <thead class="table-light">
                <tr class="text-center">
                    <th style="width: 110px;">Mã độc giả</th>
                    <th style="width: 110px;">Mã người dùng</th>
                    <th style="width: 200px;">Họ và tên</th>
                    <th style=" width: 160px;">Ngày sinh</th>
                    <th style="width: 120px;">Giới tính</th>
                    <th style="width: 100px;">SDT</th>
                    <th style="width: 120px;">Địa chỉ</th>
                    <th style="width: 120px">Ngày đăng ký</th>
                    <th style="width: 150px;">Thao tác</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <?php if (!empty($users)): ?>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td class="fw-semibold text-primary">
                                <?= htmlspecialchars($user['MaDG'] ?? '-', ENT_QUOTES, 'UTF-8') ?>
                            </td>
                            <td class="fw-semibold text-primary">
                                <?= htmlspecialchars($user['MaND'] ?? '-', ENT_QUOTES, 'UTF-8') ?>
                            </td>
                            <td>
                                <div class="fw-semibold">
                                    <?= htmlspecialchars($user['HoTen'] ?? '-', ENT_QUOTES, 'UTF-8') ?>
                                </div>
                            </td>
                            <td class="text-muted">
                                <?= htmlspecialchars($user['Email'] ?? '-', ENT_QUOTES, 'UTF-8') ?>
                            </td>
                            <td>
                                <?= htmlspecialchars($user['SDT'] ?? '-', ENT_QUOTES, 'UTF-8') ?>
                            </td>

                            <td>

                            </td>
                            <td>
                                <div class="btn-group btn-group-sm" role="group">
                                    <a href="#" class="btn btn-outline-primary">Xem</a>
                                    <a href="#" class="btn btn-outline-secondary">Sửa</a>
                                    <a href="#" class="btn btn-outline-danger">Xóa</a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7" class="text-center py-5">
                            <div class="text-muted mb-2">Chưa có độc giả nào.</div>
                            <a href="#" class="btn btn-primary rounded-pill px-4">+ Thêm độc giả đầu tiên</a>
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <div class="card-footer bg-white d-flex flex-wrap justify-content-between align-items-center gap-2 py-3 px-4">
        <small class="text-muted">Hiển thị <?= (int) $readerCount ?> độc giả trong hệ thống</small>
        <nav aria-label="Reader pagination">
            <ul class="pagination pagination-sm mb-0">
                <li class="page-item disabled"><span class="page-link">Trước</span></li>
                <li class="page-item active"><span class="page-link">1</span></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">Sau</a></li>
            </ul>
        </nav>
    </div>
</div>