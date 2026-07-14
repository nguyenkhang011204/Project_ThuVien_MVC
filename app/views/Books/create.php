<?php
$categories = $categories ?? [];
$publishers = $publishers ?? [];
$locations = $locations ?? [];
$authors = $authors ?? [];
?>

<section class="mb-4">
    <div class="library-hero rounded-4 p-4 p-lg-5 shadow-sm">
        <div class="row align-items-center g-4">
            <div class="col-lg-8">
                <span class="badge rounded-pill text-bg-light text-primary mb-3 px-3 py-2">Thêm sách mới</span>
                <h1 class="display-6 fw-semibold library-page-title mb-2">Thêm sách mới</h1>
                <p class="lead mb-0 text-light">
                    Nhập thông tin chi tiết cho quyển sách mới
                </p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a href="?url=book" class="btn btn-light fw-semibold shadow-sm px-4">← Quay lại</a>
            </div>
        </div>
    </div>
</section>

<div class="card library-card">
    <div class="card-body p-4 p-lg-5">
        <form method="POST" action="?url=book/store" class="needs-validation">
            <div class="row mb-4">
                <div class="col-md-6">
                    <label for="MaSach" class="form-label fw-semibold">Mã sách <span
                            class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="MaSach" name="MaSach" required
                        placeholder="Ví dụ: S001">
                </div>
                <div class="col-md-6">
                    <label for="ISBN" class="form-label fw-semibold">ISBN <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="ISBN" name="ISBN" required
                        placeholder="Ví dụ: 9786041000001">
                </div>
            </div>

            <div class="mb-4">
                <label for="TenSach" class="form-label fw-semibold">Tên sách <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="TenSach" name="TenSach" required
                    placeholder="Nhập tên sách">
            </div>

            <div class="row mb-4">
                <div class="col-md-6">
                    <label for="MaTL" class="form-label fw-semibold">Danh mục <span class="text-danger">*</span></label>
                    <select class="form-select" id="MaTL" name="MaTL" required>
                        <option value="">-- Chọn danh mục --</option>
                        <?php foreach ($categories as $cat): ?>
                            <option value="<?= htmlspecialchars($cat->MaTL, ENT_QUOTES, 'UTF-8') ?>">
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
                            <option value="<?= htmlspecialchars($pub->MaNXB, ENT_QUOTES, 'UTF-8') ?>">
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
                        placeholder="2024">
                </div>
                <div class="col-md-6">
                    <label for="NgonNgu" class="form-label fw-semibold">Ngôn ngữ</label>
                    <input type="text" class="form-control" id="NgonNgu" name="NgonNgu" placeholder="Tiếng Việt">
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-md-4">
                    <label for="Gia" class="form-label fw-semibold">Giá (VNĐ) <span class="text-danger">*</span></label>
                    <input type="number" class="form-control" id="Gia" name="Gia" required min="0" placeholder="100000">
                </div>
                <div class="col-md-4">
                    <label for="SoLuong" class="form-label fw-semibold">Số lượng <span
                            class="text-danger">*</span></label>
                    <input type="number" class="form-control" id="SoLuong" name="SoLuong" required min="0"
                        placeholder="10">
                </div>
                <div class="col-md-4">
                    <label for="SoLuongCon" class="form-label fw-semibold">Số lượng còn <span
                            class="text-danger">*</span></label>
                    <input type="number" class="form-control" id="SoLuongCon" name="SoLuongCon" required min="0"
                        placeholder="10">
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-md-6">
                    <label for="MaVT" class="form-label fw-semibold">Vị trí sách</label>
                    <select class="form-select" id="MaVT" name="MaVT">
                        <option value="">-- Chọn vị trí --</option>
                        <?php foreach ($locations as $loc): ?>
                            <option value="<?= htmlspecialchars($loc->MaVT, ENT_QUOTES, 'UTF-8') ?>">
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
                        <option value="Còn">Còn</option>
                        <option value="Hết">Hết</option>
                        <option value="Ngừng phát hành">Ngừng phát hành</option>
                    </select>
                </div>
            </div>

            <div class="mb-4">
                <label for="MoTa" class="form-label fw-semibold">Mô tả</label>
                <textarea class="form-control" id="MoTa" name="MoTa" rows="4"
                    placeholder="Nhập mô tả về sách..."></textarea>
            </div>

            <div class="mb-4">
                <label for="HinhAnh" class="form-label fw-semibold">Hình ảnh (URL)</label>
                <input type="text" class="form-control" id="HinhAnh" name="HinhAnh"
                    placeholder="https://example.com/image.jpg">
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary fw-semibold px-5">💾 Lưu sách</button>
                <a href="?url=book" class="btn btn-outline-secondary fw-semibold px-5">Hủy</a>
            </div>
        </form>
    </div>
</div>