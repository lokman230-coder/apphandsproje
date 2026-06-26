<?php
/**
 * Ahost One - Premium SaaS Platform
 * Sıfırdan Yazıldı
 */

// ============================================
// KONFİGÜRASYON
// ============================================
define('SITE_NAME', 'Ahost One');
define('SITE_URL', 'http://localhost');
define('SITE_EMAIL', 'info@ahostone.com');

// Veritabanı
define('DB_HOST', 'localhost');
define('DB_NAME', 'ahostone');
define('DB_USER', 'root');
define('DB_PASS', '');

// Tema Sistemi
define('DEFAULT_THEME', 'midnight'); // Varsayılan tema
define('THEME_PATH', __DIR__ . '/public/assets/css/themes');

// Aktif Tema (URL'den veya oturumdan alınabilir)
if (isset($_GET['theme'])) {
    $_SESSION['active_theme'] = $_GET['theme'];
}
$ACTIVE_THEME = $_SESSION['active_theme'] ?? DEFAULT_THEME;

// ============================================
// YARDIMCI FONKSİYONLAR
// ============================================

// Tema yolu
function theme_url($file = '') {
    return base_url('public/assets/css/themes/' . $ACTIVE_THEME . '/' . ltrim($file, '/'));
}

// Ana CSS yolu
function css_url($file = '') {
    return base_url('public/assets/css/' . ltrim($file, '/'));
}

// JS yolu
function js_url($file = '') {
    return base_url('public/assets/js/' . ltrim($file, '/'));
}

// Base URL
function base_url($path = '') {
    return SITE_URL . '/' . ltrim($path, '/');
}

// View yükle
function view($view, $data = []) {
    extract($data);
    $viewFile = __DIR__ . '/app/Views/' . str_replace('.', '/', $view) . '.php';
    if (file_exists($viewFile)) {
        require $viewFile;
    } else {
        echo "View bulunamadı: $view";
    }
}

// Yönlendirme
function redirect($url) {
    header("Location: $url");
    exit;
}

// Debug
function dd($data) {
    echo '<pre>';
    print_r($data);
    echo '</pre>';
    exit;
}

// Oturum kontrolü
function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

function isAdmin() {
    return isset($_SESSION['user_type']) && $_SESSION['user_type'] === 'admin';
}

function currentUser() {
    return $_SESSION['user'] ?? null;
}

// Flash mesajları
function setFlash($type, $message) {
    $_SESSION['flash'][$type] = $message;
}

function getFlash() {
    if (isset($_SESSION['flash'])) {
        $flash = $_SESSION['flash'];
        unset($_SESSION['flash']);
        return $flash;
    }
    return [];
}

// ============================================
// OTURUM BAŞLAT
// ============================================
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

date_default_timezone_set('Europe/Istanbul');

// ============================================
// DEMO VERİLER
// ============================================
if (!isset($_SESSION['initialized'])) {
    $_SESSION['initialized'] = true;
    
    $_SESSION['customers'] = [
        ['id' => 1, 'name' => 'Ahmet Kaya', 'email' => 'ahmet@ornek.com', 'phone' => '0532 123 4567', 'status' => 'active', 'created_at' => '2024-01-15'],
        ['id' => 2, 'name' => 'Elif Yılmaz', 'email' => 'elif@ornek.com', 'phone' => '0533 234 5678', 'status' => 'active', 'created_at' => '2024-02-20'],
        ['id' => 3, 'name' => 'Mehmet Demir', 'email' => 'mehmet@ornek.com', 'phone' => '0534 345 6789', 'status' => 'inactive', 'created_at' => '2024-03-10'],
    ];
    
    $_SESSION['orders'] = [
        ['id' => 1, 'customer_id' => 1, 'product' => 'Kurumsal Hosting', 'amount' => 2999, 'status' => 'completed', 'created_at' => '2024-06-20'],
        ['id' => 2, 'customer_id' => 2, 'product' => 'VPS Server', 'amount' => 1499, 'status' => 'pending', 'created_at' => '2024-06-22'],
        ['id' => 3, 'customer_id' => 1, 'product' => 'SSL Sertifika', 'amount' => 499, 'status' => 'completed', 'created_at' => '2024-06-23'],
    ];
    
    $_SESSION['tickets'] = [
        ['id' => 1, 'customer_id' => 1, 'subject' => 'Hosting hesabım çalışmıyor', 'status' => 'open', 'priority' => 'high', 'created_at' => '2024-06-24'],
        ['id' => 2, 'customer_id' => 2, 'subject' => 'SSL sertifikası kurulumu', 'status' => 'answered', 'priority' => 'medium', 'created_at' => '2024-06-23'],
    ];
    
    $_SESSION['cart'] = [];
    
    $_SESSION['products'] = [
        ['id' => 1, 'name' => 'Başlangıç Hosting', 'price' => 49, 'period' => 'aylık', 'features' => ['10 GB Disk', '1 Domain', 'Ücretsiz SSL', '7/24 Destek']],
        ['id' => 2, 'name' => 'Profesyonel Hosting', 'price' => 149, 'period' => 'aylık', 'features' => ['50 GB Disk', 'Sınırsız Domain', 'Ücretsiz Domain', 'CDN', 'Öncelikli Destek']],
        ['id' => 3, 'name' => 'Kurumsal Hosting', 'price' => 399, 'period' => 'aylık', 'features' => ['200 GB Disk', 'Sınırsız Her Şey', 'Dedicated IP', 'VIP Destek', 'Yedekleme']],
    ];
}

