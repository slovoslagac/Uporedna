<?php

$url = 'http://www.maxbet.rs/ibet/offer/league/117897/48/0/false.json';  
//print $url;
$json = file_get_contents($url);
$json_data = json_decode($json);

// foreach ($json_data as $dat) {
// 	$dat['id']."-----------<br>";
// }

$data=[];
foreach ( $json_data->matchList as $match ) 
{	$matches=[];
    // echo $match->id." ".$match->home." ".$match->away." ";
    $matches["id"]=$match->id;
    $matches["home_team"]=$match->home;
    $matches["away_team"]=$match->away;
    
    foreach ($match->odBetPickGroups as $odds) {
    	// if($odds->id == 70){
    	// 	foreach ($odds->tipTypes as $values) {
    	// 		switch($values->tipType){
    	// 			case "KI_1":
    	// 			$matches["ki1"]=$values->value;
    	// 			break;
    	// 			case "KI_X":
    	// 			$matches["kix"]=$values->value;
    	// 			break;
    	// 			case "KI_2":
    	// 			$matches["ki2"]=$values->value;
    	// 			break;
    	// 		}
    	// 	}

     // 	} 

    	switch($odds->id){
    		case 70:
    		foreach ($odds->tipTypes as $values) {
    			switch($values->tipType){
    				case "KI_1":
    				$matches["ki1"]=$values->value;
    				break;
    				case "KI_X":
    				$matches["kix"]=$values->value;
    				break;
    				case "KI_2":
    				$matches["ki2"]=$values->value;
    				break;
    			}
    		}
    		case 980:
    		foreach ($odds->tipTypes as $values) {
    			switch($values->tipType){
    				case "G0_2":
    				$matches["ug02"]=$values->value;
    				break;
    				case "G3_PLUS":
    				$matches["ug3p"]=$values->value;
    				break;
    				default:
    				break;
    			}
    		}

    		case 982:
    		foreach ($odds->tipTypes as $values) {
    			switch($values->tipType){
    				case "GGG":
    				$matches["GG"]=$values->value;
    				break;
    				default:
    				break;
    			}
    		}
    		default:
    		break;

     	} 

     }
    // foreach ($matches as $m){
    // 	echo $m[0]." ".$m[1]." ".$m[2]." ".$m[3]."<br>";
    // }

     array_push($data, $matches);
}

     // print_r($data);
	foreach ($data as $val) {
		echo $val["home_team"]." ".$val["away_team"]." ".$val["ki1"]." ".$val["kix"]." ".$val["ki2"]." ".$val["ug02"]." ".$val["ug3p"]." ".$val["GG"]."<br>";
	}
?>