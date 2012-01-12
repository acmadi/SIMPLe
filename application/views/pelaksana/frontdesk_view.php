<div id="konten">

    <div style="text-align: right;">
        <a href="<?php echo site_url('pelaksana/frontdesk') ?>" class="button gray-pill">Batal</a>
    </div>

    <h1>Formulir Isian Pengajuan Revisi Anggaran</h1>

    <div class="table">
        <div id="head">

            <div style="float:right; font-weight:bold;">
                No Tiket : <?php echo sprintf('%05d', $tiket->no_tiket_frontdesk) ?>
            </div>

            <span style="margin:0px 0px 0px -1250px; padding-left:10px; position:absolute; width:115px; height:10px; background:#FFF;">Identitas Satker</span>

            <div id="cari_unit" action="man_unit_cari"
                 style="border: 1px solid #999; padding: 13px 30px 13px 13px; margin:5px 10px 0px 20px; width:96%; ">
                <table>
                    <tr>
                        <td>Tanggal Surat Pengajuan</td>

                        <td><?php echo $tiket->tanggal ?></td>
                    </tr>
                    <tr>
                        <td>Kode Satker</td>

                        <td><?php echo $tiket->id_satker ?></td>
                    </tr>
                    <tr>
                        <td>Nama Satker</td>

                        <td><?php echo $tiket->nama_satker ?></td>
                    </tr>
                    <tr>
                        <td>Nama Petugas</td>

                        <td><?php echo $tiket->nama_petugas ?></td>
                    </tr>
                    <tr>
                        <td>Jabatan Petugas</td>

                        <td><?php echo $tiket->jabatan_petugas ?></td>
                    </tr>
                </table>
            </div>

            <div id="tail">
                <h4 style="font-weight:bold; color:#000; margin:10px 0 10px 20px; ">
                    Check List Kelengkapan Dokumen Revisi Anggaran</h4>
                <ul style="list-style:circle; margin-left:35px; ">
                    <?php foreach ($bla as $value): ?>

                    <?php endforeach ?>
                    <li>Surat Pengajuan Revisi Anggaran (Asli)</li>
                    <li>SP-RKA-K/L Sebelum Revisi</li>
                    <li>Konsep Usulan Revisi SP-RKA-K/L</li>
                    <li>TOR</li>
                    <li>RAB</li>
                </ul>
            </div>
            <!--            <div class="pagination">Halaman <a href="#"><<</a> <a href="#">1</a> <a href="#">2</a> <a href="#">3</a> <a-->
            <!--                    href="#">4</a> <a href="#">5</a> <a href="#">6</a> <a href="#">>></a></div>-->
            <br/>
        </div>

    </div>
    <input type="submit" value="Print" style="width:100px; height:25px; float:left; margin-right:10px; "/>

    <input type="submit" value="Dilanjutkan" onclick="alert('Data berhasil dieskalasi'); window.location.href='<?php echo site_url('pelaksana/frontdesk') ?>';" style="width:100px; height:25px; float:right; margin-right:10px; "/>
    <input type="submit" value="Cetak BALD" style="width:100px; height:25px; float:right; margin-right:10px; "/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <div class="clear"></div>

</div>

</div>