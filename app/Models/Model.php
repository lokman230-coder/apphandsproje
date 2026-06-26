<?php
/**
 * Base Model
 */
class Model {
    protected $table;
    protected $db;
    
    public function __construct() {
        // Demo mod - session kullanılıyor
    }
    
    public function all() {
        return $_SESSION[$this->table] ?? [];
    }
    
    public function find($id) {
        $items = $_SESSION[$this->table] ?? [];
        foreach ($items as $item) {
            if ($item['id'] == $id) return $item;
        }
        return null;
    }
    
    public function where($field, $value) {
        $items = $_SESSION[$this->table] ?? [];
        return array_filter($items, fn($item) => ($item[$field] ?? null) == $value);
    }
    
    public function create($data) {
        $items = $_SESSION[$this->table] ?? [];
        $data['id'] = count($items) + 1;
        $data['created_at'] = date('Y-m-d H:i:s');
        $items[] = $data;
        $_SESSION[$this->table] = $items;
        return $data;
    }
    
    public function update($id, $data) {
        $items = $_SESSION[$this->table] ?? [];
        foreach ($items as &$item) {
            if ($item['id'] == $id) {
                $item = array_merge($item, $data);
                break;
            }
        }
        $_SESSION[$this->table] = $items;
        return $this->find($id);
    }
    
    public function delete($id) {
        $items = $_SESSION[$this->table] ?? [];
        $_SESSION[$this->table] = array_filter($items, fn($item) => $item['id'] != $id);
    }
}
