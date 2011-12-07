<ul id="nav">
    <li><a href="#tab1" class="active">Histori</a></li>
</ul>
<div class="clear"></div>
<div id="konten">
    <div style="display: none;" id="tab1" class="tab_konten">


        <div class="table">
            <div class="tail">
                <p style="padding-top: 0px; position:absolute; padding-left: 10px;">Sejarah User</p><br/>

                <div style="float:none;">
                    <b style="font-size:12px; margin-left: 200px;">Dari Tanggal</b>
                    <table style=" margin-left: 280px; margin-top: -21px">
                        <tr>
                            <td>
                                <select style="font-size:10px; ">
                                    <option selected="selected">Tgl</option>
                                    <option></option>
                                    <option></option>
                                </select>
                            </td>
                            <td> -</td>
                            <td>
                                <select style="font-size:10px; ">
                                    <option selected="selected">Bulan</option>
                                    <option></option>
                                    <option></option>
                                </select>
                            </td>
                            <td> -</td>
                            <td>
                                <select style="font-size:10px; ">
                                    <option selected="selected">Tahun</option>
                                    <option></option>
                                    <option></option>
                                </select>
                            </td>
                        </tr>
                    </table>

                </div>
                <div style="float:left; position:absolute; margin-left: 600px;">
                    <b style="font-size: 12px; margin-top: -32px; position: absolute">Sampai Tanggal</b>
                    <table style="margin-left: 100px; margin-top: -37px">
                        <tr>
                            <td>
                                <select style="font-size:10px; ">
                                    <option selected="selected">Tgl</option>
                                    <option></option>
                                    <option></option>
                                </select>
                            </td>
                            <td> -</td>
                            <td>
                                <select style="font-size:10px; ">
                                    <option selected="selected">Bulan</option>
                                    <option></option>
                                    <option></option>
                                </select>
                            </td>
                            <td> -</td>
                            <td>
                                <select style="font-size:10px; ">
                                    <option selected="selected">Tahun</option>
                                    <option></option>
                                    <option></option>
                                </select>
                            </td>
                        </tr>
                    </table>
                </div>
                <table id="tableOne" class="yui">
                    <thead>
                    <tr>
                        <th><input type="checkbox"/></th>
                        <th>ID Akun</th>
                        <th>Nama Akun</th>
                        <th>Login</th>
                        <th>Logout</th>
                        <th class="action">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><input type="checkbox"/></td>
                        <td>001</td>
                        <td>Adi</td>
                        <td>10/06/2011 13:00</td>
                        <td>10/06/2011 14:00</td>
                        <td class="action">
                            <span class="button_kecil"><a title="Edit" href="man_keu_daftar_brg_del.php?id=59"
                                                          onclick='return yesOrNo()'/><img
                                    src="<?php echo base_url(); ?>images/edit.png"
                                    style="width:20px; height:20px; "/></a></span>
                            <span class="button_kecil"><a title="Delete" href="man_keu_daftar_brg_up.php?id=59"><img
                                    src="<?php echo base_url(); ?>images/delete.png" style="width:20px; height:20px; "/></a></span>
                        </td>
                    </tr>
                    <tr>
                        <td><input type="checkbox"/></td>
                        <td>002</td>
                        <td>Palam</td>
                        <td>13/06/2011 14:30</td>
                        <td>13/06/2011 15:22</td>
                        <td class="action">
                            <span class="button_kecil"><a title="Edit" href="man_keu_daftar_brg_del.php?id=59"
                                                          onclick='return yesOrNo()'/><img
                                    src="<?php echo base_url(); ?>images/edit.png"
                                    style="width:20px; height:20px; "/></a></span>
                            <span class="button_kecil"><a title="Delete" href="man_keu_daftar_brg_up.php?id=59"><img
                                    src="<?php echo base_url(); ?>images/delete.png" style="width:20px; height:20px; "/></a></span>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>


    </div>
</div>