<?php
/**
 * Ahost One - Site Layout
 * Premium SaaS - Tüm Sayfalar İçin Ortak Layout
 */
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $pageTitle ?? SITE_NAME ?></title>
    <meta name="description" content="Ahost One - Premium SaaS Hosting Platformu">
    
    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="<?= base_url('public/assets/images/logo.svg') ?>">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">
    
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- CSS -->
    <link rel="stylesheet" href="<?= css_url('tokens.css') ?>">
    <link rel="stylesheet" href="<?= theme_url('theme.css') ?>">
    <link rel="stylesheet" href="<?= css_url('site.css') ?>">
    
    <?php if (isset($extra_css)): ?>
        <?php foreach ($extra_css as $css): ?>
            <link rel="stylesheet" href="<?= $css ?>">
        <?php endforeach; ?>
    <?php endif; ?>
</head>
<body data-theme="<?= $ACTIVE_THEME ?? 'midnight' ?>">
    
    <!-- Header -->
    <header class="site-header" id="siteHeader">
        <div class="container">
            <div class="header-inner">
                <!-- Logo -->
                <a href="<?= base_url() ?>" class="logo">
                    <div class="logo-icon">A</div>
                    <span class="logo-text"><?= SITE_NAME ?></span>
                </a>
                
                <!-- Navigation -->
                <nav>
                    <ul class="nav-links">
                        <li><a href="<?= base_url() ?>" class="<?= ($current_page ?? '') === 'home' ? 'active' : '' ?>">Ana Sayfa</a></li>
                        <li><a href="<?= base_url('hosting') ?>" class="<?= ($current_page ?? '') === 'hosting' ? 'active' : '' ?>">Hosting</a></li>
                        <li><a href="<?= base_url('vps') ?>" class="<?= ($current_page ?? '') === 'vps' ? 'active' : '' ?>">VPS</a></li>
                        <li><a href="<?= base_url('domain') ?>" class="<?= ($current_page ?? '') === 'domain' ? 'active' : '' ?>">Domain</a></li>
                        <li><a href="<?= base_url('ai') ?>" class="<?= ($current_page ?? '') === 'ai' ? 'active' : '' ?>">AI</a></li>
                        <li>
                            <a href="#" class="<?= in_array($current_page ?? '', ['marketplace', 'site-builder', 'support']) ? 'active' : '' ?>">
                                Hizmetler <i class="fas fa-chevron-down" style="font-size: 10px; margin-left: 4px;"></i>
                            </a>
                        </li>
                    </ul>
                </nav>
                
                <!-- Actions -->
                <div class="header-actions">
                    <a href="<?= base_url('cart') ?>" class="btn btn-icon btn-ghost" title="Sepet">
                        <i class="fas fa-shopping-cart"></i>
                        <?php if (count($_SESSION['cart'] ?? []) > 0): ?>
                            <span class="cart-count"><?= count($_SESSION['cart']) ?></span>
                        <?php endif; ?>
                    </a>
                    <a href="<?= base_url('login') ?>" class="btn btn-ghost">Giriş Yap</a>
                    <a href="<?= base_url('register') ?>" class="btn btn-primary">Başla</a>
                </div>
                
                <!-- Mobile Toggle -->
                <button class="mobile-toggle" id="mobileToggle">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </div>
    </header>
    
    <!-- Mobile Menu -->
    <div class="mobile-menu" id="mobileMenu">
        <div class="mobile-menu-header">
            <a href="<?= base_url() ?>" class="logo">
                <div class="logo-icon">A</div>
                <span class="logo-text"><?= SITE_NAME ?></span>
            </a>
            <button class="mobile-menu-close" id="mobileClose">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <ul class="mobile-nav">
            <li><a href="<?= base_url() ?>">Ana Sayfa</a></li>
            <li><a href="<?= base_url('hosting') ?>">Hosting</a></li>
            <li><a href="<?= base_url('vps') ?>">VPS</a></li>
            <li><a href="<?= base_url('domain') ?>">Domain</a></li>
            <li><a href="<?= base_url('ai') ?>">AI</a></li>
            <li><a href="<?= base_url('pricing') ?>">Fiyatlar</a></li>
            <li><a href="<?= base_url('support') ?>">Destek</a></li>
        </ul>
        <div style="padding: 20px;">
            <a href="<?= base_url('login') ?>" class="btn btn-secondary" style="width: 100%; margin-bottom: 12px;">Giriş Yap</a>
            <a href="<?= base_url('register') ?>" class="btn btn-primary" style="width: 100%;">Başla</a>
        </div>
    </div>
    
    <!-- Main Content -->
    <main>
        <?= $page_content ?? '' ?>
    </main>
    
    <!-- Footer -->
    <footer class="site-footer">
        <div class="container">
            <div class="footer-grid">
                <!-- Brand -->
                <div class="footer-brand">
                    <a href="<?= base_url() ?>" class="logo">
                        <div class="logo-icon">A</div>
                        <span class="logo-text"><?= SITE_NAME ?></span>
                    </a>
                    <p>Türkiye'nin en güvenilir hosting sağlayıcısı. Yüksek performans, 7/24 destek ve uygun fiyatlarla dijital dünyada yerinizi alın.</p>
                    <div class="footer-social">
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-linkedin"></i></a>
                        <a href="#"><i class="fab fa-github"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
                
                <!-- Hosting -->
                <div>
                    <h4 class="footer-title">Hosting</h4>
                    <ul class="footer-links">
                        <li><a href="<?= base_url('hosting') ?>">Web Hosting</a></li>
                        <li><a href="<?= base_url('vps') ?>">VPS Sunucular</a></li>
                        <li><a href="#">Dedicated Server</a></li>
                        <li><a href="#">Cloud Hosting</a></li>
                        <li><a href="#">WordPress Hosting</a></li>
                    </ul>
                </div>
                
                <!-- Domain -->
                <div>
                    <h4 class="footer-title">Domain</h4>
                    <ul class="footer-links">
                        <li><a href="<?= base_url('domain') ?>">Domain Kayıt</a></li>
                        <li><a href="#">Domain Transfer</a></li>
                        <li><a href="#">WHOIS Koruma</a></li>
                        <li><a href="#">DNS Yönetimi</a></li>
                    </ul>
                </div>
                
                <!-- Destek -->
                <div>
                    <h4 class="footer-title">Destek</h4>
                    <ul class="footer-links">
                        <li><a href="<?= base_url('support') ?>">Destek Merkezi</a></li>
                        <li><a href="<?= base_url('knowledgebase') ?>">Bilgi Bankası</a></li>
                        <li><a href="#">Status Sayfası</a></li>
                        <li><a href="<?= base_url('contact') ?>">İletişim</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p>&copy; <?= date('Y') ?> <?= SITE_NAME ?>. Tüm hakları saklıdır.</p>
                <div class="footer-bottom-links">
                    <a href="#">Gizlilik Politikası</a>
                    <a href="#">Kullanım Koşulları</a>
                    <a href="#">KVKK</a>
                </div>
            </div>
        </div>
    </footer>
    
    <!-- Scripts -->
    <script src="<?= js_url('site.js') ?>"></script>
    
    <?php if (isset($extra_js)): ?>
        <?php foreach ($extra_js as $js): ?>
            <script src="<?= $js ?>"></script>
        <?php endforeach; ?>
    <?php endif; ?>
    
    <?php if (isset($inline_js)): ?>
        <script><?= $inline_js ?></script>
    <?php endif; ?>
</body>
</html>
