<?php

    $categorie = $_POST["categorie"];
    $zoekterm = $_POST["zoekterm"];
	$soort = $_POST["soort"];

	$ja = 0;
	if($categorie != 'start'){
		$ja = $ja+1;
	}
	if ($soort != 'start') {
		$ja = $ja+10;
	}
	if (isset($zoekterm) && $zoekterm != '' ) {
		$ja = $ja+100;
	}
	switch ($ja) {
		case 1:
			$sql = "SELECT p.* FROM tblproducten p, tblcategorieperproduct cap WHERE p.productid = cap.productid AND cap.categorieid = '$categorie'";
			break;
		case 10:
			$sql = "";
			break;
		case 11:
			$sql = "";
			break;
		case 100:
			$sql = "";
			break;
		case 101:
			$sql = "";
			break;
		case 110:
			$sql = "";
			break;
		case 111;
			$sql = "";
			break;
	}
	echo $sql." ".$ja;
 ?>
