<?php
/**
 * Hosting Server Management
 */
$page_title = 'Hosting Server';
$breadcrumbs = [
    ['label' => 'Dashboard', 'url' => base_url('admin')],
    ['label' => 'Hosting Server']
];

$servers = [
    ['name' => 'TR-SRV-01', 'location' => 'İstanbul', 'ip' => '185.15.xx.xx', 'status' => 'online', 'usage' => 67, 'accounts' => 234],
    ['name' => 'DE-SRV-01', 'location' => 'Frankfurt', 'ip' => '185.20.xx.xx', 'status' => 'online', 'usage' => 45, 'accounts' => 156],
    ['name' => 'NL-SRV-01', 'location' => 'Amsterdam', 'ip' => '185.25.xx.xx', 'status' => 'maintenance', 'usage' => 0, 'accounts' => 0],
];

ob_start();
?>
<div class="page-header">
    <h1>Hosting Server</h1>
    <p class="text-muted">Sunucu yönetimi ve izleme</p>
</div>

<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-icon primary"><i class="fas fa-server"></i></div>
        <div class="stat-info">
            <div class="stat-value"><?= count($servers) ?></div>
            <div class="stat-label">Toplam Sunucu</div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon success"><i class="fas fa-check-circle"></i></div>
        <div class="stat-info">
            <div class="stat-value"><?= count(array_filter($servers, fn($s) => $s['status'] === 'online')) ?></div>
            <div class="stat-label">Online</div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon info"><i class="fas fa-user"></i></div>
        <div class="stat-info">
            <div class="stat-value"><?= array_sum(array_column($servers, 'accounts')) ?></div>
            <div class="stat-label">Toplam Hesap</div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon warning"><i class="fas fa-microchip"></i></div>
        <div class="stat-info">
            <div class="stat-value">%<?= round(array_sum(array_column($servers, 'usage')) / count($servers)) ?></div>
            <div class="stat-label">Ortalama Kullanım</div>
        </div>
    </div>
</div>

<div class="server-list">
    <?php foreach ($servers as $server): ?>
    <div class="server-card">
        <div class="server-header">
            <div class="server-info">
                <div class="server-icon <?= $server['status'] ?>">
                    <i class="fas fa-server"></i>
                </div>
                <div>
                    <h3><?= $server['name'] ?></h3>
                    <p><i class="fas fa-map-marker-alt"></i> <?= $server['location'] ?> | <?= $server['ip'] ?></p>
                </div>
            </div>
            <div class="server-status <?= $server['status'] ?>">
                <?= $server['status'] === 'online' ? 'Online' : ($server['status'] === 'maintenance' ? 'Bakım' : 'Offline') ?>
            </div>
        </div>
        <div class="server-stats">
            <div class="server-stat">
                <span class="label">CPU Kullanım</span>
                <div class="progress-bar">
                    <div class="progress" style="width: <?= $server['usage'] ?>%"></div>
                </div>
                <span class="value">%<?= $server['usage'] ?></span>
            </div>
            <div class="server-stat">
                <span class="label">Disk</span>
                <div class="progress-bar">
                    <div class="progress" style="width: <?= $server['usage'] ?>%"></div>
                </div>
                <span class="value">%<?= $server['usage'] ?></span>
            </div>
            <div class="server-stat">
                <span class="label">RAM</span>
                <div class="progress-bar">
                    <div class="progress" style="width: <?= $server['usage'] ?>%"></div>
                </div>
                <span class="value">%<?= $server['usage'] ?></span>
            </div>
        </div>
        <div class="server-footer">
            <div class="server-meta">
                <span><i class="fas fa-user"></i> <?= $server['accounts'] ?> Hesap</span>
            </div>
            <div class="server-actions">
                <button class="btn btn-sm btn-ghost">WHM</button>
                <button class="btn btn-sm btn-secondary">Detay</button>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>

<style>
.page-header{margin-bottom:var(--space-8);} .page-header h1{font-size:var(--text-2xl);} .text-muted{color:var(--text-muted);}
.stats-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:var(--space-6);margin-bottom:var(--space-8);}
.stat-card{background:var(--bg-card);border:1px solid var(--border-subtle);border-radius:var(--radius-2xl);padding:var(--space-6);display:flex;align-items:center;gap:var(--space-4);}
.stat-icon{width:56px;height:56px;border-radius:var(--radius-xl);display:flex;align-items:center;justify-content:center;font-size:var(--text-xl);}
.stat-icon.primary{background:var(--primary-50);color:var(--primary-600);} .stat-icon.success{background:rgba(16,185,129,0.1);color:var(--success);} .stat-icon.info{background:rgba(59,130,246,0.1);color:var(--info);} .stat-icon.warning{background:rgba(249,115,22,0.1);color:var(--warning);}
.stat-value{font-size:var(--text-2xl);font-weight:700;} .stat-label{font-size:var(--text-sm);color:var(--text-muted);}
.server-list{display:flex;flex-direction:column;gap:var(--space-6);}
.server-card{background:var(--bg-card);border:1px solid var(--border-subtle);border-radius:var(--radius-2xl);padding:var(--space-6);}
.server-header{display:flex;justify-content:space-between;align-items:center;margin-bottom:var(--space-6);}
.server-info{display:flex;align-items:center;gap:var(--space-4);}
.server-icon{width:56px;height:56px;border-radius:var(--radius-xl);display:flex;align-items:center;justify-content:center;font-size:var(--text-xl);}
.server-icon.online{background:rgba(16,185,129,0.1);color:var(--success);} .server-icon.offline{background:rgba(239,68,68,0.1);color:var(--danger);} .server-icon.maintenance{background:rgba(249,115,22,0.1);color:var(--warning);}
.server-info h3{font-size:var(--text-lg);margin-bottom:var(--space-1);}
.server-info p{font-size:var(--text-sm);color:var(--text-muted);}
.server-info p i{margin-right:var(--space-1);}
.server-status{padding:var(--space-2) var(--space-4);border-radius:var(--radius-full);font-size:var(--text-sm);font-weight:500;}
.server-status.online{background:rgba(16,185,129,0.1);color:var(--success);} .server-status.offline{background:rgba(239,68,68,0.1);color:var(--danger);} .server-status.maintenance{background:rgba(249,115,22,0.1);color:var(--warning);}
.server-stats{display:grid;grid-template-columns:repeat(3,1fr);gap:var(--space-6);margin-bottom:var(--space-6);}
.server-stat{display:flex;align-items:center;gap:var(--space-3);}
.server-stat .label{font-size:var(--text-sm);color:var(--text-muted);width:80px;}
.progress-bar{flex:1;height:8px;background:var(--bg-secondary);border-radius:var(--radius-full);overflow:hidden;}
.progress{height:100%;background:var(--gradient-primary);border-radius:var(--radius-full);}
.server-stat .value{font-size:var(--text-sm);font-weight:600;width:40px;text-align:right;}
.server-footer{display:flex;justify-content:space-between;align-items:center;padding-top:var(--space-4);border-top:1px solid var(--border-subtle);}
.server-meta{font-size:var(--text-sm);color:var(--text-muted);}
.server-meta i{margin-right:var(--space-1);}
.server-actions{display:flex;gap:var(--space-2);}
.btn-sm{padding:var(--space-2) var(--space-4);font-size:var(--text-xs);}
@media(max-width:1024px){.server-stats{grid-template-columns:1fr;}}
</style>
<?php $page_content = ob_get_clean(); require __DIR__ . '/../layouts/admin-shell.php';
