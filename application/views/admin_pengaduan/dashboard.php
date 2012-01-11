<!--<ul id="nav">-->
<!--    <li><a href="#tab1" class="active">Akses Kontrol</a></li>-->
<!--</ul>-->

<div class="content">
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



    <h1>Admin Pengaduan</h1>
    <div style="clear: both;"></div>

    <div id="tail">
        <table id="tableOne" class="yui">
            <thead>
            <tr>
                <th class="short">No</th>
                <th>Pengaduan</th>
                <th>Tanggal</th>
                <th>Nama Petugas</th>
                <th>Level</th>
                <th class="action">Aksi</th>
            </tr>
            </thead>
            <tbody>
            <?php $i = 1 ?>
            <?php foreach ($list_pengaduan as $item): ?>
            <tr>
                <td class="short"><?php echo $i++ ?></td>
                <td><?php echo $item->pengaduan ?></td>
                <td><?php echo $item->tanggal ?></td>
                <td><?php echo $item->nama_petugas ?></td>
                <td><?php echo $item->nama_lavel ?></td>
                <td class="action">
          
                    <span class="button_kecil">
                        <a title="Lihat"
                           href="<?php echo site_url("/admin_pengaduan/dashboard/") . '/view/' . $item->id_pengaduan ?>">
                            <img src="<?php echo base_url(); ?>images/view.png"/>
                        </a>
                    </span>
                </td>
            </tr>
            <?php endforeach;?>
            </tbody>
        </table>
    </div>
</div>