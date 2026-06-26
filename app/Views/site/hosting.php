<?php
/**
 * Web Hosting Sayfası
 */
$pageTitle = 'Web Hosting - ' . SITE_NAME;
$current_page = 'hosting';

ob_start();
?>

<!-- Hero Section -->
<section class="hero hero-page">
    <div class="container">
        <div class="hero-inner">
            <div class="hero-content">
                <div class="hero-badge">
                    <i class="fas fa-server"></i>
                    Web Hosting
                </div>
                
                <h1 class="hero-title">
                    Kesintisiz Performans, <span>Sınırsız</span> Potansiyel
                </h1>
                
                <p class="hero-description">
                    Türkiye'nin en hızlı web hosting hizmeti. NVMe SSD, LiteSpeed, ücretsiz SSL ve 7/24 destek ile sitenizi barındırın.
                </p>
                
                <div class="hero-actions">
                    <a href="<?= base_url('register') ?>" class="btn btn-primary btn-lg">
                        Hemen Başla <i class="fas fa-arrow-right"></i>
                    </a>
                    <a href="#plans" class="btn btn-secondary btn-lg">
                        Planları İncele
                    </a>
                </div>
                
                <div class="hero-features">
                    <span><i class="fas fa-check"></i> Ücretsiz SSL</span>
                    <span><i class="fas fa-check"></i> NVMe SSD</span>
                    <span><i class="fas fa-check"></i> LiteSpeed</span>
                    <span><i class="fas fa-check"></i> 30 Gün İade</span>
                </div>
            </div>
            
            <div class="hero-visual">
                <div class="hero-image-wrapper">
                    <div class="hero-server">
                        <div class="server-icon">
                            <i class="fas fa-server"></i>
                        </div>
                        <div class="server-status">
                            <span class="status-dot"></span>
                            Tüm Sunucular Aktif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Features -->
<section class="features">
    <div class="container">
        <div class="section-header">
            <div class="section-badge">Neden Biz?</div>
            <h2 class="section-title"> hosting Seçmelisiniz</h2>
        </div>
        
        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-bolt"></i>
                </div>
                <h3 class="feature-title">NVMe SSD Disk</h3>
                <p class="feature-description">Geleneksel SSD'lere göre 3 kat daha hızlı okuma/yazma performansı.</p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h3 class="feature-title">DDoS Koruması</h3>
                <p class="feature-description">Gelişmiş güvenlik duvarı ile kötü niyetli saldırılara karşı koruma.</p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-sync-alt"></i>
                </div>
                <h3 class="feature-title">Günlük Yedekleme</h3>
                <p class="feature-description">Verileriniz günlük olarak yedeklenir ve kolayca geri yüklenir.</p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-rocket"></i>
                </div>
                <h3 class="feature-title">LiteSpeed Cache</h3>
                <p class="feature-description">LiteSpeed teknolojisi ile 3 kata kadar daha hızlı sayfa yükleme.</p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-globe"></i>
                </div>
                <h3 class="feature-title">Ücretsiz Domain</h3>
                <p class="feature-description">Yıllık paketlerde ücretsiz .com veya .net domain kaydı.</p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-headset"></i>
                </div>
                <h3 class="feature-title">7/24 Destek</h3>
                <p class="feature-description">Uzman ekibimiz her zaman yanınızda. Canlı sohbet ve telefon.</p>
            </div>
        </div>
    </div>
</section>

