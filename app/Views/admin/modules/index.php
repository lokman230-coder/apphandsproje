<?php
/**
 * Modules - Modül Yönetimi
 */
$page_title = 'Modules';
$breadcrumbs = [
    ['label' => 'Dashboard', 'url' => base_url('admin')],
    ['label' => 'Modules']
];

$modules = [
    ['name' => 'Domain Registrar', 'status' => 'active', 'version' => '2.1.0'],
    ['name' => 'AI Center', 'status' => 'active', 'version' => '1.5.0'],
    ['name' => 'Site Builder', 'status' => 'active', 'version' => '3.0.0'],
    ['name' => 'E-commerce', 'status' => 'inactive', 'version' => '1.0.0'],
    ['name' => 'SMS Module', 'status' => 'active', 'version' => '2.0.0'],
];

ob_start();
?>
<div class="page-header">
    <h1>Modules</h1>
    <button class="btn btn-primary"><i class="fas fa-upload"></i> Modül Yükle</button>
</div>

<div class="modules-grid">
    <?php foreach ($modules as $module): ?>
    <div class="module-card">
        <div class="module-icon"><i class="fas fa-puzzle-piece"></i></div>
        <div class="module-info">
            <h3><?= $module['name'] ?></h3>
            <p>v<?= $module['version'] ?></p>
        </div>
        <div class="module-status <?= $module['status'] ?>">
            <?= $module['status'] === 'active' ? 'Aktif' : 'Pasif' ?>
        </div>
        <div class="module-actions">
            <button class="btn btn-sm btn-ghost">Ayarlar</button>
            <button class="btn btn-sm <?= $module['status'] === 'active' ? 'btn-danger' : 'btn-success' ?>">
                <?= $module['status'] === 'active' ? 'Pasifleştir' : 'Aktifleştir' ?>
            </button>
        </div>
    </div>
    <?php endforeach; ?>
</div>

<style>
.page-header{display:flex;justify-content:space-between;align-items:center;margin-bottom:var(--space-8);}
.page-header h1{font-size:var(--text-2xl);}
.modules-grid{display:grid;grid-template-columns:repeat(2,1fr);gap:var(--space-6);}
.module-card{background:var(--bg-card);border:1px solid var(--border-subtle);border-radius:var(--radius-2xl);padding:var(--space-6);display:flex;align-items:center;gap:var(--space-4);}
.module-icon{width:56px;height:56px;background:var(--primary-50);border-radius:var(--radius-xl);display:flex;align-items:center;justify-content:center;font-size:var(--text-xl);color:var(--primary-600);}
.module-info{flex:1;} .module-info h3{font-size:var(--text-lg);margin-bottom:var(--space-1);} .module-info p{color:var(--text-muted);font-size:var(--text-sm);}
.module-status{padding:var(--space-2) var(--space-4);border-radius:var(--radius-full);font-size:var(--text-xs);font-weight:600;}
.module-status.active{background:rgba(16,185,129,0.1);color:var(--success);} .module-status.inactive{background:rgba(107,114,128,0.1);color:var(--text-muted);}
.module-actions{display:flex;gap:var(--space-2);}
.btn-sm{padding:var(--space-2) var(--space-4);font-size:var(--text-xs);}
</style>
<?php $page_content = ob_get_clean(); require __DIR__ . '/../layouts/admin-shell.php';
