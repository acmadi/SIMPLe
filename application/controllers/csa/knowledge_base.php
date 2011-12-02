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
		
        $data['title'] 		= 'Knowledge Base';
        $data['content'] 	= 'csa/knowledge/knowledge_base';
		$data['categories'] = $this->knowledge->get_all_category();
        $this->load->view('csa/template', $data);
        /*}
          else
          {
              $this->load->view('login/login_view');
          }*/
    }
	
	function search_knowledge(){
		$this->form_validation->set_rules('fkat', 'Kategori', 'required|numeric');
		if ($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('msg',"<div style='color:red;'>".validation_errors()."</div>");
			redirect('/csa/knowledge_base');
		}
		else
		{	
			$category 	= $this->input->post('fkat', TRUE);
			$this->load->model('Mknowledge', 'knowledge');
			$item 				= $this->knowledge->search_by_category($category,'LIMIT 0,3');
			$data['title'] 		= 'Knowledge Base';
			$data['content'] 	= 'csa/knowledge/knowledge_base';
			$data['categories'] = $this->knowledge->get_all_category();
			$data['result']		= $item;
			$data['sel']		= 1;
			$data['idsearch']	= $category;
			$this->load->view('csa/template', $data);
		}
	}
	
	function search_all(){
		$cat = $this->uri->segment(4, '');
		$limit = $this->uri->segment(5, '');
		
		if(!empty($cat) OR !empty($limit)){
			$this->load->model('Mknowledge', 'knowledge');
			$item 				= $this->knowledge->search_by_category($cat);
			$data['title'] 		= 'Knowledge Base';
			$data['content'] 	= 'csa/knowledge/knowledge_base';
			$data['categories'] = $this->knowledge->get_all_category();
			$data['result']		= $item;
			$data['idsearch']	= $cat;
			$data['sel']		= 2;
			$this->load->view('csa/template', $data);
		}
		
	}
	
	
}

?>