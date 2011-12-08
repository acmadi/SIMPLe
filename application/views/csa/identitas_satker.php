<script type="text/javascript">
    $(function() {
        $('#nama_kl').change(function() {
            var nama_kl = $('#nama_kl').val();
            $.get('<?php echo site_url('csa/identitas_satker/cari_kl/') ?>', {id_kementrian : nama_kl}, function(response) {
                $('#eselon').html(response);
            })
        })

        $('#kl_btn').click(function() {
            $('#kl').slideDown('fast');
            $('#kl').attr('disabled', false);
            $('#identitas_kl').show();
            $('#identitas_kl input').attr('disabled', false);
            $('#identitas_umum').hide();
            $('#identitas_umum input').attr('disabled', true);
        })

        $('#non_kl_btn').click(function() {
            $('#kl').slideUp('fast');
            $('#kl').attr('disabled', true);
            $('#identitas_kl').hide();
            $('#identitas_kl input').attr('disabled', true);
            $('#identitas_umum').show();
            $('#identitas_umum input').attr('disabled', false);
        })

        $('form').submit(function() {
            data = $(this).serialize();
//            console.log(data);
//            return false;
        })
    })
</script>

<ul id="nav">
    <li><a href="#tab1">Isi Identitas SatKer (simpan di tb_tiket_helpdesk)</a></li>
</ul>
<div class="clear"></div>
<br/>



<div class="content">
    <div style="display: none;" id="tab1" class="tab_konten">
        <h2 class="font-kanan">No Ticket : 0001.A56</h2>

        <div class="clear"></div>

        <div class="table">

            <?php echo form_open('csa/identitas_satker/save_identitas') ?>

                <fieldset>
                    <legend>Pilih siapa anda</legend>
                    <label><input type="radio" name="tipe" id="kl_btn" checked="checked" value="kl">K/L</label>
                    <label><input type="radio" name="tipe" id="non_kl_btn" value="non_kl">Umum</label>
                </fieldset>

                <fieldset id="kl">
                    <legend>Satker</legend>

                    <p>
                        <label>Kode - Nama K/L</label>
                        <select id="nama_kl">
                            <option value="">Pilih Kode - Nama K/L</option>
                            <?php foreach ($kementrian->result() as $value): ?>
                            <option value="<?php echo $value->id_kementrian ?>"><?php echo $value->id_kementrian ?>
                                - <?php echo $value->nama_kementrian ?></option>
                            <?php endforeach ?>
                        </select>
                    </p>
                    <p>
                        <label>Nama Eselon 1</label>
                        <select id="eselon" class="kl"></select>
                    </p>

                    <p>
                        <label>Nama Satker dan Kode</label>
                        <input type="text" id="nama_satker" class="kl" size="30" value="">
                    </p>
                </fieldset>

                <fieldset id="identitas_kl">
                    <!-- TODO: (simpan di tb_petugas_satker) field kurang tambahin -->
                    <legend>Identitas</legend>
                    <p>
                        <label>Nama</label>
                    <td><input type="text" name="nama_petugas" size="30"></td>
                    </p>
                    <p>
                        <label>Jabatan Petugas</label>
                    <td><input type="text" name"jabatan_petugas" size="30"></td>
                    </p>
                    <p>
                        <label>No. Hp</label>
                    <td><input type="text" name="no_hp" size="30"></td>
                    </p>
                    <p>
                        <label>No. Kantor</label>
                    <td><input type="text" name="no_kantor" size="30"></td>
                    </p>
                    <p>
                        <label>E-mail</label>
                    <td><input type="text" name="email" size="30"></td>
                    </p>
                </fieldset>

                <fieldset id="identitas_umum" style="display: none">
                    <legend>Identitas</legend>
                    <p>
                        <label>Nama</label>
                    <td><input type="text" id="nama" name="" size="30"></td>
                    </p>
                    <p class="kl">
                        <label>Instansi</label>
                    <td><input type="text" id="instansi" size="30"></td>
                    </p>
                    <p>
                        <label>Alamat</label>
                    <td><input type="text" id="alamat" name="" size="30"></td>
                    </p>
                    <p class="kl">
                        <label>Telpon</label>
                    <td><input type="text" id="no_hp" name="" size="30"></td>
                    </p>
                    <p>
                        <label>E-mail</label>
                    <td><input type="text" id="email" name="" size="30"></td>
                    </p>
                </fieldset>

                <div style="text-align: center; margin-top: 20px;">
                    <input type="submit" class="button blue-pill" value="Help Desk">
                    <input type="submit" class="button blue-pill" value="Saluran Pengaduan">
                    <input type="reset" class="button gray-pill" value="Reset">
                </div>

            </form>
        </div>
    </div>
</div>
