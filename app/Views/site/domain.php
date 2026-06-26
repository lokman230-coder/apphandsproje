<?php
/**
 * Domain Kayıt Sayfası
 */
$pageTitle = 'Domain Kayıt - ' . SITE_NAME;
$current_page = 'domain';

ob_start();
?>

<!-- Hero Section -->
<section class="hero hero-page">
    <div class="container">
        <div class="hero-inner">
            <div class="hero-content">
                <div class="hero-badge">
                    <i class="fas fa-globe"></i>
                    Domain
                </div>
                
                <h1 class="hero-title">
                    Hayalinizdeki <span>Domain</span> Burada
                </h1>
                
                <p class="hero-description">
                    .com, .net, .org ve yüzlerce uzantıda domain kaydı. Hızlı, güvenli ve uygun fiyatlı.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Domain Checker -->
<section class="domain-section">
    <div class="container">
        <div class="domain-checker">
            <h2 class="domain-checker-title">
                <i class="fas fa-search"></i>
                Domain Sorgula
            </h2>
            
            <form class="domain-form" id="domainForm">
                <input type="text" name="domain" placeholder="domainadinizi.com" required>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-search"></i> Sorgula
                </button>
            </form>
            
            <div class="domain-results" id="domainResults" style="display: none;">
                <!-- Sonuçlar buraya gelecek -->
            </div>
            
            <div class="popular-extensions">
                <span>Popüler uzantılar:</span>
                <a href="#" class="ext-tag">.com</a>
                <a href="#" class="ext-tag">.net</a>
                <a href="#" class="ext-tag">.org</a>
                <a href="#" class="ext-tag">.io</a>
                <a href="#" class="ext-tag">.co</a>
                <a href="#" class="ext-tag">.app</a>
            </div>
        </div>
    </div>
</section>

<!-- Features -->
<section class="features">
    <div class="container">
        <div class="section-header">
            <div class="section-badge">Özellikler</div>
            <h2 class="section-title">Neden Bizimle Domain Almalısınız?</h2>
        </div>
        
        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-bolt"></i>
                </div>
                <h3 class="feature-title">Anında Kayıt</h3>
                <p class="feature-description">Ödeme sonrası domaininiz anında aktif olur.</p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-lock"></i>
                </div>
                <h3 class="feature-title">Güvenli Kayıt</h3>
                <p class="feature-description">WHOIS koruması ile bilgileriniz gizli kalır.</p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-sync-alt"></i>
                </div>
                <h3 class="feature-title">Kolay Transfer</h3>
                <p class="feature-description">Mevcut domainlerinizi kolayca transfer edin.</p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-server"></i>
                </div>
                <h3 class="feature-title">Ücretsiz DNS</h3>
                <p class="feature-description">Sınırsız DNS kaydı ve yönetimi ücretsiz.</p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h3 class="feature-title">Otomatik Yenileme</h3>
                <p class="feature-description">Domainleriniz süresi dolmadan otomatik yenilenir.</p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-headset"></i>
                </div>
                <h3 class="feature-title">7/24 Destek</h3>
                <p class="feature-description">Domain konusunda uzman destek ekibi.</p>
            </div>
        </div>
    </div>
</section>

<!-- Pricing -->
<section class="pricing">
    <div class="container">
        <div class="section-header">
            <div class="section-badge">Fiyatlar</div>
            <h2 class="section-title">Domain Fiyat Listesi</h2>
            <p class="section-description">Tüm fiyatlar yıllık kayıt içindir.</p>
        </div>
        
        <div class="pricing-table">
            <table>
                <thead>
                    <tr>
                        <th>Uzantı</th>
                        <th>Kayıt</th>
                        <th>Transfer</th>
                        <th>Yenileme</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="popular">
                        <td><strong>.com</strong></td>
                        <td>₺149</td>
                        <td>₺139</td>
                        <td>₺159</td>
                    </tr>
                    <tr>
                        <td><strong>.net</strong></td>
                        <td>₺159</td>
                        <td>₺149</td>
                        <td>₺169</td>
                    </tr>
                    <tr>
                        <td><strong>.org</strong></td>
                        <td>₺149</td>
                        <td>₺139</td>
                        <td>₺159</td>
                    </tr>
                    <tr>
                        <td><strong>.io</strong></td>
                        <td>₺299</td>
                        <td>₺279</td>
                        <td>₺349</td>
                    </tr>
                    <tr>
                        <td><strong>.co</strong></td>
                        <td>₺199</td>
                        <td>₺189</td>
                        <td>₺229</td>
                    </tr>
                    <tr>
                        <td><strong>.xyz</strong></td>
                        <td>₺49</td>
                        <td>₺39</td>
                        <td>₺59</td>
                    </tr>
                    <tr>
                        <td><strong>.online</strong></td>
                        <td>₺79</td>
                        <td>₺69</td>
                        <td>₺99</td>
                    </tr>
                    <tr>
                        <td><strong>.site</strong></td>
                        <td>₺59</td>
                        <td>₺49</td>
                        <td>₺79</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="cta">
    <div class="container">
        <h2 class="cta-title">Domaininizi Alın</h2>
        <p class="cta-description">
            Aradığınız domain müsait mi? Hemen kontrol edin.
        </p>
        <a href="#" onclick="document.getElementById('domainForm').scrollIntoView({behavior: 'smooth'}); return false;" class="btn btn-lg">
            Domain Sorgula <i class="fas fa-search"></i>
        </a>
    </div>
