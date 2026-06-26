<?php
/**
 * Fiyatlandırma Sayfası
 */
$pageTitle = 'Fiyatlandırma - ' . SITE_NAME;
$current_page = 'pricing';

ob_start();
?>

<section class="hero hero-page">
    <div class="container">
        <div class="hero-inner" style="text-align: center;">
            <div class="hero-content" style="max-width: 700px; margin: 0 auto;">
                <div class="hero-badge">
                    <i class="fas fa-tag"></i>
                    Fiyatlandırma
                </div>
                
                <h1 class="hero-title">
                    Size Uygun Planı <span>Seçin</span>
                </h1>
                
                <p class="hero-description">
                    Tüm planlar ücretsiz SSL, günlük yedekleme ve 7/24 destek içerir. 
                    Gizli maliyet yok, şeffaf fiyatlandırma.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Hosting Plans -->
<section class="pricing-section">
    <div class="container">
        <div class="section-header">
            <div class="section-badge">Web Hosting</div>
            <h2 class="section-title">Hosting Planları</h2>
        </div>
        
        <div class="pricing-grid">
            <?php $hostingPlans = [
                ['name' => 'Başlangıç', 'price' => 49, 'disk' => '10 GB', 'website' => '1', 'features' => ['NVMe SSD', 'Ücretsiz SSL', 'LiteSpeed Cache', 'Günlük Yedekleme']],
                ['name' => 'Profesyonel', 'price' => 149, 'disk' => '50 GB', 'website' => 'Sınırsız', 'popular' => true, 'features' => ['NVMe SSD', 'Ücretsiz Domain', 'CDN + Cache', 'Günlük Yedekleme', 'Öncelikli Destek']],
                ['name' => 'Kurumsal', 'price' => 399, 'disk' => '200 GB', 'website' => 'Sınırsız', 'features' => ['NVMe SSD', 'Dedicated IP', 'VIP CDN', 'Saatlik Yedekleme', 'VIP Destek']],
            ]; ?>
            
            <?php foreach ($hostingPlans as $plan): ?>
            <div class="pricing-card <?= isset($plan['popular']) ? 'popular' : '' ?>">
                <?php if (isset($plan['popular'])): ?>
                    <div class="pricing-badge">En Popüler</div>
                <?php endif; ?>
                
                <div class="pricing-header">
                    <div class="pricing-name"><?= $plan['name'] ?></div>
                    <div class="pricing-price">₺<?= $plan['price'] ?><span>/ay</span></div>
                    <div class="pricing-period">12 ay ~ ₺<?= round($plan['price'] * 0.8) ?>/ay</div>
                </div>
                
                <ul class="pricing-features">
                    <li><i class="fas fa-hdd"></i> <?= $plan['disk'] ?> NVMe SSD</li>
                    <li><i class="fas fa-globe"></i> <?= $plan['website'] ?> Website</li>
                    <?php foreach ($plan['features'] as $feature): ?>
                    <li><i class="fas fa-check"></i> <?= $feature ?></li>
                    <?php endforeach; ?>
                </ul>
                
                <a href="<?= base_url('register') ?>" class="btn <?= isset($plan['popular']) ? 'btn-primary' : 'btn-secondary' ?>">
                    Başla
                </a>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- VPS Plans -->
<section class="pricing-section alt">
    <div class="container">
        <div class="section-header">
            <div class="section-badge">VPS Server</div>
            <h2 class="section-title">VPS Sunucu Planları</h2>
        </div>
        
        <div class="pricing-grid">
            <?php $vpsPlans = [
                ['name' => 'VPS Start', 'price' => 199, 'cpu' => '2 vCPU', 'ram' => '4 GB', 'disk' => '50 GB'],
                ['name' => 'VPS Pro', 'price' => 399, 'cpu' => '4 vCPU', 'ram' => '8 GB', 'disk' => '100 GB', 'popular' => true],
                ['name' => 'VPS Business', 'price' => 799, 'cpu' => '8 vCPU', 'ram' => '16 GB', 'disk' => '200 GB'],
            ]; ?>
            
            <?php foreach ($vpsPlans as $plan): ?>
            <div class="pricing-card <?= isset($plan['popular']) ? 'popular' : '' ?>">
                <?php if (isset($plan['popular'])): ?>
                    <div class="pricing-badge">En Popüler</div>
                <?php endif; ?>
                
                <div class="pricing-header">
                    <div class="pricing-name"><?= $plan['name'] ?></div>
                    <div class="pricing-price">₺<?= $plan['price'] ?><span>/ay</span></div>
                    <div class="pricing-period">12 ay ~ ₺<?= round($plan['price'] * 0.8) ?>/ay</div>
                </div>
                
                <ul class="pricing-features">
                    <li><i class="fas fa-microchip"></i> <?= $plan['cpu'] ?> AMD EPYC</li>
                    <li><i class="fas fa-memory"></i> <?= $plan['ram'] ?> RAM</li>
                    <li><i class="fas fa-hdd"></i> <?= $plan['disk'] ?> NVMe SSD</li>
                    <li><i class="fas fa-network-wired"></i> 1 Gbps Ağ</li>
                    <li><i class="fas fa-check"></i> Full Root Erişimi</li>
                    <li><i class="fas fa-check"></i> DDoS Koruması</li>
                </ul>
                
                <a href="<?= base_url('register') ?>" class="btn <?= isset($plan['popular']) ? 'btn-primary' : 'btn-secondary' ?>">
                    Başla
                </a>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- FAQ -->
