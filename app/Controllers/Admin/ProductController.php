<?php
/** Product Controller */
class ProductController extends Controller {
    private $products = [];
    
    public function __construct() {
        if (!isset($_SESSION['products'])) {
            $_SESSION['products'] = [
                ['id' => 1, 'name' => 'Başlangıç Hosting', 'category' => 'hosting', 'price' => 49, 'status' => 'active'],
                ['id' => 2, 'name' => 'Profesyonel Hosting', 'category' => 'hosting', 'price' => 149, 'status' => 'active'],
                ['id' => 3, 'name' => 'VPS Start', 'category' => 'vps', 'price' => 199, 'status' => 'active'],
                ['id' => 4, 'name' => 'VPS Pro', 'category' => 'vps', 'price' => 399, 'status' => 'active'],
                ['id' => 5, 'name' => 'Standart SSL', 'category' => 'ssl', 'price' => 99, 'status' => 'active'],
            ];
        }
    }
    
    public function index() {
        $this->data['products'] = $_SESSION['products'];
        $this->data['page_title'] = 'Ürünler';
        $this->view('admin.products', $this->data);
    }
    
    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $_SESSION['products'][] = [
                'id' => count($_SESSION['products']) + 1,
                'name' => $_POST['name'],
                'category' => $_POST['category'],
                'price' => (float)$_POST['price'],
                'status' => 'active'
            ];
            setFlash('success', 'Ürün eklendi');
            $this->redirect(base_url('admin/products'));
        }
        $this->view('admin.product-create', $this->data);
    }
    
    public function edit($id) {
        foreach ($_SESSION['products'] as &$p) {
            if ($p['id'] == $id) {
                $this->data['product'] = $p;
                break;
            }
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            foreach ($_SESSION['products'] as &$p) {
                if ($p['id'] == $id) {
                    $p['name'] = $_POST['name'];
                    $p['price'] = (float)$_POST['price'];
                    break;
                }
            }
            setFlash('success', 'Ürün güncellendi');
            $this->redirect(base_url('admin/products'));
        }
        $this->view('admin.product-edit', $this->data);
    }
    
    public function delete($id) {
        $_SESSION['products'] = array_filter($_SESSION['products'], fn($p) => $p['id'] != $id);
        setFlash('success', 'Ürün silindi');
        $this->redirect(base_url('admin/products'));
    }
}
