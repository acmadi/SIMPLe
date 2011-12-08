<!--<ul id="nav">-->
<!--    <li><a href="#tab1" class="active">Manajemen User</a></li>-->
<!--</ul>-->

<div style="display: none;" id="tab1" class="tab_konten">

    <div class="content">

        <h1>Manajemen User</h1>

        <div style="float: left;">
            <a class="button blue-pill" href="<?php echo site_url('/admin/man_user_tambah') ?>">Tambah</a>
        </div>
        <div style="float: right;">
            <form id="cari_user" action="man_user_cari">
                No User: <input type="text" value="28100"/>
                <input class="button blue-pill" type="submit" value="Cari User"/>
            </form>
        </div>

        <div id="tail">
            <table id="tableOne" class="yui">
                <thead>
                <tr>
                    <th class="short"><input type="checkbox"/></th>
                    <th>No User</th>
                    <th>Username</th>
                    <th>Nama</th>
                    <th>Kode Unit</th>
                    <th>Level</th>
                    <th class="action">Aksi</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="short"><input type="checkbox"/></td>
                    <td><a href="man_user_surat_kerja">28723</a></td>
                    <td>yuki</td>
                    <td>momoki</td>
                    <td>201010200201101</td>
                    <td>1</td>
                    <td class="action">
                                <span class="button_kecil"><a title="surat kerja" href="man_user_surat_kerja"/><img
                                        src="<?php echo base_url(); ?>images/icon_suratkerja.png"
                                        style="width:20px; height:20px; "/></a></span>
                                <span class="button_kecil"><a title="reset password" href="#"
                                                              onclick='return resetpassword()'/><img
                                        src="<?php echo base_url(); ?>images/icon_reset.png"
                                        style="width:20px; height:20px; "/></a></span>
                                <span class="button_kecil"><a title="ubah" href="man_user_ubah"/><img
                                        src="<?php echo base_url(); ?>images/icon_edit.png"
                                        style="width:20px; height:20px; "/></a></span>
                                <span class="button_kecil"><a title="hapus" href="man_user"
                                                              onclick="return hapus()"/><img
                                        src="<?php echo base_url(); ?>images/icon_delete.png"
                                        style="width:20px; height:20px; "/></a></span>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>


<div class="pagination">Halaman <a href="#"><<</a> <a href="#">1</a> <a href="#">2</a> <a href="#">3</a>
    <a href="#">4</a> <a href="#">5</a> <a href="#">6</a> <a href="#">>></a></div>
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
                <td><span class="button_kecil"><a title="hapus" href="#" onclick='return hapus()'/><img
                        src="<?php echo base_url(); ?>images/icon_delete.png"
                        style="width:20px; height:20px; "/></a></span></td>
                <td>Hapus User</td>
            </tr>
        </table>


        <script type="text/javascript" src="<?php echo base_url(); ?>js/fungsi.js"></script>