<script type="text/javascript">
    $(function () {
        $('#calendar').datepicker();
    })
</script>

<div class="content">
    <h1>Tambah Data Kalender Baru</h1>

    <?php
    if ($this->session->flashdata('success')) {
        echo '<div class="success">' . $this->session->flashdata('success') . '</div>';
    }
    if ($this->session->flashdata('error')) {
        echo '<div class="error">' . $this->session->flashdata('error') . '</div>';
    }
    if ($this->session->flashdata('notice')) {
        echo '<div class="notice">' . $this->session->flashdata('notice') . '</div>';
    }
    if ($this->session->flashdata('info')) {
        echo '<div class="info">' . $this->session->flashdata('info') . '</div>';
    }
    ?>

    <fieldset>
        <legend>Tanggal Libur</legend>
        <form method="post" action="<?php echo site_url('/admin/calendar/add') ?>">
            <input name="calendar" id="calendar"/>

            <p>
                <input type="submit" name="submit" value="Simpan" class="button blue-pill"/>
                <a href="<?php echo site_url('/admin/calendar') ?>" class="button gray-pill">&laquo; Kembali</a>
            </p>
        </form>
    </fieldset>
</div>