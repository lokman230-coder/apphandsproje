<?php
/**
 * Müşteri Dashboard
 */
$page_title = 'Dashboard';
$breadcrumbs = [['label' => 'Dashboard']];

ob_start();
?>

<div class="dashboard-header">
    <div>
        <h1>Hoş Geldiniz, <?= $_SESSION['user']['name'] ?? 'Kullanıcı' ?>!</h1>
        <p>Müşteri paneline hoş geldiniz. Hizmetlerinizi buradan yönetin.</p>
    </div>
    <div class="dashboard-actions">
        <a href="<?= base_url('cart') ?>" class="btn btn-primary">
            <i class="fas fa-plus"></i> Yeni Hizmet Al
        </a>
    </div>
</div>

<!-- Stats -->
<div class="stats-row">
    <div class="stat-card">
        <div class="stat-icon primary">
            <i class="fas fa-server"></i>
        </div>
        <div class="stat-info">
            <div class="stat-value">3</div>
            <div class="stat-label">Aktif Hosting</div>
        </div>
    </div>
    
    <div class="stat-card">
        <div class="stat-icon success">
            <i class="fas fa-globe"></i>
        </div>
        <div class="stat-info">
            <div class="stat-value">5</div>
            <div class="stat-label">Domain</div>
        </div>
    </div>
    
    <div class="stat-card">
        <div class="stat-icon warning">
            <i class="fas fa-file-invoice-dollar"></i>
        </div>
        <div class="stat-info">
            <div class="stat-value">₺2,499</div>
            <div class="stat-label">Bekleyen Fatura</div>
        </div>
    </div>
    
    <div class="stat-card">
        <div class="stat-icon info">
            <i class="fas fa-ticket-alt"></i>
        </div>
        <div class="stat-info">
            <div class="stat-value">1</div>
            <div class="stat-label">Açık Destek</div>
        </div>
    </div>
</div>

<!-- Services -->
<div class="section-header-inline">
    <h2>Hizmetlerim</h2>
    <a href="<?= base_url('customer/services') ?>" class="btn btn-sm btn-ghost">Tümünü Gör</a>
</div>

<div class="services-grid">
    <div class="service-card">
        <div class="service-header">
            <div class="service-icon">
                <i class="fas fa-globe"></i>
            </div>
            <div class="service-info">
                <h3>orneksite.com</h3>
                <span>Web Hosting</span>
            </div>
        </div>
        <div class="service-status">Aktif</div>
        <div class="service-meta">
            <p><span>Plan</span><span>Profesyonel</span></p>
            <p><span>Sonlanma</span><span>2025-06-15</span></p>
            <p><span>Disk</span><span>35 GB / 50 GB</span></p>
        </div>
        <div style="margin-top: 16px; display: flex; gap: 8px;">
            <a href="#" class="btn btn-sm btn-secondary" style="flex: 1;">Yönet</a>
            <a href="#" class="btn btn-sm btn-ghost">Detay</a>
        </div>
    </div>
    
    <div class="service-card">
        <div class="service-header">
            <div class="service-icon">
                <i class="fas fa-hdd"></i>
            </div>
            <div class="service-info">
                <h3>VPS-001</h3>
                <span>VPS Server</span>
            </div>
        </div>
        <div class="service-status">Aktif</div>
        <div class="service-meta">
            <p><span>Plan</span><span>VPS Pro</span></p>
            <p><span>Sonlanma</span><span>2025-03-20</span></p>
            <p><span>Disk</span><span>72 GB / 100 GB</span></p>
        </div>
        <div style="margin-top: 16px; display: flex; gap: 8px;">
            <a href="#" class="btn btn-sm btn-secondary" style="flex: 1;">Yönet</a>
            <a href="#" class="btn btn-sm btn-ghost">Detay</a>
        </div>
    </div>
    
    <div class="service-card">
        <div class="service-header">
            <div class="service-icon">
                <i class="fas fa-lock"></i>
            </div>
            <div class="service-info">
                <h3>SSL Sertifikası</h3>
                <span>Güvenlik</span>
            </div>
        </div>
        <div class="service-status">Aktif</div>
        <div class="service-meta">
            <p><span>Tip</span><span>Wildcard SSL</span></p>
            <p><span>Sonlanma</span><span>2025-12-01</span></p>
            <p><span>Domain</span><span>*.orneksite.com</span></p>
        </div>
        <div style="margin-top: 16px; display: flex; gap: 8px;">
            <a href="#" class="btn btn-sm btn-secondary" style="flex: 1;">Yönet</a>
            <a href="#" class="btn btn-sm btn-ghost">Detay</a>
        </div>
    </div>
</div>

<!-- Quick Actions -->
<div class="section-header-inline">
    <h2>Hızlı İşlemler</h2>
</div>

<div class="quick-actions">
    <a href="<?= base_url('cart') ?>" class="quick-action">
        <i class="fas fa-cart-plus"></i>
        <span>Sepete Ekle</span>
    </a>
    <a href="<?= base_url('customer/support') ?>" class="quick-action">
        <i class="fas fa-plus-circle"></i>
        <span>Destek Talebi</span>
    </a>
    <a href="<?= base_url('customer/profile') ?>" class="quick-action">
        <i class="fas fa-user-cog"></i>
        <span>Profili Düzenle</span>
    </a>
    <a href="<?= base_url('domain') ?>" class="quick-action">
        <i class="fas fa-search"></i>
        <span>Domain Sorgula</span>
    </a>
</div>

<style>
.section-header-inline {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: var(--space-6);
}

.section-header-inline h2 {
    font-size: var(--text-xl);
}
</style>

<?php
$page_content = ob_get_clean();
require __DIR__ . '/../layouts/customer-shell.php';
