<?php

$tell = 0;
$counter = 0;
$array_size = sizeof($_SESSION["koopwaren"]);
$id =  $_GET["productid"];
for($i = 0; $i < $array_size; $i++){
	if($_SESSION["koopwaren"][$i] != $id){
		$array[$counter] = $_SESSION["koopwaren"][$i];
		$counter++;
	}
}

if(isset($array)){
	unset($_SESSION["koopwaren"]);
	for($i = 0; $i < sizeof($array); $i++){
		$_SESSION["koopwaren"][$i] = $array[$i];
		$tel = $i;
	}
	$_SESSION["count"] = sizeof($_SESSION["koopwaren"]);
}
else {
	unset($_SESSION["koopwaren"]);
	$_SESSION["count"] = 0;
}



?>
