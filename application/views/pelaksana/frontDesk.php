<div class="content">

    <h1>Front Desk</h1>

    <div class="table">
        <div id="head">
            <div id="cari_unit" action="man_unit_cari">
                <p>Kode Satker: <input type="text" size="60" value="292292"/>&nbsp;<input type="submit" value="cari"/></p>
            </div>

            <div id="tail">
                <table id="tableOne" class="yui">
                    <thead>
                    <tr>
                        <th class="short">No</th>
                        <th class="short">Tanggal</th>
                        <th class="short">Hari</th>
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
                        <td class="short">
                            <?php
                            $date1 = new DateTime(date('Y-m-d H:i:s'));
                            $date2 = new DateTime($value->tanggal);
                            //                            $day = $date1->diff($date2);
                            $day = date_diff($date1, $date2);

                            $hari = $day->days;

                            //TODO: Algoritmanya kemungkinan salah
                            $hari_kerja = (int) ($day->days / 7) * 2;
                            $hari_kerja = $hari - $hari_kerja;

                            $sql = "select * from tb_calendar WHERE holiday BETWEEN '{$value->tanggal}' AND NOW()";
                            $hari_kerja = $hari_kerja - $this->db->query($sql)->num_rows();

                            if ($day->days > 4) {
                                echo '<span style="font-weight: bold; font-size: 13px; color: white; background: tomato; padding: 0 4px;">' . $hari_kerja . '</span>';
                            } elseif ($day->days == 4) {
                                echo '<span style="font-weight: bold; font-size: 13px; color: yellow; background: black; padding: 0 4px;">' . $hari_kerja . '</span>';
                            } else {
                                echo '<span style="">' . $day->days . '</span>';
                            }
                            ?>
                        </td>
                        <td class="short"><?php echo $value->id_satker ?></td>
                        <td><?php echo $value->nama_satker ?></td>
                        <td class="">
                            <a class="bla button blue-pill" href="<?php echo site_url('/pelaksana/frontdesk/diterima/' . $value->no_tiket_frontdesk) ?>">Diterima</a>
                            <input type="button" class="bla2 button gray-pill" link="<?php echo site_url('/pelaksana/frontdesk/diteruskan/' . $value->no_tiket_frontdesk) ?>" disabled
                                   value="Diteruskan"/>
                            <a class="button gray-pill" href="<?php echo site_url('/pelaksana/frontdesk/reject/' . $value->no_tiket_frontdesk) ?>">Kurang Lengkap</a>
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
<script type="text/javascript">
    $(function () {
        $('.bla').click(function () {
            $(this).next().removeClass('gray-pill').addClass('blue-pill').removeAttr('disabled');
            link = $(this).next().attr('link');
            $(this).next().attr('onclick', 'window.location.href="' + link + '"');
            console.log(link);
            return false;
        })
    })
</script>