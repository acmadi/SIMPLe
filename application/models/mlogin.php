<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Mlogin extends CI_Model
{

    public function cekdb($user, $pass)
    {
        $query = $this->db->from('tb_user')
                      ->where('username', $user)
                      ->where('password', md5($pass))
                      ->join('tb_lavel', 'tb_lavel.id_lavel = tb_user.id_lavel')
                      ->get();

        if ($query->num_rows() == 1) {
            $query = $query->result();
            return $query[0];
        }
    }

    public function getdropdownsup()
    {
        $dbres = $this->db->get('tb_lavel');
        $ddmenu = array();
        foreach ($dbres->result_array() as $tablerow) {
            $ddmenu[0] = '--Choose Mode--';
            $ddmenu[$tablerow['levelname']] = $tablerow['levelname'];
        }
        return $ddmenu;
    }

    public function getsupply($id)
    {
        $data = array();
        $options = array('id' => $id);
//        $Q = $this->db->get_where('member', $options, 1);
//        if ($Q->num_rows() > 0) {
//            $data = $Q->row_array();
//        }
//        $Q->free_result();
        return $data;
    }
}

?>
