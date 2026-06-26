<?php /** * Müşteri Faturalarım */ $page_title = 'Faturalarım'; $breadcrumbs = [['label' => 'Faturalarım']]; ob_start(); ?>
<div class="page-header"><h1>Faturalarım</h1><p class="text-muted">Faturalarınızı görüntüleyin</p></div>
<div class="card">
<table class="data-table">
<thead><tr><th>Fatura No</th><th>Tarih</th><th>Tutar</th><th>Durum</th><th>İşlem</th></tr></thead>
<tbody>
<?php $invoices = [
    ['id'=>'INV-2024-001','date'=>'2024-06-15','amount'=>2999,'status'=>'paid'],
    ['id'=>'INV-2024-002','date'=>'2024-05-15','amount'=>1499,'status'=>'paid'],
    ['id'=>'INV-2024-003','date'=>'2024-04-15','amount'=>499,'status'=>'paid'],
];
foreach($invoices as $inv): ?>
<tr>
<td><strong><?= $inv['id'] ?></strong></td>
<td><?= $inv['date'] ?></td>
<td><strong>₺<?= number_format($inv['amount'],0) ?></strong></td>
<td><span class="badge badge-success">Ödenmiş</span></td>
<td><button class="btn btn-sm btn-ghost"><i class="fas fa-download"></i> İndir</button></td>
</tr>
<?php endforeach; ?>
</tbody>
</table>
</div>
<style>
.page-header{margin-bottom:var(--space-8);} .page-header h1{font-size:var(--text-2xl);} .text-muted{color:var(--text-muted);}
.card{background:var(--bg-card);border:1px solid var(--border-subtle);border-radius:var(--radius-2xl);overflow:hidden;}
.data-table{width:100%;border-collapse:collapse;} .data-table th,.data-table td{padding:var(--space-4) var(--space-6);text-align:left;border-bottom:1px solid var(--border-subtle);}
.data-table th{font-size:var(--text-xs);font-weight:600;text-transform:uppercase;color:var(--text-muted);background:var(--bg-secondary);}
.badge{display:inline-flex;padding:var(--space-1) var(--space-3);font-size:var(--text-xs);font-weight:500;border-radius:var(--radius-full);}
.badge-success{background:rgba(16,185,129,0.1);color:var(--success);}
.btn-sm{padding:var(--space-2) var(--space-4);font-size:var(--text-xs);}
</style>
<?php $page_content = ob_get_clean(); require __DIR__.'/../layouts/customer-shell.php';
