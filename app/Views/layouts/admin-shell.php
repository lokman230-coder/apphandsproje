<?php
/**
 * Admin Shell Layout
 */
if (!defined('SITE_NAME')) define('SITE_NAME', 'Ahost One');
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $page_title ?? 'Admin Panel' ?> - <?= SITE_NAME ?></title>
    
    <link rel="icon" href="<?= base_url('public/assets/images/logo.svg') ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <link rel="stylesheet" href="<?= css_url('tokens.css') ?>">
    <link rel="stylesheet" href="<?= theme_url('theme.css') ?: css_url('site.css') ?>">
    <link rel="stylesheet" href="<?= css_url('admin.css') ?>">
</head>
<body data-theme="<?= $ACTIVE_THEME ?? 'midnight' ?>">
    
    <!-- Sidebar -->
    <aside class="admin-sidebar" id="sidebar">
        <div class="sidebar-header">
            <a href="<?= base_url('admin') ?>" class="logo">
                <div class="logo-icon">A</div>
                <span class="logo-text">Admin</span>
            </a>
        </div>
        
        <nav class="sidebar-nav">
            <div class="nav-section">
                <a href="<?= base_url('admin') ?>" class="nav-link <?= ($current_page ?? '') === 'dashboard' ? 'active' : '' ?>">
                    <i class="fas fa-home"></i>
                    <span>Dashboard</span>
                </a>
            </div>
            
            <div class="nav-section">
                <div class="nav-section-title">AI Center</div>
                <a href="<?= base_url('admin/ai-center') ?>" class="nav-link <?= ($current_page ?? '') === 'ai-center' ? 'active' : '' ?>">
                    <i class="fas fa-robot"></i>
                    <span>AI Dashboard</span>
                </a>
            </div>
            
            <div class="nav-section">
                <div class="nav-section-title">Commerce</div>
                <a href="<?= base_url('admin/customers') ?>" class="nav-link <?= ($current_page ?? '') === 'customers' ? 'active' : '' ?>">
                    <i class="fas fa-users"></i>
                    <span>Müşteriler</span>
                </a>
                <a href="<?= base_url('admin/orders') ?>" class="nav-link <?= ($current_page ?? '') === 'orders' ? 'active' : '' ?>">
                    <i class="fas fa-shopping-cart"></i>
                    <span>Siparişler</span>
                </a>
                <a href="<?= base_url('admin/products') ?>" class="nav-link <?= ($current_page ?? '') === 'products' ? 'active' : '' ?>">
                    <i class="fas fa-box"></i>
                    <span>Ürünler</span>
                </a>
                <a href="<?= base_url('admin/invoices') ?>" class="nav-link <?= ($current_page ?? '') === 'invoices' ? 'active' : '' ?>">
                    <i class="fas fa-file-invoice-dollar"></i>
                    <span>Faturalar</span>
                </a>
            </div>
            
            <div class="nav-section">
                <div class="nav-section-title">Domain & Hosting</div>
                <a href="<?= base_url('admin/domains') ?>" class="nav-link <?= ($current_page ?? '') === 'domains' ? 'active' : '' ?>">
                    <i class="fas fa-globe"></i>
                    <span>Domainler</span>
                </a>
                <a href="<?= base_url('admin/hosting') ?>" class="nav-link <?= ($current_page ?? '') === 'hosting' ? 'active' : '' ?>">
                    <i class="fas fa-server"></i>
                    <span>Hosting</span>
                </a>
            </div>
            
            <div class="nav-section">
                <div class="nav-section-title">Destek</div>
                <a href="<?= base_url('admin/support') ?>" class="nav-link <?= ($current_page ?? '') === 'support' ? 'active' : '' ?>">
                    <i class="fas fa-headset"></i>
                    <span>Destek Talepleri</span>
                </a>
            </div>
            
            <div class="nav-section">
                <div class="nav-section-title">Ayarlar</div>
                <a href="<?= base_url('admin/settings') ?>" class="nav-link <?= ($current_page ?? '') === 'settings' ? 'active' : '' ?>">
                    <i class="fas fa-cog"></i>
                    <span>Ayarlar</span>
                </a>
            </div>
        </nav>
        
        <div class="sidebar-footer">
            <a href="<?= base_url() ?>" class="nav-link" target="_blank">
                <i class="fas fa-external-link-alt"></i>
                <span>Siteye Git</span>
            </a>
            <a href="<?= base_url('logout') ?>" class="nav-link">
                <i class="fas fa-sign-out-alt"></i>
                <span>Çıkış</span>
            </a>
        </div>
    </aside>
    
    <!-- Main -->
    <main class="admin-main" id="main">
        <!-- Topbar -->
        <header class="admin-topbar">
            <button class="topbar-toggle" id="sidebarToggle">
                <i class="fas fa-bars"></i>
            </button>
            
            <div class="topbar-search">
                <i class="fas fa-search"></i>
                <input type="text" placeholder="Arama..." class="search-input">
            </div>
            
            <div class="topbar-actions">
                <button class="topbar-btn">
                    <i class="fas fa-bell"></i>
                    <span class="badge">3</span>
                </button>
                
                <div class="topbar-user">
                    <img src="<?= base_url('public/assets/images/logo.svg') ?>" alt="Avatar" class="user-avatar">
                    <span class="user-name"><?= $_SESSION['user']['name'] ?? 'Admin' ?></span>
                </div>
            </div>
        </header>
        
        <!-- Content -->
        <div class="admin-content">
            <?php if (isset($breadcrumbs)): ?>
                <div class="breadcrumbs">
                    <?php foreach ($breadcrumbs as $i => $crumb): ?>
                        <?php if ($i > 0): ?><i class="fas fa-chevron-right"></i><?php endif; ?>
                        <?php if (isset($crumb['url'])): ?>
                            <a href="<?= $crumb['url'] ?>"><?= $crumb['label'] ?></a>
                        <?php else: ?>
                            <span><?= $crumb['label'] ?></span>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            
            <?= $page_content ?? '' ?>
        </div>
    </main>
    
    <script src="<?= js_url('admin.js') ?>"></script>
</body>
</html>
