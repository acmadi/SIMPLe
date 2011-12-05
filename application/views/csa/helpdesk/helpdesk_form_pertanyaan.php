<ul id="nav">
	<li><a href="#tab1">Konsultasi Help Desk</a></li>
</ul>
<div class="clear"></div>

<div id="konten">
	<div style="display: none;" id="tab1" class="tab_konten">
		<h2 class="font-kanan">No Ticket : 0001.A56</h2>
		<div class="clear"></div>

        <div class="table">
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
                    </p><br />

                </form>
            </div>          
        </div>
    </div>
</div>

