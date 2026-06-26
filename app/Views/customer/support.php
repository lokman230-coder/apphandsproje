<?php /** * Müşteri Destek */ $page_title = 'Destek Taleplerim'; $breadcrumbs = [['label' => 'Destek']]; ob_start(); ?>
<div class="page-header" style="display:flex;justify-content:space-between;align-items:center;margin-bottom:var(--space-8);">
<h1 style="font-size:var(--text-2xl);">Destek Taleplerim</h1>
<button class="btn btn-primary"><i class="fas fa-plus"></i> Yeni Talep</button>
</div>
<div class="card">
<table class="data-table">
<thead><tr><th>ID</th><th>Konu</th><th>Tarih</th><th>Durum</th><th>İşlem</th></tr></thead>
<tbody>
<?php $tickets = [['id'=>'1024','subject'=>'Hosting hesabım çalışmıyor','date'=>'2024-06-24','status'=>'open'],
['id'=>'1023','subject'=>'SSL sertifikası kurulumu','date'=>'2024-06-23','status'=>'answered']];
foreach($tickets as $t): ?>
<tr>
<td><strong>#<?= $t['id'] ?></strong></td>
<td><?= $t['subject'] ?></td>
<td><?= $t['date'] ?></td>
<td><span class="badge badge-<?= $t['status']==='open'?'danger':'warning' ?>"><?= $t['status']==='open'?'Açık':'Cevaplandı' ?></span></td>
<td><button class="btn btn-sm btn-secondary">Görüntüle</button></td>
</tr>
<?php endforeach; ?>
</tbody>
</table>
</div>
<style>
.card{background:var(--bg-card);border:1px solid var(--border-subtle);border-radius:var(--radius-2xl);overflow:hidden;}
.data-table{width:100%;border-collapse:collapse;} .data-table th,.data-table td{padding:var(--space-4) var(--space-6);text-align:left;border-bottom:1px solid var(--border-subtle);}
.data-table th{font-size:var(--text-xs);font-weight:600;text-transform:uppercase;color:var(--text-muted);background:var(--bg-secondary);}
.badge{display:inline-flex;padding:var(--space-1) var(--space-3);font-size:var(--text-xs);font-weight:500;border-radius:var(--radius-full);}
.badge-danger{background:rgba(239,68,68,0.1);color:var(--danger);}
.badge-warning{background:rgba(249,115,22,0.1);color:var(--warning);}
.btn-sm{padding:var(--space-2) var(--space-4);font-size:var(--text-xs);}
</style>
<?php $page_content = ob_get_clean(); require __DIR__.'/../layouts/customer-shell.php';
