<?php
/**
 * Help Center - Bilgi Bankası
 */
$page_title = 'Help Center';
$breadcrumbs = [
    ['label' => 'Dashboard', 'url' => base_url('admin')],
    ['label' => 'Help Center']
];

$articles = [
    ['title' => 'Hosting hesabı nasıl oluşturulur?', 'category' => 'Hosting', 'views' => 1234, 'updated' => '2024-06-20'],
    ['title' => 'SSL sertifikası kurulumu', 'category' => 'Güvenlik', 'views' => 856, 'updated' => '2024-06-18'],
    ['title' => 'Domain transfer işlemi', 'category' => 'Domain', 'views' => 543, 'updated' => '2024-06-15'],
    ['title' => 'VPS sunucu kurulumu', 'category' => 'VPS', 'views' => 432, 'updated' => '2024-06-12'],
];

ob_start();
?>
<div class="page-header">
    <h1>Help Center</h1>
    <p class="text-muted">Bilgi bankası ve yardım makaleleri</p>
</div>

<div class="action-bar">
    <button class="btn btn-primary"><i class="fas fa-plus"></i> Yeni Makale</button>
    <button class="btn btn-secondary"><i class="fas fa-folder"></i> Kategoriler</button>
</div>

<div class="card">
    <table class="data-table">
        <thead>
            <tr>
                <th>Makale</th>
                <th>Kategori</th>
                <th>Görüntülenme</th>
                <th>Güncellenme</th>
                <th>İşlemler</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($articles as $article): ?>
            <tr>
                <td><strong><?= $article['title'] ?></strong></td>
                <td><span class="badge badge-outline"><?= $article['category'] ?></span></td>
                <td><i class="fas fa-eye"></i> <?= number_format($article['views']) ?></td>
                <td><?= $article['updated'] ?></td>
                <td>
                    <div class="action-buttons">
                        <button class="btn-icon" title="Düzenle"><i class="fas fa-edit"></i></button>
                        <button class="btn-icon" title="Görüntüle"><i class="fas fa-eye"></i></button>
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
.action-bar{display:flex;gap:var(--space-3);margin-bottom:var(--space-6);}
.card{background:var(--bg-card);border:1px solid var(--border-subtle);border-radius:var(--radius-2xl);overflow:hidden;}
.data-table{width:100%;border-collapse:collapse;} .data-table th,.data-table td{padding:var(--space-4) var(--space-6);text-align:left;border-bottom:1px solid var(--border-subtle);}
.data-table th{font-size:var(--text-xs);font-weight:600;text-transform:uppercase;color:var(--text-muted);background:var(--bg-secondary);}
.badge{display:inline-flex;padding:var(--space-1) var(--space-3);font-size:var(--text-xs);font-weight:500;border-radius:var(--radius-full);}
.badge-outline{background:transparent;border:1px solid var(--border-subtle);color:var(--text-muted);}
.action-buttons{display:flex;gap:var(--space-2);}
.btn-icon{width:32px;height:32px;display:flex;align-items:center;justify-content:center;background:none;border:none;color:var(--text-muted);border-radius:var(--radius-lg);cursor:pointer;}
.btn-icon:hover{background:var(--bg-hover);color:var(--text-primary);}
</style>
<?php $page_content = ob_get_clean(); require __DIR__ . '/../layouts/admin-shell.php';
