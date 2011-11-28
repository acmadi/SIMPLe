<ul id="nav">
    <li><a href="#tab1" class="active">Manajemen Unit</a></li>
</ul>
<div class="clear"></div>
    <div id="konten">
        <div style="display: none;" id="tab1" class="tab_konten">


            <div class="table">
                <div id="head">
                    <form id="tambah_unit" action="man_unit_tambah">
                        <input type="submit" value="Tambah Unit" style="width:100px; height:24px; font-size:10px; "/>
                    </form>
                    <span style="margin:0px 0px 0px -320px; padding-left:10px; position:absolute; width:50px; height:10px; background:#FFF;">Cari Unit</span>

                    <form id="cari_unit" action="man_unit_cari"
                          style="border: 1px solid #999; padding: 13px 30px 13px 13px; margin:5px 0px 0px 20px; ">Kode
                        Unit: <input type="text" value="28100"
                                     style="width:180px; height:16px; font-size:10px; padding:2px 4px 2px 4px; margin-right:5px; "/>

                        <div id="search">
                            <input type="submit" value="Cari Unit" style="width:60px; height:24px; font-size:10px; "/>
                        </div>
                    </form>
                </div>
                <div id="tail">
                    <table id="tableOne" class="yui">
                        <thead>
                        <tr>
                            <th align="center">Kode Unit</th>
                            <th align="center">Nama Unit</th>
                            <th align="center">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td align="center">201010200201101</td>
                            <td align="center">Seksi Anggaran IA-1</td>
                            <td align="center"><a href="man_unit_ubah"><input type="button" name="edit" value="Edit"
                                                                              style="width:60px; height:24px; font-size:10px;"/></a>
                                <a href="man_unit_lihat"><input type="button" name="view" value="Lihat"
                                                                style="width:60px; height:24px; font-size:10px;"/></a>
                            </td>
                        </tr>
                        <tr>
                            <td align="center">201010200201101</td>
                            <td align="center">SUBBSGIAN TATA LAKSANA</td>
                            <td align="center"><a href="man_unit_ubah"><input type="button" name="edit" value="Edit"
                                                                              style="width:60px; height:24px; font-size:10px;"/></a>
                                <a href="man_unit_lihat"><input type="button" name="view" value="Lihat"
                                                                style="width:60px; height:24px; font-size:10px;"/></a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="pagination">Halaman <a href="#"><<</a> <a href="#">1</a> <a href="#">2</a> <a href="#">3</a>
                    <a href="#">4</a> <a href="#">5</a> <a href="#">6</a> <a href="#">>></a></div>
            </div>
        </div>