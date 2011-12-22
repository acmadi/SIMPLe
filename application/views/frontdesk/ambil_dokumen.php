<div id="konten">


    <div class="table">
        <div id="head">
        <form id="form-cari" action="list_antrian_cari">
        <input id="teks-cari" type="text" placeholder="Pencarian" /> <input type="submit" value="Cari" class="button blue-pill" />
        </form>
       	</div>

    <div id="tail">
    <div class="tab">
		<table id="tableOne" class="yui">
			<thead>
				<tr>
					<th class="short">No Tiket</th>
					<th class="short">Tanggal</th>
                    <th class="short">Kode Satker</th>
                    <th>Nama Satker</th>
                    <th class="short">Status</th>
					<th class="action">Aksi</th>
				</tr>
			</thead>
			<tbody>
            <?php foreach ($dokumen->result() as $value): ?>
				<tr>
					<td class="short"><?php echo sprintf('%05d', $value->no_tiket_frontdesk) ?></td>
					<td class="short"><?php echo $value->tanggal ?></td>
					<td class="short"><?php echo $value->id_satker ?></td>
					<td><?php echo $value->nama_satker ?></td>
					<td class="short"><?php echo $value->status ?></td>
		            <td class="action">
		            	<a href="<?php echo site_url('/frontdesk/ambil_dokumen/cetak/' . $value->no_tiket_frontdesk) ?>" class="button blue-pill">Ambil Dokumen</a>
		            </td>
				</tr>
            <?php endforeach ?>
			</tbody>
		</table>
	</div>
</div>
<div class="pagination">Halaman <a href="#"><<</a> <a href="#">1</a> <a href="#">2</a> <a href="#">3</a> <a href="#">4</a> <a href="#">5</a> <a href="#">6</a> <a href="#">>></a></div><br />
            </div>
        </div>