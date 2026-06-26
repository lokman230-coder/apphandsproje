<?php
/**
 * Destek Talepleri Sayfası
 */
$page_title = 'Destek Talepleri';
$breadcrumbs = [
    ['label' => 'Dashboard', 'url' => base_url('admin')],
    ['label' => 'Destek Talepleri']
];

$tickets = [
    ['id' => '#1024', 'subject' => 'Hosting hesabım çalışmıyor', 'customer' => 'Ahmet Kaya', 'priority' => 'high', 'status' => 'open', 'date' => '2024-06-24'],
    ['id' => '#1023', 'subject' => 'SSL sertifikası kurulumu', 'customer' => 'Elif Yılmaz', 'priority' => 'medium', 'status' => 'answered', 'date' => '2024-06-23'],
    ['id' => '#1022', 'subject' => 'Domain transfer etmek istiyorum', 'customer' => 'Mehmet Demir', 'priority' => 'low', 'status' => 'closed', 'date' => '2024-06-22'],
    ['id' => '#1021', 'subject' => 'VPS sunucum yavaş', 'customer' => 'Zeynep Ak', 'priority' => 'high', 'status' => 'open', 'date' => '2024-06-24'],
];

ob_start();
?>
<div class="page-header">
    <div>
        <h1>Destek Talepleri</h1>
        <p class="text-muted">Müşteri destek taleplerini yönetin</p>
    </div>
    <div class="header-actions">
        <button class="btn btn-secondary">
            <i class="fas fa-chart-bar"></i> Raporlar
        </button>
        <button class="btn btn-primary">
            <i class="fas fa-cog"></i> Ayarlar
        </button>
    </div>
</div>

<!-- Stats -->
<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-icon danger"><i class="fas fa-exclamation-circle"></i></div>
        <div class="stat-info">
            <div class="stat-value">12</div>
            <div class="stat-label">Açık Talep</div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon warning"><i class="fas fa-reply"></i></div>
        <div class="stat-info">
            <div class="stat-value">8</div>
            <div class="stat-label">Cevap Bekleyen</div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon success"><i class="fas fa-check-circle"></i></div>
        <div class="stat-info">
            <div class="stat-value">156</div>
            <div class="stat-label">Bu Ay Çözülen</div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon primary"><i class="fas fa-clock"></i></div>
        <div class="stat-info">
            <div class="stat-value">2.4s</div>
            <div class="stat-label">Ortalama Yanıt Süresi</div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <div class="search-box">
            <i class="fas fa-search"></i>
            <input type="text" placeholder="Talep ara..." class="search-input">
        </div>
        <div class="filter-tabs">
            <button class="filter-tab active">Tümü</button>
            <button class="filter-tab">Açık</button>
            <button class="filter-tab">Cevaplandı</button>
            <button class="filter-tab">Kapalı</button>
        </div>
    </div>
    <div class="card-body" style="padding: 0;">
        <div class="tickets-list">
            <?php foreach ($tickets as $ticket): ?>
            <div class="ticket-item">
                <div class="ticket-priority priority-<?= $ticket['priority'] ?>">
                    <i class="fas fa-circle"></i>
                </div>
                <div class="ticket-info">
                    <div class="ticket-header">
                        <strong><?= $ticket['id'] ?></strong>
                        <span class="ticket-subject"><?= $ticket['subject'] ?></span>
                    </div>
                    <div class="ticket-meta">
                        <span><i class="fas fa-user"></i> <?= $ticket['customer'] ?></span>
                        <span><i class="fas fa-clock"></i> <?= $ticket['date'] ?></span>
                    </div>
                </div>
                <div class="ticket-status">
                    <?php
                    $statusMap = ['open' => 'Açık', 'answered' => 'Cevaplandı', 'closed' => 'Kapalı'];
                    $statusClass = ['open' => 'danger', 'answered' => 'warning', 'closed' => 'success'][$ticket['status']];
                    ?>
                    <span class="badge badge-<?= $statusClass ?>"><?= $statusMap[$ticket['status']] ?></span>
                </div>
                <div class="ticket-actions">
                    <button class="btn btn-sm btn-secondary">Görüntüle</button>
                    <button class="btn btn-sm btn-primary">Yanıtla</button>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<style>
