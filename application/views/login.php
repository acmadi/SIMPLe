<?php if (ENVIRONMENT != 'production'): ?>
<strong>Ini cuma tampil kalau environment-nya bukan production untuk kemudahan login pada fase development</strong><br/>
<select id="login_auto_insert">
    <option> - Silahkan dipilih kakak :D -</option>
    <option value="1">CS Frontdesk</option>
    <option value="2">CS Helpdesk</option>
    <option value="3">Supervisor/Penyelia</option>
    <option value="4">Pelaksana</option>
    <option value="5">Kasubdit Anggaran</option>
    <option value="6">Duktek</option>
    <option value="7">Direktur</option>
    <option value="8">Dirjen</option>
    <option value="9">CS Pengaduan</option>
    <option value="10">Admin Pengaduan</option>
    <option value="11">Knowledge Base Coordinator</option>
</select>
<script>
    $(function () {
        $('#login_auto_insert').change(function () {
            if ($(this).val() == 1) {
                $('#user').val('frontdesk');
                $('#pass').val('frontdesk');
            }
            if ($(this).val() == 2) {
                $('#user').val('helpdesk');
                $('#pass').val('helpdesk');
            }
            if ($(this).val() == 3) {
                $('#user').val('supervisor');
                $('#pass').val('supervisor');
            }
            if ($(this).val() == 4) {
                $('#user').val('pelaksana');
                $('#pass').val('pelaksana');
            }
            if ($(this).val() == 5) {
                $('#user').val('anggaran');
                $('#pass').val('anggaran');
            }
            if ($(this).val() == 6) {
                $('#user').val('dadutek');
                $('#pass').val('dadutek');
            }
            if ($(this).val() == 7) {
                $('#user').val('direktur');
                $('#pass').val('direktur');
            }
            if ($(this).val() == 8) {
                $('#user').val('dirjen');
                $('#pass').val('dirjen');
            }
            if ($(this).val() == 9) {
                $('#user').val('pengaduan');
                $('#pass').val('pengaduan');
            }
            if ($(this).val() == 10) {
                $('#user').val('adminpeng');
                $('#pass').val('adminpeng');
            }
            if ($(this).val() == 11) {
                $('#user').val('kb');
                $('#pass').val('kb');
            }
        });
    })
</script>
<?php endif ?>

<?php echo $this->session->flashdata('error') ?>
