<div class="content">

    <div class="page-header">
        <h1>Histori</h1>
    </div>

    <form action="<?php echo site_url('admin/histori/filter')?>" method="post" class="form-inline well">
        <input name="ftglmulai" id="datepicker1" value="" type="text" size="30"> -
        <input name="ftglselesai" id="datepicker2" value="" type="text" size="30">
        <button id="simpan" type="submit" class="btn btn-primary" value="filter">
            <i class="icon-search icon-white"></i> Filter
        </button>
    </form>


    <table class="table">
        <thead>
        <tr>
            <th class="no">No</th>
            <th>Created</th>
            <th>User</th>
            <th>Message</th>
        </tr>
        </thead>
        <tbody>
        <?php $i = $nomor + 1; ?>
        <?php foreach ($result as $item): ?>
        <tr>
            <td><?php echo $i++ ?></td>
            <td><?php echo $item->created ?></td>
            <td><?php echo $item->nama ?></td>
            <td><?php echo $item->message ?></td>
        </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</div>

<div class="pagination" style="text-align: center;">
    <?php echo ($pageLink) ? '' . $pageLink : '';?>
</div>

<link type="text/css" href="<?php echo base_url()?>css/ui-lightness/jquery-ui-1.8.16.custom.css" rel="stylesheet"/>
<script type="text/javascript" src="<?php echo base_url()?>js/jquery.ui.core.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>js/jquery.ui.datepicker.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $("#datepicker1").datepicker({ dateFormat:'yy-mm-dd' });
        $("#datepicker2").datepicker({ dateFormat:'yy-mm-dd' });
        $("div.ui-datepicker").css('font-size', '12px');
    });
</script>