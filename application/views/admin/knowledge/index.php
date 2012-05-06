<div class="content">

    <?php generate_notifkasi() ?>

    <ul class="nav nav-tabs">
        <li class="active">
            <a href="#tab1" data-toggle="tab">Knowledge Base</a>
        </li>
        <li><a href="#tab2" data-toggle="tab">Kategory Knowledge Base</a></li>
    </ul>

    <div class="tab-content">
        <div class="tab-pane active" id="tab1">

            <div class="well">
                <a class="btn btn-primary" href="<?php echo site_url('/admin/knowledge/add_knowledge') ?>">Tambah</a>
            </div>


            <table class="table">
                <thead>
                <tr>
                    <!--<th class="short"><input type="checkbox"/></th>-->
                    <th class="no">No</th>
                    <th>Kategori</th>
                    <th>Pertanyaan</th>
                    <th>Ranah</th>
                    <th>&nbsp;</th>
                </tr>
                </thead>
                <tbody>

                <?php $i = 0 ?>
                <?php foreach ($knowledges->result() as $knowledge): ?>
                <tr>
                    <!--                        <td class="short"><input type="checkbox"/></td>-->
                    <td><?php echo ++$i?></td>
                    <td><?php echo $knowledge->kat_knowledge_base ?></td>
                    <td><?php echo $knowledge->judul?></td>
                    <td class="short">
                        <?php
                        if ($knowledge->is_public)
                            echo 'Publik';
                        else
                            echo 'Privat';
                        ?>
                    </td>
                    <td class="action">
                        <a href="<?php echo base_url()?>index.php/admin/knowledge_ubah/index/<?php echo $knowledge->id_knowledge_base?>"
                           class="btn btn-info btn-mini">
                            Ubah
                        </a>
                        <a href="<?php echo base_url()?>index.php/admin/knowledge/delete/<?php echo $knowledge->id_knowledge_base?>"
                           class="btn btn-danger btn-mini"
                           onclick="return confirm('Anda yakin akan menghapus?');">
                            Hapus
                        </a>
                    </td>
                </tr>
                    <?php endforeach ?>

                </tbody>
            </table>
        </div>


        <div class="tab-pane" id="tab2">
            <div class="well">
                <a class="btn btn-primary" href="<?php echo site_url('/admin/knowledge/add_category') ?>">Tambah Kategori</a>
            </div>

            <table class="table">
                <thead>
                <tr>
                    <!--                    <th class="short"><input type="checkbox"/></th>-->
                    <th class="no">No</th>
                    <th>Kategori</th>
                    <th>&nbsp;</th>
                </tr>
                </thead>
                <tbody>
                <?php $i = 1 ?>
                <?php foreach ($categories->result() as $category): ?>
                <tr>
                    <!--                    <td class="short"><input type="checkbox"/></td>-->

                    <td><?php echo $i++ ?></td>
                    <td><?php echo $category->kat_knowledge_base ?></td>
                    <td class="action">
                        <a href="#"
                           class="btn btn-info"
                           onclick="tampil_popup('<?php echo $category->id_kat_knowledge_base ?>','<?php echo $category->kat_knowledge_base ?>');">
                            Ubah
                        </a>
                        <a href="<?php echo base_url()?>index.php/admin/knowledge/delete_category/<?php echo $category->id_kat_knowledge_base?>"
                           class="btn btn-danger"
                           onclick="return confirm('Anda yakin akan menghapus?');">
                            Hapus
                        </a>
                    </td>

                </tr>
                    <?php endforeach ?>

                </tbody>
            </table>

        </div>
    </div>

</div>

<script>
    $(function () {
        $('.table').dataTable();
    })
</script>
