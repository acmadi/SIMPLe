<div class="content">
    <h1>Dashboard</h1>

    <table class="chart" style="display: none;">
        <!--<caption>Hello</caption>-->
        <thead>
        <tr>
            <th scope="col">Tiket hari ini</th>
            <th scope="col">Dokumen yang bisa diambil</th>
            <th scope="col">Dokumen yang dikembalikan</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td scope="row">
                <?php echo $this->db->from('tb_tiket_helpdesk')->like('tanggal', date('Y-m-d'))->get()->num_rows(); ?>
            </td>
            <td scope="row">
                <?php echo $this->db->from('tb_tiket_helpdesk')->where('status', 'close')->get()->num_rows(); ?>
            </td>
            <td scope="row">
                <?php echo $this->db->from('tb_tiket_helpdesk')->get()->num_rows(); ?>
            </td>
        </tr>
        </tbody>
    </table>

</div>