.page-header { display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: var(--space-8); }
.page-header h1 { font-size: var(--text-2xl); margin-bottom: var(--space-2); }
.text-muted { color: var(--text-muted); }
.header-actions { display: flex; gap: var(--space-3); }

.stats-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: var(--space-6); margin-bottom: var(--space-8); }

.stat-card { background: var(--bg-card); border: 1px solid var(--border-subtle); border-radius: var(--radius-2xl); padding: var(--space-6); display: flex; align-items: center; gap: var(--space-4); }

.stat-icon { width: 56px; height: 56px; border-radius: var(--radius-xl); display: flex; align-items: center; justify-content: center; font-size: var(--text-xl); }
.stat-icon.danger { background: rgba(239, 68, 68, 0.1); color: var(--danger); }
.stat-icon.warning { background: rgba(249, 115, 22, 0.1); color: var(--warning); }
.stat-icon.success { background: rgba(16, 185, 129, 0.1); color: var(--success); }
.stat-icon.primary { background: var(--primary-50); color: var(--primary-600); }

.stat-value { font-size: var(--text-2xl); font-weight: 700; }
.stat-label { font-size: var(--text-sm); color: var(--text-muted); }

.card { background: var(--bg-card); border: 1px solid var(--border-subtle); border-radius: var(--radius-2xl); overflow: hidden; }

.card-header { display: flex; justify-content: space-between; align-items: center; padding: var(--space-5) var(--space-6); border-bottom: 1px solid var(--border-subtle); }

.search-box { position: relative; width: 300px; }
.search-box i { position: absolute; left: var(--space-4); top: 50%; transform: translateY(-50%); color: var(--text-muted); }
.search-box .search-input { width: 100%; padding: var(--space-3) var(--space-4) var(--space-3) var(--space-12); background: var(--bg-secondary); border: 1px solid var(--border-subtle); border-radius: var(--radius-xl); color: var(--text-primary); }

.filter-tabs { display: flex; gap: var(--space-2); }
.filter-tab { padding: var(--space-2) var(--space-4); background: none; border: none; color: var(--text-muted); font-size: var(--text-sm); font-weight: 500; cursor: pointer; border-radius: var(--radius-lg); }
.filter-tab:hover { background: var(--bg-hover); }
.filter-tab.active { background: var(--primary-500); color: white; }

.tickets-list { padding: var(--space-4); }

.ticket-item { display: flex; align-items: center; gap: var(--space-4); padding: var(--space-4); border-radius: var(--radius-xl); transition: var(--transition); }
.ticket-item:hover { background: var(--bg-secondary); }

.ticket-priority { width: 12px; }
.ticket-priority i { font-size: 10px; }
.priority-high i { color: var(--danger); }
.priority-medium i { color: var(--warning); }
.priority-low i { color: var(--success); }

.ticket-info { flex: 1; }
.ticket-header { display: flex; align-items: center; gap: var(--space-3); margin-bottom: var(--space-2); }
.ticket-header strong { color: var(--text-muted); font-size: var(--text-sm); }
.ticket-subject { font-weight: 600; }
.ticket-meta { display: flex; gap: var(--space-4); font-size: var(--text-sm); color: var(--text-muted); }
.ticket-meta i { margin-right: var(--space-1); }

.badge { display: inline-flex; padding: var(--space-1) var(--space-3); font-size: var(--text-xs); font-weight: 500; border-radius: var(--radius-full); }
.badge-danger { background: rgba(239, 68, 68, 0.1); color: var(--danger); }
.badge-warning { background: rgba(249, 115, 22, 0.1); color: var(--warning); }
.badge-success { background: rgba(16, 185, 129, 0.1); color: var(--success); }

.ticket-actions { display: flex; gap: var(--space-2); }
.btn-sm { padding: var(--space-2) var(--space-4); font-size: var(--text-xs); }
</style>
<?php
$page_content = ob_get_clean();
require __DIR__ . '/../layouts/admin-shell.php';
