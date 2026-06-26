<?php
/** Customer Model */
class Customer extends Model {
    protected $table = 'customers';
    
    public function getWithOrders($id) {
        $customer = $this->find($id);
        if (!$customer) return null;
        $orders = (new Order())->where('customer_id', $id);
        $customer['orders'] = $orders;
        return $customer;
    }
}
