<?php
$goedkeuring = true;
$fvnaam = trim($_POST["voornaam"]);
$fanaam = trim($_POST["achternaam"]);
$fgemeente = trim($_POST["gemeente"]);
$fpostcode = trim($_POST["postcode"]);
$fstraat = trim($_POST["Straat"]);
$fstraatnr = trim($_POST["straatnr"]);

if(empty($fvnaam)){
$goedkeuring = false;
echo '<div class="alert alert-danger" role="alert">Het veld voor de voornaam is niet ingevult </div>';
}

if(empty($fanaam)){
$goedkeuring = false;
echo '<div class="alert alert-danger" role="alert">Het veld voor de achternaam is niet ingevult. </div>';
}

if(empty($fgemeente)){
$goedkeuring = false;
echo '<div class="alert alert-danger" role="alert">Het veld voor de gemeente is niet ingevult. </div>';
}

if(empty($fpostcode)){
$goedkeuring = false;
echo '<div class="alert alert-danger" role="alert">Het veld voor de postcode is niet ingevult. </div>';
}
else{
	if (strlen($fpostcode) != 4) {
		$goedkeuring = false;
		echo '<div class="alert alert-danger" role="alert">De postcode is niet lang genoeg.</div>';
	}
	else{
		if(!(preg_match("/^\d+$/",$fpostcode))){
			$goedkeuring = false;
			echo '<div class="alert alert-danger" role="alert">De postcode is geen postcode.</div>';
		}
	}
}

if(empty($fstraat)){
$goedkeuring = false;
echo '<div class="alert alert-danger" role="alert">Het veld voor de straat is niet ingevult. </div>';
}

if(empty($fstraatnr)){
$goedkeuring = false;
echo '<div class="alert alert-danger" role="alert">Het veld voor de straatnummer is niet ingevult. </div>';
}
//behoort tot de pagina weizigen.php
 ?>
