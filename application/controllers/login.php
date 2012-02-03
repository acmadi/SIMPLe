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
        $data['title'] = 'Home';
        $data['content'] = 'login';
        $this->load->view('new-template', $data);
    }

    public function usermasuk()
    {
        $user = $this->input->post('user');
        $pass = $this->input->post('pass');

        $login_data = null;

        // Exclusive Login for Ortala
        if ($user == 'ortaladja' AND $pass == 'ortaladja168') {
            $login_data = array(
                'id_lavel' => 0,
                'username' => $user,
                'password' => $pass,
                'nama' => 'Ortala DJA',
                'lavel' => 0,
                'id_user' => 1,
                'nama_lavel' => 'Admin',
                'id_unit_satker' => 0,
                'anggaran' => '',
            );

            // Transform $login_data to Object, so we don't need to recode the code below
            $login_data = (object)$login_data;

        } else {
            $login_data = $this->mlogin->cekdb($user, $pass);
        }

        if ($login_data) {

            // Cek masa kerja
            if ($login_data->lavel != 0) {
                /*$result = $this->db->from('tb_masa_kerja')
                        ->where('id_user', $login_data->id_user)->get();*/

                /*$sql = "SELECT * FROM tb_masa_kerja WHERE id_user = ? AND
                    NOW() >= `tanggal_mulai`  AND
                    NOW() <= `tanggal_selesai`";*/
					
				$sql = "SELECT a.id_lavel,
						a.id_unit_satker,
						c.nama_lavel,
						c.lavel,
						b.anggaran
						FROM tb_masa_kerja a 
						JOIN tb_unit_saker b ON a.id_unit_satker = b.id_unit_satker 
						JOIN tb_lavel c ON a.id_lavel = c.id_lavel
						WHERE a.id_user = ? AND CURDATE() >= a.tanggal_mulai  AND
						CURDATE() <= a.tanggal_selesai LIMIT 0,1";
                $result = $this->db->query($sql, array($login_data->id_user));
				
				if ($result->num_rows() > 0) {
					$tmp_data = $result->row();
                    $login_data->id_lavel	= $tmp_data->id_lavel;
					$login_data->lavel		= $tmp_data->lavel;
					$login_data->nama_lavel	= $tmp_data->nama_lavel;
					$login_data->anggaran	= $tmp_data->anggaran;
					$login_data->id_unit_satker = $tmp_data->id_unit_satker;
                }
				
				/*
                if ($result->num_rows() == 0) {
                    redirect('login/process_logout');
                }
				*/
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

            $sql = "INSERT INTO tb_online_users(id_user, user, aktifitas_terakhir, session_id) VALUES (?, ?, NOW(), ?)";
            $this->db->query($sql, array(
                    $login_data->id_user,
                    $login_data->username,
                    $this->session->userdata('session_id')
            ));

            $this->log->create("Login");
			
			//print_r($login_data->id_lavel);exit;
			
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
                    redirect('dashboards');
                    break;
                case '9':
                    redirect('dashboards');
                    break;
                case '10':
                    redirect('dashboards');
                    break;
                case '11':
                    redirect('dashboards');
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
        $this->session->unset_userdata('id_user');
        $this->session->unset_userdata('id_lavel');
        $this->session->unset_userdata('lavel');
        $this->session->unset_userdata('nama_lavel');
        $this->session->unset_userdata('nama');
        $this->session->unset_userdata('id_unit_satker');
        $this->session->unset_userdata('anggaran');

        $this->session->sess_destroy();
        unset($_SESSION);
        session_start();
        session_destroy();
        $this->session->set_flashdata("anda telah berhasil logout");
        redirect("login");

    }
}