<?php
/**
 * Siparişler Sayfası
 */
$page_title = 'Siparişler';
$breadcrumbs = [
    ['label' => 'Dashboard', 'url' => base_url('admin')],
    ['label' => 'Siparişler']
];

ob_start();
?>
<div class="page-header">
    <div>
        <h1>Siparişler</h1>
        <p class="text-muted">Tüm siparişleriniz</p>
    </div>
    <a href="#" class="btn btn-primary">
        <i class="fas fa-plus"></i> Yeni Sipariş
    </a>
</div>

<div class="card">
    <div class="card-header">
        <div class="search-box">
            <i class="fas fa-search"></i>
            <input type="text" placeholder="Sipariş ara..." class="search-input">
        </div>
        <div class="filter-tabs">
            <button class="filter-tab active">Tümü</button>
            <button class="filter-tab">Bekleyen</button>
            <button class="filter-tab">Tamamlanan</button>
            <button class="filter-tab">İptal</button>
        </div>
    </div>
    <div class="card-body" style="padding: 0;">
        <table class="data-table">
            <thead>
                <tr>
                    <th>Sipariş No</th>
                    <th>Müşteri</th>
                    <th>Ürün</th>
                    <th>Tutar</th>
                    <th>Durum</th>
                    <th>Tarih</th>
                    <th>İşlemler</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($_SESSION['orders'] ?? [] as $order): ?>
                <?php $customer = array_filter($_SESSION['customers'] ?? [], fn($c) => $c['id'] == $order['customer_id']); $customer = reset($customer) ?: ['name' => 'Müşteri']; ?>
                <tr>
                    <td><strong>#<?= str_pad($order['id'], 4, '0', STR_PAD_LEFT) ?></strong></td>
                    <td><?= $customer['name'] ?></td>
                    <td><?= $order['product'] ?></td>
                    <td><strong>₺<?= number_format($order['amount'], 0) ?></strong></td>
                    <td><span class="badge badge-<?= $order['status'] ?>"><?= ucfirst($order['status']) ?></span></td>
                    <td><?= $order['created_at'] ?? date('Y-m-d') ?></td>
                    <td>
                        <div class="action-buttons">
                            <button class="btn-icon" title="Görüntüle"><i class="fas fa-eye"></i></button>
                            <button class="btn-icon" title="Düzenle"><i class="fas fa-edit"></i></button>
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
