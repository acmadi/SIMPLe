<!--<ul id="nav">-->
<!--    <li><a href="#tab1" class="active">Akses Kontrol</a></li>-->
<!--</ul>-->

<div class="content">

    <?php generate_notifkasi() ?>

    <h1>Akses Kontrol</h1>
    <div style="clear: both;"></div>

    <div id="tail">
        <table id="tableOne" class="yui">
            <thead>
            <tr>
                <th class="small">No</th>
                <th class="small">Level</th>
                <th>Nama Level</th>
                <th class="action">Aksi</th>
            </tr>
            </thead>
            <tbody>
            <?php $i = 1 ?>
            <?php foreach ($list_kontrol->result() as $item): ?>
            <tr>
                <td class="small"><?php echo $i++ ?></td>
                <td class="small"><?php echo $item->lavel ?></td>
                <td><?php echo $item->nama_lavel ?></td>
                <td class="action">
                    <span class="button_kecil">
                        <a title="Ubah" href="<?php echo site_url("/admin/akses_kontrol/") . '/edit/' . $item->id_lavel ?>"'/>
                            <img src="<?php echo base_url(); ?>images/edit.png"/>
                        </a>
                    </span>
                    <span class="button_kecil">
                        <a title="Lihat"
                           href="<?php echo site_url("/admin/akses_kontrol/") . '/view/' . $item->id_lavel ?>">
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