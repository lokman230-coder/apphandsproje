<?php
/**
 * Kurulum Sihirbazi - Ahost One
 */
@session_start();

$SITE_NAME = 'Ahost One';
$step = isset($_GET['step']) ? (int)$_GET['step'] : 1;
$success = false;
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $postStep = isset($_POST['go_step']) ? (int)$_POST['go_step'] : $step + 1;
    
    if ($postStep == 2) { 
        $step = 2; 
    }
    elseif ($postStep == 3) {
        $_SESSION['install_db'] = [
            'host' => $_POST['db_host'] ?? 'localhost',
            'name' => $_POST['db_name'] ?? '',
            'user' => $_POST['db_user'] ?? '',
            'pass' => $_POST['db_pass'] ?? '',
        ];
        $step = 3;
    }
    elseif ($postStep == 4) {
        $_SESSION['install_admin'] = [
            'name' => $_POST['admin_name'] ?? '',
            'email' => $_POST['admin_email'] ?? '',
            'password' => password_hash($_POST['admin_password'] ?? '', PASSWORD_DEFAULT),
        ];
        $step = 4;
    }
    elseif ($postStep == 5) { 
        $success = true; 
    }
}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kurulum - <?php echo $SITE_NAME; ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Inter', sans-serif; background: linear-gradient(135deg, #0f172a 0%, #1e1b4b 100%); color: #e2e8f0; min-height: 100vh; display: flex; align-items: center; justify-content: center; padding: 20px; }
        .install-card { background: #1e293b; border-radius: 20px; padding: 48px; max-width: 600px; width: 100%; box-shadow: 0 25px 50px rgba(0,0,0,0.5); }
        .install-header { text-align: center; margin-bottom: 40px; }
        .install-logo { width: 80px; height: 80px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border-radius: 20px; display: flex; align-items: center; justify-content: center; font-size: 36px; font-weight: 800; color: white; margin: 0 auto 20px; }
        .install-header h1 { font-size: 28px; margin-bottom: 8px; color: white; }
        .install-header p { color: #94a3b8; }
        .steps { display: flex; justify-content: center; gap: 12px; margin-bottom: 40px; }
        .step { width: 44px; height: 44px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: 600; background: #334155; color: #94a3b8; transition: all 0.3s; }
        .step.active { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; }
        .step.completed { background: #10b981; color: white; }
        .step-label { font-size: 12px; color: #64748b; text-align: center; margin-top: 8px; }
        .form-group { margin-bottom: 24px; }
        .form-group label { display: block; margin-bottom: 10px; font-weight: 500; color: #e2e8f0; }
        .form-group input { width: 100%; padding: 14px 18px; background: #0f172a; border: 2px solid #334155; border-radius: 12px; color: white; font-size: 16px; transition: all 0.2s; }
        .form-group input:focus { outline: none; border-color: #667eea; }
        .form-group input::placeholder { color: #64748b; }
        .btn { display: inline-flex; align-items: center; justify-content: center; gap: 10px; padding: 16px 32px; font-size: 16px; font-weight: 600; border-radius: 12px; border: none; cursor: pointer; transition: all 0.2s; text-decoration: none; }
        .btn-primary { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; width: 100%; }
        .btn-primary:hover { transform: translateY(-2px); box-shadow: 0 10px 30px rgba(102, 126, 234, 0.4); }
        .check-list { background: #0f172a; border-radius: 16px; padding: 24px; margin-bottom: 24px; }
        .check-item { display: flex; align-items: center; gap: 14px; padding: 12px 0; font-size: 15px; }
        .check-item i { font-size: 20px; }
        .check-item.success i { color: #10b981; }
        .check-item.error i { color: #ef4444; }
        .success { text-align: center; padding: 40px 0; }
        .success-icon { width: 100px; height: 100px; background: rgba(16, 185, 129, 0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 24px; }
        .success-icon i { font-size: 48px; color: #10b981; }
        .success h2 { font-size: 28px; margin-bottom: 16px; color: white; }
        .success p { color: #94a3b8; margin-bottom: 24px; }
        h3 { color: white; margin-bottom: 20px; }
    </style>
</head>
<body>
<div class="install-card">
    <div class="install-header">
        <div class="install-logo">A</div>
        <h1><?php echo $SITE_NAME; ?></h1>
        <p>Kurulum Sihirbazi</p>
    </div>
    
    <div class="steps">
        <div style="text-align:center;">
            <div class="step <?php echo $step > 1 ? 'completed' : ($step == 1 ? 'active' : ''); ?>"><?php echo $step > 1 ? '<i class="fas fa-check"></i>' : '1'; ?></div>
            <div class="step-label">Gereksinimler</div>
        </div>
        <div style="text-align:center;">
            <div class="step <?php echo $step > 2 ? 'completed' : ($step == 2 ? 'active' : ''); ?>"><?php echo $step > 2 ? '<i class="fas fa-check"></i>' : '2'; ?></div>
            <div class="step-label">Veritabani</div>
        </div>
        <div style="text-align:center;">
            <div class="step <?php echo $step > 3 ? 'completed' : ($step == 3 ? 'active' : ''); ?>"><?php echo $step > 3 ? '<i class="fas fa-check"></i>' : '3'; ?></div>
            <div class="step-label">Admin</div>
        </div>
        <div style="text-align:center;">
            <div class="step <?php echo $step >= 4 ? 'completed' : ''; ?>"><?php echo $step >= 4 ? '<i class="fas fa-check"></i>' : '4'; ?></div>
            <div class="step-label">Tamamla</div>
        </div>
    </div>
    
    <?php if ($success): ?>
        <div class="success">
            <div class="success-icon"><i class="fas fa-check-circle"></i></div>
            <h2>Kurulum Tamamlandi!</h2>
            <p>Sisteminiz hazir. Simdi giris yapabilirsiniz.</p>
            <a href="index.php" class="btn btn-primary"><i class="fas fa-rocket"></i> Siteye Git</a>
        </div>
    <?php elseif ($step == 1): ?>
        <h3>Sistem Gereksinimleri</h3>
        <div class="check-list">
            <div class="check-item <?php echo version_compare(PHP_VERSION, '7.4', '>=') ? 'success' : 'error'; ?>">
                <i class="fas fa-<?php echo version_compare(PHP_VERSION, '7.4', '>=') ? 'check-circle' : 'times-circle'; ?>"></i>
                PHP Versiyonu: <?php echo PHP_VERSION; ?> (Gerekli: 7.4+)
            </div>
            <div class="check-item <?php echo extension_loaded('pdo') ? 'success' : 'error'; ?>">
                <i class="fas fa-<?php echo extension_loaded('pdo') ? 'check-circle' : 'times-circle'; ?>"></i>
                PDO Extension: <?php echo extension_loaded('pdo') ? 'Aktif' : 'Pasif'; ?>
            </div>
            <div class="check-item <?php echo extension_loaded('json') ? 'success' : 'error'; ?>">
                <i class="fas fa-<?php echo extension_loaded('json') ? 'check-circle' : 'times-circle'; ?>"></i>
                JSON Extension: <?php echo extension_loaded('json') ? 'Aktif' : 'Pasif'; ?>
            </div>
            <div class="check-item <?php echo extension_loaded('mbstring') ? 'success' : 'error'; ?>">
                <i class="fas fa-<?php echo extension_loaded('mbstring') ? 'check-circle' : 'times-circle'; ?>"></i>
                MBString Extension: <?php echo extension_loaded('mbstring') ? 'Aktif' : 'Pasif'; ?>
            </div>
        </div>
        <form method="POST">
            <input type="hidden" name="go_step" value="2">
            <button type="submit" class="btn btn-primary"><i class="fas fa-arrow-right"></i> Devam Et</button>
        </form>
    <?php elseif ($step == 2): ?>
        <h3>Veritabani Ayarlari</h3>
        <form method="POST">
            <input type="hidden" name="go_step" value="3">
            <div class="form-group">
                <label>Host</label>
                <input type="text" name="db_host" value="localhost" required>
            </div>
            <div class="form-group">
                <label>Veritabani Adi</label>
                <input type="text" name="db_name" placeholder="ahost_one" required>
            </div>
            <div class="form-group">
                <label>Kullanici Adi</label>
                <input type="text" name="db_user" placeholder="root" required>
            </div>
            <div class="form-group">
                <label>Sifre</label>
                <input type="password" name="db_pass" placeholder="********">
            </div>
            <button type="submit" class="btn btn-primary"><i class="fas fa-arrow-right"></i> Devam Et</button>
        </form>
    <?php elseif ($step == 3): ?>
        <h3>Admin Hesabi</h3>
        <form method="POST">
            <input type="hidden" name="go_step" value="4">
            <div class="form-group">
                <label>Ad Soyad</label>
                <input type="text" name="admin_name" placeholder="Admin User" required>
            </div>
            <div class="form-group">
                <label>E-posta</label>
                <input type="email" name="admin_email" placeholder="admin@example.com" required>
            </div>
            <div class="form-group">
                <label>Sifre</label>
                <input type="password" name="admin_password" placeholder="********" required minlength="8">
            </div>
            <button type="submit" class="btn btn-primary"><i class="fas fa-check"></i> Kurulumu Tamamla</button>
        </form>
    <?php elseif ($step == 4): ?>
        <div class="success">
            <div class="success-icon"><i class="fas fa-check-circle"></i></div>
            <h2>Hazirlik Tamamlandi!</h2>
            <p>Son adima gecmek icin butona tiklayin.</p>
            <form method="POST">
                <input type="hidden" name="go_step" value="5">
                <button type="submit" class="btn btn-primary"><i class="fas fa-rocket"></i> Kurulumu Baslat</button>
            </form>
        </div>
    <?php endif; ?>
</div>
</body>
</html>
