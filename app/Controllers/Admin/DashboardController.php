<?php
/**
 * Dashboard Controller
 */
class DashboardController extends Controller {
    public function index() {
        $this->data['page_title'] = 'Dashboard';
        $this->data['stats'] = [
            'customers' => 1234,
            'revenue' => 156789,
            'hosting' => 456,
            'tickets' => 23
        ];
        $this->view('admin.dashboard', $this->data);
    }
}
