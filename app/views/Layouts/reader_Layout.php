<?php
$pageTitle = $pageTitle ?? 'Library Reader';
$pageSubtitle = $pageSubtitle ?? 'Khám phá và tra cứu sách';
$content = $content ?? '';
?>
<?php require __DIR__ . '/Components/reader/header.php'; ?>

<body class="d-flex flex-column min-vh-100">
    <?php require __DIR__ . '/Components/reader/navbar.php'; ?>

    <div class="container py-4 flex-grow-1">
        <section class="reader-hero rounded-4 p-4 p-lg-5 mb-4 shadow-sm">
            <div class="row align-items-center g-4">
                <div class="col-lg-8">
                    <span class="badge rounded-pill text-bg-primary mb-3">Reader Portal</span>
                    <h1 class="display-6 fw-semibold library-page-title mb-2">
                        <?php echo htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8'); ?></h1>
                    <p class="lead mb-0 text-muted"><?php echo htmlspecialchars($pageSubtitle, ENT_QUOTES, 'UTF-8'); ?>
                    </p>
                </div>
                <div class="col-lg-4">
                    <div class="card reader-cover rounded-4 border-0 shadow-sm">
                        <div class="card-body p-4">
                            <div class="small opacity-75 mb-1">Khám phá</div>
                            <div class="h4 mb-2">Sách mới mỗi tuần</div>
                            <div class="small opacity-75">Tìm kiếm nhanh, lọc theo chủ đề và xem sách gợi ý.</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="row g-4">
            <aside class="col-12 col-lg-3">
                <?php require __DIR__ . '/Components/reader/sidebar.php'; ?>
            </aside>

            <main class="col-12 col-lg-9">
                <div class="card library-card">
                    <div class="card-header d-flex align-items-center justify-content-between py-3 px-4">
                        <div>
                            <h2 class="h5 mb-0">Sách nổi bật</h2>
                            <small class="text-muted">Gợi ý theo xu hướng và nhu cầu đọc</small>
                        </div>
                        <span class="badge library-chip rounded-pill px-3 py-2">Reader UI</span>
                    </div>
                    <div class="card-body p-4 p-lg-5">
                        <?php echo $content; ?>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <?php require __DIR__ . '/Components/reader/footer.php'; ?>