<?php
/**
 * Kurulum Sihirbazi - Ahost One
 */
$step = isset($_GET['step']) ? (int)$_GET['step'] : 1;
$error = '';
$success = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $btn = $_POST['btn'] ?? '';
    
    if ($btn === 'start') {
        $step = 2;
    }
    elseif ($btn === 'install') {
        $dbHost = $_POST['db_host'] ?? 'localhost';
        $dbName = $_POST['db_name'] ?? '';
        $dbUser = $_POST['db_user'] ?? 'root';
        $dbPass = $_POST['db_pass'] ?? '';
        $sitePath = $_POST['site_path'] ?? '/ssdhost/nexus.ssdhostal.com';
        $adminName = $_POST['admin_name'] ?? 'Admin';
        $adminEmail = $_POST['admin_email'] ?? 'admin@ahostone.com';
        $adminPass = $_POST['admin_password'] ?? 'admin123';
        
        try {
            // Veritabanina baglan
            $pdo = new PDO("mysql:host=$dbHost;charset=utf8mb4", $dbUser, $dbPass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            // Veritabani olustur
            $pdo->exec("CREATE DATABASE IF NOT EXISTS `$dbName` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
            $pdo->exec("USE `$dbName`");
            
            // Tablolari sil ve olustur
            $pdo->exec("DROP TABLE IF EXISTS `tickets`");
            $pdo->exec("DROP TABLE IF EXISTS `domains`");
            $pdo->exec("DROP TABLE IF EXISTS `invoices`");
            $pdo->exec("DROP TABLE IF EXISTS `orders`");
            $pdo->exec("DROP TABLE IF EXISTS `products`");
            $pdo->exec("DROP TABLE IF EXISTS `customers`");
            $pdo->exec("DROP TABLE IF EXISTS `users`");
            $pdo->exec("DROP TABLE IF EXISTS `settings`");
            
            $pdo->exec("CREATE TABLE `users` (
                `id` INT AUTO_INCREMENT PRIMARY KEY,
                `name` VARCHAR(255) NOT NULL,
                `email` VARCHAR(255) UNIQUE NOT NULL,
                `password` VARCHAR(255) NOT NULL,
                `type` ENUM('admin','customer') DEFAULT 'customer',
                `status` ENUM('active','inactive') DEFAULT 'active',
                `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");
            
            $pdo->exec("CREATE TABLE `customers` (
                `id` INT AUTO_INCREMENT PRIMARY KEY,
                `user_id` INT,
                `name` VARCHAR(255) NOT NULL,
                `email` VARCHAR(255) NOT NULL,
                `phone` VARCHAR(50),
                `status` ENUM('active','inactive') DEFAULT 'active',
                `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");
            
            $pdo->exec("CREATE TABLE `products` (
                `id` INT AUTO_INCREMENT PRIMARY KEY,
                `name` VARCHAR(255) NOT NULL,
                `type` VARCHAR(50) DEFAULT 'hosting',
                `price` DECIMAL(10,2) NOT NULL,
                `period` VARCHAR(50) DEFAULT 'aylik',
                `status` ENUM('active','inactive') DEFAULT 'active',
                `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");
            
            $pdo->exec("CREATE TABLE `orders` (
                `id` INT AUTO_INCREMENT PRIMARY KEY,
                `customer_id` INT NOT NULL,
                `product_name` VARCHAR(255),
                `amount` DECIMAL(10,2) NOT NULL,
                `status` ENUM('pending','completed','cancelled') DEFAULT 'pending',
                `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");
            
            $pdo->exec("CREATE TABLE `invoices` (
                `id` INT AUTO_INCREMENT PRIMARY KEY,
                `customer_id` INT NOT NULL,
                `amount` DECIMAL(10,2) NOT NULL,
                `status` ENUM('paid','unpaid') DEFAULT 'unpaid',
                `due_date` DATE,
                `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");
            
            $pdo->exec("CREATE TABLE `domains` (
                `id` INT AUTO_INCREMENT PRIMARY KEY,
                `customer_id` INT,
                `domain` VARCHAR(255) NOT NULL,
                `expiry_date` DATE,
                `status` ENUM('active','expired') DEFAULT 'active',
                `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");
            
            $pdo->exec("CREATE TABLE `tickets` (
                `id` INT AUTO_INCREMENT PRIMARY KEY,
                `customer_id` INT,
                `subject` VARCHAR(255) NOT NULL,
                `message` TEXT,
                `status` ENUM('open','closed') DEFAULT 'open',
                `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");
            
            // Admin ekle
            $hash = password_hash($adminPass, PASSWORD_DEFAULT);
            $pdo->exec("INSERT INTO users (name, email, password, type) VALUES ('$adminName', '$adminEmail', '$hash', 'admin')");
            
            // Ornek urunler
            $pdo->exec("INSERT INTO products (name, type, price, period) VALUES 
                ('Baslangic Hosting', 'hosting', 49.00, 'aylik'),
                ('Profesyonel Hosting', 'hosting', 149.00, 'aylik'),
                ('Kurumsal Hosting', 'hosting', 399.00, 'aylik'),
                ('VPS Starter', 'vps', 199.00, 'aylik'),
                ('VPS Pro', 'vps', 499.00, 'aylik')
            ");
            
            // index.php guncelle
            $config = "<?php
@session_start();
define('SITE_NAME', 'Ahost One');
\$protocol = (!empty(\$_SERVER['HTTPS']) && \$_SERVER['HTTPS'] !== 'off') ? 'https://' : 'http://';
\$host = \$_SERVER['HTTP_HOST'] ?? 'localhost';
\$basePath = '$sitePath';
define('SITE_URL', \$protocol . \$host . \$basePath);
define('SITE_EMAIL', 'info@ahostone.com');
define('DB_HOST', '$dbHost');
define('DB_NAME', '$dbName');
define('DB_USER', '$dbUser');
define('DB_PASS', '$dbPass');
define('DEFAULT_THEME', 'midnight');
define('THEME_PATH', __DIR__ . '/public/assets/css/themes');

\$ACTIVE_THEME = \$_SESSION['active_theme'] ?? DEFAULT_THEME;

function base_url(\$p='') { return SITE_URL . '/' . ltrim(\$p, '/'); }
function theme_url(\$f='') { return base_url('public/assets/css/themes/' . \$ACTIVE_THEME . '/' . \$f); }
function css_url(\$f='') { return base_url('public/assets/css/' . \$f); }
function js_url(\$f='') { return base_url('public/assets/js/' . \$f); }
function db() {
    static \$pdo = null;
    if (!\$pdo) \$pdo = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset=utf8mb4', DB_USER, DB_PASS, [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION]);
    return \$pdo;
}
function redirect(\$u) { header('Location:'.\$u); exit; }
function isLoggedIn() { return isset(\$_SESSION['user_id']); }
function isAdmin() { return isset(\$_SESSION['user_type']) && \$_SESSION['user_type']==='admin'; }
function setFlash(\$t, \$m) { \$_SESSION['flash'][\$t]=\$m; }
function getFlash() { \$f=\$_SESSION['flash']??[]; unset(\$_SESSION['flash']); return \$f; }

date_default_timezone_set('Europe/Istanbul');

\$uri = \$_GET['route'] ?? (parse_url(\$_SERVER['REQUEST_URI'], PHP_URL_PATH) ?? '');
\$uri = trim(\$uri, '/');
\$seg = \$uri ? explode('/', \$uri) : [];
\$page = \$seg[0] ?? '';
\$action = \$seg[1] ?? '';

if (\$_SERVER['REQUEST_METHOD']==='POST' && \$page==='login') {
    \$pdo = db();
    \$stmt = \$pdo->prepare('SELECT * FROM users WHERE email=? LIMIT 1');
    \$stmt->execute([\$_POST['email']]);
    \$u = \$stmt->fetch(PDO::FETCH_ASSOC);
    if (\$u && password_verify(\$_POST['password'], \$u['password'])) {
        \$_SESSION['user_id']=\$u['id'];
        \$_SESSION['user']=\$u;
        \$_SESSION['user_type']=\$u['type'];
        redirect(\$u['type']==='admin'?'admin':'customer');
    } else { setFlash('error','Yanlis e-posta veya sifre!'); redirect('login'); }
}

if (\$_SERVER['REQUEST_METHOD']==='POST' && \$page==='register') {
    \$pdo = db();
    \$stmt = \$pdo->prepare('INSERT INTO users (name,email,password,type) VALUES (?,?,?,\"customer\")');
    \$stmt->execute([\$_POST['name'],\$_POST['email'],password_hash(\$_POST['password'],PASSWORD_DEFAULT)]);
    setFlash('success','Hesap olusturuldu!'); redirect('login');
}

if (\$page==='logout') { session_destroy(); redirect(''); }

switch (\$page) {
    case '': \$t='Ana Sayfa'; \$c='home'; require __DIR__.'/app/Views/site/home.php'; break;
    case 'hosting': \$t='Hosting'; require __DIR__.'/app/Views/site/hosting.php'; break;
    case 'vps': \$t='VPS'; require __DIR__.'/app/Views/site/vps.php'; break;
    case 'domain': \$t='Domain'; require __DIR__.'/app/Views/site/domain.php'; break;
    case 'pricing': \$t='Fiyat'; require __DIR__.'/app/Views/site/pricing.php'; break;
    case 'support': \$t='Destek'; require __DIR__.'/app/Views/site/support.php'; break;
    case 'about': \$t='Hakkimizda'; require __DIR__.'/app/Views/site/about.php'; break;
    case 'contact': \$t='Iletisim'; require __DIR__.'/app/Views/site/contact.php'; break;
    case 'blog': \$t='Blog'; require __DIR__.'/app/Views/site/blog.php'; break;
    case 'site-builder': \$t='Site Builder'; require __DIR__.'/app/Views/site/site-builder.php'; break;
    case 'marketplace': \$t='Marketplace'; require __DIR__.'/app/Views/site/marketplace.php'; break;
    case 'login':
        \$t='Giris';
        if (!isLoggedIn()) require __DIR__.'/app/Views/auth/login.php';
        else redirect(isAdmin()?'admin':'customer');
        break;
    case 'register':
        \$t='Kayit';
        if (!isLoggedIn()) require __DIR__.'/app/Views/auth/register.php';
        else redirect('customer');
        break;
    case 'admin':
        if (!isAdmin()) redirect('login');
        \$ap = \$action ?:\$p='dashboard';
        \$pages=['dashboard'=>'admin/dashboard','customers'=>'admin/customers','orders'=>'admin/orders','products'=>'admin/products','domains'=>'admin/domains','hosting'=>'admin/hosting-server/index','support'=>'admin/support','invoices'=>'admin/invoices','settings'=>'admin/settings','ai-center'=>'admin/ai-center','modules'=>'admin/modules','announcements'=>'admin/announcements','health'=>'admin/health-center/index','backup'=>'admin/backup-center/index','help'=>'admin/help-center/index'];
        require __DIR__.'/app/Views/'.(\$pages[\$ap]??'admin/dashboard').'.php';
        break;
    case 'admin/login':
        \$t='Admin Giris';
        require __DIR__.'/app/Views/admin/login.php';
        break;
    case 'customer':
        if (!isLoggedIn()) redirect('login');
        \$cp = \$action ?:\$p='dashboard';
        \$pages=['dashboard'=>'customer/dashboard','services'=>'customer/services','invoices'=>'customer/invoices','support'=>'customer/support','profile'=>'customer/profile'];
        require __DIR__.'/app/Views/'.(\$pages[\$cp]??'customer/dashboard').'.php';
        break;
    default: http_response_code(404); \$t='404'; require __DIR__.'/app/Views/errors/404.php';
}";
            
            file_put_contents(__DIR__ . '/index.php', $config);
            
            $success = true;
            
        } catch (Exception $e) {
            $error = $e->getMessage();
            $step = 2;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kurulum - Ahost One</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        *{margin:0;padding:0;box-sizing:border-box}
        body{font-family:'Inter',sans-serif;background:linear-gradient(135deg,#0f172a,#1e1b4b);color:#e2e8f0;min-height:100vh;display:flex;align-items:center;justify-content:center;padding:20px}
        .card{background:#1e293b;border-radius:20px;padding:48px;max-width:600px;width:100%;box-shadow:0 25px 50px rgba(0,0,0,0.5)}
        .logo{width:80px;height:80px;background:linear-gradient(135deg,#667eea,#764ba2);border-radius:20px;display:flex;align-items:center;justify-content:center;font-size:36px;font-weight:700;color:#fff;margin:0 auto 20px}
        h1{font-size:28px;text-align:center;color:#fff;margin-bottom:8px}
        p{color:#94a3b8;text-align:center;margin-bottom:32px}
        .steps{display:flex;justify-content:center;gap:16px;margin-bottom:40px}
        .step{width:44px;height:44px;border-radius:50%;display:flex;align-items:center;justify-content:center;font-weight:600;background:#334155;color:#94a3b8}
        .step.active{background:linear-gradient(135deg,#667eea,#764ba2);color:#fff}
        .step.done{background:#10b981;color:#fff}
        .info{background:#0f172a;border-radius:12px;padding:20px;margin-bottom:24px}
        .info p{text-align:left;font-size:14px;margin-bottom:8px}
        .info strong{color:#e2e8f0}
        .form{margin-bottom:24px}
        .form label{display:block;margin-bottom:8px;font-weight:500;color:#e2e8f0}
        .form input{width:100%;padding:14px 18px;background:#0f172a;border:2px solid #334155;border-radius:12px;color:#fff;font-size:16px;margin-bottom:16px}
        .form input:focus{outline:none;border-color:#667eea}
        .btn{width:100%;padding:16px;background:linear-gradient(135deg,#667eea,#764ba2);color:#fff;border:none;border-radius:12px;font-size:16px;font-weight:600;cursor:pointer}
        .btn:hover{transform:translateY(-2px);box-shadow:0 10px 30px rgba(102,126,234,0.4)}
        .success{text-align:center;padding:40px 0}
        .success i{font-size:64px;color:#10b981;margin-bottom:20px}
        .success h2{font-size:28px;color:#fff;margin-bottom:16px}
        .success p{color:#94a3b8;margin-bottom:24px}
        .err{background:rgba(239,68,68,0.1);border:1px solid #ef4444;border-radius:12px;padding:16px;color:#ef4444;margin-bottom:24px}
    </style>
</head>
<body>
<div class="card">
    <div class="logo">A</div>
    <h1>Ahost One Kurulum</h1>
    <p>Veritabani ve site ayarlarini yapin</p>
    
    <div class="steps">
        <div class="step <?= $step > 1 ? 'done' : ($step == 1 ? 'active' : '') ?>"><?= $step > 1 ? '✓' : '1' ?></div>
        <div class="step <?= $step > 2 ? 'done' : ($step == 2 ? 'active' : '') ?>"><?= $step > 2 ? '✓' : '2' ?></div>
    </div>
    
    <?php if ($error): ?>
    <div class="err"><i class="fas fa-exclamation-circle"></i> <?= htmlspecialchars($error) ?></div>
    <?php endif; ?>
    
    <?php if ($success): ?>
    <div class="success">
        <i class="fas fa-check-circle"></i>
        <h2>Kurulum Tamamlandi!</h2>
        <p>Veritabani olusturuldu ve index.php guncellendi.</p>
        <div class="info">
            <p><strong>Admin Giris:</strong></p>
            <p>E-posta: <?= htmlspecialchars($_POST['admin_email'] ?? '') ?></p>
            <p>Sifre: <?= htmlspecialchars($_POST['admin_password'] ?? '') ?></p>
        </div>
        <a href="index.php" class="btn">Siteye Git</a>
    </div>
    <?php elseif ($step == 1): ?>
    <div class="info">
        <p><i class="fas fa-info-circle"></i> <strong>Kurulum bilgilendirmesi:</strong></p>
        <p>- Veritabani olusturulacak veya kullanilacak</p>
        <p>- Tum tablolar silinip yeniden olusturulacak</p>
        <p>- index.php dosyasi guncellenecek</p>
        <p>- Admin hesabi olusturulacak</p>
    </div>
    <form method="POST">
        <input type="hidden" name="btn" value="start">
        <button type="submit" class="btn"><i class="fas fa-arrow-right"></i> Kuruluma Basla</button>
    </form>
    <?php else: ?>
    <form method="POST">
        <input type="hidden" name="btn" value="install">
        
        <h3 style="color:#fff;margin-bottom:20px;text-align:center">Site Ayarlari</h3>
        <div class="form">
            <label>Site Yolu</label>
            <input type="text" name="site_path" value="/ssdhost/nexus.ssdhostal.com" required>
        </div>
        
        <h3 style="color:#fff;margin-bottom:20px;text-align:center">Veritabani</h3>
        <div class="form">
            <label>Host</label>
            <input type="text" name="db_host" value="localhost" required>
            <label>Veritabani Adi</label>
            <input type="text" name="db_name" placeholder="ahost_one" required>
            <label>Kullanici</label>
            <input type="text" name="db_user" value="root" required>
            <label>Sifre</label>
            <input type="password" name="db_pass" placeholder="(bos birakilabilir)">
        </div>
        
        <h3 style="color:#fff;margin-bottom:20px;text-align:center">Admin Hesabi</h3>
        <div class="form">
            <label>Ad Soyad</label>
            <input type="text" name="admin_name" value="Admin" required>
            <label>E-posta</label>
            <input type="email" name="admin_email" value="admin@ahostone.com" required>
            <label>Sifre</label>
            <input type="password" name="admin_password" value="admin123" required minlength="6">
        </div>
        
        <button type="submit" class="btn"><i class="fas fa-database"></i> Kurulumu Tamamla</button>
    </form>
    <?php endif; ?>
</div>
</body>
</html>
