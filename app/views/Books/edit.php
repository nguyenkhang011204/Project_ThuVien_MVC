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
                <span class="badge rounded-pill text-bg-light text-primary mb-3 px-3 py-2">Chỉnh sửa sách</span>
                <h1 class="display-6 fw-semibold library-page-title mb-2">Chỉnh sửa sách</h1>
                <p class="lead mb-0 text-light">
                    Mã sách: <?= htmlspecialchars($book->MaSach ?? '-', ENT_QUOTES, 'UTF-8') ?>
                </p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a href="?url=book/detail&id=<?= htmlspecialchars($book["MaSach"], ENT_QUOTES, 'UTF-8') ?>"
                    class="btn btn-light fw-semibold shadow-sm px-4">← Quay lại</a>
            </div>
        </div>
    </div>
</section>

<div class="card library-card">
    <div class="card-body p-4 p-lg-5">
        <form method="POST" action="?url=book/update/<?= htmlspecialchars($book["MaSach"], ENT_QUOTES, 'UTF-8') ?>"
            class="needs-validation">
            <input type="hidden" name="MaSach" value="<?= htmlspecialchars($book["MaSach"], ENT_QUOTES, 'UTF-8') ?>">

            <div class="row mb-4">
                <div class="col-md-6">
                    <label for="ISBN" class="form-label fw-semibold">ISBN <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="ISBN" name="ISBN" required
                        value="<?= htmlspecialchars($book->ISBN ?? '', ENT_QUOTES, 'UTF-8') ?>">
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Mã sách (Không thể chỉnh sửa)</label>
                    <input type="text" class="form-control" disabled
                        value="<?= htmlspecialchars($book["MaSach"], ENT_QUOTES, 'UTF-8') ?>">
                </div>
            </div>

            <div class="mb-4">
                <label for="TenSach" class="form-label fw-semibold">Tên sách <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="TenSach" name="TenSach" required
                    value="<?= htmlspecialchars($book["TenSach"], ENT_QUOTES, 'UTF-8') ?>">
            </div>

            <div class="row mb-4">
                <div class="col-md-6">
                    <label for="MaTL" class="form-label fw-semibold">Danh mục <span class="text-danger">*</span></label>
                    <select class="form-select" id="MaTL" name="MaTL" required>
                        <option value="">-- Chọn danh mục --</option>
                        <?php foreach ($categories as $cat): ?>
                            <option value="<?= htmlspecialchars($cat->MaTL, ENT_QUOTES, 'UTF-8') ?>"
                                <?= ($book["MaTL"] === $cat->MaTL) ? 'selected' : '' ?>>
                                <?= htmlspecialchars($cat->TenTheLoai, ENT_QUOTES, 'UTF-8') ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="MaNXB" class="form-label fw-semibold">Nhà xuất bản <span
                            class="text-danger">*</span></label>
                    <select class="form-select" id="MaNXB" name="MaNXB" required>
                        <option value="">-- Chọn nhà xuất bản --</option>
                        <?php foreach ($publishers as $pub): ?>
                            <option value="<?= htmlspecialchars($pub->MaNXB, ENT_QUOTES, 'UTF-8') ?>"
                                <?= ($book["MaNXB"] === $pub->MaNXB) ? 'selected' : '' ?>>
                                <?= htmlspecialchars($pub->TenNXB, ENT_QUOTES, 'UTF-8') ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-md-6">
                    <label for="NamXuatBan" class="form-label fw-semibold">Năm xuất bản</label>
                    <input type="number" class="form-control" id="NamXuatBan" name="NamXuatBan" min="1900" max="2100"
                        value="<?= (int) ($book->NamXuatBan ?? '') ?>">
                </div>
                <div class="col-md-6">
                    <label for="NgonNgu" class="form-label fw-semibold">Ngôn ngữ</label>
                    <input type="text" class="form-control" id="NgonNgu" name="NgonNgu"
                        value="<?= htmlspecialchars($book->NgonNgu ?? '', ENT_QUOTES, 'UTF-8') ?>">
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-md-4">
                    <label for="Gia" class="form-label fw-semibold">Giá (VNĐ) <span class="text-danger">*</span></label>
                    <input type="number" class="form-control" id="Gia" name="Gia" required min="0"
                        value="<?= (int) ($book->Gia ?? 0) ?>">
                </div>
                <div class="col-md-4">
                    <label for="SoLuong" class="form-label fw-semibold">Số lượng <span
                            class="text-danger">*</span></label>
                    <input type="number" class="form-control" id="SoLuong" name="SoLuong" required min="0"
                        value="<?= (int) ($book->SoLuong ?? 0) ?>">
                </div>
                <div class="col-md-4">
                    <label for="SoLuongCon" class="form-label fw-semibold">Số lượng còn <span
                            class="text-danger">*</span></label>
                    <input type="number" class="form-control" id="SoLuongCon" name="SoLuongCon" required min="0"
                        value="<?= (int) ($book->SoLuongCon ?? 0) ?>">
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-md-6">
                    <label for="MaVT" class="form-label fw-semibold">Vị trí sách</label>
                    <select class="form-select" id="MaVT" name="MaVT">
                        <option value="">-- Chọn vị trí --</option>
                        <?php foreach ($locations as $loc): ?>
                            <option value="<?= htmlspecialchars($loc->MaVT, ENT_QUOTES, 'UTF-8') ?>"
                                <?= ($book["MaVT"] === $loc->MaVT) ? 'selected' : '' ?>>
                                Kệ <?= htmlspecialchars($loc->KeSach, ENT_QUOTES, 'UTF-8') ?> -
                                Tầng <?= htmlspecialchars($loc->Tang, ENT_QUOTES, 'UTF-8') ?> -
                                Ngăn <?= htmlspecialchars($loc->Ngan, ENT_QUOTES, 'UTF-8') ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="TinhTrang" class="form-label fw-semibold">Trạng thái</label>
                    <select class="form-select" id="TinhTrang" name="TinhTrang">
                        <option value="Còn" <?= ($book["TinhTrang"] === 'Còn') ? 'selected' : '' ?>>Còn</option>
                        <option value="Hết" <?= ($book["TinhTrang"] === 'Hết') ? 'selected' : '' ?>>Hết</option>
                        <option value="Ngừng phát hành" <?= ($book["TinhTrang"] === 'Ngừng phát hành') ? 'selected' : '' ?>>
                            Ngừng phát hành</option>
                    </select>
                </div>
            </div>

            <div class="mb-4">
                <label for="MoTa" class="form-label fw-semibold">Mô tả</label>
                <textarea class="form-control" id="MoTa" name="MoTa"
                    rows="4"><?= htmlspecialchars($book["MoTa"] ?? '', ENT_QUOTES, 'UTF-8') ?></textarea>
            </div>

            <div class="mb-4">
                <label for="HinhAnh" class="form-label fw-semibold">Hình ảnh (URL)</label>
                <input type="text" class="form-control" id="HinhAnh" name="HinhAnh"
                    value="<?= htmlspecialchars($book["HinhAnh"] ?? '', ENT_QUOTES, 'UTF-8') ?>">
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary fw-semibold px-5">💾 Cập nhật sách</button>
                <a href="?url=book/detail&id=<?= htmlspecialchars($book["MaSach"], ENT_QUOTES, 'UTF-8') ?>"
                    class="btn btn-outline-secondary fw-semibold px-5">Hủy</a>
            </div>
        </form>
    </div>
</div>