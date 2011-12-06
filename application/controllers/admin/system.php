<?php
class System extends CI_Controller {
    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $data['title'] = 'System';
        $data['content'] = 'admin/system';

        $this->load->view('admin/template', $data);
    }
}