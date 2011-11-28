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

    public function cekuser()
    {
        $data['user'] = $this->input->POST('user');
        $data['pass'] = $this->input->POST('pass');
        $data['level'] = $this->input->post('level');

        $data['temukkan'] = $this->mlogin->cekdb();
        if ($data['temukkan'] == null) {
            return "no";
        } else {
            return "yes";
        }
    }

    public function usermasuk()
    {
        if ($this->cekuser() == "yes") {
            $data['user'] = $this->input->post('user');
            $data['level'] = $this->input->post('level');
            $newdata = array('username' => $data['user'], 'level' => $data['level'], 'status' => 'ok');
            $this->session->set_userdata($newdata);
            //$data['tampil']=$this->mlogin->get_by_id(member)->row();

            if ($data["level"] == "admin") {
                redirect('admin/dashboard');
            } elseif (($data["level"] == "cs") && ($data["user"] == "csa")) {
                redirect('csa/dashboard');
            } elseif (($data["level"] == "cs") && ($data["user"] == "csb")) {
                redirect('csb/dashboard');
            } elseif (($data["level"] == "cs") && ($data["user"] == "csc")) {
                redirect('csc/dashboard');
            } elseif (($data["level"] == "cs") && ($data["user"] == "csd")) {
                redirect('csd/dashboard');
            } elseif (($data["level"] == "cs") && ($data["user"] == "cse")) {
                redirect('cse/dashboard');
            } elseif (($data["level"] == "cs") && ($data["user"] == "halodja")) {
                redirect('halodja/dashboard');
            } elseif ($data["level"] == "supervisor") {
                redirect('supervisor/dashboard');
            } elseif ($data["level"] == "pelaksana") {
                redirect('pelaksana/dashboard');
            } elseif ($data["level"] == "kasubdit") {
                redirect('kasubdit/dashboard');
            } elseif ($data["level"] == "direktur") {
                redirect('direktur/dashboard');
            } elseif ($data["level"] == "dirjen") {
                redirect('dirjen/dashboard');
            } else {
                echo "error";
            }

        } else {
            echo "login gagal";
        }
    }

    public function gagallogin()
    {
        if ($this->cekuser() == "no") {
            echo "gagal login";
        }
    }

    public function process_logout()
    {
        $this->session->sess_destroy();
        redirect("login");
        echo "anda telah berhasil logout";
    }
}
