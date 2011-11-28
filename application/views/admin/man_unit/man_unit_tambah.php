<ul id="nav">
    <li><a href="#tab1" class="active">Manajemen Unit / Tambah</a></li>
</ul>
<div class="clear"></div>
    <div id="konten">
        <div style="display: none;" id="tab1" class="tab_konten">


            <div class="table">
                <div id="head">
                    <span style="margin:0px 0px 0px -280px; padding-left:10px; position:absolute; width:50px; height:10px; background:#FFF;">Cari Unit</span>

                    <form id="cari_unit" action="man_unit_cari"
                          style="border: 1px solid #999; padding: 13px 30px 13px 13px; margin:5px 0px 0px 20px; ">Kode
                        Unit: <input type="text" value="201010200201101"
                                     style="width:180px; height:16px; font-size:10px; padding:2px 4px 2px 4px; margin-right:5px; "/><br/><br/>

                        Nama Unit: <input type="text" value="Seksi Anggaran IIA-2"
                                          style="width:180px; height:16px; font-size:10px; padding:2px 4px 2px 4px; margin-right:5px; "/>
                    </form>
                </div>

                <div id="tail">
                    <span style="margin:0px 0px 0px -1250px; padding-left:10px; position:absolute; width:60px; height:10px; background:#FFF;">Satker Unit</span>

                    <form id="cari_unit" action="man_unit_cari"
                          style="border: 1px solid #999; padding: 13px 30px 13px 13px; margin:5px 10px 0px 20px; width:96%; ">
                        <div id="left">
                            <p style="margin:10px 10px 10px -20px; ">Satker</p>

                            <div style="overflow:scroll; overflow-x:hidden; height:120px; border:1px solid #999; ">
                                <li>
                                    - <input type="checkbox"/> KEJAKSAAN REPUBLIK INDONESIA
                                    <ul>
                                        <li>- <input type="checkbox"/> KEJAKSAAN REPUBLIK INDONESIA
                                            <ul>
                                                <li><input type="checkbox"/> 005016 KEJAKSAAN AGUNG R.I.</li>
                                                <li><input type="checkbox"/> 440981 SEKRETARIAT KOMISI KEJAKSAAN</li>
                                                <li><input type="checkbox"/> 005020 KEJAKSAAN TINGGI D.K.I JAKARTA</li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    - <input type="checkbox"/> KEMENTRIAN SEKRETARIAT NEGARA
                                    <ul>
                                        <li>+ <input type="checkbox"/> SEKRETARIAT NEGARA</li>
                                        <li>+ <input type="checkbox"/> SEKRETARIAT KABINET</li>
                                        <li>+ <input type="checkbox"/> SEKRETARIAT PRESIDEN</li>
                                        <li>+ <input type="checkbox"/> SEKRETARIAT WAKIL PRESIDEN</li>
                                    </ul>
                                </li>
                                <li>+ <input type="checkbox"/> KEMENTRIAN PERHUTANAN</li>
                                <li>+ <input type="checkbox"/> KEMENTRIAN HUKUM DAN HAK ASASI MANUSIA</li>
                                <li>+ <input type="checkbox"/> KEMENTRIAN PERTANIAN</li>
                                <li>+ <input type="checkbox"/> KEMENTRIAN PERINDUSTRIAN</li>
                                <li>+ <input type="checkbox"/> KEMENTRIAN ENERGI DAN SUMBER DAYA ALAM</li>
                                <li>+ <input type="checkbox"/> KEMENTRIAN KESEHATAN</li>
                            </div>
                        </div>
                        <div id="middle">
                            <input type="button" value=">>" style="width:80px; height:25px;"/><br/><br/>
                            <input type="button" value="<<" style="width:80px; height:25px"/>
                        </div>
                        <div id="left">
                            <p style="margin:10px 10px 10px -20px; ">Satker Terpilih</p>

                            <div style="overflow:scroll; overflow-x:hidden; height:120px; border:1px solid #999; ">
                                <li>- <input type="checkbox"/> KEMENTRIAN AGAMA
                                    <ul>
                                        <li>+ <input type="checkbox"/> SEKRETARIAT JENDERAL</li>
                                        <li>+ <input type="checkbox"/> INSPEKTORAT JENDERAL</li>
                                        <li>+ <input type="checkbox"/> DITJEN PENDIDIKAN ISLAM</li>
                                        <li>+ <input type="checkbox"/> DITJEN BIMBINGAN MASYARAKAT HINDU</li>
                                    </ul>
                                </li>
                                <li>+ <input type="checkbox"/> KEMENTRIAN PEKERJAAN UMUM</li>
                                <li>+ <input type="checkbox"/> BADAN PUSAT STATISTIK</li>
                            </div>
                        </div>
                    </form>
                </div>
                <input class="button" type="button" value="simpan" style="margin:20px -20px 0px 0px; float:right; "/>