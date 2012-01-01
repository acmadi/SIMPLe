<!doctype html>
<html>
<head>
    <title>Tanda Terima Pengajuan Revisi Anggaran - #<?php echo sprintf('%05d', $no_tiket_frontdesk) ?></title>
    <!--    <link href="--><?php //echo base_url('css/960gs/reset.css') ?><!--" type="text/css" rel="stylesheet"/>-->
    <!--        <link href="--><?php //echo base_url('css/960gs/text.css') ?><!--" type="text/css" rel="stylesheet"/>-->
    <!--    <link href="--><?php //echo base_url('css/960gs/960.css') ?><!--" type="text/css" rel="stylesheet"/>-->
    <link href="<?php echo base_url('css/print.css') ?>" type="text/css" rel="stylesheet" media="print"/>
    <style>
        body {
            font-family: "Lucida Grande", Tahoma, Arial, sans-serif;
        }

        h1 {
            text-align: center;
            font-weight: normal;
            margin-bottom: 2em;
            border-bottom: 1px dotted #cecece;
        }

        .clear {
            clear: both;
        }

        fieldset {
            border: 1px solid #cecece;
            margin: 10px 0;
        }

        legend {
            font-size: 22px;
        }

        label {
            width: 200px;
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
<?php //print_r($identitas) ?>

<div class="container_12 clearfix">

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

    <div style="text-align: center;"><strong>SURAT PERNYATAAN KELENGKAPAN DOKUMEN</strong></div>
    <div style="text-align: center;">NOMOR BA-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/DJA/<?php echo date('Y') ?></div>


    <ul>
        <li>
            Pada hari ini, tanggal <?php echo date('d-m-Y') ?>,
            dengan ini dinyatakan bahwa dokumen-dokumen persyaratan pengajuan revisi anggaran yang
            diajukan pada tanggal <?php echo date('d-m-Y') ?>
            dengan nomor tiket <strong>#<?php echo $no_tiket ?></strong>
            dinyatakan telah lengkap dan dapat diproses lebih lanjut.
        </li>
        <li>
            Penetapan revisi anggaran akan diselesaikan paling lambat tanggal
            <strong>
                <?php
                echo date('d-m-Y', strtotime('+5 days'));
                ?>
            </strong>
            pukul <?php echo date('H:i') ?> WIB
        </li>
        <li>Surat Pernyataan ini sah jika dibubuhi stempel dinas Direktorat Jenderal Anggaran.</li>
        <li>Surat Pernyataan ini dicetak secara elektronik dan tidak diperlukan tanda tangan.</li>
        <li>
            Surat Pernyataan ini dicetak dalam rangkap 4:
            <ul>
                <li>Lembar 1 (asli) melekat pada dokumen yang diproses.</li>
                <li>Lembar 2 disampaikan kepada pihak yang mengajukan revisi anggaran.</li>
                <li>Lembar 3 disampaikan kepada Manajer Kinerja Unit Eselon II.</li>
                <li>Lembar 4 sebagai arsip pemroses.</li>
            </ul>
        </li>
    </ul>

    <p style="margin: 50px 0; text-align: left;">
        <br/>
        Nama Petugas: <?php echo $this->session->userdata('nama') ?><br/>
        ID Petugas: <?php echo $this->session->userdata('id_user') ?><br/>
<!--        <br/><br/><br/><br/><br/>-->
<!--        (............................)-->
    </p>


    <button onclick="window.print()" class="cetak">Cetak</button>
    <button onclick="window.location.href='<?php echo site_url('frontdesk/dashboard') ?>'" class="cetak">Selesai</button>
</div>
</body>
</html>

