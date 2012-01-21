<div class="content">

    <h1>Konsultasi Help Desk</h1>

    <?php
    if ($this->session->flashdata('success')) {
        echo notification($this->session->flashdata('info'), 'Sukses', 'green');
    }
    if ($this->session->flashdata('info')) {
        echo notification($this->session->flashdata('info'), 'Informasi', 'blue');
    }
    ?>

    <?php $prev_quesion = ($this->input->get('prev_question')) ? '?prev_question=true' : '' ?>
    <?php echo form_open('/helpdesks/save/step2/' . $prev_quesion); ?>
    <input type="hidden" name="no_tiket_helpdesk" value="<?php echo $this->session->userdata('no_tiket_helpdesk') ?>"/>
    <input type="hidden" name="id_satker" value="<?php echo $identitas->id_satker ?>"/>

    <div style="text-align: right; text-decoration: underline; font-weight: bold; font-size: 14px;">
        No Tiket: <?php echo sprintf('%05d', $this->session->userdata('no_tiket_helpdesk')) ?>
    </div>

    <fieldset>
        <legend>Identitas</legend>

        <table style="width: 100%">
            <tr>
                <td style="width: 200px">
                    <label>No Tiket</label>
                </td>
                <td style="width: 200px">
                    <?php echo sprintf('%05d', $this->session->userdata('no_tiket_helpdesk')) ?>
                </td>

                <td>
                    <label>Telpon Kantor</label>
                </td>
                <td>
                    <span><?php echo $identitas->no_kantor ?></span>
                </td>
            </tr>

            <tr>
                <td style="width: 150px">
                    <label>Kode - Nama Satker</label>
                </td>
                <td style="width: 500px">
                    <span><?php echo $identitas->id_satker . ' - ' . $identitas->nama_satker ?></span>
                </td>

                <td>
                    <label>No HP</label>
                </td>
                <td>
                    <span><?php echo $identitas->no_hp ?></span>
                </td>
            </tr>

            <tr>
                <td>
                    <label style="display: inline-block; width: 100px;">Nama Petugas</label>
                </td>
                <td>
                    <span><?php echo $identitas->nama_petugas ?></span>
                </td>

                <td>
                    <label style="display: inline-block; width: 100px;">Email</label>
                </td>
                <td>
                    <span><?php echo $identitas->email ?></span>
                </td>
            </tr>

        </table>
    </fieldset>

    <?php if (isset($prev_question)): ?>
    <fieldset>
        <legend>Pertanyaan Sebelumnya</legend>
        <ul>
            <?php foreach ($prev_question->result() as $value): ?>
            <li><?php echo $value->pertanyaan ?></li>
            <?php endforeach ?>
        </ul>
    </fieldset>
    <?php endif ?>

    <fieldset>
        <legend>Pertanyaan</legend>

        <table style="width: 100%;">
            <tr>
                <td style="padding: 10px; width: 100px;">
                    <label for="kategori" style="display: inline-block; width: 70px;">Kategori</label>
                    <select name="kategori_knowledge_base" id="kategori" tabindex="1">
                        <?php foreach ($kategori->result() as $value): ?>
                        <option value="<?php echo $value->id_kat_knowledge_base ?>"><?php echo $value->kat_knowledge_base ?></option>
                        <?php endforeach ?>
                    </select>
                </td>
                <td style="padding: 10px; width: 100px;">
                    <label for="pertanyaan" style="display: inline-block; width: 70px;">Pertanyaan</label>
                    <input type="text" name="pertanyaan" id="pertanyaan" tabindex="3" style="width: 400px;"/>
                </td>
            </tr>
            <tr>
                <td style="padding: 10px; width: 100px;">
                    <label for="prioritas" style="display: inline-block; width: 70px;">Prioritas</label>
                    <select name="prioritas" id="prioritas" tabindex="2">
                        <option value="low">Low</option>
                        <option value="medium">Medium</option>
                        <option value="high">High</option>
                    </select>
                </td>
                <td style="padding: 10px; width: 100px;">
                    <label for="description" style="display: inline-block; width: 70px;">Deskripsi</label>
                    <input type="text" name="description" id="description" tabindex="4" style="width: 400px;"/>
                </td>
            </tr>
        </table>

    </fieldset>

    <div style="text-align: center; margin-top: 20px;">
        <input type="submit" class="button green" value="Submit" onclick="return adaPertanyaanBaru()">

        <?php if (isset($prev_question)): ?>
        <a class="button blue" href="<?php echo site_url('helpdesks/identity') ?>">Selesai</a>
        <?php endif ?>
    </div>

    </form>
</div>