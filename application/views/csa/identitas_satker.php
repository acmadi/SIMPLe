<script type="text/javascript">
    $(function() {
        $('#kode_satker').blur(function() {
            var id_satker = $(this).val();
            setTimeout(function(){
                $.get('<?php echo site_url('/csa/identitas_satker/search_satker') ?>', {id_satker: id_satker}, function(response){
                    if (response) {

                        $('#nama_satker').val(response.nama_satker);
//                        alert(response.nama_satker);
//                        $('nama_petugas').val(response.);
                    }
                }, 'json')
            }, 1000);
        });
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
                    <td>Nama K/L</td>
                    <td>
                        <select>
                            <?php foreach ($kementrian->result() as $value): ?>
                            <option value="<?php echo $value->id_kementrian ?>"><?php echo $value->nama_kementrian ?></option>
                            <?php endforeach ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Kode K/L (id_kementrian di table tb_satker)</td>
                    <td><input type="text" id="kode_satker" name="kode_satker" size="30" value="630931"></td>
                </tr>
                <tr>
                    <td>Nama Eselon 1</td>
                    <td><select></select></td>
                </tr>
                <tr>
                    <td>Kode Eselon</td>
                    <td><input type="text" id="kode_satker" name="kode_satker" size="30" value="630931"></td>
                </tr>
                <tr>
                    <td>Nama Satker dan Kode</td>
                    <td><input type="text" id="nama_satker" size="30" value="Dirjen Anggaran" disabled="disabled"></td>
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

            <div class="letak-button-bawah">
                <input type="button" class="button" value="Submit">
                <input type="reset" class="button" value="Reset">
            </div>
        </div>
    </div>
</div>
