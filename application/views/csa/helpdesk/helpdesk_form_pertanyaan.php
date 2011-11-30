<ul id="nav">
	<li><a href="#" class="active">Konsultasi Help Desk</a></li>
</ul>
<div id="div_pertanyaan">
	<p class="label-pertanyaan">Pertanyaan Stakeholder</p>
	<form method="post" id="pertanyaan1" action="helpdesk_form_pertanyaan_submit">	
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
			<input type="submit" class="tombol" value="Submit">
		</p>
	</form>
        </div>
    </div>
    
<script type="text/javascript">
	function popUp()
	{
		window.open("popup","_blank","width=800, height=400");
	}
</script>