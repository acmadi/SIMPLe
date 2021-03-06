<?php
class Akses_kontrol extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Makses', 'akses');
        $this->form_validation->set_message('required', '<strong>%s</strong> harus diisi.');
    }

    var $title = 'Akses Kontrol';

    function index()
    {
        /*if ($this->session->userdata('login') == TRUE)
          {*/

        $data['list_kontrol'] = $this->akses->get_all();
        $data['title'] = 'Akses Kontrol';
        $data['content'] = 'admin/akses_kontrol/akses_kontrol';

        $bc[0]->link = 'admin/dashboard';
        $bc[0]->label = 'Home';
        $bc[1]->link = 'admin/akses_kontrol';
        $bc[1]->label = 'Akses Kontrol';
        $data['breadcrumb'] = $bc;

        $this->load->view('admin/template', $data);
        /*}
          else
          {
              $this->load->view('login/login_view');
          }*/
    }

    /**
     * Update only. There's no add new access control.
     *
     * @param $id integer
     * @return void
     */
    function update()
    {
            $this->form_validation->set_rules('fid', 'ID', 'required|numeric');
            $this->form_validation->set_rules('fnamalevel', 'Nama Level', 'required');

            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('error', validation_errors());
                redirect('/admin/akses_kontrol/view_form');
            }
            else
            {
                $data['fid'] = $this->input->post('fid', TRUE);
                $data['fnamalevel'] = $this->input->post('fnamalevel', TRUE);
	
                $this->load->model('Makses', 'akses');
                $info = $this->akses->update_akses($data);
                if ($info) {
                    $this->session->set_flashdata('success', "Akses baru telah diubah!");
                } else {
                    $this->session->set_flashdata('error', "Akses baru gagal diubah!");
                }
                redirect('/admin/akses_kontrol');
            }
    }

    public function delete($id)
    {
        $info = $this->akses->delete($id);

        switch ($info) {
            case 1:
                $this->session->set_flashdata('success', "Berhasil dihapus");
                break;
            case 2:
                $this->session->set_flashdata('error', "Gagal dihapus");
                break;
            default:
                $this->session->set_flashdata('warning', "Terdapat keterkaitan dengan data lain");
                break;
        }

        redirect('/admin/akses_kontrol');
    }

    function view_form()
    {
        $data1['fid'] = $this->input->post('fid', TRUE);
        $data1['fnamalevel'] = $this->input->post('fnamalevel', TRUE);

        $data['tambah'] = (object)$data1;
        $data['title'] = 'Akses Kontrol';
        $data['content'] = 'admin/akses_kontrol/akses_kontrol_tambah';
        $this->load->view('admin/template', $data);

    }

    function edit($id)
    {
        $data['title'] = 'Akses Kontrol - Ubah';
        $data['content'] = 'admin/akses_kontrol/akses_kontrol_ubah';
        $result = $this->db->query("SELECT * FROM tb_lavel WHERE id_lavel = ?",array($id));
        $result = $result->result();
        $data['ubah'] = $result[0];

        $bc[0]->link = 'admin/dashboard';
        $bc[0]->label = 'Home';
        $bc[1]->link = 'admin/akses_kontrol';
        $bc[1]->label = 'Akses Kontrol';
        $bc[2]->link = $this->uri->uri_string();
        $bc[2]->label = 'Edit Lavel: ' . $result[0]->nama_lavel;
        $data['breadcrumb'] = $bc;
        $this->load->view('admin/template', $data);
    }

    function view($id)
    {
		$data['info_kontrol'] = $this->akses->get_info_kontrol($id);
        $data['list_kontrol'] = $this->akses->get_all_users_by_level($id);
        $data['title'] = 'Akses Kontrol - Ubah';
        $data['content'] = 'admin/akses_kontrol/akses_kontrol_lihat';

        $bc[0]->link = 'admin/dashboard';
        $bc[0]->label = 'Home';
        $bc[1]->link = 'admin/akses_kontrol';
        $bc[1]->label = 'Akses Kontrol';
        $bc[2]->link = $this->uri->uri_string();
        $bc[2]->label = 'Lihat Lavel';
        $data['breadcrumb'] = $bc;
        $this->load->view('admin/template', $data);
    }
	
	function reset_password(){
		$user	= trim($this->uri->segment(4,''));
		$level	= trim($this->uri->segment(5,''));
		
		if(!empty($user)){
			$info = $this->akses->reset_password($user);
			if($info){
				$this->session->set_flashdata('success',"berhasil reset password");
				redirect('admin/akses_kontrol/view/'.$level);
			}else{
				$this->session->set_flashdata('error',"gagal reset password");
				redirect('admin/akses_kontrol/view'.$level);
			}
		}
	}
	
	function delete_user(){
		$user	= trim($this->uri->segment(4,''));
		$level	= trim($this->uri->segment(5,''));
		
		if(!empty($user)){
			$info = $this->akses->delete_user($user);
			if($info){
				$this->session->set_flashdata('success',"berhasil menghapus user");
				redirect('admin/akses_kontrol/view/'.$level);
			}else{
				$this->session->set_flashdata('error',"gagal menghapus user");
				redirect('admin/akses_kontrol/view'.$level);
			}
		}
	}
	
	

}

?>