<?php
$pageTitle = $pageTitle ?? 'Đăng nhập · Thư viện số';
$content = $content ?? '';
?>
<!doctype html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?php echo htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8'); ?>
    </title>
    <link rel="stylesheet" href="/Project_ThuVien_MVC/public/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,400;9..144,500;9..144,600;9..144,700&family=Inter:wght@400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="/Project_ThuVien_MVC/public/css/theme.css">
    <link rel="stylesheet" href="/Project_ThuVien_MVC/public/css/auth.css">
</head>

<body>
    <?php require $content; ?>

    <script src="/Project_ThuVien_MVC/public/js/bootstrap.bundle.min.js"></script>
    <script src="/Project_ThuVien_MVC/public/js/auth.js"></script>
</body>

</html>