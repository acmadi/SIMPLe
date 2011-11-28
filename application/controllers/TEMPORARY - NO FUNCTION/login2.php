<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller
{
    /**
     * Constructor
     */
    function login()
    {
        parent::__construct();
        $this->load->model('Login_model', '', TRUE);
    }

    /**
     * Memeriksa user state, jika dalam keadaan login akan menampilkan halaman absen,
     * jika tidak akan meload halaman login
     */
    function index()
    {
        if ($this->session->userdata('login') == TRUE) {
            redirect('cpanel');
        }
        else
        {
            $this->load->view('login/login_view');
        }
    }

    /**
     * Memproses login
     */
    function process_login()
    {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == TRUE) {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $passwordEncript = sha1($password);

            if ($this->Login_model->check_user($username, $password) == TRUE) {
                $data = array('username' => $username, 'level', 'login' => TRUE);
                //$level=$this->array('level');
                $this->session->set_userdata($data);
                redirect('admin');

                $level = $data['level'];
                if ($level["1"] == "admin") {
                    redirect('admin');
                } elseif ($level["2"] == "cs") {
                    redirect('cs');
                } elseif ($level["3"] == "supervisor") {
                    //$this->load->view('admin/template_supervisor');
                    redirect('supervisor');
                } else {
                    echo "error";
                }

            }
            else
            {
                $this->session->set_flashdata('message', 'Maaf, username dan atau password Anda salah');
                redirect('login');
            }
        }
        else
        {
            $this->load->view('login/login_view');
        }
    }

    /**
     * Memproses logout
     */
    function process_logout()
    {
        $this->session->sess_destroy();
        redirect('login', 'refresh');
    }
}

// END Login Class

/* End of file login.php */
/* Location: ./system/application/controllers/login.php */
?>