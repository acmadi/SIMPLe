<script type="text/javascript">
    $(function () {
        $('#flevel').chosen().change(function () {
//            var level = $(this).attr('title');
//            console.log($(this).html());
//            console.log(level);
<!--            $.get('--><?php //echo site_url('/admin/man_user_tambah/pilih_departemen') ?><!--' + '/' + level,-->
//                    function (response) {;
//                        response = '<option></option>' + response;
//                        $('#fdepartemen').html(response);
//                        $('#fdepartemen').trigger('liszt:updated');
//                        console.log(response);
//                    })
        });

        $('#fdepartemen').chosen();
    })
</script>


<ul id="nav">
    <li><a href="#tab1">Manajemen Kelengkapan / Tambah</a></li>
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

                <form method="post" action="<?php echo site_url('admin/man_kelengkapan_tambah/add')?>">
                    <table id="tableOne" class="yui">
                        <tr>
                            <td>Nama Kelengkapan</td>
                            <td>:</td>
                            <td><input type="text" value="" size="48" name="fkelengkapan"/></td>
                        </tr>
                    </table>
                    <br/>

                    <div>
                        <input type="submit" class="button blue-pill" value="simpan"/>
                        <a href="<?php echo site_url('/admin/man_kelengkapan_doc') ?>" class="button gray-pill">Batal</a>
                    </div>
                </form>


            </div>
        </div>

    </div>
</div>