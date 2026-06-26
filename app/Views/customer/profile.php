<?php /** * Müşteri Profil */ $page_title = 'Profilim'; $breadcrumbs = [['label' => 'Profilim']]; ob_start(); ?>
<div class="page-header"><h1>Profilim</h1></div>
<div class="profile-grid">
<div class="profile-card">
<div class="profile-avatar"><img src="<?= base_url('public/assets/images/logo.svg') ?>" alt="Avatar"></div>
<div class="profile-info"><h3><?= $_SESSION['user']['name'] ?? 'Kullanıcı' ?></h3><p><?= $_SESSION['user']['email'] ?? '' ?></p></div>
<button class="btn btn-secondary btn-sm">Fotoğraf Değiştir</button>
</div>
<div class="form-card">
<h3>Kişisel Bilgiler</h3>
<form>
<div class="form-row"><div class="form-group"><label>Ad</label><input type="text" value="Ahmet"></div>
<div class="form-group"><label>Soyad</label><input type="text" value="Kaya"></div></div>
<div class="form-group"><label>E-posta</label><input type="email" value="ahmet@example.com"></div>
<div class="form-group"><label>Telefon</label><input type="tel" value="0532 123 4567"></div>
<button type="submit" class="btn btn-primary">Kaydet</button>
</form>
</div>
<div class="form-card">
<h3>Şifre Değiştir</h3>
<form>
<div class="form-group"><label>Mevcut Şifre</label><input type="password" placeholder="••••••••"></div>
<div class="form-group"><label>Yeni Şifre</label><input type="password" placeholder="••••••••"></div>
<div class="form-group"><label>Yeni Şifre Tekrar</label><input type="password" placeholder="••••••••"></div>
<button type="submit" class="btn btn-primary">Şifreyi Güncelle</button>
</form>
</div>
</div>
<style>
.page-header{margin-bottom:var(--space-8);} .page-header h1{font-size:var(--text-2xl);}
.profile-grid{display:grid;grid-template-columns:300px 1fr;gap:var(--space-6);}
.profile-card{background:var(--bg-card);border:1px solid var(--border-subtle);border-radius:var(--radius-2xl);padding:var(--space-8);text-align:center;}
.profile-avatar{width:100px;height:100px;margin:0 auto var(--space-4);border-radius:var(--radius-full);overflow:hidden;}
.profile-avatar img{width:100%;height:100%;object-fit:cover;}
.profile-info h3{font-size:var(--text-xl);margin-bottom:var(--space-1);}
.profile-info p{color:var(--text-muted);font-size:var(--text-sm);}
.form-card{background:var(--bg-card);border:1px solid var(--border-subtle);border-radius:var(--radius-2xl);padding:var(--space-8);}
.form-card h3{font-size:var(--text-lg);margin-bottom:var(--space-6);padding-bottom:var(--space-4);border-bottom:1px solid var(--border-subtle);}
.form-row{display:grid;grid-template-columns:1fr 1fr;gap:var(--space-4);}
.form-group{margin-bottom:var(--space-5);}
.form-group label{display:block;font-size:var(--text-sm);font-weight:500;margin-bottom:var(--space-2);}
.form-group input{width:100%;padding:var(--space-3) var(--space-4);background:var(--bg-secondary);border:2px solid var(--border-subtle);border-radius:var(--radius-xl);color:var(--text-primary);}
.form-group input:focus{outline:none;border-color:var(--primary-500);}
.btn-sm{padding:var(--space-2) var(--space-4);font-size:var(--text-xs);}
@media(max-width:768px){.profile-grid{grid-template-columns:1fr;}}
</style>
<?php $page_content = ob_get_clean(); require __DIR__.'/../layouts/customer-shell.php';
