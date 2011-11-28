<?php
class Cpanel extends CI_Controller
{

    function Cpanel()
    {
        parent::__construct();
    }

    function index()
    {
        redirect('admin/dashboard');
    }
}

?>