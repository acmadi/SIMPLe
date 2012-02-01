<?php
class Profiler extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (ENVIRONMENT != 'production')
            $this->output->enable_profiler(TRUE);
    }
}
