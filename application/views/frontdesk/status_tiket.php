<div class="content">

    <h1>Status Tiket</h1>

    <div class="table">
        <div id="head">
        <form id="form-cari" action="<?php echo site_url('/frontdesk/status_tiket/index');?>" method="post">
        <input id="teks-cari" type="text" placeholder="Pencarian" name="keyword" value="<?php echo $isian_form;?>" /> 
		<input type="submit" value="Cari" class="button blue-pill" />
		<a href="<?php echo site_url('/frontdesk/status_tiket/index');?>" class="button gray-pill">Reset</a>
        </form>
       	</div>

    <div id="tail">
    <div class="tab">
		<table id="tableOne" class="yui">
			<thead>
				<tr>
					<th class="short">No Tiket</th>
					<th class="short">Tanggal</th>
                    <th class="short">Kode Eselon</th>
                    <th class="short">Nama Eselon</th>
                    <th class="short">Kode Satker</th>
                    <th>Nama Satker</th>
                    <th class="short">Status Tiket</th>
                    <th class="short">Status Dokumen</th>
				</tr>
			</thead>
            <tfoot>
                <tr>
                    <td colspan="8">&nbsp;</td>
                </tr>
            </tfoot>
			<tbody>
            <?php foreach ($result as $value): ?>
				<tr>
					<td class="short"><?php echo sprintf('%05d', $value->no_tiket_frontdesk) ?></td>
					<td class="short"><?php echo table_tanggal($value->tanggal) ?></td>
					<td class="short"><?php echo $value->id_unit ?></td>
					<td class="short"><?php echo $value->nama_unit ?></td>
					<td class="short"><?php echo $value->id_satker ?></td>
					<td><?php echo $value->nama_satker ?></td>
					<td class="short"><?php echo $value->status ?></td>
                    <td class="short">
                        <?php
							switch($value->is_active){
								case '1':
									echo 'diterima '.$value->nama_lavel;
									break;
								case '2':
									echo 'diteruskan ke '.$value->nama_lavel;
									break;
								case '3':
									echo 'dikembalikan '.$value->nama_lavel;
									break;
								case '4':
									echo 'diterima '.$value->nama_lavel;
									break;
								case '5':
									echo 'diteruskan ke '.$value->nama_lavel;
									break;
								case '6':
									echo 'disetujui '.$value->nama_lavel;
									break;
								default :
									echo '-';
									break;
							}
                        ?>
                    </td>
				</tr>
            <?php endforeach ?>
			</tbody>
		</table>
	</div>
</div>
		<div class="pagination"><?php echo ($pageLink)?'Halaman '.$pageLink:'';?></div><br />
            </div>
        </div>