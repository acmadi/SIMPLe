<script type="text/javascript">
    $(function () {
        $('#calendar').datepicker({
            dateFormat: 'yy-mm-dd'
        });
    })
</script>

<div class="content">
    <h1>Ubah Data Kalender</h1>

    <?php generate_notifkasi() ?>

    <fieldset>
        <legend>Tanggal Libur</legend>
        <form method="post" action="<?php echo site_url('/admin/calendar/edit/' . $row->id) ?>">
            <p>
                <label style="width: 120px; display: inline-block; ">Tanggal</label>
                <input type="text" name="calendar" id="calendar" value="<?php echo $row->holiday ?>"/>
            </p>

            <p>
                <label style="width: 120px; display: inline-block;">Keterangan</label>
                <input type="text" name="keterangan" value="<?php echo $row->keterangan ?>"/>
            </p>

            <p>
                <input type="submit" name="submit" value="Simpan" class="button blue-pill"/>
                <a href="<?php echo site_url('/admin/calendar') ?>" class="button gray-pill">&laquo; Kembali</a>
            </p>
        </form>
    </fieldset>
</div>