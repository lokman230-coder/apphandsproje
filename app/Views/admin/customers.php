<?php
/**
 * Müşteriler Sayfası
 */
$page_title = 'Müşteriler';
$breadcrumbs = [
    ['label' => 'Dashboard', 'url' => base_url('admin')],
    ['label' => 'Müşteriler']
];

ob_start();
?>
<div class="page-header">
    <div>
        <h1>Müşteriler</h1>
        <p class="text-muted">Tüm müşterilerinizi yönetin</p>
    </div>
    <a href="#" class="btn btn-primary">
        <i class="fas fa-plus"></i> Yeni Müşteri
    </a>
</div>

<div class="card">
    <div class="card-header">
        <div class="search-box">
            <i class="fas fa-search"></i>
            <input type="text" placeholder="Müşteri ara..." class="search-input">
        </div>
        <div class="filter-tabs">
            <button class="filter-tab active">Tümü</button>
            <button class="filter-tab">Aktif</button>
            <button class="filter-tab">Pasif</button>
        </div>
    </div>
    <div class="card-body" style="padding: 0;">
        <table class="data-table">
            <thead>
                <tr>
                    <th>Müşteri</th>
                    <th>E-posta</th>
                    <th>Telefon</th>
                    <th>Durum</th>
                    <th>Kayıt Tarihi</th>
                    <th>İşlemler</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($_SESSION['customers'] ?? [] as $customer): ?>
                <tr>
                    <td>
                        <div class="customer-info">
                            <div class="customer-avatar"><?= substr($customer['name'], 0, 1) ?></div>
                            <span><?= $customer['name'] ?></span>
                        </div>
                    </td>
                    <td><?= $customer['email'] ?></td>
                    <td><?= $customer['phone'] ?></td>
                    <td><span class="badge badge-<?= $customer['status'] ?>"><?= ucfirst($customer['status']) ?></span></td>
                    <td><?= $customer['created_at'] ?? date('Y-m-d') ?></td>
                    <td>
                        <div class="action-buttons">
                            <button class="btn-icon" title="Görüntüle"><i class="fas fa-eye"></i></button>
                            <button class="btn-icon" title="Düzenle"><i class="fas fa-edit"></i></button>
                            <button class="btn-icon" title="Sil"><i class="fas fa-trash"></i></button>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<style>
.page-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    margin-bottom: var(--space-8);
}

.page-header h1 {
    font-size: var(--text-2xl);
    margin-bottom: var(--space-2);
}

.text-muted {
    color: var(--text-muted);
}

.card-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: var(--space-5) var(--space-6);
    border-bottom: 1px solid var(--border-subtle);
}

.search-box {
    position: relative;
    width: 300px;
}

.search-box i {
    position: absolute;
    left: var(--space-4);
    top: 50%;
    transform: translateY(-50%);
    color: var(--text-muted);
}

.search-box .search-input {
    width: 100%;
    padding: var(--space-3) var(--space-4) var(--space-3) var(--space-12);
    background: var(--bg-secondary);
    border: 1px solid var(--border-subtle);
    border-radius: var(--radius-xl);
    color: var(--text-primary);
}

.filter-tabs {
    display: flex;
    gap: var(--space-2);
}

.filter-tab {
    padding: var(--space-2) var(--space-4);
    background: none;
    border: none;
    color: var(--text-muted);
    font-size: var(--text-sm);
    font-weight: 500;
    cursor: pointer;
    border-radius: var(--radius-lg);
    transition: var(--transition);
}

.filter-tab:hover {
    background: var(--bg-hover);
}

.filter-tab.active {
    background: var(--primary-500);
    color: white;
}

.customer-info {
    display: flex;
    align-items: center;
    gap: var(--space-3);
}

.customer-avatar {
    width: 36px;
    height: 36px;
    background: var(--gradient-primary);
    color: white;
    border-radius: var(--radius-full);
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 600;
}

.action-buttons {
    display: flex;
    gap: var(--space-2);
}

.btn-icon {
    width: 32px;
    height: 32px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: none;
    border: none;
    color: var(--text-muted);
    border-radius: var(--radius-lg);
    cursor: pointer;
    transition: var(--transition);
}

.btn-icon:hover {
    background: var(--bg-hover);
    color: var(--text-primary);
}
</style>
<?php
$page_content = ob_get_clean();
require __DIR__ . '/../layouts/admin-shell.php';
