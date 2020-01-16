<?php
$i = 0;
while( $i < $_SESSION["count"]){
	if($_SESSION["koopwaren"][$i] == $id) {
		$erdoor = true;
		$herhaling = $i;
		echo 'hallo';
	}
	$i++;
}
if (isset($erdoor)) {
	$_SESSION["aantal"][$herhaling] = $_SESSION["aantal"][$herhaling] + $_POST["aantal"];
}
else{
	$_SESSION["aantal"][$_SESSION["count"]] = $_POST["aantal"];
	$_SESSION["koopwaren"][$_SESSION["count"]] = $id;
	$_SESSION["count"] = $_SESSION["count"] + 1;
}




?>
