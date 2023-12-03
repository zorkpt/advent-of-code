<?php



/// lets go.


$sets = [
	'red' => 12,
	'green' => 13,
	'blue' => 14
	];
$day = [];
$sum = 0;

$array = explode('Game ', file_get_contents('input.txt'));
array_shift($array);
$day = [];
foreach($array as $line) { 

	$posicao1 = strpos($line, ':');
	$id = substr($line, 0, $posicao1);

 echo "String do jogo antes de dividir em turnos: " . substr($line, $posicao1 + 1) . "\n";
	$valid = true;
	$parts = explode(';', substr($line, $posicao1 + 1));
//var_dump($parts);
	foreach($parts as $part) { 
 echo "Turno antes do processamento: '$part'\n";

		var_dump($part);
		preg_match_all('/(\d+) red/', $part, $matchred);

		preg_match_all('/(\d+) blue/', $part, $matchblue);

		preg_match_all('/(\d+) green/', $part, $matchgreen);

    echo "Matches Red: ";
    print_r($matchred[1]);
    echo "Matches Blue: ";
    print_r($matchblue[1]);
    echo "Matches Green: ";
    print_r($matchgreen[1]);


//		var_dump($matchred);
		$red = array_sum($matchred[1]);
		$blue = array_sum($matchblue[1]);
		$green = array_sum($matchgreen[1]);


	$day[$id][] = ['red' => $red, 'blue' => $blue, 'green' => $green];
//echo "Jogo ID: $id, Turno: $part, Red: $red, Blue: $blue, Green: $green\n";
		if($red >  $sets['red'] || $green > $sets['green'] || $blue > $sets['blue']) { 
			$valid = false;	
//			break;
continue;
		}
				
}		
		if($valid) {
	//		var_dump($id);
			$sum += intval($id);
}

}
$totalpower = 0;
foreach ($day as $gameid => $turns) {
    $maxred = 0;
    $maxblue = 0;
    $maxgreen = 0;

    foreach ($turns as $colors) {
        if (isset($colors['red']) && $colors['red'] > $maxred) {
            $maxred = $colors['red'];
        }
        if (isset($colors['blue']) && $colors['blue'] > $maxblue) {
            $maxblue = $colors['blue'];
        }
        if (isset($colors['green']) && $colors['green'] > $maxgreen) {
            $maxgreen = $colors['green'];
        }

        echo " ID: $gameid, Turno: " . json_encode($colors) . ", Max Red: $maxred, Max Blue: $maxblue, Max Green: $maxgreen\n";
    }

    $power = $maxred * $maxblue * $maxgreen;
    echo "poder do jogo id:  $gameid: $power\n";
    $totalpower += $power;
}

echo "powertotal :  " . $totalpower . "\n";

