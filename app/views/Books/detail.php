<?php
$book = $book ?? null;
$categories = $categories ?? [];
$publishers = $publishers ?? [];
$locations = $locations ?? [];
$authors = $authors ?? [];
$bookAuthors = $bookAuthors ?? [];
?>

<section class="mb-4">
    <div class="library-hero rounded-4 p-4 p-lg-5 shadow-sm">
        <div class="row align-items-center g-4">
            <div class="col-lg-8">
                <span class="badge rounded-pill text-bg-light text-primary mb-3 px-3 py-2">Chi tiết sách</span>
                <h1 class="display-6 fw-semibold library-page-title mb-2">
                    <?= htmlspecialchars($book->TenSach ?? 'Chưa cập nhật', ENT_QUOTES, 'UTF-8') ?>
                </h1>
                <p class="lead mb-0 text-light">
                    ISBN: <?= htmlspecialchars($book->ISBN ?? '-', ENT_QUOTES, 'UTF-8') ?>
                </p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <div class="d-inline-flex flex-column align-items-lg-end gap-2">
                    <a href="?url=book/edit&id=<?= htmlspecialchars($book["MaSach"], ENT_QUOTES, 'UTF-8') ?>"
                        class="btn btn-light fw-semibold shadow-sm px-4">✏️ Chỉnh sửa</a>
                    <a href="?url=book" class="btn btn-outline-light fw-semibold px-4">← Quay lại</a>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="row g-4">
    <div class="col-lg-8">
        <div class="card library-card mb-4 overflow-hidden">
            <div class="card-header py-3 px-4">
                <h2 class="h5 mb-0">Thông tin sách</h2>
            </div>
            <div class="card-body p-4">
                <div class="row mb-4">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold text-muted mb-1">Mã sách</label>
                        <p class="text-primary fw-semibold">
                            <?= htmlspecialchars($book["MaSach"], ENT_QUOTES, 'UTF-8') ?>
                        </p>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold text-muted mb-1">ISBN</label>
                        <p><?= htmlspecialchars($book["ISBN"] ?? '-', ENT_QUOTES, 'UTF-8') ?></p>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold text-muted mb-1">Danh mục</label>
                        <p><?= htmlspecialchars($book["TenTheLoai"] ?? '-', ENT_QUOTES, 'UTF-8') ?></p>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold text-muted mb-1">Nhà xuất bản</label>
                        <p><?= htmlspecialchars($book["TenNXB"] ?? '-', ENT_QUOTES, 'UTF-8') ?></p>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold text-muted mb-1">Năm xuất bản</label>
                        <p><?= (int) ($book["NamXuatBan"] ?? 0) ?></p>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold text-muted mb-1">Ngôn ngữ</label>
                        <p><?= htmlspecialchars($book["NgonNgu"] ?? '-', ENT_QUOTES, 'UTF-8') ?></p>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-semibold text-muted mb-1">Mô tả</label>
                    <p><?= htmlspecialchars($book["MoTa"] ?? '-', ENT_QUOTES, 'UTF-8') ?></p>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-semibold text-muted mb-1">Tác giả</label>
                    <?php if (!empty($bookAuthors)): ?>
                        <div>
                            <?php foreach ($bookAuthors as $author): ?>
                                <span class="badge rounded-pill text-bg-info px-3 py-2 me-2 mb-2">
                                    <?= htmlspecialchars($author["TenTacGia"], ENT_QUOTES, 'UTF-8') ?>
                                </span>
                            <?php endforeach; ?>
                        </div>
                    <?php else: ?>
                        <p class="text-muted">Chưa có tác giả</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card library-card mb-4">
            <div class="card-header py-3 px-4">
                <h2 class="h5 mb-0">Thông tin kho</h2>
            </div>
            <div class="card-body p-4">
                <div class="mb-3">
                    <label class="form-label fw-semibold text-muted mb-1">Giá</label>
                    <p class="display-6 fw-semibold text-primary">
                        <?= number_format($book["Gia"] ?? 0, 0, '.', ',') ?> ₫
                    </p>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold text-muted mb-1">Tổng số lượng</label>
                    <p class="fs-5"><?= (int) ($book["SoLuong"] ?? 0) ?> quyển</p>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold text-muted mb-1">Số lượng còn</label>
                    <span class="badge rounded-pill text-bg-success px-3 py-2 fs-6">
                        <?= (int) ($book["SoLuongCon"] ?? 0) ?> quyển
                    </span>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold text-muted mb-1">Trạng thái</label>
                    <p>
                        <span class="badge rounded-pill text-bg-success px-3 py-2">
                            <?= htmlspecialchars($book["TinhTrang"] ?? 'Còn', ENT_QUOTES, 'UTF-8') ?>
                        </span>
                    </p>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold text-muted mb-1">Vị trí</label>
                    <p>
                        Kệ <strong><?= htmlspecialchars($book["KeSach"] ?? '-', ENT_QUOTES, 'UTF-8') ?></strong>,
                        Tầng <strong><?= htmlspecialchars($book["Tang"] ?? '-', ENT_QUOTES, 'UTF-8') ?></strong>,
                        Ngăn <strong><?= htmlspecialchars($book["Ngan"] ?? '-', ENT_QUOTES, 'UTF-8') ?></strong>
                    </p>
                </div>

                <hr class="my-3">

                <div class="mb-3">
                    <label class="form-label fw-semibold text-muted mb-1">Ngày tạo</label>
                    <p class="small text-muted">
                        <?= date('d/m/Y H:i', strtotime($book["NgayTao"] ?? 'now')) ?>
                    </p>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold text-muted mb-1">Cập nhật lần cuối</label>
                    <p class="small text-muted">
                        <?= date('d/m/Y H:i', strtotime($book["NgayCapNhat"] ?? 'now')) ?>
                    </p>
                </div>
            </div>
        </div>

        <a href="?url=book/delete&id=<?= htmlspecialchars($book["MaSach"], ENT_QUOTES, 'UTF-8') ?>"
            class="btn btn-danger w-100 fw-semibold" onclick="return confirm('Bạn chắc chắn muốn xóa sách này?');">
            🗑️ Xóa sách
        </a>
    </div>
</div>