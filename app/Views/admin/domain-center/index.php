<?php
/**
 * Domain Center - Alan Adı Yönetimi
 */
$page_title = 'Domain Center';
$breadcrumbs = [
    ['label' => 'Dashboard', 'url' => base_url('admin')],
    ['label' => 'Domain Center']
];

$domains = [
    ['domain' => 'orneksite.com', 'customer' => 'Ahmet Kaya', 'registrar' => 'GoDaddy', 'status' => 'active', 'expiry' => '2025-06-15', 'dns' => 'OK'],
    ['domain' => 'blogsite.com', 'customer' => 'Elif Yılmaz', 'registrar' => 'Namecheap', 'status' => 'active', 'expiry' => '2025-08-20', 'dns' => 'OK'],
    ['domain' => 'projesi.net', 'customer' => 'Mehmet Demir', 'registrar' => 'Cloudflare', 'status' => 'expiring', 'expiry' => '2024-07-01', 'dns' => 'Warning'],
    ['domain' => 'firma.org', 'customer' => 'Zeynep Ak', 'registrar' => 'GoDaddy', 'status' => 'transferred', 'expiry' => '2026-03-10', 'dns' => 'OK'],
];

ob_start();
?>
<div class="page-header">
    <h1>Domain Center</h1>
    <p class="text-muted">Alan adı yönetimi ve işlemleri</p>
</div>

<!-- Stats -->
<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-icon primary"><i class="fas fa-globe"></i></div>
        <div class="stat-info">
            <div class="stat-value"><?= count($domains) ?></div>
            <div class="stat-label">Toplam Domain</div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon success"><i class="fas fa-check-circle"></i></div>
        <div class="stat-info">
            <div class="stat-value"><?= count(array_filter($domains, fn($d) => $d['status'] === 'active')) ?></div>
            <div class="stat-label">Aktif</div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon warning"><i class="fas fa-exclamation-triangle"></i></div>
        <div class="stat-info">
            <div class="stat-value"><?= count(array_filter($domains, fn($d) => $d['status'] === 'expiring')) ?></div>
            <div class="stat-label">Süre Dolacak</div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon info"><i class="fas fa-server"></i></div>
        <div class="stat-info">
            <div class="stat-value">4</div>
            <div class="stat-label">Registrar</div>
        </div>
    </div>
</div>

<!-- Actions -->
<div class="action-bar">
    <button class="btn btn-primary" onclick="showModal('register')">
        <i class="fas fa-plus"></i> Yeni Domain Kaydet
    </button>
    <button class="btn btn-secondary" onclick="showModal('transfer')">
        <i class="fas fa-exchange-alt"></i> Transfer Et
    </button>
    <button class="btn btn-secondary">
        <i class="fas fa-sync"></i> DNS Senkronize Et
    </button>
</div>

<!-- Domain List -->
<div class="card">
    <div class="card-header">
        <div class="search-box">
            <i class="fas fa-search"></i>
            <input type="text" placeholder="Domain ara..." class="search-input">
        </div>
        <div class="filter-tabs">
            <button class="filter-tab active">Tümü</button>
            <button class="filter-tab">Aktif</button>
            <button class="filter-tab">Süre Dolacak</button>
            <button class="filter-tab">Transferli</button>
        </div>
    </div>
    <table class="data-table">
        <thead>
            <tr>
                <th>Domain</th>
                <th>Müşteri</th>
                <th>Registrar</th>
                <th>DNS</th>
                <th>Bitiş</th>
                <th>Durum</th>
                <th>İşlemler</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($domains as $domain): ?>
            <tr>
                <td>
                    <div class="domain-info">
                        <i class="fas fa-globe"></i>
                        <strong><?= $domain['domain'] ?></strong>
                    </div>
                </td>
                <td><?= $domain['customer'] ?></td>
                <td><span class="badge badge-outline"><?= $domain['registrar'] ?></span></td>
                <td>
                    <?php if ($domain['dns'] === 'OK'): ?>
                        <span class="dns-status success"><i class="fas fa-check"></i> OK</span>
                    <?php else: ?>
                        <span class="dns-status warning"><i class="fas fa-exclamation"></i> Warning</span>
                    <?php endif; ?>
                </td>
                <td><?= $domain['expiry'] ?></td>
                <td>
                    <?php
                    $statusMap = ['active' => 'Aktif', 'expiring' => 'Süre Dolacak', 'transferred' => 'Transferli'];
                    $statusClass = ['active' => 'success', 'expiring' => 'warning', 'transferred' => 'info'][$domain['status']];
                    ?>
                    <span class="badge badge-<?= $statusClass ?>"><?= $statusMap[$domain['status']] ?></span>
                </td>
                <td>
                    <div class="action-buttons">
                        <button class="btn-icon" title="Düzenle"><i class="fas fa-edit"></i></button>
                        <button class="btn-icon" title="DNS"><i class="fas fa-server"></i></button>
                        <button class="btn-icon" title="Transfer"><i class="fas fa-exchange-alt"></i></button>
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- Modals -->
<div class="modal" id="registerModal">
    <div class="modal-content">
        <div class="modal-header">
            <h3>Yeni Domain Kaydet</h3>
            <button class="modal-close" onclick="closeModal('register')">&times;</button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label>Domain Adı</label>
                <input type="text" placeholder="domain.com">
            </div>
            <div class="form-group">
                <label>Müşteri</label>
                <select>
                    <option>Ahmet Kaya</option>
                    <option>Elif Yılmaz</option>
                    <option>Mehmet Demir</option>
                </select>
            </div>
            <div class="form-group">
                <label>Kayıt Süresi</label>
                <select>
                    <option>1 Yıl</option>
                    <option>2 Yıl</option>
                    <option selected>3 Yıl</option>
                </select>
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn btn-secondary" onclick="closeModal('register')">İptal</button>
            <button class="btn btn-primary">Kaydet</button>
        </div>
    </div>
