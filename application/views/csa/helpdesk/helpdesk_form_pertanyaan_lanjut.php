    <ul id="nav">
        <li><a href="#tab1" class="active">Konsultasi Help Desk</a></li>
    </ul>
    <div class="clear"></div>

    <div id="div_pertanyaan">
        <div id="div_pertanyaan1">
            <p class="identitas">Identitas</p>
            <ul class="left">
                <li>
                    <p><label for="no-tiket">No. Tiket</label><b>2819</b></p>
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
            <ul class="right">
                <li>
                    <p style="color:#fff;">&nbsp;</p>
                </li>
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
        <div id="div_pertanyaan2">
            <p class="list">List Pertanyaan Sebelumnya</p>
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
        <div id="pertanyaan3">
            <p class="label-pertanyaan">Pertanyaan Stakeholder</p>
            <form method="post" id="pertanyaan1">   
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
        
            <p class="label-referensi">Referensi Jawaban</p>
            <form method="post" id="pertanyaan2">
                <div style="min-height:300px; height:auto; overflow-x:hiden; border:2px solid #222; padding:10px 10px 10px 10px; ">
                	<p>
                    	<a href="title">Refensi Jawaban 1</a><br />
                        Penjelasan 
                    </p>
                    <br />
                	<p>
                    	<a href="title">Refensi Jawaban 2</a><br />
                        Penjelasan 
                    </p>
                    <br />
                	<p>
                    	<a href="title">Refensi Jawaban 3</a><br />
                        Penjelasan 
                    </p>
                    <br />
                	<p>
                    	<a href="title">Refensi Jawaban 4</a><br />
                        Penjelasan 
                    </p>
                    <br />
                	<p>
                    	<a href="title">Refensi Jawaban 5</a><br />
                        Penjelasan 
                    </p>
                    <br />
                	<p>
                    	<a href="title">Refensi Jawaban 6</a><br />
                        Penjelasan 
                    </p>
                    <br />
                	<p>
                    	<a href="title">Refensi Jawaban 7</a><br />
                        Penjelasan 
                    </p>
                    <br />
                	<p>
                    	<a href="title">Refensi Jawaban 8</a><br />
                        Penjelasan 
                    </p>

                </div>
                    <input type="submit" class="tombol" value="Referensi Peraturan" onclick="popUp()" />
                <div class="break"></div>
            </form>
        </div>
    </div>
    
                        <script type="text/javascript">
                        function popUp()
                        {
                        window.open("popup","_blank","width=800, height=400");
                        }
                    </script>