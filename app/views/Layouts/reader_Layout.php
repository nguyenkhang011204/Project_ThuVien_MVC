<?php
$pageTitle = $pageTitle ?? 'Library Reader';
$pageSubtitle = $pageSubtitle ?? 'Khám phá và tra cứu sách';
$content = $content ?? '';
?>
<?php require __DIR__ . '/Components/reader/header.php'; ?>

<body class="bg-body-tertiary d-flex flex-column min-vh-100">
    <?php require __DIR__ . '/Components/reader/navbar.php'; ?>

    <div class="container py-4 flex-grow-1">
        <div class="row g-4">
            <aside class="col-12 col-lg-3">
                <?php require __DIR__ . '/Components/reader/sidebar.php'; ?>
            </aside>

            <main class="col-12 col-lg-9">
                <div class="mb-4">
                    <h1 class="h3 mb-1"><?php echo htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8'); ?></h1>
                    <p class="text-muted mb-0"><?php echo htmlspecialchars($pageSubtitle, ENT_QUOTES, 'UTF-8'); ?></p>
                </div>

                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <?php echo $content; ?>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <?php require __DIR__ . '/Components/reader/footer.php'; ?>