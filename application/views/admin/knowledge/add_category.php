<div class="content">

    <h1>Tambah Kategori Knowledge Baru</h1>

    <div id="tail">
        <form action="<?php echo site_url('/admin/knowledge/add_category') ?>" method="post">

            <div class="form">
                <p>
                    <label>Nama Kategori</label>
                    <input type="text" name="category" value=""/>
                </p>

                <p>
                    <input type="submit" class="button blue-pill" value="Simpan"/>
                    <a href="<?php echo site_url('/admin/knowledge') ?>" class="button gray-pill">Batal</a>
                </p>
            </div>
        </form>
    </div>

</div>