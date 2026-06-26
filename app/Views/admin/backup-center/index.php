<?php
/**
 * Backup Center
 */
$page_title = 'Backup Center';
$breadcrumbs = [
    ['label' => 'Dashboard', 'url' => base_url('admin')],
    ['label' => 'Backup Center']
];

$backups = [
    ['name' => 'orneksite.com_20240624', 'type' => 'Full', 'size' => '2.4 GB', 'date' => '2024-06-24 03:00', 'status' => 'completed'],
    ['name' => 'orneksite.com_20240623', 'type' => 'Full', 'size' => '2.3 GB', 'date' => '2024-06-23 03:00', 'status' => 'completed'],
    ['name' => 'blogsite.com_20240624', 'type' => 'Daily', 'size' => '850 MB', 'date' => '2024-06-24 03:30', 'status' => 'completed'],
    ['name' => 'VPS-001_20240624', 'type' => 'Snapshot', 'size' => '15.2 GB', 'date' => '2024-06-24 04:00', 'status' => 'pending'],
];

ob_start();
?>
<div class="page-header">
    <h1>Backup Center</h1>
    <p class="text-muted">Yedekleme ve geri yükleme</p>
</div>

<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-icon primary"><i class="fas fa-save"></i></div>
        <div class="stat-info">
            <div class="stat-value"><?= count($backups) ?></div>
            <div class="stat-label">Toplam Yedek</div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon success"><i class="fas fa-check-circle"></i></div>
        <div class="stat-info">
            <div class="stat-value"><?= count(array_filter($backups, fn($b) => $b['status'] === 'completed')) ?></div>
            <div class="stat-label">Tamamlanan</div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon info"><i class="fas fa-database"></i></div>
        <div class="stat-info">
            <div class="stat-value">156 GB</div>
            <div class="stat-label">Kullanılan Alan</div>
        </div>
    </div>
</div>

<div class="action-bar">
    <button class="btn btn-primary"><i class="fas fa-plus"></i> Yeni Yedekleme</button>
    <button class="btn btn-secondary"><i class="fas fa-sync"></i> Tümünü Senkronize Et</button>
</div>

<div class="card">
    <table class="data-table">
        <thead>
            <tr>
                <th>Yedek Adı</th>
                <th>Tip</th>
                <th>Boyut</th>
                <th>Tarih</th>
                <th>Durum</th>
                <th>İşlemler</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($backups as $backup): ?>
            <tr>
                <td><strong><?= $backup['name'] ?></strong></td>
                <td><span class="badge badge-outline"><?= $backup['type'] ?></span></td>
                <td><?= $backup['size'] ?></td>
                <td><?= $backup['date'] ?></td>
                <td><span class="badge badge-<?= $backup['status'] === 'completed' ? 'success' : 'warning' ?>"><?= $backup['status'] ?></span></td>
                <td>
                    <div class="action-buttons">
                        <button class="btn-icon" title="İndir"><i class="fas fa-download"></i></button>
                        <button class="btn-icon" title="Geri Yükle"><i class="fas fa-undo"></i></button>
                        <button class="btn-icon" title="Sil"><i class="fas fa-trash"></i></button>
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<style>
.page-header{margin-bottom:var(--space-8);} .page-header h1{font-size:var(--text-2xl);} .text-muted{color:var(--text-muted);}
.stats-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:var(--space-6);margin-bottom:var(--space-6);}
.stat-card{background:var(--bg-card);border:1px solid var(--border-subtle);border-radius:var(--radius-2xl);padding:var(--space-6);display:flex;align-items:center;gap:var(--space-4);}
.stat-icon{width:56px;height:56px;border-radius:var(--radius-xl);display:flex;align-items:center;justify-content:center;font-size:var(--text-xl);}
.stat-icon.primary{background:var(--primary-50);color:var(--primary-600);} .stat-icon.success{background:rgba(16,185,129,0.1);color:var(--success);} .stat-icon.info{background:rgba(59,130,246,0.1);color:var(--info);}
.stat-value{font-size:var(--text-2xl);font-weight:700;} .stat-label{font-size:var(--text-sm);color:var(--text-muted);}
.action-bar{display:flex;gap:var(--space-3);margin-bottom:var(--space-6);}
.card{background:var(--bg-card);border:1px solid var(--border-subtle);border-radius:var(--radius-2xl);overflow:hidden;}
.data-table{width:100%;border-collapse:collapse;} .data-table th,.data-table td{padding:var(--space-4) var(--space-6);text-align:left;border-bottom:1px solid var(--border-subtle);}
.data-table th{font-size:var(--text-xs);font-weight:600;text-transform:uppercase;color:var(--text-muted);background:var(--bg-secondary);}
.badge{display:inline-flex;padding:var(--space-1) var(--space-3);font-size:var(--text-xs);font-weight:500;border-radius:var(--radius-full);}
.badge-outline{background:transparent;border:1px solid var(--border-subtle);color:var(--text-muted);}
.badge-success{background:rgba(16,185,129,0.1);color:var(--success);} .badge-warning{background:rgba(249,115,22,0.1);color:var(--warning);}
.action-buttons{display:flex;gap:var(--space-2);}
.btn-icon{width:32px;height:32px;display:flex;align-items:center;justify-content:center;background:none;border:none;color:var(--text-muted);border-radius:var(--radius-lg);cursor:pointer;}
.btn-icon:hover{background:var(--bg-hover);color:var(--text-primary);}
</style>
<?php $page_content = ob_get_clean(); require __DIR__ . '/../layouts/admin-shell.php';
