<?php
$foutief = true;
$aantalcat = 0;
$productnaam = trim($_POST["productnaam"]);
$beschrijving = trim($_POST["beschrijving"]);
$prijsperstuk = trim($_POST["prijsPstuk"]);
$linkfoto = trim($_POST["linkfoto"]);
$soort = $_POST["soort"];
$talen = $_POST["talen"];

if(empty($productnaam)){
	$foutief = false;
	echo '<div class="alert alert-danger" role="alert">Het veld voor de productnaam is niet ingevuld </div>';
}
if($talen == "start"){
	$foutief = false;
	echo '<div class="alert alert-danger" role="alert">Het veld voor de talen is niet correct ingevuld </div>';
}
if(empty($beschrijving)){
	$foutief = false;
	echo '<div class="alert alert-danger" role="alert">Het veld voor de beschrijving is niet ingevuld </div>';
}
if(empty($prijsperstuk)){
	$foutief = false;
	echo '<div class="alert alert-danger" role="alert">Het veld voor de prijs per stuk is niet ingevuld </div>';
}
else{
	if(!(preg_match("/^\d+$/",$prijsperstuk))){
		$foutief = false;
		echo '<div class="alert alert-danger" role="alert">De prijs is geen cijfer </div>';
	}
}
if(empty($linkfoto)){
	$foutief = false;
	echo '<div class="alert alert-danger" role="alert">Het veld voor de fotolink is niet ingevuld </div>';
}


if($soort == "start"){
	$foutief = false;
	echo '<div class="alert alert-danger" role="alert">Het veld voor de soort is niet correct ingevuld </div>';
}

if ($foutief){
	include("voegproducttoe.php");
}
?>
