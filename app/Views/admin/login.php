<?php
/**
 * Admin Giriş Sayfası
 */
ob_start();
?>
<div class="auth-container">
    <div class="auth-card">
        <div class="auth-header">
            <div class="auth-logo">
                <div class="logo-icon">A</div>
            </div>
            <h1>Admin Panel</h1>
            <p>Yönetim paneline giriş yapın</p>
        </div>
        
        <?php if ($flash = getFlash()): ?>
            <div class="alert alert-<?= $flash['type'] ?>">
                <?= $flash['message'] ?>
            </div>
        <?php endif; ?>
        
        <form method="POST" class="auth-form">
            <div class="form-group">
                <label>E-posta</label>
                <input type="email" name="email" placeholder="admin@ornek.com" required>
            </div>
            
            <div class="form-group">
                <label>Şifre</label>
                <input type="password" name="password" placeholder="••••••••" required>
            </div>
            
            <div class="form-row">
                <label class="checkbox">
                    <input type="checkbox" name="remember">
                    <span>Beni hatırla</span>
                </label>
                <a href="#" class="forgot-link">Şifremi unuttum</a>
            </div>
            
            <button type="submit" class="btn btn-primary btn-lg" style="width: 100%;">
                Giriş Yap
            </button>
        </form>
        
        <div class="auth-footer">
            <a href="<?= base_url() ?>">
                <i class="fas fa-arrow-left"></i> Siteye dön
            </a>
        </div>
    </div>
</div>

<style>
.auth-container {
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 20px;
    background: var(--bg-primary);
}

.auth-card {
    width: 100%;
    max-width: 420px;
    background: var(--bg-card);
    border: 1px solid var(--border-subtle);
    border-radius: var(--radius-2xl);
    padding: var(--space-10);
}

.auth-header {
    text-align: center;
    margin-bottom: var(--space-8);
}

.auth-logo {
    margin-bottom: var(--space-6);
}

.auth-logo .logo-icon {
    width: 64px;
    height: 64px;
    font-size: 28px;
    margin: 0 auto;
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

.auth-form label {
    display: block;
    font-size: var(--text-sm);
    font-weight: 500;
    margin-bottom: var(--space-2);
    color: var(--text-primary);
}

.auth-form input[type="email"],
.auth-form input[type="password"] {
    width: 100%;
    padding: var(--space-3) var(--space-4);
    border: 2px solid var(--border-subtle);
    border-radius: var(--radius-xl);
    background: var(--bg-primary);
    color: var(--text-primary);
    font-size: var(--text-base);
    transition: var(--transition);
}

.auth-form input:focus {
    outline: none;
    border-color: var(--primary-500);
}

.form-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: var(--space-6);
}

.checkbox {
    display: flex;
    align-items: center;
    gap: var(--space-2);
    cursor: pointer;
}

.checkbox input {
    width: 18px;
    height: 18px;
    accent-color: var(--primary-500);
}

.forgot-link {
    font-size: var(--text-sm);
    color: var(--primary-500);
}

.auth-footer {
    text-align: center;
    margin-top: var(--space-8);
    padding-top: var(--space-6);
    border-top: 1px solid var(--border-subtle);
}

.auth-footer a {
    color: var(--text-muted);
    font-size: var(--text-sm);
}

.alert {
    padding: var(--space-4);
    border-radius: var(--radius-lg);
    margin-bottom: var(--space-6);
    font-size: var(--text-sm);
}

.alert-success {
    background: var(--success-light);
    color: var(--success);
}
</style>
<?php
$page_content = ob_get_clean();
require __DIR__ . '/../layouts/admin-shell.php';
