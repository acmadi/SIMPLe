<?php
class Mforum extends CI_Model
{
    public function get($parent_only = FALSE){
		$this->load->library('pagination');
		
		$cond = ($parent_only) ? 'WHERE id_parent IS NULL' : '';	
		$sql = "SELECT * FROM `tb_forum` LEFT JOIN tb_kat_forum ON (tb_forum.id_kat_forum = tb_kat_forum.id_kat_forum)";
		$query = $this->db->query($sql);

		$config['base_url'] = site_url('admin/man_forum/index');
		$config['total_rows'] = $query->num_rows();
		$config['per_page'] = 50;
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config);

		$offset = (int) $this->uri->segment(4, 0);
		
		$sqlb = "SELECT * FROM `tb_forum` LEFT JOIN tb_kat_forum ON (tb_forum.id_kat_forum = tb_kat_forum.id_kat_forum) $cond LIMIT ?,?";
		
		$data["query"] = $this->db->query($sqlb, array($offset ,$config['per_page']));

		$data['pagination1'] = $this->pagination->create_links();

		return $data;
	}
	public function get_parents()
	{
		return $this->get(TRUE);
	}
	
	public function get_by_keyword($keyword){
		$where = (!empty($keyword))?" WHERE judul_forum LIKE '%".$keyword."%' OR isi_forum LIKE '%".$keyword."%'":'';
		
		$this->load->library('pagination');		
		$sql = "SELECT * FROM `tb_forum` LEFT JOIN tb_kat_forum ON (tb_forum.id_kat_forum = tb_kat_forum.id_kat_forum) $where";
		$query = $this->db->query($sql);

		$config['base_url'] = site_url('admin/man_forum_cari/index');
		$config['total_rows'] = $query->num_rows();
		$config['per_page'] = 50;
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config);

		$offset = (int) $this->uri->segment(4, 0);
		
		$sqlb = "SELECT * FROM `tb_forum` LEFT JOIN tb_kat_forum ON (tb_forum.id_kat_forum = tb_kat_forum.id_kat_forum) $where LIMIT ?,?";
		
		$data["query"] = $this->db->query($sqlb, array($offset ,$config['per_page']));

		$data['pagination1'] = $this->pagination->create_links();

		return $data;
	}
	
    public function get_categories()
    {
        $sql = "SELECT * FROM tb_kat_forum ORDER BY kat_forum ASC";
        return $this->db->query($sql);
    }

    public function get_childs($id_parent)
    {
    	// c = child
    	// p = parent
    	return $this->db->query(
	    	"SELECT f.*, u.nama AS nama FROM tb_forum f LEFT JOIN tb_user u
             ON (f.id_user = u.id_user)
             WHERE f.id_parent = '$id_parent'
	    	 ORDER BY tanggal ASC"
	    	)->result();	
    }
    public function count_forums()
    {
    	$this->db->where('id_parent', NULL);
		$this->db->from('tb_forum');
		return $this->db->count_all_results();
    }
    public function count_childs($id_parent)
    {
    	$this->db->where('id_parent', $id_parent);
		$this->db->from('tb_forum');
		return $this->db->count_all_results();
    }

    public function add_forum($id_kat_forum, $judul_forum, $isi_forum, $file = '', $id_user=NULL)
    {
        $sql = "INSERT INTO tb_forum (id_kat_forum, judul_forum, isi_forum, file, id_user)
                VALUES (?, ?, ?, ?, ?)";
        return $this->db->query($sql, array($id_kat_forum, $judul_forum, $isi_forum, $file, $id_user));
    }

    public function add_forum_by_array($arr)
    {
    	return $this->db->insert('tb_forum', $arr);
    }
	
	public function update_forum($id_kat_forum, $judul_forum, $isi_forum, $file = '',$id){
		$where =  (!empty($file))?" , file = '".$file."' ":''; 
		$sql = "UPDATE tb_forum SET id_kat_forum = ?, judul_forum = ?, isi_forum = ? $where WHERE id_forum = ?";
        return $this->db->query($sql, array($id_kat_forum, $judul_forum, $isi_forum, $id)); 
	}
	
	public function update_kategori($j,$i){
		return $this->db->query("UPDATE tb_kat_forum SET kat_forum = ? WHERE id_kat_forum =?",array($j,$i));
	}

    public function get_one($id)
    {
        $sql = "SELECT * FROM `tb_forum` LEFT JOIN tb_kat_forum ON (tb_forum.id_kat_forum = tb_kat_forum.id_kat_forum) WHERE id_forum = '{$id}'";
        return $this->db->query($sql);
    }
	public function get_all()
	{
		$sql = 
			"SELECT f.*, u.nama AS nama, k.kat_forum AS kat_forum FROM tb_forum f 
			 LEFT JOIN tb_user u
             ON (f.id_user = u.id_user)
             LEFT JOIN tb_kat_forum k
             ON (f.id_kat_forum = k.id_kat_forum)
             ORDER BY f.tanggal DESC"
             ;
		return $this->db->query($sql);
	}
	public function get_one_with_poster($id)
	{
		$sql = 
			"SELECT f.*, u.nama AS nama FROM tb_forum f LEFT JOIN tb_user u
             ON (f.id_user = u.id_user)
             WHERE f.id_forum = $id";
		return $this->db->query($sql);
	}
	public function get_by_id($id){
		return $this->db->query("SELECT a.id_forum,b.kat_forum, a.judul_forum, a.isi_forum, a.file, a.id_kat_forum
								FROM tb_forum a, tb_kat_forum b WHERE a.id_kat_forum = b.id_kat_forum AND a.id_forum = ?",array($id))->row();
	}
	
	public function get_kategori_by_id($id){
		return $this->db->query("SELECT id_kat_forum, kat_forum FROM tb_kat_forum WHERE id_kat_forum = ?",array($id))->row();
	}
	
	public function get_nama_file($id){
		return $this->db->query("SELECT file FROM tb_forum WHERE id_forum = ? ",array($id))->row();
	}
}