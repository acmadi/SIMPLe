<?php

function breadcrumb($arr)
{
	echo '<ul>';
	for ($i = 0; $i < count($arr); $i++) : 
		echo '<li>';
		echo anchor($arr[$i]->link, $arr[$i]->label);
		echo '</li>';
	endfor;
	echo '</ul>';
}