<section class="mb-4">
    <div class="library-hero rounded-4 p-4 p-lg-5 shadow-sm">
        <div class="row align-items-center g-4">
            <div class="col-lg-8">
                <h1 class="display-6 fw-semibold library-page-title mb-2">Sửa thể loại</h1>
                <p class="lead mb-0 text-light">
                    Cập nhật thông tin cho thể loại
                    <strong
                        style="color: white"><?= htmlspecialchars($category['TenTheLoai'], ENT_QUOTES, 'UTF-8') ?></strong>.
                </p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a href="?url=category" class="btn btn-light fw-semibold shadow-sm px-4">← Quay lại</a>
            </div>
        </div>
    </div>
</section>

<div class="card library-card">
    <div class="card-body p-4 p-lg-5">
        <form method="POST"
            action="?url=category/update&id=<?= htmlspecialchars($category['MaTL'], ENT_QUOTES, 'UTF-8') ?>"
            class="needs-validation">
            <div class="row mb-4">
                <div class="col-md-6">
                    <label for="MaTL" class="form-label fw-semibold">Mã thể loại <span
                            class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="MaTL" name="MaTL" required
                        value="<?= htmlspecialchars($category['MaTL'], ENT_QUOTES, 'UTF-8') ?>" readonly>
                </div>
                <div class="col-md-6">
                    <label for="TenTheLoai" class="form-label fw-semibold">Tên thể loại <span
                            class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="TenTheLoai" name="TenTheLoai" required
                        value="<?= htmlspecialchars($category['TenTheLoai'], ENT_QUOTES, 'UTF-8') ?>">
                </div>
            </div>

            <div class="mb-4">
                <label for="MoTa" class="form-label fw-semibold">Mô tả</label>
                <textarea class="form-control" id="MoTa" name="MoTa" rows="3"
                    placeholder="Nhập mô tả thể loại"><?= htmlspecialchars($category['MoTa'], ENT_QUOTES, 'UTF-8') ?></textarea>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary fw-semibold px-5">💾 Lưu thể loại</button>
                <a href="?url=category" class="btn btn-outline-secondary fw-semibold px-5">Hủy</a>
            </div>
        </form>
    </div>
</div>