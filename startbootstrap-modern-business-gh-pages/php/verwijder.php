<?php

$tell = 0;
$counter = 0;
$array_size = sizeof($_SESSION["koopwaren"]);
$id =  $_GET["productid"];
for($i = 0; $i < $array_size; $i++){
	if($_SESSION["koopwaren"][$i] != $id){
		$array_koopwaar[$counter] = $_SESSION["koopwaren"][$i];
		$array_aantal[$counter] = $_SESSION["aantal"][$i];
		$counter++;
	}
}

if(isset($array)){
	unset($_SESSION["koopwaren"]);
	for($i = 0; $i < sizeof($array); $i++){
		$_SESSION["koopwaren"][$i] = $array_koopwaar[$i];
		$_SESSION["aantal"][$i] = $array_aantal[$i];
		$tel = $i;
	}
	$_SESSION["count"] = sizeof($_SESSION["koopwaren"]);
}
else {
	unset($_SESSION["koopwaren"]);
	unset($_SESSION["aantal"]);
	$_SESSION["count"] = 0;
}



?>
