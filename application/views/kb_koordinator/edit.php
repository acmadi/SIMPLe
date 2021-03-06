<div class="content">
    <h1>Edit Knowledge Base</h1>

    <?php generate_notifkasi() ?>
	
	<fieldset style="float:left;width:98%;">
    <form method="post" enctype="multipart/form-data" action="<?php echo site_url('/kb_koordinator/edit/' . $this->uri->segment('3')) ?>">
        <p>
            <label class="aligned">Kategori</label>
            <select name="id_kat_knowledge_base">
                <?php foreach ($categories->result() as $value): ?>
                <?php if ($value->id_kat_knowledge_base == $kb->id_kat_knowledge_base): ?>
                    <option selected value="<?php echo $value->id_kat_knowledge_base ?>"><?php echo $value->kat_knowledge_base ?></option>
                    <?php else: ?>
                    <option value="<?php echo $value->id_kat_knowledge_base ?>"><?php echo $value->kat_knowledge_base ?></option>
                    <?php endif ?>
                <?php endforeach ?>
            </select>
        </p>

        <p>
            <label class="aligned">Nama Nara Sumber</label>
            <input type="text" name="nama_narasumber" value="<?php echo $kb->nama_narasumber ?>"/>
        </p>

        <p>
            <label class="aligned">Jabatan Nara Sumber</label>
            <input type="text" name="jabatan_narasumber" value="<?php echo $kb->jabatan_narasumber ?>"/>
        </p>

        <p>
            <label class="aligned">Ranah</label>
            <select name="is_public">
                <?php if ($kb->is_public): ?>
                <option value="0">Privat</option>
                <option value="1" selected>Publik</option>
                <?php else: ?>
                <option value="0" selected>Privat</option>
                <option value="1">Publik</option>
                <?php endif ?>
            </select>
        </p>

        <p>
            <label class="aligned">Tipe</label>
            <select name="tipe">
				<?php if ($kb->tipe): ?>
                <option value="0">Permanent</option>
                <option value="1" selected>Workaround</option>
                <?php else: ?>
                <option value="0" selected>Permanent</option>
                <option value="1">Workaround</option>
                <?php endif ?>
            </select>
        </p>
		
		<p>
            <label class="aligned">Topik</label>
            <input type="text" name="topik" value="<?php echo $kb->judul ?>"/>
        </p>
	
        <p>
            <label class="aligned">Pertanyaan</label>
            <input type="text" name="judul" value="<?php echo $kb->desripsi ?>"/>
        </p>

        <p>
            <label class="aligned">Jawaban</label>
            <textarea name="jawaban" style="width: 60%; min-height: 70px;"><?php echo $kb->jawaban ?></textarea>
        </p>

        <p>
            <label class="aligned">Bukti File</label>
            <input type="file" name="bukti_file"/>&nbsp;
			<?php 
				if($kb->bukti_file):
			?><span class="button red"><?php echo $kb->bukti_file;?></span>
				<?php
				endif;
				?>
        </p>

        <p>
            <input type="submit" class="button green" value="Simpan"/>
            <a href="<?php echo site_url('/kb_koordinator/knowledge_base') ?>" class="button">Kembali</a>
        </p>

    </form>
	</fieldset>
</div>