<?php
/** * Müşteri Hizmetlerim */ $page_title = 'Hizmetlerim'; $breadcrumbs = [['label' => 'Hizmetlerim']]; ob_start(); ?>
<div class="page-header"><h1>Hizmetlerim</h1><p class="text-muted">Satın aldığınız hizmetler</p></div>
<div class="services-list">
<?php $services = [
    ['name' => 'orneksite.com', 'type' => 'Hosting', 'plan' => 'Profesyonel', 'status' => 'active', 'renewal' => '2025-06-15', 'price' => 149],
    ['name' => 'blogsitesi.com', 'type' => 'WordPress', 'plan' => 'Başlangıç', 'status' => 'active', 'renewal' => '2025-08-20', 'price' => 49],
    ['name' => 'VPS-001', 'type' => 'VPS', 'plan' => 'VPS Pro', 'status' => 'active', 'renewal' => '2025-03-20', 'price' => 399],
];
foreach($services as $s): ?>
<div class="service-row">
<div class="service-icon"><i class="fas fa-<?= $s['type']==='VPS'?'server':'globe' ?>"></i></div>
<div class="service-info"><h4><?= $s['name'] ?></h4><p><?= $s['type'] ?> - <?= $s['plan'] ?></p></div>
<div class="service-status"><span class="badge badge-success">Aktif</span></div>
<div class="service-renewal"><span>Yenileme: <?= $s['renewal'] ?></span></div>
<div class="service-price"><strong>₺<?= $s['price'] ?>/ay</strong></div>
<div class="service-actions"><button class="btn btn-sm btn-secondary">Yönet</button></div>
</div>
<?php endforeach; ?>
</div>
<style>
.page-header{margin-bottom:var(--space-8);}
.page-header h1{font-size:var(--text-2xl);}
.text-muted{color:var(--text-muted);}
.services-list{display:flex;flex-direction:column;gap:var(--space-4);}
.service-row{display:flex;align-items:center;gap:var(--space-4);padding:var(--space-5);background:var(--bg-card);border:1px solid var(--border-subtle);border-radius:var(--radius-xl);}
.service-icon{width:48px;height:48px;background:var(--primary-50);border-radius:var(--radius-lg);display:flex;align-items:center;justify-content:center;color:var(--primary-600);font-size:var(--text-xl);}
.service-info{flex:1;}
.service-info h4{font-size:var(--text-base);margin-bottom:var(--space-1);}
.service-info p{font-size:var(--text-sm);color:var(--text-muted);}
.badge{display:inline-flex;padding:var(--space-1) var(--space-3);font-size:var(--text-xs);font-weight:500;border-radius:var(--radius-full);}
.badge-success{background:rgba(16,185,129,0.1);color:var(--success);}
.service-renewal{font-size:var(--text-sm);color:var(--text-muted);}
.service-price{font-size:var(--text-lg);font-weight:700;}
.btn-sm{padding:var(--space-2) var(--space-4);font-size:var(--text-xs);}
@media(max-width:768px){.service-row{flex-wrap:wrap;}.service-renewal,.service-price{width:100%;margin-top:var(--space-2);}}
</style>
<?php $page_content = ob_get_clean(); require __DIR__.'/../layouts/customer-shell.php';
