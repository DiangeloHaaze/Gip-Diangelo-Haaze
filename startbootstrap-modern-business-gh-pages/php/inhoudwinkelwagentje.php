<?php
//houd bij wat men in de winkelwagen heeft gestoken en wenst te kopen. Het houdt het aantal van 1 soort product bij en de naam van het koopwaar. Deze worden dan in de winkelwagen getoont.
$i = 0;
while( $i < $_SESSION["count"]){
	if($_SESSION["koopwaren"][$i] == $id) {
		$erdoor = true;
		$herhaling = $i;
	}
	$i++;
}
if (isset($erdoor)) {
	$_SESSION["aantal"][$herhaling] = $_POST["aantal"];
}
else{
	$_SESSION["aantal"][$_SESSION["count"]] = $_POST["aantal"];
	$_SESSION["koopwaren"][$_SESSION["count"]] = $id;
	$_SESSION["count"]++;
}
// Behoort tot de pagina winkelwagen.php.
?>
