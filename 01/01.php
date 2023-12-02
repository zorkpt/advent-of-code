<?php 

$array = explode("\n", file_get_contents('input.txt'));
$sum = 0;
foreach($array as $line) {

	$new_line = preg_replace('/zero/','zero0zero',$line);
	$new_line = preg_replace('/one/','one1one',$new_line);
	$new_line = preg_replace('/two/','two2two',$new_line);
	$new_line = preg_replace('/three/','three3three',$new_line);
	$new_line = preg_replace('/four/','four4four',$new_line);
	$new_line = preg_replace('/five/','five5five',$new_line);
	$new_line = preg_replace('/six/','six6six',$new_line);
	$new_line = preg_replace('/seven/','seven7seven',$new_line);
	$new_line = preg_replace('/eight/','eight8eight',$new_line);
	$new_line = preg_replace('/nine/','nine9nine',$new_line);

	$digits = preg_replace("/[^0-9]/",'', $new_line); 

	if(strlen($digits) > 0) {

		if(strlen($digits) == 1){
			  $digits .= $digits;
		}else {
   			$digits = $digits[0] . $digits[strlen($digits)-1];
		}
	}

	$sum += intval($digits);
}

var_dump($sum);

