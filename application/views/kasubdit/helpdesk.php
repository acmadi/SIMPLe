<div class="content">

    <h1>Help Desk</h1>

    <div class="table">
        <div id="head">
            <div id="cari_unit" action="man_unit_cari">
                <p>Kode Satker: <input type="text" size="60" value="292292"/>&nbsp;<input type="submit" value="cari" /></p>
            </div>

            <div id="tail">
                <table id="tableOne" class="yui">
                    <thead>
                    <tr>
                        <th class="short">No</th>
                        <th class="short">Tanggal</th>
                        <th class="short">No Antrian</th>
                        <th>Nama Satker</th>
                        <th>Subjek</th>
                        <th class="short">Prioritas</th>
                        <th class="action">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1 ?>
                    <?php foreach ($antrian->result() as $value): ?>
                    <tr>
                        <td class="short"><?php echo $i++ ?></td>
                        <td class="short"><?php echo $value->tanggal ?></td>
                        <td class="short"><?php echo $value->no_tiket_helpdesk ?></td>
                        <td><?php echo $value->nama_satker ?></td>
                        <td><?php echo $value->pertanyaan ?></td>
                        <td class="short"><?php echo $value->prioritas ?></td>
                        <td class="action">
                            <a class="button blue-pill" href="<?php echo site_url('/kasubdit/helpdesk/view/' . $value->no_tiket_helpdesk) ?>">Jawab</a>
                        </td>
                    </tr>
                    <?php endforeach ?>
                    </tbody>
                </table>
            </div>
<!--            <div class="pagination">Halaman <a href="#"><<</a> <a href="#">1</a> <a href="#">2</a> <a href="#">3</a> <a-->
<!--                    href="#">4</a> <a href="#">5</a> <a href="#">6</a> <a href="#">>></a></div>-->
            <br/>
        </div>
    </div>
</div>


</div>