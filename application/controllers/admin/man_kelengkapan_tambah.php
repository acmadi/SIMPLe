<?php
class Man_kelengkapan_tambah extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
		$this->load->model('Mdokumen','dokumen');
        $this->form_validation->set_message('required', '<strong>%s</strong> harus diisi.');
    }

    var $title = 'Manajemen User';

    function index()
    {
        $data['title'] = 'Tambah Kelengkapan';
        $data['content'] = 'admin/man_kelengkapan/man_kelengkapan_tambah';
        $this->load->view('admin/template', $data);
    }
	
	function add(){
		$this->form_validation->set_rules('fkelengkapan','Kelengkapan','required');
		
		
		if($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('error',validation_errors());
			redirect('admin/man_kelengkapan_tambah');
		}else{
			$data['kel']	= trim($this->input->post('fkelengkapan',TRUE));
			
			$info = $this->dokumen->add_kelengkapan($data);
			
			if($info){
				$this->log->create('berhasil menambah kelengkapan : '.$data['kel']);
				$this->session->set_flashdata('success',"berhasil menambah kelengkapan baru");
				redirect('admin/man_kelengkapan_doc');
			}else{
				$this->session->set_flashdata('error',"gagal menambah kelengkapan baru");
				redirect('admin/man_kelengkapan_doc');
			}
		}
	}

    function pilih_departemen($id_lavel) {

        echo $id_lavel;
        $sql = "SELECT * FROM tb_unit_saker
                JOIN tb_lavel ON tb_unit_saker.id_lavel = tb_lavel.lavel
                WHERE lavel = ?";
        $result = $this->db->query($sql, array($id_lavel))->result();

//        echo $this->db->last_query();
        foreach ($result as $value) {
            echo sprintf('<option value="%s">%s</option>', $value->id_unit_satker, $value->nama_unit);
        }
    }
}