<div class="content">
    <h1>Ubah Telepon</h1>

    <?php generate_notifkasi() ?>

    <?php echo form_open('') ?>

    <table>
        <tr>
            <td><label for="nama">Nama</label></td>
            <td>
                <?php if (set_value('nama')): ?>
                <input type="text" name="nama" id="nama" value="<?php echo set_value('nama') ?>"/>
                <?php else: ?>
                <input type="text" name="nama" id="nama" value="<?php echo $telepon->nama ?>"/>
                <?php endif ?>
            </td>
        </tr>
        <tr>
            <td><label for="telepon">Telepon #1</label></td>
            <td>
                <?php if (set_value('telepon')): ?>
                <input type="text" name="telepon" id="telepon" value="<?php echo set_value('telepon') ?>"/>
                <?php else: ?>
                <input type="text" name="telepon" id="telepon" value="<?php echo $telepon->telepon1 ?>"/>
                <?php endif ?>
            </td>
        </tr>
        <tr>
            <td><label for="telepon2">Telepon #2</label></td>
            <td>
                <?php if (set_value('telepon2')): ?>
                <input type="text" name="telepon2" id="telepon2" value="<?php echo set_value('telepon2') ?>"/>
                <?php else: ?>
                <input type="text" name="telepon2" id="telepon2" value="<?php echo $telepon->telepon2 ?>"/>
                <?php endif ?>
            </td>
        </tr>
        <tr>
            <td><label for="keterangan">Keterangan</label></td>
            <td>
                <?php if (set_value('keterangan')): ?>
                <input type="text" name="keterangan" id="keterangan" value="<?php echo set_value('keterangan') ?>"/>
                <?php else: ?>
                <input type="text" name="keterangan" id="keterangan" value="<?php echo $telepon->keterangan ?>"/>
                <?php endif ?>
            </td>
        </tr>
        <tr>
            <td>Status</td>
            <td>
                <select name="approved">
                    <?php if ($telepon->approved): ?>
                        <option value="1" selected="selected">Ya</option>
                        <option value="0">Tidak</option>
                    <?php else: ?>
                        <option value="1">Ya</option>
                        <option value="0" selected="selected">Tidak</option>
                    <?php endif; ?>
                </select>
            </td>
        </tr>
    </table>

    <div>
        <input type="submit" value="Ubah" class="button green"/>
        <a href="<?php echo site_url('admin/telepon') ?>" class="button">Batal</a>
    </div>

    <?php echo form_close() ?>

</div>