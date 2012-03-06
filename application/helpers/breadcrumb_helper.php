<?php

function breadcrumb($arr)
{
	echo '<ul class="breadcrumb">';
	for ($i = 0; $i < count($arr); $i++) :
		echo '<li>';
		echo anchor($arr[$i]->link, $arr[$i]->label);

        if ($i + 1 != count($arr)) {
            echo '<span class="divider">/</span>';
        }

        echo '</li>';
	endfor;
	echo '</ul>';
}