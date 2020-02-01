<?php
$goedkeuring = true;
if(!(isset($_POST["voornaam"]) && $_POST["voornaam"] != "")){
	$goedkeuring = false;
}
if(!(isset($_POST["achternaam"]) && $_POST["achternaam"] != "")){
	$goedkeuring = false;
}
if(!(isset($_POST["gebruikersnaam"]) && $_POST["gebruikersnaam"] != "")){
	$goedkeuring = false;
}
else{
	include("php/uniekegebruiker.php");
	
}
//behoort tot de pagina weizigen.php
 ?>
