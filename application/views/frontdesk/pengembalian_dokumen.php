<div id="konten">

    <h1>Daftar Pengembalian Dokumen</h1>
	<?php
    // TODO: Satu paket ini untuk alerts. Nanti mau dipindah jadi hanya panggil satu method.
    if ($this->session->flashdata('success')) {
        echo '<div class="success">' . $this->session->flashdata('success') . '</div>';
    }
    if ($this->session->flashdata('error')) {
        echo '<div class="error">' . $this->session->flashdata('error') . '</div>';
    }
    if ($this->session->flashdata('notice')) {
        echo '<div class="notice">' . $this->session->flashdata('notice') . '</div>';
    }
    if ($this->session->flashdata('info')) {
        echo '<div class="info">' . $this->session->flashdata('info') . '</div>';
    }
    ?>
    <?php if ($result->num_rows() > 0): ?>

    <div class="table">
        <div id="head">
            <form id="form-cari" action="<?php echo site_url('/frontdesk/pengembalian_dokumen/index');?>" method="post">
                <input id="teks-cari" type="text" placeholder="Pencarian" name="keyword" value="<?php echo $isian_form;?>"/> <input type="submit" value="Cari" class="button blue-pill"/>
				<a href="<?php echo site_url('/frontdesk/pengembalian_dokumen/index');?>" class="button gray-pill">Reset</a>
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
                        <th class="action">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($result->result() as $value): ?>
                    <tr>
                        <td class="short"><?php echo sprintf('%05d', $value->no_tiket_frontdesk) ?></td>
                        <td class="short"><?php echo $value->tanggal ?></td>
                        <td class="short"><?php echo $value->id_unit ?></td>
                        <td class="short"><?php echo $value->nama_unit ?></td>
                        <td class="short"><?php echo $value->id_satker ?></td>
                        <td><?php echo $value->nama_satker ?></td>
                        <td class="action">
                            <a href="<?php echo site_url('/frontdesk/pengembalian_dokumen/cetak/' . $value->id_pengembalian_doc) ?>" class="button blue-pill">Kembalikan Dokumen</a>
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

    <?php else: ?>

    Tidak ada dokumen

    <?php endif ?>
</div>