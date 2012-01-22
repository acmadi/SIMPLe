<?php
function dump($var) 
{
	if(ENVIRONMENT == 'development'):
		echo '<pre>';
		print_r($var);
		echo '</pre>';
	endif;
}