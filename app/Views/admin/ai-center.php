<?php /** AI Center */ $page_title='AI Center'; $breadcrumbs=[['label'=>'Dashboard','url'=>base_url('admin')],['label'=>'AI Center']]; ob_start(); ?>
<div class="page-header"><h1>AI Center</h1><p class="text-muted">Yapay zeka destekli araçlar</p></div>

<div class="ai-grid">
<div class="ai-card">
<div class="ai-icon"><i class="fas fa-robot"></i></div>
<h3>AI Copilot</h3>
<p>Hosting ve teknik destek için AI asistanı</p>
<button class="btn btn-primary">Başla</button>
</div>

<div class="ai-card">
<div class="ai-icon"><i class="fas fa-magic"></i></div>
<h3>Otomatik Kodlama</h3>
<p>Site ve uygulama oluşturma asistanı</p>
<button class="btn btn-secondary">Kullan</button>
</div>

<div class="ai-card">
<div class="ai-icon"><i class="fas fa-chart-line"></i></div>
<h3>Tahminleme</h3>
<p>Müşteri davranış analizi ve satış tahmini</p>
<button class="btn btn-secondary">Analiz Et</button>
</div>

<div class="ai-card">
<div class="ai-icon"><i class="fas fa-headset"></i></div>
<h3>Akıllı Destek</h3>
<p>Ticket otomatik yanıtlama sistemi</p>
<button class="btn btn-secondary">Aktif Et</button>
</div>
</div>

<style>
.page-header{margin-bottom:var(--space-8);} .page-header h1{font-size:var(--text-2xl);margin-bottom:var(--space-2);} .text-muted{color:var(--text-muted);}
.ai-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:var(--space-6);}
.ai-card{background:var(--bg-card);border:1px solid var(--border-subtle);border-radius:var(--radius-2xl);padding:var(--space-8);text-align:center;transition:var(--transition);}
.ai-card:hover{transform:translateY(-4px);box-shadow:var(--shadow-lg);}
.ai-icon{width:80px;height:80px;background:var(--gradient-primary);border-radius:20px;display:flex;align-items:center;justify-content:center;font-size:32px;color:white;margin:0 auto var(--space-6);}
.ai-card h3{font-size:var(--text-xl);margin-bottom:var(--space-3);}
.ai-card p{color:var(--text-muted);font-size:var(--text-sm);margin-bottom:var(--space-6);}
@media(max-width:1024px){.ai-grid{grid-template-columns:repeat(2,1fr);}}
@media(max-width:768px){.ai-grid{grid-template-columns:1fr;}}
</style>
<?php $page_content=ob_get_clean(); require __DIR__.'/../layouts/admin-shell.php';
