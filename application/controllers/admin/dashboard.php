<?php
class Dashboard extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    var $title = 'Dashboard';

    function index()
    {
        $data['title'] = 'Dashboard';
        $data['content'] = 'admin/dashboard';
        $this->load->view('admin/template', $data);
    }

    function database_backup()
    {
        // TODO: Ini sebaiknya diganti dengan yang bisa menyesuaikan otomatis local path nya.
        $local_path = '/opt/lampp/htdocs/db_backup/'; // WITH TRAILING SLASH

        $url = "http://{$_SERVER['HTTP_HOST']}/db_backup/"; // WITH TRAILING SLASH

        $now = date('Y-m-d_H-i-s');
        $filename = 'db_dja__' . $now . '.sql';
        $latest_filename = 'db_dja__latest.sql';

        if (file_exists($local_path) === FALSE)
            mkdir($local_path);

        $command = '/opt/lampp/bin/mysqldump -u backup db_dja > ' . $local_path . $latest_filename;
        exec($command);

        copy($local_path . $latest_filename, $local_path . $filename);

        echo '<pre>';
        echo sprintf("<div>Backup database: <a href='%s' style='text-decoration: none'>%s</a></div>", $url . $filename, $url . $filename);
        echo sprintf("<div>Untuk database terakhir dapat diakses di: <a href='%s' style='text-decoration: none'>%s</a></div>", $url . $latest_filename, $url . $latest_filename);
        echo '<pre>';
        exit();
    }
}