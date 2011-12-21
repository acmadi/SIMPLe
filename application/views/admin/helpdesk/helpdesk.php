<ul id="nav">
    <li><a href="#tab1" class="active">HelpDesk</a></li>
</ul>
<div class="clear"></div>
<div id="konten">
    <div style="display: none;" id="tab1" class="tab_konten">


        <div class="table">
            <div class="head">
                <span style="margin:0px 0px 0px -400px; padding-left:10px; width:50px; height:10px; background:#FFF; font-size: 11px; margin-top: -10px">Tiket</span>

                <?php 
                    echo form_open('admin/helpdesk/search', 
                        array(
                            'id' => 'cari_unit',
                            'style' => 'border: 1px solid #999; padding: 33px 30px 13px 13px; margin:5px 0px 20px 20px; font-size:10px;'
                            )
                        );
                        
                ?>
                    <table>
                        <tr>
                            <td>Cari Berdasarkan</td>
                            <td>:</td>
                            <td colspan="2">
                            <select name="key">
                                <option value="tkt.no_antrian">No Tiket</option>
                                <option value="ptgs.nama_petugas">Nama Petugas</option>
                                <option value="stkr.nama_satker">Nama Satker</option>
                            </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Keyword</td>
                            <td>:</td>
                            <td><input name="value" type="text"
                                       style="width:180px; height:16px; font-size:10px; padding:2px 4px 2px 4px; margin-right:5px; "/>

                                
                            </td>
                            <td><input type="submit" value="Cari" style="width:60px; height:24px; font-size:10px; "/></td>
                        </tr>
                    </table>
                <?php echo form_close() ?>
            </div>
        </div>

        <p>Status Tiket</p>
        <div class="tail">
            <table id="tableOne" class="yui">
                <thead>
                <tr>
                    <th style="width: 20px">#</th>
                    <th style="width: 20px">Tanggal</th>
                    <th style="width: 20px">No.Tiket</th>
                    <th style="width: 50px">Nama Petugas</th>
                    <th>Satker</th>
                    <th>Subyek</th>
                    <th  style="width: 30px">Status</th>
                </tr>
                </thead>
                <tbody>
                <?php $i = 1 ?>
                <?php foreach($tikets as $tiket) : ?>
                <tr>
                    <td style="width: 20px"><?php echo $i ?></td>
                    <td style="width: 20px"><?php echo $tiket->tanggal ?></td>
                    <td style="width: 20px"><?php echo $tiket->no_tiket ?></td>
                    <td style="width: 50px"><?php echo $tiket->nama_petugas ?></td>
                    <td><?php echo $tiket->nama_satker ?></td>
                    <td><?php echo $tiket->judul ?></td>
                    <td  style="width: 30px"><?php echo $tiket->status ?></td>
                </tr>
                <?php $i++; endforeach; ?>
                </tbody>
            </table>
        </div>
        <br/>

<!--        <div class="pagination">Halaman <a href="#">&laquo;</a> <a href="#">1</a> <a href="#">2</a> <a href="#">3</a> <a-->
<!--                href="#">4</a> <a href="#">5</a> <a href="#">6</a> <a href="#">&raquo;</a></div>-->
    </div>
</div>
</div>