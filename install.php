<?php
/**
 * Kurulum Sihirbazi - Ahost One
 * Veritabani olusturur, tablolari siler/yeniden olusturur, config yazar
 */
@session_start();

$SITE_NAME = 'Ahost One';
$step = isset($_GET['step']) ? (int)$_GET['step'] : 1;
$success = false;
$error = '';
$dbConnected = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $postStep = isset($_POST['go_step']) ? (int)$_POST['go_step'] : $step + 1;
    
    if ($postStep == 2) { 
        $step = 2; 
    }
    elseif ($postStep == 3) {
        $dbHost = $_POST['db_host'] ?? 'localhost';
        $dbName = $_POST['db_name'] ?? '';
        $dbUser = $_POST['db_user'] ?? 'root';
        $dbPass = $_POST['db_pass'] ?? '';
        $sitePath = $_POST['site_path'] ?? '/ssdhost/nexus.ssdhostal.com';
        
        // Veritabanina baglan
        try {
            $pdo = new PDO("mysql:host=$dbHost", $dbUser, $dbPass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            // Veritabani olustur
            $pdo->exec("CREATE DATABASE IF NOT EXISTS `$dbName` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
            $pdo->exec("USE `$dbName`");
            
            // Tablolari sil ve yeniden olustur
            $sql = "
            -- Kullanicilar
            DROP TABLE IF EXISTS `users`;
            CREATE TABLE `users` (
                `id` INT AUTO_INCREMENT PRIMARY KEY,
                `name` VARCHAR(255) NOT NULL,
                `email` VARCHAR(255) UNIQUE NOT NULL,
                `password` VARCHAR(255) NOT NULL,
                `type` ENUM('admin','customer') DEFAULT 'customer',
                `status` ENUM('active','inactive') DEFAULT 'active',
                `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
            
            -- Musteriler
            DROP TABLE IF EXISTS `customers`;
            CREATE TABLE `customers` (
                `id` INT AUTO_INCREMENT PRIMARY KEY,
                `user_id` INT,
                `name` VARCHAR(255) NOT NULL,
                `email` VARCHAR(255) NOT NULL,
                `phone` VARCHAR(50),
                `company` VARCHAR(255),
                `address` TEXT,
                `status` ENUM('active','inactive') DEFAULT 'active',
                `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE SET NULL
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
            
            -- Urunler
            DROP TABLE IF EXISTS `products`;
            CREATE TABLE `products` (
                `id` INT AUTO_INCREMENT PRIMARY KEY,
                `name` VARCHAR(255) NOT NULL,
                `type` ENUM('hosting','vps','domain','ssl','other') DEFAULT 'hosting',
                `description` TEXT,
                `price` DECIMAL(10,2) NOT NULL,
                `period` VARCHAR(50) DEFAULT 'aylik',
                `features` TEXT,
                `status` ENUM('active','inactive') DEFAULT 'active',
                `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
            
            -- Siparisler
            DROP TABLE IF EXISTS `orders`;
            CREATE TABLE `orders` (
                `id` INT AUTO_INCREMENT PRIMARY KEY,
                `customer_id` INT NOT NULL,
                `product_id` INT,
                `product_name` VARCHAR(255),
                `amount` DECIMAL(10,2) NOT NULL,
                `status` ENUM('pending','processing','completed','cancelled') DEFAULT 'pending',
                `payment_method` VARCHAR(50),
                `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                FOREIGN KEY (customer_id) REFERENCES customers(id) ON DELETE CASCADE
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
            
            -- Faturalar
            DROP TABLE IF EXISTS `invoices`;
            CREATE TABLE `invoices` (
                `id` INT AUTO_INCREMENT PRIMARY KEY,
                `customer_id` INT NOT NULL,
                `order_id` INT,
                `amount` DECIMAL(10,2) NOT NULL,
                `status` ENUM('paid','unpaid','cancelled') DEFAULT 'unpaid',
                `due_date` DATE,
                `paid_at` TIMESTAMP NULL,
                `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                FOREIGN KEY (customer_id) REFERENCES customers(id) ON DELETE CASCADE
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
            
            -- Domainler
            DROP TABLE IF EXISTS `domains`;
            CREATE TABLE `domains` (
                `id` INT AUTO_INCREMENT PRIMARY KEY,
                `customer_id` INT,
                `domain` VARCHAR(255) NOT NULL,
                `registrar` VARCHAR(100),
                `registration_date` DATE,
                `expiry_date` DATE,
                `dns_status` VARCHAR(50),
                `status` ENUM('active','expired','pending') DEFAULT 'active',
                `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                FOREIGN KEY (customer_id) REFERENCES customers(id) ON DELETE SET NULL
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
            
            -- Destek Talepleri
            DROP TABLE IF EXISTS `tickets`;
            CREATE TABLE `tickets` (
                `id` INT AUTO_INCREMENT PRIMARY KEY,
                `customer_id` INT,
                `subject` VARCHAR(255) NOT NULL,
                `message` TEXT,
                `priority` ENUM('low','medium','high') DEFAULT 'medium',
                `status` ENUM('open','answered','closed') DEFAULT 'open',
                `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                FOREIGN KEY (customer_id) REFERENCES customers(id) ON DELETE SET NULL
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
            
            -- Ayarlar
            DROP TABLE IF EXISTS `settings`;
            CREATE TABLE `settings` (
                `id` INT AUTO_INCREMENT PRIMARY KEY,
                `key` VARCHAR(100) UNIQUE NOT NULL,
                `value` TEXT,
                `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
            ";
            
            $pdo->exec($sql);
            
            // Admin kullanicisi olustur
            $adminPass = password_hash($_POST['admin_password'] ?? 'admin123', PASSWORD_DEFAULT);
            $stmt = $pdo->prepare("INSERT INTO users (name, email, password, type) VALUES (?, ?, ?, 'admin')");
            $stmt->execute([$_POST['admin_name'] ?? 'Admin', $_POST['admin_email'] ?? 'admin@ahostone.com', $adminPass]);
            
            // Ayarlari kaydet
            $pdo->exec("INSERT INTO settings (`key`, value) VALUES ('site_name', '$SITE_NAME') ON DUPLICATE KEY UPDATE value=VALUES(value)");
            $pdo->exec("INSERT INTO settings (`key`, value) VALUES ('site_url', 'https://' . (SELECT SUBSTRING_INDEX(?, 'ssdhost', 1) FROM dual)) ON DUPLICATE KEY UPDATE value=VALUES(value)");
            
            // index.php dosyasini guncelle
            $indexContent = file_get_contents(__DIR__ . '/index.php');
            
            $newConfig = "<?php
/**
 * Ahost One - Premium SaaS Platform
 * Sifirdan Yazildi
 */

// ============================================
// KONFIGURASYON
// ============================================
define('SITE_NAME', '$SITE_NAME');
\$protocol = (!empty(\$_SERVER['HTTPS']) && \$_SERVER['HTTPS'] !== 'off') ? 'https://' : 'http://';
\$host = \$_SERVER['HTTP_HOST'] ?? 'localhost';
\$basePath = '$sitePath';
define('SITE_URL', \$protocol . \$host . \$basePath);
define('SITE_EMAIL', 'info@ahostone.com');

// Veritabani
define('DB_HOST', '$dbHost');
define('DB_NAME', '$dbName');
define('DB_USER', '$dbUser');
define('DB_PASS', '$dbPass');

// Tema Sistemi
define('DEFAULT_THEME', 'midnight');
define('THEME_PATH', __DIR__ . '/public/assets/css/themes');
\$ACTIVE_THEME = \$_SESSION['active_theme'] ?? DEFAULT_THEME;

// ============================================
// YARDIMCI FONKSIYONLAR
// ============================================

function theme_url(\$file = '') {
    return base_url('public/assets/css/themes/' . \$ACTIVE_THEME . '/' . ltrim(\$file, '/'));
}

function css_url(\$file = '') {
    return base_url('public/assets/css/' . ltrim(\$file, '/'));
}

function js_url(\$file = '') {
    return base_url('public/assets/js/' . ltrim(\$file, '/'));
}

function base_url(\$path = '') {
    return SITE_URL . '/' . ltrim(\$path, '/');
}

function view(\$view, \$data = []) {
    extract(\$data);
    \$viewFile = __DIR__ . '/app/Views/' . str_replace('.', '/', \$view) . '.php';
    if (file_exists(\$viewFile)) {
        require \$viewFile;
    } else {
        echo 'View bulunamadi: ' . \$view;
    }
}

function redirect(\$url) {
    header('Location: ' . \$url);
    exit;
}

function isLoggedIn() {
    return isset(\$_SESSION['user_id']);
}

function isAdmin() {
    return isset(\$_SESSION['user_type']) && \$_SESSION['user_type'] === 'admin';
}

function currentUser() {
    return \$_SESSION['user'] ?? null;
}

function setFlash(\$type, \$message) {
    \$_SESSION['flash'][\$type] = \$message;
}

function getFlash() {
    if (isset(\$_SESSION['flash'])) {
        \$flash = \$_SESSION['flash'];
        unset(\$_SESSION['flash']);
        return \$flash;
    }
    return [];
}

// Veritabani baglantisi
function db() {
    static \$pdo = null;
    if (\$pdo === null) {
        try {
            \$pdo = new PDO(
                'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4',
                DB_USER,
                DB_PASS,
                [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
            );
        } catch (PDOException \$e) {
            die('Veritabani hatasi: ' . \$e->getMessage());
        }
    }
    return \$pdo;
}

// ============================================
// OTURUM BASLAT
// ============================================
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

date_default_timezone_set('Europe/Istanbul');

// ============================================
// ROUTER
// ============================================
\$uri = isset(\$_GET['route']) ? \$_GET['route'] : (parse_url(\$_SERVER['REQUEST_URI'], PHP_URL_PATH) ?? '');
\$uri = trim(\$uri, '/');
\$segments = \$uri ? explode('/', \$uri) : [];
\$page = \$segments[0] ?? '';
\$action = \$segments[1] ?? '';

// AJAX
if (isset(\$_GET['ajax']) || isset(\$_POST['ajax'])) {
    header('Content-Type: application/json');
    if (isset(\$_POST['action'])) {
        \$result = ['success' => false];
        echo json_encode(\$result);
    }
    exit;
}

// Sayfa yonlendirme
switch (\$page) {
    case '':
        \$pageTitle = 'Ana Sayfa - ' . SITE_NAME;
        \$current_page = 'home';
        require __DIR__ . '/app/Views/site/home.php';
        break;
    
    case 'hosting':
        \$pageTitle = 'Web Hosting - ' . SITE_NAME;
        \$current_page = 'hosting';
        require __DIR__ . '/app/Views/site/hosting.php';
        break;
    
    case 'vps':
        \$pageTitle = 'VPS Sunucular - ' . SITE_NAME;
        \$current_page = 'vps';
        require __DIR__ . '/app/Views/site/vps.php';
        break;
    
    case 'domain':
        \$pageTitle = 'Domain Kayit - ' . SITE_NAME;
        \$current_page = 'domain';
        require __DIR__ . '/app/Views/site/domain.php';
        break;
    
    case 'pricing':
        \$pageTitle = 'Fiyatlandirma - ' . SITE_NAME;
        \$current_page = 'pricing';
        require __DIR__ . '/app/Views/site/pricing.php';
        break;
    
    case 'support':
        \$pageTitle = 'Destek - ' . SITE_NAME;
        \$current_page = 'support';
        require __DIR__ . '/app/Views/site/support.php';
        break;
    
    case 'about':
        \$pageTitle = 'Hakkimizda - ' . SITE_NAME;
        \$current_page = 'about';
        require __DIR__ . '/app/Views/site/about.php';
        break;
    
    case 'contact':
        \$pageTitle = 'Iletisim - ' . SITE_NAME;
        \$current_page = 'contact';
        require __DIR__ . '/app/Views/site/contact.php';
        break;
    
    case 'blog':
        \$pageTitle = 'Blog - ' . SITE_NAME;
        \$current_page = 'blog';
        require __DIR__ . '/app/Views/site/blog.php';
        break;
    
    case 'site-builder':
        \$pageTitle = 'Site Builder - ' . SITE_NAME;
        \$current_page = 'site-builder';
        require __DIR__ . '/app/Views/site/site-builder.php';
        break;
    
    case 'marketplace':
        \$pageTitle = 'Marketplace - ' . SITE_NAME;
        \$current_page = 'marketplace';
        require __DIR__ . '/app/Views/site/marketplace.php';
        break;
    
    // OTURUM
    case 'login':
        if (\$_SERVER['REQUEST_METHOD'] === 'POST') {
            \$pdo = db();
            \$stmt = \$pdo->prepare('SELECT * FROM users WHERE email = ? LIMIT 1');
            \$stmt->execute([\$_POST['email']]);
            \$user = \$stmt->fetch(PDO::FETCH_ASSOC);
            if (\$user && password_verify(\$_POST['password'], \$user['password'])) {
                \$_SESSION['user_id'] = \$user['id'];
                \$_SESSION['user'] = \$user;
                \$_SESSION['user_type'] = \$user['type'];
                setFlash('success', 'Hos geldiniz!');
                redirect(\$user['type'] === 'admin' ? 'admin' : 'customer');
            } else {
                setFlash('error', 'E-posta veya sifre yanlis!');
                redirect('login');
            }
        }
        \$pageTitle = 'Giris - ' . SITE_NAME;
        \$current_page = 'login';
        require __DIR__ . '/app/Views/auth/login.php';
        break;
    
    case 'register':
        if (\$_SERVER['REQUEST_METHOD'] === 'POST') {
            \$pdo = db();
            \$password = password_hash(\$_POST['password'], PASSWORD_DEFAULT);
            \$stmt = \$pdo->prepare('INSERT INTO users (name, email, password, type) VALUES (?, ?, ?, \"customer\")');
            \$stmt->execute([\$_POST['name'], \$_POST['email'], \$password]);
            setFlash('success', 'Hesabiniz olusturuldu!');
            redirect('login');
        }
        \$pageTitle = 'Kayit - ' . SITE_NAME;
        \$current_page = 'register';
        require __DIR__ . '/app/Views/auth/register.php';
        break;
    
    case 'logout':
        session_destroy();
        redirect('');
        break;
    
    // ADMIN
    case 'admin':
        if (!isAdmin()) {
            redirect('login');
        }
        \$adminPage = \$action ?: 'dashboard';
        \$adminPages = [
            'dashboard' => 'admin/dashboard',
            'customers' => 'admin/customers',
            'orders' => 'admin/orders',
            'products' => 'admin/products',
            'domains' => 'admin/domains',
            'hosting' => 'admin/hosting-server/index',
            'support' => 'admin/support',
            'invoices' => 'admin/invoices',
            'settings' => 'admin/settings',
            'ai-center' => 'admin/ai-center',
            'modules' => 'admin/modules',
            'announcements' => 'admin/announcements',
            'health' => 'admin/health-center/index',
            'backup' => 'admin/backup-center/index',
            'help' => 'admin/help-center/index',
        ];
        if (isset(\$adminPages[\$adminPage])) {
            \$pageTitle = ucfirst(\$adminPage) . ' - Admin';
            require __DIR__ . '/app/Views/' . \$adminPages[\$adminPage] . '.php';
        } else {
            require __DIR__ . '/app/Views/admin/dashboard.php';
        }
        break;
    
    case 'admin/login':
        if (\$_SERVER['REQUEST_METHOD'] === 'POST') {
            \$pdo = db();
            \$stmt = \$pdo->prepare('SELECT * FROM users WHERE email = ? AND type = \"admin\" LIMIT 1');
            \$stmt->execute([\$_POST['email']]);
            \$user = \$stmt->fetch(PDO::FETCH_ASSOC);
            if (\$user && password_verify(\$_POST['password'], \$user['password'])) {
                \$_SESSION['user_id'] = \$user['id'];
                \$_SESSION['user'] = \$user;
                \$_SESSION['user_type'] = 'admin';
                setFlash('success', 'Admin hos geldiniz!');
                redirect('admin');
            } else {
                setFlash('error', 'E-posta veya sifre yanlis!');
                redirect('admin/login');
            }
        }
        \$pageTitle = 'Admin Giris - ' . SITE_NAME;
        require __DIR__ . '/app/Views/admin/login.php';
        break;
    
    // MUSTERI PANELI
    case 'customer':
        if (!isLoggedIn()) {
            redirect('login');
        }
        \$customerPage = \$action ?: 'dashboard';
        \$customerPages = [
            'dashboard' => 'customer/dashboard',
            'services' => 'customer/services',
            'domains' => 'customer/domains',
            'invoices' => 'customer/invoices',
            'support' => 'customer/support',
            'profile' => 'customer/profile',
        ];
        if (isset(\$customerPages[\$customerPage])) {
            require __DIR__ . '/app/Views/' . \$customerPages[\$customerPage] . '.php';
        } else {
            require __DIR__ . '/app/Views/customer/dashboard.php';
        }
        break;
    
    // 404
    default:
        http_response_code(404);
        \$pageTitle = '404 - Bulunamadi';
        require __DIR__ . '/app/Views/errors/404.php';
}
";
            
            file_put_contents(__DIR__ . '/index.php', $newConfig);
            
            $dbConnected = true;
            $step = 4;
            
        } catch (PDOException $e) {
            $error = 'Veritabani hatasi: ' . $e->getMessage();
            $step = 2;
        }
    }
    elseif ($postStep == 4) { 
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
        .form-group input, .form-group select { width: 100%; padding: 14px 18px; background: #0f172a; border: 2px solid #334155; border-radius: 12px; color: white; font-size: 16px; transition: all 0.2s; }
        .form-group input:focus, .form-group select:focus { outline: none; border-color: #667eea; }
        .form-group input::placeholder { color: #64748b; }
        .btn { display: inline-flex; align-items: center; justify-content: center; gap: 10px; padding: 16px 32px; font-size: 16px; font-weight: 600; border-radius: 12px; border: none; cursor: pointer; transition: all 0.2s; text-decoration: none; }
        .btn-primary { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; width: 100%; }
        .btn-primary:hover { transform: translateY(-2px); box-shadow: 0 10px 30px rgba(102, 126, 234, 0.4); }
        .success { text-align: center; padding: 40px 0; }
        .success-icon { width: 100px; height: 100px; background: rgba(16, 185, 129, 0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 24px; }
        .success-icon i { font-size: 48px; color: #10b981; }
        .success h2 { font-size: 28px; margin-bottom: 16px; color: white; }
        .success p { color: #94a3b8; margin-bottom: 24px; }
        h3 { color: white; margin-bottom: 20px; }
        .error-msg { background: rgba(239, 68, 68, 0.1); border: 1px solid #ef4444; border-radius: 12px; padding: 16px; margin-bottom: 24px; color: #ef4444; }
        .info-box { background: #0f172a; border-radius: 12px; padding: 16px; margin-bottom: 24px; }
        .info-box p { font-size: 14px; color: #94a3b8; margin-bottom: 8px; }
        .info-box strong { color: #e2e8f0; }
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
            <div class="step-label">Baslangic</div>
        </div>
        <div style="text-align:center;">
            <div class="step <?php echo $step > 2 ? 'completed' : ($step == 2 ? 'active' : ''); ?>"><?php echo $step > 2 ? '<i class="fas fa-check"></i>' : '2'; ?></div>
            <div class="step-label">Veritabani</div>
        </div>
        <div style="text-align:center;">
            <div class="step <?php echo $step > 3 ? 'completed' : ($step == 3 ? 'active' : ''); ?>"><?php echo $step > 3 ? '<i class="fas fa-check"></i>' : '3'; ?></div>
            <div class="step-label">Tamamla</div>
        </div>
    </div>
    
    <?php if ($error): ?>
        <div class="error-msg"><i class="fas fa-exclamation-circle"></i> <?php echo $error; ?></div>
    <?php endif; ?>
    
    <?php if ($success): ?>
        <div class="success">
            <div class="success-icon"><i class="fas fa-check-circle"></i></div>
            <h2>Kurulum Tamamlandi!</h2>
            <p>Veritabani olusturuldu, tablolar yenilendi ve config yazildi.</p>
            <div class="info-box">
                <p><strong>Admin Giris:</strong></p>
                <p>E-posta: <?php echo $_POST['admin_email'] ?? 'admin@ahostone.com'; ?></p>
                <p>Sifre: (girdiginiz sifre)</p>
            </div>
            <a href="index.php" class="btn btn-primary"><i class="fas fa-rocket"></i> Siteye Git</a>
        </div>
    <?php elseif ($step == 1): ?>
        <div class="info-box">
            <p><i class="fas fa-info-circle"></i> <strong>Kurulum Notlari:</strong></p>
            <p>- Veritabani: <?php echo DB_NAME ?? 'ahostone'; ?></p>
            <p>- Site yolu: /ssdhost/nexus.ssdhostal.com</p>
            <p>- Tum tablolar silinip yeniden olusturulacak</p>
        </div>
        <form method="POST">
            <input type="hidden" name="go_step" value="2">
            <button type="submit" class="btn btn-primary"><i class="fas fa-arrow-right"></i> Kuruluma Basla</button>
        </form>
    <?php elseif ($step == 2): ?>
        <h3>Veritabani ve Site Ayarlari</h3>
        <form method="POST">
            <input type="hidden" name="go_step" value="3">
            <div class="form-group">
                <label>Site Yolu</label>
                <input type="text" name="site_path" value="/ssdhost/nexus.ssdhostal.com" required>
            </div>
            <div class="form-group">
                <label>Veritabani Host</label>
                <input type="text" name="db_host" value="localhost" required>
            </div>
            <div class="form-group">
                <label>Veritabani Adi</label>
                <input type="text" name="db_name" placeholder="ahost_one" required>
            </div>
            <div class="form-group">
                <label>Veritabani Kullanici</label>
                <input type="text" name="db_user" placeholder="root" required>
            </div>
            <div class="form-group">
                <label>Veritabani Sifre</label>
                <input type="password" name="db_pass" placeholder="********">
            </div>
            <hr style="border-color:#334155;margin:24px 0;">
            <h3>Admin Hesabi</h3>
            <div class="form-group">
                <label>Admin Ad Soyad</label>
                <input type="text" name="admin_name" placeholder="Admin" required value="Admin">
            </div>
            <div class="form-group">
                <label>Admin E-posta</label>
                <input type="email" name="admin_email" placeholder="admin@ahostone.com" required value="admin@ahostone.com">
            </div>
            <div class="form-group">
                <label>Admin Sifre</label>
                <input type="password" name="admin_password" placeholder="********" required minlength="6" value="admin123">
            </div>
            <button type="submit" class="btn btn-primary"><i class="fas fa-database"></i> Veritabani Olustur ve Kur</button>
        </form>
    <?php endif; ?>
</div>
</body>
</html>
