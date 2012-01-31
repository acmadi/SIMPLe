<?php
class Login_status extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        if ($this->session->userdata('id_lavel')) {
            echo 'OK';
        }
    }
}