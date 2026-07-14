<?php
$activeSetKey = 'the-loai';
?>

<section class="mb-4">
    <div class="library-hero rounded-4 p-4 p-lg-5 shadow-sm">
        <div class="row align-items-center g-4">
            <div class="col-lg-8">
                <h1 class="display-6 fw-semibold library-page-title mb-2">Quản lý danh mục</h1>
                <p class="lead mb-0 text-light">
                    Quản lý các dữ liệu nền của hệ thống thư viện.
                </p>
            </div>

        </div>
    </div>
</section>

<div class="row g-3 mb-4">
    <?php foreach ($summaryCards as $card): ?>
        <div class="col-12 col-md-6 col-xl-3">
            <div class="card library-stat library-stat-primary h-100 position-relative overflow-hidden">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <span class="fs-4">
                            <?= $card['icon'] ?>
                        </span>
                        <span class="badge rounded-pill text-bg-light text-primary">Tổng hợp</span>
                    </div>
                    <div class="large text-light opacity-75 mb-1">
                        <?= htmlspecialchars($card['label'], ENT_QUOTES, 'UTF-8') ?>
                    </div>
                    <div class="display-6 fw-semibold mb-0">
                        <?= (int) $card['value'] ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<div class="card library-card mb-4">
    <div class="card-body p-4 p-lg-5">
        <div class="row g-3 align-items-center">
            <div class="col-12 col-lg-5">
                <label for="categorySearch" class="form-label fw-semibold mb-2">Tìm kiếm</label>
                <div class="input-group shadow-sm">
                    <span class="input-group-text bg-white text-primary border-end-0">🔎</span>
                    <input type="search" id="categorySearch" class="form-control border-start-0"
                        placeholder="Tìm kiếm...">
                </div>
            </div>

            <div class="col-12 col-lg-4">
                <label class="form-label fw-semibold mb-2">Phân loại</label>
                <div class="nav nav-pills flex-wrap gap-2 library-filter-tabs" id="categoryTabs" role="tablist">
                    <?php foreach ($categorySets as $key => $set): ?>
                        <button class="nav-link rounded-pill px-3 <?= $key === $activeSetKey ? 'active' : '' ?>" id="tab-<?= $key ?>"
                            data-bs-toggle="pill" data-bs-target="#pane-<?= $key ?>" type="button" role="tab"
                            aria-controls="pane-<?= $key ?>" aria-selected="<?= $key === $activeSetKey ? 'true' : 'false' ?>">
                            <?= htmlspecialchars($set['button'], ENT_QUOTES, 'UTF-8') ?>
                        </button>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="col-12 col-lg-3 text-lg-end">
                <label class="form-label fw-semibold mb-2 d-block">Thao tác</label>
                <a href="#" class="btn btn-primary rounded-pill px-4">+ Thêm danh mục</a>
            </div>
        </div>
    </div>
</div>

<div class="card library-card overflow-hidden">
    <div class="card-header d-flex flex-wrap justify-content-between align-items-center gap-2 py-3 px-4">
        <div>
            <h2 class="h5 mb-0">Danh sách phân loại</h2>
            <small class="text-muted">Click vào từng tab để xem toàn bộ dữ liệu tương ứng</small>
        </div>
        <span class="badge library-chip rounded-pill px-3 py-2">4 nhóm dữ liệu</span>
    </div>

    <div class="tab-content text-center">
        <?php foreach ($categorySets as $key => $set): ?>
            <div class="tab-pane fade <?= $key === $activeSetKey ? 'show active' : '' ?>" id="pane-<?= $key ?>" role="tabpanel"
                aria-labelledby="tab-<?= $key ?>" tabindex="0">
                <div class="table-responsive">
                    <table class="table align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th style="width: 120px;">Mã</th>
                                <th style="width: 200px;">Tên <?= htmlspecialchars(mb_strtolower($set['title']), ENT_QUOTES, 'UTF-8') ?></th>
                                <th style="width: 300px;">Mô tả</th>
                                <th style="width: 120px;">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($set['records'])): ?>
                                <?php foreach ($set['records'] as $record): ?>
                                    <tr>
                                        <td class="fw-semibold text-primary">
                                            <?= htmlspecialchars($record['code'], ENT_QUOTES, 'UTF-8') ?>
                                        </td>
                                        <td>
                                            <div class="fw-semibold">
                                                <?= htmlspecialchars($record['name'], ENT_QUOTES, 'UTF-8') ?>
                                            </div>
                                            <small class="text-muted"><?= htmlspecialchars($set['title'], ENT_QUOTES, 'UTF-8') ?></small>
                                        </td>
                                        <td class="text-muted">
                                            <?= htmlspecialchars($record['description'], ENT_QUOTES, 'UTF-8') ?>
                                        </td>
                                        <td>
                                            <div class="d-flex gap-2 text-center justify-content-center">
                                                <a href="#" class="btn btn-outline-primary btn-sm">✏️</a>
                                                <a href="#" class="btn btn-outline-danger btn-sm">🗑️</a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="4" class="text-center py-5">
                                        <div class="text-muted mb-2">Chưa có dữ liệu trong nhóm này.</div>
                                        <a href="#" class="btn btn-primary rounded-pill px-4"><?= htmlspecialchars($set['addLabel'], ENT_QUOTES, 'UTF-8') ?></a>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="card-footer bg-white d-flex flex-wrap justify-content-between align-items-center gap-2 py-3 px-4">
        <small class="text-muted">Hiển thị dữ liệu theo tab đã chọn</small>
        <nav aria-label="Pagination category">
            <ul class="pagination pagination-sm mb-0">
                <li class="page-item disabled"><span class="page-link">&lt;</span></li>
                <li class="page-item active"><span class="page-link">1</span></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">&gt;</a></li>
            </ul>
        </nav>
    </div>
</div>