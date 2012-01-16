<?php
class Login_checker extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Paksa user yang tidak berwenang untuk tidak masuk
     *
     * @return void
     */
    public function login_checker()
    {
        //if ($this->uri->segment(2) != 'form_revisi_anggaran') {
            if ($this->uri->segment(1) != 'login') {
				$do_logout = false;
				
				$result_cek_ol = $this->db->query("SELECT user FROM tb_online_users WHERE MINUTE(TIMEDIFF(NOW(),aktifitas_terakhir)) > 30 AND user = ?", array($this->session->userdata('user')));
				
				if(!$this->session->userdata('user')) $do_logout = true;
				if($result_cek_ol->num_rows()>0) $do_logout = true;
				
				if($do_logout){
					$this->session->sess_destroy();
					$this->db->query("DELETE FROM tb_online_users WHERE user = ?", array($this->session->userdata('user')));
					redirect('/login');
					
				}else{
					$this->db->query("UPDATE tb_online_users SET aktifitas_terakhir = NOW() WHERE user = ?", array($this->session->userdata('user')));
				}
            }
        //}
    }
}