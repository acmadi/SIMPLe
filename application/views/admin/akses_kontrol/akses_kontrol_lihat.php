<ul id="nav">
    <li><a href="#tab1" class="active">Akses Kontrol</a></li>
</ul>
<div class="clear"></div>
<div id="konten">
    <div style="display:none" id="tab1" class="tab_konten">


        <div class="table">
            <div id="head">
               <table>
                    <tr>
                        <td class="medium">No Level</td>
                        <td class="sort">:</td>
                        <td><?php echo $list_kontrol['result2']->kode_unit?></td>
                    </tr>
                    <tr>
                        <td class="medium">Nama Level</td>
                        <td class="sort">:</td>
                        <td><?php echo $list_kontrol['result2']->nama_unit?></td>
                    </tr>
                </table>
            </div>
            <div id="tail">
                <table id="tableOne" class="yui">
                    <thead>
                    <tr>
                        <th>No User</th>
                        <th>Username</th>
                        <th>Nama</th>
                        <th>Kode Unit</th>
                        <th>Level</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($list_kontrol['result']->result() as $item):?>
					<tr>
                        <td><?php echo $item->id_user?></td>
                        <td><?php echo $item->username?></td>
                        <td><?php echo $item->nama?></td>
                        <td><?php echo $item->kode_unit?></td>
                        <td><?php echo $item->id_lavel?></td>
                        <td>
                            <span class="button_kecil"><a title="Edit" href="#" onclick='return yesOrNo()'/><img
                                    src="<?php echo base_url(); ?>images/icon_suratkerja.png"
                                    style="width:20px; height:20px; "/></a></span>
                            <span class="button_kecil"><a title="Edit" href="#" onclick='return yesOrNo()'/><img
                                    src="<?php echo base_url(); ?>images/icon_reset.png"
                                    style="width:20px; height:20px; "/></a></span>
                            <span class="button_kecil"><a title="Edit" href="#" onclick='return yesOrNo()'/><img
                                    src="<?php echo base_url(); ?>images/icon_edit.png"
                                    style="width:20px; height:20px; "/></a></span>
                            <span class="button_kecil"><a title="Edit" href="#" onclick='return yesOrNo()'/><img
                                    src="<?php echo base_url(); ?>images/icon_delete.png"
                                    style="width:20px; height:20px; "/></a></span>
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
        </div>


    </div>
</div>