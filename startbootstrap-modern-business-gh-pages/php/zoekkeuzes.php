<?php
//
    $categorie = mysqli_real_escape_string($mysqli,$_POST["categorie"]);
    $zoekterm = mysqli_real_escape_string($mysqli,$_POST["zoekterm"]);
	$soort = mysqli_real_escape_string($mysqli,$_POST["soort"]);

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
			$sql = "SELECT * FROM tblproducten WHERE soortid = '$soort'";
			break;
		case 11:
			$sql = "SELECT p.* FROM tblproducten p, tblcategorieperproduct cap WHERE p.productid = cap.productid AND cap.categorieid = '$categorie' AND soortid = '$soort'";
			break;
		case 100:
			$sql = "SELECT * FROM tblproducten WHERE productnaam LIKE '%$zoekterm%'";
			break;
		case 101:
			$sql = "SELECT p.* FROM tblproducten p, tblcategorieperproduct cap WHERE p.productid = cap.productid AND cap.categorieid = '$categorie' AND productnaam LIKE '%$zoekterm%'";
			break;
		case 110:
			$sql = "SELECT * FROM tblproducten WHERE soortid = '$soort' AND productnaam LIKE '%$zoekterm%'";
			break;
		case 111;
			$sql = "SELECT p.* FROM tblproducten p, tblcategorieperproduct cap WHERE p.productid = cap.productid AND cap.categorieid = '$categorie' AND productnaam LIKE '%$zoekterm%' AND soortid = '$soort'";
			break;
		default:
			$sql = "SELECT * FROM tblproducten";
	}
	switch ($_POST['rangorde']) {
		case 'AZ':
			$sql = $sql.' ORDER BY productnaam ASC';
			break;
		case 'ZA':
			$sql = $sql.' ORDER BY productnaam DESC';
			break;
		case 'LH':
			$sql = $sql.' ORDER BY prijsPstuk ASC';
			break;
		case 'HL':
			$sql = $sql.' ORDER BY prijsPstuk DESC';
			break;
	}
//behoort tot de webpagina producten.php
 ?>
