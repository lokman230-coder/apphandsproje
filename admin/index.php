<?php
/**
 * Admin Panel - Ahost One
 */
@session_start();

$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https://' : 'http://';
$host = $_SERVER['HTTP_HOST'] ?? 'localhost';
define('SITE_URL', $protocol . $host);
define('SITE_NAME', 'Ahost One');

$basePath = dirname(__DIR__);
define('BASE_PATH', $basePath);

// Config
define('DB_HOST', 'localhost');
define('DB_NAME', 'ahostone');
define('DB_USER', 'root');
define('DB_PASS', '');

function db() {
    static $pdo = null;
    if (!$pdo) $pdo = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset=utf8mb4', DB_USER, DB_PASS, [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION]);
    return $pdo;
}
function redirect($u) { header('Location:'.$u); exit; }
function isAdmin() { return isset($_SESSION['user_type']) && $_SESSION['user_type']==='admin'; }
function setFlash($t, $m) { $_SESSION['flash'][$t]=$m; }
function getFlash() { $f=$_SESSION['flash']??[]; unset($_SESSION['flash']); return $f; }

$uri = $_GET['route'] ?? '';
$uri = trim($uri, '/');
$seg = $uri ? explode('/', $uri) : [];
$page = $seg[0] ?: 'dashboard';

// Admin giris kontrolu
if ($page !== 'login') {
    if (!isAdmin()) {
        redirect('login');
    }
}

// Login islemi
if ($_SERVER['REQUEST_METHOD']==='POST' && $page==='login') {
    $pdo = db();
    $stmt = $pdo->prepare('SELECT * FROM users WHERE email=? AND type="admin" LIMIT 1');
    $stmt->execute([$_POST['email']]);
    $u = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($u && password_verify($_POST['password'], $u['password'])) {
        $_SESSION['user_id']=$u['id'];
        $_SESSION['user']=$u;
        $_SESSION['user_type']='admin';
        setFlash('success', 'Hos geldiniz!');
        redirect('dashboard');
    } else {
        setFlash('error', 'Yanlis e-posta veya sifre!');
        redirect('login');
    }
}

$adminPages = [
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

if ($page === 'login') {
    $viewFile = BASE_PATH . '/app/Views/admin/login.php';
} elseif (isset($adminPages[$page])) {
    $viewFile = BASE_PATH . '/app/Views/' . $adminPages[$page] . '.php';
} else {
    $viewFile = BASE_PATH . '/app/Views/admin/dashboard.php';
}

if (file_exists($viewFile)) {
    require $viewFile;
} else {
    echo 'View bulunamadi: ' . $viewFile;
}
