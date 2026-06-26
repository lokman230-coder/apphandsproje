<?php
/** Blog Sayfası */
$pageTitle = 'Blog - ' . SITE_NAME;
$current_page = 'blog';
ob_start();
?>
<section class="hero hero-page"><div class="container"><div class="hero-inner" style="text-align:center;">
<div class="hero-content" style="max-width:700px;margin:0 auto;">
<div class="hero-badge"><i class="fas fa-blog"></i> Blog</div>
<h1 class="hero-title">Blog & <span>Haberler</span></h1>
<p class="hero-description">Hosting, web geliştirme ve dijital dünya hakkında güncel bilgiler.</p>
</div></div></div></section>

<section class="blog-section"><div class="container">
<div class="blog-grid">
<?php $posts = [
    ['title' => 'Web Hosting Nedir?', 'excerpt' => 'Web hosting hakkında bilmeniz gereken her şey...', 'date' => '2024-06-20', 'category' => 'Hosting', 'img' => '🌐'],
    ['title' => 'SSL Sertifikası Neden Önemli?', 'excerpt' => 'Web siteniz için SSL neden vazgeçilmez...', 'date' => '2024-06-18', 'category' => 'Güvenlik', 'img' => '🔒'],
    ['title' => 'VPS vs Shared Hosting', 'excerpt' => 'Hangisini seçmelisiniz? Karşılaştırma...', 'date' => '2024-06-15', 'category' => 'Hosting', 'img' => '🖥️'],
    ['title' => 'WordPress Optimizasyonu', 'excerpt' => 'WP sitenizi hızlandırmanın yolları...', 'date' => '2024-06-12', 'category' => 'WordPress', 'img' => '⚡'],
    ['title' => 'Domain Seçimi İpuçları', 'excerpt' => 'İyi bir domain adı nasıl seçilir...', 'date' => '2024-06-10', 'category' => 'Domain', 'img' => '🌍'],
    ['title' => 'Cloud Hosting Avantajları', 'excerpt' => 'Neden cloud hosting tercih etmelisiniz...', 'date' => '2024-06-08', 'category' => 'Hosting', 'img' => '☁️'],
];
foreach($posts as $post): ?>
<article class="blog-card">
<div class="blog-image"><?= $post['img'] ?></div>
<div class="blog-content">
<div class="blog-meta"><span class="blog-category"><?= $post['category'] ?></span><span><?= $post['date'] ?></span></div>
<h3><?= $post['title'] ?></h3>
<p><?= $post['excerpt'] ?></p>
<a href="#" class="read-more">Devamını Oku <i class="fas fa-arrow-right"></i></a>
</div>
</article>
<?php endforeach; ?>
</div></div></section>

<style>
.blog-section{padding:var(--space-24) 0;}
.blog-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:var(--space-8);}
.blog-card{background:var(--bg-card);border:1px solid var(--border-subtle);border-radius:var(--radius-2xl);overflow:hidden;transition:var(--transition);}
.blog-card:hover{transform:translateY(-4px);box-shadow:var(--shadow-lg);}
.blog-image{height:180px;display:flex;align-items:center;justify-content:center;font-size:64px;background:var(--bg-secondary);}
.blog-content{padding:var(--space-6);}
.blog-meta{display:flex;gap:var(--space-3);margin-bottom:var(--space-3);font-size:var(--text-xs);}
.blog-category{background:var(--primary-500);color:white;padding:2px 8px;border-radius:var(--radius-full);}
.blog-content h3{font-size:var(--text-lg);margin-bottom:var(--space-3);line-height:1.4;}
.blog-content p{color:var(--text-muted);font-size:var(--text-sm);margin-bottom:var(--space-4);}
.read-more{color:var(--primary-500);font-size:var(--text-sm);font-weight:500;text-decoration:none;display:inline-flex;align-items:center;gap:var(--space-2);}
.read-more:hover{text-decoration:underline;}
@media(max-width:768px){.blog-grid{grid-template-columns:1fr;}}
</style>
<?php $page_content = ob_get_clean(); require __DIR__.'/../layouts/site-layout.php';
