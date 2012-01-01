<div class="content">
    <h1>Form Pengembalian Dokumen</h1>

    <div>
        <p>
            <label style="width: 100px; display: inline-block;">No Tiket</label>
            <span>#<?php echo sprintf('%05d', $this->uri->segment(4)) ?></span>
        </p>

        <p>
            <label style="width: 100px; display: inline-block;">Kode Satker</label>
            <span><?php echo $data->id_satker ?></span>
        </p>

        <p>
            <label style="width: 100px; display: inline-block;">Nama Satker</label>
            <span><?php echo $data->nama_satker ?></span>
        </p>
    </div>

    <form method="post" action="<?php echo site_url('/pelaksana/frontdesk/reject/' . $this->uri->segment(4)) ?>">
        <input type="hidden" name="no_tiket_frontdesk" value="<?php echo $this->uri->segment(4) ?>"/>
        <input type="hidden" name="id_user" value="<?php echo $data->id_satker ?>"/>

        <p>
            <label>Catatan Pengembalian Dokumen<br/>
                <textarea name="catatan" rows="10" cols="170"></textarea>
            </label>
        </p>

        <p>
            <input type="submit" value="Kirim" class="button blue-pill"/>
        </p>
    </form>
</div>