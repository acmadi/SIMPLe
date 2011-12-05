<?php
class Man_unit extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    var $title = 'Manajemen Unit';

    function index()
    {
        // TODO: Nanti kapan-kapan pindahin ini ke model
        $sql = "SELECT * FROM tb_unit_saker";
        $result = $this->db->query($sql);
        
        /*if ($this->session->userdata('login') == TRUE)
          {*/
        $data['title'] = 'Manajemen Unit';
        $data['content'] = 'admin/man_unit/man_unit';
        $data['units'] = $result;
        $this->load->view('admin/template', $data);
        /*}
          else
          {
              $this->load->view('login/login_view');
          }*/
    }
}

?>