<?php
class Email extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('file');
    }

    function index()
    {
        $file = "<?php\n";
        $file .= "\$config['protocol'] = 'smtp';\n";
        $file .= "\$config['mailtype']  = 'html';\n";
        $file .= "\$config['crlf']  = \"\\r\\n\";\n";
        $file .= "\$config['newline']  = \"\\r\\n\";\n";
        if ($_POST) {
            foreach ($_POST as $key => $value) {
                $file .= sprintf("\$config['%s'] = '%s';\n", $key, $value);
            }
            $file .= "?>";
            write_file(FCPATH . 'application/config/email.php', $file);
        }

        $this->load->config('email');

        $data['email_config'] = array(
            'smtp_host' => $this->config->item('smtp_host'),
            'smtp_user' => $this->config->item('smtp_user'),
            'smtp_pass' => $data['email_config'] = $this->config->item('smtp_pass'),
            'port' => $data['email_config'] = $this->config->item('port'),
        );

        $data['title'] = 'Daftar Referensi';
        $data['content'] = 'admin/email';

        $bc[0]->link = 'admin/dashboard';
        $bc[0]->label = 'Home';
        $bc[1]->link = 'admin/email';
        $bc[1]->label = 'Email';
        $data['breadcrumb'] = $bc;

        $this->load->view('admin/template', $data);
    }
}