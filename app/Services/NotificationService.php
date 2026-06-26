<?php
/** Notification Service */
class NotificationService {
    public function send($userId, $message, $type = 'info') {
        if (!isset($_SESSION['notifications'])) $_SESSION['notifications'] = [];
        $_SESSION['notifications'][] = [
            'id' => count($_SESSION['notifications']) + 1,
            'user_id' => $userId,
            'message' => $message,
            'type' => $type,
            'read' => false,
            'created_at' => date('Y-m-d H:i:s')
        ];
    }
    
    public function getAll($userId) {
        return array_filter($_SESSION['notifications'] ?? [], fn($n) => $n['user_id'] == $userId);
    }
    
    public function unreadCount($userId) {
        return count(array_filter($this->getAll($userId), fn($n) => !$n['read']));
    }
    
    public function markAsRead($id) {
        foreach ($_SESSION['notifications'] as &$n) {
            if ($n['id'] == $id) $n['read'] = true;
        }
    }
}
