<?php
/** Marketplace Sayfası */
$pageTitle = 'Marketplace - ' . SITE_NAME;
$current_page = 'marketplace';
ob_start();
?>
<section class="hero hero-page"><div class="container"><div class="hero-inner" style="text-align:center;">
<div class="hero-content" style="max-width:700px;margin:0 auto;">
<div class="hero-badge"><i class="fas fa-store"></i> Marketplace</div>
<h1 class="hero-title">Eklentiler ve <span>Uygulamalar</span></h1>
<p class="hero-description">Web sitenizi güçlendirecek yüzlerce eklenti ve uygulama keşfedin.</p>
</div></div></div></section>

<section class="marketplace"><div class="container">
<div class="marketplace-grid">
<?php $items = [
    ['name' => 'Premium SSL', 'desc' => 'Wildcard SSL Sertifikası', 'price' => 499, 'rating' => 5, 'icon' => '🔒'],
    ['name' => 'Site Yedekleme', 'desc' => 'Otomatik günlük yedekleme', 'price' => 99, 'rating' => 4, 'icon' => '💾'],
    ['name' => 'CDN Plus', 'desc' => 'Hız artırıcı CDN hizmeti', 'price' => 149, 'rating' => 5, 'icon' => '🚀'],
    ['name' => 'E-posta Pazarlama', 'desc' => 'Newsletter ve kampanya', 'price' => 199, 'rating' => 4, 'icon' => '📧'],
    ['name' => 'SEO Pro', 'desc' => 'Gelişmiş SEO araçları', 'price' => 249, 'rating' => 5, 'icon' => '📈'],
    ['name' => 'Firewall', 'desc' => 'Güvenlik duvarı', 'price' => 349, 'rating' => 5, 'icon' => '🛡️'],
];
foreach($items as $item): ?>
<div class="marketplace-card">
<div class="marketplace-icon"><?= $item['icon'] ?></div>
<div class="marketplace-info">
<h3><?= $item['name'] ?></h3>
<p><?= $item['desc'] ?></p>
<div class="marketplace-rating">
<?php for($i=0;$i<5;$i++): ?><i class="fas fa-star<?= $i>=$item['rating']?' text-muted':'' ?>"></i><?php endfor; ?>
<span>(<?= $item['rating'] ?>.0)</span>
</div>
</div>
<div class="marketplace-footer">
<span class="price">₺<?= $item['price'] ?><small>/ay</small></span>
<button class="btn btn-primary btn-sm">Satın Al</button>
</div>
</div>
<?php endforeach; ?>
</div></div></section>

<style>
.marketplace{padding:var(--space-24) 0;}
.marketplace-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:var(--space-6);}
.marketplace-card{background:var(--bg-card);border:1px solid var(--border-subtle);border-radius:var(--radius-2xl);padding:var(--space-6);transition:var(--transition);}
.marketplace-card:hover{transform:translateY(-4px);box-shadow:var(--shadow-lg);}
.marketplace-icon{font-size:48px;margin-bottom:var(--space-4);}
.marketplace-info h3{font-size:var(--text-lg);margin-bottom:var(--space-2);}
.marketplace-info p{color:var(--text-muted);font-size:var(--text-sm);margin-bottom:var(--space-3);}
.marketplace-rating{color:#f59e0b;font-size:var(--text-sm);}
.marketplace-rating span{color:var(--text-muted);margin-left:var(--space-2);}
.text-muted{color:var(--text-muted);}
.marketplace-footer{display:flex;justify-content:space-between;align-items:center;margin-top:var(--space-4);padding-top:var(--space-4);border-top:1px solid var(--border-subtle);}
.price{font-size:var(--text-xl);font-weight:700;}
.price small{font-size:var(--text-xs);color:var(--text-muted);font-weight:400;}
.btn-sm{padding:var(--space-2) var(--space-4);font-size:var(--text-xs);}
@media(max-width:768px){.marketplace-grid{grid-template-columns:1fr;}}
</style>
<?php $page_content = ob_get_clean(); require __DIR__.'/../layouts/site-layout.php';
