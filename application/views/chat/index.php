<!doctype>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <!--    <meta http-equiv="Refresh" content="5; url=--><?php //echo site_url('chat') ?><!--">-->

    <title>Sistem Informasi Pusat Layanan DJA - <?php echo $title ?></title>
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <link type="text/css" rel="stylesheet" href="<?php echo base_url('css/960gs/reset.css') ?>"/>
    <link type="text/css" rel="stylesheet" href="<?php echo base_url('css/960gs/text.css') ?>"/>

    <script type="text/javascript" src="<?php echo base_url('js/jquery-1.7.1.min.js') ?>"></script>

    <script>

        $(function () {
            $('input#message').focus();

            $('form').submit(function () {

            })

            setInterval(function () {
                $.get('<?php echo site_url('chat') ?>', function (response) {
                    $('#message-box').html(response);
                    $('#message-box').scrollTop = $('#message-box').scrollHeight;
                })
            }, 10000)
        })
    </script>

</head>
<body>
<div id="message-box" style="height: 590px; overflow-y: auto;">

    <div style="padding: 10px;">
        <?php foreach ($messages->result() as $value): ?>

        <?php if ($value->id_user == $this->session->userdata('id_user')): ?>

            <p style="border-bottom: 1px solid #cecece; background: #f9f9f9; padding: 10px;">
                <strong><?php echo $value->username ?></strong>
                    <span style="color: #c0c0c0; font-size: 11px;">
                        (<?php echo strftime('%d %b %Y %H:%M:%S', strtotime($value->created)) ?>)
                    </span>
                : <?php echo parse_smileys(htmlentities($value->message), base_url('images/smileys')) ?>
            </p>

            <?php else: ?>

            <p style="border-bottom: 1px solid #cecece; background: #ddeafb; padding: 10px;">
                <strong><?php echo $value->username ?></strong>
                    <span style="color: #c0c0c0; font-size: 11px;">
                        (<?php echo strftime('%d %b %Y %H:%M:%S', strtotime($value->created)) ?>)
                    </span>
                : <?php echo parse_smileys(htmlentities($value->message), base_url('images/smileys')) ?>
            </p>

            <?php endif ?>

        <?php endforeach ?>
    </div>

    <a name="bottom"></a>
</div>

<div style="position: fixed; left: 0; bottom: 0; background: black; width: 100%; padding: 10px;">
    <?php echo form_open('chat') ?>
    <input type="text" name="message" id="message" autocomplete="off" style="width: 85%;" required="on"/>
    <input type="submit" value="Kirim"/>
    <?php echo form_close() ?>
</div>
</body>
</html>