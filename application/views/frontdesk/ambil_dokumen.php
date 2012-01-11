<meta http-equiv="refresh" content="10; url=<?php echo site_url('/frontdesk/ambil_dokumen')  ?>">

<div id="konten">

    <h1>Daftar Pengambilan Dokumen</h1>
    <div class="table">
        <div id="head">
            <form id="form-cari" action="<?php echo site_url('/frontdesk/ambil_dokumen/index');?>" method="post">
                <input id="teks-cari" type="text" placeholder="Pencarian" name="keyword" value="<?php echo $isian_form;?>"/> <input type="submit" value="Cari" class="button blue-pill"/>
				<a href="<?php echo site_url('/frontdesk/ambil_dokumen/index');?>" class="button gray-pill">Reset</a>
            </form>
        </div>

        <div id="tail">
            <div class="tab">
                <table id="tableOne" class="yui">
                    <thead>
                    <tr>
                        <th class="short">No Tiket</th>
                        <th class="short">Tanggal</th>
						<th class="short">Kode Unit</th>
						<th class="short">Nama Unit</th>
                        <th class="short">Kode Satker</th>
                        <th>Nama Satker</th>
                        <th class="short">Status</th>
                        <th class="action">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($result as $value): ?>
                    <tr>
                        <td class="short"><?php echo sprintf('%05d', $value->no_tiket_frontdesk) ?></td>
                        <td class="short"><?php echo $value->tanggal ?></td>
						<td class="short"><?php echo $value->id_unit ?></td>
						<td class="short"><?php echo $value->nama_unit ?></td>
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
        <div class="pagination"><?php echo ($pageLink)?'Halaman '.$pageLink:'';?></div><br />
        <br/>
    </div>
</div>