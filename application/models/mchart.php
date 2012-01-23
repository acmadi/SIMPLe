<?php 

class Mchart extends CI_Model{
		
	function __construct(){
		parent::__construct();
	}

	function get_helpdesk_table(){
		$sql = "SELECT DATE_FORMAT(tanggal,'%Y-%m-%d') AS tgl,
					   IF(id_satker IS NOT NULL, 'kl', 'umum') AS tipe,
				       COUNT(*) AS jumlah
				FROM tb_tiket_helpdesk
				GROUP BY tgl, tipe
				ORDER BY tgl DESC
				LIMIT 10
				";
		$rows = $this->db->query($sql)->result();

		$baru = array();

		foreach ($rows as $row) :

			$label = ($row->tgl == date('Y-m-d')) ? 'Hari Ini' : $row->tgl;
			if (! isset( $baru[$label] )) :
				$baru[$label] = (object) array('kl' => 0, 'umum' => 0);
			endif;

			if ($row->tipe == 'kl')
				$baru[$label]->kl = $row->jumlah;
			if ($row->tipe == 'umum')
				$baru[$label]->umum = $row->jumlah;
		endforeach;

		$baru = array_reverse($baru);

		echo '<table style="display: none" id="chartz-source">';
		echo '<thead>';
		echo ' <th></th>';
		echo ' <th>K/L</th>';
		echo ' <th>Umum</th>';
		echo '</thead>';
		
		echo '<tbody>';
		foreach ($baru as $idx => $row) :
			echo '<tr>';
			echo ' <th>'.$idx.'</th>';
			echo ' <td>'.$row->kl.'</td>';
			echo ' <td>'.$row->umum.'</td>';
			echo '</tr>';
		endforeach;
		echo '</tbody>';
		echo '</table>';
		// dump($rows);
	}

	function today($status)
	{
		$today = date('Y-m-d');
		$sql = "SELECT * FROM tb_tiket_helpdesk
				WHERE status = '{$status}'
				AND DATE_FORMAT(tanggal,'%Y-%m-%d') = '{$today}'";
		return $this->db->query($sql)->num_rows();
	}

	function tiket_terjawab()
	{
		$sql = "SELECT * FROM tb_tiket_helpdesk
				WHERE status='open'
				AND id_user != 0";
		return $this->db->query($sql)->num_rows();
	}

}

?>