<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
Class Login extends CI_Controller
{
    public function login()
    {
        parent::__construct();
        $this->load->model('mlogin');
    }

    public function index()
    {
        $this->load->view("login");
    }

    public function usermasuk()
    {
        $user = $this->input->post('user');
        $pass = $this->input->post('pass');
		
	
        $login_data = $this->mlogin->cekdb($user, $pass);

        if ($login_data) {
			
            $this->session->set_userdata('user', $login_data->username);
            $this->session->set_userdata('lavel', $login_data->nama_lavel);
            $this->session->set_userdata('id_user', $login_data->id_user);
            $this->session->set_userdata('nama', $login_data->nama);
			$this->log->create("Login");


//            print_r($login_data);


            switch ( strtolower($login_data->id_lavel) ) {
                case '1':
                    redirect('admin/dashboard');
                    break;
                case '2':
                    redirect("helpdesk/dashboard");
                    break;
                case '3':
                    redirect("frontdesk/dashboard");
                    break;
                case '4':
                    redirect("csd/dashboard");
                    break;
                case '5':
                    redirect("pengaduan/dashboard");
                    break;
                case '6':
                    redirect('halodja/dashboard');
                    break;
                case '7':
                    redirect('supervisor/dashboard');
                    break;
                case '8':
                    redirect('pelaksana/dashboard');
                    break;
                case '9':
                    redirect('kasubdit/dashboard');
                    break;
                case '10':
                    redirect('kasubdit_dadutek/dashboard');
                    break;
                case '11':
                    redirect('direktur/dashboard');
                    break;
                case '12':
                    redirect('dirjen/dashboard');
                    break;
            }
        } else {
            $this->session->set_flashdata('error', 'Login gagal');
            redirect('/');
        }

    }

    public function process_logout()
    {
		$this->log->create("Logout");
        $this->session->unset_userdata('user');
        $this->session->unset_userdata('level');
        $this->session->sess_destroy();
        unset($_SESSION);
        $this->session->set_flashdata("anda telah berhasil logout");
        redirect("login");

    }
}