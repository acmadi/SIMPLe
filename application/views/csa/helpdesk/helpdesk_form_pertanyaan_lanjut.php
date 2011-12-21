<ul id="nav">
    <li><a href="#">Konsultasi Help Desk</a></li>
</ul>
<div class="clear"></div>

<div id="konten">
    <div style="display: none;" id="tab1" class="tab_konten">
        <h2 class="font-kanan">No Ticket : 0001.A56</h2>

        <div class="clear"></div>

        <div class="table">
            <div class="border">
                <label class="labelborder">Identitas</label>
                <ul style="list-style:; margin-left:30px;"><br/>
                    <li>
                        <p><label for="no-tiket">No. Tiket</label> <b>2819</b></p>
                    </li>
                    <li>
                        <p><label for="">No. Satker</label>826239</p>
                    </li>
                    <li>
                        <p><label for="">Nama Satker</label>Dirjen Pajak</p>
                    </li>
                    <li>
                        <p><label for="">Nama Petugas</label>Adi</p>
                    </li>
                </ul>
                <br/>
                <ul style="list-style:; margin-left:30px;">
                    <li>
                        <p><label for="">No. Kantor</label>021291891</p>
                    </li>
                    <li>
                        <p><label for="">No Hp</label>081225651234</p>
                    </li>
                    <li>
                        <p><label for="">Email</label>Ady@yahoo.com</p>
                    </li>
                </ul>
            </div>
            <br/><br/><br/>

            <div class="border">
                <label class="labelborder">List Pertanyaan Sebelumnya</label>
                <table id="tableOne" class="yui">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Nama</th>
                        <th>Nama Satker</th>
                        <th>Subjek</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td>22/06/2011</td>
                        <td>Feri</td>
                        <td>Dirjen Pajak</td>
                        <td>Tanya RUU</td>
                        <td>Close</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>25/06/2011</td>
                        <td>Anton</td>
                        <td>Dirjen Pajak</td>
                        <td>Tanya Anggaran</td>
                        <td>Open</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <br/><br/><br/>

            <div class="border">
                <label class="labelborder">Pertanyaan Stakeholder</label>

                <form method="post" class="pertanyaan" action="helpdesk_form_pertanyaan_submit">
                    <p class="ki">
                        <label for="Kategori">Kategori</label>
                        <select name="peraturan">
                            <option value="pilih">peraturan</option>
                            <option value="kategori">kategori 1</option>
                            <option value="kategori1">kategori 2</option>
                        </select>
                    </p>
                    <p class="ka">
                        <label for="">Prioritas</label>
                        <select name="prioritas" id="">
                            <option value="low">Low</option>
                            <option value="medium">Medium</option>
                            <option value="high">High</option>
                        </select>
                    </p>
                    <p class="break">
                        <label for="pertanyaan">Pertanyaan</label>
                        <input type="text" name="text" id="text" value="textbox"/>
                    </p>

                    <p>
                        <label for="description">Description</label>
                        <textarea name="textarea" id="textar" cols="30" rows="10"></textarea>

                    </p>

                    <p>
                        <input type="submit" class="button" value="Submit" onclick="return adaPertanyaanBaru()" style=" margin-left:685px;">
                    </p><br/>

                </form>
            </div>
            <br/><br/><br/>

            <div class="border">
                <label class="labelborder">Referensi Jawaban</label>

                <form method="post"><br/>

                    <div style="padding:20px; overflow:auto; overflow-x:hidden; height:300px; ">

                        <?php foreach ($result->result() as $value): ?>
                        <p>
                            <a href="javascript:void(0)" onclick="popUpReferensiJawaban(<?php echo $value->id_knowledge_base ?>)"><?php echo $value->judul ?></a><br/>
                        <div><?php echo $value->desripsi ?></div>
                        </p>
                        <br/>
                        <?php endforeach ?>

                    </div>
                    <br/>
                    <input class="button" type="submit" value="Referensi Peraturan" onclick="popUpReferensiPeraturan()" style="float:right;margin-right:30px;"/>
                    <input class="button" type="submit" value="Eskalasi" onclick='return eskalasi()' style="float:right; margin-right:10px;"/>

                    <div class="break"></div>
                </form>
            </div>
        </div>
    </div>
</div>



<script type="text/javascript" src="<?php echo base_url(); ?>js/fungsi.js"></script>
<script type="text/javascript">
    function popUpReferensiJawaban(id) {
        window.open("popup_ref_jawaban/" + id, "_blank", "width=800, height=360");
    }
</script>
<script type="text/javascript">
    function popUpReferensiPeraturan() {
        window.open("popup_ref_peraturan", "_blank", "width=800, height=400");
    }
</script>