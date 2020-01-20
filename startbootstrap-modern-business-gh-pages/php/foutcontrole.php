<?php
if(isset($_POST['versturen'])){
$gekeurt = true;
if($_POST['confirmpaswoord'] == $_POST["paswoord"] && !(isset($_POST['confirmpaswoord'])) && $_POST['confirmpaswoord'] == ""){
	$foutconfirmpasswoord = true;
	$gekeurt = false;
}
if (!(isset($_POST['pasword'])) && $_POST['password'] == ""){
	$foutpaswoord = true;
	$gekeurt = false;
}
else{
	$patroon = '(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}';
	$paswoorddoor = preg_match($pattern, $_POST["password"]);
	if(!isset($paswoorddoor)){
		$foutpatroonpasswoord = true;
	}
}
if (!(isset($_POST['voornaam'])) && $_POST['voornaam'] == ""){
	$foutvoornaam = true;
	$gekeurt = false;
}
if(!(isset($_POST["achternaam"]) && $_POST['achternaam'] == ""){
	$foutachternaam = true;
	$gekeurt = false;
}
if(!(isset($_POST["gemeente"]) && $_POST['gemeente'] == ""){
	$foutgemeente = true;
	$gekeurt = false;
}
$pattern = "[0-9]{4}";
$postcodedoor =  preg_match($pattern, $_POST["Postcode"]);

if(!(isset($_POST["postcode"])) && $_POST['postcode'] == ""){
	$foutingevuldpostcode = true;
	$gekeurt = false;
}else
if(!(isset($postcodedoor))){
	$foutpatroonpostcode = true;
	$gekeurt = false;
}

}
?>
