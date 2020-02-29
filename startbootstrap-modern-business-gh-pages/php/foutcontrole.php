<?php
$fvoornaam = trim($_POST["voornaam"]);
$fachternaam = trim($_POST["achternaam"]);
$fgebruikersnaam = trim($_POST["gebruikersnaam"]);
$femail = trim($_POST["email"]);
$fpostcode = trim($_POST["postcode"]);
$fgemeente = trim($_POST["gemeente"]);
$fpaswoord = trim($_POST["paswoord"]);
$fbpaswoord = trim($_POST["confirmpaswoord"]);
$gekeurt = true;

if(empty($fvoornaam)){
	$gekeurt = false;
}
if(empty($fachternaam)){
	$gekeurt = false;
}
if(empty($fgebruikersnaam)){
	$gekeurt = false;
}
if(empty($femail)){
	$gekeurt = false;
}
else{
	if (!filter_var($femail, FILTER_VALIDATE_EMAIL)) {
	  $gekeurt = false;
  }}
if(empty($fpostcode)){
	$gekeurt = false;
}
else{
	if (strlen($fpostcode) != 4) {
		$gekeurt = false;
	}
	else{
		$pat = '[0-9]';
		if(!(preg_match("/^\d+$/",$fpostcode))){
			$gekeurt = false;
		}
	}
}
if(empty($fgemeente)){
	$gekeurt = false;
}
if(empty($fpaswoord)){
	$gekeurt = false;
}
else{
	if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/', $fpaswoord)) {
	    $gekeurt = false;
	}
}
if(empty($fbpaswoord)){
	$gekeurt = false;
}
else{
	if($fbpaswoord != $fpaswoord){
		$gekeurt = false;
	}
}

include("php/postcodeid.php");
if(empty($pcid)){
	$gekeurt = false;
}


if($gekeurt){
include('php/registratie.php');

}

?>
