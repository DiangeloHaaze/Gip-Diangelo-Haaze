<?php
//
if(isset($peg)){
	if ( $_POST['postcode'] == "" && isset($_POST['postcode'])){
		$fout = true;
		$totfout = true;
	}
	if($_POST['gemeente'] == "" && isset($_POST['gemeente'])){
		$fout = true;
		$totfout = true;
	}
	include("php/postcodeid.php");
}
else {
	if(isset($_POST['zoekwaarde']) && $_POST['zoekwaarde'] == ""){
		$foutzoekenleeg = true;
		$totfout = true;
	}
	if ($_POST['keuze'] == 'gebruikersnaam'){
		$cat = 1;
		include("php/uniekegebruiker.php");
	}
	if ($_POST['keuze'] == 'email') {
		include("php/uniekegebruiker.php");
	}
}
if(!(isset($totfout))){
	//hier moet de update gebeuren of de variabele die zegt dat da moet gebeuren
}
// behoort to de webpagina weizigen.php
?>
