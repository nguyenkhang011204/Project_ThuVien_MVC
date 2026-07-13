<?php
$books = $books ?? [];

$normalize = function ($value, string $default = '-') {
    $value = trim((string) $value);

    return $value !== '' ? htmlspecialchars($value, ENT_QUOTES, 'UTF-8') : $default;
};

$countBooks = count($books);
$availableBooks = 0;
$pendingBooks = 0;
$featuredBooks = 0;

foreach ($books as $book) {
    $status = (string) ($book->trang_thai ?? $book->status ?? '');
    $stock = (int) ($book->so_luong ?? $book->quantity ?? 0);

    if ($stock > 0) {
        $availableBooks++;
    }

    if (stripos($status, 'duyet') !== false || stripos($status, 'cho') !== false) {
        $pendingBooks++;
    }

    if (stripos($status, 'hot') !== false || stripos($status, 'noi bat') !== false) {
        $featuredBooks++;
    }
}

if ($countBooks === 0) {
    $availableBooks = 0;
    $pendingBooks = 0;
    $featuredBooks = 0;
}
?>

<section class="mb-4">
    <div class="library-hero rounded-4 p-4 p-lg-5 shadow-sm">
        <div class="row align-items-center g-4">
            <div class="col-lg-8">
                <h1 class="display-6 fw-semibold library-page-title mb-2">Quản lý sách</h1>
                <p class="lead mb-0 text-light">
                    Theo dõi danh mục, tình trạng, số lượng và thao tác xử lý sách trong thư viện.
                </p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <div class="d-inline-flex flex-column align-items-lg-end gap-2">
                    <a href="#" class="btn btn-outline-light fw-semibold px-4">Nhập danh sách</a>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="row g-3 mb-4">
    <div class="col-md-3">
        <div class="card library-stat library-stat-primary h-100 position-relative">
            <div class="card-body p-4">
                <div class="small text-light opacity-75">Tổng sách</div>
                <div class="display-6 fw-semibold"><?= $countBooks ?></div>
                <div class="small">Trong hệ thống</div>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card library-stat library-stat-info h-100 position-relative">
            <div class="card-body p-4">
                <div class="small text-light opacity-75">Còn trong kho</div>
                <div class="display-6 fw-semibold"><?= $availableBooks ?></div>
                <div class="small">Có thể cho mượn</div>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card library-stat library-stat-secondary h-100 position-relative">
            <div class="card-body p-4">
                <div class="small text-light opacity-75">Chờ xử lý</div>
                <div class="display-6 fw-semibold"><?= $pendingBooks ?></div>
                <div class="small">Cần duyệt hoặc cập nhật</div>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card library-stat library-stat-primary h-100 position-relative">
            <div class="card-body p-4">
                <div class="small text-light opacity-75">Nổi bật</div>
                <div class="display-6 fw-semibold"><?= $featuredBooks ?></div>
                <div class="small">Sách đề xuất</div>
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
                    <span class="input-group-text bg-white text-primary border-end-0">
                        <i class="bi bi-search"></i>
                        <span class="ms-2">Tìm</span>
                    </span>
                    <input type="search" id="bookSearch" class="form-control border-start-0"
                        placeholder="ISBN, tên sách, tác giả...">
                </div>
            </div>

            <div class="col-12 col-xl-4">
                <label class="form-label fw-semibold mb-2">Bộ lọc nhanh</label>
                <div class="d-flex flex-wrap gap-2">
                    <button type="button" class="btn btn-outline-primary rounded-pill btn-sm px-3">Tất cả</button>
                    <button type="button" class="btn btn-outline-primary rounded-pill btn-sm px-3">Còn sách</button>
                    <button type="button" class="btn btn-outline-primary rounded-pill btn-sm px-3">Hết sách</button>
                    <button type="button" class="btn btn-outline-primary rounded-pill btn-sm px-3">Mới nhập</button>
                </div>
            </div>

            <div class="col-12 col-xl-3 text-xl-end">
                <label class="form-label fw-semibold mb-2 d-block">Thao tác</label>
                <div class="d-flex flex-wrap gap-2 justify-content-xl-end">
                    <a href="#" class="btn btn-primary rounded-pill px-4">+ Thêm sách</a>
                    <a href="#" class="btn btn-outline-secondary rounded-pill px-4">Xuất Excel</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card library-card overflow-hidden">
    <div class="card-header d-flex flex-wrap justify-content-between align-items-center gap-2 py-3 px-4">
        <div>
            <h2 class="h5 mb-0">Danh sách sách</h2>
            <small class="text-muted">Bố cục theo dạng bảng quản trị, dễ thao tác và lọc</small>
        </div>
        <span class="badge library-chip rounded-pill px-3 py-2"><?= $countBooks ?> bản ghi</span>
    </div>

    <div class="table-responsive">
        <table class="table align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th style="width: 120px;">ISBN</th>
                    <th>Tên sách</th>
                    <th>Tác giả</th>
                    <th class="text-center" style="width: 90px;">SL</th>
                    <th style="width: 150px;">Trạng thái</th>
                    <th class="text-end" style="width: 180px;">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($books)): ?>
                    <?php foreach ($books as $book): ?>
                        <?php
                        $isbn = $normalize($book->isbn ?? $book->ma_sach ?? '-');
                        $title = $normalize($book->ten_sach ?? $book->title ?? 'Chưa có tên');
                        $author = $normalize($book->tac_gia ?? $book->author ?? 'Chưa rõ tác giả');
                        $quantity = (int) ($book->so_luong ?? $book->quantity ?? 0);
                        $statusRaw = trim((string) ($book->trang_thai ?? $book->status ?? ''));

                        if ($statusRaw === '') {
                            $statusLabel = $quantity > 0 ? 'Còn sách' : 'Hết sách';
                        } else {
                            $statusLabel = htmlspecialchars($statusRaw, ENT_QUOTES, 'UTF-8');
                        }

                        $statusClass = $quantity > 0 ? 'text-bg-success' : 'text-bg-secondary';
                        if (stripos($statusRaw, 'cho') !== false || stripos($statusRaw, 'duyet') !== false) {
                            $statusClass = 'text-bg-warning';
                        }
                        ?>
                        <tr>
                            <td>
                                <span class="fw-semibold text-primary"><?= $isbn ?></span>
                            </td>
                            <td>
                                <div class="fw-semibold"><?= $title ?></div>
                                <small class="text-muted">Quản lý trong thư viện</small>
                            </td>
                            <td><?= $author ?></td>
                            <td class="text-center">
                                <span class="badge rounded-pill library-chip px-3 py-2"><?= $quantity ?></span>
                            </td>
                            <td>
                                <span class="badge rounded-pill <?= $statusClass ?> px-3 py-2"><?= $statusLabel ?></span>
                            </td>
                            <td class="text-end">
                                <div class="btn-group btn-group-sm" role="group" aria-label="Book actions">
                                    <a href="#" class="btn btn-outline-primary">Sửa</a>
                                    <a href="#" class="btn btn-outline-secondary">Xem</a>
                                    <a href="#" class="btn btn-outline-danger">Xóa</a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="text-center py-5">
                            <div class="text-muted mb-2">Chưa có dữ liệu sách.</div>
                            <a href="#" class="btn btn-primary rounded-pill px-4">+ Thêm sách đầu tiên</a>
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <div class="card-footer bg-white d-flex flex-wrap justify-content-between align-items-center gap-2 py-3 px-4">
        <small class="text-muted">Hiển thị <?= $countBooks ?> sách trong hệ thống</small>
        <nav aria-label="Book pagination">
            <ul class="pagination pagination-sm mb-0">
                <li class="page-item disabled"><span class="page-link">Trước</span></li>
                <li class="page-item active"><span class="page-link">1</span></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">Sau</a></li>
            </ul>
        </nav>
    </div>
</div>