<?php
$account = $account ?? [];
$roles = [
    'ADMIN' => 'Quản trị viên',
    'THUTHU' => 'Thủ thư',
    'DOCGIA' => 'Độc giả'
];

$statuses = [
    1 => 'Hoạt động',
    0 => 'Bị khóa'
];
?>

<section class="mb-4">
    <div class="library-hero rounded-4 p-4 p-lg-5 shadow-sm">
        <div class="row align-items-center g-4">
            <div class="col-lg-8">
                <h1 class="display-6 fw-semibold library-page-title mb-2">Chỉnh sửa tài khoản</h1>
                <p class="lead mb-0 text-light">
                    Mã tài khoản: <strong><?= htmlspecialchars($account['MaND'] ?? '-', ENT_QUOTES, 'UTF-8') ?></strong>
                </p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a href="?url=account" class="btn btn-light fw-semibold shadow-sm px-4">← Quay lại</a>
            </div>
        </div>
    </div>
</section>

<div class="card library-card">
    <div class="card-body p-4 p-lg-5">
        <form method="POST" action="?url=account/update&id=<?= htmlspecialchars($account['MaND'], ENT_QUOTES, 'UTF-8') ?>"
            class="needs-validation">
            <input type="hidden" name="MaND" value="<?= htmlspecialchars($account['MaND'], ENT_QUOTES, 'UTF-8') ?>">

            <div class="row mb-4">
                <div class="col-md-6">
                    <label for="MaND" class="form-label fw-semibold">Mã tài khoản (Không thể chỉnh sửa)<span
                            class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="MaND" name="MaND" required disabled
                        value="<?= htmlspecialchars($account['MaND'] ?? '', ENT_QUOTES, 'UTF-8') ?>">
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Tên tài khoản </label>
                    <input type="text" class="form-control" id="TenDangNhap" name="TenDangNhap" required
                        value="<?= htmlspecialchars($account["TenDangNhap"], ENT_QUOTES, 'UTF-8') ?>">
                </div>
            </div>

            <div class="mb-4">
                <label for="MatKhau" class="form-label fw-semibold">Mật khẩu <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="MatKhau" name="MatKhau" required
                    value="<?= htmlspecialchars($account["MatKhau"], ENT_QUOTES, 'UTF-8') ?>">
            </div>

            <div class="row mb-4">
                <div class="col-md-6">
                    <label for="VaiTro" class="form-label fw-semibold">Vai trò <span class="text-danger">*</span></label>
                    <select class="form-select" id="VaiTro" name="VaiTro" required>
                        <option value="">-- Chọn vai trò --</option>
                        <?php foreach ($roles as $value => $label): ?>
                            <option value="<?= htmlspecialchars($value, ENT_QUOTES, 'UTF-8') ?>"
                                <?= ($account["VaiTro"] === $value) ? 'selected' : '' ?>>
                                <?= htmlspecialchars($label, ENT_QUOTES, 'UTF-8') ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="TrangThai" class="form-label fw-semibold">Trạng thái <span
                            class="text-danger">*</span></label>
                    <select class="form-select" id="TrangThai" name="TrangThai" required>
                        <option value="">-- Chọn trạng thái --</option>
                        <?php foreach ($statuses as $value => $label): ?>
                            <option value="<?= htmlspecialchars($value, ENT_QUOTES, 'UTF-8') ?>"
                                <?= ((int) $account['TrangThai'] === (int) $value) ? 'selected' : '' ?>>
                                <?= htmlspecialchars($label, ENT_QUOTES, 'UTF-8') ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary fw-semibold px-5">💾 Cập nhật tài khoản</button>
                <a href="?url=account/detail&id=<?= htmlspecialchars($account["MaND"], ENT_QUOTES, 'UTF-8') ?>"
                    class="btn btn-outline-secondary fw-semibold px-5">Hủy</a>
            </div>
        </form>
    </div>
</div>