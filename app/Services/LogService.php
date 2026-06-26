<?php
/** Log Service */
class LogService {
    public function log($action, $userId = null, $details = '') {
        if (!isset($_SESSION['logs'])) $_SESSION['logs'] = [];
        $_SESSION['logs'][] = [
            'id' => count($_SESSION['logs']) + 1,
            'action' => $action,
            'user_id' => $userId,
            'details' => $details,
            'ip' => $_SERVER['REMOTE_ADDR'] ?? 'unknown',
            'created_at' => date('Y-m-d H:i:s')
        ];
    }
    
    public function getAll() {
        return array_reverse($_SESSION['logs'] ?? []);
    }
    
    public function getByUser($userId) {
        return array_filter($_SESSION['logs'] ?? [], fn($l) => $l['user_id'] == $userId);
    }
}
