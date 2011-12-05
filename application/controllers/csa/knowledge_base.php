<?php
class Knowledge_base extends CI_Controller
{

    function Knowledge_base()
    {
        parent::__construct();
    }

    var $title = 'Knowledge Base';

    function index()
    {
        /*if ($this->session->userdata('login') == TRUE)
          {*/
		$this->load->model('Mknowledge', 'knowledge');
		
        $data['title'] 			= 'Knowledge Base';
        $data['content'] 		= 'csa/knowledge/knowledge_base';
		$data['result']			= $this->knowledge->get_all_data_category();
		
        $this->load->view('csa/template', $data);
        /*}
          else
          {
              $this->load->view('login/login_view');
          }*/
    }
	
	function search_knowledge(){
		$this->form_validation->set_rules('fkat', 'Kategori', 'required');
		if ($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('msg',"<div style='color:red;'>".validation_errors()."</div>");
			redirect('/csa/knowledge_base');
		}
		else
		{	
			$category 	= $this->input->post('fkat', TRUE);
			$this->load->model('Mknowledge', 'knowledge');
			$data['result']		= $this->knowledge->search_by_keyword($category); 
			$data['title'] 		= 'Knowledge Base';
			$data['content'] 	= 'csa/knowledge/knowledge_base';
			$data['part']		= 3;
			$data['idsearch']	= $category;
			$this->load->view('csa/template', $data);
		}
	}
	
	function search_all(){
		$cat = $this->uri->segment(4, '');
		
		if(!empty($cat) OR !empty($limit)){
			$this->load->model('Mknowledge', 'knowledge');
			$item 				= $this->knowledge->search_by_category($cat);
			$data['title'] 		= 'Knowledge Base';
			$data['content'] 	= 'csa/knowledge/knowledge_base';
			$data['result']		= $item;
			$data['idsearch']	= $cat;
			$data['sel']		= true;
			$this->load->view('csa/template', $data);
		}
		
	}
}

?>