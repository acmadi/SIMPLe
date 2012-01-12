<!doctype html>
<html>
<head>
    <title>Tanda Terima Pengajuan Revisi Anggaran - #<?php echo sprintf('%05d', $dokumen->no_tiket_frontdesk) ?></title>
    <link href="<?php echo base_url('css/print.css') ?>" type="text/css" rel="stylesheet" media="all"/>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 10pt;
        }

        h1 {
            font-size: 14pt;
            text-align: center;
            font-weight: normal;
            margin-bottom: 2em;
        }

        .clear {
            clear: both;
        }

        table {
            margin: 0;
            padding: 0;
        }

        table tr td {
            padding: 0;
            margin: 0;
            border: none;
        }

        fieldset {
            border: 1px solid #cecece;
            margin: 10px 0;
        }

        legend {
            font-size: 14pt;
        }

        label {
            width: 100px;
            display: inline-block;
            font-weight: bold;
        }

        label.short {
            width: 120px;
            font-weight: bold;
        }
    </style>
    <style media="print">
        .cetak {
            display: none;
        }
    </style>
</head>
<body>

<div>
    <table style="width: 100%; border-bottom: 1px solid #333;">
        <tr>
            <td style="text-align: right; width: 120px;">
                <img src="<?php echo base_url('images/logo.png') ?>"/>
            </td>
            <td style="text-align: center; padding: 0;">
                <span style="font-size: 13pt">KEMENTERIAN KEUANGAN REPUBLIK INDONESIA</span><br/>
                <span style="font-size: 11pt">DIREKTORAT JENDERAL ANGGARAN</span><br/>
                <span style="font-size: 7pt">GEDUNG SUTIKNO SLAMET LT. 4, JALAN DR. WAHIDIN NOMOR 1, JAKARTA 10710, KOTAK POS 2435</span><br/>
                <span style="font-size: 7pt">TELEPON (021) 3849315; FAKSIMILE (021) 3847157; SITUS www.anggaran.depkeu.go.id</span><br/>
            </td>
        </tr>
    </table>

    <br/>

    <h1>Tanda Terima Pengambilan Dokumen Revisi Anggaran</h1>
	<p style="margin-right: 80px; text-align: right;">
        Tanggal / Jam : <?php echo date('d-m-Y') ?> / <?php echo date('H:i') ?>
        <br/><br/><br/><br/>
    </p>
	<table>
		<tr>
			<td style="text-decoration:underline;width:700px;">
				IDENTITAS PETUGAS
			</td>
			<td>
				Tanggal/ jam pengajuan
			</td>
			<td>:</td>
			<td><?php 
					$temp_tgl = explode(' ',$dokumen->tanggal);
					echo set_tanggal_normal($temp_tgl[0]).'/'.$temp_tgl[1];?></td>
		</tr>
		<tr>
			<td></td>
			<td>No. Tiket</td>
			<td>:</td>
			<td><?php echo sprintf('#%05d', $dokumen->no_tiket_frontdesk) ?></td>
		</tr>
	</table>
    <table style="width: 100%;">
        <tr>
            <td style="width: 50px;">ID Petugas CS</td>
            <td style="width: 320px;">: <?php echo $this->session->userdata('id_user') ?></td>
        </tr>
        <tr>
            <td style="width: 50px;">Nama Petugas</label></td>
            <td style="width: 320px;">: <?php echo $this->session->userdata('nama') ?></td>
        </tr>
        <tr>

        </tr>
    </table>
	<table style="margin-top: 24pt">
		<tr>
			<td style="text-decoration:underline;width:700px;">
				IDENTITAS ESELON
			</td>
		</tr>
	</table>
    <div>
        <table style="width: 100%;">
            <tr>
                <td style="width: 50px;">Kode - Nama K/L</td>
                <td style="width: 320px;">: <?php echo $dokumen->id_kementrian . ' - ' . $dokumen->nama_kementrian ?></td>
            </tr>

            <tr>
                <td style="width: 50px;">Kode - Nama Eselon</td>
                <td style="width: 320px;">: <?php echo $dokumen->id_unit . ' - ' . $dokumen->nama_unit ?></td>
            </tr>

            <tr>
                <td style="width: 50px;">Nama Petugas</td>
                <td style="width: 320px;">: <?php echo $dokumen->nama_petugas ?></td>
            </tr>
			
			<tr>
                <td style="width: 50px;">Jabatan</td>
                <td style="width: 320px;">: <?php echo $dokumen->jabatan_petugas ?></td>
            </tr>

            <tr>
                <td style="width: 50px;">No. HP</td>
                <td style="width: 320px;">: <?php echo $dokumen->no_hp ?></td>
            </tr>

            <tr>
                <td style="width: 50px;">No. Kantor</td>
                <td style="width: 320px;">: <?php echo $dokumen->no_kantor ?></td>
            </tr>

            <tr>
                <td style="width: 50px;">Email</td>
                <td style="width: 320px;">: <?php echo $dokumen->email ?></td>
            </tr>
        </table>
    </div>


    <p style="margin: 50px 0; text-align: right;">
        Jakarta, <?php echo date('d-m-Y') ?>
        <br/><br/><br/><br/><br/>
        (............................)
    </p>


    <button onclick="window.print()" class="cetak">Cetak</button>
    <button onclick="window.location.href='<?php echo site_url('frontdesk/ambil_dokumen/selesai/' . $dokumen->no_tiket_frontdesk) ?>'" class="cetak">Selesai</button>
</div>
</body>
</html>

