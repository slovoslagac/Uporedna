<?php
foreach($_POST['firstname'] as $index => $inv) {
				
		$indexes[] = $index;
	}
	
foreach($indexes as $index) {
		// temporary data
	$tmp = array();
	$tmp['firstname'] = $_POST['firstname'][$index];
	$tmp['lastname'] = $_POST['lastname'][$index];

	
	$data[] = $tmp;
}

print_r($data);

echo "---------------------------------<br />\n";

foreach($_POST['league'] as $index => $inv) {

	$indexes[] = $index;
}

foreach($indexes as $index) {
	// temporary data
	$tmp = array();
	$tmp['league'] = $_POST['league'][$index];

	$data[] = $tmp;
}

print_r($data);

	echo "---------------------------------<br />\n";

	
   
  ?>

