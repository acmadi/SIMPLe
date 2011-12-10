<?php
class Log
{
    public $CI;

    public function __construct()
    {
        $this->CI =& get_instance();
    }

    /**
     * Buat user log.
     * Data disimpan didalam table tb_logs atau file juga?!?
     *
     * Format:
     * [Tanggal] [User]: [Pesan]
     *
     * Example:
     * 2011-12-10 12:04:30 csa: Melakukan ekskalasi ke supervisor - tiket #022
     *
     * @param $message String
     * @return void
     */
    public function create($message)
    {
        $this->CI->load->library('session');
        $date = date('Y-m-d H:i:s');
        $user = $this->CI->session->userdata('user');
        
        if (ENVIRONMENT == 'development') {
            $log = sprintf("%s %s: %s", $date, $user, $message);
            //echo $log;
        }

        $data = array(
            'created' => $date,
            'user' => $user,
            'message' => $message
        );
        $this->CI->db->insert('tb_logs', $data);
    }
}