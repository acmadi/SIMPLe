<script type="text/javascript">
    $(function () {
        $('#jawaban').dialog('destroy');

        $('#jawaban').dialog({
            autoOpen:false,
            title:'Referensi Jawaban',
            modal:true,
            resizable:false,
            draggable:false,
            width:700,
            height:400,
            dialogClass:'centered-dialog'
        });

        $('.referensi-jawaban').live('click', function () {
            var knowledge_base_id = $(this).attr('title');
            var url = '<?php echo site_url('helpdesk/knowledge_base/get_by_id/') ?>/' + knowledge_base_id;

            $.get(url, function (response) {
                $('#jawaban').html(response).dialog('open');
                jawaban_id = $('#jawaban input[type="hidden"]').val();
            });
        });
    })
</script>

<div class="content">
    <h1>Knowledge Base</h1>

    <div>
    <?php $this->load->view('knowledge/searchform') ?>
    </div>
    <div id="ref_cat" style="float: left; width: 150px; padding-left: 0">

        <strong>Kategori</strong>
        <ul style="list-style: none">
            <li style="margin-left: 0; margin-bottom: 5px;">
            <a href="<?php echo site_url($this->uri->segment(1)) ?>">Semua Kategori</a>
            </li>
            <?php foreach ($categories as $value): ?>
            <li style="margin-left: 0; margin-bottom: 5px;">
                <?php
                echo anchor(
                    $this->uri->segment(1) . '/category/' . $value->id_kat_knowledge_base,
                    $value->kat_knowledge_base
                )
                ?>
            </li>
            <?php endforeach ?>
        </ul>

    </div>

    <div style="padding-left:160px">
        <h6>
        <?php if(isset($active_cat)) : ?>
            Menampilkan kategori <?php echo $active_cat ?>
        <?php elseif(isset($keyword)) : ?>
            Menampilkan semua knowledge dengan kata kunci "<?php echo $keyword ?>"
        <?php else : ?>
            Menampilkan semua kategori
        <?php endif; ?>
        </h6>
        <ol>
            <?php foreach ($kb as $value): ?>
            <li style="margin-bottom: 10px;">
                <a class="referensi-jawaban" href="javascript:void(0)" title="<?php echo $value->id_knowledge_base ?>"><?php echo $value->judul ?></a>
            </li>
            <?php endforeach ?>
        </ol>
    </div>

    <div id="jawaban" style="display: none;"></div>

</div>