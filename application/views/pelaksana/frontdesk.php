<div class="content">

    <h1>Front Desk</h1>

<?php if ($result->num_rows() > 0): ?>
    <div class="table">
        <div id="head">
            <form id="form-cari" action="<?php echo site_url('/pelaksana/frontdesk/index');?>" method="post">
                <p><input type="text" size="60" placeholder="Pencarian" name="keyword" value="<?php echo $isian_form;?>"/>
                    &nbsp;<input type="submit" value="cari" class="button blue-pill"/>
                </p>
            </form>
        </div>


        <table class="table">
            <thead>
            <tr>
                <th class="no">No</th>
                <th class="short">Tanggal Pengajuan</th>
                <th class="no">Proses (Hari)</th>
                <th>Nama K/L</th>
                <th>Nama Eselon</th>
                <th>&nbsp;</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <td colspan="6">&nbsp;</td>
            </tr>
            </tfoot>
            <tbody>
                <?php $i = 1 ?>
                <?php foreach ($result->result() as $value): ?>

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

                if ($day->days > 4) {
//                    echo '<span style="font-weight: bold; font-size: 13px; color: white; background: tomato; padding: 0 4px;">' . $hari_kerja . '</span>';
                } elseif ($day->days == 4) {
//                    echo '<span style="font-weight: bold; font-size: 13px; color: yellow; background: black; padding: 0 4px;">' . $hari_kerja . '</span>';
                } else {
//                    echo '<span style="">' . $day->days . '</span>';
                }
                ?>

            <tr style="<?php echo ($day->days > 4) ? "background: pink; color: white;" : '' ?>">
                <td><?php echo $i++ ?></td>
                <td>
                    <?php echo table_tanggal($value->tanggal) ?>
                </td>
                <td>
                    <?php echo $hari_kerja ?>
                </td>
                <td><?php echo $value->nama_kementrian ?></td>
                <td><?php echo $value->nama_unit ?></td>
                <td class="action">
					<?php
						$disabled =  $onclick = '';
						$style_button = 'gray-pill';
						if($value->is_active == 2){
							$disabled = 'disabled';
							$style_button = 'blue-pill';
						}
					?>
					<a class="button <?php echo $style_button;?>" href="<?php echo site_url('/pelaksana/frontdesk/diterima/' . $value->no_tiket_frontdesk) ?>">Diterima</a>
                    <input type="button" class="button <?php echo $style_button;?>" onclick="window.location.href='<?php echo site_url('/pelaksana/frontdesk/diteruskan/' . $value->no_tiket_frontdesk); ?>'" <?php echo $disabled;?>
                           value="Diteruskan"/>
                    <a class="button " href="<?php echo site_url('/pelaksana/frontdesk/reject/' . $value->no_tiket_frontdesk) ?>">Dikembalikan</a>
                </td>
            </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
    <div class="pagination"><?php echo ($pageLink) ? 'Halaman ' . $pageLink : '';?></div>
    <br/>
    </div>
    <?php else: ?>
    <div class="notification yellow">
    Tidak ada dokumen
    </div>
    <?php endif ?>
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