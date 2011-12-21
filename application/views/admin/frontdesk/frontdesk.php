<ul id="nav">
    <li><a href="#tab1" class="active">FrontDesk</a></li>
</ul>
<div class="clear"></div>
<div id="konten">
    <div style="display: none;" id="tab1" class="tab_konten">


        <div class="table">
            <div class="head">
                <span style="margin:0px 0px 0px -400px; padding-left:10px; width:50px; height:10px; background:#FFF; font-size: 11px; margin-top: -10px">Tiket</span>

                <?php 
                    echo form_open('admin/frontdesk/search', 
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
                                <option value="no_antrian">No Tiket</option>
                                <option value="nama_satker">Nama Satker</option>
                                <option value="status">Status</option>
                            </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Keyword</td>
                            <td>:</td>
                            <td><input name="value" type="text"
                                       style="width:180px; height:16px; font-size:10px; padding:2px 4px 2px 4px; margin-right:5px; "/>
                            </td>
                            <td><input type="submit" value="Cari" style="width:60px; height:24px; font-size:10px; "/>
                            </td>
                        </tr>
                    </table>
                <?php echo form_close() ?>
            </div>
        </div>
        <div class="tail">
            <!--
            <p style="padding-top: 110px; position:absolute; padding-left: 10px;">Status Tiket</p><br/>
            -->
            <table id="tableOne" class="yui">
                <thead>
                    <tr>
                        <th>No.Tiket</th>
                        <th>Tanggal</th>
                        <th>Tanggal Selesai</th>
                        <th>Nama Satker</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($tikets as $tiket) : ?>
                    <tr>
                        <td><?php echo $tiket->no_tiket_frontdesk . ' ' . $tiket->no_antrian ?></td>
                        <td><?php echo $tiket->tanggal ?></td>
                        <td><?php echo $tiket->tanggal_selesai ?></td>
                        <td><?php echo $tiket->nama_satker ?></td>
                        <td><?php echo $tiket->status ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

<!--        <div class="pagination">Halaman <a href="#">&laquo;</a> <a href="#">1</a> <a href="#">2</a> <a href="#">3</a> <a-->
<!--                href="#">4</a> <a href="#">5</a> <a href="#">6</a> <a href="#">&raquo;</a></div>-->
    </div>
</div>
</div>