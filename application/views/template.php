<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css" media="screen">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/products.css" media="screen">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/nav.css" media="screen">

    <!--BEGIN: AUTO SUGGEST-->
    <script type="text/javascript" src="http://www.google.com/jsapi"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/script.js"></script>

    <!--BEGIN: SLIDE-->
    <script src="<?php echo base_url(); ?>js/slide_products.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {

            //Larger thumbnail preview
            $("ul.thumb li").hover(function() {
                $(this).css({'z-index' : '10'});
                $(this).find('img').addClass("hover").stop()
                        .animate({
                            marginTop: '-110px',
                            marginLeft: '-110px',
                            top: '50%',
                            left: '50%',
                            width: '175px',
                            height: '131px',
                            padding: '20px'
                        }, 200);

            }, function() {
                $(this).css({'z-index' : '0'});
                $(this).find('img').removeClass("hover").stop()
                        .animate({
                            marginTop: '0',
                            marginLeft: '0',
                            top: '0',
                            left: '0',
                            width: '100px',
                            height: '75px',
                            padding: '5px'
                        }, 200);
            });

            //Swap Image on Click
            $("ul.thumb li a").click(function() {

                var mainImage = $(this).attr("href"); //Find Image Name
                $("#main_view img").attr({ src: mainImage });
                return false;
            });

        });
    </script>

    <title><?php echo isset($title) ? $title : ''; ?></title>
</head>

<body>

<!-- BuySellAds.com Ad Code -->
<script type="text/javascript">
    (function() {
        var bsa = document.createElement('script');
        bsa.type = 'text/javascript';
        bsa.async = true;
        bsa.src = '//s3.buysellads.com/ac/bsa.js';
        (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(bsa);
    })();
</script>
<!-- END BuySellAds.com Ad Code -->

<div id="wrapper">
    <div id="header"><?php $this->load->view('header'); ?></div>
    <div id="navbar"><?php $this->load->view('navbar'); ?></div>
    <div id="contents"><?php $this->load->view($contents); ?></div>
    <div id="latest"><?php $this->load->view('latest'); ?></div>
    <div id="footer"><?php $this->load->view('footer'); ?></div>
</div>
</body>
</html>




<script language="javascript" src="<?php echo base_url(); ?>js/jquery.min.js" type="text/javascript"></script>
<script language="javascript" src="<?php echo base_url(); ?>js/jquery.tweet.js" type="text/javascript"></script>
<script language="javascript" src="<?php echo base_url(); ?>js/jquery.uniform.js" type="text/javascript"></script>

<script language="javascript" src="<?php echo base_url(); ?>js/jquery.colorbox-min.js"></script>

<script language="javascript">
    // Header Show/Hide
    $(window).scroll(function() {
        var scrollVal = $(this).scrollTop();
        //alert(scrollVal);
        if (scrollVal > 40) {
            $('#header').stop().animate({
                top: '-62',
                opacity: 0.9
            }, 100, function() {
                // Animation complete.

                $('.second_logo').show();
                $('.second_logo').stop().animate({
                    width: '52'
                }, 100, function() {
                    $('.second_logo img').fadeIn(100);
                });

            });
            $('.logo').hide();
            $('.social').hide();
            $('#nav_top').css('padding-top', '78px');
            $('.scroll_top').fadeIn(500);


        } else {
            $('#header').stop().animate({
                top: '0',
                opacity: 1
            }, 100, function() {
                // Animation complete.
            });

            $('.logo').show();
            $('.social').show();
            $('.scroll_top').fadeOut(50);
            $('#nav_top').css('padding-top', '0px');

            $('.second_logo img').css('display', 'none');

            $('.second_logo').stop().animate({
                width: '0'

            });

        }

        if (scrollVal > 40) {
            $("#header").hover(function() {
                $('#header').stop().animate({
                    opacity: 1
                });
            }, function () {
                $('#header').stop().animate({
                    opacity: 0.9
                })
            });
        }


    });


    $('.scroll_top').click(function() {

        $('html, body').animate({
            scrollTop: $("body").offset().top}, 700);

    });

    // end dom ready
    })
    ;
</script>


<script type="text/javascript" src="<?php echo base_url(); ?>js/popup-window.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/fungsi.js"></script>

<!--PAGINATION-->
