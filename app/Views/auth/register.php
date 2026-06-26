<?php
/**
 * Kayıt Sayfası
 */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    setFlash('success', 'Hesabınız başarıyla oluşturuldu!');
    redirect('login');
}

ob_start();
?>
<div class="auth-page">
    <div class="auth-container">
        <div class="auth-card">
            <div class="auth-header">
                <a href="<?= base_url() ?>" class="auth-logo">
                    <img src="<?= base_url('public/assets/images/logo.svg') ?>" alt="Logo">
                </a>
                <h1>Hesap Oluştur</h1>
                <p>Ahost One'a katılın</p>
            </div>
            
            <form method="POST" class="auth-form">
                <div class="form-row-2">
                    <div class="form-group">
                        <label>Ad</label>
                        <input type="text" name="first_name" placeholder="Adınız" required>
                    </div>
                    <div class="form-group">
                        <label>Soyad</label>
                        <input type="text" name="last_name" placeholder="Soyadınız" required>
                    </div>
                </div>
                
                <div class="form-group">
                    <label>E-posta</label>
                    <input type="email" name="email" placeholder="ornek@email.com" required>
                </div>
                
                <div class="form-group">
                    <label>Telefon</label>
                    <input type="tel" name="phone" placeholder="0532 123 4567" required>
                </div>
                
                <div class="form-group">
                    <label>Şifre</label>
                    <input type="password" name="password" placeholder="••••••••" required minlength="8">
                </div>
                
                <div class="form-group">
                    <label>Şifre Tekrar</label>
                    <input type="password" name="password_confirm" placeholder="••••••••" required>
                </div>
                
                <div class="form-group">
                    <label class="checkbox">
                        <input type="checkbox" name="terms" required>
                        <span><a href="#">Kullanım Koşulları</a> ve <a href="#">Gizlilik Politikası</a>'nı okudum ve kabul ediyorum.</span>
                    </label>
                </div>
                
                <button type="submit" class="btn btn-primary btn-lg" style="width: 100%;">
                    Hesap Oluştur
                </button>
            </form>
            
            <div class="auth-divider">
                <span>veya</span>
            </div>
            
            <div class="auth-social">
                <a href="#" class="btn btn-secondary" style="width: 100%;">
                    <i class="fab fa-google"></i> Google ile Kayıt Ol
                </a>
            </div>
            
            <div class="auth-footer">
                <p>Zaten hesabınız var mı? <a href="<?= base_url('login') ?>">Giriş Yap</a></p>
            </div>
        </div>
    </div>
</div>

<style>
.auth-page {
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 40px 20px;
    background: var(--bg-primary);
}

.auth-container {
    width: 100%;
    max-width: 480px;
}

.auth-card {
    background: var(--bg-card);
    border: 1px solid var(--border-subtle);
    border-radius: var(--radius-2xl);
    padding: var(--space-10);
}

.auth-header {
    text-align: center;
    margin-bottom: var(--space-8);
}

.auth-logo img {
    width: 56px;
    height: 56px;
    margin-bottom: var(--space-6);
}

.auth-header h1 {
    font-size: var(--text-2xl);
    margin-bottom: var(--space-2);
}

.auth-header p {
    color: var(--text-muted);
    font-size: var(--text-sm);
}

.auth-form .form-group {
    margin-bottom: var(--space-5);
}

.auth-form .form-row-2 {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: var(--space-4);
}

.auth-form label {
    display: block;
    font-size: var(--text-sm);
    font-weight: 500;
    margin-bottom: var(--space-2);
    color: var(--text-primary);
}

.auth-form input {
    width: 100%;
    padding: var(--space-3) var(--space-4);
    background: var(--bg-primary);
    border: 2px solid var(--border-subtle);
    border-radius: var(--radius-xl);
    color: var(--text-primary);
    font-size: var(--text-base);
    transition: var(--transition);
}

.auth-form input:focus {
    outline: none;
    border-color: var(--primary-500);
}

.checkbox {
    display: flex;
    align-items: flex-start;
    gap: var(--space-2);
    font-size: var(--text-sm);
    cursor: pointer;
}

.checkbox input {
    width: 18px;
    height: 18px;
    margin-top: 2px;
    accent-color: var(--primary-500);
}

.checkbox a {
    color: var(--primary-500);
}

.auth-divider {
    display: flex;
    align-items: center;
    gap: var(--space-4);
    margin: var(--space-6) 0;
    color: var(--text-muted);
    font-size: var(--text-sm);
}

.auth-divider::before,
.auth-divider::after {
    content: '';
    flex: 1;
    height: 1px;
    background: var(--border-subtle);
}

.auth-social .btn i {
    margin-right: var(--space-2);
}

.auth-footer {
    text-align: center;
    margin-top: var(--space-8);
    padding-top: var(--space-6);
    border-top: 1px solid var(--border-subtle);
}

.auth-footer p {
    color: var(--text-muted);
    font-size: var(--text-sm);
}

.auth-footer a {
    color: var(--primary-500);
    font-weight: 500;
}

@media (max-width: 480px) {
    .auth-form .form-row-2 {
        grid-template-columns: 1fr;
    }
}
</style>
<?php
$page_content = ob_get_clean();
require __DIR__ . '/../layouts/site-layout.php';
