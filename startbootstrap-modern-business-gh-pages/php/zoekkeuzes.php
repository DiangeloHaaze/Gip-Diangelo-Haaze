<?php
    $categorie = $_POST["categorie"];
    $zoekterm = $_POST["zoekterm"];
	$soort = $_POST["soort"];
//Als alleen de categorie is ingevuld
if($categorie != 'start' && !(isset($zoekterm)) &&  $soort == 'start'){
	$sql = "SELECT * FROM tblproducten p, tblcategorieperproduct c where c.productid = p.productid AND '$categorie' = c.categorieid";
}
//Als alleen de categorie en een zoekterm zijn ingevuld
else if ($categorie == 'start' && !(isset($zoekterm)) &&  $soort != 'start') {
	$sql = "SELECT p.* FROM tblproducten AS p, tblcategorieperproduct AS c where c.productid = p.productid AND '$categorie' = c.categorieid AND productnaam LIKE '%$zoekterm%'";
}
//Als alleen Een zoekterm is ingegeven is ingevuld
else if (isset($zoekterm) && $categorie == 'start' && $soort == 'start') {
	$sql = "SELECT * FROM tblproducten where productnaam LIKE '%$zoekterm%'";
}
//Als alleen de soort is ingevuld
else if (!(isset($zoekterm)) && $categorie == 'start' && $soort != 'start') {
	$sql = "SELECT p.* FROM tblproducten AS p, tblsoorten AS s WHERE p.soortid = s.soortid AND s.soortid = '$soort'";
}
//Als alleen de categorie en soort zijn ingevuld
else if (!(isset($zoekterm)) && $categorie != 'start' && $soort != 'start') {
	$sql = "SELECT p.* FROM tblproducten AS p, tblsoorten AS s, tblcategorieperproduct AS cap WHERE p.soortid = s.soortid AND cap.productid = p.productid AND s.soortid = '$soort' AND cap.categorieid = '$categorie'";
}
//als er alleen in soort en een zoekterm zijn ingegeven
else if ((isset($zoekterm)) && $categorie == 'start' && $soort != 'start') {
	$sql = "SELECT p.* FROM tblproducten AS p, tblsoorten AS s WHERE p.soortid = s.soortid AND cap.productid = p.productid AND s.soortid = '$soort' AND p.productnaam = '$zoekterm'";
}
//Als alles is ingevoerd
else if ((isset($zoekterm)) && $categorie != 'start' && $soort != 'start'){
	$sql = "SELECT p.* FROM tblproducten AS p, tblsoorten AS s, tblcategorieperproduct AS cap WHERE p.soortid = s.soortid AND cap.productid = p.productid AND s.soortid = '$soort' AND cap.categorieid = '$categorie' AND p.productnaam = '$zoekterm'";
}
else {
	$sql = "SELECT * FROM tblproducten";
}

switch ($_POST["rangorde"]) {
	case 'AZ':
		$sql = $sql."ORDER BY p.productnaam";
		break;
	case 'ZA':
		$sql = $sql."ORDER BY p.productnaam DESC";
		break;
	case 'HL':
		$sql = $sql."ORDER BY p.prijs/stuk";
		break;
	case 'LH':
		$sql = $sql."ORDER BY p.prijs/stuk DESC";
		break;
}
echo $sql;



 ?>
