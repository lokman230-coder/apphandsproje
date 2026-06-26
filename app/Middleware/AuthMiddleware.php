<?php
/**
 * Auth Middleware
 */
class AuthMiddleware {
    public static function check() {
        if (!isset($_SESSION['user_id'])) {
            header('Location: ' . base_url('login'));
            exit;
        }
    }
    
    public static function admin() {
        self::check();
        if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'admin') {
            header('Location: ' . base_url());
            exit;
        }
    }
    
    public static function guest() {
        if (isset($_SESSION['user_id'])) {
            header('Location: ' . base_url());
            exit;
        }
    }
}
