<ul id="nav">
    <li><a href="#tab1">Manajemen User / Tambah</a></li>
</ul>
<div class="clear"></div>
<div id="konten">
    <div style="display: none;" id="tab1" class="tab_konten">


        <div class="table">
            <div id="head">
                <div id="msg">
                    <?php
                                if ($this->session->flashdata('msg')) {
                    echo $this->session->flashdata('msg');
                }
                    ?>
                </div>

                <form method="post" action="<?php echo site_url('admin/man_user_tambah/add')?>">
                    <table id="tableOne" class="yui">
                        <tr>
                            <td>Username</td>
                            <td>:</td>
                            <td><input type="text" value="" size="48" name="fusername"/></td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td>:</td>
                            <td><input type="password" size="48" name="fpassword"/></td>
                        </tr>
                        <tr>
                            <td>Ulangi Password</td>
                            <td>:</td>
                            <td><input type="password" size="48" name="fpassword2"/></td>
                        </tr>
                        <tr>
                            <td>Nama</td>
                            <td>:</td>
                            <td><input type="text" value="" size="48" name="fnama"/></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>:</td>
                            <td><input type="text" value="" size="48" name="femail"/></td>
                        </tr>
                        <tr>
                            <td>No Tlp</td>
                            <td>:</td>
                            <td><input type="text" value="" size="48" name="ftelp"/></td>
                        </tr>
                        <tr>
                            <td>Level</td>
                            <td>:</td>
                            <td>
                                <select name="flevel">
                                    <option value="" selected="selected">- Level -</option>
                                    <?php foreach ($list_level as $a): ?>
                                    <option value="<?php echo $a->id_lavel?>"><?php echo $a->nama_lavel?></option>
                                    <?php endforeach;?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Departemen</td>
                            <td>:</td>
                            <td>
                                <select name="fdepartemen">
                                    <option value="" selected="selected">- Nama Departemen -</option>
                                    <?php foreach ($list_unit as $b): ?>
                                    <option value="<?php echo $b->kode_unit?>"><?php echo $b->nama_unit?></option>
                                    <?php endforeach;?>
                                </select>
                            </td>
                        </tr>
                    </table>
                    <br/>

                    <div>
                        <input type="submit" class="button blue-pill" value="simpan" />
                        <a href="<?php echo site_url('/admin/man_user') ?>" class="button gray-pill">Batal</a>
                    </div>
                </form>


            </div>
        </div>

    </div>
</div>