<?php

function LevelOdds($x,$y,$z){
	$k = 1/(1/$x+1/$y+1/$z);
	return number_format($k,2,'.','');
}


?>