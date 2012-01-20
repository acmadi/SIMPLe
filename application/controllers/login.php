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
        $data['content'] = 'login';
        $this->load->view('new-template', $data);
    }

    public function usermasuk()
    {
        $user = $this->input->post('user');
        $pass = $this->input->post('pass');


        $login_data = $this->mlogin->cekdb($user, $pass);

        if ($login_data) {

            // Cek masa kerja
            if ($login_data->lavel != 0) {
                $result = $this->db->from('tb_masa_kerja')
                        ->where('id_user', $login_data->id_user)->get();

                $sql = "SELECT * FROM tb_masa_kerja WHERE id_user = ? AND
                    NOW() >= `tanggal_mulai`  AND
                    NOW() <= `tanggal_selesai`";
                $result = $this->db->query($sql, array($login_data->id_user));

                if ($result->num_rows() == 0) {
                    redirect('login/process_logout');
                }
            }


            $this->db->query("DELETE FROM tb_online_users WHERE user = ?", array($login_data->username));

            $this->session->set_userdata('user', $login_data->username);
            $this->session->set_userdata('id_user', $login_data->id_user);
            $this->session->set_userdata('id_lavel', $login_data->id_lavel);
            $this->session->set_userdata('lavel', $login_data->lavel);
            $this->session->set_userdata('nama_lavel', $login_data->nama_lavel);
            $this->session->set_userdata('nama', $login_data->nama);
            $this->session->set_userdata('id_unit_satker', $login_data->id_unit_satker);
            $this->session->set_userdata('anggaran', $login_data->anggaran);

            $this->db->query("INSERT INTO tb_online_users(USER,aktifitas_terakhir) VALUES (?,NOW())", array($login_data->username));

            $this->log->create("Login");

            switch (strtolower($login_data->id_lavel)) {
                case '1':
                    redirect('admin/dashboard');
                    break;
                case '2':
                    redirect("helpdesks/dashboard");
                    break;
                case '3':
                    redirect("frontdesk/dashboard");
                    break;
                case '4':
                    redirect("cs/dashboard");
                    break;
                case '5':
                    redirect("pengaduan/dashboard");
                    break;
                case '6':
                    redirect('halodja/dashboard');
                    break;
                case '7':
                    redirect('supervisors/dashboard');
                    break;
                case '8':
                    redirect('pelaksana/dashboard');
                    break;
                case '9':
                    redirect('kasubdit/dashboard');
                    break;
                case '10':
                    redirect('kasubdit_dadutek/dashboard');
                    break;
                case '11':
                    redirect('direktur/dashboard');
                    break;
                case '12':
                    redirect('dirjen/dashboard');
                    break;
                case '13':
                    redirect('kb_koordinator/dashboard');
                    break;
                case '14':
                    redirect('admin_pengaduan/dashboard');
                    break;
            }
        } else {
            $this->session->set_flashdata('error', 'Login gagal');
            redirect('/');
        }

    }

    public function process_logout()
    {
        $this->log->create("Logout");
        $this->db->query("DELETE FROM tb_online_users WHERE user = ?", array($this->session->userdata('user')));
        $this->session->unset_userdata('user');
        $this->session->unset_userdata('level');
        $this->session->sess_destroy();
        unset($_SESSION);
        session_start();
        session_destroy();
        $this->session->set_flashdata("anda telah berhasil logout");
        redirect("login");

    }
}