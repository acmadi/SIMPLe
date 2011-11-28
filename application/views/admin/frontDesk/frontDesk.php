<ul id="nav">
    <li><a href="#tab1" class="active">FrontDesk</a></li>
</ul>
<div class="clear"></div>
<div id="konten">
    <div style="display: none;" id="tab1" class="tab_konten">


        <div class="table">
            <div class="head">
                <span style="margin:0px 0px 0px -400px; padding-left:10px; width:50px; height:10px; background:#FFF; font-size: 11px; margin-top: -10px">Tiket</span>

                <form id="cari_unit" action="man_unit_cari"
                      style="border: 1px solid #999; padding: 33px 30px 13px 13px; margin:5px 0px 20px 20px; font-size:10px;">
                    <table>
                        <tr>
                            <td>Cari Berdasarkan</td>
                            <td>:</td>
                            <td colspan="2"><select>
                                <option>No Tiket</option>
                            </select></td>
                        </tr>
                        <tr>
                            <td>Keyword</td>
                            <td>:</td>
                            <td><input type="text"
                                       style="width:180px; height:16px; font-size:10px; padding:2px 4px 2px 4px; margin-right:5px; "/>

                                <div id="search">
                            </td>
                            <td><input type="submit" value="Cari" style="width:60px; height:24px; font-size:10px; "/>
            </div>
            </td>
            </tr>
            </table>
            </form>
        </div>
        <div class="tail">
            <p style="padding-top: 110px; position:absolute; padding-left: 10px;">Status Tiket</p><br/>
            <table id="tableOne" class="yui">
                <thead>
                <tr>
                    <th><input type="checkbox"/></th>
                    <th>No.Tiket</th>
                    <th>Tanggal</th>
                    <th>Nama</th>
                    <th>Departemen</th>
                    <th>Subyek</th>
                    <th>Status</th>
                    <th>Tgl.Selesai</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td><input type="checkbox"/></td>
                    <td>071</td>
                    <td>07/01/2011/td>
                    <td>Palam</td>
                    <td>A</td>
                    <td>Pertanyaan?</td>
                    <td>Open</td>
                    <td>22/01/2011</td>
                </tr>
                <tr>
                    <td><input type="checkbox"/></td>
                    <td>041</td>
                    <td>09/01/2011/td>
                    <td>Nanda</td>
                    <td>B</td>
                    <td>Pertanyaan?</td>
                    <td>Closed</td>
                    <td>14/01/2011</td>
                </tr>
                </tbody>
            </table>
        </div>
        <br/>

        <div class="pagination">Halaman <a href="#"><<</a> <a href="#">1</a> <a href="#">2</a> <a href="#">3</a> <a
                href="#">4</a> <a href="#">5</a> <a href="#">6</a> <a href="#">>></a></div>
    </div>
</div>
</div>