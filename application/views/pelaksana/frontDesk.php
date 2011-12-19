<div class="content">

    <h1>Front Desk</h1>

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
                        <th>Tanggal</th>
                        <th>No Antrian</th>
                        <th>Kode Satker</th>
                        <th>Nama Satker</th>
                        <th class="action">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1 ?>
                    <?php foreach ($antrian->result() as $value): ?>
                    <tr>
                        <td class="short"><?php echo $i++ ?></td>
                        <td class="short"><?php echo $value->tanggal ?></td>
                        <td class="short"><?php echo $value->no_tiket_frontdesk ?></td>
                        <td class="short"><?php echo $value->id_satker ?></td>
                        <td><?php echo $value->nama_satker ?></td>
                        <td class="action">
                            <a class="button blue-pill" href="<?php echo site_url('/pelaksana/frontdesk/diterima/' . $value->no_tiket_frontdesk) ?>">Diterima</a>
                            <a class="button blue-pill" href="<?php echo site_url('/pelaksana/frontdesk/diteruskan/' . $value->no_tiket_frontdesk) ?>">Diteruskan</a>
                        </td>
                    </tr>
                    <?php endforeach ?>
                    </tbody>
                </table>
            </div>
            <div class="pagination">Halaman <a href="#"><<</a> <a href="#">1</a> <a href="#">2</a> <a href="#">3</a> <a
                    href="#">4</a> <a href="#">5</a> <a href="#">6</a> <a href="#">>></a></div>
            <br/>
        </div>
    </div>
</div>


</div>