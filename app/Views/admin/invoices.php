<?php
/**
 * Faturalar Sayfası
 */
$page_title = 'Faturalar';
$breadcrumbs = [
    ['label' => 'Dashboard', 'url' => base_url('admin')],
    ['label' => 'Faturalar']
];

$invoices = [
    ['id' => 'INV-2024-001', 'customer' => 'Ahmet Kaya', 'amount' => 2999, 'status' => 'paid', 'date' => '2024-06-15'],
    ['id' => 'INV-2024-002', 'customer' => 'Elif Yılmaz', 'amount' => 1499, 'status' => 'pending', 'date' => '2024-06-18'],
    ['id' => 'INV-2024-003', 'customer' => 'Mehmet Demir', 'amount' => 499, 'status' => 'paid', 'date' => '2024-06-20'],
    ['id' => 'INV-2024-004', 'customer' => 'Ahmet Kaya', 'amount' => 99, 'status' => 'overdue', 'date' => '2024-05-15'],
    ['id' => 'INV-2024-005', 'customer' => 'Zeynep Ak', 'amount' => 399, 'status' => 'paid', 'date' => '2024-06-22'],
];

ob_start();
?>
<div class="page-header">
    <div>
        <h1>Faturalar</h1>
        <p class="text-muted">Tüm faturalarınızı yönetin</p>
    </div>
    <div class="header-actions">
        <button class="btn btn-secondary">
            <i class="fas fa-download"></i> Dışa Aktar
        </button>
        <button class="btn btn-primary">
            <i class="fas fa-plus"></i> Yeni Fatura
        </button>
    </div>
</div>

<!-- Stats -->
<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-icon success"><i class="fas fa-check-circle"></i></div>
        <div class="stat-info">
            <div class="stat-value">₺45,890</div>
            <div class="stat-label">Tahsil Edilen</div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon warning"><i class="fas fa-clock"></i></div>
        <div class="stat-info">
            <div class="stat-value">₺8,450</div>
            <div class="stat-label">Bekleyen</div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon danger"><i class="fas fa-exclamation-circle"></i></div>
        <div class="stat-info">
            <div class="stat-value">₺2,100</div>
            <div class="stat-label">Gecikmiş</div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <div class="search-box">
            <i class="fas fa-search"></i>
            <input type="text" placeholder="Fatura ara..." class="search-input">
        </div>
        <div class="filter-tabs">
            <button class="filter-tab active">Tümü</button>
            <button class="filter-tab">Ödenmiş</button>
            <button class="filter-tab">Bekleyen</button>
            <button class="filter-tab">Gecikmiş</button>
        </div>
    </div>
    <div class="card-body" style="padding: 0;">
        <table class="data-table">
            <thead>
                <tr>
                    <th>Fatura No</th>
                    <th>Müşteri</th>
                    <th>Tutar</th>
                    <th>Tarih</th>
                    <th>Durum</th>
                    <th>İşlemler</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($invoices as $inv): ?>
                <tr>
                    <td><strong><?= $inv['id'] ?></strong></td>
                    <td><?= $inv['customer'] ?></td>
                    <td><strong>₺<?= number_format($inv['amount'], 0) ?></strong></td>
                    <td><?= $inv['date'] ?></td>
                    <td>
                        <?php
                        $statusClass = ['paid' => 'success', 'pending' => 'warning', 'overdue' => 'danger'][$inv['status']];
                        $statusText = ['paid' => 'Ödenmiş', 'pending' => 'Bekliyor', 'overdue' => 'Gecikmiş'][$inv['status']];
                        ?>
                        <span class="badge badge-<?= $statusClass ?>"><?= $statusText ?></span>
                    </td>
                    <td>
                        <div class="action-buttons">
                            <button class="btn-icon" title="Görüntüle"><i class="fas fa-eye"></i></button>
                            <button class="btn-icon" title="İndir"><i class="fas fa-download"></i></button>
                            <button class="btn-icon" title="Gönder"><i class="fas fa-paper-plane"></i></button>
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

.page-header h1 { font-size: var(--text-2xl); margin-bottom: var(--space-2); }
.text-muted { color: var(--text-muted); }
.header-actions { display: flex; gap: var(--space-3); }

.stats-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: var(--space-6);
    margin-bottom: var(--space-8);
}

.stat-card {
    background: var(--bg-card);
    border: 1px solid var(--border-subtle);
    border-radius: var(--radius-2xl);
    padding: var(--space-6);
    display: flex;
    align-items: center;
    gap: var(--space-4);
}

.stat-icon {
    width: 56px;
    height: 56px;
    border-radius: var(--radius-xl);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: var(--text-xl);
}

.stat-icon.success { background: rgba(16, 185, 129, 0.1); color: var(--success); }
.stat-icon.warning { background: rgba(249, 115, 22, 0.1); color: var(--warning); }
.stat-icon.danger { background: rgba(239, 68, 68, 0.1); color: var(--danger); }

.stat-value { font-size: var(--text-2xl); font-weight: 700; }
.stat-label { font-size: var(--text-sm); color: var(--text-muted); }

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

.filter-tabs { display: flex; gap: var(--space-2); }

.filter-tab {
    padding: var(--space-2) var(--space-4);
    background: none;
    border: none;
    color: var(--text-muted);
    font-size: var(--text-sm);
    font-weight: 500;
    cursor: pointer;
    border-radius: var(--radius-lg);
}

.filter-tab:hover { background: var(--bg-hover); }
.filter-tab.active { background: var(--primary-500); color: white; }

.data-table { width: 100%; border-collapse: collapse; }
.data-table th, .data-table td { padding: var(--space-4) var(--space-6); text-align: left; border-bottom: 1px solid var(--border-subtle); }
.data-table th { font-size: var(--text-xs); font-weight: 600; text-transform: uppercase; color: var(--text-muted); background: var(--bg-secondary); }
.data-table tbody tr:hover { background: var(--bg-hover); }
.data-table tbody tr:last-child td { border-bottom: none; }

.badge { display: inline-flex; padding: var(--space-1) var(--space-3); font-size: var(--text-xs); font-weight: 500; border-radius: var(--radius-full); }
.badge-success { background: rgba(16, 185, 129, 0.1); color: var(--success); }
.badge-warning { background: rgba(249, 115, 22, 0.1); color: var(--warning); }
.badge-danger { background: rgba(239, 68, 68, 0.1); color: var(--danger); }

.action-buttons { display: flex; gap: var(--space-2); }
.btn-icon { width: 32px; height: 32px; display: flex; align-items: center; justify-content: center; background: none; border: none; color: var(--text-muted); border-radius: var(--radius-lg); cursor: pointer; }
.btn-icon:hover { background: var(--bg-hover); color: var(--text-primary); }
</style>
<?php
$page_content = ob_get_clean();
require __DIR__ . '/../layouts/admin-shell.php';
