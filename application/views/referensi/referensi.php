<div class="content">
    <h1>Referensi Peraturan</h1>

    <?php if ($referensi->num_rows() > 0): ?>

    <table class="table">
        <thead>
        <tr>
            <th class="no">No</th>
            <th class="small">Kategori</th>
            <th class="medium">Referensi</th>
            <th class="medium">File</th>
        </tr>
        </thead>
        <tfoot>
        <tr>
            <td colspan="4">&nbsp;</td>
        </tr>
        </tfoot>
        <tbody>
        <?php $i = 1 ?>
        <?php foreach ($referensi->result() as $value): ?>
        <tr>
            <td><?php echo $i++ ?></td>
            <td><?php echo $value->nama_kat ?></td>
            <td><?php echo $value->nama_ref ?></td>
            <td>
			<?php 
				  $file = realpath('upload/referensi/'.$value->nama_file);
				  if(file_exists($file) AND $value->nama_file != '' ): ?>
						<a class="button green" href="<?php echo base_url('upload/referensi/'.$value->nama_file);?>">Download</a>
			<?php else: ?>
						<span class="button red">Tidak ada file</span>
			<?php endif; ?>
			</td>
         
        </tr>
            <?php endforeach ?>
        </tbody>
    </table>

    <?php else: ?>

    <div class="notification yellow">Tidak ada data referensi peraturan</div>

    <?php endif; ?>

</div>