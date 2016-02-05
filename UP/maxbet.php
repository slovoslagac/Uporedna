<?php

$url = 'http://www.maxbet.rs/ibet/offer/sportsAndLeagues/48.json';  
// $url = 'http://avansno.maxbet.rs/ibet/bets/offerJSON.html';
//print $url;
$json = file_get_contents($url);
$json_data = json_decode($json);
//$tabela = array();
// foreach ($json_data as $dat){
// 	$tabela[]=$dat;
// 	print_r($tabela)."-----------------------------------------<br>";

// }
// print_r($json_data);
// print_r($tabela)."<br>";

$leagues=[];

foreach ($json_data as $dat){
	if($dat->name =='Fudbal'){
	echo $dat->name."<br>";
	foreach ($dat->leagues as $key) {
		
		// echo $key->betLeagueId." ".$key->name."-----------------------------------------<br>";
		array_push($leagues, [$key->betLeagueId,$key->name]);

	 }
	}

}

foreach ($leagues as $key) {
	echo $key[0].$key[1]."<br>";
}

?>