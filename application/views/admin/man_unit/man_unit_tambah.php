<ul id="nav">
    <li><a href="#tab1">Manajemen Unit / Tambah</a></li>
</ul>
<div class="clear"></div>
<div id="konten">
    <div style="display: none;" id="tab1" class="tab_konten">


        <div class="table">
            <div id="head">

                <?php generate_notifkasi() ?>

                <form method="post" action="<?php echo site_url('admin/man_unit_tambah/add')?>">
                    <table id="tableOne" class="yui">
                        <tr>
                            <td>Kode Unit</td>
                            <td>:</td>
                            <td><input type="text" value="" size="48" name="fkode"/></td>
                        </tr>
                        <tr>
                            <td>Nama Unit</td>
                            <td>:</td>
                            <td><input type="text" size="48" name="fnama"/></td>
                        </tr>
                        <tr>
                            <td>Anggaran</td>
                            <td>:</td>
                            <td>
                                <select name="fanggaran">
                                    <option value="">--pilih anggaran--</option>
                                    <option value="1">Anggaran 1</option>
                                    <option value="2">Anggaran 2</option>
                                    <option value="3">Anggaran 3</option>
                                </select>
                            </td>
                        </tr>

                    </table>
                    <br/>

                    <div>
                        <h5>Pilih Satker</h5><br/>

                        <div id="list_satker" style="float: left; overflow: scroll; height: 300px;">
                            <?php foreach ($list_kementrian as $lk): ?>
                            <div><a href='javascript:void(0);' childid='selkem_<?php echo $lk->id_kementrian?>' class='cat_close category'>&nbsp;&nbsp;&nbsp;<input type="checkbox" class="selkem" value="<?php echo $lk->id_kementrian?>">&nbsp;</a><?php echo $lk->nama_kementrian?>
                            </div>
                            <div id="selkem_<?php echo $lk->id_kementrian?>" class="selkem">
                                <?php
                                if (isset($list_unit[$lk->id_kementrian])):
                                    foreach ($list_unit[$lk->id_kementrian] as $idx => $lu):?>
                                        <div id="unit<?php echo $lk->id_kementrian . $idx?>" satker="<?php echo $lk->id_kementrian . $idx?>" class="innertxt">
                                            <input type="checkbox" id="select<?php echo $lk->id_kementrian . $idx?>" value="<?php echo $lk->id_kementrian . $idx?>"
                                                   class="selectit" kemen="<?php echo $lk->id_kementrian;?>" />&nbsp;&nbsp;<?php echo $lk->id_kementrian . '-' . $lu;?>
                                        </div>
                                        <?php
                                    endforeach;
                                endif;
                                ?>
                            </div>
                            <?php endforeach;?>
                            <div class="float_break"></div>
                        </div>
                        <div style="width:100px; text-align:center; margin-left:20px; padding-top: 100px; width:75px; float:left;">
                            <a href="javascript:void(0);" id="move_right">Pilih &raquo;</a><br/><br/>
                            <a href="javascript:void(0);" id="move_left">&laquo; Batal</a>

                            <div class="float_break"></div>
                        </div>
                        <div style="float: left; height: 300px;">
                            <div id="selected_unit"></div>
                        </div>
                    </div>

                    <div style="clear:both; padding-top:50px; text-align:center;">
                        <input type="submit" class="button blue-pill" value="simpan"/>
                        <a href="<?php echo site_url('/admin/man_unit') ?>" class="button gray-pill">Batal</a>
                    </div>
                </form>


            </div>
        </div>

    </div>
</div>

<script language="javascript">
    $(document).ready(function () {
        // Uncheck each checkbox on body load
        $('#list_satker .selectit').each(function () {
            this.checked = false;
        });
        $('#selected_unit .selectit').each(function () {
            this.checked = false;
        });
		
		$('.selkem').each(function () {
            this.checked = false;
        });

        $('#list_satker .selectit').click(function () {
            var userid = $(this).val();
            $('#unit' + userid).toggleClass('innertxt_bg');
        });

        $('#selected_unit .selectit').click(function () {
            var userid = $(this).val();
            $('#user' + userid).toggleClass('innertxt_bg');
        });
		
		$('.selkem').click(function(){
			var kemid = $(this).val();
			if($(this).is(':checked')){
				$("INPUT[type='checkbox'][kemen='"+kemid+"']").attr('checked', $(this).is(':checked')).parent().toggleClass('innertxt_bg'); 
			}else{
				$("INPUT[type='checkbox'][kemen='"+kemid+"']").attr('checked', $(this).is(':checked')).parent().removeClass('innertxt_bg'); 
			}
		});

        $("#move_right").click(function () {
            var users = $('#selected_unit .innertxt2').size();
            var selected_unit = $('#list_satker .innertxt_bg').size();

//            if (users + selected_unit > 5) {
//                alert('You can only chose maximum 5 users.');
//                return;
//            }

            $('#list_satker .innertxt_bg').each(function () {
                var user_id = $(this).attr('satker');
                $('#select' + user_id).each(function() {this.checked = false;});
                $('.selkem').each(function() {this.checked = false;});

                var user_clone = $(this).clone(true);
                $(user_clone).removeClass('innertxt');
                $(user_clone).removeClass('innertxt_bg');
                $(user_clone).addClass('innertxt2');
                $(user_clone).find("input").attr('name', 'funit[]');
                $(user_clone).find("input").attr('checked', 'checked');

                $('#selected_unit').find('#unit' + user_id).remove();
                $('#selected_unit').append(user_clone);
				$(this).removeClass('innertxt_bg');
				
				/*$('#select' + user_id).each(function () {
                    this.checked = false;
                });*/
                //$(this).remove();
            });
        });

        $("#move_left").click(function () {
            $('#selected_unit .innertxt2').each(function () {
                //var user_id = $(this).attr('satker');
                //$('#select' + user_id).each(function() {this.checked = false;});

                //var user_clone = $(this).clone(true);
                //$(user_clone).removeClass('innertxt2');
                //$(user_clone).removeClass('innertxt_bg');
                //$(user_clone).find("input").removeAttr('name');
                //$(user_clone).find("input").removeAttr('checked');
                //$(user_clone).addClass('innertxt');
                //$('#list_satker').append(user_clone);
                $(this).remove();
            });
        });

        $('#view').click(function () {
            var users = '';
            $('#selected_unit .innertxt2').each(function () {
                var user_id = $(this).attr('satker');
                if (users == '')
                    users += user_id;
                else
                    users += ',' + user_id;
            });
            alert(users);
        });

        $("div.selkem").each(function () {
            $(this).css("display", "none");
        });

        $("#list_satker .category").click(function () {
            var childid = "#" + $(this).attr("childid");
            if ($(childid).css("display") == "none") {
                $(childid).css("display", "block");
            }
            else {
                $(childid).css("display", "none");
            }
            if ($(this).hasClass("cat_close")) {
                $(this).removeClass("cat_close").addClass("cat_open");
            }
            else {
                $(this).removeClass("cat_open").addClass("cat_close");
            }
        });
    });
</script>