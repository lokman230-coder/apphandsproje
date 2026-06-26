<?php /** İletişim Sayfası */ $pageTitle='İletişim - '.SITE_NAME; $current_page='contact'; if($_SERVER['REQUEST_METHOD']==='POST'){ setFlash('success','Mesajınız gönderildi! En kısa sürede dönüş yapacağız.'); } ob_start(); ?>
<section class="hero hero-page"><div class="container"><div class="hero-inner" style="text-align:center;">
<div class="hero-content" style="max-width:700px;margin:0 auto;">
<div class="hero-badge"><i class="fas fa-envelope"></i> İletişim</div>
<h1 class="hero-title">Bize <span>Ulaşın</span></h1>
<p class="hero-description">Sorularınız veya önerileriniz için bizimle iletişime geçin.</p>
</div></div></div></section>

<section class="contact-section"><div class="container">
<div class="contact-grid">
<div class="contact-info">
<h2>İletişim Bilgileri</h2>
<div class="info-item"><i class="fas fa-map-marker-alt"></i><div><h4>Adres</h4><p>İstanbul, Türkiye</p></div></div>
<div class="info-item"><i class="fas fa-phone"></i><div><h4>Telefon</h4><p>0850 XXX XX XX</p></div></div>
<div class="info-item"><i class="fas fa-envelope"></i><div><h4>E-posta</h4><p>info@ahostone.com</p></div></div>
<div class="info-item"><i class="fas fa-clock"></i><div><h4>Çalışma Saatleri</h4><p>7/24 Destek</p></div></div>
</div>

<div class="contact-form-wrapper">
<h2>Mesaj Gönderin</h2>
<form method="POST" class="contact-form">
<div class="form-row"><div class="form-group"><label>Ad</label><input type="text" name="name" required></div>
<div class="form-group"><label>E-posta</label><input type="email" name="email" required></div></div>
<div class="form-group"><label>Konu</label><select name="subject"><option>Genel Soru</option><option>Teknik Destek</option><option>Satış</option><option>Şikayet</option></select></div>
<div class="form-group"><label>Mesaj</label><textarea name="message" rows="5" required></textarea></div>
<button type="submit" class="btn btn-primary btn-lg" style="width:100%;">Gönder</button>
</form>
</div>
</div></div></section>

<style>
.contact-section{padding:var(--space-24) 0;}
.contact-grid{display:grid;grid-template-columns:1fr 1.5fr;gap:var(--space-12);}
.contact-info h2,.contact-form-wrapper h2{font-size:var(--text-2xl);margin-bottom:var(--space-6);}
.info-item{display:flex;gap:var(--space-4);padding:var(--space-4) 0;border-bottom:1px solid var(--border-subtle);}
.info-item:last-child{border-bottom:none;}
.info-item i{width:48px;height:48px;background:var(--primary-50);border-radius:var(--radius-lg);display:flex;align-items:center;justify-content:center;color:var(--primary-600);font-size:var(--text-xl);}
.info-item h4{font-size:var(--text-sm);margin-bottom:var(--space-1);}
.info-item p{color:var(--text-muted);font-size:var(--text-sm);}
.form-row{display:grid;grid-template-columns:1fr 1fr;gap:var(--space-4);}
.form-group{margin-bottom:var(--space-5);}
.form-group label{display:block;font-size:var(--text-sm);font-weight:500;margin-bottom:var(--space-2);}
.form-group input,.form-group select,.form-group textarea{width:100%;padding:var(--space-3) var(--space-4);background:var(--bg-secondary);border:2px solid var(--border-subtle);border-radius:var(--radius-xl);color:var(--text-primary);font-size:var(--text-base);}
.form-group input:focus,.form-group select:focus,.form-group textarea:focus{outline:none;border-color:var(--primary-500);}
.form-group textarea{resize:vertical;}
@media(max-width:768px){.contact-grid{grid-template-columns:1fr;}.form-row{grid-template-columns:1fr;}}
</style>
<?php $page_content=ob_get_clean(); require __DIR__.'/../layouts/site-layout.php';
