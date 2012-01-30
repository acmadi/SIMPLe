<meta http-equiv="refresh" content="30; url=<?php echo site_url('/frontdesk/ambil_dokumen')  ?>">

<div class="content">

    <h1>Daftar Pengambilan Dokumen</h1>
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

    <table class="table">
        <thead>
        <tr>
            <th class="short">No Tiket</th>
            <th class="short">Tanggal</th>
            <th class="medium">Kementerian</th>
            <th class="medium">Eselon</th>
            <th class="no">Status</th>
            <th>&nbsp;</th>
        </tr>
        </thead>
        <tbody>
            <?php foreach ($result->result() as $value): ?>
        <tr>
            <td><?php echo sprintf('%05d', $value->no_tiket_frontdesk) ?></td>
            <td><?php echo table_tanggal($value->tanggal) ?></td>
            <td><strong><?php echo $value->id_kementrian ?></strong> - <?php echo $value->nama_kementrian ?></td>
            <td><strong><?php echo $value->id_unit ?></strong> - <?php echo $value->nama_unit ?></td>
<!--            <td>--><?php //echo $value->id_satker ?><!--</td>-->
<!--            <td>--><?php //echo $value->nama_satker ?><!--</td>-->
            <td><?php echo $value->status ?></td>
            <td class="action">
				<?php
					$style_button = 'green';
					$tmp = $this->db->query('SELECT * FROM tb_pengembalian_doc WHERE no_tiket_frontdesk = ? AND sudah_diambil = 1',array($value->no_tiket_frontdesk))->num_rows();
					if($tmp > 0) $style_button = '';
				?>
                <a href="<?php echo site_url('/frontdesk/ambil_dokumen/cetak/' . $value->no_tiket_frontdesk) ?>" class="button <?php echo $style_button;?>">Ambil Dokumen</a>
            </td>
        </tr>
            <?php endforeach ?>
        </tbody>
    </table>

    <?php else: ?>

    <div class="notification yellow">
    Tidak ada dokumen
    </div>

    <?php endif ?>
</div>