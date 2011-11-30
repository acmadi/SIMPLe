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
        $data['optionlist'] = $this->mlogin->getdropdownsup();
        $this->load->view("login", $data);
    }

    public function usermasuk()
    {
        $user = $this->input->post('user');
        $pass = $this->input->post('pass');

        $login_data = $this->mlogin->cekdb($user, $pass);

        if ($login_data) {

            $this->session->set_userdata('user', $login_data->user);
            $this->session->set_userdata('level', $login_data->level);

            switch ($login_data->level) {
                case 'admin':
                    redirect('admin/dashboard');
                    break;
                case 'cs':
                    redirect("{$login_data->user}/dashboard");
                    break;
                case 'halodja':
                    redirect('halodja/dashboard');
                    break;
                case 'supervisor':
                    redirect('supervisor/dashboard');
                    break;
                case 'pelaksana':
                    redirect('pelaksana/dashboard');
                    break;
                case 'kasubdit':
                    redirect('kasubdit/dashboard');
                    break;
                case 'direktur':
                    redirect('direktur/dashboard');
                    break;
                case 'dirjen':
                    redirect('dirjen/dashboard');
                    break;
                case 'satker':
                    redirect('satker/dashboard');
                    break;
            }
        } else {
            $this->session->set_flashdata('error', 'Login gagal');
            redirect('/');
        }

    }

    public function process_logout()
    {
        $this->session->unset_userdata('user');
        $this->session->unset_userdata('level');
        $this->session->sess_destroy();
        unset($_SESSION);
        $this->session->set_flashdata("anda telah berhasil logout");
        redirect("login");

    }
}