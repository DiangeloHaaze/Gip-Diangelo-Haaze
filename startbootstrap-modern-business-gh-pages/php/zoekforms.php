<?php
$zoekterm = trim($_POST["zoekterm"]);

if(empty($zoekterm)){
	echo '<div class="alert alert-danger" role="alert">je hebt niets ingevuld.</div>';
	$sql_a = "SELECT factuurid, datum, klantid From tblfacturen";
}
else{
	switch ($_POST["zoekkeuze"]) {
		case '1':
	$sql_a = "SELECT factuurid, datum, klantid From tblfacturen WHERE factuurid = '$zoekterm'";
			break;
		case '2':
	$sql_a = "SELECT factuurid, datum, klantid From tblfacturen WHERE klantid = '$zoekterm'";
			break;
		case '3':
	$sql_a = "SELECT factuurid, datum, klantid From tblfacturen WHERE datum < '$zoekterm'";
			break;
		case '4':
	$sql_a = "SELECT factuurid, datum, klantid From tblfacturen WHERE datum > '$zoekterm'";
			break;
		default:
			$sql_a = "SELECT factuurid, datum, klantid From tblfacturen";
			break;
	}
}



 ?>
