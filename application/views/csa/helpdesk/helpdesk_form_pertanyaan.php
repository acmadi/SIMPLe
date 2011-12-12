<div class="content">

        <h1>Konsultasi Help Desk</h1>

        <h2 class="font-kanan">No Tiket: <?php echo sprintf('%05d', $this->session->userdata('tiket')) ?></h2>

        <div class="clear"></div>

        <fieldset>
            <legend>Pertanyaan Stakeholder</legend>

            <form method="post" class="pertanyaan" action="helpdesk_form_pertanyaan_submit">
                <p class="ki">
                    <label for="kategori">Kategori</label>
                    <select name="peraturan" id="kategori">
                        <?php foreach ($knowledges->result() as $knowledge): ?>
                        <option value="<?php echo $knowledge->id_kat_knowledge_base ?>"><?php echo $knowledge->kat_knowledge_base ?></option>
                        <?php endforeach ?>
                    </select>
                </p>
                <p class="ka">
                    <label for="prioritas">Prioritas</label>
                    <select name="prioritas" id="prioritas">
                        <option value="low">Low</option>
                        <option value="medium">Medium</option>
                        <option value="high">High</option>
                    </select>
                </p>
                <p class="break">
                    <label for="pertanyaan">Pertanyaan</label>
                    <input type="text" name="pertanyaan" id="pertanyaan" value=""/>
                </p>

                <p>
                    <label for="description">Description</label>
                    <textarea name="description" id="description" cols="30" rows="10"></textarea>
                </p>

                <p>
                    <input type="submit" class="button blue-pill" value="Submit" onclick="return adaPertanyaanBaru()">
                </p>

            </form>
    </div>
    </fieldset>
</div>