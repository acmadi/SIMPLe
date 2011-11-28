<ul id="nav">
    <li><a href="#tab1" class="active">Konsultasi Help Desk</a></li>
</ul>
<div class="clear"></div>
<div id="konten">
    <div style="display: none;" id="tab1" class="tab_konten">
        <div class="table">
            <div style="border: 1px solid black; padding: 20px; overflow:scroll; overflow-x:hidden;">
                <label style="position:absolute; background-color:#FFFFFF; display:block; margin: -40px 0px 0px 5px; padding: 10px">Pertanyaan
                    Stakeholder</label>

                <form action="helpDesk_referensi" name="" method="post" style="font-size:10px">
                    <table align="center">
                        <tr>
                            <td>Kategori</td>
                            <td>
                                <select>
                                    <option>Peraturan</option>
                                    <option>Kategori 2</option>
                                    <option>Kategori 3</option>
                                </select>
                            </td>
                            <td>Prioritas</td>
                            <td>
                                <select>
                                    <option>Rendah</option>
                                    <option>Medium</option>
                                    <option>Tinggi</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Pertanyaan</td>
                            <td><input type="text" size="50" name="" id=""/></td>
                        </tr>
                        <tr>
                            <td>Description</td>
                            <td><textarea cols="90" rows="4"></textarea></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" value="Submit"
                                       style="width:80px; height:25px; font-size:12px; float:right; "/></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>
