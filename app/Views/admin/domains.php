<?php /** * Domainler */ $page_title = 'Domainler'; $breadcrumbs = [['label'=>'Dashboard','url'=>base_url('admin')],['label'=>'Domainler']]; $domains=[['domain'=>'orneksite.com','customer'=>'Ahmet Kaya','status'=>'active','expiry'=>'2025-06-15','registrar'=>'GoDaddy'],['domain'=>'blogsite.com','customer'=>'Elif Yılmaz','status'=>'active','expiry'=>'2025-08-20','registrar'=>'Namecheap'],['domain'=>'projesi.net','customer'=>'Mehmet Demir','status'=>'expired','expiry'=>'2024-06-10','registrar'=>'Cloudflare']]; ob_start(); ?>
<div class="page-header"><h1>Domainler</h1><p class="text-muted">Kayıtlı domainleriniz</p></div>
<div class="stats-row">
<div class="stat-card"><div class="stat-icon primary"><i class="fas fa-globe"></i></div><div class="stat-info"><div class="stat-value">156</div><div class="stat-label">Toplam Domain</div></div></div>
<div class="stat-card"><div class="stat-icon success"><i class="fas fa-check-circle"></i></div><div class="stat-info"><div class="stat-value">142</div><div class="stat-label">Aktif</div></div></div>
<div class="stat-card"><div class="stat-icon danger"><i class="fas fa-exclamation-circle"></i></div><div class="stat-info"><div class="stat-value">14</div><div class="stat-label">Yakında Süre Biten</div></div></div>
</div>
<div class="card">
<table class="data-table">
<thead><tr><th>Domain</th><th>Müşteri</th><th>Kayıt Şirketi</th><th>Bitiş Tarihi</th><th>Durum</th></tr></thead>
<tbody>
<?php foreach($domains as $d): ?>
<tr>
<td><strong><?= $d['domain'] ?></strong></td>
<td><?= $d['customer'] ?></td>
<td><?= $d['registrar'] ?></td>
<td><?= $d['expiry'] ?></td>
<td><span class="badge badge-<?= $d['status']==='active'?'success':'danger' ?>"><?= $d['status']==='active'?'Aktif':'Süresi Dolmuş' ?></span></td>
</tr>
<?php endforeach; ?>
</tbody>
</table>
</div>
<style>
.page-header{margin-bottom:var(--space-8);} .page-header h1{font-size:var(--text-2xl);margin-bottom:var(--space-2);} .text-muted{color:var(--text-muted);}
.stats-row{display:grid;grid-template-columns:repeat(3,1fr);gap:var(--space-6);margin-bottom:var(--space-8);}
.stat-card{background:var(--bg-card);border:1px solid var(--border-subtle);border-radius:var(--radius-2xl);padding:var(--space-6);display:flex;align-items:center;gap:var(--space-4);}
.stat-icon{width:56px;height:56px;border-radius:var(--radius-xl);display:flex;align-items:center;justify-content:center;font-size:var(--text-xl);}
.stat-icon.primary{background:var(--primary-50);color:var(--primary-600);} .stat-icon.success{background:rgba(16,185,129,0.1);color:var(--success);} .stat-icon.danger{background:rgba(239,68,68,0.1);color:var(--danger);}
.stat-value{font-size:var(--text-2xl);font-weight:700;} .stat-label{font-size:var(--text-sm);color:var(--text-muted);}
.card{background:var(--bg-card);border:1px solid var(--border-subtle);border-radius:var(--radius-2xl);overflow:hidden;}
.data-table{width:100%;border-collapse:collapse;} .data-table th,.data-table td{padding:var(--space-4) var(--space-6);text-align:left;border-bottom:1px solid var(--border-subtle);}
.data-table th{font-size:var(--text-xs);font-weight:600;text-transform:uppercase;color:var(--text-muted);background:var(--bg-secondary);}
.badge{display:inline-flex;padding:var(--space-1) var(--space-3);font-size:var(--text-xs);font-weight:500;border-radius:var(--radius-full);}
.badge-success{background:rgba(16,185,129,0.1);color:var(--success);} .badge-danger{background:rgba(239,68,68,0.1);color:var(--danger);}
</style>
<?php $page_content = ob_get_clean(); require __DIR__.'/../layouts/admin-shell.php';
