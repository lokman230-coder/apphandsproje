<?php
/** Cart Service */
class CartService {
    public function add($productId) {
        if (!isset($_SESSION['cart'])) $_SESSION['cart'] = [];
        $_SESSION['cart'][] = $productId;
        return count($_SESSION['cart']);
    }
    
    public function remove($productId) {
        $_SESSION['cart'] = array_filter($_SESSION['cart'], fn($id) => $id != $productId);
    }
    
    public function items() {
        return $_SESSION['cart'] ?? [];
    }
    
    public function total() {
        $products = $_SESSION['products'] ?? [];
        $total = 0;
        foreach ($this->items() as $id) {
            foreach ($products as $p) {
                if ($p['id'] == $id) $total += $p['price'];
            }
        }
        return $total;
    }
    
    public function clear() {
        $_SESSION['cart'] = [];
    }
    
    public function count() {
        return count($this->items());
    }
}
