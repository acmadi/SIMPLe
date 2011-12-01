<script type="text/javascript " src="<?php echo base_url() . 'js/jquery-1.4.2.min.js' ?>"></script>
<script type="text/javascript">
    jQuery(function() {
        $('#id_satker').keyup(function() {
            var id_satker = $(this).val();
            setTimeout(function() {
                console.log(id_satker);
                $.post('<?php echo site_url('/satker/form_revisi_anggaran/search_satker') ?>', id_satker, function(response) {
                    console.log(response);
                });
            }, 2000);

        })
    });
</script>

<?php if ($this->session->flashdata('msg')): ?>
<div id="notice" style="padding: 4px; background: #ffffaa; text-align: center;">
    <?php echo $this->session->flashdata('msg') ?>
</div>
<?php endif ?>

<div id="konten">
    <div style="display: none;" id="tab1" class="tab_konten">

        <h2 style="font-weight:bold; color:#000; text-align:center; ">FORMULIR ISIAN PENGAJUAN REVISI ANGGARAN</h2>
        <br/>

        <form method="post" action="<?php echo site_url('/satker/form_revisi_anggaran/add_revisi_anggaran') ?>">
            <div class="table">
                <div id="head">
                    <span style="margin:-5px 0px 0px -1420px; padding-left:10px; position:absolute; width:80px; height:10px; background:#FFF;">Data Satker</span>

                    <div id="cari_unit" action="man_unit_cari"
                         style="border: 1px solid #999; padding: 13px 30px 13px 13px; margin:5px 0px 0px 20px; width:96%; margin:0px 20px 0px 20px; ">
                        <table style="margin:10px; text-align:left; font-size:10px; ">
                            <tr>
                                <td>Tanggal Surat Pengajuan</td>
                                <td>10 November 2011</td>
                            </tr>
                            <tr>
                                <td>Kode Satker</td>
                                <td><input type="text" validation="" id="id_satker" name="id_satker" value=""
                                           placeholder="Masukkan Kode Satker" size="100"/></td>
                            </tr>
                            <tr>
                                <td>Nama Satker</td>
                                <td><input type="text" id="nama_satker" value="" size="100" disabled="disabled"/>
                                </td>
                            </tr>
                            <tr>
                                <td>Nama Petugas</td>
                                <td><input type="text" name="nama_petugas" value="" size="100"/></td>
                            </tr>
                            <tr>
                                <td>Jabatan Petugas</td>
                                <td><input type="text" name="jabatan" value="" size="100"/></td>
                            </tr>
                            <tr>
                                <td>No HP</td>
                                <td><input type="text" name="no_hp" value="" size="100"/></td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div id="tail">
                    <span style="margin:-5px 0px 0px -1420px; padding-left:10px; position:absolute; width:80px; height:10px; background:#FFF;">Data Satker</span>

                    <div id="cari_unit" action="man_unit_cari"
                         style="border: 1px solid #999; padding: 13px 30px 13px 13px; margin:5px 0px 0px 20px; width:96%; margin:0px 20px 0px 20px; ">
                        <table style="margin:10px; text-align:left; font-size:10px; ">
                            <tr>
                                <td><input id="kelengkapan1" name="kelengkapan[]" type="checkbox" value="1" /></td>
                                <td><label for="kelengkapan1">Surat Pengajuan Revisi ANggaran</label></td>
                            </tr>
                            <tr>
                                <td><input id="kelengkapan2" name="kelengkapan[]" type="checkbox" value="2" /></td>
                                <td><label for="kelengkapan2">SP-RKA-K/L Sebelum Revisi</label></td>
                            </tr>
                            <tr>
                                <td><input id="kelengkapan3" name="kelengkapan[]" type="checkbox" value="3" /></td>
                                <td><label for="kelengkapan3">Konsep Usulan Revisi SP-RKA-K/L</label></td>
                            </tr>
                            <tr>
                                <td><input id="kelengkapan4" name="kelengkapan[]" type="checkbox" value="4" /></td>
                                <td><label for="kelengkapan4">Arsip Data Komputer RKA-K/L hasil revisi</label></td>
                            </tr>
                            <tr>
                                <td><input id="kelengkapan5" name="kelengkapan[]" type="checkbox" value="5" /></td>
                                <td><label for="kelengkapan5">TOR</label></td>
                            </tr>
                            <tr>
                                <td><input id="kelengkapan6" name="kelengkapan[]" type="checkbox" value="6"/></td>
                                <td><label for="kelengkapan6">RAB</label></td>
                            </tr>
                            <tr>
                                <td colspan="2"><input type="text" placeholder=".........." size="120"/></td>
                            </tr>
                            <tr>
                                <td colspan="2"><input type="text" placeholder=".........." size="120"/></td>
                            </tr>
                            <tr>
                                <td colspan="2"><input type="text" placeholder=".........." size="120"/></td>
                            </tr>
                            <tr>
                                <td colspan="2"><input type="text" placeholder=".........." size="120"/></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <input type="reset" value="reset" style="width:60px; height:25px; font-size:10px; float:left; margin-left:20px; margin-right:10px;"/>
            <input type="submit" value="kirim" style="width:60px; height:25px; font-size:10px; float:none;"/>

        </form>
    </div>
</div>
