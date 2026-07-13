<?php
$pageTitle = $pageTitle ?? 'Library Admin';
$pageSubtitle = $pageSubtitle ?? 'Quản trị hệ thống thư viện';
$content = $content ?? '';
?>
<?php require __DIR__ . '/Components/admin/header.php'; ?>

<body class="admin-shell d-flex flex-column">
    <?php require __DIR__ . '/Components/admin/navbar.php'; ?>

    <div class="container-fluid flex-grow-1 py-4">
        <div class="row g-4">
            <?php require __DIR__ . '/Components/admin/sidebar.php'; ?>

            <main class="col-12 col-lg-9 col-xl-10 ms-sm-auto px-4">
                <section class="library-hero rounded-4 p-4 p-lg-5 mb-4 shadow-sm">
                    <div class="row align-items-center g-4">
                        <div class="col-lg-8">
                            <span class="badge rounded-pill text-bg-light text-primary mb-3">Dashboard · Blue
                                theme</span>
                            <h1 class="display-6 fw-semibold library-page-title mb-2">
                                <?php echo htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8'); ?></h1>
                            <p class="lead mb-0 text-light">
                                <?php echo htmlspecialchars($pageSubtitle, ENT_QUOTES, 'UTF-8'); ?>
                            </p>
                        </div>
                        <div class="col-lg-4 text-lg-end">
                            <div class="d-inline-flex flex-column align-items-lg-end gap-2">
                                <a href="#" class="btn btn-light fw-semibold shadow-sm px-4">Xuất báo cáo</a>
                                <a href="#" class="btn btn-outline-light fw-semibold px-4">Tạo mới</a>
                            </div>
                        </div>
                    </div>
                </section>

                <div class="row g-3 mb-4">
                    <div class="col-md-4">
                        <div class="card library-stat library-stat-primary h-100 position-relative">
                            <div class="card-body p-4">
                                <div class="small text-light opacity-75">Tổng sách</div>
                                <div class="display-6 fw-semibold mb-1">128</div>
                                <div class="small">+12 so với tháng trước</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card library-stat library-stat-secondary h-100 position-relative">
                            <div class="card-body p-4">
                                <div class="small text-light opacity-75">Độc giả</div>
                                <div class="display-6 fw-semibold mb-1">56</div>
                                <div class="small">25 tài khoản đang hoạt động</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card library-stat library-stat-info h-100 position-relative">
                            <div class="card-body p-4">
                                <div class="small text-light opacity-75">Mượn hôm nay</div>
                                <div class="display-6 fw-semibold mb-1">12</div>
                                <div class="small">3 phiếu đang chờ duyệt</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card library-card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between py-3 px-4">
                        <div>
                            <h2 class="h5 mb-0">Nội dung chính</h2>
                            <small class="text-muted">Khu vực render theo từng trang chức năng</small>
                        </div>
                        <span class="badge library-chip rounded-pill px-3 py-2">Bootstrap 5</span>
                    </div>
                    <div class="card-body p-4 p-lg-5">
                        <?php echo $content; ?>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <?php require __DIR__ . '/Components/admin/footer.php'; ?>