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

                <?php require $content; ?>

            </main>

        </div>
    </div>

    <?php require __DIR__ . '/Components/admin/footer.php'; ?>