<div class="content">

    <h1>Daftar Tiket yang Melewati Argo</h1>

    <form action="<?php echo site_url('/dirjen/list_argo') ?>" method="get">
        Cari nomor tiket <input name='cari' type="text"/> <input type="submit" value="Cari" class="button blue-pill"/>
    </form>

    <table class="table">
        <thead>
        <tr>
            <th class="no">No</th>
            <th class="short">Tanggal</th>
            <th class="short">Hari</th>
            <th class="short">No Tiket</th>
            <th>Nama Satker</th>
            <th>Posisi</th>
        </tr>
        </thead>
        <tbody>
        <?php $i = 1 ?>
        <?php foreach ($lists->result() as $value): ?>
            <?php
            $date1 = new DateTime(date('Y-m-d H:i:s'));
            $date2 = new DateTime($value->tanggal);
            //                            $day = $date1->diff($date2);
            $day = date_diff($date1, $date2);

            $hari = $day->days;

            //TODO: Algoritmanya kemungkinan salah
            $hari_kerja = (int)($day->days / 7) * 2;
            $hari_kerja = $hari - $hari_kerja;

            $sql = "select * from tb_calendar WHERE holiday BETWEEN '{$value->tanggal}' AND NOW()";
            $hari_kerja = $hari_kerja - $this->db->query($sql)->num_rows();
            ?>
        <tr style="<?php echo ($hari_kerja > 4) ? 'background: #ff8f91; color: white;' : '' ?>">
            <td><?php echo $i++ ?></td>
            <td><?php echo table_tanggal($value->tanggal) ?></td>
            <td><?php echo $hari_kerja ?></td>
            <td><?php echo sprintf('%05d', $value->no_tiket_frontdesk) ?></td>
            <td><?php echo $value->nama_petugas ?></td>
            <td>
                <?php
                if ($value->lavel == 1) {
                    echo 'CS';
                } else {
                    echo $value->nama_lavel;
                }
                ?>
            </td>
        </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    <div class="pagination">Halaman <a href="#"><<</a> <a href="#">1</a> <a href="#">2</a> <a href="#">3</a> <a href="#">4</a> <a href="#">5</a> <a href="#">6</a> <a href="#">>></a></div>
    <br/>

</div>