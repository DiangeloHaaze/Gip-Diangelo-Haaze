<?php
$voornaam = trim($_POST["voornaam"]);
$achternaam = trim($_POST["achternaam"]);
$gebruikersnaam = trim($_POST["gebruikersnaam"]);
$email = trim($_POST["email"]);
$postcode = trim($_POST["postcode"]);
$gemeente = trim($_POST["gemeente"]);
$paswoord = trim($_POST["paswoord"]);
$bpaswoord = trim($_POST["confirmpaswoord"]);
$gekeurt = true;

if(empty($voornaam)){
	$gekeurt = false;
}
if(empty($achternaam)){
	$gekeurt = false;
}
if(empty($gebruikersnaam)){
	$gekeurt = false;
}
if(empty($email)){
	$gekeurt = false;
}
else{
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	  $gekeurt = false;
  }}
if(empty($postcode)){
	$gekeurt = false;
}
else{
	if (strlen($postcode) != 4) {
		$gekeurt = false;
	}
	else{
		$pat = '[0-9]';
		if(!(preg_match("/^\d+$/",$postcode))){
			$gekeurt = false;
		}
	}
}
if(empty($gemeente)){
	$gekeurt = false;
}
if(empty($paswoord)){
	$gekeurt = false;
}
else{
	if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/', $password)) {
	    $gekeurt = false;
	}
}
if(empty($bpaswoord)){
	$gekeurt = false;
}
else{
	if($bpaswoord != $paswoord){
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
