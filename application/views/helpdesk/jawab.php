    <ul id="nav">
        <li><a href="#tab1">Form Jawaban</a></li>
    </ul>
    <div class="clear"></div>
    <div id="konten">
			
            
<div class="table">
    <div class="border">
    	<label class="labelborder">Identitas Satker</label>
        <table>
        	<tr>
            	<td>Nama Satker</td><td>Pengadilan Agama Bojonegoro</td>
            </tr>
        	<tr>
            	<td>Kode Satker</td><td>401307</td>
            </tr>
        	<tr>
            	<td>Nama Satker</td><td>Pengadilan Agama Bojonegoro</td>
            </tr>
        	<tr>
            	<td>Email</td><td>ady@gmail.com<</td>
            </tr>
        </table>
    </div><br /><br />


    <div class="border">
    	<label class="labelborder">Pertanyaan</label>
        <table>
        	<tr>
            	<td>Kategori</td><td>Peraturan</td>
            </tr>
        	<tr>
            	<td>Pertanyaan</td><td>anya struktur organisasi</td>
            </tr>
        	<tr>
            	<td>Deskripsi</td><td>Deskripsi dari semua pertanyaan struktur organisasi</td>
            </tr>
        	<tr>
            	<td>Prioritas</td><td><img src="<?php echo base_url(); ?>images/medium.png" style="width:30px; "/></td>
            </tr>
        </table>
    </div><br /><br />


    <div class="border">
    	<label class="labelborder">Jawab</label>
        <textarea cols="120" rows="4" style="margin:20px; ">Jawaban....</textarea>
        <table>
        	<tr>
            	<td><label for="no-tiket">Sumber</label></td><td><input type="text" size="48" value="Kasubdit" /></td>
            </tr>
        </table>
    </div><br /><br />

    <input type="checkbox" /> Masukkan ke dalam knowledge database<br />
	<input type="checkbox" /> Kirim jawaban ke email petugas satker
    <div class="submit_right" style="margin:25px; ">
		<a href="#"><input type="submit" class="button" value="Eskalasi" onclick="return eskalasi()"/>
		<input type="submit" class="button" value="Kirim" onclick="return terkirim()" />
	</div>
</div>



<script type="text/javascript" src="<?php echo base_url(); ?>js/fungsi.js"></script>
<script type="text/javascript"> function terkirim() { alert("Terkirim!"); window.location='list_antrian'; } </script>