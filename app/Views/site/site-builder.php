<?php
/** Site Builder Sayfası */
$pageTitle = 'SiteBuilder - ' . SITE_NAME;
$current_page = 'site-builder';
ob_start();
?>
<section class="hero hero-page"><div class="container"><div class="hero-inner" style="text-align:center;">
<div class="hero-content" style="max-width:700px;margin:0 auto;">
<div class="hero-badge"><i class="fas fa-palette"></i> SiteBuilder</div>
<h1 class="hero-title">Kod Yazmadan <span>Profesyonel</span> Web Sitesi</h1>
<p class="hero-description">Sürükle-bırak arayüz ile dakikalar içinde profesyonel web sitenizi oluşturun. Hiçbir kodlama bilgisi gerektirmez.</p>
<a href="<?= base_url('register') ?>" class="btn btn-primary btn-lg">Ücretsiz Dene <i class="fas fa-arrow-right"></i></a>
</div></div></div></section>

<section class="features"><div class="container">
<div class="section-header"><div class="section-badge">Özellikler</div><h2 class="section-title">Neden SiteBuilder?</h2></div>
<div class="features-grid">
<div class="feature-card"><div class="feature-icon"><i class="fas fa-mouse-pointer"></i></div><h3 class="feature-title">Sürükle-Bırak</h3><p class="feature-description">Elementleri sürükleyip bırakarak sitenizi oluşturun.</p></div>
<div class="feature-card"><div class="feature-icon"><i class="fas fa-mobile-alt"></i></div><h3 class="feature-title">Mobil Uyumlu</h3><p class="feature-description">Tüm cihazlarda mükemmel görünüm.</p></div>
<div class="feature-card"><div class="feature-icon"><i class="fas fa-image"></i></div><h3 class="feature-title">100+ Şablon</h3><p class="feature-description">Hazır şablonlardan başlayın.</p></div>
<div class="feature-card"><div class="feature-icon"><i class="fas fa-shopping-cart"></i></div><h3 class="feature-title">E-ticaret</h3><p class="feature-description">Online satış için gerekli tüm özellikler.</p></div>
<div class="feature-card"><div class="feature-icon"><i class="fas fa-search"></i></div><h3 class="feature-title">SEO</h3><p class="feature-description">Arama motorlarında üst sıralarda çıkın.</p></div>
<div class="feature-card"><div class="feature-icon"><i class="fas fa-bolt"></i></div><h3 class="feature-title">Hızlı</h3><p class="feature-description">Yüksek performanslı siteler.</p></div>
</div></div></section>

<section class="templates"><div class="container">
<div class="section-header"><div class="section-badge">Şablonlar</div><h2 class="section-title">Hazır Şablonlar</h2></div>
<div class="templates-grid">
<?php $templates = [
    ['name' => 'Kurumsal', 'category' => 'İş', 'img' => '🏢'],
    ['name' => 'Blog', 'category' => => 'Kişisel', 'img' => '📝'],
    ['name' => 'E-ticaret', 'category' => 'Satış', 'img' => '🛒'],
    ['name' => 'Portfolyo', 'category' => 'Kişisel', 'img' => '🎨'],
    ['name' => 'Restoran', 'category' => 'İş', 'img' => '🍽️'],
    ['name' => 'Eğitim', 'category' => 'Eğitim', 'img' => '🎓'],
];
foreach($templates as $t): ?>
<div class="template-card">
<div class="template-preview"><?= $t['img'] ?></div>
<div class="template-info"><h4><?= $t['name'] ?></h4><span><?= $t['category'] ?></span></div>
</div>
<?php endforeach; ?>
</div></div></section>

<style>
.templates{padding:var(--space-24) 0;background:var(--bg-secondary);}
.templates-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:var(--space-6);}
.template-card{background:var(--bg-card);border:1px solid var(--border-subtle);border-radius:var(--radius-2xl);overflow:hidden;transition:var(--transition);}
.template-card:hover{transform:translateY(-4px);box-shadow:var(--shadow-lg);}
.template-preview{height:180px;display:flex;align-items:center;justify-content:center;font-size:64px;background:var(--bg-secondary);}
.template-info{padding:var(--space-4);} .template-info h4{font-size:var(--text-base);margin-bottom:var(--space-1);} .template-info span{font-size:var(--text-xs);color:var(--text-muted);}
@media(max-width:768px){.templates-grid{grid-template-columns:1fr;}}
</style>
<?php $page_content = ob_get_clean(); require __DIR__.'/../layouts/site-layout.php';
