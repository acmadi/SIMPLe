<div class="content">

    <h1>Konsultasi Help Desk</h1>

    <?php echo form_open('/helpdesk/helpdesk_form_pertanyaan/submit'); ?>

    <div style="text-align: right; text-decoration: underline; font-weight: bold; font-size: 14px;">
        No Tiket: <?php echo sprintf('%05d', $this->session->userdata('no_tiket')) ?>
    </div>

    <fieldset>
        <legend>Identitas</legend>

        <div class="grid_6">
            <p>
                <label style="display: inline-block; width: 100px;">No Tiket</label>
                <span><?php echo sprintf('%05d', $this->session->userdata('no_tiket')) ?></span>
            </p>

            <p>
                <label style="display: inline-block; width: 100px;">No Satker</label>
                <span><?php echo $identitas->id_satker ?></span>
            </p>

            <p>
                <label style="display: inline-block; width: 100px;">Nama Satker</label>
                <span><?php echo $identitas->nama_satker ?></span>
            </p>

            <p>
                <label style="display: inline-block; width: 100px;">Nama Petugas</label>
                <span><?php echo $identitas->nama_petugas ?></span>
            </p>
        </div>
        <div class="grid_5">
            <p>
                <label style="display: inline-block; width: 100px;">No Kantor</label>
                <span><?php echo $identitas->no_kantor ?></span>
            </p>

            <p>
                <label style="display: inline-block; width: 100px;">No HP</label>
                <span><?php echo $identitas->no_hp ?></span>
            </p>

            <p>
                <label style="display: inline-block; width: 100px;">Email</label>
                <span><?php echo $identitas->email ?></span>
            </p>
        </div>
    </fieldset>

    <?php if (isset($pertanyaan_sebelumnya)): ?>
    <fieldset>
        <legend>Pertanyaan Sebelumnya</legend>
        <ul>
            <?php foreach ($pertanyaan_sebelumnya->result() as $value): ?>
            <li><?php echo $value->judul ?></li>
            <?php endforeach ?>
        </ul>
    </fieldset>
    <?php endif ?>

    <fieldset>
        <legend>Pertanyaan</legend>

        <input type="hidden" name="no_tiket_helpdesk" value="<?php echo $this->session->userdata('no_tiket') ?>"/>

        <div class="grid_5">
            <p>
                <label for="kategori">Kategori</label>
                <select name="kategori_knowledge_base" id="kategori">
                    <?php foreach ($knowledges->result() as $knowledge): ?>
                    <option value="<?php echo $knowledge->id_kat_knowledge_base ?>"><?php echo $knowledge->kat_knowledge_base ?></option>
                    <?php endforeach ?>
                </select>
            </p>
            <p>
                <label for="prioritas">Prioritas</label>
                <select name="prioritas" id="prioritas">
                    <option value="low">Low</option>
                    <option value="medium">Medium</option>
                    <option value="high">High</option>
                </select>
            </p>
            <p>
                <label for="pertanyaan">Pertanyaan</label>
                <input type="text" name="pertanyaan" id="pertanyaan" value=""/>
            </p>
        </div>

        <div class="grid_5">
            <p>
                <label for="description">Deskripsi</label>
                <textarea name="description" id="description" cols="70" rows="10"></textarea>
            </p>
        </div>

        <div class="clear"></div>

    </fieldset>

    <p>
        <input type="submit" class="button blue-pill" value="Submit" onclick="return adaPertanyaanBaru()">
    </p>

    </form>
</div>