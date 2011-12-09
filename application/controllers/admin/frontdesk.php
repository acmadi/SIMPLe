<?php
class Frontdesk extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('mfrontdesk', 'frontdesk');
    }

    var $title = 'Front Desk';

    function index()
    {
      $tikets = $this->frontdesk->get_all_tiket();
      $data['title'] = $this->title;
      $data['content_html'] = $this->load->view('admin/frontdesk/frontdesk', 
        array('tikets' => $tikets), TRUE);
      $this->load->view('admin/template', $data);
    }
    function search()
    {
      /*if ($this->session->userdata('login') == TRUE)
        {*/
      $key = $this->input->post('key');
      $value = $this->input->post('value');

      $tikets = $this->frontdesk->get_all_tiket($key, $value);
      $data['title'] = $this->title;
      $data['content_html'] = $this->load->view('admin/frontdesk/frontdesk', 
        array('tikets' => $tikets), TRUE);
      $this->load->view('admin/template', $data);
      /*}
        else
        {
            $this->load->view('login/login_view');
        }*/
    }
}

?>