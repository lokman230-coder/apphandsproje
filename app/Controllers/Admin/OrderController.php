<?php
/** Order Controller */
class OrderController extends Controller {
    public function index() {
        $this->data['orders'] = $_SESSION['orders'] ?? [];
        $this->data['page_title'] = 'Siparişler';
        $this->view('admin.orders', $this->data);
    }
    
    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $_SESSION['orders'][] = [
                'id' => count($_SESSION['orders']) + 1,
                'customer_id' => $_POST['customer_id'],
                'product' => $_POST['product'],
                'amount' => $_POST['amount'],
                'status' => 'pending',
                'created_at' => date('Y-m-d')
            ];
            setFlash('success', 'Sipariş oluşturuldu');
            $this->redirect(base_url('admin/orders'));
        }
        $this->data['customers'] = $_SESSION['customers'] ?? [];
        $this->view('admin.order-create', $this->data);
    }
    
    public function update($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            foreach ($_SESSION['orders'] as &$order) {
                if ($order['id'] == $id) {
                    $order['status'] = $_POST['status'];
                    break;
                }
            }
            setFlash('success', 'Sipariş güncellendi');
            $this->redirect(base_url('admin/orders'));
        }
    }
    
    public function delete($id) {
        $_SESSION['orders'] = array_filter($_SESSION['orders'] ?? [], fn($o) => $o['id'] != $id);
        setFlash('success', 'Sipariş silindi');
        $this->redirect(base_url('admin/orders'));
    }
}