</div>

<style>
.page-header{margin-bottom:var(--space-8);} .page-header h1{font-size:var(--text-2xl);} .text-muted{color:var(--text-muted);}
.stats-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:var(--space-6);margin-bottom:var(--space-6);}
.stat-card{background:var(--bg-card);border:1px solid var(--border-subtle);border-radius:var(--radius-2xl);padding:var(--space-6);display:flex;align-items:center;gap:var(--space-4);}
.stat-icon{width:56px;height:56px;border-radius:var(--radius-xl);display:flex;align-items:center;justify-content:center;font-size:var(--text-xl);}
.stat-icon.primary{background:var(--primary-50);color:var(--primary-600);} .stat-icon.success{background:rgba(16,185,129,0.1);color:var(--success);} .stat-icon.warning{background:rgba(249,115,22,0.1);color:var(--warning);} .stat-icon.info{background:rgba(59,130,246,0.1);color:var(--info);}
.stat-value{font-size:var(--text-2xl);font-weight:700;} .stat-label{font-size:var(--text-sm);color:var(--text-muted);}
.action-bar{display:flex;gap:var(--space-3);margin-bottom:var(--space-6);}
.card{background:var(--bg-card);border:1px solid var(--border-subtle);border-radius:var(--radius-2xl);overflow:hidden;}
.card-header{display:flex;justify-content:space-between;align-items:center;padding:var(--space-5) var(--space-6);border-bottom:1px solid var(--border-subtle);}
.search-box{position:relative;width:300px;}
.search-box i{position:absolute;left:var(--space-4);top:50%;transform:translateY(-50%);color:var(--text-muted);}
.search-input{width:100%;padding:var(--space-3) var(--space-4) var(--space-3) var(--space-12);background:var(--bg-secondary);border:1px solid var(--border-subtle);border-radius:var(--radius-xl);color:var(--text-primary);}
.filter-tabs{display:flex;gap:var(--space-2);}
.filter-tab{padding:var(--space-2) var(--space-4);background:none;border:none;color:var(--text-muted);font-size:var(--text-sm);font-weight:500;cursor:pointer;border-radius:var(--radius-lg);}
.filter-tab:hover{background:var(--bg-hover);} .filter-tab.active{background:var(--primary-500);color:white;}
.data-table{width:100%;border-collapse:collapse;} .data-table th,.data-table td{padding:var(--space-4) var(--space-6);text-align:left;border-bottom:1px solid var(--border-subtle);}
.data-table th{font-size:var(--text-xs);font-weight:600;text-transform:uppercase;color:var(--text-muted);background:var(--bg-secondary);}
.domain-info{display:flex;align-items:center;gap:var(--space-2);} .domain-info i{color:var(--primary-500);}
.dns-status{font-size:var(--text-xs);font-weight:500;padding:var(--space-1) var(--space-2);border-radius:var(--radius-md);}
.dns-status.success{background:rgba(16,185,129,0.1);color:var(--success);} .dns-status.warning{background:rgba(249,115,22,0.1);color:var(--warning);}
.badge{display:inline-flex;padding:var(--space-1) var(--space-3);font-size:var(--text-xs);font-weight:500;border-radius:var(--radius-full);}
.badge-outline{background:transparent;border:1px solid var(--border-subtle);color:var(--text-muted);}
.badge-success{background:rgba(16,185,129,0.1);color:var(--success);} .badge-warning{background:rgba(249,115,22,0.1);color:var(--warning);} .badge-info{background:rgba(59,130,246,0.1);color:var(--info);}
.action-buttons{display:flex;gap:var(--space-2);}
.btn-icon{width:32px;height:32px;display:flex;align-items:center;justify-content:center;background:none;border:none;color:var(--text-muted);border-radius:var(--radius-lg);cursor:pointer;}
.btn-icon:hover{background:var(--bg-hover);color:var(--text-primary);}
/* Modal */
.modal{display:none;position:fixed;top:0;left:0;right:0;bottom:0;background:rgba(0,0,0,0.5);z-index:1000;align-items:center;justify-content:center;}
.modal.active{display:flex;}
.modal-content{background:var(--bg-card);border-radius:var(--radius-2xl);width:100%;max-width:500px;max-height:90vh;overflow:auto;}
.modal-header{display:flex;justify-content:space-between;align-items:center;padding:var(--space-5) var(--space-6);border-bottom:1px solid var(--border-subtle);}
.modal-header h3{font-size:var(--text-lg);}
.modal-close{width:32px;height:32px;background:none;border:none;font-size:var(--text-xl);cursor:pointer;}
.modal-body{padding:var(--space-6);}
.modal-footer{display:flex;justify-content:flex-end;gap:var(--space-3);padding:var(--space-5) var(--space-6);border-top:1px solid var(--border-subtle);}
.form-group{margin-bottom:var(--space-5);}
.form-group label{display:block;font-size:var(--text-sm);font-weight:500;margin-bottom:var(--space-2);}
.form-group input,.form-group select{width:100%;padding:var(--space-3) var(--space-4);background:var(--bg-secondary);border:2px solid var(--border-subtle);border-radius:var(--radius-xl);color:var(--text-primary);}
.form-group input:focus,.form-group select:focus{outline:none;border-color:var(--primary-500);}
</style>

<script>
function showModal(type) {
    document.getElementById(type + 'Modal').classList.add('active');
}
function closeModal(type) {
    document.getElementById(type + 'Modal').classList.remove('active');
}
</script>

<?php $page_content = ob_get_clean(); require __DIR__ . '/../layouts/admin-shell.php';
