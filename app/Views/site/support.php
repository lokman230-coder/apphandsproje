<?php
/**
 * Destek Sayfası
 */
$pageTitle = 'Destek - ' . SITE_NAME;
$current_page = 'support';

ob_start();
?>

<section class="hero hero-page">
    <div class="container">
        <div class="hero-inner" style="text-align: center;">
            <div class="hero-content" style="max-width: 700px; margin: 0 auto;">
                <div class="hero-badge">
                    <i class="fas fa-headset"></i>
                    Destek Merkezi
                </div>
                
                <h1 class="hero-title">
                    Size Nasıl <span>Yardımcı</span> Olabiliriz?
                </h1>
                
                <p class="hero-description">
                    7/24 aktif destek ekibimiz sorularınızı yanıtlamak için hazır.
                    Canlı sohbet, telefon veya e-posta ile bize ulaşın.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Support Options -->
<section class="support-options">
    <div class="container">
        <div class="options-grid">
            <div class="option-card">
                <div class="option-icon">
                    <i class="fas fa-comments"></i>
                </div>
                <h3>Canlı Sohbet</h3>
                <p>Anında yanıt alın</p>
                <span class="option-status online">Çevrimiçi</span>
                <button class="btn btn-primary">Sohbete Başla</button>
            </div>
            
            <div class="option-card">
                <div class="option-icon">
                    <i class="fas fa-ticket-alt"></i>
                </div>
                <h3>Destek Talebi</h3>
                <p>Ticket oluşturun</p>
                <span class="option-status">7/24 Hizmet</span>
                <button class="btn btn-secondary">Talep Oluştur</button>
            </div>
            
            <div class="option-card">
                <div class="option-icon">
                    <i class="fas fa-phone-alt"></i>
                </div>
                <h3>Telefon</h3>
                <p>0850 XXX XX XX</p>
                <span class="option-status">09:00 - 22:00</span>
                <button class="btn btn-secondary">Ara</button>
            </div>
            
            <div class="option-card">
                <div class="option-icon">
                    <i class="fas fa-envelope"></i>
                </div>
                <h3>E-posta</h3>
                <p>destek@ahostone.com</p>
                <span class="option-status">24 saat içinde</span>
                <button class="btn btn-secondary">Gönder</button>
            </div>
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
                ['q' => 'Hosting hesabımı nasıl aktif edebilirim?', 'a' => 'Ödeme onaylandıktan sonra hesabınız otomatik olarak aktif olur. E-posta adresinize giriş bilgileri gönderilir.'],
                ['q' => 'Domain kaydı için ne gereklidir?', 'a' => 'Domain kaydı için TC Kimlik numarası (gerçek kişiler) veya Vergi Dairesi bilgileri (tüzel kişiler) gereklidir.'],
                ['q' => 'SSL sertifikası nasıl kurulur?', 'a' => 'cPanel üzerinden AutoSSL ile otomatik kurulum yapabilir veya destek talebi açarak manuel kurulum isteyebilirsiniz.'],
                ['q' => 'VPS sunucuma nasıl bağlanırım?', 'a' => 'VPS kontrol panelinizden VNC konsol veya SSH ile sunucunuza bağlanabilirsiniz. Giriş bilgileri e-postanıza gönderilir.'],
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

<!-- Knowledge Base -->
<section class="knowledgebase">
    <div class="container">
        <div class="section-header">
            <div class="section-badge">Bilgi Bankası</div>
            <h2 class="section-title">Popüler Rehberler</h2>
        </div>
        
        <div class="guides-grid">
            <a href="#" class="guide-card">
                <i class="fas fa-rocket"></i>
                <h4>WordPress Kurulumu</h4>
                <p>5 dakikada WordPress kurulumu</p>
            </a>
            
            <a href="#" class="guide-card">
                <i class="fas fa-lock"></i>
                <h4>SSL Aktifleştirme</h4>
                <p>Ücretsiz SSL kurulumu</p>
            </a>
            
            <a href="#" class="guide-card">
                <i class="fas fa-database"></i>
                <h4>Veritabanı Oluşturma</h4>
                <p>MySQL veritabanı kurulumu</p>
            </a>
            
            <a href="#" class="guide-card">
                <i class="fas fa-upload"></i>
                <h4>FTP Bağlantısı</h4>
                <p>Dosya yükleme ayarları</p>
            </a>
        </div>
    </div>
</section>

<style>
.support-options {
    padding: var(--space-16) 0;
    background: var(--bg-secondary);
}

.options-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: var(--space-6);
}

.option-card {
    background: var(--bg-card);
    border: 1px solid var(--border-subtle);
    border-radius: var(--radius-2xl);
    padding: var(--space-8);
    text-align: center;
}

.option-icon {
    width: 80px;
    height: 80px;
    background: var(--gradient-primary);
    border-radius: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 32px;
    color: white;
    margin: 0 auto var(--space-6);
}

.option-card h3 {
    font-size: var(--text-xl);
    margin-bottom: var(--space-2);
}

.option-card p {
    color: var(--text-muted);
    font-size: var(--text-sm);
    margin-bottom: var(--space-4);
}

.option-status {
    display: inline-block;
    padding: var(--space-1) var(--space-3);
    background: var(--bg-secondary);
    border-radius: var(--radius-full);
    font-size: var(--text-xs);
    color: var(--text-muted);
    margin-bottom: var(--space-4);
}

.option-status.online {
    background: rgba(16, 185, 129, 0.1);
    color: var(--success);
}

.knowledgebase {
    padding: var(--space-24) 0;
}

.guides-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: var(--space-6);
}

.guide-card {
    background: var(--bg-card);
    border: 1px solid var(--border-subtle);
    border-radius: var(--radius-xl);
    padding: var(--space-6);
    text-decoration: none;
    transition: var(--transition);
}

.guide-card:hover {
    transform: translateY(-4px);
    box-shadow: var(--shadow-lg);
    border-color: var(--primary-500);
}

.guide-card i {
    font-size: 32px;
    color: var(--primary-500);
    margin-bottom: var(--space-4);
}

.guide-card h4 {
    font-size: var(--text-base);
    margin-bottom: var(--space-2);
    color: var(--text-primary);
}

.guide-card p {
    font-size: var(--text-sm);
    color: var(--text-muted);
}

@media (max-width: 1024px) {
    .options-grid,
    .guides-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 768px) {
    .options-grid,
    .guides-grid {
        grid-template-columns: 1fr;
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
