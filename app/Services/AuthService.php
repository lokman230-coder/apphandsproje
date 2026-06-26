<?php
/**
 * Auth Service
 */
class AuthService {
    public function login($email, $password) {
        // Demo kontrol
        if ($email === 'admin@ahostone.com' && $password === 'admin123') {
            $_SESSION['user_id'] = 1;
            $_SESSION['user'] = ['id' => 1, 'name' => 'Admin', 'email' => $email, 'role' => 'admin'];
            $_SESSION['user_type'] = 'admin';
            return true;
        }
        
        // Müşteri kontrolü
        $customers = $_SESSION['customers'] ?? [];
        foreach ($customers as $c) {
            if ($c['email'] === $email) {
                $_SESSION['user_id'] = $c['id'];
                $_SESSION['user'] = $c;
                $_SESSION['user_type'] = 'customer';
                return true;
            }
        }
        return false;
    }
    
    public function logout() {
        session_destroy();
    }
    
    public function isLoggedIn() {
        return isset($_SESSION['user_id']);
    }
    
    public function isAdmin() {
        return isset($_SESSION['user_type']) && $_SESSION['user_type'] === 'admin';
    }
    
    public function user() {
        return $_SESSION['user'] ?? null;
    }
}
