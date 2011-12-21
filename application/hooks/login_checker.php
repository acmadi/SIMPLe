<?php
class Login_checker extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Paksa user yang tidak berwenang untuk tidak masuk
     *
     * @return void
     */
    public function login_checker()
    {

//        if ($this->uri->segment(1) == 'satker' AND $this->uri->segment(2) != 'form_revisi_anggaran') {
//            echo "asdasdsa";
//            redirect('/frontdesk/form_revisi_anggaran');
//        }

        if ($this->uri->segment(2) != 'form_revisi_anggaran') {

            if ($this->uri->segment(1) != 'login' AND !$this->session->userdata('user')) {
                $this->session->sess_destroy();
                redirect('/login');
            }

            if ($this->uri->segment(1) != 'login' AND $this->session->userdata('user')) {

                if ($this->uri->segment(1) != $this->session->userdata('user')) {
                    $this->session->sess_destroy();
                    redirect('/login');
                }

            }
        }


    }
}