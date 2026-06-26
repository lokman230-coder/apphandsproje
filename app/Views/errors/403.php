<?php http_response_code(403); ?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>403 - Erişim Engellendi | <?= SITE_NAME ?></title>
    <link rel="stylesheet" href="<?= base_url('public/assets/css/tokens.css') ?>">
    <style>
        body { display: flex; align-items: center; justify-content: center; min-height: 100vh; background: var(--bg-primary); font-family: var(--font-sans); margin: 0; }
        .error-container { text-align: center; padding: 40px; }
        .error-code { font-size: 120px; font-weight: 800; color: var(--danger); margin: 0; }
        .error-title { font-size: 32px; margin: 20px 0; }
        .error-message { color: var(--text-muted); font-size: 18px; max-width: 400px; margin: 0 auto 30px; }
        .btn { display: inline-flex; align-items: center; justify-content: center; padding: 14px 28px; font-size: 15px; font-weight: 600; border-radius: 12px; text-decoration: none; background: var(--primary-500); color: white; transition: all 0.2s; }
        .btn:hover { transform: translateY(-2px); }
    </style>
</head>
<body>
    <div class="error-container">
        <h1 class="error-code">403</h1>
        <h2 class="error-title">Erişim Engellendi</h2>
        <p class="error-message">Bu sayfaya erişim yetkiniz yok.</p>
        <a href="<?= base_url() ?>" class="btn">Ana Sayfa</a>
    </div>
</body>
</html>