<!-- Pricing Plans -->
<section class="pricing" id="plans">
    <div class="container">
        <div class="section-header">
            <div class="section-badge">Fiyatlandırma</div>
            <h2 class="section-title">Size Uygun Planı Seçin</h2>
            <p class="section-description">Tüm planlar ücretsiz SSL, günlük yedekleme ve 7/24 destek içerir.</p>
        </div>
        
        <div class="pricing-grid">
            <!-- Başlangıç -->
            <div class="pricing-card">
                <div class="pricing-header">
                    <div class="pricing-name">Başlangıç</div>
                    <div class="pricing-price">₺49<span>/ay</span></div>
                    <div class="pricing-period">12 ay ~ ₺39/ay</div>
                </div>
                <ul class="pricing-features">
                    <li><i class="fas fa-check"></i> 10 GB NVMe SSD</li>
                    <li><i class="fas fa-check"></i> 1 Website</li>
                    <li><i class="fas fa-check"></i> 1 Domain</li>
                    <li><i class="fas fa-check"></i> Ücretsiz SSL</li>
                    <li><i class="fas fa-check"></i> LiteSpeed Cache</li>
                    <li><i class="fas fa-check"></i> Günlük Yedekleme</li>
                    <li><i class="fas fa-check"></i> 7/24 Destek</li>
                </ul>
                <a href="<?= base_url('register') ?>" class="btn btn-secondary">Başla</a>
            </div>
            
            <!-- Profesyonel -->
            <div class="pricing-card popular">
                <div class="pricing-badge">En Popüler</div>
                <div class="pricing-header">
                    <div class="pricing-name">Profesyonel</div>
                    <div class="pricing-price">₺149<span>/ay</span></div>
                    <div class="pricing-period">12 ay ~ ₺119/ay</div>
                </div>
                <ul class="pricing-features">
                    <li><i class="fas fa-check"></i> 50 GB NVMe SSD</li>
                    <li><i class="fas fa-check"></i> Sınırsız Website</li>
                    <li><i class="fas fa-check"></i> Ücretsiz Domain</li>
                    <li><i class="fas fa-check"></i> Ücretsiz SSL</li>
                    <li><i class="fas fa-check"></i> CDN + LiteSpeed</li>
                    <li><i class="fas fa-check"></i> Günlük Yedekleme</li>
                    <li><i class="fas fa-check"></i> Öncelikli Destek</li>
                </ul>
                <a href="<?= base_url('register') ?>" class="btn btn-primary">Başla</a>
            </div>
            
            <!-- Kurumsal -->
            <div class="pricing-card">
                <div class="pricing-header">
                    <div class="pricing-name">Kurumsal</div>
                    <div class="pricing-price">₺399<span>/ay</span></div>
                    <div class="pricing-period">12 ay ~ ₺319/ay</div>
                </div>
                <ul class="pricing-features">
                    <li><i class="fas fa-check"></i> 200 GB NVMe SSD</li>
                    <li><i class="fas fa-check"></i> Sınırsız Her Şey</li>
                    <li><i class="fas fa-check"></i> Dedicated IP</li>
                    <li><i class="fas fa-check"></i> Ücretsiz Domain</li>
                    <li><i class="fas fa-check"></i> VIP CDN</li>
                    <li><i class="fas fa-check"></i> Saatlik Yedekleme</li>
                    <li><i class="fas fa-check"></i> VIP Destek</li>
                </ul>
                <a href="<?= base_url('register') ?>" class="btn btn-secondary">Başla</a>
            </div>
        </div>
    </div>
</section>

<!-- Comparison -->
<section class="comparison">
    <div class="container">
        <div class="section-header">
            <div class="section-badge">Karşılaştırma</div>
            <h2 class="section-title">Plan Karşılaştırması</h2>
        </div>
        
        <div class="comparison-table">
            <table>
                <thead>
                    <tr>
                        <th>Özellik</th>
                        <th>Başlangıç</th>
                        <th>Profesyonel</th>
                        <th>Kurumsal</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Disk Alanı</td>
                        <td>10 GB</td>
                        <td>50 GB</td>
                        <td>200 GB</td>
                    </tr>
                    <tr>
                        <td>Website Sayısı</td>
                        <td>1</td>
                        <td>Sınırsız</td>
                        <td>Sınırsız</td>
                    </tr>
                    <tr>
                        <td>NVMe SSD</td>
                        <td><i class="fas fa-check success"></i></td>
                        <td><i class="fas fa-check success"></i></td>
                        <td><i class="fas fa-check success"></i></td>
                    </tr>
                    <tr>
                        <td>Ücretsiz Domain</td>
                        <td><i class="fas fa-times danger"></i></td>
                        <td><i class="fas fa-check success"></i></td>
                        <td><i class="fas fa-check success"></i></td>
                    </tr>
                    <tr>
                        <td>CDN</td>
                        <td><i class="fas fa-times danger"></i></td>
                        <td><i class="fas fa-check success"></i></td>
                        <td><i class="fas fa-check success"></i></td>
                    </tr>
                    <tr>
                        <td>Dedicated IP</td>
                        <td><i class="fas fa-times danger"></i></td>
                        <td><i class="fas fa-times danger"></i></td>
                        <td><i class="fas fa-check success"></i></td>
                    </tr>
                    <tr>
                        <td>Yedekleme</td>
                        <td>Günlük</td>
                        <td>Günlük</td>
                        <td>Saatlik</td>
                    </tr>
                </tbody>
            </table>
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
            <div class="faq-item">
                <div class="faq-question">
                    <span>Hosting nedir ve ne işe yarar?</span>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    Web hosting, web sitenizin internette görüntülenmesi için gereken alanı ve kaynakları sağlayan bir hizmettir. Hosting sayesinde siteniz 7/24 erişilebilir olur.
                </div>
            </div>
            
            <div class="faq-item">
                <div class="faq-question">
                    <span>NVMe SSD ne anlama geliyor?</span>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    NVMe (Non-Volatile Memory Express) SSD, geleneksel SSD'lere göre çok daha hızlı okuma/yazma işlemleri gerçekleştiren modern depolama teknolojisidir. Web siteniz çok daha hızlı açılır.
                </div>
            </div>
            
            <div class="faq-item">
                <div class="faq-question">
                    <span>Ücretsiz domain nedir?</span>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    Profesyonel ve Kurumsal paketlerde, yıllık faturalandırma ile .com, .net, .org gibi uzantılarda ücretsiz domain kaydı yapıyoruz.
                </div>
            </div>
            
            <div class="faq-item">
                <div class="faq-question">
                    <span>Hangi ödeme yöntemlerini kabul ediyorsunuz?</span>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    Kredi kartı, banka havalesi, QR kod ve mobil ödeme yöntemlerini kabul ediyoruz. Tüm ödemeleriniz güvenli bir şekilde işlenir.
                </div>
            </div>
            
            <div class="faq-item">
                <div class="faq-question">
                    <span>30 gün iade garantisi nedir?</span>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    Memnun kalmadığınız durumda, ilk 30 gün içinde tüm ödemenizi sorunsuz bir şekilde iade ediyoruz. Risk sizinle.
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="cta">
    <div class="container">
        <h2 class="cta-title">Hazır mısınız?</h2>
        <p class="cta-description">
            Hemen başlayın, ilk ay ücretsiz deneyin. Memnun kalmazsanız 30 gün içinde iade alın.
        </p>
        <a href="<?= base_url('register') ?>" class="btn btn-lg">
            Hemen Başla <i class="fas fa-arrow-right"></i>
        </a>
    </div>
