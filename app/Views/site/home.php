<?php
/**
 * Ana Sayfa
 */
ob_start();
?>

<!-- Hero Section -->
<section class="hero">
    <div class="container">
        <div class="hero-inner">
            <div class="hero-content">
                <div class="hero-badge">
                    <i class="fas fa-bolt"></i>
                    Yeni Nesil Hosting Platformu
                </div>
                
                <h1 class="hero-title">
                    Dijital Dünyada <span>Güvenilir</span> Partneriniz
                </h1>
                
                <p class="hero-description">
                    Yüksek performanslı sunucular, yapay zeka destekli yönetim ve 7/24 uzman destek ile işinizi büyütün.
                </p>
                
                <div class="hero-actions">
                    <a href="<?= base_url('register') ?>" class="btn btn-primary btn-lg">
                        Hemen Başla <i class="fas fa-arrow-right"></i>
                    </a>
                    <a href="<?= base_url('hosting') ?>" class="btn btn-secondary btn-lg">
                        Hosting Planları
                    </a>
                </div>
                
                <div class="hero-stats">
                    <div class="stat-item">
                        <div class="stat-value">50K+</div>
                        <div class="stat-label">Mutlu Müşteri</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-value">99.9%</div>
                        <div class="stat-label">Çalışma Süresi</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-value">7/24</div>
                        <div class="stat-label">Destek</div>
                    </div>
                </div>
            </div>
            
            <div class="hero-visual">
                <div class="hero-float" style="top: 10%; right: -30px; animation: float 3s ease-in-out infinite;">
                    <div style="display: flex; align-items: center; gap: 12px;">
                        <div style="width: 48px; height: 48px; background: var(--success); border-radius: 12px; display: flex; align-items: center; justify-content: center;">
                            <i class="fas fa-server" style="color: white;"></i>
                        </div>
                        <div>
                            <div style="font-weight: 600;">Sunucu Aktif</div>
                            <div style="font-size: 12px; color: var(--text-muted);">Tüm sistemler çalışıyor</div>
                        </div>
                    </div>
                </div>
                
                <div class="hero-float" style="bottom: 15%; left: -40px; animation: float 3s ease-in-out infinite; animation-delay: 1.5s;">
                    <div style="display: flex; align-items: center; gap: 12px;">
                        <div style="width: 48px; height: 48px; background: var(--primary-500); border-radius: 12px; display: flex; align-items: center; justify-content: center;">
                            <i class="fas fa-shield-alt" style="color: white;"></i>
                        </div>
                        <div>
                            <div style="font-weight: 600;">SSL Sertifikası</div>
                            <div style="font-size: 12px; color: var(--text-muted);">Ücretsiz & Otomatik</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="features">
    <div class="container">
        <div class="section-header">
            <div class="section-badge">Özellikler</div>
            <h2 class="section-title">Neden Bizi Tercih Etmelisiniz?</h2>
            <p class="section-description">
                En son teknoloji altyapımız ve uzman kadromuzla dijital dünyada bir adım önde olun.
            </p>
        </div>
        
        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-bolt"></i>
                </div>
                <h3 class="feature-title">Yüksek Performans</h3>
                <p class="feature-description">
                    NVMe SSD depolama, en son AMD EPYC işlemciler ve optimize edilmiş sunucular ile benzersiz hız.
                </p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h3 class="feature-title">Güvenlik</h3>
                <p class="feature-description">
                    Ücretsiz SSL, DDoS koruması, günlük yedekleme ve gelişmiş firewall ile tam güvenlik.
                </p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-headset"></i>
                </div>
                <h3 class="feature-title">7/24 Destek</h3>
                <p class="feature-description">
                    Uzman teknik destek ekibimiz her zaman yanınızda. Canlı sohbet, telefon ve e-posta ile ulaşın.
                </p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-robot"></i>
                </div>
                <h3 class="feature-title">Yapay Zeka</h3>
                <p class="feature-description">
                    AI destekli analiz, otomatik optimizasyon ve akıllı öneri sistemleri ile kolay yönetim.
                </p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-sync-alt"></i>
                </div>
                <h3 class="feature-title">Kolay Geçiş</h3>
                <p class="feature-description">
                    Ücretsiz site taşıma, otomatik domain transfer ve profesyonel destek ile sorunsuz geçiş.
                </p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-puzzle-piece"></i>
                </div>
                <h3 class="feature-title">Kolay Entegrasyon</h3>
                <p class="feature-description">
                    One-click WordPress, cPanel, Softaculous ve yüzlerce uygulama ile anında başlayın.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Pricing Section -->
<section class="pricing">
    <div class="container">
        <div class="section-header">
            <div class="section-badge">Fiyatlandırma</div>
            <h2 class="section-title">Size Uygun Planı Seçin</h2>
            <p class="section-description">
                Her bütçeye uygun, şeffaf fiyatlandırma. Gizli maliyet yok.
            </p>
        </div>
        
        <div class="pricing-grid">
            <div class="pricing-card">
                <div class="pricing-header">
                    <div class="pricing-name">Başlangıç</div>
                    <div class="pricing-price">₺49<span>/ay</span></div>
                    <div class="pricing-period">12 ay ~ ₺39/ay</div>
                </div>
                <ul class="pricing-features">
                    <li><i class="fas fa-check"></i> 10 GB NVMe SSD</li>
                    <li><i class="fas fa-check"></i> 1 Domain</li>
                    <li><i class="fas fa-check"></i> Ücretsiz SSL</li>
                    <li><i class="fas fa-check"></i> Günlük Yedekleme</li>
                    <li><i class="fas fa-check"></i> 7/24 Destek</li>
                </ul>
                <a href="<?= base_url('register') ?>" class="btn btn-secondary">Başla</a>
            </div>
            
            <div class="pricing-card popular">
                <div class="pricing-badge">En Popüler</div>
                <div class="pricing-header">
                    <div class="pricing-name">Profesyonel</div>
                    <div class="pricing-price">₺149<span>/ay</span></div>
                    <div class="pricing-period">12 ay ~ ₺119/ay</div>
                </div>
                <ul class="pricing-features">
                    <li><i class="fas fa-check"></i> 50 GB NVMe SSD</li>
                    <li><i class="fas fa-check"></i> Sınırsız Domain</li>
                    <li><i class="fas fa-check"></i> Ücretsiz Domain + SSL</li>
                    <li><i class="fas fa-check"></i> CDN + Cache</li>
                    <li><i class="fas fa-check"></i> Öncelikli Destek</li>
                </ul>
                <a href="<?= base_url('register') ?>" class="btn btn-primary">Başla</a>
            </div>
            
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
                    <li><i class="fas fa-check"></i> VIP Destek</li>
                    <li><i class="fas fa-check"></i> Özel Çözümler</li>
                </ul>
                <a href="<?= base_url('register') ?>" class="btn btn-secondary">Başla</a>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta">
    <div class="container">
        <h2 class="cta-title">Hemen Başlayın</h2>
        <p class="cta-description">
            30 gün para iade garantisi ile risk almadan deneyin. İlk ay ücretsiz!
        </p>
        <a href="<?= base_url('register') ?>" class="btn btn-lg">
            Ücretsiz Dene <i class="fas fa-arrow-right"></i>
        </a>
    </div>
</section>

<?php
$page_content = ob_get_clean();
require __DIR__ . '/../layouts/site-layout.php';
