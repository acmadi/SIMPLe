<style type="text/css">
    .ui-autocomplete {
        max-height: 300px;
        overflow-y: auto;
        /* prevent horizontal scrollbar */
        overflow-x: hidden;
        /* add padding to account for vertical scrollbar */
        padding-right: 20px;
    }
</style>

<script type="text/javascript">

    function split(val) {
        return val.split(/,\s*/);
    }
    function extractLast(term) {
        return split(term).pop();
    }

    $(function() {
        $('#nama_kl').blur(function() {
            var nama_kl = $('#nama_kl').val();
            $.get('<?php echo site_url('csa/identitas_satker/cari_kl/') ?>', {id_kementrian : nama_kl}, function(response) {
                console.log(response);
                $('#eselon').html(response);
                $('#kode_satker').removeAttr('disabled');
            })
        })

//        $('#eselon').change(function() {
        //$('#kode_satker').autoSuggest('<?php echo site_url('/csc/form_revisi_anggaran/cari_satker') ?>',
        //        {
        //            extraParams: '&eselon=' + $('#eselon').val()
        //        }
        //);
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

        $('#nama_kl').autocomplete({
            source: kementrian_list
        });

        $('#kode_satker')
                .autocomplete({
                    source: function(request, response) {
                        $.ajax({
                            url: "<?php echo site_url('/csc/form_revisi_anggaran/cari_satker') ?>",

                            data: {
                                term: extractLast(request.term),
                                eselon: $('#eselon').val(),
                                nama_kl: $('#nama_kl').val()
                            },

                            dataType: 'json',

                            success: function(data) {
                                $('#anggaran').html('A1');
                                response(data);
                            }
                        })
                    },
                    search: function() {
                        // custom minLength
                        var term = extractLast(this.value);
                        if (term.length < 2) {
                            return false;
                        }
                    },
                    focus: function() {
                        // prevent value inserted on focus
                        return false;
                    },
                    select: function(event, ui) {
                        var terms = split(this.value);
                        // remove the current input
                        terms.pop();
                        // add the selected item
                        terms.push(ui.item.value);
                        // add placeholder to get the comma-and-space at the end
                        terms.push("");
                        this.value = terms.join(", ");
                        return false;
                    },
                    change: function(event, ui) {
                        kode_unit_satker = (ui.item.label);
                        kode_unit_satker = substr(kode_unit_satker, 0, 6);
                        $.get('<?php echo site_url('/csc/form_revisi_anggaran/cari_kode_kon_unit_satker') ?>',
                                {kode_unit_satker: kode_unit_satker},
                                function(response) {
                                    $('#anggaran').html(response);
                                });
                    },
                    delay: 500,
                    minLength: 3
                })
                .bind("keydown", function(event) {
                    if (event.keyCode === $.ui.keyCode.TAB &&
                            $(this).data("autocomplete").menu.active) {
                        event.preventDefault();
                    }
                });

        $('#clear_nama_kl').click(function() {
            $('#nama_kl').val('');
        })


        $('legend').click(function() {
            alert(eselon.val());
        });
    })
</script>

<!--<ul id="nav">-->
<!--    <li><a href="#tab1">Isi Identitas SatKer (simpan di tb_tiket_helpdesk)</a></li>-->
<!--</ul>-->
<div class="content">

    <h1>Form Revisi Anggaran</h1>

    <div style="float: right;"><?php echo date('d M Y') ?></div>

    <div class="clear"></div>

        <?php
            $errors = validation_errors();
    if (!empty($errors)) {
        echo '<div class="error">' . validation_errors() . '</div>';
    }
    ?>

    <?php echo form_open('csc/form_revisi_anggaran/save_identitas', array('id' => 'identitas_kl')) ?>

    <?php echo form_hidden('tipe', 'kl') ?>

    <fieldset id="kl">
        <legend>Satker</legend>

        <div id="anggaran" style="padding: 20px; display: inline-block; float: right; font-size: 24px;"></div>

        <p>
            <label>Kode - Nama K/L</label>
            <input type="text" id="nama_kl" name="nama_kl" value="<?php echo set_value('nama_kl') ?>"/>
            <a href="javascript:void(0)" class="clear_btn" id="clear_nama_kl">Hapus</a>
        </p>

        <p>
            <label>Nama Eselon 1</label>
            <select id="eselon" name="eselon" class="kl" value="<?php echo set_value('eselon') ?>">
            </select>
        </p>

        <p class="kode_satker_p">
            <label>Kode - Nama Satker</label>
            <input type="text" name="kode_satker" id="kode_satker" class="kl kode_satker" size="100%" style="width: 100%;" disabled/>
        </p>

    </fieldset>

    <fieldset>
        <!-- TODO: (simpan di tb_petugas_satker) field kurang tambahin -->
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

    <fieldset>
        <legend>Kelengkapan Dokumen</legend>

        <?php foreach ($kelengkapan_dokumen->result() as $value): ?>
        <p>
            <label>
                <input type="checkbox" name="dokumen[<?php echo $value->id_kelengkapan ?>]"/>
                <?php echo $value->nama_kelengkapan ?>
            </label>
        </p>
        <?php endforeach ?>

    </fieldset>

    <div style="text-align: center; margin-top: 20px;">
        <input type="submit" class="button blue-pill" value="Submit">
        <input type="reset" class="button gray-pill" value="Reset">
    </div>

    </form>
</div>
