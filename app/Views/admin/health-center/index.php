<?php
/**
 * Health Center - Sistem Sağlık Kontrolü
 */
$page_title = 'Health Center';
$breadcrumbs = [
    ['label' => 'Dashboard', 'url' => base_url('admin')],
    ['label' => 'Health Center']
];

$checks = [
    ['name' => 'PHP Version', 'status' => 'ok', 'value' => '8.2.0'],
    ['name' => 'Database Connection', 'status' => 'ok', 'value' => 'Connected'],
    ['name' => 'Disk Space', 'status' => 'warning', 'value' => '78% used'],
    ['name' => 'Memory Usage', 'status' => 'ok', 'value' => '42% used'],
    ['name' => 'SSL Certificate', 'status' => 'ok', 'value' => 'Valid (89 days)'],
    ['name' => 'Email Service', 'status' => 'ok', 'value' => 'Working'],
    ['name' => 'Backup Status', 'status' => 'ok', 'value' => 'Last: 2 hours ago'],
    ['name' => 'API Response', 'status' => 'ok', 'value' => '45ms avg'],
];

ob_start();
?>
<div class="page-header">
    <h1>Health Center</h1>
    <p class="text-muted">Sistem sağlık durumu ve izleme</p>
</div>

<div class="overall-status <?= in_array('warning', array_column($checks, 'status')) ? 'warning' : 'ok' ?>">
    <div class="status-icon">
        <i class="fas fa-<?= in_array('warning', array_column($checks, 'status')) ? 'exclamation-triangle' : 'check-circle' ?>"></i>
    </div>
    <div class="status-info">
        <h2>Sistem Durumu: <?= in_array('warning', array_column($checks, 'status')) ? 'Uyarı' : 'Sağlıklı' ?></h2>
        <p>Son kontrol: <?= date('d.m.Y H:i:s') ?></p>
    </div>
    <button class="btn btn-secondary" onclick="location.reload()"><i class="fas fa-sync"></i> Yenile</button>
</div>

<div class="checks-grid">
    <?php foreach ($checks as $check): ?>
    <div class="check-card status-<?= $check['status'] ?>">
        <div class="check-icon">
            <i class="fas fa-<?= $check['status'] === 'ok' ? 'check-circle' : ($check['status'] === 'warning' ? 'exclamation-triangle' : 'times-circle') ?>"></i>
        </div>
        <div class="check-info">
            <h4><?= $check['name'] ?></h4>
            <p><?= $check['value'] ?></p>
        </div>
        <div class="check-status <?= $check['status'] ?>">
            <?= $check['status'] === 'ok' ? 'OK' : ($check['status'] === 'warning' ? 'Warning' : 'Error') ?>
        </div>
    </div>
    <?php endforeach; ?>
</div>

<div class="system-info">
    <h3>Sistem Bilgileri</h3>
    <div class="info-grid">
        <div class="info-item">
            <span class="label">Sunucu</span>
            <span class="value"><?= php_uname('n') ?></span>
        </div>
        <div class="info-item">
            <span class="label">PHP</span>
            <span class="value"><?= PHP_VERSION ?></span>
        </div>
        <div class="info-item">
            <span class="label">OS</span>
            <span class="value"><?= php_uname('s') ?></span>
        </div>
        <div class="info-item">
            <span class="label">Uptime</span>
            <span class="value"><?= round(memory_get_usage(true) / 1024 / 1024, 2) ?> MB</span>
        </div>
    </div>
</div>

<style>
.page-header{margin-bottom:var(--space-8);} .page-header h1{font-size:var(--text-2xl);} .text-muted{color:var(--text-muted);}
.overall-status{display:flex;align-items:center;gap:var(--space-6);padding:var(--space-6);border-radius:var(--radius-2xl);margin-bottom:var(--space-8);}
.overall-status.ok{background:rgba(16,185,129,0.1);border:1px solid var(--success);}
.overall-status.warning{background:rgba(249,115,22,0.1);border:1px solid var(--warning);}
.status-icon{width:64px;height:64px;border-radius:var(--radius-xl);display:flex;align-items:center;justify-content:center;font-size:var(--text-2xl);}
.overall-status.ok .status-icon{background:var(--success);color:white;}
.overall-status.warning .status-icon{background:var(--warning);color:white;}
.status-info{flex:1;} .status-info h2{font-size:var(--text-xl);margin-bottom:var(--space-1);} .status-info p{color:var(--text-muted);font-size:var(--text-sm);}
.checks-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:var(--space-4);margin-bottom:var(--space-8);}
.check-card{display:flex;align-items:center;gap:var(--space-4);padding:var(--space-5);background:var(--bg-card);border:1px solid var(--border-subtle);border-radius:var(--radius-xl);}
.check-icon{width:40px;height:40px;border-radius:var(--radius-lg);display:flex;align-items:center;justify-content:center;font-size:var(--text-lg);}
.check-card.status-ok .check-icon{background:rgba(16,185,129,0.1);color:var(--success);}
.check-card.status-warning .check-icon{background:rgba(249,115,22,0.1);color:var(--warning);}
.check-card.status-error .check-icon{background:rgba(239,68,68,0.1);color:var(--danger);}
.check-info{flex:1;} .check-info h4{font-size:var(--text-sm);font-weight:600;margin-bottom:var(--space-1);} .check-info p{font-size:var(--text-xs);color:var(--text-muted);}
.check-status{font-size:var(--text-xs);font-weight:600;padding:var(--space-1) var(--space-3);border-radius:var(--radius-full);}
.check-status.ok{background:rgba(16,185,129,0.1);color:var(--success);}
.check-status.warning{background:rgba(249,115,22,0.1);color:var(--warning);}
.check-status.error{background:rgba(239,68,68,0.1);color:var(--danger);}
.system-info{background:var(--bg-card);border:1px solid var(--border-subtle);border-radius:var(--radius-2xl);padding:var(--space-6);}
.system-info h3{font-size:var(--text-lg);margin-bottom:var(--space-6);}
.info-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:var(--space-4);}
.info-item{padding:var(--space-4);background:var(--bg-secondary);border-radius:var(--radius-lg);}
.info-item .label{font-size:var(--text-xs);color:var(--text-muted);display:block;margin-bottom:var(--space-1);}
.info-item .value{font-size:var(--text-sm);font-weight:600;}
@media(max-width:1024px){.checks-grid{grid-template-columns:repeat(2,1fr);} .info-grid{grid-template-columns:repeat(2,1fr);}}
</style>
<?php $page_content = ob_get_clean(); require __DIR__ . '/../layouts/admin-shell.php';
