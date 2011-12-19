<div class="content"> 
    <h1>Histori</h1>
    <div style="clear: both;"></div>

    <div id="tail">
        <table id="tableOne" class="yui">
            <thead>
            <tr>
                <th class="short">No</th>
                <th>User</th>
                <th>Created</th>
                <th>Message</th>
            </tr>
            </thead>
            <tbody>
            <?php $i = 1 ?>
            <?php foreach ($result as $item): ?>
            <tr>
                <td class="short"><?php echo $i++ ?></td>
                <td><?php echo $item->user ?></td>
                <td><?php echo $item->created ?></td>
                <td><?php echo $item->message ?></td>
            </tr>
            <?php endforeach;?>
            </tbody>
        </table>
    </div>
	<div class="pagination"><?php echo ($pageLink)?'Halaman '.$pageLink:'';?></div><br />
</div>