    <ul id="nav">
        <li><a href="#tab1">Saluran Pengaduan</a></li>
    </ul>
    <div class="clear"></div>
    <div id="pengaduan">
        <p class="title">Form Pengaduan</p>
        <form method="post" id="form-pengaduan" action="dashboard">
            <p>
                <label for="kepada">Kepada</label>
            </p>
            <select name="" id="">
                    <option value="">Dirjen</option>
                    <option value="">Direktur</option>
                    <option value="">Kasubdit</option>
                    <option value="">Pelaksana</option>
                    <option value="">Supervisor</option>
                    <option value="">Halo DJA</option>
            </select>
            
            <p>
                <label for="">Deskripsi Pengaduan</label>
            </p>
            <textarea>text pengaduan</textarea>
            
            <input type="submit" class="tombol" value="Kirim" onclick="return terkirim()">
            <div class="break"></div>
        </form>
    </div>


<script type="text/javascript"> function terkirim() { alert("Terkirim!"); window.location='dashboard'; } </script>