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
		$kontrl = $this->uri->segment(1);
		//print_r($kontrl);
		
		$kontrl = $this->uri->segment(1);
		
		if (($kontrl != 'login') AND ($kontrl != 'tiket') ) {
			$do_logout = false;
			$result_cek_ol 		= $this->db->query("SELECT user FROM tb_online_users WHERE ( (MINUTE(TIMEDIFF(NOW(),aktifitas_terakhir))) < 30) AND user = ? AND session_id = ?", array($this->session->userdata('user'),$this->session->userdata('session_id')));
			
			if(!$this->session->userdata('user')) $do_logout = true;
			if($result_cek_ol->num_rows() < 1){
				$do_logout = true;
			}
			
			if($do_logout){
				//$tmp_sess_now = $this->session->userdata('session_id');
				//$this->db->query("DELETE FROM tb_online_users WHERE user = ? AND session_id != ?", array($this->session->userdata('user'),$tmp_sess_now));
				$this->session->sess_destroy();
				//$this->session->set_flashdata('error', 'Session habis : '.$tmp_sess_now);
				
				redirect('/login');
			}else{
				$this->db->query("UPDATE tb_online_users SET aktifitas_terakhir = NOW() WHERE user = ?", array($this->session->userdata('user')));
			}
		}
		
		
    }
}