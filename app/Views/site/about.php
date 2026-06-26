<?php /** * Hakkımızda */ $pageTitle='Hakkımızda - '.SITE_NAME; $current_page='about'; ob_start(); ?>
<section class="hero hero-page"><div class="container"><div class="hero-inner" style="text-align:center;"><div class="hero-content" style="max-width:700px;margin:0 auto;">
<div class="hero-badge"><i class="fas fa-building"></i> Hakkımızda</div>
<h1 class="hero-title">Dünyayı <span>Dijitalleştiriyoruz</span></h1>
<p class="hero-description">2015'ten bu yana binlerce işletmeye kesintisiz hosting, domain ve bulut hizmetleri sunuyoruz.</p>
</div></div></div></section>
<section class="about-content"><div class="container">
<div class="about-grid">
<div class="about-card"><i class="fas fa-rocket"></i><h3>Misyonumuz</h3><p>Küçük işletmelerden büyük kuruluşlara, herkesin profesyonel düzeyde dijital varlık sahibi olmasını sağlamak.</p></div>
<div class="about-card"><i class="fas fa-eye"></i><h3>Vizyonumuz</h3><p>Türkiye'nin ve bölgenin en güvenilir, en yenilikçi bulut hizmet sağlayıcısı olmak.</p></div>
<div class="about-card"><i class="fas fa-heart"></i><h3>Değerlerimiz</h3><p>Güvenilirlik, şeffaflık, müşteri odaklılık ve sürekli gelişim ilkelerimizin temelidir.</p></div>
</div></div></section>
<section class="stats-section"><div class="container"><div class="stats-grid">
<div class="stat-item"><div class="stat-number">50K+</div><div class="stat-label">Mutlu Müşteri</div></div>
<div class="stat-item"><div class="stat-number">99.9%</div><div class="stat-label">Çalışma Süresi</div></div>
<div class="stat-item"><div class="stat-number">10+</div><div class="stat-label">Yıllık Deneyim</div></div>
<div class="stat-item"><div class="stat-number">24/7</div><div class="stat-label">Destek</div></div>
</div></div></section>
<section class="team-section"><div class="container"><div class="section-header"><div class="section-badge">Ekibimiz</div><h2 class="section-title">Uzman Kadromuz</h2></div>
<div class="team-grid"><div class="team-card"><img src="https://ui-avatars.com/api/?name=Ali+Yilmaz&background=667eea&color=fff" alt=""><h4>Ali Yılmaz</h4><p>CEO & Kurucu</p></div>
<div class="team-card"><img src="https://ui-avatars.com/api/?name=Ayse+Demir&background=764ba2&color=fff" alt=""><h4>Ayşe Demir</h4><p>CTO</p></div>
<div class="team-card"><img src="https://ui-avatars.com/api/?name=Mehmet+Kaya&background=667eea&color=fff" alt=""><h4>Mehmet Kaya</h4><p>Backend Lead</p></div>
<div class="team-card"><img src="https://ui-avatars.com/api/?name=Zeynep+Ak&background=764ba2&color=fff" alt=""><h4>Zeynep Ak</h4><p>Designer Lead</p></div>
</div></div></section>
<style>
.about-content{padding:var(--space-24) 0;}
.about-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:var(--space-8);}
.about-card{background:var(--bg-card);border:1px solid var(--border-subtle);border-radius:var(--radius-2xl);padding:var(--space-8);text-align:center;}
.about-card i{font-size:48px;color:var(--primary-500);margin-bottom:var(--space-4);}
.about-card h3{font-size:var(--text-xl);margin-bottom:var(--space-3);}
.about-card p{color:var(--text-secondary);font-size:var(--text-sm);line-height:1.7;}
.stats-section{padding:var(--space-20) 0;background:var(--bg-secondary);}
.stats-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:var(--space-8);text-align:center;}
.stat-number{font-size:var(--text-4xl);font-weight:800;background:var(--gradient-primary);-webkit-background-clip:text;-webkit-text-fill-color:transparent;}
.stat-label{font-size:var(--text-sm);color:var(--text-muted);margin-top:var(--space-2);}
.team-section{padding:var(--space-24) 0;}
.team-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:var(--space-8);}
.team-card{background:var(--bg-card);border:1px solid var(--border-subtle);border-radius:var(--radius-2xl);padding:var(--space-8);text-align:center;}
.team-card img{width:100px;height:100px;border-radius:var(--radius-full);margin-bottom:var(--space-4);}
.team-card h4{font-size:var(--text-lg);margin-bottom:var(--space-1);}
.team-card p{color:var(--text-muted);font-size:var(--text-sm);}
@media(max-width:1024px){.about-grid,.stats-grid,.team-grid{grid-template-columns:repeat(2,1fr);}}
@media(max-width:768px){.about-grid,.stats-grid,.team-grid{grid-template-columns:1fr;}}
</style>
<?php $page_content=ob_get_clean(); require __DIR__.'/../layouts/site-layout.php';
