<?php
/** Ticket/Support Controller */
class TicketController extends Controller {
    public function index() {
        $this->data['tickets'] = $_SESSION['tickets'] ?? [];
        $this->data['page_title'] = 'Destek Talepleri';
        $this->view('admin.support', $this->data);
    }
    
    public function show($id) {
        foreach ($_SESSION['tickets'] ?? [] as $ticket) {
            if ($ticket['id'] == $id) {
                $this->data['ticket'] = $ticket;
                break;
            }
        }
        $this->view('admin.ticket-show', $this->data);
    }
    
    public function reply($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            foreach ($_SESSION['tickets'] as &$t) {
                if ($t['id'] == $id) {
                    $t['status'] = 'answered';
                    break;
                }
            }
            setFlash('success', 'Yanıt gönderildi');
            $this->redirect(base_url('admin/support'));
        }
    }
    
    public function close($id) {
        foreach ($_SESSION['tickets'] as &$t) {
            if ($t['id'] == $id) {
                $t['status'] = 'closed';
                break;
            }
        }
        setFlash('success', 'Talep kapatıldı');
        $this->redirect(base_url('admin/support'));
    }
}
