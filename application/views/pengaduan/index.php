<script type="text/javascript">
    $(function () {
        $('#nama_kl').chosen().change(function () {
            var nama_kl = $(this).val();
            $.get('<?php echo site_url('helpdesk/identitas_satker/cari_kl/') ?>/' + nama_kl, function (response) {
                console.log(response);
                response = '<option></option>' + response;
                $('#eselon').html(response);
                $('#eselon').trigger('liszt:updated');
                $('#kode_satker').removeAttr('disabled');
            })
        })

        $('#eselon').chosen().change(function () {
            id_kementrian = substr($('#nama_kl').val(), 0, 3);
            url = '<?php echo site_url('frontdesk/form_revisi_anggaran/anggaran') ?>/' + id_kementrian;
            console.log(url);
            $.get(url, function (response) {
                $('#anggaran').html('A' + response);
            });

            url = '<?php echo site_url('frontdesk/form_revisi_anggaran/cari_satker') ?>/' + id_kementrian + '/' + $(this).val();
            console.log(url);
            $.get(url, function (response) {
                response = '<option></option>' + response;
                $('#kode_satker').html(response);
                $('#kode_satker').trigger('liszt:updated');
                console.log(response);
            });
        });

        $('#kl_btn').click(function () {
            $('#kl').slideDown('fast');
            $('#kl').attr('disabled', false);
            $('#identitas_kl').show();
            $('#identitas_kl input').attr('disabled', false);
            $('#identitas_umum').hide();
            $('#identitas_umum input').attr('disabled', true);
        })

        $('#non_kl_btn').click(function () {
            $('#kl').slideUp('fast');
            $('#kl').attr('disabled', true);
            $('#identitas_kl').hide();
            $('#identitas_kl input').attr('disabled', true);
            $('#identitas_umum').show();
            $('#identitas_umum input').attr('disabled', false);
        })
    })
</script>



