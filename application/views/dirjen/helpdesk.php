<div class="content">

    <h1>Help Desk</h1>

    <?php if ($antrian->num_rows() > 0): ?>
    <div class="table">
        <div id="head">
            <div id="cari_unit" action="man_unit_cari">
                <p>
                    <?php
                    echo form_open('pelaksana/helpdesk/search');

                    echo 'Kode Satker: ' .
                            form_input('keyword', '', 'placeholder="Masukkan kode satker"') . ' ';
                    echo form_submit('submit', 'CARI', 'class="button blue-pill"');

                    echo form_close();
                    ?>
                </p>
            </div>


            <table class="table">
                <thead>
                <tr>
                    <th class="no">No</th>
                    <th class="short">Tanggal</th>
                    <th class="short">No Antrian</th>
                    <th>Nama Satker</th>
                    <th>Subjek</th>
                    <th class="short">Prioritas</th>
                    <th>&nbsp;</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <td colspan="7">&nbsp;</td>
                </tr>
                </tfoot>
                <tbody>
                    <?php $i = 1 ?>
                    <?php foreach ($antrian->result() as $value): ?>
                <tr>
                    <td><?php echo $i++ ?></td>
                    <td><?php echo table_tanggal($value->tanggal) ?></td>
                    <td><?php echo $value->no_tiket_helpdesk ?></td>
                    <td><?php echo $value->nama_satker ?></td>
                    <td><?php echo $value->pertanyaan ?></td>
                    <td><?php echo $value->prioritas ?></td>
                    <td class="action">
                        <a class="button green" href="<?php echo site_url('/pelaksana/helpdesk/view/' . $value->no_tiket_helpdesk) ?>">Jawab</a>
                    </td>
                </tr>
                    <?php endforeach ?>
                </tbody>
            </table>

            <!--            <div class="pagination">Halaman <a href="#"><<</a> <a href="#">1</a> <a href="#">2</a> <a href="#">3</a> <a-->
            <!--                    href="#">4</a> <a href="#">5</a> <a href="#">6</a> <a href="#">>></a></div>-->
            <br/>
        </div>
    </div>
        <?php else: ?>
    Tidak ada pertanyaan yang dieskalasi atau tidak ditemukan pertanyaan.
    <?php endif ?>
</div>
