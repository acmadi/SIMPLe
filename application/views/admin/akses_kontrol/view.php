<div class="content">

    <div class="page-header">
        <h1><?php echo $title ?></h1>
    </div>

    <?php generate_notifkasi() ?>

    <table class="">
        <tr>
            <td class="medium">ID Level</td>
            <td class="sort">:</td>
            <td>
                <?php
                echo $info_kontrol->id_lavel;
                ?>
            </td>
        </tr>
        <tr>
            <td class="medium">Nama Level</td>
            <td class="sort">:</td>
            <td>
                <?php
                echo $info_kontrol->nama_lavel;
                ?>
            </td>
        </tr>
    </table>

    <table class="table">
        <thead>
        <tr>
            <th class="short">ID</th>
            <th>Username</th>
            <th>Nama</th>
            <th>Kode Unit</th>
            <th>Level</th>
            <th>&nbsp;</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($list_kontrol->result() as $item): ?>
        <tr>
            <td class="short"><?php echo $item->id_user?></td>
            <td><?php echo $item->username?></td>
            <td><?php echo $item->nama?></td>
            <td><?php echo $item->nama_unit ?></td>
            <td><?php echo $item->nama_lavel?></td>
            <td class="action">
                            <span class="button_kecil">
                                <a title="Surat kerja"
                                   href="<?php echo site_url('admin/akses_kontrol_surat_kerja/index/' . $item->id_user . '/' . $info_kontrol->id_lavel)?>"/>
                                    <img src="<?php echo base_url(); ?>images/icon_suratkerja.png"/>
                                </a>
                            </span>
                            <span class="button_kecil">
                                <a title="Reset password"
                                   href="<?php echo site_url('admin/akses_kontrol/reset_password/' . $item->id_user . '/' . $info_kontrol->id_lavel)?>"
                                   onclick='return resetpassword()'/>
                                    <img src="<?php echo base_url(); ?>images/icon_reset.png"/>
                                </a>
                            </span>
                            <span class="button_kecil">
                                <a title="Ubah"
                                   href="<?php echo site_url('admin/akses_kontrol_ubah/user/' . $item->id_user . '/' . $info_kontrol->id_lavel)?>"/>
                                    <img src="<?php echo base_url(); ?>images/icon_edit.png"/>
                                </a>
                            </span>
                            <span class="button_kecil">
                                <?php if ($item->id_lavel != 1): ?>
                                <a title="Delete"
                                   href="<?php echo site_url('admin/akses_kontrol/delete_user/' . $item->id_user . '/' . $info_kontrol->id_lavel)?>"
                                   onclick="return hapus()"/>
                                <img src="<?php echo base_url(); ?>images/icon_delete.png"/>
                                </a>
                                <?php endif ?>
                            </span>
            </td>
        </tr>
            <?php endforeach;?>

        </tbody>
    </table>
    <br/>

    <div id="tail">
        <table>
            <tr>
                <td class="sort"><span class="button_kecil"><a title="surat kerja" href="#"
                                                               onclick='return yesOrNo()'/><img
                    src="<?php echo base_url(); ?>images/icon_suratkerja.png"
                    style="width:20px; height:20px; "/></a></span></td>
                <td class="medium">Surat Kerja</td>
                <td><span class="button_kecil"><a title="ubah" href="#" onclick='return yesOrNo()'/><img
                    src="<?php echo base_url(); ?>images/icon_edit.png"
                    style="width:20px; height:20px; "/></a></span></td>
                <td>Edit User</td>
            </tr>
            <tr>
                <td class="sort"><span class="button_kecil"><a title="reset password" href="#"
                                                               onclick='return yesOrNo()'/><img
                    src="<?php echo base_url(); ?>images/icon_reset.png"
                    style="width:20px; height:20px; "/></a></span></td>
                <td class="medium">Reset Password</td>
                <td><span class="button_kecil"><a title="hapus" href="#" onclick='return yesOrNo()'/><img
                    src="<?php echo base_url(); ?>images/icon_delete.png"
                    style="width:20px; height:20px; "/></a></span></td>
                <td>Hapus User</td>
            </tr>
        </table>
    </div>
</div>