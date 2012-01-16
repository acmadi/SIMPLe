<div id="konten">


    <?php if ($lists->num_rows() > 0): ?>
    <div class="table">

        <div id="tail">
            <div class="tab">
                <table id="tableOne" class="yui">
                    <thead>
                    <tr>
                        <th class="short">No</th>
                        <th class="short">Tanggal</th>
                        <th class="short">Hari</th>
                        <th class="short">No Tiket</th>
                        <th>Nama K/L</th>
                        <th>Nama Eselon</th>

                        <?php if ($this->uri->segment(4) == 6): ?>
                        <th class="action">Aksi</th>
                        <?php endif ?>

                    </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1 ?>
                        <?php foreach ($lists->result() as $value): ?>
                    <tr>
                        <td class="short"><?php echo $i++ ?></td>
                        <td class="short"><?php echo date('d-m-Y', strtotime($value->tanggal)) ?></td>
                        <td class="short">
                            <?php
                            $date1 = new DateTime();
                            $date2 = new DateTime($value->tanggal);
                            $day = $date2->diff($date1);
                            if ($day->days > 4) {
                                echo '<span style="font-weight: bold; font-size: 13px; color: tomato;">' . $day->days . '</span>';
                            } elseif ($day->days == 4) {
                                echo '<span style="font-weight: bold; font-size: 13px; color: yellow; background: black; padding: 0 4px;">' . $day . '</span>';
                            } else {
                                echo '<span style="">' . $day->days . '</span>';
                            }
                            ?>
                        </td>
                        <td class="short"><?php echo sprintf('%05d', $value->no_tiket_frontdesk) ?></td>
                        <td><?php echo $value->nama_kementrian ?></td>
                        <td><?php echo $value->nama_unit ?></td>

                        <?php if ($this->uri->segment(4) == 6): ?>
                        <td class="action">
                            <a href="#" class="button blue-pill">Disetujui</a>
                            <a href="#" class="button gray-pill">Ditolak</a>
                        </td>
                        <?php endif ?>

                    </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
         <br/>
    </div>

    <?php else: ?>

    <div></div>
        Data kosong
    <?php endif ?>
</div>