<script type="text/javascript">
    $(function(){
        $('.chzn-single').chosen();
        $('#id_kementrian').chosen().change(function () {
            var unit = $('#id_unit');
            $this = $(this);

            $.get('<?php echo site_url('/helpdesk/identitas_satker/cari_kl/') ?>/' + $this.val(),
                function(response) {
                    unit.html('<option></option>' + response);
                    unit.trigger("liszt:updated");
                });
        });
    })
</script>

<div class="content">

    <h1>Tambah Satker</h1>

    <?php generate_notifkasi() ?>

    <form method="post" action="<?php site_url('/admin/satker/add') ?>">

        <p>
            <label>Nama Kementerian</label>
            <select name="id_kementrian" id="id_kementrian" class="chzn-single" data-placeholder="Kementerian" style="width: 720px;">
                <option value=""></option>
                <?php foreach ($kementrian->result() as $value): ?>
                <?php if (set_value('id_kementrian') == $value->id_kementrian): ?>
                    <option selected value="<?php echo $value->id_kementrian ?>">
                        <?php echo $value->id_kementrian ?> - <?php echo $value->nama_kementrian ?>
                    </option>
                    <?php else: ?>
                    <option value="<?php echo $value->id_kementrian ?>">
                        <?php echo $value->id_kementrian ?> - <?php echo $value->nama_kementrian ?>
                    </option>
                    <?php endif ?>
                <?php endforeach ?>
            </select>
        </p>

        <p>
            <label>Nama Eselon I</label>
            <select name="id_unit" id="id_unit" class="chzn-single" data-placeholder="Eselon I" style="width: 720px;">
            </select>
        </p>

        <p>
            <label>Kode Satker</label>
            <input type="text" name="id_satker" value="<?php echo set_value('id_satker') ?>" maxlength="6"/>
            <?php echo form_error('id_unit', '<div class="error">', '</div>'); ?>
        </p>

        <p>
            <label>Nama Satker</label>
            <input type="text" name="nama_satker" value="<?php echo set_value('nama_satker')?> "/>
            <?php echo form_error('nama_satker', '<div class="error">', '</div>'); ?>
        </p>

        <p>
            <input type="submit" class="button blue-pill" value="Simpan"/>
        </p>
    </form>
</div>