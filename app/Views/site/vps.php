<?php
/**
 * VPS / VDS Sunucular Sayfası
 */
$pageTitle = 'VPS Sunucular - ' . SITE_NAME;
$current_page = 'vps';

ob_start();
?>

<!-- Hero Section -->
<section class="hero hero-page">
    <div class="container">
        <div class="hero-inner">
            <div class="hero-content">
                <div class="hero-badge">
                    <i class="fas fa-server"></i>
                    VPS / VDS
                </div>
                
                <h1 class="hero-title">
                    Tam Kontrol, <span>Sınırsız</span> Güç
                </h1>
                
                <p class="hero-description">
                    Kendi sunucunuz, tam root erişimi, izole kaynaklar ve isteğinize göre yapılandırılmış VPS/VDS çözümleri.
                </p>
                
                <div class="hero-actions">
                    <a href="<?= base_url('register') ?>" class="btn btn-primary btn-lg">
                        Sunucu Kirala <i class="fas fa-arrow-right"></i>
                    </a>
                    <a href="#plans" class="btn btn-secondary btn-lg">
                        Planları İncele
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Features -->
<section class="features">
    <div class="container">
        <div class="section-header">
            <div class="section-badge">Özellikler</div>
            <h2 class="section-title">Neden VPS/VDS Tercih Etmelisiniz?</h2>
        </div>
        
        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-crown"></i>
                </div>
                <h3 class="feature-title">Tam Kontrol</h3>
                <p class="feature-description">Root erişimi ile sunucunuzu istediğiniz gibi yapılandırın.</p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h3 class="feature-title">İzole Kaynaklar</h3>
                <p class="feature-description">Diğer kullanıcılardan bağımsız, garantili CPU, RAM ve disk.</p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-tachometer-alt"></i>
                </div>
                <h3 class="feature-title">Yüksek Performans</h3>
                <p class="feature-description">NVMe SSD ve en son AMD EPYC işlemciler ile max performans.</p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-redo"></i>
                </div>
                <h3 class="feature-title">Anında Kurulum</h3>
                <p class="feature-description">Ödeme sonrası sunucunuz dakikalar içinde aktif.</p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-globe"></i>
                </div>
                <h3 class="feature-title">Çoklu Lokasyon</h3>
                <p class="feature-description">Türkiye, Almanya veya Hollanda lokasyonlarından seçim.</p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-headset"></i>
                </div>
                <h3 class="feature-title">7/24 Destek</h3>
                <p class="feature-description">Teknik destek ekibimiz her zaman yanınızda.</p>
            </div>
        </div>
    </div>
</section>

<!-- Pricing Plans -->
<section class="pricing" id="plans">
    <div class="container">
        <div class="section-header">
            <div class="section-badge">Fiyatlandırma</div>
            <h2 class="section-title">VPS Sunucu Planları</h2>
            <p class="section-description">Tüm planlar NVMe SSD, 1 Gbps ağ ve 7/24 destek içerir.</p>
        </div>
        
        <div class="pricing-grid">
            <!-- VPS 1 -->
            <div class="pricing-card">
                <div class="pricing-header">
                    <div class="pricing-name">VPS Start</div>
                    <div class="pricing-price">₺199<span>/ay</span></div>
                    <div class="pricing-period">12 ay ~ ₺159/ay</div>
                </div>
                <ul class="pricing-features">
                    <li><i class="fas fa-check"></i> 2 vCPU AMD EPYC</li>
                    <li><i class="fas fa-check"></i> 4 GB RAM</li>
                    <li><i class="fas fa-check"></i> 50 GB NVMe SSD</li>
                    <li><i class="fas fa-check"></i> 1 Gbps Ağ</li>
                    <li><i class="fas fa-check"></i> 2 TB Trafik</li>
                    <li><i class="fas fa-check"></i> Full Root Erişimi</li>
                    <li><i class="fas fa-check"></i> DDoS Koruması</li>
                </ul>
                <a href="<?= base_url('register') ?>" class="btn btn-secondary">Başla</a>
            </div>
            
            <!-- VPS 2 -->
            <div class="pricing-card popular">
                <div class="pricing-badge">En Popüler</div>
                <div class="pricing-header">
                    <div class="pricing-name">VPS Pro</div>
                    <div class="pricing-price">₺399<span>/ay</span></div>
                    <div class="pricing-period">12 ay ~ ₺319/ay</div>
                </div>
                <ul class="pricing-features">
                    <li><i class="fas fa-check"></i> 4 vCPU AMD EPYC</li>
                    <li><i class="fas fa-check"></i> 8 GB RAM</li>
                    <li><i class="fas fa-check"></i> 100 GB NVMe SSD</li>
                    <li><i class="fas fa-check"></i> 1 Gbps Ağ</li>
                    <li><i class="fas fa-check"></i> 4 TB Trafik</li>
                    <li><i class="fas fa-check"></i> Full Root Erişimi</li>
                    <li><i class="fas fa-check"></i> DDoS Koruması</li>
                </ul>
                <a href="<?= base_url('register') ?>" class="btn btn-primary">Başla</a>
            </div>
            
            <!-- VPS 3 -->
            <div class="pricing-card">
                <div class="pricing-header">
                    <div class="pricing-name">VPS Business</div>
                    <div class="pricing-price">₺799<span>/ay</span></div>
                    <div class="pricing-period">12 ay ~ ₺639/ay</div>
                </div>
                <ul class="pricing-features">
                    <li><i class="fas fa-check"></i> 8 vCPU AMD EPYC</li>
                    <li><i class="fas fa-check"></i> 16 GB RAM</li>
                    <li><i class="fas fa-check"></i> 200 GB NVMe SSD</li>
                    <li><i class="fas fa-check"></i> 10 Gbps Ağ</li>
                    <li><i class="fas fa-check"></i> 10 TB Trafik</li>
                    <li><i class="fas fa-check"></i> Full Root Erişimi</li>
                    <li><i class="fas fa-check"></i> VIP DDoS Koruması</li>
                </ul>
                <a href="<?= base_url('register') ?>" class="btn btn-secondary">Başla</a>
            </div>
        </div>
    </div>
