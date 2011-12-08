<ul id="nav">
    <li><a href="#tab1" class="active">Manajemen Unit</a></li>
</ul>
<div class="clear"></div>
    <div id="konten">
        <div style="display: none;" id="tab1" class="tab_konten">


            <div class="table">
                <div id="head">
                    <div style="float: left;">
                        <a class="button blue-pill" href="<?php echo site_url('/admin/man_unit_tambah') ?>">Tambah</a>
                    </div>

                    <div style="float: right;">
                        <form id="cari_unit" action="man_unit_cari">
                            Kode Unit: <input type="text" value="" placeholder="Pencarian kode unit" />
                                <input class="button blue-pill" type="submit" value="Cari Unit" />
                        </form>
                    </div>
                </div>
                <div id="tail">
                    <table id="tableOne" class="yui">
                        <thead>
                        <tr>
                            <th>Kode Unit</th>
                            <th>Nama Unit</th>
                            <th class="action">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>


                        <?php foreach ($units->result() as $unit): ?>
                        <tr>
                            <td><?php echo $unit->kode_unit ?></td>
                            <td><?php echo $unit->nama_unit ?></td>
                            <td class="action">
                                <a href="<?php echo site_url('/admin/man_unit/edit/' . $unit->kode_unit) ?>">
                                    <img src="<?php echo base_url('images/edit.png') ?>" />
                                </a>
                                <a href="<?php echo site_url('/admin/man_unit/delete/' . $unit->kode_unit) ?>">
                                    <img src="<?php echo base_url('images/delete.png') ?>" />
                                </a>
                            </td>
                        </tr>
                        <?php endforeach ?>

                        </tbody>
                    </table>
                </div>
                <div class="pagination">Halaman <a href="#"><<</a> <a href="#">1</a> <a href="#">2</a> <a href="#">3</a>
                    <a href="#">4</a> <a href="#">5</a> <a href="#">6</a> <a href="#">>></a></div>
            </div>
        </div>