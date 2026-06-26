<?php
/**
 * 404 - Sayfa Bulunamadı
 */
http_response_code(404);
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Sayfa Bulunamadı | <?= SITE_NAME ?></title>
    <link rel="icon" href="<?= base_url('public/assets/images/logo.svg') ?>">
    <link rel="stylesheet" href="<?= base_url('public/assets/css/tokens.css') ?>">
    <link rel="stylesheet" href="<?= base_url('public/assets/css/site.css') ?>">
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            background: var(--bg-primary);
            color: var(--text-primary);
            font-family: var(--font-sans);
            margin: 0;
        }
        .error-container {
            text-align: center;
            padding: 40px;
        }
        .error-code {
            font-size: 120px;
            font-weight: 800;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin: 0;
            line-height: 1;
        }
        .error-title {
            font-size: 32px;
            margin: 20px 0;
        }
        .error-message {
            color: var(--text-muted);
            font-size: 18px;
            max-width: 400px;
            margin: 0 auto 30px;
        }
        .error-actions {
            display: flex;
            gap: 16px;
            justify-content: center;
        }
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 14px 28px;
            font-size: 15px;
            font-weight: 600;
            border-radius: 12px;
            text-decoration: none;
            transition: all 0.2s;
        }
        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
        }
        .btn-secondary {
            background: var(--bg-secondary);
            color: var(--text-primary);
            border: 1px solid var(--border-subtle);
        }
        .btn-secondary:hover {
            background: var(--bg-hover);
        }
        .robot {
            font-size: 80px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="error-container">
        <div class="robot">🤖</div>
        <h1 class="error-code">404</h1>
        <h2 class="error-title">Sayfa Bulunamadı</h2>
        <p class="error-message">
            Aradığınız sayfa mevcut değil veya taşınmış olabilir. 
            Ana sayfaya dönerek aradığınızı bulabilirsiniz.
        </p>
        <div class="error-actions">
            <a href="<?= base_url() ?>" class="btn btn-primary">
                <i class="fas fa-home"></i> Ana Sayfa
            </a>
            <a href="<?= base_url('support') ?>" class="btn btn-secondary">
                <i class="fas fa-headset"></i> Destek Al
            </a>
        </div>
    </div>
</body>
</html>
