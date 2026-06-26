<?php
/**
 * API Controller
 */
class ApiController extends Controller {
    
    public function products() {
        $products = $_SESSION['products'] ?? [];
        $this->json(['success' => true, 'data' => $products]);
    }
    
    public function domains() {
        $domains = $_SESSION['domains'] ?? [];
        $this->json(['success' => true, 'data' => $domains]);
    }
    
    public function domainCheck() {
        $domain = $_GET['domain'] ?? '';
        $available = in_array(substr($domain, 0, -4), ['ornek', 'test', 'demo']);
        $this->json([
            'success' => true,
            'domain' => $domain,
            'available' => $available,
            'price' => 89
        ]);
    }
    
    public function invoices() {
        $invoices = $_SESSION['invoices'] ?? [];
        $this->json(['success' => true, 'data' => $invoices]);
    }
    
    public function tickets() {
        $tickets = $_SESSION['tickets'] ?? [];
        $this->json(['success' => true, 'data' => $tickets]);
    }
    
    public function createTicket() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $_SESSION['tickets'][] = [
                'id' => count($_SESSION['tickets'] ?? []) + 1,
                'subject' => $_POST['subject'] ?? '',
                'message' => $_POST['message'] ?? '',
                'status' => 'open',
                'created_at' => date('Y-m-d H:i:s')
            ];
            $this->json(['success' => true, 'message' => 'Talep oluşturuldu']);
        }
    }
}
