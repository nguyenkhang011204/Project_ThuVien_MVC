<?php
$pageTitle = $pageTitle ?? 'Library Admin';
$pageSubtitle = $pageSubtitle ?? 'Quản trị hệ thống thư viện';
$content = $content ?? '';
?>
<?php require __DIR__ . '/Components/admin/header.php'; ?>

<body class="bg-light admin-shell d-flex flex-column">
    <?php require __DIR__ . '/Components/admin/navbar.php'; ?>

    <div class="container-fluid flex-grow-1">
        <div class="row">
            <?php require __DIR__ . '/Components/admin/sidebar.php'; ?>

            <main class="col-12 col-lg-9 col-xl-10 ms-sm-auto px-4 py-4">
                <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-3">
                    <div>
                        <h1 class="h3 mb-1"><?php echo htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8'); ?></h1>
                        <p class="text-muted mb-0"><?php echo htmlspecialchars($pageSubtitle, ENT_QUOTES, 'UTF-8'); ?>
                        </p>
                    </div>
                    <div class="d-flex gap-2">
                        <a href="#" class="btn btn-outline-primary btn-sm">Xuất báo cáo</a>
                        <a href="#" class="btn btn-primary btn-sm">Tạo mới</a>
                    </div>
                </div>

                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <!-- <?php echo $content; ?> -->
                        <h1>Xin chào</h1>

                        <div class="alert alert-success">
                            Bootstrap hoạt động.
                        </div>

                        <div class="card mt-3">
                            <div class="card-body">
                                Đây là giao diện test.
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <?php require __DIR__ . '/Components/admin/footer.php'; ?>