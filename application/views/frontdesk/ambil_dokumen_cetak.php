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

    <h1>Tanda Terima Pengambilan Dokumen Revisi Anggaran #<?php echo sprintf('%05d', $dokumen->no_tiket_frontdesk) ?></h1>

    <table style="width: 100%;">
        <tr>
            <td style="width: 120px;">ID Petugas</td>
            <td style="width: 320px;"><?php echo $this->session->userdata('id_user') ?></td>

            <td style="text-align: left; padding-right: 10px;">Tanggal</td>
            <td style="text-align: left;"><?php echo date('d-m-Y H:i') ?></td>
        </tr>
        <tr>
            <td style="width: 120px;">Nama Petugas</label></td>
            <td style="width: 320px;"><?php echo $this->session->userdata('nama') ?></td>

            <td style="text-align: left; padding-right: 10px;">No. Tiket</label> </td>
            <td style="text-align: left;"><?php echo sprintf('#%05d', $dokumen->no_tiket_frontdesk) ?></td>
        </tr>
        <tr>

        </tr>
    </table>

    <div>


        <!--            <tr>-->
        <!--                <td>Kode - Nama K/L</td><br/>-->
        <!--                <td>--><?php //echo $kementrian->id_kementrian . ' - ' . $kementrian->nama_kementrian ?><!--</td>-->
        <!--            </tr>-->

        <!--            <tr>-->
        <!--                <td>Nama Eselon I</td><br/>-->
        <!--                <td>--><?php //echo $unit->nama_unit ?><!--</td>-->
        <!--            </tr>-->

        <table style="width: 100%; margin-top: 24pt">
            <tr>
                <td colspan="2">
                    <strong>Identitas Satker</strong>
                </td>
            </tr>
            <tr>
                <td>Nama Satker</td>
                <td>: <?php echo $dokumen->id_satker . ' - ' . $dokumen->nama_satker ?></td>
            </tr>

            <tr>
                <td>Nama</td>
                <td>: <?php echo $dokumen->nama_petugas ?></td>
            </tr>

            <tr>
                <td>Jabatan</td>
                <td>: <?php echo $dokumen->jabatan_petugas ?></td>
            </tr>

            <tr>
                <td>No. HP</td>
                <td>: <?php echo $dokumen->no_hp ?></td>
            </tr>

            <tr>
                <td>No. Kantor</td>
                <td>: <?php echo $dokumen->no_kantor ?></td>
            </tr>

            <tr>
                <td>Email</td>
                <td>: <?php echo $dokumen->email ?></td>
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

