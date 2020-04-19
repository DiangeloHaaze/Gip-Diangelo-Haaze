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
}

if(empty($fanaam)){
$goedkeuring = false;
}

if(empty($fgemeente)){
$goedkeuring = false;
}

if(empty($fpostcode)){
$goedkeuring = false;
}
else{
	if (strlen($fpostcode) != 4) {
		$goedkeuring = false;
	}
	else{
		$pat = '[0-9]';
		if(!(preg_match("/^\d+$/",$fpostcode))){
			$goedkeuring = false;
		}
	}
}

if(empty($fstraat)){
$goedkeuring = false;
}

if(empty($fstraatnr)){
$goedkeuring = false;
}
//behoort tot de pagina weizigen.php
 ?>
