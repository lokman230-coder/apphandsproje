<?php
/**
 * Kurulum Sihirbazı
 */
define('INSTALLING', true);
$step = $_GET['step'] ?? 1;
$errors = [];
$success = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($step == 2) {
        // Sistem kontrolü
        $requirements = [
            'PHP Versiyonu' => version_compare(PHP_VERSION, '8.0', '>='),
            'PDO Extension' => extension_loaded('pdo'),
            'JSON Extension' => extension_loaded('json'),
            'GD Extension' => extension_loaded('gd'),
        ];
        $_SESSION['install_requirements'] = $requirements;
        $step = 3;
    } elseif ($step == 3) {
        // Veritabanı ayarları
        $_SESSION['install_db'] = [
            'host' => $_POST['db_host'] ?? 'localhost',
            'name' => $_POST['db_name'] ?? '',
            'user' => $_POST['db_user'] ?? '',
            'pass' => $_POST['db_pass'] ?? '',
        ];
        $step = 4;
    } elseif ($step == 4) {
        // Admin hesabı
        $_SESSION['install_admin'] = [
            'name' => $_POST['admin_name'] ?? '',
            'email' => $_POST['admin_email'] ?? '',
            'password' => $_POST['admin_password'] ?? '',
        ];
        $step = 5;
    } elseif ($step == 5) {
        $success = true;
    }
}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kurulum - <?= SITE_NAME ?? 'Ahost One' ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Inter', sans-serif; background: #0f172a; color: #e2e8f0; min-height: 100vh; display: flex; align-items: center; justify-content: center; padding: 20px; }
        .install-card { background: #1e293b; border-radius: 16px; padding: 40px; max-width: 600px; width: 100%; }
        .install-header { text-align: center; margin-bottom: 32px; }
        .install-header h1 { font-size: 28px; margin-bottom: 8px; }
        .install-header p { color: #94a3b8; }
        .steps { display: flex; justify-content: center; gap: 8px; margin-bottom: 32px; }
        .step { width: 40px; height: 40px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: 600; background: #334155; color: #94a3b8; }
        .step.active { background: #667eea; color: white; }
        .step.completed { background: #10b981; color: white; }
        .form-group { margin-bottom: 20px; }
        .form-group label { display: block; margin-bottom: 8px; font-weight: 500; }
        .form-group input { width: 100%; padding: 12px 16px; background: #0f172a; border: 2px solid #334155; border-radius: 8px; color: white; font-size: 16px; }
        .form-group input:focus { outline: none; border-color: #667eea; }
        .btn { display: inline-flex; align-items: center; justify-content: center; gap: 8px; padding: 14px 28px; font-size: 16px; font-weight: 600; border-radius: 8px; border: none; cursor: pointer; transition: all 0.2s; text-decoration: none; }
        .btn-primary { background: #667eea; color: white; }
        .btn-primary:hover { background: #5a67d8; transform: translateY(-2px); }
        .btn-block { width: 100%; }
        .success { text-align: center; padding: 40px; }
        .success i { font-size: 64px; color: #10b981; margin-bottom: 16px; }
        .check-list { background: #0f172a; border-radius: 8px; padding: 20px; margin-bottom: 24px; }
        .check-item { display: flex; align-items: center; gap: 12px; padding: 8px 0; }
        .check-item i { font-size: 18px; }
        .check-item.success i { color: #10b981; }
        .check-item.error i { color: #ef4444; }
    </style>
</head>
<body>
<div class="install-card">
    <div class="install-header">
        <h1><i class="fas fa-rocket"></i> <?= SITE_NAME ?? 'Ahost One' ?> Kurulum</h1>
        <p>Hosting yönetim sistemi kurulum sihirbazı</p>
    </div>
    
    <div class="steps">
        <?php for($i=1;$i<=5;$i++): ?>
            <div class="step <?= $i<$step?'completed':($i==$step?'active':'') ?>"><?= $i<$step?'✓':$i ?></div>
        <?php endfor; ?>
    </div>
    
    <?php if ($success): ?>
        <div class="success">
            <i class="fas fa-check-circle"></i>
            <h2>Kurulum Tamamlandı!</h2>
            <p style="color:#94a3b8;margin:16px 0;">Sisteminiz hazır. Giriş yapabilirsiniz.</p>
            <a href="index.php" class="btn btn-primary">Siteye Git</a>
        </div>
    <?php elseif ($step == 1): ?>
        <div class="check-list">
            <div class="check-item <?= version_compare(PHP_VERSION, '8.0', '>=')?'success':'error' ?>">
                <i class="fas fa-<?= version_compare(PHP_VERSION, '8.0', '>=')?'check-circle':'times-circle' ?>"></i>
                PHP Versiyonu: <?= PHP_VERSION ?> (Gerekli: 8.0+)
            </div>
            <div class="check-item <?= extension_loaded('pdo')?'success':'error' ?>">
                <i class="fas fa-<?= extension_loaded('pdo')?'check-circle':'times-circle' ?>"></i>
                PDO Extension: <?= extension_loaded('pdo')?'Aktif':'Pasif' ?>
            </div>
            <div class="check-item <?= extension_loaded('json')?'success':'error' ?>">
                <i class="fas fa-<?= extension_loaded('json')?'check-circle':'times-circle' ?>"></i>
                JSON Extension: <?= extension_loaded('json')?'Aktif':'Pasif' ?>
            </div>
            <div class="check-item <?= extension_loaded('gd')?'success':'error' ?>">
                <i class="fas fa-<?= extension_loaded('gd')?'check-circle':'times-circle' ?>"></i>
                GD Extension: <?= extension_loaded('gd')?'Aktif':'Pasif' ?>
            </div>
        </div>
        <form method="POST">
            <button type="submit" class="btn btn-primary btn-block">Devam Et <i class="fas fa-arrow-right"></i></button>
        </form>
    <?php elseif ($step == 3): ?>
        <h3 style="margin-bottom:24px;">Veritabanı Ayarları</h3>
        <form method="POST">
            <div class="form-group">
                <label>Host</label>
                <input type="text" name="db_host" value="localhost" required>
            </div>
            <div class="form-group">
                <label>Veritabanı Adı</label>
                <input type="text" name="db_name" required>
            </div>
            <div class="form-group">
                <label>Kullanıcı</label>
                <input type="text" name="db_user" required>
            </div>
            <div class="form-group">
                <label>Şifre</label>
                <input type="password" name="db_pass">
            </div>
            <button type="submit" class="btn btn-primary btn-block">Devam Et <i class="fas fa-arrow-right"></i></button>
        </form>
    <?php elseif ($step == 4): ?>
        <h3 style="margin-bottom:24px;">Admin Hesabı</h3>
        <form method="POST">
            <div class="form-group">
                <label>Ad Soyad</label>
                <input type="text" name="admin_name" required>
            </div>
            <div class="form-group">
                <label>E-posta</label>
                <input type="email" name="admin_email" required>
            </div>
            <div class="form-group">
                <label>Şifre</label>
                <input type="password" name="admin_password" required minlength="8">
            </div>
            <button type="submit" class="btn btn-primary btn-block">Kurulumu Tamamla <i class="fas fa-check"></i></button>
        </form>
    <?php endif; ?>
</div>
</body>
</html>
