<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class mreferensi extends CI_Model
{

	public function fetch_url($url)
	{
	  $ch = curl_init();
	  $timeout = 5;
	  curl_setopt($ch,CURLOPT_URL,$url);
	  curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
	  curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout);
	  $data = curl_exec($ch);
	  curl_close($ch);
	  return $data;
	}

	public function cari($keyword)
	{
		$url = 
			'http://www.kemenkumham.go.id/pencarian?searchword=' . 
			$keyword . 
			'&ordering=newest&searchphrase=exact&limit=0';
		
		// tarik dari website menkumham
		$raw_string = $this->fetch_url($url);

		// parsing html
		$html = new simple_html_dom();
		$html->load($raw_string);
		
		// ekstraksi tahap satu
		$temp = $html->find('table[class="contentpaneopen"]', 1);

		// ekstraksi tahap dua
		if(is_object($temp)) : 
			$str_temp = $temp->outertext;
			$html = new simple_html_dom();
			$html->load($str_temp);
			$result_array = $html->find('a[href*="produk-hukum"]');
		else :
			$result_array = NULL;
		endif;
		
		return $result_array;
	}

	function get_categories()
	{
		$url = 'http://www.kemenkumham.go.id/produk-hukum';

		// tarik dari website menkumham
		$raw_string = $this->fetch_url($url);

		// parsing html
		$html = new simple_html_dom();
		$html->load($raw_string);

		$links = $html->find('a[class="category"]');

		foreach($links as &$link) :
			$tmp = explode('/produk-hukum/', $link->href);
			$link->href = base_url() . index_page() . '/referensi/category/' . $tmp[1];
		endforeach;

		return $links;
	}

	function get_by_category($cat)
	{
		$url = 'http://www.kemenkumham.go.id/produk-hukum/' . $cat;

		// tarik dari website menkumham
		$raw_string = $this->fetch_url($url);

		// parsing html
		$html = new simple_html_dom();
		$html->load($raw_string);

		$tds = $html->find('td[headers="tableOrdering"]');

		foreach($tds as &$td) :
			foreach($td->find('a') as $a) :
				$a->target="_blank";
				$a->href = 'http://www.kemenkumham.go.id' . $a->href;
			endforeach;
		endforeach;

		return $tds;
	}
}