<script type="text/javascript">
    $(function() {
//        $('#nama_kl').blur(function() {
//            var nama_kl = $('#nama_kl').val();
//            $.get('<?php echo site_url('helpdesk/identitas_satker/cari_kl/') ?>', {id_kementrian : nama_kl}, function(response) {
//                console.log(response);
//                $('#eselon').html(response);
//                $('#kode_satker').removeAttr('disabled');
//            })
//        })

        $('#nama_kl').chosen().change(function(){
            var nama_kl = $(this).val();
            $.get('<?php echo site_url('helpdesk/identitas_satker/cari_kl/') ?>', {id_kementrian:nama_kl}, function (response) {
                console.log(response);
                $('#eselon').html(response);
                $('#eselon').trigger('liszt:updated');
                $('#kode_satker').removeAttr('disabled');
            })
        })

//        $('#kl_btn').click(function() {
//            $('#kl').slideDown('fast');
//            $('#kl').attr('disabled', false);
//            $('#identitas_kl').show();
//            $('#identitas_kl input').attr('disabled', false);
//            $('#identitas_umum').hide();
//            $('#identitas_umum input').attr('disabled', true);
//        })

//        $('#non_kl_btn').click(function() {
//            $('#kl').slideUp('fast');
//            $('#kl').attr('disabled', true);
//            $('#identitas_kl').hide();
//            $('#identitas_kl input').attr('disabled', true);
//            $('#identitas_umum').show();
//            $('#identitas_umum input').attr('disabled', false);
//        })

        $('form').submit(function() {
            data = $(this).serialize();
//            console.log(data);
//            return false;
        })

        var kementrian_list = [
        <?php
                    foreach ($kementrian->result() as $value) {
            echo sprintf("{ label: \"%s\", value: \"%s\" }, ", $value->id_kementrian . ' - ' . $value->nama_kementrian, $value->id_kementrian . ' - ' . $value->nama_kementrian);
        }
        ?>
        ];

//        $('#nama_kl').autocomplete({
//            source: kementrian_list
//        });

//        $('#kode_satker').autocomplete({
//            source: function(request, response) {
//                $.ajax({
//                    url: "<?php echo site_url('/helpdesk/identitas_satker/cari_satker') ?>",

//                    data: {
//                        term: request.term,
//                        eselon: $('#eselon').val(),
//                        nama_kl: $('#nama_kl').val()
//                    },

//                    dataType: 'json',

//                    success: function(data) {
//                        response(data);
//                    }
//                })
//            },
//            delay: 500,
//            minLength: 1
//        })

        $('select.chzn-select').chosen();

    })
</script>

<div class="content">

    <h1>Isi Identitas SatKer</h1>

        <?php
            $errors = validation_errors();
            if (!empty($errors)) {
                echo notification(validation_errors(), 'Error', 'red');
            }
        ?>

    <fieldset>
        <legend>Kategori</legend>
        <label><input type="radio" name="tipe" id="kl_btn" checked="checked" value="kl">K/L</label>
        <label><input type="radio" name="tipe" id="non_kl_btn" value="non_kl">Umum</label>
    </fieldset>

    <?php echo form_open('helpdesk/identitas_satker/save_identitas', array('id' => 'identitas_kl')) ?>

    <?php echo form_hidden('tipe', 'kl') ?>

<!--    <fieldset id="kl" style="float: left; margin-right: 20px; width: 570px; height: 320px;">-->
    <fieldset id="kl">
        <legend>Satker</legend>

        <p>
            <label>Kode - Nama K/L </label> &nbsp;
            <select name="nama_kl" id="nama_kl" class="chzn-select" style="width: 700px;">
                <?php
                foreach ($kementrian->result() as $value) {
                    echo sprintf("<option value='%s'>%s</option>", $value->id_kementrian, $value->id_kementrian . ' - ' . $value->nama_kementrian);
                }
                ?>
            </select>
        </p>

        <p>
            <label>Nama Eselon 1 </label>&nbsp;
            <select id="eselon" name="eselon" class="kl chzn-select" style="width: 700px;"></select>
        </p>

        <p class="kode_satker_p">
            <label>Kode - Nama Satker</label>
            <select name="kode_satker" id="kode_satker" class="kl chzn-select" style="width: 700px;"></select>
        </p>
    </fieldset>

<!--    <fieldset style="float: right; width: 570px; height: 320px;">-->
    <fieldset>
        <!-- TODO: (simpan di tb_petugas_satker) field kurang tambahin -->
        <legend>Identitas</legend>
        <p>
            <label>Nama </label>
            <input type="text" name="nama_petugas" size="30" value="<?php echo set_value('nama_petugas') ?>">
        </p>

        <p>
            <label>Jabatan Petugas </label>
            <input type="text" name="jabatan_petugas" size="30" value="<?php echo set_value('jabatan_petugas') ?>">
        </p>

        <p>
            <label>No. Handphone </label>
            <input type="text" name="no_hp" size="30" value="<?php echo set_value('no_hp') ?>">
        </p>

        <p>
            <label>No. Telpon Kantor </label>
            <input type="text" name="no_kantor" size="30" value="<?php echo set_value('no_kantor') ?>">
        </p>

        <p>
            <label>E-mail </label>
            <input type="email" name="email" size="30" value="<?php echo set_value('email') ?>">
        </p>
    </fieldset>

    <div class="clear"></div>

    <div style="text-align: right; margin-top: 20px;">
        <input type="submit" class="button blue-pill" value="Help Desk">
<!--        <input type="submit" class="button blue-pill" value="Saluran Pengaduan">-->
        <input type="reset" class="button gray-pill" value="Reset">
    </div>

    </form>

    <?php echo form_open('helpdesk/identitas_satker/save_identitas', array('id' => 'identitas_umum', 'style' => 'display: none')) ?>

    <?php echo form_hidden('tipe', 'non_kl') ?>

    <fieldset>
        <legend>Identitas</legend>
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

        <p class="kl">
            <label>Telpon</label>
            <input type="text" id="no_hp" name="no_hp" size="30" value="<?php echo set_value('no_hp') ?>">
        </p>

        <p>
            <label>E-mail</label>
            <input type="email" id="email" name="email" size="30" value="<?php echo set_value('email') ?>">
        </p>
    </fieldset>

    <div style="text-align: right; margin-top: 20px;">
        <input type="submit" class="button blue-pill" value="Help Desk">
<!--        <input type="submit" class="button blue-pill" value="Saluran Pengaduan">-->
        <input type="reset" class="button gray-pill" value="Reset">
    </div>

    </form>


</div>
