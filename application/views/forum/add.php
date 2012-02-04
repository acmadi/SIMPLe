<script src="http://localhost/DJA/js/nicedit/nicEdit.js.php?base=http://localhost/DJA/forum/add" type="text/javascript"></script>

<style type="text/css">
    table td {
        padding: 10px 0;
    }
    table input[type="text"],
    table textarea {
        width:860px;
    }
    table textarea {
        height: 100px;
    }

</style>

<div class="content">
    <h1>Tambah Forum Baru</h1>

    <?php echo form_open_multipart('forum/add/' . $this->uri->segment(3)) ?>
        <fieldset>
            <table width="100%">
                <tbody>
                <tr>
                    <td>Judul</td>
                    <td><input type="text" name="judul_forum"/></td>
                </tr>
                <tr>
                    <td>Isi</td>
                    <td><textarea name="isi_forum"></textarea></td>
                </tr>
                <tr>
                    <td>Lampiran</td>
                    <td><input type="file" name="file"/></td>
                </tr>
                </tbody>
            </table>

            <div style="text-align: center">
                <input type="submit" value="Submit" class="button green">
            </div>
        </fieldset>
    </form>

</div>