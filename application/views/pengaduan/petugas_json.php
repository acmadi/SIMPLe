<?php header('Content-type: application/json'); 

echo '{"petugas": [';
if (is_array($petugas)) :

	for($i = 0; $i < count($petugas); $i++) :
		echo '{';
		echo '"id_petugas_satker": "' . $petugas[$i]->id_petugas_satker . '",';
		echo '"nama_petugas": "' . $petugas[$i]->nama_petugas . '",';
		echo '"jabatan_petugas": "' . $petugas[$i]->jabatan_petugas . '",';
		echo '"no_hp": "' . $petugas[$i]->no_hp . '"';
		echo '}';

		if ($i < count($petugas) - 1) :
			echo ', ';
		endif;
	endfor;
endif;
echo ']}';

?>