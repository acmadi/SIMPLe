<?php
$command = 'mysqldump -u root -pkomuri123!! db_dja > "C:\www\simple\daily_backup-"' . strftime('%Y-%m-%d') . '.sql';
exec($command);