</section>

<!-- Specs -->
<section class="specs">
    <div class="container">
        <div class="section-header">
            <div class="section-badge">Teknik Detaylar</div>
            <h2 class="section-title">Sunucu Özellikleri</h2>
        </div>
        
        <div class="specs-grid">
            <div class="spec-card">
                <div class="spec-icon"><i class="fas fa-microchip"></i></div>
                <h4>İşlemci</h4>
                <p>AMD EPYC 7443P<br>24 Çekirdek @ 2.85 GHz</p>
            </div>
            
            <div class="spec-card">
                <div class="spec-icon"><i class="fas fa-memory"></i></div>
                <h4>RAM</h4>
                <p>DDR4 ECC<br>3200 MHz</p>
            </div>
            
            <div class="spec-card">
                <div class="spec-icon"><i class="fas fa-hdd"></i></div>
                <h4>Depolama</h4>
                <p>NVMe SSD<br>3500 MB/s Okuma</p>
            </div>
            
            <div class="spec-card">
                <div class="spec-icon"><i class="fas fa-network-wired"></i></div>
                <h4>Ağ</h4>
                <p>1-10 Gbps<br>DDoS Koruması</p>
            </div>
            
            <div class="spec-card">
                <div class="spec-icon"><i class="fas fa-globe"></i></div>
                <h4>Lokasyon</h4>
                <p>Türkiye (İstanbul)<br>Almanya (Frankfurt)</p>
            </div>
            
            <div class="spec-card">
                <div class="spec-icon"><i class="fas fa-sync"></i></div>
                <h4>Yedekleme</h4>
                <p>Haftalık Otomatik<br>Ücretsiz Snapshot</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="cta">
    <div class="container">
        <h2 class="cta-title">Sunucunuz Hazır mı?</h2>
        <p class="cta-description">
            Hemen başlayın, ilk ay ücretsiz deneyin.
        </p>
        <a href="<?= base_url('register') ?>" class="btn btn-lg">
            Hemen Başla <i class="fas fa-arrow-right"></i>
        </a>
    </div>
</section>

<style>
.specs {
    padding: var(--space-24) 0;
    background: var(--bg-secondary);
}

.specs-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: var(--space-6);
}

.spec-card {
    background: var(--bg-card);
    border: 1px solid var(--border-subtle);
    border-radius: var(--radius-2xl);
    padding: var(--space-8);
    text-align: center;
}

.spec-icon {
    width: 64px;
    height: 64px;
    background: var(--primary-50);
    border-radius: var(--radius-xl);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: var(--text-2xl);
    color: var(--primary-500);
    margin: 0 auto var(--space-4);
}

.spec-card h4 {
    font-size: var(--text-lg);
    margin-bottom: var(--space-2);
}

.spec-card p {
    color: var(--text-muted);
    font-size: var(--text-sm);
    line-height: 1.6;
}

@media (max-width: 1024px) {
    .specs-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 768px) {
    .specs-grid {
        grid-template-columns: 1fr;
    }
}
</style>

<?php
$page_content = ob_get_clean();
require __DIR__ . '/../layouts/site-layout.php';
