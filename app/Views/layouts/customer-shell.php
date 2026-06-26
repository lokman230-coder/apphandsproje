<?php
/**
 * Customer Shell Layout - Müşteri Paneli
 */
if (!defined('SITE_NAME')) define('SITE_NAME', 'Ahost One');
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $page_title ?? 'Müşteri Paneli' ?> - <?= SITE_NAME ?></title>
    
    <link rel="icon" href="<?= base_url('public/assets/images/logo.svg') ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <link rel="stylesheet" href="<?= css_url('tokens.css') ?>">
    <link rel="stylesheet" href="<?= theme_url('theme.css') ?: css_url('site.css') ?>">
    <link rel="stylesheet" href="<?= css_url('customer.css') ?>">
</head>
<body data-theme="<?= $ACTIVE_THEME ?? 'ocean' ?>">
    
    <div class="customer-layout">
        <!-- Sidebar -->
        <aside class="customer-sidebar" id="sidebar">
            <div class="sidebar-header">
                <a href="<?= base_url() ?>" class="logo">
                    <div class="logo-icon">A</div>
                    <span class="logo-text"><?= SITE_NAME ?></span>
                </a>
                <button class="sidebar-close" id="sidebarClose">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            
            <div class="sidebar-user">
                <img src="<?= base_url('public/assets/images/logo.svg') ?>" alt="Avatar" class="user-avatar">
                <div class="user-info">
                    <div class="user-name"><?= $_SESSION['user']['name'] ?? 'Kullanıcı' ?></div>
                    <div class="user-email"><?= $_SESSION['user']['email'] ?? '' ?></div>
                </div>
            </div>
            
            <nav class="sidebar-nav">
                <a href="<?= base_url('customer') ?>" class="nav-item <?= ($current_page ?? '') === 'dashboard' ? 'active' : '' ?>">
                    <i class="fas fa-home"></i>
                    <span>Dashboard</span>
                </a>
                
                <div class="nav-divider">Hizmetlerim</div>
                
                <a href="<?= base_url('customer/services') ?>" class="nav-item <?= ($current_page ?? '') === 'services' ? 'active' : '' ?>">
                    <i class="fas fa-server"></i>
                    <span>Hosting</span>
                </a>
                
                <a href="<?= base_url('customer/vps') ?>" class="nav-item <?= ($current_page ?? '') === 'vps' ? 'active' : '' ?>">
                    <i class="fas fa-hdd"></i>
                    <span>VPS Sunucular</span>
                </a>
                
                <a href="<?= base_url('customer/domains') ?>" class="nav-item <?= ($current_page ?? '') === 'domains' ? 'active' : '' ?>">
                    <i class="fas fa-globe"></i>
                    <span>Domainler</span>
                </a>
                
                <div class="nav-divider">Hesabım</div>
                
                <a href="<?= base_url('customer/invoices') ?>" class="nav-item <?= ($current_page ?? '') === 'invoices' ? 'active' : '' ?>">
                    <i class="fas fa-file-invoice-dollar"></i>
                    <span>Faturalar</span>
                </a>
                
                <a href="<?= base_url('customer/support') ?>" class="nav-item <?= ($current_page ?? '') === 'support' ? 'active' : '' ?>">
                    <i class="fas fa-headset"></i>
                    <span>Destek</span>
                </a>
                
                <a href="<?= base_url('customer/profile') ?>" class="nav-item <?= ($current_page ?? '') === 'profile' ? 'active' : '' ?>">
                    <i class="fas fa-user-cog"></i>
                    <span>Profilim</span>
                </a>
            </nav>
            
            <div class="sidebar-footer">
                <a href="<?= base_url() ?>" class="nav-item" target="_blank">
                    <i class="fas fa-external-link-alt"></i>
                    <span>Siteye Git</span>
                </a>
                <a href="<?= base_url('logout') ?>" class="nav-item logout">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Çıkış</span>
                </a>
            </div>
        </aside>
        
        <!-- Main -->
        <main class="customer-main">
            <!-- Topbar -->
            <header class="customer-topbar">
                <button class="topbar-toggle" id="topbarToggle">
                    <i class="fas fa-bars"></i>
                </button>
                
                <div class="topbar-search">
                    <i class="fas fa-search"></i>
                    <input type="text" placeholder="Arama...">
                </div>
                
                <div class="topbar-actions">
                    <a href="<?= base_url('cart') ?>" class="topbar-btn" title="Sepet">
                        <i class="fas fa-shopping-cart"></i>
                        <?php if (count($_SESSION['cart'] ?? []) > 0): ?>
                            <span class="badge"><?= count($_SESSION['cart']) ?></span>
                        <?php endif; ?>
                    </a>
                    
                    <button class="topbar-btn" title="Bildirimler">
                        <i class="fas fa-bell"></i>
                        <span class="badge">2</span>
                    </button>
                    
                    <a href="<?= base_url('customer/profile') ?>" class="topbar-profile">
                        <img src="<?= base_url('public/assets/images/logo.svg') ?>" alt="Avatar">
                    </a>
                </div>
            </header>
            
            <!-- Content -->
            <div class="customer-content">
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
    </div>
    
    <script src="<?= js_url('customer.js') ?>"></script>
</body>
</html>
