<?php
/**
 * Transaction Model
 */
class Transaction extends Model {
    protected $table = 'transactions';
    
    public function getByDateRange($start, $end) {
        $all = $this->all();
        return array_filter($all, fn($t) => $t['created_at'] >= $start && $t['created_at'] <= $end);
    }
    
    public function getTotalIncome() {
        $all = $this->all();
        return array_sum(array_column(array_filter($all, fn($t) => $t['type'] === 'income'), 'amount'));
    }
    
    public function getTotalExpense() {
        $all = $this->all();
        return array_sum(array_column(array_filter($all, fn($t) => $t['type'] === 'expense'), 'amount'));
    }
}