<!--<ul id="nav">-->
<!--    <li><a href="#tab1">Isi Identitas SatKer (simpan di tb_tiket_helpdesk)</a></li>-->
<!--</ul>-->
<div class="content">

    <h1>Form Pengaduan</h1>

    <?php
    $errors = validation_errors();
    if (!empty($errors)) {
        echo '<div class="error">' . validation_errors() . '</div>';
    }
    ?>

    <fieldset>
        <legend>Kategori</legend>
        <label><input type="radio" name="tipe" id="kl_btn" checked="checked" value="kl">K/L</label>
        <label><input type="radio" name="tipe" id="non_kl_btn" value="non_kl">Umum</label>
    </fieldset>

    <?php echo form_open('/pengaduan/dashboard/save_identitas', array('id' => 'identitas_kl')) ?>

    <?php echo form_hidden('tipe', 'kl') ?>

    <!--    <fieldset id="kl" style="float: left; margin-right: 20px; width: 570px; height: 320px;">-->
    <fieldset id="kl" class="left" style="height: 250px;">
        <legend>Satker</legend>

        <p>
            <label>Kode - Nama K/L</label>
            <select name="nama_kl" id="nama_kl" class="chzn-select" data-placeholder="Pilih K/L" style="width: 400px;">
                <option></option>
                <?php
                foreach ($kementrian->result() as $value) {
                    if ($value->id_kementrian == set_value('nama_kl')) {
                        echo sprintf("<option selected value='%s'>%s</option>", $value->id_kementrian, $value->id_kementrian . ' - ' . $value->nama_kementrian);
                    }
                    else {
                        echo sprintf("<option value='%s'>%s</option>", $value->id_kementrian, $value->id_kementrian . ' - ' . $value->nama_kementrian);
                    }
                }
                ?>
            </select>
        </p>

        <p>
            <label>Nama Eselon 1</label>
            <select id="eselon" name="eselon" class="kl chzn-select" data-placeholder="Pilih Eselon I" style="width: 400px;"></select>
        </p>

        <p>
            <label>Kode - Nama Satker</label>
            <select name="kode_satker" id="kode_satker" class="kl chzn-select" data-placeholder="Pilih Satker" style="width: 400px;"></select>
        </p>
    </fieldset>
    <fieldset style="float: left; margin-left: 15px; width: 47%; height: 250px;" class="identitas">
        <legend>Identitas</legend>

        <p>
            <label class="aligned">Nama</label>
            <input type="text" name="nama_petugas" size="30" value="<?php echo set_value('nama_petugas') ?>">
        </p>

        <p>
            <label class="aligned">Jabatan Petugas</label>
            <input type="text" name="jabatan_petugas" size="30" value="<?php echo set_value('jabatan_petugas') ?>">
        </p>

        <p>
            <label class="aligned">Nomor HP</label>
            <input type="text" name="no_hp" size="30" value="<?php echo set_value('no_hp') ?>">
        </p>

        <p>
            <label class="aligned">Telepon Kantor</label>
            <input type="text" name="no_kantor" size="30" value="<?php echo set_value('no_kantor') ?>">
        </p>

        <p>
            <label class="aligned">E-mail</label>
            <input type="email" name="email" size="30" value="<?php echo set_value('email') ?>">
        </p>
    </fieldset>


    <div class="clear"></div>

    <fieldset class="identitas">
        <legend>Pengaduan</legend>
        <p>
            <!--label>Kepada</label>
            <select name="kepada">
                <?php foreach ($level->result() as $value): ?>
                <option value="<?php echo $value->lavel ?>"><?php echo $value->nama ?></option>
                <?php endforeach ?>
            </select-->
        </p>

        <p>
            <label>Pengaduan</label>
            <textarea name="pengaduan" style="width: 940px; height: 175px;"></textarea>
        </p>
    </fieldset>

    <div style="text-align: right; margin-top: 20px;">
        <input type="submit" class="button green" value="Kirim">
        <!--        <input type="submit" class="button blue-pill" value="Saluran Pengaduan">-->
        <input type="reset" class="button" value="Reset">
    </div>

    </form>

    <?php echo form_open('pengaduan/dashboard/save_identitas', array('id' => 'identitas_umum', 'style' => 'display: none')) ?>

    <?php echo form_hidden('tipe', 'non_kl') ?>

    <fieldset>
        <legend>Identitas</legend>
        <div class="grid_5">
            <p>
                <label>Nama</label>
                <input type="text" id="nama" name="nama_petugas" size="30" value="<?php echo set_value('nama_petugas') ?>">
            </p>

            <p class="kl">
                <label>Instansi</label>
                <input type="text" id="instansi" name="instansi" size="30" value="<?php echo set_value('instansi') ?>">
            </p>

            <p>
                <label>Alamat</label>
                <input type="text" id="alamat" name="alamat" size="30" value="<?php echo set_value('alamat') ?>">
            </p>
        </div>

        <div class="grid_5">
            <p class="kl">
                <label>Telepon</label>
                <input type="text" id="no_hp" name="no_hp" size="30" value="<?php echo set_value('no_hp') ?>">
            </p>

            <p>
                <label>E-mail</label>
                <input type="email" id="email" name="email" size="30" value="<?php echo set_value('email') ?>">
            </p>
        </div>
    </fieldset>

    <fieldset>
        <legend>Pengaduan</legend>
        <p>
            <!--label>Kepada</label>
            <select name="kepada">
                <?php foreach ($level->result() as $value): ?>
                <option value="<?php echo $value->lavel ?>"><?php echo $value->nama ?></option>
                <?php endforeach ?>
            </select-->
        </p>

        <p>
            <label>Pengaduan</label>
            <textarea name="pengaduan" style="width: 940px; height: 175px;"></textarea>
        </p>
    </fieldset>

    <div style="text-align: right; margin-top: 20px;">
        <input type="submit" class="button green" value="Kirim">
        <!--        <input type="submit" class="button blue-pill" value="Saluran Pengaduan">-->
        <input type="reset" class="button gray-pill" value="Reset">
    </div>

    </form>


</div>
