<?php
/**
 * Customer Controller
 */
class CustomerController extends Controller {
    public function index() {
        $this->data['customers'] = $_SESSION['customers'] ?? [];
        $this->data['page_title'] = 'Müşteriler';
        $this->view('admin.customers', $this->data);
    }
    
    public function show($id) {
        $customers = $_SESSION['customers'] ?? [];
        $customer = array_filter($customers, fn($c) => $c['id'] == $id);
        $this->data['customer'] = reset($customer);
        $this->view('admin.customer-show', $this->data);
    }
    
    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $_SESSION['customers'][] = [
                'id' => count($_SESSION['customers'] ?? []) + 1,
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'phone' => $_POST['phone'] ?? '',
                'status' => 'active',
                'created_at' => date('Y-m-d')
            ];
            setFlash('success', 'Müşteri eklendi');
            $this->redirect(base_url('admin/customers'));
        }
        $this->view('admin.customer-create', $this->data);
    }
    
    public function delete($id) {
        $customers = $_SESSION['customers'] ?? [];
        $_SESSION['customers'] = array_filter($customers, fn($c) => $c['id'] != $id);
        setFlash('success', 'Müşteri silindi');
        $this->redirect(base_url('admin/customers'));
    }
}
