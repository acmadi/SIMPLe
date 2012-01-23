<div class="content">
    <h1>Form Pengembalian Dokumen</h1>

    <fieldset>
        <legend>Identitas</legend>

        <div class="grid_5">
            <p>
                <label style="width: 120px; display: inline-block;">No Tiket</label>
                <span>#<?php echo sprintf('%05d', $this->uri->segment(3)) ?></span>
            </p>

            <p>
                <label style="width: 120px; display: inline-block;">Kode - Nama K/L</label>
                <span><?php echo $data->id_kementrian . ' - ' . $data->nama_kementrian; ?></span>
            </p>

            <p>
                <label style="width: 120px; display: inline-block;">Kode - Nama Eselon</label>
                <span><?php echo $data->id_unit . ' - ' . $data->nama_unit; ?></span>
            </p>
        </div>
        <div class="grid_5">
            <p>
                <label style="width: 120px; display: inline-block;">Kode Satker</label>
                <span><?php echo $data->id_satker ?></span>
            </p>

            <p>
                <label style="width: 120px; display: inline-block;">Nama Satker</label>
                <span><?php echo $data->nama_satker ?></span>
            </p>
        </div>
    </fieldset>

    <form method="post" action="<?php echo site_url('/frontdesks/reject/' . $this->uri->segment(3)) ?>">
        <input type="hidden" name="no_tiket_frontdesk" value="<?php echo $data->no_tiket_frontdesk; ?>"/>
        <input type="hidden" name="id_user" value="<?php echo $data->id_satker ?>"/>

        <fieldset>
            <legend>Catatan Pengembalian Dokumen</legend>
            <textarea name="catatan" style="width: 930px; height: 200px;"></textarea>

            <hr/>
            <p>
                <input type="submit" value="Kirim" class="button green"/>
            </p>
        </fieldset>
    </form>
</div>