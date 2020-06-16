<?php
//*Note to myself:
//in registreer.php word er verwezen naar induviduele foutmeldingen maar die zijn er niet. Kijk later of je dit nog gaat gebruiken of deze gaat verwijderen
$fvoornaam = trim($_POST["voornaam"]);
$fachternaam = trim($_POST["achternaam"]);
$fgebruikersnaam = trim($_POST["gebruikersnaam"]);
$femail = trim($_POST["email"]);
$fpostcode = trim($_POST["postcode"]);
$fgemeente = trim($_POST["gemeente"]);
$fstraat = trim($_POST["Straat"]);
$fstraatnr = trim($_POST["straatnr"]);
$fpaswoord = trim($_POST["paswoord"]);
$fbpaswoord = trim($_POST["confirmpaswoord"]);
$gekeurt = true;

if(empty($fvoornaam)){
	$gekeurt = false;
	echo '<div class="alert alert-danger" role="alert">Het veld voor de voornaam is niet ingevuld </div>';
}
if(empty($fachternaam)){
	$gekeurt = false;
	echo '<div class="alert alert-danger" role="alert">Het veld voor de achternaam is niet ingevuld </div>';
}
if(empty($fgebruikersnaam)){
	$gekeurt = false;
	echo '<div class="alert alert-danger" role="alert">Het veld voor de gebruikersnaam is niet ingevuld </div>';
}
if(empty($fstraat)){
	$gekeurt = false;
	echo '<div class="alert alert-danger" role="alert">Het veld voor de straat is niet ingevuld </div>';
}
if(empty($fstraatnr)){
	$gekeurt = false;
	echo '<div class="alert alert-danger" role="alert">Het veld voor de straatnummer is niet ingevuld </div>';
}
if(empty($femail)){
	$gekeurt = false;
	echo '<div class="alert alert-danger" role="alert">Het veld voor de Email is niet ingevuld </div>';
}
else{
	if (!filter_var($femail, FILTER_VALIDATE_EMAIL)) {
	  $gekeurt = false;
	  echo '<div class="alert alert-danger" role="alert">Het is geen geldig Email</div>';
  }}
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
if(empty($fpaswoord)){
	$gekeurt = false;
	echo '<div class="alert alert-danger" role="alert">Het veld voor het paswoord is niet ingevuld </div>';
}
else{
	if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/', $fpaswoord)) {
	    $gekeurt = false;
		echo '<div class="alert alert-danger" role="alert">Het veld voor het paswoord is geen correct paswoord.</div>';
	}
}
if(empty($fbpaswoord)){
	$gekeurt = false;
	echo '<div class="alert alert-danger" role="alert">Het veld voor bevestiging paswoord is niet ingevuld.</div>';
}
else{
	if($fbpaswoord != $fpaswoord){
		$gekeurt = false;
		echo '<div class="alert alert-danger" role="alert">Het veld voor paswoord komt niet overeen met het veld van bevestig paswoord.</div>';
	}
}

include("php/postcodeid.php");
if(empty($pcid)){
	$gekeurt = false;
	echo '<div class="alert alert-danger" role="alert">De combinatie van .</div>';
}


if($gekeurt){
include('php/registratie.php');
}

?>
