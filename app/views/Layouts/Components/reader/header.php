<?php
$pageTitle = $pageTitle ?? 'Library Reader';
?>
<!doctype html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Cổng độc giả thư viện">
    <title><?php echo htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8'); ?></title>
    <link rel="stylesheet" href="/Project_ThuVien_MVC/public/css/bootstrap.min.css">
    <style>
        .reader-hero {
            background: linear-gradient(135deg, #f8fafc, #e2e8f0);
        }
    </style>
</head>