<ul id="nav">
    <li><a href="#tab1" class="active">Knowledge Ubah</a></li>
</ul>
<div class="clear"></div>
    <div id="konten">
        <div style="display: none;" id="tab1" class="tab_konten">
            <?php echo validation_errors(); ?>

            <div class="table">
                <?php echo form_open_multipart('admin/knowledge_ubah/save', array('style' => "border: 1px solid #999; padding: 13px 30px 13px 13px; margin:5px 0px 0px 20px; font-size:12px")); ?>
                <?php if (isset($ubah->id_knowledge_base)) echo form_hidden('id', $ubah->id_knowledge_base);?>
                <table>
                    <tr>
                        <td>Kategori</td>
                        <td>:</td>
                        <td>
                            <select name="fkategori">
                                <option>Peraturan</option>
                                <?php foreach ($list_kat->result() as $lk):
                                if ($lk->id_kat_knowledge_base == $ubah->id_kat_knowledge_base):
                                    ?>
                                    <option value="<?php echo $lk->id_kat_knowledge_base?>"
                                            selected><?php echo $lk->kat_knowledge_base?></option>
                                    <?php else: ?>
                                    <option value="<?php echo $lk->id_kat_knowledge_base?>"><?php echo $lk->kat_knowledge_base?></option>
                                    <?php      endif;
                            endforeach;?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Pertanyaan</td>
                        <td>:</td>
                        <td><input type="text" name="fjudul" size="65" value="<?php echo $ubah->judul?>"/></td>
                    </tr>
                    <tr>
                        <td valign="top">Deskripsi</td>
                        <td valign="top">:</td>
                        <td><textarea name="fdeskripsi" cols="58" rows="6"><?php echo $ubah->desripsi?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td valign="top">Jawaban</td>
                        <td valign="top">:</td>
                        <td><textarea name="fjawaban" cols="58" rows="6"><?php echo $ubah->jawaban?></textarea></td>
                    </tr>
                    <tr>
                        <td>Ranah</td>
                        <td valign="top">:</td>
                        <td>
                            <select name="is_public">
                                <option value="0">Privat</option>
                                <option value="1">Publik</option>
                            </select>
                        </td>
                    </tr>
                </table>
                <fieldset>
                    <legend>Sumber Jawaban</legend>

                    <p>
                        <label>Nama Nara Sumber</label>

                        <input type="text" name="fsumber" value="<?php echo $ubah->nama_narasumber?>"/>
                    </p>


                    <p>
                        <label>Jabatan</label>

                        <input type="text" name="fjabatan" value="<?php echo $ubah->jabatan_narasumber?>"/>
                    </p>

                    <p>
                        <label>Bukti file</label>

                        <input type="file" name="ffile"/>
                    </p>
                </fieldset>
                <div>
                    <input class="button blue-pill" type="submit" value="simpan"/>
                    <a href="<?php echo site_url('/admin/knowledge') ?>" class="button gray-pill">Batal</a>
                </div>
                <div style="clear: both;"></div>
                <?php echo form_close();?>

            </div>
