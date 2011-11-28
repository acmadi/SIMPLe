<?php
class Satpam extends CI_Controller
{

    function Satpam()
    {
        parent::__construct();
    }

    function index()
    {
        redirect('satker/dashboard');
    }
}

?>