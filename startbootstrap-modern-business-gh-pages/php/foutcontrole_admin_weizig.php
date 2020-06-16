<?php
$gekeurt = true;
$fvoornaam = trim($_POST["voornaam"]);
$fachternaam = trim($_POST["achternaam"]);
$fpostcode = trim($_POST["postcode"]);
$fgemeente = trim($_POST["gemeente"]);
$fstraat = trim($_POST["Straat"]);
$fstraatnr = trim($_POST["straatnr"]);

if(empty($fvoornaam)){
	$gekeurt = false;
	echo '<div class="alert alert-danger" role="alert">Het veld voor de voornaam is niet ingevuld </div>';
}
if(empty($fachternaam)){
	$gekeurt = false;
	echo '<div class="alert alert-danger" role="alert">Het veld voor de achternaam is niet ingevuld </div>';
}
if(empty($fstraat)){
	$gekeurt = false;
	echo '<div class="alert alert-danger" role="alert">Het veld voor de straat is niet ingevuld </div>';
}
if(empty($fstraatnr)){
	$gekeurt = false;
	echo '<div class="alert alert-danger" role="alert">Het veld voor de straatnummer is niet ingevuld </div>';
}
if(empty($fpostcode)){
	$gekeurt = false;
}
else{
	if (strlen($fpostcode) != 4) {
		$gekeurt = false;
		echo '<div class="alert alert-danger" role="alert">De postcode is de foutiefe lengte</div>';
	}
	else{
		if(!(preg_match("/^\d+$/",$fpostcode))){
			$gekeurt = false;
			echo '<div class="alert alert-danger" role="alert">Het is geen geldig postcode</div>';
		}
	}
}
if(empty($fgemeente)){
	$gekeurt = false;
	echo '<div class="alert alert-danger" role="alert">Het veld voor de gemeente is niet ingevuld </div>';
}
include("php/postcodeid.php");
if(empty($pcid)){
	$gekeurt = false;
	echo '<div class="alert alert-danger" role="alert">De combinatie van gemeente en postcode komen niet overeen.</div>';
}
if($gekeurt){
include("php/wijzig.php");
}
 ?>
