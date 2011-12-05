    <ul id="nav">
        <li><a href="#tab1">Form Jawaban</a></li>
    </ul>
    <div class="clear"></div>

    <div id="div_pertanyaan">
        <div id="div_pertanyaan1">
            <p class="identitas">Identitas Satker</p>
            <ul class="left">
                <li>
                    <p><label for="no-tiket">Nama</label>Muki</p>
                </li>
                <li>
                    <p><label for="">Kode Satker</label><b>401307</b></p>
                </li>
                <li>
                    <p><label for="">Nama Satker</label>Pengadilan Agama Bojonegoro</p>
                </li>
            </ul>
            <ul class="right">
                <li>
                    <p style="color:#fff;">&nbsp;</p>
                </li>
                <li>
                    <p><label for="">Email</label>ady@gmail.com</p>
                </li>
            </ul>
        </div> 
        <div id="div_pertanyaan1">
            <p class="identitas">Pertanyaan</p>
            <ul class="left">
                <li>
                    <p><label for="no-tiket">Kategori</label>Peraturan</p>
                </li>
                <li>
                    <p><label for="">Pertanyaan</label>Tanya struktur organisasi</p>
                </li>
                <li>
                    <p><label for="">Deskripsi</label>Deskripsi dari semua pertanyaan struktur organisasi</p>
                </li>
            </ul>
            <ul class="right">
                <li>
                    <p style="color:#fff;">&nbsp;</p>
                </li>
                <li>
                    <p><label for="">Prioritas</label> <img src="<?php echo base_url(); ?>images/medium.png" style="width:30px; "/></p>
                </li>
            </ul>
        </div>
        <div id="div_pertanyaan1">
            <p class="identitas">Jawab</p>
			<textarea cols="120" rows="4">Jawaban....</textarea>
            <ul class="left">
                <li>
                    <p><label for="no-tiket">Sumber</label><input type="text" size="48" value="Kasubdit" /></p>
                </li>
            </ul>
        </div><br />
        <div style="margin-left:25px;">
		<input type="checkbox" /> Masukkan ke dalam knowledge database<br />
		<input type="checkbox" /> Kirim jawaban ke email petugas satker
        </div><br />
        <div class="submit_right" style="margin:25px; ">
            <a href="#"><input type="submit" class="button" value="Eskalasi" onclick="return eskalasi()"/>
            <input type="submit" class="button" value="Kirim" onclick="return terkirim()" />
        </div>

    </div>
    
    

<script type="text/javascript" src="<?php echo base_url(); ?>js/fungsi.js"></script>
<script type="text/javascript"> function terkirim() { alert("Terkirim!"); window.location='list_pertanyaan'; } </script>