<div class="content">

    <h1>Konsultasi Help Desk - Umum</h1>

    <div style="text-align: right; text-decoration: underline; font-weight: bold; font-size: 14px;">
        No Tiket: <?php echo sprintf('%05d', $this->session->userdata('no_tiket')) ?>
    </div>

    <fieldset>
        <legend>Identitas</legend>

        <div style="float: left; width: 500px">

            <p>
                <label style="display: inline-block; width: 100px;">Nama</label>
                <span><?php echo $identitas->nama_petugas ?></span>
            </p>

            <p>
                <label style="display: inline-block; width: 100px;">Instansi</label>
                <span><?php echo $identitas->instansi ?></span>
            </p>


        </div>
        <div style="float: left; width: 500px;">

            <p>
                <label style="display: inline-block; width: 100px;">No HP</label>
                <span><?php echo $identitas->no_hp ?></span>
            </p>

            <p>
                <label style="display: inline-block; width: 100px;">Email</label>
                <span><?php echo $identitas->email ?></span>
            </p>

            <p>
                <label style="display: inline-block; width: 100px;">Alamat</label>
                <span><?php echo $identitas->alamat ?></span>
            </p>

        </div>
    </fieldset>

    <fieldset>
        <legend>Pertanyaan Stakeholder</legend>

        <?php echo form_open('/helpdesk/helpdesk_form_pertanyaan/masuk'); ?>
        <input type="hidden" name="no_tiket_helpdesk" value="<?php echo $this->session->userdata('tiket') ?>"/>

        <p style="float:right; margin-right: 300px">
            <label for="description">Description</label>
            <textarea name="description" id="description" cols="70" rows="10"></textarea>
        </p>

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


        <p style="clear:both">
            <input type="submit" class="button blue-pill" value="Submit" onclick="return adaPertanyaanBaru()">
        </p>

        </form>
    </fieldset>
</div>