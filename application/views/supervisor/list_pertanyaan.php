<ul id="nav">
    <li><a href="#tab1" class="active">Manajemen User</a></li>
</ul>
<div class="clear"></div>
    <div id="konten">
        <div style="display: none;" id="tab1" class="tab_konten">


            <div class="table">
                <div id="head">
                    <div id="form-cari">
                        Urutkan berdasar :
                        <form action="<?php echo '' ?>" method="get" name="form">
                            <select name="sort" onchange="javascript: $('form').submit() ">
                                <option value="" selected="selected"> - </option>
                                <option value="tanggal">Tanggal</option>
                                <option value="prioritas">Prioritas</option>
                            </select>
                        </form>
                    </div>

                    <input id="tambah" class='button' type="submit" value="17 tiket" style="background:#D65703; width:80px; color:#FFF; "/>

                </div>
                <div id="tail">
                    <table id="tableOne" class="yui">
                        <thead>
                        <tr>
                            <th class="short">No</th>
                            <th class="short">Tanggal</th>
                            <th>Nama Satker</th>
                            <th>Subjek</th>
                            <th class="short">Prioritas</th>
                            <th class="action">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php $i = 1 ?>
                        <?php foreach ($pertanyaan->result() as $value): ?>
                        <tr>
                            <td class="short"><?php echo $i++ ?></td>
                            <td class="short"><?php echo $value->tanggal ?></td>
                            <td><?php echo $value->nama_satker ?></td>
                            <td><?php echo $value->pertanyaan ?></td>
                            <td class="short">
                                <?php if ($value->prioritas == 'high'): ?>
                                    <img src="<?php echo base_url(); ?>images/hight.png" style="width:30px; "/>
                                <?php elseif ($value->prioritas == 'medium'): ?>
                                    <img src="<?php echo base_url(); ?>images/medium.png" style="width:30px; "/>
                                <?php else: ?>
                                    <img src="<?php echo base_url(); ?>images/low.png" style="width:30px; "/>
                                <?php endif ?>
                            </td>
                            <td class="action">
                                <a href="<?php echo site_url('supervisor/jawab/' . $value->no_tiket_helpdesk) ?>" class="button blue-pill" />Jawab</a>
                            </td>
                        </tr>
                        <?php endforeach ?>

                        </tbody>
                    </table>
                </div>
                <div class="pagination">Halaman <a href="#"><<</a> <a href="#">1</a> <a href="#">2</a> <a href="#">3</a> <a href="#">4</a> <a href="#">5</a> <a href="#">6</a> <a href="#">>></a></div>
                <br/>
            </div>
        </div>


        <script type="text/javascript" src="<?php echo base_url(); ?>js/fungsi.js"></script>