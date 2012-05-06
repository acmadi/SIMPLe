<script type="text/javascript">
    $(function () {
        $('#calendar').datepicker({
            dateFormat:'yy-mm-dd'
        });
    })
</script>

<div class="content">

    <div class="page-header">
        <h1>Tambah Data Kalender Baru</h1>
    </div>

    <?php generate_notifkasi() ?>

    <form method="post" action="<?php echo site_url('/admin/calendar/add') ?>" class="form-horizontal">
        <div class="control-group">
            <label class="control-label">Tanggal</label>

            <div class="controls">
                <input type="text" name="calendar" id="calendar"/>
            </div>
        </div>


        <div class="control-group">
            <label class="control-label">Keterangan</label>

            <div class="controls">
                <input type="text" name="keterangan"/>
            </div>
        </div>

        <div class="form-actions">
            <input type="submit" name="submit" value="Simpan" class="btn btn-primary"/>
            <a href="<?php echo site_url('/admin/calendar') ?>" class="btn">Batal</a>
        </div>
    </form>

</div>