<?php
$categories = $categories ?? [];
$publishers = $publishers ?? [];
$locations = $locations ?? [];
$authors = $authors ?? [];
$roles = [
    'admin' => 'Quản trị viên',
    'staff' => 'Thủ thư',
];
?>

<section class="mb-4">
    <div class="library-hero rounded-4 p-4 p-lg-5 shadow-sm">
        <div class="row align-items-center g-4">
            <div class="col-lg-8">
                <h1 class="display-6 fw-semibold library-page-title mb-2">Thêm nhân viên mới</h1>
                <p class="lead mb-0 text-light">
                    Nhập thông tin chi tiết cho nhân viên mới
                </p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a href="?url=staff" class="btn btn-light fw-semibold shadow-sm px-4">← Quay lại</a>
            </div>
        </div>
    </div>
</section>

<div class="card library-card">
    <div class="card-body p-4 p-lg-5">
        <form method="POST" action="?url=staff/store" class="needs-validation">
            <div class="row mb-4">
                <div class="col-md-6">
                    <label for="MaNV" class="form-label fw-semibold">Mã nhân viên <span
                            class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="MaNV" name="MaNV" required placeholder="Ví dụ: NV001">
                </div>
                <div class="col-md-6">
                    <label for="HoTen" class="form-label fw-semibold">Họ tên <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="HoTen" name="HoTen" required placeholder="Nhập họ tên">
                </div>
            </div>

            <div class="mb-4">
                <label for="NgaySinh" class="form-label fw-semibold">Ngày sinh <span
                        class="text-danger">*</span></label>
                <input type="date" class="form-control" id="NgaySinh" name="NgaySinh" required>
            </div>

            <div class="mb-4">
                <label for="GioiTinh" class="form-label fw-semibold">Giới tính <span
                        class="text-danger">*</span></label>
                <select class="form-select" id="GioiTinh" name="GioiTinh" required>
                    <option value="">-- Chọn giới tính --</option>
                    <option value="Nam">Nam</option>
                    <option value="Nữ">Nữ</option>
                </select>
            </div>

            <div class="row mb-4">
                <div class="col-md-6">
                    <label for="SDT" class="form-label fw-semibold">Số điện thoại <span
                            class="text-danger">*</span></label>
                    <input type="tel" class="form-control" id="SDT" name="SDT" required placeholder="Ví dụ: 0123456789">
                </div>
                <div class="col-md-6">
                    <label for="Email" class="form-label fw-semibold">Email <span class="text-danger">*</span></label>
                    <input type="email" class="form-control" id="Email" name="Email" required placeholder="Nhập email">
                </div>
            </div>

            <div class="mb-4">
                <label for="DiaChi" class="form-label fw-semibold">Địa chỉ <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="DiaChi" name="DiaChi" required placeholder="Nhập địa chỉ">
            </div>

            <div class="mb-4">
                <label for="ChucVu" class="form-label fw-semibold">Chức vụ <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="ChucVu" name="ChucVu" required placeholder="Nhập chức vụ">
            </div>

            <div class="mb-4">
                <label for="MaND" class="form-label fw-semibold">Nhân viên <span class="text-danger">*</span></label>
                <select class="form-select" id="MaND" name="MaND" required>
                    <option value="">-- Chọn mã nhân viên --</option>
                    <?php foreach ($accounts as $account) { ?>
                        <option value="<?= htmlspecialchars($account['MaND'], ENT_QUOTES, 'UTF-8') ?>">
                            <?= htmlspecialchars($account['MaND'] . ' - ' . $account['TenDangNhap'], ENT_QUOTES, 'UTF-8') ?>
                        </option>
                    <?php } ?>
                </select>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary fw-semibold px-5">💾 Lưu nhân viên</button>
                <a href="?url=staff" class="btn btn-outline-secondary fw-semibold px-5">Hủy</a>
            </div>
        </form>
    </div>
</div>