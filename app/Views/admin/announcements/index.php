<?php
/**
 * Announcements - Duyurular
 */
$page_title = 'Announcements';
$breadcrumbs = [
    ['label' => 'Dashboard', 'url' => base_url('admin')],
    ['label' => 'Announcements']
];

$announcements = [
    ['title' => 'Bakım Bildirimi', 'content' => '25 Haziran gece 02:00-04:00 arası bakım yapılacaktır.', 'type' => 'warning', 'date' => '2024-06-24'],
    ['title' => 'Yeni Özellikler', 'content' => 'AI Copilot özelliği artık aktif!', 'type' => 'success', 'date' => '2024-06-20'],
    ['title' => 'Fiyat Güncelleme', 'content' => 'VPS planlarında fiyat güncellemesi yapıldı.', 'type' => 'info', 'date' => '2024-06-15'],
];

ob_start();
?>
<div class="page-header">
    <h1>Duyurular</h1>
    <button class="btn btn-primary" onclick="showModal()"><i class="fas fa-plus"></i> Yeni Duyuru</button>
</div>

<div class="announcements-grid">
    <?php foreach ($announcements as $ann): ?>
    <div class="ann-card type-<?= $ann['type'] ?>">
        <div class="ann-header">
            <div class="ann-icon"><i class="fas fa-<?= $ann['type'] === 'warning' ? 'exclamation-triangle' : ($ann['type'] === 'success' ? 'check-circle' : 'info-circle') ?>"></i></div>
            <div>
                <h3><?= $ann['title'] ?></h3>
                <span class="ann-date"><?= $ann['date'] ?></span>
            </div>
            <div class="ann-actions">
                <button class="btn-icon"><i class="fas fa-edit"></i></button>
                <button class="btn-icon"><i class="fas fa-trash"></i></button>
            </div>
        </div>
        <p><?= $ann['content'] ?></p>
    </div>
    <?php endforeach; ?>
</div>

<style>
.page-header{display:flex;justify-content:space-between;align-items:center;margin-bottom:var(--space-8);}
.page-header h1{font-size:var(--text-2xl);}
.announcements-grid{display:grid;grid-template-columns:repeat(2,1fr);gap:var(--space-6);}
.ann-card{background:var(--bg-card);border:1px solid var(--border-subtle);border-radius:var(--radius-2xl);padding:var(--space-6);}
.ann-card.type-warning{border-left:4px solid var(--warning);}
.ann-card.type-success{border-left:4px solid var(--success);}
.ann-card.type-info{border-left:4px solid var(--info);}
.ann-header{display:flex;align-items:center;gap:var(--space-4);margin-bottom:var(--space-4);}
.ann-icon{width:48px;height:48px;border-radius:var(--radius-lg);display:flex;align-items:center;justify-content:center;font-size:var(--text-xl);}
.type-warning .ann-icon{background:rgba(249,115,22,0.1);color:var(--warning);}
.type-success .ann-icon{background:rgba(16,185,129,0.1);color:var(--success);}
.type-info .ann-icon{background:rgba(59,130,246,0.1);color:var(--info);}
.ann-header h3{flex:1;font-size:var(--text-lg);}
.ann-date{font-size:var(--text-sm);color:var(--text-muted);}
.ann-actions{display:flex;gap:var(--space-2);}
.btn-icon{width:32px;height:32px;display:flex;align-items:center;justify-content:center;background:none;border:none;color:var(--text-muted);border-radius:var(--radius-lg);cursor:pointer;}
.btn-icon:hover{background:var(--bg-hover);color:var(--text-primary);}
.ann-card p{color:var(--text-secondary);font-size:var(--text-sm);line-height:1.6;}
@media(max-width:768px){.announcements-grid{grid-template-columns:1fr;}}
</style>
<?php $page_content = ob_get_clean(); require __DIR__ . '/../layouts/admin-shell.php';
