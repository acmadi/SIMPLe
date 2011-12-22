<!doctype html>
<html>
<head>
    <title>Tanda Terima Pengajuan Revisi Anggaran - #<?php echo sprintf('%05d', $dokumen->no_tiket_frontdesk) ?></title>
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
<?php // print_r($dokumen) ?>

<div class="container_12 clearfix">
    <h1>Tanda Terima Pengajuan Revisi Anggaran #<?php echo sprintf('%05d', $dokumen->no_tiket_frontdesk) ?></h1>

    <div class="grid_6" style="float: left;">
        <div><label class="short">ID Petugas</label> <?php echo $this->session->userdata('id_user') ?></div>
        <div><label class="short">Nama Petugas</label> <?php echo $this->session->userdata('nama') ?></div>
        <div><label class="short">No. Tiket</label> <strong><?php echo sprintf('#%05d', $dokumen->no_tiket_frontdesk) ?></strong></div>
    </div>

    <div class="grid_6" style="text-align: right; float: right;">
        <label class="short">Tanggal</label>
        <?php echo date('d-m-Y H:i') ?>
    </div>
    <div class="clear"></div>

    <div>
        <fieldset>
            <legend>Identitas Satker</legend>

<!--            <p>-->
<!--                <label>Kode - Nama K/L</label><br/>-->
<!--                <span>--><?php //echo $kementrian->id_kementrian . ' - ' . $kementrian->nama_kementrian ?><!--</span>-->
<!--            </p>-->

<!--            <p>-->
<!--                <label>Nama Eselon I</label><br/>-->
<!--                <span>--><?php //echo $unit->nama_unit ?><!--</span>-->
<!--            </p>-->

            <p>
                <label>Nama Satker</label><br/>
                <span><?php echo $dokumen->id_satker . ' - ' . $dokumen->nama_satker ?></span>
            </p>

            <p>
                <label>Nama</label>
                <span><?php echo $dokumen->nama_petugas ?></span>
            </p>

            <p>
                <label>Jabatan</label>
                <span><?php echo $dokumen->jabatan_petugas ?></span>
            </p>

            <p>
                <label>No. HP</label>
                <span><?php echo $dokumen->no_hp ?></span>
            </p>

            <p>
                <label>No. Kantor</label>
                <span><?php echo $dokumen->no_kantor ?></span>
            </p>

            <p>
                <label>Email</label>
                <span><?php echo $dokumen->email ?></span>
            </p>

        </fieldset>
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

