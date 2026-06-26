<?php /** * Ayarlar */ $page_title = 'Ayarlar'; $breadcrumbs = [['label'=>'Dashboard','url'=>base_url('admin')],['label'=>'Ayarlar']]; ob_start(); ?>
<div class="page-header"><h1>Ayarlar</h1><p class="text-muted">Sistem ayarlarınızı yönetin</p></div>
<div class="settings-tabs">
<button class="tab-btn active" data-tab="general">Genel</button>
<button class="tab-btn" data-tab="email">E-posta</button>
<button class="tab-btn" data-tab="payment">Ödeme</button>
<button class="tab-btn" data-tab="security">Güvenlik</button>
</div>
<div class="settings-content">
<div class="tab-panel active" id="general">
<div class="form-card"><h3>Genel Ayarlar</h3>
<form>
<div class="form-group"><label>Site Adı</label><input type="text" value="Ahost One"></div>
<div class="form-group"><label>Site URL</label><input type="url" value="https://ahostone.com"></div>
<div class="form-group"><label>E-posta</label><input type="email" value="info@ahostone.com"></div>
<div class="form-group"><label>Telefon</label><input type="tel" value="0850 XXX XX XX"></div>
<button type="submit" class="btn btn-primary">Kaydet</button>
</form>
</div>
</div>
<div class="tab-panel" id="email">
<div class="form-card"><h3>E-posta Ayarları</h3>
<form>
<div class="form-group"><label>SMTP Host</label><input type="text" value="smtp.example.com"></div>
<div class="form-group"><label>SMTP Port</label><input type="text" value="587"></div>
<div class="form-group"><label>SMTP Kullanıcı</label><input type="text" value="noreply@ahostone.com"></div>
<div class="form-group"><label>SMTP Şifre</label><input type="password" value="********"></div>
<button type="submit" class="btn btn-primary">Kaydet</button>
</form>
</div>
</div>
<div class="tab-panel" id="payment">
<div class="form-card"><h3>Ödeme Ayarları</h3>
<form>
<div class="form-group"><label>Para Birimi</label><select><option selected>TRY - Türk Lirası</option><option>USD - ABD Doları</option><option>EUR - Euro</option></select></div>
<div class="form-group"><label>KDV Oranı</label><input type="number" value="20"></div>
<button type="submit" class="btn btn-primary">Kaydet</button>
</form>
</div>
</div>
<div class="tab-panel" id="security">
<div class="form-card"><h3>Güvenlik Ayarları</h3>
<form>
<div class="form-group"><label>Oturum Süresi (dakika)</label><input type="number" value="60"></div>
<div class="form-group"><label class="checkbox"><input type="checkbox" checked> İki Faktörlü Doğrulama Zorunlu</label></div>
<div class="form-group"><label class="checkbox"><input type="checkbox" checked> IP Adresi Kısıtlaması</label></div>
<button type="submit" class="btn btn-primary">Kaydet</button>
</form>
</div>
</div>
</div>
<style>
.page-header{margin-bottom:var(--space-8);} .page-header h1{font-size:var(--text-2xl);margin-bottom:var(--space-2);} .text-muted{color:var(--text-muted);}
.settings-tabs{display:flex;gap:var(--space-2);border-bottom:1px solid var(--border-subtle);margin-bottom:var(--space-6);}
.tab-btn{padding:var(--space-3) var(--space-5);background:none;border:none;color:var(--text-muted);font-weight:500;cursor:pointer;border-bottom:2px solid transparent;margin-bottom:-1px;}
.tab-btn:hover{color:var(--text-primary);} .tab-btn.active{color:var(--primary-500);border-color:var(--primary-500);}
.tab-panel{display:none;} .tab-panel.active{display:block;}
.form-card{background:var(--bg-card);border:1px solid var(--border-subtle);border-radius:var(--radius-2xl);padding:var(--space-8);max-width:600px;}
.form-card h3{font-size:var(--text-lg);margin-bottom:var(--space-6);}
.form-group{margin-bottom:var(--space-5);}
.form-group label{display:block;font-size:var(--text-sm);font-weight:500;margin-bottom:var(--space-2);}
.form-group input,.form-group select{width:100%;padding:var(--space-3) var(--space-4);background:var(--bg-secondary);border:2px solid var(--border-subtle);border-radius:var(--radius-xl);color:var(--text-primary);}
.form-group input:focus,.form-group select:focus{outline:none;border-color:var(--primary-500);}
.checkbox{display:flex;align-items:center;gap:var(--space-2);cursor:pointer;}
.checkbox input{width:18px;height:18px;accent-color:var(--primary-500);}
</style>
<script>
document.querySelectorAll('.tab-btn').forEach(btn=>{btn.addEventListener('click',()=>{document.querySelectorAll('.tab-btn').forEach(b=>b.classList.remove('active'));document.querySelectorAll('.tab-panel').forEach(p=>p.classList.remove('active'));btn.classList.add('active');document.getElementById(btn.dataset.tab).classList.add('active');});});
</script>
<?php $page_content = ob_get_clean(); require __DIR__.'/../layouts/admin-shell.php';
