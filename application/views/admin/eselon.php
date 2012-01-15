<div class="content">

    <h1>Eselon</h1>
	
	
    <a href="<?php echo site_url('/admin/eselon/add/') ?>" class="button blue-pill">Tambah Eselon</a>

    <form method="get" action="<?php echo site_url('/admin/eselon/index/') ?>" style="text-align: right;">
        <input type="text" name="cari"/>
        <input type="submit" name="submit" value="Cari" class="button blue-pill"/>
    </form>

    <table style="width: 100%;">
        <thead>
        <tr>
            <th class="short">No</th>
            <th class="short">Kode Eselon</th>
            <th>Nama Eselon</th>
            <th>Kementrian</th>
            <th class="action">Aksi</th>
        </tr>
        </thead>
        <tbody>
        <?php $i = 1 ?>
        <?php foreach ($bla->result() as $value): ?>
        <tr>
            <td class="short"><?php echo $i++ ?></td>
            <td class="short"><a href="<?php echo site_url('/admin/eselon/view_eselon/' . $value->id_unit) ?>"><?php echo $value->id_unit ?></a></td>
            <td style=""><a href="<?php echo site_url('/admin/eselon/view_eselon/' . $value->id_unit) ?>"><?php echo $value->nama_unit ?></a></td>
            <td style=""><?php echo $value->nama_kementrian ?></td>
            <td class="action">
                <a href="<?php echo site_url('/admin/eselon/edit/' . $value->id_unit) ?>" class="button blue-pill">Edit</a>
            </td>
        </tr>
        <?php endforeach ?>

        </tbody>
    </table>

    <?php echo $this->pagination->create_links() ?>

</div>