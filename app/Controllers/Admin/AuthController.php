<?php
/**
 * Admin Auth Controller
 */
class AuthController extends Controller {
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';
            
            // Demo kontrol
            if ($email === 'admin@ahostone.com' && $password === 'admin123') {
                $_SESSION['user_id'] = 1;
                $_SESSION['user'] = ['id' => 1, 'name' => 'Admin', 'email' => $email, 'role' => 'admin'];
                $_SESSION['user_type'] = 'admin';
                $this->redirect(base_url('admin'));
            }
            
            $this->data['error'] = 'Geçersiz e-posta veya şifre';
        }
        $this->view('admin.login', $this->data);
    }
    
    public function logout() {
        session_destroy();
        $this->redirect(base_url('admin/login'));
    }
}
