<?php
class Profiles extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('muser');

        $this->form_validation->set_message('required', '<strong>%s</strong> tidak boleh kosong');
        $this->form_validation->set_message('valid_email', '<strong>%s</strong> tidak benar');
        $this->form_validation->set_message('is_unique', '<strong>%s</strong> sudah digunakan');
        $this->form_validation->set_message('numeric', '<strong>%s</strong> harus berupa angka');
        $this->form_validation->set_message('matches', 'Password tidak sama');
        $this->form_validation->set_message('min_length', 'Jumlah karakter %s minimal %s');

    }

    public function index()
    {

        if ($this->input->post('submit') == 'profile') {

            $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
            $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
            $this->form_validation->set_rules('no_tlp', 'Telpon', 'required|trim|numeric');

            if ($this->form_validation->run() == TRUE) {

                $sql = "UPDATE tb_user SET nama = ?, email = ?, no_tlp = ? WHERE id_user = ?";

                $this->db->query($sql, array(
                    $this->input->post('nama'),
                    $this->input->post('email'),
                    $this->input->post('no_tlp'),
                    $this->session->userdata('id_user')
                ));

                $this->session->set_flashdata('success', 'Profil berhasil diubah');

            }

        }

        if ($this->input->post('submit') == 'password') {

            $this->form_validation->set_rules('password', 'Password', 'required|trim|matches[password2]|min_length[6]|md5');
            $this->form_validation->set_rules('password2', 'Ulangi Password', 'required|trim|email');

            if ($this->form_validation->run() == TRUE) {

                $sql = "UPDATE tb_user SET password = ? WHERE id_user = ?";

                $this->db->query($sql, array(
                    $this->input->post('password'),
                    $this->session->userdata('id_user')
                ));

                $this->session->set_flashdata('success', 'Password berhasil diubah');

            }

        }

        $sql = "SELECT * FROM tb_user WHERE id_user = ?";

        $result = $this->db->query($sql, array($this->session->userdata('id_user')))->row();

        $data['profile'] = $result;

        $data['title'] = 'Profil';
        $data['content'] = 'profiles';
        $this->load->view('new-template', $data);
    }
}