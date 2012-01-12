<h1>Penyelia - Daftar Pertanyaan</h1>

<?php if ($pertanyaan->num_rows() > 0): ?>
            <div class="table">
                <div id="head">
                    <div id="form-cari">
                        Urutkan berdasar :
                        <form action="<?php echo '' ?>" method="get" name="form">
                            <select name="sort" onchange="javascript: $('form').submit() ">
                                <option value="" selected="selected"> -</option>
                                <option value="tanggal">Tanggal</option>
                                <option value="prioritas">Prioritas</option>
                            </select>
                        </form>
                    </div>

                    <input id="tambah" class='button' type="submit" value="<?php echo $pertanyaan->num_rows() ?> tiket" style="background:#D65703; width:80px; color:#FFF; "/>

                </div>

    <table class="table">
        <thead>
        <tr>
            <th class="no">No</th>
            <th class="short">Tanggal</th>
            <th class="short">Nama Satker</th>
            <th class="short">Pertanyaan</th>
            <th class="short">Prioritas</th>
            <th class="">&nbsp;</th>
        </tr>
        </thead>
        <tfoot>
        <tr>
            <td colspan="6">&nbsp;</td>
        </tr>
        </tfoot>
        <tbody>

            <?php $i = 1 ?>
            <?php foreach ($pertanyaan->result() as $value): ?>
        <tr>
            <td><?php echo $i++ ?></td>
            <td><?php echo table_tanggal($value->tanggal) ?></td>
            <td><?php echo $value->nama_satker ?></td>
            <td><?php echo $value->pertanyaan ?></td>
            <td>
                <?php if ($value->prioritas == 'high'): ?>
                <img src="<?php echo base_url(); ?>images/hight.png" style="width:30px; "/>
                <?php elseif ($value->prioritas == 'medium'): ?>
                <img src="<?php echo base_url(); ?>images/medium.png" style="width:30px; "/>
                <?php else: ?>
                <img src="<?php echo base_url(); ?>images/low.png" style="width:30px; "/>
                <?php endif ?>
            </td>
            <td class="action">
                <a href="<?php echo site_url('supervisor/jawab/index/' . $value->no_tiket_helpdesk) ?>" class="button blue-pill"/>Jawab</a>
            </td>
        </tr>
            <?php endforeach ?>

        </tbody>
    </table>


    <?php else: ?>
    Tidak ada pertanyaan yang dieskalasi
    <?php endif ?>

</div>
<script type="text/javascript" src="<?php echo base_url(); ?>js/fungsi.js"></script>