<ul id="nav">
    <li><a href="#tab1" class="active">Manajemen User</a></li>
</ul>
<div class="clear"></div>
    <div id="konten">
        <div style="display: none;" id="tab1" class="tab_konten">


            <div class="table">
                <div id="head">
                    <form id="tambah_user" action="man_user_tambah"><input type="submit" value="Tambah User"
                                                                           style="width:100px; height:24px; font-size:10px; "/>
                    </form>
                    <form id="cari_user" action="man_user_cari">No User: <input type="text" value="28100"
                                                                                style="width:180px; height:16px; font-size:10px; padding:2px 4px 2px 4px; margin-right:5px; "/>

                        <div id="search"><input type="submit" value="Cari User"
                                                style="width:60px; height:24px; font-size:10px; "/></div>
                    </form>
                </div>
                <div id="tail">
                    <table id="tableOne" class="yui">
                        <thead>
                        <tr>
                            <th><input type="checkbox"/></th>
                            <th>No User</th>
                            <th>Username</th>
                            <th>Nama</th>
                            <th>Kode Unit</th>
                            <th>Level</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td><input type="checkbox"/></td>
                            <td><a href="man_user_surat_kerja">28723</a></td>
                            <td>yuki</td>
                            <td>momoki</td>
                            <td>201010200201101</td>
                            <td>1</td>
                            <td>
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
                        <tr>
                            <td><input type="checkbox"/></td>
                            <td>8237</td>
                            <td>momo</td>
                            <td>momoki</td>
                            <td>201010200201101</td>
                            <td>2</td>
                            <td>
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
                        <tr>
                            <td><input type="checkbox"/></td>
                            <td>0383</td>
                            <td>jike</td>
                            <td>momoki</td>
                            <td>yusuf m</td>
                            <td>3</td>
                            <td>
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
                        <tr>
                            <td><input type="checkbox"/></td>
                            <td>87238</td>
                            <td>loli</td>
                            <td>nadia liontin</td>
                            <td>201010200201101</td>
                            <td>5</td>
                            <td>
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
                </div>
            </div>
        </div>


        <script type="text/javascript" src="<?php echo base_url(); ?>js/fungsi.js"></script>