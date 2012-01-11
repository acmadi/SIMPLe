<?php
class Dashboard extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
		$this->load->model('mdashboard');
    }

    var $title = 'Dashboard';

    function index()
    {
        /*
          if ($this->session->userdata('login') == TRUE)
          {*/
		  // Standard inclusions   
		  include("pChart/pData.class");
		  include("pChart/pChart.class");
		  
		  $result_statistik = $this->mdashboard->get_info_statistik();
		  
		  $tmp = array();
		  $tmp2 = array();
		  
		  foreach($result_statistik['tahun'] as $th):
			if(isset($result_statistik['front'][$th])){
				$tmp[] =  $result_statistik['front'][$th];
			}else{
				$tmp[] = 0;
			}
			
			if(isset($result_statistik['help'][$th])){
				$tmp2[] =  $result_statistik['help'][$th];
			}else{
				$tmp2[] = 0;
			}
		  endforeach;
		  
		  
		  // Dataset definition 
		  $DataSet = new pData;
		  $DataSet->AddPoint($tmp,"Serie1");
		  $DataSet->AddPoint($tmp2,"Serie2");
		 
		  $DataSet->AddAllSeries();
		  $DataSet->AddPoint($result_statistik['tahun'],"serie3");
		  $DataSet->SetAbsciseLabelSerie("serie3");
		  
		  $DataSet->SetSerieName("Front desk (".$result_statistik['jml_1']." Org)","Serie1");
		  $DataSet->SetSerieName("Help desk (".$result_statistik['jml_2']." Org)","Serie2");

		  // Initialise the graph
		  $Test = new pChart(500,230);
		  $Test->setFontProperties("Fonts/tahoma.ttf",8);
		  $Test->setGraphArea(50,30,330,200);
		  $Test->drawFilledRoundedRectangle(7,7,493,223,5,240,240,240);
		  $Test->drawRoundedRectangle(5,5,495,225,5,230,230,230);
		  $Test->drawGraphArea(255,255,255,TRUE);
		  $Test->drawScale($DataSet->GetData(),$DataSet->GetDataDescription(),SCALE_NORMAL,150,150,150,TRUE,0,2,TRUE);   
		  $Test->drawGrid(4,TRUE,230,230,230,50);

		  // Draw the 0 line
		  $Test->setFontProperties("Fonts/tahoma.ttf",6);
		  $Test->drawTreshold(0,143,55,72,TRUE,TRUE);

		  // Draw the bar graph
		  $Test->drawBarGraph($DataSet->GetData(),$DataSet->GetDataDescription(),TRUE);

		  // Finish the graph
		  $Test->setFontProperties("Fonts/tahoma.ttf",8);
		  $Test->drawLegend(350,100,$DataSet->GetDataDescription(),255,255,255);
		  $Test->setFontProperties("Fonts/tahoma.ttf",10);
		  $Test->drawTitle(50,22,"Statistik Pengunjung",50,50,50,385);
		  $Test->Render("images/dashboard_bar_admin.png");

  
		 
        $data['title'] = 'Dashboard';
        $data['content'] = 'admin/dashboard';

        $bc[0]->link = 'admin/dashboard';
        $bc[0]->label = 'Home';
        $bc[1]->link = 'admin/dashboard';
        $bc[1]->label = 'Dashboard';
        $data['breadcrumb'] = $bc;
        	
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