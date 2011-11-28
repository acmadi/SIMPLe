<ul id="nav">
    <li><a href="#tab1" class="active">Akses Kontrol</a></li>
</ul>
<div class="clear"></div>
<div id="konten">
<div style="display: none;" id="tab1" class="tab_konten">


    <div class="table">
        <div id="head">
            <form id="insert" action="akses_kontrol_tambah"><input class="button" type="submit" value="tambah"
                                                                   style="width:100px; height:23px; font-size:10px; "/>
            </form>
            <form id="textfield-search" action="knowledge_cari"><input type="text" value="keyword type in here.."
                                                                       style="width:180px; height:16px; font-size:10px; padding:2px 4px 2px 4px; margin-right:5px; "/>

                <div id="search"><input type="submit" value="Search"
                                        style="width:100px; height:23px; font-size:10px; "/></div>
            </form>
        </div>
        <div id="tail">
            <table id="tableOne" class="yui">
                <thead>
                <tr>
                    <th><input type="checkbox"/></th>
                    <th>ID Akun</th>
                    <th>Departemen</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td><input type="checkbox"/></td>
                    <td>1</td>
                    <td>Admin</td>
                    <td>
                            <span class="button_kecil"><a title="Ubah" href="akses_kontrol_ubah"
                                                          onclick='return yesOrNo()'/><img
                                    src="<?php echo base_url(); ?>images/edit.png"
                                    style="width:20px; height:20px; "/></a></span>
                            <span class="button_kecil"><a title="Lihat" href="akses_kontrol_lihat"><img
                                    src="<?php echo base_url(); ?>images/view.png"
                                    style="width:20px; height:20px; "/></a></span>
                    </td>
                </tr>
                <tr>
                    <td><input type="checkbox"/></td>
                    <td>2</td>
                    <td>CS A</td>
                    <td>
                            <span class="button_kecil"><a title="Ubah" href="akses_kontrol_ubah"
                                                          onclick='return yesOrNo()'/><img
                                    src="<?php echo base_url(); ?>images/edit.png"
                                    style="width:20px; height:20px; "/></a></span>
                            <span class="button_kecil"><a title="Lihat" href="akses_kontrol_lihat"><img
                                    src="<?php echo base_url(); ?>images/view.png"
                                    style="width:20px; height:20px; "/></a></span>
                    </td>
                </tr>
                <tr>
                    <td><input type="checkbox"/></td>
                    <td>3</td>
                    <td>CS B</td>
                    <td>
                            <span class="button_kecil"><a title="Ubah" href="akses_kontrol_ubah"
                                                          onclick='return yesOrNo()'/><img
                                    src="<?php echo base_url(); ?>images/edit.png"
                                    style="width:20px; height:20px; "/></a></span>
                            <span class="button_kecil"><a title="Lihat" href="akses_kontrol_lihat"><img
                                    src="<?php echo base_url(); ?>images/view.png"
                                    style="width:20px; height:20px; "/></a></span>
                    </td>
                </tr>
                <tr>
                    <td><input type="checkbox"/></td>
                    <td>4</td>
                    <td>CS C</td>
                    <td>
                            <span class="button_kecil"><a title="Ubah" href="akses_kontrol_ubah"
                                                          onclick='return yesOrNo()'/><img
                                    src="<?php echo base_url(); ?>images/edit.png"
                                    style="width:20px; height:20px; "/></a></span>
                            <span class="button_kecil"><a title="Lihat" href="akses_kontrol_lihat"><img
                                    src="<?php echo base_url(); ?>images/view.png"
                                    style="width:20px; height:20px; "/></a></span>
                    </td>
                </tr>
                <tr>
                    <td><input type="checkbox"/></td>
                    <td>5</td>
                    <td>CS D</td>
                    <td>
                            <span class="button_kecil"><a title="Ubah" href="akses_kontrol_ubah"
                                                          onclick='return yesOrNo()'/><img
                                    src="<?php echo base_url(); ?>images/edit.png"
                                    style="width:20px; height:20px; "/></a></span>
                            <span class="button_kecil"><a title="Lihat" href="akses_kontrol_lihat"><img
                                    src="<?php echo base_url(); ?>images/view.png"
                                    style="width:20px; height:20px; "/></a></span>
                    </td>
                </tr>
                <tr>
                    <td><input type="checkbox"/></td>
                    <td>6</td>
                    <td>CS E</td>
                    <td>
                            <span class="button_kecil"><a title="Ubah" href="akses_kontrol_ubah"
                                                          onclick='return yesOrNo()'/><img
                                    src="<?php echo base_url(); ?>images/edit.png"
                                    style="width:20px; height:20px; "/></a></span>
                            <span class="button_kecil"><a title="Lihat" href="akses_kontrol_lihat"><img
                                    src="<?php echo base_url(); ?>images/view.png"
                                    style="width:20px; height:20px; "/></a></span>
                    </td>
                </tr>
                <tr>
                    <td><input type="checkbox"/></td>
                    <td>7</td>
                    <td>Halo DJA</td>
                    <td>
                            <span class="button_kecil"><a title="Ubah" href="akses_kontrol_ubah"
                                                          onclick='return yesOrNo()'/><img
                                    src="<?php echo base_url(); ?>images/edit.png"
                                    style="width:20px; height:20px; "/></a></span>
                            <span class="button_kecil"><a title="Lihat" href="akses_kontrol_lihat"><img
                                    src="<?php echo base_url(); ?>images/view.png"
                                    style="width:20px; height:20px; "/></a></span>
                    </td>
                </tr>
                <tr>
                    <td><input type="checkbox"/></td>
                    <td>8</td>
                    <td>Supervisor</td>
                    <td>
                            <span class="button_kecil"><a title="Ubah" href="akses_kontrol_ubah"
                                                          onclick='return yesOrNo()'/><img
                                    src="<?php echo base_url(); ?>images/edit.png"
                                    style="width:20px; height:20px; "/></a></span>
                            <span class="button_kecil"><a title="Lihat" href="akses_kontrol_lihat"><img
                                    src="<?php echo base_url(); ?>images/view.png"
                                    style="width:20px; height:20px; "/></a></span>
                    </td>
                </tr>
                <tr>
                    <td><input type="checkbox"/></td>
                    <td>9</td>
                    <td>Pelaksana</td>
                    <td>
                            <span class="button_kecil"><a title="Ubah" href="akses_kontrol_ubah"
                                                          onclick='return yesOrNo()'/><img
                                    src="<?php echo base_url(); ?>images/edit.png"
                                    style="width:20px; height:20px; "/></a></span>
                            <span class="button_kecil"><a title="Lihat" href="akses_kontrol_lihat"><img
                                    src="<?php echo base_url(); ?>images/view.png"
                                    style="width:20px; height:20px; "/></a></span>
                    </td>
                </tr>
                <tr>
                    <td><input type="checkbox"/></td>
                    <td>10</td>
                    <td>Kasubdit</td>
                    <td>
                            <span class="button_kecil"><a title="Ubah" href="akses_kontrol_ubah"
                                                          onclick='return yesOrNo()'/><img
                                    src="<?php echo base_url(); ?>images/edit.png"
                                    style="width:20px; height:20px; "/></a></span>
                            <span class="button_kecil"><a title="Lihat" href="akses_kontrol_lihat"><img
                                    src="<?php echo base_url(); ?>images/view.png"
                                    style="width:20px; height:20px; "/></a></span>
                    </td>
                </tr>
                <tr>
                    <td><input type="checkbox"/></td>
                    <td>11</td>
                    <td>Direktur</td>
                    <td>
                            <span class="button_kecil"><a title="Ubah" href="akses_kontrol_ubah"
                                                          onclick='return yesOrNo()'/><img
                                    src="<?php echo base_url(); ?>images/edit.png"
                                    style="width:20px; height:20px; "/></a></span>
                            <span class="button_kecil"><a title="Lihat" href="akses_kontrol_lihat"><img
                                    src="<?php echo base_url(); ?>images/view.png"
                                    style="width:20px; height:20px; "/></a></span>
                    </td>
                </tr>
                <tr>
                    <td><input type="checkbox"/></td>
                    <td>12</td>
                    <td>Dirjen</td>
                    <td>
                            <span class="button_kecil"><a title="Ubah" href="akses_kontrol_ubah"
                                                          onclick='return yesOrNo()'/><img
                                    src="<?php echo base_url(); ?>images/edit.png"
                                    style="width:20px; height:20px; "/></a></span>
                            <span class="button_kecil"><a title="Lihat" href="akses_kontrol_lihat"><img
                                    src="<?php echo base_url(); ?>images/view.png"
                                    style="width:20px; height:20px; "/></a></span>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>


</div>
</div>