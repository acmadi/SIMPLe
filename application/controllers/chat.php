<?php
class Chat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        if ($_POST) {
            $sql = "INSERT INTO tb_chat (id_user, message, created) VALUES (?, ?, NOW())";
            $this->db->query($sql, array(
                $this->session->userdata('id_user'),
                $this->input->post('message')
            ));
            redirect('chat');
        }

        $sql = "DELETE FROM tb_chat WHERE created < DATE_SUB(NOW(), INTERVAL 30 MINUTE)";
        $this->db->query($sql);

        $sql = "SELECT *
                FROM tb_chat a
                JOIN tb_user b ON a.id_user = b.id_user
                ORDER BY created DESC
                LIMIT 30
                ";
        $messages = $this->db->query($sql);

        $data['messages'] = $messages;
        $this->load->view('chat/index', $data);
    }

    public function add()
    {

    }

    public function load_message()
    {

    }
}