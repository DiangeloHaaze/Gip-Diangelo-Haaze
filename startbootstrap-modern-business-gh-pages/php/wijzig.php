<?php
if(!(isset($_POST['zoekwaarde']) && $_POST['zoekwaarde'] != "" && !isset($peg))){
	$def = true;
}
else{

}
if (!(isset($_POST['postcode']) && isset($_POST['gemeente']) && $_POST['gemeente'] != "" && $_POST['postcode'] != "")) {
	$def = true;
}
else{
	if(!(is_int($_POST['postcode']))){
		$foutpostsoort = true;
		$def = true;
	}
}
// behoort to de webpagina weizigen.php
?>
