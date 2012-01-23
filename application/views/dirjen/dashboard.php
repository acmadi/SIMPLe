<style type="text/css">
    td a {
        color: white !important;
    }

    td {
        /*border: 1px solid #eee;*/
        vertical-align: middle;
        text-align: center;
        /*border-collapse: separate;*/
        font-size: 10px;
        padding-bottom: 0 !important;
        padding-top: 0 !important;
        padding: 5px !important;
    }

    tr:hover,
    td:hover {
        background-color: transparent !important;
        background: none !important;
    }

    tr {
        border-bottom: none !important;
    }

    table {
        width: 100%;
        float: left;
        margin-right: 20px;
        border-collapse: separate;
        border-spacing: 2px;
    }

        /*table tbody tr:hover {*/
        /*background: none !important;*/
        /*}*/

    table tbody tr td:hover {

    }

    .green-box {
        background: #1b76bb;
        background: -webkit-linear-gradient(top, #48c0e5, #1b76bb);
        color: white;
        font-size: 12px;
        border-radius: 10px;
    }

    .green-box a {
        color: white;
    }

    .blue-box {
        background: #eaee87;
        font-size: 12px;
        border-radius: 10px;
        background: -webkit-linear-gradient(top, #eaee87, #e5d048 40%);
    }

    .blue-box a {
        color: black !important;
    }

    .yellow-box {
        background: #6fe548;
        font-size: 12px;
        border-radius: 10px;
        background: -webkit-linear-gradient(top, #7fe548, #4dae19);
        color: black;
    }

    .red-box {
        background: #e54848;
        font-size: 12px;
        border-radius: 10px;
        background: -webkit-linear-gradient(top, #fe7676, #e54848);
    }

    .green-box,
    .blue-box,
    .yellow-box,
    .red-box,
    .green-box:visited,
    .blue-box:visited,
    .yellow-box:visited,
    .red-box:visited {
        display: block;
        padding: 10px 0;
        min-width: 55px;
        text-align: center;
        color: white;
    }

    .green-box a:hover,
    .blue-box a:hover,
    .yellow-box a:hover,
    .red-box a:hover {
        background: -webkit-linear-gradient(top, #cecece, #7a7a7a) !important;
    }

    .level {
        /*background: #f9f9f9;*/
        text-align: left;
        font-weight: bold;
    }

    .title__ {
        text-align: center;
        font-weight: bold;
    }

    .big {
        text-align: center;
        background: #eee;
        font-size: 16px;
        display: block;
        background: -webkit-linear-gradient(top, #eee, #d9d9d9 40%);
    }
</style>

<div class="content">
    <h1>Dirjen Dashboard</h1>

    <div style="text-align: right;">
		<?php 
		$button_lwt_style = 'green-box'; 
		if($argo > 0) $button_lwt_style = 'red-box';
		?>
        <a href="<?php echo site_url('/dirjen/list_argo') ?>" class="<?php echo $button_lwt_style;?>" style="padding: 10px; display: inline-block; color: white; margin-bottom: 10px;">
            <strong><?php echo $argo ?></strong> Tiket melebihi target waktu
        </a>
    </div>

    <table>
        <tr>
            <td style="border: none;"> &nbsp;</td>
            <td colspan="4">
                <a href="<?php echo site_url('/dirjen/lists/1/6/1') ?>" class="big">A1</a>
            </td>
            <td style="border: none;"> &nbsp;</td>
            <td colspan="4">
                <a href="<?php echo site_url('/dirjen/lists/2/6/1') ?>" class="big">A2</a>
            </td>
            <td style="border: none;"> &nbsp;</td>
            <td colspan="4">
                <a href="<?php echo site_url('/dirjen/lists/3/6/1') ?>" class="big">A3</a>
            </td>
        </tr>

        <tr>
            <td style="border: none;"> &nbsp;</td>
            <td class="title__"> Diterima</td>
            <td class="title__"> Diteruskan</td>
            <td class="title__"> Disetujui</td>
            <td class="title__"> Ditolak</td>

            <td style="border: none;"> &nbsp;</td>
            <td class="title__"> Diterima</td>
            <td class="title__"> Diteruskan</td>
            <td class="title__"> Disetujui</td>
            <td class="title__"> Ditolak</td>

            <td style="border: none;"> &nbsp;</td>
            <td class="title__"> Diterima</td>
            <td class="title__"> Diteruskan</td>
            <td class="title__"> Disetujui</td>
            <td class="title__"> Ditolak</td>
        </tr>

        <tr>
            <td class="level"> CS</td>
            <td><a href="<?php echo site_url('/dirjen/lists_level/1/1/1') ?>" class="green-box"><?php echo $a1_cs_diterima ?></a></td>
            <td> <?php //echo $cs_diteruskan ?> </td>
            <td></td>
            <td></td>

            <td style="border: none;"> &nbsp;</td>
            <td><a href="<?php echo site_url('/dirjen/lists_level/2/1/1') ?>" class="green-box"><?php echo $a2_cs_diterima ?></a></td>
            <td></td>
            <td></td>
            <td></td>

            <td style="border: none;"> &nbsp;</td>
            <td><a href="<?php echo site_url('/dirjen/lists_level/3/1/1') ?>" class="green-box"><?php echo $a3_cs_diterima ?></a></td>
            <td></td>
            <td></td>
            <td></td>

        </tr>
        <tr>
            <td class="level"> Kasi & Pelaksana</td>
            <td><a href="<?php echo site_url('/dirjen/lists_level/1/3/1') ?>" class="green-box"><?php echo $a1_pelaksana_diterima ?></a></td>
            <td><a href="<?php echo site_url('/dirjen/lists_level/1/4/2') ?>" class="blue-box"><?php echo $a1_pelaksana_diteruskan ?></a></td>
            <td></td>
            <td></td>

            <td style="border: none;"> &nbsp;</td>
            <td><a href="<?php echo site_url('/dirjen/lists_level/2/3/1') ?>" class="green-box"><?php echo $a2_pelaksana_diterima ?></a></td>
            <td><a href="<?php echo site_url('/dirjen/lists_level/2/4/2') ?>" class="blue-box"><?php echo $a2_pelaksana_diteruskan ?></a></td>
            <td></td>
            <td></td>

            <td style="border: none;"> &nbsp;</td>
            <td><a href="<?php echo site_url('/dirjen/lists_level/3/3/1') ?>" class="green-box"><?php echo $a3_pelaksana_diterima ?></a></td>
            <td><a href="<?php echo site_url('/dirjen/lists_level/3/4/2') ?>" class="blue-box"><?php echo $a3_pelaksana_diteruskan ?></a></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td class="level"> Subdit Anggaran</td>
            <td><a href="<?php echo site_url('/dirjen/lists_level/1/4/1') ?>" class="green-box"><?php echo $a1_subdit_anggaran_diterima ?></a></td>
            <td><a href="<?php echo site_url('/dirjen/lists_level/1/5/2') ?>" class="blue-box"><?php echo $a1_subdit_anggaran_diteruskan ?></a></td>
            <td></td>
            <td></td>

            <td style="border: none;"> &nbsp;</td>
            <td><a href="<?php echo site_url('/dirjen/lists_level/2/4/1') ?>" class="green-box"><?php echo $a2_subdit_anggaran_diterima ?></a></td>
            <td><a href="<?php echo site_url('/dirjen/lists_level/2/5/2') ?>" class="blue-box"><?php echo $a2_subdit_anggaran_diteruskan ?></a></td>
            <td></td>
            <td></td>

            <td style="border: none;"> &nbsp;</td>
            <td><a href="<?php echo site_url('/dirjen/lists_level/3/4/1') ?>" class="green-box"><?php echo $a3_subdit_anggaran_diterima ?></a></td>
            <td><a href="<?php echo site_url('/dirjen/lists_level/3/5/2') ?>" class="blue-box"><?php echo $a3_subdit_anggaran_diteruskan ?></a></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td class="level"> Subdit Dadutek</td>
            <td><a href="<?php echo site_url('/dirjen/lists_level/1/5/1') ?>" class="green-box"><?php echo $a1_subdit_dadutek_diterima ?></a></td>
            <td><a href="<?php echo site_url('/dirjen/lists_level/1/6/2') ?>" class="blue-box"><?php echo $a1_subdit_dadutek_diteruskan ?></a></td>
            <td></td>
            <td></td>

            <td style="border: none;"> &nbsp;</td>
            <td><a href="<?php echo site_url('/dirjen/lists_level/2/5/1')?> class="green-box"><?php echo $a2_subdit_dadutek_diterima ?></a></td>
            <td><a href="<?php echo site_url('/dirjen/lists_level/2/6/2') ?>" class="blue-box"><?php echo $a2_subdit_dadutek_diteruskan ?></a></td>
            <td></td>
            <td></td>

            <td style="border: none;"> &nbsp;</td>
            <td><a href="<?php echo site_url('/dirjen/lists_level/3/5/1') ?>" class="green-box"><?php echo $a3_subdit_dadutek_diterima ?></a></td>
            <td><a href="<?php echo site_url('/dirjen/lists_level/3/6/2') ?>" class="blue-box"><?php echo $a3_subdit_dadutek_diteruskan ?></a></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td class="level">Direktur</td>
            <td><a href="<?php echo site_url('/dirjen/lists_level/1/6/1') ?>" class="green-box"><?php echo $a1_direktur_diterima ?></a></td>
            <td><a href="<?php echo site_url('/dirjen/lists_level/1/7/2') ?>" class="blue-box"><?php echo $a1_direktur_diteruskan ?></a></td>
            <td><a href="<?php echo site_url('/dirjen/lists_level/1/6/1/close/disahkan') ?>" class="yellow-box"><?php echo $a1_direktur_disetujui ?></a></td>
            <td><a href="<?php echo site_url('/dirjen/lists_level/1/6/1/close/ditolak') ?>" class="red-box"><?php echo $a1_direktur_ditolak ?></a></td>

            <td style="border: none;"> &nbsp;</td>
            <td><a href="<?php echo site_url('/dirjen/lists_level/2/6/1') ?>" class="green-box"><?php echo $a2_direktur_diterima ?></a></td>
            <td><a href="<?php echo site_url('/dirjen/lists_level/2/7/2') ?>" class="blue-box"><?php echo $a2_direktur_diteruskan ?></a></td>
            <td><a href="<?php echo site_url('/dirjen/lists_level/2/6/1/close/disahkan') ?>" class="yellow-box"><?php echo $a2_direktur_disetujui ?></a></td>
            <td><a href="<?php echo site_url('/dirjen/lists_level/2/6/1/close/ditolak') ?>" class="red-box"><?php echo $a2_direktur_ditolak ?></a></td>

            <td style="border: none;"> &nbsp;</td>
            <td><a href="<?php echo site_url('/dirjen/lists_level/3/6/1') ?>" class="green-box"><?php echo $a3_direktur_diterima ?></a></td>
            <td><a href="<?php echo site_url('/dirjen/lists_level/3/7/2') ?>" class="blue-box"><?php echo $a3_direktur_diteruskan ?></a></td>
			<td><a href="<?php echo site_url('/dirjen/lists_level/3/6/1/close/disahkan') ?>" class="yellow-box"><?php echo $a3_direktur_disetujui ?></a></td>
            <td><a href="<?php echo site_url('/dirjen/lists_level/3/6/1/close/ditolak') ?>" class="red-box"><?php echo $a3_direktur_ditolak ?></a></td>
        </tr>
        <tr>
            <td class="level">Dirjen</td>
            <td><a href="<?php echo site_url('/dirjen/lists_level/1/7/1') ?>" class="green-box"><?php echo $a1_dirjen_diterima ?></a></td>
            <td>&nbsp;</td>
            <td><a href="<?php echo site_url('/dirjen/lists_level/1/7/1/close/disahkan') ?>" class="yellow-box"><?php echo $a1_dirjen_disetujui ?></a></td>
            <td><a href="<?php echo site_url('/dirjen/lists_level/1/7/1/close/ditolak') ?>" class="red-box"><?php echo $a1_dirjen_ditolak ?></a></td>

            <td style="border: none;"> &nbsp;</td>
            <td><a href="<?php echo site_url('/dirjen/lists_trm/2/2/6/1') ?>" class="green-box"><?php echo $a2_dirjen_diterima ?></a></td>
            <td>&nbsp;</td>
            <td><a href="<?php echo site_url('/dirjen/lists_level/2/7/1/close/disahkan') ?>" class="yellow-box"><?php echo $a2_dirjen_disetujui ?></a></td>
            <td><a href="<?php echo site_url('/dirjen/lists_level/2/7/1/close/ditolak') ?>" class="red-box"><?php echo $a2_dirjen_ditolak ?></a></td>

            <td style="border: none;"> &nbsp;</td>
            <td><a href="<?php echo site_url('/dirjen/lists_trm/3/2/6/1') ?>" class="green-box"><?php echo $a3_dirjen_diterima ?></a></td>
            <td>&nbsp;</td>
            <td><a href="<?php echo site_url('/dirjen/lists_level/3/7/1/close/disahkan') ?>" class="yellow-box"><?php echo $a3_dirjen_disetujui ?></a></td>
            <td><a href="<?php echo site_url('/dirjen/lists_level/3/7/1/close/ditolak') ?>" class="red-box"><?php echo $a3_dirjen_ditolak ?></a></td>
        </tr>


    </table>


    <div class="clear"></div>
</div>