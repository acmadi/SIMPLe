<style type="text/css">
    .bla2 {
        border: 1px solid #cecece;
        padding: 10px;
        margin: 10px 0 10px 0;
        border-radius: 5px;
    }

    .bla2:nth-child(odd) {
        float: left;
    }

    .bla2:nth-child(even) {
        float: right;
    }

    .category-title {
        background: #7AB2EC;
        text-shadow: 1px 1px 0 #000;
        border-radius: 5px;
        margin-bottom: 10px;
    }

    .category-title a {
        color: #fff !important;
        font-weight: bold;
        padding: 10px;
        display: inline-block;
        text-decoration: none;
    }
</style>

<script type="">
    $(function () {
        $('#search-form').submit(function () {
            if ($('#search-form input').val() == '') {
                return false;
            }
        })
    })
</script>

<div class="content">
    <div id="msg">
        <?php
        if ($this->session->flashdata('msg')) {
            echo $this->session->flashdata('msg');
        }
        ?>
    </div>
    <div style="display: none;" id="tab1" class="tab_konten">

        <h1>Knowledge Base</h1>

        <div style="margin: 20px 0;">

            <h2><?php echo $result->judul ?></h2>

            <br/><br/>

            <div>
                <?php echo $result->desripsi ?>
            </div>
            <br/><br/>
            <div>
                <p>
                    <?php echo $result->jawaban ?>
                </p>
            </div>

        </div>

    </div>
</div>