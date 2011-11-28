<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends Model
{
    /**
     * Constructor
     */
    function Login_model()
    {
        parent::Model();
    }

    // Inisialisasi nama tabel user
    var $table = 'user';

    /**
     * Cek tabel user, apakah ada user dengan username dan password tertentu
     */
    function check_user($username, $password)
    {
        $query = $this->db->get_where($this->table, array('username' => $username, 'password' => sha1($password)), 1, 0);


        if ($query->num_rows() > 0) {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    function getuser($level)
    {
        $this->db->select('level');
        $this->db->from('user');
        $query = $this->db->get();
        return $query;
    }

}

// END Login_model Class

/* End of file login_model.php */
/* Location: ./system/application/model/login_model.php */
?>
