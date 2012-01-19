<?php
class Dashboard extends CI_Controller
{

    function Dashboard()
    {
        parent::__construct();
        $this->load->model('mhelpdesk');
    }

    var $title = 'Dashboard';

    function index()
    {
        $data['tikets'] = $this->mhelpdesk->get_all_closed_ticket_by(2, FALSE, TRUE);
        $data['title'] = 'Dashboard';
        $data['content'] = 'helpdesk/dashboard';
        $this->load->view('new-template', $data);
    }
}

?>