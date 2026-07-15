<?php
$error = $_SESSION['error'] ?? null;
$message = $_SESSION['message'] ?? null;
unset($_SESSION['error'], $_SESSION['message']);
?>

<div class="auth-shell">

    <aside class="auth-side">
        <div class="brand-mark">
            <span class="glyph">T</span>
            Thư viện số
        </div>

        <div>
            <div class="side-copy">
                <h1 class="display-font">Một tài khoản, cả một kho tri thức.</h1>
                <p>Mượn sách, theo dõi hạn trả và khám phá đề xuất mới — tất cả trong thẻ thư viện điện tử của bạn.</p>
            </div>

            <div class="lib-card">
                <div class="lib-card-top">
                    <div>
                        <div class="lib-card-eyebrow">Thẻ thành viên</div>
                        <div class="lib-card-name">Nguyễn Văn An</div>
                        <div class="lib-card-id">DG001 · Hạng Độc giả</div>
                    </div>
                    <div class="lib-card-chip"></div>
                </div>
                <div class="barcode"></div>
            </div>
        </div>

        <div>
            <div class="spine-strip" aria-hidden="true">
                <div class="spine" style="height:22px"></div>
                <div class="spine" style="height:34px"></div>
                <div class="spine" style="height:16px"></div>
                <div class="spine" style="height:40px"></div>
                <div class="spine" style="height:26px"></div>
                <div class="spine" style="height:31px"></div>
                <div class="spine" style="height:19px"></div>
            </div>
            <div class="spine-caption">+2.000 đầu sách đang lưu hành</div>
        </div>
    </aside>

    <main class="auth-main">
        <div class="auth-panel">

            <?php if ($error): ?>
                <div class="alert alert-danger py-2 small">
                    <?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?>
                </div>
            <?php endif; ?>
            <?php if ($message): ?>
                <div class="alert alert-success py-2 small">
                    <?= htmlspecialchars($message, ENT_QUOTES, 'UTF-8') ?>
                </div>
            <?php endif; ?>

            <ul class="nav auth-tabs" id="authTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="login-tab" data-bs-toggle="tab" data-bs-target="#login-pane"
                        type="button" role="tab">Đăng nhập</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="register-tab" data-bs-toggle="tab" data-bs-target="#register-pane"
                        type="button" role="tab">Đăng ký</button>
                </li>
            </ul>

            <div class="tab-content" id="authTabsContent">

                <div class="tab-pane fade show active" id="login-pane" role="tabpanel">
                    <h2 class="h3 mb-1">Chào mừng trở lại</h2>
                    <p class="text-muted mb-4">Đăng nhập để tiếp tục quản lý việc mượn trả sách của bạn.</p>

                    <form action="?url=auth/login" method="POST" class="needs-validation" novalidate>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="loginUser" name="TenDangNhap"
                                placeholder="Tên đăng nhập" required>
                            <label for="loginUser">Tên đăng nhập</label>
                            <div class="invalid-feedback">Vui lòng nhập tên đăng nhập.</div>
                        </div>

                        <div class="form-floating mb-2 position-relative">
                            <input type="password" class="form-control" id="loginPass" name="MatKhau"
                                placeholder="Mật khẩu" required>
                            <label for="loginPass">Mật khẩu</label>
                            <button type="button" class="pw-toggle" data-toggle-target="loginPass"
                                aria-label="Hiện mật khẩu">👁</button>
                            <div class="invalid-feedback">Vui lòng nhập mật khẩu.</div>
                        </div>

                        <div class="d-flex justify-content-between align-items-center mb-4 mt-2">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="rememberMe" name="RememberMe">
                                <label class="form-check-label small text-muted" for="rememberMe">Ghi nhớ đăng
                                    nhập</label>
                            </div>
                            <a href="#" class="small link-brand">Quên mật khẩu?</a>
                        </div>

                        <button type="submit" class="btn btn-brand w-100">Đăng nhập</button>
                    </form>

                    <div class="divider">hoặc</div>

                    <p class="text-center switch-line mb-0">
                        Chưa có tài khoản?
                        <a href="#" class="link-brand" data-switch-to="register-tab">Đăng ký ngay</a>
                    </p>
                </div>

                <div class="tab-pane fade" id="register-pane" role="tabpanel">
                    <h2 class="h3 mb-1">Tạo thẻ thư viện</h2>
                    <p class="text-muted mb-4">Chỉ mất một phút để bắt đầu mượn sách.</p>

                    <form action="?url=auth/register" method="POST" class="needs-validation" novalidate>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="regName" name="HoTen" placeholder="Họ và tên"
                                required>
                            <label for="regName">Họ và tên</label>
                            <div class="invalid-feedback">Vui lòng nhập họ tên.</div>
                        </div>

                        <div class="row g-2">
                            <div class="col-7">
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="regEmail" name="Email"
                                        placeholder="Email" required>
                                    <label for="regEmail">Email</label>
                                    <div class="invalid-feedback">Email không hợp lệ.</div>
                                </div>
                            </div>
                            <div class="col-5">
                                <div class="form-floating mb-3">
                                    <input type="tel" class="form-control" id="regPhone" name="SDT" placeholder="SĐT"
                                        required>
                                    <label for="regPhone">SĐT</label>
                                    <div class="invalid-feedback">Bắt buộc.</div>
                                </div>
                            </div>
                        </div>

                        <div class="form-floating mb-3 position-relative">
                            <input type="password" class="form-control" id="regPass" name="MatKhau"
                                placeholder="Mật khẩu" minlength="6" required>
                            <label for="regPass">Mật khẩu</label>
                            <button type="button" class="pw-toggle" data-toggle-target="regPass"
                                aria-label="Hiện mật khẩu">👁</button>
                            <div class="invalid-feedback">Tối thiểu 6 ký tự.</div>
                        </div>

                        <div class="form-floating mb-3 position-relative">
                            <input type="password" class="form-control" id="regPass2" name="XacNhanMatKhau"
                                placeholder="Xác nhận mật khẩu" required>
                            <label for="regPass2">Xác nhận mật khẩu</label>
                            <button type="button" class="pw-toggle" data-toggle-target="regPass2"
                                aria-label="Hiện mật khẩu">👁</button>
                            <div class="invalid-feedback">Mật khẩu xác nhận không khớp.</div>
                        </div>

                        <div class="form-check mb-4">
                            <input class="form-check-input" type="checkbox" id="agreeTerms" required>
                            <label class="form-check-label small text-muted" for="agreeTerms">
                                Tôi đồng ý với <a href="#" class="link-brand">Quy định thư viện</a>
                            </label>
                            <div class="invalid-feedback">Bạn cần đồng ý trước khi tiếp tục.</div>
                        </div>

                        <button type="submit" class="btn btn-brand w-100">Tạo tài khoản</button>
                    </form>

                    <p class="text-center switch-line mt-4 mb-0">
                        Đã có tài khoản?
                        <a href="#" class="link-brand" data-switch-to="login-tab">Đăng nhập</a>
                    </p>
                </div>

            </div>
        </div>
    </main>
</div>