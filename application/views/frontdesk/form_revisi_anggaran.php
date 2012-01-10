<script type="text/javascript">
    $(function ($) {

        function split(val) {
            return val.split(/,\s*/);
        }

        function extractLast(term) {
            return split(term).pop();
        }

        $(function () {
            $('#nama_kl_input').live('blur', function () {
                var nama_kl = $('#nama_kl_input').val();
                $.get('<?php echo site_url('helpdesk/identitas_satker/cari_kl/') ?>', {id_kementrian:nama_kl}, function (response) {
                    console.log(response);
                    $('#eselon').html(response);
                    $('#kode_satker').removeAttr('disabled');
                })
            })

            $('form').submit(function () {
                data = $(this).serialize();
//            console.log(data);
//            return false;
            })


            // Daftar Kementrian Statis aja biar cepet
            var kementrian_list = {};
            kementrian_list.results = [
            <?php
            foreach ($kementrian->result() as $value) {
                echo sprintf("{id:\"%s\",name:\"%s\"},\n", $value->id_kementrian, $value->id_kementrian . ' - ' . $value->nama_kementrian);
            }
            ?>
            ];
            kementrian_list.total = kementrian_list.results.length;

            // Tombol hapus
            $('#clear_nama_kl').click(function () {
                $('#nama_kl_input').val('');
            })

            // Tambah Dokumen Lainnya
            $('#other-doc-btn').live('click', function () {
                $('#other-docs').append('<p><input type="text" name="dokumen_lainnya[]"/></p>');
                $('#other-docs input:last-child').focus();
            })

            // Jangan sampai udah banyak ngetik,
            // ehh... ternyata kepencet enter.
            // Bubar semuanya, ngetik dari awal lagi deh (T_T)
            $('form').keypress(function (e) {
                if (e.which == 13) {
                    e.preventDefault();
                }

            })

            $('#nama_kl').flexbox(kementrian_list, {
                width:600,
                paging:true,
                onSelect:function () {
                }
            });
        })
    })
</script>

<div class="content">

    <h1>Form Revisi Anggaran</h1>

    <div class="clear"></div>

    <?php
    $errors = validation_errors();
    if (!empty($errors)) {
        echo '<div class="error">' . validation_errors() . '</div>';
    }
    ?>

    <?php echo form_open('frontdesk/form_revisi_anggaran/save_identitas', array('id' => 'identitas_kl')) ?>

    <?php echo form_hidden('tipe', 'kl') ?>

    <fieldset id="kl">
        <legend>Satker</legend>

        <div id="anggaran" style="padding: 20px; display: inline-block; float: right; font-size: 24px;"></div>

        <p>

        <div style="float: left; width: 150px;">Kode - Nama K/L</div>
        <div style="float: left;">
            <div id="nama_kl"></div>
        </div>
        <a href="javascript:void(0)" class="clear_btn" id="clear_nama_kl">Hapus</a>
        </p>

        <p>
            <label>Nama Eselon 1</label>
            <select id="eselon" name="eselon" class="kl" value="<?php echo set_value('eselon') ?>" style="width: 710px;">
            </select>
        </p>

        <p class="kode_satker_p">
            <label>Kode - Nama Satker</label>
            <input type="text" name="kode_satker" id="kode_satker" class="kl kode_satker" style="width: 700px;" disabled/>
        </p>

    </fieldset>

    <fieldset style="float: left; margin-right: 10px; width: 47%; height: 310px;">
        <legend>Identitas</legend>
        <p>
            <label>Nama</label>
            <input type="text" name="nama_petugas" size="30" value="<?php echo set_value('nama_petugas') ?>">
        </p>

        <p>
            <label>Jabatan Petugas</label>
            <input type="text" name="jabatan_petugas" size="30" value="<?php echo set_value('jabatan_petugas') ?>">
        </p>

        <p>
            <label>No. Hp</label>
            <input type="text" name="no_hp" size="30" value="<?php echo set_value('no_hp') ?>">
        </p>

        <p>
            <label>No. Kantor</label>
            <input type="text" name="no_kantor" size="30" value="<?php echo set_value('no_kantor') ?>">
        </p>

        <p>
            <label>E-mail</label>
            <input type="email" name="email" size="30" value="<?php echo set_value('email') ?>">
        </p>
    </fieldset>

    <fieldset style="float: right; width: 47%; height: 310px;">
        <legend>Kelengkapan Dokumen</legend>

        <div style="overflow: auto; height: 280px; margin: 0;">
            <?php foreach ($kelengkapan_dokumen->result() as $value): ?>

            <?php if ($value->id_kelengkapan != 0): ?>
                <p>
                    <label>
                        <input type="checkbox" name="dokumen[<?php echo $value->id_kelengkapan ?>]"/>
                        <?php echo $value->nama_kelengkapan ?>
                    </label>
                </p>
                <?php endif ?>
            <?php endforeach ?>

            <p id="other-docs"></p>

            <input type="button" id="other-doc-btn" class="button blue-pill" value="Tambah Dokumen Lain"/>
        </div>
    </fieldset>

    <div style="text-align: center; margin-top: 20px; clear: both;">
        <input type="submit" class="button blue-pill" value="Submit">
        <a href="<?php echo site_url('/frontdesk/form_revisi_anggaran') ?>" class="button gray-pill">Reset</a>
    </div>

    </form>
</div>
