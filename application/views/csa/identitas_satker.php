<script type="text/javascript">
    $(function() {
        $('#nama_kl').change(function(){
            var nama_kl = $('#nama_kl').val();
            $.get('<?php echo site_url('csa/identitas_satker/cari_kl/') ?>', {id_kementrian : nama_kl}, function(response) {
                $('#eselon').html(response);
            })
        })
    })
</script>

<ul id="nav">
    <li><a href="#tab1">Isi Identitas SatKer</a></li>
</ul>
<div class="clear"></div>
<br/>

<div id="konten">
    <div style="display: none;" id="tab1" class="tab_konten">
        <h2 class="font-kanan">No Ticket : 0001.A56</h2>

        <div class="clear"></div>

        <div class="table">
            <table>
                <tr>
                    <td>Kode - Nama K/L</td>
                    <td>
                        <select id="nama_kl">
                            <?php foreach ($kementrian->result() as $value): ?>
                            <option value="<?php echo $value->id_kementrian ?>"><?php echo $value->id_kementrian ?> - <?php echo $value->nama_kementrian ?></option>
                            <?php endforeach ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Nama Eselon 1</td>
                    <td><select id="eselon"></select></td>
                </tr>
                <tr>
                    <td>Nama Satker dan Kode</td>
                    <td><input type="text" id="nama_satker" size="30" value="Dirjen Anggaran"></td>
                </tr>
            </table>
            <br/><br/>


            <div class="border">
                <label class="labelborder">Identitas</label><br/>
                <table>
                    <tr>
                        <td>Nama Petugas</td>
                        <td><input type="text" id="nama_petugas" name="" size="30"></td>
                    </tr>
                    <tr>
                        <td>Jabatan Petugas</td>
                        <td><input type="text" id="jabatan_petugas" size="30"></td>
                    </tr>
                    <tr>
                        <td>No. Hp</td>
                        <td><input type="text" id="no_hp" name="" size="30"></td>
                    </tr>
                    <tr>
                        <td>No. Kantor</td>
                        <td><input type="text" id="no_kantor" name="" size="30"></td>
                    </tr>
                    <tr>
                        <td>E-mail</td>
                        <td><input type="text" id="email" name="" size="30"></td>
                    </tr>
                </table>
            </div>

            <div style="text-align: center; margin-top: 20px;">
                <input type="submit" class="button blue-pill" value="Help Desk">
                <input type="submit" class="button blue-pill" value="Saluran Pengaduan">
                <input type="reset" class="button gray-pill" value="Reset">
            </div>
        </div>
    </div>
</div>