</section>

<style>
.hero-page {
    padding: 160px 0 80px;
}

.hero-features {
    display: flex;
    gap: 24px;
    flex-wrap: wrap;
    margin-top: 24px;
}

.hero-features span {
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 14px;
    color: var(--text-secondary);
}

.hero-features i {
    color: var(--success);
}

.hero-image-wrapper {
    display: flex;
    justify-content: center;
    align-items: center;
}

.hero-server {
    text-align: center;
}

.server-icon {
    width: 200px;
    height: 200px;
    background: var(--gradient-primary);
    border-radius: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 80px;
    color: white;
    margin: 0 auto 20px;
    box-shadow: 0 20px 60px rgba(102, 126, 234, 0.4);
}

.server-status {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 12px 24px;
    background: var(--bg-card);
    border: 1px solid var(--border-subtle);
    border-radius: 100px;
    font-size: 14px;
    font-weight: 500;
}

.status-dot {
    width: 8px;
    height: 8px;
    background: var(--success);
    border-radius: 50%;
    animation: pulse 2s infinite;
}

@keyframes pulse {
    0%, 100% { opacity: 1; }
    50% { opacity: 0.5; }
}

/* Comparison */
.comparison {
    padding: var(--space-24) 0;
    background: var(--bg-secondary);
}

.comparison-table {
    overflow-x: auto;
}

.comparison-table table {
    width: 100%;
    border-collapse: collapse;
    background: var(--bg-card);
    border-radius: var(--radius-2xl);
    overflow: hidden;
}

.comparison-table th,
.comparison-table td {
    padding: var(--space-5);
    text-align: center;
    border-bottom: 1px solid var(--border-subtle);
}

.comparison-table th {
    background: var(--gradient-primary);
    color: white;
    font-weight: 600;
    padding: var(--space-6);
}

.comparison-table td:first-child {
    text-align: left;
    font-weight: 500;
}

.comparison-table tr:last-child td {
    border-bottom: none;
}

.comparison-table .success {
    color: var(--success);
}

.comparison-table .danger {
    color: var(--danger);
}

/* FAQ */
.faq {
    padding: var(--space-24) 0;
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
    line-height: 1.7;
    display: none;
}

.faq-item.active .faq-answer {
    display: block;
}

@media (max-width: 768px) {
    .hero-features {
        justify-content: center;
    }
    
    .comparison-table {
        font-size: var(--text-sm);
    }
    
    .comparison-table th,
    .comparison-table td {
        padding: var(--space-3);
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
