<?php if($_SERVER['REQUEST_METHOD']==='POST'){ setFlash('success','Şifre sıfırlama bağlantısı gönderildi!'); redirect('login'); } ob_start(); ?>
<div class="auth-page">
<div class="auth-container">
<div class="auth-card">
<div class="auth-header">
<img src="<?= base_url('public/assets/images/logo.svg') ?>" alt="Logo" class="auth-logo">
<h1>Şifremi Unuttum</h1>
<p>E-posta adresinizi girin, şifre sıfırlama bağlantısı gönderelim.</p>
</div>
<form method="POST" class="auth-form">
<div class="form-group">
<label>E-posta</label>
<input type="email" name="email" placeholder="ornek@email.com" required>
</div>
<button type="submit" class="btn btn-primary btn-lg" style="width:100%;">Bağlantı Gönder</button>
</form>
<div class="auth-footer">
<p><a href="<?= base_url('login') ?>">Giriş sayfasına dön</a></p>
</div>
</div>
</div>
</div>
<style>
.auth-page{min-height:100vh;display:flex;align-items:center;justify-content:center;padding:40px 20px;background:var(--bg-primary);}
.auth-container{width:100%;max-width:480px;}
.auth-card{background:var(--bg-card);border:1px solid var(--border-subtle);border-radius:var(--radius-2xl);padding:var(--space-10);}
.auth-header{text-align:center;margin-bottom:var(--space-8);}
.auth-logo{width:56px;height:56px;margin-bottom:var(--space-6);}
.auth-header h1{font-size:var(--text-2xl);margin-bottom:var(--space-2);}
.auth-header p{color:var(--text-muted);font-size:var(--text-sm);}
.form-group{margin-bottom:var(--space-5);}
.form-group label{display:block;font-size:var(--text-sm);font-weight:500;margin-bottom:var(--space-2);}
.form-group input{width:100%;padding:var(--space-3) var(--space-4);background:var(--bg-primary);border:2px solid var(--border-subtle);border-radius:var(--radius-xl);color:var(--text-primary);}
.form-group input:focus{outline:none;border-color:var(--primary-500);}
.auth-footer{text-align:center;margin-top:var(--space-8);padding-top:var(--space-6);border-top:1px solid var(--border-subtle);}
.auth-footer p{color:var(--text-muted);font-size:var(--text-sm);}
.auth-footer a{color:var(--primary-500);font-weight:500;}
</style>
<?php $page_content=ob_get_clean(); require __DIR__.'/../layouts/site-layout.php';
