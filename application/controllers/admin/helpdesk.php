<?php
class Helpdesk extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('mhelpdesk', 'helpdesk');
    }

    var $title = 'Help Desk';

    function index()
    {
	  $page		= $this->helpdesk->get_all_tiket(); 
	  $pageData	= $page['query']->result();
	  $pageLink	= $page['pagination1'];
	
	  $data		= array('result'=>$pageData,'pageLink'=>$pageLink,);
      $data['title'] = 'Help Desk';
	  $data['content'] = 'admin/helpdesk/helpdesk';
      $this->load->view('admin/template', $data);
    }
    function search()
    {
      /*if ($this->session->userdata('login') == TRUE)
        {*/
      $key = $this->input->post('key');
      $value = $this->input->post('value');

      $tikets = $this->helpdesk->get_all_tiket($key, $value);
      $data['title'] = 'Help Desk';
      $data['content_html'] = $this->load->view('admin/helpdesk/helpdesk', 
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