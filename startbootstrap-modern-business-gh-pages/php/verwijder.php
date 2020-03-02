<?php

$tell = 0;
$array_size = sizeof($_SESSION["koopwaren"]);
$id =  $_GET["productid"];

for($i = 0; $i < $array_size; $i++){
	if($_SESSION["koopwaren"][$i] != $id){
		$array[$i] = $_SESSION["koopwaren"][$i];
	}
}
for($i = 0; $i < $array_size; $i++){

	$_SESSION["koopwaren"][$i] = $array[$i];
	$tel = $i;
}
unset($_SESSION["koopwaren"][$i+1]);
foreach ($_SESSION["koopwaren"] as $key => $value) {
	echo $value;
}

?>
