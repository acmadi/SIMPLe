<script type="text/javascript">
    $(function () {
//        $('#flevel').chosen().change(function () {
//            var level = $(this).val();
//            $.get('<?php echo site_url('/admin/man_user_tambah/pilih_departemen') ?>' + '/' + level,
//                    function (response) {;
//                        response = '<option></option>' + response;
//                        $('#fdepartemen').html(response);
//                        $('#fdepartemen').trigger('liszt:updated');
//                        console.log(response);
//                    })
//        });
    })
</script>


<ul id="nav">
    <li><a href="#tab1">Manajemen User / Tambah</a></li>
</ul>
<div class="clear"></div>
<div id="konten">
    <div style="display: none;" id="tab1" class="tab_konten">


        <div class="table">
            <div id="head">
                <?php
                // TODO: Satu paket ini untuk alerts. Nanti mau dipindah jadi hanya panggil satu method.
                if ($this->session->flashdata('success')) {
                    echo '<div class="success">' . $this->session->flashdata('success') . '</div>';
                }
                if ($this->session->flashdata('error')) {
                    echo '<div class="error">' . $this->session->flashdata('error') . '</div>';
                }
                if ($this->session->flashdata('notice')) {
                    echo '<div class="notice">' . $this->session->flashdata('notice') . '</div>';
                }
                if ($this->session->flashdata('info')) {
                    echo '<div class="info">' . $this->session->flashdata('info') . '</div>';
                }
                ?>

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
                                <select name="flevel" id="flevel" class="chzn-single" data-placeholder="Pilih Level" style="width: 500px;">
                                    <option></option>
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
                                    <option value="<?php echo $b->id_unit_satker?>"><?php echo $b->nama_unit?></option>
                                    <?php endforeach;?>
                                </select>
                            </td>
                        </tr>
                    </table>
                    <br/>

                    <div>
                        <input type="submit" class="button blue-pill" value="simpan"/>
                        <a href="<?php echo site_url('/admin/man_user') ?>" class="button gray-pill">Batal</a>
                    </div>
                </form>


            </div>
        </div>

    </div>
</div>