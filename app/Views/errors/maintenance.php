<?php http_response_code(503); ?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bakım Modu | <?= SITE_NAME ?></title>
    <link rel="stylesheet" href="<?= base_url('public/assets/css/tokens.css') ?>">
    <style>
        body { display: flex; align-items: center; justify-content: center; min-height: 100vh; background: var(--bg-primary); font-family: var(--font-sans); margin: 0; }
        .maintenance-container { text-align: center; padding: 40px; max-width: 500px; }
        .maintenance-icon { font-size: 80px; margin-bottom: 24px; animation: pulse 2s infinite; }
        @keyframes pulse { 0%,100%{opacity:1} 50%{opacity:0.5} }
        .maintenance-title { font-size: 32px; margin-bottom: 16px; }
        .maintenance-message { color: var(--text-muted); font-size: 18px; margin-bottom: 32px; }
        .maintenance-info { background: var(--bg-card); border-radius: 12px; padding: 24px; margin-bottom: 32px; }
        .maintenance-info p { margin: 8px 0; font-size: 14px; color: var(--text-secondary); }
    </style>
</head>
<body>
    <div class="maintenance-container">
        <div class="maintenance-icon">🔧</div>
        <h1 class="maintenance-title">Bakım Modu</h1>
        <p class="maintenance-message">Şu anda bakım çalışması yapıyoruz. En kısa sürede geri döneceğiz.</p>
        <div class="maintenance-info">
            <p><strong>Tahmini Süre:</strong> Yaklaşık 30 dakika</p>
            <p><strong>Tarih:</strong> <?= date('d.m.Y H:i') ?></p>
        </div>
    </div>
</body>
</html>
