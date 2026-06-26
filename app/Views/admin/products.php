<?php
/**
 * Ürünler Sayfası
 */
$page_title = 'Ürünler';
$breadcrumbs = [
    ['label' => 'Dashboard', 'url' => base_url('admin')],
    ['label' => 'Ürünler']
];

$products = [
    ['id' => 1, 'name' => 'Başlangıç Hosting', 'category' => 'Hosting', 'price' => 49, 'status' => 'active', 'sales' => 234],
    ['id' => 2, 'name' => 'Profesyonel Hosting', 'category' => 'Hosting', 'price' => 149, 'status' => 'active', 'sales' => 189],
    ['id' => 3, 'name' => 'Kurumsal Hosting', 'category' => 'Hosting', 'price' => 399, 'status' => 'active', 'sales' => 67],
    ['id' => 4, 'name' => 'VPS Start', 'category' => 'VPS', 'price' => 199, 'status' => 'active', 'sales' => 45],
    ['id' => 5, 'name' => 'VPS Pro', 'category' => 'VPS', 'price' => 399, 'status' => 'active', 'sales' => 32],
    ['id' => 6, 'name' => 'Standart SSL', 'category' => 'SSL', 'price' => 99, 'status' => 'inactive', 'sales' => 12],
];

ob_start();
?>
<div class="page-header">
    <div>
        <h1>Ürünler</h1>
        <p class="text-muted">Tüm ürün ve hizmetlerinizi yönetin</p>
    </div>
    <a href="#" class="btn btn-primary">
        <i class="fas fa-plus"></i> Yeni Ürün
    </a>
</div>

<div class="card">
    <div class="card-header">
        <div class="search-box">
            <i class="fas fa-search"></i>
            <input type="text" placeholder="Ürün ara..." class="search-input">
        </div>
        <div class="filter-tabs">
            <button class="filter-tab active">Tümü</button>
            <button class="filter-tab">Hosting</button>
            <button class="filter-tab">VPS</button>
            <button class="filter-tab">SSL</button>
        </div>
    </div>
    <div class="card-body" style="padding: 0;">
        <table class="data-table">
            <thead>
                <tr>
                    <th>Ürün</th>
                    <th>Kategori</th>
                    <th>Fiyat</th>
                    <th>Satış</th>
                    <th>Durum</th>
                    <th>İşlemler</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product): ?>
                <tr>
                    <td>
                        <div class="product-info">
                            <div class="product-icon">
                                <i class="fas fa-<?= $product['category'] === 'VPS' ? 'server' : ($product['category'] === 'SSL' ? 'lock' : 'box') ?>"></i>
                            </div>
                            <span><?= $product['name'] ?></span>
                        </div>
                    </td>
                    <td><span class="badge badge-outline"><?= $product['category'] ?></span></td>
                    <td><strong>₺<?= number_format($product['price'], 0) ?></strong><span style="color: var(--text-muted); font-size: 12px;">/ay</span></td>
                    <td><?= $product['sales'] ?></td>
                    <td><span class="badge badge-<?= $product['status'] ?>"><?= ucfirst($product['status']) ?></span></td>
                    <td>
                        <div class="action-buttons">
                            <button class="btn-icon" title="Düzenle"><i class="fas fa-edit"></i></button>
                            <button class="btn-icon" title="Kopyala"><i class="fas fa-copy"></i></button>
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

.data-table {
    width: 100%;
    border-collapse: collapse;
}

.data-table th,
.data-table td {
    padding: var(--space-4) var(--space-6);
    text-align: left;
    border-bottom: 1px solid var(--border-subtle);
}

.data-table th {
    font-size: var(--text-xs);
    font-weight: 600;
    text-transform: uppercase;
    color: var(--text-muted);
    background: var(--bg-secondary);
}

.data-table td {
    font-size: var(--text-sm);
}

.data-table tbody tr:hover {
    background: var(--bg-hover);
}

.data-table tbody tr:last-child td {
    border-bottom: none;
}

.product-info {
    display: flex;
    align-items: center;
    gap: var(--space-3);
}

.product-icon {
    width: 36px;
    height: 36px;
    background: var(--primary-50);
    border-radius: var(--radius-lg);
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--primary-600);
}

.badge-outline {
    background: transparent;
    border: 1px solid var(--border-subtle);
    color: var(--text-muted);
}

.badge-active {
    background: rgba(16, 185, 129, 0.1);
    color: var(--success);
}

.badge-inactive {
    background: rgba(107, 114, 128, 0.1);
    color: var(--text-muted);
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