<section class="faq">
    <div class="container">
        <div class="section-header">
            <div class="section-badge">SSS</div>
            <h2 class="section-title">Sık Sorulan Sorular</h2>
        </div>
        
        <div class="faq-list">
            <?php $faqs = [
                ['q' => 'Hangi ödeme yöntemlerini kabul ediyorsunuz?', 'a' => 'Kredi kartı, banka havalesi, QR kod ve mobil ödeme yöntemlerini kabul ediyoruz.'],
                ['q' => '30 gün iade garantisi var mı?', 'a' => 'Evet! Memnun kalmadığınız durumda, ilk 30 gün içinde tüm ödemenizi iade ediyoruz.'],
                ['q' => 'Hosting'i ne kadar sürede aktif ediyorsunuz?', 'a' => 'Ödeme onaylandıktan hemen sonra hosting hesabınız dakikalar içinde aktif olur.'],
                ['q' => 'Ücretsiz domain nedir?', 'a' => 'Profesyonel ve Kurumsal paketlerde yıllık faturalandırma ile .com, .net gibi uzantılarda ücretsiz domain kaydı yapıyoruz.'],
            ]; ?>
            
            <?php foreach ($faqs as $faq): ?>
            <div class="faq-item">
                <div class="faq-question">
                    <span><?= $faq['q'] ?></span>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer"><?= $faq['a'] ?></div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="cta">
    <div class="container">
        <h2 class="cta-title">Hala Kararsız mısınız?</h2>
        <p class="cta-description">7/24 destek ekibimiz sorularınızı yanıtlamak için hazır.</p>
        <a href="<?= base_url('contact') ?>" class="btn btn-lg">
            İletişime Geç <i class="fas fa-arrow-right"></i>
        </a>
    </div>
</section>

<style>
.pricing-section {
    padding: var(--space-24) 0;
}

.pricing-section.alt {
    background: var(--bg-secondary);
}

.pricing-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: var(--space-8);
    align-items: start;
}

.pricing-card {
    background: var(--bg-card);
    border: 1px solid var(--border-subtle);
    border-radius: var(--radius-2xl);
    padding: var(--space-8);
    position: relative;
    transition: var(--transition);
}

.pricing-card.popular {
    border: 2px solid var(--primary-500);
    transform: scale(1.05);
    box-shadow: var(--shadow-glow);
}

.pricing-badge {
    position: absolute;
    top: -14px;
    left: 50%;
    transform: translateX(-50%);
    background: var(--gradient-primary);
    color: white;
    padding: var(--space-2) var(--space-5);
    border-radius: var(--radius-full);
    font-size: var(--text-xs);
    font-weight: 700;
}

.pricing-header {
    text-align: center;
    padding-bottom: var(--space-6);
    border-bottom: 1px solid var(--border-subtle);
    margin-bottom: var(--space-6);
}

.pricing-name {
    font-size: var(--text-xl);
    font-weight: 600;
    margin-bottom: var(--space-3);
}

.pricing-price {
    font-size: var(--text-5xl);
    font-weight: 800;
}

.pricing-price span {
    font-size: var(--text-base);
    font-weight: 400;
    color: var(--text-muted);
}

.pricing-period {
    font-size: var(--text-sm);
    color: var(--text-muted);
    margin-top: var(--space-2);
}

.pricing-features {
    list-style: none;
    margin-bottom: var(--space-8);
}

.pricing-features li {
    display: flex;
    align-items: center;
    gap: var(--space-3);
    padding: var(--space-3) 0;
    font-size: var(--text-sm);
    color: var(--text-secondary);
}

.pricing-features li i {
    width: 20px;
    color: var(--primary-500);
}

.pricing-card .btn {
    width: 100%;
}

.faq-list {
    max-width: 800px;
    margin: 0 auto;
}

.faq-item {
    background: var(--bg-card);
    border: 1px solid var(--border-subtle);
    border-radius: var(--radius-xl);
    margin-bottom: var(--space-4);
    overflow: hidden;
}

.faq-question {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: var(--space-5) var(--space-6);
    cursor: pointer;
    font-weight: 600;
}

.faq-question i {
    transition: var(--transition);
}

.faq-item.active .faq-question i {
    transform: rotate(180deg);
}

.faq-answer {
    padding: 0 var(--space-6) var(--space-5);
    color: var(--text-secondary);
    font-size: var(--text-sm);
    display: none;
}

.faq-item.active .faq-answer {
    display: block;
}

@media (max-width: 1024px) {
    .pricing-grid {
        grid-template-columns: 1fr;
        max-width: 500px;
        margin: 0 auto;
    }
    
    .pricing-card.popular {
        transform: none;
    }
}
</style>

<script>
document.querySelectorAll('.faq-question').forEach(q => {
    q.addEventListener('click', () => {
        q.parentElement.classList.toggle('active');
    });
});
</script>

<?php
$page_content = ob_get_clean();
require __DIR__ . '/../layouts/site-layout.php';
