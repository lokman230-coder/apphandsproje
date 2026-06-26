<?php
/**
 * Admin Dashboard
 */
$page_title = 'Dashboard';
$breadcrumbs = [['label' => 'Dashboard']];

$stats = [
    ['label' => 'Toplam Müşteri', 'value' => '1,234', 'icon' => 'fa-users', 'color' => 'primary', 'trend' => '+12%'],
    ['label' => 'Toplam Gelir', 'value' => '₺156,789', 'icon' => 'fa-lira-sign', 'color' => 'success', 'trend' => '+8%'],
    ['label' => 'Aktif Hosting', 'value' => '456', 'icon' => 'fa-server', 'color' => 'warning', 'trend' => '+5%'],
    ['label' => 'Açık Destek', 'value' => '23', 'icon' => 'fa-headset', 'color' => 'danger', 'trend' => '-3%'],
];

ob_start();
?>
<div class="dashboard">
    <!-- Page Header -->
    <div class="page-header">
        <div class="page-header-content">
            <h1>Hoş Geldiniz!</h1>
            <p>Admin paneline hoş geldiniz. İşte son durum.</p>
        </div>
        <div class="page-header-actions">
            <a href="<?= base_url('admin/customers') ?>" class="btn btn-primary">
                <i class="fas fa-plus"></i> Yeni Müşteri
            </a>
        </div>
    </div>
    
    <!-- Stats Grid -->
    <div class="stats-grid">
        <?php foreach ($stats as $stat): ?>
        <div class="stat-card">
            <div class="stat-icon <?= $stat['color'] ?>">
                <i class="fas <?= $stat['icon'] ?>"></i>
            </div>
            <div class="stat-info">
                <div class="stat-value"><?= $stat['value'] ?></div>
                <div class="stat-label"><?= $stat['label'] ?></div>
            </div>
            <div class="stat-trend <?= strpos($stat['trend'], '+') !== false ? 'up' : 'down' ?>">
                <?= $stat['trend'] ?>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    
    <!-- Main Content -->
    <div class="dashboard-grid">
        <!-- Recent Orders -->
        <div class="card">
            <div class="card-header">
                <h3>Son Siparişler</h3>
                <a href="<?= base_url('admin/orders') ?>" class="btn btn-sm btn-ghost">Tümünü Gör</a>
            </div>
            <div class="card-body" style="padding: 0;">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Sipariş</th>
                            <th>Müşteri</th>
                            <th>Ürün</th>
                            <th>Tutar</th>
                            <th>Durum</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($_SESSION['orders'] ?? [] as $order): ?>
                        <?php $customer = array_filter($_SESSION['customers'] ?? [], fn($c) => $c['id'] == $order['customer_id']); $customer = reset($customer) ?: ['name' => 'Müşteri']; ?>
                        <tr>
                            <td><strong>#<?= $order['id'] ?></strong></td>
                            <td><?= $customer['name'] ?></td>
                            <td><?= $order['product'] ?></td>
                            <td>₺<?= number_format($order['amount'], 0) ?></td>
                            <td><span class="badge badge-<?= $order['status'] ?>"><?= ucfirst($order['status']) ?></span></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        
        <!-- Quick Actions -->
        <div class="card">
            <div class="card-header">
                <h3>Hızlı İşlemler</h3>
            </div>
            <div class="card-body">
                <div class="quick-actions">
                    <a href="<?= base_url('admin/customers') ?>" class="quick-action">
                        <div class="quick-action-icon primary"><i class="fas fa-user-plus"></i></div>
                        <span>Yeni Müşteri</span>
                    </a>
                    <a href="<?= base_url('admin/orders') ?>" class="quick-action">
                        <div class="quick-action-icon success"><i class="fas fa-cart-plus"></i></div>
                        <span>Yeni Sipariş</span>
                    </a>
                    <a href="<?= base_url('admin/support') ?>" class="quick-action">
                        <div class="quick-action-icon warning"><i class="fas fa-ticket-alt"></i></div>
                        <span>Destek Talebi</span>
                    </a>
                    <a href="<?= base_url('admin/settings') ?>" class="quick-action">
                        <div class="quick-action-icon info"><i class="fas fa-cog"></i></div>
                        <span>Ayarlar</span>
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Support Tickets -->
        <div class="card">
            <div class="card-header">
                <h3>Açık Destek Talepleri</h3>
                <a href="<?= base_url('admin/support') ?>" class="btn btn-sm btn-ghost">Tümünü Gör</a>
            </div>
            <div class="card-body" style="padding: 0;">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Konu</th>
                            <th>Öncelik</th>
                            <th>Durum</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($_SESSION['tickets'] ?? [] as $ticket): ?>
                        <tr>
                            <td><strong>#<?= $ticket['id'] ?></strong></td>
                            <td><?= $ticket['subject'] ?></td>
                            <td><span class="badge badge-<?= $ticket['priority'] ?>"><?= ucfirst($ticket['priority']) ?></span></td>
                            <td><span class="badge badge-<?= $ticket['status'] ?>"><?= ucfirst($ticket['status']) ?></span></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<style>
