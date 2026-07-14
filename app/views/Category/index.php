<?php
$books = $books ?? [];
$bookCount = $bookCount ?? 0;
$availableCount = $availableCount ?? 0;
$unavailableCount = $unavailableCount ?? 0;
?>

<section class="mb-4">
    <div class="library-hero rounded-4 p-4 p-lg-5 shadow-sm">
        <div class="row align-items-center g-4">
            <div class="col-lg-8">
                <h1 class="display-6 fw-semibold library-page-title mb-2">Quản lý thể loại</h1>
                <p class="lead mb-0 text-light">
                    Theo dõi danh mục, tình trạng, số lượng và thao tác xử lý thể loại trong thư viện.
                </p>
            </div>
        </div>
    </div>
</section>

<div class="row g-3 mb-4">
    <div class="col-12 col-md-6 col-xl-3">
        <div class="card library-stat-primary h-100 position-relative">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <span class="fs-4">📚</span>
                    <span class="badge rounded-pill text-bg-light text-primary">Thống kê</span>
                </div>
                <div class="small text-light opacity-75 mb-1">Tổng sách</div>
                <div class="display-6 fw-semibold mb-0"><?= (int) $bookCount ?></div>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-6 col-xl-3">
        <div class="card library-stat-info h-100 position-relative">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <span class="fs-4">✅</span>
                    <span class="badge rounded-pill text-bg-light text-primary">Thống kê</span>
                </div>
                <div class="small text-light opacity-75 mb-1">Còn trong kho</div>
                <div class="display-6 fw-semibold mb-0"><?= (int) $availableCount ?></div>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-6 col-xl-3">
        <div class="card library-stat-secondary h-100 position-relative">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <span class="fs-4">❌</span>
                    <span class="badge rounded-pill text-bg-light text-primary">Thống kê</span>
                </div>
                <div class="small text-light opacity-75 mb-1">Hết trong kho</div>
                <div class="display-6 fw-semibold mb-0"><?= (int) $unavailableCount ?></div>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-6 col-xl-3">
        <div class="card library-stat-primary h-100 position-relative">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <span class="fs-4">⭐</span>
                    <span class="badge rounded-pill text-bg-light text-primary">Thống kê</span>
                </div>
                <div class="small text-light opacity-75 mb-1">Tỷ lệ sách còn</div>
                <div class="display-6 fw-semibold mb-0">
                    <?= $bookCount > 0 ? round(($availableCount / $bookCount) * 100) : 0 ?>%
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card library-card mb-4">
    <div class="card-body p-4 p-lg-5">
        <div class="row g-3 align-items-center">
            <div class="col-12 col-xl-5">
                <label for="bookSearch" class="form-label fw-semibold mb-2">Tìm kiếm nhanh</label>
                <div class="input-group shadow-sm">
                    <span class="input-group-text bg-white text-primary border-end-0">🔎</span>
                    <input type="search" id="bookSearch" class="form-control border-start-0"
                        placeholder="Tên thể loại....">
                </div>
            </div>

            <div class="col-12 col-xl-4">
                <label class="form-label fw-semibold mb-2">Bộ lọc nhanh</label>
                <div class="d-flex flex-wrap gap-2">
                    <button type="button" class="btn btn-outline-primary rounded-pill btn-sm px-3">Tất cả</button>
                </div>
            </div>

            <div class="col-12 col-xl-3 text-xl-end">
                <label class="form-label fw-semibold mb-2 d-block">Thao tác</label>
                <div class="d-flex flex-wrap gap-2 justify-content-xl-end">
                    <a href="?url=category/create" class="btn btn-primary rounded-pill px-4">+ Thêm thể loại</a>
                    <a href="#" class="btn btn-outline-secondary rounded-pill px-4">Xuất Excel</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card library-card overflow-hidden">
    <div class="card-header d-flex flex-wrap justify-content-between align-items-center gap-2 py-3 px-4">
        <div>
            <h2 class="h5 mb-0">Danh sách thể loại</h2>
            <small class="text-muted">Quản lý thể loại, mô tả và tình trạng</small>
        </div>
        <span class="badge library-chip rounded-pill px-3 py-2"><?= (int) $categoryCount ?> bản ghi</span>
    </div>

    <div class="table-responsive text-center">
        <table class="table align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th style="width: 110px;">Mã thể loại</th>
                    <th style="width: 150px;">Tên thể loại</th>
                    <th style="width: 250px;">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($categories)): ?>
                    <?php foreach ($categories as $category): ?>
                        <tr>
                            <td class="fw-semibold text-primary">
                                <?= htmlspecialchars($category["MaTL"] ?? '-', ENT_QUOTES, 'UTF-8') ?>
                            </td>
                            <td>
                                <div class="fw-semibold">
                                    <?= htmlspecialchars($category["TenTheLoai"] ?? '-', ENT_QUOTES, 'UTF-8') ?>
                                </div>
                                <small class="text-muted">
                                    <?= htmlspecialchars($category["MoTa"] ?? 'Không có mô tả', ENT_QUOTES, 'UTF-8') ?>
                                </small>
                            </td>

                            <td class="text-center">
                                <div class="btn-group btn-group-sm" role="group">
                                    <a href="?url=category/edit&id=<?= urlencode($category['MaTL']) ?>"
                                        class="btn btn-outline-secondary">
                                        Sửa
                                    </a>
                                    <a href="?url=category/delete&id=<?= htmlspecialchars($category["MaTL"], ENT_QUOTES, 'UTF-8') ?>"
                                        class="btn btn-outline-danger"
                                        onclick="return confirm('Bạn chắc chắn muốn xóa thể loại này?');">Xóa</a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7" class="text-center py-5">
                            <div class="text-muted mb-2">Chưa có thể loại nào trong hệ thống.</div>
                            <a href="?url=category/create" class="btn btn-primary rounded-pill px-4">+ Thêm thể loại đầu
                                tiên</a>
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <div class="card-footer bg-white d-flex flex-wrap justify-content-between align-items-center gap-2 py-3 px-4">
        <small class="text-muted">Hiển thị <?= (int) $categoryCount ?> thể loại trong hệ thống</small>
        <nav aria-label="Category pagination">
            <ul class="pagination pagination-sm mb-0">
                <li class="page-item disabled"><span class="page-link">Trước</span></li>
                <li class="page-item active"><span class="page-link">1</span></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">Sau</a></li>
            </ul>
        </nav>
    </div>
</div>