</section>

<style>
.domain-section {
    padding: var(--space-16) 0;
    background: var(--bg-secondary);
}

.domain-checker {
    background: var(--bg-card);
    border: 1px solid var(--border-subtle);
    border-radius: var(--radius-2xl);
    padding: var(--space-10);
    text-align: center;
    max-width: 800px;
    margin: -80px auto 0;
    position: relative;
    z-index: 10;
    box-shadow: var(--shadow-xl);
}

.domain-checker-title {
    font-size: var(--text-2xl);
    margin-bottom: var(--space-6);
    display: flex;
    align-items: center;
    justify-content: center;
    gap: var(--space-3);
}

.domain-form {
    display: flex;
    gap: var(--space-3);
    margin-bottom: var(--space-6);
}

.domain-form input {
    flex: 1;
    padding: var(--space-4) var(--space-6);
    font-size: var(--text-lg);
    border: 2px solid var(--border-subtle);
    border-radius: var(--radius-xl);
    background: var(--bg-primary);
    color: var(--text-primary);
}

.domain-form input:focus {
    outline: none;
    border-color: var(--primary-500);
}

.domain-form .btn {
    flex-shrink: 0;
}

.domain-results {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: var(--space-4);
    margin-bottom: var(--space-6);
}

.domain-result {
    background: var(--bg-secondary);
    padding: var(--space-4);
    border-radius: var(--radius-lg);
    text-align: center;
    border: 2px solid transparent;
}

.domain-result.available {
    border-color: var(--success);
    background: rgba(16, 185, 129, 0.05);
}

.domain-result.taken {
    border-color: var(--danger);
    opacity: 0.6;
}

.domain-name {
    font-weight: 600;
    margin-bottom: var(--space-2);
}

.domain-price {
    font-size: var(--text-sm);
    color: var(--text-muted);
}

.domain-result.available .domain-price {
    color: var(--success);
    font-weight: 600;
}

.domain-result .btn {
    margin-top: var(--space-2);
    width: 100%;
}

.popular-extensions {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: var(--space-2);
    flex-wrap: wrap;
}

.popular-extensions span {
    color: var(--text-muted);
    font-size: var(--text-sm);
}

.ext-tag {
    padding: var(--space-1) var(--space-3);
    background: var(--bg-secondary);
    border-radius: var(--radius-full);
    font-size: var(--text-sm);
    font-weight: 500;
    color: var(--text-primary);
    transition: var(--transition);
}

.ext-tag:hover {
    background: var(--primary-500);
    color: white;
}

/* Pricing Table */
.pricing-table {
    overflow-x: auto;
}

.pricing-table table {
    width: 100%;
    border-collapse: collapse;
    background: var(--bg-card);
    border-radius: var(--radius-2xl);
    overflow: hidden;
}

.pricing-table th,
.pricing-table td {
    padding: var(--space-4) var(--space-6);
    text-align: center;
    border-bottom: 1px solid var(--border-subtle);
}

.pricing-table th {
    background: var(--gradient-primary);
    color: white;
    font-weight: 600;
}

.pricing-table tr:last-child td {
    border-bottom: none;
}

.pricing-table tr.popular td {
    background: rgba(102, 126, 234, 0.05);
}

@media (max-width: 768px) {
    .domain-form {
        flex-direction: column;
    }
    
    .domain-results {
        grid-template-columns: repeat(2, 1fr);
    }
}
</style>

<script>
document.getElementById('domainForm').addEventListener('submit', async function(e) {
    e.preventDefault();
    const domain = this.querySelector('input').value.trim();
    const results = document.getElementById('domainResults');
    results.style.display = 'grid';
    results.innerHTML = '<div style="grid-column: 1/-1; text-align: center; padding: 20px;"><i class="fas fa-spinner fa-spin"></i> Sorgulanıyor...</div>';
    
    // Simüle edilmiş sonuçlar
    setTimeout(() => {
        const extensions = [
            { ext: '.com', available: Math.random() > 0.3 },
            { ext: '.net', available: Math.random() > 0.4 },
            { ext: '.org', available: Math.random() > 0.5 },
            { ext: '.io', available: Math.random() > 0.6 },
        ];
        
        let html = '';
        extensions.forEach(item => {
            html += `
                <div class="domain-result ${item.available ? 'available' : 'taken'}">
                    <div class="domain-name">${domain}${item.ext}</div>
                    <div class="domain-price">${item.available ? '₺89/yıl' : 'Alınmış'}</div>
                    ${item.available ? '<a href="#" class="btn btn-sm btn-primary">Satın Al</a>' : ''}
                </div>
            `;
        });
        results.innerHTML = html;
    }, 1000);
});
</script>

<?php
$page_content = ob_get_clean();
require __DIR__ . '/../layouts/site-layout.php';