// ============================================
// ROUTER
// ============================================
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = trim($uri, '/');
$segments = $uri ? explode('/', $uri) : [];
$page = $segments[0] ?? '';
$action = $segments[1] ?? '';

// AJAX istekleri
if (isset($_GET['ajax']) || isset($_POST['ajax'])) {
    header('Content-Type: application/json');
    
    if (isset($_POST['action'])) {
        switch ($_POST['action']) {
            case 'add_to_cart':
                $_SESSION['cart'][] = intval($_POST['product_id'] ?? 0);
                echo json_encode(['success' => true, 'count' => count($_SESSION['cart'])]);
                break;
                
            case 'check_domain':
                $domain = $_POST['domain'] ?? '';
                $exts = ['.com' => rand(0, 1), '.net' => rand(0, 1), '.org' => rand(0, 1), '.io' => rand(0, 1)];
                echo json_encode(['success' => true, 'domain' => $domain, 'results' => $exts]);
                break;
                
            default:
                echo json_encode(['error' => 'Bilinmeyen işlem']);
        }
    }
    exit;
}

// Sayfa yönlendirme
switch ($page) {
    // ============================================
    // ANA SAYFA
    // ============================================
    case '':
        $pageTitle = 'Ana Sayfa - ' . SITE_NAME;
        $current_page = 'home';
        require __DIR__ . '/app/Views/site/home.php';
        break;
    
    // ============================================
    // HOSTİNG SAYFALARI
    // ============================================
    case 'hosting':
        $pageTitle = 'Web Hosting - ' . SITE_NAME;
        $current_page = 'hosting';
        require __DIR__ . '/app/Views/site/hosting.php';
        break;
    
    case 'vps':
        $pageTitle = 'VPS Sunucular - ' . SITE_NAME;
        $current_page = 'vps';
        require __DIR__ . '/app/Views/site/vps.php';
        break;
    
    case 'domain':
        $pageTitle = 'Domain Kayıt - ' . SITE_NAME;
        $current_page = 'domain';
        require __DIR__ . '/app/Views/site/domain.php';
        break;
    
    case 'ssl':
        $pageTitle = 'SSL Sertifikaları - ' . SITE_NAME;
        $current_page = 'ssl';
        require __DIR__ . '/app/Views/site/ssl.php';
        break;
    
    // ============================================
    // YAPAY ZEKA
    // ============================================
    case 'ai':
        $pageTitle = 'Yapay Zeka - ' . SITE_NAME;
        $current_page = 'ai';
        require __DIR__ . '/app/Views/site/ai.php';
        break;
    
    case 'site-builder':
        $pageTitle = 'Site Builder - ' . SITE_NAME;
        $current_page = 'site-builder';
        require __DIR__ . '/app/Views/site/site-builder.php';
        break;
    
    // ============================================
    // E-TİCARET
    // ============================================
    case 'marketplace':
        $pageTitle = 'Marketplace - ' . SITE_NAME;
        $current_page = 'marketplace';
        require __DIR__ . '/app/Views/site/marketplace.php';
        break;
    
    case 'cart':
        $pageTitle = 'Sepetim - ' . SITE_NAME;
        $current_page = 'cart';
        require __DIR__ . '/app/Views/site/cart.php';
        break;
    
    // ============================================
    // DESTEK
    // ============================================
    case 'support':
        $pageTitle = 'Destek - ' . SITE_NAME;
        $current_page = 'support';
        require __DIR__ . '/app/Views/site/support.php';
        break;
    
    case 'knowledgebase':
        $pageTitle = 'Bilgi Bankası - ' . SITE_NAME;
        $current_page = 'knowledgebase';
        require __DIR__ . '/app/Views/site/knowledgebase.php';
        break;
    
    // ============================================
    // HAKKIMIZDA
    // ============================================
    case 'about':
        $pageTitle = 'Hakkımızda - ' . SITE_NAME;
        $current_page = 'about';
        require __DIR__ . '/app/Views/site/about.php';
        break;
    
    case 'contact':
        $pageTitle = 'İletişim - ' . SITE_NAME;
        $current_page = 'contact';
        require __DIR__ . '/app/Views/site/contact.php';
        break;
    
    case 'blog':
        $pageTitle = 'Blog - ' . SITE_NAME;
        $current_page = 'blog';
        require __DIR__ . '/app/Views/site/blog.php';
        break;
    
    case 'pricing':
        $pageTitle = 'Fiyatlandırma - ' . SITE_NAME;
        $current_page = 'pricing';
        require __DIR__ . '/app/Views/site/pricing.php';
        break;
    
    // ============================================
    // OTURUM İŞLEMLERİ
    // ============================================
    case 'login':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $_SESSION['user_id'] = 1;
            $_SESSION['user'] = ['id' => 1, 'name' => 'Demo Kullanıcı', 'email' => 'demo@ahostone.com'];
            $_SESSION['user_type'] = 'customer';
            setFlash('success', 'Hoş geldiniz!');
            redirect('customer/dashboard');
        }
        $pageTitle = 'Giriş Yap - ' . SITE_NAME;
        $current_page = 'login';
        require __DIR__ . '/app/Views/auth/login.php';
        break;
    
    case 'register':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            setFlash('success', 'Hesabınız oluşturuldu!');
            redirect('login');
        }
        $pageTitle = 'Kayıt Ol - ' . SITE_NAME;
        $current_page = 'register';
        require __DIR__ . '/app/Views/auth/register.php';
        break;
    
    case 'logout':
        session_destroy();
        redirect('');
        break;
    
    // ============================================
    // ADMIN PANEL
    // ============================================
    case 'admin':
        if (!isAdmin()) {
            redirect('admin/login');
        }
        
        $adminPage = $action ?: 'dashboard';
        
        $adminPages = [
            'login' => 'admin/login',
            'dashboard' => 'admin/dashboard',
            'customers' => 'admin/customers',
            'orders' => 'admin/orders',
            'products' => 'admin/products',
            'domains' => 'admin/domains',
            'hosting' => 'admin/hosting',
            'support' => 'admin/support',
            'tickets' => 'admin/support',
            'invoices' => 'admin/invoices',
            'settings' => 'admin/settings',
            'ai-center' => 'admin/ai-center',
            'reports' => 'admin/reports',
            'logs' => 'admin/logs',
            'modules' => 'admin/modules',
            'themes' => 'admin/themes',
        ];
        
        if (isset($adminPages[$adminPage])) {
            $pageTitle = ucfirst($adminPage) . ' - Admin Panel';
            $current_page = $adminPage;
            require __DIR__ . '/app/Views/' . $adminPages[$adminPage] . '.php';
        } else {
            require __DIR__ . '/app/Views/admin/dashboard.php';
        }
        break;
    
    case 'admin/login':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $_SESSION['user_id'] = 1;
            $_SESSION['user'] = ['id' => 1, 'name' => 'Admin', 'email' => 'admin@ahostone.com'];
            $_SESSION['user_type'] = 'admin';
            setFlash('success', 'Admin hoş geldiniz!');
            redirect('admin/dashboard');
        }
        $pageTitle = 'Admin Giriş - ' . SITE_NAME;
        $current_page = 'admin-login';
        require __DIR__ . '/app/Views/admin/login.php';
        break;
    
    // ============================================
    // MÜŞTERİ PANELİ
    // ============================================
    case 'customer':
        if (!isLoggedIn()) {
            redirect('login');
        }
        
        $customerPage = $action ?: 'dashboard';
        
        $customerPages = [
            'dashboard' => 'customer/dashboard',
            'services' => 'customer/services',
            'domains' => 'customer/domains',
            'invoices' => 'customer/invoices',
            'support' => 'customer/support',
            'profile' => 'customer/profile',
            'site-builder' => 'customer/site-builder',
        ];
        
        if (isset($customerPages[$customerPage])) {
            $pageTitle = ucfirst($customerPage) . ' - Müşteri Paneli';
            $current_page = $customerPage;
            require __DIR__ . '/app/Views/' . $customerPages[$customerPage] . '.php';
        } else {
            require __DIR__ . '/app/Views/customer/dashboard.php';
        }
        break;
    
    // ============================================
    // 404 SAYFASI
    // ============================================
    default:
        http_response_code(404);
        $pageTitle = '404 - Sayfa Bulunamadı';
        require __DIR__ . '/app/Views/errors/404.php';
}
