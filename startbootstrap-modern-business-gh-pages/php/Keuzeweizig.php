<?php
$goedkeuring = true;
if(!(isset($_POST["voornaam"]) && $_POST["voornaam"] != "")){
	$goedkeuring = false;
}
if(!(isset($_POST["achternaam"]) && $_POST["achternaam"] != "")){
	$goedkeuring = false;
}
if(!(isset($_POST["gemeente"]) && $_POST["gemeente"] != "")){
	$goedkeuring = false;
}
if(!(isset($_POST["postcode"]) && $_POST["postcode"] != "")){
	$goedkeuring = false;
}
//behoort tot de pagina weizigen.php
 ?>