.dashboard {
    padding: 0;
}

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

.page-header p {
    color: var(--text-muted);
}

.stats-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
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
    transition: var(--transition);
}

.stat-card:hover {
    transform: translateY(-4px);
    box-shadow: var(--shadow-lg);
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

.stat-icon.primary { background: var(--primary-50); color: var(--primary-600); }
.stat-icon.success { background: rgba(16, 185, 129, 0.1); color: var(--success); }
.stat-icon.warning { background: rgba(249, 115, 22, 0.1); color: var(--warning); }
.stat-icon.danger { background: rgba(239, 68, 68, 0.1); color: var(--danger); }

.stat-info {
    flex: 1;
}

.stat-value {
    font-size: var(--text-2xl);
    font-weight: 700;
}

.stat-label {
    font-size: var(--text-sm);
    color: var(--text-muted);
}

.stat-trend {
    font-size: var(--text-sm);
    font-weight: 600;
    padding: var(--space-1) var(--space-3);
    border-radius: var(--radius-full);
}

.stat-trend.up {
    background: rgba(16, 185, 129, 0.1);
    color: var(--success);
}

.stat-trend.down {
    background: rgba(239, 68, 68, 0.1);
    color: var(--danger);
}

.dashboard-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: var(--space-6);
}

.card {
    background: var(--bg-card);
    border: 1px solid var(--border-subtle);
    border-radius: var(--radius-2xl);
    overflow: hidden;
}

.card-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: var(--space-5) var(--space-6);
    border-bottom: 1px solid var(--border-subtle);
}

.card-header h3 {
    font-size: var(--text-base);
    font-weight: 600;
}

.card-body {
    padding: var(--space-6);
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

.badge {
    display: inline-flex;
    padding: var(--space-1) var(--space-3);
    font-size: var(--text-xs);
    font-weight: 500;
    border-radius: var(--radius-full);
}

.badge-completed, .badge-active { background: rgba(16, 185, 129, 0.1); color: var(--success); }
.badge-pending { background: rgba(249, 115, 22, 0.1); color: var(--warning); }
.badge-open, .badge-high { background: rgba(239, 68, 68, 0.1); color: var(--danger); }
.badge-medium, .badge-answered { background: rgba(59, 130, 246, 0.1); color: var(--info); }
.badge-low { background: rgba(107, 114, 128, 0.1); color: var(--text-muted); }

.quick-actions {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: var(--space-4);
}

.quick-action {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: var(--space-3);
    padding: var(--space-6);
    background: var(--bg-secondary);
    border-radius: var(--radius-xl);
    text-decoration: none;
    color: var(--text-primary);
    font-size: var(--text-sm);
    font-weight: 500;
    transition: var(--transition);
}

.quick-action:hover {
    background: var(--bg-hover);
    transform: translateY(-2px);
}

.quick-action-icon {
    width: 48px;
    height: 48px;
    border-radius: var(--radius-lg);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: var(--text-xl);
}

.quick-action-icon.primary { background: var(--primary-100); color: var(--primary-600); }
.quick-action-icon.success { background: rgba(16, 185, 129, 0.1); color: var(--success); }
.quick-action-icon.warning { background: rgba(249, 115, 22, 0.1); color: var(--warning); }
.quick-action-icon.info { background: rgba(59, 130, 246, 0.1); color: var(--info); }

@media (max-width: 1024px) {
    .stats-grid { grid-template-columns: repeat(2, 1fr); }
    .dashboard-grid { grid-template-columns: 1fr; }
}

@media (max-width: 768px) {
    .stats-grid { grid-template-columns: 1fr; }
    .page-header { flex-direction: column; gap: var(--space-4); }
}
</style>
<?php
$page_content = ob_get_clean();
require __DIR__ . '/../layouts/admin-shell.php';
